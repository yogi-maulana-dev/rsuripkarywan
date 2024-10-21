-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2024 at 04:47 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gaji` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `tgl_lahir`, `gaji`) VALUES
(1, 'tes', '2024-10-21', 10000);

--
-- Triggers `karyawan`
--
DROP TRIGGER IF EXISTS `trg_karyawan_delete`;
DELIMITER $$
CREATE TRIGGER `trg_karyawan_delete` AFTER DELETE ON `karyawan` FOR EACH ROW BEGIN
  INSERT INTO tlog (tanggal, jam, keterangan, id_karyawan) 
  VALUES (OLD.tgl_lahir, NOW(), 3, OLD.id); 
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_karyawan_insert`;
DELIMITER $$
CREATE TRIGGER `trg_karyawan_insert` AFTER INSERT ON `karyawan` FOR EACH ROW BEGIN
  INSERT INTO tlog (tanggal, jam, keterangan, id_karyawan) 
  VALUES (NEW.tgl_lahir, NOW(), 1, NEW.id); 
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_karyawan_update`;
DELIMITER $$
CREATE TRIGGER `trg_karyawan_update` AFTER UPDATE ON `karyawan` FOR EACH ROW BEGIN
  INSERT INTO tlog (tanggal, jam, keterangan, id_karyawan) 
  VALUES (NEW.tgl_lahir, NOW(), 2, NEW.id); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tlog`
--

DROP TABLE IF EXISTS `tlog`;
CREATE TABLE IF NOT EXISTS `tlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam` timestamp NOT NULL,
  `keterangan` int NOT NULL,
  `id_karyawan` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tlog`
--

INSERT INTO `tlog` (`id`, `tanggal`, `jam`, `keterangan`, `id_karyawan`) VALUES
(1, '2024-10-21', '2024-10-21 04:44:11', 1, 2),
(2, '2024-10-21', '2024-10-21 04:45:18', 2, 2),
(3, '2024-10-21', '2024-10-21 04:45:34', 2, 2),
(5, '2024-10-21', '2024-10-21 04:46:41', 3, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
