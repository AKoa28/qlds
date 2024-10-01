-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2024 lúc 06:35 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlds1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datsan`
--

CREATE TABLE `datsan` (
  `MaDatSan` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `MaSan` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `KhungGio` varchar(11) NOT NULL,
  `TrangThai` varchar(500) NOT NULL,
  `TongTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `datsan`
--

INSERT INTO `datsan` (`MaDatSan`, `MaNguoiDung`, `MaSan`, `NgayDat`, `KhungGio`, `TrangThai`, `TongTien`) VALUES
(4, 1, 1, '2024-10-01', '7h-8h30', 'Còn trống', 100000),
(5, 1, 1, '2024-09-23', '7h-8h30', 'Đã đặt', 0),
(6, 3, 3, '2024-10-15', '9h-10h30', 'Còn trống', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `MaDiaChi` int(11) NOT NULL,
  `TenDiaChi` varchar(255) NOT NULL,
  `DiaDiem` varchar(255) NOT NULL,
  `HinhDaiDien` varchar(255) NOT NULL,
  `SoDienThoai` text NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi`
--

INSERT INTO `diachi` (`MaDiaChi`, `TenDiaChi`, `DiaDiem`, `HinhDaiDien`, `SoDienThoai`, `MoTa`) VALUES
(1, 'Sân Bóng Nguyễn Văn Bảo', '4 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 'diachi1.jpg', '0321456789', ''),
(2, 'Sân Bóng IUH', '10 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 'diachi2.jpg', '0987654321', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `MaGia` int(11) NOT NULL,
  `GiaTheoKhungGio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gia`
--

INSERT INTO `gia` (`MaGia`, `GiaTheoKhungGio`) VALUES
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
-- Cấu trúc bảng cho bảng `hinh`
--

CREATE TABLE `hinh` (
  `MaHinh` int(11) NOT NULL,
  `MaSan` int(11) NOT NULL,
  `Hinh` varchar(255) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh`
--

INSERT INTO `hinh` (`MaHinh`, `MaSan`, `Hinh`, `MoTa`) VALUES
(1, 1, 'hinh1.jpg', 'Sân 7'),
(2, 2, 'san5.jpg', 'Sân 5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khunggio`
--

CREATE TABLE `khunggio` (
  `MaKhungGio` int(11) NOT NULL,
  `TenKhungGio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khunggio`
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
-- Cấu trúc bảng cho bảng `lich`
--

CREATE TABLE `lich` (
  `MaLich` int(11) NOT NULL,
  `MaSan` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `KhungGio` time NOT NULL,
  `DaDat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lich`
--

INSERT INTO `lich` (`MaLich`, `MaSan`, `NgayDat`, `KhungGio`, `DaDat`) VALUES
(1, 1, '2024-09-24', '07:30:00', 1),
(2, 0, '2024-09-23', '06:30:00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisan`
--

CREATE TABLE `loaisan` (
  `MaLoai` int(11) NOT NULL,
  `TenLoaiSan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisan`
--

INSERT INTO `loaisan` (`MaLoai`, `TenLoaiSan`) VALUES
(1, 'Sân 5'),
(2, 'Sân 7'),
(3, 'Sân 11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` int(11) NOT NULL,
  `SoDienThoai` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MaVaiTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaNguoiDung`, `SoDienThoai`, `MatKhau`, `HoTen`, `Email`, `MaVaiTro`) VALUES
(1, '01234567899', '202cb962ac59075b964b07152d234b70', 'Lý Anh Khoa', 'lyanhkhoa@gmail.com', 1),
(2, '0123456789', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn A', 'nguyenvana123@gmail.com', 1),
(3, '012345', '202cb962ac59075b964b07152d234b70', 'nguyen van a', 'a@gamil.com', 2),
(4, '01234555', '202cb962ac59075b964b07152d234b70', 'nguyen van b', 'dgledng', 3),
(5, '012323434245', '202cb962ac59075b964b07152d234b70', 'Trần Thị B', 'TranThiB@gmail.com', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san`
--

CREATE TABLE `san` (
  `MaSan` int(11) NOT NULL,
  `TenSan` varchar(255) NOT NULL,
  `MaLoaiSan` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `MaHinh` int(11) NOT NULL,
  `MaLich` int(11) NOT NULL,
  `MaDiaChi` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san`
--

INSERT INTO `san` (`MaSan`, `TenSan`, `MaLoaiSan`, `TrangThai`, `MaHinh`, `MaLich`, `MaDiaChi`, `HienThi`) VALUES
(1, 'Sân số 1', 1, 1, 1, 1, 1, 1),
(2, 'Sân số 2', 2, 1, 2, 1, 1, 1),
(3, 'Sân số 3', 3, 1, 1, 1, 1, 1),
(4, 'Sân số 4', 1, 1, 1, 1, 1, 1),
(5, 'Sân số 5', 3, 1, 1, 1, 1, 1),
(6, 'Số 1', 2, 1, 1, 1, 2, 1),
(7, 'Số 2', 3, 1, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanvsgiavskhunggio`
--

CREATE TABLE `sanvsgiavskhunggio` (
  `MaSan` int(11) NOT NULL,
  `MaGia` int(11) NOT NULL,
  `KhungGio` int(11) NOT NULL,
  `MaThu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanvsgiavskhunggio`
--

INSERT INTO `sanvsgiavskhunggio` (`MaSan`, `MaGia`, `KhungGio`, `MaThu`) VALUES
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
-- Cấu trúc bảng cho bảng `thutrongtuan`
--

CREATE TABLE `thutrongtuan` (
  `MaThu` int(11) NOT NULL,
  `TenThu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thutrongtuan`
--

INSERT INTO `thutrongtuan` (`MaThu`, `TenThu`) VALUES
(1, 'Thứ 2'),
(2, 'Thứ 3'),
(3, 'Thứ 4'),
(4, 'Thứ 5'),
(5, 'Thứ 6'),
(6, 'Thứ 7'),
(7, 'Chủ Nhật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `MaTrangThai` int(11) NOT NULL,
  `TrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`MaTrangThai`, `TrangThai`) VALUES
(1, 'Chưa đặt'),
(2, 'Đã được đặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `MaVaiTro` int(11) NOT NULL,
  `TenVaiTro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`MaVaiTro`, `TenVaiTro`) VALUES
(1, 'Khách Hàng'),
(2, 'Nhân Viên'),
(3, 'Nhân Viên Quản Lý'),
(4, 'Chủ Sân');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `datsan`
--
ALTER TABLE `datsan`
  ADD PRIMARY KEY (`MaDatSan`),
  ADD KEY `fk_san` (`MaSan`),
  ADD KEY `manguoiDung` (`MaNguoiDung`) USING BTREE;

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`MaDiaChi`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`MaGia`);

--
-- Chỉ mục cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `fk_sanhinh` (`MaSan`);

--
-- Chỉ mục cho bảng `khunggio`
--
ALTER TABLE `khunggio`
  ADD PRIMARY KEY (`MaKhungGio`);

--
-- Chỉ mục cho bảng `lich`
--
ALTER TABLE `lich`
  ADD PRIMARY KEY (`MaLich`),
  ADD UNIQUE KEY `MaSan` (`MaSan`);

--
-- Chỉ mục cho bảng `loaisan`
--
ALTER TABLE `loaisan`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`),
  ADD KEY `fk_vaitro` (`MaVaiTro`);

--
-- Chỉ mục cho bảng `san`
--
ALTER TABLE `san`
  ADD PRIMARY KEY (`MaSan`),
  ADD KEY `fk_loaisan` (`MaLoaiSan`),
  ADD KEY `fk_diachi` (`MaDiaChi`),
  ADD KEY `fk_lich` (`MaLich`),
  ADD KEY `fk_trangthai` (`TrangThai`);

--
-- Chỉ mục cho bảng `sanvsgiavskhunggio`
--
ALTER TABLE `sanvsgiavskhunggio`
  ADD PRIMARY KEY (`MaSan`,`MaGia`,`KhungGio`,`MaThu`),
  ADD KEY `fk_giavssan` (`MaGia`),
  ADD KEY `fk_khunggio` (`KhungGio`),
  ADD KEY `fk_thu` (`MaThu`);

--
-- Chỉ mục cho bảng `thutrongtuan`
--
ALTER TABLE `thutrongtuan`
  ADD PRIMARY KEY (`MaThu`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`MaTrangThai`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`MaVaiTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `datsan`
--
ALTER TABLE `datsan`
  MODIFY `MaDatSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `MaDiaChi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `gia`
--
ALTER TABLE `gia`
  MODIFY `MaGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hinh`
--
ALTER TABLE `hinh`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khunggio`
--
ALTER TABLE `khunggio`
  MODIFY `MaKhungGio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `lich`
--
ALTER TABLE `lich`
  MODIFY `MaLich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaisan`
--
ALTER TABLE `loaisan`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `san`
--
ALTER TABLE `san`
  MODIFY `MaSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `thutrongtuan`
--
ALTER TABLE `thutrongtuan`
  MODIFY `MaThu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `MaTrangThai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `MaVaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `datsan`
--
ALTER TABLE `datsan`
  ADD CONSTRAINT `fk_nguoidung` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`),
  ADD CONSTRAINT `fk_san` FOREIGN KEY (`MaSan`) REFERENCES `san` (`MaSan`);

--
-- Các ràng buộc cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD CONSTRAINT `fk_sanhinh` FOREIGN KEY (`MaSan`) REFERENCES `san` (`MaSan`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `fk_vaitro` FOREIGN KEY (`MaVaiTro`) REFERENCES `vaitro` (`MaVaiTro`);

--
-- Các ràng buộc cho bảng `san`
--
ALTER TABLE `san`
  ADD CONSTRAINT `fk_diachi` FOREIGN KEY (`MaDiaChi`) REFERENCES `diachi` (`MaDiaChi`),
  ADD CONSTRAINT `fk_lich` FOREIGN KEY (`MaLich`) REFERENCES `lich` (`MaLich`),
  ADD CONSTRAINT `fk_loaisan` FOREIGN KEY (`MaLoaiSan`) REFERENCES `loaisan` (`MaLoai`),
  ADD CONSTRAINT `fk_trangthai` FOREIGN KEY (`TrangThai`) REFERENCES `trangthai` (`MaTrangThai`);

--
-- Các ràng buộc cho bảng `sanvsgiavskhunggio`
--
ALTER TABLE `sanvsgiavskhunggio`
  ADD CONSTRAINT `fk_giavssan` FOREIGN KEY (`MaGia`) REFERENCES `gia` (`MaGia`),
  ADD CONSTRAINT `fk_khunggio` FOREIGN KEY (`KhungGio`) REFERENCES `khunggio` (`MaKhungGio`),
  ADD CONSTRAINT `fk_sanvsgia` FOREIGN KEY (`MaSan`) REFERENCES `san` (`MaSan`),
  ADD CONSTRAINT `fk_thu` FOREIGN KEY (`MaThu`) REFERENCES `thutrongtuan` (`MaThu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
