<?php
require_once '../Controllers/adminDimensionsCtrl.php';
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
            <h2 class="adminTitle">Les dimensions</h2>
            <div class="container">
                <div class="row center-align">
                    <div class="col l12 col m12 col s12">
                        <!--Bouton ajout dimensions-->
                        <a class="waves-effect waves-light btn cyan lighten-1 modal-trigger black-text" href="#addDimensionsModal"><i class="material-icons left">add_circle_outline</i>Nouvelles dimensions</a>
                        <!--/Bouton ajout dimensions-->

                        <!--Modal Ajout dimensions-->
                        <div id="addDimensionsModal" class="modal bottom-sheet <?= isset($_POST['create']) && $modalError ? 'autoOpenModal' : '' ?>">
                            <form action='' method="POST">
                                <div class="modal-header">
                                    <h2 class="modalTitle">Ajout Dimensions</h2>
                                </div>
                                <div class="modal-content col l6 offset-l3">
                                    <div class="input-field col l6 offset-l3 col m12 col s6">
                                        <i class="material-icons prefix">straighten</i>
                                        <input id="dimensions" type="text" class="validate" name="inputAddDimension" />
                                        <label for="dimensions">Ex: 90cm x 90cm</label>
                                        <?php
                                        if (empty($_POST['inputAddDimension'])) {
                                        ?>
                                            <span class="red-text"><?= isset($messageAddModal['dimensionEmpty']) ? $messageAddModal['dimensionEmpty'] : '' ?></span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="red-text"><?= isset($arrayRegexError['dimension']) ? $arrayRegexError['dimension'] : '' ?></span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer col l6 offset-l3 center-align">
                                    <button class="btn waves-effect waves-light light-blue accent-4" type="submit" name="create">Ajouter les dimensions
                                        <i class="material-icons left">check</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--/Modal Ajout dimensions-->
                    </div>
                    <div class="col l6 offset-l3">
                        <table class="highlight marginTop">
                            <thead>
                                <tr>
                                    <th class="center-align">Dimensions</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($resultDimension as $valueDimension) {
                                ?>
                                    <tr>
                                        <td class="center-align"><?= $valueDimension['dimension_dimensions'] ?></td>
                                        <td class="center-align">
                                            <!--Bouton Modifier-->
                                            <a class="btn btn waves-effect waves-light green accent-2 modal-trigger black-text" href="#modifyDimensionModal?id=<?= $valueDimension['dimension_id'] ?>">Modifier<i class="material-icons left black-text">edit</i></a>
                                            <!--/Bouton Modifier-->

                                            <!--Modal Modification-->
                                            <div id="modifyDimensionModal?id=<?= $valueDimension['dimension_id'] ?>" class="modal bottom-sheet <?= isset($_POST['update']) && $modalError ? 'autoOpenModal' : '' ?>">
                                                <form action='' method="POST">
                                                    <div class="modal-header">
                                                        <h2 class="modalTitle black-text center-align">Modification Dimensions</h2>
                                                    </div>
                                                    <div class="modal-content col l6 offset-l3">
                                                        <div class="input-field col l6 offset-l3 col m12 col s6">
                                                            <i class="material-icons prefix">straighten</i>
                                                            <input id="dimensions" type="text" class="validate" name="inputModifyDimension" value="<?= $valueDimension['dimension_dimensions'] ?>" />
                                                            <label for="dimensions">Ex: 90cm x 90cm</label>
                                                            <span class="red-text"><?= isset($arrayRegexError['dimension']) ? $arrayRegexError['dimension'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer col l6 offset-l3 center-align">
                                                        <button class="btn waves-effect waves-light light-blue accent-4" type="submit" name="update" value="<?= $valueDimension['dimension_id'] ?>">Sauvegarder les changements
                                                            <i class="material-icons left">check</i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--/Modal Modification-->
                                        </td>
                                        <td class="center-align">
                                            <!--Bouton Supprimer-->
                                            <a class="btn btn waves-effect waves-light deep-purple accent-1 modal-trigger" href="#deleteDimensionsModal?id=<?= $valueDimension['dimension_id'] ?>">Supprimer<i class="material-icons left">delete</i></a>
                                            <!--/Bouton Supprimer-->

                                            <!--Modal de Suppression-->
                                            <div id="deleteDimensionsModal?id=<?= $valueDimension['dimension_id'] ?>" class="modal bottom-sheet">
                                                <form action='' method='POST'>
                                                    <div class="modal-header">
                                                        <h2 class="modalTitle black-text center-align">Êtes-vous sûr de vouloir supprimer ces dimensions ?</h2>
                                                    </div>
                                                    <div class="modal-footer col l6 offset-l3 center-align">
                                                        <button class="btn waves-effect waves-light red" type="submit" name="delete" value="<?= $valueDimension['dimension_id'] ?>">Supprimer
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
                    <div class="col l12 m12 s12">
                        <a class="waves-effect waves-light btn deep-purple lighten-1" href="adminPaintins.php">
                            <i class="material-icons left">search</i>Gestion tableaux
                        </a>
                        <a class="waves-effect waves-light btn blue lighten-1 black-text" href="../index.php">
                            <i class="material-icons left">home</i>Retour accueil
                        </a>
                        <a class="waves-effect waves-light btn indigo lighten-1" href="adminCategories.php">
                            <i class="material-icons left">search</i>Gestion catégories
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
            $('.collapsible').collapsible(); //Volets catégories
            $('.modal').modal(); // Modal
            $('.autoOpenModal').modal('open'); //Laisse la d'ajout modal ouverte

            <?php if (isset($_SESSION['toastAddModal']) && $_SESSION['toastAddModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'La dimension à bien été ajoutée\',classes: \'green-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastAddModal']); // Retire la session
            } ?>

            <?php if (isset($_SESSION['toastUpdateModal']) && $_SESSION['toastUpdateModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'La dimension à bien été modifiée\',classes: \'yellow-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastUpdateModal']); // Retire la session
            } ?>

            <?php if (isset($_SESSION['toastDeleteModal']) && $_SESSION['toastDeleteModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'Le dimension à bien été supprimée\',classes: \'red-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastDeleteModal']); // Retire la session
            } ?>
        });
    </script>
</body>

</html>