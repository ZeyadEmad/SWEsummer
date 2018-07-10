-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 10:20 PM
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
  `Accountnumber` int(11) NOT NULL,
  `AccountTypeID` int(11) NOT NULL,
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intrest`
--

CREATE TABLE `intrest` (
  `AccountNo` int(11) NOT NULL,
  `Intrest` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `LOGIN`
--

CREATE TABLE `LOGIN` (
  `userID` int(11) NOT NULL,
  `Password` varchar(40) DEFAULT NULL,
  `positionId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Position`
--

CREATE TABLE `Position` (
  `PositionID` int(11) NOT NULL,
  `PostitionName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TRANSACTIONS`
--

CREATE TABLE `TRANSACTIONS` (
  `TransactionID` int(11) NOT NULL,
  `FromAccount` int(11) DEFAULT NULL,
  `ToAccount` int(11) DEFAULT NULL,
  `Amount` float DEFAULT NULL,
  `TransactionDate` varchar(50) DEFAULT NULL,
  `WorkerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TYPES`
--

CREATE TABLE `TYPES` (
  `TypeID` int(11) NOT NULL,
  `AccountType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Passwords` varchar(50) DEFAULT NULL,
  `PositionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCOUNTS`
--
ALTER TABLE `ACCOUNTS`
  ADD PRIMARY KEY (`Accountnumber`),
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
  ADD KEY `FK6` (`positionId`);

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
  ADD KEY `FK9` (`WorkerID`);

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
  MODIFY `Accountnumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Loans`
--
ALTER TABLE `Loans`
  MODIFY `LoanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `LOGIN`
--
ALTER TABLE `LOGIN`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Position`
--
ALTER TABLE `Position`
  MODIFY `PositionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `USER_ACCOUNTS`
--
ALTER TABLE `USER_ACCOUNTS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `WORKERADMINACCOUNT`
--
ALTER TABLE `WORKERADMINACCOUNT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ACCOUNTS`
--
ALTER TABLE `ACCOUNTS`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`Accountnumber`) REFERENCES `intrest` (`AccountNo`);

--
-- Constraints for table `Loans`
--
ALTER TABLE `Loans`
  ADD CONSTRAINT `FK10` FOREIGN KEY (`AccountNo`) REFERENCES `ACCOUNTS` (`Accountnumber`);

--
-- Constraints for table `LOGIN`
--
ALTER TABLE `LOGIN`
  ADD CONSTRAINT `FK6` FOREIGN KEY (`positionId`) REFERENCES `Position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TRANSACTIONS`
--
ALTER TABLE `TRANSACTIONS`
  ADD CONSTRAINT `FK9` FOREIGN KEY (`WorkerID`) REFERENCES `WORKERADMINACCOUNT` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TYPES`
--
ALTER TABLE `TYPES`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`TypeID`) REFERENCES `ACCOUNTS` (`AccountTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `USER_ACCOUNTS`
--
ALTER TABLE `USER_ACCOUNTS`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`ID`) REFERENCES `ACCOUNTS` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK5` FOREIGN KEY (`ID`) REFERENCES `LOGIN` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK8` FOREIGN KEY (`WorkerID`) REFERENCES `WORKERADMINACCOUNT` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `WORKERADMINACCOUNT`
--
ALTER TABLE `WORKERADMINACCOUNT`
  ADD CONSTRAINT `FK11` FOREIGN KEY (`PositionID`) REFERENCES `Position` (`PositionID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
