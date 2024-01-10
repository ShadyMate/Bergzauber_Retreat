<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$calling_file = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION["username"])) {
  $_SESSION["username"] = "";
}
if (!isset($_SESSION["loggedin"])) {
  $_SESSION["loggedin"] = "";
}
if (!isset($_SESSION["registriert"])) {
  $_SESSION["registriert"] = "";
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../php/index.php"><img src="../res/img/Logo.png" alt="Logo" width="50" height="50">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <?php
       if ($_SESSION["username"] == "admin" && $_SESSION["pword"] == "admin" || ($_SESSION["registriert"] == "user") && $_SESSION["pword"] == "1234") {
              echo '<a class="nav-link" href="../includes/Profil.php" style="padding-left: 20px; font-size: 25px;">Profil</a>';
       } else {
        echo '<a class="nav-link" href="../includes/registrierung.php" style="font-size: 25px;">Registrierung</a>';
       }
       ?>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="../includes/login.php" style="padding-left: 20px; font-size: 25px;">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../includes/Zimmer.php" style="padding-left: 20px; font-size: 25px;">Zimmer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../includes/faq.php" style="padding-left: 20px; font-size: 25px;">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../includes/impressum.php" style="padding-left: 20px; font-size: 25px;">Impressum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../includes/news.php" style="padding-left: 20px; font-size: 25px;">News</a>
        </li>
        <li class="nav-item">
      </li>
      </ul>
    </div>
  </div>
</nav>