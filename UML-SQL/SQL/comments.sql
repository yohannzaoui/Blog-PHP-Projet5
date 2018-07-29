-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 29 juil. 2018 à 08:06
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
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `pseudo`, `content`, `creation_date`, `publication`) VALUES
(1, 2, 'jean', 'jj', '2018-07-28 12:30:59', 0),
(2, 4, 'yohann', 'gtgt', '2018-07-28 12:56:18', 0),
(3, 4, 'test', 'tt', '2018-07-28 12:57:20', 0),
(4, 4, 'test', 'hh', '2018-07-28 12:58:00', 1),
(5, 4, 'toto', 'salu\r\n', '2018-07-28 13:03:02', 0),
(6, 4, 'toto', 'salu\r\n', '2018-07-28 13:04:28', 0),
(7, 4, 'titi', 'tata', '2018-07-28 13:22:42', 0),
(8, 4, 'titi', 'tata', '2018-07-28 13:24:33', 0),
(9, 4, 'zaza', 'mlkml', '2018-07-28 13:52:44', 0),
(10, 4, 'zaza', 'mlkml', '2018-07-28 13:53:36', 0),
(11, 4, 'zaza', 'mlkml', '2018-07-28 13:53:48', 0),
(12, 4, 'zaza', 'mlkml', '2018-07-28 14:06:07', 0),
(13, 4, 'gogo', 'gaga', '2018-07-28 14:14:02', 0),
(14, 4, 'roro', 'rara\r\n', '2018-07-28 14:15:03', 0),
(15, 4, 'roro', 'rara\r\n', '2018-07-28 14:16:53', 0),
(16, 4, 'roro', 'rara\r\n', '2018-07-28 14:17:51', 0),
(17, 4, 'roro', 'rara\r\n', '2018-07-28 14:18:25', 0),
(18, 4, 'roro', 'rara\r\n', '2018-07-28 14:20:31', 0),
(19, 4, 'roro', 'rara\r\n', '2018-07-28 14:20:49', 0),
(20, 4, 'roro', 'rara\r\n', '2018-07-28 14:21:25', 0),
(21, 4, 'roro', 'rara\r\n', '2018-07-28 14:22:23', 0),
(22, 4, 'roro', 'rara\r\n', '2018-07-28 14:26:20', 0),
(23, 4, 'roro', 'rara\r\n', '2018-07-28 14:27:12', 0),
(24, 4, 'roro', 'rara\r\n', '2018-07-28 14:27:30', 0),
(25, 4, 'roro', 'rara\r\n', '2018-07-28 14:28:28', 0),
(26, 4, 'roro', 'rara\r\n', '2018-07-28 14:29:01', 0),
(27, 4, 'yoyo', 'tata', '2018-07-28 14:53:43', 0),
(28, 4, 'yoyo', 'tata', '2018-07-28 14:55:08', 0),
(29, 4, 'yoyo', 'tata', '2018-07-28 14:55:43', 0),
(30, 4, 'caca', 'coco', '2018-07-28 14:55:55', 0),
(31, 2, 'yoyo', 'yaya', '2018-07-28 15:07:01', 0),
(32, 2, 'yoyo', 'yaya', '2018-07-28 15:13:36', 0),
(33, 2, 'te', 'te', '2018-07-28 17:05:04', 0),
(34, 2, 'jean', 'jj', '2018-07-28 17:11:15', 0),
(35, 2, 'jean', 'jj', '2018-07-28 17:13:29', 0),
(36, 2, 'pupu', 'popo', '2018-07-28 17:13:59', 0),
(37, 2, 'jean', 'ss', '2018-07-28 19:23:03', 0),
(38, 2, 'azerty', 'azerty', '2018-07-28 19:23:18', 0),
(39, 1, 'jean', 'sss', '2018-07-28 19:29:51', 0),
(40, 1, 'jean', 'sss', '2018-07-28 19:31:24', 0),
(41, 2, 'aq', 'aq', '2018-07-28 20:34:12', 0),
(42, 2, 'aq', 'aq', '2018-07-28 20:36:08', 0),
(43, 2, 'aq²', 'aq', '2018-07-28 20:36:36', 0),
(44, 2, 'aq²', 'aq', '2018-07-28 20:37:21', 0),
(45, 2, 'jean', 'qq', '2018-07-28 20:40:29', 0),
(46, 2, 'jean', 'qq', '2018-07-28 20:40:47', 0),
(47, 2, 'pierre', 'wx', '2018-07-28 20:44:33', 0),
(48, 2, 'yohann', 'bonjour', '2018-07-28 20:47:18', 0),
(49, 1, 'plo', 'plo', '2018-07-28 20:53:46', 0),
(50, 2, 'popo', 'aq', '2018-07-28 21:04:56', 0),
(51, 2, 'popo', 'aq', '2018-07-28 21:06:01', 0),
(52, 2, 'vv', 'vv', '2018-07-28 21:12:29', 0),
(53, 2, 'vv', 'vv', '2018-07-28 21:12:59', 0),
(54, 1, 'jean', 'jj', '2018-07-29 07:18:42', 0),
(55, 1, 'index', 'post', '2018-07-29 07:19:28', 0),
(56, 1, 'index', 'post', '2018-07-29 07:23:32', 0),
(57, 1, 'pierre', 'jj', '2018-07-29 07:26:39', 0),
(58, 1, 'pierre', 'jj', '2018-07-29 07:27:22', 0),
(59, 1, 'fred', 'qa', '2018-07-29 07:31:57', 0),
(60, 1, 'rere', 'za', '2018-07-29 07:32:37', 0),
(61, 1, 'rere', 'tutu', '2018-07-29 07:33:06', 0),
(62, 2, 'youiuuuuuu', 'fdfdfdfdf', '2018-07-29 07:35:52', 0),
(63, 1, 'test', 'salut', '2018-07-29 07:42:30', 0),
(64, 2, 'popo', 'rr', '2018-07-29 07:43:20', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
