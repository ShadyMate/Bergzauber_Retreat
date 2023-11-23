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
    echo 'window.location.href = "http://localhost/webtechnologie/Semesterprojekt/Web_Hotel_Project/WEB_Hotel_Böhler_Trost/php/homepage.php"';
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
    <h1 class="hotelname">Meine Profildaten</h1>
</header>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../php/index.php"><img src="../res/img/Logo.png" alt="Logo" width="50" height="50">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="registrierung.php">Registrierung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faq.php">Hilfe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="impressum.php">Impressum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Profil.php">Profil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <form method="post" class="formclass">
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
    <input type="submit" id="change" name="change" value="Bestätigen">';
    </form>
    <br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>