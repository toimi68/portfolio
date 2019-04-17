<?php
require_once '../inc/init.inc.php';

/*>>>>> CONNEXION >>>>>*/
//Variable d'affichage :
//$isAdmin="";
//Connexion à la BDD et récupération des infos admin :
$req = $pdo->query("SELECT * FROM  user");
$admin = $req->fetch(PDO::FETCH_ASSOC);



//Contrôle des champs pour la connexion :
if($_POST) {

    // MILA - mdp crypté :
//    $email = 'alpha.diallo@outlook.fr';
//    $mdp = 'Mak_smaLa77_20'; // info en BDD
//
//// hashage
//    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
//// $mdp = md5($mdp); // mal sécurisé !!
//    echo $mdp;
//
//    $verif_mdp = 'Mak_smaLa77_20'; // info saisie par l'utilisateur
//
//    if(password_verify($verif_mdp, $mdp)) {
//        echo '<br>OK';
//    } else {
//        echo '<br>NOK';
//
//    }

    if(!isset($_POST['uemail']) || !filter_var($_POST['uemail'],FILTER_VALIDATE_EMAIL ) || $_POST['uemail'] != $admin['uemail'] && !isset
        ($_POST['upassword']) || password_verify($_POST['upassword'], $admin['upassword']) && $admin['ustatut'] != 1){


        header('location:../index.php');

    }else{
    header('location:../admin/gestionIndex.php');

    }
}
/************************* DECONNEXION *************************/

//if(!empty($_GET) && $_GET['action'] == 'deconnexion'){
////    header('location:../index.php');
////    header('location:http://www.google.com/');
////    session_destroy();
////    require '../index.php';
//
//}

