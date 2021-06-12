-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Juin 2021 à 20:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `preinscriptiondb`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `pseudo`, `password`, `privilege`) VALUES
(1, 'CD', 'Admin', 1),
(2, 'CCI', 'Cellule', 1);

-- --------------------------------------------------------

--
-- Structure de la table `choix_etudiant`
--

CREATE TABLE IF NOT EXISTS `choix_etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCycle` int(11) NOT NULL,
  `idParcours` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE IF NOT EXISTS `cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cycle`
--

INSERT INTO `cycle` (`id`, `intitule`) VALUES
(1, 'LICENCE'),
(2, 'MASTER'),
(3, 'DOCTORAT');

-- --------------------------------------------------------

--
-- Structure de la table `diplome_entree`
--

CREATE TABLE IF NOT EXISTS `diplome_entree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nature_diplome` varchar(25) NOT NULL,
  `mention` varchar(25) NOT NULL,
  `annee_obtention` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dpt`
--

CREATE TABLE IF NOT EXISTS `dpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_dpt` varchar(100) NOT NULL,
  `idFac` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `dpt`
--

INSERT INTO `dpt` (`id`, `nom_dpt`, `idFac`) VALUES
(1, 'Mathématiques et Informatique', 3),
(2, 'Physique', 3),
(3, 'Biologie', 3);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_et_prenom` varchar(50) NOT NULL,
  `date_naiss` date NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `statut_mat` tinyint(1) NOT NULL,
  `nationalite` varchar(100) NOT NULL,
  `region_origine` varchar(100) NOT NULL,
  `dpt_origine` varchar(100) NOT NULL,
  `idparents` int(11) NOT NULL,
  `idDpt` int(11) NOT NULL,
  `idTuteur` int(11) NOT NULL,
  `idParcours` int(11) NOT NULL,
  `idDiplome` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom_et_prenom`, `date_naiss`, `sexe`, `statut_mat`, `nationalite`, `region_origine`, `dpt_origine`, `idparents`, `idDpt`, `idTuteur`, `idParcours`, `idDiplome`, `pseudo`, `password`) VALUES
(67, '', '0000-00-00', 0, 0, '', '', '', 0, 0, 0, 0, 0, 'Dol', '2021'),
(68, '', '0000-00-00', 0, 0, '', '', '', 0, 0, 0, 0, 0, 'Abz', '2000'),
(69, '', '0000-00-00', 0, 0, '', '', '', 0, 0, 0, 0, 0, 'Mapoure', 'Assia');

-- --------------------------------------------------------

--
-- Structure de la table `faculte`
--

CREATE TABLE IF NOT EXISTS `faculte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `faculte`
--

INSERT INTO `faculte` (`id`, `intitule`) VALUES
(1, 'FALSH'),
(2, 'FSEG'),
(3, 'FS'),
(4, 'FSJP');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE IF NOT EXISTS `parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filiere` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idDpt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`id`, `filiere`, `idDpt`) VALUES
(1, 'Anglais', 0),
(2, 'Lettres bilingues', 0),
(3, 'Philisophie/Psychologie', 0),
(4, 'Sociologie/Anthropologie', 0),
(5, 'Histoire', 0),
(6, 'Géographie', 0),
(7, 'Langues étrangères', 0),
(8, 'Français', 0),
(9, 'Littératures et civilisations africaines', 0),
(10, 'Linguistiques et Communication', 0),
(11, 'Analyse politique et économique', 0),
(12, 'Economie publique', 0),
(13, 'Technique quantitative', 0),
(14, 'Management, Stratégie et prospective', 0),
(15, 'Marketing, Commerce et vente', 0),
(16, 'Comptabilité et finances', 0),
(17, 'Chimie', 1),
(18, 'Informatique', 1),
(19, 'Informatique de gestion', 1),
(20, 'Mathématiques', 1),
(21, 'Physique', 1),
(22, 'Sciences Biologiques', 1),
(23, 'Sciences technologiques', 1),
(24, 'Droit fondamental', 0),
(25, 'Droit public', 0),
(26, 'Droit privé', 0),
(27, 'Sciences politiques', 0);

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pere` varchar(100) NOT NULL,
  `profession_pere` varchar(255) NOT NULL,
  `nom_mere` varchar(100) NOT NULL,
  `profession_mere` varchar(255) NOT NULL,
  `contact` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tuteurs`
--

CREATE TABLE IF NOT EXISTS `tuteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `contact` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
