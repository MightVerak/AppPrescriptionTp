-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3306
-- Généré le :  Mer 25 Novembre 2020 à 04:49
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
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(2, 'Analgésiques'),
(3, 'Antibiotiques'),
(4, 'Diurétiques'),
(5, 'Antidépresseurs'),
(6, 'Anovulants'),
(7, 'Bronchodilatateurs'),
(8, 'Anti-Inflammatoires'),
(10, 'test'),
(12, 'monoTestAdd');

-- --------------------------------------------------------

--
-- Structure de la table `concentrations`
--

CREATE TABLE `concentrations` (
  `id` int(11) NOT NULL,
  `medication_id` int(11) DEFAULT NULL,
  `concentration` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `concentrations`
--

INSERT INTO `concentrations` (`id`, `medication_id`, `concentration`) VALUES
(1, NULL, '2,5 mg'),
(2, NULL, '5 mg'),
(3, NULL, '10 mg'),
(5, NULL, '15 mg'),
(6, NULL, '20 mg'),
(7, 4, '37,5 mg'),
(8, NULL, '40 mg'),
(9, 5, '50 mg'),
(10, NULL, '60 mg'),
(11, 11, '75 mg'),
(12, NULL, '80 mg'),
(13, 5, '100 mg'),
(14, NULL, '125 mg'),
(15, 11, '150 mg'),
(16, NULL, '175 mg'),
(17, 6, '200 mg'),
(18, 6, '400 mg'),
(19, NULL, '1000'),
(20, NULL, '1200 mg'),
(21, 4, '70 mg'),
(22, 7, '650 mg'),
(23, 8, '50 mg'),
(24, 8, '100 mg'),
(25, 9, '300 mg'),
(26, 9, '600 mg'),
(27, 10, '50 mg'),
(28, 10, '100 mg');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `address_id`, `customer_name`, `slug`, `created`, `modified`) VALUES
(1, 13, 3, 'Samuel', 'sam', '0000-00-00 00:00:00', '2020-11-18 04:27:11'),
(2, 3, 2, 'David', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 4, 3, 'Alexandre', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 4, 4, 'test', '', '2020-11-18 04:35:53', '2020-11-18 04:49:53'),
(9, NULL, 1, 'tt', '', '2020-11-18 04:37:02', '2020-11-18 04:37:02');

-- --------------------------------------------------------

--
-- Structure de la table `customers_addresses`
--

CREATE TABLE `customers_addresses` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customers_files`
--

CREATE TABLE `customers_files` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `customers_files`
--

INSERT INTO `customers_files` (`id`, `customer_id`, `file_id`) VALUES
(0, 9, 2);

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
  `prescription_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `medication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `medications`
--

INSERT INTO `medications` (`id`, `prescription_id`, `category_id`, `medication`, `description`) VALUES
(4, 0, 2, 'Acet-Tramadol ', ''),
(5, 0, 2, 'Nucynta', ''),
(6, 0, 2, 'Ralivia', ''),
(7, 0, 2, 'Acétaminophène', ''),
(8, 0, 2, 'Tramadol', ''),
(9, 0, 2, 'Durela', ''),
(10, 0, 2, 'Ultram', ''),
(11, 0, 2, 'Zytram', ''),
(12, 0, 2, 'Tridural', ''),
(13, 0, 2, 'M-Ediat ', ''),
(14, 0, 2, 'Meperidine', ''),
(15, 0, 2, 'Metadol', ''),
(16, 0, 2, 'Morphine', ''),
(17, 0, 2, 'Oxycodone', ''),
(18, 0, 2, 'Percocet', ''),
(19, 0, 3, 'Azithrocyn', ''),
(20, 0, 3, 'Clindamycin', '');

-- --------------------------------------------------------

--
-- Structure de la table `physicians`
--

CREATE TABLE `physicians` (
  `id` int(11) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
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
-- Structure de la table `physicians_addresses`
--

CREATE TABLE `physicians_addresses` (
  `id` int(11) NOT NULL,
  `physician_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `physician_id` int(11) NOT NULL,
  `medication_id` int(11) NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `customer_id`, `physician_id`, `medication_id`, `details`, `created`, `modified`) VALUES
(0, 9, 3, 0, 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 1, 4, 'Anxiété', '0000-00-00 00:00:00', '2020-11-21 23:49:27'),
(3, 2, 3, 0, 'Migraine', '0000-00-00 00:00:00', '2020-11-18 04:20:03'),
(6, 3, 2, 11, '30 capsules // Haute Pression // Prendre 2 fois par jours.', '2020-11-21 23:50:28', '2020-11-21 23:50:28');

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
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `concentrations`
--
ALTER TABLE `concentrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medication_id` (`medication_id`);

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
-- Index pour la table `customers_addresses`
--
ALTER TABLE `customers_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fkA` (`customer_id`),
  ADD KEY `address_fkA` (`address_id`);

--
-- Index pour la table `customers_files`
--
ALTER TABLE `customers_files`
  ADD PRIMARY KEY (`id`),
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
  ADD KEY `prescription_id` (`prescription_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `physicians`
--
ALTER TABLE `physicians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address_id_2` (`address_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Index pour la table `physicians_addresses`
--
ALTER TABLE `physicians_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `physician_fkA` (`physician_id`),
  ADD KEY `address_fkA2` (`address_id`);

--
-- Index pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `physician_id` (`physician_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `concentrations`
--
ALTER TABLE `concentrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `customers_addresses`
--
ALTER TABLE `customers_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT pour la table `physicians`
--
ALTER TABLE `physicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `physicians_addresses`
--
ALTER TABLE `physicians_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `concentrations`
--
ALTER TABLE `concentrations`
  ADD CONSTRAINT `concentrations_ibfk_1` FOREIGN KEY (`medication_id`) REFERENCES `medications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customers_addresses`
--
ALTER TABLE `customers_addresses`
  ADD CONSTRAINT `address_fkA` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_fkA` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `medications_ibfk_1` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medications_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `physicians_addresses`
--
ALTER TABLE `physicians_addresses`
  ADD CONSTRAINT `address_fkA2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `physician_fkA` FOREIGN KEY (`physician_id`) REFERENCES `physicians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`physician_id`) REFERENCES `physicians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
