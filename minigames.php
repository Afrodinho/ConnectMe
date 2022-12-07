<!DOCTYPE html>

<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Kaden Marshall's Mingames</title>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="styleKm.css">
  </head>

    <body>
    <!-- Navigation Bar -->
    <div>
      <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large"
          onclick="w3_close()">Close &times;</button>
          <a href="dashboard.php" class="w3-bar-item w3-button">Home</a>
          <a href="about.php" class="w3-bar-item w3-button">About</a>
          <a href="contact.php" class="w3-bar-item w3-button">Contact</a>
          <a href="mingames.php" class="w3-bar-item w3-button">Minigame</a>
      </div>

      <div id="main">
        <div class="w3-purple">
        <button class="w3-button w3-purple w3-xlarge" onclick="w3_open()" id="openNav">&#9776;</button>
        <div class="w3-container">
      </div>

   
        

    </div>

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

      <h3>


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

        if(key_exists('TIC', $_POST)) {
          TIC();
        }
        function TIC() {
          // echo "You are playing: Tic Tac Toe";
          //require ("ttt.php");
        
      }

      ?>

        <!-- THESE ARE THE BUTTONS  -->

        <form action = "MeetingPrediction.php" method="post">
          <input type="submit" name="MP"
            value="Meeting Prediction"/>
        </form>
    

        <form action = "WouldYouRather.php" method="post">
          <input type="submit" name="WYR"
            value="Would You Rather?"/>
        </form>
      

        <form action = "ttt.php" method="post">
            <input type="submit" name="TIC"
              value="Tic-Tac-Toe"/>
        </form>
    </h3>
</html>