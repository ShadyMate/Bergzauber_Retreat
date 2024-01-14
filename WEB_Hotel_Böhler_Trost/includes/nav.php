<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
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
        </li>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
include_once 'dbaccess.php';
if (is_resource($conn) && get_resource_type($conn) === 'mysql link') {
  mysqli_close($conn);
}
        //wenn kein username vorhanden ist(also noch nicht registriert), dann wird der login und der registrier button angezeigt
       if (!isset($_SESSION['username'])) {
        echo '<a class="nav-link" href="../php/registrierung.php" style="font-size: 25px;">Registrierung</a>';
        echo '<a class="nav-link" href="../php/login.php" style="font-size: 25px;">Login</a>';
       }
       ?>
          <li class="nav-item">
          <a class="nav-link" href="../php/Zimmer.php" style="padding-left: 20px; font-size: 25px;">Zimmer</a>
        <li class="nav-item">
          <a class="nav-link" href="../php/faq.php" style="padding-left: 20px; font-size: 25px;">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/news.php" style="padding-left: 20px; font-size: 25px;">News</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="../php/aktivitaeten.php" style="padding-left: 20px; font-size: 25px;">Aktivitäten</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../php/spa.php" style="padding-left: 20px; font-size: 25px;">Spa</a>
        </li>
          <?php
          //wenn ein user eingeloggt ist, wird überprüft ob er admin ist, wenn ja, wird der userverwaltung und reservierungen button angezeigt
          if (isset($_SESSION['rechte'])) {
            if ($_SESSION['rechte'] == "admin") {
              echo '<a class="nav-link" href="../php/userverwaltung.php" style="padding-left: 20px; font-size: 25px;">Userverwaltung</a>';
              echo '<a class="nav-link" href="../php/reservierungen.php" style="padding-left: 20px; font-size: 25px;">Reservierungen</a>';
            }
          }
          ?>
      </ul>
    </div>
  </div>
  <?php
  //wenn ein user eingeloggt ist, wird der profil button angezeigt
  if (isset($_SESSION['username'])) {
  echo '<a class="navbar-brand ms-auto" href="../php/Profil.php">Profil <img src="../res/img/Profil.png" alt="Profil" width="50" height="50"></a>';
}
?>
</nav>