-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2023 at 07:39 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_nawathy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(50) NOT NULL,
  `admin_contact` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(1, 'admin', '8281467319', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `batch_id` int(11) NOT NULL auto_increment,
  `batch_time` varchar(100) NOT NULL,
  `batch_day` varchar(500) NOT NULL,
  `tutorsubject_id` int(11) NOT NULL,
  PRIMARY KEY  (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`batch_id`, `batch_time`, `batch_day`, `tutorsubject_id`) VALUES
(7, '10-1', 'Monday', 2),
(8, '4-5pm', 'sunday', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_board`
--

CREATE TABLE `tbl_board` (
  `board_id` int(11) NOT NULL auto_increment,
  `board_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`board_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_board`
--

INSERT INTO `tbl_board` (`board_id`, `board_name`) VALUES
(1, 'CBSE'),
(3, 'ICSE'),
(4, 'State');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL auto_increment,
  `booking_date` varchar(100) NOT NULL,
  `booking_status` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `booking_amount` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY  (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `payment_status`, `booking_amount`, `parent_id`) VALUES
(1, '2023-11-05', '1', '1', '', 3),
(2, '2023-11-05', '1', '1', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(50) NOT NULL auto_increment,
  `tutorsubject_id` varchar(100) NOT NULL,
  `booking_id` varchar(100) NOT NULL,
  PRIMARY KEY  (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `tutorsubject_id`, `booking_id`) VALUES
(1, '4', '1'),
(2, '5', '1'),
(3, '6', '1'),
(6, '6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL auto_increment,
  `class_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_name`) VALUES
(4, 'I'),
(5, 'II'),
(6, 'III'),
(7, 'IV'),
(8, 'V'),
(9, 'VI'),
(10, 'VII'),
(11, 'VIII'),
(12, 'IX'),
(13, 'X'),
(14, 'XI'),
(15, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL default 'Not Yet Viewd',
  `complaint_status` varchar(100) NOT NULL default '0',
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_date`, `complaint_reply`, `complaint_status`, `parent_id`) VALUES
(1, 'education', 'needs improvement', '2023-10-27', 'Not Yet Viewd', '0', 2),
(2, 'materials details', 'bad', '2023-10-31', 'ok', '1', 6),
(3, 'education', 'needs improvement', '2023-11-05', 'ok', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Ernakulam'),
(7, 'Palakkad'),
(8, 'Kannur'),
(10, 'Kollam'),
(11, 'Kozhikkode'),
(12, 'Alappuzha'),
(13, 'Wayanad'),
(14, 'Thiruvananthapuram'),
(15, 'Malappuram'),
(16, 'Pathanamthitta'),
(17, 'Kasaragod'),
(18, 'Kottayam'),
(19, 'Thrissur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_date` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `parent_id`) VALUES
(1, '''good', '2023-10-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent`
--

CREATE TABLE `tbl_parent` (
  `parent_id` int(11) NOT NULL auto_increment,
  `parent_name` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `parent_contact` varchar(50) NOT NULL,
  `parent_email` varchar(50) NOT NULL,
  `student_photo` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `parent_pass` varchar(50) NOT NULL,
  PRIMARY KEY  (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_parent`
--

INSERT INTO `tbl_parent` (`parent_id`, `parent_name`, `student_name`, `parent_contact`, `parent_email`, `student_photo`, `place_id`, `parent_pass`) VALUES
(3, 'Joseph', 'Ann Mariya', '9447332030', 'joseph@gmail.com', 'IMG_3196.JPG', 3, 'Joseph1234'),
(4, 'Arathi Kishore', 'Sona Shibu', '9899765456', 'Arathi@gmail.com', 'bg1.png', 6, 'Sona1234'),
(5, 'Jose ', 'Anu', '9887663456', 'anu@gmail.com', 'Screenshot (1).png', 5, 'Anu12345'),
(6, 'Roy', 'Meera', '9946996880', 'roy@gmail.com', 'Screenshot 2023-10-02 211113.png', 4, 'Roy12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymentrecords`
--

CREATE TABLE `tbl_paymentrecords` (
  `payment_id` int(11) NOT NULL auto_increment,
  `tutor_id` varchar(500) NOT NULL,
  `payment_date` varchar(500) NOT NULL,
  PRIMARY KEY  (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_paymentrecords`
--

INSERT INTO `tbl_paymentrecords` (`payment_id`, `tutor_id`, `payment_date`) VALUES
(1, '10', '2023-10-31'),
(2, '11', '2023-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(3, 'Perumbavoor', 1),
(4, 'Kothamagalam', 1),
(5, 'munnar', 9),
(6, 'Malampuzha', 7),
(7, 'Kulathupuzha', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL auto_increment,
  `review_content` varchar(100) NOT NULL,
  `review_date` varchar(100) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY  (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_review`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL auto_increment,
  `subject_name` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  PRIMARY KEY  (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `class_id`, `board_id`) VALUES
(1, 'Mathematics', 4, 1),
(2, 'English', 4, 1),
(3, 'Hindi', 4, 1),
(4, 'Enivronmental Studies', 4, 1),
(5, 'English', 5, 1),
(6, 'Mathematics', 5, 1),
(7, 'Hindi', 5, 1),
(8, 'General Knowledge', 5, 1),
(9, 'English', 13, 1),
(10, 'Hindi', 13, 1),
(11, 'Mathematics', 13, 1),
(12, 'Social Science', 13, 1),
(13, 'Mathematics', 13, 1),
(18, 'Hindi', 12, 1),
(19, 'English', 12, 1),
(20, 'Mathematics', 12, 1),
(21, 'Science', 12, 1),
(22, 'Social Science', 12, 1),
(23, 'Hindi', 11, 1),
(24, 'Hindi', 11, 1),
(25, 'English', 11, 1),
(26, 'Mathematics', 11, 1),
(27, 'Social Science', 11, 1),
(28, 'Science', 11, 1),
(29, 'IT', 11, 1),
(30, 'Hindi', 10, 1),
(31, 'English', 10, 1),
(32, 'Mathematics', 10, 1),
(33, 'Science', 10, 1),
(34, 'Social Science', 10, 1),
(35, 'English', 9, 1),
(36, 'Hindi', 9, 1),
(37, 'Mathematics', 9, 1),
(38, 'Social Science', 9, 1),
(39, 'Science', 9, 1),
(40, 'Mathematics', 8, 1),
(41, 'Hindi', 8, 1),
(42, 'EVS', 8, 1),
(43, 'English', 8, 1),
(44, 'Hindi', 7, 1),
(45, 'English', 7, 1),
(46, 'EVS', 7, 1),
(47, 'Mathematics', 7, 1),
(48, 'Hindi', 6, 1),
(49, 'English', 6, 1),
(50, 'Mathematics', 6, 1),
(51, 'EVS', 6, 1),
(52, 'English', 4, 3),
(53, 'Hindi', 4, 3),
(54, 'Mathematics', 4, 3),
(55, 'Environmental Studies', 4, 3),
(56, 'Computer Studies', 4, 3),
(57, 'English', 5, 3),
(58, 'Hindi', 5, 3),
(59, 'Mathematics', 5, 3),
(60, 'Environmental Studies', 5, 3),
(61, 'Computer Studies', 5, 3),
(62, 'English', 6, 3),
(63, 'Hindi', 6, 3),
(64, 'Mathematics', 6, 3),
(65, 'Science', 6, 3),
(66, 'Social Studies', 6, 3),
(67, 'Computer Studies', 6, 3),
(68, 'English', 7, 3),
(69, 'Hindi', 7, 3),
(70, 'Mathematics', 7, 3),
(71, 'Science', 7, 3),
(72, 'Social Studies', 7, 3),
(73, 'English', 8, 3),
(74, 'Hindi', 8, 3),
(75, 'Mathematics', 8, 3),
(76, 'Science', 8, 3),
(77, 'Social Studies', 8, 3),
(78, 'Computer Studies', 8, 3),
(79, 'General Knowledge', 8, 3),
(80, 'English', 9, 3),
(81, 'Hindi', 9, 3),
(82, 'Mathematics', 9, 3),
(83, 'Physics', 9, 3),
(84, 'Biology', 9, 3),
(85, 'Chemistry', 9, 3),
(86, 'Civics', 9, 3),
(87, 'English', 10, 3),
(88, 'Hindi', 10, 3),
(89, 'Mathematics', 10, 3),
(90, 'Physics', 10, 3),
(91, 'Chemistry', 10, 3),
(92, 'Biology', 10, 3),
(93, 'Social Science', 10, 3),
(94, 'English', 11, 3),
(95, 'Hindi', 11, 3),
(96, 'Mathematics', 11, 3),
(97, 'History', 11, 3),
(98, 'Geography', 11, 3),
(99, 'Civics', 11, 3),
(100, 'Mathematics', 11, 3),
(101, 'General Knowlege', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor`
--

CREATE TABLE `tbl_tutor` (
  `tutor_id` int(11) NOT NULL auto_increment,
  `tutor_name` varchar(50) NOT NULL,
  `tutor_gender` varchar(50) NOT NULL,
  `tutor_contact` varchar(50) NOT NULL,
  `tutor_email` varchar(50) NOT NULL,
  `tutor_address` varchar(100) NOT NULL,
  `tutor_qualification` varchar(50) NOT NULL,
  `t_photo` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `t_proof` varchar(50) NOT NULL,
  `t_password` varchar(50) NOT NULL,
  `t_status` int(11) NOT NULL,
  PRIMARY KEY  (`tutor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_tutor`
--

INSERT INTO `tbl_tutor` (`tutor_id`, `tutor_name`, `tutor_gender`, `tutor_contact`, `tutor_email`, `tutor_address`, `tutor_qualification`, `t_photo`, `place_id`, `t_proof`, `t_password`, `t_status`) VALUES
(3, 'alka', 'female', '5667', 'alka@gmail.com', 'tyg', 'jj', 'Screenshot (1).png', 4, 'Screenshot (1).png', 'alka', 1),
(4, 'Mariya', 'female', '9946996880', 'mariya@gmail.com', 'sreebhavan', 'mca', 'IMG_3198.jpg', 4, 'IMG_3199.PNG', 'Mariya1234', 1),
(6, 'Denna k', 'female', '6790456782', 'denna@gmail.com', 'abc', 'bca', 'Screenshot 2023-10-30 161725.png', 3, 'Screenshot 2023-10-02 211129.png', 'Denna1234', 1),
(7, 'Amala Joshy', 'female', '7890543678', 'Amala@gmail.com', 'no home', 'nothing', 'IMG_2259.png.JPG', 5, 'Screenshot 2023-10-02 211129.png', 'Amala1234', 0),
(8, 'Rena noor', 'female', '9946996880', 'rena@gmail.com', 'abcd', 'mca', 'Screenshot 2023-10-02 211129.png', 3, 'Screenshot 2023-10-02 211113.png', 'Rena1234', 2),
(9, 'Sharath', 'male', '9667330289', 'sonashibu240@gmail.com', 'abc', 'nothing', 'Screenshot 2023-10-30 161725.png', 6, 'Screenshot 2023-10-02 211129.png', 'Sharath1234', 2),
(10, 'Amala Joshy', 'female', '9846935816', 'Amala@gmail.com', 'no home', 'wdcsfdv', 'Screenshot 2023-10-02 211113.png', 3, 'Screenshot 2023-10-02 211113.png', 'Anjana@jan151999', 1),
(11, 'Parvathy Kalesh', 'female', '9946996880', 'parvathykalesh743@gmail.com', 'abc(h)', 'BCA', 'Your paragraph text.png', 7, 'Untitled Document - Mozilla Firefox 01-09-2023 12_', 'Parvathy123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutorsubjects`
--

CREATE TABLE `tbl_tutorsubjects` (
  `tutorsubject_id` int(11) NOT NULL auto_increment,
  `subject_id` varchar(100) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subject_rate` varchar(50) NOT NULL,
  PRIMARY KEY  (`tutorsubject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_tutorsubjects`
--

INSERT INTO `tbl_tutorsubjects` (`tutorsubject_id`, `subject_id`, `tutor_id`, `subject_rate`) VALUES
(1, '5', 2, '500'),
(2, '35', 4, '500'),
(3, '75', 8, '500'),
(4, '93', 4, '500'),
(5, '93', 4, '500'),
(6, '39', 4, '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploadvideo`
--

CREATE TABLE `tbl_uploadvideo` (
  `upload_id` int(11) NOT NULL auto_increment,
  `upload_video` varchar(100) NOT NULL,
  `upload_description` varchar(100) NOT NULL,
  `tutorsubject_id` int(11) NOT NULL,
  PRIMARY KEY  (`upload_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_uploadvideo`
--

INSERT INTO `tbl_uploadvideo` (`upload_id`, `upload_video`, `upload_description`, `tutorsubject_id`) VALUES
(12, 'd48a8be286eedddb46b192dfc1bb3fc3.MOV', 'jkjf', 1),
(15, 'production_id_5198169 (360p).mp4', 'welcome', 3);
