-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for db_sis_help
CREATE DATABASE IF NOT EXISTS `db_sis_help` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_sis_help`;

-- Dumping structure for table db_sis_help.failed_jobs
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

-- Dumping data for table db_sis_help.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_sis_help.lote
CREATE TABLE IF NOT EXISTS `lote` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `processo_id` bigint unsigned NOT NULL,
  `numero` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_lance` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `margem_lance` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_referencia` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lote_processo_id_foreign` (`processo_id`),
  CONSTRAINT `lote_processo_id_foreign` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.lote: ~11 rows (approximately)
INSERT INTO `lote` (`id`, `processo_id`, `numero`, `tipo_lance`, `margem_lance`, `valor_referencia`, `created_at`, `updated_at`) VALUES
	(1, 6, '42015780851516000329', 'R40XF1Ag4SgNpw2ve0NhlyNnGQ024VGDkQt9dgHAN6Llc92gZ36qGlpRwt4OxRPTyuE0aWZr2AZB8Y35MBEypnMPqiyJnnFvpnh1kyY8mTCmzU6Tk0o3A9ljSMOWFWVXddr9yIklWYgnu19ffWwhl6', 'AzLOp1NBUQaI3gWZhoqG3lKniAjh2PQMOkp8iu0l', 2641639165.88, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(2, 7, '54525050632042030831', 'jVKAOHBHFOmpZ7Hkzp7XXwgQOHBpyKXhOegRZ02GMMPrAokSjIOvbP1Pu3heOqBUmROiJ8u68oJBrjxCRm7ggd0fCceVYjzAGc516ruClLPYHzFPqP6q2wn9JeuG8kf3H8S3QRz3vrmktNuFJc75zd', 'AYa7Q859s04eOwJfOk42TUvUAVdCM4STVMogr1xd', 3752667528.46, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(3, 8, '03564072728712208583', '1FPHrxLCq4OgSkjhnkI1kI5vrC1VXFaPtZzGF46QgN6itdVvlYqNVvOIJOnwWsMkHAwm3qKfJc5br4LHS3LqWNtKvqJfkqbjf1fot4nskyVG4yWtxHbTg4bzsqoTSDOTthkdAPJHzmNNXAcaLo0wfG', 'NurdxpxCNx7IqQdGIB0jcvDQs7ytyJ8NJrSBgYBo', 4269241506.35, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(4, 9, '42183524624059472191', 'J1QXhz6afWrDqIymaA3z8mAwgS2UdjrU6iYo8F1osHamwTElDCe0BgIhKiV2iDnvaO6aiFkFjZQSPtsCYt51pKN9fMuWjgFpyFGr1EIbmddKerip9i54DBTrntnoc1uBai7AKhlp8VfLoBd0k8FPX3', 'O3BBHIgvOB0TbIHtZugYkHzzCjJmBTBgdjflUlPr', 9101230976.68, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(5, 10, '14937133424932989175', 'dV5ZGwKkNli1JUH98ydOZIuQFCyGDTI0CAbdS5GyRozgExFSpkznXzCpkAyatfYBJp0ACMQLpqfp3VX3AFVWf6k6n9ts7KxlSFajS5dAj51tnOdICPUDRFtNOqXpZXnP4J7ahxD3Oh2H36Kx1kaepl', 'AeWz0g46YhIN3yZ2ezs64hPIy7pyfDUWsf8lNN37', 4359892091.88, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(6, 11, '85292053030088625972', 'FUNrhtTtXgzIs2Fu5vGOd7IoMYeJMQtMFMbKkA2uIXXUlxlC2ZWj3JKIDieoIMmn3pEj1Rf3eTAQhizC5c6saHkI8rxBvqn5eYvqBKO6csqPkgGjwmJlPIzmrge2alJzRdSnwfEiSBqflTlkN3rDkY', 'qd9CkeK5nGgpZ6l7s4BOwpdERXYVaTqojHU3nA2z', 8090033907.48, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(7, 12, '31556658933804850536', 'p90sxdZ8IBrKAQtcPLnQk3WXeFGbOqF03pbMImB5k8ecrghTBythzWaFYaVWfxLP3g9KY0oaBT7qndCxtrFshICda1hVA4BcL3IKfHSAEoTceTkPbs1smEvkMXHakfUs2YXd2DI3IMYCKVvNH86uKv', 'idvSnGxwHEQAEnnnWryaw6z2ks5M14xCqXRvHGkO', 661838571.85, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(8, 13, '58756196849462319784', 'mFeHnZt3Rc5T8416g5LthdU5ZftUB8BWk94GyXqqNXfuNz7TJkDhT750vOLg8KhUnmUPDAdYgcPJnE6oiy7eMEbLZzzUlqFr4LijpPHJoKHSbkYxNbJtQYuWtEQQkSz9qsfvr1H6mTBElbzteW6Xr3', '8JwpgqEZ3sO5AYqJhaunSRPcFrJVZnm5BsFULax5', 5267691968.59, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(9, 14, '84400405224874158820', 'e1pgkbVzCB82DTXlfyFzuhV8j9S95Y2sgoHq3kDZenBRC4zAzOapc7UUtrhyajb8PF8gyn7pqM4kRMx7dHofhWCb0NDVCGhiaoHxfHxUWq9hWDpxD3vLhphhNh9yqiALeTHVLlhOaleHYbXbiJVoC6', '9agBHxCzfvBIlUqpkmlItIwvXBXlAWZXy2aIFKLC', 1187204090.50, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(10, 15, '12554073475850952293', 'DDfbqfEAhoyL1M8TV4hBJgT48ZhYGbgTOthaQ85TFhEgULCzoVqe0ote2E6UlqjZiJEGHbQfRutzt7iY8A362azvrqa2XDD6VZDDDF6e6K9wF4QuNNmrp1LbhxihLuEmUKFJdGUvrr2ul5ivPx92wO', 'boyTq0aXigUglW5pzqF3O1vgToXNJU2sUM09uayC', 9904099549.11, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(11, 1, '1', '1', '1', 1.00, '2024-01-26 17:56:51', '2024-01-26 17:56:51');

-- Dumping structure for table db_sis_help.lote_itens
CREATE TABLE IF NOT EXISTS `lote_itens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lote_id` bigint unsigned NOT NULL,
  `numero` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especificacao` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantidade` int NOT NULL,
  `valor_referencia` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lote_itens_lote_id_foreign` (`lote_id`),
  CONSTRAINT `lote_itens_lote_id_foreign` FOREIGN KEY (`lote_id`) REFERENCES `lote` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.lote_itens: ~6 rows (approximately)
INSERT INTO `lote_itens` (`id`, `lote_id`, `numero`, `especificacao`, `unidade`, `quantidade`, `valor_referencia`, `created_at`, `updated_at`) VALUES
	(1, 6, 'FDzEc6w99KCnCHUT1EhXVdFJZvv2xUZavosIKWZL', 'CCxbQjUN1DhvOCvEo7N7ammYUXD1SXbQ11MUznJhPCr8UH5lhfcFjpf4Lc50Y39OjJl8f6LxjBo6vdycRV233A2Nns7VNg4PxjOe4TgqUEoQjfGQ5gtYHuxzKYJf0fIr5P2S5SMi6kHkcCdKBmW0da', 'G9DoF6VO4DBOTLIR3NiqlJoBHaWMOLGpJZXJwrxQvJipRL96RV', 7136, 8886573397.96, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(2, 7, 'xaTqB1dHm07atbJCatCDnHYaMMCnjeB0LTco7vZv', 'kTgKcdarPlgIpAfK0CHWZEU25Pzq649E1AihDxR2CN0ddsSyJbipTgomvWpDqVw5S92Of7V96eX2M1uZqkxIOirYwRLDWU9V6802YQMH9Z29pjZ6bD7DmzZ9jUjtsuQ4gboFud7Ue6kfh8ue2fUGBb', 'Wo6x4cfzgLW2kuHYiV90bgPYfVVx5VxLWKYK5gLNaQWLCSdSHR', 2297, 8424348225.07, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(3, 8, 'bm3Dkir2L9eJXrjrVkkKP4yU73Xs03zB4iAcA43D', 'VVrnsY1T1NFOdtQzigIgQMpZQTSW11SxRCk0qBYVPnPOdYZVwmcZHCM0o2J25rprDLL2jAeAD8xezn7ARaB7l5DkioVo94iohOlRmmaDkH3Uf8ZGGY2TSFtVsijNuLuSw10sVNYc3FWDzJEG5C2swr', 'E7R5VkTiGVIK1y3bFR3zjlq741NvyFxBb5tQQwvr1W2NV4PDxT', 4529, 593979461.39, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(4, 9, 'vQa3VBdUSzZ8qoFOn1Qc3URAMSR7pBlsB5g3ayT0', 'GyvarWqYmHcvPEuVphYUFZNaAWoVkT2SdgU5I3qFQYZrZjHx7VClKpQQafgIsQ4Rz34JXQdHGaxvpFfVlZVIaJ47vjq6ZtO40qXLyutIMAmkAmKInn9ZjncvxXhoYcTvqqKjkfxBTwuWXNiz1agYDU', 'rDxgHyf4qMgY465BsqM2XfNX4rX3Ey8fltsNTCIPu9pYDqzVGD', 5972, 2221599860.22, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(5, 10, 'VpgrRiljCogupdkd3pTMij22m1R2Lg0fo9yq3clz', '2vmbM3ptON7bUGrJhYOBYCuZDDs1d7SzW1KfYmc75fR35KLv4iT7mcOd25dVuoYRpCcAfShJQCpMmZCiUYNC7USRe1easokRZCBmqBSalejGb3Hh9Xunflzy9scnJA8IZC5QsMncx0C27Y0CN6XAEO', 'YHfqKGse3g1oiqC3HWQYV75k7JIwp9lZOrAaeAOm7eP0f1dB61', 6317, 2581079305.42, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(6, 1, '222', '22', '22', 22, 22.00, '2024-01-26 17:54:44', '2024-01-26 17:54:44');

-- Dumping structure for table db_sis_help.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_09_11_152737_create_permission_tables', 1),
	(6, '2023_10_27_134919_create_processos_table', 1),
	(7, '2023_11_15_230221_create_lotes_table', 1),
	(8, '2023_11_15_230222_create_lote_itens_table', 1),
	(9, '2024_01_11_143703_create_processo_arquivos_table', 1);

-- Dumping structure for table db_sis_help.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table db_sis_help.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.model_has_roles: ~1 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);

-- Dumping structure for table db_sis_help.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_sis_help.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.permissions: ~54 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(2, 'view_any_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(3, 'create_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(4, 'update_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(5, 'restore_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(6, 'restore_any_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(7, 'replicate_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(8, 'reorder_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(9, 'delete_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(10, 'delete_any_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(11, 'force_delete_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(12, 'force_delete_any_lote', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(13, 'view_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(14, 'view_any_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(15, 'create_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(16, 'update_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(17, 'restore_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(18, 'restore_any_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(19, 'replicate_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(20, 'reorder_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(21, 'delete_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(22, 'delete_any_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(23, 'force_delete_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(24, 'force_delete_any_permission', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(25, 'view_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(26, 'view_any_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(27, 'create_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(28, 'update_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(29, 'restore_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(30, 'restore_any_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(31, 'replicate_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(32, 'reorder_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(33, 'delete_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(34, 'delete_any_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(35, 'force_delete_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(36, 'force_delete_any_processo', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(37, 'view_role', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(38, 'view_any_role', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(39, 'create_role', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(40, 'update_role', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(41, 'delete_role', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(42, 'delete_any_role', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(43, 'view_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(44, 'view_any_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(45, 'create_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(46, 'update_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(47, 'restore_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(48, 'restore_any_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(49, 'replicate_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(50, 'reorder_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(51, 'delete_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(52, 'delete_any_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(53, 'force_delete_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41'),
	(54, 'force_delete_any_user', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41');

-- Dumping structure for table db_sis_help.personal_access_tokens
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

-- Dumping data for table db_sis_help.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table db_sis_help.processo
CREATE TABLE IF NOT EXISTS `processo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objetivo` longtext COLLATE utf8mb4_unicode_ci,
  `observacao` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.processo: ~20 rows (approximately)
INSERT INTO `processo` (`id`, `numero`, `objetivo`, `observacao`, `created_at`, `updated_at`) VALUES
	(1, 'FTg6cFrnz62DXJrR9Nsaug94GrTitqMJgTu894nVDjdb3oR2iMxXdnSCu0L0rUhel782F9kl7Vxm35P3xO18Bl3uLwfYz6RAvtJZPp5qX2s9BakcH4G6gR5CLOgw3MsqSRJR3rfetFiCEDszKWKTYG', 'Unde voluptas dolorum voluptas quia incidunt quia. Sint tempore ipsum rerum qui adipisci eos. Placeat enim minus delectus rerum nostrum.', 'Odio eius enim nobis sint voluptas non. Nisi veniam architecto non similique quia. Nihil cumque sit aut iure voluptas praesentium esse. Ipsum et aut deserunt.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(2, 'aiY1EQe27UGF88oWOTRHG6qNJzGRdi58WjYCdecC6rIE0RD4nX88ha9wMq5nOQH2yC6Ooae2p0SRVVp1mD9J7qYRBpmwGRbM4xFjasTiSOSQYquxK2DlvIoCyl7dGk6NvwFkNU8e7zRXEA7TC7sPaA', 'Culpa id provident rerum aliquid eius excepturi illo. Cumque nisi rerum nulla nihil est autem voluptatum ratione.', 'Delectus sapiente autem incidunt at ea. Temporibus a est distinctio quae occaecati est tempore. Animi odio modi architecto modi incidunt fuga quia.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(3, 'CrIJMM0CA5SJAtb3RqsIgLwF35JS0s05DkclrLFa5YWxfBzTNEZlZjiH8Hz7rGtVahVMwrOT6l5cgcrLkpUiFChyiwMi4zCnNg0rLliiiWLi903pmCM0eJckNjY9TpOhvhh1ToXBXFwa7lI4MPplPe', 'Qui nihil quisquam repudiandae velit laborum rerum voluptates. Cupiditate aut architecto velit velit esse deserunt ut.', 'Officia voluptatem vel consequatur sint quia qui fuga ea. Fuga aut laborum et sapiente et. Voluptatem alias modi et reprehenderit qui possimus nisi.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(4, 'Ft66von8kSblO8jjTztBW7fgjphxqi6xi4PmtHhSlpbYNlZktCQZ751uWbpqewEQLyBtiLBowcIWefxbU6BhQZkJcdWtGcRGz65GuQMC23qNciNiRiEx8Mu8GdkHj4fTDpcPDTK87o94ULmqqmgvzH', 'Quia quis cum reiciendis. Unde ducimus in a. Omnis maiores qui voluptas laboriosam et.', 'Dolorem iste nulla rerum qui sit. Et velit fuga dolores et ut rem aspernatur. Sapiente nam veritatis nihil odit amet provident. Id eos ipsa deleniti laborum corporis dolor a est.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(5, 'M3yghJOO4ZjMqK0Ym3e4tG0DM8FHT7QCPvUGu7PffdlNKdatQckcrGkBZkO5UTyCgTYSwa1J2ubDeCrB1y9yf1nVIOwUydlcgdjJLE6jklIVQJOns45xCnBmZss61EORQxRvLK5S1jmO1wuJIH1ZB5', 'Autem nemo ut et. Minus at temporibus culpa et. Rerum architecto incidunt aut.', 'Labore dolores animi minima cum. Laudantium mollitia voluptatem aut. Est voluptatem sit ut voluptate. In ad doloribus debitis ut quos ab possimus. Minus quod vel ab in.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(6, 'L1edFdZZd8A8ZCyMnLHrF3dhkxCaW1RtsznnBU5qmQtFaon5ouATwplu3Uxspk45JgUbGx9MVNYcpitGuoM0VAOTPjeWJPorOzkHZm62P0h6LAOYHqo8504THL8tCpWCHZON9rIzYPii77vPJVtrg0', 'Quo id impedit quae fugiat pariatur sint tempore. Ut minima ipsa dolores molestiae aliquid corrupti quia et. Praesentium et aut excepturi expedita. Debitis impedit nihil quod.', 'Aut expedita alias saepe qui animi. Facilis quis consectetur libero minus. A dolorem officia quasi beatae aut quod qui. Iste fuga esse consectetur.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(7, 'K1CAhSLNsu0x8fNQoIg7qSpuYYHaxH6CZPGwC6ZTRd0bVqn0ttpbKPj1Y9tBkX5VYIXUtb0C6P1vGiyYlcWRR1mACnmzotUVqmwHXXcrGzwJrMRjDU9nkCsdr5WhuAx6OZgpYqcvlLSURvveF2uizp', 'Itaque ipsa dolor dolorem. Nesciunt eaque et autem sed qui earum dolor voluptatem. Placeat ipsam mollitia ipsam libero quasi dignissimos. Soluta voluptatibus iusto quaerat vitae unde quam.', 'Molestias minus quia autem reprehenderit odit velit minima. Dolore et quasi explicabo est. Eligendi ea molestias aliquam laudantium fugiat. Similique consequatur ad quia sed numquam iste.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(8, 'q9uryW7a3zUjbiHFdf6hKpA34tZTZEALfkAIfPae9K015ZdPMX8PDl5BSGMsq80TsJ0oo7k3nterSinlHd828v0O2Z6xYA1SWg3VVX4siOHIGkGLACLnOLmOdJlJkchnZZyeqURjQbu8OzWIMDDM7H', 'Aut vel similique perferendis nemo. Repudiandae est in sint necessitatibus debitis. Soluta sequi reiciendis incidunt laudantium a.', 'Quibusdam saepe doloribus fugit sint enim. Molestiae pariatur consectetur qui qui. Modi facere fugiat consequatur deserunt magnam.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(9, 'VUQ7GzZb7NrI8zktapzd4GbybAYzLZpgV2M8GNQXjlNnsIlEyhFvSy1VjsacravRO8N7j0jqc7ncoArrZCoh0qFKEb8RMSn2PFGaDV7VFD0ztMsiiZIGXZoxEfW6FuUke9hWmOTXrcXok4S1YeXSuL', 'Harum harum aut aut voluptatem ea. Aliquid voluptatem voluptate rerum sit quas hic laborum. At dolorum vel consectetur voluptas et doloremque et. Velit iusto inventore autem veritatis vero accusamus.', 'Tempore sit fugit sit maxime. Impedit necessitatibus accusantium soluta minima maiores deserunt aperiam. Iure quia nihil quaerat vitae voluptas facilis reprehenderit.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(10, 'FQHRiVYkkKxAfUcw3JhIAfT96g86gBJCHsAEFkhcg4vpfrOy28M9Oc3Egp7wboyBY6Nnf6NrtEl0D8IenM2Lck3EngSCgAyLevrl0JKnwXIFY563s07j2mV6XWObKyCFZNL8PcEVNYzCknl8mW4Be2', 'Necessitatibus quia et occaecati enim. Expedita et quia in quam. Est impedit ducimus consectetur ad consectetur quia.', 'Ut ratione eveniet nihil magnam. Perspiciatis aut dolorem nisi doloribus voluptatem eum quia. Earum nobis est eligendi facilis. Est quas aut non quidem et.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(11, '6e855dAqALuIBrpr7QLOCorVS4VMHgGKLKkK8vMPVkrSblLlcozHyf8z3paDnesPplrfs9oaxddZHn4R8XH39tdbl4r8s02SKAOrWbOVrKPqfRBgxxTjpDyzPgjAOA7OzAm3YryNOorMqf8Zzc5BO4', 'Numquam animi aut nihil sit iusto culpa. Repudiandae quidem fugit animi nisi necessitatibus corporis omnis repellendus. Incidunt velit sunt velit in. Reiciendis quidem impedit numquam cum.', 'Consequuntur explicabo quasi adipisci ut ea quidem quibusdam. Qui nihil quis qui labore.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(12, 'gf9mXA5FG5GpXr1O7YaK5JiM9dxGZ9XwS1QfhJT4ij1qlStsxkV3IPVncnu1fOJwBQZLEoKXXSkXoQVNwsnoH1S9DhwI46dZi8d1q9Vx2U5zv2aXR3gqWzHe6ZBoAzXyrSgpD7judrb1EgImekC50K', 'Quaerat beatae maxime deserunt qui. Tempora praesentium harum necessitatibus. Minus corrupti debitis modi architecto.', 'Similique quibusdam dolorum veritatis. Blanditiis consequuntur modi et dicta autem. Minima autem autem molestiae fugit. Ex et quia rem et consequatur numquam.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(13, '0CHKA3DVS159KtIvHGearzjNmaQqLJCNlhwsIzFAgZ2Ugznz75LiCy9DlNVPtk3tRwjARKgbej1j3gOr5QXlfQNmYMIrTiNniV3PTen63qkpaH7iyi7ZqfIFZOIxqCyOhFfQ6IPYo1amSBLmc7hpot', 'Odio neque qui illo aut officiis aut eum molestiae. Cumque debitis sint qui rerum expedita quod voluptas. Quia nobis ut a inventore saepe aut. Ipsa id quod repudiandae numquam sed placeat est.', 'Voluptates rem fuga omnis. Quis natus blanditiis sit id autem quis adipisci. Tempore vel non est. Amet deserunt id quia a nostrum doloribus nihil. Alias sequi aut et et.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(14, 'KA9g482kM5HITs3wCKbS7JHvFOozeGPJPI0zMLmsw2IPUuXbuv2YZs9sIfbp27yLgkJxcaaGX5uoUqFW7ASYMNfucqcWBSWBPj7zp5NeXJMgtDp4GBMmsATnsTlcD4J1LJZvHL7D6IDgcsgvr9ncf6', 'Dolor perferendis quaerat amet veritatis distinctio saepe voluptatem. Voluptas consequatur officiis sit vel. Laudantium repellendus sint tempora.', 'Illo et minima aut nihil dolorem nihil animi. Repellendus blanditiis accusamus eos asperiores quasi earum eum. Et consequatur vero accusantium quo.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(15, 'HbOK2PR6m0x1JbTqlxMFnrRd7ZV012y4htvXVCjUG1wzbMho1rY3MEUdBbjpFiiHUeU3C484SfMaDWM7WijApMK34770Lq9OMGvpqWvU0yV2nJGwfnm4UOGb9nOoiH1ycEMxrDf8a5ae5nVpVTecsf', 'Fugiat quidem molestias numquam sapiente ut tempore aut et. Rerum sequi pariatur modi voluptatem facilis ullam. Debitis tempora exercitationem non iste. Id dolor molestiae quia delectus.', 'Est eum possimus cupiditate nisi aut quis quasi perferendis. Consequatur et ut saepe. Dolorem reprehenderit porro ratione aut qui explicabo.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(16, '0yfzfLTflU3XxHdTUOyait7EIReFknFMPhR8r8Ka1uWJoKYV3QgEGNVe4a4HYgWZxJWiu9FFwMw4uWaxGgy3hDieRnpnXChCGT3lAfeAKz4qVrI2VugzLnBKoBmwVitpckt45xsvMkJwjvbQLJ6wLU', 'Sit rerum ut nostrum quam voluptatibus sit animi sed. Itaque nisi dolore et est est.', 'Laborum incidunt enim sed porro nesciunt. Non neque voluptas aliquid veniam.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(17, 'BFvKSe4jK7HyEZvbInDToVbBYRh7viotekOlG6cG8AANy3e5W3voco7Dc6O2VBesZYAxD5D8trc2KAKrozrnTICmnSk9sxp3WrFJw2ONRLLNWh1gBfb2kKXQftYDHKHGZprs4f184E3kg7tUSpP6EI', 'Sequi non et nihil labore. Possimus odio eos ratione suscipit provident. Sunt optio assumenda porro velit laboriosam perspiciatis labore. Cumque ut consequatur nesciunt quod aut.', 'Voluptatem ratione aut tempore vitae eaque sit. Vero quo omnis quaerat quis. Facere aut similique hic.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(18, 'NnQQwTdMiYX6rPIuty6xEOgKT6T10O7L25bDq34ervw4owfebb0KSt70QhGQ0Rl4j5PTSe2ta9OGFIhPl7ZD2MifFIXAHUEbaUlcSw8Pk30Wn8EqhiTS1j85gN94i5OemFFaDwI4yi8Luaox5aHfsS', 'Quo dolore ducimus molestias dignissimos. Velit dolorem consequatur mollitia temporibus corporis praesentium dolorem fugiat. Praesentium non qui veritatis omnis. Tempore nulla facilis ipsam nihil.', 'Corporis saepe eius sequi odio voluptas et. Perspiciatis velit quas recusandae id. Consequatur in autem eum libero quia. Dignissimos corporis voluptatem aliquam cum.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(19, 'LhutdXmnKRwrxNVLsSord5USQIl9MGmWr0c5bcltjx1HpnURPdDLe0gBAvx49w2ZDojME2Szm6mVJnyyjnJF912Kzl2i62Dg32P01ywFJ6ar275fbWBT2u9Oba8977eiUghpaRyVpnxyL7hibvNqmz', 'Voluptatum id dolor voluptatem aut. Voluptas ut quibusdam modi vitae et ad sed. Harum modi non libero occaecati dignissimos. Tempore deserunt iste qui aut quo ea.', 'Cum aut iure eius eos minus. Officiis rerum nam voluptas tenetur. Exercitationem occaecati fugiat numquam temporibus veniam est. Eligendi et voluptas a.', '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(20, 'zIvp9d5aimsE58cgi90TiWqgiAUhgfWjr5QE8fYiRtwICEM5Ai50tp09x5gICKrC6q3B6hvJyPkGr50rPFIQSTEbKd7ahqtoSs4FJTa8soy4AaBr9Ba2vArVqD3QaHbHmARXoINcpc15IX5jaJp27D', 'Cum veniam sit aut explicabo. Rerum at et corporis voluptatem. Recusandae officia sint soluta totam ipsa qui nesciunt et.', 'Quam eos dicta quia. Voluptatem quibusdam suscipit ratione maiores et repudiandae. Laudantium natus cum tenetur odit atque.', '2024-01-26 17:44:24', '2024-01-26 17:44:24');

-- Dumping structure for table db_sis_help.processo_arquivo
CREATE TABLE IF NOT EXISTS `processo_arquivo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome_arquivo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processo_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `processo_arquivo_processo_id_foreign` (`processo_id`),
  CONSTRAINT `processo_arquivo_processo_id_foreign` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.processo_arquivo: ~5 rows (approximately)
INSERT INTO `processo_arquivo` (`id`, `nome_arquivo`, `processo_id`, `created_at`, `updated_at`) VALUES
	(1, 'bo8CCiexJJts3DIR3qkhNXavn5P5ipyucowWKIRSfou7UW3K5SJWue2TexeeTirg93O1vmQaw6w81yuSlcN5zPSW3nZJ3gIOWuAcAOvXKy3a3LstSy0zVKWh9cGQCDTK8XkQMKv2E63rwC6orLFLiRSSFDht4tdX000EeEIbjQaEUHd1s4M1EFALjIacnKjzZCQ74uYNSfWfh9yusJOpx9FXlkRZY6j788FLhvzrjkcZ4iatJCGrJ6IFwg', 16, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(2, 'HgWxVTikSy2qutHa75qKOnweScIFipB0LMy1JlI7ChrBdN6NTkqWDlJYHFiOUwP9DMTHcoSujthxeQG5CYRTMJuNnLwdd5GOGEuxdzlL1LB1HcxpjTi1cisLk2ZK3DESlKvb15kh2kvVSMvHuc3e2YkOGyUb0Pa5lsv5TMqojksE4eMoeL0mo7YYAKYbmKuT94yCgX6nnBocXfpBOMKRJM91LZ7aZ3sY8GKHUUauBOIVBjD3XwhK2C70wG', 17, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(3, 'JQA7GFhDMxRo8BZlFArrVTcZkOtRZiNj2ahdJcfuwMRY7SgfVZzz6qVaSQ0L45qnkPGdaGUYAPT3fcuRFxDE9af1twXvbpI4F1OtIrU7TNTXJLDAYMCwaypSKqWYqbknT1oL96tA29moonn1BFaX2skY8t5uqUbNPveTIDZVpW9OkI1wo3zIShvACv2vw9rrad8gzkmo0lXneJ0zcW5wYj9p3zXxxjfVmvY296sKZuix7rIIc0bYck6FFd', 18, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(4, 'MslQKt59U061VC3jccZ2zD6ZBMhZhtcgwbL6Dx3yTW9AvnNuttnABMb9FwTq1SExZL8WG79n9dPxDdHV8Dh3nQXwUKYDXclMUo0esQMMg6ALPikicJZXFE8Uql8OkcutYoBKorifZqpvehCAhjCW2wOSatQKiwzC6NJfbyMufcYKPb1rDJXBkUfEwussZ3nQQviYyI3GYcUEJtGxz80eh9rpuMKu0RF0YH5Of0nmIxqFgl4dca73ZZluFq', 19, '2024-01-26 17:44:24', '2024-01-26 17:44:24'),
	(5, 'VN3T4lkqNZwPs6NAnb0m9TRdd8C5DRWk4hISfoAWGYQEFYsAvRGAhLFaIoKCrHOPgrSPzjhbn3h3hnBohWHseb5IekdfJic6Rh6Ccsr1mJSraoBELSd19aL1nQRXvBdD4fnXM1gm2OnFNbo3BOwhP68HTGWzrOjjU56jtePpTlYWz6vKvG2ZBoiaSoD3zM0tYkCwFbvi9BDWKX6bV93jv7KnVODkSEW9powhvB9E5rWq7zkpbVkPL5OeoI', 20, '2024-01-26 17:44:24', '2024-01-26 17:44:24');

-- Dumping structure for table db_sis_help.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.roles: ~1 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'web', '2024-01-26 17:51:41', '2024-01-26 17:51:41');

-- Dumping structure for table db_sis_help.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.role_has_permissions: ~54 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(51, 1),
	(52, 1),
	(53, 1),
	(54, 1);

-- Dumping structure for table db_sis_help.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sis_help.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', NULL, '$2y$10$B49F26KwqRmbiIfp8hU2seo1D/uA1Ipj3rCRFNxEMoswhROv4fAlu', 'oIY6uJB9RjBca9LUbt7N5zgtYVBRIdcrk2iSLRbp4WAAZjukWhhJTUzuyW2R', '2024-01-26 17:48:04', '2024-01-26 17:48:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
