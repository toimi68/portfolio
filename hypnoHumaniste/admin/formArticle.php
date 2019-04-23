<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS BS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- CSS perso -->
    <link rel="stylesheet" href="../css/styleAdmin.css">
    <title>hypnose humaniste</title>
</head>

<body>
    <div class="container">

        <?php if (isset($_GET['choix']) && $_GET['choix'] == 'ajout' && $_GET['choix'] == 'id') { ?>
        <h2 class="m-5">Ajouter un article</h2>
        <?php  } elseif (isset($_GET['choix']) && $_GET['choix'] == 'modif') { ?>
        <h2 class="m-5">Modifier un article</h2>
        <?php  } ?>

        <form method="POST" class="offset-md-4">

            <div class="form-group">
                <div class="col-md-5">
                    <input type="text" class="form-control" id="text" name="titre" placeholder="Titre"> </div>
                <div class="form-group">
                    <div class="col-md-5 mt-2">
                        <input type="text" class="form-control" id="text" name="link" placeholder="lien http://">
                    </div>
                </div>
                <div class="col-md-5">
                    <input type="submit" class="btn btn-dark mt-4 text-success btn-block" value="Enregistrer">
                </div>
        </form>
        <div class="row">
            <div class="col-lg-2 offset-3 mt-5">
                <a href="gestionAdmin.php"><i class="fas fa-chevron-circle-left fa-3x  text-dark"></i></a>
            </div>
        </div>
    </div>
    <!--.CONTAINER -->
    <!--JS BS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>