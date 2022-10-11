-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 01:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `MatricNo` varchar(250) NOT NULL,
  `PhoneNo` varchar(250) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `MatricNo`, `PhoneNo`, `Username`, `Password`, `Address`) VALUES
(1, 'Anis', 'B031910117', '01112576629', 'nrlanshmd', 'KanekiKen-117', 'SL-L-8-08-B'),
(7, 'Siti Nor Atiqah', 'B031910075', '01112576648', 'atiqohr', 'Atiqah22@', 'SL-L-8-08-C');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `OrderDate` date DEFAULT current_timestamp(),
  `OrderStatus` varchar(250) NOT NULL DEFAULT 'Pending',
  `DeliveryMethod` varchar(250) NOT NULL,
  `PaymentMethod` varchar(250) NOT NULL,
  `PaymentStatus` varchar(250) NOT NULL DEFAULT 'Pending',
  `Receipt` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `ProductID`, `CustomerID`, `Amount`, `TotalPrice`, `OrderDate`, `OrderStatus`, `DeliveryMethod`, `PaymentMethod`, `PaymentStatus`, `Receipt`) VALUES
(27, 21, 1, 1, '33.00', '2022-09-06', 'Completed', 'Pickup', 'Cash On Delivery', 'Completed', 'Transaction_Receipt (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `ProductName` varchar(250) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `ProductPrice` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Descriptions` varchar(250) NOT NULL,
  `ProductImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `SellerID`, `ProductName`, `Category`, `ProductPrice`, `Quantity`, `Descriptions`, `ProductImage`) VALUES
(18, 2, 'Simple Moisturizer', 'Skincare', '18.00', 2, 'Do you need a gentle moisturizer that can help restore, soften, and smooth your skin? Double your skins hydration with Simple moisturizers.', '11.png'),
(20, 2, 'Sunscreen 3W', 'Skincare', '9.00', 5, '3W CLINIC Intensive UV Sunblock Cream SPF50+ PA+++ 70ml This soft cream type sun screen could be spread softly on face which then protects skin from sun.', '3W Sunblock.jpg'),
(21, 2, 'Clinnelle Toner', 'Skincare', '33.00', 10, ' A spray-on unique formulation to refine pores, tone skin & improve the absorption of subsequent products into skin.', 'Clinelle Toner Skincare.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(11) NOT NULL,
  `ProductID` int(30) NOT NULL,
  `ProductPath` varchar(255) NOT NULL,
  `ProductBlop` blob NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `SellerID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `MatricNo` varchar(250) NOT NULL,
  `PhoneNo` varchar(250) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `BankName` varchar(250) NOT NULL,
  `BankNumber` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`SellerID`, `Name`, `MatricNo`, `PhoneNo`, `Username`, `Password`, `Address`, `BankName`, `BankNumber`) VALUES
(2, 'Yasmin Alis', 'B031910167', '0194611611', 'yasminnn_', 'Yasmin24@', 'SL-L-8-08-D', 'Maybank', '12345678910'),
(3, 'Nurul Anis', 'B031910117', '01112576629', 'nrlanshmd', 'Yassin0612@', 'SL-L-8-08-A', 'Bank Islam', '000821020210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `SellerID` (`SellerID`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`SellerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `SellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `seller` (`SellerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
