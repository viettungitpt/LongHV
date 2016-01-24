-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2015 at 03:56 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE IF NOT EXISTS `baiviet` (
`maBaiViet` int(11) NOT NULL,
  `tieuDe` varchar(255) DEFAULT NULL,
  `tomTatNgan` text,
  `hinhAnh` varchar(255) DEFAULT NULL,
  `noiDung` text,
  `id_MaDanhMuc` int(11) DEFAULT NULL,
  `ngayTao` datetime DEFAULT NULL,
  `id_QuanLy` int(11) DEFAULT NULL,
  `kichHoat` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`maBaiViet`, `tieuDe`, `tomTatNgan`, `hinhAnh`, `noiDung`, `id_MaDanhMuc`, `ngayTao`, `id_QuanLy`, `kichHoat`) VALUES
(7, 'Bài viết số 2', 'Đây là tóm tắt bài viết số 2', '51842a4058eb440f1d59317fe8a78ae0.jpg', '<p><span >Giới thiệu về changeshop.vn</span></p>\r\n\r <p><span >Ch&agrave;o mừng Qu&yacute; Kh&aacute;ch đ&atilde; gh&eacute; thăm website của CHANGE SHOP</span></p>\r\n\r <p><span >Lời đầu ti&ecirc;n thay mặt cho CHANGE SHOP, xin gởi tới Qu&yacute; Kh&aacute;ch H&agrave;ng lời ch&uacute;c sức khỏe, hạnh ph&uacute;c v&agrave; th&agrave;nh c&ocirc;ng.</span></p>\r\n\r <p><span >Nhằm đ&aacute;p ứng nhu cầu thời trang gi&agrave;y CHANGE SHOP cung cấp ra thị trường rất nhiều sản phẩm gi&agrave;y chất lượng, mẫu m&atilde; đa dạng, style mới nhất... mang đến cho Qu&yacute; Kh&aacute;ch H&agrave;ng cảm gi&aacute;c mạnh mẽ, tự tin, c&aacute; t&iacute;nh v&agrave; thanh lịch</span></p>\r\n\r <p><span >CHANGE SHOP &nbsp;lu&ocirc;n mong muốn mang lại cho bạn cảm gi&aacute;c thoải m&aacute;i với những kiểu gi&agrave;y thời thượng phong c&aacute;ch H&agrave;n Quốc như: gi&agrave;y boot, gi&agrave;y oxford, gi&agrave;y mọi, gi&agrave;y thời trang nam nữ....</span></p>\r\n\r <p><span ><span >CHANGE SHOP&nbsp;x&acirc;y dựng dịch vụ b&aacute;n h&agrave;ng Online theo ti&ecirc;u ch&iacute; phục vụ&nbsp;tốt nhất,&nbsp;chuyển h&agrave;ng nhanh nhất, uy t&iacute;n nhất với mức gi&aacute; tốt nhất </span></span></p>\r\n\r <p><span ><span >v agrave; bảo h&agrave;nh keo vĩnh viễn cho tất cả sản phẩm gi&agrave;y</span><span >&nbsp;</span></span></p>\r\n\r <p><span ><span >H&atilde;y đến CHANGESHOP.VN để cảm nhận sự kh&aacute;c biệt</span></span></p>\r\n\r <p><span ><span ><span >Add</span><span >:1062 C&aacute;ch Mạng Th&aacute;ng 8, P.4, Q. T&acirc;n B&igrave;nh, TP.HCM</span></span></span></p>\r\n', NULL, '2015-04-20 23:58:11', 1, 1),
(8, 'Bài viết số 3', 'Đây là tóm tắt bài viết số 3', 'c9ea8db7e66a19a655340d2d5eb4febf.jpg', '<p>Hướng dẫn dặt h&agrave;ng</p>\r\n', NULL, '2015-04-10 23:58:14', 1, 1),
(9, 'Bài viết số 4 1111', 'Bài viết số 4111', '5f40b428c75ad8352ba13e93446c0550.jpg', '<p>B&agrave;i viết số 4111</p>\r\n', NULL, '2015-04-30 00:03:59', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `binhchon`
--

CREATE TABLE IF NOT EXISTS `binhchon` (
`maBinhChon` int(11) NOT NULL,
  `id_MaNguoiDung` int(11) DEFAULT NULL,
  `id_MaSanPham` int(11) DEFAULT NULL,
  `soSao` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binhchon`
--

INSERT INTO `binhchon` (`maBinhChon`, `id_MaNguoiDung`, `id_MaSanPham`, `soSao`) VALUES
(1, 8, 11, 5),
(2, 9, 11, 4),
(3, 1, 11, 2),
(4, 1, 9, 5),
(5, 1, 13, 3),
(6, 1, 14, 3),
(7, 8, 9, 4),
(8, 8, 13, 5),
(9, 8, 14, 2),
(10, 8, 44, 3);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE IF NOT EXISTS `binhluan` (
`maBinhLuan` int(11) NOT NULL,
  `noiDung` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_MaNguoiDung` int(11) DEFAULT NULL,
  `id_MaSanPham` int(11) DEFAULT NULL,
  `pheDuyet` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc` (
`maDanhMuc` int(11) NOT NULL,
  `tenDanhMuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuTu` int(11) DEFAULT NULL,
  `id_MaQuanLy` int(11) DEFAULT NULL,
  `ngayTao` datetime DEFAULT NULL,
  `kichHoat` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`maDanhMuc`, `tenDanhMuc`, `thuTu`, `id_MaQuanLy`, `ngayTao`, `kichHoat`) VALUES
(8, 'Sách văn học - Tiểu thuyết', 1, 1, '2015-05-20 01:43:35', 1),
(9, 'Sách kinh tế', 2, 1, '2015-05-20 01:43:45', 1),
(10, 'Truyện tranh', 3, 1, '2015-05-20 01:44:59', 1),
(11, 'Sách kiến thức - đời sống', 4, 1, '2015-05-20 01:45:28', 1),
(12, 'Sách nuôi dạy con', 5, 1, '2015-05-20 01:45:52', 1),
(13, 'Tạp chí', 6, 1, '2015-05-20 02:30:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE IF NOT EXISTS `dathang` (
`maDatHang` int(11) NOT NULL,
  `tenKH` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailKH` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soDienThoai` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noiDung` text COLLATE utf8_unicode_ci,
  `kichHoat` tinyint(4) DEFAULT NULL,
  `ngayTao` datetime DEFAULT NULL,
  `ghiChu` text COLLATE utf8_unicode_ci,
  `id_MaNguoiDung` int(11) DEFAULT NULL,
  `tongTien` int(11) DEFAULT NULL,
  `coin` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`maDatHang`, `tenKH`, `emailKH`, `soDienThoai`, `diaChi`, `noiDung`, `kichHoat`, `ngayTao`, `ghiChu`, `id_MaNguoiDung`, `tongTien`, `coin`) VALUES
(1, 'Duong Dung', 'dungdcth@gmail.com', '0982661136', 'Thanh Hoa', 'Tên sản phẩm : Apple iPhone 5s - Số lượng : 1 - Số tiền : 200,000đ<br/>Tổng số tiền : 200,000 đ ', 0, '2015-04-29 09:24:39', '123', 1, NULL, NULL),
(2, 'mạnh xề', 'dungdcth@gmail.com', '0988776655', 'khuong trung', 'Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Làm giàu không khó - Số lượng : 1 - Số tiền : 200,000 đ <br/>Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Làm giàu không khó - Số lượng : 1 - Số tiền : 200,000 đ <br/>Tổng tiền thanh toán :422,222 đ', 0, '2015-05-06 02:52:02', 'hehe', 1, NULL, NULL),
(4, '22', '22222', '22222', '2222', 'Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tổng tiền thanh toán :222,222 đ', 0, '2015-05-06 03:15:02', '2222', 10, NULL, NULL),
(5, '333', '333', '333', '333', 'Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Tình yêu tuổi đôi mươi - Số lượng : 1 - Số tiền : 150,000 đ <br/>Tên sản phẩm : Làm giàu không khó - Số lượng : 1 - Số tiền : 200,000 đ <br/>Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Tình yêu tuổi đôi mươi - Số lượng : 1 - Số tiền : 150,000 đ <br/>Tên sản phẩm : Làm giàu không khó - Số lượng : 1 - Số tiền : 200,000 đ <br/>Tổng tiền thanh toán :572,222 đ', 0, '2015-05-06 20:05:23', '333', 10, NULL, NULL),
(6, '3333', '3333', '3333', '3333', 'Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Làm giàu không khó - Số lượng : 1 - Số tiền : 200,000 đ <br/>Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Làm giàu không khó - Số lượng : 1 - Số tiền : 200,000 đ <br/>Tổng tiền thanh toán :422,222 đ', 0, '2015-05-06 22:21:04', '33333', 11, NULL, NULL),
(7, 'Duong Dung', '123123@gmail.com', '123123', 'Ha Noi', 'Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tổng tiền thanh toán :222,222 đ', 0, '2015-05-12 23:44:41', '123', 1, NULL, 0),
(9, 'Hoàng', 'dung@gmail.com', '0982661136', 'Lê Văn Hùng', 'Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tổng tiền thanh toán :222,222 đ', 1, '2015-05-17 18:36:08', '123', 1, NULL, 0),
(10, 'Hoàng1', 'dung@gmail.com1', '09826611361', 'Lê Văn Hùng', 'Tên sản phẩm : Khám phá thế giới - Số lượng : 1 - Số tiền : 222,222 đ <br/>Tổng tiền thanh toán :222,222 đ', 2, '2015-05-17 18:51:28', '123', 1, NULL, 0),
(11, '123123', '123123@gmail.com', '0999999999', 'hn', 'Tên sản phẩm : Không gia đình (tái bản) - Số lượng : 1 - Số tiền : 60,000 đ <br/>Tên sản phẩm : kk - Số lượng : 1 - Số tiền : 90 đ <br/>Tổng tiền thanh toán :60,090 đ', 1, '2015-06-22 20:20:22', '', 8, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dathangchitiet`
--

CREATE TABLE IF NOT EXISTS `dathangchitiet` (
`maDatHangCT` int(11) NOT NULL,
  `id_maDonHang` int(11) DEFAULT NULL,
  `id_maSanPham` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `id_MaNguoiDung` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dathangchitiet`
--

INSERT INTO `dathangchitiet` (`maDatHangCT`, `id_maDonHang`, `id_maSanPham`, `soLuong`, `gia`, `id_MaNguoiDung`) VALUES
(1, 1, 10, 2, 200000, 8),
(2, 4, NULL, 1, 222222, 10),
(3, 5, 9, 1, 222222, 10),
(4, 5, 11, 1, 150000, 10),
(5, 5, 10, 1, 200000, 10),
(6, 6, 9, 1, 222222, 11),
(7, 6, 10, 1, 200000, 11),
(8, 7, 9, 1, 222222, 1),
(10, 9, 9, 1, 222222, 1),
(11, 10, 9, 1, 222222, 1),
(12, 11, 38, 1, 60000, 8),
(13, 11, 45, 1, 90, 8);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
`maNguoiDung` int(11) NOT NULL,
  `tenDangNhap` varchar(256) DEFAULT NULL COMMENT 'Tên đăng nhập >6 và <32 ko chứa kí tự đặc biệt , viết thường',
  `matKhau` varchar(256) DEFAULT NULL COMMENT 'Mật khẩu độ dài 6 đến 32 kí tự',
  `hoTen` varchar(250) DEFAULT NULL,
  `ngaySinh` datetime DEFAULT NULL COMMENT 'ngày sinh dạng timestamp',
  `diaChiEmail` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email ',
  `soDienThoai` varchar(15) DEFAULT NULL,
  `kichHoat` tinyint(4) DEFAULT NULL COMMENT 'Trạng thái tài khoản : 1 - kích hoạt; 2- khóa',
  `ngayTao` datetime DEFAULT NULL COMMENT 'Thời gian tạo user',
  `diaChi` varchar(256) DEFAULT NULL,
  `quyen` tinyint(4) DEFAULT NULL,
  `tenCongTy` varchar(256) DEFAULT NULL,
  `coin` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`maNguoiDung`, `tenDangNhap`, `matKhau`, `hoTen`, `ngaySinh`, `diaChiEmail`, `soDienThoai`, `kichHoat`, `ngayTao`, `diaChi`, `quyen`, `tenCongTy`, `coin`) VALUES
(8, '123123', '123123', '123123', NULL, '123123@gmail.com', '0999999999', 1, '2015-04-28 20:34:16', 'cau giay, ha noi', NULL, 'dai hoc tai nguyen moi truong', 31233213),
(12, '777', '123123', NULL, NULL, '777', '0999999999', 1, '2015-05-17 20:59:00', 'cau giay, ha noi', 0, 'dai hoc tai nguyen moi truong', 0),
(13, '999', '999', NULL, NULL, '999', '999', 1, '2015-05-19 19:04:05', '99', 0, '999', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nguoiquanly`
--

CREATE TABLE IF NOT EXISTS `nguoiquanly` (
`maQuanLy` int(11) NOT NULL,
  `tenDangNhap` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matKhau` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soDienThoai` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diaChiEmail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hoTen` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kichHoat` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoiquanly`
--

INSERT INTO `nguoiquanly` (`maQuanLy`, `tenDangNhap`, `matKhau`, `soDienThoai`, `diaChiEmail`, `diaChi`, `hoTen`, `kichHoat`) VALUES
(1, 'admin', 'admin', '01224301893', 'lekhanhtung123@gmail.com', 'Hà Nội', 'Tung Le', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

CREATE TABLE IF NOT EXISTS `nhaxuatban` (
`maNhaXuatBan` int(11) NOT NULL,
  `tenNhaXuatBan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`maNhaXuatBan`, `tenNhaXuatBan`) VALUES
(1, 'Hà Nội'),
(2, 'Quân đội'),
(3, 'Hồ Chí Minh'),
(4, 'Quốc gia'),
(5, 'Skybook'),
(6, 'Văn Hoá Thông Tin'),
(7, 'Đang cập nhật'),
(8, 'Lao động'),
(9, 'AlphaBooks'),
(10, 'Bách Việt'),
(11, 'IPM'),
(12, 'Nhã Nam'),
(13, 'Giáo Dục'),
(14, 'Hội Nhà Văn'),
(15, 'Trẻ'),
(16, 'Thời Đại'),
(17, 'Tổng Hợp'),
(18, 'Văn Học'),
(19, 'Phương Nam'),
(20, 'Thái Hà'),
(21, 'TVM'),
(22, 'Vàng Anh'),
(23, 'Phan Thị');

-- --------------------------------------------------------

--
-- Table structure for table `phanhoi`
--

CREATE TABLE IF NOT EXISTS `phanhoi` (
`maPhanHoi` int(11) NOT NULL,
  `hoTen` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diaChiEmail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soDienThoai` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tieuDe` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noiDung` text COLLATE utf8_unicode_ci,
  `kichHoat` tinyint(4) DEFAULT NULL,
  `ngayTao` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phanhoi`
--

INSERT INTO `phanhoi` (`maPhanHoi`, `hoTen`, `diaChiEmail`, `soDienThoai`, `diaChi`, `tieuDe`, `noiDung`, `kichHoat`, `ngayTao`) VALUES
(2, '111', '1222', '2222', '222', '2222', '2222', 2, '2015-05-06 00:53:26'),
(3, '123', '123', '123', '123', '123', '123', 2, '2015-06-23 09:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
`maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhAnh` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaSanPham` int(11) DEFAULT NULL,
  `trangThaiKho` tinyint(4) DEFAULT NULL,
  `noiDungNgan` text COLLATE utf8_unicode_ci,
  `noiDung` text COLLATE utf8_unicode_ci,
  `id_MaQuanLy` int(11) DEFAULT NULL,
  `ngayTao` datetime DEFAULT NULL,
  `kichHoat` tinyint(4) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `id_MaDanhMuc` int(11) DEFAULT NULL,
  `id_MaNhaXuatBan` int(11) DEFAULT NULL,
  `id_MaTacGia` int(11) DEFAULT NULL,
  `khuyenMai` tinyint(4) DEFAULT NULL,
  `dacBiet` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSanPham`, `tenSanPham`, `hinhAnh`, `giaSanPham`, `trangThaiKho`, `noiDungNgan`, `noiDung`, `id_MaQuanLy`, `ngayTao`, `kichHoat`, `soLuong`, `id_MaDanhMuc`, `id_MaNhaXuatBan`, `id_MaTacGia`, `khuyenMai`, `dacBiet`) VALUES
(15, 'Caro Xương Cá', 'fe4e9daad4559ecc71fcd2d50b700d1d.jpg', 60000, NULL, 'Nội dung tóm tắt', '<p ><strong><span >M&oacute;n qu&agrave; m&ugrave;a h&egrave; cho những c&ocirc; g&aacute;i đ&aacute;ng y&ecirc;u quanh bạn.</span></strong></p>\r\n\r <p ><span >Caro xương c&aacute; - l&agrave; dự &aacute;n truyện tranh của những nữ họa sĩ t&agrave;i năng: Wazza Pink, Nhon, M&egrave;o Ngu v&agrave; H&agrave; Trần.</span></p>\r\n\r <p ><span >Bốn c&ocirc; g&aacute;i t&agrave;i năng với n&eacute;t vẽ ấn tượng đ&atilde; tạo n&ecirc;n h&igrave;nh ảnh Nhố vui nhộn, tinh nghịch với những chuyện trời ơi chả giống ai m&agrave; ai cũng thấy giống m&igrave;nh.</span></p>\r\n\r <p ><span >Nhố l&agrave; khắc họa h&igrave;nh ảnh những c&ocirc; n&agrave;ng trẻ trung l&iacute; lắc với chuyện trong nh&agrave;, chuyện ngo&agrave;i phố, chuyện ăn ngủ, học h&agrave;nh shopping, bạn b&egrave; đủ thể loại. M&agrave; dưới con mắt của Nhố chuyện g&igrave; cũng sinh động lạ k&igrave;.</span></p>\r\n\r <p ><span >Bạn sẽ thấy m&igrave;nh của những th&aacute;ng ng&agrave;y học tr&ograve; v&ocirc; lo v&ocirc; nghĩ, y&ecirc;u đời v&agrave; lạc quan v&ocirc; c&ugrave;ng.</span></p>\r\n\r <p ><span >V&agrave; với Nhố, bạn sẽ thấy m&igrave;nh may mắn ch&aacute;n ch&ecirc; v&igrave; Nhố c&ograve;n &ldquo;xui xẻo bầy đ&agrave;n&rdquo; hơn bạn một tỉ lần.</span></p>\r\n\r <p ><span >Đọc Ca r&ocirc; xương c&aacute;, để cười v&agrave; thấy t&acirc;m hồn m&igrave;nh cũng trẻ trung, lạc quan hơn một ch&uacute;t</span></p>\r\n\r <p ><span >Caro xương c&aacute;, những c&acirc;u chuyện của con g&aacute;i dưới g&oacute;c nh&igrave;n chẳng giống ai.</span></p>\r\n', 1, '2015-05-20 01:52:54', 1, 0, 10, 5, 5, 1, 1),
(16, 'Cả nhà thương nhau', '53f126d47069d202c35fad2e1e76302c.jpg', 69000, NULL, 'Nội dung tóm tắt', '<p>Cả Nh&agrave; Thương Nhau l&agrave; bộ truyện tranh đầy x&uacute;c động về những mối quan hệ trong gia đ&igrave;nh, về những đứa con những mong bước thật xa rồi khi lớn l&ecirc;n lại th&egrave;m về lại m&aacute;i ấm th&acirc;n thương.</p>\r\n', 1, '2015-05-20 01:58:00', 1, 0, 10, 5, 6, 0, 0),
(17, 'Chuyện tào lao của Vàng Vàng 2', 'caff10b85b98a4b4f57a4cab10dae9c9.jpg', 59000, NULL, 'Nội dung tóm tắt', '<p>V&agrave;o th&aacute;ng 7 vừa qua, chắc hẳn c&aacute;c bạn độc giả y&ecirc;u th&iacute;ch truyện tranh từ trẻ em đến người lớn kh&ocirc;ng ai l&agrave; kh&ocirc;ng biết đến cơn sốt V&agrave;ng V&agrave;ng trong Chuyện T&agrave;o Lao của V&agrave;ng V&agrave;ng (Tập 1)</p>\r\n', 1, '2015-05-20 02:01:11', 1, 0, 10, 6, 1, 0, 1),
(18, 'Yêu Bên Trái Dạy Dỗ Bên Phải', '8d5ada4abf7da4491d8160ccf9564a25.jpg', 75000, NULL, 'Nội dung tóm tắt', '<p>...</p>\r\n', 1, '2015-05-20 02:07:14', 1, 0, 9, 1, 1, 0, 0),
(19, 'Lời Vàng Của Bố', '4b8cd3844dd90ec624a3d87fc49f4af0.jpg', 50000, NULL, 'Nội dung tóm tắt', '<p ><em>Cuốn s&aacute;ch l&agrave; bằng chứng cho việc c&ocirc;ng nghệ th&ocirc;ng tin hiện đại kh&ocirc;ng khiến cho cha mẹ v&agrave; con c&aacute;i c&aacute;ch biệt, đồng thời chuyển đến cho bạn đọc trẻ tuổi một nh&atilde;n quan trung thực khi suy x&eacute;t mọi vấn đề trong cuộc sống.</em></p>\r\n\r <p >Cuốn s&aacute;ch n&agrave;y sẽ gi&uacute;p độc giả h&igrave;nh dung về cuộc sống gia đ&igrave;nh người Mỹ trung lưu, kh&ocirc;ng phải cuộc sống trong phim ảnh, m&agrave; l&agrave; cuộc sống thật với v&ocirc; v&agrave;n kh&oacute; khăn của n&oacute;. Đ&oacute; l&agrave; c&aacute;c nh&agrave; bi&ecirc;n kịch tương lai l&agrave;m bồi b&agrave;n trong nh&agrave; h&agrave;ng, v&agrave; chuy&ecirc;n gia trong lĩnh vực &ldquo;dược phẩm hạt nh&acirc;n&rdquo; l&agrave;m việc cật lực h&agrave;ng ng&agrave;y tới tận tối khuya với rất nhiều &aacute;p lực.</p>\r\n\r <p >Cuốn s&aacute;ch n&agrave;y c&oacute; lẽ cũng sẽ l&agrave; bằng chứng cho việc c&ocirc;ng nghệ th&ocirc;ng tin hiện đại kh&ocirc;ng khiến cho cha mẹ v&agrave; con c&aacute;i c&aacute;ch biệt, m&agrave; n&oacute; đ&atilde; san bằng những khoảng trống c&ograve;n chưa được hiểu hết về nhau trong mối quan hệ đ&oacute;. Đồng thời, cuốn s&aacute;ch c&ograve;n l&agrave; c&acirc;y cầu nối văn h&oacute;a ra thế giới b&ecirc;n ngo&agrave;i, c&oacute; thể, qua đ&oacute; sẽ c&oacute; nhiều cặp cha-con hiểu nhau hơn.</p>\r\n\r <p >V&agrave; điều cuối c&ugrave;ng, những người l&agrave;m s&aacute;ch muốn chuyển đến cho bạn đọc, nhất l&agrave; bạn đọc trẻ tuổi một nh&atilde;n quan trung thực khi suy x&eacute;t mọi vấn đề trong cuộc sống. Ch&uacute;ng ta phải l&agrave;m việc chăm chỉ, nỗ lực kh&ocirc;ng ngừng, lắng nghe v&agrave; suy nghĩ, trung thực v&agrave; tận t&acirc;m, quan s&aacute;t cẩn thận mọi thứ xung quanh, v&agrave; đối xử tử tế với những người xứng đ&aacute;ng được như thế.</p>\r\n', 1, '2015-05-20 02:16:46', 1, 0, 9, 1, 1, 0, 1),
(20, 'Bước Đột Phá Trong Việc Nuôi Dạy Con', '0c245e668049ed280f30cfe5a6a8ce8a.jpg', 65000, NULL, 'Nội dung tóm tắt', '<p>Một trong những sai lầm cơ bản nhất của c&aacute;c b&agrave; mẹ hiện đại l&agrave; chiều chuộng con qu&aacute; mức, l&agrave;m thay con cả những việc đ&aacute;ng ra ch&uacute;ng phải tự l&agrave;m. Họ cho rằng đ&oacute; l&agrave; biểu hiện của t&igrave;nh y&ecirc;u thương, v&agrave; hy vọng đứa con hiểu được &yacute; nghĩa của ch&uacute;ng. V&agrave; một ng&agrave;y kia, b&agrave; mẹ thức giấc, đau khổ xen lẫn hối hận khi nhận ra con c&aacute;i trưởng th&agrave;nh một c&aacute;ch &iacute;ch kỷ, lười biếng, ỉ lại v&agrave; v&ocirc; dụng.</p>\r\n\r\n<p><strong>Merrilee Browne Boyack</strong> khuy&ecirc;n bạn h&atilde;y rũ bỏ hết những mặc cảm tội lỗi trong qu&aacute; khứ, chỉ tập trung v&agrave;o hiện tại v&agrave; tương lai. Con bạn cần lớn l&ecirc;n v&agrave; trường th&agrave;nh, v&igrave; vậy t&iacute;nh độc lập l&agrave; điều quan trọng h&agrave;ng đầu bạn cần dạy cho trẻ. Cuốn s&aacute;ch <strong>Bước đột ph&aacute; trong việc nu&ocirc;i dạy con </strong>kh&ocirc;ng gi&uacute;p bạn xử l&yacute; c&aacute;c vấn đề về kỷ luật v&agrave; h&agrave;nh vi, đ&acirc;y l&agrave; một &ldquo;kế hoạch nu&ocirc;i dưỡng t&iacute;nh độc lập cho trẻ&rdquo;, con bạn cần lớn l&ecirc;n, cần phải biết tự chăm s&oacute;c cho cuộc sống v&agrave; tương lai của m&igrave;nh, v&igrave; vậy, bạn cần phải đọc cuốn s&aacute;ch n&agrave;y v&agrave; nghe lời khuy&ecirc;n của <strong>Merrilee Browne Boyack</strong>.</p>\r\n', 1, '2015-05-20 02:20:10', 0, 0, 12, 18, 1, 1, 0),
(21, 'Bài Học Làm Mẹ', 'c5a12d3b1ea45bcb4bedf8c7ee50a7a2.jpg', 56000, NULL, 'Nội dung tóm tắt', '<p>Đ&acirc;y l&agrave; cuốn s&aacute;ch đ&atilde; tạo n&ecirc;n &quot;cơn sốt&quot; trong l&agrave;ng s&aacute;ch gi&aacute;o dục tại H&agrave;n Quốc. Hi vọng sẽ nhận được sự quan t&acirc;m, y&ecirc;u th&iacute;ch của độc giả tại Việt Nam.</p>\r\n', 1, '2015-05-20 02:24:58', 1, 0, 12, 18, 9, 0, 1),
(22, 'Mẹ Dắt Con Đi', 'b717f4051d9c11a203cc0e398afdc5a2.jpg', 68000, NULL, 'Nội dung tóm tắt', '<p>T&ecirc;n cuốn s&aacute;ch xuất ph&aacute;t từ c&acirc;u ca dao về t&igrave;nh y&ecirc;u v&ocirc; bờ của mẹ, đ&atilde; trở n&ecirc;n th&acirc;n thuộc với mỗi người d&acirc;n Việt: <em>&ldquo;V&iacute; dầu cầu v&aacute;n đ&oacute;ng đinh. Cầu tre lắt lẻo gập ghềnh kh&oacute; đi. Kh&oacute; đi mẹ dắt con đi. Con đi trường học, mẹ đi trường đời&rdquo;</em>. V&igrave; lẽ đ&oacute;, lật giở từng trang s&aacute;ch của <strong>Mẹ dắt con đi</strong>, bạn đọc sẽ gặp ở đ&acirc;y tấm l&ograve;ng bao la của người mẹ trẻ với con m&igrave;nh. Người mẹ ấy kh&ocirc;ng những mang nặng đẻ đau ch&iacute;n th&aacute;ng mười ng&agrave;y, m&agrave; c&ograve;n tận tụy với con từ l&uacute;c con vừa được sinh ra, đến khi chập chững bước đi v&agrave; bập bẹ cất l&ecirc;n những tiếng n&oacute;i đầu ti&ecirc;n trong đời.</p>\r\n', 1, '2015-05-20 02:26:48', 1, 0, 12, 6, 9, 0, 0),
(23, 'Barcode T5', 'b9a30215500c0d6405ca188056498490.PNG', 19800, NULL, 'Nội dung tóm tắt', '<p>Ấn phẩm Barcode ra mắt v&agrave;o th&aacute;ng 5 - 6/2015 c&oacute; chủ đề Tự Học. B&agrave;i viết &quot;Cover Story&quot; sẽ giới thiệu với c&aacute;c độc giả trẻ những gương mặt doanh nh&acirc;n v&agrave; người truyền cảm hứng nổi tiếng trong lĩnh vực tự học, những website gi&uacute;p bạn học từ xa, v&agrave; 3 c&acirc;u trả lời th&uacute; vị cho c&acirc;u hỏi &quot;Ng&ocirc;i trường học l&yacute; tưởng của bạn&quot; từ 3 nh&acirc;n vật c&ugrave;ng l&agrave;m việc trong ng&agrave;nh gi&aacute;o dục.</p>\r\n', 1, '2015-05-20 02:34:28', 1, 0, 13, 7, 5, 0, 0),
(24, 'Trà sữa (số 114)', 'f84e98595cee703123aa5ec134a5334c.PNG', 20000, NULL, 'Nội dung tóm tắt', '<p><span ><strong>Tr&agrave; Sữa Cho T&acirc;m Hồn 114 - B&aacute;nh Quy Gừng C&oacute; M&ugrave;i T&aacute;o Đỏ</strong></span></p>\r\n', 1, '2015-05-20 02:36:53', 1, 0, 13, 7, 5, 0, 0),
(25, 'Trà sữa (số 115)', '929bd189a734540b9f622cc20b6a7d97.PNG', 20000, NULL, 'Nội dung tóm tắt', '<p><span ><strong>Tr&agrave; Sữa Cho T&acirc;m Hồn (Số 115) - Ban C&ocirc;ng M&ugrave;a Hạ</strong></span></p>\r\n', 1, '2015-05-20 02:38:23', 1, 0, 13, 7, 5, 0, 0),
(26, '10.000 Mẹo Vặt Trong Gia Đình', 'a21aa9b1f2d0e25c7a93feec9b92d3d6.PNG', 85000, NULL, 'Nội dung tóm tắt', '<p><strong>10.000 Mẹo Vặt Trong Gia Đ&igrave;nh</strong></p>\r\n', 1, '2015-05-20 02:42:13', 0, 0, 11, 7, 9, 1, 0),
(27, 'Để Khỏe Trong Mùa Thi', '4b68e0e8cbc5ab862f6a196ef72a5b78.jpg', 52000, NULL, 'Nội dung tóm tắt', '<p><strong>Để khỏe trong m&ugrave;a thi </strong>với những hướng dẫn v&agrave; tư vấn của c&aacute;c b&aacute;c sĩ, c&aacute;c chuy&ecirc;n gia đ&aacute;ng tin cậy trong lĩnh vực y tế, t&acirc;m l&yacute;, dinh dưỡng, gi&aacute;o dục&hellip; S&aacute;ch d&agrave;nh cho những phụ huynh muốn tiếp sức m&ugrave;a thi với con em m&igrave;nh, cũng l&agrave; cẩm nang cho c&aacute;c bạn học sinh, sinh vi&ecirc;n học c&aacute;ch tự chăm s&oacute;c bản th&acirc;n để khỏe cả tinh thần lẫn thể chất, sẵn s&agrave;ng &ldquo;vượt vũ m&ocirc;n&rdquo;.</p>\r\n', 1, '2015-05-20 02:43:03', 1, 0, 11, 6, 9, 0, 1),
(28, 'Món Ăn Việt Với Helen', 'd8d737fe3163179ca3a83c02b822838c.jpg', 198000, NULL, 'Nội dung tóm tắt', '<p ><strong>M&oacute;n Ăn Việt Với Helen (Vietnamese Foods with Helen)</strong> - tập s&aacute;ch ẩm thực trong top b&aacute;n chạy tr&ecirc;n trang Amazon.com.</p>\r\n\r <p >Điểm đặc biệt của cuốn s&aacute;ch n&agrave;y kh&ocirc;ng phải chỉ l&agrave; những c&ocirc;ng thức nấu ăn từ <strong>Helen L&ecirc; Hạ Huyền</strong> - c&ocirc; g&aacute;i Việt sinh năm 1984, tốt nghiệp thạc sĩ ng&agrave;nh Quản trị kinh doanh Quốc tế tại đại học Hamburg (Đức) mang trong m&igrave;nh niềm đam m&ecirc; bất tận với ẩm thực, m&agrave; trong s&aacute;ch c&ograve;n k&egrave;m c&aacute;c m&atilde; để truy cập miễn ph&iacute; v&agrave;o c&aacute;c video hướng dẫn nấu ăn của c&ocirc;. C&aacute;c video của <strong>Helen</strong> được tải l&ecirc;n Youtube thu h&uacute;t h&agrave;ng chục triệu lượt người xem tr&ecirc;n khắp thế giới.</p>\r\n\r <p >Với hơn 60 m&oacute;n ăn, từ m&oacute;n khai vị, m&oacute;n ch&iacute;nh cho tới m&oacute;n tr&aacute;ng miệng, bạn đọc c&oacute; thể y&ecirc;n t&acirc;m v&agrave; tự tin bước v&agrave;o bếp, d&ugrave; l&agrave; cho bữa cơm gia đ&igrave;nh h&agrave;ng ng&agrave;y hay m&oacute;n ngon cho ng&agrave;y chủ nhật v&agrave; trong những bữa tiệc nho nhỏ, th&acirc;n mật với bạn b&egrave;.</p>\r\n', 1, '2015-05-20 02:46:44', 1, 0, 11, 1, 5, 0, 0),
(29, 'Hy Vọng Và Phục Hồi', '507880c889ba7aa9850900b00b638599.jpg', 63000, NULL, 'Nội dung tóm tắt', '<h1>Hy Vọng V&agrave; Phục Hồi</h1>\r\n', 1, '2015-05-20 02:48:10', 1, 0, 11, 7, 1, 1, 0),
(30, 'Thọ Mai Gia Lễ', '731da633b913a38e010e942ba2e21c02.jpg', 22000, NULL, 'Nội dung tóm tắt', '<p ><strong>Thọ Mai Gia Lễ</strong> l&agrave; s&aacute;ch do cư sĩ Hồ Sĩ T&acirc;n bi&ecirc;n soạn v&agrave; ghi ch&eacute;p lại. S&aacute;ch&nbsp;chủ yếu tr&iacute;ch lược lại c&aacute;c quy c&aacute;ch. tập tục theo Chu C&ocirc;ng Đ&aacute;n, ngo&agrave;i ra c&ograve;n sưu tầm nhiều c&aacute;ch nghĩ, lối sống được dạy bảo trong Kinh Lễ của Đạo Khổng, v&agrave; s&aacute;ch Tr&igrave;nh Di đời Tống, thế kỷ thứ X, b&ecirc;n Trung Quốc. Tuy l&agrave; s&aacute;ch tuyển chọn c&aacute;c nghi lễ b&ecirc;n Trung Quốc, nhưng t&aacute;c giả cũng ghi ch&eacute;p c&aacute;c tập tục c&uacute;ng b&aacute;i, tang chế c&aacute;ch đ&acirc;y bốn năm trăm năm.</p>\r\n\r <p >Trong cuốn s&aacute;ch n&agrave;y, người bi&ecirc;n soạn chỉ tr&iacute;ch lược lại đ&ocirc;i điều của Thọ Mai gia lễ m&agrave; nhiều đời Nho sĩ đ&atilde; sao lục lại, thường được thực hiện trong c&aacute;c gia đ&igrave;nh quan lại v&agrave; tầng lớp trung lưu, đồng thời kết hợp với những nghi thức của phong tục tập qu&aacute;n tại một số v&ugrave;ng.</p>\r\n', 1, '2015-05-20 02:48:58', 1, 0, 11, 6, 5, 0, 0),
(31, 'Nhật Ký Học Làm Bánh 2', '44499f19d66c6359e01b02e89953afad.jpg', 150000, NULL, 'Nội dung tóm tắt', '<p>Cuốn cẩm nang Nhật k&yacute; học l&agrave;m b&aacute;nh 2 l&agrave; phần tiếp nối của cuốn s&aacute;ch best-seller Nhật k&yacute; học l&agrave;m b&aacute;nh</p>\r\n', 1, '2015-05-20 02:50:13', 1, 0, 11, 12, 5, 0, 1),
(32, 'Thuật Bán Hàng', '89ca1961521ee87d814c0f260fef234c.PNG', 54000, NULL, 'Nội dung tóm tắt', '<p><em>&quot;Nếu bạn l&agrave;m theo phương ph&aacute;p của những người th&agrave;nh c&ocirc;ng nhất, bạn cũng sẽ sớm được tận hưởng kết quả v&agrave; phần thưởng m&agrave; họ từng đạt được&quot;. </em></p>\r\n', 1, '2015-05-20 02:53:27', 1, 0, 9, 8, 9, 0, 0),
(33, 'Mật mã tài năng', '4b874ca8e6c4b5a06ce84493e80c6f06.jpg', 80000, NULL, 'Nội dung tóm tắt', '<p>Ba yếu tố then chốt:</p>\r\n\r\n<p>- Tập luyện s&acirc;u</p>\r\n\r\n<p>- &nbsp;Đ&aacute;nh lửa</p>\r\n\r\n<p>- C&aacute;ch huấn luyện bậc thầy</p>\r\n\r\n<p>Ch&iacute;nh l&agrave; &quot;Mật m&atilde;&quot; cho việc nu&ocirc;i dưỡng v&agrave; ph&aacute;t triển t&agrave;i năng.</p>\r\n', 1, '2015-05-20 02:54:27', 1, 0, 9, 7, 1, 1, 0),
(34, 'Thời điểm đột phá', '550a1a7148ef27a7f5a182186ad4baf3.jpg', 117000, NULL, 'Nội dung tóm tắt', '<p>T&aacute;c giả của <strong>Người Phụ Nữ Gi&agrave;u</strong> tiếp tục đưa ra những kinh nghiệm, b&agrave;i học v&agrave; lời khuy&ecirc;n để gi&uacute;p phụ nữ ng&agrave;y c&agrave;ng th&agrave;nh c&ocirc;ng v&agrave; hạnh ph&uacute;c.</p>\r\n\r\n<p>Cu&ocirc;́n sách <strong>Thời đi&ecirc;̉m đ&ocirc;̣t phá</strong> thực sự là m&ocirc;̣t lời k&ecirc;u gọi đ&ocirc;́i với phụ nữ - dành cho những phụ nữ mong mu&ocirc;́n đạt được nhi&ecirc;̀u hơn nữa trong cu&ocirc;̣c đời, cho những người phụ nữ kh&ocirc;ng bi&ecirc;́t lo sợ trước thách thức, cho những người sẵn sàng đứng l&ecirc;n và trở thành những hình m&acirc;̃u điển h&igrave;nh, cho những người phụ nữ sẵn sàng làm những gì c&acirc;̀n thi&ecirc;́t h&ocirc;m nay đ&ecirc;̉ có sự tự do và hạnh phúc trong tương lai, cho những người phụ nữ mong mu&ocirc;́n có được t&acirc;́t cả.</p>\r\n\r\n<p>Bằng lối viết thẳng thắn, <strong>Kim Kiyosaki </strong>chia sẻ c&aacute;ch thức ngắn gọn, dễ hiểu để c&oacute; được l&ograve;ng can đảm, vượt qua khủng hoảng v&agrave; tăng cường sự tự tin - những phẩm chất thật sự cần c&oacute; - để thực hiện những ước mơ t&agrave;i ch&iacute;nh của bạn.&nbsp;Những c&acirc;u chuyện kinh doanh v&agrave; đầu tư rất thực của ch&iacute;nh bản th&acirc;n <strong>Kim Kiyosaki</strong> cũng như của những người phụ nữ kh&aacute;c chắc chắn sẽ đem đến cho bạn nhiều điều mới mẻ, truyền cảm hứng v&agrave; thậm ch&iacute; khiến bạn ngạc nhi&ecirc;n!</p>\r\n', 1, '2015-05-20 02:55:24', 1, 0, 9, 15, 1, 1, 0),
(35, 'Đồng tiền lên ngôi', '2ffa7aae238c5816d5ac047cabb732c2.jpg', 115000, NULL, 'Nội dung tóm tắt', '<p >Tiền thực sự l&agrave; g&igrave;? Tiền từ đ&acirc;u đến? V&agrave; ch&uacute;ng sẽ đi về đ&acirc;u? Đồng tiền c&oacute; bẩn thỉu như ch&uacute;ng ta vẫn th&agrave;nh kiến? Bất chấp tất cả, đồng tiền đ&atilde; l&ecirc;n ng&ocirc;i, v&agrave; sự l&ecirc;n ng&ocirc;i của đồng tiền l&agrave; thiết yếu cho sự l&ecirc;n ng&ocirc;i của lo&agrave;i người, đưa con người từ mức sống khốn khổ l&ecirc;n đỉnh cao của sự thịnh vượng vật chất.</p>\r\n\r <p >Qua những sự kiện lịch sử vừa vinh quang vừa tăm tối, c&ugrave;ng những nh&acirc;n vật lẫy lừng vừa c&oacute; khả năng s&aacute;ng tạo vừa c&oacute; khả năng hủy diệt trong thế giới t&agrave;i ch&iacute;nh, <strong>Đồng tiền l&ecirc;n ng&ocirc;i </strong>kể c&acirc;u chuyện hấp dẫn về tiền tệ v&agrave; t&iacute;n dụng, thị trường tr&aacute;i phiếu cva cổ phiếu, về bảo hiểm v&agrave; bất động sản - những th&agrave;nh tố then chốt của nền t&agrave;i ch&iacute;nh - từ thời Lưỡng h&agrave; cổ đại tới đầu thế kỉ 21, với những cuộc khai sinh, bước tiến đến đỉnh cao, những cơn khủng hoảng v&agrave; b&agrave;i học đắt gi&aacute;. Cuốn s&aacute;ch cho thấy lĩnh vực t&agrave;i ch&iacute;nh gắn b&oacute; mật thiết, t&aacute;c động lớn lao, l&acirc;u d&agrave;i đến ch&uacute;ng ta ra sao: c&aacute;c thị trường t&agrave;i ch&iacute;nh l&agrave; tấm gương của nh&acirc;n loại, h&eacute; lộ về tưng ng&agrave;y từng giờ về c&aacute;ch ch&uacute;ng ta định gi&aacute; bản th&acirc;n v&agrave; những t&agrave;i nguy&ecirc;n xung quanh.</p>\r\n', 1, '2015-05-20 02:56:11', 1, 0, 9, 18, 1, 0, 0),
(36, 'Tiến bước', '6aa15aff3b3ef7507e432b87d9942c4c.jpg', 104000, NULL, 'Nội dung tóm tắt', '<p >Howard Schultz - chủ tịch v&agrave; tổng gi&aacute;m đốc của Starbucks, t&aacute;c giả của cuốn Dốc Hết Tr&aacute;i Tim - chia sẻ những c&acirc;u chuyện, kinh nghiệm v&agrave; b&agrave;i học từ khi &ocirc;ng quay trở lại với vai tr&ograve; CEO của Starbucks từ năm 2008 để gi&uacute;p c&ocirc;ng ty vượt qua giai đoạn kh&oacute; khăn về t&agrave;i ch&iacute;nh, v&agrave; gi&uacute;p đưa c&ocirc;ng ty về c&aacute;c gi&aacute; trị cốt l&otilde;i của m&igrave;nh. Năm 2007 - 2008 l&agrave; giai đoạn tồi tệ trong lịch sử h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển của Starbucks. V&agrave; <strong>Tiến Bước</strong> ch&iacute;nh l&agrave; c&acirc;u trả lời cho giai đoạn sau đ&oacute;, khi c&ocirc;ng ty hồi phục v&agrave; ph&aacute;t triển.</p>\r\n\r <p >Howard cũng c&oacute; những sợ h&atilde;i, nghi ngờ v&agrave; thất bại như bao nhi&ecirc;u người kh&aacute;c. Nhưng &ocirc;ng c&oacute; quyết t&acirc;m cao, c&oacute; tư duy v&agrave; chiến lược để hiện thực h&oacute;a tầm nh&igrave;n m&agrave; m&igrave;nh đ&atilde; đề ra ngay từ khi th&agrave;nh lập Starbucks. Đ&acirc;y l&agrave; điều m&agrave; nhiều người l&agrave;m kinh doanh c&oacute; thể học hỏi từ &ocirc;ng. Với c&aacute;ch viết cuốn h&uacute;t, những c&acirc;u chuyện th&uacute; vị v&agrave; đ&aacute;ng học hỏi, cuốn s&aacute;ch l&agrave; nguồn tham khảo qu&yacute; cho những ai muốn gi&uacute;p c&ocirc;ng ty vượt qua những l&uacute;c kh&oacute; khăn hay những ai muốn học hỏi về x&acirc;y dựng c&ocirc;ng ty.</p>\r\n', 1, '2015-05-20 03:00:27', 1, 0, 9, 15, 9, 0, 1),
(37, 'Góc khuất', '57b3e8814ad8d56b8ad09ec70d429836.PNG', 50000, NULL, 'Nội dung tóm tắt', '<p><strong>G&oacute;c khuất</strong> thể hiện một số biến chuyển lịch sử c&oacute; thật trong những ng&agrave;y gần kết th&uacute;c cuộc chiến khốc liệt, k&eacute;o d&agrave;i đ&atilde; ba mươi năm, l&uacute;c c&aacute;c qu&acirc;n đo&agrave;n c&aacute;ch mạng thần tốc tiến về S&agrave;i G&ograve;n v&agrave; sự vận động tinh tế, kịp thời của c&aacute;c nh&agrave; t&igrave;nh b&aacute;o ta hoạt động b&iacute; mật ở nội th&agrave;nh để Dương Văn Minh - người cầm đầu chế độ S&agrave;i G&ograve;n - chấp nhận đầu h&agrave;ng v&ocirc; điều kiện, hầu tr&aacute;nh cho th&agrave;nh phố n&agrave;y khỏi bị thương vong c&ugrave;ng sự tan n&aacute;t, dập v&ugrave;i của những đạn bom trong một kết th&uacute;c m&aacute;u lửa.</p>\r\n', 1, '2015-05-20 03:02:55', 1, 0, 8, 7, 12, 0, 0),
(38, 'Không gia đình (tái bản)', '7b086092a4b631633023c835a844a8ee.PNG', 60000, NULL, 'Nội dung tóm tắt', '<p><strong><span >MỘT T&Aacute;C PHẨM KINH ĐIỂN</span></strong></p>\r\n', 1, '2015-05-20 03:05:36', 1, 0, 8, 18, 9, 0, 0),
(39, 'Chênh Vênh Hai Lăm (2015)', '23a8626b134bd5bb12e0f1e33ba12dd6.PNG', 60000, NULL, 'Nội dung tóm tắt', '<p><em>&ldquo;L&ograve;ng ch&ecirc;nh v&ecirc;nh giữa lưng chừng cuộc sống.<strong>&rdquo;</strong></em></p>\r\n', 1, '2015-05-20 03:11:03', 0, 0, 8, 18, 9, 0, 1),
(40, 'Đại Gia Gatsby (Tái Bản 2015)', 'c8386d8d83bfb798ac44dbc382393b65.PNG', 56000, NULL, 'Nội dung tóm tắt', '<p><em>&quot;Gatsby đ&atilde; tin v&agrave;o đốm s&aacute;ng xanh ấy, v&agrave;o c&aacute;i tương lai m&ecirc; đắm đến cực điểm đang rời xa trước mắt ch&uacute;ng ta năm n&agrave;y qua năm kh&aacute;c. Ừ th&igrave; n&oacute; đ&atilde; tuột khỏi tay ch&uacute;ng ta, nhưng c&oacute; l&agrave;m sao đ&acirc;u &ndash; ng&agrave;y mai ch&uacute;ng ta sẽ lại chạy nhanh hơn, vươn tay ra xa hơn&hellip;&rdquo;</em></p>\r\n', 1, '2015-05-20 03:12:12', 0, 0, 8, 14, 9, 0, 1),
(41, 'Săn tổng thống', '1a63fb3bf1f7b5c1134c481e8a657013.PNG', 76000, NULL, 'Nội dung tóm tắt', '<p><strong>Săn tổng thống</strong> l&agrave; cuốn tiểu thuyết được viết dựa tr&ecirc;n cốt truyện nguy&ecirc;n bản của Jalmari Helander v&agrave; Petri Jokiranta. Bộ phim chuyển thế ra mắt v&agrave;o m&ugrave;a xu&acirc;n 2015, được sản xuất bởi h&atilde;ng Subzero Film Entertainment phối hợp với h&atilde;ng Altitude Film Entertainment v&agrave; Egoli Tossell Film.</p>\r\n', 1, '2015-05-20 03:13:11', 1, 0, 8, 18, 5, 0, 0),
(42, 'Anh Có Thích Nước Mỹ Không?', '73a92055beebebc63f011852eb056b1c.jpg', 138000, NULL, 'Nội dung tóm tắt', '<p>Một cuốn s&aacute;ch hay n&ecirc;n đọc!</p>\r\n', 1, '2015-05-20 03:14:06', 0, 0, 8, 14, 9, 0, 1),
(43, 'Sẽ Có Thiên Thần Thay Anh Yêu Em', 'b80749eb0acd994fc28f9f11ff46df1c.png', 98000, NULL, 'Nội dung tóm tắt', '<p>Sẽ c&oacute; thi&ecirc;n thần thay anh y&ecirc;u em</p>\r\n', 1, '2015-05-20 03:15:33', 0, 0, 8, 18, 9, 0, 1),
(44, 'Bến Không Chồng', '47ba5b9f1ba7cd736e0f90f62514dc8b.PNG', 60000, NULL, 'Nội dung tóm tắt', '<p>Cuốn tiểu thuyết trong bộ ba giải thưởng Hội Nh&agrave; văn 1991, <strong>Bến kh&ocirc;ng chồng</strong> đ&atilde; đứng được với thời gian nhờ một vẻ đẹp trong khu&ocirc;n h&igrave;nh cổ điển: mộc mạc v&agrave; ch&acirc;n phương trong cốt truyện, trong c&aacute;ch dẫn dắt v&agrave; ng&ocirc;n từ; như nhận x&eacute;t của gi&aacute;o sư Phong L&ecirc; - <em>&ldquo;một ng&ocirc;n từ kh&ocirc;ng lấp l&aacute;nh t&agrave;i hoa, m&agrave; giản dị, tự nhi&ecirc;n, v&agrave; với ưu thế đ&oacute;, Bến kh&ocirc;ng chồng l&agrave; t&aacute;c phẩm khẳng định được ngay vị tr&iacute; của n&oacute; trong l&ograve;ng độc giả m&agrave; kh&ocirc;ng hề g&acirc;y tranh c&atilde;i&rdquo;</em>.</p>\r\n', 1, '2015-05-20 03:16:48', 1, 0, 8, 15, 9, 0, 0),
(45, 'kk', 'a120e50463a4967556ceb11d8b5ce688.jpg', 90, NULL, 'Nội dung tóm tắt', '<p>kkkk</p>\r\n', 1, '2015-06-22 20:18:12', 1, 0, 8, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE IF NOT EXISTS `tacgia` (
`maTacGia` int(11) NOT NULL,
  `tenTacGia` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`maTacGia`, `tenTacGia`) VALUES
(1, 'Nguyễn Bính'),
(2, 'Tô Hoài'),
(3, 'Quỳnh Giao'),
(5, 'Nhiều tác giả'),
(6, 'ThăngFly#'),
(7, 'Phan Kim Thanh'),
(8, 'Kim Vận Dung'),
(9, 'Đang cập nhật'),
(10, 'Justin Samuel Halpern'),
(11, 'Merrilee Browne Boyack'),
(12, 'Dương Linh');

-- --------------------------------------------------------

--
-- Table structure for table `tuychinh`
--

CREATE TABLE IF NOT EXISTS `tuychinh` (
`maTuyChinh` int(11) NOT NULL,
  `tenTuyChinh` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noiDung` text COLLATE utf8_unicode_ci,
  `id_MaQuanLy` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuychinh`
--

INSERT INTO `tuychinh` (`maTuyChinh`, `tenTuyChinh`, `noiDung`, `id_MaQuanLy`) VALUES
(1, 'site_title', 'Sản phẩm hàn quốc 1', NULL),
(2, 'site_description', 'Sản phẩm hàn quốc  2', NULL),
(3, 'site_keyword', 'Sản phẩm hàn quốc 3', NULL),
(4, 'site_banner', 'web_21-03-15.png', NULL),
(5, 'site_slider', '{"1":{"id":1,"url":"1111","content":"1111","image":"images\\/slide\\/3c99ac33333c6f7ab6c3ee316fdbb944.jpg"},"2":{"id":2,"url":"2","content":"2","image":"images\\/slide\\/b662d0d56d89b17504d7c7b3199ba7e9.jpg"},"3":{"id":3,"url":"3","content":"3","image":"images\\/slide\\/bd8b7bded5ba5fbccccf67429993b676.jpg"}}', NULL),
(6, 'contact', '<p><strong>Địa chỉ: Bạch Mai H&agrave; Nội</strong><br />\r\nĐiện thoại: 0902 640 130 - 0907 009 031<br />\r\nEmail: <a href=\\"\\\\\\\\\\">changeshopvn@yahoo.com</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL),
(7, 'footer', '<p><strong><span >1062 C&aacute;ch Mạng Th&aacute;ng T&aacute;m, P.4, Q.T&acirc;n B&igrave;nh, TP. HCM 1</span><br />\r\nHotline: 0902.640.130 - (08) 629 68 245<br />\r\nOpen: 8H:30 - 22H:00</strong></p>\r\n', NULL),
(8, 'urlsocial', '{"facebook":"https:\\/\\/www.facebook.com\\/FanmusicMinhanhDsmall?fref=ts","youtube":"http:\\/\\/facebook.com\\/duongdung131","twitter":"http:\\/\\/facebook.com\\/duongdung131"}', NULL),
(9, 'admin_email', 'dungdcth@gmail.com', NULL),
(10, 'contact_email', 'contact@gmail.com', NULL),
(11, 'hotline', '0979456456', NULL),
(12, 'maps', '<iframe src=https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3724.7729304156255!2d105.8252042!3d21.0017374!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac86f22435db%3A0xdf13d9c3be44eeba!2zMTA5IFRyxrDhu51uZyBDaGluaCwgbMOgbmcgS2jGsMahbmcgVGjGsOG7o25nLCBOZ8OjIFTGsCBT4bufLCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1422010183888 width=600 height=450 frameborder=0 style=border:0></iframe>', NULL),
(13, 'site_logo', 'logoshopcopypngpngc6929a56bffbdc63a39244af6b166c4d.png', NULL),
(14, 'text_header', '<div >\r\n<ul>\r  <li><strong><span ><span ><span >1062 C&aacute;ch Mạng Th&aacute;ng T&aacute;m, P.4, Q.T&acirc;n B&igrave;nh, TP. HCM</span></span></span></strong></li>\r  <li><span ><strong>Hotline</strong></span>: <strong>0902.640.130 - (08) 629 68 245</strong></li>\r\n <li><strong>Open: 8H:30 - 22H:00</strong></li>\r\n <li><strong>ok</strong></li>\r\n</ul>\r\n</div>\r\n', NULL),
(19, 'text_footer1', '<p>Nhằm đ&aacute;p ứng nhu cầu thời trang gi&agrave;y CHANGE SHOP cung cấp ra thị trường rất nhiều sản phẩm gi&agrave;y chất lượng, mẫu m&atilde; đa dạng, style mới nhất... mang đến cho Qu&yacute; Kh&aacute;ch H&agrave;ng cảm gi&aacute;c mạnh mẽ, tự tin, c&aacute; t&iacute;nh v&agrave; thanh lịch. CHANGE SHOP&nbsp; lu&ocirc;n mong muốn mang lại cho bạn cảm gi&aacute;c thoải m&aacute;i với những kiểu gi&agrave;y thời thượng phong c&aacute;ch H&agrave;n Quốc như: gi&agrave;y boot, gi&agrave;y oxford, gi&agrave;y mọi, gi&agrave;y thời trang nam nữ.... ok</p>\r\n', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
 ADD PRIMARY KEY (`maBaiViet`);

--
-- Indexes for table `binhchon`
--
ALTER TABLE `binhchon`
 ADD PRIMARY KEY (`maBinhChon`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
 ADD PRIMARY KEY (`maBinhLuan`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
 ADD PRIMARY KEY (`maDanhMuc`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
 ADD PRIMARY KEY (`maDatHang`);

--
-- Indexes for table `dathangchitiet`
--
ALTER TABLE `dathangchitiet`
 ADD PRIMARY KEY (`maDatHangCT`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
 ADD PRIMARY KEY (`maNguoiDung`);

--
-- Indexes for table `nguoiquanly`
--
ALTER TABLE `nguoiquanly`
 ADD PRIMARY KEY (`maQuanLy`);

--
-- Indexes for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
 ADD PRIMARY KEY (`maNhaXuatBan`);

--
-- Indexes for table `phanhoi`
--
ALTER TABLE `phanhoi`
 ADD PRIMARY KEY (`maPhanHoi`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
 ADD PRIMARY KEY (`maSanPham`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
 ADD PRIMARY KEY (`maTacGia`);

--
-- Indexes for table `tuychinh`
--
ALTER TABLE `tuychinh`
 ADD PRIMARY KEY (`maTuyChinh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
MODIFY `maBaiViet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `binhchon`
--
ALTER TABLE `binhchon`
MODIFY `maBinhChon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
MODIFY `maBinhLuan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
MODIFY `maDanhMuc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
MODIFY `maDatHang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dathangchitiet`
--
ALTER TABLE `dathangchitiet`
MODIFY `maDatHangCT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
MODIFY `maNguoiDung` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `nguoiquanly`
--
ALTER TABLE `nguoiquanly`
MODIFY `maQuanLy` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
MODIFY `maNhaXuatBan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `phanhoi`
--
ALTER TABLE `phanhoi`
MODIFY `maPhanHoi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tacgia`
--
ALTER TABLE `tacgia`
MODIFY `maTacGia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tuychinh`
--
ALTER TABLE `tuychinh`
MODIFY `maTuyChinh` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
