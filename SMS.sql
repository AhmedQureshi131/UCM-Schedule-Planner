-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2020 at 06:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(20) NOT NULL,
  `course_abrv` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `credit_hours` varchar(50) NOT NULL,
  `major` varchar(100) NOT NULL,
  `minor` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `fall` varchar(50) NOT NULL DEFAULT 'Available',
  `spring` varchar(50) NOT NULL DEFAULT 'Not Available',
  `campus` varchar(50) NOT NULL DEFAULT 'Warrensburg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_abrv`, `course_name`, `credit_hours`, `major`, `minor`, `category`, `fall`, `spring`, `campus`) VALUES
(1, 'CS 1100', 'Computer Programming I', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Available', 'Warrensburg'),
(2, 'CS 1110', 'Computer Programming II', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Available', 'Warrensburg'),
(3, 'CS 2300', 'Data Structures', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Lee Summit'),
(4, 'CS 2400', 'Discrete Structures', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg'),
(5, 'CS 3100', 'Programming Languages', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg'),
(6, 'CS 3200', 'Computer Organization and Architecture', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg'),
(7, 'CS 3500', 'C and UNIX Environment', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg'),
(8, 'CS 3910', 'Software Engineering', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg'),
(10, 'CS 4500', 'Operating Systems', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg'),
(11, 'CS 4600', 'Database Theory and Applications', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg/Lee Summit'),
(12, 'CS 4820', 'Introduction to Information Assurance', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg'),
(13, 'CS 4920', 'Senior Project', '3', 'Computer Science', 'Computer Science', 'Core', 'Available', 'Not Available', 'Warrensburg'),
(14, 'MATH 2153', 'Calculus and Analytic Geometry', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(15, 'MATH 2221', 'Foundations of Geometry', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(16, 'MATH 3151', 'Differential Equations', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(17, 'MATH 3710', 'Linear Algebra', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(18, 'MATH 4450', 'Introduction to Graph Theory', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(19, 'ACST 2310', 'Statistics and Data Analysis', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(20, 'ACST 3311', 'Introduction to Mathematical Statistics', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(21, 'BIOL 1110', 'Principles of Biology', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(22, 'BIOL 2010', 'Human Biology', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(23, 'BIOL 2510', 'Basic Genetics', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(24, 'BIOL 4102', 'Evolution', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(25, 'EASC 3010', 'Environment Geology', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(26, 'EASC 3112', 'Astronomy', '3', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(27, 'BIOL 1111', 'Plant Biology', '4: 3 lecture, 1 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(28, 'BIOL 1112', 'Animal Biology', '4: 3 lecture, 1 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(29, 'CHEM 1131', 'General Chemistry I GE', '5: 5 lecture, 0 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(30, 'CHEM 1132', 'General Chemistry II', '5: 5 lecture, 0 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(31, 'EASC 1004', 'Introduction to Geology GE', '4: 3 lecture, 1 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(32, 'EASC 1114', 'Weather and Climate GE', '4: 3 lecture, 1 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(33, 'EASC 2100', 'Engineering Geology', '4: 3 lecture, 1 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(34, 'EASC 2200', 'Historical Geology', '4: 3 lecture, 1 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(35, 'EASC 4300', 'Earth Resources', '4: 3 lecture, 1 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(36, 'PHYS 1101', 'College Physics I GE', '4: 4 lecture, 0 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(37, 'PHYS 2121', 'University Physics I GE', '5: 5 lecture, 0 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(38, 'PHYS 1102', 'College Physics II', '4: 4 lecture, 0 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg'),
(39, 'PHYS 2122', 'University Physics II', '5: 5 lecture, 0 lab', 'Computer Science', 'Computer Science', 'Elective', 'Available', 'Not Available', 'Warrensburg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `student_id` int(12) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` text NOT NULL DEFAULT 'Upload Your Image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `student_id`, `f_name`, `l_name`, `password`, `email`, `img`) VALUES
(130, 700650269, 'Ahmed', 'Qureshi', 'YWhtZWQxMzE=', 'axq02670@ucmo.edu', '82756824_200001984377710_133632427036770304_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resetPasswords`
--

CREATE TABLE `resetPasswords` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resetPasswords`
--

INSERT INTO `resetPasswords` (`id`, `code`, `email`) VALUES
(32, '15ea85fd045c6a', ''),
(33, '15ea85fe1e97fa', ''),
(36, '15eaca271e900c', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `rollno` int(15) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `year` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `course_abre` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `rollno`, `semester`, `year`, `category`, `course_abre`, `course_name`) VALUES
(24, 700650269, 'Spring', 2020, 'Core', 'CS 4500', 'Operating System'),
(26, 700650269, 'Spring', 2020, 'Core', 'CS 2300', 'Data Structure'),
(27, 700650269, 'Spring', 2020, 'Elective', 'MATH 3710', 'Linear Algebra'),
(28, 700650269, 'Fall', 2020, 'GER', 'COMM 1000', 'Public Speaking'),
(29, 700650269, 'Spring', 2020, 'Elective', 'EASC 1114', 'Weather and Climate'),
(31, 700650269, 'Fall', 2020, 'Core', 'CS 2400', 'Discrete Structures'),
(32, 700650269, 'Fall', 2020, 'Core', 'CS 3100', 'Programming Languages');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetPasswords`
--
ALTER TABLE `resetPasswords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `resetPasswords`
--
ALTER TABLE `resetPasswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
