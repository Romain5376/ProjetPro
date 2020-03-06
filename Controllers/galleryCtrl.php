<?php 
require_once '../Models/Database.php'; //Appel du model Database
require_once '../Models/Paintins.php'; //Appel du model Paintins
require_once '../Models/Categories.php'; //Appel du model Categories

$paintin = new Paintins();//Objet paintin de la classe Paintins
$category = new Categories();//Objet category de la classe Categories

$resultCategory = $category->selectCategory();//Liste les catégories