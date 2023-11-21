<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<header>
    <h1 style="color: #FFFFFF" class="hotelname">Bergzauber Retreat</h1>
</header>
<body>

    <style>
        body {
          background-image: url('../res/img/Hotel.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: 100% 100%;
        }
        </style>
        
<nav class="navbar navbar-expand-lg bg-body-tertiary" >
  <div class="container-fluid">
    <a class="navbar-brand" href="homepage.php"><img src="../../WEB_Hotel_Böhler_Trost/res/img/Logoneu.png" alt="Logo" width="50" height="50">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="Register/Login/registrierung.php">Registrierung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Register/Login/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hilfe.php">Hilfe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="impressum.php">Impressum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Register/Login/Profil.php">Profil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="row w-100 p-3 mx-auto p-2" style="width: 120px;">
    <div class="col-sm">
      <div class="card">
        <img src="../res/img/hotelzimmer.jpg" class="card-img-top" alt="Hotelzimmer">
        <div class="card-body">
          <h5 class="card-title">Zimmer Buchen.</h5>
          <p class="card-text">Hier finden Sie alle Angebote, sowie Infos zur Buchung</p>
          <a href="Zimmer/Zimmer.php" class="btn btn-primary">Click me</a>
        </div>
      </div>
    </div>
    <div class="col-sm">
      <div class="card">
        <img src="../res/img/radfahren.jpg" class="card-img-top" alt="Radweg">
        <div class="card-body">
          <h5 class="card-title">Freizeitaktivitäten</h5>
          <p class="card-text">In unsere Gegend gibt es viel zu sehen! Hier finden Sie unsere Empfehlungen.</p>
        </div>
      </div>
    </div>
    <div class="col-sm">
      <div class="card">
        <img src="../res/img/SpaImage.jpeg" class="card-img-top" alt="Spa" height="250px">
        <div class="card-body">
          <h5 class="card-title">Unser Spa-Bereich</h5>
          <p class="card-text">Hier können Sie eine erholsame Zeit verbringen.</p>
        </div>
      </div>
    </div>
  </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
