<?php
class Admin extends Database
{
    private $id;
    private $login;
    private $password;

    public function getId()
    {
        return $this->id;
    }

    public function setId($valueId)
    {
        $this->id = $valueId;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($valueLogin)
    {
        $this->login = $valueLogin;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($valuePassword)
    {
        $this->password = $valuePassword;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function selectAdminLoginAndPassword()
    {
        $req = $this->db->query('SELECT * FROM gallery_admin');
        $reqFetch = $req->fetchAll();
        return $reqFetch;
    }
}