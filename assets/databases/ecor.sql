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


--  Inserting Data*

INSERT INTO `inventory` (`itemName`, `itemID`, `stockTotal`, `stockInUse`, `category`, `locations`) VALUES
('Resistor', 1, 500, 50, 'Discrete, Resistors', b'000000001'),
('Capacitor', 2, 300, 30, 'Discrete, Capacitors', b'000000010'),
('Zener Diode', 3, 100, 10, 'Discrete, Diodes', b'000000001'),
('Breadboard', 4, 50, 10, 'Laboratory Equipment, Breadboards', b'000000001'),
('Jumper Cables', 5, 100, 20, 'Laboratory Equipment, Cables', b'000000001'),
('AC and DC Power Supply', 6, 20, 5, 'Power Supply, AC/DC', b'000000001'),
('Analog Multimeter', 7, 40, 10, 'Measuring Instruments, Multimeters', b'000000001'),
('Inverter', 8, 15, 3, 'Power Supply, Inverters', b'000000011'),
('Electric Circuits Training Systems', 9, 25, 5, 'Training Systems, Electric Circuits', b'000000011'),
('DC Power Supply', 10, 30, 8, 'Power Supply, DC', b'000000011'),
('Digital Multimeters', 11, 50, 10, 'Measuring Instruments, Digital Multimeters', b'000000011'),
('Alligator Wires', 12, 200, 50, 'Laboratory Equipment, Wires', b'000000011'),
('Potentiometer', 13, 100, 20, 'Discrete, Potentiometers', b'000000011'),
('Inductors', 14, 75, 15, 'Discrete, Inductors', b'000000011'),
('Analog Oscilloscopes', 15, 20, 5, 'Measuring Instruments, Oscilloscopes', b'000000011'),
('Logic Probes', 16, 30, 10, 'Measuring Instruments, Logic Probes', b'000000011'),
('Curve Tracers', 17, 15, 3, 'Measuring Instruments, Curve Tracers', b'000000011'),
('Signal Generators', 18, 25, 8, 'Measuring Instruments, Signal Generators', b'000000011'),
('Light Emitting Diode', 19, 200, 50, 'Discrete, LEDs', b'000000011'),
('Logic Trainers', 20, 10, 2, 'Training Systems, Logic Trainers', b'000000011');


-- Insert initial data into the orders table
INSERT INTO `orders` (`orderNumber`, `orderStart`, `orderEnd`, `idNumber`, `location`, `itemID`, `itemQuantity`) VALUES
(1, '2024-07-26 10:00:00', '2024-07-27 10:00:00', 12345678, 1, 1, 10),
(2, '2024-07-26 11:00:00', '2024-07-27 11:00:00', 87654321, 2, 2, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
