<?php
/*----- Affichage Formations  -----*/
//Variable d'affichage formation:
$diplome = "";
$bo_diplome ="";
$errorFormation ="";
$successFormation="";
if(isset($_GET['choix']) && $_GET['choix'] == 'formation'){
    $req = $pdo->query("SELECT * FROM schooling ORDER BY sgdate DESC");
    while($school = $req->fetch(PDO::FETCH_ASSOC)){
        $diplome .='<div class="col-lg-3">';
        $diplome .='<div id="menuRotate">';
        $diplome .='<dl class="menu">';
        $diplome .= '<dt class="btnRot">'.$school['sgdate'].'</dt>';
        $diplome .='<dd>'.$school['sgdescription'] .'</dd>';
        $diplome .='<dd>'.$school['sgsubtitle'] .'</dd>';
        $diplome .='<dd>'.$school['sgtitle'] .'</dd>';
        $diplome .='</dl>';
        $diplome .='<div class="masque"><div>';
        $diplome .='<div class="ombre"><div>';
        $diplome .='<div>';
        $diplome .="</div>";
    }
}
/*>>>>> GESTION ADMIN FORMATION >>>>>*/

/*
*SUPPRESSION DES FORMATIONS
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $req= executeRequete("DELETE FROM schooling WHERE idschooling = :idschooling", array(
        ':idschooling' => $_GET['id']
    ));

    if($req->rowCount()== 1){

        $errorFormation .= '<div class="alert alert-success>La formation n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{

        $errorFormation .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }
}
/*
*AFFICHAGE DES FORMATIONS
*/

if(isset($_GET['gestion']) && $_GET['gestion'] =='formation'){
    $req = $pdo->query("SELECT * FROM schooling ORDER BY sgdate DESC");
    while($schooling = $req->fetch(PDO::FETCH_ASSOC)){
        $bo_diplome .= '<tr>';
        $bo_diplome .= '<td>'.$schooling['sgdate'].'</td>';
        $bo_diplome .= '<th>'.$schooling['sgtitle'].'</th>';
        $bo_diplome .= '<th>'.$schooling['sgsubtitle'].'</th>';
        $bo_diplome .= '<td>'.$schooling['sgdescription'].'</td>';
        $bo_diplome .='<td><a href="../form/formFormation.php?action=update&id='.$schooling['idschooling'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_diplome .='<td><a href="?gestion=formation&action=supp&id='.$schooling['idschooling'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_diplome .= '</tr>';
    }
}

/*
*AJOUT & MODIFICATION DES EXPERIENCES
*/


// 1 -  Je récupère les infos pour la modification
if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){
    $req=$pdo->prepare("SELECT * FROM schooling WHERE idschooling = :idschooling");
    $req->bindParam(':idschooling', $_GET['id']);
    $req->execute();

    if($req->rowCount() > 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $school_update = $req->fetch(PDO::FETCH_ASSOC);
    }//if($req->rowCount() > 0

}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

$select_date = '';
$year = date('Y');
$century = $year - 100;

while($year >= $century){
    if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id']) && $_GET['id'] == $school_update['idschooling'] &&
        $school_update['sgdate'] == $year){
        $select_date .= '<option selected>' . $year . '</option>';
    }
    elseif ($_POST && isset($_POST['sgdate']) && $_POST['sgdate'] == $year ) {
        $select_date .= '<option selected>' . $year . '</option>';
    } else {
        $select_date .= '<option>' . $year . '</option>';
    }
    $year--;
}

//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){
    //Vérification des champs
    if(!isset($_POST['sgdate']) || !is_numeric($_POST['sgdate']) || $_POST['sgdate'] > date('Y') || $_POST['sgdate'] < $century){
        $errorFormation .= '<div class="alert alert-warning text-danger">** Sélectionnez une date</div>';
    }
    if(!isset($_POST['sgtitle']) || strlen($_POST['sgtitle']) < 3 || strlen($_POST['sgtitle']) > 100){
        $errorFormation .= '<div class="alert alert-warning text-danger">** Indiquez le diplome obtenu </div>';
    }
    if(!isset($_POST['sgsubtitle']) || strlen($_POST['sgsubtitle']) < 3 || strlen($_POST['sgsubtitle']) > 150){
        $errorFormation .= '<div class="alert alert-warning text-danger">** Indiquez la spécialité </div>';
    }
    if(!isset($_POST['sgdescription']) || strlen($_POST['sgdescription']) < 3 || strlen($_POST['sgdescription']) > 200){
        $errorFormation .= '<div class="alert alert-warning text-danger">** Faite un descriptif </div>';
    }
    //1.3 - Insertion en BDD si tout les champs sont correctes
    if(empty($errorFormation)){
        // a) assainissement des saisies de l'intertnaute
        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        //b) enregistrement en BDD
        $donnees = $pdo->prepare("REPLACE INTO schooling VALUES (:idschooling, :sgdate, :sgtitle, :sgsubtitle, :sgdescription)", array(
                ':idschooling' => $_POST['idschooling'],
                ':sgdate' => $_POST['sgdate'],
                ':sgtitle' => $_POST['sgtitle'],
                ':sgsubtitle' => $_POST['sgsubtitle'],
                ':sgdescription' => $_POST['sgdescription']
            )
        );
        $donnees->bindparam(':idschooling', $_POST['idschooling']);
        $donnees->bindParam(':sgdate', $_POST['sgdate']);
        $donnees->bindParam(':sgtitle',$_POST['sgtitle']);
        $donnees->bindParam(':sgsubtitle', $_POST['sgsubtitle']);
        $donnees->bindParam(':sgdescription', $_POST['sgdescription']);
        $donnees->execute();

        $successFormation .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)
