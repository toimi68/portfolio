<?php
//Variable d'affichage :
$competence = "";
$errorComp="";
$bo_comps="";
$msgSuccess="";

/*----- Affichage des competences -----*/
if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $req= $pdo->query("SELECT * FROM competences");


    while($comps = $req->fetch(PDO::FETCH_ASSOC)){
        //debugV($comps);

        $competence .= '<div class="col-md-3 mt-5">';
        $competence .= '<div class="card mt-5 shadow-sm">';
        $competence .= '<i class="'.$comps['cptechnology'].' fa-6x"></i>';
        $competence .= '<div class ="card-body">';
        if($comps['cplevel'] == 1){
            $competence .= '<p class="text-warning">Débutant</p>';
        }elseif($comps['cplevel'] == 2){
            $competence .= '<p class="text-info">Intermédiaire</p>';
        }elseif($comps['cplevel']== 3){
            $competence .= '<p class="text-primary">Avancé</p>';
        }elseif($comps['cplevel']== 4){
            $competence .= '<p class="text-success">Maitrise</p>';
        }

        $competence .= '<div class ="d-flex justify-content-between align-items-center">';
        $competence .= '</div>';
        $competence .= '</div>';
        $competence .= '</div>';
        $competence .= '</div>';
    }
}

/*>>>>> GESTION ADMIN COMPETENCE >>>>>*/
/*
*SUPPRESSION DES COMPETENCES
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $req= executeRequete("DELETE FROM competences WHERE idcompetence = :idcompetence", array(
        ':idcompetence' => $_GET['id']
    ));

    if($req->rowCount()== 1){

        $errorComp .= '<div class="alert alert-success>La competence n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{

        $errorComp .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }
}

/*
*AFFICHAGE DES COMPETENCES
*/

if(isset($_GET['gestion']) && $_GET['gestion'] =='competence'){
    $req = $pdo->query("SELECT * FROM competences ");
    while($competence = $req->fetch(PDO::FETCH_ASSOC)){
        $bo_comps .= '<tr>';
        $bo_comps .= '<th scope="row"><i class="fa-2x '.$competence['cptechnology'].'"></i></th> ';
        if($competence['cplevel'] == 1){
            $bo_comps .= '<td class="text-warning">Débutant</td>';
        }elseif($competence['cplevel'] == 2){
            $bo_comps .= '<td class="text-info">Intermédiaire</td>';
        }elseif($competence['cplevel']== 3){
            $bo_comps .= '<td class="text-primary">Avancé</td>';
        }elseif($competence['cplevel']== 4){
            $bo_comps .= '<td class="text-success">Maitrise</td>';
        }
        $bo_comps .='<td><a href="../form/formComp.php?action=update&id='.$competence['idcompetence'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_comps .='<td><a href="?gestion=competence&action=supp&id='.$competence['idcompetence'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_comps .= '</tr>';
    }
}

/*
*AJOUT & MODIFICATION DES COMPETENCES
*/

// 1 -  Je récupère les infos pour la modification

if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){
    $req = $pdo->prepare("SELECT * FROM competences WHERE idcompetence = :idcompetence");
    $req->bindParam(':idcompetence', $_GET['id']);
    $req->execute();

    if($req->rowCount() > 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $comp_update = $req->fetch(PDO::FETCH_ASSOC);
    }
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){
    //Vérification des champs
    if(!isset($_POST['cptechnology']) || strlen($_POST['cptechnology']) < 3 || strlen($_POST['cptechnology'])> 255 ){
        $errorComp .= '<div class="alert alert-warning text-danger">** Saisissez une technologie</div>';
    }
    if(!isset($_POST['cplevel']) || !is_numeric($_POST['cplevel'])){
        $errorComp .= '<div class="alert alert-warning text-danger">** Entrez votre niveau de competence</div>';
    }
    //1.3 - Insertion en BDD si tout les champs sont correctes
    if(empty($errorComp)){
        // a) assainissement des saisies de l'intertnaute
        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        //b) enregistrement en BDD
        $donnees = $pdo->prepare("REPLACE INTO competences VALUES (:idcompetence, :cptechnology, :cplevel)", array(
                ':idcompetence' => $_POST['idcompetence'],
                ':cptechnology' => $_POST['cptechnology'],
                ':cplevel' => $_POST['cplevel'],
            )
        );
        $donnees->bindparam(':idcompetence', $_POST['idcompetence']);
        $donnees->bindParam(':cptechnology',$_POST['cptechnology']);
        $donnees->bindParam(':cplevel', $_POST['cplevel']);
        $donnees->execute();

        $msgSuccess .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)