-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 16 oct. 2019 à 14:36
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `spyzie_back`
--

-- --------------------------------------------------------

--
-- Structure de la table `attachement`
--

CREATE TABLE `attachement` (
  `attachement_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `response_id` int(11) NOT NULL,
  `payload_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attachement`
--

INSERT INTO `attachement` (`attachement_id`, `type`, `response_id`, `payload_id`) VALUES
('1', 'image', 1, '1'),
('2', 'text', 2, 'null');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `comment_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `post_id`, `created_time`) VALUES
('118180000901150_133578651360000', '2653333737333083', '116300146423467_118189982901150', '2019-10-08 13:34:49'),
('118189982901150_133578651362283', '2650017744443083', '116300146423467_116461503073998', '2019-10-08 13:34:49');

-- --------------------------------------------------------

--
-- Structure de la table `payload`
--

CREATE TABLE `payload` (
  `payload_id` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_reusable` enum('0','1') NOT NULL,
  `attachment_id` varchar(255) NOT NULL,
  `filedata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `payload`
--

INSERT INTO `payload` (`payload_id`, `url`, `is_reusable`, `attachment_id`, `filedata`) VALUES
('1', 'https://spyzie.club/app/facebook/image/spyzie.jpg', '0', '1', 'null');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `post_id` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`post_id`, `created_time`) VALUES
('116300146423467_116304996422982', '2019-09-17 10:42:48'),
('116300146423467_116461503073998', '2019-09-17 10:42:48'),
('116300146423467_118156959571119', '2019-09-17 10:42:48'),
('116300146423467_118189982901150', '2019-09-17 10:42:48');

-- --------------------------------------------------------

--
-- Structure de la table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `recipient_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `response`
--

INSERT INTO `response` (`id`, `recipient_id`) VALUES
(1, '2650017744443083'),
(2, '2653333737333083');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`) VALUES
('2650017744443083', 'Anas', 'Anas'),
('2653333737333083', 'Adil', 'Ouadid');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attachement`
--
ALTER TABLE `attachement`
  ADD PRIMARY KEY (`attachement_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `payload`
--
ALTER TABLE `payload`
  ADD PRIMARY KEY (`payload_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
