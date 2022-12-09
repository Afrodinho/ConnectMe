<?php
// Main class
if(!class_exists('Users')){

    class Users {

        function register($redirect) {
            global $jdb;
            // Abby's Note: Could not find the instantiation in the tutorial and without it the code did not work.
            // I simply placed it here for the time being, should be re-evaluated in the future if that's the best place.
            $jdb = new UsersDatabase;

            // Check to make sure form submission is coming from the script
            // Full URL of the registration page
            $current = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            echo '<script>console.log("Current:' . $current . '");</script>';

            // Full URL of the page the form was submitted from
            $referrer = $_SERVER['HTTP_REFERER'];

            /**
             * Check to see if $_POST array has date (i.e. form was submitted) and if so,
             * process the form data.
             */
            if (!empty($_POST)) {
                if ( $referrer == $current ) {

                    // Require our database class
                    require_once('db.php');

                    $table = 'User';

                    $fields = array('Username', 'Password', 'FirstName', 'LastName', 'DateJoined', 'EmailAddress');

                    $values = $jdb->clean($_POST);

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
                        'email' => $useremail
                    );

                    $dsn = 'mysql:dbname=connhkab_users;host=127.0.0.1';
                    $link = new PDO($dsn, DB_USER, DB_PASS);
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
            global $jdb;
            $jdb = new UsersDatabase;
    
            if ( !empty ( $_POST ) ) {
                
                $values = $jdb->clean($_POST);
    
                // The username and password submitted by the user
                /**
                 * Abby's Note:
                 * This is supposed to use the $values generated above, but the clean method does not appear
                 * to be working properly. This should be revisited later on to determine if clean can be fixed
                 * or whether it is necessary.
                 */
                $submittedname = $_POST['username'];
                $submittedpassword = $_POST['password'];
    
                $table = 'User';
    
                $dsn = 'mysql:dbname=connhkab_users;host=127.0.0.1';
                $link = new PDO($dsn, DB_USER, DB_PASS);

                /**
                 * Run query to get all data from the users table where the user login
                 * matches the submitted login
                 */
                $sql = "SELECT * FROM $table WHERE Username = '" . $submittedname . "'";
                $result = $jdb->select($link, $sql);

                $storeddate = $result['DateJoined'];

                // Kill script if submitted username doesn't exist
                if (!$result) {
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
                
                // $results = $jdb->fetchAll(PDO::FETCH_KEY_PAIR);  // Should be unnecessary due to modified select function in db.php

                // Registration date of stored matching user
                $storeddate = $result['DateJoined'];
    
                // Hashed password of the stored matching user
                $storedpass = $result['Password'];
    
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
            try {
                setcookie('userlogauth[user]', $submittedname, -3600, '', '', '', true);
                setcookie('userlogauth[authID]', $authID, -3600, '', '', '', true);
                return true;
            } catch(Exception $e) {
                return false;
            }
            

            /**
             * Abby's note: The code below was from the tutorial but I did not see where
             * idout and userout were set
             */
            // if ( $idout == true && $userout == true ) {
            //     return true;
            // } else {
            //     return false;
            // }
        }
    
        function checkLogin() {
            echo '<script>console.log("Checking Login...");</script>';
            global $jdb;
            $jdb = new UsersDatabase;
    
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
                echo '<script>console.log("Cookie exists!");</script>';

                $table = 'User';
    
                // $dsn = 'mysql:dbname=connhkab_users;host=127.0.0.1';
                // $link = new PDO($dsn, DB_USER, DB_PASS);
                // $sql = "SELECT * FROM $table WHERE Username = '" . $submittedname . "'";
                // $result = $jdb->select($link, $sql);


                $dsn = 'mysql:dbname=connhkab_users;host=127.0.0.1';
                $link = new PDO($dsn, DB_USER, DB_PASS);

                // Query database for selected user
                echo '<script>console.log("Forming query...");</script>';
                $table = 'User';
                $sql = "SELECT * FROM $table WHERE Username = '" . $user . "'";
                $result = $jdb->select($link, $sql);

                
                // Kill script if submitted username doesn't exist.
                if (!$result) {
                    die('That user does not exist!');
                }
    
                // $results = mysql_fetch_assoc( $results );
                // $result = $jdb->fetchAll(PDO::FETCH_KEY_PAIR);
                $storeddate = $result['DateJoined'];
                $storedpass = $result['Password'];
    
                // Rehash password to see if it matches value stored in cookie
                $authnonce = md5('cookie-' . $user . $storeddate . AUTH_SALT);
                $storedpass = $jdb->hash_password($storedpass, $authnonce);
                
                return $storedpass;

                if ( $storedpass == $authID ) {
                    $result = true;
                } else {
                    $result = false;
                }
            } else {
                // Built the redirect
                $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                $redirect = str_replace('index.php', $redirect, $url);
    
                // Redirect to home page
                header("Location: $redirect?msg=login");
                exit;
            }
    
            return $result;    
        }
    }
}

// Instantiate database class
$j = new Users;
?>