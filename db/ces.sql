-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 07:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ces`
--

-- --------------------------------------------------------

--
-- Table structure for table `clearance_archive`
--

CREATE TABLE `clearance_archive` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `initials` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `registrar_status` enum('Cleared','Not Cleared') NOT NULL,
  `schooladmin_status` enum('Cleared','Not Cleared') NOT NULL,
  `studentaffair_status` enum('Cleared','Not Cleared') NOT NULL,
  `guidance_status` enum('Cleared','Not Cleared') NOT NULL,
  `services_status` enum('Cleared','Not Cleared') NOT NULL,
  `cashier_status` enum('Cleared','Not Cleared') NOT NULL,
  `clinic_status` enum('Cleared','Not Cleared') NOT NULL,
  `library_status` enum('Cleared','Not Cleared') NOT NULL,
  `instructor1_name` varchar(255) NOT NULL,
  `instructor1_subject` varchar(255) NOT NULL,
  `instructor1_status` enum('Cleared','Not Cleared') NOT NULL,
  `instructor2_name` varchar(255) NOT NULL,
  `instructor2_subject` varchar(255) NOT NULL,
  `instructor2_status` enum('Cleared','Not Cleared','None') NOT NULL,
  `instructor3_name` varchar(255) NOT NULL,
  `instructor3_subject` varchar(255) NOT NULL,
  `instructor3_status` enum('Cleared','Not Cleared','None') NOT NULL,
  `instructor4_name` varchar(255) NOT NULL,
  `instructor4_subject` varchar(255) NOT NULL,
  `instructor4_status` enum('Cleared','Not Cleared','None') NOT NULL,
  `instructor5_name` varchar(255) NOT NULL,
  `instructor5_subject` varchar(255) NOT NULL,
  `instructor5_status` enum('Cleared','Not Cleared','None') NOT NULL,
  `instructor6_name` varchar(255) NOT NULL,
  `instructor6_subject` varchar(255) NOT NULL,
  `instructor6_status` enum('Cleared','Not Cleared','None') NOT NULL,
  `instructor7_name` varchar(255) NOT NULL,
  `instructor7_subject` varchar(255) NOT NULL,
  `instructor7_status` enum('Cleared','Not Cleared','None') NOT NULL,
  `instructor8_name` varchar(255) NOT NULL,
  `instructor8_subject` varchar(255) NOT NULL,
  `instructor8_status` enum('Cleared','Not Cleared','None') NOT NULL,
  `clearance_status` enum('Incomplete','Completed') NOT NULL DEFAULT 'Incomplete',
  `datecreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `grading_list`
-- (See below for the actual view)
--
CREATE TABLE `grading_list` (
`id` int(11)
,`studentid` varchar(50)
,`studentname` varchar(99)
,`course_type` varchar(32)
,`yearlevel` varchar(32)
,`instructorname` varchar(32)
,`subject_code` varchar(32)
,`prelim_score` decimal(10,2)
,`midterm_score` decimal(10,2)
,`finals_score` decimal(10,2)
,`average_score` decimal(10,2)
,`overall_score` decimal(10,2)
,`remarks` enum('Pending','Passed','Failed','INC')
,`access` varchar(50)
,`editorname` varchar(50)
,`editorrank` varchar(32)
,`datesigned` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `instructor_list`
-- (See below for the actual view)
--
CREATE TABLE `instructor_list` (
`user_id` int(11)
,`instructor_id` varchar(50)
,`instructor_name` text
,`instructor_email` varchar(32)
,`user_rank` varchar(32)
,`datecreated` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_clearance`
-- (See below for the actual view)
--
CREATE TABLE `student_clearance` (
`id` int(11)
,`studentinfoid` int(11)
,`studentid` varchar(50)
,`studentname` varchar(99)
,`course_type` varchar(32)
,`yearlevel` varchar(32)
,`registrar_status` enum('Cleared','Not Cleared')
,`schooladmin_status` enum('Cleared','Not Cleared')
,`studentaffair_status` enum('Cleared','Not Cleared')
,`guidance_status` enum('Cleared','Not Cleared')
,`services_status` enum('Cleared','Not Cleared')
,`cashier_status` enum('Cleared','Not Cleared')
,`clinic_status` enum('Cleared','Not Cleared')
,`library_status` enum('Cleared','Not Cleared')
,`instructor1_name` varchar(255)
,`instructor1_subject` varchar(255)
,`instructor1_status` enum('Cleared','Not Cleared')
,`instructor2_name` varchar(255)
,`instructor2_subject` varchar(255)
,`instructor2_status` enum('Cleared','Not Cleared','None')
,`instructor3_name` varchar(255)
,`instructor3_subject` varchar(255)
,`instructor3_status` enum('Cleared','Not Cleared','None')
,`instructor4_name` varchar(255)
,`instructor4_subject` varchar(255)
,`instructor4_status` enum('Cleared','Not Cleared','None')
,`instructor5_name` varchar(255)
,`instructor5_subject` varchar(255)
,`instructor5_status` enum('Cleared','Not Cleared','None')
,`instructor6_name` varchar(255)
,`instructor6_subject` varchar(255)
,`instructor6_status` enum('Cleared','Not Cleared','None')
,`instructor7_name` varchar(255)
,`instructor7_subject` varchar(255)
,`instructor7_status` enum('Cleared','Not Cleared','None')
,`instructor8_name` varchar(255)
,`instructor8_subject` varchar(255)
,`instructor8_status` enum('Cleared','Not Cleared','None')
,`clearance_status` enum('Incomplete','Completed')
,`datecreated` date
,`editorname` varchar(32)
,`editorrank` varchar(32)
,`datesigned` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_list`
-- (See below for the actual view)
--
CREATE TABLE `student_list` (
`user_id` int(11)
,`student_id` varchar(50)
,`student_name` varchar(99)
,`student_email` varchar(32)
,`user_rank` varchar(32)
,`datecreated` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `subject_list`
-- (See below for the actual view)
--
CREATE TABLE `subject_list` (
`id` int(11)
,`subject_code` varchar(32)
,`subject_name` varchar(50)
,`schoolyear` year(4)
,`subject_unit` decimal(10,1)
,`subject_labunit` decimal(10,1)
,`yearlevel` varchar(32)
,`semesters` varchar(32)
,`curriculumtype` enum('New Curriculum','Old Curriculum')
);

-- --------------------------------------------------------

--
-- Table structure for table `table_clearance`
--

CREATE TABLE `table_clearance` (
  `id` int(11) NOT NULL,
  `studentinfoid` int(11) NOT NULL,
  `registrar_status` enum('Cleared','Not Cleared') NOT NULL DEFAULT 'Not Cleared',
  `schooladmin_status` enum('Cleared','Not Cleared') NOT NULL DEFAULT 'Not Cleared',
  `studentaffair_status` enum('Cleared','Not Cleared') NOT NULL DEFAULT 'Not Cleared',
  `guidance_status` enum('Cleared','Not Cleared') NOT NULL DEFAULT 'Not Cleared',
  `services_status` enum('Cleared','Not Cleared') NOT NULL DEFAULT 'Not Cleared',
  `cashier_status` enum('Cleared','Not Cleared') NOT NULL DEFAULT 'Not Cleared',
  `clinic_status` enum('Cleared','Not Cleared') NOT NULL DEFAULT 'Not Cleared',
  `library_status` enum('Cleared','Not Cleared') NOT NULL DEFAULT 'Not Cleared',
  `instructor1_name` varchar(255) NOT NULL,
  `instructor1_subject` varchar(255) NOT NULL,
  `instructor1_status` enum('Cleared','Not Cleared') DEFAULT 'Not Cleared',
  `instructor2_name` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor2_subject` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor2_status` enum('Cleared','Not Cleared','None') DEFAULT 'None',
  `instructor3_name` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor3_subject` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor3_status` enum('Cleared','Not Cleared','None') DEFAULT 'None',
  `instructor4_name` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor4_subject` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor4_status` enum('Cleared','Not Cleared','None') DEFAULT 'None',
  `instructor5_name` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor5_subject` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor5_status` enum('Cleared','Not Cleared','None') DEFAULT 'None',
  `instructor6_name` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor6_subject` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor6_status` enum('Cleared','Not Cleared','None') DEFAULT 'None',
  `instructor7_name` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor7_subject` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor7_status` enum('Cleared','Not Cleared','None') DEFAULT 'None',
  `instructor8_name` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor8_subject` varchar(255) NOT NULL DEFAULT 'NONE',
  `instructor8_status` enum('Cleared','Not Cleared','None') DEFAULT 'None',
  `clearance_status` enum('Incomplete','Completed') NOT NULL DEFAULT 'Incomplete',
  `datecreated` date NOT NULL DEFAULT current_timestamp(),
  `editorname` varchar(32) NOT NULL,
  `editorrank` varchar(32) NOT NULL,
  `datesigned` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_courses`
--

CREATE TABLE `table_courses` (
  `id` int(11) NOT NULL,
  `course_type` varchar(32) NOT NULL,
  `course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_courses`
--

INSERT INTO `table_courses` (`id`, `course_type`, `course_name`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology'),
(2, 'BSBA', 'Bachelor of Science in Business Administration'),
(3, 'BSCS', 'Bachelor of Science in Computer Science'),
(4, 'BSIS', 'Bachelor of Science in Information System'),
(5, 'BSE', 'Bachelor of Science in Entrepreneurship'),
(6, 'BSOA', 'Bachelor of Science in Office Administration'),
(7, 'NAN', 'None Selected');

-- --------------------------------------------------------

--
-- Table structure for table `table_employee_info`
--

CREATE TABLE `table_employee_info` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `employeeid` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `initials` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `prefix` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_employee_info`
--

INSERT INTO `table_employee_info` (`id`, `userid`, `employeeid`, `firstname`, `initials`, `lastname`, `prefix`) VALUES
(1, 2, 'superadmin009', 'Russia', 'B.', 'Matriyoshika', 'Mr.'),
(2, 3, '050205182373', 'John Carlo', 'M.', 'Gayas', 'Mr.'),
(3, 4, '050205182374', 'Albert John', 'C.', 'Mamaril', 'Mr.'),
(4, 7, '050205182377', 'Leonardo', 'C.', 'Corpuz', 'Mr.'),
(5, 8, '050205182378', 'Alexander', 'V.', 'Lee', 'Mr.'),
(6, 9, '050205182379', 'Rolan', 'B.', 'Macarang', 'Mr.'),
(7, 10, '050205182380', 'Dimitri', 'J.', 'Davinci', 'Mr.'),
(8, 11, '050205182381', 'Makoto', 'R.', 'Toyota', 'Mr.'),
(9, 12, '050205182382', 'Matsumoto', 'D.', 'Mitsubishi', 'Mr.'),
(10, 13, '050205182383', 'Daisuko', 'K.', 'Nissan', 'Mr.'),
(11, 14, '050205182384', 'Ayaka', 'Q.', 'Reizei', 'Mr.'),
(12, 15, '050205182385', 'John David', 'U.', 'Johnson', 'Mr.');

-- --------------------------------------------------------

--
-- Table structure for table `table_reset`
--

CREATE TABLE `table_reset` (
  `id` int(11) NOT NULL,
  `hashcode` varchar(255) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_semester`
--

CREATE TABLE `table_semester` (
  `id` int(11) NOT NULL,
  `semesters` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_semester`
--

INSERT INTO `table_semester` (`id`, `semesters`) VALUES
(1, '1st Term'),
(2, '2nd Term'),
(3, '3rd Term'),
(4, 'None Selected');

-- --------------------------------------------------------

--
-- Table structure for table `table_student_cor`
--

CREATE TABLE `table_student_cor` (
  `id` int(11) NOT NULL,
  `studentinfoid` int(11) NOT NULL,
  `scholartype` enum('None Selected','Full Scholarship','Half Scholarship','No Scholarship') NOT NULL DEFAULT 'None Selected',
  `payment_type` enum('Full Payment','Installment','None Selected') NOT NULL DEFAULT 'None Selected',
  `misc_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `thesis_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `nstp_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `lab_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tuiton_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `totaltuiton_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_units` float NOT NULL DEFAULT 0,
  `surcharge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `prelim_installment` decimal(10,2) NOT NULL DEFAULT 0.00,
  `prelim_date` date NOT NULL DEFAULT current_timestamp(),
  `midterm_installment` decimal(10,2) NOT NULL DEFAULT 0.00,
  `midterm_date` date NOT NULL DEFAULT current_timestamp(),
  `finals_installment` decimal(10,2) NOT NULL DEFAULT 0.00,
  `finals_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_student_grade`
--

CREATE TABLE `table_student_grade` (
  `id` int(11) NOT NULL,
  `studentinfoid` int(11) NOT NULL,
  `instructorname` varchar(32) NOT NULL,
  `sbjid` int(11) NOT NULL,
  `prelim_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `midterm_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `finals_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `average_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `overall_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `remarks` enum('Pending','Passed','Failed','INC') NOT NULL DEFAULT 'Pending',
  `access` varchar(50) DEFAULT 'SUPERADMIN ADMIN',
  `datecreated` date NOT NULL DEFAULT current_timestamp(),
  `editorname` varchar(50) NOT NULL,
  `editorrank` varchar(32) NOT NULL,
  `datesigned` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_student_info`
--

CREATE TABLE `table_student_info` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `initials` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `prefix` varchar(32) NOT NULL,
  `studenttype` enum('None Selected','Regular','Irregular') NOT NULL DEFAULT 'None Selected',
  `schoolyear` year(4) NOT NULL DEFAULT current_timestamp(),
  `courseid` int(11) NOT NULL DEFAULT 7,
  `yearid` int(11) NOT NULL DEFAULT 5,
  `semesterid` int(11) NOT NULL DEFAULT 4,
  `curriculumtype` enum('None Selected','New Curriculum','Old Curriculum') NOT NULL DEFAULT 'None Selected',
  `subjects` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_student_info`
--

INSERT INTO `table_student_info` (`id`, `userid`, `studentid`, `firstname`, `initials`, `lastname`, `prefix`, `studenttype`, `schoolyear`, `courseid`, `yearid`, `semesterid`, `curriculumtype`, `subjects`) VALUES
(1, 1, '050205182372', 'Norbert II', 'A.', 'Magbual', 'Mr.', 'Regular', 2021, 1, 3, 3, 'New Curriculum', 'OJT331A | ITELE4'),
(2, 5, '050205182375', 'Sean Mikheal', 'C.', 'Buena', 'Mr.', 'Regular', 2021, 1, 3, 3, 'New Curriculum', 'OJT331A | ITELE4'),
(3, 6, '050205182376', 'Derrick', 'R.', 'Dipol', 'Mr.', 'None Selected', 2021, 7, 5, 4, 'None Selected', NULL),
(4, 16, '050205182386', 'Kristine Claire', 'D.', 'Vernes', 'Ms.', 'None Selected', 2021, 7, 5, 4, 'None Selected', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_student_req`
--

CREATE TABLE `table_student_req` (
  `id` int(11) NOT NULL,
  `studentinfoid` int(11) NOT NULL,
  `goodmoral` enum('Pending','Submitted','Not Submitted','To Follow') NOT NULL DEFAULT 'Pending',
  `appform` enum('Pending','Submitted','Not Submitted','To Follow') NOT NULL DEFAULT 'Pending',
  `tor` enum('Pending','Submitted','Not Submitted','To Follow') NOT NULL DEFAULT 'Pending',
  `form137` enum('Pending','Submitted','Not Submitted','To Follow') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_student_subject`
--

CREATE TABLE `table_student_subject` (
  `id` int(11) NOT NULL,
  `studentinfoid` int(11) NOT NULL,
  `sbjid` int(11) NOT NULL,
  `datecreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_subjects`
--

CREATE TABLE `table_subjects` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(32) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_unit` decimal(10,1) NOT NULL,
  `subject_labunit` decimal(10,1) NOT NULL,
  `schoolyear` year(4) NOT NULL DEFAULT current_timestamp(),
  `yearid` int(11) NOT NULL,
  `semesterid` int(11) NOT NULL,
  `curriculumtype` enum('New Curriculum','Old Curriculum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_subjects`
--

INSERT INTO `table_subjects` (`id`, `subject_code`, `subject_name`, `subject_unit`, `subject_labunit`, `schoolyear`, `yearid`, `semesterid`, `curriculumtype`) VALUES
(1, 'GE111', 'Understanding the Self', '3.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(2, 'GE112', 'Reading in Philippine History', '3.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(3, 'GE113', 'Ethics', '3.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(4, 'GE124', 'The Comtemporary World', '3.0', '0.0', 2021, 1, 2, 'New Curriculum'),
(5, 'GE135', 'Purposive Communication', '3.0', '0.0', 2021, 1, 3, 'New Curriculum'),
(6, 'GE211', 'Mathemathics in the Modern World', '3.0', '0.0', 2021, 2, 1, 'New Curriculum'),
(7, 'GE212', 'Komunikasyon sa Akademikong Filipino', '3.0', '0.0', 2021, 2, 1, 'New Curriculum'),
(8, 'GE224', 'Science, Technology and Society', '3.0', '0.0', 2021, 2, 2, 'New Curriculum'),
(9, 'GE223', 'Rizal\'s Life & Works', '3.0', '0.0', 2021, 3, 3, 'New Curriculum'),
(10, 'GE225', 'Panitikan', '3.0', '0.0', 2021, 2, 2, 'New Curriculum'),
(11, 'GE321', 'Art Appreciation', '3.0', '0.0', 2021, 3, 2, 'New Curriculum'),
(12, 'NSTP1', 'National Service Training Program 1', '3.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(13, 'NSTP2', 'National Service Training Program 2', '3.0', '0.0', 2021, 1, 2, 'New Curriculum'),
(14, 'PE1', 'Physical Fitness & Gymnastics', '2.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(15, 'PE2', 'Rhytmhic Activities', '2.0', '0.0', 2021, 1, 2, 'New Curriculum'),
(16, 'PE3', 'Individual and Dual Sports', '2.0', '0.0', 2021, 1, 3, 'New Curriculum'),
(17, 'PE4', 'Team Sports', '2.0', '0.0', 2021, 2, 1, 'New Curriculum'),
(18, 'CAP3A', 'Capstone Project 1', '2.0', '1.0', 2021, 3, 1, 'New Curriculum'),
(19, 'CAP3B', 'Capstone Project 2', '2.0', '1.0', 2021, 3, 2, 'New Curriculum'),
(20, 'OJT331A', 'Practicum of OJT', '2.0', '0.0', 2021, 3, 3, 'New Curriculum'),
(21, 'OJT331B', 'Internship', '4.0', '0.0', 2021, 4, 1, 'New Curriculum'),
(22, 'ILB131', 'Application Project 1 - Research Methods', '1.5', '0.0', 2021, 1, 3, 'New Curriculum'),
(23, 'ILB132', 'Application Project 1 - Concept Paper', '2.0', '1.0', 2021, 2, 1, 'New Curriculum'),
(24, 'FIL211', 'Komunikasyon sa Akademikong Filipino', '3.0', '0.0', 2021, 2, 1, 'New Curriculum'),
(25, 'FIL232', 'Retorika', '3.0', '0.0', 2021, 2, 3, 'New Curriculum'),
(26, 'BA111', 'Marketing Management', '3.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(27, 'BA112', 'Fundamentals of Accounting', '3.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(28, 'BA121', 'Human Resource Management', '3.0', '0.0', 2021, 1, 2, 'New Curriculum'),
(29, 'BA122', 'Business Law (Obligation & Contracts)', '3.0', '0.0', 2021, 1, 2, 'New Curriculum'),
(30, 'BA123', 'Basic Microeconomics', '3.0', '0.0', 2021, 1, 2, 'New Curriculum'),
(31, 'BA131', 'Income Taxation', '3.0', '0.0', 2021, 1, 3, 'New Curriculum'),
(32, 'BA132', 'Professional Salesmanship', '3.0', '0.0', 2021, 1, 3, 'New Curriculum'),
(33, 'BA133', 'Product Management', '3.0', '0.0', 2021, 1, 3, 'New Curriculum'),
(34, 'BA134', 'Operations Management w/ TQM', '3.0', '0.0', 2021, 1, 3, 'New Curriculum'),
(35, 'BA211', 'Strategic Management', '3.0', '0.0', 2021, 2, 1, 'New Curriculum'),
(36, 'BA212', 'Good Governance & Social Responsibility', '3.0', '0.0', 2021, 2, 1, 'New Curriculum'),
(37, 'BA221', 'Retail Management', '3.0', '0.0', 2021, 2, 2, 'New Curriculum'),
(38, 'BA222', 'Business Research', '3.0', '0.0', 2021, 2, 2, 'New Curriculum'),
(39, 'BA231', 'Pricing Strategy', '3.0', '0.0', 2021, 2, 3, 'New Curriculum'),
(40, 'BA232', 'Fundamentals of Data Analysis', '3.0', '0.0', 2021, 2, 3, 'New Curriculum'),
(41, 'BA233', 'Distribution Management', '3.0', '0.0', 2021, 2, 3, 'New Curriculum'),
(42, 'BA311', 'Business Analytics', '3.0', '0.0', 2021, 3, 1, 'New Curriculum'),
(43, 'BA312', 'Advertising w/ IMC', '3.0', '0.0', 2021, 3, 1, 'New Curriculum'),
(44, 'BA313', 'Feasibility Study', '3.0', '1.0', 2021, 3, 1, 'New Curriculum'),
(45, 'BA321', 'Marketing Research', '3.0', '0.0', 2021, 3, 2, 'New Curriculum'),
(46, 'BA322', 'Digital Marketing', '3.0', '0.0', 2021, 3, 2, 'New Curriculum'),
(47, 'BA331', 'International Business and Trade', '3.0', '0.0', 2021, 3, 3, 'New Curriculum'),
(48, 'BAELEC1', 'Strategic Marketing Management', '3.0', '0.0', 2021, 2, 2, 'New Curriculum'),
(49, 'BAELEC2', 'Entrepreneural Management', '3.0', '0.0', 2021, 2, 3, 'New Curriculum'),
(50, 'BAELEC3', 'Environmental Marketing', '3.0', '0.0', 2021, 3, 2, 'New Curriculum'),
(51, 'BAELEC4', 'Service Marketing', '3.0', '0.0', 2021, 3, 2, 'New Curriculum'),
(52, 'BAST1', 'Multimedia', '2.0', '1.0', 2021, 3, 1, 'New Curriculum'),
(53, 'BAST2', 'Introduction to Web Development', '2.0', '1.0', 2021, 3, 1, 'New Curriculum'),
(54, 'IT131', 'Cloud Computing', '3.0', '0.0', 2021, 1, 3, 'New Curriculum'),
(55, 'IT313', 'Software Engineering', '3.0', '0.0', 2021, 3, 1, 'New Curriculum'),
(56, 'ITE111', 'Introduction to Computing', '3.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(57, 'ITE122', 'Computer Programing 1 - PLF/C', '3.0', '1.0', 2021, 1, 2, 'New Curriculum'),
(58, 'ITE133', 'Computer Programming 2 - Java', '3.0', '1.0', 2021, 1, 3, 'New Curriculum'),
(59, 'ITE211', 'Data Structures and Algorithms', '3.0', '1.0', 2021, 2, 1, 'New Curriculum'),
(60, 'ITE212', 'Application Development and Emerging', '3.0', '1.0', 2021, 2, 1, 'New Curriculum'),
(61, 'ITE223', 'Information Managment', '3.0', '1.0', 2021, 2, 2, 'New Curriculum'),
(62, 'ITP111', 'Discrete Mathematics', '3.0', '0.0', 2021, 1, 1, 'New Curriculum'),
(63, 'ITP122', 'Multimedia Technology', '3.0', '1.0', 2021, 1, 2, 'New Curriculum'),
(64, 'ITP123', 'Networking 1', '3.0', '0.0', 2021, 1, 2, 'New Curriculum'),
(65, 'ITP134', 'Networking 2', '2.0', '1.0', 2021, 1, 3, 'New Curriculum'),
(66, 'ITP135', 'Introduction to Human Computer Interaction', '3.0', '0.0', 2021, 1, 3, 'New Curriculum'),
(67, 'ITP211', 'Fundamentals of DBMS', '3.0', '1.0', 2021, 2, 1, 'New Curriculum'),
(68, 'ITP222', 'Quantitative Methods', '3.0', '0.0', 2021, 2, 2, 'New Curriculum'),
(69, 'ITP223', 'Integrative Programming and Technologies 1', '3.0', '0.0', 2021, 2, 2, 'New Curriculum'),
(70, 'ITP224', 'System Administration and Maintenance (RDBMS)', '2.0', '1.0', 2021, 2, 2, 'New Curriculum'),
(71, 'ITP235', 'Information Assurance and Security 1', '3.0', '0.0', 2021, 2, 3, 'New Curriculum'),
(72, 'ITP236', 'Systems Analysis & Design', '4.0', '0.0', 2021, 2, 3, 'New Curriculum'),
(73, 'ITP311', 'Information Assurance and Security 2', '3.0', '0.0', 2021, 3, 1, 'New Curriculum'),
(74, 'ITP312', 'Social & Professional Issues', '3.0', '0.0', 2021, 3, 1, 'New Curriculum'),
(75, 'ITP323', 'System Integration and Architechture 1', '3.0', '0.0', 2021, 3, 2, 'New Curriculum'),
(76, 'ITELE1', 'IT Elective 1', '2.0', '1.0', 2021, 2, 3, 'New Curriculum'),
(77, 'ITELE2', 'IT Elective 2', '2.0', '1.0', 2021, 3, 1, 'New Curriculum'),
(78, 'ITELE3', 'IT Elective 3', '2.0', '1.0', 2021, 3, 2, 'New Curriculum'),
(79, 'ITELE4', 'IT Elective 4', '2.0', '1.0', 2021, 3, 3, 'New Curriculum'),
(80, 'TEST', 'Testing Subject', '3.0', '1.0', 2021, 1, 1, 'New Curriculum'),
(81, 'TEST', 'Testing Subject', '3.0', '1.0', 2022, 1, 1, 'New Curriculum');

-- --------------------------------------------------------

--
-- Table structure for table `table_users`
--

CREATE TABLE `table_users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(32) NOT NULL,
  `userrank` varchar(32) NOT NULL,
  `datecreated` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Disabled','Verify') NOT NULL DEFAULT 'Verify',
  `edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_users`
--

INSERT INTO `table_users` (`id`, `username`, `password`, `email`, `userrank`, `datecreated`, `status`, `edited`) VALUES
(1, '050205182372', '$2y$10$VjYfwxBeX1dfJUdNUWGVn.T4pZrBk8T8F1FbmQu1D1g5PlXbJvZ8G', 'n.magbual@info.com', 'STUDENT', '2021-05-20', 'Active', '2021-05-23 08:04:02'),
(2, 'superadmin009', '$2y$10$KeW3qqKsZXQf4oGdeiVU/eYMkH2goScKZuqN.rR1kcw7ODTsM9ZVG', 'superadmin@info.com', 'SUPERADMIN', '2021-05-20', 'Active', '2021-05-20 13:22:46'),
(3, '050205182373', '$2y$10$8gPzj4oa28JOVVVBhQcU0egiX4sd0tHyHIl9QcSwlbFFpYvZLOsma', 'jc.gayas@info.com', 'INSTRUCTOR', '2021-05-22', 'Active', '2021-05-22 16:40:52'),
(4, '050205182374', '$2y$10$EzPMaK2ODXwG.cDmCvfMpOrek7fJQRjVw3FSqEL2k8/qNfKnEkw26', 'aj.mamaril@info.com', 'INSTRUCTOR', '2021-05-22', 'Active', '2021-05-22 16:55:45'),
(5, '050205182375', '$2y$10$X9tD3Wfxpeq0OLPQ2WsjkOGrTUkZwTAKgRhztcGw1X3oYbqcii.ny', 'sm.buena@info.com', 'STUDENT', '2021-06-07', 'Active', '2021-06-07 13:57:29'),
(6, '050205182376', '$2y$10$CNu08ojD7.mqje4PQzoOQuwNDj5oZVzzhqj/OKJl5AU9i4u6WH1Wm', 'd.dipol@info.com', 'STUDENT', '2021-06-07', 'Verify', '2021-06-07 14:01:56'),
(7, '050205182377', '$2y$10$fJuG97UNm8MdUk4bedU1HumQwmjscWt.H0y82QDHnzTQcz3U4hb8q', 'l.corpuz@info.com', 'ADMIN', '2021-06-07', 'Verify', '2021-06-07 14:06:44'),
(8, '050205182378', '$2y$10$0sWsHbwfG1a/mnmN4Vmoc.oxUax47RwtlHqAMy1VX.MTMd7dy1qTa', 'a.lee@info.com', 'CASHIER', '2021-06-07', 'Verify', '2021-06-07 14:09:20'),
(9, '050205182379', '$2y$10$qYygbIl2YVK0fl/hnS6MOOgo.Ereq5UKar0HkxoqojBRB/HqfmrOa', 'r.macarang@info.com', 'SCHOOLADMIN', '2021-06-07', 'Verify', '2021-06-07 14:13:27'),
(10, '050205182380', '$2y$10$8.kW31OGCpHNega76RcHaum98MMZbPQsgtbMfRrnVzex/CAudUBsC', 'd.davinci@info.com', 'SERVICES', '2021-06-07', 'Verify', '2021-06-07 14:13:33'),
(11, '050205182381', '$2y$10$3DFxEGPaq7NUvmzEZeuO7.TqG59TPv3/pkvcYm6TkTL0pIhO1XHse', 'm.toyota@info.com', 'STUDENTAFFAIR', '2021-06-07', 'Verify', '2021-06-07 14:15:26'),
(12, '050205182382', '$2y$10$sf9KRiq9gYhpKU82tvL2cuxinfuJFqjJbKhifCwUy3mUwLtdf3Kxe', 'm.mitsubishi@info.com', 'GUIDANCE', '2021-06-07', 'Verify', '2021-06-07 14:17:08'),
(13, '050205182383', '$2y$10$u84MpDKvhtxlCAyj.R605uRtJIPGIlg2e.1txtdvKh1fkGtbuirIq', 'd.nissan@info.com', 'CLINIC', '2021-06-07', 'Verify', '2021-06-07 14:19:08'),
(14, '050205182384', '$2y$10$S7unx6fhxZnRd6iMdEtcmOfq7cbujHzt7DkE7mPtektsRNcdLZTPe', 'a.reizei@info.com', 'LIBRARIAN', '2021-06-07', 'Verify', '2021-06-07 14:19:53'),
(15, '050205182385', '$2y$10$vKmYYg/2x7di.vRPHtFk7eP.7FbhlkXyMalC41g2P89VLQaSOubNC', 'jd.johnson@info.com', 'INSTRUCTOR', '2021-06-07', 'Verify', '2021-06-07 14:27:10'),
(16, '050205182386', '$2y$10$NilPVWGGb0mq3k39iLMJY.0V0Jhwar7jiLEVeuhaJPP355U8nCPGa', 'kc.vernes@yahoo.com', 'STUDENT', '2021-06-07', 'Verify', '2021-06-07 14:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `table_yearlevel`
--

CREATE TABLE `table_yearlevel` (
  `id` int(11) NOT NULL,
  `yearlevel` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_yearlevel`
--

INSERT INTO `table_yearlevel` (`id`, `yearlevel`) VALUES
(1, '1st Year'),
(2, '2nd Year'),
(3, '3rd Year'),
(4, '4th Year'),
(5, 'None Selected');

-- --------------------------------------------------------

--
-- Stand-in structure for view `testing`
-- (See below for the actual view)
--
CREATE TABLE `testing` (
`id` int(11)
,`studentid` varchar(50)
,`studentname` varchar(99)
,`course_type` varchar(32)
,`yearlevel` varchar(32)
,`instructorname` varchar(32)
,`subject_code` varchar(32)
,`subjectsname` varchar(85)
,`prelim_score` decimal(10,2)
,`midterm_score` decimal(10,2)
,`finals_score` decimal(10,2)
,`average_score` decimal(10,2)
,`overall_score` decimal(10,2)
,`remarks` enum('Pending','Passed','Failed','INC')
,`access` varchar(50)
,`editorname` varchar(50)
,`editorrank` varchar(32)
,`datesigned` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `testing_student_info`
-- (See below for the actual view)
--
CREATE TABLE `testing_student_info` (
`id` int(11)
,`studentid` varchar(50)
,`firstname` varchar(32)
,`initials` varchar(32)
,`lastname` varchar(32)
,`studenttype` enum('None Selected','Regular','Irregular')
,`schoolyear` year(4)
,`courseid` int(11)
,`yearid` int(11)
,`semesterid` int(11)
,`curriculumtype` enum('None Selected','New Curriculum','Old Curriculum')
,`goodmoral` enum('Pending','Submitted','Not Submitted','To Follow')
,`appform` enum('Pending','Submitted','Not Submitted','To Follow')
,`tor` enum('Pending','Submitted','Not Submitted','To Follow')
,`form137` enum('Pending','Submitted','Not Submitted','To Follow')
,`scholartype` enum('None Selected','Full Scholarship','Half Scholarship','No Scholarship')
,`payment_type` enum('Full Payment','Installment','None Selected')
,`misc_fee` decimal(10,2)
,`thesis_fee` decimal(10,2)
,`nstp_fee` decimal(10,2)
,`lab_fee` decimal(10,2)
,`tuiton_fee` decimal(10,2)
,`totaltuiton_fee` decimal(10,2)
,`total_units` float
,`surcharge` decimal(10,2)
,`prelim_installment` decimal(10,2)
,`prelim_date` date
,`midterm_installment` decimal(10,2)
,`midterm_date` date
,`finals_installment` decimal(10,2)
,`finals_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `test_user_list`
-- (See below for the actual view)
--
CREATE TABLE `test_user_list` (
`id` int(11)
,`employee_name` text
,`student_name` varchar(99)
,`user_id` varchar(32)
,`user_email` varchar(32)
,`user_rank` varchar(32)
,`user_status` enum('Active','Disabled','Verify')
);

-- --------------------------------------------------------

--
-- Structure for view `grading_list`
--
DROP TABLE IF EXISTS `grading_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grading_list`  AS SELECT `table_student_grade`.`id` AS `id`, `table_student_info`.`studentid` AS `studentid`, concat(`table_student_info`.`lastname`,', ',`table_student_info`.`firstname`,' ',`table_student_info`.`initials`) AS `studentname`, `table_courses`.`course_type` AS `course_type`, `table_yearlevel`.`yearlevel` AS `yearlevel`, `table_student_grade`.`instructorname` AS `instructorname`, `table_subjects`.`subject_code` AS `subject_code`, `table_student_grade`.`prelim_score` AS `prelim_score`, `table_student_grade`.`midterm_score` AS `midterm_score`, `table_student_grade`.`finals_score` AS `finals_score`, `table_student_grade`.`average_score` AS `average_score`, `table_student_grade`.`overall_score` AS `overall_score`, `table_student_grade`.`remarks` AS `remarks`, `table_student_grade`.`access` AS `access`, `table_student_grade`.`editorname` AS `editorname`, `table_student_grade`.`editorrank` AS `editorrank`, `table_student_grade`.`datesigned` AS `datesigned` FROM ((((`table_student_grade` left join `table_student_info` on(`table_student_info`.`id` = `table_student_grade`.`studentinfoid`)) left join `table_yearlevel` on(`table_yearlevel`.`id` = `table_student_info`.`yearid`)) left join `table_courses` on(`table_courses`.`id` = `table_student_info`.`courseid`)) left join `table_subjects` on(`table_subjects`.`id` = `table_student_grade`.`sbjid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `instructor_list`
--
DROP TABLE IF EXISTS `instructor_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `instructor_list`  AS SELECT `table_employee_info`.`userid` AS `user_id`, `table_employee_info`.`employeeid` AS `instructor_id`, concat(`table_employee_info`.`lastname`,', ',`table_employee_info`.`firstname`,' ',`table_employee_info`.`initials`) AS `instructor_name`, `table_users`.`email` AS `instructor_email`, `table_users`.`userrank` AS `user_rank`, `table_users`.`datecreated` AS `datecreated` FROM (`table_employee_info` left join `table_users` on(`table_users`.`id` = `table_employee_info`.`userid` and `table_users`.`username` = `table_employee_info`.`employeeid`)) WHERE `table_users`.`userrank` = 'INSTRUCTOR' ;

-- --------------------------------------------------------

--
-- Structure for view `student_clearance`
--
DROP TABLE IF EXISTS `student_clearance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_clearance`  AS SELECT `table_clearance`.`id` AS `id`, `table_clearance`.`studentinfoid` AS `studentinfoid`, `table_student_info`.`studentid` AS `studentid`, concat(`table_student_info`.`lastname`,', ',`table_student_info`.`firstname`,' ',`table_student_info`.`initials`) AS `studentname`, `table_courses`.`course_type` AS `course_type`, `table_yearlevel`.`yearlevel` AS `yearlevel`, `table_clearance`.`registrar_status` AS `registrar_status`, `table_clearance`.`schooladmin_status` AS `schooladmin_status`, `table_clearance`.`studentaffair_status` AS `studentaffair_status`, `table_clearance`.`guidance_status` AS `guidance_status`, `table_clearance`.`services_status` AS `services_status`, `table_clearance`.`cashier_status` AS `cashier_status`, `table_clearance`.`clinic_status` AS `clinic_status`, `table_clearance`.`library_status` AS `library_status`, `table_clearance`.`instructor1_name` AS `instructor1_name`, `table_clearance`.`instructor1_subject` AS `instructor1_subject`, `table_clearance`.`instructor1_status` AS `instructor1_status`, `table_clearance`.`instructor2_name` AS `instructor2_name`, `table_clearance`.`instructor2_subject` AS `instructor2_subject`, `table_clearance`.`instructor2_status` AS `instructor2_status`, `table_clearance`.`instructor3_name` AS `instructor3_name`, `table_clearance`.`instructor3_subject` AS `instructor3_subject`, `table_clearance`.`instructor3_status` AS `instructor3_status`, `table_clearance`.`instructor4_name` AS `instructor4_name`, `table_clearance`.`instructor4_subject` AS `instructor4_subject`, `table_clearance`.`instructor4_status` AS `instructor4_status`, `table_clearance`.`instructor5_name` AS `instructor5_name`, `table_clearance`.`instructor5_subject` AS `instructor5_subject`, `table_clearance`.`instructor5_status` AS `instructor5_status`, `table_clearance`.`instructor6_name` AS `instructor6_name`, `table_clearance`.`instructor6_subject` AS `instructor6_subject`, `table_clearance`.`instructor6_status` AS `instructor6_status`, `table_clearance`.`instructor7_name` AS `instructor7_name`, `table_clearance`.`instructor7_subject` AS `instructor7_subject`, `table_clearance`.`instructor7_status` AS `instructor7_status`, `table_clearance`.`instructor8_name` AS `instructor8_name`, `table_clearance`.`instructor8_subject` AS `instructor8_subject`, `table_clearance`.`instructor8_status` AS `instructor8_status`, `table_clearance`.`clearance_status` AS `clearance_status`, `table_clearance`.`datecreated` AS `datecreated`, `table_clearance`.`editorname` AS `editorname`, `table_clearance`.`editorrank` AS `editorrank`, `table_clearance`.`datesigned` AS `datesigned` FROM (((`table_clearance` left join `table_student_info` on(`table_student_info`.`id` = `table_clearance`.`studentinfoid`)) left join `table_yearlevel` on(`table_yearlevel`.`id` = `table_student_info`.`yearid`)) left join `table_courses` on(`table_courses`.`id` = `table_student_info`.`courseid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_list`
--
DROP TABLE IF EXISTS `student_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_list`  AS SELECT `table_student_info`.`userid` AS `user_id`, `table_student_info`.`studentid` AS `student_id`, concat(`table_student_info`.`lastname`,', ',`table_student_info`.`firstname`,' ',`table_student_info`.`initials`) AS `student_name`, `table_users`.`email` AS `student_email`, `table_users`.`userrank` AS `user_rank`, `table_users`.`datecreated` AS `datecreated` FROM (`table_student_info` left join `table_users` on(`table_users`.`id` = `table_student_info`.`userid` and `table_users`.`username` = `table_student_info`.`studentid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `subject_list`
--
DROP TABLE IF EXISTS `subject_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subject_list`  AS SELECT `table_subjects`.`id` AS `id`, `table_subjects`.`subject_code` AS `subject_code`, `table_subjects`.`subject_name` AS `subject_name`, `table_subjects`.`schoolyear` AS `schoolyear`, `table_subjects`.`subject_unit` AS `subject_unit`, `table_subjects`.`subject_labunit` AS `subject_labunit`, `table_yearlevel`.`yearlevel` AS `yearlevel`, `table_semester`.`semesters` AS `semesters`, `table_subjects`.`curriculumtype` AS `curriculumtype` FROM ((`table_subjects` left join `table_yearlevel` on(`table_yearlevel`.`id` = `table_subjects`.`yearid`)) left join `table_semester` on(`table_semester`.`id` = `table_subjects`.`semesterid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `testing`
--
DROP TABLE IF EXISTS `testing`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `testing`  AS SELECT `grading_list`.`id` AS `id`, `grading_list`.`studentid` AS `studentid`, `grading_list`.`studentname` AS `studentname`, `grading_list`.`course_type` AS `course_type`, `grading_list`.`yearlevel` AS `yearlevel`, `grading_list`.`instructorname` AS `instructorname`, `grading_list`.`subject_code` AS `subject_code`, concat(`table_subjects`.`subject_code`,' : ',`table_subjects`.`subject_name`) AS `subjectsname`, `grading_list`.`prelim_score` AS `prelim_score`, `grading_list`.`midterm_score` AS `midterm_score`, `grading_list`.`finals_score` AS `finals_score`, `grading_list`.`average_score` AS `average_score`, `grading_list`.`overall_score` AS `overall_score`, `grading_list`.`remarks` AS `remarks`, `grading_list`.`access` AS `access`, `grading_list`.`editorname` AS `editorname`, `grading_list`.`editorrank` AS `editorrank`, `grading_list`.`datesigned` AS `datesigned` FROM (`grading_list` left join `table_subjects` on(`table_subjects`.`subject_code` = `grading_list`.`subject_code`)) ;

-- --------------------------------------------------------

--
-- Structure for view `testing_student_info`
--
DROP TABLE IF EXISTS `testing_student_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `testing_student_info`  AS SELECT `table_student_info`.`id` AS `id`, `table_student_info`.`studentid` AS `studentid`, `table_student_info`.`firstname` AS `firstname`, `table_student_info`.`initials` AS `initials`, `table_student_info`.`lastname` AS `lastname`, `table_student_info`.`studenttype` AS `studenttype`, `table_student_info`.`schoolyear` AS `schoolyear`, `table_student_info`.`courseid` AS `courseid`, `table_student_info`.`yearid` AS `yearid`, `table_student_info`.`semesterid` AS `semesterid`, `table_student_info`.`curriculumtype` AS `curriculumtype`, `table_student_req`.`goodmoral` AS `goodmoral`, `table_student_req`.`appform` AS `appform`, `table_student_req`.`tor` AS `tor`, `table_student_req`.`form137` AS `form137`, `table_student_cor`.`scholartype` AS `scholartype`, `table_student_cor`.`payment_type` AS `payment_type`, `table_student_cor`.`misc_fee` AS `misc_fee`, `table_student_cor`.`thesis_fee` AS `thesis_fee`, `table_student_cor`.`nstp_fee` AS `nstp_fee`, `table_student_cor`.`lab_fee` AS `lab_fee`, `table_student_cor`.`tuiton_fee` AS `tuiton_fee`, `table_student_cor`.`totaltuiton_fee` AS `totaltuiton_fee`, `table_student_cor`.`total_units` AS `total_units`, `table_student_cor`.`surcharge` AS `surcharge`, `table_student_cor`.`prelim_installment` AS `prelim_installment`, `table_student_cor`.`prelim_date` AS `prelim_date`, `table_student_cor`.`midterm_installment` AS `midterm_installment`, `table_student_cor`.`midterm_date` AS `midterm_date`, `table_student_cor`.`finals_installment` AS `finals_installment`, `table_student_cor`.`finals_date` AS `finals_date` FROM ((`table_student_info` left join `table_student_req` on(`table_student_req`.`studentinfoid` = `table_student_info`.`id`)) left join `table_student_cor` on(`table_student_cor`.`studentinfoid` = `table_student_info`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `test_user_list`
--
DROP TABLE IF EXISTS `test_user_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test_user_list`  AS SELECT `table_users`.`id` AS `id`, concat(`table_employee_info`.`lastname`,', ',`table_employee_info`.`firstname`,' ',`table_employee_info`.`initials`) AS `employee_name`, concat(`table_student_info`.`lastname`,', ',`table_student_info`.`firstname`,' ',`table_student_info`.`initials`) AS `student_name`, `table_users`.`username` AS `user_id`, `table_users`.`email` AS `user_email`, `table_users`.`userrank` AS `user_rank`, `table_users`.`status` AS `user_status` FROM ((`table_users` left join `table_student_info` on(`table_student_info`.`userid` = `table_users`.`id` and `table_student_info`.`studentid` = `table_users`.`username`)) left join `table_employee_info` on(`table_employee_info`.`userid` = `table_users`.`id` and `table_employee_info`.`employeeid` = `table_users`.`username`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clearance_archive`
--
ALTER TABLE `clearance_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_clearance`
--
ALTER TABLE `table_clearance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentinfoid` (`studentinfoid`),
  ADD KEY `instructor1_subject` (`instructor1_subject`,`instructor2_subject`),
  ADD KEY `instructor2_subject` (`instructor2_subject`,`instructor3_subject`),
  ADD KEY `instructor3_subject` (`instructor3_subject`,`instructor4_subject`),
  ADD KEY `instructor4_subject` (`instructor4_subject`,`instructor5_subject`),
  ADD KEY `instructor5_subject` (`instructor5_subject`,`instructor6_subject`),
  ADD KEY `instructor6_subject` (`instructor6_subject`,`instructor7_subject`),
  ADD KEY `instructor7_subject` (`instructor7_subject`,`instructor8_subject`);

--
-- Indexes for table `table_courses`
--
ALTER TABLE `table_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_type` (`course_type`);

--
-- Indexes for table `table_employee_info`
--
ALTER TABLE `table_employee_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `employeeid` (`employeeid`);

--
-- Indexes for table `table_reset`
--
ALTER TABLE `table_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_semester`
--
ALTER TABLE `table_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_student_cor`
--
ALTER TABLE `table_student_cor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentinfoid` (`studentinfoid`);

--
-- Indexes for table `table_student_grade`
--
ALTER TABLE `table_student_grade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentinfoid` (`studentinfoid`),
  ADD KEY `subject_id` (`sbjid`) USING BTREE;

--
-- Indexes for table `table_student_info`
--
ALTER TABLE `table_student_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `studentid` (`studentid`),
  ADD KEY `courseid` (`courseid`),
  ADD KEY `yearid` (`yearid`),
  ADD KEY `semesterid` (`semesterid`);

--
-- Indexes for table `table_student_req`
--
ALTER TABLE `table_student_req`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentinfoid` (`studentinfoid`);

--
-- Indexes for table `table_student_subject`
--
ALTER TABLE `table_student_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentinfoid` (`studentinfoid`),
  ADD KEY `sbjid` (`sbjid`);

--
-- Indexes for table `table_subjects`
--
ALTER TABLE `table_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yearid` (`yearid`),
  ADD KEY `semesterid` (`semesterid`);

--
-- Indexes for table `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `table_yearlevel`
--
ALTER TABLE `table_yearlevel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year_level` (`yearlevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_clearance`
--
ALTER TABLE `table_clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_courses`
--
ALTER TABLE `table_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_employee_info`
--
ALTER TABLE `table_employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_reset`
--
ALTER TABLE `table_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_semester`
--
ALTER TABLE `table_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_student_cor`
--
ALTER TABLE `table_student_cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_student_grade`
--
ALTER TABLE `table_student_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_student_info`
--
ALTER TABLE `table_student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_student_req`
--
ALTER TABLE `table_student_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_student_subject`
--
ALTER TABLE `table_student_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_subjects`
--
ALTER TABLE `table_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `table_users`
--
ALTER TABLE `table_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `table_yearlevel`
--
ALTER TABLE `table_yearlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_clearance`
--
ALTER TABLE `table_clearance`
  ADD CONSTRAINT `table_clearance_ibfk_1` FOREIGN KEY (`studentinfoid`) REFERENCES `table_student_info` (`id`);

--
-- Constraints for table `table_employee_info`
--
ALTER TABLE `table_employee_info`
  ADD CONSTRAINT `table_employee_info_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `table_users` (`id`),
  ADD CONSTRAINT `table_employee_info_ibfk_2` FOREIGN KEY (`employeeid`) REFERENCES `table_users` (`username`);

--
-- Constraints for table `table_student_cor`
--
ALTER TABLE `table_student_cor`
  ADD CONSTRAINT `table_student_cor_ibfk_1` FOREIGN KEY (`studentinfoid`) REFERENCES `table_student_info` (`id`);

--
-- Constraints for table `table_student_grade`
--
ALTER TABLE `table_student_grade`
  ADD CONSTRAINT `table_student_grade_ibfk_1` FOREIGN KEY (`studentinfoid`) REFERENCES `table_student_info` (`id`),
  ADD CONSTRAINT `table_student_grade_ibfk_2` FOREIGN KEY (`sbjid`) REFERENCES `table_subjects` (`id`);

--
-- Constraints for table `table_student_info`
--
ALTER TABLE `table_student_info`
  ADD CONSTRAINT `table_student_info_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `table_users` (`id`),
  ADD CONSTRAINT `table_student_info_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `table_users` (`username`),
  ADD CONSTRAINT `table_student_info_ibfk_3` FOREIGN KEY (`courseid`) REFERENCES `table_courses` (`id`),
  ADD CONSTRAINT `table_student_info_ibfk_4` FOREIGN KEY (`yearid`) REFERENCES `table_yearlevel` (`id`),
  ADD CONSTRAINT `table_student_info_ibfk_5` FOREIGN KEY (`semesterid`) REFERENCES `table_semester` (`id`);

--
-- Constraints for table `table_student_req`
--
ALTER TABLE `table_student_req`
  ADD CONSTRAINT `table_student_req_ibfk_1` FOREIGN KEY (`studentinfoid`) REFERENCES `table_student_info` (`id`);

--
-- Constraints for table `table_student_subject`
--
ALTER TABLE `table_student_subject`
  ADD CONSTRAINT `table_student_subject_ibfk_2` FOREIGN KEY (`studentinfoid`) REFERENCES `table_student_info` (`id`),
  ADD CONSTRAINT `table_student_subject_ibfk_3` FOREIGN KEY (`sbjid`) REFERENCES `table_subjects` (`id`);

--
-- Constraints for table `table_subjects`
--
ALTER TABLE `table_subjects`
  ADD CONSTRAINT `table_subjects_ibfk_1` FOREIGN KEY (`yearid`) REFERENCES `table_yearlevel` (`id`),
  ADD CONSTRAINT `table_subjects_ibfk_2` FOREIGN KEY (`semesterid`) REFERENCES `table_semester` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
