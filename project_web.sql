-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventaris_database
CREATE DATABASE IF NOT EXISTS `inventaris_database` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `inventaris_database`;

-- Dumping structure for table inventaris_database.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `merk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table inventaris_database.barang: ~5 rows (approximately)
INSERT INTO `barang` (`id_barang`, `kode`, `nama`, `jenis`, `merk`, `stock`) VALUES
	(14, 'BRG1', 'Pensil 2b', 'Alat Tulis', 'Faber-Castell', 45),
	(15, 'BRG2', 'Buku Tulis', 'Buku', 'Sinar Dunia', 50),
	(16, 'BRG3', 'Penghapus', 'Alat Tulis', 'Joyko', 150),
	(17, 'BRG4', 'Spidol', 'Alat Tulis', 'Snowman', 75),
	(19, 'BRG5', 'Krayon', 'Alat Gambar', 'Faber-Castell', 100);

-- Dumping structure for table inventaris_database.restock
CREATE TABLE IF NOT EXISTS `restock` (
  `id_restock` int NOT NULL AUTO_INCREMENT,
  `jumlah_restock` int NOT NULL,
  `tgl_restock` date NOT NULL,
  `id_barang` int NOT NULL,
  `id_supplier` int NOT NULL,
  PRIMARY KEY (`id_restock`),
  KEY `id_barang` (`id_barang`),
  KEY `id_supplier` (`id_supplier`),
  CONSTRAINT `FK_restock_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_restock_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table inventaris_database.restock: ~5 rows (approximately)
INSERT INTO `restock` (`id_restock`, `jumlah_restock`, `tgl_restock`, `id_barang`, `id_supplier`) VALUES
	(14, 50, '2024-11-01', 14, 14),
	(15, 100, '2024-11-03', 15, 15),
	(16, 30, '2024-11-05', 16, 16),
	(17, 20, '2024-11-06', 17, 16),
	(19, 100, '2024-11-13', 19, 16);

-- Dumping structure for table inventaris_database.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(50) NOT NULL,
  `jenis_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `telepon_supplier` varchar(13) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table inventaris_database.supplier: ~4 rows (approximately)
INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `jenis_supplier`, `alamat_supplier`, `telepon_supplier`) VALUES
	(14, 'PT. Alat Tulis Jaya', 'Alat Tulis', 'Jl. Raya Kebayoran No.1', '021-9862-9972'),
	(15, 'Sinar Dunia', 'Buku', 'Jl. Gatot Subroto No.25', '021-3743-9232'),
	(16, 'Faber-Castell', 'Alat Tulis', 'Jl. Sudirman No. 30', '021-2847-9274'),
	(17, 'Joyko', 'Alat Tulis', 'Jl. Pemuda No.12', '021-4562-9263');

-- Dumping structure for table inventaris_database.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('Manager','Staff') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table inventaris_database.users: ~2 rows (approximately)
INSERT INTO `users` (`id_user`, `username`, `password`, `status`) VALUES
	(1, 'Auril Putri Amanda', 'auril314', 'Manager'),
	(2, 'Ihza', 'ihza123', 'Staff');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
