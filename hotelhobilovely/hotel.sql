-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 03:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelhobilovely`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` char(20) NOT NULL,
  `nama` char(100) NOT NULL,
  `katalaluan` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `katalaluan`) VALUES
('admin', 'ADMIN HOBI LOVELY', '1234abcd');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `noic` char(14) NOT NULL,
  `nama` char(100) NOT NULL,
  `alamat` char(250) NOT NULL,
  `email` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `idjenis` char(5) NOT NULL,
  `bilangan` char(2) NOT NULL,
  `jenisbilik` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis`
--
INSERT INTO `jenis` (`idjenis`, `bilangan`, `jenisbilik`) VALUES
('JDB', '50', 'Double Bed'),
('JFR', '30', 'Family Room'),
('JSG', '50', 'Single Bed');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `tarikhmasuk` char(30) NOT NULL,
  `tarikhkeluar` char(30) NOT NULL,
  `bayaranakhir` double DEFAULT NULL,
  `deposit` double DEFAULT NULL,
  `noic` char(14) NOT NULL,
  `idbilik` char(5) NOT NULL,
  `idservice` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `idbilik` char(5) NOT NULL,
  `hargabilik` double DEFAULT NULL,
  `idjenis` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room`
--
INSERT INTO `room` (`idbilik`, `hargabilik`, `idjenis`) VALUES
('A26', 140, 'JSG'),
('A30', 140, 'JSG'),
('B15', 220, 'JDB'),
('B30', 220, 'JDB'),
('C04', 360, 'JFR'),
('C10', 360, 'JFR');


-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `idservice` char(5) NOT NULL,
  `servicename` char(50) NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`idservice`, `servicename`, `price`) VALUES
('SERV1', 'Bell Man', 0),
('SERV2', 'Wi-Fi', 5),
('SERV3', 'Breakfast', 0),
('SERV4', 'Room Service', 5),
('SERV5', 'Gym', 20),
('SERV6', 'Cafe Buffet', 20),
('SERV7', 'Swimming Pool', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`noic`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`noic`,`idbilik`,`idservice`),
  ADD KEY `idbilik` (`idbilik`),
  ADD KEY `idservice` (`idservice`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idbilik`,`idjenis`),
  ADD KEY `idjenis` (`idjenis`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`idservice`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`noic`) REFERENCES `client` (`noic`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`idbilik`) REFERENCES `room` (`idbilik`),
  ADD CONSTRAINT `registration_ibfk_3` FOREIGN KEY (`idservice`) REFERENCES `services` (`idservice`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`idjenis`) REFERENCES `jenis` (`idjenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
