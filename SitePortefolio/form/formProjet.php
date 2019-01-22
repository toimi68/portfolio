<?php
require '../inc/admin/adminHeader.inc.php';
require '../inc/init.inc.php';
require '../controller/traitement.php';
session_start();
?>
<div class="container">

    <div class="row">
        <h3>Ajouter un projet : </h3>
        <div class="col-lg-4 offset-2 mt-5">
            <form method="POST">
                <?php
                echo $alert;
                ?>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="pjtitle" placeholder="Titre">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="pjlink" placeholder="Lien">
                </div>


                <input type="submit" class="btn btn-outline-dark mt-4 text-success" value="Enregistrer">
            </form>
        </div>
    </div>

</div>