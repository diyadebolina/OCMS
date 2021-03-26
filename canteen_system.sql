-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 03:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `aSrno` int(10) NOT NULL,
  `aName` varchar(60) COLLATE utf8_bin NOT NULL,
  `aEmail` varchar(60) COLLATE utf8_bin NOT NULL,
  `aPassword` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`aSrno`, `aName`, `aEmail`, `aPassword`) VALUES
(1, 'Admin1', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `rId` int(10) NOT NULL,
  `rName` varchar(80) COLLATE utf8_bin NOT NULL,
  `rEmail` varchar(80) COLLATE utf8_bin NOT NULL,
  `rYear` varchar(10) COLLATE utf8_bin NOT NULL,
  `rStar` varchar(20) COLLATE utf8_bin NOT NULL,
  `rFeedback` varchar(1000) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`rId`, `rName`, `rEmail`, `rYear`, `rStar`, `rFeedback`) VALUES
(12, 'Shreya Singh', 'ss.19U10631@btech.nitdgp.ac.in', '2', '5', 'Itâ€™s a great experience. The ambiance is very welcoming and charming.'),
(13, 'Rahul Chatterjee', 'rc.17U10333@btech.nitdgp.ac.in', '4', '4', 'I recommend to everyone! I would like to come back here again and again.'),
(14, 'Arnav Ghosh', 'ag.18U10256@btech.nitdgp.ac.in', '3', '4', 'This place is great! Atmosphere is chill and cool but the staff is also really friendly.'),
(15, 'Rahul Chatterjee', 'rc.17U10333@btech.nitdgp.ac.in', '4', '4', 'The food is absolutely amazing â€“ everything we tasted melted in other mouths. Absolutely the best meal we had while in Durgapur.'),
(16, 'Pallavi Sen', 'ps.18U10599@btech.nitdgp.ac.in', '3', '3', 'It can be expensive but worth it and they do different deals on different nights so itâ€™s worth checking them out before you book.');

-- --------------------------------------------------------

--
-- Table structure for table `menu_tb`
--

CREATE TABLE `menu_tb` (
  `fID` int(10) NOT NULL,
  `fRegNo` varchar(10) COLLATE utf8_bin NOT NULL,
  `fName` varchar(80) COLLATE utf8_bin NOT NULL,
  `fDesc` varchar(300) COLLATE utf8_bin NOT NULL,
  `fPrice` varchar(10) COLLATE utf8_bin NOT NULL,
  `fCategory` varchar(40) COLLATE utf8_bin NOT NULL,
  `fAvail` varchar(10) COLLATE utf8_bin NOT NULL,
  `fImage` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `menu_tb`
--

INSERT INTO `menu_tb` (`fID`, `fRegNo`, `fName`, `fDesc`, `fPrice`, `fCategory`, `fAvail`, `fImage`) VALUES
(17, 'F001', 'Aloo Gobi', 'Aloo gobi is a popular Indian dish in which potatoes and cauliflower are cooked with onions, tomatoes and spices. This dish can be made in several ways, you can make it with only onions or only tomatoes or use no onion-tomato at all.', '30', 'Veg', 'Yes', 'aloogobi.jpg'),
(18, 'F002', 'Black Forest Pastry', 'Black Forest cake has multiple layers of chocolate sponge cake, cherries, and whipped cream. It is frosted with whipped cream and covered with chocolate shavings and a few cherries for decoration. Kirschwasser is used to flavor the whipped cream.', '20', 'Dessert', 'Yes', 'blackforestpastry.jpg'),
(19, 'F003', 'Pav Bhaji', 'Pav bhaji is a Maharashtrian fast food spicy dish that originated in Mumbai cuisine. ... Pav origninates from the Portuguese Pao, which means bread. Bhaji in Marathi means vegetable dish.', '90', 'Veg', 'Yes', 'pavbhaji.jpg'),
(20, 'F004', 'Chicken Biriyani', 'Chicken Biryani is a savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together. The bottom layer of rice absorbs all the chicken juices as it cooks, giving it a tender texture and rich flavor, while the top layer of rice turns out white and fluffy.', '150', 'NonVeg', 'Yes', 'chickenbiriyani.jpg'),
(21, 'F005', 'Chocolate Pastry', ' A cake flavored with melted chocolate or chocolate powder.', '15', 'Dessert', 'Yes', 'chocolatepastry.jpg'),
(22, 'F006', 'Plain Roti', 'Roti is a round flatbread native to the Indian subcontinent made from stoneground wholemeal flour, traditionally known as gehu ka atta, and water that is combined into a dough.', '5', 'Bread', 'Yes', 'plainroti.jpeg'),
(23, 'F007', 'Bhindi Aloo', 'It is a lightly spiced delicious dry curry made with okra, potatoes, and spices in an onion-tomato base. Also, a vegan recipe, it is made in Punjabi Style and goes very well with roti or naan or paratha.', '35', 'Veg', 'Yes', 'bhindialoo.jpg'),
(24, 'F008', 'Paneer Dum Biriyani', ' It is an easy and simple dum style cooked biriyani recipe made with marinated paneer cubes and long grain rice. it is an ideal vegetarian biriyani alternative to the non-meat eaters or for paneer lovers.', '130', 'Veg', 'Yes', 'paneerbiriyani.jpg'),
(25, 'F009', 'Mango Milkshake', 'It is a sweet and seasonal cold beverage drink made from fresh mangoes, ice cream and full cream milk.', '45', 'Beverage', 'No', 'mangomilkshake.jpg'),
(26, 'F010', 'Chicken Maggi', 'If you are a chicken lover, then this pack of Maggi chicken noodles is exactly what you need.', '40', 'NonVeg', 'Yes', 'chickenmaggi.jpg'),
(27, 'F011', 'Veg Thali', 'Indian vegatarian platter. Thali is a round platter used to serve food in the Indian subcontinent and Southeast Asia. Thali is also used to refer to an Indian-style meal made up of a selection of various dishes which are served on a platter', '100', 'Veg', 'Yes', 'vegthali.jpg'),
(28, 'F012', 'Vanilla Ice Cream', 'Vanilla ice cream, was originally created by cooling a mixture made of cream, sugar, and vanilla above a container of ice and salt. In North America and Europe consumers are interested in a more prominent, smoky flavor, while in Ireland they want a more anise-like flavor.', '25', 'Dessert', 'Yes', 'vanillaicecream.jpg'),
(29, 'F013', 'Bread Omelette', 'Creamy eggy filling, seasoned with scintillating flavours and finely chopped vegetables, is sandwiched between gloriously toasted breads that contain all the goodness of butter and carbs. ', '25', 'NonVeg', 'No', 'breadomelette.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `rID` int(10) NOT NULL,
  `rName` varchar(80) COLLATE utf8_bin NOT NULL,
  `rRegNo` varchar(50) COLLATE utf8_bin NOT NULL,
  `rEmail` varchar(50) COLLATE utf8_bin NOT NULL,
  `rPassword` varchar(50) COLLATE utf8_bin NOT NULL,
  `rYear` varchar(20) COLLATE utf8_bin NOT NULL,
  `rRoll` varchar(20) COLLATE utf8_bin NOT NULL,
  `rSem` varchar(20) COLLATE utf8_bin NOT NULL,
  `rHall` varchar(80) COLLATE utf8_bin NOT NULL,
  `rFood` varchar(40) COLLATE utf8_bin NOT NULL,
  `rProfilePic` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`rID`, `rName`, `rRegNo`, `rEmail`, `rPassword`, `rYear`, `rRoll`, `rSem`, `rHall`, `rFood`, `rProfilePic`) VALUES
(13, 'Shreya Singh', '19U10631', 'ss.19U10631@btech.nitdgp.ac.in', '12345', '2', '19CS8160', '4', '13', 'NonVeg', 'pp1.jpg'),
(14, 'Ravi Pandit', '20U10343', 'rp.20U10343@btech.nitdgp.ac.in', '23456', '1', '20BT8039', '1', '11', 'Veg', 'pp2.jpg'),
(15, 'Priya Mehta', '19U10529', 'pm.19U10529@btech.nitdgp.ac.in', '56432', '2', '19CH8012', '4', '13', 'Veg', 'pp3.jpeg'),
(16, 'Arnav Ghosh', '18U10256', 'ag.18U10256@btech.nitdgp.ac.in', '89076', '3', '18ME8076', '6', '4', 'NonVeg', 'pp4.jpg'),
(17, 'Pallavi Sen', '18U10599', 'ps.18U10599@btech.nitdgp.ac.in', '56432', '3', '18CE8045', '6', '13', 'NonVeg', 'pp5.jpg'),
(18, 'Rahul Chatterjee', '17U10333', 'rc.17U10333@btech.nitdgp.ac.in', '12890', '4', '17EE8123', '8', '12', 'NonVeg', 'pp6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`aSrno`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `menu_tb`
--
ALTER TABLE `menu_tb`
  ADD PRIMARY KEY (`fID`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`rID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `aSrno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `rId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu_tb`
--
ALTER TABLE `menu_tb`
  MODIFY `fID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `rID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
