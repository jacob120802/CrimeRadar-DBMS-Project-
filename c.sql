-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 28, 2023 at 04:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c`
--

-- --------------------------------------------------------

--
-- Table structure for table `casefile`
--

CREATE TABLE `casefile` (
  `case_id` int(11) NOT NULL,
  `casetitle` text NOT NULL,
  `offense` text NOT NULL,
  `accused` text NOT NULL,
  `description` text NOT NULL,
  `casedocs` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casefile`
--

INSERT INTO `casefile` (`case_id`, `casetitle`, `offense`, `accused`, `description`, `casedocs`, `status`) VALUES
(19, 'hasaf murder case', 'murder', 'wahib', 'murder case ', '10327Online crime Management system (2).docx', 'Active'),
(21, 'codex', 'murder', 'wahib', 'it is a cognizable case', '12961Online crime Management system (2).docx', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `complainer`
--

CREATE TABLE `complainer` (
  `complainer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complainer`
--

INSERT INTO `complainer` (`complainer_id`, `name`, `username`, `gender`, `mobile`, `password`, `status`) VALUES
(1, 'Muyeen IA', 'mvaravinda@technopulse.in', 'm', '9740073188', '$2y$10$5qu7PgDmLxK395LtIMmAROLK070X.6TmbYwYd4iTE/7PVV3Ekok6S', 'Active'),
(2, 'mathew', 'appu', 'm', '9422819762', '$2y$10$qu6.cgzDKaP6KPDziAypsO3HKpMrX0702l9mq1C14s47l6sKnBhXC', 'Active'),
(3, 'Raj', 'raj@gmail.com', 'm', '9874561258', '$2y$10$5qu7PgDmLxK395LtIMmAROLK070X.6TmbYwYd4iTE/7PVV3Ekok6S', 'Active'),
(10, 'krutarth', 'kru', 'm', '9786', '$2y$10$mQCXtVwPZj4ONxu5uQemGO8xGS4gc8XTDM47lZym.qWnm5y7P78XG', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(10) NOT NULL,
  `substation_id` int(10) NOT NULL,
  `station_id` int(10) NOT NULL,
  `complainer_id` int(10) NOT NULL,
  `complaint_type` varchar(25) NOT NULL,
  `accused` varchar(50) NOT NULL,
  `complaint_detail` text NOT NULL,
  `complaint_date` datetime NOT NULL DEFAULT current_timestamp(),
  `victim_address` text NOT NULL,
  `victims_name` varchar(50) NOT NULL,
  `victim_phoneno` varchar(10) NOT NULL,
  `evidence` text NOT NULL,
  `photo_evidence` varchar(100) NOT NULL,
  `video_evidence` varchar(100) NOT NULL,
  `anynote` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `substation_id`, `station_id`, `complainer_id`, `complaint_type`, `accused`, `complaint_detail`, `complaint_date`, `victim_address`, `victims_name`, `victim_phoneno`, `evidence`, `photo_evidence`, `video_evidence`, `anynote`, `status`) VALUES
(17, 239, 2, 1, 'Theft Case', 'Raj', 'Money worth 50 lakhs has been stolen from house when everyone in family had gone out of town for vacation. The back window was broken and the condition of the house is not in good state.', '2020-02-08 09:29:03', '3rd floor city light', 'kiran', '7894561230', 'Abay saw him stealing money and away', '111.png', '24367VID-20181107-WA0005.mp4', 'Complaint taken to investigation', 'Active'),
(21, 240, 2, 3, 'test', 'sdfsdf', 'xcvx', '2020-02-15 10:07:44', '3rd floor, city light building', 'w', '0821772796', 'xcvxcv', '27018Desert.jpg', '11259', 'terec', 'Active'),
(23, 240, 1, 1, '', 'Raj shekar', 'Murder case search victim', '2020-08-27 10:03:00', '3rd floor', 'Mahesh', '974563210', 'No evidence', '19043anand.jpg', '1632', '', 'Active'),
(41, 239, 2, 2, 'msc sdkm', 'cskdscnk', 'sjcnsjc', '2022-12-06 15:01:16', 'kxnwklcnwklc', 'farhan', '8324', 'dcjb dsj', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cop`
--

CREATE TABLE `cop` (
  `cop_id` int(10) NOT NULL,
  `cop_name` varchar(50) NOT NULL,
  `substation_id` int(10) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `cop_pofile` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cop`
--

INSERT INTO `cop` (`cop_id`, `cop_name`, `substation_id`, `designation_id`, `img`, `cop_pofile`, `gender`, `contact_no`, `email_id`, `login_id`, `password`, `status`) VALUES
(3, 'Raja', 239, 3, '15530Facts-That-You-Must-Know-About-Ashok-Kamte.jpg', 'This is test cop profile details', 'Male', '7894561112', 'raj@gmail.com', 'rajshekar', '123456789', 'Active'),
(4, 'Anand', 239, 3, '249560707Naruto and Hinata Memories under Genjutsu - YouTube 9-24-2020 7-54-11 AM.png', 'Hello this is test profile', 'Male', '7894561230', 'anand@gmail.com', 'anand', '123456789', 'Active'),
(5, 'Admin', 240, 1, '15756073451.png', 'Daya Nayak is an Indian police inspector with the Mumbai police. He joined Mumbai police - then known as Bombay - in 1995, and rose to fame as an encounter-specialist in the late 1990s. As a member of the Detection Unit, he gunned down more than 80 gangsters of the Mumbai underworld.', 'Male', '7821772782', 'daya@gmail.com', 'daya', 'daya123', 'Active'),
(7, 'Santosh hedge', 241, 3, '24584inspector.jpg', 'Indian Police Inspector who served in the Delhi Police, Special Cell. Santosh hedgewas a much-decorated police officer. He was awarded the Highest Gallantry Medal \"Ashoka Chakra\" on 26 January 2009. ', 'Male', '9855464512', 'santhoshkehegde@gmail.com', 'santhoshhedge', '123456789', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(10) NOT NULL,
  `designation_type` varchar(50) NOT NULL,
  `designation_details` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_type`, `designation_details`, `status`) VALUES
(1, 'Administrator', '', 'Active'),
(3, 'Cop', 'Main Inspector', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE `fir` (
  `fir_id` int(10) NOT NULL,
  `complaint_id` int(10) NOT NULL,
  `case_id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `complaint_type` varchar(50) NOT NULL,
  `fir_regdate` date NOT NULL,
  `fir_detail` text NOT NULL,
  `fir_start_date` date NOT NULL,
  `fir_end_date` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fir`
--

INSERT INTO `fir` (`fir_id`, `complaint_id`, `case_id`, `section`, `complaint_type`, `fir_regdate`, `fir_detail`, `fir_start_date`, `fir_end_date`, `status`) VALUES
(3, 21, 21, 'Section 289', 'SEction 138', '2020-11-28', '<p>Complaint Registered under civil Act</p>', '2020-01-01', '2021-01-01', 'Completed'),
(4, 23, 19, 'section 12', 'Hello', '2021-12-31', '<p>This file is for fir</p>', '2020-08-20', '2020-09-06', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `legalcase`
--

CREATE TABLE `legalcase` (
  `legalcase_id` int(10) NOT NULL,
  `case_id` int(10) NOT NULL,
  `prisoner_id` int(10) NOT NULL,
  `case_file_no` varchar(25) NOT NULL,
  `legalcasetitle` varchar(100) NOT NULL,
  `legalcasedetails` text NOT NULL,
  `dateofhearing` datetime NOT NULL,
  `legalcasereport` text NOT NULL,
  `legalcasedoc` varchar(100) NOT NULL,
  `legalcasestatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legalcase`
--

INSERT INTO `legalcase` (`legalcase_id`, `case_id`, `prisoner_id`, `case_file_no`, `legalcasetitle`, `legalcasedetails`, `dateofhearing`, `legalcasereport`, `legalcasedoc`, `legalcasestatus`) VALUES
(18, 19, 15, '22222222222222', 'bbbbbbbbbbbb', '<p>dfs</p>', '2020-08-21 00:00:00', '<p>aaaa</p>', '163068604Completed Tasks.txt', 'Under Proces'),
(20, 19, 17, '44444444444', 'ddddddddd', '<p>test</p>', '2020-08-27 00:00:00', '<p><em>abc</em></p>', '1823490204Completed Tasks.txt', 'Closed'),
(22, 19, 12, '9999999999', 'yyyyyyyyyy', '<p>dvbb</p>', '2020-08-27 00:00:00', '<p>et</p>', '793840135Completed Tasks.txt', 'Adjourned'),
(23, 21, 12, '123', 'Prisoner claimed he has not done any crime', '<p>Prisoner claimed he has not done any crime with evidence</p>', '2020-08-28 00:00:00', '<p>The evidenses are fake confirm after verification</p>', '98432970Technopulse.ppsx', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `prisoner`
--

CREATE TABLE `prisoner` (
  `prisoner_id` int(10) NOT NULL,
  `prisonername` varchar(50) NOT NULL,
  `section` varchar(100) NOT NULL,
  `crimedetails` text NOT NULL,
  `prisoneraddress` text NOT NULL,
  `prisonerimg` varchar(100) NOT NULL,
  `prisinerdocument` varchar(100) NOT NULL,
  `anynote` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prisoner`
--

INSERT INTO `prisoner` (`prisoner_id`, `prisonername`, `section`, `crimedetails`, `prisoneraddress`, `prisonerimg`, `prisinerdocument`, `anynote`, `status`) VALUES
(12, 'Raj kiran', 'section123', 'This is test record', '3rd floor, ctiy light', '1.png', '151.pdf', 'This  test record for student', 'Active'),
(15, 'Akash', 'Section38', 'This is stest record', '3rd floor, city ligtjh', '2.png', '152.png', 'Hello hwo are you', 'Active'),
(17, 'Raj kiran', 'S8392', 'Hit and run case', '3rd floor, city light building,\r\nMangalore', '3.png', '153.png', 'The person cought with cctv evidence', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_id`, `state`, `description`, `status`) VALUES
(1, 'Kerala', 'KERALA POLICE DIVISION', 'Active'),
(2, 'Karnataka', 'Karnataka state record    ', 'Active'),
(4, 'Goa', ' goa police station', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `substation`
--

CREATE TABLE `substation` (
  `substation_id` int(10) NOT NULL,
  `substation_name` varchar(100) NOT NULL,
  `station_id` int(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `substation_addresss` text NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `substation`
--

INSERT INTO `substation` (`substation_id`, `substation_name`, `station_id`, `city`, `substation_addresss`, `contact_no`, `img`, `description`, `status`) VALUES
(239, 'punjalakatte station', 2, 'punjalakatte', 'punjalakatte  station, bantwal', '8975643758', '', 'city station', 'Active'),
(240, 'Kochin Central Police', 1, 'kochi', 'Old Railway Station Road, \r\nNear High Ct Rd', '0484 239 4500', 'download.jpg', 'The Central Control Room is the major co-ordinating center that co-ordinates the entire movements of police', 'Active'),
(241, 'dk station', 2, 'Bengaluru', 'punjalakatte', '984535670', '', 'punjalakatte police', 'Active'),
(244, 'panjim division', 4, 'panjim', 'near ferry', '982', '', 'huguygugubjbjbuy', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casefile`
--
ALTER TABLE `casefile`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `complainer`
--
ALTER TABLE `complainer`
  ADD PRIMARY KEY (`complainer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `station_id` (`station_id`),
  ADD KEY `substation_id` (`substation_id`),
  ADD KEY `complainer_id` (`complainer_id`);

--
-- Indexes for table `cop`
--
ALTER TABLE `cop`
  ADD PRIMARY KEY (`cop_id`),
  ADD KEY `designation_id` (`designation_id`),
  ADD KEY `cop_ibfk_3` (`substation_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `fir`
--
ALTER TABLE `fir`
  ADD PRIMARY KEY (`fir_id`),
  ADD KEY `complaint_id` (`complaint_id`),
  ADD KEY `case_id` (`case_id`);

--
-- Indexes for table `legalcase`
--
ALTER TABLE `legalcase`
  ADD PRIMARY KEY (`legalcase_id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `prisoner_id` (`prisoner_id`);

--
-- Indexes for table `prisoner`
--
ALTER TABLE `prisoner`
  ADD PRIMARY KEY (`prisoner_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `substation`
--
ALTER TABLE `substation`
  ADD PRIMARY KEY (`substation_id`),
  ADD KEY `station_id` (`station_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `casefile`
--
ALTER TABLE `casefile`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `complainer`
--
ALTER TABLE `complainer`
  MODIFY `complainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cop`
--
ALTER TABLE `cop`
  MODIFY `cop_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fir`
--
ALTER TABLE `fir`
  MODIFY `fir_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `legalcase`
--
ALTER TABLE `legalcase`
  MODIFY `legalcase_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `prisoner`
--
ALTER TABLE `prisoner`
  MODIFY `prisoner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `substation`
--
ALTER TABLE `substation`
  MODIFY `substation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `station` (`station_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`complainer_id`) REFERENCES `complainer` (`complainer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complaint_ibfk_4` FOREIGN KEY (`substation_id`) REFERENCES `substation` (`substation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cop`
--
ALTER TABLE `cop`
  ADD CONSTRAINT `cop_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cop_ibfk_2` FOREIGN KEY (`substation_id`) REFERENCES `substation` (`substation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fir`
--
ALTER TABLE `fir`
  ADD CONSTRAINT `fir_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fir_ibfk_2` FOREIGN KEY (`case_id`) REFERENCES `casefile` (`case_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `legalcase`
--
ALTER TABLE `legalcase`
  ADD CONSTRAINT `legalcase_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `casefile` (`case_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `legalcase_ibfk_2` FOREIGN KEY (`prisoner_id`) REFERENCES `prisoner` (`prisoner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `substation`
--
ALTER TABLE `substation`
  ADD CONSTRAINT `substation_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `station` (`station_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
