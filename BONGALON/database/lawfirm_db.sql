-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 06:00 AM
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
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `function` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(78, 'Dela Veg', 'Joaqui', 'Alcaraz', '0', 'delavega@gmail.com', 'joaquin@gmail.com', '09876543212', '09876543212', 'Purok 1Cupang Muntinlupa City', 'n/A'),
(79, 'Mendoza', 'Sharmai', 'Reyes', 'Male', 'reyes@yahool.com', 'reyes1@yahool.com', '09876543211', '09876543212', 'Alabang Mendoza Compound Ilaya ST.', 'Alabang Mendoza Compound Ilaya ST. '),
(81, 'Jimenes', 'Cardo', 'Alcaraz', 'Male', 'Jimenez@yahoo.com', '', '09988765431', '09876543212', 'Bayanan Muntinlupa City', 'Sample'),
(82, 'Jeromes', 'San Rizals', 'dejesus', 'Female', 'dejesus@gmail.com', 'dejesus1@gmail.com', '09999999', '09988765432', 'Cupang Muntinlupa', 'n/1'),
(85, 'Nocillado', 'Prince Cyrus', 'Ronda', 'Male', 'prince@yahoo.com', '', '099999999', '', 'Purok 1 70 Garcip Coumpund Muntinlupa', ''),
(89, 'Coco', 'Martin', 'Reyes', 'Male', 's@gmail.com', '', '09999', '09999', 'Purok 1 Cupang', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_list`
--

CREATE TABLE `tbl_user_list` (
  `id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(10000) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `user_access` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_list`
--

INSERT INTO `tbl_user_list` (`id`, `user_fullname`, `user_email`, `user_password`, `user_role`, `user_access`) VALUES
(44, 'Jacinto  Jerome', 'jerome@gmail.com', '$2y$10$M1.KXV.GssxgJ8ncQCnFCedET0hINVCC3jdK.nZjvx6qgVycOaFOK', 'Chief Lawyer', 'Create Read Update Delete '),
(45, 'Nicolas John  Sajot', 'nic@yahoo.com', '$2y$10$l6/G3H4ycw/E8LFGgFxOR.5NVXPc6zxsXSwKgeByP4WwOtl0CjlZK', 'Chief Lawyer', 'Create Read Update Delete '),
(46, 'John  Nicolas', 'sample1@gmail.com', '$2y$10$MwfAktKoppDc/ajgEOU0q.0a2y2N.c1Xom2tLvh.tLtW2LsLiGsu.', 'Associate Lawyer', 'Create Read Update'),
(47, 'admin  admin', 'admin@admin.com', '$2y$10$tyfbsWXvOwvYrLI7lqCDRuIC.c2e52t5/o3NAhT5uZppJ7rDcBUoy', 'Chief Lawyer', 'Create Read Update Delete ');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_user_list`
--
ALTER TABLE `tbl_user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
