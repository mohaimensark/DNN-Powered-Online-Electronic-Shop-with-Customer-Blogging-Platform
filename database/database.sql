-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2023 at 08:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `district` varchar(100) NOT NULL,
  `subdistrict` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address_card` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`district`, `subdistrict`, `city`, `address_card`) VALUES
('vnvn', 'ssddd', 'cvb', 1000000000000017),
('ddddd', 'ffff', 'wer', 1000000000000018),
('cox', 'ramu', 'palong', 1000000000000020),
('chittagong', 'hathazari', 'Jobra', 1000000000000021),
('lk', 'l', 'Chittagong', 1000000000000022),
('lk', 'l', 'Chittagong', 1000000000000023),
('lk', 'l', 'Chittagong', 1000000000000024),
('lk', 'l', 'chittagong', 1000000000000025),
('lk', 'l', 'Chittagong', 1000000000000026),
('jobra', 'l', 'Chittagong', 1000000000000027),
('lk', 'l', 'Chittagong', 1000000000000028),
('lk', 'l', 'Chittagong', 1000000000000029);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Monir', 'ahmad@gmail.com', 'a906449d5769fa7361d7ecc6aa3f6d28'),
(2, 'mohaimen', 'trainb161@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `name`, `email`) VALUES
(1, 'Aggi Southworth', 'asouthworth0@princeton.edu'),
(2, 'Thornie Diggons', 'tdiggons1@parallels.com'),
(3, 'Ivett Westley', 'iwestley2@example.com'),
(4, 'Libby Styant', 'lstyant3@shareasale.com'),
(5, 'Bernete Tisun', 'btisun4@barnesandnoble.com'),
(6, 'Carlen Ranklin', 'cranklin5@mashable.com'),
(7, 'Ardra Nafzger', 'anafzger6@furl.net'),
(8, 'Aubert Tennison', 'atennison7@engadget.com'),
(9, 'Francklin Izod', 'fizod8@g.co'),
(10, 'Carma Atger', 'catger9@newsvine.com'),
(11, 'Dael Torn', 'dtorna@imageshack.us'),
(12, 'Aurea Edards', 'aedardsb@flavors.me'),
(13, 'Virgie Diggins', 'vdigginsc@forbes.com'),
(14, 'Klarrisa Brahan', 'kbrahand@smh.com.au'),
(15, 'Phillie Avison', 'pavisone@weibo.com'),
(16, 'Lauralee Bowhey', 'lbowheyf@desdev.cn'),
(17, 'Cthrine Soots', 'csootsg@liveinternet.ru'),
(18, 'Nicol Gavagan', 'ngavaganh@meetup.com'),
(19, 'Georgi Ellam', 'gellami@wordpress.com'),
(20, 'Ellary Ffrench', 'effrenchj@sbwire.com');

-- --------------------------------------------------------

--
-- Table structure for table `api_user`
--

CREATE TABLE `api_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `api_user`
--

INSERT INTO `api_user` (`id`, `name`, `email`) VALUES
(1, 'Aggi Southworth', 'asouthworth0@princeton.edu'),
(2, 'Thornie Diggons', 'tdiggons1@parallels.com'),
(3, 'Ivett Westley', 'iwestley2@example.com'),
(4, 'Libby Styant', 'lstyant3@shareasale.com'),
(5, 'Bernete Tisun', 'btisun4@barnesandnoble.com'),
(6, 'Carlen Ranklin', 'cranklin5@mashable.com'),
(7, 'Ardra Nafzger', 'anafzger6@furl.net'),
(8, 'Aubert Tennison', 'atennison7@engadget.com'),
(9, 'Francklin Izod', 'fizod8@g.co'),
(10, 'Carma Atger', 'catger9@newsvine.com'),
(11, 'Dael Torn', 'dtorna@imageshack.us'),
(12, 'Aurea Edards', 'aedardsb@flavors.me'),
(13, 'Virgie Diggins', 'vdigginsc@forbes.com'),
(14, 'Klarrisa Brahan', 'kbrahand@smh.com.au'),
(15, 'Phillie Avison', 'pavisone@weibo.com'),
(16, 'Lauralee Bowhey', 'lbowheyf@desdev.cn'),
(17, 'Cthrine Soots', 'csootsg@liveinternet.ru'),
(18, 'Nicol Gavagan', 'ngavaganh@meetup.com'),
(19, 'Georgi Ellam', 'gellami@wordpress.com'),
(20, 'Ellary Ffrench', 'effrenchj@sbwire.com');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'asus'),
(3, 'del'),
(4, 'samsung'),
(5, 'iphone'),
(6, 'oppo'),
(8, 'HP'),
(9, 'Walton'),
(10, 'A4tech'),
(11, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_price`, `qty`, `total_price`, `user_id`) VALUES
(143, 25, 30000, 1, 30000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Laptop'),
(3, 'Mobile'),
(4, 'Mouse'),
(7, 'Headphone'),
(8, 'xbox'),
(9, 'Keyboard'),
(10, 'Monitor'),
(11, 'Hdd'),
(12, 'Powerbank');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `comment_content`) VALUES
(66, 124, 4, 'happy birthday'),
(67, 128, 2, 'my comment'),
(68, 127, 2, 'my comment'),
(69, 126, 2, 'my comment'),
(70, 125, 2, 'my comment'),
(71, 124, 2, 'My comment'),
(72, 123, 2, 'my comment'),
(73, 39, 2, 'mm'),
(74, 36, 2, 'Who is he? Agree'),
(75, 124, 2, 'Happy birthday'),
(76, 129, 2, 'last comment'),
(77, 129, 5, 'RIP nah'),
(78, 127, 5, 'ha ha..Are u joking'),
(79, 128, 5, 'sei vai');

-- --------------------------------------------------------

--
-- Table structure for table `dislike`
--

CREATE TABLE `dislike` (
  `dislike_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dislike`
--

INSERT INTO `dislike` (`dislike_id`, `post_id`, `user_id`) VALUES
(5, 37, 1),
(14, 39, 5),
(15, 37, 5),
(23, 123, 5),
(24, 125, 5),
(25, 38, 5),
(26, 124, 5);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`like_id`, `post_id`, `user_id`) VALUES
(3, 36, 1),
(5, 38, 1),
(27, 36, 5),
(41, 35, 5),
(45, 36, 2),
(46, 129, 2),
(47, 128, 2),
(48, 127, 2),
(49, 126, 2),
(50, 125, 2),
(51, 124, 2),
(52, 123, 2),
(53, 39, 2),
(54, 38, 2),
(55, 37, 2),
(56, 35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_info_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `p_id`, `qty`, `order_info_id`) VALUES
(1908, 3, 1, 1000000000000017),
(1909, 5, 2, 1000000000000018),
(1910, 6, 2, 1000000000000018),
(1911, 3, 2, 1000000000000019),
(1912, 5, 1, 1000000000000019),
(1913, 7, 2, 1000000000000020),
(1914, 24, 1, 1000000000000021),
(1915, 22, 1, 1000000000000021),
(1916, 6, 3, 1000000000000021),
(1917, 27, 3, 1000000000000022),
(1918, 25, 1, 1000000000000023),
(1919, 24, 1, 1000000000000026),
(1920, 24, 1, 1000000000000027),
(1921, 6, 1, 1000000000000028),
(1922, 25, 1, 1000000000000029);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `cardnumber` bigint(17) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pmode` varchar(100) NOT NULL,
  `date` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`cardnumber`, `user_id`, `phone`, `pmode`, `date`, `status`) VALUES
(1000000000000017, 1, '01690073333', 'cod', '2021-12-30', 'Done'),
(1000000000000018, 1, '01698827272', 'cod', '2021-12-30', 'Done'),
(1000000000000019, 1, '01698765432', 'cod', '2022-01-04', 'ordered'),
(1000000000000020, 1, '01690876542', 'cod', '2022-01-04', 'ordered'),
(1000000000000021, 1, '01690000234', 'Nagad', '2022-01-20', 'ordered'),
(1000000000000022, 8, 'j', 'cod', '2023-06-13', 'ordered'),
(1000000000000023, 8, '01752615622', 'cod', '2023-06-13', 'ordered'),
(1000000000000024, 8, '01876740922', 'bKash', '2023-06-13', 'ordered'),
(1000000000000025, 8, '01752615622', 'Nagad', '2023-06-13', 'ordered'),
(1000000000000026, 8, '01752615622', 'Nagad', '2023-06-13', 'ordered'),
(1000000000000027, 8, '01752615622', 'bKash', '2023-06-13', 'ordered'),
(1000000000000028, 8, '01752615622', 'Nagad', '2023-06-13', 'ordered'),
(1000000000000029, 8, '01752615622', 'cod', '2023-06-13', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_content`, `user_id`) VALUES
(35, 'Hi there', 5),
(36, 'He is here for nothing', 5),
(37, 'The post is form shortest path', 5),
(38, 'He is here for nothing', 5),
(39, 'you are the first poster', 5),
(123, 'another', 1),
(124, 'you', 5),
(125, 'The post is form shortest path', 5),
(126, 'Whats about my first post', 2),
(127, 'He is here for nothing', 2),
(128, 'Hi there', 2),
(129, 'Last post', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `product_title`, `product_price`, `product_image`, `description`) VALUES
(1, 2, 2, 'laptop1', 30000, 'laptop1.png', 'dddddddddddd'),
(2, 3, 4, 'mobile1', 20000, 'mobile1.png', 'ddddddd'),
(3, 4, 3, 'mouse1', 300, 'mouse1.jpg', 'gggggg'),
(5, 7, 6, 'headphone1', 150, 'headphone1.png', 'fdertttttttt'),
(6, 8, 2, 'xbox1', 700, 'xbox1.jpg', 'fgjjjjj'),
(7, 8, 2, 'xbox1', 700, 'xbox1.jpg', 'fgjjjjj'),
(9, 2, 2, 'asus1', 55000, 'asus1.png', 'asdfg'),
(15, 2, 2, 'Laptop10', 50000, 'Laptop10.jpg', 'fggggggg'),
(16, 2, 2, 'Laptop11', 60000, 'Laptop11.png', 'vnnn'),
(17, 4, 4, 'mouse10', 300, 'mouse10.png', 'hffffff'),
(18, 4, 4, 'mouse11', 250, 'mouse11.png', 'jgjgjg'),
(19, 4, 4, 'mouse12', 200, 'mouse12.png', 'hjiyt'),
(20, 8, 3, 'xbox10', 40000, 'xbox10.jpg', 'fhfhfh'),
(21, 8, 4, 'xbox11', 36000, 'xbox11.png', 'jgjgj'),
(22, 8, 4, 'xbox12', 38000, 'xbox12.png', 'kiutr'),
(23, 3, 4, 'phone10', 20000, 'phone10.png', 'hjkk'),
(24, 3, 4, 'phone11', 26000, 'phone11.png', 'jkiu'),
(25, 3, 4, 'phone12', 30000, 'phone12.jpg', 'sdddee'),
(26, 3, 5, 'phone13', 34000, 'phone13.png', 'fgg'),
(28, 9, 10, 'Mechanic Keyboard', 2500, 'Mechanic Keyboard.jpg', 'Comfortable keyboard'),
(29, 10, 4, 'Thin LED Monitor', 25000, 'Thin LED Monitor.png', 'Clear crystal view for image and video'),
(30, 11, 2, '1T storage', 5000, '1T storage.jpg', 'A trusted external storage');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(123) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `rating`, `review`, `DateOfBirth`, `username`) VALUES
(1, 'Monir', 'ahhh@gmail.com', 'e8dc4081b13434b45189a720b77b6818', 4, '', '0000-00-00', 'monir'),
(2, 'nah', 'nah@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 5, '', '0000-00-00', ''),
(3, 'Monitor', 'trainb161@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, '', '0000-00-00', ''),
(4, 'Birthday trial', 'm@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '2023-06-02', 'bth'),
(5, 'Shortest Path', 'sp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 5, 'Hi', '2023-06-30', ''),
(6, 'nayem', 'na@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', -1, '', '2023-06-15', 'iamnayem'),
(7, 'oli', 'oli@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 5, '', '2023-06-12', 'oli'),
(8, 'Mohaimen', 'mohaimensarkerofficial@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 'fine', '2023-06-13', 'mohaimen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD UNIQUE KEY `address_card` (`address_card`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_user`
--
ALTER TABLE `api_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_fkpost` (`post_id`),
  ADD KEY `comment_fkuser` (`user_id`);

--
-- Indexes for table `dislike`
--
ALTER TABLE `dislike`
  ADD PRIMARY KEY (`dislike_id`),
  ADD KEY `dislike_fkpost` (`post_id`),
  ADD KEY `dislike_fkuser` (`user_id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `like_fkpost` (`post_id`),
  ADD KEY `like_fkuser` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`cardnumber`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_fk1` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `api_user`
--
ALTER TABLE `api_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `dislike`
--
ALTER TABLE `dislike`
  MODIFY `dislike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1923;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `cardnumber` bigint(17) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000000000030;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_fkpost` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `comment_fkuser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `dislike`
--
ALTER TABLE `dislike`
  ADD CONSTRAINT `dislike_fkpost` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `dislike_fkuser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_fkpost` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `like_fkuser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_fk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;