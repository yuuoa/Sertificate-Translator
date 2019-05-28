-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 09:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `role`, `nama`, `email`) VALUES
('admin', 'admin', 1, 'admin', 'admin@a.com'),
('fkadarmanto', 'kamikaze1', 0, 'Fahmi Fauzi Kadarmanto', 'fkadarmanto@gmail.com'),
('rifqisambas', 'smbs', 0, 'Rifqi Sambas Khairurrohman', 'rifqisambas@outlook.com'),
('speetza', 'S0nyvaio', 0, 'Muhammad Alwan Andika', 'alwanandika@gmail.com'),
('user', 'user', 0, 'user', 'user@u.com');

-- --------------------------------------------------------

--
-- Table structure for table `ijazah`
--

CREATE TABLE `ijazah` (
  `id_ijazah` int(11) NOT NULL,
  `no_ijazah` int(11) NOT NULL,
  `tahun_lulus` date NOT NULL,
  `nim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ijazah`
--

INSERT INTO `ijazah` (`id_ijazah`, `no_ijazah`, `tahun_lulus`, `nim`) VALUES
(1, 1234567890, '0000-00-00', 1177050099),
(2, 12123244, '0000-00-00', 1177050127),
(3, 1029384756, '1999-04-11', 1177050066);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode`, `nama`) VALUES
(701, 'MATEMATIKA'),
(702, 'BIOLOGI'),
(703, 'FISIKA'),
(704, 'KIMIA'),
(705, 'TEKNIK INFORMATIKA'),
(706, 'AGROTEKNOLOGi'),
(707, 'TEKNIK ELEKTRO');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `id_jurusan`, `username`, `status`) VALUES
('1177050066', 'Muhammad Alwan Andika', 'Purwakarta', '1999-04-11', 'Laki-laki', 705, 'speetza', 2),
('1177050099', 'Rifqi Sambas Khairurrohman', '', '0000-00-00', 'Laki-laki', 705, 'rifqisambas', 2),
('1177050127', 'Fahmi Fauzi Kadarmanto', 'Bandung', '1999-06-30', 'Laki-laki', 705, 'fkadarmanto', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ijazah`
--
ALTER TABLE `ijazah`
  ADD PRIMARY KEY (`id_ijazah`),
  ADD UNIQUE KEY `FK_MAHASISWA` (`nim`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `FK_AKUN` (`username`),
  ADD KEY `FK_JURUSAN` (`id_jurusan`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ijazah`
--
ALTER TABLE `ijazah`
  MODIFY `id_ijazah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
