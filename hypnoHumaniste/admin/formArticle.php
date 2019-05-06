<?php
require_once "../inc/init.inc.php";
$successMsg = "";
$msgTitle = "";
$msgError = "";

extract($_POST);

// Ajout & modification des articles:
if(isset($_GET['action']) && $_GET['action'] == 'modif' && isset($_GET['id'])){
    $req = $pdo->prepare("SELECT * FROM articles WHERE id_article = :id_article");
    $req->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
    $req->execute();

    if($req->rowCount() > 0){
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $art = $req->fetch(PDO::FETCH_ASSOC);
    }
}// FIN if(isset($_GET['action']) && $_GET['action'] == 'modif' && isset($_GET['id'])


//Ajout & modification des articles
if ($_POST) {

    if (empty($title) || iconv_strlen($title) < 3 || iconv_strlen($title) > 100) {
        $msgTitle .= '<small class="text-danger">** Saisissez un titre</small>';
    }

    if (!filter_var($link, FILTER_VALIDATE_URL) || empty($link) || empty($article) || strlen($article) < 3) {
        $msgError .= '<small class="text-danger">** renseignez au moins le lien ou l\'article</small>';
    }

    //INSERTION EN BDD

    if (empty($msgTitle) && empty($msgError)) {

        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES);
        } // FIN foreach ($_POST as $key => $value)

        $donnees = $pdo->prepare(" REPLACE INTO articles (id_article, title, link, article) VALUES (:id_article, :title, :link, :article)");

        $donnees->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $donnees->bindValue(':title', $title, PDO::PARAM_STR);
        $donnees->bindValue(':link', $link, PDO::PARAM_STR);
        $donnees->bindValue(':article', $article, PDO::PARAM_STR);

        $donnees->execute();

        $successMsg .= '<div class=" col-md-6 offset-1 alert alert-primary text-center">l\'article à bien été enregistrer</div>';
    } //FIN if(empty($msgTitre) && empty($msgError))

} // FIN if($_POST)



?>
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

        <?php if (isset($_GET['action']) && $_GET['action'] == 'ajout') { ?>
        <h2 class="m-5">Ajouter un article</h2>
        <?php  } elseif (isset($_GET['action']) && $_GET['action'] == 'modif') { ?>
        <h2 class="m-5">Modifier votre article</h2>
        <?php  } ?>
        <div class="container m-5">
            <form method="POST" class="offset-md-4 mt-5">
                <?= $successMsg; ?>
                <input type="hidden" name="id_article" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modif' && isset($_GET['id'])){ echo $art['id_article'];}else{ echo "";} ?>">
                <div class="form-group">
                    <div class="col-md-8">
                        <?= $msgTitle;?>
                        <input type="text" class="form-control" id="text" name="title" placeholder="Titre" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modif' && isset($_GET['id'])){ echo $art['title'];}else{ echo "Titre";} ?>"></div>
                    <div class="form-group">
                        <div class="col-md-8 mt-2">
                            <input type="text" class="form-control" id="text" name="link" placeholder="lien http://" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modif' && isset($_GET['id'])){ echo $art['link'];}else{ echo "lien http://";} ?>">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <?= $msgError; ?>
                        <textarea class="form-control" name="article" rows="3"><?php if(isset($_GET['action']) && $_GET['action'] == 'modif' && isset($_GET['id'])){ echo $art['article'];}else{ echo "";} ?></textarea>
                    </div>
                    <div class="col-md-5">
                        <input type="submit" class="btn btn-dark mt-4 text-success btn-block" value="Enregistrer">
                    </div>

                </div>

            </form>
            <div class="row">
                <div class="col-lg-2 offset-3 mt-5">
                    <a href="gestionAdmin.php?choix=article"><i
                            class="fas fa-chevron-circle-left fa-3x  text-dark"></i></a>
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