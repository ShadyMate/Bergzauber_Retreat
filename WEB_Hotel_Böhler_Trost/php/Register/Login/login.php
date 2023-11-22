<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../css/stylesheet.css">
    <style>
        h1{
            font-size: 6em;
        }
        nav{
            margin-bottom: 2em;
        }
    </style>
</head>
<body>
<header>
    <h1>Login</h1>
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
                    } //else {
                        //echo '<script type="text/javascript">';
                        //echo 'alert("Sie müssen sich erst einloggen!");';
                        //echo '</script>';
                   // }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <form method="post" class="text-center">
        <?php
        if(isset($_POST['submit'])) {
            $_SESSION["username"] = $_POST['username'];
            $_SESSION["pword"] = $_POST['pword'];
            if($_SESSION["username"] =="admin" && $_SESSION["pword"] == "admin") { //alert für richtige eingabe und leitet auf homepage weiter
            echo '<script type="text/javascript">';
            echo 'alert("Herzlich Willkommen!");';
            echo 'window.location.href = "../../homepage.php";';
            echo '</script>';
        } else { //alert falls der user nicht die richtigen daten eingibt
            echo '<script type="text/javascript">';
            echo 'alert("Etwas ist schief gelaufen!");'; 
            echo '</script>';
        }
        }
    ?>
        <label for="username">Username:</label> <br>
        <input type="text" id="username" name="username" placeholder="Username" autocomplete="on" autofocus required> <br>
        <label for="pword">Passwort:</label><br>
        <input type="password" id="pword" name="pword" placeholder="Passwort" autocomplete="on"><br><br>
        <input type="checkbox" id="myCheckbox">
        <label for="myCheckbox">Remember me</label><br>
        <input type="submit" name = "submit" value="submit">
        <p class="text-center">Noch nicht registriert? <br> Hier geht es zur <a href="registrierung.php">Registrierung</a>!</p>
        <footer class="text-center" >
            <a href="../../homepage.php">Homepage</a>
            <a href="../../impressum.php">Impressum</a>
            <a href="../../faq.php">Hilfe</a>
        </footer>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>
</body>
</html>