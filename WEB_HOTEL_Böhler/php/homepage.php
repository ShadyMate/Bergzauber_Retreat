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
    <h1 class="hotelname">Bergzauber Retreat Homepage</h1>
</header>
<body>

    <style>
        body {
          background-image: url('/WEB_HOTEL_Böhler/res/img/Hotel.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: 100% 100%;
        }
        </style>

<div>
    <div class="row grid text-center">
        <div class="col-sm">
            <h2><a class="btn btn-primary" href="registrierung.html" role="button">Registrierung</a></h2></button>
        </div>
        <div class="col-sm">
            <h2><a class="btn btn-primary" href="login.php" role="button">Login</a></h2>
        </div>
        <div class="col-sm">
            <h2><a class="btn btn-primary" href="impressum.html" role="button">Impressum</a></h2>
        </div>
        <div class="col-sm">
            <h2><a class="btn btn-primary" href="hilfe.html" role="button">FAQ</a></h2>
        </div>
    </div>
</div> 
    <div class="row w-100 p-3 mx-auto p-2" style="width: 120px;">
    <div class="col-sm">
      <div class="card">
        <img src="../res/img/hotelzimmer.jpg" class="card-img-top" alt="Hotelzimmer">
        <div class="card-body">
          <h5 class="card-title">Zimmer Buchen.</h5>
          <p class="card-text">Hier finden Sie alle Angebote, sowie Infos zur Buchung</p>
          <a href="Zimmer.php" class="btn btn-primary">Click me</a>
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
        <img src="../res/img/Spa.a6itg.7qnEO8xn.jpeg" class="card-img-top" alt="Spa">
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
