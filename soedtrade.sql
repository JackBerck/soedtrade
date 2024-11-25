-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 11:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soedtrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint NOT NULL,
  `seller_id` bigint DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `price` bigint NOT NULL,
  `description` text,
  `condition` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `seller_id`, `name`, `price`, `description`, `condition`, `category`, `created_at`) VALUES
(23, 6, 'iPhone 13 Pro Max', 15000000, 'Jual iPhone 13 Pro baru, masih segel! Layar jernih banget, performa kencang, cocok buat yang cari HP keren.', 'Bekas', 'Elektronik', '2024-11-10 06:37:26'),
(24, 6, 'Samsung Galaxy S21', 12000000, 'Samsung S21, kondisi baru, kamera jernih buat foto-foto, mulus banget. Dijamin puas pake ini!', 'Baru', 'Elektronik', '2024-11-10 06:38:08'),
(25, 6, 'Laptop ASUS ROG', 25000000, 'Laptop ASUS ROG second, siap gaming! Performa masih ngebut, layar mulus, tinggal pakai aja. Siap gas!', 'Bekas', 'Elektronik', '2024-11-10 06:38:48'),
(26, 6, 'Vario 150', 18000000, 'Motor Vario 150, tahun muda, kondisi mesin halus, pajak hidup. Siap jalan, irit dan nyaman buat harian.', 'Bekas', 'Kendaraan', '2024-11-10 06:40:01'),
(27, 6, 'Yamaha NMAX 155', 22000000, 'Yamaha NMAX baru, motor elegan dan nyaman banget buat jalan jauh. Nyaman buat riding santai.', 'Baru', 'Kendaraan', '2024-11-10 06:41:31'),
(28, 6, 'Gitar Fender Stratocaster', 8000000, 'Gitar Fender asli, suara mantap banget! Cocok buat yang hobi ngeband, dijual karena mau upgrade.', 'Bekas', 'Alat Musik', '2024-11-10 06:42:53'),
(29, 6, 'Keyboard Yamaha PSR-E373', 4000000, 'Keyboard Yamaha, kondisi baru! Suara oke banget, buat belajar atau main musik di rumah.', 'Baru', 'Alat Musik', '2024-11-10 06:43:56'),
(30, 6, 'Jaket Bomber', 350000, 'Jaket bomber kekinian, cocok buat nongkrong, bahan adem dan nyaman dipakai. Warna netral, cocok di segala cuaca.', 'Baru', 'Pakaian', '2024-11-10 06:45:03'),
(32, 9, 'Vespa PX 1979', 17000000, 'Vespa px 1979 sudah CDI pajak hidup\r\n17 nego motor sehat \r\nMesin alus \r\nLok purbalingga \r\n085700233338\r\nAsli R purbalingga\r\nAsli putih', 'Bekas', 'Kendaraan', '2024-11-25 11:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int NOT NULL,
  `product_id` bigint DEFAULT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id`, `image_name`) VALUES
(1, 23, '673054a6e7188.jpg'),
(2, 24, '673054d09f277.jpg'),
(3, 24, '673054d09f88b.jpg'),
(4, 25, '673054f83e888.jpg'),
(5, 25, '673054f83ed26.jpg'),
(6, 26, '67305541be518.jpg'),
(7, 26, '67305541beb7d.jpg'),
(8, 26, '67305541bef66.jpg'),
(9, 27, '6730559beb7c7.jpg'),
(10, 27, '6730559bec1f4.jpg'),
(11, 28, '673055edc825b.jpg'),
(12, 29, '6730562c3a2cb.jpg'),
(13, 29, '6730562c3a6f1.jpg'),
(14, 30, '6730566f66be4.jpg'),
(17, 32, '67445fbc0b588.jpg'),
(18, 32, '67445fbc0baa7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `saved_products`
--

CREATE TABLE `saved_products` (
  `saved_id` int NOT NULL,
  `user_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `saved_products`
--

INSERT INTO `saved_products` (`saved_id`, `user_id`, `product_id`, `created_at`) VALUES
(9, 9, 24, '2024-11-25 11:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`) VALUES
('6720837a85d53', 2),
('6721a173382e9', 3),
('6721fdfe3df47', 4),
('672a1335cd2ec', 5),
('672acc039e9c6', 5),
('672b0e38556fb', 6),
('672f4998d9959', 6),
('6731755e0ac44', 6),
('67445e8db2327', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `phone_number` bigint NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `profile_image`, `phone_number`, `address`, `created_at`) VALUES
(1, 'Zaki', 'zaki@gmail.com', '123456', '', 8123456789, 'Jl. Kebon Jeruk No. 1', '2024-10-28 23:13:28'),
(2, 'johnd', 'zakidzulfikar051@gmail.com', '$2y$10$KeS8rZUhtAPA44DUNczeFeWQ20vYDEWJ.Vrr05h7HOSQYW8IZKIL6', '', 85786470922, 'Tersono District, Batang Regency, Central Java 51272', '2024-10-28 23:24:12'),
(3, 'admin', 'admin@gmail.com', '$2y$10$O/j5zH/KDvKXjwx/Z29Q9eswIzoqUZOXPAGi4IWXiDaY3j9VLsZFS', '', 895358617234, 'Dusun 1, Sidakangen, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371', '2024-10-29 20:00:51'),
(4, 'bluewew_', 'akuntoembal007@gmail.com', '$2y$10$6n./SuOIMo/VIs8nGiiFg.CyDQhW6VWvf6909SQJVB4KoUDvXoau.', 'as.webp', 831155334242, 'Dusun 1, Sidakangen, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371', '2024-10-30 02:35:50'),
(5, 'Jack Berck', 'berckjack@gmail.com', '$2y$10$.XE9Pna474CBC/sjUkkgFeHyS30uCYcpLy4xbBlTVnib1.VS3j/Fu', 'default.webp', 85786470923, 'Jl. Diponegoro, Dk. Kauman, Ds. Tersono, Kec. Tersono, Kab. Batang, Jawa Tengah', '2024-11-05 05:44:26'),
(6, 'Elle Fanning', 'ellefanning@gmail.com', '$2y$10$zlwbQ76pAOepE5HxA9npTOA5h5mtLPUxlC2JfvUNdtfO469XqmsrS', '673363ec3ed7f.jpg', 87123321123, 'Jl. Dr. Wahidin Sudirohusodo No.81, Sukapura, Kec. Kejaksan, Kota Cirebon, Jawa Barat 45122', '2024-11-05 23:35:21'),
(7, 'Cek Saja', 'ceksaja@gmail.com', '$2y$10$gz.90h6s2lMUkM5Rdn3gS.KNDClzGJ8Eom.6YoNoP2M77Txw8VLnS', 'default.webp', 86312312399, 'Jl. Prof. Dr. H.R. Boenyamin No. 708', '2024-11-13 01:39:33'),
(8, 'Mau Apa', 'mauapa@gmail.com', '$2y$10$eGDqqs5n5tY1jPk0H5qnz.HFACXhPyd0rJTEBLpPZ8wW9qv1l4bpS', '6734051fcd7fe.jpg', 8123123123, 'Karang Bawang, Grendeng, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53122', '2024-11-13 01:47:11'),
(9, 'Muhammad Zaki Dzulfikar', 'zakidzulfikar@gmail.com', '$2y$10$C0OKC7ABPj1VWPaV6e7Z0uMEddbNuf03oJtektZPR6KiK4rtWEQni', '67445e8387d40.jpg', 85786470954, 'Jl. Diponegoro, Kecamatan Tersono Batang, Jawa Tengah 51272', '2024-11-25 11:24:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_image_product` (`product_id`);

--
-- Indexes for table `saved_products`
--
ALTER TABLE `saved_products`
  ADD PRIMARY KEY (`saved_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`product_id`),
  ADD KEY `fk_saved_product` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sessions_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `users_pk` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `saved_products`
--
ALTER TABLE `saved_products`
  MODIFY `saved_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_image_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_products`
--
ALTER TABLE `saved_products`
  ADD CONSTRAINT `fk_saved_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_saved_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_sessions_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
