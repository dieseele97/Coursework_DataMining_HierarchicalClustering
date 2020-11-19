-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 23 2020 р., 00:01
-- Версія сервера: 10.3.13-MariaDB-log
-- Версія PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `kursova`
--

-- --------------------------------------------------------

--
-- Структура таблиці `economic`
--

CREATE TABLE `economic` (
  `id` int(15) NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GDP` double DEFAULT NULL,
  `import` double DEFAULT NULL,
  `export` double DEFAULT NULL,
  `inflation` double DEFAULT NULL,
  `unemployment` double DEFAULT NULL,
  `industry` double DEFAULT NULL,
  `interestrate` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `economic`
--

INSERT INTO `economic` (`id`, `country`, `GDP`, `import`, `export`, `inflation`, `unemployment`, `industry`, `interestrate`) VALUES
(1, 'France', 0.1, 123.5, 108.8, 0.6, 10.2, -2, 0.15),
(2, 'Great Britain', 5.5, 128.6, 121.8, 1.9, 6.5, 1.2, 0.5),
(3, 'Germany', 2.5, 226.8, 278.8, 1, 5.1, -0.5, 0.15),
(4, 'Italy', -0.8, 101.4, 90.2, 0.2, 12.3, -1.7, 0.15),
(5, 'China', 7.5, 484.6, 570, 2.3, 4.1, 9.2, 6);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `economic`
--
ALTER TABLE `economic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`),
  ADD KEY `GDP` (`GDP`),
  ADD KEY `import` (`import`),
  ADD KEY `export` (`export`),
  ADD KEY `inflation` (`inflation`),
  ADD KEY `unemployment` (`unemployment`),
  ADD KEY `industry` (`industry`),
  ADD KEY `interestrate` (`interestrate`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `economic`
--
ALTER TABLE `economic`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
