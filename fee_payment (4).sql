-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 05:44 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fee_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `cart_id` bigint(20) NOT NULL,
  `feeclient_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `student_sch` varchar(200) NOT NULL,
  `student_grade` varchar(50) NOT NULL,
  `payment_for` varchar(100) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `cart_status` tinyint(1) NOT NULL,
  `date_added` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`cart_id`, `feeclient_id`, `student_id`, `student_sch`, `student_grade`, `payment_for`, `amount_due`, `amount_paid`, `cart_status`, `date_added`) VALUES
(17, 6, 5, 'Honey Junior', 'JSS 3 ', 'Ckjcbbkjb', '10000.00', '10000.00', 1, '2018-05-19'),
(18, 6, 7, 'Honey Junior', 'SSS 3 ', 'Ckjcbbkjb', '20000.00', '20000.00', 1, '2018-05-19'),
(19, 6, 5, 'Honey Junior', 'JSS 3 ', 'Ckjcbbkjb', '10000.00', '10000.00', 1, '2018-05-21'),
(20, 6, 7, 'Honey Junior', 'SSS 3 ', 'Ckjcbbkjb', '20000.00', '20000.00', 1, '2018-05-21'),
(22, 6, 5, 'Honey Junior', 'JSS 3 ', 'Ckjcbbkjb', '10000.00', '10000.00', 1, '2018-05-22'),
(23, 6, 7, 'Honey Junior', 'SSS 3 ', 'Ckjcbbkjb', '20000.00', '20000.00', 1, '2018-05-22'),
(24, 6, 5, 'Honey Junior', 'JSS 3 ', 'Ckjcbbkjb', '10000.00', '10000.00', 1, '2018-05-28'),
(25, 6, 7, 'Honey Junior', 'SSS 3 ', 'Ckjcbbkjb', '20000.00', '20000.00', 1, '2018-05-28'),
(26, 6, 5, 'Honey Junior', 'JSS 3 ', 'Ckjcbbkjb', '10000.00', '10000.00', 1, '2018-05-28'),
(27, 6, 7, 'Honey Junior', 'SSS 3 ', 'Ckjcbbkjb', '20000.00', '20000.00', 1, '2018-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `cat_id` int(12) NOT NULL,
  `sch_id` bigint(20) NOT NULL,
  `feeclient_id` bigint(20) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_status` tinyint(1) NOT NULL,
  `cat_installment` tinyint(1) NOT NULL,
  `cat_logo` varchar(500) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`cat_id`, `sch_id`, `feeclient_id`, `cat_name`, `cat_status`, `cat_installment`, `cat_logo`, `create_date`) VALUES
(1, 1, 16, 'PTA Levy', 0, 0, '', '2018-04-04'),
(5, 1, 16, 'Sport', 0, 0, '', '2018-04-04'),
(6, 9, 16, 'Lib', 0, 0, '', '2018-04-04'),
(10, 1, 16, 'Lesson', 1, 1, '', '2018-04-10'),
(11, 1, 16, 'Lesson', 1, 1, '', '2018-04-10'),
(12, 9, 16, 'Sport Wear', 1, 0, '', '2018-04-10'),
(19, 1, 16, 'Sdbjhbdbds', 1, 1, '', '2018-04-10'),
(27, 9, 16, 'Ncvncvln', 1, 1, '', '2018-04-10'),
(28, 1, 16, 'Jsbiub', 1, 1, '', '2018-04-10'),
(43, 1, 16, 'Jhgyjf', 1, 1, '', '2018-04-10'),
(44, 1, 16, 'Hjgju', 1, 1, '', '2018-04-10'),
(45, 1, 16, 'Kdhioh', 1, 1, '', '2018-04-10'),
(46, 1, 16, 'Idsioh', 1, 1, '', '2018-04-10'),
(47, 1, 16, 'Ckllk', 1, 1, '', '2018-04-10'),
(48, 1, 16, 'Sxnj', 1, 1, '', '2018-04-10'),
(49, 1, 16, 'Klxznlkn', 1, 1, '', '2018-04-10'),
(50, 9, 16, 'Lkhk', 1, 1, '', '2018-04-10'),
(51, 1, 16, 'Iofho', 1, 1, '', '2018-04-10'),
(52, 1, 16, 'Kld', 1, 1, '', '2018-04-10'),
(53, 1, 16, 'Hvjhjg', 1, 1, '', '2018-04-10'),
(54, 9, 16, ',bgjkg', 1, 1, '', '2018-04-10'),
(55, 1, 16, 'Mvhjjh', 1, 1, '', '2018-04-10'),
(56, 9, 16, 'Jjjjj', 1, 1, '', '2018-04-10'),
(57, 1, 16, 'Kjkjg', 1, 1, '', '2018-04-11'),
(58, 1, 16, 'Jgjugf', 1, 1, '', '2018-04-11'),
(59, 1, 16, 'Gug', 1, 1, '', '2018-04-11'),
(60, 1, 16, 'Lhi', 1, 1, '', '2018-04-11'),
(61, 1, 16, 'Klcvxkl', 1, 1, '', '2018-04-11'),
(79, 9, 16, 'Klfmn', 1, 1, '', '2018-04-13'),
(80, 9, 16, 'Sport Wear', 1, 1, '', '2018-04-13'),
(81, 9, 16, 'Klfvnklcnoin', 1, 1, '', '2018-04-13'),
(82, 9, 16, 'Ndjcn', 1, 1, '', '2018-04-13'),
(83, 1, 16, 'Another', 1, 1, '', '2018-04-17'),
(84, 9, 16, 'Ckjcbbkjb', 1, 1, 'assets/catlogo/what-we-do_right.png', '2018-04-17'),
(85, 9, 16, 'Without image', 1, 0, '', '2018-04-17'),
(86, 10, 16, 'Levy', 1, 1, '', '2018-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `feeclient_table`
--

CREATE TABLE `feeclient_table` (
  `feeclient_id` bigint(20) NOT NULL,
  `feeclient_lname` varchar(100) NOT NULL,
  `feeclient_fname` varchar(100) NOT NULL,
  `feeclient_email` varchar(250) NOT NULL,
  `feeclient_phone` varchar(20) NOT NULL,
  `feeclient_role` varchar(20) NOT NULL,
  `feeclient_vstatus` int(1) NOT NULL,
  `activation_code` varchar(250) NOT NULL,
  `feeclient_acctstatus` tinyint(1) NOT NULL,
  `password` varchar(250) NOT NULL,
  `feeclient_pix` varchar(250) NOT NULL,
  `reg_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feeclient_table`
--

INSERT INTO `feeclient_table` (`feeclient_id`, `feeclient_lname`, `feeclient_fname`, `feeclient_email`, `feeclient_phone`, `feeclient_role`, `feeclient_vstatus`, `activation_code`, `feeclient_acctstatus`, `password`, `feeclient_pix`, `reg_date`) VALUES
(6, 'ADENIRAN', 'Adeyinka', 'akapa@yahoo.com', '', 'parent', 1, '4179703cd6f24368e24322d5866c335f88ae6372cfdc5df69a976e893f4d554b', 1, '$2y$10$G1Kl8ud.ogU/5eolEgv1JOYXCXh25SZk/KjZAEoY9HAidqUkTLo4G', '', 'regdate'),
(7, 'ADENIRAN', 'Adeyinka', 'nicon247@yahoo.com', '08054291827', 'parent', 1, '8a214eb039d3ada9cdcdec5fdf6d05bbe820a45f1dfc7b95282d10b6087e11c0', 0, '$2y$10$3NKjBxhrS5npG/gNee3wQenAHSdBvH6mGjb5NgHEljVVzSFyEpUsC', '', 'regdate'),
(8, 'Dsdss', 'Alimi', 'admin@bhookie.com', '88877', 'parent', 1, 'ca16b29a3d5d38b4fb29dd2cb704153e202cb962ac59075b964b07152d234b70', 0, '$2y$10$YF3Ycp.onbbWgxWENn9eR.nlVcoXfxHfgL.q8SyZioWjP.gid7nNK', '', 'regdate'),
(9, '', 'Kjjjj', 'hhhh@m.com', 'kjkjkj', 'parent', 1, '85f5182a9b27adbb50c1c11d187125e28eefcfdf5990e441f0fb6f3fad709e21', 0, '$2y$10$NymXIyqEua1S.gh3JKeG9.92XNCutQuLXZSsVkuyl5JwIWfGyKKq.', '', '2017-12-28'),
(10, 'Ibiubub', 'Kjdio', 'sssss@m', '494499', 'parent', 1, '3c9a52616a180ef74619fb66ad7a6572556f391937dfd4398cbac35e050a2177', 0, '$2y$10$yJqg5AWCVVpLqUx9TKK.e.N0MUcLQUsv4wlIGDjdwhAgtD1Sp3Ocq', '', '2017-12-28'),
(11, 'Samuel', 'Ajala', 'nathanieladeniran@gmail.com', '081', 'parent', 1, '646f5a3a750e030df10b8a7225a0a712158f3069a435b314a80bdcb024f8e422', 0, '$2y$10$6ZqOj1JNNIKpdRjUMKwx3exo9EtgXo4S8WIccScwaDKGuOOyq017C', '', '2017-12-28'),
(12, 'Asffs', 'Asas', 'j@m.com', '03094949', 'school', 0, 'bf4d8e61200daa763dc5cd66f19b9a2a6f2268bd1d3d3ebaabb04d6b5d099425', 0, '$2y$10$l/1B6Z6VfUPqZZYNIih2L.Ejhetga.wJQMCJD5VsFl2FfBXh2XfrO', '', '2017-12-30'),
(13, 'Ade', 'Nathy', 'nath@yahoo.com', '0809988998', 'organization', 1, '17550eff5e3c8db71e440e00ec9d7a9d4b0a59ddf11c58e7446c9df0da541a84', 0, '$2y$10$ZeCh5f2nzQwfD0uzgH8/Z.glYnozwzNQC7D2t1c1GEK6dGfVB5JqW', '', '2018-01-02'),
(14, 'Kjjkjj', 'Jsjsj', 'test@gmail.com', '838888', 'parent', 1, 'd595b96f150170e7601db00bc7386d793cf166c6b73f030b4f67eeaeba301103', 0, '$2y$10$azH9bWDYLhfmAlWWik/AnuJPAu1BShzgUMP1xcCQbfNZ2OuPYTmQO', '', '2018-01-02'),
(15, 'Kgfkugk', 'Kdgkug', 'jidor@m.com', '8779879', 'parent', 1, '1f9c00f27506aa77f9865c9d2bd2f56ff79921bbae40a577928b76d2fc3edc2a', 0, '$2y$10$CAO6XROWqJXaDvpsj/EeeuRdg8r5RYbH2KIEu.DrQD38aigPM7MLW', '', '2018-01-03'),
(16, 'Samuel', 'Alabi', 'nathanieladeniran@live.com', '08168905925', 'school', 1, '0329efffb7ad25698f55b1d3a998e874d1c38a09acc34845c6be3a127a5aacaf', 1, '$2y$10$5.QkAACdLJbjQ0fIbRJQf.X.mKSIIcu8xj4GL4PBMeVjS4MKOzx4u', '', '2018-04-03'),
(22, 'Nathaniel', 'Nath', 'nath@localhost.com', '0807664533', 'school', 1, '27c39002902cbefb9b7af13414be30889c01802ddb981e6bcfbec0f0516b8e35', 0, '$2y$10$HdiOI6FZU8Qn83PDo.aBMOUI2HPY6yZs7X0B.AE4fC0agi.XMr9G2', '', '2018-04-05'),
(25, 'Jjuujjj', 'Hnhnn', 'n@m.com', '09993399', 'school', 1, 'bff215ef432425a648de9af3d08cb64f02522a2b2726fb0a03bb19f2d8d9524d', 0, '$2y$10$rHqszZGQdXuqPO4YLYwLHOmbRjvkuvz/wnvmSbAVua5DuYB.HoEn6', '', '2018-04-05'),
(26, 'Jdjdj', 'Almi', 'alm@yahoo.com', '93938399', 'school', 1, '85fa8693e02f63f3068f25aa2e5536fe8d6dc35e506fc23349dd10ee68dabb64', 0, '$2y$10$KuYCQML99cc.1/Md0GBT1.IlpRAoq0NSRDcXKf.Ub2Wm.EPDfZZEa', '', '2018-04-05'),
(27, 'Mime', 'Mime', 'mime@o.com', '03939930', 'school', 1, '7e6c5837f7193d5e6b80e9c8dd0f5036c52f1bd66cc19d05628bd8bf27af3ad6', 0, '$2y$10$tSa4HRq6k0MuDFrsJ1EJbOymHZ2/.JSPYv4cP9sjQXMxYt68OTQ7m', '', '2018-04-05'),
(31, 'Hrhhrrh', 'Hthtthth', 'nathaniel@localhost.feement', '98488484', 'school', 1, 'f5fc2281984fc68de7596898afc0f6114e4b5fbbbb602b6d35bea8460aa8f8e5', 0, '$2y$10$D7NrGM/HJ2AQZAgW9hF7Pen6miUJMPWgctE1o./pHmUrng/BBo3xa', '', '2018-04-05'),
(47, 'Nathy', 'Nathaniel', 'softapp@localhost.feement', '94848498439', 'school', 0, 'dafe1907b138086477d55dee91176ec58b5040a8a5baf3e0e67386c2e3a9b903', 1, '$2y$10$y3Cgf.HoMUe/C9EDkNnFZ.B5hUCBkMTY73IZ5I2aOVwbG0AxhPooy', '', '2018-04-06'),
(70, 'Ade', 'Adenath', 'info@localhost.sms', '07088683944', 'parent', 1, 'a250e02ad91dc7b46201157321e685346c9882bbac1c7093bd25041881277658', 0, '$2y$10$c/CHOKWB/SyKo/PD.U7neeYqW6WfhnqfHlq29DK/JvU.pVMlApgVS', '', '2018-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `feeschool_table`
--

CREATE TABLE `feeschool_table` (
  `sch_id` bigint(20) NOT NULL,
  `feeclient_id` bigint(20) NOT NULL,
  `school_name` varchar(300) NOT NULL,
  `school_address` varchar(300) NOT NULL,
  `school_phone` varchar(20) NOT NULL,
  `school_bank` varchar(50) NOT NULL,
  `bank_acct_num` varchar(20) NOT NULL,
  `school_status` tinyint(1) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feeschool_table`
--

INSERT INTO `feeschool_table` (`sch_id`, `feeclient_id`, `school_name`, `school_address`, `school_phone`, `school_bank`, `bank_acct_num`, `school_status`, `reg_date`) VALUES
(1, 16, 'Honey Gold', 'ijxnxiunxiunxiunix', '099882828', 'Eco Bank', '0006167345', 1, '2018-04-03'),
(9, 16, 'Honey Junior', 'jdbckibiub', '088286826', 'Eco Bank', '87447477', 1, '2018-04-04'),
(10, 16, 'Honey SS', 'jgfbiubjubb', '049494499', 'GTBank', '588585858588', 1, '2018-04-05'),
(11, 54, 'Ikolaba Grammar School, Ibadan, Nigeria', 'jhdshjhbbds', '88888288', 'Diamond Bank', '0982929229', 1, '2018-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `feestudent_table`
--

CREATE TABLE `feestudent_table` (
  `std_id` bigint(20) NOT NULL,
  `std_lname` varchar(100) NOT NULL,
  `std_fname` varchar(100) NOT NULL,
  `std_mname` varchar(100) NOT NULL,
  `std_grade` varchar(50) NOT NULL,
  `std_idty` varchar(12) NOT NULL,
  `std_sch` varchar(250) NOT NULL,
  `std_status` tinyint(1) NOT NULL,
  `feeclient_id` bigint(20) NOT NULL,
  `std_image` varchar(250) NOT NULL,
  `reg_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feestudent_table`
--

INSERT INTO `feestudent_table` (`std_id`, `std_lname`, `std_fname`, `std_mname`, `std_grade`, `std_idty`, `std_sch`, `std_status`, `feeclient_id`, `std_image`, `reg_date`) VALUES
(1, 'Adeniran', 'Bolu', 'Sam', 'KG', '', 'Oritamefa', 1, 6, '', '2018-04-03'),
(2, 'Adeniran', 'Babajide', 'John', 'SSS 1', '0', 'King''s International College, Ibadan, Nigeria', 1, 6, '', '2018-01-04'),
(3, 'Adeniran', 'Adeyinka', 'Nathaniel', 'SSS 1', '0', 'King''s International College, Ibadan, Nigeria', 0, 6, '', '2018-01-04'),
(4, 'Ldfsonoin', 'Oinionion', 'Ionoin', 'Nursery 3', '', 'Nesam', 1, 7, '', '2018-01-04'),
(5, 'Alimi', 'Oyeniyi', 'Wasiu', 'JSS 3', '', 'Honey Junior', 0, 6, '', '2018-01-08'),
(6, 'Adeniran', 'Olu', 'Eze', 'JSS 2', '', 'Oritamefa', 1, 6, '', '2018-04-03'),
(7, 'Adeniran', 'Asala', 'Nm', 'SSS 3', '', 'Honey Junior', 1, 6, '', '2018-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `fee_table`
--

CREATE TABLE `fee_table` (
  `fee_id` int(12) NOT NULL,
  `cat_id` int(12) NOT NULL,
  `sch_id` bigint(20) NOT NULL,
  `feeclient_id` bigint(20) NOT NULL,
  `fee_class` varchar(10) NOT NULL,
  `fee_amount` decimal(10,2) NOT NULL,
  `fee_create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_table`
--

INSERT INTO `fee_table` (`fee_id`, `cat_id`, `sch_id`, `feeclient_id`, `fee_class`, `fee_amount`, `fee_create_date`) VALUES
(1, 46, 1, 16, 'JSS 2', '65.00', '2018-04-10'),
(2, 46, 1, 16, 'SSS 1', '47.00', '2018-04-10'),
(3, 46, 1, 16, 'SSS 3', '47.00', '2018-04-10'),
(26, 65, 1, 16, 'JSS 1', '20000.00', '2018-04-12'),
(27, 65, 1, 16, 'JSS 3', '230000.00', '2018-04-12'),
(28, 65, 1, 16, 'SSS 2', '40000.00', '2018-04-12'),
(29, 65, 1, 16, 'SSS 3', '50000.00', '2018-04-12'),
(42, 68, 1, 16, 'JSS 1', '0.00', '2018-04-12'),
(43, 68, 1, 16, 'JSS 2', '0.00', '2018-04-12'),
(44, 68, 1, 16, 'JSS 3', '0.00', '2018-04-12'),
(45, 68, 1, 16, 'SSS 1', '0.00', '2018-04-12'),
(46, 68, 1, 16, 'SSS 2', '0.00', '2018-04-12'),
(47, 68, 1, 16, 'SSS 3', '0.00', '2018-04-12'),
(48, 69, 1, 16, 'JSS 1', '0.00', '2018-04-12'),
(49, 69, 1, 16, 'JSS 2', '0.00', '2018-04-12'),
(50, 69, 1, 16, 'JSS 3', '0.00', '2018-04-12'),
(51, 69, 1, 16, 'SSS 1', '0.00', '2018-04-12'),
(52, 69, 1, 16, 'SSS 2', '0.00', '2018-04-12'),
(53, 69, 1, 16, 'SSS 3', '0.00', '2018-04-12'),
(54, 70, 1, 16, 'JSS 1', '0.00', '2018-04-12'),
(55, 70, 1, 16, 'JSS 2', '0.00', '2018-04-12'),
(56, 70, 1, 16, 'JSS 3', '0.00', '2018-04-12'),
(57, 81, 9, 16, 'JSS 1', '0.00', '2018-04-13'),
(58, 81, 9, 16, 'JSS 2', '0.00', '2018-04-13'),
(59, 81, 9, 16, 'JSS 3', '0.00', '2018-04-13'),
(60, 81, 9, 16, 'SSS 1', '0.00', '2018-04-13'),
(61, 81, 9, 16, 'SSS 2', '0.00', '2018-04-13'),
(62, 81, 9, 16, 'SSS 3', '0.00', '2018-04-13'),
(63, 82, 9, 16, 'JSS 1', '0.00', '2018-04-13'),
(64, 82, 9, 16, 'JSS 2', '0.00', '2018-04-13'),
(65, 82, 9, 16, 'JSS 3', '0.00', '2018-04-13'),
(66, 82, 9, 16, 'SSS 1', '0.00', '2018-04-13'),
(67, 82, 9, 16, 'SSS 2', '0.00', '2018-04-13'),
(68, 82, 9, 16, 'SSS 3', '0.00', '2018-04-13'),
(69, 83, 1, 16, 'JSS 1', '0.00', '2018-04-17'),
(70, 83, 1, 16, 'JSS 2', '0.00', '2018-04-17'),
(71, 83, 1, 16, 'JSS 3', '0.00', '2018-04-17'),
(72, 83, 1, 16, 'SSS 1', '0.00', '2018-04-17'),
(73, 83, 1, 16, 'SSS 2', '0.00', '2018-04-17'),
(74, 83, 1, 16, 'SSS 3', '0.00', '2018-04-17'),
(75, 84, 9, 16, 'JSS 1', '0.00', '2018-04-17'),
(76, 84, 9, 16, 'JSS 2', '0.00', '2018-04-17'),
(77, 84, 9, 16, 'JSS 3', '10000.00', '2018-04-17'),
(78, 84, 9, 16, 'SSS 1', '0.00', '2018-04-17'),
(79, 84, 9, 16, 'SSS 2', '0.00', '2018-04-17'),
(80, 84, 9, 16, 'SSS 3', '20000.00', '2018-04-17'),
(81, 85, 9, 16, 'JSS 1', '0.00', '2018-04-17'),
(82, 85, 9, 16, 'JSS 2', '0.00', '2018-04-17'),
(83, 85, 9, 16, 'JSS 3', '0.00', '2018-04-17'),
(84, 85, 9, 16, 'SSS 1', '0.00', '2018-04-17'),
(85, 85, 9, 16, 'SSS 2', '0.00', '2018-04-17'),
(86, 85, 9, 16, 'SSS 3', '0.00', '2018-04-17'),
(87, 85, 9, 16, 'JSS 1', '0.00', '2018-04-20'),
(88, 85, 9, 16, 'JSS 2', '0.00', '2018-04-20'),
(89, 85, 9, 16, 'JSS 3', '0.00', '2018-04-20'),
(90, 85, 9, 16, 'SSS 1', '0.00', '2018-04-20'),
(91, 85, 9, 16, 'SSS 2', '0.00', '2018-04-20'),
(92, 85, 9, 16, 'SSS 3', '0.00', '2018-04-20'),
(93, 86, 10, 16, 'JSS 1', '1000.00', '2018-05-11'),
(94, 86, 10, 16, 'JSS 2', '0.00', '2018-05-11'),
(95, 86, 10, 16, 'JSS 3', '1000.00', '2018-05-11'),
(96, 86, 10, 16, 'SSS 1', '1000.00', '2018-05-11'),
(97, 86, 10, 16, 'SSS 2', '1000.00', '2018-05-11'),
(98, 86, 10, 16, 'SSS 3', '1000.00', '2018-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `forum_table`
--

CREATE TABLE `forum_table` (
  `topic_id` bigint(20) NOT NULL,
  `feeclient_id` bigint(20) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `post_time` varchar(10) NOT NULL,
  `post_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_table`
--

INSERT INTO `forum_table` (`topic_id`, `feeclient_id`, `topic`, `content`, `post_time`, `post_date`) VALUES
(1, 6, 'Hbfifbiu', 'Jkbdiubviud', '04:53 pm', '2018-05-28'),
(2, 6, 'New Post', 'Just Made Few Payment into my kid''s school account using feement\r\n', '04:54 pm', '2018-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `transact_table`
--

CREATE TABLE `transact_table` (
  `tr_id` bigint(20) NOT NULL,
  `tr_num` varchar(15) NOT NULL,
  `feeclient_id` bigint(20) NOT NULL,
  `std_id` bigint(20) NOT NULL,
  `sch_id` bigint(20) NOT NULL,
  `sch_name` varchar(200) NOT NULL,
  `pay_mtd` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tr_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transact_table`
--

INSERT INTO `transact_table` (`tr_id`, `tr_num`, `feeclient_id`, `std_id`, `sch_id`, `sch_name`, `pay_mtd`, `status`, `tr_date`) VALUES
(1, '574981690', 6, 5, 9, '', 'Card Payment', 0, '2018-05-22'),
(2, '574981690', 6, 7, 9, '', 'Card Payment', 0, '2018-05-22'),
(3, '594909668', 6, 5, 9, 'Honey Junior', 'Card Payment', 0, '2018-05-22'),
(4, '594909668', 6, 7, 9, 'Honey Junior', 'Card Payment', 0, '2018-05-22'),
(5, '451385498', 6, 5, 9, 'Honey Junior', 'Card Payment', 0, '2018-05-22'),
(6, '451385498', 6, 7, 9, 'Honey Junior', 'Card Payment', 0, '2018-05-22'),
(7, '888092041', 6, 5, 9, 'Honey Junior', 'Card Payment', 0, '2018-05-28'),
(8, '600646973', 6, 7, 9, 'Honey Junior', 'Card Payment', 0, '2018-05-28'),
(9, '642303467', 6, 5, 9, 'Honey Junior', 'Card Payment', 0, '2018-05-28'),
(10, '903442383', 6, 7, 9, 'Honey Junior', 'Card Payment', 0, '2018-05-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `feeclient_table`
--
ALTER TABLE `feeclient_table`
  ADD PRIMARY KEY (`feeclient_id`);

--
-- Indexes for table `feeschool_table`
--
ALTER TABLE `feeschool_table`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `feestudent_table`
--
ALTER TABLE `feestudent_table`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `fee_table`
--
ALTER TABLE `fee_table`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `forum_table`
--
ALTER TABLE `forum_table`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `transact_table`
--
ALTER TABLE `transact_table`
  ADD PRIMARY KEY (`tr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `cat_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `feeclient_table`
--
ALTER TABLE `feeclient_table`
  MODIFY `feeclient_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `feeschool_table`
--
ALTER TABLE `feeschool_table`
  MODIFY `sch_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `feestudent_table`
--
ALTER TABLE `feestudent_table`
  MODIFY `std_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fee_table`
--
ALTER TABLE `fee_table`
  MODIFY `fee_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `forum_table`
--
ALTER TABLE `forum_table`
  MODIFY `topic_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transact_table`
--
ALTER TABLE `transact_table`
  MODIFY `tr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
