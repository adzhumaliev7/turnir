-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 07 2021 г., 16:46
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
-- Структура таблицы `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'test', '', 'admin', NULL, NULL);

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
(10, '2021_12_07_093441_tournament', 7);

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
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13);

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
(2, 'admin', 'web', '2021-11-20 01:23:12', '2021-11-20 01:23:12');

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
(1, '8', NULL, 'test team', 'captain', NULL, NULL);

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
(1, 1, 8, 'captain', NULL, NULL),
(2, 1, 13, 'member', NULL, NULL);

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
  `timezone` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `players_col` int DEFAULT NULL,
  `file_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_reg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot_kolvo` int DEFAULT NULL,
  `end_reg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ligue` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rule` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `layouts` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_t` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_t` time DEFAULT NULL,
  `file_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `tournament_start`, `country`, `countries`, `format`, `games_time`, `timezone`, `players_col`, `file_1`, `description`, `start_reg`, `slot_kolvo`, `end_reg`, `ligue`, `rule`, `layouts`, `header`, `description2`, `date_t`, `time_t`, `file_2`, `status`, `created_at`, `updated_at`) VALUES
(4, '77777', '2021-12-12', 'KG', NULL, NULL, '18:56:00', '2021-12-07 11:56:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2222@mail.com', 'paroltest', NULL, '2021-11-09 03:13:55', '2021-11-09 03:13:55'),
(3, '22232@mail.com', '$2y$10$gsVI6CE8VHxLxR18j6eXGe3xKMyxJNcdKmLImAwUWzebir2FhNFZW', NULL, '2021-11-09 03:23:32', '2021-11-09 03:23:32'),
(4, 'aidar300799@gmail.com', '$2y$10$1UdAKsu/IC5ShZpZ3FnRKuf2CBWmx3QbIi/MbzKzQM.pms5NjirTq', NULL, '2021-11-09 03:35:26', '2021-11-09 03:35:26'),
(5, 'instructor@mail.com', '$2y$10$X/MyqMHEW2COGj/eQmSMJ.wJC4tVYColTByF6xKI8ZZ/OaHUYu70O', NULL, '2021-11-13 03:44:28', '2021-11-13 03:44:28'),
(7, 'thehangover24@gmail.com', '$2y$10$gkmtZWB4lRqtK5noECOS1.opwxBGx00jH4y7dFNgrXeZNko3OiGFy', NULL, '2021-11-20 01:33:16', '2021-11-20 01:33:16'),
(8, 'admin@gmail.com', '$2y$10$Rhzfh1on8P813oRAZhiZhOrp3tlvvqiEBnaoAsBppIdN.HJAjW5rO', NULL, '2021-11-20 01:39:53', '2021-11-20 01:39:53'),
(9, 'test@gmail.com', '$2y$10$NfRAPO4NyJbAYkALJrpYhOHUErPF9ZipDSeCC4r7/vj3pxlnY2Z/6', NULL, '2021-11-22 02:38:07', '2021-11-22 02:38:07'),
(10, 'thehangover242@gmail.com', '$2y$10$ODKef3a5A8XI4ht7P5WVy.A4rwtjbYyLxSKDJKuXNMaasRj7/lkiG', NULL, '2021-11-22 04:44:45', '2021-11-22 04:44:45'),
(11, 'new@gmail.com', '$2y$10$nDNiYGC.B8M82wbR1Bst1.KSKFpgFv262KqAZV3zvzp7zmJd6rEPG', NULL, '2021-11-23 07:27:49', '2021-11-23 07:27:49'),
(12, 'adzhumaliev7@gmail.com', '$2y$10$5KdA8b9bc3kAUUl0s/HqVugt.//7uqrzApOlfUC9e3SzNG7/TaT.K', NULL, '2021-11-29 06:53:42', '2021-11-29 06:53:42'),
(13, 'mytest@gmail.com', '$2y$10$a85tEZAw7hGG96SumdXezu4H2gpUj.XO.CFMB.nuz4yBYLcRz7R.a', NULL, '2021-12-02 23:43:25', '2021-12-02 23:43:25');

-- --------------------------------------------------------

--
-- Структура таблицы `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int NOT NULL,
  `doc_photo` varchar(255) NOT NULL,
  `doc_photo2` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `timezone` timestamp NOT NULL,
  `city` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `game_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users_profile`
--

INSERT INTO `users_profile` (`id`, `doc_photo`, `doc_photo2`, `phone`, `fio`, `login`, `email`, `country`, `timezone`, `city`, `bdate`, `nickname`, `game_id`, `created_at`, `updated_at`) VALUES
(1, '2', '2', '+996708715281', 'o-', 'aldeevsk', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdh', 'dfgh', NULL, NULL),
(2, '2', '2', '123213213', 'aAA', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdhsss', 'dfgh111', NULL, NULL),
(3, '2', '2', '123213213', 'aAA', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdhsss', 'dfgh111', NULL, NULL),
(4, '2', '2', '123213213', 'aAA', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdhsss', 'dfgh111', NULL, NULL),
(5, '2', '2', '123213213', 'aAA', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdhsss', 'dfgh111', NULL, NULL),
(6, '2', '2', '123213213', 'aAA', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdhsss', 'dfgh111', NULL, NULL),
(7, '2', '2', '123213213', 'aAA', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdhsss', 'dfgh111', NULL, NULL),
(8, '2', '2', '123213213', 'aAA', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdhsss', 'dfgh111', NULL, NULL),
(9, '2', '2', '123213213', 'aAA', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-07-14', 'tdhsss', 'dfgh111', NULL, NULL),
(10, '2', '2', '+996708715281', 'test', 'tiar.rait', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-11-10', 'tdhsssaaaa', '111111111', NULL, NULL),
(11, '2', '2', 'aaer', 'test', 'thehangover24@gmail.com', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-12-09', '123', '4444444', NULL, NULL);

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
(1, '2_5240399613436891685.pdf', 'turnir (1).sql', '+996708715281', 'test', 'adzhumaliev', 'aidar300799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-11-25', 'tdh', '11111111', 'verified', 4, NULL, NULL),
(4, '-5224211697470911643_121.jpg', 'neg.pdf', '+996708715281', 'test', 'aldeevsk', 'aidar300444@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-11-19', 'aldeevsk', '4444444', 'on_check', 2, NULL, NULL),
(6, '2_5231109139614143149.png', '2_5231109139614143144.png', '+996708715281', 'test', 'aldeevsk', 'aidar3007911129@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-11-22', 'aldeevsk', '4444444', 'verified', 0, NULL, NULL),
(7, 'WhatsApp Image 2021-10-30 at 16.37.27.jpeg', 'screenshot.png', '+996708715281', 'aAA3245', 'Detskiy1103', 'aidasss0799@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-11-17', 'tdhsssaaaa', '11111111', 'verified', 7, NULL, NULL),
(8, 'screenshot.png', 'Снимок экрана (1).png', '+996708715281', 'Новый', 'tiar.rait', 'new@gmail.com', 'Киргизия', '1989-12-31 18:00:00', 'Бишкек', '2021-11-23', 'tdh', '4444444', 'verified', 11, NULL, NULL),
(10, 'screenshot.png', 'Снимок экрана (1).png', '5544546456', 'Айдар', 'aidar', 'adzhumaliev7@gmail.com', 'Кыргызстан', '1989-12-31 18:00:00', 'saadasd', '2021-11-29', 'aidar', '1111111111111111111111', 'verified', 12, NULL, NULL),
(12, 'screenshot.png', 'Снимок экрана (1).png', '+996708715281', 'Admin', 'Admin', 'admin@gmail.com', 'KG', '1989-12-31 18:00:00', 'Бишкек', '2021-12-03', 'aldeevsk', '4444444', 'verified', 8, NULL, NULL),
(13, 'screenshot.png', 'Снимок экрана (1).png', '5544546456', 'asdsdas', 'aaaaaaa', 'mytest@gmail.com', 'Кыргызстан', '1989-12-31 18:00:00', 'saadasd', '2021-12-07', 'aidar', '1111111111111111111111', 'on_check', 13, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users_profile2`
--
ALTER TABLE `users_profile2`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
