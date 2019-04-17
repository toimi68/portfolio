<?php
require_once "inc/header.inc.php";
?>
<div class="row">
    <div class="col-md-12 mb-4">
        <p class="text-center">Si vous souhaitez m’écrire : <strong>anserougier@yahoo.fr</strong></p>
        <p class="text-center"> <strong>Anne-Cécile ROUGIER – Hypno-thérapeute (Adultes – Adolescents – Couples – femmes
                enceintes)</strong>.
        </p>
        <p class="text-center"><strong>Prendre RDV au 06 63 75 09 81</strong>.</p>
    </div>
</div>

<div class="row">
    <form method="post" class="offset-md-3">
        <div class="row">
            <div class="col mb-2">
                <input type="text" class="form-control" placeholder="saisissez votre prénom" name="prenom">
            </div>
            <div class="col mb-2">
                <input type="text" name="nom" class="form-control" placeholder="saisissez votre nom">
            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <input type="text" name="email" class="form-control" placeholder="votre@email.fr">
            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <textarea name="message" cols="51" rows="9"></textarea> </div>
        </div> <button type=" submit" class="btn btn-outline-secondary mb-2">Envoyer</button>
    </form>

</div>






















<?php
require_once "inc/footer.inc.php";
?>