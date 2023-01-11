-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 11:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `Chatid` int(50) NOT NULL,
  `Courseid` varchar(50) NOT NULL,
  `senderId` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`Chatid`, `Courseid`, `senderId`, `message`) VALUES
(2, '24', '11', 'ljnsald'),
(3, '24', '14', 'what is jax'),
(4, '24', '14', 'what is jax'),
(5, '24', '14', 'why php'),
(6, '24', '14', 'why php'),
(7, '24', '17', 'why php'),
(8, '24', '16', 'why php'),
(9, '24', '14', 'jjsdlbsd'),
(10, '24', '14', 'jshd'),
(15, '24', '14', 'who are you'),
(16, '24', '14', 'who are you'),
(17, '24', '14', 'who are you'),
(18, '24', '14', 'php has a good career'),
(19, '24', '14', 'i am asfand ali instructor'),
(20, '24', '14', 'ok'),
(21, '24', '21', 'hello i am '),
(22, '24', '21', 'hello i am '),
(23, '24', '21', 'i am majid lia '),
(24, '25', '21', 'i have a query'),
(25, '25', '21', 'my query is thst'),
(26, '0', '17', 'hello\nI have a query'),
(27, '0', '17', 'hello\nI have a query'),
(28, '0', '17', 'hello\nI have a query'),
(29, '0', '17', 'hello\nI have a query'),
(30, '0', '17', 'hello\nI have a query'),
(31, '0', '17', 'hello\nI have a query'),
(32, '0', '14', 'what is your query '),
(33, '0', '14', 'i am here to help you'),
(34, '0', '14', 'let me kow your question'),
(35, '0', '14', 'Not Recived any message'),
(36, '0', '17', 'Hello'),
(37, '2', '14', 'Hello'),
(38, '2', '14', ''),
(39, '2', '14', 'I have a Query'),
(58, '8', '14', 'Hello How are you'),
(59, '8', '14', 'Are you satisfied with my course?'),
(60, '8', '17', 'I am fine '),
(61, '8', '17', 'I am fine '),
(62, '8', '17', ''),
(63, '8', '17', 'Hello'),
(64, '8', '17', 'hello'),
(65, '8', '17', 'are you there'),
(66, '8', '17', '??'),
(67, '8', '17', 'i have a query'),
(68, '8', '17', '??'),
(69, '2', '17', 'how to navigate in java swing'),
(70, '2', '14', 'use set visble function'),
(71, '2', '14', 'furthur more any query'),
(72, '2', '14', 'thankyou'),
(73, '2', '14', 'every one listen');

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

CREATE TABLE `course_modules` (
  `module_id` int(50) NOT NULL,
  `module_week` varchar(50) NOT NULL,
  `module_video` varchar(200) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `module_description` varchar(5000) NOT NULL,
  `courseid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`module_id`, `module_week`, `module_video`, `module_name`, `module_description`, `courseid`) VALUES
(18, 'week1', 'modulevideos/code.mp4', 'java basics', 'GUI in Java\r\nWhat is GUI in Java? GUI (Graphical User Interface) in Java is an easy-to-use visual experience builder for Java applications. It is mainly made of graphical components', 24),
(19, 'Week 1', 'modulevideos/code.mp4', 'Programming in java', 'socket video', 0),
(20, 'Week 1', 'modulevideos/code.mp4', 'Programming in java', 'What is Java and why it is used?\r\nImage result for Java description\r\nJava is a widely used and popular programming language\r\n\r\nThe Java programming language, which is widely used with corporate applications and Android mobile operating systems, is regularly updated to stay up-to-date with industry developments and can support a wide range of languages throughout its platform.', 2),
(23, 'Week 1', 'modulevideos/code.mp4', 'Introduction to Node Programming ', 'It is used for server-side programming, and primarily deployed for non-blocking, event-driven servers, such as traditional web sites and back-end API services, but was originally designed with real-time, push-based architectures in mind.', 8),
(24, 'Week 2', 'modulevideos/How to upload large files in .mp4', 'Introduction to JS Programming ', 'It is used for server-side programming, and primarily deployed for non-blocking, event-driven servers, such as traditional web sites and back-end API services, but was originally designed with real-time, push-based architectures in mind.', 8),
(27, 'week 2', 'modulevideos/My project 2 2021-08-07_14-43-27.mp4', 'threading', 'What is Java and why it is used? Image result for Java description Java is a widely used and popular programming language The Java programming language, which is widely used with corporate applications and Android mobile operating systems, is regularly updated to stay up-to-date with industry developments and can support a wide range of languages throughout its platform.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentenrollcourse`
--

CREATE TABLE `studentenrollcourse` (
  `enrollment_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `courseid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentenrollcourse`
--

INSERT INTO `studentenrollcourse` (`enrollment_id`, `student_id`, `courseid`) VALUES
(43, 17, 8),
(44, 17, 2),
(45, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_attempt_exam`
--

CREATE TABLE `student_attempt_exam` (
  `exam_id` int(50) NOT NULL,
  `attempfile` varchar(100) NOT NULL,
  `courseid` varchar(100) NOT NULL,
  `studentid` varchar(100) NOT NULL,
  `teacherid` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attempt_exam`
--

INSERT INTO `student_attempt_exam` (`exam_id`, `attempfile`, `courseid`, `studentid`, `teacherid`, `grade`) VALUES
(8, 'exams/SQE Project Phase 3.pdf', '2', '17', '14', '87');

-- --------------------------------------------------------

--
-- Table structure for table `teacheraddcourse`
--

CREATE TABLE `teacheraddcourse` (
  `courseid` int(50) NOT NULL,
  `coursename` varchar(60) NOT NULL,
  `coursediscription` varchar(3000) NOT NULL,
  `coursephoto` varchar(60) NOT NULL,
  `teacher_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacheraddcourse`
--

INSERT INTO `teacheraddcourse` (`courseid`, `coursename`, `coursediscription`, `coursephoto`, `teacher_id`) VALUES
(2, 'Java programming', 'Java is a widely used object-oriented programming language and software platform that runs on billions of devices, including notebook computers, mobile devices, gaming consoles, medical devices and many others. The rules and syntax of Java are based on the C and C++ languages.', 'courseimages/java.png', '14'),
(6, 'DataBase', 'A database is information that is set up for easy access, management and updating. Computer databases typically store aggregations of data records or files that contain information, such as sales transactions, customer data, financials and product information.', 'courseimages/DataBase.jpg', '14'),
(8, 'Node JS', 'It is used for server-side programming, and primarily deployed for non-blocking, event-driven servers, such as traditional web sites and back-end API services, but was originally designed with real-time, push-based architectures in mind.', 'courseimages/download.png', '14'),
(9, 'react js', 'React is a free and open-source front-end JavaScript library for building user interfaces based on UI components. It is maintained by Meta and a community of individual developers and companies.', 'courseimages/favicon.ico', '14');

-- --------------------------------------------------------

--
-- Table structure for table `teacheruploadexam`
--

CREATE TABLE `teacheruploadexam` (
  `examid` int(50) NOT NULL,
  `examfile` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacheruploadexam`
--

INSERT INTO `teacheruploadexam` (`examid`, `examfile`, `course_id`, `teacher_id`) VALUES
(10, 'exams/b.pdf', '2', '14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `secondname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilephoto` varchar(1000) NOT NULL,
  `Bio` varchar(5000) NOT NULL,
  `Education` varchar(5000) NOT NULL,
  `Designation` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `secondname`, `email`, `password`, `profilephoto`, `Bio`, `Education`, `Designation`) VALUES
(14, 'Asfand', 'ali', 'teacher@345', 'd81f9c1be2e08964bf9f24b15f0e4900', 'WhatsApp Image 2022-12-21 at 7.50.09 PM.jpeg', 'Engineer | lawyer', '', 'Engineer'),
(15, 'asfand ', 'hassan', 'teacher@355', '82cec96096d4281b7c95cd7e74623496', '', '', '', ''),
(16, 'majid', 'hassan', 'student@355', 'd81f9c1be2e08964bf9f24b15f0e4900', '', '', '', ''),
(17, 'Majid', 'ali', 'student@245', '0266e33d3f546cb5436a10798e657d97', 'WhatsApp Image 2023-01-01 at 11.01.59 PM.jpeg', 'I am Software Engineer', 'Mphil ', 'Software Engineer'),
(18, 'muhammad', 'ahmad', 'teacher@225', 'd1c38a09acc34845c6be3a127a5aacaf', '', '', '', ''),
(19, 'asfand', 'yar', 'student@455', '821fa74b50ba3f7cba1e6c53e8fa6845', '', '', '', ''),
(20, 'Muhammad', 'bin shahid', 'Teacher@346', '13f9896df61279c928f19721878fac41', '0x0 (2).jpg', 'lawyer', 'Bs Software Engineering', 'Software Engineer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`Chatid`);

--
-- Indexes for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentenrollcourse`
--
ALTER TABLE `studentenrollcourse`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `student_attempt_exam`
--
ALTER TABLE `student_attempt_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `teacheraddcourse`
--
ALTER TABLE `teacheraddcourse`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `teacheruploadexam`
--
ALTER TABLE `teacheruploadexam`
  ADD PRIMARY KEY (`examid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `Chatid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY `module_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentenrollcourse`
--
ALTER TABLE `studentenrollcourse`
  MODIFY `enrollment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `student_attempt_exam`
--
ALTER TABLE `student_attempt_exam`
  MODIFY `exam_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacheraddcourse`
--
ALTER TABLE `teacheraddcourse`
  MODIFY `courseid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacheruploadexam`
--
ALTER TABLE `teacheruploadexam`
  MODIFY `examid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
