<?php
require '../inc/admin/adminHeader.inc.php';
require '../inc/init.inc.php';
require '../controller/traitement.php';

?>
<div class="container">

    <div class="row">
        <h5>
            <?php
            if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){
                echo 'Modifier une compétence : ';
            } else {
                echo 'Ajouter une compétence : ';
            }
            ?>
        </h5>
        <div class="col-lg-4 offset-2 mt-5">
            <form method="POST" action="../admin/gestionIndex.php">
                <?php
                echo $msgComp;
                echo $msg;
                ?>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="text"  name="idcompetence"
                           value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){ echo $comp_update['idcompetence']; }
                           else { echo "0"; }?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" aria-describedby="emailHelp" name="cptechnology"
                           placeholder="Technologie" value="<?php echo $comp_update['cptechnology'] ??
                        $_POST['cptechnology'] ?? '' ?>">
                </div>
                <div class="form-group">
                </div>
                <select class="form-control form-control-sm" name="cplevel" value="">
                    <option value=""><?php echo $comp_update['cplevel'] ??
                            $_POST['cplevel'] ?? '--Niveau--' ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <input type="submit" class="btn btn-outline-dark mt-4 text-success" value="Enregistrer">
            </form>
        </div>
        <div class="col-lg-2 offset-3">
            <a href="../admin/gestionIndex.php?gestion=competence"><i class="fas fa-chevron-circle-left fa-3x  text-dark"></i></a>
        </div>
    </div>

</div>