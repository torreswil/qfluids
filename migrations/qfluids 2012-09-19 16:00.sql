-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-09-2012 a las 15:42:09
-- Versión del servidor: 5.5.24
-- Versión de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `work_qfluids`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bombas`
--

DROP TABLE IF EXISTS `bombas`;
CREATE TABLE IF NOT EXISTS `bombas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `strokelength` float DEFAULT NULL,
  `strokelength_unit` varchar(255) DEFAULT NULL,
  `linerdiameter` float DEFAULT NULL,
  `linerdiameter_unit` varchar(255) DEFAULT NULL,
  `rod` float DEFAULT NULL,
  `rod_unit` varchar(255) DEFAULT NULL,
  `presion` float DEFAULT NULL,
  `presion_unit` varchar(255) DEFAULT NULL,
  `max_spm` float DEFAULT NULL,
  `strokefrac` varchar(255) DEFAULT NULL,
  `strokefrac_unit` varchar(255) DEFAULT NULL,
  `linerdiameter_frac` varchar(255) DEFAULT NULL,
  `linerdiameterfrac_unit` varchar(255) DEFAULT NULL,
  `rodfrac` varchar(255) DEFAULT NULL,
  `rodfrac_unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=230 ;

--
-- Volcado de datos para la tabla `bombas`
--

INSERT INTO `bombas` (`id`, `maker`, `type`, `modelo`, `strokelength`, `strokelength_unit`, `linerdiameter`, `linerdiameter_unit`, `rod`, `rod_unit`, `presion`, `presion_unit`, `max_spm`, `strokefrac`, `strokefrac_unit`, `linerdiameter_frac`, `linerdiameterfrac_unit`, `rodfrac`, `rodfrac_unit`) VALUES
(1, 'Continental ', 'DUPLEX', 'D-225', 12, 'in', 7, 'in', 1.875, 'in', 607, 'psi', 80, '12', 'in', '7', 'in', '1 7/8', 'in'),
(2, 'Continental ', 'DUPLEX', 'D-225', 12, 'in', 6, 'in', 1.875, 'in', 838, 'psi', 80, '12', 'in', '6', 'in', '1 7/8', 'in'),
(3, 'Continental ', 'DUPLEX', 'D-225', 12, 'in', 5.5, 'in', 1.875, 'in', 1007, 'psi', 80, '12', 'in', '5 1/2', 'in', '1 7/8', 'in'),
(4, 'Continental ', 'DUPLEX', 'D-225', 12, 'in', 4.5, 'in', 1.875, 'in', 1551, 'psi', 80, '12', 'in', '4 1/2', 'in', '1 7/8', 'in'),
(5, 'Continental ', 'DUPLEX', 'D-225', 12, 'in', 6.5, 'in', 1.875, 'in', 708, 'psi', 80, '12', 'in', '6 1/2', 'in', '1 7/8', 'in'),
(6, 'Continental ', 'DUPLEX', 'D-375', 14, 'in', 7.5, 'in', 2, 'in', 755, 'psi', 80, '14', 'in', '7 1/2', 'in', '2', 'in'),
(7, 'Continental ', 'DUPLEX', 'D-375', 14, 'in', 7, 'in', 2, 'in', 871, 'psi', 80, '14', 'in', '7', 'in', '2', 'in'),
(8, 'Continental ', 'DUPLEX', 'D-375', 14, 'in', 6, 'in', 2, 'in', 1204, 'psi', 80, '14', 'in', '6', 'in', '2', 'in'),
(9, 'Continental ', 'DUPLEX', 'D-375', 14, 'in', 5, 'in', 2, 'in', 1777, 'psi', 80, '14', 'in', '5', 'in', '2', 'in'),
(10, 'Continental ', 'DUPLEX', 'DB-550', 16, 'in', 7.5, 'in', 2.5, 'in', 1067, 'psi', 70, '16', 'in', '7 1/2', 'in', '2 1/2', 'in'),
(11, 'Continental ', 'DUPLEX', 'DB-550', 16, 'in', 7, 'in', 2.5, 'in', 1235, 'psi', 70, '16', 'in', '7', 'in', '2 1/2', 'in'),
(12, 'Continental ', 'DUPLEX', 'DB-550', 16, 'in', 6, 'in', 2.5, 'in', 1727, 'psi', 70, '16', 'in', '6', 'in', '2 1/2', 'in'),
(13, 'Continental ', 'DUPLEX', 'DB-550', 16, 'in', 5, 'in', 2.5, 'in', 2590, 'psi', 70, '16', 'in', '5', 'in', '2 1/2', 'in'),
(14, 'Continental ', 'DUPLEX', 'DC-1000', 18, 'in', 7.5, 'in', 3, 'in', 1917, 'psi', 65, '18', 'in', '7 1/2', 'in', '3', 'in'),
(15, 'Continental ', 'DUPLEX', 'DC-1000', 18, 'in', 7, 'in', 3, 'in', 2229, 'psi', 65, '18', 'in', '7', 'in', '3', 'in'),
(16, 'Continental ', 'DUPLEX', 'DC-1000', 18, 'in', 6.5, 'in', 3, 'in', 2635, 'psi', 65, '18', 'in', '6 1/2', 'in', '3', 'in'),
(17, 'Continental ', 'DUPLEX', 'DC-1000', 18, 'in', 6, 'in', 3, 'in', 3153, 'psi', 65, '18', 'in', '6', 'in', '3', 'in'),
(18, 'Continental ', 'DUPLEX', 'DC-1350', 18, 'in', 7.5, 'in', 3.5, 'in', 2669, 'psi', 65, '18', 'in', '7 1/2', 'in', '3 1/2', 'in'),
(19, 'Continental ', 'DUPLEX', 'DC-1350', 18, 'in', 7, 'in', 3.5, 'in', 3123, 'psi', 65, '18', 'in', '7', 'in', '3 1/2', 'in'),
(20, 'Continental ', 'DUPLEX', 'DC-1350', 18, 'in', 6.5, 'in', 3.5, 'in', 3706, 'psi', 65, '18', 'in', '6 1/2', 'in', '3 1/2', 'in'),
(21, 'Continental ', 'DUPLEX', 'DC-1350', 18, 'in', 6, 'in', 3.5, 'in', 4474, 'psi', 65, '18', 'in', '6', 'in', '3 1/2', 'in'),
(22, 'Continental ', 'DUPLEX', 'DC-1650', 18, 'in', 7.5, 'in', 3.5, 'in', 3262, 'psi', 65, '18', 'in', '7 1/2', 'in', '3 1/2', 'in'),
(23, 'Continental ', 'DUPLEX', 'DC-1650', 18, 'in', 7, 'in', 3.5, 'in', 3817, 'psi', 65, '18', 'in', '7', 'in', '3 1/2', 'in'),
(24, 'Continental ', 'DUPLEX', 'DC-1650', 18, 'in', 6.5, 'in', 3.5, 'in', 4530, 'psi', 65, '18', 'in', '6 1/2', 'in', '3 1/2', 'in'),
(25, 'Continental ', 'DUPLEX', 'DC-1650', 18, 'in', 6, 'in', 3.5, 'in', 5000, 'psi', 65, '18', 'in', '6', 'in', '3 1/2', 'in'),
(26, 'Continental ', 'DUPLEX', 'DC-700', 16, 'in', 7.5, 'in', 2.75, 'in', 1374, 'psi', 70, '16', 'in', '7 1/2', 'in', '2 3/4', 'in'),
(27, 'Continental ', 'DUPLEX', 'DC-700', 16, 'in', 6.5, 'in', 2.75, 'in', 1875, 'psi', 70, '16', 'in', '6 1/2', 'in', '2 3/4', 'in'),
(28, 'Continental ', 'DUPLEX', 'DC-700', 16, 'in', 6, 'in', 2.75, 'in', 2236, 'psi', 70, '16', 'in', '6', 'in', '2 3/4', 'in'),
(29, 'Continental ', 'DUPLEX', 'DC-700', 16, 'in', 5.5, 'in', 2.75, 'in', 2727, 'psi', 70, '16', 'in', '5 1/2', 'in', '2 3/4', 'in'),
(30, 'Continental ', 'TRIPLEX', 'F-1000', 10, 'in', 6.5, 'in', NULL, '', 2558, 'psi', 150, '10', 'in', '6 1/2', 'in', '', ''),
(31, 'Continental ', 'TRIPLEX', 'F-1000', 10, 'in', 6, 'in', NULL, '', 3010, 'psi', 150, '10', 'in', '6', 'in', '', ''),
(32, 'Continental ', 'TRIPLEX', 'F-1000', 10, 'in', 5, 'in', NULL, '', 4330, 'psi', 150, '10', 'in', '5', 'in', '', ''),
(33, 'Continental ', 'TRIPLEX', 'F-1000', 10, 'in', 4.5, 'in', NULL, '', 5000, 'psi', 150, '10', 'in', '4 1/2', 'in', '', ''),
(34, 'Continental ', 'TRIPLEX', 'F-350', 7, 'in', 6.5, 'in', NULL, '', 1020, 'psi', 175, '7', 'in', '6 1/2', 'in', '', ''),
(35, 'Continental ', 'TRIPLEX', 'F-350', 7, 'in', 6, 'in', NULL, '', 1200, 'psi', 175, '7', 'in', '6', 'in', '', ''),
(36, 'Continental ', 'TRIPLEX', 'F-350', 7, 'in', 5, 'in', NULL, '', 1730, 'psi', 175, '7', 'in', '5', 'in', '', ''),
(37, 'Continental ', 'TRIPLEX', 'F-350', 7, 'in', 4, 'in', NULL, '', 2705, 'psi', 175, '7', 'in', '4', 'in', '', ''),
(38, 'Continental ', 'TRIPLEX', 'F-500', 7.5, 'in', 6.5, 'in', NULL, '', 1447, 'psi', 175, '7 1/2', 'in', '6 1/2', 'in', '', ''),
(39, 'Continental ', 'TRIPLEX', 'F-500', 7.5, 'in', 6, 'in', NULL, '', 1689, 'psi', 175, '7 1/2', 'in', '6', 'in', '', ''),
(40, 'Continental ', 'TRIPLEX', 'F-500', 7.5, 'in', 5, 'in', NULL, '', 2440, 'psi', 175, '7 1/2', 'in', '5', 'in', '', ''),
(41, 'Continental ', 'TRIPLEX', 'F-500', 7.5, 'in', 4, 'in', NULL, '', 3818, 'psi', 175, '7 1/2', 'in', '4', 'in', '', ''),
(42, 'Continental ', 'TRIPLEX', 'F-650', 8, 'in', 6.5, 'in', NULL, '', 1816, 'psi', 175, '8', 'in', '6 1/2', 'in', '', ''),
(43, 'Continental ', 'TRIPLEX', 'F-650', 8, 'in', 6, 'in', NULL, '', 2128, 'psi', 175, '8', 'in', '6', 'in', '', ''),
(44, 'Continental ', 'TRIPLEX', 'F-650', 8, 'in', 5, 'in', NULL, '', 3070, 'psi', 175, '8', 'in', '5', 'in', '', ''),
(45, 'Continental ', 'TRIPLEX', 'F-650', 8, 'in', 4, 'in', NULL, '', 4820, 'psi', 175, '8', 'in', '4', 'in', '', ''),
(46, 'Continental ', 'TRIPLEX', 'F-800', 9, 'in', 6.5, 'in', NULL, '', 2120, 'psi', 160, '9', 'in', '6 1/2', 'in', '', ''),
(47, 'Continental ', 'TRIPLEX', 'F-800', 9, 'in', 6, 'in', NULL, '', 2490, 'psi', 160, '9', 'in', '6', 'in', '', ''),
(48, 'Continental ', 'TRIPLEX', 'F-800', 9, 'in', 5, 'in', NULL, '', 3590, 'psi', 160, '9', 'in', '5', 'in', '', ''),
(49, 'Continental ', 'TRIPLEX', 'F-800', 9, 'in', 4.5, 'in', NULL, '', 4415, 'psi', 160, '9', 'in', '4 1/2', 'in', '', ''),
(50, 'Continental ', 'TRIPLEX', 'FB-1300', 12, 'in', 7, 'in', NULL, '', 2789, 'psi', 130, '12', 'in', '7', 'in', '', ''),
(51, 'Continental ', 'TRIPLEX', 'FB-1300', 12, 'in', 6.5, 'in', NULL, '', 3234, 'psi', 130, '12', 'in', '6 1/2', 'in', '', ''),
(52, 'Continental ', 'TRIPLEX', 'FB-1300', 12, 'in', 6, 'in', NULL, '', 3791, 'psi', 130, '12', 'in', '6', 'in', '', ''),
(53, 'Continental ', 'TRIPLEX', 'FB-1300', 12, 'in', 5.5, 'in', NULL, '', 4516, 'psi', 130, '12', 'in', '5 1/2', 'in', '', ''),
(54, 'Continental ', 'TRIPLEX', 'FB-1600', 12, 'in', 7, 'in', NULL, '', 3423, 'psi', 130, '12', 'in', '7', 'in', '', ''),
(55, 'Continental ', 'TRIPLEX', 'FB-1600', 12, 'in', 6.5, 'in', NULL, '', 3981, 'psi', 130, '12', 'in', '6 1/2', 'in', '', ''),
(56, 'Continental ', 'TRIPLEX', 'FB-1600', 12, 'in', 6, 'in', NULL, '', 4665, 'psi', 130, '12', 'in', '6', 'in', '', ''),
(57, 'Continental ', 'TRIPLEX', 'FB-1600', 12, 'in', 5.5, 'in', NULL, '', 5000, 'psi', 130, '12', 'in', '5 1/2', 'in', '', ''),
(58, 'Gardner ', 'DUPLEX', 'FXT', 16, 'in', 7.25, 'in', 2.5, 'in', 1563, 'psi', 65, '16', 'in', '7 1/4', 'in', '2 1/2', 'in'),
(59, 'Gardner ', 'DUPLEX', 'FXT', 16, 'in', 7, 'in', 2.5, 'in', 1684, 'psi', 65, '16', 'in', '7', 'in', '2 1/2', 'in'),
(60, 'Gardner ', 'DUPLEX', 'FXT', 16, 'in', 6.5, 'in', 2.5, 'in', 1976, 'psi', 65, '16', 'in', '6 1/2', 'in', '2 1/2', 'in'),
(61, 'Gardner ', 'DUPLEX', 'FXT', 16, 'in', 6, 'in', 2.5, 'in', 2350, 'psi', 65, '16', 'in', '6', 'in', '2 1/2', 'in'),
(62, 'Gardner ', 'DUPLEX', 'FXT', 16, 'in', 5.5, 'in', 2.5, 'in', 2846, 'psi', 65, '16', 'in', '5 1/2', 'in', '2 1/2', 'in'),
(63, 'Gardner ', 'DUPLEX', 'FXT', 16, 'in', 5, 'in', 2.5, 'in', 3536, 'psi', 65, '16', 'in', '5', 'in', '2 1/2', 'in'),
(64, 'Gardner ', 'DUPLEX', 'FXT', 16, 'in', 4.5, 'in', 2.5, 'in', 4515, 'psi', 65, '16', 'in', '4 1/2', 'in', '2 1/2', 'in'),
(65, 'Gardner ', 'TRIPLEX', 'PAHC', 8, 'in', 4.5, 'in', NULL, '', 1386, 'psi', 175, '8', 'in', '4 1/2', 'in', '', ''),
(66, 'Gardner ', 'TRIPLEX', 'PAHC', 8, 'in', 3.5, 'in', NULL, '', 2290, 'psi', 175, '8', 'in', '3 1/2', 'in', '', ''),
(67, 'Gardner ', 'TRIPLEX', 'PAHC', 8, 'in', 3.25, 'in', NULL, '', 2657, 'psi', 175, '8', 'in', '3 1/4', 'in', '', ''),
(68, 'Gardner ', 'TRIPLEX', 'PAHD', 8, 'in', 5, 'in', NULL, '', 1122, 'psi', 175, '8', 'in', '5', 'in', '', ''),
(69, 'Gardner ', 'TRIPLEX', 'PAHD', 8, 'in', 4.5, 'in', NULL, '', 1386, 'psi', 175, '8', 'in', '4 1/2', 'in', '', ''),
(70, 'Gardner ', 'TRIPLEX', 'PAHD', 8, 'in', 4, 'in', NULL, '', 1753, 'psi', 175, '8', 'in', '4', 'in', '', ''),
(71, 'Gardner ', 'TRIPLEX', 'PXL', 11, 'in', 6.5, 'in', NULL, '', 5660, 'psi', 115, '11', 'in', '6 1/2', 'in', '', ''),
(72, 'Gardner ', 'TRIPLEX', 'PXL', 11, 'in', 6, 'in', NULL, '', 6645, 'psi', 115, '11', 'in', '6', 'in', '', ''),
(73, 'Gardner ', 'TRIPLEX', 'PXL', 11, 'in', 5.5, 'in', NULL, '', 7500, 'psi', 115, '11', 'in', '5 1/2', 'in', '', ''),
(74, 'Gardner ', 'TRIPLEX', 'PXL', 11, 'in', 5, 'in', NULL, '', 7500, 'psi', 115, '11', 'in', '6 1/2', 'in', '', ''),
(75, 'Gardner ', 'TRIPLEX', 'PXL', 11, 'in', 7, 'in', NULL, '', 4880, 'psi', 115, '11', 'in', '7', 'in', '', ''),
(76, 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', 7, 'in', 6, 'in', NULL, '', 2277, 'psi', 145, '7', 'in', '6', 'in', '', ''),
(77, 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', 7, 'in', 7, 'in', NULL, '', 1673, 'psi', 145, '7', 'in', '7', 'in', '', ''),
(78, 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', 7, 'in', 6.5, 'in', NULL, '', 1940, 'psi', 145, '7', 'in', '6,5', 'in', '', ''),
(79, 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', 7, 'in', 5, 'in', NULL, '', 3279, 'psi', 145, '7', 'in', '5', 'in', '', ''),
(80, 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', 7, 'in', 5.5, 'in', NULL, '', 2710, 'psi', 145, '7', 'in', '5 1/2', 'in', '', ''),
(81, 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', 7, 'in', 4.5, 'in', NULL, '', 4048, 'psi', 145, '7', 'in', '4 1/2', 'in', '', ''),
(82, 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', 8, 'in', 7, 'in', NULL, '', 1996, 'psi', 145, '8', 'in', '7', 'in', '', ''),
(83, 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', 8, 'in', 6.5, 'in', NULL, '', 2315, 'psi', 145, '8', 'in', '6 1/2', 'in', '', ''),
(84, 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', 8, 'in', 6.25, 'in', NULL, '', 2504, 'psi', 145, '8', 'in', '6 1/4', 'in', '', ''),
(85, 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', 8, 'in', 6, 'in', NULL, '', 2717, 'psi', 145, '8', 'in', '6', 'in', '', ''),
(86, 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', 8, 'in', 5.5, 'in', NULL, '', 3233, 'psi', 145, '8', 'in', '5 1/2', 'in', '', ''),
(87, 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', 8, 'in', 4.5, 'in', NULL, '', 4830, 'psi', 145, '8', 'in', '4 1/2', 'in', '', ''),
(88, 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', 8, 'in', 4, 'in', NULL, '', 5000, 'psi', 145, '8', 'in', '4', 'in', '', ''),
(89, 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', 8, 'in', 5, 'in', NULL, '', 3912, 'psi', 145, '8', 'in', '5', 'in', '', ''),
(90, 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', 9, 'in', 6.5, 'in', NULL, '', 3060, 'psi', 130, '9', 'in', '6 1/2', 'in', '', ''),
(91, 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', 9, 'in', 7, 'in', NULL, '', 2639, 'psi', 130, '9', 'in', '7', 'in', '', ''),
(92, 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', 9, 'in', 6.25, 'in', NULL, '', 3310, 'psi', 130, '9', 'in', '6 1/4', 'in', '', ''),
(93, 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', 9, 'in', 6, 'in', NULL, '', 3592, 'psi', 130, '9', 'in', '6', 'in', '', ''),
(94, 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', 9, 'in', 5.5, 'in', NULL, '', 4274, 'psi', 130, '9', 'in', '5 1/2', 'in', '', ''),
(95, 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', 9, 'in', 5, 'in', NULL, '', 5000, 'psi', 130, '9', 'in', '5', 'in', '', ''),
(96, 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', 9, 'in', 4.5, 'in', NULL, '', 5000, 'psi', 130, '9', 'in', '4 1/2', 'in', '', ''),
(97, 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', 9, 'in', 4, 'in', NULL, '', 5000, 'psi', 130, '9', 'in', '4', 'in', '', ''),
(98, 'Gardner ', 'TRIPLEX', 'PZK (PZ-10)', 10, 'in', 7, 'in', NULL, '', 3624, 'psi', 115, '10', 'in', '7', 'in', '', ''),
(99, 'Gardner ', 'TRIPLEX', 'PZK (PZ-10)', 10, 'in', 6.5, 'in', NULL, '', 4203, 'psi', 115, '10', 'in', '6 1/2', 'in', '', ''),
(100, 'Gardner ', 'TRIPLEX', 'PZK (PZ-10)', 10, 'in', 5.5, 'in', NULL, '', 5000, 'psi', 115, '10', 'in', '5 1/2', 'in', '', ''),
(101, 'Gardner ', 'TRIPLEX', 'PZK (PZ-10)', 10, 'in', 6, 'in', NULL, '', 4933, 'psi', 115, '10', 'in', '6', 'in', '', ''),
(102, 'Gardner ', 'TRIPLEX', 'PZL (PZ-11)', 11, 'in', 7, 'in', NULL, '', 3905, 'psi', 115, '11', 'in', '7', 'in', '', ''),
(103, 'Gardner ', 'TRIPLEX', 'PZL (PZ-11)', 11, 'in', 6.5, 'in', NULL, '', 4529, 'psi', 115, '11', 'in', '6 1/2', 'in', '', ''),
(104, 'Gardner ', 'TRIPLEX', 'PZL (PZ-11)', 11, 'in', 6, 'in', NULL, '', 5000, 'psi', 115, '11', 'in', '6', 'in', '', ''),
(105, 'Gardner ', 'TRIPLEX', 'PZL (PZ-11)', 11, 'in', 5.5, 'in', NULL, '', 5000, 'psi', 115, '11', 'in', '5 1/2', 'in', '', ''),
(106, 'Gardner ', 'TRIPLEX', 'THE', 5, 'in', 4, 'in', NULL, '', 3600, 'psi', 300, '5', 'in', '4', 'in', '', ''),
(107, 'National', 'TRIPLEX', '10-P-130', 10, 'in', 6.75, 'in', NULL, '', 3085, 'psi', 140, '10', 'in', '6 3/4', 'in', '', ''),
(108, 'National', 'TRIPLEX', '10-P-130', 10, 'in', 6.5, 'in', NULL, '', 3325, 'psi', 140, '10', 'in', '6 1/2', 'in', '', ''),
(109, 'National', 'TRIPLEX', '10-P-130', 10, 'in', 6.25, 'in', NULL, '', 3595, 'psi', 140, '10', 'in', '6 1/2', 'in', '', ''),
(110, 'National', 'TRIPLEX', '10-P-130', 10, 'in', 6, 'in', NULL, '', 3900, 'psi', 140, '10', 'in', '6', 'in', '', ''),
(111, 'National', 'TRIPLEX', '10-P-130', 10, 'in', 5.5, 'in', NULL, '', 4645, 'psi', 140, '10', 'in', '5,5', 'in', '', ''),
(112, 'National', 'TRIPLEX', '10-P-130', 10, 'in', 5, 'in', NULL, '', 5000, 'psi', 140, '10', 'in', '5', 'in', '', ''),
(113, 'National', 'TRIPLEX', '10-P-130', 10, 'in', 4.5, 'in', NULL, '', 5000, 'psi', 140, '10', 'in', '4,5', 'in', '', ''),
(114, 'National', 'TRIPLEX', '10-P-130', 10, 'in', 4, 'in', NULL, '', 5000, 'psi', 140, '10', 'in', '4', 'in', '', ''),
(115, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 7.25, 'in', NULL, '', 3200, 'psi', 120, '12', 'in', '7 1/4', 'in', '', ''),
(116, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 6, 'in', NULL, '', 4670, 'psi', 120, '12', 'in', '6', 'in', '', ''),
(117, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 6.25, 'in', NULL, '', 4305, 'psi', 120, '12', 'in', '6 1/4', 'in', '', ''),
(118, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 5.75, 'in', NULL, '', 5085, 'psi', 120, '12', 'in', '5 3/4', 'in', '', ''),
(119, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 4.5, 'in', NULL, '', 6720, 'psi', 120, '12', 'in', '4 1/2', 'in', '', ''),
(120, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 5.5, 'in', NULL, '', 5555, 'psi', 120, '12', 'in', '5 1/2', 'in', '', ''),
(121, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 6.75, 'in', NULL, '', 3690, 'psi', 120, '12', 'in', '7 3/4', 'in', '', ''),
(122, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 5, 'in', NULL, '', 6720, 'psi', 120, '12', 'in', '5', 'in', '', ''),
(123, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 7, 'in', NULL, '', 3430, 'psi', 120, '12', 'in', '7', 'in', '', ''),
(124, 'National', 'TRIPLEX', '12-P-160', 12, 'in', 6.5, 'in', NULL, '', 3980, 'psi', 120, '12', 'in', '6 1/2', 'in', '', ''),
(125, 'National', 'TRIPLEX', '14-P-220', 14, 'in', 9, 'in', NULL, '', 2795, 'psi', 105, '14', 'in', '9', 'in', '', ''),
(126, 'National', 'TRIPLEX', '14-P-220', 14, 'in', 5.5, 'in', NULL, '', 7475, 'psi', 105, '14', 'in', '5 1/2', 'in', '', ''),
(127, 'National', 'TRIPLEX', '14-P-220', 14, 'in', 6.5, 'in', NULL, '', 5360, 'psi', 105, '14', 'in', '6 1/2', 'in', '', ''),
(128, 'National', 'TRIPLEX', '14-P-220', 14, 'in', 7, 'in', NULL, '', 4615, 'psi', 105, '14', 'in', '7', 'in', '', ''),
(129, 'National', 'TRIPLEX', '14-P-220', 14, 'in', 7.5, 'in', NULL, '', 4025, 'psi', 105, '14', 'in', '7 1/2', 'in', '', ''),
(130, 'National', 'TRIPLEX', '14-P-220', 14, 'in', 8, 'in', NULL, '', 3535, 'psi', 105, '14', 'in', '8', 'in', '', ''),
(131, 'National', 'TRIPLEX', '14-P-220', 14, 'in', 5, 'in', NULL, '', 7500, 'psi', 105, '14', 'in', '5', 'in', '', ''),
(132, 'National', 'TRIPLEX', '14-P-220', 14, 'in', 6, 'in', NULL, '', 6285, 'psi', 105, '14', 'in', '6', 'in', '', ''),
(133, 'National', 'TRIPLEX', '8-P-80', 8.5, 'in', 5.5, 'in', NULL, '', 2940, 'psi', 160, '8 1/2', 'in', '5 1/2', 'in', '', ''),
(134, 'National', 'TRIPLEX', '8-P-80', 8.5, 'in', 4, 'in', NULL, '', 5000, 'psi', 160, '8 1/2', 'in', '4', 'in', '', ''),
(135, 'National', 'TRIPLEX', '8-P-80', 8.5, 'in', 6, 'in', NULL, '', 2470, 'psi', 160, '8 1/2', 'in', '6', 'in', '', ''),
(136, 'National', 'TRIPLEX', '8-P-80', 8.5, 'in', 5, 'in', NULL, '', 3560, 'psi', 160, '8 1/2', 'in', '5', 'in', '', ''),
(137, 'National', 'TRIPLEX', '8-P-80', 8.5, 'in', 4.5, 'in', NULL, '', 4395, 'psi', 160, '8 1/2', 'in', '4 1/2', 'in', '', ''),
(138, 'National', 'TRIPLEX', '8-P-80', 8.5, 'in', 6.25, 'in', NULL, '', 2280, 'psi', 160, '8 1/2', 'in', '6 1/4', 'in', '', ''),
(139, 'National', 'TRIPLEX', '9-P-100', 9.25, 'in', 6.5, 'in', NULL, '', 2580, 'psi', 150, '9 1/4', 'in', '6 1/2', 'in', '', ''),
(140, 'National', 'TRIPLEX', '9-P-100', 9.25, 'in', 6, 'in', NULL, '', 3030, 'psi', 150, '9 1/4', 'in', '6', 'in', '', ''),
(141, 'National', 'TRIPLEX', '9-P-100', 9.25, 'in', 4, 'in', NULL, '', 5000, 'psi', 150, '9 1/4', 'in', '4', 'in', '', ''),
(142, 'National', 'TRIPLEX', '9-P-100', 9.25, 'in', 5.5, 'in', NULL, '', 3605, 'psi', 150, '9 1/4', 'in', '5 1/2', 'in', '', ''),
(143, 'National', 'TRIPLEX', '9-P-100', 9.25, 'in', 4.5, 'in', NULL, '', 5000, 'psi', 150, '9 1/4', 'in', '4 1/2', 'in', '', ''),
(144, 'National', 'TRIPLEX', '9-P-100', 9.25, 'in', 6.75, 'in', NULL, '', 2395, 'psi', 150, '9 1/4', 'in', '6 3/4', 'in', '', ''),
(145, 'National', 'TRIPLEX', '9-P-100', 9.25, 'in', 5, 'in', NULL, '', 4360, 'psi', 150, '9 1/4', 'in', '5', 'in', '', ''),
(146, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 5.5, 'in', NULL, '', 3575, 'psi', 140, '10', 'in', '5 1/2', 'in', '', ''),
(147, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 5, 'in', NULL, '', 4330, 'psi', 140, '10', 'in', '5', 'in', '', ''),
(148, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 4.5, 'in', NULL, '', 5000, 'psi', 140, '10', 'in', '4 1/2', 'in', '', ''),
(149, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 5.25, 'in', NULL, '', 3920, 'psi', 140, '10', 'in', '5 1/4', 'in', '', ''),
(150, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 6.5, 'in', NULL, '', 2558, 'psi', 140, '10', 'in', '6 1/2', 'in', '', ''),
(151, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 6, 'in', NULL, '', 3010, 'psi', 140, '10', 'in', '6', 'in', '', ''),
(152, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 6.25, 'in', NULL, '', 2770, 'psi', 140, '10', 'in', '6 1/4', 'in', '', ''),
(153, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 5.75, 'in', NULL, '', 3270, 'psi', 140, '10', 'in', '5 3/4', 'in', '', ''),
(154, 'National', 'TRIPLEX', 'FD-1000', 10, 'in', 6.75, 'in', NULL, '', 2370, 'psi', 140, '10', 'in', '6 3/4', 'in', '', ''),
(155, 'National', 'TRIPLEX', 'FD-1600', 12, 'in', 5, 'in', NULL, '', 5001, 'psi', 120, '12', 'in', '5', 'in', '', ''),
(156, 'National', 'TRIPLEX', 'FD-1600', 12, 'in', 6, 'in', NULL, '', 4665, 'psi', 120, '12', 'in', '6', 'in', '', ''),
(157, 'National', 'TRIPLEX', 'FD-1600', 12, 'in', 5.5, 'in', NULL, '', 5000, 'psi', 120, '12', 'in', '5 1/2', 'in', '', ''),
(158, 'National', 'TRIPLEX', 'FD-1600', 12, 'in', 7, 'in', NULL, '', 3423, 'psi', 120, '12', 'in', '7', 'in', '', ''),
(159, 'National', 'TRIPLEX', 'FD-1600', 12, 'in', 6.75, 'in', NULL, '', 3688, 'psi', 120, '12', 'in', '6 3/4', 'in', '', ''),
(160, 'National', 'TRIPLEX', 'FD-1600', 12, 'in', 6.5, 'in', NULL, '', 3981, 'psi', 120, '12', 'in', '6 1/2', 'in', '', ''),
(161, 'National', 'TRIPLEX', 'FD-500', 7.5, 'in', 4, 'in', NULL, '', 3818, 'psi', 150, '7 1/2', 'in', '4', 'in', '', ''),
(162, 'National', 'TRIPLEX', 'FD-500', 7.5, 'in', 5, 'in', NULL, '', 2440, 'psi', 150, '7 1/2', 'in', '5', 'in', '', ''),
(163, 'National', 'TRIPLEX', 'FD-500', 7.5, 'in', 6.25, 'in', NULL, '', 1565, 'psi', 150, '7 1/2', 'in', '6 1/4', 'in', '', ''),
(164, 'National', 'TRIPLEX', 'FD-500', 7.5, 'in', 6.5, 'in', NULL, '', 1447, 'psi', 150, '7 1/2', 'in', '6 1/2', 'in', '', ''),
(165, 'National', 'TRIPLEX', 'FD-500', 7.5, 'in', 6.75, 'in', NULL, '', 1341, 'psi', 150, '7 1/2', 'in', '6 3/4', 'in', '', ''),
(166, 'National', 'TRIPLEX', 'FD-500', 7.5, 'in', 6, 'in', NULL, '', 1699, 'psi', 150, '7 1/2', 'in', '6', 'in', '', ''),
(167, 'National', 'TRIPLEX', 'FD-500', 7.5, 'in', 5.5, 'in', NULL, '', 2024, 'psi', 150, '7 1/2', 'in', '5 1/2', 'in', '', ''),
(168, 'National', 'TRIPLEX', 'FD-500', 7.5, 'in', 4.5, 'in', NULL, '', 3025, 'psi', 150, '7 1/2', 'in', '4 1/2', 'in', '', ''),
(169, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 6.5, 'in', NULL, '', 2120, 'psi', 150, '9', 'in', '6 1/2', 'in', '', ''),
(170, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 5.75, 'in', NULL, '', 2715, 'psi', 150, '9', 'in', '5 3/4', 'in', '', ''),
(171, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 4, 'in', NULL, '', 5000, 'psi', 150, '9', 'in', '4', 'in', '', ''),
(172, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 6.75, 'in', NULL, '', 1968, 'psi', 150, '9', 'in', '6 3/4', 'in', '', ''),
(173, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 5.25, 'in', NULL, '', 3260, 'psi', 150, '9', 'in', '5 1/4', 'in', '', ''),
(174, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 6.25, 'in', NULL, '', 2295, 'psi', 150, '9', 'in', '6 1/4', 'in', '', ''),
(175, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 5.5, 'in', NULL, '', 2965, 'psi', 150, '9', 'in', '5 1/2', 'in', '', ''),
(176, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 6, 'in', NULL, '', 2490, 'psi', 150, '9', 'in', '6', 'in', '', ''),
(177, 'National', 'TRIPLEX', 'FD-800', 9, 'in', 5, 'in', NULL, '', 3590, 'psi', 150, '9', 'in', '5', 'in', '', ''),
(178, 'Oilwell', 'TRIPLEX', 'A1400-PT', 10, 'in', 5, 'in', NULL, '', 5000, 'psi', 150, '10', 'in', '5', 'in', '', ''),
(179, 'Oilwell', 'TRIPLEX', 'A1400-PT', 10, 'in', 5.5, 'in', NULL, '', 4723, 'psi', 150, '10', 'in', '5 1/2', 'in', '', ''),
(180, 'Oilwell', 'TRIPLEX', 'A1400-PT', 10, 'in', 6, 'in', NULL, '', 3968, 'psi', 150, '10', 'in', '6', 'in', '', ''),
(181, 'Oilwell', 'TRIPLEX', 'A1400-PT', 10, 'in', 6.5, 'in', NULL, '', 3381, 'psi', 150, '10', 'in', '6 1/2', 'in', '', ''),
(182, 'Oilwell', 'TRIPLEX', 'A1400-PT', 10, 'in', 7, 'in', NULL, '', 2915, 'psi', 150, '10', 'in', '7', 'in', '', ''),
(183, 'Oilwell', 'TRIPLEX', 'A1400-PT', 10, 'in', 7.5, 'in', NULL, '', 2540, 'psi', 150, '10', 'in', '7 1/2', 'in', '', ''),
(184, 'Oilwell', 'TRIPLEX', 'A1700-PT', 12, 'in', 5, 'in', NULL, '', 5000, 'psi', 150, '12', 'in', '5', 'in', '', ''),
(185, 'Oilwell', 'TRIPLEX', 'A1700-PT', 12, 'in', 5.5, 'in', NULL, '', 4723, 'psi', 150, '12', 'in', '5 1/2', 'in', '', ''),
(186, 'Oilwell', 'TRIPLEX', 'A1700-PT', 12, 'in', 6, 'in', NULL, '', 3968, 'psi', 150, '12', 'in', '6', 'in', '', ''),
(187, 'Oilwell', 'TRIPLEX', 'A1700-PT', 12, 'in', 6.5, 'in', NULL, '', 3381, 'psi', 150, '12', 'in', '6 1/2', 'in', '', ''),
(188, 'Oilwell', 'TRIPLEX', 'A1700-PT', 12, 'in', 7, 'in', NULL, '', 2915, 'psi', 150, '12', 'in', '7', 'in', '', ''),
(189, 'Oilwell', 'TRIPLEX', 'A1700-PT', 12, 'in', 7.5, 'in', NULL, '', 2540, 'psi', 150, '12', 'in', '7 1/2', 'in', '', ''),
(190, 'Oilwell', 'TRIPLEX', 'A400-PT', 8, 'in', 4, 'in', NULL, '', 2701, 'psi', 175, '8', 'in', '4', 'in', '', ''),
(191, 'Oilwell', 'TRIPLEX', 'A400-PT', 8, 'in', 4.5, 'in', NULL, '', 2134, 'psi', 175, '8', 'in', '4 1/2', 'in', '', ''),
(192, 'Oilwell', 'TRIPLEX', 'A400-PT', 8, 'in', 5, 'in', NULL, '', 1729, 'psi', 175, '8', 'in', '5', 'in', '', ''),
(193, 'Oilwell', 'TRIPLEX', 'A400-PT', 8, 'in', 5.5, 'in', NULL, '', 1429, 'psi', 175, '8', 'in', '5 1/2', 'in', '', ''),
(194, 'Oilwell', 'TRIPLEX', 'A400-PT', 8, 'in', 5.75, 'in', NULL, '', 1307, 'psi', 175, '8', 'in', '5 3/4', 'in', '', ''),
(195, 'Oilwell', 'TRIPLEX', 'A400-PT', 8, 'in', 6, 'in', NULL, '', 1200, 'psi', 175, '8', 'in', '6', 'in', '', ''),
(196, 'Oilwell', 'TRIPLEX', 'A400-PT', 8, 'in', 6.5, 'in', NULL, '', 1023, 'psi', 175, '8', 'in', '6 1/2', 'in', '', ''),
(197, 'Oilwell', 'TRIPLEX', 'A400-PT', 8, 'in', 7, 'in', NULL, '', 882, 'psi', 175, '8', 'in', '7', 'in', '', ''),
(198, 'Oilwell', 'TRIPLEX', 'A600-PT', 8, 'in', 4, 'in', NULL, '', 4058, 'psi', 175, '8', 'in', '4', 'in', '', ''),
(199, 'Oilwell', 'TRIPLEX', 'A600-PT', 8, 'in', 4.5, 'in', NULL, '', 3207, 'psi', 175, '8', 'in', '4 1/2', 'in', '', ''),
(200, 'Oilwell', 'TRIPLEX', 'A600-PT', 8, 'in', 5, 'in', NULL, '', 2597, 'psi', 175, '8', 'in', '5', 'in', '', ''),
(201, 'Oilwell', 'TRIPLEX', 'A600-PT', 8, 'in', 5.5, 'in', NULL, '', 2147, 'psi', 175, '8', 'in', '5 1/2', 'in', '', ''),
(202, 'Oilwell', 'TRIPLEX', 'A600-PT', 8, 'in', 5.75, 'in', NULL, '', 1964, 'psi', 175, '8', 'in', '5 3/4', 'in', '', ''),
(203, 'Oilwell', 'TRIPLEX', 'A600-PT', 8, 'in', 6, 'in', NULL, '', 1804, 'psi', 175, '8', 'in', '6', 'in', '', ''),
(204, 'Oilwell', 'TRIPLEX', 'A600-PT', 8, 'in', 6.5, 'in', NULL, '', 1537, 'psi', 175, '8', 'in', '6 1/2', 'in', '', ''),
(205, 'Oilwell', 'TRIPLEX', 'A600-PT', 8, 'in', 7, 'in', NULL, '', 1325, 'psi', 175, '8', 'in', '7', 'in', '', ''),
(206, 'Oilwell', 'TRIPLEX', 'B1100-PT', 9, 'in', 5, 'in', NULL, '', 4482, 'psi', 150, '9', 'in', '5', 'in', '', ''),
(207, 'Oilwell', 'TRIPLEX', 'B1100-PT', 9, 'in', 5.5, 'in', NULL, '', 3704, 'psi', 150, '9', 'in', '5 1/2', 'in', '', ''),
(208, 'Oilwell', 'TRIPLEX', 'B1100-PT', 9, 'in', 6, 'in', NULL, '', 3112, 'psi', 150, '9', 'in', '6', 'in', '', ''),
(209, 'Oilwell', 'TRIPLEX', 'B1100-PT', 9, 'in', 6.5, 'in', NULL, '', 2652, 'psi', 150, '9', 'in', '6 1/2', 'in', '', ''),
(210, 'Oilwell', 'TRIPLEX', 'B1100-PT', 9, 'in', 7, 'in', NULL, '', 2287, 'psi', 150, '9', 'in', '7', 'in', '', ''),
(211, 'Oilwell', 'TRIPLEX', 'B1100-PT', 9, 'in', 7.5, 'in', NULL, '', 1992, 'psi', 150, '9', 'in', '7 1/2', 'in', '', ''),
(212, 'Oilwell', 'TRIPLEX', 'B850-PT', 9, 'in', 5, 'in', NULL, '', 3565, 'psi', 160, '9', 'in', '5', 'in', '', ''),
(213, 'Oilwell', 'TRIPLEX', 'B850-PT', 9, 'in', 5.5, 'in', NULL, '', 2946, 'psi', 160, '9', 'in', '5 1/2', 'in', '', ''),
(214, 'Oilwell', 'TRIPLEX', 'B850-PT', 9, 'in', 6, 'in', NULL, '', 2476, 'psi', 160, '9', 'in', '6', 'in', '', ''),
(215, 'Oilwell', 'TRIPLEX', 'B850-PT', 9, 'in', 6.5, 'in', NULL, '', 2110, 'psi', 160, '9', 'in', '6 1/2', 'in', '', ''),
(216, 'Oilwell', 'TRIPLEX', 'B850-PT', 9, 'in', 7, 'in', NULL, '', 1819, 'psi', 160, '9', 'in', '7', 'in', '', ''),
(217, 'Oilwell', 'TRIPLEX', 'B850-PT', 9, 'in', 7.5, 'in', NULL, '', 1584, 'psi', 160, '9', 'in', '7 1/2', 'in', '', ''),
(218, 'Oilwell', 'TRIPLEX', 'HD1400-PT', 12, 'in', 5, 'in', NULL, '', 5000, 'psi', 120, '12', 'in', '5', 'in', '', ''),
(219, 'Oilwell', 'TRIPLEX', 'HD1400-PT', 12, 'in', 5.5, 'in', NULL, '', 4861, 'psi', 120, '12', 'in', '5 1/2', 'in', '', ''),
(220, 'Oilwell', 'TRIPLEX', 'HD1400-PT', 12, 'in', 6, 'in', NULL, '', 4085, 'psi', 120, '12', 'in', '6', 'in', '', ''),
(221, 'Oilwell', 'TRIPLEX', 'HD1400-PT', 12, 'in', 6.5, 'in', NULL, '', 3481, 'psi', 120, '12', 'in', '6 1/2', 'in', '', ''),
(222, 'Oilwell', 'TRIPLEX', 'HD1400-PT', 12, 'in', 7, 'in', NULL, '', 3001, 'psi', 120, '12', 'in', '7', 'in', '', ''),
(223, 'Oilwell', 'TRIPLEX', 'HD1400-PT', 12, 'in', 7.5, 'in', NULL, '', 2614, 'psi', 120, '12', 'in', '7 1/2', 'in', '', ''),
(224, 'Oilwell', 'TRIPLEX', 'HD1700-PT', 12, 'in', 5, 'in', NULL, '', 5000, 'psi', 120, '12', 'in', '5', 'in', '', ''),
(225, 'Oilwell', 'TRIPLEX', 'HD1700-PT', 12, 'in', 5.5, 'in', NULL, '', 5000, 'psi', 120, '12', 'in', '5 1/5', 'in', '', ''),
(226, 'Oilwell', 'TRIPLEX', 'HD1700-PT', 12, 'in', 6, 'in', NULL, '', 4960, 'psi', 120, '12', 'in', '6', 'in', '', ''),
(227, 'Oilwell', 'TRIPLEX', 'HD1700-PT', 12, 'in', 6.5, 'in', NULL, '', 4227, 'psi', 120, '12', 'in', '6 1/2', 'in', '', ''),
(228, 'Oilwell', 'TRIPLEX', 'HD1700-PT', 12, 'in', 7, 'in', NULL, '', 3644, 'psi', 120, '12', 'in', '7', 'in', '', ''),
(229, 'Oilwell', 'TRIPLEX', 'HD1700-PT', 12, 'in', 7.5, 'in', NULL, '', 3175, 'psi', 120, '12', 'in', '7 1/2', 'in', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brocas`
--

DROP TABLE IF EXISTS `brocas`;
CREATE TABLE IF NOT EXISTS `brocas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_broca` varchar(255) DEFAULT NULL,
  `custom` int(1) DEFAULT '0',
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `brocas`
--

INSERT INTO `brocas` (`id`, `nombre_broca`, `custom`, `active`) VALUES
(1, 'PDC', 0, 1),
(2, 'TRI-CONE', 0, 1),
(3, 'BI CENTRIC', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brocas_modelos`
--

DROP TABLE IF EXISTS `brocas_modelos`;
CREATE TABLE IF NOT EXISTS `brocas_modelos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_broca` int(255) DEFAULT NULL,
  `odfracc` varchar(255) DEFAULT NULL,
  `unit_oddfracc` varchar(255) DEFAULT NULL,
  `odddeci` float DEFAULT NULL,
  `unit_odddeci` varchar(255) DEFAULT NULL,
  `length` float DEFAULT NULL,
  `unit_length` varchar(255) DEFAULT NULL,
  `nombre_modelo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `brocas_modelos`
--

INSERT INTO `brocas_modelos` (`id`, `id_broca`, `odfracc`, `unit_oddfracc`, `odddeci`, `unit_odddeci`, `length`, `unit_length`, `nombre_modelo`) VALUES
(1, 3, '12 1/4', 'in', 12.24, 'in', 25, 'ft', 'BL'),
(2, 2, '4 3/4', 'in', 4.75, 'in', 1, 'ft', 'XS12S'),
(3, 2, '4 7/8', 'in', 4.875, 'in', 1, 'ft', 'XS20S'),
(4, 2, '5 7/8', 'in', 5.875, 'in', 1, 'ft', 'XN4'),
(5, 2, '6', 'in', 6, 'in', 1, 'ft', 'XN4'),
(6, 2, '6 1/8', 'in', 6.125, 'in', 1, 'ft', 'XS1'),
(7, 2, '6 1/4', 'in', 6.25, 'in', 1, 'ft', 'XS1'),
(8, 2, '6 1/2', 'in', 6.5, 'in', 1, 'ft', 'XS1'),
(9, 2, '6 3/4', 'in', 6.75, 'in', 1, 'ft', 'XS1'),
(10, 2, '7 7/8', 'in', 7.875, 'in', 1, 'ft', 'XS09'),
(11, 2, '8 3/8', 'in', 8.375, 'in', 1, 'ft', 'XS1'),
(12, 2, '8 1/2', 'in', 8.5, 'in', 1, 'ft', 'XS06'),
(13, 2, '8 3/4', 'in', 8.75, 'in', 1, 'ft', 'XS09'),
(14, 2, '9', 'in', 9, 'in', 1, 'ft', 'XSC1S'),
(15, 2, '9 1/2', 'in', 9.5, 'in', 1, 'ft', 'XSC1S'),
(16, 2, '9 7/8', 'in', 9.875, 'in', 1, 'ft', 'XL20'),
(17, 2, '10 5/8', 'in', 10.625, 'in', 1, 'ft', 'XL20'),
(18, 2, '11', 'in', 11, 'in', 1, 'ft', 'XL33N'),
(19, 2, '11 5/8', 'in', 11.625, 'in', 1, 'ft', 'XS3GS'),
(20, 2, '12', 'in', 12, 'in', 1, 'ft', 'XLC1'),
(21, 2, '12 1/4', 'in', 12.25, 'in', 1, 'ft', 'XL16'),
(22, 2, '13 1/2', 'in', 13.5, 'in', 1, 'ft', 'XN1'),
(23, 2, '14 1/2', 'in', 14.5, 'in', 1, 'ft', 'XT1'),
(24, 2, '14 3/4', 'in', 14.75, 'in', 1, 'ft', 'XN1'),
(25, 2, '16', 'in', 16, 'in', 1, 'ft', 'XT1'),
(26, 2, '17', 'in', 17, 'in', 1, 'ft', 'XN1'),
(27, 2, '17 1/2', 'in', 17.5, 'in', 1, 'ft', 'XN1'),
(28, 2, '18', 'in', 18, 'in', 1, 'ft', 'XT1GS'),
(29, 2, '18 1/2', 'in', 18.5, 'in', 1, 'ft', 'XT1'),
(30, 2, '20', 'in', 20, 'in', 1, 'ft', 'XN1'),
(31, 2, '22', 'in', 22, 'in', 1, 'ft', 'XN1'),
(32, 2, '23', 'in', 23, 'in', 1, 'ft', 'XN1C'),
(33, 2, '24', 'in', 24, 'in', 1, 'ft', 'XN1G'),
(34, 2, '25 3/4', 'in', 25.75, 'in', 1, 'ft', 'XT1'),
(35, 2, '26', 'in', 26, 'in', 1, 'ft', 'XN1'),
(36, 1, '3 3/8', 'in', 3.375, 'in', 0.59, 'ft', 'FM2323'),
(37, 1, '3 3/4', 'in', 3.75, 'in', 0.46, 'ft', 'FM2533r'),
(38, 1, '3 3/4', 'in', 3.75, 'in', 0.67, 'ft', 'FM2533'),
(39, 1, '3 3/4', 'in', 3.75, 'in', 0.58, 'ft', 'SE3431i'),
(40, 1, '3 3/4', 'in', 3.75, 'in', 0.53, 'ft', 'TB26i'),
(41, 1, '3 7/8', 'in', 3.875, 'in', 0.64, 'ft', 'FM2421'),
(42, 1, '3 7/8', 'in', 3.875, 'in', 0.65, 'ft', 'FM2533'),
(43, 1, '4', 'in', 4, 'in', 0.65, 'ft', 'FM2631'),
(44, 1, '4 1/8', 'in', 4.125, 'in', 0.61, 'ft', 'FM2621'),
(45, 1, '4 1/8', 'in', 4.125, 'in', 0.73, 'ft', 'FM2643r'),
(46, 1, '4 3/8', 'in', 4.375, 'in', 0.6, 'ft', 'FM2621'),
(47, 1, '4 3/8', 'in', 4.375, 'in', 0.68, 'ft', 'FM2633'),
(48, 1, '4 1/2', 'in', 4.5, 'in', 0.62, 'ft', 'FM2621'),
(49, 1, '4 3/4', 'in', 4.75, 'in', 0.73, 'ft', 'FM2352'),
(50, 1, '4 3/4', 'in', 4.75, 'in', 0.66, 'ft', 'FM2433'),
(51, 1, '4 3/4', 'in', 4.75, 'in', 0.68, 'ft', 'FM2442'),
(52, 1, '4 3/4', 'in', 4.75, 'in', 0.65, 'ft', 'FM2621'),
(53, 1, '4 3/4', 'in', 4.75, 'in', 0.67, 'ft', 'FM2633'),
(54, 1, '4 3/4', 'in', 4.75, 'in', 0.75, 'ft', 'FM2635'),
(55, 1, '4 3/4', 'in', 4.75, 'in', 0.74, 'ft', 'FS2333'),
(56, 1, '5 3/4', 'in', 5.75, 'in', 0.66, 'ft', 'FM2921i'),
(57, 1, '5 7/8', 'in', 5.875, 'in', 0.72, 'ft', 'FM2465'),
(58, 1, '5 7/8', 'in', 5.875, 'in', 0.65, 'ft', 'FM2631'),
(59, 1, '5 7/8', 'in', 5.875, 'in', 0.82, 'ft', 'FM2633i'),
(60, 1, '5 7/8', 'in', 5.875, 'in', 0.66, 'ft', 'FM2641'),
(61, 1, '5 7/8', 'in', 5.875, 'in', 1.08, 'ft', 'FM2641r'),
(62, 1, '8 1/2', 'in', 8.5, 'in', 1, 'ft', 'cxxx'),
(63, 1, '17 1/4', 'in', 17.25, 'in', 7, 'ft', 'example');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casing`
--

DROP TABLE IF EXISTS `casing`;
CREATE TABLE IF NOT EXISTS `casing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odfrac` varchar(255) DEFAULT NULL,
  `oddeci` decimal(10,3) DEFAULT NULL,
  `od_unit` varchar(255) DEFAULT NULL,
  `idfrac` varchar(255) DEFAULT NULL,
  `iddeci` decimal(10,3) DEFAULT NULL,
  `id_unit` varchar(255) DEFAULT NULL,
  `weight` decimal(10,3) DEFAULT NULL,
  `w_unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=202 ;

--
-- Volcado de datos para la tabla `casing`
--

INSERT INTO `casing` (`id`, `odfrac`, `oddeci`, `od_unit`, `idfrac`, `iddeci`, `id_unit`, `weight`, `w_unit`) VALUES
(1, '1 1/20', 1.050, 'in', '0,824', 0.824, 'in', 1.140, 'ppf'),
(2, '1 23/73', 1.315, 'in', '1,049', 1.049, 'in', 1.700, 'ppf'),
(3, '1 33/50', 1.660, 'in', '1,41', 1.410, 'in', 2.100, 'ppf'),
(4, '1 33/50', 1.660, 'in', '1,38', 1.380, 'in', 2.300, 'ppf'),
(5, '1 9/10', 1.900, 'in', '1,65', 1.650, 'in', 2.400, 'ppf'),
(6, '1 9/10', 1.900, 'in', '1,61', 1.610, 'in', 2.750, 'ppf'),
(7, '2 1/16', 2.063, 'in', '1,751', 1.751, 'in', 3.250, 'ppf'),
(8, '2 3/8', 2.375, 'in', '2,041', 2.041, 'in', 4.000, 'ppf'),
(9, '2 3/8', 2.375, 'in', '1,995', 1.995, 'in', 4.600, 'ppf'),
(10, '2 3/8', 2.375, 'in', '1,867', 1.867, 'in', 5.800, 'ppf'),
(11, '2 7/8', 2.875, 'in', '2,441', 2.441, 'in', 6.400, 'ppf'),
(12, '2 7/8', 2.875, 'in', '2,323', 2.323, 'in', 7.800, 'ppf'),
(13, '2 7/8', 2.875, 'in', '2,259', 2.259, 'in', 8.600, 'ppf'),
(14, '3 1/2', 3.500, 'in', '3,068', 3.068, 'in', 7.700, 'ppf'),
(15, '3 1/2', 3.500, 'in', '2,992', 2.992, 'in', 9.200, 'ppf'),
(16, '3 1/2', 3.500, 'in', '2,75', 2.750, 'in', 12.700, 'ppf'),
(17, '4', 4.000, 'in', '3,548', 3.548, 'in', 9.500, 'ppf'),
(18, '4', 4.000, 'in', '3,476', 3.476, 'in', 11.000, 'ppf'),
(19, '4 1/2', 4.500, 'in', '4,09', 4.090, 'in', 9.500, 'ppf'),
(20, '4 1/2', 4.500, 'in', '4,052', 4.052, 'in', 10.500, 'ppf'),
(21, '4 1/2', 4.500, 'in', '4', 4.000, 'in', 11.600, 'ppf'),
(22, '4 1/2', 4.500, 'in', '3,958', 3.958, 'in', 12.600, 'ppf'),
(23, '4 1/2', 4.500, 'in', '3,92', 3.920, 'in', 13.500, 'ppf'),
(24, '4 1/2', 4.500, 'in', '3,826', 3.826, 'in', 15.100, 'ppf'),
(25, '4 1/2', 4.500, 'in', '3,64', 3.640, 'in', 18.800, 'ppf'),
(26, '4 1/2', 4.500, 'in', '3,5', 3.500, 'in', 21.600, 'ppf'),
(27, '4 1/2', 4.500, 'in', '3,38', 3.380, 'in', 24.600, 'ppf'),
(28, '4 1/2', 4.500, 'in', '3,24', 3.240, 'in', 26.500, 'ppf'),
(29, '5', 5.000, 'in', '4,56', 4.560, 'in', 11.500, 'ppf'),
(30, '5', 5.000, 'in', '4,494', 4.494, 'in', 13.000, 'ppf'),
(31, '5', 5.000, 'in', '4,408', 4.408, 'in', 15.000, 'ppf'),
(32, '5', 5.000, 'in', '4,276', 4.276, 'in', 18.000, 'ppf'),
(33, '5', 5.000, 'in', '4,184', 4.184, 'in', 20.300, 'ppf'),
(34, '5', 5.000, 'in', '4,126', 4.126, 'in', 21.400, 'ppf'),
(35, '5', 5.000, 'in', '4,044', 4.044, 'in', 23.200, 'ppf'),
(36, '5', 5.000, 'in', '4', 4.000, 'in', 24.100, 'ppf'),
(37, '5 1/2', 5.500, 'in', '5,012', 5.012, 'in', 14.000, 'ppf'),
(38, '5 1/2', 5.500, 'in', '4,95', 4.950, 'in', 15.500, 'ppf'),
(39, '5 1/2', 5.500, 'in', '4,892', 4.892, 'in', 17.000, 'ppf'),
(40, '5 1/2', 5.500, 'in', '4,778', 4.778, 'in', 20.000, 'ppf'),
(41, '5 1/2', 5.500, 'in', '4,67', 4.670, 'in', 23.000, 'ppf'),
(42, '5 1/2', 5.500, 'in', '4,626', 4.626, 'in', 23.800, 'ppf'),
(43, '5 1/2', 5.500, 'in', '4,548', 4.548, 'in', 26.000, 'ppf'),
(44, '5 1/2', 5.500, 'in', '4,5', 4.500, 'in', 26.800, 'ppf'),
(45, '5 1/2', 5.500, 'in', '4,44', 4.440, 'in', 28.400, 'ppf'),
(46, '5 1/2', 5.500, 'in', '4,376', 4.376, 'in', 28.400, 'ppf'),
(47, '5 1/2', 5.500, 'in', '4,376', 4.376, 'in', 29.700, 'ppf'),
(48, '5 1/2', 5.500, 'in', '4,276', 4.276, 'in', 32.000, 'ppf'),
(49, '5 1/2', 5.500, 'in', '4,25', 4.250, 'in', 32.600, 'ppf'),
(50, '5 1/2', 5.500, 'in', '4,126', 4.126, 'in', 35.300, 'ppf'),
(51, '5 1/2', 5.500, 'in', '4,09', 4.090, 'in', 36.400, 'ppf'),
(52, '5 1/2', 5.500, 'in', '4,05', 4.050, 'in', 37.000, 'ppf'),
(53, '5 1/2', 5.500, 'in', '4', 4.000, 'in', 38.000, 'ppf'),
(54, '5 1/2', 5.500, 'in', '3,876', 3.876, 'in', 40.500, 'ppf'),
(55, '5 1/2', 5.500, 'in', '3,75', 3.750, 'in', 43.100, 'ppf'),
(56, '6 5/8', 6.625, 'in', '6,049', 6.049, 'in', 20.000, 'ppf'),
(57, '6 5/8', 6.625, 'in', '5,921', 5.921, 'in', 24.000, 'ppf'),
(58, '6 5/8', 6.625, 'in', '5,791', 5.791, 'in', 28.000, 'ppf'),
(59, '6 5/8', 6.625, 'in', '5,675', 5.675, 'in', 32.000, 'ppf'),
(60, '7', 7.000, 'in', '6,538', 6.538, 'in', 17.000, 'ppf'),
(61, '7', 7.000, 'in', '6,456', 6.456, 'in', 20.000, 'ppf'),
(62, '7', 7.000, 'in', '6,366', 6.366, 'in', 23.000, 'ppf'),
(63, '7', 7.000, 'in', '6,276', 6.276, 'in', 26.000, 'ppf'),
(64, '7', 7.000, 'in', '6,184', 6.184, 'in', 29.000, 'ppf'),
(65, '7', 7.000, 'in', '6,094', 6.094, 'in', 32.000, 'ppf'),
(66, '7', 7.000, 'in', '6,004', 6.004, 'in', 35.000, 'ppf'),
(67, '7', 7.000, 'in', '5,92', 5.920, 'in', 38.000, 'ppf'),
(68, '7', 7.000, 'in', '5,82', 5.820, 'in', 41.000, 'ppf'),
(69, '7', 7.000, 'in', '5,75', 5.750, 'in', 42.700, 'ppf'),
(70, '7', 7.000, 'in', '5,72', 5.720, 'in', 44.000, 'ppf'),
(71, '7', 7.000, 'in', '5,66', 5.660, 'in', 46.000, 'ppf'),
(72, '7', 7.000, 'in', '5,54', 5.540, 'in', 49.500, 'ppf'),
(73, '7', 7.000, 'in', '5,25', 5.250, 'in', 57.100, 'ppf'),
(74, '7 5/8', 7.625, 'in', '7,025', 7.025, 'in', 24.000, 'ppf'),
(75, '7 5/8', 7.625, 'in', '6,969', 6.969, 'in', 26.400, 'ppf'),
(76, '7 5/8', 7.625, 'in', '6,875', 6.875, 'in', 29.700, 'ppf'),
(77, '7 5/8', 7.625, 'in', '6,765', 6.765, 'in', 33.700, 'ppf'),
(78, '7 5/8', 7.625, 'in', '6,625', 6.625, 'in', 39.000, 'ppf'),
(79, '7 5/8', 7.625, 'in', '6,501', 6.501, 'in', 42.800, 'ppf'),
(80, '7 5/8', 7.625, 'in', '6,435', 6.435, 'in', 45.300, 'ppf'),
(81, '7 5/8', 7.625, 'in', '6,375', 6.375, 'in', 47.100, 'ppf'),
(82, '7 5/8', 7.625, 'in', '6,201', 6.201, 'in', 52.800, 'ppf'),
(83, '7 5/8', 7.625, 'in', '6,025', 6.025, 'in', 59.300, 'ppf'),
(84, '7 5/8', 7.625, 'in', '5,225', 5.225, 'in', 82.000, 'ppf'),
(85, '7 3/8', 7.750, 'in', '6,56', 6.560, 'in', 46.100, 'ppf'),
(86, '7 3/8', 7.750, 'in', '6,5', 6.500, 'in', 47.600, 'ppf'),
(87, '7 3/8', 7.750, 'in', '6,47', 6.470, 'in', 48.600, 'ppf'),
(88, '8 5/8', 8.625, 'in', '8,097', 8.097, 'in', 24.000, 'ppf'),
(89, '8 5/8', 8.625, 'in', '8,017', 8.017, 'in', 28.000, 'ppf'),
(90, '8 5/8', 8.625, 'in', '7,921', 7.921, 'in', 32.000, 'ppf'),
(91, '8 5/8', 8.625, 'in', '7,825', 7.825, 'in', 36.000, 'ppf'),
(92, '8 5/8', 8.625, 'in', '7,725', 7.725, 'in', 40.000, 'ppf'),
(93, '8 5/8', 8.625, 'in', '7,625', 7.625, 'in', 44.000, 'ppf'),
(94, '8 5/8', 8.625, 'in', '7,511', 7.511, 'in', 49.000, 'ppf'),
(95, '8 5/8', 8.625, 'in', '7,501', 7.501, 'in', 49.100, 'ppf'),
(96, '8 5/8', 8.625, 'in', '7,435', 7.435, 'in', 52.000, 'ppf'),
(97, '8 5/8', 8.625, 'in', '7,375', 7.375, 'in', 54.000, 'ppf'),
(98, '9 5/8', 9.625, 'in', '9,001', 9.001, 'in', 32.300, 'ppf'),
(99, '9 5/8', 9.625, 'in', '8,921', 8.921, 'in', 36.000, 'ppf'),
(100, '9 5/8', 9.625, 'in', '8,835', 8.835, 'in', 40.000, 'ppf'),
(101, '9 5/8', 9.625, 'in', '8,755', 8.755, 'in', 43.500, 'ppf'),
(102, '9 5/8', 9.625, 'in', '8,681', 8.681, 'in', 47.000, 'ppf'),
(103, '9 5/8', 9.625, 'in', '8,535', 8.535, 'in', 53.500, 'ppf'),
(104, '9 5/8', 9.625, 'in', '8,435', 8.435, 'in', 58.400, 'ppf'),
(105, '9 5/8', 9.625, 'in', '8,407', 8.407, 'in', 59.400, 'ppf'),
(106, '9 5/8', 9.625, 'in', '8,375', 8.375, 'in', 61.100, 'ppf'),
(107, '9 5/8', 9.625, 'in', '8,281', 8.281, 'in', 64.900, 'ppf'),
(108, '9 5/8', 9.625, 'in', '8,125', 8.125, 'in', 71.800, 'ppf'),
(109, '10 3/4', 10.750, 'in', '10,192', 10.192, 'in', 32.750, 'ppf'),
(110, '10 3/4', 10.750, 'in', '10,05', 10.050, 'in', 40.500, 'ppf'),
(111, '10 3/4', 10.750, 'in', '9,95', 9.950, 'in', 45.500, 'ppf'),
(112, '10 3/4', 10.750, 'in', '9,85', 9.850, 'in', 51.000, 'ppf'),
(113, '10 3/4', 10.750, 'in', '9,76', 9.760, 'in', 55.500, 'ppf'),
(114, '10 3/4', 10.750, 'in', '9,66', 9.660, 'in', 60.700, 'ppf'),
(115, '10 3/4', 10.750, 'in', '9,56', 9.560, 'in', 65.700, 'ppf'),
(116, '10 3/4', 10.750, 'in', '9,394', 9.394, 'in', 73.200, 'ppf'),
(117, '10 3/4', 10.750, 'in', '9,282', 9.282, 'in', 79.200, 'ppf'),
(118, '10 3/4', 10.750, 'in', '9,156', 9.156, 'in', 85.300, 'ppf'),
(119, '11 3/4', 11.750, 'in', '11,09', 11.090, 'in', 42.000, 'ppf'),
(120, '11 3/4', 11.750, 'in', '11', 11.000, 'in', 47.000, 'ppf'),
(121, '11 3/4', 11.750, 'in', '10,88', 10.880, 'in', 54.000, 'ppf'),
(122, '11 3/4', 11.750, 'in', '10,772', 10.772, 'in', 60.000, 'ppf'),
(123, '11 3/4', 11.750, 'in', '10,682', 10.682, 'in', 65.000, 'ppf'),
(124, '11 3/4', 11.750, 'in', '10,586', 10.586, 'in', 71.000, 'ppf'),
(125, '11 3/4', 11.750, 'in', '10,514', 10.514, 'in', 75.000, 'ppf'),
(126, '11 3/4', 11.750, 'in', '10,438', 10.438, 'in', 79.000, 'ppf'),
(127, '11 3/4', 11.750, 'in', '10,368', 10.368, 'in', 83.000, 'ppf'),
(128, '11 7/8', 11.875, 'in', '10,711', 10.711, 'in', 71.800, 'ppf'),
(129, '13 3/8', 13.375, 'in', '12,715', 12.715, 'in', 48.000, 'ppf'),
(130, '13 3/8', 13.375, 'in', '12,615', 12.615, 'in', 54.500, 'ppf'),
(131, '13 3/8', 13.375, 'in', '12,515', 12.515, 'in', 61.000, 'ppf'),
(132, '13 3/8', 13.375, 'in', '12,415', 12.415, 'in', 68.000, 'ppf'),
(133, '13 3/8', 13.375, 'in', '12,347', 12.347, 'in', 72.000, 'ppf'),
(134, '13 3/8', 13.375, 'in', '12,275', 12.275, 'in', 77.000, 'ppf'),
(135, '13 3/8', 13.375, 'in', '12,159', 12.159, 'in', 85.000, 'ppf'),
(136, '13 3/8', 13.375, 'in', '12,125', 12.125, 'in', 86.000, 'ppf'),
(137, '13 3/8', 13.375, 'in', '12,031', 12.031, 'in', 92.000, 'ppf'),
(138, '13 3/8', 13.375, 'in', '11,937', 11.937, 'in', 98.000, 'ppf'),
(139, '13 1/2', 13.500, 'in', '12,34', 12.340, 'in', 81.400, 'ppf'),
(140, '13 5/8', 13.625, 'in', '12,375', 12.375, 'in', 88.200, 'ppf'),
(141, '14', 14.000, 'in', '12,7', 12.700, 'in', 92.680, 'ppf'),
(142, '14', 14.000, 'in', '12,6', 12.600, 'in', 99.430, 'ppf'),
(143, '14', 14.000, 'in', '12,5', 12.500, 'in', 106.130, 'ppf'),
(144, '14', 14.000, 'in', '12,4', 12.400, 'in', 112.780, 'ppf'),
(145, '14', 14.000, 'in', '12,3', 12.300, 'in', 119.380, 'ppf'),
(146, '16', 16.000, 'in', '15,25', 15.250, 'in', 65.000, 'ppf'),
(147, '16', 16.000, 'in', '15,124', 15.124, 'in', 75.000, 'ppf'),
(148, '16', 16.000, 'in', '15,01', 15.010, 'in', 84.000, 'ppf'),
(149, '16', 16.000, 'in', '15', 15.000, 'in', 84.800, 'ppf'),
(150, '16', 16.000, 'in', '15,01', 15.010, 'in', 85.000, 'ppf'),
(151, '16', 16.000, 'in', '14,688', 14.688, 'in', 109.000, 'ppf'),
(152, '16', 16.000, 'in', '14,57', 14.570, 'in', 118.000, 'ppf'),
(153, '18 5/8', 18.625, 'in', '17,755', 17.755, 'in', 87.500, 'ppf'),
(154, '18 5/8', 18.625, 'in', '17,689', 17.689, 'in', 94.500, 'ppf'),
(155, '18 5/8', 18.625, 'in', '17,653', 17.653, 'in', 97.700, 'ppf'),
(156, '18 5/8', 18.625, 'in', '17,499', 17.499, 'in', 109.400, 'ppf'),
(157, '18 5/8', 18.625, 'in', '17,467', 17.467, 'in', 112.000, 'ppf'),
(158, '18 5/8', 18.625, 'in', '17,239', 17.239, 'in', 136.000, 'ppf'),
(159, '20', 20.000, 'in', '19,124', 19.124, 'in', 94.000, 'ppf'),
(160, '20', 20.000, 'in', '19', 19.000, 'in', 106.500, 'ppf'),
(161, '20', 20.000, 'in', '18,874', 18.874, 'in', 117.000, 'ppf'),
(162, '20', 20.000, 'in', '18,73', 18.730, 'in', 133.000, 'ppf'),
(163, '20', 20.000, 'in', '18,582', 18.582, 'in', 147.000, 'ppf'),
(164, '20', 20.000, 'in', '18,376', 18.376, 'in', 169.000, 'ppf'),
(165, '22', 22.000, 'in', '21,25', 21.250, 'in', 86.600, 'ppf'),
(166, '22', 22.000, 'in', '21', 21.000, 'in', 114.800, 'ppf'),
(167, '22', 22.000, 'in', '20,5', 20.500, 'in', 170.200, 'ppf'),
(168, '24', 24.000, 'in', '23', 23.000, 'in', 125.500, 'ppf'),
(169, '24', 24.000, 'in', '22,75', 22.750, 'in', 156.000, 'ppf'),
(170, '24', 24.000, 'in', '22,5', 22.500, 'in', 186.200, 'ppf'),
(171, '24', 24.000, 'in', '22', 22.000, 'in', 245.600, 'ppf'),
(172, '26', 26.000, 'in', '25', 25.000, 'in', 136.200, 'ppf'),
(173, '26', 26.000, 'in', '24,75', 24.750, 'in', 169.400, 'ppf'),
(174, '26', 26.000, 'in', '24,5', 24.500, 'in', 202.300, 'ppf'),
(175, '26', 26.000, 'in', '24', 24.000, 'in', 267.000, 'ppf'),
(176, '30', 30.000, 'in', '29', 29.000, 'in', 157.500, 'ppf'),
(177, '30', 30.000, 'in', '28,75', 28.750, 'in', 196.100, 'ppf'),
(178, '30', 30.000, 'in', '28,5', 28.500, 'in', 234.000, 'ppf'),
(179, '30', 30.000, 'in', '28', 28.000, 'in', 309.700, 'ppf'),
(180, '32', 32.000, 'in', '31', 31.000, 'in', 168.200, 'ppf'),
(181, '32', 32.000, 'in', '30,75', 30.750, 'in', 209.400, 'ppf'),
(182, '32', 32.000, 'in', '30,5', 30.500, 'in', 250.300, 'ppf'),
(183, '32', 32.000, 'in', '30', 30.000, 'in', 331.100, 'ppf'),
(184, '36', 36.000, 'in', '35', 35.000, 'in', 189.600, 'ppf'),
(185, '36', 36.000, 'in', '34,75', 34.750, 'in', 236.100, 'ppf'),
(186, '36', 36.000, 'in', '34,5', 34.500, 'in', 282.400, 'ppf'),
(187, '36', 36.000, 'in', '34', 34.000, 'in', 373.800, 'ppf'),
(188, '40', 40.000, 'in', '39', 39.000, 'in', 210.900, 'ppf'),
(189, '40', 40.000, 'in', '38,75', 38.750, 'in', 262.800, 'ppf'),
(190, '40', 40.000, 'in', '38,5', 38.500, 'in', 314.400, 'ppf'),
(191, '40', 40.000, 'in', '38', 38.000, 'in', 416.500, 'ppf'),
(192, '42', 42.000, 'in', '41', 41.000, 'in', 221.600, 'ppf'),
(193, '42', 42.000, 'in', '40,75', 40.750, 'in', 276.200, 'ppf'),
(194, '42', 42.000, 'in', '40,5', 40.500, 'in', 330.400, 'ppf'),
(195, '42', 42.000, 'in', '40', 40.000, 'in', 437.900, 'ppf'),
(196, '1 1/2', 1.500, NULL, NULL, 30.000, NULL, NULL, NULL),
(197, '1 1/2', 1.500, NULL, NULL, 2.800, NULL, NULL, NULL),
(198, '1 1/2', 1.500, NULL, NULL, 2.050, NULL, NULL, NULL),
(199, '6', 6.000, NULL, NULL, 5.000, NULL, NULL, NULL),
(200, '4', 4.000, NULL, NULL, 5.000, NULL, NULL, NULL),
(201, '2', 2.000, NULL, NULL, 5.000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lodos`
--

DROP TABLE IF EXISTS `lodos`;
CREATE TABLE IF NOT EXISTS `lodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `lodos`
--

INSERT INTO `lodos` (`id`, `nombre`) VALUES
(1, 'Q - NCa'),
(2, 'Q - MaxDrill'),
(3, 'Q - MaxDrill PHPA'),
(4, 'Q - Drill in'),
(5, 'Q - Drill'),
(6, 'Q - Inhibimax'),
(7, 'Natural Gel'),
(8, 'Natural Gel - benex'),
(9, 'Q - Vert'),
(10, 'Q - NK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `project` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `identification`, `lastname`, `name`, `project`, `category`, `rate`, `active`) VALUES
(1, '1030529971', 'Paternina', 'José', 1, 1, 500, 1),
(2, '72302448', 'ANTEQUERA', 'DAVID', 1, 1, 700, 1),
(3, '1098629008', 'Fernanda', 'Maria', 1, 1, 200, 0),
(4, '12345678', 'GOMEZ', 'OSCAR', 1, 1, 499, 1),
(5, '25845942', 'fsasf', 'fafad', 1, 1, 500, 0),
(6, '123', 'lalala', 'lalal', 1, 2, 300, 0),
(7, '098', 'iui', 'iui', 1, 4, 100, 0),
(8, '91525414', 'gutierrez', 'fabian', 1, 4, 200, 0),
(9, '13822956', 'gutierrez', 'jairo', 1, 5, 100, 0),
(10, '', '', '', 1, 3, 0, 0),
(11, '1098629008', 'gutierrez', 'fernanda', 1, 3, 0, 0),
(12, '888999', 'gutierrez', 'fabian', 1, 4, 0, 1),
(13, '7777888', 'gutierrez', 'jairo', 1, 5, 0, 1),
(14, '123', 'perez', 'juan', 1, 4, 100, 1),
(15, '234', 'jimenez', 'milagros', 1, 4, 100, 1),
(16, '09878', 'PEREZ', 'JUAN', 1, 1, 500, 1),
(17, '8888', 'ceceres', 'pedro', 1, 5, 50, 1),
(18, '111111', 'aguirre', 'gustavo', 1, 5, 25, 1),
(19, '9999999', 'claro', 'carlos', 1, 4, 100, 1),
(20, '5654', 'gomez', 'henry', 1, 5, 50, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_categories`
--

DROP TABLE IF EXISTS `personal_categories`;
CREATE TABLE IF NOT EXISTS `personal_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `erp_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `default_rate` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `personal_categories`
--

INSERT INTO `personal_categories` (`id`, `erp_id`, `name`, `type`, `default_rate`) VALUES
(1, NULL, 'Senior', 'enginer', 500),
(2, NULL, 'Junior', 'enginer', 300),
(3, NULL, 'Training', 'enginer', 0),
(4, NULL, 'Operator', 'operator', 0),
(5, NULL, 'Yard Worker', 'yard_worker', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_report_enginers`
--

DROP TABLE IF EXISTS `personal_report_enginers`;
CREATE TABLE IF NOT EXISTS `personal_report_enginers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enginer` int(11) DEFAULT NULL,
  `project` int(11) DEFAULT NULL,
  `cover` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `personal_report_enginers`
--

INSERT INTO `personal_report_enginers` (`id`, `enginer`, `project`, `cover`, `date`) VALUES
(1, 1, 1, 1, '2012-09-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactional_id` varchar(255) NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `well_name` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `rig` varchar(255) DEFAULT NULL,
  `geozone` varchar(255) DEFAULT NULL,
  `contract_number` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `universal_identifier` int(11) DEFAULT NULL,
  `creation_timestamp` datetime DEFAULT NULL,
  `spud_date` date DEFAULT NULL,
  `configured` int(11) DEFAULT '0',
  `shaker_qty` int(11) DEFAULT NULL,
  `maximun_enginers` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `transactional_id`, `last_modified`, `well_name`, `operator`, `rig`, `geozone`, `contract_number`, `field`, `active`, `universal_identifier`, `creation_timestamp`, `spud_date`, `configured`, `shaker_qty`, `maximun_enginers`) VALUES
(1, 'FCKGW', '2012-09-05 10:06:37', 'ORITO', 'PETROMINERALES', 'CAMBRIA1', 'ORITO', '0000', 'ORITO', 1, NULL, '2012-09-05 10:06:37', '2012-09-05', 0, 3, 3),
(2, 'YXRKT01', '2012-09-06 09:03:41', 'BOGOTA', 'QMAX', 'PEGASO1', 'BOGOTA', '0002', 'WTC1', 1, NULL, '2012-09-06 09:03:41', '2012-09-06', 0, NULL, NULL),
(3, 'QWERTY', '2012-09-11 09:54:30', 'CERETE1', 'DESARROLLO22', 'PEGASO', 'CERETE', '0001', 'CORDOBA', 1, NULL, '2012-09-11 09:54:30', '2012-09-11', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_centrifugues`
--

DROP TABLE IF EXISTS `project_centrifugues`;
CREATE TABLE IF NOT EXISTS `project_centrifugues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `maker` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `variator` int(11) DEFAULT NULL,
  `maxrpm` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `project_centrifugues`
--

INSERT INTO `project_centrifugues` (`id`, `project`, `maker`, `type`, `variator`, `maxrpm`, `active`) VALUES
(1, 1, 'QMAX', 'lgs', 1, 1000, 0),
(2, 1, 'DESARROLLO22', 'hgs', 1, 500, 0),
(3, 1, 'JOSE', 'hgs', 1, 1000, 0),
(4, 1, 'PATERNINA', 'lgs', 0, 2000, 0),
(5, 1, 'PANASONIC', 'hgs', 1, 2000, 1),
(6, 1, 'PANASONIC', 'hgs', 1, 1000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_mudcleaner`
--

DROP TABLE IF EXISTS `project_mudcleaner`;
CREATE TABLE IF NOT EXISTS `project_mudcleaner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `maker` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `desander_cones` int(11) DEFAULT NULL,
  `desander_conediameter` float DEFAULT NULL,
  `desander_pumptype` varchar(255) DEFAULT NULL,
  `desilter_cones` int(11) DEFAULT NULL,
  `desilter_conediameter` float DEFAULT NULL,
  `desilter_pumptype` varchar(255) DEFAULT NULL,
  `shaker_model` varchar(255) DEFAULT NULL,
  `shaker_screens` int(11) DEFAULT NULL,
  `shaker_movement` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `project_mudcleaner`
--

INSERT INTO `project_mudcleaner` (`id`, `project`, `maker`, `model`, `desander_cones`, `desander_conediameter`, `desander_pumptype`, `desilter_cones`, `desilter_conediameter`, `desilter_pumptype`, `shaker_model`, `shaker_screens`, `shaker_movement`, `active`) VALUES
(1, 1, '', '1150', NULL, 5.8, NULL, NULL, 4.2, NULL, 'SH01', NULL, NULL, 0),
(2, 1, '', '333', NULL, 34.5, NULL, NULL, 54.2, NULL, 'TOSHIBA', NULL, NULL, 0),
(3, 1, '', 'LALALLA', NULL, 0, NULL, NULL, 0, NULL, 'QMAX', NULL, NULL, 0),
(4, 1, '', 'PATERNINA', 1, 5.6, '5_4', 1, 6.1, '6_5', 'JOSEDANIEL', 3, 'circular', 0),
(5, 1, '', 'PATERNINA', 16, 3.5, '4_3', 13, 5, '4_3', 'JOSE DANIEL', 2, 'circular', 0),
(6, 1, 'JOSE', 'PATERNINA', 5, 3.4, '4_3', 6, 4, '5_5', 'JOSE DANIEL', 4, 'circular', 0),
(7, 1, 'DESARROLLO', '22', 1, 3.4, '5_4', 1, 3.4, '4_6', 'LALALAL', 2, 'eliptico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_shakers`
--

DROP TABLE IF EXISTS `project_shakers`;
CREATE TABLE IF NOT EXISTS `project_shakers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `maker` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `nominal_flow` float DEFAULT NULL,
  `movement` varchar(255) DEFAULT NULL,
  `screens` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `project_shakers`
--

INSERT INTO `project_shakers` (`id`, `project`, `maker`, `model`, `nominal_flow`, `movement`, `screens`, `active`) VALUES
(1, 1, 'lalal', 'lalala', 1, 'eliptico', 2, 0),
(2, 1, 'PANASONIC', 'KXP1150', 1, 'circular', 3, 0),
(3, 1, 'SALAMANDRA', '567654', 1, 'eliptico', 5, 0),
(4, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(5, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(6, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(7, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(8, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(9, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(10, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(11, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(12, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(13, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(14, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(15, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(16, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(17, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(18, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(19, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(20, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(21, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(22, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(23, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(24, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(25, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(26, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(27, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(28, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 0),
(29, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 0),
(30, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 0),
(31, 1, 'PANASONIC', '5654', 4.5, 'circular', 5, 1),
(32, 1, 'SALAMANDRA', 'KXP', 34.9, 'eliptico', 3, 1),
(33, 1, 'PANASONIC', 'L35', 3.2, 'lineal', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_tanks`
--

DROP TABLE IF EXISTS `project_tanks`;
CREATE TABLE IF NOT EXISTS `project_tanks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `sh_1` float DEFAULT NULL,
  `sa_1` float DEFAULT NULL,
  `sl_1` float DEFAULT NULL,
  `sh_2` float DEFAULT NULL,
  `sa_2` float DEFAULT NULL,
  `sl_2` float DEFAULT NULL,
  `diametro` float DEFAULT NULL,
  `agitators` int(11) DEFAULT NULL,
  `jets` int(11) DEFAULT NULL,
  `voltkaforo` float DEFAULT NULL,
  `hlibremax` float DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `project_tanks`
--

INSERT INTO `project_tanks` (`id`, `project`, `type`, `name`, `sh_1`, `sa_1`, `sl_1`, `sh_2`, `sa_2`, `sl_2`, `diametro`, `agitators`, `jets`, `voltkaforo`, `hlibremax`, `order`, `active`) VALUES
(1, 1, 1, 1, 100, 50, 50, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, 1, 1),
(2, 1, 1, 2, 10, 10, 20, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, 2, 0),
(3, 1, 4, 3, NULL, NULL, 0, NULL, NULL, NULL, 0, 3, 1, 0, NULL, 2, 1),
(4, 1, 4, 4, NULL, NULL, 0, NULL, NULL, NULL, 0, 2, 0, 0, NULL, 3, 0),
(7, 1, 1, 6, 15, 10, 20, NULL, NULL, NULL, NULL, 3, 0, 0, NULL, 3, 1),
(8, 1, 1, 15, 30, 20, 10, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactional_id` varchar(255) DEFAULT NULL COMMENT 'Este campo esta conformado por el id trasanccional del proyecto + el consecutivo del numero del reporte. Este id es el que va a enganchar la dependencia con las tablas hijas.',
  `project_transactional_id` varchar(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `generated` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `reports`
--

INSERT INTO `reports` (`id`, `transactional_id`, `project_transactional_id`, `date`, `number`, `generated`) VALUES
(1, 'FCKGW_qflrpt_1', 'FCKGW', '2012-09-05', 1, 0),
(5, 'FCKGW_qflrpt_2', 'FCKGW', '2012-09-06', 2, 0),
(6, 'FCKGW_qflrpt_3', 'FCKGW', '2012-09-07', 3, 0),
(7, 'FCKGW_qflrpt_4', 'FCKGW', '2012-09-08', 4, 0),
(8, 'FCKGW_qflrpt_5', 'FCKGW', '2012-09-09', 5, 0),
(9, 'FCKGW_qflrpt_6', 'FCKGW', '2012-09-10', 6, 0),
(10, 'FCKGW_qflrpt_7', 'FCKGW', '2012-09-11', 7, 0),
(11, 'YXRKT01_qflrpt_1', 'YXRKT01', '2012-09-06', 1, 0),
(12, 'YXRKT01_qflrpt_2', 'YXRKT01', '2012-09-07', 2, 0),
(13, 'YXRKT01_qflrpt_3', 'YXRKT01', '2012-09-08', 3, 0),
(14, 'FCKGW_qflrpt_8', 'FCKGW', '2012-09-12', 8, 0),
(15, 'QWERTY_qflrpt_1', 'QWERTY', '2012-09-11', 1, 0),
(16, 'FCKGW_qflrpt_9', 'FCKGW', '2012-09-13', 9, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tanks_types`
--

DROP TABLE IF EXISTS `tanks_types`;
CREATE TABLE IF NOT EXISTS `tanks_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tanks_types`
--

INSERT INTO `tanks_types` (`id`, `name`) VALUES
(1, 'Square'),
(2, 'Bottom Half Cylinder'),
(3, 'Trailer'),
(4, 'Horizontal Cylinder');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tank_names`
--

DROP TABLE IF EXISTS `tank_names`;
CREATE TABLE IF NOT EXISTS `tank_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `tank_names`
--

INSERT INTO `tank_names` (`id`, `name`, `type`) VALUES
(1, 'Trip tank', 'active'),
(2, 'Sand trap', 'active'),
(3, 'Return 1', 'active'),
(4, 'Return 2', 'active'),
(5, 'Return 3', 'active'),
(6, 'Intermediate 1', 'active'),
(7, 'Intermediate 2', 'active'),
(8, 'Intermediate 3', 'active'),
(9, 'Suction 1', 'active'),
(10, 'Suction 2', 'active'),
(11, 'Suction 3', 'active'),
(12, 'Pill 1', 'active'),
(13, 'Pill 2', 'active'),
(14, 'Pill 3', 'active'),
(15, 'Reserve 1', 'reserve'),
(16, 'Reserve 2', 'reserve'),
(17, 'Reserve 3', 'reserve'),
(18, 'Reserve 4', 'reserve'),
(19, 'Reserve 5', 'reserve'),
(20, 'Reserve 6', 'reserve'),
(21, 'Sharing tank 1', 'reserve'),
(22, 'Sharing tank 2', 'reserve'),
(23, 'Sharing tank 3', 'reserve'),
(24, 'Sharing tank 4', 'reserve'),
(25, 'Sharing tank 5', 'reserve'),
(26, 'Sharing tank 6', 'reserve'),
(27, 'Frack tank 1', 'reserve'),
(28, 'Frack tank 2', 'reserve'),
(29, 'Frack tank 3', 'reserve'),
(30, 'Frack tank 4', 'reserve'),
(31, 'Frack tank 5', 'reserve'),
(32, 'Frack tank 6', 'reserve');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_brocas`
--
DROP VIEW IF EXISTS `vista_brocas`;
CREATE TABLE IF NOT EXISTS `vista_brocas` (
`id` int(11)
,`id_broca` int(255)
,`odfracc` varchar(255)
,`unit_oddfracc` varchar(255)
,`odddeci` float
,`unit_odddeci` varchar(255)
,`length` float
,`unit_length` varchar(255)
,`nombre_modelo` varchar(255)
,`nombre_broca` varchar(255)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_personal`
--
DROP VIEW IF EXISTS `vista_personal`;
CREATE TABLE IF NOT EXISTS `vista_personal` (
`id` int(11)
,`identification` varchar(255)
,`lastname` varchar(255)
,`name` varchar(255)
,`project` int(11)
,`category` int(11)
,`category_name` varchar(255)
,`type` varchar(255)
,`active` int(11)
,`rate` float
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_tanks`
--
DROP VIEW IF EXISTS `vista_tanks`;
CREATE TABLE IF NOT EXISTS `vista_tanks` (
`id` int(11)
,`project` int(11)
,`type` int(11)
,`name` int(11)
,`sh_1` float
,`sa_1` float
,`sl_1` float
,`sh_2` float
,`sa_2` float
,`sl_2` float
,`diametro` float
,`agitators` int(11)
,`jets` int(11)
,`voltkaforo` float
,`hlibremax` float
,`active` int(11)
,`tank_name` varchar(255)
,`tank_type` varchar(255)
,`tank_category` varchar(255)
,`order` int(11)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vista_brocas`
--
DROP TABLE IF EXISTS `vista_brocas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_brocas` AS select `brocas_modelos`.`id` AS `id`,`brocas_modelos`.`id_broca` AS `id_broca`,`brocas_modelos`.`odfracc` AS `odfracc`,`brocas_modelos`.`unit_oddfracc` AS `unit_oddfracc`,`brocas_modelos`.`odddeci` AS `odddeci`,`brocas_modelos`.`unit_odddeci` AS `unit_odddeci`,`brocas_modelos`.`length` AS `length`,`brocas_modelos`.`unit_length` AS `unit_length`,`brocas_modelos`.`nombre_modelo` AS `nombre_modelo`,`brocas`.`nombre_broca` AS `nombre_broca` from (`brocas` join `brocas_modelos` on((`brocas`.`id` = `brocas_modelos`.`id_broca`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_personal`
--
DROP TABLE IF EXISTS `vista_personal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_personal` AS select `personal`.`id` AS `id`,`personal`.`identification` AS `identification`,`personal`.`lastname` AS `lastname`,`personal`.`name` AS `name`,`personal`.`project` AS `project`,`personal`.`category` AS `category`,`personal_categories`.`name` AS `category_name`,`personal_categories`.`type` AS `type`,`personal`.`active` AS `active`,`personal`.`rate` AS `rate` from (`personal` join `personal_categories` on((`personal_categories`.`id` = `personal`.`category`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_tanks`
--
DROP TABLE IF EXISTS `vista_tanks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_tanks` AS select `project_tanks`.`id` AS `id`,`project_tanks`.`project` AS `project`,`project_tanks`.`type` AS `type`,`project_tanks`.`name` AS `name`,`project_tanks`.`sh_1` AS `sh_1`,`project_tanks`.`sa_1` AS `sa_1`,`project_tanks`.`sl_1` AS `sl_1`,`project_tanks`.`sh_2` AS `sh_2`,`project_tanks`.`sa_2` AS `sa_2`,`project_tanks`.`sl_2` AS `sl_2`,`project_tanks`.`diametro` AS `diametro`,`project_tanks`.`agitators` AS `agitators`,`project_tanks`.`jets` AS `jets`,`project_tanks`.`voltkaforo` AS `voltkaforo`,`project_tanks`.`hlibremax` AS `hlibremax`,`project_tanks`.`active` AS `active`,`tank_names`.`name` AS `tank_name`,`tanks_types`.`name` AS `tank_type`,`tank_names`.`type` AS `tank_category`,`project_tanks`.`order` AS `order` from ((`project_tanks` left join `tank_names` on((`tank_names`.`id` = `project_tanks`.`name`))) left join `tanks_types` on((`tanks_types`.`id` = `project_tanks`.`type`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
