-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2024 lúc 02:18 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1t`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `ngaydang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `id_user`, `id_product`, `noidung`, `ngaydang`) VALUES
(2, 1, 12, 'kkk', '2023-12-12 00:00:00'),
(3, 1, 12, 'vip', '2023-12-12 00:00:00'),
(4, 1, 20, 'lo', '2024-03-28 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(12, 'Vàng'),
(13, 'Trắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `img`) VALUES
(1, 'Áo thun', 'ao6.jpg'),
(2, 'Áo hoddiee ', 'aohoodie6.jpg'),
(5, 'Áo khoác', 'aokhoac9.jpg'),
(6, 'Áo Len', 'aolen1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ngaydathang` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL DEFAULT '1' COMMENT '1.Thanh toán khi nhận hàng\r\n2.Thanh toán online',
  `tong` decimal(10,2) NOT NULL DEFAULT 0.00,
  `trangthai` int(11) NOT NULL DEFAULT 1 COMMENT '1.Đơn hàng mới\r\n2.Đang xử lí\r\n3.Đang giao hàng\r\n4.Đã giao hàng\r\n5.Đơn hàng bị hủy\r\n6.Đang chờ duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `id_user`, `ngaydathang`, `email`, `address`, `phone`, `hoten`, `pay`, `tong`, `trangthai`) VALUES
(14, 1, '2023-12-11', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 680000.00, 5),
(15, 1, '2023-12-11', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 680000.00, 5),
(16, 1, '2023-12-11', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 680000.00, 4),
(17, 1, '2023-12-11', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 0.00, 5),
(18, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 340000.00, 4),
(19, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 3940000.00, 5),
(20, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 900000.00, 4),
(21, 7, '2023-12-12', 'tuanpvph38554@fpt.edu.vn', 'Trịnh Văn Bô', '0328518575', 'Phạm văn Tuân', 'offline', 1400000.00, 1),
(22, 7, '2023-12-12', 'tuanpvph38554@fpt.edu.vn', 'Trịnh Văn Bô', '0328518575', 'Phạm văn Tuân', 'offline', 5600000.00, 1),
(23, 7, '2023-12-12', 'tuanpvph38554@fpt.edu.vn', 'Trịnh Văn Bô', '0328518575', 'Phạm văn Tuân', 'offline', 700000.00, 5),
(24, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 2800000.00, 1),
(28, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 700000.00, 1),
(33, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'vnpay', 2100000.00, 2),
(37, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan123', 'offline', 2100000.00, 1),
(39, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 3103701.00, 1),
(40, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 234567.00, 1),
(42, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 600000.00, 1),
(43, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 600000.00, 1),
(46, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 1500000.00, 1),
(48, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 450000.00, 1),
(49, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 0.00, 5),
(50, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 0.00, 5),
(51, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 1360000.00, 1),
(52, 1, '2023-12-12', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 450000.00, 3),
(55, 1, '2023-12-13', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 2972835.00, 4),
(60, 7, '2023-12-13', 'tuanpvph38554@fpt.edu.vn', 'Trịnh Văn Bô', '0328518575', 'Phạm văn Tuân', 'vnpay', 1350000.00, 4),
(61, 1, '2023-12-13', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 1650000.00, 5),
(62, 1, '2023-12-13', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 300000.00, 4),
(63, 1, '2024-01-31', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 19999.00, 5),
(64, 1, '2024-01-31', 'phamtuan17224@gmail.com', 'Hà Nội', '0328518575', 'phamtuan', 'offline', 19999.00, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `color` int(11) NOT NULL DEFAULT 0,
  `size` int(11) NOT NULL DEFAULT 0,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `soluong` int(11) NOT NULL,
  `thanhtien` double(10,2) NOT NULL,
  `idbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `id_user`, `id_product`, `img`, `name`, `color`, `size`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(2, 1, 10, 'upload/ao5.jpg', 'Áo hoodie dáng rộng dài tay có túi in hình bến thành thời trang đường phố phong cách Hàn Quốc mùa thu đông - T1S M03', 13, 18, 2333.00, 4, 9332.00, 6),
(3, 1, 10, 'upload/ao5.jpg', 'Áo hoodie dáng rộng dài tay có túi in hình bến thành thời trang đường phố phong cách Hàn Quốc mùa thu đông - T1S M03', 13, 18, 2333.00, 4, 9332.00, 7),
(4, 1, 10, 'upload/ao5.jpg', 'Áo hoodie dáng rộng dài tay có túi in hình bến thành thời trang đường phố phong cách Hàn Quốc mùa thu đông - T1S M03', 13, 18, 2333.00, 4, 9332.00, 8),
(5, 1, 10, 'upload/ao5.jpg', 'Áo hoodie dáng rộng dài tay có túi in hình bến thành thời trang đường phố phong cách Hàn Quốc mùa thu đông - T1S M03', 13, 18, 2333.00, 4, 9332.00, 9),
(6, 1, 10, 'upload/ao5.jpg', 'Áo hoodie dáng rộng dài tay có túi in hình bến thành thời trang đường phố phong cách Hàn Quốc mùa thu đông - T1S M03', 13, 18, 2333.00, 4, 9332.00, 10),
(7, 1, 10, 'upload/ao5.jpg', 'Áo hoodie dáng rộng dài tay có túi in hình bến thành thời trang đường phố phong cách Hàn Quốc mùa thu đông - T1S M03', 13, 18, 2333.00, 4, 9332.00, 11),
(8, 1, 12, 'upload/aohoodie1.jpg', 'giày11', 13, 18, 5003300.00, 3, 15009900.00, 11),
(9, 1, 10, 'upload/ao5.jpg', 'Áo hoodie dáng rộng dài tay có túi in hình bến thành thời trang đường phố phong cách Hàn Quốc mùa thu đông - T1S M03', 12, 19, 2333.00, 7, 16331.00, 11),
(10, 1, 19, 'upload/ao7.jpg', 'Áo thun tay lỡ form rộng unisex WOOPS, Áo phông nam nữ form rộng ATL14', 13, 18, 340000.00, 4, 1360000.00, 11),
(11, 1, 19, 'upload/ao7.jpg', 'Áo thun tay lỡ form rộng unisex WOOPS, Áo phông nam nữ form rộng ATL14', 13, 18, 340000.00, 2, 680000.00, 14),
(12, 1, 19, 'upload/ao7.jpg', 'Áo thun tay lỡ form rộng unisex WOOPS, Áo phông nam nữ form rộng ATL14', 13, 18, 340000.00, 2, 680000.00, 15),
(13, 1, 19, 'upload/ao7.jpg', 'Áo thun tay lỡ form rộng unisex WOOPS, Áo phông nam nữ form rộng ATL14', 13, 18, 340000.00, 2, 680000.00, 16),
(14, 1, 19, 'upload/ao7.jpg', 'Áo thun tay lỡ form rộng unisex WOOPS, Áo phông nam nữ form rộng ATL14', 13, 18, 340000.00, 1, 340000.00, 18),
(15, 1, 19, 'upload/ao7.jpg', 'Áo thun tay lỡ form rộng unisex WOOPS, Áo phông nam nữ form rộng ATL14', 13, 18, 340000.00, 1, 340000.00, 19),
(16, 1, 20, 'upload/ao2.jpg', 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 13, 19, 450000.00, 7, 3150000.00, 19),
(17, 1, 20, 'upload/ao2.jpg', 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 12, 18, 450000.00, 1, 450000.00, 19),
(18, 1, 20, 'upload/ao2.jpg', 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 13, 19, 450000.00, 2, 900000.00, 20),
(19, 7, 12, 'upload/aokhoac8.jpg', ' Áo Khoác Regular Technical AK036 Màu Rêu', 19, 12, 350000.00, 4, 1400000.00, 21),
(20, 7, 12, 'upload/aokhoac8.jpg', ' Áo Khoác Regular Technical AK036 Màu Rêu', 18, 12, 350000.00, 16, 5600000.00, 22),
(21, 7, 12, 'upload/aokhoac8.jpg', ' Áo Khoác Regular Technical AK036 Màu Rêu', 13, 19, 350000.00, 2, 700000.00, 23),
(22, 1, 12, 'upload/aokhoac8.jpg', ' Áo Khoác Regular Technical AK036 Màu Rêu', 13, 18, 350000.00, 8, 2800000.00, 24),
(23, 1, 12, 'upload/aokhoac8.jpg', ' Áo Khoác Regular Technical AK036 Màu Rêu', 12, 19, 350000.00, 2, 700000.00, 28),
(24, 1, 12, 'upload/aokhoac8.jpg', ' Áo Khoác Regular Technical AK036 Màu Rêu', 12, 19, 350000.00, 6, 2100000.00, 37),
(25, 1, 18, 'upload/ao6.jpg', 'Áo thun unisex nam nữ tay lỡ form rộng chất coton su', 12, 19, 234567.00, 3, 703701.00, 39),
(26, 1, 21, 'upload/aolen2.png', 'Áo len AK', 13, 19, 300000.00, 8, 2400000.00, 39),
(27, 1, 18, 'upload/ao6.jpg', 'Áo thun unisex nam nữ tay lỡ form rộng chất coton su', 13, 19, 234567.00, 1, 234567.00, 40),
(28, 1, 21, 'upload/aolen2.png', 'Áo len AK', 12, 19, 300000.00, 2, 600000.00, 42),
(29, 1, 21, 'upload/aolen2.png', 'Áo len AK', 12, 19, 300000.00, 2, 600000.00, 43),
(30, 1, 21, 'upload/aolen2.png', 'Áo len AK', 12, 19, 300000.00, 5, 1500000.00, 46),
(31, 1, 20, 'upload/ao2.jpg', 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 12, 19, 450000.00, 1, 450000.00, 48),
(32, 1, 19, 'upload/ao7.jpg', 'Áo thun tay lỡ form rộng unisex WOOPS, Áo phông nam nữ form rộng ATL14', 13, 19, 340000.00, 4, 1360000.00, 51),
(33, 1, 20, 'upload/ao2.jpg', 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 13, 19, 450000.00, 1, 450000.00, 52),
(34, 1, 18, 'upload/ao6.jpg', 'Áo thun unisex nam nữ tay lỡ form rộng chất coton su', 13, 19, 234567.00, 5, 1172835.00, 55),
(35, 1, 20, 'upload/ao2.jpg', 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 13, 19, 450000.00, 4, 1800000.00, 55),
(36, 7, 20, 'upload/ao2.jpg', 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 12, 18, 450000.00, 3, 1350000.00, 60),
(37, 1, 21, 'upload/aolen2.png', 'Áo len AK', 13, 18, 300000.00, 4, 1200000.00, 61),
(38, 1, 20, 'upload/ao2.jpg', 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 13, 19, 450000.00, 1, 450000.00, 61),
(39, 1, 22, 'upload/ao1.jpg', 'Áo Adidas abc', 13, 18, 300000.00, 1, 300000.00, 62);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `luotxem` int(11) DEFAULT 0,
  `id_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `des`, `price`, `quantity`, `img`, `luotxem`, `id_dm`) VALUES
(10, 'Áo hoodie dáng rộng dài tay có túi in hình bến thành thời trang đường phố phong cách Hàn Quốc mùa thu đông - T1S M03', 'Áo hodddie được sản xuất tại China', 300000.00, 111, 'aohoodie3.jpg', 3, 2),
(12, ' Áo Khoác Regular Technical AK036 Màu Rêu', 'Sản phẩm cực đẹp', 350000.00, 442, 'aokhoac8.jpg', 13, 5),
(14, 'Áo Khoác Dù Surfing Form Regular AK051 Màu Rêu', 'Sản phẩm ok nhất', 420000.00, 250, 'aokhoac3.jpg', 1, 5),
(15, 'Áo Khoác Da Lộn Rã Phối Regular AK054 Màu Nâu', 'Áo hodddie được sản xuất tại Mỹ', 333333.00, 430, 'aokhoac5.jpg', 0, 5),
(16, 'Áo Hoodie bản họa tiết thêu sao da đẳng cấp độ hoàn thiện cao Siêu cấp', 'Áo hodddie được sản xuất tại China', 555555.00, 441, 'aohoodie4.jpg', 1, 2),
(17, 'Áo hoodie nỉ xốp dày in PETS form rộng', 'Áo hodddie được sản xuất tại China', 240000.00, 345, 'aohoodie1.jpg', 0, 2),
(18, 'Áo thun unisex nam nữ tay lỡ form rộng chất coton su', 'Sản phẩm cực đẹp', 234567.00, 321, 'ao6.jpg', 3, 1),
(19, 'Áo thun tay lỡ form rộng unisex WOOPS, Áo phông nam nữ form rộng ATL14', 'Sản phẩm ok nhất', 340000.00, 55, 'ao7.jpg', 2, 1),
(20, 'Áo thun tay lỡ unisex Logo Gu Cì phối mí nổi mẫu mới', 'Áo hodddie được sản xuất tại China', 450000.00, 444, 'ao2.jpg', 25, 1),
(21, 'Áo len AK', 'Áo len được sản xuất tại China', 300000.00, 789, 'aolen2.png', 12, 6),
(22, 'Áo Adidas abc', 'Áo hodddie được sản xuất tại China', 300000.00, 200, 'ao1.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `size_id`, `color_id`, `quantity`) VALUES
(1, 12, 18, 13, 123),
(5, 12, 19, 13, 555),
(6, 12, 18, 12, 444),
(8, 12, 19, 12, 444),
(9, 21, 18, 12, 500),
(10, 21, 18, 13, 496),
(11, 21, 19, 12, 491),
(12, 21, 19, 13, 500),
(13, 20, 18, 12, 397),
(14, 20, 19, 12, 399),
(15, 20, 18, 13, 400),
(16, 20, 19, 13, 394),
(17, 19, 18, 12, 300),
(18, 19, 19, 12, 300),
(19, 19, 18, 13, 300),
(20, 19, 19, 13, 296),
(21, 18, 18, 12, 200),
(22, 18, 19, 12, 300),
(23, 18, 18, 13, 200),
(24, 18, 19, 13, 195),
(25, 22, 19, 13, 400),
(26, 22, 18, 12, 444);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(18, 'M'),
(19, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `vaitro` varchar(20) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `hoten`, `phone`, `address`, `ngaytao`, `vaitro`, `avatar`) VALUES
(1, 'phamtuan', '1', 'phamtuan17224@gmail.com', 'Phạm Văn Tuân', '0328518575', 'Hà Nội', '2023-12-07 05:59:20', '1', NULL),
(2, 'phamtuan', '11', 'phamtuan1724@gmail.com', 'phtttt', '0328518575', 'Trịnh Văn Bô', '0000-00-00 00:00:00', '2', NULL),
(3, 'phamtuan', '2', 'phamtuan1724@gmail.com', 'tuand', '0328518575', 'Trịnh Văn Bô', '0000-00-00 00:00:00', '1', NULL),
(7, 'Phạm văn Tuân', 'fff', 'tuanpvph38554@fpt.edu.vn', 'tuandzzzz', '0328518575', 'Trịnh Văn Bô', '0000-00-00 00:00:00', '', NULL),
(8, 'phamtuan', 'phamtuan123@', 'tuanpvph38854@fpt.edu.vn', 'Phạm Văn Tuân', '0328518555', 'số 2 Trịnh Văn Bô', '0000-00-00 00:00:00', '', NULL),
(10, 'phamtuanno1', 'phamtuan123', 'tuanpvph38554@fpt.edu.vn', 'Phạm Văn Tuân', '0394324234', 'số 2 Trịnh Văn Bô', '0000-00-00 00:00:00', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `id` int(10) NOT NULL,
  `vnp_Amount` varchar(50) NOT NULL,
  `vnp_BankCode` varchar(50) NOT NULL,
  `vnp_BankTranNo` varchar(50) NOT NULL,
  `vnp_CardType` varchar(50) NOT NULL,
  `vnp_OrderInfo` varchar(50) NOT NULL,
  `vnp_PayDate` varchar(50) NOT NULL,
  `vnp_ResponseCode` varchar(50) NOT NULL,
  `vnp_TmnCode` varchar(50) NOT NULL,
  `vnp_TransactionNo` varchar(50) NOT NULL,
  `vnp_TransactionStatus` varchar(50) NOT NULL,
  `vnp_TxnRef` text NOT NULL,
  `vnp_SecureHash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variants_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variants_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
