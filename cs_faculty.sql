-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 09:24 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `rank` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `name`, `rank`) VALUES
(3, 'Nevena Belberova', 'Professor'),
(30, 'John Travolta', 'Assistant Professor'),
(31, 'fdfdf', 'Assistant Professor');

-- --------------------------------------------------------

--
-- Table structure for table `academic_course`
--

CREATE TABLE `academic_course` (
  `id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_course`
--

INSERT INTO `academic_course` (`id`, `academic_id`, `course_id`) VALUES
(2, 3, 4),
(4, 30, 24),
(5, 3, 25),
(7, 30, 27),
(9, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `credit`) VALUES
(1, 'Mathematics2.1', 11),
(4, 'OOP', 9),
(24, 'Data Structures1', 6),
(25, 'gfgfY - edited', 13),
(27, 'Mathematics', 18);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`) VALUES
(12, 'Petar Belberov'),
(13, 'Tsveta Petrishka'),
(46, 'fdfdfd - edited');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `student_id`, `course_id`) VALUES
(1, 12, 1),
(2, 12, 24),
(3, 13, 4),
(110, 13, 24),
(121, 12, 4),
(123, 12, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_course`
--
ALTER TABLE `academic_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_course_ibfk_1` (`academic_id`),
  ADD KEY `academic_course_ibfk_2` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_course_ibfk_1` (`course_id`),
  ADD KEY `student_course_ibfk_2` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `academic_course`
--
ALTER TABLE `academic_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_course`
--
ALTER TABLE `academic_course`
  ADD CONSTRAINT `academic_course_ibfk_1` FOREIGN KEY (`academic_id`) REFERENCES `academic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `academic_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
