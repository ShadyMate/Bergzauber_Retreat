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
    

    
<style>
.box {
    flex: 1;
    padding: 10px;
}
.container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    
}

@media (min-width: 600px) {
    .container {
        flex-direction: row;
    }
}
</style>
<div class="container">
    <div class="box">
        <form>
        <h3 class="secondary-title">Bergzauber Retreat GMBH</h3>
        <section>
            <p>6764 Lech, Österreich <br>
            Haus Nummer 152, Oberlech 152</p>
        </section>
            <h3 class="secondary-title">Kontakt:</h3>
            <section>
                <p>Tel: +43 699 123 456 78</p>
                <p>Mail: <a href="mailto:if23b274@technikum-wien.at">if23b274@technikum-wien.at</a></p>
            </section>
            <h3 class="secondary-title">Rechtliches</h3>
            <section>
                <p>UID-Nr: ATU87654321</p>
                <p>Mitglied der WKÖ, WKV</p>
                <p>Berufsrecht Hotelier</p>
                <p>Bezirkshauptmannschaft Lech</p>
                <p>Meisterbetrieb, Meisterprüfung abgelegt in Österreich</p>
            </section>
            <h3 class="secondary-title">Beschwerden</h3>
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
    </div>
    <div class="box">
    <form>
            <h3>Administration</h3>
            <img class="picture" src="../res/img/Thomas.jpg" alt="Thomas Trost" height=auto width=auto>
            <p>Thomas Trost<br>Lead Webdevelopment</p>
            <img class="picture" src="../res/img/Luis.jpeg" alt="Luis Böhler" height=auto width=auto>
            <p>Luis Böhler <br>Lead Webdesign</p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
