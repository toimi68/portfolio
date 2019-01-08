<?php

class Contact
{

    private $prenom;
    private $nom;
    private $email;
    private $message;

    public function contactAction($prenom, $nom, $email, $message)
    {

        $this->prenom = strip_tags($prenom);
        $this->nom = strip_tags($nom);
        $this->email = strip_tags($email);
        $this->message = strip_tags($message);

        require 'inc/init.inc.php';

        $req = $pdo->prepare('INSERT INTO contacts (prenom, nom, email, message) VALUES (:prenom, :nom, :email, :message)');

        $req->execute([
            ':prenom' => $this->prenom,
            ':nom' => $this->nom,
            ':email' => $this->email,
            ':message' => $this->message]);

        $req->closeCursor();

    }
}