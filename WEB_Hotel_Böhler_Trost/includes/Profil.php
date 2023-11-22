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
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<header>
    <h1 class="hotelname">Meine Profildaten</h1>
</header>
<body>
    <?php
 include "nav.php";
    echo '<form method="post" class="formclass">
    <p>Vorname: <?php echo $_SESSION["firstname"]; ?></p>
    <p>Nachname: <?php echo $_SESSION["lastname"]; ?></p>
    <p>Email: <?php echo $_SESSION["email"]; ?></p>
    <p>Username: <?php echo $_SESSION["username"]; ?></p>';
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
    <br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>