<?php
require_once '../Models/Database.php';
require_once '../Models/Admin.php';
session_start();
$errorMessageConnection = [];

if (isset($_POST['connection'])) { //Si le bouton connexion existe
    $admin = new Admin(); // Objet admin de la classe Admin
    $dataAdmin = $admin->selectAdminLoginAndPassword(); // Applique la méthode selectAdminLoginAndPassword()

    if (isset($_POST['login']) && isset($_POST['password'])) { //Si le champs login et password existent
        (htmlspecialchars($_POST['login'])); // (htmlspecialchars) Instruction pour eviter les injections SQL 
        (htmlspecialchars($_POST['password']));
    }
    if (empty($_POST['login'])){
        $errorMessageConnection['loginEmpty'] = '<i class="fas fa-exclamation-triangle mr-2"></i> Veuillez renseigner le login';
    }
    if (empty($_POST['password'])) {
        $errorMessageConnection['passwordEmpty'] = '<i class="fas fa-exclamation-triangle mr-2"></i> Veuillez renseigner le mot de passe';
    }
        foreach ($dataAdmin as $value) { //Parcours le tableau associatif $dataAdmin
            if ($value['admin_login'] == $_POST['login'] && password_verify($_POST['password'], $value['admin_password'])) { //Si admin_login est égal au champs login et si admin_password est égal au champs password
                $_SESSION['postLogin'] = $_POST['login']; // Et si le login est le bon alors tu crées une session
                header('Location: adminPaintins.php'); // Et redirige sur la page manageAdminList.php 
            }else{
                $errorMessageConnection['errorLoginOrPassword'] = '<i class="fas fa-exclamation-triangle mr-2"></i> Mauvais login ou mot de passe';
            }
        }
}
