-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 02:44 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itas`
--
CREATE DATABASE IF NOT EXISTS `itas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `itas`;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(20) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `author` varchar(500) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `cdate` date NOT NULL,
  `img` varchar(5000) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `name`, `author`, `subject`, `cdate`, `img`, `url`) VALUES
(9, '123', 'milan', 'new', '2018-03-18', 'abort', 'resume.docx'),
(10, 'aas', 'asd', 'asd', '2018-03-18', 'abort', 'Resume2.docx'),
(11, 'new', 'file', 'asdf', '2018-03-18', 'abort', 'coed.pdf'),
(12, 'sadf', 'sdf', 'sdf', '2018-03-18', 'abort', 'milangiri_gauswami_u15co012.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
