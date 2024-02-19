-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 déc. 2022 à 23:00
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
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `annonce` varchar(100) DEFAULT NULL,
  `tontine_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `annonce`, `tontine_id`, `user_id`) VALUES
(1, ' \r\n        Bonjour chers membres                                              ', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `user_id` int(11) NOT NULL,
  `tontine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`user_id`, `tontine_id`) VALUES
(1, 3),
(4, 3),
(6, 4),
(10, 4),
(9, 4),
(8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tontine`
--

CREATE TABLE `tontine` (
  `id_tontine` int(11) NOT NULL,
  `nom_tontine` varchar(50) NOT NULL,
  `nombre_de_participant` int(30) NOT NULL,
  `mise` int(30) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `id_admin` int(11) NOT NULL,
  `id_tresorier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tontine`
--

INSERT INTO `tontine` (`id_tontine`, `nom_tontine`, `nombre_de_participant`, `mise`, `date_creation`, `id_admin`, `id_tresorier`) VALUES
(3, 'Tégué', 10, 5000, '2022-12-14 11:43:27', 1, 4),
(4, 'natteuTabaski', 15, 10000, '2022-12-14 11:46:29', 2, NULL),
(5, 'Epargne', 10, 15000, '2022-12-14 11:51:34', 3, NULL),
(6, 'Achat_voiture', 10, 500000, '2022-12-16 18:35:57', 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tours`
--

CREATE TABLE `tours` (
  `id_tours` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `somme_recolte` int(50) NOT NULL,
  `tontine_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tours`
--

INSERT INTO `tours` (`id_tours`, `date`, `somme_recolte`, `tontine_id`, `user_id`) VALUES
(1, '2022-12-18 15:16:00', 50000, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `CNI` int(30) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `etat` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `nom`, `prenom`, `adresse`, `tel`, `email`, `CNI`, `login`, `pwd`, `etat`) VALUES
(1, 'Sow', 'Fatima', 'castor', 784900443, 'fatimatasow18@gmail.com', 2147483647, 'fatima@', '1234', 1),
(2, 'Sow', 'Binta', 'mamelle', 777227453, 'bintasow@gmail.com', 2147483647, 'binta@', '123', 0),
(3, 'Seynabou', 'Gaye', 'nioro', 776190000, 'zey@gmail.com', 2147483647, 'zeyna@', '12345', 0),
(4, 'Ly', 'Mohamed', 'windé', 776548976, 'mohamedyousouf@gmail.com', 2147483647, 'moha@', '12345', 1),
(5, 'sow', 'aissetou', 'mango', 777334532, 'sokhna.aisse@gmail.com', 2147483647, 'aisse@', '1234', 0),
(6, 'Ba', 'diarra', 'mbacké', 776049980, 'diarra@gmail.com', 2147483647, 'diarra@', '1234', 1),
(8, 'sow', 'houley', 'mango', 786548967, 'houly@gmail.com', 2147483647, 'houly@', '1234', 1),
(9, 'Aidara', 'mohadou', 'darou salam', 771119424, 'thiernomama@gmail.com', 2147483647, 'mama@', '12345', 1),
(10, 'Diallo', 'oumou', 'darou salam', 775347865, 'diallooumou@gmail.com', 2147483647, 'oumou@', '1234', 1),
(11, 'diop', 'moutar', 'mango', 774531890, 'moutar@gmail.com', 2147483647, 'moutar@', '1234', 0),
(12, 'Aidara', 'Aminata', 'darou salam', 777435689, 'aminataaidara@gmail.com', 2147483647, 'amina@', '12345', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `tontine_id` (`tontine_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD UNIQUE KEY `tontine` (`nom_tontine`),
  ADD KEY `users` (`id_admin`),
  ADD KEY `user` (`id_tresorier`);

--
-- Index pour la table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id_tours`),
  ADD KEY `tontine` (`tontine_id`),
  ADD KEY `users` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `AK_Password` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tontine`
--
ALTER TABLE `tontine`
  MODIFY `id_tontine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tours`
--
ALTER TABLE `tours`
  MODIFY `id_tours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`tontine_id`) REFERENCES `tontine` (`id_tontine`),
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`);

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
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`tontine_id`) REFERENCES `tontine` (`id_tontine`),
  ADD CONSTRAINT `tours_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
