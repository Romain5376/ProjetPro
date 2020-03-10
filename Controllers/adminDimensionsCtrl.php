<?php
require_once '../Models/Database.php';
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

$dimension = new Dimensions(); //Objet dimension de la classe Dimensions
$messageAddModal = []; //Tableau de message d'erreur de la Modal d'ajout
$modalError = false; //La modal reste fermée
$arrayRegexError = []; //Tableau d'erreur des regex
$regexDimension = '/^[0-9]{2,3}(cm x )[0-9]{2,3}(cm)$/'; //Regex dimension

//Ajout de dimensions
if (isset($_POST['create'])) {
    if (empty($_POST['inputAddDimension'])) {
        $modalError = true; //La modal reste ouverte
        $messageAddModal['dimensionEmpty'] = '<i class="fas fa-exclamation-triangle mr-2"></i> Veuillez remplir le champ !'; //Message d'erreur
    }else if(!preg_match($regexDimension, $_POST['inputAddDimension'])) { //Si le champs inputAddCategory n'est pas conforme à la regex 
        $modalError = true; //La modal reste ouverte
        $arrayRegexError['dimension'] = '<i class="fas fa-exclamation-triangle mr-2"></i> Veuillez respecter le format !'; //Alors tu affiches ce type d'erreur
    } else { //Sinon
        $addDimension = htmlspecialchars($_POST['inputAddDimension']);
        $dimension->setDimensions($addDimension); //Hydratation
        if ($dimension->addDimension()) { //Méthode d'ajout
            $_SESSION['toastAddModal'] = true;
        }
    }
}

//Modification de dimensions
if (isset($_POST['update'])) {
    if (!preg_match($regexDimension, $_POST['inputModifyDimension'])) { //Si le champs inputAddCategory n'est pas conforme à la regex 
        $modalError = true; //La modal reste ouverte
        $arrayRegexError['dimension'] = '<i class="fas fa-exclamation-triangle mr-2"></i>Veuillez respecter le format !'; //Alors tu affiches ce type d'erreur
    } else { //Sinon
        $id = htmlspecialchars($_POST['update']);
        $updateDimension = htmlspecialchars($_POST['inputModifyDimension']);
        $dimension->setDimensions($updateDimension); //Hydratation
        if ($dimension->updateDimension($id)) { //Méthode de modification
            $_SESSION['toastUpdateModal'] = true;
        }
    }
}

//Suppression de dimensions
if (isset($_POST['delete'])) {
    $id = $_POST['delete']; // Récupère l'id des dimensions 
    if ($dimension->deleteDimensions($id)) { // Supprime les dimensions selectionnées
        $_SESSION['toastDeleteModal'] = true;
    } 
}

$resultDimension = $dimension->dimensionSelect(); //Liste les dimensions
