<?php
//include '../inc/header.inc.php';
require '../inc/init.inc.php';
require '../controller/traitementOld.php';
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alpha Diallo</title>

    <!-- CSS de Bootstrap en 1er -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">
    <!-- fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
          crossorigin="anonymous">
    <!-- CSS perso en 2ème -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<div class="container-fluid m-auto">
<div class="container mt-5 offset-4">
    <?php //echo $isAdmin; ?>
    <form action="" method="POST">
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="uemail" placeholder="ville" value="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pwd" name="upassword" placeholder="Pseudo" value="">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-info">Se connecter</button>

    </form>
</div>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</body>

</html>
