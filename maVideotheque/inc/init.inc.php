<?php 
// conexion BDD
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=videotheque',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8',
        )
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());


}


/*//suppression :
if(isset($_GET['action'])&& $_GET['action'] == 'supp' && isset($_GET['id'])){

    $req= $pdo->query("DELETE FROM films WHERE id_film = :id_film", array(
        ':id_film' => $_GET['id']
    ));

    /*if($req->rowCount()==1){
        $msgAlert = '<div class="alert alert-success>L\'expérience n°' . $_GET['id'] . ' a bien été supprimée </div>';
    }else{
        $msgAlert ='<div class="alert alert-danger>La  suppression n\'a pu être faite</div>';
    }
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
}*/