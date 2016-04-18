-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 18 Avril 2016 à 00:09
-- Version du serveur :  5.5.42
-- Version de PHP :  5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `policenationale`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis_recherche`
--

CREATE TABLE `avis_recherche` (
  `ID_RECHERCHE` int(11) NOT NULL,
  `ID_PERSONNE` int(11) NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` date DEFAULT NULL,
  `REMARQUE` varchar(300) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avis_recherche`
--

INSERT INTO `avis_recherche` (`ID_RECHERCHE`, `ID_PERSONNE`, `DATE_DEBUT`, `DATE_FIN`, `REMARQUE`) VALUES
(1, 1, '2016-04-01', '2016-04-07', 'personne recherche'),
(2, 2, '2016-04-14', NULL, 'personne recherche');

-- --------------------------------------------------------

--
-- Structure de la table `infraction`
--

CREATE TABLE `infraction` (
  `ID_INFRACTION` int(11) NOT NULL,
  `ID_PERSONNE` int(11) NOT NULL,
  `ID_TYPE_INFRACTION` int(11) NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `DATE_INFRACTION` date NOT NULL,
  `REMARQUE` varchar(300) DEFAULT NULL,
  `DETENTION` int(11) NOT NULL,
  `ETAT` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `infraction`
--

INSERT INTO `infraction` (`ID_INFRACTION`, `ID_PERSONNE`, `ID_TYPE_INFRACTION`, `ID_UTILISATEUR`, `DATE_INFRACTION`, `REMARQUE`, `DETENTION`, `ETAT`) VALUES
(1, 2, 1, 1, '2016-04-05', 'Vitesse 175kmh', 1, 0),
(3, 2, 1, 1, '2016-04-11', 'Vitesse 195kmh', 1, 0),
(6, 1, 2, 1, '2016-04-17', 'Vitesse 200kmh', 1, 0),
(8, 1, 3, 1, '2016-04-17', 'Outrage a un agent publique', 1, 0),
(7, 1, 3, 1, '2016-04-17', 'Vandalisme de vehicule', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `permis_de_conduire`
--

CREATE TABLE `permis_de_conduire` (
  `ID_PERMIS` int(11) NOT NULL,
  `ID_PERSONNE` int(11) NOT NULL,
  `DATE_PERMIS` date NOT NULL,
  `CATEGORIE_A` int(11) NOT NULL,
  `CATEGORIE_B` int(11) NOT NULL,
  `CATEGORIE_C` int(11) NOT NULL,
  `CATEGORIE_D` int(11) NOT NULL,
  `CATEGORIE_E` int(11) NOT NULL,
  `CATEGORIE_F` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `permis_de_conduire`
--

INSERT INTO `permis_de_conduire` (`ID_PERMIS`, `ID_PERSONNE`, `DATE_PERMIS`, `CATEGORIE_A`, `CATEGORIE_B`, `CATEGORIE_C`, `CATEGORIE_D`, `CATEGORIE_E`, `CATEGORIE_F`) VALUES
(1, 1, '2016-04-15', 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `ID_PERSONNE` int(11) NOT NULL,
  `NOM` varchar(150) DEFAULT NULL,
  `PRENOM` varchar(150) DEFAULT NULL,
  `SEXE` int(11) NOT NULL,
  `DATE_NAISS` date NOT NULL,
  `ADRESSE` varchar(250) NOT NULL,
  `IMAGE` varchar(300) DEFAULT NULL,
  `LIEU_NAISS` varchar(250) DEFAULT NULL,
  `IMMATRICULATION` varchar(150) DEFAULT NULL,
  `PROFESSION` varchar(150) DEFAULT NULL,
  `NOM_PERE` varchar(250) NOT NULL,
  `NOM_MERE` varchar(250) NOT NULL,
  `SITUATION_MAT` varchar(50) NOT NULL,
  `NUMERO_TAG` varchar(250) NOT NULL,
  `STATUT` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`ID_PERSONNE`, `NOM`, `PRENOM`, `SEXE`, `DATE_NAISS`, `ADRESSE`, `IMAGE`, `LIEU_NAISS`, `IMMATRICULATION`, `PROFESSION`, `NOM_PERE`, `NOM_MERE`, `SITUATION_MAT`, `NUMERO_TAG`, `STATUT`) VALUES
(1, 'Randriamanantena', 'Jean', 1, '1990-09-10', 'rue carnot, 11', NULL, 'Madagascar', '102456895412', 'Informaticien', 'Rakoto', 'Ravao', 'marie', '123456789', ''),
(2, 'Rasoamanana', 'Safidy', 1, '1992-04-05', 'lot IVK 75 bis', NULL, 'antananarivo', '105624985321', 'Entrepreneur', 'Rasendra', 'Ravao', 'celibataire', '456987123', '1'),
(3, 'Andriamanantoanina', 'Tafita', 1, '1990-04-12', 'rue drapper', NULL, 'Soavinandriana', '102456210365', 'Senateur', 'Andria', 'Raketa', 'celibataire', '654123951', '1');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `personne_recherche`
--
CREATE TABLE `personne_recherche` (
`ID_PERSONNE` int(11)
,`NOM` varchar(150)
,`PRENOM` varchar(150)
,`SEXE` int(11)
,`PROFESSION` varchar(150)
,`ID_RECHERCHE` int(11)
,`DATE_DEBUT` date
,`DATE_FIN` date
,`REMARQUE` varchar(300)
);

-- --------------------------------------------------------

--
-- Structure de la table `type_infraction`
--

CREATE TABLE `type_infraction` (
  `ID_TYPE_INFRACTION` int(11) NOT NULL,
  `LIBELLE` varchar(250) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `AMENDE` decimal(10,3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_infraction`
--

INSERT INTO `type_infraction` (`ID_TYPE_INFRACTION`, `LIBELLE`, `TYPE`, `AMENDE`) VALUES
(1, 'Exces de vitesse', 'infraction', '5000.000'),
(2, 'Refus d''obtempérer', 'infraction', '50000.000'),
(3, 'Outrage a un agent', 'infraction', '10000.000');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `MDP` varchar(100) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `ID_PERSONNE` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `USERNAME`, `MDP`, `TYPE`, `ID_PERSONNE`) VALUES
(1, 'tafita', 'tafita', 'controleur', 3),
(2, 'safidy', 'safidy', 'civil', 2),
(3, 'jean', 'jeans', 'admin', 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_infraction_libelle`
--
CREATE TABLE `view_infraction_libelle` (
`ID_INFRACTION` int(11)
,`ID_PERSONNE` int(11)
,`ID_UTILISATEUR` int(11)
,`DATE_INFRACTION` date
,`REMARQUE` varchar(300)
,`DETENTION` int(11)
,`LIBELLE` varchar(250)
,`TYPE` varchar(100)
,`AMENDE` decimal(10,3)
,`ETAT` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la vue `personne_recherche`
--
DROP TABLE IF EXISTS `personne_recherche`;

CREATE  VIEW `personne_recherche` AS select `p`.`ID_PERSONNE` AS `ID_PERSONNE`,`p`.`NOM` AS `NOM`,`p`.`PRENOM` AS `PRENOM`,`p`.`SEXE` AS `SEXE`,`p`.`PROFESSION` AS `PROFESSION`,`ar`.`ID_RECHERCHE` AS `ID_RECHERCHE`,`ar`.`DATE_DEBUT` AS `DATE_DEBUT`,`ar`.`DATE_FIN` AS `DATE_FIN`,`ar`.`REMARQUE` AS `REMARQUE` from (`personne` `p` join `avis_recherche` `ar`) where (`p`.`ID_PERSONNE` = `ar`.`ID_PERSONNE`);

-- --------------------------------------------------------

--
-- Structure de la vue `view_infraction_libelle`
--
DROP TABLE IF EXISTS `view_infraction_libelle`;

CREATE VIEW `view_infraction_libelle` AS select `i`.`ID_INFRACTION` AS `ID_INFRACTION`,`i`.`ID_PERSONNE` AS `ID_PERSONNE`,`i`.`ID_UTILISATEUR` AS `ID_UTILISATEUR`,`i`.`DATE_INFRACTION` AS `DATE_INFRACTION`,`i`.`REMARQUE` AS `REMARQUE`,`i`.`DETENTION` AS `DETENTION`,`ti`.`LIBELLE` AS `LIBELLE`,`ti`.`TYPE` AS `TYPE`,`ti`.`AMENDE` AS `AMENDE`,`i`.`ETAT` AS `ETAT` from (`infraction` `i` join `type_infraction` `ti`) where (`i`.`ID_TYPE_INFRACTION` = `ti`.`ID_TYPE_INFRACTION`);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `avis_recherche`
--
ALTER TABLE `avis_recherche`
  ADD PRIMARY KEY (`ID_RECHERCHE`),
  ADD KEY `FK_ASSOCIATION_4` (`ID_PERSONNE`);

--
-- Index pour la table `infraction`
--
ALTER TABLE `infraction`
  ADD PRIMARY KEY (`ID_INFRACTION`),
  ADD KEY `FK_ASSOCIATION_1` (`ID_UTILISATEUR`),
  ADD KEY `FK_ASSOCIATION_2` (`ID_PERSONNE`),
  ADD KEY `FK_ASSOCIATION_3` (`ID_TYPE_INFRACTION`);

--
-- Index pour la table `permis_de_conduire`
--
ALTER TABLE `permis_de_conduire`
  ADD PRIMARY KEY (`ID_PERMIS`),
  ADD KEY `FK_ASSOCIATION_5` (`ID_PERSONNE`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`ID_PERSONNE`);

--
-- Index pour la table `type_infraction`
--
ALTER TABLE `type_infraction`
  ADD PRIMARY KEY (`ID_TYPE_INFRACTION`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_UTILISATEUR`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `avis_recherche`
--
ALTER TABLE `avis_recherche`
  MODIFY `ID_RECHERCHE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `infraction`
--
ALTER TABLE `infraction`
  MODIFY `ID_INFRACTION` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `permis_de_conduire`
--
ALTER TABLE `permis_de_conduire`
  MODIFY `ID_PERMIS` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `ID_PERSONNE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `type_infraction`
--
ALTER TABLE `type_infraction`
  MODIFY `ID_TYPE_INFRACTION` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;