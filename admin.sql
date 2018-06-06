-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2018 at 04:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employer`
--

CREATE TABLE `Employer` (
  `IDEmployer` int(11) NOT NULL,
  `DNI` varchar(25) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Birth` date NOT NULL,
  `Status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE `Supplier` (
  `IDSupplier` int(11) NOT NULL,
  `DNI` varchar(30) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone1` varchar(30) NOT NULL,
  `Phone2` varchar(30) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Contact` varchar(40) NOT NULL,
  `Status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDUser` int(11) NOT NULL,
  `IDEmployer` int(11) NOT NULL,
  `UserName` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `Status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDUser`, `IDEmployer`, `UserName`, `Password`, `Role`, `Status`, `create_at`, `update_at`) VALUES
(1, 1, 'dgutierrez', '123', 'Admin', 'Enabled', '2018-05-03 19:20:24', '2018-05-03 19:20:24'),
(2, 1, 'mmora', 'clave', 'Admin', 'Enabled', '2018-05-03 19:32:45', '2018-05-03 19:32:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employer`
--
ALTER TABLE `Employer`
  ADD PRIMARY KEY (`IDEmployer`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`IDSupplier`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`),
  ADD KEY `IDEmployer` (`IDEmployer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employer`
--
ALTER TABLE `Employer`
  MODIFY `IDEmployer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
