<?php
//Variable d'affichage :
$projet ="";
$bo_projet ="";
$errorProjet="";
$successProjet="";
if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $req = $pdo->query("SELECT * FROM projects");

    if($req->rowCount() == 0){
        $msg .= '<h2> Projets à venir ...</h2>';
    }
    while($projets = $req->fetch(PDO::FETCH_ASSOC)){
        //debugV($project);
        $projet .='<div class="col-lg-4 mt-2">';
        $projet .='<img class="rounded-circle" src="" alt="Generic placeholder image" width= "140" height= "140">';
        $projet .='<h2 class="m-1">'.$projets['pjtitle'].'</h2>';
        $projet .='<p><a class="btn btn-success " href="'.$projets['pjlink'].'" role="button"> Visiter</a></p>';
        $projet .='</div>';
    }
}

/*>>>>> GESTION ADMIN PROJET >>>>>*/

/*
*SUPPRESSION DES PROJETS
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $req= executeRequete("DELETE FROM projects WHERE idproject = :idproject", array(
        ':idproject' => $_GET['id']
    ));

    if($req->rowCount()== 1){

        $errorProjet .= '<div class="alert alert-success>Le projet n°' . $_GET['id'] . ' a bien été supprimé </div>';
    }else{

        $errorProjet .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }
}
/*
*AFFICHAGE DES PROJETS
*/

if(isset($_GET['gestion']) && $_GET['gestion'] == 'competence'){
    $req = $pdo->query("SELECT * FROM projects");
    while($project = $req->fetch(PDO::FETCH_ASSOC)){
        $bo_projet .= '<tr>';
        $bo_projet .= '<th scope="row">'.$project['pjtitle'].'</th> ';
        $bo_projet .= '<td class="text-success"><a href="'.$project['pjlink'].'">'.$project['pjlink'].'</a></td>';

        $bo_projet .='<td><a href="../form/formProjet.php?action=update&id='.$project['idproject'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_projet .='<td><a href="?gestion=competence&action=supp&id='.$project['idproject'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_projet .= '</tr>';

    }
}

/*
*AJOUT & MODIFICATION DES PROJETS
*/

// 1 -  Je récupère les infos pour la modification

if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){
    $req = $pdo->prepare("SELECT * FROM projects WHERE idproject = :idproject");
    $req->bindParam(':idproject', $_GET['id']);
    $req->execute();

    if($req->rowCount()> 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $project_update = $req->fetch(PDO::FETCH_ASSOC);
    }
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){
    //Vérification des champs
    if(!isset($_POST['pjtitle']) || strlen($_POST['pjtitle']) < 3 || strlen($_POST['pjtitle'])> 50 ){
        $errorProjet .= '<div class="alert alert-warning text-danger">** Saisissez le nom du projet</div>';
    }
    if(!isset($_POST['pjlink']) || !filter_var($_POST['pjlink'],FILTER_VALIDATE_URL)){
        $errorProjet .= '<div class="alert alert-warning text-danger">** Entrez une URL valide</div>';
    }
    //1.3 - Insertion en BDD si tout les champs sont correctes
    if(empty($msgProjet)){
        // a) assainissement des saisies de l'intertnaute
        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        //b) enregistrement en BDD
        $donnees = $pdo->prepare("REPLACE INTO projects VALUES (:idproject, :pjtitle, :pjlink)", array(
                ':idproject' => $_POST['idproject'],
                ':pjtitle' => $_POST['pjtitle'],
                ':pjlink' => $_POST['pjlink'],
            )
        );
        $donnees->bindparam(':idproject', $_POST['idproject']);
        $donnees->bindParam(':pjtitle',$_POST['pjtitle']);
        $donnees->bindParam(':pjlink', $_POST['pjlink']);
        $donnees->execute();

        $successProjet .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)
