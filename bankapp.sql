-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 08:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions_history`
--

CREATE TABLE `transactions_history` (
  `transaction_id` int(11) NOT NULL,
  `amount` int(15) NOT NULL,
  `opening_balance` int(15) NOT NULL,
  `closing_balance` int(15) NOT NULL,
  `originator_account_id` int(15) NOT NULL,
  `beneficiary_account_id` int(15) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions_history`
--

INSERT INTO `transactions_history` (`transaction_id`, `amount`, `opening_balance`, `closing_balance`, `originator_account_id`, `beneficiary_account_id`, `date_created`) VALUES
(1, 30, 10000000, 99999970, 1, 0, '2019-12-05 09:45:45'),
(2, 50, 99999970, 99999920, 3, 0, '2019-12-05 10:05:08'),
(3, 20, 99999920, 99999900, 3, 3, '2019-12-05 10:05:29'),
(5, 50, 99999900, 0, 3, 1, '2019-12-05 10:38:52'),
(9, 50, 99999850, 0, 4, 1, '2019-12-05 10:51:59'),
(10, 50, 99999850, 0, 4, 1, '2019-12-05 10:53:07'),
(11, 50, 99999850, 0, 4, 1, '2019-12-05 10:55:22'),
(12, 50, 99999850, 99999800, 4, 1, '2019-12-05 10:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `account_id` int(15) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `balance` int(225) NOT NULL DEFAULT '1000000',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`account_id`, `firstname`, `lastname`, `phone`, `address`, `gender`, `balance`, `date_created`) VALUES
(1, '0', '0', '2147483647', '0', 'Male', 10000000, '0000-00-00 00:00:00'),
(3, '0', '0', '080123456789', '0', 'Male', 10000000, '0000-00-00 00:00:00'),
(4, '0', '0', '0801231212', '0', 'Male', 10000000, '2019-12-05 08:20:23'),
(6, 'Angela', 'Kaff', '123123123', '12, Aba', 'Female', 500000, '2019-12-05 11:42:06'),
(12, 'Olawale', 'Isoga', '', '12, Alaba', '', 0, '2019-12-05 16:00:16'),
(13, 'Usman', 'Mohammed', '', '12, Yaba', '', 0, '2019-12-05 16:04:11'),
(15, 'Favour', 'Mohammed', '', '12, Yaba', '', 0, '2019-12-05 16:09:11'),
(20, 'Favour', 'Mohammed', '', '12, Yaba', '', 0, '2019-12-05 16:49:57'),
(21, 'Bright', 'Alle', '44444444', '23, Ikeja', 'Female', 0, '2019-12-05 16:53:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions_history`
--
ALTER TABLE `transactions_history`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `beneficiary_account_id` (`beneficiary_account_id`),
  ADD KEY `originator_account_id` (`originator_account_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions_history`
--
ALTER TABLE `transactions_history`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `account_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions_history`
--
ALTER TABLE `transactions_history`
  ADD CONSTRAINT `originator_account_fk` FOREIGN KEY (`originator_account_id`) REFERENCES `users` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
