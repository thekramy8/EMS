-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 03:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawfirm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_list`
--

CREATE TABLE `tbl_client_list` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `first_email` varchar(100) NOT NULL,
  `second_email` varchar(100) NOT NULL,
  `first_contact` varchar(100) NOT NULL,
  `second_contact` varchar(100) NOT NULL,
  `first_address` varchar(200) NOT NULL,
  `second_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_list`
--

INSERT INTO `tbl_client_list` (`id`, `lastname`, `firstname`, `middlename`, `gender`, `first_email`, `second_email`, `first_contact`, `second_contact`, `first_address`, `second_address`) VALUES
(78, 'Dela Vega', 'Joaquin', 'Alcaraz', 'Female', 'delavega@gmail.com', 'joaquin@gmail.com', '09876543211', '09876543212', 'Purok 1Cupang Muntinlupa City', 'n/A'),
(79, 'Mendoza', 'Sharmaine', 'Reyes', 'Female', 'reyes@yahool.com', 'reyes1@yahool.com', '09876543211', '09876543212', 'Alabang Mendoza Compound Ilaya ST. ', 'Alabang Mendoza Compound Ilaya ST. '),
(81, 'Jimenez', 'Cardo', 'Amor', 'Female', 'Jimenez@yahoo.com', 'Amor@yahoo.com', '09988765432', '09988765431', 'Bayanan Muntinlupa City', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_list`
--

CREATE TABLE `tbl_user_list` (
  `id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(10000) NOT NULL,
  `user_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_list`
--

INSERT INTO `tbl_user_list` (`id`, `user_fullname`, `user_email`, `user_password`, `user_role`) VALUES
(1, 'Juan Dela Cruz', 'juan@yahoo.com', '$2y$10$hWKv4W5p4k3DIOey0QQCMeHC1IPTtEmI8aYnTfa1iLOo3N9k05V7i', 'Chief Lawyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_client_list`
--
ALTER TABLE `tbl_client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_list`
--
ALTER TABLE `tbl_user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_client_list`
--
ALTER TABLE `tbl_client_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_user_list`
--
ALTER TABLE `tbl_user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
