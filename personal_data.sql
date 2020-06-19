-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 02:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(7) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `created_at` int(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `username`, `password`, `photo1`, `photo2`, `created_at`, `status`) VALUES
(1, 'Mh Imran', '01534871992', 'imran@gmail.com', '@imran', '$2y$10$k7/mDiVfW0EWvL.M.pqPrOC', '53b3ea4cbf38617c2a47a5d516b4ff10.jpg', 'f8f7449badaaed71506071952520f748.jpg', 0, ''),
(2, 'hasan', '01534871992', 'imran1@gmail.com', 'imran1', '$2y$10$nFZqwjk8kgEQrPxr7gjMGuT', '57f8dd3910a71d513447cf24369903d7.jpg', '4dc298a41da5d9ad8422497f74497071.jpg', 0, ''),
(3, 'imran', '011111111111', 'mh@gmail.com', 'mh', '$2y$10$wE5wlj8KOmF8rpPT8ZHneul', 'db15ce6bbab2f23c7a626aa8d51f48c8.jpg', '698d80b8b8331b684940454e27f4dfc8.jpg', 0, ''),
(4, 'Mh Imran', '01534871992', 'imran00@gmail.com', 'imran00', '$2y$10$rNCcNZxUmaJ73bRj1xxg6uw', '7138375de01219ffefe64a8ff1d10a3a.jpg', 'bd580bf09b987c3836493642e0dca8e4.jpg', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
