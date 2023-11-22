<?php
session_start();
?>
echo '<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
     if(isset($_GET['kosten'])) {
        $_SESSION["kosten"] = $_GET['kosten'];
     }
     echo $_SESSION["kosten"];
     ?>
    <form>
    <label for="kosten"><?php 'Dieses Zimmer kostet '; 
    echo $_SESSION["kosten"]; 
    ?>
     Euro</label>
    <br>
    <br>
    <input type="checkbox" id="frühstück" name="frühstück">
    <label for="frühstück"> Frühstück (+10 Euro)</label><br>
    <input type="checkbox" id="parkplatz" name="parkplatz">
    <label for="parkplatz"> Parkplatz (+25 Euro)</label><br>
    <input type="checkbox" id="haustiere" name="haustiere">
    <label for="haustiere"> Mitnahme von Haustieren (+20 Euro)</label><br>
    <input type="submit" value="Reservieren">
    </form>
</body>
</html>
