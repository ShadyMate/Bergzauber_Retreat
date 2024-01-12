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
    <title>Aktivitaeten</title>
    <?php include "../includes/header.php"; ?>
</head>
<body>
<header>
    <h1 class="title">Aktivitäten</h1>
</header>
<?php include "../includes/nav.php"; ?>
<div class="card-group">
    <div class="card">
        <div class="card-body text-center">
            <h4 class="card-title">Wanderwege</h4>
            <p class="card-text">Erkunden sie die Alpen Vorarlbergs, und entdecken sie die Natur! Im Sommer so wie auch im Winter gibt es eine Vielzahl an Wanderwegen in der Nähe.</p>
            <p class="card-text">Für nähere Informationen wenden sie sich an die Rezeption für Beratung oder ein Prospekt.</p>
            <p class="card-text">Nähere Informationen können sie auch unter <a href="https://atlas.vorarlberg.at/portal/map/Sport%20und%20Freizeit/Wandern">atlas.vorarlberger.at</a> finden.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h4 class="card-title">Ski fahren</h4>
            <p class="card-text">In der Wintersaison können sie die Pisten von Lech genießen, oder mit der Skischaukel auf den Arlberg fahren.</p>
            <p class="card-text">Für alle Hotelgäste steht auch ein Skikeller zur Verfügung.</p>
            <p class="card-text">Die Skipisten haben im Winter täglich von 08:45-16:50 geöffnet.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h4 class="card-title">Klettern</h4>
            <p class="card-text">Für unsere etwas abenteuer lustigeren Gäste gibt es auch einige Klettersteige in der Umgebung.</p>
            <p class="card-text">Kletterausrüstung kann für 10€ pro Tag bei uns ausgeliehen werden.</p>
            <p class="card-text">Für nähere Informationen wenden sie sich an die Rezeption.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h4 class="card-title">Gastronomie</h4>
            <p class="card-text">Unser mit zwei Michelin Sternen ausgezeichnetes Restaurant <em>Die Gefüllte Gans</em> freut sich schon sie begrüßen zu dürfen.</p>
            <p class="card-text">Mittagessen wird täglich von 11:00-14:00 serviert. Abendessen von 17:00-21:00.</p>
            <p class="card-text">Nach dem Abendessen laden wir sie auch herzlich ein, sich an unserer Bar zu entspannen. Diese hat von 19:00-23:00 geöffnet.</p>
        </div>
    </div>
</div>
<?php include "../includes/footer.php"; ?>
</body>
</html>

