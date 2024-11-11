-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2024 lúc 02:52 PM
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
-- Cơ sở dữ liệu: `qlds`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdatsan`
--

CREATE TABLE `chitietdatsan` (
  `MaChiTiet` int(11) NOT NULL,
  `MaSan` int(11) NOT NULL,
  `MaDatSan` int(11) NOT NULL,
  `NgayDatSan` date NOT NULL,
  `KhungGio` varchar(255) DEFAULT NULL,
  `GioBatDau` time DEFAULT NULL,
  `GioKetThuc` time DEFAULT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdatsan`
--

INSERT INTO `chitietdatsan` (`MaChiTiet`, `MaSan`, `MaDatSan`, `NgayDatSan`, `KhungGio`, `GioBatDau`, `GioKetThuc`, `DonGia`) VALUES
(1, 1, 4, '2024-10-28', '7:00-8:30', NULL, NULL, 100000),
(2, 2, 7, '2024-10-29', '15:00-16:30', NULL, NULL, 100000),
(3, 3, 12, '2024-10-30', NULL, '07:00:00', '22:00:00', 1500000),
(4, 4, 12, '2024-10-30', NULL, '07:00:00', '22:00:00', 1500000),
(67, 1, 60, '2024-10-27', '7:00-8:30', NULL, NULL, 200000),
(68, 2, 60, '2024-10-27', '7:00-8:30', NULL, NULL, 200000),
(69, 1, 61, '2024-10-31', '7:00-8:30', NULL, NULL, 100000),
(70, 2, 61, '2024-10-31', '7:00-8:30', NULL, NULL, 100000),
(71, 3, 61, '2024-10-31', '7:00-8:30', NULL, NULL, 100000),
(72, 1, 62, '2024-11-01', '7:00-8:30', NULL, NULL, 100000),
(73, 2, 62, '2024-11-01', '7:00-8:30', NULL, NULL, 100000),
(74, 3, 62, '2024-11-01', '7:00-8:30', NULL, NULL, 100000),
(81, 6, 69, '2024-10-31', '7:00-8:30', NULL, NULL, 100000),
(82, 3, 70, '2024-11-10', '7:00-8:30', NULL, NULL, 200000),
(83, 4, 70, '2024-11-10', '7:00-8:30', NULL, NULL, 200000),
(84, 6, 71, '2024-11-10', '7:00-8:30', NULL, NULL, 200000),
(85, 6, 71, '2024-11-10', '9:00-10:30', NULL, NULL, 200000),
(86, 5, 72, '2024-11-10', '7:00-8:30', NULL, NULL, 200000),
(87, 1, 72, '2024-11-10', '9:00-10:30', NULL, NULL, 200000),
(88, 4, 73, '2024-11-10', '17:00-18:30', NULL, NULL, 600000),
(89, 5, 73, '2024-11-10', '17:00-18:30', NULL, NULL, 600000),
(90, 4, 74, '2024-11-10', '21:00-22:30', NULL, NULL, 900000),
(91, 5, 74, '2024-11-10', '21:00-22:30', NULL, NULL, 900000),
(92, 1, 75, '2024-11-11', '7:00-8:30', NULL, NULL, 100000),
(93, 2, 75, '2024-11-11', '7:00-8:30', NULL, NULL, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chusan`
--

CREATE TABLE `chusan` (
  `MaChuSan` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chusan`
--

INSERT INTO `chusan` (`MaChuSan`, `MaTaiKhoan`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datsan`
--

CREATE TABLE `datsan` (
  `MaDatSan` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `NgayDat` datetime NOT NULL,
  `TrangThai` varchar(500) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `MaDiaDiem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `datsan`
--

INSERT INTO `datsan` (`MaDatSan`, `MaKhachHang`, `MaNhanVien`, `NgayDat`, `TrangThai`, `TongTien`, `MaDiaDiem`) VALUES
(4, 1, 1, '2024-10-01 00:00:00', 'Không duyệt', 100000, 1),
(7, 1, 1, '2024-10-04 00:00:00', 'Ưu tiên', 100000, 1),
(12, 1, 1, '2024-10-20 00:00:00', 'Chờ duyệt', 3000000, 1),
(60, 1, NULL, '2024-10-26 14:10:30', 'Ưu tiên', 400000, 1),
(61, 49, NULL, '2024-10-30 13:46:32', 'Chờ duyệt', 300000, 1),
(62, 48, NULL, '2024-10-30 13:47:31', 'Ưu tiên', 300000, 1),
(69, 57, NULL, '2024-10-30 23:40:34', 'Chờ duyệt', 100000, 2),
(70, 56, NULL, '2024-11-10 00:15:14', 'Ưu tiên', 400000, 1),
(71, 48, NULL, '2024-11-10 00:49:48', 'Ưu tiên', 400000, 2),
(72, 48, NULL, '2024-11-10 00:56:22', 'Ưu tiên', 400000, 1),
(73, 56, NULL, '2024-11-10 15:00:17', 'Đã duyệt', 1200000, 1),
(74, 56, NULL, '2024-11-10 15:14:47', 'Ưu tiên', 1800000, 1),
(75, 56, NULL, '2024-11-10 21:47:36', 'Đã duyệt', 200000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadiem`
--

CREATE TABLE `diadiem` (
  `MaDiaDiem` int(11) NOT NULL,
  `MaChuSan` int(11) NOT NULL,
  `TenDiaDiem` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `HinhDaiDien` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diadiem`
--

INSERT INTO `diadiem` (`MaDiaDiem`, `MaChuSan`, `TenDiaDiem`, `DiaChi`, `HinhDaiDien`, `MoTa`) VALUES
(1, 1, 'Sân Bóng Nguyễn Văn Bảo', '4 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 'diachi1.jpg', ''),
(2, 2, 'Sân Bóng IUH', '10 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 'diachi2.jpg', ''),
(3, 1, 'Địa điểm 3', '123', 'diachi1.jpg', '123'),
(4, 2, 'Địa điểm 4', '123', 'bg2.jpg', '123'),
(9, 2, 'đại chỉ 4', '123', 'bg1.jpg', '12345566');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `MaGia` int(11) NOT NULL,
  `Gia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gia`
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
-- Cấu trúc bảng cho bảng `hinh`
--

CREATE TABLE `hinh` (
  `MaHinh` int(11) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh`
--

INSERT INTO `hinh` (`MaHinh`, `Url`, `MoTa`) VALUES
(1, 'hinh1.jpg', 'Sân 7'),
(2, 'san5.jpg', 'Sân 5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `TrangThai` varchar(255) NOT NULL,
  `XacNhan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `MaTaiKhoan`, `TrangThai`, `XacNhan`) VALUES
(1, 3, 'Có tài khoản', 'Đã xác nhận'),
(27, 68, 'Có tài khoản', 'Chưa xác nhận'),
(37, 78, 'Có tài khoản', 'Chưa xác nhận'),
(40, 81, 'Có tài khoản', 'Chưa xác nhận'),
(48, 102, 'Có tài khoản', 'Chưa xác nhận'),
(49, 103, 'Có tài khoản', ''),
(50, 104, 'Có tài khoản', 'Chưa xác nhận'),
(56, 110, 'Có tài khoản', 'Chưa xác nhận'),
(57, 111, 'Có tài khoản', 'Chưa xác nhận');

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
(1, '7:00-8:30'),
(2, '9:00-10:30'),
(3, '11:00-12:30'),
(4, '13:00-14:30'),
(5, '15:00-16:30'),
(6, '17:00-18:30'),
(7, '19:00-20:30'),
(8, '21:00-22:30');

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
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `ChucVu` varchar(255) NOT NULL,
  `MaDiaDiem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `MaTaiKhoan`, `ChucVu`, `MaDiaDiem`) VALUES
(1, 4, 'Nhân Viên', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san`
--

CREATE TABLE `san` (
  `MaSan` int(11) NOT NULL,
  `TenSan` varchar(255) NOT NULL,
  `MaLoaiSan` int(11) NOT NULL,
  `MaHinh` int(11) NOT NULL,
  `MaDiaDiem` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san`
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
-- Cấu trúc bảng cho bảng `san_gia_thu_khunggio`
--

CREATE TABLE `san_gia_thu_khunggio` (
  `MaSan` int(11) NOT NULL,
  `MaGia` int(11) NOT NULL,
  `KhungGio` int(11) NOT NULL,
  `MaThu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_gia_thu_khunggio`
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
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `SDT` char(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MatKhau` varchar(255) DEFAULT NULL,
  `CapNhatLanCuoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `Ten`, `SDT`, `Email`, `MatKhau`, `CapNhatLanCuoi`) VALUES
(1, 'Chủ sân 1', '0919456789', 'chusan1@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(2, 'Chủ sân 2', '0387654321', 'chusan2@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(3, 'Nguyễn Văn Khách A', '0919999999', 'NguyenVKA@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(4, 'Nguyễn Một A', '0382468135', 'nhanviensan1a@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(68, 'Lý Anh A', '0382034043', 'lyanhkhoa123@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', '2024-10-24 19:54:56'),
(78, 'Lý Anh Khoa', '03820340443', 'lyanhkhoa987@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2024-10-26 06:35:36'),
(81, 'tết 2025', '0984445364', 'tet2025@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-26 14:14:05'),
(102, 'Lý Anh Khoa', '0382034046', 'lyanhkhoa789@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 13:25:34'),
(103, 'Lý Văn Khoa', '0908456123', 'lyanhkhoa8777@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 13:50:16'),
(104, 'Lý Anh Khoa', '0984445360', 'lyanhkhoa788@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 13:49:23'),
(110, 'Lý Anh Khoa', '0555555555', 'lyanhkhoa555@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 23:37:42'),
(111, 'Người Dùng Mới', '0908456127', 'lyanhkhoa2k3@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 23:41:12');

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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdatsan`
--
ALTER TABLE `chitietdatsan`
  ADD PRIMARY KEY (`MaChiTiet`),
  ADD KEY `fk_ms_ctds` (`MaSan`),
  ADD KEY `fk_mds_ctds` (`MaDatSan`);

--
-- Chỉ mục cho bảng `chusan`
--
ALTER TABLE `chusan`
  ADD PRIMARY KEY (`MaChuSan`),
  ADD KEY `fk_tk_cs` (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `datsan`
--
ALTER TABLE `datsan`
  ADD PRIMARY KEY (`MaDatSan`),
  ADD KEY `fk_khachhang` (`MaKhachHang`),
  ADD KEY `fk_nhanvien` (`MaNhanVien`),
  ADD KEY `fk_dd_ds` (`MaDiaDiem`);

--
-- Chỉ mục cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  ADD PRIMARY KEY (`MaDiaDiem`),
  ADD KEY `fd_cs_dd` (`MaChuSan`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`MaGia`);

--
-- Chỉ mục cho bảng `hinh`
--
ALTER TABLE `hinh`
  ADD PRIMARY KEY (`MaHinh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD KEY `fk_kh_tk` (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `khunggio`
--
ALTER TABLE `khunggio`
  ADD PRIMARY KEY (`MaKhungGio`);

--
-- Chỉ mục cho bảng `loaisan`
--
ALTER TABLE `loaisan`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD KEY `fk_nv_tk` (`MaTaiKhoan`),
  ADD KEY `fk_nv_dd` (`MaDiaDiem`);

--
-- Chỉ mục cho bảng `san`
--
ALTER TABLE `san`
  ADD PRIMARY KEY (`MaSan`),
  ADD KEY `fk_dd_s` (`MaDiaDiem`),
  ADD KEY `fk_l_s` (`MaLoaiSan`),
  ADD KEY `fk_hinh` (`MaHinh`);

--
-- Chỉ mục cho bảng `san_gia_thu_khunggio`
--
ALTER TABLE `san_gia_thu_khunggio`
  ADD PRIMARY KEY (`MaSan`,`MaGia`,`KhungGio`,`MaThu`),
  ADD KEY `fk_thu` (`MaThu`),
  ADD KEY `fk_khunggio` (`KhungGio`),
  ADD KEY `fk_gia` (`MaGia`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `thutrongtuan`
--
ALTER TABLE `thutrongtuan`
  ADD PRIMARY KEY (`MaThu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdatsan`
--
ALTER TABLE `chitietdatsan`
  MODIFY `MaChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `chusan`
--
ALTER TABLE `chusan`
  MODIFY `MaChuSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `datsan`
--
ALTER TABLE `datsan`
  MODIFY `MaDatSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `MaDiaDiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `khunggio`
--
ALTER TABLE `khunggio`
  MODIFY `MaKhungGio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loaisan`
--
ALTER TABLE `loaisan`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `san`
--
ALTER TABLE `san`
  MODIFY `MaSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `thutrongtuan`
--
ALTER TABLE `thutrongtuan`
  MODIFY `MaThu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdatsan`
--
ALTER TABLE `chitietdatsan`
  ADD CONSTRAINT `fk_mds_ctds` FOREIGN KEY (`MaDatSan`) REFERENCES `datsan` (`MaDatSan`),
  ADD CONSTRAINT `fk_ms_ctds` FOREIGN KEY (`MaSan`) REFERENCES `san` (`MaSan`);

--
-- Các ràng buộc cho bảng `chusan`
--
ALTER TABLE `chusan`
  ADD CONSTRAINT `fk_tk_cs` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `datsan`
--
ALTER TABLE `datsan`
  ADD CONSTRAINT `fk_dd_ds` FOREIGN KEY (`MaDiaDiem`) REFERENCES `diadiem` (`MaDiaDiem`),
  ADD CONSTRAINT `fk_kh_ds` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`),
  ADD CONSTRAINT `fk_nv_ds` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`);

--
-- Các ràng buộc cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  ADD CONSTRAINT `fd_cs_dd` FOREIGN KEY (`MaChuSan`) REFERENCES `chusan` (`MaChuSan`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_kh_tk` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nv_dd` FOREIGN KEY (`MaDiaDiem`) REFERENCES `diadiem` (`MaDiaDiem`),
  ADD CONSTRAINT `fk_nv_tk` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `san`
--
ALTER TABLE `san`
  ADD CONSTRAINT `fk_dd_s` FOREIGN KEY (`MaDiaDiem`) REFERENCES `diadiem` (`MaDiaDiem`),
  ADD CONSTRAINT `fk_hinh` FOREIGN KEY (`MaHinh`) REFERENCES `hinh` (`MaHinh`),
  ADD CONSTRAINT `fk_l_s` FOREIGN KEY (`MaLoaiSan`) REFERENCES `loaisan` (`MaLoai`);

--
-- Các ràng buộc cho bảng `san_gia_thu_khunggio`
--
ALTER TABLE `san_gia_thu_khunggio`
  ADD CONSTRAINT `fk_gia` FOREIGN KEY (`MaGia`) REFERENCES `gia` (`MaGia`),
  ADD CONSTRAINT `fk_khunggio` FOREIGN KEY (`KhungGio`) REFERENCES `khunggio` (`MaKhungGio`),
  ADD CONSTRAINT `fk_san` FOREIGN KEY (`MaSan`) REFERENCES `san` (`MaSan`),
  ADD CONSTRAINT `fk_thu` FOREIGN KEY (`MaThu`) REFERENCES `thutrongtuan` (`MaThu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
