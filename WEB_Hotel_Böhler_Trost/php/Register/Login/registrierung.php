<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../css/stylesheet.css">
</head>
<body>
<header>
    <h1>Registrierung</h1>
</header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../homepage.php"><img src="../../../res/img/Logo.png" alt="Logo" width="50" height="50">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="registrierung.php" style="font-size: 25px;">Registrierung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" style="padding-left: 20px; font-size: 25px;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../faq.php" style="padding-left: 20px; font-size: 25px;">Hilfe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../impressum.php" style="padding-left: 20px; font-size: 25px;">Impressum</a>
                </li>
                <li class="nav-item">
                    <?php
                    if ($_SESSION["username"] == "admin" && $_SESSION["pword"] == "admin") {
                        echo '<a class="nav-link" href="Profil.php" style="padding-left: 20px; font-size: 25px;">Profil</a>';
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
<form class="text-center">
    <form method="post">
        <label for="anrede">Anrede:</label><br>
        <select id="anrede" name="anrede">
            <option value="Frau">Frau</option>
            <option value="Herr">Herr</option>
            <option value=" ">Leer/Divers</option>
        </select><br>
        <label for="fname">Vorname:</label><br> 
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Nachname:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="email">E-Mail:</label><br>
        <input type="email" id="email" name="email">
        <br><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="pword">Passwort:</label><br>
        <input type="password" id="pword" name="pword"><br>
        <label for="pwordconfirm">Passwort Bestätigen:</label><br>
        <input type="password" id="pwordconfirm" name="pwordconfirm">
        <br><br>
        <input type="submit" name="submit" value="Absenden"><br><br>
        <input type="reset">
    </form>
</form>
<?php
        if(isset($_POST['submit'])) {
        $_SESSION["firstname"] = $_POST['fname'];
        $_SESSION["lastname"] = $_POST['lname'];
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["pword"] = $_POST['pword'];
        $_SESSION["pwordconfirm"] = $_POST['pwordconfirm'];
        //echo $_SESSION["username"];
        //echo $_SESSION["pword"];
        if ($_SESSION["pword"] == "admin" && $_SESSION["pwordconfirm"] != "admin") { //passwort muss gleich sein
            echo '<script type="text/javascript">';
            echo 'alert("Passwort stimmt nicht überein!");';
            echo '</script>';
        } else if($_SESSION["username"] == "admin" && $_SESSION["pword"] == "admin") { //wenn daten richtig eingegeben werden
            echo '<script type="text/javascript">';
            echo 'alert("Sie haben sich erfolgreich registriert!");';
            echo 'window.location.href = "../../homepage.php";';
            echo '</script>';
        } else { //wenn nicht "admin" eingegebn wird
            echo '<script type="text/javascript">';
            echo 'alert("Etwas ist schiefgelaufen! Versuche Sie es erneut.");';
            echo '</script>';
        }
        } 
        ?>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>