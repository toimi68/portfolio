<?php
require_once "inc/header.inc.php";

if (isset($_GET['action']) && $_GET['action'] == "articles") {
    ?>
<!-- tous les articles -->
<div class="row">
    <div class="card col-md-3 mb-2 p-0">
        <h5 class="card-header">Titre</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="blogArticle.php?action=art" class="btn btn-primary btn-block">Lire</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
</div>
<?php
} elseif (isset($_GET['action']) && $_GET['action'] == 'art') {
    ?>
<!-- un article -->
<div class="container">
    <div class="row">
        <a href="blogArticle.php?action=articles" class="btn btn-primary mb-2 offset-10">Retour articles</a>
    </div>
    <div class="row">
        <div class="card offset-5">
            <div class="card-body">
                <h5> Title</h5>
            </div>
        </div>
    </div>
</div>

<?php
}
?>

















<?php
require_once "inc/footer.inc.php";
?>