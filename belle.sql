-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 11:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belle`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Erta', 'ertakryeziu8@gmail.com', 'hello', '2024-02-02 13:57:52'),
(2, 'lorita', 'lorita@gmail.com', 'hello test', '2024-02-02 15:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image_url`, `stock`, `description`, `username`, `updated_by`) VALUES
(2, 'Foundation', 40, 'https://www.narscosmetics.com/dw/image/v2/BBSK_PRD/on/demandware.static/-/Sites-itemmaster_NARS/default/dwfdf028d8/hi-res/0607845060420.jpg?sw=856&sh=750&sm=fit', 20, '', 'leonamaliqi', ''),
(3, 'Concealer', 18, 'https://n.nordstrommedia.com/id/sr3/dd805cfe-46d7-4dfa-937f-cd86969f5b9a.jpeg?h=365&w=240&dpr=2', 20, '', 'leonamaliqi', ''),
(4, 'Contour', 9, 'https://flormar.pk/cdn/shop/products/0111163-002_1200x1200.jpg?v=1680603426', 20, '', 'leonamaliqi', ''),
(5, 'Powder', 23, 'https://www.sephora.com/productimages/sku/s870618-main-zoom.jpg', 20, '', 'ertakryeziu', ''),
(6, 'Blush', 17, 'https://www.jonesroadbeauty.com/cdn/shop/products/Blush_POP_01_1024x1024.png?v=1662566073', 20, '', 'ertakryeziu', ''),
(7, 'Mascara', 12, 'https://m.media-amazon.com/images/I/71DTwHnZ6HL.jpg', 20, '', 'ertakryeziu', ''),
(8, 'Eyeliner', 18, 'https://m.media-amazon.com/images/I/61MlC7rEJPL.jpg', 20, '', 'leonamaliqi', ''),
(9, 'Eyeshadow', 45, 'https://beautybar.com.ph/cdn/shop/files/sb_sku_C33901_840x840_0.jpg?v=1691547525', 20, '', 'leonamaliqi', ''),
(10, 'Lipstick', 16, 'https://nudebynature.co.uk/cdn/shop/products/moisture_shine_lipstick_1024x1024.jpg?v=1567479628', 20, '', 'leonamaliqi', ''),
(11, 'Highlighter', 25, 'https://www.revolutionbeauty.com/dw/image/v2/BCZJ_PRD/on/demandware.static/-/Sites-revbe-master-catalog/default/dw0d6c80ff/images/hi-res/1770880-Revolution-Festive-Allure-Highlighter-2.jpg', 20, 'It gives shine', 'ertakryeziu', ''),
(12, 'Lipliner', 11, 'https://target.scene7.com/is/image/Target/GUEST_5eb3b5e9-66f2-4d18-8239-e9a4374fc20e?wid=488&hei=488&fmt=pjpeg', 20, '', 'ertakryeziu', ''),
(13, 'Lipgloss', 13, 'https://target.scene7.com/is/image/Target/GUEST_ce8437d9-f4a9-454c-819b-c289f225ee51?wid=488&hei=488&fmt=pjpeg', 20, '', 'ertakryeziu', ''),
(14, 'Lipstick', 15, 'https://cdn.tirabeauty.com/v2/billowing-snowflake-434234/tira-p/wrkr/products/pictures/item/free/original/34lob6Zo9-M.A.C-Matte-Lipstick-Russian-Red-(3g).jpeg', 20, '', 'leonamaliqi', ''),
(15, 'Eyeshadow', 14, 'https://www.proluxcosmetics.com/cdn/shop/files/3_d4bcbcdd-0931-4ff3-a092-41921cc67567.jpg?v=1698262314', 20, '', 'leonamaliqi', ''),
(16, 'Lip Balm', 5, 'https://s7.orientaltrading.com/is/image/OrientalTrading/14213963?$FULL_SIZE$', 20, '', 'leonamaliqi', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `avatar`) VALUES
(1, 'ertakryeziu', 'ertakr@gmail.com', 'erta1234', 'administrator', ''),
(4, 'lorita', 'lorita@gmail.com', 'lori1234', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
