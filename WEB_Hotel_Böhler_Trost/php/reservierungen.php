
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservierungen</title>
    <?php include "../includes/header.php"; ?>
</head>
<body>
<h1 class="maintitle">Bergzauber Retreat</h1>
<?php include '../includes/nav.php'; ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
include_once '../includes/dbaccess.php';
$sql = "SELECT user.userid, zimmer.*
FROM user
JOIN user_zimmer ON user.userid = user_zimmer.userid
JOIN zimmer ON user_zimmer.zimmer_id = zimmer.zimmer_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Geht durch alle Zeilen und zeigt jede Reservierung an
    while($row = mysqli_fetch_assoc($result)) {
        echo '<form method="post" action="../includes/update_status.php">';
        echo '<label>Benutzer ' . $row["userid"] . ' hat eine Buchung von ';
        echo $row["Anreise"];
        echo ' bis ';
        echo $row["Abreise"];
        echo ' im Wert von ';
        echo $row["Kosten"];
        echo '€.</label><br>';
        echo 'Zimmer ID:';
        echo $row["zimmer_id"];
        echo '<input type="hidden" name="zimmer_id" value="' . $row["zimmer_id"] . '">';
        if ($row["Frühstück"] == 1) {
            echo '<br>';
            echo "Ihnen wird ein köstliches Frühstück gebracht.";
        }
        if ($row["Parkplatz"] == 1) {
            echo '<br>';
            echo "Ihnen wird ein Parkplatz reserviert.";
        }
        if ($row["Haustiere"] == 1) {
            echo '<br>';
            echo "Für Ihre Haustiere wird gesorgt.";
        }
        echo '<br>Status der Reservierung: ';
        echo $row['Status'];
        echo '<br>';
        echo '<select name="status">';
        echo '<option value="Neu">Neu</option>';
        echo '<option value="Bestätigt">Bestätigt</option>';
        echo '<option value="Storniert">Storniert</option>';
        echo '</select>';
        echo '<input type="submit" value="Status aktualisieren">';
        echo '</form>';
    }
} else {
    echo "Keine Reservierungen gefunden.";
}
?>
    <!--dieses skript verhindert das weiterleiten auf update_status.php und aktualisiert die Datenbank direkt auf dieser Seite mithilfe von update_status.php!-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("form").on("submit", function(event){
    event.preventDefault();

    $.ajax({
      url: "../includes/update_status.php",
      type: "post",
      data: $(this).serialize(),
      success: function(response){
        alert(response);
        location.reload();
      }
    });
  });
});
</script>
</body>
</html>