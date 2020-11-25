-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3306
-- Généré le :  Mer 21 Octobre 2020 à 04:38
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `prescription`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `number_building` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_locality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `addresses`
--

INSERT INTO `addresses` (`id`, `customer_id`, `number_building`, `number_street`, `area_locality`, `city`, `zip_code`, `state_province`, `country`, `other_details`, `created`, `modified`) VALUES
(1, 1, 'Apt 4', '25 rue de la Pocatiere', NULL, 'Laval', '111111', 'Quebec', 'Canada', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, NULL, '1649 rue de la Forêt', NULL, 'Terrebonne', 'J6X4N4', 'Quebec', 'Canada', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, NULL, '1400 boul. Moody', NULL, 'Terrebonne', 'J6X1P2', 'Quebec', 'Canada', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `address_id`, `customer_name`, `slug`, `created`, `modified`) VALUES
(1, 3, 1, 'Samuel', 'sam', '0000-00-00 00:00:00', '2020-10-21 01:12:11'),
(2, 3, 2, 'David', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 4, 3, 'Alexandre', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `customers_files`
--

CREATE TABLE `customers_files` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customers_physicians`
--

CREATE TABLE `customers_physicians` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `physician_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `customers_physicians`
--

INSERT INTO `customers_physicians` (`id`, `customer_id`, `physician_id`) VALUES
(0, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'beelee.png', 'uploads/files/', '2020-10-21 02:09:52', '2020-10-21 02:09:52', 1),
(2, 'beelee.png', 'uploads/files/', '2020-10-21 02:09:59', '2020-10-21 02:09:59', 1),
(3, 'huskar.jpg', 'img/Home/index/', '2020-10-21 02:37:11', '2020-10-21 02:37:11', 1),
(4, 'gino-chouinard.png', 'img/Home/index/', '2020-10-21 02:37:31', '2020-10-21 02:37:31', 1);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medications`
--

CREATE TABLE `medications` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `medication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `medications`
--

INSERT INTO `medications` (`id`, `company_id`, `medication`, `cost`, `description`, `created`, `modified`) VALUES
(1, 1, 'Tylennol', '20,00$', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Ritalin', '15,00$', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Ibuprofene', '10,00$', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `medication_companies`
--

CREATE TABLE `medication_companies` (
  `id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `medication_companies`
--

INSERT INTO `medication_companies` (`id`, `company`, `details`, `created`, `modified`) VALUES
(1, 'Actavis', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Jean Coutu', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `physicians`
--

CREATE TABLE `physicians` (
  `id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `physician_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `physicians`
--

INSERT INTO `physicians` (`id`, `address_id`, `physician_name`, `details`, `created`, `modified`) VALUES
(1, 1, 'Dr Archambeault', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Dr. Tremblay', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 'Dr Dufresne', 'Chiropraticien', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `physician_id` int(11) NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `customer_id`, `physician_id`, `details`, `created`, `modified`) VALUES
(2, 3, 1, 'Anxiété', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 2, 'Migraine', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `prescription_items`
--

CREATE TABLE `prescription_items` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medication_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `prescription_items`
--

INSERT INTO `prescription_items` (`id`, `prescription_id`, `medication_id`, `quantity`, `created`, `modified`) VALUES
(1, 3, 1, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Physician'),
(2, 'Supervisor'),
(3, 'Technicien');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `created`, `modified`) VALUES
(2, 3, '', 'test@test.com', '$2y$10$pozp85jJGXTvV.j9O2iZ1uMbpTL.6c9rNXJZj8sTLNRe6BrGes6m2', NULL, '2020-10-14 07:58:01'),
(3, 2, '', 'samuel@sylvaintremblay.com', '$2y$10$J1DmnXA7uhVkuW/hBn2iXOY30YJWV0eu.pgxtq9tqwAysg8Aag27S', '2020-10-14 08:38:46', '2020-10-14 08:38:46'),
(4, 1, 'admin', 'admin@admin.com', '$2y$10$CKB2qrVEiBURTH2epSyDE.lYNF4ZD9J7qDGTbTviAr7PluIRQ7g6q', '2020-10-14 14:24:26', '2020-10-20 05:34:04'),
(13, 3, 'test2', 'test2@test2.com', 'test2', '2020-10-20 04:35:21', '2020-10-20 04:35:21'),
(14, 3, 'test3', 'test3@test3.com', 'test3', '2020-10-20 04:36:09', '2020-10-20 04:36:09');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `address_id_2` (`address_id`);

--
-- Index pour la table `customers_files`
--
ALTER TABLE `customers_files`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `customers_physicians`
--
ALTER TABLE `customers_physicians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `physician_id` (`physician_id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Index pour la table `medication_companies`
--
ALTER TABLE `medication_companies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `physicians`
--
ALTER TABLE `physicians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address_id_2` (`address_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Index pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `physician_id` (`physician_id`);

--
-- Index pour la table `prescription_items`
--
ALTER TABLE `prescription_items`
  ADD PRIMARY KEY (`id`,`prescription_id`,`medication_id`),
  ADD KEY `medication_id` (`medication_id`),
  ADD KEY `prescription_id` (`prescription_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `medications`
--
ALTER TABLE `medications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `medication_companies`
--
ALTER TABLE `medication_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `physicians`
--
ALTER TABLE `physicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `prescription_items`
--
ALTER TABLE `prescription_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customers_files`
--
ALTER TABLE `customers_files`
  ADD CONSTRAINT `customers_files_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_files_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customers_physicians`
--
ALTER TABLE `customers_physicians`
  ADD CONSTRAINT `customers_physicians_ibfk_2` FOREIGN KEY (`physician_id`) REFERENCES `physicians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_physicians_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `company_fk` FOREIGN KEY (`company_id`) REFERENCES `medication_companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `physicians`
--
ALTER TABLE `physicians`
  ADD CONSTRAINT `physicians_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `physician_fk` FOREIGN KEY (`physician_id`) REFERENCES `physicians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prescription_items`
--
ALTER TABLE `prescription_items`
  ADD CONSTRAINT `medication_fk` FOREIGN KEY (`medication_id`) REFERENCES `medications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_fk` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
