-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 08 2019 г., 16:40
-- Версия сервера: 8.0.12
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vent`
--

--
-- Очистить таблицу перед добавлением данных `worker_types`
--

TRUNCATE TABLE `worker_types`;
--
-- Дамп данных таблицы `worker_types`
--

INSERT INTO `worker_types` (`id`, `name`, `symbole_code`, `priority`) VALUES
(1, 'Механики', 'mech', 500),
(3, 'Автоматчики', 'autom', 1000),
(4, 'Тепловики', 'tepl', 1500),
(6, 'Холодильщики', 'refrigeratorers', 2000),
(8, 'Инженеры', 'ingenieers', 2500),
(10, 'Менеджеры', 'managers', 3000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
