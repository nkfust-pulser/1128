-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 01:39 PM
-- Server version: 5.7.19-log
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members`
--

-- --------------------------------------------------------

--
-- Table structure for table `fdlogs`
--

CREATE TABLE `fdlogs` (
  `辨識碼` varchar(20) NOT NULL,
  `userid` varchar(25) NOT NULL,
  `cdate` date NOT NULL,
  `heart` text NOT NULL,
  `liver` text NOT NULL,
  `spleen` text NOT NULL,
  `lung` text NOT NULL,
  `kidney` text NOT NULL,
  `stomach` text NOT NULL,
  `gall_brani` text NOT NULL,
  `blader` text NOT NULL,
  `the_large_intestine` text NOT NULL,
  `the_small_intestine` text NOT NULL,
  `triple_burner` text NOT NULL,
  `pericardium` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `measure_time`
--

CREATE TABLE `measure_time` (
  `index` varchar(50) NOT NULL,
  `userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `measure_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `measure_time`
--

INSERT INTO `measure_time` (`index`, `userid`, `measure_time`) VALUES
('1', 'david90', '2015-10-12 15:50:00'),
('2', 'david90', '2015-10-12 18:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `members_account`
--

CREATE TABLE `members_account` (
  `id` int(50) NOT NULL,
  `userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_account`
--

INSERT INTO `members_account` (`id`, `userid`, `username`, `password`, `mail_address`) VALUES
(1, 'david90', 'David-Lou', 'david90', 'david90@gmail.com'),
(2, 'pulseradmin123', '希特肋', 'admin123', 'allhellhitler@gmail.com'),
(3, 'david236', 'david-chou', '$2y$10$ESIu62ievY27u16LMTAkSuKZ3m4h0bXQnFsQ9/OjC8CuXZ9c2f64K', '123456789@gmail.com'),
(4, 'huang234', '森忠商', '$2y$10$m.6bffMYh/O/Y7..hj2.mePcttgy6KR5Dukke4T2.x/k6f7zFR/gW', 'lovelyjunkie2020@gmail.com'),
(5, 'x123456', '孫中三', '$2y$10$d9dHbUtKmFZiSxrAE6mREOtM5Z2VxR8yDYu73QLB95o.vtY4I2kbm', 'x123456@gmail.com'),
(6, 'x1234567', '峇島好勝', '$2y$10$otbbLUY/86gFTIb0qHNUoOWuNLZcpR2CeGPtP/im9PcFUdwspzt..', 'x1234567@gmail.com'),
(7, 'x12345678@gmail.com', '黃村難行', '$2y$10$ZakmK/Vs4OU4RM.PtpbJPu2EYMFvaTXlhi70TacEPw0Mpf4SSiA0.', 'x12345678@gmail.com'),
(11, 'x12345', '韃靼樂', '$2y$10$QdEr2LLxSOck2wY/.EsjTuzMvXU91QB5CRxWa57qjBLQk7gcMsFjG', 'x12345@gmail.com'),
(12, 'abc12812', '喬瑟', '$2y$10$t5K2H949izYIhbA2YOtoVuF2XwvQ/Ib2OWA9.wqnUOyh1w/qdGpCm', 'abc@gmail.com'),
(13, 'xxxxxxxx', 'xxxxxxxxxxx', '$2y$10$Cb0JnOHfWfYl6q3oaj1hp.mjFJKvIM9lWmMF3weg5PqamLGN0GKy6', 'xxxxxxxxxxxxxxxxxx'),
(14, 'zzzzzzzzzzzz', 'zzzzzz', '$2y$10$2961v5KrKLsSAnUgHXAl9eJrxmX9KXlJqPxgqcInEAash1pECnY02', 'zzzzzzzzzzzzzz'),
(15, 'avagegew', 'cccc', '$2y$10$floI6FynqRwZi/1PdX8.1.fI04GDVn3uMHWZcQJqCjNwxDlcMfJYm', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz'),
(16, 'asghrwh', 'aavavb', '$2y$10$vdLQ0M.OaL3BF5puOeiEv.803WxXIfByBaXVI0YaFyX.7pbxsSpu2', 'zxzxzx'),
(17, 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', '$2y$10$PiuqPpiQ1cGUMokVmaAUqODj9yjxShp32viMvRphyAFK8yU1tAYaO', 'aaaaaaaaaaa'),
(18, 'fuckyou', 'yourmother', 'whatthefuck', 'asfrgrwhh'),
(23, 'zxc123456', '僑生', '$2y$10$9xE2DELuLi3HKagcB.Fy6u/GfDNLZYkjVL/19qc6.rWAGh/YppAW6', 'zxc12346@gmail.com'),
(24, 'zxc9215712', '黃老', '$2y$10$SK8g3crMQDXn3BfyP1UAn.FxDvZG9dDtSICVQDGv1ts/DgujSg5RG', 'zxc9215712@gmail.com'),
(25, 'qwerty', 'qwerty', '$2y$10$I0kovvFs3EbmmU/Psram2uu6W.9aOIEAkXOvZ7Sa5UOvLCiDtrULC', '1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `peaks`
--

CREATE TABLE `peaks` (
  `index` varchar(50) NOT NULL,
  `userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `measure_time` date NOT NULL,
  `firstPeaks` varchar(50) NOT NULL,
  `secondPeaks` varchar(50) NOT NULL,
  `thirdPeaks` varchar(50) NOT NULL,
  `fourthPeaks` varchar(50) NOT NULL,
  `fifthPeaks` varchar(50) NOT NULL,
  `sixthPeaks` varchar(50) NOT NULL,
  `seventhPeaks` varchar(50) NOT NULL,
  `eighthPeaks` varchar(50) NOT NULL,
  `ninthPeaks` varchar(50) NOT NULL,
  `tenthPeaks` varchar(50) NOT NULL,
  `eleventhPeaks` varchar(50) NOT NULL,
  `twelvethPeaks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `physiological`
--

CREATE TABLE `physiological` (
  `辨識碼` varchar(20) NOT NULL,
  `typex` int(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ratio`
--

CREATE TABLE `ratio` (
  `辨識碼` varchar(20) NOT NULL,
  `typex` int(10) NOT NULL,
  `sequence` int(10) NOT NULL,
  `description` text NOT NULL,
  `basescore_low` varchar(25) NOT NULL,
  `basescore_upper` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `辨識碼` varchar(20) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nick_ame` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `c_day` varchar(10) NOT NULL,
  `history` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_information`
--

CREATE TABLE `users_information` (
  `id` int(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail_address` varchar(100) NOT NULL,
  `user_sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone` varchar(10) DEFAULT NULL,
  `user_height` varchar(5) DEFAULT NULL,
  `user_weight` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_information`
--

INSERT INTO `users_information` (`id`, `userid`, `username`, `mail_address`, `user_sex`, `user_phone`, `user_height`, `user_weight`) VALUES
(1, 'bfbdfbdfb', '大聲二號', 'fdbfdbfdb', '男性', 'fdb', '111', '111'),
(2, 'fuckyou', 'yourmother', 'asfrgrwhh', NULL, NULL, NULL, NULL),
(3, 'zxc123456', '僑生', 'zxc12346@gmail.com', NULL, NULL, NULL, NULL),
(4, 'zxc9215712', '黃老', 'zxc9215712@gmail.com', NULL, 'dvdsadbbf', '196', '70'),
(5, 'qwerty', 'qwerty', '1@gmail.com', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `measure_time`
--
ALTER TABLE `measure_time`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `members_account`
--
ALTER TABLE `members_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `peaks`
--
ALTER TABLE `peaks`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `users_information`
--
ALTER TABLE `users_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members_account`
--
ALTER TABLE `members_account`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users_information`
--
ALTER TABLE `users_information`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
