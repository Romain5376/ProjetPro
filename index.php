<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Projet pro</title>
</head>

<body>

    <div class="row" id="marginBottomRow">
        <div class="col l12 m12 s12" id="paddingCol">

            <!--Navbar-->
            <nav class="nav-extended white">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo" id="titleNav">My Little Gallery</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="black-text linkNav" href="index.php">Accueil</a></li>
                        <li><a class="black-text linkNav" href="Views/gallery.php">Galerie</a></li>
                    </ul>
                </div>
            </nav>
            <!--/Navbar-->

            <ul class="sidenav" id="mobile-demo">
                <li><a class="linkNav" href="index.php">Accueil</a></li>
                <li><a class="linkNav" href="Views/gallery.php">Galerie</a></li>
            </ul>
            <!--/Navbar-->

            <div class="container">
                <div class="row center-align">

                    <div class="row center-align marginTop" id="presentationCardsRow">
                        <div class="col l12 col m12 col s12 center-align">
                            <!--Card-->
                            <div class="col l3 col m6 col s12">
                                <div class="card-panel black">
                                    <p class="fontFamilyCvTitle">Formation</p>
                                    <p class="white-text contentCvCard">- Ecole d'art du Bourny à Laval: initiation à l'aquarelle. <br />
                                        - Ecole d'art de Laval : dessin, pastel, peinture à l'huile et modèle vivant.
                                    </p>
                                </div>
                            </div>
                            <!--/Card-->

                            <!--Card-->
                            <div class="col l3 col m6 col s12">
                                <div class="card-panel" id="picturePresentation">
                                    <div class="card-image"></div>
                                </div>
                            </div>
                            <!--/Card-->

                            <!--Card-->
                            <div class="col l3 col m6 col s12">
                                <div class="card-panel">
                                    <p class="fontFamilyCvTitle black-text">Exposition</p>
                                    <p class="contentCvCard">- Exposition au théâtre de Laval en 2009 <br />
                                        - Exposition école de la Perrine à Laval en Novembre et Décembre 2013 <br />
                                        - Exposition école de la Perrine à Laval en Novembre et Décembre 2014 <br />
                                        - Exposition au musée de la Scoman en 2014 <br />
                                        - Exposition à Mettmann (Allemagne) en 2015 <br />
                                        - Exposition à Morsiglia (Corse) en 2015 et 2017 <br />
                                        - Exposition à Codrimoge à Château-Gontier(Mayenne) en 2017
                                    </p>
                                </div>
                            </div>
                            <!--/Card-->

                            <!--Card-->
                            <div class="col l3 col m6 col s12">
                                <div class="card-panel black">
                                    <p class="fontFamilyCvTitle">Projet(s)</p>
                                    <p class="white-text contentCvCard">- Exposante en Avril 2020 au festival du premier roman à Laval (Mayenne)</p>
                                </div>
                            </div>
                            <!--/Card-->
                        </div>
                    </div>

                    <blockquote class="center-align">
                        <p>
                            <i class="fas fa-quote-left"></i>
                            Artiste autodidacte, ma peinture est le reflet d'un travail solitaire qui doit être inspiré sinon le chemin est difficile.<br />
                            Ces réalisations génèrent curiosité et humilité par rapport à ma propre création.
                            <i class="fas fa-quote-right"></i>
                        </p>
                        <footer>- Françoise Chouzenoux</footer>
                    </blockquote>

                </div>
            </div>

            <!-- Footer -->
            <footer class="page-footer white z-depth-3">
                <div class="row center-align noMarginRow">
                    <div class="col l3 offset-l3 col m12 col s12">
                        <div class="row center-align">
                            <div class="col l6 offset-l3 col m12 col s12">
                                <p class="footerTitle">Informations</p>
                            </div>
                        </div>

                        <div class="row center-align">
                            <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                <!--Mentions Légales-->
                                <a class="waves-effect waves-light modal-trigger linkFooter" href="#mentionsModal">Mentions Légales</a>
                                <!--/Mentions Légales-->

                                <!--Modal Mentions Légales-->
                                <div id="mentionsModal" class="modal modal-fixed-footer">
                                    <div class="modal-content black-text">
                                        <h2>Informations légales</h2>
                                        <h3>1. Présentation du site.</h3>
                                        <p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p>
                                        <p><strong>Propriétaire</strong> : Françoise Chouzenoux – ... – ...<br />
                                            <strong>Créateur</strong> : <a class="black-text" href="....">Marcadet Romain</a><br />
                                            <strong>Responsable publication</strong> : Romain Marcadet – marcadetr@gmail.com<br />
                                            Le responsable publication est une personne physique ou une personne morale.<br />
                                            <strong>Webmaster</strong> : Marcadet Romain – marcadetr@gmail.com<br />
                                            <strong>Hébergeur</strong> : .... – ...<br />
                                            Crédits : Françoise Chouzenoux<br />
                                            Le modèle de mentions légales est offert par Subdelirium.com <a class="black-text" target="_blank" href="https://www.subdelirium.com/generateur-de-mentions-legales/" alt="generateur de mentions légales">Générateur de mentions légales</a></p>

                                        <h3>2. Conditions générales d’utilisation du site et des services proposés.</h3>
                                        <p>L’utilisation du site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> sont donc invités à les consulter de manière régulière.</p>
                                        <p>Ce site est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de maintenance technique peut être toutefois décidée par Françoise Chouzenoux, qui s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.</p>
                                        <p>Le site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> est mis à jour régulièrement par Romain Marcadet. De la même façon, les mentions légales peuvent être modifiées à tout moment : elles s’imposent néanmoins à l’utilisateur qui est invité à s’y référer le plus souvent possible afin d’en prendre connaissance.</p>
                                        <h3>3. Description des services fournis.</h3>
                                        <p>Le site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> a pour objet de fournir une information concernant l’ensemble des oeuvres qui appartiennent à Françoise Chouzenoux.</p>
                                        <p>Françoise Chouzenoux s’efforce de fournir sur le site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> des informations aussi précises que possible. Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.</p>
                                        <p>Tous les informations indiquées sur le site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> sont données à titre indicatif, et sont susceptibles d’évoluer. Par ailleurs, les renseignements figurant sur le site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> ne sont pas exhaustifs. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne.</p>
                                        <h3>4. Limitations contractuelles sur les données techniques.</h3>
                                        <p>Le site utilise la technologie JavaScript.</p>
                                        <p>Le site Internet ne pourra être tenu responsable de dommages matériels liés à l’utilisation du site. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</p>
                                        <h3>5. Propriété intellectuelle et contrefaçons.</h3>
                                        <p>Françoise Chouzenoux est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels.</p>
                                        <p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : Françoise Chouzenoux.</p>
                                        <p>Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p>
                                        <h3>6. Limitations de responsabilité.</h3>
                                        <p>Françoise Chouzenoux ne pourra être tenue responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site My Little Gallery, et résultant soit de l’utilisation d’un matériel ne répondant pas aux spécifications indiquées au point 4, soit de l’apparition d’un bug ou d’une incompatibilité.</p>
                                        <p>Françoise Chouzenoux ne pourra également être tenue responsable des dommages indirects (tels par exemple qu’une perte de marché ou perte d’une chance) consécutifs à l’utilisation du site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a>.</p>
                                        <p>Des espaces interactifs (possibilité de poser des questions grâce à l'addresse de mail Mme Françoise Chouzenoux) sont à la disposition des utilisateurs. Françoise Chouzenoux se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant, Françoise Chouzenoux se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie…).</p>
                                        <h3>7. Droit applicable et attribution de juridiction.</h3>
                                        <p>Tout litige en relation avec l’utilisation du site <a class="black-text" href="http://My Little Gallery/">My Little Gallery</a> est soumis au droit français. Il est fait attribution exclusive de juridiction aux tribunaux compétents de Paris.</p>
                                        <h3>8. Les principales lois concernées.</h3>
                                        <p>Loi n° 78-17 du 6 janvier 1978, notamment modifiée par la loi n° 2004-801 du 6 août 2004 relative à l'informatique, aux fichiers et aux libertés.</p>
                                        <p> Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.</p>
                                    </div>
                                </div>
                                <!--/Modal Mentions Légales-->
                            </div>
                        </div>

                        <div class="row center-align">
                            <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                <!--Bouton Contact-->
                                <a class="waves-effect waves-light modal-trigger linkFooter" href="#mailModal">Contact</a>
                                <!--/Bouton Contact-->

                                <!--Modal Contact-->
                                <div id="mailModal" class="modal">
                                    <div class="modal-content black-text">
                                        <h4>Contact</h4>
                                        <p>Nom: Chouzenoux</p>
                                        <p>Prénom: Françoise</p>
                                        <p>Adresse mail:
                                            <a href="mailto:">chouzenoux.alain@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                                <!--/Modal Contact-->
                            </div>
                        </div>
                    </div>

                    <div class="col l3 col m12 col s12">
                        <div class="row center-align">
                            <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                <p class="footerTitle">Navigation</p>
                            </div>
                        </div>

                        <div class="row center-align">
                            <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                <!--Bouton Accueil-->
                                <a class="waves-effect waves-light modal-trigger linkFooter" href="Views/gallery.php">Galerie</a>
                                <!--/Bouton Accueil-->
                            </div>
                        </div>

                        <div class="row center-align">
                            <div class="col l6 offset-l3 col m6 offset-m3 col s6 offset-s3">
                                <!--Bouton Contact-->
                                <a class="waves-effect waves-light modal-trigger" id="connectionLink" href="Views/connection-adminPaintins.php">Connexion</a>
                                <!--/Bouton Contact-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-copyright white">
                    <div class="container center-align black-text">© 2019-2020 Copyright Marcadet Romain & Françoise Chouzenoux</div>
                </div>
            </footer>
            <!--/Footer-->

        </div>
    </div>
    <!--Script jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.modal').modal();
        });
    </script>

</body>

</html>