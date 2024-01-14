<?php /*
    session_start();
if (!isset($_SESSION["success"])) {
      $_SESSION["success"] = "";
    }
if (!isset($_SESSION["success"])) {
      $_SESSION["success"] = "";
    }
if (!isset($dst)) {
      $dst = null;
    }
    if (!isset($new_folder_path)) {
      $new_folder_path = "";
    }
    if (!isset($file)) {
      $file = "";
    }
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>News</title>
  <?php include "../includes/header.php";?>
</head>
<body>
  <h1 class="title">Newspage</h1>
<?php
include "../includes/nav.php";
?>
   <?php
   //man kann nur beiträge hinzufügen wenn man admin ist
    if (isset($_SESSION['rechte']) && $_SESSION['rechte'] == 'admin') {
      echo '<form action="../includes/news_upload.php" method="post" enctype="multipart/form-data">
      Ein Bild hochladen:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <br>
      <br>
      Text eingeben:
      <textarea name="textToUpload" id="textToUpload"></textarea>
      <br>
      <input type="submit" value="Bild und Text hochladen" name="submit">
    </form>';
    }
   ?>
  <div class="card-group">
      <?php
      if (session_status() == PHP_SESSION_NONE) {
          session_start();
      }

      include_once '../includes/dbaccess.php';
      $sql = "SELECT newsid, Datum, Bilddatei, `Text` FROM newsbeiträge ORDER BY newsid DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          while($row = $result->fetch_assoc()) {
              echo '<div class="card">';
              echo '<img src='.$row["Bilddatei"].' alt="Newsbild" class="card-img-top resized-image">';
              echo '<p class="center">'.$row["Text"].'</p>';
              echo '<p class="center">'.$row["newsid"].'</p>';
              echo '<p class="center">'.$row["Datum"].'</p>';
              echo '</div>';
          }
      } else {
          echo "Keine Newsbeiträge gefunden";
      }
      ?>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include "../includes/footer.php"; ?>
</body>
</html>