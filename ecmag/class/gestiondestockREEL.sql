-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 11 Mai 2017 à 09:24
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestiondestock`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `reference` varchar(20) NOT NULL,
  `libelleproduit` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_unite` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `codebarrefournisseur` varchar(100) NOT NULL,
  `codebarreinterne` varchar(100) NOT NULL,
  `stockalerte` int(11) NOT NULL,
  `saisipar` varchar(100) NOT NULL,
  `saisile` date NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`reference`, `libelleproduit`, `description`, `id_categorie`, `id_unite`, `photo`, `codebarrefournisseur`, `codebarreinterne`, `stockalerte`, `saisipar`, `saisile`) VALUES
('CAMP0001', 'Gourde', '', 3, 2, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-04-29'),
('CAMP0002', 'Gamelle 03 éléments PH', '', 3, 2, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-04-29'),
('CCG0001', 'Couverture VA PH', '', 2, 2, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-04-29'),
('COU0002', 'COUC 005 élémebt ', 'sdfsdfsdf', 2, 2, '', 'sdfsdfé"é', 'célébration', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-05-10'),
('DRA0002', 'Drapeau N°03', '', 6, 2, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-05-03'),
('FOU0001', 'Toile juté', '', 4, 1, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-05-03'),
('HAB0001', 'Rangers resistance oil', '', 1, 3, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-04-29'),
('HAB0002', 'Chaussette verte', '', 1, 3, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-04-29'),
('TIS0001', 'Tissu vert lampda', 'sous-officier', 5, 1, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-05-03');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
(1, 'HABILLEMENT'),
(2, 'COUCHAGE'),
(3, 'CAMPEMENT'),
(4, 'FOURNITURE DIVERS'),
(5, 'TISSU'),
(6, 'DRAPEAU');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `nomprenom` varchar(100) NOT NULL,
  `etsouservice` varchar(50) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `login`, `nomprenom`, `etsouservice`, `motdepasse`) VALUES
(1, 'tantely', 'RASOARINIRINA Tantely Malala Annick', 'ECMAG APPRO', 'tantely'),
(2, 'fanasina', 'Tina', 'ROGER', 'mamolava');

-- --------------------------------------------------------

--
-- Structure de la table `detail_mouvement`
--

CREATE TABLE IF NOT EXISTS `detail_mouvement` (
  `id_detail_mouvement` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL,
  `libelleproduit` varchar(100) NOT NULL,
  `id_mouvement` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `observation` varchar(200) NOT NULL,
  PRIMARY KEY (`id_detail_mouvement`),
  KEY `WDIDX14929705165` (`reference`),
  KEY `WDIDX14929705176` (`id_mouvement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `detail_mouvement`
--

INSERT INTO `detail_mouvement` (`id_detail_mouvement`, `reference`, `libelleproduit`, `id_mouvement`, `quantite`, `etat`, `observation`) VALUES
(1, 'HAB0001', 'Rangers resistance oil', 1, 20, '0', ''),
(2, 'CCG0001', 'Couverture VA PH', 1, 65, '0', ''),
(3, 'CAMP0001', 'Gourde', 1, 60, '0', ''),
(4, 'FOU0001', 'Toile juté', 1, 68, '0', ''),
(5, 'TIS0001', 'Tissu vert lampda', 1, 40, '0', ''),
(6, 'HAB0001', 'Rangers resistance oil', 2, 10, '1', '-'),
(7, 'CCG0001', 'Couverture VA PH', 2, 40, '1', '-'),
(8, 'CAMP0001', 'Gourde', 2, 60, '1', '-'),
(9, 'FOU0001', 'Toile juté', 2, 40, '1', '-'),
(10, 'TIS0001', 'Tissu vert lampda', 2, 10, '1', '-'),
(11, 'HAB0001', 'Rangers resistance oil', 3, 35, '0', ''),
(12, 'HAB0002', 'Chaussette verte', 4, 25, 'En attente de retour', ''),
(13, 'CAMP0001', 'Gourde', 5, 150, '', ''),
(14, 'CAMP0002', 'Gamelle 03 éléments PH', 6, 20, '', ''),
(15, 'CAMP0002', 'Gamelle 03 éléments PH', 7, 160, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`etat`) VALUES
('En attente de retour'),
('Manquant'),
('Reglé');

-- --------------------------------------------------------

--
-- Structure de la table `etatdestock`
--

CREATE TABLE IF NOT EXISTS `etatdestock` (
  `reference` varchar(20) NOT NULL,
  `quantite_initiale` int(11) NOT NULL,
  `quantite_entree` int(11) NOT NULL,
  `quantite_sortie` int(11) NOT NULL,
  `stockfinal` int(11) NOT NULL,
  `ecart` int(11) NOT NULL,
  `observation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etatdestock`
--

INSERT INTO `etatdestock` (`reference`, `quantite_initiale`, `quantite_entree`, `quantite_sortie`, `stockfinal`, `ecart`, `observation`) VALUES
('CAMP0001', 0, 0, 0, 0, 0, ''),
('CAMP0002', 0, 0, 0, 0, 0, ''),
('CCG0001', 0, 0, 0, 0, 0, ''),
('COU0002', 0, 0, 0, 0, 0, ''),
('DRA0002', 0, 0, 0, 0, 0, ''),
('FOU0001', 0, 0, 0, 0, 0, ''),
('HAB0001', 0, 0, 0, 0, 0, ''),
('HAB0002', 0, 0, 0, 0, 0, ''),
('TIS0001', 0, 0, 0, 0, 0, ''),
('CAMP0001', 201, 0, 0, 0, 0, ''),
('CAMP0002', 150, 0, 0, 0, 0, ''),
('CCG0001', 152, 0, 0, 0, 0, ''),
('DRA0002', 500, 0, 0, 0, 0, ''),
('FOU0001', 154, 0, 0, 0, 0, ''),
('HAB0001', 152, 0, 0, 0, 0, ''),
('HAB0002', 105, 0, 0, 0, 0, ''),
('TIS0001', 154, 0, 0, 0, 0, ''),
('CCG0001', 0, 65, 0, 0, 0, ''),
('CAMP0002', 0, 160, 0, 0, 0, ''),
('CAMP0001', 0, 210, 0, 0, 0, ''),
('HAB0001', 0, 55, 0, 0, 0, ''),
('TIS0001', 0, 40, 0, 0, 0, ''),
('FOU0001', 0, 68, 0, 0, 0, ''),
('HAB0002', 0, 0, 25, 0, 0, ''),
('CCG0001', 0, 0, 40, 0, 0, ''),
('CAMP0002', 0, 0, 20, 0, 0, ''),
('CAMP0001', 0, 0, 60, 0, 0, ''),
('HAB0001', 0, 0, 10, 0, 0, ''),
('TIS0001', 0, 0, 10, 0, 0, ''),
('FOU0001', 0, 0, 40, 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `etsouservice`
--

CREATE TABLE IF NOT EXISTS `etsouservice` (
  `id_etsouservice` int(11) NOT NULL AUTO_INCREMENT,
  `etsouservice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_etsouservice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Contenu de la table `etsouservice`
--

INSERT INTO `etsouservice` (`id_etsouservice`, `etsouservice`, `SE`, `libelle`) VALUES
(1, '1°RTS', 'CORPS', ''),
(2, 'CAPSAT', 'CORPS', ''),
(3, '1/RM1', 'CORPS', ''),
(4, '1/RM2', 'CORPS', ''),
(5, '1/RM3', 'CORPS', ''),
(6, '1/RM4', 'CORPS', ''),
(7, '1/RM5', 'CORPS', ''),
(8, '1/RM7', 'CORPS', ''),
(9, '1°RFI', 'CORPS', ''),
(10, '2°RG', 'CORPS', ''),
(11, '2/RM4', 'CORPS', ''),
(12, 'BATAC', 'CORPS', ''),
(13, 'BANI', 'CORPS', ''),
(14, 'BANA', 'CORPS', ''),
(15, '2/RM2', 'CORPS', ''),
(16, '2/RM5', 'CORPS', ''),
(17, '3/RM5', 'CORPS', ''),
(18, 'RAS', 'CORPS', ''),
(19, 'RAAA', 'CORPS', ''),
(20, 'RAL', 'CORPS', ''),
(21, '1°RG', 'CORPS', ''),
(22, '3°RG', 'CORPS', ''),
(23, '2°RFI', 'CORPS', ''),
(24, 'CPC', 'CORPS', ''),
(25, 'RECAMP', 'CORPS', ''),
(26, 'ACMIL', 'ECOLE', ''),
(27, 'SEMIPI', 'ECOLE', ''),
(28, 'ENSOA', 'ECOLE', ''),
(29, 'DMT', 'Direction', ''),
(30, 'COFIA', 'Région', ''),
(31, 'EMGAM/DLD', 'Etat major', ''),
(32, 'EMGAM/SERDIS', 'Etat Major', ''),
(33, 'GP', 'Garde présidentiel', ''),
(34, 'MUSAM', '', ''),
(35, 'EMIV', 'Etablissement DIA', ''),
(36, 'SMAD', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `fichedestock`
--

CREATE TABLE IF NOT EXISTS `fichedestock` (
  `reference` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `numerodelapj` varchar(50) NOT NULL,
  `provenanceoudestination` varchar(100) NOT NULL,
  `BLouBMS` varchar(50) NOT NULL,
  `dues` int(11) NOT NULL,
  `quantiteentree` int(11) NOT NULL,
  `quantitesortie` int(11) NOT NULL,
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fichedestock`
--

INSERT INTO `fichedestock` (`reference`, `date`, `numerodelapj`, `provenanceoudestination`, `BLouBMS`, `dues`, `quantiteentree`, `quantitesortie`) VALUES
('HAB0001', '2017-05-04', '0216', 'CAPSAT', '1258/DFG', 0, 20, 0),
('CCG0001', '2017-05-04', '0216', 'CAPSAT', '1258/DFG', 0, 65, 0),
('CAMP0001', '2017-05-04', '0216', 'CAPSAT', '1258/DFG', 0, 60, 0),
('FOU0001', '2017-05-04', '0216', 'CAPSAT', '1258/DFG', 0, 68, 0),
('TIS0001', '2017-05-04', '0216', 'CAPSAT', '1258/DFG', 0, 40, 0),
('CAMP0001', '2017-05-06', '25/DSFF', '1/RM4', '125DF', 0, 150, 0),
('HAB0001', '2017-05-04', '00326', 'RAKOTO MAKAKA', '152/HG', 0, 35, 0),
('CAMP0002', '2017-05-07', '15DFF/155/DF', 'RAKOTO MAKAKA', '125/SD', 0, 160, 0),
('HAB0001', '2017-05-04', 'DF/50', '1/RM2', '125/df', 0, 0, 10),
('CCG0001', '2017-05-04', 'DF/50', '1/RM2', '125/df', 0, 0, 40),
('CAMP0001', '2017-05-04', 'DF/50', '1/RM2', '125/df', 0, 0, 60),
('FOU0001', '2017-05-04', 'DF/50', '1/RM2', '125/df', 0, 0, 40),
('TIS0001', '2017-05-04', 'DF/50', '1/RM2', '125/df', 0, 0, 10),
('HAB0002', '2017-05-04', '0325', 'BATAC', '152/DF', 0, 0, 25),
('CAMP0002', '2017-05-07', '454/DF', 'EMGAM/SERDIS', '125/DFF', 0, 0, 20);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id_fournisseurs` int(11) NOT NULL AUTO_INCREMENT,
  `societe` varchar(200) NOT NULL,
  `civilite` varchar(20) NOT NULL,
  `nomprenom` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `codepostal` varchar(10) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `observation` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fournisseurs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fournisseurs`, `societe`, `civilite`, `nomprenom`, `adresse`, `codepostal`, `ville`, `telephone`, `mail`, `observation`) VALUES
(1, 'SARL', '1', 'RAKOTO MAKAKA', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `inventaire`
--

CREATE TABLE IF NOT EXISTS `inventaire` (
  `id_inventaire` int(11) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `libelleproduit` varchar(100) NOT NULL,
  `qteinitiale` int(11) NOT NULL,
  `qteentree` int(11) NOT NULL,
  `qtesortie` int(11) NOT NULL,
  `stockreel` int(11) NOT NULL,
  `stockphysique` int(11) NOT NULL,
  `ecart` int(11) NOT NULL,
  `remarque` varchar(200) NOT NULL,
  KEY `WDIDX14930375530` (`id_inventaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inventaire`
--

INSERT INTO `inventaire` (`id_inventaire`, `reference`, `libelleproduit`, `qteinitiale`, `qteentree`, `qtesortie`, `stockreel`, `stockphysique`, `ecart`, `remarque`) VALUES
(1, 'CAMP0001', 'Gourde', 0, 0, 0, 0, 201, -201, ''),
(1, 'CAMP0002', 'Gamelle 03 éléments PH', 0, 0, 0, 0, 150, -150, ''),
(1, 'CCG0001', 'Couverture VA PH', 0, 0, 0, 0, 152, -152, ''),
(1, 'DRA0002', 'Drapeau N°03', 0, 0, 0, 0, 500, -500, ''),
(1, 'FOU0001', 'Toile juté', 0, 0, 0, 0, 154, -154, ''),
(1, 'HAB0001', 'Rangers resistance oil', 0, 0, 0, 0, 152, -152, ''),
(1, 'HAB0002', 'Chaussette verte', 0, 0, 0, 0, 105, -105, ''),
(1, 'TIS0001', 'Tissu vert lampda', 0, 0, 0, 0, 154, -154, '');

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE IF NOT EXISTS `mouvement` (
  `id_mouvement` int(11) NOT NULL AUTO_INCREMENT,
  `id_fournisseur` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `source` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `numerodelapj` varchar(50) NOT NULL,
  `BLouBMS` varchar(50) NOT NULL,
  `id_mouvement_anterieur` int(11) NOT NULL,
  `regulariser` varchar(100) NOT NULL,
  `saisipar` varchar(100) NOT NULL,
  `saisile` date NOT NULL,
  PRIMARY KEY (`id_mouvement`),
  KEY `WDIDX14929705020` (`id_fournisseur`),
  KEY `WDIDX14929705031` (`type`),
  KEY `WDIDX14929705032` (`source`),
  KEY `WDIDX14929705033` (`destination`),
  KEY `WDIDX14929705034` (`id_mouvement_anterieur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `mouvement`
--

INSERT INTO `mouvement` (`id_mouvement`, `id_fournisseur`, `type`, `source`, `destination`, `date`, `numerodelapj`, `BLouBMS`, `id_mouvement_anterieur`, `regulariser`, `saisipar`, `saisile`) VALUES
(1, 0, 4, 2, 0, '2017-05-04 18:37:16', '0216', '1258/DFG', 0, '', 'RASOARINIRINA Tantely Malala Annick', '2017-05-04'),
(2, 0, 1, 0, 4, '2017-05-04 18:41:04', 'DF/50', '125/df', 0, '', 'RASOARINIRINA Tantely Malala Annick', '2017-05-04'),
(3, 1, 5, 0, 0, '2017-05-04 20:52:14', '00326', '152/HG', 0, '', 'RASOARINIRINA Tantely Malala Annick', '2017-05-04'),
(4, 0, 2, 0, 12, '2017-05-04 21:47:53', '0325', '152/DF', 0, '', 'RASOARINIRINA Tantely Malala Annick', '2017-05-04'),
(5, 0, 4, 6, 0, '2017-05-06 15:43:53', '25/DSFF', '125DF', 0, '', '', '2017-05-06'),
(6, 0, 1, 0, 32, '2017-05-07 18:18:35', '454/DF', '125/DFF', 0, '', '', '2017-05-07'),
(7, 1, 5, 0, 0, '2017-05-07 18:19:23', '15DFF/155/DF', '125/SD', 0, '', '', '2017-05-07');

-- --------------------------------------------------------

--
-- Structure de la table `titreinventaire`
--

CREATE TABLE IF NOT EXISTS `titreinventaire` (
  `id_titre_inventaire` int(11) NOT NULL AUTO_INCREMENT,
  `titre_inventaire` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `saisipar` varchar(100) NOT NULL,
  `saisile` datetime NOT NULL,
  PRIMARY KEY (`id_titre_inventaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `titreinventaire`
--

INSERT INTO `titreinventaire` (`id_titre_inventaire`, `titre_inventaire`, `date`, `saisipar`, `saisile`) VALUES
(1, 'TITRE N° 001', '2017-05-04 18:18:44', 'RASOARINIRINA Tantely Malala Annick', '2017-05-04 18:18:44');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'BON'),
(2, 'DOTATION'),
(3, 'TRANSFERT SORTIE'),
(4, 'DON'),
(5, 'ACHAT'),
(6, 'TRANSFERT ENTREE');

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

CREATE TABLE IF NOT EXISTS `unite` (
  `id_unite` int(11) NOT NULL AUTO_INCREMENT,
  `unite` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_unite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `unite`
--

INSERT INTO `unite` (`id_unite`, `unite`) VALUES
(1, 'Mètres'),
(2, 'Pièces'),
(3, 'Paires'),
(4, 'Cônnes'),
(5, 'Rouleaux');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
