<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Projet pro</title>
</head>
<body>

    <div class="row" id="marginBottomRow">
        <div class="col l12 m12 s12" id="paddingCol">

            <!--Navbar-->
            <nav class="nav-extended white">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo" id="titleNav">My Little Gallery</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="black-text linkNav" href="index.php">Accueil</a></li>
                        <li><a class="black-text linkNav" href="Views/gallery.php">Galerie</a></li>
                    </ul>
                </div>
            </nav>
            <!--/Navbar-->

            <ul class="sidenav" id="mobile-demo">
                <li><a class="linkNav" href="index.php">Accueil</a></li>
                <li><a class="linkNav" href="gallery.php">Galerie</a></li>
            </ul>
            <!--/Navbar-->

            
            <div class="container">
                <div class="row center-align">

                    <div class="row center-align marginTop" id="presentationCardsRow">
                        <div class="col l12 col m12 col s12 center-align">
                            <!--Card-->
                            <div class="col l3 col m6 col s12">
                                <div class="card-panel black">
                                    <p class="fontFamilyCvTitle">Formation</p>
                                    <p class="white-text contentCvCard">- Ecole d'art du Bourny à Laval: initiation à l'aquarelle. <br />
                                        - Ecole d'art de Laval : dessin, pastel, peinture à l'huile et modèle vivant.
                                    </p>
                                </div>
                            </div>
                            <!--/Card-->

                            <!--Card-->
                            <div class="col l3 col m6 col s12">
                                <div class="card-panel" id="picturePresentation">
                                    <div class="card-image"></div>
                                </div>
                            </div>
                            <!--/Card-->

                            <!--Card-->
                            <div class="col l3 col m6 col s12">
                                <div class="card-panel">
                                    <p class="fontFamilyCvTitle black-text">Exposition</p>
                                    <p class="contentCvCard">- Exposition au théâtre de Laval en 2009 <br />
                                        - Exposition école de la Perrine à Laval en Novembre et Décembre 2013 <br />
                                        - Exposition école de la Perrine à Laval en Novembre et Décembre 2014 <br />
                                        - Exposition au musée de la Scoman en 2014 <br />
                                        - Exposition à Mettmann (Allemagne) en 2015 <br />
                                        - Exposition à Morsiglia (Corse) en 2015 et 2017 <br />
                                        - Exposition à Codrimoge à Château-Gontier(Mayenne) en 2017
                                    </p>
                                </div>
                            </div>
                            <!--/Card-->

                            <!--Card-->
                            <div class="col l3 col m6 col s12">
                                <div class="card-panel black">
                                    <p class="fontFamilyCvTitle">Projet(s)</p>
                                    <p class="white-text contentCvCard">- Exposante en Avril 2020 au festival du premier roman à Laval (Mayenne)</p>
                                </div>
                            </div>
                            <!--/Card-->
                        </div>
                    </div>

                    <blockquote class="center-align">
                        <p>
                            <i class="fas fa-quote-left"></i>
                            Artiste autodidacte, ma peinture est le reflet d'un travail solitaire qui doit être inspiré sinon le chemin est difficile.<br />
                            Ces réalisations génèrent curiosité et humilité par rapport à ma propre création.
                            <i class="fas fa-quote-right"></i>
                        </p>
                        <footer>- Françoise Chouzenoux</footer>
                    </blockquote>

                </div>
            </div>

            <!-- Footer -->
            <footer class="page-footer white">
                <div class="footer-copyright">
                    <div class="container center-align black-text">© 2019-2020 Copyright Marcadet Romain</div>
                </div>
            </footer>
            <!--/Footer-->

        </div>
    </div>
    <!--Script jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
        });
    </script>

</body>

</html>