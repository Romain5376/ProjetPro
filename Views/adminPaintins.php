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
                            <div class="modal-content col l3">
                                <img class="preview responsive-img" />
                            </div>
                            <div class="modal-content col l6 col m12 col s12">
                                <div class="file-field input-field">
                                    <div class="row">

                                        <div class="btn col l1 col m1 col s2">
                                            <span>File</span>
                                            <div class="col l10">
                                                <input type="file" name="file" data-preview=".preview" />
                                            </div>
                                        </div>
                                        <div class="file-path-wrapper col l10 col m10 col s10">
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
                                            <span class="red-text"><?= isset($messageAddModal['errorFile']) ? $messageAddModal['errorFile'] : '' ?></span>
                                        </div>
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
                                            <option value="<?= isset($valueCategories['category_id']) ? $valueCategories['category_id'] : '' ?>" <?= isset($_POST['categorySelector']) && $_POST['categorySelector'] == $valueCategories['category_id'] && !empty($messageAddModal) ? 'selected' : '' ?>><?= $valueCategories['category_categories'] ?></option>
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
                            <div class="modal-footer col l12 center-align">
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
                                <div class="collapsible-header adminPaintinsCategories"><?= $valueCategories['category_categories'] ?><span class="new badge green accent-2 purple-text" data-badge-caption="tableaux"><?= count($arrayCategories) ?></span></div>
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
                                                    <div class="card-action row">
                                                        <div class="col l6 col m6 col s6">
                                                            <!--Bouton Modal Modifier-->
                                                            <a id="modifyLink" onclick="getId(<?= $valuePaintins['paintin_id'] ?>)" class="btn btn-small green accent-2 waves-effect waves-light modal-trigger" href="#modifyPaintinModal<?= $valuePaintins['paintin_id'] ?>"><i class="material-icons black-text">edit</i></a>
                                                            <!--/Bouton Modal Modifier-->
                                                        </div>
                                                        <div class="col l6 col m6 col s6">
                                                            <!--Bouton Modal Supprimer-->
                                                            <a class="btn btn-small deep-purple accent-1 waves-effect waves-light modal-trigger" href="#deletePaintinModal<?= $valuePaintins['paintin_id'] ?>"><i class="material-icons">delete</i></a>
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
                                                <div class="modal-content col l3 col m3 col s12">
                                                    <img class="previewModify<?= $valuePaintins['paintin_id'] ?> responsive-img" />
                                                </div>
                                                <div class="modal-content col l6">
                                                    <div class="file-field input-field">
                                                        <div class="row">
                                                            <div class="btn col l1 col m4 col s2">
                                                                <span>File</span>
                                                                <div class="col l10 col m8 col s12">
                                                                    <input type="file" name="file" data-preview=".previewModify<?= $valuePaintins['paintin_id'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="file-path-wrapper col l10 col m8 col s10">
                                                                <input id="imageSrc<?= $valuePaintins['paintin_id'] ?>" class="file-path validate" type="text" value="<?= $valuePaintins['paintin_files'] ?>" />
                                                                <!--Message d'erreur pour le type de l'image-->
                                                                <span class="red-text"><?= isset($messageModifyModal['imageKO']) ? $messageModifyModal['imageKO'] : '' ?></span>
                                                                <!--/Message d'erreur pour le type de l'image-->
                                                                <!--Message d'erreur pour le taille de l'image-->
                                                                <span class="red-text"><?= isset($messageModifyModal['sizeKO']) ? $messageModifyModal['sizeKO'] : '' ?></span>
                                                                <!--/Message d'erreur pour le taille de l'image-->
                                                                <!--Message d'erreur pour le champs du formulaire est vide-->
                                                                <span class="red-text"><?= isset($messageModifyModal['fileEmpty']) ? $messageModifyModal['fileEmpty'] : '' ?></span>
                                                                <!--/Message d'erreur pour le champs du formulaire est vide-->
                                                                <span class="red-text"><?= isset($messageModifyModal['errorFile']) ? $messageModifyModal['errorFile'] : '' ?></span>
                                                            </div>
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

                                                <div class="modal-footer col l12 col m6 offset-m3 col s12 center-align">
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
        <div class="offset-l4 col l2 col m6 col s6 marginTop">
            <a class="waves-effect waves-light btn deep-purple lighten-1" href="adminCategories.php">
                <i class="material-icons left">search</i>Catégories
            </a>
        </div>
        <div class="col l2 col m6 col s6 marginTop">
            <a class="waves-effect waves-light btn indigo lighten-1" href="adminDimensions.php">
                <i class="material-icons left">search</i>Dimensions
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
    <script>
        $(document).ready(function() {
            $('.collapsible').collapsible(); //Volets catégories
            $('.modal').modal(); // Modal
            $('.autoOpenModal').modal('open'); //Laisse la modal ouverte

            /* Il faut créer au préalable un élément de type <img class="preview" /> dans votre code html.
            Il vous permettra d'afficher l'aperçu de l'image.
            Vous allez pouvoir modifier la taille via un css respectif.
            */
            $("input[data-preview]").change(function() { // Quand la valeur de input data-preview change déclenchement de la function
                var input = $(this); // Variable qui permet de récupérer les informations de l'input ciblé
                var oFReader = new FileReader(); // Instanciation d'un nouvel objet avec la class FileReader (Permet de lire les fichiers qui sont envoyés)
                oFReader.readAsDataURL(this.files[0]); // Récupère l'URL grâce à la méthode readAsDataUrl (Lis le fichier que j'ai choisi)
                oFReader.onload = function(oFREvent) { // Au chargement de l'objet
                    $(input.data('preview')).attr('src', oFREvent.target.result); // Permet de changer la source de l'image qui porte la class preview
                };
            });

            <?php if (isset($_SESSION['toastAddModal']) && $_SESSION['toastAddModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'Le tableau à bien été ajouté\',classes: \'green-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastAddModal']); // Retire la session
            } ?>

            <?php if (isset($_SESSION['toastUpdateModal']) && $_SESSION['toastUpdateModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'Le tableau à bien été modifié\',classes: \'yellow-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastUpdateModal']); // Retire la session
            } ?>

            <?php if (isset($_SESSION['toastDeleteModal']) && $_SESSION['toastDeleteModal'] == true) { //Si la session existe est quelle est égale à "true"
                echo 'M.toast({html: \'Le tableau à bien été supprimé\',classes: \'red-text\'})'; // Créer le toast et le Message dans le toast
                unset($_SESSION['toastDeleteModal']); // Retire la session
            } ?>
        });

        function getId(id) { // Création d'une nouvelle fonction getId prenant en paramètre l'id du tableau 
            let imageSrc = $("#imageSrc" + id).val(); // Initialisation d'une nouvelle variable avec la valeur de du chemin de l'image (input type text)
            $('.previewModify' + id).attr('src', imageSrc); // Changement de la source du preview en fonction de l'id du tableau 
        }
    </script>
</body>

</html>