<!DOCTYPE html>

<?php
    require_once('load.php');
    $j->register('login.php');
?>

<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="sign-log.css">
        <link rel="stylesheet" type="text/css" href="NavBar.css">
        
        <!-- This is for the Show password Toggle Icon -->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/> -->
        <script src="new.js"></script>
        <title>Sign Up</title>
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
        
        <main>
                <div class ="inner-box">
                    <div class="forms-wrap">
                        <h2>Sign Up</h2>
                        
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="text" placeholder="Enter your name" name="username" required> <br>
                            <input type="text" placeholder="Enter your email" name="useremail" required><br>
                            <input type="password" placeholder="Create a password" name="userpass" id="myInput" required>
                            <input type="hidden" name="joindate" value="<?php echo time(); ?>" />
                            
                            <a href="" class="button">Get Started</a>
                            
                            <br>
                            <p>Have an account? <a href="LoginPage.php" class="links">Sign In</a></p>
                            <br>
                            
                        </form>
<!--
                    <form action="SignUp.html" autocomplete="off" class="sign-in-form">
                        <div class="logo">
                        <img src="ConnectMe_LightModeV3.png" alt="ConnectMe">
                        </div>
                        
                        <div class="heading">
                            <h2>Welcome Back</h2>
                            <h6>Not registered yet?</h6>
                            <a href="#" class="toggle">Sign up</a>
                        </div>
                        
                        <div class="actual form">
                            <div class="input-wrap">
                                <input type="text"
                                       minilength="4"
                                       class="input-field"
                                       autocomplete="off"
                                       id="name"
                                       required
                                       />
                                <label for="name">Name</label>
                                
                                   <input type="password"
                                       minilength="4"
                                       class="input-field"
                                       autocomplete="off"
                                       id="name"
                                       required
                                       />
                                <label for="pass">Password</label>
                                
                                
                                <input type="submit" value="Sign In" class="sign-btn" />
                                
                                <p class="text">
                                    Forgot your password?
                                    <a href="#">Get Help</a>
                                </p>
                            </div>
                        </div>
                    </form>
-->
                    </div>
                </div>
        </main>
        
        
        
<!--        <script src="script.js"></script>-->
        
    </body>
    

    
    
    
    <!--
    <body>
    <header>
        

        <!--
            <nav class="nav" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav_item"><a href="index.html" class="nav_link">Home</a></li>
                    <li class="nav_item"><a href="about.html" class="nav_link">About Us</a></li>
                    <li class="nav_item"><a href="LoginPage.html" class="nav_link">Log In</a></li>
                    <li class="nav_item"><a href="SignUp.html" class="nav_link">Sign Up</a></li>
                </ul>
            </nav>

-->
            <!--
                <div class = "dropdown">
                    <div class="bar"></div>
                </div>
--><!--
            </header>
        
        
        <main>
        <div class="left-side">
            
             <div class = "logo">
                <a href="index.html"><img src = "ConnectMe_LightModeV3.png" alt=""></a>
            </div>
        <!--
            <h2>Welcome to ConnectMe</h2>
        
            <h1>Create your account</h1>


-->
            <!--
            <div class="forms">
            

            <h2>Welcome to ConnectMe</h2>
        
            <h1>Create your account</h1>
                <form method="post">
    
                    
                    <label for="email"><b>Name</b></label><br><br>
                  <input type="text" placeholder="Enter your name" name="name" required>
                    
                    
                    
                  <label for="email"><b>Email</b></label><br><br>
                  <input type="text" placeholder="Enter your email" name="email" required>
              
                  <label for="psw"><b>Password</b></label><br><br>
                  <input type="password" placeholder="Create a password" name="psw" id="myInput" required>
                    
                    <p>Must be at least 8 characters</p>
                  <input type="button" onclick="myFunction()" value="Show">
                  <!-- This is for the Show password Toggle Icon -->
                  <!-- <i class="bi bi-eye-slash" id="togglePassword"></i> -->
         <!--         
                  <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                  </label>
              
                  <div class="clearfix">
                    <button type="submit" class="signupbtn">Create account</button>
                  </div>

              </form>
        
        <p>Already have an account?<a>Log In</a></p>
                
            </div>
            
        -->
    
    <!--
        </div>
        
        

        <div class="right-side">
            <nav class="nav" id="nav_menu">
                <li class="nav_item"><a href="LoginPage.html" class="nav_link">Log In</a>
            </nav>
        <img src = "side-image-V3-NOISY.png" alt="">
        </div>
            
            
        </main>
        
        <!--
        <div class ="faded-bg"></div>
        
                <nav class="mobile-dropdown" id="nav_menu">
            <ul class="nav_list">
                    <li class="nav_item"><a href="index.html" class="nav_link">Home</a></li>
                    <li class="nav_item"><a href="about.html" class="nav_link">About Us</a></li>
                    <li class="nav_item"><a href="LoginPage.html" class="nav_link">Log In</a></li>
                    <li class="nav_item"><a href="SignUp.html" class="nav_link">Sign Up</a></li>
                </ul>
            </nav>
        
        <script src="script.js"></script>
-->
        
        
      <!--  
        <main>
            <div class="box">
                <div class = "forms">
                <form action="index.html" autocomplete="off" class="sign-in-form">
                </form>
                </div>
                
                <div class = "side"></div>
            </div>
        </main>
        
    </body>
-->
</html>