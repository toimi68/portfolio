<?php
require_once "inc/init.inc.php";
require_once "inc/header.inc.php";

// Vérification du formulaire : 

//variable de réception:
$errorPrenom = "";
$errorNom = "";
$errorEmail = "";
$errorMsg = "";
$successMsg = "";

// echo '<pre>';
// echo var_dump($_POST);
// echo '</pre>';

extract($_POST);

if ($_POST) {
    if (empty($_POST['prenom']) || iconv_strlen($prenom) < 3 || iconv_strlen($_POST['prenom']) > 50) {
        $errorPrenom .= '<small class="text-danger"> ** Saisissez votre prénom ( 3 à 50 caractères)</small>';
    }
    if (empty($_POST['nom']) || iconv_strlen($nom) < 3 || iconv_strlen($_POST['nom']) > 50) {
        $errorNom .= '<small class="text-danger"> ** Saisissez votre nom ( 3 à 50 caractères)</small>';
    }
    if (empty($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail .= '<small class="text-danger"> ** Saisissez un mail valide</small>';
    }
    if (empty($message)) {
        $errorMsg .= '<small class="text-danger"> ** N\'oubliez pas de me laisser un message ( 3 à 50 caractères)</small>';
    }

    if (empty($errorPrenom) && empty($errorNom) && empty($errorEmail) && empty($errorMsg)) {

        $req = $pdo->prepare("INSERT INTO contacts (prenom, nom, email, message) VALUES (:prenom,:nom,:email,:message)");

        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':message', $message, PDO::PARAM_STR);

        $req->execute();

        $successMsg .= '<div class="alert alert-primary text-center">Votre message à bien été envoyé</div>';
    }
}

?>

<div class="row">
    <div class="col-md-12 mb-4">
        <span class="mb-5">Si vous souhaitez m’écrire : </span><br>
        <span class="offset-md-2"><strong>anserougier@yahoo.fr</strong></span><br>
        <span class="offset-md-2"> <strong>Anne-Cécile ROUGIER – Hypno-thérapeute
            </strong>.
            <ul class="offset-md-2">
                <li>- Adultes</li>
                <li>- Adolescents</li>
                <li>- Couples</li>
                <li>- femmes enceintes</li>
            </ul>
        </span>
        <span class="offset-md-2"><strong>Prendre RDV au 06 63 75 09 81</strong>.</span>
    </div>
</div>

<div class="row">
    <form method="post" class="offset-md-3">
        <?= $successMsg; ?>
        <div class="row">
            <div class="col-md-5 col-sm-12 mb-2">
                <small><?php echo $errorPrenom; ?></small>
                <input type="text" class="form-control" placeholder="saisissez votre prénom" name="prenom">
            </div>
            <div class="col-md-5 col-sm-12 mb-2">
                <small><?php echo $errorNom; ?></small>
                <input type="text" name="nom" class="form-control" placeholder="saisissez votre nom">
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-sm-12 mb-2">
                <small><?php echo $errorEmail; ?></small>
                <input type="text" name="email" class="form-control" placeholder="votre@email.fr">
            </div>
        </div>
        <small><?php echo $errorMsg; ?></small>
        <div class="row">
            <div class="col-md-10 mb-2">
                <textarea class="form-control" name="message" cols="51" rows="9"></textarea>
            </div>
        </div> <button type="submit" class="btn btn btn-dark text-success mb-2 ">Envoyer</button>
    </form>

</div>






















<?php
require_once "inc/footer.inc.php";
?>