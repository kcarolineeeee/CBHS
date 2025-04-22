-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Firstname` varchar(150) NOT NULL,
  `Middlename` varchar(255) NOT NULL,
  `Lastname` varchar(150) NOT NULL,
  `Extension` varchar(15) NOT NULL,
  `Birthdate` date NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ContactNum` varchar(15) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Firstname`, `Middlename`, `Lastname`, `Extension`, `Birthdate`, `Sex`, `Email`, `ContactNum`, `Address`, `Position`, `Password`) VALUES
(1, 'Lena', '', 'Luthor', '', '1998-02-18', 'Female', 'lenaluthor@gmail.com', '09999999999', 'sdasd', 'Admin', '$2y$10$336me12R3qrSEm7BfImnqe2o9XqCVrP/Tntdiuz/zJHjsqYw.W0Ge');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `ClinicID` int(11) NOT NULL,
  `DocID` int(11) DEFAULT NULL,
  `ClinicName` varchar(100) DEFAULT NULL,
  `ClinicAddress` varchar(255) DEFAULT NULL,
  `ClinicContact` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DocID` int(11) NOT NULL,
  `Firstname` varchar(150) NOT NULL,
  `Middlename` varchar(255) DEFAULT NULL,
  `Lastname` varchar(150) NOT NULL,
  `Extension` varchar(15) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `ContactNum` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `LicenseNum` varchar(50) DEFAULT NULL,
  `Specialization` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DocID`, `Firstname`, `Middlename`, `Lastname`, `Extension`, `Birthdate`, `Sex`, `Email`, `ContactNum`, `Address`, `LicenseNum`, `Specialization`, `Password`) VALUES
(4, 'Anna Beri', '', 'Bisnan', '', '2004-06-18', 'Female', 'annabisnan@gmailc.com', '09633539673', 'dfsdgsdgdsg', '20225667', 'Gynecologist', '$2y$10$UmyPUb.bawXdyWJaWfJ4Tej4XvOd8/roYLVOAbbPVXcc1jaStGbpa'),
(5, 'Lena', '', 'Luthor', '', '1997-02-14', 'Female', 'annabisnan@gmailc.com', '0945454545', 'dfsdgsdgdsg', '4654654564564', 'Surgeon', '$2y$10$MtvXve9wslCK3LLJeWUzNOXPyd9PLgL5J0eczymmZ5vsDapNOrB9m'),
(6, 'Karla', '', 'Bisnan', '', '2005-01-11', 'Female', 'karlabisnan@gmail.com', '09633539673', '#17 Avelino St. Brgy. Andres Bonifacio', '20233645', 'Gynecologist', '$2y$10$K8KMXxVOGxvFDn7vEeba4uKHDgaAY2ukUVus43D3H4MrqFUGtml5y');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_experience`
--

CREATE TABLE `doctor_experience` (
  `ExperienceID` int(11) NOT NULL,
  `DocID` int(11) DEFAULT NULL,
  `CompanyName` varchar(100) DEFAULT NULL,
  `YearStarted` int(11) DEFAULT NULL,
  `YearEnded` int(11) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_experience`
--

INSERT INTO `doctor_experience` (`ExperienceID`, `DocID`, `CompanyName`, `YearStarted`, `YearEnded`, `Position`) VALUES
(1, 5, 'LCorp', 2019, 2023, 'CEO'),
(2, 6, 'gfhj', 2015, 2025, 'Gynecologist');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `SentBy` enum('Patient','Doctor') NOT NULL,
  `DateSent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `PatientID`, `DoctorID`, `MessageText`, `SentBy`, `DateSent`) VALUES
(5, 8, 5, 'hi', 'Patient', '2025-04-21 15:35:50'),
(6, 8, 5, 'hello', 'Patient', '2025-04-21 15:37:54'),
(7, 8, 5, 'can we talk', 'Patient', '2025-04-21 15:38:00'),
(8, 8, 4, 'Hi', 'Patient', '2025-04-21 15:41:00'),
(9, 8, 4, 'Hello', 'Patient', '2025-04-21 15:41:04'),
(10, 8, 6, 'Hello', 'Patient', '2025-04-21 15:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` int(11) NOT NULL,
  `Firstname` varchar(150) NOT NULL,
  `Middlename` varchar(255) DEFAULT NULL,
  `Lastname` varchar(150) NOT NULL,
  `Extension` varchar(15) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `ContactNum` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `Firstname`, `Middlename`, `Lastname`, `Extension`, `Birthdate`, `Sex`, `Email`, `ContactNum`, `Address`, `Password`) VALUES
(2, 'Anna Beri', '', 'Bisnan', '', '2004-06-18', 'Female', 'annabisnan@gmail.com', '0945454545', 'dfsdgsdgdsg', '$2y$10$cQQu/BIiVTxijxZhHIjXA.jY0IjaTCIuKSWD6SxI4vzDzq/.dXx.u'),
(3, 'Jianne', 'Gonzales', 'Mangay-ayam', '', '2003-06-06', 'Female', '20234780@s.ubaguio.edu', '09999999999', 'dsada', '$2y$10$7FId8LNYIRZZ15XS8ovXseaMQh0ynuqGf8Uh..mIknfTEjX5xsPQu'),
(4, 'Nicole', 'Abilgos', 'Atienza', '', '2000-05-05', 'Female', '20232903@s.ubaguio.edu', '09999999999', 'sdasdasd', '$2y$10$mnLWYjOj3wRgYYuk88g7AOZne3acOr.MO0dOwlotg0WIq4dXBkG..'),
(6, 'Karla', '', 'Bisnan', '', '2005-11-10', 'Female', 'kakjsdja@gmail.com', '09633539673', '#17 Avelino St. Brgy. Andres Bonifacio', '$2y$10$xfUNo.5qozzQcFk0EPNDoObPoyH.p311094l46lrHlhmMVb6wlH0.'),
(7, 'Stephen Ezekiel', '', 'Robles', '', '2000-05-01', 'Male', '20161521@s.ubaguio.edu', '047862148795624', 'dsadsad', '$2y$10$n1l5ioqBn0GNs2c/4q1cu.TYaPAF8fdXaPu7Rs8GbV7KopFroqWka'),
(8, 'Clyde', '', 'Timoteo', '', '2000-01-01', 'Male', '20238348@s.ubaguio.edu', '04541257878', 'dfsfsdfsdf', '$2y$10$MWmrn14FI0bIGIpJjilpgOkhl6BCA2ivr1zKfLD/3Tcpz3c0b1cWa');

-- --------------------------------------------------------

--
-- Table structure for table `patient_appointment`
--

CREATE TABLE `patient_appointment` (
  `AppointmentID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `AppointmentDate` datetime DEFAULT NULL,
  `AppointmentStatus` varchar(50) DEFAULT 'Pending',
  `ConsultationType` varchar(50) DEFAULT 'Telehealth',
  `ReasonForVisit` text DEFAULT NULL,
  `DoctorAssigned` int(11) DEFAULT NULL,
  `ApprovalDate` datetime DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_appointment`
--

INSERT INTO `patient_appointment` (`AppointmentID`, `PatientID`, `AppointmentDate`, `AppointmentStatus`, `ConsultationType`, `ReasonForVisit`, `DoctorAssigned`, `ApprovalDate`, `CreatedAt`, `UpdatedAt`, `Message`) VALUES
(4, 8, '2025-05-01 10:00:00', 'Confirmed', 'Telehealth', 'dfmkmk', 5, NULL, '2025-04-20 15:26:34', '2025-04-20 15:37:52', 'mkm\r\n'),
(5, 8, '2025-05-05 10:00:00', 'Confirmed', 'Telehealth', 'dfds', 5, NULL, '2025-04-21 15:08:26', '2025-04-21 15:08:47', 'dfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `patient_med_history`
--

CREATE TABLE `patient_med_history` (
  `HistoryID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `HeartAttack` tinyint(1) DEFAULT NULL,
  `HeartDisease` tinyint(1) DEFAULT NULL,
  `HeartDiseaseType` varchar(255) DEFAULT NULL,
  `HighBloodPressure` tinyint(1) DEFAULT NULL,
  `HighCholesterol` tinyint(1) DEFAULT NULL,
  `Stroke` tinyint(1) DEFAULT NULL,
  `Diabetes` tinyint(1) DEFAULT NULL,
  `Asthma` tinyint(1) DEFAULT NULL,
  `LungDisease` tinyint(1) DEFAULT NULL,
  `LungDiseaseType` varchar(255) DEFAULT NULL,
  `Osteoporosis` tinyint(1) DEFAULT NULL,
  `Arthritis` tinyint(1) DEFAULT NULL,
  `Cancer` tinyint(1) DEFAULT NULL,
  `CancerType` varchar(255) DEFAULT NULL,
  `MentalIllness` tinyint(1) DEFAULT NULL,
  `Depression` tinyint(1) DEFAULT NULL,
  `Anxiety` tinyint(1) DEFAULT NULL,
  `OtherMentalConditions` varchar(255) DEFAULT NULL,
  `OtherConditions` varchar(255) DEFAULT NULL,
  `FH_HeartDisease` tinyint(1) DEFAULT NULL,
  `FH_HeartDiseaseType` varchar(255) DEFAULT NULL,
  `FH_Stroke` tinyint(1) DEFAULT NULL,
  `FH_Diabetes` tinyint(1) DEFAULT NULL,
  `FH_Cancer` tinyint(1) DEFAULT NULL,
  `FH_OtherConditions` varchar(255) DEFAULT NULL,
  `SmokingStatus` tinyint(1) DEFAULT NULL,
  `AlcoholUse` tinyint(1) DEFAULT NULL,
  `PhysicalActivityLevel` varchar(100) DEFAULT NULL,
  `Medications` varchar(1000) DEFAULT NULL,
  `Allergies` varchar(1000) DEFAULT NULL,
  `Surgeries` varchar(1000) DEFAULT NULL,
  `LastUpdated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_med_history`
--

INSERT INTO `patient_med_history` (`HistoryID`, `PatientID`, `HeartAttack`, `HeartDisease`, `HeartDiseaseType`, `HighBloodPressure`, `HighCholesterol`, `Stroke`, `Diabetes`, `Asthma`, `LungDisease`, `LungDiseaseType`, `Osteoporosis`, `Arthritis`, `Cancer`, `CancerType`, `MentalIllness`, `Depression`, `Anxiety`, `OtherMentalConditions`, `OtherConditions`, `FH_HeartDisease`, `FH_HeartDiseaseType`, `FH_Stroke`, `FH_Diabetes`, `FH_Cancer`, `FH_OtherConditions`, `SmokingStatus`, `AlcoholUse`, `PhysicalActivityLevel`, `Medications`, `Allergies`, `Surgeries`, `LastUpdated`) VALUES
(1, 8, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '', 1, 1, 0, '', '', 0, 'N/A', 0, 0, 0, 'N/A', 0, 0, 'N/A', 'N/A', 'N/A', 'N/A', '2025-04-20 21:46:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`ClinicID`),
  ADD KEY `DocID` (`DocID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DocID`);

--
-- Indexes for table `doctor_experience`
--
ALTER TABLE `doctor_experience`
  ADD PRIMARY KEY (`ExperienceID`),
  ADD KEY `DocID` (`DocID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DoctorAssigned` (`DoctorAssigned`);

--
-- Indexes for table `patient_med_history`
--
ALTER TABLE `patient_med_history`
  ADD PRIMARY KEY (`HistoryID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `ClinicID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DocID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor_experience`
--
ALTER TABLE `doctor_experience`
  MODIFY `ExperienceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_med_history`
--
ALTER TABLE `patient_med_history`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinics`
--
ALTER TABLE `clinics`
  ADD CONSTRAINT `clinics_ibfk_1` FOREIGN KEY (`DocID`) REFERENCES `doctor` (`DocID`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_experience`
--
ALTER TABLE `doctor_experience`
  ADD CONSTRAINT `doctor_experience_ibfk_1` FOREIGN KEY (`DocID`) REFERENCES `doctor` (`DocID`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DocID`);

--
-- Constraints for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  ADD CONSTRAINT `patient_appointment_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`),
  ADD CONSTRAINT `patient_appointment_ibfk_2` FOREIGN KEY (`DoctorAssigned`) REFERENCES `doctor` (`DocID`);

--
-- Constraints for table `patient_med_history`
--
ALTER TABLE `patient_med_history`
  ADD CONSTRAINT `patient_med_history_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
