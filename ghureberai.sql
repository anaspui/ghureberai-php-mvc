-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 05:55 PM
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
(261, 2, 1, '2023-03-25', '2023-03-30', '5000.00', '2023-04-09 05:18:58');

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
(1, 'Long Beach Hotel', 'Coxs Bazar', '', '', '2023-04-14 09:24:46'),
(2, 'Bono Nibash Hill Resort', 'Bandarban', '', 'dad', '2023-04-16 00:37:01'),
(3, 'Orient Bay Hotel', 'Saint Martin', 'Saint 5 Star Hotel', 'c://somehting.jpg', '2023-04-16 00:37:45');

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
(1, '3 Day Trip To Coxs', 'Long Beach Hotel', '', '3500.00', 3, 99, 12, '2023-03-07', '2023-03-10', 'a', '2023-03-05 07:16:35', '2023-04-14 13:14:13'),
(2, '5 Day Trip To Coxs', 'Long Beach Hotel', '', '5000.00', 5, 23, 2, '2023-04-09', '2023-04-14', '', '2023-03-05 07:17:43', '2023-04-14 13:09:36'),
(4, '10 Days Trip To Coxs', 'Long Beach Hotel', '15 days at cox', '11000.00', 10, 10, 0, '2023-07-15', '2023-07-25', 'dawdwadawd', '2023-03-08 07:40:55', '2023-04-06 16:18:56'),
(6, '6 Days Trip To Bandarban', 'Bono Nibash Hill Resort', '', '6000.00', 6, 15, 0, '2023-04-26', '2023-05-02', '', '2023-03-08 07:51:07', '2023-04-16 04:29:43'),
(7, '10 Days Trip to Bandarban', 'Bono Nibash Hill Resort', '', '11000.00', 10, 15, 0, NULL, NULL, '', '2023-03-09 09:36:20', '2023-03-09 09:36:20'),
(9, '6 Days Trip To Saint Martin', 'Orient Bay Hotel', '', '7500.00', 6, 13, 0, '2023-04-10', '2023-04-16', '', '2023-03-09 10:16:58', '2023-03-09 10:16:58');

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
(1, 'anas', 'anas', 'admin', 'Anas', 'Omar', 'male', '2001-03-22', 'omar24md@gmail.net', 1857816366, 'ABC building; 123 Road; Dhaka; Bangladesh', 'Assets/images/default.jpeg\r\n'),
(2, 'Amin', 'Amin', 'employee', 'Amin', 'Hasan', 'female', '2023-03-13', 'amin@gmail.com', 192827632, 'XYZ Building; YZC Road; Dhaka', 'images/default.jpeg'),
(25, 'dwa', 'wadwa', 'employee', 'Johndwad', 'Smwa', 'Male', '1990-05-20', 'john.smith@email.com', 555, '123 Main St, Anytown USA', 'profile_pic.jpg'),
(26, 'janedoe', '123456', 'employee', 'Jane', 'Doe', 'Female', '1995-02-14', 'jane.doe@email.com', 555, '456 Elm St, Anytown USA', 'profile_pic.jpg'),
(27, 'bobsmith2', 'dwadwa', 'employee', 'Bob', 'Smith', 'Male', '1985-11-02', 'bob.smith@email.com', 555, '789 Oak St, Anytown USA', 'profile_pic.jpg'),
(31, 'johndoe', 'password123', 'customer', 'John', 'Doe', 'Male', '1990-01-01', 'johndoe@example.com', 555, '123 Main St, Anytown USA', 'profile_pic.jpg'),
(32, 'janedoe', 'pa$$word!23', 'customer', 'Jane', 'Doe', 'Female', '1995-05-15', 'janedoe@example.com', 555, '456 Elm St, Anytown USA', 'profile_pic.png');

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
  MODIFY `Booking_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `Hotel_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `Package_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
