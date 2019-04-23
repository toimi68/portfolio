<?php
require_once "inc/init.inc.php";
// echo '<pre>';
// echo var_dump($_POST);
// echo '</pre>';
//var d'affichage : 
$errorPre = "";
$errorNom = "";
$errorTem = "";
$msg = "";

extract($_POST);
if ($_POST) {

    if (empty($tprenom) || iconv_strlen($tprenom) < 3 || iconv_strlen($tprenom) > 50) {
        $errorPre .= '<small class="text-danger">* Le prénom doit contenir 3 à 50 caractères</small>';
    }
    if (empty($tnom) || iconv_strlen($tnom) < 3 || iconv_strlen($tnom) > 50) {
        $errorNom .= '<small class="text-danger">* Le nom doit contenir 3 à 50 caractères</small>';
    }
    if (empty($tmessage) || iconv_strlen($tmessage) < 3 || iconv_strlen($tmessage) > 200) {
        $errorTem .= '<small class="text-danger">* 200 caractères max </small>';
    }
    //INSERTION EN BDD
    if (empty($errorPre) && empty($errorNom) && empty($errorTem)) {

        //assainissement des saisies de l'internaute
        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }
        //Insertion BDD
        $req = $pdo->prepare("INSERT INTO temoignages (tprenom, tnom, tmessage,datepost) VALUES (:tprenom, :tnom, :tmessage, NOW())");

        $req->bindValue(':tprenom', $tprenom, PDO::PARAM_STR);
        $req->bindValue(':tnom', $tnom, PDO::PARAM_STR);
        $req->bindValue(':tmessage', $tmessage, PDO::PARAM_STR);

        $req->execute();
        $msg .= '<div class=" col-md-7 alert alert-success text-center offset-md-2">Votre message à bien été enregistré.</div>';
    }
} //fin if($_POST)

require_once "inc/header.inc.php";
?>


<form method="POST">

    <?= $msg; ?>
    <div class="row">
        <div class="col-md-5 col-sm-12 mb-2">
            <?= $errorPre; ?>
            <input type="text" class="form-control" name="tprenom" placeholder="Saisissez votre prénom">
        </div>
        <div class=" col-md-5 col-sm-12 mb-2">
            <?= $errorPre; ?>
            <input type="text" class="form-control" name="tnom" placeholder="Saisissez votre nom">
        </div>
    </div>
    <small class=" text-info font-italic"> ** mesage de 200 caractères max.</small> <?= $errorTem; ?>
    <div class="row">
        <div class="col-md-10">
            <textarea class="form-control" rows="3"></textarea>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <input type="submit" class="btn btn-dark mt-3 text-success btn-block" value="Envoyer">
    </div>
</form>











<?php
require_once "inc/footer.inc.php";
?>