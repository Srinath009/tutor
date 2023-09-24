-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 02:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `role_id` int(2) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `address`, `role_id`, `created_at`) VALUES
(1, 'srinath', 'srinath@gmail.com', 'Parasagani', 'Hyderabad', 1, '2022-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(3) NOT NULL,
  `st_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `request` varchar(3) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `st_id`, `t_id`, `created_at`, `request`, `status`) VALUES
(11, 4, 4, '2023-01-05', '', ''),
(12, 4, 3, '2023-01-05', '', ''),
(13, 6, 11, '2023-01-05', '', ''),
(14, 6, 8, '2023-01-05', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pic` mediumtext NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `cnic` int(10) NOT NULL,
  `role_id` int(2) NOT NULL,
  `created_at` date NOT NULL,
  `bids` int(10) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `pic`, `email`, `password`, `phone`, `address`, `gender`, `cnic`, `role_id`, `created_at`, `bids`) VALUES
(3, 'Akhil', '63afa9e96c4af.png', 'akhil@gmail.com', 'Mavoori', 6305258393, 'Kavadiguda', 'M', 1233, 3, '2022-12-31', 7),
(4, 'Chetana', '63afbcb3b7e90.jpg', 'chetana@gmail.com', 'Madamchatti', 9390205286, 'Kavadiguda', 'F', 1248, 3, '2022-12-31', 0),
(5, 'Srinath', '63afbd033db6e.jpg', 'srinath@gmail.com', 'Parasagani', 9963651736, 'Kavadiguda', 'M', 1240, 3, '2022-12-31', 10),
(6, 'Sreenidhi', '63afbd3734635.png', 'sreenidhi@gmail.com', 'Nakka', 7396218038, 'Malakpet', 'F', 1235, 3, '2022-12-31', 8),
(7, 'Bhavana', '63afbd7d72bc4.png', 'bhavana@gmail.com', 'Moru', 7569791163, 'Kothapet', 'F', 1234, 3, '2022-12-31', 10);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `created_at`) VALUES
(1, 'Mathematics 1', '2022-12-08'),
(2, 'Mathematics 2', '2022-12-09'),
(3, 'Engineering Graphics', '2022-12-10'),
(4, 'Applied Physics', '2022-12-11'),
(5, 'Chemistry', '2022-12-12'),
(6, 'English', '2022-12-13'),
(7, 'Data Structures', '2022-12-14'),
(8, 'Operating Systems', '2022-12-15'),
(9, 'Discrete Mathematics', '2022-12-16'),
(10, 'Data Analytics', '2022-12-17'),
(11, 'Software Engineering', '2022-12-18'),
(12, 'Programming and ProblemSolving', '2022-12-19'),
(13, 'Business Economics and Financial Analysis', '2022-12-20'),
(14, 'Java Programming', '2022-12-21'),
(15, 'Web Programming', '2022-12-22'),
(16, 'Computer Oriented Statistical Mathematics', '2022-12-23'),
(17, 'Machine Learning', '2022-12-24'),
(18, 'Data Base Management Systems', '2022-12-25'),
(19, 'Data Communication and Computer Networks', '2022-12-26'),
(20, 'Computer Organisation and Microprocessor', '2022-12-27'),
(21, 'Basic Electrical Engineering', '2022-12-31'),
(22, 'Object Oriented Programming', '2023-01-01'),
(23, 'Analog and Digital Electronics', '2023-01-02'),
(24, 'Finite Automata and Formal Language', '2023-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pic` mediumtext NOT NULL,
  `doc` mediumtext NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `cnic` int(10) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `s_id` int(4) NOT NULL,
  `price` int(10) NOT NULL,
  `batch` varchar(2) NOT NULL,
  `role_id` int(2) NOT NULL,
  `created_at` date NOT NULL,
  `ranks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `pic`, `doc`, `email`, `password`, `phone`, `address`, `gender`, `cnic`, `qualification`, `s_id`, `price`, `batch`, `role_id`, `created_at`, `ranks`) VALUES
(3, 'shiva', '63af34bf411c3.jpg', '63af34bf417a7.pdf', 'shiva@gmail.com', 'Shiva', 9618260220, 'Deshmukhi', 'M', 1500, 'Mtech', 14, 10000, 'E', 2, '2022-12-30', 0),
(4, 'Deepthi', '63af35de85590.png', '63af35de8599c.pdf', 'deepthi@gmail.com', 'Deepthi', 9849771453, 'HayathNagar', 'F', 1501, 'Btech', 10, 5000, 'M', 2, '2022-12-30', 0),
(6, 'Harsha vardhini', '63afba87bcefc.png', '63afba87bd46d.pdf', 'harshavardhini@gmail.com', 'Harshavardhini', 998966969, 'kukatpally', 'F', 1503, 'Mtech', 17, 15000, 'E', 2, '2022-12-31', 0),
(7, 'Prabhakar', '63afbb1f731c0.png', '63afbb1f73731.pdf', 'prabhakar@gmail.com', 'Prabhakar', 7691589669, 'Hayathnagar', 'M', 1504, 'Phd', 11, 15000, 'E', 2, '2022-12-31', 0),
(8, 'Anjaneyulu', '63afbba431f2d.png', '63afbba432463.pdf', 'anjaneyulu@gmail.com', 'Anjaneyulu', 9581563458, 'Vishnu', 'F', 1505, 'Mtech', 20, 20000, 'E', 2, '2022-12-31', 0),
(9, 'Manohar', '63afbc3c8ca4b.png', '63afbc3c8cce9.pdf', 'manohar@gmail.com', 'Manohar', 9584568547, 'Lb nagar', 'M', 1506, 'Mtech', 5, 15000, 'E', 2, '2022-12-31', 0),
(10, 'Andalu', '63afbf9a8582a.png', '', 'andalu@gmail.com', 'Andalu@123', 7263417896, 'Chintalkunta', 'F', 1508, 'Btech', 21, 10000, 'E', 2, '2022-12-31', 0),
(11, 'CH.Vijay Bhasker', '63afc03da1b16.png', '', 'bhasker@gmail.com', 'Bhasker@123', 7418529632, 'Hayath nagar', 'M', 1509, 'Mtech', 1, 20000, 'E', 2, '2022-12-31', 0),
(12, 'Sridhar', '63afc0a5435b1.png', '', 'sridhar@gmail.com', 'Sridhar@123', 741852939, 'chintalbasthi', 'M', 1510, 'Mtech', 4, 12000, 'E', 2, '2022-12-31', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
