-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Apr 25, 2024 at 11:57 AM
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
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `owners_id` int(50) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `rent` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `book_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=notbooked,1=booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `owners_id`, `location`, `rent`, `category`, `book_status`) VALUES
(32, 35, 'gataka', 5000, 'single room', 1),
(33, 35, 'rongai', 5000, 'bed sitter', 1),
(34, 35, 'rongai', 5000, 'single room', 1),
(35, 35, 'kiserian', 5000, 'bed sitter', 1),
(36, 35, 'kiserian', 8000, 'one bedroom', 1),
(37, 35, 'rongai', 10000, 'one bedroom', 0),
(38, 35, 'juja', 9000, 'two bedroom', 1),
(39, 35, 'joska', 7000, 'three bedroom', 0),
(40, 35, 'kayole', 15000, 'three bedroom', 1),
(41, 35, 'kiambu', 8000, 'bed sitter', 1),
(42, 36, 'gataka', 9000, 'bed sitter', 0),
(43, 36, 'gataka', 9000, 'bed sitter', 0),
(44, 36, 'gataka', 9000, 'bed sitter', 0),
(45, 36, 'runda', 15000, 'two bedroom', 1),
(46, 36, 'runda', 15000, 'two bedroom', 0),
(47, 36, 'runda', 15000, 'two bedroom', 0),
(48, 37, 'kamulu', 10000, 'one bedroom', 1);

-- --------------------------------------------------------

--
-- Table structure for table `house_images`
--

CREATE TABLE `house_images` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_images`
--

INSERT INTO `house_images` (`id`, `house_id`, `image_url`) VALUES
(31, 32, 'uploads/amr-taha-ooW0zaLV4Ow-unsplash.jpg'),
(32, 33, 'uploads/spacejoy-nEtpvJjnPVo-unsplash.jpg'),
(33, 34, 'uploads/r-architecture-UypLIU-gkK8-unsplash.jpg'),
(34, 35, 'uploads/r-architecture-wDDfbanbhl8-unsplash.jpg'),
(35, 36, 'uploads/r-architecture-UypLIU-gkK8-unsplash.jpg'),
(36, 37, 'uploads/r-architecture-oGmf8o53LeE-unsplash.jpg'),
(37, 38, 'uploads/r-architecture-oGmf8o53LeE-unsplash.jpg'),
(38, 39, 'uploads/r-architecture-khpWE85ge38-unsplash.jpg'),
(39, 40, 'uploads/r-architecture-khpWE85ge38-unsplash.jpg'),
(40, 41, 'uploads/r-architecture-wDDfbanbhl8-unsplash (1).jpg'),
(41, 42, 'uploads/lotus-design-n-print-8qNuR1lIv_k-unsplash.jpg'),
(42, 43, 'uploads/lotus-design-n-print-8qNuR1lIv_k-unsplash.jpg'),
(43, 44, 'uploads/r-architecture-wDDfbanbhl8-unsplash (1).jpg'),
(44, 45, 'uploads/jason-briscoe-SKSq7gYlT80-unsplash.jpg'),
(45, 46, 'uploads/jason-briscoe-SKSq7gYlT80-unsplash.jpg'),
(46, 47, 'uploads/jason-briscoe-SKSq7gYlT80-unsplash.jpg'),
(47, 48, 'uploads/adam-winger-t4oVP2xFMJ8-unsplash (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `house_owners`
--

CREATE TABLE `house_owners` (
  `id` int(50) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `PhoneNumber` int(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `verify_token` varchar(100) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subscribed` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_owners`
--

INSERT INTO `house_owners` (`id`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `Password`, `verify_token`, `verify_status`, `created_at`, `subscribed`) VALUES
(35, 'alphonce', 'maramba', 748683126, 'marambaalphonce@gmail.com', '123456', '4b0a1fcc9cf514b43d3dea8bbb172ac6', 1, '2024-04-24 13:30:56', 1),
(36, 'ouma', 'ramba', 712345678, 'marambaouma@gmail.com', '123456', '7a8818e7973a0896c41907df3c18d477', 1, '2024-04-24 13:36:05', 1),
(37, 'joseph', 'amollo', 723455667, 'marambasunga@gmail.com', '123456', '1d50d3bd89339c9573fde3e5774a3283', 1, '2024-04-25 09:41:47', 1),
(38, 'prince', 'otieno', 712365478, 'otienoprinceotieno@gmail.com', '123456', '751e81038385ec5586851bce4f944be0', 1, '2024-03-28 10:40:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `house_seekers`
--

CREATE TABLE `house_seekers` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LatstName` varchar(200) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_seekers`
--

INSERT INTO `house_seekers` (`Id`, `FirstName`, `LatstName`, `Username`, `Email`, `Password`) VALUES
(28, 'alphonce', 'maramba', 'marambaou', 'marambaalphonce@gmail.com', '123456'),
(29, 'tgrde', 'ggsd', 'marambaou', 'jimmyclydethegreat@gmail.com', 'sgsdgsdg'),
(30, 'josphene', 'awino', 'awinojo', 'marambasunga09@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE `search_history` (
  `search_id` int(11) NOT NULL,
  `seeker_id` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `rent` int(50) DEFAULT NULL,
  `search_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search_history`
--

INSERT INTO `search_history` (`search_id`, `seeker_id`, `category`, `location`, `rent`, `search_date`) VALUES
(1, 28, 'bed sitter', 'nairobi', 6000, '2024-03-22 13:06:03'),
(2, 28, 'two bedroom', 'juja', 10000, '2024-03-22 13:16:47'),
(3, 28, 'two bedroom', 'juja', 10000, '2024-03-22 13:30:44'),
(4, 28, 'bed sitter', 'kiserian', 6000, '2024-03-25 13:02:20'),
(5, 30, 'bed sitter', 'gataka', 10000, '2024-03-26 06:30:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_owner_id` (`owners_id`);

--
-- Indexes for table `house_images`
--
ALTER TABLE `house_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `house_owners`
--
ALTER TABLE `house_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_seekers`
--
ALTER TABLE `house_seekers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `seeker_id` (`seeker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `house_images`
--
ALTER TABLE `house_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `house_owners`
--
ALTER TABLE `house_owners`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `house_seekers`
--
ALTER TABLE `house_seekers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `search_history`
--
ALTER TABLE `search_history`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `fk_owner_id` FOREIGN KEY (`owners_id`) REFERENCES `house_owners` (`id`);

--
-- Constraints for table `house_images`
--
ALTER TABLE `house_images`
  ADD CONSTRAINT `house_images_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`);

--
-- Constraints for table `search_history`
--
ALTER TABLE `search_history`
  ADD CONSTRAINT `search_history_ibfk_1` FOREIGN KEY (`seeker_id`) REFERENCES `house_seekers` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
