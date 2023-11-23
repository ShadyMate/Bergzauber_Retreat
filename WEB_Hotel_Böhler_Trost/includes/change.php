<?php
session_start();

unset($_SESSION["firstname"]);
unset($_SESSION["lastname"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);
unset($_SESSION["registriert"]);
if(isset($_POST['change'])) {
$_SESSION["firstname"] = $_POST['fname'];
$_SESSION["lastname"] = $_POST['lname'];
$_SESSION["email"] = $_POST['email'];
$_SESSION["username"] = $_POST['username'];
if($_SESSION["pword"] != $_POST["pword"]) {
    echo '<script type="text/javascript">';
    echo 'alert("Falsches Passwort!");'; 
    echo '</script>';
}
else if($_SESSION["pword"] == $_POST["pword"]) {
    $_SESSION["pword"] = $_POST["newpword"];
    echo '<script type="text/javascript">';
    echo 'alert("Daten erfolgreich geändert!");'; 
    echo 'window.location.href = "../php/index.php";';
    echo '</script>';
}
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <title>Daten ändern</title>
  <?php include "../includes/header.php"; ?>
</head>
<header>
    <h1 class="title">Meine Profildaten</h1>
</header>
<body>
<?php include "nav.php";
?>
<div class="container">
    <form method="post" class="text-center">
    <label for="fname">Vorname:</label><br> 
    <input type="text" id="fname" name="fname" required><br>
    <label for="lname">Nachname:</label><br>
    <input type="text" id="lname" name="lname" required><br>
    <label for="email">E-Mail:</label><br>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="pword">Altes Passwort:</label><br>
    <input type="password" id="pword" name="pword" required><br>
    <label for="newpword">Neues Passwort </label><br>
    <input type="password" id="newpword" name="newpword" required>
    <br><br>
    <input type="submit" id="change" name="change" value="Bestätigen">
    </form>
    <br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>