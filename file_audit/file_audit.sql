-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `audit_file`
--
CREATE DATABASE IF NOT EXISTS `audit_file` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `audit_file`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `file_id` int(25) NOT NULL AUTO_INCREMENT,
  `path_file` varchar(255) NOT NULL,
  `type_file` int(25) NOT NULL,
  `main_id` int(25) NOT NULL,
  `sub_id` int(25) NOT NULL,
  `sub2_id` int(25) NOT NULL,
  PRIMARY KEY (`file_id`),
  KEY `main_id` (`main_id`),
  KEY `sub_id` (`sub_id`),
  KEY `sub2_id` (`sub2_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- dump ตาราง `file`
--

INSERT INTO `file` (`file_id`, `path_file`, `type_file`, `main_id`, `sub_id`, `sub2_id`) VALUES
(4, 'storage/12558.PNG', 4, 1, 1, 0),
(1, 'storage/254826.jpg', 1, 1, 1, 0),
(2, 'storage/666666.jpg', 2, 1, 1, 0),
(3, 'storage/1002500_694070037274760_1009203590_n.jpg', 3, 1, 1, 0),
(5, 'storage/TOT.png', 1, 1, 1, 1),
(6, 'storage/Untitled.png', 2, 1, 1, 1),
(7, 'storage/w1.png', 3, 1, 1, 1),
(8, 'storage/00.PNG', 4, 1, 1, 1),
(9, 'storage/chapter1.pdf', 1, 1, 2, 0),
(10, 'storage/chapter2.pdf', 2, 1, 2, 0),
(11, 'storage/chapter3.pdf', 3, 1, 2, 0),
(12, 'storage/chapter4.pdf', 4, 1, 2, 0),
(13, 'storage/chapter1.pdf', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `main_folder`
--

CREATE TABLE IF NOT EXISTS `main_folder` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `main_folder`
--

INSERT INTO `main_folder` (`id`, `name`) VALUES
(1, 'ข้อตกลงการใช้และคู่มือกระดาษทำการ หมวดของการเริ่มรับงานสอบบัญชี '),
(2, 'หมวดของการเสร็จสิ้นงานสอบบัญชี ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `sub_folder`
--

CREATE TABLE IF NOT EXISTS `sub_folder` (
  `sub_id` int(25) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  `main_id` int(25) NOT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `main_id` (`main_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- dump ตาราง `sub_folder`
--

INSERT INTO `sub_folder` (`sub_id`, `sub_name`, `main_id`) VALUES
(1, 'หนังสือเสนองานสอบบัญชี', 1),
(3, 'ร่างงบการเงินและรายงานของผู้สอบบัญชี', 2),
(2, 'หนังสือตอบรับงานสอบบัญชี/มอบอำนาจให้แก่ผู้สอบบัญชี', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `sub_lv2`
--

CREATE TABLE IF NOT EXISTS `sub_lv2` (
  `sub2_id` int(25) NOT NULL AUTO_INCREMENT,
  `sub2_name` varchar(255) NOT NULL,
  `sub_id` varchar(25) NOT NULL,
  PRIMARY KEY (`sub2_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `sub_lv2`
--

INSERT INTO `sub_lv2` (`sub2_id`, `sub2_name`, `sub_id`) VALUES
(1, 'หนังสือเสนองานบัญชี ย่อย2', '1'),
(2, 'ทดสอบร่างงบ2', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
