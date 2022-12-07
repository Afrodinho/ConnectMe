<?php
// Database class
if(!class_exists('UsersDatabase')){
    class UsersDatabase {

        /**
         * Connects to database server and selects a database
         * 
         * PHP4 compatibility layer for calling PHP5 constructor.
         * 
         * @uses UsersDatabase::_construct()
        */
        function UsersDatabase() {
            return $this->__construct();
        }

        /**
         * Connects to database server and selects a database
         * 
         * PHP5 style constructor for compatibility with PHP5.
         * Actually sets up connection to the database.
         */
            
        
        function __construct() {
            $this->connect();
        }

        /**
         * Connect to and select database
         * 
         * @uses the constants defined in config.php
         */

        function connect() {
            /**
             * Abby's Note: all of the mysql functions implemented from the
             * tutorial I followed have been deprecated and removed by the
             * default version of PHP our NameCheap server comes with.
             * 
             * There are two current alternatives (mysqli and PDO) and there
             * does not appear to be a strong advantage of one over the other.
             * NameCheap already has the PDO API included, however, so I began
             * methodically restructuring the code to use PDO instead of the
             * obsolete mysql functions.
             */
            /**
             * Sources for mysql -> PDO upgrading:
             *  - https://www.php.net/manual/en/mysqlinfo.api.choosing.php
             *  - https://stackoverflow.com/questions/28096054/how-to-replace-mysql-functions-with-pdo 
             *  - https://www.php.net/manual/en/ref.pdo-mysql.connection.php
             *  - https://www.namecheap.com/support/knowledgebase/article.aspx/1249/89/how-to-remotely-connect-to-a-mysql-database-located-on-our-shared-server/
             *  - https://www.php.net/manual/en/pdo.construct.php
             *  - https://www.php.net/manual/en/pdo.errorinfo.php
             *  - https://yomotherboard.com/how-to-display-pdo-sql-query-error-information/
             *  - https://www.w3schools.com/php/php_mysql_connect.asp
             * 
             */

            $dsn = 'mysql:dbname=connhkab_users;host=127.0.0.1';
            // $link = mysql_connect('localhost', DB_USER, DB_PASS);    // Deprecated mysql
            try {
                $link = new PDO($dsn, DB_USER, DB_PASS);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch ( PDOException $Exception ) {
                echo "Could not connect: " . $e->getMessage();
                exit;
            }            

            //TO-DO: Error handling/printing code below is likely redundant;
            // determine if it's safe to remove at a later time.
            // if (!$link) {
            $link->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $stmt = $link->prepare($sql);
            $stmt->execute($array) or die('Could not connect: ' . print_r($stmt->errorInfo(), true));
            // }

            // $db_selected = mysql_select_db(DB_NAME, $link);  // Deprecated. DSN includes database being selected.

            // if (!$db_selected){
            //     die('Cannot use ' . DB_NAME . ': ' . mysql_error());
            // }
        }

        /**
         * Clean the array using mysql_real_escape_string
         * 
         * @param array $array The array to be cleaned
         * @return array $array The cleaned array
         */
        function clean($array) {
            return array_map('mysql_real_escape_string', $array);
        }

        /**
         * Create a secure hash
         * 
         * Creates secure copy of user password for storage in the database.
         *
         * @param string $password The user's created password
         * @param string $nonce A user-specific NONCE
         * @return string $secureHash The hashed password
         */
        function hash_password($password, $nonce) {
            $secureHash = hash_hmac('sha512', $password . $nonce, SITE_KEY);    // NEED TO FIGURE OUT SITE KEY

            return $secureHash;
        }

        /**
         * Insert data into the database
         * 
         * @param resource $link The MySQL Resource link
         * @param string $table The name of the table to insert the data into
         * @param array $fields An array of the fields to insert data into
         * @param array $values An array of the values to be inserted
         */
        function insert($link, $table, $fields, $values) {
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // This may be redundant, should be evaluated in future refactoring
            $fields = implode(", ", $fields);
            $values = implode("', '", $values);
            // Code below may not be in alignment with PDO and resistance to query injection with the
            // way values are assigned... Should be re-evaluated in future refactoring.
            $sql="INSERT INTO $table (id, $fields) VALUES ('', '$values')"; 

            // if (!mysql_query($sql)) {
            if (!$link->exec($sql)) {
                $link->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
                $stmt = $link->prepare($sql);
                $stmt->execute($array) or die('Error: '. print_r($stmt->errorInfo(), true));
                // Alternate way given by W3Schools:
                // try {
                //     $link->exec($sql);
                // } catch(PDOException $e) {
                //     die('Error: ' . $e->getMessage());
                // }
                // die('Error: ' . mysql_error());
            } else {
                return TRUE;
            }
        }

        /**
         * Select data from the database
         * 
         * @param string $table The name of the table to select data from
         * @param string $columns The columns o return
         * @param array $where The field(s) to search a specific value for
         * @param array $equals The value being searched for
         */
        function select($sql, $query) {
            // $results = mysql_query($sql);
            try {
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $link->prepare($query);
                $stmt->execute();

                $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            return $results;
        }

    }
}

?>