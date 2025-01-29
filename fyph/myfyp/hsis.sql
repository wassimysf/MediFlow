-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2023 at 11:25 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
CREATE TABLE IF NOT EXISTS `billing` (
  `billing_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int DEFAULT NULL,
  `patient_name` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `patient_coverage` enum('a','b','d','e','f') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `billing_type` enum('X-Ray','CT Scan','MRI','Blood Test','Covid 19 Test') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price_needed` float DEFAULT NULL,
  PRIMARY KEY (`billing_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_id`, `patient_id`, `patient_name`, `patient_coverage`, `billing_type`, `price_needed`) VALUES
(1, 1, 'Wassim Youssef', 'a', 'X-Ray', 150.00),
(2, 1, 'Wassim Youssef', 'd', 'MRI', 1200.00),
(3, 2, 'Sarah Haddad', 'b', 'CT Scan', 900.00),
(4, 3, 'Ali Mansour', 'e', 'Blood Test', 80.00),
(5, 4, 'Nour Fakih', 'f', 'Covid 19 Test', 50.00),
(6, 5, 'Hassan Khalil', 'a', 'MRI', 1300.00),
(7, 6, 'Layla Hamdan', NULL, 'X-Ray', 200.00),
(8, 7, 'Rami Darwish', 'b', 'Blood Test', 90.00),
(9, 8, 'Jad Salameh', 'e', 'CT Scan', 850.00),
(10, 9, 'Maya Ghanem', 'f', 'Covid 19 Test', 55.00);


-- --------------------------------------------------------

--
-- Table structure for table `covid`
--

DROP TABLE IF EXISTS `covid`;
CREATE TABLE IF NOT EXISTS `covid` (
  `covid_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int DEFAULT NULL,
  `patient_name` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `test_result` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `test_type` enum('PCR','Antigen','Antibody') COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`covid_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `covid`
--

INSERT INTO `covid` (`covid_id`, `patient_id`, `patient_name`, `test_date`, `test_result`, `test_type`) VALUES
(1, 1, 'Wassim Youssef', '2024-01-15', 'Negative', 'PCR'),
(2, 2, 'Sarah Haddad', '2024-01-10', 'Positive', 'Antigen'),
(3, 3, 'Ali Mansour', '2024-01-08', 'Negative', 'Antibody'),
(4, 4, 'Nour Fakih', '2024-01-18', 'Positive', 'PCR'),
(5, 5, 'Hassan Khalil', '2024-01-20', 'Negative', 'Antigen'),
(6, 6, 'Layla Hamdan', '2024-01-22', 'Positive', 'PCR'),
(7, 7, 'Rami Darwish', '2024-01-25', 'Negative', 'Antibody'),
(8, 8, 'Jad Salameh', '2024-01-27', 'Positive', 'PCR'),
(9, 9, 'Maya Ghanem', '2024-01-29', 'Negative', 'Antigen'),
(10, 10, 'Omar Zain', '2024-02-01', 'Positive', 'PCR');


-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

DROP TABLE IF EXISTS `laboratory`;
CREATE TABLE IF NOT EXISTS `laboratory` (
  `laboratory_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int DEFAULT NULL,
  `name` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wbc` float DEFAULT NULL,
  `rbc` float DEFAULT NULL,
  `hgb` float DEFAULT NULL,
  `plt` float DEFAULT NULL,
  `alt_result` float DEFAULT NULL,
  `ast_result` float DEFAULT NULL,
  `alp_result` float DEFAULT NULL,
  `tbil_result` float DEFAULT NULL,
  `bun_result` float DEFAULT NULL,
  `crea_result` float DEFAULT NULL,
  `ua_result` float DEFAULT NULL,
  PRIMARY KEY (`laboratory_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`laboratory_id`, `patient_id`, `name`, `age`, `gender`, `wbc`, `rbc`, `hgb`, `plt`, `alt_result`, `ast_result`, `alp_result`, `tbil_result`, `bun_result`, `crea_result`, `ua_result`) VALUES
(1, 1, 'Mohammed Akl', 30, 'M', 6.2, 4.8, 14.1, 250, 40, 32, 65, 0.9, 12, 1.1, 4.5),
(2, 2, 'Sarah Haddad', 25, 'F', 7.1, 4.5, 13.5, 230, 38, 28, 60, 0.8, 10, 0.9, 3.9),
(3, 3, 'Ali Mansour', 45, 'M', 5.8, 4.9, 15.2, 270, 42, 35, 75, 1.1, 14, 1.2, 5.0),
(4, 4, 'Nour Fakih', 33, 'F', 6.5, 4.6, 12.9, 210, 36, 29, 55, 0.7, 9, 0.8, 3.5),
(5, 5, 'Hassan Khalil', 50, 'M', 5.0, 5.1, 14.8, 290, 50, 40, 80, 1.3, 15, 1.4, 5.5),
(6, 6, 'Layla Hamdan', 28, 'F', 6.9, 4.4, 12.7, 220, 34, 27, 58, 0.6, 8, 0.7, 3.2),
(7, 7, 'Rami Darwish', 40, 'M', 5.3, 5.0, 15.0, 260, 45, 38, 72, 1.0, 13, 1.3, 4.8),
(8, 8, 'Jad Salameh', 37, 'M', 6.0, 4.7, 13.8, 240, 39, 31, 67, 0.9, 11, 1.0, 4.1),
(9, 9, 'Maya Ghanem', 29, 'F', 6.7, 4.3, 12.5, 215, 33, 26, 54, 0.6, 7, 0.6, 3.0),
(10, 10, 'Omar Zain', 52, 'M', 5.5, 5.2, 15.5, 280, 48, 42, 78, 1.2, 16, 1.5, 5.8);

-- --------------------------------------------------------

--
-- Table structure for table `patientaccount`
--

DROP TABLE IF EXISTS `patientaccount`;
CREATE TABLE IF NOT EXISTS `patientaccount` (
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientaccount`
--

INSERT INTO `patientaccount` (`username`, `password`, `patient_id`, `deleted`) VALUES
('wassim_youssef', 'securePass123', 1, 0),
('sarah_haddad', 'sarahPass456', 2, 0),
('ali_mansour', 'aliM@987', 3, 0),
('nour_fakih', 'nourF123', 4, 0),
('hassan_khalil', 'hkPass789', 5, 0),
('layla_hamdan', 'laylaH!456', 6, 0),
('rami_darwish', 'ramiDPass', 7, 0),
('jad_salameh', 'jadS#123', 8, 0),
('maya_ghanem', 'mayaG789', 9, 0),
('omar_zain', 'omarZ!pass', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blood_type` enum('AB+','AB-','A+','A-','B+','B-','O+','0-') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `coverage_info` enum('a','b','d','e','f') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `allergies` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `medications` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `medical_history` text COLLATE utf8mb4_general_ci,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `birthdate`, `gender`, `blood_type`, `phone`, `email`, `emergency_contact`, `coverage_info`, `allergies`, `medications`, `medical_history`, `deleted`) VALUES
(1, 'Wassim Youssef', '2002-04-13', 'male', 'A+', '+96171733977', 'wassim@hotmail.com', '+96170012345', 'b', 'Peanuts', 'Ibuprofen', 'No major illnesses', 0),
(2, 'David Luiz', '1990-04-09', 'male', 'AB-', '+96172378290', 'david.luiz@hotmail.com', '+96170123456', 'b', 'None', 'Paracetamol', 'History of migraines', 0),
(3, 'Ahmad Mhmd', '1988-03-10', 'male', 'AB+', '+96176712486', 'ahmad98@hotmail.com', '+96170345678', 'a', 'Pollen', 'Antihistamines', 'Mild asthma', 0),
(4, 'Mohammed Ali', '1995-12-11', 'male', 'A+', '+96176712486', 'mohammedali@gmail.com', '+96176859670', 'a', 'Seafood', 'None', 'No significant medical issues', 0),
(5, 'Layla Hamdan', '1998-07-22', 'female', 'B+', '+96176123456', 'layla.hamdan@gmail.com', '+96170987654', 'd', 'None', 'Vitamin D supplements', 'Previous surgery in 2021', 0),
(6, 'Omar Zain', '2000-01-30', 'male', 'O+', '+96176567890', 'omar.zain@hotmail.com', '+96171999999', 'e', 'Latex', 'Aspirin', 'Heart murmur detected at birth', 0),
(7, 'Maya Ghanem', '1996-05-15', 'female', 'A-', '+96171567891', 'maya.ghanem@hotmail.com', '+96171888888', 'f', 'None', 'None', 'Healthy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `physicianaccount`
--

DROP TABLE IF EXISTS `physicianaccount`;
CREATE TABLE IF NOT EXISTS `physicianaccount` (
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicianaccount`
--

INSERT INTO `physicianaccount` (`username`, `password`) VALUES
('wassim', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `radiology`
--

DROP TABLE IF EXISTS `radiology`;
CREATE TABLE IF NOT EXISTS `radiology` (
  `radiology_id` INT NOT NULL AUTO_INCREMENT,
  `patient_id` INT NOT NULL,
  `test_type` ENUM('X-Ray', 'CT Scan', 'MRI', 'Ultrasound', 'PET Scan') NOT NULL,
  `notes` TEXT COLLATE utf8mb4_general_ci,
  `image_path` VARCHAR(255) DEFAULT NULL,  -- Store file path instead of blob
  `report_path` VARCHAR(255) DEFAULT NULL, -- Store report path instead of blob
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`radiology_id`),
  FOREIGN KEY (`patient_id`) REFERENCES `patients`(`patient_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `radiology`
--

INSERT INTO `radiology` (`patient_id`, `test_type`, `notes`, `image_path`, `report_path`)
VALUES (1, 'CT Scan', 'Brain scan after head trauma', '/uploads/radiology/brain_ct_20240129.jpg', '/uploads/reports/brain_ct_report_20240129.pdf');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `covid`
--
ALTER TABLE `covid`
  ADD CONSTRAINT `covid_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD CONSTRAINT `laboratory_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `patientaccount`
--
ALTER TABLE `patientaccount`
  ADD CONSTRAINT `patientaccount_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `radiology`
--
ALTER TABLE `radiology`
  ADD CONSTRAINT `radiology_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
