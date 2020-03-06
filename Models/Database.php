<?php
class Database 
{
    protected $db; //Protected permet aux classes enfants d'hériter de l'attribut $db

    public function __construct() //Méthode magique 
    {
        try {
            // On se connecte à la DataBase
            $this->db = new PDO('mysql:host=localhost;dbname=gallery;charset=utf8', 'root', '');
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
    }
    
}