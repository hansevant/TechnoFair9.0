-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 08:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bemfikti_technofair`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_user`
--

CREATE TABLE `acc_user` (
  `id_user` int(3) NOT NULL,
  `id_comp` int(1) NOT NULL,
  `nama_tim` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `stat_acc` int(1) NOT NULL COMMENT '0=Open Regis, 1=Close Regis\r\n2 = open pengumuman',
  `stat_final` int(1) NOT NULL COMMENT '0=pending, 1=gagal, 2=lolos',
  `forgot_pass` int(11) DEFAULT 0 COMMENT '0 aman 1 lupa password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_user`
--

INSERT INTO `acc_user` (`id_user`, `id_comp`, `nama_tim`, `username`, `password`, `instansi`, `stat_acc`, `stat_final`, `forgot_pass`) VALUES
(1, 2, 'test', 'test', '*D95B9BCB49A61B63DCDB784718FAE78FC7852D28', 'test', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `username`, `password`) VALUES
(1, 'admin', '*3AFD86914FC3794957E5F32C645E836CEA38AD34');

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `id_comp` int(1) NOT NULL,
  `jenis_comp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`id_comp`, `jenis_comp`) VALUES
(1, 'Infographic'),
(2, 'Capture The Flag'),
(3, 'Smart FIKTI'),
(4, 'UX Design');

-- --------------------------------------------------------

--
-- Table structure for table `user_anggota`
--

CREATE TABLE `user_anggota` (
  `id_anggota` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `kelas_anggota` varchar(20) DEFAULT NULL,
  `jurusan_anggota` varchar(150) DEFAULT NULL,
  `email_anggota` varchar(150) DEFAULT NULL,
  `nohp_anggota` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_berkas`
--

CREATE TABLE `user_berkas` (
  `id_berkas` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `berkas` varchar(150) DEFAULT NULL,
  `stat_berkas` int(1) DEFAULT NULL COMMENT '0=belum input, 1=berhasil, 2=gagal, 3=approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_berkas`
--

INSERT INTO `user_berkas` (`id_berkas`, `id_user`, `berkas`, `stat_berkas`) VALUES
(1, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_ketua`
--

CREATE TABLE `user_ketua` (
  `id_ketua` int(3) NOT NULL,
  `id_user` int(3) NOT NULL COMMENT 'dibuat unique karna hanya boleh menjadi ketua di 1 lomba',
  `nama_ketua` varchar(100) DEFAULT NULL,
  `kelas_ketua` varchar(20) DEFAULT NULL,
  `jurusan_ketua` varchar(100) DEFAULT NULL,
  `idline_ketua` varchar(50) DEFAULT NULL,
  `nohp_ketua` varchar(20) DEFAULT NULL,
  `email_ketua` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `id_payment` int(11) NOT NULL,
  `id_user` int(1) NOT NULL,
  `payment` varchar(100) DEFAULT NULL,
  `stat_payment` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`id_payment`, `id_user`, `payment`, `stat_payment`) VALUES
(1, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `webinar`
--

CREATE TABLE `webinar` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `asal` varchar(99) NOT NULL,
  `instansi` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `idline` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `event` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `asal` varchar(99) NOT NULL,
  `instansi` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `idline` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `event` varchar(99) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `stat_payment` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_user`
--
ALTER TABLE `acc_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_comp` (`id_comp`);

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id_comp`);

--
-- Indexes for table `user_anggota`
--
ALTER TABLE `user_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_berkas`
--
ALTER TABLE `user_berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_ketua`
--
ALTER TABLE `user_ketua`
  ADD PRIMARY KEY (`id_ketua`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `id_comp` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_anggota`
--
ALTER TABLE `user_anggota`
  MODIFY `id_anggota` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_berkas`
--
ALTER TABLE `user_berkas`
  MODIFY `id_berkas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_ketua`
--
ALTER TABLE `user_ketua`
  MODIFY `id_ketua` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acc_user`
--
ALTER TABLE `acc_user`
  ADD CONSTRAINT `acc_user_ibfk_1` FOREIGN KEY (`id_comp`) REFERENCES `competition` (`id_comp`);

--
-- Constraints for table `user_anggota`
--
ALTER TABLE `user_anggota`
  ADD CONSTRAINT `user_anggota_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `acc_user` (`id_user`);

--
-- Constraints for table `user_berkas`
--
ALTER TABLE `user_berkas`
  ADD CONSTRAINT `user_berkas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `acc_user` (`id_user`);

--
-- Constraints for table `user_ketua`
--
ALTER TABLE `user_ketua`
  ADD CONSTRAINT `user_ketua_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `acc_user` (`id_user`);

--
-- Constraints for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD CONSTRAINT `user_payment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `acc_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
