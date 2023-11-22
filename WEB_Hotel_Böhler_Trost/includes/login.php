<?php
session_start();

if(isset($_POST['submit'])) {
    $_SESSION["username"] = $_POST['username'];
    $_SESSION["pword"] = $_POST['pword'];
    if($_SESSION["username"] =="admin" && $_SESSION["pword"] == "admin") { //alert für richtige eingabe und leitet auf homepage weiter --> als admin eingeloggt
    echo '<script type="text/javascript">';
    echo 'alert("Herzlich Willkommen!");';
    echo 'window.location.href = "../php/index.php";';;
    echo '</script>';
} else if($_SESSION["registriert"] =="user" && $_SESSION["pword"] == "1234") {
    echo '<script type="text/javascript">';
    echo 'alert("Herzlich Willkommen!");';
    echo 'window.location.href = "../php/index.php";';
    echo '</script>';
}
else { //alert falls der user nicht die richtigen daten eingibt
    echo '<script type="text/javascript">';
    echo 'alert("Etwas ist schief gelaufen!");'; 
    echo '</script>';
}
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Login</title>
    <?php include "../includes/header.php"; ?>
    <style>
        h1{
            font-size: 6em;
        }
    </style>
</head>
<body>
<header>
    <h1>Login</h1>
</header>
        <?php
        include "nav.php";
                    if ($_SESSION["username"] == "admin" && $_SESSION["pword"] == "admin") {
                        echo '<a class="nav-link" href="Profil.php" style="padding-left: 20px; font-size: 25px;">Profil</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <form method="post" class="text-center">
    <form class="text-center">
    <form method="post" class="text-center">
        
        <label for="username">Username:</label> <br>
        <input type="text" id="username" name="username" placeholder="Username" autocomplete="on" autofocus required> <br>
        <label for="pword">Passwort:</label><br>
        <input type="password" id="pword" name="pword" placeholder="Passwort" autocomplete="on"><br><br>
        <input type="checkbox" id="myCheckbox">
        <label for="myCheckbox">Remember me</label><br>
        <input type="submit" name = "submit" value="submit">
        <p class="text-center">Noch nicht registriert? <br> Hier geht es zur <a href="registrierung.php">Registrierung</a>!</p>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</form>
</body>
</html>