-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 10 2022 г., 11:19
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `turnir`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int UNSIGNED NOT NULL,
  `fio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `fio`, `phone`, `email`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, '+996708715281', 'aidar300799@gmail.com', 'werwerwer', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `help`
--

CREATE TABLE `help` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `help`
--

INSERT INTO `help` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sadsad7', 'asdasdasdasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_11_09_065656_user_table', 1),
(5, '2021_11_13_072503_users_profile2', 2),
(6, '2021_11_16_123527_admin_users', 3),
(7, '2021_11_20_071852_create_permission_tables', 4),
(8, '2021_11_27_091503_team', 5),
(9, '2021_11_27_123328_teams_members', 6),
(10, '2021_12_07_093441_tournament', 7),
(11, '2021_12_10_124641_tournament_teams', 8),
(12, '2021_12_15_080556_help', 9),
(13, '2022_01_04_135333_feedback', 10),
(14, '2022_01_06_133328_test', 11),
(15, '2022_01_07_075237_tournament_team', 12),
(16, '2022_01_07_114341_stage_2', 13),
(17, '2022_01_08_062352_stage_3', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 206);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2021-11-20 01:22:44', '2021-11-20 01:22:44'),
(2, 'admin', 'web', '2021-11-20 01:23:12', '2021-11-20 01:23:12'),
(3, 'moderator', 'web', '2021-12-12 05:49:52', '2021-12-12 05:49:52');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `stage_1`
--

CREATE TABLE `stage_1` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stage_1`
--

INSERT INTO `stage_1` (`id`, `tournament_id`, `team_id`, `status`, `group_id`, `points`, `winner`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, '21', 1, NULL, NULL),
(2, 1, 2, NULL, 1, '14', NULL, NULL, NULL),
(3, 1, 4, NULL, 2, '22', 1, NULL, NULL),
(4, 1, 3, NULL, 2, '1', NULL, NULL, NULL),
(5, 1, 6, NULL, 3, '12', NULL, NULL, NULL),
(6, 1, 5, NULL, 3, '33', 1, NULL, NULL),
(7, 1, 7, NULL, 4, '44', 1, NULL, NULL),
(8, 1, 8, NULL, 4, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `stage_2`
--

CREATE TABLE `stage_2` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stage_2`
--

INSERT INTO `stage_2` (`id`, `tournament_id`, `team_id`, `status`, `group_id`, `points`, `winner`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 14, 1, NULL, NULL),
(2, 1, 4, NULL, NULL, 12, NULL, NULL, NULL),
(3, 1, 5, NULL, NULL, 44, 1, NULL, NULL),
(4, 1, 7, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `stage_3`
--

CREATE TABLE `stage_3` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stage_3`
--

INSERT INTO `stage_3` (`id`, `tournament_id`, `team_id`, `status`, `points`, `winner`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, NULL),
(2, 1, 5, NULL, 12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` int UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `user_id`, `user_name`, `name`, `role`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 'Команда 1', 'captain', NULL, NULL),
(2, '2', NULL, 'Команда 2', 'captain', NULL, NULL),
(3, '3', NULL, 'Команда 3', 'captain', NULL, NULL),
(4, '4', NULL, 'Команда 4', 'captain', NULL, NULL),
(5, '5', NULL, 'Команда 5', 'captain', NULL, NULL),
(6, '6', NULL, 'Команда 6', 'captain', NULL, NULL),
(7, '7', NULL, 'Команда 7', 'captain', NULL, NULL),
(8, '8', NULL, 'Команда 8', 'captain', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `team_members`
--

CREATE TABLE `team_members` (
  `id` int UNSIGNED NOT NULL,
  `team_id` int NOT NULL,
  `user_id` int NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `team_members`
--

INSERT INTO `team_members` (`id`, `team_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'captain', NULL, NULL),
(2, 2, 2, 'captain', NULL, NULL),
(3, 3, 3, 'captain', NULL, NULL),
(4, 4, 4, 'captain', NULL, NULL),
(5, 5, 5, 'captain', NULL, NULL),
(6, 6, 6, 'captain', NULL, NULL),
(7, 7, 7, 'captain', NULL, NULL),
(8, 8, 8, 'captain', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournament_start` date DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `games_time` time DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `players_col` int DEFAULT NULL,
  `file_label` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_reg` date DEFAULT NULL,
  `slot_kolvo` int DEFAULT NULL,
  `end_reg` date DEFAULT NULL,
  `ligue` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rule` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `layouts` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_t` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_t` time DEFAULT NULL,
  `file_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `tournament_start`, `country`, `countries`, `format`, `games_time`, `timezone`, `players_col`, `file_label`, `description`, `start_reg`, `slot_kolvo`, `end_reg`, `ligue`, `rule`, `layouts`, `header`, `description2`, `date_t`, `time_t`, `file_2`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Турнир 1', '2022-01-09', 'Киргизия', 'Киргизия', '-', '18:57:00', '(GMT-11:00) Midway Island', NULL, 'screenshot.png', 'asdsadasdasd', '2022-01-05', 32, '2022-01-08', '2', '1) без матов 2) че то там 3) еще че то там', NULL, 'ну не знаю', NULL, NULL, NULL, NULL, '100$', 'save', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tournamets_team`
--

CREATE TABLE `tournamets_team` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournamets_team`
--

INSERT INTO `tournamets_team` (`id`, `tournament_id`, `team_id`, `status`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'accepted', 1, NULL, NULL),
(2, 1, 2, 'accepted', 1, NULL, NULL),
(3, 1, 4, 'accepted', 2, NULL, NULL),
(4, 1, 3, 'accepted', 2, NULL, NULL),
(6, 1, 6, 'accepted', 3, NULL, NULL),
(7, 1, 5, 'accepted', 3, NULL, NULL),
(8, 1, 7, 'accepted', 4, NULL, NULL),
(9, 1, 8, 'accepted', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$Fp2RmcyzxonHXzXI2E5eouGPXbIQuIgbpl7cJVOOiPyZ/jvoVTO3q', NULL, NULL, '2022-01-06 00:09:02', '2022-01-06 00:09:02'),
(2, 'test@gmail.com', '$2y$10$3hybGEgmt9IwL.7Xbrb/KO5MAKaySQ0clMqockzyjOtVkE.qifNk6', NULL, NULL, '2022-01-06 01:10:08', '2022-01-06 01:10:08'),
(3, 'test2@gmail.com', '$2y$10$bCe5Gh4HLDzdlmijkUz9GuvTBHgZOSLx66aIEt5Efnjwc6Jl7uB8i', NULL, NULL, '2022-01-06 07:06:27', '2022-01-06 07:06:27'),
(4, 'test3@gmail.com', '$2y$10$HkOrdUxwBwFLYK2eNoQeSOm3EYmX320nUDYUIHDze1bZ0YfD1agXC', NULL, NULL, '2022-01-06 07:11:49', '2022-01-06 07:11:49'),
(5, 'test5@gmail.com', '$2y$10$KpwCYMdM8T5CiNPr7Rnv2uAFZqIdkhMD1cnWP73ZS0Fo/3IWSYaiW', NULL, NULL, '2022-01-07 06:48:49', '2022-01-07 06:48:49'),
(6, 'test6@gmail.com', '$2y$10$yZEyzOllkh8.avSin9PrG.1HPpeLqc4/3hDHpT9ZnbfBXMT.vRrlu', NULL, NULL, '2022-01-07 06:51:43', '2022-01-07 06:51:43'),
(7, 'test7@gmail.com', '$2y$10$x5XubV3Ek.eiG4Ffv3MzB.bIPMh2rt7hEIbTHEpu/fUIOrEsGIzM6', NULL, NULL, '2022-01-07 07:03:39', '2022-01-07 07:03:39'),
(8, 'test8@gmail.com', '$2y$10$vd5FhCUDliyVIRchsbSNJe12rqc9o7pEKOEOTwoQthSBDnEjWayuq', NULL, NULL, '2022-01-07 07:05:10', '2022-01-07 07:05:10');

-- --------------------------------------------------------

--
-- Структура таблицы `users_profile2`
--

CREATE TABLE `users_profile2` (
  `id` int UNSIGNED NOT NULL,
  `doc_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_photo2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bdate` date NOT NULL,
  `nickname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_profile2`
--

INSERT INTO `users_profile2` (`id`, `doc_photo`, `doc_photo2`, `phone`, `fio`, `login`, `email`, `country`, `timezone`, `city`, `bdate`, `nickname`, `game_id`, `verification`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Снимок экрана (1).png', 'Снимок экрана (1).png', '+996708715281', 'Admin', 'Admin', 'admin@gmail.com', 'Киргизия', '(GMT-09:00) Alaska', 'Бишкек', '2022-01-06', 'admin', '1244351', 'verified', 1, NULL, NULL),
(14, 'Снимок экрана (1).png', 'Снимок экрана (3).png', '5544546456', 'Test 1', 'Test 1', 'test@gmail.com', 'Кыргызстан', '(GMT-10:00) Hawaii', 'Бишкек', '2022-01-06', 'test 1', '1244351', 'verified', 2, NULL, NULL),
(15, 'screenshot.png', 'Снимок экрана (1).png', '5544546456', 'Test 2', 'Test 2', 'test2@gmail.com', 'Кыргызстан', '(GMT-10:00) Hawaii', 'Бишкек', '2022-01-06', 'test 2', '1244351', 'verified', 3, NULL, NULL),
(16, 'screenshot.png', 'Снимок экрана (1).png', '5544546456', 'asdsdas', 'Test 4', 'test4@gmail.com', 'Кыргызстан', '(GMT-11:00) Midway Island', 'Бишкек', '2022-01-06', 'test 4', '1244351', 'verified', 4, NULL, NULL),
(17, 'Снимок экрана (1).png', 'Снимок экрана (1).png', '5544546456', 'test 56', 'test 5', 'test5@gmail.com', 'Кыргызстан', '(GMT-11:00) Midway Island', 'Бишкек', '2022-01-07', 'test 6', '1244351', 'verified', 5, NULL, NULL),
(18, 'Снимок экрана (1).png', 'screenshot.png', '5544546456', 'asdsdas', 'aaaaaaa', 'test6@gmail.com', 'Кыргызстан', '(GMT-11:00) Midway Island', 'Бишкек', '2021-12-30', 'test 4', '1244351', 'verified', 6, NULL, NULL),
(19, 'screenshot.png', 'Снимок экрана (1).png', '5544546456', 'asdsdas', 'aaaaaaa', 'test7@gmail.com', 'Кыргызстан', '(GMT-08:00) Tijuana', 'Бишкек', '2022-01-07', 'aidar', '1244351', 'verified', 7, NULL, NULL),
(20, 'screenshot.png', 'Снимок экрана (1).png', '5544546456', 'Айдар', 'aaaaaaa', 'test8@gmail.com', 'Кыргызстан', '(GMT-07:00) Arizona', 'Бишкек', '2022-01-07', 'aidar', '1244351', 'verified', 8, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `stage_1`
--
ALTER TABLE `stage_1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stage_2`
--
ALTER TABLE `stage_2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stage_3`
--
ALTER TABLE `stage_3`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `tournamets_team`
--
ALTER TABLE `tournamets_team`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_profile2`
--
ALTER TABLE `users_profile2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `help`
--
ALTER TABLE `help`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `stage_1`
--
ALTER TABLE `stage_1`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `stage_2`
--
ALTER TABLE `stage_2`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `stage_3`
--
ALTER TABLE `stage_3`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tournamets_team`
--
ALTER TABLE `tournamets_team`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users_profile2`
--
ALTER TABLE `users_profile2`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
