<?php
require_once "../inc/init.inc.php";
// ARTICLE
// Récupération des données article :

//TEMOIGNAGE
// Récupération des données article :

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS BS  CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- CSS Bootstrap en local -->
    <link rel="stylesheet" href="../lib/css/bootstrap.css">
    <!--FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- CSS perso -->
    <link rel="stylesheet" href="../css/styleAdmin.css">
    <title>hypnose humaniste</title>
</head>

<body>
    <div class="container">
        <h2 class="m-5">Bienvenue dans votre espace</h2>
        <a href="?choix=article" class="btn btn-dark text-center">Gérer vos articles</a>
        <a href="?choix=temoignage" class="btn btn-dark text-center">Gérer les témoignages</a>

        <?php if (isset($_GET['choix']) && $_GET['choix'] == 'article') { ?>
        <!-- ARTICLES -->
        <div class="row">
            <div class="container m-3">
                <h3>Gestion des articles</h3>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="">Titre</th>
                            <th scope="col" class="">Lien</th>
                            <th scope="col" class="">Handle</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="">Mark</td>
                            <td class="">Otto</td>
                            <td class="">@mdo</td>
                            <td><a href="formArticle.php?action=modif&id="><i
                                        class="fas fa-edit text-warning"></i></i></a>
                            </td>
                            <td><a href="?action=supp&id="><i class="fas fa-trash text-danger"></i></a></td>
                        </tr>
                    </tbody>
                </table>
                <a href="formArticle.php?action=ajout" class="offset-11"><i
                        class="fas fa-plus text-dark btn btn-outline-success"></i></a>
            </div>
        </div>
        <?php
    } elseif (isset($_GET['choix']) && $_GET['choix'] == 'temoignage') { ?>
        <!-- TEMOIGNAGES -->
        <div class="row">
            <div class="container m-3">

                <h3>Gestion des témoignages</h3>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>

                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="">Mark</td>
                            <td class="">Otto</td>
                            <td class="">Otto</td>
                            <td><a href="#"><i class="fas fa-trash text-danger"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>
    <!--.CONTAINER -->
    <!--JS BS CDN-->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> -->
    <!-- JS BS LOCAL -->
    <script src="../lib/jquery-3.3.1.js"></script>
    <script src="../lib/popper.js"></script>
    <script src="../lib/js/bootstrap.js"></script>
</body>

</html>