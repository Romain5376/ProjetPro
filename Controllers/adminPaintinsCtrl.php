<?php
require_once '../Models/Database.php';
require_once '../Models/Paintins.php';
require_once '../Models/Categories.php';
require_once '../Models/Dimensions.php';

session_start();
if (!isset($_SESSION['postLogin'])) {
    header('Location: connection-adminPaintins.php');
}

//Déconnexion espace Admin
if (isset($_POST['disconnection'])) {
    session_destroy();
    header('Location: ../index.php');
}

$messageAddModal = []; //Tableau de message d'erreur de la Modal d'ajout
$messageModifyModal = []; //Tableau de message d'erreur de la Modal de modification
$modalError = false; //Booléen

$paintin = new Paintins(); //Objet paintin de la classe Paintins
$category = new Categories(); //Objet category de la classe Categories
$dimension = new Dimensions(); //Objet dimension de la classe Dimensions

$resultCategory = $category->selectCategory(); //Liste les catégories
$resultDimension = $dimension->dimensionSelect(); //Liste les dimensions

//AJOUT TABLEAU
if (isset($_POST['create'])) { // Si le bouton ajout tableau existe et que les champs file et dimensions existent
    if (isset($_FILES['file']) and $_FILES['file']['error'] == 0) { //Si le champs file existe et qu'il n'y a pas d'erreur
        // Check file size
        $limit = 1000000; // on definit une limit en bits, 1Mo = 1000000 Bits.
        if ($_FILES["file"]["size"] > $limit) {
            $modalError = true;
            $_SESSION['toastAddModal'] = false;
            $messageAddModal['sizeKO'] = 'Désolé, votre fichier doit faire moins de 1 Mo !';
        } else { 
            $fileInformation = pathinfo($_FILES['file']['name']); // Nom du fichier rentré dans le formulaire et pathInfo(récupère les informations d'un fichier)
            $fileName = $fileInformation['filename']; //Récupère seulement le nom du fichier 
            $extension_upload = $fileInformation['extension']; //Permet de récupéré l'extension
            $extensions_allowed = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/jfif'); //Autorise les extensions suivantes
            $fileMime = mime_content_type($_FILES["file"]["tmp_name"]); // On extrait le mime de l'image à l'aide d'une fonction.
            $fileType = explode('/', $fileMime); // on créé un array pour obtenit le type et l'extension

            // Check s'il s'agit bien d'une image 
            if (in_array($fileMime, $extensions_allowed)) {
                // On peut valider le fichier et le stocker définitivement;
                move_uploaded_file($_FILES['file']['tmp_name'], ('../assets/img/' . $fileName . '.' . $extension_upload)); //Permet de déplacer le fichier répertorié par le nom temporaire
                $dimensionSelector = htmlspecialchars((int) ($_POST['dimensionSelector']));
                $categorySelector = htmlspecialchars((int) ($_POST['categorySelector']));

                //Hydratation
                $paintin->setPaintinFiles('../assets/img/' . $fileName . '.' . $extension_upload); //Définie la nouvelle valeur de paintinFiles avec le chemin depuis assets/nom du fichier/extension(.jpg,.png...)
                $paintin->setDimensionId($dimensionSelector);
                $paintin->setCategoryId($categorySelector);
                if ($paintin->addPaintins()) {
                    $_SESSION['toastAddModal'] = true;
                }
            } else {
                $modalError = true;
                $_SESSION['toastAddModal'] = false;
                $messageAddModal['imageKO'] = 'Votre fichier n\'est pas une image : ' . $fileMime . '!';
            }
        }
    } else {
        $modalError = true;
        $messageAddModal['errorFile'] = 'Vérifiez le type de votre fichier !';
        $_SESSION['toastAddModal'] = false;
    }
    if (isset($_FILES) && $_FILES['file']['error'] == 4) {
        $modalError = true;
        $_SESSION['toastAddModal'] = false;
        $messageAddModal['fileEmpty'] = 'Veuillez selectionner une photo !';
    }
    if (empty($_POST['dimensionSelector'])) {
        $modalError = true;
        $_SESSION['toastAddModal'] = false;
        $messageAddModal['dimensionEmpty'] = 'Veuillez choisir une dimension !';
    }

    if (empty($_POST['categorySelector'])) {
        $modalError = true;
        $_SESSION['toastAddModal'] = false;
        $messageAddModal['categoryEmpty'] = 'Veuillez choisir une catégorie !';
    }
}

//MODIFICATION DE TABLEAU
if (isset($_POST['update'])) { // Si le bouton modification tableau existe et que les champs file et dimensions existent

    if (isset($_FILES['file']) and $_FILES['file']['error'] == 0) { //Si le champs file existe et qu'il n'y a pas d'erreur

        // Check file size
        $limit = 1000000; // on definit une limit en bits, 1Mo = 1000000 Bits.
        if ($_FILES["file"]["size"] > $limit) {
            $modalError = true;
            $messageModifyModal['sizeKO'] = 'Désolé, votre fichier doit faire moins de 1 Mo !';
            $_SESSION['toastUpdateModal'] = false;

        } else {
            $fileInformation = pathinfo($_FILES['file']['name']); // pathInfo(récupère les informations d'un fichier: Nom du répertoire,nom du fichier,extension,nom complet du fichier(nom + extension))
            $fileName = $fileInformation['filename']; //Récupère seulement le nom du fichier sans l'extension
            $extension_upload = $fileInformation['extension']; //Permet de récupéré l'extension
            $extensions_allowed = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/jfif'); //Autorise les extensions suivantes

            $fileMime = mime_content_type($_FILES["file"]["tmp_name"]); // On extrait le mime de l'image à l'aide d'une fonction.
            $fileType = explode('/', $fileMime); // on créé un array pour obtenit le type et l'extension

            // Check s'il s'agit bien d'une image 
            if ($fileType[0] == 'image') {
                if (in_array($fileMime, $extensions_allowed)) {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['file']['tmp_name'], ('../assets/img/' . $fileName . '.' . $extension_upload)); //Permet de déplacer le fichier répertorié par le nom temporaire

                    $id = htmlspecialchars($_POST['update']);
                    $modifyDimensionSelector = htmlspecialchars((int) ($_POST['modifyDimensionSelector']));
                    $modifyCategorySelector = htmlspecialchars((int) ($_POST['modifyCategorySelector']));

                    //Hydratation
                    $paintin->setPaintinFiles('../assets/img/' . $fileName . '.' . $extension_upload); //Définie la nouvelle valeur de paintinFiles avec le chemin depuis assets/nom du fichier/extension(.jpg,.png...)
                    $paintin->setDimensionId($modifyDimensionSelector);
                    $paintin->setCategoryId($modifyCategorySelector);
                    if ($paintin->updatePaintins($id)) {
                        $_SESSION['toastUpdateModal'] = true;
                    }
                }
            } else {
                $modalError = true;
                $_SESSION['toastUpdateModal'] = false;
                $messageModifyModal['imageKO'] = 'Votre fichier n\'est pas une image : ' . $fileMime . '!';
            }
        }
    } else {
        $modalError = true;
        $messageModifyModal['errorFile'] = 'Vérifiez le type de votre fichier !';
        $_SESSION['toastUpdateModal'] = false;
    }
    if (isset($_FILES) && $_FILES['file']['error'] == 4) {
        $modalError = true;
        $messageModifyModal['fileEmpty'] = 'Veuillez selectionner une photo !';
        $_SESSION['toastUpdateModal'] = false;
    }
}

//SUPPRESSION TABLEAU
if (isset($_POST['delete'])) { //Si le bouton delete existe
    $id = $_POST['delete']; // Récupère l'id du tableau 
    if ($paintin->deletePaintin($id)) { // Supprime le tableau
        $_SESSION['toastDeleteModal'] = true;
    }
}
