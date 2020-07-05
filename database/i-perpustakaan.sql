-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 10:09 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i-perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(90) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `user`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(1, 'ahmad', 'Ahmad Fajar Islami', 'ahmad@gmail.com', 'Request buku MADILOG oleh Tan Malaka', '2019-12-04 03:31:34'),
(2, 'ibnu', 'Ibnu Syina', 'center.tous@gmail.com', 'Sudah bagus', '2019-12-04 05:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `jns_buku` varchar(100) NOT NULL,
  `cover_buku` varchar(100) NOT NULL,
  `file_buku` varchar(100) NOT NULL,
  `filetype` varchar(30) NOT NULL,
  `filedata` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `filesize` varchar(100) NOT NULL,
  `admin_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `nama_buku`, `penerbit`, `pengarang`, `tahun_terbit`, `jns_buku`, `cover_buku`, `file_buku`, `filetype`, `filedata`, `nama_file`, `filesize`, `admin_input`) VALUES
(1, 'Auntumn In Paris', 'fajar islami', 'fajar', 2000, 'Agama', 'upload/cover/autumn-in-paris.jpg', 'upload/file/autumn-in-paris.pdf', 'application/pdf', '%PDF-1.5\r\n%µµµµ\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(en-US) /StructTreeRoot 266 0 R/MarkInfo<<', 'autumn-in-paris.pdf', '809549', 'admin1'),
(2, 'Paduan Hover', 'tes', 'set', 2010, 'Agama', 'upload/cover/panduan-hover.png', 'upload/file/PanduanMembuatCoverE-book.pdf', 'application/pdf', '%PDF-1.6\r%âãÏÓ\r\n43 0 obj\r<</Linearized 1/L 330652/O 46/E 110410/N 5/T 329730/H [ 729 306]>>\rendobj\r ', 'PanduanMembuatCoverE-book.pdf', '330652', 'admin1'),
(3, 'Bunga NDN', 'qwertt', 'aaa', 200, 'Agama', 'upload/cover/Baju NDN.jpg', 'upload/file/Bungga NDN.pdf', 'application/pdf', '%PDF-1.7\r\n%µµµµ\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(id-ID) /StructTreeRoot 14 0 R/MarkInfo<</', 'Bungga NDN.pdf', '110543', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `level` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki - laki','Perempuan') NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_tlp` varchar(100) NOT NULL,
  `tgl_daftar` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`level`, `user`, `password`, `nama`, `tgl_lahir`, `jenis_kelamin`, `email`, `no_tlp`, `tgl_daftar`, `foto`) VALUES
(1, 'admin1', 'admin', 'Admin Utama', '2019-11-01', 'Laki - laki', '', '', '', ''),
(1, 'admin2', '12345', 'Admin kedua', '2000-12-05', 'Laki - laki', '', '', '', ''),
(0, 'ahmad', '12345678', 'Ahmad Fajar Islami', '2000-02-07', 'Laki - laki', 'ahmad@gmail.com', '0852111102800', '2019-12-04 03:16:45', ''),
(0, 'ibnu', 'ibnu', 'Ibnu Syina', '1999-08-28', 'Laki - laki', 'center.tous@gmail.com', '082112153151', '2019-11-29 01:16:51', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
