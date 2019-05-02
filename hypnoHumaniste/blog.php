<?php
require_once "inc/init.inc.php";
$contenu = "";
$req = $pdo->query("SELECT * FROM articles ORDER BY id_article DESC LIMIT 10 ");

while ($articles = $req->fetch(PDO::FETCH_ASSOC)) {
    $contenu .= '<div class="card col-md-5 m-2 p-0">';
    $contenu .= '<h5 class="card-header">' . $articles['title'] . '></h5>';
    $contenu .= '<div class="card-body">';
    $contenu .= '<p class="card-text">' . substr($articles['article'], 0, 60) . '... </p>';
    $contenu .= '<a col-md-3 href="' . $articles['link'] . '" class="card-title">' . $articles['link'] . '</a>';
    $contenu .= '<a href="blogArticle.php?action=art&id=' . $articles['id_article'] . '"class="btn btn-primary btn-block">Lire</a>';
    $contenu .= '</div>';
    // $contenu .= '<div class="card-footer text-muted">2 days ago</div>';
    $contenu .= '</div>';
}

require_once "inc/header.inc.php";
?>

<div class="row">
    <?= $contenu; ?>
</div>
</div>
<div class="row">
    <div class="col-md-3 offset-10 mb-2">
        <a href="blogArticle.php?action=articles&id=<?= $articles['id_article'] ?>" class="btn btn-info">Voir plus
            d'articles</a>
    </div>
</div>

<?php
require_once "inc/footer.inc.php";
?>