<?php
require_once "inc/init.inc.php";


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
    if (empty($_POST['prenom']) || iconv_strlen($_POST['prenom']) < 3 || iconv_strlen($_POST['prenom']) > 50) {
        $errorPrenom .= '<small class="text-danger"> ** Saisissez votre prénom ( 3 à 50 caractères)</small>';
    }
    if (empty($_POST['nom']) || iconv_strlen($_POST['nom']) < 3 || iconv_strlen($_POST['nom']) > 50) {
        $errorNom .= '<small class="text-danger"> ** Saisissez votre nom ( 3 à 50 caractères)</small>';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errorEmail .= '<small class="text-danger"> ** Saisissez un mail valide</small>';
    }
    if (empty($_POST['message'])) {
        $errorMsg .= '<small class="text-danger"> ** N\'oubliez pas de me laisser un message ( 3 à 50 caractères)</small>';
    }

    if (empty($errorPrenom) && empty($errorNom) && empty($errorEmail) && empty($errorMsg)) {

        //assainissement des saisie internaute
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES);
        } //FIN  foreach ($_POST as $key => $value)


        $req = $pdo->prepare("INSERT INTO contacts (prenom, nom, email, message) VALUES (:prenom,:nom,:email,:message)");

        $req->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $req->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $req->bindValue(':message', $_POST['message'], PDO::PARAM_STR);

        $req->execute();

        $successMsg .= '<div class="alert alert-primary text-center">Votre message à bien été envoyer</div>';
    }// FIN  if (empty($errorPrenom) && empty($errorNom) && empty($errorEmail) && empty($errorMsg)

}//FIN if ($_POST)
require_once "inc/header.inc.php";
?>

<div class="row">
    <div class="col-md-12 mb-4">
        <p>Si vous souhaitez m’écrire :</p>
        <p class="text-center">anserougier@yahoo.fr</p>
        <p class="text-center">Anne-Cécile ROUGIER – Hypno-thérapeute</p>
        <p class="text-center">
            <em>Adulte - Adolescent - Couple - Femme enceinte</em>
        </p>
        <p class="text-center">Prendre RDV au 06 63 75 09 81</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 order-md-6">
        <form>
            <div class="form-group">
                <?php echo $errorPrenom; ?>
                <input type="text" class="form-control" placeholder="Prénom" name="prenom">
            </div>
            <div class="form-group">
                <?php echo $errorNom; ?>
                <input type="text" class="form-control" placeholder="nom" name="nom">
            </div>
            <div class="form-group">
                <?php echo $errorEmail; ?>
                <input type="text" class="form-control" placeholder="votre@email.fr" name="email">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="message"></textarea>
            </div>
            <?php echo $errorMsg; ?>
            <button type="submit" class="btn btn-dark text-success mb-2">Envoyer</button>
        </form>

    </div>
    <div class="col-md-6 order-md-1">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.7704676860394!2d2.3711157156745233!3d48.86258717928785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66dfb861f8079%3A0x3d12cedc238537f8!2s23+Rue+de+la+Folie+M%C3%A9ricourt%2C+75011+Paris!5e0!3m2!1sfr!2sfr!4v1556201686845!5m2!1sfr!2sfr"
            width="300" height="250" frameborder="0" style="border:0" class="embed-responsive-item"
            allowfullscreen></iframe>
    </div>

</div>

</div>






















<?php
require_once "inc/footer.inc.php";
?>