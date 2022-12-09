<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/NavBar.css">
        <link rel="stylesheet" type="text/css" href="/dashboard.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Round">
        
        <title>Would You Rather?</title>
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
        <title>Would You Rather?</title>
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
    <form action="would-you-rather.php" method="post">
        <label for ="WYR">Click Here to start game:</label>
            <input type= "Submit" name="Begin" value="Start Game">
    </form>

    <form action="would-you-rather.php" method="post">
        <input type= "submit" name ="Begin" value="New Scenario">
    </form>
    
    <!-- Functions FOR RESETING AND STARTING THE GAME -->
    <?php
        

        if(!empty($_POST['reset']))
        {
            reset_game();
        }
        elseif(!empty($_POST['Begin']))
        {
            generate();
        }
?>

<?php


// THIS IS THE RANDOM GENERATOR CODE FOR THE GAME
function generate()
{
    echo '<h2>Here is Your Scenario</h2>';
    echo '<h3>Would You Rather...</h3>';
    $file= "wyr.txt";
    $wyr =file($file);
    srand((double)microtime()*1000000);
    $randomWYR = rand(0, count($wyr)-1);
    echo $wyr[$randomWYR];

    ?>
    
    <p>Select Your Answer:</p>
<form>
<style>
  table.tb { width:300px; border-collapse: collapse; }
  .tb th, .tb td { border: solid 1px #777; padding: 5px;  }
  .tb th { background: #3630a3; color:white; }
</style>
    
    <td>
    <input type ="radio" id="A" name="OptionA" value="A">
    <label for="A">A</label><br>
    <input type ="radio" id="B" name="OptionB" value="B">
    <label for="B">B</label><br>
    </td>
    <form action="would-you-rather.php" method="post">
        <input type= "submit" name ="submit" value="Submit">
    </form>
</form>
<?php
}

// THIS RESETS THE GAME AND PAGE
function reset_game()
{
    echo '<h3></h3>';
}
?>

</body>
</html>