<?php  ?>
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
    <div class="container-fluid">
        <header>
            <h1 class="pt-5">Ma vidéothèque</h1>
        </header>
        <nav class="navbar navbar-expand-lg navbar-secondary  navbar-toggler- ">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fas fa-home fa-2x text-secondary"></i> <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?genre.php&choix=policier">Policier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?genre.php&choix=drame">Drame</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?genre.php&&choix=">Comedie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?genre.php&choix=action">Action</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?genre.php&choix=fantastique">Fantastique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?genre.php&choix=sf">Science-fiction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?genre.php&choix=horreur">Horreur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="genre.php&choix=biopic">Biopic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?genre.php&choix=animation">Animation</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Tapez un titre" aria-label="Search">
                <button class="btn btn-outline-secondary my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </nav>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mt-5">
                        <div class="card">
                            <img src="img/apocalypse.jpg" class="card-img-top" alt="apolcalypse now">
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </main>
    <footer>
        <span>&copy; - 2019</span>
    </footer>

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