-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 mars 2020 à 07:43
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `codex`
--
CREATE DATABASE IF NOT EXISTS `codex` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `codex`;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lastname` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `bitrhDate` date NOT NULL,
  `address` varchar(20) DEFAULT NULL,
  `phoneNumber` varchar(10) DEFAULT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `zipCode` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Base de données :  `colyseum`
--
CREATE DATABASE IF NOT EXISTS `colyseum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `colyseum`;

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `clientId` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bookings`
--

INSERT INTO `bookings` (`id`, `clientId`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25);

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cardNumber` int(10) UNSIGNED NOT NULL,
  `cardTypesId` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `cardNumber`, `cardTypesId`) VALUES
(1, 2627, 3),
(2, 2022, 3),
(3, 2608, 3),
(4, 2377, 1),
(5, 1869, 4),
(6, 2403, 4),
(7, 1263, 3),
(8, 2198, 1),
(9, 2927, 2),
(10, 2775, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cardtypes`
--

DROP TABLE IF EXISTS `cardtypes`;
CREATE TABLE IF NOT EXISTS `cardtypes` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cardtypes`
--

INSERT INTO `cardtypes` (`id`, `type`, `discount`) VALUES
(1, 'Fidélité', 20),
(2, 'Famille Nombreuse', 30),
(3, 'Etudiant', 40),
(4, 'Employé', 50),
(5, 'Fidélité', 20),
(6, 'Famille Nombreuse', 30),
(7, 'Etudiant', 40),
(8, 'Employé', 50),
(9, 'Fidélité', 20),
(10, 'Famille Nombreuse', 30),
(11, 'Etudiant', 40),
(12, 'Employé', 50);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lastName` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `birthDate` date NOT NULL,
  `card` tinyint(1) NOT NULL,
  `cardNumber` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `lastName`, `firstName`, `birthDate`, `card`, `cardNumber`) VALUES
(1, 'Brennan', 'Guinevere', '1994-02-05', 1, 2627),
(2, 'Dean', 'Ori', '1973-11-23', 0, NULL),
(3, 'Sharpe', 'Nora', '1983-03-10', 0, NULL),
(4, 'Hampton', 'Wade', '2000-03-05', 1, 2022),
(5, 'Conner', 'Kibo', '1979-11-04', 0, NULL),
(6, 'Klein', 'Hilary', '1972-12-16', 0, NULL),
(7, 'Tyler', 'Lawrence', '1996-05-13', 0, NULL),
(8, 'Dudley', 'Tanya', '1966-12-28', 0, NULL),
(9, 'Terrell', 'Kim', '1997-07-27', 1, 2608),
(10, 'Mclaughlin', 'Laura', '1977-02-16', 0, NULL),
(11, 'Lewis', 'Linda', '1983-07-18', 0, NULL),
(12, 'Ware', 'Gemma', '1969-10-17', 1, 2377),
(13, 'Roth', 'Jolie', '1981-02-24', 0, NULL),
(14, 'Michael', 'Harriet', '1961-11-27', 1, 1869),
(15, 'Simpson', 'Paloma', '1998-01-07', 0, NULL),
(16, 'Cote', 'Fulton', '1967-11-01', 1, 2403),
(17, 'Wheeler', 'Echo', '1965-10-10', 0, NULL),
(18, 'Snider', 'Desiree', '1996-07-28', 0, NULL),
(19, 'Vaughan', 'Vanna', '1992-09-13', 1, 1263),
(20, 'Barnes', 'Preston', '1988-12-20', 1, 2198),
(21, 'Padilla', 'Britanney', '2015-04-03', 1, 2927),
(22, 'Perry', 'Gabriel', '1974-04-09', 1, 2775),
(23, 'Mccormick', 'Hyatt', '1968-05-02', 0, NULL),
(24, 'Stark', 'Keiko', '1985-04-08', 0, NULL),
(25, 'London', 'Sean', '1975-02-02', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre` varchar(45) NOT NULL,
  `showTypesId` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `genre`, `showTypesId`) VALUES
(1, 'Variété et chanson française', 1),
(2, 'Variété internationale', 1),
(3, 'Pop/Rock', 1),
(4, 'Musique électronique', 1),
(5, 'Folk', 1),
(6, 'Rap', 1),
(7, 'Hip Hop', 1),
(8, 'Slam', 1),
(9, 'Reggae', 1),
(10, 'Clubbing', 1),
(11, 'RnB', 1),
(12, 'Soul', 1),
(13, 'Funk', 1),
(14, 'Jazz', 1),
(15, 'Blues', 1),
(16, 'Country', 1),
(17, 'Gospel', 1),
(18, 'Musique du monde', 1),
(19, 'Classique', 1),
(20, 'Opéra', 1),
(21, 'Autres', 1),
(22, 'Drame', 2),
(23, 'Comédie', 2),
(24, 'Comtemporain', 2),
(25, 'Monologue', 2),
(26, 'One Man / Woman Show', 3),
(27, 'Café-Théâtre', 3),
(28, 'Stand Up', 3),
(29, 'Autres', 3),
(30, 'Comtemporaine', 4),
(31, 'Classique', 4),
(32, 'Urbaine', 4),
(33, 'Variété et chanson française', 1),
(34, 'Variété internationale', 1),
(35, 'Pop/Rock', 1),
(36, 'Musique électronique', 1),
(37, 'Folk', 1),
(38, 'Rap', 1),
(39, 'Hip Hop', 1),
(40, 'Slam', 1),
(41, 'Reggae', 1),
(42, 'Clubbing', 1),
(43, 'RnB', 1),
(44, 'Soul', 1),
(45, 'Funk', 1),
(46, 'Jazz', 1),
(47, 'Blues', 1),
(48, 'Country', 1),
(49, 'Gospel', 1),
(50, 'Musique du monde', 1),
(51, 'Classique', 1),
(52, 'Opéra', 1),
(53, 'Autres', 1),
(54, 'Drame', 2),
(55, 'Comédie', 2),
(56, 'Comtemporain', 2),
(57, 'Monologue', 2),
(58, 'One Man / Woman Show', 3),
(59, 'Café-Théâtre', 3),
(60, 'Stand Up', 3),
(61, 'Autres', 3),
(62, 'Comtemporaine', 4),
(63, 'Classique', 4),
(64, 'Urbaine', 4);

-- --------------------------------------------------------

--
-- Structure de la table `shows`
--

DROP TABLE IF EXISTS `shows`;
CREATE TABLE IF NOT EXISTS `shows` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `performer` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `showTypesId` smallint(5) UNSIGNED NOT NULL,
  `firstGenresId` smallint(5) UNSIGNED NOT NULL,
  `secondGenreId` smallint(5) UNSIGNED NOT NULL,
  `duration` time NOT NULL,
  `startTime` time NOT NULL,
  `pictures` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shows`
--

INSERT INTO `shows` (`id`, `title`, `performer`, `date`, `showTypesId`, `firstGenresId`, `secondGenreId`, `duration`, `startTime`, `pictures`) VALUES
(1, 'Vestibulum accumsan', 'Osborn', '2016-10-15', 1, 4, 3, '02:00:00', '20:00:00', 'assets/img/osborn.jpg'),
(2, 'Venenatis lacus', 'Dale', '2017-01-05', 1, 1, 8, '02:00:00', '20:00:00', 'assets/img/dale.jpg'),
(3, 'Sem egestas', 'Juarez', '2017-02-01', 1, 8, 21, '02:00:00', '20:00:00', 'assets/img/juarez.jpg'),
(4, 'Nec urna', 'Tate', '2018-05-02', 1, 3, 21, '02:00:00', '20:00:00', 'assets/img/tate.jpg'),
(5, 'Neque et', 'Hays', '2016-12-24', 1, 6, 15, '02:00:00', '20:00:00', 'assets/img/hays.jpg'),
(6, 'Convallis convallis', 'Boone', '2019-12-18', 1, 9, 21, '02:00:00', '20:00:00', 'assets/img/boone.jpg'),
(7, 'Cursus. Nunc', 'Prince', '2020-05-02', 1, 6, 10, '02:00:00', '20:00:00', 'assets/img/prince.jpg'),
(8, 'Ornare lectus', 'Butler', '2016-12-25', 1, 10, 9, '02:00:00', '20:00:00', 'assets/img/butler.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `showtypes`
--

DROP TABLE IF EXISTS `showtypes`;
CREATE TABLE IF NOT EXISTS `showtypes` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `showtypes`
--

INSERT INTO `showtypes` (`id`, `type`) VALUES
(1, 'Concert'),
(2, 'Théâtre'),
(3, 'Humour'),
(4, 'Danse');

-- --------------------------------------------------------

--
-- Structure de la table `show_admin`
--

DROP TABLE IF EXISTS `show_admin`;
CREATE TABLE IF NOT EXISTS `show_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_login` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `show_shows`
--

DROP TABLE IF EXISTS `show_shows`;
CREATE TABLE IF NOT EXISTS `show_shows` (
  `shows_id` int(11) NOT NULL AUTO_INCREMENT,
  `shows_title` varchar(100) NOT NULL,
  `shows_performer` varchar(100) NOT NULL,
  `shows_date` date NOT NULL,
  `shows_duration` datetime NOT NULL,
  `shows_startTime` datetime NOT NULL,
  `shows_pictures` varchar(100) NOT NULL,
  PRIMARY KEY (`shows_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `show_showtypes`
--

DROP TABLE IF EXISTS `show_showtypes`;
CREATE TABLE IF NOT EXISTS `show_showtypes` (
  `showTypes_id` int(11) NOT NULL AUTO_INCREMENT,
  `showTypes_type` varchar(100) NOT NULL,
  `shows_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`showTypes_id`),
  KEY `show_showTypes_show_shows_FK` (`shows_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `bookingsId` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `price`, `bookingsId`) VALUES
(1, 40, 1),
(2, 40, 1),
(3, 40, 1),
(4, 40, 1),
(5, 40, 1),
(6, 40, 2),
(7, 40, 2),
(8, 40, 2),
(9, 40, 2),
(10, 40, 2),
(11, 40, 3),
(12, 40, 3),
(13, 40, 3),
(14, 40, 4),
(15, 40, 5),
(16, 40, 6),
(17, 40, 6),
(18, 40, 6),
(19, 40, 6),
(20, 40, 6),
(21, 40, 7),
(22, 40, 7),
(23, 40, 8),
(24, 40, 9),
(25, 40, 9),
(26, 40, 9),
(27, 40, 9),
(28, 40, 9),
(29, 40, 9),
(30, 40, 9),
(31, 40, 10),
(32, 40, 10),
(33, 40, 10),
(34, 40, 10),
(35, 40, 11),
(36, 40, 11),
(37, 40, 11),
(38, 40, 11),
(39, 40, 11),
(40, 40, 11),
(41, 40, 12),
(42, 40, 12),
(43, 40, 12),
(44, 40, 12),
(45, 40, 12),
(46, 40, 12),
(47, 40, 12),
(48, 40, 12),
(49, 40, 12),
(50, 40, 12),
(51, 40, 13),
(52, 40, 13),
(53, 40, 13),
(54, 40, 13),
(55, 40, 13),
(56, 40, 13),
(57, 40, 13),
(58, 40, 13),
(59, 40, 13),
(60, 40, 13),
(61, 40, 14),
(62, 40, 14),
(63, 40, 14),
(64, 40, 15),
(65, 40, 15),
(66, 40, 15),
(67, 40, 15),
(68, 40, 16),
(69, 40, 17),
(70, 40, 17),
(71, 40, 17),
(72, 40, 17),
(73, 40, 17),
(74, 40, 18),
(75, 40, 18),
(76, 40, 18),
(77, 40, 18),
(78, 40, 19),
(79, 40, 19),
(80, 40, 19),
(81, 40, 19),
(82, 40, 20),
(83, 40, 20),
(84, 40, 20),
(85, 40, 21),
(86, 40, 21),
(87, 40, 21),
(88, 40, 21),
(89, 40, 22),
(90, 40, 22),
(91, 40, 22),
(92, 40, 23),
(93, 40, 23),
(94, 40, 23),
(95, 40, 24),
(96, 40, 24),
(97, 40, 24),
(98, 40, 25),
(99, 40, 25),
(100, 40, 25);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `show_showtypes`
--
ALTER TABLE `show_showtypes`
  ADD CONSTRAINT `show_showTypes_show_shows_FK` FOREIGN KEY (`shows_id`) REFERENCES `show_shows` (`shows_id`);
--
-- Base de données :  `development`
--
CREATE DATABASE IF NOT EXISTS `development` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `development`;

-- --------------------------------------------------------

--
-- Structure de la table `frameworks`
--

DROP TABLE IF EXISTS `frameworks`;
CREATE TABLE IF NOT EXISTS `frameworks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `languagesId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `frameworks`
--

INSERT INTO `frameworks` (`id`, `name`, `languagesId`) VALUES
(1, 'Qt', 3),
(2, 'SDK Android', 4),
(3, 'Bootstrap', 6),
(4, 'Foundation', 6),
(5, 'KNACSS', 6),
(6, 'Avalanche', 6),
(7, 'Miligram', 6),
(8, 'Skeleton', 6),
(9, 'Hoisin', 6),
(10, 'Inuit', 6),
(11, 'Mimic', 6),
(12, 'Ministrap', 6),
(13, 'Lotus', 6),
(14, 'Jquery', 7),
(15, 'Angular', 7),
(16, 'ReactJS', 7),
(17, 'Vue.js', 7),
(18, 'Ember.js', 7),
(19, 'Meteor.js', 7),
(20, 'Laravel', 8),
(21, 'Symfony', 8),
(22, 'CodeIgniter', 8),
(23, 'Yii', 8),
(24, 'Phalcon', 8),
(25, 'Lumen', 8),
(26, 'Silex', 8),
(27, 'Slim', 8),
(28, '.NET', 9),
(29, '.NET', 10),
(30, 'Django', 11),
(31, 'Ruby On Rails', 12);

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'Assembleur'),
(2, 'C'),
(3, 'C++'),
(4, 'Java'),
(5, 'HTML'),
(6, 'CSS'),
(7, 'JavaScript'),
(8, 'PHP'),
(9, 'C#'),
(10, 'VB'),
(11, 'Python'),
(12, 'Ruby'),
(13, 'Swift');
--
-- Base de données :  `gallery`
--
CREATE DATABASE IF NOT EXISTS `gallery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gallery`;

-- --------------------------------------------------------

--
-- Structure de la table `gallery_admin`
--

DROP TABLE IF EXISTS `gallery_admin`;
CREATE TABLE IF NOT EXISTS `gallery_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_login` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_admin`
--

INSERT INTO `gallery_admin` (`admin_id`, `admin_login`, `admin_password`) VALUES
(1, 'Françoise', '$2y$12$w.Cg2VL8I9MMwVkUWBWZZur8LrorUP8VAV35a31Y96KBU.eMFGiW6'),
(2, 'Romain', '$2y$12$9DaxdXQFznzog9kfsq7tAOObtN8.mrQvVt2GVgh8oigp8OEITdkJ.');

-- --------------------------------------------------------

--
-- Structure de la table `gallery_category`
--

DROP TABLE IF EXISTS `gallery_category`;
CREATE TABLE IF NOT EXISTS `gallery_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_categories` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_category`
--

INSERT INTO `gallery_category` (`category_id`, `category_categories`) VALUES
(1, 'Lever de rideau'),
(2, 'Lubie sur la chaussure'),
(3, 'Natures mortes'),
(4, 'Les aplats'),
(5, 'L\'ombre de la Corse'),
(6, 'Baisser de rideau');

-- --------------------------------------------------------

--
-- Structure de la table `gallery_dimension`
--

DROP TABLE IF EXISTS `gallery_dimension`;
CREATE TABLE IF NOT EXISTS `gallery_dimension` (
  `dimension_id` int(11) NOT NULL AUTO_INCREMENT,
  `dimension_dimensions` varchar(100) NOT NULL,
  PRIMARY KEY (`dimension_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_dimension`
--

INSERT INTO `gallery_dimension` (`dimension_id`, `dimension_dimensions`) VALUES
(1, '120cm x 80cm'),
(2, '100cm x 80cm'),
(3, '100cm x 65cm'),
(4, '92cm x 60cm'),
(5, '90cm x 90cm'),
(6, '81cm x 65cm'),
(7, '81cm x 55cm'),
(8, '80cm x 80cm'),
(9, '73cm x 60cm'),
(10, '73cm x 54cm'),
(11, '70cm x 70cm'),
(12, '65cm x 54cm'),
(13, '60cm x 60cm'),
(14, '60cm x 50cm'),
(15, '46cm x 38cm'),
(16, '40cm x 40cm'),
(17, '30cm x 30cm'),
(18, '92cm x 73cm'),
(19, '65cm x 54cm');

-- --------------------------------------------------------

--
-- Structure de la table `gallery_paintin`
--

DROP TABLE IF EXISTS `gallery_paintin`;
CREATE TABLE IF NOT EXISTS `gallery_paintin` (
  `paintin_id` int(11) NOT NULL AUTO_INCREMENT,
  `paintin_files` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `dimension_id` int(11) NOT NULL,
  PRIMARY KEY (`paintin_id`),
  KEY `gallery_paintin_gallery_category_FK` (`category_id`),
  KEY `gallery_paintin_gallery_dimension0_FK` (`dimension_id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_paintin`
--

INSERT INTO `gallery_paintin` (`paintin_id`, `paintin_files`, `category_id`, `dimension_id`) VALUES
(1, '../assets/img/IMG_0798.jpeg', 1, 2),
(2, '../assets/img/IMG_0343.JPG', 1, 5),
(3, '../assets/img/IMG_0061.JPEG', 1, 14),
(4, '../assets/img/IMG_0797.jpeg', 1, 6),
(5, '../assets/img/IMG_0322.jpeg', 1, 1),
(6, '../assets/img/IMG_0481.jpeg', 1, 8),
(7, '../assets/img/IMG_0600.jpeg', 1, 6),
(8, '../assets/img/IMG_0310.jpeg', 1, 14),
(9, '../assets/img/IMG_0601.jpeg', 1, 8),
(10, '../assets/img/IMG_0320.JPG', 2, 13),
(11, '../assets/img/IMG_0335.JPG', 2, 4),
(12, '../assets/img/IMG_0311.jpeg', 2, 13),
(13, '../assets/img/IMG_0321.JPG', 2, 9),
(14, '../assets/img/IMG_0615.jpeg', 2, 15),
(15, '../assets/img/IMG_0325.JPG', 3, 9),
(16, '../assets/img/IMG_0316.jpeg', 3, 9),
(17, '../assets/img/IMG_0799.jpeg', 3, 9),
(18, '../assets/img/IMG_0324.JPG', 3, 9),
(19, '../assets/img/IMG_0315.JPG', 3, 1),
(20, '../assets/img/IMG_0303.jpeg', 3, 10),
(21, '../assets/img/IMG_0306.jpeg', 3, 10),
(22, '../assets/img/IMG_0622.jpeg', 3, 17),
(23, '../assets/img/IMG_0623.jpeg', 3, 17),
(24, '../assets/img/IMG_0339.JPG', 3, 14),
(25, '../assets/img/IMG_0363.jpeg', 3, 7),
(26, '../assets/img/IMG_0420.jpeg', 4, 9),
(27, '../assets/img/IMG_0338.JPG', 4, 14),
(28, '../assets/img/IMG_0359.jpeg', 4, 1),
(29, '../assets/img/IMG_0330.JPG', 4, 18),
(30, '../assets/img/IMG_0331.JPG', 4, 4),
(31, '../assets/img/IMG_0332.JPG', 4, 12),
(32, '../assets/img/IMG_0348.JPG', 4, 12),
(33, '../assets/img/IMG_0603.JPG', 4, 16),
(34, '../assets/img/IMG_0800.jpeg', 4, 11),
(35, '../assets/img/IMG_0362.jpeg', 5, 9),
(36, '../assets/img/IMG_0361.jpeg', 5, 16),
(37, '../assets/img/IMG_0357.JPG', 5, 8),
(38, '../assets/img/IMG_0356.JPG', 5, 11),
(39, '../assets/img/IMG_0364.jpeg', 5, 9),
(40, '../assets/img/IMG_0355.JPG', 5, 9),
(41, '../assets/img/IMG_0611.jpeg', 5, 5),
(42, '../assets/img/IMG_0337.JPG', 5, 11),
(43, '../assets/img/IMG_0360.jpeg', 5, 3),
(44, '../assets/img/IMG_0482.jpeg', 5, 4),
(45, '../assets/img/IMG_0344.jpeg', 6, 11),
(46, '../assets/img/IMG_0687.JPG', 6, 4),
(47, '../assets/img/IMG_0773.jpeg', 6, 8),
(48, '../assets/img/IMG_0780.jpeg', 3, 16);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gallery_paintin`
--
ALTER TABLE `gallery_paintin`
  ADD CONSTRAINT `gallery_paintin_gallery_category_FK` FOREIGN KEY (`category_id`) REFERENCES `gallery_category` (`category_id`),
  ADD CONSTRAINT `gallery_paintin_gallery_dimension0_FK` FOREIGN KEY (`dimension_id`) REFERENCES `gallery_dimension` (`dimension_id`);
--
-- Base de données :  `hospitale2n`
--
CREATE DATABASE IF NOT EXISTS `hospitale2n` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hospitale2n`;

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateHour` datetime NOT NULL,
  `idPatients` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_appointments_id_patients` (`idPatients`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`id`, `dateHour`, `idPatients`) VALUES
(1, '2020-02-18 15:00:00', 1),
(2, '2020-02-19 20:00:00', 1),
(5, '2020-02-17 10:00:00', 2),
(9, '2020-02-17 07:23:00', 30);

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES
(1, 'Marcadet', 'Romain', '1992-05-11', '1234567890', 'marcadet@romain.com'),
(2, 'Va', 'Nicolas', '2020-02-11', '0645450000', 'vallois.nicolas@gmail.com'),
(4, 'Cousin', 'Véronique', '1963-10-16', '0670610000', 'cousin@veronique.com'),
(18, 'Queen', 'Harley', '2020-02-12', '0645450000', 'harley-queen@gmail.com'),
(19, 'Le', 'Joker', '2020-02-26', '0645450000', 'leJoker@gmail.com'),
(20, 'Stark', 'Tony', '2020-02-19', '0645450000', 'ironman@gmail.com'),
(21, 'Marcadet', 'Mathieu', '1989-12-08', '0600000000', 'marcadet.mathieu@gmail.com'),
(22, 'Mounivongs', 'Anousone', '1979-05-23', '0600000000', 'anousone@gmail.com'),
(30, 'anou', 'Léa', '2020-02-17', '06-35-45-45-45', 'marcadet@romain.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_appointments_id_patients` FOREIGN KEY (`idPatients`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
--
-- Base de données :  `pictures`
--
CREATE DATABASE IF NOT EXISTS `pictures` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pictures`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `categories`) VALUES
(1, 'flat'),
(2, 'wood'),
(3, 'perso'),
(4, 'kitchen'),
(5, 'tissue');

-- --------------------------------------------------------

--
-- Structure de la table `paintin`
--

DROP TABLE IF EXISTS `paintin`;
CREATE TABLE IF NOT EXISTS `paintin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `files` varchar(50) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paintin`
--

INSERT INTO `paintin` (`id`, `files`, `categoryId`) VALUES
(1, 'assets/imgAplats/IMG_0330.JPG', 1),
(2, 'assets/imgAplats/IMG_0331.JPG', 1),
(3, 'assets/imgAplats/IMG_0332.JPG', 1),
(4, 'assets/imgAplats/IMG_0347.JPG', 1),
(5, 'assets/imgAplats/IMG_0348.JPG', 1),
(6, 'assets/imgAplats/IMG_0352.JPG', 1),
(7, 'assets/imgAplats/IMG_0359.jpeg', 1),
(8, 'assets/imgBlancPerso/IMG_0337.JPG', 3),
(9, 'assets/imgBlancPerso/IMG_0345.JPG', 3),
(10, 'assets/imgBlancPerso/IMG_0349.JPG', 3),
(11, 'assets/imgBlancPerso/IMG_0363.jpeg', 3),
(12, 'assets/imgBlancPerso/IMG_0365.jpeg', 3),
(13, 'assets/imgBlancPerso/IMG_0419.jpeg', 3),
(14, 'assets/imgBlancPerso/IMG_0481.jpeg', 3),
(15, 'assets/imgBoisNature/IMG_0338.JPG 	', 2),
(16, 'assets/imgBoisNature/IMG_0340.JPG', 2),
(17, 'assets/imgBoisNature/IMG_0355.JPG', 2),
(18, 'assets/imgBoisNature/IMG_0360.jpeg 	', 2),
(19, 'assets/imgBoisNature/IMG_0364.jpeg', 2),
(20, 'assets/imgBoisNature/IMG_0482.jpeg', 2),
(21, 'assets/imgBouteilleThéCuisine/IMG_0303.jpeg', 4),
(22, 'assets/imgBouteilleThéCuisine/IMG_0306.jpeg 	', 4),
(23, 'assets/imgBouteilleThéCuisine/IMG_0315.JPG 	', 4),
(24, 'assets/imgBouteilleThéCuisine/IMG_0316.jpeg', 4),
(25, 'assets/imgBouteilleThéCuisine/IMG_0324.JPG', 4),
(26, 'assets/imgBouteilleThéCuisine/IMG_0325.JPG', 4),
(27, 'assets/imgBouteilleThéCuisine/IMG_0339.JPG', 4),
(28, 'assets/imgBouteilleThéCuisine/IMG_0346.JPG', 4),
(29, 'assets/imgBouteilleThéCuisine/IMG_0354.JPG', 4),
(30, 'assets/imgBouteilleThéCuisine/IMG_0356.JPG', 4),
(31, 'assets/imgBouteilleThéCuisine/IMG_0357.JPG', 4),
(32, 'assets/imgBouteilleThéCuisine/IMG_0361.jpeg', 4),
(33, 'assets/imgBouteilleThéCuisine/IMG_0362.jpeg', 4),
(34, 'assets/imgChaussuresTissuThéâtre/IMG_0061.JPEG', 5),
(35, 'assets/imgChaussuresTissuThéâtre/IMG_0311.jpeg', 5),
(36, 'assets/imgChaussuresTissuThéâtre/IMG_0320.JPG', 5),
(37, 'assets/imgChaussuresTissuThéâtre/IMG_0321.JPG', 5),
(38, 'assets/imgChaussuresTissuThéâtre/IMG_0335.JPG', 5),
(39, 'assets/imgChaussuresTissuThéâtre/IMG_0341.JPG', 5),
(40, 'assets/imgChaussuresTissuThéâtre/IMG_0342.JPG', 5),
(41, 'assets/imgChaussuresTissuThéâtre/IMG_0343.JPG', 5),
(42, 'assets/imgChaussuresTissuThéâtre/IMG_0350.JPG', 5),
(43, 'assets/imgChaussuresTissuThéâtre/IMG_0420.jpeg', 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `paintin`
--
ALTER TABLE `paintin`
  ADD CONSTRAINT `paintin_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);
--
-- Base de données :  `shows`
--
CREATE DATABASE IF NOT EXISTS `shows` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shows`;

-- --------------------------------------------------------

--
-- Structure de la table `shows_gendershow`
--

DROP TABLE IF EXISTS `shows_gendershow`;
CREATE TABLE IF NOT EXISTS `shows_gendershow` (
  `genderShow_id` int(11) NOT NULL AUTO_INCREMENT,
  `genderShow_gender` varchar(50) NOT NULL,
  PRIMARY KEY (`genderShow_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shows_gendershow`
--

INSERT INTO `shows_gendershow` (`genderShow_id`, `genderShow_gender`) VALUES
(1, 'rap'),
(2, 'latino'),
(3, 'Comédie'),
(4, 'Drame'),
(5, 'Variété française'),
(6, 'dance');

-- --------------------------------------------------------

--
-- Structure de la table `show_admin`
--

DROP TABLE IF EXISTS `show_admin`;
CREATE TABLE IF NOT EXISTS `show_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_login` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `show_admin`
--

INSERT INTO `show_admin` (`admin_id`, `admin_login`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `show_performer`
--

DROP TABLE IF EXISTS `show_performer`;
CREATE TABLE IF NOT EXISTS `show_performer` (
  `performer_id` int(11) NOT NULL AUTO_INCREMENT,
  `performer_name` varchar(50) NOT NULL,
  PRIMARY KEY (`performer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `show_performer`
--

INSERT INTO `show_performer` (`performer_id`, `performer_name`) VALUES
(1, 'Shakira'),
(2, 'PNL'),
(3, 'David Guetta'),
(4, 'Julien Courbet'),
(5, 'Malik Bentalha'),
(6, 'Slimane');

-- --------------------------------------------------------

--
-- Structure de la table `show_shows`
--

DROP TABLE IF EXISTS `show_shows`;
CREATE TABLE IF NOT EXISTS `show_shows` (
  `shows_id` int(11) NOT NULL AUTO_INCREMENT,
  `shows_title` varchar(50) NOT NULL,
  `shows_date` date NOT NULL,
  `shows_duration` time NOT NULL,
  `shows_startTime` time NOT NULL,
  `shows_pictures` varchar(50) NOT NULL,
  `showTypes_id` int(11) NOT NULL,
  `genderShow_id` int(11) NOT NULL,
  `performer_id` int(11) NOT NULL,
  PRIMARY KEY (`shows_id`),
  KEY `show_shows_show_showTypes_FK` (`showTypes_id`),
  KEY `show_shows_shows_genderShow0_FK` (`genderShow_id`),
  KEY `show_shows_show_performer1_FK` (`performer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `show_shows`
--

INSERT INTO `show_shows` (`shows_id`, `shows_title`, `shows_date`, `shows_duration`, `shows_startTime`, `shows_pictures`, `showTypes_id`, `genderShow_id`, `performer_id`) VALUES
(13, 'WakaWaka', '2020-02-20', '02:00:00', '22:00:00', '../assets/img/shakira.jpg', 1, 2, 1),
(14, 'Dans la légende', '2020-02-21', '04:00:00', '20:00:00', '../assets/img/pnl.jpg', 1, 1, 2),
(15, 'Julien Courbet fait son Show', '2020-02-22', '02:00:00', '22:00:00', '../assets/img/julien-courbet-affiche.jpg', 2, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `show_showtypes`
--

DROP TABLE IF EXISTS `show_showtypes`;
CREATE TABLE IF NOT EXISTS `show_showtypes` (
  `showTypes_id` int(11) NOT NULL AUTO_INCREMENT,
  `showTypes_type` varchar(50) NOT NULL,
  PRIMARY KEY (`showTypes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `show_showtypes`
--

INSERT INTO `show_showtypes` (`showTypes_id`, `showTypes_type`) VALUES
(1, 'Concert'),
(2, 'One man show');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `show_shows`
--
ALTER TABLE `show_shows`
  ADD CONSTRAINT `show_shows_show_performer1_FK` FOREIGN KEY (`performer_id`) REFERENCES `show_performer` (`performer_id`),
  ADD CONSTRAINT `show_shows_show_showTypes_FK` FOREIGN KEY (`showTypes_id`) REFERENCES `show_showtypes` (`showTypes_id`),
  ADD CONSTRAINT `show_shows_shows_genderShow0_FK` FOREIGN KEY (`genderShow_id`) REFERENCES `shows_gendershow` (`genderShow_id`);
--
-- Base de données :  `webdevelopment`
--
CREATE DATABASE IF NOT EXISTS `webdevelopment` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webdevelopment`;

-- --------------------------------------------------------

--
-- Structure de la table `frameworks`
--

DROP TABLE IF EXISTS `frameworks`;
CREATE TABLE IF NOT EXISTS `frameworks` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `framework` varchar(20) DEFAULT NULL,
  `version` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `frameworks`
--

INSERT INTO `frameworks` (`id`, `framework`, `version`) VALUES
(1, 'Symfony2', 'version 2.8'),
(2, 'Symfony2', 'version 3'),
(3, 'Jquery', 'version 1.6'),
(4, 'Jquery', 'version 2.10');

-- --------------------------------------------------------

--
-- Structure de la table `ide`
--

DROP TABLE IF EXISTS `ide`;
CREATE TABLE IF NOT EXISTS `ide` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `version` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ide`
--

INSERT INTO `ide` (`id`, `name`, `version`, `date`) VALUES
(1, 'Eclipse', '3.3', '2007-06-01'),
(2, 'Eclipse', '3.5', '2009-06-01'),
(3, 'Eclipse', '3.6', '2010-06-01'),
(4, 'Eclipse', '3.7', '2011-06-01'),
(5, 'Eclipse', '4.3', '2013-06-13'),
(6, 'NetBeans', '7', '2011-04-01'),
(7, 'NetBeans', '8.2', '2016-10-03');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `language` varchar(20) DEFAULT NULL,
  `version` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `language`, `version`) VALUES
(1, 'JavaScript', 'version 5.1'),
(2, 'Php', 'version 5.2'),
(3, 'Php', 'version 5.4'),
(5, 'JavaScript', 'version 6'),
(6, 'JavaScript', 'version 7'),
(7, 'JavaScript', 'version 8'),
(8, 'Php', 'version 7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
