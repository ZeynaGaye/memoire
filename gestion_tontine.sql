-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 déc. 2022 à 00:13
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_tontine`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `user_id` int(11) NOT NULL,
  `tontine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tontine`
--

CREATE TABLE `tontine` (
  `id_tontine` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `nombre_de_participant` int(30) NOT NULL,
  `mise` int(30) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `id_admin` int(11) NOT NULL,
  `id_tresorier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tours`
--

CREATE TABLE `tours` (
  `id_tours` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `somme_recolte` int(50) NOT NULL,
  `tontine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `CNI` int(30) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `etat` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `nom`, `prenom`, `adresse`, `tel`, `email`, `CNI`, `login`, `password`, `etat`) VALUES
(1, 'Sow', 'Fatima', 'castor', 784900443, 'fatimatasow18@gmail.com', 2147483647, 'fatima@', '1234', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tontine_id` (`tontine_id`);

--
-- Index pour la table `tontine`
--
ALTER TABLE `tontine`
  ADD PRIMARY KEY (`id_tontine`),
  ADD KEY `users` (`id_admin`),
  ADD KEY `user` (`id_tresorier`);

--
-- Index pour la table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id_tours`),
  ADD KEY `tontine` (`tontine_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tontine`
--
ALTER TABLE `tontine`
  MODIFY `id_tontine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tours`
--
ALTER TABLE `tours`
  MODIFY `id_tours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`tontine_id`) REFERENCES `tontine` (`id_tontine`);

--
-- Contraintes pour la table `tontine`
--
ALTER TABLE `tontine`
  ADD CONSTRAINT `tontine_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `tontine_ibfk_2` FOREIGN KEY (`id_tresorier`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`tontine_id`) REFERENCES `tontine` (`id_tontine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
