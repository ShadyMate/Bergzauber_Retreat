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
<head>
    <title>Homepage</title>
    <?php include "../includes/header.php"; ?>
</head>
<header>
    <h1 class="title">Userverwaltung</h1>
</header>
<body>
    <?php
 include "../includes/nav.php";
 if (!isset($_SESSION['adminid'])) {
    $_SESSION['adminid'] = $_SESSION['userid'];
}

//nach dem ändern des users will ich wieder die userid des admins haben
$_SESSION['userid'] = $_SESSION['adminid'];
    ?>
    <?php
        $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Daten für jeden Benutzer ausgeben
        while($row = $result->fetch_assoc()) {
            echo "<div class=';container'><form method='post'>";
            echo "User_ID: " . $row["userid"] . "<br>";
            echo "Rechte: " . $row["Rechte"] . "<br>";
            echo "Vorname: " . $row["Vorname"] . "<br>";
            echo "Nachname: " . $row["Nachname"] . "<br>";
            echo "E-mail: " . $row["Email"] . "<br>";
            echo "Username: " . $row["Username"] . "<br>";
            echo "Passwort: " . $row["Passwort"] . "<br>";
            echo '<a href="../php/userverwaltungchange.php?userid=' . $row["userid"] . '" class="btn btn-warning">Daten ändern</a><br>';
            if ($row["Aktiviert"] == 1) {
                echo "<a style='color: green'>Benutzer ist aktiviert.</a><br>";
            } else {
                echo "<a style='color: red; font-weight: bold'>Benutzer ist deaktiviert.</a><br>";
            }
            echo '<a href="../includes/activate_user.php?userid=' . $row["userid"] . '" class="btn btn-success">Benutzer aktivieren</a>';
            echo '<a href="../includes/deactivate_user.php?userid=' . $row["userid"] . '" class="btn btn-danger">Benutzer deaktivieren</a>';
            echo "</form></div>";
        }
    } else {
        echo "Keine Benutzer gefunden.";
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include "../includes/footer.php"; ?>
</body>
</html>