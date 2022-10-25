-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 01:22 PM
-- Server version: 10.4.11-MariaDB
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
-- Database: `dbase_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `katalaluan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `katalaluan`) VALUES
('1', '1', 'admin@mail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bilik`
--

CREATE TABLE `bilik` (
  `nobilik` varchar(6) NOT NULL,
  `kodjenis` varchar(20) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bilik`
--

INSERT INTO `bilik` (`nobilik`, `kodjenis`, `harga`) VALUES
('A101', 'NSS', 80),
('A102', 'NSS', 80),
('A103', 'NDD', 100),
('A104', 'NDD', 100),
('A105', 'SDD', 160),
('A106', 'SDD', 160),
('C01', 'NDD', 100),
('C010', 'SDD', 160),
('C02', 'NDD', 100),
('C03', 'NDD', 100),
('C04', 'NDD', 100),
('C05', 'NDD', 100),
('C06', 'NSS', 130),
('C07', 'NSS', 130),
('C08', 'SDD', 160),
('C09', 'SDD', 160);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `kodjenis` varchar(20) NOT NULL,
  `jenisbilik` varchar(20) NOT NULL,
  `ameniti` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`kodjenis`, `jenisbilik`, `ameniti`) VALUES
('NDD', 'Katil Double', 'TV, Tuala dan Penghawa Dingin'),
('NSS', 'Katil Single', 'TV, Tuala dan Penghawa Dingin'),
('SDD', 'Superior Double', 'TV, Tuala, Selipar, Baju Tido dan Penghawa Dingin');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nokp` varchar(14) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`nokp`, `nama`, `email`, `notelefon`) VALUES
('020201-14-9124', 'Ali bin Abu', 'matali@mail.com', '012-345 6789'),
('030303-03-3344', 'Siti Bakar', 'siti@mail.com', '012-345 6711'),
('030828190321', 'isa', 'isa@mail.com', '01243123123');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `tarikhmasuk` varchar(30) NOT NULL,
  `tarikhkeluar` varchar(30) DEFAULT NULL,
  `deposit` double DEFAULT NULL,
  `bayaranakhir` double DEFAULT NULL,
  `semakbayaran` tinyint(1) DEFAULT NULL,
  `nokp` varchar(14) NOT NULL,
  `nobilik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`tarikhmasuk`, `tarikhkeluar`, `deposit`, `bayaranakhir`, `semakbayaran`, `nokp`, `nobilik`) VALUES
('2020-10-25', '2020-10-29', 60, 0, NULL, '030828190321', 'A105');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `bilik`
--
ALTER TABLE `bilik`
  ADD PRIMARY KEY (`nobilik`),
  ADD KEY `kodjenis` (`kodjenis`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`kodjenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`nokp`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`nokp`,`nobilik`,`tarikhmasuk`),
  ADD KEY `nobilik` (`nobilik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilik`
--
ALTER TABLE `bilik`
  ADD CONSTRAINT `bilik_ibfk_1` FOREIGN KEY (`kodjenis`) REFERENCES `jenis` (`kodjenis`);

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`nokp`) REFERENCES `pelanggan` (`nokp`),
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`nobilik`) REFERENCES `bilik` (`nobilik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
