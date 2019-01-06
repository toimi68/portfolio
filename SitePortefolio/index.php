<?php
include 'inc/header.inc.php';
require 'inc/init.inc.php';
require 'controller/traitement.php';
?>
            <?php
            if(empty($_GET['choix']) || $_GET['choix'] == 'home'){ 
            ?>
            <!-- Zone présentation -->
            <section id="prez">
                <div class="container-fluid">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-lg-12 mt-5">
                                <div class="row">
                                    <div class="col-md-4 mt-5">
                                        <img src="assets/photo/avatar.jpg" class="rounded-circle" alt="Responsive image">
                                    </div>
                                    <div class="col-md-8  mt-5">
                                        <h2>Alpha DIALLO</h2>
                                        <h3>Intégrateur / Développeur Web Junior</h3>
                                        <hr>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, id incidunt ipsam ipsa dicta quod, corrupti modi assumenda dolor, vitae libero inventore rerum quis distinctio ad? Repellendus alias neque vero.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            <?php
            }elseif(isset($_GET['choix']) && $_GET['choix'] == 'competence') { 
            ?>
                <!-- Zone competences -->
                <section id="competence">
                    <div class=container-fluid>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <!-- <div class="col-md-3 mt-5">
                                        <div class="card mt-5 shadow-sm">
                                            <i class="fab fa-html5"></i>
                                            <div class="card-body">
                                                <p>HTML5</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <?php 
                                    echo $languages;
                                    ?>
                                </div>
                                <hr>
                                <div class="row">
                                    <h2>Mon travail :</h2>
                                    <div class="col-lg-12 mt-5">
                                        <div class="col-lg-4">
                                            <img class="rounded-circle" src=" {{ project.pjlink }} " alt="Generic placeholder image" width="140" height="140">
                                            <h2> {{project.pjtitle}} </h2>
                                            <p><a class="btn btn-secondary" href=" {{project.pjlink}} " role="button">Visiter &raquo;</a></p>
                                        </div><!-- /.col-lg-4 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                }elseif(isset($_GET['choix']) && $_GET['choix'] == 'experience'){ 
                ?>
                <!-- Zone experiences -->
                <section id="experience">
                    <div class="contenair-fluid">
                        <div class="row">
                            <div class="col mt-5">
                                <table class="table table-striped table-dark mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">Années</th>
                                            <th scope="col">Fonction</th>
                                            <th scope="col">Entreprise</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"> </th> 
                                            <td> {{xp.xpfunction}}</td>
                                            <td> {{xp.xpemployer}}</td>
                                            <td> {{xp.xpresume}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                </section>
                <?php
                }elseif(isset($_GET['choix']) && $_GET['choix'] == 'formation'){ 
                ?>
                <!-- Zone formation -->
                <section id="formation">
                    <div class="row">
                        <div class="col-lg-12 mt-5">
                            <table class="table table-striped table-dark mt-5">
                                <thead>
                                    <tr>
                                        <th scope="col">Années</th>
                                        <th scope="col">Diplôme</th>
                                        <th scope="col">Spécialité</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"> {{schooling.sgdate}} </th>
                                        <td> {{schooling.sgtitle}} </td>
                                        <td>{{schooling.sgsubtitle}} </td>
                                        <td>{{schooling.sgdescription}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12 mt-4">
                            <table class="table table-striped table-dark mt-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">Langue</th>
                                            <th scope="col">Niveau</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"> {{language.lglanguage}} </th>
                                            <td>
                                                <span class="text-info">Débutant</span>
                                                <span class="text-info">Intermédiaire</span>
                                                <span class="text-info">Avancé</span>
                                                <span class="text-info">Expert</span> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </section>
                <?php
                }elseif(isset($_GET['choix']) && $_GET['choix'] == 'contact'){ 
                ?>
                <!-- Zone contact -->
                <section id="contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mt-5">
                                <form>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="First name">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col mt-3">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col mt-3">
                                            <textarea name="" id="" cols="74" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
<?php
}
require_once 'inc/footer.inc.php';
?>