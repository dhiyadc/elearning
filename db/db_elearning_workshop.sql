-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 07:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('admin@elearning.com', '081278220370', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
('zora@admin.com', '1234', '8582B47EDAF2C5A49893CB708C67AC328C3B3B382B6D249B778C90E3522CB1A1');

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
('87CGFHbDtTjpzSQhmx20FPDzl3gehtFUSixLXrn9QnR85BCBJMpCl1ZTi1tnFtwy', 'Achmad Ichsan', '0812', NULL, NULL),
('AORFhHgQkBDCZiJZcSTxQxPVgAsnrcvI32rfqZT11YM5N7WG2dfFybRCcF0YwD6o', 'Ricardo Adocicados', '983228390', '', ''),
('b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'Dice', '0812', '71779706_448094602754019_6167635517203967163_n.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et veritatis corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat dicta.'),
('ETiCSZYrZcv2P6sTtL8PiQaK7HFiTPxb7mUksTq059xTCTTPbOdn7dTsdkfl7NWt', 'Zora Cahya', '1234', NULL, NULL),
('jwr5zJHNb1idsN6iFE5DHv6avqn5AQnO8znVsfMF73DM6MkPPxd0PAaT2ZRWscXF', 'Zora Cahya', '1234', NULL, NULL),
('jybs0xGSI5ZWrRLnjb34qSf7PsxSHp2fMAghq4y9MA8j20E48bB6xUj9jPfTXdwI', 'Hanari Carnes', '982302831039', '', ''),
('L4rQj4YlTEGD96F8zirIpcZayHzMXmr5m0faCd7KA2AeyKW0X4AO3n354kVWhiLZ', 'murid', '1234', NULL, NULL),
('lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs', 'cindy ilfith cilisti priditi', '1234', '1fad513047507969cfa32b5cf979bde3.jpg', 'StackOverflow adalah jalan ninjaku'),
('OISI84OylRn1zOP0qWxn7AoRdRzEn2YrFPwAdBaJzNBxLd0rffZcU91zfjhGFdrw', 'Zora Cahya', '1234', 'original.jpg', '2020 Zora cakep Aamiin'),
('pTithyQiH1fYF5fOjETFtMblWqqsfbv9V56o3pC4JFNM617ULFmTchAfK7JCMbDp', 'Wilman Kala', '231231233', '', ''),
('s4blnpXLSs4GWELe5YM6GrJV4m6r7m8fUCsEZq8zuqXpDNnnDwniMLKt1si675HC', 'Ernst Handel', '8723827382', '', ''),
('upDwiQ8hLclcFG3pvaNQNIbnTtzIq7V8ZXQj5xjtqBjq2eh4mvUOYzBVTRMszlTZ', 'fbgfv', '24', '', ''),
('ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Dhiya Calista', '0812', 'WhatsApp_Image_2020-06-21_at_7_46_23_PM.jpeg', 'nama saya dhiya');

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
('5eca8fcd66d7d', '0'),
('5ed87e6b0438f', '0'),
('5ed894578ad28', '0'),
('5ed9fa1e537d6', '0'),
('5edce70836148', '0'),
('5ee4d9a981dd4', '0'),
('5ee4daf10f6c6', '0'),
('5eeeeb8da26e6', '0'),
('5ef2b84c690e2', '0'),
('5ef30bb921a60', '0'),
('5ef33d1b3c398', '0'),
('5ef3412624fa6', '0'),
('5ef4198236236', '0'),
('5ef58102cf223', '0');

-- --------------------------------------------------------

--
-- Table structure for table `harga_workshop`
--

CREATE TABLE `harga_workshop` (
  `id_workshop` varchar(64) NOT NULL,
  `harga_workshop` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga_workshop`
--

INSERT INTO `harga_workshop` (`id_workshop`, `harga_workshop`) VALUES
('5ef2eaf8830fc', '0'),
('5ef302da129ed', '0'),
('5ef316d1ae307', '0'),
('5ef31ed5918fe', '0'),
('5ef31f6d8d880', '0'),
('5ef3457de1d6d', '0'),
('5ef567c4d02f2', '0');

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
('5ebba0bf0edf9', '5ebba0beda10c', '', '2020-05-22 08:00:37', 2),
('5ebba0f5ddfb1', '5ebba0beda10c', 'd', '2020-05-22 08:00:37', 2),
('5ebbb8095dab4', '5ebbb8094dfbe', 'dd', '2020-05-22 08:00:37', 2),
('5ebbb83bf36c0', '5ebbb83bef31e', '', '2020-05-22 08:00:37', 2),
('5ebfe3cd62b8c', '5ebfd9f07b9e3', 'kegiatan satu', '2020-05-14 02:45:00', 1),
('5ec0000991ac7', '5ec0000979ed7', 'kegiatan 1', '2020-05-22 08:00:38', 2),
('5ec00363beebb', '5ec00363a7372', 'kegiatan 1', '2020-05-06 22:25:00', 1),
('5ec004a43ad93', '5ec004a41a8e9', '1', '2020-05-22 08:00:38', 2),
('5eca8fcd81c24', '5eca8fcd66d7d', 'satu', '2020-04-29 15:05:00', 1),
('5ecb5b55a9e2c', '5ebfff829cf5d', 'satu', '2020-05-05 22:25:00', 1),
('5ed86de456255', '5ed7a15754008', 'satuu', '2020-06-06 12:49:05', 3),
('5ed9c0530bfff', '5ebffb1f05953', '1', '2020-06-21 14:46:38', 1),
('5ed9c4bd4ec87', '5ebffb1f05953', '2', '2020-06-09 01:40:00', 3),
('5ed9c50732255', '5ebffb1f05953', '3', '2020-06-10 02:45:00', 3),
('5ed9c5561f1cd', '5ebffb1f05953', '4', '2020-06-02 22:25:00', 3),
('5ed9c5f355df5', '5ebffb1f05953', '5', '2020-06-01 21:20:00', 3),
('5ed9fa1e68fcc', '5ed9fa1e537d6', 'kegiatan 1', '2020-06-06 00:35:00', 3),
('5edb9158ca52c', '5ed7a15754008', 'duaa', '2020-06-02 22:25:00', 3),
('5edce708420ad', '5edce70836148', '1', '2020-06-07 13:35:00', 3),
('5edce70850422', '5edce70836148', '2', '2020-06-08 01:40:00', 3),
('5ee86ce46be10', '5eca8fcd66d7d', 'dua', '2020-06-16 06:55:00', 3),
('5eeafa95615f8', '5eca8fcd66d7d', 'tiga', '2020-06-18 05:24:00', 3),
('5ef30bb922b86', '5ef30bb921a60', 'fr', '2020-06-24 08:16:31', 2),
('5ef3118cbbce0', '5ef2b84c690e2', 'ofijsdfshu ', '2020-06-24 08:46:53', 2),
('5ef31d5263a66', '5ef2b84c690e2', 'def', '2020-06-24 10:45:00', 3),
('5ef33d1b3d794', '5ef33d1b3c398', 'df', '2020-06-24 11:47:38', 2),
('5ef3412625a6c', '5ef3412624fa6', 'j', '2020-06-24 12:03:59', 2),
('5ef342906511e', '5ef3412624fa6', 'gajadi selesai', '2020-06-24 12:15:48', 2),
('5ef4151642042', '5ef3412624fa6', 'fpds', '2020-06-25 03:20:22', 2),
('5ef419823b246', '5ef4198236236', '43', '2020-06-25 03:44:09', 2),
('5ef41dc4c78c0', '5ef4198236236', 'tes notif2', '2020-06-25 03:45:30', 2),
('5ef41deee03be', '5ef3412624fa6', 'tes notif ', '2020-06-25 03:46:24', 2),
('5ef420b641680', '5ef4198236236', 'hudoa', '2020-06-25 03:58:52', 2),
('5ef4a008c7918', '5ef3412624fa6', 'tes', '2020-06-25 13:01:46', 2),
('5ef58102d1cd5', '5ef58102cf223', 'tes', '2020-06-26 06:06:19', 2),
('5ef5a6bf26e79', '5ef4198236236', 'v', '2020-06-03 07:40:00', 3),
('5ef5ab6a0ebe9', '5ef3412624fa6', 'upload files', '2020-06-26 14:10:31', 2),
('5ef5ac0112958', '5ef3412624fa6', 'upload files', '2020-06-26 14:10:44', 2),
('5ef5d34c59297', '5ef3412624fa6', 'Sadboy', '2020-06-27 03:27:17', 2),
('5ef60286b49d2', '5ef3412624fa6', 'Kelas Belajar Overthinking', '2020-06-27 03:26:41', 3),
('5ef603d5bad1a', '5ef3412624fa6', 'Kelas Malam-Malam Insecure ', '2020-06-27 03:26:17', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_workshop`
--

CREATE TABLE `jadwal_workshop` (
  `id_kegiatan` varchar(64) NOT NULL,
  `id_workshop` varchar(64) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `tanggal_kegiatan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_workshop`
--

INSERT INTO `jadwal_workshop` (`id_kegiatan`, `id_workshop`, `deskripsi_kegiatan`, `tanggal_kegiatan`, `status_kegiatan`) VALUES
('5ef302da13799', '5ef302da129ed', 'Membahas tentang apa aja deh yang penting workshop jiahaha', '2020-06-24 08:23:01', 3),
('5ef31ed592849', '5ef31ed5918fe', 'c', '2020-06-24 09:37:35', 2),
('5ef31f6d8e5ee', '5ef31f6d8d880', 'nfo', '2020-06-24 09:40:07', 2),
('5ef567c4d3814', '5ef567c4d02f2', 'tes', '2020-06-26 04:10:00', 3);

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
-- Table structure for table `kategori_materi`
--

CREATE TABLE `kategori_materi` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_materi`
--

INSERT INTO `kategori_materi` (`kategori_id`, `nama_kategori`) VALUES
(1, 'File'),
(2, 'Video');

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
(2, 'Kuis'),
(3, 'Tugas Akhir');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_workshop`
--

CREATE TABLE `kategori_workshop` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_workshop`
--

INSERT INTO `kategori_workshop` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kewirausahaan'),
(2, 'Beauty Class');

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
  `status_kelas` int(11) NOT NULL,
  `batas_jumlah` int(11) NOT NULL,
  `tipe_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `pembuat_kelas`, `judul_kelas`, `deskripsi_kelas`, `kategori_kelas`, `poster_kelas`, `jenis_kelas`, `status_kelas`, `batas_jumlah`, `tipe_kelas`) VALUES
('5ebba0beda10c', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'ddddasdasd', 'sdsd', 1, 'Most_Wanted.jpg', 1, 2, 0, 1),
('5ebba0d1b8a50', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'ddasdasdd', 'dddd', 1, 'Flying_Evo_2.jpg', 1, 1, 0, 1),
('5ebbb8094dfbe', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'ddd', 'fff', 1, 'its_GTR.jpg', 1, 2, 0, 1),
('5ebbb83bef31e', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh', 'supra', 'suprio', 1, 'its_supra.jpg', 1, 2, 2, 1),
('5ebfd9f07b9e3', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'kelas satu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et veritatis corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat dicta.', 1, 'No__1.jpg', 2, 1, 0, 1),
('5ebffb1f05953', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Sistem Operasi', 'bukan dani metiu', 1, '4_(ebook_page_330).png', 1, 1, 0, 1),
('5ebfff829cf5d', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Algoritma dan Pemrograman', 'bukan megah mulya', 2, 'lat_10_2_cal.jpeg', 1, 1, 0, 1),
('5ec0000979ed7', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Teori Bahasa Otomata', 'hbsdj', 1, 'blog_rl.jpeg', 1, 2, 0, 1),
('5ec00363a7372', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Alpro', 'alpro', 3, 'blog_rd.jpeg', 1, 1, 0, 1),
('5ec004a41a8e9', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Alpro 2', 'alpro 2', 1, 'blog_u.jpeg', 2, 2, 0, 1),
('5eca8fcd66d7d', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'satu', 'satu', 1, 'blog_v_rl2.jpeg', 1, 1, 0, 1),
('5ed7a15754008', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'kelas 3', 'tiga', 1, 'blog_rd2.jpeg', 1, 1, 0, 1),
('5ed87e6b0438f', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', '1', '1', 1, 'blog_rd4.jpeg', 1, 1, 0, 1),
('5ed894578ad28', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', '4', '4', 1, 'lat_10_2_cal1.jpeg', 1, 1, 0, 1),
('5ed9fa1e537d6', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'Alpro', 'Kelas Alpro', 1, 'dice3.png', 1, 1, 0, 1),
('5edce70836148', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'tes', 'tes', 1, 'dice32.png', 1, 1, 0, 1),
('5ee4d9a981dd4', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'kelas baru', 'satu', 1, 'dice33.png', 1, 1, 50, 1),
('5ee4daf10f6c6', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb', 'kelas lama', '0', 1, 'dice34.png', 1, 1, 0, 1),
('5eeeeb8da26e6', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'private', '<p>private</p>\r\n', 1, 'dice35.png', 1, 1, 0, 2),
('5ef2b84c690e2', 'OISI84OylRn1zOP0qWxn7AoRdRzEn2YrFPwAdBaJzNBxLd0rffZcU91zfjhGFdrw', 'Belajar Memasak Seblak Rior', '<p>HEHEHEEH</p>\r\n', 2, 'Untitled.png', 1, 1, 0, 1),
('5ef30bb921a60', 'OISI84OylRn1zOP0qWxn7AoRdRzEn2YrFPwAdBaJzNBxLd0rffZcU91zfjhGFdrw', 'Tugas dan Fungsi', '<p>public&nbsp;function&nbsp;updateKegiatan($id_kelas,&nbsp;$id_kegiatan)</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;{</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data&nbsp;=&nbsp;[];</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!empty($_FILES[&#39;materi&#39;][&#39;name&#39;][0]))&nbsp;{</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data&nbsp;=&nbsp;[</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;deskripsi_kegiatan&#39;&nbsp;=&gt;&nbsp;$this-&gt;input-&gt;post(&#39;deskripsi&#39;),</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;db-&gt;where(&#39;id_kegiatan&#39;,$id_kegiatan);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;db-&gt;update(&#39;jadwal_kegiatan&#39;,$data);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$count&nbsp;=&nbsp;count($_FILES[&#39;materi&#39;][&#39;name&#39;]);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for($i=0;$i&lt;$count;$i++){</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!empty($_FILES[&#39;materi&#39;][&#39;name&#39;][$i]))&nbsp;{</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_FILES[&#39;file&#39;][&#39;name&#39;]&nbsp;=&nbsp;$_FILES[&#39;materi&#39;][&#39;name&#39;][$i];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_FILES[&#39;file&#39;][&#39;type&#39;]&nbsp;=&nbsp;$_FILES[&#39;materi&#39;][&#39;type&#39;][$i];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_FILES[&#39;file&#39;][&#39;tmp_name&#39;]&nbsp;=&nbsp;$_FILES[&#39;materi&#39;][&#39;tmp_name&#39;][$i];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_FILES[&#39;file&#39;][&#39;error&#39;]&nbsp;=&nbsp;$_FILES[&#39;materi&#39;][&#39;error&#39;][$i];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_FILES[&#39;file&#39;][&#39;size&#39;]&nbsp;=&nbsp;$_FILES[&#39;materi&#39;][&#39;size&#39;][$i];</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$config[&#39;upload_path&#39;]&nbsp;=&nbsp;&#39;./assets/docs/&#39;;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$config[&#39;allowed_types&#39;]&nbsp;=&nbsp;&#39;docx|pdf|pptx|doc|ppt&#39;;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$config[&#39;max_size&#39;]&nbsp;=&nbsp;&#39;25000&#39;;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;load-&gt;library(&#39;upload&#39;,&nbsp;$config);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;($this-&gt;upload-&gt;do_upload(&#39;file&#39;))&nbsp;{</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$file_name&nbsp;=&nbsp;$this-&gt;upload-&gt;data(&#39;file_name&#39;);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;$data[&#39;totalFiles&#39;][]&nbsp;=&nbsp;$file_name;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fileArr[]&nbsp;=&nbsp;$file_name;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data&nbsp;=&nbsp;[</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;id_materi&#39;&nbsp;=&gt;&nbsp;uniqid(),</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;url_materi&#39;&nbsp;=&gt;&nbsp;$file_name,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;id_kelas&#39;&nbsp;=&gt;&nbsp;$id_kelas,</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;id_kegiatan&#39;&nbsp;=&gt;&nbsp;$id_kegiatan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$materi_id[]&nbsp;=&nbsp;$data[&#39;id_materi&#39;];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;db-&gt;insert(&#39;materi&#39;,$data);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$countFile&nbsp;=&nbsp;count($fileArr);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for($j&nbsp;=&nbsp;0;&nbsp;$j&nbsp;&lt;&nbsp;$countFile;&nbsp;$j++){</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;db-&gt;where(&#39;id_materi&#39;,&nbsp;$materi_id[$j]);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;db-&gt;delete(&#39;materi&#39;);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unlink(&quot;assets/docs/&quot;.$fileArr[$j]);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;&quot;fail&quot;;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//return&nbsp;$_FILES[&#39;materi&#39;][&#39;name&#39;][$i];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else&nbsp;{</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data&nbsp;=&nbsp;[</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;deskripsi_kegiatan&#39;&nbsp;=&gt;&nbsp;$this-&gt;input-&gt;post(&#39;deskripsi&#39;),</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;db-&gt;where(&#39;id_kegiatan&#39;,$id_kegiatan);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;db-&gt;update(&#39;jadwal_kegiatan&#39;,$data);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;&quot;success&quot;;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;}</p>\r\n', 2, 'Screenshot_2020-06-17_Admin_Tambah_Artikel(1).png', 1, 2, 0, 1),
('5ef33d1b3c398', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs', 'Overthinking 101', '<p>Overthinking 101 bersama saya</p>\r\n', 3, 'Screenshot_2020-06-17_Admin_Agenda(1).png', 1, 2, 0, 1),
('5ef3412624fa6', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs', 'Fingerprint', '<p>jifs fsij&nbsp;</p>\r\n', 3, 'Screenshot_2020-06-17_Admin_Data_Guru(2)1.png', 1, 1, 0, 1),
('5ef4198236236', 'L4rQj4YlTEGD96F8zirIpcZayHzMXmr5m0faCd7KA2AeyKW0X4AO3n354kVWhiLZ', 'Tes Notif', '<p>32 32</p>\r\n', 2, 'Screenshot_2020-06-17_Admin_Agenda(2).png', 1, 1, 100, 1),
('5ef58102cf223', 'L4rQj4YlTEGD96F8zirIpcZayHzMXmr5m0faCd7KA2AeyKW0X4AO3n354kVWhiLZ', 'tes private', '<p>tes</p>\r\n', 2, 'Screenshot_2020-06-17_Admin_Data_Guru(2)3.png', 1, 2, 0, 2);

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
  `id_kegiatan` varchar(64) NOT NULL,
  `kategori_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `url_materi`, `id_kelas`, `id_kegiatan`, `kategori_materi`) VALUES
('5ed9c5f366e81', 'BAB_II.docx', '5ebffb1f05953', '5ed9c5f355df5', 1),
('5ed9c5f366e82', 'grafkom1.docx', '5ebffb1f05953', '5ed9c0530bfff', 1),
('5eeeff78cd810', 'Dhiya_Calista_(09021381823105)_Grafkom1.pdf', '5edce70836148', '5edce708420ad', 1),
('5ef0c5g367df1', 'footnote_revisi.docx', '5ed9fa1e537d6', '5ed9fa1e68fcc', 1),
('5ef4a008d6a73', 'BAB_II2.docx', '5ef3412624fa6', '5ef4a008c7918', 1),
('5ef5a6bf28747', 'grafkom11.docx', '5ef4198236236', '5ef5a6bf26e79', 1),
('5ef5ac011499d', 'PANCASILA_DALAM_SISTEM_ETIKA2.docx', '5ef3412624fa6', '5ef5ac0112958', 1),
('5ef5ac01169e0', 'pert8b.ppt', '5ef3412624fa6', '5ef5ac0112958', 1),
('5ef5d34c5a5bc', ' tree', '5ef3412624fa6', '5ef5d34c59297', 2),
('5ef5d34c5b456', 'https://www.youtube.com/embed/X8607H_ND4k', '5ef3412624fa6', '5ef5d34c59297', 2),
('5ef5d34c5cc78', 'PANCASILA_DALAM_SISTEM_ETIKA3.docx', '5ef3412624fa6', '5ef5d34c59297', 1),
('5ef5d34c5e097', 'pert8b1.ppt', '5ef3412624fa6', '5ef5d34c59297', 1),
('5ef60286b5dea', 'https://www.youtube.com/embed/tk-f1JppLmM', '5ef3412624fa6', '5ef60286b49d2', 2),
('5ef60286b68c7', ' https://www.youtube.com/embed/LMQ5Gauy17k', '5ef3412624fa6', '5ef60286b49d2', 2),
('5ef60286b72c4', ' https://www.youtube.com/embed/1HygThMLzGs', '5ef3412624fa6', '5ef60286b49d2', 2),
('5ef603d5bb8d9', 'https://www.youtube.com/embed/1HygThMLzGs', '5ef3412624fa6', '5ef603d5bad1a', 2),
('5ef605c449592', 'https://www.youtube.com/embed/1HygThMLzGs', '5ef3412624fa6', '5ef603d5bad1a', 2),
('5ef62909ef94b', 'teslink1', '5ef4198236236', '5ef5a6bf26e79', 2),
('5ef62909f0d4c', ' teslink2', '5ef4198236236', '5ef5a6bf26e79', 2),
('5ef6290a0109c', 'PANCASILA_DALAM_SISTEM_ETIKA21.docx', '5ef4198236236', '5ef5a6bf26e79', 1),
('5ef6290a037a9', 'BAB_II2_(1).docx', '5ef4198236236', '5ef5a6bf26e79', 1),
('5fp0c5g367e81', 'grafkom.docx', '5ebffb1f05953', '5ed9c5f355df5', 1);

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
('owner@gmail.com', '4c1029697ee358715d3a14a2add817c4b01651440de808371f78165ac90dc581'),
('zora@owner.com', '8582b47edaf2c5a49893cb708c67ac328c3b3b382b6d249b778c90e3522cb1a1');

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
('5ebba0beda10c', 'OISI84OylRn1zOP0qWxn7AoRdRzEn2YrFPwAdBaJzNBxLd0rffZcU91zfjhGFdrw'),
('5ebbb83bef31e', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh'),
('5ebbb83bef31e', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb'),
('5ebffb1f05953', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5ebfff829cf5d', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5ec0000979ed7', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5eca8fcd66d7d', 'ZNccBYZWWc5fKV5B5bF951jPLLfWUOqKtlAvHJroogkhmNCEXVqUzU3l5i2U1QXb'),
('5ed7a15754008', '3H43Iy6yCF7T3daHmv7Ydkk6Gcc9NFejhn8SXp2aOfptQXNDv5mCDKjgnKApVBsh'),
('5ed7a15754008', '87CGFHbDtTjpzSQhmx20FPDzl3gehtFUSixLXrn9QnR85BCBJMpCl1ZTi1tnFtwy'),
('5ed7a15754008', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5ed87e6b0438f', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5ed87e6b0438f', 'OISI84OylRn1zOP0qWxn7AoRdRzEn2YrFPwAdBaJzNBxLd0rffZcU91zfjhGFdrw'),
('5ed9fa1e537d6', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5ee4d9a981dd4', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5ee4daf10f6c6', 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9'),
('5ee4daf10f6c6', 'OISI84OylRn1zOP0qWxn7AoRdRzEn2YrFPwAdBaJzNBxLd0rffZcU91zfjhGFdrw'),
('5ef3412624fa6', 'jwr5zJHNb1idsN6iFE5DHv6avqn5AQnO8znVsfMF73DM6MkPPxd0PAaT2ZRWscXF'),
('5ef3412624fa6', 'L4rQj4YlTEGD96F8zirIpcZayHzMXmr5m0faCd7KA2AeyKW0X4AO3n354kVWhiLZ'),
('5ef4198236236', 'jwr5zJHNb1idsN6iFE5DHv6avqn5AQnO8znVsfMF73DM6MkPPxd0PAaT2ZRWscXF'),
('5ef4198236236', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs'),
('5ef58102cf223', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_workshop`
--

CREATE TABLE `peserta_workshop` (
  `id_workshop` varchar(64) NOT NULL,
  `id_user` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_workshop`
--

INSERT INTO `peserta_workshop` (`id_workshop`, `id_user`) VALUES
('5ef302da129ed', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs'),
('5ef316d1ae307', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs');

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
  `nilai_tugas` varchar(20) NOT NULL,
  `status_tugas` int(11) NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `subjek_tugas` varchar(100) NOT NULL,
  `tanggal_submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submit_assignment`
--

INSERT INTO `submit_assignment` (`id_submit`, `id_tugas`, `url_file`, `nilai_tugas`, `status_tugas`, `id_user`, `subjek_tugas`, `tanggal_submit`) VALUES
(18, '5eda522b0a373', 'BAB_II1.docx', '90', 2, 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', '1', '2020-06-12 15:10:03'),
(26, '5eda522b0a373', 'GrafkomKisi.docx', '70', 2, '87CGFHbDtTjpzSQhmx20FPDzl3gehtFUSixLXrn9QnR85BCBJMpCl1ZTi1tnFtwy', 'tugas satu', '2020-06-13 07:43:49'),
(33, '5ee6265f603ea', 'grafkom3.docx', '100', 2, 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'tes', '2020-06-15 11:45:22'),
(34, '5ee6265f603ea', 'grafkom.pdf', '100', 2, '87CGFHbDtTjpzSQhmx20FPDzl3gehtFUSixLXrn9QnR85BCBJMpCl1ZTi1tnFtwy', 'tes 1', '2020-06-15 11:45:22'),
(35, '5ee629a04ec56', 'kutipan_dan_daftar_pustaka2.docx', 'Belum Dinilai', 2, 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'telat 1 jam', '2020-06-15 11:45:22'),
(36, '5ee629b0605ae', 'kutipan_dan_daftar_pustaka3.docx', 'Belum Dinilai', 2, 'b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'telat 1 hari', '2020-06-15 11:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kelas`
--

CREATE TABLE `tipe_kelas` (
  `id_tipe` int(11) NOT NULL,
  `tipe_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kelas`
--

INSERT INTO `tipe_kelas` (`id_tipe`, `tipe_kelas`) VALUES
(1, 'Public'),
(2, 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_kuis`
--

CREATE TABLE `tugas_kuis` (
  `id_tugas` varchar(64) NOT NULL,
  `judul_tugas` varchar(100) NOT NULL,
  `deskripsi_tugas` text NOT NULL,
  `url_tugas` text DEFAULT NULL,
  `id_kelas` varchar(64) NOT NULL,
  `kategori_tugas` int(11) NOT NULL,
  `batas_pengiriman_tugas` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_kuis`
--

INSERT INTO `tugas_kuis` (`id_tugas`, `judul_tugas`, `deskripsi_tugas`, `url_tugas`, `id_kelas`, `kategori_tugas`, `batas_pengiriman_tugas`) VALUES
('5ed9d0a7934ea', '1', '1', '', '5ebffb1f05953', 1, '2020-06-09 01:40:00'),
('5ed9ff38dae39', 'tugas tiga', '3', '', '5ed7a15754008', 1, '2020-05-26 08:00:00'),
('5eda522b0a373', 'tugas satu', 'tugas satu', '', '5ed7a15754008', 2, '2020-05-25 21:20:00'),
('5edb717795a5c', 'kuis 2', 'duaaa', '', '5ed7a15754008', 2, '2020-06-04 23:30:00'),
('5ee6265f603ea', 'tes', 'tes', '', '5ed7a15754008', 1, '2020-06-14 13:35:00'),
('5ee629a04ec56', 'kuis', 'tes', '', '5ed7a15754008', 2, '2020-06-14 12:40:00'),
('5ee629b0605ae', 'tugas', 'tes', '', '5ed7a15754008', 1, '2020-06-13 04:55:00'),
('5ee7658af2d1b', 'tes file', '1', 'Dhiya_Calista_(09021381823105)_Grafkom.pdf', '5ed7a15754008', 1, '2020-06-15 12:11:00'),
('5eef759fce83c', 'tugas 1', '<p>tugas</p>\r\n', '09021381823105_Dhiya_Calista.pdf', '5ebffb1f05953', 1, '2020-06-21 14:58:00'),
('5ef05a1c43b7e', 'tugas 1', '<p>tugas</p>\r\n', '09021381823105_Dhiya_Calista.pdf', '5eca8fcd66d7d', 1, '2020-06-22 07:13:00'),
('5ef05c6af0743', 'UAS', '<p>UAS</p>\r\n', '09021381823105_Dhiya_Calista1.pdf', '5eca8fcd66d7d', 3, '2020-06-22 07:23:00'),
('5ef06186520f2', 'kuis 1', '<p>kuis</p>\r\n', NULL, '5eca8fcd66d7d', 2, '2020-06-22 07:45:00'),
('5ef2b8bc67a30', 'TUGAS AJE', '<p>HEHE</p>\r\n', 'UAS_IMK_(09021281823056_-_Zora_Cahya).pdf', '5ef2b84c690e2', 1, '2020-06-26 03:00:00'),
('5ef59b8fe9b10', 'Tugas dan Fungsi', '<p>tugas pancasila</p>\r\n', 'PANCASILA_DALAM_SISTEM_ETIKA.docx', '5ef33d1b3c398', 1, '2020-06-26 17:00:00');

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
('9fk0tH8GaEHMUBuyuyKCtVE7lRGZQ790FNcN8lFBUab7hbHCsZGqeljKltMEkSMO', 'tes12@gmail.com', '8582b47edaf2c5a49893cb708c67ac328c3b3b382b6d249b778c90e3522cb1a1'),
('AORFhHgQkBDCZiJZcSTxQxPVgAsnrcvI32rfqZT11YM5N7WG2dfFybRCcF0YwD6o', 'ricar@gmail.com', '54680bd183bb915f1a4d0745b8e3660841ed6ecc30871431e24a451ae4894edb'),
('b0D4Q4pX6NCibfO2SRag3BdN6tpOugQkilV5LbBHgSVFO9gD5VDCnuqU2oGWyLz9', 'dice@gmail.com', '82ecd2972f1fac44447c233d24f0efb96dea42fc6bda8e18b3f780e9c370a7ed'),
('ETiCSZYrZcv2P6sTtL8PiQaK7HFiTPxb7mUksTq059xTCTTPbOdn7dTsdkfl7NWt', 'zora@email.comm', '219e9b0a470e253d8f7b38f6adfc6c916a024184536eff3d83c86e6b4dea6e50'),
('jwr5zJHNb1idsN6iFE5DHv6avqn5AQnO8znVsfMF73DM6MkPPxd0PAaT2ZRWscXF', 'tes_materi@email.com', '8582b47edaf2c5a49893cb708c67ac328c3b3b382b6d249b778c90e3522cb1a1'),
('jybs0xGSI5ZWrRLnjb34qSf7PsxSHp2fMAghq4y9MA8j20E48bB6xUj9jPfTXdwI', 'hanari@mail.com', '54680bd183bb915f1a4d0745b8e3660841ed6ecc30871431e24a451ae4894edb'),
('L4rQj4YlTEGD96F8zirIpcZayHzMXmr5m0faCd7KA2AeyKW0X4AO3n354kVWhiLZ', 'murid@email.com', '8582b47edaf2c5a49893cb708c67ac328c3b3b382b6d249b778c90e3522cb1a1'),
('lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs', 'tes@email.com', '8582b47edaf2c5a49893cb708c67ac328c3b3b382b6d249b778c90e3522cb1a1'),
('OISI84OylRn1zOP0qWxn7AoRdRzEn2YrFPwAdBaJzNBxLd0rffZcU91zfjhGFdrw', 'zoraa@email.comm', '8582b47edaf2c5a49893cb708c67ac328c3b3b382b6d249b778c90e3522cb1a1'),
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

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id_workshop` varchar(64) NOT NULL,
  `pembuat_workshop` varchar(100) NOT NULL,
  `judul_workshop` varchar(100) NOT NULL,
  `deskripsi_workshop` text NOT NULL,
  `kategori_workshop` int(11) NOT NULL,
  `poster_workshop` text NOT NULL,
  `jenis_workshop` int(11) NOT NULL,
  `status_workshop` int(11) NOT NULL,
  `batas_jumlah` int(11) NOT NULL,
  `tipe_workshop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id_workshop`, `pembuat_workshop`, `judul_workshop`, `deskripsi_workshop`, `kategori_workshop`, `poster_workshop`, `jenis_workshop`, `status_workshop`, `batas_jumlah`, `tipe_workshop`) VALUES
('5ef302da129ed', 'OISI84OylRn1zOP0qWxn7AoRdRzEn2YrFPwAdBaJzNBxLd0rffZcU91zfjhGFdrw', 'Workshop w*rd*h beauty class xixixi', '<p>Jelek? gamasalah ada workshop kita</p>\r\n', 2, 'fingerprint.jpg', 1, 1, 0, 1),
('5ef31ed5918fe', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs', 'Tugas & Fungsi', '<p>tes</p>\r\n', 2, 'Screenshot_2020-06-17_Admin_Agenda.png', 1, 2, 0, 1),
('5ef31f6d8d880', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs', 'ovf', '<p>nov nof</p>\r\n', 1, 'Screenshot_2020-06-17_Admin_Data_Guru(2).png', 1, 2, 0, 1),
('5ef567c4d02f2', 'lk2r0BAwiZpAx4olmJXEYZlSbfWLPPZrTgCugFF765Bf4enCVHddaj6DtdGfcbFs', 'Tes Kelas2', '<p>tes</p>\r\n', 2, 'Screenshot_2020-06-17_Admin_Agenda1.png', 1, 1, 0, 2);

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
-- Indexes for table `harga_workshop`
--
ALTER TABLE `harga_workshop`
  ADD PRIMARY KEY (`id_workshop`),
  ADD KEY `id_workshop` (`id_workshop`);

--
-- Indexes for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `status_kegiatan` (`status_kegiatan`);

--
-- Indexes for table `jadwal_workshop`
--
ALTER TABLE `jadwal_workshop`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `FK_id_workshop` (`id_workshop`),
  ADD KEY `FK_status_kegiatan` (`status_kegiatan`);

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
-- Indexes for table `kategori_materi`
--
ALTER TABLE `kategori_materi`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_workshop`
--
ALTER TABLE `kategori_workshop`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `pembuat_kelas` (`pembuat_kelas`),
  ADD KEY `jenis_kelas` (`jenis_kelas`),
  ADD KEY `status_kelas` (`status_kelas`),
  ADD KEY `kategori_kelas` (`kategori_kelas`),
  ADD KEY `tipe_kelas` (`tipe_kelas`);

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
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `kategori_materi` (`kategori_materi`);

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
-- Indexes for table `peserta_workshop`
--
ALTER TABLE `peserta_workshop`
  ADD PRIMARY KEY (`id_workshop`,`id_user`) USING BTREE,
  ADD KEY `id_workshop` (`id_workshop`,`id_user`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

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
-- Indexes for table `tipe_kelas`
--
ALTER TABLE `tipe_kelas`
  ADD PRIMARY KEY (`id_tipe`);

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
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id_workshop`),
  ADD KEY `FK_pembuat_workshop` (`pembuat_workshop`),
  ADD KEY `FK_jenis_workshop` (`jenis_workshop`),
  ADD KEY `FK_kategori_workshop` (`kategori_workshop`) USING BTREE,
  ADD KEY `FK_tipe_workshop` (`tipe_workshop`),
  ADD KEY `FK_status_workshop` (`status_workshop`);

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
-- AUTO_INCREMENT for table `kategori_materi`
--
ALTER TABLE `kategori_materi`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_workshop`
--
ALTER TABLE `kategori_workshop`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `submit_assignment`
--
ALTER TABLE `submit_assignment`
  MODIFY `id_submit` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tipe_kelas`
--
ALTER TABLE `tipe_kelas`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `jadwal_workshop`
--
ALTER TABLE `jadwal_workshop`
  ADD CONSTRAINT `FK_id_workshop` FOREIGN KEY (`id_workshop`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status_kegiatan` FOREIGN KEY (`status_kegiatan`) REFERENCES `status_kegiatan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jenis_kelas`) REFERENCES `jenis_kelas` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`pembuat_kelas`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`status_kelas`) REFERENCES `status_kegiatan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_4` FOREIGN KEY (`kategori_kelas`) REFERENCES `kategori_kelas` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_5` FOREIGN KEY (`tipe_kelas`) REFERENCES `tipe_kelas` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `FK_kategori_materi` FOREIGN KEY (`kategori_materi`) REFERENCES `kategori_materi` (`kategori_id`),
  ADD CONSTRAINT `kategori_materi` FOREIGN KEY (`kategori_materi`) REFERENCES `kategori_materi` (`kategori_id`),
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

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `FK_jenis_workshop` FOREIGN KEY (`jenis_workshop`) REFERENCES `jenis_kelas` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_kategpri_workshop` FOREIGN KEY (`kategori_workshop`) REFERENCES `kategori_workshop` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pembuat_workshop` FOREIGN KEY (`pembuat_workshop`) REFERENCES `detail_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status_workshop` FOREIGN KEY (`status_workshop`) REFERENCES `status_kegiatan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tipe_workshop` FOREIGN KEY (`tipe_workshop`) REFERENCES `tipe_kelas` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
