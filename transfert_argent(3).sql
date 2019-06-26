-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 12 jan. 2019 à 04:10
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `transfert_argent`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE IF NOT EXISTS `archive` (
  `idHistorique` int(255) NOT NULL AUTO_INCREMENT,
  `idTransfert` int(11) NOT NULL,
  `dateArchive` datetime NOT NULL,
  PRIMARY KEY (`idHistorique`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(255) NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `anniv` date DEFAULT NULL,
  `dateInscription` date NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `numero`, `email`, `nom`, `prenom`, `adresse`, `anniv`, `dateInscription`) VALUES
(12, '4184902843', 'keitadollard0@gmail.com', '', '', '', NULL, '2019-01-11'),
(11, '624392635', 'kalfa@gmail.com', '', '', '', NULL, '2019-01-10'),
(9, '622792811', 'mamadou@gmail.com', '', '', '', NULL, '2019-01-10');

-- --------------------------------------------------------

--
-- Structure de la table `connexiondb`
--

DROP TABLE IF EXISTS `connexiondb`;
CREATE TABLE IF NOT EXISTS `connexiondb` (
  `nom` int(11) NOT NULL,
  `dateConnexion` datetime NOT NULL,
  `dureeConnexion` int(11) NOT NULL,
  `adresseIp` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `numeroClt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`idProfil`, `numeroClt`, `password`) VALUES
(2, '622792811', '$2y$10$jozCM0WMFsf5gxNNMQphOOoA.2vPkXb49JIVwJmTLB9gB.dttvS2e'),
(10, '4184902843', '$2y$10$T84QrmKGYsOHNegwHFDcD.2TmputjvLi6W742MG1k.womujVv2SKS'),
(9, '624392635', '$2y$10$eEL/yJjCWjNQVSY5SHdmYu9xFwG.lYLHOOKepBGY1XypAxnKli.NG');

-- --------------------------------------------------------

--
-- Structure de la table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `idSms` int(11) NOT NULL AUTO_INCREMENT,
  `dateEnvoi` datetime NOT NULL,
  `messageEnvoye` text NOT NULL,
  `messageReceived` text NOT NULL,
  `destinataireSms` text NOT NULL,
  `dateReceived` datetime NOT NULL,
  PRIMARY KEY (`idSms`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

DROP TABLE IF EXISTS `transfert`;
CREATE TABLE IF NOT EXISTS `transfert` (
  `idTransfert` int(255) NOT NULL AUTO_INCREMENT,
  `expediteur` varchar(255) NOT NULL,
  `destinataire` varchar(255) NOT NULL,
  `dateTransfert` datetime NOT NULL,
  `frais` float NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `montant` float NOT NULL,
  `total` float NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`idTransfert`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `transfert_en_cours`
--

DROP TABLE IF EXISTS `transfert_en_cours`;
CREATE TABLE IF NOT EXISTS `transfert_en_cours` (
  `idTransfert` int(255) NOT NULL AUTO_INCREMENT,
  `expediteur` varchar(255) NOT NULL,
  `dateTransfert` datetime NOT NULL,
  `destinataire` varchar(255) NOT NULL,
  `montant` float NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`idTransfert`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
