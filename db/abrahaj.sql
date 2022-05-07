-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 02:40 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abrahaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `judge_rate`
--

CREATE TABLE `judge_rate` (
  `rate_id` int(20) NOT NULL,
  `group_members` int(20) NOT NULL,
  `group_number` varchar(60) NOT NULL,
  `project_title` varchar(200) NOT NULL,
  `judge_name` varchar(60) NOT NULL,
  `comments` text NOT NULL,
  `developing_avg` decimal(6,3) NOT NULL,
  `accomplished_avg` decimal(6,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_id` int(20) NOT NULL,
  `major_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `major_title`) VALUES
(1, 'Accounting '),
(2, 'Accounting technology/technician and bookkeeping \r\n'),
(3, 'Animation, interactive technology, video graphics and special effects \r\n'),
(4, 'Art history, criticism and conservation \r\n'),
(5, 'Biotechnology \r\n'),
(6, 'Business administration and management \r\n'),
(7, 'Community organization and advocacy \r\n'),
(8, 'Computer and information sciences \r\n'),
(9, 'Computer science \r\n'),
(10, 'Criminal justice/police science \r\n'),
(11, 'Economics \r\n'),
(12, 'Emergency medical technology/technician (emt paramedic) \n'),
(13, 'Engineering\r\n'),
(14, 'English language and literature\r\n'),
(15, 'Ethnic, cultural minority, gender, and group studies \r\n'),
(16, 'Finance \r\n'),
(17, 'Fine/studio arts\r\n'),
(18, 'Foreign languages and literatures \r\n'),
(19, 'Geographic information science and cartography\r\n'),
(20, 'Gerontology \r\n'),
(21, 'Health information/medical records technology/technician \r\n'),
(22, 'Health services/allied health/health sciences \r\n'),
(23, 'History \r\n'),
(24, 'Liberal arts and sciences/liberal studies \r\n'),
(25, 'Linguistics \r\n'),
(26, 'Marketing/marketing management \r\n'),
(27, 'Mass communication/media studies \r\n'),
(28, 'Mathematics \r\n'),
(29, 'Music \r\n'),
(30, 'Physical sciences \r\n'),
(31, 'Psychology \r\n'),
(32, 'Public health \r\n'),
(33, 'Public health education and promotion \r\n'),
(34, 'Radio and television broadcasting technology/technician \r\n'),
(35, 'Registered nursing/registered nurse\r\n'),
(36, 'Respiratory care therapy/therapist \r\n'),
(37, 'Small business administration/management \r\n'),
(38, 'Social sciences \r\n'),
(39, 'Sociology\r\n'),
(40, 'Teacher assistant/aide \r\n'),
(41, 'Visual and performing arts \r\n'),
(42, 'Web page, digital/multimedia and information resources design\r\n'),
(43, 'Women\'s studies ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `first_name`, `last_name`, `email_address`, `password`, `registration_date`) VALUES
(1, 'test', 'testfirst', 'test last', 'test@gmail.com', '$2y$12$fGWD8v52V1H8rtLwe28NxeibFSAV7Pebw9OAybaq0Z172uaxmAp/C', '2022-05-03 18:26:05'),
(2, 'kuzen', 'mustafa', 'arslan', 'mstf@gmail.com', '$2y$12$86s3yQrp5Fl6CM5dh6AcmeENecKEJOZUCibPlYG8zYXVzSf3qp0wG', '2022-05-03 18:31:02'),
(3, 'demo1', 'demoFirst', 'demoLast', 'Demo$1@gmail.com', '$2y$12$hqtOJS3nNAECq0aZLYknEuuhzd3v5sve00XNL2Sl2TA4KTwtsgHF2', '2022-05-04 18:04:20'),
(5, 'abrahaj', 'aljona', 'brahaj', 'aljonabrahaj@yahoo.com', '$2y$12$YLpHBiiquBBepIq2Qr3KdeRjBjKLUglGG6lGxgwgA2eIoFp24BMDe', '2022-05-06 05:51:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judge_rate`
--
ALTER TABLE `judge_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `judge_rate`
--
ALTER TABLE `judge_rate`
  MODIFY `rate_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `judge_rate`
--
ALTER TABLE `judge_rate`
  ADD CONSTRAINT `judge_rate_ibfk_1` FOREIGN KEY (`rate_id`) REFERENCES `major` (`major_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
