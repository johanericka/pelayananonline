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

-- Dumping structure for table pelayananonline.suket
CREATE TABLE IF NOT EXISTS `rekomendasi` (
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
INSERT INTO `rekomendasi` (`nodata`, `tanggal`, `prodi`, `nim`, `nama`, `notelepon`, `email`, `jenissurat`, `keperluan`, `tgllulus`, `skyudisium`, `verifikator`, `verifikasi`, `tglverifikasi`, `keterangan`, `statussurat`) VALUES
	(1, '2021-08-26 20:08:12', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Aktif', 'pendaftaran ketua himpunan mahasiswa program studi Bahasa dan Sastra Arab', NULL, NULL, '197411012003121004', 1, '2021-08-26 20:15:54', 'B-1/FHm/KM.01.3/08/2021', 1),
	(2, '2021-08-26 21:04:42', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Kelakuan Baik', '', NULL, NULL, '197411012003121004', 1, '2021-08-26 21:13:23', 'B-2/FHm/KM.01.3/08/2021', 1),
	(4, '2021-08-26 21:07:16', 'Bahasa dan Sastra Arab', '11111111', 'Johan Ericka Wahyu Prakasa', '08123456789', 'johanericka@gmail.com', 'Lulus', 'melamar pekerjaan', '2021-08-24', 'B-234/FHM/PP.01.1/08/2021', '197411012003121004', 1, '2021-08-26 21:26:56', 'B-4/FHm/KM.01.3/08/2021', 1);
/*!40000 ALTER TABLE `suket` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
