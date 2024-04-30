-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 01:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sikyta`
--

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan_nasabah`
--

CREATE TABLE IF NOT EXISTS `kunjungan_nasabah` (
    `id_kunjungan` INT AUTO_INCREMENT PRIMARY KEY,
    `nama_nasabah` VARCHAR(34) CHARACTER SET utf8,
    `nomor_rekening` VARCHAR(34) CHARACTER SET utf8,
    `nominal_pipeline` VARCHAR(50) CHARACTER SET utf8 ,
    `status_nasabah` VARCHAR(8) CHARACTER SET utf8,
    `status_potensi` VARCHAR(22) CHARACTER SET utf8,
    `potensi_segmen` VARCHAR(30) CHARACTER SET utf8,
    `no_telepon` VARCHAR(15) CHARACTER SET utf8,
    `tanggal_kunjungan` DATETIME DEFAULT NULL,
    `PIC` VARCHAR(50),
    `giro` VARCHAR(10),
    `tabungan` VARCHAR(10),
    `deposito` VARCHAR(10),
    `kopra` VARCHAR(10),
    `kartu_kredit` VARCHAR(50),
    `KMK` VARCHAR(50),
    `KI` VARCHAR(50),
    `KUM` VARCHAR(50),
    `KUR` VARCHAR(50),
    `KSM` VARCHAR(50),
    `KKP` VARCHAR(50),
    `KPR` VARCHAR(50),
    `SME` VARCHAR(50),
    `Payroll` VARCHAR(50),
    `status_kunjungan` VARCHAR(20),
    `keterangan` VARCHAR(500)
);


INSERT INTO `kunjungan_nasabah` 
(`nama_nasabah`, `nomor_rekening`, `nominal_pipeline`, `status_nasabah`, `status_potensi`, `potensi_segmen`, `no_telepon`, `tanggal_kunjungan`, `PIC`, `giro`, `tabungan`, `deposito`, `kopra`, `kartu_kredit`, `KMK`, `KI`, `KUM`, `KUR`, `KSM`, `KKP`, `KPR`, `SME`, `Payroll`, `status_kunjungan`, `keterangan`)
VALUES 
('PT Kokoh Jaya Fortune', '1170011474756', '100000000', 'BMRI', 'Potensial', 'SME', '627181923', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `potensi_nasabah`
--

CREATE TABLE IF NOT EXISTS `potensi_nasabah` (
    `id_potensi` INT AUTO_INCREMENT PRIMARY KEY,
    `nama` VARCHAR(46) CHARACTER SET utf8,
    `alamat` VARCHAR(200) CHARACTER SET utf8,
    `kota` VARCHAR(13) CHARACTER SET utf8,
    `tipe` VARCHAR(26) CHARACTER SET utf8,
    `klasifikasi_BC` VARCHAR(28) CHARACTER SET utf8,
    `nomor_telepon` BIGINT,
    `email` VARCHAR(26) CHARACTER SET utf8,
    `website` VARCHAR(33) CHARACTER SET utf8,
    `maps` VARCHAR(95) CHARACTER SET utf8,
    `status_kunjungan` VARCHAR(5) CHARACTER SET utf8,
    `PIC` VARCHAR(50) CHARACTER SET utf8
);

INSERT INTO `potensi_nasabah` (`nama`, `alamat`, `kota`, `tipe`, `klasifikasi_BC`, `nomor_telepon`, `email`, `website`, `maps`, `status_kunjungan`, `PIC`) 
VALUES 
('PT SUMBERDIPTA ASIA (Henry Adams)', 'PT SUMBERDIPTA ASIA (Henry Adams), Jl. Taman Ratu Raya Blok D9 No.21, RT.6/RW.13, Duri Kepa, Kebonjeruk, West Jakarta City, Jakarta 11520, Indonesia', 'Jakarta Barat', 'Produksi Pakaian', 'Perdagangan Besar dan Eceran', NULL, 'test@gmail.com', 'http://www.henryadams.co.id/', 'https://www.google.com/maps/place/data=!3m1!4b1!4m2!3m1!1s0x2e69f7ada067d8e9:0x92245966f5a54668', 'Belum', 'Heru'),
('PT. Panatrade Caraka', 'PT. Panatrade Caraka, Jl. Raya Daan Mogot No.151 4, RT.4/RW.5, Duri Kepa, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11510, Indonesia', 'Jakarta Barat', 'Produksi Alat Olahraga', 'Perdagangan Besar dan Eceran', NULL, NULL, 'http://panatrade.id/', 'https://www.google.com/maps/place/data=!3m1!4b1!4m2!3m1!1s0x2e69f64c7a74c557:0xaf72703ff6e73[...]', 'Belum', 'Heru');



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `id_user` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) DEFAULT NULL,
    `pass` VARCHAR(100) DEFAULT NULL,
    `nama` VARCHAR(200) DEFAULT NULL,
    `email` VARCHAR(200) DEFAULT NULL,
    `status` VARCHAR(10) DEFAULT NULL,
    `role` VARCHAR(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `pass`, `nama`, `email`, `status`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'frehanza@gmail.com', 'Aktif', 'Admin'),
(2, 'user', 'user', 'user', 'frehanza@gmail.com', 'Non Aktif', 'Admin'),
--
