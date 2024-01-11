<div class="card-group">
    <div class="card" style="max-height: 100vh">
        <img class="card-img-top" src="../res/img/hotelzimmer.jpg" alt="Hotelzimmer">
        <div class="card-body text-center">
            <h5 class="card-title">Zimmerangebot</h5>
            <p class="card-text">Hier finden Sie alle Angebote, sowie Infos zur Buchung</p>
            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
              }
            include_once 'dbaccess.php';
                if (isset($_SESSION['username'])) {
                    echo '<a href="../php/Zimmer.php" class="btn btn-primary">Zimmer buchen</a>';
                } else {
                    echo '<a href="../php/registrierung.php" class="btn btn-primary">Sie müssen sich erst registrieren oder einloggen!</a>';
                }
            ?>
        </div>
    </div>
    <div class="card" style="max-height: 100vh">
        <img class="card-img-top" src="../res/img/radfahren.jpg" alt="Radweg">
        <div class="card-body text-center">
            <h5 class="card-title">Aktivitäten</h5>
            <p class="card-text">Rund um das Hotel gibt es viele Dinge zu tun und zu sehen.
                Hier finden sie einige beliebte Aktivitäten</p>
        </div>
    </div>
    <div class="card" style="max-height: 100vh">
        <img class="card-img-top" src="../res/img/Spaimagerezied.jpeg" alt="Spa" height="59%">
        <div class="card-body text-center">
            <h5 class="card-title">Unser Spa Angebot</h5>
            <p class="card-text">Wir haben eine große Auswahl an Spa Angeboten für sie.</p>
        </div>
    </div>
</div>