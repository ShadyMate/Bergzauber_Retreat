<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
/*$calling_file = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION["username"])) {
  $_SESSION["username"] = "";
}
if (!isset($_SESSION["loggedin"])) {
  $_SESSION["loggedin"] = "";
}
if (!isset($_SESSION["registriert"])) {
  $_SESSION["registriert"] = "";
}*/
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../php/index.php"><img src="../res/img/Logo.png" alt="Logo" width="50" height="50">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        
        </li>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
include_once 'dbaccess.php';
/*if (is_resource($conn) && get_resource_type($conn) === 'mysql link') {
  mysqli_close($conn);
}*/
if (isset($_SESSION['username'])) {
  echo '<a class="nav-link" href="../php/Profil.php" style="padding-left: 20px; font-size: 25px;">Profil</a>';
} else {
  echo '<a class="nav-link" href="../php/registrierung.php" style="padding-left: 20px; font-size: 25px;">Registrieren</a><a class="nav-link" href="../php/login.php" style="font-size: 25px;">Login</a>';
}


       /*if (isset($_SESSION['username'])) {
              echo '<a class="nav-link" href="../includes/Profil.php" style="padding-left: 20px; font-size: 25px;">Profil</a>';
              //echo "Willkommen " . $_SESSION['username'] . "!";
       } else {
        echo '<a class="nav-link" href="../includes/registrierung.php" style="font-size: 25px;">Registrierung</a>';
       }*/
       //session_destroy();
       ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/Zimmer.php" style="padding-left: 20px; font-size: 25px;">Zimmer</a>
        <li class="nav-item">
          <a class="nav-link" href="../php/faq.php" style="padding-left: 20px; font-size: 25px;">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/news.php" style="padding-left: 20px; font-size: 25px;">News</a>
        </li>
        <li class="nav-item">
      </li>
      </ul>
    </div>
  </div>
</nav>