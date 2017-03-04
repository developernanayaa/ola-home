-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2017 at 11:08 AM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ola`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_page_banner`
--

CREATE TABLE IF NOT EXISTS `home_page_banner` (
`home_page_banner_id` int(11) NOT NULL,
  `home_page_banner_title` varchar(255) NOT NULL,
  `home_page_banner_url` varchar(255) NOT NULL,
  `home_page_banner_image` varchar(255) NOT NULL,
  `home_page_banner_status` int(3) NOT NULL,
  `home_page_banner_order` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_page_banner`
--
ALTER TABLE `home_page_banner`
 ADD PRIMARY KEY (`home_page_banner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_page_banner`
--
ALTER TABLE `home_page_banner`
MODIFY `home_page_banner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=172;