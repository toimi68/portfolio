<?php
require '../inc/form/formHeader.inc.php';
require '../inc/init.inc.php';
//require '../controller/controllerFormation.php';
/*
*AJOUT & MODIFICATION DES EXPERIENCES
*/
//Variable d'affichage formation:
$bo_diplome ="";
$errorFormation ="";
$successFormation="";

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
        $donnees = $pdo->prepare("REPLACE INTO schooling VALUES (:idschooling, :sgtitle, :sgsubtitle, :sgdate, :sgdescription)", array(
                ':idschooling' => $_POST['idschooling'],
                ':sgdate' => $_POST['sgdate'],
                ':sgtitle' => $_POST['sgtitle'],
                ':sgsubtitle' => $_POST['sgsubtitle'],
                ':sgdescription' => $_POST['sgdescription']
            )
        );
        $donnees->bindparam(':idschooling', $_POST['idschooling']);
        $donnees->bindParam(':sgtitle',$_POST['sgtitle']);
        $donnees->bindParam(':sgsubtitle', $_POST['sgsubtitle']);
        $donnees->bindParam(':sgdate', $_POST['sgdate']);
        $donnees->bindParam(':sgdescription', $_POST['sgdescription']);
        $donnees->execute();

        $successFormation .= '<div class="alert alert-success">L\'enregistrement a bien été réalisé en BDD.</div>';
    }// if(empty($msg)){

} //FIN if(POST)

?>

<div class="container m-5">

    <div class="row">
        <?php
            if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){
                echo '<h3>Modifier une formation :</h3> ';
            } else {
                echo '<h3>Ajouter une formation : </h3>';
            }
            ?>
        <div class="col-lg-4 offset-2 mt-5">
            <form method="POST">
                <?php
                echo $errorFormation;
                echo $successFormation;
                ?>
                <input type="hidden" name="idschooling" value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){echo
                $school_update['idschooling'];}
                else { echo "0";}?>"> <!-- champ caché utile pour la modification d'un élément existant car on a besoin
	            de le
	            connaître pour la requête SQL REPLACE INTO qui se comporte comme un UPDATE en présence d'un ID existant. La value à 0 permet de spécifier que l'ID n'existe pas, donc que REPLACE INTO doit se comporter comme un INSERT pour créer la ligne en BDD -->
                <div class="form-group col-5">
                    <select name="sgdate" class="class-form-control custom-select">
                        <option value="<?php echo $school_update['sgdate'] ??
                            $_POST['sgdate'] ?? 'Année' ?>"><?php echo $school_update['sgdate'] ??
                                $_POST['sgdate'] ?? 'Année' ?></option>
                        <?php
                        echo $select_date;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="sgtitle" placeholder="Diplome" value="<?php echo $school_update['sgtitle'] ??
                        $_POST['sgtitle'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="sgsubtitle" placeholder="spécialité" value="<?php echo
                        $school_update['sgsubtitle'] ?? $_POST['sgsubtitle'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <textarea name="sgdescription" id="" rows="5" placeholder="Description" class="form-control"><?php echo
                            $school_update['sgdescription'] ?? $_POST['sgdescription'] ?? '' ?></textarea>
                </div>
                <input type="submit" class="btn btn-outline-dark mt-4 text-success btn-block" value="Enregistrer">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 offset-3">
            <a href="../admin/formationAdmin.php"><i class="fas fa-chevron-circle-left fa-3x  text-dark"></i></a>
        </div>
    </div>

</div>