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
}

$paintin = new Paintins(); //Objet paintin de la classe Paintins
$category = new Categories(); //Objet category de la classe Categories
$messageAddModal = []; //Tableau de message d'erreur de la Modal d'ajout
$modalError = false;// Booléen 

//Ajout de catégorie
if (isset($_POST['create'])) { //Si le bouton create existe 
    if (empty($_POST['inputAddCategory'])) { // Et si le champs inputAddCategory est vide
        $modalError = true; //Booléen
        $messageAddModal['categoryEmpty'] = 'Veuillez choisir une catégorie !';//Message d'erreur
    } else {//Sinon
        $addCategory = htmlspecialchars($_POST['inputAddCategory']); //Tu récupères la valeur du POST
        $category->setCategories($addCategory); //Hydratation
        $category->addCategory(); //Méthode d'ajout
    }
}

//Modification de catégorie
if (isset($_POST['update'])) {
    $id = htmlspecialchars($_POST['update']);
    $updateCategory = htmlspecialchars($_POST['inputModifyCategory']);
    $category->setCategories($updateCategory); //Hydratation
    $category->updateCategory($id); //Méthode de modification
}

//Suppression de catégorie
if (isset($_POST['delete'])) {
    $id = $_POST['delete']; // Récupère l'id de catégorie 
    $category->deleteCategory($id); // Supprime la catégorie selectionnée
}

$resultCategory = $category->selectCategory(); //Liste les catégories dans adminCategories.php
