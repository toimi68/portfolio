<?php
require_once '../inc/form/formHeader.inc.php';
require_once '../inc/init.inc.php';
require_once '../controller/controllerProjet.php';

?>
<div class="row">
    <h5>
        <?php
        if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){
            echo '<h3>Modifier une projet :</h3>h ';
        } else {
            echo '<h3>Ajouter une cprojet: </h3>h';
        }
        ?>
    </h5>
    <div class="col-lg-4 offset-2 mt-5">
        <form method="POST" action="../admin/gestionIndex.php">
            <?php
            echo $errorProjet;
            echo $successProjet;
            ?>
            <div class="form-group">
                <input type="hidden" class="form-control" id="text"  name="idproject"
                       value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){ echo
                       $project_update['idxp']; }
                       else { echo "0"; }?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="text" name="pjtitle" placeholder="Titre" value="<?php echo $project_update['pjtitle'] ??
                    $_POST['pjtitle'] ?? '' ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="text" name="pjlink" placeholder="Lien" value="<?php echo $project_update['pjlink'] ??
                    $_POST['pjlink'] ?? '' ?>">
            </div>


            <input type="submit" class="btn btn-outline-dark mt-4 text-success" value="Enregistrer">
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-2 offset-3">
        <a href="../admin/compAdmin.php"><i class="fas fa-chevron-circle-left fa-3x  text-dark"></i></a>
    </div>
</div>


</div>

