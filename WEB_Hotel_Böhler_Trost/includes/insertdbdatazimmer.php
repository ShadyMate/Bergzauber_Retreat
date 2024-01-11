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
    $_SESSION['gesamtkosten'] = $_SESSION["kosten"] + $frühstückpreis + $parkplatzpreis +  $haustierepreis;
    

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
       //$_SESSION["gesamtkosten"] = $_SESSION["kosten"] + $frühstück + $parkplatz + $haustiere;

       

                $sql = "INSERT INTO zimmer (Kosten, Anreise, Abreise, Frühstück, Parkplatz, Haustiere) VALUES ('{$_SESSION['gesamtkosten']}', '{$_SESSION['anreise']}', '{$_SESSION['abreise']}', '$frühstück', '$parkplatz', '$haustiere')";
                $result = $conn->query($sql);

                $sql = "SELECT zimmer_id FROM zimmer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Geht durch alle Zeilen, speichert aber nur die letzte zimmer_id
    while($row = $result->fetch_assoc()) {
        $_SESSION['zimmer_id'] = $row["zimmer_id"];
    }
    echo "Letzte Zimmer ID: " . $_SESSION['zimmer_id'];
} else {
    echo "Keine Zimmer gefunden.";
}

                $sqluser_zimmer = "INSERT INTO user_zimmer (userid, zimmer_id) VALUES ('{$_SESSION['userid']}', '{$_SESSION['zimmer_id']}')";
        
                $result = $conn->query($sqluser_zimmer);
        
                $sql = "SELECT *
        FROM user_zimmer
        WHERE userid = '{$_SESSION['userid']}'";
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            echo "Reservierungen gefunden.";
        } else {
            echo "Keine Reservierungen gefunden.";
        }
        
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