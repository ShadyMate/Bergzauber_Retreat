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
    <link rel="stylesheet" type="text/css" href="../../../css/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<header>
    <h1 class="hotelname">Meine Profildaten</h1>
</header>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../homepage.php"><img src="../../../res/img/Logo.png" alt="Logo" width="50" height="50">Home</a>
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
          <a class="nav-link" href="../../faq.php">Hilfe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../impressum.php">Impressum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Profil.php">Profil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<form method="post">
    <?php //die sessions zeigen die daten an, welche der user eingegeben hat. erstelle für vorname/nachname einen submit button und schreib dann die veränderten daten mit php dahin
    // also zb: if(isset($_POST['neuerBenutzername'])){
          //$_SESSION["username"] = $_POST['neuerBenutzername'];
        //} und dann -> echo Neuer Benutzername: <input type="text" name="neuerBenutzername"><br>
        echo "Vorname: ";
        echo $_SESSION["firstname"];
        echo "<br>Nachname: ";
        echo $_SESSION["lastname"];
        echo "<br>Email: ";
        echo $_SESSION["email"];
        echo "<br>Username: ";
        echo $_SESSION["username"];
        function partialPassword($password, $show = 2, $char = '*') { //die fkt zeigt das passwort nur zum Teil an
            $length = strlen($password);
            return substr($password, 0, $show) . str_repeat($char, $length - $show);
        }
        $password = $_SESSION["pword"];
        echo "<br>Passwort: " . partialPassword($password);

        
    ?>
     
    <br>
    <input type="submit" id="change" name="submit" value="Daten ändern">
    
    <br>
  <label for="fname">Vorname:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Nachname:</label><br>
  <input type="text" id="lname" name="lname"><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br>
  <label for="username">Benutzername:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Passwort:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Einreichen">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>