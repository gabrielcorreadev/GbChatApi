-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jan-2022 às 19:56
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gb_chat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `blocked_users`
--

CREATE TABLE `blocked_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blocked_by` bigint(20) UNSIGNED NOT NULL,
  `blocked_to` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `devices`
--

INSERT INTO `devices` (`id`, `name`, `access_token_id`, `visitor`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Google Chrome Windows', 'c1b9f0b45b8674357fc73c57ba15a9bf930d90f5273f126d2413f5390f7c1c56a5ed61907c7109da', NULL, '-21.810067594662613', '-48.144927583475216', '2021-11-15 20:27:21', '2021-11-15 20:27:21'),
(2, 'Google Chrome Windows', 'f13aa01346685be0021c122aba0a42628e5a22d87d01c464c3bc1d74560989cde682a8c37535afc5', NULL, '-21.810067594662613', '-48.144927583475216', '2021-11-15 22:09:12', '2021-11-15 22:09:12'),
(3, 'Google Chrome Windows', '6c686e5c210d836d1c13ec3bdff8a0c43a62fb88010c4b2dcf9a9b28a9f5b7b31c184bcf66100796', NULL, '-21.810067594662613', '-48.144927583475216', '2021-11-15 22:21:51', '2021-11-15 22:21:51'),
(4, 'Google Chrome Windows', 'c804853424b811c0d4ae77933b5fe6ed0c555054dab718ed74fa45e5c355a2ca9e3cc493e1db1fb5', NULL, '-21.810067594662613', '-48.144927583475216', '2021-11-16 03:24:40', '2021-11-16 03:24:40'),
(8, 'android - sdk_gphone_x86', '7f159c2ef4aae393b53cb9c84dbae11ca3e81bc52dd7dc3b982c5f313c86880093c90cc778c80ee6', NULL, '37.4219023', '-122.0839984', '2021-11-19 02:47:07', '2021-11-19 02:47:07'),
(11, 'Google Chrome - Windows', 'e70c85a484fb7edb5a48e511546ce44443fd69e2dc00cfb694d8753b6a6216409d77c97699452748', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-02 03:50:35', '2021-12-02 03:50:35'),
(12, 'android - Android SDK built for x86', 'c7f26988cfc6f219b564c33aa380a1babc72267abe2d792186706d5ba7360df5a9356d409db902b1', NULL, '37.4219983', '-122.084', '2021-12-02 04:17:10', '2021-12-02 04:17:10'),
(13, 'Google Chrome - Windows', 'dc4e915bee6aac818b913901ca39e1c0f573e375b2c293dfe9d0ba34ffa23c185c15c46caf169f5c', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 19:16:48', '2021-12-05 19:16:48'),
(14, 'Google Chrome - Windows', '87e6155e9b6a25508ad36e628973b866f7967783b49281933d4eee43137eb3146a1ce8d210013014', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 19:23:55', '2021-12-05 19:23:55'),
(15, 'Google Chrome - Windows', 'ac841ba3d263ca0207b54c7b4bd65a4b707c5c3649bd32387b5eba5479d0d1f767352c710c2df8d0', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 19:24:23', '2021-12-05 19:24:23'),
(16, 'Google Chrome - Windows', 'c9414ab6ee65df04695766235489bb9e2ab96747b59ebb893211dfbc39bcb9c442a0b85384f40c01', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 19:26:22', '2021-12-05 19:26:22'),
(17, 'Google Chrome - Windows', '940653ad9da6b34749ec822edd7d715ac33c1f443edca35308ed05893c9df0e469377379fa04191f', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 19:26:33', '2021-12-05 19:26:33'),
(18, 'Google Chrome - Windows', 'b11e33fbb0e2d6ef385b7a82bb04e926bca62a2d712228da305aceea8b66d77b2223242d29722e53', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 19:43:37', '2021-12-05 19:43:37'),
(19, 'Google Chrome - Windows', '3961dc57ff1b36ee0e41a500a4aa354ed4e6ec1068a30098b4f9d472fec83ed83d5af5f01d87116b', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:06:07', '2021-12-05 20:06:07'),
(20, 'Google Chrome - Windows', '809edd85a57891610d513e8a23ab9967f1c4311591219a4d4287411f51b67e72b9d58ccb01d06304', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:12:04', '2021-12-05 20:12:04'),
(21, 'Google Chrome - Windows', 'b0099e5adac15497969661d39c5525ea4c9f7e7554590eb9f7afd660dd4deaf4eb67c5f6ae1ddecc', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:13:40', '2021-12-05 20:13:40'),
(22, 'Google Chrome - Windows', '0e9f2ce478476176d507c7a62fa67549e9af223ca8eb8ace7c1bd8197846cdb0aa37557cd021d8c6', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:14:19', '2021-12-05 20:14:19'),
(23, 'Google Chrome - Windows', 'dc67db7dbc4c02b5f2097c45d90916f406806344252d1d15ba82bd574c79ea4836155e20209db92c', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:16:49', '2021-12-05 20:16:49'),
(24, 'Google Chrome - Windows', '01dbc89b2b21d8f82f29c4c5d6650fb2dd2c8455db90af048d8bbb5ec9a49aaedbb2d8feccca4719', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:23:25', '2021-12-05 20:23:25'),
(25, 'Google Chrome - Windows', 'de6d24841340cf3d9375fccb9ba0e477805969cc7977877c8d2cc7fb05929e1bc3423997a9b93b8e', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:25:46', '2021-12-05 20:25:46'),
(26, 'Google Chrome - Windows', '422a496dc5c6c550cdd779c04ccdc417ae2ab6f6ad824e0ff597fa337178f6153374fdea0a61858d', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:28:24', '2021-12-05 20:28:24'),
(27, 'Google Chrome - Windows', 'c3cf84df5cf1c14dcc5de737b2b595a68217c588a97fff660b25babdc3f893e7e05bd916e93e78ea', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:50:04', '2021-12-05 20:50:04'),
(28, 'Google Chrome - Windows', '7af6c35fa3c16ceb45e27db3dacf16b65f1d5e489f90cbe66f34148e9dfadf0bd3a95914836fb4b4', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-05 20:57:50', '2021-12-05 20:57:50'),
(29, 'Google Chrome - Windows', '63c2cce15af607784455f8596331a44ce4a2a5a58fa2e1e39381f471c3ebf6c9162440f8af4f921d', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-10 03:33:16', '2021-12-10 03:33:16'),
(30, 'Google Chrome - Windows', '1c496a98a2d48033d0c534fde1a910f126ca3f9824150af0133df5a685a9ad3c5221be86fdf2f47e', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-13 02:45:15', '2021-12-13 02:45:15'),
(31, 'Google Chrome - Windows', '3a935949965dba89094d0227b4923709cf2033506341235be66cc2864d851d2bdffc356efb08f0b5', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-13 02:55:10', '2021-12-13 02:55:10'),
(32, 'Google Chrome Windows', '95240f979dbe5dc579098f32f7f145fd393eef0fd64fca3d9b658eacc4b4c82383b957a9b31142ff', NULL, '-21.810067594662613', '-48.144927583475216', '2021-12-13 03:03:37', '2021-12-13 03:03:37'),
(33, 'Google Chrome - Windows', 'f865180fa89823139fb7defef3bf77473056d0fe8fb29ba6f7ffe715d0ca152f37932c7a52a047b7', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-13 03:40:30', '2021-12-13 03:40:30'),
(34, 'Google Chrome - Windows', 'a3a888ef4fcd28692910a2247479f2c75450f1f9b15c37fb4b879d86e3c7d552bff1fa6b4eab9abb', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-21 03:07:22', '2021-12-21 03:07:22'),
(35, 'Google Chrome - Windows', '50b41f2434a955c274414cecd7eec3999341f5d39b1a16e3937a518fcbe2d83415ffdc5f15e449e8', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-22 04:42:39', '2021-12-22 04:42:39'),
(36, 'Google Chrome - Windows', '8909e0f053f2e716fc354e639bdcd9892b9fc9b73af5e216db3eb57c8a9e1eb45e0407a451ba0898', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-23 00:59:39', '2021-12-23 00:59:39'),
(37, 'Google Chrome - Windows', '80d046866be62cb0298de089e0b39859ce571bfb1c95b410f6540d236da413798aacf2d69b8d3321', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-23 16:14:13', '2021-12-23 16:14:13'),
(38, 'Google Chrome Windows', 'e847732e604d3aecc21e0f52134969b445eab21d154263beeabf0f7155e171c0a7e6c5e763929b98', NULL, '-21.810067594662613', '-48.144927583475216', '2021-12-23 16:22:07', '2021-12-23 16:22:07'),
(39, 'Google Chrome - Windows', 'cc07ba077ac49aaf92c208715ce6f5c10562195ddf17a5cc3098cd7d7c1bca5d5aa69c94d62438cf', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-23 16:23:55', '2021-12-23 16:23:55'),
(40, 'Google Chrome - Windows', 'b5d73c59101aa39c2bb6707a7a851a0164a85d6f8b9ceba5fe4ebc4478acef8391a8cead69ef96fa', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-23 16:25:47', '2021-12-23 16:25:47'),
(41, 'Google Chrome - Windows', 'd451c5b343f16c08f5fb5de7c8ef8b55d4fc59019bc0c7bf01f4efb161353b0af97c34eb529a71ba', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-28 20:43:30', '2021-12-28 20:43:30'),
(42, 'Google Chrome - Windows', 'ad7c9bcd1c3166aca6e3d15ca79e5ab327dfc908e540ca160d9c3557d3d97fcc5671bdd150471f44', NULL, '-21.81449262950975', '-48.134661903013885', '2021-12-31 14:28:12', '2021-12-31 14:28:12'),
(43, 'Google Chrome - Windows', '3e22c9dcb56c34503b606c3fd9cad13d7ce5aca196a190aac7deb4bd679980a3b37c9e6f6a90a122', NULL, '-21.81449262950975', '-48.134661903013885', '2022-01-04 02:38:19', '2022-01-04 02:38:19'),
(44, 'android - sdk_gphone_x86', '2c9ac41dce9316669331538366d5f71b6962599dccd154706af38d4f5ebbec87d605a0cc8799e070', NULL, '-21.79512', '-48.143325', '2022-01-05 03:13:43', '2022-01-05 03:13:43'),
(45, 'Google Chrome - Windows', '4ca938cd2933db1917500d8cb8ac426373776da930bc1af3492855c7a3f706827629579078d9e861', NULL, '-21.81449262950975', '-48.134661903013885', '2022-01-05 03:50:23', '2022-01-05 03:50:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `leader_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for not following,1 for following',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for unread,1 for seen',
  `message_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0- text message, 1- image, 2- pdf, 3- doc, 4- voice',
  `file_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_07_26_000001_create_devices_table', 1),
(10, '2021_09_28_225922_create_photos_table', 1),
(11, '2021_10_24_184815_create_messages_table', 1),
(12, '2021_10_24_191150_create_blocked_users_table', 1),
(13, '2021_10_24_194854_create_followers_table', 1),
(14, '2021_10_26_233451_add_phone_to_users', 1),
(15, '2021_10_26_233709_add_lat_to_users', 1),
(16, '2021_10_26_233903_add_lng_to_users', 1),
(17, '2021_10_27_002025_add_photo_to_users', 1),
(18, '2021_10_29_130050_rename_lat_column', 1),
(19, '2021_10_29_131126_rename_lng_column', 1),
(20, '2021_10_29_132132_update_users_table', 1),
(21, '2021_10_31_145959_update_devices_table', 1),
(22, '2021_10_31_150244_update_devices_location_type_table', 1),
(23, '0000_00_00_000000_create_websockets_statistics_entries_table', 2),
(24, '2021_11_22_005634_update_messages_table', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01dbc89b2b21d8f82f29c4c5d6650fb2dd2c8455db90af048d8bbb5ec9a49aaedbb2d8feccca4719', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:23:25', '2021-12-05 20:23:25', '2022-12-05 17:23:25'),
('0e9f2ce478476176d507c7a62fa67549e9af223ca8eb8ace7c1bd8197846cdb0aa37557cd021d8c6', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:14:19', '2021-12-05 20:14:19', '2022-12-05 17:14:19'),
('1c496a98a2d48033d0c534fde1a910f126ca3f9824150af0133df5a685a9ad3c5221be86fdf2f47e', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-13 02:45:15', '2021-12-13 02:45:15', '2022-12-12 23:45:15'),
('2c9ac41dce9316669331538366d5f71b6962599dccd154706af38d4f5ebbec87d605a0cc8799e070', 10, 1, 'android - sdk_gphone_x86', '[]', 0, '2022-01-05 03:13:43', '2022-01-05 03:13:43', '2023-01-05 00:13:43'),
('3961dc57ff1b36ee0e41a500a4aa354ed4e6ec1068a30098b4f9d472fec83ed83d5af5f01d87116b', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:06:07', '2021-12-05 20:06:07', '2022-12-05 17:06:07'),
('3a935949965dba89094d0227b4923709cf2033506341235be66cc2864d851d2bdffc356efb08f0b5', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-13 02:55:10', '2021-12-13 02:55:10', '2022-12-12 23:55:10'),
('3e22c9dcb56c34503b606c3fd9cad13d7ce5aca196a190aac7deb4bd679980a3b37c9e6f6a90a122', 7, 1, 'Google Chrome - Windows', '[]', 0, '2022-01-04 02:38:19', '2022-01-04 02:38:19', '2023-01-03 23:38:19'),
('422a496dc5c6c550cdd779c04ccdc417ae2ab6f6ad824e0ff597fa337178f6153374fdea0a61858d', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:28:24', '2021-12-05 20:28:24', '2022-12-05 17:28:24'),
('4ca938cd2933db1917500d8cb8ac426373776da930bc1af3492855c7a3f706827629579078d9e861', 7, 1, 'Google Chrome - Windows', '[]', 0, '2022-01-05 03:50:23', '2022-01-05 03:50:23', '2023-01-05 00:50:23'),
('50b41f2434a955c274414cecd7eec3999341f5d39b1a16e3937a518fcbe2d83415ffdc5f15e449e8', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-22 04:42:39', '2021-12-22 04:42:39', '2022-12-22 01:42:39'),
('63c2cce15af607784455f8596331a44ce4a2a5a58fa2e1e39381f471c3ebf6c9162440f8af4f921d', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-10 03:33:16', '2021-12-10 03:33:16', '2022-12-10 00:33:16'),
('6c686e5c210d836d1c13ec3bdff8a0c43a62fb88010c4b2dcf9a9b28a9f5b7b31c184bcf66100796', 4, 1, 'Google Chrome Windows', '[]', 0, '2021-11-15 22:21:51', '2021-11-15 22:21:51', '2022-11-15 19:21:51'),
('7af6c35fa3c16ceb45e27db3dacf16b65f1d5e489f90cbe66f34148e9dfadf0bd3a95914836fb4b4', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:57:50', '2021-12-05 20:57:50', '2022-12-05 17:57:50'),
('7f159c2ef4aae393b53cb9c84dbae11ca3e81bc52dd7dc3b982c5f313c86880093c90cc778c80ee6', 5, 1, 'android - sdk_gphone_x86', '[]', 0, '2021-11-19 02:47:07', '2021-11-19 02:47:07', '2022-11-18 23:47:07'),
('809edd85a57891610d513e8a23ab9967f1c4311591219a4d4287411f51b67e72b9d58ccb01d06304', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:12:04', '2021-12-05 20:12:04', '2022-12-05 17:12:04'),
('80d046866be62cb0298de089e0b39859ce571bfb1c95b410f6540d236da413798aacf2d69b8d3321', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-23 16:14:13', '2021-12-23 16:14:13', '2022-12-23 13:14:13'),
('87e6155e9b6a25508ad36e628973b866f7967783b49281933d4eee43137eb3146a1ce8d210013014', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 19:23:55', '2021-12-05 19:23:55', '2022-12-05 16:23:55'),
('8909e0f053f2e716fc354e639bdcd9892b9fc9b73af5e216db3eb57c8a9e1eb45e0407a451ba0898', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-23 00:59:39', '2021-12-23 00:59:39', '2022-12-22 21:59:39'),
('940653ad9da6b34749ec822edd7d715ac33c1f443edca35308ed05893c9df0e469377379fa04191f', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 19:26:33', '2021-12-05 19:26:33', '2022-12-05 16:26:33'),
('95240f979dbe5dc579098f32f7f145fd393eef0fd64fca3d9b658eacc4b4c82383b957a9b31142ff', 8, 1, 'Google Chrome Windows', '[]', 0, '2021-12-13 03:03:37', '2021-12-13 03:03:37', '2022-12-13 00:03:37'),
('a3a888ef4fcd28692910a2247479f2c75450f1f9b15c37fb4b879d86e3c7d552bff1fa6b4eab9abb', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-21 03:07:21', '2021-12-21 03:07:21', '2022-12-21 00:07:21'),
('ac841ba3d263ca0207b54c7b4bd65a4b707c5c3649bd32387b5eba5479d0d1f767352c710c2df8d0', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 19:24:23', '2021-12-05 19:24:23', '2022-12-05 16:24:23'),
('ad7c9bcd1c3166aca6e3d15ca79e5ab327dfc908e540ca160d9c3557d3d97fcc5671bdd150471f44', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-31 14:28:12', '2021-12-31 14:28:12', '2022-12-31 11:28:12'),
('b0099e5adac15497969661d39c5525ea4c9f7e7554590eb9f7afd660dd4deaf4eb67c5f6ae1ddecc', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:13:39', '2021-12-05 20:13:39', '2022-12-05 17:13:39'),
('b11e33fbb0e2d6ef385b7a82bb04e926bca62a2d712228da305aceea8b66d77b2223242d29722e53', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 19:43:37', '2021-12-05 19:43:37', '2022-12-05 16:43:37'),
('b5d73c59101aa39c2bb6707a7a851a0164a85d6f8b9ceba5fe4ebc4478acef8391a8cead69ef96fa', 10, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-23 16:25:47', '2021-12-23 16:25:47', '2022-12-23 13:25:47'),
('c1b9f0b45b8674357fc73c57ba15a9bf930d90f5273f126d2413f5390f7c1c56a5ed61907c7109da', 2, 1, 'Google Chrome Windows', '[]', 0, '2021-11-15 20:27:21', '2021-11-15 20:27:21', '2022-11-15 17:27:21'),
('c3cf84df5cf1c14dcc5de737b2b595a68217c588a97fff660b25babdc3f893e7e05bd916e93e78ea', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:50:04', '2021-12-05 20:50:04', '2022-12-05 17:50:04'),
('c7f26988cfc6f219b564c33aa380a1babc72267abe2d792186706d5ba7360df5a9356d409db902b1', 7, 1, 'android - Android SDK built for x86', '[]', 0, '2021-12-02 04:17:10', '2021-12-02 04:17:10', '2022-12-02 01:17:10'),
('c804853424b811c0d4ae77933b5fe6ed0c555054dab718ed74fa45e5c355a2ca9e3cc493e1db1fb5', 5, 1, 'Google Chrome Windows', '[]', 0, '2021-11-16 03:24:40', '2021-11-16 03:24:40', '2022-11-16 00:24:40'),
('c9414ab6ee65df04695766235489bb9e2ab96747b59ebb893211dfbc39bcb9c442a0b85384f40c01', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 19:26:22', '2021-12-05 19:26:22', '2022-12-05 16:26:22'),
('cc07ba077ac49aaf92c208715ce6f5c10562195ddf17a5cc3098cd7d7c1bca5d5aa69c94d62438cf', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-23 16:23:55', '2021-12-23 16:23:55', '2022-12-23 13:23:55'),
('d451c5b343f16c08f5fb5de7c8ef8b55d4fc59019bc0c7bf01f4efb161353b0af97c34eb529a71ba', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-28 20:43:30', '2021-12-28 20:43:30', '2022-12-28 17:43:30'),
('dc4e915bee6aac818b913901ca39e1c0f573e375b2c293dfe9d0ba34ffa23c185c15c46caf169f5c', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 19:16:47', '2021-12-05 19:16:47', '2022-12-05 16:16:47'),
('dc67db7dbc4c02b5f2097c45d90916f406806344252d1d15ba82bd574c79ea4836155e20209db92c', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:16:49', '2021-12-05 20:16:49', '2022-12-05 17:16:49'),
('de6d24841340cf3d9375fccb9ba0e477805969cc7977877c8d2cc7fb05929e1bc3423997a9b93b8e', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-05 20:25:46', '2021-12-05 20:25:46', '2022-12-05 17:25:46'),
('e70c85a484fb7edb5a48e511546ce44443fd69e2dc00cfb694d8753b6a6216409d77c97699452748', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-02 03:50:35', '2021-12-02 03:50:35', '2022-12-02 00:50:35'),
('e847732e604d3aecc21e0f52134969b445eab21d154263beeabf0f7155e171c0a7e6c5e763929b98', 10, 1, 'Google Chrome Windows', '[]', 0, '2021-12-23 16:22:07', '2021-12-23 16:22:07', '2022-12-23 13:22:07'),
('f13aa01346685be0021c122aba0a42628e5a22d87d01c464c3bc1d74560989cde682a8c37535afc5', 3, 1, 'Google Chrome Windows', '[]', 0, '2021-11-15 22:09:12', '2021-11-15 22:09:12', '2022-11-15 19:09:12'),
('f865180fa89823139fb7defef3bf77473056d0fe8fb29ba6f7ffe715d0ca152f37932c7a52a047b7', 7, 1, 'Google Chrome - Windows', '[]', 0, '2021-12-13 03:40:30', '2021-12-13 03:40:30', '2022-12-13 00:40:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'GbChat Personal Access Client', 'cytjL9bqXFUNFZFczzd7huxci3Q71ff2Earmfezu', NULL, 'http://localhost', 1, 0, 0, '2021-11-15 20:26:03', '2021-11-15 20:26:03'),
(2, NULL, 'GbChat Password Grant Client', 'CZQ2owaiPGl7M2uLpMUnhmteIGslOA5whgg7cjLs', 'users', 'http://localhost', 0, 1, 0, '2021-11-15 20:26:03', '2021-11-15 20:26:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-15 20:26:03', '2021-11-15 20:26:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `photo_url`, `latitude`, `longitude`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Gabriel Correa', 'gabriel_joze@hotmail.com', '2021-11-19 02:31:34', '$2y$10$p.cMYrHGvmhcML9w.bZuXOeYn799Jh1yalSOyufEtB8r3e79/Yzya', NULL, NULL, '-21.81449262950975', '-48.134661903013885', NULL, '2021-11-19 02:30:27', '2022-01-05 03:50:23'),
(10, 'Laura Sophia', 'laurasophiag77@gmail.com', '2021-12-23 16:22:56', '$2y$10$5QQ7mQU4PLPA4FyjUbY00u7yrQQDQ6OgfdUOcOA8XaaXNmdTFblYW', NULL, NULL, '-21.79512', '-48.143325', NULL, '2021-12-23 16:22:06', '2022-01-05 03:13:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocked_users_blocked_by_foreign` (`blocked_by`),
  ADD KEY `blocked_users_blocked_to_foreign` (`blocked_to`);

--
-- Índices para tabela `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devices_access_token_id_index` (`access_token_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_follower_id_foreign` (`follower_id`),
  ADD KEY `followers_leader_id_foreign` (`leader_id`);

--
-- Índices para tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_from_id_foreign` (`from_id`),
  ADD KEY `messages_to_id_foreign` (`to_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Índices para tabela `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Índices para tabela `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Índices para tabela `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `blocked_users`
--
ALTER TABLE `blocked_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD CONSTRAINT `blocked_users_blocked_by_foreign` FOREIGN KEY (`blocked_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blocked_users_blocked_to_foreign` FOREIGN KEY (`blocked_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_access_token_id_foreign` FOREIGN KEY (`access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followers_leader_id_foreign` FOREIGN KEY (`leader_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
