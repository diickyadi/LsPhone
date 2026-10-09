-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 03:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_sections`
--

CREATE TABLE `about_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) NOT NULL,
  `subjudul` varchar(191) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `foto` varchar(191) DEFAULT NULL,
  `poin1` text DEFAULT NULL,
  `poin2` text DEFAULT NULL,
  `poin3` text DEFAULT NULL,
  `poin4` text DEFAULT NULL,
  `poin5` text DEFAULT NULL,
  `poin6` text DEFAULT NULL,
  `poin7` text DEFAULT NULL,
  `poin8` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_sections`
--

INSERT INTO `about_sections` (`id`, `judul`, `subjudul`, `deskripsi`, `foto`, `poin1`, `poin2`, `poin3`, `poin4`, `poin5`, `poin6`, `poin7`, `poin8`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Kami', 'Benefit Belanja iPhone Second di Toko Kami', '1. Harga lebih terjangkau - cocok untuk budget hemat.\r\n2. Kualitas terjamin - dicek & dites lengkap.\r\n3. Garansi toko - belanja aman & nyaman.\r\n4. Pilihan lengkap sesuai kebutuhan.\r\n5. Aksesoris lengkap & berkualitas.\r\n6. Transaksi aman - bisa COD/marketplace.\r\n7. Unit siap pakai - langsung dipakai.\r\n8. IMEI terdaftar resmi Kemenperin.', 'images/about/1764301698_Gemini_Generated_Image_n6dcfnn6dcfnn6dc.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-26 14:29:57', '2025-11-27 20:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `harga` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `gambar` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `nama`, `jenis`, `keterangan`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(5, 'IT Plug 30 W Wall Charger Cube - White', 'Charger', 'Tidak ada waktu yang terbuang, IT Multi Port dirancang dengan teknologi USB C Power Delivery yang mendukung pengisian daya cepat hingga 100W.', 199000, 25, 'images/accessories/1764301873_it_plug_30_w_wall_charger_cube_white_1_1.webp', '2025-11-27 20:51:02', '2025-11-27 20:51:13'),
(7, '240W USB-C Charger Cable (2m)', 'Kabel Data', 'Kabel pengisian daya 2 meter ini dibuat dengan desain anyaman — dengan konektor USB-C di kedua ujungnya — dan sangat ideal untuk pengisian daya, penyelarasan, dan transfer data di antara perangkat USB-C. Kabel ini mendukung pengisian daya hingga 240 watt dan transfer data pada kecepatan USB 2. Pasangkan Kabel Pengisian Daya USB-C dengan adaptor daya USB-C yang kompatibel untuk mengisi daya perangkat Anda dengan mudah dari stopkontak di dinding dan memanfaatkan kemampuan pengisian cepat. Adaptor daya USB-C dijual terpisah.', 499000, 30, 'images/accessories/1764759558_apple_240w_usb-c_charger_cable_new (1).webp', '2025-12-03 03:59:10', '2025-12-03 03:59:18'),
(8, 'IT Plug IT 30 W Cube Charger - Black', 'Charger', 'IT Plug IT 30 W Cube Charger adalah charger kubus berdaya tinggi yang dirancang untuk pengisian cepat dan aman pada berbagai perangkat modern. Dengan desain minimalis berwarna hitam elegan, charger ini memberikan perpaduan sempurna antara performa, portabilitas, dan gaya.', 199000, 35, 'images/accessories/1764759672_it_plug_it_30_w_cube_charger_black1_1.webp', '2025-12-03 04:01:12', '2025-12-03 04:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', '2025-11-22 07:50:10', '2025-11-22 07:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `kapasitas` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `gambar` varchar(191) DEFAULT NULL,
  `harga` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 1,
  `deskripsi_lengkap` longtext DEFAULT NULL,
  `tipe` varchar(50) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `slug`, `kapasitas`, `warna`, `asal`, `gambar`, `harga`, `stok`, `deskripsi_lengkap`, `tipe`, `created_by`, `created_at`, `updated_at`) VALUES
(20, 'IPHONE 13', 'iphone-13', '128 GB', 'Green', 'EX IBOX', 'uploads/produk/1764760262_WhatsApp Image 2025-10-10 at 16.16.00.jpeg', 7000000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 13\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Green\r\nAsal: Ex iBox (resmi Indonesia)\r\n\r\nKondisi Fisik:\r\n\r\nMulus, kondisi sangat terawat\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar mulus tanpa shadow atau dead pixel\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nBattery Health: Normal (standar second, biasanya 85–95%)\r\n\r\nFace ID: Berfungsi normal, cepat & akurat\r\n\r\nTrue Tone: Aktif\r\n\r\nKamera: Depan & belakang berfungsi normal, hasil jernih\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nSemua tombol: Responsif\r\n\r\nSemua sensor: Berfungsi baik\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 13 Green 128GB Ex iBox\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:11:02', '2025-12-03 05:36:32'),
(21, 'IPHONE 14 PRO MAX', 'iphone-14-pro-max', '128 GB', 'Deep Purple', 'EX IBOX', 'uploads/produk/1764760457_WhatsApp Image 2025-12-01 at 20.03.41.jpeg', 17799000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 14 Pro Max\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: Deep Purple\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus sempurna\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bening tanpa dead pixel / shadow\r\n\r\nFrame masih presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nBattery Health: Normal (second umumnya 85–95%)\r\n\r\nFace ID: Berfungsi cepat & akurat\r\n\r\nTrue Tone: Aktif dan berfungsi baik\r\n\r\nKamera:\r\n\r\nSemua mode berfungsi (Wide, Ultra Wide, Tele)\r\n\r\nHasil foto & video sangat jernih, tidak ada blur/flek\r\n\r\nSpeaker & Microphone: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nSemua tombol: Clicky & normal\r\n\r\nSensor: Semua normal\r\n\r\niCloud: Kosong & siap login Apple ID baru\r\n\r\nColokan & charging: Normal dan respons cepat\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 14 Pro Max 256GB Deep Purple\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:14:17', '2025-12-03 05:39:10'),
(22, 'IPHONE 16 PRO MAX', 'iphone-16-pro-max', '256 GB', 'black titanium', 'EX IBOX', 'uploads/produk/1764760600_WhatsApp Image 2025-12-01 at 19.53.16.jpeg', 19000000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 16 Pro Max\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: Black Titanium\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus sempurna\r\n\r\nTidak ada lecet, gores, atau bekas pemakaian\r\n\r\nLayar mulus tanpa shadow, burn-in, atau dead pixel\r\n\r\nFrame titanium presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nDual SIM: Mendukung penggunaan dua kartu SIM (eSIM + physical SIM)\r\n\r\nFace ID: Cepat & sangat akurat\r\n\r\nTrue Tone: Aktif dan berfungsi normal\r\n\r\nKamera:\r\n\r\nSemua mode bekerja (Wide, Ultra Wide, Periscope/Telephoto)\r\n\r\nHasil foto & video jernih, stabil, dan profesional\r\n\r\nSpeaker & Mic: Jernih tanpa gangguan\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 16 Pro Max 256GB Black Titanium\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:16:40', '2025-12-03 04:16:40'),
(23, 'IPHONE 11', 'iphone-11', '64 GB', 'White', 'EX IBOX', 'uploads/produk/1764760749_WhatsApp Image 2025-10-10 at 16.16.05 (1).jpeg', 5200000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 11\r\nKapasitas Penyimpanan: 64 GB\r\nWarna: White\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nKondisi mulus terawat\r\n\r\nTidak ada lecet, gores, atau retak\r\n\r\nLayar bersih tanpa dead pixel / shadow\r\n\r\nBody masih presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Berfungsi normal, cepat & akurat\r\n\r\nTrue Tone: Aktif dan berfungsi baik\r\n\r\nKamera:\r\n\r\nKamera belakang Wide & Ultra Wide normal\r\n\r\nHasil foto & video jernih\r\n\r\nKamera depan berfungsi baik\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Normal\r\n\r\nTombol fisik: Responsif\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 11 64GB White\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:19:09', '2025-12-03 05:38:55'),
(24, 'IPHONE 15 PLUS', 'iphone-15-plus', '128 GB', 'Blue', 'EX IBOX', 'uploads/produk/1764761106_WhatsApp Image 2025-12-02 at 18.11.15.jpeg', 12500000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 15 Plus\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Blue\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus, kondisi terawat\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar mulus tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nDual SIM: Mendukung eSIM + physical SIM\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif, nyaman di semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide, Tele)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 15 Plus 128GB Blue Ex iBox\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:25:06', '2025-12-03 05:38:44'),
(25, 'IPHONE 17 PRO MAX', 'iphone-17-pro-max', '256 GB', 'Blue', 'EX IBOX', 'uploads/produk/1764761212_WhatsApp Image 2025-12-01 at 20.08.24 (2).jpeg', 23000000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 17 Pro Max\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: Blue\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus sempurna, kondisi seperti baru\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nDual SIM: Mendukung eSIM + physical SIM\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif, nyaman untuk semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide, Tele/Periscope)\r\n\r\nHasil foto & video jernih, stabil, profesional\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 17 Pro Max 256GB Blue Ex iBox\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:26:52', '2025-12-03 05:38:31'),
(26, 'IPHONE 17 PRO', 'iphone-17-pro', '512 GB', 'Orange', 'EX IBOX', 'uploads/produk/1764761296_WhatsApp Image 2025-12-01 at 20.07.44.jpeg', 29000000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 17 Pro\r\nKapasitas Penyimpanan: 512 GB\r\nWarna: Orange\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus sempurna, kondisi seperti baru\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nDual SIM: Mendukung eSIM + physical SIM\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif, nyaman untuk semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide, Tele/Periscope)\r\n\r\nHasil foto & video jernih, stabil, profesional\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 17 Pro 512GB Orange Ex iBox\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:28:16', '2025-12-03 05:38:19'),
(27, 'IPHONE 13 PRO MAX', 'iphone-13-pro-max', '256 GB', 'White', 'EX IBOX', 'uploads/produk/1764761395_WhatsApp Image 2025-12-01 at 20.04.47 (1).jpeg', 12000000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 13 Pro Max\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: White\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus sempurna, kondisi sangat terawat\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nDual SIM: Mendukung eSIM + physical SIM\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif dan nyaman di semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide, Tele)\r\n\r\nHasil foto & video jernih, stabil, profesional\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 13 Pro Max 256GB White Ex iBox\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:29:55', '2025-12-03 05:37:54'),
(28, 'IPHONE 17', 'iphone-17', '256 GB', 'White', 'EX IBOX', 'uploads/produk/1764761501_WhatsApp Image 2025-12-01 at 20.06.18 (1).jpeg', 22000000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 17\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: White\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus sempurna, kondisi seperti baru\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nDual SIM: Mendukung eSIM + physical SIM\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif, nyaman untuk semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide, Tele)\r\n\r\nHasil foto & video jernih, stabil, profesional\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 17 256GB White Ex iBox\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'exibox', NULL, '2025-12-03 04:31:41', '2025-12-03 05:38:06'),
(29, 'IPHONE 11 PRO', 'iphone-11-pro', '64 GB', 'Gold', 'BEACUKAI', 'uploads/produk/1764762042_WhatsApp Image 2025-12-02 at 19.03.36 (1).jpeg', 7000000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 11 Pro\r\nKapasitas Penyimpanan: 64 GB\r\nWarna: Gold\r\nAsal: Second Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus terawat, kondisi masih bagus\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame masih presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif dan nyaman untuk semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide, Tele)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 11 Pro 64GB Gold Bea Cukai\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 04:40:42', '2025-12-03 05:39:35'),
(30, 'IPHONE 13 MINI', 'iphone-13-mini', '128 GB', 'Blue', 'BEACUKAI', 'uploads/produk/1764762316_WhatsApp Image 2025-12-02 at 19.03.36 (2).jpeg', 6500000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 13 Mini\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Blue\r\nAsal: Second Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus terawat, kondisi masih sangat baik\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif, nyaman untuk semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 13 Mini 128GB Blue Bea Cukai\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 04:44:31', '2025-12-03 05:39:47'),
(31, 'IPHONE 15', 'iphone-15', '128 GB', 'Pink', 'BEACUKAI', 'uploads/produk/1764762423_WhatsApp Image 2025-10-10 at 22.27.02.jpeg', 12500000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 15\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Pink\r\nAsal: Ex iBox / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus, kondisi sangat terawat\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nDual SIM: Mendukung eSIM + physical SIM\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif, nyaman untuk semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide, Tele)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 15 128GB Pink Ex iBox\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 04:47:03', '2025-12-03 05:39:54'),
(32, 'IPHONE XR', 'iphone-xr', '256 GB', 'Red', 'BEACUKAI', 'uploads/produk/1764762533_WhatsApp Image 2025-10-10 at 16.16.02.jpeg', 5500000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone XR\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: Red\r\nAsal: Second Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus terawat, kondisi masih bagus\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif, nyaman untuk semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone XR 256GB Red Bea Cukai\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 04:48:53', '2025-12-03 05:40:04'),
(33, 'IPHONE 12', 'iphone-12', '64 GB', 'Black', 'BEACUKAI', 'uploads/produk/1764762638_WhatsApp Image 2025-10-10 at 16.16.03.jpeg', 5500000, 1, 'Kondisi Fisik & Fungsi\r\n\r\nModel: iPhone 12\r\nKapasitas Penyimpanan: 64 GB\r\nWarna: Black\r\nAsal: Second Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik:\r\n\r\nMulus terawat, kondisi masih sangat baik\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi:\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Cepat & akurat\r\n\r\nTrue Tone: Aktif, nyaman untuk semua kondisi cahaya\r\n\r\nKamera:\r\n\r\nSemua mode normal (Wide, Ultra Wide)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 12 64GB Black Bea Cukai\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 04:50:38', '2025-12-03 05:40:12'),
(34, 'IPHONE 17', 'iphone-17-2', '128 GB', 'White', 'BEACUKAI', 'uploads/produk/1764763049_WhatsApp Image 2025-12-01 at 20.06.18 (1).jpeg', 19000000, 1, 'Kondisi Fisik & Fungsi iPhone 17 256GB White\r\n\r\nModel: iPhone 17\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: White\r\nAsal: Second, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat, kondisi sangat baik\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Cepat dan akurat\r\n\r\nTrue Tone: Aktif, nyaman digunakan di semua kondisi cahaya\r\n\r\nKamera\r\n\r\nSemua mode normal (Wide, Ultra Wide, Telephoto) berfungsi\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nAudio & Sensor\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 17 256GB White (Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 04:57:29', '2025-12-03 05:40:27'),
(35, 'IPHONE 16', 'iphone-16', '256 GB', 'Blue', 'BEACUKAI', 'uploads/produk/1764763168_WhatsApp Image 2025-10-10 at 22.30.04.jpeg', 16000000, 1, 'Kondisi Fisik & Fungsi iPhone 16 Basic 256GB Blue\r\n\r\nModel: iPhone 16 Basic\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: Blue\r\nAsal: Second, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat, kondisi sangat baik\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Cepat dan akurat\r\n\r\nTrue Tone: Aktif, nyaman digunakan di semua kondisi cahaya\r\n\r\nKamera\r\n\r\nSemua mode normal (Wide, Ultra Wide, Telephoto) berfungsi\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nAudio & Sensor\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 16 Basic 256GB Blue (Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 04:59:28', '2025-12-03 05:40:34'),
(36, 'IPHONE 17 PRO MAX', 'iphone-17-pro-max-2', '512 GB', 'Orange', 'BEACUKAI', 'uploads/produk/1764763263_WhatsApp Image 2025-12-01 at 20.07.44.jpeg', 27000000, 1, 'Kondisi Fisik & Fungsi iPhone 17 Pro Max 512GB Orange\r\n\r\nModel: iPhone 17 Pro Max\r\nKapasitas Penyimpanan: 512 GB\r\nWarna: Orange\r\nAsal: Second, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat, kondisi sangat baik\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Cepat dan akurat\r\n\r\nTrue Tone: Aktif, nyaman digunakan di semua kondisi cahaya\r\n\r\nKamera\r\n\r\nSemua mode normal (Wide, Ultra Wide, Telephoto, dan Macro) berfungsi\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nAudio & Sensor\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 17 Pro Max 512GB Orange (Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 05:01:03', '2025-12-03 05:40:43'),
(37, 'IPHONE 15', 'iphone-15-2', '128 GB', 'Pink', 'BEACUKAI', 'uploads/produk/1764763364_WhatsApp Image 2025-10-10 at 22.27.02.jpeg', 9500000, 1, 'Kondisi Fisik & Fungsi iPhone 15 Basic 128GB Pink\r\n\r\nModel: iPhone 15 Basic\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Pink\r\nAsal: Second, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat, kondisi sangat baik\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi\r\n\r\nIMEI: Terdaftar resmi & unlock semua operator\r\n\r\nFace ID: Cepat dan akurat\r\n\r\nTrue Tone: Aktif, nyaman digunakan di semua kondisi cahaya\r\n\r\nKamera\r\n\r\nSemua mode normal (Wide, Ultra Wide) berfungsi\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nAudio & Sensor\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 15 Basic 128GB Pink (Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'beacukai', NULL, '2025-12-03 05:02:44', '2025-12-03 05:36:40'),
(38, 'IPHONE 12', 'iphone-12-2', '64 GB', 'White', 'WIFI ONLY', 'uploads/produk/1764763505_WhatsApp Image 2025-12-02 at 18.16.38.jpeg', 5500000, 1, 'Kondisi Fisik & Fungsi iPhone 12 64GB White WiFi Only\r\n\r\nModel: iPhone 12\r\nKapasitas Penyimpanan: 64 GB\r\nWarna: White\r\nKoneksi: WiFi Only\r\nAsal: Second, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat, kondisi sangat baik\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi\r\n\r\nIMEI: Terdaftar resmi & unlock untuk WiFi Only\r\n\r\nFace ID: Cepat dan akurat\r\n\r\nTrue Tone: Aktif, nyaman digunakan di semua kondisi cahaya\r\n\r\nKamera\r\n\r\nSemua mode normal (Wide, Ultra Wide) berfungsi\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nAudio & Sensor\r\n\r\nSpeaker & Mic: Jernih tanpa noise\r\n\r\nTaptic Engine: Responsif\r\n\r\nTombol fisik: Normal & clicky\r\n\r\nSensor: Semua berfungsi\r\n\r\niCloud: Kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 12 64GB White WiFi Only (Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:05:05', '2025-12-03 05:36:47'),
(39, 'IPHONE 12 PRO', 'iphone-12-pro', '128 GB', 'Blue', 'WIFI ONLY', 'uploads/produk/1764763639_WhatsApp Image 2025-12-01 at 19.59.32 (1).jpeg', 8000000, 1, 'Kondisi Fisik & Fungsi iPhone 12 Pro 128 GB WiFi‑Only Blue\r\n\r\nModel: iPhone 12 Pro\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Blue\r\nKoneksi: WiFi‑Only\r\nAsal: Second, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat — kondisi sangat baik\r\n\r\nTidak ada lecet, gores, atau dent\r\n\r\nLayar bersih tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi & Fiturnya\r\n\r\nIMEI / Registrasi: Sesuai ketentuan, aman digunakan\r\n\r\nFace ID: Cepat dan akurat\r\n\r\nTrue Tone: Aktif, nyaman di semua kondisi cahaya\r\n\r\nKamera\r\n\r\nSemua mode kamera normal berfungsi (Wide, Ultra Wide, Telephoto)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nAudio & Sensor\r\n\r\nSpeaker & mic bersih tanpa noise\r\n\r\nTaptic Engine responsif\r\n\r\nTombol fisik normal & clicky\r\n\r\nSemua sensor berfungsi\r\n\r\niCloud: Kosong / siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 12 Pro 128 GB Blue (WiFi‑Only / Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:07:19', '2025-12-03 05:37:00'),
(40, 'IPHONE 13', 'iphone-13-2', '128 GB', 'Pink', 'WIFI ONLY', 'uploads/produk/1764763777_WhatsApp Image 2025-12-01 at 19.59.33 (2).jpeg', 6550000, 1, 'Kondisi Fisik & Fungsi iPhone 13 128 GB WiFi‑Only Pink\r\n\r\nModel: iPhone 13\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Pink\r\nKoneksi: WiFi‑Only\r\nAsal: Second, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat, kondisi fisik baik — tanpa lecet, gores, atau dent\r\n\r\nLayar bersih, tidak ada dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok atau bengkok\r\n\r\nFungsi & Fitur\r\n\r\nIMEI/registrasi: terdaftar resmi — aman digunakan\r\n\r\nFace ID: berfungsi cepat dan akurat\r\n\r\nTrue Tone: aktif, nyaman di semua kondisi cahaya\r\n\r\nKamera / Multimedia / Sensor / Audio\r\n\r\nKamera belakang & depan berfungsi (normal, Wide/Ultra Wide)\r\n\r\nHasil foto dan video jernih dan stabil\r\n\r\nSpeaker & mic jernih, tanpa noise\r\n\r\nSensor & tombol fisik normal dan responsif\r\n\r\niCloud: kosong, siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 13 128 GB Pink (Bea Cukai / bekas)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:09:37', '2025-12-03 05:37:34'),
(41, 'IPHONE 15 PLUS', 'iphone-15-plus-2', '128 GB', 'Blue', 'WIFI ONLY', 'uploads/produk/1764764719_WhatsApp Image 2025-12-02 at 18.11.15.jpeg', 12000000, 1, 'Kondisi Fisik & Fungsi iPhone 15 Plus 128 GB WiFi‑Only Blue\r\n\r\nModel: iPhone 15 Plus\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Blue\r\nKoneksi: WiFi‑Only\r\nAsal: Bekas, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat, kondisi sangat baik — tanpa lecet, gores, atau dent\r\n\r\nLayar bersih, tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi & Fitur\r\n\r\nIMEI/registrasi: terdaftar resmi — aman digunakan\r\n\r\nFace ID: cepat dan akurat\r\n\r\nTrue Tone: aktif, nyaman di semua kondisi cahaya\r\n\r\nKamera / Multimedia / Sensor / Audio\r\n\r\nKamera belakang & depan berfungsi (Wide / Ultra Wide sesuai model)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & mic bersih, tanpa noise\r\n\r\nSensor & tombol fisik normal dan responsif\r\n\r\niCloud kosong — siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 15 Plus 128 GB Blue (WiFi‑Only / Bekas / Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:25:19', '2025-12-03 05:37:26'),
(42, 'IPHONE 13', 'iphone-13-3', '128 GB', 'Green', 'WIFI ONLY', 'uploads/produk/1764764815_WhatsApp Image 2025-10-10 at 16.16.00 (1).jpeg', 6600000, 1, 'Kondisi Fisik & Fungsi iPhone 13 128 GB WiFi‑Only Hijau\r\n\r\nModel: iPhone 13\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Hijau\r\nKoneksi: WiFi‑Only\r\nAsal: Bekas / Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat — kondisi sangat baik, tanpa lecet, gores, atau dent\r\n\r\nLayar bersih — tidak ada dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok atau bengkok\r\n\r\nFungsi & Fitur\r\n\r\nIMEI / registrasi: terdaftar resmi — aman digunakan\r\n\r\nFace ID: cepat dan akurat\r\n\r\nTrue Tone: aktif, nyaman di semua kondisi cahaya\r\n\r\nKamera / Multimedia / Sensor / Audio\r\n\r\nKamera belakang & depan berfungsi (Wide / Ultra‑Wide sesuai versi)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & mic bersih, tanpa noise\r\n\r\nSemua sensor & tombol fisik normal dan responsif\r\n\r\niCloud kosong — siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 13 128 GB Hijau (WiFi‑Only / Bekas / Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:26:55', '2025-12-03 05:37:13'),
(43, 'IPHONE 14 PRO MAX', 'iphone-14-pro-max-2', '512 GB', 'Gold', 'WIFI ONLY', 'uploads/produk/1764764981_WhatsApp Image 2025-10-10 at 22.27.03.jpeg', 18000000, 1, 'Kondisi Fisik & Fungsi iPhone 14 Pro Max 512 GB WiFi‑Only Gold\r\n\r\nModel: iPhone 14 Pro Max\r\nKapasitas Penyimpanan: 512 GB\r\nWarna: Gold\r\nKoneksi: WiFi‑Only\r\nAsal: Bekas / Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat — kondisi sangat baik, tanpa lecet, gores, atau dent\r\n\r\nLayar bersih — tidak ada dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok atau bengkok\r\n\r\nFungsi & Fitur\r\n\r\nIMEI/registrasi: terdaftar resmi — aman digunakan\r\n\r\nFace ID: cepat dan akurat\r\n\r\nTrue Tone: aktif, nyaman di semua kondisi cahaya\r\n\r\nKamera / Multimedia / Sensor / Audio\r\n\r\nKamera belakang & depan berfungsi (Wide / Ultra Wide / Telephoto sesuai model)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & mic bersih, tanpa noise\r\n\r\nSemua sensor & tombol fisik normal dan responsif\r\n\r\niCloud kosong — siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 14 Pro Max 512 GB Gold (WiFi‑Only / Bekas / Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:29:41', '2025-12-03 05:36:06'),
(44, 'IPHONE 15', 'iphone-15-3', '128 GB', 'Hijau', 'WIFI ONLY', 'uploads/produk/1764765132_WhatsApp Image 2025-10-10 at 22.30.05.jpeg', 7800000, 1, 'Model: iPhone 15\r\nKapasitas Penyimpanan: 128 GB\r\nWarna: Hijau\r\nKoneksi: WiFi‑Only\r\nAsal: Bekas, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat — kondisi sangat baik, tanpa lecet, gores, atau dent\r\n\r\nLayar bersih — tanpa dead pixel atau shadow\r\n\r\nFrame presisi, tidak penyok\r\n\r\nFungsi & Fitur\r\n\r\nIMEI / registrasi: terdaftar resmi — aman digunakan\r\n\r\nFace ID: cepat dan akurat\r\n\r\nTrue Tone: aktif, nyaman di semua kondisi cahaya\r\n\r\nKamera / Multimedia / Sensor / Audio\r\n\r\nSemua fungsi kamera (wide, ultra‑wide sesuai model) berfungsi\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & mic bersih — tanpa noise\r\n\r\nSensor & tombol fisik normal dan responsif\r\n\r\niCloud kosong — siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 15 128 GB Hijau (WiFi‑Only / Bekas / Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:32:12', '2025-12-03 05:36:00'),
(45, 'IPHONE 17 PRO MAX', 'iphone-17-pro-max-3', '256 GB', 'Orange', 'WIFI ONLY', 'uploads/produk/1764765224_WhatsApp Image 2025-12-01 at 20.07.44.jpeg', 18000000, 1, 'Model: iPhone 17 Pro Max\r\nKapasitas Penyimpanan: 256 GB\r\nWarna: Orange\r\nKoneksi: WiFi‑Only\r\nAsal: Bekas, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat — kondisi sangat baik, tanpa lecet, gores, atau dent\r\n\r\nLayar bersih — tanpa dead pixel atau shadow\r\n\r\nFrame presisi — tidak penyok atau bengkok\r\n\r\nFungsi & Fitur\r\n\r\nIMEI / registrasi: terdaftar resmi — aman digunakan\r\n\r\nFace ID: cepat dan akurat\r\n\r\nTrue Tone (jika tersedia di model unit) — nyaman di semua kondisi cahaya\r\n\r\nKamera / Multimedia / Sensor / Audio\r\n\r\nKamera belakang & depan berfungsi (Wide / Ultra‑Wide / Telephoto sesuai model)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & mic bersih — tanpa noise\r\n\r\nSensor & tombol fisik normal dan responsif\r\n\r\niCloud kosong — siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 17 Pro Max 256 GB Orange (WiFi‑Only / Bekas / Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:33:44', '2025-12-03 05:35:53'),
(46, 'IPHONE 17 PRO', 'iphone-17-pro-2', '1 TB', 'Blue', 'WIFI ONLY', 'uploads/produk/1764765345_WhatsApp Image 2025-12-01 at 20.08.24 (2).jpeg', 22000000, 1, 'Model: iPhone 17 Pro\r\nKapasitas Penyimpanan: 1 TB\r\nWarna: Blue\r\nKoneksi: WiFi‑Only\r\nAsal: Bekas, Bea Cukai / Resmi Indonesia\r\n\r\nKondisi Fisik\r\n\r\nMulus dan terawat — kondisi sangat baik, tanpa lecet, gores, atau dent\r\n\r\nLayar bersih — tanpa dead pixel atau shadow\r\n\r\nFrame presisi — tidak penyok atau bengkok\r\n\r\nFungsi & Fitur\r\n\r\nIMEI / registrasi: terdaftar resmi — aman digunakan\r\n\r\nFace ID: cepat dan akurat\r\n\r\nTrue Tone / pengaturan warna layar: aktif dan nyaman di semua kondisi cahaya\r\n\r\nKamera / Multimedia / Sensor / Audio\r\n\r\nKamera belakang & depan berfungsi (wide, ultra‑wide, telephoto sesuai versi Pro)\r\n\r\nHasil foto & video jernih dan stabil\r\n\r\nSpeaker & mic bersih — tanpa noise\r\n\r\nSemua sensor & tombol fisik normal dan responsif\r\n\r\niCloud kosong — siap login Apple ID baru\r\n\r\nKelengkapan\r\n\r\nUnit iPhone 17 Pro 1 TB Blue (WiFi‑Only / Bekas / Bea Cukai)\r\n\r\nKotak original\r\n\r\nBuku manual\r\n\r\nSIM ejector\r\n\r\nKabel charger', 'wifionly', NULL, '2025-12-03 05:35:45', '2025-12-03 05:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urutan` int(10) UNSIGNED DEFAULT NULL,
  `gambar` varchar(191) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `urutan`, `gambar`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'images/sliders/1763918436_Desktop - 3.png', NULL, '2025-11-22 07:16:10', '2025-11-23 10:20:36'),
(3, 3, 'images/sliders/1764332253_SLIDER 3.png', NULL, '2025-11-22 07:16:10', '2025-11-28 05:17:33'),
(6, NULL, 'images/sliders/1764765802_Desktop - 2 (1).png', NULL, '2025-12-03 05:43:22', '2025-12-03 05:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(191) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `foto`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 'images/tes3.jpg', NULL, '2025-11-22 07:04:48', '2025-11-22 07:04:48'),
(4, 'images/tes4.jpeg', NULL, '2025-11-22 07:04:48', '2025-11-22 07:04:48'),
(5, 'images/tes5.jpeg', NULL, '2025-11-22 07:04:48', '2025-11-22 07:04:48'),
(6, 'images/tes6.jpeg', NULL, '2025-11-22 07:04:48', '2025-11-22 07:04:48'),
(9, 'uploads/testimoni/1764216460_IMG_20251010_163131.jpg', NULL, '2025-11-26 21:07:40', '2025-11-26 21:07:40'),
(12, 'uploads/testimoni/1764301464_WhatsApp Image 2025-11-27 at 20.56.07.jpeg', NULL, '2025-11-27 20:44:24', '2025-11-27 20:44:24'),
(13, 'uploads/testimoni/1764301473_WhatsApp Image 2025-11-27 at 20.53.42.jpeg', NULL, '2025-11-27 20:44:33', '2025-11-27 20:44:33'),
(15, 'uploads/testimoni/1764413894_WhatsApp Image 2025-11-29 at 17.55.04.jpeg', NULL, '2025-11-29 03:58:14', '2025-11-29 03:58:14'),
(16, 'uploads/testimoni/1764519855_WhatsApp Image 2025-11-30 at 22.00.21.jpeg', NULL, '2025-11-30 09:24:15', '2025-11-30 09:24:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_sections`
--
ALTER TABLE `about_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `fk_products_admin` (`created_by`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sliders_product` (`product_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_testimonials_product` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_admin` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `fk_sliders_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `fk_testimonials_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
