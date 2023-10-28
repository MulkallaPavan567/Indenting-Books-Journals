-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 22, 2023 at 02:03 PM
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
-- Database: `indenting`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_new_books`
--

CREATE TABLE `add_new_books` (
  `book_name` varchar(50) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `edition` varchar(5) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `cost` int(10) DEFAULT NULL,
  `field` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_new_books`
--

INSERT INTO `add_new_books` (`book_name`, `author`, `edition`, `isbn`, `publisher`, `year`, `cost`, `field`) VALUES
('Database System Concepts', 'Abraham Silberschatz, Henry F. Korth, S. Sudarshan', '7th', '978-0-07-802215-9', 'McGraw-Hill Education', 2019, 6000, 'Databases'),
('Computer Networks', 'Andrew S. Tanenbaum, David J. Wetherall', '5th', '978-0-13-212695-3', 'Pearson', 2010, 4000, 'Networking'),
('Clean Code: A Handbook of Agile Software Craftsman', 'Robert C. Martin', '1st', '978-0-13-235088-4', 'Prentice Hall', 2008, 2500, 'Software Development'),
('Artificial Intelligence: A Modern Approach', 'Stuart Russell, Peter Norvig', '4th', '978-0-13-461099-5', 'Pearson', 2020, 5000, 'Artificial Intelligence'),
('The Pragmatic Programmer: Your Journey to Mastery', 'Andrew Hunt, David Thomas', '20th ', '978-0-13-595705-9', 'Addison-Wesley Professional', 2019, 3000, 'Software Development'),
('Introduction to Algorithms', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein', '3rd', '978-0-262-53305-8', 'MIT Press', 2009, 4500, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `create_new_user`
--

CREATE TABLE `create_new_user` (
  `fname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_new_user`
--

INSERT INTO `create_new_user` (`fname`, `username`, `password`) VALUES
('Ajay Medapatla', 'ajay@gmail.com', 'Ajay222@'),
('Ava Martinez', 'ava@gmail.com', 'Ava@5678'),
('David Williams', 'david@gmail.com', 'Strong#Password'),
('Emily Brown', 'emily@gmail.com', 'Passw0rd!'),
('Ethan Wilson', 'ethan@gmail.com', 'Secret12345'),
('Michael Johnson', 'michael@gmail.com', 'SecurePwd123'),
('Mulkalla Naveen', 'naveen@gmail.com', 'naveen@123'),
('Olivia Davis', 'olivia@gmail.com', 'OliviaPwd567'),
('Mulkalla Pavan', 'pavan@gmail.com', 'Pavan_123'),
('Sophia Smith', 'sophia@gmail.com', 'MySecretPass'),
('Sumanth', 'sumanth@gmail.com', 'Admin@567');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`) VALUES
('Admin-1', 'admin1@gmail.com', 'Password@123'),
('Admin-2', 'admin2@gmail.com', 'Password_123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_new_books`
--
ALTER TABLE `add_new_books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `create_new_user`
--
ALTER TABLE `create_new_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
