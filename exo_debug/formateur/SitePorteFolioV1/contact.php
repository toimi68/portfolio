<?php
require_once 'inc/header.inc.php';
require_once 'Contact/Contact.class.php';
require_once 'inc/init.inc.php';


//variable d'affichage :
$errorContact = "";
$successContact="";

if($_POST){
    // je récupère le nom des indices de des champs avec la methode "extract()"
    extract($_POST);

    // j'effectue la validation des champs du formulaire
    if(!isset($_POST['prenom']) || strlen($_POST['prenom'])< 3 || strlen($_POST['prenom']) > 30){
        $errorContact .= '<div class="alert alert-warning text-danger"> Indiquez votre prénom (entre 3 et 30 caractères)</div>';
    }
    if(!isset($_POST['nom']) || strlen($_POST['nom']) < 3 || strlen($_POST['prenom']) > 30){
        $errorContact .= '<div class="alert alert-warning text-danger"> Indiquez votre nom (entre 3 et 30 caractères)</div>';

    }
    if(!isset($_POST['email']) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errorContact .= '<div class="alert alert-warning text-danger"> Saisissez une adresse mail valide</div>';
    }

    if(!isset($_POST['message']) || strlen($_POST['message']) < 3 || strlen($_POST['message']) > 250){
        $errorContact .= '<div class="alert alert-warning text-danger">Saisissez votre messages (250 caractères max)</div>';
    }

    if(empty($errorContact)){

        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }
        // je créé un nouvel objet de ma classe Contact
        $contact = new Contact();
        // j'utilise la methode contactAction() de ma class Contact.php
        $contact->contactAction($prenom, $nom, $email, $message);

        unset($nom);
        unset($prenom);
        unset($email);
        unset($message);
        unset($contact);


        $successContact .='<div class="alert alert-success">Votre message à bien été enregistré </div>';

    }

}

?>
<!-- Zone contact-->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mt-5">
                <form method="POST" class="offset-md-3" >
                    <?php
                    echo $errorContact;
                    echo $successContact;
                    ?>
                    <div class="form-row">
                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder="Prénom" name="prenom" value="<?php if (isset($prenom)){echo $prenom;}?>">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder="Nom" name="nom" value="<?php if (isset($nom)){echo $nom;}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-8 mt-3">
                            <input type="text" class="form-control" placeholder="Email@gmail.com" name="email" value="<?php if (isset($email)){echo $email;}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col mt-3">
                            <textarea name="message" id="" cols="45" rows="10" value="<?php if (isset($message)){echo $message;}?>">
                            </textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-light mt-4  offset-3" value="Envoyer">
                </form>
            </div>
        </div>
    </div>
</section>