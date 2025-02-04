-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 04:15 PM
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
-- Database: `db_pwl05`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(16) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `pict` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `password`, `name`, `role`, `pict`) VALUES
(1, '0000.0001', '$2y$10$8L2ujr2bvZTAb9LgqFCgMeIr82BRCfNNfNC8FqhUaTRht/cLF.fuy', 'administrator1', 'admin', 'pict01.png'),
(2, '0000.0002', '$2y$10$Re81GCq89DCz6DVNAXbxZevRbTqpqp0Vpyja7xMtJh9FTUITM58uu', 'administrator2', 'admin', 'adminioVb0DWdSY7e3.jpg'),
(79, 'A12.2022.06867', '$2y$10$Rwe7VmFb60zqWncr1r1qZOJ.BSqJC3oCksX8GkwcBRs5Nhs9woQb2', 'Ridho Farizqi', 'mahasiswa', 'RidhoFWeNIg5TC3oUG.png'),
(84, 'A12.2022.00000', '$2y$10$8d5xAAeHlPFIvdgVUQBEq.5g8zHomImj7BpgYLHnIsDmeqX9zgJ3.', 'Rossa', 'Mahasiswa', 'RossaLd7ua4zHWOF4.jpg'),
(85, 'A12.2022.00001', '$2y$10$YDFdq6TbyuDUQaVzMovQn.xQUpxjDyduzAZ6z4vDNlE9LJd19RwAe', 'Abraham', 'mahasiswa', 'AbrahaktFZRs8W1Wdp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
