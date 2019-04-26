-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 26, 2019 at 08:32 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `weatherview`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite_city`
--

CREATE TABLE `favourite_city` (
  `id` int(11) NOT NULL,
  `city` varchar(2000) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite_city`
--

INSERT INTO `favourite_city` (`id`, `city`, `userid`) VALUES
(1, 'Toronto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Kenneth Mendoza', 'ken24_007@hotmail.com', '123'),
(2, 'Ken', 'kenneth.b.mendoza@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourite_city`
--
ALTER TABLE `favourite_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_favourite` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourite_city`
--
ALTER TABLE `favourite_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourite_city`
--
ALTER TABLE `favourite_city`
  ADD CONSTRAINT `fk_favourite` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
