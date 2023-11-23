<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Impressum</title>
  <?php include "../includes/header.php"; ?>
  <style>
      nav{
          margin-bottom: 1em;
      }
      #main-body{
          width: 70%;
          margin: 1em;
      }
      #sidebar{
          width: 30%;
          display: flex;
          flex-direction: column;
          margin: 1em;
      }
      .split{
          display: flex;
          flex-direction: row;
      }
  </style>
</head>
<body>
<header>
  <h1 class="title">Impressum</h1>
</header>
<?php
include "nav.php";
?>
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
            <img src="../res/img/Thomas.jpg" alt="Thomas Trost" height="35%" width="90%">
            <p>Thomas Trost<br>Lead Webdevelopment</p>
            <img src="../res/img/Luis.jpeg" alt="Luis Böhler" height="30%" width="90%">
            <p>Luis Böhler <br>Lead Webdesign</p>
        </aside>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
