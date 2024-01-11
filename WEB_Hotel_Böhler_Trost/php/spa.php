<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once '../includes/dbaccess.php';
?>
<!DOCTYPE html>
<html lang="de">
<style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
<head>
    <meta charset="UTF-8">
    <title>Spa</title>
    <?php include "../includes/header.php"; ?>
</head>
<body>
<header>
    <h1 class="title">Spa Angebot</h1>
</header>
<?php include "../includes/nav.php"; ?>
<div class="card-group">
    <div class="card">
        <div class="card-body text-center">
            <h4 class="card-title">Massagen</h4>
            <p class="card-text">Wir bieten eine Vielzahl an verschiedenen Massagen von der klassischen Massage bishin zur Thai Massage.</p>
            <p class="card-text">Preis: Ab 75€ pro Stunde</p>
            <p class="card-text">Dauer: 1 Stunde</p>
            <p class="card-text">Um dieses Angebot zu Buchen wenden sie sich an die Rezeption.</p>
        </div>
    </div>
<div class="card">
     <div class="card-body text-center">
        <h4 class="card-title">Alpenblick Sauna</h4>
         <p class="card-text">Unsere Alpenblick Sauna ist der perfekte Ort zum entspannen, genießen sie den wunderschönen Ausblick über die Vorarlberger Alpen bei angenehmen 70-80 Grad Celsius.</p>
         <p class="card-text">Die Sauna ist für alle Hotelgäste verfügbar</p>
         <p class="card-text">Öffnungszeiten: 07:00-18:30</p>
     </div>
</div>
    <div class="card">
        <div class="card-body text-center">
            <h4 class="card-title"> Finnische Sauna</h4>
            <p class="card-text">Für geübte Saunabesucher bieten wir auch eine Finnische Sauna mit Temperaturen von 90-100 Grad Celsius.</p>
            <p class="card-text">Die Sauna ist für alle Hotelgäste verfügbar</p>
            <p class="card-text">Öffnungszeiten: 07:00-18:30</p>
            <p class="card-text">Für Aufgüsse wenden sie sich bitte an das Spa Personal.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
           <h4 class="card-title">Alpenblick Pool</h4>
            <p class="card-text">Genießen sie den wünderschönen Ausblick sowohl Indoor als auch Outdoor in unserem beheizten Pool.</p>
            <p class="card-text">Der Pool ist für alle Hotelgäste verfügbar</p>
            <p class="card-text">Öffnungszeiten: 07:00-18:00</p>
        </div>
    </div>
</div>
<?php include "../includes/footer.php"; ?>
</body>
</html>

