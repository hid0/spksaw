-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2023 at 08:15 AM
-- Server version: 8.0.32
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `c1`
--

CREATE TABLE `c1` (
  `id_c1` int NOT NULL,
  `id_siswa` int NOT NULL,
  `nilai_c1` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='nilai mapel kejuruan';

--
-- Dumping data for table `c1`
--

INSERT INTO `c1` (`id_c1`, `id_siswa`, `nilai_c1`) VALUES
(1, 1, 75.5),
(2, 2, 81.6),
(3, 3, 61);

-- --------------------------------------------------------

--
-- Table structure for table `c2`
--

CREATE TABLE `c2` (
  `id_c2` int NOT NULL,
  `id_siswa` int NOT NULL,
  `nilai_c2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='kelengkapan data';

--
-- Dumping data for table `c2`
--

INSERT INTO `c2` (`id_c2`, `id_siswa`, `nilai_c2`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `c3`
--

CREATE TABLE `c3` (
  `id_c3` int NOT NULL,
  `id_siswa` int NOT NULL,
  `nilai_c3` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tes wawancara';

-- --------------------------------------------------------

--
-- Table structure for table `c4`
--

CREATE TABLE `c4` (
  `id_c4` int NOT NULL,
  `id_siswa` int NOT NULL,
  `nilai_c4` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tes tertulis';

-- --------------------------------------------------------

--
-- Table structure for table `c5`
--

CREATE TABLE `c5` (
  `id_c5` int NOT NULL,
  `id_siswa` int NOT NULL,
  `nilai_c5` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='jumlah alpha';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dudi`
--

CREATE TABLE `tbl_dudi` (
  `id_dudi` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `nm_dudi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dudi`
--

INSERT INTO `tbl_dudi` (`id_dudi`, `id_jurusan`, `nm_dudi`) VALUES
(1, 2, 'Surya Indah Motor Jepara'),
(2, 2, 'Honda Mandalatama Jepara'),
(3, 2, 'HINO Cemaco Kudus'),
(4, 2, 'Dealer Suzuki Jepara'),
(5, 3, 'PT. Telkom Jepara'),
(6, 4, 'Bank Syariah Indonesia KCP Jepara'),
(7, 3, 'Yukcoding Media'),
(8, 2, 'Bank Jateng'),
(9, 1, 'New Designer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int NOT NULL,
  `nm_jurusan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alias_jurusan` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nm_jurusan`, `alias_jurusan`) VALUES
(1, 'Desain dan Produksi Kriya', 'DPK'),
(2, 'Teknik Otomotif', 'TO'),
(3, 'Teknik Jaringan Komputer dan Telekomunikasi', 'TJKT'),
(4, 'Akuntansi Keuangan Lembaga', 'AKL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `nm_kelas` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `id_jurusan`, `nm_kelas`) VALUES
(1, 1, 'X DPK'),
(2, 1, 'XI DPK'),
(3, 1, 'XII DPK'),
(4, 2, 'X TO I'),
(5, 2, 'X TO A'),
(6, 2, 'X TO B'),
(7, 2, 'XI TO I'),
(8, 2, 'XI TO A'),
(9, 2, 'XI TO B'),
(10, 2, 'XII TO A'),
(11, 2, 'XII TO B'),
(12, 3, 'X TJKT A'),
(13, 3, 'X TJKT B'),
(14, 3, 'XI TJKT A'),
(15, 3, 'XI TJKT B'),
(16, 3, 'XII TJKT A'),
(17, 3, 'XII TJKT B'),
(18, 4, 'X AKL'),
(19, 4, 'XI AKL'),
(20, 4, 'XII AKL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int NOT NULL,
  `nm_kriteria` varchar(100) NOT NULL,
  `tipe_kriteria` enum('benefit','cost') NOT NULL,
  `bobot_kriteria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nm_kriteria`, `tipe_kriteria`, `bobot_kriteria`) VALUES
(1, 'Tinggi Badan', 'cost', 1.5),
(2, 'Kelengkapan data', 'benefit', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `nis` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_no` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `t_badan` int DEFAULT NULL,
  `b_badan` int DEFAULT NULL,
  `formulir` blob,
  `kartu_pelajar` blob,
  `raport` blob,
  `vaksin` blob,
  `surat_kesehatan` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `id_user`, `nis`, `name`, `tgl_lahir`, `id_kelas`, `email`, `phone_no`, `t_badan`, `b_badan`, `formulir`, `kartu_pelajar`, `raport`, `vaksin`, `surat_kesehatan`) VALUES
(1, 6, '2980', 'Fajar Dwi Guntoro', NULL, 14, '2980@smkw9jepara.sch.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, '2981', 'Lina Fadhilah', NULL, 15, '2981@smkw9jepara.sch.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, '3320', 'budi bud', '2023-08-01', 1, '3320@mail.com', '03265654654654', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_no` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('admin','siswa','koordinator','hubin','gurubk','kepsek') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_no`, `role`, `password`, `created_at`) VALUES
(1, 'Jamal Muhlis', 'jamalmuhlis@gmail.com', '082313709240', 'admin', '$2y$10$ji4IGLGbTmgSFF04az/37OSlNLx5JpGbbqOI3ZK0TAW2f3JWCryhy', '2023-07-28 16:08:09'),
(2, 'Adi Kurniawan', 'adi_k@smkw9jepara.sch.id', '909090909090', 'koordinator', '$2y$10$dpqgc35eMZpOEDeE2W1YVOzkXqYwyqYlGcYU7FFeWdkQ5.t3Imbt.', '2023-07-28 16:08:09'),
(3, 'Dian Fahlevi', 'levi@smkw9jepara.sch.id', '707070707070', 'hubin', '$2y$10$3NSg73fPdQjAHqWZXqSpTejCKCE5jKm1rjOiWuhIL.dEt6XT.7jlu', '2023-07-28 16:08:09'),
(4, 'Ina Itaqi Zuliana', 'ina@smkw9jepara.sch.id', '606060606060', 'gurubk', '$2y$10$VTOmjI2NVGKM9hMM9GJBFOGQf6AFpVgxU7h3jvppfNtcodYDRizW.', '2023-07-28 16:08:09'),
(5, 'Irbab Aulia Amri', 'irbab@smkw9jepara.sch.id', '505050505050', 'kepsek', '$2y$10$ukG7LYlJM4DPiuvu0qDjZen4Ep8KlGs0yUKypXBYD8qib7/hwCtBC', '2023-07-28 16:08:09'),
(6, 'Muhammad Fajar Dwi Guntoro', '2980@smkw9jepara.sch.id', '808080808080', 'siswa', '$2y$10$e3CF7sEWfaDpcS3agKHDOuaqMVfh.PvcI/AOUu69tNJ2/ATFzOOBa', '2023-07-28 16:08:09'),
(8, 'Budi Bud', '3320@mail.com', '03265654654654', 'siswa', '$2y$10$ala3DmaX19rgv25iTGcaBecww0jBrN9JNPFr9d7ViyJUk2capIa/C', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c1`
--
ALTER TABLE `c1`
  ADD PRIMARY KEY (`id_c1`);

--
-- Indexes for table `c2`
--
ALTER TABLE `c2`
  ADD PRIMARY KEY (`id_c2`);

--
-- Indexes for table `c3`
--
ALTER TABLE `c3`
  ADD PRIMARY KEY (`id_c3`);

--
-- Indexes for table `c4`
--
ALTER TABLE `c4`
  ADD PRIMARY KEY (`id_c4`);

--
-- Indexes for table `c5`
--
ALTER TABLE `c5`
  ADD PRIMARY KEY (`id_c5`);

--
-- Indexes for table `tbl_dudi`
--
ALTER TABLE `tbl_dudi`
  ADD PRIMARY KEY (`id_dudi`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c1`
--
ALTER TABLE `c1`
  MODIFY `id_c1` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `c2`
--
ALTER TABLE `c2`
  MODIFY `id_c2` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `c3`
--
ALTER TABLE `c3`
  MODIFY `id_c3` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c4`
--
ALTER TABLE `c4`
  MODIFY `id_c4` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c5`
--
ALTER TABLE `c5`
  MODIFY `id_c5` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dudi`
--
ALTER TABLE `tbl_dudi`
  MODIFY `id_dudi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dudi`
--
ALTER TABLE `tbl_dudi`
  ADD CONSTRAINT `tbl_dudi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD CONSTRAINT `tbl_kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
