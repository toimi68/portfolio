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
                echo 'Modifier une experience : ';
            } else {
                echo 'Ajouter une experience : ';
            }
            ?>
        </h5>
        <div class="col-lg-4 offset-2 mt-5">
            <form method="POST" action="../admin/gestionIndex.php">
                <?php

                echo $msg;
                echo $msgXp;
                ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="text" name="idxp"
                           value="<?php  if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])){echo
                           $xp_update['idxp']; }
                           else { echo "0";}?>">
                </div>
                <div class="form-row mb-3">
                    <div class="col-4 offset-1">
                        <select name="xpyear1" class="class-form-control custom-select">
                            <option value="<?php echo $xp_update['xpyear1'] ??
                                $_POST['xpyear1'] ?? '' ?>"><?php echo $xp_update['xpyear1'] ??
                                    $_POST['xpyear1'] ?? 'Début' ?></option>
                            <?php
                            echo $select_date;
                            ?>
                        </select>
                    </div>
                    <div class="col-4 offset-2">
                        <select name="xpyear2" class="class-form-control custom-select">
                            <option value="<?php echo $xp_update['xpyear2'] ??
                                $_POST['xpyear2'] ?? '' ?>"><?php echo $xp_update['xpyear2'] ??
                                    $_POST['xpyear2'] ?? 'Fin' ?></option>
                            <?php
                            echo $select_date2;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="xpfunction" placeholder="Fonction" value="<?php echo $xp_update['xpfunction'] ??
                        $_POST['xpfuntion'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="xpemployer" placeholder="Entreprise" value="<?php echo
                        $xp_update['xpemployer'] ??
                        $_POST['xpemployer'] ?? '' ?>">
                </div>
                <div class="form-group">
                    <textarea name="xpresume" id="" cols="33" rows="5" placeholder="Resumé"><?php echo $xp_update['xpresume'] ??
                            $_POST['xpresume'] ?? '' ?></textarea>
                </div>
                <input type="submit" class="btn btn-outline-dark mt-4 text-success" value="Enregistrer">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 offset-3">
            <a href="../admin/gestionIndex.php?gestion=experience"><i class="fas fa-chevron-circle-left fa-3x  text-dark"></i></a>
        </div>
    </div>


</div>