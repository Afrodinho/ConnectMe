<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/NavBar.css">
        <link rel="stylesheet" type="text/css" href="/dashboard.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Round">
        
        <title>Icebreaker</title>
    </head>
    <body>
        
        <section class="base">
      <div class="dashboard">
          
          <div class="dash-nav">
              
          
          <section class="navi">
              
             <div class="logo">
                  
                <a href="/index.php"><img src = "/ConnectMe_DarkModeV3.png" alt=""></a>
              
              </div>
        
         
              <div class="links">
                  
                  <a href="/dashboard.php" class="buttons">
                    <span class="material-icons-round">space_dashboard</span>
                      <h3>Dashboard</h3>
                  </a>
                  <a href="/404.php" class="buttons">
                    <span class="material-icons-round">inbox</span>
                      <h3>Inbox</h3>
                  </a>
                  <a href="/404.php" class="buttons"> 
                    <span class="material-icons-round">groups</span>
                      <h3>Meetings</h3>
                  </a>
                  
                  <a href="/minigames/minigames.php" class="buttons">
                    <span class="material-icons-round">videogame_asset</span>
                      <h3>IceBreaker</h3>
                  </a>
                  
                  <a href="/settings.php" class="buttons">
                    <span class="material-icons-round">settings</span>
                      <h3>Settings</h3>
                  </a>
                  
                  <!-- Manually providing the logout redirect in the URL is likely not good practice.
                        This was done due to time constraints but should be changed later on. -->
                  <a href="/LoginPage.php?action=logout">
                    <span class="material-icons-round" class="buttons">logout</span>
                      <h3>Log Out</h3>
                  </a>
                  
                  
              </div>
              
              
          </section>
              
          </div>
        
          
          
        
          <!-- NavBar for Mobile Dashboard -->
          <div class="mob-dash">
          
              <section class="mob-navi">
                  
                  
             
                  
                  <a href="/dashboard.php" class="buttons">
                    <span class="material-icons-round">space_dashboard</span>
     
                  </a>
                  <a href="/404.php" class="buttons">
                    <span class="material-icons-round">inbox</span>

                  </a>
                  <a href="/404.php" class="buttons"> 
                    <span class="material-icons-round">groups</span>
         
                  </a>
                  
                  <a href="/minigames/minigames.php" class="buttons">
                    <span class="material-icons-round">videogame_asset</span>
       
                  </a>
                  
                  <a href="/settings.php" class="buttons">
                    <span class="material-icons-round">settings</span>

                  </a>
                  
                  <a href="/LoginPage.php?action=logout" class="buttons">
                    <span class="material-icons-round" class="buttons">logout</span>

                  </a>
                  
                  
  
              
              </section>
          
          </div>
          <script src="script.js"></script>
          
                 <!-- THESE ARE THE BUTTONS  -->
          <main>
                <div class="main-dash">
            
            <div for="s1" class="container">
                <div class="noti">
                    <h2><a href='minigames/mp/meeting-prediction.php'>Meeting Prediction</a></h2>
                </div>
            </div>
       
            <div for="s2" class="container">
                <div class="noti">
                    <h2><a href='minigames/wyr/would-you-rather.php'>Would You Rather?</a></h2>
                </div>
            </div>

            
       <!-- BUTTON FUNCTIONALITY-->
       <?php 
        if(key_exists('MP', $_POST)) {
            MP();
        }
        function MP() {
          echo "You are playing: Meeting Prediction";
          // require("MeetingPrediction.php"); 
        
        }

        if(key_exists('WYR', $_POST)) {
          WYR();
        }
        function WYR() {
          // echo "You are playing: Would You Rather?";
          //require("WouldYouRather.php")
      }

      //   if(key_exists('TIC', $_POST)) {
      //     TIC();
      //   }
      //   function TIC() {
      //     // echo "You are playing: Tic Tac Toe";
      //     //require ("ttt.php");
        
      // }

      ?>

        <!-- THESE ARE THE BUTTONS  -->

        <form action = "mp/meeting-prediction.php" method="post">
          <input type="submit" name="MP"
            value="Meeting Prediction"/>
        </form>
    

        <form action = "wyr/would-you-rather.php" method="post">
          <input type="submit" name="WYR"
            value="Would You Rather?"/>
        </form>
      
<!-- 
        <form action = "ttt.php" method="post">
            <input type="submit" name="TIC"
              value="Tic-Tac-Toe"/>
        </form> -->
    </h3>
</html>