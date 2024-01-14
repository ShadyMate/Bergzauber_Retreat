<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

include_once '../includes/dbaccess.php';

if (isset($_GET['userid'])) {
    $_SESSION['userid'] = $_GET['userid'];
    // Der Rest Ihres Codes
}
$userid = $_SESSION['userid'];
//echo $_SESSION['userid'];
    
         if(isset($_POST['submit_fname'])) {
            $firstname = $_POST['fname'];
            $_SESSION['firstname'] = $_POST['fname'];

        //updatet die datenbank
        $stmt = $conn->prepare("UPDATE user SET Vorname = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
        $stmt->bind_param('s', $firstname);
        $stmt->execute();

        header('Location: ../php/userverwaltungchange.php');
            // Aktualisieren Sie nur das Vorname-Feld in der Datenbank
        }
    
         if(isset($_POST['submit_lname'])) {
            $lastname = $_POST['lname'];
            $_SESSION['lastname'] = $_POST['lname'];    

        $stmt = $conn->prepare("UPDATE user SET Nachname = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
        $stmt->bind_param('s', $lastname);
        $stmt->execute();

        header('Location: ../php/userverwaltungchange.php');
            // Aktualisieren Sie nur das Vorname-Feld in der Datenbank
        }

        if(isset($_POST['submit_email'])) {
            // Überprüfen, ob die E-Mail-Adresse bereits existiert
            $email = $_POST['email'];
            $_SESSION['email'] = $_POST['email'];    
        $sql = "SELECT Userid, Email FROM user WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>alert('Die E-Mail Adresse ist bereits vorhanden!'); window.location.href='../php/userverwaltungchange.php';</script>";
            exit();
        } else {
        $stmt = $conn->prepare("UPDATE user SET Email = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
        $stmt->bind_param('s', $email);
        $stmt->execute();
        }
        header('Location: ../php/userverwaltungchange.php');
            // Aktualisieren Sie nur das Vorname-Feld in der Datenbank
        }
        
        if(isset($_POST['submit_username'])) {
            // Überprüfen, ob die E-Mail-Adresse bereits existiert
            $username = $_POST['username'];
            $_SESSION['username'] = $_POST['username'];    
            $sql = "SELECT Userid, Username FROM user WHERE Username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>alert('Der Username ist bereits vorhanden!'); window.location.href='../php/userverwaltungchange.php';</script>";
            exit();
        } else {
        $stmt = $conn->prepare("UPDATE user SET Username = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
        $stmt->bind_param('s', $username);
        $stmt->execute();
        }
        header('Location: ../php/userverwaltungchange.php');
            // Aktualisieren Sie nur das Vorname-Feld in der Datenbank
        }
        
        if(isset($_POST['submit_passwort'])) {
            $password = password_hash($_POST['pword'], PASSWORD_DEFAULT);
            $_SESSION['pword'] = $_POST['pword'];

        //updatet die datenbank
        $stmt = $conn->prepare("UPDATE user SET Passwort = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
        $stmt->bind_param('s', $password);
        $stmt->execute();

        header('Location: ../php/userverwaltungchange.php');
            // Aktualisieren Sie nur das Vorname-Feld in der Datenbank
        }/*
    $lastname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pword']; // Passwort im Klartext
    $_SESSION["pword"] = $_POST['pword'];
        
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
        echo "<script>alert('Der Benutzername ist bereits vorhanden.'); window.location.href='../php/userverwaltungchange.php';</script>";
    } else {
        $stmt = $conn->prepare("UPDATE user SET Vorname = ?, Nachname = ?, Email = ?, Username = ?, Passwort = ? WHERE userid = '{$_SESSION['userid']}'"); //Hier wird die Datenbank aktualisiert
        $stmt->bind_param('sssss', $firstname, $lastname, $email, $username, $password);
        $stmt->execute();
        $_SESSION['firstname'] = $firstname;
        echo $firstname;
        
        header('Location: ../php/userverwaltung.php');
    }
}*/
$conn->close(); 



?>
<!DOCTYPE html>
<html lang="de">
<head>
  <title>Daten ändern</title>
  <?php include "../includes/header.php"; ?>
</head>
<header>
    <h1 class="title">Profildaten ändern</h1>
</header>
<body>
<?php include "../includes/nav.php";
?>
<div class="container">
    <form method="post" class="text-center">
    <label for="fname">UserID: <?php echo $_SESSION['userid']; echo "<br><br>"?></label><br> 
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
    <label for="pword">Passwort: <?php echo $_SESSION['pword']; echo "<br><br>"?></label><br> 
    <input type="text" id="pword" name="pword"><br>
    <input type="submit" id="submit_passwort" name="submit_passwort" value="Passwort ändern"><br>
    </form>
    <br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>