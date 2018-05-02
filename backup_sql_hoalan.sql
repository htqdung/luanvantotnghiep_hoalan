-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 02, 2018 lúc 02:34 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_hoalan`
--
CREATE DATABASE IF NOT EXISTS `db_hoalan` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `db_hoalan`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_07_032456_create_tinhthanhpho_table', 1),
(4, '2018_03_07_032624_create_chi_table', 1),
(5, '2018_03_07_032845_create_dacdiem_table', 1),
(6, '2018_03_08_134012_create_loai_table', 1),
(7, '2018_03_08_134848_create_quanhuyen_table', 1),
(8, '2018_03_08_135259_create_phuongxa_table', 1),
(9, '2018_03_15_122507_create_uudai_table', 1),
(10, '2018_03_15_123102_create_diachi_table', 1),
(11, '2018_03_15_123402_create_thongtinlienhe_table', 1),
(12, '2018_03_15_124349_create_hinhthuckhuyenmai_table', 1),
(13, '2018_03_15_124458_create_quatang_table', 1),
(14, '2018_03_15_124652_create_sanpham_table', 1),
(15, '2018_03_15_124919_create_sanpham_loai_table', 1),
(16, '2018_03_15_125128_create_chuongtrinhkhuyenmai_table', 1),
(17, '2018_03_15_125344_create_hinhthucuudai_table', 1),
(18, '2018_03_15_125704_create_dongia_table', 1),
(19, '2018_03_15_133308_create_nhom_table', 1),
(20, '2018_03_15_134142_create_nguoidung_table', 1),
(21, '2018_03_15_134249_create_danhgia_table', 1),
(22, '2018_03_15_134342_create_donhang_table', 1),
(23, '2018_03_15_134407_create_chitietdonhang_table', 1),
(24, '2018_03_15_134426_create_giaohang_table', 1),
(25, '2018_03_15_134443_create_thanhtoan_table', 1),
(26, '2018_03_15_134616_create_hinhanh_table', 1),
(27, '2018_03_21_140706_create_trangthai_table', 1),
(28, '2018_03_24_212957_create_lienhe_table', 1),
(29, '2018_03_24_214055_create_trangthai_donhang_table', 1),
(30, '2018_03_25_152804_create_kho_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chi`
--

CREATE TABLE `tbl_chi` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_chi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chi`
--

INSERT INTO `tbl_chi` (`id`, `ten_chi`, `mo_ta`, `created_at`, `updated_at`) VALUES
(1, 'Rhynchostylis', 'Rhynchostylis là một chi lan nhỏ, được xếp vào nhóm ‘Lan liêp-hiệp\r\nVanda’ (Vanda Alliance Orchids) bao gồm một số loài lan đơn thân, có một số đặc điểm sinh học giống nhau.\r\nChi lan Rhynchostylis chỉ có 3-4 loài, nguồn gốc và phân bố giới hạn tại Ấn Độ, Trung Hoa, Đông Dương, Mã Lai, Indonesia và Phillippines. \r\nRhynchostylis thích hợp với khí hậu nóng và ẩm, nơi những khu rừng nhiều bóng mát,không khí thoáng gió nhẹ', NULL, NULL),
(2, 'vanda', 'vanda', '2018-04-24 13:45:34', '2018-04-24 13:45:34'),
(5, 'aaa', 'dhhfskihkshgi', '2018-04-24 13:46:21', '2018-04-24 14:15:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `don_gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chuongtrinhkhuyenmai`
--

CREATE TABLE `tbl_chuongtrinhkhuyenmai` (
  `id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `hinhthuckhuyenmai_id` int(10) UNSIGNED NOT NULL,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chuongtrinhkhuyenmai`
--

INSERT INTO `tbl_chuongtrinhkhuyenmai` (`id`, `sanpham_id`, `hinhthuckhuyenmai_id`, `ngay_bat_dau`, `ngay_ket_thuc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-04-25 00:00:00', '2018-04-28 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dacdiem`
--

CREATE TABLE `tbl_dacdiem` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoa` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `la` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `than` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `re` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dacdiem`
--

INSERT INTO `tbl_dacdiem` (`id`, `hoa`, `la`, `than`, `re`, `created_at`, `updated_at`) VALUES
(1, 'Hoa xếp dày đặc thành bông màu trắng có đốm tím, cánh môi màu bông thõng xuống, hoa xếp dày đặc thành bông màu trắng có đốm tím, cánh môi màu tím.', 'lá màu xanh đậm, lá lớn', 'thẳng mập', 'theo chùm', NULL, '2018-04-24 13:44:41'),
(2, 'bự', 'dài nhỏ', 'dài nhỏ', 'chùm bự', '2018-04-24 14:17:50', '2018-04-24 14:17:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhgia`
--

CREATE TABLE `tbl_danhgia` (
  `id` int(10) UNSIGNED NOT NULL,
  `nguoidung_id` int(10) UNSIGNED NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci,
  `danh_gia` int(11) NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `ngay_danh_gia` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_diachi`
--

CREATE TABLE `tbl_diachi` (
  `id` int(10) UNSIGNED NOT NULL,
  `so_nha` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ten_duong` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phuongxa_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_diachi`
--

INSERT INTO `tbl_diachi` (`id`, `so_nha`, `ten_duong`, `phuongxa_id`, `created_at`, `updated_at`) VALUES
(1, '45', 'Võ trường toản', 1, NULL, NULL),
(2, '688b', 'an lợi b', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dongia`
--

CREATE TABLE `tbl_dongia` (
  `id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `gia` int(11) NOT NULL,
  `ngay_ap_dung` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dongia`
--

INSERT INTO `tbl_dongia` (`id`, `sanpham_id`, `gia`, `ngay_ap_dung`, `created_at`, `updated_at`) VALUES
(1, 1, 1999000, '2018-04-25 00:00:00', NULL, NULL),
(15, 15, 1234, '0000-00-00 00:00:00', '2018-04-26 12:13:09', '2018-04-26 12:13:09'),
(16, 16, 1234, '0000-00-00 00:00:00', '2018-04-26 12:13:48', '2018-04-26 12:13:48'),
(17, 17, 1234, '0000-00-00 00:00:00', '2018-04-26 12:14:09', '2018-04-26 12:14:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngay_dat_hang` datetime NOT NULL,
  `nguoidung_id` int(10) UNSIGNED NOT NULL,
  `diachi_id` int(10) UNSIGNED NOT NULL,
  `phi_van_chuyen` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ten_nguoi_nhan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_thuc_thanh_toan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id`, `ngay_dat_hang`, `nguoidung_id`, `diachi_id`, `phi_van_chuyen`, `tong_tien`, `ten_nguoi_nhan`, `hinh_thuc_thanh_toan`, `created_at`, `updated_at`) VALUES
(1, '2018-04-24 00:00:00', 1, 1, 5000, 2006000, 'Huỳnh thị quỳnh dung', 'cod', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaohang`
--

CREATE TABLE `tbl_giaohang` (
  `id` int(10) UNSIGNED NOT NULL,
  `chitietdonhang_id` int(10) UNSIGNED NOT NULL,
  `ngay_giao_hang` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hinhanh`
--

CREATE TABLE `tbl_hinhanh` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hinhanh`
--

INSERT INTO `tbl_hinhanh` (`id`, `ten_hinh`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(1, 'sanpham_2018_04_26_07_14_09.png', 17, '2018-04-26 12:14:10', '2018-04-26 12:14:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hinhthuckhuyenmai`
--

CREATE TABLE `tbl_hinhthuckhuyenmai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_hinh_thuc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ti_le_giam_gia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hinhthuckhuyenmai`
--

INSERT INTO `tbl_hinhthuckhuyenmai` (`id`, `ten_hinh_thuc`, `ti_le_giam_gia`, `created_at`, `updated_at`) VALUES
(1, 'ÁP dụng khi mua 2 sản phảm trở lên', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hinhthucuudai`
--

CREATE TABLE `tbl_hinhthucuudai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_hinh_thuc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `uudai_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hinhthucuudai`
--

INSERT INTO `tbl_hinhthucuudai` (`id`, `ten_hinh_thuc`, `sanpham_id`, `uudai_id`, `created_at`, `updated_at`) VALUES
(1, 'Dành cho khách hàng sỉ', 1, 1, NULL, NULL),
(3, 'áA', 1, 24, '2018-04-27 11:18:06', '2018-04-27 11:18:06'),
(4, 'tinh', 1, 25, '2018-04-27 11:19:55', '2018-04-27 11:19:55'),
(5, 'TÍnh lì', 15, 26, '2018-04-27 11:23:12', '2018-04-27 11:23:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_kho`
--

CREATE TABLE `tbl_kho` (
  `id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieu_de` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_lien_he` datetime NOT NULL,
  `nguoidung_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loai`
--

CREATE TABLE `tbl_loai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_loai` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ten_khoa_hoc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8_unicode_ci,
  `chi_id` int(10) UNSIGNED NOT NULL,
  `dacdiem_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loai`
--

INSERT INTO `tbl_loai` (`id`, `ten_loai`, `ten_khoa_hoc`, `mo_ta`, `chi_id`, `dacdiem_id`, `created_at`, `updated_at`) VALUES
(2, 'Lan Ngọc điểm đuôi cáo ', 'Rhynchostylis retusa', 'Phong lan thân đơn, cao 20-40 cm, lá dầy và cứng, dài 30-40 cm rộng 3.5 cm. Chùm hoa rủ xuống dài 30-60 cm. Hoa mọc dầy và nhiều, to 1.5-2 cm, nở\r\nvào mùa Đông Xuân. Nơi mọc Son la, Nghĩa lộ, Yên Bái, Hòa Bình, Tây nguyên, Lâm Đồng', 1, 1, NULL, NULL),
(3, 'Bạc lan', 'Cymbidium erythrostylum (Đặc hữu)', NULL, 1, 1, '2018-04-29 01:10:05', '2018-04-29 01:10:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nguoidung`
--

CREATE TABLE `tbl_nguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhom_id` int(10) UNSIGNED NOT NULL,
  `thongtinlienhe_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nguoidung`
--

INSERT INTO `tbl_nguoidung` (`id`, `username`, `password`, `nhom_id`, `thongtinlienhe_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'quynhdung', '1111', 1, 1, NULL, NULL, NULL),
(2, 'tinhphan', '1111', 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhom`
--

CREATE TABLE `tbl_nhom` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_nhom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhom`
--

INSERT INTO `tbl_nhom` (`id`, `ten_nhom`, `created_at`, `updated_at`) VALUES
(1, 'người dùng', NULL, NULL),
(2, 'quản trị', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phuongxa`
--

CREATE TABLE `tbl_phuongxa` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_phuong_xa` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `quanhuyen_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phuongxa`
--

INSERT INTO `tbl_phuongxa` (`id`, `ten_phuong_xa`, `quanhuyen_id`, `created_at`, `updated_at`) VALUES
(1, 'An hòa', 1, NULL, NULL),
(2, 'Định yên', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quanhuyen`
--

CREATE TABLE `tbl_quanhuyen` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_quan_huyen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_thanhpho_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_quanhuyen`
--

INSERT INTO `tbl_quanhuyen` (`id`, `ten_quan_huyen`, `tinh_thanhpho_id`, `created_at`, `updated_at`) VALUES
(1, 'Ninh kiều', 1, NULL, NULL),
(2, 'Lấp vò', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quatang`
--

CREATE TABLE `tbl_quatang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_qua_tang` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `hinhthuckhuyenmai_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_quatang`
--

INSERT INTO `tbl_quatang` (`id`, `ten_qua_tang`, `so_luong`, `hinhthuckhuyenmai_id`, `created_at`, `updated_at`) VALUES
(1, 'phân bón', 5, 1, NULL, NULL),
(2, 'bình xịt nước', 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_san_pham` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8_unicode_ci,
  `thong_tin_chi_tiet` text COLLATE utf8_unicode_ci NOT NULL,
  `diem_thuong` int(11) NOT NULL,
  `tag` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id`, `ten_san_pham`, `mo_ta`, `thong_tin_chi_tiet`, `diem_thuong`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Ngọc điểm đuôi cáo', 'Là dòng lan rất đẹp, hoa thơm sống khoẻ, cây ra hoa vào mùa xuân thích hợp làm quà tặng hay trang trí nhà cửa', '50cm', 5, 'sinhnhat, tângia', NULL, '2018-04-24 13:41:41'),
(15, 'DUNG LÌ', '<p>&aacute;dasd</p>', '1,1,1', 1, NULL, '2018-04-26 12:13:09', '2018-04-26 12:13:09'),
(16, 'DUNG LÌ', '<p>&aacute;dasd</p>', '1,1,1', 1, NULL, '2018-04-26 12:13:48', '2018-04-26 12:13:48'),
(17, 'DUNG LÌ', '<p>&aacute;dasd</p>', '1,1,1', 1, NULL, '2018-04-26 12:14:09', '2018-04-26 12:14:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham_loai`
--

CREATE TABLE `tbl_sanpham_loai` (
  `id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `loai_id` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham_loai`
--

INSERT INTO `tbl_sanpham_loai` (`id`, `sanpham_id`, `loai_id`, `so_luong`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thanhtoan`
--

CREATE TABLE `tbl_thanhtoan` (
  `id` int(10) UNSIGNED NOT NULL,
  `chitietdonhang_id` int(10) UNSIGNED NOT NULL,
  `ngay_thanh_toan` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongtinlienhe`
--

CREATE TABLE `tbl_thongtinlienhe` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongtinlienhe`
--

INSERT INTO `tbl_thongtinlienhe` (`id`, `ten`, `so_dien_thoai`, `email`, `diachi_id`, `created_at`, `updated_at`) VALUES
(1, 'Huỳnh thị quỳnh dung', '01679595691', 'quynhdungkute.com@gmail.com', 1, NULL, NULL),
(2, 'Phan văn tính', '01288829920', 'pvtinh.ktpm0114@student.ctuet.edu.vn', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tinh_thanhpho`
--

CREATE TABLE `tbl_tinh_thanhpho` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_tinh_thanhpho` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tinh_thanhpho`
--

INSERT INTO `tbl_tinh_thanhpho` (`id`, `ten_tinh_thanhpho`, `created_at`, `updated_at`) VALUES
(1, 'Cần thơ', NULL, NULL),
(2, 'Đồng Tháp', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trangthai`
--

CREATE TABLE `tbl_trangthai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_trang_thai` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_trangthai`
--

INSERT INTO `tbl_trangthai` (`id`, `ten_trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Đang xử lý', NULL, NULL),
(2, 'Đang giao', NULL, NULL),
(3, 'Đã giao', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trangthai_donhang`
--

CREATE TABLE `tbl_trangthai_donhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `trangthai_id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_trangthai_donhang`
--

INSERT INTO `tbl_trangthai_donhang` (`id`, `trangthai_id`, `donhang_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_uudai`
--

CREATE TABLE `tbl_uudai` (
  `id` int(10) UNSIGNED NOT NULL,
  `so_luong_toi_thieu` int(11) NOT NULL,
  `ti_le_giam_gia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_uudai`
--

INSERT INTO `tbl_uudai` (`id`, `so_luong_toi_thieu`, `ti_le_giam_gia`, `created_at`, `updated_at`) VALUES
(1, 10, 25, NULL, NULL),
(2, 9, 25, '2018-04-27 09:10:18', '2018-04-27 09:10:18'),
(3, 9, 25, '2018-04-27 09:12:41', '2018-04-27 09:12:41'),
(4, 9, 25, '2018-04-27 09:14:34', '2018-04-27 09:14:34'),
(5, 9, 25, '2018-04-27 09:15:58', '2018-04-27 09:15:58'),
(6, 9, 25, '2018-04-27 09:17:11', '2018-04-27 09:17:11'),
(7, 9, 25, '2018-04-27 09:19:02', '2018-04-27 09:19:02'),
(8, 9, 25, '2018-04-27 09:20:54', '2018-04-27 09:20:54'),
(9, 9, 25, '2018-04-27 09:21:20', '2018-04-27 09:21:20'),
(10, 3, 12, '2018-04-27 09:21:36', '2018-04-27 09:21:36'),
(11, 3, 12, '2018-04-27 09:24:35', '2018-04-27 09:24:35'),
(12, 3, 12, '2018-04-27 09:26:13', '2018-04-27 09:26:13'),
(13, 2, 15, '2018-04-27 09:31:02', '2018-04-27 09:31:02'),
(14, 3, 13, '2018-04-27 09:35:00', '2018-04-27 09:35:00'),
(15, 7, 16, '2018-04-27 09:40:35', '2018-04-27 09:40:35'),
(16, 12, 15, '2018-04-27 09:52:19', '2018-04-27 09:52:19'),
(17, 12, 15, '2018-04-27 09:52:50', '2018-04-27 09:52:50'),
(18, 12, 15, '2018-04-27 09:53:39', '2018-04-27 09:53:39'),
(19, 1, 1, '2018-04-27 11:01:32', '2018-04-27 11:01:32'),
(20, 1, 1, '2018-04-27 11:01:45', '2018-04-27 11:01:45'),
(21, 1, 1, '2018-04-27 11:16:33', '2018-04-27 11:16:33'),
(22, 1, 1, '2018-04-27 11:17:00', '2018-04-27 11:17:00'),
(23, 1, 1, '2018-04-27 11:17:49', '2018-04-27 11:17:49'),
(24, 1, 1, '2018-04-27 11:18:06', '2018-04-27 11:18:06'),
(25, 1, 1, '2018-04-27 11:19:55', '2018-04-27 11:19:55'),
(26, 1, 1, '2018-04-27 11:23:12', '2018-04-27 11:23:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tbl_chi`
--
ALTER TABLE `tbl_chi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_chi_ten_chi_unique` (`ten_chi`);

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_chitietdonhang_donhang_id_foreign` (`donhang_id`),
  ADD KEY `tbl_chitietdonhang_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_chuongtrinhkhuyenmai`
--
ALTER TABLE `tbl_chuongtrinhkhuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_chuongtrinhkhuyenmai_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `tbl_chuongtrinhkhuyenmai_hinhthuckhuyenmai_id_foreign` (`hinhthuckhuyenmai_id`);

--
-- Chỉ mục cho bảng `tbl_dacdiem`
--
ALTER TABLE `tbl_dacdiem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_danhgia_nguoidung_id_foreign` (`nguoidung_id`),
  ADD KEY `tbl_danhgia_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_diachi`
--
ALTER TABLE `tbl_diachi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_diachi_phuongxa_id_foreign` (`phuongxa_id`);

--
-- Chỉ mục cho bảng `tbl_dongia`
--
ALTER TABLE `tbl_dongia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_dongia_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_donhang_nguoidung_id_foreign` (`nguoidung_id`),
  ADD KEY `tbl_donhang_diachi_id_foreign` (`diachi_id`);

--
-- Chỉ mục cho bảng `tbl_giaohang`
--
ALTER TABLE `tbl_giaohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_giaohang_chitietdonhang_id_foreign` (`chitietdonhang_id`);

--
-- Chỉ mục cho bảng `tbl_hinhanh`
--
ALTER TABLE `tbl_hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_hinhanh_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_hinhthuckhuyenmai`
--
ALTER TABLE `tbl_hinhthuckhuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_hinhthucuudai`
--
ALTER TABLE `tbl_hinhthucuudai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_hinhthucuudai_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `tbl_hinhthucuudai_uudai_id_foreign` (`uudai_id`);

--
-- Chỉ mục cho bảng `tbl_kho`
--
ALTER TABLE `tbl_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_kho_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_lienhe_nguoidung_id_foreign` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `tbl_loai`
--
ALTER TABLE `tbl_loai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_loai_ten_loai_unique` (`ten_loai`),
  ADD UNIQUE KEY `tbl_loai_ten_khoa_hoc_unique` (`ten_khoa_hoc`),
  ADD KEY `tbl_loai_chi_id_foreign` (`chi_id`),
  ADD KEY `tbl_loai_dacdiem_id_foreign` (`dacdiem_id`);

--
-- Chỉ mục cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_nguoidung_username_unique` (`username`),
  ADD KEY `tbl_nguoidung_nhom_id_foreign` (`nhom_id`),
  ADD KEY `tbl_nguoidung_thongtinlienhe_id_foreign` (`thongtinlienhe_id`);

--
-- Chỉ mục cho bảng `tbl_nhom`
--
ALTER TABLE `tbl_nhom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_nhom_ten_nhom_unique` (`ten_nhom`);

--
-- Chỉ mục cho bảng `tbl_phuongxa`
--
ALTER TABLE `tbl_phuongxa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_phuongxa_ten_phuong_xa_unique` (`ten_phuong_xa`),
  ADD KEY `tbl_phuongxa_quanhuyen_id_foreign` (`quanhuyen_id`);

--
-- Chỉ mục cho bảng `tbl_quanhuyen`
--
ALTER TABLE `tbl_quanhuyen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_quanhuyen_ten_quan_huyen_unique` (`ten_quan_huyen`),
  ADD KEY `tbl_quanhuyen_tinh_thanhpho_id_foreign` (`tinh_thanhpho_id`);

--
-- Chỉ mục cho bảng `tbl_quatang`
--
ALTER TABLE `tbl_quatang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_quatang_hinhthuckhuyenmai_id_foreign` (`hinhthuckhuyenmai_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sanpham_loai`
--
ALTER TABLE `tbl_sanpham_loai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_sanpham_loai_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `tbl_sanpham_loai_loai_id_foreign` (`loai_id`);

--
-- Chỉ mục cho bảng `tbl_thanhtoan`
--
ALTER TABLE `tbl_thanhtoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_thanhtoan_chitietdonhang_id_foreign` (`chitietdonhang_id`);

--
-- Chỉ mục cho bảng `tbl_thongtinlienhe`
--
ALTER TABLE `tbl_thongtinlienhe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_thongtinlienhe_diachi_id_foreign` (`diachi_id`);

--
-- Chỉ mục cho bảng `tbl_tinh_thanhpho`
--
ALTER TABLE `tbl_tinh_thanhpho`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_tinh_thanhpho_ten_tinh_thanhpho_unique` (`ten_tinh_thanhpho`);

--
-- Chỉ mục cho bảng `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_trangthai_donhang`
--
ALTER TABLE `tbl_trangthai_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_trangthai_donhang_trangthai_id_foreign` (`trangthai_id`),
  ADD KEY `tbl_trangthai_donhang_donhang_id_foreign` (`donhang_id`);

--
-- Chỉ mục cho bảng `tbl_uudai`
--
ALTER TABLE `tbl_uudai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_chi`
--
ALTER TABLE `tbl_chi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_chuongtrinhkhuyenmai`
--
ALTER TABLE `tbl_chuongtrinhkhuyenmai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_dacdiem`
--
ALTER TABLE `tbl_dacdiem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_diachi`
--
ALTER TABLE `tbl_diachi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_dongia`
--
ALTER TABLE `tbl_dongia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_giaohang`
--
ALTER TABLE `tbl_giaohang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_hinhanh`
--
ALTER TABLE `tbl_hinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_hinhthuckhuyenmai`
--
ALTER TABLE `tbl_hinhthuckhuyenmai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_hinhthucuudai`
--
ALTER TABLE `tbl_hinhthucuudai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_kho`
--
ALTER TABLE `tbl_kho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_loai`
--
ALTER TABLE `tbl_loai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_nhom`
--
ALTER TABLE `tbl_nhom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_phuongxa`
--
ALTER TABLE `tbl_phuongxa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_quanhuyen`
--
ALTER TABLE `tbl_quanhuyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_quatang`
--
ALTER TABLE `tbl_quatang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham_loai`
--
ALTER TABLE `tbl_sanpham_loai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_thanhtoan`
--
ALTER TABLE `tbl_thanhtoan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_thongtinlienhe`
--
ALTER TABLE `tbl_thongtinlienhe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_tinh_thanhpho`
--
ALTER TABLE `tbl_tinh_thanhpho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_trangthai_donhang`
--
ALTER TABLE `tbl_trangthai_donhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_uudai`
--
ALTER TABLE `tbl_uudai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD CONSTRAINT `tbl_chitietdonhang_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `tbl_donhang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_chitietdonhang_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chuongtrinhkhuyenmai`
--
ALTER TABLE `tbl_chuongtrinhkhuyenmai`
  ADD CONSTRAINT `tbl_chuongtrinhkhuyenmai_hinhthuckhuyenmai_id_foreign` FOREIGN KEY (`hinhthuckhuyenmai_id`) REFERENCES `tbl_hinhthuckhuyenmai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_chuongtrinhkhuyenmai_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD CONSTRAINT `tbl_danhgia_nguoidung_id_foreign` FOREIGN KEY (`nguoidung_id`) REFERENCES `tbl_nguoidung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_danhgia_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_diachi`
--
ALTER TABLE `tbl_diachi`
  ADD CONSTRAINT `tbl_diachi_phuongxa_id_foreign` FOREIGN KEY (`phuongxa_id`) REFERENCES `tbl_phuongxa` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_dongia`
--
ALTER TABLE `tbl_dongia`
  ADD CONSTRAINT `tbl_dongia_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `tbl_donhang_diachi_id_foreign` FOREIGN KEY (`diachi_id`) REFERENCES `tbl_diachi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_donhang_nguoidung_id_foreign` FOREIGN KEY (`nguoidung_id`) REFERENCES `tbl_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_giaohang`
--
ALTER TABLE `tbl_giaohang`
  ADD CONSTRAINT `tbl_giaohang_chitietdonhang_id_foreign` FOREIGN KEY (`chitietdonhang_id`) REFERENCES `tbl_chitietdonhang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_hinhanh`
--
ALTER TABLE `tbl_hinhanh`
  ADD CONSTRAINT `tbl_hinhanh_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_hinhthucuudai`
--
ALTER TABLE `tbl_hinhthucuudai`
  ADD CONSTRAINT `tbl_hinhthucuudai_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_hinhthucuudai_uudai_id_foreign` FOREIGN KEY (`uudai_id`) REFERENCES `tbl_uudai` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_kho`
--
ALTER TABLE `tbl_kho`
  ADD CONSTRAINT `tbl_kho_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD CONSTRAINT `tbl_lienhe_nguoidung_id_foreign` FOREIGN KEY (`nguoidung_id`) REFERENCES `tbl_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_loai`
--
ALTER TABLE `tbl_loai`
  ADD CONSTRAINT `tbl_loai_chi_id_foreign` FOREIGN KEY (`chi_id`) REFERENCES `tbl_chi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_loai_dacdiem_id_foreign` FOREIGN KEY (`dacdiem_id`) REFERENCES `tbl_dacdiem` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  ADD CONSTRAINT `tbl_nguoidung_nhom_id_foreign` FOREIGN KEY (`nhom_id`) REFERENCES `tbl_nhom` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_nguoidung_thongtinlienhe_id_foreign` FOREIGN KEY (`thongtinlienhe_id`) REFERENCES `tbl_thongtinlienhe` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phuongxa`
--
ALTER TABLE `tbl_phuongxa`
  ADD CONSTRAINT `tbl_phuongxa_quanhuyen_id_foreign` FOREIGN KEY (`quanhuyen_id`) REFERENCES `tbl_quanhuyen` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_quanhuyen`
--
ALTER TABLE `tbl_quanhuyen`
  ADD CONSTRAINT `tbl_quanhuyen_tinh_thanhpho_id_foreign` FOREIGN KEY (`tinh_thanhpho_id`) REFERENCES `tbl_tinh_thanhpho` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_quatang`
--
ALTER TABLE `tbl_quatang`
  ADD CONSTRAINT `tbl_quatang_hinhthuckhuyenmai_id_foreign` FOREIGN KEY (`hinhthuckhuyenmai_id`) REFERENCES `tbl_hinhthuckhuyenmai` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham_loai`
--
ALTER TABLE `tbl_sanpham_loai`
  ADD CONSTRAINT `tbl_sanpham_loai_loai_id_foreign` FOREIGN KEY (`loai_id`) REFERENCES `tbl_loai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_sanpham_loai_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_thanhtoan`
--
ALTER TABLE `tbl_thanhtoan`
  ADD CONSTRAINT `tbl_thanhtoan_chitietdonhang_id_foreign` FOREIGN KEY (`chitietdonhang_id`) REFERENCES `tbl_chitietdonhang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_thongtinlienhe`
--
ALTER TABLE `tbl_thongtinlienhe`
  ADD CONSTRAINT `tbl_thongtinlienhe_diachi_id_foreign` FOREIGN KEY (`diachi_id`) REFERENCES `tbl_diachi` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_trangthai_donhang`
--
ALTER TABLE `tbl_trangthai_donhang`
  ADD CONSTRAINT `tbl_trangthai_donhang_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `tbl_donhang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_trangthai_donhang_trangthai_id_foreign` FOREIGN KEY (`trangthai_id`) REFERENCES `tbl_trangthai` (`id`) ON DELETE CASCADE;
--
-- Cơ sở dữ liệu: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Đang đổ dữ liệu cho bảng `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-05-02 12:34:26', '{\"lang\":\"vi\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Chỉ mục cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Chỉ mục cho bảng `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Chỉ mục cho bảng `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Chỉ mục cho bảng `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Chỉ mục cho bảng `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Chỉ mục cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Chỉ mục cho bảng `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Chỉ mục cho bảng `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Chỉ mục cho bảng `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Chỉ mục cho bảng `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Cơ sở dữ liệu: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
