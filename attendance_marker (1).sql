-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 04:20 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_marker`
--

-- --------------------------------------------------------

--
-- Table structure for table `fingerid`
--

CREATE TABLE `fingerid` (
  `Reg_No` varchar(15) NOT NULL,
  `Subject` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Now_Time` time NOT NULL,
  `St_Time` time NOT NULL,
  `Ed_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `FID` varchar(11) NOT NULL,
  `RN` varchar(100) NOT NULL,
  `NM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`FID`, `RN`, `NM`) VALUES
('1', '2015/ICTS/12', 'H.M.D.A. Herath'),
('2', '2015/ICTS/27', 'D.W.H.W.D.T. Hettiarachchi'),
('3', '2015/ICTS/41', 'J. Thilageshwary'),
('4', '2015/ICTS/58', 'L.H.D. Medis'),
('5', '2015/ICTS/72', 'A.K.S. Ahamed');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `sheetId` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `day` varchar(15) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `subjectCode` varchar(10) NOT NULL,
  `chck` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`sheetId`, `userName`, `day`, `startTime`, `endTime`, `subjectCode`, `chck`) VALUES
(1, 'Doola123', 'Monday', '08:30:00', '09:30:00', 'TICT3213', 'no'),
(2, 'Doola123', 'Monday', '10:30:00', '11:30:00', 'TICT3224', 'no'),
(3, 'Doola123', 'Tuesday', '09:30:00', '10:30:00', 'TICT3232', 'no'),
(4, 'Doola123', 'Tuesday', '10:30:00', '11:30:00', 'TICT3242', 'no'),
(5, 'Doola123', 'Wednesday', '08:30:00', '09:30:00', 'TICT3224', 'no'),
(6, 'Doola123', 'Wednesday', '10:30:00', '11:30:00', 'TICT3242', 'no'),
(7, 'Doola123', 'Thursday', '10:30:00', '11:30:00', 'TICT3224', 'no'),
(8, 'Doola123', 'Thursday', '14:30:00', '15:30:00', 'TICT3224', 'no'),
(9, 'Doola123', 'Friday', '09:30:00', '10:30:00', 'TICT3242', 'no'),
(10, 'Doola123', 'Friday', '11:30:00', '12:30:00', 'TICT3213', 'no'),
(11, 'Heshh', 'Monday', '09:30:00', '10:30:00', 'TICT3253', 'no'),
(12, 'Heshh', 'Monday', '13:30:00', '14:30:00', 'TICT3263', 'no'),
(13, 'Heshh', 'Tuesday', '08:30:00', '09:30:00', 'TICT3272', 'no'),
(14, 'Heshh', 'Tuesday', '15:30:00', '16:30:00', 'AUX3212', 'no'),
(15, 'Heshh', 'Wednesday', '09:30:00', '10:30:00', 'TICT3263', 'no'),
(16, 'Heshh', 'Wednesday', '11:30:00', '12:30:00', 'TICT3253', 'no'),
(17, 'Heshh', 'Thursday', '10:30:00', '11:30:00', 'TICT3272', 'no'),
(18, 'Heshh', 'Thursday', '14:30:00', '15:30:00', 'AUX3212', 'no'),
(19, 'Heshh', 'Friday', '08:30:00', '09:30:00', 'TICT3272', 'no'),
(20, 'Heshh', 'Friday', '10:30:00', '11:30:00', 'TICT3263', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(40) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `userName`, `password`) VALUES
('admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
('Doolanga', 'Doola123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('Heshan', 'Heshh', 'f10e2821bbbea527ea02200352313bc059445190');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fingerid`
--
ALTER TABLE `fingerid`
  ADD PRIMARY KEY (`Reg_No`,`Subject`,`Date`,`St_Time`,`Ed_Time`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`RN`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`sheetId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `sheetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
