-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 sep. 2018 à 18:37
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
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `token` varchar(60) DEFAULT NULL,
  `c_token` varchar(60) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `pass`, `email`, `role`, `token`, `c_token`, `creation_date`) VALUES
(108, 'admin', '$2y$10$NwPOCFeyEDESgDbr5Xv7cuEKRUmTk3OJwUfdKWFRhPx5Dqu3fBuEC', 'yohannzaoui@gmail.com', 'admin', '89898d09eb3f416c0fa9be1bfc5dd662', '89898d09eb3f416c0fa9be1bfc5dd662', '2018-09-01 11:26:52'),
(110, 'yohann', '$2y$10$RCJkWrp7gWlWns6qS/J9zOmHKPf/IJXNYjgES2I8acVLjWAUD.qkS', 'yohanndevlocal@gmail.com', 'member', 'd63da8ced8504749fd0acc4af14e0794', 'd63da8ced8504749fd0acc4af14e0794', '2018-09-01 11:31:05'),
(111, 'mm', '$2y$10$jN.B4SAClLejghwgegO66.N2oWw8iDKJZVUezxySqpB9K14GrULwy', 'yohannzaoui@gmail.com', 'member', '89898d09eb3f416c0fa9be1bfc5dd662', '89898d09eb3f416c0fa9be1bfc5dd662', '2018-09-05 20:22:09'),
(114, 'toto', '$2y$10$T1q.8PZm3U9ayAun9L1NSeRZw2jDaj7Eyxrlv8gWShDtQFcugthPK', 'yohanndevlocal@gmail.com', 'admin', 'd63da8ced8504749fd0acc4af14e0794', 'd63da8ced8504749fd0acc4af14e0794', '2018-09-06 15:58:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
