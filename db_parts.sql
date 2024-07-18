-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 10:59 AM
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
-- Database: `db_parts`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `acc_empnum` int(20) NOT NULL,
  `acc_empname` varchar(25) NOT NULL,
  `acc_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `acc_empnum`, `acc_empname`, `acc_password`) VALUES
(1, 2303949, 'Daryl Magpantay', 'emipe2dcm'),
(7, 2400008, 'warren', 'emipe2wsc'),
(8, 896, 'Florence Ochoa', 'emipe2fbo'),
(9, 7961, 'AILYN PANTOJA', '*007961#');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_in`
--

CREATE TABLE `tbl_in` (
  `ID` int(15) NOT NULL,
  `fld_partnumber` varchar(50) NOT NULL,
  `fld_compartnum` varchar(50) NOT NULL,
  `fld_partname` varchar(15) NOT NULL,
  `fld_regCode` varchar(30) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Supplier` varchar(15) NOT NULL,
  `fld_date` date NOT NULL,
  `fld_empname` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory_system`
--

CREATE TABLE `tbl_inventory_system` (
  `ID` int(255) NOT NULL,
  `pas_partNum` varchar(255) NOT NULL,
  `pas_partName` varchar(255) NOT NULL,
  `pas_compartnum` varchar(255) NOT NULL,
  `pas_supcode` varchar(255) NOT NULL,
  `pas_unitprice` varchar(255) NOT NULL,
  `pas_carmodel` varchar(255) NOT NULL,
  `pas_clrsticker` varchar(255) NOT NULL,
  `pas_standardstock` varchar(255) NOT NULL,
  `pas_safetystock` varchar(255) NOT NULL,
  `pas_RegCode` varchar(255) NOT NULL,
  `pas_RevLvl` int(255) NOT NULL,
  `pas_location` varchar(255) NOT NULL,
  `pas_orderNum` varchar(255) NOT NULL,
  `pas_Quantity_order` int(255) NOT NULL,
  `pas_remarks` varchar(255) NOT NULL,
  `pas_harness_Code` varchar(255) NOT NULL,
  `pas_conveyor` varchar(255) NOT NULL,
  `pas_overstock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inventory_system`
--

INSERT INTO `tbl_inventory_system` (`ID`, `pas_partNum`, `pas_partName`, `pas_compartnum`, `pas_supcode`, `pas_unitprice`, `pas_carmodel`, `pas_clrsticker`, `pas_standardstock`, `pas_safetystock`, `pas_RegCode`, `pas_RevLvl`, `pas_location`, `pas_orderNum`, `pas_Quantity_order`, `pas_remarks`, `pas_harness_Code`, `pas_conveyor`, `pas_overstock`) VALUES
(1, '7047-3565-30', 'checker ', '4444', 'japan45824we', '500', '890W', 'B', '5', '4', 'aaaed63231', 2, 'H1', '5', 4, 'null', '345D', 's81', 6),
(2, '7047-35615-30', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 0, 'sggg', '234', 'Link Type', 0),
(3, '7047-35615-30', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 0, 'sggg', '234', 'Link Type', 0),
(4, '7047-35615-30', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 0, 'sggg', '234', 'Link Type', 0),
(5, '7047-35615-30', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 0, 'sggg', '234', 'Link Type', 0),
(6, '7047-35615-31', 'AirLeak Checker', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0),
(7, '7047-35615-31', 'AirLeak Checker', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0),
(8, '7047-35615', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0),
(9, '7047-35615-31', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0),
(10, '7047-35615-31', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0),
(11, '55555', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0),
(12, '55555', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0),
(13, '55555', 'Link Type', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0),
(14, '89-7100', 'Link Type', '89-9246', 'TNS', '156', 'Link Type', 'Link Type', '2', '2', '49HA036096', 0, 'H6-A1', 'BU20646', 2, '--', '721W', 'Link Type', 0),
(15, '5555537477', 'AirLeak Checker', '234', 'sjs', '400', 'Link Type', 'Link Type', '1', '2', 'eg484rg', 0, 'h1', '21', 2, 'sggg', '234', 'Link Type', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_in`
--
ALTER TABLE `tbl_in`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_inventory_system`
--
ALTER TABLE `tbl_inventory_system`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_in`
--
ALTER TABLE `tbl_in`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventory_system`
--
ALTER TABLE `tbl_inventory_system`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
