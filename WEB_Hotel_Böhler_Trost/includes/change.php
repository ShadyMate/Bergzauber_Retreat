<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

/*if(isset($_POST['change'])) {
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
}*/
//prüft ob die Rechte für das Zugreifen auf die Datenbank vorhanden sind

include_once 'dbaccess.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
/*$stmt = $conn->prepare("SELECT userid FROM user WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$_SESSION['userid'] = $user['userid'];*/

    // Daten aus dem Formular abrufen
    
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pword']; // Passwort im Klartext
    $_SESSION["pword"] = $_POST['pword'];

    $sql = "SELECT Passwort FROM user WHERE userid = '{$_SESSION['userid']}'";
    $result = $conn->query($sql);
    //passwort hashen
    if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['Passwort'];
    }
   //vergleicht ob richtiges passwort eingegebn wird
        if (password_verify($password, $hashed_password)) {
            echo 'Erfolgreich Daten geändert!';
            // Datenbank aktualisieren
            $_SESSION["email"] = $_POST['email'];
            $_SESSION["firstname"] = $_POST['fname'];
            $_SESSION["lastname"] = $_POST['lname'];
            $_SESSION["username"] = $_POST['username'];
            $password = password_hash($_POST['pword'], PASSWORD_DEFAULT);
                $sql = "SELECT Userid, Email FROM user WHERE email = '$email'"; //Hier wird überprüft ob die Email bereits existiert
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    exit('Die E-Mail-Adresse ist bereits vorhanden.');
                    } else {
                        $stmt = $conn->prepare("UPDATE user SET Vorname = ?, Nachname = ?, Email = ?, Username = ?, Passwort = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
                        $stmt->bind_param('sssss', $firstname, $lastname, $email, $username, $password);
                        $stmt->execute();
                        $_SESSION['firstname'] = $firstname;
                        echo $firstname;
                        
                        header('Location: ../includes/profil.php');
                    }
        } else {
            $password = password_hash($_POST['pword'], PASSWORD_DEFAULT);
            echo $_SESSION['userid']; /*
            echo '<script type="text/javascript">';
            echo 'alert("Falsches Passwort!");';
            echo '</script>';*/
        }

            //momentaner code zur bestätigung der änderung
    /*if ($stmt->affected_rows === 0) {
        echo $_SESSION['userid'];
        exit('Keine Zeilen aktualisiert');
    } else {
        echo 'Daten erfolgreich aktualisiert';
    }*/
}
$conn->close();

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
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="text-center">
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