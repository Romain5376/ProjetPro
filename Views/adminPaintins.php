<?php
require_once '../Controllers/adminPaintinsCtrl.php';
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
    <!--Row principale-->
    <div class="row" id="adminRow">
        <div class="col l12 m12 s12">
            <h1 class="center-align adminTitle">Espace Admin</h1>
            <h2 class="adminTitle">Les tableaux</h2>
            <div class="container">
                <div class="row center-align">
                    <p><?= isset($sendFiles) ? $sendFiles : '' ?></p>
                    <p><?= isset($modifyFiles) ? $modifyFiles : '' ?></p>
                    <div class="col l12 col m12 col s12">
                        <!--Bouton Modal ajout tableau-->
                        <a class="waves-effect waves-light btn cyan lighten-1 modal-trigger black-text" href="#addPaintinsModal"><i class="material-icons left">add_circle_outline</i>Nouveau tableau</a>
                        <!--/Bouton Modal ajout tableau-->
                    </div>


                    <!--Modal Ajout tableau-->
                    <div id="addPaintinsModal" class="modal bottom-sheet <?= isset($_POST['create']) && $modalError ? 'autoOpenModal' : '' ?>">
                        <!--Si le bouton addPaintins existe et qu'il y a des erreurs alors tu laisse la modal ouverte sinon tu la laisse fermé-->
                        <form action='' method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h2 class="modalTitle">Ajout Tableau</h2>
                            </div>
                            <div class="modal-content col l6 offset-l3">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <img class="prewiew" />
                                        <input type="file" name="file" />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" />
                                        <!--Message d'erreur pour le type de l'image-->
                                        <span class="red-text"><?= isset($messageAddModal['imageKO']) ? $messageAddModal['imageKO'] : '' ?></span>
                                        <!--/Message d'erreur pour le type de l'image-->
                                        <!--Message d'erreur pour le taille de l'image-->
                                        <span class="red-text"><?= isset($messageAddModal['sizeKO']) ? $messageAddModal['sizeKO'] : '' ?></span>
                                        <!--/Message d'erreur pour le taille de l'image-->
                                        <!--Message d'erreur pour le champs du formulaire est vide-->
                                        <span class="red-text"><?= isset($messageAddModal['fileEmpty']) ? $messageAddModal['fileEmpty'] : '' ?></span>
                                        <!--/Message d'erreur pour le champs du formulaire est vide-->
                                    </div>
                                </div>
                                <div class="input-field">
                                    <select class="browser-default" name="dimensionSelector">
                                        <option value="" disabled selected>Choisissez une dimension</option>
                                        <?php
                                        foreach ($resultDimension as $valueDimensions) {
                                        ?>
                                            <!--Affichage des dimensions dans le select-->
                                            <option value="<?= isset($valueDimensions['dimension_id']) ? $valueDimensions['dimension_id'] : '' ?>" <?= (isset($_POST['dimensionSelector']) && $_POST['dimensionSelector'] == $valueDimensions['dimension_id']) ? 'selected' : '' ?>><?= $valueDimensions['dimension_dimensions'] ?></option>
                                            <!--Affichage des dimensions dans le select-->
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!--Message d'erreur si le champ du formulaire est vide-->
                                    <span class="red-text"><?= isset($messageAddModal['dimensionEmpty']) ? $messageAddModal['dimensionEmpty'] : '' ?></span>
                                    <!--/Message d'erreur si le champ du formulaire est vide-->
                                </div>
                                <div class="input-field">
                                    <select class="browser-default" name="categorySelector">
                                        <option value="" disabled selected>Choisissez une catégorie</option>
                                        <?php
                                        foreach ($resultCategory as $valueCategories) {
                                        ?>
                                            <!--Affichage des catégories dans le select-->
                                            <option value="<?= isset($valueCategories['category_id']) ? $valueCategories['category_id'] : '' ?>" <?= isset($_POST['categorySelector']) && $_POST['categorySelector'] == $valueCategories['category_id'] ? 'selected' : '' ?>><?= $valueCategories['category_categories'] ?></option>
                                            <!--/Affichage des catégories dans le select-->
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!--Message d'erreur si le champ du formulaire est vide-->
                                    <span class="red-text"><?= isset($messageAddModal['categoryEmpty']) ? $messageAddModal['categoryEmpty'] : '' ?></span>
                                    <!--/Message d'erreur si le champ du formulaire est vide-->
                                </div>
                            </div>
                            <div class="modal-footer col l6 offset-l3 center-align">
                                <button class="btn waves-effect waves-light light-blue accent-4" type="submit" name="create">Ajouter le tableau
                                    <i class="material-icons left">check</i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--/Modal Ajout tableau-->

                </div>
                <div class="row marginTop center-align">
                    <ul class="collapsible">
                        <?php
                        //Boucle pour afficher les titres des catégories
                        foreach ($resultCategory as $valueCategories) {
                            $arrayCategories = $paintin->selectPaintinByCategory($valueCategories['category_id']); //Affichage des tableaux en fonction de l'id de la catégorie
                        ?>
                            <li class="<?= isset($_POST['update']) && $_POST['categoryId'] == $valueCategories['category_id'] && $modalError ? 'active' : '' ?>">
                                <div class="collapsible-header adminPaintinsCategories"><?= $valueCategories['category_categories'] ?><span class="new badge green accent-2 black-text" data-badge-caption="tableaux"><?= count($arrayCategories) ?></span></div>
                                <!--Affichage des catégories-->
                                <div class="collapsible-body row">
                                    <?php
                                    foreach ($arrayCategories as $valuePaintins) { //Boucle pour afficher les tableaux en fonction de la catégorie
                                    ?>
                                        <div class="col l4 s12 m6">
                                            <!--Card-->
                                            <div class="card horizontal cardAdmin">
                                                <div class="card-image">
                                                    <!--Affichage du tableau-->
                                                    <img class="paintinCardAdmin" src="<?= $valuePaintins['paintin_files'] ?>" alt="Tableau de Françoise Chouzenoux" />
                                                    <!--/Affichage du tableau-->
                                                </div>
                                                <div class="card-stacked">
                                                    <div class="card-content">
                                                        <!--Affichage des dimensions-->
                                                        <p><?= $valuePaintins['dimension_dimensions'] ?></p>
                                                        <!--/Affichage des dimensions-->
                                                    </div>
                                                    <div class="card-action">
                                                        <div class="row">
                                                            <!--Bouton Modal Modifier-->
                                                            <a class="btn btn-small waves-effect waves-light green accent-2 modal-trigger" href="#modifyPaintinModal<?= $valuePaintins['paintin_id'] ?>"><i class="material-icons black-text">edit</i></a>
                                                            <!--/Bouton Modal Modifier-->

                                                            <!--Bouton Modal Supprimer-->
                                                            <a class="btn btn-small waves-effect waves-light deep-purple accent-1 modal-trigger" href="#deletePaintinModal<?= $valuePaintins['paintin_id'] ?>"><i class="material-icons">delete</i></a>
                                                            <!--/Bouton Modal Supprimer-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/Card-->
                                        </div>

                                        <!--Modal Modification-->
                                        <div id="modifyPaintinModal<?= $valuePaintins['paintin_id'] ?>" class="modal bottom-sheet <?= isset($_POST['update']) && $_POST['update'] == $valuePaintins['paintin_id'] && $modalError ? 'autoOpenModal' : '' ?>">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h2 class="modalTitle">Modification Tableau</h2>
                                                </div>

                                                <div class="modal-content col l6 offset-l3">
                                                    <div class="file-field input-field">
                                                        <div class="btn">
                                                            <span>File</span>
                                                            <img class="prewiew" />
                                                            <input type="file" name="file" />
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" type="text" />
                                                            <!--Message d'erreur pour le type de l'image-->
                                                            <span class="red-text"><?= isset($messageModifyModal['imageKO']) ? $messageModifyModal['imageKO'] : '' ?></span>
                                                            <!--/Message d'erreur pour le type de l'image-->
                                                            <!--Message d'erreur pour le taille de l'image-->
                                                            <span class="red-text"><?= isset($messageModifyModal['sizeKO']) ? $messageModifyModal['sizeKO'] : '' ?></span>
                                                            <!--/Message d'erreur pour le taille de l'image-->
                                                            <!--Message d'erreur pour le champs du formulaire est vide-->
                                                            <span class="red-text"><?= isset($messageModifyModal['fileEmpty']) ? $messageModifyModal['fileEmpty'] : '' ?></span>
                                                            <!--/Message d'erreur pour le champs du formulaire est vide-->
                                                        </div>
                                                    </div>
                                                    <div class="input-field">
                                                        <select class="browser-default" name="modifyDimensionSelector">
                                                            <?php
                                                            foreach ($resultDimension as $valueDimensions) { //Boucle d'affichage des dimensions dans la modal de Modification 
                                                            ?>
                                                                <!--Affichage des dimensions-->
                                                                <option value="<?= isset($valueDimensions['dimension_id']) ? $valueDimensions['dimension_id'] : '' ?>" <?= (isset($_POST['modifyDimensionSelector']) && $_POST['modifyDimensionSelector'] == $valueDimensions['dimension_id']) ? 'selected' : '' ?> <?= isset($valueDimensions['dimension_dimensions']) && $valuePaintins['dimension_id'] == $valueDimensions['dimension_id'] ? 'selected' : '' ?>><?= $valueDimensions['dimension_dimensions'] ?></option>
                                                                <!--/Affichage des dimensions-->
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <!--Message d'erreur si le champ du formulaire est vide-->
                                                        <span class="red-text"><?= isset($messageModifyModal['dimensionEmpty']) ? $messageModifyModal['dimensionEmpty'] : '' ?></span>
                                                        <!--/Message d'erreur si le champ du formulaire est vide-->
                                                    </div>
                                                    <div class="input-field">
                                                        <select class="browser-default" name="modifyCategorySelector">
                                                            <?php
                                                            foreach ($resultCategory as $valueCategories) { //Boucle d'affichage des catégories dans la modal de Modification
                                                            ?>
                                                                <!--Affichage des catégories-->
                                                                <option value="<?= isset($valueCategories['category_id']) ? $valueCategories['category_id'] : '' ?>" <?= isset($_POST['modifyCategorySelector']) && $_POST['modifyCategorySelector'] == $valueCategories['category_id'] ? 'selected' : '' ?> <?= isset($valueCategories['category_categories']) && $valuePaintins['category_id'] == $valueCategories['category_id'] ? 'selected' : '' ?>><?= $valueCategories['category_categories'] ?></option>
                                                                <!--/Affichage des catégories-->
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <!--Message d'erreur si le champ du formulaire est vide-->
                                                        <span class="red-text"><?= isset($messageModifyModal['categoryEmpty']) ? $messageModifyModal['categoryEmpty'] : '' ?></span>
                                                        <!--/Message d'erreur si le champ du formulaire est vide-->
                                                    </div>
                                                </div>

                                                <div class="modal-footer col l6 offset-l3 center-align">
                                                    <input type="hidden" name="categoryId" value="<?= $valuePaintins['category_id'] ?>" />
                                                    <button class="btn waves-effect waves-light light-blue accent-4" type="submit" name="update" value="<?= $valuePaintins['paintin_id'] ?>">Sauvegarder les changements
                                                        <i class="material-icons left">check</i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!--/Modal Modification-->

                                        <!--Modal de Suppression-->
                                        <div id="deletePaintinModal<?= $valuePaintins['paintin_id'] ?>" class="modal bottom-sheet">
                                            <form action='' method='POST'>
                                                <div class="modal-header">
                                                    <h2 class="modalTitle">Êtes-vous sûr de vouloir supprimer ce tableau ?</h2>
                                                </div>

                                                <div class="modal-footer col l6 offset-l3 center-align">
                                                    <button class="btn waves-effect waves-light red" type="submit" name="delete" value="<?= $valuePaintins['paintin_id'] ?>">Supprimer
                                                        <i class="material-icons left">check</i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!--/Modal de Suppression-->

                                    <?php
                                    }
                                    ?>
                                </div>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/Row principale-->

    <!--Bouton de redirection sur les autres pages du site-->
    <div class="row center-align">
        <div class="col l12 m12 s12">
            <a class="waves-effect waves-light btn deep-purple lighten-1" href="adminDimensions.php">
                <i class="material-icons left">search</i>Gestion dimensions
            </a>
            <a class="waves-effect waves-light btn blue lighten-1 black-text" href="../index.php">
                <i class="material-icons left">home</i>Retour accueil
            </a>
            <a class="waves-effect waves-light btn indigo lighten-1" href="adminCategories.php">
                <i class="material-icons left">search</i>Gestion catégories
            </a>
        </div>
    </div>
    <!--/Bouton de redirection sur les autres pages du site-->

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

    <!--Script jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
    <script>
        $(document).ready(function() {
            $('.collapsible').collapsible(); //Volets catégories
            $('.modal').modal(); // Modal
            $('.autoOpenModal').modal('open'); //Laisse la modal ouverte

            /* Il faut créer au préalable un élément de type <img class="preview" /> dans votre code html.
            Il vous permettra d'afficher l'aperçu de l'image.
            Vous allez pouvoir modifier la taille via un css respectif.
            */
            $("input[file]").change(function() {
                console.log('sdfgh');
                var input = $(this);
                var oFReader = new FileReader();
                oFReader.readAsDataURL(this.files[0]);
                oFReader.onload = function(oFREvent) {
                    $(input.data('preview')).attr('src', oFREvent.target.result);
                };
            });
        });
    </script>
</body>

</html>