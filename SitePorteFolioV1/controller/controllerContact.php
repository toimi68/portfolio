<?php
$errorContact = "";
$successContact="";
if(empty($_POST)){
    // je récupère le nom des indices de des champs avec la methode "extract()"
    extract($_POST);

    // j'effectue la validation des champs du formulaire
    if(!isset($_POST['prenom']) || strlen($_POST['prenom'])< 3 || strlen($_Post['prenom']) > 30){
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

        header('location:../index.php?choix=contact');

        $successContact .='<div class="alert alert-success">Votre message à bien été enregistré </div>';
    }

}
