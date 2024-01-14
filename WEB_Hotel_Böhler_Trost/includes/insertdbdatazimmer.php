<?php // Hier wird die Reservierung in die Datenbank eingetragen
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once 'dbaccess.php';

    $frühstück = isset($_POST['frühstück']) ? 1 : 0;
    if ($frühstück == 1) {
        $frühstückpreis = 10;
    } else {
        $frühstückpreis = 0;
    }
    $_SESSION["frühstück"] = $frühstück;
    $parkplatz = isset($_POST['parkplatz']) ? 1 : 0;
    if ($parkplatz == 1) {
        $parkplatzpreis = 25;
    } else {
        $parkplatzpreis = 0;
    }
    $_SESSION["parkplatz"] = $parkplatz;
    $haustiere = isset($_POST['haustiere']) ? 1 : 0;
    $_SESSION["haustiere"] = $haustiere;
    if ($haustiere == 1) {
        $haustierepreis = 20;
    } else {
        $haustierepreis = 0;
    }
    $_SESSION["anreise"] = $_POST['arrival'] ?? '';
    $_SESSION["abreise"] = $_POST['departure'] ?? '';
    if(isset($_GET['kosten'])) {
        $_SESSION["kosten"] = $_GET['kosten'];
     }
    $_SESSION['gesamtkosten'] = $_SESSION["kosten"] + $frühstückpreis + $parkplatzpreis +  $haustierepreis;
    

    if(isset($_POST['submit'])) {
        //Die Daten werden in die Datenbank eingetragen
       $sql = "INSERT INTO zimmer (Kosten, `Status`, Anreise, Abreise, Frühstück, Parkplatz, Haustiere) VALUES ('{$_SESSION['gesamtkosten']}', 'Neu', '{$_SESSION['anreise']}', '{$_SESSION['abreise']}', '$frühstück', '$parkplatz', '$haustiere')";                $result = $conn->query($sql);

                $sql = "SELECT zimmer_id FROM zimmer";
                $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Geht durch alle Zeilen, speichert aber nur die letzte zimmer_id
    while($row = $result->fetch_assoc()) {
        $_SESSION['zimmer_id'] = $row["zimmer_id"];
    }
    //echo "Letzte Zimmer ID: " . $_SESSION['zimmer_id'];
} else {
    echo "Keine Zimmer gefunden.";
}
                //Hier wird der Status der Zimmer in der Datenbank in der Session Status gespeichert
                $sqlStatus = "SELECT `Status` FROM zimmer WHERE zimmer_id = '{$_SESSION['zimmer_id']}'";
                $result = $conn->query($sqlStatus);

                if ($result->num_rows > 0) {
                    // Geht durch alle Zeilen, speichert aber nur den letzten Status
                    while($row = $result->fetch_assoc()) {
                        $_SESSION['Status'] = $row["Status"];
                    }
                }
                //in der zwischentabelle werden die userid und die zimmer_id gespeichert
                $sqluser_zimmer = "INSERT INTO user_zimmer (userid, zimmer_id) VALUES ('{$_SESSION['userid']}', '{$_SESSION['zimmer_id']}')";
        
                $result = $conn->query($sqluser_zimmer);
        
        $userid = $_SESSION['userid'];
        $sql = "SELECT zimmer.*
        FROM user
        JOIN user_zimmer ON user.userid = user_zimmer.userid
        JOIN zimmer ON user_zimmer.zimmer_id = zimmer.zimmer_id
        WHERE user.userid = '$userid'";
        
        $result = mysqli_query($conn, $sql);
                /*if ($conn->query($sql) === TRUE) {
                    echo "Neuer Datensatz erfolgreich hinzugefügt!";

                    $_SESSION["frühstück"] = $_POST['frühstück'];
                    $_SESSION["parkplatz"] = $_POST['parkplatz'];
                    $_SESSION["haustiere"] = $_POST['haustiere'];

                    //userid wird ausgegeben
                }*/
    }
    mysqli_close($conn);
?>