-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 09:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecor`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `itemName` varchar(50) NOT NULL COMMENT 'Name of item.',
  `itemID` int(3) NOT NULL COMMENT 'Unique integer identifier for each item.',
  `stockTotal` int(2) NOT NULL COMMENT 'Total quantity of this item in stock.',
  `stockInUse` int(2) NOT NULL COMMENT 'Number of items for this item being borrowed/used.',
  `category` text NOT NULL COMMENT 'Separate categories with commas, such as: (Discrete, Resistors)',
  `locations` binary(10) NOT NULL COMMENT 'Each location is represented by a bit in the order of the Laboratories dropdown. (0000000001 - only found in V404, 1001001100 - found in M402A, V303A, V312, V401) '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNumber` int(8) NOT NULL COMMENT 'Unique order identifier.',
  `orderStart` timestamp NULL DEFAULT NULL COMMENT 'Data and time when the order is to begin, meaning when the item is to be checked out.',
  `orderEnd` timestamp NULL DEFAULT NULL COMMENT 'Data and time when the order is to begin, meaning when the item is to be returned.',
  `idNumber` int(8) NOT NULL COMMENT 'ID number of student or faculty making the order.',
  `location` int(2) NOT NULL COMMENT 'Location number from where the components will be borrowed from. (1 to 10, 1 being M402A, 10 being V404)',
  `itemID` int(8) NOT NULL COMMENT 'ID of item to be borrowed.',
  `itemQuantity` int(2) NOT NULL COMMENT 'Number of items to be borrowed.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
