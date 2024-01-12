<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  if(isset($_POST['submit'])) {
    header('Location: ../php/index.php');
  }
  
  if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../php/index.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="de">
<style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
<head>
    <title>Homepage</title>
    <?php include "../includes/header.php"; ?>
</head>
<header>
    <h1 class="title">Meine Profildaten</h1>
</header>
<body>
    <?php
 include "../includes/nav.php";
 
    ?>
    <div class="container">
    <form method="post">
    <p>Vorname: <?php echo $_SESSION["firstname"];; ?></p>
    <p>Nachname: <?php echo $_SESSION["lastname"]; ?></p>
    <p>Email: <?php echo $_SESSION["email"]; ?></p>
    <p>Username: <?php echo $_SESSION["username"]; ?></p>
    <?php
        function partialPassword($password, $show = 2, $char = '*') { 
            $length = strlen($password);
            return substr($password, 0, $show) . str_repeat($char, $length - $show);
        }
    $password = $_SESSION["pword"];
    echo "Passwort: " . partialPassword($password);
    ?>
    <br>
    <br>
    <a href="../includes/change.php">Hier klicken um Ihre Daten zu ändern.</a>
    <br>
    <form action="../includes/logout.php" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
    </form>
    </div>
    <br>
    <?php
    /*
        $sql = "SELECT zimmer.*
        FROM user
        JOIN user_zimmer ON user.userid = user_zimmer.userid
        JOIN zimmer ON user_zimmer.zimmerid = zimmer.zimmer_id
        WHERE user.userid = '{$_SESSION['userid']}'";
        //zeigt die reservierungen an
        if (isset($_SESSION['anreise']) && isset($_SESSION['abreise'])) {
            echo '<form>
            <label>Sie haben eine Buchung von ';
            echo $_SESSION["anreise"];
            echo ' bis ';
            echo $_SESSION["abreise"];
            echo ' im Wert von ';
            echo $_SESSION["gesamtkosten"];
            echo '€.</label><br>
            <label for="arrival">Anreisedatum: ';
            echo $_SESSION["anreise"];
            echo '</label><br>
            <label for="departure">Abreisedatum: ';
            echo $_SESSION["abreise"]; 
            if ($_SESSION["frühstück"] == 1) {
                echo '<br>';
                echo "Ihnen wird ein köstliches Frühstück gebracht.";
            }
            if ($_SESSION["parkplatz"] == 1) {
                echo '<br>';
                echo "Ihnen wird ein Parkplatz reserviert.";
            }
            if ($_SESSION["haustiere"] == 1) {
                echo '<br>';
                echo "Für Ihre Haustiere wird gesorgt.";
            }
            echo '</form>';
        }
        /*$_SESSION["frühstück"] = '';
        $_SESSION["parkplatz"] = '';
        $_SESSION["haustier"] = '';*/

        /*$sql = "SELECT zimmer_id FROM zimmer";
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
        
        $result = mysqli_query($conn, $sql);*/
        //echo $_SESSION['gesamtkosten'];
        echo $_SESSION['userid'];
        //echo $_SESSION['rechte'];
        $userid = $_SESSION['userid'];
$sql = "SELECT zimmer.*
FROM user
JOIN user_zimmer ON user.userid = user_zimmer.userid
JOIN zimmer ON user_zimmer.zimmer_id = zimmer.zimmer_id
WHERE user.userid = '$userid'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Geht durch alle Zeilen und zeigt jede Reservierung an
    while($row = mysqli_fetch_assoc($result)) {
        echo '<form>';
        echo '<label>Sie haben eine Buchung von ';
        echo $row["Anreise"];
        echo ' bis ';
        echo $row["Abreise"];
        echo ' im Wert von ';
        echo $row["Kosten"];
        echo '€.</label><br>';
        if ($row["Frühstück"] == 1) {
            echo '<br>';
            echo "Ihnen wird ein köstliches Frühstück gebracht.";
        }
        if ($row["Parkplatz"] == 1) {
            echo '<br>';
            echo "Ihnen wird ein Parkplatz reserviert.";
        }
        if ($row["Haustiere"] == 1) {
            echo '<br>';
            echo "Für Ihre Haustiere wird gesorgt.";
        }
        echo '</form>';
    }
} else {
    echo "Keine Reservierungen gefunden.";
}

/*if (mysqli_num_rows($result) > 0) {
    // zeigt jede Reservierung an
    while($row = mysqli_fetch_assoc($result)) {
        echo '<form>';
        echo '<label>Sie haben eine Buchung von ';
        echo $row["Anreise"];
        echo ' bis ';
        echo $row["Abreise"];
        echo ' im Wert von ';
        echo $row["Kosten"];
        echo '€.</label><br>';
        if ($row["Frühstück"] == 1) {
            echo '<br>';
            echo "Ihnen wird ein köstliches Frühstück gebracht.";
        }
        if ($row["Parkplatz"] == 1) {
            echo '<br>';
            echo "Ihnen wird ein Parkplatz reserviert.";
        }
        if ($row["Haustiere"] == 1) {
            echo '<br>';
            echo "Für Ihre Haustiere wird gesorgt.";
        }
        echo '</form>';
    }
} else {
    echo "Keine Reservierungen gefunden.";
}*/
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include "../includes/footer.php"; ?>
</body>
</html>