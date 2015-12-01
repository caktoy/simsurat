-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 12:57 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_keluar`
--

CREATE TABLE IF NOT EXISTS `arsip_keluar` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KETERANGAN` text,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_13` (`ID_SURAT`),
  KEY `FK_REFERENCE_26` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arsip_keluar`
--

INSERT INTO `arsip_keluar` (`ID`, `NIP`, `ID_SURAT`, `TANGGAL`, `KETERANGAN`) VALUES
(1, '199308312014061001', 4, '2015-11-19', 'nyoba');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_masuk`
--

CREATE TABLE IF NOT EXISTS `arsip_masuk` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KETERANGAN` text,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_11` (`ID_SURAT`),
  KEY `FK_REFERENCE_25` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arsip_masuk`
--

INSERT INTO `arsip_masuk` (`ID`, `NIP`, `ID_SURAT`, `TANGGAL`, `KETERANGAN`) VALUES
(0, '199209012015041001', NULL, '2015-11-15', 'Apa seh... cuman nyoba kok...'),
(1, '199209012015041001', 1, '2015-11-15', 'Apa seh...'),
(2, '199308312014061001', 2, '2015-11-16', 'seserserretwerwerwe'),
(3, '199308312014061001', 3, '2015-11-18', 'hancurkan'),
(4, '199209012015041001', 5, '2015-11-23', 'Oppo...?');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE IF NOT EXISTS `disposisi` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `KEPADA` varchar(255) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_15` (`ID_SURAT`),
  KEY `FK_REFERENCE_27` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`ID`, `NIP`, `ID_SURAT`, `KEPADA`, `TANGGAL`) VALUES
(1, '199209012015041001', 5, 'Oby', '2015-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `inaktif`
--

CREATE TABLE IF NOT EXISTS `inaktif` (
  `ID_INAKTIF` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `MASA_AKTIF` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_INAKTIF`),
  KEY `FK_REFERENCE_8` (`ID_JENIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inaktif`
--

INSERT INTO `inaktif` (`ID_INAKTIF`, `ID_JENIS`, `MASA_AKTIF`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `ID_JABATAN` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ID_KEPALA` int(11) DEFAULT NULL,
  `STATUS_DISPOSISI` int(1) DEFAULT '0',
  PRIMARY KEY (`ID_JABATAN`),
  KEY `FK_JABATAN1` (`ID_KEPALA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `NAMA`, `ID_KEPALA`, `STATUS_DISPOSISI`) VALUES
(1, 'Administrator', 2, 0),
(2, 'Kepala Kantor', NULL, 1),
(3, 'Bagian Umum', 2, 1),
(4, 'Kepala Seksi Administrasi', 2, 1),
(5, 'Seksi Administrasi', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_retensi`
--

CREATE TABLE IF NOT EXISTS `jadwal_retensi` (
  `ID_JADWAL` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `MASA_RETENSI` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_JADWAL`),
  KEY `FK_REFERENCE_9` (`ID_JENIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_retensi`
--

INSERT INTO `jadwal_retensi` (`ID_JADWAL`, `ID_JENIS`, `MASA_RETENSI`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE IF NOT EXISTS `jenis_surat` (
  `ID_JENIS` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_JENIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`ID_JENIS`, `NAMA`) VALUES
(1, 'Penting'),
(2, 'Gak Penting'),
(3, 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `ID_LOKASI` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_LOKASI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`ID_LOKASI`, `NAMA`) VALUES
(1, 'Resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `ID_MEDIA` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_MEDIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`ID_MEDIA`, `NAMA`) VALUES
(1, 'Hardcopy'),
(2, 'Flashdisk');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `NIP` varchar(20) NOT NULL,
  `ID_UNIT` int(11) DEFAULT NULL,
  `ID_JABATAN` int(11) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` char(1) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `TANGGAL_PENGANGKATAN` date DEFAULT NULL,
  PRIMARY KEY (`NIP`),
  KEY `FK_REFERENCE_3` (`ID_JABATAN`),
  KEY `FK_REFERENCE_2` (`ID_UNIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `ID_UNIT`, `ID_JABATAN`, `NAMA`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `ALAMAT`, `TANGGAL_PENGANGKATAN`) VALUES
('199209012015041001', 1, 1, 'Septyan Dwi K. P.', '1992-09-01', 'L', 'Manukan Peni II', '2015-04-01'),
('199304012015111001', 1, 5, 'Acemad Muncib', '1993-04-01', 'L', 'Waru, Sidoarja', '2015-11-29'),
('199306142015111001', 2, 4, 'Yusuf Bagus Anggara', '1993-06-14', 'L', 'Waru Sidoarjo', '2015-11-29'),
('199306282015111001', 3, 3, 'Johanes Aditya', '1993-06-28', 'L', 'Moyokerto', '2015-11-18'),
('199308312014061001', 1, 2, 'Moh. Oby Maulana', '1993-08-31', 'L', 'Krian City Indonesia', '2014-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `KEPERLUAN` varchar(255) DEFAULT NULL,
  `TANGGAL_PINJAM` date DEFAULT NULL,
  `LAMA_PINJAM` int(11) DEFAULT NULL,
  `TANGGAL_KEMBALI` date DEFAULT NULL,
  `STATUS_PINJAM` enum('telat','kembali','menunggu','pinjam') DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_17` (`ID_SURAT`),
  KEY `FK_REFERENCE_28` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID`, `NIP`, `ID_SURAT`, `KEPERLUAN`, `TANGGAL_PINJAM`, `LAMA_PINJAM`, `TANGGAL_KEMBALI`, `STATUS_PINJAM`) VALUES
(1, '199209012015041001', 1, 'Nyoba nyeleh, oleh gak seh...???', '2015-11-17', 4, '2015-11-21', 'menunggu'),
(2, '199308312014061001', 3, 'Nyoba', '2015-11-16', 4, '2015-11-20', 'telat'),
(3, '199308312014061001', 2, 'gdfgdfgdfhyujytu', '2015-11-24', 4, '2015-11-28', 'menunggu'),
(4, '199308312014061001', 4, 'gdfgdfgdfhyujytu', '2015-11-19', 4, '2015-11-23', 'kembali'),
(5, '199308312014061001', 1, 'gdfgdfgdfhyujytu', '2015-11-24', 4, '2015-11-28', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `penggandaan`
--

CREATE TABLE IF NOT EXISTS `penggandaan` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TUJUAN` varchar(255) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_22` (`ID_SURAT`),
  KEY `FK_REFERENCE_24` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `ID_PENGGUNA` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `PREVILAGE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PENGGUNA`),
  KEY `FK_REFERENCE_23` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `NIP`, `EMAIL`, `PASSWORD`, `PREVILAGE`) VALUES
(1, '199209012015041001', 'septyan.kp@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, '199308312014061001', 'oby_ghotic@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_inaktif`
--

CREATE TABLE IF NOT EXISTS `riwayat_inaktif` (
  `ID` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `ID_INAKTIF` int(11) DEFAULT NULL,
  `TANGGAL_INAKTIF` date DEFAULT NULL,
  `TANGGAL_AKTIF_KEMBALI` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_18` (`ID_SURAT`),
  KEY `FK_REFERENCE_19` (`ID_INAKTIF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_inaktif`
--

INSERT INTO `riwayat_inaktif` (`ID`, `ID_SURAT`, `ID_INAKTIF`, `TANGGAL_INAKTIF`, `TANGGAL_AKTIF_KEMBALI`) VALUES
(1, 1, 2, '2016-11-16', '0000-00-00'),
(2, 2, 1, '2017-11-17', '0000-00-00'),
(3, 3, 1, '2017-11-19', '0000-00-00'),
(4, 4, 2, '2016-11-19', '0000-00-00'),
(5, 5, 1, '2017-11-23', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_retensi`
--

CREATE TABLE IF NOT EXISTS `riwayat_retensi` (
  `ID` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `ID_JADWAL` int(11) DEFAULT NULL,
  `TANGGAL_RETENSI` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_20` (`ID_SURAT`),
  KEY `FK_REFERENCE_21` (`ID_JADWAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_retensi`
--

INSERT INTO `riwayat_retensi` (`ID`, `ID_SURAT`, `ID_JADWAL`, `TANGGAL_RETENSI`) VALUES
(1, 1, 2, '2017-11-16'),
(2, 2, 1, '2018-11-17'),
(3, 3, 1, '2018-11-19'),
(4, 4, 2, '2017-11-19'),
(5, 5, 1, '2018-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE IF NOT EXISTS `surat` (
  `ID_SURAT` int(11) NOT NULL,
  `ID_LOKASI` int(11) DEFAULT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `ID_MEDIA` int(11) DEFAULT NULL,
  `JUDUL_KOP` varchar(255) DEFAULT NULL,
  `NOMOR` varchar(50) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `PERIHAL` varchar(255) DEFAULT NULL,
  `DARI` varchar(100) DEFAULT NULL,
  `KEPADA` varchar(100) DEFAULT NULL,
  `ASAL_INSTANSI` varchar(100) DEFAULT NULL,
  `TANGGAL_MASUK` date DEFAULT NULL,
  PRIMARY KEY (`ID_SURAT`),
  KEY `FK_REFERENCE_5` (`ID_LOKASI`),
  KEY `FK_REFERENCE_7` (`ID_JENIS`),
  KEY `FK_REFERENCE_51` (`ID_MEDIA`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`ID_SURAT`, `ID_LOKASI`, `ID_JENIS`, `ID_MEDIA`, `JUDUL_KOP`, `NOMOR`, `TANGGAL`, `PERIHAL`, `DARI`, `KEPADA`, `ASAL_INSTANSI`, `TANGGAL_MASUK`) VALUES
(1, 1, 2, 2, 'Nyoba Ubah Surat', 'KPKNL-XII/23/2015', '2015-11-15', 'Nyoba Ngubah Surat', 'Septyan', 'Oby Hermawan', 'Kupucorp', '2015-11-16'),
(2, 1, 1, 1, 'serserdyrtwer', 'eew32323', '2015-11-16', 'sdsadefreterter', 'ghftytdrgdfgfrg', 'dsfsrtwerwedsf', 'dfrtsdfgsderewr', '2015-11-17'),
(3, 1, 1, 1, 'surat talak tilu', 'sl-1234', '2015-11-18', 'sangat rahasia', 'panitera', 'kasi PBB', 'Pengadilan agama', '2015-11-19'),
(4, 1, 2, 1, 'keluar 1', 'KPKNL-1/11/2015', '2015-11-19', 'keluar', 'dalam', 'keluar', 'kpknl', '1970-01-01'),
(5, 1, 1, 1, 'Nyoba', '323-KJAS-2015', '2015-11-23', 'Emboh', 'Septyan', 'Oby', 'Kupucorp', '2015-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE IF NOT EXISTS `unit_kerja` (
  `ID_UNIT` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_UNIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`ID_UNIT`, `NAMA`) VALUES
(1, 'Unit Kerja 1'),
(2, 'Unit Kerja 2'),
(3, 'Unit Kerja 3');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `ID_UPLOAD` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `PATH` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_UPLOAD`),
  KEY `FK_REFERENCE_4` (`ID_SURAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`ID_UPLOAD`, `ID_SURAT`, `PATH`) VALUES
(1, 1, 'http://localhost/simsurat/uploads/surat/SyntaxJScript.pdf'),
(2, 1, 'http://localhost/simsurat/uploads/surat/Berita_Acara.docx'),
(3, 1, 'http://localhost/simsurat/uploads/surat/berita_acara_sidang_proposal.png'),
(5, 2, 'http://localhost/simsurat/uploads/surat/Surat_Permohonan_Dispensasi.docx'),
(7, 3, 'http://localhost/simsurat/uploads/surat/Curiculum_Vitae_(CV)_-_NEW.pdf'),
(8, 5, 'http://localhost/simsurat/uploads/surat/Curiculum_Vitae_(CV)_-_NEW1.pdf');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip_keluar`
--
ALTER TABLE `arsip_keluar`
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_26` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_25` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_27` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `inaktif`
--
ALTER TABLE `inaktif`
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `FK_JABATAN1` FOREIGN KEY (`ID_KEPALA`) REFERENCES `jabatan` (`ID_JABATAN`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `jadwal_retensi`
--
ALTER TABLE `jadwal_retensi`
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_UNIT`) REFERENCES `unit_kerja` (`ID_UNIT`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_REFERENCE_17` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_28` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `penggandaan`
--
ALTER TABLE `penggandaan`
  ADD CONSTRAINT `FK_REFERENCE_22` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_24` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `FK_REFERENCE_23` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_inaktif`
--
ALTER TABLE `riwayat_inaktif`
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`ID_INAKTIF`) REFERENCES `inaktif` (`ID_INAKTIF`);

--
-- Constraints for table `riwayat_retensi`
--
ALTER TABLE `riwayat_retensi`
  ADD CONSTRAINT `FK_REFERENCE_20` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_21` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal_retensi` (`ID_JADWAL`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_LOKASI`) REFERENCES `lokasi` (`ID_LOKASI`),
  ADD CONSTRAINT `FK_REFERENCE_51` FOREIGN KEY (`ID_MEDIA`) REFERENCES `media` (`ID_MEDIA`),
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
