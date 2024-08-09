-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 01:16 AM
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
  `locations` binary(10) NOT NULL COMMENT 'Each location is represented by a bit in the order of the Laboratories dropdown. (0000000001 - only found in V404, 1001001100 - found in M402A, V303A, V312, V401) ',
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`itemName`, `itemID`, `stockTotal`, `stockInUse`, `category`, `locations`, `img`) VALUES
('Resistor', 1, 500, 50, 'Discrete, Resistors', 0x31303030303130303031, '../assets/equipment_pictures/1.jpg'),
('Capacitor', 2, 300, 30, 'Discrete, Capacitors', 0x31313030303030303130, '../assets/equipment_pictures/2.jpg'),
('Zener Diode', 3, 100, 10, 'Discrete, Diodes', 0x31303030303130303031, '../assets/equipment_pictures/3.jpg'),
('Breadboard', 4, 50, 10, 'Laboratory Equipment, Breadboards', 0x31313130313131303031, '../assets/equipment_pictures/4.jpg'),
('Jumper Cables', 5, 100, 20, 'Laboratory Equipment, Cables', 0x31303031303030303030, '../assets/equipment_pictures/5.jpg'),
('AC and DC Power Supply', 6, 20, 5, 'Power Supply, AC/DC', 0x31303131313030303031, '../assets/equipment_pictures/6.jpg'),
('Analog Multimeter', 7, 40, 10, 'Measuring Instruments, Multimeters', 0x31303030303130313131, '../assets/equipment_pictures/7.jpg'),
('Inverter', 8, 15, 3, 'Power Supply, Inverters', 0x31313131313131313131, '../assets/equipment_pictures/8.jpg'),
('Electric Circuits Training Systems', 9, 25, 5, 'Training Systems, Electric Circuits', 0x31303031313031303030, '../assets/equipment_pictures/9.jpg'),
('DC Power Supply', 10, 30, 8, 'Power Supply, DC', 0x31313131313131313131, '../assets/equipment_pictures/10.jpg'),
('Digital Multimeters', 11, 50, 10, 'Measuring Instruments, Digital Multimeters', 0x31313131313131313131, '../assets/equipment_pictures/11.jpg'),
('Alligator Wires', 12, 200, 50, 'Laboratory Equipment, Wires', 0x31313030303031313131, '../assets/equipment_pictures/12.jpg'),
('Potentiometer', 13, 100, 20, 'Discrete, Potentiometers', 0x31313131313131313131, '../assets/equipment_pictures/13.jpg'),
('Inductors', 14, 75, 15, 'Discrete, Inductors', 0x31303030313130313131, '../assets/equipment_pictures/14.jpg'),
('Analog Oscilloscopes', 15, 20, 5, 'Measuring Instruments, Oscilloscopes', 0x31313030303030303130, '../assets/equipment_pictures/15.jpg'),
('Logic Probes', 16, 30, 10, 'Measuring Instruments, Logic Probes', 0x31313031313030313030, '../assets/equipment_pictures/16.jpg'),
('Curve Tracers', 17, 15, 3, 'Measuring Instruments, Curve Tracers', 0x31303031313031303030, '../assets/equipment_pictures/17.jpg'),
('Signal Generators', 18, 25, 8, 'Measuring Instruments, Signal Generators', 0x31303131313031303031, '../assets/equipment_pictures/18.jpg'),
('Light Emitting Diode', 19, 200, 50, 'Discrete, LEDs', 0x31303131313130303030, '../assets/equipment_pictures/19.jpg'),
('Logic Trainers', 20, 10, 2, 'Training Systems, Logic Trainers', 0x31313131303030303131, '../assets/equipment_pictures/20.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`itemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
