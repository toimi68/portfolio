<?php
include 'inc/header.inc.php';
require 'inc/init.inc.php';
require 'controller/traitement.php';
?>
<?php
if (empty($_GET['choix']) || $_GET['choix'] == 'home') {
    ?>
<!-- Zone présentation -->
    <section id="prez">
        <div class="container-fluid">
            <div class="container mt-5">
                <div class="row">
                    <div class="meny-arrow"></div>
                    <div class="contents">


                        <div class="col-lg-12 mt-5">
                            <div class="row">
                                <div class="col-md-4 mt-5">
                                    <img src="assets/photo/images.png" class="rounded-circle" alt="Responsive image">
                                </div>
                                <div class="col-md-8  mt-5">
                                    <h2>Alpha DIALLO</h2>
                                    <h3>Intégrateur <a href="admin/connexion.php">/</a> Développeur Web Junior</h3>
                                    <hr>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, id incidunt ipsam
                                        ipsa dicta quod, corrupti modi assumenda dolor, vitae libero inventore rerum quis
                                        distinctio ad? Repellendus alias neque vero.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php
} elseif (isset($_GET['choix']) && $_GET['choix'] == 'competence') {
    ?>
<!-- Zone competences -->
<section id="competence">
    <div class=container>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
echo $competence;
    ?>
                </div>
                <hr>
                <div class="row">
                    <?php
echo $msg;
    ?>
                    <div class="col-lg-12 mt-5">
                        <div class="row">
                            <?php
echo $projet;
    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
} elseif (isset($_GET['choix']) && $_GET['choix'] == 'experience') {
    ?>
<!-- Zone experiences -->
<section id="experience" class="timeline">
<?php echo $xp; ?>
</section>
<?php
} elseif (isset($_GET['choix']) && $_GET['choix'] == 'formation') {
    ?>
<!-- Zone formation -->
<section id="formation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-1">
                <div class="row">
                    <?php echo $diplome;?>
<!--                    <div class="col-lg-3">-->
<!--                        <div id="menuRotate">-->
<!--                            <dl class="Menu">-->
<!--                                <dt class="btnRot">Partager</dt>-->
<!--                                <dd><a href="#">...</a></dd>-->
<!--                                <dd><a href="#">Instagram</a></dd>-->
<!--                                <dd><a href="#">Twitter</a></dd>-->
<!--                                <dd><a href="#">Facebook</a></dd>-->
<!--                            </dl>-->
<!--                            <div class="masque"></div>-->
<!--                            <div class="ombre"></div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
<!--                <table class="table table-striped table-dark mt-5">-->
<!--                    <thead>-->
<!--                        <tr>-->
<!--                            <th scope="col">Années</th>-->
<!--                            <th scope="col">Diplôme</th>-->
<!--                            <th scope="col">Spécialité</th>-->
<!--                            <th scope="col">Description</th>-->
<!--                        </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                        --><?php //echo $diplome; ?>
<!--                    </tbody>-->
<!--                </table>-->
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 mt-1">
                <div class="row">
<!--                    --><?php //echo $langue;?>
<!--                    <div class="col-lg-3">-->
<!--                        <div class="card" id="card">-->
<!--                    <div class="face front"></div>-->
<!--                    <div class="face back">-->
<!--                        <a href="#"></a>-->
<!--                        <a href="#"></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
<!--                <table class="table table-striped table-dark mt-5">-->
<!--                    <thead>-->
<!--                        <tr>-->
<!--                            <th scope="col">Langue</th>-->
<!--                            <th scope="col">Niveau</th>-->
<!--                        </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                        --><?php //echo $langue; ?>
<!--                    </tbody>-->
<!--                </table>-->
            </div>
        </div>
    </div>
</section>
<?php
} elseif (isset($_GET['choix']) && $_GET['choix'] == 'contact') {
    ?>
<!-- Zone contact-->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mt-5">
                <form method="POST" >
                    <?php //debugV($_POST);?>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Prénom" name="prenom" value="<?php if (isset($prenom)){echo $prenom;}?>">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder="Nom" name="nom" value="<?php if (isset($nom)){echo $nom;}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col mt-3">
                            <input type="text" class="form-control" placeholder="Email@gmail.com" name="email" value="<?php if (isset($email)){echo $email;}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col mt-3">
                            <textarea name="message" id="" cols="97" rows="10" value="<?php if (isset($message)){echo $message;}?>">
                            </textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block btn-outline-info mt-4 " value="Envoyer">
                </form>
            </div>
        </div>
    </div>
</section>
<?php
}
require_once 'inc/footer.inc.php';
?>