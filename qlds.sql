-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2024 lúc 04:16 PM
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
(93, 2, 75, '2024-11-11', '7:00-8:30', NULL, NULL, 100000),
(94, 1, 76, '2024-11-17', '7:00-8:30', NULL, NULL, 200000),
(95, 4, 76, '2024-11-17', '7:00-8:30', NULL, NULL, 200000),
(96, 2, 77, '2024-11-17', '7:00-8:30', NULL, NULL, 200000),
(97, 3, 77, '2024-11-17', '7:00-8:30', NULL, NULL, 200000),
(98, 3, 78, '2024-11-16', '21:00-22:30', NULL, NULL, 900000),
(99, 5, 78, '2024-11-16', '21:00-22:30', NULL, NULL, 900000),
(100, 6, 79, '2024-11-16', '17:00-18:30', NULL, NULL, 600000),
(101, 6, 79, '2024-11-16', '19:00-20:30', NULL, NULL, 800000),
(102, 4, 80, '2024-11-16', '17:00-18:30', NULL, NULL, 600000),
(103, 6, 81, '2024-11-17', '7:00-8:30', NULL, NULL, 200000),
(104, 3, 82, '2024-11-17', '17:00-18:30', NULL, NULL, 600000),
(105, 5, 82, '2024-11-17', '17:00-18:30', NULL, NULL, 600000),
(106, 1, 83, '2024-11-16', '21:00-22:30', NULL, NULL, 900000),
(107, 5, 84, '2024-11-16', '19:00-20:30', NULL, NULL, 800000),
(108, 5, 85, '2024-11-16', '19:00-20:30', NULL, NULL, 800000),
(109, 6, 86, '2024-11-17', '13:00-14:30', NULL, NULL, 200000),
(110, 6, 86, '2024-11-17', '15:00-16:30', NULL, NULL, 200000),
(111, 6, 87, '2024-11-18', '11:00-12:30', NULL, NULL, 100000),
(112, 6, 87, '2024-11-18', '13:00-14:30', NULL, NULL, 100000),
(116, 6, 90, '2024-11-24', '7:00-8:30', NULL, NULL, 200000),
(117, 6, 90, '2024-11-24', '9:00-10:30', NULL, NULL, 200000),
(118, 6, 91, '2024-11-21', '7:00-8:30', NULL, NULL, 100000),
(119, 6, 91, '2024-11-22', '7:00-8:30', NULL, NULL, 100000),
(120, 2, 92, '2024-11-17', '21:00-22:30', NULL, NULL, 900000),
(121, 3, 92, '2024-11-17', '21:00-22:30', NULL, NULL, 900000),
(122, 5, 92, '2024-11-17', '21:00-22:30', NULL, NULL, 900000),
(124, 1, 94, '2024-11-20', '7:00-8:30', NULL, NULL, 100000),
(125, 4, 94, '2024-11-20', '7:00-8:30', NULL, NULL, 1),
(126, 1, 95, '2024-11-24', '7:00-8:30', NULL, NULL, 200000),
(127, 4, 95, '2024-11-24', '7:00-8:30', NULL, NULL, 2),
(128, 2, 95, '2024-11-24', '7:00-8:30', NULL, NULL, 2),
(133, 1, 100, '2024-11-26', NULL, '07:00:00', '22:30:00', 2400000),
(134, 2, 100, '2024-11-26', NULL, '07:00:00', '22:30:00', 900015),
(135, 1, 101, '2024-11-25', '21:00-22:30', NULL, NULL, 800000),
(136, 1, 102, '2024-12-01', NULL, '07:00:00', '22:30:00', 3100000),
(137, 1, 102, '2024-12-02', NULL, '07:00:00', '22:30:00', 3200000),
(138, 30, 102, '2024-12-01', NULL, '07:00:00', '10:30:00', 300000),
(139, 30, 102, '2024-12-02', NULL, '07:00:00', '10:30:00', 300000),
(140, 1, 103, '2024-12-06', '7:00-8:30', NULL, NULL, 100000),
(141, 4, 103, '2024-12-06', '7:00-8:30', NULL, NULL, 1),
(142, 2, 103, '2024-12-06', '7:00-8:30', NULL, NULL, 100000),
(143, 1, 104, '2024-11-28', '7:00-8:30', NULL, NULL, 100000),
(144, 4, 104, '2024-11-28', '7:00-8:30', NULL, NULL, 1),
(145, 2, 104, '2024-11-28', '7:00-8:30', NULL, NULL, 100000),
(146, 1, 105, '2024-12-16', NULL, '07:00:00', '22:30:00', 2500000),
(148, 1, 106, '2024-12-16', NULL, '07:00:00', '22:30:00', 2500000),
(149, 1, 106, '2024-12-11', NULL, '07:00:00', '22:30:00', 2500000),
(150, 1, 110, '2024-12-17', NULL, '07:00:00', '22:30:00', 2500000),
(151, 2, 110, '2024-12-17', NULL, '07:00:00', '22:30:00', 800016),
(154, 5, 112, '2024-12-31', NULL, '07:00:00', '22:30:00', 24),
(155, 30, 112, '2024-12-31', NULL, '07:00:00', '10:30:00', 300000),
(156, 1, 113, '2024-12-15', '7:00-8:30', NULL, NULL, 200000),
(157, 4, 113, '2024-12-15', '7:00-8:30', NULL, NULL, 2),
(158, 2, 113, '2024-12-15', '7:00-8:30', NULL, NULL, 2),
(159, 1, 114, '2024-12-29', NULL, '07:00:00', '22:30:00', 3100000),
(160, 2, 114, '2024-12-29', NULL, '07:00:00', '22:30:00', 31),
(161, 5, 115, '2024-12-21', NULL, '07:00:00', '22:30:00', 31),
(162, 30, 115, '2024-12-21', NULL, '07:00:00', '10:30:00', 300000),
(163, 3, 116, '2024-12-13', NULL, '07:00:00', '22:30:00', 200022),
(164, 3, 116, '2024-12-14', NULL, '07:00:00', '22:30:00', 31),
(165, 3, 116, '2024-12-15', NULL, '07:00:00', '22:30:00', 31),
(166, 38, 117, '2024-12-08', '7:00-8:30', NULL, NULL, 150000),
(167, 6, 117, '2024-12-08', '7:00-8:30', NULL, NULL, 2),
(168, 38, 118, '2024-12-15', NULL, '07:00:00', '22:30:00', 1050000),
(169, 6, 119, '2024-12-14', NULL, '07:00:00', '22:30:00', 33),
(170, 6, 119, '2024-12-15', NULL, '07:00:00', '22:30:00', 33),
(172, 38, 121, '2024-12-09', '7:00-8:30', NULL, NULL, 120000),
(173, 6, 121, '2024-12-09', '7:00-8:30', NULL, NULL, 1),
(174, 38, 121, '2024-12-09', '9:00-10:30', NULL, NULL, 120000),
(175, 1, 122, '2024-12-19', NULL, '07:00:00', '22:30:00', 2400000),
(176, 1, 122, '2024-12-20', NULL, '07:00:00', '22:30:00', 2400000),
(177, 2, 122, '2024-12-19', NULL, '07:00:00', '22:30:00', 900015),
(178, 2, 122, '2024-12-20', NULL, '07:00:00', '22:30:00', 900015),
(179, 2, 123, '2024-12-08', '17:00-18:30', NULL, NULL, 6),
(180, 3, 123, '2024-12-08', '17:00-18:30', NULL, NULL, 6),
(181, 1, 123, '2024-12-08', '19:00-20:30', NULL, NULL, 800000),
(182, 1, 124, '2024-12-09', '7:00-8:30', NULL, NULL, 200000),
(183, 2, 124, '2024-12-09', '7:00-8:30', NULL, NULL, 1),
(184, 3, 124, '2024-12-09', '7:00-8:30', NULL, NULL, 100000),
(185, 1, 125, '2024-12-11', '7:00-8:30', NULL, NULL, 200000),
(186, 2, 125, '2024-12-11', '7:00-8:30', NULL, NULL, 100000),
(187, 3, 125, '2024-12-11', '7:00-8:30', NULL, NULL, 100000),
(188, 1, 126, '2024-12-12', '7:00-8:30', NULL, NULL, 100000),
(189, 1, 126, '2024-12-13', '7:00-8:30', NULL, NULL, 100000),
(190, 1, 126, '2024-12-14', '7:00-8:30', NULL, NULL, 200000),
(191, 1, 127, '2024-12-10', '7:00-8:30', NULL, NULL, 200000),
(192, 2, 127, '2024-12-10', '7:00-8:30', NULL, NULL, 1),
(193, 3, 127, '2024-12-10', '7:00-8:30', NULL, NULL, 100000),
(194, 1, 128, '2024-12-22', '7:00-8:30', NULL, NULL, 200000),
(195, 2, 128, '2024-12-22', '7:00-8:30', NULL, NULL, 2),
(196, 3, 128, '2024-12-22', '7:00-8:30', NULL, NULL, 2),
(202, 1, 132, '2024-12-08', '21:00-22:30', NULL, NULL, 900000),
(203, 1, 133, '2024-12-22', '11:00-12:30', NULL, NULL, 200000),
(204, 38, 134, '2024-12-16', '7:00-8:30', NULL, NULL, 120000),
(205, 6, 134, '2024-12-16', '7:00-8:30', NULL, NULL, 1),
(206, 38, 134, '2024-12-16', '9:00-10:30', NULL, NULL, 120000),
(208, 1, 135, '2024-12-19', '7:00-8:30', NULL, NULL, 100000),
(209, 1, 135, '2024-12-20', '7:00-8:30', NULL, NULL, 100000),
(210, 6, 136, '2024-12-16', NULL, '07:00:00', '22:30:00', 25),
(211, 38, 137, '2024-12-19', '7:00-8:30', NULL, NULL, 120000),
(212, 6, 137, '2024-12-19', '7:00-8:30', NULL, NULL, 1),
(213, 38, 137, '2024-12-19', '9:00-10:30', NULL, NULL, 120000),
(214, 6, 138, '2024-12-19', NULL, '07:00:00', '22:30:00', 25),
(215, 38, 138, '2024-12-19', NULL, '07:00:00', '22:30:00', 840000),
(216, 2, 139, '2024-12-15', '9:00-10:30', NULL, NULL, 2),
(217, 2, 139, '2024-12-15', '19:00-20:30', NULL, NULL, 8),
(218, 2, 139, '2024-12-15', '21:00-22:30', NULL, NULL, 9),
(219, 2, 140, '2024-12-15', '15:00-16:30', NULL, NULL, 2),
(220, 2, 140, '2024-12-15', '11:00-12:30', NULL, NULL, 2),
(221, 2, 140, '2024-12-18', '7:00-8:30', NULL, NULL, 100000),
(222, 2, 141, '2024-12-16', NULL, '07:00:00', '22:30:00', 800016),
(223, 2, 142, '2024-12-14', '9:00-10:30', NULL, NULL, 2),
(224, 2, 142, '2024-12-14', '11:00-12:30', NULL, NULL, 2),
(225, 2, 142, '2024-12-14', '15:00-16:30', NULL, NULL, 2),
(226, 2, 142, '2024-12-14', '19:00-20:30', NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chusan`
--

CREATE TABLE `chusan` (
  `MaChuSan` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `TrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chusan`
--

INSERT INTO `chusan` (`MaChuSan`, `MaTaiKhoan`, `TrangThai`) VALUES
(1, 1, ''),
(2, 2, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datsan`
--

CREATE TABLE `datsan` (
  `MaDatSan` int(11) NOT NULL,
  `MaKhachHang` int(11) DEFAULT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `NgayDat` datetime NOT NULL,
  `TrangThai` varchar(500) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `MaDiaDiem` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `datsan`
--

INSERT INTO `datsan` (`MaDatSan`, `MaKhachHang`, `MaNhanVien`, `NgayDat`, `TrangThai`, `TongTien`, `MaDiaDiem`, `HienThi`) VALUES
(4, 1, 1, '2024-10-01 00:00:00', 'Không duyệt', 100000, 1, 1),
(7, 1, 1, '2024-10-04 00:00:00', 'Ưu tiên', 100000, 1, 1),
(12, 1, 1, '2024-10-20 00:00:00', 'Chờ duyệt', 3000000, 1, 1),
(60, 1, NULL, '2024-10-26 14:10:30', 'Ưu tiên', 400000, 1, 1),
(61, 49, NULL, '2024-10-30 13:46:32', 'Chờ duyệt', 300000, 1, 1),
(62, 48, NULL, '2024-10-30 13:47:31', 'Ưu tiên', 300000, 1, 1),
(69, 57, NULL, '2024-10-30 23:40:34', 'Chờ duyệt', 100000, 2, 1),
(70, 56, NULL, '2024-11-10 00:15:14', 'Ưu tiên', 400000, 1, 1),
(71, 48, NULL, '2024-11-10 00:49:48', 'Ưu tiên', 400000, 2, 1),
(72, 48, NULL, '2024-11-10 00:56:22', 'Ưu tiên', 400000, 1, 1),
(73, 56, NULL, '2024-11-10 15:00:17', 'Đã duyệt', 1200000, 1, 1),
(74, 56, NULL, '2024-11-10 15:14:47', 'Ưu tiên', 1800000, 1, 1),
(75, 56, NULL, '2024-11-10 21:47:36', 'Đã duyệt', 200000, 1, 1),
(76, 56, NULL, '2024-11-16 15:40:29', 'Ưu tiên', 400000, 1, 1),
(77, 56, NULL, '2024-11-16 15:41:23', 'Ưu tiên', 400000, 1, 1),
(78, 56, NULL, '2024-11-16 16:31:53', 'Ưu tiên', 1800000, 1, 1),
(79, 56, NULL, '2024-11-16 16:32:54', 'Ưu tiên', 1400000, 2, 1),
(80, 56, NULL, '2024-11-16 16:42:57', 'Ưu tiên', 600000, 1, 1),
(81, 57, NULL, '2024-11-16 16:50:27', 'Ưu tiên', 200000, 2, 1),
(82, 57, NULL, '2024-11-16 16:55:22', 'Ưu tiên', 1200000, 1, 1),
(83, 58, NULL, '2024-11-16 17:00:53', 'Ưu tiên', 900000, 1, 1),
(84, 58, NULL, '2024-11-16 17:10:22', 'Chờ duyệt', 800000, 1, 1),
(85, 59, NULL, '2024-11-16 17:12:44', 'Chờ duyệt', 800000, 1, 1),
(86, 50, NULL, '2024-11-16 17:13:15', 'Ưu tiên', 400000, 2, 1),
(87, 50, NULL, '2024-11-16 17:13:57', 'Ưu tiên', 200000, 2, 1),
(90, 61, NULL, '2024-11-16 18:59:32', 'Ưu tiên', 400000, 2, 1),
(91, 61, NULL, '2024-11-16 23:36:24', 'Ưu tiên', 200000, 2, 1),
(92, 62, NULL, '2024-11-16 23:41:04', 'Chờ duyệt', 2700000, 1, 1),
(93, 56, NULL, '2024-11-19 13:11:49', 'Ưu tiên', 40, 1, 1),
(94, 56, NULL, '2024-11-19 13:14:17', 'Ưu tiên', 100001, 1, 1),
(95, 56, NULL, '2024-11-19 13:27:34', 'Ưu tiên', 200004, 1, 1),
(100, NULL, NULL, '2024-11-25 18:15:57', 'Chờ duyệt', 3300015, 1, 1),
(101, 56, NULL, '2024-11-25 18:19:09', 'Ưu tiên', 800000, 1, 1),
(102, 56, NULL, '2024-11-25 22:31:57', 'Chờ duyệt', 6900000, 1, 1),
(103, 56, NULL, '2024-11-25 22:53:43', 'Ưu tiên', 200001, 1, 1),
(104, 56, NULL, '2024-11-27 18:00:41', 'Ưu tiên', 200001, 1, 1),
(105, 56, NULL, '2024-12-05 15:45:28', 'Đã duyệt', 2500000, 1, 1),
(106, 56, NULL, '2024-12-05 15:46:19', 'Đã duyệt', 7500000, 1, 1),
(107, 56, NULL, '2024-12-06 14:19:17', 'Ưu tiên', 0, 1, 1),
(108, 56, NULL, '2024-12-06 14:22:40', 'Ưu tiên', 800016, 1, 1),
(109, 56, NULL, '2024-12-06 14:22:42', 'Ưu tiên', 800016, 1, 1),
(110, 56, NULL, '2024-12-06 10:32:24', 'Không duyệt', 3300016, 1, 1),
(112, 56, NULL, '2024-12-06 14:48:08', 'Không duyệt', 300024, 1, 1),
(113, 56, NULL, '2024-12-06 14:56:30', 'Không duyệt', 200004, 1, 1),
(114, 61, NULL, '2024-12-06 15:38:12', 'Không duyệt', 3100031, 1, 1),
(115, 58, NULL, '2024-12-06 15:52:27', 'Không duyệt', 300031, 1, 1),
(116, 58, NULL, '2024-12-06 16:22:03', 'Không duyệt', 200084, 1, 1),
(117, 61, NULL, '2024-12-06 10:54:32', 'Ưu tiên', 150002, 2, 1),
(118, 61, NULL, '2024-12-06 17:12:08', 'Không duyệt', 1050000, 2, 1),
(119, 60, NULL, '2024-12-06 17:52:21', 'Không duyệt', 66, 2, 1),
(121, 1, NULL, '2024-12-07 22:32:42', 'Ưu tiên', 240001, 2, 1),
(122, 71, NULL, '2024-12-06 11:24:07', 'Không duyệt', 6600030, 1, 1),
(123, 71, NULL, '2024-12-08 12:42:29', 'Đã duyệt', 800012, 1, 1),
(124, 72, NULL, '2024-12-08 12:55:42', 'Đã duyệt', 300001, 1, 1),
(125, 72, NULL, '2024-12-08 12:57:23', 'Ưu tiên', 400000, 1, 1),
(126, 72, NULL, '2024-12-08 12:57:54', 'Ưu tiên', 400000, 1, 1),
(127, 56, NULL, '2024-12-08 12:59:09', 'Ưu tiên', 300001, 1, 1),
(128, 71, NULL, '2024-12-08 13:01:03', 'Không duyệt', 200004, 1, 1),
(132, 56, NULL, '2024-12-08 18:29:50', 'Ưu tiên', 900000, 1, 1),
(133, 56, NULL, '2024-12-09 10:23:54', 'Đã duyệt', 200000, 1, 1),
(134, 56, NULL, '2024-12-09 10:56:03', 'Không duyệt', 240001, 2, 1),
(135, 56, NULL, '2024-12-09 11:26:31', 'Không duyệt', 200000, 1, 1),
(136, 56, NULL, '2024-12-09 11:36:48', 'Ưu tiên', 25, 2, 1),
(137, 56, NULL, '2024-12-09 11:37:34', 'Ưu tiên', 240001, 2, 1),
(138, 56, NULL, '2024-12-09 11:38:04', 'Không duyệt', 840025, 2, 1),
(139, 71, NULL, '2024-12-09 15:04:28', 'Ưu tiên', 19, 1, 1),
(140, 62, NULL, '2024-12-09 15:11:06', 'Chờ duyệt', 100004, 1, 1),
(141, NULL, NULL, '2024-12-09 20:24:10', 'Ưu tiên', 800016, 1, 1),
(142, 71, NULL, '2024-12-09 20:31:25', 'Ưu tiên', 14, 1, 1);

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
  `MoTa` varchar(255) NOT NULL,
  `LoaiKhungGio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diadiem`
--

INSERT INTO `diadiem` (`MaDiaDiem`, `MaChuSan`, `TenDiaDiem`, `DiaChi`, `HinhDaiDien`, `MoTa`, `LoaiKhungGio`) VALUES
(1, 1, 'Sân Bóng Nguyễn Văn Bảo', '4 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 'diachi1.jpg', '', 1),
(2, 2, 'Sân Bóng IUH', '10 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh', 'diachi2.jpg', '', 1),
(3, 1, 'Địa điểm 3', '123', 'diachi1.jpg', '123', 2),
(4, 2, 'Địa điểm 4', '123', 'bg2.jpg', '123', 2),
(9, 2, 'đại chỉ 4', '123', 'bg1.jpg', '12345566', 1),
(10, 2, 'Địa chỉ 5', '123 ABNC', 'nen1.jpg', '123', 1),
(11, 1, 'Đia chỉ 6', '1213 abcdf', 'bg3.jpg', '123', 1),
(12, 1, 'Phường 1', 'Ha Noi', '675067dc2c5934.68526916.jpg', '123456', 1);

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
  `XacNhan` varchar(50) NOT NULL,
  `HienThi` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `MaTaiKhoan`, `TrangThai`, `XacNhan`, `HienThi`) VALUES
(1, 3, 'Có tài khoản', 'Đã xác nhận', 1),
(27, 68, 'Có tài khoản', 'Chưa xác nhận', 1),
(37, 78, 'Có tài khoản', 'Chưa xác nhận', 1),
(40, 81, 'Có tài khoản', 'Chưa xác nhận', 1),
(48, 102, 'Có tài khoản', 'Đã xác nhận', 1),
(49, 103, 'Có tài khoản', 'Chưa xác nhận', 1),
(50, 104, 'Có tài khoản', 'Chưa xác nhận', 1),
(56, 110, 'Có tài khoản', 'Chưa xác nhận', 1),
(57, 111, 'Có tài khoản', 'Chưa xác nhận', 1),
(58, 112, 'Có tài khoản', 'Chưa xác nhận', 1),
(59, 113, 'Có tài khoản', 'Chưa xác nhận', 1),
(60, 114, 'Có tài khoản', 'Chưa xác nhận', 1),
(61, 115, 'Có tài khoản', 'Chưa xác nhận', 1),
(62, 116, 'Vãng lai', '', 1),
(63, 117, 'Có tài khoản', 'Chưa xác nhận', 1),
(70, 124, 'Có tài khoản', 'Chưa xác nhận', 1),
(71, 1, 'Có tài khoản', 'Đã xác nhận', 1),
(72, 4, 'Có tài khoản', 'Đã xác nhận', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khunggio`
--

CREATE TABLE `khunggio` (
  `MaKhungGio` int(11) NOT NULL,
  `TenKhungGio` text NOT NULL,
  `MaLoaiKhungGio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khunggio`
--

INSERT INTO `khunggio` (`MaKhungGio`, `TenKhungGio`, `MaLoaiKhungGio`) VALUES
(1, '7:00-8:30', 1),
(2, '9:00-10:30', 1),
(3, '11:00-12:30', 1),
(4, '13:00-14:30', 1),
(5, '15:00-16:30', 1),
(6, '17:00-18:30', 1),
(7, '19:00-20:30', 1),
(8, '21:00-22:30', 1),
(9, '23:00-0:30', 1),
(10, '1:00-2:30', 1),
(11, '3:00-4:30', 1),
(12, '5:00-6:30', 1),
(13, '0:30-1:30', 2),
(14, '2:00-3:00', 2),
(15, '3:30-4:30', 2),
(16, '5:00-6:00', 2),
(17, '6:30-7:30', 2),
(18, '8:00-9:00', 2),
(19, '9:30-10:30', 2),
(20, '11:00-12:00', 2),
(21, '12:30-13:30', 2),
(22, '14:00-15:00', 2),
(23, '15:30-16:30', 2),
(24, '17:00-18:00', 2),
(25, '18:30-19:30', 2),
(26, '20:00-21:00', 2),
(27, '21:30-22:30', 2),
(28, '23:00-0:00', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhunggio`
--

CREATE TABLE `loaikhunggio` (
  `MaLoaiKhungGio` int(11) NOT NULL,
  `LoaiKhungGio` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaikhunggio`
--

INSERT INTO `loaikhunggio` (`MaLoaiKhungGio`, `LoaiKhungGio`, `MoTa`) VALUES
(1, '1:30', 'Khung giờ 1 tiếng rưỡi'),
(2, '1:00', 'Khung giờ 1 tiếng');

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
  `MaDiaDiem` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `MaTaiKhoan`, `ChucVu`, `MaDiaDiem`, `HienThi`) VALUES
(1, 4, 'Nhân viên', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san`
--

CREATE TABLE `san` (
  `MaSan` int(11) NOT NULL,
  `TenSan` varchar(255) NOT NULL,
  `MaLoaiSan` int(11) NOT NULL,
  `Hinh` varchar(255) NOT NULL,
  `MaDiaDiem` int(11) NOT NULL,
  `HienThi` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san`
--

INSERT INTO `san` (`MaSan`, `TenSan`, `MaLoaiSan`, `Hinh`, `MaDiaDiem`, `HienThi`) VALUES
(1, 'Sân số 1', 1, '1', 1, 1),
(2, 'Sân số 2', 2, '2', 1, 1),
(3, 'Sân số 3', 3, '1', 1, 1),
(4, 'Sân số 4', 1, '1', 1, 0),
(5, 'Sân số 5', 3, '1', 1, 0),
(6, 'Số 1', 2, '1', 2, 1),
(30, 'Sân số 6', 2, 'San_so_6.jpg', 1, 0),
(31, 'Sân ban đêm', 3, 'San_ban_dem.jpg', 2, 1),
(37, 'sân phường 1', 1, 'san_phuong_1.jpg', 12, 1),
(38, 'Số 2', 1, '', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_gia_thu_khunggio`
--

CREATE TABLE `san_gia_thu_khunggio` (
  `MaSan` int(11) NOT NULL,
  `Gia` int(11) NOT NULL DEFAULT 0,
  `KhungGio` int(11) NOT NULL,
  `MaThu` int(11) NOT NULL,
  `Ngay` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_gia_thu_khunggio`
--

INSERT INTO `san_gia_thu_khunggio` (`MaSan`, `Gia`, `KhungGio`, `MaThu`, `Ngay`) VALUES
(1, 200000, 1, 1, ''),
(1, 200000, 1, 1, '2024-12-2'),
(1, 200000, 1, 2, ''),
(1, 200000, 1, 3, ''),
(1, 100000, 1, 4, ''),
(1, 100000, 1, 5, ''),
(1, 200000, 1, 6, ''),
(1, 200000, 1, 7, ''),
(1, 100000, 2, 1, ''),
(1, 100000, 2, 2, ''),
(1, 100000, 2, 3, ''),
(1, 100000, 2, 4, ''),
(1, 100000, 2, 5, ''),
(1, 200000, 2, 6, ''),
(1, 200000, 2, 7, ''),
(1, 100000, 3, 1, ''),
(1, 100000, 3, 2, ''),
(1, 100000, 3, 3, ''),
(1, 100000, 3, 4, ''),
(1, 100000, 3, 5, ''),
(1, 200000, 3, 6, ''),
(1, 200000, 3, 7, ''),
(1, 100000, 5, 1, ''),
(1, 100000, 5, 2, ''),
(1, 100000, 5, 3, ''),
(1, 100000, 5, 4, ''),
(1, 100000, 5, 5, ''),
(1, 200000, 5, 6, ''),
(1, 200000, 5, 7, ''),
(1, 500000, 6, 1, ''),
(1, 500000, 6, 2, ''),
(1, 500000, 6, 3, ''),
(1, 500000, 6, 4, ''),
(1, 500000, 6, 5, ''),
(1, 600000, 6, 6, ''),
(1, 600000, 6, 7, ''),
(1, 700000, 7, 1, ''),
(1, 700000, 7, 2, ''),
(1, 700000, 7, 3, ''),
(1, 700000, 7, 4, ''),
(1, 700000, 7, 5, ''),
(1, 800000, 7, 6, ''),
(1, 800000, 7, 7, ''),
(1, 800000, 8, 1, ''),
(1, 800000, 8, 2, ''),
(1, 800000, 8, 3, ''),
(1, 800000, 8, 4, ''),
(1, 800000, 8, 5, ''),
(1, 900000, 8, 6, ''),
(1, 900000, 8, 7, ''),
(2, 1, 1, 1, ''),
(2, 1, 1, 2, ''),
(2, 100000, 1, 3, ''),
(2, 100000, 1, 4, ''),
(2, 100000, 1, 5, ''),
(2, 2, 1, 6, ''),
(2, 2, 1, 7, ''),
(2, 1, 2, 1, ''),
(2, 1, 2, 2, ''),
(2, 1, 2, 3, ''),
(2, 1, 2, 4, ''),
(2, 1, 2, 5, ''),
(2, 2, 2, 6, ''),
(2, 2, 2, 7, ''),
(2, 1, 3, 1, ''),
(2, 1, 3, 2, ''),
(2, 1, 3, 3, ''),
(2, 1, 3, 4, ''),
(2, 1, 3, 5, ''),
(2, 2, 3, 6, ''),
(2, 2, 3, 7, ''),
(2, 1, 5, 1, ''),
(2, 1, 5, 2, ''),
(2, 1, 5, 3, ''),
(2, 1, 5, 4, ''),
(2, 1, 5, 5, ''),
(2, 2, 5, 6, ''),
(2, 2, 5, 7, ''),
(2, 5, 6, 1, ''),
(2, 5, 6, 2, ''),
(2, 5, 6, 3, ''),
(2, 5, 6, 4, ''),
(2, 5, 6, 5, ''),
(2, 6, 6, 6, ''),
(2, 6, 6, 7, ''),
(2, 7, 7, 1, ''),
(2, 7, 7, 2, ''),
(2, 7, 7, 3, ''),
(2, 7, 7, 4, ''),
(2, 7, 7, 5, ''),
(2, 8, 7, 6, ''),
(2, 8, 7, 7, ''),
(2, 800000, 8, 1, ''),
(2, 800000, 8, 2, ''),
(2, 800000, 8, 3, ''),
(2, 800000, 8, 4, ''),
(2, 800000, 8, 5, ''),
(2, 9, 8, 6, ''),
(2, 9, 8, 7, ''),
(3, 100000, 1, 1, ''),
(3, 100000, 1, 2, ''),
(3, 100000, 1, 3, ''),
(3, 100000, 1, 4, ''),
(3, 100000, 1, 5, ''),
(3, 2, 1, 6, ''),
(3, 2, 1, 7, ''),
(3, 100000, 2, 1, ''),
(3, 100000, 2, 2, ''),
(3, 100000, 2, 3, ''),
(3, 100000, 2, 4, ''),
(3, 100000, 2, 5, ''),
(3, 2, 2, 6, ''),
(3, 2, 2, 7, ''),
(3, 1, 3, 1, ''),
(3, 1, 3, 2, ''),
(3, 1, 3, 3, ''),
(3, 1, 3, 4, ''),
(3, 1, 3, 5, ''),
(3, 2, 3, 6, ''),
(3, 2, 3, 7, ''),
(3, 1, 5, 1, ''),
(3, 1, 5, 2, ''),
(3, 1, 5, 3, ''),
(3, 1, 5, 4, ''),
(3, 1, 5, 5, ''),
(3, 2, 5, 6, ''),
(3, 2, 5, 7, ''),
(3, 5, 6, 1, ''),
(3, 5, 6, 2, ''),
(3, 5, 6, 3, ''),
(3, 5, 6, 4, ''),
(3, 5, 6, 5, ''),
(3, 6, 6, 6, ''),
(3, 6, 6, 7, ''),
(3, 7, 7, 1, ''),
(3, 7, 7, 2, ''),
(3, 7, 7, 3, ''),
(3, 7, 7, 4, ''),
(3, 7, 7, 5, ''),
(3, 8, 7, 6, ''),
(3, 8, 7, 7, ''),
(3, 8, 8, 1, ''),
(3, 8, 8, 2, ''),
(3, 8, 8, 3, ''),
(3, 8, 8, 4, ''),
(3, 8, 8, 5, ''),
(3, 9, 8, 6, ''),
(3, 9, 8, 7, ''),
(4, 1, 1, 1, ''),
(4, 1, 1, 2, ''),
(4, 1, 1, 3, ''),
(4, 1, 1, 4, ''),
(4, 1, 1, 5, ''),
(4, 2, 1, 6, ''),
(4, 2, 1, 7, ''),
(4, 1, 2, 1, ''),
(4, 1, 2, 2, ''),
(4, 1, 2, 3, ''),
(4, 1, 2, 4, ''),
(4, 1, 2, 5, ''),
(4, 2, 2, 6, ''),
(4, 2, 2, 7, ''),
(4, 1, 3, 1, ''),
(4, 1, 3, 2, ''),
(4, 1, 3, 3, ''),
(4, 1, 3, 4, ''),
(4, 1, 3, 5, ''),
(4, 2, 3, 6, ''),
(4, 2, 3, 7, ''),
(4, 1, 5, 1, ''),
(4, 1, 5, 2, ''),
(4, 1, 5, 3, ''),
(4, 1, 5, 4, ''),
(4, 1, 5, 5, ''),
(4, 2, 5, 6, ''),
(4, 2, 5, 7, ''),
(4, 5, 6, 1, ''),
(4, 5, 6, 2, ''),
(4, 5, 6, 3, ''),
(4, 5, 6, 4, ''),
(4, 5, 6, 5, ''),
(4, 6, 6, 6, ''),
(4, 6, 6, 7, ''),
(4, 7, 7, 1, ''),
(4, 7, 7, 2, ''),
(4, 7, 7, 3, ''),
(4, 7, 7, 4, ''),
(4, 7, 7, 5, ''),
(4, 8, 7, 6, ''),
(4, 8, 7, 7, ''),
(4, 8, 8, 1, ''),
(4, 8, 8, 2, ''),
(4, 8, 8, 3, ''),
(4, 8, 8, 4, ''),
(4, 8, 8, 5, ''),
(4, 9, 8, 6, ''),
(4, 9, 8, 7, ''),
(5, 1, 1, 1, ''),
(5, 1, 1, 2, ''),
(5, 1, 1, 3, ''),
(5, 1, 1, 4, ''),
(5, 1, 1, 5, ''),
(5, 2, 1, 6, ''),
(5, 2, 1, 7, ''),
(5, 1, 2, 1, ''),
(5, 1, 2, 2, ''),
(5, 1, 2, 3, ''),
(5, 1, 2, 4, ''),
(5, 1, 2, 5, ''),
(5, 2, 2, 6, ''),
(5, 2, 2, 7, ''),
(5, 1, 3, 1, ''),
(5, 1, 3, 2, ''),
(5, 1, 3, 3, ''),
(5, 1, 3, 4, ''),
(5, 1, 3, 5, ''),
(5, 2, 3, 6, ''),
(5, 2, 3, 7, ''),
(5, 1, 5, 1, ''),
(5, 1, 5, 2, ''),
(5, 1, 5, 3, ''),
(5, 1, 5, 4, ''),
(5, 1, 5, 5, ''),
(5, 2, 5, 6, ''),
(5, 2, 5, 7, ''),
(5, 5, 6, 1, ''),
(5, 5, 6, 2, ''),
(5, 5, 6, 3, ''),
(5, 5, 6, 4, ''),
(5, 5, 6, 5, ''),
(5, 6, 6, 6, ''),
(5, 6, 6, 7, ''),
(5, 7, 7, 1, ''),
(5, 7, 7, 2, ''),
(5, 7, 7, 3, ''),
(5, 7, 7, 4, ''),
(5, 7, 7, 5, ''),
(5, 8, 7, 6, ''),
(5, 8, 7, 7, ''),
(5, 8, 8, 1, ''),
(5, 8, 8, 2, ''),
(5, 8, 8, 3, ''),
(5, 8, 8, 4, ''),
(5, 8, 8, 5, ''),
(5, 9, 8, 6, ''),
(5, 9, 8, 7, ''),
(6, 1, 1, 1, ''),
(6, 1, 1, 2, ''),
(6, 1, 1, 3, ''),
(6, 1, 1, 4, ''),
(6, 1, 1, 5, ''),
(6, 2, 1, 6, ''),
(6, 2, 1, 7, ''),
(6, 1, 2, 1, ''),
(6, 1, 2, 2, ''),
(6, 1, 2, 3, ''),
(6, 1, 2, 4, ''),
(6, 1, 2, 5, ''),
(6, 2, 2, 6, ''),
(6, 2, 2, 7, ''),
(6, 1, 3, 1, ''),
(6, 1, 3, 2, ''),
(6, 1, 3, 3, ''),
(6, 1, 3, 4, ''),
(6, 1, 3, 5, ''),
(6, 2, 3, 6, ''),
(6, 2, 3, 7, ''),
(6, 1, 4, 1, ''),
(6, 1, 4, 2, ''),
(6, 1, 4, 3, ''),
(6, 1, 4, 4, ''),
(6, 1, 4, 5, ''),
(6, 2, 4, 6, ''),
(6, 2, 4, 7, ''),
(6, 1, 5, 1, ''),
(6, 1, 5, 2, ''),
(6, 1, 5, 3, ''),
(6, 1, 5, 4, ''),
(6, 1, 5, 5, ''),
(6, 2, 5, 6, ''),
(6, 2, 5, 7, ''),
(6, 5, 6, 1, ''),
(6, 5, 6, 2, ''),
(6, 5, 6, 3, ''),
(6, 5, 6, 4, ''),
(6, 5, 6, 5, ''),
(6, 6, 6, 6, ''),
(6, 6, 6, 7, ''),
(6, 7, 7, 1, ''),
(6, 7, 7, 2, ''),
(6, 7, 7, 3, ''),
(6, 7, 7, 4, ''),
(6, 7, 7, 5, ''),
(6, 8, 7, 6, ''),
(6, 8, 7, 7, ''),
(6, 8, 8, 1, ''),
(6, 8, 8, 2, ''),
(6, 8, 8, 3, ''),
(6, 8, 8, 4, ''),
(6, 8, 8, 5, ''),
(6, 9, 8, 6, ''),
(6, 9, 8, 7, ''),
(30, 150000, 1, 1, ''),
(30, 150000, 1, 2, ''),
(30, 150000, 1, 3, ''),
(30, 150000, 1, 4, ''),
(30, 150000, 1, 5, ''),
(30, 150000, 1, 6, ''),
(30, 150000, 1, 7, ''),
(30, 150000, 2, 1, ''),
(30, 150000, 2, 2, ''),
(30, 150000, 2, 3, ''),
(30, 150000, 2, 4, ''),
(30, 150000, 2, 5, ''),
(30, 150000, 2, 6, ''),
(30, 150000, 2, 7, ''),
(31, 0, 10, 1, ''),
(31, 0, 10, 2, ''),
(31, 0, 10, 3, ''),
(31, 0, 10, 4, ''),
(31, 0, 10, 5, ''),
(31, 0, 10, 6, ''),
(31, 0, 10, 7, ''),
(31, 0, 11, 1, ''),
(31, 0, 11, 2, ''),
(31, 0, 11, 3, ''),
(31, 0, 11, 4, ''),
(31, 0, 11, 5, ''),
(31, 0, 11, 6, ''),
(31, 0, 11, 7, ''),
(31, 0, 12, 1, ''),
(31, 0, 12, 2, ''),
(31, 0, 12, 3, ''),
(31, 0, 12, 4, ''),
(31, 0, 12, 5, ''),
(31, 0, 12, 6, ''),
(31, 0, 12, 7, ''),
(37, 110000, 1, 1, ''),
(37, 110000, 1, 2, ''),
(37, 110000, 1, 3, ''),
(37, 110000, 1, 4, ''),
(37, 110000, 1, 5, ''),
(37, 0, 1, 6, ''),
(37, 0, 1, 7, ''),
(37, 110000, 2, 1, ''),
(37, 110000, 2, 2, ''),
(37, 110000, 2, 3, ''),
(37, 110000, 2, 4, ''),
(37, 0, 2, 5, ''),
(37, 0, 2, 6, ''),
(37, 0, 2, 7, ''),
(38, 120000, 1, 1, ''),
(38, 120000, 1, 2, ''),
(38, 120000, 1, 3, ''),
(38, 120000, 1, 4, ''),
(38, 120000, 1, 5, ''),
(38, 120000, 1, 6, ''),
(38, 150000, 1, 7, ''),
(38, 120000, 2, 1, ''),
(38, 120000, 2, 2, ''),
(38, 120000, 2, 3, ''),
(38, 120000, 2, 4, ''),
(38, 120000, 2, 5, ''),
(38, 120000, 2, 6, ''),
(38, 150000, 2, 7, ''),
(38, 120000, 3, 1, ''),
(38, 120000, 3, 2, ''),
(38, 120000, 3, 3, ''),
(38, 120000, 3, 4, ''),
(38, 120000, 3, 5, ''),
(38, 120000, 3, 6, ''),
(38, 150000, 3, 7, ''),
(38, 120000, 4, 1, ''),
(38, 120000, 4, 2, ''),
(38, 120000, 4, 3, ''),
(38, 120000, 4, 4, ''),
(38, 120000, 4, 5, ''),
(38, 120000, 4, 6, ''),
(38, 150000, 4, 7, ''),
(38, 120000, 5, 1, ''),
(38, 120000, 5, 2, ''),
(38, 120000, 5, 3, ''),
(38, 120000, 5, 4, ''),
(38, 120000, 5, 5, ''),
(38, 120000, 5, 6, ''),
(38, 150000, 5, 7, ''),
(38, 120000, 7, 1, ''),
(38, 120000, 7, 2, ''),
(38, 120000, 7, 3, ''),
(38, 120000, 7, 4, ''),
(38, 120000, 7, 5, ''),
(38, 120000, 7, 6, ''),
(38, 150000, 7, 7, ''),
(38, 120000, 8, 1, ''),
(38, 120000, 8, 2, ''),
(38, 120000, 8, 3, ''),
(38, 120000, 8, 4, ''),
(38, 120000, 8, 5, ''),
(38, 120000, 8, 6, ''),
(38, 150000, 8, 7, '');

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
(1, 'Chủ sân 1', '0999999999', 'chusan1@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2024-12-04 21:22:04'),
(2, 'Chủ sân 2', '0888888888', 'chusan2@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(3, 'Nguyễn Văn Khách A', '0919999999', 'NguyenVKA@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(4, 'Ng', '0382468135', 'nhanviensan1@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(68, 'Lý Anh A', '0382034043', 'lyanhkhoa123@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', '2024-10-24 19:54:56'),
(78, 'Lý Anh Khoa', '03820340443', 'lyanhkhoa987@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2024-10-26 06:35:36'),
(81, 'tết 2025', '0984445364', 'tet2025@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-26 14:14:05'),
(102, 'Lý Anh Khoa', '0382034046', 'lyanhkhoa789@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 13:25:34'),
(103, 'Lý Văn Khoa', '0908456123', 'lyanhkhoa8777@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 13:50:16'),
(104, 'Lý Anh Khoa', '0984445360', 'lyanhkhoa788@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 13:49:23'),
(110, 'LAK', '0555555555', 'Test90@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-12-09 13:46:17'),
(111, 'Người Dùng Mới', '0908456127', 'lyanhkhoa2k3@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 23:41:12'),
(112, 'Nguyễn Chí Hướng', '0777777777', 'ngvanabc123@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-11-16 18:50:34'),
(113, 'Lê Anh Thái', '0333333333', 'LTL123@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-11-16 18:33:33'),
(114, 'Ngô Hoài Niệm', '0876456352', 'BBB123@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-11-16 18:55:05'),
(115, 'Lương Ngọc Giả', '0919191919', 'lak1123@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-11-16 23:38:59'),
(116, 'Phan Lệ Trinh', '0335265344', 'plt123@gmail.com', NULL, '2024-11-16 23:41:04'),
(117, 'Nguyễn Văn U', '0919876564', 'NguyenvanU@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-12-06 21:26:58'),
(124, 'Nguyễn Văn k', '0908456155', 'Nguyenvank@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2024-12-06 22:10:58');

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
  ADD KEY `fd_cs_dd` (`MaChuSan`),
  ADD KEY `fk_loaikhunggio_diadiem` (`LoaiKhungGio`);

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
  ADD PRIMARY KEY (`MaKhungGio`),
  ADD KEY `fd_loaikhunggio` (`MaLoaiKhungGio`);

--
-- Chỉ mục cho bảng `loaikhunggio`
--
ALTER TABLE `loaikhunggio`
  ADD PRIMARY KEY (`MaLoaiKhungGio`);

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
  ADD KEY `fk_l_s` (`MaLoaiSan`);

--
-- Chỉ mục cho bảng `san_gia_thu_khunggio`
--
ALTER TABLE `san_gia_thu_khunggio`
  ADD PRIMARY KEY (`MaSan`,`KhungGio`,`MaThu`,`Gia`,`Ngay`) USING BTREE,
  ADD KEY `fk_thu` (`MaThu`),
  ADD KEY `fk_khunggio` (`KhungGio`),
  ADD KEY `fk_gia` (`Gia`);

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
  MODIFY `MaChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT cho bảng `chusan`
--
ALTER TABLE `chusan`
  MODIFY `MaChuSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `datsan`
--
ALTER TABLE `datsan`
  MODIFY `MaDatSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `MaDiaDiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hinh`
--
ALTER TABLE `hinh`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `khunggio`
--
ALTER TABLE `khunggio`
  MODIFY `MaKhungGio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `loaikhunggio`
--
ALTER TABLE `loaikhunggio`
  MODIFY `MaLoaiKhungGio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `MaSan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

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
  ADD CONSTRAINT `fd_cs_dd` FOREIGN KEY (`MaChuSan`) REFERENCES `chusan` (`MaChuSan`),
  ADD CONSTRAINT `fk_loaikhunggio_diadiem` FOREIGN KEY (`LoaiKhungGio`) REFERENCES `loaikhunggio` (`MaLoaiKhungGio`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_kh_tk` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `khunggio`
--
ALTER TABLE `khunggio`
  ADD CONSTRAINT `fd_loaikhunggio` FOREIGN KEY (`MaLoaiKhungGio`) REFERENCES `loaikhunggio` (`MaLoaiKhungGio`);

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
  ADD CONSTRAINT `fk_l_s` FOREIGN KEY (`MaLoaiSan`) REFERENCES `loaisan` (`MaLoai`);

--
-- Các ràng buộc cho bảng `san_gia_thu_khunggio`
--
ALTER TABLE `san_gia_thu_khunggio`
  ADD CONSTRAINT `fk_khunggio` FOREIGN KEY (`KhungGio`) REFERENCES `khunggio` (`MaKhungGio`),
  ADD CONSTRAINT `fk_san` FOREIGN KEY (`MaSan`) REFERENCES `san` (`MaSan`),
  ADD CONSTRAINT `fk_thu` FOREIGN KEY (`MaThu`) REFERENCES `thutrongtuan` (`MaThu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
