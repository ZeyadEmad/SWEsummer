-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2017 at 11:53 AM
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
-- Table structure for table `ACCOUNTS`
--

CREATE TABLE `ACCOUNTS` (
  `UserID` int(11) NOT NULL,
  `AccountNumber` int(11) NOT NULL,
  `AccountTypeID` int(11) NOT NULL,
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ACCOUNTS`
--

INSERT INTO `ACCOUNTS` (`UserID`, `AccountNumber`, `AccountTypeID`, `balance`) VALUES
(5, 1234, 1, 12.56);

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
  `LoanID` int(11) NOT NULL,
  `AccountNo` int(11) NOT NULL,
  `Amount` float DEFAULT NULL,
  `Rate` float DEFAULT NULL,
  `UseOfLoan` varchar(50) DEFAULT NULL,
  `Acceptance` bit(1) DEFAULT NULL,
  `DateOfSubmission` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Loans`
--

INSERT INTO `Loans` (`LoanID`, `AccountNo`, `Amount`, `Rate`, `UseOfLoan`, `Acceptance`, `DateOfSubmission`) VALUES
(1, 1234, 10000, 5, 'howa keda', b'1', '20-10-2015');

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
(5, '12345', 1);

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
(1, 1234, 1234, 12, '7-12-2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TYPES`
--

CREATE TABLE `TYPES` (
  `TypeID` int(11) NOT NULL,
  `AccountType` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TYPES`
--

INSERT INTO `TYPES` (`TypeID`, `AccountType`) VALUES
(1, 'Current'),
(2, 'Loan');

-- --------------------------------------------------------

--
-- Table structure for table `USER_ACCOUNTS`
--

CREATE TABLE `USER_ACCOUNTS` (
  `ID` int(11) NOT NULL,
  `FNAME` varchar(50) DEFAULT NULL,
  `LNAME` varchar(50) DEFAULT NULL,
  `PersonalID` int(14) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `MobileNumber` int(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Date` varchar(200) DEFAULT NULL,
  `WorkerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER_ACCOUNTS`
--

INSERT INTO `USER_ACCOUNTS` (`ID`, `FNAME`, `LNAME`, `PersonalID`, `Address`, `MobileNumber`, `Email`, `Date`, `WorkerID`) VALUES
(5, 'John', 'Mounir', 123456, 'Madinet Nasr', 122222222, 'John1500464@miuegypt.edu.eg', '20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `WORKERADMINACCOUNT`
--

CREATE TABLE `WORKERADMINACCOUNT` (
  `id` int(11) NOT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `JobRole` varchar(50) DEFAULT NULL,
  `Salary` float DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Passwords` varchar(50) NOT NULL,
  `PositionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WORKERADMINACCOUNT`
--

INSERT INTO `WORKERADMINACCOUNT` (`id`, `FName`, `LName`, `Email`, `Address`, `City`, `PhoneNumber`, `JobRole`, `Salary`, `Username`, `Passwords`, `PositionID`) VALUES
(1, 'David', 'Adel', 'davidadel95@outlook.com', '6 Atef Barakat', 'Cairo', 1220691726, 'Manager', 123456, 'david', 'david', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCOUNTS`
--
ALTER TABLE `ACCOUNTS`
  ADD PRIMARY KEY (`AccountNumber`),
  ADD KEY `FK1` (`UserID`),
  ADD KEY `FK2` (`AccountTypeID`);

--
-- Indexes for table `intrest`
--
ALTER TABLE `intrest`
  ADD PRIMARY KEY (`AccountNo`);

--
-- Indexes for table `Loans`
--
ALTER TABLE `Loans`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `FK10` (`AccountNo`);

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
-- Indexes for table `TYPES`
--
ALTER TABLE `TYPES`
  ADD PRIMARY KEY (`TypeID`,`AccountType`);

--
-- Indexes for table `USER_ACCOUNTS`
--
ALTER TABLE `USER_ACCOUNTS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK8` (`WorkerID`);

--
-- Indexes for table `WORKERADMINACCOUNT`
--
ALTER TABLE `WORKERADMINACCOUNT`
  ADD PRIMARY KEY (`id`,`Username`),
  ADD KEY `FK11` (`PositionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ACCOUNTS`
--
ALTER TABLE `ACCOUNTS`
  MODIFY `AccountNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;
--
-- AUTO_INCREMENT for table `Loans`
--
ALTER TABLE `Loans`
  MODIFY `LoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `LOGIN`
--
ALTER TABLE `LOGIN`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Position`
--
ALTER TABLE `Position`
  MODIFY `PositionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `TYPES`
--
ALTER TABLE `TYPES`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `USER_ACCOUNTS`
--
ALTER TABLE `USER_ACCOUNTS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `WORKERADMINACCOUNT`
--
ALTER TABLE `WORKERADMINACCOUNT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ACCOUNTS`
--
ALTER TABLE `ACCOUNTS`
  ADD CONSTRAINT `FK15` FOREIGN KEY (`UserID`) REFERENCES `USER_ACCOUNTS` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK16` FOREIGN KEY (`AccountTypeID`) REFERENCES `TYPES` (`TypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `intrest`
--
ALTER TABLE `intrest`
  ADD CONSTRAINT `FK12` FOREIGN KEY (`AccountNo`) REFERENCES `ACCOUNTS` (`Accountnumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Loans`
--
ALTER TABLE `Loans`
  ADD CONSTRAINT `FK10` FOREIGN KEY (`AccountNo`) REFERENCES `ACCOUNTS` (`Accountnumber`);

--
-- Constraints for table `LOGIN`
--
ALTER TABLE `LOGIN`
  ADD CONSTRAINT `FK17` FOREIGN KEY (`PositionId`) REFERENCES `Position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK18` FOREIGN KEY (`userID`) REFERENCES `USER_ACCOUNTS` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  ADD CONSTRAINT `FK13` FOREIGN KEY (`FromAccount`) REFERENCES `ACCOUNTS` (`Accountnumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK14` FOREIGN KEY (`ToAccount`) REFERENCES `ACCOUNTS` (`Accountnumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK9` FOREIGN KEY (`WorkerID`) REFERENCES `WORKERADMINACCOUNT` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `USER_ACCOUNTS`
--
ALTER TABLE `USER_ACCOUNTS`
  ADD CONSTRAINT `FK8` FOREIGN KEY (`WorkerID`) REFERENCES `WORKERADMINACCOUNT` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `WORKERADMINACCOUNT`
--
ALTER TABLE `WORKERADMINACCOUNT`
  ADD CONSTRAINT `FK11` FOREIGN KEY (`PositionID`) REFERENCES `Position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
