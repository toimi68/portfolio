<?php

/************************************ Affichage des languages ************************************/
$languages='';
if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $resultats = executeRequete("SELECT * FROM competences");
    
    
    while($techno = $resultats->fetch(PDO::FETCH_ASSOC)){
        debugV($techno['cptechnology']);
        
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