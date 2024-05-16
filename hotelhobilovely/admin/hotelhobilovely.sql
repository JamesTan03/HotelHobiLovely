-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 03:40 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`noic`, `nama`, `alamat`, `email`) VALUES
('910221-14-0102', 'Mew Suppasit', 'No. 2359, Jalan TharnType, Taman Waanjai', 'mewhusbandgulf@yahoo.com'),
('930309-14-0102', 'Min Yoongi', 'No. 0613, Jln. bangsihyuk, Taman Bangbangtan', 'sugababie@yahoo.com'),
('940218-14-0102', 'Jung Hoseok', 'No. 0613, Jln. bangsihyuk, Taman Bangbangtan', 'hoseokhope@gmail.com'),
('940223-14-0102', 'Earth Pirapat', 'No. 2302, Jalan EarthMix, Kampung 1000stars', 'earthrapatrapat@gmail.com'),
('940912-83-1110', 'Kim Namjoon', 'No. 0613, Jln. bangsihyuk, Taman Bangbangtan', 'jooniebonsai@gmail'),
('951231-14-0102', 'Kim Taehyung', 'No. 0613, Jln. bangsihyuk, Taman Bangbangtan', 'taetaebear@yahoo.com'),
('971204-31-8673', 'Gulf Kanawut', 'No. 2359, Jalan TharnType, Taman Waanjai', 'gulfhusbandmew@yahoo.com'),
('971227-31-8673', 'Bright Vachirawit', 'No. 32, Jln 2gether, Taman BrightWin', 'brightisnotstr8@gmail.com'),
('980722-14-0102', 'Mix Sahaphap', 'No. 2302, Jalan EarthMix, Kampung 1000stars', 'mixitallup@yahoo.com'),
('990221-14-0999', 'Win Metawin', 'No. 32, Jln 2gether, Taman BrightWin', 'winjustwonmywholeheart@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `idjenis` char(5) NOT NULL,
  `bilangan` char(2) NOT NULL,
  `jenisbilik` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`tarikhmasuk`, `tarikhkeluar`, `bayaranakhir`, `deposit`, `noic`, `idbilik`, `idservice`) VALUES
('2020-11-05', '2020-11-08', 0, 80, '910221-14-0102', 'B15', 'SERV3'),
('2020-11-07', '2020-11-10', 0, 70, '930309-14-0102', 'C10', 'SERV2'),
('2020-09-25', '2020-09-28', 0, 80, '971204-31-8673', 'B15', 'SERV5');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `idbilik` char(5) NOT NULL,
  `hargabilik` double DEFAULT NULL,
  `idjenis` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`idbilik`, `hargabilik`, `idjenis`) VALUES
('A07', 140, 'JSG'),
('A26', 140, 'JSG'),
('A30', 140, 'JSG'),
('B15', 220, 'JDB'),
('B30', 220, 'JDB'),
('C04', 360, 'JFR'),
('C10', 360, 'JFR');

--
-- Indexes for dumped tables
--

CREATE TABLE `services` (
    `idservice` char(5) NOT NULL,
    `servicename` char(50) NOT NULL,
    `price` double DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `services` (`idservice`, `servicename`, `price`) VALUES
('SERV1', 'Bell Man', 0.00),
('SERV2', 'Wi-Fi', 5.00),
('SERV3', 'Breakfast', 0.00),
('SERV4', 'Room Service', 5.00),
('SERV5', 'Gym', 20.00),
('SERV6', 'Cafe Buffet', 20.00),
('SERV7', 'Swimming Pool', 0.00);

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
  
 ALTER TABLE `services`
	ADD PRIMARY KEY (`idservice`);

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