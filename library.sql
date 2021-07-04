-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2021 г., 08:22
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `category` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`id`, `type`, `category`, `name`, `author`, `description`) VALUES
(17, 'Книга', 'Детские/Воспитание', 'Волшебник Изумрудного города', 'Александр Волков', '«Волшебник Изумрудного города» — сказочная повесть Александра Мелентьевича Волкова, написанная в 1939 году на основе сказки американского писателя Лаймена Фрэнка Баума «Удивительный волшебник из страны Оз» с некоторыми изменениями. В 1959 году вышло новое издание книги, значительно переработанное автором. В этом издании впервые появились иллюстрации художника Леонида Владимирского. Впоследствии книга была переработана ещё раз. '),
(18, 'Видео', 'Разработка/Проектирование', 'Три реализации задачи в функциональном стиле', 'S0ER', '');

-- --------------------------------------------------------

--
-- Структура таблицы `material_link`
--

CREATE TABLE `material_link` (
  `id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `signature` varchar(60) DEFAULT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material_link`
--

INSERT INTO `material_link` (`id`, `material_id`, `signature`, `link`) VALUES
(3, 1, '$signature', '$link'),
(9, 17, 'wikipedia', 'https://ru.wikipedia.org/wiki/%D0%92%D0%BE%D0%BB%D1%88%D0%B5%D0%B1%D0%BD%D0%B8%D0%BA_%D0%98%D0%B7%D1%83%D0%BC%D1%80%D1%83%D0%B4%D0%BD%D0%BE%D0%B3%D0%BE_%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D0%B0'),
(10, 18, '', 'https://www.youtube.com/watch?v=aoFZG6l8iiU');

-- --------------------------------------------------------

--
-- Структура таблицы `material_tag`
--

CREATE TABLE `material_tag` (
  `id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material_tag`
--

INSERT INTO `material_tag` (`id`, `material_id`, `tag`) VALUES
(13, 17, 'Тег3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `material_link`
--
ALTER TABLE `material_link`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `material_tag`
--
ALTER TABLE `material_tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `material_link`
--
ALTER TABLE `material_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `material_tag`
--
ALTER TABLE `material_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
