<!DOCTYPE html>

<?php
    require_once('load.php');
    if ( $_GET['action'] == 'logout' ) {
        $loggedout = $j->logout();
    }

    $logged = $j->login('index.php');
?>

<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="NavBar.css">
        <link rel="stylesheet" type="text/css" href="sign-log.css">
        <script src="myscripts.js"></script>
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
    
        <main>
                <div class ="inner-box">
                    <div class="forms-wrap">
                        <h2>Welcome Back</h2>
                        
                        <form method="post">
                            <input type="text" placeholder="Email" name="email" required><br>
                            <input type="password" placeholder="Password" name="psw" id="myInput" required>
                            <a href="forgotpassword.html" class="links" id="forgot">Forgot Password?</a>
                            <a href="" class="button">Log In</a>
                            
                            <br>
                            <p>Don't have an account? <a href="LoginPage.php" class="links">Sign Up</a></p>
                            <br>
                            
                        </form>
                    </div>
                </div>
        </main>
        
    </body>
    
</html>