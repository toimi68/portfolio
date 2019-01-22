<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS de Bootstrap en 1er -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <!-- CSS perso en  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <title>Back office</title>
</head>

<body>
    <div class="container-fluid">
        <header>
            <nav class="nav nav-pills flex-column flex-sm-row mb-5">
                <a class="flex-sm-fill text-sm-center nav-link btn-outline-info text-dark" href="?gestion=competence">Gestion
                    des competences</a>
                <!-- <a class="flex-sm-fill text-sm-center nav-link btn-outline-info text-dark" href="?gestion=projet">Gestion
                    des projets</a> -->
                <a class="flex-sm-fill text-sm-center nav-link btn-outline-info text-dark" href="?gestion=experience">Gestion
                    des experiences</a>
                <a class="flex-sm-fill text-sm-center nav-link btn-outline-info text-dark" href="?gestion=formation">Gestion
                    des
                    formations</a>
                <!-- <input type="submit" value="Deconnexion" class=" btn btn-outline-dark text-danger"> -->
                <a href="?action=quitter" class=" btn btn-outline-dark text-danger">Deconnexion</a>
            </nav>
        </header>
        <main>