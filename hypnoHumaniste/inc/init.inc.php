 <?php
//  CONEXION BDD 
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=hypnohumaniste',
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