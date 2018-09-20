-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 sep. 2018 à 14:24
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hitemaprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `ID` int(11) NOT NULL,
  `Localisation` varchar(100) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Note` int(11) NOT NULL,
  `Disponibilité` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`ID`, `Localisation`, `Name`, `Description`, `Image`, `Note`, `Disponibilité`, `latitude`, `longitude`) VALUES
(0, 'Le Havre', 'L\'Hotel du Port', 'Un hôtel est un établissement commercial qui offre un service d\'hébergement payant en chambres meublées à une clientèle de passage. En général, un hôtel assure l\'entretien quotidien des chambres et des lits, ainsi que la fourniture du linge de toilette.', 'LeHavrePicture.jpg', 4, 32, 49, 1),
(1, 'Paris', 'La Petite Etoile', 'Un hôtel est un établissement commercial qui offre un service d\'hébergement payant en chambres meublées à une clientèle de passage. En général, un hôtel assure l\'entretien quotidien des chambres et des lits, ainsi que la fourniture du linge de toilette.', 'Paris1Picture.jpg', 5, 65, 48.9225, 2.37305),
(2, 'Bruxelles', 'Le Cabaret', 'Un hôtel est un établissement commercial qui offre un service d\'hébergement payant en chambres meublées à une clientèle de passage. En général, un hôtel assure l\'entretien quotidien des chambres et des lits, ainsi que la fourniture du linge de toilette.', 'BruxellesPicture.jpg', 5, 82, 50.8476, 4.57031),
(3, 'Paris', 'Le Belvédére', 'Un hôtel est un établissement commercial qui offre un service d\'hébergement payant en chambres meublées à une clientèle de passage. En général, un hôtel assure l\'entretien quotidien des chambres et des lits, ainsi que la fourniture du linge de toilette.', 'Paris2Picture.jpg', 5, 46, 48.2225, 2.37305),
(4, 'Pau', 'Au Petit Four', 'Un hôtel est un établissement commercial qui offre un service d\'hébergement payant en chambres meublées à une clientèle de passage. En général, un hôtel assure l\'entretien quotidien des chambres et des lits, ainsi que la fourniture du linge de toilette.', 'PauPicture.jpg', 4, 12, 43.3252, -0.527344),
(5, 'Munchen', 'Die Deutschen', 'Un hôtel est un établissement commercial qui offre un service d\'hébergement payant en chambres meublées à une clientèle de passage. En général, un hôtel assure l\'entretien quotidien des chambres et des lits, ainsi que la fourniture du linge de toilette.', 'AllemandPicture.jpg', 3, 9, 48.5748, 10.6348),
(6, 'Teruel', 'Los Tapas', 'Un hôtel est un établissement commercial qui offre un service d\'hébergement payant en chambres meublées à une clientèle de passage. En général, un hôtel assure l\'entretien quotidien des chambres et des lits, ainsi que la fourniture du linge de toilette.', 'EspagnePicture.jpg', 5, 22, 40.4469, -1.40625);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Hotel_ID` int(11) NOT NULL,
  `Hotel_Name` varchar(100) NOT NULL,
  `Arrivee` date NOT NULL,
  `Depart` date NOT NULL,
  `Nombre_Personne` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `signup_date`) VALUES
(1, 'admin', 'admin', 1537171336);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;