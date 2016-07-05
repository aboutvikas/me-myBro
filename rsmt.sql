-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2016 at 10:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `email`, `pass`, `img_path`, `role`) VALUES
(1, 'Vikas Seth', 'mr.vikas.seth@gmail.com', '11', 'img/user_img/mr.vikas.seth@gmail.com.jpg', 'Admin'),
(58, 'Shanni Kumar', 'mr.shaani.kumar@gmail.com', '11', 'img/user_img/mr.shaani.kumar@gmail.com.jpg', 'Admin'),
(59, 'Neeraj Seth', 'mr.neeraj.seth@gmail.com', 'neeraj*1', 'img/user_img/mr.neeraj.seth@gmail.com.png', 'Admin'),
(60, 'Vikas Seth', 'to.vikas.seth@gmail.com', '22', 'img/user_img/to.vikas.seth@gmail.com.jpg', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `std_attend`
--

CREATE TABLE `std_attend` (
  `id` int(5) NOT NULL,
  `roll_no` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course` varchar(4) NOT NULL,
  `semester` varchar(1) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `attendance` int(2) NOT NULL,
  `total_class` int(2) NOT NULL,
  `month` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_attend`
--

INSERT INTO `std_attend` (`id`, `roll_no`, `name`, `course`, `semester`, `subject`, `attendance`, `total_class`, `month`) VALUES
(1, '1310870041', 'Viraj Gupta', 'BBA', '2', 'Mobile Computing', 11, 11, '2016-03'),
(2, '1410813021', 'Nishi Kumari', 'BBA', '2', 'Mobile Computing', 1, 11, '2016-03'),
(10, '1410814036', 'Rohit Viswakarma', 'MCA', '3', 'Entrepreneurship Development', 1, 11, '2016-06'),
(11, '1410814030', 'Neha Kumari', 'MCA', '1', 'Professional Communication', 2, 11, '2016-06'),
(13, '1410814041', 'Vikas Seth', 'MCA', '3', 'Database Management System', 1, 11, '2016-06'),
(14, '1410814036', 'Rohit Viswakarma', 'MCA', '3', 'Database Management System', 1, 11, '2016-06'),
(15, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Web Technology', 11, 11, '2016-06'),
(16, '1410814031', 'Richa Mishra', 'MCA', '4', 'Web Technology', 3, 11, '2016-06'),
(17, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Web Technology', 10, 11, '2016-06'),
(18, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Web Technology', 10, 11, '2016-08'),
(19, '1410814031', 'Richa Mishra', 'MCA', '4', 'Web Technology', 11, 11, '2016-08'),
(20, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Web Technology', 2, 11, '2016-08'),
(21, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Web Technology', 10, 11, '2016-07'),
(22, '1410814031', 'Richa Mishra', 'MCA', '4', 'Web Technology', 9, 11, '2016-07'),
(23, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Web Technology', 1, 11, '2016-07'),
(24, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Web Technology', 1, 11, '2016-05'),
(25, '1410814031', 'Richa Mishra', 'MCA', '4', 'Web Technology', 2, 11, '2016-05'),
(26, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Web Technology', 3, 11, '2016-05'),
(27, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Web Technology', 11, 12, '2016-09'),
(28, '1410814031', 'Richa Mishra', 'MCA', '4', 'Web Technology', 0, 12, '2016-09'),
(29, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Web Technology', 7, 12, '2016-09'),
(30, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Artificial Intelligence', 1, 10, '2016-01'),
(31, '1410814031', 'Richa Mishra', 'MCA', '4', 'Artificial Intelligence', 10, 10, '2016-01'),
(32, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Artificial Intelligence', 3, 10, '2016-01'),
(33, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Artificial Intelligence', 2, 14, '2016-06'),
(34, '1410814031', 'Richa Mishra', 'MCA', '4', 'Artificial Intelligence', 1, 14, '2016-06'),
(35, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Artificial Intelligence', 3, 14, '2016-06'),
(36, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Artificial Intelligence', 12, 21, '2016-05'),
(37, '1410814031', 'Richa Mishra', 'MCA', '4', 'Artificial Intelligence', 21, 21, '2016-05'),
(38, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Artificial Intelligence', 4, 21, '2016-05'),
(39, '1410814030', 'Neha Kumari', 'MCA', '1', 'Accounting & Financial Management', 11, 12, '2016-06'),
(40, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Web Technology', 12, 13, '2016-11'),
(41, '1410814031', 'Richa Mishra', 'MCA', '4', 'Web Technology', 10, 13, '2016-11'),
(42, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Web Technology', 5, 13, '2016-11'),
(45, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Management Information System', 13, 13, '2016-08'),
(46, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Client Server Computing', 10, 10, '2016-08'),
(47, '1410814031', 'Richa Mishra', 'MCA', '4', 'Client Server Computing', 7, 10, '2016-08'),
(48, '1510814041', 'Jaikisan Patel', 'MCA', '4', 'Client Server Computing', 10, 10, '2016-08'),
(49, '1410814041', 'Vikas Seth', 'MCA', '3', 'Design & Analysis of Algorithms', 11, 12, '2016-06'),
(50, '1410814036', 'Rohit Viswakarma', 'MCA', '3', 'Design & Analysis of Algorithms', 12, 12, '2016-06'),
(51, '1410814030', 'Neha Kumari', 'MCA', '1', 'Professional Communication', 11, 11, '2016-07'),
(52, '1410814013', 'Ashutosh Chitravanshi', 'MCA', '4', 'Client Server Computing', 11, 11, '2016-09'),
(53, '1410814041', 'Vikas Seth', 'MCA', '1', 'Accounting & Financial Management', 12, 14, '2016-02'),
(54, '1410814030', 'Neha Kumari', 'MCA', '1', 'Accounting & Financial Management', 14, 14, '2016-02'),
(55, '1410814038', 'Shanni Kumar', 'MCA', '2', 'Computer Based Numerical & Statistical Techniques', 12, 13, '2016-05');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `father_name` varchar(25) NOT NULL,
  `roll_no` int(25) NOT NULL,
  `course` varchar(10) NOT NULL,
  `sem` int(1) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `father_name`, `roll_no`, `course`, `sem`, `email`, `password`, `gender`, `city`, `mobile`) VALUES
(8, 'Vikas', 'Seth', 'Ashok Seth', 1410814041, 'MCA', 1, 'to.vikas.seth@gmail.com', '1', 'Male', 'Mughalsarai', '7376475771'),
(63, 'Neeraj', 'Seth', 'Ashok Seth', 1410814042, 'MBA', 5, 'mr.vikas.seth@gmail.com', '1', 'Male', 'Tustin', '4089562033'),
(73, 'Ashutosh', 'Seth', 'Bhola Nath', 1410814012, 'BCA', 1, 'ashutoshsetha669@gmail.com', 'qwer1234', 'Male', 'Mughalsarai', '7052480658'),
(74, 'Shanni', 'Kumar', 'Ram Avtar Rai', 1410814038, 'MCA', 2, 'mr.shanni.kumar@gmail.com', 'qqqqqqqq', 'Male', 'Mughalsarai', '9938687473'),
(75, 'Shubham', 'Chaurasiya', 'Surendra Chaurasiya', 1410814043, 'BCA', 3, 'to.shubham.chaurasiya@gmail.com', 'badu kumar', 'Male', 'Mughalsarai', '8382946340'),
(76, 'Ashutosh', 'Chitravanshi', 'Not filled by user', 1410814013, 'MCA', 4, 'ashutoshwebtek@gmail.com', 'ashu', 'Male', 'Varanasi', '8896250820'),
(85, 'Rohit', 'Viswakarma', 'Rajesh Viswakarma', 1410814036, 'MCA', 3, 'rohit.kumar112@gmail.com', 'rohitkumar1', 'Male', 'Varanasi', '9451212134'),
(125, 'Richa', 'Mishra', 'Ganesh Mishra', 1410814031, 'MCA', 4, 'richa.mishra@gmail.com', 'qweqweqq', 'Female', 'Varanasi', '9616433456'),
(127, 'Jaikisan', 'Patel', 'Jayram kumar', 1510814041, 'MCA', 4, 'Jaykumar11@gmail.com', '11111111', 'Male', 'Mughalsarai', '7376475771'),
(128, 'Viraj', 'Gupta', 'Rajesh Gupta', 1310870041, 'BBA', 2, 'viraj.gupta1@gmail.com', '11111111', 'Male', 'Chandauli', '9396250820'),
(132, 'Nishi', 'Kumari', 'Nagendra Kumar', 1410813021, 'BBA', 2, 'nishikumari443@gmail.com', 'asdasdaa', 'Female', 'Varanasi', '7396250820'),
(133, 'Neha', 'Kumari', 'Mahesh Kumar', 1410814030, 'MCA', 1, 'nehakumari11@gmail.com', 'password', 'Female', 'Varanasi', '9938325627'),
(134, 'Ravi', 'Kumra', 'Manoj Singh', 1210813021, 'MBA', 1, 'ravikumarqq@gmail.com', 'asdzxcas', 'Male', 'Varanasi', '7865347211'),
(135, 'Rajes', 'Kumra', 'Manoj Kumar', 1210813011, 'MBA', 1, 'ravikuma1qq@gmail.com', 'asdzxcas', 'Male', 'Varanasi', '7865347211');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(3) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `subject_name` varchar(60) NOT NULL,
  `course` varchar(3) NOT NULL,
  `sem` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `course_code`, `subject_name`, `course`, `sem`) VALUES
(1, 'NMCA-411', 'Management Information System', 'MCA', 4),
(2, 'NMCAE12', 'Client Server Computing', 'MCA', 4),
(3, 'NMCA-412', 'Web Technology', 'MCA', 4),
(4, 'NAS-104', 'Professional Communication', 'MCA', 1),
(5, 'NMCA-112', 'Accounting & Financial Management', 'MCA', 1),
(6, 'NMCA-413', 'Artificial Intelligence', 'MCA', 4),
(7, 'NMCA-414', 'Mobile Computing', 'MCA', 4),
(8, 'NMCA-113', 'Computer Concepts and Programming', 'MCA', 1),
(9, 'NMCA-114', 'Discrete Mathematics', 'MCA', 1),
(10, 'NMCA-115', 'Digital Logic Design ', 'MCA', 1),
(11, 'NAS105', 'Environment and Ecology', 'MCA', 2),
(12, 'NMCA-212', 'Computer Based Numerical & Statistical Techniques', 'MCA', 2),
(13, 'NMCA-213', 'Data Structures Using C', 'MCA', 2),
(14, 'NMCA-214', 'Introduction to Automata Theory', 'MCA', 2),
(15, 'NMCA-215', 'Computer Organization', 'MCA', 2),
(16, 'NMCA-311', 'Operating Systems', 'MCA', 3),
(17, 'NMCA-312', 'Design & Analysis of Algorithms', 'MCA', 3),
(18, 'NMCA-313', 'Database Management System', 'MCA', 3),
(19, 'NMCA-314', 'Internet & Java Programming', 'MCA', 3),
(20, 'NMCA-315', 'Computer Based Optimization Technique', 'MCA', 3),
(21, 'NMCA- 513', 'Dot Net Framework and C#', 'MCA', 5),
(22, 'NMCA-512', 'Software Engineering', 'MCA', 5),
(23, 'NMBA-011', 'Managing Organization', 'MBA', 1),
(24, 'NMBA-012', 'Managerial Economics', 'MBA', 1),
(25, 'NMBA-013', 'Business Accounting', 'MBA', 1),
(26, 'NMBA-021', 'Managing Human Resources', 'MBA', 2),
(27, 'NMBA-022', 'Business Laws', 'MBA', 2),
(28, 'NMBA-031', 'Entrepreneurship Development', 'MBA', 3),
(29, 'NMBA-032', 'International Business Management', 'MBA', 3),
(30, 'NMBA-033', 'Rural Development', 'MBA', 3),
(31, 'NMBA-041', 'Strategic Management', 'MBA', 4),
(32, 'NMBA-042', 'Insurance & Risk Management', 'MBA', 4),
(33, 'NMBA-043', 'Hospitality & Tourism Management', 'MBA', 4),
(34, 'NBCA-013', 'Computer Fundamentals and Office Automation', 'BCA', 1),
(35, 'NBCA-012', 'Programming Principle & Algorithm', 'BCA', 1),
(36, 'NBCA-011', 'Principles of Management', 'BCA', 1),
(37, 'NBCA-211', 'C Programming', 'BCA', 2),
(38, 'NBCA-212', 'Organization Behavior', 'BCA', 2),
(39, 'NBCA-313', 'Object Oriented Programming Using C++', 'BCA', 3),
(40, 'NBCA-312', 'Data Structure Using C & C++', 'BCA', 3),
(41, 'NBCA-412', 'Mathematics-III', 'BCA', 4),
(42, 'NBCA-413', 'Software Engineering', 'BCA', 4),
(43, 'NBCA-511', 'Introduction to DBMS', 'BCA', 5),
(44, 'NBCA-512', 'Page Design', 'BCA', 5),
(45, 'NBCA-612', 'Computer Network Security', 'BCA', 6),
(46, 'NBCA-613', 'VAT & Service Tax', 'BCA', 6),
(47, 'NBBA-011', 'Business Organization', 'BBA', 1),
(48, 'NBBA-012', 'Business Mathematics', 'BBA', 1),
(49, 'NBBA-212', 'Business Environment', 'BBA', 2),
(50, 'NBBA-213', 'Business Communication', 'BBA', 2),
(51, 'NBBA-313', 'Advertising Management', 'BBA', 3),
(52, 'NBBA-314', 'Indian Banking System', 'BBA', 3),
(53, 'NBBA-411', 'Consumer Behavior', 'BBA', 4),
(54, 'NBBA-511', 'Managerial Economics', 'BBA', 5),
(55, 'NBBA-612', 'International Trade', 'BBA', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Vikas Seth', 'to.vikas.seth@gmail.com', 'Fee of MCA 1st Semeter', 'Sir please tell me fees of MCA 1st semester fee.'),
(2, 'Ashutosh Chitravanshi', 'aranagpt@gmail.com', 'Fee of MCA 1st Semeter', 'none'),
(3, 'Ashutosh Chitravanshi', 'aranagpt@gmail.com', 'Fee of MCA 1st Semeter', 'none'),
(4, 'Pappu Kumar', 'mr.abhishekseth@gmail.com', 'regarding mca 2nd sem fee', 'Sir please tell me mca 2nd sem fee'),
(5, 'Vikas Seth', 'aranagpt@gmail.com', 'Fee of MCA 1st Semeter', 'hELHDSF'),
(6, 'Vikas Seth', 'to.vikas.seth@gmail.com', 'Fee of MCA 1st Semeter', 'Sir hjgdh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `std_attend`
--
ALTER TABLE `std_attend`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `std_attend`
--
ALTER TABLE `std_attend`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
