<?php
    session_start();
if(isset($_POST['submit'])) {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) { //session und cookies werden gelöscht
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    session_destroy(); //session wird zerstört
    echo '<script type="text/javascript">';
    echo 'alert("Erfolgreich ausgeloggt!");';
    echo 'window.location.href = "../php/index.php";';
    echo '</script>';
}
}
if(isset($_POST['stay'])) {
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../php/index.php";';
    echo '</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Logout</title>
    <?php include "header.php"?>
</head>
<body>
    <form method ="post">
    <p>Sind Sie sicher, dass Sie sich ausloggen wollen?</p>
    <input type="submit" name = "submit" value="Ja">
    <input type="submit" name = "stay" value="Nein">
    </form>
</body>
</html>