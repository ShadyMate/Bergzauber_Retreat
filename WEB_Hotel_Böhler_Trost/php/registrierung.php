<!DOCTYPE html>
<html lang="de">
<head>
    <title>Registrierung</title>
  <?php include "../includes/header.php";
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once '../includes/dbaccess.php';
include "../includes/insertdbdata";
?>
</head>
<header>
    <h1 class="title">Registrierung</h1>
</header>
<body>
<?php include "../includes/nav.php";
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
        <input type="text" id="fname" name="fname" required><br>
        <label for="lname">Nachname:</label><br>
        <input type="text" id="lname" name="lname" required><br>
        <label for="email">E-Mail:</label><br>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="pword">Passwort:</label><br>
        <input type="password" id="pword" name="pword" required><br>
        <label for="pwordconfirm">Passwort Bestätigen:</label><br>
        <input type="password" id="pwordconfirm" name="pwordconfirm" required>
        <br><br>
        <input type="submit" name="submit" value="Absenden"> 
        <input type="reset">
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include "../includes/footer.php"; ?>
</body>
</html>
