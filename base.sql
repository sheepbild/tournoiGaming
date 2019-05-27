-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 19 Mai 2019 à 23:08
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hagla`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE IF NOT EXISTS `jeu` (
  `id_jeu` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_jeu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jeu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `libelle_jeu`) VALUES
(1, 'League of Legends'),
(2, 'Fortnite'),
(3, 'Call of Duty : WWII'),
(4, 'Counter Strike : Global Offensive'),
(5, 'DOTA 2'),
(6, 'Overwatch'),
(7, 'Earthstone'),
(8, 'Starcraft II');

-- --------------------------------------------------------

--
-- Structure de la table `jeu_rank`
--

CREATE TABLE IF NOT EXISTS `jeu_rank` (
  `id_jeu` int(11) NOT NULL,
  `id_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass_md5` text NOT NULL,
  `date_inscription` varchar(255) NOT NULL,
  `lvlepsi` varchar(255) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `login`, `email`, `pass_md5`, `date_inscription`, `lvlepsi`) VALUES
(15, 'joueur1', 'joueur1@gmail.com', 'motdepasse', '11-05-2019', 'b2'),
(14, 'Totuxx', 'sheepbild@gmail.com', 'motdepasse', '10-05-2019', 'b1');

-- --------------------------------------------------------

--
-- Structure de la table `membrestournoi`
--

CREATE TABLE IF NOT EXISTS `membrestournoi` (
  `idTournoi` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre_jeu`
--

CREATE TABLE IF NOT EXISTS `membre_jeu` (
  `id_membre` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre_jeu`
--

INSERT INTO `membre_jeu` (`id_membre`, `id_jeu`) VALUES
(15, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Structure de la table `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `id_rank` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_rank` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `rank`
--

INSERT INTO `rank` (`id_rank`, `libelle_rank`) VALUES
(1, 'Bronze'),
(2, 'Argent'),
(3, 'Or'),
(4, 'Diamant'),
(5, 'Platine');

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE IF NOT EXISTS `tournoi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idJeu` int(11) NOT NULL,
  `idCreateur` int(11) NOT NULL,
  `maxiJoueurs` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `confirme` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tournoi`
--

INSERT INTO `tournoi` (`id`, `idJeu`, `idCreateur`, `maxiJoueurs`, `date`, `confirme`) VALUES
(1, 8, 15, 5, '15-05-2019', 0),
(2, 5, 15, 7, '15-05-2019', 0),
(3, 5, 15, 7, '15-05-2019', 0),
(4, 5, 15, 7, '15-05-2019', 0),
(5, 5, 15, 7, '15-05-2019', 0),
(6, 8, 15, 5, '15-05-2019', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
