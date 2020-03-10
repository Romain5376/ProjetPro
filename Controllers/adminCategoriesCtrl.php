<?php
require_once '../Models/Database.php';
require_once '../Models/Categories.php';
require_once '../Models/Paintins.php';
session_start();

if (!isset($_SESSION['postLogin'])) {
    header('Location: connection-adminPaintins.php');
}

//Déconnexion espace Admin
if (isset($_POST['disconnection'])) {
    session_destroy();
    header('Location: ../index.php');
}

$paintin = new Paintins(); //Objet paintin de la classe Paintins
$category = new Categories(); //Objet category de la classe Categories
$messageAddModal = []; //Tableau de message d'erreur de la Modal d'ajout
$modalError = false; //La modal reste fermée
$arrayRegexError = [];//Tableau d'erreur des regex
$regexCategory = '/^[A-Z{\s}a-z]*$/'; //Regex catégorie

//Ajout de catégorie
if (isset($_POST['create'])) { //Si le bouton create existe 
    if (empty($_POST['inputAddCategory'])) { // Et si le champs inputAddCategory est vide
        $modalError = true; //La modal reste ouverte
        $messageAddModal['categoryEmpty'] = '<i class="fas fa-exclamation-triangle mr-2"></i> Veuillez remplir le champ !'; //Message d'erreur
    }else if(!preg_match($regexCategory, $_POST['inputAddCategory'])) { //Si le champs inputAddCategory n'est pas conforme à la regex 
            $modalError = true; //La modal reste ouverte
            $arrayRegexError['category'] = '<i class="fas fa-exclamation-triangle mr-2"></i> Veuillez respecter le format !'; //Alors tu affiches ce type d'erreur
    } else { //Sinon
        $addCategory = htmlspecialchars($_POST['inputAddCategory']); //Tu récupères la valeur du POST
        $category->setCategories($addCategory); //Hydratation
        if ($category->addCategory()) { //Méthode d'ajout
            $_SESSION['toastAddModal'] = true;
        } 
    }
}

//Modification de catégorie
if (isset($_POST['update'])) { 
    if (!preg_match($regexCategory, $_POST['inputModifyCategory'])) { //Si le champs inputModifyCategory n'est pas conforme à la regex 
            $modalError = true; //La modal reste ouverte
            $arrayRegexError['category'] = '<i class="fas fa-exclamation-triangle mr-2"></i> Veuillez respecter le format !'; //Alors tu affiches ce type d'erreur
    } else {
        $id = htmlspecialchars($_POST['update']);
        $updateCategory = htmlspecialchars($_POST['inputModifyCategory']);
        $category->setCategories($updateCategory); //Hydratation
        if ($category->updateCategory($id)) { //Méthode de modification
            $_SESSION['toastUpdateModal'] = true;
        }
    }
}

//Suppression de catégorie
if (isset($_POST['delete'])) {
    $id = $_POST['delete']; // Récupère l'id de catégorie 
    if ($category->deleteCategory($id)) { // Supprime la catégorie selectionnée
        $_SESSION['toastDeleteModal'] = true;
    }
}

$resultCategory = $category->selectCategory(); //Liste les catégories dans adminCategories.php
