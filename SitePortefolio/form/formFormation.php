<?php
require '../inc/admin/adminHeader.inc.php';
require '../inc/init.inc.php';
require '../controller/traitement.php';
session_start();
?>
<div class="container">

    <div class="row">
        <h5> Ajouter une formation : </h5>
        <div class="col-lg-4 offset-2 mt-5">
            <form method="POST">
                <?php
                    echo $msgAlert;
                ?>
                <div class="form-group">
                    <select name="sgdate" class="class-form-control custom-select">
                        <?php
                        echo $select_date;
                        ?>
                    </select>
                </div>
                <div class="
                        form-group">
                    <input type="text" class="form-control" id="text" name="sgtitle" placeholder="Diplome">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" name="sgsubtitle" placeholder="spécialité">
                </div>
                <div class="form-group">
                    <textarea name="sgdescription" id="" cols="33" rows="5" placeholder="Description"></textarea>
                </div>
                <input type="submit" class="btn btn-outline-dark mt-4 text-success" value="Enregistrer">
            </form>
        </div>
    </div>

</div>