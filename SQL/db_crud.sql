-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 11:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `em_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`em_id`, `name`, `id`, `phone`, `email`, `designation`) VALUES
(4, 'Mr. a', 5, '8801128323', 'salimhosen183@gmail.com', 'worker'),
(5, 'Habibur rahman', 5, '8801128323', 'aslamhabib@gmail.com', 'worker'),
(6, 'new demo one', 9, '0172327323', 'testsalim9@gmail.com', 'ceo'),
(7, 'Hasan haider', 10, '8801128323', 'salimhosen1a9@gmail.com', 'Manager'),
(8, 'mohammad himel', 11, '8801128323', 'habibahmed@gmail.com', 'Manager'),
(9, 'demo one', 12, '012323232', 'salim933@gmail.com', 'worker'),
(10, 'Mr. a', 14, '8801128323', 'salimhosen183dj@gmail.com', 'worker'),
(11, 'Habibur rahman', 19, '8801128323', 'aslamhafbib@gmail.com', 'worker'),
(12, 'new demo one', 20, '0172327323', 'testsalidm9@gmail.com', 'ceo'),
(13, 'New Test', 22, '0193843843', 'salim@gmail.com', 'individual');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `username`, `pass`, `email`) VALUES
(1, 'salim', 'fe01ce2a7fbac8fafaed7c982a04e229', 'salimhosen19@gmail.com'),
(2, 'foisal', 'faab9ee2b0b990ad4c6ef2f69e777350', 'foisal@gmail.com'),
(3, 'demo', '5f4dcc3b5aa765d61d8327deb882cf99', 'demo@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
