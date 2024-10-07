-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2024 at 01:31 PM
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
-- Database: `real_ecom_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`) VALUES
(10, 'mobile ', '2f28a720240811_234239_0000.png'),
(11, 'watch ', 'b48ccfIMG-20240821-WA0000.jpg'),
(14, 'hello ', '9743daScreenshot_2024_0830_141834.jpg'),
(15, 'meg', '041d9bScreenshot_2024_0830_141834.jpg'),
(16, 'n', 'cd3c75Screenshot_2024_0831_150902.jpg'),
(17, 'h', 'ed824dScreenshot_2024_0831_150902.jpg'),
(18, 'amit kumar ', 'b41819Screenshot_2024_0828_130548.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(225) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat`, `name`, `price`, `description`, `img`) VALUES
(1, 'mobile ', 'vivo y91', '14500', '6gm ram, 84gb rom, 67 camera ', '91898ddownload.webp'),
(4, 'mobile ', 'vivo y91 ', '22205', '4gm Ram, 64 rom, 6.2 inch screen, dual 4g, 500 mgh battery, 8 meg pixels front and 24 mega pixels back camera ', 'a43949download.webp'),
(5, 'watch ', 'vivo neo', '2580', 'smart watch, with sim', 'c5de68Screenshot_2024_0830_141834.jpg'),
(6, 'hello ', 'hello never 1', '2580', 'good\n', '53884520240811_234239_0000.png');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(100) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `cat`, `img`) VALUES
(13, 'watch ', 'b31681Screenshot_2024_0831_150902.jpg'),
(14, 'meg', '8802bcimage_picker.jpg'),
(15, 'amit kumar ', 'da10d4image_picker.jpg'),
(16, 'mobile ', 'bb0a4020240811_234239_0000.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `mobile_number` int(12) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `otp` int(10) DEFAULT NULL,
  `is_otp_verified` enum('0','1') DEFAULT '0',
  `otp_expiry` int(15) DEFAULT NULL,
  `mage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`, `mobile_number`, `user_type`, `otp`, `is_otp_verified`, `otp_expiry`, `mage`, `created_at`, `updated_at`) VALUES
(31, 'and ', 'amitit33@gmail.com', 'amitkumar', '', NULL, NULL, 46510, '1', NULL, NULL, NULL, NULL),
(32, 'amit', 'amitedu061994@gmail.com', '123456', '', NULL, NULL, 38945, '1', NULL, NULL, NULL, NULL),
(33, 'ami', 'dmtoakbar@gmail.com', '12345678', '', NULL, NULL, 74655, '1', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
