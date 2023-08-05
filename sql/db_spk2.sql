-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Agu 2023 pada 01.06
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dudi`
--

CREATE TABLE `tbl_dudi` (
  `id_dudi` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `nm_dudi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_dudi`
--

INSERT INTO `tbl_dudi` (`id_dudi`, `id_jurusan`, `nm_dudi`) VALUES
(1, 2, 'Surya Indah Motor Jepara'),
(2, 2, 'Honda Mandalatama Jepara'),
(3, 2, 'HINO Cemaco Kudus'),
(4, 2, 'Dealer Suzuki Jepara'),
(5, 3, 'PT. Telkom Jepara'),
(6, 4, 'Bank Syariah Indonesia KCP Jepara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int NOT NULL,
  `nm_jurusan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alias_jurusan` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nm_jurusan`, `alias_jurusan`) VALUES
(1, 'Desain dan Produksi Kriya', 'DPK'),
(2, 'Teknik Otomotif', 'TO'),
(3, 'Teknik Jaringan Komputer dan Telekomunikasi', 'TJKT'),
(4, 'Akuntansi Keuangan Lembaga', 'AKL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `nm_kelas` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kelas`
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
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int NOT NULL,
  `nm_kriteria` varchar(100) NOT NULL,
  `tipe_kriteria` enum('benefit','cost') NOT NULL,
  `bobot_kriteria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nm_kriteria`, `tipe_kriteria`, `bobot_kriteria`) VALUES
(1, 'Kelengkapan Data', 'benefit', 0.2),
(2, 'Nilai Rata-rata Mapel Kejuruan', 'benefit', 0.15),
(3, 'Nilai Tes Tertulis', 'benefit', 0.2),
(4, 'Nilai Tes Wawancara', 'benefit', 0.3),
(5, 'Jumlah Alpa', 'cost', 0.15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_nilai` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `id_siswa` int NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int NOT NULL,
  `id_user` int NOT NULL,
  `nis` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_kelas` int NOT NULL,
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
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `id_user`, `nis`, `name`, `tgl_lahir`, `id_kelas`, `email`, `phone_no`, `t_badan`, `b_badan`, `formulir`, `kartu_pelajar`, `raport`, `vaksin`, `surat_kesehatan`) VALUES
(1, 6, '2980', 'Fajar Dwi Guntoro', NULL, 14, '2980@smkw9jepara.sch.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, '2981', 'Lina Fadhilah', NULL, 15, '2981@smkw9jepara.sch.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_no`, `role`, `password`, `created_at`) VALUES
(1, 'Jamal Muhlis', 'jamalmuhlis@gmail.com', '082313709240', 'admin', '$2y$10$ji4IGLGbTmgSFF04az/37OSlNLx5JpGbbqOI3ZK0TAW2f3JWCryhy', '2023-07-28 16:08:09'),
(2, 'Adi Kurniawan', 'adi_k@smkw9jepara.sch.id', '909090909090', 'koordinator', '$2y$10$dpqgc35eMZpOEDeE2W1YVOzkXqYwyqYlGcYU7FFeWdkQ5.t3Imbt.', '2023-07-28 16:08:09'),
(3, 'Dian Fahlevi', 'levi@smkw9jepara.sch.id', '707070707070', 'hubin', '$2y$10$3NSg73fPdQjAHqWZXqSpTejCKCE5jKm1rjOiWuhIL.dEt6XT.7jlu', '2023-07-28 16:08:09'),
(4, 'Ina Itaqi Zuliana', 'ina@smkw9jepara.sch.id', '606060606060', 'gurubk', '$2y$10$VTOmjI2NVGKM9hMM9GJBFOGQf6AFpVgxU7h3jvppfNtcodYDRizW.', '2023-07-28 16:08:09'),
(5, 'Irbab Aulia Amri', 'irbab@smkw9jepara.sch.id', '505050505050', 'kepsek', '$2y$10$ukG7LYlJM4DPiuvu0qDjZen4Ep8KlGs0yUKypXBYD8qib7/hwCtBC', '2023-07-28 16:08:09'),
(6, 'Muhammad Fajar Dwi Guntoro', '2980@smkw9jepara.sch.id', '808080808080', 'siswa', '$2y$10$e3CF7sEWfaDpcS3agKHDOuaqMVfh.PvcI/AOUu69tNJ2/ATFzOOBa', '2023-07-28 16:08:09'),
(8, 'Faiz', 'faizhid11@gmail.com', '8989898', 'siswa', '$2y$10$IHe1mOSyq8gCV4LVkdclAuA8cSPHlLK2y6nq2b9WisFi0v6gS/7.2', '2023-08-03 02:22:43'),
(9, 'Sultanu Fahmi', 'fahmi@gmail.com', '9898090909', 'siswa', '$2y$10$B0Woe2mduY1xqKSjE1.dBeDXU9.mbxfpX97nsl7jQ7Kw8WVgzG.eO', '2023-08-03 02:24:46'),
(10, 'ROkhim', 'rokhim@gmail.com', '8987897', 'admin', '$2y$10$88PN9sz.YEeuMzbGe.tcwO/DsKVtYQYjtlxngbyB3F7vVh5O/ovYO', '2023-08-03 02:31:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dudi`
--
ALTER TABLE `tbl_dudi`
  ADD PRIMARY KEY (`id_dudi`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `kriteria` (`id_kriteria`),
  ADD KEY `siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dudi`
--
ALTER TABLE `tbl_dudi`
  MODIFY `id_dudi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_dudi`
--
ALTER TABLE `tbl_dudi`
  ADD CONSTRAINT `tbl_dudi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD CONSTRAINT `tbl_kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
