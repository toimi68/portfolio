-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 11 mars 2019 à 12:48
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `foliosymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `idcompetence` int(3) NOT NULL,
  `cptechnology` varchar(255) NOT NULL,
  `cplevel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`idcompetence`, `cptechnology`, `cplevel`) VALUES
(17, 'fab fa-html5', 2),
(18, 'fab fa-css3', 2),
(19, 'fab fa-js-square', 1),
(20, 'fab fa-php', 2),
(21, 'fab fa-angular', 4);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `idcontact` int(3) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`idcontact`, `nom`, `prenom`, `email`, `message`) VALUES
(1, 'Indiana', 'Jones', 'indiana.jones@arch.com', 'Ceci est un test'),
(4, 'Diallo', 'Alpha', 'alpha.diallo@lepoles.com', 'xsaDFCZQFCAZFAZF4C'),
(6, 'Herisson', 'Sandra', 'sandra.herisson@lepoles.com', 'xbhsqjkbjsqKBJSQknxcjqsmnckqncklqnckkln cjknqsjkcnjkqc bjq hjqkc qjsdcvhjhc jdcd                                '),
(52, 'Creed', 'Apollo', 'apollo.creed@rocky.com', '             xcqscqcqsqxsqXSQxsQXSQxsqxqsxqsxqsxqsxqsxs                   '),
(59, 'BAILLET', 'Sylvain', 'sylvain.baillet@lepoles.com', '                                '),
(60, 'BARUA', 'Sabuj', 'sabuj.barua@lepoles.com', 'xbshjxbnsjqxnskqlxnksqxnkmqXS                            '),
(61, 'BARUA', 'Sabuj', 'sabuj.barua@lepoles.com', 'xbshjxbnsjqxnskqlxnksqxnkmqXS                            '),
(62, 'quelque chose comme ca', 'Jordan', 'sabuj.barua@lepoles.com', 'xbshjxbnsjqxnskqlxnksqxnkmqXS                            '),
(63, 'JOINVIL', 'Luc', 'luc.joinvil@lepoles.com', '                   wqWQwqWQwQWqwQ         '),
(64, 'JOINVIL', 'Luc', 'luc.joinvil@lepoles.com', '                   wqWQwqWQwQWqwQ         '),
(65, 'JOINVIL', 'Luc', 'luc.joinvil@lepoles.com', '                   wqWQwqWQwQWqwQ         '),
(66, 'Diallo', 'Alpha', 'alpha.diallo@outlook.fr', '                  DZEADZEADFZEADFEZDZEDZAEDZE          '),
(67, 'Diallo', 'Alpha', 'alpha.diallo@outlook.fr', '                  DZEADZEADFZEADFEZDZEDZAEDZE          ');

-- --------------------------------------------------------

--
-- Structure de la table `hobbies`
--

CREATE TABLE `hobbies` (
  `idhobbie` int(3) NOT NULL,
  `hbhobbie` varchar(200) NOT NULL,
  `hbdescription` varchar(150) NOT NULL,
  `hbicon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `idlanguage` int(3) NOT NULL,
  `lglanguage` varchar(40) NOT NULL,
  `lglevel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`idlanguage`, `lglanguage`, `lglevel`) VALUES
(4, 'Anglais', 3);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `idproject` int(3) NOT NULL,
  `pjtitle` varchar(50) NOT NULL,
  `pjlink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `schooling`
--

CREATE TABLE `schooling` (
  `idschooling` int(3) NOT NULL,
  `sgtitle` varchar(100) NOT NULL,
  `sgsubtitle` varchar(150) NOT NULL,
  `sgdate` year(4) NOT NULL,
  `sgdescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `schooling`
--

INSERT INTO `schooling` (`idschooling`, `sgtitle`, `sgsubtitle`, `sgdate`, `sgdescription`) VALUES
(39, 'Certificat d&#039;études supérieures cinéma et vidéo ', 'dominante image', 2009, 'mise en place et utilisation du matériel de plateau'),
(40, ' Licence Art du Spectacle', 'option Cinéma ', 2005, 'Etude de l&#039;environnement cinématographique');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `iduser` int(3) NOT NULL,
  `ufirstname` varchar(100) NOT NULL,
  `ulastname` varchar(100) NOT NULL,
  `uemail` varchar(150) NOT NULL,
  `upassword` varchar(20) NOT NULL,
  `upseudo` varchar(30) NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `ufirstname`, `ulastname`, `uemail`, `upassword`, `upseudo`, `statut`) VALUES
(1, 'Alpha', 'DIALLO', 'alpha.diallo@outlook.fr', 'Mak_smaLa77_20', 'muadib', 1);

-- --------------------------------------------------------

--
-- Structure de la table `xp`
--

CREATE TABLE `xp` (
  `idxp` int(3) NOT NULL,
  `xpyear1` year(4) NOT NULL,
  `xpyear2` year(4) NOT NULL,
  `xpfunction` varchar(100) NOT NULL,
  `xpemployer` varchar(100) NOT NULL,
  `xpresume` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `xp`
--

INSERT INTO `xp` (`idxp`, `xpyear1`, `xpyear2`, `xpfunction`, `xpemployer`, `xpresume`) VALUES
(4, 2017, 2017, 'Vidéaste', 'LepoleS', 'En charge de la réalisation des projets vidéos '),
(5, 2013, 2015, 'Assistant étalonneur', 'MEDIALAB, BOLLYWOOD POST-PROD, ONEMORE', 'Préparation des projets vidéos avant étalonnage.'),
(6, 2010, 2013, 'Assistant  en post-production', 'ONEMORE SAS', 'Suivit des projets vidéos'),
(7, 2015, 2016, 'Agent de sureté aéroportuaire', 'ICTS France, SAMSIC', 'surveillance des zones de sureté');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`idcompetence`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idcontact`);

--
-- Index pour la table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`idhobbie`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`idlanguage`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`idproject`);

--
-- Index pour la table `schooling`
--
ALTER TABLE `schooling`
  ADD PRIMARY KEY (`idschooling`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Index pour la table `xp`
--
ALTER TABLE `xp`
  ADD PRIMARY KEY (`idxp`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `idcompetence` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idcontact` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `idhobbie` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `idlanguage` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `idproject` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `schooling`
--
ALTER TABLE `schooling`
  MODIFY `idschooling` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `xp`
--
ALTER TABLE `xp`
  MODIFY `idxp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
