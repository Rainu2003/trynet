-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 09:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `catogeries`
--

CREATE TABLE `catogeries` (
  `blood_group` varchar(4) NOT NULL,
  `blood_unit` int(2) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catogeries`
--

INSERT INTO `catogeries` (`blood_group`, `blood_unit`, `time`) VALUES
('A+', 2, '2022-02-12 08:52:05'),
('O+', 2, '2022-02-12 13:17:46'),
('A-', 1, '2022-02-12 13:35:38'),
('B-', 1, '2022-02-12 13:39:00'),
('B+', 1, '2022-02-12 13:41:46'),
('AB-', 1, '2022-02-12 13:42:10'),
('AB+', 1, '2022-02-12 13:42:40'),
('O-', 3, '2022-02-12 13:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `sno` int(10) NOT NULL,
  `donor_name` varchar(25) NOT NULL,
  `donor_disease` varchar(15) NOT NULL,
  `donor_age` int(12) NOT NULL,
  `donor_unit` int(10) NOT NULL,
  `changing_unit` int(12) NOT NULL,
  `donor_bloodgroup` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`sno`, `donor_name`, `donor_disease`, `donor_age`, `donor_unit`, `changing_unit`, `donor_bloodgroup`) VALUES
(1, 'Aditi', 'Nothing', 20, 26, 0, 'A+'),
(8, 'Isha', 'nothing', 50, 23, 0, 'B+'),
(9, 'Isha', 'Nothing', 50, 23, 1, 'B+'),
(10, 'Manisha', 'Cancer', 48, 2, 0, 'AB+'),
(12, 'Aditi', 'nothing', 20, 2, 2, 'B+'),
(13, 'ade', 'gh', 23, 11, 30, 'O+'),
(14, 'Ayush', 'Nothing', 18, 2, 0, 'O-'),
(15, 'Nidhi', 'nothing', 33, 21, 0, 'AB-'),
(16, 'Rashmi', 'Nothing', 29, 23, 0, 'A-'),
(17, 'Anjali', 'nothing', 23, 30, 0, 'B-'),
(18, 'Anjali', 'nothing', 23, 30, 0, 'B-'),
(19, 'Aditi', 'Nothing', 19, 2, 0, 'B+'),
(23, 'adij', 'nothing', 12, 15, 0, 'O+'),
(27, 'afrg', 'et', 9, 15, 0, 'O+'),
(28, 'adrt', 'ggt', 5, 15, 0, 'O+'),
(29, 'adrt', 'ggt', 5, 15, 0, 'O+'),
(30, 'adrt', 'ggt', 5, 15, 0, 'O+'),
(31, 'adrt', 'ggt', 5, 15, 0, 'O+'),
(32, 'adut', 'fdec', 54, 28, 0, 'A+'),
(33, 'adut', 'fdec', 54, 28, 0, 'A+'),
(34, 'ojuf', 'uhh', 88, 8, 8, 'B-'),
(35, 'Racheal', 'Nothing', 28, 2, 2, 'A+'),
(36, 'Monica ', 'Nothing', 30, 2, 2, 'A-'),
(37, '', '', 0, 0, 0, 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `patient_disease` varchar(20) NOT NULL,
  `patient_age` int(3) NOT NULL,
  `patient_unit` int(4) NOT NULL,
  `patient_bloodgroup` varchar(4) NOT NULL,
  `sno` int(11) NOT NULL,
  `p_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_name`, `email`, `patient_disease`, `patient_age`, `patient_unit`, `patient_bloodgroup`, `sno`, `p_status`) VALUES
('adi', 'adi', 'Covid', 34, 3, 'AB+', 1, 'Approved'),
('Sagar', '', 'Cancer', 54, 4, 'O+', 2, 'Approved'),
('Suraj', '', 'Nothing', 30, 2, 'O+', 4, 'Approved'),
('Suraj', 'ahd@65', 'Nothing', 30, 15, 'B+', 5, 'Approved'),
('kdsm', '', 'ijju', 90, 2, 'O+', 8, 'Approved'),
('aditi', 'adiit@546', 'fever', 19, 2, 'O+', 9, 'Approved'),
('ytgt', 'pat', 'tyty', 3, 23, 'A+', 10, 'Approved'),
('heyyader', 'adrew@355', 'deghj', 23, 2, 'B-', 11, 'Approved'),
('fijguh', 'ygt@uhy', 'ygtg', 67, 3, 'O+', 12, 'Approved'),
('adh', 'ygtg@5t', 'tff', 65, 2, 'AB-', 13, 'Approved'),
('bnh', 'cd2@45', 'tr', 67, 2, 'O+', 14, 'Pending'),
('fg', 'ad@13', 'yy', 65, 3, 'O+', 15, 'Pending'),
('aditi', 'aditi4@gmail.com', 'Fever', 20, 2, 'AB+', 16, 'Pending'),
('Joey', 'joey@123', 'Covid-19', 34, 10, 'B+', 17, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `sno` int(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'aditi@adi', '6767', '2022-02-10 23:27:38'),
(2, 'aditidobriyal111@gmail.com', '$2y$10$LQG.v/uZmLtmJ/ha8oYlKeXe/H9DjpDxMUrLrVUmqv0BVwQo1tZsG', '2022-02-10 23:38:54'),
(3, 'g@h.com', '$2y$10$tH6VFP/anG6pcmQF8E2zduJV8G.Q9hwR0aTuBLFLuRy.PPa.Do4ae', '2022-02-10 23:45:15'),
(4, 'auyu@123', '$2y$10$0wC5spAiM3p38HuUnARkeO23g5AvSo8XFRDeyndFbC5nWFjTXtkry', '2022-02-10 23:51:35'),
(5, 'auyu@123', '$2y$10$zHcEXLdqRJO/vg5pRpyrcOsykPDJnjVK6a2RF8EfRmiWIyGA0XO.2', '2022-02-10 23:52:34'),
(6, 'gkmhgjm@hgrgn', '$2y$10$H50wwmg00082qwDzv0qL2OlnzEhdK.SpGYnEA4ILQRLKiwJTd5jv6', '2022-02-10 23:54:53'),
(7, 'fhgh', '$2y$10$5wgZ8OD5kPRsYs6m.6IG3e3NCdvpiGK8XyH9L0PCrKNiqQSzvCUgu', '2022-02-10 23:57:46'),
(8, 'a', '$2y$10$wDw1W5rTe1HJgcdgIpeCseLNZrpFfYcKygdTP10xXjgGpXFbVzyPy', '2022-02-11 00:25:46'),
(9, 'hh', '$2y$10$LmrDJ7mZVN/PGO4LvuxA/eR02If8tQNhDDHxbXSf5np7KtPZ1eYea', '2022-02-11 00:26:32'),
(10, 'ty', '$2y$10$8JEZg0qN60j0CQv5FMcEKOrY32lVe8FOpmpSov6KzZsQjL7HikBxO', '2022-02-11 00:26:46'),
(11, 'aditi', '$2y$10$Ek0sQGCrDaaZtzIc3B/6hONz646T2fYBnB0UFYz5ftj09UaVPrhwO', '2022-02-11 00:30:32'),
(12, 'prisa', '$2y$10$1v9u3LaeK5eSfrBN6e92Euc3HrDNIAlukzYlgjX5ljdD6VjYczLR6', '2022-02-11 00:58:21'),
(13, 'ayush', '$2y$10$1dLuu/ibJd88e/Ox2WFJ7eZqVG4AlKO6WWYzCHTUuj1CcE3RnZ8QK', '2022-02-11 15:24:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
