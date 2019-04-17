<?php
require_once 'inc/header.inc.php';
require_once 'inc/init.inc.php';
//require_once 'controller/controllerFormation.php';

//Variable d'affichage formation:
$diplome = "";

//if(isset($_GET['choix']) && $_GET['choix'] == 'formation'){
    $req = $pdo->query("SELECT * FROM schooling ORDER BY sgdate DESC");
    while($school = $req->fetch(PDO::FETCH_ASSOC)){
//        $diplome .='<div class="col-lg-4">';
//        $diplome .='<div id="menuRotate">';
//        $diplome .='<dl class="menu">';
//        $diplome .= '<dt class="btnRot">'.$school['sgdate'].'</dt>';
//        $diplome .='<dd>'.$school['sgdescription'] .'</dd>';
//        $diplome .='<dd>'.$school['sgsubtitle'] .'</dd>';
//        $diplome .='<dd>'.$school['sgtitle'] .'</dd>';
//        $diplome .='</dl>';
//        $diplome .='<div class="masque"><div>';
//        $diplome .='<div class="ombre"><div>';
//        $diplome .='<div>';
//        $diplome .="</div>";
        $diplome .= '<div class="card bg-secondary m-3" style="max-width: 18rem;">';
            $diplome .= '<div class="card-header">'.$school['sgdate'].'</div>';
            $diplome .= '<div class="card-body">';
                $diplome .= '<h3 class="card-title">'.$school['sgtitle'].'</h3>';
                $diplome .= '<h5 class="card-text">'.$school['sgsubtitle'].'</h5>';
        $diplome .= '<p class="card-text">'.$school['sgdescription'] .'</p>';
            $diplome .= '</div>';
        $diplome .= '</div>';


    }
//}
?>
<!-- Zone formation -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-1">
                <div class="row">
                    <?php echo $diplome;?>
                </div>
            </div>
        </div>
<!--        <hr>-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 mt-1">-->
<!--                <div class="row">-->
<!--            </div>-->
<!--        </div>-->
    </div>
</section>
<?php require_once 'inc/footer.inc.php'?>