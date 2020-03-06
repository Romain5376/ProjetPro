<?php
require_once '../Models/Database.php';
require_once '../Models/Dimensions.php';

session_start();
if(!isset($_SESSION['postLogin'])) {
    header('Location: connection-adminPaintins.php');
}

$dimension = new Dimensions();//Objet dimension de la classe Dimensions

$resultDimension = $dimension->dimensionSelect(); //Liste les dimensions

//Ajout de dimensions
if (isset($_POST['create'])) {
    $addDimension = htmlspecialchars($_POST['inputAddDimensions']);
    $dimension->setDimensions($addDimension);//Hydratation
    $dimension->addDimension();//Méthode d'ajout
    header('Location: adminDimensions.php');
}

//Modification de dimensions
if (isset($_POST['update'])) {
    $id = htmlspecialchars($_POST['update']);
    $updateDimension = htmlspecialchars($_POST['inputModifyDimensions']);
    $dimension->setDimensions($updateDimension);//Hydratation
    $dimension->updateDimension($id);//Méthode de modification
    header('Location: adminDimensions.php');
}

//Suppression de dimensions
if (isset($_POST['delete'])) {
    $id = $_POST['delete']; // Récupère l'id des dimensions 
    $dimension->deleteDimensions($id);// Supprime les dimensions selectionnées
    header('Location: adminDimensions.php');
}

//Déconnexion espace Admin
if (isset($_POST['disconnection'])) {
    session_destroy();
}
