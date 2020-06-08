-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 28 Février 2019 à 21:23
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestiondestock`
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
('CAMP0003', 'Bêche', '', 3, 2, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-04-29'),
('CAMP0004', 'Bouthéon', '', 3, 2, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-05-03'),
('CAMP0005', 'Gamelle locale', '3 éléments', 3, 2, '', '', '', 0, 'RASOARINIRINA Tantely Malala Annick', '2017-05-03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `login`, `nomprenom`, `etsouservice`, `motdepasse`) VALUES
(1, 'tantely', 'RASOARINIRINA Tantely Malala Annick', 'ECMAG APPRO', 'tantely');

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
(1, 'CAMP0001', '', 1, 10, 'XX', 'XX'),
(2, 'CAMP0002', '', 1, 5, 'XX', 'XX'),
(3, 'CAMP0003', '', 1, 20, 'XX', 'XX'),
(4, 'CAMP0005', '', 2, 5, 'CC', 'CC'),
(5, 'CAMP0004', '', 2, 10, 'CC', 'CC'),
(6, 'CAMP0001', '', 3, 34, 'FS', 'DFGDFG'),
(7, 'CAMP0002', '', 3, 234, 'FGDFG', 'GDFG'),
(8, 'CAMP0003', '', 3, 234, 'DFGD', 'DFGDF'),
(9, 'CAMP0004', '', 3, 443, 'FGDFG', 'DFG'),
(10, 'CAMP0005', '', 3, 244, 'DFG', 'DFG'),
(11, 'CAMP0001', '', 4, 54, 'SDF', 'SDF'),
(12, 'CAMP0002', '', 4, 10, 'DFSDF', 'SDFS'),
(13, 'CAMP0003', '', 4, 20, 'SDF', 'DF'),
(14, 'CAMP0001', '', 5, 45, 'KAKANA', 'KAKANA'),
(15, 'CAMP0002', '', 5, 54, 'KAKANA', 'KAKANA');

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
('CAMP0001', 60, 79, 54, 0, 0, ''),
('CAMP0002', 45, 288, 10, 0, 0, ''),
('CAMP0003', 50, 234, 20, 0, 0, ''),
('CAMP0004', 10, 443, 0, 0, 0, ''),
('CAMP0005', 5, 244, 0, 0, 0, '');

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
('CAMP0001', '2019-02-28', 'sdfsdf', '', 'sdfsdf', 0, 34, 0),
('CAMP0002', '2019-02-28', 'sdfsdf', '', 'sdfsdf', 0, 234, 0),
('CAMP0003', '2019-02-28', 'sdfsdf', '', 'sdfsdf', 0, 234, 0),
('CAMP0004', '2019-02-28', 'sdfsdf', '', 'sdfsdf', 0, 443, 0),
('CAMP0005', '2019-02-28', 'sdfsdf', '', 'sdfsdf', 0, 244, 0),
('CAMP0001', '2019-02-28', 'KAKANA', '', 'KAKANA', 0, 45, 0),
('CAMP0002', '2019-02-28', 'KAKANA', '', 'KAKANA', 0, 54, 0),
('CAMP0001', '2019-02-28', 'FSDF', '', 'SDFS', 0, 0, 54),
('CAMP0002', '2019-02-28', 'FSDF', '', 'SDFS', 0, 0, 10),
('CAMP0003', '2019-02-28', 'FSDF', '', 'SDFS', 0, 0, 20);

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
  `id_inventaire` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) CHARACTER SET utf8 NOT NULL,
  `libelleproduit` varchar(100) CHARACTER SET utf8 NOT NULL,
  `qteinitiale` int(11) NOT NULL,
  `qteentree` int(11) NOT NULL,
  `qtesortie` int(11) NOT NULL,
  `stockfinal` int(11) NOT NULL,
  `stockphysique` int(11) NOT NULL,
  `ecart` int(11) NOT NULL,
  `remarque` varchar(200) CHARACTER SET utf8 NOT NULL,
  `id_titreinventaire` int(11) NOT NULL,
  PRIMARY KEY (`id_inventaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `inventaire`
--

INSERT INTO `inventaire` (`id_inventaire`, `reference`, `libelleproduit`, `qteinitiale`, `qteentree`, `qtesortie`, `stockfinal`, `stockphysique`, `ecart`, `remarque`, `id_titreinventaire`) VALUES
(1, 'CAMP0005', 'Gamelle locale', 0, 0, 0, 0, 10, 0, '', 1),
(2, 'CAMP0004', 'BouthÃ©on', 0, 0, 0, 0, 20, 0, '', 1),
(3, 'CAMP0003', 'BÃªche', 0, 0, 0, 0, 30, 0, '', 1),
(4, 'CAMP0002', 'Gamelle 03 Ã©lÃ©ments PH', 0, 0, 0, 0, 40, 0, '', 1),
(5, 'CAMP0001', 'Gourde', 0, 0, 0, 0, 50, 0, '', 1),
(6, 'CAMP0005', 'Gamelle locale', 10, 0, 5, 5, 5, 0, '', 2),
(7, 'CAMP0004', 'BouthÃ©on', 20, 0, 10, 10, 10, 0, '', 2),
(8, 'CAMP0003', 'BÃªche', 30, 20, 0, 50, 50, 0, '', 2),
(9, 'CAMP0002', 'Gamelle 03 Ã©lÃ©ments PH', 40, 5, 0, 45, 45, 0, '', 2),
(10, 'CAMP0001', 'Gourde', 50, 10, 0, 60, 60, 0, '', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `mouvement`
--

INSERT INTO `mouvement` (`id_mouvement`, `id_fournisseur`, `type`, `source`, `destination`, `date`, `numerodelapj`, `BLouBMS`, `id_mouvement_anterieur`, `regulariser`, `saisipar`, `saisile`) VALUES
(1, 0, 1, 0, 0, '2019-02-28 16:02:57', 'XXX', 'XXX', 0, '', 'admin', '2019-02-28'),
(2, 0, 2, 0, 0, '2019-02-28 17:02:41', 'xx', 'xxx', 0, '', 'admin', '2019-02-28'),
(3, 0, 1, 0, 0, '2019-02-28 19:02:00', 'sdfsdf', 'sdfsdf', 0, '', 'admin', '2019-02-28'),
(4, 0, 2, 0, 0, '2019-02-28 19:02:36', 'FSDF', 'SDFS', 0, '', 'admin', '2019-02-28'),
(5, 0, 1, 0, 0, '2019-02-28 19:02:03', 'KAKANA', 'KAKANA', 0, '', 'admin', '2019-02-28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `titreinventaire`
--

INSERT INTO `titreinventaire` (`id_titre_inventaire`, `titre_inventaire`, `date`, `saisipar`, `saisile`) VALUES
(1, '1 INVENTAIRE', '2019-02-28 16:02:40', ' admin ', '2019-02-28 16:02:40'),
(2, '2 INVENTAIRE', '2019-02-28 17:02:42', ' admin ', '2019-02-28 17:02:42');

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
  `unite` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `unite`
--

INSERT INTO `unite` (`id_unite`, `unite`) VALUES
(1, 'Mètres'),
(2, 'Pièces'),
(3, 'Paires'),
(4, 'Cônnes'),
(5, 'Rouleaux');
