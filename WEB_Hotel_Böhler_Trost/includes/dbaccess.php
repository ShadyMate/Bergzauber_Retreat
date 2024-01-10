<?php //prüft ob die Rechte für das Zugreifen auf die Datenbank vorhanden sind
$servername = 'localhost';
$username = 'Thomas';
$password = '1234';
$dbname = 'hoteluser';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die('Konnte keine Verbindung zum MySQL-Server herstellen: ' . mysqli_connect_error());
}
?>