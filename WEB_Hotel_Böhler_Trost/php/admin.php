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
    <h1 class="title">Meine Profildaten</h1>
</header>
<body>
    <?php
 include "../includes/nav.php";
 
    ?>
    <div class="container">
    <form method="post">
    <p>User_ID: <?php echo $_SESSION["username"]; ?></p>
    <p>Rechte: <?php echo $_SESSION["username"]; ?></p>
    <p>Vorname: <?php echo $_SESSION["firstname"];; ?></p>
    <p>Nachname: <?php echo $_SESSION["lastname"]; ?></p>
    <p>Email: <?php echo $_SESSION["email"]; ?></p>
    <p>Username: <?php echo $_SESSION["username"]; ?></p>
    <p>Username: <?php echo $_SESSION["username"]; ?></p>
    <p>Passwort: <?php echo $_SESSION["username"]; ?></p>
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
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>