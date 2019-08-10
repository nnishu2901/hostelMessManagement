-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 01:57 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mess`
--
CREATE DATABASE IF NOT EXISTS `mess` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mess`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `category` varchar(10) NOT NULL,
  `breakfast` int(5) NOT NULL DEFAULT '0',
  `lunch` int(5) NOT NULL DEFAULT '0',
  `dinner` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`category`, `breakfast`, `lunch`, `dinner`) VALUES
('cook', 0, 0, 0),
('server', 0, 0, 0),
('washer', 0, 0, 0),
('total', 0, 0, 0),
('rate', 30, 40, 40);

-- --------------------------------------------------------

--
-- Table structure for table `internal`
--

DROP TABLE IF EXISTS `internal`;
CREATE TABLE IF NOT EXISTS `internal` (
  `receipt_count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internal`
--

INSERT INTO `internal` (`receipt_count`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `day` varchar(15) NOT NULL,
  `breakfast` varchar(100) NOT NULL,
  `lunch` varchar(100) NOT NULL,
  `dinner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`day`, `breakfast`, `lunch`, `dinner`) VALUES
('Friday', 'Cutlet, Tea, Milk', 'Rice, Aloo, Raita, Paratha, Salad', 'Rice, Chapati , Dal , Kaddu, Salad'),
('Monday', 'Poha , Tea, Milk', 'Rice, Curry, Chapati,Mix Veg. ,Nimbu Pani, Salad', 'Rice, Chapati,Dal ,Aloo Matar, Salad'),
('Saturday', 'Idli, Sambhar, Tea, Milk', 'Rice, Chole, Bhature, Raita, Salad', 'Rice, Chapati , Dal , Mix Veg. , Salad'),
('Sunday', 'Aloo Paratha, Pickle, Tea, Milk', 'Rice, Chapati, Dal, Ice-cream (1 Scoop) ,Salad', 'Rice, Chapati/Naan , Dal , Paneer , Salad'),
('Thursday', 'Pasta, Tea, Milk', 'Rice, Dal, Aloo, Raita,Chapati, Salad', 'Onion Rice, Chapati,Dal ,Aloo Gobhi, Salad'),
('Tuesday', 'Sandwitch , Tea, Coffee', 'Rice, Dal, Chapati,Aloo Gobhi, Chhanch, Salad', 'Kheer, Pudi, Chana, Lemon Rice, Salad'),
('Wednesday', 'Uttapam, Sambhar, Coconut Chatni Tea, Milk', 'Rice, Rajma, Aloo Brinjal, Chapati, Dahi, Salad', 'Rice, Chapati,Dal ,Aloo Simla Mirch , Salad');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mail` varchar(22) NOT NULL,
  `phno` bigint(15) NOT NULL,
  `amount` int(5) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booked` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `password`, `mail`, `phno`, `amount`, `time`, `booked`) VALUES
('2013ucp1652', 'parth', '6db012f325716c8c81d88f23dc0d3302', '2013ucp1652@mnit.ac.in', 9090909090, 26360, '2015-11-06 21:28:47', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`day`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

DELIMITER $$
--
-- Events
--
DROP EVENT `reset`$$
CREATE DEFINER=`root`@`localhost` EVENT `reset` ON SCHEDULE EVERY 1 DAY STARTS '2015-11-08 17:58:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
UPDATE student set booked='0';
UPDATE internal set receipt_count='0';
update booking set breakfast='0',lunch='0',dinner='0' WHERE category!='rate';
delete from student where password='' and DATEDIFF(NOW(),time)>=2;
END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
