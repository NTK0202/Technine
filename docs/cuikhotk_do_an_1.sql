-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2022 at 01:04 PM
-- Server version: 5.7.36-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuikhotk_do_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `anh`
--

CREATE TABLE `anh` (
  `ma` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_laptop` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cau_hinh`
--

CREATE TABLE `cau_hinh` (
  `ma` int(10) NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cau_hinh`
--

INSERT INTO `cau_hinh` (`ma`, `ten`) VALUES
(1, 'RAM'),
(2, 'CPU'),
(3, 'Màn Hình'),
(4, 'Ổ Cứng'),
(5, 'RAM');

-- --------------------------------------------------------

--
-- Table structure for table `cau_hinh_chi_tiet`
--

CREATE TABLE `cau_hinh_chi_tiet` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ma_cau_hinh` int(10) UNSIGNED NOT NULL,
  `gia_tri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cau_hinh_chi_tiet`
--

INSERT INTO `cau_hinh_chi_tiet` (`ma`, `ma_cau_hinh`, `gia_tri`) VALUES
(6, 1, '4GB__DDR4__3200MHz'),
(7, 1, '8GB__DDR4__3200MHz'),
(8, 2, 'Intel__Core I9__10900K'),
(9, 2, 'Intel__Core I7__10900K'),
(10, 2, 'Intel__Core I5__10900K'),
(11, 2, 'AMD_Ryzen 5__5600H'),
(12, 2, 'AMD_Ryzen 7__5600H'),
(13, 2, 'AMD_Ryzen 9__5600H'),
(15, 3, '15.6 Inch__FHD__IPS'),
(16, 3, '14 Inch__2K__Oled'),
(17, 4, 'SSD__120GB'),
(18, 4, 'SSD__256GB'),
(19, 4, 'SSD__512GB');

-- --------------------------------------------------------

--
-- Table structure for table `cau_hinh_laptop`
--

CREATE TABLE `cau_hinh_laptop` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ma_laptop` int(10) UNSIGNED NOT NULL,
  `ma_cau_hinh_chi_tiet` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cau_hinh_laptop`
--

INSERT INTO `cau_hinh_laptop` (`ma`, `ma_laptop`, `ma_cau_hinh_chi_tiet`) VALUES
(1, 1, 7),
(2, 1, 8),
(3, 1, 16),
(4, 1, 19),
(7, 4, 11),
(8, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ma_khach_hang` int(10) UNSIGNED NOT NULL,
  `thoi_gian_dat` date NOT NULL,
  `ma_dia_chi` int(10) UNSIGNED NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma` int(10) NOT NULL,
  `ma_hoa_don` int(10) UNSIGNED NOT NULL,
  `ma_san_pham` int(10) UNSIGNED NOT NULL,
  `so_luong` int(5) UNSIGNED NOT NULL,
  `gia_san_pham` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma` int(10) NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` int(1) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma`, `ten`, `gioi_tinh`, `email`, `mat_khau`) VALUES
(1, 'Đỗ Sinh', 0, 'tonykms210@gmail.com', 'cf2fc45713aec2f2d2b64ecc5d832660');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`ma`, `ten`, `gia`) VALUES
(1, 'Acer Test-3110', 32000000),
(4, 'asus rog strix', 22000000);

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` int(1) UNSIGNED NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cap_do` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `so_dia_chi`
--

CREATE TABLE `so_dia_chi` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten_nguoi_nhan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_nhan_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_khach_hang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `cau_hinh`
--
ALTER TABLE `cau_hinh`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `cau_hinh_chi_tiet`
--
ALTER TABLE `cau_hinh_chi_tiet`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `ma_cau_hinh` (`ma_cau_hinh`);

--
-- Indexes for table `cau_hinh_laptop`
--
ALTER TABLE `cau_hinh_laptop`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `ma_laptop` (`ma_laptop`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `ma_hoa_don` (`ma_hoa_don`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `so_dia_chi`
--
ALTER TABLE `so_dia_chi`
  ADD PRIMARY KEY (`ma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anh`
--
ALTER TABLE `anh`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cau_hinh`
--
ALTER TABLE `cau_hinh`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cau_hinh_chi_tiet`
--
ALTER TABLE `cau_hinh_chi_tiet`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cau_hinh_laptop`
--
ALTER TABLE `cau_hinh_laptop`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `so_dia_chi`
--
ALTER TABLE `so_dia_chi`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
