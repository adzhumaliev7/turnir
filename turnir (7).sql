-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 05 2022 г., 15:38
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
(13, '2022_01_04_135333_feedback', 10);

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
(2, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
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
(3, '1', NULL, 'Хуй', 'captain', NULL, NULL);

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
(5, 3, 1, 'captain', NULL, NULL),
(6, 3, 206, 'member', NULL, NULL);

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
(3, 'qqqqqqqqqqqqqq', NULL, 'Киргизия', 'Киргизия', 'dasdsadas', NULL, '(GMT-10:00) Hawaii', NULL, 'Снимок экрана (3).png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'draft', NULL, NULL),
(4, 'Тест', '2022-01-11', 'Киргизия', 'Киргизия', '11', '14:55:00', '(GMT-11:00) Samoa', NULL, 'screenshot.png', 'фффффффф', '2022-01-03', 32, '2022-01-09', '2', '1) без матов 2) че то там 3) еще че то там', NULL, 'wwww', NULL, NULL, NULL, NULL, '100', 'save', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tournamets_team`
--

CREATE TABLE `tournamets_team` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int NOT NULL,
  `team_id` int NOT NULL,
  `captain_id` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournamets_team`
--

INSERT INTO `tournamets_team` (`id`, `tournament_id`, `team_id`, `captain_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 4, 3, NULL, 'accepted', NULL, NULL);

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
(1, 'admin@gmail.com', '$2y$10$RdTjYSnPLBd.iJ1sfUB6FOfINuptn6VXlJ7IRIuR1bWjJB7BhEQQ6', NULL, NULL, '2021-12-26 00:12:52', '2021-12-26 00:12:52'),
(2, 'test1@gmail.com', '$2y$10$B7FCJmoIYCvQ5CG/JmCTKuxn2A0He/6i4eoI9QljSzMd5/L5XuhoG', NULL, NULL, '2021-12-26 01:30:20', '2021-12-26 01:30:20'),
(3, 'aidar300799@gmail.com', '$2y$10$BsA0AWWF6n5l5I1unXYQhOQuuZv8WXOlQ3QGd9O0yJEr.6ikn8qcu', NULL, NULL, '2022-01-05 03:27:20', '2022-01-05 03:27:20'),
(6, 'userEmail1@mail.ru', '$2y$10$tAniyLHlg94NakCplLcLm.Vw8FbFq9dw/n3RgcfcPfT1kqSFZccDG', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(7, 'userEmail2@mail.ru', '$2y$10$zhN6w4Pgj//A3QCpsWIOgeVGgRvCfAo5.OXJVNJnVmMNAtpYY/BNC', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(8, 'userEmail3@mail.ru', '$2y$10$xFn7Y9rDXbBm6cP9HsAFMe4np5zJMRlh4WFRPj2hj3TEZqmmqWIeq', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(9, 'userEmail4@mail.ru', '$2y$10$Dqwl.kpny8QLJeThJvbDKOU8FutrG7G1iuibB029B1mEbZP2.uDkm', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(10, 'userEmail5@mail.ru', '$2y$10$zt83V73ci8zudk9HKpAR0.nOeornB0t9WCcoPJHuXVNRop0u8EX/a', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(11, 'userEmail6@mail.ru', '$2y$10$MaylQxY0LvPbmOI4SRQzKOaefRwPPj9LliWPerLXy2Z3xL3rO1bry', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(12, 'userEmail7@mail.ru', '$2y$10$5wIe3TGVfz5F/SoHnhvZG.FHWmLCrHK8Gr7Av31.HaatJEAmUm622', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(13, 'userEmail8@mail.ru', '$2y$10$qHu7DI/iD7zUvj0IBO7LQeE2jYJSUr.2SGvpYZgirUa4xqvJqxw6a', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(14, 'userEmail9@mail.ru', '$2y$10$ff.Pz5CFpKocRpwW9Ggd0uDKsMY8Qw.RcOSvTkvc.YslcTxCYHVF.', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(15, 'userEmail10@mail.ru', '$2y$10$K3Vot6JLgpTQnUQWH/WSsetvlOd30jVqnsdtnka/VuP/favpUQmNy', NULL, NULL, '2022-01-05 04:29:31', '2022-01-05 04:29:31'),
(16, 'userEmail11@mail.ru', '$2y$10$cUU5i4wyN8.Ur6B3RVLoXOG2Ba8V5SIhnDSn5xJfPlOSqg.kVxT9u', NULL, NULL, '2022-01-05 04:29:32', '2022-01-05 04:29:32'),
(17, 'userEmail12@mail.ru', '$2y$10$O4wlYeb8QM3JG.FFJFel2.JqPZAqerZ8eHmJrLTrszlZBXY7mTnWW', NULL, NULL, '2022-01-05 04:29:32', '2022-01-05 04:29:32'),
(18, 'userEmail13@mail.ru', '$2y$10$lwdEnVpSmgFdFrLc0jf51eVVFEhA.iU5W6hJE2FNZRLKqsP7XKyn.', NULL, NULL, '2022-01-05 04:29:32', '2022-01-05 04:29:32'),
(19, 'userEmail14@mail.ru', '$2y$10$2ydahp131Q433sqS6v/YtuStf1OrR4RWy5AvHiR2RN6QKHrCGwDDm', NULL, NULL, '2022-01-05 04:29:32', '2022-01-05 04:29:32'),
(20, 'userEmail15@mail.ru', '$2y$10$kVUsYN7SIlAYgI82o4umFeGLUY2o69jnicxoC2IgzCXnCn7DoVMbi', NULL, NULL, '2022-01-05 04:29:32', '2022-01-05 04:29:32'),
(21, 'userEmail16@mail.ru', '$2y$10$xPfLjReJSTbiZE3mRoYWF.FkiEHqj2M8pilivCeZa0Jdjlw2MeolK', NULL, NULL, '2022-01-05 04:29:32', '2022-01-05 04:29:32'),
(22, 'userEmail17@mail.ru', '$2y$10$/t/9hdBmhtMOlyzlTIaew.tymEtEmAaTJe9OfF7ELKaCpEdSd.EVa', NULL, NULL, '2022-01-05 04:29:32', '2022-01-05 04:29:32'),
(23, 'userEmail18@mail.ru', '$2y$10$RpPMshhLp0xUP7GuD.U6.eWBv/4Dj/g8mCkb7A3TNupybjWf4K9vi', NULL, NULL, '2022-01-05 04:29:32', '2022-01-05 04:29:32'),
(24, 'userEmail19@mail.ru', '$2y$10$4tJZ0o8Jcqyr352dF1DIq.bQQsgkvuXulatARkZhVfDNaGo3q4fw6', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(25, 'userEmail20@mail.ru', '$2y$10$ldmC6lXWWWGvSNAdNvazAOqRPWyA5Y7.QT43jut/YzdYtX8J5oRm.', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(26, 'userEmail21@mail.ru', '$2y$10$IWJz4UmrkcFuu1RLKhKc2ugt5uA/BRh6djTkzyz3ET/s00r.UBbHm', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(27, 'userEmail22@mail.ru', '$2y$10$9YTcSXDl5C2js/jioXG6i.8RX4dRmfDVpvvG8nSxPhwQnm9S8tgNe', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(28, 'userEmail23@mail.ru', '$2y$10$CwkbHPPTg4/1XA.XGW/w6usFOsysxYOaoWvQ6qqoAl5BueGrnhyhu', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(29, 'userEmail24@mail.ru', '$2y$10$25cFcjT6huEFzD3KOXYoO.nDRaGSqBS2MPrKAsZP3NaTfxoOR/Lzi', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(30, 'userEmail25@mail.ru', '$2y$10$dnaHh9DcPrdAGVdOE3YBgOj5I6qiKxdN3aXY.ygiXs7a91nTJrlEi', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(31, 'userEmail26@mail.ru', '$2y$10$FmS/9xBqnW1wtWtlJUDt2.rLhaZe0thX.KibWdLsCV6338wyoVmrG', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(32, 'userEmail27@mail.ru', '$2y$10$lw4JXlr889vmkop4zgYREujh8App2vye24EPsVN1/3FGx.9mTFbYa', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(33, 'userEmail28@mail.ru', '$2y$10$eYd0.X1Avwtx3UwxCZKGc.2PGfkVur/1UsZOFA4ZFbn8rfgVgx0zK', NULL, NULL, '2022-01-05 04:29:33', '2022-01-05 04:29:33'),
(34, 'userEmail29@mail.ru', '$2y$10$UoESXHyhHdg3j.oLwyFLOOCC9I5rIsIzuqIzzpjkrWqlLEn6wYOqO', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(35, 'userEmail30@mail.ru', '$2y$10$oGRXybG.Qr9gbypJ22BJe.rC9H8DUKjkr7RTsOVVFerlT399l2lSa', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(36, 'userEmail31@mail.ru', '$2y$10$mDK4YO.BtAfO2pRNeiFmcOjbN46zdbAuv.jyBgILk2nMERbdhJ67u', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(37, 'userEmail32@mail.ru', '$2y$10$B7YloDFAhz42zf9REbfaAeXcx1ODQTKu50ViAucIwSawidpQxx3CO', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(38, 'userEmail33@mail.ru', '$2y$10$rS2av9TdAHipKgp.dtC7iu4Bx6gBK79Xcb.3Z2swu2Xx0w7RTFI9y', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(39, 'userEmail34@mail.ru', '$2y$10$rQgTw8lWyTRn8OiWsrwtu.SwTqXRVU2X8aSVE3x6pF0wQSQDHy77.', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(40, 'userEmail35@mail.ru', '$2y$10$8h2OUM6vUWppofNFaUM7FukZXX247l879./McdCn7bw9Q551T11Kq', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(41, 'userEmail36@mail.ru', '$2y$10$TvKA9BSevC6JvJdgmzIP8.WoCRGETirda/0h/Y3wlmZq3KOSMLNAq', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(42, 'userEmail37@mail.ru', '$2y$10$knzYYazVDV/dVwwCTnO6qukdEKhn6K6EAQ0LrxS0.57L1krlBqFcK', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(43, 'userEmail38@mail.ru', '$2y$10$4CU.yTr/uj76AiSpPoEHwuHzQfE6CpvjUSAqm6bBoFfby/.YDGIyq', NULL, NULL, '2022-01-05 04:29:34', '2022-01-05 04:29:34'),
(44, 'userEmail39@mail.ru', '$2y$10$mWRCrM3LfwhFQCVdfDLR/uyGyBTJfp5mKOhU5AgC40z1VljmjUrAi', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(45, 'userEmail40@mail.ru', '$2y$10$H/HSXd3tRUJT7dtd0QWfIO31pTlabW.hsUJKGvYKI7xOa1OqvEFVu', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(46, 'userEmail41@mail.ru', '$2y$10$prjg1CqyyYfLSyJWTy67ReAB7MgQWprnzldY3sa.PehPwFcHxMzs6', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(47, 'userEmail42@mail.ru', '$2y$10$EzDbADQWSK/39DVqI.qQwe.MW6XDPhgUHYQMu98IVfq9LCQeU6K/S', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(48, 'userEmail43@mail.ru', '$2y$10$1yBhLfhkL9hQn5FM1qfa7uGs55TAr9l0cZnZvkTcey0dEsDL3jpRu', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(49, 'userEmail44@mail.ru', '$2y$10$5/k1ODzXKYcJbD5IGk0x8uhQn7LTp7DbN2qOYFiNEzIQnROsl7Eom', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(50, 'userEmail45@mail.ru', '$2y$10$iVSyCl2fxA9h0nWGdGMoDeNM3uaD273OvjI40ULpDuHUAp.sO9y9a', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(51, 'userEmail46@mail.ru', '$2y$10$4hjx1shFOLUUspNM8f0cx.hDt.XuMCxfwE6/i5qPRIciTvRQvGoJG', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(52, 'userEmail47@mail.ru', '$2y$10$dXXLaLTfbvk2Bcc1iPoKI.RPuuI7NaaOteYDhtDCRHH1qHJ6ZrXZ2', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(53, 'userEmail48@mail.ru', '$2y$10$A5dq0YB9g.cdExbK4d6of.SCr3wy.HQRVYGGGWKiXa1cxO4umGcrO', NULL, NULL, '2022-01-05 04:29:35', '2022-01-05 04:29:35'),
(54, 'userEmail49@mail.ru', '$2y$10$4pG.anQxbaNDn8KwVX1PD.HgpEqb7658hOLNhvvnqEKdDQrJ01Pw2', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(55, 'userEmail50@mail.ru', '$2y$10$WCGjA077DrC8CAmRFqaxEOqG2MTRlIVJdE7YLPrij5C8/tZDYveU2', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(56, 'userEmail51@mail.ru', '$2y$10$2I1oHaqyppfUh0ighY0J0OfQ7TYn6x1ejVl0RqeKPOjgCk1UT/bfC', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(57, 'userEmail52@mail.ru', '$2y$10$ovcraw.W78GCk6B/TlJejuKDlqgBf604.tj6oBwrNLgmHOyWhjN9C', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(58, 'userEmail53@mail.ru', '$2y$10$7fNCb7I9yblLAk0CwafF2.lEUuqRAfpgDpji8cYCoT3IxH3mT3iAS', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(59, 'userEmail54@mail.ru', '$2y$10$O7Kp7nNyFo9LP4qj7lEDW.tobGoMt8P52U2hbwFm5zNfI8Ddn/lWG', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(60, 'userEmail55@mail.ru', '$2y$10$FGTeBmvx9FRk4/4pkENXNeZ8ZPP8sL2yrC8Yq/xvNzbxAhdty0you', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(61, 'userEmail56@mail.ru', '$2y$10$su99514OF0qPop3nLqzNGe.A4PaYRJ4nyLe26sT80fxecCMgULn6.', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(62, 'userEmail57@mail.ru', '$2y$10$TGZuX/Yte8G8xc32UMu8Fu3TSfusJI5vA/3wsrm19OrHM0AQnqoMq', NULL, NULL, '2022-01-05 04:29:36', '2022-01-05 04:29:36'),
(63, 'userEmail58@mail.ru', '$2y$10$6Xjl3.p35cR7qhz9ecbFTOi82QdLXkqGwe3O8IdktVAFftuD0WanW', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(64, 'userEmail59@mail.ru', '$2y$10$vNWQk/u5pZZJ.O09ZPu7q.63dvLEfUAhV1CLMC6yb2VL8CRbtoA8G', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(65, 'userEmail60@mail.ru', '$2y$10$Wk.75eWwaz6gJMUlDsSIN.H83eETvtvDGiUbxqo4NPsHaKj11hRaS', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(66, 'userEmail61@mail.ru', '$2y$10$.fztDGe1ffnbYZFP5X/V3.9yjVbjIdLl4rSFWS.krT9Lxs5vQSqVO', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(67, 'userEmail62@mail.ru', '$2y$10$L5R.xnDfoExRkQwuCME.1uf/jj696GVJsTPopmXvwDjSUvrr.DFry', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(68, 'userEmail63@mail.ru', '$2y$10$M56zHmglhmpwBLTlpaDUXes8dIJLYH4LVOqb/hAcm/rXmYZiMRHWG', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(69, 'userEmail64@mail.ru', '$2y$10$T/7WjIK51My.4WMwSSL5Gea5i7ofSAde8Pc.wKmriYBS/000755dO', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(70, 'userEmail65@mail.ru', '$2y$10$.ukRd2lGDo/OX7OMvUbszeXy0gpDTSTEXt95VtHW2UnWE8Yjhtcw6', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(71, 'userEmail66@mail.ru', '$2y$10$cIom0PR78fqVWahBr9e/BeZejifH7AYLiNsJt13wIcePaOCQxWYAi', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(72, 'userEmail67@mail.ru', '$2y$10$yLpiqiJ.mGiyDFK0fSdmGex5CxLL44qPJOLHwyTn2YX3ZDOr.dh3.', NULL, NULL, '2022-01-05 04:29:37', '2022-01-05 04:29:37'),
(73, 'userEmail68@mail.ru', '$2y$10$0zGKWKvv0YRabjtlZuDKcu.VJq0NBV2MbwQl8.vnEiuMkyE0i3Bc2', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(74, 'userEmail69@mail.ru', '$2y$10$.SAGyVT2SHrlxkcUmTyDb.5fYsCFxgRHQqS21msX59MClPsH.svmu', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(75, 'userEmail70@mail.ru', '$2y$10$GRK9Izzv/Ii.WUve4WwCnOrMwoGS0SrJEeAeFA2IBi.Y40HNINBdO', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(76, 'userEmail71@mail.ru', '$2y$10$R8SLbTuwb2kM92ZvgTsL6OVueOaVmdAwOaIqQtzk/6iPbOQ9qCGtq', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(77, 'userEmail72@mail.ru', '$2y$10$kX6lBBczTjKs55YyWj7kV.fwZNQaPhl8NSxDO/FXvN6CeyWBvgsN.', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(78, 'userEmail73@mail.ru', '$2y$10$VG7p8CrIMwr1D7chTa24fOw9Y4GQW61fCANb/g1a/aWbjV5bETvza', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(79, 'userEmail74@mail.ru', '$2y$10$GEZipem2dYMsLODnZm5bkuPqDycsmPX9k8igPRES4Z53N5aprYm4i', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(80, 'userEmail75@mail.ru', '$2y$10$wrSoxuO0QXbPghSFrtsPIeOrEYqfQZcezE6YNgSENtEHVp3mt7fYi', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(81, 'userEmail76@mail.ru', '$2y$10$2tdARnOp0q8bzocP/Eek3OF6WEu4FRs9RkiP8v.AryIXfNbELpbpy', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(82, 'userEmail77@mail.ru', '$2y$10$4RFiGi24O/hqspTViP9I1./pYhV.t9U1bPNXXx9yfD5.GPgt2EvU2', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(83, 'userEmail78@mail.ru', '$2y$10$8tGyFDQL8StfgN3I562Ph.74LBGwl.SVIY.BNs8vC4tS2PeNxz6Im', NULL, NULL, '2022-01-05 04:29:38', '2022-01-05 04:29:38'),
(84, 'userEmail79@mail.ru', '$2y$10$NKxPgATjzR2IecRYyhaiWOt7S6EdMOHHJwga8I0ZoETP7bhqJCmpC', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(85, 'userEmail80@mail.ru', '$2y$10$UB628vUEQoqlxizAXL5rEOBGYmwYyR0pLfJNmkPjjnpX1f/Vf/wcS', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(86, 'userEmail81@mail.ru', '$2y$10$S6fWMEUsblg0DJNeBLiMpOqCUz5E1/jP1qJjt54yxF4WOxiFsYse6', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(87, 'userEmail82@mail.ru', '$2y$10$CTk.eo4WRjxq2a/wDJUwa.zRGmDmLLUlvxVjKFiEz5Lc3eN/KCJ1K', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(88, 'userEmail83@mail.ru', '$2y$10$Yt3PkRZ01Xmt1B7Qs/cju.QGvRFA3.aqfXfOJD/WlO/0Lak/WyqKa', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(89, 'userEmail84@mail.ru', '$2y$10$zgLbjnOg.Y7f2hWaLLUe.eY/HzAnbauq7PVy5Qce5GzZHhwcRIdfa', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(90, 'userEmail85@mail.ru', '$2y$10$IBqJXRdOhGo1e9Rrk/3HG.pBBDUBgXmTvmJ9912RjNnQtWHqNXhPS', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(91, 'userEmail86@mail.ru', '$2y$10$KWipAZjGq5H/ehRIO3KCWO3XR6nO76jl.NssG65C3/wLtdiVUgV86', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(92, 'userEmail87@mail.ru', '$2y$10$NwZ7brR570cxt9qCcuf5deA7NnLSA/ZznHwqHcq8gYWfIK43TUG9.', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(93, 'userEmail88@mail.ru', '$2y$10$RHuAT4uKhVlm57vS9xODvuyxCE0To1zjZbF/bd79ub8grq77Tu98G', NULL, NULL, '2022-01-05 04:29:39', '2022-01-05 04:29:39'),
(94, 'userEmail89@mail.ru', '$2y$10$vEtCbJ/I1O4KfkKw/M7b7uHDgAWAygl74Z2gupCgbkz4i0.OIfAg6', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(95, 'userEmail90@mail.ru', '$2y$10$XrvqhcEoj/vKrx.Lm90CqOCyWNgYOdeavnMLuwWIXyiGbh4875mEC', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(96, 'userEmail91@mail.ru', '$2y$10$V/doujKytOoQo2YDAgywMuZufgbYtjggSyd3GkntGu72lRmH0VhRK', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(97, 'userEmail92@mail.ru', '$2y$10$SqHsLXa9GbHN.S9Hw2VgVOA804uBKpfQuJ05IvhKnMFVCy.ZTSsNK', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(98, 'userEmail93@mail.ru', '$2y$10$UBGWl8dd3Wfn3./FtWehtuE/oqeY3ZBYWVXFcVVr0fNhsrxOm14si', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(99, 'userEmail94@mail.ru', '$2y$10$FdJl.DwND/T6IRAOgEKJrO92OH/7M6SxINevYY2K1iG1Z0puq6SWy', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(100, 'userEmail95@mail.ru', '$2y$10$LoZJcemvzqnegKMbdVxyl.OLeRyfjzqpj8xreFidV7S8cbSy2P4TO', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(101, 'userEmail96@mail.ru', '$2y$10$32tWVWeSe1U0ScDXCaf.LO26FENvCqn4Nn.2myXboM2VnrM/9Nbmq', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(102, 'userEmail97@mail.ru', '$2y$10$XVQCem1aR5/4SMocUR.9HOc0GVfFv8uJrk7dwUDJPNi7gRWmHEm2G', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(103, 'userEmail98@mail.ru', '$2y$10$FXoFlgqvAeky.la0shSkI.0QurkC/jQkAeJT5idxFBup4nE0jNsIm', NULL, NULL, '2022-01-05 04:29:40', '2022-01-05 04:29:40'),
(104, 'userEmail99@mail.ru', '$2y$10$dXrYYqAWIbESMRGdDkR8FeMWAhAWsoUzxOW799wKm3.nMd0Jv3roq', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(105, 'userEmail100@mail.ru', '$2y$10$7emzEYhRSY31Q1cZa8IIkuwsB04kkW.2L.Tk3St26J3vO5agZ.eo2', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(106, 'userEmail101@mail.ru', '$2y$10$Roj/XHBo3vqrpRkXfBP9/uSbhwWtRpRr8r1hsi8.fof/Rn3FrEEcG', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(107, 'userEmail102@mail.ru', '$2y$10$9tgs5wtKcr1jpLzregfvTumLbIq4TAKXVeLPeBDUK1UgnubZHVu4y', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(108, 'userEmail103@mail.ru', '$2y$10$20c2.5PHn6C5iIqm1x9PvuydcUzxDt7yglRRBd7.rgJAr9CCSDbTK', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(109, 'userEmail104@mail.ru', '$2y$10$fmzFVtZziwoh2ptgFDo/pugOacUbQR0PfemxNEdq51Cb8qR7MxA8y', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(110, 'userEmail105@mail.ru', '$2y$10$EwNFWZjslLilpzxeEiJlyuQzkQKQqTscUmUGCtcQhs3/epD6.uO7m', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(111, 'userEmail106@mail.ru', '$2y$10$oJusSDqyB7bpCu/oyg3eguX7/c7WnMFhCXfLVDkMiRM.GD8FOhsdG', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(112, 'userEmail107@mail.ru', '$2y$10$gnGfRFwXrSjtx.f1sCd2vuRUwfwLr6.UFwPFl2N0Vq535IeS/4ksm', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(113, 'userEmail108@mail.ru', '$2y$10$iltVLmaLe0YbK0mRRDvE/.1lcWAC9SQkfaLvtd8AWvHSdbDxgqJKi', NULL, NULL, '2022-01-05 04:29:41', '2022-01-05 04:29:41'),
(114, 'userEmail109@mail.ru', '$2y$10$rMEsBKCCqGnqByax/AEoLenM.ORlr5T7sUmILQbFz4D6Hr6n07aQW', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(115, 'userEmail110@mail.ru', '$2y$10$bJs4.erpC/LxeaRO6imb9e5bp7ZGAF4h7HqSf3uPJT.gOyQN76Z0C', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(116, 'userEmail111@mail.ru', '$2y$10$RXk3CIC1FJOEthxxHElyi.YutBkLa8yz/LrXXwTOa3n3kbyLaGXhq', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(117, 'userEmail112@mail.ru', '$2y$10$b6FieCEReIDybq7pmSzF/eMkq5WWNmGmbdSsQgk9tb2ZZjHIpCMpK', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(118, 'userEmail113@mail.ru', '$2y$10$NyKi0qGTWXDf9LhnyysAkOu46Mt.AUs1ib2O6CzTbs.GAx1d8DaC2', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(119, 'userEmail114@mail.ru', '$2y$10$siBwplJ6z1JlrhEJdWlsB.gUHSlfkdaYOSC/TcMNR93ed8Y3FGoW2', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(120, 'userEmail115@mail.ru', '$2y$10$JzFLbG91Yq7dJeluMuz73.YzZp39j4Eij3oz91Kzfwq72S49L7xTi', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(121, 'userEmail116@mail.ru', '$2y$10$hCT/Na11ZkjR/jMaO/U2Y.LX6mVSyK/7zAS0i0LqDrIxok6.Ggo/m', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(122, 'userEmail117@mail.ru', '$2y$10$8mlJZjGFEXq.6FlY9ec0Uea9cxwo4HmuGbfCcWGxkaiUlC.TgaPPu', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(123, 'userEmail118@mail.ru', '$2y$10$ibTWPxAbFKO1oa7nyV3qoeQ34HGAEtF/3uUFz7DmJHxKAd9sL1W6e', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(124, 'userEmail119@mail.ru', '$2y$10$TB.ystIXSpcvzGTTolKJDu1SOGEKl3eUhRLufV9UtwKVhqs8nm2v.', NULL, NULL, '2022-01-05 04:29:42', '2022-01-05 04:29:42'),
(125, 'userEmail120@mail.ru', '$2y$10$cyyH7uoc.EPvSf7hBrkrY.piBxbgH6Y7nRGttruTPyaOVJUwsNbSa', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(126, 'userEmail121@mail.ru', '$2y$10$9Q04EdEbrtI7hEbvAPK2Bu6OtzdfAx07mMJ.ozzKGsgy/P.2u4r8y', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(127, 'userEmail122@mail.ru', '$2y$10$6XxIyJ.otACaWw97UUSZneM.82KGuMFwvQlyP.AAeRoVG3FTRCev2', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(128, 'userEmail123@mail.ru', '$2y$10$OmKcMks7uIDfg6gMbX7X6uL0vKpFV.//nZdysnRrQ9.8xuIqx1jiW', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(129, 'userEmail124@mail.ru', '$2y$10$6MFM.kq0Cjdu.TodGR/AouU0apYe/bwtAwAfo10PouQDQmL5iuhpe', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(130, 'userEmail125@mail.ru', '$2y$10$IJEjhqeX8Gbj.ASRSgX6m.3dyaFkTQ1F54YJOr6QfHOHF2zEssqbC', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(131, 'userEmail126@mail.ru', '$2y$10$LsOZYoUQk8mVi8xMVidYaOSCNXqMilekYyBYyzSPYAqBzX4j6YDye', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(132, 'userEmail127@mail.ru', '$2y$10$iKnhTaa5um./dJv0yjLK1.rF07Xa731jB7cl3XdGol3BTVtyNZEPa', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(133, 'userEmail128@mail.ru', '$2y$10$bMUaJVGGXUCxBV6zT4c/CuexRO0J88.ExX8R.hHc3.N167Bbvr.9i', NULL, NULL, '2022-01-05 04:29:43', '2022-01-05 04:29:43'),
(134, 'userEmail129@mail.ru', '$2y$10$HRA1NsSmIghsgQ83HLP5ZuzkxNjiPBbC00QPZ1IxxoPVXf7jKPMYW', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(135, 'userEmail130@mail.ru', '$2y$10$3iZEva4bgK1Ind8BCPNvPeTFLkIU0UwpkT9MsGw1rqf0jztIXl60O', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(136, 'userEmail131@mail.ru', '$2y$10$8QeN8DG/zC.U/h55WzFvn.f3ijsiPu0FoK8cNnJN3Kxs/sz8XoDNm', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(137, 'userEmail132@mail.ru', '$2y$10$lwYw912Zvx7RWD/VXD3aWO5iwCclU0sjJ3dlRTo2ENgHYPkwdmPti', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(138, 'userEmail133@mail.ru', '$2y$10$CxnMGBHdpqhsTYe0dJv6bOHVKQ3gzciameaYTsyHTrPVlRFFFtiHe', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(139, 'userEmail134@mail.ru', '$2y$10$9i4zmNbHo1QMQIEHhVEb/uwoSCl7ToKRXFDy01t7BxNIOZKsDzU2.', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(140, 'userEmail135@mail.ru', '$2y$10$qFc5PLOlNccBwtYubxrDPuNDMt1l5C9iZNdW4aBH/qICfLVCdeozu', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(141, 'userEmail136@mail.ru', '$2y$10$xJQn9nJtVkFhi.eITttTpeqWYRD7BU9m5tnljnh5sS43cM9m5t93m', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(142, 'userEmail137@mail.ru', '$2y$10$PK8cVW9jZy.B0E5ZFq2JIuZaM.8/abzaZrn2IYr8nJMexI66AqaB2', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(143, 'userEmail138@mail.ru', '$2y$10$HkoXyrH9AtnMxCZMW2EOQuJjjKY3zI9ChXOqdwhmeoooy6S2vPC4O', NULL, NULL, '2022-01-05 04:29:44', '2022-01-05 04:29:44'),
(144, 'userEmail139@mail.ru', '$2y$10$24boIFu2PoBdOgFAgdfoJuRLrdsDwOsFk1iWl3CY3PSI9GonpM0h.', NULL, NULL, '2022-01-05 04:29:45', '2022-01-05 04:29:45'),
(145, 'userEmail140@mail.ru', '$2y$10$OqxKrV2TrzbqIF69graS0u3o2ozDT.MT49wCfgaZfqxZI7El0GDDK', NULL, NULL, '2022-01-05 04:29:45', '2022-01-05 04:29:45'),
(146, 'userEmail141@mail.ru', '$2y$10$vHa60P0mYY8ayLEwysgQGOOkWPF/JOfl6tqZXjfX.JBznAh0yyg8O', NULL, NULL, '2022-01-05 04:29:45', '2022-01-05 04:29:45'),
(147, 'userEmail142@mail.ru', '$2y$10$ppeLEXJ3SYopuUora5eMxONwQZpNQggOAo9prk9POMaqoxBgRJBgS', NULL, NULL, '2022-01-05 04:29:45', '2022-01-05 04:29:45'),
(148, 'userEmail143@mail.ru', '$2y$10$oPGcemEHENrNhYr8hhp.l.vFVny0pze5bJXCg8MEkjrOwdmApfHa6', NULL, NULL, '2022-01-05 04:29:45', '2022-01-05 04:29:45'),
(149, 'userEmail144@mail.ru', '$2y$10$Oi/z6fWqBKwJU1qkO./dOuWszByxODdmsug44gTHAtiEJRBry1eUa', NULL, NULL, '2022-01-05 04:29:45', '2022-01-05 04:29:45'),
(150, 'userEmail145@mail.ru', '$2y$10$8u4.vZNqbMCEyICFKh./MOvaHtfB6AX66/DiG/.T52OyCWti40zv6', NULL, NULL, '2022-01-05 04:29:45', '2022-01-05 04:29:45'),
(151, 'userEmail146@mail.ru', '$2y$10$ZFtRMffpTmOLRmP7ggGcF.5CIwA1IUFzLAwJO4MaD48spYdjY8fTa', NULL, NULL, '2022-01-05 04:29:45', '2022-01-05 04:29:45'),
(152, 'userEmail147@mail.ru', '$2y$10$66XfsFeE20A.nEBtRysCduU0l2Pb2I5MoEFIiQTGpr1vouIZkMUiq', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(153, 'userEmail148@mail.ru', '$2y$10$Kd97WHg3epXcdb.Q4bTbZefeIL/DYfocRlRz9apOsnpFgrk2fWEOG', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(154, 'userEmail149@mail.ru', '$2y$10$JMIHSmu5xP70zO1yEM2OteEyAABZMSqSGBnhUHU7pvqdtt2dpD7S2', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(155, 'userEmail150@mail.ru', '$2y$10$hA7Ozbl0niQpR1cse1HnquRKLPg53Fe/BUoigJleNF/a6LqXAdgMK', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(156, 'userEmail151@mail.ru', '$2y$10$LT.u0Vf1FDEiTfUPw7kUWuTtf3cJCyfj8hentYNUcmlzGoCo8aPJS', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(157, 'userEmail152@mail.ru', '$2y$10$9dHHlkCpt0ncN7DHZGWT9uXBGPb.YmhfNNFAiAO1dVW096lD092gu', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(158, 'userEmail153@mail.ru', '$2y$10$HUda9IgOdWqZ0z4gDS7Xbu4WxQsM6SGywj2gKrXvaAzivS3WNMMym', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(159, 'userEmail154@mail.ru', '$2y$10$SAxuWiByGCL/rj0FOcH/Y.sqUDLC9pTk3mNfm0bZwuPzfvA8pRTAW', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(160, 'userEmail155@mail.ru', '$2y$10$HYWUdYDRV3XCLUrwXbScluPkiA7y/CL.ayUnVPSHpu.7fv0NpIcUO', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(161, 'userEmail156@mail.ru', '$2y$10$LxQ0UivO/vEfwqq/pDXh0ebbmKlBjTO84UlvuCv4b4xEoaA5pU73O', NULL, NULL, '2022-01-05 04:29:46', '2022-01-05 04:29:46'),
(162, 'userEmail157@mail.ru', '$2y$10$vK6mb.WE9VYL1BqfZ.2ATO/gO2J5WyIiK6lklI1aBsqNtIsSAqY5a', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(163, 'userEmail158@mail.ru', '$2y$10$a/ZcAx7gKk8ZaIgFPVBmzenrFD8c/YT9yUmqvgLnJCIj97fVWsNJu', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(164, 'userEmail159@mail.ru', '$2y$10$qMBOAR2uO2dHRbQrKD2Ia.iSgtxwfkQgqiTcCAFBZskpPvZg3zDEe', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(165, 'userEmail160@mail.ru', '$2y$10$YaStdgoS3N3ic8Vh5E6k3erk7ukXggCGruYNcP7KhmLCKWmXoLK/i', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(166, 'userEmail161@mail.ru', '$2y$10$eAOS599zS7d7jUE55.7pdugZFRF.nx81No3KI6ioBoEp3cc/3MFcC', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(167, 'userEmail162@mail.ru', '$2y$10$jxDdAJ181JAqiQFDvAhOkOeNQoe3ay21sxdq3Ip/Pv6m3I6syzF7S', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(168, 'userEmail163@mail.ru', '$2y$10$MgxklqTFRHf6PjfJoinIfeE2TnmArLG15v5DvSsrsbFypNaJ9aDYm', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(169, 'userEmail164@mail.ru', '$2y$10$oGljhOkvLgqDUtfVB7MerOi8wgMu8GsInSPQV4v11yenj3nXGF3H2', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(170, 'userEmail165@mail.ru', '$2y$10$ReqOv/97vgKOCNo8Vyjvlu5aoMCyS6KDhekdeqAvmo4/wrHtUySf.', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(171, 'userEmail166@mail.ru', '$2y$10$9dq1MkPMeWbx.feZcApVduJhc0DKuynGz6l2CIMdaRmS3E8YU9LTK', NULL, NULL, '2022-01-05 04:29:47', '2022-01-05 04:29:47'),
(172, 'userEmail167@mail.ru', '$2y$10$G2TVykivA4AO/JSG5SA1pe0bMaJhEQPmRRvkjzSvUBgEyNzZ2j.OS', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(173, 'userEmail168@mail.ru', '$2y$10$488Cs/4LZMuVwOgEhR/2H.915IzWx//ZXmNEJwc4ct74b3DIWuxlG', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(174, 'userEmail169@mail.ru', '$2y$10$9QvjmvIDnO1/61GZi/sxTeLBVTLqYnotE.EQbQI52Pf6IywneZZg.', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(175, 'userEmail170@mail.ru', '$2y$10$st2DaHAZxJxUbt9NQ.kNqOlGRpXr/u1SqXEzy7X2mee38iiMG6arO', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(176, 'userEmail171@mail.ru', '$2y$10$9GiU.XgGd4btyj/e0OG5f.OapTaVSu/qUQb/FwhijGm8alQ7U6sYO', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(177, 'userEmail172@mail.ru', '$2y$10$cXQ/4Fkm482lOv4m6tibyezTXhfqLzsDrT8VyiSBmvcpNW5MXXrZu', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(178, 'userEmail173@mail.ru', '$2y$10$cjJWf.NjAzDErXoe6M020O8UaPv/lQCWkXy0PWEtDI.6mkIovBhta', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(179, 'userEmail174@mail.ru', '$2y$10$Mwf04WkVtBvU.p8Pr5C0m.m2A3S5HS3X70WHA0wGcgvRDMVdH3w0C', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(180, 'userEmail175@mail.ru', '$2y$10$zJRir.k0iISTFVkQoNZAUOimVVCP8Q6y4Y9U2r7qjyQwyVyPTdFxi', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(181, 'userEmail176@mail.ru', '$2y$10$hhtF2sMwvuuG1rmK5FQeM.yE1ldg1DV9PphMNGvhIjxUsSn0ghDBW', NULL, NULL, '2022-01-05 04:29:48', '2022-01-05 04:29:48'),
(182, 'userEmail177@mail.ru', '$2y$10$HBrD7bJyy0A1qHiTqnwxfuttYxqTuUtrDGuESAt/8BXDEZAzTmgve', NULL, NULL, '2022-01-05 04:29:49', '2022-01-05 04:29:49'),
(183, 'userEmail178@mail.ru', '$2y$10$h3xcY0JJFu02VF747wdoWO5RWK0kyEB06/6ID3pWgXXYUYyu.GzFy', NULL, NULL, '2022-01-05 04:29:49', '2022-01-05 04:29:49'),
(184, 'userEmail179@mail.ru', '$2y$10$utpsKvy6fmlDHYittYTgReFtl3kGeDUWsr1In/zbgaMyLJOJ/6KBa', NULL, NULL, '2022-01-05 04:29:49', '2022-01-05 04:29:49'),
(185, 'userEmail180@mail.ru', '$2y$10$BnBCws98zSpfKxf/4PogQugrGqp0DlW2rqG0L19e0dQejMQF9dsMC', NULL, NULL, '2022-01-05 04:29:49', '2022-01-05 04:29:49'),
(186, 'userEmail181@mail.ru', '$2y$10$XZB4TBDTGMi19ITU/moLCurl.25ecz/lrNnJbpb.Xxxwa7RlAQb4q', NULL, NULL, '2022-01-05 04:29:49', '2022-01-05 04:29:49'),
(187, 'userEmail182@mail.ru', '$2y$10$76bhPRPfYIoD3H1gtnYcAeaNg/4aJ3JKlBzJRnFewQmdRZKUhNVw.', NULL, NULL, '2022-01-05 04:29:49', '2022-01-05 04:29:49'),
(188, 'userEmail183@mail.ru', '$2y$10$GhVNSZ0yGZDHxReeuV3Pxeedt8.kmXzzShaxLemBLv4ALXyBxPvq.', NULL, NULL, '2022-01-05 04:29:49', '2022-01-05 04:29:49'),
(189, 'userEmail184@mail.ru', '$2y$10$kE4FlPjLLMqEHoeM7ftLaum/JGyOQoTKgooO.AG2TrFYjouNJrbWy', NULL, NULL, '2022-01-05 04:29:49', '2022-01-05 04:29:49'),
(190, 'userEmail185@mail.ru', '$2y$10$ihj8oMK51WlKRpSXVESG3u5K3WYCWEANYuCP/0xhcJIG8xosqhW0u', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(191, 'userEmail186@mail.ru', '$2y$10$ha4cIRj59wK4HszGAQojdeLXBh89cknsy/Bep7qAwWi7P8AhFT8RC', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(192, 'userEmail187@mail.ru', '$2y$10$4sZEwI0f7bvVwlGsyzWBoup8fe31UTk8FrA8gAT/G/2RUG8nClTdC', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(193, 'userEmail188@mail.ru', '$2y$10$Yl63bN6H523S.HMRmBMJpO4ZQJc0.Sb5qidEeUbqgyIhYHKJZshEG', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(194, 'userEmail189@mail.ru', '$2y$10$eWTsG9nUYEximNEgC1FzKOtOF8NUDMdfKFycLS01yrSMlvFFNX7XC', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(195, 'userEmail190@mail.ru', '$2y$10$jyLNwXoiwJjwSxrSI8A4Aur0T/AVlnE4Y4tk5puG1j6zAfIHkxvOu', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(196, 'userEmail191@mail.ru', '$2y$10$fr40D1HxuFI5bFWtHEml2OqiKxYDdIw9y5b4sJWsrs3xuF3Bm0aHi', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(197, 'userEmail192@mail.ru', '$2y$10$kCeFMhlAW0.M5EBGiU2cWuN7vA7X3zoe2zL.//zp4vGGlOVNYo262', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(198, 'userEmail193@mail.ru', '$2y$10$Ep8k1pvQedVwnvGqoCP1cOA1FtOgqK31/6cbmN7kqH/aUXzh/MD2y', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(199, 'userEmail194@mail.ru', '$2y$10$/35UsTnysgSb59xblCqWCe76JmYwis9xSHCejZufu9rEcp/CiEFoa', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(200, 'userEmail195@mail.ru', '$2y$10$eTEIRLLhbBja1zaCBLpmzuDc/0uaCmnSBt953.o7T1HV3y82IusWK', NULL, NULL, '2022-01-05 04:29:50', '2022-01-05 04:29:50'),
(201, 'userEmail196@mail.ru', '$2y$10$IaKa0Ft4e32mtVqpASg.3Ocst9Ng1vjyrvGxvX7v0EG5JT57XFRlK', NULL, NULL, '2022-01-05 04:29:51', '2022-01-05 04:29:51'),
(202, 'userEmail197@mail.ru', '$2y$10$FcY2k15ITVnNTdJs5dEiFuR.3OZPtyLeRUJceoFH99gS2Fy8sMqQS', NULL, NULL, '2022-01-05 04:29:51', '2022-01-05 04:29:51'),
(203, 'userEmail198@mail.ru', '$2y$10$W2eusL8/sIBVi3y/9imHDO8gYpcMcU0aJJ.FWWrns5bD0u72E8nxa', NULL, NULL, '2022-01-05 04:29:51', '2022-01-05 04:29:51'),
(204, 'userEmail199@mail.ru', '$2y$10$8jR3W64T81/S1cJk9/WRFu9oWbARSFExwaT8L6A5JuC1BdUvTPr7e', NULL, NULL, '2022-01-05 04:29:51', '2022-01-05 04:29:51'),
(205, 'userEmail200@mail.ru', '$2y$10$IxE5bAVW4lxHt9vH9K5rD.bnTy8/1H.fYROOOwwTUsrNHmEuu9lqK', NULL, NULL, '2022-01-05 04:29:51', '2022-01-05 04:29:51'),
(206, 'sifecs15@mail.ru', '$2y$10$E46NOxXlGVTH3nqcejkgzORsWXk.4YQBjbvUJsjyVA4ES/kMX.TIq', NULL, NULL, '2022-01-05 05:09:20', '2022-01-05 05:09:20');

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
  `timezone` timestamp NOT NULL,
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
(6, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa1@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 1, NULL, NULL),
(7, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa2@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 2, NULL, NULL),
(8, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa3@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 3, NULL, NULL),
(9, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa4@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 4, NULL, NULL),
(10, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa5@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 5, NULL, NULL),
(11, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa6@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 6, NULL, NULL),
(12, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa7@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 7, NULL, NULL),
(13, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa8@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 8, NULL, NULL),
(14, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa9@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 9, NULL, NULL),
(15, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa10@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 10, NULL, NULL),
(16, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa11@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 11, NULL, NULL),
(17, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa12@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 12, NULL, NULL),
(18, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa13@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 13, NULL, NULL),
(19, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa14@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 14, NULL, NULL),
(20, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa15@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 15, NULL, NULL),
(21, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa16@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 16, NULL, NULL),
(22, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa17@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 17, NULL, NULL),
(23, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa18@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 18, NULL, NULL),
(24, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa19@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 19, NULL, NULL),
(25, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa20@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 20, NULL, NULL),
(26, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa21@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 21, NULL, NULL),
(27, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa22@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 22, NULL, NULL),
(28, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa23@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 23, NULL, NULL),
(29, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa24@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 24, NULL, NULL),
(30, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa25@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 25, NULL, NULL),
(31, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa26@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 26, NULL, NULL),
(32, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa27@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 27, NULL, NULL),
(33, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa28@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 28, NULL, NULL),
(34, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa29@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 29, NULL, NULL),
(35, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa30@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 30, NULL, NULL),
(36, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa31@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 31, NULL, NULL),
(37, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa32@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 32, NULL, NULL),
(38, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa33@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 33, NULL, NULL),
(39, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa34@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 34, NULL, NULL),
(40, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa35@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 35, NULL, NULL),
(41, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa36@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 36, NULL, NULL),
(42, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa37@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 37, NULL, NULL),
(43, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa38@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 38, NULL, NULL),
(44, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa39@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 39, NULL, NULL),
(45, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa40@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 40, NULL, NULL),
(46, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa41@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 41, NULL, NULL),
(47, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa42@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 42, NULL, NULL),
(48, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa43@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 43, NULL, NULL),
(49, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa44@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 44, NULL, NULL),
(50, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa45@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 45, NULL, NULL),
(51, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa46@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 46, NULL, NULL),
(52, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa47@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 47, NULL, NULL),
(53, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa48@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 48, NULL, NULL),
(54, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa49@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 49, NULL, NULL),
(55, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa50@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 50, NULL, NULL),
(56, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa51@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 51, NULL, NULL),
(57, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa52@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 52, NULL, NULL),
(58, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa53@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 53, NULL, NULL),
(59, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa54@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 54, NULL, NULL),
(60, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa55@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 55, NULL, NULL),
(61, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa56@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 56, NULL, NULL),
(62, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa57@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 57, NULL, NULL),
(63, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa58@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 58, NULL, NULL),
(64, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa59@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 59, NULL, NULL),
(65, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa60@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 60, NULL, NULL),
(66, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa61@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 61, NULL, NULL),
(67, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa62@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 62, NULL, NULL),
(68, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa63@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 63, NULL, NULL),
(69, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa64@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 64, NULL, NULL),
(70, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa65@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 65, NULL, NULL),
(71, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa66@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 66, NULL, NULL),
(72, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa67@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 67, NULL, NULL),
(73, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa68@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 68, NULL, NULL),
(74, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa69@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 69, NULL, NULL),
(75, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa70@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 70, NULL, NULL),
(76, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa71@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 71, NULL, NULL),
(77, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa72@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 72, NULL, NULL),
(78, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa73@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 73, NULL, NULL),
(79, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa74@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 74, NULL, NULL),
(80, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa75@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 75, NULL, NULL),
(81, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa76@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 76, NULL, NULL),
(82, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa77@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 77, NULL, NULL),
(83, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa78@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 78, NULL, NULL),
(84, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa79@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 79, NULL, NULL),
(85, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa80@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 80, NULL, NULL),
(86, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa81@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 81, NULL, NULL),
(87, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa82@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 82, NULL, NULL),
(88, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa83@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 83, NULL, NULL),
(89, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa84@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 84, NULL, NULL),
(90, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa85@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 85, NULL, NULL),
(91, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa86@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 86, NULL, NULL),
(92, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa87@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 87, NULL, NULL),
(93, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa88@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 88, NULL, NULL),
(94, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa89@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 89, NULL, NULL),
(95, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa90@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 90, NULL, NULL),
(96, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa91@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 91, NULL, NULL),
(97, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa92@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 92, NULL, NULL),
(98, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa93@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 93, NULL, NULL),
(99, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa94@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 94, NULL, NULL),
(100, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa95@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 95, NULL, NULL),
(101, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa96@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 96, NULL, NULL),
(102, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa97@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 97, NULL, NULL),
(103, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa98@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 98, NULL, NULL),
(104, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa99@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 99, NULL, NULL),
(105, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa100@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 100, NULL, NULL),
(106, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa101@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 101, NULL, NULL),
(107, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa102@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 102, NULL, NULL),
(108, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa103@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 103, NULL, NULL),
(109, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa104@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 104, NULL, NULL),
(110, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa105@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 105, NULL, NULL),
(111, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa106@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 106, NULL, NULL),
(112, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa107@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 107, NULL, NULL),
(113, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa108@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 108, NULL, NULL),
(114, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa109@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 109, NULL, NULL),
(115, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa110@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 110, NULL, NULL),
(116, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa111@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 111, NULL, NULL),
(117, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa112@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 112, NULL, NULL),
(118, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa113@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 113, NULL, NULL),
(119, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa114@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 114, NULL, NULL),
(120, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa115@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 115, NULL, NULL),
(121, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa116@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 116, NULL, NULL),
(122, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa117@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 117, NULL, NULL),
(123, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa118@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 118, NULL, NULL),
(124, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa119@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 119, NULL, NULL),
(125, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa120@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 120, NULL, NULL),
(126, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa121@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 121, NULL, NULL),
(127, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa122@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 122, NULL, NULL),
(128, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa123@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 123, NULL, NULL),
(129, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa124@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 124, NULL, NULL),
(130, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa125@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 125, NULL, NULL),
(131, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa126@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 126, NULL, NULL),
(132, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa127@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 127, NULL, NULL),
(133, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa128@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 128, NULL, NULL),
(134, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa129@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 129, NULL, NULL),
(135, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa130@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 130, NULL, NULL),
(136, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa131@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 131, NULL, NULL),
(137, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa132@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 132, NULL, NULL),
(138, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa133@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 133, NULL, NULL),
(139, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa134@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 134, NULL, NULL),
(140, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa135@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 135, NULL, NULL),
(141, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa136@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 136, NULL, NULL),
(142, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa137@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 137, NULL, NULL),
(143, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa138@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 138, NULL, NULL),
(144, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa139@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 139, NULL, NULL),
(145, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa140@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 140, NULL, NULL),
(146, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa141@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 141, NULL, NULL),
(147, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa142@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 142, NULL, NULL),
(148, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa143@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 143, NULL, NULL),
(149, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa144@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 144, NULL, NULL),
(150, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa145@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 145, NULL, NULL),
(151, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa146@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 146, NULL, NULL),
(152, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa147@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 147, NULL, NULL),
(153, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa148@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 148, NULL, NULL),
(154, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa149@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 149, NULL, NULL),
(155, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa150@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 150, NULL, NULL),
(156, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa151@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 151, NULL, NULL),
(157, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa152@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 152, NULL, NULL),
(158, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa153@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 153, NULL, NULL),
(159, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa154@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 154, NULL, NULL),
(160, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa155@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 155, NULL, NULL),
(161, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa156@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 156, NULL, NULL),
(162, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa157@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 157, NULL, NULL),
(163, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa158@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 158, NULL, NULL),
(164, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa159@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 159, NULL, NULL),
(165, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa160@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 160, NULL, NULL),
(166, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa161@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 161, NULL, NULL),
(167, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa162@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 162, NULL, NULL),
(168, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa163@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 163, NULL, NULL),
(169, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa164@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 164, NULL, NULL),
(170, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa165@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 165, NULL, NULL),
(171, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa166@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 166, NULL, NULL),
(172, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa167@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 167, NULL, NULL),
(173, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa168@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 168, NULL, NULL),
(174, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa169@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 169, NULL, NULL),
(175, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa170@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 170, NULL, NULL),
(176, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa171@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 171, NULL, NULL),
(177, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa172@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 172, NULL, NULL),
(178, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa173@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 173, NULL, NULL),
(179, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa174@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 174, NULL, NULL),
(180, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa175@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 175, NULL, NULL),
(181, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa176@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 176, NULL, NULL),
(182, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa177@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 177, NULL, NULL),
(183, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa178@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 178, NULL, NULL),
(184, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa179@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 179, NULL, NULL),
(185, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa180@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 180, NULL, NULL),
(186, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa181@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 181, NULL, NULL),
(187, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa182@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 182, NULL, NULL),
(188, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa183@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 183, NULL, NULL),
(189, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa184@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 184, NULL, NULL),
(190, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa185@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 185, NULL, NULL),
(191, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa186@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 186, NULL, NULL),
(192, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa187@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 187, NULL, NULL),
(193, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa188@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 188, NULL, NULL),
(194, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa189@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 189, NULL, NULL),
(195, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa190@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 190, NULL, NULL),
(196, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa191@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 191, NULL, NULL),
(197, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa192@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 192, NULL, NULL),
(198, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa193@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 193, NULL, NULL),
(199, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa194@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 194, NULL, NULL),
(200, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa195@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 195, NULL, NULL),
(201, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa196@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 196, NULL, NULL),
(202, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa197@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 197, NULL, NULL),
(203, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa198@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 198, NULL, NULL),
(204, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa199@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 199, NULL, NULL),
(205, NULL, NULL, '+996708715281', 'test', 'aldeevsk', 'tdhsssaaaa200@mail.ru', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-05', 'tdhsssaaaa', '11111', 'verified', 200, NULL, NULL),
(206, 'Снимок экрана (1).png', 'Снимок экрана (1).png', '+996708715281', 'test', 'ssssssssss', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2022-01-07', 'sddsdsd', '1244351', 'verified', 206, NULL, NULL);

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tournamets_team`
--
ALTER TABLE `tournamets_team`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT для таблицы `users_profile2`
--
ALTER TABLE `users_profile2`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

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
