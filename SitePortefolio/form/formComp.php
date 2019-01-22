<?php
require '../inc/admin/adminHeader.inc.php';
require '../inc/init.inc.php';
require '../controller/traitement.php';
session_start();
?>
<div class="container">

    <div class="row">
        <h5> Ajouter une competence :</h5>
        <div class="col-lg-4 offset-2 mt-5">
            <form method="POST">
                <?php
echo $msg;
?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="text" aria-describedby="emailHelp" name="idcompetence"
                        value=0>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="text" aria-describedby="emailHelp" name="cptechnology"
                        placeholder="Technologie">
                </div>
                <div class="form-group">
                </div>
                <select class="form-control form-control-sm" name="cplevel">
                    <option value="">--Niveau--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <input type="submit" class="btn btn-outline-dark mt-4 text-success" value="Enregistrer">
            </form>
        </div>
    </div>

</div>