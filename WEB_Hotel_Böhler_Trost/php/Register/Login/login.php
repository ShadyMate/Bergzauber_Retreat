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

</head>
<body>
<header>
    <h1>Login</h1>
</header>
<form method="post">
    <?php
        if(isset($_POST['submit'])) {
            //$user = $_POST['username'];
            //$password = $_POST['pword'];
            $_SESSION["username"] = $_POST['username'];
            $_SESSION["pword"] = $_POST['pword'];
        if($_SESSION["username"] =="admin" && $_SESSION["pword"] == "admin") {
            header("Location: erfolgreichlogin.php");
        } else {
            echo "Benutzername oder Passwort ist falsch! <br>";
        }
        }
    ?>
    <label for="username">Username:</label> <br>
    <input type="text" id="username" name="username" placeholder="Username" autocomplete="on" autofocus required> <br>
    <label for="pword">Passwort:</label><br>
    <input type="password" id="pword" name="pword" placeholder="Passwort" autocomplete="on"><br><br>
    <input type="checkbox" name="rememberusername" id="rememberusername">
    <label for="rememberusername">Login merken</label><br><br>
    <input type="submit" name = "submit" value="submit">
</form>
<p>Noch nicht registriert? <br> Hier geht es zur <a href="registrierung.php">Registrierung</a>!</p>


<footer>
    <div>
        <a href="../../homepage.php">Homepage</a> ||
        <a href="../../impressum.php">Impressum</a> ||
        <a href="../../hilfe.php">Hilfe</a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>