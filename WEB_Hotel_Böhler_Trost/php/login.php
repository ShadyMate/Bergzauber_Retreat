<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once '../includes/dbaccess.php';
//wenn username und passwort eingegeben werden, wird das passwort gehasht und mit dem in der datenbank verglichen
if (isset($_POST['username']) && isset($_POST['pword'])) {
    //username und passwort aus dem Formular abrufen und in session speichern
    $username = $_POST['username'];
    $_SESSION['username'] = $_POST['username'];
    $password = $_POST['pword']; // Passwort im Klartext
    $_SESSION["pword"] = $_POST['pword'];

    $sql = "SELECT Aktiviert, Passwort FROM user WHERE username = '$username'";
    $result = $conn->query($sql);
    //passwort und aktiviert aus der datenbank abrufen
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $hashed_password = $row['Passwort'];
            $_SESSION["aktiviert"] = $row["Aktiviert"];
        }
        
        if (password_verify($password, $hashed_password) && $_SESSION["aktiviert"] == 1) { //überprüft ob das passwort richtig ist
            $sql = "SELECT userid, Aktiviert, Rechte, Username, Passwort, Email, Vorname, Nachname FROM user WHERE username = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    //alle daten des users sind jetzt in sessions gespeichert
                    $_SESSION["email"] = $row["Email"];
                    $_SESSION["firstname"] = $row["Vorname"];
                    $_SESSION["lastname"] = $row["Nachname"];
                    $_SESSION["userid"] = $row["userid"];
                    $_SESSION["aktiviert"] = $row["Aktiviert"];
                    $_SESSION["rechte"] = $row["Rechte"];
                    echo "<script>alert('Erfolgreich eingeloggt!'); window.location.href='../php/index.php';</script>";
                    exit();
                }
            if(isset($_POST['submit'])) {
                header('Location: ../php/index.php');
              }
            }
        } else if ($_SESSION["aktiviert"] == 0) {
            echo "<script>alert('Ihr Account wurde deaktiviert!'); window.location.href='../php/login.php';</script>";
            session_destroy();
        } else {
            echo "<script>alert('Falsches Passwort!'); window.location.href='../php/login.php';</script>";
            session_destroy();
        }
    } else {
        echo "<script>alert('Falscher Benutzername!'); window.location.href='../php/login.php';</script>";
        session_destroy();
    }
}

?>
<!DOCTYPE html>
<html lang="de">
<style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
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
    <h1 class="title">Login</h1>
</header>
<?php
include "../includes/nav.php";
?>
<div class="container">
    <form method="post" class="text-center">
        
        <label for="username">Username:</label> <br>
        <input type="text" id="username" name="username" placeholder="Username" autocomplete="on" autofocus required> <br>
        <label for="pword">Passwort:</label><br>
        <input type="password" id="pword" name="pword" placeholder="Passwort" autocomplete="on"><br><br>
        <input type="checkbox" id="myCheckbox">
        <label for="myCheckbox">Remember me</label><br>
        <input type="submit" name = "submit" value="Login">
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include "../includes/footer.php"; ?>
</body>
</html>