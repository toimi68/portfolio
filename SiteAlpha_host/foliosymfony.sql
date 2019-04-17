-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 22 jan. 2019 à 10:57
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
(3, 'fab fa-css3-alt', 2),
(4, 'fab fa-js', 1),
(5, 'fab fa-php', 1),
(6, 'fab fa-angular', 2),
(7, 'fab fa-angular', 1),
(10, 'fab fa-angular', 4),
(11, 'espagnol', 1),
(12, 'fab fa-angular', 2),
(13, 'fab fa-angular', 3);

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
(59, 'BAILLET', 'Sylvain', 'sylvain.baillet@lepoles.com', '                                ');

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
(1, 'Anglais', 3),
(4, 'Espagnol', 1);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `idproject` int(3) NOT NULL,
  `pjtitle` varchar(150) NOT NULL,
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
(1, 'Diplôme d\'Etude Supérieure en Cinéma et Vidéo', 'dominante image', 2017, 'Prise de vue, installation de lumière'),
(26, 'jcvghkjvbhk', 'cvgyuibujikol', 2019, 'cfrgyvbhjilk');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `iduser` int(3) NOT NULL,
  `ufirstname` varchar(100) NOT NULL,
  `ulastname` varchar(100) NOT NULL,
  `uemail` varchar(150) NOT NULL,
  `uphone` int(10) NOT NULL,
  `upassword` varchar(20) NOT NULL,
  `upseudo` varchar(30) NOT NULL,
  `uavatar` varchar(20) NOT NULL,
  `ucivil` varchar(2) NOT NULL,
  `uaddress` varchar(50) NOT NULL,
  `uzip` int(5) NOT NULL,
  `utown` varchar(200) NOT NULL,
  `ucountry` varchar(100) NOT NULL,
  `ulink` varchar(150) NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `ufirstname`, `ulastname`, `uemail`, `uphone`, `upassword`, `upseudo`, `uavatar`, `ucivil`, `uaddress`, `uzip`, `utown`, `ucountry`, `ulink`, `statut`) VALUES
(1, 'Alpha', 'DIALLO', 'alpha.diallo@outlook.fr', 601927235, 'Mak_smaLa77_20', 'muadib', '', '', '', 0, '', '', '', 1);

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
(1, 2017, 2017, 'videaste', 'LePoleS', 'prise de vu & montage de vidéos');

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
  MODIFY `idcompetence` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idcontact` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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
  MODIFY `idschooling` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `xp`
--
ALTER TABLE `xp`
  MODIFY `idxp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
