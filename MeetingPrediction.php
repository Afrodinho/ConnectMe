<!DOCTYPE html>

<!-- THIS IS REFERENCES FOR UI -->
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>MeetingPrediction</title>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="styleKm.css">
  </head>

    <body>
    <!-- Navigation Bar -->
    <div>
      <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large"
          onclick="w3_close()">Close &times;</button>

        <!-- THIS IS LINKS THE DIFFERENT FILES TOGETHER -->
          <a href="dashboard.php" class="w3-bar-item w3-button">Home</a>
          <a href="about.php" class="w3-bar-item w3-button">About</a>
          <a href="contact.php" class="w3-bar-item w3-button">Contact</a>
          <a href="mingames.php" class="w3-bar-item w3-button">Minigames</a>
      </div>

        <!-- THIS IS FOR THE NAVIGATION BAR UI -->
      <div id="main">
        <div class="w3-purple">
        <button class="w3-button w3-purple w3-xlarge" onclick="w3_open()" id="openNav">&#9776;</button>
        <div class="w3-container">

            <h1>
            </h1>
      </div>

        <!-- THESE ARE THE BUTTONS AND NAVIGATION FOR THE GAMES -->

        <form action = "minigames.php" method = "post">
            <input type = "submit" name = "Back" value = "Back to Minigames Page">
        </form>

        <form action = "MeetingPrediction.php" method="post">
          <input type="submit" name="MP"
            value="Meeting Prediction"/>
        </form>
    

        <form action ="WouldYouRather.php"method="post">
          <input type="submit" name="WYR"
            value="Would You Rather?"/>
        </form>
        

    </div>

    <!-- Script for opening and closing animation for the menu -->
    <script>
    function w3_open() {
    document.getElementById("main").style.marginLeft = "25%";
    document.getElementById("mySidebar").style.width = "25%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
    }
    function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
    }
    </script>

    </body>


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
    $file= "MP.txt";
    $outlook =file($file);
    srand((double)microtime()*1000000);
    $randomoutlook = rand(0, count($outlook)-1);
    echo $outlook[$randomoutlook];
}

// THIS RESETS THE GAME AND PAGE
function reset_game()
{
    echo '<h3>Page Has Been Reset!</h3>';
}
?>

</body>
</html>

    

            

