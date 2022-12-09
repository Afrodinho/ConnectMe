<!DOCTYPE html>

<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/minigames/mp/css/NavBar.css">
        <link rel="stylesheet" type="text/css" href="/minigames/mp/css/dashboard.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Round">
        <title>Minigames</title>
</head>
    
    <body>
        
      <div class="dashboard">
          
          
          <section class="navi">
              
             <div class="logo">
                  
                <a href="index.html"><img src = "/minigames/mp/images/ConnectMe_DarkModeV3.png" alt=""></a>
              
              </div>
        
         
              <div class="links">
                  
              <!--<a href="dashboard.html" class="link">Home</a><br>
              <a href="inbox.html" class="link">Inbox</a><br>
              <a href="meetings.html" class="link">Meetings</a><br>
              <a href="icebreaker.html" class="link">IceBreaker</a><br>
                  
                  -->
                  
                  <a href="/dashboard.html" class="buttons">
                    <span class="material-icons-round">space_dashboard</span>
                      <h3>Dashboard</h3>
                  </a>
                  <a href="/404.html" class="buttons">
                    <span class="material-icons-round">inbox</span>
                      <h3>Inbox</h3>
                  </a>
                  <a href="/meetings.html" class="buttons"> 
                    <span class="material-icons-round">groups</span>
                      <h3>Meetings</h3>
                  </a>
                  
                  <a href="/minigames/minigames.php" class="buttons">
                    <span class="material-icons-round">videogame_asset</span>
                      <h3>MiniGames</h3>
                  </a>
                  
                  <a href="/settings.html" class="buttons">
                    <span class="material-icons-round">settings</span>
                      <h3>Settings</h3>
                  </a>
                  
                  <a href="/index.html">
                    <span class="material-icons-round" class="buttons">logout</span>
                      <h3>Log Out</h3>
                  </a>
                  
                  
              </div>
              
              
          </section>

          <!-- NavBar for Mobile Dashboard -->
          
          <div class="mob-dash">
          
              <section class="mob-navi">
              
                  <div class="logo">
                  
                      <a href="/index.html"><img src = "/minigames/mp/css/ConnectMe_DarkModeV3.png" alt=""></a>
                  
                  </div>
                  
                  
                  <div class="links">
                  
                  <a href="/dashboard.html" class="buttons">
                    <span class="material-icons-round">space_dashboard</span>
                      <h3>Dashboard</h3>
                  </a>
                  <a href="/404.html" class="buttons">
                    <span class="material-icons-round">inbox</span>
                      <h3>Inbox</h3>
                  </a>
                  <a href="/meetings.html" class="buttons"> 
                    <span class="material-icons-round">groups</span>
                      <h3>Meetings</h3>
                  </a>
                  
                  <a href="/minigames/minigames.php" class="buttons">
                    <span class="material-icons-round">videogame_asset</span>
                      <h3>Minigames</h3>
                  </a>
                  
                  <a href="/settings.html" class="buttons">
                    <span class="material-icons-round">settings</span>
                      <h3>Settings</h3>
                  </a>
                  
                  <a href="/index.html">
                    <span class="material-icons-round" class="buttons">logout</span>
                      <h3>Log Out</h3>
                  </a>
                  
                  
              </div>
              
              </section>
          
          </div>

<?php
    session_start();
    if(empty($_SESSION)) 
?>

  
<!-- THIS IS JUST DISPLAYING DATE AND TIME -->
<?php
    //print_r($_GET);
    //print_r($_POST);
    //echo session_id();

    date_default_timezone_set('America/Chicago');
    echo '<p>' .date('l jS \of F Y h:i:s A'). '</p>';
?>

<!-- This is title of page and table... I don't know if this is necessary. -->
<html>
    <head>
        <title> Meeting Prediction </title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>

    <!-- <table>
        <tr>
            <th></th>
        </tr>
        <tr></tr>

    </table>
    <br/> -->

    <!-- BUTTONS CODE FOR THE GAME -->
    <form action="MeetingPrediction.php" method="post">
        <label for ="Prediction">How Will Your Meeting Go?</label>
            <input type= "Submit" name="Generate" value="Generate Prediction">
    </form>

    <form action="MeetingPrediction.php" method="post">
        <input type= "submit" name ="reset" value="Reset">
    </form>
    
    <!-- Functions FOR RESETING AND STARTING THE GAME -->
    <?php
        

        if(!empty($_POST['reset']))
        {
            reset_game();
        }
        elseif(!empty($_POST['Generate']))
        {
            generate();
        }
?>

<?php


// THIS IS THE RANDOM GENERATOR CODE FOR THE GAME
function generate()
{
    echo '<h3>Here is Your Meeting Prediction:</h3>';
    $file= "mp.txt";
    $mp =file($file);
    srand((double)microtime()*1000000);
    $randomMP = rand(0, count($mp)-1);
    echo $mp[$randomMP];
}

// THIS RESETS THE GAME AND PAGE
function reset_game()
{
    echo '<h3>Page Has Been Reset!</h3>';
}
?>

</body>
</html>

    

            

