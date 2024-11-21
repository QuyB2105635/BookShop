-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2024 lúc 09:31 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book-shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(8, 'Dân Trí'),
(9, 'Kim Đồng'),
(10, 'Văn Học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name_customer` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_order` datetime NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name_customer`, `address`, `phone_number`, `product_id`, `quantity`, `date_order`, `total_price`, `payment_method`, `order_status`) VALUES
(5, 'Lý thị ngọc quý', 'Ấp 9 Trinh Phú kế sách sóc Trăng', 939783701, 45, 4, '2024-11-20 08:41:42', 396000, 'COD', 'pending'),
(6, 'Lý thị ngọc quý', 'Ấp 9 Trinh Phú kế sách sóc Trăng', 939783701, 45, 9, '2024-11-20 08:42:24', 891000, 'COD', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `selling_price` bigint(11) DEFAULT NULL,
  `import_price` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `color` varchar(50) NOT NULL,
  `display` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `camera` varchar(255) DEFAULT NULL,
  `CPU` varchar(255) DEFAULT NULL,
  `battery` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `brand_id`, `name_product`, `selling_price`, `import_price`, `image`, `color`, `display`, `storage`, `camera`, `CPU`, `battery`) VALUES
(45, 9, 'Thỏ Bảy Màu Và Những Người Nghĩ Nó Là Bạn (Tái Bản 2023)', 99000, 140000, '9786043561272_1_1.webp', 'Huỳnh Thái Ngọc', '19 x 13 x 0.4 cm', '160', '2023', 'Tiếng Việt', 'Comic - Truyện Tranh'),
(51, 8, 'Doraemon - Nobita Và Hòn Đảo Diệu Kì - Cuộc Phiêu Lưu Của Loài Thú', 99000, 140000, 'doraemon-1.webp', 'Fujiko F Fujio', '18 x 13 x 0.7 cm', '144', '2024', 'Tiếng Việt', 'Series Manga'),
(52, 8, 'Doraemon - Tân Nobita Và Nước Nhật Thời Nguyên Thủy', 99000, 140000, 'doraemon-2.webp', 'Fujiko F Fujio', '18 x 13 x 0.7 cm', '144', '2024', 'Tiếng Việt', 'Series Manga'),
(53, 8, 'Doraemon - Movie Story Màu - Nobita Và Bản Giao Hưởng Địa Cầu', 99000, 140000, 'doraemon-3.webp', 'Fujiko F Fujio', '18 x 13 x 0.7 cm', '144', '2024', 'Tiếng Việt', 'Series Manga'),
(54, 8, 'Solo Leveling - Tôi Thăng Cấp Một Mình - Tập 9', 99000, 140000, 'solo-leveling_bia_tap-9.webp', 'Dubu (Redice Studio), Chugong', '20.5 x 14.5 x 0.8 cm', '176', '2024', 'Tiếng Việt', 'Comic - Truyện Tranh'),
(55, 8, 'Solo Leveling - Tôi Thăng Cấp Một Mình - Tập 7', 99000, 140000, '20241120_111428_solo-leveling_bia_tap-7.webp', 'Dubu (Redice Studio), Chugong', '20.5 x 14.5 x 0.8 cm', '176', '2024', 'Tiếng Việt', 'Comic - Truyện Tranh'),
(56, 8, 'Solo Leveling - Tôi Thăng Cấp Một Mình - Tập 1', 99000, 140000, 'solo_leveling_bia_tap_1_3.webp', 'Dubu (Redice Studio), Chugong', '20.5 x 14.5 x 0.8 cm', '176', '2024', 'Tiếng Việt', 'Comic - Truyện Tranh'),
(57, 8, 'Solo Leveling - Tôi Thăng Cấp Một Mình - Tập 3', 99000, 140000, 'solo-leveling_bia_tap-3.webp', 'Dubu (Redice Studio), Chugong', '20.5 x 14.5 x 0.8 cm', '176', '2024', 'Tiếng Việt', 'Comic - Truyện Tranh'),
(58, 10, 'Ngày Xưa Có Một Chuyện Tình - Bìa Phim', 99000, 140000, '20241120_112705_nxcmctbt.webp', '	 Nguyễn Nhật Ánh', '14.5 x 10 x 1.4 cm', '296', '2024', 'Tiếng Việt', 'Văn Học'),
(59, 10, 'Thơ Hàn Mặc Tử - Văn Học Trong Nhà Trường', 99000, 140000, '20241120_130717_image_244284.webp', 'Hàn Mặc Tử', '19 x 13 cm', '180', '2021', 'Tiếng Việt', 'Văn Học'),
(60, 10, 'Thơ Tố Hữu (Tái Bản 2024)', 99000, 140000, '20241120_130903_hh_bia_tho-to-huu_bia-1.webp', 'Tố Hữu', '18 x 11 x 1.1 cm', '220', '2024', 'Tiếng Việt', 'Văn Học'),
(61, 8, '[Light Novel] Dược Sư Tự Sự - Tập 1', 99000, 140000, 'duoc_su_tu_su_tap_1_tieu_thuyet_bia_1_4.webp', 'Touko Shino', '19 x 13 x 2 cm', '408', '2022', 'Tiếng Việt', 'Comic - Truyện Tranh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(0, 'User'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `username`, `address`, `phonenumber`, `status`) VALUES
(1, 'admin@gmail.com', '$2y$10$LMsRT4vsxBi7p0X6358FfufWZFVTstAvMDShlQCbJcymuc1I8ou2m', 0, 'admin', '', '', 0),
(13, 'ngocquy@gmail.com', '$2y$10$vR0af4DbkR5.rxTBBLRdPuxISvRrqEn734e0P8j0BQ9sRJpbyRYS6', 1, 'ngocquy', '', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
