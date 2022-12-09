<!DOCTYPE html>

<?php
    require_once('load.php');
    if ( $_GET['action'] == 'logout' ) {
        $loggedout = $j->logout();
    }

    $logged = $j->login('dashboard.php');
?>

<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="NavBar.css">
        <link rel="stylesheet" type="text/css" href="sign-log.css">
        <script src="myscripts.js"></script>
        <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
        <title>Log In</title>
    </head>
    <body>

        <?php if ( $logged == 'invalid' ) : ?>
            <div>
                <p>Invalid login credentials. Please check your info and try again.</p>
            </div>
        <?php endif; ?>
        <?php if ( $_GET['reg'] == 'true' ) : ?>
            <div>
                <p>Your account was registered successfully. Please log in below.</p>
            </div>
        <?php endif; ?>
        <?php if ( $_GET['action'] == 'logout' ) : ?>
            <?php if ( $loggedout == true ) : ?>
                <div>
                    <p>You have been logged out successfully.</p>
                </div>
            <?php else: ?>
                <div>
                    <p>A problem occurred while logging you out.</p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ( $_GET['msg'] == 'login' ) : ?>
            <div>
                <p>You must log in to view this content.</p>
            </div>
        <?php endif; ?>
    

        <header>
            <div class = "logo">
                <a href="index.php"><img src = "ConnectMe_LightModeV3.png" alt=""></a>
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
        
        
          <div class ="faded-bg"></div>
        
            <nav class="mobile-dropdown" id="nav_menu">
                <ul class="nav_list">
                    <li class="nav_item"><a href="index.php" class="nav_link">Home</a></li>
                    <li class="nav_item"><a href="about.php" class="nav_link">About Us</a></li>
                    <li class="nav_item"><a href="SignUp.php" class="nav_link">Sign Up</a></li>
                    <li class="nav_item"><a href="LoginPage.php" class="nav_link">Log In</a></li>
                </ul>
            </nav>
        
        <script src="script.js"></script>


        <main>
                <div class ="inner-box">
                    <div class="forms-wrap">
                        <h2>Welcome Back</h2>
                        
                        <form method="post">
                            <!-- <div class="g-recaptcha" data-sitekey="your_site_key"></div> -->
                            <input type="text" placeholder="Username" name="username" required><br>
                            <input type="password" placeholder="Password" name="password" id="myInput" required>
                            <!-- <a href="forgotpassword.html" class="links" id="forgot">Forgot Password?</a> -->
                            <!-- <a href="" class="button">Log In</a> -->
                            <input type="submit" class="button" value="Log In"></input>
                            
                            <br>
                            <p>Don't have an account? <a href="SignUp.php" class="links">Sign Up</a></p>
                            <br>
                            
                        </form>
                    </div>
                </div>
        </main>
        
    </body>
    
</html>