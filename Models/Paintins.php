<?php
class Paintins extends Database //La classe Paintins hérite de la classe Database
{
    private $id; //Attribut
    private $paintinFiles;//Attribut
    private $categoryId;//Attribut
    private $dimensionId;//Attribut

    public function getId()
    {
        return $this->id; //Retourne la valeur de l'attribut $id
    }

    public function setId($valueId)
    {
        $this->id = $valueId; //Permet de modifier la valeur de base de l'attribut $id
    }

    public function getPaintinFiles()
    {
        return $this->paintinFiles;//Retourne la valeur de l'attribut $paintinFiles
    }

    public function setPaintinFiles($valuePaintinFiles)
    {
        $this->paintinFiles = $valuePaintinFiles;//Permet de modifier la valeur de base de l'attribut $paintinFiles
    }

    public function getCategoryId()
    {
        return $this->categoryId;//Retourne la valeur de l'attribut $categoryId
    }

    public function setCategoryId($valueCategoryId)
    {
        $this->categoryId = $valueCategoryId;//Permet de modifier la valeur de base de l'attribut $categoryId
    }

    public function getDimensionId()
    {
        return $this->dimensionId;//Retourne la valeur de l'attribut $dimensionId
    }

    public function setDimensionId($valueDimensionId)
    {
        $this->dimensionId = $valueDimensionId;//Permet de modifier la valeur de base de l'attribut $dimensionId
    }

    public function __construct() //Méthode magique
    {
        parent::__construct();
    }

    public function selectPaintinByCategory($idCategory)
    {
        $req = $this->db->query('SELECT gallery_paintin.paintin_id, gallery_paintin.paintin_files, gallery_paintin.dimension_id, gallery_paintin.category_id, gallery_category.category_id ,gallery_category.category_categories, gallery_dimension.dimension_dimensions
                                FROM gallery_paintin
                                INNER JOIN gallery_category
                                ON gallery_paintin.category_id = gallery_category.category_id
                                INNER JOIN gallery_dimension
                                ON gallery_paintin.dimension_id = gallery_dimension.dimension_id
                                WHERE gallery_category.category_id =' . $idCategory);//Requête de selection pour les tableaux par rapport à l'id de la catégorie
        $reqFetch = $req->fetchAll(PDO::FETCH_ASSOC); //Facilite le renvoi du résultat
        return $reqFetch; //Retourne le résultat pour pourvoir l'utiliser dans le controller
    }

    public function addPaintins()
    {
        $req = $this->db->prepare('INSERT INTO gallery_paintin(paintin_files,dimension_id,category_id) VALUES (:files,:dimensionId,:categoryId)'); //Requête d'ajout d'un tableau
        $req->bindValue(':files', $this->paintinFiles, PDO::PARAM_STR); //Récupère la valeur de paintinFiles
        $req->bindValue(':dimensionId', $this->dimensionId, PDO::PARAM_INT); //Récupère la valeur de dimensionId
        $req->bindValue(':categoryId', $this->categoryId, PDO::PARAM_INT); //Récupère la valeur de categoryId
        if ($req->execute()) { //Exécute la requête
            return true;
        }
    }

    public function updatePaintins($id)
    {
        $req = $this->db->prepare('UPDATE gallery_paintin SET paintin_files = :paintin, category_id = :categoryId, dimension_id = :dimensionId WHERE paintin_id = :id');
        $req->bindValue(':paintin', $this->paintinFiles, PDO::PARAM_STR);
        $req->bindValue(':categoryId', $this->categoryId, PDO::PARAM_INT);
        $req->bindValue(':dimensionId', $this->dimensionId, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        if($req->execute()) {
            return true;
        }
    }

    public function deletePaintin($id)
    {
        $req = $this->db->prepare('DELETE FROM gallery_paintin WHERE paintin_id = :id');
        $req->bindValue(':id',$id,PDO::PARAM_INT);
        if($req->execute()) {
            return true;
        }
    }
}
