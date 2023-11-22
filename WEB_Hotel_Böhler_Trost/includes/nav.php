<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../php/index.php"><img src="../res/img/Logo.png" alt="Logo" width="50" height="50">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../includes/registrierung.php" style="font-size: 25px;">Registrierung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../includes/login.php" style="padding-left: 20px; font-size: 25px;">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../includes/faq.php" style="padding-left: 20px; font-size: 25px;">Hilfe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../includes/impressum.php" style="padding-left: 20px; font-size: 25px;">Impressum</a>
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