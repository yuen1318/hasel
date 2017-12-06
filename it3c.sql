-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 03:45 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it3c`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `un` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `fn` varchar(255) NOT NULL,
  `mn` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `un`, `pw`, `fn`, `mn`, `ln`, `email`, `gender`, `mobile`, `address`, `status`) VALUES
(2, 'admin1', '$2y$10$RDqLcDCJnhbhtLeax24V0eMuGO/egCedrxe2xAA0xFOf23shZEIJu', 'Admin', 'Admin', 'Admin', 'admin1@gmail.com', 'Male', '123', '123123123', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cust_id` varchar(255) NOT NULL,
  `mop` varchar(255) NOT NULL,
  `mopi` varchar(255) NOT NULL,
  `item` longtext NOT NULL,
  `total` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cust_id`, `mop`, `mopi`, `item`, `total`, `address`, `date`) VALUES
(20, '13', 'on', '123123123', '[{\"img\":\"nones\",\"name\":\"apple\",\"price\":20.41,\"count\":3,\"total\":\"61.23\"},{\"img\":\"none\",\"name\":\"grapes\",\"price\":11.51,\"count\":4,\"total\":\"46.04\"}]', '207.26999999999998', '123123123', '2017, November 15 10:41 am'),
(21, '13', 'on', '123123123', '[{\"img\":\"nones\",\"name\":\"apple\",\"price\":20.41,\"count\":1,\"total\":\"20.41\"},{\"img\":\"none\",\"name\":\"grapes\",\"price\":11.51,\"count\":4,\"total\":\"46.04\"}]', '166.45', '123123123', '2017, November 15 11:51 am'),
(22, '17', 'on', '123123123', '[{\"img\":\"img_5a13febe096ad007784190.jpg\",\"name\":\"Dragons\",\"price\":123,\"count\":3,\"total\":\"369.00\"},{\"img\":\"img_5a22ab91c666d890334786.png\",\"name\":\"Cheese\",\"price\":120.41,\"count\":4,\"total\":\"481.64\"}]', '950.64', '123123123', '2017, December 6 8:23 pm'),
(23, '18', 'on', '123213', '[{\"img\":\"img_5a27e7e2dde36986759309.jpg\",\"name\":\"Shark Shirt\",\"price\":250,\"count\":3,\"total\":\"750.00\"}]', '850', '123213', '2017, December 6 8:53 pm'),
(24, '18', 'on', '123213', '[{\"img\":\"img_5a27e87cde28f940825419.jpg\",\"name\":\"Pogi Long Sleeves \",\"price\":680.99,\"count\":3,\"total\":\"2042.97\"},{\"img\":\"img_5a27e7e2dde36986759309.jpg\",\"name\":\"Shark Shirt\",\"price\":250,\"count\":1,\"total\":\"250.00\"}]', '2392.97', '123213', '2017, December 6 8:54 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `image`, `name`, `description`, `price`, `tag`, `quantity`) VALUES
(13, 'img_5a27e7e2dde36986759309.jpg', 'Shark Shirt', 'black, medium', '250', 't-shirt', '2'),
(14, 'img_5a27e87cde28f940825419.jpg', 'Pogi Long Sleeves ', 'red, stripes', '680.99', 'long sleeves', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `un` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `fn` varchar(255) NOT NULL,
  `mn` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `un`, `pw`, `fn`, `mn`, `ln`, `email`, `gender`, `mobile`, `address`) VALUES
(18, 'user1', '$2y$10$HWKIkAtRkWp7qxttLTCQjuHUmg8pNCLbf918lcwgvgI9y5RDraexC', 'Juan', 'Dela', 'Cruz', '12@gmail.com', 'Male', '109123123', '123213');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
