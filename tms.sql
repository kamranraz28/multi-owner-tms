-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2026 at 08:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `costdetails`
--

CREATE TABLE `costdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `memo_upload` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costdetails`
--

INSERT INTO `costdetails` (`id`, `cost_id`, `service_id`, `amount`, `memo_upload`, `created_at`, `updated_at`) VALUES
(5, 4, 4, 100, NULL, '2025-05-26 17:21:13', '2025-05-26 17:21:13'),
(6, 4, 3, 1000, NULL, '2025-05-26 17:21:13', '2025-05-26 17:21:13'),
(7, 4, 2, 300, NULL, '2025-05-26 17:21:13', '2025-05-26 17:21:13'),
(12, 5, 3, 1000, NULL, '2026-05-11 22:25:46', '2026-05-11 22:25:46'),
(13, 4, 3, 1, NULL, '2026-05-13 17:32:23', '2026-05-13 17:32:23'),
(14, 5, 21, 10000, NULL, '2026-05-13 17:37:09', '2026-05-13 17:37:09'),
(15, 6, 8, 2000, '1778741374_6a05707ec68b3.png', '2026-05-13 18:49:35', '2026-05-13 18:49:35'),
(16, 7, 4, 500, '1778741525_6a05711507b60.pdf', '2026-05-13 18:52:05', '2026-05-13 18:52:05'),
(17, 4, 20, 1500, '1779337804_6a0e8a4c369bb.pdf', '2026-05-20 22:30:04', '2026-05-20 22:30:04'),
(18, 3, 7, 1500, '1779340733_6a0e95bd5fb75.png', '2026-05-20 23:18:53', '2026-05-20 23:18:53'),
(19, 5, 19, 1500, NULL, '2026-05-20 23:25:51', '2026-05-20 23:25:51'),
(20, 5, 20, 1500, '1779341151_6a0e975f1f386.png', '2026-05-20 23:25:51', '2026-05-20 23:25:51'),
(21, 6, 22, 1500, '1780400677_6a1ec225cdf58.jpg', '2026-06-02 05:44:37', '2026-06-02 05:44:37'),
(22, 7, 24, 3400, '1780466770_6a1fc4529f030.png', '2026-06-03 00:06:10', '2026-06-03 00:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `organization_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, '2025-05-01', 1, '2025-05-26 23:05:02', '2025-05-26 23:05:02'),
(2, 15, '2025-05-02', 1, '2025-05-26 23:08:35', '2025-05-26 23:08:35'),
(3, 16, '2025-05-03', 1, '2025-05-26 23:21:13', '2025-05-26 23:21:13'),
(4, NULL, '2026-05-21', 1, '2026-05-20 22:30:04', '2026-05-20 22:30:04'),
(5, NULL, '2026-05-22', 1, '2026-05-20 23:25:51', '2026-05-20 23:25:51'),
(6, 13, '2026-06-03', 1, '2026-06-02 05:44:37', '2026-06-02 05:44:37'),
(7, 40, '2026-06-03', 1, '2026-06-03 00:06:10', '2026-06-03 00:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_03_052534_create_permission_tables', 1),
(6, '2024_10_07_094613_create_notifications_table', 1),
(7, '2024_10_15_100904_create_settings_table', 1),
(8, '2026_05_04_081355_create_payments_table', 1),
(9, '2026_05_04_092305_create_tenants_table', 1),
(10, '2026_05_04_094439_create_positions_table', 1),
(11, '2026_05_04_095702_create_properties_table', 1),
(12, '2026_05_04_100832_create_services_table', 1),
(13, '2026_05_04_101905_create_tenantservices_table', 1),
(14, '2026_05_04_105521_create_costs_table', 1),
(15, '2026_05_04_112445_create_costdetails_table', 1),
(17, '2026_05_07_114021_create_organization_table', 1),
(18, '2026_05_10_112023_create_organization_users_table', 1),
(20, '2026_05_07_054532_create_plans_table', 2),
(21, '2026_06_01_060046_create_subscriptions_table', 3),
(22, '2026_06_01_063316_create_subscription_histories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 16),
(4, 'App\\Models\\User', 17),
(4, 'App\\Models\\User', 24),
(4, 'App\\Models\\User', 25),
(4, 'App\\Models\\User', 26),
(4, 'App\\Models\\User', 27),
(4, 'App\\Models\\User', 28),
(4, 'App\\Models\\User', 29),
(4, 'App\\Models\\User', 30),
(4, 'App\\Models\\User', 31),
(4, 'App\\Models\\User', 32),
(4, 'App\\Models\\User', 33),
(4, 'App\\Models\\User', 34),
(4, 'App\\Models\\User', 35),
(4, 'App\\Models\\User', 36),
(4, 'App\\Models\\User', 37),
(4, 'App\\Models\\User', 38),
(4, 'App\\Models\\User', 39),
(4, 'App\\Models\\User', 40),
(4, 'App\\Models\\User', 41),
(4, 'App\\Models\\User', 42),
(4, 'App\\Models\\User', 43),
(4, 'App\\Models\\User', 44),
(4, 'App\\Models\\User', 45),
(4, 'App\\Models\\User', 46),
(4, 'App\\Models\\User', 47),
(4, 'App\\Models\\User', 48),
(4, 'App\\Models\\User', 49);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `notifiable_type` varchar(255) DEFAULT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `is_read`, `created_by`, `notifiable_type`, `notifiable_id`, `created_at`, `updated_at`) VALUES
(4, NULL, 'Kajal created a perission- per_create', 0, 2, NULL, 1, '2024-10-06 17:47:27', '2025-02-15 14:31:29'),
(11, NULL, 'Kamran created a perission- notification_access', 0, 1, NULL, 1, '2024-10-07 16:56:25', '2025-02-15 14:31:29'),
(12, NULL, 'Kamran created a perission- user_configuration', 0, 1, NULL, 1, '2024-10-07 17:06:37', '2025-02-15 14:31:29'),
(13, NULL, 'Kamran created a perission- software_settings', 0, 1, NULL, 1, '2024-10-14 15:03:25', '2025-02-15 14:31:29'),
(14, NULL, 'Kamran Khan created a perission- system_configuration', 0, 1, NULL, 0, '2026-05-10 23:24:42', '2026-05-10 23:24:42'),
(15, 3, 'Kamran Khan created a user- Billal for role- organization_user', 0, 1, NULL, 0, '2026-05-11 16:47:59', '2026-05-11 16:47:59'),
(16, NULL, 'Kamran Khan created a perission- sidebar_reports', 0, 1, NULL, 0, '2026-05-13 20:31:21', '2026-05-13 20:31:21'),
(17, 18, 'Kamran Khan created a user- Ibrahim Khan for role- Admin', 0, 1, NULL, 0, '2026-05-19 23:04:49', '2026-05-19 23:04:49'),
(18, 19, 'Kamran Khan created a user- potibashi for role- Visitor', 0, 1, NULL, 0, '2026-05-20 02:17:35', '2026-05-20 02:17:35'),
(19, 20, 'Kamran Khan created a user- potibashi123 for role- Visitor', 0, 1, NULL, 0, '2026-05-20 02:22:39', '2026-05-20 02:22:39'),
(20, 21, 'Kamran Khan created a user- potibashi1234 for role- Visitor', 0, 1, NULL, 0, '2026-05-20 02:26:47', '2026-05-20 02:26:47'),
(21, 22, 'Kamran Khan created a user- mribrahimkhan006 for role- organization', 0, 1, NULL, 0, '2026-05-20 02:42:20', '2026-05-20 02:42:20'),
(22, 23, 'Kamran Khan created a user- mribrahimkhan006 for role- Visitor', 0, 1, NULL, 0, '2026-05-20 05:53:23', '2026-05-20 05:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `slug`, `user_id`, `plan_id`, `phone`, `email`, `password`, `address`, `logo`, `status`, `role_id`, `trial_ends_at`, `created_at`, `updated_at`) VALUES
(11, 'Sagor Ahmed', NULL, 1, 3, '017817147981', 'sagorahmed@gmail.com', '$2y$10$e7K25.TMM5zzJnumLo0oYOy/0kshFj/ReLouU9EGlNprIhi.PwJu.', NULL, NULL, 1, 4, '2026-07-01 05:06:49', '2026-05-11 17:43:50', '2026-06-01 05:06:49'),
(12, 'Billal', NULL, 1, NULL, '01787147988', 'billal@gmail.com', '$2y$10$hxCNbMKuuNwJ/6b4PQlr3.yunbN5MMjr6vCVg5p0.shmWbKJSAzZm', NULL, NULL, 1, 4, NULL, '2026-05-11 18:06:23', '2026-05-11 18:06:23'),
(13, 'Younus Shikh', NULL, 1, 1, '01971772772', 'younusshikh@gmail.com', '$2y$10$rhpBtlrwMGOO6mBikWx9ue1hgM1R0jUiqsao0d51ISOmhaXE.2PhW', NULL, NULL, 1, 4, '2026-06-09 04:47:53', '2026-05-11 18:11:41', '2026-06-02 04:47:53'),
(14, 'Jabbir', NULL, 1, 1, '01787147933', 'Jabbir@gmail.com', '$2y$10$x7Y1VFBw.NspMd08mJQgcuOSH06UxMgXdo8kyirveFGKKuXhuhkLe', NULL, NULL, 1, 4, '2026-06-09 05:53:12', '2026-05-13 16:58:26', '2026-06-02 05:53:12'),
(15, 'SattarPro', 'sattarpro-6a1d60cd5e21a', 24, 1, NULL, 'SakibKhan@gmail.com', NULL, NULL, NULL, 1, NULL, '2026-06-08 04:37:02', '2026-06-01 04:37:01', '2026-06-01 04:37:02'),
(16, 'Standard Food', 'standard-food-6a1d61a3ad8e5', 25, 1, NULL, 'Ibrahimkk@gmail.com', NULL, NULL, NULL, 1, NULL, '2026-06-08 04:40:35', '2026-06-01 04:40:35', '2026-06-01 04:40:35'),
(17, 'Astra Fuentes', 'astra-fuentes-6a1d6cad84648', 26, 1, NULL, 'cusetydi@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-08 05:27:41', '2026-06-01 05:27:41', '2026-06-01 05:27:41'),
(18, 'Jasper Rowe', 'jasper-rowe-6a1d6d64d0657', 27, 1, NULL, 'lycy@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-08 05:30:44', '2026-06-01 05:30:44', '2026-06-01 05:30:44'),
(19, 'Kerry Holcomb', 'kerry-holcomb-6a1d72476915d', 28, 1, NULL, 'cyryqaxiz@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-08 05:51:35', '2026-06-01 05:51:35', '2026-06-01 05:51:35'),
(20, 'Salim Khondokar Villa', 'salim-khondokar-villa-6a1e6a15f1627', 29, NULL, NULL, 'salimkhondokar360@gmail.com', NULL, NULL, NULL, 1, NULL, '2026-06-15 23:28:53', '2026-06-01 23:28:53', '2026-06-01 23:28:54'),
(21, 'Salim Khondokar Villa', 'salim-khondokar-villa-6a1e6b2d6a367', 30, NULL, NULL, 'salimkhondokar360@gmail.com', NULL, NULL, NULL, 1, NULL, '2026-06-15 23:33:33', '2026-06-01 23:33:33', '2026-06-01 23:33:33'),
(22, 'Salim Khondokar Villa', 'salim-khondokar-villa-6a1e6b8c35e38', 31, NULL, NULL, 'salimkhondokar360@gmail.com', NULL, NULL, NULL, 1, NULL, '2026-06-15 23:35:08', '2026-06-01 23:35:08', '2026-06-01 23:35:08'),
(23, 'Salim Khondokar Villa', 'salim-khondokar-villa-6a1e6bf77eeaa', 32, 1, NULL, 'salimkhondokar360@gmail.com', NULL, NULL, NULL, 1, NULL, '2026-06-08 23:37:26', '2026-06-01 23:36:55', '2026-06-01 23:37:26'),
(24, 'Lawrence Freeman', 'lawrence-freeman-6a1e761fae747', 33, NULL, NULL, 'jasy@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-16 00:20:15', '2026-06-02 00:20:15', '2026-06-02 00:20:15'),
(25, 'Yardley Barrera', 'yardley-barrera-6a1e76b2bb14d', 34, 1, NULL, 'feloh@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 00:22:50', '2026-06-02 00:22:42', '2026-06-02 00:22:50'),
(26, 'Salim Khondokar Villa', 'salim-khondokar-villa-6a1e775e710f6', 35, NULL, NULL, 'salimkhondokar360@gmail.com', NULL, NULL, NULL, 1, NULL, '2026-06-16 00:25:34', '2026-06-02 00:25:34', '2026-06-02 00:25:34'),
(27, 'Lysandra Wiley', 'lysandra-wiley-6a1e77ffdedc8', 36, 1, NULL, 'hymu@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 00:29:08', '2026-06-02 00:28:15', '2026-06-02 00:29:08'),
(28, 'Ainsley Donovan', 'ainsley-donovan-6a1e7ae7ddb22', 37, 1, NULL, 'ryhe@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 00:40:55', '2026-06-02 00:40:39', '2026-06-02 00:40:55'),
(29, 'Hop Bright', 'hop-bright-6a1e7dc42c394', 38, 1, NULL, 'bijoqypat@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 00:58:21', '2026-06-02 00:52:52', '2026-06-02 00:58:21'),
(30, 'Freya Coffey', 'freya-coffey-6a1e868eb2f6d', 39, 1, NULL, 'taxejyf@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 01:30:22', '2026-06-02 01:30:22', '2026-06-02 01:30:22'),
(31, 'Leo Singleton', 'leo-singleton-6a1e89349b0af', 40, 1, NULL, 'kuga@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 01:41:44', '2026-06-02 01:41:40', '2026-06-02 01:41:44'),
(32, 'Deanna Mccormick', 'deanna-mccormick-6a1e8af03673e', 41, 1, NULL, 'waherez@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 01:49:07', '2026-06-02 01:49:04', '2026-06-02 01:49:07'),
(33, 'TaShya Hale', 'tashya-hale-6a1e8cf8ed171', 42, 1, NULL, 'vaqe@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 01:58:22', '2026-06-02 01:57:44', '2026-06-02 01:58:22'),
(34, 'Nerea Perez', 'nerea-perez-6a1e8d2e08e00', 43, 1, NULL, 'cezek@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 01:58:43', '2026-06-02 01:58:38', '2026-06-02 01:58:43'),
(35, 'Dillon Giles', 'dillon-giles-6a1e8d8187e25', 44, 1, NULL, 'bevoziho@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 02:00:10', '2026-06-02 02:00:01', '2026-06-02 02:00:10'),
(36, 'Garth Romero', 'garth-romero-6a1e8df0126a7', 45, 3, NULL, 'jukuret@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-07-02 02:01:56', '2026-06-02 02:01:52', '2026-06-02 02:01:56'),
(37, 'Clementine Dunlap', 'clementine-dunlap-6a1ea7b7ad1d1', 46, NULL, NULL, 'qagujygulu@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-16 03:51:51', '2026-06-02 03:51:51', '2026-06-02 03:51:51'),
(38, 'Isabella Wilson', 'isabella-wilson-6a1ea7d7f0e70', 47, 1, NULL, 'pehyvaledi@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 03:52:24', '2026-06-02 03:52:23', '2026-06-02 03:52:24'),
(39, 'Shelly Whitney', 'shelly-whitney-6a1fb080bec7c', 48, 1, NULL, 'gijev@mailinator.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 22:41:37', '2026-06-02 22:41:36', '2026-06-02 22:41:37'),
(40, 'Mujibur Sheikh Villa', 'mujibur-sheikh-villa-6a1fb3938f92f', 49, 1, NULL, 'mujibursheikh360@gmail.com', NULL, NULL, NULL, 1, NULL, '2026-06-09 23:03:35', '2026-06-02 22:54:43', '2026-06-02 23:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `organization_users`
--

CREATE TABLE `organization_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_month` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tenant_id`, `payment_month`, `created_at`, `updated_at`) VALUES
(1, 1, 'January 2026', '2026-05-10 22:50:35', '2026-05-10 22:50:35'),
(2, 2, 'February 2026', '2026-05-10 22:50:35', '2026-05-10 22:50:35'),
(3, 3, 'March 2026', '2026-05-10 22:50:35', '2026-05-10 22:50:35'),
(4, 1, 'April 2026', '2026-05-10 22:50:35', '2026-05-10 22:50:35'),
(5, 2, 'May 2026', '2026-05-10 22:50:35', '2026-05-10 22:50:35'),
(6, 2, '2026-05', '2026-05-11 22:43:41', '2026-05-11 22:43:41'),
(7, 3, '2026-05', '2026-05-13 16:18:52', '2026-05-13 16:18:52'),
(8, 7, '2026-05', '2026-05-13 16:18:57', '2026-05-13 16:18:57'),
(9, 10, '2026-05', '2026-05-13 16:19:01', '2026-05-13 16:19:01'),
(10, 11, '2026-05', '2026-05-13 16:49:40', '2026-05-13 16:49:40'),
(11, 12, '2025-06', '2026-05-13 18:37:36', '2026-05-13 18:37:36'),
(12, 12, '2026-05', '2026-05-13 20:28:12', '2026-05-13 20:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'edit_post', 'web', NULL, NULL),
(3, 'delete_post', 'web', NULL, NULL),
(4, 'view_post', 'web', NULL, NULL),
(5, 'user_create', 'web', NULL, NULL),
(8, 'per_create', 'web', NULL, NULL),
(11, 'notification_access', 'web', NULL, NULL),
(12, 'user_configuration', 'web', NULL, NULL),
(13, 'software_settings', 'web', NULL, NULL),
(14, 'organization_user_sidebar', 'web', NULL, NULL),
(15, 'organization_super_admin_sidebar', 'web', NULL, NULL),
(16, 'system_configuration', 'web', NULL, NULL),
(17, 'sidebar_reports', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL DEFAULT '1',
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `billing_cycle` enum('monthly','yearly') NOT NULL DEFAULT 'monthly',
  `subscriptions` enum('basic','silver','gold') NOT NULL DEFAULT 'basic',
  `max_properties` int(11) NOT NULL DEFAULT 5,
  `max_tenants` int(11) NOT NULL DEFAULT 20,
  `max_users` int(11) NOT NULL DEFAULT 3,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `trial_days` int(11) NOT NULL DEFAULT 0,
  `asset_liabilities` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `slug`, `price`, `billing_cycle`, `subscriptions`, `max_properties`, `max_tenants`, `max_users`, `features`, `trial_days`, `asset_liabilities`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 'basic', 999.00, 'monthly', 'basic', 5, 20, 3, '[]', 7, NULL, 1, NULL, NULL),
(2, 'Silver', 'silver', 2499.00, 'monthly', 'silver', 25, 100, 10, '[]', 14, NULL, 1, NULL, NULL),
(3, 'Gold', 'gold', 6999.00, 'monthly', 'gold', 999999, 999999, 999999, '[]', 30, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `organization_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'West Side', 15, 1, '2026-05-20 23:52:27', '2026-05-20 23:52:27'),
(2, 'South East', 13, 1, '2026-06-02 04:32:53', '2026-06-02 04:32:53'),
(3, 'East Wing', 11, 1, '2026-06-02 05:11:50', '2026-06-02 05:11:50'),
(4, 'West Wing', 11, 1, '2026-06-02 05:11:50', '2026-06-02 05:11:50'),
(5, 'East West', 39, 1, '2026-06-02 22:46:18', '2026-06-02 22:46:18'),
(6, 'Eastward', 40, 1, '2026-06-02 23:03:07', '2026-06-02 23:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `position_id`, `name`, `address`, `organization_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Flat-1', 'Mirpur DOHS', 15, 1, '2025-05-24 14:35:42', '2026-05-11 18:53:02'),
(3, 1, 'Flat-2', 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh', 16, 1, '2026-05-11 18:48:26', '2026-05-12 02:30:32'),
(4, 2, 'Younush Munshi House - Hindubari, Shariatpur- Bangladesh', 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh', 16, 1, '2026-05-11 18:56:15', '2026-05-11 20:53:44'),
(5, 3, 'Flat-2', 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh', 16, 1, '2026-05-11 20:18:49', '2026-05-12 02:31:35'),
(6, 2, '1 BHK Flat', 'Dasarta Shariatpur Dhaka Bangladesh', 15, 1, '2026-05-11 20:27:10', '2026-05-11 20:27:10'),
(7, 4, 'Darsarta Sheikh House', 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh', 17, 1, '2026-05-13 17:01:48', '2026-05-13 17:01:48'),
(9, 2, 'Ali Boyer', 'Omnis in aliqua Vol', 13, 1, '2026-06-02 04:59:38', '2026-06-02 04:59:38'),
(10, 3, 'Flat-1', '123 Main Street, Dhaka', 11, 1, '2026-06-02 05:11:50', '2026-06-02 05:11:50'),
(11, 4, 'Flat-2', '456 Lake Road, Dhaka', 11, 1, '2026-06-02 05:11:50', '2026-06-02 05:11:50'),
(12, 6, 'Tin-shed house with 2 rooms', 'House No : 318 , Dasartta, Shariatpur , Dhaka , Bangladesh', 40, 1, '2026-06-02 23:15:41', '2026-06-02 23:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-10-02 11:54:51', '2024-10-02 11:54:51'),
(2, 'Editor', 'web', '2024-10-02 11:55:15', '2024-10-02 11:55:15'),
(3, 'Visitor', 'web', '2024-10-02 15:24:12', '2024-10-02 15:24:12'),
(4, 'organization', 'web', '2024-10-02 15:24:32', '2024-10-02 15:24:12'),
(5, 'organization_user', 'web', '2024-10-02 15:24:32', '2024-10-02 15:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 2),
(3, 2),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(8, 1),
(11, 1),
(12, 1),
(13, 1),
(15, 1),
(16, 1),
(16, 4),
(17, 1),
(17, 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `organization_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Electricity Bill', 16, 'Monthly electricity bill associated with tenant rent', 1, '2025-05-24 13:55:20', '2026-05-11 18:33:18'),
(3, 'Rent', 15, 'Monthly rental charge for tenant accommodation', 1, '2025-05-24 16:05:27', '2026-05-12 04:22:58'),
(4, 'Parking', 16, 'Monthly parking space charge for vehicles', 1, '2025-05-24 16:05:54', '2026-05-12 04:22:29'),
(5, 'Water Bill', 15, 'Monthly water usage charge for tenant', 1, '2025-05-24 16:05:54', '2026-05-12 00:35:38'),
(6, 'Water Bill', 15, 'Monthly water usage charge for tenant', 1, '2025-05-24 16:05:54', '2026-05-12 00:35:41'),
(7, 'Internet Service', 16, 'Monthly internet connection fee for tenant use', 1, '2025-05-24 16:05:54', '2026-05-12 00:35:44'),
(8, 'Maintenance Fee', 16, 'Building maintenance and repair service charge', 1, '2025-05-24 16:05:54', '2026-05-12 00:35:47'),
(10, 'Cleaning Service', 16, 'Common area cleaning and sanitation charge', 1, '2025-05-24 16:05:54', '2026-05-12 00:35:49'),
(18, 'Car Wash', 15, 'Common area cleaning and sanitation charge', 1, '2026-05-11 18:30:28', '2026-05-11 18:30:28'),
(19, 'Security Fee', 15, 'Security service charge for tenant safety', 1, '2026-05-11 18:31:06', '2026-05-11 18:31:06'),
(20, 'Rent', 17, 'Monthly electricity bill associated with tenant rent', 1, '2026-05-13 16:59:20', '2026-05-13 16:59:20'),
(21, 'WindowFix', 17, 'Window was broken', 1, '2026-05-13 17:36:48', '2026-05-13 17:36:48'),
(22, 'Water', 13, 'Water supply management', 1, '2026-06-02 04:32:29', '2026-06-02 04:32:29'),
(23, 'AC Repair Service', 39, 'Price of materials or parts Transportation cost for carrying new materials/parts Warranty given by manufacturer Hanging Charge 400tk ( upto 8th floor) for the outdoor unit (If applicable) Additional 400tk will be added after 8th floor', 1, '2026-06-02 22:43:08', '2026-06-02 22:43:08'),
(24, 'Wifi Service', 40, 'The total WiFi bill is 500 BDT. This amount will be divided equally among all tenants, calculated as 500 ÷ total number of tenants.', 1, '2026-06-02 23:02:22', '2026-06-02 23:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_color` varchar(255) DEFAULT NULL,
  `sidebar_color` varchar(255) DEFAULT NULL,
  `button_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `header_color`, `sidebar_color`, `button_color`, `created_at`, `updated_at`) VALUES
(1, '#111827', '#0F172A', '#2563EB', '2026-05-03 21:50:26', '2026-05-03 21:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'trialing',
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `billing_cycle` enum('monthly','yearly') NOT NULL DEFAULT 'monthly',
  `starts_at` timestamp NULL DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `organization_id`, `plan_id`, `status`, `price`, `billing_cycle`, `starts_at`, `trial_ends_at`, `ends_at`, `cancelled_at`, `created_at`, `updated_at`) VALUES
(26, 40, 1, 'trialing', 999.00, 'monthly', '2026-06-02 23:03:35', '2026-06-09 23:03:35', NULL, NULL, '2026-06-02 23:03:35', '2026-06-02 23:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_histories`
--

CREATE TABLE `subscription_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `event` varchar(255) NOT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_histories`
--

INSERT INTO `subscription_histories` (`id`, `subscription_id`, `event`, `metadata`, `created_at`, `updated_at`) VALUES
(26, 26, 'created', '\"{\\\"plan\\\":\\\"Basic\\\",\\\"trial_days\\\":7}\"', '2026-06-02 23:03:35', '2026-06-02 23:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `nid_number` varchar(17) DEFAULT NULL,
  `nid_upload` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `invoicing` int(11) NOT NULL DEFAULT 1 COMMENT '1-Automatic, 2-Manual',
  `invoice_month` int(11) NOT NULL DEFAULT 1 COMMENT '1-current, 0-previous',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `property_id`, `name`, `organization_id`, `phone`, `address`, `nid_number`, `nid_upload`, `status`, `invoicing`, `invoice_month`, `created_at`, `updated_at`) VALUES
(2, 2, 'Kamran', NULL, '01609758377', 'Mymensingh', '1234567896', NULL, 1, 0, 0, '2025-05-24 15:31:52', '2025-05-26 14:05:18'),
(3, 5, 'Jenna Sparks', NULL, '01763422670', 'Debitis voluptate ea', '64123355', NULL, 1, 1, 1, '2026-05-11 20:41:37', '2026-05-11 20:41:37'),
(7, 4, 'Majnu Khan', 16, '01930174751', 'Dasarta Shariatpur Dhaka Bangladesh', '12345678909', 'uploads/Q9VYdql0MJruxTKamjGmvEaDYFyjNv8qwUQPVoJH.png', 1, 1, 1, '2026-05-11 22:06:36', '2026-05-11 22:07:02'),
(10, 2, 'Ali Bin Siraj', 15, '01930174754', 'Dasarta Shariatpur Dhaka Bangladesh', '12345618901', 'uploads/V2d8eUbHo5deiMI5BqLkrXVd1Dn29vEdDltZSk6h.png', 1, 1, 0, '2026-05-11 22:19:14', '2026-05-21 00:08:13'),
(11, 6, 'Yeasmin Akter', 15, '01930174756', 'Dasarta Shariatpur Dhaka Bangladesh', '123456189872', 'uploads/Wzxx2psOvvf7Q6T2pri5eWdTfFPQwXFgFT8yNLBe.png', 1, 1, 1, '2026-05-11 22:21:14', '2026-05-11 22:21:14'),
(12, 7, 'Jismin AKter', 17, '01930174730', 'Dasarta Shariatpur Dhaka Bangladesh, Dasarta Shariatpur Dhaka Bangladesh', '12345678909', 'uploads/uDINqi08W5FmDHKMnGxsgIUCp0kXJZMTgpXc4Bnt.png', 1, 1, 1, '2026-05-13 17:03:19', '2026-05-13 18:23:02'),
(15, 10, 'Abdur Rahman', 11, '01712345678', '456 Lake Road, Dhaka', '1234567890', NULL, 1, 1, 1, '2026-06-02 05:11:50', '2026-06-02 05:11:50'),
(16, 9, 'Ibrahim Khan', 13, '01930174750', 'Dasarta Shariatpur Dhaka Bangladesh', '3123411234', NULL, 1, 0, 1, '2026-06-02 05:12:51', '2026-06-02 05:13:07'),
(19, 12, 'Ibrahim Khan', 40, '01930174755', 'Dasarta Shariatpur Dhaka Bangladesh', '2123411230', 'uploads/JJ9qEPd1imEmtuu6BFFhWPOCDFBgFf9EEPFu8TcN.png', 1, 1, 1, '2026-06-02 23:27:19', '2026-06-02 23:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `tenantservices`
--

CREATE TABLE `tenantservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenantservices`
--

INSERT INTO `tenantservices` (`id`, `tenant_id`, `service_id`, `start_date`, `end_date`, `status`, `value`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL, 1, 1000, '2025-05-24 16:01:11', '2025-05-24 16:01:11'),
(3, 2, 3, NULL, NULL, 1, 20000, '2025-05-24 16:05:41', '2025-05-24 16:05:41'),
(4, 2, 4, NULL, NULL, 1, 500, '2025-05-24 16:06:29', '2025-05-24 16:06:29'),
(5, 6, 3, NULL, NULL, 1, 2000, '2026-05-11 21:40:19', '2026-05-11 21:40:19'),
(7, 6, 2, NULL, NULL, 1, 5000, '2026-05-11 21:45:13', '2026-05-11 21:45:13'),
(8, 11, 3, NULL, NULL, 1, 3000, '2026-05-11 22:23:13', '2026-05-11 22:23:13'),
(9, 10, 3, NULL, NULL, 1, 3000, '2026-05-11 22:24:16', '2026-05-11 22:24:16'),
(10, 12, 20, NULL, NULL, 1, 2500, '2026-05-13 17:08:06', '2026-05-13 17:08:06'),
(11, 16, 22, NULL, NULL, 1, 3333, '2026-06-02 05:13:27', '2026-06-02 05:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `organization_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kamran Khan', 'mdkamranhosan98@gmail.com', NULL, '$2y$10$RqzKCAU8EjQga7XcATE4ZeLFr8Gv2Yc/650JTMDLh1GycxNb9mC6y', 11, NULL, '2026-05-10 22:50:34', '2026-06-01 04:56:10'),
(15, 'Billal', 'billal@gmail.com', NULL, '$2y$10$ZaoTc7pMoXV8FII4iuCGaeHlF2lcBV.KEBzrirNGl/2lV0PRQdxB.', 12, NULL, '2026-05-11 18:06:23', '2026-05-21 00:47:00'),
(16, 'Younus Shikh', 'younusshikh@gmail.com', NULL, '$2y$10$rhpBtlrwMGOO6mBikWx9ue1hgM1R0jUiqsao0d51ISOmhaXE.2PhW', 13, NULL, '2026-05-11 18:11:41', '2026-05-11 18:11:41'),
(49, 'Mujibur Sheikh', 'mujibursheikh360@gmail.com', NULL, '$2y$10$.NFoC0FUg7ueyJNZR.aGxuvsf/swcEvWGurSE58i7zXQ7dN0ukNPa', 40, NULL, '2026-06-02 22:54:43', '2026-06-02 22:54:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costdetails`
--
ALTER TABLE `costdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_index` (`user_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_slug_unique` (`slug`),
  ADD KEY `organizations_role_id_foreign` (`role_id`);

--
-- Indexes for table `organization_users`
--
ALTER TABLE `organization_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_organization_id_foreign` (`organization_id`),
  ADD KEY `subscriptions_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_histories_subscription_id_foreign` (`subscription_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_phone_unique` (`phone`);

--
-- Indexes for table `tenantservices`
--
ALTER TABLE `tenantservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costdetails`
--
ALTER TABLE `costdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `organization_users`
--
ALTER TABLE `organization_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tenantservices`
--
ALTER TABLE `tenantservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  ADD CONSTRAINT `subscription_histories_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
