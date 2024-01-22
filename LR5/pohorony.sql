-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 22 2024 г., 00:54
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.0.28

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
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `FIO` varchar(45) NOT NULL,
  `id_jobTitle` int(10) UNSIGNED NOT NULL,
  `characteristic` varchar(255) DEFAULT NULL,
  `yearBirth` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `photo`, `FIO`, `id_jobTitle`, `characteristic`, `yearBirth`) VALUES
(1, '21.png', 'Иванов Иван Иванович', 1, '20', '1990'),
(2, '22.png', 'Петров Петр Петрович', 2, '30', '1985'),
(3, '23.png', 'Сидоров Александр Васильевич', 3, '35', '1982'),
(4, '24.png', 'Козлова Екатерина Сергеевна', 4, '25', '1995'),
(5, '25.png', 'Михайлов Михаил Александрович', 5, '40', '1980'),
(6, '26.png', 'Андреева Ольга Игоревна', 1, '22', '1993'),
(7, '27.png', 'Григорьев Дмитрий Валентинович', 2, '32', '1988'),
(8, '28.png', 'Николаев Николай Владимирович', 3, '37', '1981'),
(9, '29.png', 'Сергеева Анна Александровна', 4, '28', '1992'),
(10, '210.png', 'Белов Борис Артемович', 5, '38', '1983'),
(11, '211.png', 'Кузнецова Татьяна Васильевна', 1, '24', '1997'),
(12, '212.png', 'Шевцов Сергей Дмитриевич', 2, '33', '1987'),
(13, '213.png', 'Лебедева Марина Алексеевна', 3, '36', '1984'),
(14, '214.png', 'Васнецов Игорь Валентинович', 4, '27', '1994'),
(15, '215.png', 'Зайцева Елена Владимировна', 5, '39', '1986'),
(16, '216.png', 'Павлов Александр Сергеевич', 1, '21', '1991'),
(17, '217.png', 'Крылов Кирилл Анатольевич', 2, '31', '1989'),
(18, '218.png', 'Федорова Вера Ивановна', 3, '34', '1980'),
(19, '219.png', 'Щербаков Денис Викторович', 4, '26', '1996'),
(20, '220.png', 'Герасимов Григорий Андреевич', 5, '29', '1998');

-- --------------------------------------------------------

--
-- Структура таблицы `jobtitle`
--

CREATE TABLE `jobtitle` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `jobtitle`
--

INSERT INTO `jobtitle` (`id`, `Name`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FIO` varchar(100) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Interests` text NOT NULL,
  `Link` varchar(255) NOT NULL,
  `BloodType` varchar(3) NOT NULL,
  `RhFactor` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `Login`, `Password`, `FIO`, `DateOfBirth`, `Address`, `Gender`, `Interests`, `Link`, `BloodType`, `RhFactor`) VALUES
(17, 'WEBdev2024@mail.ru', '$2y$10$vi0c8KUYqgcm23pSOyaLC.eLI7itCY4WehR0r/7dPIS7Od6yYG2v2', 'Павлов Арсений Михайлович', '2002-03-01', 'ул.Сергеева Андрея 1', 'М', 'Не разглашаю', 'WEBDEV2024.ru', 'I', '+');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jobTitle` (`id_jobTitle`);

--
-- Индексы таблицы `jobtitle`
--
ALTER TABLE `jobtitle`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_jobTitle`) REFERENCES `jobtitle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
