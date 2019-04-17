<?php
require_once '../inc/init.inc.php';

/*>>>>> CONNEXION >>>>>*/

$req = $pdo->query("SELECT * FROM  user");
$admin = $req->fetch(PDO::FETCH_ASSOC);



//Contrôle des champs pour la connexion :
if($_POST) {

    if(!isset($_POST['uemail']) || !filter_var($_POST['uemail'],FILTER_VALIDATE_EMAIL ) || $_POST['uemail'] != $admin['uemail'] && !isset
        ($_POST['upassword']) || password_verify($_POST['upassword'], $admin['upassword']) && $admin['ustatut'] != 1){


        header('location:../index.php');

    }else{
    header('location:../admin/gestionIndex.php');

    }
}
