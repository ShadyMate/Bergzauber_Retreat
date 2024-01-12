<?php
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
$target_dir = "../uploads/news/";
if(isset($_POST["submit"])) {
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  // rest of your code...
$target_dir = "../uploads/news/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File ist ein Bild. - " . $check["mime"] . ". ";
    $uploadOk = 1;
  } else {
    echo "File ist kein Bild. ";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Dieses Bild existiert bereits! ";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Das Bild ist zu groß. ";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Es ist ein Fehler aufgetreten. Nur JPG, JPEG, PNG & GIF dateien sind erlaubt. ";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Dieses Bild existiert bereits! ";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Das Bild ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " wurde erfolgreich hochgeladen! ";
  } else {
    echo "Ein Fehler ist aufgetreten.";
  }
}
}
    if ($_SESSION["success"] == "trueadmin") {
    echo '<form enctype="multipart/form-data" method="post" class="text-center">
    <input type="file" name="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>';
  }
    ?>
<main class="main container" style="padding-bottom: 30px">
    <form>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <?php
          $dir = "../uploads/news/";
          $files = scandir($dir);
          $active = 'active';
          foreach($files as $file) {
          if ($file === '.' || $file === '..') continue;
            echo "<div class='carousel-item $active'>";
            echo "<img src='$dir$file' class='d-block w-100' alt='Image'>";
            echo "</div>";
            $active = '';
            }
          ?>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </form>
  </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include "../includes/footer.php"; ?>
</body>
</html>