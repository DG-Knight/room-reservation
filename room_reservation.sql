-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 11:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booking_date_start` date NOT NULL,
  `booking_date_stop` date NOT NULL,
  `booking_time_start` time NOT NULL,
  `booking_time_stop` time NOT NULL,
  `booking_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `device_start_date` date NOT NULL,
  `device_stop_date` date NOT NULL,
  `device_start_time` time NOT NULL,
  `device_stop_time` time NOT NULL,
  `device_location` varchar(255) NOT NULL,
  `device_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `device_detail` text NOT NULL,
  `device_images` varchar(255) NOT NULL,
  `device_category_id` int(3) NOT NULL,
  `device_quantity` int(11) NOT NULL,
  `device_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`device_id`, `device_name`, `device_detail`, `device_images`, `device_category_id`, `device_quantity`, `device_status`) VALUES
(1, 'Huawei GR52017', 'มือถือขายดี 2017', '', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `device_category`
--

CREATE TABLE `device_category` (
  `device_category_id` int(3) NOT NULL COMMENT 'รหัสประเภทอุปกรณ์',
  `device_category_name` varchar(100) NOT NULL COMMENT 'ชื่อประเภทอุปกรณ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device_category`
--

INSERT INTO `device_category` (`device_category_id`, `device_category_name`) VALUES
(1, 'เครื่องเสียง'),
(2, 'เครื่องมือช่าง'),
(3, 'เครื่องใช้ไฟฟ้า');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL COMMENT 'รหัสห้อง',
  `room_name` varchar(255) NOT NULL COMMENT 'ชื่อห้อง',
  `room_detial` varchar(255) NOT NULL COMMENT 'รายละเอียดห้อง',
  `room_image` varchar(255) NOT NULL COMMENT 'รูปห้อง',
  `room_category` varchar(255) NOT NULL COMMENT 'ประเภท',
  `room_status` int(1) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_detial`, `room_image`, `room_category`, `room_status`) VALUES
(9, 'Iot', 'ห้องเล้กๆ', '', 'ห้องประชุม', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `room_category_id` int(3) NOT NULL COMMENT 'รหัสประเภทห้อง',
  `room_category_name` varchar(100) NOT NULL COMMENT 'ชื่อประเภทห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`room_category_id`, `room_category_name`) VALUES
(1, '้ห้องประชุม'),
(2, 'ห้องเรียน');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `first_name` varchar(255) NOT NULL COMMENT 'ชื่อสมาชิก',
  `last_name` varchar(256) NOT NULL COMMENT 'นามสกุล',
  `user_sex` varchar(10) NOT NULL COMMENT 'เพศ',
  `user_address` varchar(255) NOT NULL COMMENT 'ที่อยู่',
  `user_phone` varchar(12) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_email` varchar(100) NOT NULL COMMENT 'E-mail',
  `user_password` varchar(20) NOT NULL COMMENT 'รหัสผ่าน',
  `user_registered` datetime NOT NULL COMMENT 'เวลาที่ลงทะเบียน',
  `level_id` int(1) NOT NULL,
  `user_status` int(1) NOT NULL COMMENT 'เปิดใช้/ปิดใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_sex`, `user_address`, `user_phone`, `user_email`, `user_password`, `user_registered`, `level_id`, `user_status`) VALUES
(13, 'Apiwat', 'Dindang', 'ชาย', '14/6 หมู่ 11 ตำบลกระบี่น้อย อำเภอเมือง จังหวัดกระบี่ 81000', '0828063850', 'sao.apiwat@gmail.com', '123456', '2018-01-11 02:28:20', 0, 1),
(16, 'Apiwat', 'Dindang', 'หญิง', '14/6 หมู่ 11 ตำบลกระบี่น้อย อำเภอเมือง จังหวัดกระบี่ 81000', '0828063850', 'ton.ja@sipa.or.th', '0835088051', '2018-01-11 13:59:40', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `device_category_id` (`device_category_id`);

--
-- Indexes for table `device_category`
--
ALTER TABLE `device_category`
  ADD PRIMARY KEY (`device_category_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`room_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `device_category`
--
ALTER TABLE `device_category`
  MODIFY `device_category_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทอุปกรณ์', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสห้อง', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `room_category_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทห้อง', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`);

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`device_category_id`) REFERENCES `device_category` (`device_category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
