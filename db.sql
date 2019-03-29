-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Ven 29 Mars 2019 à 09:19
-- Version du serveur :  5.7.17
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sr03`
--

-- --------------------------------------------------------

--
-- Structure de la table `MESSAGES`
--

CREATE TABLE `MESSAGES` (
  `id_msg` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `sujet_msg` varchar(255) NOT NULL,
  `corps_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE `USERS` (
  `id_user` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `profil_user` enum('CLIENT','CONSEILLER') NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `numero_compte` int(11) NOT NULL,
  `solde_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `MESSAGES`
--
ALTER TABLE `MESSAGES`
  ADD PRIMARY KEY (`id_msg`),
  ADD KEY `fk_user_to` (`id_user_to`),
  ADD KEY `fk_user_from` (`id_user_from`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `MESSAGES`
--
ALTER TABLE `MESSAGES`
  ADD CONSTRAINT `fk_user_from` FOREIGN KEY (`id_user_from`) REFERENCES `USERS` (`id_user`),
  ADD CONSTRAINT `fk_user_to` FOREIGN KEY (`id_user_to`) REFERENCES `USERS` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
