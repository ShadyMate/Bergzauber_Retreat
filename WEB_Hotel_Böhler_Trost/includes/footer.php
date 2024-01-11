<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Bergzauber Retreat GMBH</p>
    <p>
        <a href="../php/index.php">Startseite</a> |
        <a href="../php/impressum.php">Impressum</a> |
        <a href="../php/faq.php">FAQ</a>
    </p>
</footer>

