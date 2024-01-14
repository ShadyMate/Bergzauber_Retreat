<?php /*
session_start();

if (!isset($_SESSION["registriert"])) {
  $_SESSION["registriert"] = "";
}
if (!isset($_SESSION["pword"])) {
  $_SESSION["pword"] = "";
}
if(isset($_POST['submit'])) {
    $_SESSION["username"] = $_POST['username'];
    $_SESSION["pword"] = $_POST['pword'];
    if($_SESSION["username"] =="admin" && $_SESSION["pword"] == "admin" && $_SESSION["success"] == "trueadmin") { //alert für richtige eingabe und leitet auf homepage weiter → als admin eingeloggt
    echo '<script type="text/javascript">';
    echo 'alert("Herzlich Willkommen!");';
    echo 'window.location.href = "../php/index.php";';
    echo '</script>';
} else if($_SESSION["registriert"] =="user" && $_SESSION["pword"] == "1234" && $_SESSION["success"] == "trueuser") { //alert als user angemeldet
    echo '<script type="text/javascript">';
    echo 'alert("Herzlich Willkommen!");';
    echo 'window.location.href = "../php/index.php";';
    echo '</script>';
} else { //alert falls der user nicht die richtigen daten eingibt
    echo '<script type="text/javascript">';
    echo 'alert("Etwas ist schief gelaufen!");'; 
    echo '</script>';
}
} */
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once '../includes/dbaccess.php';
if (isset($_POST['username']) && isset($_POST['pword'])) {
    //username und passwort aus dem Formular abrufen und in session speichern
    $username = $_POST['username'];
    $_SESSION['username'] = $_POST['username'];
    $password = $_POST['pword']; // Passwort im Klartext
    $_SESSION["pword"] = $_POST['pword'];

    $sql = "SELECT userid, Aktiviert, Rechte, Username, Passwort, Email, Vorname, Nachname FROM user WHERE username = '$username'";
    $result = $conn->query($sql);
    //alle daten des users sind jetzt in sessions gespeichert
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $hashed_password = $row['Passwort'];
            $_SESSION["aktiviert"] = $row["Aktiviert"];
            /*$_SESSION["email"] = $row["Email"];
            $_SESSION["firstname"] = $row["Vorname"];
            $_SESSION["lastname"] = $row["Nachname"];
            $_SESSION["userid"] = $row["userid"];
            $_SESSION["aktiviert"] = $row["Aktiviert"];
            $_SESSION["rechte"] = $row["Rechte"];*/
            //echo $_SESSION["firstname"];
        }
        
        if (password_verify($password, $hashed_password) && $_SESSION["aktiviert"] == 1) { //überprüft ob das passwort richtig ist
            echo 'Erfolgreich eingeloggt!'; 
            $sql = "SELECT userid, Aktiviert, Rechte, Username, Passwort, Email, Vorname, Nachname FROM user WHERE username = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION["email"] = $row["Email"];
                    $_SESSION["firstname"] = $row["Vorname"];
                    $_SESSION["lastname"] = $row["Nachname"];
                    $_SESSION["userid"] = $row["userid"];
                    $_SESSION["aktiviert"] = $row["Aktiviert"];
                    $_SESSION["rechte"] = $row["Rechte"];
                    //echo $_SESSION["firstname"];
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