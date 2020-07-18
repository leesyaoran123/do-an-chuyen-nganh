-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 18, 2020 lúc 04:13 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123 Nguyễn Lương Bằng', 'admin@gmail.com', '123456', '0365797021', 1, 0, '', '2020-07-13 14:20:52', '2020-07-13 14:20:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `home` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sách dạy tiếng Anh', 'sach-day-tieng-anh', '', '', 1, 1, '2020-07-13 14:44:14', '2020-07-13 14:44:14'),
(2, 'Sách dạy tiếng Nhật', 'sach-day-tieng-nhat', '', '', 1, 1, '2020-07-13 14:46:48', '2020-07-13 14:46:48'),
(3, 'Sách dạy tiếng Hàn', 'sach-day-tieng-han', '', '', 1, 1, '2020-07-13 14:46:48', '2020-07-13 14:46:48'),
(4, 'Sách dạy tiếng Trung', 'sach-day-tieng-trung', '', '', 1, 1, '2020-07-13 14:48:53', '2020-07-13 14:48:53'),
(5, 'Sách dạy tiếng Pháp', 'sach-day-tieng-phap', '', '', 1, 1, '2020-07-13 14:49:48', '2020-07-13 14:49:48'),
(6, 'Sách dạy tiếng Đức', 'sach-day-tieng-duc', '', '', 1, 1, '2020-07-13 14:49:48', '2020-07-13 14:49:48'),
(7, 'Sách dạy tiếng Việt', 'sach-day-tieng-viet', '', '', 0, 0, '2020-07-17 08:14:44', '2020-07-17 08:14:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale` tinyint(4) NOT NULL,
  `thunbar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `head` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `hot` tinyint(4) NOT NULL,
  `pay` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `hot`, `pay`, `created_at`, `updated_at`) VALUES
(1, 'Cambridge Ielts 14 Academic With Answers (Savina)', 'cambridge-ielts-14-academic-with-answers-savina', 140000, 0, 'sach-tieng-anh1.jpg', 1, 'Mã hàng	9781108811507\r\nTên Nhà Cung Cấp	Cty Sách VN\r\nTác giả	Cambridge\r\nNXB	NXB Cambridge University\r\nNăm XB	2019\r\nTrọng lượng (gr)	200\r\nKích thước	19 x 24 cm\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Anh bán chạy của tháng\r\nCambridge IELTS 14 – Cuốn sách thứ 14 trong bộ sách huyền thoại\r\n', 100, 1, 1000, 1, 0, '2020-07-13 15:02:21', '2020-07-13 15:02:21'),
(2, 'Giải Thích Ngữ Pháp Tiếng Anh Với Bài Tập Và Đáp Án (Tái Bản 2020)', 'giai-thich-ngu-phap-tieng-anh-voi-bai-tap-va-dap-an-tai-ban-2020', 180000, 0, 'sach-tieng-anh2.jpg', 1, 'Mã hàng	8794069302190\r\nTên Nhà Cung Cấp	ZenBooks\r\nTác giả	Mai Lan Hương, Hà Thanh UYên\r\nNXB	NXB Đà Nẵng\r\nNăm XB	2020\r\nTrọng lượng (gr)	550\r\nKích thước	24 x 17 cm\r\nSố trang	560\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nZenBooks\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Anh bán chạy của tháng', 99, 0, 500, 0, 0, '2020-07-13 15:16:38', '2020-07-13 15:16:38'),
(3, '25 Chuyên Đề Ngữ Pháp Tiếng Anh Trọng Tâm - Tập 1', '25-chuyen-de-ngu-phap-tieng-anh-trong-tam---tap-1', 110000, 0, 'sach-tieng-anh3.jpg', 1, 'Mã hàng	8935095626632\r\nTên Nhà Cung Cấp	Huy Hoang Bookstore\r\nTác giả	Trang Anh\r\nNXB	NXB Đại Học Sư Phạm\r\nNăm XB	2018\r\nTrọng lượng (gr)	607\r\nKích thước	19 x 26.5\r\nSố trang	298\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nHuy Hoang Bookstore\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Anh bán chạy của tháng', 25, 0, 0, 0, 0, '2020-07-13 15:22:21', '2020-07-13 15:22:21'),
(4, '28 Ngày Tự Học Tiếng Nhật - Ghi Chú Luyện Viết - Sách Bài Tập', '28-ngay-tu-hoc-tieng-nhat---ghi-chu-luyen-viet---sach-bai-tap', 94000, 0, 'sach-tieng-nhat1.jpg', 2, 'Mã hàng	8935246928851\r\nTên Nhà Cung Cấp	MCBooks\r\nTác giả	The Sakura\r\nNXB	NXB Hồng Đức\r\nNăm XB	2019\r\nTrọng lượng (gr)	150\r\nKích thước	18.3 x 26 cm\r\nSố trang	122\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nMCBooks\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Nhật bán chạy của tháng', 68, 0, 0, 0, 0, '2020-07-13 15:38:06', '2020-07-13 15:38:06'),
(5, 'Luyện Thi Năng Lực Nhật Ngữ N5: Hán Tự, Từ Vựng, Ngữ Pháp, Đọc Hiểu, Nghe Hiểu', 'luyen-thi-nang-luc-nhat-ngu-n5-han-tu-tu-vung-ngu-phap-doc-hieu-nghe-hieu', 65000, 0, 'sach-tieng-nhat2.jpg', 2, 'Mã hàng	8934974164364\r\nTên Nhà Cung Cấp	NXB Trẻ\r\nTác giả	SASAKI HITOKO & MATSUMOTO NORIKO\r\nNXB	NXB Trẻ\r\nNăm XB	2019\r\nTrọng lượng (gr)	150\r\nKích thước	19 x 26 cm\r\nSố trang	132\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nNXB Trẻ\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Nhật bán chạy của tháng', 75, 0, 0, 0, 0, '2020-07-13 15:38:06', '2020-07-13 15:38:06'),
(6, 'Tập Viết Tiếng Nhật Căn Bản Katakana (Tái Bản 2018)', 'tap-viet-tieng-nhat-can-ban-katakana-tai-ban-2018', 44000, 0, 'sach-tieng-nhat3.jpg', 2, 'Mã hàng	8935236413343\r\nTên Nhà Cung Cấp	Nhà Sách Minh Thắng\r\nTác giả	Mai Ngọc (chủ biên)\r\nNXB	NXB Đại Học Quốc Gia Hà Nội\r\nNăm XB	2018\r\nTrọng lượng (gr)	140\r\nKích thước	19 x 27\r\nSố trang	120\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nNhà Sách Minh Thắng\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Nhật bán chạy của tháng', 75, 0, 0, 0, 0, '2020-07-13 15:38:06', '2020-07-13 15:38:06'),
(7, 'Ngữ Pháp Tiếng Hàn Thông Dụng - Cao Cấp', 'ngu-phap-tieng-han-thong-dung---cao-cap', 285000, 0, 'sach-tieng-han1.jpg', 3, 'Mã hàng	8935246917626\r\n\r\nTên Nhà Cung Cấp	MCBooks\r\n\r\nTác giả	Nhiều tác giả\r\n\r\nNgười Dịch	Lê Vân Anh\r\n\r\nNXB	NXB Hồng Đức\r\n\r\nNăm XB	2019\r\n\r\nTrọng lượng (gr)	420\r\n\r\nKích thước	14.5 x 20.5\r\n\r\nSố trang	408\r\n\r\nHình thức	Bìa Mềm\r\n\r\nSản phẩm hiển thị trong	\r\n\r\nMCBooks\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Hàn bán chạy của tháng', 75, 0, 0, 0, 0, '2020-07-16 14:37:15', '2020-07-16 14:37:15'),
(8, 'Tự Học Giao Tiếp Tiếng Hàn Cấp Tốc', 'tu-hoc-giao-tiep-tieng-han-cap-toc', 50000, 0, 'sach-tieng-han2.jpg', 3, 'Mã hàng	8935092555805\r\nTên Nhà Cung Cấp	Cty Văn Hóa Khang Việt\r\nTác giả	Thu Trang\r\nNXB	NXB Dân Trí\r\nNăm XB	2019\r\nTrọng lượng (gr)	120\r\nKích thước	19 x 13 cm\r\nSố trang	109\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Hàn bán chạy của tháng', 75, 0, 0, 0, 0, '2020-07-16 14:37:15', '2020-07-16 14:37:15'),
(9, 'Luyện Nghe Tiếng Hàn Dành Cho Người Mới Bắt Đầu', 'luyen-nghe-tieng-han-danh-cho-nguoi-moi-bat-dau', 95000, 0, 'sach-tieng-han3.jpg', 3, 'Mã hàng	8935246921456\r\nTên Nhà Cung Cấp	MCBooks\r\nTác giả	Nhiều Tác Giả\r\nNXB	NXB Hồng Đức\r\nNăm XB	2019\r\nTrọng lượng (gr)	150\r\nKích thước	17 x 24\r\nSố trang	140\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nMCBooks\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Hàn bán chạy của tháng', 23, 0, 0, 0, 0, '2020-07-16 14:37:15', '2020-07-16 14:37:15'),
(10, '301 Câu Đàm Thoại Tiếng Hoa', '301-cau-dam-thoai-tieng-hoa', 50000, 0, 'sach-tieng-trung1.jpg', 4, 'Mã hàng	9786049567094\r\nTên Nhà Cung Cấp	Công ty TNHH Giáo Dục Hải Hà\r\nTác giả	Trương Văn Giới, Lê khắc Kiều Lục\r\nNXB	NXB Khoa Học Xã Hội\r\nNăm XB	2019\r\nTrọng lượng (gr)	400\r\nKích thước	14.5 x 20.5 cm\r\nSố trang	398\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Hoa bán chạy của tháng', 34, 0, 0, 0, 0, '2020-07-16 14:46:57', '2020-07-16 14:46:57'),
(11, 'Tự Học Tiêng Trung Dành Cho Người Việt', 'tu-hoc-tieng-trung-danh-cho-nguoi-viet', 89000, 0, 'sach-tieng-trung2.jpg', 4, 'Mã hàng	8935246911815\r\nTên Nhà Cung Cấp	MCBooks\r\nTác giả	Lê Văn Quang\r\nNXB	NXB Hồng Đức\r\nNăm XB	2018\r\nTrọng lượng (gr)	300\r\nKích thước	14.5 x 20.5\r\nSố trang	276\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nMCBooks\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Hoa bán chạy của tháng', 65, 0, 0, 0, 0, '2020-07-16 14:46:57', '2020-07-16 14:46:57'),
(12, '10 Phút Tự Học Tiếng Trung Mỗi Ngày', '10-phut-tu-hoc-tieng-trung-moi-ngay', 85000, 0, 'sach-tieng-trung3.jpg', 4, 'Mã hàng	8935246927717\r\nTên Nhà Cung Cấp	MCBooks\r\nTác giả	The Zhishi\r\nNgười Dịch	Phương Lan\r\nNXB	NXB Hồng Đức\r\nNăm XB	2019\r\nTrọng lượng (gr)	200\r\nKích thước	14.5 x 20.5\r\nSố trang	199\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nMCBooks\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Hoa bán chạy của tháng', 67, 0, 0, 0, 0, '2020-07-16 14:46:57', '2020-07-16 14:46:57'),
(13, 'Ngữ Pháp Tiếng Pháp Căn Bản', 'ngu-phap-tieng-phap-can-ban', 120000, 0, 'sach-tieng-phap1.jpg', 5, 'Mã hàng	8935072950507\r\nTên Nhà Cung Cấp	Cty Văn Hóa Nhân Văn\r\nTác giả	Nhiều Tác Giả\r\nNXB	NXB Đại Học Sư Phạm\r\nNăm XB	2019\r\nTrọng lượng (gr)	320\r\nKích thước	19 x 27 cm\r\nSố trang	179\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Pháp bán chạy của tháng', 45, 0, 0, 0, 0, '2020-07-16 14:55:21', '2020-07-16 14:55:21'),
(14, 'Từ Ngữ Tiếng Pháp Thông Dụng Theo Chủ Đề', 'tu-ngu-tieng-phap-thong-dung-theo-chu-de', 58000, 0, 'sach-tieng-phap2.jpg', 5, 'Mã hàng	8935072952006\r\nTên Nhà Cung Cấp	Cty Văn Hóa Nhân Văn\r\nTác giả	Lê Minh Cẩn\r\nNXB	NXB Thanh Hóa\r\nNăm XB	2019\r\nTrọng lượng (gr)	180\r\nKích thước	21 x 15 cm\r\nSố trang	162\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Pháp bán chạy của tháng', 36, 0, 0, 0, 0, '2020-07-16 14:55:21', '2020-07-16 14:55:21'),
(15, '100 Từ Pháp - Việt Đầu Tiền', '100-tu-phap---viet-dau-tien', 49000, 0, 'sach-tieng-phap3.jpg', 5, 'Mã hàng	9786045641088\r\nTên Nhà Cung Cấp	Phụ Nữ\r\nTác giả	Heather Amery\r\nNgười Dịch	Ngọc Mai\r\nNXB	NXB Phụ Nữ\r\nNăm XB	2017\r\nTrọng lượng (gr)	176\r\nKích thước	21.5 x 27.5\r\nSố trang	29\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Pháp bán chạy của tháng', 23, 0, 0, 0, 0, '2020-07-16 14:55:21', '2020-07-16 14:55:21'),
(16, 'Pons Tự Học Tiếng Đức Qua Hình', 'pons-tu-hoc-tieng-duc-qua-hinh', 318000, 0, 'sach-tieng-duc1.jpg', 6, 'Mã hàng	9786045897355\r\nTên Nhà Cung Cấp	Cty Nhân Trí Việt\r\nTác giả	PONS\r\nNXB	NXB Tổng Hợp TPHCM\r\nNăm XB	2019\r\nTrọng lượng (gr)	500\r\nKích thước	13.8 x 16.6 cm\r\nSố trang	448\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Đức bán chạy của tháng', 76, 0, 0, 0, 0, '2020-07-16 14:59:00', '2020-07-16 14:59:00'),
(17, 'Tiếng Đức Dành Cho Người Việt', 'tieng-duc-danh-cho-nguoi-viet', 80000, 0, 'sach-tieng-duc2.jpg', 6, 'Mã hàng	8936254088353\r\nTên Nhà Cung Cấp	Cty Văn Hóa Gia Vũ\r\nTác giả	Nguyễn Văn Tuấn , Trương Văn Hùng\r\nNXB	Hồng Đức\r\nNăm XB	06/2015\r\nTrọng lượng (gr)	360\r\nKích thước	14.5x20.5\r\nSố trang	400\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Đức bán chạy của tháng', 74, 0, 0, 0, 0, '2020-07-16 14:59:00', '2020-07-16 14:59:00'),
(18, 'Các Từ Loại Tiếng Đức', 'cac-tu-loai-tieng-duc', 40000, 0, 'sach-tieng-duc3.jpg', 6, 'Mã hàng	9786049653285\r\nTên Nhà Cung Cấp	Cty Văn Hóa Gia Vũ\r\nTác giả	Dương Đình Bá\r\nNXB	NXB Đại học Cần Thơ\r\nNăm XB	2020\r\nTrọng lượng (gr)	153\r\nKích thước	20.5 x 14.5 x 1 cm\r\nSố trang	152\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiếng Đức bán chạy của tháng', 34, 0, 0, 0, 0, '2020-07-16 14:59:00', '2020-07-16 14:59:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(0, 574200, 1, 1, 'đà nẵng', '2020-07-16 15:03:44', '2020-07-16 15:03:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `password`, `avatar`, `status`, `token`, `phone`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Ngọc Cường', 'admin@gmail.com', 'Đà Nẵng', '123456', '', '', '', '0365797022', '', '2020-07-16 15:02:31', '2020-07-16 15:02:31'),
(2, 'Cường', 'cuong1710@gmail.com', 'Thanh Hóa', '123456', '', '', '', '0321654987', '', '2020-07-17 13:17:24', '2020-07-17 13:17:24'),
(3, 'Ngọc', 'ngoc1710@gmail.com', 'Huế', '123465', '', '', '', '987654321', '', '2020-07-17 13:17:24', '2020-07-17 13:17:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_contact`
--

CREATE TABLE `user_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
