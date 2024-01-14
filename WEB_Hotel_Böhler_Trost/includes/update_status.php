<?php //hier wird der status geändert
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen, ob alle notwendigen Daten übermittelt wurden
    if (isset($_POST['zimmer_id']) && isset($_POST['status'])) {
        $zimmer_id = $_POST['zimmer_id'];
        $status = $_POST['status'];
        $_SESSION["Status"] = $_POST['status'];

        // Verbindung zur Datenbank herstellen
        include_once '../includes/dbaccess.php';

        // SQL-Update-Statement vorbereiten und ausführen
        $stmt = $conn->prepare("UPDATE zimmer SET `Status` = ? WHERE zimmer_id = ?");
        $stmt->bind_param('si', $status, $zimmer_id);
        $stmt->execute();
        echo "Status erfolgreich aktualisiert.";
        
    } else {
        echo "Fehler: Nicht alle notwendigen Daten wurden übermittelt.";
    }
} else {
    echo "Fehler: Ungültige Anforderung.";
}
?>