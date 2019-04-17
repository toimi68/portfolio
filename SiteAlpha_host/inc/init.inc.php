<?php
// Connexion à la BDD :
try {

    $pdo = new PDO(
        'mysql:host=localhost:3306;dbname=foliosymfony',
        'alpha',
        'Mak_smaLa77_20',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8',
        )
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Constante qui contient le chemein du site :
//define('RACINE_SITE', '2_Production/SitePortefolio/');

require_once 'function.php';