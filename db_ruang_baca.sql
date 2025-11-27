-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 03:37 PM
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
-- Database: `db_ruang_baca`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `Id` varchar(15) NOT NULL,
  `Cover` varchar(60) NOT NULL,
  `Judul_buku` varchar(30) NOT NULL,
  `Nama_penulis` varchar(30) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Penerbit` varchar(30) NOT NULL,
  `Tanggal_Terbit` date NOT NULL,
  `File_PDF` varchar(60) NOT NULL,
  `Rating` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`Id`, `Cover`, `Judul_buku`, `Nama_penulis`, `Genre`, `Penerbit`, `Tanggal_Terbit`, `File_PDF`, `Rating`) VALUES
('678a66a9b5fc7', '2.png', 'Lautan Ku Tak Gentar', 'Dandy', 'Pertualangan,Misteri', 'Danbook studio', '2025-01-17', 'php.pdf', 5),
('678a673f60607', '3.png', 'Mimpi Ku Sebagai Bukti', 'Dandy', 'Motivasi,Inspirasi', 'Danbook studio', '2025-01-17', 'php.pdf', 2),
('678a68dd3b50f', '1.png', 'Si Kucing Petualang', 'Dandy', 'Pertualangan', 'Danbook studio', '2025-01-17', 'php.pdf', 4),
('678a68ff330e4', '5.png', 'Hujan Tak Turun', 'Dandy', 'Drama,Novel,Fiksi', 'Danbook studio', '2025-01-17', 'php.pdf', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saved`
--

CREATE TABLE `tbl_saved` (
  `saved_id` int(11) NOT NULL,
  `userId` varchar(70) NOT NULL,
  `bookId` varchar(70) NOT NULL,
  `saved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` varchar(70) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role` varchar(15) NOT NULL,
  `Bacaan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `fullname`, `email`, `password`, `role`, `Bacaan`) VALUES
('45aa117f-3c8e-7f7d-e84c-7bd8297d5169', 'Dandy', 'Dandy@gmail.com', '$2y$10$CX67ZtSa.a7V3JgkTaQxV.ujut/./qVXUJ0Otfg1O9uMxHfdIG9MO', 'user', NULL),
('4f17fa17-b771-9c47-382e-cd4d3cf76043', 'admin', 'admin@ruangbaca.co.id', '$2y$10$X32udfBoA3k4wcIUJGTXJunoLSwS2M6.0Ubgz8BNXt/5Ib7Y890uq', 'admin', '678a673f60607'),
('5e65e5c6-518d-f860-7aa3-4a106ab39628', 'Doddy', 'Doddy@gmail.com', '$2y$10$VkLIkXt.UmtdSrpsR.Ec/.J68u96oDg/YjgLbAtqyvyO3aJ6qsSUC', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_saved`
--
ALTER TABLE `tbl_saved`
  ADD PRIMARY KEY (`saved_id`),
  ADD KEY `user_id` (`userId`),
  ADD KEY `book_id` (`bookId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_saved`
--
ALTER TABLE `tbl_saved`
  MODIFY `saved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_saved`
--
ALTER TABLE `tbl_saved`
  ADD CONSTRAINT `tbl_saved_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_saved_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `tbl_buku` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
