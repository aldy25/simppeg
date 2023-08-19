-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 02:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simppeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keahlian`
--

CREATE TABLE `tbl_keahlian` (
  `id_keahlian` int(255) NOT NULL,
  `keahlian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_keahlian`
--

INSERT INTO `tbl_keahlian` (`id_keahlian`, `keahlian`) VALUES
(2, 'Editing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lamaran`
--

CREATE TABLE `tbl_lamaran` (
  `id_lamaran` int(255) NOT NULL,
  `lowongan` int(255) NOT NULL,
  `pelamar` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lamaran`
--

INSERT INTO `tbl_lamaran` (`id_lamaran`, `lowongan`, `pelamar`, `status`, `pesan`) VALUES
(1, 1, 3, 'Diproses', 'sabar ya kita proses dulu'),
(3, 1, 4, 'Ditolak', 'nn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `id_lowongan` int(255) NOT NULL,
  `nama_lowongan` varchar(255) NOT NULL,
  `status_lowongan` varchar(50) NOT NULL,
  `kriteria` text NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `umur` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `deskripsi_lowongan` text NOT NULL,
  `gaji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lowongan`
--

INSERT INTO `tbl_lowongan` (`id_lowongan`, `nama_lowongan`, `status_lowongan`, `kriteria`, `pendidikan`, `umur`, `jenkel`, `deskripsi_lowongan`, `gaji`) VALUES
(1, 'Resevsionis', 'Open', 'pria                       ', 'S1/D4', '30', 'Perempuan', 'Memberikan informasi kepada pengunjung yang datang\r\n                                                ', '2 juta - 3,5 juta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelamar`
--

CREATE TABLE `tbl_pelamar` (
  `id_pelamar` int(255) NOT NULL,
  `user` int(255) NOT NULL,
  `profile` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat_domisili` text NOT NULL,
  `hobi` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `nama_sekola` varchar(255) NOT NULL,
  `pengalaman_organisasi` text NOT NULL,
  `pengalaman_kerja` text NOT NULL,
  `ijazah_terakhir` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `portofolio` varchar(255) NOT NULL,
  `sertifikat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelamar`
--

INSERT INTO `tbl_pelamar` (`id_pelamar`, `user`, `profile`, `nama_lengkap`, `nama_panggilan`, `tanggal_lahir`, `no_hp`, `alamat_domisili`, `hobi`, `pendidikan_terakhir`, `nama_sekola`, `pengalaman_organisasi`, `pengalaman_kerja`, `ijazah_terakhir`, `cv`, `portofolio`, `sertifikat`) VALUES
(3, 4, 'aku pelamar', 'ee', 'df', '2023-05-16', '8777', 'contoh', 'contoh', 'S2', 'unja', 'jhdjhfjs', 'jhdjhfjs', '1688400790_5e61f72332c1b4bfd461.pdf', '1688400790_277e63cf690d2ce94359.pdf', '1688400790_8a5c08501690031c894c.pdf', '1688400790_21f10d1fd9dd5e6c36fd.pdf'),
(4, 5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skil`
--

CREATE TABLE `tbl_skil` (
  `id_skil` int(255) NOT NULL,
  `user` int(255) NOT NULL,
  `keahlian` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_skil`
--

INSERT INTO `tbl_skil` (`id_skil`, `user`, `keahlian`) VALUES
(1, 4, 2),
(2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_syarat_keahlian`
--

CREATE TABLE `tbl_syarat_keahlian` (
  `id_syarat` int(255) NOT NULL,
  `lowongan` int(255) NOT NULL,
  `keahlian` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_syarat_keahlian`
--

INSERT INTO `tbl_syarat_keahlian` (`id_syarat`, `lowongan`, `keahlian`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `nama`, `jk`, `foto`, `status`) VALUES
(1, 'admin', '$2y$10$4SIzqlKsoReusyZzSZtZm.z51Oo8Lyr5ueAGqTMEFQYfAdt3fHykK', 'Admin', 'aldy nifratama', 'Laki-Laki', '1672075711_eb41d5bee44fd34541d8.png', 'ON'),
(4, 'aldy25', '$2y$10$jZiidvh/ZxuLgBrlg3Ge4.4ppeWPmsUkBm7nVbI.zlih1yjDRP0hK', 'Pelamar', 'Aldy Nifratama', 'Laki-Laki', '1688402660_0ff71909eb231011c12b.png', 'ON'),
(5, 'itaaaa', '$2y$10$iKgHPzc5Gc0mFV368MeWZuoGqejvxXE3wnFS0CqHqmM1roG3Yh4h2', 'Pelamar', 'ita sulistiani', 'Perempuan', '', 'ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_keahlian`
--
ALTER TABLE `tbl_keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indexes for table `tbl_lamaran`
--
ALTER TABLE `tbl_lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `lowongan` (`lowongan`),
  ADD KEY `pelamar` (`pelamar`);

--
-- Indexes for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `tbl_pelamar`
--
ALTER TABLE `tbl_pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `tbl_skil`
--
ALTER TABLE `tbl_skil`
  ADD PRIMARY KEY (`id_skil`),
  ADD KEY `user` (`user`),
  ADD KEY `keahlian` (`keahlian`);

--
-- Indexes for table `tbl_syarat_keahlian`
--
ALTER TABLE `tbl_syarat_keahlian`
  ADD PRIMARY KEY (`id_syarat`),
  ADD KEY `lowongan` (`lowongan`),
  ADD KEY `keahlian` (`keahlian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_keahlian`
--
ALTER TABLE `tbl_keahlian`
  MODIFY `id_keahlian` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lamaran`
--
ALTER TABLE `tbl_lamaran`
  MODIFY `id_lamaran` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  MODIFY `id_lowongan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pelamar`
--
ALTER TABLE `tbl_pelamar`
  MODIFY `id_pelamar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_skil`
--
ALTER TABLE `tbl_skil`
  MODIFY `id_skil` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_syarat_keahlian`
--
ALTER TABLE `tbl_syarat_keahlian`
  MODIFY `id_syarat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_lamaran`
--
ALTER TABLE `tbl_lamaran`
  ADD CONSTRAINT `tbl_lamaran_ibfk_1` FOREIGN KEY (`lowongan`) REFERENCES `tbl_lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lamaran_ibfk_2` FOREIGN KEY (`pelamar`) REFERENCES `tbl_pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pelamar`
--
ALTER TABLE `tbl_pelamar`
  ADD CONSTRAINT `tbl_pelamar_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_skil`
--
ALTER TABLE `tbl_skil`
  ADD CONSTRAINT `tbl_skil_ibfk_1` FOREIGN KEY (`keahlian`) REFERENCES `tbl_keahlian` (`id_keahlian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_skil_ibfk_2` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_syarat_keahlian`
--
ALTER TABLE `tbl_syarat_keahlian`
  ADD CONSTRAINT `tbl_syarat_keahlian_ibfk_1` FOREIGN KEY (`keahlian`) REFERENCES `tbl_keahlian` (`id_keahlian`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_syarat_keahlian_ibfk_2` FOREIGN KEY (`lowongan`) REFERENCES `tbl_lowongan` (`id_lowongan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
