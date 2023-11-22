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
    <a class="navbar-brand" href="../../homepage.php"><img src="../../../res/img/Logoneu.png" alt="Logo" width="50" height="50">Home</a>
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
          <a class="nav-link" href="../../hilfe.php">Hilfe</a>
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
    <label for="pwordconfirm">Neues Passwort </label><br>
    <input type="password" id="newpword" name="newpword" required>
    <br><br>
    <input type="submit" id="change" name="change" value="Bestätigen">
    <?php
        unset($_SESSION["firstname"]);
        unset($_SESSION["lastname"]);
        unset($_SESSION["email"]);
        unset($_SESSION["username"]);
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
            echo 'window.location.href = "Profil.php";';
            echo '</script>';
        }
    }
    ?>
    </form>
    <br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>