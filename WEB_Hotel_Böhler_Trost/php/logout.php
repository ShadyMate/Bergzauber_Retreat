<?php
//wird zum logout und zum destroyen der session verwendet
session_start();
session_destroy();
header('Location: ../php/index.php');
?>