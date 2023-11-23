<?php
session_start();
if(isset($_POST['submit'])) {
$_SESSION["firstname"] = $_POST['fname'];
$_SESSION["lastname"] = $_POST['lname'];
$_SESSION["email"] = $_POST['email'];
$_SESSION["username"] = $_POST['username'];
$_SESSION["pword"] = $_POST['pword'];
$_SESSION["pwordconfirm"] = $_POST['pwordconfirm'];
$_SESSION["registriert"] = $_POST['username'];
if (!isset($_SESSION["success"])) {
    $_SESSION["success"] = "";
  }
if ($_SESSION["pword"] == "admin" && $_SESSION["pwordconfirm"] != "admin") { //passwort muss gleich sein
    echo '<script type="text/javascript">';
    echo 'alert("Passwort stimmt nicht überein!");';
    echo '</script>';
    $_SESSION["pword"] = "falsch";
} else if($_SESSION["username"] == "admin" && $_SESSION["pword"] == "admin") { //wenn sich admin registriert
    echo '<script type="text/javascript">';
    echo 'alert("Sie haben sich erfolgreich registriert!");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
    $_SESSION["success"] = "trueadmin";
} else if ($_SESSION["pword"] == "1234" && $_SESSION["pwordconfirm"] != "1234") { //passwort muss gleich sein
    echo '<script type="text/javascript">';
    echo 'alert("Passwort stimmt nicht überein!");';
    echo '</script>';
    $_SESSION["pword"] = "falsch";
} else if($_SESSION["registriert"] == "user" && $_SESSION["pword"] == "1234") { //wenn sich user registriert
    echo '<script type="text/javascript">';
    echo 'alert("Sie haben sich erfolgreich registriert!");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
    $_SESSION["success"] = "trueuser";
} else { //wenn nicht "admin" eingegebn wird
    echo '<script type="text/javascript">';
    echo 'alert("Etwas ist schiefgelaufen! Versuche Sie es erneut.");';
    echo '</script>';
}
} 
//$cookie_name = "user";
//$cookie_value = $_POST["username"];
//setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // cookie hält für einen tag
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Registrierung</title>
  <?php include "../includes/header.php"; ?>
</head>
<header>
    <h1 class="title">Registrierung</h1>
</header>
<body>
<?php include "nav.php";
?>
<div class="container">
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
