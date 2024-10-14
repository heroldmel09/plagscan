-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 04:03 PM
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
-- Database: `plagiarism_check`
--

-- --------------------------------------------------------

--
-- Table structure for table `scans`
--

CREATE TABLE `scans` (
  `id` int(11) NOT NULL,
  `scan_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `plagiarism_percentage` varchar(50) DEFAULT 'Pending',
  `report_link` varchar(255) DEFAULT 'Pending',
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `export_link` varchar(255) DEFAULT 'Pending',
  `export_status` enum('pending','completed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `scans`
--

INSERT INTO `scans` (`id`, `scan_id`, `file_name`, `plagiarism_percentage`, `report_link`, `status`, `created_at`, `export_link`, `export_status`) VALUES
(1, '66fd328d5ef42', 'REVIEVER.docx', '53.8', 'https://some-report-url.com', 'completed', '2024-10-02 11:46:22', 'Pending', 'pending'),
(2, '66fd37138e864', 'betters.docx', 'Pending', 'Pending', 'pending', '2024-10-02 12:05:40', 'Pending', 'pending'),
(3, '66fd38902d1a4', 'Education.docx', 'Pending', 'Pending', 'pending', '2024-10-02 12:12:01', 'Pending', 'pending'),
(4, '66fd3a2a5d8f2', 'Education.docx', 'Pending', 'Pending', 'pending', '2024-10-02 12:18:51', 'Pending', 'pending'),
(5, '66fd3cb8c554d', 'Education.docx', 'Pending', 'Pending', 'pending', '2024-10-02 12:29:46', 'Pending', 'pending'),
(6, '66fd3eaedb6ab', 'betters.docx', 'Pending', 'Pending', 'pending', '2024-10-02 12:38:08', 'Pending', 'pending'),
(7, '66fd4176d4595', 'Education.docx', 'Pending', 'Pending', 'pending', '2024-10-02 12:50:00', 'Pending', 'pending'),
(8, '66fd4c469d631', 'Education (1).docx', '53.8', 'https://some-report-url.com', '1', '2024-10-02 13:36:07', 'Pending', 'pending'),
(9, '66fd9366e473c', 'REVIEVER.docx', '53.8', 'https://some-report-url.com', 'completed', '2024-10-02 18:39:36', 'Pending', 'pending'),
(10, '66fe0c0a0c28e', 'Education (1).docx', 'Pending', 'Pending', 'pending', '2024-10-03 03:14:19', 'Pending', 'pending'),
(11, '66fe0dc8784ad', 'betters.docx', 'Pending', 'Pending', 'pending', '2024-10-03 03:21:45', 'Pending', 'pending'),
(12, '66fea2d45d9a6', 'PARENTAL-CONSENT.pdf', 'Pending', 'Pending', 'pending', '2024-10-03 13:57:42', 'Pending', 'pending'),
(13, '6704efab27345', 'Education (1).docx', 'Pending', 'Pending', 'pending', '2024-10-08 08:39:09', 'Pending', 'pending'),
(14, '6704f06615eef', 'Education (1).docx', 'Pending', 'Pending', 'pending', '2024-10-08 08:42:15', 'Pending', 'pending'),
(15, '6704f4f7b39ce', 'REVIEVER.docx', 'Pending', 'Pending', 'pending', '2024-10-08 09:01:45', 'Pending', 'pending'),
(16, '6704f56421b58', 'REVIEVER.docx', 'Pending', 'Pending', 'pending', '2024-10-08 09:03:34', 'Pending', 'pending'),
(17, '67054fdbbc486', 'betters.docx', 'Pending', 'Pending', 'pending', '2024-10-08 15:29:33', 'Pending', 'pending'),
(18, '67067528de9d0', 'betters.docx', 'Pending', 'Pending', 'pending', '2024-10-09 12:20:58', 'Pending', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scans`
--
ALTER TABLE `scans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scans`
--
ALTER TABLE `scans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
