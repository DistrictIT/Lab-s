-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 19 2023 г., 04:07
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pohorony`
--

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE `information` (
  `id` int(11) UNSIGNED NOT NULL,
  `photo` varchar(53) NOT NULL DEFAULT 'no_image.png',
  `name` varchar(45) NOT NULL,
  `plot` int(10) UNSIGNED NOT NULL,
  `date` varchar(18) DEFAULT NULL,
  `number_people` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`id`, `photo`, `name`, `plot`, `date`, `number_people`) VALUES
(2, 'http://localhost/LR2WEB/Images_2LR/21.png', 'Иванов Иван Иванович', 1, '01.01.2000', 15),
(3, 'http://localhost/LR2WEB/Images_2LR/22.png', 'Иванов Роман Романович', 2, '02.01.2000', 3),
(4, 'http://localhost/LR2WEB/Images_2LR/23.png', 'Мельников Ермолай Мэлорович', 3, '03.01.2000', 17),
(5, 'http://localhost/LR2WEB/Images_2LR/24.png', 'Фролов Бенедикт Яковлевич', 4, '04.01.2000', 1),
(6, 'http://localhost/LR2WEB/Images_2LR/25.png', 'Фадеев Касьян Борисович', 5, '05.01.2000', 2),
(7, 'http://localhost/LR2WEB/Images_2LR/26.png', 'Уваров Панкратий Созонович', 6, '06.01.2000', 40),
(8, 'http://localhost/LR2WEB/Images_2LR/27.png', 'Меркушев Касьян Рудольфович', 7, '07.01.2000', 23),
(9, 'http://localhost/LR2WEB/Images_2LR/28.png', 'Суворов Ростислав Данилович', 8, '08.01.2000', 25),
(10, 'http://localhost/LR2WEB/Images_2LR/29.png', 'Блохин Илларион Викторович', 9, '09.01.2000', 40),
(11, 'http://localhost/LR2WEB/Images_2LR/210.png', 'Евдокимов Юлиан Тарасович', 10, '10.01.2000', 85),
(12, 'http://localhost/LR2WEB/Images_2LR/211.png', 'Ершов Ермолай Фролович', 11, '11.01.2000', 14),
(13, 'http://localhost/LR2WEB/Images_2LR/212.png', 'Носов Касьян Фролович', 12, '12.01.2000', 15),
(14, 'http://localhost/LR2WEB/Images_2LR/213.png', 'Никифоров Мирослав Макарович', 13, '13.01.2000', 55),
(15, 'http://localhost/LR2WEB/Images_2LR/214.png', 'Тимофеев Святослав Владленович', 14, '14.01.2000', 50),
(16, 'http://localhost/LR2WEB/Images_2LR/215.png', 'Трофимов Гавриил Якунович', 15, '15.01.2000', 61),
(17, 'http://localhost/LR2WEB/Images_2LR/216.png', 'Михайлов Аристарх Геннадиевич', 16, '16.01.2000', 40),
(18, 'http://localhost/LR2WEB/Images_2LR/217.png', 'Потапов Архип Парфеньевич', 17, '17.01.2000', 13),
(19, 'http://localhost/LR2WEB/Images_2LR/218.png', 'Силин Нинель Ярославович', 18, '18.01.2000', 13),
(20, 'http://localhost/LR2WEB/Images_2LR/219.png', 'Савельев Лука Германнович', 19, '19.01.2000', 13),
(21, 'http://localhost/LR2WEB/Images_2LR/220.png', 'Белозёров Иннокентий Данилович', 20, '20.01.2000', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `pohorony`
--

CREATE TABLE `pohorony` (
  `id` int(11) UNSIGNED NOT NULL,
  `plot` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `pohorony`
--

INSERT INTO `pohorony` (`id`, `plot`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plot` (`plot`);

--
-- Индексы таблицы `pohorony`
--
ALTER TABLE `pohorony`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `pohorony`
--
ALTER TABLE `pohorony`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`plot`) REFERENCES `pohorony` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
