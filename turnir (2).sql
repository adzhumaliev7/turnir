-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 21 2022 г., 23:50
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

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
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `fio`, `phone`, `email`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, '+996708715281', 'aidar300799@gmail.com', 'werwerwer', NULL, NULL),
(2, 'test', 'aaer', 'aidar300799@gmail.com', 'asdsadasd', NULL, NULL),
(3, 'test', 'aaer', 'aidar300799@gmail.com', 'asdsadasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `help`
--

CREATE TABLE `help` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(17, '2022_01_08_062352_stage_3', 14),
(18, '2022_01_17_083957_team_members', 15),
(19, '2022_01_18_120003_add_verified_token', 16),
(20, '2022_01_21_064958_winners', 17),
(21, '2022_01_21_103649_tournament_results', 18),
(22, '2022_01_26_062840_orders', 19),
(23, '2022_01_26_130809_orders_to_changteam', 20),
(24, '2022_01_27_103825_teams_networks', 21),
(25, '2022_02_02_222722_users_logo', 22),
(26, '2022_02_11_130223_stages', 23),
(27, '2022_02_11_132642_tournament_groups', 23),
(28, '2022_02_15_231230_tournament_group_teams', 24),
(29, '2022_02_17_095113_matches', 25),
(30, '2022_02_17_100301_matches_results', 26),
(31, '2022_02_17_201424_create_stages_group_table', 27);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(1, 'App\\Models\\User', 15),
(1, 'App\\Models\\User', 16),
(1, 'App\\Models\\User', 17),
(1, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 19),
(1, 'App\\Models\\User', 20),
(1, 'App\\Models\\User', 21),
(1, 'App\\Models\\User', 22),
(1, 'App\\Models\\User', 23),
(1, 'App\\Models\\User', 24),
(1, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 27);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'aaaaa', 1, NULL, NULL),
(2, 7, 'asaddd', 1, NULL, NULL),
(3, 1, 'eewwefwef', 1, NULL, NULL),
(4, 13, 'еарар', 1, NULL, NULL),
(5, 1, '66', 1, NULL, NULL),
(6, 1, 'y', 1, NULL, NULL),
(7, 1, 'y', 1, NULL, NULL),
(8, 1, '32r2r32', 1, NULL, NULL),
(9, 1, 'yyyy', 1, NULL, NULL),
(10, 1, '5675', 1, NULL, NULL),
(11, 1, '7777', 1, NULL, NULL),
(12, 1, '6666', 1, NULL, NULL),
(13, 7, '5555', 1, NULL, NULL),
(14, 1, '1313', 1, NULL, NULL),
(15, 7, '123', 0, NULL, NULL),
(16, 1, '44', 1, NULL, NULL),
(17, 1, 'yyy', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_team`
--

CREATE TABLE `orders_team` (
  `id` int UNSIGNED NOT NULL,
  `team_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders_team`
--

INSERT INTO `orders_team` (`id`, `team_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'зАНГЕЦУ', 2, NULL, NULL),
(2, 7, 'ytturu', 2, NULL, NULL),
(3, 8, 'qqqqq', 1, NULL, NULL),
(4, 3, 'asdwdwd', 1, NULL, NULL),
(5, 3, 'aaaaaaaaa', 1, NULL, NULL),
(6, 3, '12313123', 1, NULL, NULL),
(7, 1, '22131', 2, NULL, NULL),
(8, 1, '111111', 2, NULL, NULL),
(9, 1, '22424', 2, NULL, NULL),
(10, 10, '2222', 1, NULL, NULL),
(11, 1, 'туц', 2, NULL, NULL),
(12, 10, '22222222222222222222222222', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Структура таблицы `stages`
--

CREATE TABLE `stages` (
  `id` int UNSIGNED NOT NULL,
  `stage_number` int DEFAULT NULL,
  `stage_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tournament_id` int DEFAULT NULL,
  `team_id` int DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  `match_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `kills_pts` int DEFAULT NULL,
  `place_pts` int DEFAULT NULL,
  `total_pts` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stages`
--

INSERT INTO `stages` (`id`, `stage_number`, `stage_name`, `tournament_id`, `team_id`, `group_id`, `match_id`, `status`, `kills_pts`, `place_pts`, `total_pts`, `winner`, `created_at`, `updated_at`) VALUES
(4, 1, 'Название этапа', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-21 10:49:23', '2022-02-21 10:49:23'),
(5, 2, 'Этап 2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-21 10:55:35', '2022-02-21 10:55:35'),
(7, 1, 'dsadsadsa', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-21 13:05:49', '2022-02-21 13:05:49'),
(8, 3, 'sdsadasd', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-21 13:48:44', '2022-02-21 13:48:44');

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
  `points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stage_1`
--

INSERT INTO `stage_1` (`id`, `tournament_id`, `team_id`, `status`, `group_id`, `points`, `winner`, `created_at`, `updated_at`) VALUES
(1, 2, 6, NULL, 1, '12', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `stage_2`
--

CREATE TABLE `stage_2` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `stage_3`
--

CREATE TABLE `stage_3` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` int UNSIGNED NOT NULL,
  `user_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `user_id`, `user_name`, `name`, `role`, `country`, `logo`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '22424', 'captain', 'Kazakhstan', NULL, NULL, NULL),
(2, '8', NULL, 'команда 2\\', 'captain', NULL, NULL, NULL, NULL),
(3, '9', NULL, '12313123', 'captain', 'Kazakhstan', NULL, NULL, NULL),
(6, '13', NULL, '1111212', 'captain', 'Kazakhstan', NULL, NULL, NULL),
(8, '12', NULL, 'qeqweqwe', 'captain', 'Kazakhstan', NULL, NULL, NULL),
(9, '15', NULL, 'aaaaaaaaa', 'captain', NULL, NULL, NULL, NULL),
(10, '7', NULL, '22222222222222222222222222', 'captain', 'Kazakhstan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `teams_networks`
--

CREATE TABLE `teams_networks` (
  `id` int UNSIGNED NOT NULL,
  `team_id` int NOT NULL,
  `insta` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discord` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teams_networks`
--

INSERT INTO `teams_networks` (`id`, `team_id`, `insta`, `discord`, `vk`, `facebook`, `youtube`, `telegram`, `created_at`, `updated_at`) VALUES
(1, 3, '@wwwedq', 'aaaayyr', NULL, NULL, NULL, NULL, NULL, NULL);

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
(2, 2, 8, 'captain', NULL, NULL),
(6, 3, 9, 'captain', NULL, NULL),
(9, 6, 13, 'captain', NULL, NULL),
(12, 8, 12, 'captain', NULL, NULL),
(22, 9, 15, 'captain', NULL, NULL),
(23, 1, 15, 'member', NULL, NULL),
(24, 10, 7, 'captain', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournament_start` date DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `games_time` time DEFAULT NULL,
  `timezone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_label` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_reg` date DEFAULT NULL,
  `slot_kolvo` int DEFAULT NULL,
  `end_reg` date DEFAULT NULL,
  `rule` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `layouts` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_t` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_t` time DEFAULT NULL,
  `file_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `tournament_start`, `country`, `countries`, `format`, `games_time`, `timezone`, `file_label`, `description`, `start_reg`, `slot_kolvo`, `end_reg`, `rule`, `layouts`, `description2`, `date_t`, `time_t`, `file_2`, `price`, `status`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Турнир1', '2022-01-26', 'Киргизия', 'Киргизия', '11', '16:26:00', '(GMT-11:00) Samoa', '', 'ффффф', '2022-01-21', 32, '2022-01-24', '1) без матов 2) че то там 3) еще че то там', NULL, NULL, NULL, NULL, NULL, '100', 'save', 1, NULL, NULL),
(2, 'Турири 2', '2023-01-10', 'Киргизия', 'Киргизия', '11', '17:13:00', '(GMT-09:00) Alaska', '', '1111', '2022-01-23', 21, '2023-01-11', '1) без матов 2) че то там 3) еще че то там', NULL, NULL, NULL, NULL, NULL, '111', 'save', 1, NULL, NULL),
(3, 'wrwerewrwer', NULL, 'Киргизия', 'Киргизия', '11', NULL, '(GMT-11:00) Samoa', '', 'qwewe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'save', 1, NULL, NULL),
(4, '4', NULL, NULL, NULL, NULL, NULL, '(GMT-11:00) Midway Island', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'save', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tournaments_members`
--

CREATE TABLE `tournaments_members` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL COMMENT 'Id команды из таблицы team',
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournaments_members`
--

INSERT INTO `tournaments_members` (`id`, `tournament_id`, `team_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 7, NULL, NULL),
(3, 1, 1, 13, NULL, NULL),
(4, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tournament_groups`
--

CREATE TABLE `tournament_groups` (
  `id` int UNSIGNED NOT NULL,
  `group_number` int DEFAULT NULL,
  `group_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tournament_id` int DEFAULT NULL,
  `team_id` int DEFAULT NULL,
  `stage_id` int DEFAULT NULL,
  `match_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `kills_pts` int DEFAULT NULL,
  `place_pts` int DEFAULT NULL,
  `total_pts` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournament_groups`
--

INSERT INTO `tournament_groups` (`id`, `group_number`, `group_name`, `tournament_id`, `team_id`, `stage_id`, `match_id`, `status`, `kills_pts`, `place_pts`, `total_pts`, `winner`, `created_at`, `updated_at`) VALUES
(6, NULL, 'Название группы', 1, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-21 10:49:38', '2022-02-21 10:49:38'),
(8, NULL, 'Группа 1', 1, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-21 10:55:51', '2022-02-21 10:55:51'),
(12, NULL, 'вание группы', 1, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-21 13:49:13', '2022-02-21 13:49:13');

-- --------------------------------------------------------

--
-- Структура таблицы `tournament_group_teams`
--

CREATE TABLE `tournament_group_teams` (
  `id` int UNSIGNED NOT NULL,
  `group_id` int DEFAULT NULL,
  `group_number_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tournament_id` int DEFAULT NULL,
  `team_id` int DEFAULT NULL COMMENT 'Айди команды таблица team',
  `stage_id` int DEFAULT NULL,
  `match_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `kills_pts` int DEFAULT NULL,
  `place_pts` int DEFAULT NULL,
  `total_pts` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournament_group_teams`
--

INSERT INTO `tournament_group_teams` (`id`, `group_id`, `group_number_id`, `tournament_id`, `team_id`, `stage_id`, `match_id`, `status`, `kills_pts`, `place_pts`, `total_pts`, `winner`, `created_at`, `updated_at`) VALUES
(49, 6, NULL, 1, 1, 4, NULL, NULL, 4, 1, NULL, NULL, NULL, '2022-02-21 13:34:49'),
(61, 6, NULL, 1, 6, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 6, NULL, 1, 9, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 6, NULL, 1, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 8, NULL, 1, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 8, NULL, 1, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tournament_matches`
--

CREATE TABLE `tournament_matches` (
  `id` int UNSIGNED NOT NULL,
  `match_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  `tournament_id` int DEFAULT NULL,
  `stage_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournament_matches`
--

INSERT INTO `tournament_matches` (`id`, `match_name`, `group_id`, `tournament_id`, `stage_id`, `created_at`, `updated_at`) VALUES
(27, 'Матч 12', 6, 1, 4, '2022-02-21 10:49:50', '2022-02-21 13:34:17'),
(28, 'Матч 22', 6, 1, 4, '2022-02-21 10:49:50', '2022-02-21 13:34:17'),
(29, 'Матч 33', 6, 1, 4, '2022-02-21 10:49:50', '2022-02-21 13:34:17'),
(30, 'Матч 1 из второй группы', 7, 1, 4, '2022-02-21 10:50:40', '2022-02-21 11:36:18'),
(31, 'Матч 2 из второй группы', 7, 1, 4, '2022-02-21 10:50:40', '2022-02-21 11:36:18'),
(33, 'Матч 3', 7, 1, 4, '2022-02-21 11:36:18', '2022-02-21 11:36:18'),
(34, 'Матч 4', 7, 1, 4, '2022-02-21 11:36:18', '2022-02-21 11:36:18'),
(35, 'Матч 5', 7, 1, 4, '2022-02-21 11:36:18', '2022-02-21 11:36:18'),
(36, 'Матч 6', 7, 1, 4, '2022-02-21 11:36:18', '2022-02-21 11:36:18'),
(39, 'Матч 1', 10, 1, 4, '2022-02-21 13:00:55', '2022-02-21 13:00:55'),
(40, 'Матч 2', 10, 1, 4, '2022-02-21 13:00:55', '2022-02-21 13:00:55');

-- --------------------------------------------------------

--
-- Структура таблицы `tournament_matches_results`
--

CREATE TABLE `tournament_matches_results` (
  `id` int UNSIGNED NOT NULL,
  `match_id` int DEFAULT NULL,
  `stages_id` int DEFAULT NULL,
  `team_id` int DEFAULT NULL COMMENT 'Айди игрока из таблицы tournaments_members',
  `status` int DEFAULT NULL,
  `kills_pts` int DEFAULT NULL,
  `place_pts` int DEFAULT NULL,
  `total_pts` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournament_matches_results`
--

INSERT INTO `tournament_matches_results` (`id`, `match_id`, `stages_id`, `team_id`, `status`, `kills_pts`, `place_pts`, `total_pts`, `winner`, `created_at`, `updated_at`) VALUES
(54, 27, NULL, 3, NULL, 4, NULL, NULL, NULL, '2022-02-21 13:34:49', '2022-02-21 13:34:49'),
(55, 28, NULL, 3, NULL, 0, NULL, NULL, NULL, '2022-02-21 13:34:49', '2022-02-21 13:34:49'),
(56, 29, NULL, 3, NULL, 0, NULL, NULL, NULL, '2022-02-21 13:34:49', '2022-02-21 13:34:49'),
(57, 27, NULL, 4, NULL, 0, NULL, NULL, NULL, '2022-02-21 13:34:49', '2022-02-21 13:34:49'),
(58, 28, NULL, 4, NULL, 0, NULL, NULL, NULL, '2022-02-21 13:34:49', '2022-02-21 13:34:49'),
(59, 29, NULL, 4, NULL, 0, NULL, NULL, NULL, '2022-02-21 13:34:49', '2022-02-21 13:34:49');

-- --------------------------------------------------------

--
-- Структура таблицы `tournament_results`
--

CREATE TABLE `tournament_results` (
  `id` int UNSIGNED NOT NULL,
  `turnir_id` int NOT NULL,
  `team_id` int NOT NULL,
  `points` int DEFAULT NULL,
  `kills` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tournamets_team`
--

CREATE TABLE `tournamets_team` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournamets_team`
--

INSERT INTO `tournamets_team` (`id`, `tournament_id`, `team_id`, `status`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'accepted', NULL, NULL, NULL),
(2, 1, 6, 'accepted', 2, NULL, NULL),
(3, 1, 1, 'accepted', 1, NULL, NULL),
(4, 1, 9, 'accepted', NULL, NULL, NULL),
(5, 1, 8, 'accepted', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `verified`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'Admin', '$2y$10$eOdJvuy2W3MNuFfrva0b..m8/EXkIx/kReE7Z1uy8XFgy3kwMe0Ge', 1, NULL, NULL, '2022-01-22 03:11:18', '2022-01-22 03:11:18'),
(4, 'aidar11300799@gmail.com', 'aww', '$2y$10$pSAyFl992mQV79CiQcHPK.6htkPEF.Lp0RGIr1QpRiu10GybQIVo2', 0, 'Rmufr5YfStFZZZ7cwsLk6AzClzcwA2', NULL, '2022-01-24 03:49:04', '2022-01-24 03:49:04'),
(7, 'adzhumaliev7@mail.ru', 'aidar', '$2y$10$7RIxWAZYwbAFuuW59jomo.bQw7zSNYhRzaJI257tbeTFimqMYw6S.', 1, 'a1jT1P5RWN6Kx2PrZgqBRyAHKsl2HM', NULL, '2022-01-26 02:08:56', '2022-01-26 02:08:56'),
(8, 'newmoder2@gmail.com', NULL, '$2y$10$FyPOq6vxlx4GdwP4fzeCyulagPH0oPTnBFx8bDIh7raGRPO37Qp9q', 0, 'p8vidksST0iAgDILc37SSISBxCaCgW', NULL, '2022-02-10 08:38:18', '2022-02-10 08:38:18'),
(9, 'aidar300799@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$hkxo189wFurjTE2Z6Shspuuxo/H2UupHm3Q/Ru49D0YfUPjhBzJ5y', 1, 'WCFzQ6ExcLAYnagXazhuXgWHZzVM04', NULL, '2022-02-01 03:34:04', '2022-02-01 03:34:04'),
(10, 'aiadar300799@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$CqZzHS4iOYysivSLTnV4iuaKN3sJORE26CBgX/ma1jxTrZqHzQP3W', 0, 'isr6WbpCBM0SMp5CS5JU2gstNqCoBy', NULL, '2022-02-01 07:19:34', '2022-02-01 07:19:34'),
(11, 'aidar30110799@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$LbKYh6oolSpRODZk.ahDo.3mlTpwUniOLqjA9BVyHXZnSMg8Q7FD6', 1, 'v0BPdFN66SeJkVQZN0AzERH603plwq', NULL, '2022-02-02 10:46:20', '2022-02-02 10:46:20'),
(12, 'test@gmail.com', 'test', '$2y$10$5vW44cmBm28t4DGZzxrQC.9wHTwjr96M5ouwVSsm3zFjRnb6JDvfO', 1, '3rVdTHGQ5YkKxiJRZ3WPzpYt3ciVMg', NULL, '2022-02-03 02:48:09', '2022-02-03 02:48:09'),
(13, 'test1@gmail.com', 'test1', '$2y$10$9X.Meya/UBVC56UL5WVdXuwLqWicmm8wNp9T7k9suTk0RMi2myFzm', 1, '', NULL, '2022-02-04 09:07:59', '2022-02-04 09:07:59'),
(14, 'moderator1@gmail.com', NULL, '$2y$10$JOhZVzqGCwHgPqEMSu1DReop6QzYE9vbmHqjsGtwQam83c5qYWmL.', 0, 'BnHzWeYfHWfsGvK5gQTpkZuPypplWP', NULL, '2022-02-05 07:49:20', '2022-02-05 07:49:20'),
(15, 'test10@gmail.com', 'test10@gmail.com', '$2y$10$HHw5UhtLLqhHIAa3d6WrBueVbvwV42IgvDoJkNvlqY0HL2VGEUjxu', 1, 'XoXt1XZiyfw7VVFekYp8Fi8zruBiom', NULL, '2022-02-05 11:17:51', '2022-02-05 11:17:51'),
(16, 'aidar30079911@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$xtIlZW84JfNOYh./PQDT0.LQCPQf6dAIIpaG7MjS5sTVsqY4jlyFi', 0, 'fUlllBlALeNXNqs3bmcDM6ngWPVnHv', NULL, '2022-02-06 12:42:05', '2022-02-06 12:42:05'),
(17, 'aidar30qwe9@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$64U9nAUVEzDzmM2Zin02yuYZoPRsmheUlgYTmC58AYJWdHABdnAh6', 0, 'SfuDg6FepPaDrQifb87E4UWEqTqqbK', NULL, '2022-02-06 12:44:34', '2022-02-06 12:44:34'),
(18, 'aidar300asdddwq799@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$8wrth7cfKCPax90U/pWCJumjeapvsOJgt5y1PDmrw0T0v1/2RKv4C', 0, 'yr5UMdVKHV7MW54Bd9EaX2dlIHzRKP', NULL, '2022-02-06 12:57:22', '2022-02-06 12:57:22'),
(19, 'aidar3011110799@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$JkCgidPWhEf6pAYxMsr.f.2Kv0Gm7770bs46osF9qXs2tz/XLfq/K', 0, 'VjrdhSG4OMvhbFJUzIAi4cCrkg1Vsw', NULL, '2022-02-06 12:58:09', '2022-02-06 12:58:09'),
(20, 'testtest@gmail.com', '111', '$2y$10$EKe34pLLrtGNL2LShvcGjuoFJ0qDDWbhdyaBmW.OsTMD91jtqrlF.', 0, 'ZLtjESLS0EQItTOPs6WNfb7c3VmKSv', NULL, '2022-02-06 12:59:38', '2022-02-06 12:59:38'),
(21, 'aidar3007222229@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$jzDXJr0XTL.zUpgz9/uKnOB87Dn1/0K1MA1dDu9xsYNh6fqiHsCI.', 0, '5BoJnvw69eNMf7okhynHAUIGdZbtmF', NULL, '2022-02-06 13:03:04', '2022-02-06 13:03:04'),
(22, 'aidar3eeeee00799@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$NNsXviXpdSCY5uBAWsgAO.yWX490gSPi02D7ZIPyMLAC43w.XHtcW', 0, 'QGB8DNQ2KtGunOCIjApqMZn3BuV8rj', NULL, '2022-02-06 13:03:50', '2022-02-06 13:03:50'),
(23, 'aidar3007qqwqeqwe99@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$OvAPIFU9XOFoFSHrfPJ9VOpQAzXFhnshtlXO6J04gJyuXCIqgVgdq', 0, 'IrResnTG9UWXCt7pNGZQpV3rvPc46P', NULL, '2022-02-06 13:04:24', '2022-02-06 13:04:24'),
(24, 'aidar3007111199@gmail.com', 'Айдар Талантбекович Джумалиев', '$2y$10$q7kLhGODuYab7YQ49scLjeX/wyXpSwpHAQ5y.jiDOHMJjsxsJozAS', 0, 'Z0tOtcOrj32UV6b71EIp4lrSsNFjOk', NULL, '2022-02-06 13:05:18', '2022-02-06 13:05:18'),
(25, 'testnew@gmail.com', 'Айдар', '$2y$10$e.xjs2iInNiQqUfq9Nr/tehSH0Z3/DApyucSvqGmTCy9qC2Q6LNR2', 0, 'qmbzvZej2MhVCWI8AkeAaHNNHtfeDb', NULL, '2022-02-09 10:09:00', '2022-02-09 10:09:00'),
(26, 'testmoder@gmail.com', NULL, '$2y$10$OjPyFtIdFEgvwksF/mrDVOlAk/nkZVVHvGRhDxEpPucGji7P1b07i', 0, NULL, NULL, '2022-02-10 08:24:49', '2022-02-10 08:24:49');

-- --------------------------------------------------------

--
-- Структура таблицы `users_logo`
--

CREATE TABLE `users_logo` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_logo`
--

INSERT INTO `users_logo` (`id`, `user_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, '768cd605bc77a80d4cdc7b3fd552f803.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users_profile2`
--

CREATE TABLE `users_profile2` (
  `id` int UNSIGNED NOT NULL,
  `doc_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_photo2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bdate` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_profile2`
--

INSERT INTO `users_profile2` (`id`, `doc_photo`, `doc_photo2`, `phone`, `fio`, `login`, `email`, `country`, `timezone`, `city`, `bdate`, `nickname`, `game_id`, `verification`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'adcbb5c18a75784261327aec9a0feff1.png', 'ffc311ee5ad0061e4aa74336f51f3980.png', '+996708715281', 'Admin', NULL, 'admin@gmail.com', 'Киргизия1y', '(GMT-11:00) Midway Island', 'Бишкек2', NULL, 'admin', '11111111', 'verified', 1, 1, NULL, NULL),
(6, 'C:\\OpenServer\\userdata\\temp\\upload\\php45A1.tmp', 'C:\\OpenServer\\userdata\\temp\\upload\\php45C1.tmp', '+996708715281', 'test', 'aasa', 'adzhumaliev7@mail.ru', NULL, '(GMT-11:00) Midway Island', NULL, '2022-02-06', 'aaa', '1232444', 'rejected', 0, 7, NULL, NULL),
(7, NULL, NULL, '5544546456', NULL, NULL, 'test3@gmail.com', NULL, '(GMT-11:00) Midway Island', 'Бишкек', NULL, 'test 4', '5544546456', 'on_check', 1, 8, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, 'aidar30110799@gmail.com', NULL, '(GMT-11:00) Midway Island', NULL, '2022-02-02', NULL, NULL, 'on_check', 0, 11, NULL, NULL),
(9, NULL, 'C:\\OpenServer\\userdata\\temp\\upload\\phpDFA2.tmp', '7yutiti', 'test Admin', 'test1', 'test1@gmail.com', 'Kyrgyzstan', '(GMT-11:00) Midway Island', 'Бишкек', '2022-02-04', 'test1', '2132114545', 'on_check', 1, 13, NULL, NULL),
(13, NULL, NULL, NULL, 'test Admin', NULL, NULL, 'Kazakhstan', '(GMT-11:00) Midway Island', NULL, NULL, NULL, NULL, 'on_check', 0, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `winners`
--

CREATE TABLE `winners` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int DEFAULT NULL,
  `winner` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_team`
--
ALTER TABLE `orders_team`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `teams_networks`
--
ALTER TABLE `teams_networks`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `tournaments_members`
--
ALTER TABLE `tournaments_members`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournament_groups`
--
ALTER TABLE `tournament_groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournament_group_teams`
--
ALTER TABLE `tournament_group_teams`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournament_matches`
--
ALTER TABLE `tournament_matches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournament_matches_results`
--
ALTER TABLE `tournament_matches_results`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournament_results`
--
ALTER TABLE `tournament_results`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `users_logo`
--
ALTER TABLE `users_logo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_profile2`
--
ALTER TABLE `users_profile2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `game_id` (`game_id`);

--
-- Индексы таблицы `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `help`
--
ALTER TABLE `help`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `orders_team`
--
ALTER TABLE `orders_team`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT для таблицы `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `stage_1`
--
ALTER TABLE `stage_1`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `stage_2`
--
ALTER TABLE `stage_2`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `stage_3`
--
ALTER TABLE `stage_3`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT для таблицы `teams_networks`
--
ALTER TABLE `teams_networks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tournaments_members`
--
ALTER TABLE `tournaments_members`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tournament_groups`
--
ALTER TABLE `tournament_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `tournament_group_teams`
--
ALTER TABLE `tournament_group_teams`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `tournament_matches`
--
ALTER TABLE `tournament_matches`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `tournament_matches_results`
--
ALTER TABLE `tournament_matches_results`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `tournament_results`
--
ALTER TABLE `tournament_results`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tournamets_team`
--
ALTER TABLE `tournamets_team`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users_logo`
--
ALTER TABLE `users_logo`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users_profile2`
--
ALTER TABLE `users_profile2`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

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
