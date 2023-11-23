<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>FAQ</title>
  <?php include "../includes/header.php"; ?>
</head>
<body>
<header>
    <h1 class="title">FAQ</h1>
</header>
<?php
include "nav.php";
?>
<div class="container">
    <form style="width: 1000px">
    <section>
    <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Wo ist das Hotel?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
        <strong>In den Alpen.</strong> 
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Wie viele Parkplätze gibt es?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div class="accordion-body">
        <strong>Einen.</strong> 
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Kann ich auch meinen Goldfisch mitnehmen?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div class="accordion-body">
        <strong>Ja können Sie.</strong> Wir haben selbstverständlich auch Fischfutter.
      </div>
    </div>
  </div>
</div>
    </section>
    <br>
    <section>
        <p>Bei weiteren Fragen wenden sie sich an: <a href="mailto:if23b274@technikum-wien.at">if23b274@technikum-wien.at</a> </p>
    </section>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
