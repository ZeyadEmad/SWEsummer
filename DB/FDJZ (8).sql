-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2017 at 07:34 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FDJZ`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `UserID` int(11) NOT NULL,
  `AccountNumber` int(11) NOT NULL,
  `AccountTypeID` int(11) NOT NULL,
  `balance` float NOT NULL,
  `DateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`UserID`, `AccountNumber`, `AccountTypeID`, `balance`, `DateAdded`) VALUES
(1001, 1234, 1, 12.56, '0000-00-00 00:00:00'),
(1002, 1235, 1, 500, '0000-00-00 00:00:00'),
(1002, 1236, 2, 5, '0000-00-00 00:00:00'),
(1002, 1237, 2, 10000, '0000-00-00 00:00:00'),
(1001, 1238, 2, 500, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts_types`
--

CREATE TABLE `bank_accounts_types` (
  `TypeID` int(11) NOT NULL,
  `AccountType` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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

CREATE TABLE `customer_account` (
  `ID` int(11) NOT NULL,
  `FNAME` varchar(50) DEFAULT NULL,
  `LNAME` varchar(50) DEFAULT NULL,
  `PersonalID` varchar(14) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `MobileNumber` varchar(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Date` varchar(200) DEFAULT NULL,
  `WorkerID` int(11) NOT NULL,
  `DateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`ID`, `FNAME`, `LNAME`, `PersonalID`, `Address`, `MobileNumber`, `Email`, `Date`, `WorkerID`, `DateAdded`) VALUES
(1001, 'John', 'Mounir', '123456', 'Madinet Nasr', '122222222', 'John1500464@miuegypt.edu.eg', '20', 1, '0000-00-00 00:00:00'),
(1002, 'David', 'Adel', '29610230102238', 'Masr el gedida - Atef Barakat', '01220691726', 'David1500330@miuegypt.edu.eg', '23-12-2017', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `intrest`
--

CREATE TABLE `intrest` (
  `AccountNo` int(11) NOT NULL,
  `Intrest` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intrest`
--

INSERT INTO `intrest` (`AccountNo`, `Intrest`) VALUES
(1234, 12.5);

-- --------------------------------------------------------

--
-- Table structure for table `Loans`
--

CREATE TABLE `Loans` (
  `ID` int(11) NOT NULL,
  `Counter` int(30) NOT NULL,
  `AccountNo` int(11) NOT NULL,
  `Amount` float DEFAULT NULL,
  `Rate` float DEFAULT NULL,
  `UseOfLoan` varchar(50) DEFAULT NULL,
  `Acceptance` int(1) DEFAULT NULL,
  `DateOfSubmission` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Loans`
--

INSERT INTO `Loans` (`ID`, `Counter`, `AccountNo`, `Amount`, `Rate`, `UseOfLoan`, `Acceptance`, `DateOfSubmission`) VALUES
(1, 0, 1234, 10000, 5, 'howa keda', 1, '20-10-2015'),
(2, 0, 1236, 123, 7.5, 'fsd', 1, '10-11-12'),
(3, 0, 1237, 10000, 10, '3ashan ne5alas el project b 3on elah', 0, 'enaharda'),
(4, 3, 1238, 500, 10, 'fsdfd', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `LoansCounter`
--

CREATE TABLE `LoansCounter` (
  `LoanID` int(11) NOT NULL,
  `LoanNumber` int(11) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `LOGIN`
--

CREATE TABLE `LOGIN` (
  `userID` int(11) NOT NULL,
  `Password` varchar(40) DEFAULT NULL,
  `PositionId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LOGIN`
--

INSERT INTO `LOGIN` (`userID`, `Password`, `PositionId`) VALUES
(1, '12345', 1),
(4, '12345', 2),
(1002, '12345', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Position`
--

CREATE TABLE `Position` (
  `PositionID` int(11) NOT NULL,
  `PostitionName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Position`
--

INSERT INTO `Position` (`PositionID`, `PostitionName`) VALUES
(1, 'Admin'),
(2, 'Worker'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `TRANSACTIONS`
--

CREATE TABLE `TRANSACTIONS` (
  `TransactionID` int(11) NOT NULL,
  `FromAccount` int(11) NOT NULL,
  `ToAccount` int(11) NOT NULL,
  `Amount` float DEFAULT NULL,
  `TransactionDate` varchar(50) DEFAULT NULL,
  `WorkerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TRANSACTIONS`
--

INSERT INTO `TRANSACTIONS` (`TransactionID`, `FromAccount`, `ToAccount`, `Amount`, `TransactionDate`, `WorkerID`) VALUES
(1, 1234, 1234, 12, '7-12-2017', 1),
(10, 1234, 1234, 12, '12-12-2017', 1),
(12, 1235, 1236, 50, '10-12-2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `worker_admin_account`
--

CREATE TABLE `worker_admin_account` (
  `id` int(11) NOT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `JobRole` varchar(50) DEFAULT NULL,
  `Salary` float DEFAULT NULL,
  `PositionID` int(11) NOT NULL,
  `DateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `worker_admin_account`
--

INSERT INTO `worker_admin_account` (`id`, `FName`, `LName`, `Email`, `Address`, `City`, `PhoneNumber`, `JobRole`, `Salary`, `PositionID`, `DateAdded`) VALUES
(1, 'David', 'Adel', 'davidadel95@outlook.com', '6 Atef Barakat', 'Cairo', '1220691726', 'Manager', 123456, 1, '0000-00-00 00:00:00'),
(4, 'Fady', 'Asaad', 'Fady1500464@miuegypt.edu.eg', 'Madinet Nasr', 'Cairo', '01211111111', 'Bank Director', 1500, 2, '2017-12-26 18:41:42'),
(48, 'David', 'William Adel', 'David1500330@miuegypt.edu.eg', 'Madinet Nasr', 'Cairo', '01220691726', 'Area Manager', 12000.5, 2, '2017-12-27 14:25:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`AccountNumber`),
  ADD KEY `FK1` (`UserID`),
  ADD KEY `FK2` (`AccountTypeID`);

--
-- Indexes for table `bank_accounts_types`
--
ALTER TABLE `bank_accounts_types`
  ADD PRIMARY KEY (`TypeID`,`AccountType`);

--
-- Indexes for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK8` (`WorkerID`);

--
-- Indexes for table `intrest`
--
ALTER TABLE `intrest`
  ADD PRIMARY KEY (`AccountNo`);

--
-- Indexes for table `Loans`
--
ALTER TABLE `Loans`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK10` (`AccountNo`);

--
-- Indexes for table `LoansCounter`
--
ALTER TABLE `LoansCounter`
  ADD PRIMARY KEY (`LoanID`);

--
-- Indexes for table `LOGIN`
--
ALTER TABLE `LOGIN`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `FK6` (`PositionId`);

--
-- Indexes for table `Position`
--
ALTER TABLE `Position`
  ADD PRIMARY KEY (`PositionID`,`PostitionName`);

--
-- Indexes for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `FK9` (`WorkerID`),
  ADD KEY `FK13` (`FromAccount`),
  ADD KEY `FK14` (`ToAccount`);

--
-- Indexes for table `worker_admin_account`
--
ALTER TABLE `worker_admin_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK11` (`PositionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `AccountNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1239;
--
-- AUTO_INCREMENT for table `bank_accounts_types`
--
ALTER TABLE `bank_accounts_types`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_account`
--
ALTER TABLE `customer_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Loans`
--
ALTER TABLE `Loans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `LoansCounter`
--
ALTER TABLE `LoansCounter`
  MODIFY `LoanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `LOGIN`
--
ALTER TABLE `LOGIN`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT for table `Position`
--
ALTER TABLE `Position`
  MODIFY `PositionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `worker_admin_account`
--
ALTER TABLE `worker_admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
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
-- Constraints for table `Loans`
--
ALTER TABLE `Loans`
  ADD CONSTRAINT `FK10` FOREIGN KEY (`AccountNo`) REFERENCES `bank_accounts` (`AccountNumber`);

--
-- Constraints for table `LOGIN`
--
ALTER TABLE `LOGIN`
  ADD CONSTRAINT `FK17` FOREIGN KEY (`PositionId`) REFERENCES `Position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  ADD CONSTRAINT `FK13` FOREIGN KEY (`FromAccount`) REFERENCES `bank_accounts` (`AccountNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK14` FOREIGN KEY (`ToAccount`) REFERENCES `bank_accounts` (`AccountNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK9` FOREIGN KEY (`WorkerID`) REFERENCES `worker_admin_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_admin_account`
--
ALTER TABLE `worker_admin_account`
  ADD CONSTRAINT `FK11` FOREIGN KEY (`PositionID`) REFERENCES `Position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
