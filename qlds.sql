-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 09:12 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlds`
--

-- --------------------------------------------------------

--
-- Table structure for table `datsan`
--

CREATE TABLE `datsan` (
  `MaDatSan` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `MaSan` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `KhungGio` varchar(11) NOT NULL,
  `TrangThai` varchar(500) NOT NULL,
  `TongTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datsan`
--

INSERT INTO `datsan` (`MaDatSan`, `MaKhachHang`, `MaNhanVien`, `MaSan`, `NgayDat`, `KhungGio`, `TrangThai`, `TongTien`) VALUES
(4, 1, 1, 1, '2024-10-01', '7h-8h30', 'Chờ duyệt', 100000),
(7, 1, 1, 5, '2024-10-04', '15h-16h30', 'Chờ duyệt', 100000),
(10, 1, 1, 3, '2024-10-05', '9h-10h30', 'Chờ duyệt', 200000),
(11, 1, 1, 3, '2024-10-03', '9h-10h30', 'Chờ duyệt', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `diadiem`
--

CREATE TABLE `diadiem` (
  `MaDiaDiem` int(11) NOT NULL,
  `TenDiaDiem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HinhDaiDien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenChuSan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diadiem`
--

INSERT INTO `diadiem` (`MaDiaDiem`, `TenDiaDiem`, `DiaChi`, `HinhDaiDien`, `SoDienThoai`, `MoTa`, `TenChuSan`, `MatKhau`) VALUES
(1, 'Sân Bóng Nguyễn Văn Bảo', '4 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 'diachi1.jpg', '0321456789', '', '', ''),
(2, 'Sân Bóng IUH', '10 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 'diachi.jpg', '0987654321', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gia`
--

CREATE TABLE `gia` (
  `MaGia` int(11) NOT NULL,
  `Gia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gia`
--

INSERT INTO `gia` (`MaGia`, `Gia`) VALUES
(1, 100000),
(2, 200000),
(3, 300000),
(4, 400000),
(5, 500000),
(6, 600000),
(7, 700000),
(8, 800000),
(9, 900000),
(10, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `hinh`
--

CREATE TABLE `hinh` (
  `MaHinh` int(11) NOT NULL,
  `Url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinh`
--

INSERT INTO `hinh` (`MaHinh`, `Url`, `MoTa`) VALUES
(1, 'hinh1.jpg', 'Sân 7'),
(2, 'san5.jpg', 'Sân 5');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `Ten`, `SDT`, `Email`, `MatKhau`, `TrangThai`) VALUES
(1, 'Khách hàng 1', '01231250724112', '1@gmail.com', '123', 'afk');

-- --------------------------------------------------------

--
-- Table structure for table `khunggio`
--

CREATE TABLE `khunggio` (
  `MaKhungGio` int(11) NOT NULL,
  `TenKhungGio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khunggio`
--

INSERT INTO `khunggio` (`MaKhungGio`, `TenKhungGio`) VALUES
(1, '7h-8h30'),
(2, '9h-10h30'),
(3, '11h-12h30'),
(4, '13h-14h30'),
(5, '15h-16h30'),
(6, '17h-18h30'),
(7, '19h-20h30'),
(8, '21h-22h30');

-- --------------------------------------------------------

--
-- Table structure for table `loaisan`
--

CREATE TABLE `loaisan` (
  `MaLoai` int(11) NOT NULL,
  `TenLoaiSan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisan`
--

INSERT INTO `loaisan` (`MaLoai`, `TenLoaiSan`) VALUES
(1, 'Sân 5'),
(2, 'Sân 7'),
(3, 'Sân 11');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaDiaDiem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `SDT`, `ChucVu`, `MatKhau`, `MaDiaDiem`) VALUES
(1, 'Nhân viên 1', '01234567', 'ẹt', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `san`
--

CREATE TABLE `san` (
  `MaSan` int(11) NOT NULL,
  `TenSan` varchar(255) NOT NULL,
  `MaLoaiSan` int(11) NOT NULL,
  `MaHinh` int(11) NOT NULL,
  `MaDiaDiem` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `san`
--

INSERT INTO `san` (`MaSan`, `TenSan`, `MaLoaiSan`, `MaHinh`, `MaDiaDiem`, `HienThi`) VALUES
(1, 'Sân số 1', 1, 1, 1, 1),
(2, 'Sân số 2', 2, 2, 1, 1),
(3, 'Sân số 3', 3, 1, 1, 1),
(4, 'Sân số 4', 1, 1, 1, 1),
(5, 'Sân số 5', 3, 1, 1, 1),
(6, 'Số 1', 2, 1, 2, 1),
(7, 'Số 2', 3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `san_gia_thu_khunggio`
--

CREATE TABLE `san_gia_thu_khunggio` (
  `MaSan` int(11) NOT NULL,
  `MaGia` int(11) NOT NULL,
  `KhungGio` int(11) NOT NULL,
  `MaThu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_gia_thu_khunggio`
--

INSERT INTO `san_gia_thu_khunggio` (`MaSan`, `MaGia`, `KhungGio`, `MaThu`) VALUES
(1, 1, 1, 1),
(1, 1, 1, 2),
(1, 1, 1, 3),
(1, 1, 1, 4),
(1, 1, 1, 5),
(1, 1, 2, 1),
(1, 1, 2, 2),
(1, 1, 2, 3),
(1, 1, 2, 4),
(1, 1, 2, 5),
(1, 1, 3, 1),
(1, 1, 3, 2),
(1, 1, 3, 3),
(1, 1, 3, 4),
(1, 1, 3, 5),
(1, 1, 5, 1),
(1, 1, 5, 2),
(1, 1, 5, 3),
(1, 1, 5, 4),
(1, 1, 5, 5),
(1, 2, 1, 6),
(1, 2, 1, 7),
(1, 2, 2, 6),
(1, 2, 2, 7),
(1, 2, 3, 6),
(1, 2, 3, 7),
(1, 2, 5, 6),
(1, 2, 5, 7),
(1, 5, 6, 1),
(1, 5, 6, 2),
(1, 5, 6, 3),
(1, 5, 6, 4),
(1, 5, 6, 5),
(1, 6, 6, 6),
(1, 6, 6, 7),
(1, 7, 7, 1),
(1, 7, 7, 2),
(1, 7, 7, 3),
(1, 7, 7, 4),
(1, 7, 7, 5),
(1, 8, 7, 6),
(1, 8, 7, 7),
(1, 8, 8, 1),
(1, 8, 8, 2),
(1, 8, 8, 3),
(1, 8, 8, 4),
(1, 8, 8, 5),
(1, 9, 8, 6),
(1, 9, 8, 7),
(2, 1, 1, 1),
(2, 1, 1, 2),
(2, 1, 1, 3),
(2, 1, 1, 4),
(2, 1, 1, 5),
(2, 1, 2, 1),
(2, 1, 2, 2),
(2, 1, 2, 3),
(2, 1, 2, 4),
(2, 1, 2, 5),
(2, 1, 3, 1),
(2, 1, 3, 2),
(2, 1, 3, 3),
(2, 1, 3, 4),
(2, 1, 3, 5),
(2, 1, 5, 1),
(2, 1, 5, 2),
(2, 1, 5, 3),
(2, 1, 5, 4),
(2, 1, 5, 5),
(2, 2, 1, 6),
(2, 2, 1, 7),
(2, 2, 2, 6),
(2, 2, 2, 7),
(2, 2, 3, 6),
(2, 2, 3, 7),
(2, 2, 5, 6),
(2, 2, 5, 7),
(2, 5, 6, 1),
(2, 5, 6, 2),
(2, 5, 6, 3),
(2, 5, 6, 4),
(2, 5, 6, 5),
(2, 6, 6, 6),
(2, 6, 6, 7),
(2, 7, 7, 1),
(2, 7, 7, 2),
(2, 7, 7, 3),
(2, 7, 7, 4),
(2, 7, 7, 5),
(2, 8, 7, 6),
(2, 8, 7, 7),
(2, 8, 8, 1),
(2, 8, 8, 2),
(2, 8, 8, 3),
(2, 8, 8, 4),
(2, 8, 8, 5),
(2, 9, 8, 6),
(2, 9, 8, 7),
(3, 1, 1, 1),
(3, 1, 1, 2),
(3, 1, 1, 3),
(3, 1, 1, 4),
(3, 1, 1, 5),
(3, 1, 2, 1),
(3, 1, 2, 2),
(3, 1, 2, 3),
(3, 1, 2, 4),
(3, 1, 2, 5),
(3, 1, 3, 1),
(3, 1, 3, 2),
(3, 1, 3, 3),
(3, 1, 3, 4),
(3, 1, 3, 5),
(3, 1, 5, 1),
(3, 1, 5, 2),
(3, 1, 5, 3),
(3, 1, 5, 4),
(3, 1, 5, 5),
(3, 2, 1, 6),
(3, 2, 1, 7),
(3, 2, 2, 6),
(3, 2, 2, 7),
(3, 2, 3, 6),
(3, 2, 3, 7),
(3, 2, 5, 6),
(3, 2, 5, 7),
(3, 5, 6, 1),
(3, 5, 6, 2),
(3, 5, 6, 3),
(3, 5, 6, 4),
(3, 5, 6, 5),
(3, 6, 6, 6),
(3, 6, 6, 7),
(3, 7, 7, 1),
(3, 7, 7, 2),
(3, 7, 7, 3),
(3, 7, 7, 4),
(3, 7, 7, 5),
(3, 8, 7, 6),
(3, 8, 7, 7),
(3, 8, 8, 1),
(3, 8, 8, 2),
(3, 8, 8, 3),
(3, 8, 8, 4),
(3, 8, 8, 5),
(3, 9, 8, 6),
(3, 9, 8, 7),
(4, 1, 1, 1),
(4, 1, 1, 2),
(4, 1, 1, 3),
(4, 1, 1, 4),
(4, 1, 1, 5),
(4, 1, 2, 1),
(4, 1, 2, 2),
(4, 1, 2, 3),
(4, 1, 2, 4),
(4, 1, 2, 5),
(4, 1, 3, 1),
(4, 1, 3, 2),
(4, 1, 3, 3),
(4, 1, 3, 4),
(4, 1, 3, 5),
(4, 1, 5, 1),
(4, 1, 5, 2),
(4, 1, 5, 3),
(4, 1, 5, 4),
(4, 1, 5, 5),
(4, 2, 1, 6),
(4, 2, 1, 7),
(4, 2, 2, 6),
(4, 2, 2, 7),
(4, 2, 3, 6),
(4, 2, 3, 7),
(4, 2, 5, 6),
(4, 2, 5, 7),
(4, 5, 6, 1),
(4, 5, 6, 2),
(4, 5, 6, 3),
(4, 5, 6, 4),
(4, 5, 6, 5),
(4, 6, 6, 6),
(4, 6, 6, 7),
(4, 7, 7, 1),
(4, 7, 7, 2),
(4, 7, 7, 3),
(4, 7, 7, 4),
(4, 7, 7, 5),
(4, 8, 7, 6),
(4, 8, 7, 7),
(4, 8, 8, 1),
(4, 8, 8, 2),
(4, 8, 8, 3),
(4, 8, 8, 4),
(4, 8, 8, 5),
(4, 9, 8, 6),
(4, 9, 8, 7),
(5, 1, 1, 1),
(5, 1, 1, 2),
(5, 1, 1, 3),
(5, 1, 1, 4),
(5, 1, 1, 5),
(5, 1, 2, 1),
(5, 1, 2, 2),
(5, 1, 2, 3),
(5, 1, 2, 4),
(5, 1, 2, 5),
(5, 1, 3, 1),
(5, 1, 3, 2),
(5, 1, 3, 3),
(5, 1, 3, 4),
(5, 1, 3, 5),
(5, 1, 5, 1),
(5, 1, 5, 2),
(5, 1, 5, 3),
(5, 1, 5, 4),
(5, 1, 5, 5),
(5, 2, 1, 6),
(5, 2, 1, 7),
(5, 2, 2, 6),
(5, 2, 2, 7),
(5, 2, 3, 6),
(5, 2, 3, 7),
(5, 2, 5, 6),
(5, 2, 5, 7),
(5, 5, 6, 1),
(5, 5, 6, 2),
(5, 5, 6, 3),
(5, 5, 6, 4),
(5, 5, 6, 5),
(5, 6, 6, 6),
(5, 6, 6, 7),
(5, 7, 7, 1),
(5, 7, 7, 2),
(5, 7, 7, 3),
(5, 7, 7, 4),
(5, 7, 7, 5),
(5, 8, 7, 6),
(5, 8, 7, 7),
(5, 8, 8, 1),
(5, 8, 8, 2),
(5, 8, 8, 3),
(5, 8, 8, 4),
(5, 8, 8, 5),
(5, 9, 8, 6),
(5, 9, 8, 7),
(6, 1, 1, 1),
(6, 1, 1, 2),
(6, 1, 1, 3),
(6, 1, 1, 4),
(6, 1, 1, 5),
(6, 1, 2, 1),
(6, 1, 2, 2),
(6, 1, 2, 3),
(6, 1, 2, 4),
(6, 1, 2, 5),
(6, 1, 3, 1),
(6, 1, 3, 2),
(6, 1, 3, 3),
(6, 1, 3, 4),
(6, 1, 3, 5),
(6, 1, 4, 1),
(6, 1, 4, 2),
(6, 1, 4, 3),
(6, 1, 4, 4),
(6, 1, 4, 5),
(6, 1, 5, 1),
(6, 1, 5, 2),
(6, 1, 5, 3),
(6, 1, 5, 4),
(6, 1, 5, 5),
(6, 2, 1, 6),
(6, 2, 1, 7),
(6, 2, 2, 6),
(6, 2, 2, 7),
(6, 2, 3, 6),
(6, 2, 3, 7),
(6, 2, 4, 6),
(6, 2, 4, 7),
(6, 2, 5, 6),
(6, 2, 5, 7),
(6, 5, 6, 1),
(6, 5, 6, 2),
(6, 5, 6, 3),
(6, 5, 6, 4),
(6, 5, 6, 5),
(6, 6, 6, 6),
(6, 6, 6, 7),
(6, 7, 7, 1),
(6, 7, 7, 2),
(6, 7, 7, 3),
(6, 7, 7, 4),
(6, 7, 7, 5),
(6, 8, 7, 6),
(6, 8, 7, 7),
(6, 8, 8, 1),
(6, 8, 8, 2),
(6, 8, 8, 3),
(6, 8, 8, 4),
(6, 8, 8, 5),
(6, 9, 8, 6),
(6, 9, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `thutrongtuan`
--

CREATE TABLE `thutrongtuan` (
  `MaThu` int(11) NOT NULL,
  `TenThu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thutrongtuan`
--

INSERT INTO `thutrongtuan` (`MaThu`, `TenThu`) VALUES
(1, 'Thứ 2'),
(2, 'Thứ 3'),
(3, 'Thứ 4'),
(4, 'Thứ 5'),
(5, 'Thứ 6'),
(6, 'Thứ 7'),
(7, 'Chủ Nhật');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datsan`
--
ALTER TABLE `datsan`
  ADD PRIMARY KEY (`MaDatSan`),
  ADD KEY `fk_san` (`MaSan`),
  ADD KEY `fk_khachhang` (`MaKhachHang`),
  ADD KEY `fk_nhanvien` (`MaNhanVien`);

--
-- Indexes for table `diadiem`
--
ALTER TABLE `diadiem`
  ADD PRIMARY KEY (`MaDiaDiem`),
  ADD KEY `fk_hinh` (`HinhDaiDien`);

--
-- Indexes for table `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`MaGia`);

--
-- Indexes for table `hinh`
--
ALTER TABLE `hinh`
  ADD PRIMARY KEY (`MaHinh`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `SDT` (`SDT`) USING HASH;

--
-- Indexes for table `khunggio`
--
ALTER TABLE `khunggio`
  ADD PRIMARY KEY (`MaKhungGio`);

--
-- Indexes for table `loaisan`
--
ALTER TABLE `loaisan`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD UNIQUE KEY `SDT` (`SDT`) USING HASH;

--
-- Indexes for table `san`
--
ALTER TABLE `san`
  ADD PRIMARY KEY (`MaSan`),
  ADD KEY `fk_loaisan` (`MaLoaiSan`),
  ADD KEY `fk_diachi` (`MaDiaDiem`),
  ADD KEY `fk_mahinh` (`MaHinh`);

--
-- Indexes for table `san_gia_thu_khunggio`
--
ALTER TABLE `san_gia_thu_khunggio`
  ADD PRIMARY KEY (`MaSan`,`MaGia`,`KhungGio`,`MaThu`),
  ADD KEY `fk_giavssan` (`MaGia`),
  ADD KEY `fk_khunggio` (`KhungGio`),
  ADD KEY `fk_thu` (`MaThu`);

--
-- Indexes for table `thutrongtuan`
--
ALTER TABLE `thutrongtuan`
  ADD PRIMARY KEY (`MaThu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datsan`
--
ALTER TABLE `datsan`
  MODIFY `MaDatSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `MaDiaDiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gia`
--
ALTER TABLE `gia`
  MODIFY `MaGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hinh`
--
ALTER TABLE `hinh`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khunggio`
--
ALTER TABLE `khunggio`
  MODIFY `MaKhungGio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loaisan`
--
ALTER TABLE `loaisan`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `san`
--
ALTER TABLE `san`
  MODIFY `MaSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thutrongtuan`
--
ALTER TABLE `thutrongtuan`
  MODIFY `MaThu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datsan`
--
ALTER TABLE `datsan`
  ADD CONSTRAINT `fk_khachhang` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`),
  ADD CONSTRAINT `fk_nhanvien` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`),
  ADD CONSTRAINT `fk_san` FOREIGN KEY (`MaSan`) REFERENCES `san` (`MaSan`);

--
-- Constraints for table `san`
--
ALTER TABLE `san`
  ADD CONSTRAINT `fk_diadiem` FOREIGN KEY (`MaDiaDiem`) REFERENCES `diadiem` (`MaDiaDiem`),
  ADD CONSTRAINT `fk_loaisan` FOREIGN KEY (`MaLoaiSan`) REFERENCES `loaisan` (`MaLoai`),
  ADD CONSTRAINT `fk_mahinh` FOREIGN KEY (`MaHinh`) REFERENCES `hinh` (`MaHinh`);

--
-- Constraints for table `san_gia_thu_khunggio`
--
ALTER TABLE `san_gia_thu_khunggio`
  ADD CONSTRAINT `fk_giavssan` FOREIGN KEY (`MaGia`) REFERENCES `gia` (`MaGia`),
  ADD CONSTRAINT `fk_khunggio` FOREIGN KEY (`KhungGio`) REFERENCES `khunggio` (`MaKhungGio`),
  ADD CONSTRAINT `fk_sanvsgia` FOREIGN KEY (`MaSan`) REFERENCES `san` (`MaSan`),
  ADD CONSTRAINT `fk_thu` FOREIGN KEY (`MaThu`) REFERENCES `thutrongtuan` (`MaThu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
