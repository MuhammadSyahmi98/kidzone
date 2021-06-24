-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2021 at 06:15 AM
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
  `content_img` varchar(80) DEFAULT NULL,
  `content_subject_name` varchar(30) NOT NULL,
  `content_level` varchar(30) NOT NULL,
  `content_description` varchar(255) NOT NULL,
  `content_created` date NOT NULL,
  `content_updated` date DEFAULT NULL,
  `content_status` varchar(30) DEFAULT 'Not Completed',
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_img`, `content_subject_name`, `content_level`, `content_description`, `content_created`, `content_updated`, `content_status`, `instructor_id`) VALUES
(1, 'bm1.png', 'Bahasa Melayu', '1', 'Bahasa Melayu is one of the dialects of the hundreds of other dialects found in Nusantara (the Malay world). Selection of the Malay language as the national language whether in Indonesia, Malaysia and Brunei are not made arbitrarily. It was chosen mainly ', '2021-08-08', '2021-06-24', 'Not Completed', 1),
(2, 'bi1.jpg', 'Bahasa Inggeris', '1', 'Bahasa Inggeris is a West Germanic language that is the dominant language in the United Kingdom, the United States, most Commonwealth countries including Australia and Canada, and other former British colonies. It is also the dominant or official language', '2021-08-08', '2021-06-10', 'Not Completed', 2),
(3, 'sc1.jpg', 'Science & Technology', '1', 'Science encompasses the systematic study of the structure and behaviour of the physical and natural world through observation and experiment, and technology is the application of scientific knowledge for practical purposes. ', '2021-08-08', '2021-08-08', 'Not Completed', 3),
(4, 'pjk1.jpg', 'Physical education and Health', '1', 'Physical Education is education through the physical. It aims to develop students’ physical competence and knowledge of movement and safety, and their ability to use these to perform in a wide range of activities associated with the development of an ac', '2021-08-08', '2021-08-08', 'Not Completed', 4),
(5, 'pii1.jpg', 'Pendidikan Islam', '1', 'Islamic education is built to meet the needs of Islamic education in a holistic, integrated and evolving as well as is authentic in line with the requirements of the National Philosophy of Education and the Philosophy of Islamic Education introduced in th', '2021-08-08', '2021-08-08', 'Not Completed', 5),
(6, 'mat1.png', 'Mathematics', '1', 'Mathematics the study of numbers, shapes, and space using reason and usually a special system of symbols and rules for organizing them.', '2021-08-08', '2021-08-08', 'Not Completed', 6),
(9, 'pk1.jpg', 'Muzic Education', '1', 'Music is universal. A study from Harvard University revealed that music actually has a unique set of codes and patterns that everyone can understand.', '2021-08-08', '2021-08-08', 'Not Completed', 7),
(10, 'baaa1.jpg', 'Bahasa Arab', '1', 'Arabic is the language of the Quran. This is one of the main reasons we have to learn Arabic.', '2021-08-08', '2021-08-08', 'Not Completed', 8),
(18, 'bm2.png', 'Bahasa Melayu', '2', 'Bahasa Melayu is one of the dialects of the hundreds of other dialects found in Nusantara (the Malay world). Selection of the Malay language as the national language whether in Indonesia, Malaysia and Brunei are not made arbitrarily. It was chosen mainly ', '2021-08-08', '2021-08-08', 'Not Completed', 9),
(19, 'bi2.png', 'Bahasa Inggeris', '2', 'Bahasa Inggeris is a West Germanic language that is the dominant language in the United Kingdom, the United States, most Commonwealth countries including Australia and Canada, and other former British colonies. It is also the dominant or official language', '2021-08-08', '2021-08-08', 'Not Completed', 10),
(20, 'mat2.png', 'Mathematics', '2', 'Mathematics the study of numbers, shapes, and space using reason and usually a special system of symbols and rules for organizing them.', '2021-08-08', '2021-08-08', 'Not Completed', 11),
(21, 'pi2.jpg', 'Pendidikan Islam', '2', 'Islamic education is built to meet the needs of Islamic education in a holistic, integrated and evolving as well as is authentic in line with the requirements of the National Philosophy of Education and the Philosophy of Islamic Education introduced in th', '2021-08-08', '2021-08-08', 'Not Completed', 14),
(22, 'pm2.png', 'Pendidikan Moral', '2', 'Moral education to form a young generation that always practices pure values ??in their lives', '2021-08-08', '2021-08-08', 'Not Completed', 13),
(23, 'pjk2.jpg', 'Pendidikan Jasmani ', '2', 'Physical Education is education through the physical. It aims to develop students’ physical competence and knowledge of movement and safety, and their ability to use these to perform in a wide range of activities associated with the development of an ac', '2021-08-08', '2021-08-08', 'Not Completed', 12),
(28, 'bm3.jpg', 'Bahasa Melayu', '3', 'Bahasa Melayu is one of the dialects of the hundreds of other dialects found in Nusantara (the Malay world). Selection of the Malay language as the national language whether in Indonesia, Malaysia and Brunei are not made arbitrarily. It was chosen mainly ', '2021-08-08', '2021-08-08', 'Not Completed', 15),
(29, 'mat3.jpg', 'Mathematics', '3', 'Mathematics the study of numbers, shapes, and space using reason and usually a special system of symbols and rules for organizing them.', '2021-08-08', '2021-08-08', 'Not Completed', 19),
(30, 'rbt.jpg', 'Reka Bentuk', '3', 'The main purpose of instructional design is to produce effective instruction to enable students to acquire the skills, knowledge and attitudes that are expected and preferred by students.', '2021-08-08', '2021-08-08', 'Not Completed', 17),
(31, 'sc3.png', 'Science', '3', 'Science encompasses the systematic study of the structure and behaviour of the physical and natural world through observation and experiment, and technology is the application of scientific knowledge for practical purposes. ', '2021-08-08', '2021-08-08', 'Not Completed', 20),
(32, 'bi.png', 'Bahasa Inggeris', '5', 'Bahasa Inggeris is a West Germanic language that is the dominant language in the United Kingdom, the United States, most Commonwealth countries including Australia and Canada, and other former British colonies. It is also the dominant or official language', '2021-08-08', '2021-08-08', 'Not Completed', 16),
(33, 'bm5.jpg', 'Bahasa Melayu', '5', 'Bahasa Melayu is one of the dialects of the hundreds of other dialects found in Nusantara (the Malay world). Selection of the Malay language as the national language whether in Indonesia, Malaysia and Brunei are not made arbitrarily. It was chosen mainly ', '2021-08-08', '2021-08-08', 'Not Completed', 18),
(34, 'mat5.jpg', 'Mathematics', '5', 'Mathematics the study of numbers, shapes, and space using reason and usually a special system of symbols and rules for organizing them.', '2021-08-08', '2021-08-08', 'Not Completed', 24),
(35, 'sej5.jpg', 'Sejarah', '5', 'History is a branch of science that systematically examines the entire development, process of change or dynamics of society\'s life with all aspects of life that occurred in the past.', '2021-08-08', '2021-08-08', 'Not Completed', 21),
(36, 'mat.jpg', 'Mathematics', '6', 'Mathematics the study of numbers, shapes, and space using reason and usually a special system of symbols and rules for organizing them.', '2021-08-08', '2021-08-08', 'Not Completed', 25),
(37, 'bm6.jpg', 'Bahasa Melayu', '6', 'Bahasa Melayu is one of the dialects of the hundreds of other dialects found in Nusantara (the Malay world). Selection of the Malay language as the national language whether in Indonesia, Malaysia and Brunei are not made arbitrarily. It was chosen mainly ', '2021-08-08', '2021-08-08', 'Not Completed', 22),
(38, 'bi.png', 'Bahasa Inggeris', '6', 'Bahasa Inggeris is a West Germanic language that is the dominant language in the United Kingdom, the United States, most Commonwealth countries including Australia and Canada, and other former British colonies. It is also the dominant or official language', '2021-08-08', '2021-08-08', 'Not Completed', 27),
(39, 'sc6.jpg', 'Science', '6', 'Science encompasses the systematic study of the structure and behaviour of the physical and natural world through observation and experiment, and technology is the application of scientific knowledge for practical purposes. ', '2021-08-08', '2021-08-08', 'Not Completed', 31),
(40, 'sej6.jpg', 'Sejarah', '6', 'History is a branch of science that systematically examines the entire development, process of change or dynamics of society\'s life with all aspects of life that occurred in the past.', '2021-08-08', '2021-08-08', 'Not Completed', 28),
(41, 'pi6.jpg', 'Pendidikan Islam', '6', 'Islamic education is built to meet the needs of Islamic education in a holistic, integrated and evolving as well as is authentic in line with the requirements of the National Philosophy of Education and the Philosophy of Islamic Education introduced in th', '2021-08-08', '2021-08-08', 'Not Completed', 30),
(45, 'bm4.jpg', 'Bahasa Melayu', '4', 'Bahasa Melayu is one of the dialects of the hundreds of other dialects found in Nusantara (the Malay world). Selection of the Malay language as the national language whether in Indonesia, Malaysia and Brunei are not made arbitrarily. It was chosen mainly ', '2021-08-08', '2021-08-08', 'Not Completed', 26),
(46, 'ba4.jpg', 'Bahasa Arab', '4', 'Arabic is the language of the Quran. This is one of the main reasons we have to learn Arabic.', '2021-08-08', '2021-08-08', 'Not Completed', 34),
(47, 'mat4.png', 'Mathematics', '4', 'Mathematics the study of numbers, shapes, and space using reason and usually a special system of symbols and rules for organizing them.', '2021-08-08', '2021-08-08', 'Not Completed', 33),
(48, 'sc4.jpg', 'Science', '4', 'Science encompasses the systematic study of the structure and behaviour of the physical and natural world through observation and experiment, and technology is the application of scientific knowledge for practical purposes. ', '2021-08-08', '2021-08-08', 'Not Completed', 32),
(49, 'sej4.png', 'Sejarah', '4', 'History is a branch of science that systematically examines the entire development, process of change or dynamics of society\'s life with all aspects of life that occurred in the past.', '2021-08-08', '2021-08-08', 'Not Completed', 35),
(50, NULL, 'Mathematics', '6', 'This ', '2021-06-23', NULL, 'Not Completed', 1);

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
  `instructor_qualification` varchar(80) NOT NULL DEFAULT 'Degree',
  `instructor_pic_path` varchar(80) DEFAULT 'default.png',
  `instructor_path_file` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_name`, `instructor_email`, `instructor_password`, `instructor_ic`, `instructor_phone_number`, `instructor_quotes`, `instructor_qualification`, `instructor_pic_path`, `instructor_path_file`) VALUES
(1, 'Aishah binti Karim', 'aishah95@gmail.com', 'aish123', '950505075016', '0123456781', 'The best teachers teach from the heart, not from the book', 'Degree', '1923152308_950505075016.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(2, 'Alya Farissa Binti Azman', 'alya@gmail.com', 'alya123', '920101032088', '0197863524', 'Remember that failure is an event, not a person', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(3, 'Priya Kanchini ', 'piya@gmail.com', 'piya123', '900501075034', '0178553243', 'Education is not the filling of a pail, but the lighting of a fire', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(4, 'Muhammad Farid Bin Jayatan', 'farid@gmail.com', 'farid123', '900605025817', '0126745821', 'When one teaches, two learn', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(5, 'Maisarah binti Mazlan', 'mai94@gmail.com', 'mai123', '940314025078', '0196675423', 'Those who know, do. Those that understand, teach.', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(6, 'Ramdan bin Khyle', 'ramdan@gmail.com', 'ramdan123', '940910045327', '0187763524', 'In learning you will teach, and in teaching you will learn.', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(7, 'Johan bin Rostam', 'johan93@gmail.com', 'johan123', '930906072053', '0142748449', 'Teaching is not a lost art, but the regard for it is a lost tradition.', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(8, 'Wahidah binti Imran', 'wahidah@gmail.com', 'wahid123', '920604043088', '0187627924', 'Real learning comes about when the competitive spirit has ceased.', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(9, 'Juhaila binti Md Nor', 'ju90@gmail.com', 'ju123', '900122025064', '0123763847', 'Teaching is the highest form of understanding', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(10, 'Yusra binti Gaus', 'yus@gmail.com', 'yus123', '870303045072', '0186625247', 'The best teachers are the ones that change their minds', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(11, 'Puteri Rania binti Sulaiman', 'rania@gmail.com', 'rania123', '950217074098', '0173264751', 'Teaching is the one profession that creates all other professions', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(12, 'Fakrul bin Ahmed', 'fakrul@gmail.com', 'fakrul123', '970812036911', '0198437467', 'To know how to suggest is the art of teaching', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(13, 'Chong Yee ', 'chong@gmail.com', 'chong123', '950809045783', '0168232849', 'There is no failure. Only feedback', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(14, 'Musa bin Rosli', 'musa@gmail.com', 'musa123', '790202045907', '0136374284', 'It takes a big heart to help shape little minds', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(15, 'Dian Hanani binti Daniel ', 'nani@gmail.com', 'nani123', '950909045368', '0162738221', 'I am not a teacher, but an awakener', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(16, 'Zaitun binti Roslan', 'eton@gmail.com', 'eton123', '800313076088', '0198365472', 'I am not a teacher, but an awakener', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(17, 'Zahiril bin Adam', 'zah@gmail.com', 'zahiril123', '920828075933', '01162742874', 'The job of an educator is to teach students to see vitality in themselves.', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(18, 'Hamdan bin Taher', 'amdan@gmail.com', 'amdan123', '900123045621', '0174824292', 'The meaning of life is to find your gift. The purpose of life is to give it away.', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(19, 'Qayyum bin Johari', 'qayyum@gmail.com', 'qayyum123', '940123038997', '0134247248', 'The secret in education lies in respecting the student', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(20, 'Munirah binti Ramli', 'mun@gmail.com', 'mun123', '901201034242', '0174294279', 'Children are likely to live up to what you believe of them', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(21, 'Roslinda binti Toib', 'linda@gmail.com', 'linda123', '930313023894', '0143852959', 'Intelligence plus character', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(22, 'Aimi binti Anwar', 'aimi@gmail.com', 'aimi123', '920606023438', '013-232332', 'Great teachers empathize with kids', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(23, 'Ruwaidah binti Zainal', 'idah@gmail.com', 'idah123', '880406013428', '0182495259', 'One looks back with appreciation to the brilliant teachers.', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(24, 'Haqiem binti Rusli', 'aqiem@gmail.com', 'aqiem123', '930817023381', '0142748449', 'Education is the passport to the future', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(25, 'Jaafar bin Daud', 'jekfer@gmail.com', 'jekfer123', '920101045433', '0187627924', 'The good teacher explains', 'Degree', 'default.png', 'B031810288_mind_mapping_920606023438.pdf'),
(26, 'Saleh bin Hamzah', 'saleh@gmail.com', 'saleh123', '911220045211', '0123763847', 'Tomorrow belongs to those who prepare for it today.', 'Degree', 'c35.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(27, 'Roy Potter', 'roy@gmail.com', 'roy123', '930202045831', '0197863524', '', 'Degree', 'c41.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(28, 'Iskandar bin Lazim', 'iskandar@gmail.com', 'iskandar123', '921204075049', '0121424214', 'Those who know, do. Those that understand, teach.', 'Degree', 'c40.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(29, 'Yusri bin Yusof', 'yusri@gmail.com', 'yusri123', '850120035693', '0185637562', 'In learning you will teach, and in teaching you will learn.', 'Degree', 'c37.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(30, 'Wadi bin Anuar', 'wadi@gmail.com', 'wadi123', '820505043197', '0182463759', 'Real learning comes about when the competitive spirit has ceased', 'Degree', 'c21.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(31, 'Azri bin Azman', 'azri@gmail.com', 'azri124', '790402045903', '0137428479', 'Teaching is not a lost art, but the regard for it is a lost tradition.', 'Degree', 'c24.png', 'B031810288_mind_mapping_920606023438.pdf'),
(32, 'Khaira binti Jun', 'aira@gmail.com', 'aira123', '860516075094', '0198374827', 'Experience teaches only the teachable.', 'Degree', 'c34.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(33, 'Umi binti Yahya', 'umi@gmail.com', 'umi123', '870707012788', '0162537240', 'No one learns as much about a subject as one who is forced to teach it.', 'Degree', 'c29.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(34, 'Harun bin Hussin', 'harun@gmail.com', 'harun123', '820405067891', '0148623849', 'The object of teaching a child is to enable him to get along without a teacher.', 'Degree', 'c22.jpg', 'B031810288_mind_mapping_920606023438.pdf'),
(35, 'Sarah binti Fatah', 'sarah@gmail.com', 'sarah123', '900313067932', '0147828491', 'Positive expectations are the mark of the superior personality', 'Degree', 'c33.jpg', 'B031810288_mind_mapping_920606023438.pdf');

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
(1, '1. What Really Matters In This Section_1.mp4', 'Test', '2021-06-24', NULL, 1);

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
(1, 1, 'Introduction', '2021-06-23', 1);

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
  `staff_password` varchar(80) NOT NULL,
  `staff_pic_path` varchar(80) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_email`, `staff_ic`, `staff_phone_number`, `staff_password`, `staff_pic_path`) VALUES
(1, 'Muhammad Syahmi Bin Abdul Jalil', 'syahmijalil12@gmail.com', '990422-02-5094', '012-6518626', 'QTJMUiVa', '1482253955_990422-02-5095.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(80) NOT NULL,
  `student_email` varchar(80) NOT NULL,
  `student_passwod` varchar(80) NOT NULL,
  `student_ic` varchar(30) NOT NULL,
  `student_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_email`, `student_passwod`, `student_ic`, `student_date`) VALUES
(1, 'Ahmad', 'ahamd@gmail.com', '12345', '001202-02-8723', '2021-06-01'),
(2, 'Muhammad Atan', 'syahmijalil12@gmail.com', 'Syahmi@12', '001202-02-8722', '2021-06-10'),
(3, 'Abdul Jalil', 'abduljalil@gmail.com', '12345', '120202-02-5422', '2021-06-10'),
(4, 'Alia Syahirah', 'yus@gmail.com', 'Syahmi@12', '100123-02-2302', '2021-06-23');

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
-- Dumping data for table `subject_enrolled`
--

INSERT INTO `subject_enrolled` (`subject_enrolled_id`, `subject_enrolled_created`, `subject_enrolled_status`, `subject_enrolled_completed`, `student_id`, `content_id`) VALUES
(9, '2021-06-22', 'Not Completed', '3', 2, 1),
(10, '2021-06-24', 'Not Completed', '1', 2, 18),
(11, '2021-06-24', 'Not Completed', '1', 2, 2);

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
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject_enrolled`
--
ALTER TABLE `subject_enrolled`
  MODIFY `subject_enrolled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
