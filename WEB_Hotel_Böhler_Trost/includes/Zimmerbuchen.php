<?php
session_start();

    $frühstück = isset($_POST['frühstück']) ? $_POST['frühstück'] : 0;
    $parkplatz = isset($_POST['parkplatz']) ? $_POST['parkplatz'] : 0;
    $haustiere = isset($_POST['haustiere']) ? $_POST['haustiere'] : 0;
    $_SESSION["gesamtkosten"] = 0;
    $_SESSION["anreise"] = $_POST['arrival'] ?? '';
    $_SESSION["abreise"] = $_POST['departure'] ?? '';
    if (!isset($_SESSION["reservierung"])) {
        $_SESSION["reservierung"] = "";
      }
    

    if(isset($_POST['submit'])) {
        $_SESSION["gesamtkosten"] = $_SESSION["kosten"] + $frühstück + $parkplatz + $haustiere;
        //echo $gesamtkosten;
        $_SESSION["reservierung"] = 1;
        echo '<script type="text/javascript">';
        echo 'alert("Die Buchung war erolgreich!");'; 
        echo 'window.location.href = "../php/index.php";';
        echo '</script>';
        if ($frühstück != 0) {
            $_SESSION["frühstück"] = "Ihnen wird ein köstliches Frühstück gebracht.";
        }
        if ($parkplatz != 0) {
            $_SESSION["parkplatz"] = "Ihnen wird ein Parkplatz reserviert.";
        }
        if ($haustiere != 0) {
            $_SESSION["haustier"] = "Für Ihre Haustiere wird gesorgt.";
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
     Euro</label>
    <br>
    <br>
    <label for="arrival">Anreisedatum:</label><br>
    <input type="date" id="arrival" name="arrival" required><br>
    <label for="departure">Abreisedatum:</label><br>
    <input type="date" id="departure" name="departure" required><br>
    <input type="checkbox" id="frühstück" name="frühstück" value="10">
    <label for="frühstück"> Frühstück (+10 Euro)</label><br>
    <input type="checkbox" id="parkplatz" name="parkplatz" value="25">
    <label for="parkplatz"> Parkplatz (+25 Euro)</label><br>
    <input type="checkbox" id="haustiere" name="haustiere" value="20">
    <label for="haustiere"> Mitnahme von Haustieren (+20 Euro)</label><br>
    <input type="submit" name="submit" value="Reservieren">
    </form>

    <script>
        document.getElementById('departure').min = new Date().toISOString().split("T")[0];
        document.getElementById('arrival').addEventListener('change', function() {
        document.getElementById('departure').min = document.getElementById('arrival').value;
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
