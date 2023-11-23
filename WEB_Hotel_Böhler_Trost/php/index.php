<?php
session_start();
$calling_file = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION["username"])) {
  $_SESSION["username"] = "";
}
if (!isset($_SESSION["registriert"])) {
  $_SESSION["registriert"] = "";
}
if (!isset($_SESSION["pword"])) {
  $_SESSION["pword"] = "";
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Bergzauber Retreat</title>
    <?php include "../includes/header.php"; ?>
    <style>
        body {
            height: 100%;
        }
    </style>
</head>
<header>
    <h1 class="maintitle">Bergzauber Retreat</h1>
</header>
<body>

  <?php include '../includes/nav.php'; ?>
  <?php include '../includes/cards.php'; ?>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
