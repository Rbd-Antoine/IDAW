-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2023 at 03:20 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_idaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `aliment`
--

DROP TABLE IF EXISTS `aliment`;
CREATE TABLE IF NOT EXISTS `aliment` (
  `Id_aliment` int NOT NULL AUTO_INCREMENT COMMENT 'pas besoin de remplire ce champ',
  `Nom_aliment` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Calorie_par_100g` int DEFAULT NULL COMMENT 'en kcal, 1kcal = 4185.9J',
  `Type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Id_aliment`),
  KEY `Type` (`Type`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aliment`
--

INSERT INTO `aliment` (`Id_aliment`, `Nom_aliment`, `Calorie_par_100g`, `Type`) VALUES
(2, 'Coca original', 42, 'Boisson pétillante '),
(3, 'Nutella', 539, 'Dessert'),
(4, 'Riz long grain ', 355, 'Nourriture principale'),
(5, 'Maïs ', 77, 'Nourriture principale'),
(6, 'Eau minérale naturelle', 0, 'Boisson pétillante '),
(8, 'Vodka', 10, 'Alcool'),
(33, 'Salade', 15, 'Nourriture principale'),
(34, 'Petit beurre', 467, 'Dessert'),
(35, 'Chocolat noir 70%', 566, 'Chocolat'),
(36, 'Eau', 0, 'Boisson plate'),
(37, 'Cocktail', 74, 'Alcool'),
(46, 'oreo', 1997, 'Biscuit'),
(49, 'kebab', 100, 'Alcool'),
(51, 'Agneau, côtelette, grillée', NULL, NULL),
(52, 'Faisan, viande, rôtie/cuite au', NULL, NULL),
(53, 'Haricot de mer (Himanthalia el', NULL, NULL),
(54, 'Boeuf, steak haché 15% MG, cui', NULL, NULL),
(55, 'Vanille, extrait alcoolique', NULL, NULL),
(56, 'Meloukhia, feuilles de corète ', NULL, NULL),
(57, 'Beignet de viande, volaille ou', NULL, NULL),
(58, 'Fromage à pâte ferme environ 1', NULL, NULL),
(60, 'Boeuf, joue, braisée ou bouill', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `composant`
--

DROP TABLE IF EXISTS `composant`;
CREATE TABLE IF NOT EXISTS `composant` (
  `Id_composant` int NOT NULL,
  `Id_aliment` int NOT NULL,
  KEY `Id_aliment` (`Id_aliment`),
  KEY `Id_composant` (`Id_composant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consommer`
--

DROP TABLE IF EXISTS `consommer`;
CREATE TABLE IF NOT EXISTS `consommer` (
  `Id_personne` int NOT NULL,
  `Id_aliment` int NOT NULL,
  `Date_conso` date NOT NULL COMMENT 'AAAA-MM-DD',
  `Quantite` int NOT NULL COMMENT 'en g',
  KEY `Id_aliment` (`Id_aliment`),
  KEY `Id_personne` (`Id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `consommer`
--

INSERT INTO `consommer` (`Id_personne`, `Id_aliment`, `Date_conso`, `Quantite`) VALUES
(1, 35, '2023-03-01', 200),
(10, 36, '2023-03-03', 900),
(5, 49, '2023-03-12', 500),
(8, 5, '2023-03-01', 150),
(10, 37, '2023-03-02', 170),
(4, 49, '2023-03-06', 300),
(7, 36, '2023-03-03', 200),
(6, 46, '2023-03-13', 400),
(7, 3, '2023-03-01', 50);

-- --------------------------------------------------------

--
-- Table structure for table `niveau_sport`
--

DROP TABLE IF EXISTS `niveau_sport`;
CREATE TABLE IF NOT EXISTS `niveau_sport` (
  `Nv_sport` varchar(10) NOT NULL,
  PRIMARY KEY (`Nv_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `niveau_sport`
--

INSERT INTO `niveau_sport` (`Nv_sport`) VALUES
('bas'),
('élevé '),
('moyen'),
('profession');

-- --------------------------------------------------------

--
-- Table structure for table `nutriment`
--

DROP TABLE IF EXISTS `nutriment`;
CREATE TABLE IF NOT EXISTS `nutriment` (
  `Id_nutriment` int NOT NULL AUTO_INCREMENT,
  `Nom_nutriment` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_nutriment`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nutriment`
--

INSERT INTO `nutriment` (`Id_nutriment`, `Nom_nutriment`) VALUES
(1, 'Energie, Règlement UE N° 1169/2011 (kJ/100 g)'),
(2, 'Eau (g/100 g)'),
(3, 'Protéines, N x facteur de Jones (g/100 g)'),
(4, 'Protéines, N x 6.25 (g/100 g)'),
(5, 'Glucides (g/100 g)'),
(6, 'Lipides (g/100 g)'),
(7, 'Sucres (g/100 g)'),
(8, 'Fructose (g/100 g)'),
(9, 'Galactose (g/100 g)'),
(10, 'Glucose (g/100 g)'),
(11, 'Lactose (g/100 g)'),
(12, 'Maltose (g/100 g)'),
(13, 'Saccharose (g/100 g)'),
(14, 'Amidon (g/100 g)'),
(15, 'Fibres alimentaires (g/100 g)');

-- --------------------------------------------------------

--
-- Table structure for table `nutriment_pourcentage`
--

DROP TABLE IF EXISTS `nutriment_pourcentage`;
CREATE TABLE IF NOT EXISTS `nutriment_pourcentage` (
  `Id_aliment` int NOT NULL,
  `Pourcentage_nutriment` float NOT NULL COMMENT 'en %(g/100g)',
  `Id_nutriment` int NOT NULL,
  KEY `Id_aliment` (`Id_aliment`),
  KEY `Id_nutriment` (`Id_nutriment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `Id_personne` int NOT NULL AUTO_INCREMENT COMMENT 'pas besoin de remplire ce champ',
  `Nom_personne` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prenom_personne` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Login` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Mdp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Niveau_sport` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Tranche_age` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Sexe` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'H/F',
  `Taille` double DEFAULT NULL COMMENT 'en m',
  `Poids` int DEFAULT NULL COMMENT 'en kg',
  `Email_personne` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id_personne`),
  KEY `Niveau_sport` (`Niveau_sport`),
  KEY `Tranche_age` (`Tranche_age`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`Id_personne`, `Nom_personne`, `Prenom_personne`, `Login`, `Mdp`, `Niveau_sport`, `Tranche_age`, `Sexe`, `Taille`, `Poids`, `Email_personne`) VALUES
(1, 'Joshua ', 'Kimmich', 'jk6', 'kimmich', 'profession', '<40', 'H', 1.76, 75, 'joshua.kimmich@bayern.deut'),
(2, 'Leon', 'Goretzka', 'lg8', 'goretzka', 'profession', '<40', 'H', 1.89, 82, 'leon.goretzka@bayern.deut'),
(4, 'Jamal', 'Musiala', 'jm42', 'musiala', 'profession', '<40', 'H', 1.8, 68, 'jamal.musiala@bayern.deut'),
(5, 'Thomas', 'Muller', 'tm25', 'muller', 'profession', '<40', 'H', 1.85, 65, 'thomas.muller@bayern.deut'),
(6, 'Ryan', 'Gravenberch', 'rg38', 'gravenberch', 'profession', '<40', 'H', 1.9, 83, 'ryan.gravenberch@bayern.deut'),
(7, 'Manuel', 'Neuer', 'mn1', 'neuer', 'profession', '<40', 'H', 1.93, 93, 'manuel.neuer@bayern.deut'),
(8, 'Sven', 'Ulreich', 'su26', 'ulreich', 'profession', '<40', 'H', 1.92, 87, 'sven.ulreich@bayern.deut'),
(9, 'Oliver', 'Kahn', 'ok1', 'kahn', 'bas', '40<âge<60', 'H', 1.88, 91, 'oliver.kahn@bayern.deut'),
(10, 'Matthijs', 'De Ligt', 'mdl4', 'deligt', 'profession', '<40', 'H', 1.87, 89, 'matthijs.deligt@bayern.deut'),
(41, 'NGUYEN', 'William', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'william.nguyen@etu.imt-lille-douai.fr'),
(42, 'POIROT', 'Alexis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alexis.poirot@etu.imt-lille-douai.fr'),
(43, 'LAMBERT', 'Antoine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'antoine.lambert@etu.imt-lille-douai.fr'),
(44, 'PRAST', 'Cédric', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cedric.prast@etu.imt-lille-douai.fr'),
(45, 'GOUTHIER', 'Anthony', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'anthony.gouthier@etu.imt-lille-douai.fr'),
(46, 'GAUDIN', 'Johan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'johan.gaudin@etu.imt-lille-douai.fr'),
(47, 'FAURE', 'Guillaume', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'guillaume.faure@etu.imt-lille-douai.fr'),
(48, 'HEBBOUL', 'Hatim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hatim.hebboul@etu.imt-lille-douai.fr'),
(49, 'SUMO MOUDJIE TCHAMABE', 'Armand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'armand.sumo@etu.imt-lille-douai.fr'),
(50, 'JOLIVEL', 'Mathis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mathis.jolivel@etu.imt-lille-douai.fr'),
(51, 'AL ZAHABI', 'Ezzat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ezzat.al.zahabi@etu.imt-lille-douai.fr'),
(52, 'ERHART', 'Gaelle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gaelle.erhart@etu.imt-lille-douai.fr'),
(53, 'ARIB', 'Lucas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lucas.arib@etu.imt-lille-douai.fr'),
(54, 'LIM', 'Hugo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hugo.lim@etu.imt-lille-douai.fr'),
(55, 'SICOLI', 'Sacha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sacha.sicoli@etu.imt-lille-douai.fr'),
(56, 'PEROUSE', 'Emil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'emil.perouse@etu.imt-lille-douai.fr'),
(57, 'GRUMIAUX', 'Léa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lea.grumiaux@etu.imt-lille-douai.fr'),
(58, 'MARTIN', 'Pierre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pierre.martin@etu.imt-lille-douai.fr'),
(59, 'DJAMOINE', 'Kanlanfaye', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kanlanfaye.djamoine@etu.imt-lille-douai.fr'),
(60, 'FEENSTRA', 'Tanguy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tanguy.feenstra@etu.imt-lille-douai.fr'),
(61, 'DE VEYRAC', 'Maxime', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maxime.de.veyrac@etu.imt-lille-douai.fr'),
(62, 'BEN HAMIDOUCHE', 'Mekki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mekki.ben.hamidouche@etu.imt-lille-douai.fr'),
(63, 'ZINK', 'Julia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'julia.zink@etu.imt-lille-douai.fr'),
(64, 'FAVREAU', 'Alexandre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alexandre.favreau@etu.imt-lille-douai.fr'),
(65, 'DEVA', 'Nilavan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nilavan.deva@etu.imt-lille-douai.fr');

-- --------------------------------------------------------

--
-- Table structure for table `tranche_age`
--

DROP TABLE IF EXISTS `tranche_age`;
CREATE TABLE IF NOT EXISTS `tranche_age` (
  `tr_age` varchar(10) NOT NULL,
  PRIMARY KEY (`tr_age`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tranche_age`
--

INSERT INTO `tranche_age` (`tr_age`) VALUES
('<40'),
('40<âge<60'),
('60+');

-- --------------------------------------------------------

--
-- Table structure for table `type_nourriture`
--

DROP TABLE IF EXISTS `type_nourriture`;
CREATE TABLE IF NOT EXISTS `type_nourriture` (
  `Nom_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Nom_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type_nourriture`
--

INSERT INTO `type_nourriture` (`Nom_type`) VALUES
('Alcool'),
('Biscuit'),
('Boisson pétillante '),
('Boisson plate'),
('Bonbon'),
('Chocolat'),
('Dessert'),
('Ingrédient '),
('Nourriture principale');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aliment`
--
ALTER TABLE `aliment`
  ADD CONSTRAINT `aliment_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `type_nourriture` (`Nom_type`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `composant`
--
ALTER TABLE `composant`
  ADD CONSTRAINT `composant_ibfk_1` FOREIGN KEY (`Id_aliment`) REFERENCES `aliment` (`Id_aliment`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `composant_ibfk_2` FOREIGN KEY (`Id_composant`) REFERENCES `aliment` (`Id_aliment`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `consommer`
--
ALTER TABLE `consommer`
  ADD CONSTRAINT `consommer_ibfk_3` FOREIGN KEY (`Id_aliment`) REFERENCES `aliment` (`Id_aliment`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `consommer_ibfk_4` FOREIGN KEY (`Id_personne`) REFERENCES `personne` (`Id_personne`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `nutriment_pourcentage`
--
ALTER TABLE `nutriment_pourcentage`
  ADD CONSTRAINT `nutriment_pourcentage_ibfk_1` FOREIGN KEY (`Id_aliment`) REFERENCES `aliment` (`Id_aliment`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nutriment_pourcentage_ibfk_2` FOREIGN KEY (`Id_nutriment`) REFERENCES `nutriment` (`Id_nutriment`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`Niveau_sport`) REFERENCES `niveau_sport` (`Nv_sport`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `personne_ibfk_2` FOREIGN KEY (`Tranche_age`) REFERENCES `tranche_age` (`tr_age`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
