<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Homepage</title>
    <?php include "../includes/header.php"; ?>
</head>
<header>
    <h1 class="title">Meine Profildaten</h1>
</header>
<body>
    <?php
 include "nav.php";
    ?>
    <div class="container">
    <form method="post">
    <p>Vorname: <?php echo $_SESSION["firstname"]; ?></p>
    <p>Nachname: <?php echo $_SESSION["lastname"]; ?></p>
    <p>Email: <?php echo $_SESSION["email"]; ?></p>
    <p>Username: <?php echo $_SESSION["username"]; ?></p>
    <?php
      function partialPassword($password, $show = 2, $char = '*') { //die fkt zeigt das passwort nur zum Teil an
        $length = strlen($password);
        return substr($password, 0, $show) . str_repeat($char, $length - $show);
    }
    $password = $_SESSION["pword"];
    echo "Passwort: " . partialPassword($password);
    ?>
    <br>
    <br>
    <a href="change.php">Hier klicken um Ihre Daten zu ändern.</a>
    </form>
    </div>
    <br>
    <?php
        if($_SESSION["reservierung"] == 1) {
        echo '<form>
        <p>Sie haben eine Buchung von ';
        echo $_SESSION["anreise"];
        echo ' bis ';
        echo $_SESSION["abreise"];
        echo ' im Wert von ';
        echo $_SESSION["gesamtkosten"];
        echo '€.</p>
        <label for="arrival">Anreisedatum: ';
        echo $_SESSION["anreise"];
        echo '</label><br>
        <label for="departure">Abreisedatum: ';
        echo $_SESSION["anreise"]; 
        if ($_SESSION["frühstück"] == "Ihnen wird ein köstliches Frühstück gebracht.") {
            echo '<br>';
            echo $_SESSION["frühstück"];
        } else {
            $_SESSION["frühstück"] = "0";
        }
        if ($_SESSION["parkplatz"] == "Ihnen wird ein Parkplatz reserviert.") {
            echo '<br>';
            echo $_SESSION["parkplatz"];
        } else {
            $_SESSION["parkplatz"] = "0";
        }
        if ($_SESSION["haustier"] == "Für Ihre Haustiere wird gesorgt.") {
            echo '<br>';
            echo $_SESSION["haustier"];
        } else {
            $_SESSION["haustier"] = "0";
        }
        echo '</form>';
        }
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>