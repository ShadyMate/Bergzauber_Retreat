<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include_once '../includes/dbaccess.php';
?>
<!-- TODO: Zimmer verschönern, Text bearbeiten, Preise und verschönern -->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Zimmerauswahl</title>
    <?php include "../includes/header.php"; ?>
</head>
<body>
<header>
    <h1 class="title">Verfügbare Zimmer</h1>
</header>
<?php
include "../includes/nav.php";
?>
<div class="container" style="padding: 15px">
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../res/img/Zimmer1.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Jr. Suite</h3>
        <h4>Zwei Single Beds, ab 100 €</h4>
          <a href="Zimmerbuchen.php?kosten=100" class="btn btn-primary">Hier buchen</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../res/img/Zimmer2.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
          <h3>Sr. Suite</h3>
          <h4>Ein Doppelbett in einem größeren Zimmer ab 200 €</h4>
          <a href="Zimmerbuchen.php?kosten=200" class="btn btn-primary">Hier buchen</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../res/img/Zimmer3.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
          <h3>Deluxe Suite</h3>
          <h4>Unsere luxuriöseste Suite, mit dem besten Ausblick in ganz Lech ab 400 €</h4>
          <a href="Zimmerbuchen.php?kosten=400" class="btn btn-primary">Hier buchen</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include "../includes/footer.php"; ?>
</body>
</html>