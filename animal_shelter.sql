-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 31 2021 г., 16:00
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `animal_shelter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_dt` timestamp NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `animals`
--

INSERT INTO `animals` (`id`, `title`, `age`, `type`, `status`, `created_dt`, `updated_dt`) VALUES
(1, 'Archi', 3, 3, 1, '2021-08-31 11:43:04', '2021-08-31 11:44:17'),
(2, 'Jack', 5, 2, 1, '2021-08-31 11:43:22', '2021-08-31 11:43:30'),
(3, 'Murka', 2, 1, 1, '2021-08-31 11:43:58', '2021-08-31 11:45:09');

-- --------------------------------------------------------

--
-- Структура таблицы `animals_types`
--

CREATE TABLE `animals_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_dt` timestamp NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `animals_types`
--

INSERT INTO `animals_types` (`id`, `title`, `created_dt`, `updated_dt`) VALUES
(1, 'Сat', '2021-08-31 07:03:07', NULL),
(2, 'Dog', '2021-08-31 07:03:07', NULL),
(3, 'Turtle', '2021-08-31 07:03:07', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1630331927),
('m210830_135724_create_animals_types_table', 1630393387),
('m210830_135730_create_animals_table', 1630393387);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-animals-type` (`type`);

--
-- Индексы таблицы `animals_types`
--
ALTER TABLE `animals_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `animals_types`
--
ALTER TABLE `animals_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `fk-animals-type` FOREIGN KEY (`type`) REFERENCES `animals_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
