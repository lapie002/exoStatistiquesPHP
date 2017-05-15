-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 15 Mai 2017 à 14:53
-- Version du serveur :  5.7.18-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exostats`
--

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE `statistiques` (
  `id` int(4) NOT NULL,
  `ipInternaute` varchar(255) NOT NULL,
  `systemeExploitation` varchar(255) NOT NULL,
  `navigateur` varchar(255) NOT NULL,
  `urlPageVisite` varchar(255) NOT NULL,
  `dateHeureVisite` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statistiques`
--

INSERT INTO `statistiques` (`id`, `ipInternaute`, `systemeExploitation`, `navigateur`, `urlPageVisite`, `dateHeureVisite`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:20:42'),
(2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', '', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:23:45'),
(3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Safari', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:24:50'),
(4, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'Google Chrome', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:27:42'),
(5, '127.0.0.1', 'Linux', 'Chrome', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:41:10'),
(6, '127.0.0.1', 'Linux', 'Chrome', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:42:09'),
(7, '192.168.1.88', 'Linux', 'Chrome', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:44:17'),
(8, '192.168.1.105', 'Linux', 'Firefox', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:44:54'),
(9, '192.168.1.88', 'Linux', 'Chrome', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:47:01'),
(10, '192.168.1.14', 'Linux', 'Firefox', '/ExoStatistiques/lib/statstobdd.php', '2017-05-15 12:53:22');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `statistiques`
--
ALTER TABLE `statistiques`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
