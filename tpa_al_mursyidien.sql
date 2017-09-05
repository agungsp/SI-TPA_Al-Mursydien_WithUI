-- phpMyAdmin SQL Dump
-- version 4.6.6deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2017 at 10:53 AM
-- Server version: 5.7.17-1
-- PHP Version: 7.0.16-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpa_al_mursyidien`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `ID_ABSENSI` char(15) NOT NULL,
  `ID_AKTIVITAS` char(15) DEFAULT NULL,
  `ID_PENGAJAR` char(15) DEFAULT NULL,
  `WAKTU_ABSENSI` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`ID_ABSENSI`, `ID_AKTIVITAS`, `ID_PENGAJAR`, `WAKTU_ABSENSI`) VALUES
('tpa-abs1', '1', 'tpa-pgjr1', '2017-08-11'),
('tpa-abs10', '1', 'tpa-pgjr4', '2017-08-15'),
('tpa-abs2', '1', 'tpa-pgjr2', '2017-08-11'),
('tpa-abs3', '2', 'tpa-pgjr2', '2017-08-11'),
('tpa-abs4', '2', 'tpa-pgjr1', '2017-08-11'),
('tpa-abs5', '2', 'tpa-pgjr1', '2017-08-11'),
('tpa-abs6', '1', 'tpa-pgjr2', '2017-08-12'),
('tpa-abs7', '1', 'tpa-pgjr1', '2017-08-12'),
('tpa-abs8', '2', 'tpa-pgjr1', '2017-08-14'),
('tpa-abs9', '1', 'tpa-pgjr4', '2017-08-15');

-- --------------------------------------------------------

--
-- Stand-in structure for view `absensi_upah`
-- (See below for the actual view)
--
CREATE TABLE `absensi_upah` (
`ID_ABSENSI` char(15)
,`ID_AKTIVITAS` char(15)
,`NAMA_AKTIVITAS` varchar(20)
,`ID_PENGAJAR` char(15)
,`WAKTU_ABSENSI` date
,`HONOR_AKTIVITAS` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `ID_AKTIVITAS` char(15) NOT NULL,
  `NAMA_AKTIVITAS` varchar(20) DEFAULT NULL,
  `HONOR_AKTIVITAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`ID_AKTIVITAS`, `NAMA_AKTIVITAS`, `HONOR_AKTIVITAS`) VALUES
('1', 'Rapat', 1000),
('2', 'Koreksi Soal', 2000),
('tpa-aktv3', 'soal', 10000),
('tpa-aktv4', 'Ujian', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `ID_GAJI` char(15) NOT NULL,
  `ID_PENGAJAR` char(15) DEFAULT NULL,
  `JML_BERSIH` int(11) DEFAULT NULL,
  `JML_SELURUH` int(11) DEFAULT NULL,
  `TGL_GAJI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `ID_PENGAJAR` char(15) NOT NULL,
  `NAMA_PENGAJAR` varchar(25) DEFAULT NULL,
  `JABATAN` varchar(10) DEFAULT NULL,
  `TAHUN_MASUK` int(11) DEFAULT NULL,
  `HONOR_ABDI` int(11) DEFAULT NULL,
  `HONOR_JABATAN` int(11) DEFAULT NULL,
  `STATUS_PENGAJAR` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`ID_PENGAJAR`, `NAMA_PENGAJAR`, `JABATAN`, `TAHUN_MASUK`, `HONOR_ABDI`, `HONOR_JABATAN`, `STATUS_PENGAJAR`) VALUES
('tpa-pgjr1', 'Sarah Wijaya. S.Ag', 'Walas', 2017, 100000, 100000, 'Aktif'),
('tpa-pgjr2', 'Adi Khoirudin', 'Walas', 2017, 100000, 100000, 'Aktif'),
('tpa-pgjr3', 'Sholeh', 'Walas', 2017, 100000, 100000, 'Aktif'),
('tpa-pgjr4', 'Rudi Saifulah', 'Walas', 2017, 100000, 100000, 'Aktif'),
('tpa-pgjr5', 'rachmat', 'Bendahara', 2017, 100000, 100000, 'Tidak Aktif'),
('tpa-pgjr6', 'H. Nurul Huda, S.Ag', 'Kepala', 2017, 17500, 50000, 'Aktif'),
('tpa-pgjr7', 'Wiwik Haryati', 'Bendahara', 2017, 5000, 30000, 'Aktif'),
('tpa-pgjr8', 'Ryan Galih', 'Walas', 2017, 100000, 100000, 'Aktif');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rekap_absen`
-- (See below for the actual view)
--
CREATE TABLE `rekap_absen` (
`id_pengajar` char(15)
,`nama_pengajar` varchar(25)
,`nama_aktivitas` varchar(20)
,`honor_aktivitas` int(11)
,`tgl` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rekap_gaji`
-- (See below for the actual view)
--
CREATE TABLE `rekap_gaji` (
`PERIODE` int(6)
,`ID_PENGAJAR` char(15)
,`ID_AKTIVITAS` char(15)
,`NAMA_AKTIVITAS` varchar(20)
,`HONOR_AKTIVITAS` int(11)
,`JML` decimal(23,0)
,`UPAH` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `ID_SANTRI` char(15) NOT NULL,
  `NAMA_SANTRI` varchar(25) DEFAULT NULL,
  `ID_PENGAJAR` varchar(10) DEFAULT NULL,
  `TOTAL_SPP` int(11) DEFAULT NULL,
  `STATUS_SANTRI` varchar(15) NOT NULL,
  `TINGKATAN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`ID_SANTRI`, `NAMA_SANTRI`, `ID_PENGAJAR`, `TOTAL_SPP`, `STATUS_SANTRI`, `TINGKATAN`) VALUES
('tpa-sntr1', 'Agung Setyo Pribadi', 'tpa-pgjr1', 0, 'Aktif', 'Al-Quran'),
('tpa-sntr2', 'Afifa Suhartina', 'tpa-pgjr1', 0, 'Aktif', 'TK Jilid 2'),
('tpa-sntr3', 'Yama', 'tpa-pgjr1', 0, 'Aktif', 'SD Kls 6 Quran'),
('tpa-sntr4', 'Bima', 'tpa-pgjr1', 0, 'Aktif', 'SD Jilid 1'),
('tpa-sntr5', 'Roni', 'tpa-pgjr2', 0, 'Aktif', 'SD Jilid 3'),
('tpa-sntr6', 'Ratna', 'tpa-pgjr2', 0, 'Aktif', 'SD Jilid 1'),
('tpa-sntr7', 'Risa', 'tpa-pgjr3', 0, 'Aktif', 'TK Al-Quran'),
('tpa-sntr8', 'Ridho', 'tpa-pgjr4', 0, 'Aktif', 'TK Al-Quran');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `ID_SPP` char(15) NOT NULL,
  `ID_SANTRI` char(15) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `TGL_PEMBAYARAN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`ID_SPP`, `ID_SANTRI`, `TOTAL`, `TGL_PEMBAYARAN`) VALUES
('tpa-spp1', 'tpa-sntr2', 25000, '2017-08-04'),
('tpa-spp2', 'tpa-sntr3', 50000, '2017-08-05'),
('tpa-spp3', 'tpa-sntr1', 150000, '2017-08-12'),
('tpa-spp4', 'tpa-sntr2', 125000, '2017-08-12'),
('tpa-spp5', 'tpa-sntr1', 200000, '2017-08-14'),
('tpa-spp6', 'tpa-sntr2', 260000, '2017-08-15'),
('tpa-spp7', 'tpa-sntr3', 200000, '2017-08-15'),
('tpa-spp8', 'tpa-sntr7', 200000, '2017-08-15'),
('tpa-spp9', 'tpa-sntr7', 50000, '2017-08-15');

--
-- Triggers `spp`
--
DELIMITER $$
CREATE TRIGGER `update_total_spp` AFTER INSERT ON `spp` FOR EACH ROW BEGIN
UPDATE santri 
SET TOTAL_SPP = TOTAL_SPP+New.TOTAL
WHERE ID_SANTRI = New.ID_SANTRI;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tabel_spp`
-- (See below for the actual view)
--
CREATE TABLE `tabel_spp` (
`ID_SANTRI` char(15)
,`NAMA_SANTRI` varchar(25)
,`TOTAL` int(11)
,`TGL_PEMBAYARAN` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_spp_periode`
-- (See below for the actual view)
--
CREATE TABLE `total_spp_periode` (
`TOTAL` decimal(32,0)
,`PERIODE` varchar(6)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USERNAME` varchar(16) NOT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `PASSWORD`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `absensi_upah`
--
DROP TABLE IF EXISTS `absensi_upah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `absensi_upah`  AS  select `absensi`.`ID_ABSENSI` AS `ID_ABSENSI`,`absensi`.`ID_AKTIVITAS` AS `ID_AKTIVITAS`,`aktivitas`.`NAMA_AKTIVITAS` AS `NAMA_AKTIVITAS`,`absensi`.`ID_PENGAJAR` AS `ID_PENGAJAR`,`absensi`.`WAKTU_ABSENSI` AS `WAKTU_ABSENSI`,`aktivitas`.`HONOR_AKTIVITAS` AS `HONOR_AKTIVITAS` from (`absensi` join `aktivitas` on((`absensi`.`ID_AKTIVITAS` = `aktivitas`.`ID_AKTIVITAS`))) ;

-- --------------------------------------------------------

--
-- Structure for view `rekap_absen`
--
DROP TABLE IF EXISTS `rekap_absen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rekap_absen`  AS  select `a`.`ID_PENGAJAR` AS `id_pengajar`,`a`.`NAMA_PENGAJAR` AS `nama_pengajar`,`b`.`NAMA_AKTIVITAS` AS `nama_aktivitas`,`b`.`HONOR_AKTIVITAS` AS `honor_aktivitas`,date_format(`c`.`WAKTU_ABSENSI`,'%Y%m') AS `tgl` from ((`pengajar` `a` join `aktivitas` `b`) join `absensi` `c`) where ((`a`.`ID_PENGAJAR` = `c`.`ID_PENGAJAR`) and (`b`.`ID_AKTIVITAS` = `c`.`ID_AKTIVITAS`)) ;

-- --------------------------------------------------------

--
-- Structure for view `rekap_gaji`
--
DROP TABLE IF EXISTS `rekap_gaji`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rekap_gaji`  AS  select extract(year_month from `absensi_upah`.`WAKTU_ABSENSI`) AS `PERIODE`,`absensi_upah`.`ID_PENGAJAR` AS `ID_PENGAJAR`,`absensi_upah`.`ID_AKTIVITAS` AS `ID_AKTIVITAS`,`absensi_upah`.`NAMA_AKTIVITAS` AS `NAMA_AKTIVITAS`,`absensi_upah`.`HONOR_AKTIVITAS` AS `HONOR_AKTIVITAS`,sum(1) AS `JML`,sum(`absensi_upah`.`HONOR_AKTIVITAS`) AS `UPAH` from `absensi_upah` group by extract(year_month from `absensi_upah`.`WAKTU_ABSENSI`),`absensi_upah`.`ID_PENGAJAR`,`absensi_upah`.`ID_AKTIVITAS` ;

-- --------------------------------------------------------

--
-- Structure for view `tabel_spp`
--
DROP TABLE IF EXISTS `tabel_spp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_spp`  AS  select `spp`.`ID_SANTRI` AS `ID_SANTRI`,`santri`.`NAMA_SANTRI` AS `NAMA_SANTRI`,`spp`.`TOTAL` AS `TOTAL`,`spp`.`TGL_PEMBAYARAN` AS `TGL_PEMBAYARAN` from (`spp` join `santri` on((`spp`.`ID_SANTRI` = `santri`.`ID_SANTRI`))) where (`santri`.`STATUS_SANTRI` = 'Aktif') ;

-- --------------------------------------------------------

--
-- Structure for view `total_spp_periode`
--
DROP TABLE IF EXISTS `total_spp_periode`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_spp_periode`  AS  select sum(`spp`.`TOTAL`) AS `TOTAL`,date_format(`spp`.`TGL_PEMBAYARAN`,'%Y%m') AS `PERIODE` from `spp` group by date_format(`spp`.`TGL_PEMBAYARAN`,'%Y%m') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`ID_ABSENSI`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_AKTIVITAS`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_PENGAJAR`);

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`ID_AKTIVITAS`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`ID_GAJI`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_PENGAJAR`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`ID_PENGAJAR`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`ID_SANTRI`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_PENGAJAR`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`ID_SPP`),
  ADD KEY `FK_HAS` (`ID_SANTRI`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_AKTIVITAS`) REFERENCES `aktivitas` (`ID_AKTIVITAS`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_PENGAJAR`) REFERENCES `pengajar` (`ID_PENGAJAR`);

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_PENGAJAR`) REFERENCES `pengajar` (`ID_PENGAJAR`);

--
-- Constraints for table `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_PENGAJAR`) REFERENCES `pengajar` (`ID_PENGAJAR`);

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `FK_HAS` FOREIGN KEY (`ID_SANTRI`) REFERENCES `santri` (`ID_SANTRI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
