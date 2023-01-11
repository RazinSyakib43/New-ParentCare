-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 09:10 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parentcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `jk`, `tgl_lahir`, `foto`, `alamat`, `tlp`) VALUES
('A001', 'Suryani', 'Wanita', '2002-01-14', 'messages-2.jpg', 'Bandung', '0895620061623');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `nama`, `gender`, `alamat`, `tlp`, `foto`) VALUES
('C001', 'Suryani Lestari', 'Pria', 'Bandung\r\nMargaasih', '0895620061623', 'messages-2.jpg'),
('C002', 'Siti', 'Wanita', 'Cimahi', '089567291234', 'messages-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `id_detail` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL,
  `id_paket` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `no_rek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`id_detail`, `id_trans`, `id_paket`, `harga`, `no_rek`) VALUES
(2, 1, 'P003', 400000, '1308976278162'),
(4, 4, 'P003', 400000, '1308976278162');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_dokter`
--

CREATE TABLE `tb_detail_dokter` (
  `id_detail` int(11) NOT NULL,
  `id_dokter` varchar(15) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_dokter`
--

INSERT INTO `tb_detail_dokter` (`id_detail`, `id_dokter`, `id_jadwal`) VALUES
(1, 'D001', 1),
(2, 'D001', 5),
(3, 'D001', 9),
(4, 'D002', 3),
(5, 'D002', 8),
(6, 'D002', 10),
(7, 'D003', 2),
(8, 'D003', 4),
(9, 'D004', 6),
(10, 'D004', 7),
(11, 'D004', 11),
(12, 'D004', 13),
(13, 'D003', 12),
(14, 'D003', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_inv`
--

CREATE TABLE `tb_detail_inv` (
  `id_detail` int(11) NOT NULL,
  `id_inv` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keahlian` enum('Psikolog','Psikiater') NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id`, `nama`, `jk`, `tlp`, `alamat`, `keahlian`, `foto`) VALUES
('D001', ' Kori Dyah Wiratikta, M.Psi, Psikolog', 'Wanita', '081245783912', 'Bandung', 'Psikolog', 'Kori Dyah W.,S.Psi.jpg'),
('D002', 'dr. Tri Kumoroyekti, Sp.KJ', 'Wanita', '086756472917', 'Cimahi', 'Psikiater', 'dr. Tri Kumoroyekti, Sp.KJ.png'),
('D003', ' dr. Herlina Pohan, Sp.KJ', 'Wanita', '08978675678', 'Yogyakarta', 'Psikiater', 'dr. Herlina Pohan, SpKJ.jpg'),
('D004', 'dr. Musinggih Djarot Roujani, Sp.KJ', 'Pria', '08392873826', 'Yogyakarta', 'Psikiater', 'dr. Musinggih Djarot Roujani, Sp.KJ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(15) NOT NULL,
  `hari` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `waktu` enum('09.00','16.00') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `hari`, `waktu`) VALUES
(1, 'Monday', '09.00'),
(2, 'Monday', '16.00'),
(3, 'Tuesday', '09.00'),
(4, 'Tuesday', '16.00'),
(5, 'Wednesday', '09.00'),
(6, 'Wednesday', '16.00'),
(7, 'Thursday', '09.00'),
(8, 'Thursday', '16.00'),
(9, 'Friday', '09.00'),
(10, 'Friday', '16.00'),
(11, 'Saturday', '09.00'),
(12, 'Saturday', '16.00'),
(13, 'Sunday', '09.00'),
(14, 'Sunday', '16.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `id_cust` varchar(15) NOT NULL,
  `jadwal` varchar(15) DEFAULT NULL,
  `waktu` varchar(15) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `harga_paket` int(11) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `insertedAt` date DEFAULT NULL,
  `buktiBayar` varchar(100) DEFAULT NULL,
  `tglReservasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id`, `id_cust`, `jadwal`, `waktu`, `paket`, `harga_paket`, `no_rek`, `insertedAt`, `buktiBayar`, `tglReservasi`) VALUES
(1, 'C001', 'Thursday', '09.00', 'Paket Premier', 400000, '1308976278162', '2022-12-08', 'IMG-20200119-WA0045.jpg', '2022-12-08'),
(2, 'C001', 'Thursday', '09.00', 'Paket Premier', 400000, '1308976278162', '2022-12-08', 'IMG-20200119-WA0045.jpg', '2022-12-08'),
(3, 'C001', 'Sunday', '09.00', 'Paket Premier', 400000, '1308976278162', '2022-12-11', '', '2022-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(15) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `paket`, `harga`) VALUES
('P001', 'Paket Basic', 150000),
('P002', 'Paket Wellness', 280000),
('P003', 'Paket Premier', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `no_rek` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`no_rek`, `atas_nama`, `bank`) VALUES
('1308976278162', 'ParentCare', 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `id_user`, `deskripsi`, `tgl`) VALUES
('C003', 'C002', 'Yuk coba ParentCare, lebih tau lebih peduli', '2022-12-07'),
('T001', 'C001', 'Sangat membantu saya dalam memahami cara perkembangan anak saya. terima kasih ParentCare', '2022-12-02'),
('T002', 'C002', 'Website ParentCare sangat membantu', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_dokter` varchar(15) NOT NULL,
  `id_cust` varchar(15) NOT NULL,
  `total` int(11) NOT NULL,
  `tglReservasi` date NOT NULL,
  `status` enum('pending','success','fail') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_dokter`, `id_cust`, `total`, `tglReservasi`, `status`) VALUES
(1, 'D004', 'C001', 400000, '2022-12-08', 'pending'),
(2, 'D004', 'C001', 400000, '2022-12-08', 'pending'),
(4, 'D004', 'C001', 400000, '2022-12-11', 'pending'),
(5, 'D004', 'C001', 400000, '2022-12-11', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `pass`, `email`, `level`) VALUES
('A001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Admin'),
('C001', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'suryanilestari123@gmail.com', 'User'),
('C002', 'siti', 'db04eb4b07e0aaf8d1d477ae342bdff9', 'siti@gmail.com', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_trans` (`id_trans`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `no_rek` (`no_rek`);

--
-- Indexes for table `tb_detail_dokter`
--
ALTER TABLE `tb_detail_dokter`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `tb_detail_dokter` (`id_dokter`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `tb_detail_inv`
--
ALTER TABLE `tb_detail_inv`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cust` (`id_cust`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`no_rek`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `tb_testimoni` (`id_user`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_cust` (`id_cust`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_detail_dokter`
--
ALTER TABLE `tb_detail_dokter`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD CONSTRAINT `tb_detail_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `tb_transaksi` (`id`),
  ADD CONSTRAINT `tb_detail_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`),
  ADD CONSTRAINT `tb_detail_ibfk_3` FOREIGN KEY (`no_rek`) REFERENCES `tb_rekening` (`no_rek`);

--
-- Constraints for table `tb_detail_dokter`
--
ALTER TABLE `tb_detail_dokter`
  ADD CONSTRAINT `tb_detail_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id`),
  ADD CONSTRAINT `tb_detail_dokter_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id`);

--
-- Constraints for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`id_cust`) REFERENCES `tb_customer` (`id`);

--
-- Constraints for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD CONSTRAINT `tb_testimoni` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_cust`) REFERENCES `tb_customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
