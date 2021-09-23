-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 10:51 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskesos`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengenalan_tempat`
--

CREATE TABLE `pengenalan_tempat` (
  `id_pengenalan` int(20) NOT NULL,
  `nama_responden` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nokk` varchar(20) NOT NULL,
  `no_telepon` int(50) NOT NULL,
  `nama_kk` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_pendata` varchar(50) NOT NULL,
  `nama_pengawas` varchar(50) NOT NULL,
  `tanggal_pendataan` varchar(50) NOT NULL,
  `lampiran` varchar(128) NOT NULL,
  `keluarga` int(8) NOT NULL,
  `kesehatan` int(8) NOT NULL,
  `ekonomi` int(8) NOT NULL,
  `lingkungan` int(8) NOT NULL,
  `pekerjaan_tetap` int(8) NOT NULL,
  `catatan_kepolisian` int(8) NOT NULL,
  `tempat_tinggal` int(8) NOT NULL,
  `korban_bencana` int(8) NOT NULL,
  `menikah` int(8) NOT NULL,
  `hasil_pmks` int(30) NOT NULL,
  `konfirmasi_pmks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengenalan_tempat`
--

INSERT INTO `pengenalan_tempat` (`id_pengenalan`, `nama_responden`, `tempat_lahir`, `tanggal_lahir`, `usia`, `nik`, `nokk`, `no_telepon`, `nama_kk`, `alamat`, `nama_pendata`, `nama_pengawas`, `tanggal_pendataan`, `lampiran`, `keluarga`, `kesehatan`, `ekonomi`, `lingkungan`, `pekerjaan_tetap`, `catatan_kepolisian`, `tempat_tinggal`, `korban_bencana`, `menikah`, `hasil_pmks`, `konfirmasi_pmks`) VALUES
(164, 'User 6', 'bandung', '0000-00-00', 19, '', '', 823111, 'Deddy Somantri', 'asd', 'Mitra PMKS', 'Ketua', '2021-09-17', '', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_proposal` varchar(50) NOT NULL,
  `nama_organisasi` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `asal_sekolah` varchar(120) NOT NULL,
  `tempat_tgllahir` varchar(120) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `dtks` varchar(20) NOT NULL,
  `keperluan` varchar(20) NOT NULL,
  `konfirmasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `nama`, `nama_proposal`, `nama_organisasi`, `jenis_kelamin`, `nis`, `nisn`, `alamat`, `foto`, `asal_sekolah`, `tempat_tgllahir`, `agama`, `tujuan`, `dtks`, `keperluan`, `konfirmasi`) VALUES
(77, 'Nizar M Ilham', 'Pendidikan', 'Bidang Pendidikan', 'Laki-Laki', '3204111205720001', '3204110804058263', 'qwe', 'a581ecb8fbe7afa91976267ec883967b.png', 'SMAN 4 CImahi', 'qwe', 'Islam', 'qwe', '3204180005001110', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nama_organisasi` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `nama_organisasi`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'Ketua', 'Ketua', 'ketua@gmail.com', 'profile-min.jpg', '$2y$10$GBk34i4NLAmPdpP1kUzLRejnj81MUj4U2792LR/CVWTS9n1ogBYWC', 1, 1, 1594757167),
(3, 'Mitra PMKS', 'Mitra PMKS', 'mitrapmks@gmail.com', 'default.jpg', '$2y$10$EeCwo5MrtTrZuT2TvC7u2uNsGdsomM8lIfaEFtnCFm7bUL/gLAsJa', 2, 1, 1594757568),
(7, 'Bidang Pendidikan', 'Bidang Pendidikan', 'pendidikan@gmail.com', 'default.jpg', '$2y$10$YqAaLoAB7EokgQlCAHnO0eJvnsruTkpFBOZ4IPjGNIrxe92FEm6ZK', 3, 1, 1595049889),
(8, 'Bidang Kesehatan', 'Bidang Kesehatan', 'kesehatan@gmail.com', 'default.jpg', '$2y$10$aWj9QbUQFvcnfgAXGjrwAuEpP7Fbhf5BHDDuvKcWEziWCiBF4JvHq', 4, 1, 1595058788),
(9, 'Bidang Sosial &  Ekonomi', 'Bidang Sosial', 'sosialekonomi@gmail.com', 'aa.jpg', '$2y$10$EQjT3Ugcv1keDftvwUHdl.ZV21cipOE/rtBtFHV/2uzjjo9Dz.ZDi', 5, 1, 1595058990);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(8, 1, 4),
(13, 3, 2),
(14, 4, 2),
(15, 5, 2),
(21, 5, 7),
(31, 3, 10),
(32, 4, 11),
(51, 2, 12),
(58, 1, 15),
(60, 5, 16),
(61, 1, 17),
(63, 3, 13),
(64, 4, 14),
(70, 1, 12),
(71, 1, 13),
(72, 1, 14),
(73, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'Pengajuan'),
(12, 'PMKS'),
(13, 'Pendidikan'),
(14, 'Kesehatan'),
(16, 'Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Ketua'),
(2, 'Mitra PMKS'),
(3, 'Bidang Pendidikan'),
(4, 'Bidang Kesehatan'),
(5, 'Bidang Sosial & Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(5, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(6, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(7, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 1, 'User list', 'admin/adduserlist', 'fas fa-fw fa-user-plus', 1),
(11, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(39, 1, 'Kelola Hasil PMKS', 'admin/kelolahasilpmks', 'fas fa-fw fa-folder-open', 1),
(40, 1, 'Laporan PMKS', 'admin/laporanpmks', 'fas fa-fw fa-folder-open', 1),
(41, 1, 'Kelola Hasil Pengajuan', 'admin/kelolahasilpengajuan', 'fas fa-fw fa-folder-open', 1),
(42, 1, 'Laporan Pengajuan', 'admin/laporanpengajuan', 'fas fa-fw fa-folder-open', 1),
(44, 12, 'Laporan Mitra PMKS', 'pmks/laporanmitrapmks', 'fas fa-fw fa-folder-open', 1),
(45, 13, 'Proposal Pendidikan', 'pendidikan', 'fas fa-fw fa-folder-open', 1),
(47, 13, 'Laporan Pendidikan', 'pendidikan/laporankeluhan', 'fas fa-fw fa-folder-open', 1),
(48, 14, 'Proposal Kesehatan', 'kesehatan', 'fas fa-fw fa-folder-open', 1),
(49, 14, 'Laporan Kesehatan', 'kesehatan/laporankeluhankesehatan', 'fas fa-fw fa-folder-open', 1),
(54, 15, 'Pengajuan Proposal', 'sosialdanekonomi', 'fas fa-fw fa-folder-open', 1),
(55, 16, 'Proposal Sosial', 'sosial', 'fas fa-fw fa-folder-open', 1),
(56, 16, 'Laporan Sosial', 'sosial/laporankeluhansosial', 'fas fa-fw fa-folder-open', 1),
(57, 12, 'Klasifikasi PMKS', 'pmks/klasifikasi', 'fas fa-fw fa-user-tie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'jualakunrps@gmail.com', 'qd1LnorgWqUED1I+/S0c9ELfPsz537x7SkgzBI1QRBo=', 1595049780),
(5, 'jualakunrps@gmail.com', 'nDyyE3p/aOzhzsAFHNTk19aG3NBN67/b6Zds2YdWiPc=', 1595049889),
(6, 'jualakunrps@gmail.com', '9rTtdY45xG7L7GLgvT9nt1CF1k4zb/n1LhT6JQs5gEw=', 1595057561),
(7, 'rona@gmail.com', 'Yh+86GTWLYNIiYXki3W43LIqiWWzyUgRX59FhHahgFE=', 1595058788),
(8, 'roni@gmail.com', 'voz/gaBAqgCmXtabET6smZFgMLBBV0JBQ6Ec9LVBMDw=', 1595058990),
(9, 'nizar@gmail.com', 'tmDuf1QIceYP/j1pMek6NsUJn4dC5ug55X9sJhKAOws=', 1595059432),
(10, 'dian1@gmail.com', 'qYKNUCKk/5HagOc9FbbBD4yrzh6pK28CgWEo9boQLOc=', 1595343257),
(11, 'dian3@gmail.com', '4JaUQ98Yg9ir3iKM3m9cS3x+0pcBch8JRtFTqABGF8E=', 1595343279),
(12, 'nizar@gmail.com', '5oT2QM7qCoLohhQnlmrpJe87NfJDZ7gGxvzKCTm0TWk=', 1595441572),
(13, 'nizar@gmail.com', 'UAsUsuIig8vVDy8ip/FOhzmamuYkTzqUWtuvO9mBgKM=', 1595441628),
(14, 'fzl@gmail.com', 'a+C/OXZ+31MZMHAcmy2AguSG3RvEiHy9w5sM00tVzIY=', 1595613421),
(15, 'fzl@gmail.com', 'Bjnjv210cIyVKdeHDh24ioQUDHPV5Ks4wnSxcPm+ft0=', 1595613466),
(16, 'jualakun1rps@gmail.com', 'ty5/PO67lxsbCFpiP7zo0zwz/sFawguxkasK2P5Fth0=', 1597596529),
(17, 'nizaar@gmail.com', 'CZqa/eM8s3opw90FlpKJQ5n6tBVCD1AXgGIxkSMfBjo=', 1597689360),
(18, 'rikakiparnandos@gmail.com', 'YSXPYxk41MH8VY6yandxlvWiAJVHgNn0MlzOuCVloLg=', 1597689442),
(19, 'ronaarenaldi@gmail.com', 'HiHJULyOqWt8e8S8pMAdJse6Rajrk0wCmNbXxnUB0jo=', 1597689541),
(20, 'nizaraaa@gmail.com', 'l5WsGnuEy1Sebf7wXeFo6ljmbBPgSUUSgm+6yVXkkwQ=', 1597946499),
(21, 'rizal@gmail.com', 'F99M393zO/4aZ/bbiogE+7fXrRGWbxM6gEZFYIrL5PQ=', 1598445828),
(23, 'rikiparnandos@gmail.com', 'F1u+u/8pOY+lvgKNspP/coolMDOlKJ0JHqvuo9puMKg=', 1598871574),
(27, 'coba@gmail.com', 'oVex1XIIp3cUwvjbskoQurajM7P5b2NiT3x86TvBNhQ=', 1598999837),
(29, 'parti@gmail.com', 'GmxMUkljpdn+N13gvRQljB8s/GSKOZdzJDOHss4cfwc=', 1600118655),
(30, 'parti@gmail.com', 'oDogAN9AIQzLSfyndz2TLgxpo3PkSjg/dsdwFacgjPs=', 1600118926),
(31, 'rikiparnandos@gmail.com', 'm09v6sHqrNs4/NA3VdtuiGPKzCKvMoHp6DqzQPX8jzM=', 1600119617),
(32, 'rikiparnandos@gmail.com', 'QskJTBUeJBf1WZHuMI4Gmh+81GfQGiWiphsfahZr3CY=', 1600119694),
(33, 'rikiparnandos@gmail.com', 'vdu1LRkbEq+nf1D2W07aoCKyjKA0V5B+HNnBGs2Td0c=', 1600119804),
(34, 'raawa@gmail.com', 'FjfTO3vSroJbCoe54/xrLSNpaX7cUmCagtXXL2WcCVw=', 1600120068),
(35, 'asasa@gmail.com', 'cNT6ylJJSk3wwWiupWNzrXAnlYiQxJ+tlv28AzkqJX8=', 1627155471),
(36, 'aaa@gmail.com', 'BO2+DtdKPT+JuwMAIlzj1GWdHPjChIVNiLl7zq4wpvw=', 1627156230),
(37, 'aaaa@gmail.com', 'DVwH6EgInVlkEqZyxJn6fbiIHhcWt/q7Ysc51MAGBH8=', 1627156351);

-- --------------------------------------------------------

--
-- Table structure for table `usia`
--

CREATE TABLE `usia` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usia`
--

INSERT INTO `usia` (`id`, `value`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(91, 91),
(92, 92),
(93, 93),
(94, 94),
(95, 95),
(96, 96),
(97, 97),
(98, 98),
(99, 99),
(100, 100),
(101, 101),
(102, 102),
(103, 103),
(104, 104),
(105, 105),
(106, 106),
(107, 107),
(108, 108),
(109, 109),
(110, 110),
(111, 111),
(112, 112),
(113, 113),
(114, 114),
(115, 115),
(116, 116),
(117, 117),
(118, 118),
(119, 119),
(120, 120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengenalan_tempat`
--
ALTER TABLE `pengenalan_tempat`
  ADD PRIMARY KEY (`id_pengenalan`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usia`
--
ALTER TABLE `usia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengenalan_tempat`
--
ALTER TABLE `pengenalan_tempat`
  MODIFY `id_pengenalan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `usia`
--
ALTER TABLE `usia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
