-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 07:51 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cellentric`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_info`
--

CREATE TABLE `billing_info` (
  `billing_id` int(11) NOT NULL,
  `card_ex_date` varchar(255) DEFAULT NULL,
  `card_pin` varchar(255) NOT NULL DEFAULT '0',
  `card_no` varchar(255) NOT NULL DEFAULT '0',
  `cardHolderName` varchar(255) DEFAULT NULL,
  `bill_date` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_info`
--

INSERT INTO `billing_info` (`billing_id`, `card_ex_date`, `card_pin`, `card_no`, `cardHolderName`, `bill_date`, `billing_address`, `full_name`, `email`, `mobileno`, `customer_id`) VALUES
(1, '2025/10/10', '1234', '12341234', 'Suvin Chandula', '2021-09-06 18:34:13', 'piliyandala', 'Suvin Chandula', 'suvinjavax@gmail.com', 779597006, 8),
(2, '2025/10/10', '1234', '12341234', 'Suvin Chandula', '2021-09-06 18:34:23', 'piliyandala', 'Suvin Chandula', 'suvinjavax@gmail.com', 779597006, 8),
(3, '2025/', '111', '123456789', 'suvin chandula', '2021-09-06 19:58:43', 'asaasa,asasasa,sasasa', ' ', 'suvinjavax@gmail.com', 779597006, 8),
(4, '2023/12', '0', '123412341234', 'suvin  chandula', '2021-09-06 20:05:22', 'artigala mawatha,kolamunna,10300', 'sajana wickramarathne', 'suvinchandula93@gmail.com', 779597006, 8),
(12, '312351bff07', '250', '4', '0ea4188f85afe93905f8b14d54e764db 641305d1e1c114686287e2b970f8543d', '2021-09-10 08:36:05', 'sdad,sad,2121', 'sdad dsadsa', 'test01@gmail.com', 777123123, 8),
(13, '312351bff07989769097660a56395065/751d31dd6b56b26b29dac2c0e1839e34', '202', '522', '0ea4188f85afe93905f8b14d54e764db 641305d1e1c114686287e2b970f8543d', '2021-09-10 08:42:41', 'asas,asas,21212', 'sasas asas', 'test@info.com', 1212121, 8),
(14, 'abdbeb4d8dbe30df8430a8394b7218ef/c20ad4d76fe97759aa27a0c99bff6710', '4c56ff4ce4aaf9573aa5dff913df997a', '422ab839e204eb9b81ec00272dc01a36', '945c1c2cc6e9ce758cbd5b4e869c0161 afc6f3d4f1f090792a9fd8fd7146f094', '2021-09-10 08:45:06', 'aas,asas,121212', 'asasa asas', 'test@gmail.com', 12121212, 8),
(15, 'd41d8cd98f00b204e9800998ecf8427e/d41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e d41d8cd98f00b204e9800998ecf8427e', '2021-09-10 09:16:18', 'test address,city,10000', 'johnfalse doe', 'test@gmail.com', 123456789, 8),
(16, 'd41d8cd98f00b204e9800998ecf8427e/d41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e d41d8cd98f00b204e9800998ecf8427e', '2021-09-10', 'asas,asas,21212', 'sasa asasasas', 'suvinjavax@gmail.com', 212121212, 8),
(17, 'd41d8cd98f00b204e9800998ecf8427e/d41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e d41d8cd98f00b204e9800998ecf8427e', '2021-0909-10', 'asas,sasa,21212', 'sasa asa', 'suvinjavax@gmail.com', 1212121, 8),
(18, 'd41d8cd98f00b204e9800998ecf8427e/d41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e d41d8cd98f00b204e9800998ecf8427e', '2021-09-11', 'asas,asas,21212', 'sasa asasa', 'suvinjavax@gmail.com', 2121212, 8),
(19, 'd41d8cd98f00b204e9800998ecf8427e/d41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e d41d8cd98f00b204e9800998ecf8427e', '2021-09-11', 'artigala mawatha,kolamunna,10300', 'sajana wickramarathne', 'suvinchandula93@gmail.com', 779597006, 8),
(20, '05a5cf06982ba7892ed2a6d38fe832d6/c20ad4d76fe97759aa27a0c99bff6710', '698d51a19d8a121ce581499d7b701668', 'a7a0c6d002bdf5f664a4faa0aa55f457', 'e4411ab7b0f9595805ead93d2d2e4200 5676e37338d668578a3686ab581abe0f', '2021-09-12', 'sdasdsa,sdasd,232112', 'sdadasd sdadsad', 'suvinjavax@gmail.com', 2121212121, 8),
(21, '05a5cf06982ba7892ed2a6d38fe832d6/c20ad4d76fe97759aa27a0c99bff6710', '698d51a19d8a121ce581499d7b701668', 'fa1d3eb08a879de9a4cd9995a1aa91e1', 'baa7a52965b99778f38ef37f235e9053 baa7a52965b99778f38ef37f235e9053', '2021-09-12', 'wqwqwqwqwqw,qwqwqw,121212', 'test wqwqwq', 'suvin@mail.com', 1111111111, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_ID` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_ID`, `product_id`, `qty`, `price`, `date`) VALUES
(9, 'test9', 'MP1002', 2, 26999, '2021-09-03 13:47:47'),
(10, 'test9', 'MP1003', 1, 39000, '2021-09-03 13:47:47'),
(19, 'test8', 'MP1003', 1, 149999, '2021-09-04 18:19:11'),
(71, '8', 'MP1000', 1, 27000, '2021-09-12 13:01:26'),
(75, '11', 'MP1000', 1, 27000, '2021-09-12 15:19:21'),
(76, '11', 'MP1520', 1, 22500, '2021-09-12 15:20:09'),
(77, '12', 'MP2115', 2, 5950, '2021-09-12 15:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `bday` varchar(255) DEFAULT '00/00/0000',
  `Address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'customerImage/avatar7.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `mobile_number`, `email`, `password`, `gender`, `bday`, `Address`, `image`) VALUES
(8, 'Test user', 2147483647, 'test01@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', '05/11/1995', 'New York,USA', 'customerImage/fiber_optics_lighting-wallpaper-1920x1080.jpg'),
(9, 'test user', 777123123, 'testuser@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', '00/00/0000', NULL, 'customerImage/light_years_away-wallpaper-3840x2160.jpg'),
(10, 'test02 user', 1111111111, 'test02@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', '31/12/1990', 'dsadsadsa', 'customerImage/avatar7.png'),
(11, 'test03 user', 2147483647, 'test03@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '00/00/0000', NULL, 'customerImage/avatar7.png'),
(12, 'test04 user', 1111111111, 'test04@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '00/00/0000', NULL, 'customerImage/avatar7.png');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_ID` int(11) NOT NULL,
  `Full_Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nic_no` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `Joined_date` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT 'No Data',
  `password` varchar(255) NOT NULL DEFAULT 'No Data',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `userType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `Full_Name`, `Address`, `email`, `nic_no`, `contact_no`, `Joined_date`, `date_of_birth`, `username`, `password`, `status`, `userType`) VALUES
(6, 'john Doe', 'Los Angalese', 'john@gmail.com', '921392451v', 777123123, '2021-09-10', '1988-12-05', 'john', '81dc9bdb52d04dc20036dbd8313ed055', 'active', 1),
(7, 'test employee', 'somewhere', 'testemp@mail.com', '1111111111', 1111111111, '2021-09-12', '1980-03-05', 'testemp', '81dc9bdb52d04dc20036dbd8313ed055', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pro_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`, `pro_id`) VALUES
(1, 'uploads/Screenshot 2021-08-28 at 00-21-01 Tujhe Dekha to Ye Jana Sanam - Piano Notes Chords (DDLJ).png', ''),
(2, 'uploads/WhatsApp Image 2021-08-27 at 8.58.20 AM.jpeg', ''),
(3, 'uploads/Screenshot 2021-08-28 at 00-21-01 Tujhe Dekha to Ye Jana Sanam - Piano Notes Chords (DDLJ).png', ''),
(4, 'uploads/redmi 9.jpg', ''),
(5, 'uploads/redmi 9t.jpg', ''),
(6, 'uploads/samsung.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`) VALUES
(1000, 'MP1000', 1),
(1000, 'MP1001', 1),
(1001, 'MP1000', 1),
(1002, 'MP1000', 2),
(1002, 'MP1000', 2),
(1006, 'MP1000', 1),
(1006, 'MP2001', 1),
(1007, 'MP3001', 1),
(1007, 'MP4006', 2),
(1008, 'MP1000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `authorized_by` int(11) DEFAULT 0,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `customer_id`, `order_date`, `shipped_date`, `qty`, `total`, `payment_method`, `authorized_by`, `status`) VALUES
(1000, 8, '2021-08-10', NULL, 2, 85000, 'Cash on Delivery', 0, 'complete'),
(1001, 8, '2021-07-10', NULL, 1, 27000, 'Cash on Delivery', 0, 'complete'),
(1002, 8, '2021-06-11', NULL, 4, 108000, 'Cash on Delivery', 0, 'pending'),
(1003, 8, '2020-09-10', NULL, 4, 61999, 'Cash on Delivery', 0, 'complete'),
(1004, 8, '2019-09-10', NULL, 1, 27000, 'Cash on Delivery', 0, 'pending'),
(1005, 8, '2021-09-11', NULL, 4, 108000, 'Cash on Delivery', 0, 'pending'),
(1006, 8, '2021-09-11', NULL, 2, 31900, 'Cash on Delivery', 0, 'pending'),
(1007, 8, '2021-09-12', NULL, 3, 27700, 'Card Payment', 0, 'complete'),
(1008, 10, '2021-09-12', NULL, 1, 27000, 'Card Payment', 0, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `Brand_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `display` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `Battery` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `buying_price` double NOT NULL,
  `retail_price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `warranty` varchar(255) DEFAULT NULL,
  `camera` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `item_code`, `product_name`, `category_name`, `Brand_name`, `product_description`, `display`, `ram`, `storage`, `Battery`, `quantity`, `buying_price`, `retail_price`, `image`, `image_2`, `warranty`, `camera`) VALUES
(1, 'MP1000', 'Infinix Hot 9 Play ', 'mobilephones', 'Infinix', '6000mAh 8.9mm SLIMMER DESIGN | 6.82″ HD+ CINEMATIC DISPLAY | SMART POWER SAVER BATTERY LAB | 8MP SELFIE CAMERA WITH FLASH | 13MP AI DUAL CAMERA | 60% BATTERY’S LIFECYCLE ENHANCED', '', '3GB', '64GB', '', 78, 21000, 27000, 'uploads/infinixHot9play.jpg', 'uploads/infinixHot9play2.jpg', '', ''),
(2, 'MP1001', 'Redmi 9A', 'mobilephones', 'Xiaomi', 'The large display on the Redmi 9A allows you to fully immerse yourself in the virtual world', '6.53″ HD+ DotDrop display', '2GB', '64GB', '5000mAh ', 148, 30000, 34999, 'uploads/redmi-9a-redmi-phones-sri-lanka-simplytek-1.jpg', 'uploads/redmi-9a-redmi-phones-sri-lanka-simplytek-2.jpg', NULL, ''),
(3, 'MP1002', 'Xiaomi Mi 11', 'mobilephones', 'Xiaomi', 'Cinematic 108MP\r\nSOUND BY Harman Kardon', 'WQHD+ 120Hz display', '4GB', '32GB', '8000mAh\r\n', 0, 130000, 149999, 'uploads/Xiaomi-Mi-11-Xiaomi-Mi-Phones-Sri-Lanka-SimplyTek-1.jpg', 'uploads/Xiaomi-Mi-11-Xiaomi-Mi-Phones-Sri-Lanka-SimplyTek-2.jpg', NULL, ''),
(4, 'MP1002', 'Samsung Galaxy A12', 'mobilephones', 'Samsung ', 'Expand your view to the 6.5-inch Infinity-V Display of the Samsung Galaxy A12 and see what you’ve been missing. Thanks to HD+ technology, your everyday content looks sharp, crisp and clear.', 'IPS LCD 6.5″ Screen', '6GB', '64GB | 128GB', ' 5000mAh', 94, 130000, 149999, 'uploads/samsung1.jpg', 'uploads/samsung-galaxy-a12-sri-lanka-simplytek-2.jpg', NULL, ''),
(5, 'MP1212', 'Samsung Galaxy M32', 'mobilephones', 'Samsung', 'Samsung Galaxy M32 comes loaded with features that will take your binging experience to the next level.', '6.4 Inch FHD+ Super Amoled Display', '4GB', '64GB', '6000mAh Battery', 0, 100000, 120000, 'uploads/Xiaomi-Mi-11-Xiaomi-Mi-Phones-Sri-Lanka-SimplyTek-1.jpg', 'uploads/Xiaomi-Mi-11-Xiaomi-Mi-Phones-Sri-Lanka-SimplyTek-1.jpg', NULL, ''),
(6, 'MP1520', 'Redmi Note 10S', 'mobilephones', 'Xiaomi', 'From Antarctica to space, the Redmi Note Series has taken on the world. Our attitude is to challenge and exceed expectations again and again. Now it’s your turn with the Redmi Note 10S.', '6.99” HD+ screen', '4GB', '32GB', '5500mah', 100, 20000, 22500, 'uploads/Redmi-Note-10S-Mi-Phones-Sri-Lanka-SimplyTek-2.jpg', 'uploads/Redmi-Note-10S-Mi-Phones-Sri-Lanka-SimplyTek-141.jpg', NULL, ''),
(7, 'MP1007', 'Redmi 9C', 'mobilephones', 'Xiaomi', 'Make memories last with the AI triple camera, capturing your favorite moments in vivid color with the Redmi 9C.', '6.53″ HD+ DotDrop display', '4GB ', '64GB', '5000mAh (typ) high-capacity battery', 10, 22000, 24500, 'uploads/redmi-9c-redmi-phones-sri-lanka-simplytek-1.jpg', 'uploads/redmi-9c-redmi-phones-sri-lanka-simplytek-2.jpg', NULL, ''),
(8, 'MP1202', 'Samsung Galaxy A22', 'mobilephones', 'Samsung', 'Expand your view to the 6.4-inch Infinity-U Display on Samsung Galaxy A22 and see what you’ve been missing.Plus, Real Smooth keeps the view smooth, whether you’re gaming or scrolling with 90Hz refresh rate.', '90Hz 6.4-inch HD+ Super AMOLED display', '4GB ', ' Up to 128GB ', '5,000mAh battery', 0, 44750, 49000, 'uploads/Samsung-Galaxy-A22-Samsung-Phones-Sri-Lanka-SimplyTek-1.jpg', 'uploads/Samsung-Galaxy-A22-Samsung-Phones-Sri-Lanka-SimplyTek-2.jpg', NULL, ''),
(9, 'MP1110', 'Samsung Galaxy M01 Core', 'mobilephones', 'Samsung', 'With its 5.3″ HD+ display, Galaxy M01 Core offers an immersive experience on the large, widescreen. So you can enjoy your content with a view pleasing to the eye.', '1480 x 720 (HD+) PLS TFT LCD', '4GB', '16GB/32GB storage', '3600', 50, 14900, 16250, 'uploads/Samsung-Galaxy-M01-Core-Sri-Lanka-SimplyTek-1 (12).jpg', 'uploads/Samsung-Galaxy-M01-Core-Sri-Lanka-SimplyTek-1.jpg', NULL, ''),
(10, 'MP2001', 'Apple 20W USB-C Power Adapter', 'mobilephoneaccessories', 'Chargers and adaptors ', '20W USB-C Apple Power Adapter', '', '', '', NULL, 19, 4200, 4900, 'uploads/Apple-Power-Adapter-20W-USB-C-Sri-Lanka-SimplyTek-2.jpg', 'uploads/Apple-Power-Adapter-20W-USB-C-Sri-Lanka-SimplyTek-1.jpg', NULL, ''),
(11, 'MP2002', 'Samsung Type-C AKG Wired In-Ear Headphones', 'mobilephoneaccessories', 'Headset', 'Enjoy undistorted, studio-quality audio. The Samsung Type-C AKG Headphones are constructed to truly separate left and right signals up to 10 times better than 3.5mm headphones.', NULL, NULL, NULL, NULL, 50, 3200, 4500, 'uploads/Samsung-Type-C-AKG-Wired-In-Ear-Headphones-Sri-Lanka-SimplyTek-1.jpg', 'uploads/Samsung-Type-C-AKG-Wired-In-Ear-Headphones-Sri-Lanka-SimplyTek-2.jpg', NULL, ''),
(12, 'MP2025', 'Baseus Lightning Cable', 'mobilephoneaccessories', 'Lightning cable', 'Stitching-hit color design with SR Full coverage protection, the Baseus Caful Lightning Cable braided in high-density wire designed to outlast any ordinary or OEM Apple lightning cable for your device.', NULL, NULL, NULL, NULL, 45, 1600, 1800, 'uploads/Baseus-Horizontal-Data-Cable-iP-2.4A-1m_Accessories_11614_1.jpeg', 'uploads/Baseus-Horizontal-Data-Cable-iP-2.4A-1m_Accessories_11614_1-2-600x600-2.jpeg', NULL, ''),
(13, 'MP2225', 'Samsung Galaxy A21s Back Cover', 'mobilephoneaccessories', 'Back Cover', 'High Quality Back cover', NULL, NULL, NULL, NULL, 5, 550, 650, 'uploads/Galaxy-A21s-cover.jpg', 'uploads/Galaxy-A21s-cover.jpg', NULL, ''),
(14, 'MP2115', 'Anker Soundcore Liberty Air 2 Wireless Earbuds', 'mobilephoneaccessories', 'Headset and Headphones', 'High Quality Earbuds', NULL, NULL, NULL, NULL, 58, 5550, 5950, 'uploads/airpods1.jpg', 'uploads/airpods1.jpg', NULL, ''),
(15, 'MP2750', 'Anker Soundcore Life Q10 Wireless Over-Ear Bluetooth Headphones', 'mobilephoneaccessories', 'Headset and Headphones', 'Get CD-quality audio playback with the Soundcore Life Q10. ', NULL, NULL, NULL, NULL, 55, 25550, 25950, 'uploads/Anker-Soundcore-Life-Q10-Wireless-Over-Ear-Bluetooth-Headphones-Sri-Lanka-SimplyTek-2.jpeg', 'uploads/Anker-Soundcore-Life-Q10-Wireless-Over-Ear-Bluetooth-Headphones-Sri-Lanka-SimplyTek-2.jpeg', NULL, ''),
(16, 'MP3001', 'Amazon Echo Show 5 – Smart display with Alexa (1st Gen, 2019 release)', 'smartdevices', 'Smart Devices', 'Compact 5.5” smart display ready to help manage your day, entertain at a glance, and connect you to friends and family. ', NULL, NULL, NULL, NULL, 1, 19500, 22700, 'uploads/Amazon-Echo-Show-5-2019-Amazon-Echo-sri-lanka-SimplyTek-1.jpg', 'uploads/Amazon-Echo-Show-5-2019-Amazon-Echo-sri-lanka-SimplyTek-1.jpg', NULL, ''),
(17, 'MP3089', 'Amazon Fire HD 10 Tablet (10.1″ 1080p full HD display, 32 GB – 9th Gen, 2019 Release)', 'smartdevices', 'Tablets', 'Amazon Fire HD 10 has the largest display in 1080p full HD—now 30% faster thanks to the powerful new 2.0 GHz octa-core processor and 2 GB of RAM. ', '10.1″ 1080p Full HD display', '2GB', '32GB', NULL, 10, 33000, 34500, 'uploads/Amazon-Fire-HD-10-Tablet-9th-gen-Amazon-Fire-Tablets-sri-lanka-SimplyTek-2.jpg', 'uploads/Amazon-Fire-HD-10-Tablet-9th-gen-Amazon-Fire-Tablets-sri-lanka-SimplyTek-5.jpg', NULL, ''),
(18, 'MP4002', 'JBL Charge 4 Portable Bluetooth Speaker', 'SPEAKERS', 'Bluetooth Speaker', 'Use the JBL Charge 4 to wirelessly connect up to 2 smartphones or tablets to the speaker and take turns enjoying powerful sound', NULL, NULL, NULL, NULL, 65, 22500, 23000, 'uploads/jbl-charge-4-bluetooth-speakers-sri-lanka-simplytek-1.jpg', 'uploads/jbl-charge-4-bluetooth-speakers-sri-lanka-simplytek-15.jpg', NULL, ''),
(19, 'MP4003', 'sasas', 'sasas', 'sasas', 'sasas', 'sasas', 'sasas', 'sasas', 'sasas', 1212, 31232121, 45454545, 'uploads/Anker-Soundcore-Life-Q10-Wireless-Over-Ear-Bluetooth-Headphones-Sri-Lanka-SimplyTek-2.jpeg', 'uploads/jbl-charge-4-bluetooth-speakers-sri-lanka-simplytek-1.jpg', 'sasas', ''),
(20, 'MP4004', 'test Mobile', 'mobilephones', 'Xiaomi', 'sasasasas', '6.5', '12', '62', '4600', 12, 20000, 23000, 'uploads/Samsung-Galaxy-M32-Samsung-Phones-Sri-Lanka-SimplyTek-1-150x1501.jpg', 'uploads/Samsung-Galaxy-M01-Core-Sri-Lanka-SimplyTek-1 (12).jpg', '1 Year', ''),
(21, 'MP4005', 'test Mobile', 'mobilephoneaccessories', 'Xiaomi', 'sasasas', '6.5', '121', '212', '4600', 122, 12121, 23000, 'uploads/Amazon-Echo-Show-5-2019-Amazon-Echo-sri-lanka-SimplyTek-1.jpg', 'uploads/Amazon-Fire-HD-10-Tablet-9th-gen-Amazon-Fire-Tablets-sri-lanka-SimplyTek-5.jpg', '6 Months', ''),
(22, 'MP4006', '70mai Dual USB Car Charger with QC 3.0 18W Fast Charging', 'mobilephoneaccessories', 'Xiaomi', 'Fast Charging, output at a level of 5V/3A, 9V/2A, 12V/1.5A\r\nBackwards-compatible with all versions of Qualcomm\r\nTemperature Protection\r\nAdaptable for any smartphone or tablet\r\nCharge non-Quick Charge devices at 5V/1A', '', '', '', '', 98, 1500, 2500, 'uploads/70mai-dual-usb-car-charger-70mai-car-accessories-sri-lanka-simplytek-2.webp', 'uploads/70mai-dual-usb-car-charger-70mai-car-accessories-sri-lanka-simplytek-1.webp', '6 Months', ''),
(24, 'MP4007', 'Google Nest Mini Smart Speaker', 'SPEAKERS', 'Samsung', '360-degree sound with 40 mm driver\r\n3 far-field microphones\r\nCapacitive touch controls\r\nWorks with Android and IOS', '', '', '', '', 100, 7000, 9499, 'uploads/Google-nest-mini-sri-lanka-simplytek-1.webp', 'uploads/Google-nest-mini-sri-lanka-simplytek-8.webp', '6 Months', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_test`
--

CREATE TABLE `product_test` (
  `product_id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `Brand_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `display` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `Battery` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `buying_price` double NOT NULL,
  `retail_price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `return_items`
--

CREATE TABLE `return_items` (
  `return_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_items`
--

INSERT INTO `return_items` (`return_id`, `product_id`, `Quantity`) VALUES
(2000, 'MP1003', 1),
(2001, 'MP1003', 1),
(2001, 'MP1002', 1),
(2002, 'MP1001', 1),
(2003, 'MP1002', 1),
(2003, 'MP1003', 1),
(2004, 'MP1003', 1),
(2004, 'MP1002', 1),
(2005, 'MP1003', 1),
(2005, 'MP1002', 1),
(2006, 'MP1003', 1),
(2006, 'MP1002', 1),
(2007, 'MP1003', 1),
(2007, 'MP1002', 1),
(2009, 'MP1002', 1),
(2010, 'MP1002', 1),
(2010, 'MP1002', 1),
(2011, 'MP1002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `return_table`
--

CREATE TABLE `return_table` (
  `Retrun_id` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `returned_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `authorized_by` varchar(255) DEFAULT NULL,
  `return_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_table`
--

INSERT INTO `return_table` (`Retrun_id`, `Order_id`, `returned_date`, `authorized_by`, `return_total`) VALUES
(2000, 1003, '2021-09-08 07:25:04', NULL, 40000),
(2001, 1003, '2021-09-08 07:25:35', NULL, 176998),
(2002, 1006, '2021-09-08 07:39:27', NULL, 34999),
(2003, 1006, '2021-09-08 08:00:29', NULL, 176998),
(2004, 1006, '2021-09-08 08:03:00', NULL, 176998),
(2005, 1005, '2021-09-08 08:04:31', NULL, 176998),
(2006, 1003, '2021-09-08 08:06:01', NULL, 176998),
(2007, 1005, '2021-09-08 08:08:29', NULL, 176998),
(2008, 1004, '2021-09-08 21:49:44', NULL, 219997),
(2009, 1006, '2021-09-09 18:03:34', NULL, 149999),
(2010, 1006, '2021-09-09 18:07:35', NULL, 299998),
(2011, 1001, '2021-09-09 19:46:53', NULL, 149999);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_billing_info`
--

CREATE TABLE `supplier_billing_info` (
  `supplier_id` int(11) NOT NULL,
  `company_info` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active_status` int(11) DEFAULT 0,
  `user_Type` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `username`, `password`, `active_status`, `user_Type`) VALUES
(1, 'EMP1000', 'admin', '1234', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_info`
--
ALTER TABLE `billing_info`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD UNIQUE KEY `order_id` (`order_id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_test`
--
ALTER TABLE `product_test`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `return_table`
--
ALTER TABLE `return_table`
  ADD PRIMARY KEY (`Retrun_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_info`
--
ALTER TABLE `billing_info`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_test`
--
ALTER TABLE `product_test`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
