<?php
    include_once '../includes/dbaccess.php';
    $_SESSION['userid'] = $_GET['userid'];
if (isset($_SESSION['userid'])) {

// Zuerst die Reservierungen des Benutzers löschen
$sql = "DELETE zimmer, user_zimmer FROM zimmer 
        JOIN user_zimmer ON zimmer.zimmer_id = user_zimmer.zimmer_id 
        WHERE user_zimmer.userid = '{$_SESSION['userid']}'";
$result = $conn->query($sql);

// Dann den Benutzer löschen
$sql = "DELETE FROM user WHERE userid = '{$_SESSION['userid']}'";
$result = $conn->query($sql);


echo "<script>alert('Der Benutzer wurde erfolgreich gelöscht!');</script>";
}else {
  echo "<script>alert('Fehler: Benutzer-ID nicht übermittelt.');</script>";
} 
header('Location: ../php/userverwaltung.php');
?>