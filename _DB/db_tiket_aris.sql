-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Apr 2018 pada 08.02
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket_aris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `airport`
--

CREATE TABLE `airport` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `abbr` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `airport`
--

INSERT INTO `airport` (`id`, `name`, `city`, `abbr`) VALUES
('BUAMB004', 'Pattimura', 'AMBON', 'AMB'),
('BUBDO003', 'Husein Sastranegara', 'BANDUNG', 'BDO'),
('BULBG002', 'LEMBANG', 'LEMBANG', 'LBG'),
('BUSKN001', 'SUKARNO', 'JAKARTA', 'SKN'),
('BUSUB004', 'Juanda', 'SURABAYA', 'SUB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` varchar(100) NOT NULL,
  `identity_card_no` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `identity_card_no`, `name`, `address`, `phone`, `gender`) VALUES
('CUST0001', '130500', 'ARIS', 'CILAKU', '08381712289123', 'Male'),
('CUST0002', '1238', 'UDI', 'KKOPL', '0838012312', 'Male'),
('CUST0003', '00990900', 'LUTHFI WINATA', 'CIPANAS', '08123123123', 'Male'),
('CUST0004', '778899778899', 'Kaka Ramlan', 'CILAKU', '08951238237231', 'Male'),
('CUST0005', '123456', 'Udin', 'Kopasus 7 6 7', '080912313231', 'Male'),
('CUST0006', '138', 'OMPRENG', 'SQUAD', '089123123', 'Male'),
('CUST0007', '190123', 'Udin', 'Kp. Nagrak', '90123901231231', 'Male'),
('CUST0008', '19812312', 'Uding', 'Kampang', '01283123123', 'Male'),
('CUST0009', '054231233', 'Kisama', 'Omedetou', '09123123', 'Female'),
('CUST0010', '4444', 'AWE', 'EW', '123123', 'Female'),
('CUST0012', '3000300123', 'Ohsan', 'Osaki Sopari Panja', '08323123', 'Male'),
('CUST0013', '902130', 'Uved', '123123', '123123', 'Male'),
('CUST0015', '0091230231', 'Ari', '09123213', '08213123', 'Male'),
('CUST0016', '012395488334', 'VIOLA', 'MELBOUJ', '123123123', 'Female'),
('CUST0017', '856678021400024', 'Manshur', 'Cipindang', '09981238991283', 'Male'),
('CUST0018', '856678021400055', 'Bunta', 'Ohio', '08123123123', 'Male'),
('CUST0019', '789342412374895', 'AZX', 'QWE', '123123123', 'Male'),
('CUST0020', '98124734233', 'Komplex', 'Ohoy', '123123213', 'Male'),
('CUST0021', '46589223132121', 'Iop', '1231', '9304234', 'Male'),
('CUST0022', '48774654465464', 'Opop', '123123', '213123', 'Female'),
('CUST0023', '785424521312', 'Aris H', 'Cilaku', '082141324324', 'Male'),
('CUST0024', '986544131857', 'Luffy', 'Pinang', '123123123', 'Female'),
('CUST0025', '78988845', 'Aris', 'Cilaku', '08123789123', 'Male'),
('CUST0026', '7755884455', 'Dante', 'Inferno', '4787454645', 'Male'),
('CUST0027', '5868745613247', 'Asifa', 'KOKO', '123123123', 'Male'),
('CUST0028', '7788996631221', 'ARIS', 'CIANJUR', '089123123', 'Male'),
('CUST0029', '89995477456', 'OP', 'OP', '213123', 'Male'),
('CUST0030', '10101010', 'Horrible Taste', 'Hindian', '08192318123', 'Male'),
('CUST0031', '10201020', 'Good Taste', 'Hindian', '19012390123', 'Female'),
('CUST0032', '10301030', 'Defined Area', 'On my way', '089128317123', 'Male');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` varchar(100) NOT NULL,
  `reservation_code` varchar(100) DEFAULT NULL,
  `reservation_date` datetime DEFAULT NULL,
  `customerid` varchar(100) DEFAULT NULL,
  `depart_date` date DEFAULT NULL,
  `seat_code` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `ruteid` varchar(100) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_code`, `reservation_date`, `customerid`, `depart_date`, `seat_code`, `price`, `ruteid`, `userid`) VALUES
('REV201802090001', 'RESCWXG6V404', '2018-02-08 07:02:18', 'CUST0001', '2018-02-28', 'TR0002_3A', 30000, 'RUTE20180001', 'US0001'),
('REV201802090002', 'RESCWXG6V404', '2018-02-08 07:02:18', 'CUST0006', '2018-02-28', 'TR0002_3D', 30000, 'RUTE20180001', 'US0001'),
('REV201802090003', 'RESZGYK8J404', '2018-02-09 07:02:08', 'CUST0003', '2018-02-28', 'AR0004_4D', 20000, 'RUTE20180008', 'US0001'),
('REV201802090004', 'RESZGYK8J404', '2018-02-09 07:02:08', 'CUST0007', '2018-02-28', 'AR0004_2C', 20000, 'RUTE20180008', 'US0001'),
('REV201802090005', 'RESZGYK8J404', '2018-02-09 07:02:08', 'CUST0016', '2018-02-28', 'AR0004_3B', 20000, 'RUTE20180008', 'US0001'),
('REV201802090006', 'RES32N3H3404', '2018-02-09 19:02:47', 'CUST0017', '2018-02-28', 'AR0004_6A', 20000, 'RUTE20180008', 'US0001'),
('REV201802090007', 'RES32N3H3404', '2018-02-09 19:02:47', 'CUST0018', '2018-02-28', 'AR0004_6B', 20000, 'RUTE20180008', 'US0001'),
('REV201802090008', 'RES8E1MJ2404', '2018-02-09 20:02:46', 'CUST0019', '2018-02-28', 'AR0004_6D', 20000, 'RUTE20180008', 'US0001'),
('REV201802140009', 'RESP5JYRT404', '2018-02-14 09:02:08', 'CUST0020', '2018-02-28', 'AI0001_1A', 400000, 'RUTE20180009', 'US0001'),
('REV201802140010', 'RESH3G0XC404', '2018-02-14 09:02:24', 'CUST0021', '2018-02-28', 'AI0001_1B', 400000, 'RUTE20180009', 'US0001'),
('REV201802140012', 'RESXR6BCY404', '2018-02-14 09:02:01', 'CUST0015', '2018-02-28', 'TR0003_1B', 300000, 'RUTE20180006', 'US0001'),
('REV201802140013', 'RESXR6BCY404', '2018-02-14 09:02:01', 'CUST0012', '2018-02-28', 'TR0003_1C', 300000, 'RUTE20180006', 'US0001'),
('REV201802140014', 'RES20BRBM404', '2018-02-14 09:02:48', 'CUST0009', '2018-02-28', 'TR0003_1D', 300000, 'RUTE20180006', 'US0001'),
('REV201802140015', 'RES20BRBM404', '2018-02-14 09:02:48', 'CUST0008', '2018-02-28', 'TR0003_2A', 300000, 'RUTE20180006', 'US0001'),
('REV201802140016', 'RESWOCT7A404', '2018-02-14 09:02:11', 'CUST0023', '2018-02-28', 'AI0001_1C', 400000, 'RUTE20180009', 'US0001'),
('REV201802140017', 'RESWOCT7A404', '2018-02-14 16:02:11', 'CUST0024', '2018-02-28', 'AI0001_1D', 400000, 'RUTE20180009', 'US0001'),
('REV201802140018', 'RES43B3GS404', '2018-02-14 10:02:58', 'CUST0025', '2018-02-28', 'TR0003_1A', 300000, 'RUTE20180006', 'US0001'),
('REV201802140019', 'RESXW5AOW404', '2018-02-14 11:02:51', 'CUST0027', '2018-02-28', 'SR0005_1A', 900000, 'RUTE20180010', 'US0001'),
('REV201802140020', 'RESBDX12K404', '2018-02-14 14:02:39', 'CUST0013', '2018-02-28', 'LI0006_2B', 600000, 'RUTE20180013', 'US0001'),
('REV201802140021', 'RESHVXHC7404', '2018-02-14 15:02:25', 'CUST0028', '2018-02-28', 'LI0006_3D', 600000, 'RUTE20180013', 'US0001'),
('REV201802140022', 'RESHVXHC7404', '2018-02-14 15:02:25', 'CUST0029', '2018-02-28', 'LI0006_2D', 600000, 'RUTE20180013', 'US0001'),
('REV201804060023', 'RESFPCA1T404', '2018-04-06 08:04:52', 'CUST0001', '2018-04-14', 'TR0002_2A', 123000, 'RUTE20180003', 'US0001'),
('REV201804060024', 'RESJWTW17404', '2018-04-06 08:04:23', 'CUST0030', '2018-04-14', 'TR0002_1A', 123000, 'RUTE20180003', 'US0001'),
('REV201804060025', 'RESJWTW17404', '2018-04-06 08:04:23', 'CUST0031', '2018-04-14', 'TR0002_1C', 123000, 'RUTE20180003', 'US0001'),
('REV201804060026', 'RESJWTW17404', '2018-04-06 08:04:23', 'CUST0032', '2018-04-14', 'TR0002_1B', 123000, 'RUTE20180003', 'US0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id` varchar(100) NOT NULL,
  `rute_from` varchar(100) DEFAULT NULL,
  `rute_to` varchar(100) DEFAULT NULL,
  `depart` time DEFAULT NULL,
  `arrive` time DEFAULT NULL,
  `price` double DEFAULT NULL,
  `transportationid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id`, `rute_from`, `rute_to`, `depart`, `arrive`, `price`, `transportationid`) VALUES
('RUTE20180001', 'STGMR001', 'STBDG002', '10:00:00', '12:00:00', 30000, 'TR20180002'),
('RUTE20180002', 'STGMR001', 'STBTM002', '00:00:00', '07:00:00', 30000, 'TR20180002'),
('RUTE20180003', 'STBDG002', 'STBTM002', '10:00:00', '00:00:00', 123000, 'TR20180002'),
('RUTE20180005', 'STBDG002', 'STSDJ003', '10:00:00', '20:00:00', 200000, 'TR20180002'),
('RUTE20180006', 'STBDG002', 'STSDJ003', '10:00:00', '21:00:00', 300000, 'TR20180003'),
('RUTE20180007', 'STSDJ003', 'STBDG002', '10:00:00', '20:00:00', 120000, 'TR20180004'),
('RUTE20180008', 'STBDG002', 'STBGR003', '10:00:00', '12:00:00', 20000, 'TR20180004'),
('RUTE20180009', 'BULBG002', 'BUSKN001', '10:00:00', '12:00:00', 400000, 'TR20180001'),
('RUTE20180010', 'BUBDO003', 'BULBG002', '10:00:00', '15:00:00', 900000, 'TR20180005'),
('RUTE20180011', 'BUSUB004', 'BUSKN001', '10:00:00', '13:00:00', 90000, 'TR20180006'),
('RUTE20180012', 'BUSUB004', 'BUSKN001', '19:00:00', '21:00:00', 600000, 'TR20180006'),
('RUTE20180013', 'BUSKN001', 'BUBDO003', '16:00:00', '21:00:00', 600000, 'TR20180006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stasiun`
--

CREATE TABLE `stasiun` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `abbr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stasiun`
--

INSERT INTO `stasiun` (`id`, `name`, `city`, `abbr`) VALUES
('STBDG002', 'BANDUNG', 'BANDUNG', 'BDG'),
('STBGR003', 'BOGOR', 'BOGOR', 'BGR'),
('STBTM002', 'BATAM', 'BATAM', 'BTM'),
('STGMR001', 'GAMBIR', 'JAKARTA', 'GMR'),
('STJBG001', 'STASIUN JOMBANG', 'JOMBANG', 'JBG'),
('STMJL001', 'MAJALENGKA', 'MAJALENGKA', 'MJL'),
('STPAP003', 'PAPUA', 'PAPUA', 'PAP'),
('STPDG003', 'PADANG', 'PADANG', 'PDG'),
('STSDJ003', 'SIDOARJO', 'SIDOARJO', 'SDJ'),
('STSKB004', 'SUKABUMI', 'SUKABUMI', 'SKB'),
('STSKH003', 'SUKOHARJO', 'WONOGIRI', 'SKH'),
('STSMP001', 'SEMPER', 'NEW GUENEA', 'SMP'),
('STSMR002', 'SEMARANG', 'SEMARANG', 'SMR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportation`
--

CREATE TABLE `transportation` (
  `id` varchar(100) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `seat_qty` int(11) DEFAULT NULL,
  `transportation_typeid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transportation`
--

INSERT INTO `transportation` (`id`, `code`, `description`, `seat_qty`, `transportation_typeid`) VALUES
('TR20180001', 'F728DPF33AE7', 'AIRPLANE OF THE YEAR - TITANIUM ULTIMATUM', 40, 'TTP0001'),
('TR20180002', 'FWS2WDK7AH13', 'TRAIN TO BUSAN', 20, 'TTP0002'),
('TR20180003', 'KFW57E167Y51', 'TRAIN TO JANNAH', 12, 'TTP0002'),
('TR20180004', 'VPDD9EY405W5', 'ARGO PARAHYANGAN CLASS C', 24, 'TTP0002'),
('TR20180005', '94RZJ8MD0Y6X', 'SRIWIJAYA AIR', 180, 'TTP0001'),
('TR20180006', '0Y2ZZ98KERW0', 'LION AIR', 60, 'TTP0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportation_type`
--

CREATE TABLE `transportation_type` (
  `id` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transportation_type`
--

INSERT INTO `transportation_type` (`id`, `description`) VALUES
('TTP0001', 'AIRPLANE'),
('TTP0002', 'TRAIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `remember_token` varchar(400) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_user`, `username`, `password`, `fullname`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'US0001', 'arishasan4', '$2y$10$QkV2e3D2XRqud90B0p.wrOUhXTuXJ1wP9HHiZmU0EHM/cCCxyYPlu', 'ARIS HASAN UBAIDILLAH', 'SUPER ADMIN', 'C7QZYvzsptDGDOKNsmR2D9ocUvBb9gEzHCUcz2CjZSwhrWBmt1jeKbsBjn5g', '2018-01-15', '2018-01-19'),
(5, 'US0002', 'operator', '$2y$10$Ch6BZyjJVeEyiiOggt.UyONQb5CGyYYSFD5qbIcwrM53VLkPY48gW', 'OPERATOR', 'Operator', 'SQYXtTs1IWSxoOmXu5avTxR9KWeMA3JwitlD8DkEUw5GqTKVtH6oW7eiwsgT', '2018-01-19', '2018-01-19'),
(7, 'US0003', 'admin', '$2y$10$DbRB5JlKOvJxYZ0MtmXDHOL2/YlAIFpjkiAuucjxA/lxozcQYqY8K', 'ADMIN', 'Admin', 'SHI6SNijIdR9zpNLVV22FC7mLe2CiNiKaPMZPg8kDtXp0e4uY5mlAk2pgfVF', '2018-01-19', '2018-01-19'),
(8, 'US0004', 'opo', '$2y$10$nj2g5KlaWS97yBp1bLwaZulh0A0uijsbUAXZTgd.DX81V35cpSpzO', 'Opo ae lah', 'Admin', NULL, '2018-01-30', '2018-01-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation_type`
--
ALTER TABLE `transportation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
