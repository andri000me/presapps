-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 11:16 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presapps`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitjamkerja` (`id` INT) RETURNS TIME begin
  declare lama time;
  select subtime(jam_pulang, jam_datang) 
  from kehadiran 
  WHERE id_kehadiran = id
  into lama;
  return lama;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `akun_pengguna`
--

CREATE TABLE `akun_pengguna` (
  `nik` char(7) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `hak_akses` enum('Admin','Staff') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_pengguna`
--

INSERT INTO `akun_pengguna` (`nik`, `password`, `hak_akses`) VALUES
('218002', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin'),
('418004', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kehadiran`
--

CREATE TABLE `detail_kehadiran` (
  `id_detail_kehadiran` int(11) NOT NULL,
  `id_kehadiran` int(11) DEFAULT NULL,
  `jam_kerja` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kehadiran`
--

INSERT INTO `detail_kehadiran` (`id_detail_kehadiran`, `id_kehadiran`, `jam_kerja`) VALUES
(1, 1, '08:30:00'),
(2, 2, '08:30:00'),
(3, 3, '07:10:00'),
(4, 4, '07:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `hitung`
--

CREATE TABLE `hitung` (
  `label` varchar(5) NOT NULL,
  `nomor` int(3) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hitung`
--

INSERT INTO `hitung` (`label`, `nomor`) VALUES
('nik', 001);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Programmer'),
(2, 'Analisis'),
(3, 'Android Dev'),
(4, 'Bisnis Develop');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` char(7) NOT NULL,
  `nama_lengkap` varchar(25) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `no_hp` char(13) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_lengkap`, `jenis_kelamin`, `id_jabatan`, `no_hp`, `alamat`) VALUES
('118001', 'Ahmad', 'Pria', 1, '085123456789', 'Jalan 1'),
('218002', 'Lutfi', 'Pria', 2, '087812345678', 'Jalan 2'),
('318003', 'Sidiq', 'Pria', 3, '082312345678', 'Jalan 3'),
('418004', 'Nidia', 'Wanita', 4, '085712345678', 'Jalan 4');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `nik` char(7) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_datang` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `nik`, `tanggal`, `jam_datang`, `jam_pulang`) VALUES
(1, '118001', '2018-02-19', '07:30:00', '16:00:00'),
(2, '118001', '2018-02-20', '08:00:00', '16:30:00'),
(3, '418004', '2018-02-19', '07:50:00', '17:00:00'),
(4, '218002', '2018-02-19', '08:10:00', '17:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_pengguna`
--
ALTER TABLE `akun_pengguna`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `detail_kehadiran`
--
ALTER TABLE `detail_kehadiran`
  ADD PRIMARY KEY (`id_detail_kehadiran`),
  ADD KEY `id_kehadiran` (`id_kehadiran`);

--
-- Indexes for table `hitung`
--
ALTER TABLE `hitung`
  ADD PRIMARY KEY (`label`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kehadiran`
--
ALTER TABLE `detail_kehadiran`
  MODIFY `id_detail_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun_pengguna`
--
ALTER TABLE `akun_pengguna`
  ADD CONSTRAINT `akun_pengguna_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_kehadiran`
--
ALTER TABLE `detail_kehadiran`
  ADD CONSTRAINT `detail_kehadiran_ibfk_1` FOREIGN KEY (`id_kehadiran`) REFERENCES `kehadiran` (`id_kehadiran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
