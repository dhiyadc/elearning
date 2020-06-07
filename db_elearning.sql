-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 04:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `no_telepon`, `password`) VALUES
('admin@elearning.com', '081278220370', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_user` varchar(64) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `foto` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_user`, `nama`, `no_telepon`, `foto`, `deskripsi`) VALUES
('3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'Arya Pradata', '081278220370', '', ''),
('5xUR4mnMETQZ8OmWsYwkDw1NBH2z0cTVLsO8DLuRkpXSQoUKQu8Q4uWyeUUox2EJ', 'Aaron Cranston', '1284831983', '', ''),
('AORFhHgQkBDCZiJZcSTxQxPVgAsnrcvI32rfqZT11YM5N7WG2dfFybRCcF0YwD6o', 'Ricardo Adocicados', '983228390', '', ''),
('b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'Dice', '0812', '71779706_448094602754019_6167635517203967163_n.jpg', 'nama saya isan'),
('jybs0xGSI5ZWrRLnjb34qSf7PsxSHp2fMAghq4y9MA8j20E48bB6xUj9jPfTXdwI', 'Hanari Carnes', '982302831039', '', ''),
('pTithyQiH1fYF5fOjETFtMblWqqsfbv9V56o3pC4JFNM617ULFmTchAfK7JCMbDp', 'Wilman Kala', '231231233', '', ''),
('s4blnpXLSs4GWELe5YM6GrJV4m6r7m8fUCsEZq8zuqXpDNnnDwniMLKt1si675HC', 'Ernst Handel', '8723827382', '', ''),
('upDwiQ8hLclcFG3pvaNQNIbnTtzIq7V8ZXQj5xjtqBjq2eh4mvUOYzBVTRMszlTZ', 'fbgfv', '24', '', ''),
('ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Dhiya Calista', '0812', 'WhatsApp_Image_2020-01-30_at_21_00_32.jpeg', 'nama saya dhiya');

-- --------------------------------------------------------

--
-- Table structure for table `harga_kelas`
--

CREATE TABLE `harga_kelas` (
  `id_kelas` varchar(64) NOT NULL,
  `harga_kelas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga_kelas`
--

INSERT INTO `harga_kelas` (`id_kelas`, `harga_kelas`) VALUES
('5ebb7cc297b3d', '0'),
('5ebba0beda10c', '0'),
('5ebba0d1b8a50', '0'),
('5ebbb8094dfbe', '0'),
('5ebbb83bef31e', '0'),
('5ebfd9f07b9e3', '400000'),
('5ebffb1f05953', '0'),
('5ebfff829cf5d', '0'),
('5ec0000979ed7', '0'),
('5ec00363a7372', '0'),
('5ec004a41a8e9', '100000'),
('5eca8fcd66d7d', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kegiatan`
--

CREATE TABLE `jadwal_kegiatan` (
  `id_kegiatan` varchar(64) NOT NULL,
  `id_kelas` varchar(64) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `tanggal_kegiatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kegiatan`
--

INSERT INTO `jadwal_kegiatan` (`id_kegiatan`, `id_kelas`, `deskripsi_kegiatan`, `tanggal_kegiatan`, `status_kegiatan`) VALUES
('5ebb7cc2a60e9', '5ebb7cc297b3d', 'sdsd', '2020-05-13 09:02:59', 1),
('5ebba0bf0edf9', '5ebba0beda10c', '', '2020-05-22 08:00:37', 2),
('5ebba0d1c1169', '5ebba0d1b8a50', '', '0000-00-00 00:00:00', 1),
('5ebba0f5ddfb1', '5ebba0beda10c', 'd', '2020-05-22 08:00:37', 2),
('5ebbb7dabd8b1', '5ebb7cc297b3d', 'baru', '0000-00-00 00:00:00', 1),
('5ebbb7ec4e2fe', '5ebb7cc297b3d', 'ddd', '2020-05-22 08:00:37', 2),
('5ebbb8095c36b', '5ebbb8094dfbe', 'dd', '0000-00-00 00:00:00', 1),
('5ebbb8095dab4', '5ebbb8094dfbe', 'dd', '2020-05-22 08:00:37', 2),
('5ebbb828400bd', '5ebb7cc297b3d', 'asdasdas', '0000-00-00 00:00:00', 1),
('5ebbb83bf36c0', '5ebbb83bef31e', '', '2020-05-22 08:00:37', 2),
('5ebfe3cd62b8c', '5ebfd9f07b9e3', 'kegiatan satu', '2020-05-14 02:45:00', 1),
('5ec0000991ac7', '5ec0000979ed7', 'kegiatan 1', '2020-05-22 08:00:38', 2),
('5ec00363beebb', '5ec00363a7372', 'kegiatan 1', '2020-05-06 22:25:00', 1),
('5ec004a43ad93', '5ec004a41a8e9', '1', '2020-05-22 08:00:38', 2),
('5eca8fcd81c24', '5eca8fcd66d7d', 'satu', '2020-04-29 15:05:00', 1),
('5ecb5b55a9e2c', '5ebfff829cf5d', 'satu', '2020-05-05 22:25:00', 1),
('5ed86de456255', '5ed7a15754008', 'satu', '2020-06-04 23:30:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelas`
--

CREATE TABLE `jenis_kelas` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelas`
--

INSERT INTO `jenis_kelas` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Gratis'),
(2, 'Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis`, `nama_jenis`) VALUES
(1, 'OVO'),
(2, 'GO-PAY'),
(3, 'Transfer Bank');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kelas`
--

CREATE TABLE `kategori_kelas` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_kelas`
--

INSERT INTO `kategori_kelas` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Programming'),
(2, 'Masak'),
(3, 'Sci-Fi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tugas`
--

CREATE TABLE `kategori_tugas` (
  `id` int(11) NOT NULL,
  `kategori_tugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_tugas`
--

INSERT INTO `kategori_tugas` (`id`, `kategori_tugas`) VALUES
(1, 'Tugas'),
(2, 'Kuis');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(64) NOT NULL,
  `pembuat_kelas` varchar(100) NOT NULL,
  `judul_kelas` varchar(100) NOT NULL,
  `deskripsi_kelas` text NOT NULL,
  `kategori_kelas` int(11) NOT NULL,
  `poster_kelas` text NOT NULL,
  `jenis_kelas` int(11) NOT NULL,
  `status_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `pembuat_kelas`, `judul_kelas`, `deskripsi_kelas`, `kategori_kelas`, `poster_kelas`, `jenis_kelas`, `status_kelas`) VALUES
('5ebb7cc297b3d', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'PTI', 'Kelas pti', 1, 'Mustang.jpg', 1, 1),
('5ebba0beda10c', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'ddddasdasd', 'sdsd', 1, 'Most_Wanted.jpg', 1, 2),
('5ebba0d1b8a50', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'ddasdasdd', 'dddd', 1, 'Flying_Evo_2.jpg', 1, 1),
('5ebbb8094dfbe', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'ddd', 'fff', 1, 'its_GTR.jpg', 1, 1),
('5ebbb83bef31e', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'supra', 'suprio', 1, 'its_supra.jpg', 1, 2),
('5ebfd9f07b9e3', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'kelas satu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et veritatis corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat dicta.', 1, 'No__1.jpg', 2, 1),
('5ebffb1f05953', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Sistem Operasi', 'bukan dani metiu', 1, '4_(ebook_page_330).png', 1, 1),
('5ebfff829cf5d', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Algoritma dan Pemrograman', 'bukan megah mulya', 2, 'lat_10_2_cal.jpeg', 1, 1),
('5ec0000979ed7', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Teori Bahasa Otomata', 'hbsdj', 1, 'blog_rl.jpeg', 1, 2),
('5ec00363a7372', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Alpro', 'alpro', 3, 'blog_rd.jpeg', 1, 1),
('5ec004a41a8e9', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Alpro 2', 'alpro 2', 1, 'blog_u.jpeg', 2, 2),
('5eca8fcd66d7d', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'satu', 'satu', 1, 'blog_v_rl2.jpeg', 1, 1),
('5ed7a15754008', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'kelas 3', 'tiga', 1, 'blog_rd2.jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lupa_password`
--

CREATE TABLE `lupa_password` (
  `id_lupa_password` int(11) NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `token` varchar(16) NOT NULL,
  `status_token` int(11) NOT NULL,
  `expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` varchar(64) NOT NULL,
  `url_materi` varchar(200) NOT NULL,
  `id_kelas` varchar(64) NOT NULL,
  `id_kegiatan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`email`, `password`) VALUES
('owner@gmail.com', '4c1029697ee358715d3a14a2add817c4b01651440de808371f78165ac90dc581');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(64) NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `id_kelas` varchar(64) NOT NULL,
  `jenis_pembayaran` int(11) NOT NULL,
  `total_pembayaran` varchar(200) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_kelas` varchar(64) NOT NULL,
  `id_user` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_kelas`, `id_user`) VALUES
('5ebb7cc297b3d', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb'),
('5ebba0beda10c', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb'),
('5ebba0d1b8a50', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5ebba0d1b8a50', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb'),
('5ebbb8094dfbe', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb'),
('5ebbb83bef31e', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb'),
('5ebffb1f05953', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9');

-- --------------------------------------------------------

--
-- Table structure for table `status_kegiatan`
--

CREATE TABLE `status_kegiatan` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_kegiatan`
--

INSERT INTO `status_kegiatan` (`id_status`, `nama_status`) VALUES
(1, 'Sedang Berlangsung'),
(2, 'Selesai'),
(3, 'Belum Mulai');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id_status`, `nama_status`) VALUES
(1, 'Diterima'),
(2, 'Pending'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `status_token`
--

CREATE TABLE `status_token` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_token`
--

INSERT INTO `status_token` (`id_status`, `nama_status`) VALUES
(0, 'Active'),
(1, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `status_tugas`
--

CREATE TABLE `status_tugas` (
  `id` int(11) NOT NULL,
  `status_tugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_tugas`
--

INSERT INTO `status_tugas` (`id`, `status_tugas`) VALUES
(1, 'Tepat Waktu'),
(2, 'Terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `status_withdraw`
--

CREATE TABLE `status_withdraw` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_withdraw`
--

INSERT INTO `status_withdraw` (`id_status`, `nama_status`) VALUES
(0, 'Pending'),
(1, 'Success'),
(2, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `submit_assignment`
--

CREATE TABLE `submit_assignment` (
  `id_submit` bigint(11) NOT NULL,
  `id_tugas` varchar(64) NOT NULL,
  `url_file` varchar(200) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `status_tugas` int(11) NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `subjek_tugas` varchar(100) NOT NULL,
  `tanggal_submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_kuis`
--

CREATE TABLE `tugas_kuis` (
  `id_tugas` varchar(64) NOT NULL,
  `judul_tugas` varchar(100) NOT NULL,
  `deskripsi_tugas` text NOT NULL,
  `id_kelas` varchar(64) NOT NULL,
  `kategori_tugas` int(11) NOT NULL,
  `batas_pengiriman_tugas` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
('3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'zemitvector@gmail.com', '54680bd183bb915f1a4d0745b8e3660841ed6ecc30871431e24a451ae4894edb'),
('5xUR4mnMETQZ8OmWsYwkDw1NBH2z0cTVLsO8DLuRkpXSQoUKQu8Q4uWyeUUox2EJ', 'cranston@gmail.com', '54680bd183bb915f1a4d0745b8e3660841ed6ecc30871431e24a451ae4894edb'),
('87CGFHbDtTjpzSQhmx20FPDzl3gehtFUSixLXrn9QnR85BCBJMpCl1ZTi1tnFtwy', 'isan@gmail.com', '799cecdfabfc9c61fb2670372ddef1ec3f421172c69037e38768352372187adb'),
('AORFhHgQkBDCZiJZcSTxQxPVgAsnrcvI32rfqZT11YM5N7WG2dfFybRCcF0YwD6o', 'ricar@gmail.com', '54680bd183bb915f1a4d0745b8e3660841ed6ecc30871431e24a451ae4894edb'),
('b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'dice@gmail.com', '82ecd2972f1fac44447c233d24f0efb96dea42fc6bda8e18b3f780e9c370a7ed'),
('jybs0xGSI5ZWrRLnjb34qSf7PsxSHp2fMAghq4y9MA8j20E48bB6xUj9jPfTXdwI', 'hanari@mail.com', '54680bd183bb915f1a4d0745b8e3660841ed6ecc30871431e24a451ae4894edb'),
('pTithyQiH1fYF5fOjETFtMblWqqsfbv9V56o3pC4JFNM617ULFmTchAfK7JCMbDp', 'wilman@mail.com', '54680bd183bb915f1a4d0745b8e3660841ed6ecc30871431e24a451ae4894edb'),
('s4blnpXLSs4GWELe5YM6GrJV4m6r7m8fUCsEZq8zuqXpDNnnDwniMLKt1si675HC', 'Ernst@mail.com', '54680bd183bb915f1a4d0745b8e3660841ed6ecc30871431e24a451ae4894edb'),
('upDwiQ8hLclcFG3pvaNQNIbnTtzIq7V8ZXQj5xjtqBjq2eh4mvUOYzBVTRMszlTZ', 'gsdajh@hvc.gsaj', '3f21a8490cef2bfb60a9702e9d2ddb7a805c9bd1a263557dfd51a7d0e9dfa93e'),
('ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'dhiya@gmail.com', 'f0da6669baabb5d7a133294818a80c8cf44518f489f974b29240d42c19600efc');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id_withdraw` int(11) NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `jumlah_withdraw` varchar(200) NOT NULL,
  `status_withdraw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `harga_kelas`
--
ALTER TABLE `harga_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `status_kegiatan` (`status_kegiatan`);

--
-- Indexes for table `jenis_kelas`
--
ALTER TABLE `jenis_kelas`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `pembuat_kelas` (`pembuat_kelas`),
  ADD KEY `jenis_kelas` (`jenis_kelas`),
  ADD KEY `status_kelas` (`status_kelas`),
  ADD KEY `kategori_kelas` (`kategori_kelas`);

--
-- Indexes for table `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD PRIMARY KEY (`id_lupa_password`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `status_token` (`status_token`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_kelas` (`id_kelas`,`id_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_user` (`id_user`,`id_kelas`,`jenis_pembayaran`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `jenis_pembayaran` (`jenis_pembayaran`),
  ADD KEY `status_pembayaran` (`status_pembayaran`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_kelas`,`id_user`),
  ADD KEY `id_kelas` (`id_kelas`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `status_kegiatan`
--
ALTER TABLE `status_kegiatan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_token`
--
ALTER TABLE `status_token`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_tugas`
--
ALTER TABLE `status_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_assignment`
--
ALTER TABLE `submit_assignment`
  ADD PRIMARY KEY (`id_submit`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `status_tugas` (`status_tugas`);

--
-- Indexes for table `tugas_kuis`
--
ALTER TABLE `tugas_kuis`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_kelas` (`id_kelas`,`kategori_tugas`),
  ADD KEY `kategori_tugas` (`kategori_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id_withdraw`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kelas`
--
ALTER TABLE `jenis_kelas`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lupa_password`
--
ALTER TABLE `lupa_password`
  MODIFY `id_lupa_password` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_kegiatan`
--
ALTER TABLE `status_kegiatan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_tugas`
--
ALTER TABLE `status_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harga_kelas`
--
ALTER TABLE `harga_kelas`
  ADD CONSTRAINT `harga_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  ADD CONSTRAINT `jadwal_kegiatan_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kegiatan_ibfk_2` FOREIGN KEY (`status_kegiatan`) REFERENCES `status_kegiatan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jenis_kelas`) REFERENCES `jenis_kelas` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`pembuat_kelas`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`status_kelas`) REFERENCES `status_kegiatan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_4` FOREIGN KEY (`kategori_kelas`) REFERENCES `kategori_kelas` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD CONSTRAINT `lupa_password_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lupa_password_ibfk_2` FOREIGN KEY (`status_token`) REFERENCES `status_token` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `jadwal_kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`jenis_pembayaran`) REFERENCES `jenis_pembayaran` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`status_pembayaran`) REFERENCES `status_pembayaran` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submit_assignment`
--
ALTER TABLE `submit_assignment`
  ADD CONSTRAINT `submit_assignment_ibfk_1` FOREIGN KEY (`status_tugas`) REFERENCES `status_tugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submit_assignment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submit_assignment_ibfk_3` FOREIGN KEY (`id_tugas`) REFERENCES `tugas_kuis` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas_kuis`
--
ALTER TABLE `tugas_kuis`
  ADD CONSTRAINT `tugas_kuis_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_kuis_ibfk_2` FOREIGN KEY (`kategori_tugas`) REFERENCES `kategori_tugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `withdraw_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
