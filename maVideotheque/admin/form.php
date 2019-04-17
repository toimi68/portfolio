<?php 
require_once "../inc/init.inc.php";

//gestion selecteur date

$select_date = '';
$years  = date('Y');
$century = $years - 100;

/*if(isset($_GET['action']) && $_GET['action'] == 'update' && $_GET['id']){
    $req = $pdo->prepare("SELECT * FROM films WHERE id_film = :id_film");
    $req->bindParam(':id_film', $_GET['id']);
    $req->execute();

    
    $movie_update = $req->fetch(PDO::FETCH_ASSOC);
}


while ($years >= $century) {
    $select_date .= '<option selected>' . $years . '</option>';
    $years--;
}*/

//vérification du formulaire 
echo '<pre>';
var_dump($_POST);
echo '</pre>';

$msg = "";
$success ="";

if ($_POST) {
    // if (!isset($_POST['genres']) || $_POST['genres'] == "") {
    //     $msg .= '<div class="alert alert-warning text-danger">Sélectionnez un genre.</div>';
    // }
    if (!isset($_POST['titre']) || strlen($_POST['titre']) < 1 || strlen($_POST['titre']) > 30) {
        $msg .= '<div class="alert alert-warning text-danger">Saisissez le titre du film (30 caractères max).</div>';
    }
    if (!isset($_POST['realisateur']) || strlen($_POST['realisateur']) < 3 || strlen($_POST['realisateur']) > 50) {
        $msg .= '<div class="alert alert-warning text-danger">Saisissez le nom du réalisateur (50 caractères max).</div>';
    }
    if (!isset($_POST['acteurs']) || strlen($_POST['acteurs']) < 3 || strlen($_POST['acteurs']) > 150) {
        $msg .= '<div class="alert alert-warning text-danger">Saisissez le nom du  ou des acteur(s).</div>';
    }
    if (!isset($_POST['resume']) || strlen($_POST['resume']) < 3 || strlen($_POST['resume']) > 300) {
        $msg .= '<div class="alert alert-warning text-danger">Saisissez le résumé du film.(300 caractère max)</div>';
    }
    if (!isset($_POST['genres']) || $_POST['genres'] == '') {
        $msg .= '<div class="alert alert-warning text-danger">Selectionnez le genre du film.</div>';
    }
    if (!isset($_POST['note']) || $_POST['note'] == '' || strlen($_POST['note']) < 1 || strlen($_POST['note']) > 6) {
        $msg .= '<div class="alert alert-warning text-danger">Donnez une note.</div>';
    }

    // insertion en BDD
    if (empty($msg)) {

        //protection contre les injections
        foreach ($_POST as $indices => $valeurs) {
            $_POST[$indices] = htmlspecialchars($valeurs, ENT_QUOTES);
        } //FIN foreach ($_POST as $indices => $valeurs)

        //enregistrement en BDD
        $donnees = $pdo->prepare("REPLACE INTO films VALUES (:id_film, :genres, :titre, :realisateur, :acteurs, :resume, :note, :annee)", array(
            ':id_film' => $_POST['id_film'],
            ':genres' => $_POST['genres'],
            ':titre' => $_POST['titre'],
            ':realisateur' => $_POST['realisateur'],
            ':acteurs' => $_POST['acteurs'],
            ':resume' => $_POST['resume'],
            ':note' => $_POST['note'],
            ':annee' => $_POST['annee']
        ));
        $donnees->bindParam(':id_film', $_POST['id_film']);
        $donnees->bindParam(':genres', $_POST['genres']);
        $donnees->bindParam(':titre', $_POST['titre']);
        $donnees->bindParam(':realisateur', $_POST['realisateur']);
        $donnees->bindParam(':acteurs', $_POST['acteurs']);
        $donnees->bindParam(':resume', $_POST['resume']);
        $donnees->bindParam(':note', $_POST['note']);
        $donnees->bindParam(':annee', $_POST['annee']);
        
        $donnees->execute();

        $success .= '<div class="alert alert-success fa-2x">L\'enregistrement c\'est bien passé</div>';
    } //FIN if (empty($msg))
} //FIN if ($_POST)

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--BS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS PERSO -->
    <link rel="stylesheet" href="css/style.css">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Vidéothèque</title>
</head>

<body>


    <!--  -->
    <main>
        <div class="container mt-5">
            <form class="my-5" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="text" name="id_film">
                </div>
                <?php 
                echo $msg; 
                echo $success;
                ?>
                <div class="form-group ">
                    <select class="form-control" name="genres">
                        <option value="<?php echo $movie_update['genres'] ?? $_POST['genres'] ?? '-- Sélectionnez un genre --'?>"><?php echo $movie_update['genres'] ?? $_POST['genres'] ?? '-- Sélectionnez un genre --'?></option>
                        <option value="policier">Policier</option>
                        <option value="suspense">Suspense</option>
                        <option value="drama">Drame</option>
                        <option value="comedie">Comédie</option>
                        <option value="action">Action</option>
                        <option value="fantastique">Fantastique</option>
                        <option value="sf">science-fiction</option>
                        <option value="horreur">Horreur</option>
                        <option value="biopic">Biopic</option>
                        <option value="animation">Animation</option>
                    </select>
                </div>
                <div class="row">
                    <div></div>
                    <div class="col">
                        <input type="text" name="titre" class="form-control" placeholder="Titre du film"
                            value="<?php echo $movie_update['titre'] ?? $_POST['titre'] ?? ''?>">
                    </div>
                    <div class="col">
                        <select class="form-control" name="annee">
                            <option value="<?php echo $select_date;?>"><?php echo $select_date;?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="realisateur"
                        value="<?php echo $movie_update['realisateur'] ?? $_POST['realisateur'] ?? ''?>"
                        placeholder="Nom du réalisateur">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="acteurs" value="<?php echo $movie_update['acteurs'] ?? $_POST['acteurs'] ?? ''?>" placeholder="Nom du / des acteur(s)">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="resume" rows="3" value="<?php echo $movie_update['resume'] ?? $_POST['resume'] ?? ''?>" placeholder="résumé...">"<?php echo $movie_update['resume'] ?? $_POST['resume'] ?? 'résumé...'?></textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" name="note">
                        <option value="<?php echo $movie_update['note'] ?? $_POST['note'] ?? '-- notez le film --'?>"><?php echo $movie_update['note'] ?? $_POST['note'] ?? '-- notez le film --'?></option>
                        <option>1</option>
                        <option>2</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-outline-primary">Enregistrez</button>
            </form>

        </div>
    </main>

    </div> <!-- JS BS CDN -->
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