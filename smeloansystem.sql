-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 11:59 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smeloansystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `address` varchar(1255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `add_docu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `fname`, `mname`, `lname`, `birth_date`, `phone_number`, `address`, `image`, `add_docu`) VALUES
(202185434, 'admin', 'admin', 'admin', '', '', '', 0, '', '', '0'),
(227180038, 'jan', 'bautista', 'Jan Russell', 'Hecita', 'Bautista', '01/02/1993', 2147483647, '208-D Jalandoni Estate, Lapuz, Iloilo City', 'placeholder.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `birth_date` varchar(50) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `address` varchar(1255) NOT NULL,
  `balance` int(50) NOT NULL,
  `due_date` varchar(255) NOT NULL DEFAULT 'No existing loan balance',
  `image` varchar(255) NOT NULL,
  `add_docu` varchar(255) NOT NULL,
  `tier` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `admin_id`, `fname`, `mname`, `lname`, `birth_date`, `phone_number`, `address`, `balance`, `due_date`, `image`, `add_docu`, `tier`) VALUES
(202184927, 30011210, 'Jan', 'Russell', 'Bautista', '01/01/1966', 1234567890, 'Test address street, city, country', 1000, '', 'placeholder.jpg', '', 6),
(202184934, 30011210, 'Kevin', 'Lee', 'Willis', '01/01/1966', 1234567890, 'Test address street, city, country', 0, 'No existing loan balance', 'placeholder.jpg', '', 12),
(202184942, 30011210, 'Steven', 'Webb', 'Litwin', '01/01/1966', 1234567890, 'Test address street, city, country', 0, 'No existing loan balance', 'placeholder.jpg', '', 3),
(202185003, 30011210, 'Robert', 'Litwin', 'Webb', '01/01/1966', 1234567890, 'Test address street, city, country', 0, 'No existing loan balance', 'placeholder.jpg', '', 9),
(202185010, 30011210, 'Peter', 'Johnson', 'Roberts', '01/01/1966', 1234567890, 'Test address street, city, country', 0, 'No existing loan balance', 'placeholder.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `loan_amount` int(255) NOT NULL,
  `loan_date` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `customer_id`, `admin_id`, `loan_amount`, `loan_date`, `due_date`) VALUES
(227181610, 202184927, 202185434, 1000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `payment_amount` int(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `customer_id`, `admin_id`, `payment_amount`, `payment_date`) VALUES
(227182104, 202184927, 202185434, 5000, 'Feb/27/2018 10:21:04 PM'),
(227182218, 202184927, 202185434, 5000, 'Feb/27/2018 10:22:18 PM'),
(227182402, 202184927, 202185434, 1000, 'Feb/27/2018 10:24:02 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
