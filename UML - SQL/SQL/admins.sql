-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db740161581.db.1and1.com
-- Généré le :  Mer 11 Juillet 2018 à 08:01
-- Version du serveur :  5.5.60-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db740161581`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `confirm` int(1) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo_UNIQUE` (`pseudo`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `pseudo`, `email`, `password`, `confirmkey`, `confirm`, `creation_date`) VALUES
(34, 'yohann', 'yohannzaoui@gmail.com', '026a78d22ea61667bbd1e041a04699f4f170cafe', '60962623750693', 1, '0000-00-00 00:00:00'),
(42, 'etienneR', 'etienne.rinckel12@hotmail.fr', '0eea18cb17516907bc2a2f2f76a3fa7b29b12414', '73591241112323', 0, '0000-00-00 00:00:00'),
(52, 'jean', 'yohannzaoui@outlook.com', '026a78d22ea61667bbd1e041a04699f4f170cafe', '31551717423049', 0, '2018-07-02 06:26:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
