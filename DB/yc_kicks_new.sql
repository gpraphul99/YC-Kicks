-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 12:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yc_kicks_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `quantity`, `price`, `variation_id`) VALUES
(26, 3, 1, 6565, 16),
(27, 3, 1, 6000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Nike'),
(2, 'Air Jordan'),
(5, 'Adidas'),
(8, 'New Balance'),
(9, 'Vans'),
(10, 'Converse'),
(11, 'Shoes Related Products');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivered_to` varchar(255) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivered_to`, `phone_no`, `address`, `pay_method`, `pay_status`, `order_status`, `order_date`, `order_note`) VALUES
(1, 3, 'Self', '9897868675', 'Matepani-12', 'Cash', 1, 1, '2022-04-06', 'sdfa'),
(2, 3, 'Self', '9803267633', 'Matepani-12', 'Cash', 0, 1, '2022-04-07', 'Deliver it soon. Thanks'),
(4, 3, 'test2', '9807688879', 'test', 'Khalti', 1, 0, '2022-04-16', ''),
(5, 5, 'Self', '9806348675', 'Newroad', 'Cash', 0, 0, '2022-04-17', ''),
(6, 5, 'Finaltest', '9805643882', 'Matepani-12', 'Khalti', 1, 0, '2022-04-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `variation_id`, `quantity`, `price`) VALUES
(1, 1, 3, 1, 6500),
(2, 1, 12, 2, 6000),
(3, 2, 10, 2, 6500),
(5, 4, 12, 1, 6000),
(6, 5, 11, 1, 7000),
(7, 6, 10, 1, 6500);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `unit_price`, `uploaded_date`, `category_id`, `product_desc`) VALUES
(13, 'Air Jordan 1 Mocha', './uploads/755658.jpg', 6500, '2022-04-01', 2, 'The upper of the Jordan 1 High Dark Mocha features a Sail leather base with black leather surrounding the toe box and Mocha suede on the heel and ankle. A black leather Swoosh, Jordan Wings logo on the ankle, and Nike Air branding on the tongue pays homage to branding that can be found on the original 1985 Jordan 1. A Sail midsole and black outsole complete this Black Toe design.'),
(14, 'Air Jordan 1  Retro High Shadow', './uploads/856292.webp', 6500, '2022-03-31', 2, 'Despite the name, the Air Jordan 1 Shadows are a pair that will put any fit of yours firmly in the spotlight. This very rare OG colorway has now hit shelves only three times, making these a must-own for any AJ1 collector. The shoe features a black and grey leather upper with original '),
(15, 'Air Jordan 4 Black Cat', './uploads/393118.jpg', 6500, '2022-04-01', 2, 'A revered icon of both basketball and pop-culture history, the Air Jordan IV has a long line of storied colorways in its 32 year history. One of the most remarkable, the Black Cat, spawned from one of MJ’s nicknames, is back.'),
(16, 'Air Jordan 1 University Blue	', './uploads/252489.jpg', 7000, '2022-03-31', 2, 'The upper of the Air Jordan 1 High University Blue is composed of a white and black tumbled leather upper with University Blue Durabuck overlays. Following traditional Jordan 1 detailing, a Nike Air woven label is located on the tongue and an Air Jordan Wings Logo is printed on the ankle. A white midsole and University Blue outsole complete rejuvenated classic.'),
(17, 'Air Jordan 4 Oreo', './uploads/img01 (5).webp', 6000, '2022-04-01', 2, 'A revered icon of both basketball and pop-culture history, the Air Jordan IV has a long line of storied colorways in its 32 year history. One of the most remarkable, the Black Cat, spawned from one of MJ’s nicknames, is back.'),
(18, 'Air Jordan 1 Electro Orange	', './uploads/aj1.webp', 6500, '2022-03-31', 2, 'A revered icon of both basketball and pop-culture history, the Air Jordan IV has a long line of storied colorways in its 32 year history. One of the most remarkable, the Black Cat, spawned from one of MJ’s nicknames, is back.'),
(25, 'New Balance 530 Silver Line', './uploads/new balance 530 silver line.jpg', 6565, '2022-04-18', 8, 'The New Balance 530 White Silver Navy features a white mesh upper with metallic silver and white leather overlays. On the quarter panel, a grey New Balance logo outlined in navy adds contrast. '),
(26, 'Air Force 1 Triple White', './uploads/Nike-Air-Force-1-Low-Triple-White.jpg', 5500, '2022-04-18', 1, 'The Nike Air Force 1 Triple White lets a new wave of comfort and style take hold with a design that celebrates the rebellious underground rave scene. This iteration takes that inspiration even further with reflective-design details designed to work with the strobe lighting often found on a dance floor to make you and your moves shine. Slip them on and let the dance party begin.'),
(27, 'New Balance Aime Leon Dore White Green', './uploads/new balance 550 aime leon dore white green.jpg', 5000, '2022-04-18', 8, 'New Balance Aime Leon Dore White Green'),
(28, 'New Balance 990 Grey', './uploads/new balance 990 grey.jpg', 5000, '2022-04-18', 8, 'New Balance 990 Grey'),
(29, 'Air Force 1 Travis Scott Edition', './uploads/Airforce 1 Travis Scott.jpg', 5500, '2022-04-18', 1, 'Air Force 1 Travis Scott Edition'),
(30, 'Vans Sk8 Hi', './uploads/224161.jpeg', 4500, '2022-04-18', 9, 'The Sk8-Hi was introduced in 1978 as Style 38, and showcased the now-iconic Vans Sidestripe on a new, innovative high top silhouette. As only the second model featuring the recognizable marker formerly known as the jazz stripe, the Sk8-Hi brought a whole new look to the Vans family.  Honoring that first legendary high top, the Sk8-Hi is made with sturdy suede and canvas uppers in a variety of classic and unexpected colorways. This lace-up shoe also includes re-enforced toe caps, supportive padded collars, and signature rubber waffle outsoles.'),
(31, 'Vans Old Skool', './uploads/116166.jpg', 4500, '2022-04-18', 9, 'The Old Skool, Vans classic skate shoe and the first to bare the iconic side stripe, has a low-top lace-up silhouette with a durable suede and canvas upper with padded tongue and lining and Vans signature Waffle Outsole.'),
(32, 'Converse Run Star Hike ', './uploads/928421.jpeg', 4700, '2022-04-18', 10, 'A chunky platform and jagged rubber sole put an unexpected twist on your everyday Chucks. Details like a canvas build, rubber toe cap and Chuck Taylor ankle patch stay true to the original, while a molded platform, two-tone outsole and rounded heel give off futuristic vibes.'),
(33, 'Converse High X CDG', './uploads/366835.jpg', 4200, '2022-04-18', 10, 'Japanese designer Rei Kawakubo is one of the most prolific fashion designers of all time. Aside from her Comme des Garçons collections, she has had numerous sneaker collaborations over the years. One of the most outstanding of these collaborations involves her different iterations of work modifying and styling up the Converse Chuck Taylor with her sub-label Comme des Garçons PLAY. Kawakubo’s first iteration of his Converse Chuck Taylors came about in 2009 when she modified the original by stripping back its contrast stitching. Six years later, in 2015, she took the All Star Chuck 70s as her template and created a shoe so beloved that it has been re-released every year since.'),
(34, 'Adidas Stan Smith White', './uploads/216636.jpg', 4700, '2022-04-18', 5, 'Adidas Stan Smith White. '),
(35, 'Anti Crease For Shoes', './uploads/329375.jpg', 200, '2022-04-20', 11, 'As you have already invested a lot in the shoes, we want you to have your shoes look good for a long period of time. Wearing this anti-crease protection will help to eradicate any creases that will form after a certain time of wearing the shoes and your shoes will still look as good as new.');

-- --------------------------------------------------------

--
-- Table structure for table `product_size_variation`
--

CREATE TABLE `product_size_variation` (
  `variation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size_variation`
--

INSERT INTO `product_size_variation` (`variation_id`, `product_id`, `size_id`, `stock_quantity`) VALUES
(2, 14, 3, 7),
(3, 13, 2, 5),
(4, 13, 3, 7),
(5, 13, 5, 10),
(7, 13, 6, 8),
(8, 14, 7, 10),
(9, 15, 7, 10),
(10, 15, 6, 3),
(11, 16, 7, 8),
(12, 17, 9, 4),
(13, 18, 7, 10),
(14, 18, 6, 5),
(15, 30, 1, 10),
(16, 25, 7, 9),
(17, 34, 1, 5),
(18, 34, 3, 6),
(19, 34, 8, 5),
(20, 29, 1, 2),
(21, 29, 5, 5),
(22, 29, 8, 20),
(23, 30, 3, 12),
(24, 30, 6, 21),
(25, 32, 5, 7),
(26, 33, 3, 5),
(27, 27, 8, 5),
(28, 28, 5, 5),
(29, 26, 8, 12),
(30, 27, 9, 4),
(31, 33, 7, 4),
(32, 32, 2, 6),
(35, 30, 9, 4),
(36, 33, 6, 5),
(37, 29, 3, 6),
(38, 29, 2, 7),
(39, 35, 7, 5),
(40, 35, 9, 20),
(41, 35, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_desc` text NOT NULL,
  `review_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `product_id`, `review_desc`, `review_date`) VALUES
(2, 3, 16, 'Awesome and comfortable shoes.', '2022-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_number`) VALUES
(1, 35),
(2, 36),
(3, 37),
(5, 38),
(6, 39),
(7, 40),
(8, 41),
(9, 42);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `contact_no` varchar(10) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `user_password`, `isAdmin`, `registered_at`, `contact_no`, `user_address`) VALUES
(1, 'testuser', 'test@gmail.com', '$2y$10$b3JEnt1.dxDX7ru28KQl7.oqBCuecZbnrEk0k8YvqQcRvOLfvA/BK', 0, '2022-03-14', '9802344544', 'test1'),
(2, 'admin', 'admin@gmail.com', '$2y$10$fl4bDKHSwEW6g0.U4HN5huAMyaUkkm2f.ZhgqiTW8ZEX2Iie9uVlu', 1, '2022-03-10', '9878273333', 'pokhara'),
(3, 'test2', 'test2@gmail.com', '$2y$10$.1scotoVr/oYtprE9bWh9e5JPxpAhm6onDLzJ6GHKZGLAZUJulzmK', 0, '2022-03-19', '9832732733', 'newroad'),
(4, 'newuser', 'user@gmail.com', '$2y$10$cx6XgSpb/e3DlzkmYadEYuilLvxPhfjrukLvoERJtynR/GRsxp7Gq', 0, '2022-03-20', '9839873823', 'newroad'),
(5, 'Finaltest', 'testfinal@gmail.com', '$2y$10$nlklDxK5t8d1zdjhqIzzXecUTmQ0XWhkufH0oAPRup0Qpvjisvdjy', 0, '2022-04-17', '9805643882', 'Matepani-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `uc_uv` (`user_id`,`variation_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  ADD PRIMARY KEY (`variation_id`),
  ADD UNIQUE KEY `uc_ps` (`product_id`,`size_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  ADD CONSTRAINT `product_size_variation_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_size_variation_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
