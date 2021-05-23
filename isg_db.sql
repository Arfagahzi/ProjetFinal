-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 23 mai 2021 à 22:25
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `isg_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `annescolaires`
--

CREATE TABLE `annescolaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moyenne` double(8,2) DEFAULT NULL,
  `mention` enum('Pas de mention','Assez bien','Bien','très bien') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` enum('controle','principale') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etablissement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `universite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filiere_id` bigint(20) UNSIGNED DEFAULT NULL,
  `inscrit_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `criteres_score`
--

CREATE TABLE `criteres_score` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `critere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coeficient` double DEFAULT NULL,
  `plus` int(11) DEFAULT NULL,
  `moins` int(11) DEFAULT NULL,
  `master_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE `dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nbr_redoublement` int(11) DEFAULT NULL,
  `Annee_bac` int(11) DEFAULT NULL,
  `bac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reo` tinyint(1) DEFAULT NULL,
  `moyenne_bac` double(8,2) DEFAULT NULL,
  `nom_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_diplome` date DEFAULT NULL,
  `img_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inscrit_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dossiers`
--

INSERT INTO `dossiers` (`id`, `nbr_redoublement`, `Annee_bac`, `bac`, `reo`, `moyenne_bac`, `nom_diplome`, `date_diplome`, `img_diplome`, `pays`, `img_cin`, `inscrit_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

CREATE TABLE `etablissements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etablissement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etablissements`
--

INSERT INTO `etablissements` (`id`, `etablissement`, `univ_id`) VALUES
(2, 'institut suprieur de ghazi', 1),
(3, 'ghaziarfa', 6),
(4, 'institut suprieur de gestion', 7),
(5, 'institut suprieur de ss', 7),
(6, 'institut suprieur de khawla', 5),
(7, 'institut suprieur de finance', 8),
(8, 'institut suprieur de aze', 15),
(9, 'sdsd', 1),
(10, 'institut suprieur de mariem', 1);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etablissement_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `master_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `user_id`, `master_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2021-05-13 01:13:24', '2021-05-13 01:13:24'),
(2, 1, 2, '2021-05-13 01:37:04', '2021-05-13 01:37:04');

-- --------------------------------------------------------

--
-- Structure de la table `masters`
--

CREATE TABLE `masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('recherche','professionnel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `masters`
--

INSERT INTO `masters` (`id`, `title`, `type`, `detail`) VALUES
(1, 'Siad', 'professionnel', 'siad'),
(2, 'Comptabilité', 'recherche', 'aazet'),
(3, 'Finance', 'recherche', 'aze'),
(4, 'Manangement', 'recherche', 'aze'),
(5, 'AZERTY', 'recherche', 'azet'),
(6, 'Groupe 1', 'professionnel', 'aze');

-- --------------------------------------------------------

--
-- Structure de la table `masters_users`
--

CREATE TABLE `masters_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `master_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2021_04_26_231821_add_fields_to_users_table', 1),
(18, '2021_04_27_002118_add_profile_to_users_table', 1),
(19, '2021_04_27_011441_create_master_table', 1),
(20, '2021_04_27_012155_create_table_masters_users', 1),
(21, '2021_04_28_022036_create_universites', 1),
(22, '2021_04_28_022431_create_etablissements', 1),
(23, '2021_04_28_030048_create_filieres', 1),
(24, '2021_05_01_214115_create_teachers_table', 1),
(29, '2021_05_13_014414_create_inscriptions_table', 2),
(34, '2021_05_11_002126_create_students_table', 3),
(35, '2021_05_11_002226_create_dossiers_table', 3),
(37, '2021_05_11_002358_create_anneescolaires_table', 3),
(38, '2021_05_11_002317_create_critéres_score_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `score` double DEFAULT NULL,
  `inscrit_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `score`, `inscrit_id`) VALUES
(1, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `master_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `master_id`) VALUES
(1, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `universites`
--

CREATE TABLE `universites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `universite` enum('Universite de tunis','Universite de manouba','Universite de tunis el manar','Université de carthage','Universite ez-zitouna','Universite de sousse','Université de sfax','Universite de jendouba','Universite de gabes','Direction générale des études technologiques','Université de monastir','Université de kairouan','Université de gafsa') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `universites`
--

INSERT INTO `universites` (`id`, `universite`) VALUES
(1, 'Universite de tunis'),
(2, 'Universite de manouba'),
(3, 'Universite de tunis el manar'),
(4, 'Universite de manouba'),
(5, 'Université de carthage'),
(6, 'Universite de sousse'),
(7, 'Universite ez-zitouna'),
(8, 'Université de sfax'),
(9, 'Universite de jendouba'),
(10, 'Universite de gabes'),
(11, 'Direction générale des études technologiques'),
(12, 'Direction générale des études technologiques'),
(13, 'Université de monastir'),
(14, 'Université de kairouan'),
(15, 'Université de gafsa');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','student','teacher') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `cin` int(10) UNSIGNED DEFAULT NULL,
  `sexe` enum('h','f') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `birth_adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `profile` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `role`, `cin`, `sexe`, `birthday`, `birth_adresse`, `adresse`, `city`, `postal_code`, `phone`, `profession`, `company`, `avatar`, `status`, `profile`) VALUES
(1, 'arfa', 'ghaziarfaa@gmail.com', NULL, '$2y$10$kAbI2uJIRiC2iKP4JAumSun83IYd4Y7YKPUpu64Eqg65koOpw6vGa', NULL, '2021-05-10 23:27:18', '2021-05-10 23:27:18', 'ghazi', 'student', 6965552, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(2, 'Arfa', 'ghazi@gmail.com', NULL, '$2y$10$/psY3QB5yBtz06YNnoxAJucsnPOVdoJPSe73Kc6AUxZoIBrJ0BI8W', NULL, '2021-05-11 00:26:00', '2021-05-11 00:26:00', 'Ghazi', 'admin', 6965553, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(3, 'Arfa', 'ghaziarfa@gmail.com', NULL, '$2y$10$z0/Tmeoz9Y/AbN592sxKXuJj4wKNv.ByCYHjUpCCnNVfYiOJ0yyxG', NULL, '2021-05-12 09:02:07', '2021-05-12 09:02:07', 'Ghazi', 'teacher', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+21623816784', NULL, NULL, NULL, 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annescolaires`
--
ALTER TABLE `annescolaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annescolaires_etablissement_id_foreign` (`etablissement_id`),
  ADD KEY `annescolaires_universite_id_foreign` (`universite_id`),
  ADD KEY `annescolaires_filiere_id_foreign` (`filiere_id`),
  ADD KEY `annescolaires_inscrit_id_foreign` (`inscrit_id`);

--
-- Index pour la table `criteres_score`
--
ALTER TABLE `criteres_score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteres_score_master_id_foreign` (`master_id`);

--
-- Index pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dossiers_inscrit_id_foreign` (`inscrit_id`);

--
-- Index pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etablissements_univ_id_foreign` (`univ_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filieres_etablissement_id_foreign` (`etablissement_id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscriptions_user_id_foreign` (`user_id`),
  ADD KEY `inscriptions_master_id_foreign` (`master_id`);

--
-- Index pour la table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `masters_users`
--
ALTER TABLE `masters_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masters_users_user_id_foreign` (`user_id`),
  ADD KEY `masters_users_master_id_foreign` (`master_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_inscrit_id_foreign` (`inscrit_id`);

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`),
  ADD KEY `teachers_master_id_foreign` (`master_id`);

--
-- Index pour la table `universites`
--
ALTER TABLE `universites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annescolaires`
--
ALTER TABLE `annescolaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `criteres_score`
--
ALTER TABLE `criteres_score`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `masters_users`
--
ALTER TABLE `masters_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `universites`
--
ALTER TABLE `universites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annescolaires`
--
ALTER TABLE `annescolaires`
  ADD CONSTRAINT `annescolaires_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `annescolaires_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `annescolaires_inscrit_id_foreign` FOREIGN KEY (`inscrit_id`) REFERENCES `inscriptions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `annescolaires_universite_id_foreign` FOREIGN KEY (`universite_id`) REFERENCES `universites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `criteres_score`
--
ALTER TABLE `criteres_score`
  ADD CONSTRAINT `criteres_score_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `masters` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD CONSTRAINT `dossiers_inscrit_id_foreign` FOREIGN KEY (`inscrit_id`) REFERENCES `inscriptions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD CONSTRAINT `etablissements_univ_id_foreign` FOREIGN KEY (`univ_id`) REFERENCES `universites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD CONSTRAINT `filieres_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `masters_users`
--
ALTER TABLE `masters_users`
  ADD CONSTRAINT `masters_users_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `masters_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_inscrit_id_foreign` FOREIGN KEY (`inscrit_id`) REFERENCES `inscriptions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
