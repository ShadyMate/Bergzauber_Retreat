<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Stellen Sie sicher, dass die notwendigen POST-Daten vorhanden sind
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