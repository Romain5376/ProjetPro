<?php
$user = 'root';
$password = '';
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=gallery;charset=utf8', $user, $password, $pdo_options);
setlocale(LC_ALL, 'fr_FR.UTF-8');
?>
<!DOCTYPE html>
<html lang="fr" class="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Projet pro</title>
</head>

<body class="black">
    <div class="row" id="adminRow">
        <div class="col l12 m12 s12">
            <h1 class="center-align" id="adminTitle">Espace Admin</h1>
            <div class="row">
                <div class="col l6 offset-l3 m6 offset-m3 s12 center-align" id="paintinVisual">
                    <!--FirstCategory-->
                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 1');

                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <p class="center-align adminCategories"><?= $donnees['category_categories'] ?></p>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>

                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `paintin_files`,`dimension_dimensions`
                                                FROM `gallery_paintin`
                                                INNER JOIN gallery_category
                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                INNER JOIN gallery_dimension
                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                WHERE `gallery_category`.`category_id` = 1');
                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <div class="chip">
                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" />
                                Dimensions: <?= $donnees['dimension_dimensions'] ?>
                            </div>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>
                    <div class="row">
                        <!-- AddBtn -->
                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                            <a class="btn-floating btn-small waves-effect waves-light green accent-4 btn modal-trigger" href="#addBtnModal">
                                <i class="material-icons black-text">add</i>
                            </a>
                            <div id="addBtnModal" class="modal">
                                <div class="modal-content">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col l12 m12 s12 center-align">
                                                <input type="file" name="filesCategory1" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col l12 m12 s12 center-align">
                                                <div class="input-field col l6 offset-l3">
                                                    <select name="selectCategory1Dimension">
                                                        <option value="" disabled selected>Choisir une dimension</option>
                                                        <?php
                                                        try {
                                                            $reponse = $bdd->query('SELECT `dimension_dimensions`,`dimension_id`
                                                                                    FROM `gallery_dimension`');
                                                            // On affiche le resultat
                                                            while ($donnees = $reponse->fetch()) { ?>
                                                                <option value="<?= $donnees['dimension_id'] ?>"><?= $donnees['dimension_dimensions'] ?></option>
                                                        <?php
                                                            }
                                                            $reponse->closeCursor();
                                                        } catch (Exception $e) {
                                                            die('Erreur : ' . $e->getMessage());
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col l12 m12 s12 center-align">
                                                <a class="waves-effect waves-light btn-small"><i class="material-icons left" name="addBtnModal">check</i>Ajouter</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /AddBtn -->

                            <!-- ModifyBtn -->
                            <a class="btn-floating btn-small waves-effect waves-light yellow accent-4 btn modal-trigger" href="#mofidyBtnModal">
                                <i class="material-icons black-text">edit</i>
                            </a>
                            <div id="modifyBtnModal" class="modal">
                                <div class="modal-content">
                                    <form method="POST">

                                    </form>
                                </div>
                            </div>
                            <!-- /ModifyBtn -->

                            <!-- DeleteBtn -->
                            <a class="btn-floating btn-small waves-effect waves-light red btn modal-trigger" href="#deleteBtnModal">
                                <i class="material-icons black-text">remove</i>
                            </a>
                            <div id="deleteBtnModal" class="modal">
                                <div class="modal-content">
                                    <form method="POST">

                                    </form>
                                </div>
                            </div>
                            <!-- /DeleteBtn -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l6 offset-l3">
                            <hr class="adminHr" />
                        </div>
                    </div>

                    <!--/FirstCategory-->

                    <!--SecondCategory-->
                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 2');

                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <p class="center-align adminCategories"><?= $donnees['category_categories'] ?></p>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>

                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `paintin_files`,`dimension_dimensions`
                                                FROM `gallery_paintin`
                                                INNER JOIN gallery_category
                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                INNER JOIN gallery_dimension
                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                WHERE `gallery_category`.`category_id` = 2');
                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <div class="chip">
                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" />
                                Dimensions: <?= $donnees['dimension_dimensions'] ?>
                            </div>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>
                    <div class="row">
                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                            <a class="btn-floating btn-small waves-effect waves-light green accent-4">
                                <i class="material-icons black-text">add</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light yellow accent-4">
                                <i class="material-icons black-text">create</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light red">
                                <i class="material-icons black-text">remove</i>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l6 offset-l3">
                            <hr class="adminHr" />
                        </div>
                    </div>
                    <!--/SecondCategory-->

                    <!--ThirdCategory-->
                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 3');

                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <p class="center-align adminCategories"><?= $donnees['category_categories'] ?></p>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>

                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `paintin_files`,`dimension_dimensions`
                                                FROM `gallery_paintin`
                                                INNER JOIN gallery_category
                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                INNER JOIN gallery_dimension
                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                WHERE `gallery_category`.`category_id` = 3');
                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <div class="chip">
                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" />
                                Dimensions: <?= $donnees['dimension_dimensions'] ?>
                            </div>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>
                    <div class="row">
                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                            <a class="btn-floating btn-small waves-effect waves-light green accent-4">
                                <i class="material-icons black-text">add</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light yellow accent-4">
                                <i class="material-icons black-text">create</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light red">
                                <i class="material-icons black-text">remove</i>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l6 offset-l3">
                            <hr class="adminHr" />
                        </div>
                    </div>
                    <!--/ThirdCategory-->

                    <!--FourthCategory-->
                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 4');

                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <p class="center-align adminCategories"><?= $donnees['category_categories'] ?></p>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>

                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `paintin_files`,`dimension_dimensions`
                                                FROM `gallery_paintin`
                                                INNER JOIN gallery_category
                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                INNER JOIN gallery_dimension
                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                WHERE `gallery_category`.`category_id` = 4');
                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <div class="chip">
                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" />
                                Dimensions: <?= $donnees['dimension_dimensions'] ?>
                            </div>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>
                    <div class="row">
                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                            <a class="btn-floating btn-small waves-effect waves-light green accent-4">
                                <i class="material-icons black-text">add</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light yellow accent-4">
                                <i class="material-icons black-text">create</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light red">
                                <i class="material-icons black-text">remove</i>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l6 offset-l3">
                            <hr class="adminHr" />
                        </div>
                    </div>
                    <!--/FourthCategory-->

                    <!--FifthCategory-->
                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 5');

                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <p class="center-align adminCategories"><?= $donnees['category_categories'] ?></p>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>

                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `paintin_files`,`dimension_dimensions`
                                                FROM `gallery_paintin`
                                                INNER JOIN gallery_category
                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                INNER JOIN gallery_dimension
                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                WHERE `gallery_category`.`category_id` = 5');
                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <div class="chip">
                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" />
                                Dimensions: <?= $donnees['dimension_dimensions'] ?>
                            </div>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>
                    <div class="row">
                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                            <a class="btn-floating btn-small waves-effect waves-light green accent-4">
                                <i class="material-icons black-text">add</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light yellow accent-4">
                                <i class="material-icons black-text">create</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light red">
                                <i class="material-icons black-text">remove</i>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l6 offset-l3">
                            <hr class="adminHr" />
                        </div>
                    </div>
                    <!--/FifthCategory-->

                    <!--SixthCategory-->
                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `category_categories`
                                            FROM `gallery_category`
                                            WHERE `gallery_category`.`category_id` = 6');

                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <p class="center-align adminCategories"><?= $donnees['category_categories'] ?></p>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>

                    <?php
                    try {
                        $reponse = $bdd->query('SELECT `paintin_files`,`dimension_dimensions`
                                                FROM `gallery_paintin`
                                                INNER JOIN gallery_category
                                                ON `gallery_category`.`category_id` = `gallery_paintin`.category_id
                                                INNER JOIN gallery_dimension
                                                ON `gallery_paintin`.`dimension_id` = `gallery_dimension`.`dimension_id`
                                                WHERE `gallery_category`.`category_id` = 6');
                        // On affiche le resultat
                        while ($donnees = $reponse->fetch()) { ?>
                            <div class="chip">
                                <img src="<?= $donnees['paintin_files'] ?>" alt="Un tableau" />
                                Dimensions: <?= $donnees['dimension_dimensions'] ?>
                            </div>
                    <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>
                    <div class="row">
                        <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                            <a class="btn-floating btn-small waves-effect waves-light green accent-4">
                                <i class="material-icons black-text">add</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light yellow accent-4">
                                <i class="material-icons black-text">create</i>
                            </a>
                            <a class="btn-floating btn-small waves-effect waves-light red">
                                <i class="material-icons black-text">remove</i>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l6 offset-l3">
                            <hr class="adminHr" />
                        </div>
                    </div>
                    <!--/SixthCategory-->
                </div>
            </div>

            <div class="row center-align">
                <div class="col l12 m12 s12">
                    <a class="waves-effect waves-light btn blue-grey lighten-5 black-text" href="index.php">
                        <i class="material-icons left">home</i>Retour accueil
                    </a>
                    <a class="waves-effect waves-light btn red black-text">
                        <i class="material-icons left">power_settings_new</i>Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </div>







    <!--Script jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
    <script>
        $(document).ready(function() {
            $('.modal').modal();
        });
        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>

</body>

</html>