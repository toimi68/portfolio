<?php

/************************************ Affichage des languages ************************************/
$languages='';
if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $resultats = executeRequete("SELECT * FROM competences");
    
    
    while($techno = $resultats->fetch(PDO::FETCH_ASSOC)){
        //debugV($techno);
        
        $languages .= '<div class="col-md-3 mt-5">';
        $languages .= '<div class="card mt-5 shadow-sm">';
        $languages .= '<i class="'.$techno['cptechnology'].'"></i>';
        $languages .= '<div class ="card-body">';
        if($techno['cplevel'] == 1){
            $languages .= '<p>Débutant</p>';
        }elseif($techno['cplevel'] == 2){
            $languages .= '<p>Intermédiaire</p>';
        }elseif($techno['cplevel']== 3){
            $languages .= '<p>Avancé</p>';
        }elseif($techno['cplevel']== 4){
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
$projects ='';
$msg='';

if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $donnees = executeRequete("SELECT * FROM projects");
    
    if($donnees->rowCount() == 0){
        $msg .= '<h2> En attente de projet</h2>';
    }
        while($project = $donnees->fetch(PDO::FETCH_ASSOC)){
            debugV($project);

            $projects .='<div class="col-lg-4">';
            $projects .='<img class="rounded-circle" src="" alt="Generic placeholder image" width= "140" height= "140">';
            $projects .='<h2>'.$project['pjtitle'].'</h2>';
            $projects .='<p><a class="btn btn-secondary" href="'.$project['pjlink'].'" role="button"> Visiter & raquo;</a></p>';
            $projects .='</div>';
        }
}

