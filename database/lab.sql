-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 03:19 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `assist`
--

CREATE TABLE `assist` (
  `assistid` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL DEFAULT '12345'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assist`
--

INSERT INTO `assist` (`assistid`, `name`, `password`) VALUES
(1, 'assist1', '12345'),
(2, 'assist2', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `consumable`
--

CREATE TABLE `consumable` (
  `srno` int(11) NOT NULL,
  `labid` int(11) NOT NULL,
  `condemned` enum('y','n') NOT NULL DEFAULT 'n',
  `name` varchar(30) DEFAULT NULL,
  `indent_no` varchar(10) DEFAULT NULL,
  `book_no` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `supplier_name` varchar(30) DEFAULT NULL,
  `store_indent_no` varchar(20) DEFAULT NULL,
  `bill_no` int(11) DEFAULT NULL,
  `bill_no_date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `signed_by` varchar(30) DEFAULT NULL,
  `remark` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `srno` int(11) NOT NULL,
  `labid` int(11) NOT NULL,
  `condemned` enum('y','n') NOT NULL DEFAULT 'n',
  `name` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `colour` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `labid` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`labid`, `name`, `capacity`, `pid`) VALUES
(1, 'Fundamentals', 20, 1),
(2, 'Networks', 20, 2),
(3, 'Computer center', 30, 3),
(4, 'Image processing', 25, 4),
(5, 'Linux', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `labid` int(11) DEFAULT NULL,
  `assistid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`labid`, `assistid`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `non_consumable`
--

CREATE TABLE `non_consumable` (
  `srno` int(11) NOT NULL,
  `labid` int(11) NOT NULL,
  `condemned` enum('y','n') NOT NULL DEFAULT 'n',
  `assetid` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `indent_no` varchar(10) DEFAULT NULL,
  `book_no` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `supplier_name` varchar(30) DEFAULT NULL,
  `store_indent_no` varchar(20) DEFAULT NULL,
  `bill_no` int(11) DEFAULT NULL,
  `bill_no_date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `signed_by` varchar(30) DEFAULT NULL,
  `remark` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `pid` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL DEFAULT '12345'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`pid`, `name`, `password`) VALUES
(1, 'prof1', '12345'),
(2, 'prof2', '12345'),
(3, 'prof3', '12345'),
(4, 'prof4', '12345'),
(5, 'prof5', '12345'),
(6, NULL, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionid` int(11) NOT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `type` enum('P','T','PT') DEFAULT NULL,
  `day` enum('2','3','4','5','6') DEFAULT NULL,
  `start` time DEFAULT NULL,
  `finish` time DEFAULT NULL,
  `labid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sessionid`, `subject`, `type`, `day`, `start`, `finish`, `labid`, `pid`) VALUES
(1, 'PPL', 'P', '2', '09:00:00', '10:00:00', 1, 1),
(2, 'CHD', 'P', '2', '10:00:00', '11:00:00', 1, 2),
(3, 'OS', 'PT', '2', '11:00:00', '13:00:00', 1, 3),
(4, 'AI', 'P', '2', '15:00:00', '17:00:00', 1, 5),
(5, NULL, NULL, '2', '14:00:00', '15:00:00', 1, 6),
(6, NULL, NULL, '2', '09:00:00', '10:00:00', 2, 6),
(7, NULL, NULL, '2', '10:00:00', '11:00:00', 2, 6),
(8, 'PPL', 'P', '2', '11:00:00', '13:00:00', 2, 2),
(9, 'OS', 'PT', '2', '14:00:00', '17:00:00', 2, 3),
(10, NULL, NULL, '3', '09:00:00', '10:00:00', 2, 6),
(11, 'PPL', 'P', '3', '10:00:00', '12:00:00', 2, 2),
(12, 'AM III', 'T', '3', '12:00:00', '13:00:00', 2, 3),
(13, 'OS', 'PT', '3', '14:00:00', '17:00:00', 2, 4),
(14, NULL, NULL, '4', '09:00:00', '10:00:00', 2, 6),
(15, NULL, NULL, '4', '10:00:00', '11:00:00', 2, 6),
(16, NULL, NULL, '4', '11:00:00', '12:00:00', 2, 6),
(17, NULL, NULL, '4', '12:00:00', '13:00:00', 2, 6),
(18, 'OS', 'PT', '4', '14:00:00', '17:00:00', 2, 3),
(19, NULL, NULL, '5', '09:00:00', '10:00:00', 2, 6),
(20, NULL, NULL, '5', '10:00:00', '11:00:00', 2, 6),
(21, 'PPL', 'P', '5', '11:00:00', '13:00:00', 2, 2),
(22, 'OS', 'PT', '5', '14:00:00', '17:00:00', 2, 3),
(23, NULL, NULL, '6', '09:00:00', '10:00:00', 2, 6),
(24, NULL, NULL, '6', '10:00:00', '11:00:00', 2, 6),
(25, 'PPL', 'P', '6', '11:00:00', '13:00:00', 2, 2),
(26, NULL, NULL, '6', '14:00:00', '17:00:00', 2, 6),
(30, NULL, NULL, '4', '14:00:00', '17:00:00', 3, 6),
(31, 'PPL', 'PT', '4', '09:00:00', '13:00:00', 3, 3),
(32, 'DBMS', 'PT', '3', '09:00:00', '13:00:00', 3, 3),
(33, NULL, NULL, '3', '14:00:00', '17:00:00', 3, 6),
(34, 'PPL', 'PT', '3', '09:00:00', '13:00:00', 4, 4),
(35, NULL, NULL, '3', '14:00:00', '17:00:00', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `taken`
--

CREATE TABLE `taken` (
  `sessionid` int(11) DEFAULT NULL,
  `datetaken` date DEFAULT NULL,
  `remark` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user`
-- (See below for the actual view)
--
CREATE TABLE `user` (
`name` varchar(30)
,`password` varchar(30)
,`labid` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `user`
--
DROP TABLE IF EXISTS `user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user`  AS  select `p`.`name` AS `name`,`p`.`password` AS `password`,`l`.`labid` AS `labid` from (`professor` `p` join `lab` `l` on((`p`.`pid` = `l`.`pid`))) union select `a`.`name` AS `name`,`a`.`password` AS `password`,`m`.`labid` AS `labid` from (`assist` `a` join `manage` `m` on((`a`.`assistid` = `m`.`assistid`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assist`
--
ALTER TABLE `assist`
  ADD PRIMARY KEY (`assistid`);

--
-- Indexes for table `consumable`
--
ALTER TABLE `consumable`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `lab2` (`labid`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `lab1` (`labid`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`labid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD KEY `labid` (`labid`),
  ADD KEY `manage_ibfk_2` (`assistid`);

--
-- Indexes for table `non_consumable`
--
ALTER TABLE `non_consumable`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `assetid` (`assetid`),
  ADD KEY `lab3` (`labid`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionid`),
  ADD KEY `labid` (`labid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `taken`
--
ALTER TABLE `taken`
  ADD KEY `sessionid` (`sessionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumable`
--
ALTER TABLE `consumable`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `non_consumable`
--
ALTER TABLE `non_consumable`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `consumable`
--
ALTER TABLE `consumable`
  ADD CONSTRAINT `lab2` FOREIGN KEY (`labid`) REFERENCES `lab` (`labid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `lab1` FOREIGN KEY (`labid`) REFERENCES `lab` (`labid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `professor` (`pid`);

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`labid`) REFERENCES `lab` (`labid`),
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`assistid`) REFERENCES `assist` (`assistid`);

--
-- Constraints for table `non_consumable`
--
ALTER TABLE `non_consumable`
  ADD CONSTRAINT `lab3` FOREIGN KEY (`labid`) REFERENCES `lab` (`labid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`labid`) REFERENCES `lab` (`labid`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `professor` (`pid`);

--
-- Constraints for table `taken`
--
ALTER TABLE `taken`
  ADD CONSTRAINT `taken_ibfk_1` FOREIGN KEY (`sessionid`) REFERENCES `session` (`sessionid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
