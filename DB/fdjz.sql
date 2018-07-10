-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2018 at 03:44 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fdjz`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

DROP TABLE IF EXISTS `bank_accounts`;
CREATE TABLE IF NOT EXISTS `bank_accounts` (
  `UserID` int(11) NOT NULL,
  `AccountNumber` int(11) NOT NULL AUTO_INCREMENT,
  `AccountTypeID` int(11) NOT NULL,
  `balance` float NOT NULL,
  `DateAdded` datetime NOT NULL,
  PRIMARY KEY (`AccountNumber`),
  KEY `FK1` (`UserID`),
  KEY `FK2` (`AccountTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=1247 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`UserID`, `AccountNumber`, `AccountTypeID`, `balance`, `DateAdded`) VALUES
(1001, 1234, 1, 12.56, '0000-00-00 00:00:00'),
(1002, 1235, 1, 200, '0000-00-00 00:00:00'),
(1002, 1237, 2, 10000, '0000-00-00 00:00:00'),
(1001, 1238, 2, 500, '0000-00-00 00:00:00'),
(1002, 1239, 2, 15000, '2017-12-27 22:48:24'),
(1002, 1240, 2, -1500, '2017-12-28 00:41:19'),
(1002, 1241, 2, -8888, '2017-12-29 17:25:13'),
(1001, 1242, 2, -123, '2017-12-29 19:20:24'),
(1003, 1243, 2, -1500, '2017-12-29 20:18:40'),
(1008, 1244, 1, 212, '0000-00-00 00:00:00'),
(1008, 1245, 1, 0, '2017-12-29 23:50:22'),
(1012, 1246, 1, 0, '2017-12-30 03:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts_types`
--

DROP TABLE IF EXISTS `bank_accounts_types`;
CREATE TABLE IF NOT EXISTS `bank_accounts_types` (
  `TypeID` int(11) NOT NULL AUTO_INCREMENT,
  `AccountType` varchar(11) NOT NULL,
  PRIMARY KEY (`TypeID`,`AccountType`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bank_accounts_types`
--

INSERT INTO `bank_accounts_types` (`TypeID`, `AccountType`) VALUES
(1, 'Current'),
(2, 'Loan');

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

DROP TABLE IF EXISTS `customer_account`;
CREATE TABLE IF NOT EXISTS `customer_account` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FNAME` varchar(50) DEFAULT NULL,
  `LNAME` varchar(50) DEFAULT NULL,
  `PersonalID` varchar(14) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `MobileNumber` varchar(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `WorkerID` int(11) NOT NULL,
  `DateAdded` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK8` (`WorkerID`)
) ENGINE=InnoDB AUTO_INCREMENT=1013 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`ID`, `FNAME`, `LNAME`, `PersonalID`, `Address`, `MobileNumber`, `Email`, `DateOfBirth`, `WorkerID`, `DateAdded`) VALUES
(1001, 'John', 'Mounir', '123456', 'Madinet Nasr', '122222222', 'John1500464@miuegypt.edu.eg', '0000-00-00', 1, '0000-00-00 00:00:00'),
(1002, 'David', 'Adel', '29610230102238', 'Masr el gedida - Atef Barakat', '1220691726', 'David1500330@miuegypt.edu.eg', '1996-10-23', 1, '0000-00-00 00:00:00'),
(1003, 'asdas', 'dsfjk', '32167821', 'askjhfask', '01222222', 'email', NULL, 1, '2017-12-28 00:45:56'),
(1004, 'dsad', 'dbajsh', '27816', 'das', '01222222', 'email', NULL, 4, '2017-12-28 00:48:41'),
(1005, 'fady', 'fady', '232432', 'fady', '23123', 'fady@fady.com', NULL, 4, '2017-12-29 22:27:01'),
(1006, 'fady2', 'fady2', '312312', 'fasgjhgd', '121212', 'jdash@hdskj.com', NULL, 4, '2017-12-29 23:04:00'),
(1007, 'Fady2', 'Fady2', '2312321', 'Fady2', '231232', '\n                    Fady2@Fady2.com', '0000-00-00', 4, '2017-12-29 23:31:42'),
(1008, 'Fady2', 'Fady2', '2312321', 'Fady2', '231232', 'Fady2@Fady2.com', '0000-00-00', 4, '2017-12-29 23:36:40'),
(1010, 'David', 'Adel', '29610230102238', 'Masr El Gedida', '01222222', '\n                    das@das.com', '0000-00-00', 4, '2017-12-30 02:13:38'),
(1011, 'testzeft', 'testzeft', '29610230102238', 'testzeft', '01220691726', 'testzeft@testzeft.com', '2017-12-04', 4, '2017-12-30 03:11:42'),
(1012, 'zeft', 'zeft', '2987492374938', 'zeft', '0122222', 'zeft@zeft.com', '2017-12-20', 4, '2017-12-30 03:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `intrest`
--

DROP TABLE IF EXISTS `intrest`;
CREATE TABLE IF NOT EXISTS `intrest` (
  `AccountNo` int(11) NOT NULL,
  `Intrest` float DEFAULT NULL,
  PRIMARY KEY (`AccountNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intrest`
--

INSERT INTO `intrest` (`AccountNo`, `Intrest`) VALUES
(1234, 12.5);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AccountNo` int(11) NOT NULL,
  `Amount` float DEFAULT NULL,
  `Rate` float DEFAULT NULL,
  `UseOfLoan` varchar(50) DEFAULT NULL,
  `Acceptance` int(1) DEFAULT NULL,
  `DateOfSubmission` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK10` (`AccountNo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`ID`, `AccountNo`, `Amount`, `Rate`, `UseOfLoan`, `Acceptance`, `DateOfSubmission`) VALUES
(1, 1234, 10000, 5, 'howa keda', 1, '20-10-2015'),
(2, 1236, 123, 7.5, 'fsd', 1, '10-11-12'),
(3, 1237, 10000, 10, '3ashan ne5alas el project b 3on elah', 0, 'enaharda'),
(4, 1238, 500, 10, 'fsdfd', 0, NULL),
(5, 1239, 15000, 5, 'sdajkfdn', 1, '2017-12-27 22:48:24'),
(6, 1239, 15000, 5, 'sdajkfdn', 1, '2017-12-27 22:48:24'),
(7, 1240, -1500, 10, 'fsds', 1, '2017-12-28 00:41:19'),
(8, 1241, -8888, 10, 'hdjkas', 1, '2017-12-29 17:25:13'),
(9, 1242, -123, 30, 'fsdf', 1, '2017-12-29 19:20:24'),
(10, 1243, -1500, 5, 'fsd', -1, '2017-12-29 20:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `loanscounter`
--

DROP TABLE IF EXISTS `loanscounter`;
CREATE TABLE IF NOT EXISTS `loanscounter` (
  `TransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `LoanID` int(11) NOT NULL,
  `Amount` float NOT NULL,
  PRIMARY KEY (`TransactionID`),
  KEY `FK22` (`LoanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `PositionId` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK6` (`PositionId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `userID`, `Password`, `PositionId`) VALUES
(1, 1, '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 4, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(3, 5, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(4, 1002, '827ccb0eea8a706c4c34a16891f84e7b', 3),
(5, 50, '202cb962ac59075b964b07152d234b70', 2),
(6, 51, 'd41d8cd98f00b204e9800998ecf8427e', 2),
(7, 52, '202cb962ac59075b964b07152d234b70', 2),
(8, 53, '202cb962ac59075b964b07152d234b70', 2),
(9, 0, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(10, 0, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(11, 56, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(12, 57, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(13, 58, 'c20ad4d76fe97759aa27a0c99bff6710', 2),
(14, 1005, '123', 3),
(15, 59, '202cb962ac59075b964b07152d234b70', 2),
(16, 1006, '827ccb0eea8a706c4c34a16891f84e7b', 3),
(17, 1007, '827ccb0eea8a706c4c34a16891f84e7b', 3),
(27, 1011, '202cb962ac59075b964b07152d234b70', 3),
(28, 60, 'd41d8cd98f00b204e9800998ecf8427e', 2),
(29, 61, 'd41d8cd98f00b204e9800998ecf8427e', 2),
(30, 62, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(32, 1012, '827ccb0eea8a706c4c34a16891f84e7b', 3);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `PositionID` int(11) NOT NULL AUTO_INCREMENT,
  `PostitionName` varchar(40) NOT NULL,
  PRIMARY KEY (`PositionID`,`PostitionName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`PositionID`, `PostitionName`) VALUES
(1, 'Admin'),
(2, 'Worker'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `TransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `FromAccount` int(11) NOT NULL,
  `ToAccount` int(11) NOT NULL,
  `Amount` float DEFAULT NULL,
  `TransactionDate` varchar(50) DEFAULT NULL,
  `WorkerID` int(11) NOT NULL,
  PRIMARY KEY (`TransactionID`),
  KEY `FK9` (`WorkerID`),
  KEY `FK13` (`FromAccount`),
  KEY `FK14` (`ToAccount`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `FromAccount`, `ToAccount`, `Amount`, `TransactionDate`, `WorkerID`) VALUES
(1, 1234, 1234, 12, '7-12-2017', 1),
(10, 1234, 1234, 12, '12-12-2017', 4),
(12, 1235, 1236, 50, '10-12-2017', 4),
(13, 1235, 1238, 123, '1996-12-29', 4),
(14, 1235, 1236, 100, '2017-12-29 21:51:03', 4),
(15, 1235, 1236, 100, '2017-12-29 21:51:32', 4),
(16, 1235, 1236, 100, '2017-12-29 21:52:14', 4),
(17, 1244, 1236, 100, '2017-12-30 01:47:16', 4),
(19, 1235, 1235, 100, '2017-12-30 05:00:43', 4),
(20, 1235, 1235, -100, '2017-12-30 05:05:39', 4),
(21, 1235, 1235, 100, '2017-12-30 05:06:11', 4);

-- --------------------------------------------------------

--
-- Table structure for table `worker_admin_account`
--

DROP TABLE IF EXISTS `worker_admin_account`;
CREATE TABLE IF NOT EXISTS `worker_admin_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `JobRole` varchar(50) DEFAULT NULL,
  `Salary` float DEFAULT NULL,
  `PositionID` int(11) NOT NULL,
  `DateAdded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK11` (`PositionID`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `worker_admin_account`
--

INSERT INTO `worker_admin_account` (`id`, `FName`, `LName`, `Email`, `Address`, `City`, `PhoneNumber`, `JobRole`, `Salary`, `PositionID`, `DateAdded`) VALUES
(1, 'David', 'Adel', 'davidadel95@outlook.com', '6 Atef Barakat', 'Cairo', '1220691726', 'Manager', 123456, 1, '0000-00-00 00:00:00'),
(4, 'Fady', 'Asaad', 'Fady1500464@miuegypt.edu.eg', 'Madinet Nasr', 'Cairo', '01211111111', 'Area Manager', 7500, 2, '2017-12-26 18:41:42'),
(49, 'David', 'Adel', 'David1500330@miuegypt.edu.eg', 'Masr el gedida - Atef Barakat', 'Cairo', '01220691726', 'Bank Director', 12, 2, '2017-12-27 21:56:10'),
(50, 'new', 'new', 'new@new.com', 'new', 'new', '', '', 122.21, 2, '2017-12-29 02:46:58'),
(51, 'new', 'new', 'new@new.com', 'new', 'new', '1', 'Accounts Manager', 0, 2, '2017-12-29 02:54:18'),
(52, 'new', 'new', 'new@new.com', 'new', 'new', '01222222', 'Area Manager', 121.12, 2, '2017-12-29 02:54:41'),
(53, 'new2', 'new2', 'new2@new2.com', 'new2', 'new2', '01222222', 'Area Manager', 1.1, 2, '2017-12-29 02:55:30'),
(54, 'new3', 'new3', 'new3@new3.com', 'new3', 'new3', '01222222', 'Customer Service', 121.12, 2, '2017-12-29 20:25:59'),
(55, 'new3', 'new3', 'new3@new3.com', 'new3', 'new3', '01222222', 'Customer Service', 121.12, 2, '2017-12-29 20:26:21'),
(56, 'new3', 'new3', 'new3@new3.com', 'new3', 'new3', '01222222', 'Customer Service', 121.12, 2, '2017-12-29 20:27:43'),
(57, 'new4', 'new4', 'new4@new4.com', 'new4', 'new4', '012', 'Area Manager', 1222, 2, '2017-12-29 20:28:29'),
(58, 'Zeyad', 'Emad', 'Zeyad@miu.com', 'hena', 'hena bardo', '01222', 'Customer Service', 1222220, 2, '2017-12-29 20:29:18'),
(59, 'new5', 'new5', 'new5@new5.com', 'new5', 'new5', '01222222', 'Area Manager', 122, 2, '2017-12-29 22:43:57'),
(60, '', '', '', '', '', '', 'Accounts Manager', 0, 2, '2017-12-30 02:28:31'),
(61, '3', '', '', '', '', '', 'Accounts Manager', 0, 2, '2017-12-30 03:00:04'),
(62, 'new5', 'new5', 'new5@new5.com', 'new5', 'new5', '01222222', 'Teller', 122, 2, '2017-12-30 03:05:11');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `FK15` FOREIGN KEY (`UserID`) REFERENCES `customer_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK16` FOREIGN KEY (`AccountTypeID`) REFERENCES `bank_accounts_types` (`TypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD CONSTRAINT `FK8` FOREIGN KEY (`WorkerID`) REFERENCES `worker_admin_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `intrest`
--
ALTER TABLE `intrest`
  ADD CONSTRAINT `FK12` FOREIGN KEY (`AccountNo`) REFERENCES `bank_accounts` (`AccountNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `FK10` FOREIGN KEY (`AccountNo`) REFERENCES `bank_accounts` (`AccountNumber`);

--
-- Constraints for table `loanscounter`
--
ALTER TABLE `loanscounter`
  ADD CONSTRAINT `FK22` FOREIGN KEY (`LoanID`) REFERENCES `loans` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK17` FOREIGN KEY (`PositionId`) REFERENCES `position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK13` FOREIGN KEY (`FromAccount`) REFERENCES `bank_accounts` (`AccountNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK14` FOREIGN KEY (`ToAccount`) REFERENCES `bank_accounts` (`AccountNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK9` FOREIGN KEY (`WorkerID`) REFERENCES `worker_admin_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_admin_account`
--
ALTER TABLE `worker_admin_account`
  ADD CONSTRAINT `FK11` FOREIGN KEY (`PositionID`) REFERENCES `position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
