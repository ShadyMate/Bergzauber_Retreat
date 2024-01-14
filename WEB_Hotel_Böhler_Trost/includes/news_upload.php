<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once '../includes/dbaccess.php';

$target_dir = "../uploads/news/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//uploaden des Bildes wird hiermit erlaubt
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Überprüft ob Datei wirklich ein Bild ist
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

// Überprüft ob Datei bereits existiert
if (file_exists($target_file)) {
  $uploadOk = 0;
}

// Überprüft die Dateigröße
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $uploadOk = 0;
}

// Überprüft das Dateiformat
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Nur JPG, JPEG, PNG & GIF sind erlaubt.";
  $uploadOk = 0;
}

// Wenn $uploadOk = 0 ist, wird die Datei nicht hochgeladen
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// wenn alles in Ordnung ist, wird die Datei hochgeladen
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

    // Hier wird Thumbnail erstellt
    $thumbnail_dir = "../uploads/thumbnails/";
    $thumbnail_file = $thumbnail_dir . basename($_FILES["fileToUpload"]["name"]);
    create_thumbnail($target_file, $thumbnail_file);

    // Text aus dem Formular abrufen
    $text = $_POST["textToUpload"];

    //Aktuelles Datum und Uhrzeit abrufen
    $datum = date('Y-m-d H:i:s');

 // wird in die Datenbank eingefügt
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
// Funktion zum Erstellen eines Thumbnails, welches auf der news.php angezeigt wird
  //die vier Parameter akzeptiert: den Pfad zum Quellbild, den Pfad, wo das Thumbnail gespeichert werden soll, 
  //und die gewünschte Breite und Höhe des Thumbnails. Die Breite und Höhe sind optional und standardmäßig auf 500 gesetzt.
function create_thumbnail($source_image_path, $thumbnail_image_path, $width = 500, $height = 500)
{
//ruft die Breite, Höhe und den Typ des Quellbildes ab
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
    //berechnen das Seitenverhältnis des Quellbildes und des gewünschten Thumbnails.
    $source_aspect_ratio = $source_width / $source_height;
    $thumbnail_aspect_ratio = $width / $height;
    //Seitenverhältnis des Quellbildes und des gewünschten Thumbnails vergleichen
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
    //das Quellbild in das Thumbnail kopieren und die Größe anpassen
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $source_width, $source_height);
    imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    return true;
}


header('Location: ../php/news.php?'.time());
?>