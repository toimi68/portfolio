<?php
require_once "../inc/init.inc.php";





//suppression :
if(isset($_GET['action'])&& $_GET['action'] == 'supp' && isset($_GET['id'])){


    $req= $pdo->query("DELETE FROM films WHERE id_film = :id_film", array(
        ':id_film' => $_GET['id']
    ));

    /*if($req->rowCount()==1){
        $msgAlert = '<div class="alert alert-success>L\'expérience n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{
        $msgAlert ='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }*/
}

//récupération de des infos BDD
$req= $pdo->query("SELECT * FROM films");
//variable d'affichage
$movie = "";
while($movies = $req->fetch(PDO::FETCH_ASSOC)){

    $movie .= '<tr>';
    $movie .= '<th scope="row">'.$movies['genres'].'</th>';
    $movie .= '<td>'.$movies['titre'].'</td>';
    $movie .= '<td>'.$movies['annee'].'</td>';
    $movie .= '<td>'.$movies['realisateur'].'</td>';
    $movie .= '<td>'.$movies['acteurs'].'</td>';
    $movie .= '<td>'.$movies['resume'].'</td>';
    $movie .= '<td>'.$movies['note'].'</td>';
    $movie .= '<td><a href="form.php?action=update&id='.$movies['id_film'].'"><i class="far fa-edit text-warning fa-2x"></i></a></td>';
    $movie .= '<td><a href="liste.php?action=supp&id='.$movies['id_film'].'"><i class="far fa-trash-alt text-danger fa-2x"></i></a></td>';
    $movie .= '</tr>';
}

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
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
<main>
    <div class="container">

        <?php
//        echo  $msgAlert;
        ?>
        <table class="table table-stripped table-dark mt-5">
            <thead>
                <tr>
                    <th scope="col">Genres</th>
                    <th scope="col">Titre</th>
                    <th scope="col ">Année</th>
                    <th scope="col">Réalisateur</th>
                    <th scope="col">Acteur(s)</th>
                    <th scope="col ">Résumé</th>
                    <th scope="col ">Note</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            echo $movie;
            ?>
        </tbody>
    </table>

        <a href="form.php" class="offset-11"><i class="far fa-plus-square btn btn-outline-success fa-3x text-dark"></i></a>
</div>
<!--  -->


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
