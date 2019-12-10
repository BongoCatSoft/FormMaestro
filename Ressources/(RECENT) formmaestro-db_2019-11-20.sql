-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3306
-- Généré le :  Mer 20 Novembre 2019 à 19:30
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formmaestro`
--

-- --------------------------------------------------------

--
-- Structure de la table `civilitees`
--

CREATE TABLE `civilitees` (
  `id` int(11) NOT NULL,
  `civilite` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `civilitees`
--

INSERT INTO `civilitees` (`id`, `civilite`) VALUES
(1, 'Mr'),
(2, 'Mme');

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_number` int(11) NOT NULL,
  `civilite_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `language_id` int(11) NOT NULL,
  `cellphone` int(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `position_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `extra_infos` blob,
  `formation_plan_last_sent` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employees`
--

INSERT INTO `employees` (`id`, `employee_number`, `civilite_id`, `name`, `last_name`, `language_id`, `cellphone`, `user_id`, `email`, `position_id`, `location_id`, `extra_infos`, `formation_plan_last_sent`, `active`, `created`, `modified`) VALUES
(2, 556, 1, 'Test', 'Test', 1, NULL, NULL, 'test@bongocatsoft.ca', 1, 1, NULL, NULL, 0, NULL, '2019-11-13 18:26:26');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `frequence_id` int(11) NOT NULL,
  `reminder_id` int(11) NOT NULL,
  `modality_id` int(11) NOT NULL,
  `duree` int(10) NOT NULL,
  `remarque` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id`, `titre`, `categorie`, `frequence_id`, `reminder_id`, `modality_id`, `duree`, `remarque`) VALUES
(1, 'Initiation à la santé et à la sécurité au travail', 'Santé et sécurité', 1, 1, 1, 2, ''),
(2, 'Formation SIMDUT', 'Santé et sécurité', 3, 1, 1, 2, ''),
(3, 'La sécurité au bureau', 'Santé et sécurité', 3, 3, 1, 3, ''),
(4, 'Glisser, trébucher, tomber', 'Santé et sécurité', 4, 3, 1, 2, ''),
(5, 'Les échelles - en tout sécurité', 'Santé et sécurité', 3, 3, 1, 3, ''),
(6, 'Violence en milieu de travail-Sensibilisation', 'Santé et sécurité', 2, 3, 1, 3, ''),
(7, 'Sensibilisation aux moisissures', 'Environnement', 3, 4, 1, 3, ''),
(8, 'Initiation en ligne – Partie 1', 'Ressources humaines', 1, 2, 1, 5, ''),
(9, 'Initiation en ligne – Partie 2', 'Ressources humaines', 1, 2, 1, 5, ''),
(10, 'Cours santé sécurité générale sur la chantiers de contruction (30h ASP)', 'Santé et sécurité', 1, 4, 2, 2, ''),
(11, 'Secouriste/premiers soins/RCR (2 jours)', 'Santé et sécurité', 4, 4, 2, 3, ''),
(12, 'Halocabures C.S.C', 'Environnement', 5, 5, 2, 2, ''),
(13, 'Transport de matières dangereuses', 'Environnement', 4, 5, 2, 3, ''),
(14, 'Manipulation de l\'amiante', 'Environnement', 4, 5, 2, 5, '');

-- --------------------------------------------------------

--
-- Structure de la table `formations_employee`
--

CREATE TABLE `formations_employee` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `date_executee` date DEFAULT NULL,
  `proof_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formations_position`
--

CREATE TABLE `formations_position` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `proof_id` int(11) DEFAULT NULL,
  `status_formation` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `frequences`
--

CREATE TABLE `frequences` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `frequences`
--

INSERT INTO `frequences` (`id`, `title`) VALUES
(1, 'A l\'embauche\r\n'),
(2, 'Au 1 an\r\n'),
(3, 'Aux 2 ans\r\n'),
(4, 'Aux 3 ans\r\n'),
(5, 'Aux 5 ans\r\n'),
(6, 'A l\'embauche'),
(7, 'Au 1 an'),
(8, 'Aux 2 ans'),
(9, 'Aux 3 ans'),
(10, 'Aux 5 ans');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `langue` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `languages`
--

INSERT INTO `languages` (`id`, `langue`) VALUES
(1, 'Francais');

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(35) NOT NULL,
  `postal_code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `locations`
--

INSERT INTO `locations` (`id`, `address`, `province`, `postal_code`) VALUES
(1, '144 rue du con', 'Icitte Ostique', 'H5W3F4');

-- --------------------------------------------------------

--
-- Structure de la table `modalities`
--

CREATE TABLE `modalities` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `modalities`
--

INSERT INTO `modalities` (`id`, `title`) VALUES
(1, 'En ligne'),
(2, 'Externe');

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Programmeur', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `proofs`
--

CREATE TABLE `proofs` (
  `id` int(11) NOT NULL,
  `original_file_name` varchar(255) NOT NULL,
  `upload_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reminders`
--

INSERT INTO `reminders` (`id`, `title`) VALUES
(1, 'Jour 1'),
(2, 'Semaine 1'),
(3, 'Mois 1'),
(4, 'Mois 3'),
(5, 'Années 1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `last_name`, `employee_id`, `created`, `modified`, `role`) VALUES
(1, 'yanick@yanick.com', '$2y$10$FbDZVJV0392zxVeoYRNGBeuFMbb9ebaSdwWSIkI1ybgB0g8sfjura', 'Yanick', 'Yanick', NULL, '2019-09-25 19:22:21', '2019-09-25 19:22:21', 0),
(3, 'Yanick@bongocatsoft.ca', '$2y$10$sAARY0FMFAuXkt0d5nmzQ.UDM6SdiF0qV.t10LTeP3vY9UP34uYhK', 'Yanick', 'Valiquette', NULL, '2019-09-30 20:08:32', '2019-09-30 20:08:32', 0),
(4, 'David@bongocatsoft.ca', '$2y$10$ILw5ybHw1xe5jynnQFEzAOYtP7wjrcDEySX8KHAw2Iyd8uO7V1oU.', 'David', 'Ringuet', NULL, '2019-09-30 20:09:37', '2019-09-30 20:09:37', 0),
(5, 'Pascal@bongocatsoft.ca', '$2y$10$Di3hH8Is3P0tq1gKaEhu9OuNClhjFWoMPRsGilJJdIspQOs/E/fwe', 'Pascal', 'Raymond', NULL, '2019-09-30 20:13:00', '2019-09-30 20:13:00', 0),
(6, 'admin@bongocatsoft.ca', '$2y$10$7poq5YbcE7MV6GQ616gOPOai/vpi71N.L1btn/DI0FoTPDqlDsJym', 'admin', 'admin', NULL, '2019-10-01 01:44:05', '2019-10-01 01:57:11', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `civilitees`
--
ALTER TABLE `civilitees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `civilite_id` (`civilite_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frequence_id` (`frequence_id`),
  ADD KEY `reminder_id` (`reminder_id`),
  ADD KEY `modality_id` (`modality_id`);

--
-- Index pour la table `formations_employee`
--
ALTER TABLE `formations_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `formation_id` (`formation_id`),
  ADD KEY `proof_id` (`proof_id`);

--
-- Index pour la table `formations_position`
--
ALTER TABLE `formations_position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_id_position` (`formation_id`),
  ADD KEY `proof_id_position` (`position_id`);

--
-- Index pour la table `frequences`
--
ALTER TABLE `frequences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modalities`
--
ALTER TABLE `modalities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `proofs`
--
ALTER TABLE `proofs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id_management` (`employee_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `civilitees`
--
ALTER TABLE `civilitees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `formations_employee`
--
ALTER TABLE `formations_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `formations_position`
--
ALTER TABLE `formations_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `frequences`
--
ALTER TABLE `frequences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `modalities`
--
ALTER TABLE `modalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `proofs`
--
ALTER TABLE `proofs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `civilite_id` FOREIGN KEY (`civilite_id`) REFERENCES `civilitees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `language_id` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_id` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_id` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`frequence_id`) REFERENCES `frequences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_ibfk_2` FOREIGN KEY (`reminder_id`) REFERENCES `reminders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_ibfk_3` FOREIGN KEY (`modality_id`) REFERENCES `modalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formations_employee`
--
ALTER TABLE `formations_employee`
  ADD CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formation_id` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proof_id` FOREIGN KEY (`proof_id`) REFERENCES `proofs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formations_position`
--
ALTER TABLE `formations_position`
  ADD CONSTRAINT `formation_id_position` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_id_position` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proof_id_position` FOREIGN KEY (`position_id`) REFERENCES `proofs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `employee_id_management` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
