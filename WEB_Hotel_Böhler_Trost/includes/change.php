<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

include_once 'dbaccess.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Daten aus dem Formular abrufen
    
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pword']; // Passwort im Klartext
    $_SESSION["pword"] = $_POST['pword'];
}
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

    // Überprüfen, ob die E-Mail-Adresse bereits existiert
    $sql = "SELECT Userid, Email FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        exit('Die E-Mail-Adresse ist bereits vorhanden.');
    } 

    // Überprüfen, ob der Benutzername bereits existiert
    $sql = "SELECT Userid, Username FROM user WHERE Username = '{$_SESSION['username']}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        exit('Der Benutzername ist bereits vorhanden.');
    } else {
        $stmt = $conn->prepare("UPDATE user SET Vorname = ?, Nachname = ?, Email = ?, Username = ?, Passwort = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
        $stmt->bind_param('sssss', $firstname, $lastname, $email, $username, $password);
        $stmt->execute();
        $_SESSION['firstname'] = $firstname;
        echo $firstname;
        
        header('Location: ../php/profil.php');
    }
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