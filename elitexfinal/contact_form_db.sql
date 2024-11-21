-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 04:51 PM
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
-- Database: `contact_form_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'lapz', 'admin@gmail.com', '11223344', 'hello'),
(2, 'lapz1', 'admin1@gmail.com', '778800', 'Hi'),
(3, 'lapz1', 'admin1@gmail.com', '778800', 'Hi'),
(4, 'lapz2', 'admin2@gmail.com', '9900', 'Hi hi'),
(5, 'Pabasara', 'admin5@gmail.com', '9988', 'Hi hi Hi'),
(6, 'dyhd', 'admin@gmail.com', '89897975957', 'helllo');

-- --------------------------------------------------------

--
-- Table structure for table `sign_in`
--

CREATE TABLE `sign_in` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic_number` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nic_number`, `password`) VALUES
(5, 'gradeone', 'lapz1@gmail.com', '8899', '0'),
(6, 'gradeone', 'Lapz@gmail.com', '1122', '0'),
(7, 'gradeone', 'Lapz@gmail.com', '3366', '$2y$10$3xzKdObst625Q2rkP6i.seTAzMnW6sDWqTyU1mwQ6Nw6Bs5mQL/sm'),
(8, 'gradeone', 'Lapz@gmail.com', '3344', '5577'),
(9, 'gradeone', 'Lapz@gmail.com', '3344', '8888'),
(10, 'lapz', 'Lapz@gmail.com', '3366', '559900'),
(11, 'Pabasara', 'pabasara@gmail.com', '445566', '22339900'),
(12, 'lapz', 'Lapz@gmail.com', '1122', '$2y$10$WjE/gL11/FV9F8z4HGM2HOvIVZRizuW6KmBQUVnW6cmhPra8v8rCy'),
(13, 'lapz', 'Lapz@gmail.com', '2233', '$2y$10$tjLkmlYRahW.Z/oYeVaqquJ9k441DQKlZWPj/O7B0CFyIdqqm/nYS'),
(14, 'lapz', 'Lapz@gmail.com', '7766', '$2y$10$wZpVGcvOY/1LucNTag9CFe0ctfeF2TdBzBPnxXa6Zetv7RkpdOzsG'),
(15, 'lapz', 'Lapz@gmail.com', '6677', '0099'),
(16, 'gradeone', 'Lapz@gmail.com', '445566', '0000'),
(17, 'gradeone', 'Lapz@gmail.com', '5566', '1111'),
(18, 'Lapz', 'Lapz@gmail.com', '8899', '2222'),
(19, 'num1', 'num1@gmail.com', '334455', '8899'),
(20, 'gradeone', 'gradeone@gmail.com', '5566', '3344'),
(21, 'code', 'code2@gmail.com', '3344', '2244'),
(22, 'gradeone', 'gradeone@gmail.com', '2233', '1111'),
(23, 'ddd', 'ddd@gmal.com', '1234', '4321'),
(24, 'Lapz', 'Lapz@gmail.com', '3456', '0099'),
(25, 'yyy', 'yyy@gmail.com', '7766', '3344'),
(26, 'hhh', 'hhh@gmai.com', '4455', '7788'),
(27, 'hhh', 'hhh@gmai.com', '4455', '6677'),
(28, 'hhh', 'hhh@gmai.com', '4455', '5566'),
(29, 'ttt', 'ttt@gmail.com', '2244', '8899'),
(30, 'www', 'www@gmail.com', '4455', '2211'),
(31, 'eee', 'eee@gmail.com', '334455', '3355'),
(32, 'tttt', 'ttt@gmail.com', '6655', '3344'),
(33, 'www', 'www@gmail.com', '224455', '1122'),
(34, 'www', 'www@gmail.com', '3355', '2244'),
(35, 'wwww', 'www@gmail.com', '3344', '$2y$10$whwyhJ1ESrY/nawYBG5v1usiVHG5He0Pcbxg9e9b6yV7BzuSAcwl.'),
(36, 'ck', 'ck@gmail.com', '3344', '1122'),
(37, 'rrr', 'rrr@gmail.com', '4455', '9988'),
(38, 'rrrr', 'rrrr@gmail.com', '334455', '445566'),
(39, 'uuu', 'uuu@gmail.com', '3344', '6677'),
(40, 'jk', 'jk@gmail.com', '5566', '3344'),
(41, 'ck', 'ck@gmail.com', '4455', '2244'),
(42, 'lapz', 'Lapz@gmail.com', '3344', '9900'),
(43, 'ghi', 'ghi@gmail.com', '8899', '3344'),
(44, 'eee', 'eee@gmail.com', '3344', '8899'),
(45, 'tyr', 'tyr@gmail.com', '4455', '3333'),
(46, 'iop', 'iop@gmail.com', '5566', '9988'),
(47, 'qwe', 'qwe@gmail.com', '4433', '5555'),
(48, 'yui', 'yui@gmail.com', '4455', '3355'),
(49, 'wwe', 'wwe@gmail.com', '3355', '7788'),
(50, 'seyler', 'seyler@gmail.com', '4455', '8899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_in`
--
ALTER TABLE `sign_in`
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
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sign_in`
--
ALTER TABLE `sign_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
