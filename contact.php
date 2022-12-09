<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaden Marshall's Contact</title>
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
            <a href="minigames.php" class="w3-bar-item w3-button">Minigame</a>
            </div>

        <div id="main">
            <div class="w3-purple">
            <button class="w3-button w3-purple w3-xlarge" onclick="w3_open()" id="openNav">&#9776;</button>
            <div class="w3-container">
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


    <div id="contact" class="w3-content"></div>
    <h1>Contact Me</h1>
    <p id="msg">Contact Information:</p>
    <ul>
      <li class="list">Email: Kmm2hb@umsystem.edu</li>
      <li class="list">Linkedin: <a href="https://www.linkedin.com/in/kaden-marshall-951b4a113/" target="_blank">Kaden Marshall</a> </li>
    </ul>
    <div>
            <!-- Buisiness Card -->

            <div class="w3-card" style="width:200px">
                <img src="images/Biz.jpeg" alt="image is not available" style="width:100%">
                <div class="w3-container w3-center">
                  <p class="w3-xlarge">Kaden Marshall</p>
                  <p>Information Technology</p>
    </div>
</body>
</html>