-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 05:05 PM
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
  `booking_start_date` date NOT NULL,
  `booking_end_date` date NOT NULL,
  `booking_start_time` time NOT NULL,
  `booking_end_time` time NOT NULL,
  `booking_subject` varchar(255) NOT NULL,
  `booking_user_name` varchar(100) NOT NULL,
  `booking_people` int(11) NOT NULL,
  `booking_phone` varchar(11) NOT NULL,
  `booking_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `room_id`, `booking_start_date`, `booking_end_date`, `booking_start_time`, `booking_end_time`, `booking_subject`, `booking_user_name`, `booking_people`, `booking_phone`, `booking_status`) VALUES
(6, 15, 14, '2018-01-29', '2018-01-30', '22:55:00', '22:55:00', 'ประชุมกรรมการ', 'อภิวัฒน์ ดินแดง', 11, '082-806-385', 2),
(7, 15, 13, '2018-02-03', '2018-02-04', '23:25:00', '23:25:00', 'ประชุมกรรมการ', 'อภิวัฒน์ ดินแดง', 10, '082-806-385', 2),
(9, 15, 16, '2018-01-31', '2018-02-01', '11:23:00', '11:23:00', 'ประชุมกรรมการ', 'Nittaya', 21, '082-806-385', 1);

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
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
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `device_detail` text NOT NULL,
  `device_image` varchar(255) NOT NULL,
  `device_amount` int(11) NOT NULL,
  `category` int(3) NOT NULL,
  `device_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `device_name`, `device_detail`, `device_image`, `device_amount`, `category`, `device_status`) VALUES
(9, 'ค้อน', 'aaaaaaaa', '', 112, 1, 1);

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
(3, 'อุปกรณ์ IoT');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`level_id`, `level_name`) VALUES
(0, 'ผู้ดูแลระบบ'),
(1, 'สมาชิก');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL COMMENT 'รหัสห้อง',
  `room_name` varchar(255) NOT NULL COMMENT 'ชื่อห้อง',
  `room_detail` varchar(255) NOT NULL COMMENT 'รายละเอียดห้อง',
  `room_image` varchar(255) NOT NULL COMMENT 'รูปห้อง',
  `category` int(3) NOT NULL COMMENT 'ประเภท',
  `room_status` int(1) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `room_detail`, `room_image`, `category`, `room_status`) VALUES
(13, 'Meeting', 'ใช้สำหรับการประชุม รองรับคนได้ 100 ที่นั่ง', 'Screenshot (22).png', 2, 1),
(14, 'IoT Lab', 'จัดการเรียนการสอนเรื่อง IoT', 'Capture.PNG', 2, 1),
(15, 'Common', '', '', 1, 1),
(16, 'ฺB Center', '', '', 1, 1),
(17, 'A28', 'ddddddddd', '', 1, 1);

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
(1, 'ห้องประชุม'),
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
  `user_password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `user_registered` datetime NOT NULL COMMENT 'เวลาที่ลงทะเบียน',
  `level_id` int(1) NOT NULL,
  `user_status` int(1) NOT NULL COMMENT 'เปิดใช้/ปิดใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_sex`, `user_address`, `user_phone`, `user_email`, `user_password`, `user_registered`, `level_id`, `user_status`) VALUES
(15, 'อภิวัฒน์', 'ดินแดง', 'M', '14/6 หมู่ 11', '082-806-3850', 'admin@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-01-24 13:35:03', 0, 1),
(16, 'Apiwat', 'Dindang', 'M', '14/6 หมู่ 11', '082-806-3850', 'user@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-01-24 14:18:00', 1, 1);

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
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `device_category`
--
ALTER TABLE `device_category`
  ADD PRIMARY KEY (`device_category_id`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`room_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `device_category`
--
ALTER TABLE `device_category`
  MODIFY `device_category_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทอุปกรณ์', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสห้อง', AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `room_category_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทห้อง', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `borrows_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`category`) REFERENCES `room_category` (`room_category_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level_user` (`level_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
