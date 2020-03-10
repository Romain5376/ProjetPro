<?php
require_once '../Controllers/connection-adminPaintinsCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Projet pro</title>
</head>

<body class="black">

    <div class="container" id="connectionBase">
        <div class="row">
            <form action="" class="col l12 m12 s12" id="connectionForm" method="POST">
                <div class="row">
                    <div class="input-field inputConnectionForm col l12 m12 s12">
                        <input id="login" type="text" class="validate" name="login" />
                        <label class="black-text" for="login">Login</label>
                        <?php
                        if (empty($_POST['password'])) {
                        ?>
                            <span class="deep-purple-text"><?= isset($errorMessageConnection['loginEmpty']) ? $errorMessageConnection['loginEmpty'] : '' ?></span>
                        <?php
                        } else {
                        ?>
                            <span class="deep-purple-text"><?= isset($errorMessageConnection['errorLoginOrPassword']) ? $errorMessageConnection['errorLoginOrPassword'] : '' ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field inputConnectionForm col l12 m12 s12">
                        <input id="password" type="password" class="validate" name="password" />
                        <label class="black-text" for="password">Mot de passe</label>
                        <?php
                        if (empty($_POST['password'])) {
                        ?>
                            <span class="deep-purple-text"><?= isset($errorMessageConnection['passwordEmpty']) ? $errorMessageConnection['passwordEmpty'] : '' ?></span>
                        <?php
                        } else {
                        ?>
                            <span class="deep-purple-text"><?= isset($errorMessageConnection['errorLoginOrPassword']) ? $errorMessageConnection['errorLoginOrPassword'] : '' ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col l12 m12 s12 center-align">
                        <button type="submit" class="waves-effect waves-light btn-small pink" name="connection">Connexion</button>
                        <a class="waves-effect waves-light btn-small pink" href="../index.php">Retour</a>
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