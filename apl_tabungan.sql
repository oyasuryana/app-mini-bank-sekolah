-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2021 at 02:54 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apl_tabungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataNasabah`
--

CREATE TABLE `dataNasabah` (
  `NoRekening` char(5) NOT NULL,
  `NamaNasabah` varchar(150) NOT NULL,
  `JenisKelamin` enum('L','P') NOT NULL,
  `TempatLahir` varchar(150) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `NoHandphone` varchar(20) NOT NULL,
  `AlamatNasabah` mediumtext NOT NULL,
  `tglDaftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataNasabah`
--

INSERT INTO `dataNasabah` (`NoRekening`, `NamaNasabah`, `JenisKelamin`, `TempatLahir`, `TanggalLahir`, `NoHandphone`, `AlamatNasabah`, `tglDaftar`) VALUES
('19001', 'Oya Suryana', 'L', 'Kuningan', '2018-07-19', '085224191648', 'Bayuning', '2019-07-01 16:41:58'),
('21002', 'Arfan', 'L', 'Kuningan', '2018-01-01', '085767767', 'Sukamulya', '2021-07-01 21:46:15');

--
-- Triggers `dataNasabah`
--
DELIMITER $$
CREATE TRIGGER `tambahPengguna` AFTER INSERT ON `dataNasabah` FOR EACH ROW BEGIN INSERT INTO dataUser (dataUser.username,dataUser.password,dataUser.namaUser,dataUser.levelUser) VALUES (new.NoRekening,md5(new.TanggalLahir),new.NamaNasabah,'nasabah'); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dataSimpanan`
--

CREATE TABLE `dataSimpanan` (
  `IdSimpanan` int(11) NOT NULL,
  `WaktuTransaksi` datetime NOT NULL,
  `MutasiSimpanan` enum('Simpan','Tarik') NOT NULL,
  `NoRekening` char(5) NOT NULL,
  `Jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataSimpanan`
--

INSERT INTO `dataSimpanan` (`IdSimpanan`, `WaktuTransaksi`, `MutasiSimpanan`, `NoRekening`, `Jumlah`) VALUES
(1, '2019-08-20 22:27:30', 'Simpan', '19001', 100000),
(3, '2019-08-20 22:29:30', 'Simpan', '19001', 75000),
(5, '2019-08-20 22:30:24', 'Simpan', '19001', 50000),
(7, '2019-08-20 22:48:25', 'Tarik', '19001', 30000),
(9, '2019-08-21 08:56:51', 'Simpan', '19001', 75000),
(11, '2019-08-21 08:59:18', 'Tarik', '19001', 25000),
(15, '2019-12-02 10:17:07', 'Simpan', '19001', 30000),
(18, '2019-12-02 20:45:30', 'Tarik', '19001', 100000),
(23, '2020-01-13 12:17:34', 'Simpan', '19001', 50000),
(25, '2020-01-13 12:18:03', 'Tarik', '19001', 75000),
(27, '2021-07-01 04:56:58', 'Simpan', '19001', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `dataUser`
--

CREATE TABLE `dataUser` (
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `namaUser` varchar(30) NOT NULL,
  `levelUser` enum('teller','manager','admin','cs','nasabah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataUser`
--

INSERT INTO `dataUser` (`username`, `password`, `namaUser`, `levelUser`) VALUES
('19001', '90d361bab022769c467d0fdb59c4e382', 'Oya Suryana', 'nasabah'),
('21002', '2576c96285e66bb8420c4278cad2b186', 'Arfan', 'nasabah'),
('ade', '202cb962ac59075b964b07152d234b70', 'Ade Budiono', 'cs'),
('dadi', '202cb962ac59075b964b07152d234b70', 'Dadi Permadi', 'manager'),
('tanti', '202cb962ac59075b964b07152d234b70', 'Tanti ', 'teller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataNasabah`
--
ALTER TABLE `dataNasabah`
  ADD PRIMARY KEY (`NoRekening`);

--
-- Indexes for table `dataSimpanan`
--
ALTER TABLE `dataSimpanan`
  ADD PRIMARY KEY (`IdSimpanan`);

--
-- Indexes for table `dataUser`
--
ALTER TABLE `dataUser`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataSimpanan`
--
ALTER TABLE `dataSimpanan`
  MODIFY `IdSimpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
