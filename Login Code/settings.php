<!DOCTYPE html>

<?php
    require_once('load.php');
    $logged = $j->checkLogin();
    if ( $logged == false ) {
        // Build redirect
        $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $redirect = str_replace('settings.php', 'LoginPage.php', $url);

        // // Redirect to login page
        header("Location: $redirect?msg=login");
        exit;
    } else {
        global $jdb;
        $jdb = new UsersDatabase;

        // Grab authorization cookie array
        $cookie = $_COOKIE['userlogauth'];
    
        // Set user and auth variables
        $user = $cookie['user'];
        $authID = $cookie['authID'];


        $dsn = 'mysql:dbname=connhkab_users;host=127.0.0.1';
        $link = new PDO($dsn, DB_USER, DB_PASS);

        // Query database for selected user
        $table = 'User';

        $sql = "SELECT * FROM $table WHERE Username = '" . $user . "'";
        $result = $jdb->select($link, $sql);

        // Kill script if submitted username doesn't exist.
        if (!$result) {
            die('That user does not exist!');
        }
    }
?>

<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="NavBar.css">
        <link rel="stylesheet" type="text/css" href="settings.css">
        <title>Settings</title>
    </head>
    <body>
        
                <header>
            <div class = "logo">
                <a href="index.php"><img src = "ConnectMe_DarkModeV3.png"s alt=""></a>
            </div>
            
            <nav class="nav" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav_item"><a href="index.php" class="nav_link">Home</a></li>
                    <li class="nav_item"><a href="about.php" class="nav_link">About Us</a></li>
                    <li class="nav_item"><a href="SignUp.php" class="nav_link">Sign Up</a></li>
                    <li class="nav_item"><a href="LoginPage.php" class="nav_link" id="login">Log In</a></li>
                </ul>
            </nav>
            
                <div class = "dropdown">
                    <div class="bar"></div>
                </div>
            </header>
        
                <nav class="mobile-dropdown" id="nav_menu">
            <ul class="nav_list">
                    <li class="nav_item"><a href="index.php" class="nav_link">Home</a></li>
                    <li class="nav_item"><a href="about.php" class="nav_link">About Us</a></li>
                    <li class="nav_item"><a href="SignUp.php" class="nav_link">Sign Up</a></li>
                    <li class="nav_item"><a href="LoginPage.php" class="nav_link">Log In</a></li>
                </ul>
            </nav>
        
       <script src="script.js"></script>
        
        <section class="info">
            
            <h3>Full Name</h3>
            <form method="post">
            <input type="text" placeholder="Enter your name" name="name" required> <br>
            </form>
            
            
            <h3>Email</h3>
            <form method="post">
            <input type="text" placeholder="Enter your email" name="name" required> <br>
            </form>
            
            <h3>Change Password</h3>
            <form method="post">
            <input type="password" placeholder="Change your password" name="psw" id="myInput" required>
            </form>
            
            <h3>Confirm Password</h3>
            <form method="post">
            <input type="password" placeholder="Confirm password" name="psw" id="myInput" required>
            </form>
        
        </section>
    </body>
</html>
