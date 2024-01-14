<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once '../includes/dbaccess.php';

$target_dir = "../uploads/news/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

    // Hier Thumbnail erstellen
    $thumbnail_dir = "../uploads/thumbnails/";
    $thumbnail_file = $thumbnail_dir . basename($_FILES["fileToUpload"]["name"]);
    create_thumbnail($target_file, $thumbnail_file);

    // Text aus dem Formular abrufen
    $text = $_POST["textToUpload"];

    //Aktuelles Datum und Uhrzeit abrufen
    $datum = date('Y-m-d H:i:s');

 // Insert into database
 $sql = "INSERT INTO newsbeiträge (userid, Bilddatei, `Text`, Datum) VALUES (?, ?, ?, ?)";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("isss", $userid, $bilddatei, $text, $datum);

$userid = $_SESSION['userid']; // Die ID des Benutzers
$bilddatei = $thumbnail_file; // Der Pfad zur Bilddatei

if ($stmt->execute() === TRUE) {
    echo "Record inserted successfully";
  } else {
    echo "Error inserting record: " . $stmt->error;
  }

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

function create_thumbnail($source_image_path, $thumbnail_image_path, $width = 500, $height = 500)
{
    list($source_width, $source_height, $source_type) = getimagesize($source_image_path);
    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source_image_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source_image_path);
            break;
    }
    if ($source_gd_image === false) {
        return false;
    }
    $source_aspect_ratio = $source_width / $source_height;
    $thumbnail_aspect_ratio = $width / $height;
    if ($source_width <= $width && $source_height <= $height) {
        $thumbnail_width = $source_width;
        $thumbnail_height = $source_height;
    } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
        $thumbnail_width = (int) ($height * $source_aspect_ratio);
        $thumbnail_height = $height;
    } else {
        $thumbnail_width = $width;
        $thumbnail_height = (int) ($width / $source_aspect_ratio);
    }
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $source_width, $source_height);
    imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    return true;
}


header('Location: ../php/news.php?'.time());
?>