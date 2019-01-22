<?php

$prez = '';
$contenu = '';
$realisation = '';
$xp = '';
$formation = '';
$formulaire = '';
$competence = '';

//Traitement de l'affichage de la page d'accueil :
if (empty($_GET['select']) || isset($_GET['select']) == 'accueil') {
    // avatar :
    $prez = '<h1 style="color:#fff; font-size:20px"> j\'affiche ma presentation</h1>';

} else if (isset($_GET['select']) && $_GET['select'] == 'competence') {
    $competence = '<h1 style="color:#fff; font-size:20px"> j\'affiche mes competences</h1>';

} else if (isset($_GET['select']) && $_GET['select'] == 'realisation') {

    $realisation = '<h1 style="color:#fff; font-size:20px"> j\'affiche mes réalisation</h1>';

} else if (isset($_GET['select']) && $_GET['select'] == 'xp') {

    $xp = '<h1 style="color:#fff; font-size:20px"> j\'affiche mes réalisations</h1>';

} else if (isset($_GET['select']) && $_GET['select'] == 'formation') {

    $formation = '<h1 style="color:#fff; font-size:20px"> j\'affiche mes formations</h1>';

} else if (isset($_GET['select']) && $_GET['select'] == 'contact') {

    $formulaire = '<h1 style="color:#fff; font-size:20px"> j\'affiche mon formulaire</h1>';

}
