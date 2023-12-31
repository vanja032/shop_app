-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 06:52 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `created`) VALUES
(1, 'Garden', 'Garden category involves items that are used in the garden', '2023-06-18 23:07:00'),
(2, 'Devices', 'Home devices', '2023-06-18 23:11:57'),
(3, 'PC and Mobile', 'PC and Mobile devices', '2023-06-18 23:12:22'),
(4, 'Home tools', 'Home tools and devices', '2023-06-18 23:12:49'),
(5, 'Food and drinks', 'Items that are used in the kitchen', '2023-06-18 23:14:05'),
(6, 'Beauty', 'Items for beauty', '2023-06-18 23:14:37'),
(7, 'Fashion', 'Clothes and footwear', '2023-06-18 23:15:16'),
(8, 'Toys', 'Toys for kids', '2023-06-18 23:15:30'),
(9, 'Car tools', 'Items for car styling and repairing', '2023-06-18 23:16:10'),
(10, 'Sports and travel', 'Sports and travel', '2023-06-18 23:16:27'),
(11, 'Other', 'Other categories', '2023-06-18 23:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `picture_url` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `description`, `category_id`, `picture_url`, `price`, `quantity`) VALUES
(1, 'Tom Tailor Parfem for him, 30ml', 'Živi svoj život. Deli svoju sreću, bez kompromisa. Jesi li spreman da kažes da?\r\nU nemirnim vremenima globalne tuge, čeznemo za bezbrižnom srećom. Samo hrabar optimizam je jedina posledica. Usudite se biti autentični, usudite se reći DA avanturama. Idite tamo gde vas slave, ne gde vas tolerišu!', 6, 'https://www.shoppster.rs/cdn-cgi/image/format=auto/https://www.shoppster.rs/medias/4051395172144-01-1-ung-680Wx510H?context=bWFzdGVyfGltYWdlc3wzMTUyOXxpbWFnZS9qcGVnfGFEbGtMMmc0Wmk4eE1UYzFOemd5T1RZMU1qVXhNQzgwTURVeE16azFNVGN5TVRRMFh6QXhYekZmZFc1bkxUWTRNRmQ0TlRFd1NBfDczMmVlNDQzOWQxNGVmMmQxYmI3MWJhY2QxZTEyYWMwZjA5NzY1ZmIwYzk3YzQ4NzM3MTAwZDA5MGZiN2QxMDI', 21.99, 1),
(2, 'Clatronic Ručni usisivač AKS 832', 'Karakteristike:\r\nOprema: Dva uzana nastavka nastavka, dodatak za vlažno usisavanje, četka\r\nPogodan za suvo i vlažno usisavanje\r\nVečni, perivi filter\r\nBaterija: 1400 mAh\r\nAdapter: 230 V, 50 Hz 12 V', 2, 'https://www.shoppster.rs/cdn-cgi/image/format=auto,fit=contain,width=575/https://www.shoppster.rs/medias/4006160810554-01-1-ung-2000Wx1500H?context=bWFzdGVyfGltYWdlc3wyMDU1MDZ8aW1hZ2UvanBlZ3xhRGxtTDJnMllpOHhNREE1TWpReU9USTNPVEkyTWk4ME1EQTJNVFl3T0RFd05UVTBYekF4WHpGZmRXNW5MVEl3TURCWGVERTFNREJJfDllNWE2NTgxZjIzZWQxZGNhZDE1YWE4NDZlMDBhYTc1NTIwNmIyM2IxMmI2YTEyNmUyOWRjMzg1NWY5ZTc1Y2E', 49.99, 2);

-- --------------------------------------------------------

--
-- Table structure for table `items_orders`
--

CREATE TABLE `items_orders` (
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `memo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_orders`
--

INSERT INTO `items_orders` (`created`, `order_id`, `item_id`, `quantity`, `memo`) VALUES
('2023-06-26 02:43:46', 12, 1, 18, 'Order No. 12, Item No. 1, Quantity 18'),
('2023-06-26 02:49:42', 13, 1, 4, 'Order No. 13, Item No. 1, Quantity 4'),
('2023-06-26 03:09:39', 14, 1, 1, 'Order No. 14, Item No. 1, Quantity 1'),
('2023-06-26 03:13:07', 15, 1, 3, 'Order No. 15, Item No. 1, Quantity 3'),
('2023-06-26 03:19:54', 16, 1, 21, 'Order No. 16, Item No. 1, Quantity 21'),
('2023-06-26 03:22:09', 17, 1, 17, 'Order No. 17, Item No. 1, Quantity 17'),
('2023-06-26 03:22:22', 18, 1, 4, 'Order No. 18, Item No. 1, Quantity 4'),
('2023-06-26 03:23:08', 19, 1, 1, 'Order No. 19, Item No. 1, Quantity 1'),
('2023-06-26 03:39:23', 20, 1, 22, 'Order No. 20, Item No. 1, Quantity 22'),
('2023-06-26 14:41:22', 21, 1, 4, 'Order No. 21, Item No. 1, Quantity 4'),
('2023-06-26 15:27:36', 22, 2, 1, 'Order No. 22, Item No. 2, Quantity 1'),
('2023-06-26 17:46:55', 23, 1, 6, 'Order No. 23, Item No. 1, Quantity 6'),
('2023-06-26 17:46:55', 23, 2, 11, 'Order No. 23, Item No. 2, Quantity 11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status_id` int(11) NOT NULL,
  `memo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `status_id`, `memo`) VALUES
(12, 20, 1, 'Order by user No. 20'),
(13, 20, 3, 'Order by user No. 20'),
(14, 20, 4, 'Order by user No. 20'),
(15, 20, 4, 'Order by user No. 20'),
(16, 20, 1, 'Order by user No. 20'),
(17, 20, 1, 'Order by user No. 20'),
(18, 20, 2, 'Order by user No. 20'),
(19, 20, 4, 'Order by user No. 20'),
(20, 20, 1, 'Order by user No. 20'),
(21, 21, 4, 'Order by user No. 21'),
(22, 21, 2, 'Order by user No. 21'),
(23, 20, 4, 'Order by user No. 20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `description`, `created`) VALUES
(1, 'user', 'User role for shop users.', '2023-06-16 01:32:38'),
(2, 'admin', 'Administrator user', '2023-06-26 18:31:04'),
(3, 'manager', 'Manager user', '2023-06-26 18:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `name`, `description`, `created`) VALUES
(1, 'pending', 'Pending status', '2023-06-26 02:22:14'),
(2, 'approved', 'Approved status', '2023-06-26 02:24:50'),
(3, 'rejected', 'Rejected status', '2023-06-26 02:25:07'),
(4, 'canceled', 'Canceled status', '2023-06-26 02:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(200) NOT NULL,
  `profile_picture` varchar(500) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password_hash`, `profile_picture`, `role_id`, `created`) VALUES
(20, 'Petar', 'Petrovic', 'petar123', 'petar@email.com', 'd38031a34777569cb437ba620952f099e62c9cf4746313c23370a936a5093dbf47b0dad05670567ec507ddadac210ff29dba3b835558c10ced16829c367cbcc5', 'https://cdn.pixabay.com/photo/2015/01/08/18/29/entrepreneur-593358_1280.jpg', 1, '2023-06-16 12:29:01'),
(21, 'Zikica', 'Zikica', 'zikica123', 'zikica@gmail.com', '23e9b276dcba452db20af6af4b18822fb964ccc400506b48711c74b36d5787687ad1199a398e66cd14c2bc39e1179128ca6529180675bcb5373b9d3a4a163881', 'https://cdn.pixabay.com/photo/2019/05/24/10/59/business-man-4226005_1280.jpg', 1, '2023-06-22 10:49:47'),
(22, 'Milos', 'Milosevic', 'manager123', 'manager@email.com', '23e9b276dcba452db20af6af4b18822fb964ccc400506b48711c74b36d5787687ad1199a398e66cd14c2bc39e1179128ca6529180675bcb5373b9d3a4a163881', 'https://cdn.pixabay.com/photo/2019/05/24/10/59/business-man-4226005_1280.jpg', 3, '2023-06-22 10:49:47'),
(23, 'Administrator', 'Administrator', 'administrator123', 'admin@email.com', '23e9b276dcba452db20af6af4b18822fb964ccc400506b48711c74b36d5787687ad1199a398e66cd14c2bc39e1179128ca6529180675bcb5373b9d3a4a163881', 'https://cdn.pixabay.com/photo/2019/05/24/10/59/business-man-4226005_1280.jpg', 2, '2023-06-22 10:49:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `items_orders`
--
ALTER TABLE `items_orders`
  ADD PRIMARY KEY (`created`,`order_id`,`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `items_orders`
--
ALTER TABLE `items_orders`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
