<?php
$url = "localhost";
$bdname = "proto";
$user = "pia";
$pass = "17A07n95t%Rmz!";

try {
    $pdo = new PDO("mysql:host=$url;dbname=$bdname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
