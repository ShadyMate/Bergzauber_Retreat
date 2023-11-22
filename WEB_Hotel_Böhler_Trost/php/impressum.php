<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Impressum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
  <style>
      nav{
          margin-bottom: 2em;
      }
      #main-body{
          width: 70%;
      }
      #sidebar{
          width: 30%;
          display: flex;
          flex-direction: column;
      }
      .split{
          display: flex;
          flex-direction: row;
      }
  </style>
</head>

<body>
<header>
  <h1>Impressum</h1>
</header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php"><img src="../res/img/Logo.png" alt="Logo" width="50" height="50">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Register/Login/registrierung.php" style="font-size: 25px;">Registrierung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Register/Login/login.php" style="padding-left: 20px; font-size: 25px;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php" style="padding-left: 20px; font-size: 25px;">Hilfe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="impressum.php" style="padding-left: 20px; font-size: 25px;">Impressum</a>
                </li>
                <li class="nav-item">
                    <?php
                    if ($_SESSION["username"] == "admin" && $_SESSION["pword"] == "admin") {
                        echo '<a class="nav-link" href="Register/Login/Profil.php" style="padding-left: 20px; font-size: 25px;">Profil</a>';
                    } else {
                        echo '<script type="text/javascript">';
                        echo 'alert("Sie müssen sich erst einloggen!");';
                        echo '</script>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="split">
    <form class="text-center" id="main-body">
    <h3>Bergzauber Retreat GMBH</h3>
    <section>
        <p>1220 Wien <br>
        Straße 123, Österreich </p>
    </section>
    <h3>Kontakt:</h3>
    <section>
        <p>Tel: +43 699 XXX XXXX</p>
        <p>Mail: </p>
    </section>
  <h3>Rechtliches</h3>
    <section>
        <p>UID-Nr: ATU87654321</p>
        <p>Mitglied der WKÖ, WKW</p>
        <p>Berufsrecht <!-- Placeholder--></p>
        <p>Bezirkshauptmannschaft Brigittenau</p>
        <p>Meisterbetrieb, Meisterprüfung abgelegt in Österreich</p>
    </section>
    <h3>Beschwerden</h3>
    <section>
        <p>Verbraucher haben die Möglichkeit,<br>
        Beschwerden an die Online Streitbeilegungsplattform der EU zu richten:<br>
        <a href="http://ec.europa.eu/odr">http://ec.europa.eu/odr</a></p>
        <p>Sie können allfällige Beschwerde auch an <br>
        die oben angegebene E-Mail-Adresse <br>
        richten.</p>
    </section>
    <br>
    <section>
        <p>Bei weiteren Fragen wenden sie sich an unser <a href="faq.php">FAQ</a></p>
    </section>

    </form>
    <form class="text-center" id="sidebar">
        <aside>
            <h3>Administration</h3>
            <img src="../res/img/Thomas.jpg" alt="Thomas Trost" height="35%" width="30%">
            <p>Thomas Trost<br>Lead Webdevelopment</p>
            <img src="../res/img/Luis.jpeg" alt="Luis Böhler" width="30%" height="30%">
            <p>Luis Böhler <br>Lead Webdesign</p>
        </aside>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<!--
<aside>
  <div style="position: relative; left:1200px; bottom:720px">
    <img src="../res/img/Luis.jpeg" alt="Luis Böhler" width="5%" height="5%"/>
    <p>Luis Böhler</p>
    <p>Administration</p>
    <br>
    <img src="../res/img/Thomas.jpg" alt="Thomas Trost" width="5%" height="5%">
    <p>Thomas Trost</p>
    <p>Administration</p>
  </div>
</aside> -->
</html>