<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

include_once '../includes/dbaccess.php';

$_SESSION['userid'] = $_GET['userid'];
//echo $_SESSION['userid'];

if(isset($_POST['submit'])) {

    // Daten aus dem Formular abrufen
    
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];

            // Datenbank aktualisieren
            $_SESSION["email"] = $_POST['email'];
            $_SESSION["firstname"] = $_POST['fname'];
            $_SESSION["lastname"] = $_POST['lname'];
            $_SESSION["username"] = $_POST['username'];
                $sql = "SELECT Userid, Email FROM user WHERE email = '$email'"; //Hier wird überprüft ob die Email bereits existiert
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    exit('Die E-Mail-Adresse ist bereits vorhanden.');
                    } else {
                        $stmt = $conn->prepare("UPDATE user SET Vorname = ?, Nachname = ?, Email = ?, Username = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
                        $stmt->bind_param('ssss', $firstname, $lastname, $email, $username);
                        $stmt->execute();
                        header('Location: ../php/userverwaltung.php');
                    }
        } else {
            echo 'Fehler!';
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
<?php include "../includes/nav.php";
?>
<div class="container">
    <form method="post" class="text-center">
    <label for="fname">UserID: <?php echo $_SESSION['userid']; echo "<br><br>"?></label><br> 
    <label for="fname">Vorname:</label><br> 
    <input type="text" id="fname" name="fname" required><br>
    <label for="lname">Nachname:</label><br>
    <input type="text" id="lname" name="lname" required><br>
    <label for="email">E-Mail:</label><br>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <br><br>
    <input type="submit" id="submit" name="submit" value="Bestätigen">
    </form>
    <br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>