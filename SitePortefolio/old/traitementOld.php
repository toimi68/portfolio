<?php

//require_once '../inc/function.php';

/*************************************************************************************************
CONNEXION & Deconnexion
 *************************************************************************************************/
/*>>>>> CONEXION >>>>>*/
//Variable d'affichage :
$msg = "";
$msgAdmin = "";
//$isAdmin="";
//Connexion à la BDD et récupération des infos admin :
$req = $pdo->query("SELECT * FROM  user");
$admin = $req->fetch(PDO::FETCH_ASSOC);

//Contrôle des champs pour la connexion :
if($_POST){
    if(!isset($_POST['uemail']) || !filter_var($_POST['uemail'],FILTER_VALIDATE_EMAIL ) || $_POST['uemail'] != $admin['uemail'] && !isset
        ($_POST['upassword']) || $_POST['upassword'] != $admin['upassword'] && $admin['ustatut'] != 1){

        //$isAdmin .='<div class="alert alert-warning">Vous n\'avez pas rentrez les bonnes infos</div>';
        header('location:../index.php');

    }
    header('location:gestionIndex.php');

}
/*>>>>> DECONEXION >>>>>*/
if(isset($_GET['action']) && $_GET['action'] === 'deconnexion'){
    unset($_SESSION['admin']);
    header('location:../index.php');
}
/*>>>>> MODIF DE L'ADMIN >>>>>*/

// 1 -  Je récupère les infos pour la modification
if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){
    $req = $pdo->prepare("SELECT * FROM user WHERE iduser = :iduser");
    $req->bindParam(':iduser', $_GET['id']);
    $req->execute();

    if($req->rowCount()> 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $admin_update = $req->fetch(PDO::FETCH_ASSOC);
    }
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'
//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST) {
    //Vérification des champs
    if (!isset($_POST['uemail']) || !filter_var($_POST['uemail'], FILTER_VALIDATE_EMAIL) || !isset($_POST['upassword']) || !is_numeric($_POST['upassword'])) {
        $msgAdmin .= '<div class="alert alert-warning text-danger">** L\'un des identifiant n\'est pas valide</div>';
    }

    //1.3 - Insertion en BDD si tout les champs sont correctes
    if (empty($msgComp)) {
        // a) assainissement des saisies de l'intertnaute
        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        //b) enregistrement en BDD
        $donnees = $pdo->prepare("REPLACE INTO user VALUES (:iduser, :uemail, :upassword)", array(
                ':iduser' => $_POST['iduser'],
                ':uemail' => $_POST['uemail'],
                ':upassword' => $_POST['upassword'],
            )
        );
        $donnees->bindparam(':iduser', $_POST['iduser']);
        $donnees->bindParam(':uemail', $_POST['uemail']);
        $donnees->bindParam(':upassword', $_POST['upassword']);
        $donnees->execute();

        $msg .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

}


/*************************************************************************************************
                                FRONT
 *************************************************************************************************/
//Variable pour message d'avertissement :
//$msg = "";
//Variable d'affichage :
$competence = "";
/*----- Affichage des competences -----*/
if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $req= $pdo->query("SELECT * FROM competences");


    while($comps = $req->fetch(PDO::FETCH_ASSOC)){
        //debugV($comps);

        $competence .= '<div class="col-md-3 mt-5">';
            $competence .= '<div class="card mt-5 shadow-sm">';
                $competence .= '<i class="'.$comps['cptechnology'].'"></i>';
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
/*----- Affichage des projets -----*/
//Variable d'affichage :
$projet ="";
if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $req = $pdo->query("SELECT * FROM projects");

    if($req->rowCount() == 0){
        $msg .= '<h2> Projets à venir ...</h2>';
    }
    while($projets = $req->fetch(PDO::FETCH_ASSOC)){
        //debugV($project);
        $projet .='<div class="col-lg-4">';
        $projet .='<img class="rounded-circle" src="" alt="Generic placeholder image" width= "140" height= "140">';
        $projet .='<h2>'.$projets['pjtitle'].'</h2>';
        $projet .='<p><a class="btn btn-success " href="'.$projets['pjlink'].'" role="button"> Visiter</a></p>';
        $projet .='</div>';
    }
}
/*----- Affichage expériences -----*/
//Variable d'affichage :
$xp ="";
if(isset($_GET['choix']) && $_GET['choix'] =='xp'){
    $req = $pdo->query("SELECT * FROM xp ORDER BY xpyear2 DESC");
    while($xps = $req->fetch(PDO::FETCH_ASSOC)){
        $xp .= '<tr>';
        $xp .= '<th scope="row">'.$xps['xpyear1'] .'-'.$xps['xpyear2'] .' </th> ';
        $xp .= '<td>'.$xps['xpfunction'] .'</td>';
        $xp .= '<td>'.$xps['xpemployer'].'</td>';
        $xp .= '<td>'.$xps['xpresume'] .'</td>';
        $xp .= '</tr>';
    }
}
/*----- Affichage Formations et langues -----*/
//Variable d'affichage formation:
$diplome = "";
if(isset($_GET['choix']) && $_GET['choix'] == 'formation'){
    $req = $pdo->query("SELECT * FROM schooling ORDER BY sgdate DESC");
    while($school = $req->fetch(PDO::FETCH_ASSOC)){
        $diplome .= '<tr>';
        $diplome .= '<th scope="row">'.$school['sgdate'] .'</th>';
        $diplome .= '<td>'.$school['sgtitle'] .'</td>';
        $diplome .= '<td>'.$school['sgsubtitle'] .'</td>';
        $diplome .= '<td>'.$school['sgdescription'] .'</td>';
        $diplome .= '</tr>';
    }
}
//Variable d'affichage langue:
$langue = "";
if(isset($_GET['choix']) && $_GET['choix'] == 'formation'){
    $req = $pdo->query("SELECT * FROM languages");
    while($lang = $req->fetch(PDO::FETCH_ASSOC)){
        $langue .= '<tr>';
        $langue .= '<th scope="row"> '.$lang['lglanguage'].' </th>';
        $langue .= '<td>';
        if($lang['lglevel'] == 1){
            $langue .= '<p class="text-warning">Débutant</p>';
        }elseif($lang['lglevel'] == 2){
            $langue .= '<p class="text-info">Intermédiaire</p>';
        }elseif($lang['lglevel']== 3){
            $langue .= '<p class="text-primary">Avancé</p>';
        }elseif($lang['lglevel']== 4){
            $langue .= '<p class="text-success">Maitrise</p>';
        }
        $langue .= '</td>';
    }
}

/*************************************************************************************************
                                   ENREGISTREMENT CONTACT BDD
 *************************************************************************************************/
if (!empty($_POST)) {
    extract($_POST);
    $success = (empty($prenom) || empty($nom) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) ? false : true;
    $failedPrenom = (empty($prenom)) ? 'Saisisez votre prénom.' : null;
    $failedNom = (empty($nom)) ? 'Saisisez votre nom.' : null;
    $failedPEmail = (empty($email)) ? 'Saisisez un mail valide.' : null;
    $failedMessage = (empty($message)) ? 'Saisissez votre message.' : null;
    if ($success) {
        $contact = new Contact();
        $contact->contactAction($prenom, $nom, $email, $message);
    }
}

/*************************************************************************************************
                                                BACK-OFFICE
 *************************************************************************************************/

/*>>>>> GESTION COMPETENCE & PROJET >>>>>*/
/*
*AFFICHAGE DES COMPETENCES
*/
// Variable d'affichage :
$bo_comps ="";
$msgComp ="";
if(isset($_GET['gestion']) && $_GET['gestion'] == 'competence'){
    $req = $pdo->query("SELECT * FROM competences");
    while($competence = $req->fetch(PDO::FETCH_ASSOC)){
        $bo_comps .='<tr>';
        $bo_comps .= '<th scop="row"><i class="'.$competence['cptechnology'].'"></i></th>';
        if($competence['cplevel'] == 1){
            $bo_comps .='<td class=" text-danger">Débutant</td>';
        }elseif ($competence['cplevel'] == 2){
            $bo_comps .='<td class=" text-warning">Intermédiaire</td>';
        }elseif ($competence['cplevel'] == 3){
            $bo_comps .='<td class=" text-primary">Avancé</td>';
        }elseif ($competence['cplevel'] == 4){
            $bo_comps .='<td class=" text-success">Maîtrisé</td>';
        }
        $bo_comps .='<td><a href="../form/formComp.php?action=update&id='.$competence['idcompetence'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_comps .='<td><a href="?gestion=competence&action=supp&id='.$competence['idcompetence'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_comps .= '</tr>';
    }
}

/*
*SUPPRESSION DES COMPETENCES
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $req= executeRequete("DELETE FROM competences WHERE idcompetence = :idcompetence", array(
        ':idcompetence' => $_GET['id']
    ));

    if($req->rowCount()== 1){

        $msgComp .= '<div class="alert alert-success>La competence n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{

        $msgComp .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
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

    //if($req->rowCount() > 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $comp_update = $req->fetch(PDO::FETCH_ASSOC);
    //}
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){
    //Vérification des champs
    if(!isset($_POST['cptechnology']) || strlen($_POST['cptechnology']) < 3 || strlen($_POST['cptechnology'])> 255 ){
        $msgComp .= '<div class="alert alert-warning text-danger">** Saisissez une technologie</div>';
    }
    if(!isset($_POST['cplevel']) || !is_numeric($_POST['cplevel'])){
        $msgComp .= '<div class="alert alert-warning text-danger">** Entrez votre niveau de competence</div>';
    }
    //1.3 - Insertion en BDD si tout les champs sont correctes
    if(empty($msgComp)){
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

        $msg .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)
/*
*AFFICHAGE DES PROJETS
*/
//Variable d'affichage :
$bo_projet ="";
$msgProjet="";
if(isset($_GET['gestion']) && $_GET['gestion'] == 'competence'){
    $req = $pdo->query("SELECT * FROM projects");
    while($projet = $req->fetch(PDO::FETCH_ASSOC)){
        $bo_projet .= '<tr>';
        $bo_projet .= '<th scope="row">'.$projet['pjtitle'].'</th> ';
        $bo_projet .= '<td class="text-success"><a href="'.$projet['pjlink'].'">'.$projet['pjlink'].'</a></td>';

        $bo_projet .='<td><a href="../form/formProjet.php?action=update&id='.$projet['idproject'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_projet .='<td><a href="?gestion=competence&action=supp&id='.$projet['idproject'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_projet .= '</tr>';

    }
}
/*
*SUPPRESSION DES PROJETS
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $req= executeRequete("DELETE FROM projects WHERE idproject = :idproject", array(
        ':idproject' => $_GET['id']
    ));

    if($req->rowCount()== 1){

        $msgProjet .= '<div class="alert alert-success>Le projet n°' . $_GET['id'] . ' a bien été supprimé </div>';
    }else{

        $msgProjet .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
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
        $msgProjet .= '<div class="alert alert-warning text-danger">** Saisissez le nom du projet</div>';
    }
    if(!isset($_POST['pjlink']) || !filter_var($_POST['pjlink'],FILTER_VALIDATE_URL)){
        $msgProjet .= '<div class="alert alert-warning text-danger">** Entrez une URL valide</div>';
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

        $msg .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)

//------------------------------------------------------------------------------------------------------------------------------------------------------
/*>>>>> GESTION EXPERIENCE >>>>>*/
/*
*AFFICHAGE DES EXPERIENCES
*/
// Variable d'affichage :
$bo_xp ="";
$msgXp ="";
$xp_update="";
//$xp_update="";
if(isset($_GET['gestion']) && $_GET['gestion'] =='experience'){
    $req = $pdo->query("SELECT * FROM xp ORDER BY xpyear2 DESC");
    while($xps = $req->fetch(PDO::FETCH_ASSOC)){
        //var_dump(xp_update['idxp']);
        //$bo_xp .= '<tr>';
        if($xps['xpyear1'] == $xps['xpyear2']){
            $bo_xp .= '<th>Depuis </th>';
        } else{
            $bo_xp .= '<th>'.$xps['xpyear1'].'</th>';
        }
        $bo_xp .= '<th>'.$xps['xpyear2'].'</th>';
        $bo_xp .= '<td>'.$xps['xpfunction'].'</td>';
        $bo_xp .= '<td>'.$xps['xpemployer'].'</td>';
        $bo_xp .= '<td>'.$xps['xpresume'].'</td>';

        $bo_xp .='<td><a href="../form/formXp.php?action=update&id='.$xps['idxp'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_xp .='<td><a href="?gestion=competence&action=supp&id='.$xps['idxp'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_xp .= '</tr>';
    }
}

/*
*SUPPRESSION DES EXPERIENCES
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $req= executeRequete("DELETE FROM xp WHERE idxp = :idxp", array(
        ':idxp' => $_GET['id']
    ));

    if($req->rowCount()== 1){

        $msgXp .= '<div class="alert alert-success>L\'expérience n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{

        $msgXp .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }
}
/*
*AJOUT & MODIFICATION DES EXPERIENCES
*/

// 1 -  Je récupère les infos pour la modification

if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){
    $req = $pdo->prepare("SELECT * FROM xp WHERE idxp = :idxp");
    $req->bindParam(':idxp', $_GET['id']);
    $req->execute();

//    if($req->rowCount()> 0){
    //Je récupère des infos en BDD pour afficher dans le formulaire de modification
    $xp_update = $req->fetch(PDO::FETCH_ASSOC);
//    }
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

$select_date = '';
$year = date('Y');
$century = $year - 100;

$select_date2 = '';
$year2 = date('Y');
$century2 = $year - 100;

while($year >= $century){
    if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id']) && $_GET['id'] == $xp_update['idxp'] && $xp_update['xpyear1'] ==
        $year && isset($_GET['id']) && $_GET['id'] == $xp_update['idxp'] && $xp_update['xpyear2'] == $year2){
        $select_date .= '<option selected>' . $year . '</option>';
        $select_date2 .= '<option selected>' . $year2 . '</option>';
    }
    elseif ($_POST && isset($_POST['xpyear1']) && $_POST['xpyear1'] == $year && isset($_POST['xpyear2']) && $_POST['xpyear2'] = $year2 ) {
        $select_date .= '<option selected>' . $year . '</option>';
        $select_date2 .= '<option selected>' . $year2 . '</option>';
    } else {
        $select_date .= '<option>' . $year . '</option>';
        $select_date2 .= '<option selected>' . $year2 . '</option>';
    }
    $year--;
    $year2--;
}


//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){
    //Vérification des champs
    if(!isset($_POST['xpyear1']) || !is_numeric($_POST['xpyear1']) || $_POST['xpyear1'] > date('Y') || $_POST['xpyear1'] < $century){
        $msgXp .= '<div class="alert alert-warning text-danger">** Sélectionnez une première date</div>';
    }
    if(!isset($_POST['xpyear2']) || !is_numeric($_POST['xpyear2']) || $_POST['xpyear2'] > date('Y') || $_POST['xpyear2'] < $century){
        $msgXp .= '<div class="alert alert-warning text-danger">** Sélectionnez une seconde date</div>';
    }
    if(!isset($_POST['xpfunction']) || strlen($_POST['xpfunction']) < 3 || strlen($_POST['xpfunction']) > 100){
        $msgXp .= '<div class="alert alert-warning text-danger">** Indiquez le poste occupé </div>';
    }
    if(!isset($_POST['xpemployer']) || strlen($_POST['xpemployer']) < 3 || strlen($_POST['xpemployer']) > 100){
        $msgXp .= '<div class="alert alert-warning text-danger">** Indiquez le nom de l\'employeur </div>';
    }
    if(!isset($_POST['xpresume']) || strlen($_POST['xpresume']) < 3 || strlen($_POST['xpresume']) > 100){
        $msgXp .= '<div class="alert alert-warning text-danger">** Faite un descriptif de vos fonctions </div>';
    }
    //1.3 - Insertion en BDD si tout les champs sont correctes
    if(empty($msgXp)){
        // a) assainissement des saisies de l'intertnaute
        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        //b) enregistrement en BDD
        $donnees = $pdo->prepare("REPLACE INTO xp VALUES (:idxp, :xpyear1, :xpyear2, :xpfunction, :xpemployer, :xpresume)", array(
                ':idxp' => $_POST['idxp'],
                ':xpyear1' => $_POST['xpyear1'],
                ':xpyear2' => $_POST['xpyear2'],
                ':xpfunction' => $_POST['xpfunction'],
                ':xpemployer' => $_POST['xpemployer'],
                ':xpresume' => $_POST['xpresume']
            )
        );
        //$donnees->bindparam(':idxp', $_POST['idxp']);
        //$donnees->bindParam(':xpyear1', $_POST['xpyear1']);
        //$donnees->bindParam(':xpyear2', $_POST['xpyear2']);
        //$donnees->bindParam(':xpfunction',$_POST['xpfunction']);
        //$donnees->bindParam(':xpemployer', $_POST['xpemployer']);
        //$donnees->bindParam(':xpresume', $_POST['xpresume']);
        $donnees->execute();

        $msg .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)

//---------------------------------------------------------------------------------------------------------------------------------------------------------
/*>>>>> GESTION FORMATION >>>>>*/
/*
*AFFICHAGE DES FORMATIONS
*/
// Variable d'affichage :
$bo_diplome ="";
$msgFormation ="";
$school_update ="";


if(isset($_GET['gestion'])&& $_GET['gestion'] == 'formation'){

    $formation = $pdo->query("SELECT * FROM schooling ORDER BY sgdate DESC");

    while($schooling = $formation->fetch(PDO::FETCH_ASSOC)){
        $bo_diplome .= '<tr>';
        $bo_diplome .= '<td>'.$schooling['.sgdate.'].'</td>';
        $bo_diplome .= '<td>'.$schooling['sgtitle'] .'</td>';
        $bo_diplome .= '<td>'.$schooling['sgsubtitle'].'</td>';
        $bo_diplome .= '<td>'.$schooling['sgdescription'].'</td>';
        $bo_diplome .= '<td><a href="../form/formFormation.php?action=update?id='.$schooling['idschooling'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_diplome .= '<td><a href="?gestion=formation&action=supp?id='.$schooling['idschooling'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_diplome .= '</tr>';

    }

}

/*
 *SUPPRESSION DES FORMATIONS
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $supForm = executeRequete("DELETE FROM schooling WHERE idschooling = :idschooling", array(
        ':idschooling'=>$_GET['id']
    ));

    $msgFormation .= '<div class="alert alert-success>La formation n°' . $_GET['id'] . ' a bien été supprimée </div>';
}else{
    $msgFormation .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
}

/*
AJOUT & MODIFICATION DES EXPERIENCES
*/

/*
if(isset($_GET['gestion']) && $_GET['gestion'] =='formation'){
    $req = $pdo->query("SELECT * FROM schooling ORDER BY sgdate DESC");
    while($schooling = $req->fetch(PDO::FETCH_ASSOC)){
        $bo_diplome .= '<tr>';
        $bo_diplome .= '<td>'.$schooling['sgdate'].'</td>';
        $bo_diplome .= '<th>'.$schooling['sgtitle'].'</th>';
        $bo_diplome .= '<th>'.$schooling['sgsubtitle'].'</th>';
        $bo_diplome .= '<td>'.$schooling['sgdescription'].'</td>';
        $bo_diplome .='<td><a href="../form/formFormation.php?action=update&id='.$schooling['idschooling'].'"><i class="far fa-edit
        text-warning"></i></a></td>';
        $bo_diplome .='<td><a href="?gestion=formation&action=supp&id='.$schooling['idschooling'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_diplome .= '</tr>';
    }
}*/
/*
*SUPPRESSION DES FORMATIONS

if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $req= executeRequete("DELETE FROM schooling WHERE idschooling = :idschooling", array(
        ':idschooling' => $_GET['id']
    ));

    if($req->rowCount()== 1){

        $msgFormation .= '<div class="alert alert-success>La formation n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{

        $msgFormation .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }
}*/
/*
*AJOUT & MODIFICATION DES FORMATIONS



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

       $msgFormation .= '<div class="alert alert-warning text-danger">** Sélectionnez une date</div>';

   }
   if(!isset($_POST['sgtitle']) || strlen($_POST['sgtitle']) < 3 || strlen($_POST['sgtitle']) > 100){
       $msgFormation .= '<div class="alert alert-warning text-danger">** Indiquez le diplome obtenu </div>';
   }
    if(!isset($_POST['sgtitle']) || strlen($_POST['sgtitle']) < 3 || strlen($_POST['sgsubtitle']) > 150){
        $msgFormation .= '<div class="alert alert-warning text-danger">** Indiquez la spécialité </div>';
    }
    if(!isset($_POST['sgsubtitle']) || strlen($_POST['sgsubtitle']) < 3 || strlen($_POST['sgdescription']) > 200){
        $msgFormation .= '<div class="alert alert-warning text-danger">** Faite un descriptif </div>';
    }
    //1.3 - Insertion en BDD si tout les champs sont correctes
    if(empty($msgFormation)){
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

        $msg .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)
*/
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
/*>>>>> GESTION DES LANGUES >>>>>*/
/*
*AFFICHAGE DES LANGUES

// Variable d'affichage :
$bo_langue ="";
$msgLangue ="";
if(isset($_GET['gestion']) && $_GET['gestion'] =='formation'){
    //$req = $pdo->query("SELECT * FROM languages");
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
        $bo_langue .='<td><a href="../form/formLang.php?action=update&id='.$lang['idlanguage'].'"><i class="far fa-edit text-warning"></i></a></td>';
        $bo_langue .='<td><a href="?gestion=formation&action=supp&id='.$lang['idlanguage'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
        $bo_langue .= '</tr>';
    }
}*/
/*
*SUPPRESSION DES LANGUES

if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){
    $reqlg= executeRequete("DELETE FROM languages WHERE idlanguage = :idlanguage", array(
        ':idlanguage' => $_GET['id']
    ));

    if($reqlg->rowCount()== 1){

        $msgLangue .= '<div class="alert alert-success>La langue n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{

        $msgLangue .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }
}*/
/*
*AJOUT & MODIFICATION DES LANGUES


// 1 -  Je récupère les infos pour la modification
if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){
    $lg = $pdo->prepare("SELECT * FROM languages WHERE idlanguage = :idlanguage");
    $lg->bindParam(':idlanguage', $_GET['id']);
    $lg->execute();

    if($lg->rowCount()> 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $langue_update = $req->fetch(PDO::FETCH_ASSOC);
    }
}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'
//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){
    //Vérification des champs
    if(!isset($_POST['lglanguage']) || strlen($_POST['lglanguage']) < 3 || strlen($_POST['lglanguage']) > 40){
        $msgLangue .= '<div class="alert alert-warning text-danger">** Indiquez une langue </div>';
    }
    if(!isset($_POST['lglevel']) || !is_numeric($_POST['lglevel'])){
        $msgLangue .= '<div class="alert alert-warning text-danger">** Sélectionnez votre niveau</div>';
    }

    //1.3 - Insertion en BDD si tout les champs sont correctes
    if(empty($msgLangue)){
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

        $msg .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)*/