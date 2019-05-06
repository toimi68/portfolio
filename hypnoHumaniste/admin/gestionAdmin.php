<?php
require_once "../inc/init.inc.php";
//variable d'affichage :
$contenu = "";
$donnees = "";
$msg="";
$error="";

/*********
 ARTICLE
 ********/


//Suppression des articles :
if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])){

    $req = $pdo->prepare("DELETE FROM articles WHERE id_article = :id_article");
    $req->bindValue(':id_article', $_GET['id'], PDO::PARAM_INT);
    $req->execute();

    if($req->rowCount() == 1){
        $msg .= '<div class="col-md-5 alert-success>L\'article  n°' . $_GET['id'] . ' a bien été supprimé </div>';
    }else {
        $error .= '<div class="col-md-5 alert-success>La formation n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }

}// FIN if(isset($_GET['action']) && $_GET['action'] == 'supp' && isset($_GET['id'])


// Récupération des données article :
$req = $pdo->query("SELECT * FROM articles ORDER BY id_article DESC");
while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
    $contenu .= '<tr>';
    $contenu .= '<td class="text-light">' . $article['title'] . '</td>';
    $contenu .= '<td class="text-light">' . $article['article'] . '</td>';
    $contenu .= '<td class="text-light"><a href="'.$article['link'].'">' . $article['link'] . '</a></td>';
    $contenu .= '<td><a href="formArticle.php?action=modif&id=' . $article['id_article'] . '"><i class="fas fa-edit text-warning"></i></i></a></td>';
    $contenu .= '<td><a href="?action=supp&id=' . $article['id_article'] . '"><i class="fas fa-trash text-danger"></i></a></td>';
    $contenu .= '</tr>';
}




/*********
TEMOIGNAGE
 *********/
// Récupération des données article :
$request = $pdo->query("SELECT* FROM temoignages ORDER BY id_temoin DESC ");
while ($temoin = $request->fetch(PDO::FETCH_ASSOC)) {
    $donnees .= '<tr>';
    $donnees .= '<td class="text-light">' . $temoin['tprenom'] . '</td>';
    $donnees .= '<td class="text-light">' . $temoin['tnom'] . '</td>';
    $donnees .= '<td class="text-light">' . $temoin['tmessage'] . '</td>';
    $donnees .= '<td><a href="?action=supp&id=' . $temoin['id_temoin'] . '"><i class="fas fa-trash text-danger"></i></a></td>';
    $donnees .= '</tr>';
}
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
                <?= $msg;?>
                <?= $error;?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-light">Titre</th>
                            <th scope="col" class="text-light">Lien</th>
                            <th scope="col" class="text-light">Article</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $contenu; ?>
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
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col" class="text-light">Prénom</th>
                            <th scope="col" class="text-light">Nom</th>
                            <th scope="col" class="text-light">Message</th>
                            <th scope="col" class="text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $donnees; ?>
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