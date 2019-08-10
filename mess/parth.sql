-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2015 at 01:59 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`day`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
