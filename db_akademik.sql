-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 12:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama_mhs`, `alamat`, `email`, `no_telp`) VALUES
(120, '230302045', 'Aeri', 'JL. Teri', 'aerichandesu@gmail.com', '081234567890'),
(121, '230202061', 'Jeno', 'JL. Delima', 'jeno@gmail.com', '098765151'),
(122, '230302064', 'Miuraichi Levia', 'Kwangya', 'miuraichiii@gmail.com', '09876543210'),
(123, '230102079', 'Winter', 'JL. Sutomo', 'wintt@gmail.com', '087756432198'),
(124, '230102099', 'Bernadya', 'JL. Rinjani', 'bernad@gmail.com', '08567890123'),
(127, '127127127', 'Jae', 'JL. Damar', 'jaepark@gmail.com', '09766252552');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_akhir` decimal(10,2) NOT NULL,
  `id_mahasiswa` int NOT NULL,
  `id_matkul` int NOT NULL,
  `id_semester` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai`, `nilai_akhir`, `id_mahasiswa`, `id_matkul`, `id_semester`) VALUES
(101, '85.00', '95.00', 120, 130, 5),
(102, '100.00', '100.00', 121, 132, 3),
(103, '75.00', '75.00', 122, 134, 1),
(105, '77.00', '80.00', 124, 136, 2),
(109, '67.00', '70.00', 127, 135, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
