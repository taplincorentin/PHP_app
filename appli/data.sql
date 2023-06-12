-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.31 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour laravel
CREATE DATABASE IF NOT EXISTS `gr` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gr`;

-- Listage de la structure de table laravel. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.failed_jobs : ~0 rows (environ)

-- Listage de la structure de table laravel. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.migrations : ~13 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(40, '2014_10_12_000000_create_users_table', 1),
	(41, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(42, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(43, '2019_08_19_000000_create_failed_jobs_table', 1),
	(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(45, '2020_05_21_100000_create_teams_table', 1),
	(46, '2020_05_21_200000_create_team_user_table', 1),
	(47, '2020_05_21_300000_create_team_invitations_table', 1),
	(48, '2023_03_15_175513_create_sessions_table', 1),
	(49, '2023_04_14_190612_project', 1),
	(50, '2023_04_14_190640_project_view', 1),
	(51, '2023_04_14_190650_project_widget', 1),
	(52, '2023_04_14_211148_project_content', 1);

-- Listage de la structure de table laravel. password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.password_reset_tokens : ~0 rows (environ)

-- Listage de la structure de table laravel. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.personal_access_tokens : ~0 rows (environ)

-- Listage de la structure de table laravel. projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `miniature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.projects : ~1 rows (environ)
INSERT INTO `projects` (`id`, `nom`, `description`, `miniature`, `created_at`, `updated_at`) VALUES
	(14, 'projet', 'description', 'miniature.png', '2023-05-06 06:47:08', '2023-05-06 06:47:08');

-- Listage de la structure de table laravel. project_contents
CREATE TABLE IF NOT EXISTS `project_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project` bigint unsigned NOT NULL,
  `view` bigint unsigned NOT NULL,
  `widget` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_contents_project_foreign` (`project`),
  KEY `project_contents_view_foreign` (`view`),
  KEY `project_contents_widget_foreign` (`widget`),
  CONSTRAINT `project_contents_project_foreign` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_contents_view_foreign` FOREIGN KEY (`view`) REFERENCES `project_views` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_contents_widget_foreign` FOREIGN KEY (`widget`) REFERENCES `project_widgets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.project_contents : ~2 rows (environ)
INSERT INTO `project_contents` (`id`, `project`, `view`, `widget`, `created_at`, `updated_at`) VALUES
	(35, 14, 31, 15, '2023-05-06 06:47:08', '2023-05-06 06:47:08'),
	(36, 14, 31, 16, '2023-05-06 06:47:08', '2023-05-06 06:47:08'),
	(37, 14, 32, 17, '2023-05-06 06:47:08', '2023-05-06 06:47:08');

-- Listage de la structure de table laravel. project_views
CREATE TABLE IF NOT EXISTS `project_views` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `haut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hauteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `css_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` bigint unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_views_project_foreign` (`project`),
  CONSTRAINT `project_views_project_foreign` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.project_views : ~2 rows (environ)
INSERT INTO `project_views` (`id`, `titre`, `haut`, `hauteur`, `css_id`, `project`, `created_at`, `updated_at`) VALUES
	(31, 'titre view', '108', '488', 'view_0', 14, '2023-05-06 06:47:08', '2023-05-06 06:47:08'),
	(32, 'titre view', '596', '400', 'view_1', 14, '2023-05-06 06:47:08', '2023-05-06 06:47:08');

-- Listage de la structure de table laravel. project_widgets
CREATE TABLE IF NOT EXISTS `project_widgets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `haut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gauche` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hauteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `largeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `css_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` bigint unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_widgets_project_foreign` (`project`),
  CONSTRAINT `project_widgets_project_foreign` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.project_widgets : ~2 rows (environ)
INSERT INTO `project_widgets` (`id`, `titre`, `haut`, `gauche`, `hauteur`, `largeur`, `css_id`, `project`, `created_at`, `updated_at`) VALUES
	(15, 'titre widget', '0', '0', '486', '832', 'widget_0', 14, '2023-05-06 06:47:08', '2023-05-06 06:47:08'),
	(16, 'titre widget', '0', '833', '488', '1004', 'widget_1', 14, '2023-05-06 06:47:08', '2023-05-06 06:47:08'),
	(17, 'titre widget', '0', '0', '210', '1840', 'widget_3', 14, '2023-05-06 06:47:08', '2023-05-06 06:47:08');

-- Listage de la structure de table laravel. sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.sessions : ~1 rows (environ)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('7XL0Pbk39Cu0oaPEEtlSfifVizp8WQgphUczWBHV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/113.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSm5Yd0xPOTRkNEZVUVdLeTlpT3lyYXNxdzZheHdMbVFLTm55MHU3RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9qZWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRGcUpjd0RkNnQ0L0luUnB5aDZkSy9PVlVrcno0emRFbjV0M1R6NWZSWTBuMDhwM1EycUVFSyI7fQ==', 1684698792);

-- Listage de la structure de table laravel. teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.teams : ~2 rows (environ)
INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Cedric\'s Team', 1, '2023-04-18 18:55:38', '2023-04-18 18:55:38'),
	(2, 1, 'Machin', 0, '2023-04-22 14:38:48', '2023-04-22 14:38:48');

-- Listage de la structure de table laravel. team_invitations
CREATE TABLE IF NOT EXISTS `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.team_invitations : ~0 rows (environ)

-- Listage de la structure de table laravel. team_user
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.team_user : ~0 rows (environ)

-- Listage de la structure de table laravel. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table laravel.users : ~0 rows (environ)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'Cedric', 'ced@mail.fr', NULL, '$2y$10$FqJcwDd6t4/InRpyh6dK/OVUkrz4zdEn5t3Tz5fRY0n08p3Q2qEEK', NULL, NULL, NULL, NULL, 2, NULL, '2023-04-18 18:55:38', '2023-05-17 12:57:41');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
