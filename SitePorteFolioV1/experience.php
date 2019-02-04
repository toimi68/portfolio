<?php
require_once 'inc/header.inc.php';
require_once 'inc/init.inc.php';
require_once 'controller/controllerXp.php';

$bo_xp ="";

/*----- Affichage expériences -----*/

//if(isset($_GET['choix']) && $_GET['choix'] =='experience'){
$req = $pdo->query("SELECT * FROM xp ORDER BY xpyear2 DESC");
while($xps = $req->fetch(PDO::FETCH_ASSOC)){
    $xp .= '<ul>';
    $xp .= '<li>';
    if($xps['xpyear1'] == $xps['xpyear2']){
        $xp .= '<div> Depuis '.$xps['xpyear2'].'</div>';
    } else {
        $xp .= '<div class="timeline_date">'.$xps['xpyear1'].' - '.$xps['xpyear2'].'</div>';
    }

    $xp .=  '<p>'.$xps['xpfunction'].'</p>';
    $xp .= '<p>'.$xps['xpemployer'].'</p>';
    $xp .= '<p>'.$xps['xpresume'].'</p>';
    $xp .= '</li>';
    $xp .= '</ul>';

}
?>
<!-- Zone experiences -->
<section id="experience" class="timeline">
    <?php echo $xp; ?>
</section>