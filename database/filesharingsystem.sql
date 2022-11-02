-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 04:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filesharingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email_address` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `actions` varchar(200) NOT NULL DEFAULT 'Has LoggedOut the system at',
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `logout_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `id`, `email_address`, `action`, `actions`, `ip`, `host`, `login_time`, `logout_time`) VALUES
(1, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-29-2019 02:36 PM', 'May-30-2019 04:33 PM'),
(2, 1, 'nario@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'buhayko-PC', 'May-30-2019 04:30 PM', 'May-30-2019 04:33 PM'),
(3, 2, 'a@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'SourceCodePh', 'Jan-14-2022 01:35 AM', 'Jan-14-2022 01:49 AM'),
(4, 2, 'a@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'SourceCodePh', 'Jan-14-2022 01:49 AM', 'Jan-14-2022 01:49 AM'),
(5, 2, 'a@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'SourceCodePh', 'Jan-14-2022 10:11 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `created_on` datetime NOT NULL,
  `role` varchar(12) NOT NULL,
  `position` varchar(250) NOT NULL,
  `age` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`, `role`, `position`, `age`, `address`, `phonenumber`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '219604930_865796534320809_3427328319495791222_n.jpg', '0000-00-00 00:00:00', 'admin', '', '', '', '', ''),
(4, 'staff2', 'staff2', 'staff', 'staff', 'user7-128x128.jpg', '2021-09-01 12:09:45', 'staff', 'SPO4', 'Jario', 'Dumaguete City', '09358167104', 'andresjario26@gmail.com'),
(5, 'user1', 'user1', 'user1', 'user1', 'user2-160x160.jpg', '2021-09-02 13:10:40', 'user', '', '89', 'Manila Phippines', '90901211', 'junadelacruz@gmail.com'),
(7, '1', '1', 'Crischel', 'Amorio', 'user7-128x128.jpg', '2021-10-27 20:31:20', 'admin', 'PO3', '27', 'Mabinay Negros Oriental', '0998544', 'Crischel@gmail.com'),
(8, 'staff1', 'staff1', 'staff1', 'staff1', 'user5-128x128.jpg', '2022-01-18 13:10:45', 'staff', 'IT Admin', '12', 'Test', '1112', 'Test@gmaill.com'),
(9, 'user2', 'user2', 'user2', 'user2', 'user4-128x128.jpg', '2022-01-18 23:54:06', 'user', '', '1', 'USA', '1', 'john@gmail.com'),
(10, 'user3', 'user3', 'user3', 'user3', '', '2022-01-19 13:51:58', 'user', '', '1', 'user3', '111', 'user3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `cid` int(11) NOT NULL,
  `cfileid` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT -1,
  `userid` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`cid`, `cfileid`, `parent_id`, `userid`, `content`, `submit_date`) VALUES
(1, '31', -1, '5', '<p>a</p>', '2022-01-19 09:05:53'),
(2, '33', -1, '1', 'hELLO', '2022-01-19 23:07:01'),
(3, '33', -1, '10', '<p>Hello sir</p>', '2022-01-19 23:07:48'),
(4, '33', -1, '1', '<p>oK</p>', '2022-01-19 23:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbldeleted`
--

CREATE TABLE `tbldeleted` (
  `DLETID` int(11) NOT NULL,
  `FILE_ID` varchar(250) NOT NULL,
  `USERID` varchar(250) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldeleted`
--

INSERT INTO `tbldeleted` (`DLETID`, `FILE_ID`, `USERID`, `DATE_TIME`) VALUES
(21, '29', '1', '2022-01-19 15:51:39'),
(22, '33', '1', '2022-01-19 15:51:46'),
(25, '31', '5', '2022-01-19 15:58:22'),
(26, '35', '5', '2022-01-19 15:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblfileshare`
--

CREATE TABLE `tblfileshare` (
  `SID` int(11) NOT NULL,
  `TO_USERID` varchar(250) NOT NULL,
  `FILE_SHAREID` varchar(250) NOT NULL,
  `FROM_USERID` varchar(250) NOT NULL,
  `SHARE_DATETIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfileshare`
--

INSERT INTO `tblfileshare` (`SID`, `TO_USERID`, `FILE_SHAREID`, `FROM_USERID`, `SHARE_DATETIME`) VALUES
(14, '7', '31', '5', '2022-01-19 05:13:41'),
(15, '5', '32', '9', '2022-01-19 05:16:57'),
(16, '9', '31', '5', '2022-01-19 05:16:57'),
(17, '9', '33', '10', '2022-01-19 05:16:57'),
(18, '10', '35', '5', '2022-01-19 11:47:26'),
(19, '9', '34', '8', '2022-01-19 16:43:58'),
(20, '9', '36', '5', '2022-01-19 17:14:12'),
(21, '8', '30', '4', '2022-01-19 17:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblsettings`
--

CREATE TABLE `tblsettings` (
  `id` int(11) NOT NULL,
  `sys_email` text NOT NULL,
  `sys_logo` text NOT NULL,
  `sys_address` text NOT NULL,
  `sys_phonenumber` varchar(100) NOT NULL,
  `sys_name` text NOT NULL,
  `sys_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsettings`
--

INSERT INTO `tblsettings` (`id`, `sys_email`, `sys_logo`, `sys_address`, `sys_phonenumber`, `sys_name`, `sys_created`) VALUES
(1, 'filstorage@gmail.com', 'ppt-icon-488.png', 'Negros Oriental', '0998557455', 'FILE STORAGE AND SHARING SYSTEM', '2022-01-19 16:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE `upload_files` (
  `FILEID` int(11) NOT NULL,
  `FILENAME` varchar(200) NOT NULL,
  `FILESIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `FILESTATUS` int(11) NOT NULL,
  `YEAR` year(4) NOT NULL DEFAULT current_timestamp(),
  `UPLOADER` int(11) NOT NULL,
  `DATETIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_files`
--

INSERT INTO `upload_files` (`FILEID`, `FILENAME`, `FILESIZE`, `DOWNLOAD`, `TIMERS`, `ADMIN_STATUS`, `EMAIL`, `FILESTATUS`, `YEAR`, `UPLOADER`, `DATETIME`) VALUES
(29, 'BARANGAY RECORD SYSTEM.pptx', '575032', '0', 'Jan-19-2022 12:26 AM', '', '', 1, 2022, 1, '2022-01-19 15:51:39'),
(30, 'user8-128x128.jpg', '5060', '0', 'Jan-19-2022 12:44 AM', '', '', 0, 2022, 4, '2022-01-19 15:51:14'),
(31, 'profile.jpg', '26644', '0', 'Jan-19-2022 08:25 AM', '', '', 1, 2022, 5, '2022-01-19 15:58:22'),
(32, 'attendance_summary.pdf', '7537', '0', 'Jan-19-2022 01:15 PM', '', '', 0, 2022, 9, '2022-01-19 05:15:23'),
(33, 'MOtorcycle-rental-Docu-printpdf-converted.pptx', '119053', '1', 'Jan-19-2022 01:53 PM', '', '', 1, 2022, 10, '2022-01-19 15:51:45'),
(34, 'eeeewew.jpg', '158681', '0', 'Jan-19-2022 07:05 PM', '', '', 0, 2022, 8, '2022-01-19 15:16:08'),
(35, 'rrr.jpg', '210313', '0', 'Jan-19-2022 07:46 PM', '', '', 1, 2022, 5, '2022-01-19 15:58:25'),
(36, 'user7-128x128.jpg', '6434', '0', 'Jan-20-2022 01:13 AM', '', '', 0, 2022, 5, '2022-01-19 17:13:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbldeleted`
--
ALTER TABLE `tbldeleted`
  ADD PRIMARY KEY (`DLETID`);

--
-- Indexes for table `tblfileshare`
--
ALTER TABLE `tblfileshare`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `tblsettings`
--
ALTER TABLE `tblsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_files`
--
ALTER TABLE `upload_files`
  ADD PRIMARY KEY (`FILEID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldeleted`
--
ALTER TABLE `tbldeleted`
  MODIFY `DLETID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblfileshare`
--
ALTER TABLE `tblfileshare`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsettings`
--
ALTER TABLE `tblsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upload_files`
--
ALTER TABLE `upload_files`
  MODIFY `FILEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
