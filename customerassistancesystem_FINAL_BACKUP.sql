-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2019 at 05:43 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customerassistancesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_ID` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_mobile_num` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_ID`, `admin_name`, `admin_mobile_num`, `admin_password`) VALUES
(1, 'Admin_CAS', '09123456789', 'adminADCP');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_ID` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_ID` int(11) NOT NULL,
  `number_guest` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `booking_approve` tinyint(1) NOT NULL DEFAULT '0',
  `booking_approve_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_ID`, `guest_id`, `room_ID`, `number_guest`, `check_in`, `check_out`, `booking_approve`, `booking_approve_time`, `status`) VALUES
(1, 1, 1, 3, '2019-02-23', '2019-02-24', 1, '2019-02-22 20:11:05', 1),
(2, 12, 2, 3, '2019-02-26', '2019-02-27', 1, '2019-02-26 14:37:18', 1),
(3, 17, 4, 5, '2019-02-28', '2019-03-01', 1, '2019-02-28 01:58:15', 1),
(4, 18, 9, 5, '2019-02-28', '2019-03-02', 1, '2019-02-28 02:30:59', 0),
(5, 18, 9, 5, '2019-03-08', '2019-03-15', 1, '2019-02-28 02:35:51', 0),
(6, 18, 9, 3, '2019-03-08', '2019-03-09', 1, '2019-02-28 04:19:43', 0),
(7, 8, 3, 4, '2019-03-01', '2019-03-02', 0, '0000-00-00 00:00:00', 0),
(8, 18, 3, 5, '2019-03-04', '2019-03-09', 1, '2019-03-04 05:41:52', 0),
(9, 18, 3, 5, '2019-03-11', '2019-03-15', 1, '2019-03-04 05:46:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feed_back`
--

CREATE TABLE `feed_back` (
  `feed_back_ID` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `feed_back_details` varchar(500) DEFAULT NULL,
  `rating` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed_back`
--

INSERT INTO `feed_back` (`feed_back_ID`, `guest_id`, `feed_back_details`, `rating`) VALUES
(0, 1, 'Amazing Application!! Good job to the developers!!', 5);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `product_ID` varchar(45) NOT NULL,
  `category_ID` int(11) NOT NULL,
  `food_price` double(8,2) NOT NULL,
  `food_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`product_ID`, `category_ID`, `food_price`, `food_image`) VALUES
('FD001', 2, 50.00, 'backend/menu/photos/dinuguan.jpg'),
('FD002', 1, 45.00, 'backend/menu/photos/chicken.jpg'),
('FD003', 2, 89.00, 'backend/menu/photos/inasal.jpg'),
('FD004', 1, 40.00, 'backend/menu/photos/kinalas.jpg'),
('FD005', 3, 67.00, 'backend/menu/photos/spag.jpg'),
('FD006', 2, 70.00, 'backend/menu/photos/sinigang.jpg'),
('FD007', 2, 60.00, 'backend/menu/photos/index.jpg'),
('FD008', 2, 60.00, 'backend/menu/photos/pakbet.jpg'),
('FD009', 2, 40.00, 'backend/menu/photos/lumpia.jpg'),
('FD010', 2, 65.00, 'backend/menu/photos/bicol.jpg'),
('FD011', 2, 70.00, 'backend/menu/photos/tinola.jpg'),
('FD012', 2, 75.00, 'backend/menu/photos/chickenadobo2.jpg'),
('FD013', 2, 31.00, 'backend/menu/photos/ice_tea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`category_ID`, `category_name`, `link`) VALUES
(1, 'Breakfast', 'https://ichef.bbci.co.uk/food/ic/food_16x9_832/recipes/one_pot_chorizo_and_15611_16x9.jpg'),
(2, 'Lunch', 'https://ichef.bbci.co.uk/food/ic/food_16x9_832/recipes/one_pot_chorizo_and_15611_16x9.jpg'),
(3, 'Dinner', 'https://ichef.bbci.co.uk/food/ic/food_16x9_832/recipes/one_pot_chorizo_and_15611_16x9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `g_mobile_num` varchar(255) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `first_name`, `last_name`, `g_mobile_num`, `username`, `password`) VALUES
(1, 'Mohammed', 'Dela Cruz', '09123456789', 'mdelacruz', 'delacruz123456'),
(2, 'Raymund', 'Amata', '09356481645', 'ramata', 'amata123456'),
(4, 'Ben', 'Cariazo', '+639644726578', 'ben123', 'ben123'),
(5, 'Michael', 'Ragodon', '+639768371623', 'michael111', 'michael111'),
(6, 'John Carlo', 'Dagpin', '+639123156245', 'carlo123', 'carlo123'),
(7, 'Frances Adelle', 'De Ramos', '+639127364615', 'adelle95', 'adelle95'),
(8, 'Rene', 'Dagpin Jr', '+639561647172', 'Rinii09', 'Rinii09'),
(9, 'Maria Theresa', 'Tango', '+639646127414', 'maria32', 'maria32'),
(10, 'Jonathan', 'Bon', '+639874612412', 'jonat4', 'jonat4'),
(11, 'Raul', 'Dela Rosa', '+639712634124', 'rauul24', 'rauul24'),
(12, 'Jay-Ar', 'Dela Cruz', '+639214786512', 'jhay121', 'jhay121'),
(13, 'Marcus Ibrahim', 'Dizon', '+639716256125', 'macus96', 'macus96'),
(14, 'Susan', 'Vascuez', '+639741625125', 'ManaySusan45', 'ManaySusan45'),
(15, 'Ariel', 'Bejison', '+639126324115', 'aye23', 'aye23'),
(16, 'Marck', 'Sta. Ines', '+639216321461', 'marckyboy24', 'marckyboy24'),
(17, 'Edbert', 'Abundabar', '+631234567890', 'edbert', 'hahaha'),
(18, 'A', 'A', '+631111111111', 'A', 'hahaha');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE `kitchen` (
  `chef_ID` int(11) NOT NULL,
  `chef_name` varchar(255) NOT NULL,
  `c_mobile_num` varchar(255) NOT NULL,
  `chef_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kitchen`
--

INSERT INTO `kitchen` (`chef_ID`, `chef_name`, `c_mobile_num`, `chef_password`) VALUES
(1, 'Chef_CAS', '09123456789', 'chefADCP');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(11) NOT NULL,
  `booking_ID` int(11) NOT NULL,
  `room_ID` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `o_approve_by_admin` tinyint(1) NOT NULL,
  `o_approve_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order_done` tinyint(1) NOT NULL,
  `order_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `booking_ID`, `room_ID`, `order_time`, `o_approve_by_admin`, `o_approve_time`, `order_done`, `order_status`) VALUES
(1, 1, 1, '2019-02-22 20:19:57', 1, '2019-02-22 20:19:57', 0, 'Processing'),
(2, 1, 1, '2019-02-22 21:17:48', 1, '2019-02-22 21:17:48', 0, 'Done'),
(3, 1, 1, '2019-02-23 16:27:47', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(5, 1, 1, '2019-02-23 16:33:04', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(6, 1, 1, '2019-02-23 16:36:53', 2, '2019-02-23 16:37:12', 0, 'Not Approved'),
(7, 2, 2, '2019-02-26 14:38:00', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(8, 1, 1, '2019-02-26 16:06:37', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(9, 1, 1, '2019-02-26 16:12:18', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(10, 2, 2, '2019-02-26 16:33:25', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(11, 3, 4, '2019-02-28 01:58:33', 1, '2019-02-28 01:59:31', 1, 'Done'),
(12, 1, 1, '2019-02-28 02:20:10', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(13, 4, 9, '2019-02-28 02:31:19', 1, '2019-02-28 02:31:52', 1, 'Done'),
(14, 4, 9, '2019-02-28 02:31:32', 1, '2019-02-28 02:32:13', 1, 'Done'),
(15, 5, 9, '2019-02-28 02:36:08', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(16, 6, 9, '2019-02-28 04:20:27', 0, '0000-00-00 00:00:00', 0, 'Pending'),
(17, 8, 3, '2019-03-04 05:42:37', 1, '2019-03-04 05:43:49', 1, 'Done'),
(18, 9, 3, '2019-03-04 05:46:38', 1, '2019-03-04 05:47:33', 0, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `order_line_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `product_ID` varchar(45) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`order_line_ID`, `order_ID`, `product_ID`, `quantity`, `subtotal`) VALUES
(1, 1, 'FD001', 1, 50.00),
(2, 2, 'RD001', 0, 0.00),
(3, 2, 'FD002', 1, 45.00),
(4, 2, 'FD004', 1, 40.00),
(5, 3, 'FD003', 1, 89.00),
(6, 3, 'FD013', 1, 31.00),
(7, 3, 'FD009', 1, 40.00),
(8, 5, 'RS002', 0, 0.00),
(9, 6, 'RS003', 0, 0.00),
(10, 7, 'FD002', 1, 45.00),
(11, 7, 'FD013', 1, 31.00),
(12, 8, 'FD004', 1, 40.00),
(13, 9, 'FD008', 1, 60.00),
(14, 9, 'FD013', 1, 31.00),
(15, 10, 'RD001', 0, 0.00),
(16, 11, 'FD001', 1, 50.00),
(17, 11, 'FD002', 1, 45.00),
(18, 12, 'FD001', 1, 50.00),
(19, 12, 'FD012', 5, 375.00),
(20, 13, 'FD004', 1, 40.00),
(21, 13, 'FD013', 1, 31.00),
(22, 14, 'FD001', 1, 50.00),
(23, 14, 'FD004', 1, 40.00),
(24, 15, 'FD003', 1, 89.00),
(25, 16, 'FD013', 4, 124.00),
(26, 17, 'FD003', 1, 89.00),
(27, 18, 'FD001', 1, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` varchar(45) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(45) NOT NULL,
  `Availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `product_type`, `Availability`) VALUES
('FD001', 'Dinuguan', 'food', 1),
('FD002', 'Chicken Rice', 'food', 1),
('FD003', 'Chicken Inasal', 'food', 1),
('FD004', 'Kinalas', 'food', 1),
('FD005', 'Charbonara', 'food', 1),
('FD006', 'Sinigang na baboy', 'food', 1),
('FD007', 'Kare-kare', 'food', 1),
('FD008', 'Pinakbet', 'food', 1),
('FD009', 'Lumpiang Shanghai', 'food', 1),
('FD010', 'Bicol Express', 'food', 1),
('FD011', 'Tinolang Manok', 'food', 1),
('FD012', 'Chicken Adobo', 'food', 1),
('FD013', 'Ice Tea', 'food', 1),
('RD001', 'Room Fix', 'room_service', 0),
('RS002', 'Room Clean', 'room_service', 0),
('RS003', 'Change Bed Sheets', 'room_service', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_ID` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `room_price` double(8,2) NOT NULL,
  `room_type` char(4) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_availability` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_ID`, `room_name`, `room_price`, `room_type`, `room_capacity`, `room_availability`) VALUES
(1, 'Room 1', 5000.00, 'A', 4, 0),
(2, 'Room 2', 2500.00, 'NA', 6, 0),
(3, 'Catleya A', 3500.00, 'A', 5, 0),
(4, 'Catleya B', 3500.00, 'A', 5, 0),
(5, 'Dama de Noche A', 3500.00, 'A', 5, 1),
(6, 'Dama de Noche B', 3500.00, 'A', 5, 1),
(7, 'Mariposa A', 3500.00, 'A', 5, 1),
(8, 'Mariposa B', 3500.00, 'A', 5, 1),
(9, 'Waling waling A', 3500.00, 'A', 5, 1),
(10, 'Waling waling B', 3500.00, 'A', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_service`
--

CREATE TABLE `room_service` (
  `product_ID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_service`
--

INSERT INTO `room_service` (`product_ID`) VALUES
('RD001'),
('RS002'),
('RS003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_ID`),
  ADD KEY `fkIdx_54` (`guest_id`),
  ADD KEY `fkIdx_58` (`room_ID`);

--
-- Indexes for table `feed_back`
--
ALTER TABLE `feed_back`
  ADD PRIMARY KEY (`feed_back_ID`),
  ADD KEY `fkIdx_223` (`guest_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `fkIdx_142` (`category_ID`),
  ADD KEY `fkIdx_255` (`product_ID`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD PRIMARY KEY (`chef_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `fkIdx_103` (`booking_ID`),
  ADD KEY `fkIdx_187` (`room_ID`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`order_line_ID`),
  ADD KEY `fkIdx_261` (`product_ID`),
  ADD KEY `fkIdx_296` (`order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_ID`);

--
-- Indexes for table `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `fkIdx_258` (`product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kitchen`
--
ALTER TABLE `kitchen`
  MODIFY `chef_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `order_line_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_54` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`),
  ADD CONSTRAINT `FK_58` FOREIGN KEY (`room_ID`) REFERENCES `room` (`room_ID`);

--
-- Constraints for table `feed_back`
--
ALTER TABLE `feed_back`
  ADD CONSTRAINT `FK_223` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `FK_142` FOREIGN KEY (`category_ID`) REFERENCES `food_category` (`category_ID`),
  ADD CONSTRAINT `FK_255` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_103` FOREIGN KEY (`booking_ID`) REFERENCES `booking` (`booking_ID`),
  ADD CONSTRAINT `FK_187` FOREIGN KEY (`room_ID`) REFERENCES `room` (`room_ID`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `FK_261` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`),
  ADD CONSTRAINT `FK_296` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`);

--
-- Constraints for table `room_service`
--
ALTER TABLE `room_service`
  ADD CONSTRAINT `FK_258` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
