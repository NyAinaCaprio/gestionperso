-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Mai 2017 à 01:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `juridique`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `nomprenom` varchar(100) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE IF NOT EXISTS `contenu` (
  `id_contenu` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `porte` varchar(250) NOT NULL,
  `observation` varchar(500) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id_contenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`id_contenu`, `numero`, `date`, `porte`, `observation`, `id_projet`, `id_type`) VALUES
(1, '151SDF', '2017-05-17', 'SDFSDF', 'SDFSDF', 1, 1),
(2, 'SDFSDF', '2017-05-04', 'SDFSDF', 'SDFSDF', 4, 2),
(3, '158/DF', '2017-05-12', 'QSDQSD', 'QSDQSD', 1, 1),
(4, 'SDFSdf', '2017-05-10', 'sdfsdf', 'sdfsdf', 2, 2),
(5, 'SDFSdf', '2017-05-25', 'sdfsd', 'fsdfsdf', 3, 1),
(6, 'SDFSdf', '2017-05-25', 'sdfsd', 'fsdfsdf', 3, 1),
(7, 'SDFSdf', '2017-05-25', 'sdfsd', 'fsdfsdf', 3, 1),
(8, 'SDFSdf', '2017-05-25', 'sdfsd', 'fsdfsdf', 3, 1),
(9, 'sdfsdf', '2017-05-12', 'SDFSDFSDF', 'DFSDFS', 3, 3),
(10, 'dfgd', '2017-05-12', 'dfgdfg', 'dfg', 2, 2),
(11, 'dfgd', '2017-05-12', 'dfgdfg', 'dfg', 2, 2),
(12, 'dfgd', '2017-05-12', 'dfgdfg', 'dfg', 2, 2),
(13, 'sdsdf', '2017-05-12', 'sdfsd', 'fsdfsdf', 3, 3),
(14, 'sdsdf', '2017-05-12', 'sdfsd', 'fsdfsdf', 3, 1),
(15, 'SDFSdf', '2017-05-17', 'sdfsdf', 'sdfsdf', 2, 1),
(16, 'qsdqsd', '2017-05-18', 'qsdqsd', 'qsdqsdqsd', 4, 1),
(17, 'dfsdf', '2017-05-26', 'sdfsdfsdfsdf', 'sdfsdfsd', 5, 3),
(18, 'SDFSDf', '2017-05-19', 'sdfsdf', 'sdfsdf', 1, 1),
(19, 'SDFSDf', '2017-05-19', 'sdfsdf', 'sdfsdf', 2, 1),
(20, 'dfsdf', '2017-05-11', 'sdfsdf', 'sdfsdf', 2, 2),
(21, 'SDFSDf', '2017-05-13', 'sdfsdf', 'sdfsdf', 2, 1),
(22, 'SDFSDf', '2017-05-13', 'sdfsdf', 'sdfsdf', 2, 1),
(23, '1258/DF', '2017-05-10', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea tak', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.\r\n\r\nRead More \r\n', 1, 1),
(24, '128/POT', '2017-05-12', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea tak', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr,  ', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
  `nomdossier` varchar(200) NOT NULL,
  `id_contenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dossier`
--

INSERT INTO `dossier` (`nomdossier`, `id_contenu`) VALUES
('Hydrangeas.jpg', 8),
('Jellyfish.jpg', 8),
('Koala.jpg', 14),
('Lighthouse.jpg', 14),
('Penguins.jpg', 14),
('Chrysanthemum.jpg', 15),
('Desert.jpg', 15),
('Jellyfish.jpg', 16),
('Koala.jpg', 16),
('Lighthouse.jpg', 16),
('Penguins.jpg', 17),
('Tulips.jpg', 17),
('Girls Wallpapers Full HD 1080p (154) - Megan Fox.jpg', 18),
('Girls Wallpapers Full HD 1080p (154) - Megan Fox.jpg', 19),
('10689520_389550687864865_5101072879717275292_n.jpg', 20),
('apocalypto_05.jpg', 20),
('article-2358866-1ABA7593000005DC-853_306x423.jpg', 20),
('Holly_Valance655625.jpg', 21),
('Sexy_Calendrier_2010_Pirelli_001.jpg', 21),
('Holly_Valance655625.jpg', 22),
('Sexy_Calendrier_2010_Pirelli_001.jpg', 22),
('10689520_389550687864865_5101072879717275292_n.jpg', 23),
('apocalypto_05.jpg', 23),
('article-2358866-1ABA7593000005DC-853_306x423.jpg', 23),
('3157721236_1_10_RSsTiU6D.jpg', 24),
('Sexy_Calendrier_2010_Pirelli_001.jpg', 24);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `projet` varchar(100) NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `projet`) VALUES
(1, 'DECRET'),
(2, 'ORDONNANCE'),
(3, 'LOI'),
(4, 'ARRETE'),
(5, 'CIRCULAIRE'),
(6, 'NOTE DE SERVICE');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'Mariage'),
(2, 'Adoption'),
(3, 'Autres');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
