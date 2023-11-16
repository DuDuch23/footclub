-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 nov. 2023 à 04:30
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `footclub`
--

-- --------------------------------------------------------

--
-- Structure de la table `match_foot`
--

CREATE TABLE `match_foot` (
  `id_match` int(11) NOT NULL,
  `score_team` int(11) NOT NULL,
  `score_team_opponent` int(11) NOT NULL,
  `date_match` datetime NOT NULL,
  `team_id` int(11) NOT NULL,
  `city_match` varchar(255) NOT NULL,
  `team_opponent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `member_staff`
--

CREATE TABLE `member_staff` (
  `id_member_staff` int(11) NOT NULL,
  `firstname_member_staff` varchar(255) NOT NULL,
  `lastname_member_staff` varchar(255) NOT NULL,
  `picture_member_staff` varchar(255) NOT NULL,
  `role_member_staff_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `id_player` int(11) NOT NULL,
  `firstname_player` varchar(255) NOT NULL,
  `lastname_player` varchar(255) NOT NULL,
  `birthday_player` date NOT NULL,
  `picture_player` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id_player`, `firstname_player`, `lastname_player`, `birthday_player`, `picture_player`) VALUES
(1, 'oui', 'ouoi', '4555-05-25', '375005-sepik_1920x1080.jpg'),
(2, 'test', 'test', '1999-09-10', 'bateau.PNG'),
(4, 'Mathieu', 'Dos Santos', '2003-02-01', 'bateau.PNG'),
(5, 'Théo', 'Delafontaine', '2003-08-26', 'cover2.png'),
(6, 'Bryan (avec un y)', 'Jesaisplus', '2000-04-12', 'cover2.png'),
(38, 'duduch', 'duduch', '2003-06-23', 'images.jpg'),
(50, 'Evan', 'Jerequiel', '2003-04-05', 'c81.jpg'),
(51, 'oui', 'ouoi', '1555-12-15', 'c81.jpg'),
(52, 'oui', 'ouoi', '1555-12-15', 'c81.jpg'),
(53, 'testModif', 'testModif', '8888-08-08', '619f9a490f6ba_Mematic_20211125_151323.jpg.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `player_has_team`
--

CREATE TABLE `player_has_team` (
  `player_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role_joueur`
--

CREATE TABLE `role_joueur` (
  `name_role_player` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role_joueur`
--

INSERT INTO `role_joueur` (`name_role_player`) VALUES
('Attaquant'),
('Défenseur'),
('Gardien'),
('Milieu');

-- --------------------------------------------------------

--
-- Structure de la table `role_membre_staff`
--

CREATE TABLE `role_membre_staff` (
  `name_role_member_staff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role_membre_staff`
--

INSERT INTO `role_membre_staff` (`name_role_member_staff`) VALUES
('Analyste'),
('Entraineur'),
('Préparateur');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `name_team` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id_team`, `name_team`) VALUES
(1, 'Crépy team'),
(2, 'Club Amiens'),
(3, 'Cluc Pont Saint Maxence'),
(5, 'Senlis Club');

-- --------------------------------------------------------

--
-- Structure de la table `team_opponent`
--

CREATE TABLE `team_opponent` (
  `id_team_opponent` int(11) NOT NULL,
  `adress_team_opponent` varchar(255) NOT NULL,
  `city_team_opponent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `team_opponent`
--

INSERT INTO `team_opponent` (`id_team_opponent`, `adress_team_opponent`, `city_team_opponent`) VALUES
(1, '7 Rue Jules Ferry, 93290 ', 'Tremblay-en-France'),
(2, 'test', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `match_foot`
--
ALTER TABLE `match_foot`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `team_opponent_id` (`team_opponent_id`);

--
-- Index pour la table `member_staff`
--
ALTER TABLE `member_staff`
  ADD PRIMARY KEY (`id_member_staff`),
  ADD KEY `role_member_staff_name` (`role_member_staff_name`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id_player`);

--
-- Index pour la table `player_has_team`
--
ALTER TABLE `player_has_team`
  ADD KEY `id_player` (`player_id`),
  ADD KEY `id_team` (`team_id`),
  ADD KEY `role` (`role`);

--
-- Index pour la table `role_joueur`
--
ALTER TABLE `role_joueur`
  ADD PRIMARY KEY (`name_role_player`);

--
-- Index pour la table `role_membre_staff`
--
ALTER TABLE `role_membre_staff`
  ADD PRIMARY KEY (`name_role_member_staff`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Index pour la table `team_opponent`
--
ALTER TABLE `team_opponent`
  ADD PRIMARY KEY (`id_team_opponent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `match_foot`
--
ALTER TABLE `match_foot`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `member_staff`
--
ALTER TABLE `member_staff`
  MODIFY `id_member_staff` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `team_opponent`
--
ALTER TABLE `team_opponent`
  MODIFY `id_team_opponent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `match_foot`
--
ALTER TABLE `match_foot`
  ADD CONSTRAINT `match_foot_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id_team`),
  ADD CONSTRAINT `match_foot_ibfk_2` FOREIGN KEY (`team_opponent_id`) REFERENCES `team_opponent` (`id_team_opponent`);

--
-- Contraintes pour la table `member_staff`
--
ALTER TABLE `member_staff`
  ADD CONSTRAINT `member_staff_ibfk_1` FOREIGN KEY (`role_member_staff_name`) REFERENCES `role_membre_staff` (`name_role_member_staff`);

--
-- Contraintes pour la table `player_has_team`
--
ALTER TABLE `player_has_team`
  ADD CONSTRAINT `player_has_team_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id_player`),
  ADD CONSTRAINT `player_has_team_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id_team`),
  ADD CONSTRAINT `player_has_team_ibfk_3` FOREIGN KEY (`role`) REFERENCES `role_joueur` (`name_role_player`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
