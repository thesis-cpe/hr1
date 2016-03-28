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
-- Database: `audit_manage`
--
CREATE DATABASE IF NOT EXISTS `audit_manage` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `audit_manage`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `company_tee`
--

CREATE TABLE IF NOT EXISTS `company_tee` (
  `id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_tax_id` varchar(255) DEFAULT NULL,
  `company_band_id` varchar(255) DEFAULT NULL,
  `company_addr_th` varchar(255) NOT NULL,
  `company_addr_en` varchar(255) DEFAULT NULL,
  `company_tel` varchar(255) NOT NULL,
  `company_fax` varchar(255) DEFAULT NULL,
  `company_web` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` varchar(255) NOT NULL,
  `customer_company` varchar(255) NOT NULL,
  `customer_company_status` varchar(255) NOT NULL,
  `customer_tax_id` varchar(255) DEFAULT NULL,
  `customer_band_id` varchar(255) DEFAULT NULL,
  `customer_addr_th` varchar(255) NOT NULL,
  `customer_addr_en` varchar(255) NOT NULL,
  `customer_tel` varchar(255) NOT NULL,
  `customer_fax` varchar(255) DEFAULT NULL,
  `customer_web` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `customer_assco`
--

CREATE TABLE IF NOT EXISTS `customer_assco` (
  `id` varchar(255) NOT NULL,
  `cus_assco_name` varchar(255) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `customer_roleid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKcustomer_a646136` (`customerid`),
  KEY `FKcustomer_a435256` (`customer_roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `customer_role`
--

CREATE TABLE IF NOT EXISTS `customer_role` (
  `id` varchar(255) NOT NULL,
  `customer_role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_lname` varchar(255) NOT NULL,
  `employee_active_status` int(2) NOT NULL,
  `employee_audit_id` varchar(255) DEFAULT NULL,
  `employee_nation_id` varchar(255) NOT NULL,
  `employee_addr` varchar(255) NOT NULL,
  `employee_addrp` varchar(255) NOT NULL,
  `employee_tel` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_ref` varchar(255) NOT NULL,
  `employee_ref_tel` varchar(255) NOT NULL,
  `employee_graduate` varchar(255) NOT NULL,
  `employee_major` varchar(255) NOT NULL,
  `employee_grade` varchar(255) NOT NULL,
  `employee_academy` varchar(255) NOT NULL,
  `employee_register_date` varchar(255) NOT NULL,
  `employee_salary` varchar(255) NOT NULL,
  `employee_married_status` varchar(255) NOT NULL,
  `company_teeid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKemployee679003` (`company_teeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `employee_role`
--

CREATE TABLE IF NOT EXISTS `employee_role` (
  `id` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `employee_role_employee`
--

CREATE TABLE IF NOT EXISTS `employee_role_employee` (
  `employee_roleid` varchar(255) NOT NULL,
  `employeeid` varchar(255) NOT NULL,
  PRIMARY KEY (`employee_roleid`,`employeeid`),
  KEY `FKemployee_r31421` (`employee_roleid`),
  KEY `FKemployee_r804854` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `employee_team`
--

CREATE TABLE IF NOT EXISTS `employee_team` (
  `employeeid` varchar(255) NOT NULL,
  `teamid` varchar(255) NOT NULL,
  PRIMARY KEY (`employeeid`,`teamid`),
  KEY `FKemployee_t893626` (`employeeid`),
  KEY `FKemployee_t415342` (`teamid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `file_name`
--

CREATE TABLE IF NOT EXISTS `file_name` (
  `id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `main_directoryid` varchar(255) NOT NULL,
  `sub_directoryid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKfile_name110070` (`main_directoryid`),
  KEY `FKfile_name621344` (`sub_directoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `main_directory`
--

CREATE TABLE IF NOT EXISTS `main_directory` (
  `id` varchar(255) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `company_teeid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKmain_direc703729` (`company_teeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `sub_directory`
--

CREATE TABLE IF NOT EXISTS `sub_directory` (
  `id` varchar(255) NOT NULL,
  `main_directoryid` varchar(255) NOT NULL,
  `sub_folder_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKsub_direct295987` (`main_directoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` varchar(255) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKteam450108` (`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `team_work`
--

CREATE TABLE IF NOT EXISTS `team_work` (
  `teamid` varchar(255) NOT NULL,
  `workid` varchar(255) NOT NULL,
  PRIMARY KEY (`teamid`,`workid`),
  KEY `FKteam_work778358` (`teamid`),
  KEY `FKteam_work51567` (`workid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `time_work`
--

CREATE TABLE IF NOT EXISTS `time_work` (
  `id` varchar(255) NOT NULL,
  `start_time` date NOT NULL,
  `stop_time` date NOT NULL,
  `limit_time` varchar(255) DEFAULT NULL,
  `workid2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKtime_work583698` (`workid2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `id` varchar(255) NOT NULL,
  `work_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_assco`
--
ALTER TABLE `customer_assco`
  ADD CONSTRAINT `FKcustomer_a435256` FOREIGN KEY (`customer_roleid`) REFERENCES `customer_role` (`id`),
  ADD CONSTRAINT `FKcustomer_a646136` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FKemployee679003` FOREIGN KEY (`company_teeid`) REFERENCES `company_tee` (`id`);

--
-- Constraints for table `employee_role_employee`
--
ALTER TABLE `employee_role_employee`
  ADD CONSTRAINT `FKemployee_r804854` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `FKemployee_r31421` FOREIGN KEY (`employee_roleid`) REFERENCES `employee_role` (`id`);

--
-- Constraints for table `employee_team`
--
ALTER TABLE `employee_team`
  ADD CONSTRAINT `FKemployee_t415342` FOREIGN KEY (`teamid`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FKemployee_t893626` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`);

--
-- Constraints for table `file_name`
--
ALTER TABLE `file_name`
  ADD CONSTRAINT `FKfile_name621344` FOREIGN KEY (`sub_directoryid`) REFERENCES `sub_directory` (`id`),
  ADD CONSTRAINT `FKfile_name110070` FOREIGN KEY (`main_directoryid`) REFERENCES `main_directory` (`id`);

--
-- Constraints for table `main_directory`
--
ALTER TABLE `main_directory`
  ADD CONSTRAINT `FKmain_direc703729` FOREIGN KEY (`company_teeid`) REFERENCES `company_tee` (`id`);

--
-- Constraints for table `sub_directory`
--
ALTER TABLE `sub_directory`
  ADD CONSTRAINT `FKsub_direct295987` FOREIGN KEY (`main_directoryid`) REFERENCES `main_directory` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FKteam450108` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`);

--
-- Constraints for table `team_work`
--
ALTER TABLE `team_work`
  ADD CONSTRAINT `FKteam_work51567` FOREIGN KEY (`workid`) REFERENCES `work` (`id`),
  ADD CONSTRAINT `FKteam_work778358` FOREIGN KEY (`teamid`) REFERENCES `team` (`id`);

--
-- Constraints for table `time_work`
--
ALTER TABLE `time_work`
  ADD CONSTRAINT `FKtime_work583698` FOREIGN KEY (`workid2`) REFERENCES `work` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
