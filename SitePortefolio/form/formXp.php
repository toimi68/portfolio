<?php
require '../inc/admin/adminHeader.inc.php';
require '../inc/init.inc.php';
require '../controller/traitement.php';
session_start();
?>
<div class="container">

    <div class="row">
        <h5>Ajouter une experience :</h5>
        <div class="col-lg-4 offset-2 mt-5">
            <form method="POST">
                <?php
                echo $xpAlert;
                ?>
                <div class="form-row mb-3">
                    <div class="col-4 offset-1">
                        <select name="xpyear1" class="class-form-control custom-select">
                            <?php
                            echo $select_date;
                            ?>
                        </select>
                    </div>
                    <div class="col-4 offset-2">
                        <select name="xpyear2" class="class-form-control custom-select">
                            <?php
                            echo $select_date;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="xpfunction" placeholder="Fonction">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="xpemployer" placeholder="Entreprise">
                </div>
                <div class="form-group">
                    <textarea name="xpresume" id="" cols="33" rows="5" placeholder="Resumé"></textarea>
                </div>
                <input type="
                        submit" class="btn btn-outline-dark mt-4 text-success" value="Enregistrer">
            </form>
        </div>
    </div>

</div>