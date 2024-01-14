<?php
//überprüft einzeln ob die daten geändert wurden und updatet die datenbank und zeigt die geänderten daten an

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

include_once '../includes/dbaccess.php';
//updatet den Vornamen
if(isset($_POST['submit_fname'])) {
    $firstname = $_POST['fname'];
    $_SESSION['firstname'] = $_POST['fname'];

//updatet die datenbank
$stmt = $conn->prepare("UPDATE user SET Vorname = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
$stmt->bind_param('s', $firstname);
$stmt->execute();

header('Location: ../php/change.php');
}

//updatet den Nachnamen
if(isset($_POST['submit_lname'])) {
    $lastname = $_POST['lname'];
    $_SESSION['lastname'] = $_POST['lname'];    

$stmt = $conn->prepare("UPDATE user SET Nachname = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
$stmt->bind_param('s', $lastname);
$stmt->execute();

header('Location: ../php/change.php');
}

//updatet die E-Mail
if(isset($_POST['submit_email'])) {
    // Überprüfen, ob die E-Mail-Adresse bereits existiert
    $email = $_POST['email'];
    $_SESSION['email'] = $_POST['email'];    
$sql = "SELECT Userid, Email FROM user WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<script>alert('Die E-Mail Adresse ist bereits vorhanden!'); window.location.href='../php/change.php';</script>";
    exit();
} else {
$stmt = $conn->prepare("UPDATE user SET Email = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
$stmt->bind_param('s', $email);
$stmt->execute();
}
header('Location: ../php/change.php');
}

//updatet den Username
if(isset($_POST['submit_username'])) {
    // Überprüfen, ob die E-Mail-Adresse bereits existiert
    $username = $_POST['username'];
    $_SESSION['username'] = $_POST['username'];    
    $sql = "SELECT Userid, Username FROM user WHERE Username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<script>alert('Der Username ist bereits vorhanden!'); window.location.href='../php/change.php';</script>";
    exit();
} else {
$stmt = $conn->prepare("UPDATE user SET Username = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
$stmt->bind_param('s', $username);
$stmt->execute();
}
header('Location: ../php/change.php');
}    


// Passswort wird überprüft
if(isset($_POST['pword'])) {
    $password = $_POST['pword']; // Passwort im Klartext
    $_SESSION["pword"] = $_POST['pword'];
    $newpassword = $_POST['newpword'];

    //überprüft ob das neue passwort lang genug ist
    if(strlen($newpassword) < 4) {
        echo "<script>alert('Das Passwort muss mindestens 4 Zeichen lang sein!'); window.location.href='../php/change.php';</script>";
        exit();
    }
    // Passwort wird gehasht 
    $sql = "SELECT Passwort FROM user WHERE userid = '{$_SESSION['userid']}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $hashed_password = $row['Passwort'];
        }
        //wenn das alte passwort mit dem passwort der Datenbank übereinstimmt, wird es geändert
        if (password_verify($password, $hashed_password)) {

            $_SESSION['pword'] = $_POST['newpword'];

            $hashed_new_password = password_hash($newpassword, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE user SET Passwort = ? WHERE userid = '{$_SESSION['userid']}'"); // Hier wird die Datenbank aktualisiert
            $stmt->bind_param('s', $hashed_new_password);
            $stmt->execute();

            echo "<script>alert('Daten erfolgreich geändert!'); window.location.href='../php/profil.php';</script>";
            exit();
        }
    } 
    echo "<script>alert('Falsches Passwort'); window.location.href='../php/change.php';</script>";
            exit();
}
$conn->close(); 

?>

<!DOCTYPE html>
<html lang="de">
<head>
  <title>Daten ändern</title>
  <?php include "../includes/header.php";?>
</head>
<header>
    <h1 class="title">Meine Profildaten</h1>
</header>
<body>
<?php include "../includes/nav.php";?>

<div class="container">
    <form method="post" class="text-center">
    <label for="fname">Vorname: <?php echo $_SESSION['firstname']; echo "<br><br>"?></label><br> 
    <input type="text" id="fname" name="fname"><br>
    <input type="submit" id="submit_fname" name="submit_fname" value="Vorname ändern"><br><br>
    <label for="lastname">Nachname: <?php echo $_SESSION['lastname']; echo "<br><br>"?></label><br> 
    <input type="text" id="lname" name="lname"><br>
    <input type="submit" id="submit_lname" name="submit_lname" value="Nachname ändern"><br>
    <label for="email">E-Mail: <?php echo $_SESSION['email']; echo "<br><br>"?></label><br> 
    <input type="email" id="email" name="email"><br>
    <input type="submit" id="submit_email" name="submit_email" value="E-Mail ändern"><br>
    <label for="username">Username: <?php echo $_SESSION['username']; echo "<br><br>"?></label><br> 
    <input type="text" id="username" name="username"><br>
    <input type="submit" id="submit_username" name="submit_username" value="Username ändern"><br>
    <label for="pword">Altes Passwort:</label><br>
    <input type="password" id="pword" name="pword"><br>
    <label for="newpword">Neues Passwort </label><br>
    <input type="password" id="newpword" name="newpword">
    <br><br>
    <input type="submit" id="change" name="change" value="Bestätigen">
    </form>
    <br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>