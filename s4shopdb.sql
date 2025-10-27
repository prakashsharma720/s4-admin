-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2025 at 11:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s4shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `image`, `slug`, `flag`) VALUES
(1, 'Febric', 'hello', 'ChatGPT Image Oct 17, 2025, 01_01_11 AM.png', 'febric', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) NOT NULL,
  `department_name` varchar(300) NOT NULL,
  `department_code` varchar(100) NOT NULL,
  `flag` tinyint(2) NOT NULL,
  `show_dept` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_code`, `flag`, `show_dept`) VALUES
(1, 'Administration', 'Admin', 0, 1),
(2, 'Business Development', 'BD', 0, 1),
(3, 'HR Department', 'HR', 0, 1),
(4, 'Web Development', 'WD', 0, 1),
(5, 'Digital Marketing', 'DM', 0, 1),
(6, 'Web & Graphics Design', 'WGD', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `flag`) VALUES
(1, 'CEO', 0),
(2, 'Business Operation Head', 0),
(3, 'Business Manager', 0),
(4, 'HR Executive', 0),
(5, 'Sr. Software Developer', 0),
(6, 'Jr. Software Developer', 0),
(7, 'Full Stack Developer', 0),
(8, 'Team Leader', 0),
(9, 'Sr. SEO Executive', 0),
(10, 'Jr. SEO Executive', 0),
(11, 'Graphics Designer', 0),
(12, 'Intern', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(20) NOT NULL,
  `name` varchar(300) NOT NULL,
  `employee_code` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `emobile_no` varchar(11) DEFAULT NULL,
  `ename` varchar(200) DEFAULT NULL,
  `role_id` int(10) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `author_email` varchar(255) DEFAULT NULL,
  `department_id` int(5) DEFAULT NULL,
  `designation_id` varchar(200) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `pan_no` varchar(300) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `aadhaar_no` varchar(300) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `employee_description` varchar(255) DEFAULT NULL,
  `office_time_in` time DEFAULT NULL,
  `leave` varchar(255) DEFAULT NULL,
  `office_time_out` time DEFAULT NULL,
  `target` varchar(100) DEFAULT NULL,
  `forgot_code` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `edited_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `edited_by` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `account_holder_name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `account_type` varchar(200) NOT NULL,
  `upi_id` varchar(200) NOT NULL,
  `salary` decimal(15,2) NOT NULL,
  `hra` decimal(15,2) NOT NULL,
  `c_allowance` decimal(10,2) NOT NULL,
  `m_allowance` decimal(10,2) NOT NULL,
  `o_allowance` decimal(10,2) NOT NULL,
  `total_net_salary` decimal(15,2) NOT NULL,
  `uan` varchar(100) NOT NULL,
  `esi` varchar(100) NOT NULL,
  `pf` varchar(100) NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mobile_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `employee_code`, `email`, `mobile_no`, `emobile_no`, `ename`, `role_id`, `author_id`, `author_email`, `department_id`, `designation_id`, `date_of_joining`, `username`, `password`, `pan_no`, `blood_group`, `gender`, `aadhaar_no`, `dob`, `photo`, `address`, `employee_description`, `office_time_in`, `leave`, `office_time_out`, `target`, `forgot_code`, `status`, `created_on`, `created_by`, `edited_on`, `edited_by`, `flag`, `account_holder_name`, `bank_name`, `account_number`, `ifsc_code`, `branch_name`, `account_type`, `upi_id`, `salary`, `hra`, `c_allowance`, `m_allowance`, `o_allowance`, `total_net_salary`, `uan`, `esi`, `pf`, `email_verified`, `mobile_verified`) VALUES
(1, 'Musk Owl LLP', 1, 'admin@gmail.com', '8769900138', '4564365654', 'father', 1, 1, 'admin@gmail.com', 1, '1', '2020-07-07', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'DGHDF15256K', 'A+', 'Male', '494569698585', '2019-07-11', 'uploads/user_media/vx2-go-lllos-desktop.png', 'Plot No. B-438, Road No. 18A, BIA\r\nKaladwas, Udaipur: 313002', 'dfgdfg', '09:30:00', '4', '06:00:00', '100', '402568', 0, '2019-04-01 13:11:03', 1, '2025-09-18 10:57:24', 4, 0, 'Vikas Vaishnav', 'SBI', '998877665544', 'SBIN0001234', 'Lakadwas', 'savings', '852369@ybl', '20000.00', '2000.00', '2000.00', '1000.00', '1000.00', '260000.00', '852369', '34543543', '123456', 0, 0),
(4, 'Prakash Sharma', 4, 'prakash@muskowl.com', '9664100138', '9798798798', 'shakal', 1, 4, 'prakash@muskowl.com', 4, '1', '2019-03-04', 'yash', '202cb962ac59075b964b07152d234b70', 'EGMPS7125P', 'B+', 'Male', '433064458185', '1992-06-25', '', 'udaipur', 'hgjgh', '09:30:00', '4', '18:00:00', '100', '708524', 0, '2022-01-08 09:47:30', 1, '2025-09-19 11:12:29', 1, 0, 'Prakash sharma', 'ICICI', '004501560103', 'ICICI00045', 'Madhuban', 'savings', '9664100132@Okicick', '13000.00', '3500.00', '0.00', '0.00', '0.00', '16500.00', '87465467897564', '5879798', '97987', 0, 0),
(16, 'bhavesh', 5, 'bhavesh@gmail.com', '8290999222', '2345678901', 'Bhavesh', 4, 4, 'prakash@muskowl.com', 1, '12', '1970-01-01', 'bhavesh', '202cb962ac59075b964b07152d234b70', '', '', '', '433064458585', '1970-01-01', '', '', NULL, NULL, '2', NULL, '100', '', 1, '2025-02-01 15:19:12', 1, '2025-09-18 10:56:59', 0, 1, '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0.00', '0.00', 0, 0),
(17, 'Deepak Sharmass', 6, 'deepak@gmail.com', '9664100138', '6565656656', 'Narayan Das', 1, 4, 'prakash@muskowl', 4, '6', '2023-06-13', 'Deepak', '202cb962ac59075b964b07152d234b70', 'XYZPQ5678L', '', 'Male', '123456789630', '2000-02-08', '', 'Udaipur', NULL, NULL, '2', NULL, '100', '', 0, '2025-06-02 10:53:41', 17, '2025-09-18 10:56:59', 0, 0, 'Deepak Sharma', 'SBI', '998877665544', 'SBIN0001234', 'Lakadwas', 'savings', '852369@ybl', '20000.00', '2000.00', '1000.00', '1000.00', '1000.00', '27000.00', '852369', '34543543', '123456', 0, 0),
(18, 'nayan', 0, 'nayan@gmail.com', '', '', '', 6, 0, '', 0, '', '0000-00-00', 'nayan', '202cb962ac59075b964b07152d234b70', '', '', '', '', '0000-00-00', '', '', NULL, NULL, NULL, NULL, '100', '', 0, '2025-06-12 07:01:53', 0, '2025-06-15 07:13:46', 0, 0, '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', 0, 0),
(19, 'demo', 0, 'saral@gmail.com', '', '', '', 4, 0, '', 0, '', '0000-00-00', 'saral', '202cb962ac59075b964b07152d234b70', '', '', '', '', '0000-00-00', '', '', NULL, NULL, NULL, NULL, '100', '', 0, '2025-06-12 07:13:59', 0, '2025-06-18 18:52:11', 0, 0, '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', 0, 0),
(20, 'asd', 7, 'asds@gmil.vom', '1123121231', '', '', 4, 0, NULL, 2, '2', '1970-01-01', 'yash', '202cb962ac59075b964b07152d234b70', '', NULL, 'Male', '', '1970-01-01', '', '', NULL, NULL, NULL, NULL, '100', NULL, 1, '2025-06-18 19:21:57', 4, '2025-09-18 10:56:59', 0, 1, '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', 0, 0),
(21, 'adsad', 8, 'asd@gmail.com', '1231231231', '', '', 1, 0, NULL, 1, '1', '1970-01-01', 'yash', '202cb962ac59075b964b07152d234b70', '', NULL, 'Male', '', '1970-01-01', '', '', NULL, NULL, NULL, NULL, '100', '730128', 1, '2025-06-18 19:31:38', 4, '2025-09-18 10:56:59', 0, 1, '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', 0, 0),
(22, 'asdasd', 9, 'qq@gm.com', '1231231231', '', '', 3, 0, NULL, 2, '1', '2025-06-19', 'yash', '202cb962ac59075b964b07152d234b70', '', NULL, 'Male', '', '2025-06-19', '', '', NULL, NULL, NULL, NULL, '100', NULL, 1, '2025-06-18 19:34:17', 4, '2025-09-18 10:56:59', 0, 1, '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', 0, 0),
(23, 'Deepak Sharma', 10, 'deepaksharma.muskow@gmail.com', '7690064046', '7690064046', 'Rahul Sharma', 5, 4, 'prakash@muskowl.com', 4, '6', '2023-07-01', 'deepaksharma.muskowl', '202cb962ac59075b964b07152d234b70', 'abcde1234f', NULL, 'Male', '463453453535', '1998-05-15', '', 'Jaipur', 'sdfsdf', '08:00:00', '0', '20:00:00', '100', NULL, 0, '2025-08-21 07:13:24', 1, '2025-09-18 10:56:59', 0, 0, '', 'Bank of Baroda', '7756756756567', 'BARB0KOOKAS', 'KOOKAS', 'savings', '7690064046@pthdfc', '20000.00', '0.00', '0.00', '0.00', '0.00', '20000.00', '09', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lead_csv`
--

CREATE TABLE `lead_csv` (
  `id` int(11) NOT NULL,
  `lead_code` varchar(100) NOT NULL,
  `duplicate_lead_code` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `lead_title` text DEFAULT NULL,
  `work_description` text DEFAULT NULL,
  `contact_person` varchar(255) NOT NULL,
  `country` varchar(250) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `current_location` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `lead_source` text DEFAULT NULL,
  `lead_architect` varchar(255) DEFAULT NULL,
  `firm_name` varchar(255) DEFAULT NULL,
  `mediator_mobile_no` varchar(255) DEFAULT NULL,
  `mediator_address` varchar(255) DEFAULT NULL,
  `lead_assign` int(11) DEFAULT NULL,
  `project_address` varchar(255) DEFAULT NULL,
  `region_selection` varchar(50) DEFAULT NULL,
  `lead_site_file` varchar(255) DEFAULT NULL,
  `is_duplicate` int(11) NOT NULL,
  `assign_to` int(11) NOT NULL,
  `assign_by` int(11) NOT NULL,
  `assign_date` date NOT NULL,
  `approve_date` date NOT NULL,
  `reject_date` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `lead_status` varchar(100) DEFAULT NULL,
  `convert_quotation` bigint(21) DEFAULT 0,
  `leads_priority` varchar(255) NOT NULL,
  `edited_by` tinyint(6) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_csv`
--

INSERT INTO `lead_csv` (`id`, `lead_code`, `duplicate_lead_code`, `date`, `category_name`, `lead_title`, `work_description`, `contact_person`, `country`, `mobile`, `city`, `state`, `map_link`, `current_location`, `email`, `lead_source`, `lead_architect`, `firm_name`, `mediator_mobile_no`, `mediator_address`, `lead_assign`, `project_address`, `region_selection`, `lead_site_file`, `is_duplicate`, `assign_to`, `assign_by`, `assign_date`, `approve_date`, `reject_date`, `created_by`, `action`, `lead_status`, `convert_quotation`, `leads_priority`, `edited_by`, `edited_on`) VALUES
(21, 'MUSK0001', '', '2025-10-22', 'Raw Material', 'test', NULL, 'Musk Owl', 'India', '6378884529', 'Udaipur', 'Rajasthan', 'https://www.google.com/maps/dir/?api=1&origin=24.6009029,73.7764245&destination=24.6009029,73.7764245', 'Udaipur Bypass, Debari, Girwa Tehsil, Udaipur, Rajasthan, 313003, India', 'saralstone@gmail.com', 'Field', 'Architect', 'Muskowl LLP', '7846859784', 'Udaipur\r\nhjkhj', 4, NULL, 'South', 'http://localhost:8080/CIProject/saral-erp-mgt/uploads/leads/df3f8677ab71b4cea571d3f1379a2046.jpg', 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 4, NULL, 'Won', 0, 'Medium', 0, '2025-10-24 06:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'uri',
  `page_id` int(11) NOT NULL DEFAULT 0,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icon_class` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `dyn_group_id` int(11) NOT NULL DEFAULT 0,
  `position` int(5) NOT NULL DEFAULT 0,
  `target` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `is_parent` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `show_menu` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `priority` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `link_type`, `page_id`, `url`, `controller`, `action`, `icon_class`, `dyn_group_id`, `position`, `target`, `parent_id`, `is_parent`, `show_menu`, `priority`) VALUES
(1, 'Master Dashboard', 'uri', 0, 'http://localhost/musk_erp/', 'User_authentication', 'admin_dashboard', 'fa fa-dashboard', 0, 0, '', 0, 'N', 'Y', 2),
(2, 'Employees', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-user-o', 0, 0, '', 1421, 'Y', 'Y', 0),
(3, 'Add', 'uri', 0, 'http://localhost/musk_erp/', 'Employees', 'add', 'fa fa-plus', 0, 0, '', 2, 'N', 'Y', 0),
(4, 'View List', 'uri', 0, 'http://localhost/musk_erp/', 'Employees', 'index', 'fa fa-list', 0, 0, '', 2, 'N', 'Y', 0),
(8, 'Change Password', 'uri', 0, 'http://localhost/musk_erp/', 'User_authentication', 'MyPasswordChangeView', '', 0, 0, NULL, 0, 'N', 'N', 0),
(9, 'My Profile', 'uri', 0, 'http://localhost/musk_erp/', 'Employees', 'MyProfile', '', 0, 0, '', 0, 'N', 'N', 0),
(10, 'Edit', 'uri', 0, 'http://localhost/musk_erp/', 'Employees', 'edit', 'fa fa-circle', 0, 0, '', 2, 'N', 'N', 0),
(12, 'Menus', 'uri', 0, 'http://localhost/musk_erp/', 'Meenus', 'index', 'fa fa-bars', 0, 0, '', 1000, 'N', 'Y', 0),
(13, 'User Rights', 'uri', 0, 'http://localhost/musk_erp/', 'Meenus', 'UserRights', 'fa fa-key', 0, 0, '', 1000, 'N', 'Y', 0),
(14, 'Leads Services', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Category', 'index', 'fa fa-circle', 0, 0, '', 15, 'N', 'N', 0),
(15, 'Leads Generation', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-file-o', 0, 0, '', 1417, 'Y', 'Y', 0),
(16, 'Leads', 'uri', 0, 'http://localhost/musk_erp/', 'Leads', 'index', 'fa fa-circle', 0, 0, '', 15, 'N', 'Y', 0),
(17, 'Edit Lead', 'uri', 0, 'http://localhost/musk_erp/', 'Leads', 'edit', 'fa fa-edit', 0, 0, '', 16, 'N', 'N', 0),
(18, 'Add Lead', 'uri', 0, 'http://localhost/musk_erp/', 'Leads', 'add', 'fa fa-add', 0, 0, '', 16, 'N', 'N', 0),
(1000, 'Account Settings', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-cog', 0, 0, '', 0, 'Y', 'Y', 0),
(1001, 'Lead follow Up', 'uri', 0, 'http://localhost/musk_erp/', 'Leads', 'followups', 'fa fa-envelope', 0, 0, '', 15, 'N', 'N', 0),
(1002, 'Import', 'uri', 0, 'http://localhost/musk_erp/', 'Leads', 'importdata', '', 0, 0, '', 15, 'N', 'N', 0),
(1003, 'Leave Module', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-diamond', 0, 0, '', 1421, 'Y', 'Y', 0),
(1004, 'holidays', 'uri', 0, 'http://localhost/musk_erp/', 'Leave', 'holidays', 'fa fa-circle', 0, 0, '', 1003, 'N', 'Y', 0),
(1005, 'Leave Balance', 'uri', 0, 'http://localhost/CI/dream-erp/', 'Leave', 'balance', 'fa fa-circle', 0, 0, '', 1003, 'N', 'Y', 0),
(1006, 'Leave Applications', 'uri', 0, 'http://localhost/musk_erp/', 'Leave', 'index', 'fa fa-circle', 0, 0, '', 1003, 'N', 'Y', 0),
(1007, 'New leave', 'uri', 0, 'http://localhost/musk_erp/', 'Leave', 'create', 'fa fa-plus', 0, 0, '', 1006, 'N', 'N', 0),
(1008, 'Leave Edit', 'uri', 0, 'http://localhost/musk_erp/', 'Leave', 'edit', 'fa fa-edit', 0, 0, '', 1006, 'N', 'N', 0),
(1009, 'Leave Reports', 'uri', 0, 'http://localhost/musk_erp/', 'Leave', 'History', 'fa fa-circle', 0, 0, '', 1003, 'N', 'N', 0),
(1010, 'Leave Types', 'uri', 0, 'http://localhost/musk_erp/', 'Leave', 'types', 'fa fa-circle', 0, 0, '', 1003, 'N', 'Y', 0),
(1011, 'MO website Leads', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Leads', 'mo_leads', 'fa fa-file-excel-o', 0, 0, '', 1417, 'N', 'Y', 0),
(1012, 'Daily Tasks', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-file', 0, 0, '', 1421, 'Y', 'Y', 0),
(1013, 'Projects', 'uri', 0, 'http://localhost/musk_erp/', 'Dailytasks', 'projects', 'fa fa-circle', 0, 0, '', 1012, 'N', 'Y', 0),
(1014, 'Tasks', 'uri', 0, 'http://localhost/musk_erp/', 'Dailytasks', 'tasks', 'fa fa-circle', 0, 0, '', 1012, 'N', 'Y', 0),
(1015, 'Create Task', 'uri', 0, 'http://localhost/musk_erp/', 'Dailytasks', 'taskcreate', 'fa fa-circle', 0, 0, '', 1014, 'N', 'N', 0),
(1016, 'Create Task', 'uri', 0, 'http://localhost/musk_erp/', 'Dailytasks', 'task_add', 'fa fa-circle', 0, 0, '', 1014, 'N', 'N', 0),
(1017, 'Edit Task', 'uri', 0, 'http://localhost/musk_erp/', 'Dailytasks', 'edit', 'fa fa-circle', 0, 0, '', 1014, 'N', 'N', 0),
(1018, 'task_history', 'uri', 0, 'http://localhost/musk_erp/', 'Dailytasks', 'task_history', 'fa fa-circle', 0, 0, '', 1014, 'N', 'N', 0),
(1019, 'Leave allotment', 'uri', 0, 'http://localhost/musk_erp/', 'Leave', 'leave_allotment', 'fa fa-circle', 0, 0, '', 1003, 'N', 'Y', 0),
(1020, 'Employee Review', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Employee_Review', 'index', 'fa fa-circle', 0, 0, '', 1418, 'N', 'Y', 0),
(1021, 'Notification Master', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Notifications', 'index', 'fa fa-bell', 0, 0, '', 1418, 'N', 'Y', 0),
(1022, 'Leave Approval', 'uri', 0, 'http://localhost/musk_erp/', 'Leave', 'Approval', 'fa fa-circle', 0, 0, '', 1003, 'N', 'Y', 0),
(1023, 'Broadcast', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Broadcast', 'index', 'fa fa-podcast', 0, 0, '', 1418, 'N', 'Y', 0),
(1024, 'Leads Marketing', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Leads_marketing', 'index', 'fa fa-circle', 0, 0, '', 1417, 'N', 'Y', 0),
(1025, 'Marketing follow Up', 'uri', 0, 'http://localhost/musk_erp/', 'Leads_marketing', 'followups', 'fa fa-forward', 0, 0, '', 1024, 'N', 'N', 0),
(1026, 'Add Marketing', 'uri', 0, 'http://localhost/musk_erp/', 'Leads_marketing', 'add', 'fa fa-add', 0, 0, '', 1024, 'N', 'N', 0),
(1027, 'Reminder Master', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Notifications', 'allreminder', 'fa fa-bell', 0, 0, '', 1418, 'N', 'Y', 0),
(1028, 'Assigned Lead', 'uri', 0, 'http://localhost/musk_erp-new/', 'Leads', 'Assignleadview', 'fa fa-eye', 0, 0, '', 15, 'N', 'Y', 0),
(1029, 'duplicateview', 'uri', 0, 'http://localhost/musk_erp-new/', 'Leads', 'view', '', 0, 0, '', 15, 'N', 'N', 0),
(1030, 'Role Master', 'uri', 0, 'http://localhost/musk_erp-new/', 'User_authentication', 'role_master', 'fa fa-circle', 0, 0, '', 1000, 'N', 'Y', 0),
(1031, 'Lead Report', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Cronjob', 'generating', 'fa fa-circle', 0, 0, '', 1417, 'N', 'Y', 0),
(1032, 'nofollowups view', 'uri', 0, 'http://localhost/musk_erp-new/', 'Leads_marketing', 'Nofollowupsview', 'fa fa-circle', 0, 0, '', 0, 'N', 'N', 0),
(1033, 'Customer Complaints', 'uri', 0, 'http://localhost/CI/dream-erp/', 'Leads', 'worshop_leads', 'fa fa-file', 0, 0, '', 1417, 'N', 'Y', 0),
(1034, 'MO Events', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Employees', 'events', 'fa fa-fire', 0, 0, '', 1418, 'N', 'Y', 0),
(1035, 'Payroll Module', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-file', 0, 0, '', 1421, 'Y', 'Y', 0),
(1036, 'Attendance List', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'PayrollController', 'index', 'fa fa-circle', 0, 0, '', 1035, 'N', 'Y', 0),
(1037, 'Add Attendance', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'PayrollController', 'add', 'fa fa-circle', 0, 0, '', 1035, 'N', 'N', 0),
(1038, 'Edit Attandance', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'PayrollController', 'edit', '', 0, 0, '', 1035, 'N', 'N', 0),
(1039, 'Payroll Calculation', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'PayrollController', 'show_calculation', 'fa fa-circle', 0, 0, '', 1035, 'N', 'Y', 0),
(1140, 'Dashboard', 'uri', 0, 'http://192.168.2.50/cnco/', 'User_authentication', 'dashboard', 'fa fa-dashboard', 0, 0, '', 0, 'N', 'Y', 1),
(1142, 'SCM Module', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-users', 0, 0, '', 0, 'Y', 'Y', 0),
(1143, 'Masters', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-diamond', 0, 0, '', 1142, 'Y', 'Y', 0),
(1149, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Suppliers', 'add', 'fa fa-plus', 0, 0, '', 1151, 'N', 'Y', 0),
(1150, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Suppliers', 'index', 'fa fa-list', 0, 0, '', 1151, 'N', 'Y', 0),
(1151, 'Suppliers', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-user', 0, 0, '', 1142, 'Y', 'Y', 0),
(1152, 'Master Categories', 'uri', 0, 'http://192.168.2.50/cnco/', 'Category', 'index', 'fa fa-circle', 0, 0, '', 1143, 'N', 'Y', 0),
(1154, 'Employees', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-user-o', 0, 0, '', 1340, 'Y', 'Y', 0),
(1155, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Employees', 'add', 'fa fa-plus', 0, 0, '', 1154, 'N', 'Y', 0),
(1156, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Employees', 'index', 'fa fa-list', 0, 0, '', 1154, 'N', 'Y', 0),
(1157, 'RM Code', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-barcode', 0, 0, '', 1142, 'Y', 'Y', 0),
(1158, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Rm_code', 'add', 'fa fa-plus', 0, 0, '', 1157, 'N', 'Y', 0),
(1159, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Rm_code', 'index', 'fa fa-list', 0, 0, '', 1157, 'N', 'Y', 0),
(1160, 'Purchase Orders', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-shopping-cart', 0, 0, '', 1142, 'Y', 'Y', 0),
(1161, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Purchase_order', 'ApprovedReqListForPO', 'fa fa-plus', 0, 0, '', 1160, 'N', 'Y', 0),
(1162, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Purchase_order', 'index', 'fa fa-list', 0, 0, '', 1160, 'N', 'Y', 0),
(1164, 'Menus', 'uri', 0, 'http://192.168.2.50/cnco/', 'Meenus', 'index', 'fa fa-bars', 0, 0, '', 1394, 'N', 'Y', 0),
(1165, 'User Rights', 'uri', 0, 'http://192.168.2.50/cnco/', 'Meenus', 'UserRights', 'fa fa-key', 0, 0, '', 1394, 'N', 'Y', 0),
(1166, 'Reports', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-file-excel-o', 0, 0, '', 1142, 'Y', 'Y', 0),
(1167, 'Suppliers Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Suppliers', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1168, 'Finished Good', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-circle', 0, 0, '', 1143, 'Y', 'Y', 0),
(1169, 'GIR Registers', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-file-o', 0, 0, '', 1142, 'Y', 'Y', 0),
(1170, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'add', 'fa fa-circle', 0, 0, '', 1169, 'N', 'N', 0),
(1171, 'General GIR', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'index', 'fa fa-circle', 0, 0, '', 1169, 'N', 'Y', 0),
(1176, 'Issue Slips', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-sign-in', 0, 0, '', 1142, 'Y', 'Y', 0),
(1177, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Issue_slips', 'add', 'fa fa-plus', 0, 0, '', 1176, 'N', 'Y', 0),
(1178, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Issue_slips', 'index', 'fa fa-list', 0, 0, '', 1176, 'N', 'Y', 0),
(1179, 'Change Password', 'uri', 0, 'http://192.168.2.50/cnco/', 'User_authentication', 'MyPasswordChangeView', '', 0, 0, '', 0, 'N', 'N', 0),
(1180, 'My Profile', 'uri', 0, 'http://192.168.2.50/cnco/', 'Employees', 'MyProfile', '', 0, 0, '', 0, 'N', 'N', 0),
(1182, 'Supplier Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Suppliers', 'edit_supplier_view', '', 0, 0, '', 1151, 'N', 'N', 0),
(1183, 'Grids', 'uri', 0, 'http://192.168.2.50/cnco/', 'Grid', 'index', 'fa fa-circle', 0, 0, '', 1143, 'N', 'Y', 0),
(1184, 'Raw Material', 'uri', 0, 'http://192.168.2.50/cnco/', 'Raw_material', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1186, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Employees', 'edit', 'fa fa-circle', 0, 0, '', 1154, 'N', 'N', 0),
(1190, 'Edit ', 'uri', 0, 'http://192.168.2.50/cnco/', 'Workers', 'edit', 'fa fa-plus', 0, 0, '', 1187, 'N', 'N', 0),
(1191, 'Transporter', 'uri', 0, 'http://192.168.2.50/cnco/', 'Transporters', '', 'fa fa-truck', 0, 0, '', 1142, 'Y', 'Y', 0),
(1192, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Transporters', 'add', 'fa fa-plus', 0, 0, '', 1191, 'N', 'Y', 0),
(1193, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Transporters', 'index', 'fa fa-list', 0, 0, '', 1191, 'N', 'Y', 0),
(1194, 'Edit ', 'uri', 0, 'http://192.168.2.50/cnco/', 'Transporters', 'edit_transporter_view', 'fa fa-plus', 0, 0, '', 1191, 'N', 'N', 0),
(1195, 'Transporters Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Transporters', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1196, 'Criteria', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_criteria', 'index', 'fa fa-circle', 0, 0, '', 1197, 'N', 'Y', 0),
(1197, 'Evaluation Master', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-check', 0, 0, '', 1142, 'Y', 'Y', 0),
(1201, 'Purchase Orders Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Purchase_order', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1205, 'Packing Material', 'uri', 0, 'http://192.168.2.50/cnco/', 'Packing_materials', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1207, 'Categories', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-circle', 0, 0, '', 1143, 'Y', 'Y', 0),
(1208, 'Lab Chemicals', 'uri', 0, 'http://192.168.2.50/cnco/', 'Lab_chemicals', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1209, 'Plant and Machinery', 'uri', 0, 'http://192.168.2.50/cnco/', 'Plant_and_machinery', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1210, 'Services', 'uri', 0, 'http://192.168.2.50/cnco/', 'Services', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1211, 'Consultancy', 'uri', 0, 'http://192.168.2.50/cnco/', 'Consultancy', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1212, 'Computer Peripheral', 'uri', 0, 'http://192.168.2.50/cnco/', 'Computer_peripherals', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1213, 'Electrical Goods', 'uri', 0, 'http://192.168.2.50/cnco/', 'Electrical_goods', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1214, 'Stationery', 'uri', 0, 'http://192.168.2.50/cnco/', 'Stationery', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1215, 'Building Materials', 'uri', 0, 'http://192.168.2.50/cnco/', 'Building_materials', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1216, 'Mechanical Items', 'uri', 0, 'http://192.168.2.50/cnco/', 'Mechanical_items', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1217, 'General Plant Chemicals', 'uri', 0, 'http://192.168.2.50/cnco/', 'General_plant_chemicals', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1218, 'Protective Equipments', 'uri', 0, 'http://192.168.2.50/cnco/', 'Protective_equipments', 'index', 'fa fa-circle', 0, 0, '', 1207, 'N', 'Y', 0),
(1219, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Rm_code', 'edit', 'fa fa-cirlce', 0, 0, '', 1157, 'N', 'N', 0),
(1220, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'edit', 'fa fa-circle', 0, 0, '', 1169, 'N', 'N', 0),
(1221, 'Grades', 'uri', 0, 'http://192.168.2.50/cnco/', 'Grades', 'index', 'fa fa-circle', 0, 0, '', 1143, 'N', 'Y', 0),
(1222, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Finish_goods', 'add', 'fa fa-plus', 0, 0, '', 1168, 'N', 'Y', 0),
(1223, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Finish_goods', 'index', 'fa fa-list', 0, 0, '', 1168, 'N', 'Y', 0),
(1224, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Finish_goods', 'edit', '', 0, 0, '', 1168, 'N', 'N', 0),
(1225, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Purchase_order', 'edit', '', 0, 0, '', 1160, 'N', 'N', 0),
(1226, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Requisition_slips', 'edit', '', 0, 0, '', 1273, 'N', 'N', 0),
(1227, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Issue_slips', 'edit', '', 0, 0, '', 1176, 'N', 'N', 0),
(1228, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_supplier_add', 'fa fa-plus', 0, 0, '', 1230, 'N', 'Y', 0),
(1229, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_sup_index', 'fa fa-list', 0, 0, '', 1230, 'N', 'Y', 0),
(1230, 'Supplier Evaluation', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-circle', 0, 0, '', 1197, 'N', 'Y', 0),
(1231, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_supplier_edit', '', 0, 0, '', 1230, 'N', 'N', 0),
(1232, 'Transporter Evaluation ', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-circle', 0, 0, '', 1197, 'N', 'Y', 0),
(1233, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_transporter_add', 'fa fa-plus', 0, 0, '', 1232, 'N', 'Y', 0),
(1234, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_tp_index', 'fa fa-list', 0, 0, '', 1232, 'N', 'Y', 0),
(1235, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_transporter_edit', '', 0, 0, '', 1232, 'N', 'N', 0),
(1236, 'Service Provider', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-user-o', 0, 0, '', 1142, 'Y', 'Y', 0),
(1237, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Service_providers', 'add', 'fa fa-plus', 0, 0, '', 1236, 'N', 'Y', 0),
(1238, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Service_providers', 'edit_service_provider_view', '', 0, 0, '', 1236, 'N', 'N', 0),
(1239, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Service_providers', 'index', 'fa fa-list', 0, 0, '', 1236, 'N', 'Y', 0),
(1240, 'Units', 'uri', 0, 'http://192.168.2.50/cnco/', 'Unit', 'index', 'fa fa-circle', 0, 0, '', 1143, 'N', 'Y', 0),
(1241, 'Sub Categories', 'uri', 0, 'http://192.168.2.50/cnco/', 'Sub_category', 'index', 'fa fa-circle', 0, 0, '', 1143, 'N', 'Y', 0),
(1242, 'Service Provider Evaluation', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-circle', 0, 0, '', 1197, 'Y', 'Y', 0),
(1243, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_sprovider_add', 'fa fa-plus', 0, 0, '', 1242, 'N', 'Y', 0),
(1244, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_sprovider_index', 'fa fa-list', 0, 0, '', 1242, 'N', 'Y', 0),
(1245, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'ev_sprovider_edit', 'fa fa-edit', 0, 0, '', 1242, 'N', 'N', 0),
(1246, 'Departments', 'uri', 0, 'http://192.168.2.50/cnco/', 'Department', 'index', 'fa fa-circle', 0, 0, '', 1143, 'N', 'Y', 0),
(1270, 'Requisition Slips', 'uri', 0, 'http://192.168.2.50/cnco/', 'Requisition_slips', '', 'fa fa-shopping-cart', 0, 0, '', 1142, 'Y', 'Y', 0),
(1272, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Requisition_slips', 'add', 'fa fa-plus', 0, 0, '', 1270, 'N', 'Y', 0),
(1273, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Requisition_slips', 'edit', 'fa fa-edit', 0, 0, '', 1270, 'N', 'N', 0),
(1274, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Requisition_slips', 'index', 'fa fa-list', 0, 0, '', 1270, 'N', 'Y', 0),
(1275, 'Approval', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-check', 0, 0, '', 1142, 'Y', 'Y', 0),
(1276, 'Requisitions', 'uri', 0, 'http://192.168.2.50/cnco/', 'Requisition_slips', 'approval', 'fa fa-circle', 0, 0, '', 1275, 'N', 'Y', 0),
(1277, 'Customer', 'uri', 0, 'http://192.168.2.50/cnco/', 'Customers', '', 'fa fa-user-circle-o', 0, 0, '', 1142, 'Y', 'Y', 0),
(1278, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Customers', 'add', 'fa fa-plus', 0, 0, '', 1277, 'N', 'Y', 0),
(1279, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Customers', 'index', 'fa fa-list', 0, 0, '', 1277, 'N', 'Y', 0),
(1280, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Customers', 'edit_customer_view', '', 0, 0, '', 1277, 'N', 'N', 0),
(1281, 'Invoices', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-folder', 0, 0, ' ', 1142, 'Y', 'Y', 0),
(1282, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Invoice', 'add', 'fa fa-plus', 0, 0, '', 1281, 'N', 'Y', 0),
(1283, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Invoice', 'index', 'fa fa-list', 0, 0, '', 1281, 'N', 'Y', 0),
(1284, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Invoice', 'edit', 'fa fa-edit', 0, 0, '', 1281, 'N', 'N', 0),
(1285, 'Invoices Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Invoice', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1286, 'Invoice Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Invoice', 'print_invoice', 'fa fa-print', 0, 0, '', 1281, 'N', 'N', 0),
(1287, 'HSN Code ', 'uri', 0, 'http://192.168.2.50/cnco/', 'HSN', 'index', 'fa fa-circle', 0, 0, '', 1143, 'N', 'Y', 0),
(1288, 'RM Challan Inward', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'rm_gir_index', 'fa fa-circle', 0, 0, '', 1169, 'N', 'Y', 0),
(1289, 'RM GIR Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'raw_add', 'fa fa-circle', 0, 0, '', 1288, 'N', 'N', 0),
(1290, 'RM GIR Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'raw_edit', 'fa fa-circle', 0, 0, '', 1288, 'N', 'N', 0),
(1291, 'Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Suppliers', 'print', 'fa fa-print', 0, 0, '', 1151, 'N', 'N', 0),
(1292, 'Create Issue', 'uri', 0, 'http://192.168.2.50/cnco/', 'Issue_slips', 'CreateIssueSlip', 'fa fa-circle', 0, 0, '', 1176, 'N', 'N', 0),
(1293, 'Print Profile', 'uri', 0, 'http://192.168.2.50/cnco/', 'Service_providers', 'print', 'fa fa-print', 0, 0, '', 1236, 'N', 'N', 0),
(1294, 'Print Profile', 'uri', 0, 'http://192.168.2.50/cnco/', 'Customers', 'print', 'fa fa-print', 0, 0, '', 1277, 'N', 'N', 0),
(1295, 'Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Transporters', 'print', 'fa fa-print', 0, 0, '', 1191, 'N', 'N', 0),
(1296, 'Service Provider Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Service_providers', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1297, 'Customer Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Customers', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1298, 'Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Evaluation_result', 'print_sup', 'fa fa-print', 0, 0, '', 1230, 'N', 'N', 0),
(1299, 'Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'print_gen', 'fa fa-print', 0, 0, '', 1171, 'N', 'N', 0),
(1300, 'Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Purchase_order', 'print', 'fa fa-print', 0, 0, '', 1160, 'N', 'N', 0),
(1301, 'Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Requisition_slips', 'print', 'fa fa-print', 0, 0, '', 1270, 'N', 'N', 0),
(1302, 'Print View', 'uri', 0, 'http://192.168.2.50/cnco/', 'Issue_slips', 'print', 'fa fa-print', 0, 0, '', 1176, 'N', 'N', 0),
(1304, 'Stock Registers', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-book', 0, 0, '', 1142, 'Y', 'Y', 0),
(1305, 'Material Wise', 'uri', 0, 'http://192.168.2.50/cnco/', 'Stock_registers', 'materials', 'fa fa-circle', 0, 0, '', 1304, 'N', 'Y', 0),
(1306, 'Minimum Inventory Level', 'uri', 0, 'http://192.168.2.50/cnco/', 'Raw_material', 'minimum_inventory_levels', 'fa fa-circle', 0, 0, '', 1304, 'N', 'Y', 0),
(1307, 'Approved PO For GIR', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'ApprovedPOlistForGIR', '', 0, 0, '', 1169, 'N', 'N', 0),
(1308, 'Current Stock', 'uri', 0, 'http://192.168.2.50/cnco/', 'Stock_registers', 'current_stocks', 'fa fa-circle', 0, 0, '', 1304, 'N', 'Y', 0),
(1309, 'Create PO', 'uri', 0, 'http://192.168.2.50/cnco/', 'Purchase_order', 'add', 'fa fa-plus', 0, 0, '', 1160, 'N', 'N', 0),
(1310, 'My Stock', 'uri', 0, 'http://192.168.2.50/cnco/', 'Stock_registers', 'myStock', 'fa fa-diamond', 0, 0, '', 0, 'N', 'Y', 0),
(1311, 'Item Wise Stock', 'uri', 0, 'http://192.168.2.50/cnco/', 'Stock_registers', 'item_wise', 'fa fa-circle', 0, 0, '', 1304, 'N', 'N', 0),
(1312, 'PO For RM Challan ', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'ApprovedPOlistForRM_GIR', 'fa fa-circle', 0, 0, '', 1169, 'N', 'N', 0),
(1313, 'PO Approval', 'uri', 0, 'http://192.168.2.50/cnco/', 'Purchase_order', 'approval', 'fa fa-circle', 0, 0, '', 1275, 'N', 'Y', 0),
(1314, 'PDP Module', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-truck', 0, 0, '', 0, 'Y', 'Y', 0),
(1315, 'Production Register', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-archive', 0, 0, '', 1314, 'Y', 'Y', 0),
(1316, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Production_registers', 'add', 'fa fa-plus', 0, 0, '', 1315, 'N', 'Y', 0),
(1317, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Production_registers', 'edit', 'fa fa-edit', 0, 0, '', 1315, 'N', 'N', 0),
(1318, 'Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Production_registers', 'print', 'fa fa-print', 0, 0, '', 1315, 'N', 'N', 0),
(1320, 'FG Stock Ledgers', 'uri', 0, 'http://192.168.2.50/cnco/', 'Stock_registers', 'fg_stock_register', 'fa fa-arrow-right', 0, 0, '', 1322, 'N', 'Y', 0),
(1321, 'FG Current Stock', 'uri', 0, 'http://192.168.2.50/cnco/', 'Stock_registers', 'fg_current_stock', 'fa fa-arrow-right', 0, 0, '', 1322, 'N', 'Y', 0),
(1322, 'FG Stock', 'uri', 0, 'http baci://192.168.2.50/cnco/', '', '', 'fa fa-file', 0, 0, '', 1142, 'Y', 'Y', 0),
(1323, 'Workers', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-users', 0, 0, '', 1421, 'Y', 'Y', 0),
(1324, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Workers', 'edit', 'fa fa-edit', 0, 0, '', 1323, 'N', 'N', 0),
(1325, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Workers', 'add', 'fa fa-plus', 0, 0, '', 1323, 'N', 'Y', 0),
(1326, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Workers', 'index', 'fa fa-list', 0, 0, '', 1323, 'N', 'Y', 0),
(1327, 'Work Allotment Register', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-diamond', 0, 0, '', 1314, 'Y', 'Y', 0),
(1328, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Work_allotments', 'add', 'fa fa-plus', 0, 0, '', 1327, 'N', 'Y', 0),
(1329, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Work_allotments', 'edit', 'fa fa-edit', 0, 0, '', 1327, 'N', 'N', 0),
(1330, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Work_allotments', 'index', 'fa fa-list', 0, 0, '', 1327, 'N', 'Y', 0),
(1331, 'Daily Stack Record', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-random', 0, 0, '', 1314, 'Y', 'Y', 0),
(1332, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_stacking_records', 'add', 'fa fa-plus', 0, 0, '', 1331, 'N', 'Y', 0),
(1333, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_stacking_records', 'index', 'fa fa-list', 0, 0, '', 1331, 'N', 'Y', 0),
(1334, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_stacking_records', 'edit', 'fa fa-edit', 0, 0, '', 1331, 'N', 'N', 0),
(1335, 'Daily Stitching Record', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-cubes', 0, 0, '', 1314, 'Y', 'Y', 0),
(1336, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_stitching_records', 'add', 'fa fa-plus', 0, 0, '', 1335, 'N', 'Y', 0),
(1337, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_stitching_records', 'index', 'fa fa-list', 0, 0, '', 1335, 'N', 'Y', 0),
(1338, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_stitching_records', 'edit', 'fa fa-edit', 0, 0, '', 1335, 'N', 'N', 0),
(1339, 'Production Logsheet', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-file', 0, 0, '', 1314, 'Y', 'Y', 0),
(1341, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Production_logsheets', 'index', 'fa fa-list', 0, 0, '', 1339, 'N', 'Y', 0),
(1342, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Production_logsheets', 'edit', 'fa fa-edit', 0, 0, '', 1339, 'N', 'N', 0),
(1343, 'Process Logsheet (P-06)', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'Pages', 0, 0, '', 1314, 'Y', 'Y', 0),
(1344, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Process_logsheets', 'add', 'fa fa-plus', 0, 0, '', 1343, 'N', 'Y', 0),
(1345, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Process_logsheets', 'edit', 'fa fa-edit', 0, 0, '', 1343, 'N', 'N', 0),
(1346, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Process_logsheets', 'index', 'fa fa-list', 0, 0, '', 1343, 'N', 'Y', 0),
(1347, 'Power Monitoring Register', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', ' ', 0, 0, '', 1314, 'Y', 'Y', 0),
(1348, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Power_monitoring_registers', 'add', 'fa fa-plus', 0, 0, '', 1347, 'N', 'Y', 0),
(1349, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Power_monitoring_registers', 'index', 'fa fa-circle', 0, 0, '', 1347, 'N', 'Y', 0),
(1350, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Power_monitoring_registers', 'edit', 'fa fa-edit', 0, 0, '', 1347, 'N', 'N', 0),
(1351, 'Printing Logsheet', 'uri', 0, 'http://192.168.2.50/cnco/', 'Printing_logsheet', '', 'fa fa-print', 0, 0, '', 1314, 'Y', 'Y', 0),
(1352, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Printing_logsheet', 'add', 'fa fa-plus', 0, 0, '', 1351, 'N', 'Y', 0),
(1353, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Printing_logsheet', 'index', 'fa fa-list', 0, 0, '', 1351, 'N', 'Y', 0),
(1354, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Printing_logsheet', 'edit', 'fa fa-edit', 0, 0, '', 1351, 'N', 'N', 0),
(1355, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Production_registers', 'index', 'fa fa-list', 0, 0, '', 1315, 'N', 'Y', 0),
(1356, 'Daily Tailing Records', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', ' ', 0, 0, '', 1314, 'Y', 'Y', 0),
(1357, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_tailing_records', 'add', 'fa fa-plus', 0, 0, '', 1356, 'N', 'Y', 0),
(1358, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_tailing_records', 'index', 'fa fa-list', 0, 0, '', 1356, 'N', 'Y', 0),
(1359, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_tailing_records', 'edit', 'fa fa-edit', 0, 0, '', 1356, 'N', 'N', 0),
(1360, 'PEA Module', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', ' fa fa-podcast', 0, 0, '', 0, 'Y', 'Y', 0),
(1361, 'Waste Disposal Record', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', ' ', 0, 0, '', 1360, 'Y', 'Y', 0),
(1362, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Waste_material_records', 'add', 'fa fa-plus', 0, 0, '', 1361, 'N', 'Y', 0),
(1363, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Waste_material_records', 'index', 'fa fa-list', 0, 0, '', 1361, 'N', 'Y', 0),
(1364, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Waste_material_records', 'edit', 'fa fa-edit', 0, 0, '', 1361, 'N', 'N', 0),
(1365, 'ENG Module', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', ' fa fa-podcast', 0, 0, '', 0, 'Y', 'Y', 0),
(1366, 'Machinery Equipments', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', ' ', 0, 0, '', 1365, 'Y', 'Y', 0),
(1367, 'Add', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Machinary_equipments', 'add', 'fa fa-plus', 0, 0, '', 1366, 'N', 'Y', 0),
(1368, 'View List', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Machinary_equipments', 'index', 'fa fa-list', 0, 0, '', 1366, 'N', 'Y', 0),
(1369, 'Material Return Record', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-exchange', 0, 0, '', 1142, 'Y', 'Y', 0),
(1371, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Material_return_records', 'add', 'fa fa-plus', 0, 0, '', 1369, 'N', 'Y', 0),
(1372, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Material_return_records', 'index', 'fa fa-list', 0, 0, '', 1369, 'N', 'Y', 0),
(1373, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Material_return_records', 'edit', 'fa fa-pencil', 0, 0, '', 1369, 'N', 'N', 0),
(1374, 'Edit', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Machinary_equipments', 'edit', 'fa fa-edit', 0, 0, '', 1366, 'Y', 'N', 0),
(1375, 'Print', 'uri', 0, 'http://192.168.2.50/cnco/', 'Material_return_records', 'print', 'fa fa-print', 0, 0, '', 1369, 'N', 'N', 0),
(1376, 'Job Order Records', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-file', 0, 0, '', 1365, 'Y', 'Y', 0),
(1377, 'Add ', 'uri', 0, 'http://192.168.2.50/cnco/', 'Job_orders', 'add', 'fa fa-plus', 0, 0, '', 1376, 'N', 'Y', 0),
(1378, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Job_orders', 'index', 'fa fa-list', 0, 0, '', 1376, 'N', 'Y', 0),
(1379, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Job_orders', 'edit', 'fa fa-edit', 0, 0, '', 1376, 'N', 'N', 0),
(1380, 'Area Cleaning Records', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', ' ', 0, 0, '', 1360, 'Y', 'Y', 0),
(1381, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Area_cleaning_records', 'add', 'fa fa-plus', 0, 0, '', 1380, 'N', 'Y', 0),
(1382, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Area_cleaning_records', 'edit', 'fa fa-edit', 0, 0, '', 1380, 'N', 'N', 0),
(1383, 'View List', 'uri', 0, 'https://192.168.2.50/cnco/', 'Area_cleaning_records', 'index', 'fa fa-list', 0, 0, '', 1380, 'N', 'Y', 0),
(1384, 'Preventive Maintenance', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-calendar', 0, 0, '', 1365, 'Y', 'Y', 0),
(1385, 'Add', 'uri', 0, 'http://192.168.2.50/cnco/', 'Preventive_registers', 'add', 'fa fa-plus', 0, 0, '', 1384, 'N', 'Y', 0),
(1386, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Preventive_registers', 'index', 'fa fa-list', 0, 0, '', 1384, 'N', 'Y', 0),
(1387, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Preventive_registers', 'edit', 'fa fa-edit', 0, 0, '', 1384, 'N', 'N', 0),
(1388, 'Notification Master', 'uri', 0, 'http://192.168.2 Roussel', 'Notifications', 'index', 'fa fa-bell', 0, 0, '', 0, 'N', 'Y', 1),
(1390, 'Requisition Slips', 'uri', 0, 'http://192.168.2.50/cnco/', 'Requisition_slips', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1391, 'Preview', 'uri', 0, 'http://192.168.2.50/cnco/', 'Purchase_order', 'preview', 'fa fa-circle', 0, 0, '', 1160, 'N', 'N', 0),
(1392, 'Preview', 'uri', 0, 'http://192.168.2.50/cnco/', 'Invoice', 'preview', 'fa fa-circle', 0, 0, ' ', 1281, 'N', 'N', 0),
(1393, 'Maintenance History Records', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-file', 0, 0, '', 1365, 'Y', 'Y', 0),
(1395, 'View List', 'uri', 0, 'http://192.168.2.50/cnco/', 'Maintenance_history_records', 'index', 'fa fa-list', 0, 0, '', 1393, 'N', 'Y', 0),
(1396, 'Edit', 'uri', 0, 'http://192.168.2.50/cnco/', 'Maintenance_history_records', 'edit', 'fa fa-edit', 0, 0, '', 1393, 'N', 'N', 0),
(1397, 'Production Reports', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-file-excel-o', 0, 0, '', 1314, 'Y', 'Y', 0),
(1398, 'Daily Stack Report', 'fa', 0, 'http://192.168.2.50/cnco/', 'Daily_stacking_records', 'report', 'fa fa-circle', 0, 0, '', 1397, 'N', 'Y', 0),
(1399, 'report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'report', '', 0, 0, '', 1169, 'Y', 'N', 0),
(1400, 'GIR Register Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Gir_registers', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1401, 'Current Stock Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Stock_registers', 'report', 'fa fa-circle', 0, 0, '', 1166, 'N', 'Y', 0),
(1413, 'Production Register Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Production_registers', 'report', 'fa fa-circle', 0, 0, '', 1397, 'N', 'Y', 0),
(1414, 'Settings', 'uri', 0, 'http://192.168.2.50/cnco/', '', '', 'fa fa-cog', 0, 0, '', 0, 'Y', 'Y', 0),
(1415, 'Daily Stitching Report', 'uri', 0, 'http://192.168.2.50/cnco/', 'Daily_stitching_records', 'reports', 'fa fa-circle', 0, 0, '', 1397, 'N', 'Y', 0),
(1417, 'Lead Module', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-file', 0, 0, '', 0, 'Y', 'Y', 0),
(1418, 'ERP Master', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-podcast', 0, 0, '', 0, 'Y', 'Y', 0),
(1419, 'Add', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Maintenance_history_records', 'add', 'fa fa-plus', 0, 0, '', 1393, 'N', 'Y', 0),
(1420, 'Add', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'Production_logsheets', 'add', 'fa fa-plus', 0, 0, '', 1339, 'N', 'Y', 0),
(1421, 'HR Module', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', '', '', 'fa fa-podcast', 0, 0, '', 0, 'Y', 'Y', 0),
(1422, 'Customer Support', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'CustomerSupport_controller', 'index', 'fa fa-circle', 0, 0, '', 0, 'Y', 'Y', 0),
(1423, 'View List', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'CustomerSupport_controller', 'index', 'fa fa-circle', 0, 0, '', 1422, 'N', 'Y', 0),
(1424, 'Create', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'CustomerSupport_controller', 'add', 'fa fa-circle', 0, 0, '', 1422, 'N', 'N', 0),
(1425, 'addnewitem', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'CustomerSupport_controller', 'add_new_item', 'fa fa-circle', 0, 0, '', 1422, 'N', 'N', 0),
(1426, 'customer followup', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'CustomerSupport_controller', 'followups', 'fa fa-circle', 0, 0, '', 1422, 'N', 'N', 0),
(1427, 'customer followup add', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'CustomerSupport_controller', 'add_followup', '', 0, 0, '', 1422, 'N', 'N', 0),
(1428, 'Customer Tracking', 'uri', 0, 'http://localhost:8080/CIProject/Dream-ERP/', 'CustomerSupport_controller', 'tracking', '', 0, 0, '', 1422, 'N', 'N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(15) NOT NULL,
  `type` varchar(250) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `lead_id` int(6) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datetime` datetime NOT NULL,
  `page_url` varchar(200) NOT NULL,
  `created_by` tinyint(4) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `leave_id`, `lead_id`, `employee_id`, `subject`, `message`, `status`, `datetime`, `page_url`, `created_by`, `created_on`) VALUES
(5, ' leave-apply', 20, 0, 1, 'Apply For Leave ', 'Applied for  new Leave', 0, '2025-03-19 04:36:15', 'Leave/index', 1, '2025-03-19 11:06:15'),
(6, ' leave-apply', 21, 0, 1, 'Apply For Leave ', 'Applied for  new Leave', 0, '2025-03-19 04:37:56', 'Leave/index', 1, '2025-03-19 11:07:56'),
(7, ' leave-apply', 22, 0, 4, 'Apply For Leave ', 'Applied for  new Leave', 0, '2025-03-19 05:21:24', 'Leave/index', 11, '2025-03-19 11:51:24'),
(8, 'leave-action', 22, 0, 11, 'Leave Aprroved', 'Approved Leave', 0, '2025-03-19 05:25:27', 'Leave/index', 11, '2025-03-18 23:55:27'),
(9, 'Requisition Slip', 0, 0, NULL, 'Requisition Approved', ' approved requisition slip of ', 0, '2025-05-31 12:30:01', 'Requisition_slips/index', 1, '2025-05-31 07:00:01'),
(10, 'Requisition Slip', 0, 0, NULL, 'Requisition Rejected', ' rejected requisition slip of ', 0, '2025-05-31 12:30:44', 'Requisition_slips/index', 1, '2025-05-31 07:00:44'),
(11, 'Requisition Slip', 0, 0, NULL, 'Requisition Creation', 'created a requisition slip', 0, '2025-06-15 01:08:06', 'Requisition_slips/approval', 4, '2025-06-15 07:38:06'),
(12, 'Requisition Slip', 0, 0, NULL, 'Requisition Approved', ' approved requisition slip of ', 0, '2025-06-15 01:10:40', 'Requisition_slips/index', 4, '2025-06-15 07:40:40'),
(13, 'Issue Slip', 0, 0, NULL, 'Issue Creation', 'created a issue slip for', 0, '2025-06-15 01:13:53', 'Issue_slips/index', 4, '2025-06-15 07:43:53'),
(14, 'Requisition Slip', 0, 0, NULL, 'Requisition Approved', ' approved requisition slip of ', 0, '2025-06-18 11:13:52', 'Requisition_slips/index', 4, '2025-06-18 05:43:52'),
(15, ' leave-apply', 23, 0, 4, 'Apply For Leave ', 'Applied for  new Leave', 0, '2025-06-21 04:58:43', 'Leave/index', 4, '2025-06-21 11:28:43'),
(16, 'leave-action', 23, 0, 4, 'Leave Aprroved', 'Approved Leave', 0, '2025-06-21 05:02:46', 'Leave/index', 4, '2025-06-20 23:32:46'),
(17, ' leave-apply', 24, 0, 1, 'Apply For Leave ', 'Applied for  new Leave', 0, '2025-08-21 12:47:30', 'Leave/index', 1, '2025-08-21 07:17:30'),
(18, 'lead-created', 1, 0, 4, 'Lead Created', 'A new Lead created', 0, '2025-09-16 14:46:58', 'Leads/Index', 1, '2025-09-16 10:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `referral_code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending',
  `payment_status` enum('Pending','Paid','Failed','Refunded') DEFAULT 'Pending',
  `payment_screenshot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_code`, `name`, `address`, `email`, `phone`, `size`, `product_id`, `weight`, `quantity`, `total`, `referral_code`, `created_at`, `status`, `payment_status`, `payment_screenshot`) VALUES
(1, '', 'Prakash Sharma', 'Udaipur', 'prakash@gmail.com', '9664100138', '', 1, '', 1, '620.00', 'NAM016', '2025-10-18 12:07:04', 'Pending', 'Paid', 'uploads/payments/1760789216_Best-Network-Marketing-Tips-from-MLM-Leaders.jpg'),
(2, '', 'Prakash Sharma', 'sdas', 'prakash@muskowl.com', '9664100138', '', 2, '', 1, '800.00', 'NAM016', '2025-10-18 12:11:01', 'Pending', 'Pending', NULL),
(305, '', 'Yash Menariya', '60,nakoda nagar,udaipur', 'yash@gmail.com', '8769900138', '', 2, '', 1, '799.00', 'NAM017', '2025-10-18 16:05:37', 'Pending', 'Paid', 'uploads/payments/1760792932_team.jpg'),
(307, 'S4000117', 'Yash Menariya', 'muskowl udaipur', 'yash@gmail.com', '8769900138', '', 2, '', 1, '799.00', 'S4000103', '2025-10-22 07:33:18', 'Pending', 'Pending', NULL),
(308, 'NAM016', 'Prakash Sharma', 'udaipur', 'prakash@muskowl.com', '9664100138', '', 1, '', 2, '1598.00', '', '2025-10-25 04:38:15', 'Pending', 'Pending', NULL),
(309, 'S4000117', 'Yash Menariya', 'udaipur', 'yash@gmail.com', '8769900138', '', 1, '', 1, '799.00', '', '2025-10-27 05:01:35', 'Pending', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sizes` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `feature_img` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `sizes`, `slug`, `description`, `price`, `feature_img`, `image`) VALUES
(1, 1, 'S4 Smart Classic Black Edition Combo Pack', '', 's4-smart-combo-pack-1-fashion-essentials', '<p>Embrace timeless sophistication with the S4 Smart Classic Black Edition Combo Pack &mdash; crafted for men who value style and confidence. This premium combo features rich black fabrics, a crisp white handkerchief, a classy check muffler, stylish sunglasses, and an invigorating Clensta body spray. Perfect for everyday wear or gifting, this pack brings together fashion and freshness in one smart collection.</p>\r\n\r\n<p><strong>Includes:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>2 Black Fabrics</p>\r\n	</li>\r\n	<li>\r\n	<p>1 White Handkerchief</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Stylish Sunglasses</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Clensta Perfume Spray</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Check Muffler</p>\r\n	</li>\r\n</ul>\r\n', '799.00', '1 (1).jpg', 'Screenshot 2025-10-16 202932.png'),
(2, 1, 'S4 Smart Elegant Style Combo Pack', '', 's4-smart-combo-pack-2-stylish-essentials', '<p>Step into effortless sophistication with the S4 Smart Elegant Style Combo Pack &mdash; designed for the modern man who values class and comfort. This premium set includes elegant white and grey dotted fabrics, a crisp handkerchief, a stylish check muffler, trendy sunglasses, and a refreshing Clensta body spray. Perfect for personal use or gifting, this combo delivers a refined and confident look for any occasion.</p>\r\n\r\n<p><strong>Includes:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>1 White Fabric</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Grey Dotted Fabric</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Stylish Sunglasses</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Clensta Perfume Spray</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Check Muffler</p>\r\n	</li>\r\n	<li>\r\n	<p>1 White Handkerchief</p>\r\n	</li>\r\n</ul>\r\n', '799.00', '1 (2).jpg', 'front-view-woman-with-shopping-bag-concept.jpg'),
(3, 1, 'S4 Smart Elegant Style Combo Pack Black and White', '', 's4-smart-combo-pack-3-economy-essentials', '<p>Step into effortless sophistication with the S4 Smart Elegant Style Combo Pack &mdash; designed for the modern man who values class and comfort. This premium set includes elegant white and grey dotted fabrics, a crisp handkerchief, a stylish check muffler, trendy sunglasses, and a refreshing Clensta body spray. Perfect for personal use or gifting, this combo delivers a refined and confident look for any occasion.</p>\r\n\r\n<p><strong>Includes:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>1 White Fabric</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Black Fabric</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Stylish Sunglasses</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Clensta Perfume Spray</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Check Muffler</p>\r\n	</li>\r\n	<li>\r\n	<p>1 White Handkerchief</p>\r\n	</li>\r\n</ul>\r\n', '799.00', '1 (3).jpg', 'Best-Network-Marketing-Tips-from-MLM-Leaders.jpg'),
(10, 1, 'S4 Smart Elegant Style Combo Pack: Black Grey Printed', '', 's4-smart-elegant-style-combo-pack-black-grey-printed', '<p>Step into effortless sophistication with the S4 Smart Elegant Style Combo Pack &mdash; designed for the modern man who values class and comfort. This premium set includes elegant white and grey dotted fabrics, a crisp handkerchief, a stylish check muffler, trendy sunglasses, and a refreshing Clensta body spray. Perfect for personal use or gifting, this combo delivers a refined and confident look for any occasion.</p>\r\n\r\n<p><strong>Includes:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>1 White Fabric</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Grey Printed Fabric</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Stylish Sunglasses</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Clensta Perfume Spray</p>\r\n	</li>\r\n	<li>\r\n	<p>1 Check Muffler</p>\r\n	</li>\r\n	<li>\r\n	<p>1 White Handkerchief</p>\r\n	</li>\r\n</ul>\r\n', '799.00', '1 (4).jpg', ''),
(13, 1, 'S4 Combo Pack 55', NULL, 's4-combo-pack-55', '<p>So you <strong>must initialize Quill </strong><a href=\"google.com\" target=\"_blank\"><strong>somewhere</strong></a>, either:</p><ol><li><strong>In the page JS</strong> (your current <code>[removed]</code> after the form) — this is the preferred approach, because now you can also attach the <code>submit</code> handler to copy the content.</li><li><strong>Or keep it in the theme JS</strong> but then you have to get the correct Quill instance in your page JS to copy the content — which is trickier.</li></ol><p><br></p>', '799.00', 'AdobeStock_315941933_Preview1.jpeg', ''),
(14, 1, 'yash combo pack', NULL, 'yash-combo-pack', '<h3>✅ Improvements made:</h3><ol><li><strong>Image preview:</strong></li></ol><ul><li class=\"ql-indent-1\"><code>img-thumbnail</code> for nicer border.</li><li class=\"ql-indent-1\">Fixed width <code>80px</code> for uniform display.</li><li class=\"ql-indent-1\">Fallback text if no image exists.</li></ul><p><br></p>', '1799.00', 'WhatsApp_Image_2025-10-18_at_13_28_20_b0dd52d5.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(20) NOT NULL,
  `role` varchar(200) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `auth_id`, `flag`) VALUES
(1, 'Super Admin', 1, 0),
(2, 'Business Operation Head', 2, 0),
(3, 'HR Executive', 3, 0),
(4, 'Team Leader', 4, 0),
(5, 'Employee', 5, 0),
(6, 'HR marketing', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(20) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `flag` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit_name`, `flag`) VALUES
(1, 'kg', 0),
(2, 'meter', 0),
(3, 'MT', 0),
(4, 'Nos.', 0),
(5, 'Ltr', 0),
(6, 'Feet', 0),
(7, 'Bags', 0),
(8, 'Packet', 0),
(9, 'Bottle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `referal_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_code`, `name`, `email`, `phone`, `password`, `referal_code`) VALUES
(1, 'NAM001', 'Kirti', 'demo@gmail.com', '6375699256', '$2y$10$pcA9ecEv1JPm6gu787ZSAuUTX7nlzYPPB6osJGgW7v38kxRh.NjWW', NULL),
(2, 'NAM002', 'sunita', 'sunita@gmail.com', '9876543211', '$2y$10$p9XLMhZrrjrukQ6tHlAQZeaYispPM1cfnwfMYXqxiKb8iZ.yl52dG', NULL),
(3, 'NAM003', 'rakhi', 'kirtijain9347@gmail.com', '6375699256', '$2y$10$OA//inl/ugxfjDMx.7YnFOJudGQpq2tV/aKaAbBK9tPRyW8mqOtju', NULL),
(5, 'NAM005', 'New User', 'new@example.com', '9999999999', 'test123', NULL),
(6, 'NAM006', 'vinita', 'vinita@gmail.com', '9999999999', '$2y$10$AoLwC4qgph.liTbqJlrk0uSxMBJuXVB6RCpSX3Cevz4j0CJA2qzCW', NULL),
(7, 'NAM007', 'sarika', 'sarika@gmail.com', '6375699256', '$2y$10$HbRrsJZtft/E3Jmyy1DQHeWcTUAvB1a4uDn5N9wWaAUwU.3TUIIPO', NULL),
(8, 'NAM008', 'Kirti', 'kirtijain63@gmail.com', '6375699256', '$2y$10$st9aMDyXnPcOouA/Z4CidupRuxgzuHE.yC6YUD/Ox7bYyCWNXbCF6', NULL),
(9, 'NAM009', 'Kirti', 'bhavneshwari@gmail.com', '6375699256', '$2y$10$hgldgaPcRY4S36tF82Etgel4di7lZNMJnDEmox5FKhvMHi3kg1jvW', NULL),
(10, 'NAM010', 'Kirti12', 'Kirti12@gmail.com', '9664289081', '$2y$10$qDn1fUjJIW4A2Uqiu95djuWoDBod1LdEMB1UxZUcTVJYAjGIQBjBK', NULL),
(11, 'NAM011', 'Kirti', 'kirtijainn@gmail.com', '6375699256', '$2y$10$UzYsjV/DkhiqFpWb716/Muq30YxqUDJNHFKBwDY8dm/8pJb0esTKe', NULL),
(12, 'NAM012', 'Kirti', 'kirtijain@gmail.com', '6375699256', '$2y$10$VXt/RaWcU0RAmuDa5/JJ.eS9TQGN2dQS6CW3HhmVLkD1tZSwldg02', NULL),
(13, 'NAM013', 'nik', 'nik@gmail.com', '6375699256', '$2y$10$d55FcfJ8MATngwqvcSMD6ukJkcMm4G34SqEYkuAXeeoaDO6r.X3ca', NULL),
(14, 'NAM014', 'vikas', 'vikas@gmail.com', '6378884528', '$2y$10$1sjpHmcutLKHndBOE83qHuV4rF9/hwOuhp2JFuoOXM91GMyK7n1T2', NULL),
(15, 'NAM015', 'kv', 'kv@gmail.com', '9676565453', '$2y$10$2SvplotYaYeNUJOvpaobmuHXtALUuFqchidK5Jh0XFtMljgtJ7IOG', NULL),
(16, 'NAM016', 'Prakash Sharma', 'prakash@muskowl.com', '9664100138', '$2y$10$Pe46EaNduu1R1kEWPyOvyu8zD3hgXjyLdr74TWPfR48CYZA8dpLqi', 'NAM009'),
(17, 'S4000117', 'Yash Menariya', 'yash@gmail.com', '8769900138', '$2y$10$fvK0bWgoDxoeDct/AC/vXu9RX8grZqsXnPk20lzwRNf9CQtMmK7ua', NULL),
(18, 'NAM018', 'asd', 'asd@gmail.com', '9879879879', '$2y$10$AixYRK64cNtbWwl0a1Q//uRwuOz8fba6/HFVgQGNj6qQV3ecyKCb.', NULL),
(22, 'S4000119', 'yash', 'yash12@gmail.com', '6546546546', '$2y$10$bUJae/HPShRd8wdSYDgrYeuVx./6aO0ZRseQF9IF/AAHZLW0Serhi', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_slug` (`slug`),
  ADD UNIQUE KEY `description` (`description`) USING HASH;

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `lead_csv`
--
ALTER TABLE `lead_csv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dyn_group_id - normal` (`dyn_group_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`,`email`,`phone`,`product_id`,`weight`,`quantity`,`total`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lead_csv`
--
ALTER TABLE `lead_csv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1429;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
