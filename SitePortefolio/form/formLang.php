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
                echo 'Modifier une langue : ';
            } else {
                echo 'Ajouter une langue : ';
            }
            ?>
        </h5>
        <div class="col-lg-4 offset-2 mt-5">
            <form method="POST" action="../admin/gestionIndex.php">
                <?php
                echo $msg;
                echo $msgLangue;
                ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="text"  name="idlanguage"
                        value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){ echo $langue_update['idlanguage']; }
                        else { echo "0"; }?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="lang" name="lglanguage" placeholder="Langue" value="<?php echo $langue_update['lglanguage'] ??
                        $_POST['lglanguage'] ?? '' ?>">
                </div>
                <div class="form-group">
                </div>
                <select class="form-control form-control-sm" name="lglevel">
                    <option value=""><?php echo $langue_update['lglevel'] ??
                            $_POST['lglevel'] ?? '--Niveau--' ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <input type="submit" class="btn btn-outline-dark mt-4 text-success" value="Enregistrer">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 offset-3">
            <a href="../admin/gestionIndex.php?gestion=formation"><i class="fas fa-chevron-circle-left fa-3x  text-dark"></i></a>
        </div>
    </div>


</div>