-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 03 Mars 2019 à 22:37
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tuto`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(60) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mail`, `password`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`) VALUES
(1, 'Tina', 'tina.wdata@gmail.com', '$1$gP/.pe3.$d16AOu1mjvKgJ6HV5sO5s1', NULL, '2019-03-03 18:03:20', NULL, '2019-03-03 21:34:45', 'H2eI5QpPyKYs7havSZ4LHzRR5yXY1k4gKRfj1CPsObFh9LHQTlcnzUKaXVr8WGQ12ZJh39T2Ft5JNAW4AK6zDEtnYjlN6HNlU7pCOm10fck2GDeO1EN9VI8aFKfQF7ef0HugV0Y7FOQqfr3ZYrQ7ChCcpBfqKbjaFFHKrWwhkSlyfgsfKlje89NnRsILZaeREdSJg6zqbKtN4vI2IQiEa3CbEthKIiDFWndhWgJRiWLdybI9LcafCpkROpQTmVH'),
(2, 'Lalao', 'lalao.wdata@gmail.com', '$1$9S4.c/0.$1D35W8TJz/Pg.HRUs.UVU1', NULL, '2019-03-03 18:03:09', NULL, '2019-03-03 21:36:20', NULL),
(3, 'diary', 'diary.wdata@gmail.com', '$1$j0/.wm/.$BEsPocdz3LN1O0.Y0auNk.', NULL, '2019-03-03 18:03:47', NULL, NULL, '4liHaWBImvSPCWlwx7wC8hXdfykTtd1KPdDhxg3QFqlCniKx5ixaaNUVw2uf9ZyIwKgQHD8ACdn1ZNRGLXGdSANjPtN77q54PPQSanqx4FlEJh9aICKqpgNjWtgy8g2EF2nmWYcwHULD0NELIQys2pJEW6QG0IS8te8grYxL7p8bpYnEgEDUSrWLNHiXgPmvyQXQCO8fdKRKZwwF0faQdr6Pw6FY2lb2qC0EshY9X0LIBUvKpzKtQ25Ol3dAllq'),
(4, 'xxxx', 'xxxx@gmail.com', '$1$j0/.wm/.$BEsPocdz3LN1O0.Y0auNk.', NULL, '2019-03-03 19:03:10', NULL, '2019-03-03 20:58:24', NULL),
(5, 'aaaa', 'aaaa@gmail.com', '$1$/m0.a25.$bAudWvYzaEOS9JbMoMg6./', NULL, '2019-03-03 20:03:34', NULL, NULL, NULL);
