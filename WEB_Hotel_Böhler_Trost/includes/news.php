<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>News</title>
    <?php include "../includes/header.php"?>
</head>
<body>
    <h1>News</h1>
<?php include '../includes/nav.php'; ?>
<?php
// a. Beitragsanzeige
$beitraege = array(
    array("titel" => "Beitrag 1", "inhalt" => "Inhalt 1", "bild" => "bild1.jpg"),
    array("titel" => "Beitrag 2", "inhalt" => "Inhalt 2", "bild" => "bild2.jpg"),
    // Fügen Sie hier weitere Beiträge hinzu...
);

// Sortieren Sie die Beiträge nach Datum, neueste zuerst (angenommen, es gibt ein 'datum' Feld)
//usort($beitraege, function($a, $b) {
   // return $b['datum'] <=> $a['datum'];
//});

foreach ($beitraege as $beitrag) {
    echo "<div class='beitrag'>";
    echo "<h2>{$beitrag['titel']}</h2>";
    echo "<img src='thumbnails/{$beitrag['bild']}' alt='{$beitrag['titel']}'>";
    echo "<p>{$beitrag['inhalt']}</p>";
    echo "</div>";
}

// b. File-Upload
if (isset($_FILES['fileToUpload'])) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Überprüfen Sie, ob die Datei ein Bild ist
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // Datei ist ein Bild, versuchen Sie, es hochzuladen
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Erstellen Sie ein Thumbnail und speichern Sie es in einem separaten Verzeichnis
            createThumbnail($target_file, "thumbnails/" . basename($target_file), 200, 200); //neuen ordner für thumbnails erstellen
            echo "Die Datei ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " wurde hochgeladen.";
        } else {
            echo "Es gab einen Fehler beim Hochladen Ihrer Datei.";
        }
    } else {
        echo "Datei ist kein Bild.";
    }
}
?>


<form enctype="multipart/form-data" method="post">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
    
</body>
</html>