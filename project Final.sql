-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 06:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionNo` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choiceA` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choiceB` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choiceC` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choiceD` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionNo`, `question`, `answer`, `choiceA`, `choiceB`, `choiceC`, `choiceD`, `bonus`) VALUES
('1', '請問世界盃每隔幾年一次?', 'D', '1', '2', '3', '4', 1000),
('10', '香港恒生大學的簡稱是?', 'C', '痕大', '恆大', '恒大', '含大', 999999999),
('2', '以下哪個元素對帖文最為重要?', 'B', '接龍', '圖片', '陶國出產陶瓷茶具', '慰汝令堂', 2000),
('3', '在「你問我答」的帖文中 ，以下哪一個最大機會出現在第一個回應中?', 'A', '廚房幾大?', '你有10秒', '自爆唔答', '圖定令堂?', 3000),
('4', '以下哪部不是莎士比亞四大悲劇之一', 'B', '我讀drama架!!', '奧賽羅', '八千大元，比啲獎聲', 'B肯定唔係', 4000),
('5', '請問「霍金上知天文」的後句是？', 'D', '下知地理', '中資企業', '下知物理', '下肢癱瘓', 8000),
('6', '以下哪項是一般人聽到AHCC後的第一個回應?', 'C', '有前途', '係咪同HKCC有關?', '乜嘢嚟', 'An alpha-glucan rich nutritional supplem', 25000),
('7', '食麥當勞時要自行準備___', 'B', '金拱門會員證', '泰式辣醬一枝 及 佳之選飲管一包', '支付宝 QRCode', '清熱酷', 50000),
('8', '請問下列哪句最能宣洩乘客攜帶大理行李的不滿?', 'B', '你阿媽個波罩你啊', '度！度你阿媽塊布咩度！', '你冇抵抗力架?', '你有壓力我有壓力，你做咩要挑釁我呀！', 250000),
('9', '請問「力威健身」的下句是?', 'D', '包你放心', '只練上身', '健身又健心', '肥腫難分', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionNo` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skillA` tinyint(1) DEFAULT '1',
  `skillB` tinyint(1) DEFAULT '1',
  `skillC` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`account`, `questionNo`, `skillA`, `skillB`, `skillC`) VALUES
('admin', '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalReward` int(100) DEFAULT '0',
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`account`, `password`, `nickname`, `email`, `totalReward`, `admin`) VALUES
('a', 'b', 'name', 'ds@eqwe.com', 93000, 0),
('ac', 'pw', 'a', 'a@a', 1000842999, 0),
('admin', 'admin', 'admin', 'admin@admin', 0, 1),
('last', 'last', 'last', 'last@a', 1000842999, 0),
('p', 'o', 'qwe', 'email@email', 0, 0),
('qqqqq', 'qqqqq', 'dsadas', 'ds@eqwe.com', 1000, 0),
('r', 't', 'weqe', 'email@email', 1000842999, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionNo`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`account`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`account`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`account`) REFERENCES `user` (`account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
