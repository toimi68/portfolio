<?php

// Variable d'affichage :
$langue = "";
$bo_langue ="";
$errorLangue ="";
$successLangue="";


if(isset($_GET['choix']) && $_GET['choix'] == 'formation'){
    $req = $pdo->query("SELECT * FROM languages");
    while($lang = $req->fetch(PDO::FETCH_ASSOC)){

        $langue .= '<div class="col-lg-3">';
        $langue .= '<div class="card" id="card">';
        $langue .= '<div class="face front"></div>';
        $langue .= '<div class="face back">';
        if($lang['lglevel'] == 1){
            $langue .= '<p class="text-warning">Débutant</p>';
        }elseif($lang['lglevel'] == 2){
            $langue .= '<p class="text-info">Intermédiaire</p>';
        }elseif($lang['lglevel']== 3){
            $langue .= '<p class="text-primary">Avancé</p>';
        }elseif($lang['lglevel']== 4){
            $langue .= '<p class="text-success">Maitrise</p>';
        }
        $langue .= '</div>';
        $langue .= '</div>';
        $langue .= '</div>';
//

    }
}
/*>>>>> GESTION ADMIN DES LANGUES >>>>>*/
/*
*SUPPRESSION DES LANGUES
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $req= executeRequete("DELETE FROM languages WHERE idlanguage = :idlanguage", array(
        ':idlanguage' => $_GET['id']
    ));

    if($req->rowCount()== 1){

        $errorLangue .= '<div class="alert alert-success>La langue n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{

        $errorLangue .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }
}
/*
*AFFICHAGE ADMIN DES LANGUES
*/

if(isset($_GET['gestion']) && $_GET['gestion'] =='formation'){
    $req = $pdo->query("SELECT * FROM languages");
    while($lang = $req->fetch(PDO::FETCH_ASSOC)){
        $bo_langue .= '<tr>';
        $bo_langue .= '<td>'.$lang['lglanguage'].'</td>';
        if($lang['lglevel'] == 1){
            $bo_langue .= '<td class="text-warning">Débutant</td>';
        }elseif($lang['lglevel'] == 2){
            $bo_langue .= '<td class="text-info">Intermédiaire</td>';
        }elseif($lang['lglevel']== 3){
            $bo_langue .= '<td class="text-primary">Avancé</td>';
        }elseif($lang['lglevel']== 4){
            $bo_langue .= '<td class="text-success">Maitrise</td>';
        }
        $bo_langue .='<td><a href="../form/formLangue.php?action=update&id='.$lang['idlanguage'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_langue .='<td><a href="?gestion=formation&action=supp&id='.$lang['idlanguage'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_langue .= '</tr>';
    }
}

/*
*AJOUT & MODIFICATION DES LANGUES
*/

// 1 -  Je récupère les infos pour la modification
if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){
    $req = $pdo->prepare("SELECT * FROM languages WHERE idlanguage = :idlanguage");
    $req->bindParam(':idlanguage', $_GET['id']);
    $req->execute();

    if($req->rowCount()> 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $langue_update = $req->fetch(PDO::FETCH_ASSOC);
    }
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'
//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){
    //Vérification des champs
    if(!isset($_POST['lglanguage']) || strlen($_POST['lglanguage']) < 3 || strlen($_POST['lglanguage']) > 40){
        $errorLangue .= '<div class="alert alert-warning text-danger">** Indiquez une langue </div>';
    }
    if(!isset($_POST['lglevel']) || !is_numeric($_POST['lglevel'])){
        $errorLangue .= '<div class="alert alert-warning text-danger">** Sélectionnez votre niveau</div>';
    }

    //1.3 - Insertion en BDD si tout les champs sont correctes
    if(empty($errorLangue)){
        // a) assainissement des saisies de l'intertnaute
        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        //b) enregistrement en BDD
        $donnees = $pdo->prepare("REPLACE INTO languages VALUES (:idlanguage, :lglanguage, :lglevel)", array(
                ':idlanguage' => $_POST['idlanguage'],
                ':lglanguage' => $_POST['lglanguage'],
                ':lglevel' => $_POST['lglevel'],

            )
        );
        $donnees->bindparam(':idlanguage', $_POST['idlanguage']);
        $donnees->bindParam(':lglanguage', $_POST['lglanguage']);
        $donnees->bindParam(':lglevel',$_POST['lglevel']);
        $donnees->execute();

        $successLangue .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)