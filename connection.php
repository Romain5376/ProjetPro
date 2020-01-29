<?php
if (isset($_POST['connection']) && empty($arrayError)) {
    $_SESSION['login'] = htmlspecialchars($_POST['login']);
    $_SESSION['password'] = htmlspecialchars($_POST['password']);
    header('location: admin.php');
};

$arrayError = []; // Tableau des regexs
$regexLogin = '/^[-A-Za-z ].{2,18}$/'; //Regex Nom et prénom (Majuscule, minuscule, espace et tiret accepté)
$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/'; //Regex mot de passe (au moins 1 majuscule, 1 minuscule et 1 caratère spécial)

if (isset($_POST['login'])) { //Si le champs login existe
    if (!preg_match($regexLogin, $_POST['login'])) { //Si le champs login n'est pas conforme à la regex 
        $arrayError['login'] = '<i class="fas fa-exclamation-triangle mr-2"></i>Veuillez respecter le format !'; //Alors tu affiches ce type d'erreur
    };
    if (empty($_POST['login'])) { //Si le champs login est vide
        $arrayError['login'] = '<i class="fas fa-exclamation-triangle mr-2"></i>Veuillez rentrer votre login !'; //Alors tu affiches ce type d'erreur
    };
};

if (isset($_POST['password'])) { //Si le champs password existe
    if (!preg_match($regexPassword, $_POST['password'])) { //Si le champs password n'est pas conforme à la regex
        $arrayError['password'] = '<i class="fas fa-exclamation-triangle mr-2"></i>Veuillez respecter le format !'; //Alors tu affiches ce type d'erreur
    };
    if (empty($_POST['password'])) { //Si le champs password est vide
        $arrayError['password'] = '<i class="fas fa-exclamation-triangle mr-2"></i>Veuillez rentrer votre mot de passe !'; //Alors tu affiches ce type d'erreur
    };
};
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Projet pro</title>
</head>

<body class="black">

    <div class="container" id="connectionBase">
        <div class="row">
            <form class="col l12 m12 s12" id="connectionForm" method="POST">
                <div class="row">
                    <div class="input-field inputConnectionForm col l12 m12 s12">
                        <input id="login" type="text" class="validate" name="login">
                        <label class="black-text" for="login">Login</label>
                        <span class="text-warning font-weight-bold"><?= isset($arrayError['login']) ? $arrayError['login'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field inputConnectionForm col l12 m12 s12">
                        <input id="password" type="password" class="validate" name="password">
                        <label class="black-text" for="password">Mot de passe</label>
                        <span class="text-warning font-weight-bold"><?= isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col l12 m12 s12 center-align">
                        <a class="waves-effect waves-light btn-small pink" name="connection" href="admin.php">Connexion</a>
                        <a class="waves-effect waves-light btn-small pink" href="index.php">Retour</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Script jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>

</body>

</html>