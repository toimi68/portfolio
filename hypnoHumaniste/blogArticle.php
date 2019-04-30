<?php
require_once "inc/init.inc.php";
$contenu = "";

//AFFICHAGE DE TOUT LES ARTICLES
$req = $pdo->query("SELECT * FROM articles");
while ($articles = $req->fetch(PDO::FETCH_ASSOC)) {
    $contenu .= '<div class="card col-md-5 m-2 p-0">';
    $contenu .= '<h5 class="card-header">' . $articles['title'] . '></h5>';
    $contenu .= '<div class="card-body">';
    $contenu .= '<p class="card-text">' . substr($articles['article'], 0, 60) . '... </p>';
    $contenu .= '<a col-md-3 href="' . $articles['link'] . '" class="card-title">' . $articles['link'] . '</a>';
    $contenu .= '<a href="blogArticle.php?action=art&id=' . $articles['id_article'] . '" class="btn btn-primary btn-block">Lire</a>';
    $contenu .= '</div>';
    // $contenu .= '<div class="card-footer text-muted">2 days ago</div>';
    $contenu .= '</div>';
}
$art = $req->fetch(PDO::FETCH_ASSOC);


//AFFICHAGE D'UN SEUL ARTICLE
// $art = $pdo->query("SELECT * FROM articles");

require_once "inc/header.inc.php";

if (isset($_GET['action']) && $_GET['action'] == "articles") {
    ?>
<!-- tous les articles -->
<div class="row">

    <?= $contenu; ?>

</div>
<?php
} elseif (isset($_GET['action']) && $_GET['action'] == 'art'  && isset($_GET['id']) && $_GET['id'] == $art['id_article']) {
    ?>
<!-- un article -->
<div class="container">
    <div class="row">
        <a href="blogArticle.php?action=articles" class="btn btn-primary mb-2 offset-10">Retour articles</a>
    </div>
    <div class="row">
        <div class="container">
            <h3 class=""><?php echo $art['title'] ?></h3>

            <p><?php echo $art['article'] ?></p>

        </div>
    </div>
</div>

<?php
}
?>

















<?php
require_once "inc/footer.inc.php";
?>