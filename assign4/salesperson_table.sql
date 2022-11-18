-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2022 at 03:01 AM
-- Server version: 10.9.3-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it202`
--

-- --------------------------------------------------------

--
-- Table structure for table `salesperson_table`
--

CREATE TABLE `salesperson_table` (
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salesperson_id` int(11) NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ;

--
-- Dumping data for table `salesperson_table`
--

INSERT INTO `salesperson_table` (`first_name`, `last_name`, `passwd`, `salesperson_id`, `phone_number`, `email`) VALUES
('John', 'Doe', 'A1@s', 10000000, '973-971-9731', 'jd@foo.bar'),
('Randy', 'Orton', 'B2@s', 10000001, '973-123-1234', 'ro@gmail.com'),
('Dr.', 'House', 'C3@s', 10000002, '973-722-1562', 'dh@hospital.med'),
('Luka', 'Doncic', 'Mav77!', 10000003, '772-113-1543', 'ld@mavericks.ball'),
('Super', 'Mario', 'Nes90!', 10000004, '123-432-1526', 'sm@nintendo.com'),
('Jayda', 'Bowers', 'Jb72!', 10000005, '423-162-6273', 'jb@yahoo.com'),
('Clementine', 'Hodges', 'Ch69!', 10000006, '627-423-1678', 'ch@baz.net'),
('Lilith', 'Ferreira', 'Lf22!', 10000007, '167-126-7239', 'lf@books.org'),
('Amit', 'Christensen', 'Ac123!', 10000008, '782-743-1235', 'ac@books.org'),
('Sanjeev', 'Mccall', 'Sm52!', 10000009, '623-127-2370', 'sm@read.book'),
('Euan', 'Hill', 'Eh123!', 10000010, '777-222-1234', 'eh@koth.net');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salesperson_table`
--
ALTER TABLE `salesperson_table`
  ADD PRIMARY KEY (`salesperson_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
