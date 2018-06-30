-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2018 at 04:51 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.1.18-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_patrick_klostermann_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `type` enum('Compact','Economy','SUV','Mini','Premium','Van','Standard','Convertible') DEFAULT NULL,
  `brand` enum('Opel','Volkswagen','Mercedes-Benz','Seat','Kia','Peugeot','Hyundai','Ford','Skoda','Citroen','Nissan','BMW','Audi') DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `passengers` int(11) DEFAULT NULL,
  `doors` int(11) DEFAULT NULL,
  `transmission` enum('manual','automatic') DEFAULT NULL,
  `price_day` decimal(10,0) NOT NULL,
  `fk_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `image`, `type`, `brand`, `model`, `passengers`, `doors`, `transmission`, `price_day`, `fk_location`) VALUES
(1, 'https://images.trvl-media.com/cars/35/SX_AUT_FT_06152018_s.jpg', 'Convertible', 'BMW', '2er Cabrio', 2, 2, 'manual', '114', 5),
(2, 'https://images.trvl-media.com/cars/35/SX_AUT_LT_06152018_s.jpg', 'Convertible', 'BMW', '4er Cabrio', 4, 2, 'manual', '135', 6),
(3, 'https://images.trvl-media.com/cars/45/ZT_AUT_MB_01172018_s.jpg', 'Mini', 'Ford', 'Ka', 4, 2, 'manual', '120', 7),
(4, 'https://images.trvl-media.com/cars/43/ZR_AUT_EC_01172018_s.jpg', 'Economy', 'Kia', 'Rio', 5, 4, 'manual', '135', 8),
(5, 'https://images.trvl-media.com/cars/14/EP_AUT_Volkswagen_Polo_ED_20160630_s.jpg', 'Economy', 'Volkswagen', 'Polo', 5, 4, 'manual', '138', 9),
(6, 'https://images.trvl-media.com/cars/35/SX_AUT_CD_06152018_s.jpg', 'Compact', 'Opel', 'Astra', 5, 5, 'manual', '150', 10),
(7, 'https://images.trvl-media.com/cars/14/EP_AUT_Volkswagen_Golf_CD_20160630_s.jpg', 'Compact', 'Volkswagen', 'Golf', 5, 4, 'manual', '147', 1),
(8, 'https://images.trvl-media.com/cars/35/SX_AUT_SD_06152018_s.jpg', 'Standard', 'BMW', 'X1', 5, 5, 'automatic', '165', 12),
(9, 'https://images.trvl-media.com/cars/45/ZT_AUT_SD_01172018_s.jpg', 'Standard', 'Ford', 'Mondeo', 5, 5, 'manual', '119', 13),
(10, 'https://images.trvl-media.com/cars/14/EP_AUT_Audi_A4_SD_20160630_s.jpg', 'Standard', 'Audi', 'A4', 5, 5, 'manual', '230', 1),
(11, 'https://images.trvl-media.com/cars/45/ZT_AUT_PW_01172018_s.jpg', 'Premium', 'Mercedes-Benz', 'TC-Class', 5, 5, 'automatic', '320', 14),
(12, 'https://images.trvl-media.com/cars/35/SX_AUT_PD_06152018_s.jpg', 'Premium', 'Mercedes-Benz', 'E-Class', 5, 5, 'automatic', '345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `loc_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `address`, `latitude`, `longitude`) VALUES
(1, 'Rauchfangkehrergasse 32, 1150 Wien', 48.185589, 16.326283),
(2, 'Am Hauptbahnhof 1, 1100 Wien', 48.185123, 16.376081),
(3, 'Universitätsstraße Votivpark-Garage, 1090 Wien', 48.214512, 16.361504),
(4, 'Erdbergstraße 202, 1030 Wien', 48.190235, 16.415186),
(5, 'Malfattigasse 4, 1120 Wien', 48.183094, 16.338968),
(6, 'Erzbischofgasse 5, 1130 Wien', 48.189365, 16.263180),
(7, 'Höhenstraße, 1190 Wien', 48.277412, 16.333185),
(8, 'Linzer Str. 457, 1140 Wien', 48.203209, 16.241375),
(9, 'Dreiständegasse 42, 1230 Wien', 48.144001, 16.267836),
(10, 'Franz Schubert-Gasse 12, 2340 Mödling', 48.078812, 16.289885),
(11, 'Alaudagasse 7, 1100 Wien', 48.149040, 16.394114),
(12, 'Spengergasse 38, 1050 Wien', 48.188168, 16.354200),
(13, 'Hütteldorfer Str. 111A, 1140 Wien', 48.198902, 16.313602),
(14, 'Hochheimgasse 18, 1130 Wien', 48.174503, 16.297552);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(11) NOT NULL,
  `fk_loc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `fk_loc`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `user_pass` char(32) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_role` enum('admin','client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_mail`, `user_pass`, `first_name`, `last_name`, `user_role`) VALUES
(6, 'dev@netflair.at', '320ca6547c8411dc0a837d561a1f102b', 'Patrick', 'Klostermann', 'admin'),
(10, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_location` (`fk_location`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `fk_loc` (`fk_loc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_location`) REFERENCES `locations` (`loc_id`);

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`fk_loc`) REFERENCES `locations` (`loc_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
