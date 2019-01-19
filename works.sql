-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2019 at 06:44 AM
-- Server version: 5.7.21-20-beget-5.7.21-20-1-log
-- PHP Version: 5.6.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supporfm_ventyii`
--

--
-- Truncate table before insert `works`
--

TRUNCATE TABLE `works`;
--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `name`, `brands_id`, `worker_types_id`, `period_id`, `execution_time`, `work_types_id`) VALUES
(1, 'work1', 1, 1, 2, 300, 1),
(2, 'work1', 1, 3, 4, 300, 2);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
