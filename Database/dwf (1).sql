-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 11:47 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dwf`
--

-- --------------------------------------------------------

--
-- Table structure for table `camdetails`
--

CREATE TABLE IF NOT EXISTS `camdetails` (
`cam_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `tel_no` varchar(256) NOT NULL,
  `alternate_no` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camdetails`
--

INSERT INTO `camdetails` (`cam_id`, `name`, `email`, `tel_no`, `alternate_no`) VALUES
(2, 'Subrato Sarkar', 'subrat.07@gmail.com', '+919980630145', '+919980630145'),
(3, 'Kumara Swamy', 'kumarrash1947@gmail.com', '+919916349204', '+919916349204'),
(7, 'Sujith S', 'ssujith31@gmail.com', '+919686553971', '+919686553971'),
(8, 'vijay khot', 'khotvijayn@gmail.com', '8861223320', '6534227766'),
(9, 'sangram', 'khotvijayn@gmail.com', '6655774433', '9988776655'),
(10, 'Suresh', 'khotvijayn@gmail.com', '9988774455', '8877334455'),
(11, 'Ajit', 'vijaynkhot@gmail.com', '8877334433', '9988776633'),
(12, 'Prakash', 'vijaynkhot@gmail.com', '7766223344', '9988221133'),
(13, 'dadu', 'vijaynkhot@gmail.com', '87654567', '7654323456'),
(14, 'tanaji khot', 'vijaynkhot@gmail.com', '7766553340', '');

-- --------------------------------------------------------

--
-- Table structure for table `cams`
--

CREATE TABLE IF NOT EXISTS `cams` (
`cam_id` int(11) NOT NULL,
  `cam_name` varchar(256) NOT NULL,
  `cam_pword` varchar(256) NOT NULL,
  `cam_published` tinyint(1) NOT NULL,
  `modified_on` datetime NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cams`
--

INSERT INTO `cams` (`cam_id`, `cam_name`, `cam_pword`, `cam_published`, `modified_on`, `created_on`) VALUES
(2, 'subrato', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-02-17 12:31:00', '2014-12-18 16:44:10'),
(3, 'kumara', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2014-12-18 16:45:28', '2014-12-18 16:45:28'),
(7, 'sujith', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-14 15:06:39', '2015-01-14 15:06:39'),
(8, 'vijayn39', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-16 22:44:53', '2015-01-16 22:44:53'),
(9, 'vijayn', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-18 22:03:46', '2015-01-18 22:03:46'),
(10, 'vijaynkhot', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-19 01:10:46', '2015-01-19 01:10:46'),
(11, 'vkhot', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-19 03:37:29', '2015-01-19 03:37:29'),
(12, 'vijaynkhot39', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-20 03:14:56', '2015-01-20 03:14:56'),
(13, 'dadu', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-05-14 14:53:12', '2015-05-14 14:53:12'),
(14, 'tanaji', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2016-05-07 09:55:57', '2016-05-07 09:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`company_id` int(11) NOT NULL,
  `lead_id` bigint(21) NOT NULL,
  `clogo` varchar(256) NOT NULL,
  `clogo_big` varchar(256) NOT NULL,
  `cceo` varchar(256) NOT NULL,
  `cemployees` varchar(256) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `cdescription` text NOT NULL,
  `cam_id` int(11) NOT NULL,
  `unique_url` varchar(256) NOT NULL,
  `modidied_on` datetime NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `lead_id`, `clogo`, `clogo_big`, `cceo`, `cemployees`, `industry_id`, `cdescription`, `cam_id`, `unique_url`, `modidied_on`, `created_on`) VALUES
(22, 52, 'images/company/small/Info_545420_485976461423527_1329632349_n.jpg', '', 'test', '1000', 19, 'test', 0, 'd348c2b43eaadbe733f404205c6c6bc2', '2015-06-20 11:33:09', '2015-06-15 10:08:01'),
(23, 53, 'images/company/small/ggggggggggg_11nano1.jpg', 'images/company/big/ggggggggggg_11nano1.jpg', 'hbhjbh', 'bhbbhb', 19, 'hbhb', 0, 'c8ee7fa24e3652ad3dce6fbef50b1b05', '2015-07-05 12:43:12', '2015-07-05 12:43:12'),
(24, 54, 'images/company/small/archon_imageedit_6_7284757439.png', 'images/company/big/archon_imageedit_6_7284757439.png', 'Sachin Rao', '600', 12, 'something', 0, 'f516af7e87ae8bc7d2402cc4e77bea44', '2016-05-07 10:00:52', '2016-05-07 10:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `company_contract`
--

CREATE TABLE IF NOT EXISTS `company_contract` (
`id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `fromdate` varchar(256) NOT NULL,
  `tilldate` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_contract`
--

INSERT INTO `company_contract` (`id`, `lead_id`, `fromdate`, `tilldate`) VALUES
(16, 52, '17-06-2015', '24-06-2015'),
(17, 53, '28-07-2015', '23-07-2015'),
(18, 54, '08-05-2016', '31-12-2016');

-- --------------------------------------------------------

--
-- Table structure for table `company_industry`
--

CREATE TABLE IF NOT EXISTS `company_industry` (
`industry_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_industry`
--

INSERT INTO `company_industry` (`industry_id`, `name`) VALUES
(1, 'Agriculture'),
(2, 'Accounting'),
(3, 'Advertising'),
(4, 'Aerospace'),
(5, 'Airline'),
(6, 'Automotive'),
(7, 'Banking'),
(8, 'Broadcasting'),
(9, 'Brokerage'),
(10, 'Biotechnology'),
(11, 'Call Centre'),
(12, 'Computer'),
(13, 'Consulting'),
(14, 'Consumer Products'),
(15, 'Cosmetics'),
(16, 'Defence'),
(17, 'Education'),
(18, 'Electronics'),
(19, 'Energy'),
(20, 'Entertainment & Leisure'),
(21, 'Financial Services'),
(22, 'Health Care'),
(23, 'Internet Publishing'),
(24, 'Investment Banking'),
(25, 'Legal'),
(26, 'Manufacturing'),
(27, 'Motion Picture & Video'),
(28, 'Music'),
(29, 'Newspaper Publishers'),
(30, 'Pharmaceuticals'),
(31, 'Real Estate'),
(32, 'Retail & Wholesale'),
(33, 'Software'),
(34, 'Sports'),
(35, 'Technology'),
(36, 'Telecommunications'),
(37, 'Television'),
(38, 'Transportation'),
(39, 'Venture Capital'),
(40, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `company_lead`
--

CREATE TABLE IF NOT EXISTS `company_lead` (
`lead_id` bigint(21) NOT NULL,
  `cname` varchar(256) NOT NULL,
  `caddress` text NOT NULL,
  `cperson` varchar(256) NOT NULL,
  `cemail` varchar(256) NOT NULL,
  `cphone` varchar(256) NOT NULL,
  `cdesignation` varchar(256) NOT NULL,
  `ts_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `modified_on` datetime NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_lead`
--

INSERT INTO `company_lead` (`lead_id`, `cname`, `caddress`, `cperson`, `cemail`, `cphone`, `cdesignation`, `ts_id`, `cam_id`, `status`, `modified_on`, `created_on`) VALUES
(38, 'Test Company12345', 'Address1, Address2', 'Sujith', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 1, 7, 0, '2015-01-29 06:44:11', '2015-01-29 06:44:11'),
(52, 'Info', 'some', 'test', 'vijaynkhot@gmail.com', '456787654', 'hr', 22, 13, 1, '2015-06-15 10:06:25', '2015-06-15 10:06:25'),
(53, 'ggggggggggg', 'fghfhfghf', 'vgfff', 'fgfg@gmail.com', 'fgfgfgf', 'h', 23, 13, 1, '2015-07-05 12:42:35', '2015-07-05 12:42:35'),
(54, 'archon', 'bangalore', 'greeshma', 'grishma@gmail.com', '7766887767', 'HR', 22, 14, 1, '2016-05-07 09:57:30', '2016-05-07 09:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `company_lead_mail`
--

CREATE TABLE IF NOT EXISTS `company_lead_mail` (
`id` bigint(21) NOT NULL,
  `lead_id` bigint(21) NOT NULL,
  `senddate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_lead_mail`
--

INSERT INTO `company_lead_mail` (`id`, `lead_id`, `senddate`) VALUES
(1, 6, '2015-01-14 20:02:43'),
(2, 15, '2015-01-18 22:17:24'),
(3, 15, '2015-01-18 22:18:41'),
(4, 15, '2015-01-18 22:19:14'),
(5, 15, '2015-01-18 22:24:31'),
(6, 15, '2015-01-18 22:26:21'),
(7, 16, '2015-01-19 01:23:32'),
(8, 17, '2015-01-19 03:49:10'),
(9, 10, '2015-01-19 05:53:15'),
(10, 10, '2015-01-19 05:56:32'),
(11, 8, '2015-01-19 06:30:46'),
(12, 8, '2015-01-19 06:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `company_spoc`
--

CREATE TABLE IF NOT EXISTS `company_spoc` (
`spoc_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `designation` varchar(256) NOT NULL,
  `uname` varchar(256) NOT NULL,
  `pword` varchar(256) NOT NULL,
  `fpword` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_spoc`
--

INSERT INTO `company_spoc` (`spoc_id`, `company_id`, `name`, `email`, `phone`, `designation`, `uname`, `pword`, `fpword`) VALUES
(1, 3, 'Sujith', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 'company41', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(2, 3, 'Sujith S', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 'company42', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(3, 3, 'Test', 'test@company4.com', '+919686553971', 'HR', 'company43', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(4, 2, 'test12', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 'company3', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(5, 1, 'Sujith', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 'company1', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(6, 4, 'Sujith', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 'company51', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(7, 4, 'Kumar Swamy', 'ssujith31@gmail.com', '+919686553971', 'Senior Designer', 'company52', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(13, 5, 'Person1', 'person1@company5.com', '+919686553971', 'Manager', 'company5', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(14, 6, 'Vijay', 'vijay@archon.com', '08044112233', 'HR Head', 'vijaya', 'db8834197077287186e8c7524ca43d6f', 'vijaya'),
(15, 6, 'Nikhila', 'nikhila@gmail.com', '08011223344', 'HR Executive', 'nikhila', '9804c8d40072c5bb05f2248bd6caa71d', 'nikhila'),
(18, 7, 'Person1', 'ssujith38@yahoo.in', '+919686553971', 'Manager', 'company61', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(19, 7, 'Person2', 'ssujith31@gmail.com', '+919686553971', 'HR', 'Company62', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(20, 8, 'Aravind', 'arvind.kolaki@gmail.com', '08041234567', 'HR SPOC', 'ak1234', 'bc9be5bb0291dbc10dc1689c30cf0fe1', 'ak1234'),
(21, 9, 'Reddy', 'vijaynkhot@gmail.com', '7766554433', 'HR', 'vijayn39', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(22, 10, 'Person1', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 'company101', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(23, 10, 'Person2', 'person2@company5.com', '+919686553971', 'HR', 'company102', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(24, 11, 'pritam', 'khotvijayn@gmail.com', '8877669900', '8877996644', 'vijayn', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(25, 12, 'Vikash', 'vijaynkhot@gmail.com', '6677554488', 'HR', 'vijaynkhot', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(26, 13, 'Kiran', 'khotvijayn@gmail.com', '8877223344', 'HR', 'vkhot', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(27, 14, 'Aravind', 'arvind.kolaki@gmail.com', '08041234567', 'HR Manager', 'arvindk', '0720eed0bfd20d692ebcce935a83b851', 'arvindk123'),
(28, 14, 'Pankaj', 'pankaj@gmail.com', '0801234567', 'Secondary SPOC', 'pankaj', 'e5ba3e50387ab86792a8704556b238a8', 'pankaj123'),
(29, 15, 'Ankit', 'vijaynkhot@gmail.com', '776611233454', 'HR', 'vkhot39', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(30, 16, 'rajiv', 'khotvijayn@gmail.com', '8877223355', 'HR', 'vijaynkhot39', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(31, 17, 'Shahid', 'khotvijayn@gmail.com', '8877662211', 'HR', 'shahid', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(32, 18, 'Sonal', 'vijaynkhot@gmail.com', '6677553388', 'HR', 'mobinius', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(33, 19, 'kiranrao', 'vijaynkhot@gmail.com', '8877661122', 'HR', 'denorat', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(34, 20, 'jayram', 'vijaynkhot@gmail.com', '8877223382', 'HR', 'jayram', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(35, 21, 'Rahil', 'vijaynkhot@gmail.com', '7788665548', 'HR', 'xonax', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(36, 22, 'Vikash', 'vijaynkhot@gmail.com', '8877112267', 'HR', 'zerox', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(37, 23, 'arjit', 'vijaynkhot@gmail.com', '8812343443', 'HR', 'namo', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(38, 24, 'Sujith', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 'company1231', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(39, 24, 'Test1234', 'ssujith31@gmail.com', '+919686553971', 'Senior Designer', 'company1234', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(40, 25, 'Sujith', 'ssujith31@gmail.com', '+919686553971', 'Web Developer', 'company12341', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(41, 25, 'Sujith S', 'ssujith31@gmail.com', '+919686553971', 'Senior Designer', 'company12342', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(42, 26, 'jivan', 'vijaynkhot@gmail.com', '881234224', '661234096', 'toyato', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(43, 27, 'deepak', 'vijaynkhot@gmail.com', '8812309534', 'HR', 'xoax', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(44, 28, 'jeevan', 'vijaynkhot@gmail.com', '7766112345', 'HR', 'zinc', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(45, 29, 'sonal', 'vijaynkhot@gmail.com', '7723431209', '6651428345', 'taxo', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(46, 30, 'Aravind', 'arvind.kolaki@gmail.com', '08044112233', 'MD', 'akolaki', '8524642290ce7c383ceec7e336d556a5', 'akolaki123'),
(47, 31, 'Narayan', 'vijaynkhot@gmail.com', '7234568768', 'HR', 'etos', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(48, 32, 'ammy', 'vijaynkhot@gmail.com', '456876543', 'HR', 'alex', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(49, 33, 'rayhod', 'vijaynkhot39@gmail.com', '456754311111', 'HR', 'xiomi', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(50, 34, 'rao', 'vijaynkhot@gmail.com', '65434566543', 'HR', 'netset', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(51, 35, 'sujith', 'ssujith31@gmail.com', '+919686553971', 'MD', 'company71', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(52, 35, 'Sujith S', 'ssujith31@gmail.com', '+919686553971', 'Senior Designer', 'company72', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(53, 35, 'Suijth', 'ssujith31@gmail.com', '+919686553971', 'Senior Web Developer', 'company73', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc'),
(54, 36, 'Nutan', 'vijaynkhot@gmail.com', '7654345676', 'HR', 'razex', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(55, 37, 'remo', 'vijaynkhot@gmail.com', '76543456', 'HR', 'addex', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(56, 38, 'amar', 'vijaynkhot@gmail.com', '6543234534', 'HR', 'amazon', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(57, 39, 'mahesh', 'vijaynkhot@gmail.com', '764323456', '8765434567', 'itextech', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(58, 4, 'vijay patil', 'vijaynkhot@gmail.com', '876543456', 'hr', 'ajit', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(59, 5, 'arati', 'khotvijayn@gmail.com', '76543456', 'hr', 'arati', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(60, 6, 'vijay', 'khotvijayn@gmail.com', '76543687654', 'hr', 'vijay', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(61, 7, 'babu', 'vijaynkhot@gmail.com', '7654323456', 'hr', 'sagar', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(62, 8, 'erty', 'vijaynkhot@gmail.com', '7654345678', 'jhgfds', 'raju', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(63, 9, 'ytrrt', 'vijaynkhot@gmail.com', '45676543456', 'hr', 'raj', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(64, 10, 'hgf', 'vijaynkhot@gmail.com', '8765', 'hr', 'vij', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(65, 11, 'Person1', 'ssujith31@gmail.com', '9686553971', 'Manager', 'vash', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(66, 12, 'uyt', 'vijaynkhot@gmail.com', '765434567', 'hr', 'pravin', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(67, 13, 'kjhg', 'vijaynkhot@gmail.com', '7654356', 'hr', 'maha', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(68, 14, 'devanand', 'khotvijayn@gmail.com', '8861223320', 'HR', 'anup', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(69, 15, '', '', '', '', 'domees', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(70, 16, 'rajuuu', 'khotvijayn@gmail.com', '765432', 'hr', 'demo2', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(71, 17, 'hgf', 'vijaynkhot@gmail.com', '6543234567', 'hr', 'arjun', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(72, 18, 'olaa', 'khotvijayn@gmail.com', '7654346787654', 'hr', 'oligo', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(73, 19, 'uytr', 'khotvijayn@gmail.com', '6543234567', 'hr', 'ada', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(74, 20, 'bfd', 'khotvijayn@gmail.com', '7654346787654', 'hr', 'daamo', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(75, 21, 'demo2', 'khotvijayn@gmail.com', '876543456', 'hr', 'demo111', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(76, 21, 'M N Puttuswamy', 'm.n.puttuswamy@gmail.com', '08044112233', 'MD', 'mrf', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(77, 22, 'test', 'vijaynkhot@gmail.com', '456787654', 'hr', 'info111', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(78, 23, 'vgfff', 'fgfg@gmail.com', 'fgfgfgf', 'h', 'prashant', 'c0e48adc07e3485370f8892ba538f3d6', 'vijayn39'),
(79, 24, 'greeshma', 'grishma@gmail.com', '7766887767', 'HR', 'greeshma', 'ecb97ffafc1798cd2f67fcbc37226761', 'zxczxc');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
`complaint_id` bigint(21) NOT NULL,
  `ticket` varchar(256) NOT NULL,
  `company_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `ts_id` int(11) NOT NULL,
  `complaint_user_id` bigint(21) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `upload` varchar(256) NOT NULL,
  `status` int(2) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `ticket`, `company_id`, `cam_id`, `ts_id`, `complaint_user_id`, `cat_id`, `dep_id`, `detail`, `upload`, `status`, `created_on`) VALUES
(1, 'TKT1_00001', 1, 2, 1, 1, 1, 1, 'Test', '1_7695_CWE_IIIDraft_Ad_of_KVGB.doc', 2, '2015-01-08 15:12:39'),
(2, 'TKT1_00002', 1, 2, 1, 2, 3, 8, 'Complaint Details', '2_demo.docx', 1, '2015-01-08 16:53:42'),
(3, 'TKT1_00003', 1, 2, 1, 3, 9, 16, 'Testing Complaint', '3_demoform1.pdf', 2, '2015-01-08 17:18:47'),
(4, 'TKT2_00001', 2, 3, 2, 4, 8, 19, 'Testing Complaint', '4_demo.docx', 0, '2015-01-08 17:20:44'),
(5, 'TKT8_00001', 8, 0, 1, 5, 1, 4, 'I have seen lot of fraud happening and lot of corruption in the department.', '', 0, '2015-01-15 06:18:57'),
(6, 'TKT8_00002', 8, 0, 1, 6, 1, 4, 'Corruption in the department.', '6_Loginpage.zip', 1, '2015-01-15 06:22:48'),
(7, 'TKT8_00003', 8, 0, 1, 7, 2, 13, 'Lot od unethical things happening in the  company\r\nNeed immediate attention..', '7_hwmonitor_1.24-setup.exe', 2, '2015-01-15 06:41:30'),
(8, 'TKT9_00001', 9, 0, 13, 8, 1, 2, 'lots of fraud going on. please go through this.', '', 1, '2015-01-16 23:09:31'),
(9, 'TKT9_00002', 9, 0, 13, 9, 11, 5, 'CI has been Leakage from this company every month.', '', 0, '2015-01-17 00:03:50'),
(10, 'TKT1_00004', 1, 2, 1, 10, 1, 1, 'Testing Complaint', '', 0, '2015-01-18 04:34:06'),
(11, 'TKT1_00005', 1, 2, 1, 11, 6, 12, 'Testing Complaint', '11_State Bank of India.pdf', 0, '2015-01-18 04:41:13'),
(12, 'TKT1_00006', 1, 2, 1, 12, 1, 1, 'Testing', '12_State Bank of India.pdf', 0, '2015-01-18 05:36:25'),
(13, 'TKT10_00001', 10, 0, 2, 13, 5, 4, 'Testing', '13_State Bank of India.pdf', 2, '2015-01-18 05:37:12'),
(14, 'TKT10_00002', 10, 0, 2, 14, 1, 1, 'Testing', '14_State Bank of India.pdf', 0, '2015-01-17 17:45:13'),
(15, 'TKT9_00003', 9, 0, 13, 15, 1, 1, 'fraud going on.', '', 0, '2015-01-18 00:27:55'),
(16, 'TKT11_00001', 11, 0, 14, 16, 6, 7, 'Big Fraud...', '', 0, '2015-01-18 23:07:08'),
(17, 'TKT12_00001', 12, 0, 15, 17, 5, 7, 'Violation of Security.... Security has been broken by company leaders... please take action..', '17_Screenshot (25).png', 2, '2015-01-19 01:30:50'),
(18, 'TKT13_00001', 13, 0, 16, 18, 7, 5, 'some Complaint..', '18_Screenshot (25).png', 0, '2015-01-19 03:55:08'),
(19, 'TKT14_00001', 14, 0, 1, 19, 4, 3, 'There are lots of documents which are getting stolen and used somewhere else. Please take care.', '', 0, '2015-01-19 06:42:29'),
(20, 'TKT14_00002', 14, 0, 1, 20, 1, 1, 'heloo hello hello hellooooo', '', 0, '2015-01-19 07:53:54'),
(21, 'TKT16_00001', 16, 0, 17, 21, 5, 11, 'there is security violation in company..', '', 0, '2015-01-20 03:30:58'),
(22, 'TKT16_00002', 16, 0, 17, 22, 7, 7, 'Something..', '', 0, '2015-01-20 04:03:11'),
(23, 'TKT19_00001', 19, 0, 18, 23, 4, 6, 'complaint 1', '', 0, '2015-01-20 22:21:41'),
(24, 'TKT20_00001', 20, 0, 18, 24, 5, 6, 'Complaint 1..', '', 0, '2015-01-20 23:34:10'),
(25, 'TKT25_00001', 25, 0, 1, 25, 1, 15, 'Test Complaint', '25_Report_20_01_15 (3).pdf', 2, '2015-01-22 04:16:44'),
(26, 'TKT26_00001', 26, 0, 18, 26, 4, 8, 'Complaint 1...', '', 0, '2015-01-22 04:21:29'),
(27, 'TKT26_00002', 26, 0, 18, 27, 5, 6, 'Complaint 1...', '', 0, '2015-01-22 04:24:18'),
(28, 'TKT28_00001', 28, 0, 18, 28, 8, 8, 'Complaint 1....', '28_index.png', 0, '2015-01-23 00:23:23'),
(29, 'TKT30_00001', 30, 0, 1, 29, 4, 12, 'Documents are forged...', '', 2, '2015-01-26 00:20:31'),
(30, 'TKT30_00002', 30, 0, 1, 30, 1, 1, 'Sales incentive fraud', '', 2, '2015-01-26 00:36:23'),
(31, 'TKT34_00001', 34, 0, 19, 31, 1, 13, 'Finantial fraud going on..', '', 0, '2015-01-29 22:40:43'),
(32, 'TKT36_00001', 36, 0, 19, 32, 6, 6, 'complaint Something...', '32_Screenshot (25).png', 0, '2015-01-30 22:31:08'),
(33, 'TKT37_00001', 37, 0, 20, 33, 4, 6, 'compalint', '', 0, '2015-01-30 23:34:44'),
(34, 'TKT39_00001', 39, 0, 21, 34, 5, 11, 'complaint 1...', '34_30 jan 15.xls', 0, '2015-02-04 21:50:28'),
(35, 'TKT3_00001', 3, 2, 2, 35, 1, 1, 'Test', '', 1, '2015-02-14 14:31:33'),
(36, 'TKT4_00001', 4, 0, 21, 36, 1, 1, 'jhgfd', '36_906087_1551132101825615_312839238703094361_o.jpg', 0, '2015-05-14 15:56:44'),
(37, 'TKT5_00001', 5, 0, 22, 37, 1, 1, 'go through', '', 2, '2015-05-15 10:23:37'),
(38, 'TKT14_00003', 14, 0, 1, 38, 7, 5, 'jhgfds', '', 0, '2015-05-16 11:55:19'),
(39, 'TKT22_00001', 22, 0, 22, 39, 4, 7, 'my ub complaint....', '', 0, '2015-06-15 11:34:53'),
(40, 'TKT24_00001', 24, 0, 22, 40, 7, 1, 'complaint 1', '', 0, '2016-05-07 10:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `complaints_reply`
--

CREATE TABLE IF NOT EXISTS `complaints_reply` (
`id` bigint(21) NOT NULL,
  `complaint_id` bigint(21) NOT NULL,
  `user_id` bigint(21) NOT NULL,
  `cam_id` bigint(21) NOT NULL,
  `ts_id` bigint(21) NOT NULL,
  `spoc_id` bigint(21) NOT NULL,
  `status` int(2) NOT NULL,
  `msg` text NOT NULL,
  `attachment` varchar(256) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints_reply`
--

INSERT INTO `complaints_reply` (`id`, `complaint_id`, `user_id`, `cam_id`, `ts_id`, `spoc_id`, `status`, `msg`, `attachment`, `created_on`) VALUES
(1, 3, 0, 0, 0, 5, 1, '', '', '2015-01-08 20:22:44'),
(2, 1, 0, 0, 0, 5, 1, 'Testing', '', '2015-01-10 02:18:17'),
(3, 1, 5, 0, 0, 0, 1, 'Testing Replay', '', '2015-01-10 02:42:56'),
(4, 1, 0, 0, 0, 5, 1, 'Actioned testing', '', '2015-01-10 02:57:36'),
(5, 1, 0, 0, 1, 0, 2, 'Testing TS', '', '2015-01-10 04:15:14'),
(6, 3, 0, 0, 0, 5, 2, '', '', '2015-01-11 00:27:43'),
(7, 1, 19, 0, 0, 0, 6, 'Testing', '', '2015-01-15 08:12:29'),
(8, 1, 19, 0, 0, 0, 6, 'fdhhgfg', '', '2015-01-15 08:15:15'),
(9, 1, 19, 0, 0, 0, 6, 'fdgfdgdfgfd', '1_DWF Portal - Privacy Policy.pdf', '2015-01-15 08:17:17'),
(10, 6, 0, 0, 0, 20, 1, 'Give me more details on this compalint and show me few more evidences. and Doeumentation.', '', '2015-01-15 06:34:03'),
(11, 7, 0, 0, 0, 20, 1, 'Need more detials and names.. .', '', '2015-01-15 06:43:31'),
(12, 7, 7, 0, 0, 0, 6, 'Names are Virat, Mike, Suresh...', '', '2015-01-15 06:44:41'),
(13, 7, 0, 0, 0, 20, 2, 'This is Closed', '', '2015-01-15 06:51:52'),
(14, 8, 0, 0, 0, 21, 1, 'more details required for further processing.', '', '2015-01-16 23:40:50'),
(15, 8, 21, 0, 0, 0, 6, 'names are dhoni, sehwag, yuvaraj...', '', '2015-01-16 23:51:25'),
(16, 2, 0, 0, 1, 0, 1, 'More Details Required', '', '2015-01-18 03:29:11'),
(17, 3, 0, 0, 0, 5, 2, '', '', '2015-01-18 03:56:48'),
(18, 13, 0, 0, 0, 22, 1, 'Need more details regarding your complaint', '', '2015-01-18 05:37:54'),
(19, 13, 13, 0, 0, 0, 6, 'Testing Replay', '13_State Bank of India.pdf', '2015-01-18 05:38:40'),
(20, 13, 0, 0, 2, 0, 1, 'Testing', '', '2015-01-18 05:40:09'),
(21, 13, 0, 0, 2, 0, 2, '', '', '2015-01-18 05:40:57'),
(22, 15, 15, 0, 0, 0, 6, 'need to take action...', '', '2015-01-18 00:33:38'),
(23, 16, 16, 0, 0, 0, 6, 'I Attached Document...', '16_Screenshot (12).png', '2015-01-18 23:19:24'),
(24, 17, 0, 0, 0, 25, 2, 'closed..', '', '2015-01-19 02:35:43'),
(25, 18, 0, 0, 0, 26, 1, 'required more details to take action...', '', '2015-01-19 04:00:31'),
(26, 18, 18, 0, 0, 0, 6, 'Names are rick, john, mikel..', '', '2015-01-19 04:02:59'),
(27, 18, 0, 0, 0, 26, 0, 'ok.. Company will take appropriate Action on those.', '', '2015-01-19 04:04:53'),
(28, 18, 18, 0, 0, 0, 6, 'Thank youuuuu....', '', '2015-01-19 04:07:01'),
(29, 22, 22, 0, 0, 0, 6, 'need to probe..', '', '2015-01-20 04:04:17'),
(30, 25, 0, 0, 0, 40, 1, 'Send me More Details', '', '2015-01-22 04:17:18'),
(31, 25, 25, 0, 0, 0, 6, 'More details are here', '25_Report_20_01_15.pdf', '2015-01-22 04:18:22'),
(32, 25, 0, 0, 0, 40, 2, '', '', '2015-01-22 04:18:43'),
(33, 27, 0, 0, 0, 42, 1, 'solution 1...', '', '2015-01-22 04:25:40'),
(34, 27, 27, 0, 0, 0, 6, 'Complaint 2...', '', '2015-01-22 04:25:59'),
(35, 27, 0, 0, 0, 42, 1, 'solution 2..', '', '2015-01-22 04:26:39'),
(36, 27, 27, 0, 0, 0, 6, 'Complaint 3..', '', '2015-01-22 04:27:02'),
(37, 27, 0, 0, 0, 42, 0, 'Solution 3...', '', '2015-01-22 04:27:34'),
(38, 28, 0, 0, 0, 44, 0, 'solution 1...', '', '2015-01-23 00:25:53'),
(39, 28, 28, 0, 0, 0, 6, 'Complaint 2...', '', '2015-01-23 00:26:13'),
(40, 28, 0, 0, 0, 44, 0, 'Solution 2...', '', '2015-01-23 00:26:46'),
(41, 28, 28, 0, 0, 0, 6, 'Complaint 3...', '', '2015-01-23 00:27:12'),
(42, 29, 0, 0, 0, 46, 1, 'please provide more details on the complaint..', '', '2015-01-26 00:32:34'),
(43, 29, 29, 0, 0, 0, 6, 'Check mail box of So and so on 30 of December 2014', '', '2015-01-26 00:33:14'),
(44, 29, 0, 0, 0, 46, 2, '', '', '2015-01-26 00:33:51'),
(45, 30, 30, 0, 0, 0, 6, 'Furtehr to this sales manager is taking lot of cut...', '', '2015-01-26 00:38:57'),
(46, 30, 0, 0, 0, 46, 1, 'give sales manager details', '', '2015-01-26 00:40:15'),
(47, 30, 30, 0, 0, 0, 6, 'It is Anup', '', '2015-01-26 00:40:59'),
(48, 30, 0, 0, 0, 46, 2, 'thank you call closed', '', '2015-01-26 00:41:43'),
(49, 31, 31, 0, 0, 0, 6, 'complaint 1..', '', '2015-01-29 22:41:55'),
(50, 31, 0, 0, 0, 50, 0, 'solution 1...', '', '2015-01-29 22:42:36'),
(51, 31, 31, 0, 0, 0, 6, 'complaint 2...', '', '2015-01-29 22:43:11'),
(52, 31, 0, 0, 0, 50, 0, 'solution 2...', '', '2015-01-29 22:43:35'),
(53, 33, 0, 0, 0, 55, 0, 'solution 1...', '', '2015-01-30 23:36:48'),
(54, 33, 33, 0, 0, 0, 6, 'complaintn 2..', '', '2015-01-30 23:37:07'),
(55, 33, 0, 0, 0, 55, 0, 'solution 2...', '', '2015-01-30 23:41:35'),
(56, 33, 33, 0, 0, 0, 6, 'complaint 3...', '', '2015-01-30 23:42:02'),
(57, 34, 34, 0, 0, 0, 6, 'compalint 2..', '', '2015-02-04 21:54:19'),
(58, 34, 0, 0, 0, 57, 0, 'solution 1...', '', '2015-02-04 21:54:45'),
(59, 35, 0, 0, 0, 1, 1, 'Details', '', '2015-02-14 14:34:55'),
(60, 35, 35, 0, 0, 0, 6, 'fufhjg', '', '2015-02-14 14:35:07'),
(61, 36, 36, 0, 0, 0, 6, 'hi', '', '2015-05-14 15:59:51'),
(62, 36, 36, 0, 0, 0, 6, 'hello', '', '2015-05-14 15:59:59'),
(63, 37, 37, 0, 0, 0, 6, 'fraud going on..........', '', '2015-05-15 10:25:04'),
(64, 37, 37, 0, 0, 0, 6, 'need solution..', '', '2015-05-15 10:25:17'),
(65, 37, 0, 0, 22, 0, 2, '', '', '2015-05-15 14:59:44'),
(66, 40, 40, 0, 0, 0, 6, 'complaint 2', '', '2016-05-07 10:03:25'),
(67, 40, 0, 0, 0, 79, 0, 'okey,, we will look at it..', '', '2016-05-07 10:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_category`
--

CREATE TABLE IF NOT EXISTS `complaint_category` (
`cat_id` int(11) NOT NULL,
  `category` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_category`
--

INSERT INTO `complaint_category` (`cat_id`, `category`) VALUES
(1, 'Financial Fraud'),
(2, 'Sexual Harrasment'),
(3, 'Conflict of Interest'),
(4, 'Falsification of Documents'),
(5, 'Security Violation'),
(6, 'Substance Abuse'),
(7, 'Theft'),
(8, 'Unsafe Working Conditions'),
(9, 'Misconduct or Inappropriate Behaviour'),
(10, 'Sabotage'),
(11, 'Confidential Information Leakage');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_department`
--

CREATE TABLE IF NOT EXISTS `complaint_department` (
`dep_id` int(11) NOT NULL,
  `department` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_department`
--

INSERT INTO `complaint_department` (`dep_id`, `department`) VALUES
(1, 'Sales'),
(2, 'Marketing'),
(3, 'R&D'),
(4, 'Purchase'),
(5, 'Operations'),
(6, 'HR'),
(7, 'Administration'),
(8, 'Facilities'),
(9, 'Supply Chain'),
(10, 'Materials'),
(11, 'Engineering'),
(12, 'Legal'),
(13, 'Corporate'),
(14, 'Business Excellence'),
(15, 'Finance'),
(16, 'Accounting'),
(17, 'Logistics'),
(18, 'Advertising'),
(19, 'Product'),
(20, 'Management'),
(21, 'Corporate'),
(22, 'Strategy'),
(23, 'CEO/MD'),
(24, 'COO'),
(25, 'Customer Service'),
(26, 'Network');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_user`
--

CREATE TABLE IF NOT EXISTS `complaint_user` (
`complaint_user_id` bigint(21) NOT NULL,
  `username` varchar(256) NOT NULL,
  `pword` varchar(256) NOT NULL,
  `status` int(2) NOT NULL,
  `modified_on` datetime NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_user`
--

INSERT INTO `complaint_user` (`complaint_user_id`, `username`, `pword`, `status`, `modified_on`, `created_on`) VALUES
(1, 'user1', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-08 15:12:39', '2015-01-08 15:12:39'),
(2, 'user2', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-08 16:53:42', '2015-01-08 16:53:42'),
(3, 'user3', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-08 17:18:46', '2015-01-08 17:18:46'),
(4, 'user4', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-08 17:20:44', '2015-01-08 17:20:44'),
(5, 'SachinTendulkar', '9c182baae5f199a97e907712e0a60141', 1, '2015-01-15 06:18:57', '2015-01-15 06:18:57'),
(6, 'aravind.kolaki', '97c698c62ff53ccd758108f79c2ddf80', 1, '2015-01-15 06:22:48', '2015-01-15 06:22:48'),
(7, 'Dhoni123', '81848772a1d6a5f193a982ce643f06e1', 1, '2015-01-15 06:41:30', '2015-01-15 06:41:30'),
(8, 'vijayn39', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-16 23:09:31', '2015-01-16 23:09:31'),
(9, 'vijaynk', 'bc0acf849e3b05fa3e5c4a05b8bf6959', 1, '2015-01-17 00:03:49', '2015-01-17 00:03:49'),
(10, 'V8ap91ov', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-18 04:34:06', '2015-01-18 04:34:06'),
(11, '84a7oIBh', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-18 04:41:13', '2015-01-18 04:41:13'),
(12, '3KR14MKV', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-18 05:36:24', '2015-01-18 05:36:24'),
(13, '948VjYtz', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-18 05:37:12', '2015-01-18 05:37:12'),
(14, '4v93hZUb', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-17 17:45:13', '2015-01-17 17:45:13'),
(15, 'pSN6F21S', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-18 00:27:55', '2015-01-18 00:27:55'),
(16, '16BYOx5e', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-18 23:07:08', '2015-01-18 23:07:08'),
(17, 'O939yqME', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-19 01:30:50', '2015-01-19 01:30:50'),
(18, 'K311LYMB', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-19 03:55:08', '2015-01-19 03:55:08'),
(19, 'hV798OTn', '482c811da5d5b4bc6d497ffa98491e38', 1, '2015-01-19 06:42:29', '2015-01-19 06:42:29'),
(20, '267gglkT', 'f30aa7a662c728b7407c54ae6bfd27d1', 1, '2015-01-19 07:53:54', '2015-01-19 07:53:54'),
(21, '2hT2BWv2', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-20 03:30:58', '2015-01-20 03:30:58'),
(22, 'Q424LfDV', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-20 04:03:11', '2015-01-20 04:03:11'),
(23, '2Us8wgT7', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-20 22:21:41', '2015-01-20 22:21:41'),
(24, 'm9X6Lt7d', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-20 23:34:10', '2015-01-20 23:34:10'),
(25, '837HEUQo', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-22 04:16:44', '2015-01-22 04:16:44'),
(26, '2Iqp3r1K', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-22 04:21:29', '2015-01-22 04:21:29'),
(27, '623cDycP', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-22 04:24:18', '2015-01-22 04:24:18'),
(28, '4P69hETD', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-23 00:23:23', '2015-01-23 00:23:23'),
(29, '5HW7A2fW', '4bc48e00300464d2670958ab3c8982ea', 1, '2015-01-26 00:20:31', '2015-01-26 00:20:31'),
(30, '39JU9Dft', '4bc48e00300464d2670958ab3c8982ea', 1, '2015-01-26 00:36:23', '2015-01-26 00:36:23'),
(31, '258kmFch', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-29 22:40:43', '2015-01-29 22:40:43'),
(32, '82p6NiQV', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-30 22:31:08', '2015-01-30 22:31:08'),
(33, 'G72sm7gK', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-30 23:34:44', '2015-01-30 23:34:44'),
(34, '175gVcEQ', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-02-04 21:50:28', '2015-02-04 21:50:28'),
(35, '2w3fw4CU', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-02-14 14:31:33', '2015-02-14 14:31:33'),
(36, 'DP5Nm7W5', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-05-14 15:56:44', '2015-05-14 15:56:44'),
(37, 'c7WuB75G', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-05-15 10:23:37', '2015-05-15 10:23:37'),
(38, '9x65SELS', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-05-16 11:55:19', '2015-05-16 11:55:19'),
(39, '2X97EQDG', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-06-15 11:34:53', '2015-06-15 11:34:53'),
(40, '7DMv1cn8', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2016-05-07 10:02:03', '2016-05-07 10:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `ts`
--

CREATE TABLE IF NOT EXISTS `ts` (
`ts_id` int(11) NOT NULL,
  `ts_name` varchar(256) NOT NULL,
  `ts_pword` varchar(256) NOT NULL,
  `ts_published` tinyint(1) NOT NULL,
  `modified_on` datetime NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts`
--

INSERT INTO `ts` (`ts_id`, `ts_name`, `ts_pword`, `ts_published`, `modified_on`, `created_on`) VALUES
(1, 'ts1', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-01-22 04:01:02', '2014-12-18 18:24:31'),
(2, 'ts2', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2014-12-29 05:21:03', '2014-12-18 18:25:01'),
(3, 'sujith', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2014-12-18 18:25:44', '2014-12-18 18:25:44'),
(5, 'ts5', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2014-12-26 08:12:12', '2014-12-26 08:12:12'),
(13, 'vijayn39', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-16 22:47:11', '2015-01-16 22:47:11'),
(14, 'vijayn', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-18 22:05:07', '2015-01-18 22:05:07'),
(15, 'vijaynkhot', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-19 01:12:53', '2015-01-19 01:12:53'),
(16, 'vkhot', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-19 03:38:47', '2015-01-19 03:38:47'),
(17, 'vijaynkhot39', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-20 03:19:02', '2015-01-20 03:19:02'),
(18, 'rahu', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-20 21:57:07', '2015-01-20 21:57:07'),
(19, 'surjit', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-01-29 22:16:51', '2015-01-29 22:16:51'),
(21, 'yogesh', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-02-04 21:38:05', '2015-02-04 21:38:05'),
(22, 'pratap', 'ecb97ffafc1798cd2f67fcbc37226761', 1, '2015-05-15 10:00:58', '2015-05-15 10:00:58'),
(23, 'ts10', 'c0e48adc07e3485370f8892ba538f3d6', 1, '2015-06-20 11:23:34', '2015-06-20 11:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `tsdetails`
--

CREATE TABLE IF NOT EXISTS `tsdetails` (
`ts_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `tel_no` varchar(256) NOT NULL,
  `alternate_no` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsdetails`
--

INSERT INTO `tsdetails` (`ts_id`, `name`, `email`, `tel_no`, `alternate_no`) VALUES
(1, 'TS1', 'ssujith31@gmail.com', '+919686553971', '+919686553971'),
(2, 'TS2', 'ts2@gmail.com', '+919686553971', '+919686553971'),
(3, 'TS3', 'ts3@gmail.com', '+919686553971', '+919686553971'),
(5, 'TS5', 'ts5@gmail.com', '+919686553971', '+919686553971'),
(13, 'Prashant Heralgi', 'vijaynkhot39@gmail.com', '8877665522', '6677553344'),
(14, 'udit', 'vijaynkhot39@gmail.com', '8877665599', '7766559988'),
(15, 'chandu', 'vijaynkhot39@gmail.com', '6644557788', '8822113344'),
(16, 'Ravi', 'vijaynkhot39@gmail.com', '8811223322', '8844553322'),
(17, 'Raju', 'vijaynkhot39@gmail.com', '6655112233', '8822115522'),
(18, 'Rahul', 'vijaynkhot39@gmail.com', '8877112233', '75639287345'),
(19, 'surjit', 'vijaynkhot39@gmail.com', '5432345654', '6543456547'),
(21, 'yogesh', 'vijaynkhot39@gmail.com', '7654323456', '76543234567'),
(22, 'pratap', 'vijaynkhot@gmail.com', '76543456', '765434567'),
(23, 'ts10', 'vijaynkhot@gmail.com', '45676543', '76545678');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
`user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`user_id`, `name`, `email`, `phone`) VALUES
(1, 'Admin', 'info@dwf.com', '+9145666454');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_pword` varchar(256) NOT NULL,
  `user_priority` int(4) NOT NULL,
  `user_parent` int(4) NOT NULL,
  `user_published` tinyint(1) NOT NULL,
  `modified_on` datetime NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pword`, `user_priority`, `user_parent`, `user_published`, `modified_on`, `created_on`) VALUES
(1, 'admin', 'ecb97ffafc1798cd2f67fcbc37226761', 1, 0, 1, '2015-01-15 03:16:17', '2014-12-16 19:52:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camdetails`
--
ALTER TABLE `camdetails`
 ADD PRIMARY KEY (`cam_id`);

--
-- Indexes for table `cams`
--
ALTER TABLE `cams`
 ADD PRIMARY KEY (`cam_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_contract`
--
ALTER TABLE `company_contract`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_industry`
--
ALTER TABLE `company_industry`
 ADD PRIMARY KEY (`industry_id`);

--
-- Indexes for table `company_lead`
--
ALTER TABLE `company_lead`
 ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `company_lead_mail`
--
ALTER TABLE `company_lead_mail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_spoc`
--
ALTER TABLE `company_spoc`
 ADD PRIMARY KEY (`spoc_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
 ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `complaints_reply`
--
ALTER TABLE `complaints_reply`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_category`
--
ALTER TABLE `complaint_category`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `complaint_department`
--
ALTER TABLE `complaint_department`
 ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `complaint_user`
--
ALTER TABLE `complaint_user`
 ADD PRIMARY KEY (`complaint_user_id`);

--
-- Indexes for table `ts`
--
ALTER TABLE `ts`
 ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `tsdetails`
--
ALTER TABLE `tsdetails`
 ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camdetails`
--
ALTER TABLE `camdetails`
MODIFY `cam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cams`
--
ALTER TABLE `cams`
MODIFY `cam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `company_contract`
--
ALTER TABLE `company_contract`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `company_industry`
--
ALTER TABLE `company_industry`
MODIFY `industry_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `company_lead`
--
ALTER TABLE `company_lead`
MODIFY `lead_id` bigint(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `company_lead_mail`
--
ALTER TABLE `company_lead_mail`
MODIFY `id` bigint(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `company_spoc`
--
ALTER TABLE `company_spoc`
MODIFY `spoc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
MODIFY `complaint_id` bigint(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `complaints_reply`
--
ALTER TABLE `complaints_reply`
MODIFY `id` bigint(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `complaint_category`
--
ALTER TABLE `complaint_category`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `complaint_department`
--
ALTER TABLE `complaint_department`
MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `complaint_user`
--
ALTER TABLE `complaint_user`
MODIFY `complaint_user_id` bigint(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `ts`
--
ALTER TABLE `ts`
MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tsdetails`
--
ALTER TABLE `tsdetails`
MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
