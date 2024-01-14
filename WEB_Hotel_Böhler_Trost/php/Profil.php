<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  if(isset($_POST['change'])) {
    header('Location: ../php/change.php');
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
        bottom: 0;
        width: 100%;
    }
</style>
<head>
    <title>Profil</title>
    <?php include "../includes/header.php"; ?>
</head>
<header>
    <h1 class="title">Meine Profildaten</h1>
</header>
<body>
    <?php
 include "../includes/nav.php";
 $sql = "SELECT userid, Aktiviert, Rechte, Username, Passwort, Email, Vorname, Nachname FROM user WHERE userid = '{$_SESSION['userid']}'";
 $result = $conn->query($sql);
 //alle daten des users sind jetzt in sessions gespeichert
 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $hashed_password = $row['Passwort'];
         $_SESSION["email"] = $row["Email"];
         $_SESSION["firstname"] = $row["Vorname"];
         $_SESSION["lastname"] = $row["Nachname"];
         $_SESSION["userid"] = $row["userid"];
         $_SESSION["aktiviert"] = $row["Aktiviert"];
         $_SESSION["rechte"] = $row["Rechte"];
         $_SESSION["username"] = $row["Username"];
     }
    }
    ?>
    <div class="container">
    <form method="post">
    <p>Vorname: <?php echo $_SESSION["firstname"];; ?></p>
    <p>Nachname: <?php echo $_SESSION["lastname"]; ?></p>
    <p>Email: <?php echo $_SESSION["email"]; ?></p>
    <p>Username: <?php echo $_SESSION["username"]; ?></p>
    <?php
    //zeigt nur die ersten 2 zeichen des passworts an
        function partialPassword($password, $show = 2, $char = '*') { 
            $length = strlen($password);
            if ($length < $show) {
                $show = $length;
            }
            return substr($password, 0, $show) . str_repeat($char, $length - $show);
        }
    $password = $_SESSION["pword"];
    echo "Passwort: " . partialPassword($password);
    ?>
    <br>
    <br>
    <form method="post">
        <input type="submit" name="change" value="Daten ändern">
    <form  method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
    </form>
    </div>

<?php

$userid = $_SESSION['userid'];
//alle reservierungen des users werden angezeigt
$sql = "SELECT zimmer.*
FROM user
JOIN user_zimmer ON user.userid = user_zimmer.userid
JOIN zimmer ON user_zimmer.zimmer_id = zimmer.zimmer_id
WHERE user.userid = '$userid'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Geht durch alle Zeilen und zeigt jede Reservierung an
    while($row = mysqli_fetch_assoc($result)) {
        echo '<form style="margin-bottom: 25px">';
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
        echo '<br>Status Ihrer Reservierung: ';
        echo $row["Status"];
        echo '</form>';
    }
} else {
    echo "Keine Reservierungen gefunden.";
}
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include "../includes/footer.php"; ?>
</body>
</html>