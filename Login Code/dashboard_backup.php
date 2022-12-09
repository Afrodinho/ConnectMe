<!DOCTYPE html>

<?php
    require_once('load.php');
    $logged = $j->checkLogin();
    if ( $logged == false ) {
        // Build redirect
        $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $redirect = str_replace('dashboard.php', 'LoginPage.php', $url);

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
        <link rel="stylesheet" type="text/css" href="dashboard.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Round">
        
        <title>Dashboard</title>
    </head>
    <body>
        
      <div class="dashboard">
          
          
          <section class="navi">
              
             <div class="logo">
                  
                <a href="index.php"><img src = "ConnectMe_DarkModeV3.png" alt=""></a>
              
              </div>
        
         
              <div class="links">
                  
              <!--<a href="dashboard.php" class="link">Home</a><br>
              <a href="inbox.html" class="link">Inbox</a><br>
              <a href="meetings.php" class="link">Meetings</a><br>
              <a href="icebreaker.html" class="link">IceBreaker</a><br>
                  
                  -->
                  
                  <a href="dashboard.php" class="buttons">
                    <span class="material-icons-round">space_dashboard</span>
                      <h3>Dashboard</h3>
                  </a>
                  <a href="404.php" class="buttons">
                    <span class="material-icons-round">inbox</span>
                      <h3>Inbox</h3>
                  </a>
                  <a href="meetings.php" class="buttons"> 
                    <span class="material-icons-round">groups</span>
                      <h3>Meetings</h3>
                  </a>
                  
                  <a href="/minigames/minigames.php" class="buttons">
                    <span class="material-icons-round">videogame_asset</span>
                      <h3>MiniGames</h3>
                  </a>
                  
                  <a href="settings.php" class="buttons">
                    <span class="material-icons-round">settings</span>
                      <h3>Settings</h3>
                  </a>
                  
                  <!-- Manually providing the logout redirect in the URL is likely not good practice.
                        This was done due to time constraints but should be changed later on. -->
                  <a href="LoginPage.php?action=logout">
                    <span class="material-icons-round" class="buttons">logout</span>
                      <h3>Log Out</h3>
                  </a>
                  
                  
              </div>
              
              
          </section>

          <!-- NavBar for Mobile Dashboard -->
          
          <div class="mob-dash">
          
              <section class="mob-navi">
              
                  <div class="logo">
                  
                      <a href="index.php"><img src = "ConnectMe_DarkModeV3.png" alt=""></a>
                  
                  </div>
                  
                  
                  <div class="links">
                  
                  <a href="dashboard.php" class="buttons">
                    <span class="material-icons-round">space_dashboard</span>
                      <h3>Dashboard</h3>
                  </a>
                  <a href="404.php" class="buttons">
                    <span class="material-icons-round">inbox</span>
                      <h3>Inbox</h3>
                  </a>
                  <a href="meetings.php" class="buttons"> 
                    <span class="material-icons-round">groups</span>
                      <h3>Meetings</h3>
                  </a>
                  
                  <a href="icebreaker.html" class="buttons">
                    <span class="material-icons-round">videogame_asset</span>
                      <h3>IceBreaker</h3>
                  </a>
                  
                  <a href="settings.php" class="buttons">
                    <span class="material-icons-round">settings</span>
                      <h3>Settings</h3>
                  </a>
                  
                  <a href="LoginPage.php?action=logout">
                    <span class="material-icons-round" class="buttons">logout</span>
                      <h3>Log Out</h3>
                  </a>
                  
                  
              </div>
              
              </section>
          
          </div>
        
          
    <!-- Main Dash -->
          
          
          
          
    <main>
        <div class="main-dash">
            
            <div class="noti">
                <h2>Notifications</h2>

          
            </div>
            
            <div class="pfp-card">
                
                <h2>John Doe</h2>
            </div>
            
            <div class="tasks">
                
                <h2>Tasks</h2>
            </div>
            
            <div class="members">
                
                <h2>Members</h2>
            
            </div>
        
            <div class="calendar">
                
                <h2>Calendar</h2>
            </div>
            
            <div class="progress">
                
                <h2>Progress</h2>
            
            
            </div>
        
        </div>
        
    </main>
          
          <!--
          <section class="cards">
              <div class="summary">
              
                  <h1>Summary</h1>
                  
                  
              </div>
        
              <div class="deadlines">
            
                  <h1>Deadlines</h1>
                  
              </div>
          </section>
          -->
          <!-- <section class="navi">
              
              
              <div class="logo">
                  
                <a href="index.php"><img src = "ConnectMe_DarkModeV3.png" alt=""></a>
              
              </div>
              <div class="links">
                  
              <a href="dashboard.php" class="link">Home</a><br>
              <a href="inbox.html" class="link">Inbox</a><br>
              <a href="meetings.php" class="link">Meetings</a><br>
              <a href="icebreaker.html" class="link">IceBreaker</a><br>
              
              
              
              <div class="logout">
                  <a href="index.php">Logout</a>
              </div>
              </div>
          </section>
        <section class="main">
          
        </section>
          
          <section class="secondary">
          
          </section>

-->
        </div>
    </body>
</html>