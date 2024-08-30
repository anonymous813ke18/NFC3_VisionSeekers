-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 02:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orphan`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `cid` int(50) NOT NULL,
  `belongCid` int(20) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cdob` date NOT NULL,
  `cyoe` year(4) NOT NULL,
  `cclass` int(3) NOT NULL,
  `cstory` text NOT NULL,
  `cphoto` text NOT NULL,
  `sponsored` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`cid`, `belongCid`, `cname`, `cdob`, `cyoe`, `cclass`, `cstory`, `cphoto`, `sponsored`) VALUES
(7, 0, 'Ganesh', '2006-12-20', '2009', 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.', '', 1),
(8, 0, 'Suraj', '2005-06-15', '2007', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '', 1),
(9, 0, 'Sagar', '2006-06-14', '2008', 2, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 0),
(11, 0, 'Nagesh', '2005-04-08', '2009', 3, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 0),
(13, 0, 'umesh', '2007-06-14', '2010', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 0),
(14, 0, 'fazal', '2004-06-22', '2007', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus integer feugiat scelerisque varius morbi enim nunc faucibus a.', '', 0),
(15, 0, 'Ujwal', '2008-09-21', '2010', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas ultricies mi eget mauris pharetra.', '', 0),
(16, 0, 'Amith', '1998-12-23', '2004', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas ultricies mi eget mauris pharetra.', '', 0),
(18, 22, 'new child', '2024-08-23', '2009', 0, 'sdsff', 'official_login_bg.jpg', 0),
(19, 20, 'hammad', '2024-08-29', '2004', 0, 'This is hammad', 'photo/1724942749-official_login_bg.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `d_id` int(3) NOT NULL,
  `program` varchar(20) NOT NULL,
  `amount` int(30) NOT NULL,
  `checkno` varchar(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `d_address` text NOT NULL,
  `donation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`d_id`, `program`, `amount`, `checkno`, `bank_name`, `place`, `d_name`, `email`, `phone`, `d_address`, `donation_date`) VALUES
(1, 'Lakshya', 10000, '42f213', 'sbi', 'bengaluru', 'Ramesh', 'mukesh@gmail.com', 55555444, '309 E. Westport Dr. \r\nManchester Township, NJ 08759', '2024-08-30 04:56:34'),
(2, 'Parivartan', 7870, '98da93', 'canara', 'hydrabad', 'hitesh', 'dinesh@test.com', 55555444, '7 Beech Road \r\nNew City, NY 10956', '2024-08-30 04:56:34'),
(3, 'Parivartan', 4000, '98da93', 'fedaral', 'chennai', 'Mahesh', 'mahesh@gmail.com', 22222222, '764 Hill Court \r\nGlendora, CA 91740', '2024-08-30 04:56:34'),
(4, 'AAKAR - the first st', 1000, 'cbheb2bh2b', 'cjdb', 'bkdhj', 'cdskbh', 'bjkb@gmail.com', 0, 'jkb', '2024-08-30 04:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(3) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `full_address` text NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `full_name`, `full_address`, `phone`, `email`, `comment`) VALUES
(1, 'Vyshak', '764 Hill Court \r\nGlendora, CA 91740', 55555444, 'Vyshak@gmail.com', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'edwin', '587 Riverside Ave. \r\nHephzibah, GA 30815', 55555444, 'edwin@test.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL,
  `cid` int(50) NOT NULL,
  `gift_type` varchar(20) NOT NULL,
  `sending_date` date NOT NULL,
  `sender_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `sender_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`gift_id`, `cid`, `gift_type`, `sending_date`, `sender_name`, `email`, `phone`, `sender_address`) VALUES
(1, 8, 'dress', '2018-11-30', 'test', 'mukesh@gmail.com', 687698675, '587 Riverside Ave. \r\nHephzibah, GA 30815'),
(2, 9, 'helicopter', '2018-11-30', 'fazal', 'karthikareddy@gmail.com', 659586785, '10 Strawberry Drive \r\nLorain, OH 44052');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inv_id` int(10) NOT NULL,
  `cid` int(20) NOT NULL,
  `inv_name` text NOT NULL,
  `inv_qnt` int(10) NOT NULL,
  `inv_for` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `cid`, `inv_name`, `inv_qnt`, `inv_for`) VALUES
(2, 17, 'Chair', 90, 'old'),
(3, 19, 'Chair', 10, 'old'),
(4, 22, 'Bed', 99, 'old'),
(5, 20, 'Bed', 100, 'old');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(2) NOT NULL DEFAULT 0,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `picture` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`user_id`, `username`, `password`, `role`, `join_date`, `first_name`, `last_name`, `gender`, `birthdate`, `city`, `state`, `picture`) VALUES
(1, 'testname', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2018-11-17 06:01:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2018-11-23 21:45:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'madi', 'b8d49fd140893a48b541fb80e2bb76328030f535', 0, '2024-08-29 16:50:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'old age house 3', 'old age house 3', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'house4', 'b985c07960b3bc2e80538926a4b3252fe30e627b', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Orphanage1', '67c7d82e0cf0baff2ae7480fdd04b0590c7f0de5', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `n_id` int(3) NOT NULL,
  `n_issue` varchar(40) NOT NULL,
  `n_story` text NOT NULL,
  `n_month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`n_id`, `n_issue`, `n_story`, `n_month`) VALUES
(1, 'News for Poonam', ' Poonam, 7 years old child living with her parents who are involved in working as feiwale, having no fixed income source and spending whole day moving from one corner to another to earn their livelihood. Poonam also used to work with her parents to sell different items which was in actuallu spoting her education career and childhood. With the step ahead and support of OFD, now Poonam is a part of students who are getting education in the learning centres aparted by OFD. She is now also taking part in co-curricular activities. A major change, this girl poonam and her friend had given a presentation aar Le-Meridian on December 20, 2007 in a conference arranged by Govt India with the support of Mr.Ajay Bakaya (Executive Director, Sarover Group of Hotels.', 'June'),
(2, 'Newly born children', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'August');

-- --------------------------------------------------------

--
-- Table structure for table `old`
--

CREATE TABLE `old` (
  `cid` int(50) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `typeOfNgo` text NOT NULL,
  `cyoe` year(4) NOT NULL,
  `cclass` text NOT NULL,
  `cstory` text NOT NULL,
  `cphoto` text NOT NULL,
  `sponsored` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `old`
--

INSERT INTO `old` (`cid`, `cname`, `typeOfNgo`, `cyoe`, `cclass`, `cstory`, `cphoto`, `sponsored`) VALUES
(17, 'Old age House1', '0000-00-00', '2002', 'Juhu Tara Rd, opposite JW Marriott, Juhu Tara, Juhu, Mumbai, Maharashtra 400049, India', 'At old age house1, our vision is to create a place where senior citizens can enjoy their golden years with dignity and joy. We uphold values of integrity, compassion, and excellence, ensuring that every resident receives personalized care and attention.', 'photo/Old age House1_2002_official_login_bg.jpg', 0),
(19, 'Old age House2', '0000-00-00', '2002', '328/330, Shop No: 135/136, Mangaldas Market,, opposite Jumma Masjid, Mumbai, Maharashtra 400002, India', 'This is desc fo old age2', 'photo/Old age House2_2002_regi_bg.jpeg', 0),
(20, 'old age house 3', '0000-00-00', '2000', 'Shop No. 2, Kakad Palace, Turner Rd, Bandra West, Mumbai, Maharashtra 400050, India', 'Description of old age house3', 'photo/old age house 3_2000_search1.jpeg', 0),
(21, 'house4', '0000-00-00', '2000', 'Shop No. 2, Kakad Palace, Turner Rd, Bandra West, Mumbai, Maharashtra 400050, India', 'desc house4', 'photo/house4_2000_regi_bg.jpeg', 0),
(22, 'Orphanage1', 'Orphanage', '2000', '	1st Floor, Rang Mahal Arcade, 1st Gaothan Ln, Santacruz West, Mumbai, Maharashtra 400054, India', 'This is Orphanage1', 'photo/Orphanage1_2000_locker.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(3) NOT NULL,
  `program_title` varchar(30) NOT NULL,
  `program_desc` text NOT NULL,
  `cid` int(20) NOT NULL,
  `vol_count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_title`, `program_desc`, `cid`, `vol_count`) VALUES
(1, 'AAKAR - the first step', 'This is program is meant to familiarize street children and their families with the importance of education through counselling by our staff and later they are enrolled in our organization where, with the help of our non-formal way of teaching through workshops by trained teachers, they are developed a love for learning. They are later admitted in MCD or public schools for formal education. A regular monitoring is done through frequent home visits by staff members. They are also helped in their studies at our learning centers opened at different locations for the convenience of chidren in order to help them in their smooth journey in school and prevent them from dropping out.', 17, 1),
(2, 'AHAR APURTI', 'To distribute food to the underprivileged, downtradden and marginalized people esp, children from the weaker sections of the society.', 22, 0),
(3, 'AVSAR - a chance', 'This program has been designed to assist the meritorious children of the underprivileged class in getting admission in reputed public schools for quality education under EWS quota.', 22, 0),
(4, 'Lakshya', 'To provide coaching classes for 6-12 class students of the economically weaker sections by dedicated and qualified staff. It has been designed keeping in mind the requirement of talented students who failed to afford expensive coaching being given at private coaching centers and therefore tag behind and remain unable to fullfil their dream of higher education in prestigious institutions.', 19, 0),
(5, 'PARIVARAN - change of directio', 'The program is meant to bring about positive changed in the life of street children by convincing and motivating them and their parents for the education of their children and helping them in their school admission and other financial assistance if required.', 19, 0),
(7, 'UPHAAR - gift a smile', 'This project aims to bridge the gap between underprivileged street children and their counterparts. This provides you with an opportunity to put to good use the clothes or toys your child has outgrown.', 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorer`
--

CREATE TABLE `sponsorer` (
  `spn_id` int(3) NOT NULL,
  `spn_firstname` varchar(30) NOT NULL,
  `spn_lastname` varchar(30) DEFAULT NULL,
  `spnd_date` date NOT NULL,
  `spn_noofyears` int(2) NOT NULL,
  `spn_email` varchar(30) NOT NULL,
  `spn_phone` int(20) NOT NULL,
  `spn_bill_address` text NOT NULL,
  `spn_amount` int(5) NOT NULL,
  `spn_checkno` varchar(20) NOT NULL,
  `cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sponsorer`
--

INSERT INTO `sponsorer` (`spn_id`, `spn_firstname`, `spn_lastname`, `spnd_date`, `spn_noofyears`, `spn_email`, `spn_phone`, `spn_bill_address`, `spn_amount`, `spn_checkno`, `cid`) VALUES
(18, 'Ravi', 'chander', '2018-11-23', 2, 'ravichander@gmail.com', 22222222, '618 Greenrose Dr. \r\nSchererville, IN 46375\r\n', 40000, '2w3e4r5t', 7),
(21, 'Madistic', 'Madistic', '2024-08-29', 1, 'madi1234@gmail.com', 2147483647, 'Prime Plaza, 002 & 102, SV Rd, Santacruz West, Mumbai, Maharashtra 400054, India', 4800, 'kjh2ehjn3', 8);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `vol_id` int(11) NOT NULL,
  `program_id` int(3) DEFAULT NULL,
  `vol_name` varchar(30) DEFAULT NULL,
  `vol_email` text DEFAULT NULL,
  `vol_phone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`vol_id`, `program_id`, `vol_name`, `vol_email`, `vol_phone`) VALUES
(1, 1, 'Kas', 'kas123@gmail.com', '9876543211');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `old`
--
ALTER TABLE `old`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `sponsorer`
--
ALTER TABLE `sponsorer`
  ADD PRIMARY KEY (`spn_id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`vol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `d_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `n_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `old`
--
ALTER TABLE `old`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sponsorer`
--
ALTER TABLE `sponsorer`
  MODIFY `spn_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `vol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
