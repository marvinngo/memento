-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2018 at 06:14 PM
-- Server version: 5.7.22
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justince_mementodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Group`
--

CREATE TABLE `tbl_Group` (
  `Group_ID` varchar(50) NOT NULL,
  `Group_Name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_Registration`
--

CREATE TABLE `tbl_Registration` (
  `User_ID` int(11) NOT NULL,
  `Group_ID` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Registration_Budget` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_User`
--

CREATE TABLE `tbl_User` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(50) DEFAULT NULL,
  `User_Password` varchar(50) DEFAULT NULL,
  `User_Email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_User`
--

INSERT INTO `tbl_User` (`User_ID`, `User_Name`, `User_Password`, `User_Email`) VALUES
(1, 'Justin', 'abc', 'abc@abc.abc'),
(2, 'DD', 'peteriscool', 'ahn927@gmail.com'),
(3, 'suhduude', '1234', 'lol@lol.lol'),
(4, 'Dudemanbro', 'whatup', 'ayy@lmao.com'),
(5, 'Jp', 'Jj', 'pp@od.com'),
(6, 'tester', 'test', 'tester@test'),
(7, 'Test', 'Jj', 'test@jjd.c'),
(8, 'test1', 'testpass', 'bananas@banan.net'),
(9, 'banana', 'banana', 'banana@1'),
(10, 'asdf', 'asdf', 'asdf@asdf.com'),
(11, 'asdf', 'asdf', 'asdf@asdf.com'),
(12, 'newaccount', 'newaccount', 'asdf@asdf.com'),
(13, 'jp', 'jj', 'pp@od.com'),
(14, 'TROGDORTHEBURNINATOR', 'DRAGONSFTW', 'TROGDOR@hotmail.com'),
(15, 'chris', 'chris', 'cthompson98@bcit.ca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_Group`
--
ALTER TABLE `tbl_Group`
  ADD PRIMARY KEY (`Group_ID`);

--
-- Indexes for table `tbl_Registration`
--
ALTER TABLE `tbl_Registration`
  ADD PRIMARY KEY (`User_ID`,`Group_ID`),
  ADD KEY `Group_ID` (`Group_ID`);

--
-- Indexes for table `tbl_User`
--
ALTER TABLE `tbl_User`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_User`
--
ALTER TABLE `tbl_User`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
