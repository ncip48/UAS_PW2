-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2023 at 09:15 PM
-- Server version: 10.4.14-MariaDB-log
-- PHP Version: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat_dosen` varchar(225) NOT NULL,
  `nip` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `jenis_kelamin`, `alamat_dosen`, `nip`) VALUES
(3, 'Surya Tri Atmaja Ramadhani, \r\nS.Kom., M.Eng', '1', 'kocak', '121314'),
(6, 'Ikmah', '0', 'gatauuuu', '8181222'),
(7, 'Hanif Al Fatta, M.Kom', '1', 'gtw', '190302096'),
(8, 'Barka Satya, M.Kom', '1', 'Gtw', '190302126'),
(12, 'Lukman, M.Kom', '1', 'Kepo', '7623783871'),
(13, 'Firman', '1', 'gtw', '098989');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `id_dekan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id`, `nama`, `id_dekan`) VALUES
(1, 'Fakultas Ilmu Komputer', 7),
(2, 'Fakultas Lain', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id`, `id_dosen`, `kode_matkul`, `nama_matkul`, `id_prodi`) VALUES
(1, 3, 'DT095', 'Pengantar IT dan Instalasi Komputer', 7),
(2, 3, 'DT005', 'Algoritma & Pemrograman', 7),
(3, 10, 'DT095', 'Pengantar IT dan Instalasi Komputer', 7),
(4, 3, 'DT30567', 'Pemrograman Web 2', 7),
(7, 8, 'DT095', 'Pengantar IT dan Instalasi Komputer', 7),
(8, 8, 'DT30567', 'Pemrograman Web 2', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(64) NOT NULL,
  `kaprodi` varchar(25) NOT NULL,
  `sekprodi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`, `kaprodi`, `sekprodi`) VALUES
(7, 1, 'D3 Teknik Informatika', '8', '13'),
(9, 1, 'D3 Manjemen', '6', '7'),
(11, 1, 'S1 Teknik Komputer', '6', '6'),
(12, 1, 'S1 Teknik Informatika', '7', '8'),
(14, 2, 'S1 Animasi', '6', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rps`
--

CREATE TABLE `tb_rps` (
  `id` int(11) NOT NULL,
  `nomor` varchar(10) NOT NULL,
  `tanggal_berlaku` date NOT NULL,
  `tanggal_disusun` date NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `revisi` varchar(5) NOT NULL DEFAULT '00',
  `semester` varchar(15) NOT NULL,
  `bobot_sks` varchar(10) NOT NULL,
  `detail_penilaian` text NOT NULL,
  `gambaran_umum` text NOT NULL,
  `capaian` text NOT NULL,
  `prasyarat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rps`
--

INSERT INTO `tb_rps` (`id`, `nomor`, `tanggal_berlaku`, `tanggal_disusun`, `id_matkul`, `id_pembuat`, `revisi`, `semester`, `bobot_sks`, `detail_penilaian`, `gambaran_umum`, `capaian`, `prasyarat`) VALUES
(1, 'RPS-DT095', '2022-01-01', '2022-12-31', 1, 3, '01', 'Ganjil (1)', '2 SKS', '<ul><li>Prsensi: 10%</li><li>UTS: 30%</li><li>UAS: 10%</li></ul>', '<p>Perkuliahan Pengantar IT dan Instalasi Komputer diselenggarakan sebanyak 14 pertemuan praktikum Setelah mengikuti perkuliahan, mahasiswa diharapkan dapat:</p><ul><li>Memahami komponen penyusun perangkat komputer dan troubleshooting perangkat komputer.</li><li>Memahami cara instalasi operating sistem dan konfigurasi sistem backup dan Restore.</li><li>Memahami proses recovery data dan pengamanan komputer melalui konfigurasi policy.</li><li>Bekerja dalam tim dan bertanggung jawab dalam menyelesaikan permasalahan di bidang pengelolaan instalasi komputer</li></ul>', '<p>Untuk mencapai capaian pembelajaran utama yang tuntas (terselesaikan), mahasiswa diharapkan mampu:</p><ul><li>Mengidentifikasi perangkat komputer.</li><li>Melakukan troubleshooting pada instalasi komputer.</li><li>Merakit Komponen Komputer.</li><li>Melakukan Instalasi Operating System.</li><li>Membuat partisi dan membuat backup data.</li><li>Melakukan Restore data dan recovery data.</li><li>Mengatur konfigurasi Policy.</li><li>Bekerja dalam tim dan bertanggung jawab dalam menyelesaikan permasalahan di bidang pengelolaan instalasi komputer.</li></ul>', '<p>Jika tidak mengikuti maka akan E aowekoakeo</p>'),
(3, 'RPS-DT005', '2023-01-05', '2023-01-05', 2, 3, '00', 'Genap (2)', '10 SKS', '<p>DIharapkan mampu:</p><ul><li>A</li><li>B</li><li>C</li><li>D</li></ul>', '<p>DIharapkan mampu:</p><ul><li>A</li><li>B</li><li>C</li><li>D</li></ul>', '<p>DIharapkan mampu:</p><ul><li>A</li><li>B</li><li>C</li><li>D</li></ul>', '<p>AOskesoaksdoaskod</p>'),
(4, 'RPS-', '2023-01-14', '2023-01-14', 0, 8, '00', '3', '24', '<p>asd0</p>', '<p>asd1</p>', '<p>asd2</p>', '<p>asd3</p>'),
(5, 'RPS-DT005', '2023-01-14', '2023-01-14', 2, 8, '00', '4', '24', '<p>asd</p>', '<p>asd</p>', '<p>asd</p>', '<p>asd</p>'),
(6, 'RPS-DT005', '2023-01-14', '2023-01-14', 2, 8, '00', '3', '24', '<p>nyobaa</p>', '<p>nyobaa</p>', '<p>nyobaa</p>', '<p>nyobaa</p>'),
(7, 'RPS-DT005', '2023-01-01', '2023-01-14', 9, 8, '16', 'Genap', '4 SKS', '<p>nyoba</p>', '<p>nyoba</p>', '<p>nyoba</p>', '<p>nyoba</p>'),
(10, 'RPS-DS001', '2023-01-17', '2023-01-17', 9, 3, '00', '2', '2', '<ul><li>aaaa</li></ul>', '<ul><li>a</li><li>c</li><li>v</li><li>b</li><li>&nbsp;</li></ul>', '<ol><li>s</li><li>d</li><li>f</li><li>s</li></ol>', '<p>aaaaaaaa</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rps_detail`
--

CREATE TABLE `tb_rps_detail` (
  `id` int(11) NOT NULL,
  `id_rps` int(11) NOT NULL,
  `minggu` int(11) NOT NULL,
  `kemampuan_akhir` text NOT NULL,
  `indikator` text NOT NULL,
  `topik` text NOT NULL,
  `aktivitas_pembelajaran` text NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `penilaian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rps_detail`
--

INSERT INTO `tb_rps_detail` (`id`, `id_rps`, `minggu`, `kemampuan_akhir`, `indikator`, `topik`, `aktivitas_pembelajaran`, `waktu`, `penilaian`) VALUES
(1, 1, 1, 'Memahami komponen penyusun perangkat komputer dan troubleshooting perangkat komputer', 'Mahasiswa mengetahui tentang RPS dan kontrak belajar', 'Perkenalan dan penjelasan RPS.\r\n', 'Mahasiswa dapat mengetahui rencana pembelajaran dan kontrak belajar untuk satu semester', '100 menit', 'Praktikum (1%)'),
(2, 1, 2, 'Memahami komponen penyusun perangkat komputer dan troubleshooting perangkat komputer', 'Mahasiswa mengetahui tentang komponen perakitan komputer.', 'Pengenalan Dan Perakitan Komputer.', 'Mahasiswa dapat mengidentifikasi komponen perakitan komputer. alat dan standar keamanan', '100 menit', 'Praktikum (1%)'),
(3, 1, 3, 'Memahami komponen penyusun perangkat komputer dan troubleshooting perangkat komputer', 'Mahasiswa mengetahui tentang konfigurasi konfigurasi perakitan komputer', 'Perakitan Komputer.', 'Mahasiswa mengetahui tentang konfigurasi perakitan komputer menggunakan aplikasi virtual dan presentasi kelompok', '300 menit', 'Praktikum (10%)'),
(4, 1, 4, 'Memahami komponen penyusun perangkat komputer dan troubleshooting perangkat komputer', 'Mahasiswa mengetahui tentang troubleshooting perangkat Komputer.', 'Troubleshooting', 'Mahasiswa mengetahui tentang troubleshooting perangkat Komputer.', '100 menit', 'Praktikum (1%)'),
(5, 1, 5, 'Memahami cara instalasi operating sistem dan konfigurasi sistem backup dan Restore', 'Mahasiswa dapat melakukan instalasi OS', 'Instalasi OS', 'Mahasiswa dapat melakukan Instalasi OS', '100 menit', 'Praktikum (1%)'),
(6, 1, 6, 'Mahasiswa dapat mengerjakan tugas responsi dengan baik.', 'Mahasiswa dapat mengerjakan tugas responsi dengan baik', 'Responsi 1', 'Mahasiswa dapat mengerjakan tugas responsi dengan baik.', '200 menit', 'Observasi (30%)'),
(7, 1, 7, 'Mahasiswa dapat mengerjakan tugas responsi dengan baik.', 'Mahasiswa dapat mengerjakan tugas responsi dengan baik', 'Responsi 1', 'Mahasiswa dapat mengerjakan tugas responsi dengan baik.', '200 menit', 'Observasi (30%)'),
(8, 1, 8, 'Memahami cara instalasi operating sistem dan konfigurasi sistem backup dan Restore.', 'Mahasiswa dapat membuat partisi pada Hard Disk', 'Partisi hard disk', 'Mahasiswa dapat membuat partisi pada Hard Disk', '100 menit', 'Praktikum (1%)'),
(9, 1, 9, 'Memahami cara instalasi operating sistem dan konfigurasi sistem backup dan Restore.', 'Mahasiswa dapat melakukan Backup dan restore', 'Backup dan restore', 'Mahasiswa mengetahui Backup dan restore', '100 menit', 'Praktikum (1%)'),
(10, 1, 10, 'Memahami cara instalasi operating sistem dan konfigurasi sistem backup dan Restore.', 'Mahasiswa dapat melakukan Backup dan restore', 'Backup dan restore', 'Mahasiswa mengetahui Backup dan restore menggunakan tools pihak ketiga', '100 menit', 'Praktikum (1%)'),
(13, 1, 11, 'A', 'V', 'C', 'D', 'EE', 'FFFF'),
(14, 3, 1, 'Gatau', 'Males', 'Beli', 'Truk', '100 menit', '10%');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rps_tugas`
--

CREATE TABLE `tb_rps_tugas` (
  `id` int(11) NOT NULL,
  `id_rps` int(11) NOT NULL,
  `tugas` varchar(50) NOT NULL,
  `kemampuan_akhir` text NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `bobot` varchar(10) NOT NULL,
  `kriteria_penilaian` varchar(255) NOT NULL,
  `indikator_penilaian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rps_tugas`
--

INSERT INTO `tb_rps_tugas` (`id`, `id_rps`, `tugas`, `kemampuan_akhir`, `waktu`, `bobot`, `kriteria_penilaian`, `indikator_penilaian`) VALUES
(1, 1, 'Presentasi', 'Mahasiswa memahami materi yang disampaikan di kelas dan mengekplorasi pengetahuan secara ,mandiri', 'Mulai minggu pertama \r\nsetelah materi disampaikan. Tugas dikumpulkan paling lambat pada pertemuan ke 3', '10 %', 'Hasil diskusi kelompok dan slide presentasi', 'Dapat merancang perangkat komputer dengan baik.'),
(2, 1, 'Praktikum', 'Mahasiswa dapat mengidentifikasi dan memahami instruksi yang diberikan dalam praktikum', 'Mulai diberikan pada pertemuan 1 sampai pertemuan 13.', '20 %', 'Hasil mengerjakan praktikum dan atau laporan praktikum.', 'Telah menjalankan praktikum dengan output sesuai. Diskripsi laporan runtut dan sesuai dengan format yang diberikan.'),
(3, 1, 'Observasi', 'Mahasiswa dapat menyelesaikan permasalahan teknis berdasarkan apa yang telah dipelajari ', 'Diberikan pada pertemuan ke 6,7, 14', '60 %', 'Sikap dalam menyelesaikan permasalahan dan kualitas hasil penyelesaian masalah', 'Perangkat dapat beroperasi dengan baik.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rps_unit_pembelajaran`
--

CREATE TABLE `tb_rps_unit_pembelajaran` (
  `id` int(11) NOT NULL,
  `id_rps` int(11) NOT NULL,
  `kemampuan_akhir` text NOT NULL,
  `indikator` text NOT NULL,
  `bahan_kajian` text NOT NULL,
  `metode_pembelajaran` text NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `metode_penilaian` varchar(255) NOT NULL,
  `bahan_ajar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rps_unit_pembelajaran`
--

INSERT INTO `tb_rps_unit_pembelajaran` (`id`, `id_rps`, `kemampuan_akhir`, `indikator`, `bahan_kajian`, `metode_pembelajaran`, `waktu`, `metode_penilaian`, `bahan_ajar`) VALUES
(1, 1, 'Memahami komponen penyusun perangkat komputer dan troubleshooting perangkat komputer', '<p>a) Mahasiswa mampu Mengidentifikasi perangkat komputer.&nbsp;</p><p>b) Melakukan troubleshooting pada instalasi komputer.&nbsp;</p><p>c) Merakit Komponen Komputer.</p>', '<p>1. Pengenalan komponen PC, alat dan standar keamanan.&nbsp;</p><p>2. Perakitan Komputer.&nbsp;</p><p>3. Troubleshooting</p>', 'Praktikum, presentasi kelompok', '400 menit Praktikum,200 menit Tugas mandiri', 'Hasil kegiatan Praktikum, presentasi kelompok', '1,2'),
(2, 1, 'Memahami cara instalasi operating sistem dan konfigurasi sistem backup dan Restore.', '<p>a) Melakukan Instalasi Operating System&nbsp;</p><p>b) Membuat partisi dan membuat backup data&nbsp;</p><p>c) Melakukan Restore data dan recovery data</p>', '<p>1.Instalasi Operating System&nbsp;</p><p>2. Membuat partisi dan membuat backup data&nbsp;</p><p>3. Melakukan Restore data dan recovery data.</p>', 'Praktikum', '400 menit praktikum', 'Hasil kegiatan Praktikum', '1,2'),
(3, 1, 'Memahami proses recovery data dan menjadi Profesional IT serta Advanced Troubleshooting.', '<p>a) Melakukan recovery data dengan tools.&nbsp;</p><p>b) Menyelesaikan masalah dan Solusi tingkat lanjut pada Sistem Operasi&nbsp;</p><p>c) Dapat berkomunikasi dengan baik terkait masalah IT.</p>', '<p>1. recovery data.&nbsp;</p><p>2. Advanced Troubleshooting.&nbsp;</p><p>3. Communication Skills</p>', 'Praktikum', '300 menit praktikum', 'Hasil kegiatan Praktikum', '1,2'),
(6, 10, 'ngantuk', '<p>abc</p>', '<p>zaaa</p>', 'presentasi', '100', 'tugas', 'modul');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `image` varchar(30) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `password`, `nama`, `role`, `image`, `id_dosen`) VALUES
(1, 'admin@gmail.com', '$2y$10$fmJacA3acA4ziV2iuWdw.Oizx8zQXg4zDy7ENLnjSrsZhqTuXXo22', 'Joni', 1, '', NULL),
(2, 'barka@gmail.com', '$2y$10$vfNsyikxS8vN9iZimqCF.u8fC.METlUp.y6kFkCeRv5uEf5o/GqpO', 'Barka Satya', 0, NULL, 8),
(28, 'surya@gmail.com', '$2y$10$/o6rYO3NgS0jjCkIQsT0oeHHBTTvX8lry/HFj/voQfdGu4nCehUBa', 'Surya Tri Atmaja Ramadhani,  S.Kom., M.Eng', 0, NULL, 3),
(30, 'admin2@gmail.com', '$2y$10$MmQUSASisk9gPzrHuePcs.rRmLQJcd7r6qS.4LjsLuQFnwIDDpJAK', 'Kocak Gaming', 1, NULL, 0),
(31, 'kocak@gmail.com', '$2y$10$M0xEqT3txI1z.HyOEcZe3.38qQoKEMUVEJ.Bnff59LBSbnJd.AFKK', 'User Lain', 0, NULL, 8),
(32, 'firman@gmai.com', '$2y$10$lVgN6Ffs5qs14aHp447rG./W.NVkGskwoiPR3pgd3vRO/rb9TS9xu', 'Firman', 0, NULL, 13),
(33, 'ikmah@gmail.com', '$2y$10$fXzTPZI/gchTINO6W2u5HepOXbaRj3Te4.D9iIBIMwOBgEbFU1jhi', 'Ikmah', 0, NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_rps`
--
ALTER TABLE `tb_rps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rps_detail`
--
ALTER TABLE `tb_rps_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rps_tugas`
--
ALTER TABLE `tb_rps_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rps_unit_pembelajaran`
--
ALTER TABLE `tb_rps_unit_pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_rps`
--
ALTER TABLE `tb_rps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_rps_detail`
--
ALTER TABLE `tb_rps_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_rps_tugas`
--
ALTER TABLE `tb_rps_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_rps_unit_pembelajaran`
--
ALTER TABLE `tb_rps_unit_pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
