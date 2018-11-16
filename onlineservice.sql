-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 04:49 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineservice`
--
CREATE DATABASE IF NOT EXISTS `onlineservice` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `onlineservice`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Customer_id` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `phno` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Customer_id`, `name`, `street`, `city`, `pincode`, `phno`) VALUES
('sundarbala2796@gmail.com', 'Bala', 'Satchiyapuram', 'Sivakasi', '626123', '1234567890'),
('raja56@gmail.com', 'Raja', 'Kamarajar Road,Satchiyapuram', 'Sivakasi', '626124', '0987654321'),
('gowtham@gmail.com', 'Gowtham', 'Alagarkovil road', 'Madurai', '123456', '1234567897');

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE `engineer` (
  `engid` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'images/avatar.png',
  `gender` varchar(8) NOT NULL DEFAULT 'male'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engineer`
--

INSERT INTO `engineer` (`engid`, `name`, `street`, `city`, `pincode`, `contactno`, `photo`, `gender`) VALUES
('sundarbala2796@gmail.com', 'balasundar', '49b,kamarajar road,satchiyapuram', 'sivakasi', '626123', '9486030622', 'images/avatar.jpg', 'male'),
('balasundar2796@gmail.com', 'balasundar', '49b,kamarajar road,satchiyapuram', 'sivakasi', '626123', '9486030662', 'images/avatar.jpg', 'male'),
('ravanesh@gmail.com', 'Ravanesh.I', '49b,kamarajar road,satchiyapuram', 'sivakasi', '626123', '9486030662', 'images/avatar.jpg', 'male'),
('hfuebgf@gmail.com', 'uyfhgewuygf', '49b,kamarajar road,satchiyapuram', 'sivakasi', '626123', '9486030662', 'images/avatar.jpg', 'male'),
('raaviravanesh@gmail.com', 'Ravanesh', '23,avt middle street ', 'sivakasi', '626123', '8056084755', 'images/avatar.jpg', 'male'),
('raja56@gmail.com', 'raja', '49b,kamarajar road,satchiyapuram', 'sivakasi', '626123', '8667562315', 'images/avatar.jpg', 'male'),
('hariceoa1997@gmail.com', 'hari', 'tpk', 'mdu', '05', '8667253688', 'images/avatar.jpg', 'male'),
('gowthamdgs333@gmail.com', 'gowtham', '49b,kamarajar road,satchiyapuram', 'sivakasi', '626123', '8675837423', 'images/avatar.jpg', 'male'),
('gowtham@gmail.com', 'les1344', '23,avt middle street ', 'sivakasi', '626123', '9626292373', 'images/avatar.jpg', 'male'),
('naansuryayadav@gmail.com', 'Surya', 'ring road', 'madurai', '626025', '8667253688', 'images/disney_mickey_mouse-1280x800 (1)_1539060677.jpg', 'male'),
('some@gmail.com', 'Bala', '23,avt middle street ', 'vnr', '626025', '8667253688', 'images/disney_mickey_mouse-1280x800 (1)_1539066111.jpg', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `password`, `type`) VALUES
('balasundar2796@gmail.com', 'pass', 'eng'),
('hfuebgf@gmail.com', '1234', 'client'),
('sundarbala2796@gmail.com', 'sundar', 'client'),
('raaviravanesh@gmail.com', '123', 'eng'),
('raja56@gmail.com', '123', 'client'),
('hariceoa1997@gmail.com', 'vanibass', 'eng'),
('gowthamdgs333@gmail.com', '8675837423', 'client'),
('gowtham@gmail.com', '8675837423', 'eng'),
('naansuryayadav@gmail.com', 'surya', 'eng'),
('naansuryayadav@gmail.com', 'surya', 'eng'),
('naansuryayadav@gmail.com', 'surya', 'eng'),
('naansuryayadav@gmail.com', 'Surya', 'eng'),
('naansuryayadav@gmail.com', 'Surya', 'eng'),
('naansuryayadav@gmail.com', 'Surya', 'eng'),
('naansuryayadav@gmail.com', 'Surya', 'eng'),
('naansuryayadav@gmail.com', 'Surya', 'eng'),
('naansuryayadav@gmail.com', 'Surya', 'eng'),
('naansuryayadav@gmail.com', 'Surya', 'eng');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `about` varchar(10) NOT NULL,
  `msg` varchar(140) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`from`, `to`, `about`, `msg`, `time`, `view_status`) VALUES
('balasundar2796@gmail.com', 'sundarbala2796@gmail.com', '56789', 'hai ', '2018-09-26 01:43:08', 0),
('sundarbala2796@gmail.com', 'balasundar2796@gmail.com', '21936', 'hai', '2018-09-26 02:12:46', 0),
('sundarbala2796@gmail.com', 'balasundar2796@gmail.com', '21936', 'hai', '2018-09-26 02:14:13', 0),
('sundarbala2796@gmail.com', 'ravanesh@gmail.com', '56789', 'sample', '2018-10-03 03:20:56', 0),
('raja56@gmail.com', 'ravanesh@gmail.com', '48765', 'when to gets completed', '2018-10-08 02:34:53', 0),
('raja56@gmail.com', 'raaviravanesh@gmail.com', '8422', 'hye', '2018-10-08 02:52:06', 0),
('raaviravanesh@gmail.com', 'raja56@gmail.com', '8422', 'accepted', '2018-10-08 03:00:17', 0),
('balasundar2796@gmail.com', 'gowtham@gmail.com', '94995', 'hye', '2018-10-08 03:04:18', 0),
('gowthamdgs333@gmail.com', 'gowtham@gmail.com', '94995', 'hye', '2018-10-08 03:19:08', 0),
('balasundar2796@gmail.com', 'sundarbala2796@gmail.com', '75651', 'hai', '2018-10-08 03:53:54', 0),
('balasundar2796@gmail.com', 'sundarbala2796@gmail.com', '75651', 'hai', '2018-10-08 03:54:48', 0),
('raja56@gmail.com', 'ravanesh@gmail.com', '48765', 'hye', '2018-10-08 04:28:37', 0),
('raja56@gmail.com', 'raaviravanesh@gmail.com', '8422', 'oh kkkkk', '2018-10-08 04:29:01', 0),
('raaviravanesh@gmail.com', 'raja56@gmail.com', '8422', 'accept ur prblm', '2018-10-08 04:30:04', 0),
('raja56@gmail.com', 'raaviravanesh@gmail.com', '8422', 'hmmm k when u come', '2018-10-08 04:31:19', 0),
('raaviravanesh@gmail.com', 'raja56@gmail.com', '8422', 'whats abt the problem', '2018-10-08 04:32:33', 0),
('raja56@gmail.com', 'raaviravanesh@gmail.com', '8422', 'unknown', '2018-10-08 04:35:02', 0),
('raaviravanesh@gmail.com', 'raja56@gmail.com', '8422', 'meet u 2day', '2018-10-08 04:36:28', 0),
('raja56@gmail.com', 'ravanesh@gmail.com', '48765', 'hye\r\n', '2018-10-08 04:37:07', 0),
('raaviravanesh@gmail.com', 'raja56@gmail.com', '48765', 'accepted ur request', '2018-10-08 04:38:23', 0),
('sundarbala2796@gmail.com', 'balasundar2796@gmail.com', '85676', 'sample msg', '2018-10-09 02:58:51', 0),
('sundarbala2796@gmail.com', 'balasundar2796@gmail.com', '75651', 'msg received', '2018-10-09 03:14:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `Problem_id` int(15) NOT NULL,
  `Eng_id` varchar(100) NOT NULL,
  `Customer_id` varchar(150) NOT NULL,
  `Problem_type` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Acceptance` varchar(15) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `rating` varchar(3) NOT NULL DEFAULT 'NR',
  `view_status` int(1) NOT NULL DEFAULT '0',
  `client_view_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`Problem_id`, `Eng_id`, `Customer_id`, `Problem_type`, `Description`, `time`, `Acceptance`, `Status`, `rating`, `view_status`, `client_view_status`) VALUES
(56789, 'ravanesh@gmail.com', 'sundarbala2796@gmail.com', 'Software', 'OS currupted', '2018-09-04 04:35:59', 'Accepted', 'Not attended', '80', 1, 1),
(94995, 'balasundar2796@gmail.com', 'gowtham@gmail.com', 'sw', 'OS Problem', '2018-09-04 04:35:59', 'Accepted', 'Not Attended', '100', 1, 1),
(76603, 'balasundar2796@gmail.com', 'gowtham@gmail.com', 'o', 'Unkown', '2018-09-04 04:35:59', 'Not accepted', 'Not Attended', '100', 1, 0),
(19407, 'ravanesh@gmail.com', 'sundarbala2796@gmail.com', 'o', 'Damaged', '2018-09-04 04:35:59', 'Not accepted', 'Not Attended', 'NR', 1, 1),
(10148, 'balasundar2796@gmail.com', 'sundarbala2796@gmail.com', 'hw', 'Unkown', '2018-09-04 04:35:59', 'Not accepted', 'Not Attended', '25', 1, 1),
(21936, 'balasundar2796@gmail.com', 'sundarbala2796@gmail.com', 'hw', 'Unkown', '2018-09-04 04:35:59', 'Not accepted', 'Not Attended', '100', 1, 1),
(48765, 'ravanesh@gmail.com', 'raja56@gmail.com', 'hw', 'OS Problem', '2018-09-04 04:35:59', 'Accepted', 'Not Attended', '80', 1, 1),
(8422, 'raaviravanesh@gmail.com', 'raja56@gmail.com', 'hw', 'Unkown', '2018-09-04 04:35:59', 'Accepted', 'Not Attended', 'NR', 1, 1),
(200, 'balasundar2796@gmail.com', 'sundarbala2796@gmail.com', 'Harware', 'Power button not working', '2018-09-11 05:44:46', 'Accepted', '0', '25', 1, 1),
(75651, 'balasundar2796@gmail.com', 'sundarbala2796@gmail.com', 'sw', 'OS Problem', '0000-00-00 00:00:00', 'Accepted', 'Not Attended', '25', 1, 1),
(55589, 'balasundar2796@gmail.com', 'sundarbala2796@gmail.com', 'hw', 'System Doesnot power on', '2018-09-26 01:38:43', 'Not accepted', 'Not Attended', '100', 1, 0),
(53995, 'balasundar2796@gmail.com', 'sundarbala2796@gmail.com', 'sw', 'Unkown', '2018-09-26 01:41:01', 'Not accepted', 'Not Attended', '100', 1, 0),
(85676, 'balasundar2796@gmail.com', 'sundarbala2796@gmail.com', 'Computer Hardware', 'System Does not power on', '2018-10-09 02:29:21', 'Not accepted', 'Not Attended', 'NR', 1, 0),
(42064, 'balasundar2796@gmail.com', 'sundarbala2796@gmail.com', 'Computer Hardware', 'System Does not power on', '2018-10-09 02:53:39', 'Accepted', 'Not Attended', 'NR', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `problem_status`
--

CREATE TABLE `problem_status` (
  `Problem_id` int(15) NOT NULL,
  `cview_status` int(1) NOT NULL,
  `eview_status` int(1) NOT NULL,
  `eacceptance` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `eng_id` varchar(150) NOT NULL,
  `Specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`eng_id`, `Specialization`) VALUES
('balasundar2796@gmail.com', 'Computer Hardware'),
('balasundar2796@gmail.com', 'Computer Software'),
('ravanesh@gmail.com', 'CCTV'),
('ravanesh@gmail.com', 'Electrical'),
('naansuryayadav@gmail.com', 'CCTV'),
('some@gmail.com', 'Computer Software');

-- --------------------------------------------------------

--
-- Table structure for table `viewbycat`
--

CREATE TABLE `viewbycat` (
  `cat_name` text NOT NULL,
  `cat_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viewbycat`
--

INSERT INTO `viewbycat` (`cat_name`, `cat_id`) VALUES
('by_client', 'Customer_id'),
('by_problemtype', 'Problem_type'),
('Problem_status', 'Status'),
('Device_type', 'Device'),
('Problem_id', 'Problem_id'),
('Acceptance_Status', 'Acceptance');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
