-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2021 at 07:36 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content_subject_name` varchar(30) NOT NULL,
  `content_level` varchar(30) NOT NULL,
  `content_description` varchar(255) NOT NULL,
  `content_created` date NOT NULL,
  `content_updated` date DEFAULT NULL,
  `content_status` varchar(30) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_subject_name`, `content_level`, `content_description`, `content_created`, `content_updated`, `content_status`, `instructor_id`) VALUES
(1, 'Mathematics', '1', 'Test', '2021-06-02', NULL, 'Not Completed', 1),
(2, 'Mathematics', '2', 'edfsdfsdfsdfsdf', '2021-06-02', NULL, 'Not Completed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `instructor_name` varchar(80) NOT NULL,
  `instructor_email` varchar(80) NOT NULL,
  `instructor_password` varchar(80) NOT NULL,
  `instructor_ic` varchar(30) NOT NULL,
  `instructor_phone_number` varchar(30) NOT NULL,
  `instructor_quotes` varchar(255) DEFAULT NULL,
  `instructor_qualification` varchar(80) NOT NULL,
  `instructor_pic_path` varchar(80) DEFAULT 'ahmed.png',
  `instructor_path_file` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_name`, `instructor_email`, `instructor_password`, `instructor_ic`, `instructor_phone_number`, `instructor_quotes`, `instructor_qualification`, `instructor_pic_path`, `instructor_path_file`) VALUES
(1, 'Muhammad Syahmi Bin Abdul Jalil', 'attendancesystem.my@gmail.com', 'KmstLLdf', '990422-02-5095', '012-6518626', NULL, 'Degree', 'ahmed.png', 'Mintos I Data Table (1)_dsd.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `resource_path` varchar(80) NOT NULL,
  `resource_description` varchar(255) NOT NULL,
  `resource_created` date NOT NULL,
  `resource_updated` date DEFAULT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_path`, `resource_description`, `resource_created`, `resource_updated`, `section_id`) VALUES
(1, '2020-10-15 15-27-43_1.mkv', 'asdasddasdasdasd', '2021-06-03', NULL, 1),
(3, '2021-05-20 21-21-04_2.mkv', 'Testing part 2', '2021-06-03', NULL, 2),
(4, '2021-05-20 21-51-33_1.mkv', 'Testing 2', '2021-06-03', NULL, 1),
(5, 'test_4.mkv', 'This video for testing purpose', '2021-06-03', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_number` int(11) NOT NULL,
  `section_name` varchar(80) NOT NULL,
  `section_created` date NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_number`, `section_name`, `section_created`, `content_id`) VALUES
(1, 1, 'Introduction', '2021-06-03', 1),
(2, 2, 'Add and Minus Operatiion', '2021-06-03', 1),
(3, 3, 'Divide And Multiple', '2021-06-03', 1),
(4, 1, 'Introduction', '2021-06-03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(80) NOT NULL,
  `staff_email` varchar(80) NOT NULL,
  `staff_ic` varchar(30) NOT NULL,
  `staff_phone_number` varchar(30) NOT NULL,
  `staff_password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_email`, `staff_ic`, `staff_phone_number`, `staff_password`) VALUES
(1, 'Muhammad Syahmi Bin Abdul Jalil', 'syahmijalil12@gmail.com', '600728016427', '0126518626', 'GMl008CA'),
(2, 'Muhammad Syahmi Bin Abdul Jalil', 'kampungserom3@gmail.com', '600728016427', '0126518626', 'CLxU8Qtj');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(80) NOT NULL,
  `student_email` varchar(80) NOT NULL,
  `student_passwod` varchar(80) NOT NULL,
  `student_ic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_enrolled`
--

CREATE TABLE `subject_enrolled` (
  `subject_enrolled_id` int(11) NOT NULL,
  `subject_enrolled_created` date NOT NULL,
  `subject_enrolled_status` varchar(30) NOT NULL,
  `subject_enrolled_completed` varchar(30) NOT NULL,
  `student_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject_enrolled`
--
ALTER TABLE `subject_enrolled`
  ADD PRIMARY KEY (`subject_enrolled_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `content_id` (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_enrolled`
--
ALTER TABLE `subject_enrolled`
  MODIFY `subject_enrolled_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`);

--
-- Constraints for table `subject_enrolled`
--
ALTER TABLE `subject_enrolled`
  ADD CONSTRAINT `subject_enrolled_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `subject_enrolled_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
