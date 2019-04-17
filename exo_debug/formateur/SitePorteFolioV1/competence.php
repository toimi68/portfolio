<?php
require_once 'inc/header.inc.php';
require_once 'inc/init.inc.php';
//require_once 'controller/controllerComp.php';
//require_once 'controller/controllerProjet.php';
//Variable d'affichage :
$competence = "";

/*>>>>> COMPETENCE >>>>>*/

/*----- Affichage des competences -----*/
//if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $req= $pdo->query("SELECT * FROM competences");


    while($comps = $req->fetch(PDO::FETCH_ASSOC)){
        //debugV($comps);

        $competence .= '<div class="col-md-3 mt-5">';
        $competence .= '<div class="card mt-5 shadow-sm">';
        $competence .= '<i class="'.$comps['cptechnology'].' fa-3x"></i>';
        $competence .= '<div class ="card-body">';
        if($comps['cplevel'] == 1){
            $competence .= '<p class="text-warning">Débutant</p>';
        }elseif($comps['cplevel'] == 2){
            $competence .= '<p class="text-info">Intermédiaire</p>';
        }elseif($comps['cplevel']== 3){
            $competence .= '<p class="text-primary">Avancé</p>';
        }elseif($comps['cplevel']== 4){
            $competence .= '<p class="text-success">Maitrise</p>';
        }

        $competence .= '<div class ="d-flex justify-content-between align-items-center">';
        $competence .= '</div>';
        $competence .= '</div>';
        $competence .= '</div>';
        $competence .= '</div>';
    }
//}



/*>>>>> PROJET >>>>>*/
//Variable d'affichage :
$projet ="";
$msg="";
//if(isset($_GET['choix']) && $_GET['choix'] == 'competence'){
    $req = $pdo->query("SELECT * FROM projects");

    if($req->rowCount() == 0){
        $msg .= '<h2> Projets à venir ...</h2>';
    }
    while($projets = $req->fetch(PDO::FETCH_ASSOC)){
        //debugV($project);
        $projet .='<div class="col-lg-4 mt-2">';
        $projet .='<img class="rounded-circle" src="" alt="Generic placeholder image" width= "140" height= "140">';
        $projet .='<h2 class="m-1">'.$projets['pjtitle'].'</h2>';
        $projet .='<p><a class="btn btn-success " href="'.$projets['pjlink'].'" role="button"> Visiter</a></p>';
        $projet .='</div>';
    }
//}


?>
<!-- Zone competences -->
<section>
    <div class=container>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php echo $competence;?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="row">
                            <?php
                            echo $projet;
                            echo $msg;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'inc/footer.inc.php'?>