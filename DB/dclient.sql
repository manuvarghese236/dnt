-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2018 at 11:46 AM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.12-3+ubuntu17.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dclient`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `date_time`) VALUES
(1, 'Arjun', 'arjunkn.95', 12233);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `ID` int(11) NOT NULL,
  `Doc_id` int(11) NOT NULL,
  `d1` tinyint(1) NOT NULL,
  `s1` int(11) NOT NULL,
  `d2` tinyint(1) NOT NULL,
  `s2` int(11) NOT NULL,
  `d3` tinyint(1) NOT NULL,
  `s3` int(11) NOT NULL,
  `d4` tinyint(1) NOT NULL,
  `s4` int(11) NOT NULL,
  `d5` tinyint(1) NOT NULL,
  `s5` int(11) NOT NULL,
  `d6` tinyint(1) NOT NULL,
  `s6` int(11) NOT NULL,
  `d7` tinyint(1) NOT NULL,
  `s7` int(11) NOT NULL,
  `dall` tinyint(1) NOT NULL,
  `sall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`ID`, `Doc_id`, `d1`, `s1`, `d2`, `s2`, `d3`, `s3`, `d4`, `s4`, `d5`, `s5`, `d6`, `s6`, `d7`, `s7`, `dall`, `sall`) VALUES
(2, 1, 1, 1, 1, 1, 1, 2, 1, 3, 1, 1, 1, 1, 0, 1, 0, 1),
(3, 4, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(4, 4, 1, 1, 1, 1, 1, 1, 0, 1, 1, 2, 0, 1, 0, 1, 0, 1),
(5, 4, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(6, 4, 1, 1, 1, 2, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(7, 5, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1),
(8, 5, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1),
(9, 5, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(10, 5, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(11, 6, 1, 1, 1, 1, 1, 2, 1, 3, 1, 3, 0, 2, 0, 1, 1, 1),
(12, 7, 0, 1, 1, 2, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `backend_user`
--

CREATE TABLE `backend_user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `MasterID` int(11) NOT NULL,
  `authKey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backend_user`
--

INSERT INTO `backend_user` (`ID`, `Username`, `Password`, `UserTypeID`, `Status`, `MasterID`, `authKey`) VALUES
(2, 'admin', 'admin', 1, 1, 1, ''),
(3, 'arjun', '1234', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `bill_no` int(100) NOT NULL,
  `date` date NOT NULL,
  `amount` int(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `bill_no`, `date`, `amount`, `status`) VALUES
(1, 100, '2018-01-06', 100, 2),
(2, 0, '2018-01-06', 3450, 1),
(3, 0, '2018-01-06', 2400, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bill_status`
--

CREATE TABLE `bill_status` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_status`
--

INSERT INTO `bill_status` (`id`, `name`) VALUES
(1, 'Paid'),
(2, 'Not Paid'),
(4, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patients_id` int(11) NOT NULL,
  `datetime_start` datetime NOT NULL,
  `datetime_end` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `diseases_description` text NOT NULL,
  `time` time NOT NULL,
  `time_hour` int(11) NOT NULL,
  `time_minute` int(11) NOT NULL,
  `time_session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `doctors_id`, `date`, `patients_id`, `datetime_start`, `datetime_end`, `status_id`, `diseases_description`, `time`, `time_hour`, `time_minute`, `time_session`) VALUES
(1, 1, '2017-05-17', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '111', '00:00:00', 3, 4, 1),
(2, 6, '2017-05-08', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'cxvxcv', '00:00:00', 1, 3, 2),
(3, 7, '2017-05-22', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'zzzz', '00:00:00', 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daysession`
--

CREATE TABLE `daysession` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daysession`
--

INSERT INTO `daysession` (`id`, `name`) VALUES
(1, 'All Day'),
(2, 'Forenoon'),
(3, 'AfterNoon');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `specialization_id` int(100) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `mobile`, `email`, `clinic_id`, `specialization_id`, `qualification`, `rating`) VALUES
(1, 'MNanbu', '1111', 111, 111, 17, '1', 1),
(4, '222', '222', 222, 222, 2, '22', 0),
(5, 'www', 'www', 0, 1, 2, '111', 0),
(6, 'Amal Ks', '111', 111, 1, 2, '111', 0),
(7, 'Madhav', '9785412314', 0, 12, 4, 'cxxxc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosage`
--

CREATE TABLE `dosage` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosage`
--

INSERT INTO `dosage` (`id`, `name`, `medicine_id`, `unit`) VALUES
(1, '500', 1, 'mg'),
(3, '650', 2, 'mg');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`) VALUES
(1, 'Paracetamol'),
(2, 'Dolo');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `Sex` int(11) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `phone`, `email`, `address`, `Sex`, `dob`, `blood_group`) VALUES
(1, 'Manu Varghese', '9447506367', 'manu@gmail.com', 'Manu Varghese, Arakkathadathil House, Edakkattuavayal PO, Arakkunnam, PIN 692313', 1, '0000-00-00', 1),
(2, 'Amal K.S', '9876543210', 'manu.varghese236@gmail.com', 'My Names\r\naferewgf', 2, '0000-00-00', 1),
(3, 'Haritha KT', '1111', '111', '111', 2, '0000-00-00', 1),
(4, 'Amarhgtrh', '21432', '243', '24324', 1, '0000-00-00', 1),
(5, 'rhr5yj', 'rtjytr', 'rtyjyu', 'ky6uktyl', 1, '2017-05-01', 1),
(6, 'Ebin ', '9876543210', 'ebin@gmail.com', 'weg4rtuh6r', 2, '2017-05-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_no` int(100) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_no`, `date`, `status`, `bill_id`, `amount`, `remarks`) VALUES
(1, 0, '2018-01-05', 1, 1, 1002, ''),
(2, 0, '2018-01-05', 1, 1, 10, ''),
(3, 0, '2018-01-05', 1, 1, -912, 'asfds');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `dosage_id` int(11) NOT NULL,
  `freequency` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `nos` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `medicine_id`, `doc_id`, `dosage_id`, `freequency`, `duration`, `nos`, `notes`, `patient_id`, `date`) VALUES
(1, 1, 6, 1, '2 Times', '3 Days', 3, 'asda', 1, '2018-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE `sex` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `name`) VALUES
(2, 'Pediatric Dentist'),
(3, 'Endodontist'),
(4, 'Orthodontist'),
(5, 'Periodontist'),
(6, 'Prosthodontist'),
(7, 'manu'),
(8, 'Manu xvtest'),
(9, 'News'),
(10, 'Amla'),
(14, 'etery6r'),
(15, 'ddddd'),
(16, 'edhrruj5e'),
(17, 'fgjk'),
(18, 'Eeeeee'),
(19, 'wwwww'),
(20, 'ergrth'),
(21, 'sfrtg');

-- --------------------------------------------------------

--
-- Table structure for table `time_session`
--

CREATE TABLE `time_session` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_session`
--

INSERT INTO `time_session` (`id`, `name`) VALUES
(1, 'Morning'),
(2, 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `cost` int(100) NOT NULL,
  `dicsount` int(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `type_id`, `doc_id`, `patient_id`, `bill_id`, `notes`, `cost`, `dicsount`, `status`, `date`) VALUES
(1, 1, 7, 3, 2, '', 3700, 250, 1, '2018-01-06'),
(2, 2, 5, 1, 0, '', 2500, 100, 2, '2018-01-06'),
(3, 2, 5, 1, 3, '', 2500, 100, 2, '2018-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_status`
--

CREATE TABLE `treatment_status` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_status`
--

INSERT INTO `treatment_status` (`id`, `name`) VALUES
(1, 'Completed'),
(2, 'Processing'),
(3, 'Cancelled'),
(4, '');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_type`
--

CREATE TABLE `treatment_type` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cost` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_type`
--

INSERT INTO `treatment_type` (`id`, `name`, `cost`) VALUES
(1, 'Root Canal', 3700),
(2, 'Filling', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL COMMENT 'User Type',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`ID`, `Name`, `status`) VALUES
(1, 'SuperAdmin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Doc_id` (`Doc_id`);

--
-- Indexes for table `backend_user`
--
ALTER TABLE `backend_user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `UserTypeID` (`UserTypeID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_status`
--
ALTER TABLE `bill_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daysession`
--
ALTER TABLE `daysession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosage`
--
ALTER TABLE `dosage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sex` (`Sex`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment_status`
--
ALTER TABLE `treatment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment_type`
--
ALTER TABLE `treatment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `backend_user`
--
ALTER TABLE `backend_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `daysession`
--
ALTER TABLE `daysession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dosage`
--
ALTER TABLE `dosage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sex`
--
ALTER TABLE `sex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `treatment_status`
--
ALTER TABLE `treatment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `treatment_type`
--
ALTER TABLE `treatment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`Doc_id`) REFERENCES `doctor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `backend_user`
--
ALTER TABLE `backend_user`
  ADD CONSTRAINT `backend_user_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `usertypes` (`ID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Sex`) REFERENCES `sex` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
