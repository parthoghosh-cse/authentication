-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 08:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth129`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `cell`, `password`, `photo`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(10, 'parthoghosh', 'partho@gmail.com', 'parth', '018445565352', '$2y$10$meLLDM6kcBGQjtav65MaQ.Qy4gqJHT/2JmMrLVuSoNobQyjLUp4QO', '867702c63083c1b37072e57a8e379fc4.jpg', 1, 0, '2021-04-29 23:54:08', NULL),
(11, 'nasim', 'nasim@gmail.com', 'nasim', '0145666566', '$2y$10$VgVwxNRe1UCd4ZLFrh8iJ.CfyCoytih5LnOcKnC0J6Zms.oFnbkHG', '5446701236c8bee69d6983c341ee8502.jpg', 1, 0, '2021-04-29 23:57:37', NULL),
(12, 'shown', 'shown@gmail.com', 'shown', '0145666566', '$2y$10$s.fRNoF/HhderrKUrP/nIOmqi.d56a1woTNI0SfuoWuaTyLTcrwNq', 'c6cb60291f3f808e60ea53f0df033149.jpg', 1, 0, '2021-04-29 23:59:15', NULL),
(13, 'rakib', 'r@gmail.com', 'rakib', '01721954562', '$2y$10$5HIaVygJcrBfxkrSceTG2uwI0Nij3NrjT9yg/P0DZXoPBgdOTbTdC', 'a2252a1570443044aad3fd6fb2436912.png', 1, 0, '2021-04-30 21:10:57', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
