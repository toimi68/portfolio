<?php
include '../inc/header.inc.php';
require '../inc/init.inc.php';
require '../controller/traitement.php';
session_start();
?>
<div class="container  m-0 auto">
    <form action="" method="POST">
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="ville">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Pseudo">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-info">Se connecter</button>

    </form>
</div>
<?php
require '../inc/footer.inc.php';
?>