<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<header>
    <h2>Registrieren</h2>
    <h4>Bereits registriert? <br> Hier gehts zum <a href="login.html">Login</a>!</h4>
</header>
<section>
    <form action="registrierung.php" method="post">
        <?php
        $_SESSION["firstname"] = $_POST['fname'];
        $_SESSION["lastname"] = $_POST['lname'];
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["pword"] = $_POST['pword'];
        //echo $_SESSION["username"];
        //echo $_SESSION["pword"];
        if(isset($_POST['submit'])) {
            $user = $_POST['username'];
            $password = $_POST['pword'];
        if($user == "admin" && $password == "admin") {
            echo "Erfolgreich registriert! <br>";
        } else {
            echo "Registrierung fehlgeschlagen! <br>";
        }
        } 
        ?>
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
</section>
<br>
<footer>
    <div>
        <a href="homepage.html">Homepage</a> ||
        <a href="impressum.html">Impressum</a> ||
        <a href="hilfe.html">Hilfe</a>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>