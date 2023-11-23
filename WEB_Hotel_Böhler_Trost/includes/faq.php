<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Login</title>
  <?php include "../includes/header.php"; ?>
</head>

<body>
<header>
    <h1>Hilfe-Seite</h1>
</header>
                    <?php
                    include "nav.php";
                    if ($_SESSION["username"] == "admin" && $_SESSION["pword"] == "admin") {
                        echo '<a class="nav-link" href="Register/Login/Profil.php" style="padding-left: 20px; font-size: 25px;">Profil</a>';
                    }
                    ?>
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
    </section>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
