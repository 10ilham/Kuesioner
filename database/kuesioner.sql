-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2023 at 08:14 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuesioner_cic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `nama_admin` varchar(125) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `foto_admin` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`, `jk`, `ttl`, `foto_admin`, `telp`, `alamat`, `email`, `id_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ilham Munawar Sajali', 'laki-laki', '2004-01-14', '1.jpg', '62', 'Jawa Tengah', '10ilham@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aspek`
--

CREATE TABLE `aspek` (
  `id_aspek` int NOT NULL,
  `nama_aspek` varchar(200) NOT NULL,
  `typeaspek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspek`
--

INSERT INTO `aspek` (`id_aspek`, `nama_aspek`, `typeaspek`) VALUES
(1, 'Aspek Reliability (Kehandalan)', 'akademik'),
(2, 'Aspek Responsiveness (Sikap Tanggap)', 'akademik'),
(3, 'Aspek Assurance (Jaminan pada Mahasiswa) ', 'akademik'),
(4, 'Aspek Emphaty (Pemahaman terhadap Kepentingan Mahasiswa)', 'akademik'),
(5, 'Aspek Tangibles (Sarana Pendidikan : Alat Perkuliahan, Media Pengajaran, dan Prasarana Pendidikan)', 'akademik'),
(6, 'Aspek Organisasi dan Pekerjaan', 'kelola'),
(7, 'Aspek Pengembangan Karir atau Kompetensi', 'kelola'),
(8, 'Aspek Remunerasi atau Kompensasi', 'kelola'),
(9, 'Aspek Sarana dan Prasarana', 'kelola');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_staf`
--

CREATE TABLE `dosen_staf` (
  `username` int NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `bagian` varchar(40) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_staf`
--

INSERT INTO `dosen_staf` (`username`, `password`, `nama_user`, `ttl`, `jk`, `alamat`, `telp`, `email`, `bagian`, `foto`, `id_level`) VALUES
(220102037, '220102037', 'Ilham', '2023-11-15', 'perempuan', 'Jawa Tengah', '08131223333', '10ilham@gmail.com', 'Dosen', 'default.png', 2),
(2016102036, '2016102036', 'Jonathan Subardi', '2023-11-15', 'Laki-laki', 'Kaum Lebak, Pameungpeuk.', '08131223333', 'jonathan@yahoo.com', 'Dosen', 'default.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `program_studi` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ttl` date NOT NULL,
  `jk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(40) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `foto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_level` int NOT NULL,
  `level` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kaprodi`
--

INSERT INTO `kaprodi` (`id`, `username`, `password`, `nama`, `program_studi`, `ttl`, `jk`, `email`, `telp`, `alamat`, `foto`, `id_level`, `level`) VALUES
(1, '220102038', '220102037', 'Ilham Munawar', 'D3-Teknik Multimedia', '2014-11-05', 'laki-laki', '10ilham@gmail.com', '08131223333', 'Jawa Tengah', 'default.png', 3, 'Kaprodi');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `id_periode` int NOT NULL,
  `typeaspek` enum('akademik','kelola') NOT NULL,
  `harapan` varchar(500) NOT NULL,
  `masukan` varchar(500) NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_periode`, `typeaspek`, `harapan`, `masukan`, `id_level`) VALUES
(1, 2, 'kelola', '<p>semoga layanan manajemen lebih baik</p>\r\n', '<p>ditingkatkan fasilitas yang tersedia</p>\r\n', 2),
(2, 2, 'kelola', '<p>layanan manajemen yang diberikan semakin berkualitas</p>\r\n', '<p>meningkatkan sarana dan prasarana yang ada</p>\r\n', 2),
(3, 2, 'kelola', '<p>semoga layanan manajemen semakin baik</p>\r\n', '<p>tingkatkan sarana dan prasarana yang ada</p>\r\n', 3),
(4, 2, 'akademik', '<p>semoga pelayanan yang diberikan semakin meningkat dan berkualitas</p>\r\n', '<p>perbanyak taman untuk duduk dan belajar kelompok</p>\r\n', 4),
(5, 2, 'akademik', '<p>semoga semakin baik</p>\r\n', '<p>perluas tempat parkir</p>\r\n', 5),
(6, 1, 'akademik', '<p>Semoga layanan manajemen lebih baik dan berkualitas</p>\r\n', '<p>tingkatkan sarana dan prasarana yang diberikan</p>\r\n', 4),
(7, 1, 'akademik', 'semoga layanan yang diberikan semakin berkualitas', 'perbaiki sarana dan prasarana yang ada', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id_kuesioner` int NOT NULL,
  `pertanyaan` varchar(525) NOT NULL,
  `id_aspek` int NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id_kuesioner`, `pertanyaan`, `id_aspek`, `id_level`) VALUES
(1, 'Sosialisasi terhadap SOTK (Strukur Organisasi dan Tata Kelola) Universitas Catur Insan Cendekia dilakukan secara efektif dan efisien', 6, 2),
(2, 'Dosen Universitas Catur Insan Cendekia bekerja sesuai SOTK dengan kompetensi yang disertai tugas pokok dan fungsinya', 6, 2),
(3, 'Kejelasan dan kemudahan program kerja yang dijalankan oleh setiap Dosen di Universitas Catur Insan Cendekia', 6, 2),
(4, 'Kemampuan berkomunikasi dan bekerjasama antara pimpinan dan Dosen di setiap unit kerja', 6, 2),
(5, 'Kepuasan terhadap kepemimpinan dalam pengelolaan SDM', 6, 2),
(6, 'Kepuasan terhadap sinkronisasi kebijakan pimpinan', 6, 2),
(7, 'Kepuasan terhadap konsistensi penegakan aturan', 6, 2),
(8, 'Kepuasan terhadap keamanan, keselamatan, dan kesehatan kerja', 6, 2),
(9, 'Pemberian motivasi dan bimbingan untuk pencapaian prestasi kerja', 7, 2),
(10, 'Kesempatan mendapatkan tugas dan beban kerja sesuai bidang keahlian', 7, 2),
(11, 'Kesempatan mengembangan ide/gagasan dan dialog dengan pimpinan', 7, 2),
(12, 'Pemberian penghargaan atas prestasi/kerja yang baik', 7, 2),
(13, 'Pemberian hak-hak untuk kesejahteraan atas pelaksanaan tugas rutin', 7, 2),
(14, 'Kepuasan terhadap sistem remunerasi yang berlaku di Universitas Catur Insan Cendekia', 8, 2),
(15, 'Mendapat tunjangan sesuai harapan', 8, 2),
(16, 'Pemberian jaminan kesehatan, sosial, dan hari tua', 8, 2),
(17, 'Ketersediaan sarana dan prasarana pendukung kegiatan pembelajaran', 9, 2),
(18, 'Ketersediaan sarana prasarana pendukung kegiatan penelitian dan PKM', 9, 2),
(19, 'Fasilitas untuk pengembangan diri mengikuti kursus, pelatihan, seminar, Workshop, dan studi lanjut', 9, 2),
(20, 'Fasilitas memperoleh informasi dan pelayanan melakukan kegiatan penelitian', 9, 2),
(21, 'Fasilitas memperoleh informasi dan pelayanan melakukan kegiatan PKM', 9, 2),
(22, 'Ketersediaan fasilitas teknologi, informasi dan komunikasi untuk kemudahan pelayanan administrasi dan evaluasi', 9, 2),
(23, 'Ketersediaan jurnal terakreditasi sebagai media publikasi karya ilmiah', 9, 2),
(24, 'Fasilitas layanan untuk kenaikan pangkat (kemudahan untuk mendapatkan informasi dan bimbingan)', 9, 2),
(25, 'Sosialisasi terhadap SOTK (Strukur Organisasi dan Tata Kelola) Universitas Catur Insan Cendekia dilakukan secara efektif dan efisien', 6, 3),
(26, 'Kepuasan bekerja sesuai dengan tugas pokok dan fungsi di Universitas Catur Insan Cendekia', 6, 3),
(27, 'Kejelasan dan kemudahan program kerja yang dijalankan oleh setiap Karyawan di Universitas Catur Insan Cendekia', 6, 3),
(28, 'Kemampuan berkomunikasi dan bekerjasama antara pimpinan dan Karyawan di setiap unit kerja', 6, 3),
(29, 'Kepuasan terhadap kepemimpinan dalam pengelolaan Sumber Daya Manusia', 6, 3),
(30, 'Kepuasan terhadap sinkronisasi kebijakan pimpinan di Universitas Catur Insan Cendekia', 6, 3),
(31, 'Kepuasan terhadap konsistensi penegakan aturan', 6, 3),
(32, 'Kepuasan terhadap keamanan, keselamatan, dan kesehatan kerja di Universitas Catur Insan Cendekia', 6, 3),
(33, 'Pemberian motivasi dan bimbingan untuk pencapaian prestasi kerja', 7, 3),
(34, 'Kesempatan mendapatkan tugas dan beban kerja sesuai dengan bidang keahlian', 7, 3),
(35, 'Kesempatan mengembangan ide/gagasan dan dialog dengan pimpinan', 7, 3),
(36, 'Pemberian penghargaan atas prestasi/kerja yang baik', 7, 3),
(37, 'Pemberian hak-hak untuk kesejahteraan atas pelaksanaan tugas rutin', 7, 3),
(38, 'Kepuasan terhadap sistem remunerasi yang berlaku di Universitas Catur Insan Cendekia', 8, 3),
(39, 'Mendapat tunjangan sesuai harapan', 8, 3),
(40, 'Pemberian jaminan kesehatan, sosial, dan hari tua', 8, 3),
(41, 'Ketersediaan sarana dan prasarana pendukung dalam bekerja di Universitas Catur Insan Cendekia', 9, 3),
(42, 'Kepuasan terhadap suasana kerja di Universitas Catur Insan Cendekia', 9, 3),
(43, 'Fasilitas untuk pengembangan diri mengikuti kursus, pelatihan, seminar, dan pelatihan', 9, 3),
(44, 'Ketersediaan fasilitas teknologi, informasi dan komunikasi untuk kemudahan pelayanan administrasi dan evaluasi', 9, 3),
(45, 'Fasilitas layanan untuk kenaikan pangkat (kemudahan untuk mendapatkan informasi dan bimbingan)', 9, 3),
(46, 'Dosen memulai perkuliahan sesuai waktu yang telah ditentukan', 1, 4),
(47, 'Dosen memulai perkuliahan sesuai waktu yang telah ditentukan', 1, 5),
(48, 'Dosen mengakhiri perkuliahan sesuai waktu yang telah ditentukan', 1, 4),
(49, 'Dosen mengakhiri perkuliahan sesuai waktu yang telah ditentukan', 1, 5),
(50, 'Dosen membuat SAP/RPS, kontrak kuliah, dan aturan perkuliahan yang disampaikan dengan jelas pada pertemuan pertama', 1, 4),
(51, 'Dosen membuat SAP/RPS, kontrak kuliah, dan aturan perkuliahan yang disampaikan dengan jelas pada pertemuan pertama', 1, 5),
(52, 'Dosen membuat dan menyampaikan rencana evaluasi perkuliahan pada pertemuan pertama', 1, 4),
(53, 'Dosen membuat dan menyampaikan rencana evaluasi perkuliahan pada pertemuan pertama', 1, 5),
(54, 'Dosen menyusun dan memberikan bahan ajar untuk materi yang diberikan', 1, 4),
(55, 'Dosen menyusun dan memberikan bahan ajar untuk materi yang diberikan', 1, 5),
(56, 'Dosen selalu membagikan hasil evaluasi dengan nilai yang obyektif', 1, 4),
(57, 'Dosen selalu membagikan hasil evaluasi dengan nilai yang obyektif', 1, 5),
(58, 'Perkuliahan dilaksanakan sesuai dengan jumlah pertemuan yang telah ditentukan (minimal 12 kali pertemuan dan maksimal 14 kali pertemuan)', 1, 4),
(59, 'Perkuliahan dilaksanakan sesuai dengan jumlah pertemuan yang telah ditentukan (minimal 12 kali pertemuan dan maksimal 14 kali pertemuan)', 1, 5),
(60, 'Dosen Pembimbing Akademik (DPA) memberikan pembimbingan konseling yang jelas dan dimengerti', 1, 4),
(61, 'Dosen Pembimbing Akademik (DPA) memberikan pembimbingan konseling yang jelas dan dimengerti', 1, 5),
(62, 'Dosen Pembimbing Proyek/Skripsi/Tugas Akhir memberikan pembimbingan yang jelas dan dimengerti', 1, 4),
(63, 'Dosen Pembimbing Proyek/Skripsi/Tugas Akhir memberikan pembimbingan yang jelas dan dimengerti', 1, 5),
(64, 'Staf BAAK dan BAUK memiliki kemampuan, pengetahuan, dan kecakapan yang tinggi dalam menjalankan tugasnya', 1, 4),
(65, 'Staf BAAK dan BAUK memiliki kemampuan, pengetahuan, dan kecakapan yang tinggi dalam menjalankan tugasnya', 1, 5),
(66, 'Prosedur penyampaian informasi BAAK dan BAUK jelas dan mudah dimengerti', 1, 4),
(67, 'Prosedur penyampaian informasi BAAK dan BAUK jelas dan mudah dimengerti', 1, 5),
(68, 'Staf BAAK dan BAUK selalu ada sesuai jadwal', 1, 4),
(69, 'Staf BAAK dan BAUK selalu ada sesuai jadwal', 1, 5),
(70, 'Informasi yang diberikan BAAK dan BAUK dapat diandalkan', 1, 4),
(71, 'Informasi yang diberikan BAAK dan BAUK dapat diandalkan', 1, 5),
(72, 'Staf Perpustakaan selalu ada sesuai jadwal', 1, 4),
(73, 'Staf Perpustakaan selalu ada sesuai jadwal', 1, 5),
(74, 'Informasi yang diberikan Perpustakaan dapat diandalkan', 1, 4),
(75, 'Informasi yang diberikan Perpustakaan dapat diandalkan', 1, 5),
(76, 'Tenaga teknisi memiliki kemampuan dalam menangani kesalahan perangkat penunjang pembelajaran', 1, 4),
(77, 'Tenaga teknisi memiliki kemampuan dalam menangani kesalahan perangkat penunjang pembelajaran', 1, 5),
(78, 'Dosen mudah ditemui untuk keperluan konsultasi materi kuliah atau laporan', 2, 4),
(79, 'Dosen mudah ditemui untuk keperluan konsultasi materi kuliah atau laporan', 2, 5),
(80, 'Ketanggapan Dosen dalam menjawab pertanyaan dari Mahasiswa', 2, 4),
(81, 'Ketanggapan Dosen dalam menjawab pertanyaan dari Mahasiswa', 2, 5),
(82, 'Ketanggapan Dosen Pembimbing Akademik (DPA) dalam bimbingan konseling/perwalian', 2, 4),
(83, 'Ketanggapan Dosen Pembimbing Akademik (DPA) dalam bimbingan konseling/perwalian', 2, 5),
(84, 'Ketanggapan Dosen Pembimbing Proyek/Skripsi/Tugas Akhir dalam bimbingan', 2, 4),
(85, 'Ketanggapan Dosen Pembimbing Proyek/Skripsi/Tugas Akhir dalam bimbingan', 2, 5),
(86, 'Prosedur pelayanan di BAAK dan BAUK tidak berbelit-belit', 2, 4),
(87, 'Prosedur pelayanan di BAAK dan BAUK tidak berbelit-belit', 2, 5),
(88, 'Proses pelayanan di BAAK dan BAUK cepat dan tepat', 2, 4),
(89, 'Proses pelayanan di BAAK dan BAUK cepat dan tepat', 2, 5),
(90, 'Staf BAAK dan BAUK memberi tanggapan yang cepat dan baik terhadap keluhan anda', 2, 4),
(91, 'Staf BAAK dan BAUK memberi tanggapan yang cepat dan baik terhadap keluhan anda', 2, 5),
(92, 'Prosedur pelayanan di Perpustakaan tidak berbelit-belit', 2, 4),
(93, 'Prosedur pelayanan di Perpustakaan tidak berbelit-belit', 2, 5),
(94, 'Proses pelayanan di Perpustakaan cepat dan tepat', 2, 4),
(95, 'Proses pelayanan di Perpustakaan cepat dan tepat', 2, 5),
(96, 'Kesigapan tenaga penunjang (teknisi/office boy) dalam mengatur ruang kelas sebelum perkuliahan dimulai serta penanganan jika terjadi kerusakan/kesalahan/ketidaksesuaian', 2, 4),
(97, 'Kesigapan tenaga penunjang (teknisi/office boy) dalam mengatur ruang kelas sebelum perkuliahan dimulai serta penanganan jika terjadi kerusakan/kesalahan/ketidaksesuaian', 2, 5),
(98, 'Kesesuaian kurikulum sesuai kebutuhan dunia kerja', 3, 4),
(99, 'Kesesuaian kurikulum sesuai kebutuhan dunia kerja', 3, 5),
(100, 'Keseimbangan materi pembelajaran antara teori dan kasus di dunia nyata', 3, 4),
(101, 'Keseimbangan materi pembelajaran antara teori dan kasus di dunia nyata', 3, 5),
(102, 'Keberagaman mata kuliah pilihan dan atau konsentrasi yang ditawarkan', 3, 4),
(103, 'Keberagaman mata kuliah pilihan dan atau konsentrasi yang ditawarkan', 3, 5),
(104, 'Kemampuan Dosen dalam menggunakan metoda pengajaran (ceramah, diskusi, mengajukan pertanyaan, memberikan contoh, dan lainnya)', 3, 4),
(105, 'Kemampuan Dosen dalam menggunakan metoda pengajaran (ceramah, diskusi, mengajukan pertanyaan, memberikan contoh, dan lainnya)', 3, 5),
(106, 'Kemampuan Dosen menggunakan media pembelajaran (LCD Projector, Papan Tulis, dan media penunjang lainnya) sesuai dengan kebutuhan materi perkuliahan/praktikum', 3, 4),
(107, 'Kemampuan Dosen menggunakan media pembelajaran (LCD Projector, Papan Tulis, dan media penunjang lainnya) sesuai dengan kebutuhan materi perkuliahan/praktikum', 3, 5),
(108, 'Kemampuan Dosen Pembimbing Akademik (DPA) dalam memberikan solusi masalah', 3, 4),
(109, 'Kemampuan Dosen Pembimbing Akademik (DPA) dalam memberikan solusi masalah', 3, 5),
(110, 'Kemampuan Dosen Pembimbing Proyek/Skripsi/Tugas Akhir dalam memberikan solusi materi', 3, 4),
(111, 'Kemampuan Dosen Pembimbing Proyek/Skripsi/Tugas Akhir dalam memberikan solusi materi', 3, 5),
(112, 'Staf BAAK dan BAUK memberikan pelayanan yang memuaskan sesuai kebutuhan', 3, 4),
(113, 'Staf BAAK dan BAUK memberikan pelayanan yang memuaskan sesuai kebutuhan', 3, 5),
(114, 'BAAK dan BAUK memberikan jaminan apabila terjadi kesalahan pada hasil kerjanya', 3, 4),
(115, 'BAAK dan BAUK memberikan jaminan apabila terjadi kesalahan pada hasil kerjanya', 3, 5),
(116, 'BAAK dan BAUK memberikan kemudahan dalam akses pelayanan administrasi akademik', 3, 4),
(117, 'BAAK dan BAUK memberikan kemudahan dalam akses pelayanan administrasi akademik', 3, 5),
(118, 'Staf BAAK dan BAUK memberikan perlakuan yang adil kepada setiap pengguna layanan', 3, 4),
(119, 'Staf BAAK dan BAUK memberikan perlakuan yang adil kepada setiap pengguna layanan', 3, 5),
(120, 'Dosen mudah dihubungi baik melalui telepon, email, dan medsos', 4, 4),
(121, 'Dosen mudah dihubungi baik melalui telepon, email, dan medsos', 4, 5),
(122, 'Dosen bersedia membantu Mahasiswa yang mengalami kesulitan studi', 4, 4),
(123, 'Dosen bersedia membantu Mahasiswa yang mengalami kesulitan studi', 4, 5),
(124, 'Dosen bersikap baik dan bersahabat kepada Mahasiswa', 4, 4),
(125, 'Dosen bersikap baik dan bersahabat kepada Mahasiswa', 4, 5),
(126, 'Staf BAAK dan BAUK bertugas sepenuh hati dalam memberikan pelayanan', 4, 4),
(127, 'Staf BAAK dan BAUK bertugas sepenuh hati dalam memberikan pelayanan', 4, 5),
(128, 'Komunikasi dengan staf BAAK dan BAUK berjalan dengan baik dan lancar', 4, 4),
(129, 'Komunikasi dengan staf BAAK dan BAUK berjalan dengan baik dan lancar', 4, 5),
(130, 'Staf Perpustakaan bertugas sepenuh hati dalam memberikan pelayanan', 4, 4),
(131, 'Staf Perpustakaan bertugas sepenuh hati dalam memberikan pelayanan', 4, 5),
(132, 'Komunikasi dengan staf Perpustakaan berjalan dengan baik dan lancar', 4, 4),
(133, 'Komunikasi dengan staf Perpustakaan berjalan dengan baik dan lancar', 4, 5),
(134, 'Ruang kuliah dan praktikum yang bersih, nyaman, dan rapi', 5, 4),
(135, 'Ruang kuliah dan praktikum yang bersih, nyaman, dan rapi', 5, 5),
(136, 'Sarana pembelajaran yang memadai di ruang kuliah dan praktikum', 5, 4),
(137, 'Sarana pembelajaran yang memadai di ruang kuliah dan praktikum', 5, 5),
(138, 'Sarana bimbingan konseling dan Proyek/Skripsi/Tugas Akhir yang bersih, nyaman, dan rapi', 5, 4),
(139, 'Sarana bimbingan konseling dan Proyek/Skripsi/Tugas Akhir yang bersih, nyaman, dan rapi', 5, 5),
(140, 'Ruang Perpustakaan yang bersih, nyaman, dan rapi', 5, 4),
(141, 'Ruang Perpustakaan yang bersih, nyaman, dan rapi', 5, 5),
(142, 'Sarana ruang Perpustakaan yang memadai', 5, 4),
(143, 'Sarana ruang Perpustakaan yang memadai', 5, 5),
(144, 'Koleksi buku di Perpustakaan mendukung semua mata kuliah', 5, 4),
(145, 'Koleksi buku di Perpustakaan mendukung semua mata kuliah', 5, 5),
(146, 'Ruang pelayanan dan ruang tunggu BAAK dan BAUK yang bersih, nyaman, dan rapi', 5, 4),
(147, 'Ruang pelayanan dan ruang tunggu BAAK dan BAUK yang bersih, nyaman, dan rapi', 5, 5),
(148, 'Sistem Informasi (aplikasi, komputer, dan perangkat penunjangnya lainnya) yang ada di BAAK dan BAUK bekerja dengan baik dan handal', 5, 4),
(149, 'Sistem Informasi (aplikasi, komputer, dan perangkat penunjangnya lainnya) yang ada di BAAK dan BAUK bekerja dengan baik dan handal', 5, 5),
(150, 'Hotspot area yang nyaman dan kemudahan dalam akses jaringan Internet', 5, 4),
(151, 'Hotspot area yang nyaman dan kemudahan dalam akses jaringan Internet', 5, 5),
(152, 'Sarana ruang kegiatan kemahasiswaan yang memadai', 5, 4),
(153, 'Sarana ruang kegiatan kemahasiswaan yang memadai', 5, 5),
(154, 'Sarana toilet yang bersih', 5, 4),
(155, 'Sarana toilet yang bersih', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Dosen'),
(3, 'Kaprodi'),
(4, 'Mahasiswa'),
(5, 'Pengguna Umum');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` int NOT NULL,
  `nama` varchar(256) NOT NULL,
  `prodi` varchar(40) NOT NULL,
  `jenjang` varchar(40) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `id_level` int NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `username`, `password`, `nama`, `prodi`, `jenjang`, `foto`, `id_level`, `level`) VALUES
(12, '220102037', 220102037, 'Ilham Munawar', 'D3-Teknik Informatika', 'D3', 'default.png', 4, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int NOT NULL,
  `semester` varchar(20) NOT NULL,
  `tahun_akademik` varchar(30) NOT NULL,
  `keterangan` varchar(400) NOT NULL,
  `isaktif` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `semester`, `tahun_akademik`, `keterangan`, `isaktif`) VALUES
(1, 'Genap', '2019/2020', 'Pengisian Kuesioner Layanan Manajemen Universitas Catur Insan Cendekia', 'true'),
(2, 'Ganjil', '2020/2021', 'Pengisian Kuesioner Layanan Manajemen Universitas Catur Insan Cendekia', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id_respon` int NOT NULL,
  `id_periode` int NOT NULL,
  `id_kuesioner` int NOT NULL,
  `id_aspek` int NOT NULL,
  `typeaspek` enum('akademik','kelola') NOT NULL,
  `username` varchar(30) NOT NULL,
  `jawabanHarapan` varchar(2) NOT NULL,
  `harapanK` int NOT NULL,
  `harapanC` int NOT NULL,
  `harapanB` int NOT NULL,
  `harapanSB` int NOT NULL,
  `jawabanKenyataan` varchar(2) NOT NULL,
  `kenyataanK` int NOT NULL,
  `kenyataanC` int NOT NULL,
  `kenyataanB` int NOT NULL,
  `kenyataanSB` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respon`
--

INSERT INTO `respon` (`id_respon`, `id_periode`, `id_kuesioner`, `id_aspek`, `typeaspek`, `username`, `jawabanHarapan`, `harapanK`, `harapanC`, `harapanB`, `harapanSB`, `jawabanKenyataan`, `kenyataanK`, `kenyataanC`, `kenyataanB`, `kenyataanSB`) VALUES
(1, 2, 1, 6, 'kelola', '427077804', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(2, 2, 2, 6, 'kelola', '427077804', '2', 0, 1, 0, 0, '2', 0, 1, 0, 0),
(3, 2, 3, 6, 'kelola', '427077804', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(4, 2, 4, 6, 'kelola', '427077804', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(5, 2, 5, 6, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(6, 2, 6, 6, 'kelola', '427077804', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(7, 2, 7, 6, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(8, 2, 8, 6, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(9, 2, 9, 7, 'kelola', '427077804', '2', 0, 1, 0, 0, '2', 0, 1, 0, 0),
(10, 2, 10, 7, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(11, 2, 11, 7, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(12, 2, 12, 7, 'kelola', '427077804', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(13, 2, 13, 7, 'kelola', '427077804', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(14, 2, 14, 8, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(15, 2, 15, 8, 'kelola', '427077804', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(16, 2, 16, 8, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(17, 2, 17, 9, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(18, 2, 18, 9, 'kelola', '427077804', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(19, 2, 19, 9, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(20, 2, 20, 9, 'kelola', '427077804', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(21, 2, 21, 9, 'kelola', '427077804', '1', 1, 0, 0, 0, '2', 0, 1, 0, 0),
(22, 2, 22, 9, 'kelola', '427077804', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(23, 2, 23, 9, 'kelola', '427077804', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(24, 2, 24, 9, 'kelola', '427077804', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(25, 2, 1, 6, 'kelola', '401037601', '2', 0, 1, 0, 0, '3', 0, 0, 1, 0),
(26, 2, 2, 6, 'kelola', '401037601', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(27, 2, 3, 6, 'kelola', '401037601', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(28, 2, 4, 6, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(29, 2, 5, 6, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(30, 2, 6, 6, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(31, 2, 7, 6, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(32, 2, 8, 6, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(33, 2, 9, 7, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(34, 2, 10, 7, 'kelola', '401037601', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(35, 2, 11, 7, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(36, 2, 12, 7, 'kelola', '401037601', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(37, 2, 13, 7, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(38, 2, 14, 8, 'kelola', '401037601', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(39, 2, 15, 8, 'kelola', '401037601', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(40, 2, 16, 8, 'kelola', '401037601', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(41, 2, 17, 9, 'kelola', '401037601', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(42, 2, 18, 9, 'kelola', '401037601', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(43, 2, 19, 9, 'kelola', '401037601', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(44, 2, 20, 9, 'kelola', '401037601', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(45, 2, 21, 9, 'kelola', '401037601', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(46, 2, 22, 9, 'kelola', '401037601', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(47, 2, 23, 9, 'kelola', '401037601', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(48, 2, 24, 9, 'kelola', '401037601', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(49, 2, 25, 6, 'kelola', '2016102038', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(50, 2, 26, 6, 'kelola', '2016102038', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(51, 2, 27, 6, 'kelola', '2016102038', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(52, 2, 28, 6, 'kelola', '2016102038', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(53, 2, 29, 6, 'kelola', '2016102038', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(54, 2, 30, 6, 'kelola', '2016102038', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(55, 2, 31, 6, 'kelola', '2016102038', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(56, 2, 32, 6, 'kelola', '2016102038', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(57, 2, 33, 7, 'kelola', '2016102038', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(58, 2, 34, 7, 'kelola', '2016102038', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(59, 2, 35, 7, 'kelola', '2016102038', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(60, 2, 36, 7, 'kelola', '2016102038', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(61, 2, 37, 7, 'kelola', '2016102038', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(62, 2, 38, 8, 'kelola', '2016102038', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(63, 2, 39, 8, 'kelola', '2016102038', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(64, 2, 40, 8, 'kelola', '2016102038', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(65, 2, 41, 9, 'kelola', '2016102038', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(66, 2, 42, 9, 'kelola', '2016102038', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(67, 2, 43, 9, 'kelola', '2016102038', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(68, 2, 44, 9, 'kelola', '2016102038', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(69, 2, 45, 9, 'kelola', '2016102038', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(70, 2, 47, 1, 'akademik', 'amri', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(71, 2, 49, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(72, 2, 51, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(73, 2, 53, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(74, 2, 55, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(75, 2, 57, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(76, 2, 59, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(77, 2, 61, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(78, 2, 63, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(79, 2, 65, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(80, 2, 67, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(81, 2, 69, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(82, 2, 71, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(83, 2, 73, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(84, 2, 75, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(85, 2, 77, 1, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(86, 2, 79, 2, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(87, 2, 81, 2, 'akademik', 'amri', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(88, 2, 83, 2, 'akademik', 'amri', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(89, 2, 85, 2, 'akademik', 'amri', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(90, 2, 87, 2, 'akademik', 'amri', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(91, 2, 89, 2, 'akademik', 'amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(92, 2, 91, 2, 'akademik', 'amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(93, 2, 93, 2, 'akademik', 'amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(94, 2, 95, 2, 'akademik', 'amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(95, 2, 97, 2, 'akademik', 'amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(96, 2, 99, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(97, 2, 101, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(98, 2, 103, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(99, 2, 105, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(100, 2, 107, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(101, 2, 109, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(102, 2, 111, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(103, 2, 113, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(104, 2, 115, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(105, 2, 117, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(106, 2, 119, 3, 'akademik', 'amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(107, 2, 121, 4, 'akademik', 'amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(108, 2, 123, 4, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(109, 2, 125, 4, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(110, 2, 127, 4, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(111, 2, 129, 4, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(112, 2, 131, 4, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(113, 2, 133, 4, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(114, 2, 135, 5, 'akademik', 'amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(115, 2, 137, 5, 'akademik', 'amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(116, 2, 139, 5, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(117, 2, 141, 5, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(118, 2, 143, 5, 'akademik', 'amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(119, 2, 145, 5, 'akademik', 'amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(120, 2, 147, 5, 'akademik', 'amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(121, 2, 149, 5, 'akademik', 'amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(122, 2, 151, 5, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(123, 2, 153, 5, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(124, 2, 155, 5, 'akademik', 'amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(125, 2, 46, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(126, 2, 48, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(127, 2, 50, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(128, 2, 52, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(129, 2, 54, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(130, 2, 56, 1, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(131, 2, 58, 1, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(132, 2, 60, 1, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(133, 2, 62, 1, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(134, 2, 64, 1, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(135, 2, 66, 1, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(136, 2, 68, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(137, 2, 70, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(138, 2, 72, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(139, 2, 74, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(140, 2, 76, 1, 'akademik', '2016102036', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(141, 2, 78, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(142, 2, 80, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(143, 2, 82, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(144, 2, 84, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(145, 2, 86, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(146, 2, 88, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(147, 2, 90, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(148, 2, 92, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(149, 2, 94, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(150, 2, 96, 2, 'akademik', '2016102036', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(151, 2, 98, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(152, 2, 100, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(153, 2, 102, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(154, 2, 104, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(155, 2, 106, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(156, 2, 108, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(157, 2, 110, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(158, 2, 112, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(159, 2, 114, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(160, 2, 116, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(161, 2, 118, 3, 'akademik', '2016102036', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(162, 2, 120, 4, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(163, 2, 122, 4, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(164, 2, 124, 4, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(165, 2, 126, 4, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(166, 2, 128, 4, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(167, 2, 130, 4, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(168, 2, 132, 4, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(169, 2, 134, 5, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(170, 2, 136, 5, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(171, 2, 138, 5, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(172, 2, 140, 5, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(173, 2, 142, 5, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(174, 2, 144, 5, 'akademik', '2016102036', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(175, 2, 146, 5, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(176, 2, 148, 5, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(177, 2, 150, 5, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(178, 2, 152, 5, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(179, 2, 154, 5, 'akademik', '2016102036', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(180, 1, 47, 1, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(181, 1, 49, 1, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(182, 1, 51, 1, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(183, 1, 53, 1, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(184, 1, 55, 1, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(185, 1, 57, 1, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(186, 1, 59, 1, 'akademik', 'Haevah Reza Amri', '2', 0, 1, 0, 0, '4', 0, 0, 0, 1),
(187, 1, 61, 1, 'akademik', 'Haevah Reza Amri', '2', 0, 1, 0, 0, '4', 0, 0, 0, 1),
(188, 1, 63, 1, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(189, 1, 65, 1, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(190, 1, 67, 1, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(191, 1, 69, 1, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(192, 1, 71, 1, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(193, 1, 73, 1, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(194, 1, 75, 1, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(195, 1, 77, 1, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(196, 1, 79, 2, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(197, 1, 81, 2, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(198, 1, 83, 2, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(199, 1, 85, 2, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(200, 1, 87, 2, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(201, 1, 89, 2, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(202, 1, 91, 2, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(203, 1, 93, 2, 'akademik', 'Haevah Reza Amri', '1', 1, 0, 0, 0, '4', 0, 0, 0, 1),
(204, 1, 95, 2, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(205, 1, 97, 2, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(206, 1, 99, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(207, 1, 101, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(208, 1, 103, 3, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(209, 1, 105, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(210, 1, 107, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(211, 1, 109, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(212, 1, 111, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(213, 1, 113, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(214, 1, 115, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(215, 1, 117, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(216, 1, 119, 3, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(217, 1, 121, 4, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(218, 1, 123, 4, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(219, 1, 125, 4, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(220, 1, 127, 4, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(221, 1, 129, 4, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(222, 1, 131, 4, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(223, 1, 133, 4, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(224, 1, 135, 5, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(225, 1, 137, 5, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(226, 1, 139, 5, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(227, 1, 141, 5, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(228, 1, 143, 5, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '4', 0, 0, 0, 1),
(229, 1, 145, 5, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(230, 1, 147, 5, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '1', 1, 0, 0, 0),
(231, 1, 149, 5, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(232, 1, 151, 5, 'akademik', 'Haevah Reza Amri', '4', 0, 0, 0, 1, '3', 0, 0, 1, 0),
(233, 1, 153, 5, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(234, 1, 155, 5, 'akademik', 'Haevah Reza Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(235, 1, 47, 1, 'akademik', 'Amri', '2', 0, 1, 0, 0, '1', 1, 0, 0, 0),
(236, 1, 49, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(237, 1, 51, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(238, 1, 53, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(239, 1, 55, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(240, 1, 57, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(241, 1, 59, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(242, 1, 61, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(243, 1, 63, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(244, 1, 65, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(245, 1, 67, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(246, 1, 69, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(247, 1, 71, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(248, 1, 73, 1, 'akademik', 'Amri', '2', 0, 1, 0, 0, '2', 0, 1, 0, 0),
(249, 1, 75, 1, 'akademik', 'Amri', '4', 0, 0, 0, 1, '2', 0, 1, 0, 0),
(250, 1, 77, 1, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(251, 1, 79, 2, 'akademik', 'Amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(252, 1, 81, 2, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(253, 1, 83, 2, 'akademik', 'Amri', '2', 0, 1, 0, 0, '2', 0, 1, 0, 0),
(254, 1, 85, 2, 'akademik', 'Amri', '2', 0, 1, 0, 0, '2', 0, 1, 0, 0),
(255, 1, 87, 2, 'akademik', 'Amri', '2', 0, 1, 0, 0, '1', 1, 0, 0, 0),
(256, 1, 89, 2, 'akademik', 'Amri', '2', 0, 1, 0, 0, '1', 1, 0, 0, 0),
(257, 1, 91, 2, 'akademik', 'Amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(258, 1, 93, 2, 'akademik', 'Amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(259, 1, 95, 2, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(260, 1, 97, 2, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(261, 1, 99, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(262, 1, 101, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(263, 1, 103, 3, 'akademik', 'Amri', '2', 0, 1, 0, 0, '1', 1, 0, 0, 0),
(264, 1, 105, 3, 'akademik', 'Amri', '2', 0, 1, 0, 0, '3', 0, 0, 1, 0),
(265, 1, 107, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(266, 1, 109, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(267, 1, 111, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(268, 1, 113, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(269, 1, 115, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(270, 1, 117, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(271, 1, 119, 3, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(272, 1, 121, 4, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(273, 1, 123, 4, 'akademik', 'Amri', '3', 0, 0, 1, 0, '1', 1, 0, 0, 0),
(274, 1, 125, 4, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(275, 1, 127, 4, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(276, 1, 129, 4, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(277, 1, 131, 4, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(278, 1, 133, 4, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(279, 1, 135, 5, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0),
(280, 1, 137, 5, 'akademik', 'Amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(281, 1, 139, 5, 'akademik', 'Amri', '3', 0, 0, 1, 0, '4', 0, 0, 0, 1),
(282, 1, 141, 5, 'akademik', 'Amri', '2', 0, 1, 0, 0, '4', 0, 0, 0, 1),
(283, 1, 143, 5, 'akademik', 'Amri', '2', 0, 1, 0, 0, '3', 0, 0, 1, 0),
(284, 1, 145, 5, 'akademik', 'Amri', '2', 0, 1, 0, 0, '3', 0, 0, 1, 0),
(285, 1, 147, 5, 'akademik', 'Amri', '2', 0, 1, 0, 0, '3', 0, 0, 1, 0),
(286, 1, 149, 5, 'akademik', 'Amri', '2', 0, 1, 0, 0, '2', 0, 1, 0, 0),
(287, 1, 151, 5, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(288, 1, 153, 5, 'akademik', 'Amri', '3', 0, 0, 1, 0, '2', 0, 1, 0, 0),
(289, 1, 155, 5, 'akademik', 'Amri', '3', 0, 0, 1, 0, '3', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `umum`
--

CREATE TABLE `umum` (
  `id` int NOT NULL,
  `username` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `id_level` int NOT NULL,
  `level` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `umum`
--

INSERT INTO `umum` (`id`, `username`, `nama`, `institusi`, `jabatan`, `bagian`, `foto`, `id_level`, `level`) VALUES
(1, 'amri', 'amri', '', '', 'ortu', 'default.png', 5, 'Pengguna Umum'),
(2, 'amri', 'amri', '', '', 'lainnya', 'default.png', 5, 'Pengguna Umum'),
(3, 'Haevah Reza Amri', 'Haevah Reza Amri', '', '', 'lainnya', 'default.png', 5, 'Pengguna Umum'),
(4, 'Haevah Reza Amri', 'Haevah Reza Amri', '', '', 'lainnya', 'default.png', 5, 'Pengguna Umum'),
(5, 'Haevah Reza Amri', 'Haevah Reza Amri', '', '', 'lainnya', 'default.png', 5, 'Pengguna Umum'),
(6, 'Haevah Reza Amri', 'Haevah Reza Amri', '', '', 'lainnya', 'default.png', 5, 'Pengguna Umum'),
(7, 'Haevah Reza Amri', 'Haevah Reza Amri', '', '', 'lainnya', 'default.png', 5, 'Pengguna Umum'),
(8, 'Haevah Reza Amri', 'Haevah Reza Amri', '', '', 'ortu', 'default.png', 5, 'Pengguna Umum'),
(9, 'Ulfatun', 'Ulfatun', '', '', 'ortu', 'default.png', 5, 'Pengguna Umum'),
(10, 'Haevah Reza Amri', 'Haevah Reza Amri', '', '', 'lainnya', 'default.png', 5, 'Pengguna Umum'),
(11, 'Amri', 'Amri', '', '', 'ortu', 'default.png', 5, 'Pengguna Umum'),
(12, 'haevah', 'haevah', '', '', 'ortu', 'default.png', 5, 'Pengguna Umum'),
(13, 'aku', 'aku', 'aku', 'aku', 'ortu', 'default.png', 5, 'Pengguna Umum'),
(14, 'adas', 'adas', 'ads', 'adsa', 'ortu', 'default.png', 5, 'Pengguna Umum');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_total_akademik`
-- (See below for the actual view)
--
CREATE TABLE `v_total_akademik` (
`user_a` varchar(20)
,`user_b` varchar(256)
,`level_a` int
,`level_b` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_total_kelola`
-- (See below for the actual view)
--
CREATE TABLE `v_total_kelola` (
`username` varchar(30)
,`total` bigint
,`semester` varchar(20)
,`ta` varchar(30)
,`bagian` varchar(50)
,`id_level` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_total_respon`
-- (See below for the actual view)
--
CREATE TABLE `v_total_respon` (
`username` varchar(30)
,`total` bigint
,`semester` varchar(20)
,`ta` varchar(30)
,`bagian` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_total_akademik`
--
DROP TABLE IF EXISTS `v_total_akademik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_akademik`  AS SELECT `a`.`username` AS `user_a`, `b`.`username` AS `user_b`, `a`.`id_level` AS `level_a`, `b`.`id_level` AS `level_b` FROM (`mahasiswa` `a` join `umum` `b`)  ;

-- --------------------------------------------------------

--
-- Structure for view `v_total_kelola`
--
DROP TABLE IF EXISTS `v_total_kelola`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_kelola` AS
SELECT
    `a`.`username` AS `username`,
    COUNT(DISTINCT `a`.`username`) AS `total`,
    `b`.`semester` AS `semester`,
    `b`.`tahun_akademik` AS `ta`,
    `c`.`level` AS `bagian`,
    `d`.`id_level` AS `id_level`
FROM
    ((`respon` `a`
    LEFT JOIN `periode` `b` ON `b`.`id_periode` = `a`.`id_periode`)
    JOIN `dosen_staf` `d` ON `d`.`username` = `a`.`username`)
    JOIN `level` `c` ON `c`.`id_level` = `d`.`id_level`
GROUP BY
    `d`.`id_level`; -- Penyesuaian backtick ada di sini

-- --------------------------------------------------------

--
-- Structure for view `v_total_respon`
--
DROP TABLE IF EXISTS `v_total_respon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_respon` AS 
SELECT 
    `a`.`username` AS `username`, 
    COUNT(DISTINCT `a`.`username`) AS `total`, 
    `b`.`semester` AS `semester`, 
    `b`.`tahun_akademik` AS `ta`, 
    `c`.`level` AS `bagian` 
FROM 
    `respon` `a` 
    LEFT JOIN `periode` `b` ON `b`.`id_periode` = `a`.`id_periode` 
    JOIN `dosen_staf` `d` ON `d`.`username` = `a`.`username` 
    JOIN `level` `c` ON `c`.`id_level` = `d`.`id_level` 
GROUP BY 
    `c`.`id_level`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `admin_ibfk_1` (`id_level`);

--
-- Indexes for table `aspek`
--
ALTER TABLE `aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `dosen_staf`
--
ALTER TABLE `dosen_staf`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id_respon`);

--
-- Indexes for table `umum`
--
ALTER TABLE `umum`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aspek`
--
ALTER TABLE `aspek`
  MODIFY `id_aspek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dosen_staf`
--
ALTER TABLE `dosen_staf`
  MODIFY `username` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT for table `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id_kuesioner` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `respon`
--
ALTER TABLE `respon`
  MODIFY `id_respon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `umum`
--
ALTER TABLE `umum`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
