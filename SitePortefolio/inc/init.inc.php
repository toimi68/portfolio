<?php
// Connexion à la BDD :
$pdo = new PDO(
    'mysql:host=localhost;dbname=foliosymfony',
    'root',
    'root',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8',
    )
);

require_once 'function.php';