<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Hilfe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
</head>

<body>
<header>
    <h1>Hilfe-Seite</h1>
</header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php"><img src="../res/img/Logo.png" alt="Logo" width="50" height="50">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Register/Login/registrierung.php" style="font-size: 25px;">Registrierung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Register/Login/login.php" style="padding-left: 20px; font-size: 25px;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php" style="padding-left: 20px; font-size: 25px;">Hilfe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="impressum.php" style="padding-left: 20px; font-size: 25px;">Impressum</a>
                </li>
                <li class="nav-item">
                    <?php
                    if ($_SESSION["username"] == "admin" && $_SESSION["pword"] == "admin") {
                        echo '<a class="nav-link" href="Register/Login/Profil.php" style="padding-left: 20px; font-size: 25px;">Profil</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<form class="text-center">
    <h3>FAQ</h3>
    <section>
        <p>Frage1: Antwort1</p>
        <p>Frage2: Antwort2</p>
        <p>Frage3: Antwort3</p>
    </section>
    <br>
    <section>
        <p>Bei weiteren Fragen wenden sie sich an:<a href="mailto:if23b274@technikum-wien.at">if23b274@technikum-wien.at</a> </p>
    </section>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>