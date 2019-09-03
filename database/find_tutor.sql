-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 04:36 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find_tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `gen_areas`
--

CREATE TABLE `gen_areas` (
  `AREA_NO` int(11) NOT NULL,
  `AREA_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_areas`
--

INSERT INTO `gen_areas` (`AREA_NO`, `AREA_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'Ullaparaa', 3, '2018-11-13 09:15:14', 1, 3, 2018, 1, 3, '2018-11-13 09:15:51'),
(2, 'uttara', 3, '2018-11-13 09:16:14', 0, 0, 0, 1, 3, '2018-11-24 06:10:05'),
(3, 'Dhanmondi', 2, '2018-11-19 12:11:11', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, 'Gulshan', 3, '2018-11-24 06:09:34', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 'Banani', 3, '2018-11-24 06:09:42', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 'Badda', 3, '2018-11-24 06:10:20', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 'Mirpur', 3, '2018-11-24 06:10:26', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 'Mohammadpur', 3, '2018-11-24 06:10:42', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(9, 'Ajimpur', 3, '2018-11-24 06:10:57', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(10, 'Baridhara', 3, '2018-12-04 07:58:59', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(11, 'Tejgaon', 3, '2018-12-04 07:59:34', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(12, 'Motijheel', 3, '2018-12-04 08:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(13, 'Lalmatia', 3, '2018-12-04 08:00:14', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(14, 'Khilgaon', 3, '2018-12-04 08:00:42', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(15, 'Gabtoli', 3, '2018-12-04 08:01:36', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(16, 'Mohakhali', 3, '2018-12-04 08:02:26', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(17, 'Lalbagh', 3, '2018-12-04 08:03:12', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(18, 'Matuail', 3, '2018-12-04 08:04:42', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(19, 'Kotwali', 3, '2018-12-04 08:04:53', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(20, 'Komlapur', 3, '2018-12-04 08:05:25', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(21, 'Airport', 3, '2018-12-04 08:05:59', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(22, 'Boshila', 3, '2018-12-04 08:06:58', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(23, 'New market', 3, '2018-12-04 08:07:08', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(24, '', 3, '2018-12-10 18:59:03', 1, 3, 2018, 0, 0, '0000-00-00 00:00:00'),
(25, '', 3, '2018-12-10 19:04:43', 1, 3, 2018, 0, 0, '0000-00-00 00:00:00'),
(26, '', 3, '2018-12-10 19:14:50', 1, 3, 2018, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_contacts`
--

CREATE TABLE `gen_contacts` (
  `CONTACT_NO` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `MESSAGE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_contacts`
--

INSERT INTO `gen_contacts` (`CONTACT_NO`, `NAME`, `EMAIL`, `PHONE`, `SUBJECT`, `MESSAGE`) VALUES
(1, 'Abdul Rahman', 'Rahman@gmail.com', '01839374635', 'user name', 'I want to change my user name.'),
(2, 'Queen', 'queen@gmail.com', '01827837827', 'Area', 'I need to select multiple area');

-- --------------------------------------------------------

--
-- Table structure for table `gen_districts`
--

CREATE TABLE `gen_districts` (
  `DISTRICT_NO` int(11) NOT NULL,
  `DIVISION_NO` int(11) NOT NULL,
  `DISTRICT_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_districts`
--

INSERT INTO `gen_districts` (`DISTRICT_NO`, `DIVISION_NO`, `DISTRICT_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 'Faridpur', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(2, 1, 'Gazipur', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, 1, 'Gopalganj', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, 1, 'Kishoreganj', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 1, 'Madaripur', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 1, 'Manikganj', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 1, 'Munshiganj', 3, '2018-11-16 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 1, 'Narayanganj', 3, '2018-11-15 22:37:18', 0, 0, 0, 1, 0, '0000-00-00 00:00:00'),
(9, 1, 'Narsingdi', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(10, 1, 'Rajbari', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(11, 1, 'Shariatpur', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(12, 1, 'Tangail', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(13, 2, 'Sirajgonj', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(14, 2, 'Pabna', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(15, 2, 'Natore', 3, '2018-11-15 22:37:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(16, 2, 'Rajshahi', 3, '2018-11-30 14:30:42', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(17, 2, 'Chapai Nawabganj', 3, '2018-11-30 14:31:33', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(18, 2, 'Naogaon', 3, '2018-11-30 14:31:49', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(19, 2, 'Joypurhat', 3, '2018-11-30 14:32:09', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(20, 2, 'Bogra', 3, '2018-11-30 14:32:27', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(21, 6, 'Mymensingh', 3, '2018-11-30 14:32:50', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(22, 6, 'Netrokona', 3, '2018-11-30 14:33:01', 0, 0, 0, 1, 3, '2018-11-30 14:33:21'),
(23, 6, 'Sherpur', 3, '2018-11-30 14:35:54', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(24, 6, 'Jamalpur', 3, '2018-11-30 14:36:15', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(25, 8, 'Habiganj', 3, '2018-11-30 14:36:57', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(26, 8, 'Moulvibazar', 3, '2018-11-30 14:37:10', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(27, 8, 'Sunamganj', 3, '2018-11-30 14:37:23', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(28, 8, 'Sylhet', 3, '2018-11-30 14:37:47', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(29, 3, 'Barguna', 3, '2018-11-30 14:38:17', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(30, 3, 'Barisal', 3, '2018-11-30 14:38:27', 0, 0, 0, 1, 3, '2018-11-30 14:38:53'),
(31, 3, 'Bhola', 3, '2018-11-30 14:38:40', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(32, 3, 'Jhalokati', 3, '2018-11-30 14:39:17', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(33, 3, 'Patuakhali', 3, '2018-11-30 14:39:32', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(34, 3, 'Pirojpur', 3, '2018-11-30 14:39:45', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(35, 7, 'Dinajpur', 3, '2018-11-30 14:40:54', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(36, 7, 'Gaibandha', 3, '2018-11-30 14:41:07', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(37, 7, 'Kurigram', 3, '2018-11-30 14:41:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(38, 7, 'Lalmonirhat', 3, '2018-11-30 14:41:33', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(39, 7, 'Nilphamari ', 3, '2018-11-30 14:41:45', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(40, 7, 'Panchagarh', 3, '2018-11-30 14:41:57', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(41, 7, 'Rangpur', 3, '2018-11-30 14:42:06', 0, 0, 0, 1, 3, '2018-11-30 14:42:23'),
(42, 7, 'Thakurgaon', 3, '2018-11-30 14:42:44', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(43, 4, 'Bandarban', 3, '2018-11-30 14:43:18', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(44, 4, 'Brahmanbaria', 3, '2018-11-30 14:43:30', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(45, 4, 'Chandpur', 3, '2018-11-30 14:43:44', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(46, 4, 'Chittagong', 3, '2018-11-30 14:43:56', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(47, 4, 'Comilla', 3, '2018-11-30 14:44:10', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(48, 4, 'Coxs Bazar', 3, '2018-11-30 14:49:52', 0, 0, 0, 1, 3, '2018-11-30 14:50:32'),
(49, 4, 'Feni', 3, '2018-11-30 14:51:09', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(50, 4, 'Khagrachhari', 3, '2018-11-30 14:51:24', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(51, 4, 'Lakshmipur', 3, '2018-11-30 14:51:38', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(52, 4, 'Noakhali', 3, '2018-11-30 14:51:51', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(53, 4, 'Rangamati ', 3, '2018-11-30 14:52:03', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(54, 5, 'Chuadanga', 3, '2018-11-30 14:53:03', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(55, 5, 'Jessore', 3, '2018-11-30 14:53:15', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(56, 5, 'Jhenaidah', 3, '2018-11-30 14:53:28', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(57, 5, 'Khulna', 3, '2018-11-30 14:53:40', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(58, 5, 'Kushtia', 3, '2018-11-30 14:53:51', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(59, 5, 'Magura', 3, '2018-11-30 14:54:04', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(60, 5, 'Meherpur', 3, '2018-11-30 14:54:25', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(61, 5, 'Narail', 3, '2018-11-30 14:54:37', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(62, 5, 'Satkhira', 3, '2018-11-30 14:54:50', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(63, 1, 'Dhaka', 3, '2018-11-30 14:55:59', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(64, -1, '', 3, '2018-12-10 18:47:47', 1, 3, 2018, 0, 0, '0000-00-00 00:00:00'),
(65, -1, '', 3, '2018-12-10 18:50:58', 1, 3, 2018, 0, 0, '0000-00-00 00:00:00'),
(66, 2, 'Netrokona', 3, '2018-12-10 19:29:57', 1, 3, 2018, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_divisions`
--

CREATE TABLE `gen_divisions` (
  `DIVISION_NO` int(11) NOT NULL,
  `DIVISION_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_divisions`
--

INSERT INTO `gen_divisions` (`DIVISION_NO`, `DIVISION_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'Dhaka', 3, '2018-11-15 20:32:30', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(2, 'Rajshahi', 3, '2018-11-15 20:32:39', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, 'Barishal', 3, '2018-11-15 20:33:32', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, 'Chittagong', 3, '2018-11-15 20:33:42', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 'Khulna', 3, '2018-11-15 20:33:52', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 'Mymensingh', 3, '2018-11-15 20:34:03', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 'Rangpur', 3, '2018-11-15 20:34:14', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 'Sylhet', 3, '2018-11-15 20:34:22', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(9, '', 3, '2018-12-10 19:33:59', 1, 0, 2018, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_parent_circulars`
--

CREATE TABLE `gen_parent_circulars` (
  `PARENT_NO` int(11) NOT NULL,
  `USER_NO` int(11) NOT NULL,
  `CIRCULAR_TITLE` varchar(255) NOT NULL,
  `MEDIUM` varchar(255) NOT NULL,
  `STUDENT_LEVEL_NO` int(11) NOT NULL,
  `STUDENT_SUBJECT_NO` int(11) NOT NULL,
  `AREA_NO` int(11) NOT NULL,
  `TUITION_SCHEDULE_NO` int(11) NOT NULL,
  `WEEK` varchar(255) NOT NULL,
  `STUDENT_NUMBER` varchar(255) NOT NULL,
  `SALARY_NO` int(11) NOT NULL,
  `SHORT_DETAILS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_parent_circulars`
--

INSERT INTO `gen_parent_circulars` (`PARENT_NO`, `USER_NO`, `CIRCULAR_TITLE`, `MEDIUM`, `STUDENT_LEVEL_NO`, `STUDENT_SUBJECT_NO`, `AREA_NO`, `TUITION_SCHEDULE_NO`, `WEEK`, `STUDENT_NUMBER`, `SALARY_NO`, `SHORT_DETAILS`) VALUES
(4, 2, 'UrgentTutorWanted', 'English', 8, 7, 3, 1, '1Day/Week', 'Batch', 4, 'I want someone who can teach how to send bulk email from website database'),
(5, 14, 'HomeTutorWanted', 'Bangla', 1, 2, 3, 11, '1Day/Week', '2', 10, 'I have two children of Class 1 and 3 in Bangla medium. I need two Lady teacher for that two children from Jan./2019.'),
(6, 19, 'UrgentTutorWanted', 'Bangla', 3, 3, 8, 6, '5Day/Week', '1', 6, 'I need a teacher for my son'),
(9, 24, 'LadyTutorWanted', 'Bangla', 1, 1, 18, 10, '5Day/Week', '3', 6, 'We are looking for a lady tutor with strong background in mathematics.'),
(10, 25, 'UrgentTutorWanted', 'English', 5, 4, 4, 2, '2Day/Week', '1', 6, 'urgent teacher need ');

-- --------------------------------------------------------

--
-- Table structure for table `gen_salarys`
--

CREATE TABLE `gen_salarys` (
  `SALARY_NO` int(11) NOT NULL,
  `SALARY_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_salarys`
--

INSERT INTO `gen_salarys` (`SALARY_NO`, `SALARY_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(4, '1000-2000', 3, '2018-11-19 13:04:55', 0, 0, 0, 1, 3, '2018-11-19 13:18:04'),
(5, '2000-3000	', 3, '2018-11-24 05:56:19', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, '3000-4000	', 3, '2018-11-24 05:56:28', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, '4000-5000	', 3, '2018-11-24 05:56:37', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, '5000-6000	', 3, '2018-11-24 05:56:46', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(9, '6000-7000	', 3, '2018-11-24 05:56:55', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(10, '7000-8000	', 3, '2018-11-24 05:57:08', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(11, '9000-10000	', 3, '2018-11-24 05:57:24', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(12, 'Negotiable	', 3, '2018-11-24 05:57:35', 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_student_levels`
--

CREATE TABLE `gen_student_levels` (
  `STUDENT_LEVEL_NO` int(11) NOT NULL,
  `STUDENT_LEVEL_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_student_levels`
--

INSERT INTO `gen_student_levels` (`STUDENT_LEVEL_NO`, `STUDENT_LEVEL_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'Level 0-Level 5', 3, '2018-11-19 12:32:54', 0, 0, 0, 1, 3, '2018-11-24 05:52:05'),
(2, 'Level 5-Level 10', 3, '2018-11-24 05:52:24', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, 'Level 10-Level 12', 3, '2018-11-24 05:52:35', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, 'Level 0-Level 10', 3, '2018-11-24 05:52:45', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 'Level 0-Level 12', 3, '2018-11-24 05:52:54', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 'Level 5-Level 12', 3, '2018-11-24 05:53:45', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 'Any Upper Level', 3, '2018-11-24 05:57:58', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 'others(music,art etc)', 3, '2018-11-24 05:59:10', 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_student_subjects`
--

CREATE TABLE `gen_student_subjects` (
  `STUDENT_SUBJECT_NO` int(11) NOT NULL,
  `STUDENT_SUBJECT_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_student_subjects`
--

INSERT INTO `gen_student_subjects` (`STUDENT_SUBJECT_NO`, `STUDENT_SUBJECT_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'Bangla', 14, '2018-11-19 18:19:34', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(2, 'English', 14, '2018-11-19 18:19:40', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, 'Physics', 3, '2018-11-24 06:03:22', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, 'Mathematics', 3, '2018-11-24 06:03:31', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 'chemistry', 3, '2018-11-24 06:03:51', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 'Biology', 3, '2018-11-24 06:04:12', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 'Others', 3, '2018-12-01 19:04:10', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, '', 3, '2018-12-10 19:49:40', 1, 0, 2018, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_tuition_schedules`
--

CREATE TABLE `gen_tuition_schedules` (
  `TUITION_SCHEDULE_NO` int(11) NOT NULL,
  `TUITION_SCHEDULE_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_tuition_schedules`
--

INSERT INTO `gen_tuition_schedules` (`TUITION_SCHEDULE_NO`, `TUITION_SCHEDULE_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'Evening', 14, '2018-11-19 18:19:51', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(2, 'Morning', 14, '2018-11-19 18:19:57', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, 'Afternoon', 3, '2018-11-24 06:01:20', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, 'Night', 3, '2018-11-24 06:01:29', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 'Morning & Afternoon', 3, '2018-11-24 06:01:44', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 'Morning & Evening', 3, '2018-11-24 06:01:55', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 'Morning & Night', 3, '2018-11-24 06:02:08', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 'Afternoon & Evening', 3, '2018-11-24 06:02:17', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(9, 'Afternoon & Night', 3, '2018-11-24 06:02:27', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(10, 'Evening & Night', 3, '2018-11-24 06:02:38', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(11, 'All Schedule', 3, '2018-11-24 06:02:47', 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_tutor_circulars`
--

CREATE TABLE `gen_tutor_circulars` (
  `TUTOR_NO` int(11) NOT NULL,
  `USER_NO` int(11) NOT NULL,
  `AREA_NO` int(11) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `NATIONALITY` varchar(255) NOT NULL,
  `NATIONAL_ID_NUM` varchar(255) NOT NULL,
  `NATIONAL_ID_IMAGE` varchar(255) NOT NULL,
  `SHORT_INFORMATION` text NOT NULL,
  `EDUCATION_LEVEL` varchar(255) NOT NULL,
  `TUTOR_ID_CARD_IMAGE` varchar(255) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `INSTITUTE` varchar(255) NOT NULL,
  `TUITION_SCHEDULE_NO` int(11) NOT NULL,
  `STUDENT_LEVEL_NO` int(11) NOT NULL,
  `STUDENT_SUBJECT_NO` int(11) NOT NULL,
  `SALARY_NO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_tutor_circulars`
--

INSERT INTO `gen_tutor_circulars` (`TUTOR_NO`, `USER_NO`, `AREA_NO`, `DOB`, `NATIONALITY`, `NATIONAL_ID_NUM`, `NATIONAL_ID_IMAGE`, `SHORT_INFORMATION`, `EDUCATION_LEVEL`, `TUTOR_ID_CARD_IMAGE`, `SUBJECT`, `INSTITUTE`, `TUITION_SCHEDULE_NO`, `STUDENT_LEVEL_NO`, `STUDENT_SUBJECT_NO`, `SALARY_NO`) VALUES
(2, 15, 3, '2018-11-20', 'Bangladeshi', '37284168745738', '1544130577bangladesh-national-id-card.jpg', 'I am a very friendly, caring, punctual, dedicated & experienced teacher.', 'Graduate', '1544130577images (1).jpg', 'English', 'Daffodil International University', 5, 2, 2, 9),
(3, 13, 4, '1997-04-04', 'Bangladeshi', '37284168745738', '1544195803bangladesh-national-id-card.jpg', 'I am a Software Engineer and Researcher. I have Develops Apps, making software and many research paper.', 'Graduate', '1543865997id-card-template-photoshop-inspirational-vertical-name-badge-template-vertical-design-employee-id-card-of-id-card-template-photoshop.jpg', 'Science ', 'Daffodil International University', 1, 8, 7, 12),
(4, 21, 17, '1993-02-10', 'Bangladeshi', '37284168745856', '1545075598bangladesh-national-id-card.jpg', 'I am experienced in teaching. I am an Engineer and i have the ability to manage the students very well. ', 'Graduate', '1545075598id-card-template-photoshop-inspirational-vertical-name-badge-template-vertical-design-employee-id-card-of-id-card-template-photoshop.jpg', 'Science ', 'Dhaka University', 3, 3, 4, 8),
(5, 22, 7, '1988-02-02', 'Bangladeshi', '238927383748', '1545076862NID-daily-sun.jpg', 'My mission and vision is Teaching.Teaching is my profession.I teach my students sincerely and cordially.', 'Doctorate(running)', '1545076862images (2).jpg', 'EEE', 'BUET', 2, 7, 7, 12),
(6, 23, 4, '1996-02-21', 'Bangladeshi', '37284168745775', '1545421036NID-daily-sun.jpg', 'I am a very friendly.', 'Graduate', '1545421036images (3).jpg', 'Science ', 'Rajshahi University ', 1, 5, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `gen_users`
--

CREATE TABLE `gen_users` (
  `USER_NO` int(11) NOT NULL,
  `USER_TYPE_NO` int(11) NOT NULL,
  `FULL_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `MOBILE` varchar(15) NOT NULL,
  `DIVISION_NO` int(11) NOT NULL,
  `DISTRICT_NO` int(11) NOT NULL,
  `ADDRESS` text NOT NULL,
  `GENDER_NO` int(11) NOT NULL,
  `USER_NAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `PROFILE_IMAGE` varchar(255) NOT NULL,
  `IS_DELETED` int(11) DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(11) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_users`
--

INSERT INTO `gen_users` (`USER_NO`, `USER_TYPE_NO`, `FULL_NAME`, `EMAIL`, `MOBILE`, `DIVISION_NO`, `DISTRICT_NO`, `ADDRESS`, `GENDER_NO`, `USER_NAME`, `PASSWORD`, `PROFILE_IMAGE`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(2, 2, 'Jannat Ferdous', 'jnnat@gmail.com', '01839389247', 1, 2, 'Pabna', 2, 'jannat', '202cb962ac59075b964b07152d234b70', '1543687096images.jpg', 0, 3, 2018, 0, 0, '0000-00-00 00:00:00'),
(3, 3, 'Simi Islam', 'Simi@gmail.com', '01743747366', 0, 0, '', 2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(13, 1, 'Sunyat Queen', 'queen@gmail.com', '01827837827', 2, 13, 'ullapara', 2, 'queen', '202cb962ac59075b964b07152d234b70', '1543683516images.png', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(14, 2, 'Abdul Rahman', 'Rahman@gmail.com', '01839374635', 2, 14, 'Mirpur', 1, 'rahman', 'e10adc3949ba59abbe56e057f20f883e', '1543682694tayeem.png', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(15, 1, 'Anamika khan', 'Anamika@gmail.com', '01839389247', 1, 12, 'Dhanmondi,tollabag', 2, 'anamika', '202cb962ac59075b964b07152d234b70', '154412694922-512.png', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(19, 2, 'Rahim Uddin', 'Rahim@gmail.com', '01839374665', 2, 17, 'Uttara,dhaka', 1, 'rahim', 'e10adc3949ba59abbe56e057f20f883e', '1544129671images (2).png', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(21, 1, 'zasif bin islam', 'zasif@gmail.com', '01839389756', 1, 8, 'narayangaj', 1, 'zasif', 'e10adc3949ba59abbe56e057f20f883e', '1545075234images (3).png', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(22, 1, 'MD. ABUL HASHEM', 'Hashem897@gmail.com', '01839398643', 3, 31, 'Mirpur', 1, 'hashem', 'e10adc3949ba59abbe56e057f20f883e', '1545076437images.png', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(23, 1, 'Arafat Hossain', 'arafat@gmail.com', '01839389654', 4, 45, 'chadpur', 1, 'arafat', 'e10adc3949ba59abbe56e057f20f883e', '1545420832images (1).png', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(24, 2, 'Akhlima akter', 'akhlima@gmail.com', '01839389123', 3, 29, 'Uttara', 2, 'akhlima', 'e10adc3949ba59abbe56e057f20f883e', '1545495649download.jpg', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(25, 2, 'Sarmi khan', 'sarmi@gmail.com', '01839382342', 2, 14, 'Dhanmondi', 2, 'sarmi', 'e10adc3949ba59abbe56e057f20f883e', '1545495768woman-profile-cartoon-vector-6878087.jpg', 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gen_areas`
--
ALTER TABLE `gen_areas`
  ADD PRIMARY KEY (`AREA_NO`);

--
-- Indexes for table `gen_contacts`
--
ALTER TABLE `gen_contacts`
  ADD PRIMARY KEY (`CONTACT_NO`);

--
-- Indexes for table `gen_districts`
--
ALTER TABLE `gen_districts`
  ADD PRIMARY KEY (`DISTRICT_NO`);

--
-- Indexes for table `gen_divisions`
--
ALTER TABLE `gen_divisions`
  ADD PRIMARY KEY (`DIVISION_NO`);

--
-- Indexes for table `gen_parent_circulars`
--
ALTER TABLE `gen_parent_circulars`
  ADD PRIMARY KEY (`PARENT_NO`);

--
-- Indexes for table `gen_salarys`
--
ALTER TABLE `gen_salarys`
  ADD PRIMARY KEY (`SALARY_NO`);

--
-- Indexes for table `gen_student_levels`
--
ALTER TABLE `gen_student_levels`
  ADD PRIMARY KEY (`STUDENT_LEVEL_NO`);

--
-- Indexes for table `gen_student_subjects`
--
ALTER TABLE `gen_student_subjects`
  ADD PRIMARY KEY (`STUDENT_SUBJECT_NO`);

--
-- Indexes for table `gen_tuition_schedules`
--
ALTER TABLE `gen_tuition_schedules`
  ADD PRIMARY KEY (`TUITION_SCHEDULE_NO`);

--
-- Indexes for table `gen_tutor_circulars`
--
ALTER TABLE `gen_tutor_circulars`
  ADD PRIMARY KEY (`TUTOR_NO`);

--
-- Indexes for table `gen_users`
--
ALTER TABLE `gen_users`
  ADD PRIMARY KEY (`USER_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gen_areas`
--
ALTER TABLE `gen_areas`
  MODIFY `AREA_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `gen_contacts`
--
ALTER TABLE `gen_contacts`
  MODIFY `CONTACT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gen_districts`
--
ALTER TABLE `gen_districts`
  MODIFY `DISTRICT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `gen_divisions`
--
ALTER TABLE `gen_divisions`
  MODIFY `DIVISION_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gen_parent_circulars`
--
ALTER TABLE `gen_parent_circulars`
  MODIFY `PARENT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gen_salarys`
--
ALTER TABLE `gen_salarys`
  MODIFY `SALARY_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gen_student_levels`
--
ALTER TABLE `gen_student_levels`
  MODIFY `STUDENT_LEVEL_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gen_student_subjects`
--
ALTER TABLE `gen_student_subjects`
  MODIFY `STUDENT_SUBJECT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gen_tuition_schedules`
--
ALTER TABLE `gen_tuition_schedules`
  MODIFY `TUITION_SCHEDULE_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gen_tutor_circulars`
--
ALTER TABLE `gen_tutor_circulars`
  MODIFY `TUTOR_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gen_users`
--
ALTER TABLE `gen_users`
  MODIFY `USER_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
