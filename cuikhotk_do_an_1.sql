-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 07, 2022 lúc 07:19 PM
-- Phiên bản máy phục vụ: 5.7.36-cll-lve
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuikhotk_do_an_1`
--
CREATE DATABASE IF NOT EXISTS `cuikhotk_do_an_1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cuikhotk_do_an_1`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh`
--

CREATE TABLE `anh` (
  `ma` int(10) UNSIGNED NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `ma_laptop` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card_do_hoa`
--

CREATE TABLE `card_do_hoa` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL,
  `chuan_bo_nho` varchar(10) NOT NULL,
  `VRAM` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `card_do_hoa`
--

INSERT INTO `card_do_hoa` (`ma`, `ten`, `chuan_bo_nho`, `VRAM`) VALUES
(1, '1660', 'DDR6', 6),
(2, '3060', 'DDR6', 12),
(3, 'Intel UHD Graphics', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `CPU`
--

CREATE TABLE `CPU` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL,
  `the_he` int(2) UNSIGNED NOT NULL,
  `ma_nha_san_xuat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `CPU`
--

INSERT INTO `CPU` (`ma`, `ten`, `the_he`, `ma_nha_san_xuat`) VALUES
(1, 'i5 11400', 11, 4),
(2, 'ryzen 5 5600H', 5, 5),
(3, 'i5 8265U', 8, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ma_khach_hang` int(10) UNSIGNED NOT NULL,
  `thoi_gian_dat` date NOT NULL,
  `ma_dia_chi` int(10) UNSIGNED NOT NULL,
  `ghi_chu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hoa_don` int(10) UNSIGNED NOT NULL,
  `ma_san_pham` int(10) UNSIGNED NOT NULL,
  `so_luong` int(3) UNSIGNED NOT NULL,
  `gia_san_pham` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL,
  `gioi_tinh` int(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mat_khau` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho_hang`
--

CREATE TABLE `kho_hang` (
  `ma_laptop` int(10) UNSIGNED NOT NULL,
  `so_luong` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kho_hang`
--

INSERT INTO `kho_hang` (`ma_laptop`, `so_luong`) VALUES
(1, 120),
(2, 150),
(3, 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `laptop`
--

CREATE TABLE `laptop` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL,
  `gia` int(10) NOT NULL,
  `ma_nha_san_xuat` int(10) NOT NULL,
  `ma_loai` int(10) NOT NULL,
  `bao_mat` varchar(100) NOT NULL,
  `wifi` varchar(100) NOT NULL,
  `van_tay` int(1) NOT NULL,
  `he_dieu_hanh` varchar(100) NOT NULL,
  `nhan_dien_khuon_mat` int(1) NOT NULL,
  `bluetooth` varchar(100) NOT NULL,
  `ma_man_hinh` int(10) NOT NULL,
  `ma_cpu` int(10) NOT NULL,
  `ma_o_cung` int(10) NOT NULL,
  `ma_card_do_hoa` int(10) NOT NULL,
  `ma_RAM` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `laptop`
--

INSERT INTO `laptop` (`ma`, `ten`, `gia`, `ma_nha_san_xuat`, `ma_loai`, `bao_mat`, `wifi`, `van_tay`, `he_dieu_hanh`, `nhan_dien_khuon_mat`, `bluetooth`, `ma_man_hinh`, `ma_cpu`, `ma_o_cung`, `ma_card_do_hoa`, `ma_RAM`) VALUES
(1, 'asus tuf', 22000000, 2, 2, 'tpm 2.0', 'wf 6', 1, 'win 10 home', 0, 'blu 5.1', 3, 1, 1, 1, 1),
(2, 'acer nitro 5', 25000000, 1, 2, 'tpm 2.0', 'wf 6', 1, 'win 10 home', 0, 'blu 5.1', 3, 2, 2, 2, 2),
(3, 'asus zenbook', 24000000, 2, 3, 'tpm 2.0', 'wf 6', 1, 'win 10 home', 1, 'blu 5.1', 1, 3, 1, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_laptop`
--

CREATE TABLE `loai_laptop` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai_laptop`
--

INSERT INTO `loai_laptop` (`ma`, `ten`) VALUES
(1, 'Worksation'),
(2, 'Gamming'),
(3, 'Ultrabook');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `man_hinh`
--

CREATE TABLE `man_hinh` (
  `ma` int(10) UNSIGNED NOT NULL,
  `loai_tam_nen` varchar(20) NOT NULL,
  `kich_thuoc` float NOT NULL,
  `do_phan_giai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `man_hinh`
--

INSERT INTO `man_hinh` (`ma`, `loai_tam_nen`, `kich_thuoc`, `do_phan_giai`) VALUES
(1, 'IPS LCD', 14, 'Full HD'),
(2, 'OLED', 16, '2K'),
(3, 'IPS LCD', 15, 'Full HD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL,
  `sdt` int(12) NOT NULL,
  `gioi_tinh` int(1) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mat_khau` varchar(32) NOT NULL,
  `cap_do` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_san_xuat`
--

CREATE TABLE `nha_san_xuat` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nha_san_xuat`
--

INSERT INTO `nha_san_xuat` (`ma`, `ten`) VALUES
(1, 'acer'),
(2, 'asus'),
(3, 'lenovo'),
(4, 'Intel'),
(5, 'AMD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `o_cung`
--

CREATE TABLE `o_cung` (
  `ma` int(10) UNSIGNED NOT NULL,
  `loai` varchar(20) NOT NULL,
  `dung_luong` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `o_cung`
--

INSERT INTO `o_cung` (`ma`, `loai`, `dung_luong`) VALUES
(1, 'SSD', 256),
(2, 'SSD', 512);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `RAM`
--

CREATE TABLE `RAM` (
  `ma` int(10) UNSIGNED NOT NULL,
  `dung_luong` int(2) NOT NULL,
  `chuan_bo_nho` varchar(10) NOT NULL,
  `bus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `RAM`
--

INSERT INTO `RAM` (`ma`, `dung_luong`, `chuan_bo_nho`, `bus`) VALUES
(1, 8, 'DDR4', 2666),
(2, 16, 'DDR4', 3200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `so_dia_chi`
--

CREATE TABLE `so_dia_chi` (
  `ma` int(10) UNSIGNED NOT NULL,
  `ten_nguoi_nhan` varchar(100) NOT NULL,
  `dia_chi_nhan_hang` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` int(12) UNSIGNED NOT NULL,
  `ma_khach_hang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `card_do_hoa`
--
ALTER TABLE `card_do_hoa`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `CPU`
--
ALTER TABLE `CPU`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD KEY `ma_hoa_don` (`ma_hoa_don`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `kho_hang`
--
ALTER TABLE `kho_hang`
  ADD PRIMARY KEY (`ma_laptop`);

--
-- Chỉ mục cho bảng `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `loai_laptop`
--
ALTER TABLE `loai_laptop`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `man_hinh`
--
ALTER TABLE `man_hinh`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `o_cung`
--
ALTER TABLE `o_cung`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `RAM`
--
ALTER TABLE `RAM`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `so_dia_chi`
--
ALTER TABLE `so_dia_chi`
  ADD PRIMARY KEY (`ma`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anh`
--
ALTER TABLE `anh`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `card_do_hoa`
--
ALTER TABLE `card_do_hoa`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `CPU`
--
ALTER TABLE `CPU`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `kho_hang`
--
ALTER TABLE `kho_hang`
  MODIFY `ma_laptop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `laptop`
--
ALTER TABLE `laptop`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loai_laptop`
--
ALTER TABLE `loai_laptop`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `man_hinh`
--
ALTER TABLE `man_hinh`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `o_cung`
--
ALTER TABLE `o_cung`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `RAM`
--
ALTER TABLE `RAM`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `so_dia_chi`
--
ALTER TABLE `so_dia_chi`
  MODIFY `ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
