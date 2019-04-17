<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- La fonction bloginfo() affiche des informations concernant le site, ici le charset du site-->

    <title><?php bloginfo('name'); ?></title>
    <!-- affiche le nom du site définie dans le BO > réglages>général>titre du site -->

    <!-- Lien vers CSS de bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS du theme  -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
    <!-- la fonction affiche le chemin du dossier du theme actif dans lequel on est, ici eprojet  -->

    <?php wp_head(); ?>
    <!-- Permet d'afficher la barre d'administration quand on est connecté. Permet aussi de créer les balise <link> et script des liens inclus à partir du fichier functions.php-->
</head>

<body <?php body_class(); ?>>
    <!-- affiche les classses du body propres à WP -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="row" style="width:100%;">

                    <div class="navbar-brand col-lg-3">

                        <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                        <!-- affiche l'url principal du site définie dans BO>réglages>général>url -->
                    </div><!-- /.navbar-brand col-lg-3 -->

                    <p class="texte-description col-lg-9">
                        <?php bloginfo('description'); ?>
                    </p><!-- /affiche le slogan du site défini dans BO>réglages>général>slogan -->

                    <div class="col-lg-12">
                        <!-- Menu de navigation à venir -->
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary', // correspond à l'id de la zone de menu déclaré dans functions.php
                            'menu_class' => 'navbar-nav', // on ajoute une class de bootstrap
                        ));
                        ?>
                    </div>

                </div><!-- /.row -->

            </div><!-- /.container -->
        </nav>
    </header>

    <!-- entête de la page d'accueil -->
    <?php if (is_front_page()) : // si on est sur la page d'accueil
        ?>

    <div id="entete" class="align-items-center">
        <div class="container">
            <?php dynamic_sidebar('region-entete'); ?>
        </div>
    </div>

    <?php
endif;
?>

    <section class="container">
        <div class="row">

            <!-- ici vient le contenu spécifique à la page -->