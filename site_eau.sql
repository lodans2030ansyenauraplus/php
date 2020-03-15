-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 15 mars 2020 à 09:54
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_eau`
--

-- --------------------------------------------------------

--
-- Structure de la table `a`
--

DROP TABLE IF EXISTS `a`;
CREATE TABLE IF NOT EXISTS `a` (
  `numme` bigint(20) NOT NULL,
  `numraison` bigint(20) NOT NULL,
  PRIMARY KEY (`numme`,`numraison`),
  UNIQUE KEY `ID_a_IND` (`numme`,`numraison`),
  KEY `FKa_ras_IND` (`numraison`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numc` bigint(20) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `numtel` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`numc`),
  UNIQUE KEY `ID_client_IND` (`numc`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`numc`, `adresse`, `numtel`, `email`, `mdp`) VALUES
(46, '10', 645789520, 'a@gmail.com', '$2y$10$GDmoNp7VKZnuom2rsNfaZunOJgILxE404DaynnvJ6HxOTwjgRPNDy'),
(47, '10 rue ampère', 645237896, 'az@gmail.com', '$2y$10$75odpDLWl0Xmoh2Vx7zIK.D2LnxUVEQQFMxU5uSEd.k8se54MFSYa'),
(48, '121 rue naplok', 677236598, 'anas@gmail.com', '$2y$10$KpUcswdXgD.HkMkjMsbaW.h9fD6ugS81B1VyEdOMkEWwNJsUWETOW'),
(49, 'fsdgfhsrd', 654253214, 'aar@gmail.com', '$2y$10$aJgc5KGXcbF4w60hKGd3gODZJjTy.CZSuffYbo9XVayp2NLBxBT1e'),
(50, 'fqsgr', 645258774, 'aqw@gmail.com', '$2y$10$9MzANjnSBLHoI9u5R0/1rOBmd3UqAnoFARgRWooNv8mGrApdsGPeW'),
(51, 'fsdgfhsrd', 645789522, '1@gmail.com', '$2y$10$8Nby6HOdtfyG2/NwJiQ.FepbpFnEMqxnFZXkMLeWlvQHcfiOhuZgO'),
(52, '179, bd pereire', 654253218, 'exemple@gmail.com', '$2y$10$lNtOxWhRExVM6EnP8FWPVuoEl2bGj7kUseyrCDqu7zRlZOtLnLGLS');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `numerocommande` bigint(20) NOT NULL AUTO_INCREMENT,
  `statutcommande` char(20) NOT NULL,
  `numc` bigint(20) NOT NULL,
  PRIMARY KEY (`numerocommande`),
  UNIQUE KEY `ID_commande_IND` (`numerocommande`),
  KEY `FKpasse_b_IND` (`numc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`numerocommande`, `statutcommande`, `numc`) VALUES
(1, 'valide', 49),
(2, 'nonvalide', 49),
(3, 'nonvalide', 51),
(4, 'nonvalide', 52);

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `numcommande` bigint(20) NOT NULL,
  `numproduit` bigint(20) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`numcommande`,`numproduit`),
  KEY `numcommande` (`numcommande`),
  KEY `numproduit` (`numproduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `numfacture` bigint(20) NOT NULL,
  `numcommande` bigint(20) NOT NULL,
  `montant` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`numfacture`),
  KEY `numcommande` (`numfacture`),
  KEY `numc` (`numcommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `numme` bigint(20) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `datem` date NOT NULL,
  `heurem` int(11) NOT NULL,
  `numerocommande` bigint(20) NOT NULL,
  `numc` bigint(20) DEFAULT NULL,
  `ecr_numc` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`numme`),
  UNIQUE KEY `ID_message_IND` (`numme`),
  KEY `FKrefere_IND` (`numerocommande`),
  KEY `FKecrit_b_IND` (`numc`),
  KEY `FKecrit_a_IND` (`ecr_numc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `particulier`
--

DROP TABLE IF EXISTS `particulier`;
CREATE TABLE IF NOT EXISTS `particulier` (
  `numc` bigint(20) NOT NULL,
  `nom` char(50) NOT NULL,
  `prenom` char(50) NOT NULL,
  `age` char(50) NOT NULL,
  `civilite` char(10) NOT NULL,
  PRIMARY KEY (`numc`),
  UNIQUE KEY `FKcli_par_IND` (`numc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `particulier`
--

INSERT INTO `particulier` (`numc`, `nom`, `prenom`, `age`, `civilite`) VALUES
(46, 'test', 'test', '30', 'Bizarre'),
(47, 'jean', 'pierre', '15', 'Mr'),
(49, 'michou', '13', '18', 'Mr'),
(51, 'ed', 'el', '16', 'Mr');

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `numerocommande` bigint(20) NOT NULL,
  `numpro` bigint(20) NOT NULL,
  `quantite` int(11) NOT NULL,
  `statutp` varchar(20) NOT NULL,
  PRIMARY KEY (`numerocommande`,`numpro`),
  UNIQUE KEY `ID_possede_IND` (`numerocommande`,`numpro`),
  KEY `FKpos_pro_IND` (`numpro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`numerocommande`, `numpro`, `quantite`, `statutp`) VALUES
(2, 1, 25, 'nonvalide'),
(2, 2, 12, 'nonvalide');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `numpro` bigint(20) NOT NULL,
  `nompro` text NOT NULL,
  `provenance` char(20) NOT NULL,
  `descriptif` text NOT NULL,
  `prix` int(20) NOT NULL,
  `image` text NOT NULL,
  `type_produit` varchar(50) NOT NULL,
  PRIMARY KEY (`numpro`),
  UNIQUE KEY `ID_produit_IND` (`numpro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`numpro`, `nompro`, `provenance`, `descriptif`, `prix`, `image`, `type_produit`) VALUES
(1, 'Voss - Eau minérale plate norvégienne', 'Norvège', '<p>L’eau de VOSS est  dépourvue de sodium : 22mg (le taux le plus bas existant).<br> Cette eau unique jaillit sous la glace sous une couche aquifere vierge de Norvège.<br> Voss signifie « chute d’eau » en norvégien.<br> L’eau de Voss est aussi dépourvue de minéraux, sa pureté est extraordinaire.<br>Le design de sa bouteille est signé par un des designers de Ralph Lauren et Calvin Klein.<br>Eau de référence dans les plus prestigieux établissements du monde, on la retrouve notamment au Trafalgar Hôtel de Londres ou au Ritz-Carlton Hôtel de Manhattan.</p>\r\n				<h1 class=\"page-titlee\">Voss, l’eau de luxe des stars</h1>\r\n				<p>Madonna est une une  grande fidèle de l’eau de VOSS.<br>De nombreuses stars américaines sont eux aussi fan de la VOSS.<br>L’eau de Voss existe aussi en version pétillante pour satisfaire tous les palais.</p>', 5, 'assets/images/1.jpg', 'simple'),
(2, 'Beneva Black Water - ', 'Alpes', '<h2>Eau pure des Alpes + Charbon actif 100% naturel = LA boisson « détox » et purifiante.</h2>\r\n				<p>Beneva Black Water c’est la première boisson à base de charbon actif 100% naturel unanimement reconnu pour ses qualités dépuratives.<br>Si vous souhaitez avoir une boisson « détox » sous la main à n’importe quel moment de la journée, la Beneva Black Water est faite pour vous. Son goût ? De l’eau plate… </p>\r\n				<p> <u>Ses quelques qualités :</u> </p>\r\n				<p> .Détox <br>.Purifier son corps <br>.Anti-vieillissement <br>.Donne de l’éclat aux cheveux <br>.Rend les dents plus blanches</p>\r\n				<p>100% Vegan, sans calories ni matières grasses et 0 sucres, c’est une boisson rafraichissante pour le corps qui peut se boire à tout moment de la journée.</p>', 3, 'assets/images/2.jpg', 'simple');

-- --------------------------------------------------------

--
-- Structure de la table `professionel`
--

DROP TABLE IF EXISTS `professionel`;
CREATE TABLE IF NOT EXISTS `professionel` (
  `numc` bigint(20) NOT NULL,
  `nomentreprise` char(50) NOT NULL,
  `numerosiret` char(50) NOT NULL,
  `denominationsocial` char(20) NOT NULL,
  PRIMARY KEY (`numc`),
  UNIQUE KEY `FKcli_pro_IND` (`numc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professionel`
--

INSERT INTO `professionel` (`numc`, `nomentreprise`, `numerosiret`, `denominationsocial`) VALUES
(48, 'larbi', '056489987', 'SNC'),
(52, 'mongroscul', '01020304005649', 'SARL');

-- --------------------------------------------------------

--
-- Structure de la table `rasion`
--

DROP TABLE IF EXISTS `rasion`;
CREATE TABLE IF NOT EXISTS `rasion` (
  `numraison` bigint(20) NOT NULL,
  `descriptif` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`numraison`),
  UNIQUE KEY `ID_rasion_IND` (`numraison`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tracking`
--

DROP TABLE IF EXISTS `tracking`;
CREATE TABLE IF NOT EXISTS `tracking` (
  `numtrac` bigint(20) NOT NULL,
  `numerocommande` bigint(20) NOT NULL,
  `position` char(20) NOT NULL,
  `statut` char(20) NOT NULL,
  `modedelivraison` char(20) NOT NULL,
  PRIMARY KEY (`numtrac`),
  UNIQUE KEY `FKest_suivie_ID` (`numerocommande`),
  UNIQUE KEY `ID_tracking_IND` (`numtrac`),
  UNIQUE KEY `FKest_suivie_IND` (`numerocommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `particulier`
--
ALTER TABLE `particulier`
  ADD CONSTRAINT `particulier_ibfk_1` FOREIGN KEY (`numc`) REFERENCES `client` (`numc`);

--
-- Contraintes pour la table `professionel`
--
ALTER TABLE `professionel`
  ADD CONSTRAINT `professionel_ibfk_1` FOREIGN KEY (`numc`) REFERENCES `client` (`numc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
