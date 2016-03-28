-- phpMyAdmin SQL Dump
-- version 4.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2015 at 01:32 AM
-- Server version: 5.6.26-log
-- PHP Version: 5.6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audit`
--
CREATE DATABASE IF NOT EXISTS `audit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `audit`;

-- --------------------------------------------------------

--
-- Table structure for table `audit_final`
--

CREATE TABLE `audit_final` (
  `audit_final_id` int(255) NOT NULL,
  `audit_final_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `audit_final_imp_dat` varchar(255) DEFAULT NULL,
  `audit_final_imp_who` varchar(255) DEFAULT NULL,
  `audit_final_year` varchar(255) DEFAULT NULL,
  `audit_final_month` varchar(255) DEFAULT NULL,
  `audit_final_name` varchar(255) DEFAULT NULL,
  `audit_final_path` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_final`
--

INSERT INTO `audit_final` (`audit_final_id`, `audit_final_timestamp`, `audit_final_imp_dat`, `audit_final_imp_who`, `audit_final_year`, `audit_final_month`, `audit_final_name`, `audit_final_path`, `fk_n_customer_id`) VALUES
(1, '2015-04-29 05:38:08', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'หนังสือรับรองความรับผิดชอบในการทำบัญชี-ของกิจการ', 'storage/1234567890/551234567890Doc7.pdf', '551234567890'),
(2, '2015-04-29 05:38:08', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายงานของผู้สอบบัญชี/งบการเงิน', 'storage/1234567890/551234567890Doc8.pdf', '551234567890'),
(3, '2015-04-29 05:38:08', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/1234567890/551234567890Doc9.pdf', '551234567890'),
(4, '2015-04-29 05:38:08', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ใบแจ้งหนี้/ใบเสร็จรับเงิน/หนังสือรับรองการหัก ณ ที่จ่าย', 'storage/1234567890/551234567890Doc10.pdf', '551234567890'),
(5, '2015-04-29 05:38:09', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายงานอื่นๆ', 'storage/1234567890/551234567890Doc11.pdf', '551234567890'),
(6, '2015-04-29 05:38:09', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'สำรองไฟล์โปรแกรมบัญชี-หลังตรวจ', 'storage/1234567890/551234567890Doc12.pdf', '551234567890'),
(7, '2015-06-08 17:50:51', '09/06/2558', '55022778', ' 2558', ' เดือน มิถุนายน', 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/789456123/audit_final-08-06-2015-19-50-51-12791-5678945612302.pdf', '56789456123'),
(8, '2015-06-09 03:36:47', '09/06/2558', '55022778', ' 2557', ' เดือน มกราคม', 'อื่นแล้วเสร็จ', 'storage/789456123/audit_final-09-06-2015-05-36-47-31673-56789456123Lec3.pdf', '56789456123');

-- --------------------------------------------------------

--
-- Table structure for table `audit_rc_mth`
--

CREATE TABLE `audit_rc_mth` (
  `audit_rc_m_id` int(25) NOT NULL,
  `audit_rc_mth_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `audit_rc_m_imp_dat` varchar(255) DEFAULT NULL,
  `audit_rc_m_import_who` varchar(255) DEFAULT NULL,
  `audit_rc_m_yt` varchar(255) DEFAULT NULL,
  `audit_rc_m_mt` varchar(255) DEFAULT NULL,
  `audit_rc_m_activity` varchar(255) DEFAULT NULL,
  `audit_rc_m_complete` varchar(255) DEFAULT NULL,
  `audit_rc_m_complete_dat` varchar(255) DEFAULT NULL,
  `audit_rc_m_progress` varchar(255) DEFAULT NULL,
  `audit_rc_m_valid` varchar(255) DEFAULT NULL,
  `audit_rc_m_valid_dat` varchar(255) DEFAULT NULL,
  `audit_rc_m_problem` varchar(255) DEFAULT NULL,
  `audit_rc_mth_descri` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_rc_mth`
--

INSERT INTO `audit_rc_mth` (`audit_rc_m_id`, `audit_rc_mth_timestamp`, `audit_rc_m_imp_dat`, `audit_rc_m_import_who`, `audit_rc_m_yt`, `audit_rc_m_mt`, `audit_rc_m_activity`, `audit_rc_m_complete`, `audit_rc_m_complete_dat`, `audit_rc_m_progress`, `audit_rc_m_valid`, `audit_rc_m_valid_dat`, `audit_rc_m_problem`, `audit_rc_mth_descri`, `fk_n_customer_id`) VALUES
(1, '2015-06-01 13:22:48', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายการวงจรรายจ่าย', 'เสร็จ', '29/04/2558', '100', 'สอบทาน', '29/04/2558', 'ไม่มี', 'ดีมากเลยครับ', '551234567890'),
(2, '2015-04-29 05:27:41', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายการวงจรรายได้', 'เสร็จ', '29/04/2558', '100', 'สอบทาน', '29/04/2558', 'ไม่มี', NULL, '551234567890'),
(3, '2015-04-29 05:27:41', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายการธนาคาร', 'เสร็จ', '29/04/2558', '100', 'สอบทาน', '30/04/2558', 'ไม่มี', NULL, '551234567890'),
(4, '2015-04-29 05:27:41', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายการสินค้าคงเหลือ', 'ไม่เสร็จ', '30/04/2558', '90', 'ไม่สอบทาน', '', 'เอกสารลูกค้าไม่ครบ', NULL, '551234567890'),
(5, '2015-04-29 05:27:42', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายการสินค้าคงเหลือ', 'ไม่เสร็จ', '30/04/2558', '90', 'ไม่สอบทาน', '', 'ขาดลาดเซ็นกำกับ', NULL, '551234567890'),
(6, '2015-04-29 05:29:31', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายการภาษี', 'ไม่เสร็จ', '30/04/2558', '90', 'ไม่สอบทาน', '', 'เอกสารลูกค้าไม่ครบ', 'รบกวนติดต่อลูกค้ามีความคืบหน้าอย่างไรโปรดแจ้งกลับด้วยครับ', '551234567890'),
(7, '2015-05-09 04:35:38', '09/05/2558', '550227788', '2558', ' เดือน พฤษภาคม', 'รายการวงจรรายจ่าย', 'เสร็จ', '08/05/2558', '100', 'สอบทาน', '09/05/2558', '', NULL, '601234567890'),
(8, '2015-05-09 04:35:38', '09/05/2558', '550227788', '2558', ' เดือน พฤษภาคม', 'รายการวงจรรายได้', 'ไม่เสร็จ', '', '50', 'ไม่สอบทาน', '', '46345', NULL, '601234567890'),
(9, '2015-05-16 18:35:21', '17/05/2558', '550227788', '2558', ' เดือน มิถุนายน', 'รายการวงจรรายจ่าย', 'เสร็จ', '17/05/2558', '100', 'สอบทาน', '17/05/2558', '', NULL, '601234567890'),
(10, '2015-05-16 18:35:21', '17/05/2558', '550227788', '2558', ' เดือน มิถุนายน', 'รายการธนาคาร', 'ไม่เสร็จ', '17/05/2558', '80', 'ไม่สอบทาน', '', '', NULL, '601234567890'),
(11, '2015-06-01 08:58:50', '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'รายการวงจรรายจ่าย', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890'),
(12, '2015-06-01 10:31:08', '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'รายการวงจรรายจ่าย', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890'),
(13, '2015-06-08 16:51:16', '08/06/2558', '55022778', ' 2558', ' เดือน มิถุนายน', 'รายการภาษี', 'เสร็จ', '08/06/2558', '100', 'สอบทาน', '08/06/2558', '-', NULL, '56789456123'),
(14, '2015-06-08 16:52:46', '08/06/2558', '55022778', ' 2558', ' เดือน มิถุนายน', 'รายการวงจรรายได้', 'เสร็จ', '08/06/2558', '100', 'สอบทาน', '08/06/2558', '-', NULL, '56789456123'),
(15, '2015-06-09 03:29:10', '09/06/2558', '55022778', ' 2558', ' เดือน มกราคม', 'รายการบันทึกรายการอื่น', 'เสร็จ', '09/06/2558', '100', 'สอบทาน', '09/06/2558', 'ไม่มี', NULL, '56789456123'),
(16, '2015-06-15 05:24:48', '15/06/2558', '55022857', ' 2558', ' เดือน มิถุนายน', 'รายการวงจรรายจ่าย', 'เสร็จ', '15/06/2558', '100', 'ไม่สอบทาน', '15/06/2558', 'ไม่มี', NULL, '5831354634343'),
(17, '2015-07-07 03:02:18', '08/07/2558', '55022778', ' 2559', ' เดือนภาษี', 'รายการวงจรรายได้', 'เสร็จ', '01/07/2558', '100', 'สอบทาน', '01/07/2558', 'trew', NULL, '5831354634343');

-- --------------------------------------------------------

--
-- Table structure for table `audit_rc_yr`
--

CREATE TABLE `audit_rc_yr` (
  `audit_rc_yr_id` int(25) NOT NULL,
  `audit_rc_yr_imp_dat` varchar(255) DEFAULT NULL,
  `audit_rc_yr_import_who` varchar(255) DEFAULT NULL,
  `audit_rc_yr_yt` varchar(255) DEFAULT NULL,
  `audit_rc_yr_mt` varchar(255) DEFAULT NULL,
  `audit_rc_yr_activity` varchar(255) DEFAULT NULL,
  `audit_rc_yr_complete` varchar(255) DEFAULT NULL,
  `audit_rc_yr_complete_dat` varchar(255) DEFAULT NULL,
  `audit_rc_yr_progress` varchar(255) DEFAULT NULL,
  `audit_rc_yr_valid` varchar(255) DEFAULT NULL,
  `audit_rc_yr_valid_dat` varchar(255) DEFAULT NULL,
  `audit_rc_yr_problem` varchar(255) DEFAULT NULL,
  `audit_rc_yr_descri` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) DEFAULT NULL,
  `audit_rc_yr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_rc_yr`
--

INSERT INTO `audit_rc_yr` (`audit_rc_yr_id`, `audit_rc_yr_imp_dat`, `audit_rc_yr_import_who`, `audit_rc_yr_yt`, `audit_rc_yr_mt`, `audit_rc_yr_activity`, `audit_rc_yr_complete`, `audit_rc_yr_complete_dat`, `audit_rc_yr_progress`, `audit_rc_yr_valid`, `audit_rc_yr_valid_dat`, `audit_rc_yr_problem`, `audit_rc_yr_descri`, `fk_n_customer_id`, `audit_rc_yr_timestamp`) VALUES
(1, '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'บัญชีสินทรัพย์', 'เสร็จ', '29/04/2558', '100', 'สอบทาน', '29/04/2558', 'ไม่มี', NULL, '551234567890', '2015-04-29 05:32:05'),
(2, '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'บัญชีหนี้สิน', 'เสร็จ', '29/04/2558', '100', 'สอบทาน', '29/04/2558', 'ไม่มี', NULL, '551234567890', '2015-04-29 05:32:06'),
(3, '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ส่วนของทุน', 'เสร็จ', '29/04/2558', '100', 'สอบทาน', '29/04/2558', 'ไม่มี', NULL, '551234567890', '2015-04-29 05:32:06'),
(4, '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'รายได้', 'เสร็จ', '29/04/2558', '100', 'สอบทาน', '29/04/2558', 'ไม่มี', NULL, '551234567890', '2015-04-29 05:32:06'),
(5, '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ค่าใช้จ่าย', 'ไม่เสร็จ', '30/04/2558', '80', 'ไม่สอบทาน', '30/04/2558', 'ใบเสร็จไม่ครบ', 'ติดต่อลูกค้าหรือยังครับ', '551234567890', '2015-04-29 05:37:08'),
(6, '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภาษี', 'ไม่เสร็จ', '30/04/2558', '85', 'ไม่สอบทาน', '30/04/2558', 'เอกสารไม่ครบ', NULL, '551234567890', '2015-04-29 05:32:06'),
(7, '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'บัญชีสินทรัพย์', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890', '2015-06-01 10:24:56'),
(8, '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'บัญชีสินทรัพย์', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890', '2015-06-01 10:26:16'),
(9, '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'บัญชีสินทรัพย์', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890', '2015-06-01 10:27:05'),
(10, '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'บัญชีสินทรัพย์', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '', NULL, '56789456123', '2015-06-01 10:28:15'),
(11, '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'บัญชีสินทรัพย์', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890', '2015-06-01 10:57:55'),
(12, '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'บัญชีสินทรัพย์', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890', '2015-06-01 10:58:46'),
(13, '01/06/2558', '55022778', '2558', ' เดือน มกราคม', 'บัญชีสินทรัพย์', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890', '2015-06-01 11:00:51'),
(14, '01/06/2558', '55022778', '2558', ' เดือน มิถุนายน', 'บัญชีสินทรัพย์', 'เสร็จ', '01/06/2558', '100', 'สอบทาน', '01/06/2558', '-', NULL, '551234567890', '2015-06-01 11:02:27'),
(15, '09/06/2558', '55022778', ' 2558', ' เดือน มิถุนายน', 'ส่วนของทุน', 'เสร็จ', '09/06/2558', '100', 'สอบทาน', '09/06/2558', '-', NULL, '601234567890', '2015-06-08 17:46:48'),
(17, '09/06/2558', '55022778', ' 2558', ' เดือน มกราคม', 'ที่ดิน', 'เสร็จ', '09/06/2558', '100', 'สอบทาน', '09/06/2558', 'ไม่มี', NULL, '56789456123', '2015-06-09 03:31:42'),
(18, '09/06/2558', '55022778', ' 2558', ' เดือน มกราคม', 'ที่ดินปี', 'เสร็จ', '09/06/2558', '100', 'สอบทาน', '09/06/2558', 'ไม่มีครับ', NULL, '56789456123', '2015-06-09 03:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `close_work`
--

CREATE TABLE `close_work` (
  `id` int(255) NOT NULL,
  `customer_gen` varchar(255) DEFAULT NULL,
  `close_time` varchar(255) DEFAULT NULL,
  `check_close` int(10) DEFAULT '0',
  `close_who` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `close_work`
--

INSERT INTO `close_work` (`id`, `customer_gen`, `close_time`, `check_close`, `close_who`) VALUES
(1, '56789456123', '31/05/2558', 0, '55022778'),
(3, '551234567890', '13/05/2558', 0, '55022778'),
(4, '561234567890', '31/25/2558', 0, '55022778'),
(5, '601234567890', '30/06/2558', 0, '55022778'),
(6, '611234567890', '10/06/2558', 0, '55022778'),
(7, '597012483720009', '10/06/2559', 0, '55022778'),
(8, '5831354634343', '15/06/2559', 0, '55022778'),
(9, '617894561230001', '01/09/2559', 0, '55022778');

-- --------------------------------------------------------

--
-- Table structure for table `coast_work`
--

CREATE TABLE `coast_work` (
  `coast_work_id` int(25) NOT NULL,
  `coast_work_role` varchar(255) DEFAULT NULL,
  `coast_work_hour` int(25) DEFAULT NULL,
  `coast_work_bath` int(25) DEFAULT NULL,
  `fk_employee_worker_id` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) DEFAULT NULL,
  `fk_customer_tax_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coast_work`
--

INSERT INTO `coast_work` (`coast_work_id`, `coast_work_role`, `coast_work_hour`, `coast_work_bath`, `fk_employee_worker_id`, `fk_n_customer_id`, `fk_customer_tax_id`) VALUES
(7, '0', 15, 2500, '55022778', '551234567890', '1234567890'),
(10, '0', 20, 500, '55022778', '601234567890', '1234567890'),
(11, '0', 20, 500, '55022857', '611234567890', '1234567890'),
(12, '1', 10, 500, '55022778', '611234567890', '1234567890'),
(16, '0', 20, 400, '58024222', '561234567890', '1234567890'),
(17, '0', 10, 1000, '55022778', '56789456123', '789456123'),
(18, '0', 10, 1000, '55022857', '56789456123', '789456123'),
(19, '1', 10, 1000, '58024222', '56789456123', '789456123'),
(20, '0', 200, 100, '55022778', '597012483720009', '7012483720009'),
(26, '1', 100, 300, '55022857', '601234567890', '1234567890'),
(27, '0', 500, 200, '55022778', '5831354634343', '31354634343'),
(28, '1', 70, 200, '55022857', '5831354634343', '31354634343'),
(29, '0', 20, 1000, '55022857', '56789456123', '789456123'),
(31, '0', 10, 5, '55022778', '617894561230001', '789456123'),
(37, '1', 1, 50, '55022857', '551234567890', '1234567890'),
(38, '1', 2, 20, '55022857', '551234567890', '1234567890'),
(39, '1', 5, 10, '55022857', '551234567890', '1234567890'),
(40, '1', 10, 200, '55022778', '611234567890', '1234567890'),
(41, '1', 12, 100, '55022778', '611234567890', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_tax_id` varchar(255) DEFAULT NULL,
  `company_trade_id` varchar(255) DEFAULT NULL,
  `company_addr_th` longtext,
  `company_addr_en` longtext,
  `company_tel` varchar(255) DEFAULT NULL,
  `company_fax` varchar(255) DEFAULT NULL,
  `company_web` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_img` varchar(255) DEFAULT NULL,
  `company_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_tax_id`, `company_trade_id`, `company_addr_th`, `company_addr_en`, `company_tel`, `company_fax`, `company_web`, `company_email`, `company_img`, `company_note`) VALUES
(1, 'บริษัท กาญจน์ บัญชีและภาษีอากร จำกัด', '356990001578', '356990001578', '20/3 ถนนราชสัมพันธ์ ตำบลเวียง อำเภอเมือง จังหวัดพะเยา 56000', '20/3 rashasumpun road wieang muang phayao 56000', '0869111059', '0869111059', 'www.s.auditor.com', 's.auditor@hotmail.com', 'storage/1111/auditaudit.JPG', 'ทดสอบ');

-- --------------------------------------------------------

--
-- Table structure for table `company_audit`
--

CREATE TABLE `company_audit` (
  `id` bigint(255) NOT NULL,
  `employee_work_id` varchar(255) DEFAULT NULL,
  `company_tax_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_audit`
--

INSERT INTO `company_audit` (`id`, `employee_work_id`, `company_tax_id`) VALUES
(4, '55022778', '356990001578');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `condition_id` int(25) NOT NULL,
  `condition_check` int(255) DEFAULT NULL,
  `condition_name` varchar(255) DEFAULT NULL,
  `condition_dat` varchar(255) DEFAULT NULL,
  `condition_month` varchar(255) DEFAULT NULL,
  `n_customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`condition_id`, `condition_check`, `condition_name`, `condition_dat`, `condition_month`, `n_customer_id`) VALUES
(28, 0, 'รายงานทางการเงินที่สำคัญ', ' 11', ' เดือน กรกฎาคม', '601234567890'),
(29, 1, 'ยื่น ภงด. 1, 2, 3, 53', ' 5', ' เดือน เมษายน', '601234567890'),
(30, 2, 'ยื่น ภพ.30 ภธ.40', ' 7', ' เดือน กรกฎาคม', '601234567890'),
(78, 0, 'รายงานทางการเงินที่สำคัญ', ' 1', ' เดือน มกราคม', '611234567890'),
(79, 4, 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ', ' 2', ' เดือน กุมภาพันธ์', '611234567890'),
(80, 7, 'ช่วยหน่อยนะ', ' 3', ' เดือน มีนาคม', '611234567890'),
(81, 8, 'qwerty', ' 4', ' เดือน เมษายน', '611234567890'),
(92, 0, 'รายงานทางการเงินที่สำคัญ', ' 11', ' เดือน พฤศจิกายน', '561234567890'),
(93, 2, 'ยื่น ภพ.30 ภธ.40', ' 16', ' เดือน กันยายน', '561234567890'),
(94, 3, 'ยื่น ประกันสังคม', ' 13', ' เดือน พฤศจิกายน', '561234567890'),
(95, 7, 'zzzzzzzzzzzzzzzzzzzzzzz', ' 17', ' เดือน สิงหาคม', '561234567890'),
(96, 8, 'xxxxxxxxxxxxxxxxxxxxxxxxx', ' 10', ' เดือน ตุลาคม', '561234567890'),
(116, 0, 'รายงานทางการเงินที่สำคัญ', ' 1', ' เดือน มกราคม', '597012483720009'),
(117, 1, 'ยื่น ภงด. 1, 2, 3, 53', ' 1', ' เดือน มกราคม', '56789456123'),
(118, 3, 'ยื่น ประกันสังคม', ' 1', ' เดือน มกราคม', '56789456123'),
(119, 4, 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ', ' 18', ' เดือน มีนาคม', '56789456123'),
(120, 5, 'รายงานภาษีหัก ณ ที่จ่ายประจำปี', ' 16', ' เดือน มิถุนายน', '56789456123'),
(121, 0, 'รายงานทางการเงินที่สำคัญ', ' 6', ' เดือน มกราคม', '5831354634343'),
(122, 1, 'ยื่น ภงด. 1, 2, 3, 53', ' 4', ' เดือน มกราคม', '5831354634343'),
(123, 2, 'ยื่น ภพ.30 ภธ.40', ' 4', ' เดือน มีนาคม', '5831354634343'),
(124, 3, 'ยื่น ประกันสังคม', ' 6', ' เดือน มีนาคม', '5831354634343'),
(125, 4, 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ', ' 5', ' เดือน มีนาคม', '5831354634343'),
(126, 5, 'รายงานภาษีหัก ณ ที่จ่ายประจำปี', ' 4', ' เดือน กุมภาพันธ์', '5831354634343'),
(127, 6, 'ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ', ' 3', ' เดือน มีนาคม', '5831354634343'),
(128, 0, 'รายงานทางการเงินที่สำคัญ', ' 4', ' เดือน มีนาคม', '617894561230001'),
(129, 0, 'รายงานทางการเงินที่สำคัญ', ' 1', ' เดือน มกราคม', '551234567890'),
(130, 1, 'ยื่น ภงด. 1, 2, 3, 53', ' 4', ' เดือน พฤษภาคม', '551234567890'),
(131, 2, 'ยื่น ภพ.30 ภธ.40', ' 5', ' เดือน กรกฎาคม', '551234567890'),
(132, 3, 'ยื่น ประกันสังคม', ' 7', ' เดือน พฤษภาคม', '551234567890'),
(133, 4, 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ', ' 26', ' เดือน มิถุนายน', '551234567890'),
(134, 5, 'รายงานภาษีหัก ณ ที่จ่ายประจำปี', ' 27', ' เดือน ธันวาคม', '551234567890'),
(135, 6, 'ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ', ' 28', ' เดือน ธันวาคม', '551234567890');

-- --------------------------------------------------------

--
-- Table structure for table `convention`
--

CREATE TABLE `convention` (
  `convention_id` int(25) NOT NULL,
  `convention_date` varchar(255) DEFAULT NULL,
  `convention_price` int(25) DEFAULT NULL,
  `convention_no` int(25) DEFAULT NULL,
  `convention_path` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `convention`
--

INSERT INTO `convention` (`convention_id`, `convention_date`, `convention_price`, `convention_no`, `convention_path`, `fk_n_customer_id`) VALUES
(5, '19/04/2558', 10000, 349859, 'storage/1234567890/551234567890Doc7.pdf', '551234567890'),
(6, '03/04/2558', 100000, 555555, '', '601234567890'),
(7, '15/05/2558', 10000, 2147483647, 'storage/1234567890/611234567890Doc3.pdf', '611234567890'),
(9, '16/05/2558', 10000, 4147, '', '561234567890');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_company` varchar(255) DEFAULT NULL,
  `customer_status` varchar(255) DEFAULT NULL,
  `customer_tax_id` varchar(255) DEFAULT NULL,
  `customer_trade_id` varchar(255) DEFAULT NULL,
  `customer_addr_th` varchar(255) DEFAULT NULL,
  `customer_addr_en` varchar(255) DEFAULT NULL,
  `customer_tel` varchar(255) DEFAULT NULL,
  `customer_fax` varchar(255) DEFAULT NULL,
  `customer_web` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_function` varchar(255) DEFAULT NULL,
  `customer_contact` varchar(255) DEFAULT NULL,
  `customer_contact_tel` varchar(255) DEFAULT NULL,
  `customer_contact_email` varchar(255) DEFAULT NULL,
  `customer_latitude` varchar(255) DEFAULT NULL,
  `customer_longitude` varchar(255) DEFAULT NULL,
  `customer_img` varchar(255) DEFAULT NULL,
  `path_store` varchar(255) DEFAULT NULL,
  `customer_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_company`, `customer_status`, `customer_tax_id`, `customer_trade_id`, `customer_addr_th`, `customer_addr_en`, `customer_tel`, `customer_fax`, `customer_web`, `customer_email`, `customer_function`, `customer_contact`, `customer_contact_tel`, `customer_contact_email`, `customer_latitude`, `customer_longitude`, `customer_img`, `path_store`, `customer_note`) VALUES
(3, 'บอร์สซิเออร์ อิเลคทรอนิคส์ จำกัด', 'บจก', '1234567890', '1234567890', 'เทส ประเทศไทย 00000', 'Test Thailland 00000', '02000000', '02000000', 'www.test.com', '55022778@up.ac.th', 'ไม่มี', 'นายไพรเพชร หิตการูญ', '0800000000', '55022778@up.ac.th', NULL, NULL, 'storage/1234567890/123456789011070772n.jpg', 'storage/1234567890', 'ทดสอบ'),
(4, 'บริษัท เจริญโภคภัณฑ์อาหาร จำกัด (มหาชน)', 'บจก', '46347825757', '25865985672', 'เลขที่ 313 อาคาร ซี.พี. ทาวเวอร์ ถ.สีลม บางรัก กรุงเทพ 10500 ประเทศไทย', '', '026258000', '', '', 'pr@cpf.co.th', '', 'CPPC CPPC', '028008000', 'job@cpf.co.th', NULL, NULL, NULL, 'storage/46347825757', ''),
(5, 'K.P.N COMPUTER', 'เจ้าของคนเดียว', '789456123', '321654987', '-', '-', '1234567897', '', '', '55022857@up.ac.th', '', 'วิทยานิพนธ์ แท่นทอง', '1435452385', '55022857@up.ac.th', NULL, NULL, 'storage/789456123/789456123216519514961.jpg', 'storage/789456123', ''),
(6, 'green mate', 'หสม', '7012483720009', '852592252464', '99 ม.9 ', '', '0273117255', '', '', 'admin@greenmate.com', '', 'ชูวิทย์ ณ อ่างทอง', '0273117255', 'admin@greenmate.com', NULL, NULL, NULL, 'storage/70-1-24837-2-0009', ''),
(7, 'samsung', 'หจก', '31354634343', '46524534633', 'เกาหลี', '', '036612514', '', '', '036612514@hotmail.com', '', 'ไพรดพชร', '036612514', '036612514@hotmail.com', NULL, NULL, 'storage/31354634343/31354634343abc.jpg', 'storage/31354634343', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_gen`
--

CREATE TABLE `customer_gen` (
  `n_customer_id` varchar(255) NOT NULL,
  `customer_gen_year` int(5) NOT NULL,
  `customer_gen_dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_gen_who` varchar(255) DEFAULT NULL,
  `customer_gen_revenue` int(255) DEFAULT NULL,
  `customer_gen_charge` int(255) DEFAULT NULL,
  `customer_gen_comment` varchar(255) DEFAULT NULL,
  `fk_customer_tax_id` varchar(255) DEFAULT NULL,
  `check_close` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_gen`
--

INSERT INTO `customer_gen` (`n_customer_id`, `customer_gen_year`, `customer_gen_dat`, `customer_gen_who`, `customer_gen_revenue`, `customer_gen_charge`, `customer_gen_comment`, `fk_customer_tax_id`, `check_close`) VALUES
('551234567890', 2559, '2015-10-16 16:41:11', '55022778', 25000, 200, 'ไม่มี', '1234567890', 0),
('561234567890', 2558, '2015-09-26 09:50:08', '550227788', 30000, 500, 'ไม่มี', '1234567890', 1),
('56789456123', 2558, '2015-09-26 09:50:03', '550227788', 800000, 400, 'ไม่มี', '789456123', 0),
('5831354634343', 2558, '2015-09-26 09:50:00', '55022778', 900000, 2099, 'ไม่มี', '31354634343', 0),
('597012483720009', 2558, '2015-09-26 09:49:56', '55022778', 50000, 200, 'ทดสอบ', '7012483720009', 0),
('601234567890', 2556, '2015-09-26 09:49:47', '55022778', 24515, 8000, 'ไม่มี', '1234567890', 1),
('611234567890', 2558, '2015-09-28 01:52:48', '550227788', 652368, 900, 'ไม่มี', '1234567890', 0),
('617894561230001', 2561, '2015-09-26 09:47:07', '55022778', 1000, 10, '', '789456123', 0),
('6770124837200090001', 2567, '2015-09-01 03:13:49', '55022778', 10000, 10, 'ไม่มี', '7012483720009', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daily_record`
--

CREATE TABLE `daily_record` (
  `dr_id` int(25) NOT NULL,
  `dr_report_dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dr_work_dat` varchar(255) DEFAULT NULL,
  `dr_em_id` varchar(255) DEFAULT NULL,
  `dr_time_hour` int(255) DEFAULT NULL,
  `dr_time_minute` int(255) DEFAULT NULL,
  `dr_record` int(255) DEFAULT NULL,
  `dr_check` int(10) DEFAULT NULL,
  `dr_detail` varchar(255) DEFAULT NULL,
  `dr_problem` varchar(255) DEFAULT NULL,
  `dr_descri` varchar(255) DEFAULT NULL,
  `dr_path` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daily_record`
--

INSERT INTO `daily_record` (`dr_id`, `dr_report_dat`, `dr_work_dat`, `dr_em_id`, `dr_time_hour`, `dr_time_minute`, `dr_record`, `dr_check`, `dr_detail`, `dr_problem`, `dr_descri`, `dr_path`, `fk_n_customer_id`) VALUES
(4, '2015-06-13 17:07:15', '29/04/2558', '55022778', 1, 10, 100, 2, 'ยื่น ภพ.30 ภธ.40', 'ไม่มี', 'ดีมากเลยครับ', 'storage/1234567890/551234567890Doc13.pdf', '551234567890'),
(5, '2015-06-13 17:07:19', '30/04/2558', '55022778', 2, 50, 200, 2, 'ยื่น ภพ.30 ภธ.40', '', NULL, 'storage/1234567890/551234567890Doc10.pdf', '551234567890'),
(10, '2015-06-13 17:07:31', '16/05/2558', '55022778', 1, 30, 110, 0, 'รายงานทางการเงินที่สำคัญ', '', NULL, 'storage/1234567890/611234567890Doc14.pdf', '611234567890'),
(11, '2015-06-13 17:07:27', '15/05/2558', '58024222', 3, 20, 10, 3, 'ยื่น ประกันสังคม', 'ghfgdsf', NULL, 'storage/1234567890/561234567890Doc9.pdf', '561234567890'),
(12, '2015-06-13 17:07:35', '16/05/2558', '58024222', 3, 0, 98, 4, 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ', 'fgrethe', NULL, 'storage/1234567890/611234567890Doc12.pdf', '611234567890'),
(13, '2015-06-13 17:07:23', '16/05/2558', '55022778', 2, 15, 350, 3, 'ยื่น ประกันสังคม', '', NULL, 'storage/1234567890/551234567890Doc10.pdf', '551234567890'),
(16, '2015-06-13 17:11:22', '08/06/2558', '55022778', 0, 2, 1, 4, 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ', '', NULL, 'storage/789456123/daily-08-06-2015-18-34-41-8137-5678945612303.pdf', '56789456123'),
(17, '2015-06-15 05:21:20', '15/06/2558', '55022778', 4, 0, 20, NULL, '', 'ติดต่อลูกค้าไม่ได้', NULL, 'storage/31354634343/daily-15-06-2015-07-21-20-472-5831354634343Doc3.pdf', '5831354634343'),
(18, '2015-08-31 16:37:11', '01/08/2558', '55022778', 2, 50, 500, NULL, '', 'ไม่รับ', NULL, 'storage/1234567890/daily-19-08-2015-11-49-59-14345-55123456789011857620_613154555454086_1628348649_n.jpg', '551234567890');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `employee_lname` varchar(255) DEFAULT NULL,
  `employee_worker_id` varchar(255) DEFAULT NULL,
  `employee_audit_id` varchar(255) DEFAULT NULL,
  `employee_nation_id` bigint(20) DEFAULT NULL,
  `employee_addr` varchar(255) DEFAULT NULL,
  `employee_addrp` varchar(255) DEFAULT NULL,
  `employee_tel` varchar(255) DEFAULT NULL,
  `employee_email` varchar(255) DEFAULT NULL,
  `employee_contact_name` varchar(255) DEFAULT NULL,
  `employee_contact_tel` varchar(255) DEFAULT NULL,
  `employee_graduate` varchar(255) DEFAULT NULL,
  `employee_major` varchar(255) DEFAULT NULL,
  `employee_grade` float DEFAULT NULL,
  `employee_academy` varchar(255) DEFAULT NULL,
  `employee_register_date` varchar(255) DEFAULT NULL,
  `employee_salary` bigint(20) DEFAULT NULL,
  `employee_married_status` varchar(255) DEFAULT NULL,
  `employee_coast` int(25) DEFAULT NULL,
  `employee_picture` varchar(255) DEFAULT NULL,
  `employee_datework` int(25) DEFAULT NULL,
  `employee_condition` varchar(255) DEFAULT NULL,
  `employee_note` varchar(255) DEFAULT NULL,
  `employee_convention` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_lname`, `employee_worker_id`, `employee_audit_id`, `employee_nation_id`, `employee_addr`, `employee_addrp`, `employee_tel`, `employee_email`, `employee_contact_name`, `employee_contact_tel`, `employee_graduate`, `employee_major`, `employee_grade`, `employee_academy`, `employee_register_date`, `employee_salary`, `employee_married_status`, `employee_coast`, `employee_picture`, `employee_datework`, `employee_condition`, `employee_note`, `employee_convention`) VALUES
(1, 'นายศุภโชค', 'ชุติมาลากุล', '55022778', 'A55022778', 1103701265086, 'เลขที่ 108/1 หมู่8 ซอย11 บ้านช่องลม ตำบลหัวฝาย อำเภอสูงเม่น จังหวัดแพร่ 54130', 'เลขที่ 19/4 ม.2 ตำบลแม่กา อำเภอเมือง จังหวัดพะเยา 56000', '0882249829', 'boss49829@gmail.com', 'นายวิทยานิพนธ์ แท่นทอง', '0855387928', 'ปริญญาเอก', 'วิศวกรรมคอมพิวเตอร์', 3.03, 'มหาวิทยาลัยพะเยา', '30/04/2558', 15000, 'โสด', 300, 'storage/1111/employee/1103701265086dsfd.png', 10, 'ลาพัก 3 ครั้ง ต่อปี ครั้งละ 1 สัปดาห์', NULL, 'storage/1111/employee/1103701265086ce.pdf'),
(3, 'นายวิทยานิพนธ์', 'แท่นทอง', '55022857', '55022857', 1179900234551, '33/7 ถ.มณีรัตน์ ต.อทุัยใหม่ อ.เมือง จ.อุทัยธานี', 'พะเยา', '0955387928', 'wp_thesis@outlook.com', '-', '', 'ปริญญาตรี', '', 0, '', '01/04/2558', 9000, 'โสด', 300, 'storage/1111/employee/10987739.jpg', 20, 'ค่ารักษาพยาบาลฟรี', '', NULL),
(6, 'นายไพเพชร', 'หิตการุญ', '58024222', 'A58024222', 3540422536879, 'เลขที่ 108/1 หมู่8 ซอย11 บ้านช่องลม ตำบลหัวฝาย อำเภอสูงเม่น จังหวัดแพร่ 54130', 'เลขที่ 108/1 หมู่8 ซอย11 บ้านช่องลม ตำบลหัวฝาย อำเภอสูงเม่น จังหวัดแพร่ 54130', '0983239629', 'test@test.com', '', '', 'ปริญญาตรี', 'บัญชี', 3.25, 'มหาวิทยาลัยพะเยา', '15/05/2558', 20000, 'โสด', 300, 'storage/1111/employee/3540422536879hot.jpg', 25, 'ค่ารักษาพยาบาล', '', NULL),
(7, 'นายชูวิทย์', 'ปัจฉิม', '58022857', '58022857', 1611790023451, 'อุทัยธานี', 'อุทัยธานี', '0855387928', '58022857@live.up.ac.th', '', '', 'ปริญญาตรี', '', 0, '', '10/06/2558', 5000, 'โสด', 300, NULL, 30, '', '', NULL),
(8, 'ดลยา', 'กองเงิน', 'dolaya', '58123456', 1234567891111, 'พะเยา', 'พะเยา', '036612514', 'mail@mail.com', '', '', 'NULL', '', 0, '', '01/09/2558', 60000, 'โสด', 300, NULL, 30, '', '', NULL),
(9, 'กองเงิน', 'ดลยา', '58888888', 'AC58888888', 1234567891234, 'พะเยา', 'พะเยา', '036612514', '036612514@mail.com', '', '', 'NULL', '', 0, '', '02/09/2558', 604215, 'โสด', 300, NULL, 30, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_customer`
--

CREATE TABLE `file_customer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upload_who` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_customer`
--

INSERT INTO `file_customer` (`id`, `name`, `path`, `date`, `upload_who`, `customer`) VALUES
(1, 'ทดสอบ1', 'storage/1234567890/doc-01-06-2015-09-10-46-103011432712241-t86-o.jpg', '2015-06-01 07:10:46', '55022857', '1234567890'),
(3, 'samsung', 'storage/1234567890/doc-15-06-2015-07-28-19-1845420131128153704695.jpg', '2015-06-15 05:28:19', '55022778', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `file_rc_mth`
--

CREATE TABLE `file_rc_mth` (
  `file_rc_mth_id` int(25) NOT NULL,
  `file_rc_mth_name` varchar(255) DEFAULT NULL,
  `file_rc_mth_path` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) NOT NULL,
  `fk_audit_rc_mth_id` int(25) DEFAULT NULL,
  `import_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_rc_mth`
--

INSERT INTO `file_rc_mth` (`file_rc_mth_id`, `file_rc_mth_name`, `file_rc_mth_path`, `fk_n_customer_id`, `fk_audit_rc_mth_id`, `import_time`) VALUES
(1, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/1234567890/551234567890Doc1.pdf', '551234567890', 11, '2015-06-01 11:13:54'),
(2, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/1234567890/601234567890Doc10.pdf', '601234567890', 11, '2015-06-01 11:13:50'),
(3, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/1234567890/601234567890Doc11.pdf', '601234567890', 12, '2015-06-01 11:13:46'),
(4, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/1234567890/551234567890235013_slide_week2.pdf', '551234567890', 12, '2015-06-01 11:13:41'),
(5, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/1234567890/551234567890lab7.pdf', '551234567890', 12, '2015-06-01 10:31:08'),
(6, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/789456123/audit_month-7339-7339-5678945612302.pdf', '56789456123', 13, '2015-06-08 16:51:16'),
(7, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/789456123/audit_month-24695-08-06-2015-18-52-47-5678945612302.pdf', '56789456123', 14, '2015-06-08 16:52:47'),
(8, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/31354634343/audit_month-1241-15-06-2015-07-24-48-5831354634343Doc5.pdf', '5831354634343', 16, '2015-06-15 05:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `file_rc_year`
--

CREATE TABLE `file_rc_year` (
  `file_rc_yr_id` int(25) NOT NULL,
  `file_rc_yr_name` varchar(255) DEFAULT NULL,
  `file_rc_yr_path` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) NOT NULL,
  `fk_audit_rc_yr_id` int(11) DEFAULT NULL,
  `import_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_rc_year`
--

INSERT INTO `file_rc_year` (`file_rc_yr_id`, `file_rc_yr_name`, `file_rc_yr_path`, `fk_n_customer_id`, `fk_audit_rc_yr_id`, `import_time`) VALUES
(1, 'หนังสืออนุมัติการนำส่งงบการเงินเพื่อการตรวจสอบบัญชี', 'storage/1234567890/551234567890Doc2.pdf', '551234567890', 3, '2015-06-01 11:08:32'),
(2, 'งบทดลอง/กระดาษทำการของกิจการ', 'storage/1234567890/551234567890Doc3.pdf', '551234567890', 3, '2015-06-01 11:08:41'),
(3, 'รายงานการสอบทานข้อมูลความถูกต้องในงบการเงิน', 'storage/1234567890/551234567890Doc4.pdf', '551234567890', 3, '2015-06-01 11:08:55'),
(4, 'รายงานการประเมินประสิทธิภาพการบันทึกรายการ-รายกิจการ', 'storage/1234567890/551234567890Doc5.pdf', '551234567890', 6, '2015-06-01 11:09:35'),
(5, 'สำรองไฟล์โปรแกรมบัญชี-ก่อนตรวจ', 'storage/1234567890/551234567890Doc6.pdf', '551234567890', 8, '2015-06-01 11:09:42'),
(6, 'หนังสืออนุมัติการนำส่งงบการเงินเพื่อการตรวจสอบบัญชี', 'storage/1234567890/551234567890lab7.pdf', '551234567890', 13, '2015-06-01 11:08:08'),
(7, 'หนังสืออนุมัติการนำส่งงบการเงินเพื่อการตรวจสอบบัญชี', 'storage/1234567890/551234567890lab7.pdf', '551234567890', 13, '2015-06-01 11:07:57'),
(8, 'หนังสืออนุมัติการนำส่งงบการเงินเพื่อการตรวจสอบบัญชี', 'storage/1234567890/551234567890lab7.pdf', '551234567890', 13, '2015-06-01 11:07:38'),
(9, 'หนังสืออนุมัติการนำส่งงบการเงินเพื่อการตรวจสอบบัญชี', 'storage/789456123/56789456123lab6.pdf', '56789456123', 12, '2015-06-01 11:07:33'),
(13, 'หนังสืออนุมัติการนำส่งงบการเงินเพื่อการตรวจสอบบัญชี', 'storage/1234567890/551234567890lab5.pdf', '551234567890', 14, '2015-06-01 11:02:27'),
(14, 'งบทดลอง/กระดาษทำการของกิจการ', 'storage/1234567890/audit_year-08-06-2015-19-46-49-674-60123456789003.pdf', '601234567890', 15, '2015-06-08 17:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `msn` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox` int(2) NOT NULL DEFAULT '0',
  `sendbox` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `title`, `sender`, `receiver`, `msn`, `time`, `inbox`, `sendbox`) VALUES
(2, 'ทดสอบข้อความ2', '55022857', '55022857', 'ทดสอบข้อความ2 -  วิทยานิพนธ์ แท่นทอง', '2015-06-01 07:04:57', 0, 0),
(4, 'ทดสอบข้อความ', '55022778', '58024222', 'ทดสอบข้อความ - นายไพภัทร หิตการุญ', '2015-06-03 16:15:27', 0, 0),
(6, 'ทดสอบการส่งข้อความ', '55022778', '55022857', 'Hello', '2015-06-14 07:52:14', 0, 0),
(7, 'ตอบกลับ:ทดสอบการส่งข้อความ', '55022857', '55022778', 'Hi', '2015-06-14 07:54:36', 0, 0),
(8, 'ตอบกลับ:ตอบกลับ:ทดสอบการส่งข้อความ', '55022778', '55022857', 'ว่ะ 5555555', '2015-06-14 07:54:54', 0, 0),
(9, 'สวัสดี', '55022778', '55022857', 'สวัสดี รบกวนตามงานลูกค้า', '2015-06-15 05:07:49', 0, 0),
(10, 'ทดสอบ', '55022778', '58024222', 'ทดสอบทดสอบ', '2015-07-07 03:12:35', 0, 0),
(12, 'สวัสดี', '55022778', '55022857', 'ระบบต้องใกล้เสร็จละนะ', '2015-09-30 04:00:09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `month_tax`
--

CREATE TABLE `month_tax` (
  `mt_id` int(25) NOT NULL,
  `month_tax_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mt_import_dat` varchar(255) DEFAULT NULL,
  `mt_import_who` varchar(255) DEFAULT NULL,
  `mt_year_tax` varchar(255) DEFAULT NULL,
  `mt_month_tax` varchar(255) DEFAULT NULL,
  `mt_tax_name` varchar(255) DEFAULT NULL,
  `mt_filing_dat` varchar(255) DEFAULT NULL,
  `mt_payment` varchar(255) DEFAULT NULL,
  `mt_payment_dat` varchar(255) DEFAULT NULL,
  `mt_receip_no` varchar(255) DEFAULT NULL,
  `mt_receip_file` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `month_tax`
--

INSERT INTO `month_tax` (`mt_id`, `month_tax_timestamp`, `mt_import_dat`, `mt_import_who`, `mt_year_tax`, `mt_month_tax`, `mt_tax_name`, `mt_filing_dat`, `mt_payment`, `mt_payment_dat`, `mt_receip_no`, `mt_receip_file`, `fk_n_customer_id`) VALUES
(1, '2015-04-29 05:39:43', '29/04/2558', '55022778', '2558', ' เดือน สิงหาคม', 'ภงด.1', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc12.pdf', '551234567890'),
(2, '2015-04-29 05:39:43', '29/04/2558', '55022778', '2558', ' เดือน สิงหาคม', 'ภงด.2', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc11.pdf', '551234567890'),
(3, '2015-04-29 05:39:44', '29/04/2558', '55022778', '2558', ' เดือน สิงหาคม', 'ภงด.3', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc10.pdf', '551234567890'),
(4, '2015-04-29 05:39:44', '29/04/2558', '55022778', '2558', ' เดือน สิงหาคม', 'ภงด.53', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc9.pdf', '551234567890'),
(5, '2015-04-29 05:39:44', '29/04/2558', '55022778', '2558', ' เดือน สิงหาคม', 'ภพ.30', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc8.pdf', '551234567890'),
(6, '2015-04-29 05:41:11', '29/04/2558', '55022778', '2558', ' เดือน มิถุนายน', 'ภงด.1', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc12.pdf', '551234567890'),
(7, '2015-04-29 05:41:11', '29/04/2558', '55022778', '2558', ' เดือน มิถุนายน', 'ภงด.2', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc11.pdf', '551234567890'),
(8, '2015-04-29 05:41:11', '29/04/2558', '55022778', '2558', ' เดือน มิถุนายน', 'ภงด.3', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc10.pdf', '551234567890'),
(9, '2015-04-29 05:41:12', '29/04/2558', '55022778', '2558', ' เดือน มิถุนายน', 'ภงด.53', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc9.pdf', '551234567890'),
(10, '2015-04-29 05:41:12', '29/04/2558', '55022778', '2558', ' เดือน มิถุนายน', 'ภพ.30', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc8.pdf', '551234567890'),
(11, '2015-04-29 05:41:12', '29/04/2558', '55022778', '2558', ' เดือน มิถุนายน', 'ภธ.40', '29/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc7.pdf', '551234567890'),
(15, '2015-06-08 17:59:33', '09/06/2558', '55022778', 'ปีภาษี', ' เดือนภาษี', 'ภงด.1', '09/06/2558', '100', '09/06/2558', '1212454', 'storage/789456123/tax_month-08-06-2015-19-59-33-32520-5678945612303.pdf', '56789456123'),
(16, '2015-06-09 03:38:46', '09/06/2558', '55022778', ' 2557', ' เดือน มกราคม', 'อื่นๆภาษีเดือน', '09/06/2558', '25000', '09/06/2558', '1253565', 'storage/789456123/tax_month-09-06-2015-05-38-46-21926-56789456123lec7.pdf', '56789456123'),
(18, '2015-06-12 13:45:25', '12/06/2558', '55022778', ' 2559', ' เดือน กุมภาพันธ์', 'ประกันสังคม', '12/06/2558', '789', '12/06/2558', '1234', 'storage/1234567890/tax_month-12-06-2015-15-45-25-32258-551234567890lec9.pdf', '551234567890');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL COMMENT 'ID',
  `payment_save` varchar(255) NOT NULL COMMENT 'วันที่ทำการบันทึก',
  `payment_revenue` varchar(255) DEFAULT NULL COMMENT 'วันที่รับเงิน',
  `payment_bill` varchar(255) DEFAULT NULL COMMENT 'เลขที่ใบเสร็จ',
  `payment_coast` int(10) DEFAULT NULL COMMENT 'จำนวนเงิน',
  `payment_detail` varchar(255) DEFAULT NULL COMMENT 'รายละเอียด',
  `payment_path` varchar(255) DEFAULT NULL,
  `fk_employee` varchar(255) DEFAULT NULL COMMENT 'รหัสพนักงานที่ทำการบันทึก',
  `fk_n_customer` varchar(255) DEFAULT NULL COMMENT 'รหัสงานบริษัท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เก็บข้อมูลการรับเงินของงาน';

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_save`, `payment_revenue`, `payment_bill`, `payment_coast`, `payment_detail`, `payment_path`, `fk_employee`, `fk_n_customer`) VALUES
(1, '28/09/2015', '28/09/2558', 'A1253', 5000, 'เอกสารรับเงิน', 'storage/31354634343/58313546343434.PDF', '55022857', '5831354634343'),
(2, '29/09/2015', '29/09/2015', 'A581', 300, 'เงินงวด2', '', '55022778', '5831354634343'),
(3, '29/09/2015', '29/09/2015', 'A582', 250, 'เงินงวด1', '', '55022778', '56789456123');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quotation_id` int(25) NOT NULL,
  `quotation_date` varchar(255) DEFAULT NULL,
  `quotation_price` int(25) DEFAULT NULL,
  `quotation_no` int(25) DEFAULT NULL,
  `quotation_path` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotation_id`, `quotation_date`, `quotation_price`, `quotation_no`, `quotation_path`, `fk_n_customer_id`) VALUES
(5, '28/04/2558', 50000, 93256, 'storage/1234567890/551234567890Doc11.pdf', '551234567890'),
(6, '01/04/2558', 100000, 111111, '', '601234567890'),
(7, '14/05/2558', 20000, 2147483647, 'storage/1234567890/611234567890Doc11.pdf', '611234567890'),
(9, '16/05/2558', 20000, 78, '', '561234567890');

-- --------------------------------------------------------

--
-- Table structure for table `receip_return_doc`
--

CREATE TABLE `receip_return_doc` (
  `receip_return_doc_id` int(25) NOT NULL,
  `doc_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `receip_return_doc_imp_dat` varchar(255) DEFAULT NULL,
  `receip_return_doc_dat` varchar(255) DEFAULT NULL,
  `receip_return_doc_no` varchar(255) DEFAULT NULL,
  `receip_return_doc_head` varchar(255) DEFAULT NULL,
  `receip_return_doc_imp_who` varchar(255) DEFAULT NULL,
  `receip_return_doc_path` varchar(255) DEFAULT NULL,
  `customer_tax_id` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receip_return_doc`
--

INSERT INTO `receip_return_doc` (`receip_return_doc_id`, `doc_timestamp`, `receip_return_doc_imp_dat`, `receip_return_doc_dat`, `receip_return_doc_no`, `receip_return_doc_head`, `receip_return_doc_imp_who`, `receip_return_doc_path`, `customer_tax_id`, `fk_n_customer_id`) VALUES
(1, '2015-06-01 13:47:16', '01/06/2558', '01/06/2558', '1234567890', 'รับเอกสาร', '55022778', 'storage/1234567890/551234567890lab9.pdf', '1234567890', '551234567890'),
(2, '2015-06-08 18:23:31', '09/06/2558', '09/06/2558', '1234567890', 'รับเอกสาร', '55022778', 'storage/1234567890/551234567890lec9.pdf', '1234567890', '551234567890'),
(3, '2015-06-08 18:27:06', '10/06/2558', '09/06/2558', '581234567890', 'รับเอกสาร', '55022778', 'storage/1234567890/courier-08-06-2015-20-27-06-13985-551234567890review.pdf', '1234567890', '551234567890');

-- --------------------------------------------------------

--
-- Table structure for table `signatory_company`
--

CREATE TABLE `signatory_company` (
  `signatory_company_id` int(25) NOT NULL,
  `signatory_company_name` varchar(255) DEFAULT NULL,
  `signatory_company_status` varchar(255) DEFAULT NULL,
  `signatory_company_tax_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signatory_company`
--

INSERT INTO `signatory_company` (`signatory_company_id`, `signatory_company_name`, `signatory_company_status`, `signatory_company_tax_id`) VALUES
(1, 'นายศุภโชค ชุติมาลากุล', 'เจ้าของกิจการ', '356990001578'),
(4, 'นายศุภชัย ชุติมาลากุลทวี', 'หุ้นส่วนผู้จัดการ', '356990001578'),
(6, 'นายศุภลักษณ์ ชุติมาลากุลทวี', 'กรรมการผู้จัดการ', '356990001578');

-- --------------------------------------------------------

--
-- Table structure for table `signatory_customer`
--

CREATE TABLE `signatory_customer` (
  `signatory_id` int(25) NOT NULL,
  `signatory_name` varchar(255) DEFAULT NULL,
  `signatory_status` varchar(255) DEFAULT NULL,
  `customer_tax_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signatory_customer`
--

INSERT INTO `signatory_customer` (`signatory_id`, `signatory_name`, `signatory_status`, `customer_tax_id`) VALUES
(6, 'Test test', 'เจ้าของกิจการ', '1234567890'),
(7, 'TEST testter', 'กรรมการผู้จัดการ', '1234567890'),
(8, 'CP CP', 'เจ้าของกิจการ', '46347825757'),
(9, 'PC PC', 'หุ้นส่วนผู้จัดการ', '46347825757'),
(10, 'asfdgjhj', 'เจ้าของกิจการ', '789456123'),
(11, 'sgdflktugfhdf', 'กรรมการผู้จัดการ', '789456123'),
(12, 'srtyklfyghlfghdgfh', 'หุ้นส่วนผู้จัดการ', '789456123'),
(13, 'ชูวิทย์ ณ อ่างทอง', 'เจ้าของกิจการ', '7012483720009'),
(14, 'ไพรดพชร', 'หุ้นส่วนผู้จัดการ', '31354634343');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` int(10) NOT NULL DEFAULT '2',
  `user_session_id` varchar(255) NOT NULL,
  `fkey_worker_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `user_status`, `user_session_id`, `fkey_worker_id`) VALUES
(5, '55022778', '25f9e794323b453885f5181f1b624d0b', 1, '', '55022778'),
(8, '55022857', '25f9e794323b453885f5181f1b624d0b', 1, '', '55022857'),
(9, 'test@test.com', '25f9e794323b453885f5181f1b624d0b', 2, '', '58024222'),
(10, '58022857', '25f9e794323b453885f5181f1b624d0b', 2, '', '58022857'),
(11, 'dolaya', '6e4029a3e9f0a13027c9c4d11eaf3152', 2, '', 'dolaya'),
(12, '58888888', '06da35a2d0f03840660dbd41b9958781', 2, '', '58888888');

-- --------------------------------------------------------

--
-- Table structure for table `work_details`
--

CREATE TABLE `work_details` (
  `work_details_id` int(25) NOT NULL,
  `work_start` varchar(255) DEFAULT NULL,
  `work_end` varchar(255) DEFAULT NULL,
  `work_receip_dat` varchar(255) DEFAULT NULL,
  `work_coast_choice` varchar(255) DEFAULT NULL,
  `work_coast_bath` varchar(255) DEFAULT NULL,
  `work_period` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_details`
--

INSERT INTO `work_details` (`work_details_id`, `work_start`, `work_end`, `work_receip_dat`, `work_coast_choice`, `work_coast_bath`, `work_period`, `fk_n_customer_id`) VALUES
(5, '01/04/2558', '30/04/2558', '19/04/2558', 'รายเดือน', '1000', '1', '551234567890'),
(6, '01/04/2558', '31/05/2558', '02/04/2558', '0', '10000', '2', '601234567890'),
(7, '01/05/2558', '31/05/2558', '16/05/2558', '1', '20000', '1', '611234567890'),
(9, '01/05/2558', '30/06/2558', '16/05/2558', '1', '20000', '1', '561234567890'),
(10, '10/06/2558', '10/06/2559', '10/06/2558', '0', '2000', '12', '597012483720009'),
(11, '15/06/2558', '15/06/2559', '15/06/2558', '0', '80000', '12', '5831354634343'),
(12, '01/09/2558', '01/09/2559', '01/09/2558', '1', '5', '12', '617894561230001');

-- --------------------------------------------------------

--
-- Table structure for table `year_tax`
--

CREATE TABLE `year_tax` (
  `yt_id` int(25) NOT NULL,
  `year_tax_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `yt_import_dat` varchar(255) DEFAULT NULL,
  `yt_import_who` varchar(255) DEFAULT NULL,
  `yt_year_tax` varchar(255) DEFAULT NULL,
  `yt_month_tax` varchar(255) DEFAULT NULL,
  `yt_tax_name` varchar(255) DEFAULT NULL,
  `yt_filing_dat` varchar(255) DEFAULT NULL,
  `yt_payment` varchar(255) DEFAULT NULL,
  `yt_payment_dat` varchar(255) DEFAULT NULL,
  `yt_receip_no` varchar(255) DEFAULT NULL,
  `yt_receip_file` varchar(255) DEFAULT NULL,
  `fk_n_customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year_tax`
--

INSERT INTO `year_tax` (`yt_id`, `year_tax_timestamp`, `yt_import_dat`, `yt_import_who`, `yt_year_tax`, `yt_month_tax`, `yt_tax_name`, `yt_filing_dat`, `yt_payment`, `yt_payment_dat`, `yt_receip_no`, `yt_receip_file`, `fk_n_customer_id`) VALUES
(1, '2015-04-29 05:44:01', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภงด.1ก', '30/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc2.pdf', '551234567890'),
(2, '2015-04-29 05:44:01', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภงด.2ก', '30/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc1.pdf', '551234567890'),
(3, '2015-04-29 05:44:01', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภงด.3ก', '30/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc3.pdf', '551234567890'),
(4, '2015-04-29 05:44:01', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภงด.51', '30/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc4.pdf', '551234567890'),
(5, '2015-04-29 05:44:01', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภงด.50', '30/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc5.pdf', '551234567890'),
(6, '2015-04-29 05:44:01', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภงด.94', '30/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc6.pdf', '551234567890'),
(7, '2015-04-29 05:44:01', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภงด.90', '30/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc7.pdf', '551234567890'),
(8, '2015-04-29 05:44:01', '29/04/2558', '55022778', '2558', ' เดือน เมษายน', 'ภงด.91', '30/04/2558', '10000', '30/04/2558', '1234', 'storage/1234567890/551234567890Doc8.pdf', '551234567890'),
(9, '2015-06-08 18:05:17', '09/06/2558', '55022778', ' 2558', ' เดือน มิถุนายน', 'ประกันสังคม', '09/06/2558', '1000', '02/06/2558', '1212454', 'storage/789456123/tax_year-08-06-2015-20-05-17-5579-56789456123Outline_235012.pdf', '56789456123'),
(11, '2015-06-09 09:57:40', '09/06/2558', '55022778', ' 2558', ' เดือน มีนาคม', 'ภงด.1ก', '10/06/2558', '100', '09/06/2558', '1212454', 'storage/1234567890/tax_year-09-06-2015-11-57-40-3168-551234567890review.pdf', '551234567890'),
(12, '2015-06-11 14:03:07', '11/06/2558', '55022778', ' 2558', ' เดือน ธันวาคม', 'ภงด.1ก', '09/06/2558', '100', '09/06/2558', '1212454', 'storage/1234567890/tax_year-11-06-2015-16-03-07-21143-551234567890Lec6.pdf', '551234567890'),
(13, '2015-06-12 09:42:18', '12/06/2558', '55022778', ' 2560', ' เดือน มกราคม', 'ภงด.1ก', '12/06/2558', '999', '12/06/2558', '1253565', 'storage/1234567890/tax_year-12-06-2015-11-42-18-29998-611234567890lec7.pdf', '611234567890'),
(14, '2015-06-12 13:18:58', '12/06/2558', '55022778', ' 2557', ' เดือน มกราคม', 'ประกันสังคม', '13/06/2558', '100', '13/06/2558', '1212454', 'storage/1234567890/tax_year-12-06-2015-15-18-58-6442-551234567890lec10.pdf', '551234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_final`
--
ALTER TABLE `audit_final`
  ADD PRIMARY KEY (`audit_final_id`),
  ADD KEY `fk_n_customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `audit_rc_mth`
--
ALTER TABLE `audit_rc_mth`
  ADD PRIMARY KEY (`audit_rc_m_id`),
  ADD KEY `fk_customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `audit_rc_yr`
--
ALTER TABLE `audit_rc_yr`
  ADD PRIMARY KEY (`audit_rc_yr_id`),
  ADD KEY `fk_customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `close_work`
--
ALTER TABLE `close_work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `close_work_ibfk_2` (`customer_gen`),
  ADD KEY `close_work_ibfk_1` (`close_who`);

--
-- Indexes for table `coast_work`
--
ALTER TABLE `coast_work`
  ADD PRIMARY KEY (`coast_work_id`),
  ADD KEY `fk_employee_worker_id` (`fk_employee_worker_id`),
  ADD KEY `fk_n_customer_id` (`fk_n_customer_id`),
  ADD KEY `fk_customer_tax_id` (`fk_customer_tax_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD UNIQUE KEY `company_tax_id` (`company_tax_id`),
  ADD UNIQUE KEY `company_trade_id` (`company_trade_id`);

--
-- Indexes for table `company_audit`
--
ALTER TABLE `company_audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_work_id` (`employee_work_id`),
  ADD KEY `company_tax_id` (`company_tax_id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`condition_id`),
  ADD KEY `n_customer_id` (`n_customer_id`);

--
-- Indexes for table `convention`
--
ALTER TABLE `convention`
  ADD PRIMARY KEY (`convention_id`),
  ADD KEY `customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_company` (`customer_company`),
  ADD UNIQUE KEY `customer_tax_id` (`customer_tax_id`),
  ADD UNIQUE KEY `customer_trade_id` (`customer_trade_id`);

--
-- Indexes for table `customer_gen`
--
ALTER TABLE `customer_gen`
  ADD PRIMARY KEY (`n_customer_id`),
  ADD KEY `fk_customer_id` (`fk_customer_tax_id`);

--
-- Indexes for table `daily_record`
--
ALTER TABLE `daily_record`
  ADD PRIMARY KEY (`dr_id`),
  ADD KEY `fk_customer_id` (`fk_n_customer_id`),
  ADD KEY `dr_em_id` (`dr_em_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_worker_id` (`employee_worker_id`),
  ADD UNIQUE KEY `employee_audit_id` (`employee_audit_id`),
  ADD UNIQUE KEY `employee_nation_id` (`employee_nation_id`);

--
-- Indexes for table `file_customer`
--
ALTER TABLE `file_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_customer_ibfk_1` (`upload_who`),
  ADD KEY `file_customer_ibfk_2` (`customer`);

--
-- Indexes for table `file_rc_mth`
--
ALTER TABLE `file_rc_mth`
  ADD PRIMARY KEY (`file_rc_mth_id`),
  ADD KEY `fk_audit_rc_mth_id` (`fk_audit_rc_mth_id`),
  ADD KEY `fk_n_customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `file_rc_year`
--
ALTER TABLE `file_rc_year`
  ADD PRIMARY KEY (`file_rc_yr_id`),
  ADD KEY `fk_audit_rc_yr_id` (`fk_audit_rc_yr_id`),
  ADD KEY `fk_n_customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_ibfk_1` (`sender`),
  ADD KEY `message_ibfk_2` (`receiver`);

--
-- Indexes for table `month_tax`
--
ALTER TABLE `month_tax`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `fk_customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_ibfk_1` (`fk_employee`),
  ADD KEY `payment_ibfk_2` (`fk_n_customer`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quotation_id`),
  ADD KEY `customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `receip_return_doc`
--
ALTER TABLE `receip_return_doc`
  ADD PRIMARY KEY (`receip_return_doc_id`),
  ADD KEY `fk_customer_id` (`fk_n_customer_id`),
  ADD KEY `customer_tax_id` (`customer_tax_id`);

--
-- Indexes for table `signatory_company`
--
ALTER TABLE `signatory_company`
  ADD PRIMARY KEY (`signatory_company_id`),
  ADD KEY `signatory_company_tax_id` (`signatory_company_tax_id`);

--
-- Indexes for table `signatory_customer`
--
ALTER TABLE `signatory_customer`
  ADD PRIMARY KEY (`signatory_id`),
  ADD KEY `customer_tax_id` (`customer_tax_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fkey_worker_id` (`fkey_worker_id`);

--
-- Indexes for table `work_details`
--
ALTER TABLE `work_details`
  ADD PRIMARY KEY (`work_details_id`),
  ADD KEY `fk_n_customer_id` (`fk_n_customer_id`);

--
-- Indexes for table `year_tax`
--
ALTER TABLE `year_tax`
  ADD PRIMARY KEY (`yt_id`),
  ADD KEY `fk_customer_id` (`fk_n_customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_final`
--
ALTER TABLE `audit_final`
  MODIFY `audit_final_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `audit_rc_mth`
--
ALTER TABLE `audit_rc_mth`
  MODIFY `audit_rc_m_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `audit_rc_yr`
--
ALTER TABLE `audit_rc_yr`
  MODIFY `audit_rc_yr_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `close_work`
--
ALTER TABLE `close_work`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `coast_work`
--
ALTER TABLE `coast_work`
  MODIFY `coast_work_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company_audit`
--
ALTER TABLE `company_audit`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `condition_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `convention`
--
ALTER TABLE `convention`
  MODIFY `convention_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `daily_record`
--
ALTER TABLE `daily_record`
  MODIFY `dr_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `file_customer`
--
ALTER TABLE `file_customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `file_rc_mth`
--
ALTER TABLE `file_rc_mth`
  MODIFY `file_rc_mth_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `file_rc_year`
--
ALTER TABLE `file_rc_year`
  MODIFY `file_rc_yr_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `month_tax`
--
ALTER TABLE `month_tax`
  MODIFY `mt_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quotation_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `receip_return_doc`
--
ALTER TABLE `receip_return_doc`
  MODIFY `receip_return_doc_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `signatory_company`
--
ALTER TABLE `signatory_company`
  MODIFY `signatory_company_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `signatory_customer`
--
ALTER TABLE `signatory_customer`
  MODIFY `signatory_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `work_details`
--
ALTER TABLE `work_details`
  MODIFY `work_details_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `year_tax`
--
ALTER TABLE `year_tax`
  MODIFY `yt_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_final`
--
ALTER TABLE `audit_final`
  ADD CONSTRAINT `audit_final_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_rc_mth`
--
ALTER TABLE `audit_rc_mth`
  ADD CONSTRAINT `audit_rc_mth_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_rc_yr`
--
ALTER TABLE `audit_rc_yr`
  ADD CONSTRAINT `audit_rc_yr_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `close_work`
--
ALTER TABLE `close_work`
  ADD CONSTRAINT `close_work_ibfk_1` FOREIGN KEY (`close_who`) REFERENCES `employee` (`employee_worker_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `close_work_ibfk_2` FOREIGN KEY (`customer_gen`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coast_work`
--
ALTER TABLE `coast_work`
  ADD CONSTRAINT `coast_work_ibfk_2` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coast_work_ibfk_3` FOREIGN KEY (`fk_customer_tax_id`) REFERENCES `customer` (`customer_tax_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coast_work_ibfk_4` FOREIGN KEY (`fk_employee_worker_id`) REFERENCES `employee` (`employee_worker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_audit`
--
ALTER TABLE `company_audit`
  ADD CONSTRAINT `company_audit_ibfk_2` FOREIGN KEY (`company_tax_id`) REFERENCES `company` (`company_tax_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_audit_ibfk_3` FOREIGN KEY (`employee_work_id`) REFERENCES `employee` (`employee_worker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conditions`
--
ALTER TABLE `conditions`
  ADD CONSTRAINT `conditions_ibfk_1` FOREIGN KEY (`n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `convention`
--
ALTER TABLE `convention`
  ADD CONSTRAINT `convention_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_gen`
--
ALTER TABLE `customer_gen`
  ADD CONSTRAINT `customer_gen_ibfk_1` FOREIGN KEY (`fk_customer_tax_id`) REFERENCES `customer` (`customer_tax_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daily_record`
--
ALTER TABLE `daily_record`
  ADD CONSTRAINT `daily_record_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daily_record_ibfk_2` FOREIGN KEY (`dr_em_id`) REFERENCES `employee` (`employee_worker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_customer`
--
ALTER TABLE `file_customer`
  ADD CONSTRAINT `file_customer_ibfk_1` FOREIGN KEY (`upload_who`) REFERENCES `employee` (`employee_worker_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `file_customer_ibfk_2` FOREIGN KEY (`customer`) REFERENCES `customer` (`customer_tax_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `file_rc_mth`
--
ALTER TABLE `file_rc_mth`
  ADD CONSTRAINT `file_rc_mth_ibfk_2` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_rc_year`
--
ALTER TABLE `file_rc_year`
  ADD CONSTRAINT `file_rc_year_ibfk_1` FOREIGN KEY (`fk_audit_rc_yr_id`) REFERENCES `audit_rc_yr` (`audit_rc_yr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_rc_year_ibfk_2` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `employee` (`employee_worker_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `employee` (`employee_worker_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `month_tax`
--
ALTER TABLE `month_tax`
  ADD CONSTRAINT `month_tax_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`fk_employee`) REFERENCES `employee` (`employee_worker_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`fk_n_customer`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receip_return_doc`
--
ALTER TABLE `receip_return_doc`
  ADD CONSTRAINT `receip_return_doc_ibfk_1` FOREIGN KEY (`customer_tax_id`) REFERENCES `customer` (`customer_tax_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receip_return_doc_ibfk_2` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `signatory_company`
--
ALTER TABLE `signatory_company`
  ADD CONSTRAINT `signatory_company_ibfk_1` FOREIGN KEY (`signatory_company_tax_id`) REFERENCES `company` (`company_tax_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `signatory_customer`
--
ALTER TABLE `signatory_customer`
  ADD CONSTRAINT `signatory_customer_ibfk_1` FOREIGN KEY (`customer_tax_id`) REFERENCES `customer` (`customer_tax_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fkey_worker_id`) REFERENCES `employee` (`employee_worker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_details`
--
ALTER TABLE `work_details`
  ADD CONSTRAINT `work_details_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `year_tax`
--
ALTER TABLE `year_tax`
  ADD CONSTRAINT `year_tax_ibfk_1` FOREIGN KEY (`fk_n_customer_id`) REFERENCES `customer_gen` (`n_customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
