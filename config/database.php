<?php

$hostname = "localhost";
$dbname = "cw1841";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username,$password);
} catch (PDOException $e) {
    echo $e->getMessage();
}