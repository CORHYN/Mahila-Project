-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 11:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahila`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE `applied` (
  `jid` int(11) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `resumes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`jid`, `userid`, `company_id`, `resumes`) VALUES
(1, 1, 1, 'IMG649e9feb365638.65287588.jpg'),
(1, 3, 1, '3.png'),
(1, 4, 1, '4.png'),
(2, 4, 1, '4.png');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `registration_number` varchar(50) DEFAULT NULL,
  `year_of_founding` year(4) DEFAULT NULL,
  `number_of_employees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `cname`, `email`, `pass`, `registration_number`, `year_of_founding`, `number_of_employees`) VALUES
(1, 'OpenAI', 'info@openai.com', 'password123', '123456789', '2015', 1000),
(2, 'Tesla', 'info@tesla.com', 'tesla123', '987654321', '2003', 50000),
(3, 'Microsoft', 'info@microsoft.com', 'microsoft123', '456789123', '1975', 150000),
(4, 'Google', 'info@google.com', 'google123', '789123456', '1998', 150000),
(5, 'Apple', 'info@apple.com', 'apple123', '321654987', '1976', 147000),
(6, 'Amazon', 'info@amazon.com', 'amazon123', '654987321', '1994', 1400000),
(7, 'Facebook', 'info@facebook.com', 'facebook123', '987321654', '2004', 60000),
(8, 'Netflix', 'info@netflix.com', 'netflix123', '321789654', '1997', 10000),
(9, 'Uber', 'info@uber.com', 'uber123', '654321789', '2009', 22000),
(10, 'SpaceX', 'info@spacex.com', 'spacex123', '789654321', '2002', 8000),
(11, 'Intel', 'Intel@gmail.com', '1234', '8283132', '1978', 20000),
(12, 'mahila', 'mahila@qq.com', 'mahila', '123', '2021', 100);

-- --------------------------------------------------------

--
-- Table structure for table `job_listing`
--

CREATE TABLE `job_listing` (
  `jid` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `descp` text DEFAULT NULL,
  `pay` decimal(10,2) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_listing`
--

INSERT INTO `job_listing` (`jid`, `company_id`, `job_title`, `descp`, `pay`, `position`) VALUES
(1, 1, 'Software Engineer', 'We are seeking a talented software engineer to join our team and work on cutting-edge AI technologies.', 80000.00, 'Full-time'),
(2, 1, 'Data Scientist', 'We are looking for a skilled data scientist to analyze and interpret complex data sets.', 90000.00, 'Full-time'),
(3, 2, 'Electrical Engineer', 'We are seeking an experienced electrical engineer to design and develop innovative electrical systems for our electric vehicles.', 95000.00, 'Full-time'),
(4, 2, 'Software Developer', 'We are hiring a software developer to build and maintain high-quality software applications.', 85000.00, 'Full-time'),
(5, 3, 'Product Manager', 'We are looking for a skilled product manager to drive the development and launch of new products.', 100000.00, 'Full-time'),
(6, 3, 'Software Engineer', 'Join our team of talented software engineers to develop innovative solutions for our customers.', 95000.00, 'Full-time'),
(7, 4, 'Machine Learning Engineer', 'We are seeking a machine learning engineer to design and implement advanced machine learning models.', 100000.00, 'Full-time'),
(8, 4, 'Software Developer', 'Join our software development team and contribute to the development of our cutting-edge products.', 90000.00, 'Full-time'),
(9, 5, 'iOS Developer', 'We are hiring an iOS developer to build innovative and user-friendly mobile applications for our customers.', 85000.00, 'Full-time'),
(10, 5, 'Hardware Engineer', 'Join our hardware engineering team and work on designing and testing new hardware components.', 95000.00, 'Full-time'),
(11, 6, 'Supply Chain Manager', 'We are seeking a supply chain manager to oversee and optimize our supply chain operations.', 110000.00, 'Full-time'),
(12, 6, 'Data Analyst', 'Join our data analytics team to analyze and interpret large datasets to drive business insights.', 80000.00, 'Full-time'),
(13, 7, 'Product Designer', 'We are looking for a talented product designer to create visually appealing and user-friendly designs.', 90000.00, 'Full-time'),
(14, 7, 'Software Engineer', 'Join our software engineering team and develop scalable and robust software solutions.', 95000.00, 'Full-time'),
(15, 8, 'UI/UX Designer', 'We are seeking a UI/UX designer to create intuitive and visually appealing user interfaces.', 85000.00, 'Full-time'),
(16, 8, 'Content Writer', 'Join our content writing team and create engaging and informative content for our products.', 70000.00, 'Full-time'),
(17, 9, 'Operations Manager', 'We are looking for an experienced operations manager to oversee and streamline our operational processes.', 100000.00, 'Full-time'),
(18, 9, 'Business Analyst', 'Join our business analysis team to analyze market trends and identify business opportunities.', 80000.00, 'Full-time'),
(19, 10, 'Rocket Engineer', 'We are seeking a talented rocket engineer to design and develop advanced rocket propulsion systems.', 120000.00, 'Full-time'),
(20, 10, 'Embedded Systems Engineer', 'Join our team of embedded systems engineers to develop control systems for our space vehicles.', 100000.00, 'Full-time'),
(21, 1, 'Electrical Consultant', 'We are looking for a electrical consultant for our formula student team', 20000.00, 'Senior'),
(22, 1, 'se', 'good job', 10000.00, 'full time');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `userid` int(10) DEFAULT NULL,
  `resumes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`userid`, `resumes`) VALUES
(1, 'IMG649e9feb365638.65287588.jpg'),
(2, '2.jpg'),
(3, '3.png'),
(4, '4.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `userid` int(10) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `tokenid` int(7) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`userid`, `username`, `pass`, `tokenid`, `email`) VALUES
(1, 'user1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4427265, 'user1@gmail.com'),
(2, 'user2', '8cb2237d0679ca88db6464eac60da96345513964', 846324, 'user2@gmail.com'),
(3, 'user3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 7929177, 'user3@gmail.com'),
(4, 'user4', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3427953, 'user4@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_listing`
--
ALTER TABLE `job_listing`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_listing`
--
ALTER TABLE `job_listing`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
