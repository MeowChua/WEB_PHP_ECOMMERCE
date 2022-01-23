-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 30, 2021 lúc 07:20 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `IDCTDH` int(11) NOT NULL,
  `maDonHang` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdtKH` int(11) NOT NULL,
  `ghiChuCuaKhachhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soLuongSP` int(11) NOT NULL,
  `sizeSanPham` int(11) NOT NULL,
  `giaSanPham` int(11) NOT NULL,
  `mieuTaSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhAnhSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`IDCTDH`, `maDonHang`, `tenNguoiNhan`, `sdtKH`, `ghiChuCuaKhachhang`, `maSanPham`, `tenSanPham`, `soLuongSP`, `sizeSanPham`, `giaSanPham`, `mieuTaSP`, `hinhAnhSP`, `diachi`) VALUES
(38, 1, 'menpro111111', 2147483647, '', 50, 'Vans Old Skool V Sport', 1, 40, 2000000, 'Dòng sản phẩm này hướng tới sự đơn giản nhưng vẫn có điểm nhấn, dải logo Flying V được đặt bên hông giày vừa mang dấu ấn thương hiệu vừa giúp cho những chiếc giày thêm sức hút. Ngoài ra, phần thân Vans Sport hiện nay cũng đượ', '1588456302.jpg', ''),
(39, 1, 'menpro111111', 2147483647, '', 50, 'Vans Old Skool V Sport', 1, 40, 2000000, 'Dòng sản phẩm này hướng tới sự đơn giản nhưng vẫn có điểm nhấn, dải logo Flying V được đặt bên hông giày vừa mang dấu ấn thương hiệu vừa giúp cho những chiếc giày thêm sức hút. Ngoài ra, phần thân Vans Sport hiện nay cũng đượ', '1588456302.jpg', ''),
(40, 1, 'menpro111111', 2147483647, '', 62, 'BASAS BUMPER GUM - LOW TOP - OFFWHITE', 1, 36, 450000, 'Vẫn là màu trắng cổ điển của dòng giày Basas, nhưng phần mũi của những sản phẩm thuộc Basas \"Bumper Gum\" lại sở hữu một diện mạo hoàn toàn khác biệt nhờ miếng cao su thô màu nâu đầy sáng tạo, phá cách. \"Bumper Gum\" là đôi già', 'ananas1.jpg', ''),
(41, 2, 'jsadsadsad', 3423525, '', 25, 'Adidas EQT Bask ADV Xám Gót Xanh', 1, 38, 1950000, 'adidas', '1588453448.jpg', ''),
(42, 2, 'jsadsadsad', 3423525, '', 63, 'Giày Fila Disruptor 2 Trắng ', 1, 39, 1300000, 'Fila Disruptor 2 Trắng  sở hữu thiết kế khá ấn tượng, mang đậm phong cách sporty. Mẫu giày mang đến cho người mang sự trẻ trung, năng động, thoải mái, sắc trắng bao phủ hầu hết thân giày,  vừa là điể', 'fila1.jpg', ''),
(43, 2, 'jsadsadsad', 3423525, '', 64, 'Giày Reebok Royal Bridge DV5170', 1, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(48, 3, 'khach113131313', 2147483647, '', 8, 'VANS CLASSIC SLIP ON SKULLS BLACK', 1, 42, 1400000, 'Gooood', '1588064130.jpg', ''),
(49, 3, 'khach113131313', 2147483647, '', 8, 'VANS CLASSIC SLIP ON SKULLS BLACK', 1, 42, 1400000, 'Gooood', '1588064130.jpg', ''),
(50, 3, 'khach113131313', 2147483647, '', 62, 'BASAS BUMPER GUM - LOW TOP - OFFWHITE', 1, 36, 450000, 'Vẫn là màu trắng cổ điển của dòng giày Basas, nhưng phần mũi của những sản phẩm thuộc Basas \"Bumper Gum\" lại sở hữu một diện mạo hoàn toàn khác biệt nhờ miếng cao su thô màu nâu đầy sáng tạo, phá cách. \"Bumper Gum\" là đôi già', 'ananas1.jpg', ''),
(51, 4, 'nhungpro', 23424234, '', 42, 'Converse Chuck Taylor All Star Side Pocket', 1, 40, 1600000, 'xcczczxc', '1588455551.jpg', ''),
(52, 5, 'menpro232323', 2147483647, '', 1, 'NIKE AIR FORCE 1 SHADOW AQUA PINK', 1, 40, 4600000, 'Good', '1588063730.jpg', ''),
(53, 5, 'menpro232323', 2147483647, '', 1, 'NIKE AIR FORCE 1 SHADOW AQUA PINK', 2, 40, 4600000, 'Good', '1588063730.jpg', ''),
(54, 5, 'menpro232323', 2147483647, '', 64, 'Giày Reebok Royal Bridge DV5170', 1, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(55, 6, 'beyeu12234', 933525255, '', 44, 'Converse Chuck Taylor All Star Archival Camo', 3, 38, 1500000, 'Nằm trong BST Converse Camo Connection, Giày Converse Chuck Taylor All Star Camo Patch trang bị đế OrthoLite® giúp người dùng có được sự thoải mái tối đa khi sử dụng. Chất liệu vải canvas thoáng mát. Phần vải lót bên trong củ', '1588455701.jpg', ''),
(56, 6, 'beyeu12234', 933525255, '', 62, 'BASAS BUMPER GUM - LOW TOP - OFFWHITE', 2, 36, 450000, 'Vẫn là màu trắng cổ điển của dòng giày Basas, nhưng phần mũi của những sản phẩm thuộc Basas \"Bumper Gum\" lại sở hữu một diện mạo hoàn toàn khác biệt nhờ miếng cao su thô màu nâu đầy sáng tạo, phá cách. \"Bumper Gum\" là đôi già', 'ananas1.jpg', ''),
(57, 6, 'beyeu12234', 933525255, '', 48, 'Converse Chuck Taylor All Star Fearless', 2, 41, 1500000, 'Fearless', '1588456020.png', ''),
(58, 7, 'beyeuuuuuu', 242424, '', 49, 'Vans Old Skool 36 DX Anaheim Factory', 2, 39, 2200000, 'Kiểu dáng Old Skool cổ điển với lót giày được nâng cấp công nghệ Đệm lót UltraCush mang đến một cảm nhận khác biệt với dòng giày cao cấp này của nhà Vans mang lại sự thoải mái & êm ái cho đôi chân. Anaheim Factory 36DX Vintag', '1588456223.jpg', ''),
(59, 8, 'nhungne', 24344, '', 42, 'Converse Chuck Taylor All Star Side Pocket', 2, 40, 1600000, 'xcczczxc', '1588455551.jpg', ''),
(60, 8, 'nhungne', 24344, '', 64, 'Giày Reebok Royal Bridge DV5170', 2, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(61, 9, 'nhungnuane', 23432434, '', 36, 'Nike React Presto \"Ghost\"', 2, 40, 3000000, 'ácgfdgdfgdfg', '1588454562.jpg', ''),
(62, 10, 'khac234443', 23424, '', 49, 'Vans Old Skool 36 DX Anaheim Factory', 2, 39, 2200000, 'Kiểu dáng Old Skool cổ điển với lót giày được nâng cấp công nghệ Đệm lót UltraCush mang đến một cảm nhận khác biệt với dòng giày cao cấp này của nhà Vans mang lại sự thoải mái & êm ái cho đôi chân. Anaheim Factory 36DX Vintag', '1588456223.jpg', ''),
(63, 11, 'khactiepne', 2147483647, '', 13, 'NEW BALANCE 530 BLACK WHITE', 4, 41, 1500000, 'Goood', '1588064283.jpg', ''),
(64, 12, 'nguoinhan1', 123131313, '', 32, 'NIKE AIR FORCE 1 SHADOW ', 3, 38, 2700000, 'kạkjcakjc', '1588454749.jpg', ''),
(65, 13, '1231', 321321, '321', 32, 'NIKE AIR FORCE 1 SHADOW ', 2, 38, 2700000, 'kạkjcakjc', '1588454749.jpg', ''),
(66, 13, '1231', 321321, '321', 32, 'NIKE AIR FORCE 1 SHADOW ', 2, 38, 2700000, 'kạkjcakjc', '1588454749.jpg', ''),
(67, 14, 'test', 2147483647, 'asdasdasd', 4, 'ADIDAS ALPHABOOST PARLEY BLACK', 1, 39, 2590000, 'OKEYYs', '1588064018.jpg', ''),
(68, 15, 'test12', 0, 'test12', 53, 'Vans Check Bess NI Shoes', 1, 39, 1900000, 'ans Check Bess Ni với thiết kế khỏe khoắn, sự thoải mái của lót Ultra Cush cùng màu sắc trẻ trung mang lại cho khách hàng sự lựa chọn tuyệt vời', '1588456554.jpg', ''),
(69, 15, 'test12', 0, 'test12', 62, 'BASAS BUMPER GUM - LOW TOP - OFFWHITE', 1, 36, 450000, 'Vẫn là màu trắng cổ điển của dòng giày Basas, nhưng phần mũi của những sản phẩm thuộc Basas \"Bumper Gum\" lại sở hữu một diện mạo hoàn toàn khác biệt nhờ miếng cao su thô màu nâu đầy sáng tạo, phá cách. \"Bumper Gum\" là đôi già', 'ananas1.jpg', ''),
(70, 18, 'test12', 569806079, '', 24, 'ADIDAS NEO LABEL CLOUDFOAM RACE', 1, 40, 1660000, 'Giống hình', '1588453305.jpg', '13 Nguyễn Trãi, Xã Hồng Thái, Huyện Nà Hang, Tỉnh Tuyên Quang'),
(71, 19, 'Mến', 569806079, '', 0, 'ASICS GEL-RESPECTOR BLACK GOLD', 2, 42, 2390000, 'Okeeyy', '1588064196.jpg', '13 Nguyễn Trãi, Xã Xuân Lập, Huyện Lâm Bình, Tỉnh Tuyên Quang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethoadon`
--

CREATE TABLE `tbl_chitiethoadon` (
  `idHD` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdtKH` int(11) NOT NULL,
  `ghiChu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soLuongSP` int(11) NOT NULL,
  `sizeSP` int(11) NOT NULL,
  `giaSP` int(11) NOT NULL,
  `mieuTaSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhAnhSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiethoadon`
--

INSERT INTO `tbl_chitiethoadon` (`idHD`, `maHoaDon`, `tenNguoiNhan`, `sdtKH`, `ghiChu`, `maSP`, `tenSP`, `soLuongSP`, `sizeSP`, `giaSP`, `mieuTaSP`, `hinhAnhSP`, `diachi`) VALUES
(4, 1, 'menpro111111', 2147483647, '', 50, 'Vans Old Skool V Sport', 1, 40, 2000000, 'Dòng sản phẩm này hướng tới sự đơn giản nhưng vẫn có điểm nhấn, dải logo Flying V được đặt bên hông giày vừa mang dấu ấn thương hiệu vừa giúp cho những chiếc giày thêm sức hút. Ngoài ra, phần thân Vans Sport hiện nay cũng đượ', '1588456302.jpg', ''),
(5, 1, 'menpro111111', 2147483647, '', 50, 'Vans Old Skool V Sport', 1, 40, 2000000, 'Dòng sản phẩm này hướng tới sự đơn giản nhưng vẫn có điểm nhấn, dải logo Flying V được đặt bên hông giày vừa mang dấu ấn thương hiệu vừa giúp cho những chiếc giày thêm sức hút. Ngoài ra, phần thân Vans Sport hiện nay cũng đượ', '1588456302.jpg', ''),
(6, 1, 'menpro111111', 2147483647, '', 62, 'BASAS BUMPER GUM - LOW TOP - OFFWHITE', 1, 36, 450000, 'Vẫn là màu trắng cổ điển của dòng giày Basas, nhưng phần mũi của những sản phẩm thuộc Basas \"Bumper Gum\" lại sở hữu một diện mạo hoàn toàn khác biệt nhờ miếng cao su thô màu nâu đầy sáng tạo, phá cách. \"Bumper Gum\" là đôi già', 'ananas1.jpg', ''),
(7, 2, 'jsadsadsad', 3423525, '', 25, 'Adidas EQT Bask ADV Xám Gót Xanh', 1, 38, 1950000, 'adidas', '1588453448.jpg', ''),
(8, 2, 'jsadsadsad', 3423525, '', 63, 'Giày Fila Disruptor 2 Trắng ', 1, 39, 1300000, 'Fila Disruptor 2 Trắng  sở hữu thiết kế khá ấn tượng, mang đậm phong cách sporty. Mẫu giày mang đến cho người mang sự trẻ trung, năng động, thoải mái, sắc trắng bao phủ hầu hết thân giày,  vừa là điể', 'fila1.jpg', ''),
(9, 2, 'jsadsadsad', 3423525, '', 64, 'Giày Reebok Royal Bridge DV5170', 1, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(10, 3, 'jsadsadsad', 3423525, '', 25, 'Adidas EQT Bask ADV Xám Gót Xanh', 1, 38, 1950000, 'adidas', '1588453448.jpg', ''),
(11, 3, 'jsadsadsad', 3423525, '', 63, 'Giày Fila Disruptor 2 Trắng ', 1, 39, 1300000, 'Fila Disruptor 2 Trắng  sở hữu thiết kế khá ấn tượng, mang đậm phong cách sporty. Mẫu giày mang đến cho người mang sự trẻ trung, năng động, thoải mái, sắc trắng bao phủ hầu hết thân giày,  vừa là điể', 'fila1.jpg', ''),
(12, 3, 'jsadsadsad', 3423525, '', 64, 'Giày Reebok Royal Bridge DV5170', 1, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(13, 4, 'jsadsadsad', 3423525, '', 25, 'Adidas EQT Bask ADV Xám Gót Xanh', 1, 38, 1950000, 'adidas', '1588453448.jpg', ''),
(14, 4, 'jsadsadsad', 3423525, '', 63, 'Giày Fila Disruptor 2 Trắng ', 1, 39, 1300000, 'Fila Disruptor 2 Trắng  sở hữu thiết kế khá ấn tượng, mang đậm phong cách sporty. Mẫu giày mang đến cho người mang sự trẻ trung, năng động, thoải mái, sắc trắng bao phủ hầu hết thân giày,  vừa là điể', 'fila1.jpg', ''),
(15, 4, 'jsadsadsad', 3423525, '', 64, 'Giày Reebok Royal Bridge DV5170', 1, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(16, 5, 'jsadsadsad', 3423525, '', 25, 'Adidas EQT Bask ADV Xám Gót Xanh', 1, 38, 1950000, 'adidas', '1588453448.jpg', ''),
(17, 5, 'jsadsadsad', 3423525, '', 63, 'Giày Fila Disruptor 2 Trắng ', 1, 39, 1300000, 'Fila Disruptor 2 Trắng  sở hữu thiết kế khá ấn tượng, mang đậm phong cách sporty. Mẫu giày mang đến cho người mang sự trẻ trung, năng động, thoải mái, sắc trắng bao phủ hầu hết thân giày,  vừa là điể', 'fila1.jpg', ''),
(18, 5, 'jsadsadsad', 3423525, '', 64, 'Giày Reebok Royal Bridge DV5170', 1, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(19, 6, 'nhungpro', 23424234, '', 42, 'Converse Chuck Taylor All Star Side Pocket', 1, 40, 1600000, 'xcczczxc', '1588455551.jpg', ''),
(20, 7, 'nguoinhan1', 123131313, '', 32, 'NIKE AIR FORCE 1 SHADOW ', 3, 38, 2700000, 'kạkjcakjc', '1588454749.jpg', ''),
(21, 8, 'nhungne', 24344, '', 42, 'Converse Chuck Taylor All Star Side Pocket', 2, 40, 1600000, 'xcczczxc', '1588455551.jpg', ''),
(22, 8, 'nhungne', 24344, '', 64, 'Giày Reebok Royal Bridge DV5170', 2, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(23, 9, 'beyeuuuuuu', 242424, '', 49, 'Vans Old Skool 36 DX Anaheim Factory', 2, 39, 2200000, 'Kiểu dáng Old Skool cổ điển với lót giày được nâng cấp công nghệ Đệm lót UltraCush mang đến một cảm nhận khác biệt với dòng giày cao cấp này của nhà Vans mang lại sự thoải mái & êm ái cho đôi chân. Anaheim Factory 36DX Vintag', '1588456223.jpg', ''),
(24, 10, 'khac234443', 23424, '', 49, 'Vans Old Skool 36 DX Anaheim Factory', 2, 39, 2200000, 'Kiểu dáng Old Skool cổ điển với lót giày được nâng cấp công nghệ Đệm lót UltraCush mang đến một cảm nhận khác biệt với dòng giày cao cấp này của nhà Vans mang lại sự thoải mái & êm ái cho đôi chân. Anaheim Factory 36DX Vintag', '1588456223.jpg', ''),
(25, 11, 'menpro232323', 2147483647, '', 1, 'NIKE AIR FORCE 1 SHADOW AQUA PINK', 1, 40, 4600000, 'Good', '1588063730.jpg', ''),
(26, 11, 'menpro232323', 2147483647, '', 1, 'NIKE AIR FORCE 1 SHADOW AQUA PINK', 2, 40, 4600000, 'Good', '1588063730.jpg', ''),
(27, 11, 'menpro232323', 2147483647, '', 64, 'Giày Reebok Royal Bridge DV5170', 1, 38, 2000000, 'nhẹ,êm chân', 'reebok1.jpg', ''),
(28, 12, '1231', 321321, '321', 32, 'NIKE AIR FORCE 1 SHADOW ', 2, 38, 2700000, 'kạkjcakjc', '1588454749.jpg', ''),
(29, 12, '1231', 321321, '321', 32, 'NIKE AIR FORCE 1 SHADOW ', 2, 38, 2700000, 'kạkjcakjc', '1588454749.jpg', ''),
(30, 13, 'test', 2147483647, 'asdasdasd', 4, 'ADIDAS ALPHABOOST PARLEY BLACK', 1, 39, 2590000, 'OKEYYs', '1588064018.jpg', ''),
(31, 14, 'khactiepne', 2147483647, '', 13, 'NEW BALANCE 530 BLACK WHITE', 4, 41, 1500000, 'Goood', '1588064283.jpg', ''),
(32, 15, 'khactiepne', 2147483647, '', 13, 'NEW BALANCE 530 BLACK WHITE', 4, 41, 1500000, 'Goood', '1588064283.jpg', ''),
(33, 16, 'test12', 569806079, '', 24, 'ADIDAS NEO LABEL CLOUDFOAM RACE', 1, 40, 1660000, 'Giống hình', '1588453305.jpg', '13 Nguyễn Trãi, Xã Hồng Thái, Huyện Nà Hang, Tỉnh Tuyên Quang'),
(34, 17, 'Mến', 569806079, '', 0, 'ASICS GEL-RESPECTOR BLACK GOLD', 2, 42, 2390000, 'Okeeyy', '1588064196.jpg', '13 Nguyễn Trãi, Xã Xuân Lập, Huyện Lâm Bình, Tỉnh Tuyên Quang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_diachi`
--

CREATE TABLE `tbl_diachi` (
  `id` int(9) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_diachi`
--

INSERT INTO `tbl_diachi` (`id`, `address`) VALUES
(1, 'Đồng Nai'),
(2, 'Vũng Tàu'),
(3, 'TPHCM'),
(4, 'An Giang'),
(5, 'Bắc Giang'),
(6, 'Bắc Kạn'),
(7, 'Bạc Liêu'),
(8, 'Bắc Ninh'),
(9, 'Bến Tre'),
(10, 'Bình Định'),
(11, 'Bình Dương'),
(12, 'Bình Phước'),
(13, 'Bình Thuận'),
(14, 'Cà Mau'),
(15, 'Cần Thơ'),
(16, 'Cao Bằng'),
(17, 'Đà Nẵng'),
(18, 'Đắk Lắk'),
(19, 'Đắk Nông'),
(20, 'Điện Biên'),
(21, 'Đồng Tháp'),
(22, 'Gia Lai'),
(23, 'Hà Giang'),
(24, 'Hà Nam'),
(25, 'Hà Nội'),
(26, 'Hà Tĩnh'),
(27, 'Hải Dương'),
(28, 'Hải Phòng'),
(29, 'Hậu Giang'),
(30, 'Hòa Bình'),
(31, 'Hưng Yên'),
(32, 'Khánh Hòa'),
(33, 'Kiên Giang'),
(34, 'Kon Tum'),
(35, 'Lai Châu'),
(36, 'Lâm Đồng'),
(37, 'Lạng Sơn'),
(38, 'Lào Cai'),
(39, 'Long An'),
(40, 'Nam Định'),
(41, 'Nghệ An'),
(42, 'Ninh Bình'),
(43, 'Ninh Thuận'),
(44, 'Phú Thọ'),
(45, 'Phú Yên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `maDonHang` int(10) NOT NULL,
  `maKhachHang` int(10) DEFAULT NULL,
  `ngayLapDH` date NOT NULL,
  `tongTienDH` int(10) NOT NULL,
  `trangThaiDH` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`maDonHang`, `maKhachHang`, `ngayLapDH`, `tongTienDH`, `trangThaiDH`) VALUES
(1, 9, '2020-05-12', 4450000, 'Đã hoàn thành'),
(2, 9, '2020-06-12', 5250000, 'Đã hoàn thành'),
(4, 12, '2020-06-12', 1600000, 'Đã hoàn thành'),
(5, 9, '2020-06-13', 15800000, 'Đã hoàn thành'),
(6, 16, '2020-06-14', 8400000, 'Chưa giao'),
(7, 16, '2020-06-14', 4400000, 'Đã hoàn thành'),
(8, 9, '2020-06-14', 7200000, 'Đã hoàn thành'),
(9, 9, '2020-06-14', 6000000, 'Chưa giao'),
(10, 9, '2020-06-14', 4400000, 'Đã hoàn thành'),
(11, 9, '2020-06-14', 6000000, 'Đã hoàn thành'),
(12, 9, '2020-06-14', 8100000, 'Đã hoàn thành'),
(13, 17, '2020-06-14', 10800000, 'Đã hoàn thành'),
(14, 18, '2020-11-12', 2590000, 'Đã hoàn thành'),
(15, 19, '2020-11-20', 2350000, 'Chưa giao'),
(18, 19, '2020-11-26', 1660000, 'Đã hoàn thành'),
(19, 19, '2020-11-26', 4780000, 'Đã hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(10) NOT NULL,
  `maSanPham` int(20) NOT NULL,
  `soLuongSanPham` int(20) NOT NULL,
  `sessionID` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `maLoai` int(10) NOT NULL,
  `tenSanPham` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `sizeSanPham` int(10) NOT NULL,
  `mieuTaSanPham` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `giaSanPham` int(10) NOT NULL,
  `hinhAnhSanPham` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_giohang`, `maSanPham`, `soLuongSanPham`, `sessionID`, `maLoai`, `tenSanPham`, `sizeSanPham`, `mieuTaSanPham`, `giaSanPham`, `hinhAnhSanPham`) VALUES
(292, 6, 1, 'n078q89so9gk2qklv3usfgqt1g', 3, 'CONVERSE CHUCK TAYLOR CLASSIC NAVY', 41, 'Okeyyy', 1330000, '1588064069.jpg'),
(324, 32, 1, 'c7susnn204fd6tt6cgeavquo4r', 2, 'NIKE AIR FORCE 1 SHADOW ', 38, 'kạkjcakjc', 2700000, '1588454749.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `ngayDat` date NOT NULL,
  `giaTriHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`maHoaDon`, `maKhachHang`, `ngayDat`, `giaTriHD`) VALUES
(1, 9, '2020-06-12', 4450000),
(2, 9, '2020-06-12', 5250000),
(3, 9, '2020-06-12', 5250000),
(4, 9, '2020-06-12', 5250000),
(5, 9, '2020-05-12', 5250000),
(6, 12, '2020-04-12', 1600000),
(7, 9, '2020-06-14', 8100000),
(8, 9, '2020-04-14', 7200000),
(9, 16, '2020-07-14', 4400000),
(10, 9, '2020-06-14', 4400000),
(11, 9, '2020-06-14', 15800000),
(12, 17, '2020-06-14', 10800000),
(13, 18, '2020-11-12', 2590000),
(14, 9, '2020-11-12', 6000000),
(15, 9, '2020-11-12', 6000000),
(16, 19, '2020-11-26', 1660000),
(17, 19, '2020-11-26', 4780000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `maKhachHang` int(11) NOT NULL,
  `tenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoTenKhachHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thuDienTuKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `ngaySinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`maKhachHang`, `tenDangNhap`, `matKhau`, `hoTenKhachHang`, `thuDienTuKH`, `trangThai`, `ngaySinh`) VALUES
(9, 'nhung', '827ccb0eea8a706c4c34a16891f84e7b', 'káksạdj', 'menpro@gmail.com', 'Active', NULL),
(12, 'khach1', '827ccb0eea8a706c4c34a16891f84e7b', 'Khách', 'khachhhh@gmail.com', 'Active', NULL),
(13, 'men', '827ccb0eea8a706c4c34a16891f84e7b', 'meens', 'menkajdajd@yahoo.com', 'Active', NULL),
(14, 'taipro', '827ccb0eea8a706c4c34a16891f84e7b', 'taipro', 'taipr@gmail.com', 'Active', NULL),
(15, 'rainbow', '827ccb0eea8a706c4c34a16891f84e7b', 'rainbow', 'rainbow@gmail.cm', 'Active', NULL),
(16, 'beyeu', 'f43df3f122fc4eb0f119f46d11b0c7d0', 'beyeu', 'beyeu@gmail.com', 'Active', NULL),
(17, 'xinchào', 'e10adc3949ba59abbe56e057f20f883e', 'dsa', 'dsadsa@g', 'Active', NULL),
(18, 'test1', 'cc03e747a6afbbcbf8be7668acfebee5', 'test', 'test@gmail.com', 'Active', NULL),
(19, 'test12', '60474c9c10d7142b7508ce7a50acf414', 'test12', 'test12@gmail.com', 'Active', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`maLoai`, `tenLoai`) VALUES
(1, 'ADIDAS'),
(2, 'NIKE'),
(3, 'CONVERSE'),
(4, 'VANS'),
(6, 'ASICS'),
(7, 'BITIS'),
(8, 'PUMA'),
(10, 'ANANAS'),
(11, 'NEW BALANCE'),
(13, 'FILA'),
(14, 'REEBOK'),
(15, 'RieVenan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quantri`
--

CREATE TABLE `tbl_quantri` (
  `tenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenNguoiQuanTri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thuDienTuQT` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `maVaiTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_quantri`
--

INSERT INTO `tbl_quantri` (`tenDangNhap`, `matKhau`, `tenNguoiQuanTri`, `thuDienTuQT`, `trangThai`, `maVaiTro`) VALUES
('admin', 'admin', 'Admin', 'admin@admin.com', 'Active', 1),
('joyie', '123', 'joyie', 'joyie@ma.com', 'Inactive', 2),
('manager1', '123', 'Quản lý 1', 'quanly1@manager.com', 'Active', 2),
('manager2', '123', 'Quản lý 2', 'quanly2@manager.com', 'Inactive', 2),
('men', '123', 'Mến', 'men@admin.com', 'Active', 1),
('nhung', '123', 'Nhung', 'nhung@admin.com', 'Active', 1),
('thanhphong', '123', 'Thanh Phong', 'thanhphong@admin.com', 'Active', 1),
('thephong', '123', 'Thế Phong', 'thephong@admin.com', 'Active', 1),
('vanj', '202cb962ac59075b964b07152d234b70', 'Nguyen Van J', 'Nguyen@g.com', 'Active', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `maSanPham` int(11) NOT NULL,
  `maLoai` int(11) NOT NULL,
  `tenSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sizeSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soLuongSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mieuTaSanPham` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `giaSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThaiSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `hinhAnhSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`maSanPham`, `maLoai`, `tenSanPham`, `sizeSanPham`, `soLuongSanPham`, `mieuTaSanPham`, `giaSanPham`, `trangThaiSanPham`, `hinhAnhSanPham`) VALUES
(0, 6, 'ASICS GEL-RESPECTOR BLACK GOLD', '42', '7', 'Okeeyy', '2390000', '1', '1588064196.jpg'),
(1, 2, 'NIKE AIR FORCE 1 SHADOW AQUA PINK', '40', '7', 'Good', '4600000', '1', '1588063730.jpg'),
(2, 2, 'NIKE AIR MAX 90 ORANGE BLUE', '41', '10', 'Goood', '3600000', '1', '1588063932.jpg'),
(3, 1, 'ADIDAS CONTINENTAL 80 BLACK RED', '39', '10', 'Gooood', '2290000', '1', '1588063992.jpg'),
(4, 1, 'ADIDAS ALPHABOOST PARLEY BLACK', '39', '9', 'OKEYYs', '2590000', '1', '1588064018.jpg'),
(5, 3, 'CONVERSE CHUCK TAYLOR CLASSIC BLACK', '42', '10', 'Là một trong những thương hiệu giày hàng đầu thế giới về loại giày sneaker với nhiều tính năng phù hợp cho cả nam và nữ tại Việt Nam.', '1500000', '1', '1588064044.jpg'),
(6, 3, 'CONVERSE CHUCK TAYLOR CLASSIC NAVY', '41', '10', 'Okeyyy', '1330000', '1', '1588064069.jpg'),
(7, 4, 'VANS OLD SKOOL BLACK', '42', '10', 'Goood', '1700000', '1', '1588064102.jpg'),
(8, 4, 'VANS CLASSIC SLIP ON SKULLS BLACK', '42', '8', 'Gooood', '1400000', '1', '1588064130.jpg'),
(9, 7, 'BITIS HUNTER X 2019 JET BLACK', '41', '10', 'Nice', '800000', '1', '1588064170.jpg'),
(11, 2, 'NIKE LEGEND REACT 2 BLUE', '38', '10', 'Okey', '2990000', '1', '1588064219.jpg'),
(12, 8, 'PUMA CELL PHASE WHITE RED', '39', '10', 'Goood', '2830000', '1', '1588064243.jpg'),
(13, 11, 'NEW BALANCE 530 BLACK WHITE', '41', '6', 'Goood', '1500000', '1', '1588064283.jpg'),
(14, 8, 'Puma RS-X Hard Drive Mens White/Galaxy Blue', '42', '10', 'Giày Sneakers Puma RS-X Hard Drive Mens White/Galaxy Blue sở hữu kiểu dáng siêu phong cách, hiện đại với thiết kế các lớp TPU được sắp xếp hợp lý, giày Puma RS-X Hard Drive sẽ là mẫu giày mới nhất được đ', '2400000', '1', '1588446585.jpg'),
(15, 8, 'PUMA COURT STAR SUEDE PM34645', '41', '10', 'Với thiết kế thon gọn nhưng vẫn rất thời thượng, trẻ trung. Phần Upper phía trên được sử dụng là bằng vải mang lại sự sang chảnh, trẻ trung. Phong cách thiết kế khỏe khoắn tạo nên sự nam tính cho người đi.', '2390000', '1', '1588450980.jpg'),
(16, 8, 'PUMA CELL ALIEN OG SNEAKERS', '42', '10', 'CELL Alien chỉ cần chạm xuống từ không gian. Được tạo ra lần đầu tiên dưới dạng giày chạy bộ vào năm 1998, biểu tượng này trở lại thế giới ngày nay với công nghệ đệm CELL ban đầu, pha trộn màu sắc nổi bật và thiết kế siêu tươi.', '1950000', '1', '1588451424.jpg'),
(17, 8, 'PUMA NOVA 90S PINK/BLACK/WHITE', '40', '10', 'Okeeyyy', '1750000', '1', '1588451698.jpg'),
(18, 8, 'PUMA MUSE X-2 METALLIC', '42', '10', 'Okeyyy', '1680000', '1', '1588451768.jpg'),
(19, 8, 'PUMA RS-100 SOUND MEN\'S SNEAKERS', '40', '10', 'Okeyyy', '1400000', '1', '1588451925.jpg'),
(20, 8, 'PUMA RS-0 OPTIC BLACK WHITE', '40', '10', 'GIỐNG NHƯ HÌNH', '2100000', '1', '1588451994.jpg'),
(21, 8, 'PUMA THUNDER SPECTRA GREY & YELLOW', '42', '10', 'GIỐNG NHƯ HÌNH', '2950000', '1', '1588452048.jpg'),
(22, 8, 'PUMA TSUGI NETFIT V2 EVOKNIT SNEAKERS', '39', '10', 'Okeyyy', '1750000', '1', '1588453106.jpg'),
(23, 1, 'ADIDAS SUPERSTAR BLACK CHÍNH HÃNG', '41', '10', 'CHÍNH HÃNG', '1700000', '1', '1588453225.jpg'),
(24, 1, 'ADIDAS NEO LABEL CLOUDFOAM RACE', '40', '7', 'Giống hình', '1660000', '1', '1588453305.jpg'),
(25, 1, 'Adidas EQT Bask ADV Xám Gót Xanh', '38', '10', 'adidas', '1950000', '1', '1588453448.jpg'),
(26, 1, 'Adidas Ultraboost 19 Oreo 5.0', '41', '10', 'Nhẹ', '3000000', '1', '1588453533.jpg'),
(27, 1, 'Adidas AlphaBounce Beyond xám khói', '40', '10', 'xám khói', '2000000', '1', '1588453597.jpg'),
(28, 1, 'ADIDAS FALCON SHOES D96699', '41', '10', 'shoes', '1950000', '1', '1588453730.jpg'),
(29, 1, 'Adidas NMD Human Race Solarhu', '39', '10', 'Soloaa', '4800000', '1', '1588453836.jpg'),
(30, 1, 'Adidas Pharrell x NMD Human race', '39', '10', 'Chúng tôi cam kết chuyên cung cấp giày thể thao  chuẩn nhất với mức giá tốt nhất.', '4900000', '1', '1588453887.jpg'),
(31, 1, 'Adidas NMD Human Race yellow', '40', '10', 'Đầy đủ phụ kiện: túi, box… Bảo hàng 6 tháng bằng Bill mua hàng', '4800000', '1', '1588453930.jpg'),
(32, 2, 'NIKE AIR FORCE 1 SHADOW ', '38', '3', 'kạkjcakjc', '2700000', '1', '1588454749.jpg'),
(33, 2, 'Nike Air Max 98 \"University Red White\"', '39', '10', 'accacc', '2200000', '1', '1588454438.jpg'),
(34, 2, 'Nike Air Jordan 1 Mid 2019 \"Royal Blue\"', '41', '10', 'xcczczcxzcz', '3500000', '1', '1588454475.jpg'),
(35, 2, 'Nike React Presto \"Brutal Honey\"', '40', '10', 'xzccsâc', '3000000', '1', '1588454516.jpg'),
(36, 2, 'Nike React Presto \"Ghost\"', '40', '8', 'ácgfdgdfgdfg', '3000000', '1', '1588454562.jpg'),
(37, 2, 'Nike Air Zoom Pegasus 34 \"Black/Orange\"', '39', '10', 'Black/Orange', '2500000', '1', '1588454812.jpg'),
(38, 2, 'Nike Air Max 97 Ultra 17 PRM \"Navy/Obsidian\"', '38', '10', '\"Navy/Obsidian\"', '4000000', '1', '1588454855.jpg'),
(39, 2, 'Nike Air VRTX \"Black/White\"', '40', '10', 'cxvcxvbxb', '1300000', '1', '1588454908.jpg'),
(40, 2, 'Nike Air Zoom Pegasus 34 SHIELD', '40', '10', 'xcxcvxcvxcvxc', '2500000', '1', '1588454972.jpg'),
(41, 3, 'Converse Chuck Taylor All Star VLTG - Back to Earth', '41', '9', 'Mẫu giày cao cổ Chuck Taylor All Star VLTG giúp cho người sử dụng có vẻ ngoài siêu chất và cá tính. Điểm nhấn nổi bật khác của sản phẩm ngoài họa tiết chữ V xếp chồng đó chính là  icon hình ngôi sao được cách điệu ở phần foxing tạo điểm nhấn và sự khác biệt so với các sản phẩm khác.', '1600000', '1', '1588455426.png'),
(42, 3, 'Converse Chuck Taylor All Star Side Pocket', '40', '7', 'xcczczxc', '1600000', '1', '1588455551.jpg'),
(43, 3, 'Converse Chuck Taylor All Star Faux Leather Photon Dust', '43', '10', 'Thương hiệu Converse Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam', '1400000', '1', '1588455642.jpg'),
(44, 3, 'Converse Chuck Taylor All Star Archival Camo', '38', '7', 'Nằm trong BST Converse Camo Connection, Giày Converse Chuck Taylor All Star Camo Patch trang bị đế OrthoLite® giúp người dùng có được sự thoải mái tối đa khi sử dụng. Chất liệu vải canvas thoáng mát. Phần vải lót bên trong của giày in hoạt tiết camo thời thượng ', '1500000', '1', '1588455701.jpg'),
(45, 3, 'Converse Chuck Taylor All Star Camo Connection', '40', '10', 'Thương hiệu Converse Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam', '1600000', '1', '1588455772.jpg'),
(46, 3, 'Converse Chuck Taylor All Star Love Fearlessly', '39', '10', 'Fearlessly', '1600000', '1', '1588455898.png'),
(47, 3, 'Converse Chuck Taylor All Star Love Fearlessly', '38', '10', 'Fearlessly', '1500000', '1', '1588455966.png'),
(48, 3, 'Converse Chuck Taylor All Star Fearless', '41', '8', 'Fearless', '1500000', '1', '1588456020.png'),
(49, 4, 'Vans Old Skool 36 DX Anaheim Factory', '39', '6', 'Kiểu dáng Old Skool cổ điển với lót giày được nâng cấp công nghệ Đệm lót UltraCush mang đến một cảm nhận khác biệt với dòng giày cao cấp này của nhà Vans mang lại sự thoải mái & êm ái cho đôi chân. Anaheim Factory 36DX Vintage với chất liệu kết hợp giữa Suede và Canvas. Đặc biệt tông màu trắng ngà đặc biệt trendy được nhiều người tìm kiếm với khả năng phối đồ cực đỉnh. Đệm lót UltraCush mang đến một cảm nhận khác biệt với dòng giày cao cấp này của nhà Vans', '2200000', '1', '1588456223.jpg'),
(50, 4, 'Vans Old Skool V Sport', '40', '10', 'Dòng sản phẩm này hướng tới sự đơn giản nhưng vẫn có điểm nhấn, dải logo Flying V được đặt bên hông giày vừa mang dấu ấn thương hiệu vừa giúp cho những chiếc giày thêm sức hút. Ngoài ra, phần thân Vans Sport hiện nay cũng được bao bọc bởi chất liệu da lộn – chất liệu chủ đạo hay được sử dụng của thời trang những năm 90.', '2000000', '1', '1588456302.jpg'),
(51, 4, 'Vans Old Skool Alien Ghosts', '39', '10', 'Vans Old Skool Alien Ghosts đột phá với chi tiết phản quang trendy, sử dụng kết hợp chất liệu vải Canvas truyền thống, thoáng mát, kết hợp với da lộn được phối ở mũi giày và đế giày mang đến cho bạn sự thoải mái khi di chuyển.Vans old skool được thiết kế cho những môn thể thao mạo hiểm như trượt ván, xe đạp BMX, mô tô đua v.v... đảm bảo độ bền chắc và có độ bám tốt.', '1850000', '1', '1588456386.jpg'),
(52, 4, 'Vans SK8-Hi Alien Ghosts', '39', '10', 'Vans Sk8- Hi Alien Ghosts đột phá với chi tiết phản quang trendy, sử dụng kết hợp chất liệu vải Canvas truyền thống, thoáng mát, kết hợp với da lộn được phối ở mũi giày và đế giày mang đến cho bạn sự thoải mái khi di chuyển.giày Vans Sk8- Hi được thiết kế cho những môn thể thao mạo hiểm như trượt ván, xe đạp BMX, mô tô đua v.v... đảm bảo độ bền chắc và có độ bám tốt.', '2050000', '1', '1588456465.jpg'),
(53, 4, 'Vans Check Bess NI Shoes', '39', '9', 'ans Check Bess Ni với thiết kế khỏe khoắn, sự thoải mái của lót Ultra Cush cùng màu sắc trẻ trung mang lại cho khách hàng sự lựa chọn tuyệt vời', '1900000', '1', '1588456554.jpg'),
(54, 4, 'Vans Era Lady Vans', '42', '10', 'Vans Lady Vans có thiết kế là kiểu dáng Vans Era quen thuộc kết hợp những họa tiết lạ mắt và hình hoa hồng đen độc đáo phủ khắp thân giày tạo điểm nhấn cuốn hút cho sản phẩm.', '1450000', '1', '1588456628.png'),
(55, 6, 'Asics Gel-Bnd -1021', '40', '9', 'Công nghệ REARFOOT GEL TECHNOLOGY hỗ trợ tác động trợ lực, giúp nâng niu bàn chân trên mọi điều kiện địa hình.', '2745000', '1', '1588456743.png'),
(56, 6, 'Asics Gt-1000 9 -1011', '40', '10', 'Không đúng kích cỡ hoặc màu sắc? Quý khách có thể đổi size khác hay sản phẩm khác thật dễ dàng.', '3400000', '1', '1588456870.jpg'),
(57, 6, 'Asics Gel-Bnd -1022', '40', '10', 'Công nghệ REARFOOT GEL TECHNOLOGY hỗ trợ tác động trợ lực, giúp nâng niu bàn chân trên mọi điều kiện địa hình.', '2745000', '1', '1588456961.png'),
(58, 6, 'Asics Gel-Kayano 5 Og Running', '40', '10', 'Được tạo ra bởi việc kết hợp các thành phần tiên tiến với thiết kế mới nổi bật nhằm tôn vinh di sản của Tokyo. Sản phẩm này cho phép bạn giải quyết khoảng cách ở các chặng đường xa một cách thoải mái, nhờ vào công nghệ GEL® ở chân sau được thiết kế lại để cải thiện khả năng giảm xóc khi va chạm', '4044000', '1', '1588457009.jpg'),
(59, 6, 'Asics Gel-Quantum Lyte Running FW19', '39', '10', 'Công nghệ REARFOOT GEL TECHNOLOGY hỗ trợ tác động trợ lực, giúp nâng niu bàn chân trên mọi điều kiện địa hình.', '2554000', '1', '1588457076.jpg'),
(60, 6, 'Asics Gel-Pulse 11 Running FW19', '40', '9', 'Được tạo ra bởi việc kết hợp các thành phần tiên tiến với thiết kế mới nổi bật nhằm tôn vinh di sản của Tokyo. Sản phẩm này cho phép bạn giải quyết khoảng cách ở các chặng đường xa một cách thoải mái,', '3144000', '1', '1588457125.jpg'),
(61, 6, 'Asics Gel-Quantum Infinity Jin Running', '40', '10', 'Được tạo ra bởi việc kết hợp các thành phần tiên tiến với thiết kế mới nổi bật nhằm tôn vinh di sản của Tokyo.', '4044000', '1', '1588457171.jpg'),
(62, 10, 'BASAS BUMPER GUM - LOW TOP - OFFWHITE', '36', '4', 'Vẫn là màu trắng cổ điển của dòng giày Basas, nhưng phần mũi của những sản phẩm thuộc Basas \"Bumper Gum\" lại sở hữu một diện mạo hoàn toàn khác biệt nhờ miếng cao su thô màu nâu đầy sáng tạo, phá cách. \"Bumper Gum\" là đôi giày dành cho những ai tìm kiếm sự mới mẻ từ những điều quen thuộc, truyền thống.', '450000', '1', 'ananas1.jpg'),
(63, 13, 'Giày Fila Disruptor 2 Trắng ', '39', '10', 'Fila Disruptor 2 Trắng  sở hữu thiết kế khá ấn tượng, mang đậm phong cách sporty. Mẫu giày mang đến cho người mang sự trẻ trung, năng động, thoải mái, sắc trắng bao phủ hầu hết thân giày,  vừa là điểm nhấn, vừa mang đến sự tinh tế.', '1300000', '1', 'fila1.jpg'),
(64, 14, 'Giày Reebok Royal Bridge DV5170', '38', '7', 'nhẹ,êm chân', '2000000', '1', 'reebok1.jpg'),
(65, 1, 'ádadad', '40', '1', 'ádsadas32234', '34324324', '0', '1605856375.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongtingiaohang1`
--

CREATE TABLE `tbl_thongtingiaohang1` (
  `IDTTGH` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `tenNguoiNhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soDienThoai` int(11) NOT NULL,
  `ghiChuKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sessionID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongtingiaohang1`
--

INSERT INTO `tbl_thongtingiaohang1` (`IDTTGH`, `maKhachHang`, `tenNguoiNhan`, `soDienThoai`, `ghiChuKH`, `sessionID`, `diachi`) VALUES
(9, 14, 'khach111111', 21313313, '', 'f5osk4r4umr105kjjoqq1nj5o2', ''),
(10, 14, 'khacne', 121313, '', 'f5osk4r4umr105kjjoqq1nj5o2', ''),
(11, 14, 'menpro1121313', 2342342, '', 'f5osk4r4umr105kjjoqq1nj5o2', ''),
(12, 14, 'xinchaocacban', 131313131, '', 'f5osk4r4umr105kjjoqq1nj5o2', ''),
(13, 9, 'menprolamne', 23423424, '', 'f5osk4r4umr105kjjoqq1nj5o2', ''),
(14, 15, 'rainbow', 3425522, '', '2ukou3f5oom8rolcu8pl8ccn23', ''),
(15, 15, 'rainbow11111', 2147483647, '', '2ukou3f5oom8rolcu8pl8ccn23', ''),
(16, 15, 'rainbow1111134414', 2147483647, '121231', '2ukou3f5oom8rolcu8pl8ccn23', ''),
(17, 15, 'rainbownuane', 2131313, '', '7etn7rpkq23pkm7fhrbekhp5t9', ''),
(18, 15, 'rainbowdadasd', 21313, '', 'j35g459k65dqu0d2c908fqp9cm', ''),
(19, 15, 'rainbow123133', 1231312313, '', 'j35g459k65dqu0d2c908fqp9cm', ''),
(20, 9, 'nhung23231313', 1312313, '', 'f5osk4r4umr105kjjoqq1nj5o2', ''),
(21, 9, 'ádâđa', 213123123, '', 'f5osk4r4umr105kjjoqq1nj5o2', ''),
(22, 9, 'sadsađá', 14151515, '', 'f5osk4r4umr105kjjoqq1nj5o2', ''),
(23, 9, 'menpro111111', 2147483647, '', '589i3uc190ji255ppklh0r14r5', ''),
(24, 9, 'jsadsadsad', 3423525, '', '6ua1ov16ubcvtn38lt7e1nkv6i', ''),
(25, 12, 'khach1necacban', 234234324, 'ghi chú nè', 'kg0nl7pe2u3520t9gmnif4frpd', ''),
(26, 12, 'khach113131313', 2147483647, '', 'kg0nl7pe2u3520t9gmnif4frpd', ''),
(27, 12, 'nhungpro', 23424234, '', 'kg0nl7pe2u3520t9gmnif4frpd', ''),
(28, 9, 'menpro232323', 2147483647, '', 'l0r8bv0ma60k2jlc4qem56u8o6', ''),
(29, 16, 'beyeu12234', 933525255, '', 'ch0aj9r7103vdrah4hnpirkb5h', ''),
(30, 16, 'beyeuuuuuu', 242424, '', 'ch0aj9r7103vdrah4hnpirkb5h', ''),
(31, 9, 'nhungne', 24344, '', '1pb63i70umufhhd8g01ook6uqc', ''),
(32, 9, 'nhungnuane', 23432434, '', '1pb63i70umufhhd8g01ook6uqc', ''),
(33, 9, 'khac234443', 23424, '', '1pb63i70umufhhd8g01ook6uqc', ''),
(34, 9, 'khactiepne', 2147483647, '', '1pb63i70umufhhd8g01ook6uqc', ''),
(35, 9, 'nguoinhan1', 123131313, '', '1pb63i70umufhhd8g01ook6uqc', ''),
(36, 17, '1231', 321321, '321', '8cdg3bfti2csdjadlh0ctq28ih', ''),
(37, 18, 'test', 2147483647, 'asdasdasd', 'jsm04vdmj0fb13auf29gvchdfm', ''),
(38, 19, 'test12', 0, 'test12', 'c7susnn204fd6tt6cgeavquo4r', ''),
(39, 19, 'test12', 569806079, '', 'n8cj6demobqrmjthlpn8fdokv3', '13 Nguyễn Trãi, Xã Nhạn Môn, 060, 06'),
(40, 19, 'test12', 569806079, '', 'n8cj6demobqrmjthlpn8fdokv3', '13 Nguyễn Trãi, Xã Thượng Nông, 072, 08'),
(41, 19, 'test12', 569806079, '', 'n8cj6demobqrmjthlpn8fdokv3', '13 Nguyễn Trãi, Xã Vũ Chấn, 170, Tỉnh Thái Nguyên'),
(42, 19, 'test12', 569806079, '', 'n8cj6demobqrmjthlpn8fdokv3', '13 Nguyễn Trãi, Xã Nậm Chảy, , Tỉnh Lào Cai'),
(43, 19, 'test12', 569806079, '', 'n8cj6demobqrmjthlpn8fdokv3', '13 Nguyễn Trãi, Xã Tung Chung Phố, Huyện Mường Khương, Tỉnh Lào Cai'),
(44, 19, 'test12', 569806079, '', 'n8cj6demobqrmjthlpn8fdokv3', '13 Nguyễn Trãi, Xã Hồng Thái, Huyện Nà Hang, Tỉnh Tuyên Quang'),
(45, 19, 'Mến', 569806079, '', 'n8cj6demobqrmjthlpn8fdokv3', '13 Nguyễn Trãi, Xã Xuân Lập, Huyện Lâm Bình, Tỉnh Tuyên Quang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vaitro`
--

CREATE TABLE `tbl_vaitro` (
  `maVaiTro` int(11) NOT NULL,
  `tenVaiTro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vaitro`
--

INSERT INTO `tbl_vaitro` (`maVaiTro`, `tenVaiTro`) VALUES
(1, 'admin'),
(2, 'manager');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`IDCTDH`);

--
-- Chỉ mục cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD PRIMARY KEY (`idHD`),
  ADD KEY `maHoaDon` (`maHoaDon`);

--
-- Chỉ mục cho bảng `tbl_diachi`
--
ALTER TABLE `tbl_diachi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `maKhachHang` (`maKhachHang`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `maSanPham` (`maSanPham`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `maKhachHang` (`maKhachHang`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`maKhachHang`);

--
-- Chỉ mục cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD PRIMARY KEY (`tenDangNhap`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `maSanPham` (`maSanPham`),
  ADD KEY `maSanPham_2` (`maSanPham`),
  ADD KEY `maSanPham_3` (`maSanPham`);

--
-- Chỉ mục cho bảng `tbl_thongtingiaohang1`
--
ALTER TABLE `tbl_thongtingiaohang1`
  ADD PRIMARY KEY (`IDTTGH`);

--
-- Chỉ mục cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  ADD PRIMARY KEY (`maVaiTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `IDCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  MODIFY `idHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_diachi`
--
ALTER TABLE `tbl_diachi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `maDonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `maKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `tbl_thongtingiaohang1`
--
ALTER TABLE `tbl_thongtingiaohang1`
  MODIFY `IDTTGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  MODIFY `maVaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD CONSTRAINT `tbl_chitiethoadon_ibfk_1` FOREIGN KEY (`maHoaDon`) REFERENCES `tbl_hoadon` (`maHoaDon`);

--
-- Các ràng buộc cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `tbl_donhang_ibfk_1` FOREIGN KEY (`maKhachHang`) REFERENCES `tbl_khachhang` (`maKhachHang`);

--
-- Các ràng buộc cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `tbl_giohang_ibfk_1` FOREIGN KEY (`maSanPham`) REFERENCES `tbl_sanpham` (`maSanPham`);

--
-- Các ràng buộc cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD CONSTRAINT `tbl_hoadon_ibfk_1` FOREIGN KEY (`maKhachHang`) REFERENCES `tbl_khachhang` (`maKhachHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
