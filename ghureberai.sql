-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 02:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghureberai`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_Id` int(11) NOT NULL,
  `Package_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Booked_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_Id`, `Package_Id`, `User_Id`, `Start_Date`, `End_Date`, `Price`, `Booked_At`) VALUES
(1, 2, 16, '2023-03-25', '2023-03-30', '5000.00', '2023-03-09 18:33:51'),
(2, 9, 16, '2023-04-10', '2023-04-16', '7500.00', '2023-03-09 18:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `Hotel_Id` int(11) NOT NULL,
  `Hotel_Name` varchar(100) DEFAULT NULL,
  `Location` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`Hotel_Id`, `Hotel_Name`, `Location`, `Description`, `Image`, `Created_at`) VALUES
(1, 'Long Beach Hotel', 'Coxs Bazar', '', '', '2023-03-10 08:04:37'),
(2, 'Bono Nibash Hill Resort', 'Bandarban', NULL, NULL, '2023-03-08 13:50:22'),
(6, 'Orient Bay Hotel', 'Saint Martin', 'Saint 5 Star Hotel', 'c://somehting.jpga', '2023-03-09 05:52:57'),
(7, 'Princess Heights Hotel', 'Saint Martin', '', '', '2023-03-10 08:03:35'),
(8, 'Alicias Inn', 'Saint Martin', '4 star', '', '2023-03-10 08:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `Package_Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Hotel_Name` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Days` int(11) NOT NULL,
  `P_left` int(11) NOT NULL,
  `P_sold` int(11) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  `Image_url` varchar(255) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`Package_Id`, `Name`, `Hotel_Name`, `Description`, `Price`, `Days`, `P_left`, `P_sold`, `Start_Date`, `End_Date`, `Image_url`, `Created_at`, `Updated_at`) VALUES
(1, '3 Day Trip To Coxs', 'Long Beach Hotel', '', '3500.00', 3, 99, 12, '2023-03-01', '2023-03-04', '', '2023-03-05 13:16:35', '2023-03-09 16:11:36'),
(2, '5 Day Trip To Coxs', 'Long Beach Hotel', '', '5000.00', 5, 23, 2, '2023-03-25', '2023-03-30', '', '2023-03-05 13:17:43', '2023-03-09 16:12:42'),
(4, '10 Days Trip To Coxs', 'Long Beach Hotel', '10 days at coxs', '11000.00', 10, 10, 0, NULL, NULL, 'c/photo.jpg', '2023-03-08 13:40:55', '2023-03-08 13:40:55'),
(6, '6 Days Trip To Bandarban', 'Bono Nibash Hill Resort', '', '6000.00', 6, 15, 0, NULL, NULL, '', '2023-03-08 13:51:07', '2023-03-08 13:51:07'),
(7, '10 Days Trip to Bandarban', 'Bono Nibash Hill Resort', '', '11000.00', 10, 15, 0, NULL, NULL, '', '2023-03-09 15:36:20', '2023-03-09 15:36:20'),
(8, '2 Day Trip to Saint Martin ', 'Orient Bay Hotel', '', '2500.00', 2, 10, 0, NULL, NULL, '', '2023-03-09 15:43:53', '2023-03-09 15:44:17'),
(9, '6 Days Trip To Saint Martin', 'Orient Bay Hotel', '', '7500.00', 6, 13, 0, '2023-04-10', '2023-04-16', '', '2023-03-09 16:16:58', '2023-03-09 16:16:58'),
(10, '2 Day trip to Bandaraban', 'Bono Nibash Hill Resort', '', '2500.00', 2, 11, 0, '2023-03-20', '2023-03-22', '', '2023-03-09 16:22:34', '2023-03-09 16:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) DEFAULT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Dob` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` int(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Username`, `Password`, `Role`, `Firstname`, `Lastname`, `Gender`, `Dob`, `Email`, `Phone`, `Address`, `Picture`) VALUES
(1, 'Amin', 'Amin', 'employee', 'Amin', 'Hasan', 'female', '2023-03-13', 'omashaw@gmail.com', 192827632, 'ABC Road', 'images/default.jpeg'),
(2, 'anas', 'anas', 'admin', 'Anas', 'Omar', 'male', '2002-01-09', 'omar24md@gmail.com', 1857816366, 'Waba Daba 24', 'images/default.jpeg'),
(6, 'jitu', 'jitu', 'employee', 'Hakim', 'Jitu', NULL, '2023-03-14', 'jitu@gmail.com', 192372635, 'ABC Road', NULL),
(7, 'limon', 'limon', 'employee', 'Limon', 'Das', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'kevin', 'kevin', 'employee', 'Kevin', 'Feige', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'rahid', 'rahid', 'employee', 'Rahid', 'Hasan', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'aminh', 'aminh', 'customer', 'Amin', 'Hasan', 'Male', '2023-03-29', 'amin@gmail.com', 192827632, NULL, NULL),
(16, 'masud', 'masud', 'customer', 'Mostafa', 'Masud', 'Male', '2023-04-05', 'masud@gmail.com', 193281232, NULL, 'images/default.jpeg'),
(18, 'khan', 'khan', 'employee', 'Ratul', 'Khan', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_Id`),
  ADD KEY `Package_Id` (`Package_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`Hotel_Id`),
  ADD UNIQUE KEY `Hotel_Name` (`Hotel_Name`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`Package_Id`),
  ADD KEY `Hotel_Name` (`Hotel_Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Booking_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `Hotel_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `Package_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`Package_Id`) REFERENCES `packages` (`Package_Id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`Hotel_Name`) REFERENCES `hotels` (`Hotel_Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
