-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 15, 2021 lúc 06:41 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO" ;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanli_nhanvien`
--
  CREATE database quanli_nhanvien CHARACTER SET utf8 COLLATE utf8_general_ci;
  use quanli_nhanvien;
-- --------------------------------------------------------

-- 
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `Avatar` varchar(50) NOT NULL DEFAULT './img/img_avatar.png',
  `ho_ten` varchar(20) NOT NULL,
  `gioi_tinh` varchar(3) NOT NULL,
  `Nam_sinh` date NOT NULL,
  `chuc_vu` varchar(20) NOT NULL,
  `Noi_Sinh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `Avatar`, `ho_ten`, `gioi_tinh`, `Nam_sinh`, `chuc_vu`, `Noi_Sinh`) VALUES
(1, './img/img_avatar.png', 'Lê Công Nam', 'Nam', '1997-06-06', 'Giám Đốc', 'Thanh Hoá'),
(2, './img/img_avatar.png', 'Phan Đình Khôi', 'Nam', '1998-07-06', 'Phó giám đốc', 'Bến tre'),
(3, './img/img_avatar.png', 'Nguyễn Minh Khoa', 'Nam', '1997-06-01', 'Trưởng Phòng KD', 'Trà vinh'),
(4, './img/img_avatar.png', 'Lê Tuấn Anh', 'Nam', '2007-10-02', 'Trưởng phòng', 'Bình thuận'),
(5, './img/img_avatar.png', 'Nguyễn văn tèo', 'Nam', '1998-03-22', 'nhân viên', 'Huế'),
(6, './img/img_avatar.png', 'Nguyễn văn tú', 'Nam', '1998-04-12', 'nhân viên', 'Sóc trăng'),
(7, './img/img_avatar.png', 'Nguyễn văn tí', 'Nam', '1998-03-28', 'nhân viên', 'Tp Hồ chí minh'),
(8, './img/img_avatar.png', 'Nguyễn thị huệ', 'Nữ', '1998-04-25', 'nhân viên', 'Tp Hồ chí minh'),
(9, './img/img_avatar.png', 'Nguyễn thị cúc', 'Nữ', '1998-04-11', 'nhân viên', 'Nghệ An'),
(10, './img/img_avatar.png', 'Nguyễn hoàng mai', 'Nữ', '1998-03-12', 'nhân viên', 'Tây Ninh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
