-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 05:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(10) NOT NULL,
  `prodid` int(10) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `rate` double NOT NULL,
  `quantity` int(10) NOT NULL,
  `totalcost` double NOT NULL,
  `picture` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `prodid`, `prodname`, `rate`, `quantity`, `totalcost`, `picture`, `username`) VALUES
(3, 2, 'nike football', 686, 3, 2058, 'noimage.jpg', 'jashan@gmail.com'),
(4, 2, 'nike football', 686, 1, 686, 'noimage.jpg', 'shubman@gmail.com'),
(5, 3, 'SG Cricket Bat', 970, 7, 6790, '1691422851sgbat.jpg', 'shubman@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(100) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catpic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`, `catpic`) VALUES
(3, 'Football', '1691423406soccer-ball-goal.webp'),
(4, 'Cricket', '1691422015cricketgoods.webp'),
(5, 'Golf', '1692537816golf.jpeg'),
(6, 'Lawn Tennis', '1692261483tennisphoto.jpeg'),
(7, 'Badminton', '1692591478badminton_racket.jpg'),
(8, 'Basketball', '1692591588basketball.jpg'),
(9, 'Hockey', '1692591721hockey.jpg'),
(10, 'Baseball', '1692592246baseball.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `messageid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `messagedatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`messageid`, `name`, `email`, `phone`, `message`, `messagedatetime`) VALUES
(7, 'karan', 'karan@gmail.com', '2147483647', 'please add more items			', '2023-08-23 06:29:06'),
(9, 'rahuljoshi', 'rahuljoshi@gmail.com', '9898987676', 'please add more golf products.				', '2023-08-23 08:09:36'),
(10, 'jasprit', 'jasprit@gmail.com', '897653454', 'please add more products				', '2023-08-23 09:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `orderdata`
--

CREATE TABLE `orderdata` (
  `orderid` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `orderdate` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `saddr` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdata`
--

INSERT INTO `orderdata` (`orderid`, `username`, `orderdate`, `amount`, `status`, `saddr`) VALUES
(1, 'shubman@gmail.com', '2023-08-17 10:36:50', 7476, 'Out for Delivery', 'football chw'),
(2, 'ramesh@gmail.com', '2023-08-17 10:57:01', 1168, 'Confirmed', 'great colony'),
(3, 'raman@gmail.com', '2023-08-20 12:06:56', 29754, 'Order Received', 'basti nagar'),
(4, 'raman@gmail.com', '2023-08-21 09:02:36', 3410, 'Order Received', 'basti nagar'),
(5, 'raman@gmail.com', '2023-08-21 09:06:21', 1372, 'Order Received', 'basti nagar'),
(6, 'raman@gmail.com', '2023-08-21 11:04:47', 1960, 'Order Received', 'basti nagar'),
(7, 'garry@gmail.com', '2023-08-22 01:08:14', 7840, 'Order Received', 'friends calony'),
(8, 'garry@gmail.com', '2023-08-23 07:03:52', 11400, 'Order Received', 'friends calony'),
(9, 'armal@gmail.com', '2023-08-23 08:22:11', 686, 'Order Received', 'vpo kapurthala');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `srno` int(10) NOT NULL,
  `prodid` int(10) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `rate` double NOT NULL,
  `quantity` int(10) NOT NULL,
  `totalcost` double NOT NULL,
  `picture` varchar(50) NOT NULL,
  `orderid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`srno`, `prodid`, `prodname`, `rate`, `quantity`, `totalcost`, `picture`, `orderid`) VALUES
(2, 3, 'SG Cricket Bat', 970, 1, 970, '1691422851sgbat.jpg', 0),
(3, 2, 'nike football', 686, 3, 2058, 'noimage.jpg', 0),
(4, 2, 'nike football', 686, 1, 686, 'noimage.jpg', 0),
(5, 3, 'SG Cricket Bat', 970, 1, 970, '1691422851sgbat.jpg', 2),
(6, 6, 'Tennis Racket', 99, 2, 198, '1692292943racket.jpg', 2),
(7, 8, 'Gray Nicolls Kashmir Willow Cricket Bat for Leathe', 4650, 6, 27900, '1692436786CACA22EnglishWillowBatsBatAlphaGen1.0Pro', 3),
(8, 2, 'Storm Footballl', 686, 1, 686, '1692433593storm.webp', 3),
(9, 3, 'SG Cricket Bat', 970, 1, 970, '1691422851sgbat.jpg', 3),
(10, 6, 'HEAD Graphite1000 Tennis Racquet', 99, 2, 198, '1692292943racket.jpg', 3),
(11, 5, 'Nike GW English-Willow Cricket Bat, Mens.', 1470, 1, 1470, '1692432949nikecricketbestbat.jpg', 4),
(12, 3, 'SG Cricket Bat', 970, 2, 1940, '1691422851sgbat.jpg', 4),
(13, 2, 'Storm Footballl', 686, 2, 1372, '1692433593storm.webp', 5),
(14, 14, 'Basketball Ball Size 7 FIBA Approved Grip Indoor O', 980, 2, 1960, '1692635181download.jpg', 6),
(15, 11, 'YONEX ASTROX 1 DG BADMINTON RACKET', 3920, 2, 7840, '1692633794badminton2.webp', 7),
(16, 15, 'Golf 3 Wood Low Speed Size 2 Right Handed 500', 5700, 2, 11400, '169263682571KosQsTBbL.jpg', 8),
(17, 2, 'Storm Footballl', 686, 1, 686, '1692433593storm.webp', 9);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodid` int(50) NOT NULL,
  `catid` int(50) NOT NULL,
  `prodname` varchar(100) NOT NULL,
  `rate` float NOT NULL,
  `discount` float NOT NULL,
  `stock` int(100) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(200) NOT NULL,
  `addon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodid`, `catid`, `prodname`, `rate`, `discount`, `stock`, `description`, `picture`, `addon`) VALUES
(2, 3, 'Storm Footballl', 700, 2, 96, 'Nivia Storm Football is available in three different colors. It has ideal shape and best durability in all types of weather. Every footballer desires to have the good performance sports equipment. It is best fit if you want to play and win.\r\n                    ', '1692433593storm.webp', '2023-08-07 08:54:09'),
(3, 4, 'SG Cricket Bat', 1000, 3, 10, '                    Made with good wood', '1691422851sgbat.jpg', '2023-08-07 09:10:51'),
(5, 4, 'Nike GW English-Willow Cricket Bat, Mens.', 1500, 2, 8, 'These English Willow bats come with a full cover for protection\r\nMost suitable for dynamic shots\r\nExcellent durability\r\n                    ', '1692432949nikecricketbestbat.jpg', '2023-08-11 03:23:28'),
(6, 6, 'HEAD Graphite1000 Tennis Racquet', 100, 1, 9, 'This Tennis racquet offers great feel and controllable power to Beginner club players.\r\n                    ', '1692292943racket.jpg', '2023-08-17 10:52:23'),
(8, 4, 'Gray Nicolls Kashmir Willow Cricket Bat for Leather Ball', 5000, 7, 6, 'Handle-Singapore cane handle with special 3 way insertion of rubber in between splits for enhanced flexibility and shock absorption.', '1692436786CACA22EnglishWillowBatsBatAlphaGen1.0ProPerformanceSH_grande.webp', '2023-08-19 02:49:46'),
(9, 4, 'New Balance Kashmir Willow Cricket Bat ', 27000, 12, 500, '                    New Balance TC-460 Cricket Bat Crafted for the modern day big Hitter, Bat cover for extra protection\r\nThick edges and an imposing swell to showcase the power contained, Well balanced blade to produce an unrivalled pick - up and a devastating hitting power,\r\nSIZE-FULL SIZE and Designed to compliment your Game with explosive power\r\nSpecially Ultra modern design, lightweight construction,designed scale grip and striking cosmetics, a perfect combination for the modern high impact player and an excellent 3 Piece Singapore cane handle for ultimate results,\r\nProfile/Shape- Large Edges and Sweet Spot WEIGHT-1.210-1.250 kg        \"\r\n                    ', '169243717861caeYtrjSL._SY606_.jpg', '2023-08-19 02:54:10'),
(10, 10, 'Seven Star Sports  star Heavy Duty Natural Wood Baseball Bat Self Defense baseball  Willow Baseball ', 340, 7, 60, 'Age Group 15+ Yrs\r\nBlade Made of Willow\r\nTraining, Advanced, Recreational, Intermediate, Beginner Playing Level           ', '1692633505baseball1.webp', '2023-08-21 09:28:25'),
(11, 7, 'YONEX ASTROX 1 DG BADMINTON RACKET', 4000, 2, 18, 'YONEX ASTROX badminton rackets are built using with Rotational Generator System. The counterbalanced head adapts to each shot, helping you to control the drive and attack the opposition with increased acceleration, steeper angle, and power on the smash.\r\n\r\nNow Astrox has joined forces with the Durable Grade (DG) technology to increase the durability of the badminton rackets. Having made from Super High Elasticity High Modulus Graphite like the bestselling YONEX Voltric DG series, YONEX Astrox DG rackets will now be able to withstand higher tension up to 35lbs.\r\n\r\nThis racket helps you to lead the attack with increased power and control.         ', '1692633794badminton2.webp', '2023-08-21 09:33:14'),
(12, 9, 'Adult Field Hockey Advanced Carbon Low Bow Stick.', 890, 7, 10, '                    Designed for advanced level adults looking for the superior manoeuvrability of a low bow combined with the power of  carbon.             \"\r\n                    ', '1692634087hockey5.webp', '2023-08-21 09:38:07'),
(13, 5, 'Srixon Soft Feel Ball', 400, 1, 3, 'Overall, SOFT FEEL features our softest FastLayer Core to date. FastLayer operates here just as it does in our most premium ball offerings.', '1692634519ball.webp', '2023-08-21 09:45:19'),
(14, 8, 'Basketball Ball Size 7 FIBA Approved Grip Indoor Outdoor BT900 Orange', 1000, 2, 18, 'Basketball Ball Size 7 FIBA Approved Grip Indoor Outdoor BT900 Orange', '1692635181download.jpg', '2023-08-21 09:56:21'),
(15, 5, 'Golf 3 Wood Low Speed Size 2 Right Handed 500', 6000, 5, 48, 'Simple Short Game Approach: Whether you are a beginner or a seasoned golfer, it is easier to focus and practice on the same shot around the green, while letting various wedges in your bag do the work for you.', '169263682571KosQsTBbL.jpg', '2023-08-21 10:23:45'),
(16, 3, 'Adidas Starlancer Plus Football, Size 5', 7000, 6, 90, 'The dynamic design of this Starlancer Plus football borrows from the look of the classic adidas Fevernova. Behind the blurred graphic, a tough TPU cover and machine-stitched construction ensure this ball keeps coming back for more. The butyl bladder means more playing and less pumping.\r\n\r\nThe Adidas Starlancer Plus Football – where precision meets performance on the field. Elevate your game with this exceptional football designed to enhance your playing experience. Crafted with meticulous attention to detail, the Starlancer Plus Model is here to redefine the way you play the beautiful game.', '1692637762plus1.webp', '2023-08-21 10:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `pname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `UserType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`pname`, `phone`, `email`, `pass`, `UserType`) VALUES
('admin', '9876567623', 'admin@gmail.com', '12', 'admin'),
('armal', '9087565342', 'armal@gmail.com', '12', 'user'),
('garry', '1234567809', 'garry@gmail.com', '1234', 'user'),
('rahul', '8765432345', 'rahul@gmail.com', '2345', 'user'),
('raman', '8989898989', 'raman@gmail.com', '1234', 'user'),
('ramesh', '9876787907', 'ramesh@gmail.com', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `orderdata`
--
ALTER TABLE `orderdata`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `messageid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `orderid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
