-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2022 lúc 06:54 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attrs`
--

CREATE TABLE `attrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attrs`
--

INSERT INTO `attrs` (`id`, `name`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Màu', '2022-03-16 22:43:44', '2022-03-16 22:43:44', 3),
(7, 'Size', '2022-03-16 23:11:40', '2022-03-16 23:11:40', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attr_values`
--

CREATE TABLE `attr_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_attr` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attr_values`
--

INSERT INTO `attr_values` (`id`, `value`, `id_attr`, `created_at`, `updated_at`) VALUES
(1, '#622828', 1, '2022-03-16 23:06:57', '2022-03-16 23:06:57'),
(2, '#000000', 1, '2022-03-16 23:06:57', '2022-03-16 23:06:57'),
(3, '#6b3333', 1, '2022-03-16 23:06:57', '2022-03-16 23:06:57'),
(4, '29', 7, '2022-03-16 23:12:35', '2022-03-16 23:12:35'),
(5, '30', 7, '2022-03-16 23:12:36', '2022-03-16 23:12:36'),
(6, '33', 7, '2022-03-16 23:12:36', '2022-03-16 23:12:36'),
(7, '32', 7, '2022-03-16 23:12:36', '2022-03-16 23:12:36'),
(12, '31', 7, '2022-03-19 23:02:19', '2022-03-19 23:02:19'),
(16, '23', 7, '2022-03-29 04:41:09', '2022-03-29 04:41:09'),
(17, '24', 7, '2022-03-29 04:41:09', '2022-03-29 04:41:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `banner_img`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'Best Girl 2022', 'mO2UyPT2vWJhkIvPMOJIIImMjDtcW0m7EF8weoaQ.jpg', '0%', '2022-04-29 03:18:04', '2022-04-29 03:20:03'),
(2, 'Best Girl 2021', 'RZbtlAEKO0XW45M09G5qwXDwPANo7swaM3pr4Iwc.jpg', 'Hết Hàng', '2022-04-29 03:23:44', '2022-04-29 03:23:44'),
(3, 'tets', 'jd26X5Vk8cthDlGDc2xkBpTM45EcUeIVBZ627huX.jpg', 'dsadsa', '2022-04-29 03:25:04', '2022-04-29 03:42:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_author_id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_view` int(11) NOT NULL DEFAULT 0,
  `blog_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `blog_author_id`, `blog_title`, `blog_image`, `blog_summary`, `blog_content`, `blog_view`, `blog_status`, `created_at`, `updated_at`) VALUES
(1, 9, '5 LƯU Ý CẦN QUAN TÂM KHI PHỐI ĐỒ VỚI ÁO HOODIE', 'lPk8fB5YaIB9W87opBdEnjpcgaQJ1m58VBK3usiE.jpg', 'Áo hoodie là món đồ quen thuộc, được đánh giá là “item đỉnh” cần có trong các tủ của hầu hết mọi người. Nó được ưa chuộng vào thời điểm đầu đông, khi thời tiết đã trở nên lạnh hơn.', '<h3>1. &Aacute;o Hoodie trơn phối với quần d&aacute;ng thụng</h3>\r\n\r\n<p>Quần d&aacute;ng thụng v&agrave; &aacute;o kho&aacute;c hoodie trơn tưởng chừng như kh&ocirc;ng ăn nhập g&igrave; với nhau, nhưng lại cho ra một kết quả ngo&agrave;i cả mong đợi.</p>\r\n\r\n<p>Nếu l&agrave; một t&iacute;n đồ của thời trang đường phố, hẳn l&agrave; bạn kh&ocirc;ng lạ với mẹo phối đồ n&agrave;y. Ch&uacute;ng được lăng x&ecirc; bởi nhiều&nbsp;<strong><a href=\"https://en.wikipedia.org/wiki/Fashionista\" target=\"_blank\">Fashionista</a></strong>, đặc biệt nhiều nhất l&agrave; ở c&aacute;c Rapper đ&igrave;nh đ&aacute;m.</p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-3.jpg\"><img alt=\"phối đồ với hoodie\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-3.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-3.jpg 1080w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-3-320x400.jpg 320w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-3-640x800.jpg 640w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-3-768x960.jpg 768w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-3-370x463.jpg 370w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-3-765x956.jpg 765w\" width=\"1000\" /></a></p>\r\n\r\n<p>Ngo&agrave;i ra, c&oacute; một b&iacute; k&iacute;p mix đồ rất độc đ&aacute;o về &aacute;o hoodie đ&oacute; l&agrave;&nbsp;<strong><a href=\"https://bumshop.com.vn/phoi-do-phong-cach-layer/\">mặc theo layer</a></strong>: mặc b&ecirc;n trong &aacute;o hoodie trơn, kho&aacute;c b&ecirc;n ngo&agrave;i l&agrave; một chiếc &aacute;o hoodie nữa nhưng tay cộc v&agrave; b&ecirc;n dưới l&agrave; quần d&aacute;ng thụng.</p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-5.jpg\"><img alt=\"phối đồ với hoodie\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-5.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-5.jpg 720w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-5-300x400.jpg 300w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-5-600x800.jpg 600w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-5-370x493.jpg 370w\" width=\"1000\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>2. Hoodie họa tiết + quần jogger đen/quần jean kaki</h3>\r\n\r\n<p>Những ai th&iacute;ch ăn mặc cầu kỳ, nổi bật c&oacute; thể tham khảo b&iacute; quyết: &aacute;o hoodie hoạ tiết,&nbsp;<strong><a href=\"https://bumshop.com.vn/sp/quan-jogger-thun-nam-qt08/\">quần jogger đen</a></strong>&nbsp;hoặc quần jean kaki.</p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4.jpg\"><img alt=\"phối đồ với hoodie nam\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4-800x800.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4-800x800.jpg 800w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4-400x400.jpg 400w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4-280x280.jpg 280w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4-768x768.jpg 768w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4-370x370.jpg 370w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4-765x765.jpg 765w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4-100x100.jpg 100w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-4.jpg 960w\" width=\"1000\" /></a></p>\r\n\r\n<p>Sự kết hợp tr&ecirc;n tuy kh&ocirc;ng qu&aacute; mới mẻ nhưng vẫn tạo n&eacute;t trendy. Nhất l&agrave; khi &aacute;o hoodie đang ng&agrave;y c&agrave;ng c&oacute; nhiều mẫu m&atilde;, chi tiết kh&aacute;c nhau.</p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6.jpg\"><img alt=\"phối đồ với hoodie nam\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6-800x800.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6-800x800.jpg 800w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6-400x400.jpg 400w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6-280x280.jpg 280w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6-768x768.jpg 768w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6-370x370.jpg 370w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6-765x765.jpg 765w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6-100x100.jpg 100w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-6.jpg 1000w\" width=\"1000\" /></a></p>\r\n\r\n<p><strong>Lưu &yacute;</strong>&nbsp;của c&aacute;ch phối n&agrave;y l&agrave; &aacute;o c&oacute; thể nhiều họa tiết, nhưng chỉ n&ecirc;n sử dụng mẫu&nbsp;<strong>quần đơn giản</strong>&nbsp;để tr&aacute;nh bị rườm r&agrave; rối mắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>3. &Aacute;o Hoodie in + quần d&agrave;i/ngắn</h3>\r\n\r\n<p>Mỗi ch&agrave;ng trai đều sưu tập cho m&igrave;nh &iacute;t nhất một chiếc &aacute;o hoodie in, phổ biến như vậy cũng đồng nghĩa với việc c&oacute; h&agrave;ng loạt&nbsp;<strong>c&aacute;ch&nbsp;</strong><strong>phối đồ với hoodie</strong>&nbsp;in.</p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7.jpg\"><img alt=\"phối đồ với hoodie nam\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7.jpg 800w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7-400x400.jpg 400w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7-280x280.jpg 280w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7-768x768.jpg 768w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7-370x370.jpg 370w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7-765x765.jpg 765w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-hoodie-7-100x100.jpg 100w\" width=\"1000\" /></a></p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11.jpg\"><img alt=\"18+ Cách Phối Đồ Với Áo Hoodie Nam Nữ Đẹp &quot;Hết Nước Chấm&quot;\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11.jpg 1000w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11-400x400.jpg 400w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11-800x800.jpg 800w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11-280x280.jpg 280w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11-768x768.jpg 768w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11-370x370.jpg 370w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11-765x765.jpg 765w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-xxme-dep-11-100x100.jpg 100w\" width=\"1000\" /></a></p>\r\n\r\n<p><strong>Mẫu Hoodie của&nbsp;<a href=\"https://bumshop.com.vn/local-brand-viet-nam/\">local brand Việt Nam</a>&nbsp;XXME&nbsp;</strong></p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble.jpg\"><img alt=\"18+ Cách Phối Đồ Với Áo Hoodie Nam Nữ Đẹp &quot;Hết Nước Chấm&quot;\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble.jpg 1080w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble-400x400.jpg 400w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble-800x800.jpg 800w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble-280x280.jpg 280w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble-768x768.jpg 768w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble-370x370.jpg 370w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble-765x765.jpg 765w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-hoodie-local-brand-nam-nu-gamble-100x100.jpg 100w\" width=\"1000\" /></a></p>\r\n\r\n<p>Với những ai y&ecirc;u th&iacute;ch mẫu &aacute;o n&agrave;y, d&ugrave; chọn mix với quần d&agrave;i hay&nbsp;<strong><a href=\"https://bumshop.com.vn/shop-ban-quan-short-nam-dep/\">quần short nam</a></strong>&nbsp;đều vẫn được.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; phong&nbsp;<strong>c&aacute;ch phối đồ với &aacute;o hoodie nam</strong>&nbsp;giản dị nhưng vẫn s&agrave;nh điệu d&agrave;nh cho c&aacute;c ch&agrave;ng trai.</p>\r\n\r\n<h3>4. Hoodie kh&oacute;a zip + quần jogger thun</h3>\r\n\r\n<p><strong>C&aacute;ch phối đồ với &aacute;o hoodie nam</strong>&nbsp;kh&oacute;a zip k&egrave;m&nbsp;<strong><a href=\"https://bumshop.com.vn/quan/quan-jogger/quan-jogger-thun\">quần jogger thun</a></strong>&nbsp;l&agrave; c&ocirc;ng thức mang t&iacute;nh thể thao, năng động m&agrave; bạn kh&ocirc;ng n&ecirc;n bỏ lỡ.</p>\r\n\r\n<p>Combo n&agrave;y rất th&iacute;ch hợp để mặc khi bạn đang c&oacute; những hoạt động như: tham gia thể thao, chạy bộ, vận động ngo&agrave;i trời,&hellip;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam.jpg\"><img alt=\"18+ Cách Phối Đồ Với Áo Hoodie Nam Nữ Đẹp &quot;Hết Nước Chấm&quot;\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam.jpg 960w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam-400x400.jpg 400w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam-800x800.jpg 800w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam-280x280.jpg 280w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam-768x768.jpg 768w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam-370x370.jpg 370w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam-765x765.jpg 765w, https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-nam-100x100.jpg 100w\" width=\"1000\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Do &aacute;o c&oacute; phần kh&oacute;a zip n&ecirc;n người mặc sẽ dễ cởi ra hơn khi thấy kh&oacute; chịu hay đổ mồ h&ocirc;i, điều đ&oacute; đ&atilde; chứng tỏ được t&iacute;nh linh hoạt trong khi sử dụng của bộ đ&ocirc;i n&agrave;y.</p>\r\n\r\n<h3>5. Hoodie kh&ocirc;ng n&oacute;n + quần kaki/quần ống su&ocirc;ng</h3>\r\n\r\n<p>Trong những ng&agrave;y v&agrave;o đầu thu, khi kh&iacute; hậu c&ograve;n đang ấm.&nbsp;<strong>Phối đồ với hoodie&nbsp;</strong>kh&ocirc;ng n&oacute;n c&ugrave;ng quần kaki l&agrave; một &yacute; tưởng kh&ocirc;ng tồi. Kiểu &aacute;o n&agrave;y tạo sự dễ chịu cho người mặc khi kh&ocirc;ng c&ograve;n phần n&oacute;n nặng ở ph&iacute;a sau, c&ograve;n bản chất của kaki lại mang t&iacute;nh lịch sự, c&oacute; ch&uacute;t bụi bặm.</p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-khong-non.jpg\"><img alt=\"18+ Cách Phối Đồ Với Áo Hoodie Nam Nữ Đẹp &quot;Hết Nước Chấm&quot;\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/phoi-do-voi-ao-hoodie-khong-non.jpg\" width=\"1000\" /></a></p>\r\n\r\n<p><strong>&Aacute;o hoodie kh&ocirc;ng n&oacute;n kết hợp c&ugrave;ng jean r&aacute;ch gối v&agrave;&nbsp;<a href=\"https://bumshop.com.vn/phoi-do-voi-giay-vans/\">gi&agrave;y vans</a></strong></p>\r\n\r\n<p><a href=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11.jpg\"><img alt=\"18+ Cách Phối Đồ Với Áo Hoodie Nam Nữ Đẹp &quot;Hết Nước Chấm&quot;\" sizes=\"(max-width: 1000px) 100vw, 1000px\" src=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11.jpg\" srcset=\"https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11.jpg 1000w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11-400x400.jpg 400w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11-800x800.jpg 800w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11-280x280.jpg 280w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11-768x768.jpg 768w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11-370x370.jpg 370w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11-765x765.jpg 765w, https://bumshop.com.vn/wp-content/uploads/2021/07/ao-khoac-sweater-local-brand-tsun-cap-dep-11-100x100.jpg 100w\" width=\"1000\" /></a></p>', 0, 1, '2022-05-10 07:56:06', '2022-05-10 07:56:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(18, 'SWE', '2022-05-04 02:16:40', '2022-05-04 02:16:40', 1),
(19, 'Hanoi Riot', '2022-05-04 02:17:57', '2022-05-04 02:17:57', 1),
(20, 'ONTOP', '2022-05-04 02:18:03', '2022-05-04 02:18:03', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `status`, `created_at`, `updated_at`, `order_name`, `order_email`, `order_phone`, `order_address`, `order_note`) VALUES
(32, 20, 4, '2022-05-04 03:12:01', '2022-05-04 03:18:24', 'user111', 'user111@gmail.com', '1234567899', '18N05, Khu tái định cư Triều Khúc check', NULL),
(54, 12, 1, '2022-05-06 06:09:48', '2022-05-06 06:09:48', 'Nguyễn Thị Hà Vi', 'viviha@gmail.com', '0923015016', '18N05, Khu tái định cư Triều Khúc', NULL),
(65, 9, 4, '2022-05-10 07:26:08', '2022-05-10 07:28:14', 'Cung Hùng', 'demaon2010@gmail.com', '0923019015', '18N05, Khu tái định cư Triều Khúc', 'Hàng dễ vỡ'),
(66, 9, 2, '2022-05-10 07:35:46', '2022-05-10 07:36:34', 'Đức Anh', 'truongnghia620@gmail.com', '0123456654', 'Chi Lăng Lạng Sơn', 'da thanh toan momo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_id`, `product_id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(77, 32, 42, 1, 100000, '2022-05-04 03:12:01', '2022-05-04 03:12:01'),
(78, 32, 55, 1, 189000, '2022-05-04 03:12:11', '2022-05-04 03:12:11'),
(79, 32, 61, 3, 185000, '2022-05-04 03:12:13', '2022-05-04 03:12:19'),
(83, 34, 43, 3, 110000, '2022-05-04 07:15:54', '2022-05-04 07:31:41'),
(84, 34, 45, 1, 120000, '2022-05-04 07:15:56', '2022-05-04 07:15:56'),
(85, 35, 45, 2, 120000, '2022-05-04 07:51:20', '2022-05-04 07:51:34'),
(86, 35, 43, 1, 110000, '2022-05-04 07:51:23', '2022-05-04 07:51:23'),
(88, 36, 43, 8, 110000, '2022-05-05 16:12:27', '2022-05-05 16:12:32'),
(89, 37, 43, 8, 110000, '2022-05-05 16:20:47', '2022-05-05 16:21:07'),
(90, 38, 43, 7, 110000, '2022-05-05 16:23:55', '2022-05-05 16:27:21'),
(91, 39, 42, 3, 100000, '2022-05-05 17:21:56', '2022-05-05 17:22:00'),
(92, 47, 49, 1, 105000, '2022-05-05 21:07:41', '2022-05-05 21:07:41'),
(93, 48, 48, 2, 160000, '2022-05-06 03:55:57', '2022-05-06 03:56:04'),
(94, 49, 48, 1, 160000, '2022-05-06 03:58:42', '2022-05-06 03:58:42'),
(96, 50, 46, 1, 150000, '2022-05-06 04:08:21', '2022-05-06 04:08:21'),
(97, 51, 45, 1, 120000, '2022-05-06 04:16:34', '2022-05-06 04:16:34'),
(98, 52, 47, 2, 150000, '2022-05-06 04:20:03', '2022-05-06 04:20:08'),
(99, 53, 48, 2, 160000, '2022-05-06 05:59:10', '2022-05-06 05:59:50'),
(100, 54, 47, 4, 600000, '2022-05-06 06:09:48', '2022-05-06 06:09:54'),
(101, 55, 45, 4, 120000, '2022-05-09 23:19:42', '2022-05-09 23:20:06'),
(103, 56, 45, 2, 120000, '2022-05-09 23:32:22', '2022-05-09 23:32:27'),
(104, 57, 45, 1, 120000, '2022-05-10 00:38:00', '2022-05-10 00:38:00'),
(105, 58, 48, 1, 160000, '2022-05-10 01:06:55', '2022-05-10 01:06:55'),
(108, 59, 42, 2, 200000, '2022-05-10 01:23:49', '2022-05-10 02:28:32'),
(109, 60, 42, 1, 200000, '2022-05-10 02:31:46', '2022-05-10 03:41:20'),
(111, 62, 42, 1, 100000, '2022-05-10 06:45:48', '2022-05-10 06:45:48'),
(112, 63, 45, 1, 120000, '2022-05-10 07:23:23', '2022-05-10 07:23:23'),
(113, 64, 46, 1, 150000, '2022-05-10 07:24:05', '2022-05-10 07:24:05'),
(114, 65, 46, 1, 150000, '2022-05-10 07:26:08', '2022-05-10 07:26:08'),
(115, 66, 47, 1, 150000, '2022-05-10 07:35:46', '2022-05-10 07:35:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Áo', 1, '2022-03-20 04:36:36', '2022-04-27 07:11:13'),
(8, 'Quần', 1, '2022-03-20 07:01:25', '2022-04-27 07:11:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 49, 9, 'noooooo', '2022-05-05 21:08:19', '2022-05-05 21:08:19'),
(2, 49, 9, 'noooooo', '2022-05-05 21:10:19', '2022-05-05 21:10:19'),
(15, 45, 12, 'đm thằng demaon', '2022-05-05 22:26:53', '2022-05-05 22:26:53'),
(16, 45, 12, 'đm thằng cung hùng', '2022-05-05 22:27:00', '2022-05-05 22:27:00'),
(17, 49, 12, 'abc', '2022-05-06 02:05:21', '2022-05-06 02:05:21'),
(20, 45, 9, 'nb', '2022-05-09 23:19:54', '2022-05-09 23:19:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_products`
--

CREATE TABLE `img_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `img_products`
--

INSERT INTO `img_products` (`id`, `child_img`, `product_id`, `created_at`, `updated_at`) VALUES
(42, 'jZZgzjvbGsCr8rulZOLop6OzoIy5UvnMzx5izZXT.jpg', 42, '2022-05-04 02:19:46', '2022-05-04 02:19:46'),
(43, 'f5mKaKc0QsLwVZRPe0nL2ASBcT17W5Ya8JSmxJ7V.jpg', 42, '2022-05-04 02:19:46', '2022-05-04 02:19:46'),
(44, 'jZTs3CQF64qTCqIlktq8VhF05kmjpu9ItwxnYR0X.jpg', 42, '2022-05-04 02:19:47', '2022-05-04 02:19:47'),
(45, 'ep66J7lvzWdJouUK5o4i7EUPjx6SgxxbkxSfoRdo.webp', 43, '2022-05-04 02:21:33', '2022-05-04 02:21:33'),
(46, 'QdqPhLGCrKoL3hfDwSuztO60U8SVBY4C3X2Yn3bD.webp', 43, '2022-05-04 02:21:33', '2022-05-04 02:21:33'),
(47, 'BHjErk0FGX9aa84Cp1Kv4pmwGQmWcIGo0kZWpHG4.webp', 43, '2022-05-04 02:21:33', '2022-05-04 02:21:33'),
(48, 'it93td6BeeNDxUMBdHDUTlCaxpa5vWwkLEnnipUV.webp', 43, '2022-05-04 02:21:33', '2022-05-04 02:21:33'),
(49, 'V20ItsiSefVW1gfo3iOT9Oj68iUnjTuIaunGBprV.webp', 45, '2022-05-04 02:39:01', '2022-05-04 02:39:01'),
(50, 'qelQy6OFfLEPzLjq7yJtUC6ZXnfZLNu6fPhH8bBD.webp', 45, '2022-05-04 02:39:01', '2022-05-04 02:39:01'),
(51, '9d9lER2ZEyJ4dylxaO4q40MNrdzbUltfPsSp0GMr.webp', 45, '2022-05-04 02:39:01', '2022-05-04 02:39:01'),
(52, 'DGqAVOYjIbK4bNsUKdEUAAZl8jnjUZxvc04YfKP1.webp', 46, '2022-05-04 02:40:36', '2022-05-04 02:40:36'),
(53, 'RduzE7CnPxpxUIbs1KFg9qW5eFwF3630LWUyUsG3.webp', 46, '2022-05-04 02:40:36', '2022-05-04 02:40:36'),
(54, 'ORIzMRTc35a69A26QYHosAQd1zJPAiL4dIkAC0DX.webp', 46, '2022-05-04 02:40:36', '2022-05-04 02:40:36'),
(55, 'YSu8WlR5ZYXD18te61YFT69OciWWT1QoZFyKf066.webp', 47, '2022-05-04 02:42:04', '2022-05-04 02:42:04'),
(56, 'nCQwR9E4kH0GlEMD1VbhafbXLUatt0z5Udc20zM2.webp', 47, '2022-05-04 02:42:04', '2022-05-04 02:42:04'),
(57, '5aMWR4AOxTVj6uWyhe5MzMwMIoEwchD7XkWEr7PW.webp', 47, '2022-05-04 02:42:04', '2022-05-04 02:42:04'),
(58, 'B9NH7dxaVCWn3KJvyDxoAKG8jvPzzFU0rdfiNauq.webp', 48, '2022-05-04 02:42:43', '2022-05-04 02:42:43'),
(59, 'ZAHWt35b9eGgfSjSmsIBRs8X7TXsCY8LsTGv70AW.webp', 48, '2022-05-04 02:42:43', '2022-05-04 02:42:43'),
(60, 'uIbXFJJhvo5Zej2GPuaHsNrD5XpBSf4sUWOQn3v0.webp', 48, '2022-05-04 02:42:43', '2022-05-04 02:42:43'),
(61, 'iGbBvrzUqJX4EiifmIe5n10mQaObqTQDVUD0PfFo.webp', 49, '2022-05-04 02:44:02', '2022-05-04 02:44:02'),
(62, 'Ae3248z9yeALRHIuSDLcqvcvEleLp74etvgVdVG7.webp', 49, '2022-05-04 02:44:02', '2022-05-04 02:44:02'),
(63, '1FXuL8QQxtQdVwWbj1EAvuNCls7pocCJ5xITPoYe.webp', 49, '2022-05-04 02:44:02', '2022-05-04 02:44:02'),
(64, 'v3wCg2Eoya5sk3merk0Yq9aoNbvphr2qYW7JawHT.webp', 50, '2022-05-04 02:44:43', '2022-05-04 02:44:43'),
(65, 'tbj9DCjmKUTzZYVcVMoizV3LEScyCbPkLDMGJrnE.webp', 50, '2022-05-04 02:44:43', '2022-05-04 02:44:43'),
(66, 'm6sWaJIQm6LnaSbmDjtxcNI4Q1JWGfRCgHg6jJ5f.webp', 50, '2022-05-04 02:44:43', '2022-05-04 02:44:43'),
(67, 'es41jofP1cU6zlgSsS53p4VYzSDRaJja05a96MUP.webp', 51, '2022-05-04 02:45:34', '2022-05-04 02:45:34'),
(68, 'bzulvSFROAZPH0qDNnGwDaG2KB7orlm8RuoRTLSk.webp', 51, '2022-05-04 02:45:34', '2022-05-04 02:45:34'),
(69, 'zFPhNtsCLS1jxWWCnj6ZrHOu8h5NTQH7R8mAxqpo.webp', 51, '2022-05-04 02:45:34', '2022-05-04 02:45:34'),
(70, 'AsnJYVbAXuJX04cyXpomzn3ECWUH27Fsdm9G05PD.webp', 52, '2022-05-04 02:46:17', '2022-05-04 02:46:17'),
(71, 'fi2LoW7eJjjfRK3vrTgV4TArouTgHZzb58orBuNR.webp', 52, '2022-05-04 02:46:17', '2022-05-04 02:46:17'),
(72, 'chCunuv9OEaqcRsrj22sZjyisaJr4b93m8NLPYJk.webp', 52, '2022-05-04 02:46:18', '2022-05-04 02:46:18'),
(73, 'YC08l3pJ02Knu1wZuAJDfaIEgoXoErhtZvcaTRtM.webp', 53, '2022-05-04 02:48:19', '2022-05-04 02:48:19'),
(74, 'agqLnEga6lbOl4B0s1bMcbh9DOh5K3kM2ZU94dLs.webp', 53, '2022-05-04 02:48:19', '2022-05-04 02:48:19'),
(75, 'QMeBB5iCMjrVXThdhlcJB4rutqMHFjzxx4uoGN3Z.webp', 53, '2022-05-04 02:48:19', '2022-05-04 02:48:19'),
(76, 'girrJz5DKuK3snHkdqI301pnHWGSydFZZlqHRIGv.webp', 54, '2022-05-04 02:49:03', '2022-05-04 02:49:03'),
(77, 'dAqe6652ffRFCc2LnGVirIgBvEAtk8a5Gsp3rHO7.webp', 54, '2022-05-04 02:49:03', '2022-05-04 02:49:03'),
(78, 'OBzJE6Ql64u1Tx2lMgeR2jhcGPg9UbBQUmdtq3M1.webp', 54, '2022-05-04 02:49:03', '2022-05-04 02:49:03'),
(79, 'Qa1nTvm0BojcotJFf96kLsukarpenQ6jLqMQWhdV.webp', 55, '2022-05-04 02:50:17', '2022-05-04 02:50:17'),
(80, 'MPwZGiGSVLHB9pHPAkBldARueGJKEfLj1FZTBnKZ.webp', 55, '2022-05-04 02:50:17', '2022-05-04 02:50:17'),
(81, 'rG1EENZ0OpMyPpCXRpQZpnppmiTA5wFivIaEBVuW.webp', 55, '2022-05-04 02:50:17', '2022-05-04 02:50:17'),
(82, 'ICR1cDOrlnCahDinISADrfOrGU5v2M17qgRzxNJ0.webp', 56, '2022-05-04 02:52:00', '2022-05-04 02:52:00'),
(83, 'q7lfAbsADf0fhUB3MtbaiScbH4B3SX85kOzNbztD.webp', 56, '2022-05-04 02:52:00', '2022-05-04 02:52:00'),
(84, 'vlLEGha4BKWXfr3Yizx7TkN1u7i67j2n3kdIJlpD.webp', 56, '2022-05-04 02:52:00', '2022-05-04 02:52:00'),
(85, 'lK3S0JJUchVg9Pfnnn5uZLZUWaWOuEH9joITuqN0.webp', 57, '2022-05-04 02:52:33', '2022-05-04 02:52:33'),
(86, 'XjZBLI2uGBVPuxj04csWOGGWerlAFFuWcPG5yAma.webp', 57, '2022-05-04 02:52:33', '2022-05-04 02:52:33'),
(87, 'YWowZuigOBpBxvxk2uClmd1C5uhOMmeyPiXqMdgk.webp', 57, '2022-05-04 02:52:33', '2022-05-04 02:52:33'),
(88, 'nOoQD4upTVBHVNTER7roILxnOYJpBSlpdBUT7ey4.webp', 58, '2022-05-04 02:53:11', '2022-05-04 02:53:11'),
(89, 'KVoNpv2EldncyLMKbMOe5yftW0oIS9pQ2gtdEGD0.webp', 58, '2022-05-04 02:53:11', '2022-05-04 02:53:11'),
(90, '7flgzYelUuG2VkzM39CtpUJ0wi2M6W7Z4p9XUbBS.webp', 58, '2022-05-04 02:53:11', '2022-05-04 02:53:11'),
(91, 'sw4zBk48NhiLQnkuctBnCqLjINhGB5YcczhAB1ql.webp', 59, '2022-05-04 02:53:52', '2022-05-04 02:53:52'),
(92, 'uYWDHNKPheOwgYuDtpZps8YK6kZzoT6XVTTcp3DH.webp', 59, '2022-05-04 02:53:52', '2022-05-04 02:53:52'),
(93, 'k2PVEjcXBEBX9wA2Yv1PwDlMhQ2V6s0SBarIsDuv.webp', 59, '2022-05-04 02:53:52', '2022-05-04 02:53:52'),
(94, 'urykxFk8wHAEempAsYQBaqCp5CcOXR4IbtoQzpq7.webp', 60, '2022-05-04 02:54:39', '2022-05-04 02:54:39'),
(95, 'gpxw19q9DXHKXqBRQQMjDFiCSQLwnfC8Nmx5061y.webp', 60, '2022-05-04 02:54:39', '2022-05-04 02:54:39'),
(96, 'JinCtujigLD7477vdAGYK0HTD7KkoIFt0nIVEOD4.webp', 60, '2022-05-04 02:54:39', '2022-05-04 02:54:39'),
(97, 'gIFLjdQlyVEZOd8feL1lXTabAtBjKPNPmc1MkoFg.webp', 61, '2022-05-04 02:56:27', '2022-05-04 02:56:27'),
(98, 'K3QynpmBIFahlzmnyH89iEZoEzMrMOVs6OMSCjGI.webp', 61, '2022-05-04 02:56:27', '2022-05-04 02:56:27'),
(99, 'zQMCwFha9cogpDIknYszMxe8bFLQ5OZEoWaVaXY9.webp', 61, '2022-05-04 02:56:27', '2022-05-04 02:56:27'),
(100, 'Obd7sqcd7Hc5UvA2ZLA2y8FFn1KDKe4SrgvD7PnS.webp', 62, '2022-05-04 02:57:58', '2022-05-04 02:57:58'),
(101, 'M1BfdQuOLfcIYrWRljbbJGXyw5mqNAthwqDHdNyr.webp', 62, '2022-05-04 02:57:58', '2022-05-04 02:57:58'),
(102, 'Phc4brySaGVtrjMRGTOxXEpzBE4PHWnWm7LPWHR2.webp', 62, '2022-05-04 02:57:58', '2022-05-04 02:57:58'),
(103, 'Xd4KSGnj06FY17Ib4x4IubhGcDlfMo4ddiGAWkWB.webp', 63, '2022-05-04 02:59:07', '2022-05-04 02:59:07'),
(104, '7TPorgSrsWrRP7IhdR2WM1kVkJ3jIFndAIvT80sX.webp', 63, '2022-05-04 02:59:07', '2022-05-04 02:59:07'),
(105, 'SqEnQeLUqKevNTaUoMKrgfPgiwf8GFd4bitLZsYE.webp', 63, '2022-05-04 02:59:07', '2022-05-04 02:59:07'),
(106, 'd1JprsdOR0mFWlcuGaXwocd3vY7mQaGAOGUIua0g.webp', 64, '2022-05-04 03:00:09', '2022-05-04 03:00:09'),
(107, 'yykNqfFnLmm4eiP92R36JWH3V4FhD6ojZ0VemWov.webp', 64, '2022-05-04 03:00:09', '2022-05-04 03:00:09'),
(108, '1P9AyyDnXk11vovRrcd6qNJRnaibDJ9mgnBtbr4k.webp', 64, '2022-05-04 03:00:09', '2022-05-04 03:00:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2022_03_17_024354_create_categories_table', 1),
(24, '2022_03_17_024423_create_attrs_table', 1),
(25, '2022_03_17_024433_create_attr_values_table', 1),
(26, '2022_03_17_024456_create_products_table', 1),
(27, '2022_03_17_025532_add_paid_to_attrs_table', 2),
(28, '2022_03_20_091805_add-status-to-products', 3),
(29, '2022_03_21_103416_create_brands_table', 4),
(30, '2022_03_21_161729_add_status_to_brands_table', 5),
(31, '2022_03_22_125251_create_img_products_table', 6),
(32, '2022_03_22_125350_create_product_v_s_table', 7),
(33, '2022_03_22_133526_create_product_attrs_table', 8),
(35, '2022_04_17_061051_add_brand_id_to_products_table', 9),
(42, '2022_04_17_084400_create_cart_table', 10),
(43, '2022_04_17_084416_create_cart_details_table', 10),
(44, '2022_04_24_111654_create_wishlists_table', 10),
(45, '2022_04_24_141447_create_pro_wishlists_table', 10),
(47, '2022_04_25_091913_add_row_into_users_table', 11),
(48, '2022_04_27_175237_add_column_to_users_table', 12),
(49, '2022_04_28_181201_create_banners_table', 13),
(51, '2022_04_29_094556_add_column_address_to_users_table', 14),
(53, '2022_05_01_082905_add_order_info_to_carts', 15),
(54, '2022_05_02_140644_add_column_to_products_table', 16),
(55, '2022_05_06_032640_create_comments_table', 17),
(56, '2022_05_06_143706_create_blogs_table', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `sale_price` double(8,2) DEFAULT 0.00,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL,
  `view` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `sale_price`, `description`, `product_quantity`, `view`, `image`, `category_id`, `brand_id`, `created_at`, `updated_at`, `status`) VALUES
(42, 'Dimensions Washed Sweater', 'dimensions-washed-sweater', 100000.00, NULL, '<p>&quot;</p>\r\n\r\n<p>&quot;</p>', 53, 1, 'nsxsns0g5HENhSN2jJ1drCWOntWMgI3KgFKvScw6.jpg', 6, 19, '2022-05-04 02:19:46', '2022-05-10 06:50:43', 1),
(43, 'ONTOP CORDUROY BASEBALL JACKET', 'ontop-corduroy-baseball-jacket', 110000.00, NULL, '<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>', 20, 4, '8kRTjvEVPqf4ha06V8FAMDD1YmsJjc0uqUAOYZ0A.webp', 6, 20, '2022-05-04 02:21:33', '2022-05-06 05:51:14', 1),
(45, 'ONTOP JACKET UNI - WHITE', 'ontop-jacket-uni-white', 120000.00, NULL, NULL, 38, 8, 'PadCMniKEsgpD5LFPK1iJHGJjicloWAEatdr96Q4.webp', 6, 20, '2022-05-04 02:39:01', '2022-05-10 07:23:38', 1),
(46, 'ONTOP TEE CERA', 'ontop-tee-cera', 150000.00, NULL, NULL, 37, 0, 'WOTp4bsV2jOTlSOdQEvLaFVb0k60unQ6lmPBuczv.webp', 6, 20, '2022-05-04 02:40:36', '2022-05-10 07:26:45', 1),
(47, 'ONTOP TEE ETERNAL', 'ontop-tee-eternal', 150000.00, NULL, NULL, 27, 0, 'njALmRjKKIBkAu7QHzvxR1mfQUP5BDtGhu5eMX1p.webp', 6, 20, '2022-05-04 02:42:04', '2022-05-10 07:36:34', 1),
(48, 'ONTOP TEE SIMPLE - BLUE', 'ontop-tee-simple-blue', 160000.00, NULL, NULL, 14, 10, 'rsZcRdNlQME4g05XL7EGaISQzAVO3uFH2pJ8wp8L.webp', 6, 20, '2022-05-04 02:42:43', '2022-05-10 01:07:09', 1),
(49, 'ONTOP BOLD TRACK SHORT', 'ontop-bold-track-short', 105000.00, NULL, NULL, 29, 1, 'VAw88Ip5jCEoYtgjltaqRRsVDHLpRb1ayAqe9I6H.webp', 8, 20, '2022-05-04 02:44:02', '2022-05-06 05:51:09', 1),
(50, 'ONTOP LINE DESTROYED JEANS', 'ontop-line-destroyed-jeans', 135000.00, NULL, NULL, 23, 0, 'DFLpxkW8u86WPKGWeBPWFn4fEsem3NpK21wRDMyb.webp', 8, 20, '2022-05-04 02:44:43', '2022-05-04 02:44:43', 1),
(51, 'BOLT JACKET - BLACK', 'bolt-jacket-black', 250000.00, NULL, NULL, 25, 0, '4PUjEs87APEmWpfTfdCy1WhzaHfu3ok61AWqS3ej.webp', 6, 18, '2022-05-04 02:45:34', '2022-05-04 02:45:34', 1),
(52, 'FACILE LONG SLEEVES TEE - BLACK', 'facile-long-sleeves-tee-black', 175000.00, NULL, NULL, 14, 0, 'SkXYeRkHzXdahBU4WvryLxBQyJjqByFfjNT9Jwyj.webp', 6, 18, '2022-05-04 02:46:17', '2022-05-04 02:46:17', 1),
(53, 'LIFESTYLE TEE - WHITE', 'lifestyle-tee-white', 125000.00, 100000.00, NULL, 23, 1, 'O9xAcq6kCBxxh2CgvuNZ1aWMPHvY0HQBKxcKnYzf.webp', 6, 18, '2022-05-04 02:48:19', '2022-05-09 23:32:10', 1),
(54, 'SIRIMIRI TEE - GREEN', 'sirimiri-tee-green', 130000.00, 120000.00, NULL, 21, 0, '1x8W2OGDCsZm95j9sXX0oAawowE9ah5WC12WiCAp.webp', 6, 18, '2022-05-04 02:49:03', '2022-05-04 02:49:03', 1),
(55, 'MENTAL HOODIE - BLACK', 'mental-hoodie-black', 240000.00, 0.00, NULL, 32, 0, '6dF3eowuJdPimtds2d97l6GXWcGFpnunG2Hwt1Pq.webp', 6, 18, '2022-05-04 02:50:17', '2022-05-04 02:50:17', 1),
(56, 'SWE LAND TEE - WHITE', 'swe-land-tee-white', 165000.00, NULL, NULL, 21, 0, 'nqO7dXz1vWNRW6ch9IulA1YUkiStwj7ZkMiGVwsA.webp', 6, 18, '2022-05-04 02:52:00', '2022-05-04 02:52:00', 1),
(57, 'NFSWE - TAN', 'nfswe-tan', 132000.00, NULL, NULL, 21, 0, 'rJCRWOKmnrj5iIWETATZeHHcI06NuFAJdMFAIQQ6.webp', 6, 18, '2022-05-04 02:52:33', '2022-05-04 02:52:33', 1),
(58, 'BOLT CORDUROY PANTS - BLACK', 'bolt-corduroy-pants-black', 150000.00, NULL, NULL, 60, 0, 'iVTFcrpnaxewnNWTQAdkp2TR3E5oXa7iJP70girs.webp', 8, 18, '2022-05-04 02:53:11', '2022-05-04 02:53:11', 1),
(59, 'REVERSE TIE DYE PANTS', 'reverse-tie-dye-pants', 215000.00, 200000.00, NULL, 65, 0, 'zg1qkzT7IwTCDCVI4o6rXBo1nI8aRwL40s0z0tPw.webp', 8, 18, '2022-05-04 02:53:52', '2022-05-04 02:53:52', 1),
(60, 'SWE JEANS - BLACK', 'swe-jeans-black', 168000.00, 149000.00, NULL, 60, 0, 'VivuHZiu8eOhUY80zFKRs52TAL7yVR0eK6TdO7qQ.webp', 8, 18, '2022-05-04 02:54:39', '2022-05-04 02:54:39', 1),
(61, 'TYPE SWEATPANTS - BLACK', 'type-sweatpants-black', 185000.00, NULL, NULL, 81, 0, 'a42OGp6oFAcORVdMDS3ar6ew8bs26aHZHVknQ99W.webp', 8, 18, '2022-05-04 02:56:27', '2022-05-04 02:56:27', 1),
(62, 'DON\'T GIVE UP KIDS TEE', 'dont-give-up-kids-tee', 99000.00, NULL, NULL, 50, 0, 'R6enX2R05s5u3SwyZJBy2a6itxFxbkryATDtLkWi.webp', 6, 20, '2022-05-04 02:57:58', '2022-05-04 02:57:58', 1),
(63, 'HIM TEE', 'him-tee', 175000.00, NULL, NULL, 100, 0, '6eUp4iL1PiG1lpEWJVe9xwwgs4a2kCl4eXKK6fEO.webp', 6, 20, '2022-05-04 02:59:07', '2022-05-04 02:59:07', 1),
(64, 'DON\'T STOP TEE', 'dont-stop-tee', 132000.00, 120000.00, NULL, 60, 1, 'RLs3djBklADeHznVmjoXYsXuvJP0cXof2krj0fCC.webp', 6, 20, '2022-05-04 03:00:09', '2022-05-06 05:53:20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_wishlists`
--

CREATE TABLE `pro_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wishlist_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pro_wishlists`
--

INSERT INTO `pro_wishlists` (`id`, `wishlist_id`, `product_id`, `created_at`, `updated_at`) VALUES
(40, 13, 48, '2022-05-04 03:23:05', '2022-05-04 03:23:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phoneNumber`, `address`, `avatar`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Demaon12', 'demaon@gmail.com', '0923019015', NULL, NULL, NULL, '$2y$10$3GiUHrK2LSvaAw8z2DEj5e/QqWzB1heg6.Yl0WJqZWnMtr8cen246', NULL, 3, '2022-04-25 04:41:19', '2022-05-03 01:28:34', NULL),
(9, 'Trương Trọng Nghĩa', 'truongnghia620@gmail.com', '0923019015', '18N05, Khu tái định cư Triều Khúc', 'T4pWS0yU7i22TqZmhzVc5UuNGrYo8XcnOhb2U20g.jpg', NULL, '$2y$10$ppEHyd4vIPb/epiZ8Te70.QS3dPQ/0AeI9E.Mt7zwgYKq9fujXF3u', NULL, 1, '2022-04-25 04:44:47', '2022-05-06 03:59:03', NULL),
(10, 'Cung Hùng', 'hungvjpls@gmail.com', '0123456789', NULL, 'default_avatar.jpg', NULL, '$2y$10$T501teqK.IRNtRzecjy1UO5IqOOG8OqxyAYzrS46UjQk8G2yAUqZ6', NULL, 2, '2022-04-27 08:09:10', '2022-05-02 10:47:09', NULL),
(11, 'username1', 'username1@gmail.com', '1234567890', NULL, 'default_avatar.jpg', NULL, '$2y$10$O45P1MqYehyAnBAtFsWot.2XEmjLX2uiP/WkYqCWUHxXVoc44i.OW', NULL, 0, '2022-04-27 11:41:59', '2022-05-02 10:25:14', NULL),
(12, 'Nguyễn Thị Hà Vi', 'viviha@gmail.com', '0923015016', '18N05, Khu tái định cư Triều Khúc', '4DRUfo5Y0WMlpomfbhaBRNl5RtCOaOK8jR9Zfb6e.jpg', NULL, '$2y$10$ZAvNyksBE27Y/dzo4GX/NeKYvgaxUVQYmqcT362Yuj68HnIIzNuZS', NULL, 1, '2022-04-27 12:26:37', '2022-05-01 07:40:15', NULL),
(13, 'Đinh Tiến Dũng', 'dungdinh@gmail.com', '0231564897', NULL, 'default_avatar.jpg', NULL, '$2y$10$D.MpMCaWJghOoWHcDZdznOolO8bZIWMbYmqWAWqIRbfIPvRz.ZF4C', NULL, 0, '2022-04-27 12:27:16', '2022-04-27 12:27:16', NULL),
(17, 'Vũ Đức Anh', 'vuducanh@gmail.com', '0923456456', '18N05, Khu tái định cư Triều Khúc', 'kTr4ZHdoyql74xXYFtwd3dPUUcfHwVCHeZ7CWdlQ.jpg', NULL, '$2y$10$dtt9oJCGezDZuZYChC3XjuMl1TOvlnpkmitcs9g6ELKrbjwOSL62y', NULL, 0, '2022-04-27 12:27:16', '2022-05-03 03:18:35', NULL),
(19, 'username2', 'username2@gmail.com', NULL, NULL, 'default_avatar.jpg', NULL, '$2y$10$LhaKGkGz/ef.u9mLeMg2ZuDzKzkXqYSkslpOOoaQidIXtwSO5tqXS', NULL, 0, '2022-05-03 06:27:41', '2022-05-03 06:27:41', NULL),
(20, 'Vy Tiểu Mẫn', 'vytieuman@gmail.com', '0382987655', '18N05, Khu tái định cư Triều Khúc', 'ae2LddeX7DZv2Zon0VmViwQPsqfvD7RnBhIq9Chr.jpg', NULL, '$2y$10$hoA./HB8DeGvL4gSNhTag.tpnzw.Rj.dWVzJAI48/O2MaHa1VmqwG', NULL, 0, '2022-05-04 03:11:46', '2022-05-04 03:24:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, 20, '2022-05-04 03:22:11', '2022-05-04 03:22:11'),
(14, 9, '2022-05-04 06:58:56', '2022-05-04 06:58:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attrs`
--
ALTER TABLE `attrs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attrs_name_unique` (`name`);

--
-- Chỉ mục cho bảng `attr_values`
--
ALTER TABLE `attr_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attr_values_id_attr_foreign` (`id_attr`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_blog_title_unique` (`blog_title`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `img_products`
--
ALTER TABLE `img_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_products_product_id_foreign` (`product_id`);

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
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `pro_wishlists`
--
ALTER TABLE `pro_wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attrs`
--
ALTER TABLE `attrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `attr_values`
--
ALTER TABLE `attr_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `img_products`
--
ALTER TABLE `img_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `pro_wishlists`
--
ALTER TABLE `pro_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attr_values`
--
ALTER TABLE `attr_values`
  ADD CONSTRAINT `attr_values_id_attr_foreign` FOREIGN KEY (`id_attr`) REFERENCES `attrs` (`id`);

--
-- Các ràng buộc cho bảng `img_products`
--
ALTER TABLE `img_products`
  ADD CONSTRAINT `img_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
