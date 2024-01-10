<?php // in diesem code werden die daten die bei der regestrierung eingegeben werden in der Datenbank gespeichert
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once 'dbaccess.php';


    // Erstellen Sie die SQL-Abfrage
    /*$stmt = $conn->prepare("UPDATE zimmer SET frühstück = ?, parkplatz = ?, haustiere = ? WHERE zimmer_id = '{$_SESSION['zimmerid']}'"); //tabelle gehört nicht geupdatet sonder insert into
    $stmt->bind_param('iii', $frühstück, $parkplatz, $haustiere);
    $stmt->execute();*/
    
    $frühstück = isset($_POST['frühstück']) ? 1 : 0;
    $parkplatz = isset($_POST['parkplatz']) ? 1 : 0;
    $haustiere = isset($_POST['haustiere']) ? 1 : 0;
    $_SESSION["anreise"] = $_POST['arrival'] ?? '';
    $_SESSION["abreise"] = $_POST['departure'] ?? '';
    $_SESSION["gesamtkosten"] = 0;
    

    if(isset($_POST['submit'])) {

        /*$stmt = $conn->prepare("SELECT zimmer_id FROM user WHERE Email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $zimmerid = $result->fetch_assoc();
        $_SESSION['zimmerid'] = $zimmerid['zimmer_id'];
        $zimmerid = $_SESSION['zimmerid'];*/

        // Starten Sie die Transaktion
/*$conn->begin_transaction();

try {
    // Führen Sie die erste UPDATE-Anweisung aus
    $conn->query("UPDATE user SET zimmer_id = '{$_SESSION['zimmerid']}' WHERE userid = '{$_SESSION['userid']}'");

    // Führen Sie die zweite UPDATE-Anweisung aus
    $conn->query("UPDATE zimmer SET zimmer_id = '{$_SESSION['zimmerid']}' WHERE userid = '{$_SESSION['userid']}'");

    // Wenn beide UPDATE-Anweisungen erfolgreich sind, bestätigen Sie die Transaktion
    $conn->commit();
} catch (mysqli_sql_exception $exception) {
    // Wenn eine der UPDATE-Anweisungen fehlschlägt, machen Sie die Transaktion rückgängig
    $conn->rollback();
}*/

        //$sqluser = "UPDATE user SET zimmer_id = '{$_SESSION['zimmerid']}' WHERE userid = (SELECT userid FROM user WHERE Email = '{$_SESSION['email']}')";
       // $result = $conn->query($sqluser);

                $sql = "INSERT INTO zimmer (Anreise, Abreise, Frühstück, Parkplatz, Haustiere) VALUES ('{$_SESSION['anreise']}', '{$_SESSION['abreise']}', '$frühstück', '$parkplatz', '$haustiere')";
                $result = $conn->query($sql);
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