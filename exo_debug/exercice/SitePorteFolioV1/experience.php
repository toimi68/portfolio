<?php
require_once 'inc/header.inc.php';
require_once 'inc/init.inc.php';
//require_once 'controller/controllerXp.php';

$xp ="";

/*----- Affichage expériences -----*/

//if(isset($_GET['choix']) && $_GET['choix'] =='experience'){
$req = $pdo->query("SELECT * FROM xp ORDER BY xpyear2 DESC");
while($xps = $req->fetch(PDO::FETCH_ASSOC)){
//    $xp .= '<ul>';
//    $xp .= '<li>';
//    if($xps['xpyear1'] == $xps['xpyear2']){
//        $xp .= '<div> Depuis '.$xps['xpyear2'].'</div>';
//    } else {
//        $xp .= '<div class="timeline_date">'.$xps['xpyear1'].' - '.$xps['xpyear2'].'</div>';
//    }
//
//    $xp .=  '<p>'.$xps['xpfunction'].'</p>';
//    $xp .= '<p>'.$xps['xpemployer'].'</p>';
//    $xp .= '<p>'.$xps['xpresume'].'</p>';
//    $xp .= '</li>';
//    $xp .= '</ul>';

        $xp .= '<div class="col-lg-3 m-4 mb-3" id="languette">';
        if($xps['xpyear1'] == $xps['xpyear2']){
            $xp .= '<p>Depuis '.$xps['xpyear2'].'</p> ';
        }else{
            $xp .= '<p>'.$xps['xpyear1'].' - '.$xps['xpyear2'].'</p> ';
        }

            $xp .= '<h4>'.$xps['xpfunction'].'</h4> ';
            $xp .= '<p>'.$xps['xpemployer'].'</p>';
            $xp .= '<p>'.$xps['xpresume'].'</p>';

        $xp .= '</div> ';
}
?>
<!-- Zone experiences -->
<section id="experience" class="timeline">
        <div class="row">
            <div class="col-lg-12 m-5">
                <div class="row">
                    <?php echo $xp;?>
                </div>
            </div>
        </div>


</section>
<?php require_once 'inc/footer.inc.php'?>