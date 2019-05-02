<?php
require_once "inc/init.inc.php";
// extract($_GET);
// echo '<pre>';
// var_dump($_GET);
// echo '</pre>';
//variable d'affichage
$contenu = "";


//Récupérartion de tout les articles
$req = $pdo->query("SELECT * FROM articles ORDER BY id_article DESC");
while ($articles = $req->fetch(PDO::FETCH_ASSOC)) {
    $contenu .= '<div class="card col-md-5 m-4 p-0">';
    $contenu .= '<h5 class="card-header mb-3">' . $articles['title'] . '></h5>';
    $contenu .= '<div class="card-body">';
    $contenu .= '<p class="card-text m-2">' . substr($articles['article'], 0, 60) . '... </p>';
    $contenu .= '<a class="col-md-3 mb-2" href="' . $articles['link'] . '"target="_blank" class="card-title">' . $articles['link'] . '</a>';
    $contenu .= '<a href="blogArticle.php?action=art&id=' . $articles['id_article'] . '"class="btn btn-primary btn-block mt-2">Lire</a>';
    $contenu .= '</div>';
    // $contenu .= '<div class="card-footer text-muted">2 days ago</div>';
    $contenu .= '</div>';
}

//Récupération d'un article par l'id
$requete = $pdo->query("SELECT * FROM articles WHERE id_article = '$_GET[id]'");
$article = $requete->fetch(PDO::FETCH_ASSOC);

require_once "inc/header.inc.php";
?>
<!-- Afficher tous les articles -->
<?php
if (isset($_GET['action']) && $_GET['action'] == "articles") {
    ?>
<div class="row">
    <?= $contenu; ?>
</div>
<!--  Afficher un article -->
<?php
} elseif (isset($_GET['action']) && $_GET['action'] == 'art'  && isset($_GET['id']) && $_GET['id'] == $article['id_article']) {
    ?>

<div class="container">
    <div class="row">
        <a href="blogArticle.php?action=articles&id=<?= $article['id_article'] ?>"
            class="btn btn-primary mb-2 offset-10"><i class="fas fa-backward"></i>
            Retour</a>
    </div>
    <div class="row">
        <div class="container">
            <h3 class="mb-5"><?= $article['title'] ?></h3>

            <p class=" mb-4"><?= $article['article'] ?></p>
            <a href="<?= $article['link'] ?>" class=" btn btn-outline-light mb-3"
                target="_blank"><?= $article['link'] ?></a>
        </div>
    </div>
</div>
<?php
}
?>
<?php
require_once "inc/footer.inc.php";
?>