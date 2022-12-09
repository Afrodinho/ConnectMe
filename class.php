<?php
echo '<script>console.log("Loaded the class file!");</script>';
// Main class
if(!class_exists('Users')){
    class Users {

        function register($redirect) {
            echo '<script>console.log("Registering user...");</script>';
            global $jdb;

            // Check to make sure form submission is coming from the script
            // Full URL of the registration page
            $current = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            echo '<script>console.log("Current:' . $current . '");</script>';

            // Full URL of the page the form was submitted from
            $referrer = $_SERVER['HTTP_REFERER'];
            echo '<script>console.log("Referrer:' . $referrer . '");</script>';

            /**
             * Check to see if $_POST array has date (i.e. form was submitted) and if so,
             * process the form data.
             */
            echo '<script>console.log("' . print_r($_POST) . '");</script>';
            if ( !empty( $_POST ) ) {
                if ( $referrer == $current ) {
                    echo '<script>console.log("Form was submitted - load db.php...");</script>';

                    // Require our database class
                    require_once('db.php');

                    $table = 'User';

                    $fields = array('Username', 'Password', 'FirstName', 'LastName', 'DateJoined', 'EmailAddress');

                    $values = $jdb->clean($_POST);
                    echo '<script>console.log("POST values: ' . $values . '");</script>';

                    $username = $_POST['username'];
                    $userpass = $_POST['password'];
                    $userfirstname = $_POST['firstname'];
                    $userlastname = $_POST['lastname'];
                    $userjoined = $_POST['date'];
                    $useremail = $_POST['email'];

                    // Create a NONCE using the action, username, timestamp, and NONCE SALT
                    $nonce = md5('registration-' . $username . $userjoined . NONCE_SALT);

                    // Hash the password
                    $userpass = $jdb->hash_password($userpass, $nonce);

                    $values = array(
                        'username' => $username,
                        'password' => $userpass,
                        'firstname' => $userfirstname,
                        'lastname' => $userlastname,
                        'date' => $userjoined,
                        'email' => $user
                    );

                    $insert = $jdb->insert($link, $table, $fields, $values);

                    if( $insert == TRUE ) {
                        $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                        $aredirect = str_replace('SignUp.php', $redirect, $url);

                        header("Location: $redirect?reg=true");
                        exit;
                    }

                } else {
                    die('Your form submission did not come from the correct page. Please contact the site administrator.');
                }
            }
        }

        function login($redirect) {
            echo '<script>console.log("Logging in user...");</script>';
            global $jdb;
    
            if ( !empty ( $_POST ) ) {
                
                $values = $jdb->clean($_POST);
    
                // The username and password submitted by the user
                $submittedname = $values['username'];
                $submittedpassword = $values['password'];
    
                $table = 'User';
    
                /**
                 * Run query to get all data from the users table where the user login
                 * matches the submitted login
                 */
                $sql = "SELECT * FROM $table WHERE Username = '" . $submittedname . '"';
                $results = $jdb->select($sql);
    
                // Kill script if submitted username doesn't exist
                if (!$results) {
                    die('That user does not exist!');
                }
    
                // Fetch results into associative array
                // $results = mysql_fetch_assoc( $results );
                /**
                 * Sources:
                 *  - https://www.php.net/manual/en/pdostatement.fetch.php
                 *  - https://stackoverflow.com/questions/15512861/pdo-associative-arrays-return-associative
                 *  - https://www.php.net/manual/en/pdostatement.fetchall.php
                 *  - https://www.php.net/manual/fr/pdo.constants.php
                 */
                $results = $jdb->fetchAll(PDO::FETCH_KEY_PAIR);
    
                // Registration date of stored matching user
                $storeddate = $results['DateJoined'];
    
                // Hashed password of the stored matching user
                $storedpass = $results['Password'];
    
                // Recreate our NONCE used at registration
                $nonce = md5('registration-' . $submittedname . $storeddate . NONCE_SALT);
    
                // Rehash the submitted password
                $submittedpassword = $jdb->hash_password($submittedpassword, $nonce);
    
                // Check if submitted password matches the stored password
                if ( $submittedpassword == $storedpass ) {
    
                    // If it matches, rehash password and store in a cookie
                    $authnonce = md5('cookie-' . $submittedname . $storeddate . AUTH_SALT);
                    $authID = $jdb->hash_password($submittedpassword, $authnonce);
    
                    // Set authorization cookie
                    setcookie('userlogauth[user]', $submittedname, 0, '', '', '', true);
                    setcookie('userlogauth[authID]', $authID, 0, '', '', '', true);
    
                    // Build the redirect
                    $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                    $redirect = str_replace('LoginPage.php', $redirect, $url);
    
                    // Redirect to home page
                    header("Location: $redirect");
                    exit;
                } else {
                    return 'invalid';
                }
            } else {
                return 'empty';
            }
        }
    
        function logout() {
            echo '<script>console.log("Logging out user...");</script>';
            // Expire auth cookie to log user out
            setcookie('userlogauth[user]', $submittedname, -3600, '', '', '', true);
            setcookie('userlogauth[authID]', $authID, -3600, '', '', '', true);
    
            if ( $idout == true && $userout == true ) {
                return true;
            } else {
                return false;
            }
        }
    
        function checkLogin() {
            echo '<script>console.log("Checking log-in...");</script>';
            global $jdb;
    
            // Grab authorization cookie array
            $cookie = $_COOKIE['userlogauth'];
    
            // Set user and auth variables
            $user = $cookie['user'];
            $authID = $cookie['authID'];
    
            /**
             * If cookie values are empty, redirect to login.
             * Otherwise, run the login check.
             */
            if ( !empty ( $cookie ) ) {
    
                // Query database for selected user
                $table = 'User';
                $sql = "SELECT * FROM $table WHERE Username = '" . $user . '"';
                $results = $jdb->select($sql);
    
                // Kill script if submitted username doesn't exist.
                if (!$results) {
                    die('That user does not exist!');
                }
    
                // $results = mysql_fetch_assoc( $results );
                $results = $jdb->fetchAll(PDO::FETCH_KEY_PAIR);
                $storeddate = $results['DateJoined'];
                $storedpass = $results['Password'];
    
                // Rehash password to see if it matches value stored in cookie
                $authnonce = md5('cookie-' . $user . $storeddate . AUTH_SALT);
                $storedpass = $jdb->hash_password($storedpass, $authnonce);
    
                if ( $storedpass == $authID ) {
                    $results = true;
                } else {
                    $results = false;
                }
            } else {
                // Built the redirect
                $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                $redirect = str_replace('index.php', $redirect, $url);
    
                // Redirect to home page
                header("Location: $redirect?msg=login");
                exit;
            }
    
            return $results;        
        }
    }
}

// Instantiate database class
echo '<script>console.log("Instantiating new Users class...");</script>';
$j = new Users;
echo '<script>console.log("Success! User class instantiated.");</script>';
?>