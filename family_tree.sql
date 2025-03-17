-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 04:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `family_tree`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user_name`, `password`) VALUES
(1, 'vihanga', '$2b$12$Ro/.sQPQaRVg2XOEUEw9pOvJxVrXHMFz/oZ1Gtvm8jhldiwLg8mlG'),
(2, 'skynet', '$2y$10$6lnMgDosdKhmLdAksFyJO.gdpXB.WVx1Of7scn3L1QxsnfiYYcun6');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `Author` varchar(200) NOT NULL,
  `Category` varchar(150) NOT NULL,
  `views` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `date`, `heading`, `content`, `Author`, `Category`, `views`, `image`) VALUES
(3, '2025-03-17', 'test', 'test', 'test', 'blog', '', 'pexels-shaosong-sun-503031340-16171084.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` int(11) NOT NULL,
  `blog_id` varchar(50) NOT NULL,
  `blog_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_id`, `blog_images`) VALUES
(9, '3', 'pexels-drkesu-12045314.jpg'),
(10, '3', 'pexels-shaosong-sun-503031340-16171084.jpg'),
(11, '3', 'pexels-simge-2149958230-30875412.jpg'),
(12, '3', 'pexels-tizzy-30027164.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`id`, `category`, `image`) VALUES
(10, 'family', 'pexels-drkesu-12045314.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `relation`, `gender`, `parent_id`) VALUES
(1, 'Grandfather', 'Grandfather', 'Male', NULL),
(2, 'Son', 'Son', 'Male', 1),
(3, 'Daughter', 'Daughter', 'Female', 1),
(4, 'Uncle', 'Grandfather\'s Brother', 'Male', NULL),
(5, 'Uncle\'s Wife', 'Wife', 'Female', 1),
(6, 'Uncle\'s Son', 'Son', 'Male', 4),
(7, 'Grandson', 'Grandson', 'Male', 6);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `aprove` tinyint(1) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `age` date NOT NULL,
  `country` varchar(150) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `aprove`, `user_name`, `Name`, `Company_Name`, `age`, `country`, `contact`, `website`, `email`, `password`, `image`) VALUES
(23, 0, 'v', '', '', '0000-00-00', '', '', '', 'v@gmail.com', '$2y$10$hyX2YhFSzblZDV6jDmtOhu7A.VqTS7TfVxbK7gtwGuGBXcKc5F4u.', ''),
(24, 1, 'vipul', 'vipul', '', '2025-03-20', 'sri lanka', '0000000000', '', 'vi@gmail.com', '$2y$10$qMERzu2DoahJ.h23tN.YTOWbOSGkIMLk/rVC/JUte2odrbknguMvu', 'pexels-howdy-30542773.jpg'),
(25, 0, 'roger', 'Potagus D Roger', '', '0000-00-00', '', '', '', 'ro@gmail.com', '$2y$10$bBarQHBGNPVzIqvHOfnxOuuE0kDS2rVw1JmWkX9vh5IqxUkxPDRny', 'pexels-shaosong-sun-503031340-16171084.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
