-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 août 2018 à 21:50
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
) ENGINE=MyISAM AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `pseudo`, `content`, `creation_date`, `publication`) VALUES
(178, 32, 'mm', 'salut super article', '2018-08-27 20:29:30', 0),
(179, 32, 'mm', 'llll', '2018-08-27 20:30:17', 0),
(180, 32, 'mm', 'klkl', '2018-08-27 20:31:30', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `subtitle`, `content`, `creation_date`, `update_date`) VALUES
(32, 'Yohann', 'Emploi : l’intelligence artificielle manque de développeurs', 'Le nombre d’offres d’emploi à l’attention de spécialistes en intelligence artificielle a augmenté en moyenne de plus de 3% par mois en deux ans en France. Développeurs et ingénieurs R&D sont les plus recherchés, selon Joblift.', 'Le nombre d’offres d’emploi à l’attention de spécialistes en intelligence artificielle a augmenté en moyenne de plus de 3% par mois en deux ans en France. Développeurs et ingénieurs R&D sont les plus recherchés, selon Joblift.\r\n\r\nLa recherche de talents en intelligence artificielle (IA) s’accélère en France, rapporte Joblift.\r\n\r\nLe métamoteur de recherche d’emploi déclare avoir agrégé 7 729 offres autour de l’IA au cours des 24 derniers mois. Le volume d’offres a ainsi progressé de 3,6% par mois en moyenne. En 2018, au moins 6 000 nouvelles offres sont attendues, selon lui.\r\n\r\nLes profils les plus recherchés sont les suivants :\r\n\r\n– Développeurs (48% des offres) ;\r\n– Ingénieurs en R&D (16%) ;\r\n– Consultants experts en IA (10%).\r\n\r\nPar ailleurs, 5% des offres s’adressent aux directions informatiques (DSI).\r\n\r\nLes entreprises actives dans les télécoms sont à l’origine de 21% des annonces IA publiées ces derniers mois. L’industrie et la banque/assurance arrivent ensuite (18% des offres respectivement). Suivent : la santé (13%), la fintech (11%) et les transports/logistique (7%).\r\n\r\nGuerre des talents\r\nLes offres s’adressent pour l’essentiel à des profils dotés de 2 à 5 ans d’expérience au moins. 27% ciblent des profils plus expérimentés (au moins huit ans dans le secteur).\r\n\r\nJoblift estime à 55 jours la durée moyenne pour pourvoir un poste en CDI (45% des annonces) dans les métiers de l’intelligence artificielle en France. Une durée bien supérieure à celle affichée dans les autres secteurs (33 jours en moyenne).\r\n\r\nDans l’IA, les offres de stages (42% des annonces) sont pourvues en 49 jours en moyenne, contre moins de 40 jours pour trouver le profil recherché dans d’autres secteurs.\r\n\r\nEn cause : la guerre des talents que se livrent les organisations pour se doter de spécialistes en IA. La demande surpassant l’offre.\r\n\r\nEmmanuel Macron, qui recevait fin mars le rapport Villani sur le sujet, ambitionne de « doubler le nombre d’étudiants formés à l’IA d’ici à 2020 » pour mieux répondre aux besoins du marché. Et « positionner la France parmi les grandes nations de l’intelligence artificielle ».\r\n\r\nJoblift, de son côté, publie l’infographie ci-dessous pour illustrer ses chiffres ', '2018-08-27 07:56:15', NULL),
(31, 'Yohann', 'Microsoft et GitHub : un mariage à 7,5 milliards $', 'La plateforme de partage de codes pour les développeurs rejoint la galaxie Microsoft. Une opération qui devrait rapprocher GiHub des entreprises mais qui pourrait faire fuir des pans entiers de sa communauté.', 'Microsoft va débourser 7,5 milliards $ en actions pour acquérir GitHub. La transaction est soumise à l’approbation des autorités américaines et européennes pour boucler l’opération d’ici à la fin de l’année.\r\n\r\nQuel est le sens de cette acquisition ? Satya Nadella, CEO de Microsoft,  a promis , entre autre,\r\nd’exploiter son réseau de partenaires pour pousser l’usage de GitHub dans les entreprises, qui, sont déjà 1,5 million à l’utiliser. Le rapprochement sera aussi l’occasion de monter des passerelles pour « ouvrir les outils de développement de Microsoft à un nouveau public » de GitHub qui fédère 24 millions de développeurs. Des passerelles devraient également s’établir avec le cloud Azure, comme le laisse suggérer cette présentation. \r\n\r\nMicrosoft, gros contributeur\r\nMicrosoft a semble-t-il surpayé GitHub pour emporter l’affaire.  En effet, sa dernière valorisation connue était de 2 milliards $, à l’été 2015, à l’issue d’un tour de table emmené par Sequoia Capital.\r\n\r\nCôté financier,  les chiffres  des neuf premiers mois de 2016 parlent d’une perte de 66 millions $, pour un chiffre d’affaires de 98 millions. C’est la version entreprise de GitHub, lancée en 2011 et déclinée dans le cloud en 2017, qui constitue sa principale source de revenus.\r\n\r\nMicrosoft est devenu l’un des plus gros contributeurs de GitHub. Plus d’un millier de ses employés y hébergent du code et de la documentation. Parmi les projets versés à la communauté figurent PowerShell, Visual Studio Code et le moteur JavaScript d’Edge.\r\n\r\nPour diriger la structure, l’actuel CEO, Chris Wanstrath, laissera sa place à Nat Friedman arrivé chez Microsoft en 2016 à la faveur du rachat de  Xamarin, sa société à l’origine d’outils de développement d’applications mobiles.      ', '2018-08-27 07:47:09', NULL),
(30, 'Yohann', 'Les langages de développement qui ont la cote en 2018', 'Les langages de développement sont tellement nombreux, avec des caractéristiques diverses, qu’il peut être difficile d\'en sélectionner quelques-uns de manière objective.', 'PHP\r\n\r\nSi vous êtes un développeur indépendant ou professionnel, la popularité d’un langage est un excellent critère de sélection. Mesuré par PYPL, l’indicateur de popularité PYPL permet d’observer l’évolution des tendances telle que la constance de Java pour les applications web et mobile (Android) ou la perte de vitesse du PHP. \"La force du PHP repose sur des frameworks performants comme Symfony qui n’a de limite que votre propre imagination\" explique Guillaume de l\'agence TheTribe, spécialiste de la techno Symfony.\r\n\r\nJavaScript\r\n\r\nJavaScript arrive toujours dans le trio de tête, car il propose une interface simple et facile à manipuler avec une multitude de fonctionnalités au choix et des framewoks front. Il sera difficile de s’en passer pour le développement web tant il est complet. La grande majorité des développeurs savent coder dans ce langage. Il ne suffit donc plus de mentionner celui-ci dans son CV pour faire la différence, mais il est essentiel de le connaître pour mieux appréhender les nouveautés. \r\n\r\nC & C++\r\n\r\nC’est un langage qui gagne en popularité notamment parce que les objets connectés sont très en vogue. La programmation des logiciels embarqués est plus simple et plus accessible avec ce concept. Son futur est également bien plus sécurisé puisque des géants seront construits avec C comme Firefox ou Android (FushiaOS).\r\n\r\nC++ est un langage de développement en forte croissance que l’on retrouve souvent sur le podium en termes de classement. Il est performant, fiable et possède de nombreuses fonctionnalités. C’est donc le langage à privilégier pour certains types de projets : le développement d’applications d’appareils mobiles, d’applications d’entreprises, de bureau ou d’applications scientifiques. La version 20 qui sera finalisée en 2020 devrait inclure de nouvelles améliorations qui faciliteraient la gestion et la création du développeur.\r\n\r\nPython\r\n\r\nPython, élu « meilleur langage 2017 » par IEEE, dépasse encore Java et C en termes d’influence en 2018. Ce classement a été élaboré à partir des données collectées sur différentes sources. Ce sont les nombres de requêtes pour Python sur Google Search et les tendances provenant de Google Trends qui le conforme. C’est le best of qu’il faudrait apprendre à maîtriser en 2018', '2018-08-27 07:41:22', NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `pass`, `role`, `creation_date`) VALUES
(62, 'yohann', '$2y$10$ohNKq9CHNcNwW124miG/Qe3R05RSWjMviuY3jHWLEWHdpXcSuzcs6', 'admin', '2018-08-27 23:18:19'),
(63, 'yohann', '$2y$10$KZ4xFee76maurwlf2bh99.p.BdK9eNRCr.GKCFSWUkL/V0YqAWVuK', 'member', '2018-08-27 23:19:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
