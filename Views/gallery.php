<?php
require_once '../Controllers/galleryCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Projet pro</title>
</head>
<body>
    <div class="row" id="marginBottomRow">
        <div class="col l12" id="paddingCol">
            <!--Navbar-->
            <nav class="nav-extended white">
                <div class="nav-wrapper">
                    <a href="../index.php" class="brand-logo" id="titleNav">My Little Gallery</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="black-text linkNav" href="../index.php">Accueil</a></li>
                        <li><a class="black-text linkNav" href="gallery.php">Galerie</a></li>
                    </ul>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="gallery.php">Galerie</a></li>
            </ul>
            <!--/Navbar-->

            <div class="container">
                <div class="row marginTop center-align">
                    <?php
                    foreach ($resultCategory as $valueCategories) {
                    ?>
                        <div class="col l12 col m12 col s12 marginTop">
                            <p class="titleOfCategory center-align titleFrame"><?= $valueCategories['category_categories'] ?></p>
                        </div>
                        <?php
                        $arrayCategories = $paintin->selectPaintinByCategory($valueCategories['category_id']);
                        foreach ($arrayCategories as $valuePaintins) {
                        ?>
                            <div class="col l3 col m6 col s10 offset-s1">
                                <div class="card small materialboxed z-depth-5">
                                    <img src="<?= $valuePaintins['paintin_files'] ?>" alt="Tableau de Françoise Chouzenoux" class="paintinCardGalerie" />
                                </div>
                                <p class="center-align dimensionFont">Dimensions: <?= $valuePaintins['dimension_dimensions'] ?></p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Footer -->
            <footer>
                <div class="footer-copyright black">
                    <div class="container center-align white-text">© 2019-2020 Copyright Marcadet Romain</div>
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
            $('.materialboxed').materialbox();
            $('.sidenav').sidenav();
        });
    </script>
</body>
</html>