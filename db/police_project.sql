-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 01:44 PM
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
-- Database: `police_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(255) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_tel` text NOT NULL,
  `admin_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_tel`, `admin_pwd`) VALUES
(1, 'schammah97@gmail.com', '0785000704', '814989b983fd853fb374e1676a06ade4');

-- --------------------------------------------------------

--
-- Table structure for table `card_table`
--

CREATE TABLE `card_table` (
  `card_id` int(11) NOT NULL,
  `card_photo` text NOT NULL,
  `card_number` int(11) NOT NULL,
  `card_owner` varchar(100) NOT NULL,
  `station_id` int(11) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `language_table`
--

CREATE TABLE `language_table` (
  `english_on_off` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_table`
--

INSERT INTO `language_table` (`english_on_off`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `request_table`
--

CREATE TABLE `request_table` (
  `request_id` int(100) NOT NULL,
  `request_name` varchar(250) NOT NULL,
  `request_email` varchar(255) NOT NULL,
  `request_pwd` varchar(255) NOT NULL,
  `request_keycode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `station_table`
--

CREATE TABLE `station_table` (
  `station_id` int(255) NOT NULL,
  `station_name` varchar(100) NOT NULL,
  `station_email` varchar(100) NOT NULL,
  `station_pwd` varchar(100) NOT NULL,
  `station_start_date` date NOT NULL,
  `station_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `card_table`
--
ALTER TABLE `card_table`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `request_table`
--
ALTER TABLE `request_table`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `station_table`
--
ALTER TABLE `station_table`
  ADD PRIMARY KEY (`station_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_table`
--
ALTER TABLE `card_table`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request_table`
--
ALTER TABLE `request_table`
  MODIFY `request_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `station_table`
--
ALTER TABLE `station_table`
  MODIFY `station_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
