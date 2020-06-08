-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Mars 2017 à 23:07
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dia`
--

-- --------------------------------------------------------

--
-- Structure de la table `messageremarque`
--

CREATE TABLE IF NOT EXISTS `messageremarque` (
  `id_messageremarque` int(11) NOT NULL AUTO_INCREMENT,
  `expediteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `etsouservice` varchar(50) NOT NULL,
  `categorie` varchar(60) NOT NULL,
  `nomprenom` varchar(100) NOT NULL,
  `remarque` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `reponse` varchar(500) NOT NULL,
  PRIMARY KEY (`id_messageremarque`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `messageremarque`
--

INSERT INTO `messageremarque` (`id_messageremarque`, `expediteur`, `destinataire`, `etsouservice`, `categorie`, `nomprenom`, `remarque`, `date`, `heure`, `reponse`) VALUES
(1, 1, 77, 'SPCM', 'FONCTIONNAIRE', 'RAZAFINDRAIBE Alexandre', 'XXXXXXXXXXXXXXXX', '2017-03-21', '20:40:00', ''),
(2, 1, 77, 'SPCM', 'FONCTIONNAIRE', 'RAZAFINDRAIBE Alexandre', 'Dites nous si vous avez des remarques Ã  propos de votre renseignement :Dites nous si vous avez des remarques Ã  propos de votre renseignement :Dites nous si vous avez des remarques Ã  propos de votre renseignement :Dites nous si vous avez des remarques Ã  propos de votre renseignement :Dites nous si vous avez des remarques Ã  propos de votre renseignement :', '2017-03-21', '21:35:00', ''),
(3, 77, 1, 'INFO', 'ECD', 'RANDRIANAIVONJOEL Tina Heriniaina', 'ssssssssssssssssssss', '2017-03-21', '22:45:00', ''),
(4, 77, 1, 'INFO', 'ECD', 'RANDRIANAIVONJOEL Tina Heriniaina', 'sqdsdqsdqsd', '2017-03-21', '22:46:00', ''),
(5, 77, 1, 'INFO', 'ECD', 'RANDRIANAIVONJOEL Tina Heriniaina', 'dfsdfdf', '2017-03-21', '22:54:00', ''),
(6, 77, 1, 'INFO', 'ECD', 'RANDRIANAIVONJOEL Tina Heriniaina', 'RAKOTO A', '2017-03-21', '22:55:00', ''),
(7, 77, 1, 'INFO', 'ECD', 'RANDRIANAIVONJOEL Tina Heriniaina', 'dsdfsdfsdf', '2017-03-21', '22:57:00', ''),
(8, 2, 77, 'SPCM', 'FONCTIONNAIRE', 'RANDRIANARIVELO ROBSON Maurice', 'JJJJJJJJJJJJJJJJJJJJJJJJJ', '2017-03-21', '23:05:00', ''),
(9, 2, 77, 'SPCM', 'FONCTIONNAIRE', 'RANDRIANARIVELO ROBSON Maurice', 'KKKKKKKKKKKKK', '2017-03-21', '23:05:00', ''),
(10, 77, 2, 'INFO', 'ECD', 'RANDRIANAIVONJOEL Tina Heriniaina', 'VITA', '2017-03-21', '23:06:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
