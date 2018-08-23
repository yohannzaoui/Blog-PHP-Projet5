-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 août 2018 à 20:26
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publication` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `pseudo`, `content`, `creation_date`, `publication`) VALUES
(40, 1, 'jean', 'sss', '2018-07-28 19:31:24', 1),
(49, 1, 'plo', 'plo', '2018-07-28 20:53:46', 1),
(50, 2, 'popo', 'aq', '2018-07-28 21:04:56', 1),
(51, 2, 'popo', 'aq', '2018-07-28 21:06:01', 0),
(56, 1, 'index', 'post', '2018-07-29 07:23:32', 0),
(59, 1, 'fred', 'qa', '2018-07-29 07:31:57', 0),
(60, 1, 'rere', 'za', '2018-07-29 07:32:37', 0),
(61, 1, 'rere', 'tutu', '2018-07-29 07:33:06', 0),
(63, 1, 'test', 'salut', '2018-07-29 07:42:30', 0),
(64, 2, 'popo', 'rr', '2018-07-29 07:43:20', 0),
(67, 2, 'popo', 'dddd', '2018-07-29 10:47:54', 0),
(68, 2, 'jean', 'ss', '2018-07-29 10:48:03', 0),
(69, 2, 'jean', 'ss', '2018-07-29 10:51:23', 0),
(73, 2, 'jean', 'vvv', '2018-07-29 10:55:27', 0),
(74, 2, 'zaza', 'll', '2018-07-31 09:02:25', 0),
(77, 1, 'nn', 'aa', '2018-07-31 10:01:17', 0),
(79, 2, 'gdgd', 'lkm', '2018-07-31 10:10:42', 0),
(167, 11, 'test', 'test', '2018-08-22 12:32:55', 0),
(172, 11, 'test', 'test envoyer', '2018-08-23 10:59:34', 1),
(90, 4, 'yohann', 'ccc', '2018-08-01 18:34:31', 0),
(91, 2, 'yohann', 'mlmlk', '2018-08-02 11:40:55', 0),
(92, 2, 'yohann', 'mlmlk', '2018-08-02 12:33:23', 0),
(93, 2, 'yohann', 'mlmlk', '2018-08-02 12:33:54', 0),
(96, 2, 'ùmlùm', 'mlùml', '2018-08-05 13:58:40', 1),
(165, 11, 'test', 'test', '2018-08-22 12:25:09', 1),
(166, 11, 'test', 'testA', '2018-08-22 12:28:58', 1),
(164, 11, 'test', 'test', '2018-08-22 12:23:13', 1),
(104, 1, 'lkmlk', 'kjlkj', '2018-08-05 14:10:04', 1),
(105, 1, 'lkmlk', 'kjlkj', '2018-08-05 14:22:13', 1),
(106, 1, 'lkmlk', 'kjlkj', '2018-08-05 14:24:00', 1),
(107, 1, 'lkmlk', 'kjlkj', '2018-08-05 14:24:51', 1),
(108, 1, 'lkmlk', 'kjlkj', '2018-08-05 14:26:32', 1),
(110, 2, 'mùlùmlmù', 'ùmlùmlmù', '2018-08-05 14:39:55', 1),
(111, 1, 'lkmlk', 'kjlkj', '2018-08-05 14:47:18', 1),
(112, 1, 'ùmlùml', 'ùlùml', '2018-08-05 14:47:41', 1),
(113, 1, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 'mùmlùmlù', '2018-08-05 14:48:06', 1),
(162, 11, 'yohann', 'test comm article 12', '2018-08-22 09:10:12', 1),
(163, 11, 'yohann', 'test comm article 12', '2018-08-22 09:26:41', 1),
(125, 4, 'ùm*ù', 'ljlk', '2018-08-06 07:25:49', 1),
(126, 4, 'yohann', 'llll', '2018-08-06 07:26:05', 1),
(130, 2, 'kmlkml', 'ML%ML%L', '2018-08-08 18:43:45', 1),
(131, 2, 'ùlùml', 'ùmùm', '2018-08-08 18:45:03', 1),
(132, 2, 'yohannzaoui', 'test', '2018-08-11 10:57:52', 0),
(133, 2, 'yohannzaoui', 'test', '2018-08-11 10:58:30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `subtitle`, `content`, `creation_date`, `update_date`) VALUES
(11, 'Yohann', 'Titre article 12', 'sous titre article 12', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?                                            ', '2018-08-22 09:09:51', NULL),
(6, 'Yohann', 'Titre 7', 'sous titre 7', 'blabla', '2018-08-17 09:40:00', NULL),
(8, 'Yohann', 'Titre 9', 'sous titre 9', 'Texte article 9', '2018-08-18 09:57:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo_UNIQUE` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `pass`, `role`, `creation_date`) VALUES
(23, 'azerty', '$2y$10$QzC14IcwyDVKw4Yn3yyAWOktyZpNvcHQkSLs27Hk9Ls..uovslDm6', 'member', '2018-08-22 22:33:44'),
(26, 'supermembre2', '$2y$10$OVpzYYNk3MwehjBOz0HD2ud8sCY4s.bMm0Pcu/v/QKC3B7BccAtEa', 'member', '2018-08-22 23:12:26'),
(27, 'yohann', '$2y$10$OKq/V99IWgFVkyHsh5vG.eEPFASsjaBkgHpUieupHdfedZZYEtHi2', 'admin', '2018-08-23 11:42:47'),
(28, 'superadmin', '$2y$10$re53MlueV7opX5yuVljsgeRT9bSMZYQEoL3CzNnyCTajWDgxTEPGO', 'member', '2018-08-23 13:03:24'),
(29, 'megamembre', '$2y$10$yWwI2Jz9sAOCukKzVqGuRuxamKJl5i62pLoChOHIq6WrWWtJB0/fG', 'member', '2018-08-23 13:06:00'),
(30, 'toto', '$2y$10$m6zdslYKnRMpi/qfcj2JsupjAbS6YsfX6GFYk4G7T/0xzK5qcGTqK', 'admin', '2018-08-23 14:48:37'),
(31, 'membre', '$2y$10$RUORZdopt70P8dlJSaIYyOzomZBAgLMLK0qknl12kOlh1tGS49EU6', 'member', '2018-08-23 14:52:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
