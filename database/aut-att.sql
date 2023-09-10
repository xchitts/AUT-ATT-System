-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 08:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aut-att`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendancetbl`
--

CREATE TABLE `attendancetbl` (
  `id` int(10) NOT NULL,
  `studentID` int(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `yearlevel` int(10) NOT NULL,
  `course` varchar(50) NOT NULL,
  `event` varchar(250) NOT NULL,
  `timeinAM` text NOT NULL,
  `timeoutAM` text NOT NULL,
  `timeinPM` text NOT NULL,
  `timeoutPM` text NOT NULL,
  `date` date NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `eventname` varchar(250) NOT NULL,
  `eventdate` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventname`, `eventdate`, `status`, `createdAt`, `IS_EXIST`) VALUES
(53, 'University Week Day 1', '2022-11-03', 0, '2022-11-04 04:40:37', 1),
(54, 'University Week Day 2', '2022-11-04', 0, '2022-11-03 12:20:47', 1),
(55, 'University Week Day 3', '2022-11-05', 1, '2022-11-04 15:18:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentlist`
--

CREATE TABLE `studentlist` (
  `id` int(11) NOT NULL,
  `studentno` int(15) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `yearlevel` enum('1','2','3','4') NOT NULL,
  `course` varchar(50) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlist`
--

INSERT INTO `studentlist` (`id`, `studentno`, `fullname`, `yearlevel`, `course`, `contactno`, `status`, `IS_EXIST`, `createdAt`) VALUES
(15, 2022001, 'Jimz Humphrey Paciente', '4', 'BSBA-MM', '09091267598', 1, 1, '2022-10-15 13:09:00'),
(16, 2022002, 'Christian Casumpang', '4', 'BSBA-MM', '09876543211', 1, 1, '2022-10-15 13:08:59'),
(17, 2022003, 'Trisha Nicole Santos', '4', 'BSBA-MM', '09123567564', 1, 1, '2022-11-03 12:22:09'),
(18, 2022004, 'Geraldine Bautista', '4', 'BSBA-MM', '09765432897', 1, 1, '2022-10-15 13:08:59'),
(19, 2022005, 'Shalman Mamiscal', '4', 'BSBA-MM', '09543217654', 1, 1, '2022-10-15 13:08:59'),
(20, 2022006, 'Justine Basa', '4', 'BSBA-MM', '09220984567', 1, 1, '2022-10-15 13:08:59'),
(21, 2022007, 'Mat Laurence Buenaflor', '3', 'BSBA-MM', '09127896512', 1, 1, '2022-10-15 13:08:58'),
(22, 2022008, 'Novie Angela Parcellano', '3', 'BSBA-MM', '09361903789', 1, 1, '2022-10-15 13:08:58'),
(23, 2022009, 'Ella Jane Lumawag ', '3', 'BSBA-MM', '09630127456', 1, 1, '2022-10-15 13:08:58'),
(24, 2022010, 'Alliah Pendatun', '3', 'BSBA-MM', '09261695092', 1, 1, '2022-10-15 13:08:58'),
(25, 2022011, 'Ireka Shane Rosal', '2', 'BSBA-MM', '09702543789', 1, 1, '2022-10-15 13:08:58'),
(26, 2022012, 'Jovelyn Familar', '2', 'BSBA-MM', '09670125389', 1, 1, '2022-10-15 13:08:58'),
(27, 2022013, 'Prince John Tabuada', '2', 'BSBA-MM', '09756672345', 1, 1, '2022-10-15 13:08:57'),
(28, 2022014, 'Michael Balofinos', '2', 'BSBA-MM', '09105238654', 1, 1, '2022-10-15 13:08:57'),
(29, 2022015, 'Abeline Mirafuentes', '2', 'BSBA-MM', '09093451900', 1, 1, '2022-10-15 13:08:57'),
(30, 2022016, 'Rechel Servañes', '1', 'BSBA-MM', '09367512908', 1, 1, '2022-10-15 13:08:57'),
(31, 2022017, 'Nelsie Marie Noserale', '1', 'BSBA-MM', '09356123890', 1, 1, '2022-10-15 13:08:56'),
(32, 2022018, 'Diomar Bonalos', '1', 'BSBA-MM', '09201502150', 1, 1, '2022-11-04 03:51:34'),
(33, 2022019, 'Dwini Anne Rhudy', '1', 'BSBA-MM', '09092347654', 1, 1, '2022-11-04 03:51:30'),
(34, 2022020, 'Robert John Lavente', '1', 'BSBA-MM', '09012765987', 1, 1, '2022-10-15 13:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(19) NOT NULL,
  `user` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `yearlevel` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `remember` tinyint(1) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `yearlevel`, `password`, `remember`, `IS_EXIST`, `createdAt`) VALUES
(1, 'SuperAdmin', 'Admin@gmail.com', 0, '$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS', 0, 1, '2022-11-04 04:45:51'),
(2, '1st Year', '1styear@gmail.com', 1, '$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS', 0, 1, '2022-10-17 12:55:56'),
(3, '2nd Year', '2ndyear@gmail.com', 2, '$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS', 0, 1, '2022-10-14 12:41:50'),
(4, '3rd Year', '3rdyear@gmail.com', 3, '$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS', 0, 1, '2022-10-14 12:37:16'),
(5, '4th Year', '4thyear@gmail.com', 4, '$2y$10$k55p3e5mqsiHuxw.K8GzXO.dq.Ky5iNcBD3f1PZuv9AFi2ey1uUeS', 0, 1, '2022-10-14 12:37:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendancetbl`
--
ALTER TABLE `attendancetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentlist`
--
ALTER TABLE `studentlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendancetbl`
--
ALTER TABLE `attendancetbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `studentlist`
--
ALTER TABLE `studentlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
