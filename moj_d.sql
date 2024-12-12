-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 06:35 AM
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
-- Database: `moj_d`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(5) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor','viewer') NOT NULL DEFAULT 'viewer',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', '12345', 'admin', '2024-09-04 14:47:20', '2024-09-04 14:47:20', NULL),
(2, 'admin@masterofjobs.com', '$2y$10$epD/UJz8HGp0ldQnDJL4veea0Jnmpl3bfnamoAXjpPV8GGix51Abm', 'admin', '2024-09-04 10:02:57', '2024-09-04 10:02:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `pin_code` text DEFAULT NULL,
  `role` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `gst_number` text DEFAULT NULL,
  `gst_name` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `user_id`, `name`, `gender`, `email`, `address`, `state`, `city`, `pin_code`, `role`, `dob`, `gst_number`, `gst_name`, `created_at`, `updated_at`) VALUES
(1, 160, 'Abhiii', 'male', 'abhi@gmail.com', '', 'Rajasthan', 'JAIPUR', '302033', 'Agent', '', '', '', '07-02-2024 10:57 AM', '07-02-2024 10:57 AM'),
(2, 161, 'Shivani Sharma', 'male', 'shivani@sharma.com', 'near hotel', 'Rajasthan', 'PRATAPGHAR', '312614', 'Agent', '2009-02-03', '8998998999', 'HAppy house two', '07-02-2024 11:06 AM', '07-02-2024 11:06 AM'),
(3, 162, 'Surya Chauhan', 'male', 'charlie@gmail.com', '', '', '', '', 'Agent', '2024-07-02', '', '', '07-02-2024 11:11 AM', '07-02-2024 11:11 AM'),
(4, 163, 'Surya Charlie Chauhan', 'male', 'santosh@gmail.com', '', '', '', '', 'Agent', '', '', '', '07-02-2024 11:18 AM', '07-02-2024 11:18 AM'),
(5, 164, 'Vinay Chaudhary', 'male', 'vinay@gmail.com', 'near Happy House', 'Rajasthan', 'JAIPUR', '302033', 'Agent', '2001-11-15', '874cdc45cd', 'Happy House', '07-02-2024 11:38 AM', '07-02-2024 11:38 AM'),
(6, 165, 'Vina Chaudhary', 'male', 'vina@gmail.com', 'near Happy House', 'Rajasthan', 'JAIPUR', '302033', 'Agent', '2001-11-15', '874cdc45cd', 'Happy House', '07-02-2024 11:54 AM', '07-02-2024 11:54 AM'),
(7, 167, 'Subhash Sharma ', 'male', 'subhashsharma@gmail.com', '230 Bus Stand,Barrackpore Trunk Road, Deshpriya Nagar, Belghoria', 'Rajasthan', 'JAIPUR', '302033', 'Agent', '2002-01-02', '8784wxsc8784', 'Happy HOuse', '07-02-2024 02:38 PM', '07-12-2024 03:40 PM'),
(8, 175, 'Karan Sharma', 'male', 'karansharma@gmail.com', '', '', '', '', 'Agent', '', '', '', '07-04-2024 05:43 PM', '07-04-2024 05:43 PM'),
(9, 176, 'Gurjot Singh', 'male', 'GurjotSingh@gmail.com', 'near Patiala House', 'Delhi', 'NEW DELHI', '110001', 'Agent', '2024-07-05', '', 'The Housing Company', '07-05-2024 11:32 AM', '07-05-2024 11:32 AM'),
(10, 179, 'LEHARU LAL Jat', 'male', 'leharulaljat1@gmail.com', 'Gagera Gulabpura ', 'Rajasthan', 'BHILWARA', '311021', 'Agent', '1989-07-10', '', '', '07-06-2024 03:48 PM', '07-06-2024 03:48 PM'),
(11, 183, 'Rohan Gupta', 'male', 'rohangupta@gmail.com', 'Near kishan ghath', 'Delhi', 'NEW DELHI', '110001', 'Agent', '1998-07-12', '7628828nhabh', 'The great company ', '07-12-2024 04:52 PM', '07-12-2024 04:53 PM'),
(12, 185, 'Raj Shekar', 'male', 'Raj@gmail.com', 'Near bypass', 'Delhi', 'NEW DELHI', '110001', 'Agent', '2001-07-15', 'Hehzhzh826383', 'The kings Pvt. Ltd', '07-15-2024 12:52 PM', '07-15-2024 12:54 PM'),
(13, 191, 'Ganesh nepalganj Sharma', 'male', 'Info.ganeshsharma@gmail.com', 'Rajkot', 'Gujarat', 'RAJKOT', '360001', 'Agent', '1987-12-10', '', '', '07-19-2024 03:46 PM', '07-19-2024 03:46 PM'),
(14, 192, 'Ashu Jat', 'male', 'abc@xyz.com', '', '', '', '', 'Agent', '', '', '', '07-20-2024 11:24 AM', '07-20-2024 11:24 AM'),
(15, 195, 'Suryansh Sharma', 'male', 'Sury@gmail.com', '', '', '', '', 'Agent', '', '', '', '07-22-2024 03:19 PM', '07-22-2024 03:19 PM'),
(16, 196, 'suri suir', 'male', 'Suri@gmail.com', '', '', '', '', 'Agent', '2024-07-22', '', '', '07-22-2024 03:39 PM', '07-22-2024 03:39 PM'),
(17, 199, 'Aman Gupta', 'male', 'aman@gmail.com', '', '', '', '', 'Agent', '1998-08-06', '', '', '08-06-2024 02:47 PM', '08-06-2024 02:47 PM');

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE `api_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoteliers`
--

CREATE TABLE `hoteliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gst_number` text DEFAULT NULL,
  `gst_name` text DEFAULT NULL,
  `reg_email` text DEFAULT NULL,
  `reg_hadd` text DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hoteliers`
--

INSERT INTO `hoteliers` (`id`, `user_id`, `name`, `location`, `email`, `address`, `state`, `pin_code`, `city`, `role`, `country`, `gst_number`, `gst_name`, `reg_email`, `reg_hadd`, `created_at`, `updated_at`) VALUES
(1, 104, 'The Odin', '', 'akshay96102@gmail.com', '', '', '', '', 'Employers', 'India', '', '', '', '', '06-21-2024 11:31 AM', '06-21-2024 11:31 AM'),
(3, 112, 'The fly king', '', 'akshaypareek.work@gmail.com', 'Jiwan Vihar Colony', 'Rajasthan', '341512', 'NAGAUR', 'Employers', 'India', '', '', '', '', '06-21-2024 03:16 PM', '06-21-2024 03:16 PM'),
(4, 113, 'The Odin', '', 'akshay96102@gmail.com', '', 'Rajasthan', '302026', 'JAIPUR', 'Employers', 'India', '', '', '', '', '06-21-2024 03:27 PM', '06-21-2024 03:27 PM'),
(5, 116, 'highway ', '', '2020pgiadabhishek02@gmail.com', 'near Paranthe vali gali', 'Delhi', '110001', 'NEW DELHI', 'Employers', 'India', '', '', '', '', '06-24-2024 12:18 PM', '07-04-2024 05:10 PM'),
(6, 119, 'The king palace Jaipur ', '', 'akshay96102@gmail.com', '', 'Rajasthan', '302026', 'JAIPUR', 'Employers', 'India', '', '', '', '', '06-24-2024 04:10 PM', '06-24-2024 04:10 PM'),
(7, 128, 'Mitron', 'malviya nagar', 'mitron.enquiry@gmail.com', 'malviya nagar', 'Rajasthan', '302033', 'JAIPUR', 'Employers', 'India', '', '', '', '', '06-26-2024 02:37 PM', '06-26-2024 02:37 PM'),
(8, 131, 'Hotel Taj', 'mumbai', 'hoteltaj@gmail.com', 'near bandra', 'Maharashtra', '400001', 'MUMBAI', 'Employers', 'India', '', '', '', '', '06-27-2024 11:22 AM', '06-27-2024 11:22 AM'),
(9, 152, 'Test', 'Hzjzbz', 'Hdhd@gmail.com', 'Test', 'Uttarakhand', '3611122', 'DEHRADUN', 'Employers', 'India', 'YehdbN', 'Hshshxvo', 'Yehxb@gmail.com', 'Test', '07-01-2024 10:04 AM', '07-01-2024 10:04 AM'),
(10, 158, 'Raj NIvas', '', 'rajnivas@gmail.com', 'A', 'Rajasthan', '302033', 'JAIPUR', 'Employers', 'India', '', '', '', '', '07-02-2024 10:44 AM', '07-02-2024 10:44 AM'),
(11, 190, 'Hotel pallav', 'Rajkot', 'hotelpallavrajkot@gmail.com', 'Opp sent Mery school ', 'Gujarat', '360001', 'RAJKOT', 'Employers', 'India', '24AABPF6331N1ZU', 'Hotel pallav', 'hotelpallavrajkot@gmail.com', 'Rajkot', '07-19-2024 03:38 PM', '07-19-2024 03:38 PM'),
(12, 194, 'Hotel Shivansh', 'Jamnagar', 'rajesh.kalolia@gmail.com', '304', 'Gujarat', '361001', 'JAMNAGAR', 'Employers', 'India', '', '', '', '', '07-21-2024 09:22 PM', '07-21-2024 09:22 PM'),
(13, 200, 'Hotel king', '216 suriya nagar ', 'hotelking@gmail.com', '', 'Rajasthan', '302026', 'JAIPUR', 'Employers', 'India', '', '', '', '', '08-06-2024 02:48 PM', '08-06-2024 02:48 PM'),
(14, 201, 'The ODin', 'Jaipurx', 'admin@admin1.com', 'SURBHI ESTATE, PLOT NO. A-2/6/105, ROAD NO.6 , SACHIN GIDC SURAT	', 'Rajasthan', '302026', 'JAIPUR', 'Employers', 'India', '', '', '', '', '08-06-2024 02:53 PM', '08-06-2024 02:53 PM'),
(15, 202, 'The Hotel Knight ', 'Jaipur', 'HotelKing22@gmail.com', '230 suriya nagar ', 'Rajasthan', '302026', 'JAIPUR', 'Employers', 'India', 'GFLPOTRTHNB', 'HOTEL KNIGHT ', 'king@gmail.com', '230 suriya nagar', '08-06-2024 03:12 PM', '08-06-2024 03:24 PM'),
(16, 214, 'Checj hotel', 'Jaipur', 'Ronakvaya@gmail.com', '', 'Rajasthan', '302018', 'JAIPUR', 'Employers', 'India', '', '', '', '', '09-05-2024 11:21 AM', '09-05-2024 11:21 AM'),
(17, 217, 'Hotel Allen', '', 'abhishekanjana85@gmail.com', 'near pratapnagar', 'Rajasthan', '302033', 'JAIPUR', 'Employers', 'India', '', '', '', '', '09-05-2024 02:32 PM', '09-05-2024 02:32 PM');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(5) UNSIGNED NOT NULL,
  `hotelier_id` int(5) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `skill_requirements` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `experience_requirements` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `resume_id` text NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `user_id`, `resume_id`, `status`, `created_at`, `updated_at`) VALUES
(32, 30, 132, 'null', 'In Touch', '2024-06-27 12:35:28', '2024-06-27 12:35:28'),
(33, 31, 133, '27', 'In Touch', '2024-06-27 15:16:43', '2024-06-27 15:16:43'),
(34, 30, 133, '27', 'Selected', '2024-06-27 15:17:09', '2024-06-27 15:17:09'),
(35, 31, 145, '32', 'In Touch', '2024-07-02 14:50:37', '2024-07-02 14:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `job_listings`
--

CREATE TABLE `job_listings` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotelier_id` int(10) UNSIGNED NOT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `start_time` text DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `job_title` text DEFAULT NULL,
  `job_description` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `sub_department` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `off_salery` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `number_employees` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_listings`
--

INSERT INTO `job_listings` (`id`, `hotelier_id`, `job_type`, `start_time`, `end_time`, `job_title`, `job_description`, `department`, `sub_department`, `education`, `off_salery`, `experience`, `number_employees`, `created_at`, `updated_at`, `status`) VALUES
(30, 116, 'Full Time', '', '', 'need a cook', 'need a cook', 'Kitchen', 'juice maker', '12th', '5,000 - 10,000', 'fresher', '10', '2024-06-25 15:37:17', '2024-06-25 15:37:17', '1'),
(31, 116, 'Full Time', '', '', 'Hotel Manager', 'need a night manager', 'Kitchen,Front Office', 'juice maker, CDP All Rounder, Ganral Manager, Front Office Manager, Receptionist', '12th', '20,000 - 30,000', 'fresher', '10', '2024-06-25 16:11:57', '2024-06-25 16:11:57', '1'),
(32, 116, 'Full Time', '', '', '', 'need a south indian cook', 'Kitchen', 'South indian Chef', '12th', '20,000 - 30,000', 'experienced', '5', '2024-06-25 16:30:04', '2024-06-25 16:30:04', '1'),
(33, 128, 'Full Time', '', '', '', 'need a manager', 'Kitchen,Front Office,Bar/Restaurant,Spa/Health club', 'juice maker, Ganral Manager, Bar Manager, Cashier, Masseuse', '12th', '20,000 - 30,000', 'fresher', '5', '2024-06-26 14:40:38', '2024-06-26 14:40:38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `job_pref`
--

CREATE TABLE `job_pref` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` varchar(255) NOT NULL,
  `sub_department` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_pref`
--

INSERT INTO `job_pref` (`id`, `department`, `sub_department`, `created_at`, `updated_at`) VALUES
(1, 'Kitchen', 'juice maker', '2024-05-04 20:06:23', '2024-05-04 20:20:45'),
(2, 'Front Office', 'Ganral Manager', '2024-05-07 09:47:25', '2024-05-07 09:47:25'),
(3, 'Front Office', 'Front Office Manager', '2024-05-07 09:47:25', '2024-05-07 09:47:25'),
(4, 'Front Office', 'Receptionist', '2024-05-07 09:47:25', '2024-05-07 09:47:25'),
(5, 'Front Office', 'Front Office Supervisor', '2024-05-07 09:47:25', '2024-05-07 09:47:25'),
(6, 'Front Office', 'Front Office Executive', '2024-05-07 09:47:25', '2024-05-07 09:47:25'),
(7, 'Front Office', 'Front Office Assistant', '2024-05-07 09:47:25', '2024-05-07 09:47:25'),
(8, 'Kitchen', 'CDP All Rounder', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(9, 'Kitchen', 'Indian Cook(punjabi)', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(10, 'Kitchen', 'Chinese Chef', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(11, 'Kitchen', 'Tandoor Chef', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(12, 'Kitchen', 'South indian Chef', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(13, 'Kitchen', 'Continental', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(14, 'Bar/Restaurant', 'Bar Manager', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(15, 'Bar/Restaurant', 'Restaurant Manager', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(16, 'Bar/Restaurant', 'Cashier', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(17, 'Bar/Restaurant', 'Captain(Bar)', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(18, 'Bar/Restaurant', 'Captain(restaurant)', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(19, 'Bar/Restaurant', 'Waiter(Bar)', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(20, 'Bar/Restaurant', 'Cleaner', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(21, 'Spa/Health club', 'Gym Instructor', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(22, 'Spa/Health club', 'Looker Room Attendants', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(23, 'Spa/Health club', 'Masseuse', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(24, 'Spa/Health club', 'Spa Massager(boy)', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(25, 'Spa/Health club', 'Spa Massager(girls)', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(26, 'Spa/Health club', 'Therapist', '2024-05-07 09:40:26', '2024-05-07 09:40:26'),
(27, 'Front Office', 'Ganral Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(28, 'Front Office', 'HR Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(29, 'Front Office', 'House Keeping Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(30, 'Front Office', 'House Keeping Supervisor', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(31, 'Front Office', 'Gym Instructor', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(32, 'Front Office', 'Looker Room Attendants', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(33, 'Front Office', 'CDP All Rounder', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(34, 'Front Office', 'Indian Cook (punjabi)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(35, 'Banquet & food Service', 'Finance Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(36, 'Banquet & food Service', 'Operation Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(37, 'Banquet & food Service', 'Room boy (room cleaner)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(38, 'Banquet & food Service', 'Commen Area Clener', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(39, 'Banquet & food Service', 'Masseuse', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(40, 'Banquet & food Service', 'Spa Massager (boy)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(41, 'Banquet & food Service', 'Banquet Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(42, 'Banquet & food Service', 'Banquet Sales Executive', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(43, 'Kitchen', 'Sales Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(44, 'Kitchen', 'Outlet Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(45, 'Kitchen', 'House Keeping Trainee', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(46, 'Kitchen', 'Room Service attandent', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(47, 'Kitchen', 'Spa Massager (girls)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(48, 'Kitchen', 'Therapist', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(49, 'Kitchen', 'Chinese Chef', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(50, 'Kitchen', 'Tandoor Chef', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(51, 'Housekeeping', 'Purchase Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(52, 'Housekeeping', 'Beverage Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(53, 'Housekeeping', 'Supervisor', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(54, 'Housekeeping', 'Service Staff (Boy)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(55, 'Housekeeping', 'Service staff (Girls)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(56, 'Purchase/Store', 'Floor Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(57, 'Purchase/Store', 'Food and Safety Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(58, 'Purchase/Store', 'Service staff (Girls)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(59, 'Purchase/Store', 'Farsan Chef', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(60, 'Management', 'Accountant', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(61, 'Management', 'Store Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(62, 'Management', 'Kitchen trainee', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(63, 'Management', 'Kitchen Helper', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(64, 'Bar/Restaurant', 'Bar Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(65, 'Bar/Restaurant', 'Restaurant Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(66, 'Bar/Restaurant', 'Captain (restaurant)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(67, 'Bar/Restaurant', 'Waiter (Bar)', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(68, 'Bar/Restaurant', 'Cleaner', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(69, 'Bar/Restaurant', 'Delivery Bike Rider', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(70, 'Banquet & food Service', 'Banquet Supervisor', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(71, 'Banquet & food Service', 'Cashier', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(72, 'Banquet & food Service', 'Event Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(73, 'Banquet & food Service', 'F & B Manager', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(74, 'Banquet & food Service', 'Order Taker', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(75, 'Banquet & food Service', 'Food Runner', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(76, 'Kitchen', 'South indian Chef', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(77, 'Kitchen', 'Continental', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(78, 'Kitchen', 'Chef De Cuisine', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(79, 'Kitchen', 'Chef de party', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(80, 'Kitchen', 'Commi 1st', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(81, 'Kitchen', 'Commi 2nd', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(82, 'Spa/Health club', 'Juice Maker', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(83, 'Spa/Health club', 'Kitchen Porter', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(84, 'Spa/Health club', 'Kitchen Supervisor', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(85, 'Spa/Health club', 'Line Cook', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(86, 'Spa/Health club', 'Pantry Chef', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(87, 'Spa/Health club', 'Pastry Chef', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(88, 'Catering/Event', 'Indian Cook', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(89, 'Catering/Event', 'Chinese Cook', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(90, 'Catering/Event', 'Gurarati Cook', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(91, 'Catering/Event', 'Sweet Maker', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(92, 'Catering/Event', 'Tandoor Cook', '2024-06-29 05:58:53', '2024-06-29 05:58:53'),
(93, 'Catering/Event', 'P R O (Girls)', '2024-06-29 05:58:53', '2024-06-29 05:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `job_pref_user`
--

CREATE TABLE `job_pref_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `sub_dep` varchar(255) DEFAULT NULL,
  `pref_state` varchar(255) DEFAULT NULL,
  `pref_city` varchar(255) DEFAULT NULL,
  `salery` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_pref_user`
--

INSERT INTO `job_pref_user` (`id`, `user_id`, `job_type`, `department`, `sub_dep`, `pref_state`, `pref_city`, `salery`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(57, 130, 'Part Time', 'Front Office,Bar/Restaurant,Kitchen', 'Ganral Manager, Front Office Manager, Bar Manager, Restaurant Manager, CDP All Rounder', 'Gujarat', 'RAJKOT', '30,000 - 50,000', '07:00', '12:00', '2024-06-26 21:21:48', '2024-06-26 21:21:48'),
(58, 133, 'Full Time', 'Kitchen', 'juice maker', 'Delhi', 'NEW DELHI', '5,000 - 10,000', '', '', '2024-06-27 11:48:06', '2024-07-01 10:49:17'),
(59, 132, 'Part Time', 'Kitchen', 'Indian Cook(punjabi)', 'Rajasthan', 'NAGAUR', '20,000 - 30,000', '23:38', '17:38', '2024-06-27 12:39:02', '2024-06-27 12:39:02'),
(61, 142, 'Full Time', 'Bar/Restaurant', 'Bar Manager', 'Rajasthan', 'JAIPUR', '50,000 - 70,000', '', '', '2024-06-28 21:48:17', '2024-06-28 21:48:17'),
(62, 143, 'Full Time', 'Kitchen', 'Indian Cook(punjabi)', 'Uttar Pradesh', 'ETAWAH', '30,000 - 50,000', '', '', '2024-06-29 10:28:49', '2024-06-29 10:28:49'),
(64, 145, 'Full Time', 'Front Office,Bar/Restaurant', 'Receptionist, Captain(Bar)', 'Rajasthan', 'JAIPUR', '10,000 - 30,000', '', '', '2024-06-29 10:50:32', '2024-06-29 10:50:32'),
(65, 146, 'Full Time', 'Management', 'Outlet Manager', 'Gujarat', 'RAJKOT', '30,000 - 50,000', '', '', '2024-06-29 14:07:22', '2024-06-29 14:07:22'),
(66, 150, 'Full Time', 'Banquet & food Service', 'F & B Manager', 'Gujarat', 'BHAVNAGAR, RAJKOT, JUNAGADH, AMRELI, JAMNAGAR', '50,000 - 70,000', '', '', '2024-06-30 19:00:50', '2024-06-30 19:28:19'),
(67, 149, 'Full Time', 'Housekeeping', 'Supervisor', 'Jharkhand', 'BOKARO, DHANBAD, DEOGHAR, GIRIDH, RANCHI', '20,000 - 30,000', '', '', '2024-06-30 19:01:33', '2024-06-30 19:01:33'),
(68, 153, 'Full Time', 'Front Office', 'Front Office Executive, Front Office Assistant, Receptionist', 'Delhi', 'NEW DELHI', '10,000 - 30,000', '', '', '2024-07-01 12:12:00', '2024-07-01 12:12:00'),
(69, 165, 'full-time', '', '', '', '', '', '', '', '2024-07-12 10:19:59', '2024-07-12 10:19:59'),
(70, 166, 'full-time', '', '', '', '', '10000-20000', '', '', '2024-07-12 10:21:52', '2024-07-12 10:21:52'),
(71, 167, 'full-time', '', '', '', '', '10000-20000', '', '', '2024-07-12 10:23:21', '2024-07-12 10:23:21'),
(72, 168, 'full-time', '', '', '', '', '10000-20000', '', '', '2024-07-12 10:25:13', '2024-07-12 10:25:13'),
(73, 169, 'full-time', '', '', '', '', '', '', '', '2024-07-12 10:28:23', '2024-09-04 16:22:30'),
(76, 121, 'full-time', '', '', '', '', '', '', '', '2024-09-05 16:23:54', '2024-09-05 16:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `job_view`
--

CREATE TABLE `job_view` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_view`
--

INSERT INTO `job_view` (`id`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 74, 6, 2024, 2024),
(2, 74, 6, 2024, 2024),
(3, 74, 6, 2024, 2024),
(4, 74, 6, 2024, 2024),
(5, 82, 7, 2024, 2024),
(6, 82, 7, 2024, 2024),
(7, 82, 7, 2024, 2024),
(8, 82, 7, 2024, 2024),
(9, 82, 7, 2024, 2024),
(10, 82, 7, 2024, 2024),
(11, 82, 7, 2024, 2024),
(12, 82, 7, 2024, 2024),
(13, 82, 11, 2024, 2024),
(14, 82, 11, 2024, 2024),
(15, 82, 11, 2024, 2024),
(16, 82, 11, 2024, 2024),
(17, 82, 11, 2024, 2024),
(18, 82, 11, 2024, 2024),
(19, 82, 11, 2024, 2024),
(20, 82, 11, 2024, 2024),
(21, 82, 11, 2024, 2024),
(22, 82, 11, 2024, 2024),
(23, 82, 11, 2024, 2024),
(24, 82, 11, 2024, 2024),
(25, 82, 11, 2024, 2024),
(26, 82, 11, 2024, 2024),
(27, 82, 11, 2024, 2024),
(28, 82, 11, 2024, 2024),
(29, 82, 7, 2024, 2024),
(30, 82, 7, 2024, 2024),
(31, 82, 7, 2024, 2024),
(32, 82, 7, 2024, 2024),
(33, 82, 11, 2024, 2024),
(34, 82, 11, 2024, 2024),
(35, 82, 11, 2024, 2024),
(36, 82, 11, 2024, 2024),
(37, 82, 11, 2024, 2024),
(38, 82, 11, 2024, 2024),
(39, 82, 11, 2024, 2024),
(40, 82, 11, 2024, 2024),
(41, 82, 11, 2024, 2024),
(42, 82, 11, 2024, 2024),
(43, 82, 11, 2024, 2024),
(44, 82, 11, 2024, 2024),
(45, 82, 11, 2024, 2024),
(46, 82, 11, 2024, 2024),
(47, 82, 11, 2024, 2024),
(48, 82, 11, 2024, 2024),
(49, 82, 11, 2024, 2024),
(50, 82, 11, 2024, 2024),
(51, 82, 11, 2024, 2024),
(52, 82, 11, 2024, 2024),
(53, 82, 11, 2024, 2024),
(54, 82, 11, 2024, 2024),
(55, 82, 11, 2024, 2024),
(56, 82, 11, 2024, 2024),
(57, 82, 10, 2024, 2024),
(58, 82, 10, 2024, 2024),
(59, 82, 10, 2024, 2024),
(60, 82, 10, 2024, 2024),
(61, 82, 6, 2024, 2024),
(62, 82, 6, 2024, 2024),
(63, 82, 6, 2024, 2024),
(64, 82, 6, 2024, 2024),
(65, 82, 11, 2024, 2024),
(66, 82, 11, 2024, 2024),
(67, 82, 11, 2024, 2024),
(68, 82, 11, 2024, 2024),
(69, 82, 11, 2024, 2024),
(70, 82, 11, 2024, 2024),
(71, 82, 11, 2024, 2024),
(72, 82, 11, 2024, 2024),
(73, 82, 11, 2024, 2024),
(74, 82, 11, 2024, 2024),
(75, 82, 11, 2024, 2024),
(76, 82, 11, 2024, 2024),
(77, 82, 11, 2024, 2024),
(78, 82, 11, 2024, 2024),
(79, 82, 11, 2024, 2024),
(80, 82, 11, 2024, 2024),
(81, 82, 11, 2024, 2024),
(82, 82, 11, 2024, 2024),
(83, 82, 11, 2024, 2024),
(84, 82, 11, 2024, 2024),
(85, 82, 11, 2024, 2024),
(86, 82, 11, 2024, 2024),
(87, 82, 11, 2024, 2024),
(88, 82, 11, 2024, 2024),
(89, 82, 11, 2024, 2024),
(90, 82, 11, 2024, 2024),
(91, 82, 11, 2024, 2024),
(92, 82, 11, 2024, 2024),
(93, 82, 11, 2024, 2024),
(94, 82, 11, 2024, 2024),
(95, 82, 11, 2024, 2024),
(96, 82, 11, 2024, 2024),
(97, 82, 11, 2024, 2024),
(98, 82, 11, 2024, 2024),
(99, 82, 11, 2024, 2024),
(100, 82, 11, 2024, 2024),
(101, 82, 6, 2024, 2024),
(102, 82, 6, 2024, 2024),
(103, 82, 6, 2024, 2024),
(104, 82, 6, 2024, 2024),
(105, 82, 11, 2024, 2024),
(106, 82, 11, 2024, 2024),
(107, 82, 11, 2024, 2024),
(108, 82, 11, 2024, 2024),
(109, 82, 11, 2024, 2024),
(110, 82, 11, 2024, 2024),
(111, 82, 11, 2024, 2024),
(112, 82, 11, 2024, 2024),
(113, 82, 11, 2024, 2024),
(114, 82, 11, 2024, 2024),
(115, 82, 11, 2024, 2024),
(116, 82, 11, 2024, 2024),
(117, 82, 11, 2024, 2024),
(118, 82, 11, 2024, 2024),
(119, 82, 11, 2024, 2024),
(120, 82, 11, 2024, 2024),
(121, 82, 11, 2024, 2024),
(122, 82, 11, 2024, 2024),
(123, 82, 11, 2024, 2024),
(124, 82, 11, 2024, 2024),
(125, 82, 11, 2024, 2024),
(126, 82, 11, 2024, 2024),
(127, 82, 11, 2024, 2024),
(128, 82, 11, 2024, 2024),
(129, 82, 11, 2024, 2024),
(130, 82, 11, 2024, 2024),
(131, 82, 11, 2024, 2024),
(132, 82, 11, 2024, 2024),
(133, 82, 11, 2024, 2024),
(134, 82, 11, 2024, 2024),
(135, 82, 8, 2024, 2024),
(136, 82, 8, 2024, 2024),
(137, 82, 8, 2024, 2024),
(138, 82, 8, 2024, 2024),
(139, 82, 11, 2024, 2024),
(140, 82, 11, 2024, 2024),
(141, 82, 11, 2024, 2024),
(142, 82, 11, 2024, 2024),
(143, 82, 11, 2024, 2024),
(144, 82, 11, 2024, 2024),
(145, 82, 11, 2024, 2024),
(146, 82, 11, 2024, 2024),
(147, 82, 11, 2024, 2024),
(148, 82, 11, 2024, 2024),
(149, 82, 11, 2024, 2024),
(150, 82, 11, 2024, 2024),
(151, 82, 11, 2024, 2024),
(152, 82, 11, 2024, 2024),
(153, 82, 11, 2024, 2024),
(154, 82, 11, 2024, 2024),
(155, 82, 11, 2024, 2024),
(156, 82, 11, 2024, 2024),
(157, 82, 11, 2024, 2024),
(158, 82, 11, 2024, 2024),
(159, 82, 11, 2024, 2024),
(160, 82, 11, 2024, 2024),
(161, 82, 11, 2024, 2024),
(162, 82, 11, 2024, 2024),
(163, 82, 13, 2024, 2024),
(164, 82, 13, 2024, 2024),
(165, 82, 13, 2024, 2024),
(166, 82, 13, 2024, 2024),
(167, 82, 13, 2024, 2024),
(168, 82, 13, 2024, 2024),
(169, 82, 13, 2024, 2024),
(170, 82, 13, 2024, 2024),
(171, 82, 11, 2024, 2024),
(172, 82, 11, 2024, 2024),
(173, 82, 11, 2024, 2024),
(174, 82, 11, 2024, 2024),
(175, 82, 12, 2024, 2024),
(176, 82, 12, 2024, 2024),
(177, 82, 12, 2024, 2024),
(178, 82, 12, 2024, 2024),
(179, 85, 5, 2024, 2024),
(180, 85, 5, 2024, 2024),
(181, 85, 6, 2024, 2024),
(182, 85, 6, 2024, 2024),
(183, 85, 5, 2024, 2024),
(184, 85, 5, 2024, 2024),
(185, 58, 5, 2024, 2024),
(186, 85, 6, 2024, 2024),
(187, 85, 10, 2024, 2024),
(188, 85, 10, 2024, 2024),
(189, 82, 6, 2024, 2024),
(190, 82, 6, 2024, 2024),
(191, 82, 6, 2024, 2024),
(192, 82, 6, 2024, 2024),
(193, 82, 6, 2024, 2024),
(194, 82, 6, 2024, 2024),
(195, 80, 8, 2024, 2024),
(196, 80, 8, 2024, 2024),
(197, 80, 8, 2024, 2024),
(198, 80, 8, 2024, 2024),
(199, 80, 8, 2024, 2024),
(200, 80, 8, 2024, 2024),
(201, 80, 8, 2024, 2024),
(202, 80, 8, 2024, 2024),
(203, 80, 8, 2024, 2024),
(204, 80, 8, 2024, 2024),
(205, 80, 8, 2024, 2024),
(206, 80, 8, 2024, 2024),
(207, 80, 8, 2024, 2024),
(208, 80, 8, 2024, 2024),
(209, 82, 14, 2024, 2024),
(210, 82, 14, 2024, 2024),
(211, 82, 14, 2024, 2024),
(212, 82, 14, 2024, 2024),
(213, 88, 14, 2024, 2024),
(214, 82, 14, 2024, 2024),
(215, 82, 14, 2024, 2024),
(216, 82, 14, 2024, 2024),
(217, 82, 14, 2024, 2024),
(218, 82, 14, 2024, 2024),
(219, 82, 14, 2024, 2024),
(220, 82, 13, 2024, 2024),
(221, 82, 13, 2024, 2024),
(222, 82, 13, 2024, 2024),
(223, 82, 13, 2024, 2024),
(224, 82, 13, 2024, 2024),
(225, 82, 13, 2024, 2024),
(226, 82, 13, 2024, 2024),
(227, 82, 13, 2024, 2024),
(228, 82, 13, 2024, 2024),
(229, 82, 13, 2024, 2024),
(230, 82, 13, 2024, 2024),
(231, 82, 13, 2024, 2024),
(232, 82, 13, 2024, 2024),
(233, 82, 13, 2024, 2024),
(234, 82, 13, 2024, 2024),
(235, 82, 13, 2024, 2024),
(236, 82, 13, 2024, 2024),
(237, 82, 13, 2024, 2024),
(238, 82, 13, 2024, 2024),
(239, 82, 13, 2024, 2024),
(240, 82, 13, 2024, 2024),
(241, 82, 13, 2024, 2024),
(242, 82, 13, 2024, 2024),
(243, 82, 13, 2024, 2024),
(244, 82, 13, 2024, 2024),
(245, 82, 13, 2024, 2024),
(246, 82, 13, 2024, 2024),
(247, 82, 13, 2024, 2024),
(248, 94, 13, 2024, 2024),
(249, 94, 13, 2024, 2024),
(250, 94, 12, 2024, 2024),
(251, 94, 12, 2024, 2024),
(252, 94, 12, 2024, 2024),
(253, 94, 12, 2024, 2024),
(254, 94, 11, 2024, 2024),
(255, 94, 11, 2024, 2024),
(256, 94, 11, 2024, 2024),
(257, 94, 11, 2024, 2024),
(258, 94, 13, 2024, 2024),
(259, 94, 13, 2024, 2024),
(260, 94, 13, 2024, 2024),
(261, 94, 13, 2024, 2024),
(262, 94, 13, 2024, 2024),
(263, 94, 13, 2024, 2024),
(264, 94, 13, 2024, 2024),
(265, 94, 13, 2024, 2024),
(266, 94, 13, 2024, 2024),
(267, 94, 13, 2024, 2024),
(268, 94, 8, 2024, 2024),
(269, 94, 8, 2024, 2024),
(270, 94, 8, 2024, 2024),
(271, 94, 8, 2024, 2024),
(272, 94, 6, 2024, 2024),
(273, 94, 6, 2024, 2024),
(274, 94, 6, 2024, 2024),
(275, 94, 6, 2024, 2024),
(276, 94, 11, 2024, 2024),
(277, 94, 11, 2024, 2024),
(278, 94, 11, 2024, 2024),
(279, 94, 11, 2024, 2024),
(280, 94, 5, 2024, 2024),
(281, 94, 5, 2024, 2024),
(282, 94, 5, 2024, 2024),
(283, 94, 5, 2024, 2024),
(284, 94, 13, 2024, 2024),
(285, 94, 13, 2024, 2024),
(286, 94, 13, 2024, 2024),
(287, 94, 13, 2024, 2024),
(288, 94, 12, 2024, 2024),
(289, 94, 12, 2024, 2024),
(290, 94, 12, 2024, 2024),
(291, 94, 12, 2024, 2024),
(292, 94, 12, 2024, 2024),
(293, 94, 12, 2024, 2024),
(294, 94, 14, 2024, 2024),
(295, 94, 14, 2024, 2024),
(296, 94, 14, 2024, 2024),
(297, 94, 14, 2024, 2024),
(298, 82, 8, 2024, 2024),
(299, 82, 8, 2024, 2024),
(300, 82, 8, 2024, 2024),
(301, 82, 8, 2024, 2024),
(302, 80, 8, 2024, 2024),
(303, 80, 8, 2024, 2024),
(304, 80, 8, 2024, 2024),
(305, 80, 8, 2024, 2024),
(306, 80, 6, 2024, 2024),
(307, 80, 6, 2024, 2024),
(308, 80, 6, 2024, 2024),
(309, 80, 6, 2024, 2024),
(310, 80, 8, 2024, 2024),
(311, 80, 8, 2024, 2024),
(312, 80, 8, 2024, 2024),
(313, 80, 8, 2024, 2024),
(314, 80, 8, 2024, 2024),
(315, 80, 8, 2024, 2024),
(316, 80, 8, 2024, 2024),
(317, 80, 8, 2024, 2024),
(318, 82, 8, 2024, 2024),
(319, 82, 8, 2024, 2024),
(320, 82, 8, 2024, 2024),
(321, 82, 8, 2024, 2024),
(322, 80, 8, 2024, 2024),
(323, 80, 8, 2024, 2024),
(324, 80, 8, 2024, 2024),
(325, 80, 8, 2024, 2024),
(326, 82, 15, 2024, 2024),
(327, 82, 15, 2024, 2024),
(328, 82, 15, 2024, 2024),
(329, 82, 15, 2024, 2024),
(330, 80, 15, 2024, 2024),
(331, 80, 15, 2024, 2024),
(332, 80, 15, 2024, 2024),
(333, 80, 15, 2024, 2024),
(334, 96, 15, 2024, 2024),
(335, 96, 15, 2024, 2024),
(336, 97, 5, 2024, 2024),
(337, 97, 11, 2024, 2024),
(338, 97, 11, 2024, 2024),
(339, 100, 12, 2024, 2024),
(340, 100, 12, 2024, 2024),
(341, 100, 8, 2024, 2024),
(342, 100, 8, 2024, 2024),
(343, 100, 16, 2024, 2024),
(344, 100, 16, 2024, 2024),
(345, 100, 16, 2024, 2024),
(346, 100, 16, 2024, 2024),
(347, 100, 16, 2024, 2024),
(348, 100, 16, 2024, 2024),
(349, 82, 21, 2024, 2024),
(350, 82, 21, 2024, 2024),
(351, 106, 21, 2024, 2024),
(352, 106, 21, 2024, 2024),
(353, 106, 21, 2024, 2024),
(354, 106, 21, 2024, 2024),
(355, 107, 19, 2024, 2024),
(356, 107, 19, 2024, 2024),
(357, 107, 19, 2024, 2024),
(358, 107, 19, 2024, 2024),
(359, 107, 20, 2024, 2024),
(360, 107, 20, 2024, 2024),
(361, 106, 19, 2024, 2024),
(362, 106, 19, 2024, 2024),
(363, 115, 20, 2024, 2024),
(364, 115, 20, 2024, 2024),
(365, 115, 20, 2024, 2024),
(366, 115, 20, 2024, 2024),
(367, 106, 21, 2024, 2024),
(368, 106, 21, 2024, 2024),
(369, 106, 21, 2024, 2024),
(370, 106, 21, 2024, 2024),
(371, 115, 23, 2024, 2024),
(372, 115, 23, 2024, 2024),
(373, 115, 23, 2024, 2024),
(374, 115, 23, 2024, 2024),
(375, 115, 23, 2024, 2024),
(376, 115, 23, 2024, 2024),
(377, 115, 23, 2024, 2024),
(378, 115, 23, 2024, 2024),
(379, 115, 20, 2024, 2024),
(380, 115, 20, 2024, 2024),
(381, 115, 20, 2024, 2024),
(382, 115, 20, 2024, 2024),
(383, 106, 26, 2024, 2024),
(384, 106, 26, 2024, 2024),
(385, 106, 26, 2024, 2024),
(386, 106, 19, 2024, 2024),
(387, 106, 19, 2024, 2024),
(388, 115, 23, 2024, 2024),
(389, 115, 23, 2024, 2024),
(390, 115, 23, 2024, 2024),
(391, 115, 23, 2024, 2024),
(392, 121, 23, 2024, 2024),
(393, 121, 23, 2024, 2024),
(394, 115, 27, 2024, 2024),
(395, 115, 27, 2024, 2024),
(396, 115, 27, 2024, 2024),
(397, 115, 27, 2024, 2024),
(398, 115, 30, 2024, 2024),
(399, 115, 30, 2024, 2024),
(400, 115, 30, 2024, 2024),
(401, 115, 30, 2024, 2024),
(402, 115, 30, 2024, 2024),
(403, 115, 30, 2024, 2024),
(404, 115, 30, 2024, 2024),
(405, 115, 30, 2024, 2024),
(406, 115, 30, 2024, 2024),
(407, 115, 30, 2024, 2024),
(408, 115, 30, 2024, 2024),
(409, 115, 30, 2024, 2024),
(410, 115, 31, 2024, 2024),
(411, 115, 31, 2024, 2024),
(412, 115, 31, 2024, 2024),
(413, 115, 31, 2024, 2024),
(414, 115, 32, 2024, 2024),
(415, 115, 32, 2024, 2024),
(416, 115, 32, 2024, 2024),
(417, 115, 32, 2024, 2024),
(418, 115, 32, 2024, 2024),
(419, 115, 32, 2024, 2024),
(420, 115, 32, 2024, 2024),
(421, 115, 32, 2024, 2024),
(422, 126, 31, 2024, 2024),
(423, 127, 31, 2024, 2024),
(424, 127, 31, 2024, 2024),
(425, 127, 31, 2024, 2024),
(426, 114, 33, 2024, 2024),
(427, 114, 33, 2024, 2024),
(428, 114, 33, 2024, 2024),
(429, 115, 32, 2024, 2024),
(430, 115, 32, 2024, 2024),
(431, 115, 32, 2024, 2024),
(432, 115, 32, 2024, 2024),
(433, 132, 30, 2024, 2024),
(434, 132, 30, 2024, 2024),
(435, 133, 31, 2024, 2024),
(436, 133, 31, 2024, 2024),
(437, 133, 31, 2024, 2024),
(438, 133, 31, 2024, 2024),
(439, 133, 31, 2024, 2024),
(440, 133, 31, 2024, 2024),
(441, 133, 31, 2024, 2024),
(442, 133, 31, 2024, 2024),
(443, 133, 31, 2024, 2024),
(444, 133, 31, 2024, 2024),
(445, 133, 31, 2024, 2024),
(446, 133, 31, 2024, 2024),
(447, 133, 30, 2024, 2024),
(448, 133, 30, 2024, 2024),
(449, 133, 30, 2024, 2024),
(450, 133, 30, 2024, 2024),
(451, 133, 30, 2024, 2024),
(452, 133, 30, 2024, 2024),
(453, 133, 30, 2024, 2024),
(454, 133, 30, 2024, 2024),
(455, 144, 33, 2024, 2024),
(456, 147, 33, 2024, 2024),
(457, 147, 30, 2024, 2024),
(458, 147, 30, 2024, 2024),
(459, 81, 33, 2024, 2024),
(460, 81, 30, 2024, 2024),
(461, 81, 30, 2024, 2024),
(462, 149, 31, 2024, 2024),
(463, 145, 31, 2024, 2024),
(464, 170, 30, 2024, 2024),
(465, 170, 30, 2024, 2024),
(466, 173, 33, 2024, 2024),
(467, 173, 30, 2024, 2024),
(468, 173, 30, 2024, 2024),
(469, 173, 30, 2024, 2024),
(470, 173, 30, 2024, 2024),
(471, 133, 31, 2024, 2024),
(472, 133, 31, 2024, 2024),
(473, 133, 31, 2024, 2024),
(474, 133, 31, 2024, 2024),
(475, 133, 31, 2024, 2024),
(476, 133, 31, 2024, 2024),
(477, 133, 31, 2024, 2024),
(478, 133, 31, 2024, 2024),
(479, 133, 30, 2024, 2024),
(480, 133, 30, 2024, 2024),
(481, 133, 30, 2024, 2024),
(482, 133, 30, 2024, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-05-28-072904', 'App\\Database\\Migrations\\CreateJobsTable', 'default', 'App', 1725447526, 1),
(2, '2024-05-29-150148', 'App\\Database\\Migrations\\CreateAdminsTable', 'default', 'App', 1725447526, 1),
(3, '2024-05-30-080603', 'App\\Database\\Migrations\\CreateApiUsersTable', 'default', 'App', 1725447526, 1),
(4, '2024-05-30-124754', 'App\\Database\\Migrations\\CreateDepartmentsTable', 'default', 'App', 1725447526, 1),
(5, '2024-05-30-124828', 'App\\Database\\Migrations\\CreateSubDepartmentsTable', 'default', 'App', 1725447526, 1),
(6, '2024-05-30-124909', 'App\\Database\\Migrations\\CreateDegreesTable', 'default', 'App', 1725447526, 1),
(7, '2024-05-30-124934', 'App\\Database\\Migrations\\CreateCollegesTable', 'default', 'App', 1725447526, 1),
(8, '2024-05-30-125033', 'App\\Database\\Migrations\\CreateSchoolsTable', 'default', 'App', 1725447526, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `Resume` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `Resume`, `created_at`) VALUES
(26, 130, '/uploads/130-resume/1719417174_d44070832aad20a205e0.pdf', '2024-06-26 21:22:54'),
(27, 133, '/uploads/133-resume/1719469815_85b842621476fdf73f46.pdf', '2024-06-27 12:00:15'),
(28, 132, '/uploads/132-resume/1719472170_1be42ff6f37c52b3893c.pdf', '2024-06-27 12:39:30'),
(31, 143, '/uploads/143-resume/1719637069_afe45fdb914cffcc077d.pdf', '2024-06-29 10:27:49'),
(32, 145, '/uploads/145-resume/1719641332_475e761932d52bb538fd.jpg', '2024-06-29 11:38:52'),
(33, 167, '/uploads/1720760001_9e534f2eb8df4ad4081b.docx', '2024-07-12 10:23:21'),
(34, 168, '/uploads/1720760113_b35b7c25044ea228ce8a.docx', '2024-07-12 10:25:13'),
(35, 169, '/uploads/1720760303_f5dea337697a59b6fd18.docx', '2024-07-12 10:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_departments`
--

CREATE TABLE `sub_departments` (
  `id` int(5) UNSIGNED NOT NULL,
  `department_id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `last_active` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `ref_id` int(11) DEFAULT NULL,
  `work_ex` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile_number`, `created_at`, `updated_at`, `last_active`, `points`, `ref_id`, `work_ex`, `status`) VALUES
(104, '6161616161', '2024-06-21 11:31:26', '2024-06-21 11:31:26', '2024-06-21 11:31:26', 0, NULL, 'hotel', 'Enable'),
(112, '2525252525', '2024-06-21 15:16:21', '06-21-2024 04:41 PM', '2024-06-21 15:16:21', 10, NULL, 'hotel', 'Enable'),
(113, '6767676767', '2024-06-21 15:27:14', '2024-06-21 15:27:14', '2024-06-21 15:27:14', 0, NULL, 'hotel', 'Enable'),
(116, '9660233494', '2024-06-24 12:18:50', '2024-06-24 12:18:50', '2024-06-24 12:18:50', 0, 113, 'hotel', 'Enable'),
(119, '7878787878', '2024-06-24 16:10:06', '2024-06-24 16:10:06', '2024-06-24 16:10:06', 0, 113, 'hotel', 'Enable'),
(121, '8290918555', '2024-06-24 17:14:47', '09-05-2024 04:23 PM', '2024-06-24 17:14:47', 101, 113, 'fresher', 'Enable'),
(128, '3030303030', '2024-06-26 14:37:10', '2024-06-26 14:37:10', '2024-06-26 14:37:10', 0, NULL, 'hotel', 'Enable'),
(130, '7863086650', '2024-06-26 21:17:05', '2024-06-26 21:17:05', '2024-06-26 21:17:05', 0, NULL, 'fresher', 'Enable'),
(131, '4141414141', '2024-06-27 11:22:11', '2024-06-27 11:22:11', '2024-06-27 11:22:11', 0, NULL, 'hotel', 'Enable'),
(132, '9876543210', '2024-06-27 11:35:45', '2024-06-27 11:35:45', '2024-06-27 11:35:45', 0, NULL, 'experienced', 'Enable'),
(133, '2222222222', '2024-06-27 11:43:36', '06-27-2024 12:06 PM', '2024-06-27 11:43:36', 10, NULL, 'experienced', 'Enable'),
(134, '3232323232', '2024-06-27 12:06:31', '2024-06-27 12:06:31', '2024-06-27 12:06:31', 0, NULL, 'experienced', 'Enable'),
(135, '8306319953', '2024-06-27 12:42:57', '2024-06-27 12:42:57', '2024-06-27 12:42:57', 0, NULL, 'fresher', 'Enable'),
(136, '4646464646', '2024-06-27 14:20:37', '2024-06-27 14:20:37', '2024-06-27 14:20:37', 0, NULL, 'fresher', 'Enable'),
(137, '4848484848', '2024-06-27 14:30:41', '2024-06-27 14:30:41', '2024-06-27 14:30:41', 0, NULL, 'experienced', 'Enable'),
(138, '4949494949', '2024-06-27 14:36:35', '2024-06-27 14:36:35', '2024-06-27 14:36:35', 0, NULL, 'fresher', 'Enable'),
(139, '5050505050', '2024-06-27 15:07:27', '2024-06-27 15:07:27', '2024-06-27 15:07:27', 0, NULL, 'fresher', 'Enable'),
(141, '9694998693', '2024-06-28 15:03:13', '2024-06-28 15:03:13', '2024-06-28 15:03:13', 0, NULL, 'experienced', 'Enable'),
(142, '9653705026', '2024-06-28 21:43:35', '2024-06-28 21:43:35', '2024-06-28 21:43:35', 0, NULL, 'fresher', 'Enable'),
(143, '2323232323', '2024-06-29 10:26:00', '2024-06-29 10:26:00', '2024-06-29 10:26:00', 0, NULL, 'experienced', 'Enable'),
(145, '9829822205', '2024-06-29 10:49:47', '2024-06-29 10:49:47', '2024-06-29 10:49:47', 0, NULL, 'experienced', 'Enable'),
(146, '8999499699', '2024-06-29 14:01:05', '2024-06-29 14:01:05', '2024-06-29 14:01:05', 0, NULL, 'experienced', 'Enable'),
(147, '8160609927', '2024-06-30 11:08:18', '2024-06-30 11:08:18', '2024-06-30 11:08:18', 0, NULL, 'fresher', 'Enable'),
(148, '9099905567', '2024-06-30 16:40:18', '2024-06-30 16:40:18', '2024-06-30 16:40:18', 0, NULL, 'fresher', 'Enable'),
(149, '7004804599', '2024-06-30 18:50:01', '2024-06-30 18:50:01', '2024-06-30 18:50:01', 0, NULL, 'experienced', 'Enable'),
(150, '7878493801', '2024-06-30 18:54:56', '2024-06-30 18:54:56', '2024-06-30 18:54:56', 0, NULL, 'experienced', 'Enable'),
(151, '8511199099', '2024-06-30 21:27:43', '2024-06-30 21:27:43', '2024-06-30 21:27:43', 0, NULL, 'fresher', 'Enable'),
(152, '9999999999', '2024-07-01 10:04:11', '2024-07-01 10:04:11', '2024-07-01 10:04:11', 0, NULL, 'hotel', 'Enable'),
(153, '7050406542', '2024-07-01 12:03:11', '2024-07-01 12:03:11', '2024-07-01 12:03:11', 0, NULL, 'experienced', 'Enable'),
(154, '4747474747', '2024-07-01 16:18:58', '2024-07-01 16:18:58', '2024-07-01 16:18:58', 0, NULL, 'fresher', 'Enable'),
(155, '3636363636', '2024-07-01 16:24:43', '2024-07-01 16:24:43', '2024-07-01 16:24:43', 0, NULL, 'fresher', 'Enable'),
(156, '8282828282', '2024-07-01 17:23:35', '2024-07-01 17:23:35', '2024-07-01 17:23:35', 0, NULL, 'fresher', 'Enable'),
(162, '01234567890', '2024-07-12 10:10:52', '2024-07-12 10:10:52', '2024-07-12 10:10:52', 0, NULL, 'fresher', 'Enable'),
(163, '01234567899', '2024-07-12 10:13:40', '2024-07-12 10:13:40', '2024-07-12 10:13:40', 0, NULL, 'fresher', 'Enable'),
(164, '9602964437', '2024-07-12 10:19:09', '2024-07-12 10:19:09', '2024-07-12 10:19:09', 0, NULL, 'fresher', 'Enable'),
(165, '9602964438', '2024-07-12 10:19:59', '2024-07-12 10:19:59', '2024-07-12 10:19:59', 0, NULL, 'fresher', 'Enable'),
(166, '9602964439', '2024-07-12 10:21:52', '2024-07-12 10:21:52', '2024-07-12 10:21:52', 0, NULL, 'fresher', 'Enable'),
(167, '9602964436', '2024-07-12 10:23:21', '2024-07-12 10:23:21', '2024-07-12 10:23:21', 0, NULL, 'fresher', 'Enable'),
(168, '9602964435', '2024-07-12 10:25:12', '2024-07-12 10:25:12', '2024-07-12 10:25:12', 0, NULL, 'fresher', 'Enable'),
(169, '9602964434', '2024-07-12 10:28:23', '09-04-2024 04:38 PM', '2024-07-12 10:28:23', 0, NULL, 'fresher', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ten_th` varchar(255) DEFAULT NULL,
  `ten_school` varchar(255) DEFAULT NULL,
  `ten_year` varchar(255) DEFAULT NULL,
  `to_th` varchar(255) DEFAULT NULL,
  `to_th_school` varchar(255) DEFAULT NULL,
  `to_th_year` varchar(255) DEFAULT NULL,
  `gra_dip` varchar(255) DEFAULT NULL,
  `gr_degree` varchar(255) DEFAULT NULL,
  `gr_university` varchar(255) DEFAULT NULL,
  `gr_year` varchar(255) DEFAULT NULL,
  `post_gra` varchar(255) DEFAULT NULL,
  `pg_degree` varchar(255) DEFAULT NULL,
  `pg_university` varchar(255) DEFAULT NULL,
  `pg_year` varchar(255) DEFAULT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `doc_degree` varchar(255) DEFAULT NULL,
  `doc_university` varchar(255) DEFAULT NULL,
  `doc_year` varchar(255) DEFAULT NULL,
  `hotel_de` varchar(255) DEFAULT NULL,
  `h_college` varchar(255) DEFAULT NULL,
  `h_year` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_education`
--

INSERT INTO `user_education` (`id`, `user_id`, `ten_th`, `ten_school`, `ten_year`, `to_th`, `to_th_school`, `to_th_year`, `gra_dip`, `gr_degree`, `gr_university`, `gr_year`, `post_gra`, `pg_degree`, `pg_university`, `pg_year`, `doc`, `doc_degree`, `doc_university`, `doc_year`, `hotel_de`, `h_college`, `h_year`, `created_at`) VALUES
(48, 130, 'false', '', '', 'false', '', '', 'false', '', '', '', 'true', 'M. Com', 'Saurashtra University ', '2013', 'false', '', '', '', 'false', '', '', '06-26-2024 09:21 PM'),
(49, 132, 'true', '', '', 'true', '', '', 'true', '', '', '', 'false', '', '', '', 'true', '', '', '', 'false', '', '', '06-27-2024 11:39 AM'),
(50, 133, 'false', '', '', 'false', '', '', 'true', 'B.tech', 'Poornima Group Of instituions', '2024', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '06-27-2024 05:34 PM'),
(52, 142, 'false', '', '', 'false', '', '', 'true', 'LAW', 'JECRC University ', '2022', 'false', 'LAW', 'JECRC ', '20', 'false', '', '', '', 'false', '', '', '06-28-2024 09:45 PM'),
(53, 143, 'true', 'Avn', '2020', 'false', '', '', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '06-29-2024 10:28 AM'),
(55, 145, 'false', '', '', 'false', '', '', 'true', 'Bsc', 'Rau', '2010', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '06-29-2024 10:50 AM'),
(56, 146, 'true', 'Jeevan jyoti secondary school ', '1996', 'false', '', '', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '06-29-2024 02:05 PM'),
(57, 150, 'false', '', '', 'false', '', '', 'false', '', '', '', 'true', 'B.A', 'MDSU Ajmer ', '2015', 'false', '', '', '', 'false', '', '', '06-30-2024 06:57 PM'),
(58, 149, 'false', '', '', 'true', 'Bisthapit Mahavidyalaya Balidih', '2012', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '06-30-2024 07:02 PM'),
(59, 151, 'false', '', '', 'true', 'Utkarsh', '2023', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '06-30-2024 09:28 PM'),
(60, 153, 'true', 'ARS PUBLIC SCHOOL, Bokaro', '2013', 'true', 'KV 1, Kankarbagh, Patna ', '2015', 'true', 'BCA', 'IGNOU', '2018', 'false', '', '', '', 'false', '', '', '', 'true', 'Genius Institute of Hotel Management, New Dlehi', '2018', '07-01-2024 12:10 PM'),
(61, 164, 'true', '', '', 'true', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '07-12-2024 10:19 AM'),
(62, 165, 'true', '', '', 'true', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '07-12-2024 10:19 AM'),
(63, 166, 'true', 'vffdfb', '2014', 'true', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '07-12-2024 10:21 AM'),
(64, 167, 'true', 'vffdfb', '2014', 'true', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '07-12-2024 10:23 AM'),
(65, 168, 'true', 'vffdfb', '2014', 'true', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '', 'true', '', '', '07-12-2024 10:25 AM'),
(66, 169, 'on', 'vffdfb', '2015', 'false', '', '', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '', 'false', '', '', '07-12-2024 10:28 AM');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pin_code` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `name`, `last_name`, `gender`, `email`, `role`, `address`, `pin_code`, `dob`, `state`, `city`, `country`, `created_at`, `updated_at`) VALUES
(84, 121, 'Ak', 'Pareek', 'male', '', 'Job Seeker', '', '', '', 'Uttarakhand', '', 'India', '06-24-2024 05:14 PM', '09-05-2024 04:23 PM'),
(92, 130, 'Jayesh', 'Narola', 'male', 'jayeshnarola.nimrajkot@gmail.com', 'Job Seeker', 'Jay Chamunda Krupa 3 Shyamnagar street behind Bileshwar Temple Gandhigram Rajkot ', '360007', '1986-08-07', 'Gujarat', 'RAJKOT', 'India', '06-26-2024 09:17 PM', '06-26-2024 09:17 PM'),
(93, 132, 'Rohit', 'Kumar', 'male', 'Treesddd@gmail.com', 'Job Seeker', 'Tr, cf, fdrtewr', '302022', '2020-06-10', 'Rajasthan', 'JAIPUR', 'India', '06-27-2024 11:35 AM', '06-27-2024 12:41 PM'),
(94, 133, 'Abhishek', 'Anjana', 'male', '2020pgiadabhishek02@poornima.org', 'Job Seeker', 'near Pratapnagar', '312601', '2024-06-27', 'Rajasthan', 'PRATAPGHAR', 'India', '06-27-2024 11:43 AM', '06-28-2024 06:02 PM'),
(95, 134, 'Pawan', 'Sharma', 'male', 'pawansharma@gmail.com', 'Job Seeker', 'Talwandi', '324005', '2024-06-21', 'Rajasthan', 'KOTA', 'India', '06-27-2024 12:06 PM', '06-27-2024 12:06 PM'),
(96, 135, 'Dinesh', 'Nath', 'male', '', 'Job Seeker', 'Gagera hurda bhilwada ', '311021', '1995-01-01', 'Rajasthan', 'BHILWARA', 'India', '06-27-2024 12:42 PM', '06-27-2024 12:42 PM'),
(97, 136, 'Abhishek', 'Anjana', 'male', '2020pgiadabhishek02@poornima.org', 'Job Seeker', 'Village Marjivi', '312601', '', 'Rajasthan', 'PRATAPGHAR', 'India', '06-27-2024 02:20 PM', '06-27-2024 02:20 PM'),
(98, 137, 'Abhishek', 'Anjana', 'male', '2020pgiadabhishek02@poornima.org', 'Job Seeker', 'Village Marjivi', '312601', '2024-06-27', 'Rajasthan', 'PRATAPGHAR', 'India', '06-27-2024 02:30 PM', '06-27-2024 02:32 PM'),
(99, 138, 'Charlie', 'Anjana', 'male', '', 'Job Seeker', '', '', '2020-01-20', '', '', 'India', '06-27-2024 02:36 PM', '06-27-2024 02:36 PM'),
(100, 139, 'Abhishek', 'Anjana', 'male', '', 'Job Seeker', '', '', '2020-01-27', '', '', 'India', '06-27-2024 03:07 PM', '06-27-2024 03:07 PM'),
(102, 141, 'Ronak', 'Vaya', 'male', '', 'Job Seeker', '', '', '', '', '', 'India', '06-28-2024 03:03 PM', '06-28-2024 03:03 PM'),
(103, 142, 'Sanjay', 'Choudhary', 'male', '', 'Job Seeker', '', '', '', '', '', 'India', '06-28-2024 09:43 PM', '06-28-2024 09:43 PM'),
(104, 143, 'Ronak', 'Vaya', 'male', 'Ronakvaya@gmail.com', 'Job Seeker', 'Jaupur', '302018', '2024-06-29', 'Rajasthan', 'JAIPUR', 'India', '06-29-2024 10:26 AM', '06-29-2024 10:28 AM'),
(106, 145, 'Ashish', 'Choudhary', 'male', 'abc@xyz.com', 'Job Seeker', 'Sanganer', '302033', '1990-05-15', 'Rajasthan', 'JAIPUR', 'India', '06-29-2024 10:49 AM', '06-29-2024 11:18 AM'),
(107, 146, 'Manoj', 'Kumar', 'male', 'mk9094@gmail.com', 'Job Seeker', 'Kalawad Rd Rajkot ', '360005', '1979-06-12', 'Gujarat', 'RAJKOT', 'India', '06-29-2024 02:01 PM', '06-29-2024 02:01 PM'),
(108, 147, 'Pradip', 'Panchal', 'male', 'Pradip@gmail.com', 'Job Seeker', 'Com', '361101115164948784575457', '2024-06-28', 'Goa', 'NORTH GOA', 'India', '06-30-2024 11:08 AM', '06-30-2024 11:08 AM'),
(109, 148, 'Dayal', 'Jat', 'male', 'dayalchoudhary4444@gmail.com', 'Job Seeker', '186 Gagera hurda bhilwara ', '311021', '1994-01-03', 'Rajasthan', 'BHILWARA', 'India', '06-30-2024 04:40 PM', '06-30-2024 04:40 PM'),
(110, 149, 'Ganesh', 'Mahto', 'male', 'kccganeshkumar@gmail.com', 'Job Seeker', 'Village Madhukarpur ', '829121', '1994-01-27', 'Jharkhand', 'BOKARO', 'India', '06-30-2024 06:50 PM', '06-30-2024 06:50 PM'),
(111, 150, 'Narendra', 'Dhodawat ', 'male', 'narendracap1989@gmail.com', 'Job Seeker', 'Tehsil bhim District Rajsamand ( Raj) Rajasthan ', '305921', '1989-12-20', 'Rajasthan', 'RAJSAMAND', 'India', '06-30-2024 06:54 PM', '06-30-2024 06:54 PM'),
(112, 151, 'Pooja', 'Jat', 'female', 'Poojajjat@gmail.com', 'Job Seeker', 'Nandvatika', '360007', '2024-06-30', 'Gujarat', 'RAJKOT', 'India', '06-30-2024 09:27 PM', '06-30-2024 09:27 PM'),
(113, 153, 'Ankit', 'Bhaskar', 'male', 'ankit.bhaskar29@outlook.in', 'Job Seeker', 'H no 84 Saraswati Nagar Chas Bokaro Jharkhand ', '827013', '1997-08-29', 'Jharkhand', 'BOKARO', 'India', '07-01-2024 12:03 PM', '07-01-2024 12:03 PM'),
(114, 154, 'Shivam', 'Dubey', 'male', '', 'Job Seeker', '', '', '2024-07-01', '', '', 'India', '07-01-2024 04:18 PM', '07-01-2024 04:18 PM'),
(115, 155, 'Shivam', 'Soni', 'male', 'sivamsoni@gmail.com', 'Agent', '', '', '', 'Haryana', 'FARIDABAD', 'India', '07-01-2024 04:24 PM', '07-01-2024 04:24 PM'),
(116, 156, 'Suraj', 'Soni', 'male', 'surajsoni@gmail.com', 'Agent', '', '', '2024-06-05', '', '', 'India', '07-01-2024 05:23 PM', '07-01-2024 05:23 PM'),
(122, 162, 'anshul', 'kumar', 'male', 'vikashkumar8209@gmail.com', 'Job Seeker', 'jaipur', '332701', '', '1483', '', 'India', '07-12-2024 10:10 AM', '07-12-2024 10:10 AM'),
(123, 163, 'anshul', 'kumar', 'male', 'vikashkumar8209@gmail.com', 'Job Seeker', 'jaipur', '332701', '', '1483', '', 'India', '07-12-2024 10:13 AM', '07-12-2024 10:13 AM'),
(124, 164, 'anshul', 'kumar', 'male', 'anshulkumar969602@gmail.com', 'Job Seeker', 'jaipur', '332701', '', '1477', '', 'India', '07-12-2024 10:19 AM', '07-12-2024 10:19 AM'),
(125, 165, 'anshul', 'kumar', 'male', 'anshulkumar969602@gmail.com', 'Job Seeker', 'jaipur', '332701', '', '1477', '', 'India', '07-12-2024 10:19 AM', '07-12-2024 10:19 AM'),
(126, 166, 'anshul', 'kumar', 'male', 'anshulkumar969602@gmail.com', 'Job Seeker', 'jaipur', '332701', '', '1477', '', 'India', '07-12-2024 10:21 AM', '07-12-2024 10:21 AM'),
(127, 167, 'anshul', 'kumar', 'male', 'anshulkumar969602@gmail.com', 'Job Seeker', 'jaipur', '332701', '', '1477', '', 'India', '07-12-2024 10:23 AM', '07-12-2024 10:23 AM'),
(128, 168, 'anshul', 'kumar', 'male', 'anshulkumar969602@gmail.com', 'Job Seeker', 'jaipur', '332701', '', '1477', '', 'India', '07-12-2024 10:25 AM', '07-12-2024 10:25 AM'),
(129, 169, 'anshul', 'kumar', 'male', 'anshulkumar969602@gmail.com', 'Job Seeker', 'jaipur', '', '', '1477', '', 'India', '07-12-2024 10:28 AM', '09-04-2024 04:22 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_images`
--

CREATE TABLE `user_profile_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_profile_images`
--

INSERT INTO `user_profile_images` (`id`, `user_id`, `image_path`, `created_at`, `updated_at`) VALUES
(34, 130, '/uploads/profile/130-img/1719416895_9c92e70143f7d68c768b.jpg', '2024-06-26 21:18:15', '2024-06-26 21:18:15'),
(38, 116, '/uploads/profile/116-img/1719471689_aba1c38d0011fa54ef45.jpeg', '2024-06-27 12:31:29', '2024-06-27 12:31:29'),
(40, 132, '/uploads/profile/132-img/1719472160_61f3388379c17ad0e985.jpeg', '2024-06-27 12:39:20', '2024-06-27 12:39:20'),
(42, 133, '/uploads/profile/133-img/1719567435_09a0bcd97b1fc4f209c0.jpeg', '2024-06-28 15:07:15', '2024-06-28 15:07:15'),
(44, 143, '/uploads/profile/143-img/1719637102_1f28de99a4d7f40df858.jpeg', '2024-06-29 10:28:22', '2024-06-29 10:28:22'),
(45, 145, '/uploads/profile/145-img/1719640173_47f0fe59cba4336607a9.jpeg', '2024-06-29 11:19:33', '2024-06-29 11:19:33'),
(46, 146, '/uploads/profile/146-img/1719649941_8d3084f145df4ea067d5.jpg', '2024-06-29 14:02:21', '2024-06-29 14:02:21'),
(47, 149, '/uploads/profile/149-img/1719753736_aabd2a0fecad66c47741.jpg', '2024-06-30 18:52:16', '2024-06-30 18:52:16'),
(48, 150, '/uploads/profile/150-img/1719753956_ec9e4b54ed38b17b2efd.jpeg', '2024-06-30 18:55:56', '2024-06-30 18:55:56'),
(49, 153, '/uploads/profile/153-img/1719815639_1476faa1ded6af56d829.jpg', '2024-07-01 12:03:59', '2024-07-01 12:03:59'),
(50, 163, 'uploads/profile/1720759420_6e63222b7eeb4b77ee7d.jpg', '2024-07-12 10:13:40', '2024-07-12 10:13:40'),
(51, 164, 'uploads/profile/1720759749_b404b9127dfb4abc7ec3.jpg', '2024-07-12 10:19:09', '2024-07-12 10:19:09'),
(52, 165, 'uploads/profile/1720759799_7540718f5f1238a140c9.jpg', '2024-07-12 10:19:59', '2024-07-12 10:19:59'),
(53, 166, 'uploads/profile/1720759912_bc52fc2cd59638e6e0a8.jpg', '2024-07-12 10:21:52', '2024-07-12 10:21:52'),
(54, 167, 'uploads/profile/1720760001_102a382b83baa8291190.jpg', '2024-07-12 10:23:21', '2024-07-12 10:23:21'),
(55, 168, 'uploads/profile/1720760112_e3dc1dddc8144a67750b.jpg', '2024-07-12 10:25:13', '2024-07-12 10:25:13'),
(56, 169, '/uploads/profile/169-img/1725447126_7f67a2bad9979d1281ad.jpg', '2024-07-12 10:28:23', '2024-09-04 16:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `working_experiences`
--

CREATE TABLE `working_experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `organisation` varchar(100) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `ref_mobile` varchar(255) DEFAULT NULL,
  `ref_email` varchar(255) DEFAULT NULL,
  `profile` varchar(50) DEFAULT NULL,
  `sub_department` varchar(50) DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `working_experiences`
--

INSERT INTO `working_experiences` (`id`, `user_id`, `organisation`, `department`, `ref_mobile`, `ref_email`, `profile`, `sub_department`, `state`, `city`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(56, 133, 'hotel leela palace', 'Kitchen', '9090909090', 'email@gmail.com', 'operations', 'juice maker', 'Delhi', 'NEW DELHI', '2024-06-01', '2024-06-11', '06-28-2024 03:08 PM', '06-28-2024 03:08 PM'),
(58, 143, 'check', 'Kitchen', '9694998693', 'Ronakvaya@gmail.com', 'operating', 'juice maker', 'Uttar Pradesh', 'MAHARAJGANJ', '2024-06-29', '2024-06-30', '06-29-2024 10:26 AM', '06-29-2024 11:15 AM'),
(60, 141, 'countrystore', 'Kitchen', '09999999999', 'ronakvaya@gmail.com', 'check', 'CDP All Rounder', 'Maharashtra', 'LATUR', '2024-06-04', '2024-06-13', '06-29-2024 10:41 AM', '06-29-2024 11:06 AM'),
(61, 145, 'hotel aaram', 'Front Office,Bar/Restaurant', '9887281455', 'abc@xyz.com', 'receptionist', 'Receptionist, Captain(Bar)', 'Rajasthan', 'AJMER', '2024-03-01', '2024-06-28', '06-29-2024 10:51 AM', '06-29-2024 11:18 AM'),
(62, 150, 'Gurukrupa ', 'Banquet & food Service', '7878493801', 'narendracap1989@gmail.com', 'General Manager ', 'F & B Manager', 'Gujarat', 'BHAVNAGAR, RAJKOT, JAMNAGAR, JUNAGADH, AMRELI', '2020-02-14', '2024-06-30', '06-30-2024 07:08 PM', '06-30-2024 07:09 PM'),
(63, 153, 'Hotel Aryan International ', 'Front Office', '7050406542', 'aryanhotel512@gmail.com', 'Responsible for Room Allotment, Checking In, Out, ', 'Front Office Executive', 'Jharkhand', 'BOKARO', '2023-04-01', '2024-03-27', '07-01-2024 12:14 PM', '07-01-2024 12:14 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_users`
--
ALTER TABLE `api_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoteliers`
--
ALTER TABLE `hoteliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoteliers_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_candidate_id_foreign` (`user_id`);

--
-- Indexes for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_listings_hotelier_id_foreign` (`hotelier_id`);

--
-- Indexes for table `job_pref`
--
ALTER TABLE `job_pref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_pref_user`
--
ALTER TABLE `job_pref_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_pref_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_view`
--
ALTER TABLE `job_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resumes_user_id_foreign` (`user_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_departments_department_id_foreign` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_education_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_profile_images`
--
ALTER TABLE `user_profile_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profile_images_user_id_foreign` (`user_id`);

--
-- Indexes for table `working_experiences`
--
ALTER TABLE `working_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `working_experiences_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `api_users`
--
ALTER TABLE `api_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoteliers`
--
ALTER TABLE `hoteliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `job_pref`
--
ALTER TABLE `job_pref`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `job_pref_user`
--
ALTER TABLE `job_pref_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `job_view`
--
ALTER TABLE `job_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_departments`
--
ALTER TABLE `sub_departments`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `user_profile_images`
--
ALTER TABLE `user_profile_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `working_experiences`
--
ALTER TABLE `working_experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_candidate_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD CONSTRAINT `job_listings_hotelier_id_foreign` FOREIGN KEY (`hotelier_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_pref_user`
--
ALTER TABLE `job_pref_user`
  ADD CONSTRAINT `job_pref_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD CONSTRAINT `sub_departments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_education`
--
ALTER TABLE `user_education`
  ADD CONSTRAINT `user_education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile_images`
--
ALTER TABLE `user_profile_images`
  ADD CONSTRAINT `user_profile_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `working_experiences`
--
ALTER TABLE `working_experiences`
  ADD CONSTRAINT `working_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
