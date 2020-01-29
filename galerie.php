<?php
$user = 'root';
$password = '';
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=gallery;charset=utf8', $user, $password, $pdo_options);
setlocale(LC_ALL, 'fr_FR.UTF-8');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Projet pro</title>
</head>

<body>
    <!--Base-------------------------------------->

    <div class="row" id="marginBottomRow">
        <div class="col l12" id="paddingCol">
            <!--Navbar-->
            <nav class="nav-extended black">
                <div class="nav-wrapper">
                    <a href="index.php" id="titleNav">Françoise Chouzenoux</a>
                </div>
                <div class="nav-content">
                    <ul class="tabs tabs-transparent">
                        <li class="tab"><a href="index.php">Accueil</a></li>
                        <li class="tab"><a href="galerie.php">Galerie</a></li>
                        <li class="tab"><a href="contact.php">Contact</a></li>
                        <a class="btn-floating btn waves-effect waves-light right" id="navButton" href="connection.php">
                            <i class="material-icons">account_circle</i>
                        </a>
                    </ul>
                </div>
            </nav>
            <!--/Navbar-->

            <!--First Themes-->
            <div class="container">
                <?php
                try {
                    $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 1');
                ?>

                    <div class="row">
                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                            <hr />
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <?php // On affiche le resultat
                            while ($donnees = $reponse->fetch()) { ?>
                                <p class="titleOfCategory center-align"><?= $donnees['category_categories'] ?></p>
                        <?php
                            }
                            $reponse->closeCursor();
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }
                        ?>
                        </div>
                    </div>
                    <!-- /Title -->


                    <div class="row">
                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                            <hr />
                        </div>
                    </div>

                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `paintin_files`,`dimension_dimensions`
                                                FROM `gallery_paintin`
                                                INNER JOIN gallery_category
                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                INNER JOIN gallery_dimension
                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                WHERE `gallery_category`.`category_id` = 1');
                    ?>
                        <!-- Card -->
                        <div class="row center-align">

                            <?php // On affiche le resultat
                            while ($donnees = $reponse->fetch()) { ?>
                                <div class="col l3 s12 margin">
                                    <div class="card small materialboxed z-depth-5">
                                        <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" class="paintinCardGalerie" />
                                    </div>
                                    <p class="center-align dimensionFont">Dimensions: <?= $donnees['dimension_dimensions'] ?></p>
                                </div>
                        <?php
                            }
                            $reponse->closeCursor();
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }
                        ?>

                        </div>
                        <!-- /Card -->

                        <div class="row">
                            <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                <hr />
                            </div>
                        </div>
                        <!--/First Themes-->

                        <!--Second Themes-->

                        <?php
                        try {
                            $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 2');
                        ?>
                            <!-- Title -->
                            <div class="row">
                                <div class="col l12 m12 s12">
                                    <?php // On affiche le resultat
                                    while ($donnees = $reponse->fetch()) { ?>
                                        <p class="titleOfCategory center-align"><?= $donnees['category_categories'] ?></p>
                                <?php
                                    }
                                    $reponse->closeCursor();
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }
                                ?>
                                </div>
                            </div>
                            <!-- /Title -->
                            <div class="row">
                                <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                    <hr />
                                </div>
                            </div>

                            <?php
                            try {
                                // On recupere les colonnes title, date, startTime, pictures de la table shows, la colonne genre de la table genres et la colonne type de la table showTypes
                                $reponse = $bdd->query('SELECT `paintin_files`,`category_categories`,dimension_dimensions
                                                        FROM `gallery_paintin`
                                                        INNER JOIN gallery_category
                                                        ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                        INNER JOIN gallery_dimension
                                                        ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                        WHERE `gallery_category`.`category_id` = 2');
                            ?>
                                <!-- Card -->

                                <div class="row center-align">

                                    <?php // On affiche le resultat
                                    while ($donnees = $reponse->fetch()) { ?>
                                        <div class="col l3 s12 margin">
                                            <div class="card small materialboxed z-depth-5">
                                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" class="paintinCardGalerie" />
                                            </div>
                                            <p class="center-align dimensionFont">Dimensions: <?= $donnees['dimension_dimensions'] ?></p>
                                        </div>
                                <?php
                                    }
                                    $reponse->closeCursor();
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }
                                ?>

                                </div>
                                <!-- /Card -->

                                <div class="row">
                                    <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                        <hr />
                                    </div>
                                </div>
                                <!--/Second Themes-->

                                <!--Third Themes-->

                                <?php
                                try {
                                    $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 3');
                                ?>
                                    <!-- Title -->
                                    <div class="row">
                                        <div class="col l12 m12 s12">
                                            <?php // On affiche le resultat
                                            while ($donnees = $reponse->fetch()) { ?>
                                                <p class="titleOfCategory center-align"><?= $donnees['category_categories'] ?></p>
                                        <?php
                                            }
                                            $reponse->closeCursor();
                                        } catch (Exception $e) {
                                            die('Erreur : ' . $e->getMessage());
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <!-- /Title -->
                                    <div class="row">
                                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                            <hr />
                                        </div>
                                    </div>

                                    <?php
                                    try {
                                        // On recupere les colonnes title, date, startTime, pictures de la table shows, la colonne genre de la table genres et la colonne type de la table showTypes
                                        $reponse = $bdd->query('SELECT `paintin_files`,`category_categories`,dimension_dimensions
                                                                FROM `gallery_paintin`
                                                                INNER JOIN gallery_category
                                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                                INNER JOIN gallery_dimension
                                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                                WHERE `gallery_category`.`category_id` = 3');
                                    ?>
                                        <!-- Card -->
                                        <div class="row">

                                            <?php // On affiche le resultat
                                            while ($donnees = $reponse->fetch()) { ?>
                                                <div class="col l3 s12 margin">
                                                    <div class="card small materialboxed z-depth-5">
                                                        <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" class="paintinCardGalerie">
                                                    </div>
                                                    <p class="center-align dimensionFont">Dimensions: <?= $donnees['dimension_dimensions'] ?></p>
                                                </div>
                                        <?php
                                            }
                                            $reponse->closeCursor();
                                        } catch (Exception $e) {
                                            die('Erreur : ' . $e->getMessage());
                                        }
                                        ?>
                                        </div>
                                        <!-- /Card -->

                                        <div class="row">
                                            <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                                <hr />
                                            </div>
                                        </div>
                                        <!--/Third Themes-->

                                        <!--Fourth Themes-->

                                        <?php
                                        try {
                                            $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 4');
                                        ?>
                                            <!-- Title -->
                                            <div class="row">
                                                <div class="col l12 m12 s12">
                                                    <?php // On affiche le resultat
                                                    while ($donnees = $reponse->fetch()) { ?>
                                                        <p class="titleOfCategory center-align"><?= $donnees['category_categories'] ?></p>
                                                <?php
                                                    }
                                                    $reponse->closeCursor();
                                                } catch (Exception $e) {
                                                    die('Erreur : ' . $e->getMessage());
                                                }
                                                ?>
                                                </div>
                                            </div>
                                            <!-- /Title -->
                                            <div class="row">
                                                <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                                    <hr />
                                                </div>
                                            </div>

                                            <?php

                                            try {

                                                // On recupere les colonnes title, date, startTime, pictures de la table shows, la colonne genre de la table genres et la colonne type de la table showTypes
                                                $reponse = $bdd->query('SELECT `paintin_files`,`category_categories`,`dimension_dimensions`
                                                                        FROM `gallery_paintin`
                                                                        INNER JOIN gallery_category
                                                                        ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                                        INNER JOIN gallery_dimension
                                                                        ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                                        WHERE `gallery_category`.`category_id` = 4');
                                            ?>
                                                <!-- Card -->
                                                <div class="row center-align">

                                                    <?php // On affiche le resultat
                                                    while ($donnees = $reponse->fetch()) { ?>
                                                        <div class="col l3 s12 margin">
                                                            <div class="card small materialboxed z-depth-5">
                                                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" class="paintinCardGalerie" />
                                                            </div>
                                                            <p class="center-align dimensionFont">Dimensions: <?= $donnees['dimension_dimensions'] ?></p>
                                                        </div>
                                                <?php
                                                    }
                                                    $reponse->closeCursor();
                                                } catch (Exception $e) {
                                                    die('Erreur : ' . $e->getMessage());
                                                }
                                                ?>

                                                </div>
                                                <!-- /Card -->
                                                <div class="row">
                                                    <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                                        <hr />
                                                    </div>
                                                </div>
                                                <!--/Fourth Themes-->

                                                <!--Fifth Themes-->

                                                <?php
                                                try {
                                                    $reponse = $bdd->query('SELECT `category_categories`
                                                                            FROM `gallery_category`
                                                                            WHERE `gallery_category`.`category_id` = 5');
                                                ?>
                                                    <!-- Title -->
                                                    <div class="row">
                                                        <div class="col l12 m12 s12">
                                                            <?php // On affiche le resultat
                                                            while ($donnees = $reponse->fetch()) { ?>
                                                                <p class="titleOfCategory center-align"><?= $donnees['category_categories'] ?></p>
                                                        <?php
                                                            }
                                                            $reponse->closeCursor();
                                                        } catch (Exception $e) {
                                                            die('Erreur : ' . $e->getMessage());
                                                        }
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <!-- /Title -->
                                                    <div class="row">
                                                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                                            <hr />
                                                        </div>
                                                    </div>

                                                    <?php

                                                    try {

                                                        // On recupere les colonnes title, date, startTime, pictures de la table shows, la colonne genre de la table genres et la colonne type de la table showTypes
                                                        $reponse = $bdd->query('SELECT `paintin_files`,`category_categories`,`dimension_dimensions`
                                                                                FROM `gallery_paintin`
                                                                                INNER JOIN gallery_category
                                                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                                                INNER JOIN gallery_dimension
                                                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                                                WHERE `gallery_category`.`category_id` = 5');
                                                    ?>
                                                        <!-- Card -->
                                                        <div class="row center-align">

                                                            <?php // On affiche le resultat
                                                            while ($donnees = $reponse->fetch()) { ?>
                                                                <div class="col l3 s12 margin">
                                                                    <div class="card small materialboxed z-depth-5">
                                                                        <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" class="paintinCardGalerie" />
                                                                    </div>
                                                                    <p class="center-align dimensionFont">Dimensions: <?= $donnees['dimension_dimensions'] ?></p>
                                                                </div>
                                                        <?php
                                                            }
                                                            $reponse->closeCursor();
                                                        } catch (Exception $e) {
                                                            die('Erreur : ' . $e->getMessage());
                                                        }
                                                        ?>

                                                        </div>
                                                        <!-- /Card -->

                                                        <div class="row">
                                                            <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                                                <hr />
                                                            </div>
                                                        </div>
                                                        <!--/Fifth Themes-->

                                                        <!--Sixth Themes-->

                                                        <?php
                                                        try {
                                                            $reponse = $bdd->query('SELECT `category_categories`
                                                                                    FROM `gallery_category`
                                                                                    WHERE `gallery_category`.`category_id` = 6');
                                                        ?>
                                                            <!-- Title -->
                                                            <div class="row">
                                                                <div class="col l12 m12 s12">
                                                                    <?php // On affiche le resultat
                                                                    while ($donnees = $reponse->fetch()) { ?>
                                                                        <p class="titleOfCategory center-align"><?= $donnees['category_categories'] ?></p>
                                                                <?php
                                                                    }
                                                                    $reponse->closeCursor();
                                                                } catch (Exception $e) {
                                                                    die('Erreur : ' . $e->getMessage());
                                                                }
                                                                ?>
                                                                </div>
                                                            </div>
                                                            <!-- /Title -->
                                                            <div class="row">
                                                                <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                                                    <hr />
                                                                </div>
                                                            </div>

                                                            <?php

                                                            try {

                                                                // On recupere les colonnes title, date, startTime, pictures de la table shows, la colonne genre de la table genres et la colonne type de la table showTypes
                                                                $reponse = $bdd->query('SELECT `paintin_files`,`category_categories`,`dimension_dimensions`
                                                                                        FROM `gallery_paintin`
                                                                                        INNER JOIN gallery_category
                                                                                        ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                                                        INNER JOIN gallery_dimension
                                                                                        ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                                                        WHERE `gallery_category`.`category_id` = 6');
                                                            ?>
                                                                <!-- Card -->
                                                                <div class="row center-align">

                                                                    <?php // On affiche le resultat
                                                                    while ($donnees = $reponse->fetch()) { ?>
                                                                        <div class="col l3 s12 margin">
                                                                            <div class="card small materialboxed z-depth-5">
                                                                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" class="paintinCardGalerie" />
                                                                            </div>
                                                                            <p class="center-align dimensionFont">Dimensions: <?= $donnees['dimension_dimensions'] ?></p>
                                                                        </div>
                                                                <?php
                                                                    }
                                                                    $reponse->closeCursor();
                                                                } catch (Exception $e) {
                                                                    die('Erreur : ' . $e->getMessage());
                                                                }
                                                                ?>

                                                                </div>
                                                                <!-- /Card -->
                                                                <div class="row">
                                                                    <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                                <!--/Sixth Themes-->
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
        });
        $(document).ready(function() {
            $('.sidenav').sidenav();
        });
    </script>


</body>

</html>