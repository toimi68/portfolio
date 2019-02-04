<?php
require_once 'inc/header.inc.php';
require_once 'inc/init.inc.php';
require_once 'controller/controllerFormation.php';

//Variable d'affichage formation:
$diplome = "";

//if(isset($_GET['choix']) && $_GET['choix'] == 'formation'){
    $req = $pdo->query("SELECT * FROM schooling ORDER BY sgdate DESC");
    while($school = $req->fetch(PDO::FETCH_ASSOC)){
        $diplome .='<div class="col-lg-3">';
        $diplome .='<div id="menuRotate">';
        $diplome .='<dl class="menu">';
        $diplome .= '<dt class="btnRot">'.$school['sgdate'].'</dt>';
        $diplome .='<dd>'.$school['sgdescription'] .'</dd>';
        $diplome .='<dd>'.$school['sgsubtitle'] .'</dd>';
        $diplome .='<dd>'.$school['sgtitle'] .'</dd>';
        $diplome .='</dl>';
        $diplome .='<div class="masque"><div>';
        $diplome .='<div class="ombre"><div>';
        $diplome .='<div>';
        $diplome .="</div>";
    }
//}
?>
<!-- Zone formation -->
<section id="formation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-1">
                <div class="row">
                    <?php echo $diplome;?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 mt-1">
                <div class="row">
                    <!--                    --><?php //echo $langue;?>
                    <!--                    <div class="col-lg-3">-->
                    <!--                        <div class="card" id="card">-->
                    <!--                    <div class="face front"></div>-->
                    <!--                    <div class="face back">-->
                    <!--                        <a href="#"></a>-->
                    <!--                        <a href="#"></a>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                </div>
                <!--                                    <table class="table table-striped table-dark mt-5">-->
                <!--                                        <thead>-->
                <!--                                            <tr>-->
                <!--                                                <th scope="col">Langue</th>-->
                <!--                                                <th scope="col">Niveau</th>-->
                <!--                                            </tr>-->
                <!--                                        </thead>-->
                <!--                                        <tbody>-->
                <!--                                            --><?php //echo $langue; ?>
                <!--                                        </tbody>-->
                <!--                                    </table>-->
            </div>
        </div>
    </div>
</section>
