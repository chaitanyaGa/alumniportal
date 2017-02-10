-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2016 at 01:47 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumniportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `username` varchar(50) NOT NULL,
  `profile_name` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`username`, `profile_name`, `path`) VALUES
('shubham', '12109855_352957321650720_5976493535057802657_o.jpg', 'php_image/upload/12109855_352957321650720_5976493535057802657_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `name` varchar(100) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `passingyear` varchar(20) NOT NULL,
  `edudetails` varchar(1000) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `presentaddress` varchar(1000) NOT NULL,
  `permanantaddress` varchar(1000) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `nameoforganization` varchar(500) NOT NULL,
  `postincompany` varchar(500) NOT NULL,
  `companyurl` varchar(100) NOT NULL,
  `companyaddress` varchar(1000) NOT NULL,
  `hobbies` varchar(1000) NOT NULL,
  `areaofinterest` varchar(1000) NOT NULL,
  `thoughts` varchar(3000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Button_ID` int(200) NOT NULL,
  `country` varchar(300) NOT NULL,
  `state` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `softwareknowledge` varchar(1000) NOT NULL,
  `languages` varchar(1000) NOT NULL,
  `other` varchar(1000) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `branch`, `passingyear`, `edudetails`, `emailid`, `contactnumber`, `presentaddress`, `permanantaddress`, `dob`, `nameoforganization`, `postincompany`, `companyurl`, `companyaddress`, `hobbies`, `areaofinterest`, `thoughts`, `username`, `password`, `Button_ID`, `country`, `state`, `city`, `softwareknowledge`, `languages`, `other`) VALUES
('shubham anil hupare', 'IT', '2017-18', 'B.Tech', 'hupareshubham@gmail.com', '7058563707', 'Vishrambag,sangli.', 'Jijamata housing society,Jawaharnagar,Ichalkaranji.', '1996-08-26', 'Thaoughtworks', 'application devloper', 'https://www.thoughtworks.com/locations/pune', 'Baner Road.', 'Singing,Coding and dancing.', 'web development and design.', 'if you fail to plan then you plan to fail.', 'shubham', 'shubham@123', 1, 'India', 'Maharashtra', 'Pune', 'software tesing', 'c,c++,java,php,html,css', 'good management skills');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
