-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 12:29 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datingsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` char(255) NOT NULL,
  `firstname` char(255) NOT NULL,
  `lastname` char(255) NOT NULL,
  `password` mediumtext NOT NULL,
  `email` char(255) NOT NULL,
  `postal` char(11) NOT NULL,
  `about` text NOT NULL,
  `age` int(11) NOT NULL,
  `salary` float NOT NULL,
  `currency` char(255) NOT NULL,
  `gender` char(255) NOT NULL,
  `preference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `email`, `postal`, `about`, `age`, `salary`, `currency`, `gender`, `preference`) VALUES
(23, 'test', 'test', 'test', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'test@nailmail.test', '00980', 'testing this new site', 20, 2000, 'EUR', 'male', 7),
(24, 'arcada', 'arcada', 'man', '$2y$10$XkNOHxaNh4XTgpQozXfP.eEyA/fPno0DJK5iPa4qz3O7fke8wGrTa', 'arcada@mail.man', '00560', 'arcaada man', 12, 1234, 'NZD', 'other', 5),
(25, 'qwe', 'qwe', 'ewq', '$2y$10$hEkTPkfFN7uDpmkUW1HHReuchjloDpZ5snxACALmf2/bIiXWUQa06', 'qwerty@qwerty.comqwe', '00980', 'im interesting pls date', 32, 3241, 'CVE', 'male', 2),
(26, 'user0', 'user0', 'user0', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user0@yahoo.cooo', '00700', 'user0 has a big donger', 39, 708341, 'USD', 'male', 7),
(27, 'user1', 'user1', 'user1', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user1@yahoo.cooo', '00700', 'user1 has a big donger', 30, 1865870, 'USD', 'male', 2),
(28, 'user2', 'user2', 'user2', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user2@yahoo.cooo', '00700', 'user2 has a big donger', 46, 944934, 'USD', 'male', 1),
(29, 'user3', 'user', 'user', '$2y$10$94Bw7ld5Y7cvDqRrINK1p.oeotgb8pxAkOVxBja8SwDR4hNt8K2.a', 'user3@yahoo.cooo', '00700', 'user3 has a big donger', 35, 465290, 'USD', 'female', 5),
(30, 'user4', 'user4', 'user4', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user4@yahoo.cooo', '00700', 'user4 has a big donger', 28, 214249, 'USD', 'other', 3),
(31, 'user5', 'user5', 'user5', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user5@yahoo.cooo', '00700', 'user5 has a big donger', 30, 1824540, 'USD', 'male', 5),
(32, 'user6', 'user6', 'user6', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user6@yahoo.cooo', '00700', 'user6 has a big donger', 26, 1381710, 'USD', 'male', 2),
(33, 'user7', 'user7', 'user7', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user7@yahoo.cooo', '00700', 'user7 has a big donger', 43, 352397, 'USD', 'other', 3),
(34, 'user8', 'user8', 'user8', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user8@yahoo.cooo', '00700', 'user8 has a big donger', 47, 1707430, 'USD', 'male', 3),
(35, 'user9', 'user9', 'user9', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user9@yahoo.cooo', '00700', 'user9 has a big donger', 27, 520877, 'USD', 'female', 2),
(36, 'user10', 'user10', 'user10', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user10@yahoo.cooo', '00700', 'user10 has a big donger', 20, 81101, 'USD', 'male', 1),
(37, 'user11', 'user11', 'user11', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user11@yahoo.cooo', '00700', 'user11 has a big donger', 26, 1592320, 'USD', 'female', 6),
(38, 'user12', 'user12', 'user12', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user12@yahoo.cooo', '00700', 'user12 has a big donger', 36, 1280480, 'USD', 'other', 5),
(39, 'user13', 'user13', 'user13', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user13@yahoo.cooo', '00700', 'user13 has a big donger', 27, 1632980, 'USD', 'male', 1),
(40, 'user14', 'user14', 'user14', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user14@yahoo.cooo', '00700', 'user14 has a big donger', 37, 1707440, 'USD', 'female', 6),
(41, 'user15', 'user15', 'user15', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user15@yahoo.cooo', '00700', 'user15 has a big donger', 42, 1914740, 'USD', 'male', 4),
(42, 'user16', 'user16', 'user16', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user16@yahoo.cooo', '00700', 'user16 has a big donger', 42, 1774360, 'USD', 'female', 5),
(43, 'user17', 'user17', 'user17', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user17@yahoo.cooo', '00700', 'user17 has a big donger', 42, 1846000, 'USD', 'female', 7),
(44, 'user18', 'user18', 'user18', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user18@yahoo.cooo', '00700', 'user18 has a big donger', 40, 825044, 'USD', 'female', 1),
(45, 'user19', 'user19', 'user19', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user19@yahoo.cooo', '00700', 'user19 has a big donger', 50, 894414, 'USD', 'female', 3),
(46, 'user20', 'user20', 'user20', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user20@yahoo.cooo', '00700', 'user20 has a big donger', 21, 1808580, 'USD', 'other', 7),
(47, 'user21', 'user21', 'user21', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user21@yahoo.cooo', '00700', 'user21 has a big donger', 41, 1820940, 'USD', 'male', 6),
(48, 'user22', 'user22', 'user22', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user22@yahoo.cooo', '00700', 'user22 has a big donger', 38, 818732, 'USD', 'male', 2),
(49, 'user23', 'user23', 'user23', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user23@yahoo.cooo', '00700', 'user23 has a big donger', 33, 933216, 'USD', 'male', 4),
(50, 'user24', 'user24', 'user24', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user24@yahoo.cooo', '00700', 'user24 has a big donger', 24, 140338, 'USD', 'other', 1),
(51, 'user25', 'user25', 'user25', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user25@yahoo.cooo', '00700', 'user25 has a big donger', 31, 1598620, 'USD', 'other', 3),
(52, 'user26', 'user26', 'user26', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user26@yahoo.cooo', '00700', 'user26 has a big donger', 46, 1653770, 'USD', 'other', 2),
(53, 'user27', 'user27', 'user27', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user27@yahoo.cooo', '00700', 'user27 has a big donger', 50, 792529, 'USD', 'male', 6),
(54, 'user28', 'user28', 'user28', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user28@yahoo.cooo', '00700', 'user28 has a big donger', 36, 348289, 'USD', 'male', 4),
(55, 'user29', 'user29', 'user29', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user29@yahoo.cooo', '00700', 'user29 has a big donger', 39, 73227, 'USD', 'other', 6),
(56, 'user30', 'user30', 'user30', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user30@yahoo.cooo', '00700', 'user30 has a big donger', 40, 1383920, 'USD', 'female', 6),
(57, 'user31', 'user31', 'user31', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user31@yahoo.cooo', '00700', 'user31 has a big donger', 21, 1953600, 'USD', 'male', 2),
(58, 'user32', 'user32', 'user32', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user32@yahoo.cooo', '00700', 'user32 has a big donger', 43, 1631840, 'USD', 'other', 2),
(59, 'user33', 'user33', 'user33', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user33@yahoo.cooo', '00700', 'user33 has a big donger', 40, 429425, 'USD', 'male', 4),
(60, 'user34', 'user34', 'user34', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user34@yahoo.cooo', '00700', 'user34 has a big donger', 50, 8950, 'USD', 'male', 5),
(61, 'user35', 'user35', 'user35', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user35@yahoo.cooo', '00700', 'user35 has a big donger', 30, 1760940, 'USD', 'male', 5),
(62, 'user36', 'user36', 'user36', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user36@yahoo.cooo', '00700', 'user36 has a big donger', 35, 782889, 'USD', 'male', 2),
(63, 'user37', 'user37', 'user37', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user37@yahoo.cooo', '00700', 'user37 has a big donger', 35, 723285, 'USD', 'other', 5),
(64, 'user38', 'user38', 'user38', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user38@yahoo.cooo', '00700', 'user38 has a big donger', 40, 471907, 'USD', 'other', 2),
(65, 'user39', 'user39', 'user39', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user39@yahoo.cooo', '00700', 'user39 has a big donger', 36, 1052540, 'USD', 'other', 6),
(66, 'user40', 'user40', 'user40', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user40@yahoo.cooo', '00700', 'user40 has a big donger', 32, 1388570, 'USD', 'female', 5),
(67, 'user41', 'user41', 'user41', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user41@yahoo.cooo', '00700', 'user41 has a big donger', 20, 1968310, 'USD', 'other', 6),
(68, 'user42', 'user42', 'user42', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user42@yahoo.cooo', '00700', 'user42 has a big donger', 37, 959897, 'USD', 'other', 6),
(69, 'user43', 'user43', 'user43', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user43@yahoo.cooo', '00700', 'user43 has a big donger', 36, 379116, 'USD', 'other', 7),
(70, 'user44', 'user44', 'user44', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user44@yahoo.cooo', '00700', 'user44 has a big donger', 22, 98996, 'USD', 'male', 7),
(71, 'user45', 'user45', 'user45', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user45@yahoo.cooo', '00700', 'user45 has a big donger', 30, 1257880, 'USD', 'other', 4),
(72, 'user46', 'user46', 'user46', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user46@yahoo.cooo', '00700', 'user46 has a big donger', 26, 1177300, 'USD', 'male', 3),
(73, 'user47', 'user47', 'user47', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user47@yahoo.cooo', '00700', 'user47 has a big donger', 50, 493474, 'USD', 'other', 5),
(74, 'user48', 'user48', 'user48', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user48@yahoo.cooo', '00700', 'user48 has a big donger', 45, 1275850, 'USD', 'other', 6),
(75, 'user49', 'user49', 'user49', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user49@yahoo.cooo', '00700', 'user49 has a big donger', 38, 187620, 'USD', 'other', 2),
(76, 'user50', 'user50', 'user50', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user50@yahoo.cooo', '00700', 'user50 has a big donger', 47, 1344940, 'USD', 'female', 1),
(77, 'user51', 'user51', 'user51', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user51@yahoo.cooo', '00700', 'user51 has a big donger', 35, 1121240, 'USD', 'female', 1),
(78, 'user52', 'user52', 'user52', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user52@yahoo.cooo', '00700', 'user52 has a big donger', 39, 235939, 'USD', 'other', 2),
(79, 'user53', 'user53', 'user53', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user53@yahoo.cooo', '00700', 'user53 has a big donger', 24, 87951, 'USD', 'other', 5),
(80, 'user54', 'user54', 'user54', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user54@yahoo.cooo', '00700', 'user54 has a big donger', 30, 621886, 'USD', 'male', 4),
(81, 'user55', 'user55', 'user55', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user55@yahoo.cooo', '00700', 'user55 has a big donger', 22, 1637030, 'USD', 'other', 5),
(82, 'user56', 'user56', 'user56', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user56@yahoo.cooo', '00700', 'user56 has a big donger', 46, 1078420, 'USD', 'other', 5),
(83, 'user57', 'user57', 'user57', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user57@yahoo.cooo', '00700', 'user57 has a big donger', 30, 493743, 'USD', 'other', 6),
(84, 'user58', 'user58', 'user58', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user58@yahoo.cooo', '00700', 'user58 has a big donger', 48, 1067390, 'USD', 'female', 6),
(85, 'user59', 'user59', 'user59', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user59@yahoo.cooo', '00700', 'user59 has a big donger', 43, 1058240, 'USD', 'male', 2),
(86, 'user60', 'user60', 'user60', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user60@yahoo.cooo', '00700', 'user60 has a big donger', 34, 1090780, 'USD', 'male', 1),
(87, 'user61', 'user61', 'user61', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user61@yahoo.cooo', '00700', 'user61 has a big donger', 26, 1453850, 'USD', 'female', 6),
(88, 'user62', 'user62', 'user62', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user62@yahoo.cooo', '00700', 'user62 has a big donger', 41, 1618230, 'USD', 'male', 3),
(89, 'user63', 'user63', 'user63', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user63@yahoo.cooo', '00700', 'user63 has a big donger', 46, 1806070, 'USD', 'other', 3),
(90, 'user64', 'user64', 'user64', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user64@yahoo.cooo', '00700', 'user64 has a big donger', 31, 298940, 'USD', 'female', 7),
(91, 'user65', 'user65', 'user65', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user65@yahoo.cooo', '00700', 'user65 has a big donger', 28, 820358, 'USD', 'female', 3),
(92, 'user66', 'user66', 'user66', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user66@yahoo.cooo', '00700', 'user66 has a big donger', 46, 1095260, 'USD', 'female', 1),
(93, 'user67', 'user67', 'user67', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user67@yahoo.cooo', '00700', 'user67 has a big donger', 31, 1993720, 'USD', 'female', 4),
(94, 'user68', 'user68', 'user68', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user68@yahoo.cooo', '00700', 'user68 has a big donger', 49, 221360, 'USD', 'other', 5),
(95, 'user69', 'user69', 'user69', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user69@yahoo.cooo', '00700', 'user69 has a big donger', 39, 1963120, 'USD', 'other', 1),
(96, 'user70', 'user70', 'user70', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user70@yahoo.cooo', '00700', 'user70 has a big donger', 44, 1850120, 'USD', 'male', 4),
(97, 'user71', 'user71', 'user71', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user71@yahoo.cooo', '00700', 'user71 has a big donger', 42, 1435560, 'USD', 'other', 1),
(98, 'user72', 'user72', 'user72', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user72@yahoo.cooo', '00700', 'user72 has a big donger', 42, 878000, 'USD', 'female', 7),
(99, 'user73', 'user73', 'user73', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user73@yahoo.cooo', '00700', 'user73 has a big donger', 25, 497803, 'USD', 'other', 1),
(100, 'user74', 'user74', 'user74', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user74@yahoo.cooo', '00700', 'user74 has a big donger', 33, 377064, 'USD', 'male', 4),
(101, 'user75', 'user75', 'user75', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user75@yahoo.cooo', '00700', 'user75 has a big donger', 45, 1747200, 'USD', 'other', 4),
(102, 'user76', 'user76', 'user76', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user76@yahoo.cooo', '00700', 'user76 has a big donger', 33, 1843520, 'USD', 'other', 6),
(103, 'user77', 'user77', 'user77', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user77@yahoo.cooo', '00700', 'user77 has a big donger', 44, 378688, 'USD', 'female', 4),
(104, 'user78', 'user78', 'user78', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user78@yahoo.cooo', '00700', 'user78 has a big donger', 48, 1646230, 'USD', 'female', 6),
(105, 'user79', 'user79', 'user79', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user79@yahoo.cooo', '00700', 'user79 has a big donger', 27, 1745720, 'USD', 'female', 4),
(106, 'user80', 'user80', 'user80', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user80@yahoo.cooo', '00700', 'user80 has a big donger', 35, 1673010, 'USD', 'male', 1),
(107, 'user81', 'user81', 'user81', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user81@yahoo.cooo', '00700', 'user81 has a big donger', 41, 1790560, 'USD', 'other', 7),
(108, 'user82', 'user82', 'user82', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user82@yahoo.cooo', '00700', 'user82 has a big donger', 46, 200886, 'USD', 'other', 5),
(109, 'user83', 'user83', 'user83', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user83@yahoo.cooo', '00700', 'user83 has a big donger', 35, 116637, 'USD', 'male', 4),
(110, 'user84', 'user84', 'user84', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user84@yahoo.cooo', '00700', 'user84 has a big donger', 47, 279301, 'USD', 'male', 4),
(111, 'user85', 'user85', 'user85', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user85@yahoo.cooo', '00700', 'user85 has a big donger', 30, 1804910, 'USD', 'female', 2),
(112, 'user86', 'user86', 'user86', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user86@yahoo.cooo', '00700', 'user86 has a big donger', 44, 591287, 'USD', 'female', 7),
(113, 'user87', 'user87', 'user87', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user87@yahoo.cooo', '00700', 'user87 has a big donger', 26, 1144820, 'USD', 'other', 4),
(114, 'user88', 'user88', 'user88', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user88@yahoo.cooo', '00700', 'user88 has a big donger', 32, 545104, 'USD', 'other', 2),
(115, 'user89', 'user89', 'user89', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user89@yahoo.cooo', '00700', 'user89 has a big donger', 33, 897049, 'USD', 'other', 2),
(116, 'user90', 'user90', 'user90', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user90@yahoo.cooo', '00700', 'user90 has a big donger', 44, 1775650, 'USD', 'other', 2),
(117, 'user91', 'user91', 'user91', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user91@yahoo.cooo', '00700', 'user91 has a big donger', 29, 947310, 'USD', 'male', 4),
(118, 'user92', 'user92', 'user92', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user92@yahoo.cooo', '00700', 'user92 has a big donger', 21, 334505, 'USD', 'other', 1),
(119, 'user93', 'user93', 'user93', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user93@yahoo.cooo', '00700', 'user93 has a big donger', 35, 750562, 'USD', 'female', 4),
(120, 'user94', 'user94', 'user94', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user94@yahoo.cooo', '00700', 'user94 has a big donger', 24, 1091340, 'USD', 'male', 3),
(121, 'user95', 'user95', 'user95', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user95@yahoo.cooo', '00700', 'user95 has a big donger', 48, 89510, 'USD', 'other', 4),
(122, 'user96', 'user96', 'user96', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user96@yahoo.cooo', '00700', 'user96 has a big donger', 32, 950336, 'USD', 'male', 5),
(123, 'user97', 'user97', 'user97', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user97@yahoo.cooo', '00700', 'user97 has a big donger', 42, 20723, 'USD', 'male', 6),
(124, 'user98', 'user98', 'user98', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user98@yahoo.cooo', '00700', 'user98 has a big donger', 28, 27212, 'USD', 'other', 1),
(125, 'user99', 'user99', 'user99', '$2y$10$/P9ymgIG0RNDw20ONpEow.REpvbQi9sPaPpYw8RE0wT1SMq7SN5Tu', 'user99@yahoo.cooo', '00700', 'user99 has a big donger', 32, 1514410, 'USD', 'female', 7),
(126, 'droptable', 'NIkklas', 'Harjunp', '$2y$10$ozm5x5qhrBCS2D4LCjfQlevOE.ARvZFLqvarr1n0H7EA0fiI9hbIq', 'niklasharjunpaa@gmai.com', '00980', 'looking for a female', 18, 123, 'EUR', 'female', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
