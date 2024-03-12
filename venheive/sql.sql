-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 08:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` int(11) NOT NULL,
  `Category_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Category_Name`) VALUES
(1, 'Food and Dining'),
(2, 'Services'),
(3, 'Retail'),
(4, 'Health and Wellness'),
(5, 'Technology and Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_redNo` int(11) NOT NULL,
  `Customer_email` varchar(255) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `Reg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_redNo`, `Customer_email`, `login_password`, `first_name`, `middle_name`, `last_name`, `Reg_time`) VALUES
(1, 'shankar.rakh22@vit.edu', 'omg', 'shankar', 'Dhananjay', 'rakh', '2023-10-12 23:09:46'),
(2, 'shankar.rakh2004@gmail.com', 'hiithere', 'shanakr', 'someone', 'something', '2023-10-12 23:34:50'),
(4, 'shubham.patil221@vit.edu', 'patil', 'shubham', 'suhas', 'patil', '2023-11-13 16:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `Manufacturer_id` int(11) NOT NULL,
  `Manufacturer_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`Manufacturer_id`, `Manufacturer_Name`) VALUES
(0, 'None of the Below'),
(1, 'Amul'),
(2, 'Apollo Pharmacy'),
(3, 'Haldiram\'s'),
(4, 'Himalaya Herbals'),
(5, 'Parle'),
(6, 'Tata'),
(7, 'Cosmic Byte'),
(8, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Manufacturer_id` int(11) DEFAULT NULL,
  `Category_id` int(11) NOT NULL,
  `sub_Category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Name`, `Quantity`, `Price`, `Manufacturer_id`, `Category_id`, `sub_Category_id`, `description`, `vendor_id`) VALUES
(8, 'Smartphonex', 12, 18990, 6, 5, 22, '5g mobilephone with latest snapdragon 7 gen 2 ,5000 mah battery ,65 watt charging support', 9),
(10, 'biscuits', 45, 35, 5, 1, 5, 'Hide & Seek premium biscuits with chocho chips 50g', 9),
(11, 'washing powder', 30, 180, 2, 3, 12, '2kg Washing powder Suitable for all Washing machine with fragrance of jasmine and lemon', 9),
(13, 'Tv', 8, 45990, 8, 5, 21, '55 inch 4k tv with Best display Weight: 14kg', 9),
(14, 'Panipuri', 210, 20, 0, 1, 4, '6 Delicious pani puri', 9),
(15, 'Vada pav', 40, 15, 0, 1, 4, 'Delicious Vada pav quantity:1pcs', 9),
(17, 'Samosa', 30, 15, 0, 1, 4, 'Crispy Delicious Samosa qty:1pc', 9),
(18, 'Shirt', 60, 600, 0, 3, 11, 'Best in class Shirt with Waterproof Material size Available: 36,38,40,42', 11),
(19, 'Jeans', 24, 1200, 0, 3, 11, 'High Quality Jeans size Available : 28,30,32,34.', 11),
(20, 'Sabji', 40, 180, 0, 1, 1, 'Delicious Paneer Tikka Masala with cream Quantity: 300ml', 11),
(21, 'Tv Repair', 0, 800, 0, 2, 7, 'Tv repair in least time possible the below mention price are lowest price can vary accordingly the condition of tv and price of component', 11),
(22, 'plumbing Service', 0, 300, 0, 2, 6, 'Best Service in this Area at lowest price possible ', 11),
(23, 'Cold Coffee', 45, 30, 0, 1, 2, 'chilling refreshing cold coffee qnt:350ml', 12),
(24, 'Hot coffee', 50, 20, 0, 1, 2, 'Refreshing Hot coffee qnt:200ml', 12),
(25, 'Masaka Bun', 15, 20, 1, 1, 3, 'Masaka bun with loaded cream qnt:2pc', 12),
(26, 'Cream Roll', 40, 10, 1, 1, 3, 'Crunchy roll with different flavor of creams qnt: 1pc', 12),
(27, 'Cake', 7, 300, 0, 1, 3, '1/2 kg ice Cake with nice Quality of different cream\'s', 12),
(28, 'pastrie\'s', 40, 45, 0, 1, 3, '50g Pastry with different flavor\'s and different texture\'s', 12),
(30, 'biscuit', 35, 5, 5, 1, 5, 'Parle-g 60g ', 11),
(33, 'Roti', 80, 25, 0, 1, 1, 'crispy roti qnt: 1pcs', 13),
(34, 'vendor2 legal services', 0, 1100, 0, 2, 9, 'Legal services for multiple purpose price wary on case details cost per hour in mentioned below', 13),
(35, 'Sofa', 3, 11999, 6, 3, 12, 'L shape sofa with premium cushioning l:4m b:2m h:1m  ', 13),
(36, 'Shubhas Pet care clinic', 0, 200, 0, 2, 10, 'Need checkup for Your pet visit us anytime , the below mentioned in minimum checkup fees', 13),
(37, 'paracetamol', 13, 78, 2, 4, 16, '400 mg 10 tablets pack', 13),
(38, 'sinarest', 23, 56, 2, 4, 16, '500mg 10 tablets pack', 13),
(39, 'mouse', 34, 789, 7, 5, 21, 'breaded wired mouse with 6400 dpi and high performance sensor lightweight : 78g', 13),
(40, 'Samsung s23fe', 23, 35990, 8, 5, 22, 'Flagship killer deal of samsung best in class camera 50mp + 12 + 12 , Best in class processor sd 8gen 2,best buy ', 13),
(41, 'Gym', 0, 1200, 0, 4, 17, 'Best gym in this area with more than 200 people associated , all new equipments are available\'s , best in class trainers below mentioned price is monthly lowest plan', 13),
(42, 'Jeevan clinic\'s', 0, 400, 0, 4, 19, 'Jeevan clinic\'s by dr.mahesh bhatt (mbbs mumbai) ,8 years experience ,the mentioned priced is minimum checking cost', 13),
(43, 'Hair spa', 0, 200, 0, 4, 20, 'Best hair spa in this location, all type of hair treatment\'s available the price mentioned is minimum check up price', 13),
(44, 'Pohe', 100, 25, 0, 1, 4, 'Best pohe with different types qnt:1plt', 12),
(45, 'Dishwasher', 8, 24990, 8, 5, 23, '13 place dishwasher with best performance in this price range', 12);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `product_audit` AFTER INSERT ON `product` FOR EACH ROW BEGIN
    INSERT INTO product_audit_log (Product_id, Action, Timestamp)
    VALUES (NEW.Product_id, 'INSERT', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_audit_delete` AFTER DELETE ON `product` FOR EACH ROW BEGIN
    INSERT INTO product_audit_log (Product_id, Action, Timestamp)
    VALUES (OLD.Product_id, 'DELETE', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_audit_update` AFTER UPDATE ON `product` FOR EACH ROW BEGIN
    INSERT INTO product_audit_log (Product_id, Action, Timestamp)
    VALUES (NEW.Product_id, 'UPDATE', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_audit_log`
--

CREATE TABLE `product_audit_log` (
  `Log_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Action` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_audit_log`
--

INSERT INTO `product_audit_log` (`Log_id`, `Product_id`, `Action`, `Timestamp`) VALUES
(1, 44, 'INSERT', '2023-11-06 09:41:17'),
(2, 45, 'INSERT', '2023-11-06 09:42:29'),
(3, 45, 'UPDATE', '2023-11-06 09:49:05'),
(4, 46, 'INSERT', '2023-11-06 09:49:40'),
(5, 46, 'DELETE', '2023-11-06 09:49:57'),
(6, 10, 'UPDATE', '2023-11-06 10:37:39'),
(7, 7, 'DELETE', '2023-11-06 10:37:53'),
(8, 8, 'UPDATE', '2023-11-13 08:12:18'),
(9, 14, 'UPDATE', '2023-12-17 18:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_reg_no` int(11) NOT NULL,
  `vendor_reg_no` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_reg_no`, `vendor_reg_no`, `shop_name`, `address`) VALUES
(2, 9, 'Pune SuperMarket', 'Lane no 0, opposite to ambamata mandir , PIN:- 411046, Dist : Pune , State : Maharastra'),
(3, 11, 'Pathak and Pathak Retails', 'Opposite to Sadguru boys Hostel Sukhsagar nagar PIN :- 411046, Dist: Pune, State: Maharastra'),
(4, 12, 'Raj Bakeries', 'lane no 6, opposite to city hospital PIN :- 411046, DIST : Pune, state: maharastra '),
(5, 13, 'advocate vendor2', 'Opposite to mahesh mall near depo east andheri ,mumbai PIN :- 400023');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `Subcategory_id` int(11) NOT NULL,
  `Subcategory_Name` varchar(255) NOT NULL,
  `Category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`Subcategory_id`, `Subcategory_Name`, `Category_id`) VALUES
(1, 'Restaurants', 1),
(2, 'Cafes', 1),
(3, 'Bakeries', 1),
(4, 'Street Food', 1),
(5, 'Groceries', 1),
(6, 'Plumbing Services', 2),
(7, 'Electrical Services', 2),
(8, 'Cleaning Services', 2),
(9, 'Legal Services', 2),
(10, 'Pet Care Services', 2),
(11, 'Clothing', 3),
(12, 'Home and Furniture', 3),
(13, 'Books and Stationery', 3),
(14, 'Jewelry and Accessories', 3),
(15, 'Wearables', 3),
(16, 'Pharmacies', 4),
(17, 'Fitness Centers', 4),
(18, 'Yoga Studios', 4),
(19, 'Medical Clinics', 4),
(20, 'Spas', 4),
(21, 'Computer and Accessories', 5),
(22, 'Mobiles', 5),
(23, 'IT Services', 5),
(24, 'Electronics Repair', 5),
(25, 'Software Development', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_reg_no` int(11) NOT NULL,
  `vendors_email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `Reg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_reg_no`, `vendors_email`, `first_name`, `middle_name`, `last_name`, `login_password`, `Reg_time`) VALUES
(9, 'someone@gmail.com', 'some', 'no', 'one', 'hiithere', '2023-10-12 16:19:40'),
(10, 'vaishali@gmail.com', 'vaishali', 'ss', 'ss', '1234567890', '2023-10-13 10:49:20'),
(11, 'shubham.pathak@gmail.com', 'Shubham', 'unknown', 'Pathak', 'pathak', '2023-10-14 01:14:54'),
(12, 'vendor@gmail.com', 'vendor', 'local', 'trader', 'vendor', '2023-10-31 20:33:55'),
(13, 'vendor2@gmail.com', 'Mahesh', 'shubham', 'patil', 'vendor2', '2023-11-04 21:30:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_redNo`),
  ADD UNIQUE KEY `Customer_email` (`Customer_email`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`Manufacturer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `Manufacturer_id` (`Manufacturer_id`),
  ADD KEY `Category_id` (`Category_id`),
  ADD KEY `sub_Category_id` (`sub_Category_id`),
  ADD KEY `fk_vendor_id` (`vendor_id`);

--
-- Indexes for table `product_audit_log`
--
ALTER TABLE `product_audit_log`
  ADD PRIMARY KEY (`Log_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_reg_no`),
  ADD UNIQUE KEY `uk_vendor_reg_no` (`vendor_reg_no`),
  ADD UNIQUE KEY `vendor_reg_no` (`vendor_reg_no`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`Subcategory_id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_reg_no`),
  ADD UNIQUE KEY `vendors_email` (`vendors_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_redNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_audit_log`
--
ALTER TABLE `product_audit_log`
  MODIFY `Log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_reg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `Subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_reg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_vendor_id` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_reg_no`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Manufacturer_id`) REFERENCES `manufacturer` (`Manufacturer_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Category_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`sub_Category_id`) REFERENCES `subcategory` (`Subcategory_id`);

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `fk_shop_vendor` FOREIGN KEY (`vendor_reg_no`) REFERENCES `vendor` (`vendor_reg_no`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
