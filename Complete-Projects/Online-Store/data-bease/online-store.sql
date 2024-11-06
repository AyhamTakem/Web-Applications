-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 نوفمبر 2024 الساعة 17:56
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-store`
--

-- --------------------------------------------------------

--
-- بنية الجدول `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Microsoft'),
(2, 'SAMSUNG'),
(3, 'hp'),
(4, 'Apple'),
(5, 'Sencor'),
(6, 'Sony'),
(7, 'LG');

-- --------------------------------------------------------

--
-- بنية الجدول `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Game Consoles'),
(2, 'Smart devices'),
(3, 'Laptops'),
(4, 'Mobiles'),
(5, 'Electrical Devices'),
(6, 'Controlers');

-- --------------------------------------------------------

--
-- بنية الجدول `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 2073025607, 5, 1, 'pending'),
(2, 1, 1274217233, 5, 1, 'pending'),
(3, 1, 937125497, 2, 1, 'pending'),
(4, 1, 964292463, 4, 2, 'pending'),
(5, 1, 1094799253, 7, 2, 'pending'),
(6, 1, 1599522906, 4, 2, 'pending'),
(7, 1, 1341441688, 5, 1, 'pending'),
(8, 1, 1306261905, 8, 2, 'pending'),
(9, 1, 1175160052, 7, 1, 'pending'),
(10, 1, 1363442539, 4, 1, 'pending'),
(11, 1, 905970458, 4, 1, 'pending'),
(12, 1, 1878763156, 7, 2, 'pending'),
(13, 1, 1391575003, 4, 1, 'pending'),
(14, 1, 1370775498, 4, 1, 'pending'),
(15, 1, 828567835, 7, 1, 'pending'),
(16, 1, 2027691936, 7, 1, 'pending'),
(17, 1, 1623686838, 10, 1, 'pending'),
(18, 1, 1066151596, 10, 1, 'pending'),
(19, 1, 1611898482, 10, 1, 'pending'),
(20, 1, 1846669637, 10, 1, 'pending'),
(21, 1, 868366507, 10, 1, 'pending'),
(22, 1, 956579547, 11, 1, 'pending'),
(23, 1, 708202772, 12, 1, 'pending'),
(24, 1, 1922169189, 11, 1, 'pending'),
(25, 1, 224335943, 11, 1, 'pending'),
(26, 1, 1315156156, 12, 1, 'pending'),
(27, 1, 465844472, 11, 1, 'pending'),
(28, 1, 1965359482, 12, 1, 'pending'),
(29, 1, 1998758631, 10, 1, 'pending'),
(30, 1, 1655213070, 12, 1, 'pending'),
(31, 1, 2086108879, 10, 1, 'pending'),
(32, 1, 58500803, 11, 1, 'pending'),
(33, 1, 1623137179, 11, 1, 'pending');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `url_info` varchar(300) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `url_info`, `product_price`, `date`, `status`) VALUES
(10, 'ps4', 'a god console by sony', 'sony,ps4,game,console', 1, 6, 'ps4.png', 'p5.png', 'PS4-Console-wDS4.png', 'https://ar.wikipedia.org/wiki/%D8%A8%D9%84%D8%A7%D9%8A_%D8%B3%D8%AA%D9%8A%D8%B4%D9%86_4', '120', '2024-11-04 18:48:10', 'true'),
(11, 'xbox', 'any', 'xbox,game,console', 1, 1, 'p1.jpg', '71u5IC+Ln7L._AC_UF894,1000_QL80_.jpg', '6809cbb25d24c37ef0334d6c7e4c06318a758081f34b0c52e93cad8c58311bba__50057.jpg', 'https://ar.wikipedia.org/wiki/%D8%A5%D9%83%D8%B3_%D8%A8%D9%88%D9%83%D8%B3_360', '570', '2024-11-04 18:52:24', 'true'),
(12, 'iphone', 'any iphon', 'apple,iphone', 4, 4, 'iphon.png', '1249252_picture_1602843842.png', 'apple-iphone-16-pro-max-white-titanium.png', 'https://mobizil.com/iphone-14-pro-specs/', '100', '2024-11-04 18:54:01', 'true');

-- --------------------------------------------------------

--
-- بنية الجدول `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 100, 1655213070, 1, '2024-11-05 05:38:49', 'Complete'),
(4, 1, 690, 1623137179, 2, '2024-11-05 05:39:19', 'pending');

-- --------------------------------------------------------

--
-- بنية الجدول `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 1306261905, '720', 'Netbanking', '2024-11-05 05:54:10'),
(2, 2, 1175160052, '185', 'UPI', '2024-11-05 05:54:10'),
(3, 3, 1363442539, '815', 'Paypal', '2024-11-05 05:54:10'),
(4, 4, 905970458, '815', 'Paypal', '2024-11-05 05:54:10');

-- --------------------------------------------------------

--
-- بنية الجدول `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'Ayham Takem', 'Ayhamtkm@gmail.com', '$2y$10$pacW6e4Ulu5SLCMJFrTfiOK8jMIvUfY0vM3GqJE589fBWTupIP17K', '01.PNG', '::1', 'Syria, Hama', '+963 937131734');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
