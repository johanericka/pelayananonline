-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.41 - Source distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table pelayananonline.dispensasi
CREATE TABLE IF NOT EXISTS `dispensasi` (
  `nodata` int(11) NOT NULL AUTO_INCREMENT,
  `tglpengajuan` varchar(20) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `kegiatan` varchar(200) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.dispensasi: ~2 rows (approximately)
DELETE FROM `dispensasi`;
/*!40000 ALTER TABLE `dispensasi` DISABLE KEYS */;
INSERT INTO `dispensasi` (`nodata`, `tglpengajuan`, `prodi`, `nim`, `nama`, `nohp`, `email`, `kegiatan`, `namainstansi`, `tglmulai`, `tglselesai`, `alamatinstansi`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`, `statussurat`) VALUES
	(11, '2021-08-28 17:57:42', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.co', 'Praktek Kerja Lapangan (PKL) / Magang', 'Pengasuh Pondok Putri', '2021-08-28', '2021-08-30', 'Jl. Merjosari No. 123 Malang', '197411012003121004', 1, '2021-08-28 17:58:06', '11/FHm/KM.01.2/08/2021', 1),
	(12, '2021-08-28 17:59:51', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.co', 'perkuliahan', 'dosen pengampu perkuliahan', '2021-08-28', '2021-09-04', 'UIN Malang', '197411012003121004', 1, '2021-08-28 18:00:13', '12/FHm/KM.01.2/08/2021', 1);
/*!40000 ALTER TABLE `dispensasi` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.email
CREATE TABLE IF NOT EXISTS `email` (
  `host` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `smtpsecure` varchar(100) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `from` varchar(100) DEFAULT NULL,
  `fromname` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.email: 0 rows
DELETE FROM `email`;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` (`host`, `username`, `password`, `smtpsecure`, `port`, `from`, `fromname`) VALUES
	('tls://smtp.gmail.com', 'fhumaniorauinmalang@gmail.com', 'rahasia.123', 'tls', 587, 'humaniora@uin-malang.ac.id', 'Fakultas Humaniora UIN Malang');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;

-- Dumping structure for table pelayananonline.jenissurat
CREATE TABLE IF NOT EXISTS `jenissurat` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `namasurat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `formatnosurat` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `pejabat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  KEY `Index 1` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.jenissurat: ~5 rows (approximately)
DELETE FROM `jenissurat`;
/*!40000 ALTER TABLE `jenissurat` DISABLE KEYS */;
INSERT INTO `jenissurat` (`no`, `namasurat`, `formatnosurat`, `pejabat`) VALUES
	(1, 'Izin Observasi', '/FHm/TL.00/', 'dekan'),
	(2, 'Izin Penelitian', '/FHm/TL.00/', 'dekan'),
	(13, 'Surat Keterangan', '/FHm/KM.01.3/', 'dekan'),
	(14, 'Surat Rekomendasi', '/FHm/KM.01.3/', 'dekan'),
	(15, 'Dispensasi', '/FHm/KM.01.2/', 'dekan');
/*!40000 ALTER TABLE `jenissurat` ENABLE KEYS */;

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

-- Dumping data for table pelayananonline.observasi: ~1 rows (approximately)
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

-- Dumping data for table pelayananonline.pejabat: ~1 rows (approximately)
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

-- Dumping data for table pelayananonline.penelitian: ~1 rows (approximately)
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
	(20, 'Admin Fakultas', '999999', '628123456789', 'saintekonline@gmail.com', 'Humaniora', 'admin-fakultas', '0e30c7af5639b9410da357c13a3509a6', 'admin-fakultas', 'adminfakultas', 'af049aa2c187986eff03ffcd467edc5a', 1),
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.rekomendasi: 3 rows
DELETE FROM `rekomendasi`;
/*!40000 ALTER TABLE `rekomendasi` DISABLE KEYS */;
INSERT INTO `rekomendasi` (`nodata`, `tanggal`, `prodi`, `nim`, `nama`, `notelepon`, `email`, `keperluan`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`, `statussurat`) VALUES
	(2, '2021-08-27 20:15:48', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'mengikuti pendaftaran lomba di Jepang', '197411012003121004', 1, '2021-08-27 20:38:52', 'B-2/FHm/KM.01.3/08/2021', 1),
	(3, '2021-08-28 14:41:07', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'melanjutkan studi di Al-Azhar University Mesir', '197411012003121004', 1, '2021-08-28 14:41:24', 'B-3/FHm/KM.01.3/08/2021', 1),
	(4, '2021-08-28 16:57:59', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'mendaftar beasiswa bantuan belajar kemenag 2021', '197411012003121004', 1, '2021-08-28 16:58:31', 'B-4/FHm/KM.01.3/08/2021', 1);
/*!40000 ALTER TABLE `rekomendasi` ENABLE KEYS */;

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table pelayananonline.suket: 7 rows
DELETE FROM `suket`;
/*!40000 ALTER TABLE `suket` DISABLE KEYS */;
INSERT INTO `suket` (`nodata`, `tanggal`, `prodi`, `nim`, `nama`, `notelepon`, `email`, `jenissurat`, `keperluan`, `tgllulus`, `skyudisium`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`, `statussurat`) VALUES
	(1, '2021-08-26 20:08:12', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Aktif', 'pendaftaran ketua himpunan mahasiswa program studi Bahasa dan Sastra Arab', NULL, NULL, '197411012003121004', 1, '2021-08-26 20:15:54', 'B-1/FHm/KM.01.3/08/2021', 1),
	(2, '2021-08-26 21:04:42', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Kelakuan Baik', '', NULL, NULL, '197411012003121004', 1, '2021-08-26 21:13:23', 'B-2/FHm/KM.01.3/08/2021', 1),
	(4, '2021-08-26 21:07:16', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Lulus', 'melamar pekerjaan', '2021-08-24', 'B-234/FHM/PP.01.1/08/2021', '197411012003121004', 1, '2021-08-26 21:26:56', 'B-4/FHm/KM.01.3/08/2021', 1),
	(6, '2021-08-28 13:53:50', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Perpanjangan Waktu Pembayaran UKT', 'usaha orang tua terdampak COVID-19', '', '', '197411012003121004', 1, '2021-08-28 14:13:23', 'B-6/FHm/KM.01.3/08/2021', 1),
	(7, '2021-08-28 14:24:21', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Keringanan UKT', 'orang tua sudah pensiun', '', '', '197411012003121004', 1, '2021-08-28 14:31:44', 'B-7/FHm/KM.01.3/08/2021', 1),
	(8, '2021-08-28 14:24:46', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Penurunan UKT', 'sedang menempuh skripsi', '', '', '197411012003121004', 1, '2021-08-28 14:32:02', 'B-8/FHm/KM.01.3/08/2021', 1),
	(9, '2021-08-28 16:49:54', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Belum Menerima Beasiswa', 'mendaftar beasiswa bantuan belajar kemenag 2021', '', '', '197411012003121004', 1, '2021-08-28 16:52:45', 'B-9/FHm/KM.01.3/08/2021', 1),
	(15, '2021-08-29 14:12:04', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Belum Menerima Beasiswa', 'mendaftar beasiswa bantuan belajar kemenag 2021', NULL, NULL, '197411012003121004', 2, '2021-08-29 14:12:31', 'beasiswa sudah tutup', 2);
/*!40000 ALTER TABLE `suket` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
