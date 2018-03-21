-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 20 2018 г., 20:01
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wonde.local`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `short_name`, `created_at`, `updated_at`) VALUES
(1, 'Мировые новости', 'worldnews', NULL, NULL),
(2, 'Новости спорта', 'sport', NULL, NULL),
(3, 'Новости Краматорска', 'kramatorsk', NULL, NULL),
(4, 'Новости экономики', 'economics', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fileentries_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `subject`, `message`, `news_id`, `created_at`, `updated_at`, `fileentries_id`) VALUES
(1, 'test1', 'test1@test1.test1', 'awdwad', 'awdwa awdwadawd awwdawd', 4, '2018-03-18 11:40:26', '2018-03-18 11:40:26', 10),
(2, 'test1', 'test1@test1.test1', 'awdawd', 'awdwad awdwad awdwadawd', 4, '2018-03-18 11:40:49', '2018-03-18 11:40:50', 11),
(3, 'test1', 'test1@test1.test1', 'fdsadaf', 'adfsadf', 4, '2018-03-18 11:46:53', '2018-03-18 11:46:53', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `fileentries`
--

CREATE TABLE `fileentries` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phash` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `fileentries`
--

INSERT INTO `fileentries` (`id`, `filename`, `mime`, `original_filename`, `storage_path`, `phash`, `banned`, `comment_id`, `created_at`, `updated_at`) VALUES
(1, '1521378118.jpg', 'image/jpeg', 'koala1.jpg', '/storage/projects/test1/1521378118.jpg', 'a:64:{i:0;i:0;i:1;i:0;i:2;i:1;i:3;i:0;i:4;i:1;i:5;i:1;i:6;i:1;i:7;i:0;i:8;i:0;i:9;i:0;i:10;i:1;i:11;i:1;i:12;i:1;i:13;i:1;i:14;i:1;i:15;i:0;i:16;i:1;i:17;i:1;i:18;i:1;i:19;i:1;i:20;i:0;i:21;i:1;i:22;i:1;i:23;i:0;i:24;i:1;i:25;i:1;i:26;i:1;i:27;i:1;i:28;i:1;i:29;i:1;i:30;i:0;i:31;i:0;i:32;i:1;i:33;i:1;i:34;i:0;i:35;i:1;i:36;i:1;i:37;i:1;i:38;i:0;i:39;i:1;i:40;i:0;i:41;i:0;i:42;i:1;i:43;i:0;i:44;i:0;i:45;i:0;i:46;i:0;i:47;i:1;i:48;i:0;i:49;i:0;i:50;i:0;i:51;i:0;i:52;i:0;i:53;i:0;i:54;i:0;i:55;i:1;i:56;i:1;i:57;i:0;i:58;i:0;i:59;i:0;i:60;i:0;i:61;i:0;i:62;i:1;i:63;i:1;}', 0, NULL, '2018-03-18 11:01:58', '2018-03-18 11:01:58'),
(12, '1521381551.jpg', 'image/jpeg', 'koala1.jpg', '/storage/banned/1521381551.jpg', 'a:64:{i:0;i:0;i:1;i:0;i:2;i:1;i:3;i:0;i:4;i:1;i:5;i:1;i:6;i:1;i:7;i:0;i:8;i:0;i:9;i:0;i:10;i:1;i:11;i:1;i:12;i:1;i:13;i:1;i:14;i:1;i:15;i:0;i:16;i:1;i:17;i:1;i:18;i:1;i:19;i:1;i:20;i:0;i:21;i:1;i:22;i:1;i:23;i:0;i:24;i:1;i:25;i:1;i:26;i:1;i:27;i:1;i:28;i:1;i:29;i:1;i:30;i:0;i:31;i:0;i:32;i:1;i:33;i:1;i:34;i:0;i:35;i:1;i:36;i:1;i:37;i:1;i:38;i:0;i:39;i:1;i:40;i:0;i:41;i:0;i:42;i:1;i:43;i:0;i:44;i:0;i:45;i:0;i:46;i:0;i:47;i:1;i:48;i:0;i:49;i:0;i:50;i:0;i:51;i:0;i:52;i:0;i:53;i:0;i:54;i:0;i:55;i:1;i:56;i:1;i:57;i:0;i:58;i:0;i:59;i:0;i:60;i:0;i:61;i:0;i:62;i:1;i:63;i:1;}', 1, NULL, '2018-03-18 11:59:11', '2018-03-18 11:59:11');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_19_164615_create_projects_table', 1),
(4, '2018_02_19_164830_create_categories_table', 1),
(5, '2018_02_19_164950_create_feedbacks_table', 1),
(6, '2018_02_19_165131_create_partners_table', 1),
(7, '2018_02_19_165133_create_roles_table', 1),
(8, '2018_02_19_165136_create_role_user_table', 1),
(9, '2018_02_19_171310_create_news_table', 1),
(10, '2018_02_19_171812_create_comments_table', 1),
(11, '2018_03_09_133423_create_fileentry_table', 1),
(12, '2018_03_15_191305_change_comments_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `short_name`, `content`, `short_description`, `img_path`, `day_news`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Цифровые валюты: где купить и как майнить биткоины', 'bitcoin_mining_a_lot', 'О том, сколько стоит биткоин, не слышал только глухой. Но мало кто знает, откуда появились цифровые деньги, как правильно покупать крипту и сколько можно заработать на майнинге. \"Сегодня\" вместе с экспертами крипторынка разобралась в этих вопросах. \r\n\r\nПервой цифровой валютой стал биткоин. Создатель — Сатоши Накамото, но реальный это человек или группа специалистов, неясно. В 2008-м опубликовали white paper (\"белую книгу\"), содержащую принципы электронной платежной системы. Биткоин позиционировался как валюта децентрализованная и глобальная: он не подчиняется государствам/компаниям, а все участники биткоин-сети равны. Он прозрачен в проведении транзакций благодаря тому, что операции перемещения средств построены на технологии блокчейн — непрерывной последовательной цепочке инфоблоков. В блокчейне биткоина хранятся все транзакции, начиная с первого инфоблока, опубликованного в сети.\r\n\r\nПолучить биткоины позволяет майнинг — добыча валют с использованием сложных расчетов на ПК, она устанавливается как любая программа. Добывают крипту и на видеокартах: если соединить несколько видеоплат, выйдет майнинговая ферма. Также крипту добывают на асиках — оборудовании, созданном специально для майнинга.', 'На майнинге биткоина можно заработать 100 долларов в месяц, на даше — 80', '2018-03-18_1521376636_78_main_new.1520873145.jpg', '1', 4, 1, '2018-03-18 10:37:16', '2018-03-18 10:37:16'),
(2, 'Непогода в Краматорске. УРСАС обращается к краматорчанам', 'shitty_weather_in_kramatorsk', 'С ночи Краматорск засыпает снегом и прогноз погоды говорит о том, что непогода продержится ещё четыре дня.\r\n\r\nВ связи с этим КП «УРСАС» обратилось на своей странице в фейсбук к жителям города: В связи с неутешительным прогнозом погоды огромная просьба ко всем автовладельцам! Для обеспечения нормальной работы снегоуборочной техники по возможности не паркуйте свои авто у края проезжей части!- говорится в сообщении.', 'С ночи Краматорск засыпает снегом и прогноз погоды говорит о том, что непогода продержится ещё четыре дня.', '2018-03-18_1521376890_djnvf.jpg', '1', 3, 1, '2018-03-18 10:41:30', '2018-03-18 10:41:30'),
(3, 'Авария на курорте в Гудаури: французские эксперты устанавливают причины', 'avaria_v_guadury', 'Причины крупной аварии на одном из подъемников горнолыжного курорта в грузинском Гудаури, которая произошла 16 марта, будут устанавливать международные эксперты французской компании Bureau Veritas.\r\n\r\nФранцузские эксперты уже прибыли на место происшествия. По информации пресс-службы Минэкономразвития Грузии, вместе с ними в установлении деталей ЧП участвуют эксперты австрийско-швейцарской компании Doppelmayr, производителя этой канатной дороги, смонтировавшей ее в Гудаури, а также представители прокуратуры Грузии, Национального бюро экспертизы имени Самхараули и Агентства по техническому и строительному надзору министерства экономики и устойчивого развития республики.\r\n\r\n\"Правительство считает, что заключение экспертов должно быть абсолютно беспристрастным со стороны всех подключенных к процессу, поскольку речь идет не только о конкретном инциденте, во время которого пострадали люди, но и о репутации нашей страны\", – заявил первый вице-премьер Грузии Дмитрий Кумсишвили. \r\n\r\nНапомним, в результате аварии на горнолыжном курорте Гудаури в Грузии пострадали 11 человек – четверо украинцев, шестеро россиян, а также гражданин Швеции.', 'В результате аварии пострадали и украинцы', '2018-03-18_1521377051_63_main_new.1521376529.png', '1', 1, 1, '2018-03-18 10:44:11', '2018-03-18 10:44:11'),
(4, 'Необычный случай в Голландии: фанаты минуту овациями приветствовали игрока из команды соперника', 'Главная Новости спорта Новости футбола Необычный случай в Голландии: фанаты минуту овациями приветствовали игрока из команды соперника Сегодня, 09:45 Просмотров: 796    Футболист пропустил игру, так как стал донором для больного лейкемией', 'Во встрече чемпионата Голландии  между \"ПСВ\" и \"Венло\", который завершился победой хозяев со счетом 3:0, произошла необычная ситуация.\r\n\r\nБолельщики \"ПСВ\" на протяжении минуты аплодировали игроку команды соперников Леннарту Ти.\r\n\r\n26-летний немецкий футболист пропустил матч из-за того, что перед игрой сдал кровь для человека, страдающего острой формой лейкемии. Это уже второй раз, когда Ти помогает больному раком. Первый раз игрок становился донором 7 лет назад.\r\n\r\nРанее мы сообщали, что мексиканский футболист Эсекиель Ороско в 29 лет скончался от рака. На протяжении своей карьеры он выступал за \"Некаксу\", \"Чьяпас\", \"Атланте\", \"Тапачулу\" и \"Мурсиелагос\".\r\n\r\nРанее мы сообщали, что 18-летний французский футболист скончался во сне. Из-за трагедии отменили матч его команды, а остальные поединки начинались с минуты молчания.\r\n\r\n\r\n\r\nА перед этим стало известно, что в России во время соревнований по плаванию умер 17-летний спортсмен. Несколько дней назад пловец успешно прошел медицинское обследование в специализированном диспансере.', 'Футболист пропустил игру, так как стал донором для больного лейкемией', '2018-03-18_1521377460_DYhRX6BVMAAdH__.jpg', '1', 2, 1, '2018-03-18 10:51:00', '2018-03-18 10:51:00');

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `img_path`, `link`, `created_at`, `updated_at`) VALUES
(1, '/images/client-logos/logo1.png', 'google.com', NULL, NULL),
(2, '/images/client-logos/logo2.png', 'google.com', NULL, NULL),
(3, '/images/client-logos/logo3.png', 'google.com', NULL, NULL),
(4, '/images/client-logos/logo4.png', 'google.com', NULL, NULL),
(5, '/images/client-logos/logo5.png', 'google.com', NULL, NULL);

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
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1@test1.test1', '$2y$10$R0APWCgL80NgXHDz2HyUnexOET/.FgNrmt1p2lGDlwwtxtzax7t4O', 'AvCJ11cQiGIdd7WTNQ06XUe0Q3eLuxKJEz9OrluENQXhdAbgpZtDK8ULfT8y', '2018-03-18 10:27:04', '2018-03-18 10:27:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_news_id_foreign` (`news_id`),
  ADD KEY `comments_fileentries_id_foreign` (`fileentries_id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fileentries`
--
ALTER TABLE `fileentries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fileentries_comment_id_foreign` (`comment_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_foreign` (`category_id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `fileentries`
--
ALTER TABLE `fileentries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_fileentries_id_foreign` FOREIGN KEY (`fileentries_id`) REFERENCES `fileentries` (`id`),
  ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Ограничения внешнего ключа таблицы `fileentries`
--
ALTER TABLE `fileentries`
  ADD CONSTRAINT `fileentries_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
