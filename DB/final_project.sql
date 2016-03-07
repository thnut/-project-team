-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2016 at 07:48 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `id` int(11) NOT NULL,
  `startstation_id` int(11) NOT NULL,
  `endstation_id` int(11) NOT NULL,
  `distance` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `startstation_id`, `endstation_id`, `distance`) VALUES
(1, 1, 2, 0),
(2, 1, 3, 0),
(3, 1, 4, 0),
(4, 1, 5, 0),
(5, 1, 6, 0),
(6, 1, 7, 0),
(7, 1, 8, 0),
(8, 1, 9, 0),
(9, 1, 11, 0),
(10, 1, 12, 0),
(11, 1, 13, 0),
(12, 1, 15, 0),
(13, 1, 16, 0),
(14, 1, 17, 0),
(15, 1, 18, 0),
(16, 1, 19, 0),
(17, 1, 20, 0),
(18, 1, 21, 0),
(19, 1, 22, 0),
(20, 1, 23, 0),
(21, 1, 24, 0),
(22, 1, 25, 0),
(23, 1, 26, 0),
(24, 1, 29, 0),
(25, 1, 27, 0),
(26, 1, 28, 0),
(27, 2, 3, 0),
(28, 3, 6, 0),
(29, 3, 9, 0),
(30, 10, 5, 0),
(31, 14, 18, 0),
(33, 1, 15, 200),
(34, 9, 10, 31.3),
(35, 14, 1, 177),
(36, 1, 14, 177),
(37, 1, 10, 76.8);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(255) NOT NULL,
  `station_lat` varchar(255) NOT NULL,
  `station_lon` varchar(255) NOT NULL,
  `station_zoom` int(11) NOT NULL,
  `station_type` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_id`, `station_name`, `station_lat`, `station_lon`, `station_zoom`, `station_type`) VALUES
(1, 'สถานีขนส่งผู้โดยสารขอนแก่น', '16.43960992290757', '102.8333098909851', 0, 'bus'),
(2, 'สถานีปรับอากาศผู้โดยสารจังหวัดขอนแก่น  ', '16.432877879063568', '102.83638333862302', 13, 'bus'),
(3, 'สถานีขนส่งผู้โดยสารจังหวัดขอนแก่น แห่งที่ 3(แห่งใหม่)', '16.389891540333977', '102.80450864911211', 0, 'bus'),
(4, 'สถานีขนส่งอำเภอกระนวน จังหวัดขอนแก่น', '16.714803', '103.116428', 0, 'bus'),
(5, 'สถานีขนส่งเขาสวนกวาง จังหวัดขอนแก่น', '', '', 0, 'bus'),
(6, 'สถานีขนส่งอำเภอชุมแพ จังหวัดขอนแก่น', '16.542465', '102.100400', 0, 'bus'),
(7, 'สถานีขนส่งต.โนนสะอาด จังหวัดขอนแก่น', '16.442416', '102.839760', 0, 'bus'),
(8, 'สถานีขนส่งอำเภอน้ำพอง จังหวัดขอนแก่น', '', '', 0, 'bus'),
(9, 'สถานีขนส่งผู้โดยสารอำเภอบ้านไผ่ ตำบล ในเมือง อำเภอ บ้านไผ่ ขอนแก่น', '16.057277 ', '102.726633', 0, 'bus'),
(10, 'สถานีขนส่งอำเภอเมืองพล จังหวัดขอนแก่น', '15.814079', '102.605831', 0, ''),
(11, 'สถานีขนส่งอำเภอภูเวียง จังหวัดขอนแก่น', '16.639506', '102.417631', 0, 'bus'),
(12, 'สถานีขนส่งอำเภอหนองสองห้อง จังหวัดขอนแก่น', '', '', 0, 'bus'),
(13, 'สถานีขนส่งอำเภอภูเวียง จังหวัดขอนแก่น', '16.645996', '102.391503', 0, 'bus'),
(14, 'สถานีขนส่งผู้โดยสารเทศบาลจังหวัดหนองคาย แห่งที่ 1', '17.885369', '102.754684', 0, 'bus'),
(15, 'สถานีขนส่งอุดร', '17.404729', '102.799264', 0, 'bus'),
(16, 'สถานีขนส่งผู้โดยสารอุดรธานี2', '17.414471', '102.764723', 0, 'bus'),
(17, 'มหาวิทยาลัยขอนแก่น', '16.4642862', '102.82984290000002', 13, 'bus'),
(18, 'เซนทรัล ขอนแก่น', '16.432958', '102.824392', 0, 'van'),
(19, 'สถานีขนส่งผู้โดยสารอำเภอพล จังหวัดขอนแก่น ', '15.814079', '102.605831', 0, 'van'),
(20, 'สถานีขนส่งผู้โดยสารอำเภอบ้านไผ่ จังหวัดขอนแก่น ', '16.057218 ', '102.726682', 0, 'van'),
(21, 'สถานีขนส่งผู้โดยสารอำเภอชุมแพ จังหวัดขอนแก่น ', '16.542676', '102.097322', 0, 'van'),
(22, 'สถานีขนส่งผู้โดยสารอำเภอภูเขียว จังหวัดขอนแก่น ', '16.364215', '102.126848', 0, 'van'),
(23, 'สถานีขนส่งผู้โดยสารเทศบาลจังหวัดหนองคาย แห่งที่ 1', '17.885624 ', '102.754705', 0, 'van'),
(24, 'สถานีขนส่งพันดอน กุมภาวาปี จังหวัดอุดรธานี', '17.137756', '102.943178', 0, 'van'),
(25, 'เซ็นทรัลพลาซ่า จังหวัดอุดรธานี', '17.404794', '102.800300', 0, 'van'),
(26, 'มหาวิทยาลัยราชภัฏอุดรธานี', '17.397467', '102.794539', 0, 'van'),
(27, 'สถานีขนส่งผู้โดยสารจังหวัดขอนแก่น แห่งที่ 3 ', '16.389892 ', '102.804487', 13, 'bus'),
(28, 'มหาวิทยาลัยขอนแก่น\r\n(กังสดาล)', '16.4642862 	', '102.82984290000002', 13, 'van'),
(29, 'มหาวิทยาลัยขอนแก่น\r\n(สวนกัลปพฤกษ์)', '16.47819117266191', '102.82491836424867', 13, 'van\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
