-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 12:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `fee`, `description`) VALUES
(1, 'Web Programming', '4000.00', 'Sample description about this subject. This is test description for web programming'),
(2, 'Data Science', '5000.00', 'Sample description about this subject. This is test description for data science'),
(3, 'Mathematics For ICT', '4000.00', 'Sample description about this subject. This is test description for Maths'),
(5, 'Python', '4000.00', 'Sample description about this subject. This is test description for python'),
(7, 'IOT', '3000.00', 'Sample description about this subject. This is test description for IOT'),
(8, 'Software Development', '5000.00', 'Sample description about this subject. This is test description for data science'),
(10, 'UI & UX Design', '3000.00', 'Sample description about this subject. This is test description for data science');

-- --------------------------------------------------------

--
-- Table structure for table `course_payment_status`
--

CREATE TABLE `course_payment_status` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_payment_status`
--

INSERT INTO `course_payment_status` (`id`, `student_id`, `course_id`, `status`) VALUES
(1, 4, 3, 1),
(2, 4, 1, 1),
(3, 4, 2, 1),
(4, 4, 5, 1),
(5, 1, 1, 1),
(6, 1, 5, 1),
(7, 1, 2, 1),
(8, 1, 3, 1),
(9, 2, 1, 1),
(10, 3, 2, 1),
(11, 3, 3, 1),
(12, 3, 5, 1),
(13, 3, 7, 1),
(14, 5, 1, 1),
(15, 5, 2, 1),
(16, 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `link` text,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `date`, `time`, `link`, `course_id`) VALUES
(1, '2023-11-15', '01:46:29', 'https://zoom.us', 2),
(8, '2023-11-15', '03:44:25', 'https://zoom.us', 1),
(9, '2023-11-15', '03:44:26', 'https://zoom.us', 2),
(10, '2023-11-20', '19:00:00', 'https://zoom.us', 1),
(11, '2023-11-23', '17:00:00', 'https://www.google.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `note_file`
--

CREATE TABLE `note_file` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `path` text,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `note_file`
--

INSERT INTO `note_file` (`id`, `name`, `description`, `path`, `course_id`) VALUES
(3, 'note01', 'test document file', 'uploads/notes/note01.pdf', 1),
(4, 'note02', 'test doc', 'uploads/notes/note02.pdf', 1),
(5, 'Class One', 'https://www.google.com/maps/@-0.6223895,37.2450829,15z?entry=ttu', 'uploads/notes/Class One.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `contact`, `email`, `password`, `status`) VALUES
(1, 'Nipun', 'an', '0785522888', 'anuradha.studeo@gmail.com', '12345678', 'active'),
(2, 'Nipun', 'Anuradha', '0778855888', 'studeo@gmail.com', '12345678', 'active'),
(3, 'sname', 'slnamee', '0785522111', 's@hotmail.com', '12345678', 'active'),
(4, 'Comfort ', 'Wanjiru', '0757792029', 'jackimmbuya@gmail.com', '12345678', 'inactive'),
(5, 'Hassan', 'Abdul', '0757792029', 'hassanadamabdul@gmail.com', '123456789', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student_has_course`
--

CREATE TABLE `student_has_course` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_has_course`
--

INSERT INTO `student_has_course` (`student_id`, `course_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(2, 1),
(3, 2),
(3, 3),
(3, 5),
(3, 7),
(4, 1),
(4, 2),
(4, 3),
(4, 5),
(5, 1),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fname`, `lname`, `contact`, `email`, `password`, `status`, `course_id`) VALUES
(1, 'kavi', 'nipu', '0778877888', 'a@gmail.com', '12345678', 'active', 1),
(2, 't2', 't2', '0778888998', 't2@gmail.com', '12345678', 'active', 2),
(3, 'new', 'teacher', '0776699852', 'newteacher@gmail.com', '12345678', 'active', 7);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_payment_status`
--
ALTER TABLE `course_payment_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lecture_course1_idx` (`course_id`);

--
-- Indexes for table `note_file`
--
ALTER TABLE `note_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_note_file_course1_idx` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_has_course`
--
ALTER TABLE `student_has_course`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `fk_student_has_course_course1_idx` (`course_id`),
  ADD KEY `fk_student_has_course_student1_idx` (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teacher_course_idx` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_payment_status`
--
ALTER TABLE `course_payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `note_file`
--
ALTER TABLE `note_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_payment_status`
--
ALTER TABLE `course_payment_status`
  ADD CONSTRAINT `course_payment_status_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `course_payment_status_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `fk_lecture_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `note_file`
--
ALTER TABLE `note_file`
  ADD CONSTRAINT `fk_note_file_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `student_has_course`
--
ALTER TABLE `student_has_course`
  ADD CONSTRAINT `fk_student_has_course_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_student_has_course_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
