-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table pelayananonline.jenissurat
CREATE TABLE IF NOT EXISTS `jenissurat` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `namasurat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `formatnosurat` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `pejabat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.jenissurat: ~11 rows (approximately)
DELETE FROM `jenissurat`;
/*!40000 ALTER TABLE `jenissurat` DISABLE KEYS */;
INSERT INTO `jenissurat` (`no`, `namasurat`, `formatnosurat`, `pejabat`) VALUES
	(1, 'Izin Observasi', '/FHm/TL.00/', 'dekan'),
	(2, 'Izin Penelitian', '/Un.03.1/TL.00.1/', 'dekan'),
	(3, 'Izin PKL', '/Un.03.1/TL.00.1/', 'wd3'),
	(5, 'Rekom Beasiswa', '/Un.03/FITK/PP.00.9/', 'wd3'),
	(6, 'Validator Skripsi', '/Un.03.1/PP.03.1/', 'wd1'),
	(7, 'Surat Kelakuan Baik', '/Un.03/FITK/PP.00.9/', 'wd3'),
	(8, 'Surat Pengantar Magang', '/Un.03/FITK/PP.00.9/', 'wd3'),
	(10, 'Izin Observasi Kelompok', '/Un.03.1/TL.00.1/', 'wd1'),
	(13, 'Surat Keterangan', '/FHm/KM.01.3/', 'dekan'),
	(14, 'Surat Rekomendasi', '/FHm/KM.01.3/', 'dekan');
/*!40000 ALTER TABLE `jenissurat` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.lampiran
CREATE TABLE IF NOT EXISTS `lampiran` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `surat` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `lokasi` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.lampiran: ~0 rows (approximately)
DELETE FROM `lampiran`;
/*!40000 ALTER TABLE `lampiran` DISABLE KEYS */;
/*!40000 ALTER TABLE `lampiran` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.observasi
CREATE TABLE IF NOT EXISTS `observasi` (
  `nodata` int(11) NOT NULL AUTO_INCREMENT,
  `tglpengajuan` varchar(20) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `namamk` varchar(100) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `namainstansi` varchar(100) DEFAULT NULL,
  `alamatinstansi` varchar(200) DEFAULT NULL,
  `tglmulai` varchar(20) DEFAULT NULL,
  `tglselesai` varchar(20) DEFAULT NULL,
  `verifikator` varchar(50) DEFAULT NULL,
  `verifikasi` tinyint(4) DEFAULT '0',
  `tglverifikasi` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `statussurat` tinyint(4) DEFAULT NULL,
  KEY `Index 1` (`nodata`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.observasi: ~0 rows (approximately)
DELETE FROM `observasi`;
/*!40000 ALTER TABLE `observasi` DISABLE KEYS */;
INSERT INTO `observasi` (`nodata`, `tglpengajuan`, `prodi`, `nim`, `nama`, `nohp`, `email`, `namamk`, `judul`, `namainstansi`, `alamatinstansi`, `tglmulai`, `tglselesai`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`, `statussurat`) VALUES
	(2, '2021-08-28 10:09:49', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Al Kitabah Al-Ibdaiyah', 'Penulisan biografi ulama nusantara', 'Penerbit Madani', 'Jl. Raya Sepi Sekali No. 97 Magelang Jawa Tengah', '2021-08-28', '2021-09-04', '197411012003121004', 1, '2021-08-28 10:42:59', '2/Fhm/TL.00/08/2021', 1);
/*!40000 ALTER TABLE `observasi` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.pejabat
CREATE TABLE IF NOT EXISTS `pejabat` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `ttd` varchar(100) DEFAULT NULL,
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table pelayananonline.pejabat: ~0 rows (approximately)
DELETE FROM `pejabat`;
/*!40000 ALTER TABLE `pejabat` DISABLE KEYS */;
INSERT INTO `pejabat` (`no`, `jabatan`, `nama`, `nip`, `ttd`) VALUES
	(6, 'Dekan', 'M. Faisol', '197411012003121004', '../img/ttd-dekan.png');
/*!40000 ALTER TABLE `pejabat` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.penelitian
CREATE TABLE IF NOT EXISTS `penelitian` (
  `nodata` int(11) NOT NULL AUTO_INCREMENT,
  `tglpengajuan` varchar(20) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `namainstansi` varchar(100) DEFAULT NULL,
  `tglmulai` varchar(20) DEFAULT NULL,
  `tglselesai` varchar(20) DEFAULT NULL,
  `alamatinstansi` varchar(200) DEFAULT NULL,
  `verifikator` varchar(50) DEFAULT NULL,
  `verifikasi` tinyint(4) DEFAULT '0',
  `tglverifikasi` datetime DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `statussurat` tinyint(4) DEFAULT '0',
  KEY `Index 1` (`nodata`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.penelitian: ~0 rows (approximately)
DELETE FROM `penelitian`;
/*!40000 ALTER TABLE `penelitian` DISABLE KEYS */;
INSERT INTO `penelitian` (`nodata`, `tglpengajuan`, `prodi`, `nim`, `nama`, `nohp`, `email`, `judul`, `namainstansi`, `tglmulai`, `tglselesai`, `alamatinstansi`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`, `statussurat`) VALUES
	(9, '2021-08-28 07:54:29', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.co', 'ÙˆÙŽØ§ÙØ°ÙŽØ§ Ù‚ÙÙŠÙ’Ù„ÙŽ Ù„ÙŽÙ‡ÙÙ…Ù’ Ø§Ù°Ù…ÙÙ†ÙÙˆÙ’Ø§ ÙƒÙŽÙ…ÙŽØ§Ù“ Ø§Ù°Ù…ÙŽÙ†ÙŽ Ø§Ù„Ù†Ù‘ÙŽØ§Ø³Ù Ù‚ÙŽØ§Ù„ÙÙˆÙ’Ù“Ø§ Ø§ÙŽÙ†ÙØ¤Ù’Ù…ÙÙ†Ù ÙƒÙŽÙ…ÙŽØ§Ù“ Ø§Ù°Ù…ÙŽÙ†ÙŽ Ø§Ù„Ø³Ù‘ÙÙÙŽÙ‡ÙŽØ§Û¤Ø¡Ù Û—', 'MIN 1 Kota Malang', '2021-08-30', '2021-09-30', 'Jl. Veteran No. 70 Malang', 'admin-fakultas', 1, '2021-08-28 07:55:20', '9/FHm/TL.00/08/2021', 1);
/*!40000 ALTER TABLE `penelitian` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `plaintext` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'mahasiswa',
  `token` varchar(100) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=1007 DEFAULT CHARSET=latin1;

-- Dumping data for table pelayananonline.pengguna: ~4 rows (approximately)
DELETE FROM `pengguna`;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`no`, `nama`, `nim`, `nohp`, `email`, `prodi`, `user`, `pass`, `plaintext`, `role`, `token`, `status`) VALUES
	(20, 'Admin Fakultas', '999999', '085643201833', 'saintekonline@gmail.com', 'Humaniora', 'admin-fakultas', '0e30c7af5639b9410da357c13a3509a6', 'admin-fakultas', 'adminfakultas', 'af049aa2c187986eff03ffcd467edc5a', 1),
	(1004, 'admin-bsa', '1111111111', '08123456789', 'bsa@uin-malang.ac.id', 'Bahasa dan Sastra Arab', 'admin-bsa', 'f8121eb48ac35be2cc82233ece092dbe', 'admin-bsa', 'adminprodi', '0', 1),
	(1005, 'admin-si', '1111111', '08123456789', 'saintekonline@gmail.com', 'Sastra Inggris', 'admin-si', '0e42ec66429294abb954a7ff554e97d1', 'admin-si', 'adminprodi', 'af049aa2c187986eff03ffcd467edc5a', 1),
	(1006, 'Johan Ericka Wahyu Prakasa', '11111111', '08123456789', 'johanericka@gmail.com', 'Bahasa dan Sastra Arab', 'johanericka', 'ac43724f16e9241d990427ab7c8f4228', 'rahasia', 'mahasiswa', '6789f26a7fa5f40f93beef04028a175c', 1);
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.prodi
CREATE TABLE IF NOT EXISTS `prodi` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `namaprodi` varchar(100) DEFAULT NULL,
  `jenjang` varchar(2) DEFAULT NULL,
  `verifikator` varchar(50) DEFAULT NULL,
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table pelayananonline.prodi: ~3 rows (approximately)
DELETE FROM `prodi`;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` (`no`, `namaprodi`, `jenjang`, `verifikator`) VALUES
	(1, 'Bahasa dan Sastra Arab', 'S1', NULL),
	(2, 'Sastra Inggris', 'S1', NULL),
	(4, 'Magister Bahasa dan Sastra Arab', 'S2', NULL);
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.rekomendasi
CREATE TABLE IF NOT EXISTS `rekomendasi` (
  `nodata` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(20) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `notelepon` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  `verifikator` varchar(200) DEFAULT NULL,
  `verifikasi` tinyint(4) DEFAULT '0',
  `tglverifikasi` varchar(20) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `statussurat` tinyint(4) DEFAULT '0',
  KEY `Index 1` (`nodata`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.rekomendasi: 1 rows
DELETE FROM `rekomendasi`;
/*!40000 ALTER TABLE `rekomendasi` DISABLE KEYS */;
INSERT INTO `rekomendasi` (`nodata`, `tanggal`, `prodi`, `nim`, `nama`, `notelepon`, `email`, `keperluan`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`, `statussurat`) VALUES
	(2, '2021-08-27 20:15:48', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'mengikuti pendaftaran lomba di Jepang', '197411012003121004', 1, '2021-08-27 20:38:52', 'B-2/FHm/KM.01.3/08/2021', 1);
/*!40000 ALTER TABLE `rekomendasi` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `plaintext` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'adminprodi',
  `status` tinyint(4) DEFAULT '0',
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table pelayananonline.staff: ~4 rows (approximately)
DELETE FROM `staff`;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`no`, `nama`, `nohp`, `email`, `prodi`, `username`, `password`, `plaintext`, `role`, `status`) VALUES
	(1, 'johan ericka', '0812345678', 'johan@uin-malang.ac.id', 'TADRIS MATEMATIKA', 'johanericka', '202cb962ac59075b964b07152d234b70', '123', 'adminfakultas', 1),
	(3, 'bunali', '0812345678', 'bunali@fakemail.id', 'PENDIDIKAN GURU MADRASAH IBTIDAIYAH', 'bunali', '202cb962ac59075b964b07152d234b70', '123', 'adminprodi', 0),
	(7, 'markonah', '0812345678', 'markonah@fakemail.com', 'TADRIS BAHASA INGGRIS', 'markonah', '698d51a19d8a121ce581499d7b701668', '111', 'adminprodi', 1),
	(8, 'pairun', '0812345678', 'pairun@fakemail.id', 'PENDIDIKAN AGAMA ISLAM', 'pairun', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'adminprodi', 1);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.suket
CREATE TABLE IF NOT EXISTS `suket` (
  `nodata` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(20) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `notelepon` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jenissurat` varchar(100) DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  `tgllulus` varchar(20) DEFAULT NULL,
  `skyudisium` varchar(50) DEFAULT NULL,
  `verifikator` varchar(200) DEFAULT NULL,
  `verifikasi` tinyint(4) DEFAULT '0',
  `tglverifikasi` varchar(20) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `statussurat` tinyint(4) DEFAULT '0',
  KEY `Index 1` (`nodata`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.suket: 3 rows
DELETE FROM `suket`;
/*!40000 ALTER TABLE `suket` DISABLE KEYS */;
INSERT INTO `suket` (`nodata`, `tanggal`, `prodi`, `nim`, `nama`, `notelepon`, `email`, `jenissurat`, `keperluan`, `tgllulus`, `skyudisium`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`, `statussurat`) VALUES
	(1, '2021-08-26 20:08:12', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Aktif', 'pendaftaran ketua himpunan mahasiswa program studi Bahasa dan Sastra Arab', NULL, NULL, '197411012003121004', 1, '2021-08-26 20:15:54', 'B-1/FHm/KM.01.3/08/2021', 1),
	(2, '2021-08-26 21:04:42', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Kelakuan Baik', '', NULL, NULL, '197411012003121004', 1, '2021-08-26 21:13:23', 'B-2/FHm/KM.01.3/08/2021', 1),
	(4, '2021-08-26 21:07:16', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Lulus', 'melamar pekerjaan', '2021-08-24', 'B-234/FHM/PP.01.1/08/2021', '197411012003121004', 1, '2021-08-26 21:26:56', 'B-4/FHm/KM.01.3/08/2021', 1);
/*!40000 ALTER TABLE `suket` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.surattugas
CREATE TABLE IF NOT EXISTS `surattugas` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `nip` varchar(20) NOT NULL DEFAULT '0',
  `jabatan` varchar(20) NOT NULL DEFAULT '0',
  `pangkat` varchar(100) NOT NULL DEFAULT '0',
  `tugas` varchar(200) NOT NULL DEFAULT '0',
  `tempat` varchar(200) NOT NULL DEFAULT '0',
  `tglmulai` date NOT NULL,
  `tglselesai` date NOT NULL,
  `lampiran` int(11) NOT NULL DEFAULT '0',
  `verifikator` varchar(50) NOT NULL DEFAULT '0',
  `verifikasi` tinyint(4) NOT NULL DEFAULT '0',
  `tglverifikasi` datetime NOT NULL,
  `keterangan` varchar(200) NOT NULL DEFAULT '0',
  KEY `Index 1` (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pelayananonline.surattugas: ~0 rows (approximately)
DELETE FROM `surattugas`;
/*!40000 ALTER TABLE `surattugas` DISABLE KEYS */;
/*!40000 ALTER TABLE `surattugas` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.transkripnilai
CREATE TABLE IF NOT EXISTS `transkripnilai` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `tglpengajuan` datetime DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `jenjang` varchar(5) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `keperluan` varchar(100) DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `verifikator` varchar(50) DEFAULT NULL,
  `verifikasi` tinyint(4) DEFAULT '0',
  `tglverifikasi` datetime DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.transkripnilai: ~85 rows (approximately)
DELETE FROM `transkripnilai`;
/*!40000 ALTER TABLE `transkripnilai` DISABLE KEYS */;
INSERT INTO `transkripnilai` (`no`, `tglpengajuan`, `prodi`, `jenjang`, `nim`, `nama`, `nohp`, `email`, `keperluan`, `website`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`) VALUES
	(17, '2021-04-10 21:37:46', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'johanericka', 'Johan Ericka', NULL, NULL, 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 1, '2021-04-10 21:38:38', '17/Un.03.1/TL.00.1/04/2021'),
	(19, '2021-04-12 12:21:42', 'Pendidikan Agama Islam', 'S1', '17110180', 'Satriya Dwi Wicaksono', '081554858190', 'satriyadwi19@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-04-19 13:25:35', 'pengajuan transkip nilai di BAK pusat'),
	(20, '2021-04-13 18:56:55', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130162', 'Muhammad Rifki', '089516586857', 'ahmeadkhan3@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 1, '2021-04-15 12:52:29', '20/Un.03.1/TL.00.1/04/2021'),
	(21, '2021-04-14 14:31:54', 'Pendidikan Agama Islam', 'S1', '17110112', 'Zumazy Habibiyah', '082231806637', 'zumasyhabibiyah98@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pai', 2, '2021-04-19 13:26:14', 'pengajuan transkip nilai di BAK pusat'),
	(22, '2021-04-26 15:49:45', 'Tadris Matematika', 'S1', '17190020', 'Zuroidatus Sofia', '083891824895', 'zuroi.sofi@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-tmat', 1, '2021-04-27 11:16:40', '22/Un.03.1/TL.00.1/04/2021'),
	(24, '2021-04-27 10:47:36', 'Manajemen Pendidikan Islam', 'S1', '17170043', 'Maulidatul khasanah', '081615243524', 'maulidatulkhasanah58@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-mpi', 2, '2021-04-29 11:08:45', 'Pengajuan transkrip sementara ranahnya BAK'),
	(25, '2021-04-27 10:47:46', 'Manajemen Pendidikan Islam', 'S1', '17170043', 'Maulidatul khasanah', '081615243524', 'maulidatulkhasanah58@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-mpi', 0, NULL, NULL),
	(26, '2021-04-27 10:47:51', 'Manajemen Pendidikan Islam', 'S1', '17170043', 'Maulidatul khasanah', '081615243524', 'maulidatulkhasanah58@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-mpi', 0, NULL, NULL),
	(27, '2021-04-27 10:47:52', 'Manajemen Pendidikan Islam', 'S1', '17170043', 'Maulidatul khasanah', '081615243524', 'maulidatulkhasanah58@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-mpi', 0, NULL, NULL),
	(28, '2021-04-27 10:47:52', 'Manajemen Pendidikan Islam', 'S1', '17170043', 'Maulidatul khasanah', '081615243524', 'maulidatulkhasanah58@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-mpi', 0, NULL, NULL),
	(30, '2021-04-28 14:03:13', 'Tadris Matematika', 'S1', '17190023', 'Luthfi Khoirul Anwar', '085236431445', '17190023@student.uin-malang.ac.id', 'pendaftaran Ujian Komprehensif', '', 'admin-tmat', 1, '2021-04-28 14:10:45', '30/Un.03.1/TL.00.1/04/2021'),
	(31, '2021-04-28 14:21:28', 'Pendidikan Agama Islam', 'S1', '17110077', 'Muhammad Iqbal Ghafiri Enhas', '085725539552', 'm.iqbalghafiri07@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-05-03 08:35:53', 'Pengajuan transkrip nilai langsung ke website bak pusat'),
	(32, '2021-04-29 09:21:16', 'Tadris Bahasa Inggris', 'S1', 'SitiNurhalimah27', 'Siti Nurhalimah', NULL, NULL, 'pendaftaran Ujian Komprehensif', '', 'admin-tbi', 1, '2021-05-01 11:37:03', '32/Un.03.1/TL.00.1/05/2021'),
	(33, '2021-04-29 12:24:37', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'ilhamnsrllh', 'Muhammad Ilham Nasrullah', NULL, NULL, 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 1, '2021-04-29 14:53:03', '33/Un.03.1/TL.00.1/04/2021'),
	(34, '2021-04-29 13:25:58', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130119', 'Zsa Zsa Zhulia Dewi', '089678133559', 'zsazsazhulia@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 1, '2021-04-29 14:53:15', '34/Un.03.1/TL.00.1/04/2021'),
	(35, '2021-04-29 13:30:22', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'Ria wahyuni', 'Ria Wahyuni', NULL, NULL, 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 1, '2021-04-29 14:53:27', '35/Un.03.1/TL.00.1/04/2021'),
	(36, '2021-04-29 14:01:13', 'Manajemen Pendidikan Islam', 'S1', '17170029', 'Henni', '085730301460', 'hennicie8@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-mpi', 0, NULL, NULL),
	(37, '2021-04-29 14:11:44', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130124', 'Eka Aprilia', '083833612545', 'ekaa19648@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 2, '2021-04-29 15:04:31', 'Angkatan 2017 untuk saat ini meminta Transkrip sementara di BAK Pusat ya'),
	(40, '2021-04-30 14:36:58', 'Pendidikan Agama Islam', 'S1', '17110010', 'Uwly Iffat Arifin Al Hasyimi', '081249616288', 'uwly.iffat29@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-05-03 08:36:16', 'Pengajuan transkrip nilai langsung ke website bak pusat'),
	(41, '2021-04-30 19:12:13', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130167', 'NURINDA PUTRI LESTARI', '082195109516', 'indahnurindaputri@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 1, '2021-05-07 08:33:31', '41/Un.03.1/TL.00.1/05/2021'),
	(42, '2021-04-30 23:57:24', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'azmi1234', 'Mohamad Ulul Azmi', '089515881352', 'muhammadulula6@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 1, '2021-05-07 08:34:01', '42/Un.03.1/TL.00.1/05/2021'),
	(43, '2021-04-30 23:57:33', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'azmi1234', 'Mohamad Ulul Azmi', '089515881352', 'muhammadulula6@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 2, '2021-05-07 08:34:44', 'Doubel '),
	(44, '2021-04-30 23:57:35', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'azmi1234', 'Mohamad Ulul Azmi', '089515881352', 'muhammadulula6@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 2, '2021-05-07 08:35:14', 'Nim keliru'),
	(45, '2021-04-30 23:57:40', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'azmi1234', 'Mohamad Ulul Azmi', '089515881352', 'muhammadulula6@gmail.com', 'pendaftaran Ujian Komprehensif', 'Benar', 'admin-pips', 2, '2021-05-07 08:35:27', 'Nim keliru'),
	(47, '2021-05-02 10:57:14', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '16140013', 'Muhamad Iqbal', '085860864449', 'Nim16140013@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pgmi', 1, '2021-05-03 12:24:04', '47/Un.03.1/TL.00.1/05/2021'),
	(48, '2021-05-02 11:13:17', 'Pendidikan Agama Islam', 'S1', 'Firhan ', 'FIRHAN UBAIDILLAH AL ABRARY', '082195109516', 'indahnurindaputri@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-05-03 08:36:44', 'Pengajuan transkrip nilai langsung ke website bak pusat'),
	(49, '2021-05-02 20:53:04', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140007', 'Mas Syahrul Azis', '0895396152468', 'massahrul02@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pgmi', 1, '2021-05-03 12:24:20', '49/Un.03.1/TL.00.1/05/2021'),
	(50, '2021-05-03 07:30:20', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140067', 'MA\'RIFATUL NISA\'', '085748935376', 'marifatulnisa99@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pgmi', 1, '2021-05-03 12:24:40', '50/Un.03.1/TL.00.1/05/2021'),
	(51, '2021-05-03 07:30:34', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140067', 'MA\'RIFATUL NISA\'', '085748935376', 'marifatulnisa99@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pgmi', 1, '2021-05-03 12:24:51', '51/Un.03.1/TL.00.1/05/2021'),
	(52, '2021-05-03 11:12:11', 'Pendidikan Bahasa Arab', 'S1', '17150088', 'Fairuz Afida Khalidia', '082228948548', 'fairuzafidak@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pba', 0, NULL, NULL),
	(53, '2021-05-03 12:03:59', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140060', 'Lailatul Hidayah Ayu Putri', '085748833038', 'lailaayu08@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pgmi', 1, '2021-05-03 12:25:17', '53/Un.03.1/TL.00.1/05/2021'),
	(54, '2021-05-04 04:13:37', 'Pendidikan Agama Islam', 'S1', '17110133', 'Fania Oktavi Choirunisa\'', '081649522009', '17110133@student.uin-malang.ac.id', 'pendaftaran Sidang Skripsi', '', 'admin-pai', 2, '2021-05-24 09:33:34', 'Pengajuan transkrip nilai langsung hub bak fakultas A.n Faishol'),
	(55, '2021-05-04 04:13:50', 'Pendidikan Agama Islam', 'S1', '17110133', 'Fania Oktavi Choirunisa\'', '081649522009', '17110133@student.uin-malang.ac.id', 'pendaftaran Sidang Skripsi', '', 'admin-pai', 2, '2021-05-24 09:33:49', 'Pengajuan transkrip nilai langsung hub bak fakultas A.n Faishol'),
	(56, '2021-05-04 07:55:10', 'Pendidikan Agama Islam', 'S1', '15110066', 'FIRHAN UBAIDILLAH AL ABRARY', '082195109516', 'indahnurindaputri@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-05-24 09:34:13', 'Pengajuan transkrip nilai langsung hub bak fakultas A.n Faishol'),
	(57, '2021-05-04 09:45:23', 'Tadris Bahasa Inggris', 'S1', 'SitiNurhalimah27', 'Siti Nurhalimah', '081238342327', 'ulumut49@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-tbi', 1, '2021-05-24 10:59:21', '57/Un.03.1/TL.00.1/05/2021'),
	(58, '2021-05-04 10:21:39', 'Pendidikan Agama Islam', 'S1', '17110109', 'Imro Atin khosya', '081358733941', 'imroatinkhosya@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-05-24 09:34:38', 'Pengajuan transkrip nilai langsung hub bak fakultas A.n Faishol'),
	(59, '2021-05-04 12:44:09', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052 ', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pgmi', 1, '2021-05-05 07:18:51', '59/Un.03.1/TL.00.1/05/2021'),
	(60, '2021-05-04 13:13:19', 'Pendidikan Agama Islam', 'S1', '17110076', 'MUHAMMAD TAUFIQURROHMAN AZIS SUSILO SETYAWAN', '081226831075', 'aziskang88@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-05-24 09:34:25', 'Pengajuan transkrip nilai langsung hub bak fakultas A.n Faishol'),
	(61, '2021-05-04 13:19:28', 'Pendidikan Agama Islam', 'S1', '17110123', 'Fikri Sulaiman', '082233831990', 'sulaimanfikri1@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pai', 2, '2021-05-24 09:34:00', 'Pengajuan transkrip nilai langsung hub bak fakultas A.n Faishol'),
	(62, '2021-05-04 13:51:24', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '16140151', 'Masfuk Arifi', '082276936549', 'masfuk3d@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pgmi', 1, '2021-05-05 07:18:38', '62/Un.03.1/TL.00.1/05/2021'),
	(63, '2021-05-05 09:30:51', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140056', 'Izzahrotul Ulla Warda Rahmah', '083112277844', 'izzahrotulwarda@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pgmi', 1, '2021-05-05 12:01:26', '63/Un.03.1/TL.00.1/05/2021'),
	(64, '2021-05-05 14:14:15', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160037', 'Shafira Azzahra', '082142913853', 'shafirastudio9@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-piaud', 1, '2021-05-06 11:18:40', '64/Un.03.1/TL.00.1/05/2021'),
	(65, '2021-05-08 12:34:34', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '16140151', 'Masfuk Arifi', '082276936549', 'masfuk3d@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pgmi', 1, '2021-05-10 04:43:52', '65/Un.03.1/TL.00.1/05/2021'),
	(66, '2021-05-08 12:34:38', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '16140151', 'Masfuk Arifi', '082276936549', 'masfuk3d@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pgmi', 1, '2021-05-10 04:44:39', '66/Un.03.1/TL.00.1/05/2021'),
	(67, '2021-05-29 09:55:13', 'Pendidikan Agama Islam', 'S1', '17110034', 'Fatimah Azzahra', '081318399702', 'zahrakoeswadi@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-06-02 09:22:15', 'Pengajuan transkrip nilai langsung menghubungi An. Faishol'),
	(68, '2021-05-29 09:55:21', 'Pendidikan Agama Islam', 'S1', '17110034', 'Fatimah Azzahra', '081318399702', 'zahrakoeswadi@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-06-02 09:22:25', 'Pengajuan transkrip nilai langsung menghubungi An. Faishol'),
	(69, '2021-05-31 10:20:18', 'Tadris Matematika', 'S1', '17190004', 'Lilin Rofiqotul Ilmi', '081334933862', '17190004@student.uin-malang.ac.id', 'pendaftaran Ujian Komprehensif', '', 'admin-tmat', 2, '2021-05-31 13:33:11', 'Pengajuan Transkrip nilai langsung ke Fakultas. Ke bu Umamah atau Pak Faisol'),
	(70, '2021-06-02 09:09:17', 'Pendidikan Agama Islam', 'S1', '17110172', 'Rizki Saniyyah Widad', '081235722856', 'rizkysaniyyah965@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-06-02 09:22:36', 'Pengajuan transkrip nilai langsung menghubungi An. Faishol'),
	(71, '2021-06-02 09:25:06', 'Pendidikan Agama Islam', 'S1', '17110031', 'Diana Nurismasari', '085707181299', 'diana.risma027@gmail.com', 'pendaftaran Ujian Komprehensif', '-', 'admin-pai', 2, '2021-06-04 08:51:41', 'Pengajuan transkrip nilai langsung hub an faishol'),
	(72, '2021-06-02 10:37:02', 'Pendidikan Agama Islam', 'S1', '17110095', 'Dewi Maisaroh', '081584713633', 'dewimai02@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pai', 2, '2021-06-04 08:51:52', 'Pengajuan transkrip nilai langsung hub an faishol'),
	(74, '2021-06-02 17:07:18', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130128', 'Mochamad Adi Dwi Andreanto', '082230307665', 'mochamadandreanto@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pips', 1, '2021-06-08 10:20:56', '74/Un.03.1/TL.00.1/06/2021'),
	(75, '2021-06-02 20:03:20', '', '', '', '', '', '', '', '', '', 2, '2021-06-14 10:40:54', 'tidak ada data'),
	(77, '2021-06-06 17:38:36', 'Pendidikan Bahasa Arab', 'S1', '16150095', 'Nova Syaid Al Zubayr', '082137826851', 'nofisyarach1998@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pba', 0, NULL, NULL),
	(78, '2021-06-07 09:17:04', 'Pendidikan Agama Islam', 'S1', '17110024', 'M. Ridlo Alfian', '085806547116', 'alfialfian03@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-06-08 10:31:55', 'Transkrip nilai langsung hub an. Faishol'),
	(79, '2021-06-08 08:55:14', 'Tadris Matematika', 'S1', '17190023', 'Luthfi Khoirul Anwar', '085236431445', '17190023@student.uin-malang.ac.id', 'pendaftaran Ujian Komprehensif', '', 'admin-tmat', 1, '2021-06-14 08:41:44', '79/Un.03.1/TL.00.1/06/2021'),
	(80, '2021-06-08 10:28:23', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130093', 'Ely Khurriyah Sari ', '085748545992', 'ellykhuriyah@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 1, '2021-06-15 09:17:37', '80/Un.03.1/TL.00.1/06/2021'),
	(81, '2021-06-08 17:30:18', 'Tadris Bahasa Inggris', 'S1', '17180007', 'Anggi Yusuf Mustofa', '085780448770', 'anggiyusuf2204@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-tbi', 1, '2021-06-09 12:30:49', '81/Un.03.1/TL.00.1/06/2021'),
	(82, '2021-06-09 13:26:19', 'Tadris Matematika', 'S1', '17190004', 'Lilin Rofiqotul Ilmi', '081334933862', '17190004@student.uin-malang.ac.id', 'pendaftaran Ujian Komprehensif', '', 'admin-tmat', 1, '2021-06-14 08:41:54', '82/Un.03.1/TL.00.1/06/2021'),
	(83, '2021-06-10 11:17:47', 'Pendidikan Agama Islam', 'S1', '17110182', 'Esty Ayu Novita Ratih', '088228468725', 'estyayu1998@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-06-10 21:25:22', 'pengajuan transkrip nilai langsung hub an.fasihol'),
	(84, '2021-06-10 11:17:54', 'Pendidikan Agama Islam', 'S1', '17110182', 'Esty Ayu Novita Ratih', '088228468725', 'estyayu1998@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-06-10 21:25:33', 'pengajuan transkrip nilai langsung hub an.fasihol'),
	(85, '2021-06-10 16:17:21', 'Tadris Matematika', 'S1', '17190010', 'Anisah Wahyuning Pratiwi', '08983502440', '17190010@uin-malang.ac.id', 'pendaftaran Ujian Komprehensif', '', 'admin-tmat', 1, '2021-06-14 08:42:03', '85/Un.03.1/TL.00.1/06/2021'),
	(86, '2021-06-10 16:17:28', 'Tadris Matematika', 'S1', '17190010', 'Anisah Wahyuning Pratiwi', '08983502440', '17190010@uin-malang.ac.id', 'pendaftaran Ujian Komprehensif', '', 'admin-tmat', 1, '2021-06-14 08:42:11', '86/Un.03.1/TL.00.1/06/2021'),
	(87, '2021-06-11 17:33:01', 'Tadris Matematika', 'S1', '17190033', 'Firda Mashlichatul Chasanah', '085730225400', 'chasanahfirda@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-tmat', 1, '2021-06-14 08:42:21', '87/Un.03.1/TL.00.1/06/2021'),
	(88, '2021-06-13 13:10:50', 'Pendidikan Agama Islam', 'S1', '17110198', 'Fadlilah Novia Rahmah', '085797996723', 'fadlilahuinmalang@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pai', 2, '2021-06-15 08:42:18', 'Pengajuan transkrip langsung menemui An. Faishol'),
	(89, '2021-06-14 10:45:31', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:26:11', '89/Un.03.1/TL.00.1/06/2021'),
	(90, '2021-06-14 10:45:40', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:26:35', '90/Un.03.1/TL.00.1/06/2021'),
	(91, '2021-06-14 10:45:47', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:26:38', '91/Un.03.1/TL.00.1/06/2021'),
	(92, '2021-06-14 10:45:55', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:28:37', '92/Un.03.1/TL.00.1/06/2021'),
	(93, '2021-06-14 10:45:56', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:26:45', '93/Un.03.1/TL.00.1/06/2021'),
	(94, '2021-06-14 10:45:57', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:26:48', '94/Un.03.1/TL.00.1/06/2021'),
	(95, '2021-06-14 10:45:59', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:04', '95/Un.03.1/TL.00.1/06/2021'),
	(96, '2021-06-14 10:46:00', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:25', '96/Un.03.1/TL.00.1/06/2021'),
	(97, '2021-06-14 10:46:04', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:28', '97/Un.03.1/TL.00.1/06/2021'),
	(98, '2021-06-14 10:46:08', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:31', '98/Un.03.1/TL.00.1/06/2021'),
	(99, '2021-06-14 10:46:10', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:34', '99/Un.03.1/TL.00.1/06/2021'),
	(100, '2021-06-14 10:46:11', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:36', '100/Un.03.1/TL.00.1/06/2021'),
	(101, '2021-06-14 10:46:12', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:39', '101/Un.03.1/TL.00.1/06/2021'),
	(102, '2021-06-14 10:46:14', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:42', '102/Un.03.1/TL.00.1/06/2021'),
	(103, '2021-06-14 10:46:20', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160033', 'Ruhi Fi Nadiyah \'Adilah', '085155058789', 'ruhiadilah5@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-piaud', 1, '2021-06-15 02:31:45', '103/Un.03.1/TL.00.1/06/2021'),
	(104, '2021-06-15 14:16:18', 'Pendidikan Bahasa Arab', 'S1', '16150106', 'Ahmad Sirajuddien', '085234631310', 'ahmadsirojuddin14@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pba', 0, NULL, NULL),
	(105, '2021-06-15 14:37:19', 'Tadris Matematika', 'S1', '17190032', 'Faisal Afi Aliudin', '085766714028', '17190032@student.uin-malang.ac.id', 'pendaftaran Sidang Skripsi', '', 'admin-tmat', 1, '2021-06-16 10:56:40', '105/Un.03.1/TL.00.1/06/2021'),
	(106, '2021-06-16 10:55:29', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', 'athok_rohman', 'Wifqi Atho\'urrohman', '081290644532', 'athokrohman10@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pgmi', 1, '2021-06-16 14:29:21', '106/Un.03.1/TL.00.1/06/2021'),
	(107, '2021-06-16 17:56:24', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '14140039', 'Nurul aqso', '085804031633', 'nurulaqso19.na@gmail.com', 'pendaftaran Sidang Skripsi', '', 'admin-pgmi', 1, '2021-06-17 19:31:54', '107/Un.03.1/TL.00.1/06/2021'),
	(108, '2021-06-17 21:15:59', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160032', 'Uci Indriani', '085236824603', 'uchiindriani@gmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-piaud', 1, '2021-06-18 11:03:16', '108/Un.03.1/TL.00.1/06/2021'),
	(110, '2021-06-21 08:05:50', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'ilhamnsrllh', 'Muhammad Ilham Nasrullah', '081230947216', 'idatenj@rocketmail.com', 'pendaftaran Ujian Komprehensif', '', 'admin-pips', 0, NULL, NULL);
/*!40000 ALTER TABLE `transkripnilai` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.validasi
CREATE TABLE IF NOT EXISTS `validasi` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `tglpengajuan` datetime DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `jenjang` varchar(5) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `keperluan` varchar(100) DEFAULT NULL,
  `validasi` varchar(100) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `dosen1` varchar(100) DEFAULT NULL,
  `dosen2` varchar(100) DEFAULT NULL,
  `validator` varchar(100) DEFAULT NULL,
  `verifikator` varchar(50) DEFAULT NULL,
  `verifikasi` tinyint(4) DEFAULT '0',
  `tglverifikasi` datetime DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.validasi: ~188 rows (approximately)
DELETE FROM `validasi`;
/*!40000 ALTER TABLE `validasi` DISABLE KEYS */;
INSERT INTO `validasi` (`no`, `tglpengajuan`, `prodi`, `jenjang`, `nim`, `nama`, `nohp`, `email`, `keperluan`, `validasi`, `judul`, `dosen1`, `dosen2`, `validator`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`) VALUES
	(10, '2021-04-12 10:54:51', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', 'husni', 'Shalih Husni', NULL, NULL, 'Skripsi', NULL, 'Pengaruh Radikalisme Pada Generasi Muda', 'Galih Puji Mulyoto, M.Pd', NULL, 'Johan Ericka Wahyu Prakasa, M.Kom', 'admin-pips', 1, '2021-04-12 11:20:07', '10/Un.03.1/TL.00.1/04/2021'),
	(11, '2021-04-14 10:57:31', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130022', 'Fifi Rimelda', '082230662001', 'fifirimelda12@gmail.com', 'Skripsi', NULL, 'Implementasi Penilaian Autentik Kurikulum 2013 Dalam Mata Pelajaran IPS Kelas VII MTs Darul Hikmah Tarik Sidoarjo', 'Ulfi Andrian Sari, M.Pd', NULL, 'Nurlaeli Fitriah, M.Pd', 'admin-pips', 1, '2021-04-15 12:52:01', '11/Un.03.1/TL.00.1/04/2021'),
	(12, '2021-04-15 12:26:15', 'Pendidikan Agama Islam', 'S1', '420885201', 'mahasiswa 1', NULL, NULL, 'Skripsi', 'media', 'bambang', 'yadi', '', 'yono', 'admin-pai', 1, '2021-04-15 12:28:41', '12/Un.03.1/TL.00.1/04/2021'),
	(13, '2021-04-16 16:29:51', 'Tadris Matematika', 'S1', '17190026', 'Teguh Primandanu', '089639020205', 'tprimandanu@gmail.com', 'Skripsi', 'Penelitian skripsi', 'Kemampuan Penalaran Matematis pada Soal Cerita Aljabar Berdasarkan Hasil Belajar Siswa Kelas VII MTs Wahid Hasyim 02 Dau Kab. Malang', 'Dimas Femy Sasongko, M.Pd', '', 'Dr. H. Wahyu Henky Irawan, M.Pd', 'admin-tmat', 1, '2021-04-19 10:54:55', '13/Un.03.1/TL.00.1/04/2021'),
	(14, '2021-04-20 14:25:27', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130058', 'Annisa Luthfiyaturrofifah', '081554514425', 'annisaltr@gmail.com', 'Skripsi', 'Skripsi', 'Efektivitas Menghafal Al-Qur\'an Dalam Membentuk Kecerdasan Intelektual dan Kecerdasan Spiritual Mahasiswa Pendidikan IPS di Uin Malang', 'Ulfi Andrian Sari,M.Pd', '', 'Ermita Zakiyah,M.Th.I', 'admin-pips', 1, '2021-04-21 12:48:30', '14/Un.03.1/TL.00.1/04/2021'),
	(15, '2021-04-20 15:20:03', 'Tadris Matematika', 'S1', '17190022', 'Muhamad Abror Badruttamam', '082141220857', 'abrorbadrut10@gmail.com', 'Skripsi', 'Validasi Instrumen Penelitian', 'Berpikir Kritis Siswa SMA dalam Menyelesaikan Soal KOMIK 2019', 'Siti Faridah, M.Pd.', '', 'Dr. H. Wahyu Henky Irawan, M.Pd.', 'admin-tmat', 1, '2021-04-22 10:27:30', '15/Un.03.1/TL.00.1/04/2021'),
	(16, '2021-04-20 15:29:11', 'Tadris Matematika', 'S1', '17190032', 'Faisal Afi Aliudin', '085766714028', '17190032@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Penelitian', 'Literasi Matematika Ditinjau Dari Gaya Belajar (Studi Deskriptif pada Kelas VII MTs Jabal Nur Kota Malang)', 'Muhammad Islahul Mukmin,M.Si,.M.Pd', '', 'Dr. Syaifuddin, M.Pd.', 'admin-tmat', 1, '2021-04-22 10:27:54', '16/Un.03.1/TL.00.1/04/2021'),
	(17, '2021-04-20 16:37:41', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', 'imaniamiu_', 'Maulida Imania Utami', NULL, NULL, 'Skripsi', 'Validasi Ahli Desain Media', 'Pengembangan Media Interaktif Berbasis Android untuk Meningkatkan Pemahaman Materi Peredaran Darah Manusia Siswa Kelas V MIN 2 Kota Madiun', 'Agus Mukti Wibowo, M.Pd', '', 'H. Ahmad Abtokhi, M.Pd', 'admin-pgmi', 1, '2021-04-21 07:41:49', '17/Un.03.1/TL.00.1/04/2021'),
	(18, '2021-04-20 16:49:47', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', 'imaniamiu_', 'Maulida Imania Utami', NULL, NULL, 'Skripsi', 'Validasi Ahli Materi', 'Pengembangan Media Interaktif Berbasis Android untuk Meningkatkan Pemahaman Materi Peredaran Darah Manusia Siswa Kelas V MIN 2 Kota Madiun', 'Agus Mukti Wibowo, M.Pd', '', 'Dian Eka Aprilia Fitria Ningrum, M.Pd', 'admin-pgmi', 1, '2021-04-21 07:41:32', '18/Un.03.1/TL.00.1/04/2021'),
	(19, '2021-04-20 16:50:28', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', 'imaniamiu_', 'Maulida Imania Utami', NULL, NULL, 'Skripsi', 'Validasi Praktisi Pembelajaran', 'Pengembangan Media Interaktif Berbasis Android untuk Meningkatkan Pemahaman Materi Peredaran Darah Manusia Siswa Kelas V MIN 2 Kota Madiun', 'Agus Mukti Wibowo, M.Pd', '', 'Wiwit Lestari, S.Pd', 'admin-pgmi', 1, '2021-04-21 07:41:26', '19/Un.03.1/TL.00.1/04/2021'),
	(20, '2021-04-21 06:23:03', 'Tadris Matematika', 'S1', '17190001', 'Nurul Yamsy', '08983502440', '17190001@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Soal dan Pedoman Wawancara', 'Fleksibilitas Siswa Madrasah Tsanawiyah dalam Menyelesaikan Soal Luas Bangun Datar Ditinjau dari Kemampuan Matematika', 'Dr. Imam Rofiki, M. Pd', '', 'Dr. Wahyu Henky Irawan, M. Pd', 'admin-tmat', 1, '2021-04-22 10:28:04', '20/Un.03.1/TL.00.1/04/2021'),
	(21, '2021-04-21 06:23:13', 'Tadris Matematika', 'S1', '17190001', 'Nurul Yamsy', '08983502440', '17190001@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Soal dan Pedoman Wawancara', 'Fleksibilitas Siswa Madrasah Tsanawiyah dalam Menyelesaikan Soal Luas Bangun Datar Ditinjau dari Kemampuan Matematika', 'Dr. Imam Rofiki, M. Pd', '', 'Dr. Wahyu Henky Irawan, M. Pd', 'admin-tmat', 1, '2021-04-22 10:28:22', '21/Un.03.1/TL.00.1/04/2021'),
	(22, '2021-04-21 06:25:29', 'Tadris Matematika', 'S1', '17190001', 'Nurul Yamsy', '08983502440', '17190001@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Soal dan Pedoman Wawancara', 'Fleksibilitas Siswa Madrasah Tsanawiyah dalam Menyelesaikan Soal Luas Bangun Datar Ditinjau dari Kemampuan Matematika', 'Dr. Imam Rofiki, M. Pd', '', 'Ibrahim Ali Sani Manggala, M. Pd', 'admin-tmat', 1, '2021-04-22 10:28:34', '22/Un.03.1/TL.00.1/04/2021'),
	(23, '2021-04-21 06:26:41', 'Tadris Matematika', 'S1', '17190001', 'Nurul Yamsy', '08983502440', '17190001@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Soal dan Pedoman Wawancara', 'Fleksibilitas Siswa Madrasah Tsanawiyah dalam Menyelesaikan Soal Luas Bangun Datar Ditinjau dari Kemampuan Matematika', 'Dr. Imam Rofiki, M. Pd', '', 'Hadi Santoso, S. Pd', 'admin-tmat', 1, '2021-04-22 10:28:46', '23/Un.03.1/TL.00.1/04/2021'),
	(24, '2021-04-21 08:52:47', 'Tadris Matematika', 'S1', '17190036', 'Vina Rohmatul Afni ', '082244938910', '17190036@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Penelitan', 'EKSPLORASI TRANSFORMASI GEOMETRI SMP PADA MOTIF BATIK BLIMBING MALANG', 'Dr. Imam Rofiki, M.Pd.', '', 'Ulfa Masamah, M.Pd.', 'admin-tmat', 1, '2021-04-22 10:29:04', '24/Un.03.1/TL.00.1/04/2021'),
	(25, '2021-04-21 08:53:48', 'Tadris Matematika', 'S1', '17190019', 'Dewi Nur Aini', '089666885398', '17190019@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Tugas Generalisasi Pola dan Pedoman Wawancara', 'Berpikir Aljabar Siswa SMP dalam Menyelesaikan Soal Generalisasi Pola', 'Dr. Imam Rofiki, M.Pd.', '', 'Ulfa Masamah, M.Pd.', 'admin-tmat', 1, '2021-04-22 10:29:17', '25/Un.03.1/TL.00.1/04/2021'),
	(26, '2021-04-21 08:56:45', 'Tadris Matematika', 'S1', '17190036', 'Vina Rohmatul Afni ', '082244938910', '17190036@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Penelitan', 'EKSPLORASI TRANSFORMASI GEOMETRI SMP PADA MOTIF BATIK BLIMBING MALANG', 'Dr. Imam Rofiki, M.Pd', '', 'Ibrahim Sani Ali Manggala, M.Pd', 'admin-tmat', 1, '2021-04-22 10:29:33', '26/Un.03.1/TL.00.1/04/2021'),
	(27, '2021-04-21 08:58:51', 'Tadris Matematika', 'S1', '17190019', 'Dewi Nur Aini', '089666885398', '17190019@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Tugas Generalisasi Pola dan Pedoman Wawancara', 'Berpikir Aljabar Siswa SMP dalam Menyelesaikan Soal Generalisasi Pola', 'Dr. Imam Rofiki, M.Pd.', '', 'Arini Mayan Fa\'ani, M.Pd.', 'admin-tmat', 1, '2021-04-22 10:29:41', '27/Un.03.1/TL.00.1/04/2021'),
	(28, '2021-04-21 09:24:00', 'Tadris Matematika', 'S1', '17190016', 'Robitul Ilmi', '085748521332', '17190016@student.uin-malang.ac.id', 'Skripsi', 'Validasi Tes Soal Open-Ended', 'Pelevelan Berpikir Kreatif Matematis Siswa Pesantren dan Bukan Pesantren Kelas VIII Madrasah Tsanawiyah Islamiyah Tanggulangin dalam Menyelesaikan Soal Open-Ended Materi Barisan dan Deret Aritmetika', 'Dimas Femy Sasongko, M.Pd', '', 'Siti Faridah, M.Pd', 'admin-tmat', 1, '2021-04-22 10:29:52', '28/Un.03.1/TL.00.1/04/2021'),
	(29, '2021-04-21 09:26:00', 'Tadris Matematika', 'S1', '17190016', 'Robitul Ilmi', '085748521332', '17190016@student.uin-malang.ac.id', 'Skripsi', 'Validasi Soal Tes Open-Ended', 'Pelevelan Berpikir Kreatif Matematis Siswa Pesantren dan Bukan Pesantren Kelas VIII Madrasah Tsanawiyah Islamiyah Tanggulangin dalam Menyelesaikan Soal Open-Ended Materi Barisan dan Deret Aritmetika', 'Dimas Femy Sasongko, M.Pd', '', 'Arini Maryan Fa\'ani, M.Pd', 'admin-tmat', 1, '2021-04-22 10:30:02', '29/Un.03.1/TL.00.1/04/2021'),
	(30, '2021-04-21 09:50:59', 'Tadris Matematika', 'S1', '17190013', 'Siti Nur Asiyah', '081347445146', 'snasyh98@gmail.com', 'Skripsi', 'Validasi soal untuk penelitian skripsi', 'Berpikir Kreatif Siswa Kelas VII pada Pemecahan Soal Luas Bangun Datar Menurut Teori Polya Melalui Tugas Open-Ended', 'Dr. H. Wahyu Hengky Irawan, M.Pd', '', 'Dr. Marhayati, M.Pmat', 'admin-tmat', 1, '2021-04-22 10:30:27', '30/Un.03.1/TL.00.1/04/2021'),
	(31, '2021-04-21 10:22:55', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Validasi Angket Self Regulated Learning', 'Berpikir Kreatif Siswa MTsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Akhmad Muklis, MA', 'admin-tmat', 1, '2021-04-22 10:30:45', '31/Un.03.1/TL.00.1/04/2021'),
	(32, '2021-04-21 10:30:52', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Validasi Angket Self Regulated Learning', 'Berpikir Kreatif Siswa MTsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Sandy Tegariyani Putri S., M.Pd', 'admin-tmat', 1, '2021-04-22 10:31:23', '32/Un.03.1/TL.00.1/04/2021'),
	(37, '2021-04-21 10:43:07', 'Tadris Matematika', 'S1', '17190039', 'Rika Mukarramah', '087750659247', 'rikamukarramah23@gmail.com', 'Skripsi', 'Soal dan pedoman wawancara', 'Hambatan Berpikir Siswa Kelas XI MA Sumber Bungur dalam Memecahkan Masalah Barisan dan Deret', 'Siti Faridah, M.Pd.', '', 'Muhammad Islahul Mukmin, M.Si.,M.Pd.', 'admin-tmat', 1, '2021-04-22 10:35:00', '37/Un.03.1/TL.00.1/04/2021'),
	(38, '2021-04-21 10:44:02', 'Tadris Matematika', 'S1', '17190039', 'Rika Mukarramah', '087750659247', 'rikamukarramah23@gmail.com', 'Skripsi', 'Validasi Soal dan pedoman wawancara', 'Hambatan Berpikir Siswa Kelas XI MA Sumber Bungur dalam Memecahkan Masalah Barisan dan Deret', 'Siti Faridah, M.Pd.', '', 'Muhammad Islahul Mukmin, M.Si.,M.Pd.', 'admin-tmat', 1, '2021-04-22 10:35:20', '38/Un.03.1/TL.00.1/04/2021'),
	(39, '2021-04-21 10:46:44', 'Tadris Matematika', 'S1', '17190039', 'Rika Mukarramah', '087750659247', 'rikamukarramah23@gmail.com', 'Skripsi', 'Validasi Soal dan pedoman wawancara', 'Hambatan Berpikir Siswa Kelas XI MA Sumber Bungur dalam Memecahkan Masalah Barisan dan Deret', 'Siti Faridah, M.Pd.', '', 'Dimas Femy Sasongko, M.Pd.', 'admin-tmat', 1, '2021-04-22 10:35:35', '39/Un.03.1/TL.00.1/04/2021'),
	(40, '2021-04-21 10:57:53', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140025', 'Maulida Imania Utami', '0895328753385', 'imania.maulida99@gmail.com', 'Skripsi', 'Ahli Desain Media', 'Pengembangan Media Interaktif Berbasis Android untuk Meningkatkan Pemahaman Materi Peredaran Darah Manusia Siswa Kelas V MIN 2 Kota Madiun', 'Agus Mukti Wibowo, M.Pd', '', 'H. Ahmad Abtokhi, M.Pd', 'admin-pgmi', 1, '2021-04-21 12:48:19', '40/Un.03.1/TL.00.1/04/2021'),
	(41, '2021-04-21 10:59:17', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140025', 'Maulida Imania Utami', '0895328753385', 'imania.maulida99@gmail.com', 'Skripsi', 'Ahli Materi', 'Pengembangan Media Interaktif Berbasis Android untuk Meningkatkan Pemahaman Materi Peredaran Darah Manusia Siswa Kelas V MIN 2 Kota Madiun', 'Agus Mukti Wibowo, M.Pd', '', 'Rizki Amelia, M.Pd', 'admin-pgmi', 1, '2021-04-21 12:48:30', '41/Un.03.1/TL.00.1/04/2021'),
	(42, '2021-04-21 10:59:51', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140025', 'Maulida Imania Utami', '0895328753385', 'imania.maulida99@gmail.com', 'Skripsi', 'Praktisi Pembelajaran', 'Pengembangan Media Interaktif Berbasis Android untuk Meningkatkan Pemahaman Materi Peredaran Darah Manusia Siswa Kelas V MIN 2 Kota Madiun', 'Agus Mukti Wibowo, M.Pd', '', 'Wiwit Lestari, S.Pd', 'admin-pgmi', 1, '2021-04-21 12:48:38', '42/Un.03.1/TL.00.1/04/2021'),
	(43, '2021-04-21 11:00:24', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140025', 'Maulida Imania Utami', '0895328753385', 'imania.maulida99@gmail.com', 'Skripsi', 'Validasi Ahli Materi', 'Pengembangan Media Interaktif Berbasis Android untuk Meningkatkan Pemahaman Materi Peredaran Darah Manusia Siswa Kelas V MIN 2 Kota Madiun', 'Agus Mukti Wibowo, M.Pd', '', 'Dian Eka Aprilia Fitria Ningrum, M.Pd', 'admin-pgmi', 1, '2021-04-21 12:48:47', '43/Un.03.1/TL.00.1/04/2021'),
	(45, '2021-04-21 11:25:59', 'Tadris Bahasa Inggris', 'S1', '17180002', 'Asna Robah', '081231366568', 'asnarobah29@gmail.com', 'Skripsi', 'Validasi instrument penelitian skripsi', 'The EFL StudentÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢s Strategies to Overcome Speaking Problems in Speaking Class', 'Nur Fitria Anggrisia, M.Pd', '', 'Basori, M.S.Ed', 'Admin-TBI', 1, '2021-04-23 11:56:13', '45/Un.03.1/TL.00.1/04/2021'),
	(46, '2021-04-21 12:51:06', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130058', 'Annisa Luthfiyaturrofifah', '081554514425', 'annisaltr@gmail.com', 'Skripsi', 'Instrumen penelitian (pedoman wawancara)', 'Efektivitas Menghafal Al-Qur\'an Dalam Membentuk Kecerdasan Intelektual dan Kecerdasan Spiritual Mahasiswa Pendidikan IPS di Uin Malang', 'Ulfi Andrian Sari,M.Pd', '', 'Ermita Zakiyah,M.Th.I', 'admin-pips', 1, '2021-04-21 12:53:56', '46/Un.03.1/TL.00.1/04/2021'),
	(47, '2021-04-21 14:41:39', 'Tadris Matematika', 'S1', '17190030', 'Aisyi Nilna Auliya', '085655169719', 'nilnaisyi20@gmail.com', 'Skripsi', 'Validasi Instrumen Penelitian', 'Eksplorasi Materi Geometri SMP pada Motif Batik Pamiluto Ceplokan Gresik', 'Dr. Marhayati, M.Pmat.', '', 'Dr. H. Wahyu Henky Irawan, M.Pd.', 'admin-tmat', 1, '2021-04-22 10:35:50', '47/Un.03.1/TL.00.1/04/2021'),
	(48, '2021-04-21 14:45:27', 'Tadris Matematika', 'S1', '17190030', 'Aisyi Nilna Auliya', '085655169719', 'nilnaisyi20@gmail.com', 'Skripsi', 'Validasi Instrumen Penelitian', 'Eksplorasi Materi Geometri SMP pada Motif Batik Pamiluto Ceplokan Gresik', 'Dr. Marhayati, M.Pmat.', '', 'Dr. Syaifuddin, S.Si., M.Pd.', 'admin-tmat', 1, '2021-04-22 10:36:06', '48/Un.03.1/TL.00.1/04/2021'),
	(49, '2021-04-21 16:25:29', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140073', 'Anggur Nur Fatimah', '089694036307', 'angguuuuur@gmail.com', 'Skripsi', 'Desain', 'Implementasi Media Pembelajaran E-Book Berbasis Aplikasi Android pada Pelajaran Bahasa Jawa Kelas V di SD Negeri Junrejo 01 Kota Batu', 'Ratna Nulinnaja, M.Pd.I', '', 'H. Ahmad Makki Hasan', 'admin-pgmi', 1, '2021-04-21 20:09:04', '49/Un.03.1/TL.00.1/04/2021'),
	(50, '2021-04-21 16:38:00', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140073', 'Anggur Nur Fatimah', '089694036307', 'angguuuuur@gmail.com', 'Skripsi', 'Ahli Desain Media', 'Implementasi Media Pembelajaran E-Book Berbasis Aplikasi Android pada Pelajaran Bahasa Jawa Kelas V di SD Negeri Junrejo 01 Kota Batu', 'Ratna Nulinnaja, M.Pd.I', '', 'Dr. H. Ahmad Makki Hasan', 'admin-pgmi', 1, '2021-04-21 20:09:15', '50/Un.03.1/TL.00.1/04/2021'),
	(51, '2021-04-22 09:17:35', 'Tadris Matematika', 'S1', '17190012', 'Azizatul Maghfiroh', '085708944448', 'maghfirohazizah21@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Pemahaman Siswa terhadap Konsep Lingkaran Berdasarkan Gaya Belajar', 'Muhammad Islahul Mukmin, M.Si, M.Pd', '', 'Dimas Femy Sasongko, M.Pd', 'admin-tmat', 1, '2021-04-22 10:36:21', '51/Un.03.1/TL.00.1/04/2021'),
	(52, '2021-04-22 09:20:04', 'Tadris Matematika', 'S1', '17190012', 'Azizatul Maghfiroh', '085708944448', 'maghfirohazizah21@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Pemahaman Siswa terhadap Konsep Lingkaran Berdasarkan Gaya Belajar', 'Muhammad Islahul Mukmin, M.Si, M.Pd', '', 'Hadi Santoso, S.Pd', 'admin-tmat', 1, '2021-04-22 10:36:55', '52/Un.03.1/TL.00.1/04/2021'),
	(53, '2021-04-22 09:23:55', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:07:23', 'pengajuan berkali-kali'),
	(54, '2021-04-22 09:23:58', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:07:07', 'pengajuan berkali-kali'),
	(55, '2021-04-22 09:24:12', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:06:52', 'pengajuan berkali-kali'),
	(56, '2021-04-22 09:24:13', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:06:40', 'pengajuan berkali-kali'),
	(57, '2021-04-22 09:24:14', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:06:13', 'pengajuan berkali-kali'),
	(58, '2021-04-22 09:24:14', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:05:57', 'pengajuan berkali-kali'),
	(59, '2021-04-22 09:24:14', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:05:42', 'pengajuan berkali-kali'),
	(60, '2021-04-22 09:24:21', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:05:25', 'pengajuan berkali-kali'),
	(61, '2021-04-22 09:24:23', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:05:11', 'pengajuan berkali-kali'),
	(62, '2021-04-22 09:24:23', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:04:44', 'pengajuan berkali-kali'),
	(63, '2021-04-22 09:24:24', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:04:27', 'pengajuan berkali-kali'),
	(64, '2021-04-22 09:24:26', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:04:15', 'pengajuan berkali-kali'),
	(65, '2021-04-22 09:24:31', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:03:58', 'pengajuan berkali-kali'),
	(66, '2021-04-22 09:24:32', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:03:45', 'pengajuan berkali-kali'),
	(67, '2021-04-22 09:24:33', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:03:33', 'pengajuan berkali-kali'),
	(68, '2021-04-22 09:24:34', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani,M.Pd', 'admin-tmat', 2, '2021-04-22 11:03:21', 'pengajuan berkali-kali'),
	(69, '2021-04-22 09:25:24', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Arini Mayan Fa\'ani, M.Pd', 'admin-tmat', 2, '2021-04-22 11:02:58', 'pengajuan berkali-kali'),
	(70, '2021-04-22 09:26:43', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki,M.Pd', '', 'Dimas Femy Sasongko,M.Pd', 'admin-tmat', 2, '2021-04-22 11:02:38', 'pengajuan berkali-kali'),
	(71, '2021-04-22 11:14:49', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki, M.Pd', '', 'Arini Mayan Fa\'ani, M.Pd', 'admin-tmat', 1, '2021-04-27 11:08:35', '71/Un.03.1/TL.00.1/04/2021'),
	(72, '2021-04-22 11:17:06', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki, M.Pd', '', 'Dimas Femy Sasongko, M.Pd', 'admin-tmat', 1, '2021-04-27 11:08:49', '72/Un.03.1/TL.00.1/04/2021'),
	(73, '2021-04-22 11:29:13', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130136', 'Endah Ratnasari', '082228284206', 'endahratnasari937@gmail.com', 'Skripsi', 'Keperluan Uji Instrumen Skripsi', 'PENCAPAIAN KOMPETENSI BELAJAR MATA PELAJARAN ILMU PENGETAHUAN SOSIAL MELALUI PEMBELAJARAN ONLINE DI ERA NEW NORMAL (STUDI KASUS KELAS VIII DI SMP ISLAM BANI HASYIM SINGOSARI, MALANG)', 'ULFI ANDRIAN SARI, M.Pd', '', 'HAYYUN LATHIFATY YASRI, M.Pd', 'admin-pips', 2, '2021-04-23 12:00:40', 'NIM kurang tepat\r\n'),
	(74, '2021-04-22 11:48:44', 'Tadris Matematika', 'S1', '17190021', 'Laily Wahyu Ramdhani', '087811307529', 'ayuramdhani48@gmail.com', 'Skripsi', 'Instrumen Penelitian', 'Kompetensi Strategis Siswa dalam Memecahkan Masalah PISA-Like pada Konteks Mandalika', 'Dr. Imam Rofiki, M.Pd', '', 'Sapi\'i, S.Pd', 'admin-tmat', 1, '2021-04-27 11:09:05', '74/Un.03.1/TL.00.1/04/2021'),
	(75, '2021-04-22 12:18:16', 'Tadris Matematika', 'S1', '17190019', 'Dewi Nur Aini', '089666885398', '17190019@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Tugas Generalisasi Pola dan Pedoman Wawancara', 'Berpikir Aljabar Siswa SMP dalam Menyelesaikan Soal Generalisasi Pola', 'Dr. Imam Rofiki, M.Pd.', '', 'Suryati, S.Pd.', 'admin-tmat', 1, '2021-04-27 11:09:16', '75/Un.03.1/TL.00.1/04/2021'),
	(76, '2021-04-22 12:37:33', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Angket Self Regulated Learning', 'Berpikir Kreatif Matematis Siswa MTsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Akhmad Muklis, MA', 'admin-tmat', 1, '2021-04-27 11:11:24', '76/Un.03.1/TL.00.1/04/2021'),
	(77, '2021-04-22 12:38:17', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Angket Self Regulated Learning', 'Berpikir Kreatif Matematis Siswa MTsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Sandy Tegariyani Putri S., M.Pd', 'admin-tmat', 1, '2021-04-27 11:13:15', '77/Un.03.1/TL.00.1/04/2021'),
	(78, '2021-04-22 12:39:01', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Soal Tes dan Pedoman Wawancara Berpikir Kreatif Matematis Siswa', 'Berpikir Kreatif Matematis Siswa MTsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Siti Faridah, M.Pd', 'admin-tmat', 1, '2021-04-27 11:13:28', '78/Un.03.1/TL.00.1/04/2021'),
	(79, '2021-04-22 12:39:39', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Soal Tes dan Pedoman Wawancara Berpikir Kreatif Matematis Siswa', 'Berpikir Kreatif Matematis Siswa MTsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Nuril Huda, M.Pd', 'admin-tmat', 1, '2021-04-27 11:13:43', '79/Un.03.1/TL.00.1/04/2021'),
	(88, '2021-04-23 12:27:54', 'Tadris Bahasa Inggris', 'S1', '17180012', 'Minatul Azmi', '085792629553', 'minatulazmi01@gmail.com', 'Skripsi', 'Validasi kuisioner', 'The Use of Digital Storytelling in Teaching Listening  for the IX Grade of MTsN 4 Jembrana', 'Dr. H. Langgeng Budianto, M. Pd', '', 'Dr. H. Langgeng Budianto, M. Pd', 'admin-tbi', 1, '2021-04-27 09:26:29', '88/Un.03.1/TL.00.1/04/2021'),
	(89, '2021-04-23 15:44:15', 'Tadris Matematika', 'S1', '17190008', 'Yasinta Qur\'ain Nurdinia', '085812424258', '17190008@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Soal dan Pedoman Wawancara', 'Kemampuan Number Sense Siswa MTsN Kota Batu dalam Menyelesaikan Soal Pecahan', 'Dr. Imam Rofiki, M.Pd', '', 'Ulfa Masamah, M.Pd.', 'admin-tmat', 1, '2021-04-27 11:14:57', '89/Un.03.1/TL.00.1/04/2021'),
	(90, '2021-04-23 15:45:18', 'Tadris Matematika', 'S1', '17190008', 'Yasinta Qur\'ain Nurdinia', '085812424258', '17190008@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Soal dan Pedoman Wawancara', 'Kemampuan Number Sense Siswa MTsN Kota Batu dalam Menyelesaikan Soal Pecahan', 'Dr. Imam Rofiki, M.Pd', '', 'Dimas Femy Sasongko, M.Pd.', 'admin-tmat', 1, '2021-04-27 11:15:10', '90/Un.03.1/TL.00.1/04/2021'),
	(91, '2021-04-23 15:46:56', 'Tadris Matematika', 'S1', '17190008', 'Yasinta Qur\'ain Nurdinia', '085812424258', '17190008@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Soal dan Pedoman Wawancara', 'Kemampuan Number Sense Siswa MTsN Kota Batu dalam Menyelesaikan Soal Pecahan', 'Dr. Imam Rofiki, M.Pd', '', 'Hadi Santoso, S.Pd', 'admin-tmat', 1, '2021-04-27 11:15:22', '91/Un.03.1/TL.00.1/04/2021'),
	(92, '2021-04-23 20:25:55', 'Tadris Matematika', 'S1', '17190013', 'Siti Nur Asiyah', '081347445146', 'snasyh98@gmail.com', 'Skripsi', 'Soal untuk penelitian skripsi', 'Berpikir Kreatif Siswa SMP kelas VII pada Pemecahan Soal Luas Bangun Datar Menurut Teori Polya Melalui Tugas Open-ended', 'Dr. H. Wahyu Hengky Irawan, M.Pd', '', 'Arini Maryan Fa\'ani, M.Pd', 'admin-tmat', 1, '2021-04-27 11:15:34', '92/Un.03.1/TL.00.1/04/2021'),
	(93, '2021-04-23 20:33:26', 'Tadris Matematika', 'S1', '17190013', 'Siti Nur Asiyah', '081347445146', 'snasyh98@gmail.com', 'Skripsi', 'Soal untuk penelitian skripsi', 'Berpikir Kreatif Siswa SMP kelas VII pada Pemecahan Soal Luas Bangun Datar Menurut Teori Polya Melalui Tugas Open-ended', 'Dr. H. Wahyu Hengky Irawan, M.Pd', '', 'Ibrahim Sani Ali Manggala, M.Pd', 'admin-tmat', 1, '2021-04-27 11:15:44', '93/Un.03.1/TL.00.1/04/2021'),
	(94, '2021-04-23 20:34:43', 'Tadris Matematika', 'S1', '17190013', 'Siti Nur Asiyah', '081347445146', 'snasyh98@gmail.com', 'Skripsi', 'Soal untuk penelitian skripsi', 'Berpikir Kreatif Siswa SMP kelas VII pada Pemecahan Soal Luas Bangun Datar Menurut Teori Polya Melalui Tugas Open-ended', 'Dr. H. Wahyu Hengky Irawan, M.Pd', '', 'Dr. Abdussakir, M.Pd', 'admin-tmat', 1, '2021-04-27 11:15:54', '94/Un.03.1/TL.00.1/04/2021'),
	(95, '2021-04-24 06:49:46', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'Skripsi', 'Validasi Ahli Materi', 'Pengembangan Media Koper Edukasi Materi Pecahan Untuk Meningkatkan Pemahaman Konsep Peserta Didik Kelas III MI Hayatul Islamiyah Pakis Malang', 'Ria Norfika Yuliandari, M.Pd', '', 'Dr. Marhayati, M. Pmat', 'Admin-pgmi', 1, '2021-04-24 10:46:23', '95/Un.03.1/TL.00.1/04/2021'),
	(96, '2021-04-24 06:53:38', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'Skripsi', 'Validasi Ahli Desain', 'Pengembangan Media Koper Edukasi Materi Pecahan Untuk Meningkatkan Pemahaman Konsep Peserta Didik Kelas III MI Hayatul Islamiyah Pakis Malang', 'Ria Norfika Yuliandari, M.Pd', '', 'Galih Puji Mulyoto, M.Pd', 'Admin-pgmi', 1, '2021-04-24 10:46:14', '96/Un.03.1/TL.00.1/04/2021'),
	(97, '2021-04-24 06:54:55', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'Skripsi', 'Validasi Ahli Desain', 'Pengembangan Media Koper Edukasi Materi Pecahan Untuk Meningkatkan Pemahaman Konsep Peserta Didik Kelas III MI Hayatul Islamiyah Pakis Malang', 'Ria Norfika Yuliandari, M.Pd', '', 'Dr. H. Ahmad Makki Hasan, M.Pd', 'Admin-pgmi', 1, '2021-04-24 10:46:03', '97/Un.03.1/TL.00.1/04/2021'),
	(98, '2021-04-24 07:08:22', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'Skripsi', 'Validasi Ahli Pembelajaran', 'Pengembangan Media Koper Edukasi Materi Pecahan Untuk Meningkatkan Pemahaman Konsep Peserta Didik Kelas III MI Hayatul Islamiyah Pakis Malang', 'Ria Norfika Yuliandari, M.Pd', '', 'Ulfia Churidatul A. M.Pd', 'Admin-pgmi', 1, '2021-04-24 10:45:18', '98/Un.03.1/TL.00.1/04/2021'),
	(99, '2021-04-25 23:20:17', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130136', 'Endah Ratnasari', '082228284206', 'endahratnasari937@gmail.com', 'Skripsi', 'Uji instrumen skripsi', 'PENCAPAIAN KOMPETENSI BELAJAR MATA PELAJARAN  ILMU PENGETAHUAN SOSIAL MELALUI PEMBELAJARAN ONLINE  DI ERA NEW NORMAL (STUDI KASUS KELAS VIII DI SMP ISLAM TERPADU AL ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ ISHLAH UNAAHA, S', 'Ulfi Andrian Sari, M.Pd', '', 'HAYYUN LATHIFATY YASRI,M.Pd', 'admin-pips', 1, '2021-04-26 11:26:18', '99/Un.03.1/TL.00.1/04/2021'),
	(100, '2021-04-26 05:56:31', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140111', 'Nadiatul Ulya', '081281846725', 'nadiatululya2@gmail.com', 'Skripsi', 'Skripsi', 'Pengaruh Motivasi Belajar Terhadap Kemampuan Berpikir Kritis Siswa Kelas VI Selama Masa Pandemi di SDN Songgokerto 03 Kota Batu ', 'Ahmad Abtokhi, M.Pd', '', 'Dian Anggraini, S.Pd, M.Pd', 'Admin-pgmi', 1, '2021-04-26 08:54:20', '100/Un.03.1/TL.00.1/04/2021'),
	(101, '2021-04-26 09:49:29', 'Pendidikan Bahasa Arab', 'S1', '17150060', 'Binti Maghfirotul A\'yuni', '085746506273', 'bintimaghfirotul14@gmail.com', 'Skripsi', 'Validasi Materi', 'ÃƒËœÃ‚ÂªÃƒËœÃ‚Â·Ãƒâ„¢Ã‹â€ Ãƒâ„¢Ã…Â ÃƒËœÃ‚Â± ÃƒËœÃ‚Â§Ãƒâ„¢Ã¢â‚¬Å¾Ãƒâ„¢Ã‹â€ ÃƒËœÃ‚Â³Ãƒâ„¢Ã…Â Ãƒâ„¢Ã¢â‚¬Å¾ÃƒËœÃ‚Â© ÃƒËœÃ‚Â§Ãƒâ„¢Ã¢â‚¬Å¾ÃƒËœÃ‚ÂªÃƒËœÃ‚Â¹Ãƒâ„¢Ã¢â‚¬Å¾Ãƒâ„¢Ã…Â Ãƒâ„¢Ã¢â‚¬Â¦Ãƒâ„¢Ã…Â ÃƒËœÃ‚Â© Ã', 'Dr. Abdul Aziz, M.Pd', '', 'Dr. H. Bisri Musthofa, MA', 'admin-pba', 0, NULL, NULL),
	(102, '2021-04-26 09:55:09', 'Pendidikan Bahasa Arab', 'S1', '17150060', 'Binti Maghfirotul A\'yuni', '085746506273', 'bintimaghfirotul14@gmail.com', 'Skripsi', 'Validasi Media', 'ÃƒËœÃ‚ÂªÃƒËœÃ‚Â·Ãƒâ„¢Ã‹â€ Ãƒâ„¢Ã…Â ÃƒËœÃ‚Â± ÃƒËœÃ‚Â§Ãƒâ„¢Ã¢â‚¬Å¾Ãƒâ„¢Ã‹â€ ÃƒËœÃ‚Â³Ãƒâ„¢Ã…Â Ãƒâ„¢Ã¢â‚¬Å¾ÃƒËœÃ‚Â© ÃƒËœÃ‚Â§Ãƒâ„¢Ã¢â‚¬Å¾ÃƒËœÃ‚ÂªÃƒËœÃ‚Â¹Ãƒâ„¢Ã¢â‚¬Å¾Ãƒâ„¢Ã…Â Ãƒâ„¢Ã¢â‚¬Â¦Ãƒâ„¢Ã…Â ÃƒËœÃ‚Â© Ã', 'Dr. Abdul Aziz, M. Pd', '', 'H. Ahmad Makki Hasan, M. Pd', 'admin-pba', 0, NULL, NULL),
	(103, '2021-04-26 10:15:02', 'Tadris Matematika', 'S1', '17190001', 'Nurul Yamsy', '08983502440', '17190001@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Soal dan Pedoman Wawancara', 'Fleksibilitas Siswa Madrasah Tsanawiyah dalam Menyelesaikan Soal Luas Bangun Datar Ditinjau dari Kemampuan Matematika', 'Dr. Imam Rofiki, M. Pd.', '', 'Ulfa Masamah, M. Pd.', 'admin-tmat', 1, '2021-04-27 11:16:52', '103/Un.03.1/TL.00.1/04/2021'),
	(104, '2021-04-26 10:53:29', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140058', 'Kholidiyah Turoja Daroin', '081332604047', 'kholidd87@gmail.com', 'Skripsi', 'Validasi Materi', 'Pengembangan Media Pembelajaran Materi Panas Dan Perpindahannya Berbasis Android Untuk Siswa Kelas V MI An- Nur Kecamatan Turen Kabupaten Malang ', 'Dian Eka Aprilia Fitria Ningrum,M.Pd', '', 'Rizki Amelia,M.Pd', 'Admin-pgmi', 1, '2021-04-26 11:04:29', '104/Un.03.1/TL.00.1/04/2021'),
	(105, '2021-04-26 10:56:56', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140058', 'Kholidiyah Turoja Daroin', '081332604047', 'kholidd87@gmail.com', 'Skripsi', 'Validasi Media', 'Pengembangan Media Pembelajaran Materi Panas Dan Perpindahannya Berbasis Android Untuk Siswa Kelas V MI An- Nur Kecamatan Turen Kabupaten Malang ', 'Dian Eka Aprilia Fitria Ningrum,M.Pd', '', 'Wiku Aji Sugiri,M.Pd', 'Admin-pgmi', 1, '2021-04-26 11:04:50', '105/Un.03.1/TL.00.1/04/2021'),
	(106, '2021-04-26 12:43:10', 'Tadris Matematika', 'S1', '17190016', 'Robitul Ilmi', '085748521332', '17190016@student.uin-malang.ac.id', 'Skripsi', 'Soal Tes Open-Ended', 'Pelevelan Berpikir Kreatif Matematis Siswa Pesantren dan Bukan Pesantren Kelas VIII Madrasah Tsanawiyah Islamiyah Tanggulangin dalam Menyelesaikan Soal Open-Ended Materi Barisan dan Deret Aritmetika', 'Dimas Femy Sasongko, M.Pd', '', 'Ibrahim Sani Ali Manggala, M.Pd', 'admin-tmat', 1, '2021-04-27 11:16:06', '106/Un.03.1/TL.00.1/04/2021'),
	(107, '2021-04-26 14:11:37', 'Tadris Matematika', 'S1', '17190024', 'Nur Alaviyah Alhikma', '0895333342953', 'ala.hikma@gmail.com', 'Skripsi', 'Validasi Materi Media', 'Pengembangan E LKPD Berbasis Strategi REACT Pada Materi Bangun Ruang Sisi Datar Kelas VIII SMP Islam Sabilurrosyad Gasek Malang', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Ibrahim Sani Ali Manggala, M.Pd', 'admin-tmat', 1, '2021-04-27 11:16:16', '107/Un.03.1/TL.00.1/04/2021'),
	(108, '2021-04-26 18:32:43', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '16140142', 'Dona Riki Satriawan', '081357601677', 'rikisatriawan12@gmail.com', 'Skripsi', 'Validasi Ahli Materi', 'Pengembangan Media Permainan Kartu Bingo Pada Materi Nilai dan Kesetaraan Pecahan Mata Uang Kelas II MIN 1 Blitar', 'Ria Norfika Yuliandari, M.Pd', '', 'Muhammad Islahul Mukmin, M.Si., M.Pd', 'admin-pgmi', 1, '2021-04-26 21:28:42', '108/Un.03.1/TL.00.1/04/2021'),
	(109, '2021-04-26 21:40:12', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '16140142', 'Dona Riki Satriawan', '081357601677', 'rikisatriawan12@gmail.com', 'Skripsi', 'Validasi Soal Pre Test dan Soal Post Test', 'Pengembangan Media Permainan Kartu Bingo Pada Materi Nilai dan Kesetaraan Pecahan Mata Uang Kelas II MIN 1 Blitar', 'Ria Norfika Yuliandari, M.Pd', '', 'Dimas Femy Sasongko, M.Pd', 'admin-pgmi', 1, '2021-04-26 21:41:27', '109/Un.03.1/TL.00.1/04/2021'),
	(110, '2021-04-26 22:32:34', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140076', 'Ainun Nuzula Ar-Rahmah', '085730225553', 'ainunzula@gmail.com', 'Skripsi', 'Ahli Media', 'Pengembangan Evaluasi Pembelajaran Berbasis Game Edukatif Menggunakan Platform Wordwall.net Pada Siswa Kelas V di SDIT Al-Mishbah Sumobito Jombang', 'Dr. Rini Nafsiati Astuti, M.Pd', '', 'Galih Puji Mulyoto, M.Pd', 'Admin-pgmi', 1, '2021-04-27 08:55:49', '110/Un.03.1/TL.00.1/04/2021'),
	(111, '2021-04-27 12:59:55', 'Tadris Matematika', 'S1', '17190018', 'Hidayatur Rohmah', '085784017719', 'hidasquad@gmail.com', 'Skripsi', 'Validasi Angket AQ', 'Proses Penalaran Siswa MTs Dalam Memecahkan Masalah SPLDV Berdasarkan Langkah-Langkah Polya Ditinjau Dari AQ', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Akhmad Mukhlis, MA', 'admin-tmat', 1, '2021-04-28 10:23:19', '111/Un.03.1/TL.00.1/04/2021'),
	(112, '2021-04-27 14:31:42', 'Tadris Matematika', 'S1', '17190034', 'Achmad Amir syarifuddin', '085692402563', 'amiranakcbindonesia@gmail.com', 'Skripsi', 'Materi', 'PENGEMBANGAN MEDIA MANIPULATIF PADA MATERI OPERASI HIMPUNAN SISWA KELAS VII SMP ISLAM BABURROHMAH UNTUK MENINGKATKAN HASIL BELAJAR', 'Dr. Wahyu Henky Irawan, M.Pd.', '', 'Siti Faridah, M.Pd.', 'admin-tmat', 1, '2021-04-28 10:23:29', '112/Un.03.1/TL.00.1/04/2021'),
	(113, '2021-04-27 18:00:58', 'Tadris Matematika', 'S1', '17190024', 'Nur Alaviyah Alhikma', '0895333342953', 'ala.hikma@gmail.com', 'Skripsi', 'Validasi Media ', 'Pengembangan E LKPD Berbasis Strategi REACT Pada Materi Bangun Ruang Sisi Datar Kelas VIII SMP Islam Sabilurrosyad Gasek Malang', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Galih Puji Mulyoto, M.Pd', 'admin-tmat', 1, '2021-04-28 10:25:01', '113/Un.03.1/TL.00.1/04/2021'),
	(114, '2021-04-28 12:09:51', 'Tadris Matematika', 'S1', '17190024', 'Nur Alaviyah Alhikma', '0895333342953', 'ala.hikma@gmail.com', 'Skripsi', 'Validasi Media ( Ahli Praktisi )', 'Pengembangan E LKPD Berbasis Strategi REACT Pada Materi Bangun Ruang Sisi Datar Kelas VIII SMP Islam Sabilurrosyad Gasek Malang', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Nuruddin Syauqi S.Si', 'admin-tmat', 1, '2021-04-28 14:09:49', '114/Un.03.1/TL.00.1/04/2021'),
	(115, '2021-04-28 13:23:56', 'Tadris Matematika', 'S1', '17190018', 'Hidayatur Rohmah', '085784017719', 'hidasquad@gmail.com', 'Skripsi', 'Angket AQ', 'Proses Penalaran Siswa MTs Dalam Memecahkan Masalah SPLDV Berdasarkan Langkah-Langkah Polya Ditinjau Dari AQ', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Dr. Syaifuddin, M.Pd.', 'admin-tmat', 1, '2021-04-28 14:10:13', '115/Un.03.1/TL.00.1/04/2021'),
	(116, '2021-04-28 18:54:42', 'Tadris Matematika', 'S1', '17190034', 'Achmad Amir syarifuddin', '085692402563', 'amiranakcbindonesia@gmail.com', 'Skripsi', 'Media Manipulatif Operasi Himpunan', 'PENGEMBANGAN MEDIA MANIPULATIF PADA MATERI OPERASI HIMPUNAN SISWA KELAS VII SMP ISLAM BABURROHMAH UNTUK MENINGKATKAN HASIL BELAJAR', 'Dr. Wahyu Henky Irawan, M.Pd.', '', 'Dimas Femy Sasongko, M.Pd.', 'admin-tmat', 1, '2021-04-29 10:24:35', '116/Un.03.1/TL.00.1/04/2021'),
	(117, '2021-04-29 09:24:59', 'Tadris Matematika', 'S1', '17190018', 'Hidayatur Rohmah', '085784017719', 'hidasquad@gmail.com', 'Skripsi', 'Soal/TPM dan Pedoman Wawancara', 'Proses Penalaran Siswa MTs Dalam Memecahkan Masalah SPLDV Berdasarkan Langkah-Langkah Polya Ditinjau Dari AQ', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'SITI FARIDAH, M.Pd', 'admin-tmat', 1, '2021-04-29 10:23:28', '117/Un.03.1/TL.00.1/04/2021'),
	(118, '2021-04-29 09:25:46', 'Tadris Matematika', 'S1', '17190018', 'Hidayatur Rohmah', '085784017719', 'hidasquad@gmail.com', 'Skripsi', 'Soal/TPM dan Pedoman Wawancara', 'Proses Penalaran Siswa MTs Dalam Memecahkan Masalah SPLDV Berdasarkan Langkah-Langkah Polya Ditinjau Dari AQ', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'NURIL HUDA, M.Pd', 'admin-tmat', 1, '2021-04-29 10:23:50', '118/Un.03.1/TL.00.1/04/2021'),
	(119, '2021-04-30 07:40:13', 'Pendidikan Agama Islam', 'S1', '17110166', 'Chusnul Yaqin', '6285895709081', 'Yaqienc@gmail.com', 'Skripsi', 'Validasi Ahli Materi Kitab Aqidatul Awam ', 'PENGEMBANGAN MEDIA POCKET BOOK KITAB AQIDATUL AWAM DI  PONDOK PESANTREN SALAF AL-QURÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢AN SHOLAHUL HUDA AL- MUJAHIDIN', 'Dr. H. Sugeng Listyo Prabowo, M.Pd ', '', 'Bahrudin Nur Aziz Zakaria, Lc, S.Hum, M.Pd', 'admin-pai', 1, '2021-05-24 09:32:28', '119/Un.03.1/TL.00.1/05/2021'),
	(120, '2021-04-30 07:42:52', 'Pendidikan Agama Islam', 'S1', '17110166', 'Chusnul Yaqin', '6285895709081', 'Yaqienc@gmail.com', 'Skripsi', 'Validasi Ahli Desain Pocket Book ', 'PENGEMBANGAN MEDIA POCKET BOOK KITAB AQIDATUL AWAM DI  PONDOK PESANTREN SALAF AL-QURÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢AN SHOLAHUL HUDA AL- MUJAHIDIN', 'Dr. H. Sugeng Listyo Prabowo, M.Pd ', '', 'Hafis Rahmanda Firmansyah, S.Pd', 'admin-pai', 1, '2021-05-24 09:32:46', '120/Un.03.1/TL.00.1/05/2021'),
	(121, '2021-04-30 07:46:14', 'Pendidikan Agama Islam', 'S1', '17110166', 'Chusnul Yaqin', '6285895709081', 'Yaqienc@gmail.com', 'Skripsi', 'Validasi Praktisi Pocket Book Kitab Aqidatul Awam ', 'PENGEMBANGAN MEDIA POCKET BOOK KITAB AQIDATUL AWAM DI  PONDOK PESANTREN SALAF AL-QURÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢AN SHOLAHUL HUDA AL- MUJAHIDIN', 'Dr. H. Sugeng Listyo Prabowo, M.Pd ', '', 'Miftakhul Munir, S.Pd', 'admin-pai', 1, '2021-05-24 09:32:55', '121/Un.03.1/TL.00.1/05/2021'),
	(122, '2021-04-30 15:25:19', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '14130058', 'MOH HABIBUL MUBIN', '082125424122', 'habibulmubin@gmail.com', 'Skripsi', 'Tugas akhir kuliah', 'PEMANFAATAN GAWAI (SMARTPHONE) SEBAGAI MEDIA PEMBELAJARAN MAHASISWA PENDIDIKAN ILMU PENGETAHUAN SOSIAL UNIVERSITAS ISLAM NEGERI MAULANA MALIK IBRAHIM MALANG', 'Prof. Dr. H. Wahidmurni, M.Pd. Ak', '', 'Lusty Firmantika, M.Pd', 'admin-pips', 1, '2021-04-30 15:46:30', '122/Un.03.1/TL.00.1/04/2021'),
	(123, '2021-04-30 15:26:08', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '14130058', 'MOH HABIBUL MUBIN', '082125424122', 'habibulmubin@gmail.com', 'Skripsi', 'Tugas akhir kuliah', 'PEMANFAATAN GAWAI (SMARTPHONE) SEBAGAI MEDIA PEMBELAJARAN MAHASISWA PENDIDIKAN ILMU PENGETAHUAN SOSIAL UNIVERSITAS ISLAM NEGERI MAULANA MALIK IBRAHIM MALANG', 'Prof. Dr. H. Wahidmurni, M.Pd. Ak', '', 'Imam Wahyu Hidayat, M.Pd.I', 'admin-pips', 1, '2021-04-30 15:46:49', '123/Un.03.1/TL.00.1/04/2021'),
	(124, '2021-05-03 09:20:10', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140011', 'Rohmawati Zulkarnain', '089698943750', 'rahmawatizulkarnain13@gmail.com', 'Skripsi', 'Validasi isi/materi media SMART BOOK materi Adaptasi makhluk hidup ', 'Pengembangan Smart Book Materi Adaptasi Makhluk Hidup untuk Meningkatkan Kemampuan Berpikir Kritis Siswa Kelas VI UPT SDN Trajeng 1 Kota Pasuruan', 'Agus Mukti Wibowo, M.Pd', '', 'Dian Eka Aprilia Fitria Ningrum, M.Pd', 'admin-pgmi', 1, '2021-05-03 12:19:39', '124/Un.03.1/TL.00.1/05/2021'),
	(125, '2021-05-03 09:20:11', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140011', 'Rohmawati Zulkarnain', '089698943750', 'rahmawatizulkarnain13@gmail.com', 'Skripsi', 'Validasi isi/materi media SMART BOOK materi Adaptasi makhluk hidup ', 'Pengembangan Smart Book Materi Adaptasi Makhluk Hidup untuk Meningkatkan Kemampuan Berpikir Kritis Siswa Kelas VI UPT SDN Trajeng 1 Kota Pasuruan', 'Agus Mukti Wibowo, M.Pd', '', 'Dian Eka Aprilia Fitria Ningrum, M.Pd', 'admin-pgmi', 1, '2021-05-03 12:19:53', '125/Un.03.1/TL.00.1/05/2021'),
	(126, '2021-05-03 10:56:18', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140011', 'Rohmawati Zulkarnain', '089698943750', 'rahmawatizulkarnain13@gmail.com', 'Skripsi', 'Validasi desain media Smart Book Materi Adaptasi Makhluk Hidup', 'Pengembangan Smart Book Materi Adaptasi Makhluk Hidup untuk Meningkatkan Kemampuan Berpikir Kritis Siswa Kelas VI UPT SDN Trajeng 1 Kota Pasuruan', 'Agus Mukti Wibowo, M.Pd', '', 'Galih Puji Mulyoto M.Pd', 'admin-pgmi', 1, '2021-05-03 12:20:08', '126/Un.03.1/TL.00.1/05/2021'),
	(127, '2021-05-03 10:56:33', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140011', 'Rohmawati Zulkarnain', '089698943750', 'rahmawatizulkarnain13@gmail.com', 'Skripsi', 'Validasi desain media Smart Book Materi Adaptasi Makhluk Hidup', 'Pengembangan Smart Book Materi Adaptasi Makhluk Hidup untuk Meningkatkan Kemampuan Berpikir Kritis Siswa Kelas VI UPT SDN Trajeng 1 Kota Pasuruan', 'Agus Mukti Wibowo, M.Pd', '', 'Galih Puji Mulyoto M.Pd', 'admin-pgmi', 1, '2021-05-03 12:20:23', '127/Un.03.1/TL.00.1/05/2021'),
	(128, '2021-05-03 10:57:22', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140011', 'Rohmawati Zulkarnain', '089698943750', 'rahmawatizulkarnain13@gmail.com', 'Skripsi', 'Validasi desain media Smart Book Materi Adaptasi Makhluk Hidup', 'Pengembangan Smart Book Materi Adaptasi Makhluk Hidup untuk Meningkatkan Kemampuan Berpikir Kritis Siswa Kelas VI UPT SDN Trajeng 1 Kota Pasuruan', 'Agus Mukti Wibowo, M.Pd', '', 'Galih Puji Mulyoto M.Pd', 'admin-pgmi', 1, '2021-05-03 12:20:51', '128/Un.03.1/TL.00.1/05/2021'),
	(129, '2021-05-03 10:57:29', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140011', 'Rohmawati Zulkarnain', '089698943750', 'rahmawatizulkarnain13@gmail.com', 'Skripsi', 'Validasi desain media Smart Book Materi Adaptasi Makhluk Hidup', 'Pengembangan Smart Book Materi Adaptasi Makhluk Hidup untuk Meningkatkan Kemampuan Berpikir Kritis Siswa Kelas VI UPT SDN Trajeng 1 Kota Pasuruan', 'Agus Mukti Wibowo, M.Pd', '', 'Galih Puji Mulyoto M.Pd', 'admin-pgmi', 1, '2021-05-03 12:21:48', '129/Un.03.1/TL.00.1/05/2021'),
	(130, '2021-05-03 10:57:32', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140011', 'Rohmawati Zulkarnain', '089698943750', 'rahmawatizulkarnain13@gmail.com', 'Skripsi', 'Validasi desain media Smart Book Materi Adaptasi Makhluk Hidup', 'Pengembangan Smart Book Materi Adaptasi Makhluk Hidup untuk Meningkatkan Kemampuan Berpikir Kritis Siswa Kelas VI UPT SDN Trajeng 1 Kota Pasuruan', 'Agus Mukti Wibowo, M.Pd', '', 'Galih Puji Mulyoto M.Pd', 'admin-pgmi', 1, '2021-05-03 12:22:10', '130/Un.03.1/TL.00.1/05/2021'),
	(131, '2021-05-03 12:02:14', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140060', 'Lailatul Hidayah Ayu Putri', '085748833038', 'lailaayu08@gmail.com', 'Skripsi', 'Validasi Instrumen Soal Tes', 'Pengaruh Motivasi Belajar Terhadap Kemampuan Berpikir Kreatif Siswa Pada Masa Pandemi Covid-19 Di MI Miftahul Huda Jambu Kab. Kediri', 'Ahmad Abthoki, M.Pd', '', 'Warsito, S.Pd', 'admin-pgmi', 1, '2021-05-03 12:22:34', '131/Un.03.1/TL.00.1/05/2021'),
	(132, '2021-05-03 12:02:49', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140060', 'Lailatul Hidayah Ayu Putri', '085748833038', 'lailaayu08@gmail.com', 'Skripsi', 'Validasi Instrumen Soal Tes', 'Pengaruh Motivasi Belajar Terhadap Kemampuan Berpikir Kreatif Siswa Pada Masa Pandemi Covid-19 Di MI Miftahul Huda Jambu Kab. Kediri', 'Ahmad Abthoki, M.Pd', '', 'Warsito, S.Pd', 'admin-pgmi', 1, '2021-05-03 12:23:28', '132/Un.03.1/TL.00.1/05/2021'),
	(133, '2021-05-03 13:52:32', 'Tadris Bahasa Inggris', 'S1', '17180036', 'TSANIA FITRA MAULIDIA', '085855356356', 'tsaniafitramaulidia99@gmail.com', 'Skripsi', 'Validasi Instrumen Penelitian ', 'The Effectiveness of Instagram to Improve Students\' Writing Recount Text Skills in EFL Classroom', 'Dr. H. Langgeng Budianto, M.Pd.', '', 'Dr. Shirly Rizky Kusumaningrum, M.Pd.', 'Admin-tbi', 1, '2021-05-04 08:39:25', '133/Un.03.1/TL.00.1/05/2021'),
	(134, '2021-05-04 09:27:35', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '16140013', 'Muhamad Iqbal', '085860864449', 'Nim16140013@gmail.com', 'Skripsi', 'Validasi Ahli Desain', 'Pengembangan Media Roda Balap Matematika Berbasis Multimedia Materi Bangun Datar di Kelas IV Sekolah Dasar Islam Sutojayan Kecamatan Pakisaji Kabupaten Malang', 'Dr. Abdussakir, M. Pd', '', 'Ahmad Makki Hasan, M. Pd', 'admin-pgmi', 1, '2021-05-04 09:53:42', '134/Un.03.1/TL.00.1/05/2021'),
	(135, '2021-05-04 09:28:43', 'Magister Pendidikan Matematika', 'S2', '18811010', 'Siti Badriyahtul Fadilah', '081359003228', 'siti.badriyah.sb88@gmail.com', 'Tesis', 'Validasi Instrumen Tesis', 'Profil Kemampuan Pemecahan Masalah Siswa pada Materi Peluang Ditinjau dari Level Berpikir Probabilistik', 'Dr. Sri Harini, M.Si', 'Prof. Dr. H. Turmudi, M.Si., Ph.D', 'Dr. Marhayati, M.PMat', 'admin-fakultas', 1, '2021-05-07 08:15:38', '135/Un.03.1/TL.00.1/05/2021'),
	(136, '2021-05-04 09:30:29', 'Magister Pendidikan Matematika', 'S2', '18811010', 'Siti Badriyahtul Fadilah', '081359003228', 'siti.badriyah.sb88@gmail.com', 'Tesis', 'Validasi Instrumen Tesis', 'Profil Kemampuan Pemecahan Masalah Siswa pada Materi Peluang Ditinjau dari Level Berpikir Probabilistik', 'Dr. Sri Harini, M.Si', 'Prof. Dr. H. Turmudi, M.Si., Ph.D', 'Dr. H. Imam Sujarwo, M.Pd', 'admin-fakultas', 1, '2021-05-07 08:16:05', '136/Un.03.1/TL.00.1/05/2021'),
	(137, '2021-05-04 09:32:51', 'Magister Pendidikan Matematika', 'S2', '18811010', 'Siti Badriyahtul Fadilah', '081359003228', 'siti.badriyah.sb88@gmail.com', 'Tesis', 'Validasi Instrumen Tesis', 'Profil Kemampuan Pemecahan Masalah Siswa pada Materi Peluang Ditinjau dari Level Berpikir Probabilistik', 'Dr. Sri Harini, M.Si', 'Prof. Dr. H. Turmudi, M.Si., Ph.D', 'Dr. Imam Rofiki, M.Pd', 'admin-fakultas', 1, '2021-05-07 08:16:17', '137/Un.03.1/TL.00.1/05/2021'),
	(138, '2021-05-04 11:07:46', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140011', 'Rohmawati Zulkarnain', '089698943750', 'rahmawatizulkarnain13@gmail.com', 'Skripsi', 'Validasi praktisi pembelajaran', 'Pengembangan Smart Book Materi Adaptasi Makhluk Hidup untuk Meningkatkan Kemampuan Berpikir Kritis Siswa Kelas VI UPT SDN Trajeng 1 Kota Pasuruan', 'Agus Mukti Wibowo, M.Pd', '', 'Dita Permata Sari, S.Pd', 'admin-pgmi', 1, '2021-05-04 11:09:27', '138/Un.03.1/TL.00.1/05/2021'),
	(139, '2021-05-04 19:59:00', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130080', 'Nur Fadila', '085655989749', 'fadilanur099@gmail.com', 'Skripsi', 'Instrumen Penelitian Skripsi', 'Upaya Guru Dalam Meningatkan Prestasi Belajar Ilmu Pengetahuan Sosial Pada Masa Pandemi Covid-19 Di MTs YPI Al Hidayah Plemahan', 'Saiful Amin, M.Pd', '', 'Dr.H.Ali Nasith, M.Si.,M.Pd.I', 'admin-pips', 1, '2021-05-07 08:32:40', '139/Un.03.1/TL.00.1/05/2021'),
	(140, '2021-05-05 14:42:05', 'Magister Pendidikan Matematika', 'S2', '18811002', 'Nur Wiji Sholikin', '085804577643', 'nur.wiji.s.002@gmail.com', 'Tesis', 'Ahli Pembelajaran', 'Pengembangan Modul Pembelajaran Sistem Persamaan Linear Tiga Variabel Terintegrasi Nilai-Nilai Keislaman untuk Meningkatkan Literasi Matematis dan Karakter Religius Siswa Madrasah Aliyah Kelas X', 'Dr. H. Imam Sujarwo, M.Pd', 'Dr. Abdussakir, M.Pd', 'Dr. Anies Fuady, M.Pd', 'admin-fakultas', 1, '2021-05-07 08:16:29', '140/Un.03.1/TL.00.1/05/2021'),
	(141, '2021-05-05 14:45:10', 'Magister Pendidikan Matematika', 'S2', '18811002', 'Nur Wiji Sholikin', '085804577643', 'nur.wiji.s.002@gmail.com', 'Tesis', 'Ahli Bahasa', 'Pengembangan Modul Pembelajaran Sistem Persamaan Linear Tiga Variabel Terintegrasi Nilai-Nilai Keislaman untuk Meningkatkan Literasi Matematis dan Karakter Religius Siswa Madrasah Aliyah Kelas X', 'Dr. H. Imam Sujarwo, M.Pd', 'Dr. Abdussakir, M.Pd', 'Dr. Ari Ambarwati, SS, M.Pd', 'admin-fakultas', 1, '2021-05-07 08:16:40', '141/Un.03.1/TL.00.1/05/2021'),
	(142, '2021-05-05 19:36:25', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140122', 'Emma Sospa Devita Sari', '085875127205', 'emmasospads29@gmail.com', 'Skripsi', 'Validasi angket kinerja guru dalam pelaksanaan pembelajaran', 'Pengaruh Kinerja Guru dalam Pelaksanaan Pembelajaran Terhadap Hasil Belajar Seni Budaya dan Prakarya Siswa Kelas III A MIN 1 Donomulyo Malang', 'Dr. M. Zubad Nurul Yaqin, M.Pd', '', 'Waluyo Satrio Adji, M.Pd.I', 'Admin-PGMI', 1, '2021-05-06 06:40:45', '142/Un.03.1/TL.00.1/05/2021'),
	(143, '2021-05-05 19:41:31', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140122', 'Emma Sospa Devita Sari', '085875127205', 'emmasospads29@gmail.com', 'Skripsi', 'Validasi angket kinerja guru dalam pelaksanaan pembelajaran', 'Pengaruh Kinerja Guru dalam Pelaksanaan Pembelajaran Terhadap Hasil Belajar Seni Budaya dan Prakarya Siswa Kelas III A MIN 1 Donomulyo Malang', 'Dr. M. Zubad Nurul Yaqin, M.Pd', '', 'Dian Eka Aprilia Fitria Ningrum, M.Pd', 'Admin-PGMI', 1, '2021-05-06 06:40:59', '143/Un.03.1/TL.00.1/05/2021'),
	(144, '2021-05-06 19:31:19', 'Magister Pendidikan Matematika', 'S2', '18811002', 'Nur Wiji Sholikin', '085804577643', 'nur.wiji.s.002@gmail.com', 'Tesis', 'Ahli Keislaman', 'Pengembangan Modul Pembelajaran Sistem Persamaan Linear Tiga Variabel Terintegrasi Nilai-Nilai Keislaman untuk Meningkatkan Literasi Matematis dan Karakter Religius Siswa Madrasah Aliyah Kelas X', 'Dr. H. Imam Sujarwo, M.Pd', 'Dr. Abdussakir, M.Pd', '	Dr. H. ZEID B. SMEER,Lc, M.A', 'admin-fakultas', 1, '2021-05-07 08:16:51', '144/Un.03.1/TL.00.1/05/2021'),
	(145, '2021-05-06 19:33:06', 'Magister Pendidikan Matematika', 'S2', '18811002', 'Nur Wiji Sholikin', '085804577643', 'nur.wiji.s.002@gmail.com', 'Tesis', 'Ahli Materi', 'Pengembangan Modul Pembelajaran Sistem Persamaan Linear Tiga Variabel Terintegrasi Nilai-Nilai Keislaman untuk Meningkatkan Literasi Matematis dan Karakter Religius Siswa Madrasah Aliyah Kelas X', 'Dr. H. Imam Sujarwo, M.Pd', 'Dr. Abdussakir, M.Pd', 'Dr. MARHAYATI, M.PMat	', 'admin-fakultas', 1, '2021-05-07 08:17:03', '145/Un.03.1/TL.00.1/05/2021'),
	(146, '2021-05-07 07:18:35', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130112', 'Selly Kusumaharani', '085717650689', 'kusumaharanis@gmail.com', 'Skripsi', 'Penelitian Skripsi (angket/kuisioner) ', 'Pengaruh keterampilan guru dan lingkungan keluarga terhadap motivasi belajar siswa smp pada mata pelajarab ips di masa pandemi covid 19', 'Saiful Amin M.Pd ', '', 'Hendri Prastiyono, Dip.Ed., M.Pd.', 'admin-pips', 1, '2021-05-07 08:33:09', '146/Un.03.1/TL.00.1/05/2021'),
	(147, '2021-05-07 09:06:35', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '14130058', 'MOH HABIBUL MUBIN', '082125424122', 'habibulmubin@gmail.com', 'Skripsi', 'Tugas Akhir Kuliah', 'PEMANFAATAN GAWAI (SMARTPHONE) SEBAGAI MEDIA PEMBELAJARAN OLEH MAHASISWA PENDIDIKAN ILMU PENGETAHUAN SOSIAL UNIVERSITAS ISLAM NEGERI MAULANA MALIK IBRAHIM MALANG', 'Prof. Dr. H. Wahid Murni, M.Pd, Ak', '', 'Saiful Amin, M. Pd', 'admin-pips', 1, '2021-05-10 10:51:59', '147/Un.03.1/TL.00.1/05/2021'),
	(148, '2021-05-07 12:02:26', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130048', 'Ulfaria', '085718548074', 'ulfaria1998@gmail.com', 'Skripsi', 'Dosen ahli validasi media ', 'Pengembngan Aplikasi Kahoot Sebagai Alat Evaluasi Pembelajaran IPS Kelas VII SMP Muhammadiyah 7 Tajinan', 'Dr. Alfiana Yuli Efiyanti, MA', '', 'Saiful Amin,  M.Pd', 'admin-pips', 1, '2021-05-10 10:52:53', '148/Un.03.1/TL.00.1/05/2021'),
	(149, '2021-05-07 12:13:38', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130048', 'Ulfaria', '085718548074', 'ulfaria1998@gmail.com', 'Skripsi', 'Dosen ahli validasi materi', 'Pengembngan Aplikasi Kahoot Sebagai Alat Evaluasi Pembelajaran IPS Kelas VII SMP Muhammadiyah 7 Tajinan   ', 'Dr. Alfiana Yuli Efiyanti, MA', '', 'Dr. H. Muhammad In\'am Esha, M.Ag ', 'admin-pips', 1, '2021-05-10 10:52:32', '149/Un.03.1/TL.00.1/05/2021'),
	(150, '2021-05-08 06:10:09', 'Magister Pendidikan Matematika', 'S2', '18811001', 'Liny Mardhiyatirrahmah', '081345498860', 'leejy.liny@gmail.com', 'Tesis', 'Instrumen Soal', 'Defragmentasi Lubang Konstruksi Siswa Sekolah Menengah Pertama dalam Menyelesaikan Masalah Geometri Menggunakan Scaffolding Building Blocks', 'Prof. Dr. H. Turmudi, M.Si, P.hD', 'Dr. Abdussakir, M.Pd', 'Dr.  Marhayati, M.Pmat', 'admin-fakultas', 1, '2021-05-11 10:04:56', '150/Un.03.1/TL.00.1/05/2021'),
	(151, '2021-05-08 06:12:35', 'Magister Pendidikan Matematika', 'S2', '18811001', 'Liny Mardhiyatirrahmah', '081345498860', 'leejy.liny@gmail.com', 'Tesis', 'Instrumen Soal', 'Defragmentasi Lubang Konstruksi Siswa Sekolah Menengah Pertama dalam Menyelesaikan Masalah Geometri Menggunakan Scaffolding Building Blocks', 'Prof. Dr. H. Turmudi, M.Si, P.hD', 'Dr. Abdussakir, M.Pd', 'Dr. Imam Rofiki, M.Pd', 'admin-fakultas', 1, '2021-05-11 10:05:16', '151/Un.03.1/TL.00.1/05/2021'),
	(152, '2021-05-08 10:11:28', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130106', 'Septiani Aisyah Ayu Paramita', '087727359732', 'ayusep27@gmail.com', 'Skripsi', 'Uji Instrumen Skripsi', 'Pengaruh Pembelajaran Online (E-Learning) Terhadap Pola Asuh Orang Tua Dan Motivasi Belajar Mahasiswa Pendidikan Ilmu Pengetahuan Sosial Universitas Islam Negeri Maulana Malik Ibrahim Malang Saat Pand', 'Saiful Amin, M.Pd', '', 'Dwi Sulistiani, SE., MSA., Ak', 'admin-pips', 1, '2021-05-10 10:53:05', '152/Un.03.1/TL.00.1/05/2021'),
	(153, '2021-05-09 08:49:41', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130167', 'NURINDA PUTRI LESTARI', '082195109516', 'indahnurindaputri@gmail.com', 'Skripsi', 'Uji Instrumen Skripsi', 'Pengaruh Pola Komunikasi dan Motivasi Belajar Mahasiswa dengan Dosen Pembimbing Akademik Terhadap Prestasi Akademik Mahasiswa Pendidikan Ilmu Pengetahuan Sosial di UIN Malang ', 'Saiful Amin, M.Pd', '', 'Dr. H. Ali Nasith, M.Si.,M.Pd.I', 'admin-pips', 1, '2021-05-10 10:53:23', '153/Un.03.1/TL.00.1/05/2021'),
	(154, '2021-05-10 11:35:15', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130106', 'Septiani Aisyah Ayu Paramita', '087727359732', 'ayusep27@gmail.com', 'Skripsi', 'Uji Instrumen Skripsi', 'Pengaruh Pembelajaran Online (E-Learning) Terhadap Pola Asuh Orang Tua dan Motivasi Belajar Mahasiswa Pendidikan IPS Universitas Islam Negeri Maulana Malik Ibrahim Malang Saat Pandemi Covid 19', 'Saiful Amin, M.Pd', '', 'Dwi Sulistiani, SE., MSA., Ak', 'admin-pips', 1, '2021-05-11 09:37:04', '154/Un.03.1/TL.00.1/05/2021'),
	(155, '2021-05-24 09:24:58', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140077', 'RESI FATIHATUR ROHMAH', '085733632940', 'resifaticha@gmail.com', 'Skripsi', 'Validasi Ahli Pembelajaran', 'PENGEMBANGAN MEDIA PEMBELAJARAN INTERAKTIF Ã¢â‚¬Å“DORESIÃ¢â‚¬Â MATERI SIMETRI DALAM PEMBELAJARAN MATEMATIKA SISWA KELAS III DI MI ISLAMIYAH KWARINGAN JOMBANG', 'Moh Zuhdy Hamzah, SS, M.Pd.', '', 'Zainatur Rosyidah, S.Pd', 'Admin-PGMI', 1, '2021-05-24 15:04:34', '155/Un.03.1/TL.00.1/05/2021'),
	(156, '2021-05-24 09:25:59', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140077', 'RESI FATIHATUR ROHMAH', '085733632940', 'resifaticha@gmail.com', 'Skripsi', 'Validasi Ahli Desain Media Pembelajaran Interaktif', 'PENGEMBANGAN MEDIA PEMBELAJARAN INTERAKTIF Ã¢â‚¬Å“DORESIÃ¢â‚¬Â MATERI SIMETRI DALAM PEMBELAJARAN MATEMATIKA SISWA KELAS III DI MI ISLAMIYAH KWARINGAN JOMBANG', 'Moh Zuhdy Hamzah, SS, M.Pd.', '', 'Galih Puji Mulyoto, M.Pd', 'Admin-PGMI', 1, '2021-05-24 15:04:44', '156/Un.03.1/TL.00.1/05/2021'),
	(157, '2021-05-24 09:26:47', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140077', 'RESI FATIHATUR ROHMAH', '085733632940', 'resifaticha@gmail.com', 'Skripsi', 'Validasi Ahli Materi Pembelajaran Matematika', 'PENGEMBANGAN MEDIA PEMBELAJARAN INTERAKTIF Ã¢â‚¬Å“DORESIÃ¢â‚¬Â MATERI SIMETRI DALAM PEMBELAJARAN MATEMATIKA SISWA KELAS III DI MI ISLAMIYAH KWARINGAN JOMBANG', 'Moh Zuhdy Hamzah, SS, M.Pd.', '', 'Ria Norfika Yuliandari, M.Pd.', 'Admin-PGMI', 1, '2021-05-24 15:05:09', '157/Un.03.1/TL.00.1/05/2021'),
	(158, '2021-05-24 09:48:50', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160016', 'Aviatur Dewi Kamilah', '081216561232', 'aviaturdewikamilah08@gmail.com', 'Skripsi', 'Ahli Materi', 'PENGEMBANGAN ALAT PERMAINAN EDUKATIF PETAK  PINTAR UNTUK MENINGKATKAN KEMAMPUAN  BERHITUNG PERMULAAN PADA SISWA KELOMPOK B  TK MUSLIMAT NU 11 GADANG MALANG TAHUN 2020/2021', 'Nurlaeli Fitriah, M.Pd', '', 'Dessy Putri Wahyuningtyas, M.Pd ', 'admin-piaud', 1, '2021-05-24 12:54:08', '158/Un.03.1/TL.00.1/05/2021'),
	(159, '2021-05-26 09:21:45', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130116', 'Muhammad Ifan Ady Winata', '085731747357', 'ifanady18@gmail.com', 'Skripsi', 'Validasi Ahli Media', 'pengembangan Modul Pembelajaran Berbasis Website pada Mata Pelajaran IPS kelas VIII MTs Muhammadiyah 07 Takerharjo', 'Dr. H. Abdul Bashith, M.Si', '', 'Dr. H. Abdul Bashith, M.Si', 'admin-pips', 1, '2021-05-31 10:29:22', '159/Un.03.1/TL.00.1/05/2021'),
	(160, '2021-05-26 09:26:58', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130116', 'Muhammad Ifan Ady Winata', '085731747357', 'ifanady18@gmail.com', 'Skripsi', 'Validasi Ahli Materi', 'Pengembangan Modul Pembelajaran Berbasis Website pada Mata Pelajaran IPS kelas VIII MTs Muhammadiyah 07 Takerharjo', 'Dr. H. Abdul Bashith, M.Si', '', 'Yhadi Firdiansyah, M.Pd', 'admin-pips', 1, '2021-05-31 10:30:13', '160/Un.03.1/TL.00.1/05/2021'),
	(161, '2021-05-26 09:28:11', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130116', 'Muhammad Ifan Ady Winata', '085731747357', 'ifanady18@gmail.com', 'Skripsi', 'Validasi Guru IPS', 'Pengembangan Modul Pembelajaran Berbasis Website pada Mata Pelajaran IPS kelas VIII MTs Muhammadiyah 07 Takerharjo', 'Dr. H. Abdul Bashith, M.Si', '', 'M. Khozin, S.Ag, S.Pd', 'admin-pips', 1, '2021-05-31 10:29:55', '161/Un.03.1/TL.00.1/05/2021'),
	(162, '2021-05-27 13:09:03', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160021', 'Nur Rohmatus Samawiyah', '082215224037', 'nrohmatus2@gmail.com', 'Skripsi', 'Permohonan Menjadi Validator Media', 'Pengembangan Permainan Jejak Kaki Untuk Meningkatkan Kecerdasan Kinestetik Peserta Didik Kelompok B di RA Tarbiyatus Shibyan Kabupaten Pasuruan', 'Bintoro Widodo, M.Kes', '', 'Rikza Azharona Susanti, M.Pd', 'admin-piaud', 1, '2021-05-28 08:53:14', '162/Un.03.1/TL.00.1/05/2021'),
	(163, '2021-05-31 09:51:10', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130097', 'GUSTI ARUM KINASIH', '085645964161', 'gustiarum8@gmail.com', 'Skripsi', 'Penelitian Skripsi (angket/kuisioner)', 'PENGARUH POLA ASUH ORANG TUA DAN MOTIVASI BELAJAR TERHADAP PRESTASI BELAJAR MAHASISWA P.IPS UIN MAULANA MALIK IBRAHIM MALANG', 'SAIFUL AMIN, M.Pd', '', 'Hendri Prastiyono, Dip.Ed., M.Pd.', 'admin-pips', 1, '2021-05-31 10:29:36', '163/Un.03.1/TL.00.1/05/2021'),
	(164, '2021-05-31 10:27:43', 'Tadris Matematika', 'S1', '17190004', 'Lilin Rofiqotul Ilmi', '081334933862', '17190004@student.uin-malang.ac.id', 'Skripsi', 'Validasi Soal Tes Pemecahan Masalah, Pedoman Wawancara, Angket respon profile', 'Level penalaran aljabar siswa kelas IX dalam memecahkan masalah model PISA ditinjau dari Adversity Quotient', 'Dr. Abdussakir M.Pd', '', 'Dr. Wahyu Henky Irawan M.Pd, Arini Maryan Fa\'ani M.Pd', 'admin-tmat', 1, '2021-05-31 13:33:59', '164/Un.03.1/TL.00.1/05/2021'),
	(165, '2021-05-31 10:27:50', 'Tadris Matematika', 'S1', '17190004', 'Lilin Rofiqotul Ilmi', '081334933862', '17190004@student.uin-malang.ac.id', 'Skripsi', 'Validasi Soal Tes Pemecahan Masalah, Pedoman Wawancara, Angket respon profile', 'Level penalaran aljabar siswa kelas IX dalam memecahkan masalah model PISA ditinjau dari Adversity Quotient', 'Dr. Abdussakir M.Pd', '', 'Dr. Wahyu Henky Irawan M.Pd, Arini Maryan Fa\'ani M.Pd', 'admin-tmat', 2, '2021-05-31 13:34:42', 'Pengajuan surat dobel, dengan perihal yang sama\r\n'),
	(166, '2021-05-31 11:18:03', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130097', 'GUSTI ARUM KINASIH', '085645964161', 'gustiarum8@gmail.com', 'Skripsi', 'Penelitian Skripsi (angket/kuesioner)', 'PENGARUH POLA ASUH ORANG TUA DAN MOTIVASI BELAJAR TERHADAP PRESTASI BELAJAR MAHASISWA P.IPS UIN MAULANA MALIK IBRAHIM MALANG', 'Saiful Amin, M.Pd', '', 'Hendri Prastiyono, Dip.Ed., M.Pd.', 'admin-pips', 1, '2021-06-02 15:17:12', '166/Un.03.1/TL.00.1/06/2021'),
	(167, '2021-05-31 13:29:12', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140076', 'Ainun Nuzula Ar-Rahmah', '085730225553', 'ainunzula@gmail.com', 'Skripsi', 'Ahli Pembelajaran', 'Pengembangan Evaluasi Pembelajaran Berbasis Game Edukatif Menggunakan Platform Wordwall.net Pada Siswa Kelas V SDIT Al Mishbah Sumobito Jombang', 'Dr. Rini Nafsiati Astuti', '', 'Yunita Sari Indah Cahyani, S.T', 'admin-pgmi', 1, '2021-05-31 13:31:07', '167/Un.03.1/TL.00.1/05/2021'),
	(168, '2021-05-31 13:32:11', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140076', 'Ainun Nuzula Ar-Rahmah', '085730225553', 'ainunzula@gmail.com', 'Skripsi', 'Ahli Evaluasi Pembelajaran', 'Pengembangan Evaluasi Pembelajaran Berbasis Game Edukatif Menggunakan Platform Wordwall.net Pada Siswa Kelas V SDIT Al Mishbah Sumobito Jombang', 'Dr. Rini Nafsiati Astuti', '', 'Kusuma Wardani, M.Pd', 'admin-pgmi', 1, '2021-05-31 13:45:02', '168/Un.03.1/TL.00.1/05/2021'),
	(169, '2021-05-31 13:34:59', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140076', 'Ainun Nuzula Ar-Rahmah', '085730225553', 'ainunzula@gmail.com', 'Skripsi', 'Ahli Media Pembelajaran', 'Pengembangan Evaluasi Pembelajaran Berbasis Game Edukatif Menggunakan Platform Wordwall.net Pada Siswa Kelas V SDIT Al Mishbah Sumobito Jombang', 'Dr. Rini Nafsiati Astuti, M.Pd', '', 'Aryungga, M.Pd', 'admin-pgmi', 1, '2021-05-31 13:45:25', '169/Un.03.1/TL.00.1/05/2021'),
	(170, '2021-06-01 07:57:48', 'Tadris Matematika', 'S1', '17190005', 'Ayu Syahrani', '081221483542', 'ayusyahra145@gmail.com', 'Skripsi', 'Validasi Pedoman Wawancara', 'Eksplorasi Kekongruenan dan Kesebangunan Pada Ornamen Rumah Adat Karo', 'Dr.Marhayati, M. Pmat', '', 'Dr.Imam Rofiki, M.Pd.', 'admin-tmat', 1, '2021-06-03 11:04:01', '170/Un.03.1/TL.00.1/06/2021'),
	(171, '2021-06-01 15:27:01', 'Magister Pendidikan Matematika', 'S2', '18811002', 'Nur Wiji Sholikin', '085804577643', 'nur.wiji.s.002@gmail.com', 'Tesis', 'Praktisi', 'Pengembangan Modul Pembelajaran Sistem Persamaan Linear Tiga Variabel Terintegrasi Nilai-Nilai Keislaman untuk Meningkatkan Literasi Matematis dan Karakter Religius Siswa Madrasah Aliyah Kelas X', 'Dr. H. Imam Sujarwo, M.Pd', 'Dr. Abdussakir, M.Pd', 'Drs. Nur Hidayatullah', 'admin-fakultas', 1, '2021-06-02 10:52:21', '171/Un.03.1/TL.00.1/06/2021'),
	(172, '2021-06-02 15:26:57', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Angket Self Regulated Learning', 'Berpikir Kreatif Matematis Siswa MTsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Nuril Huda, M.Pd', 'admin-tmat', 1, '2021-06-03 11:04:15', '172/Un.03.1/TL.00.1/06/2021'),
	(173, '2021-06-02 15:42:35', 'Magister Pendidikan Matematika', 'S2', '18811002', 'Nur Wiji Sholikin', '085804577643', 'nur.wiji.s.002@gmail.com', 'Tesis', 'Praktisi', 'Pengembangan Modul Pembelajaran Sistem Persamaan Linear Tiga Variabel Terintegrasi Nilai-Nilai Keislaman untuk Meningkatkan Literasi Matematis dan Karakter Religius Siswa Madrasah Aliyah Kelas X', 'Dr. H. Imam Sujarwo, M.Pd', 'Dr. Abdussakir, M.Pd', 'Drs. Farid Wadjdi Sjaifullah, M.Pd', 'admin-fakultas', 1, '2021-06-03 08:34:10', '173/Un.03.1/TL.00.1/06/2021'),
	(174, '2021-06-02 15:52:39', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Soal dan Pedoman Wawancara Berpikir Kreatif', 'Berpikir Kreatif Matematis Siswa MTsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Arini Maryan Fa\'ani, M.Pd', 'admin-tmat', 1, '2021-06-03 11:04:29', '174/Un.03.1/TL.00.1/06/2021'),
	(175, '2021-06-03 11:57:21', 'Magister Pendidikan Matematika', 'S2', '18811001', 'Liny Mardhiyatirrahmah', '081345498860', 'leejy.liny@gmail.com', 'Tesis', 'Instrumen Soal', 'Defragmentasi Lubang Konstruksi Siswa Sekolah Menengah Pertama dalam Menyelesaikan Masalah Geometri Menggunakan Scaffolding Building Blocks', 'Prof. Dr. H. Turmudi, M.Si, P.hD', 'Dr. Abdussakir, M.Pd', 'Dr. Muhamad Sabirin, M.Si', 'admin-fakultas', 1, '2021-06-04 11:29:21', '175/Un.03.1/TL.00.1/06/2021'),
	(176, '2021-06-03 12:40:47', 'Tadris Matematika', 'S1', '17190014', 'RIAS CHABIBAH', '085641736032', '17190014@student.uin-malang.ac.id', 'Skripsi', 'Pedoman soal, think aloud dan wawancara', 'TINGKAT BERPIKIR KREATIF SISWA KELAS VII MTsN 1 KOTA BLITAR DALAM MENYELESAIKAN SOAL OPEN-ENDED MENGENAI BANGUN DATAR DITINJAU DARI JENIS KELAMIN DAN KEMAMPUAN AKADEMIK', 'Dr. Abdussakir, M.Pd', '', 'Ibrahim Sani Ali Manggala, M. Pd', 'admin-tmat', 1, '2021-06-04 13:58:59', '176/Un.03.1/TL.00.1/06/2021'),
	(177, '2021-06-03 12:42:27', 'Tadris Matematika', 'S1', '17190014', 'RIAS CHABIBAH', '085641736032', '17190014@student.uin-malang.ac.id', 'Skripsi', 'Pedoman soal, think aloud dan wawancara', 'TINGKAT BERPIKIR KREATIF SISWA KELAS VII MTsN 1 KOTA BLITAR DALAM MENYELESAIKAN SOAL OPEN-ENDED MENGENAI BANGUN DATAR DITINJAU DARI JENIS KELAMIN DAN KEMAMPUAN AKADEMIK', 'Dr. Abdussakir, M.Pd', '', 'Arini Maryan Fa\'ani, M. Pd', 'admin-tmat', 1, '2021-06-04 13:59:09', '177/Un.03.1/TL.00.1/06/2021'),
	(178, '2021-06-03 19:23:36', 'Tadris Matematika', 'S1', '17190005', 'Ayu Syahrani', '081221483542', 'ayusyahra145@gmail.com', 'Skripsi', 'Pedoman Wawancara', 'Eksplorasi Kekongruenan dan Kesebangunan Pada Ornamen Rumah Adat Karo', 'Dr.Marhayati, M. Pmat', '', 'Dr. Imam Rofiki,M.Pd', 'admin-tmat', 1, '2021-06-04 13:59:27', '178/Un.03.1/TL.00.1/06/2021'),
	(179, '2021-06-07 08:26:29', 'Pendidikan Ilmu Pengetahuan Sosial', 'S1', '17130167', 'NURINDA PUTRI LESTARI', '082195109516', 'indahnurindaputri@gmail.com', 'Skripsi', 'Uji Instrumen Penelitian ', 'Pengaruh Pola Komunikasi dan Motivasi Belajar Mahasiswa dengan Dosen Pembimbing Akademik Terhadap Prestasi Akademik Mahasiswa Pendidikan Ilmu Pengetahuan Sosial di UIN Malang', 'Saiful Amin,M.Pd', '', 'Hendri Prastiyono, Dip.Ed, M.Pd.', 'admin-pips', 1, '2021-06-08 10:20:43', '179/Un.03.1/TL.00.1/06/2021'),
	(180, '2021-06-07 09:16:53', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160021', 'Nur Rohmatus Samawiyah', '082215224037', 'nrohmatus2@gmail.com', 'Skripsi', 'Ahli Media', 'Pengembangan Permainan Jejak Kaki Untuk Meningkatkan Kecerdasan Kinestetik Peserta Didik Kelompok B di RA Tarbiyatus Shibyan Kabupaten Pasuruan', 'Bintoro Widodo, M.Kes', '', 'Rikza Azharona Susanti, M.Pd', 'admin-piaud', 1, '2021-06-14 10:37:56', '180/Un.03.1/TL.00.1/06/2021'),
	(181, '2021-06-07 09:29:27', 'Pendidikan Islam Anak Usia Dini', 'S1', '17160021', 'Nur Rohmatus Samawiyah', '082215224037', 'nrohmatus2@gmail.com', 'Skripsi', 'Ahli Materi', 'Pengembangan Permainan Jejak Kaki Untuk Meningkatkan Kecerdasan Kinestetik Peserta Didik Kelompok B di RA Tarbiyatus Shibyan Kabupaten Pasuruan', 'Bintoro Widodo, M.Kes', '', 'Nuril Nuzulia, M.Pd.I', 'admin-piaud', 1, '2021-06-14 10:38:12', '181/Un.03.1/TL.00.1/06/2021'),
	(182, '2021-06-09 15:16:52', 'Magister Pendidikan Agama Islam', 'S2', '19770061', 'Mariya Ulfa', '085788978688', 'mariya.ulfa1992@gmail.com', 'Tesis', 'Uji Validasi Ahli Materi/Isi', 'PENGEMBANGAN MEDIA PEMBELAJARAN E-LEARNING PADA MATA PELAJARAN FIQIH DALAM MENINGKATKAN KEAKTIFAN DAN HASIL BELAJAR SISWA  DI MIN 1 KOTA MALANG', '1.	Dr. H. Moh. Padil, M.Pd.I', '2.	Dr. H.SugengListyoPrabowo, M.Pd.I', 'Umi Salamah, M. Pd. I', 'admin-fakultas', 1, '2021-06-09 15:58:03', '182/Un.03.1/TL.00.1/06/2021'),
	(183, '2021-06-09 15:31:28', 'Magister Pendidikan Agama Islam', 'S2', '19770061', 'Mariya Ulfa', '085788978688', 'mariya.ulfa1992@gmail.com', 'Tesis', 'Uji Validasi Ahli IT/Media', 'PENGEMBANGAN MEDIA PEMBELAJARAN E-LEARNING PADA MATA PELAJARAN FIQIH DALAM MENINGKATKAN KEAKTIFAN DAN HASIL BELAJAR SISWA  DI MIN 1 KOTA MALANG', '1.	Dr. H. Moh. Padil, M.Pd.I', '2.	Dr. H.SugengListyoPrabowo, M.Pd.I', 'Achmad Hamdan, S.Pd., M.Pd.', 'admin-fakultas', 1, '2021-06-09 15:57:40', '183/Un.03.1/TL.00.1/06/2021'),
	(184, '2021-06-10 10:30:26', 'Tadris Matematika', 'S1', '17190003', 'Zulfian Syah', '085271537204', '17190003@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Penelitian', 'Kemampuan Penalaran Spasial Siswa MTs Negeri 1 Kota Malang dalam Menyelesaikan Soal Geometri Ditinjau dari Kemampuan Matematika', 'Dr. Imam Rofiki, M.Pd.', '', 'Nuril Huda, M.Pd.', 'admin-tmat', 1, '2021-06-14 08:39:27', '184/Un.03.1/TL.00.1/06/2021'),
	(185, '2021-06-10 10:32:40', 'Tadris Matematika', 'S1', '17190003', 'Zulfian Syah', '085271537204', '17190003@student.uin-malang.ac.id', 'Skripsi', 'Validasi Instrumen Penelitian', 'Kemampuan Penalaran Spasial Siswa MTs Negeri 1 Kota Malang dalam Menyelesaikan Soal Geometri Ditinjau dari Kemampuan Matematika', 'Dr. Imam Rofiki, M.Pd.', '', 'Ibrahim Sani Ali Manggala, M.Pd.', 'admin-tmat', 1, '2021-06-14 08:39:39', '185/Un.03.1/TL.00.1/06/2021'),
	(186, '2021-06-12 05:18:53', 'Magister Pendidikan Matematika', 'S2', '18811002', 'Nur Wiji Sholikin', '085804577643', 'nur.wiji.s.002@gmail.com', 'Tesis', 'Praktisi', 'Pengembangan Modul Pembelajaran Sistem Persamaan Linear Tiga Variabel Terintegrasi Nilai-Nilai Keislaman untuk Meningkatkan Literasi Matematis dan Karakter Religius Siswa Madrasah Aliyah Kelas X', 'Dr. H. Imam Sujarwo, M.Pd', 'Dr. Abdussakir, M.Pd', 'Dra. Wulaida Zuhriyana', 'admin-fakultas', 1, '2021-06-14 12:19:21', '186/Un.03.1/TL.00.1/06/2021'),
	(187, '2021-06-14 15:09:04', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140090', 'Nopa Afiana Rosida', '085854930041', 'nopaafiana98@gmail.com', 'Skripsi', 'Ahli Materi', 'Pengembangam Media Pembelajaran Berbasis Andoid Pada Materi Sudut Kelas III Sekolah Dasar', 'Dr. Marhayati, M.Pmat', '', 'Dr. Imam Rofiki, M.Pd', 'Admin-PGMI', 1, '2021-06-16 10:50:10', '187/Un.03.1/TL.00.1/06/2021'),
	(188, '2021-06-14 15:11:55', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140090', 'Nopa Afiana Rosida', '085854930041', 'nopaafiana98@gmail.com', 'Skripsi', 'Ahli Media', 'Pengembangam Media Pembelajaran Berbasis Andoid Pada Materi Sudut Kelas III Sekolah Dasar', 'Dr. Marhayati, M.Pmat', '', 'Dimas Femy Sasongko, M.Pd', 'Admin-PGMI', 1, '2021-06-16 10:50:20', '188/Un.03.1/TL.00.1/06/2021'),
	(189, '2021-06-14 15:14:31', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140090', 'Nopa Afiana Rosida', '085854930041', 'nopaafiana98@gmail.com', 'Skripsi', 'Praktisi Pembelajaran', 'Pengembangam Media Pembelajaran Berbasis Andoid Pada Materi Sudut Kelas III Sekolah Dasar', 'Dr. Marhayati, M.Pmat', '', 'Dewi Noria Santoesa, S.Pd', 'Admin-PGMI', 1, '2021-06-16 10:50:31', '189/Un.03.1/TL.00.1/06/2021'),
	(190, '2021-06-15 10:27:10', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'Skripsi', 'Surat Permohonan Validator Ahli Pembelajaran', 'Pengembangan Media Koper Edukasi Materi Pecahan Untuk Meningkatkan Pemahaman Konsep Peserta Didik Kelas III MI Hayatul Islamiyah Pakis Malang', 'Ria Norfika Yuliandari', '', 'Wali Kelas III MI Hayatul Islamiyah ', 'Admin-PGMI', 1, '2021-06-16 10:50:39', '190/Un.03.1/TL.00.1/06/2021'),
	(191, '2021-06-15 10:53:33', 'Tadris Matematika', 'S1', '17190037', 'Mufti Syafri Alfarizqi', '082251806534', '17190037@student.uin-malang.ac.id', 'Skripsi', 'Modul Pembelajaran ', 'MODUL PEMBELAJARAN PADA MATERI SISTEM PERSAMAAN LINEAR DUA VARIABEL BERBASIS PEMECAHAN MASALAH', 'MUHAMMAD ISLAHUL MUKMIN, M.Si., M.Pd.', '', 'Dimas Femy Sasongko, M.Pd.', 'admin-tmat', 1, '2021-06-16 10:54:18', '191/Un.03.1/TL.00.1/06/2021'),
	(192, '2021-06-15 10:59:44', 'Tadris Matematika', 'S1', '17190037', 'Mufti Syafri Alfarizqi', '082251806534', '17190037@student.uin-malang.ac.id', 'Skripsi', 'Ahli Materi Pembelajaran ', 'MODUL PEMBELAJARAN PADA MATERI SISTEM PERSAMAAN LINEAR DUA VARIABEL BERBASIS PEMECAHAN MASALAH', 'MUHAMMAD ISLAHUL MUKMIN, M.Si., M.Pd.', '', 'Dr. Syaifuddin, S.Si., M.Pd. ', 'admin-tmat', 1, '2021-06-16 10:54:40', '192/Un.03.1/TL.00.1/06/2021'),
	(193, '2021-06-15 11:09:15', 'Tadris Matematika', 'S1', '17190009', 'Fitriyah', '082333094002', 'ftriyahfit593@gmail.com', 'Skripsi', 'Instrumen Penelitian (Skripsi) ', 'Analisis Proses Pemecahan Masalah Bangun Datar Siswa MTs Darul Ulum Tlagah', 'Dimas Femy Sasongko M.Pd', '', 'Arini Maryan Fa\'ani M.Pd', 'admin-tmat', 1, '2021-06-16 10:54:56', '193/Un.03.1/TL.00.1/06/2021'),
	(194, '2021-06-15 11:24:39', 'Tadris Matematika', 'S1', '17190009', 'Fitriyah', '082333094002', 'ftriyahfit593@gmail.com', 'Skripsi', 'Instrumen Penelitian Skripsi ', 'Analisis Proses Pemecahan Masalah Bangun Datar Siswa MTs Darul Ulum Tlagah', 'Dimas Femy Sasongko M.Pd', '', 'Ulfa Masamah M.Pd', 'admin-tmat', 1, '2021-06-16 10:55:10', '194/Un.03.1/TL.00.1/06/2021'),
	(195, '2021-06-15 14:23:59', 'Pendidikan Bahasa Arab', 'S1', '17150059', 'BINTI ISRO\'IN', '081390915997', 'bintiisroin13@gmail.com', 'Skripsi', 'Hasil analisis penelitian', 'Ã˜ÂªÃ˜Â­Ã™â€žÃ™Å Ã™â€ž Ã™Æ’Ã˜ÂªÃ˜Â§Ã˜Â¨ Ã˜Â¯Ã˜Â±Ã˜Â³ Ã˜Â§Ã™â€žÃ™â€žÃ˜ÂºÃ˜Â© Ã˜Â§Ã™â€žÃ˜Â¹Ã˜Â±Ã˜Â¨Ã™Å Ã˜Â© Ã˜Â¨Ã˜Â§Ã™â€žÃ™â€¦Ã™â€ Ã™â€¡Ã˜Â¬ Ã˜Â§Ã™â€žÃ˜Â¹Ã˜Â§Ã™â€¦ Ã™Â¢Ã™Â Ã™Â¡Ã™Â£ Ã™â€žÃ˜ÂªÃ™â€žÃ˜Â§Ã™â', 'Dr. Hj. Umi Mahmudah, M.Pd', '', 'Dr. H. Abdul Wahab Rosyidi, M.Pd', 'admin-pba', 0, NULL, NULL),
	(198, '2021-06-16 11:27:52', 'Magister Pendidikan Agama Islam', 'S2', '19770061', 'Mariya Ulfa', '085788978688', 'mariya.ulfa1992@gmail.com', 'Tesis', 'Uji Ahli Pembelajaran/Guru MIN 1 Kota Malang', 'PENGEMBANGAN MEDIA PEMBELAJARAN E-LEARNING PADA MATA PELAJARAN FIQIH DALAM MENINGKATKAN KEAKTIFAN DAN HASIL BELAJAR SISWA  DI MIN 1 KOTA MALANG', 'Dr. H. Moh. Padil, M.Pd.I', 'Dr. H. Sugeng Listyo Prabowo, M.Pd', 'Anik Atus Sa\'diyah, S.Ag, M.PdI', 'admin-fakultas', 1, '2021-06-16 13:44:43', '198/Un.03.1/TL.00.1/06/2021'),
	(199, '2021-06-16 11:56:07', 'Tadris Matematika', 'S1', '17190040', 'Itsna Ma\'rifatul Kamalia', '085856204804', '17190040@student.uin-malang.ac.id', 'Skripsi', 'Instrumen penelitian (Pedoman wawancara)', 'Pemecahan Masalah Matematika Materi Persamaan Linier Dua Variabel (SPLDV) Siswa Kelas VIII MTs Daarus Salam Bantur Ditinjau Dari Disposisi Matematis', 'Dr. Marhayati, M.PMat.', '', 'Dr. Imam Rofiki, M.Pd.', 'admin-tmat', 1, '2021-06-18 08:44:07', '199/Un.03.1/TL.00.1/06/2021'),
	(200, '2021-06-17 07:07:39', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140001', 'Rachma Ainus Salma', '085708121996', 'rachmasal2@gmail.com', 'Skripsi', 'Validasi Ahli Materi', 'Pengembangan Media Interaktif ', 'Nuril Nuzulia, M.Pd.I', '', 'Mujani, M.Pd.', 'admin-pgmi', 1, '2021-06-17 19:31:22', '200/Un.03.1/TL.00.1/06/2021'),
	(201, '2021-06-17 07:10:25', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140001', 'Rachma Ainus Salma', '085708121996', 'rachmasal2@gmail.com', 'Skripsi', 'Validasi Ahli Desain', 'Pengembangan Media Interaktif ', 'Nuril Nuzulia, M.Pd.I', '', 'Vannisa Aviana Melinda, M.Pd', 'admin-pgmi', 1, '2021-06-17 19:31:38', '201/Un.03.1/TL.00.1/06/2021'),
	(202, '2021-06-17 08:18:25', 'Tadris Bahasa Inggris', 'S1', '17180024', 'Siti Nurhalimah', '081238342327', 'ulumut49@gmail.com', 'Skripsi', 'Validasi Instrumen penelitian ', 'The Effect of Using Phonetic Alphabet for Bahasa Indonesia (PABI) on the English Pronunciation for EFL University Students', 'Farid Munfaati, M.Pd', '', 'Dr. Shirly Rizki Kusumaningrum, M.Pd', 'Admin-tbi', 1, '2021-06-21 08:26:16', '202/Un.03.1/TL.00.1/06/2021'),
	(203, '2021-06-18 05:32:54', 'Magister Pendidikan Matematika', 'S2', '18811002', 'Nur Wiji Sholikin', '085804577643', 'nur.wiji.s.002@gmail.com', 'Tesis', 'Lembar Instrumen Penelitian', 'Pengembangan Modul Pembelajaran Sistem Persamaan Linear Tiga Variabel Terintegrasi Nilai-Nilai Keislaman untuk Meningkatkan Literasi Matematis dan Karakter Religius Siswa Madrasah Aliyah Kelas X', 'Dr. H. Imam Sujarwo, M.Pd', 'Dr. Abdussakir, M.Pd', 'Abdul Halim Fathani, M.Pd', 'admin-pasca', 0, NULL, NULL),
	(204, '2021-06-18 08:27:12', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140063', 'Lifiana Zaimatul Ilmi', '0895612444615', 'lifiazaima13@gmail.com', 'Skripsi', 'Ahli Materi', 'Pengembangan Media E-Comic untuk Meningkatkan Kemampuan Literasi pada Siswa Kelas V MIN 4 Jombang', 'Waluyo Satrio Adji, M. Pd. I', '', 'Dr. Rini Nafsiati Astuti, M. Pd', 'admin-pgmi', 1, '2021-06-18 09:16:05', '204/Un.03.1/TL.00.1/06/2021'),
	(205, '2021-06-18 08:35:51', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140063', 'Lifiana Zaimatul Ilmi', '0895612444615', 'lifiazaima13@gmail.com', 'Skripsi', 'Ahli Desain', 'Pengembangan Media E-Comic untuk Meningkatkan Kemampuan Literasi Siswa Kelas V MIN 4 Jombang', 'Waluyo Satrio Adji, M. Pd. I', '', 'Galih Puji Mulyoto, M. Pd', 'admin-pgmi', 1, '2021-06-18 09:16:16', '205/Un.03.1/TL.00.1/06/2021'),
	(206, '2021-06-18 09:04:52', 'Tadris Matematika', 'S1', '17190040', 'Itsna Ma\'rifatul Kamalia', '085856204804', '17190040@student.uin-malang.ac.id', 'Skripsi', 'Instrumen penelitian (soal)', 'Pemecahan Masalah Matematika Materi Sistem Persamaan Linier Dua Variabel (SPLDV) Siswa Kelas VIII MTs Daarus Salam  Bantur Ditinjau dari Disposisi Matematis', 'Dr. Marhayati, M.PMat.', '', 'Dr. Imam Rofiki, M.Pd.', 'admin-tmat', 1, '2021-06-18 10:15:58', '206/Un.03.1/TL.00.1/06/2021'),
	(207, '2021-06-19 09:46:58', 'Magister Pendidikan Agama Islam', 'S2', '19770067', 'AHMAD MUZAMMIL KHOLILY', '085656444666', 'izameljalaly2@gmail.com', 'Tesis', 'Penelitian ', 'Pengembangan Media Pembelajaran Berbasis Levideo Animatoon pada Materi Pergaulan Bebas dalam Meningkatkan Kemampuan Berpikir Kritis Siswa pada Masa Pandemi di SMA Negeri 1 Singosari', 'Prof. Dr. H. Nur Asnawi, M.Ag', 'Dr. H. M. Hadi Masruri, M.Ag', 'Fajar Rohman Hariri, M.Kom', 'admin-pasca', 0, NULL, NULL),
	(208, '2021-06-19 10:11:02', 'Magister Pendidikan Agama Islam', 'S2', '19770067', 'AHMAD MUZAMMIL KHOLILY', '085656444666', 'izameljalaly2@gmail.com', 'Tesis', 'Penelitian ', 'Pengembangan Media Pembelajaran Berbasis Levideo Animatoon pada Materi Pergaulan Bebas dalam Meningkatkan Kemampuan Berpikir Kritis Siswa pada Masa Pandemi di SMA Negeri 1 Singosari', 'Prof. Dr. H. Nur Asnawi, M.Ag', 'Dr. H. M. Hadi Masruri, M.Ag', 'Didik Wahyudi, M.Si', 'admin-pasca', 0, NULL, NULL),
	(209, '2021-06-19 11:32:48', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'Skripsi', 'Permohonan validator Ahli Pembelajaran', 'Pengembangan Media Puzzle Edukasi pada Materi Pecahan Untuk Meningkatkan Pemahaman Konsep Peserta Didik Kelas III MI Hayatul Islamiyah Pakis Malang', 'Ria Norfika Yuliandari', '', 'Wali Kelas III MI Hayatul Islamiyah ', 'admin-pgmi', 1, '2021-06-21 08:35:10', '209/Un.03.1/TL.00.1/06/2021'),
	(210, '2021-06-19 11:34:28', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'Skripsi', 'Permohonan validator Ahli Materi', 'Pengembangan Media Puzzle Edukasi pada Materi Pecahan Untuk Meningkatkan Pemahaman Konsep Peserta Didik Kelas III MI Hayatul Islamiyah Pakis Malang', 'Ria Norfika Yuliandari', '', 'Dr. Marhayati, M. Pmat', 'admin-pgmi', 1, '2021-06-21 08:35:22', '210/Un.03.1/TL.00.1/06/2021'),
	(211, '2021-06-19 11:35:28', 'Pendidikan Guru Madrasah Ibtidaiyah', 'S1', '17140052', 'Luluk Kristia Nur Indahsari ', '089504796195', 'lulukkristia12@gmail.com', 'Skripsi', 'Permohonan Validator Ahli Desain', 'Pengembangan Media Puzzle Edukasi pada Materi Pecahan Untuk Meningkatkan Pemahaman Konsep Peserta Didik Kelas III MI Hayatul Islamiyah Pakis Malang', 'Ria Norfika Yuliandari', '', 'Galih Puji Mulyoto, M. Pd', 'admin-pgmi', 1, '2021-06-21 08:35:34', '211/Un.03.1/TL.00.1/06/2021'),
	(212, '2021-06-21 09:17:50', 'Tadris Matematika', 'S1', '17190015', 'Milka Rizqi Tazkiyani Faisal', '0895367377464', '17190015@student.uin-malang.ac.id', 'Skripsi', 'Soal dan Pedoman Wawancara Berpikir Kreatif Siswa', 'Berpikir Kreatif Matematis Siswa MtsN 1 Kota Malang Ditinjau dari Self Regulated Learning', 'Dr. H. Wahyu Henky Irawan, M.Pd', '', 'Dr. Syaifudin, M.Pd', 'admin-tmat', 0, NULL, NULL);
/*!40000 ALTER TABLE `validasi` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.verifikasi
CREATE TABLE IF NOT EXISTS `verifikasi` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `prodi` varchar(100) DEFAULT NULL,
  `namasurat` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `pejabat` varchar(100) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `verifikator` varchar(100) DEFAULT NULL,
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table pelayananonline.verifikasi: ~6 rows (approximately)
DELETE FROM `verifikasi`;
/*!40000 ALTER TABLE `verifikasi` DISABLE KEYS */;
INSERT INTO `verifikasi` (`no`, `prodi`, `namasurat`, `jabatan`, `pejabat`, `nip`, `verifikator`) VALUES
	(2, 'Tadris Matematika', 'Izin Observasi', 'Dekan', 'Dr. H. Agus Maimun, M.Pd', '19650817 199803 1 003', 'johanericka'),
	(3, 'Tadris Matematika', 'Izin Penelitian', NULL, NULL, NULL, 'johanericka'),
	(5, 'Tadris Matematika', 'Izin PKL', NULL, NULL, NULL, 'johanericka'),
	(6, 'Pendidikan Agama Islam', 'Izin Observasi', 'Dekan', 'Dr. H. Agus Maimun, M.Pd', '19650817 199803 1 003', 'pairun'),
	(7, 'Pendidikan Guru Madrasah Ibtidaiyah', 'Izin Observasi', 'Dekan', 'Dr. H. Agus Maimun, M.Pd', '19650817 199803 1 003', 'bunali'),
	(8, 'Pendidikan Guru Madrasah Ibtidaiyah', 'Izin Penelitian', 'Dekan', 'Dr. H. Agus Maimun, M.Pd', '19650817 199803 1 003', 'bunali');
/*!40000 ALTER TABLE `verifikasi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
