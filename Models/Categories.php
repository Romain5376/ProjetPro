<?php
class Categories extends Database
{
    private $id;
    private $categories;

    public function getId()
    {
        return $this->id;
    }

    public function setId($valueId)
    {
        $this->id = $valueId;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($valueCategories)
    {
        $this->categories = $valueCategories;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function selectCategory()
    {
        $req = $this->db->query('SELECT * FROM gallery_category');
        $reqFetch = $req->fetchAll(PDO::FETCH_ASSOC); //Facilite le renvoi du résultat
        return $reqFetch;
    }

    public function addCategory()
    {
        $req = $this->db->prepare('INSERT INTO gallery_category(category_categories) VALUES (:category)');
        $req->bindValue(':category', $this->categories, PDO::PARAM_STR);
        if ($req->execute()) { //Exécute la requête
            return true;
        }
    }

    public function updateCategory($id)
    {
        $req = $this->db->prepare('UPDATE gallery_category SET category_categories = :category WHERE category_id = :id');
        $req->bindValue(':category', $this->categories, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        if ($req->execute()) {
            return true;
        }
    }

    public function deleteCategory($id)
    {
        $req = $this->db->prepare('DELETE FROM gallery_category WHERE category_id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        if ($req->execute()) {
            return true;
        }
    }

    public function checkExistCategory()
    {
        $req = $this->db->prepare('SELECT * FROM gallery_category WHERE category_categories = :categorie');
        $req->bindValue(':categorie', $this->categories, PDO::PARAM_STR);
        if($req->execute()){
            $reqFetch = $req->fetchAll(PDO::FETCH_ASSOC); //Facilite le renvoi du résultat
            return $reqFetch;
        }
    }
}
