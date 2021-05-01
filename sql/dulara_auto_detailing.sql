-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 08:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dulara_auto_detailing`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) DEFAULT NULL,
  `cus_vehicle_no` varchar(8) NOT NULL,
  `cus_add_l1` varchar(255) DEFAULT NULL,
  `cus_add_l2` varchar(255) DEFAULT NULL,
  `cus_add_l3` varchar(255) DEFAULT NULL,
  `cus_add_l4` varchar(255) DEFAULT NULL,
  `cus_cn1` varchar(10) DEFAULT NULL,
  `cus_cn2` varchar(10) DEFAULT NULL,
  `cus_email` varchar(255) DEFAULT NULL,
  `cus_created_user_id` int(11) DEFAULT 1,
  `cus_created_at` timestamp NULL DEFAULT current_timestamp(),
  `cus_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_vehicle_no`, `cus_add_l1`, `cus_add_l2`, `cus_add_l3`, `cus_add_l4`, `cus_cn1`, `cus_cn2`, `cus_email`, `cus_created_user_id`, `cus_created_at`, `cus_status`) VALUES
(1, 'Ishara Perera', 'BBX-9190', '185/A/2', 'Bollatha', 'Ganemulla', 'Western Provice, Sri Lanka', '0778154411', '0762084411', 'esoft.isharaperera@gmail.com', 1, '2020-10-26 01:43:21', 1),
(2, 'Udara Sampath', 'CAR-4567', 'No 56', 'New World Avenue', 'New York', 'USA', '0718054352', '0786642006', 'usa@hotmail.com', 1, '2020-10-26 01:43:21', 1),
(3, 'Lasini Senevirathne', 'BBY-9190', 'No 05/A', 'Nalapaha', 'Divlapitiya', 'Sri Lanka', '0762084411', '0778154411', 'lasini.senevirathne@icloud.com', 1, '2020-10-26 01:43:21', 1),
(4, 'Customer 4', 'CIA-5690', 'Home no', 'Street', 'City', 'State', '0712345678', '0798765432', 'customer4@email.com', 1, '2020-10-26 01:43:21', 1),
(6, 'Kelum', 'BBY-9342', '185/A/2', 'Bollatha', 'Ganemulla', 'Western Provice, Sri Lanka', '0781236549', '0772299007', '', 1, '2020-10-26 01:43:21', 1),
(9, 'Nuwan Nimasha', 'BBE-9876', '', '', '', '', '0754123659', '', '', 1, '2020-10-26 01:43:21', 1),
(10, 'Niroshan Premarathtne', 'BSX-8767', '', '', '', '', '0781235496', '0712458963', 'niroshan@email.com', 1, '2020-10-26 01:43:21', 1),
(11, 'Kethaka Ranasinghe', 'KE-8978', '', '', '', '', '0764789651', '781', 'kethaka@gmail.comf', 1, '2020-10-26 01:43:21', 1),
(12, 'Sudarshan Perera', 'XSW-1234', '', '', '', '', '0778154411', '', '', 1, '2021-01-27 14:35:11', 1),
(13, 'Dilum Karunarathne', 'TTA-3456', '', '', '', '', '0778154411', 'f', '', 1, '2021-01-27 14:35:43', 1),
(14, 'Notification Test', 'HSD-6745', 'No 67', 'Bollatha', '', '', '0715441187', '', 'sunnarachitha@email.com', 1, '2021-01-27 14:38:35', 1),
(15, 'Hemal Rathnayake', 'DCX-4567', '', '', '', '', '0718254856', 'df', '', 1, '2021-01-28 16:11:30', 1),
(16, 'Nanda Kumara', 'CDF-5678', '172', 'Wevallagara Rd, Bollatha', 'Ganemulla', '', '0764587965', '0768541258', 'nandakumara@gmail.com', 1, '2021-03-23 14:04:32', 1),
(17, 'Nanda Kumara', 'CDF-5678', '', '', '', '', '0769852147', '', '', 1, '2021-03-23 14:07:07', 1),
(18, 'Roger Rogans', 'CX-4534', '145', 'Drug Avenue', 'New York', 'USA', '0784512369', '1478932', '', 1, '2021-03-25 11:56:41', 1),
(19, 'Kamal Ranasinghe', 'CWW-9087', '23', 'Galle Rd,', 'Colombo', '', '0715098523', '', '', 1, '2021-04-13 02:37:47', 1),
(22, 'Kamal', 'RTF-4567', '185/A/2', 'Bollatha', 'Ganemulla', 'Sri Lanka', '0778154411', '', 'esoft.isharaperera@gmail.com', 1, '2021-04-15 16:24:15', 1),
(23, 'Malindi', 'CCX-5678', '', '', '', '', '0775623894', '', '', 1, '2021-04-15 16:27:56', 1),
(24, 'Shermila', 'CAA-5623', '', '', '', '', '0778963541', '', '', 1, '2021-04-15 16:30:31', 1),
(25, 'Chathu', 'DEF-1234', '', '', '', '', '0758489632', '', '', 1, '2021-04-15 16:31:26', 1),
(26, 'Dilmi', 'TFR-4531', '', '', '', '', '0784563214', '', '', 1, '2021-04-15 16:33:00', 1),
(27, 'Nipuni Sanjana', 'GRC-5643', '', '', '', '', '0741258478', '', '', 1, '2021-04-15 16:35:05', 1),
(28, 'Chamodi', 'AAA-4312', '', '', '', '', '0778451698', '', '', 1, '2021-04-15 16:39:24', 1),
(29, 'Hiran', 'AAA-9871', '', '', '', '', '0784512369', '', '', 1, '2021-04-15 16:41:12', 1),
(30, 'Kumara Sandaruwa', 'AAB-7856', 'No. 23', 'Bohaga Junction', 'Kurunegala', 'Sri Lanka', '0784512965', '', '', 1, '2021-04-15 23:36:14', 1),
(31, 'Padmakumara Ratnayake', 'SD-3981', 'No 45,', 'Pannala Rd', 'Kuliyapitiya', 'Sri Lanka', '0718965231', '0789854123', 'pkratnayake@gmail.com', 1, '2021-05-01 01:58:02', 1),
(32, 'Saman Kumara', 'EE-3456', '', '', '', '', '0774512369', '0789645123', '', 1, '2021-05-01 06:15:45', 1),
(33, 'Krish Kumar', 'AA-4567', '', '', '', '', '0714589632', '0774581245', '', 1, '2021-05-01 06:25:43', 1),
(34, 'David Perera', 'XXX-4578', '', '', '', '', '0714589632', '0778457896', '', 1, '2021-05-01 06:31:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_cus_name` text DEFAULT NULL,
  `feedback_cus_vno` varchar(255) DEFAULT NULL,
  `feedback_invoice` varchar(255) DEFAULT NULL,
  `feedback_star_rating` int(11) DEFAULT NULL,
  `feedback_review` text DEFAULT NULL,
  `feedback_is_liked` int(11) DEFAULT 0,
  `feedback_is_replied` int(11) DEFAULT 0,
  `feedback_reply` text DEFAULT NULL,
  `feedback_created_at` timestamp NULL DEFAULT current_timestamp(),
  `feedback_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`feedback_id`, `feedback_cus_name`, `feedback_cus_vno`, `feedback_invoice`, `feedback_star_rating`, `feedback_review`, `feedback_is_liked`, `feedback_is_replied`, `feedback_reply`, `feedback_created_at`, `feedback_status`) VALUES
(1, 'Ishara Perera', 'BBX-9190', 'INT1', 3, 'Good', 1, 1, 'Thank you for the feedback!', '2021-04-18 09:47:45', 1),
(2, 'Lasini Senevirathne', 'BBY-9190', '8', 5, 'Very Good!', 1, 1, 'Thank you Madame! See you soon...', '2021-04-18 09:49:25', 1),
(3, 'Lasini Senevirathne', 'BBY-9190', '8', 4, 'Very Good!', 1, 1, 'Thank you for the feedback', '2021-04-18 09:50:25', 1),
(4, 'Test', 'BBY-9871', '1', 3, 'Test', 0, 0, NULL, '2021-04-18 09:50:57', 1),
(5, 'Test2', 'CAR-4567', '1', 2, 'Test2', 0, 0, NULL, '2021-04-18 09:51:28', 1),
(6, 'Test3', 'VVV-8970', '1', 5, 'Test3', 0, 0, NULL, '2021-04-18 09:52:35', 1),
(7, 'Test3', 'VVV-8970', '1', 5, 'Test3', 0, 0, NULL, '2021-04-18 09:52:38', 1),
(8, 'Ishara', 'BBX-9190', '2', 5, 'Hello', 0, 0, '', '2021-04-18 09:54:04', 1),
(9, 'Ishara', 'BBX-9190', '2', 5, 'Hello', 0, 0, NULL, '2021-04-18 09:54:33', 1),
(12, 'Niroshan Premarathne', 'BSX-8767', '10', 5, 'Really good!', 1, 1, 'Thank you Niroshan sir! Come again soon...', '2021-04-18 09:56:52', 1),
(13, 'Test3', 'BBV-0391', '1', 5, 'Test3', 0, 0, NULL, '2021-04-18 09:58:14', 1),
(14, 'Dinuth Randika', 'TTT-3456', '23', 5, 'Really Appreaciated!', 0, 0, NULL, '2021-04-18 13:12:31', 1),
(15, 'Kelum', 'BBY-9342', '0', 1, 'Service Was Poor!', 1, 1, 'Sorry for any convenience sir! We will get back to you soon...', '2021-04-19 08:05:43', 1),
(16, 'Kethaka Ranasinghe', 'KE-8978', '36', 3, 'The service was good! But the prize was too high!', 1, 1, 'Thank you for the feedback sir! We will have our concern on the service prize! - Thank you!', '2021-04-21 06:35:09', 1),
(18, 'Nuwan Nimasha', 'BBE-9876', '49', 4, 'Very good service to be honest!', 1, 1, 'Thank you Nuwan sir!', '2021-04-21 07:24:51', 1),
(19, 'Udara', 'CAR-4567', '2', 3, 'Good service!', 1, 1, 'Thank you Udara! Come again...', '2021-04-22 13:35:04', 1),
(20, 'Niroshan Premarathne', 'BSX-8767', '41', 5, 'I am impressed!', 0, 0, NULL, '2021-04-23 08:34:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback_message`
--

CREATE TABLE `customer_feedback_message` (
  `cfm_id` int(11) NOT NULL,
  `cfm_heading` text DEFAULT NULL,
  `cfm_message` text DEFAULT NULL,
  `cfm_type` varchar(255) DEFAULT NULL,
  `cfm_to_whom` varchar(255) DEFAULT NULL,
  `cfm_specific_customers` varchar(255) DEFAULT NULL,
  `cfm_when` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_feedback_message`
--

INSERT INTO `customer_feedback_message` (`cfm_id`, `cfm_heading`, `cfm_message`, `cfm_type`, `cfm_to_whom`, `cfm_specific_customers`, `cfm_when`) VALUES
(1, 'df', 'dfs', '', '', '', ''),
(2, 'df', 'dfs', 'Array', 'Array', 'Array', 'Array'),
(3, 'sdf', 'sdfsdf', '[\"sms\",\"email\"]', '[\"new-customers\",\"loyal-customers\",\"specific-customers\"]', '[\"Ishara Perera\",\"Lasini Senevirathne\",\"Sudarshan Perera\"]', '[\"on-arrival\",\"on-leave\"]'),
(4, 'sdf', 'sdfsdf', '\"\"', '\"\"', '\"\"', '\"\"'),
(5, 'Welcome to Dulara Auto Detaling', 'You are welcome for obtaining finest automobile services in the area!', '[\"sms\"]', '[\"new-customers\"]', '\"\"', '[\"on-arrival\"]'),
(6, 'Welcome to Dulara Auto Detaling', 'You are welcome for obtaining finest automobile services in the area!', '[\"sms\"]', '[\"new-customers\"]', '\"\"', '[\"on-arrival\"]');

-- --------------------------------------------------------

--
-- Table structure for table `customer_loyalty`
--

CREATE TABLE `customer_loyalty` (
  `loyalty_id` int(11) NOT NULL,
  `loyalty_name` varchar(255) NOT NULL,
  `loyalty_points` int(11) DEFAULT NULL,
  `loyalty_reward` varchar(255) DEFAULT NULL,
  `loyalty_description` text DEFAULT NULL,
  `loyalty_created_at` timestamp NULL DEFAULT current_timestamp(),
  `loyalty_created_user_id` int(11) DEFAULT NULL,
  `loyalty_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_loyalty`
--

INSERT INTO `customer_loyalty` (`loyalty_id`, `loyalty_name`, `loyalty_points`, `loyalty_reward`, `loyalty_description`, `loyalty_created_at`, `loyalty_created_user_id`, `loyalty_status`) VALUES
(1, 'Small', 2, '50% off from the next service', 'Create Loyalty Program Test', '2021-04-15 06:52:37', NULL, 1),
(2, 'Medium', 7, '2 Items free of charge', 'Creating Loyalty Programs', '2021-04-15 06:55:21', NULL, 1),
(3, 'Large', 10, 'Free Service', 'Create Loyalty Program', '2021-04-15 06:55:37', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_loyalty_color`
--

CREATE TABLE `customer_loyalty_color` (
  `clc_id` int(11) NOT NULL,
  `clc_loyalty_id` int(11) NOT NULL,
  `clc_color` varchar(255) NOT NULL,
  `clc_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_loyalty_color`
--

INSERT INTO `customer_loyalty_color` (`clc_id`, `clc_loyalty_id`, `clc_color`, `clc_created_at`) VALUES
(1, 1, 'primary', '2021-04-16 03:31:34'),
(2, 2, 'warning', '2021-04-16 03:31:34'),
(3, 3, 'secondary', '2021-04-16 03:31:34'),
(4, 4, 'success', '2021-04-16 03:31:34'),
(5, 5, 'secondary', '2021-04-16 03:31:34'),
(6, 6, 'muted', '2021-04-16 03:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `customer_points`
--

CREATE TABLE `customer_points` (
  `cp_id` int(11) NOT NULL,
  `cp_category_name` varchar(255) DEFAULT NULL,
  `cp_points` int(11) DEFAULT NULL,
  `cp_description` text DEFAULT NULL,
  `cp_created_at` timestamp NULL DEFAULT current_timestamp(),
  `cp_created_user_id` int(11) DEFAULT NULL,
  `cp_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_points`
--

INSERT INTO `customer_points` (`cp_id`, `cp_category_name`, `cp_points`, `cp_description`, `cp_created_at`, `cp_created_user_id`, `cp_status`) VALUES
(1, 'New Customer Visit', 1, 'The points are allocated to any new customer or new customer visits', '2021-04-15 16:51:43', NULL, 1),
(2, 'Customer Referral', 5, 'The points are allocated to customer who introduced to customers to the company. 2 points will be granted for the referrer for each new customer he introduces.', '2021-04-15 16:53:05', NULL, 1),
(3, 'Feedback Response', 1, 'The points are allocated to customers who respond to feedback sms', '2021-04-15 16:54:40', NULL, 1),
(4, 'Ratings and Reviews', 1, 'The points are allocated to the customers who provide ratings and reviews on the website!', '2021-04-19 07:50:03', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_point_allocation`
--

CREATE TABLE `customer_point_allocation` (
  `cpa_id` int(11) NOT NULL,
  `cpa_cus_id` int(11) NOT NULL,
  `cpa_point_id` int(11) NOT NULL,
  `cpa_created_at` timestamp NULL DEFAULT current_timestamp(),
  `cpa_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_point_allocation`
--

INSERT INTO `customer_point_allocation` (`cpa_id`, `cpa_cus_id`, `cpa_point_id`, `cpa_created_at`, `cpa_status`) VALUES
(1, 30, 1, '2021-04-15 23:36:15', 1),
(2, 30, 2, '2021-04-15 23:56:14', 1),
(3, 30, 3, '2021-04-16 00:51:57', 1),
(4, 1, 3, '2021-04-16 06:35:09', 1),
(5, 6, 4, '2021-04-19 08:05:43', 1),
(6, 11, 4, '2021-04-21 06:35:09', 1),
(7, 0, 4, '2021-04-21 07:21:16', 1),
(8, 9, 4, '2021-04-21 07:24:51', 1),
(9, 2, 4, '2021-04-22 13:35:04', 1),
(10, 10, 4, '2021-04-23 08:34:02', 1),
(11, 31, 1, '2021-05-01 01:58:03', 1),
(12, 31, 2, '2021-05-01 01:58:03', 1),
(13, 32, 1, '2021-05-01 06:15:46', 1),
(14, 32, 2, '2021-05-01 06:15:46', 1),
(15, 33, 1, '2021-05-01 06:25:43', 1),
(16, 33, 2, '2021-05-01 06:25:43', 1),
(17, 34, 1, '2021-05-01 06:31:34', 1),
(18, 1, 2, '2021-05-01 06:31:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_referral`
--

CREATE TABLE `customer_referral` (
  `cr_id` int(11) NOT NULL,
  `cr_referrer_id` int(11) NOT NULL,
  `cr_referee_id` int(11) NOT NULL,
  `cr_description` text DEFAULT NULL,
  `cr_created_at` timestamp NULL DEFAULT current_timestamp(),
  `cr_created_user_id` int(11) DEFAULT NULL,
  `cr_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_referral`
--

INSERT INTO `customer_referral` (`cr_id`, `cr_referrer_id`, `cr_referee_id`, `cr_description`, `cr_created_at`, `cr_created_user_id`, `cr_status`) VALUES
(1, 6, 30, NULL, '2021-04-15 16:24:15', NULL, 1),
(2, 3, 24, 'Customer Referral Test 2', '2021-04-15 16:30:31', NULL, 1),
(3, 0, 25, '', '2021-04-15 16:31:26', NULL, 1),
(4, 0, 26, '', '2021-04-15 16:33:00', NULL, 1),
(5, 0, 27, '', '2021-04-15 16:35:05', NULL, 1),
(6, 2, 29, 'Word of Mouth', '2021-04-15 16:41:12', NULL, 1),
(7, 1, 34, '', '2021-05-01 06:31:34', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_fn` varchar(255) DEFAULT NULL,
  `emp_ln` varchar(255) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_nic` varchar(12) DEFAULT NULL,
  `emp_license_type` varchar(255) DEFAULT NULL,
  `emp_license_no` varchar(255) DEFAULT NULL,
  `emp_blood_group` varchar(3) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `emp_epf_no` varchar(255) DEFAULT NULL,
  `emp_etf_no` varchar(255) DEFAULT NULL,
  `emp_designation` varchar(255) DEFAULT NULL,
  `emp_app_date` date DEFAULT NULL,
  `emp_job_description` text DEFAULT NULL,
  `emp_status` int(11) DEFAULT 1,
  `emp_created_at` timestamp NULL DEFAULT current_timestamp(),
  `emp_created_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_fn`, `emp_ln`, `emp_dob`, `emp_nic`, `emp_license_type`, `emp_license_no`, `emp_blood_group`, `emp_email`, `emp_address`, `emp_epf_no`, `emp_etf_no`, `emp_designation`, `emp_app_date`, `emp_job_description`, `emp_status`, `emp_created_at`, `emp_created_user_id`) VALUES
(1, 'Ishara', 'Perera', '1997-06-29', '971812869V', 'heavy', '66478455D', 'O+', 'ishara.perera@icloud.com', 'No. 185/A/2, Bollatha, Ganemulla.', '1478', '1479', 'DBA', '2020-10-25', 'Handles all the database related affairs of the system', 1, '2020-10-25 14:02:12', NULL),
(2, 'Kelumisf', 'Siriwardhene', '1999-05-23', '199978451248', 'light', '457895D', 'AB+', 'kelum.siriwardhene@dulara.lk', 'No. 5, Colombo Rd, Gampaha', '1785', '4598', 'Mechanic', '2020-10-25', 'Automobile Mechanic', 1, '2020-10-25 14:15:19', NULL),
(3, 'Sunil', 'Susantha', '1968-05-23', '687895412V', 'choose', '', 'AB+', '', '', '', '', 'Mechanic', '2021-01-27', '', 1, '2021-01-27 15:27:34', NULL),
(4, 'Sudath', 'Verehara', '2021-01-07', '971856487V', 'choose', '', 'O+', '', '', '', '', 'Accountant', '2021-01-28', '', 1, '2021-01-28 16:23:01', NULL),
(5, 'Nanda', 'Kumara', '2001-10-24', '200178456987', 'light', '7845962', 'AB+', 'nandakumara@email.com', 'Colombo', '', '', 'Mechanic', '2021-03-25', '', 1, '2021-03-25 06:36:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_contact`
--

CREATE TABLE `employee_contact` (
  `emp_contact_id` int(11) NOT NULL,
  `emp_contact_type` varchar(255) DEFAULT NULL,
  `emp_contact_no` varchar(10) DEFAULT NULL,
  `emp_contact_emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_contact`
--

INSERT INTO `employee_contact` (`emp_contact_id`, `emp_contact_type`, `emp_contact_no`, `emp_contact_emp_id`) VALUES
(1, 'Home', '0335682323', 1),
(2, 'Mobile', '0778154411', 1),
(3, 'Mobile', '0784578965', 2),
(4, 'Mobile', '0778451236', 2),
(5, 'Mobile', '0714587965', 2),
(6, 'Home', '0112240148', 3),
(7, 'Home', '0718054952', 4),
(8, 'Mobile', '0714587962', 5);

-- --------------------------------------------------------

--
-- Table structure for table `employee_illness`
--

CREATE TABLE `employee_illness` (
  `emp_illness_id` int(11) NOT NULL,
  `emp_illness_name` varchar(255) DEFAULT NULL,
  `emp_illness_is_going` int(11) DEFAULT NULL,
  `emp_illness_emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_illness`
--

INSERT INTO `employee_illness` (`emp_illness_id`, `emp_illness_name`, `emp_illness_is_going`, `emp_illness_emp_id`) VALUES
(1, 'Corona', 1, 1),
(2, 'Cough', 0, 1),
(3, 'AIDS', 1, 1),
(4, 'Aids', 1, 2),
(5, 'Cough', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_roster`
--

CREATE TABLE `employee_roster` (
  `emp_roster_id` int(11) NOT NULL,
  `emp_roster_in_time` time DEFAULT NULL,
  `emp_roster_out_time` time DEFAULT NULL,
  `emp_roster_off_day` varchar(255) DEFAULT NULL,
  `emp_roster_half_day` varchar(255) DEFAULT NULL,
  `emp_roster_emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_roster`
--

INSERT INTO `employee_roster` (`emp_roster_id`, `emp_roster_in_time`, `emp_roster_out_time`, `emp_roster_off_day`, `emp_roster_half_day`, `emp_roster_emp_id`) VALUES
(1, '09:00:00', '18:00:00', 'Tue', 'Fri', 1),
(2, '08:00:00', '17:00:00', 'Fri', 'Thu', 2),
(3, '08:00:00', '18:00:00', 'Mon', 'Mon', 3),
(4, '08:00:00', '18:00:00', 'Mon', 'Mon', 4),
(5, '08:00:00', '18:00:00', 'Mon', 'Mon', 5);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `invoice_item_total_amount` int(11) DEFAULT NULL,
  `invoice_service_total_amount` int(11) DEFAULT NULL,
  `invoice_amount` int(11) DEFAULT NULL,
  `invoice_created_at` timestamp NULL DEFAULT current_timestamp(),
  `invoice_created_user_id` int(11) DEFAULT NULL,
  `invoice_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `job_id`, `invoice_item_total_amount`, `invoice_service_total_amount`, `invoice_amount`, `invoice_created_at`, `invoice_created_user_id`, `invoice_status`) VALUES
(36, 6, 3000, 300, 3300, '2020-09-29 13:22:53', NULL, 1),
(37, 4, 3400, 1800, 5200, '2020-09-29 17:35:14', NULL, 1),
(38, 11, 10000, 1500, 11500, '2020-10-26 00:56:53', NULL, 1),
(40, 8, 5000, 1500, 6500, '2021-01-24 10:15:35', NULL, 1),
(41, 10, 166800, 1300, 168100, '2021-01-27 14:05:53', NULL, 1),
(42, 9, 0, 1500, 1500, '2021-01-28 10:37:11', NULL, 1),
(43, 15, 6500, 1500, 8000, '2021-01-28 10:42:48', NULL, 1),
(44, 5, 5000, 1500, 6500, '2021-03-29 01:30:42', NULL, 1),
(45, 21, 0, 1500, 1500, '2021-03-29 01:39:44', NULL, 1),
(46, 22, 45000, 1500, 46500, '2021-04-13 02:42:41', NULL, 1),
(48, 37, 8200, 1500, 9700, '2021-04-19 09:18:04', NULL, 1),
(50, 34, 2000, 1500, 3500, '2021-05-01 02:39:02', NULL, 1),
(51, 17, 5000, 1500, 6500, '2021-05-01 02:42:05', NULL, 1),
(52, 36, 2000, 0, 2000, '2021-05-01 02:47:46', NULL, 1),
(53, 39, 2000, 0, 2000, '2021-05-01 02:55:04', NULL, 1),
(54, 40, 0, 1500, 1500, '2021-05-01 02:59:08', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE `invoice_item` (
  `id` int(11) NOT NULL,
  `invoice_item_id` int(11) DEFAULT NULL,
  `invoice_item_qty` int(11) DEFAULT NULL,
  `invoice_item_price` int(11) DEFAULT NULL,
  `invoice_item_amount` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`id`, `invoice_item_id`, `invoice_item_qty`, `invoice_item_price`, `invoice_item_amount`, `invoice_id`) VALUES
(27, 1, 1, 1000, 1000, 36),
(28, 6, 1, 1000, 1000, 36),
(29, 7, 1, 1000, 1000, 36),
(30, 8, 2, 1200, 2400, 37),
(31, 7, 1, 1000, 1000, 37),
(32, 1, 10, 1000, 10000, 38),
(33, 8, 45, 1200, 0, 39),
(34, 0, 0, 0, 0, 39),
(35, 1, 4, 1000, 4000, 40),
(36, 11, 2, 500, 1000, 40),
(37, 8, 14, 1200, 16800, 41),
(38, 10, 10, 15000, 150000, 41),
(39, 10, 0, 15000, 0, 42),
(40, 0, 0, 0, 0, 42),
(41, 1, 2, 850, 1700, 43),
(42, 8, 4, 1200, 4800, 43),
(43, 0, 0, 0, 0, 43),
(44, 1, 5, 1000, 5000, 44),
(45, 1, 45, 1000, 45000, 46),
(46, 6, 7, 1000, 0, 47),
(47, 1, 5, 1000, 5000, 48),
(48, 14, 4, 800, 3200, 48),
(49, 1, 2, 1000, 2000, 50),
(50, 6, 2, 1000, 2000, 51),
(51, 7, 3, 1000, 3000, 51),
(52, 1, 2, 1000, 2000, 52),
(53, 1, 2, 1000, 2000, 53);

--
-- Triggers `invoice_item`
--
DELIMITER $$
CREATE TRIGGER `updateStock` BEFORE INSERT ON `invoice_item` FOR EACH ROW BEGIN
	UPDATE item_stock SET item_stock.item_stock_qty = item_stock.item_stock_qty - NEW.invoice_item_qty WHERE NEW.invoice_item_id = item_stock.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_service`
--

CREATE TABLE `invoice_service` (
  `id` int(11) NOT NULL,
  `invoice_service_id` int(11) DEFAULT NULL,
  `invoice_service_price` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_service`
--

INSERT INTO `invoice_service` (`id`, `invoice_service_id`, `invoice_service_price`, `invoice_id`) VALUES
(18, 2, 300, 36),
(19, 1, 1500, 37),
(20, 2, 300, 37),
(21, 2, 1500, 38),
(22, 7, 1500, 40),
(23, 1, 1300, 41),
(24, 2, 1500, 42),
(25, 2, 1500, 43),
(26, 2, 1500, 44),
(27, 7, 1500, 45),
(28, 12, 1500, 46),
(29, 7, 1500, 48),
(30, 12, 1500, 49),
(31, 7, 1500, 50),
(32, 2, 1500, 51),
(33, 2, 1500, 54);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_manu_code` varchar(255) DEFAULT NULL,
  `item_manu_name` varchar(255) DEFAULT NULL,
  `item_supplier_id` int(11) DEFAULT NULL,
  `item_sale_uprice` double DEFAULT NULL,
  `item_purchase_uprice` double DEFAULT NULL,
  `item_handling` double DEFAULT NULL,
  `item_discount` double DEFAULT NULL,
  `item_vat_rate` int(11) DEFAULT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `item_size_id` int(11) DEFAULT NULL,
  `item_location` varchar(255) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `item_created_at` timestamp NULL DEFAULT current_timestamp(),
  `item_created_user_id` int(11) DEFAULT 1,
  `item_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_manu_code`, `item_manu_name`, `item_supplier_id`, `item_sale_uprice`, `item_purchase_uprice`, `item_handling`, `item_discount`, `item_vat_rate`, `item_category_id`, `item_size_id`, `item_location`, `item_description`, `item_created_at`, `item_created_user_id`, `item_status`) VALUES
(1, 'Air Filters', 'MG9084', 'Toyota Lasini', 1, 1000, 45000, 105000, 1800001, 1000, 1, 2, 'Australia', 'This is the first item for testing purposes', '2020-09-13 12:09:35', 1, 1),
(6, 'Toyota Engine Oil', 'I567', 'Toyota', 2, 1000, 800, 10, 100, 5, 2, 2, 'Giriulla', 'Toyota Vehicle Engine Oil', '2020-09-13 12:11:23', 1, 1),
(7, 'Test Item 1', 'M1', 'Manufacturer1', 3, 1000, 800, 10, 100, 5, 2, 3, 'Location', 'Hello, are you going to database?', '2020-09-13 14:04:32', 1, 1),
(8, 'Brake Pad', 'Manufacturer Codesdfsdf', 'Manufacturer Name', 1, 1200, 1000, 10, 100, 0, 1, 1, 'Locaiton', 'Description', '2020-09-14 06:08:28', 1, 1),
(10, 'dfsd', '', '', 2, 15000, 1000, 0, 0, 0, 2, 4, '', '', '2020-09-14 07:06:51', 1, 1),
(11, 'Item validation', '', '', 3, 500, 1000, 0, 0, 0, 1, 5, '', '', '2020-09-14 07:15:58', 1, 1),
(12, 'Item Validation 2', '', '', 1, 1000, 1000, 0, 0, 0, 2, 6, '', '', '2020-09-14 07:18:06', 1, 1),
(13, 'Test Item 2', 'MF10001', 'Test Manu', 2, 1500, 1000, 10, 100, 5, 2, 3, 'Ganemulla', 'The Finest Engine Oil that is good for nothing!', '2020-09-15 02:05:15', 1, 1),
(14, 'Red Hood', 'MF12345', 'South Africa', 3, 800, 500, 0, 10, 5, 3, 6, 'SA', '', '2020-09-15 02:12:42', 1, 1),
(15, 'Oil Cans', 'MF002', 'Havoline', 2, 5000, 200, 10, 50, 5, 2, 2, 'Radawana', 'The finest oil in the Sri Lanka', '2020-09-17 06:47:46', 1, 1),
(16, 'Test Cases for New Item', '', '', 1, 45.32, 0.03, 0, 0, 0, 1, 0, '', '', '2021-01-27 01:17:41', 1, 1),
(17, 'Test Result', '', '', 2, 456, 452, 0, 0, 0, 2, 0, '', '', '2021-01-28 15:42:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `item_cat_id` int(11) NOT NULL,
  `item_cat_name` varchar(255) DEFAULT NULL,
  `item_cat_description` text DEFAULT NULL,
  `item_cat_created_at` timestamp NULL DEFAULT current_timestamp(),
  `item_cat_created_user_id` int(11) DEFAULT 1,
  `item_cat_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`item_cat_id`, `item_cat_name`, `item_cat_description`, `item_cat_created_at`, `item_cat_created_user_id`, `item_cat_status`) VALUES
(1, 'Air Filters', 'Air Filters Category', '2021-01-27 13:20:30', 1, 1),
(2, 'Engine Oilsdfsdfsafsfsdfas', 'Engine Oil Category', '2021-01-27 13:20:44', 1, 1),
(3, 'Hoods', '', '2020-09-15 02:08:21', 1, 1),
(5, 'Dickey', '', '2020-09-16 14:37:57', 1, 1),
(7, 'Testing Purpose Categorydfsdf', '', '2021-01-27 13:24:15', 1, 1),
(8, 'Notification Test Item Category', 'Hello World', '2021-03-25 10:41:26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_size`
--

CREATE TABLE `item_size` (
  `item_size_id` int(11) NOT NULL,
  `item_size_name` varchar(255) DEFAULT NULL,
  `item_size_description` text DEFAULT NULL,
  `item_size_status` int(11) DEFAULT 1,
  `item_size_created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_size`
--

INSERT INTO `item_size` (`item_size_id`, `item_size_name`, `item_size_description`, `item_size_status`, `item_size_created_at`) VALUES
(1, 'Extra Large', 'This is for extra large items', 1, '2020-09-14 09:32:12'),
(2, 'Small', 'Small Items', 1, '2021-01-27 13:22:14'),
(3, 'Medium', 'Medium Items', 1, '2020-09-14 09:32:12'),
(4, 'Large', 'Large Items', 1, '2020-09-15 09:42:11'),
(5, 'Engine Oil', 'Engine Oil Category', 1, '2020-09-14 01:49:40'),
(6, 'Ulra Pro Max', '', 1, '2020-09-15 02:07:52'),
(8, 'Testing for Item Size Namedfsdfsd', '', 1, '2021-01-27 13:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `item_stock_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_stock_barcode` int(11) DEFAULT NULL,
  `item_stock_manu_date` date DEFAULT curdate(),
  `item_stock_date` date DEFAULT curdate(),
  `item_stock_exp_date` date DEFAULT curdate(),
  `item_stock_qty` int(11) DEFAULT NULL,
  `item_stock_created_at` timestamp NULL DEFAULT current_timestamp(),
  `item_stock_created_user_id` int(11) DEFAULT NULL,
  `item_stock_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`item_stock_id`, `item_id`, `item_stock_barcode`, `item_stock_manu_date`, `item_stock_date`, `item_stock_exp_date`, `item_stock_qty`, `item_stock_created_at`, `item_stock_created_user_id`, `item_stock_status`) VALUES
(1, 1, 0, '0000-00-00', '0000-00-00', '0000-00-00', 422, '2020-09-16 14:53:01', NULL, 1),
(2, 6, 1000, '2020-09-17', '2020-09-25', '2020-09-23', 390, '2020-09-16 14:57:35', NULL, 1),
(3, 7, 1000, '2020-09-16', '2020-09-30', '2020-09-24', 195, '2020-09-16 16:30:10', NULL, 1),
(4, 8, 1500, '2020-09-16', '0000-00-00', '0000-00-00', 35, '2020-09-16 16:39:56', NULL, 1),
(15, 10, 0, '2020-09-18', '0000-00-00', '0000-00-00', 190, '2020-09-18 01:06:44', NULL, 1),
(16, 8, 0, '2020-09-18', '0000-00-00', '0000-00-00', 135, '2020-09-18 01:52:19', NULL, 1),
(19, 11, 147852369, '2020-09-18', '2020-09-30', '2020-09-18', 298, '2020-09-18 12:37:05', NULL, 1),
(20, 11, 0, '2020-09-18', '0000-00-00', '0000-00-00', 298, '2020-09-18 12:37:37', NULL, 1),
(23, 1, 150000145, '2020-09-19', '0000-00-00', '0000-00-00', 212, '2020-09-19 01:14:16', NULL, 1),
(24, 1, 0, '2020-09-21', '0000-00-00', '0000-00-00', -388, '2020-09-21 14:25:39', NULL, 1),
(25, 1, 0, '2020-09-21', '0000-00-00', '0000-00-00', -388, '2020-09-21 14:26:46', NULL, 1),
(26, 1, 17786, '2020-09-22', '0000-00-00', '0000-00-00', -388, '2020-09-22 06:07:42', NULL, 1),
(27, 6, 0, '2020-09-22', '0000-00-00', '0000-00-00', 190, '2020-09-22 06:19:45', NULL, 1),
(28, 1, 0, '2020-10-01', '2020-10-10', '2020-10-09', 123, '2020-10-01 09:32:35', NULL, 1),
(29, 1, 0, '2020-10-02', '0000-00-00', '0000-00-00', 123, '2020-10-02 16:34:26', NULL, 1),
(30, 1, 0, '2020-10-30', '0000-00-00', '0000-00-00', 433, '2020-10-30 11:46:02', NULL, 1),
(31, 1, 0, '2021-01-27', '0000-00-00', '0000-00-00', -63, '2021-01-27 13:26:42', NULL, 1),
(32, 1, 0, '2021-01-27', '0000-00-00', '0000-00-00', -63, '2021-01-27 13:27:48', NULL, 1),
(33, 1, 0, '2021-01-28', '0000-00-00', '0000-00-00', -63, '2021-01-28 09:02:11', NULL, 1),
(34, 1, 0, '2021-01-28', '0000-00-00', '0000-00-00', 439, '2021-01-28 12:36:22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_stock_level`
--

CREATE TABLE `item_stock_level` (
  `stk_lvl_id` int(11) NOT NULL,
  `stk_lvl_item_id` int(11) NOT NULL,
  `stk_lvl_rol` int(11) DEFAULT NULL,
  `stk_lvl_eoq` int(11) DEFAULT NULL,
  `stk_lvl_min` int(11) DEFAULT NULL,
  `stk_lvl_max` int(11) DEFAULT NULL,
  `stk_lvl_lt` int(11) DEFAULT NULL,
  `stk_lvl_danger` int(11) DEFAULT NULL,
  `stk_lvl_buffer` int(11) DEFAULT NULL,
  `stk_lvl_created_at` timestamp NULL DEFAULT current_timestamp(),
  `stk_lvl_created_user_id` int(11) DEFAULT 1,
  `stk_lvl_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_stock_level`
--

INSERT INTO `item_stock_level` (`stk_lvl_id`, `stk_lvl_item_id`, `stk_lvl_rol`, `stk_lvl_eoq`, `stk_lvl_min`, `stk_lvl_max`, `stk_lvl_lt`, `stk_lvl_danger`, `stk_lvl_buffer`, `stk_lvl_created_at`, `stk_lvl_created_user_id`, `stk_lvl_status`) VALUES
(1, 1, 125, 500, 300, 2000, 1, 100, 300, '2020-09-16 09:34:37', 1, 1),
(2, 6, 2, 50, 100, 600, 5, 500, 10, '2020-09-16 09:38:27', 1, 1),
(3, 7, 14, 1000, 50, 600, 7222, 100, 200, '2020-09-16 09:41:54', 1, 1),
(5, 8, 23, 11, 50, 600, 11111, 111111, 1111111, '2020-09-16 14:38:39', 1, 1),
(8, 10, 0, 0, 100, 800, 0, 0, 0, '2020-09-17 13:07:56', 1, 1),
(9, 11, 14, 500, 200, 1000, 0, 0, 0, '2020-09-18 12:30:38', 1, 1),
(10, 0, 0, 0, 0, 0, 0, 0, 0, '2020-09-19 01:29:25', 1, 1),
(21, 14, 0, 0, 45, 60, 0, 0, 0, '2021-01-28 15:49:50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_vehicle_id` varchar(255) DEFAULT NULL,
  `job_cus_id` int(11) NOT NULL,
  `job_vehicle_make_id` int(11) DEFAULT NULL,
  `job_vehicle_model_id` int(11) DEFAULT NULL,
  `job_vehicle_odo` int(11) DEFAULT NULL,
  `job_vehicle_mileage` double DEFAULT NULL,
  `job_start_time` timestamp NULL DEFAULT current_timestamp(),
  `job_finish_time` timestamp NULL DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `job_created_user_id` int(11) DEFAULT NULL,
  `job_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_vehicle_id`, `job_cus_id`, `job_vehicle_make_id`, `job_vehicle_model_id`, `job_vehicle_odo`, `job_vehicle_mileage`, `job_start_time`, `job_finish_time`, `job_description`, `job_created_user_id`, `job_status`) VALUES
(4, 'BBX-9190', 1, 3, 3, 80000, 100000, '2020-09-23 11:40:13', NULL, 'This is my personal vehicle', NULL, 10),
(5, 'CAR-4567', 2, 2, 2, 1500, 25000, '2020-09-23 12:41:21', '2021-03-25 12:01:21', 'Gollardo Lamborhini!!!', NULL, 10),
(6, 'KE-8978', 11, 1, 1, 200000, 5000, '2020-09-23 13:36:19', NULL, '', NULL, 10),
(8, 'BBY-9190', 3, 3, 3, 100000, 3000, '2020-09-24 06:50:58', '2020-09-25 14:57:26', '', NULL, 10),
(9, 'BBY-9342', 6, 2, 2, 180000, 4000, '2020-09-24 06:52:38', '2021-01-28 10:24:06', '', NULL, 10),
(10, 'BSX-8767', 10, 3, 3, 50000, 5000, '2020-09-25 08:28:12', '2020-09-25 15:17:07', '', NULL, 10),
(11, 'BBX-9190', 1, 3, 3, 80000, 100000, '2020-10-26 00:56:18', '2020-10-26 00:56:25', 'Second Service', NULL, 10),
(13, 'BBX-9190', 1, 0, 0, 0, 0, '2021-01-27 13:55:27', NULL, '', NULL, 0),
(14, 'BBY-9342', 6, 2, 2, 0, 0, '2021-01-27 13:56:29', '2021-01-28 10:22:20', '', NULL, 10),
(15, 'BBX-9190', 1, 3, 3, 0, 0, '2021-01-27 13:56:48', '2021-01-27 14:06:46', '', NULL, 10),
(16, 'BSX-8767', 0, 0, 0, 0, 0, '2021-01-28 10:54:21', NULL, '', NULL, 0),
(17, 'HSD-6745', 14, 1, 1, 1000000, 4000, '2021-01-28 11:00:02', '2021-05-01 02:41:34', 'First time service.', NULL, 10),
(20, 'CDF-5678', 17, 1, 1, 50000, 6000, '2021-03-25 10:12:12', NULL, 'A notification test entry!', NULL, 0),
(21, 'BBX-9190', 1, 1, 1, 60000, 5000, '2021-03-29 01:39:14', '2021-03-29 01:39:27', '', NULL, 10),
(22, 'CWW-9087', 19, 1, 1, 50000, 5000, '2021-04-13 02:38:58', '2021-04-13 02:39:25', '', NULL, 10),
(34, 'BBX-9190', 1, 3, 3, 100000, 5000, '2021-04-14 02:17:40', '2021-04-15 14:56:50', 'Multiple Job!', NULL, 10),
(35, 'BBE-9876', 9, 2, 2, 500000, 2000, '2021-04-14 02:29:21', '2021-04-21 07:23:30', 'Last Job ID check!', NULL, 10),
(36, 'CIA-5690', 4, 1, 1, 500000, 10000, '2021-04-16 00:47:38', '2021-05-01 02:47:30', 'Customer Manage AJAX Request Check!', NULL, 10),
(37, 'AAB-7856', 30, 3, 3, 10000, 5000, '2021-04-16 00:50:41', '2021-04-19 09:17:21', 'Customer Loyalty Program Check!', NULL, 10),
(38, 'SD-3981', 31, 4, 4, 250000, 5000, '2021-05-01 01:58:38', '2021-05-01 01:59:29', '', NULL, 1),
(39, 'BBX-9190', 1, 3, 3, 200000, 5000, '2021-05-01 02:52:56', '2021-05-01 02:53:05', '', NULL, 10),
(40, 'TTA-3456', 13, 4, 4, 300000, 6000, '2021-05-01 02:58:37', '2021-05-01 02:58:44', '', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `job_item`
--

CREATE TABLE `job_item` (
  `ji_id` int(11) NOT NULL,
  `ji_job_id` int(11) DEFAULT NULL,
  `ji_item_id` int(11) DEFAULT NULL,
  `ji_item_qty` int(11) DEFAULT NULL,
  `ji_item_price` int(11) DEFAULT NULL,
  `ji_created_time` timestamp NULL DEFAULT current_timestamp(),
  `ji_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_service`
--

CREATE TABLE `job_service` (
  `js_id` int(11) DEFAULT NULL,
  `js_service_id` int(11) DEFAULT NULL,
  `js_service_price` int(11) DEFAULT NULL,
  `js_created_time` timestamp NULL DEFAULT current_timestamp(),
  `js_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `user_id`, `login_status`) VALUES
(1, 'pgi.perera888@gmail.com', '40BD001563085FC35165329EA1FF5C5ECBDBBEEF', 1, 1),
(2, 'lasini.senevirathne@icloud.com', '40BD001563085FC35165329EA1FF5C5ECBDBBEEF', 2, 1),
(3, 'kamal@email.com', '40BD001563085FC35165329EA1FF5C5ECBDBBEEF', 3, 1),
(4, 'mayura.gunarathne@email.com', 'F9EC55464E399A82E0242C72252379D026BF535B', 4, 1),
(5, '', 'DA39A3EE5E6B4B0D3255BFEF95601890AFD80709', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `not_nt_id` int(11) NOT NULL,
  `not_message` text DEFAULT NULL,
  `not_sent_datetime` datetime DEFAULT current_timestamp(),
  `not_is_read` int(11) DEFAULT 0,
  `not_is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `not_nt_id`, `not_message`, `not_sent_datetime`, `not_is_read`, `not_is_deleted`) VALUES
(2, 3, 'A new customer named Nanda Kumaracreated', '2021-03-23 19:37:07', 0, 0),
(3, 6, 'A new employee named Nanda Kumara assigned asMechanic has been created', '2021-03-25 12:07:00', 0, 0),
(4, 4, 'Customer name of 14 changed to Sunil Perera', '2021-03-25 12:29:44', 0, 0),
(5, 4, 'Customer home address line of 14 has been changed to No45', '2021-03-25 12:31:36', 0, 0),
(6, 4, 'Customer street address line of 14 has been changed to Bollatha', '2021-03-25 12:32:27', 0, 0),
(7, 4, 'Customer name of 14 has been changed to <i>Sunil Rachitha</i>>', '2021-03-25 12:34:58', 0, 0),
(8, 4, 'Customer name of <i>14</i>> has been changed to <i>Sunil Perrera</i>', '2021-03-25 12:35:52', 0, 0),
(9, 4, 'Customer name of <i>14</i> has been changed to <i>SR</i>', '2021-03-25 12:37:56', 0, 0),
(10, 4, 'Customer name of <b>14</b> has been changed to <b>Ishara Pe</b>', '2021-03-25 12:42:27', 0, 0),
(11, 4, 'Customer name of <i><b>14</b>></i> has been changed to <i><b>Notification Test</i></b>', '2021-03-25 12:47:45', 0, 0),
(12, 4, 'Customer contact number 1 of <i><b>14</b></i> has been changed to <i><b>0715441187</b></i>', '2021-03-25 12:52:33', 0, 0),
(13, 4, 'Customer vehicle mileage 1 of <i><b>14</b></i> has been changed to <i><b>4000</b></i>', '2021-03-25 12:54:48', 0, 0),
(14, 4, 'Customer vehicle ODO of <i><b>14</b></i> has been changed to <i><b>1000000</b></i>', '2021-03-25 12:55:28', 0, 0),
(15, 6, 'Employee contact number or type of <b><i>2</i></b> has been change to <b><i>0784578965</i></b> and <b><i>Mobile</i></b>', '2021-03-25 13:06:41', 0, 0),
(16, 6, 'Employee first name of <b><i>2</i></b> has been change to <b><i>Kelumisf</i></b>', '2021-03-25 13:10:58', 0, 0),
(17, 6, 'Employee off day of <b><i>1</i></b> has been change to <b><i>Tue</i></b>', '2021-03-25 13:20:00', 0, 0),
(18, 3, 'A new job <i><b>20</b></i>, for vehicle number <b><i>CDF-5678</i></b> has been created', '2021-03-25 15:42:12', 0, 0),
(19, 3, 'A new purchase order, <i><b>39</i></b> to <i><b>1</i></b> has been created by user <i><b> </b></i>', '2021-03-25 16:03:09', 0, 0),
(20, 2, 'A new item category named <i><b>Notification Test Item Category</b></i> has been created', '2021-03-25 16:11:26', 0, 0),
(21, 4, 'A new customer named <i><b>Roger Rogans</b></i> created', '2021-03-25 17:26:42', 0, 0),
(22, 1, 'A new service named <i><b>Engine Oil Change</b></i> has been created', '2021-03-25 17:30:45', 0, 0),
(23, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>5</b></i>', '2021-03-25 17:31:21', 0, 0),
(24, 3, 'A new job <i><b>21</b></i>, for vehicle number <b><i>BBX-9190</i></b> has been created', '2021-03-29 07:09:14', 0, 0),
(25, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>21</b></i>', '2021-03-29 07:09:28', 0, 0),
(26, 4, 'Customer vehicle make of <i><b>3</b></i> has been changed to <i><b>3</b></i>', '2021-04-01 22:10:07', 0, 0),
(27, 4, 'Customer vehicle model of <i><b>3</b></i> has been changed to <i><b>3</b></i>', '2021-04-01 22:10:09', 0, 0),
(28, 1, 'A new service named <i><b>Engine Tuning</b></i> has been created', '2021-04-13 08:04:29', 0, 0),
(29, 4, 'A new customer named <i><b>Kamal Ranasinghe</b></i> created', '2021-04-13 08:07:47', 0, 0),
(30, 3, 'A new job <i><b>22</b></i>, for vehicle number <b><i>CWW-9087</i></b> has been created', '2021-04-13 08:08:58', 0, 0),
(31, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>22</b></i>', '2021-04-13 08:09:25', 0, 0),
(32, 3, 'A new job <i><b>23</b></i>, for vehicle number <b><i>BBX-9192</i></b> has been created', '2021-04-13 08:09:59', 0, 0),
(33, 5, 'A new purchase order, <i><b>40</i></b> to <i><b>1</i></b> has been created', '2021-04-13 08:16:28', 0, 0),
(34, 5, 'A new good received note, <i><b>11</i></b> to purchase order, <i><b>39</i></b> has been created', '2021-04-13 08:17:57', 0, 0),
(35, 3, 'A new job <i><b>24</b></i>, for vehicle number <b><i>BBX-9192</i></b> has been created', '2021-04-14 06:56:11', 0, 0),
(36, 3, 'A new job <i><b>25</b></i>, for vehicle number <b><i></i></b> has been created', '2021-04-14 07:01:18', 0, 0),
(37, 3, 'A new job <i><b>26</b></i>, for vehicle number <b><i></i></b> has been created', '2021-04-14 07:01:50', 0, 0),
(38, 3, 'A new job <i><b>27</b></i>, for vehicle number <b><i></i></b> has been created', '2021-04-14 07:03:18', 0, 0),
(39, 3, 'A new job <i><b>28</b></i>, for vehicle number <b><i></i></b> has been created', '2021-04-14 07:03:32', 0, 0),
(40, 3, 'A new job <i><b>29</b></i>, for vehicle number <b><i></i></b> has been created', '2021-04-14 07:04:27', 0, 0),
(41, 3, 'A new job <i><b>30</b></i>, for vehicle number <b><i></i></b> has been created', '2021-04-14 07:06:03', 0, 0),
(42, 3, 'A new job <i><b>31</b></i>, for vehicle number <b><i></i></b> has been created', '2021-04-14 07:06:12', 0, 0),
(43, 3, 'A new job <i><b>32</b></i>, for vehicle number <b><i></i></b> has been created', '2021-04-14 07:07:23', 0, 0),
(44, 3, 'A new job <i><b>33</b></i>, for vehicle number <b><i>HSD-6745</i></b> has been created', '2021-04-14 07:29:42', 0, 0),
(45, 3, 'A new job <i><b>34</b></i>, for vehicle number <b><i>BBX-9190</i></b> has been created', '2021-04-14 07:47:40', 0, 0),
(46, 3, 'A new job <i><b>35</b></i>, for vehicle number <b><i>BBE-9876</i></b> has been created', '2021-04-14 07:59:21', 0, 0),
(47, 4, 'A new customer named <i><b>Ishara Perera</b></i> created', '2021-04-14 08:55:54', 0, 0),
(48, 4, 'A new customer named <i><b>sdfsdfsd</b></i> created', '2021-04-14 09:21:13', 0, 0),
(49, 4, 'A new loyalty program named <i><b>Small</b></i> created', '2021-04-15 12:22:37', 0, 0),
(50, 4, 'A new loyalty program named <i><b>Small</b></i> created', '2021-04-15 12:23:21', 0, 0),
(51, 4, 'A new loyalty program named <i><b>Medium</b></i> created', '2021-04-15 12:25:21', 0, 0),
(52, 4, 'A new loyalty program named <i><b>Large</b></i> created', '2021-04-15 12:25:37', 0, 0),
(53, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>34</b></i>', '2021-04-15 20:26:50', 0, 0),
(54, 4, 'A new customer named <i><b>Kamal</b></i> created', '2021-04-15 21:54:15', 0, 0),
(55, 4, 'A new customer named <i><b>Malindi</b></i> created', '2021-04-15 21:57:56', 0, 0),
(56, 4, 'A new customer named <i><b>Shermila</b></i> created', '2021-04-15 22:00:31', 0, 0),
(57, 4, 'A new customer named <i><b>Chathu</b></i> created', '2021-04-15 22:01:26', 0, 0),
(58, 4, 'A new customer named <i><b>Dilmi</b></i> created', '2021-04-15 22:03:00', 0, 0),
(59, 4, 'A new customer named <i><b>Nipuni Sanjana</b></i> created', '2021-04-15 22:05:05', 0, 0),
(60, 4, 'A new customer named <i><b>Chamodi</b></i> created', '2021-04-15 22:09:24', 0, 0),
(61, 4, 'A new customer named <i><b>Hiran</b></i> created', '2021-04-15 22:11:12', 0, 0),
(62, 4, 'A new customer named <i><b>Kumara Sandaruwa</b></i> created', '2021-04-16 05:06:15', 0, 0),
(63, 4, 'The new customer <i><b>Kumara Sandaruwa</b></i> has obtained <b><i>1</i></b> point!', '2021-04-16 05:06:15', 0, 0),
(64, 3, 'A new job <i><b>36</b></i>, for vehicle number <b><i>CIA-5690</i></b> has been created', '2021-04-16 06:17:38', 0, 0),
(65, 3, 'A new job <i><b>37</b></i>, for vehicle number <b><i>AAB-7856</i></b> has been created', '2021-04-16 06:20:41', 0, 0),
(66, 4, 'Loyalty Program Name of <i><b>1</b></i> has been changed to <i><b>Small for Beginners</b></i>', '2021-04-16 07:53:23', 0, 0),
(67, 4, 'Loyalty Program Name of <i><b>3</b></i> has been changed to <i><b>Medium for Loyal Customers</b></i>', '2021-04-16 07:53:36', 0, 0),
(68, 4, 'Loyalty Program Name of <i><b>4</b></i> has been changed to <i><b>Large for Partners</b></i>', '2021-04-16 07:54:01', 0, 0),
(69, 4, 'Loyalty Program Points of <i><b>4</b></i> has been changed to <i><b>15</b></i>', '2021-04-16 07:58:29', 0, 0),
(70, 4, 'Loyalty Program Points of <i><b>4</b></i> has been changed to <i><b>10</b></i>', '2021-04-16 07:58:36', 0, 0),
(71, 4, 'Loyalty Program Reward of <i><b>1</b></i> has been changed to <i><b>50% off from the next service fuck off bitch</b></i>', '2021-04-16 08:03:31', 0, 0),
(72, 4, 'Loyalty Program Reward of <i><b>1</b></i> has been changed to <i><b>50% off from the next service</b></i>', '2021-04-16 08:03:49', 0, 0),
(73, 4, 'Loyalty Program Points of <i><b>1</b></i> has been changed to <i><b>1</b></i>', '2021-04-16 08:04:07', 0, 0),
(74, 4, 'Loyalty Program Points of <i><b>1</b></i> has been changed to <i><b>2</b></i>', '2021-04-16 08:04:14', 0, 0),
(75, 4, 'Loyalty Program Name of <i><b>2</b></i> has been changed to <i><b>Medium</b></i>', '2021-04-16 09:09:27', 0, 0),
(76, 4, 'Loyalty Program Name of <i><b>3</b></i> has been changed to <i><b>Large</b></i>', '2021-04-16 09:11:15', 0, 0),
(77, 4, 'Loyalty Program Name of <i><b>1</b></i> has been changed to <i><b>Small</b></i>', '2021-04-16 09:15:01', 0, 0),
(78, 4, 'A new loyalty point category named <i><b>Test</b></i> created', '2021-04-16 09:50:39', 0, 0),
(79, 4, 'A new loyalty point category named <i><b>Success Message Point</b></i> created', '2021-04-16 10:19:25', 0, 0),
(80, 4, 'A new loyalty point category named <i><b>Ratings and Reviews</b></i> created', '2021-04-19 13:20:03', 0, 0),
(81, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>37</b></i>', '2021-04-19 14:47:21', 0, 0),
(82, 4, 'Loyalty Program Name of <i><b>1</b></i> has been changed to <i><b>Small Test</b></i>', '2021-04-21 11:15:02', 0, 0),
(83, 4, 'Loyalty Program Name of <i><b>1</b></i> has been changed to <i><b>Small</b></i>', '2021-04-21 11:15:36', 0, 0),
(84, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>35</b></i>', '2021-04-21 12:53:30', 0, 0),
(85, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Huttha</i></b>', '2021-04-29 22:37:37', 0, 0),
(86, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamal</i></b>', '2021-04-29 22:37:59', 0, 0),
(87, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Huttha</i></b>', '2021-04-29 22:40:50', 0, 0),
(88, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamal</i></b>', '2021-04-29 22:41:24', 0, 0),
(89, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>hi</i></b>', '2021-04-29 22:44:25', 0, 0),
(90, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamal</i></b>', '2021-04-29 22:44:43', 0, 0),
(91, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamaldf</i></b>', '2021-04-29 22:44:49', 0, 0),
(92, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamal</i></b>', '2021-04-29 22:44:56', 0, 0),
(93, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamalsdfds</i></b>', '2021-04-29 22:45:05', 0, 0),
(94, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamal</i></b>', '2021-04-29 22:46:43', 0, 0),
(95, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamaldfd</i></b>', '2021-04-29 22:46:48', 0, 0),
(96, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kama</i></b>', '2021-04-29 22:48:14', 0, 0),
(97, 4, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamal</i></b>', '2021-04-29 22:48:23', 0, 0),
(98, 7, 'User last name of <i><b>3</b></i> has been changed to <i><b></i></b>', '2021-04-29 22:52:44', 0, 0),
(99, 7, 'User last name of <i><b>3</b></i> has been changed to <i><b></i></b>', '2021-04-29 22:54:24', 0, 0),
(100, 7, 'User first name of <i><b>3</b></i> has been changed to <i><b>Hello</i></b>', '2021-04-29 22:57:46', 0, 0),
(101, 7, 'User last name of <i><b>3</b></i> has been changed to <i><b></i></b>', '2021-04-29 22:58:40', 0, 0),
(102, 7, 'User last name of <i><b>3</b></i> has been changed to <i><b></i></b>', '2021-04-29 23:00:08', 0, 0),
(103, 7, 'User last name of <i><b>3</b></i> has been changed to <i><b>Hello</i></b>', '2021-04-29 23:01:58', 0, 0),
(104, 7, 'User last name of <i><b>3</b></i> has been changed to <i><b>Ranasinghe</i></b>', '2021-04-29 23:02:07', 0, 0),
(105, 7, 'User first name of <i><b>3</b></i> has been changed to <i><b>Kamal</i></b>', '2021-04-29 23:02:16', 0, 0),
(106, 7, 'User first name of <i><b>1</b></i> has been changed to <i><b>Isharas</i></b>', '2021-04-29 23:14:49', 0, 0),
(107, 7, 'User first name of <i><b>1</b></i> has been changed to <i><b>Ishara</i></b>', '2021-04-29 23:15:08', 0, 0),
(108, 7, 'User Email of <i><b>1</b></i> has been changed to <i><b>esoft.isharaperera@gmail.com</i></b>', '2021-04-29 23:21:59', 0, 0),
(109, 7, 'User Email of <i><b>1</b></i> has been changed to <i><b>pgi.perera888@gmail.com</i></b>', '2021-04-29 23:22:20', 0, 0),
(110, 7, 'User Date of Birth<i><b>3</b></i> has been changed to <i><b>1997-06-11</i></b>', '2021-04-29 23:29:00', 0, 0),
(111, 7, 'User Date of Birth<i><b>3</b></i> has been changed to <i><b>1997-06-29</i></b>', '2021-04-29 23:29:12', 0, 0),
(112, 7, 'User Gender<i><b>3</b></i> has been changed to <i><b>Female</i></b>', '2021-04-29 23:33:12', 0, 0),
(113, 7, 'User Gender<i><b>3</b></i> has been changed to <i><b>Male</i></b>', '2021-04-29 23:33:23', 0, 0),
(114, 7, 'User Gender<i><b>3</b></i> has been changed to <i><b>199723456789</i></b>', '2021-04-29 23:37:56', 0, 0),
(115, 7, 'User Gender<i><b>3</b></i> has been changed to <i><b>971812869V</i></b>', '2021-04-29 23:38:06', 0, 0),
(116, 7, 'User Contact Number 1 <i><b>3</b></i> has been changed to <i><b>0756043536</i></b>', '2021-04-29 23:44:05', 0, 0),
(117, 7, 'User Contact Number 2 of <i><b>3</b></i> has been changed to <i><b>0756043536</i></b>', '2021-04-29 23:46:34', 0, 0),
(118, 7, 'User Contact Number 2 of <i><b>3</b></i> has been changed to <i><b>0762084411</i></b>', '2021-04-29 23:49:05', 0, 0),
(119, 7, 'User Contact Number 2 of <i><b>3</b></i> has been changed to <i><b>1</i></b>', '2021-04-29 23:52:51', 0, 0),
(120, 7, 'User Role of <i><b>3</b></i> has been changed to <i><b>2</i></b>', '2021-04-29 23:53:18', 0, 0),
(121, 7, 'User Role of <i><b>3</b></i> has been changed to <i><b>Administrator</i></b>', '2021-04-29 23:54:40', 0, 0),
(122, 7, 'User Email of <i><b>3</b></i> has been changed to <i><b>kamal@email.com</i></b>', '2021-04-30 02:04:15', 0, 0),
(123, 3, 'A new vehicle has been created', '2021-05-01 07:07:39', 0, 0),
(124, 3, 'A new vehicle has been created', '2021-05-01 07:11:38', 0, 0),
(125, 3, 'A new vehicle has been created', '2021-05-01 07:12:18', 0, 0),
(126, 3, 'A new vehicle has been created', '2021-05-01 07:22:01', 0, 0),
(127, 4, 'A new customer named <i><b>Padmakumara Ratnayake</b></i> created', '2021-05-01 07:28:03', 0, 0),
(128, 4, 'The new customer <i><b>Padmakumara Ratnayake</b></i> has obtained <b><i>1</i></b> points!', '2021-05-01 07:28:03', 0, 0),
(129, 4, 'A new customer referral <i><b></b></i> created for the referrer <b><i>11</i></b>', '2021-05-01 07:28:03', 0, 0),
(130, 4, 'The referrer customer <i><b>Padmakumara Ratnayake</b></i> has obtained <b><i>5</i></b> points for the referee customer <b><i>31</i></b>', '2021-05-01 07:28:03', 0, 0),
(131, 3, 'A new job <i><b>38</b></i>, for vehicle number <b><i>SD-3981</i></b> has been created', '2021-05-01 07:28:38', 0, 0),
(132, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>38</b></i>', '2021-05-01 07:29:29', 0, 0),
(133, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>17</b></i>', '2021-05-01 08:11:34', 0, 0),
(134, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>36</b></i>', '2021-05-01 08:17:30', 0, 0),
(135, 3, 'A new job <i><b>39</b></i>, for vehicle number <b><i>BBX-9190</i></b> has been created', '2021-05-01 08:22:56', 0, 0),
(136, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>39</b></i>', '2021-05-01 08:23:05', 0, 0),
(137, 3, 'A new job <i><b>40</b></i>, for vehicle number <b><i>TTA-3456</i></b> has been created', '2021-05-01 08:28:37', 0, 0),
(138, 3, 'Job status has been changed to <i><b>completed, </b></i> of <i><b>40</b></i>', '2021-05-01 08:28:44', 0, 0),
(139, 4, 'A new customer named <i><b>Saman Kumara</b></i> created', '2021-05-01 11:45:46', 0, 0),
(140, 4, 'The new customer <i><b>Saman Kumara</b></i> has obtained <b><i>1</i></b> points!', '2021-05-01 11:45:46', 0, 0),
(141, 4, 'A new customer referral <i><b></b></i> created for the referrer <b><i>3</i></b>', '2021-05-01 11:45:46', 0, 0),
(142, 4, 'The referrer customer <i><b>Saman Kumara</b></i> has obtained <b><i>5</i></b> points for the referee customer <b><i>32</i></b>', '2021-05-01 11:45:46', 0, 0),
(143, 4, 'A new customer named <i><b>Krish Kumar</b></i> created', '2021-05-01 11:55:43', 0, 0),
(144, 4, 'The new customer <i><b>Krish Kumar</b></i> has obtained <b><i>1</i></b> points!', '2021-05-01 11:55:43', 0, 0),
(145, 4, 'A new customer referral <i><b>-1</b></i> created for the referrer <b><i>3</i></b>', '2021-05-01 11:55:43', 0, 0),
(146, 4, 'The referrer customer <i><b>Krish Kumar</b></i> has obtained <b><i>5</i></b> points for the referee customer <b><i>33</i></b>', '2021-05-01 11:55:43', 0, 0),
(147, 4, 'A new customer named <i><b>David Perera</b></i> created', '2021-05-01 12:01:34', 0, 0),
(148, 4, 'The new customer <i><b>David Perera</b></i> has obtained <b><i>1</i></b> points!', '2021-05-01 12:01:34', 0, 0),
(149, 4, 'A new customer referral <i><b>1</b></i> created for the referrer <b><i>1</i></b>', '2021-05-01 12:01:34', 0, 0),
(150, 4, 'The referrer customer <i><b>David Perera</b></i> has obtained <b><i>5</i></b> points for the referee customer <b><i>34</i></b>', '2021-05-01 12:01:35', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification_type`
--

CREATE TABLE `notification_type` (
  `nt_id` int(11) NOT NULL,
  `nt_type` varchar(255) DEFAULT NULL,
  `nt_color` varchar(10) DEFAULT NULL,
  `nt_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_type`
--

INSERT INTO `notification_type` (`nt_id`, `nt_type`, `nt_color`, `nt_description`) VALUES
(1, 'Service', 'primary', 'Module'),
(2, 'Inventory', 'danger', 'Module'),
(3, 'Job', 'success', 'Module'),
(4, 'Customer', 'info', 'Module'),
(5, 'Sale', 'warning', 'Module'),
(6, 'Worker', 'secondary', 'Module'),
(7, 'User', 'dark', 'Module'),
(8, 'Report', 'muted', 'Module');

-- --------------------------------------------------------

--
-- Table structure for table `report_module`
--

CREATE TABLE `report_module` (
  `rm_id` int(11) NOT NULL,
  `rm_name` varchar(255) DEFAULT NULL,
  `rm_color` varchar(10) DEFAULT NULL,
  `rm_icon` varchar(20) DEFAULT NULL,
  `rm_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_module`
--

INSERT INTO `report_module` (`rm_id`, `rm_name`, `rm_color`, `rm_icon`, `rm_url`) VALUES
(1, 'Service Reports', 'primary', 'car', 'service.php'),
(2, 'Inventory Reports', 'danger', 'list', 'inventory.php'),
(3, 'Job Reports', 'success', 'tasks', 'job.php'),
(4, 'Customer Reports', 'info', 'users', 'customer.php'),
(5, 'Sale Reports', 'warning', 'shopping-cart', 'sale.php'),
(6, 'Employee Reports', 'secondary', 'address-card', 'worker.php');

-- --------------------------------------------------------

--
-- Table structure for table `sale_grn`
--

CREATE TABLE `sale_grn` (
  `sgrn_id` int(11) NOT NULL,
  `sgrn_po_id` int(11) DEFAULT NULL,
  `sgrn_total_amount` int(11) DEFAULT NULL,
  `sgrn_created_at` timestamp NULL DEFAULT current_timestamp(),
  `sgrn_created_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_grn`
--

INSERT INTO `sale_grn` (`sgrn_id`, `sgrn_po_id`, `sgrn_total_amount`, `sgrn_created_at`, `sgrn_created_user_id`) VALUES
(1, 1, 58750, '2021-04-13 03:47:57', NULL),
(2, 2, 19000, '2020-10-05 10:14:16', NULL),
(4, 26, 30200, '2020-10-30 11:36:47', NULL),
(7, 35, 45000, '2021-01-27 14:29:11', NULL),
(8, 33, 3200, '2021-01-27 14:29:58', NULL),
(11, 39, 183000, '2021-04-13 02:47:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_grn_item`
--

CREATE TABLE `sale_grn_item` (
  `sgi_id` int(11) NOT NULL,
  `sgi_item_id` int(11) DEFAULT NULL,
  `sgi_p_price` int(11) DEFAULT NULL,
  `sgi_qty` int(11) DEFAULT NULL,
  `sgi_amount` int(11) DEFAULT NULL,
  `sgi_grn_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_grn_item`
--

INSERT INTO `sale_grn_item` (`sgi_id`, `sgi_item_id`, `sgi_p_price`, `sgi_qty`, `sgi_amount`, `sgi_grn_id`) VALUES
(1, 1, 450, 95, 42750, 1),
(2, 6, 800, 10, 8000, 1),
(3, 8, 1000, 8, 8000, 1),
(4, 1, 450, 20, 9000, 2),
(5, 15, 200, 50, 10000, 2),
(6, 1, 450, 0, 0, 3),
(7, 7, 800, 0, 0, 3),
(8, 10, 1000, 0, 0, 3),
(9, 8, 1000, 18, 18000, 4),
(10, 6, 800, 9, 7200, 4),
(11, 14, 500, 10, 5000, 4),
(12, 12, 1000, 0, 0, 5),
(13, 11, 1000, 0, 0, 6),
(14, 8, 1000, 0, 0, 6),
(15, 12, 1000, 45, 45000, 7),
(16, 6, 800, 4, 3200, 8),
(17, 6, 800, 0, 0, 9),
(18, 6, 800, 0, 0, 10),
(19, 1, 45000, 4, 180000, 11),
(20, 10, 1000, 3, 3000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `sale_purchase_order`
--

CREATE TABLE `sale_purchase_order` (
  `po_id` int(11) NOT NULL,
  `po_amount` int(11) DEFAULT NULL,
  `po_supplier_id` int(11) DEFAULT NULL,
  `po_created_at` timestamp NULL DEFAULT current_timestamp(),
  `po_created_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_purchase_order`
--

INSERT INTO `sale_purchase_order` (`po_id`, `po_amount`, `po_supplier_id`, `po_created_at`, `po_created_user_id`) VALUES
(1, 63000, 1, '2020-10-03 17:26:21', NULL),
(2, 21820, 5, '2020-10-03 17:28:28', NULL),
(4, 0, NULL, '2020-10-03 17:32:46', NULL),
(5, 20500, 3, '2020-10-04 15:35:28', NULL),
(6, 0, NULL, '2020-10-04 15:38:17', NULL),
(7, 1, 0, '2020-10-04 15:43:30', NULL),
(8, 3, 0, '2020-10-04 15:43:45', NULL),
(9, 1, 0, '2020-10-04 15:48:52', NULL),
(10, 3, 0, '2020-10-04 15:48:59', NULL),
(11, 2, NULL, '2020-10-04 15:49:50', NULL),
(12, 1, NULL, '2020-10-04 15:50:03', NULL),
(13, 0, 0, '2020-10-04 15:51:13', NULL),
(14, 0, 0, '2020-10-04 15:51:45', NULL),
(15, 0, 0, '2020-10-04 15:55:30', NULL),
(16, 0, 0, '2020-10-04 15:56:04', NULL),
(17, 0, 0, '2020-10-04 15:56:48', NULL),
(18, 0, 0, '2020-10-05 03:34:45', NULL),
(19, 1, 29800, '2020-10-05 03:36:36', NULL),
(20, 1, 0, '2020-10-05 03:38:47', NULL),
(21, 1, 0, '2020-10-05 03:43:02', NULL),
(22, 1, 20250, '2020-10-05 03:43:20', NULL),
(23, 1, 4500, '2020-10-05 03:49:35', NULL),
(24, 45000, 5, '2020-10-05 03:51:00', NULL),
(25, 0, 1, '2020-10-30 11:35:26', NULL),
(26, 33000, 5, '2020-10-30 11:36:14', NULL),
(27, 0, 1, '2021-01-27 14:13:14', NULL),
(28, 231000, 1, '2021-01-27 14:13:49', NULL),
(29, 270000, 2, '2021-01-27 14:14:51', NULL),
(30, 15000, 5, '2021-01-27 14:15:41', NULL),
(31, 278000, 2, '2021-01-27 14:16:23', NULL),
(32, 0, 1, '2021-01-27 14:21:40', NULL),
(33, 0, 1, '2021-01-27 14:23:31', NULL),
(34, 32800, 1, '2021-01-27 14:24:05', NULL),
(35, 5000, 2, '2021-01-27 14:24:49', NULL),
(36, 0, 1, '2021-01-28 11:52:44', NULL),
(37, 0, 1, '2021-01-28 15:55:45', NULL),
(38, 270000, 1, '2021-01-28 15:59:48', NULL),
(39, 272000, 1, '2021-03-25 10:33:08', NULL),
(40, 53500, 1, '2021-04-13 02:46:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_purchase_order_item`
--

CREATE TABLE `sale_purchase_order_item` (
  `poi_id` int(11) NOT NULL,
  `poi_item_id` int(11) DEFAULT NULL,
  `poi_item_price` int(11) DEFAULT NULL,
  `poi_item_qty` int(11) DEFAULT NULL,
  `poi_item_amount` int(11) DEFAULT NULL,
  `poi_po_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_purchase_order_item`
--

INSERT INTO `sale_purchase_order_item` (`poi_id`, `poi_item_id`, `poi_item_price`, `poi_item_qty`, `poi_item_amount`, `poi_po_id`) VALUES
(1, 1, 450, 100, 45000, 1),
(2, 6, 800, 10, 8000, 1),
(3, 8, 1000, 10, 10000, 1),
(4, 1, 470, 20, 9400, 2),
(5, 15, 230, 54, 12420, 2),
(6, 0, 0, 0, 0, 3),
(7, 0, 0, 0, 0, 4),
(8, 1, 450, 2, 900, 5),
(9, 7, 800, 12, 9600, 5),
(10, 10, 1000, 10, 10000, 5),
(11, 8, 1000, 10, 10000, 6),
(12, 1, 450, 12, 5400, 6),
(13, 0, 0, 0, 0, 7),
(14, 0, 0, 0, 0, 8),
(15, 0, 0, 0, 0, 9),
(16, 0, 0, 0, 0, 10),
(17, 8, 1000, 10, 10000, 11),
(18, 8, 1000, 10, 10000, 12),
(19, 0, 0, 0, 0, 13),
(20, 0, 0, 0, 0, 14),
(21, 0, 0, 0, 0, 15),
(22, 0, 0, 0, 0, 16),
(23, 0, 0, 0, 0, 17),
(24, 0, 0, 0, 0, 18),
(25, 8, 1000, 5, 5000, 19),
(26, 11, 1000, 10, 10000, 19),
(27, 6, 740, 20, 14800, 19),
(28, 0, 0, 0, 0, 20),
(29, 0, 0, 0, 0, 21),
(30, 1, 450, 45, 20250, 22),
(31, 1, 450, 10, 4500, 23),
(32, 1, 450, 100, 45000, 24),
(33, 0, 0, 0, 0, 25),
(34, 8, 1000, 20, 20000, 26),
(35, 6, 800, 10, 8000, 26),
(36, 14, 500, 10, 5000, 26),
(37, 8, 1000, 0, 0, 27),
(38, 8, 1000, 6, 6000, 28),
(39, 1, 45000, 5, 225000, 28),
(40, 1, 45000, 6, 270000, 29),
(41, 11, 1000, 6, 6000, 30),
(42, 8, 1000, 9, 9000, 30),
(43, 1, 45000, 6, 270000, 31),
(44, 10, 1000, 8, 8000, 31),
(45, 0, 0, 0, 0, 32),
(46, 6, 800, 0, 0, 33),
(47, 6, 800, 41, 32800, 34),
(48, 12, 1000, 5, 5000, 35),
(49, 0, 0, 0, 0, 36),
(50, 0, 0, 0, 0, 37),
(51, 1, 45000, 6, 270000, 38),
(52, 1, 45000, 6, 270000, 39),
(53, 10, 1000, 2, 2000, 39),
(54, 6, 850, 10, 8500, 40),
(55, 1, 4500, 10, 45000, 40);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_price` double DEFAULT NULL,
  `service_required_item_id_1` int(11) DEFAULT NULL,
  `service_required_item_id_2` int(11) DEFAULT NULL,
  `service_required_item_id_3` int(11) DEFAULT NULL,
  `service_required_item_id_4` int(11) DEFAULT NULL,
  `service_required_item_id_5` int(11) DEFAULT NULL,
  `service_required_item_id_6` int(11) DEFAULT NULL,
  `service_worker_id_1` int(11) DEFAULT NULL,
  `service_worker_id_2` int(11) DEFAULT NULL,
  `service_worker_id_3` int(11) DEFAULT NULL,
  `service_worker_id_4` int(11) DEFAULT NULL,
  `service_cat_id` int(11) DEFAULT NULL,
  `service_sub_cat_id` int(11) DEFAULT NULL,
  `service_created_at` timestamp NULL DEFAULT current_timestamp(),
  `service_created_user_id` int(11) DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `service_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_price`, `service_required_item_id_1`, `service_required_item_id_2`, `service_required_item_id_3`, `service_required_item_id_4`, `service_required_item_id_5`, `service_required_item_id_6`, `service_worker_id_1`, `service_worker_id_2`, `service_worker_id_3`, `service_worker_id_4`, `service_cat_id`, `service_sub_cat_id`, `service_created_at`, `service_created_user_id`, `service_description`, `service_status`) VALUES
(1, 'Engine Oil Change', 1400, 10, 0, 0, 0, 0, 0, 100, 0, 0, 0, 1, 1, '2020-09-10 04:22:58', NULL, 'Oil Change should be done once a year.', 1),
(2, 'Interior Body Wash', 1500, 10, 20, 0, 0, 0, 0, 100, 0, 0, 0, 2, 2, '2020-09-10 08:05:04', NULL, 'Clean the inside!', 1),
(6, 'Test Service Hello', 20000, 10, 0, 0, 0, 0, 0, 200, 0, 0, 0, 1, 1, '2020-09-11 11:39:54', NULL, '', 1),
(7, 'Body Wash', 1500, 10, 0, 0, 0, 0, 0, 100, 200, 0, 0, 1, 2, '2020-09-22 06:06:23', NULL, 'dghe', 1),
(8, 'Cut And Polishdfsd', 0, 8, 0, 0, 0, 0, 0, 100, 0, 0, 0, 2, 2, '2021-01-27 00:10:00', NULL, '', 0),
(9, 'Hello', 1500, 6, 0, 0, 0, 0, 0, 100, 0, 0, 0, 1, 1, '2021-01-28 07:24:13', NULL, '', 0),
(10, 'Test Results - updating', 0, 8, 0, 0, 0, 0, 0, 100, 0, 0, 0, 3, 3, '2021-01-28 15:00:20', NULL, '', 0),
(11, 'Clean The Body Parts', 1500, 17, 0, 0, 0, 0, 0, 100, 0, 0, 0, 5, 4, '2021-03-25 11:54:12', NULL, '', 1),
(12, 'Engine Oil Change', 1500, 1, 0, 0, 0, 0, 0, 100, 0, 0, 0, 1, 1, '2021-03-25 12:00:45', NULL, '', 1),
(13, 'Engine Tuning', 1500, 15, 0, 0, 0, 0, 0, 100, 0, 0, 0, 1, 1, '2021-04-13 02:34:28', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `service_cat_id` int(11) NOT NULL,
  `service_cat_name` varchar(255) DEFAULT NULL,
  `service_cat_description` text DEFAULT NULL,
  `service_cat_status` int(11) DEFAULT 1,
  `service_cat_created_at` timestamp NULL DEFAULT current_timestamp(),
  `service_cat_created_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`service_cat_id`, `service_cat_name`, `service_cat_description`, `service_cat_status`, `service_cat_created_at`, `service_cat_created_user_id`) VALUES
(1, 'Full Service', 'Full Service includes a vast amount of services.', 1, '2021-01-27 00:31:36', NULL),
(2, 'Normal Service', 'Normal service has a vast amount of service to offer just for you!', 1, '2020-09-10 08:03:39', NULL),
(3, 'Test Category', '', 1, '2020-09-11 11:28:51', NULL),
(4, 'Buffer Cut and Polish', '', 1, '2021-01-28 07:43:33', NULL),
(5, 'Test Result - Update', '', 1, '2021-01-28 15:13:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_sub_category`
--

CREATE TABLE `service_sub_category` (
  `service_sub_cat_id` int(11) NOT NULL,
  `service_sub_cat_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `service_sub_cat_created_at` timestamp NULL DEFAULT current_timestamp(),
  `service_sub_cat_created_user_id` int(11) DEFAULT NULL,
  `service_sub_cat_description` text DEFAULT NULL,
  `service_sub_cat_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_sub_category`
--

INSERT INTO `service_sub_category` (`service_sub_cat_id`, `service_sub_cat_name`, `category_id`, `service_sub_cat_created_at`, `service_sub_cat_created_user_id`, `service_sub_cat_description`, `service_sub_cat_status`) VALUES
(1, 'Oil Changing', 1, '2021-04-24 15:36:22', NULL, 'Oil Change is included a vast amount of services.', 1),
(2, 'Body Wash', 2, '2020-09-10 14:16:59', NULL, 'Keep you car clean!', 1),
(3, 'Rear Cut and Polish', 1, '2021-01-28 07:48:45', NULL, '', 1),
(4, 'Test Result - Updating', 1, '2021-01-28 15:09:40', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(255) DEFAULT NULL,
  `sup_address_home` varchar(255) DEFAULT NULL,
  `sup_address_street` varchar(255) DEFAULT NULL,
  `sup_address_city` varchar(255) DEFAULT NULL,
  `sup_address_state` varchar(255) DEFAULT NULL,
  `sup_cn1` varchar(10) DEFAULT NULL,
  `sup_cn2` varchar(10) DEFAULT NULL,
  `sup_email` varchar(255) DEFAULT NULL,
  `sup_description` text DEFAULT NULL,
  `sup_created_at` timestamp NULL DEFAULT current_timestamp(),
  `sup_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_address_home`, `sup_address_street`, `sup_address_city`, `sup_address_state`, `sup_cn1`, `sup_cn2`, `sup_email`, `sup_description`, `sup_created_at`, `sup_status`) VALUES
(1, 'Salinda Super', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-15 01:12:13', 1),
(2, 'Uniliever', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-15 01:12:13', 1),
(3, 'Anchor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-15 01:12:13', 1),
(5, 'Ishara Traders', '185/A/2', 'Bollatha', 'Ganemulla', 'Western Provice, Sri Lanka', '0778154411', '0762084411', 'ishara.traders@gmail.com', 'Best Trading Company in the Area', '2020-10-02 14:32:49', 1),
(8, 'Amaron', '', '', '', '', '0112240148', '', '', '', '2020-10-03 13:25:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(255) DEFAULT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_gender` varchar(255) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_nic` varchar(12) DEFAULT NULL,
  `user_cn1` varchar(12) DEFAULT NULL,
  `user_cn2` varchar(12) DEFAULT NULL,
  `user_access_level` int(11) DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `user_created_at` timestamp NULL DEFAULT current_timestamp(),
  `user_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_gender`, `user_dob`, `user_nic`, `user_cn1`, `user_cn2`, `user_access_level`, `user_image`, `user_created_at`, `user_status`) VALUES
(1, 'Ishara', 'Perera', 'pgi.perera888@gmail.com', 'Male', '1997-06-29', '971812869V', '0778154411', '0778154411', 1, '1619727350_image1.jpeg', '2020-09-03 08:31:33', 1),
(2, 'Lasini', 'Senevirathne', 'lasini.senevirathne@icloud.com', 'Female', '1998-05-13', '986341323V', '0762084411', '0778154411', 1, '1599213411_IMG_1582756223-2.jpeg', '2020-09-04 09:56:51', 1),
(3, 'Kamal', 'Ranasinghe', 'kamal@email.com', 'Male', '1997-06-29', '971812869V', '0756043536', '0762084411', 1, '1619728479_Steve Jobs Quote Wallpaper.jpg', '2021-01-26 23:54:15', 1),
(4, 'Mayura', 'Gunarathne', 'mayura.gunarathne@email.com', 'Male', '1998-05-13', '986341323V', '0764587963', '0715847321', 1, '1611705415_ish_edited-DESKTOP-OT3PLU9.jpg', '2021-01-26 23:56:55', 1),
(5, '', '', '', 'Male', '0000-00-00', '', '', '', 0, 'default_user_img.png', '2021-01-27 00:01:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_level`
--

CREATE TABLE `user_access_level` (
  `user_access_level_id` int(11) NOT NULL,
  `user_access_level_name` varchar(255) DEFAULT NULL,
  `user_access_level_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_level`
--

INSERT INTO `user_access_level` (`user_access_level_id`, `user_access_level_name`, `user_access_level_status`) VALUES
(1, 'Administrator', 1),
(2, 'System Operator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make`
--

CREATE TABLE `vehicle_make` (
  `vehicle_make_id` int(11) NOT NULL,
  `vehicle_make_name` varchar(255) DEFAULT NULL,
  `vehcile_make_created_at` timestamp NULL DEFAULT current_timestamp(),
  `vehicle_make_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_make`
--

INSERT INTO `vehicle_make` (`vehicle_make_id`, `vehicle_make_name`, `vehcile_make_created_at`, `vehicle_make_status`) VALUES
(1, 'MERCEDEZ', '2020-09-23 08:14:02', 1),
(2, 'LAMBORGHINI', '2020-09-23 08:14:02', 1),
(3, 'BMW', '2020-09-23 08:14:02', 1),
(4, 'TOYOTA', '2021-05-01 01:52:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--

CREATE TABLE `vehicle_model` (
  `vehicle_model_id` int(11) NOT NULL,
  `vehicle_model_name` varchar(255) DEFAULT NULL,
  `vehicle_model_make_id` int(11) DEFAULT NULL,
  `vehicle_model_year` year(4) DEFAULT NULL,
  `vehicle_model_created_at` timestamp NULL DEFAULT current_timestamp(),
  `vehicle_model_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_model`
--

INSERT INTO `vehicle_model` (`vehicle_model_id`, `vehicle_model_name`, `vehicle_model_make_id`, `vehicle_model_year`, `vehicle_model_created_at`, `vehicle_model_status`) VALUES
(1, 'BENZ', 1, 2019, '2020-09-23 08:16:15', 1),
(2, 'GOLLARDO', 2, 2018, '2020-09-23 08:16:15', 1),
(3, 'I8', 3, 2019, '2020-09-23 08:16:15', 1),
(4, 'COROLLA', 4, 2008, '2021-05-01 01:52:01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `customer_feedback_message`
--
ALTER TABLE `customer_feedback_message`
  ADD PRIMARY KEY (`cfm_id`);

--
-- Indexes for table `customer_loyalty`
--
ALTER TABLE `customer_loyalty`
  ADD PRIMARY KEY (`loyalty_id`);

--
-- Indexes for table `customer_loyalty_color`
--
ALTER TABLE `customer_loyalty_color`
  ADD PRIMARY KEY (`clc_id`);

--
-- Indexes for table `customer_points`
--
ALTER TABLE `customer_points`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `customer_point_allocation`
--
ALTER TABLE `customer_point_allocation`
  ADD PRIMARY KEY (`cpa_id`);

--
-- Indexes for table `customer_referral`
--
ALTER TABLE `customer_referral`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD PRIMARY KEY (`emp_contact_id`);

--
-- Indexes for table `employee_illness`
--
ALTER TABLE `employee_illness`
  ADD PRIMARY KEY (`emp_illness_id`);

--
-- Indexes for table `employee_roster`
--
ALTER TABLE `employee_roster`
  ADD PRIMARY KEY (`emp_roster_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_service`
--
ALTER TABLE `invoice_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`item_cat_id`);

--
-- Indexes for table `item_size`
--
ALTER TABLE `item_size`
  ADD PRIMARY KEY (`item_size_id`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`item_stock_id`);

--
-- Indexes for table `item_stock_level`
--
ALTER TABLE `item_stock_level`
  ADD PRIMARY KEY (`stk_lvl_id`),
  ADD UNIQUE KEY `item_stock_level_stk_lvl_item_id_uindex` (`stk_lvl_item_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_item`
--
ALTER TABLE `job_item`
  ADD PRIMARY KEY (`ji_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `notification_type`
--
ALTER TABLE `notification_type`
  ADD PRIMARY KEY (`nt_id`);

--
-- Indexes for table `report_module`
--
ALTER TABLE `report_module`
  ADD PRIMARY KEY (`rm_id`);

--
-- Indexes for table `sale_grn`
--
ALTER TABLE `sale_grn`
  ADD PRIMARY KEY (`sgrn_id`);

--
-- Indexes for table `sale_grn_item`
--
ALTER TABLE `sale_grn_item`
  ADD PRIMARY KEY (`sgi_id`);

--
-- Indexes for table `sale_purchase_order`
--
ALTER TABLE `sale_purchase_order`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `sale_purchase_order_item`
--
ALTER TABLE `sale_purchase_order_item`
  ADD PRIMARY KEY (`poi_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `fk_service_serviceCateogry` (`service_cat_id`),
  ADD KEY `fk_service_serviceSubCat` (`service_sub_cat_id`) USING BTREE;

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`service_cat_id`);

--
-- Indexes for table `service_sub_category`
--
ALTER TABLE `service_sub_category`
  ADD PRIMARY KEY (`service_sub_cat_id`),
  ADD KEY `fk_serviceSubCat_serviceCat` (`category_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_access_level`
--
ALTER TABLE `user_access_level`
  ADD PRIMARY KEY (`user_access_level_id`);

--
-- Indexes for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  ADD PRIMARY KEY (`vehicle_make_id`);

--
-- Indexes for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  ADD PRIMARY KEY (`vehicle_model_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer_feedback_message`
--
ALTER TABLE `customer_feedback_message`
  MODIFY `cfm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_loyalty`
--
ALTER TABLE `customer_loyalty`
  MODIFY `loyalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_loyalty_color`
--
ALTER TABLE `customer_loyalty_color`
  MODIFY `clc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_points`
--
ALTER TABLE `customer_points`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_point_allocation`
--
ALTER TABLE `customer_point_allocation`
  MODIFY `cpa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_referral`
--
ALTER TABLE `customer_referral`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_contact`
--
ALTER TABLE `employee_contact`
  MODIFY `emp_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_illness`
--
ALTER TABLE `employee_illness`
  MODIFY `emp_illness_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_roster`
--
ALTER TABLE `employee_roster`
  MODIFY `emp_roster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `invoice_item`
--
ALTER TABLE `invoice_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `invoice_service`
--
ALTER TABLE `invoice_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `item_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_size`
--
ALTER TABLE `item_size`
  MODIFY `item_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `item_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `item_stock_level`
--
ALTER TABLE `item_stock_level`
  MODIFY `stk_lvl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `job_item`
--
ALTER TABLE `job_item`
  MODIFY `ji_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `notification_type`
--
ALTER TABLE `notification_type`
  MODIFY `nt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report_module`
--
ALTER TABLE `report_module`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale_grn`
--
ALTER TABLE `sale_grn`
  MODIFY `sgrn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sale_grn_item`
--
ALTER TABLE `sale_grn_item`
  MODIFY `sgi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sale_purchase_order`
--
ALTER TABLE `sale_purchase_order`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sale_purchase_order_item`
--
ALTER TABLE `sale_purchase_order_item`
  MODIFY `poi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `service_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_sub_category`
--
ALTER TABLE `service_sub_category`
  MODIFY `service_sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_level`
--
ALTER TABLE `user_access_level`
  MODIFY `user_access_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  MODIFY `vehicle_make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `vehicle_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_serviceCat` FOREIGN KEY (`service_sub_cat_id`) REFERENCES `service_sub_category` (`service_sub_cat_id`),
  ADD CONSTRAINT `fk_service_serviceCateogry` FOREIGN KEY (`service_cat_id`) REFERENCES `service_category` (`service_cat_id`);

--
-- Constraints for table `service_sub_category`
--
ALTER TABLE `service_sub_category`
  ADD CONSTRAINT `fk_serviceSubCat_serviceCat` FOREIGN KEY (`category_id`) REFERENCES `service_category` (`service_cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
