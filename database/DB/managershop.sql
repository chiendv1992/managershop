-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 09, 2018 lúc 01:08 PM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `managershop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(8) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `status`) VALUES
(2, 'banner2.jpg', 1),
(3, 'banner1.jpg', 1),
(4, 'banner1.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(8) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'HP'),
(2, 'Asus'),
(4, 'Samsung'),
(8, 'Acer'),
(9, 'Dell'),
(10, 'Điện thoại'),
(11, 'Lenovo'),
(12, 'Nokia'),
(13, 'LG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(222) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `gender`, `email`) VALUES
(4, '1231', '2313', '123123', 1, 'a@gmail.com'),
(5, '1231', '2313', '123123', 1, 'a@gmail.com'),
(6, '1231', '2313', '123123', 1, 'a@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product`
--

CREATE TABLE `image_product` (
  `id` int(8) UNSIGNED NOT NULL,
  `product_id` int(8) DEFAULT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `image_product`
--

INSERT INTO `image_product` (`id`, `product_id`, `images`) VALUES
(1, 16, 'sss.jfif'),
(2, 17, 'sss.jfif'),
(3, 18, 'tải xuống.jfif'),
(4, 20, 'images.jfif'),
(5, 20, 'images (2).jfif'),
(6, 20, 'images (1).jfif'),
(7, 21, 'ffff.jfif'),
(8, 21, 'images (1).jfif'),
(9, 21, 'tải xuống.jfif'),
(10, 21, 'images (2).jfif');

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
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(8) NOT NULL,
  `customer_id` int(8) NOT NULL,
  `orderdate` date NOT NULL,
  `totals` int(222) NOT NULL,
  `shippeddate` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `type` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `customer_id`, `orderdate`, `totals`, `shippeddate`, `status`, `type`) VALUES
(1, 5, '2018-09-09', 11, NULL, '1', 1),
(2, 6, '2018-09-09', 11, NULL, '1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `order_id` int(8) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `product_id`, `order_id`, `quantity`, `total`) VALUES
(1, 3, 2, 1, 16000000),
(2, 5, 2, 1, 18000000);

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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(8) NOT NULL,
  `cat_id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `sale` varchar(255) NOT NULL,
  `quanlity` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stock` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `salefrom` datetime DEFAULT NULL,
  `saleto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `cat_id`, `name`, `description`, `price`, `sale`, `quanlity`, `status`, `stock`, `image`, `content`, `salefrom`, `saleto`) VALUES
(1, 1, 'HP compaq 12', '<p>M&ocirc; ta chị tiết</p>', 20000000, '0', 12, '1', 111, 'images (3).jpeg', '<p>noi dung</p>', '2018-01-02 06:16:26', '2018-01-02 00:00:00'),
(2, 2, 'asus 56', '<p>&aacute;d</p>', 10000000, '0', 14, '111', 0, '7559.jfif', '<p>qqqqq</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'asus s56', '<p>&aacute;d</p>', 20000000, '20', 0, '111', 111, '7559.jfif', '<p>qqqqq</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'S56', '<p>&aacute;d</p>', 10000000, '10', 20, '111', 0, '7559.jfif', '<p>qqqqq</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 9, 'Dell inprison 7559', '<p>core&nbsp;i7</p>', 18000000, '0', 10, '1', 1, '7559.jfif', '<p>đ&acirc;y l&agrave; sản phẩm ra năm đầu 2017</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 4, 'sam sung', '<p>1111</p>', 111, '10', 111, '111', 1111, '7559.jfif', '<p>1111</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 4, 'sam sung', '<p>1111</p>', 111, '111', 111, '111', 1111, '7559.jfif', '<p>1111</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'hp pro', '<p>123123</p>', 14000000, '1', 1111, '123123', 111, '7559.jfif', '<p>123123</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'hp eti', '<p>22</p>', 10000000, '10', 22, '22', 22, '7559.jfif', '<p>222</p>', '2018-01-01 00:00:00', '2018-03-31 00:00:00'),
(11, 2, 'asus', '<p>1111</p>', 11111, '1111', 1111, '1111', 111, '7559.jfif', '<p>1111</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, '111', '<p>1</p>', 111111, '1', 1, '1', 1, 'sss.jfif', '<p>1</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 9, 'dell 7567', '<p>111</p>', 123, '111', 111, '1', 111, '7559.jfif', '<p>111</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'hp', '<p>111</p>', 1111111, '1111111111', 111111111, '1111', 111111111, 'images.jfif', '<p>111</p>', NULL, NULL),
(15, 2, 'asus s', '<p>1</p>', 123, '1', 123, '1', 1, 'images.jfif', '<p>1</p>', NULL, NULL),
(16, 2, 'asuss 2', '<p>1</p>', 123, '1', 123, '1', 1, 'images.jfif', '<p>1</p>', NULL, NULL),
(17, 9, 'dell 6667', '<p>1</p>', 123, '1', 111, '1', 111, '7559.jfif', '<p>1</p>', NULL, NULL),
(18, 9, 'dell 7666', '<p>11111</p>', 111, '1111', 111, '111', 111, 'ffff.jfif', '<p>11111</p>', NULL, NULL),
(19, 2, 'hp ebook', '<p>1</p>', 1111, '111111', 111, '1', 1, 'images (2).jfif', '<p>1</p>', NULL, NULL),
(20, 9, 'delll', '<p>1</p>', 1, '1', 1, '1', 1, 'ffff.jfif', '<p>1</p>', NULL, NULL),
(21, 2, 'hp pro', '<p>w</p>', 123, '123', 123, '123', 1, '7559.jfif', '<p>ww</p>', NULL, NULL),
(22, 1, 'qưe', '<p>dsasdas</p>', 123123, '123', 12312, '231', 123, '9200000078984664.jpg', '<p>123123</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'do chien', 'chiendv92@gmail.com', '123123123', '1', '12', NULL, NULL),
(5, 'Đỗ Văn Chiến', 'admin@gmail.com', '9c2dc042a37d2312c5803e0114eb8804', '1', NULL, '2018-01-07 20:26:01', '2018-01-07 20:26:01'),
(6, 'chiendv1992@gmail.com', 'chiendv1992@gmail.com', '$2y$10$dJfzOBljhELTtOAOqcbuB.Vo4d6FiuwZI8hFHM7t2exFnBIavNyke', '1', '8xGozPwnMdIyMfhtC60YbVDKUby4rDeNDVaUQX6LVXrd4cLLpYHFgN9EjDEJ', NULL, NULL),
(7, 'do văn chien', 'chien@gmail.com', '$2y$10$6D8rMIv.loKH.UX82uUCYOeFp2Z3GmgmxN1MJ2a76b7LeqkTDuwS2', '1', 'P0cyvmMWgRRsb4Wf5KJ2WitidpzarCTOY8XkpfWtnwJenivr78ko4SB9wAT2', NULL, NULL),
(8, 'admin', 'ad@gmail.com', '$2y$10$XkO.ppzp8VZLQOhGjsI2AOfi.ihVoWa6vjNZ62I2koltkCiFe.Lom', '1', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `image_product`
--
ALTER TABLE `image_product`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
