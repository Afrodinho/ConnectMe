<!DOCTYPE html>

<?php
    require_once('load.php');
    if ( $logged == false ) {
        // Built redirect
        $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $redirect = str_replace('index.php', 'LoginPage.php', $url);

        // Redirect to login page
        header("Location: $redirect?msg=login");
        exit;
    } else {
        // Grab authorization cookie array
        $cookie = $_COOKIE['userlogauth'];
    
        // Set user and auth variables
        $user = $cookie['user'];
        $authID = $cookie['authID'];

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
    }
?>

<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="NavBar.css">
        <link rel="stylesheet" type="text/css" href="HomePage.css">
        <title>ConnectMe</title>
    </head>

    <body>
        
        <header>
            <div class = "logo">
                <a href="index.php"><img src = "ConnectMe_LightModeV3.png" alt=""></a>
            </div>
            
            <nav class="nav" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav_item"><a href="index.php" class="nav_link">Home</a></li>
                    <li class="nav_item"><a href="about.html" class="nav_link">About Us</a></li>
                    <li class="nav_item"><a href="SignUp.php" class="nav_link">Sign Up</a></li>
                    <li class="nav_item"><a href="LoginPage.php" class="nav_link" id="login">Log In</a></li>
                </ul>
            </nav>
            
                <div class = "dropdown">
                    <div class="bar"></div>
                </div>
            </header>
        
        
          <div class ="faded-bg"></div>
        
                <nav class="mobile-dropdown" id="nav_menu">
            <ul class="nav_list">
                    <li class="nav_item"><a href="index.php" class="nav_link">Home</a></li>
                    <li class="nav_item"><a href="about.html" class="nav_link">About Us</a></li>
                    <li class="nav_item"><a href="SignUp.php" class="nav_link">Sign Up</a></li>
                    <li class="nav_item"><a href="LoginPage.php" class="nav_link">Log In</a></li>
                </ul>
            </nav>
        
        <script src="script.js"></script>
        
        <div class="greeting">
                <div class = "card">
                    <h1 class ="headertext"></h1>
    
                    <h1 class="bodytext">Improve the efficiency and effectiveness of team-based communications and collaborations.</h1>
                  <!--  
                <form class ="register">
                  <input type="email" id="email" name="email" placeholder="Work Email" required>
                  <input class="GetStart" type="submit" value="Get Started">
                </form> -->
                    
                    <a href = "SignUp.php" class="button">Get Started</a>
                    
                    <!-- <input class="GetStart" type="submit" value="Get Started"> -->
            </div>
        </div>
        <div class ="info">
            
        </div>
    </body>
</html>