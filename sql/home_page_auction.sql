-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2017 at 05:42 AM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ola`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_page_auction`
--

CREATE TABLE IF NOT EXISTS `home_page_auction` (
`home_page_auction_id` int(20) NOT NULL,
  `auction_id` int(20) NOT NULL,
  `date_added` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2937 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_page_auction`
--
ALTER TABLE `home_page_auction`
 ADD PRIMARY KEY (`home_page_auction_id`), ADD KEY `auction_id` (`auction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_page_auction`
--
ALTER TABLE `home_page_auction`
MODIFY `home_page_auction_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2937;