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
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publication` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `pseudo`, `content`, `creation_date`, `publication`) VALUES
(60, 14, 'test comm', 'test comm', '2018-07-01 19:33:42', 1),
(59, 14, 'test comm', 'test comm', '2018-07-01 19:33:42', 1),
(56, 14, 'yohann', 'test', '2018-07-01 09:05:34', 1),
(54, 23, 'ANNAELLE', 'article trÃ¨s bien Ã©cris', '2018-06-30 11:04:54', 0),
(53, 14, 'ANNAELLE', 'ton site est trÃ¨s bien papa les autres sont nul', '2018-06-30 10:10:36', 1),
(50, 14, 'Yohann', 'test', '2018-06-29 18:51:58', 1),
(55, 23, 'ANNAELLE', 'article trÃ¨s bien Ã©cris', '2018-06-30 11:04:55', 0),
(48, 14, 'jean', 'jean', '2018-06-29 16:15:53', 1),
(62, 14, 'fab', 'coucou', '2018-07-02 14:27:59', 1),
(46, 14, 'paul', 'salut', '2018-06-29 16:10:50', 0),
(45, 14, 'yohann', 'ze', '2018-06-29 16:09:53', 0),
(44, 14, 'yohann', 'ze', '2018-06-29 16:09:53', 0),
(42, 14, 'yohann', 'tesssssst', '2018-06-29 15:22:40', 1),
(41, 20, 'nnnnnnnnnnnnnnnnnnnnnnnnnn', 'nn', '2018-06-29 14:25:43', 1),
(38, 14, 'visiteur2', 'bon article', '2018-06-29 09:18:53', 1),
(37, 14, 'Visiteur1', 'Bon article', '2018-06-29 09:16:22', 1),
(40, 14, 'visiteur2', 'test comm', '2018-06-29 09:45:04', 1),
(61, 14, 'yohann', 'aaaaaaaaaaaaaaaaaaaaa', '2018-07-02 12:03:39', 1),
(63, 14, 'jiji', 'jaja', '2018-07-02 18:45:50', 0),
(64, 14, 'jiji', 'jaja', '2018-07-02 18:45:51', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
