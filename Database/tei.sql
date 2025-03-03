SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Create Database and Use it
CREATE DATABASE IF NOT EXISTS tei;
USE tei;

-- Table structure for table `funds`
CREATE TABLE `funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `ttype` varchar(13) NOT NULL,
  `tid` varchar(12) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` int(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserting data into `funds`
INSERT INTO `funds` (`id`, `scid`, `amount`, `ttype`, `tid`, `month`, `year`, `date`, `status`) VALUES
(1, 1, 50000, 'Bank Transfer', '4646546464', 'May', 2023, '2023-05-17 11:20:24', 'Verified');

-- Table structure for table `request`
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scid` int(11) NOT NULL,
  `apply_for` varchar(9) NOT NULL,
  `demand` varchar(50) NOT NULL,
  `app_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `expected_amount` int(11) NOT NULL,
  `approved_amount` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `remarks` text NOT NULL,
  `year` int(4) NOT NULL,
  `month` varchar(3) NOT NULL,
  `qat_status` varchar(7) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserting data into `request`
INSERT INTO `request` (`id`, `scid`, `apply_for`, `demand`, `app_date`, `expected_amount`, `approved_amount`,
 `visit_date`, `remarks`, `year`, `month`, `qat_status`, `status`) VALUES
(1, 1, 'IDP', 'Renovation of Room', '2023-05-17 06:19:42', 70000, 0, '0000-00-00', 'Waiting for visit',
 2023, '', 'Pass', 'Pending'),

 INSERT INTO `request` (`id`, `scid`, `apply_for`, `demand`, `app_date`, `expected_amount`, `approved_amount`,
 `visit_date`, `remarks`, `year`, `month`, `qat_status`, `status`) VALUES
(2, 2, 'IDP', 'Renovation of Room', '2023-05-17 06:19:42', 70000, 0, '0000-00-00', 'Waiting for visit',
 2023, '', 'Pass', 'Pending');

-- Table structure for table `schools`
CREATE TABLE `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `cnic` text NOT NULL,
  `contact` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `qual` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `dist` varchar(15) NOT NULL,
  `prog` varchar(7) NOT NULL,
  `strg` text NOT NULL,
  `buld` varchar(13) NOT NULL,
  `qatr` varchar(7) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserting data into `schools`
INSERT INTO `schools` (`id`, `name`, `fname`, `cnic`, `contact`, `email`, `qual`, `address`,
 `sname`, `dist`, `prog`, `strg`, `buld`, `qatr`, `password`, `status`) VALUES
(1, 'Aown Muhammad Shah', 'Assad Shah', '36303-1234567-8', '0345-7111102', 'aownmshah@gmail.com',
 'Masters', 'Loother', 'Monaco institute ', 'ATTOCK', 'NSP', 'Below-100', 'Rented', 'Pass', 'shahg',
  'Active'),

  INSERT INTO `schools` (`id`, `name`, `fname`, `cnic`, `contact`, `email`, `qual`, `address`,
 `sname`, `dist`, `prog`, `strg`, `buld`, `qatr`, `password`, `status`) VALUES
(2, 'muzige charles', 'charles', '36303-1234567-9', '0345-7111103', 'allydids2022@gmail.com',
 'Diploma', 'soft', 'Monaco institute ', 'wakiso', 'NSP', 'Below-100', 'Rented', 'Pass', 'charles',
  'Active');

-- Finalize Transaction
COMMIT;
