<?php
class Dimensions extends Database 
{
    private $id;
    private $dimensions;

    public function getId()
    {
        return $this->id;
    }

    public function setId($valueId)
    {
        $this->id = $valueId;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function setDimensions($valueDimensions)
    {
        $this->dimensions = $valueDimensions;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function dimensionSelect() 
    {
        $req = $this->db->query('SELECT * FROM gallery_dimension');
        $reqFetch = $req->fetchAll(PDO::FETCH_ASSOC); //Facilite le renvoi du résultat
        return $reqFetch;
    }

    public function addDimension()
    {
        $req = $this->db->prepare('INSERT INTO gallery_dimension(dimension_dimensions) VALUES (:dimensions)');
        $req->bindValue(':dimensions', $this->dimensions, PDO::PARAM_STR);
        if ($req->execute()) { //Exécute la requête
            return true;
        }
    }

    public function updateDimension($id)
    {
        $req = $this->db->prepare('UPDATE gallery_dimension SET dimension_dimensions = :dimensions WHERE dimension_id = :id');
        $req->bindValue(':dimensions', $this->dimensions, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT); 
        if($req->execute()) {  
            return true; 
        }
    }

    public function deleteDimensions($id)
    {
        $req = $this->db->prepare('DELETE FROM gallery_dimension WHERE dimension_id = :id');
        $req->bindValue(':id',$id,PDO::PARAM_INT);
        if($req->execute()) {  
            return true;
        }
    }
}