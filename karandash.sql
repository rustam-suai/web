-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2025 г., 11:05
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `karandash`
--

-- --------------------------------------------------------

--
-- Структура таблицы `busket`
--

CREATE TABLE `busket` (
  `id` int(6) NOT NULL,
  `id_ser` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `mark` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `busket`
--

INSERT INTO `busket` (`id`, `id_ser`, `id_user`, `mark`) VALUES
(32, 2, 1, 99),
(33, 3, 1, 1),
(34, 4, 1, 23),
(35, 5, 1, 45),
(36, 7, 1, NULL),
(37, 9, 1, NULL),
(39, 2, 2, 60),
(40, 4, 2, NULL),
(41, 5, 2, 45),
(42, 22, 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` int(7) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `name`, `position`, `login`, `pass`) VALUES
(1, 'Иванов Иван Петрович', 'Директор', 'admin', 'admin'),
(2, 'Алиев Амир Каримович', 'Режиссёр', 'amir', '123'),
(3, 'Прядко Алексей Янович', 'Режиссёр', 'alex', '456'),
(4, 'Малевич Глеб Львович', 'Художник', 'gleb', '789'),
(5, 'Джонс Боб', 'Художник', 'bob', '000');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(4) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_limit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` int(4) NOT NULL,
  `sponsor_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `name`, `genre`, `age_limit`, `emp_id`, `sponsor_id`) VALUES
(1, 'Азбука для детей', 'Образование', '0+', 1, 2),
(2, 'Ералаш 2D', 'Комедия', '6+', 1, 3),
(3, 'Незнайка в СПб', 'Боевик', '12+', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `series`
--

CREATE TABLE `series` (
  `id` int(4) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(3) NOT NULL,
  `duration` int(3) NOT NULL,
  `emp_id` int(4) NOT NULL,
  `project_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `series`
--

INSERT INTO `series` (`id`, `name`, `num`, `duration`, `emp_id`, `project_id`) VALUES
(1, 'Знакомство', 1, 24, 3, 3),
(2, 'Выпускной', 2, 24, 3, 3),
(3, 'Поступление', 3, 24, 3, 3),
(4, 'Общага', 4, 24, 2, 3),
(5, 'Схватка', 5, 24, 2, 3),
(6, 'Больничные хроники ч.1', 6, 24, 3, 3),
(7, 'Больничные хроники ч.2', 7, 24, 3, 3),
(8, 'Больничные хроники ч.3', 8, 24, 3, 3),
(9, 'Тренировка', 9, 24, 2, 3),
(10, 'Реванш', 10, 24, 2, 3),
(11, 'Свадьба', 11, 24, 3, 3),
(12, 'Финал', 12, 24, 3, 3),
(13, 'Алфавит. Ознакомление', 1, 5, 2, 1),
(14, 'Буквы А - Д', 2, 5, 2, 1),
(15, 'Буквы Е - И', 3, 5, 2, 1),
(16, 'Буквы Й - Н', 4, 5, 2, 1),
(17, 'Буквы О - У', 5, 5, 2, 1),
(18, 'Буквы Ф - Ш', 6, 5, 2, 1),
(19, 'Буквы Щ - Э', 7, 5, 2, 1),
(20, 'Буквы Ю - Я. Заключение', 8, 5, 2, 1),
(21, 'Ералаш 2D. Ч. 1', 1, 45, 3, 2),
(22, 'Ералаш 2D. Ч. 2', 2, 45, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sets`
--

CREATE TABLE `sets` (
  `id` int(5) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch_number` int(3) NOT NULL,
  `bg_number` int(3) NOT NULL,
  `ef_number` int(3) NOT NULL,
  `emp_id` int(4) NOT NULL,
  `episode_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sets`
--

INSERT INTO `sets` (`id`, `name`, `ch_number`, `bg_number`, `ef_number`, `emp_id`, `episode_id`) VALUES
(1, 'Study pack. 1', 5, 3, 1, 5, 1),
(2, 'Street pack. 1', 3, 4, 0, 5, 1),
(3, 'Street pack. 1', 2, 2, 1, 5, 2),
(4, 'Study pack. 1', 2, 1, 0, 5, 2),
(5, 'Street pack. 2', 4, 3, 2, 4, 3),
(6, 'Street pack.2', 3, 3, 1, 4, 4),
(7, 'Hospital pack', 6, 4, 8, 5, 6),
(8, 'Hospital pack', 7, 3, 4, 5, 7),
(9, 'Hospital pack', 4, 2, 3, 4, 8),
(10, 'Street pack. 2', 5, 1, 2, 4, 9),
(11, 'Street pack. 2', 4, 2, 3, 4, 10),
(12, 'Wedding pack.', 20, 6, 4, 5, 11),
(13, 'Wedding pack.', 20, 2, 0, 5, 12),
(14, 'Letter pack.', 33, 6, 3, 5, 13),
(15, 'Letter pack.', 5, 2, 0, 5, 14),
(16, 'Letter pack.', 5, 2, 0, 5, 15),
(17, 'Letter pack.', 5, 2, 0, 5, 16),
(18, 'Letter pack.', 5, 2, 0, 5, 17),
(19, 'Letter pack.', 5, 2, 0, 5, 18),
(20, 'Letter pack.', 5, 2, 0, 5, 19),
(21, 'Letter pack.', 3, 2, 3, 5, 20),
(22, 'Comedy pack.', 12, 8, 6, 4, 21),
(23, 'Comedy pack.', 12, 6, 10, 4, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(4) NOT NULL,
  `company_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_head` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sponsors`
--

INSERT INTO `sponsors` (`id`, `company_name`, `company_head`, `budget`) VALUES
(1, 'ООО \"Рога и копыта\"', 'Козлов Андрей Анатольевич', 3000000),
(2, 'Канал \"Энергия\"', 'Белкин Жан-Батист Филиппович', 6000000),
(3, 'ЗАО \"Всемирная сеть\"', 'Фильченков Роман Александрович', 4500000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(7) NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `pass`) VALUES
(1, 'a@mail.ru', 'naruto', 'kran'),
(2, 'newmail@mail.ru', 'pain', 'itami'),
(3, 'new@mail.ru', 'zuko', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `busket`
--
ALTER TABLE `busket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `sponsor_id` (`sponsor_id`);

--
-- Индексы таблицы `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Индексы таблицы `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `episode_id` (`episode_id`);

--
-- Индексы таблицы `sponsors`
--
ALTER TABLE `sponsors`
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
-- AUTO_INCREMENT для таблицы `busket`
--
ALTER TABLE `busket`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `series`
--
ALTER TABLE `series`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `sets`
--
ALTER TABLE `sets`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`);

--
-- Ограничения внешнего ключа таблицы `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `series_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Ограничения внешнего ключа таблицы `sets`
--
ALTER TABLE `sets`
  ADD CONSTRAINT `sets_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `sets_ibfk_2` FOREIGN KEY (`episode_id`) REFERENCES `series` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
