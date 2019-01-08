<?php
// Connexion à la BDD :
try {

    $pdo = new PDO(
        'mysql:host=localhost;dbname=foliosymfony',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8',
        )
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

require_once 'function.php';