<?php
include_once 'dbaccess.php';

if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    // SQL-Befehl vorbereiten
    $sql = "UPDATE user SET Aktiviert = '0' WHERE userid = '$userid'";

    // SQL-Befehl ausführen
    if ($conn->query($sql) === TRUE) {
        echo "Benutzer erfolgreich deaktiviert!";
    } else {
        echo "Fehler beim Deaktivieren des Benutzers: " . $conn->error;
    }
} else {
    echo "Fehler: Benutzer-ID nicht übermittelt.";
}

// Weiterleitung zurück zur vorherigen Seite oder zur Hauptseite
header('Location: ../php/userverwaltung.php');
?>