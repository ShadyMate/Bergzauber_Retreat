<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once '../includes/dbaccess.php';
include "../includes/insertdbdatazimmer.php";

     $fruehstueck = $_POST['frühstück'] ?? 0;
    $parkplatz = $_POST['parkplatz'] ?? 0;
    $haustiere = $_POST['haustiere'] ?? 0;
    //$_SESSION["gesamtkosten"] = 0;
    /*if (!isset($_SESSION["reservierung"])) {
        $_SESSION["reservierung"] = "";
      }*/
    

    if(isset($_POST['submit'])) {
        //$_SESSION['gesamtkosten'] = $_SESSION["kosten"] + $frühstück + $parkplatz + $haustiere;
        //echo $gesamtkosten;
        echo '<script type="text/javascript">';
        echo 'alert("Die Buchung war erfolgreich!");';
        echo 'window.location.href = "../php/index.php";';
        echo '</script>';
        if ($_SESSION["frühstück"]) {
            echo "Ihnen wird ein köstliches Frühstück gebracht.";
        }
        if ($_SESSION["parkplatz"]) {
            echo "Ihnen wird ein Parkplatz reserviert.";
        }
        if ($_SESSION["haustier"]) {
            echo "Für Ihre Haustiere wird gesorgt.";
        }
    }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Buchung</title>
    <?php include "../includes/header.php"; ?>
</head>
<header>
    <h1 class="title">Zimmer buchen</h1>
</header>
<?php
include "../includes/nav.php";
?>
<body>
    <?php
     if(isset($_GET['kosten'])) {
        $_SESSION["kosten"] = $_GET['kosten'];
     }
     ?>
    <form method="post">
    <label for="kosten">Dieses Zimmer kostet <?php 
    echo $_SESSION["kosten"]; 
    ?>
     Euro pro Nacht.</label>
    <br>
    <br>
    <label for="arrival">Anreisedatum:</label><br>
    <input type="date" id="arrival" name="arrival" required><br>
    <label for="departure">Abreisedatum:</label><br>
    <input type="date" id="departure" name="departure" required><br>
    <input type="checkbox" id="frühstück" name="frühstück" value="10">
    <label for="frühstück"> Frühstück (+30 Euro)</label><br>
    <input type="checkbox" id="parkplatz" name="parkplatz" value="25">
    <label for="parkplatz"> Parkplatz (+10 Euro)</label><br>
    <input type="checkbox" id="haustiere" name="haustiere" value="20">
    <label for="haustiere"> Mitnahme von Haustieren (+50 Euro)</label><br>
    <input type="submit" name="submit" value="Reservieren">
    </form>

    <script>
        document.getElementById('arrival').min = new Date().toISOString().split("T")[0];
        document.getElementById('departure').min = new Date().toISOString().split("T")[0];
        document.getElementById('arrival').addEventListener('change', function() {
        document.getElementById('departure').min = document.getElementById('arrival').value;
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
