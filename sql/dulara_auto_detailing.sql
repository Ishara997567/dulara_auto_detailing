-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 03:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `cus_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_vehicle_no`, `cus_add_l1`, `cus_add_l2`, `cus_add_l3`, `cus_add_l4`, `cus_cn1`, `cus_cn2`, `cus_email`) VALUES
(1, 'Ishara Perera', 'BBX-9190', '185/A/2', 'Bollatha', 'Ganemulla', 'Western Provice, Sri Lanka', '0778154411', '0762084411', 'esoft.isharaperera@gmail.com'),
(2, 'Udara Sampath', 'CAR-4567', 'No 56', 'New World Avenue', 'New York', 'USA', '0718054352', '0786642006', 'usa@hotmail.com'),
(3, 'Lasini Senevirathne', 'BBY-9190', 'No 05/A', 'Nalapaha', 'Divlapitiya', 'Sri Lanka', '0762084411', '0778154411', 'lasini.senevirathne@icloud.com'),
(4, 'Customer 4', 'CIA-5690', 'Home no', 'Street', 'City', 'State', '0712345678', '0798765432', 'customer4@email.com'),
(6, 'Kelum', 'BBY-9342', '185/A/2', 'Bollatha', 'Ganemulla', 'Western Provice, Sri Lanka', '0781236549', '', ''),
(9, 'Nuwan Nimasha', 'BBE-9876', '', '', '', '', '0754123659', '', ''),
(10, 'Niroshan Premarathtne', 'BSX-8767', '', '', '', '', '0781235496', '0712458963', 'niroshan@email.com'),
(11, 'Kethaka Ranasinghe', 'KE-8978', '', '', '', '', '0764789651', '', 'kethaka@gmail.com');

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
(1, 'Ishara', 'Perera', '1997-06-29', '971812869V', 'heavy', '66478455D', 'O+', 'ishara.perera@icloud.com', 'No. 185/A/2, Bollatha, Ganemulla.', '1478', '1479', 'DBA', '2020-10-25', 'Handles all the database related affairs of the system', 1, '2020-10-25 14:02:12', NULL);

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
(2, 'Mobile', '0778154411', 1);

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
(3, 'AIDS', 1, 1);

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
(1, '09:00:00', '18:00:00', 'Thu', 'Fri', 1);

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
(37, 4, 3400, 1800, 5200, '2020-09-29 17:35:14', NULL, 1);

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
(31, 7, 1, 1000, 1000, 37);

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
(20, 2, 300, 37);

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
(1, 'Air Filter', 'MG908', 'Toyota Lasini', 3, 1000, 450, 105000, 18000, 1000, 5, 1, 'Australia', 'This is the first item for testing purposes', '2020-09-13 12:09:35', 1, 1),
(6, 'Toyota Engine Oil', 'I567', 'Toyota', 2, 1000, 800, 10, 100, 5, 2, 2, 'Giriulla', 'Toyota Vehicle Engine Oil', '2020-09-13 12:11:23', 1, 1),
(7, 'Test Item 1', 'M1', 'Manufacturer1', 3, 1000, 800, 10, 100, 5, 2, 3, 'Location', 'Hello, are you going to database?', '2020-09-13 14:04:32', 1, 1),
(8, 'Brake Pad', 'Manufacturer Codesdfsdf', 'Manufacturer Name', 1, 1200, 1000, 10, 100, 0, 1, 1, 'Locaiton', 'Description', '2020-09-14 06:08:28', 1, 1),
(10, 'dfsd', '', '', 2, 15000, 1000, 0, 0, 0, 2, 4, '', '', '2020-09-14 07:06:51', 1, 1),
(11, 'Item validation', '', '', 3, 500, 1000, 0, 0, 0, 1, 5, '', '', '2020-09-14 07:15:58', 1, 1),
(12, 'Item Validation 2', '', '', 1, 1000, 1000, 0, 0, 0, 2, 6, '', '', '2020-09-14 07:18:06', 1, 1),
(13, 'Test Item 2', 'MF10001', 'Test Manu', 2, 1500, 1000, 10, 100, 5, 2, 3, 'Ganemulla', 'The Finest Engine Oil that is good for nothing!', '2020-09-15 02:05:15', 1, 1),
(14, 'Red Hood', 'MF12345', 'South Africa', 3, 800, 500, 0, 10, 5, 3, 6, 'SA', '', '2020-09-15 02:12:42', 1, 1),
(15, 'Oil Cans', 'MF002', 'Havoline', 2, 5000, 200, 10, 50, 5, 2, 2, 'Radawana', 'The finest oil in the Sri Lanka', '2020-09-17 06:47:46', 1, 1);

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
(1, 'Air Filters', 'Air Filters Category', '2020-09-14 09:37:50', 1, 1),
(2, 'Engine Oil', 'Engine Oil Category', '2020-09-13 14:31:07', 1, 1),
(3, 'Hoods', '', '2020-09-15 02:08:21', 1, 1),
(5, 'Dickey', '', '2020-09-16 14:37:57', 1, 1);

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
(2, 'Small', 'Small Items', 1, '2020-09-14 09:32:12'),
(3, 'Medium', 'Medium Items', 1, '2020-09-14 09:32:12'),
(4, 'Large', 'Large Items', 1, '2020-09-15 09:42:11'),
(5, 'Engine Oil', 'Engine Oil Category', 1, '2020-09-14 01:49:40'),
(6, 'Ulra Pro Max', '', 1, '2020-09-15 02:07:52');

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
(1, 1, 0, '0000-00-00', '0000-00-00', '0000-00-00', 499, '2020-09-16 14:53:01', NULL, 1),
(2, 6, 1000, '2020-09-17', '2020-09-25', '2020-09-23', 399, '2020-09-16 14:57:35', NULL, 1),
(3, 7, 1000, '2020-09-16', '2020-09-30', '2020-09-24', 198, '2020-09-16 16:30:10', NULL, 1),
(4, 8, 1500, '2020-09-16', '0000-00-00', '0000-00-00', 98, '2020-09-16 16:39:56', NULL, 1),
(15, 10, 0, '2020-09-18', '0000-00-00', '0000-00-00', 200, '2020-09-18 01:06:44', NULL, 1),
(16, 8, 0, '2020-09-18', '0000-00-00', '0000-00-00', 198, '2020-09-18 01:52:19', NULL, 1),
(19, 11, 147852369, '2020-09-18', '2020-09-30', '2020-09-18', 300, '2020-09-18 12:37:05', NULL, 1),
(20, 11, 0, '2020-09-18', '0000-00-00', '0000-00-00', 300, '2020-09-18 12:37:37', NULL, 1),
(23, 1, 150000145, '2020-09-19', '0000-00-00', '0000-00-00', 289, '2020-09-19 01:14:16', NULL, 1),
(24, 1, 0, '2020-09-21', '0000-00-00', '0000-00-00', -311, '2020-09-21 14:25:39', NULL, 1),
(25, 1, 0, '2020-09-21', '0000-00-00', '0000-00-00', -311, '2020-09-21 14:26:46', NULL, 1),
(26, 1, 17786, '2020-09-22', '0000-00-00', '0000-00-00', -311, '2020-09-22 06:07:42', NULL, 1),
(27, 6, 0, '2020-09-22', '0000-00-00', '0000-00-00', 199, '2020-09-22 06:19:45', NULL, 1),
(28, 1, 0, '2020-10-01', '2020-10-10', '2020-10-09', 200, '2020-10-01 09:32:35', NULL, 1),
(29, 1, 0, '2020-10-02', '0000-00-00', '0000-00-00', 200, '2020-10-02 16:34:26', NULL, 1);

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
(3, 7, 14, 1000, 50, 600, 7, 100, 200, '2020-09-16 09:41:54', 1, 1),
(5, 8, 1, 11, 50, 600, 11111, 111111, 1111111, '2020-09-16 14:38:39', 1, 1),
(8, 10, 0, 0, 100, 800, 0, 0, 0, '2020-09-17 13:07:56', 1, 1),
(9, 11, 14, 500, 200, 1000, 0, 0, 0, '2020-09-18 12:30:38', 1, 1),
(10, 0, 0, 0, 0, 0, 0, 0, 0, '2020-09-19 01:29:25', 1, 1);

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
(4, 'BBX-9190', 1, 3, 3, 80000, 10000, '2020-09-23 11:40:13', NULL, 'This is my personal vehicle', NULL, 10),
(5, 'CAR-4567', 2, 2, 2, 150000, 2500, '2020-09-23 12:41:21', '2020-10-03 11:15:34', 'Gollardo Lamborhini!!!', NULL, 1),
(6, 'KE-8978', 11, 1, 1, 200000, 5000, '2020-09-23 13:36:19', NULL, '', NULL, 10),
(8, 'BBY-9190', 3, 1, 1, 100000, 3000, '2020-09-24 06:50:58', '2020-09-25 14:57:26', '', NULL, 1),
(9, 'BBY-9342', 6, 2, 2, 180000, 4000, '2020-09-24 06:52:38', NULL, '', NULL, 0),
(10, 'BSX-8767', 10, 3, 3, 50000, 5000, '2020-09-25 08:28:12', '2020-09-25 15:17:07', '', NULL, 1);

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
(1, 'esoft.isharaperera@gmail.com', '2B91712EE1F43FFE4C3D7784C3A4365E41607DE4', 1, 1),
(2, 'lasini.senevirathne@icloud.com', 'F9EC55464E399A82E0242C72252379D026BF535B', 2, 1);

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
(1, 1, 58750, NULL, NULL),
(2, 2, 19000, '2020-10-05 10:14:16', NULL),
(3, 5, 0, '2020-10-05 10:30:46', NULL);

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
(8, 10, 1000, 0, 0, 3);

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
(24, 45000, 5, '2020-10-05 03:51:00', NULL);

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
(32, 1, 450, 100, 45000, 24);

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
(1, 'Engine Oil Change', 1300, 10, 0, 0, 0, 0, 0, 100, 0, 0, 0, 1, 2, '2020-09-10 04:22:58', NULL, 'Oil Change should be done once a year.', 1),
(2, 'Interior Body Wash', 1500, 10, 20, 0, 0, 0, 0, 100, 0, 0, 0, 2, 2, '2020-09-10 08:05:04', NULL, 'Clean the inside!', 1),
(6, 'Test Service Hello', 20000, 10, 0, 0, 0, 0, 0, 200, 0, 0, 0, 1, 1, '2020-09-11 11:39:54', NULL, '', 1),
(7, 'Body Wash', 1500, 10, 0, 0, 0, 0, 0, 100, 200, 0, 0, 1, 2, '2020-09-22 06:06:23', NULL, 'dghe', 1);

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
(1, 'Full Service', 'Full Service includes a vast amount of services.', 1, '2020-09-21 14:23:21', NULL),
(2, 'Normal Service', 'Normal service has a vast amount of service to offer just for you!', 1, '2020-09-10 08:03:39', NULL),
(3, 'Test Category', '', 1, '2020-09-11 11:28:51', NULL);

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
(1, 'oil changing', 1, '2020-09-22 06:04:58', NULL, 'Oil Change is included a vast amount of services.', 1),
(2, 'Body Wash', 2, '2020-09-10 14:16:59', NULL, 'Keep you car clean!', 1);

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
(5, 'Ishara Traders', '185/A/2', 'Bollatha', 'Ganemulla', 'Western Provice, Sri Lanka', '0778154411', '0762084411', 'ishara.traders@gmail.com', '', '2020-10-02 14:32:49', 1),
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
(1, 'Ishara', 'Perera', 'esoft.isharaperera@gmail.com', 'Male', '1997-06-29', '971812869V', '0778154411', '0778154411', 1, '1599121893_ish_edited.png', '2020-09-03 08:31:33', 1),
(2, 'Lasini', 'Senevirathne', 'lasini.senevirathne@icloud.com', 'Female', '1998-05-13', '986341323V', '0762084411', '0778154411', 1, '1599213411_IMG_1582756223-2.jpeg', '2020-09-04 09:56:51', 1);

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
(3, 'BMW', '2020-09-23 08:14:02', 1);

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
(3, 'I8', 3, 2019, '2020-09-23 08:16:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

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
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_contact`
--
ALTER TABLE `employee_contact`
  MODIFY `emp_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_illness`
--
ALTER TABLE `employee_illness`
  MODIFY `emp_illness_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_roster`
--
ALTER TABLE `employee_roster`
  MODIFY `emp_roster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `invoice_item`
--
ALTER TABLE `invoice_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `invoice_service`
--
ALTER TABLE `invoice_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `item_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_size`
--
ALTER TABLE `item_size`
  MODIFY `item_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `item_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `item_stock_level`
--
ALTER TABLE `item_stock_level`
  MODIFY `stk_lvl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_item`
--
ALTER TABLE `job_item`
  MODIFY `ji_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_grn`
--
ALTER TABLE `sale_grn`
  MODIFY `sgrn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_grn_item`
--
ALTER TABLE `sale_grn_item`
  MODIFY `sgi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sale_purchase_order`
--
ALTER TABLE `sale_purchase_order`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sale_purchase_order_item`
--
ALTER TABLE `sale_purchase_order_item`
  MODIFY `poi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `service_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_sub_category`
--
ALTER TABLE `service_sub_category`
  MODIFY `service_sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_level`
--
ALTER TABLE `user_access_level`
  MODIFY `user_access_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_make`
--
ALTER TABLE `vehicle_make`
  MODIFY `vehicle_make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `vehicle_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
