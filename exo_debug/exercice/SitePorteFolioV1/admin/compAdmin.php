<?php
require_once '../inc/init.inc.php';
require_once '../inc/admin/adminHeader.inc.php';

/*>>>>> GESTION ADMIN COMPETENCE >>>>>*/
//Variable d'affichage :
$errorComp="";
$bo_comps="";
$msgSuccess="";
$bo_projet="";
/*
*SUPPRESSION DES COMPETENCES
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){$req= executeRequete("DELETE FROM competences WHERE idcompetence = :idcompetence", array(':idcompetence' => $_GET['id']));
if($req->rowCount()== 1){$errorComp .= '<div class="alert alert-success>La competence n°' . $_GET['id'] . ' a bien été supprimée </div>';}else{$errorComp .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';}}

/*
*AFFICHAGE DES COMPETENCES
*/

//if(isset($_GET['gestion']) && $_GET['gestion'] =='competence'){
$req = $pdo->query("SELECT * FROM competences ");
while($competence = $req->fetch(PDO::FETCHASSOC)){$bo_comps .= '<tr>';$bo_comps .= '<th scope="row"><i class="fa-2x '.$competence['cptechnology'].'"></i></th> ';if($competence['cplevel'] == 1){$bo_comps .= '<td class="text-warning">Débutant</td>';}elseif($competence['cplevel'] == 2){$bo_comps .= '<td class="text-info">Intermédiaire</td>';}elseif($competence['cplevel']== 3){$bo_comps .= '<td class="text-primary">Avancé</td>';}elseif($competence['cplevel']== 4){$bo_comps .= '<td class="text-success">Maitrise</td>';}$bo_comps .='<td><a href="../form/formComp.php?action=update&id='.$competence['idcompetence'].'"><i class="far fa-edit text-warning"></i></a></td>';$bo_comps .='<td><a href="?gestion=competence&action=supp&id='.$competence['idcompetence'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';$bo_comps .= '</tr>';}
//}

/*
*AJOUT & MODIFICATION DES COMPETENCES
*/

// 1 -  Je récupère les infos pour la modification

if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){$req = $pdo->prepare("SELECT * FROM competences WHERE idcompetence = :idcompetence");$req->bindParam(':idcompetence', $_GET['id']);$req->execute();

if($req->rowCount() > 0){//Je récupère des infos en BDD pour afficher dans le formulaire de modification 
$comp_update = $req->fetch(PDO::FETCH_ASSOC);}}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){//Vérification des champs
if(!isset($_POST['cptechnology']) || strlen($_POST['cptechnology']) < 3 || strlen($_POST['cptechnology'])> 255 ){
 $errorComp .= '<div class="alert alert-warning text-danger">** Saisissez une technologie</div>';}
if(!isset($_POST['cplevel']) || !is_numeric($_POST['cplevel'])){$errorComp .= '<div class="alert alert-warning text-danger">** Entrez votre niveau de competence</div>';}
//1.3 - Insertion en BDD si tout les champs sont correctes
if(empty($errorComp)){// a) assainissement des saisies de l'intertnaute
foreach($_POST as $indice => $valeur){$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);}
//b) enregistrement en BDD
$donnees = $pdo->prepare("REPLACE INTO competences VALUES (:idcompetence, :cptechnology, :cplevel)", array(':idcompetence' => $_POST['idcompetence'],':cptechnology' => $_POST['cptechnology'],':cplevel' => $_POST['cplevel'],));
$donnees->bindparam(':idcompetence', $_POST['idcompetence']);$donnees->bindParam(':cptechnology',$_POST['cptechnology']);$donnees->bindParam(':cplevel', $_POST['cplevel']);$donnees->execute();$msgSuccess .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';}// if(empty($msg)){} //FIN if(POST)
/*>>>>> GESTION ADMIN PROJET >>>>>*/
//Variable d'affichage :
$bo_projet ="";
$errorProjet="";
$successProjet="";
/*
*SUPPRESSION DES PROJETS
*/
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){$req= executeRequete("DELETE FROM projects WHERE idproject = :idproject", array(':idproject' => $_GET['id'] ));
if($req->rowCount()== 1){$errorProjet .= '<div class="alert alert-success>Le projet n°' . $_GET['id'] . ' a bien été supprimé </div>';}else{$errorProjet .='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';}}
/*
*AFFICHAGE DES PROJETS
*/

//if(isset($_GET['gestion']) && $_GET['gestion'] == 'competence'){
$req = $pdo->query("SELECT * FROM projects");while($project = $req->fetch(PDO::FETCH_ASSOC)){$bo_projet .= '<tr>';$bo_projet .= '<th scope="row">'.$project['pjtitle'].'</th> ';$bo_projet .= '<td class="text-success"><a href="'.$project['pjlink'].'">'.$project['pjlink'].'</a></td>';
$bo_projet .='<td><a href="../form/formProjet.php?action=update&id='.$project['idproject'].'"><i class="far fa-edit text-warning"></i></a></td>';$bo_projet .='<td><a href="?gestion=competence&action=supp&id='.$project['idproject'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';$bo_projet .= '</tr>'; }
//}

/*
*AJOUT & MODIFICATION DES PROJETS
*/

// 1 -  Je récupère les infos pour la modification

if(isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])){$req = $pdo->prepare("SELECT * FROM projects WHERE idproject = :idproject");$req->bindParam(':idproject', $_GET['id']);$req->execute();

if($req->rowCount()> 0){//Je récupère des infos en BDD pour afficher dans le formulaire de modification
$project_update = $req->fetch(PDO::FETCH_ASSOC);}}//FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

//1.2 Traitement du formulaire pour enregistrer en BDD :
if($_POST){//Vérification des champs
if(!isset($_POST['pjtitle']) || strlen($_POST['pjtitle']) < 3 || strlen($_POST['pjtitle'])> 50 ){$errorProjet .= '<div class="alert alert-warning text-danger">** Saisissez le nom du projet</div>';}if(!isset($_POST['pjlink']) || !filter_var($_POST['pjlink'],FILTER_VALIDATE_URL)){$errorProjet .= '<div class="alert alert-warning text-danger">** Entrez une URL valide</div>'; }}
//1.3 - Insertion en BDD si tout les champs sont correctes
if(empty($msgProjet)){// a) assainissement des saisies de l'intertnaute
foreach($_POST as $indice => $valeur){$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); }
//b) enregistrement en BDD
$donnees = $pdo->prepare("REPLACE INTO projects VALUES (:idproject, :pjtitle, :pjlink)", array(':idproject' => $_POST['idproject'],':pjtitle' => $_POST['pjtitle'],':pjlink' => $_POST['pjlink'],));$donnees->bindparam(':idproject', $_POST['idproject']);$donnees->bindParam(':pjtitle',$_POST['pjtitle']);$donnees->bindParam(':pjlink', $_POST['pjlink']);$donnees->execute();$successProjet .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';}// if(empty($msg)){} //FIN if(POST)

?>
    <!-- gestion competences -->
<h3>Gestion des competences :</h3>
<div class="row">
<div class="col-lg-12 mt-5">
<div class="container">
<table class="table table-striped table-dark ",border="1px solid red">
<thead>
<tr>
<th>Technologie</th>
<th>Niveau</th>
<th colspan="2">Action</th>
</tr>
</thead>
<tbody>
<?php
echo $bo_comps;
?>
</tbody>
</table>
<a href="../form/formComp.php" class="offset-11"><i class="fas fa-plus text-dark btn btn-outline-success"></i></a>
</div>
<div>
<?php echo $errorComp;?>
</div>
</div>
</div>

    <!-- gestion des projet -->
<h3>Gestion des projets :</h3>
<div class="row">
<div class="col-lg-12 mt-5">
<div class="container">
table class="table table-striped table-dark " border="1px solid red">
<thead>
<tr>
<th>Titre</th>
<th>URL</th>
<th colspan="2">Action</th>
</tr>
</thead>
<tbody>
<?php echo $bo_projet ; ?>
</tbody>
</table>
<a href="../form/formProjet.php?" class="offset-11"><i class="fas fa-plus text-dark btn btn-outline-success"></i></a>
</div>
</div>
</div>