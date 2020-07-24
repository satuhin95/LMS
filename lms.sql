-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 04:18 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(60) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_authore_name` varchar(45) NOT NULL,
  `book_publication_name` varchar(45) NOT NULL,
  `book_purchase_date` varchar(45) NOT NULL,
  `book_price` float NOT NULL,
  `book_qty` int(5) UNSIGNED NOT NULL,
  `abilable_qty` int(5) UNSIGNED NOT NULL,
  `librarian_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_authore_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `abilable_qty`, `librarian_name`) VALUES
(5, 'হাদীসের নামে জালিয়াতি', '20202407012854.webp', 'ড. খোন্দকার আব্দুল্লাহ জাহাঙ্গীর ', 'আস-সুন্নাহ পাবলিকেশন্স ', '2020-07-24', 300, 15, 15, 'admin'),
(8, 'প্রোডাক্টিভ মুসলিম', '20202407041617.jpg', 'মোহাম্মদ ফারিস', 'গার্ডিয়ান পাবলিকেশনস', '2020-07-24', 250, 10, 10, 'admin'),
(9, 'প্যারাডক্সিক্যাল সাজিদ', '20202407041741.jpg', 'আরিফ আজাদ', 'গার্ডিয়ান পাবলিকেশনস', '2020-07-24', 180, 10, 10, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(10) NOT NULL,
  `student_id` int(6) NOT NULL,
  `book_id` int(10) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `librarian_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`, `librarian_id`) VALUES
(1, 1, 4, '24-07-2020', '24-07-2020', '2020-07-24 11:52:54', 1),
(2, 1, 5, '24-07-2020', '24-07-2020', '2020-07-24 15:14:48', 1),
(3, 1, 6, '24-07-2020', '24-07-2020', '2020-07-24 15:14:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `name`, `username`, `email`, `password`, `datetime`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2020-07-23 19:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `username`, `email`, `roll`, `reg`, `phone`, `password`, `image`, `status`, `datetime`) VALUES
(1, 'saif1', 'saif', 'saif@gmail.com', 123456, 123456, '0152315246', '202cb962ac59075b964b07152d234b70', '20202407040009.jpg', 1, '2020-07-23 08:05:26'),
(4, 'Mamun', 'Mamun', 'Mamun@gmail.com', 123456, 123456, '0152315246', '202cb962ac59075b964b07152d234b70', NULL, 1, '2020-07-23 09:10:28'),
(5, 'Mamun', 'Mamun', 'Mamun1@gmail.com', 123456, 123456, '0152315246', 'c20ad4d76fe97759aa27a0c99bff6710', NULL, 0, '2020-07-23 09:11:43'),
(8, 'Roni', 'roni', 'roni@gmail.com', 123456, 123456, '0152315246', '202cb962ac59075b964b07152d234b70', '20202407041210.jpg', 1, '2020-07-24 12:41:36'),
(9, 'Hasan', 'hasan', 'hasan@gmail.com', 123456, 123456, '01943166842', 'fc3f318fba8b3c1502bece62a27712df', '20202407031645.', 0, '2020-07-24 13:16:45'),
(10, 'hasan', 'hasan', 'hasan1@gmail.com', 123456, 123456, '01521231285', 'fc3f318fba8b3c1502bece62a27712df', '20202407032052.jpg', 0, '2020-07-24 13:20:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
