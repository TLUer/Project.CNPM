-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2023 lúc 01:10 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopbangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idHD` int(11) NOT NULL,
  `idSize` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `so_luong_mua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`idHD`, `idSize`, `idSP`, `so_luong_mua`) VALUES
(18, 12, 165, 1),
(19, 9, 162, 1),
(20, 11, 119, 1),
(21, 9, 162, 1),
(22, 11, 118, 1),
(23, 11, 159, 1),
(24, 9, 162, 1),
(25, 12, 136, 1),
(26, 11, 111, 1),
(27, 12, 109, 1),
(28, 12, 149, 1),
(29, 12, 149, 3),
(30, 10, 164, 1),
(31, 10, 164, 1),
(32, 11, 158, 1),
(33, 10, 164, 1),
(34, 11, 163, 1),
(35, 11, 163, 1),
(36, 9, 162, 1),
(39, 10, 164, 1),
(40, 11, 163, 1),
(41, 10, 164, 1),
(42, 11, 163, 1),
(43, 11, 163, 1),
(44, 10, 164, 1),
(45, 10, 164, 1),
(46, 10, 164, 1),
(47, 12, 165, 1),
(48, 12, 165, 1),
(49, 12, 165, 1),
(50, 9, 165, 1),
(52, 10, 164, 1),
(53, 9, 162, 1),
(53, 10, 164, 1),
(54, 11, 163, 1),
(54, 12, 153, 2),
(55, 11, 163, 1),
(56, 10, 164, 1),
(57, 10, 164, 2),
(58, 10, 164, 1),
(59, 9, 162, 1),
(59, 10, 164, 1),
(59, 11, 159, 1),
(60, 10, 164, 1),
(60, 12, 165, 1),
(61, 9, 162, 1),
(62, 9, 159, 1),
(62, 9, 162, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_danh_muc`) VALUES
(10, 'Giày Li-Ning'),
(11, 'Giày Vans'),
(12, 'Giày Anta');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `hinh_thuc_thanh_toan` varchar(500) NOT NULL,
  `hinh_thuc_van_chuyen` varchar(500) NOT NULL,
  `dia_chi_nhan` varchar(100) NOT NULL,
  `tinh_trang` varchar(50) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `idKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `ngay_tao`, `hinh_thuc_thanh_toan`, `hinh_thuc_van_chuyen`, `dia_chi_nhan`, `tinh_trang`, `tong_tien`, `idKH`) VALUES
(18, '0000-00-00 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 0, 44),
(19, '0000-00-00 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 0, 46),
(20, '0000-00-00 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 0, 48),
(21, '0000-00-00 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Ha Noi', 'Đang xử lý', 0, 49),
(22, '0000-00-00 00:00:00', 'Chuyển khoản ngân hàng', 'Hỏa tốc - 60.000đ', 'TP. HCM', 'Đang xử lý', 0, 50),
(23, '0000-00-00 00:00:00', 'Tiền mặt tại của hàng', 'Tiết kiệm - 20.000đ', 'Da Nang', 'Đang xử lý', 0, 51),
(24, '2023-06-17 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Ha Noi', 'Đang xử lý', 0, 52),
(25, '2023-06-18 00:00:00', 'Chuyển khoản ngân hàng', 'Hỏa tốc - 60.000đ', 'HN', 'Đang xử lý', 0, 53),
(26, '2023-06-18 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Hai Phong', 'Đang xử lý', 0, 54),
(27, '2023-06-18 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 0, 55),
(28, '2023-06-18 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 0, 56),
(29, '2023-06-18 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 0, 57),
(30, '2023-06-18 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 0, 58),
(31, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 1979100, 60),
(32, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '11', 'Đang xử lý', 1979100, 61),
(33, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 1979100, 62),
(34, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 1759200, 63),
(35, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 1759200, 64),
(36, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Ha Noi', 'Đang xử lý', 1759000, 65),
(37, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Ha Noi', 'Đang xử lý', 0, 66),
(38, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Ha Noi', 'Đang xử lý', 0, 67),
(39, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 1979100, 68),
(40, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1759200, 69),
(41, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1979100, 70),
(42, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 1759200, 71),
(43, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1759200, 72),
(44, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', 'Thái Nguyên', 'Đang xử lý', 1979100, 73),
(45, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1979100, 74),
(46, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1979100, 75),
(47, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1583100, 76),
(48, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Hỏa tốc - 60.000đ', 'Thái Nguyên', 'Đang xử lý', 1000, 77),
(49, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1000, 78),
(50, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '2', 'Đang xử lý', 1000, 79),
(51, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 0, 80),
(52, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1979100, 81),
(53, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1979100, 82),
(54, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 3780000, 83),
(55, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '2', 'Đang xử lý', 1759200, 84),
(56, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1979100, 85),
(57, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 3958200, 86),
(58, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1979100, 87),
(59, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 5017300, 88),
(60, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1980100, 89),
(61, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 1759000, 90),
(62, '2023-06-19 00:00:00', 'Thanh toán khi nhận hàng', 'Tiết kiệm - 20.000đ', '1', 'Đang xử lý', 3038200, 91);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `dia_chi` varchar(100) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ten_dang_nhap` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `ho_ten`, `email`, `so_dien_thoai`, `dia_chi`, `ngay_sinh`, `status`, `ten_dang_nhap`) VALUES
(1, 'Trần Quang Tú', 'tqt@gmail.com', '123123213', 'Thai Nguyen', '2023-01-01', 1, 'tranquangtu'),
(41, 'Nguyễn Tùng Dương', 'ntd@gmail.com', '1111111111', 'Ha Noi', '2023-06-13', 1, 'nguyentungduong'),
(42, 'Chu Minh Quyet', 'cmq@gmail.com', '1111111111', 'Ha Noi', '2023-01-01', 1, 'chuminhquyet'),
(43, '1', '1', '1', '1', NULL, 1, 'chuminhquyet'),
(44, '1', '1', '1', NULL, NULL, NULL, NULL),
(45, '2', '2', '2', '1', NULL, 1, 'chuminhquyet'),
(46, '2', '2', '2', NULL, NULL, NULL, NULL),
(47, 'Trần Quang Tú', 'a@gmail.com', '0123456789', 'Thái Nguyên', NULL, 1, 'tranquangtu'),
(48, 'Trần Quang Tú', 'a@gmail.com', '0123456789', NULL, NULL, NULL, NULL),
(49, 'USER 1', 'u@gmail.com', '1', NULL, NULL, NULL, NULL),
(50, 'USER 2', 'a@gmail.com', '023423424', NULL, NULL, NULL, NULL),
(51, 'USER 3', 'acwy@gmail.com', '0999999', NULL, NULL, NULL, NULL),
(52, 'u3', 'w@gmail.com', '01230102', NULL, NULL, NULL, NULL),
(53, 'Nguyễn Tùng Dương', '', '0111222333', NULL, NULL, NULL, NULL),
(54, 'Minh ', 'mq@gmail.com', '0423224324', NULL, NULL, NULL, NULL),
(55, 'Trần Quang Tú', '', '099999999', NULL, NULL, NULL, NULL),
(56, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(57, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(58, 'Trần Quang Tú', 'quangtu2002@gmail.com', '0123456789', NULL, NULL, NULL, NULL),
(59, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(60, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(61, 'Nguyễn Văn A', '', '0999999', NULL, NULL, NULL, NULL),
(62, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(63, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(64, 'Trần Quang Tú', 'quangtu2002@gmail.com', '0123456789', NULL, NULL, NULL, NULL),
(65, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(66, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(67, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(68, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(69, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(70, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(71, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(72, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(73, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(74, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(75, 'Trần Quang Tú', '', '0123456789', NULL, NULL, NULL, NULL),
(76, 'Trần Quang Tú', 'a@gmail.com', '2', NULL, NULL, NULL, NULL),
(77, 'Trần Quang Tú', 'quangtu2002@gmail.com', '0123456789', 'Thái Nguyên', NULL, 1, 'tranquangtu'),
(78, '1', '', '1', '1', NULL, 1, 'tranquangtu'),
(79, '2', '', '2', '2', NULL, 1, 'tranquangtu'),
(80, '1', '1', '2', '1', NULL, NULL, 'tranquangtu'),
(81, '1', '', '1', '1', NULL, NULL, 'tranquangtu'),
(82, '2', '', '2', '1', NULL, NULL, 'tranquangtu'),
(83, '2', '', '1', '1', NULL, NULL, 'tranquangtu'),
(84, '1', '', '1', '2', NULL, NULL, 'tranquangtu'),
(85, '3', '', '3', '1', NULL, NULL, 'tranquangtu'),
(86, '1', '', '1', '1', NULL, NULL, 'tranquangtu'),
(87, '1', '', '1', '1', NULL, NULL, 'tranquangtu'),
(88, '1', '', '1', '1', NULL, NULL, 'tranquangtu'),
(89, '2', '', '2', '1', NULL, NULL, 'tranquangtu'),
(90, '1', '', '1', '1', NULL, NULL, 'tranquangtu'),
(91, '2', '', '2', '1', NULL, NULL, 'tranquangtu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `phan_tram` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`id`, `ngay_bat_dau`, `ngay_ket_thuc`, `phan_tram`) VALUES
(1, '2023-05-01', '2024-01-01', 0),
(9, '2023-06-01', '2023-08-31', 10),
(10, '2023-06-05', '2023-07-19', 20),
(11, '2023-05-30', '2023-06-22', 40),
(12, '2023-05-29', '2023-08-31', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(50) NOT NULL,
  `gia` int(11) NOT NULL,
  `hinh_anh` varchar(200) NOT NULL,
  `mo_ta` longtext NOT NULL,
  `idDM` int(11) NOT NULL,
  `idSale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_san_pham`, `gia`, `hinh_anh`, `mo_ta`, `idDM`, `idSale`) VALUES
(108, 'Giày chạy bộ nam ARMT015-2', 1790000, 'ARMT015-2.jpg', 'Giày chạy bộ nam ARMT015-2\r\n\r\nChất liệu :TEXTILE\r\nCông nghệ : LIGHT FOAM PLUS, TUFF RB, PROBAR LOC\r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 10),
(109, 'Giày chạy bộ nam ARMT015-2', 2590000, 'Giày chạy bộ nam ARMT013-2.png', 'Giày chạy bộ nam ARMT015-2\r\n\r\nChất liệu :TEXTILE\r\nCông nghệ : LIGHT FOAM PLUS, TUFF RB, PROBAR LOC\r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 10),
(110, 'Giày thể thao nữ AGCT074-2', 1490000, 'Giày thời trang nữ AGCT074-2.png', 'Giày thể thao nữ AGCT074-2\r\n\r\nChất liệu  :SYNTHETIC LEATHER+COW SPLIT LEATHER\r\nThiết kế : Thời Trang\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 12),
(111, 'Giày thời trang nữ AGLT114-2', 1690000, 'Giày thời trang nữ AGLT114-2.png', 'Giày thể thao nữ AGLT114-2\r\n\r\nChất liệu  :TEXTILE+TPU\r\nThiết kế : Thời Trang\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 10),
(112, 'Giày thể thao nữ AGLT114-1', 1690000, 'Giày thời trang nữ AGLT114-1.png', 'Giày thể thao nữ AGLT114-1\r\n\r\nChất liệu  :TEXTILE+TPU\r\nThiết kế : Thời Trang\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc\r\n', 10, 9),
(113, 'Giày thể thao nam AGCT043-3', 1690000, 'Giày thời trang nam AGCT043-3.png', 'Giày thể thao nam AGCT043-3\r\n\r\nChất liệu : SPLIT COWHIDE+TEXTILE\r\nCông nghệ : DUAL CUSHION\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 10),
(114, 'Giày thể thao nam AGCT043-2', 1690000, 'Giày thể thao nam AGCT043-2.png', 'Giày thể thao nam AGCT043-2\r\n\r\nChất liệu : SPLIT COWHIDE+TEXTILE\r\nCông nghệ : DUAL CUSHION\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 9),
(115, 'Giày thể thao nam AGLT101-2', 1990000, 'Giày thể thao nam AGLT101-2.png', 'Giày thể thao nam AGLT101-2\r\n\r\nChất liệu : TEXTILE+TPU\r\nCông nghệ : LINING BOOM\r\nDòng sản phẩm : Sports Life/Thời trang\r\nXuất xứ: Trung Quốc', 10, 11),
(116, 'Giày chạy bộ nam ARHT005-9', 1890000, 'Giày chạy bộ nam ARHT005-9.png', 'Giày chạy bộ nam ARHT005-9\r\n\r\nChất liệu :TEXTILE+SYNTHETIC LEATHER\r\nCông nghệ : LIGHT FOAM  \r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 11),
(117, 'Giày chạy bộ nam ARHT001-8', 2590000, 'Giày chạy bộ nam ARHT001-8.png', 'Giày chạy bộ nam ARHT001-8\r\n\r\nChất liệu :TEXTILE+TPU\r\nCông nghệ : LINING BOOM, GCR, HEEL LOC\r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 10),
(118, 'Giày Super Light 20 nam ARVT001-12', 2590000, 'Giày Super Light 20 nam ARVT001-12.png', 'Giày Super Light 20 nam ARVT001-12\r\n\r\nChất liệu :TEXTILE+TPU\r\nCông nghệ : LINING BOOM, GCR, BOOM FIBER\r\nDòng sản phẩm : Running/ Chạy bộ\r\nTrọng lượng : 190gr/chiếc giày', 10, 1),
(119, 'Giày thể thao nữ AGLT008-1', 1690000, 'Giày thể thao nữ AGLT008-1.png', 'Giày thể thao nữ AGLT008-1\r\n\r\nChất liệu  TEXTILE+TPU\r\nCông nghệ  DUAL CUSHION\r\nDòng sản phẩm  Sports Life Thời trang\r\nXuất xứ Trung Quốc', 10, 12),
(120, 'Giày thể thao nữ AGCT028-6', 2190000, 'Giày thể thao nữ AGCT028-6.jpg', 'Giày thể thao nữ AGCT028-6\r\n\r\nChất liệu  :COW SPLIT LEATHER+SYNTHETIC LEATHER+TPU\r\nCông nghệ : DUAL CUSHION\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 10),
(121, 'Giày thể thao nam AGCT009-7', 1690000, 'Giày thể thao nam AGCT009-7.png', 'Giày thể thao nam AGCT009-7\r\n\r\nChất liệu : Synthetic Leather+Textile\r\nCông nghệ : DUAL CUSHION\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 9),
(122, 'Giày thể thao nam AGCT009-4', 1690000, 'Giày thể thao nam AGCT009-4.png', 'Giày thể thao nam AGCT009-4\r\n\r\nChất liệu : Synthetic Leather+Textile\r\nCông nghệ : DUAL CUSHION\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 9),
(123, 'Giày chạy bộ nam ARHT005-1', 1890000, 'Giày chạy bộ nam ARHT005-1.png', 'Giày chạy bộ nam ARHT005-1\r\n\r\nChất liệu :TEXTILE+SYNTHETIC LEATHER\r\nCông nghệ : LIGHT FOAM  \r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 10),
(124, 'Giày chạy bộ nam ARHT005-3', 1890000, 'Giày chạy bộ nam ARHT005-3.png', 'Giày chạy bộ nam ARHT005-3\r\n\r\nChất liệu :TEXTILE+SYNTHETIC LEATHER\r\nCông nghệ : LIGHT FOAM  \r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 12),
(125, 'Giày thể thao nữ AGCT068-1', 2590000, 'Giày thể thao nữ AGCT068-1.png', 'Giày thể thao nữ AGCT068-1\r\n\r\nChất liệu : TEXTILE+SPLIT COWHIDE\r\nThiết kế : Thời trang, năng động\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 10),
(126, 'Giày thể thao nữ AGCT078-1', 2590000, 'Giày thể thao nữ AGCT078-1.png', 'Giày thể thao nữ AGCT078-1\r\n\r\nChất liệu : TEXTILE+COWHIDE SUEDE+SYNTHETIC LEATHER\r\nThiết kế : Thời trang, năng động\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 10),
(127, 'Giày thể thao nữ AGLT026-2', 3090000, 'Giày thể thao nữ AGLT026-2.png', 'Giày thể thao nữ AGLT026-2\r\n\r\nChất liệu : TEXTILE+COWHIDE SUEDE+SYNTHETIC LEATHER\r\nThiết kế : Thời trang, năng động\r\nDòng sản phẩm : Sports Life/ Thời trang\r\nXuất xứ: Trung Quốc', 10, 12),
(128, 'Giày chạy bộ nam ARMT013-6', 2590000, 'Giày chạy bộ nam ARMT013-6.png', 'Giày chạy bộ nam ARMT013-6\r\n\r\nChất liệu :TEXTILE+TPU\r\nCông nghệ : LIGHT FOAM PLUS, TUFF RB, PROBAR LOC\r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 11),
(129, 'Giày chạy bộ nam ARMT013-5', 2590000, 'Giày chạy bộ nam ARMT013-5.png', 'Giày chạy bộ nam ARMT013-5\r\n\r\nChất liệu :TEXTILE+TPU\r\nCông nghệ : LIGHT FOAM PLUS, TUFF RB, PROBAR LOC\r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 10),
(130, 'Giày chạy bộ nam ARMT013-3', 2590000, 'Giày chạy bộ nam ARMT013-3.png', 'Giày chạy bộ nam ARMT013-3\r\n\r\nChất liệu :TEXTILE+TPU\r\nCông nghệ : LIGHT FOAM PLUS, TUFF RB, PROBAR LOC\r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 10),
(131, 'Giày chạy bộ nam ARMT015-2', 1790000, 'Giày chạy bộ nam ARMT015-2.png', 'Giày chạy bộ nam ARMT015-2\r\n\r\nChất liệu :TEXTILE\r\nCông nghệ : LIGHT FOAM PLUS, TUFF RB, PROBAR LOC\r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 10),
(132, 'Giày chạy bộ nam ARMT015-3', 1790000, 'Giày chạy bộ nam ARMT015-3.png', 'Giày chạy bộ nam ARMT015-3\r\n\r\nChất liệu :TEXTILE\r\nCông nghệ : LIGHT FOAM PLUS, TUFF RB, PROBAR LOC\r\nDòng sản phẩm : Running/ Chạy bộ\r\nXuất xứ : Chính Hãng', 10, 9),
(133, 'VANS AUTHENTIC CLASSIC BLACKWHITE', 1450000, 'VANS AUTHENTIC CLASSIC BLACKWHITE.png', 'Là phiên bản được ưa chuộng nhất trong bộ sưu tập Authentic của VANS với sự kết hợp 2 màu đen trắng dễ phối đồ và custom, đặc biệt là phiên bản cổ nhất có tuổi đời hơn 50 năm, dù vậy vẫn được fan hâm mộ săn đón và được sử dụng khá nhiều với những vận động viên trượt ván chuyên nghiệp. VANS CLASSIC AUTHENTIC BLACK/WHITE được đánh giá là một siêu phẩm cần có khi bạn quyết định sẽ trở thành một tín đồ của nhà VANS đấy!', 11, 9),
(134, 'VANS OLD SKOOL CLASSIC BLACK/WHITE', 1850000, 'VANS OLD SKOOL CLASSIC BLACKWHITE.png', 'VANS OLD SKOOL CLASSIC BLACK/WHITE\r\n\r\nĐược gọi vui một cách thân thuộc là \"giày VANS đen\" vốn là một sự phổ biến rất đặc biệt đối với các tín đồ của nhà VANS. Tới nay đôi giày chỉ với phối màu đen trắng này vẫn nằm trong top \"Best Seller\" của VANS trên toàn thế giới, với kiểu dáng cổ điển cùng \"sọc Jazz\" huyền thoại hợp thời trang khiến đôi VANS này thật sự trở thành mẫu giày classic bất bại, là fan hâm mộ của VANS nói chung và những skaters nói riêng đều nên có một đôi trong tủ giày. Được mệnh danh là phiên bản mang \"càng cũ càng đẹp\" và nhiều phiên bản custom  bậc nhất của nhà VANS. Cho đến tận bây giờ sau 44 năm ra mắt, thiết kế ấy đã được xem như dấu hiệu nhận biết chuyên biệt của VANS - OFF THE WALL chính là logo JAZZ STRIPE. VAN OLD SKOOL tuy cũng được xem như là một trong những dòng giày thế hệ đầu của thương hiệu, nhưng không vì thế mà nó cũ đi hay lỗi thời theo thời gian. Với tầm nhìn xa và sự chuyên nghiệp trong thiết kế của VANS hay cách riêng của PAUL VAN DOREN VANS OLD SKOOL chưa bao giờ cũ đi mà liên tục được đổi mới và lẽ dĩ nhiên vẫn giữ nguyên vẹn giá trị cốt lõi cùng những dấu ấn ban đầu. Đây chính là cách tạo nên VANS hay là cách mà VANS tỏ lòng kính trọng đến cực sáng lập thương hiệu PAUL VAN DOREN.', 11, 9),
(135, 'VANS CHECKERBOARD SLIP-ON:', 1450000, 'VANS CHECKERBOARD SLIP-ON.png', 'VANS CHECKERBOARD SLIP-ON:\r\n\r\nBắt đầu trở nên nổi tiếng khi được Sean Penn sử dụng trong bộ phim Fast Times vào năm 1982 và từ phong trào trở thành một phong cách huyền thoại không hề lỗi thời và luôn nằm trong mục \"Best Seller\" của VANS cho tới thời điểm hiện tại.', 11, 9),
(136, 'Vans Old Skool True White', 1750000, 'Vans Old Skool True White.png', 'Vans Old Skool True White với Upper hoàn toàn là vải canvas - chất liệu dễ vẽ khiến cho các tín đồ Custom rất ưa chuộng và là sự lựa chọn hàng đầu khi họ thi triển tài nghệ. Đồng thời khi đôi giày đã quá cũ chính bạn cũng có thể tự sáng tạo hoặc bỏ chút tiền ra để Custom theo sở thích của mình.', 11, 9),
(137, 'VANS Old Skool Black/Black', 1750000, 'VANS Old Skool BlackBlack.png', 'VANS Old Skool Black/Black hay còn gọi là Triple black là phiên bản rất được ưa chuộng với phối màu hoàn toàn đen, dễ phối đồ cũng như không ngại bất cứ vết bẩn nào, đế cao su chất lượng cao với độ bám tốt cùng upper là canvas siêu bền.', 11, 9),
(138, 'VANS Classic Old Skool Navy/White', 1750000, 'VANS Classic Old Skool NavyWhite.png', 'VANS Classic Old Skool Navy/White:\r\n\r\nNằm trong mục Best Seller của VANS và là một trong những phiên bản lâu đời nhất của dòng Old Skool, có một lượng fan hâm mộ đông đảo của VANS từ khi ra đời năm 1977 bởi phối màu navy cổ điển tạo nên điểm nhấn độc đáo thời đó, đồng thời vẫn là phiên bản bất tử cho đến nay.', 11, 9),
(139, 'VANS Classic Sk8 Black/White', 1950000, 'VANS Classic Sk8 BlackWhite.png', 'Phiên bản VANS Classic Sk8 Black/White là một trong style kinh điển của VANS và đã mang lại lợi nhuận khổng lồ cho hãng khi luôn nằm trong mục Best Seller của VANS. Tông màu đen đơn giản dễ phối đồ cùng cổ cao kinh điển sẽ là sản phẩm tuyệt vời cho các fan yêu thời trang.', 11, 9),
(140, 'Vans Era Tiger Patchwork', 1600000, 'Vans Era Tiger Patchwork.png', 'Mẫu giày Vans Era Tiger Patchwork mang xu hướng thiết kế patchwork chắp vá nổi bật với sự kết hợp bất đối xứng của các chi tiết đậm chất Vintage được lồng ghép một cách tỉ mỉ tinh tế mang đậm nét sáng tạo đầy nghệ thuật', 11, 9),
(141, 'Vans UA Authentic Platform', 1550000, 'Vans UA Authentic Platform.png', 'Vans Platform là một bước tiến vượt bậc so với các thiết kế cổ điển, vẫn giữ vững những giá trị thương hiệu nhưng lại nâng cấp với bộ đế cao và dày dặn làm nên xu hướng. BST là một sự sáng tạo đột phá với điểm mới như cổ giày thấp và gọn nhẹ, thiết kế cân bằng hài hòa giữa trọng lượng và kiểu dáng, đệm lót Ortholite êm mềm. Đây chính là cầu nối cho sự kết hợp giữa phong cách đơn giản và đề cao sự thoải mái.', 11, 9),
(142, 'Vans UA Old Skool Platform', 1950000, 'Vans UA Old Skool Platform.jpg', 'Vans Platform là một bước tiến vượt bậc so với các thiết kế cổ điển, vẫn giữ vững những giá trị thương hiệu nhưng lại nâng cấp với bộ đế cao và dày dặn làm nên xu hướng. BST là một sự sáng tạo đột phá với điểm mới như cổ giày thấp và gọn nhẹ, thiết kế cân bằng hài hòa giữa trọng lượng và kiểu dáng, đệm lót Ortholite êm mềm. Đây chính là cầu nối cho sự kết hợp giữa phong cách đơn giản và đề cao sự thoải mái.', 11, 9),
(143, 'Vans UA Style 36 Vintage Pop', 1750000, 'Vans UA Style 36 Vintage Pop.jpg', 'Vans Vintage Pop mang đến diện mạo hoàn toàn tinh tế với sắc thái nhẹ nhàng nhưng nổi bật nhờ sự xuất hiện biểu tượng sọc Jazz. Điểm nhấn chính từ cách mix màu xen kẽ của sọc Jazz uốn lượn cùng dây giày, đồng thời điểm xuyết thêm tage logo đồng màu sau gót giúp tổng thể trở nên đặc biệt và ấn tượng ngay từ cái nhìn đầu tiên.', 11, 9),
(144, 'Vans UA Old Skool Vintage Pop ', 1750000, 'Vans UA Old Skool Vintage Pop .jpg', 'Vans Vintage Pop mang đến diện mạo hoàn toàn tinh tế với sắc thái nhẹ nhàng nhưng nổi bật nhờ sự xuất hiện biểu tượng sọc Jazz. Điểm nhấn chính từ cách mix màu xen kẽ của sọc Jazz uốn lượn cùng dây giày, đồng thời điểm xuyết thêm tage logo đồng màu sau gót giúp tổng thể trở nên đặc biệt và ấn tượng ngay từ cái nhìn đầu tiên.\r\n', 11, 9),
(145, 'Vans UA SK8-Low Vintage Pop - VN0A5KXDR2S', 1900000, 'Vans UA SK8-Low Vintage Pop - VN0A5KXDR2S.jpg', 'Vans Vintage Pop SK8-Low sở hữu phối màu đơn giản nhưng tinh tế theo phong cách retro hoài cổ với hai gam màu trắng ngà - nâu nhạt. Thân giày được làm từ chất liệu 100% Suede bền đẹp với độ hoàn thiện cao. Thiết kế được tạo điểm nhấn bởi phần sọc jazz, dây giày và logo bao phủ sắc nâu đồng bộ thiết kế.\r\n', 11, 9),
(146, 'Vans UA SK8-Hi Vintage Pop - VN0A4BVTR2S', 2200000, 'Vans UA SK8-Hi Vintage Pop - VN0A4BVTR2S.jpg', 'Vans Vintage Pop SK8-Hi đánh gục cộng đồng sneakerhead bởi tông màu trắng ngà chủ đạo điểm xuyết thêm sắc xanh rêu vô cùng sang trọng và thời thượng. Thiết kế cổ cao SK8-Hi kết hợp cùng sọc Sidestripe và logo “Vans Off The Wall” đã trở thành biểu tượng văn hóa đặc trưng, độc đáo của nhà giày trượt ván.\r\n', 11, 9),
(147, 'Vans UA Old Skool Pig Suede - VN0A5JMI2PT', 2200000, 'Vans UA Old Skool Pig Suede - VN0A5JMI2PT.jpg', 'Mang trở lại thiết kế Old Skool đình đám được phủ lên phối màu Zephyr vô cùng ngọt ngào và thời thượng chính là siêu phẩm Vans Old Skool Pig Suede. Thiết kế này được hoàn thiện từ chất liệu 100% da lộn mềm mại tựa nhung kết hợp cùng đế giày Waffle Tread và công nghệ chống thấm nước HEIQ Eco Dry hiện đại mang đến một tổng thể vừa đẹp vừa xịn.\r\n', 11, 9),
(148, 'Vans UA Era Pig Suede - VN0A5KX52PT', 2000000, 'Vans UA Era Pig Suede - VN0A5KX52PT.jpg', 'Vans Era Pig Suede sở hữu tone màu hồng pastel “kẹo ngọt” kết hợp cùng thiết kế cổ điển của dòng Vans Era mang đến một ngoại hình vừa ngọt ngào vừa cuốn hút. Siêu phẩm này được hoàn thiện từ 100% chất liệu da lộn cao cấp kết hợp cùng công nghệ HEIQ Eco Dry tiên tiến giúp chống thấm nước và bảo vệ giày cực tốt.\r\n', 11, 9),
(149, 'Vans UA Style 36 Fuzzy Lace - VN0A54F6UNY', 1750000, 'Vans UA Style 36 Fuzzy Lace - VN0A54F6UNY.jpg', 'Vans Style 36 Fuzzy Lace quay trở lại với một diện mạo vô cùng ấn tượng. Được cải tiến dựa trên form dáng Old Skool quen thuộc cùng phối màu trẻ trung, hiện đại. Với chất liệu chính là 47.84% da, 52.16% vải tạo cho thiết kế độ bền tốt và linh hoạt hơn. Đệm lót êm ái cũng hỗ trợ tối đa cho việc chuyển động trở nên nhẹ nhàng và thoải mái hơn cho người dùng.\r\n', 11, 1),
(150, 'Vans UA Old Skool Live At Hov - VN0A5JMI1OJ', 1750000, 'Vans UA Old Skool Live At Hov - VN0A5JMI1OJ.jpg', 'Vans Live At Hov mang đến thiết kế mới mẻ, cá tính hơn dựa trên những kiểu dáng cổ điển quen thuộc của nhà Vans. Bên cạnh đó, với gam màu chủ đạo là đen sẽ giúp cho outfit thường ngày của bạn trở nên ấn tượng và thu hút hơn. Thông điệp bộ sưu tập lần này được thể hiện qua những “biến tấu” của logo thương hiệu cùng dòng “House of Vans” ở đế giày. Hứa hẹn sẽ mang đến một trải nghiệm tuyệt vời cùng các tiện nghi được cải tiến ở lần quay lại của nhà Vans.\r\n', 10, 9),
(151, 'Vans UA Era Live At Hov - VN0A5KX5BA2', 1450000, 'Vans UA Era Live At Hov - VN0A5KX5BA2.jpg', 'Vans Live At Hov mang đến thiết kế mới mẻ, cá tính hơn dựa trên những kiểu dáng cổ điển quen thuộc của nhà Vans. Bên cạnh đó, với gam màu chủ đạo là đen sẽ giúp cho outfit thường ngày của bạn trở nên ấn tượng và thu hút hơn. Thông điệp bộ sưu tập lần này được thể hiện qua những “biến tấu” của logo thương hiệu cùng dòng “House of Vans” ở đế giày. Hứa hẹn sẽ mang đến một trải nghiệm tuyệt vời cùng các tiện nghi được cải tiến ở lần quay lại của nhà Vans.\r\n', 11, 9),
(152, 'Vans UA Authentic 44 DX Our Legends Mongoose', 2100000, 'Vans UA Authentic 44 DX Our Legends Mongoose.jpg', 'Vans x Our Legends (Mongoose) được xây dựng dựa trên hình bóng của dòng Authentic 44 DX hứa hẹn sẽ gây bùng nổ cho cộng đồng đam mê BMX và Skate. Với chất liệu chính là 100% Textile kết hợp cùng đệm lót OrthoLite hiện đại sẽ mang tới những phút giây trải nghiệm tuyệt vời nhất. Đặc biệt với những phối màu rực rỡ tượng trưng cho từng cột mốc lịch sử của Mongoose, được thể hiện trong bộ sưu tập lần này sẽ khiến người mang thêm phần thích thú.\r\n', 11, 9),
(153, 'Vans UA Authentic 44 DX Our Legends Mongoose - VN0', 2100000, 'Vans UA Authentic 44 DX Our Legends Mongoose - VN0A4BVYBLK.jpg', 'Vans x Our Legends (Mongoose) được xây dựng dựa trên hình bóng của dòng Authentic 44 DX hứa hẹn sẽ gây bùng nổ cho cộng đồng đam mê BMX và Skate. Với chất liệu chính là 100% Textile kết hợp cùng đệm lót OrthoLite hiện đại sẽ mang tới những phút giây trải nghiệm tuyệt vời nhất. Đặc biệt với những phối màu rực rỡ tượng trưng cho từng cột mốc lịch sử của Mongoose, được thể hiện trong bộ sưu tập lần này sẽ khiến người mang thêm phần thích thú.\r\n', 11, 9),
(154, 'Giày thời trang nam X-game BADAO 4.0 Anta 81223808', 2199000, 'Giày thời trang nam X-game BADAO 4.0 Anta 812238080-2.png', 'Giày thời trang nam X-game BADAO 4.0 Anta 812238080-2 \r\nAnta Badao 4.0 Casual Shoes từ Basketball Culture Collection là sản phẩm hợp tác với diễn viên, vũ công và ca sĩ nhóm nhạc nam nổi tiếng Wang Yibo của UNIQ. \r\n\r\n- Chất liệu trên được làm từ chất liệu dệt kết hợp với da nhân tạo để tạo sự thoải mái hàng ngày. \r\n\r\n- Đế được làm bằng công nghệ A-Shock, mang lại trọng lượng nhẹ, đệm, độ mềm và khả năng đàn hồi tối ưu', 12, 11),
(155, 'Giày chạy thể thao nam KEEP MOVING Anta 812245573-', 1359000, 'Giày chạy thể thao nam KEEP MOVING Anta 812245573-2.png', 'Giày chạy thể thao nam KEEP MOVING Anta 812245573-2 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. \r\nGIÀY CHẠY ĐỘNG NĂNG - TĂNG TỐC THÊM AN TOÀN: Được thiết kế đặc biệt để sải bước mạnh mẽ trên những cung đường thành thị, ANTA WILD với đế cao su mềm tăng độ êm và chiều cao đáng kể, giúp runner dễ dàng bứt tốc để đạt sải chạy tối đa.', 12, 12),
(156, 'Giày thời trang nam SKATE AOJIE', 1759000, 'Giày thời trang nam SKATE AOJIE.png', 'Giày thời trang nam SKATE AOJIE Anta 812318040-3 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. Đế cao su mềm, êm ái giúp bạn cảm thấy dễ chịu khi di chuyển trong thời gian dài. ', 12, 10),
(157, 'Giày thời trang nam A-JELLY Anta 812318881-5', 2199000, 'Giày thời trang nam A-JELLY Anta 812318881-5.jpg', 'Giày thời trang nam A-JELLY Anta 812318881-5 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. \r\n\r\nCông nghệ A-JELLY: Kết cấu đế cao su mềm dẻo như thạch, vật liệu thân thiện với môi trường, độ bền cao nhưng có khả năng phân huỷ sinh học đảm bảo khả năng chống nén và biến dạng tuyệt vời nhưng vẫn cho phép người mang di chuyển với độ ổn định và thoải mái hơn trong suốt vòng đời của giày.', 12, 11),
(158, 'Giày thời trang nam X-Game Shoes Anta 812248026-1', 2199000, 'Giày thời trang nam X-Game Shoes Anta 812248026-1.png', 'Giày thời trang nam X-Game Shoes Anta 812248026-1 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. Đế cao su mềm, êm ái giúp bạn cảm thấy dễ chịu khi di chuyển trong thời gian dài. \r\n\r\n', 12, 9),
(159, 'Giày chạy thể thao nam CITY RUN Anta 812235565-5', 1599000, 'Giày chạy thể thao nam CITY RUN Anta 812235565-5.png', 'Giày chạy thể thao nam CITY RUN Anta 812235565-5 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. ', 12, 10),
(160, 'Giày thời trang nam Fashion Worship 3.0 Anta 81223', 1599000, 'Giày thời trang nam Fashion Worship 3.0 Anta 812238840-4.png', 'Giày thời trang nam Fashion Worship 3.0 Anta 812238840-4 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. Đế cao su mềm, êm ái giúp bạn cảm thấy dễ chịu khi di chuyển trong thời gian dài. Đồng hành cùng thiết kế thời trang, giày thể thao Anta mang tính năng thoáng khí, giúp cân bằng nhiệt và độ ẩm trong những điều kiện môi trường khác nhau, đế có các đường rãnh chống trơn trượt. Sản phẩm sở hữu phong cách hiện đại, khỏe khoắn, màu sắc trẻ trung hợp với nhiều lứa tuổi và dáng người. Đường may tỉ mỉ, tinh tế tạo cho bạn cảm giác yên tâm về chất lượng. Sản phẩm có tính ứng dụng cao, mang khi tập luyện thể thao, đi làm hay đi chơi...', 12, 10),
(161, 'Giày thời trang nữ A-JELLY Anta 822318881-5', 2199000, 'Giày thời trang nữ A-JELLY Anta 822318881-5.jpg', 'Giày thời trang nữ A-JELLY Anta 822318881-5 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. ', 12, 10),
(162, 'Giày thời trang nữ SKATE AOJIE Anta 822318040-3', 1759000, 'Giày thời trang nữ SKATE AOJIE Anta 822318040-3.png', 'Giày thời trang nữ SKATE AOJIE Anta 822318040-3 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. Đế cao su mềm, êm ái giúp bạn cảm thấy dễ chịu khi di chuyển trong thời gian dài. ', 12, 1),
(163, 'Giày thời trang nữ A-JELLY Anta 822318881-7', 2199000, 'Giày thời trang nữ A-JELLY Anta 822318881-7.png', 'Giày thời trang nữ A-JELLY Anta 822318881-7 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. ', 12, 10),
(164, 'Giày thời trang nam A-JELLY Anta 812318881-2', 2199000, 'Giày thời trang nam A-JELLY Anta 812318881-2.png', 'Giày thời trang nam A-JELLY Anta 812318881-2 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. ', 12, 9),
(165, 'Giày thời trang nữ SKATE AOJIE Anta 822318040-1', 1111, 'Giày thời trang nữ SKATE AOJIE Anta 822318040-1.png', 'Giày thời trang nữ SKATE AOJIE Anta 822318040-1 sở hữu thiết kế thời trang, năng động, cùng chất liệu bền bỉ hỗ trợ vận động tốt và bảo vệ đôi chân cho người mang. Đế cao su mềm, êm ái giúp bạn cảm thấy dễ chịu khi di chuyển trong thời gian dài. ', 12, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `loai_size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `loai_size`) VALUES
(6, 36),
(7, 37),
(8, 38),
(9, 39),
(10, 40),
(11, 41),
(12, 42);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size_sp`
--

CREATE TABLE `size_sp` (
  `idSP` int(11) NOT NULL,
  `idSize` int(11) NOT NULL,
  `so_luong_con` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `size_sp`
--

INSERT INTO `size_sp` (`idSP`, `idSize`, `so_luong_con`) VALUES
(108, 9, 10),
(108, 11, 10),
(109, 9, 10),
(109, 11, 10),
(109, 12, 20),
(110, 10, 20),
(110, 11, 10),
(110, 12, 20),
(111, 10, 20),
(111, 11, 15),
(112, 10, 20),
(112, 12, 30),
(113, 11, 10),
(114, 11, 10),
(114, 12, 20),
(115, 10, 20),
(115, 11, 15),
(116, 10, 20),
(116, 12, 30),
(118, 11, 10),
(119, 9, 20),
(119, 10, 20),
(119, 11, 10),
(120, 9, 17),
(120, 10, 30),
(120, 11, 10),
(121, 9, 20),
(121, 10, 20),
(121, 11, 10),
(122, 9, 20),
(122, 10, 20),
(122, 11, 10),
(123, 9, 20),
(123, 10, 20),
(123, 11, 10),
(124, 9, 20),
(124, 10, 20),
(124, 11, 10),
(125, 9, 20),
(125, 10, 20),
(125, 11, 10),
(126, 9, 20),
(126, 10, 20),
(126, 11, 10),
(127, 9, 20),
(127, 10, 20),
(127, 11, 10),
(128, 9, 20),
(128, 10, 20),
(128, 11, 10),
(129, 9, 20),
(129, 10, 20),
(129, 11, 10),
(130, 9, 20),
(130, 10, 20),
(130, 11, 10),
(131, 9, 20),
(131, 10, 20),
(131, 11, 10),
(132, 9, 20),
(132, 10, 20),
(132, 11, 10),
(133, 9, 20),
(133, 10, 20),
(133, 11, 10),
(134, 9, 20),
(134, 10, 20),
(134, 11, 10),
(135, 9, 20),
(135, 10, 20),
(135, 11, 10),
(136, 10, 16),
(136, 12, 16),
(137, 9, 11),
(137, 10, 15),
(137, 12, 16),
(138, 9, 11),
(138, 10, 15),
(138, 12, 16),
(139, 9, 11),
(139, 10, 15),
(139, 12, 16),
(140, 9, 11),
(140, 10, 15),
(140, 12, 16),
(141, 9, 11),
(141, 10, 15),
(141, 12, 16),
(142, 9, 11),
(142, 10, 15),
(142, 12, 16),
(143, 9, 11),
(143, 10, 15),
(143, 12, 16),
(144, 9, 11),
(144, 10, 15),
(144, 12, 16),
(145, 9, 11),
(145, 10, 15),
(145, 12, 16),
(146, 9, 11),
(146, 10, 15),
(146, 12, 16),
(147, 9, 11),
(147, 10, 15),
(147, 12, 16),
(148, 9, 11),
(148, 10, 15),
(148, 12, 16),
(149, 9, 11),
(149, 10, 15),
(149, 12, 16),
(150, 9, 11),
(150, 10, 15),
(150, 12, 16),
(151, 9, 11),
(151, 10, 15),
(151, 12, 16),
(152, 9, 11),
(152, 10, 15),
(152, 12, 16),
(153, 9, 11),
(153, 10, 15),
(153, 12, 16),
(154, 9, 11),
(154, 10, 15),
(154, 12, 16),
(156, 9, 12),
(156, 10, 12),
(156, 11, 17),
(157, 9, 12),
(157, 10, 12),
(157, 11, 17),
(158, 9, 12),
(158, 10, 12),
(158, 11, 17),
(159, 9, 12),
(159, 10, 12),
(159, 11, 17),
(160, 10, 12),
(161, 9, 12),
(162, 9, 11),
(163, 11, 12),
(164, 10, 11),
(165, 9, 7),
(165, 12, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ten_dang_nhap` varchar(30) NOT NULL,
  `mat_khau` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vai_tro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ten_dang_nhap`, `mat_khau`, `vai_tro`) VALUES
('a', '123456', 1),
('admin', '123456', 0),
('chuminhquyet', '1', 1),
('nguyentungduong', '1', 1),
('tranquangtu', '1', 1),
('tu', '123456', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`idHD`,`idSize`,`idSP`),
  ADD KEY `fk_chitiethoadon_size` (`idSize`),
  ADD KEY `fk_chitiethoadon_sanpham` (`idSP`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hoadon_khachhang` (`idKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`idDM`),
  ADD KEY `fk_sanpham_sale` (`idSale`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size_sp`
--
ALTER TABLE `size_sp`
  ADD PRIMARY KEY (`idSP`,`idSize`),
  ADD KEY `fk_sizesp_size` (`idSize`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ten_dang_nhap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_chitiethoadon_hoadon` FOREIGN KEY (`idHD`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `fk_chitiethoadon_sanpham` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_chitiethoadon_size` FOREIGN KEY (`idSize`) REFERENCES `size` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_khachhang` FOREIGN KEY (`idKH`) REFERENCES `khachhang` (`id`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_taikhoan_khachhang` FOREIGN KEY (`ten_dang_nhap`) REFERENCES `taikhoan` (`ten_dang_nhap`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`idDM`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `fk_sanpham_sale` FOREIGN KEY (`idSale`) REFERENCES `sale` (`id`);

--
-- Các ràng buộc cho bảng `size_sp`
--
ALTER TABLE `size_sp`
  ADD CONSTRAINT `fk_sizesp_sanpham` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_sizesp_size` FOREIGN KEY (`idSize`) REFERENCES `size` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
