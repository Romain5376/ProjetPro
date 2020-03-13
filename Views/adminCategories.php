<?php
require_once '../Controllers/adminCategoriesCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Projet pro</title>
</head>

<body class="black">

    <div class="row" id="adminRow">
        <div class="col l12 m12 s12">
            <h1 class="center-align adminTitle">Espace Admin</h1>
            <h2 class="adminTitle">Les catégories</h2>
            <div class="container">
                <div class="row center-align">
                    <div class="col l6 offset-l3 col m12 col s12">
                        <!--Bouton ajout catégories-->
                        <a class="waves-effect waves-light btn cyan lighten-1 modal-trigger black-text" href="#addCategoryModal"><i class="material-icons left">add_circle_outline</i>Nouvelle catégorie</a>
                        <!--/Bouton ajout catégories-->

                        <!--Modal Ajout catégories-->
                        <div id="addCategoryModal" class="modal bottom-sheet <?= isset($_POST['create']) && $modalError ? 'autoOpenModal' : '' ?>">
                            <form action='' method="POST">
                                <div class="modal-header">
                                    <h2 class="modalTitle">Ajout Catégorie</h2>
                                </div>
                                <div class="modal-content col l6 offset-l3">
                                    <div class="input-field col l6 offset-l3 col m12 col s6">
                                        <i class="material-icons prefix">featured_play_list</i>
                                        <input id="category" type="text" class="validate" name="inputAddCategory" />
                                        <label for="category">Ex: Lever de rideau</label>
                                        <?php
                                        if (empty($_POST['inputAddCategory'])) {
                                        ?>
                                            <span class="red-text"><?= isset($arrayErrorAddModal['categoryEmpty']) ? $arrayErrorAddModal['categoryEmpty'] : '' ?></span>
                                        <?php
                                        }
                                        if (isset($_POST['inputAddCategory'])) {
                                        ?>
                                            <span class="red-text"><?= isset($arrayErrorAddModal['category']) ? $arrayErrorAddModal['category'] : '' ?></span>
                                            <span class="red-text"><?= isset($arrayErrorAddModal['categoryExist']) ? $arrayErrorAddModal['categoryExist'] : '' ?></span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer col l6 offset-l3 center-align">
                                    <button class="btn waves-effect waves-light light-blue accent-4" type="submit" name="create" value="tt">Ajouter la catégorie
                                        <i class="material-icons left">check</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--/Modal Ajout catégories-->

                        <table class="highlight marginTop">
                            <thead>
                                <tr>
                                    <th class="center-align">Catégories</th>
                                    <th class="center-align">Total tableau</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($resultCategory as $valueCategory) {
                                    $arrayCategories = $paintin->selectPaintinByCategory($valueCategory['category_id']); //Affichage des tableaux en fonction de l'id de la catégorie
                                ?>
                                    <tr>
                                        <td class="center-align"><?= $valueCategory['category_categories'] ?></td>
                                        <td class="center-align"><?= count($arrayCategories) ?> tableau(x)</td>
                                        <td class="center-align">
                                            <!--Bouton Modifier-->
                                            <a class="btn btn waves-effect waves-light green accent-2 modal-trigger black-text" href="#modifyCategoryModal<?= $valueCategory['category_id'] ?>"><i class="material-icons">edit</i></a>
                                            <!--/Bouton Modifier-->

                                            <!--Modal Modification-->
                                            <div id="modifyCategoryModal<?= $valueCategory['category_id'] ?>" class="modal bottom-sheet <?= isset($_POST['update']) && $modalError && $valueCategory['category_id'] == $_POST['update'] ? 'autoOpenModal' : '' ?>">
                                                <form action='' method="POST">
                                                    <div class="modal-header">
                                                        <h2 class="modalTitle black-text center-align">Modification Catégorie</h2>
                                                    </div>
                                                    <div class="modal-content col l6 offset-l3">
                                                        <div class="input-field col l6 offset-l3 col m12 col s6">
                                                            <i class="material-icons prefix">featured_play_list</i>
                                                            <input id="category" type="text" class="validate" name="inputUpdateCategory" value="<?= $valueCategory['category_categories'] ?>" />
                                                            <label for="category">Ex: Lever de rideau</label>
                                                            <?php
                                                            if (empty($_POST['inputUpdateCategory'])) {
                                                            ?>
                                                                <span class="red-text"><?= isset($arrayErrorUpdateModal['categoryEmpty']) ? $arrayErrorUpdateModal['categoryEmpty'] : '' ?></span>
                                                            <?php
                                                            }
                                                            if (isset($_POST['inputUpdateCategory'])) {
                                                            ?>
                                                                <span class="red-text"><?= isset($arrayErrorUpdateModal['category']) ? $arrayErrorUpdateModal['category'] : '' ?></span>
                                                                <span class="red-text"><?= isset($arrayErrorUpdateModal['categoryExist']) ? $arrayErrorUpdateModal['categoryExist'] : '' ?></span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer col l6 offset-l3 center-align">
                                                        <button class="btn waves-effect waves-light light-blue accent-4" type="submit" name="update" value="<?= $valueCategory['category_id'] ?>">Sauvegarder les changements
                                                            <i class="material-icons left">check</i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--/Modal Modification-->
                                        </td>
                                        <td class="center-align">
                                            <!--Bouton suppression-->
                                            <a class="btn btn waves-effect waves-light deep-purple accent-1 modal-trigger" href="#deleteCategoryModal<?= $valueCategory['category_id'] ?>"><i class="material-icons">delete</i></a>
                                            <!--/Bouton suppression-->

                                            <!--Modal de Suppression-->
                                            <div id="deleteCategoryModal<?= $valueCategory['category_id'] ?>" class="modal bottom-sheet">
                                                <form action='' method='POST'>
                                                    <div class="modal-header">
                                                        <h2 class="modalTitle black-text center-align">Êtes-vous sûr de vouloir supprimer cette catégorie ?</h2>
                                                    </div>
                                                    <div class="modal-footer col l6 offset-l3 center-align">
                                                        <button class="btn waves-effect waves-light red" type="submit" name="delete" value="<?= $valueCategory['category_id'] ?>">Supprimer
                                                            <i class="material-icons left">check</i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--/Modal de Suppression-->
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row center-align">
                    <div class="offset-l4 col l2 col m6 col s12 marginTop">
                        <a class="waves-effect waves-light btn deep-purple lighten-1" href="adminPaintins.php">
                            <i class="material-icons left">search</i>Tableaux
                        </a>
                    </div>
                    <div class="col l2 col m6 col s12 marginTop">
                        <a class="waves-effect waves-light btn indigo lighten-1" href="adminDimensions.php">
                            <i class="material-icons left">search</i>Dimensions
                        </a>
                    </div>
                </div>
                <!--Bouton Déconnexion-->
                <div class="row center-align">
                    <div class="col l12 m12 s12">
                        <form action='' method='POST'>
                            <button class="btn waves-effect waves-light red" type="submit" name="disconnection">Déconnexion
                                <i class="material-icons left">power_settings_new</i>
                            </button>
                        </form>
                    </div>
                </div>
                <!--/Bouton Déconnexion-->
            </div>
        </div>
    </div>

    <!--Script jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
    <script>
        $(document).ready(function() {
            $('.modal').modal(); // Modal
            $('.autoOpenModal').modal('open'); //Laisse la modal ouverte

            <?php if (isset($_SESSION['toastAddModal']) && $_SESSION['toastAddModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'La catégorie à bien été ajoutée\',classes: \'green-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastAddModal']); // Retire la session
            } ?>

            <?php if (isset($_SESSION['toastUpdateModal']) && $_SESSION['toastUpdateModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'La catégorie à bien été modifiée\',classes: \'yellow-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastUpdateModal']); // Retire la session
            } ?>

            <?php if (isset($_SESSION['toastDeleteModal']) && $_SESSION['toastDeleteModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'La catégorie à bien été supprimée\',classes: \'red-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastDeleteModal']); // Retire la session
            } ?>
        });
    </script>
</body>

</html>