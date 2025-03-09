-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-5.7
-- Время создания: Мар 09 2025 г., 14:42
-- Версия сервера: 5.7.44
-- Версия PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `HelpDesk_DB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id_application` int(10) UNSIGNED NOT NULL,
  `title` varchar(56) NOT NULL,
  `text` text NOT NULL,
  `id_specialist` int(10) UNSIGNED DEFAULT NULL,
  `id_status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `opening_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `closing_date` datetime NOT NULL,
  `id_initiator` int(10) UNSIGNED NOT NULL,
  `id_watcher` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id_application`, `title`, `text`, `id_specialist`, `id_status`, `opening_date`, `closing_date`, `id_initiator`, `id_watcher`) VALUES
(1, 'заявка тестовая 1', 'текст заявки 1', NULL, 1, '2025-03-07 17:43:15', '2025-03-07 20:42:54', 10, 5),
(2, 'заявка тестовая 2', 'текст заявки 2', NULL, 1, '2025-03-07 17:44:26', '2025-03-07 20:43:37', 2, 4),
(3, 'заявка тестовая 3', 'текст заявки 3', NULL, 1, '2025-03-07 17:44:26', '2025-03-07 20:43:37', 2, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `id_dep` int(10) UNSIGNED NOT NULL,
  `name` varchar(56) NOT NULL,
  `id_organization` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id_dep`, `name`, `id_organization`) VALUES
(5, 'Бухгалтерия', 1),
(6, 'Магазин №1', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id_employee` int(10) UNSIGNED NOT NULL,
  `surname` varchar(56) NOT NULL,
  `firstname` varchar(56) NOT NULL,
  `lastname` varchar(56) NOT NULL,
  `id_organization` int(10) UNSIGNED NOT NULL,
  `login` varchar(56) NOT NULL,
  `password` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id_employee`, `surname`, `firstname`, `lastname`, `id_organization`, `login`, `password`) VALUES
(2, 'Фролова', 'Анна', 'Петровна', 1, 'ken', 'ken'),
(4, 'Петренко', 'Елизавета', 'Николаевна', 1, 'pen', 'pen'),
(5, 'Воронцова', 'Виктория', 'Викторовна', 1, 'www', 'www'),
(8, 'Попов', 'Павел', 'Кириллович', 2, 'ppk', 'ppk'),
(10, 'Коновалов', 'Евгений', 'Николаевич', 2, 'ken', 'ken');

-- --------------------------------------------------------

--
-- Структура таблицы `organizations`
--

CREATE TABLE `organizations` (
  `id_organization` int(10) UNSIGNED NOT NULL,
  `name` varchar(56) NOT NULL,
  `addres` varchar(56) NOT NULL,
  `isActive` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `organizations`
--

INSERT INTO `organizations` (`id_organization`, `name`, `addres`, `isActive`) VALUES
(1, 'ЦО', 'Могилевская, 15', 1),
(2, 'Магазин №1', 'Ленинская, 18', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `id_position` int(10) UNSIGNED NOT NULL,
  `name` varchar(56) NOT NULL,
  `id_dep` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`id_position`, `name`, `id_dep`) VALUES
(1, 'Бухгалтер', 5),
(2, 'Старший кассир', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id_status` int(10) UNSIGNED NOT NULL,
  `name` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id_status`, `name`) VALUES
(1, 'новая'),
(2, 'в работе (назначено)'),
(3, 'решена'),
(4, 'закрыта'),
(5, 'нерешенные');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id_application`),
  ADD KEY `specialist_id` (`id_specialist`),
  ADD KEY `status_id` (`id_status`),
  ADD KEY `initiator_app_id` (`id_initiator`),
  ADD KEY `watcher_id` (`id_watcher`);

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `position_id` (`id_organization`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `organization_id` (`id_organization`);

--
-- Индексы таблицы `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id_organization`),
  ADD KEY `id_dep` (`addres`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id_position`),
  ADD KEY `id_dep` (`id_dep`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id_application` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `id_dep` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT для таблицы `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id_organization` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `id_position` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`id_specialist`) REFERENCES `employees` (`id_employee`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`id_watcher`) REFERENCES `employees` (`id_employee`),
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`id_initiator`) REFERENCES `employees` (`id_employee`),
  ADD CONSTRAINT `applications_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id_status`);

--
-- Ограничения внешнего ключа таблицы `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`id_organization`) REFERENCES `organizations` (`id_organization`);

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_organization`) REFERENCES `organizations` (`id_organization`);

--
-- Ограничения внешнего ключа таблицы `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `departments` (`id_dep`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
