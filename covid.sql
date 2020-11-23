-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2020 at 09:22 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(35) NOT NULL,
  `admin_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `data_global`
--

CREATE TABLE `data_global` (
  `dg_id` int(11) NOT NULL,
  `dg_country` varchar(50) NOT NULL,
  `dg_pos` int(11) NOT NULL,
  `dg_healed` int(11) NOT NULL,
  `dg_died` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_global`
--

INSERT INTO `data_global` (`dg_id`, `dg_country`, `dg_pos`, `dg_healed`, `dg_died`) VALUES
(4, 'US', 1212123, 189791, 71526),
(5, 'Spain', 219329, 123486, 25613),
(6, 'Italy', 214457, 93245, 29684),
(7, 'United Kingdom', 202355, 926, 30150),
(8, 'France', 170694, 52859, 25538),
(9, 'Germany', 168162, 139900, 7275);

-- --------------------------------------------------------

--
-- Table structure for table `data_lokal`
--

CREATE TABLE `data_lokal` (
  `dl_id` int(11) NOT NULL,
  `dl_age` int(3) NOT NULL,
  `dl_gender` varchar(20) NOT NULL,
  `dl_stats` varchar(15) NOT NULL,
  `dl_states` varchar(75) NOT NULL,
  `dl_hospital` varchar(100) NOT NULL,
  `dl_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lokal`
--

INSERT INTO `data_lokal` (`dl_id`, `dl_age`, `dl_gender`, `dl_stats`, `dl_states`, `dl_hospital`, `dl_date`) VALUES
(18, 222222, 'female', 'neg', 'Riau', 'rs', '2020-04-10'),
(19, 12, 'male', 'pos', 'Sumatera Barat', '-', '2020-05-06'),
(20, 22, 'female', 'pos', 'Bali', '-', '2020-05-06'),
(21, 44, 'male', 'pos', '-', '-', '2020-05-04'),
(22, 21, '-', 'pos', 'Sumatera Selatan', '-', '2020-04-27'),
(23, 21, '-', 'pos', 'Sumatera Selatan', '-', '2020-04-27'),
(24, 1, '-', 'neg', '-', '-', '2020-05-07'),
(25, 2, '-', 'neg', '-', '-', '2020-04-28'),
(26, 43, '-', 'pos', '-', '-', '2020-05-02'),
(28, 44, '-', 'pos', '-', '-', '2020-05-05'),
(29, 33, '-', 'pos', '-', '-', '2020-04-07'),
(30, 54, '-', 'pos', '-', '-', '2020-04-06'),
(31, 33, '-', 'pos', '-', '-', '2020-03-03'),
(32, 12, '-', 'pos', '-', '-', '2020-04-18'),
(33, 33, '-', 'pos', '-', '-', '2020-05-06'),
(34, 44, '-', 'pos', '-', '-', '2020-05-05'),
(35, 14, '-', 'healed', '-', '-', '2020-05-05'),
(36, 22, '-', 'healed', '-', '-', '2020-04-28'),
(37, 12, '-', 'healed', '-', '-', '2020-04-27'),
(38, 33, '-', 'healed', '-', '-', '2020-04-26'),
(39, 45, '-', 'died', '-', '-', '2020-04-07'),
(40, 65, '-', 'died', '-', '-', '2020-04-17'),
(42, 25, '-', 'pos', '-', '-', '2020-05-05'),
(43, 66, '-', 'died', '-', '-', '2020-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `hotlines`
--

CREATE TABLE `hotlines` (
  `hl_id` int(11) NOT NULL,
  `hl_number` varchar(15) NOT NULL,
  `hl_name` varchar(75) NOT NULL,
  `hl_img` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotlines`
--

INSERT INTO `hotlines` (`hl_id`, `hl_number`, `hl_name`, `hl_img`) VALUES
(5, '0215210411', 'Kementrian Kesehatan', 'hi2kxQSwLS.png'),
(6, '081212123119', 'Kementrian Kesehatan', 'SCj5W3Bcyw.png'),
(7, '112', 'Pemprov DKI Jakarta', 'QUBBeq7kuY.png'),
(8, '081388376955', 'Pemprov DKI Jakarta', 'X3iY6kR3DC.png'),
(9, '0243580713', 'Pemprov Jawa Tengah', '4u8Jd4br3L.png'),
(10, '082313600560', 'Pemprov Jawa Tengah', '9I7RoPneF4.png'),
(11, '0318430313', 'Pemprov Jawa Timur', 'UuUicveI88.png'),
(12, '081334367800', 'Pemprov Jawa Timur', 'KFycZHfULj.png'),
(13, '119', 'Pemprov Jawa Barat', 'CJz11kHb94.png'),
(14, '0811-209-3306', 'Pemprov Jawa Barat', 'gEXEM7IxH3.png'),
(18, '0274555585', 'Pemprov D.I Yogyakarta', 'nj6sKmBCEi.png'),
(19, '0811-2764-800', 'Pemprov D.I Yogyakarta', '80uLI0N6gh.png');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `msg_id` int(11) NOT NULL,
  `msg_name` varchar(75) NOT NULL,
  `msg_email` varchar(55) NOT NULL,
  `msg_text` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`msg_id`, `msg_name`, `msg_email`, `msg_text`) VALUES
(3, 'john doe', 'john@doe.com', 'tes 123\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `data_global`
--
ALTER TABLE `data_global`
  ADD PRIMARY KEY (`dg_id`);

--
-- Indexes for table `data_lokal`
--
ALTER TABLE `data_lokal`
  ADD PRIMARY KEY (`dl_id`);

--
-- Indexes for table `hotlines`
--
ALTER TABLE `hotlines`
  ADD PRIMARY KEY (`hl_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_global`
--
ALTER TABLE `data_global`
  MODIFY `dg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_lokal`
--
ALTER TABLE `data_lokal`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `hotlines`
--
ALTER TABLE `hotlines`
  MODIFY `hl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
