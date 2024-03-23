-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2024 at 10:27 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_gate_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_29_160526_add_subscribe_to_users_table', 2),
(6, '2014_10_12_100000_create_password_resets_table', 3),
(7, '2024_02_02_100235_create_posts_table', 3),
(8, '2024_02_10_043003_add_is_authenticated_to_users_table', 4),
(9, '2024_02_10_043315_add_is_published_to_posts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`, `is_published`) VALUES
(1, 3, 'First Post', 'এবার আমরা প্রত্যেকটি Post এর ডিটেলস দেখানোর', '2024-02-02 04:12:32', '2024-02-10 04:16:04', 0),
(2, 4, 'Second Post', 'এবার আমরা প্রত্যেকটি Post এর ডিটেলস দেখানোর জন্য', '2024-02-02 04:12:32', '2024-02-10 04:16:15', 0),
(4, 5, 'Title 1', 'Content 1', '2024-02-02 09:57:43', '2024-02-02 09:57:43', 0),
(5, 6, 'Title 2', 'Content 2 > এবার আমরা প্রত্যেকটি', '2024-02-02 09:58:51', '2024-02-10 04:16:23', 0),
(6, 6, 'Editor', 'Editor > এবার আমরা প্রত্যেকটি Post এ', '2024-02-09 23:29:44', '2024-02-10 04:16:31', 0),
(10, 1, 'Create a New Post', 'New Post', '2024-02-10 04:13:32', '2024-02-10 04:17:29', 0),
(11, 1, 'New Post', 'New Post', '2024-02-10 04:13:48', '2024-02-10 04:13:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subscribe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'User',
  `is_authenticated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `subscribe`, `role`, `is_authenticated`) VALUES
(1, 'Tipu Admin', 'tstipu69@gmail.com', NULL, '$2y$12$l5BgNk6z1saKeEXa.H5xROzhVyDjH91NWiIttacdacU1pTBchVV5S', NULL, '2024-01-29 10:08:38', '2024-01-29 10:08:38', '1', 'Admin', 1),
(2, 'Tani', 'tani@gmail.com', NULL, '$2y$12$ADYYL8BUDrOF8enH7Cc4B..eONOUUqP2HnusXNrPtQdHloL.u95Bi', NULL, '2024-01-29 11:39:01', '2024-01-29 11:39:01', '0', 'User', 0),
(3, 'John Doe', 'john@example.com', NULL, '$2y$12$5vucXKn1FoDGLWnII7p5COc7/MupRtQX7poZa8NDDWSKFYHAXDR6W', NULL, '2024-02-02 04:07:21', '2024-02-02 04:07:21', '0', 'User', 0),
(4, 'Tipu User', 'tipuuser@example.com', NULL, '$2y$12$2OZ9wXzmGM7PIZoScr4Oc.DKbimUhC3Yq75uF8wt5Bt40v7Ha8iUG', 'zNlYSyLS0MXDwbe2zkcqAeZTxJ7IJqIIDjbaOJAgfO3Wo6NA3cIAgNlQBqI6', '2024-02-02 04:07:22', '2024-02-02 04:07:22', '0', 'User', 0),
(5, 'Tipu Admin', 'tipuadmin@gmail.com', NULL, '$2y$12$V6o14iUwZd6tubOpmpJmpuow2NeKnZuOp/sOmCirxgtxXb0gi4HIa', 'JIikT015MUEQX41Mk5YBiO3LeTjmQVHPecKIomZH9RIjHjC8PgGZmBZiOpt4', '2024-02-02 04:07:23', '2024-02-02 04:07:23', '0', 'Admin', 0),
(6, 'Tipu Editor', 'tipueditor@gmail.com', NULL, '$2y$12$h68hyc/sFIqHWj4XxZCGHeJ9wo0fhmrjWG3XupryWK/NIuMeUBeoK', NULL, '2024-02-02 04:07:23', '2024-02-02 04:07:23', '0', 'Editor', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
