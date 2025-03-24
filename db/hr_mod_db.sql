-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 12:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_mod_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acting_info_tbl`
--

CREATE TABLE `acting_info_tbl` (
  `acting_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `date_appt` date NOT NULL,
  `division` varchar(150) NOT NULL,
  `position` varchar(150) NOT NULL,
  `nature_appt` varchar(200) NOT NULL,
  `allowance` varchar(50) NOT NULL,
  `acting_info_status` tinyint(4) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acting_info_tbl`
--

INSERT INTO `acting_info_tbl` (`acting_info_id`, `personal_id`, `date_appt`, `division`, `position`, `nature_appt`, `allowance`, `acting_info_status`, `time_added`) VALUES
(1, 7, '2023-11-02', '12div', 'technician', 'nature appt', '2540', 1, '2023-11-07 14:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `child_info_tbl`
--

CREATE TABLE `child_info_tbl` (
  `child_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `child_name` varchar(200) NOT NULL,
  `child_dob` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_info_tbl`
--

INSERT INTO `child_info_tbl` (`child_info_id`, `personal_id`, `child_name`, `child_dob`, `status`, `time_added`) VALUES
(1, 7, 'dhananji tharuka', '2011-05-24', 1, '2023-09-26 12:59:41'),
(2, 7, 'Isuru Udna', '1999-01-25', 1, '2023-09-26 22:22:50'),
(3, 7, 'Thuwan Dewaka', '2019-02-06', 1, '2023-11-06 12:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `designation_tbl`
--

CREATE TABLE `designation_tbl` (
  `designation_id` int(11) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designation_tbl`
--

INSERT INTO `designation_tbl` (`designation_id`, `designation`, `status`, `time_added`) VALUES
(1, 'Secretary', 1, '2023-09-11 10:12:30'),
(2, 'Additional Secretary', 1, '2023-09-11 10:16:51'),
(3, 'Director General (Planing)', 1, '2023-09-11 10:17:09'),
(4, 'Chief of National Intelligence', 1, '2023-09-11 10:17:23'),
(5, 'Director', 1, '2023-09-11 10:17:29'),
(6, 'Chief Accountant', 1, '2023-09-11 10:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `district_tbl`
--

CREATE TABLE `district_tbl` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district_tbl`
--

INSERT INTO `district_tbl` (`district_id`, `district_name`, `time_added`) VALUES
(1, 'Colombo', '2023-09-12 10:36:34'),
(2, 'Gampaha', '2023-09-12 10:36:34'),
(3, 'Kalutara', '2023-09-12 10:36:34'),
(4, 'Kandy', '2023-09-12 10:36:34'),
(5, 'Matale', '2023-09-12 10:36:34'),
(6, 'Nuwara Eliya', '2023-09-12 10:36:34'),
(7, 'Galle', '2023-09-12 10:36:34'),
(8, 'Matara', '2023-09-12 10:36:34'),
(9, 'Hambantota', '2023-09-12 10:36:34'),
(10, 'Jaffna', '2023-09-12 10:36:34'),
(11, 'Kilinochchi', '2023-09-12 10:36:34'),
(12, 'Mannar', '2023-09-12 10:36:34'),
(13, 'Vavuniya', '2023-09-12 10:36:34'),
(14, 'Mullaitivu', '2023-09-12 10:36:34'),
(15, 'Batticaloa', '2023-09-12 10:36:34'),
(16, 'Ampara', '2023-09-12 10:36:34'),
(17, 'Trincomalee', '2023-09-12 10:36:34'),
(18, 'Kurunegala', '2023-09-12 10:36:34'),
(19, 'Puttalam', '2023-09-12 10:36:34'),
(20, 'Anuradhapura', '2023-09-12 10:36:34'),
(21, 'Polonnaruwa', '2023-09-12 10:36:34'),
(22, 'Badulla', '2023-09-12 10:36:34'),
(23, 'Moneragala', '2023-09-12 10:36:34'),
(24, 'Ratnapura', '2023-09-12 10:36:34'),
(25, 'Kegalle', '2023-09-12 10:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `duty_info_tbl`
--

CREATE TABLE `duty_info_tbl` (
  `duty_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `appt_letter_no` varchar(20) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `join_date` date NOT NULL,
  `personal_file_no` varchar(100) NOT NULL,
  `subject_clerk_no` varchar(100) NOT NULL,
  `pension_no` varchar(100) NOT NULL,
  `date_retire` date NOT NULL,
  `salary_code` varchar(100) NOT NULL,
  `salary_scale` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `duty_info_tbl`
--

INSERT INTO `duty_info_tbl` (`duty_info_id`, `personal_id`, `appt_letter_no`, `grade`, `position`, `division`, `join_date`, `personal_file_no`, `subject_clerk_no`, `pension_no`, `date_retire`, `salary_code`, `salary_scale`, `status`, `time_added`) VALUES
(1, 7, 'appt/letter/09', 'Grade56', 'technician', '12div', '2023-10-25', 'per/file/05', 'sub/clerk/no/45', 'pension-no-78', '2024-10-25', 'salary-ABC-098', 'New salary scale', 1, '2023-09-25 13:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `eb_info_tbl`
--

CREATE TABLE `eb_info_tbl` (
  `eb_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `eb` varchar(10) NOT NULL,
  `due_date` date NOT NULL,
  `pass_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eb_info_tbl`
--

INSERT INTO `eb_info_tbl` (`eb_info_id`, `personal_id`, `eb`, `due_date`, `pass_date`, `status`, `time_added`) VALUES
(1, 0, 'eb2', '2022-05-26', '2023-04-25', 1, '2023-09-25 21:59:56'),
(2, 0, 'eb2', '2022-05-26', '2023-04-25', 1, '2023-09-25 22:00:05'),
(3, 7, 'eb3', '2022-05-28', '2024-04-25', 1, '2023-09-25 22:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `family_info_tbl`
--

CREATE TABLE `family_info_tbl` (
  `family_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `name_spouse` varchar(150) NOT NULL,
  `kinship` varchar(100) NOT NULL,
  `work_place` varchar(150) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `children_count` int(11) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_info_tbl`
--

INSERT INTO `family_info_tbl` (`family_info_id`, `personal_id`, `name_spouse`, `kinship`, `work_place`, `contact_no`, `children_count`, `mother_name`, `father_name`, `status`, `time_added`) VALUES
(1, 7, 'spouse name1', 'nok', 'AG office', '014785236', 2, 'mother name', 'father name', 1, '2023-09-26 12:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `lang_info_tbl`
--

CREATE TABLE `lang_info_tbl` (
  `lang_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `due_date` date NOT NULL,
  `pass_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lang_info_tbl`
--

INSERT INTO `lang_info_tbl` (`lang_info_id`, `personal_id`, `lang`, `due_date`, `pass_date`, `status`, `time_added`) VALUES
(1, 7, 'Tamil', '2021-10-21', '2022-12-22', 1, '2023-09-25 22:13:29'),
(2, 7, 'English', '2023-10-28', '2022-05-10', 1, '2023-09-26 23:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `leave_info_tbl`
--

CREATE TABLE `leave_info_tbl` (
  `leave_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `leave_year` year(4) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `day_count` int(11) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_info_tbl`
--

INSERT INTO `leave_info_tbl` (`leave_info_id`, `personal_id`, `leave_year`, `leave_type`, `day_count`, `from_date`, `to_date`, `status`, `time_added`) VALUES
(1, 0, 2023, 'Sick leave', 2, NULL, NULL, 1, '2023-09-26 21:48:18'),
(2, 0, 2023, 'Sick leave', 2, NULL, NULL, 1, '2023-09-26 21:48:30'),
(3, 7, 2023, 'Local Study Leave with Pay', 6, NULL, NULL, 1, '2023-09-26 21:50:36'),
(4, 7, 2023, 'Maternity leave', 18, NULL, NULL, 1, '2023-09-26 22:11:34'),
(5, 7, 2023, 'Accident leave', 2, '2023-10-13', '2023-10-15', 1, '2023-10-13 09:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `ministry_info_tbl`
--

CREATE TABLE `ministry_info_tbl` (
  `ministry_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `date_join` date NOT NULL,
  `div_att` varchar(100) NOT NULL,
  `acting_arrangement` varchar(100) NOT NULL,
  `date_transfer` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ministry_info_tbl`
--

INSERT INTO `ministry_info_tbl` (`ministry_info_id`, `personal_id`, `date_join`, `div_att`, `acting_arrangement`, `date_transfer`, `status`, `time_added`) VALUES
(1, 7, '2023-09-24', 'mechanical division', '', '2023-10-25', 1, '2023-09-25 14:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info_detail_tbl`
--

CREATE TABLE `personal_info_detail_tbl` (
  `personal_info_detail_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `date_issue_ministry_id` date NOT NULL,
  `date_expire_ministry_id` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `age` date NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `passport_no` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `p_address` varchar(150) NOT NULL,
  `t_address` varchar(150) NOT NULL,
  `district` varchar(50) NOT NULL,
  `div_sec` varchar(75) NOT NULL,
  `police_area` varchar(75) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_info_detail_tbl`
--

INSERT INTO `personal_info_detail_tbl` (`personal_info_detail_id`, `personal_id`, `date_issue_ministry_id`, `date_expire_ministry_id`, `gender`, `civil_status`, `birthday`, `age`, `blood_group`, `passport_no`, `contact_no`, `email`, `p_address`, `t_address`, `district`, `div_sec`, `police_area`, `photo`, `status`, `time_added`) VALUES
(1, 2, '0000-00-00', '0000-00-00', 'Male', 'Married', '0000-00-00', '0000-00-00', 'A+', '8780621A', '0112365985', 'ppms.cdrd@outlook.com', 'pitipana, homagama', 'kottawa', '3', 'pilimathalawa', 'peradeniya', 'Paper CDRD DDG.jpg', 1, '0000-00-00 00:00:00'),
(2, 0, '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 1, '2023-09-25 13:53:37'),
(3, 0, '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 1, '2023-09-25 13:53:47'),
(4, 0, '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 1, '2023-09-25 13:55:10'),
(5, 7, '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 1, '2023-09-25 13:55:32'),
(6, 7, '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 1, '2023-09-25 13:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info_tbl`
--

CREATE TABLE `personal_info_tbl` (
  `personal_info_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `ministry_id_cat` varchar(10) NOT NULL,
  `ministry_id_no` varchar(12) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_info_tbl`
--

INSERT INTO `personal_info_tbl` (`personal_info_id`, `name`, `designation_id`, `nic`, `ministry_id_cat`, `ministry_id_no`, `status`, `date_added`) VALUES
(1, 'Nadeera Kulapathi', 1, '8780', 'Permanent', '123', 0, '2023-04-26 12:20:17'),
(2, 'Dhanjali Ranathissa', 2, '879653236V', 'Temporary', '1458C', 1, '2023-04-26 12:27:41'),
(3, 'Janith Ariyathilakaaaa', 3, '708062159V', 'Temporary', '14785JA', 0, '2023-04-26 12:31:36'),
(4, 'Nadee Nagoda', 4, '8596301215', 'Permanent', '125456', 1, '2023-04-26 12:47:18'),
(5, 'test name', 5, '875458745V', 'Temporary', '125454', 0, '2023-04-26 13:06:43'),
(6, 'Jayamali', 6, '8780621V', 'Temporary', '125456MOD', 1, '2023-09-11 11:52:24'),
(7, 'Dhananjani', 5, '875458745V', 'Permanent', '1458D', 1, '2023-09-11 12:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `property_loan_info_tbl`
--

CREATE TABLE `property_loan_info_tbl` (
  `property_loan_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `p_loan_amount` double NOT NULL,
  `p_date_obtained` date NOT NULL,
  `p_date_completion` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_loan_info_tbl`
--

INSERT INTO `property_loan_info_tbl` (`property_loan_info_id`, `personal_id`, `p_loan_amount`, `p_date_obtained`, `p_date_completion`, `status`, `time_added`) VALUES
(1, 7, 23000, '0000-00-00', '0000-00-00', 1, '2023-11-06 12:44:25'),
(2, 7, 4200, '0000-00-00', '0000-00-00', 1, '2023-11-06 12:45:46'),
(3, 7, 7850, '2021-11-24', '2023-11-21', 1, '2023-11-06 12:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `train_warrant_info_tbl`
--

CREATE TABLE `train_warrant_info_tbl` (
  `train_warrant_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `number` varchar(50) NOT NULL,
  `train_class` smallint(6) NOT NULL,
  `warrant_type` varchar(10) NOT NULL,
  `no_members` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train_warrant_info_tbl`
--

INSERT INTO `train_warrant_info_tbl` (`train_warrant_info_id`, `personal_id`, `issue_date`, `number`, `train_class`, `warrant_type`, `no_members`, `status`, `time_added`) VALUES
(1, 7, '2024-10-25', '45896AA', 3, 'one_way', '5', 1, '2023-09-26 10:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `trg_info_tbl`
--

CREATE TABLE `trg_info_tbl` (
  `trg_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `foreign_local` varchar(10) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `course_fee` varchar(50) NOT NULL,
  `incidental` varchar(50) NOT NULL,
  `combined` varchar(50) NOT NULL,
  `warm_cloth` varchar(50) NOT NULL,
  `warm_cloth_last_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trg_info_tbl`
--

INSERT INTO `trg_info_tbl` (`trg_info_id`, `personal_id`, `course_name`, `foreign_local`, `country_name`, `from_date`, `to_date`, `course_fee`, `incidental`, `combined`, `warm_cloth`, `warm_cloth_last_date`, `status`, `time_added`) VALUES
(1, 7, 'foreign military course', 'Foreign', 'India', '2023-09-30', '2024-01-25', '2500', '1500', '2300', '4800', '2022-10-23', 1, '2023-09-25 15:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_permit_info_tbl`
--

CREATE TABLE `vehicle_permit_info_tbl` (
  `vehicle_permit_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `annual` varchar(100) NOT NULL,
  `permit_date` date DEFAULT NULL,
  `license_no` varchar(50) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_permit_info_tbl`
--

INSERT INTO `vehicle_permit_info_tbl` (`vehicle_permit_id`, `personal_id`, `annual`, `permit_date`, `license_no`, `status`, `date_added`) VALUES
(1, 7, 'annual1', '2023-10-03', '1256SD', 1, '2023-10-13 10:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `welfare_loan_info_tbl`
--

CREATE TABLE `welfare_loan_info_tbl` (
  `welfare_loan_info_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `loan_amount` double NOT NULL,
  `date_obtained` date NOT NULL,
  `date_completion` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `welfare_loan_info_tbl`
--

INSERT INTO `welfare_loan_info_tbl` (`welfare_loan_info_id`, `personal_id`, `loan_amount`, `date_obtained`, `date_completion`, `status`, `time_added`) VALUES
(1, 7, 25000, '2022-02-01', '2023-11-30', 1, '2023-11-06 12:14:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acting_info_tbl`
--
ALTER TABLE `acting_info_tbl`
  ADD PRIMARY KEY (`acting_info_id`);

--
-- Indexes for table `child_info_tbl`
--
ALTER TABLE `child_info_tbl`
  ADD PRIMARY KEY (`child_info_id`);

--
-- Indexes for table `designation_tbl`
--
ALTER TABLE `designation_tbl`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `district_tbl`
--
ALTER TABLE `district_tbl`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `duty_info_tbl`
--
ALTER TABLE `duty_info_tbl`
  ADD PRIMARY KEY (`duty_info_id`);

--
-- Indexes for table `eb_info_tbl`
--
ALTER TABLE `eb_info_tbl`
  ADD PRIMARY KEY (`eb_info_id`);

--
-- Indexes for table `family_info_tbl`
--
ALTER TABLE `family_info_tbl`
  ADD PRIMARY KEY (`family_info_id`);

--
-- Indexes for table `lang_info_tbl`
--
ALTER TABLE `lang_info_tbl`
  ADD PRIMARY KEY (`lang_info_id`);

--
-- Indexes for table `leave_info_tbl`
--
ALTER TABLE `leave_info_tbl`
  ADD PRIMARY KEY (`leave_info_id`);

--
-- Indexes for table `ministry_info_tbl`
--
ALTER TABLE `ministry_info_tbl`
  ADD PRIMARY KEY (`ministry_info_id`);

--
-- Indexes for table `personal_info_detail_tbl`
--
ALTER TABLE `personal_info_detail_tbl`
  ADD PRIMARY KEY (`personal_info_detail_id`);

--
-- Indexes for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  ADD PRIMARY KEY (`personal_info_id`);

--
-- Indexes for table `property_loan_info_tbl`
--
ALTER TABLE `property_loan_info_tbl`
  ADD PRIMARY KEY (`property_loan_info_id`);

--
-- Indexes for table `train_warrant_info_tbl`
--
ALTER TABLE `train_warrant_info_tbl`
  ADD PRIMARY KEY (`train_warrant_info_id`);

--
-- Indexes for table `trg_info_tbl`
--
ALTER TABLE `trg_info_tbl`
  ADD PRIMARY KEY (`trg_info_id`);

--
-- Indexes for table `vehicle_permit_info_tbl`
--
ALTER TABLE `vehicle_permit_info_tbl`
  ADD PRIMARY KEY (`vehicle_permit_id`);

--
-- Indexes for table `welfare_loan_info_tbl`
--
ALTER TABLE `welfare_loan_info_tbl`
  ADD PRIMARY KEY (`welfare_loan_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acting_info_tbl`
--
ALTER TABLE `acting_info_tbl`
  MODIFY `acting_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child_info_tbl`
--
ALTER TABLE `child_info_tbl`
  MODIFY `child_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designation_tbl`
--
ALTER TABLE `designation_tbl`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `district_tbl`
--
ALTER TABLE `district_tbl`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `duty_info_tbl`
--
ALTER TABLE `duty_info_tbl`
  MODIFY `duty_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eb_info_tbl`
--
ALTER TABLE `eb_info_tbl`
  MODIFY `eb_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `family_info_tbl`
--
ALTER TABLE `family_info_tbl`
  MODIFY `family_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lang_info_tbl`
--
ALTER TABLE `lang_info_tbl`
  MODIFY `lang_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_info_tbl`
--
ALTER TABLE `leave_info_tbl`
  MODIFY `leave_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ministry_info_tbl`
--
ALTER TABLE `ministry_info_tbl`
  MODIFY `ministry_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_info_detail_tbl`
--
ALTER TABLE `personal_info_detail_tbl`
  MODIFY `personal_info_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_info_tbl`
--
ALTER TABLE `personal_info_tbl`
  MODIFY `personal_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_loan_info_tbl`
--
ALTER TABLE `property_loan_info_tbl`
  MODIFY `property_loan_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `train_warrant_info_tbl`
--
ALTER TABLE `train_warrant_info_tbl`
  MODIFY `train_warrant_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trg_info_tbl`
--
ALTER TABLE `trg_info_tbl`
  MODIFY `trg_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_permit_info_tbl`
--
ALTER TABLE `vehicle_permit_info_tbl`
  MODIFY `vehicle_permit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `welfare_loan_info_tbl`
--
ALTER TABLE `welfare_loan_info_tbl`
  MODIFY `welfare_loan_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
