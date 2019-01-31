<?php
require '../inc/admin/adminHeader.inc.php';
require '../inc/init.inc.php';
require '../controller/traitement.php';
//session_start();

if (empty($_GET)) {
    ?>
<div class="row">
    <div class="col-12">
        <h1>espace admin</h1>
    </div>
</div>
<?php
} elseif (isset($_GET['gestion']) && $_GET['gestion'] == 'competence') {
    ?>
<!-- gestion competences -->
<h3>Gestion des competences :</h3>
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="container">
            <table class="table table-striped table-dark " border="1px solid red">
                <thead>
                    <tr>
                        <th>Technologie</th>
                        <th>Niveau</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        echo $bo_comps;
                        ?>
                </tbody>
            </table>
            <a href="../form/formComp.php" class="offset-11"><i class="fas fa-plus text-dark btn btn-outline-success"></i></a>
        </div>
        <div>
            <?php
            echo $msg;
            ?>
        </div>
    </div>
</div>

<!-- gestion des projet -->
<h3>Gestion des projets :</h3>
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="container">
            <table class="table table-striped table-dark " border="1px solid red">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>URL</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $bo_projet;
                    ?>
                </tbody>
            </table>
            <a href="../form/formProjet.php?" class="offset-11"><i class="fas fa-plus text-dark btn btn-outline-success"></i></a>
        </div>
    </div>
</div>
<?php
} elseif (isset($_GET['gestion']) && $_GET['gestion'] == 'experience') {
    ?>
<!-- gestion experience -->
<h3>Gestion des experiences :</h3>
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="container">
            <?php
            echo $msg;
            ?>
            <table class="table table-striped table-dark " border="1px solid red">
                <thead>
                    <tr>
                        <th colspan="2">Années</th>
                        <th>Fonction</th>
                        <th>Employeur</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $bo_xp;
                    ?>
                </tbody>
            </table>
            <a href="../form/formXp.php" class="offset-11"><i class="fas fa-plus text-dark btn btn-outline-success"></i></a>
        </div>
    </div>
</div>
<?php
} elseif (isset($_GET['gestion']) && $_GET['gestion'] == 'formation') {
    ?>
<!-- gestion formation -->
<h3>Gestion des formations :</h3>
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="container">
            <table class="table table-striped table-dark" border="1px solid red">
                <thead>
                    <tr>
                        <th>Années</th>
                        <th>Diplome</th>
                        <th>titre</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $bo_diplome;
                    ?>
                </tbody>
            </table>
            <a href="../form/formFormation.php" class="offset-11"><i class="fas fa-plus text-dark btn btn-outline-success"></i></a>
        </div>
    </div>
</div>



<!-- gestion language -->
<h3>Gestion des languages :</h3>
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="container">
            <table class="table table-striped table-dark " border="1px solid red">
                <thead>
                    <tr>
                        <th>Langue</th>
                        <th>Niveau</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $bo_langue;
                    ?>
                </tbody>
            </table>
            <a href="../form/formLang.php" class="offset-11"><i class="fas fa-plus text-dark btn btn-outline-success"></i></a>
        </div>
    </div>
</div>
<?php

}
?>
</body>

</html>