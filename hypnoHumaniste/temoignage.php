<?php
require_once "inc/init.inc.php";
//variable d'affichage
$contenu = "";

//Récupération des données
$req = $pdo->query("SELECT * FROM temoignages");

while ($temoignage = $req->fetch(PDO::FETCH_ASSOC)) {

    $contenu .= ' <div class="col-md-3 m-1">';
    $contenu .= '<div class="card">';
    $contenu .= '<div class="card-body">';
    $contenu .= '<p class="card-text">' . $temoignage['tmessage'] . '</p>';
    $contenu .= '<small class="card-title offset-5">' . $temoignage['tprenom'] .' '. $temoignage['tnom'] . '</small>';
    $contenu .= '</div>';
    $contenu .= '</div>';
    $contenu .= '</div>';
} //fin while ($temoignage = $req->fetch(PDO::FETCH_ASSOC))


require_once "inc/header.inc.php";
?>
<div class="row">
    <div class="col-md-2 offset-md-10">
        <a href="formtemoignage.php" title="ajoutez un message"><i class="fas fa-plus-circle m-1 text-success"></i></a>
    </div>
</div>
<div class="row">
    <?= $contenu; ?>
</div>

</div>



<?php
require_once "inc/footer.inc.php";
?>


















<?php
require_once "inc/footer.inc.php";
?>