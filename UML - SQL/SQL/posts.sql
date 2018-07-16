-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db740161581.db.1and1.com
-- Généré le :  Mer 11 Juillet 2018 à 08:00
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
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(200) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `subtitle`, `content`, `creation_date`, `update_date`) VALUES
(14, 'Yohann', 'Les langages de dÃ©veloppement qui ont la cote en 2018', 'Les langages de dÃ©veloppement sont tellement nombreux, avec des caractÃ©ristiques diverses, quâ€™il peut Ãªtre difficile d''en sÃ©lectionner quelques-uns de maniÃ¨re objective.', 'PHP\r\nSi vous Ãªtes un dÃ©veloppeur indÃ©pendant ou professionnel, la popularitÃ© dâ€™un langage est un excellent critÃ¨re de sÃ©lection. MesurÃ© par PYPL, lâ€™indicateur de popularitÃ© PYPL permet dâ€™observer lâ€™Ã©volution des tendances telle que la constance de Java pour les applications web et mobile (Android) ou la perte de vitesse du PHP. &quot;La force du PHP repose sur des frameworks performants comme Symfony qui nâ€™a de limite que votre propre imagination&quot; explique Guillaume de l''agence TheTribe, spÃ©cialiste de la techno Symfony.\r\n\r\nJavaScript\r\nJavaScript arrive toujours dans le trio de tÃªte, car il propose une interface simple et facile Ã  manipuler avec une multitude de fonctionnalitÃ©s au choix et des framewoks front. Il sera difficile de sâ€™en passer pour le dÃ©veloppement web tant il est complet. La grande majoritÃ© des dÃ©veloppeurs savent coder dans ce langage. Il ne suffit donc plus de mentionner celui-ci dans son CV pour faire la diffÃ©rence, mais il est essentiel de le connaÃ®tre pour mieux apprÃ©hender les nouveautÃ©s. ', '2018-06-29 09:10:24', '2018-06-29 15:17:21'),
(22, 'yohann', 'aa', 'aa', 'aa', '2018-06-29 19:05:56', NULL),
(24, 'yohann', 'annonce', 'Sous titre modifiÃ©', 'zzz', '2018-06-29 19:07:20', '2018-07-01 20:47:22'),
(31, 'yohann', 'test', 'salut', 'aze', '2018-07-05 12:39:59', NULL),
(32, 'yohann', 'test', 'salut', 'aze', '2018-07-05 12:39:59', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
