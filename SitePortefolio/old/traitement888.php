<?php


/************************************ Affichage des languages ************************************/
$languages = '';
if (isset($_GET['choix']) && $_GET['choix'] == 'competence') {
    $resultats = executeRequete("SELECT * FROM competences");

    while ($techno = $resultats->fetch(PDO::FETCH_ASSOC)) {
        //debugV($techno);

        $languages .= '<div class="col-md-3 mt-5">';
        $languages .= '<div class="card mt-5 shadow-sm">';
        $languages .= '<i class="' . $techno['cptechnology'] . '"></i>';
        $languages .= '<div class ="card-body">';
        if ($techno['cplevel'] == 1) {
            $languages .= '<p>Débutant</p>';
        } elseif ($techno['cplevel'] == 2) {
            $languages .= '<p>Intermédiaire</p>';
        } elseif ($techno['cplevel'] == 3) {
            $languages .= '<p>Avancé</p>';
        } elseif ($techno['cplevel'] == 4) {
            $languages .= '<p>Maitrise</p>';
        }

        $languages .= '<div class ="d-flex justify-content-between align-items-center">';
        $languages .= '</div>';
        $languages .= '</div>';
        $languages .= '</div>';
        $languages .= '</div>';
    }
}

/************************************ Affichage des réalisations ************************************/
$projects = '';
$msg = '';

if (isset($_GET['choix']) && $_GET['choix'] == 'competence') {
    $donnees = executeRequete("SELECT * FROM projects");

    if ($donnees->rowCount() == 0) {
        $msg .= '<h2> En attente de projet</h2>';
    }
    while ($project = $donnees->fetch(PDO::FETCH_ASSOC)) {
        //debugV($project);

        $projects .= '<div class="col-lg-4">';
        $projects .= '<img class="rounded-circle" src="" alt="Generic placeholder image" width= "140" height= "140">';
        $projects .= '<h2>' . $project['pjtitle'] . '</h2>';
        $projects .= '<p><a class="btn btn-secondary" href="' . $project['pjlink'] . '" role="button"> Visiter & raquo;</a></p>';
        $projects .= '</div>';
    }
}
/********************** Affichage itinéraire pro **********************/
$xp = '';
if (isset($_GET['choix']) && $_GET['choix'] == 'experience') {
    $requete = executeRequete("SELECT * FROM xp");

    while ($pro = $requete->fetch(PDO::FETCH_ASSOC)) {
        //debugV($pro);
        $xp .= '<tr>';
        if ($pro['xpyear1'] == $pro['xpyear2']) {
            $xp .= '<th scope ="row"> depuis ' . $pro['xpyear2'] . '</th>';
        } else {
            $xp .= '<th scope ="row">' . $pro['xpyear1'] . ' - ' . $pro['xpyear2'] . '</th>';
        }
        $xp .= '<td>' . $pro['xpfunction'] . '</td>';
        $xp .= '<td>' . $pro['xpemployer'] . '</td>';
        $xp .= ' <td>' . $pro['xpresume'] . '</td>';
        $xp .= '</tr>';
    }
}
/********************** Affichage formation & langues **********************/
$formations = '';
$langue = '';
if (isset($_GET['choix']) && $_GET['choix'] == 'formation') {
    $requete = executeRequete("SELECT * FROM schooling");

    while ($diplome = $requete->fetch(PDO::FETCH_ASSOC)) {
        //debugV($diplome);
        $formations .= '<tr>';

        $formations .= '<tr><th scope ="row">' . $diplome['sgdate'] . '</th>';
        $formations .= '<td>' . $diplome['sgtitle'] . '</td>';
        $formations .= '<td>' . $diplome['sgtitle'] . '</td>';
        $formations .= '<td>' . $diplome['sgsubtitle'] . '</td>';
        $formations .= '</tr>';
    }
}

if (isset($_GET['choix']) && $_GET['choix'] == 'formation') {
    $requete = executeRequete("SELECT * FROM languages");

    while ($langues = $requete->fetch(PDO::FETCH_ASSOC)) {
        //debugV($langue);
        $langue .= '<tr>';

        $langue .= '<th scope="row">' . $langues['lglanguage'] . '</th>';
        if ($langues['lglevel'] == 1) {
            $langue .= '<td class="text-info">Débutant</td>';
        } elseif ($langues['lglevel'] == 2) {
            $langue .= '<td class="text-info">Intermédiaire</td>';
        } elseif ($langues['lglevel'] == 3) {
            $langue .= '<td class="text-info">Avancé</td>';
        } elseif ($langues['lglevel'] == 4) {
            $langue .= '<td class="text-info">Maitrise</td>';
        }

        $langue .= '</tr>';
    }
}
/****************** enregistrement  des contact en BDD ****************/
if (!empty($_POST)) {
    extract($_POST);

    $success = (empty($prenom) || empty($nom) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) ? false : true;
    $failedPrenom = (empty($prenom)) ? '<div class ="col-lg-4 alert alert-danger">Saisissez votre prénom</div>': null;
    $failedNom = (empty($nom)) ? '<div class ="col-lg-4 alert alert-danger">Saisissez votre nom</div>' : null;
    $failedEmail = (empty($email)) ? '<div class ="col-lg-4 alert alert-danger">Saisissez mail valide</div>' : null;
    $failedMessage = (empty($message)) ? '<div class ="col-lg-4 alert alert-danger">saisissez votre message</div>' : null;

    if ($success) {
        $contact = new Contact();

        $contact->contactAction($prenom, $nom, $email, $message);
       
    }
}