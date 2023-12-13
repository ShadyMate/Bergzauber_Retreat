<?php
$host = "localhost";
$name = "bif1webtechdb";
$user = "user";
$passwort = "1234";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
 ?>