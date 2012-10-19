/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : qfluids

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-10-19 15:05:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bombas`
-- ----------------------------
DROP TABLE IF EXISTS `bombas`;
CREATE TABLE `bombas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maker` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `strokelength` float DEFAULT NULL,
  `strokelength_unit` varchar(255) DEFAULT NULL,
  `linerdiameter` float DEFAULT NULL,
  `linerdiameter_unit` varchar(255) DEFAULT NULL,
  `rod` float DEFAULT NULL,
  `rod_unit` varchar(255) DEFAULT 'in',
  `presion` float DEFAULT NULL,
  `presion_unit` varchar(255) DEFAULT 'psi',
  `max_spm` float DEFAULT NULL,
  `strokefrac` varchar(255) DEFAULT NULL,
  `strokefrac_unit` varchar(255) DEFAULT 'in',
  `linerdiameter_frac` varchar(255) DEFAULT NULL,
  `linerdiameterfrac_unit` varchar(255) DEFAULT NULL,
  `rodfrac` varchar(255) DEFAULT NULL,
  `rodfrac_unit` varchar(255) DEFAULT 'in',
  `custom` int(1) DEFAULT '1',
  `active` int(1) DEFAULT '1',
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bombas
-- ----------------------------
INSERT INTO `bombas` VALUES ('1', 'Continental ', 'DUPLEX', 'D-225', '12', 'in', '7', 'in', '1.875', 'in', '607', 'psi', '80', '12', 'in', '7', 'in', '1 7/8', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('2', 'Continental ', 'DUPLEX', 'D-225', '12', 'in', '6', 'in', '1.875', 'in', '838', 'psi', '80', '12', 'in', '6', 'in', '1 7/8', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('3', 'Continental ', 'DUPLEX', 'D-225', '12', 'in', '5.5', 'in', '1.875', 'in', '1007', 'psi', '80', '12', 'in', '5 1/2', 'in', '1 7/8', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('4', 'Continental ', 'DUPLEX', 'D-225', '12', 'in', '4.5', 'in', '1.875', 'in', '1551', 'psi', '80', '12', 'in', '4 1/2', 'in', '1 7/8', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('5', 'Continental ', 'DUPLEX', 'D-225', '12', 'in', '6.5', 'in', '1.875', 'in', '708', 'psi', '80', '12', 'in', '6 1/2', 'in', '1 7/8', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('6', 'Continental ', 'DUPLEX', 'D-375', '14', 'in', '7.5', 'in', '2', 'in', '755', 'psi', '80', '14', 'in', '7 1/2', 'in', '2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('7', 'Continental ', 'DUPLEX', 'D-375', '14', 'in', '7', 'in', '2', 'in', '871', 'psi', '80', '14', 'in', '7', 'in', '2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('8', 'Continental ', 'DUPLEX', 'D-375', '14', 'in', '6', 'in', '2', 'in', '1204', 'psi', '80', '14', 'in', '6', 'in', '2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('9', 'Continental ', 'DUPLEX', 'D-375', '14', 'in', '5', 'in', '2', 'in', '1777', 'psi', '80', '14', 'in', '5', 'in', '2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('10', 'Continental ', 'DUPLEX', 'DB-550', '16', 'in', '7.5', 'in', '2.5', 'in', '1067', 'psi', '70', '16', 'in', '7 1/2', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('11', 'Continental ', 'DUPLEX', 'DB-550', '16', 'in', '7', 'in', '2.5', 'in', '1235', 'psi', '70', '16', 'in', '7', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('12', 'Continental ', 'DUPLEX', 'DB-550', '16', 'in', '6', 'in', '2.5', 'in', '1727', 'psi', '70', '16', 'in', '6', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('13', 'Continental ', 'DUPLEX', 'DB-550', '16', 'in', '5', 'in', '2.5', 'in', '2590', 'psi', '70', '16', 'in', '5', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('14', 'Continental ', 'DUPLEX', 'DC-1000', '18', 'in', '7.5', 'in', '3', 'in', '1917', 'psi', '65', '18', 'in', '7 1/2', 'in', '3', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('15', 'Continental ', 'DUPLEX', 'DC-1000', '18', 'in', '7', 'in', '3', 'in', '2229', 'psi', '65', '18', 'in', '7', 'in', '3', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('16', 'Continental ', 'DUPLEX', 'DC-1000', '18', 'in', '6.5', 'in', '3', 'in', '2635', 'psi', '65', '18', 'in', '6 1/2', 'in', '3', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('17', 'Continental ', 'DUPLEX', 'DC-1000', '18', 'in', '6', 'in', '3', 'in', '3153', 'psi', '65', '18', 'in', '6', 'in', '3', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('18', 'Continental ', 'DUPLEX', 'DC-1350', '18', 'in', '7.5', 'in', '3.5', 'in', '2669', 'psi', '65', '18', 'in', '7 1/2', 'in', '3 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('19', 'Continental ', 'DUPLEX', 'DC-1350', '18', 'in', '7', 'in', '3.5', 'in', '3123', 'psi', '65', '18', 'in', '7', 'in', '3 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('20', 'Continental ', 'DUPLEX', 'DC-1350', '18', 'in', '6.5', 'in', '3.5', 'in', '3706', 'psi', '65', '18', 'in', '6 1/2', 'in', '3 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('21', 'Continental ', 'DUPLEX', 'DC-1350', '18', 'in', '6', 'in', '3.5', 'in', '4474', 'psi', '65', '18', 'in', '6', 'in', '3 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('22', 'Continental ', 'DUPLEX', 'DC-1650', '18', 'in', '7.5', 'in', '3.5', 'in', '3262', 'psi', '65', '18', 'in', '7 1/2', 'in', '3 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('23', 'Continental ', 'DUPLEX', 'DC-1650', '18', 'in', '7', 'in', '3.5', 'in', '3817', 'psi', '65', '18', 'in', '7', 'in', '3 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('24', 'Continental ', 'DUPLEX', 'DC-1650', '18', 'in', '6.5', 'in', '3.5', 'in', '4530', 'psi', '65', '18', 'in', '6 1/2', 'in', '3 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('25', 'Continental ', 'DUPLEX', 'DC-1650', '18', 'in', '6', 'in', '3.5', 'in', '5000', 'psi', '65', '18', 'in', '6', 'in', '3 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('26', 'Continental ', 'DUPLEX', 'DC-700', '16', 'in', '7.5', 'in', '2.75', 'in', '1374', 'psi', '70', '16', 'in', '7 1/2', 'in', '2 3/4', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('27', 'Continental ', 'DUPLEX', 'DC-700', '16', 'in', '6.5', 'in', '2.75', 'in', '1875', 'psi', '70', '16', 'in', '6 1/2', 'in', '2 3/4', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('28', 'Continental ', 'DUPLEX', 'DC-700', '16', 'in', '6', 'in', '2.75', 'in', '2236', 'psi', '70', '16', 'in', '6', 'in', '2 3/4', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('29', 'Continental ', 'DUPLEX', 'DC-700', '16', 'in', '5.5', 'in', '2.75', 'in', '2727', 'psi', '70', '16', 'in', '5 1/2', 'in', '2 3/4', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('30', 'Continental ', 'TRIPLEX', 'F-1000', '10', 'in', '6.5', 'in', null, '', '2558', 'psi', '150', '10', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('31', 'Continental ', 'TRIPLEX', 'F-1000', '10', 'in', '6', 'in', null, '', '3010', 'psi', '150', '10', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('32', 'Continental ', 'TRIPLEX', 'F-1000', '10', 'in', '5', 'in', null, '', '4330', 'psi', '150', '10', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('33', 'Continental ', 'TRIPLEX', 'F-1000', '10', 'in', '4.5', 'in', null, '', '5000', 'psi', '150', '10', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('34', 'Continental ', 'TRIPLEX', 'F-350', '7', 'in', '6.5', 'in', null, '', '1020', 'psi', '175', '7', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('35', 'Continental ', 'TRIPLEX', 'F-350', '7', 'in', '6', 'in', null, '', '1200', 'psi', '175', '7', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('36', 'Continental ', 'TRIPLEX', 'F-350', '7', 'in', '5', 'in', null, '', '1730', 'psi', '175', '7', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('37', 'Continental ', 'TRIPLEX', 'F-350', '7', 'in', '4', 'in', null, '', '2705', 'psi', '175', '7', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('38', 'Continental ', 'TRIPLEX', 'F-500', '7.5', 'in', '6.5', 'in', null, '', '1447', 'psi', '175', '7 1/2', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('39', 'Continental ', 'TRIPLEX', 'F-500', '7.5', 'in', '6', 'in', null, '', '1689', 'psi', '175', '7 1/2', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('40', 'Continental ', 'TRIPLEX', 'F-500', '7.5', 'in', '5', 'in', null, '', '2440', 'psi', '175', '7 1/2', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('41', 'Continental ', 'TRIPLEX', 'F-500', '7.5', 'in', '4', 'in', null, '', '3818', 'psi', '175', '7 1/2', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('42', 'Continental ', 'TRIPLEX', 'F-650', '8', 'in', '6.5', 'in', null, '', '1816', 'psi', '175', '8', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('43', 'Continental ', 'TRIPLEX', 'F-650', '8', 'in', '6', 'in', null, '', '2128', 'psi', '175', '8', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('44', 'Continental ', 'TRIPLEX', 'F-650', '8', 'in', '5', 'in', null, '', '3070', 'psi', '175', '8', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('45', 'Continental ', 'TRIPLEX', 'F-650', '8', 'in', '4', 'in', null, '', '4820', 'psi', '175', '8', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('46', 'Continental ', 'TRIPLEX', 'F-800', '9', 'in', '6.5', 'in', null, '', '2120', 'psi', '160', '9', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('47', 'Continental ', 'TRIPLEX', 'F-800', '9', 'in', '6', 'in', null, '', '2490', 'psi', '160', '9', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('48', 'Continental ', 'TRIPLEX', 'F-800', '9', 'in', '5', 'in', null, '', '3590', 'psi', '160', '9', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('49', 'Continental ', 'TRIPLEX', 'F-800', '9', 'in', '4.5', 'in', null, '', '4415', 'psi', '160', '9', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('50', 'Continental ', 'TRIPLEX', 'FB-1300', '12', 'in', '7', 'in', null, '', '2789', 'psi', '130', '12', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('51', 'Continental ', 'TRIPLEX', 'FB-1300', '12', 'in', '6.5', 'in', null, '', '3234', 'psi', '130', '12', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('52', 'Continental ', 'TRIPLEX', 'FB-1300', '12', 'in', '6', 'in', null, '', '3791', 'psi', '130', '12', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('53', 'Continental ', 'TRIPLEX', 'FB-1300', '12', 'in', '5.5', 'in', null, '', '4516', 'psi', '130', '12', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('54', 'Continental ', 'TRIPLEX', 'FB-1600', '12', 'in', '7', 'in', null, '', '3423', 'psi', '130', '12', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('55', 'Continental ', 'TRIPLEX', 'FB-1600', '12', 'in', '6.5', 'in', null, '', '3981', 'psi', '130', '12', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('56', 'Continental ', 'TRIPLEX', 'FB-1600', '12', 'in', '6', 'in', null, '', '4665', 'psi', '130', '12', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('57', 'Continental ', 'TRIPLEX', 'FB-1600', '12', 'in', '5.5', 'in', null, '', '5000', 'psi', '130', '12', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('58', 'Gardner ', 'DUPLEX', 'FXT', '16', 'in', '7.25', 'in', '2.5', 'in', '1563', 'psi', '65', '16', 'in', '7 1/4', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('59', 'Gardner ', 'DUPLEX', 'FXT', '16', 'in', '7', 'in', '2.5', 'in', '1684', 'psi', '65', '16', 'in', '7', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('60', 'Gardner ', 'DUPLEX', 'FXT', '16', 'in', '6.5', 'in', '2.5', 'in', '1976', 'psi', '65', '16', 'in', '6 1/2', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('61', 'Gardner ', 'DUPLEX', 'FXT', '16', 'in', '6', 'in', '2.5', 'in', '2350', 'psi', '65', '16', 'in', '6', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('62', 'Gardner ', 'DUPLEX', 'FXT', '16', 'in', '5.5', 'in', '2.5', 'in', '2846', 'psi', '65', '16', 'in', '5 1/2', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('63', 'Gardner ', 'DUPLEX', 'FXT', '16', 'in', '5', 'in', '2.5', 'in', '3536', 'psi', '65', '16', 'in', '5', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('64', 'Gardner ', 'DUPLEX', 'FXT', '16', 'in', '4.5', 'in', '2.5', 'in', '4515', 'psi', '65', '16', 'in', '4 1/2', 'in', '2 1/2', 'in', '0', '1', '1');
INSERT INTO `bombas` VALUES ('65', 'Gardner ', 'TRIPLEX', 'PAHC', '8', 'in', '4.5', 'in', null, '', '1386', 'psi', '175', '8', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('66', 'Gardner ', 'TRIPLEX', 'PAHC', '8', 'in', '3.5', 'in', null, '', '2290', 'psi', '175', '8', 'in', '3 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('67', 'Gardner ', 'TRIPLEX', 'PAHC', '8', 'in', '3.25', 'in', null, '', '2657', 'psi', '175', '8', 'in', '3 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('68', 'Gardner ', 'TRIPLEX', 'PAHD', '8', 'in', '5', 'in', null, '', '1122', 'psi', '175', '8', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('69', 'Gardner ', 'TRIPLEX', 'PAHD', '8', 'in', '4.5', 'in', null, '', '1386', 'psi', '175', '8', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('70', 'Gardner ', 'TRIPLEX', 'PAHD', '8', 'in', '4', 'in', null, '', '1753', 'psi', '175', '8', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('71', 'Gardner ', 'TRIPLEX', 'PXL', '11', 'in', '6.5', 'in', null, '', '5660', 'psi', '115', '11', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('72', 'Gardner ', 'TRIPLEX', 'PXL', '11', 'in', '6', 'in', null, '', '6645', 'psi', '115', '11', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('73', 'Gardner ', 'TRIPLEX', 'PXL', '11', 'in', '5.5', 'in', null, '', '7500', 'psi', '115', '11', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('74', 'Gardner ', 'TRIPLEX', 'PXL', '11', 'in', '5', 'in', null, '', '7500', 'psi', '115', '11', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('75', 'Gardner ', 'TRIPLEX', 'PXL', '11', 'in', '7', 'in', null, '', '4880', 'psi', '115', '11', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('76', 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', '7', 'in', '6', 'in', null, '', '2277', 'psi', '145', '7', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('77', 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', '7', 'in', '7', 'in', null, '', '1673', 'psi', '145', '7', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('78', 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', '7', 'in', '6.5', 'in', null, '', '1940', 'psi', '145', '7', 'in', '6,5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('79', 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', '7', 'in', '5', 'in', null, '', '3279', 'psi', '145', '7', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('80', 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', '7', 'in', '5.5', 'in', null, '', '2710', 'psi', '145', '7', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('81', 'Gardner ', 'TRIPLEX', 'PZG (PZ-7)', '7', 'in', '4.5', 'in', null, '', '4048', 'psi', '145', '7', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('82', 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', '8', 'in', '7', 'in', null, '', '1996', 'psi', '145', '8', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('83', 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', '8', 'in', '6.5', 'in', null, '', '2315', 'psi', '145', '8', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('84', 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', '8', 'in', '6.25', 'in', null, '', '2504', 'psi', '145', '8', 'in', '6 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('85', 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', '8', 'in', '6', 'in', null, '', '2717', 'psi', '145', '8', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('86', 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', '8', 'in', '5.5', 'in', null, '', '3233', 'psi', '145', '8', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('87', 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', '8', 'in', '4.5', 'in', null, '', '4830', 'psi', '145', '8', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('88', 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', '8', 'in', '4', 'in', null, '', '5000', 'psi', '145', '8', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('89', 'Gardner ', 'TRIPLEX', 'PZH (PZ-8)', '8', 'in', '5', 'in', null, '', '3912', 'psi', '145', '8', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('90', 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', '9', 'in', '6.5', 'in', null, '', '3060', 'psi', '130', '9', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('91', 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', '9', 'in', '7', 'in', null, '', '2639', 'psi', '130', '9', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('92', 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', '9', 'in', '6.25', 'in', null, '', '3310', 'psi', '130', '9', 'in', '6 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('93', 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', '9', 'in', '6', 'in', null, '', '3592', 'psi', '130', '9', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('94', 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', '9', 'in', '5.5', 'in', null, '', '4274', 'psi', '130', '9', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('95', 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', '9', 'in', '5', 'in', null, '', '5000', 'psi', '130', '9', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('96', 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', '9', 'in', '4.5', 'in', null, '', '5000', 'psi', '130', '9', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('97', 'Gardner ', 'TRIPLEX', 'PZJ (PZ-9)', '9', 'in', '4', 'in', null, '', '5000', 'psi', '130', '9', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('98', 'Gardner ', 'TRIPLEX', 'PZK (PZ-10)', '10', 'in', '7', 'in', null, '', '3624', 'psi', '115', '10', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('99', 'Gardner ', 'TRIPLEX', 'PZK (PZ-10)', '10', 'in', '6.5', 'in', null, '', '4203', 'psi', '115', '10', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('100', 'Gardner ', 'TRIPLEX', 'PZK (PZ-10)', '10', 'in', '5.5', 'in', null, '', '5000', 'psi', '115', '10', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('101', 'Gardner ', 'TRIPLEX', 'PZK (PZ-10)', '10', 'in', '6', 'in', null, '', '4933', 'psi', '115', '10', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('102', 'Gardner ', 'TRIPLEX', 'PZL (PZ-11)', '11', 'in', '7', 'in', null, '', '3905', 'psi', '115', '11', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('103', 'Gardner ', 'TRIPLEX', 'PZL (PZ-11)', '11', 'in', '6.5', 'in', null, '', '4529', 'psi', '115', '11', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('104', 'Gardner ', 'TRIPLEX', 'PZL (PZ-11)', '11', 'in', '6', 'in', null, '', '5000', 'psi', '115', '11', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('105', 'Gardner ', 'TRIPLEX', 'PZL (PZ-11)', '11', 'in', '5.5', 'in', null, '', '5000', 'psi', '115', '11', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('106', 'Gardner ', 'TRIPLEX', 'THE', '5', 'in', '4', 'in', null, '', '3600', 'psi', '300', '5', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('107', 'National', 'TRIPLEX', '10-P-130', '10', 'in', '6.75', 'in', null, '', '3085', 'psi', '140', '10', 'in', '6 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('108', 'National', 'TRIPLEX', '10-P-130', '10', 'in', '6.5', 'in', null, '', '3325', 'psi', '140', '10', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('109', 'National', 'TRIPLEX', '10-P-130', '10', 'in', '6.25', 'in', null, '', '3595', 'psi', '140', '10', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('110', 'National', 'TRIPLEX', '10-P-130', '10', 'in', '6', 'in', null, '', '3900', 'psi', '140', '10', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('111', 'National', 'TRIPLEX', '10-P-130', '10', 'in', '5.5', 'in', null, '', '4645', 'psi', '140', '10', 'in', '5,5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('112', 'National', 'TRIPLEX', '10-P-130', '10', 'in', '5', 'in', null, '', '5000', 'psi', '140', '10', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('113', 'National', 'TRIPLEX', '10-P-130', '10', 'in', '4.5', 'in', null, '', '5000', 'psi', '140', '10', 'in', '4,5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('114', 'National', 'TRIPLEX', '10-P-130', '10', 'in', '4', 'in', null, '', '5000', 'psi', '140', '10', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('115', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '7.25', 'in', null, '', '3200', 'psi', '120', '12', 'in', '7 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('116', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '6', 'in', null, '', '4670', 'psi', '120', '12', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('117', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '6.25', 'in', null, '', '4305', 'psi', '120', '12', 'in', '6 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('118', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '5.75', 'in', null, '', '5085', 'psi', '120', '12', 'in', '5 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('119', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '4.5', 'in', null, '', '6720', 'psi', '120', '12', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('120', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '5.5', 'in', null, '', '5555', 'psi', '120', '12', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('121', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '6.75', 'in', null, '', '3690', 'psi', '120', '12', 'in', '7 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('122', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '5', 'in', null, '', '6720', 'psi', '120', '12', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('123', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '7', 'in', null, '', '3430', 'psi', '120', '12', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('124', 'National', 'TRIPLEX', '12-P-160', '12', 'in', '6.5', 'in', null, '', '3980', 'psi', '120', '12', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('125', 'National', 'TRIPLEX', '14-P-220', '14', 'in', '9', 'in', null, '', '2795', 'psi', '105', '14', 'in', '9', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('126', 'National', 'TRIPLEX', '14-P-220', '14', 'in', '5.5', 'in', null, '', '7475', 'psi', '105', '14', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('127', 'National', 'TRIPLEX', '14-P-220', '14', 'in', '6.5', 'in', null, '', '5360', 'psi', '105', '14', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('128', 'National', 'TRIPLEX', '14-P-220', '14', 'in', '7', 'in', null, '', '4615', 'psi', '105', '14', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('129', 'National', 'TRIPLEX', '14-P-220', '14', 'in', '7.5', 'in', null, '', '4025', 'psi', '105', '14', 'in', '7 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('130', 'National', 'TRIPLEX', '14-P-220', '14', 'in', '8', 'in', null, '', '3535', 'psi', '105', '14', 'in', '8', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('131', 'National', 'TRIPLEX', '14-P-220', '14', 'in', '5', 'in', null, '', '7500', 'psi', '105', '14', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('132', 'National', 'TRIPLEX', '14-P-220', '14', 'in', '6', 'in', null, '', '6285', 'psi', '105', '14', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('133', 'National', 'TRIPLEX', '8-P-80', '8.5', 'in', '5.5', 'in', null, '', '2940', 'psi', '160', '8 1/2', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('134', 'National', 'TRIPLEX', '8-P-80', '8.5', 'in', '4', 'in', null, '', '5000', 'psi', '160', '8 1/2', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('135', 'National', 'TRIPLEX', '8-P-80', '8.5', 'in', '6', 'in', null, '', '2470', 'psi', '160', '8 1/2', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('136', 'National', 'TRIPLEX', '8-P-80', '8.5', 'in', '5', 'in', null, '', '3560', 'psi', '160', '8 1/2', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('137', 'National', 'TRIPLEX', '8-P-80', '8.5', 'in', '4.5', 'in', null, '', '4395', 'psi', '160', '8 1/2', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('138', 'National', 'TRIPLEX', '8-P-80', '8.5', 'in', '6.25', 'in', null, '', '2280', 'psi', '160', '8 1/2', 'in', '6 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('139', 'National', 'TRIPLEX', '9-P-100', '9.25', 'in', '6.5', 'in', null, '', '2580', 'psi', '150', '9 1/4', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('140', 'National', 'TRIPLEX', '9-P-100', '9.25', 'in', '6', 'in', null, '', '3030', 'psi', '150', '9 1/4', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('141', 'National', 'TRIPLEX', '9-P-100', '9.25', 'in', '4', 'in', null, '', '5000', 'psi', '150', '9 1/4', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('142', 'National', 'TRIPLEX', '9-P-100', '9.25', 'in', '5.5', 'in', null, '', '3605', 'psi', '150', '9 1/4', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('143', 'National', 'TRIPLEX', '9-P-100', '9.25', 'in', '4.5', 'in', null, '', '5000', 'psi', '150', '9 1/4', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('144', 'National', 'TRIPLEX', '9-P-100', '9.25', 'in', '6.75', 'in', null, '', '2395', 'psi', '150', '9 1/4', 'in', '6 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('145', 'National', 'TRIPLEX', '9-P-100', '9.25', 'in', '5', 'in', null, '', '4360', 'psi', '150', '9 1/4', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('146', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '5.5', 'in', null, '', '3575', 'psi', '140', '10', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('147', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '5', 'in', null, '', '4330', 'psi', '140', '10', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('148', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '4.5', 'in', null, '', '5000', 'psi', '140', '10', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('149', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '5.25', 'in', null, '', '3920', 'psi', '140', '10', 'in', '5 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('150', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '6.5', 'in', null, '', '2558', 'psi', '140', '10', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('151', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '6', 'in', null, '', '3010', 'psi', '140', '10', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('152', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '6.25', 'in', null, '', '2770', 'psi', '140', '10', 'in', '6 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('153', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '5.75', 'in', null, '', '3270', 'psi', '140', '10', 'in', '5 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('154', 'National', 'TRIPLEX', 'FD-1000', '10', 'in', '6.75', 'in', null, '', '2370', 'psi', '140', '10', 'in', '6 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('155', 'National', 'TRIPLEX', 'FD-1600', '12', 'in', '5', 'in', null, '', '5001', 'psi', '120', '12', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('156', 'National', 'TRIPLEX', 'FD-1600', '12', 'in', '6', 'in', null, '', '4665', 'psi', '120', '12', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('157', 'National', 'TRIPLEX', 'FD-1600', '12', 'in', '5.5', 'in', null, '', '5000', 'psi', '120', '12', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('158', 'National', 'TRIPLEX', 'FD-1600', '12', 'in', '7', 'in', null, '', '3423', 'psi', '120', '12', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('159', 'National', 'TRIPLEX', 'FD-1600', '12', 'in', '6.75', 'in', null, '', '3688', 'psi', '120', '12', 'in', '6 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('160', 'National', 'TRIPLEX', 'FD-1600', '12', 'in', '6.5', 'in', null, '', '3981', 'psi', '120', '12', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('161', 'National', 'TRIPLEX', 'FD-500', '7.5', 'in', '4', 'in', null, '', '3818', 'psi', '150', '7 1/2', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('162', 'National', 'TRIPLEX', 'FD-500', '7.5', 'in', '5', 'in', null, '', '2440', 'psi', '150', '7 1/2', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('163', 'National', 'TRIPLEX', 'FD-500', '7.5', 'in', '6.25', 'in', null, '', '1565', 'psi', '150', '7 1/2', 'in', '6 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('164', 'National', 'TRIPLEX', 'FD-500', '7.5', 'in', '6.5', 'in', null, '', '1447', 'psi', '150', '7 1/2', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('165', 'National', 'TRIPLEX', 'FD-500', '7.5', 'in', '6.75', 'in', null, '', '1341', 'psi', '150', '7 1/2', 'in', '6 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('166', 'National', 'TRIPLEX', 'FD-500', '7.5', 'in', '6', 'in', null, '', '1699', 'psi', '150', '7 1/2', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('167', 'National', 'TRIPLEX', 'FD-500', '7.5', 'in', '5.5', 'in', null, '', '2024', 'psi', '150', '7 1/2', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('168', 'National', 'TRIPLEX', 'FD-500', '7.5', 'in', '4.5', 'in', null, '', '3025', 'psi', '150', '7 1/2', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('169', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '6.5', 'in', null, '', '2120', 'psi', '150', '9', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('170', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '5.75', 'in', null, '', '2715', 'psi', '150', '9', 'in', '5 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('171', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '4', 'in', null, '', '5000', 'psi', '150', '9', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('172', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '6.75', 'in', null, '', '1968', 'psi', '150', '9', 'in', '6 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('173', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '5.25', 'in', null, '', '3260', 'psi', '150', '9', 'in', '5 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('174', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '6.25', 'in', null, '', '2295', 'psi', '150', '9', 'in', '6 1/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('175', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '5.5', 'in', null, '', '2965', 'psi', '150', '9', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('176', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '6', 'in', null, '', '2490', 'psi', '150', '9', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('177', 'National', 'TRIPLEX', 'FD-800', '9', 'in', '5', 'in', null, '', '3590', 'psi', '150', '9', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('178', 'Oilwell', 'TRIPLEX', 'A1400-PT', '10', 'in', '5', 'in', null, '', '5000', 'psi', '150', '10', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('179', 'Oilwell', 'TRIPLEX', 'A1400-PT', '10', 'in', '5.5', 'in', null, '', '4723', 'psi', '150', '10', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('180', 'Oilwell', 'TRIPLEX', 'A1400-PT', '10', 'in', '6', 'in', null, '', '3968', 'psi', '150', '10', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('181', 'Oilwell', 'TRIPLEX', 'A1400-PT', '10', 'in', '6.5', 'in', null, '', '3381', 'psi', '150', '10', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('182', 'Oilwell', 'TRIPLEX', 'A1400-PT', '10', 'in', '7', 'in', null, '', '2915', 'psi', '150', '10', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('183', 'Oilwell', 'TRIPLEX', 'A1400-PT', '10', 'in', '7.5', 'in', null, '', '2540', 'psi', '150', '10', 'in', '7 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('184', 'Oilwell', 'TRIPLEX', 'A1700-PT', '12', 'in', '5', 'in', null, '', '5000', 'psi', '150', '12', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('185', 'Oilwell', 'TRIPLEX', 'A1700-PT', '12', 'in', '5.5', 'in', null, '', '4723', 'psi', '150', '12', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('186', 'Oilwell', 'TRIPLEX', 'A1700-PT', '12', 'in', '6', 'in', null, '', '3968', 'psi', '150', '12', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('187', 'Oilwell', 'TRIPLEX', 'A1700-PT', '12', 'in', '6.5', 'in', null, '', '3381', 'psi', '150', '12', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('188', 'Oilwell', 'TRIPLEX', 'A1700-PT', '12', 'in', '7', 'in', null, '', '2915', 'psi', '150', '12', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('189', 'Oilwell', 'TRIPLEX', 'A1700-PT', '12', 'in', '7.5', 'in', null, '', '2540', 'psi', '150', '12', 'in', '7 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('190', 'Oilwell', 'TRIPLEX', 'A400-PT', '8', 'in', '4', 'in', null, '', '2701', 'psi', '175', '8', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('191', 'Oilwell', 'TRIPLEX', 'A400-PT', '8', 'in', '4.5', 'in', null, '', '2134', 'psi', '175', '8', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('192', 'Oilwell', 'TRIPLEX', 'A400-PT', '8', 'in', '5', 'in', null, '', '1729', 'psi', '175', '8', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('193', 'Oilwell', 'TRIPLEX', 'A400-PT', '8', 'in', '5.5', 'in', null, '', '1429', 'psi', '175', '8', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('194', 'Oilwell', 'TRIPLEX', 'A400-PT', '8', 'in', '5.75', 'in', null, '', '1307', 'psi', '175', '8', 'in', '5 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('195', 'Oilwell', 'TRIPLEX', 'A400-PT', '8', 'in', '6', 'in', null, '', '1200', 'psi', '175', '8', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('196', 'Oilwell', 'TRIPLEX', 'A400-PT', '8', 'in', '6.5', 'in', null, '', '1023', 'psi', '175', '8', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('197', 'Oilwell', 'TRIPLEX', 'A400-PT', '8', 'in', '7', 'in', null, '', '882', 'psi', '175', '8', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('198', 'Oilwell', 'TRIPLEX', 'A600-PT', '8', 'in', '4', 'in', null, '', '4058', 'psi', '175', '8', 'in', '4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('199', 'Oilwell', 'TRIPLEX', 'A600-PT', '8', 'in', '4.5', 'in', null, '', '3207', 'psi', '175', '8', 'in', '4 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('200', 'Oilwell', 'TRIPLEX', 'A600-PT', '8', 'in', '5', 'in', null, '', '2597', 'psi', '175', '8', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('201', 'Oilwell', 'TRIPLEX', 'A600-PT', '8', 'in', '5.5', 'in', null, '', '2147', 'psi', '175', '8', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('202', 'Oilwell', 'TRIPLEX', 'A600-PT', '8', 'in', '5.75', 'in', null, '', '1964', 'psi', '175', '8', 'in', '5 3/4', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('203', 'Oilwell', 'TRIPLEX', 'A600-PT', '8', 'in', '6', 'in', null, '', '1804', 'psi', '175', '8', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('204', 'Oilwell', 'TRIPLEX', 'A600-PT', '8', 'in', '6.5', 'in', null, '', '1537', 'psi', '175', '8', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('205', 'Oilwell', 'TRIPLEX', 'A600-PT', '8', 'in', '7', 'in', null, '', '1325', 'psi', '175', '8', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('206', 'Oilwell', 'TRIPLEX', 'B1100-PT', '9', 'in', '5', 'in', null, '', '4482', 'psi', '150', '9', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('207', 'Oilwell', 'TRIPLEX', 'B1100-PT', '9', 'in', '5.5', 'in', null, '', '3704', 'psi', '150', '9', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('208', 'Oilwell', 'TRIPLEX', 'B1100-PT', '9', 'in', '6', 'in', null, '', '3112', 'psi', '150', '9', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('209', 'Oilwell', 'TRIPLEX', 'B1100-PT', '9', 'in', '6.5', 'in', null, '', '2652', 'psi', '150', '9', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('210', 'Oilwell', 'TRIPLEX', 'B1100-PT', '9', 'in', '7', 'in', null, '', '2287', 'psi', '150', '9', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('211', 'Oilwell', 'TRIPLEX', 'B1100-PT', '9', 'in', '7.5', 'in', null, '', '1992', 'psi', '150', '9', 'in', '7 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('212', 'Oilwell', 'TRIPLEX', 'B850-PT', '9', 'in', '5', 'in', null, '', '3565', 'psi', '160', '9', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('213', 'Oilwell', 'TRIPLEX', 'B850-PT', '9', 'in', '5.5', 'in', null, '', '2946', 'psi', '160', '9', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('214', 'Oilwell', 'TRIPLEX', 'B850-PT', '9', 'in', '6', 'in', null, '', '2476', 'psi', '160', '9', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('215', 'Oilwell', 'TRIPLEX', 'B850-PT', '9', 'in', '6.5', 'in', null, '', '2110', 'psi', '160', '9', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('216', 'Oilwell', 'TRIPLEX', 'B850-PT', '9', 'in', '7', 'in', null, '', '1819', 'psi', '160', '9', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('217', 'Oilwell', 'TRIPLEX', 'B850-PT', '9', 'in', '7.5', 'in', null, '', '1584', 'psi', '160', '9', 'in', '7 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('218', 'Oilwell', 'TRIPLEX', 'HD1400-PT', '12', 'in', '5', 'in', null, '', '5000', 'psi', '120', '12', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('219', 'Oilwell', 'TRIPLEX', 'HD1400-PT', '12', 'in', '5.5', 'in', null, '', '4861', 'psi', '120', '12', 'in', '5 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('220', 'Oilwell', 'TRIPLEX', 'HD1400-PT', '12', 'in', '6', 'in', null, '', '4085', 'psi', '120', '12', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('221', 'Oilwell', 'TRIPLEX', 'HD1400-PT', '12', 'in', '6.5', 'in', null, '', '3481', 'psi', '120', '12', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('222', 'Oilwell', 'TRIPLEX', 'HD1400-PT', '12', 'in', '7', 'in', null, '', '3001', 'psi', '120', '12', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('223', 'Oilwell', 'TRIPLEX', 'HD1400-PT', '12', 'in', '7.5', 'in', null, '', '2614', 'psi', '120', '12', 'in', '7 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('224', 'Oilwell', 'TRIPLEX', 'HD1700-PT', '12', 'in', '5', 'in', null, '', '5000', 'psi', '120', '12', 'in', '5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('225', 'Oilwell', 'TRIPLEX', 'HD1700-PT', '12', 'in', '5.5', 'in', null, '', '5000', 'psi', '120', '12', 'in', '5 1/5', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('226', 'Oilwell', 'TRIPLEX', 'HD1700-PT', '12', 'in', '6', 'in', null, '', '4960', 'psi', '120', '12', 'in', '6', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('227', 'Oilwell', 'TRIPLEX', 'HD1700-PT', '12', 'in', '6.5', 'in', null, '', '4227', 'psi', '120', '12', 'in', '6 1/2', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('228', 'Oilwell', 'TRIPLEX', 'HD1700-PT', '12', 'in', '7', 'in', null, '', '3644', 'psi', '120', '12', 'in', '7', 'in', '', '', '0', '1', '1');
INSERT INTO `bombas` VALUES ('229', 'Oilwell', 'TRIPLEX', 'HD1700-PT', '12', 'in', '7.5', 'in', null, '', '3175', 'psi', '120', '12', 'in', '7 1/2', 'in', '', '', '0', '1', '1');

-- ----------------------------
-- Table structure for `brocas`
-- ----------------------------
DROP TABLE IF EXISTS `brocas`;
CREATE TABLE `brocas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_broca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of brocas
-- ----------------------------
INSERT INTO `brocas` VALUES ('1', 'PDC');
INSERT INTO `brocas` VALUES ('2', 'TRI-CONE');
INSERT INTO `brocas` VALUES ('3', 'BI CENTRIC');

-- ----------------------------
-- Table structure for `brocas_modelos`
-- ----------------------------
DROP TABLE IF EXISTS `brocas_modelos`;
CREATE TABLE `brocas_modelos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_broca` int(255) DEFAULT NULL,
  `odfracc` varchar(255) DEFAULT NULL,
  `unit_oddfracc` varchar(255) DEFAULT NULL,
  `odddeci` float DEFAULT NULL,
  `unit_odddeci` varchar(255) DEFAULT NULL,
  `length` float DEFAULT NULL,
  `unit_length` varchar(255) DEFAULT NULL,
  `nombre_modelo` varchar(255) DEFAULT NULL,
  `custom` int(1) DEFAULT '1',
  `active` int(1) DEFAULT '1',
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of brocas_modelos
-- ----------------------------
INSERT INTO `brocas_modelos` VALUES ('1', '3', '12 1/4', 'in', '12.24', 'in', '25', 'ft', 'BL', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('2', '2', '4 3/4', 'in', '4.75', 'in', '1', 'ft', 'XS12S', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('3', '2', '4 7/8', 'in', '4.875', 'in', '1', 'ft', 'XS20S', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('4', '2', '5 7/8', 'in', '5.875', 'in', '1', 'ft', 'XN4', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('5', '2', '6', 'in', '6', 'in', '1', 'ft', 'XN4', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('6', '2', '6 1/8', 'in', '6.125', 'in', '1', 'ft', 'XS1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('7', '2', '6 1/4', 'in', '6.25', 'in', '1', 'ft', 'XS1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('8', '2', '6 1/2', 'in', '6.5', 'in', '1', 'ft', 'XS1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('9', '2', '6 3/4', 'in', '6.75', 'in', '1', 'ft', 'XS1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('10', '2', '7 7/8', 'in', '7.875', 'in', '1', 'ft', 'XS09', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('11', '2', '8 3/8', 'in', '8.375', 'in', '1', 'ft', 'XS1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('12', '2', '8 1/2', 'in', '8.5', 'in', '1', 'ft', 'XS06', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('13', '2', '8 3/4', 'in', '8.75', 'in', '1', 'ft', 'XS09', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('14', '2', '9', 'in', '9', 'in', '1', 'ft', 'XSC1S', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('15', '2', '9 1/2', 'in', '9.5', 'in', '1', 'ft', 'XSC1S', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('16', '2', '9 7/8', 'in', '9.875', 'in', '1', 'ft', 'XL20', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('17', '2', '10 5/8', 'in', '10.625', 'in', '1', 'ft', 'XL20', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('18', '2', '11', 'in', '11', 'in', '1', 'ft', 'XL33N', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('19', '2', '11 5/8', 'in', '11.625', 'in', '1', 'ft', 'XS3GS', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('20', '2', '12', 'in', '12', 'in', '1', 'ft', 'XLC1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('21', '2', '12 1/4', 'in', '12.25', 'in', '1', 'ft', 'XL16', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('22', '2', '13 1/2', 'in', '13.5', 'in', '1', 'ft', 'XN1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('23', '2', '14 1/2', 'in', '14.5', 'in', '1', 'ft', 'XT1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('24', '2', '14 3/4', 'in', '14.75', 'in', '1', 'ft', 'XN1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('25', '2', '16', 'in', '16', 'in', '1', 'ft', 'XT1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('26', '2', '17', 'in', '17', 'in', '1', 'ft', 'XN1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('27', '2', '17 1/2', 'in', '17.5', 'in', '1', 'ft', 'XN1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('28', '2', '18', 'in', '18', 'in', '1', 'ft', 'XT1GS', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('29', '2', '18 1/2', 'in', '18.5', 'in', '1', 'ft', 'XT1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('30', '2', '20', 'in', '20', 'in', '1', 'ft', 'XN1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('31', '2', '22', 'in', '22', 'in', '1', 'ft', 'XN1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('32', '2', '23', 'in', '23', 'in', '1', 'ft', 'XN1C', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('33', '2', '24', 'in', '24', 'in', '1', 'ft', 'XN1G', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('34', '2', '25 3/4', 'in', '25.75', 'in', '1', 'ft', 'XT1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('35', '2', '26', 'in', '26', 'in', '1', 'ft', 'XN1', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('36', '1', '3 3/8', 'in', '3.375', 'in', '0.59', 'ft', 'FM2323', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('37', '1', '3 3/4', 'in', '3.75', 'in', '0.46', 'ft', 'FM2533r', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('38', '1', '3 3/4', 'in', '3.75', 'in', '0.67', 'ft', 'FM2533', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('39', '1', '3 3/4', 'in', '3.75', 'in', '0.58', 'ft', 'SE3431i', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('40', '1', '3 3/4', 'in', '3.75', 'in', '0.53', 'ft', 'TB26i', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('41', '1', '3 7/8', 'in', '3.875', 'in', '0.64', 'ft', 'FM2421', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('42', '1', '3 7/8', 'in', '3.875', 'in', '0.65', 'ft', 'FM2533', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('43', '1', '4', 'in', '4', 'in', '0.65', 'ft', 'FM2631', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('44', '1', '4 1/8', 'in', '4.125', 'in', '0.61', 'ft', 'FM2621', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('45', '1', '4 1/8', 'in', '4.125', 'in', '0.73', 'ft', 'FM2643r', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('46', '1', '4 3/8', 'in', '4.375', 'in', '0.6', 'ft', 'FM2621', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('47', '1', '4 3/8', 'in', '4.375', 'in', '0.68', 'ft', 'FM2633', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('48', '1', '4 1/2', 'in', '4.5', 'in', '0.62', 'ft', 'FM2621', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('49', '1', '4 3/4', 'in', '4.75', 'in', '0.73', 'ft', 'FM2352', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('50', '1', '4 3/4', 'in', '4.75', 'in', '0.66', 'ft', 'FM2433', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('51', '1', '4 3/4', 'in', '4.75', 'in', '0.68', 'ft', 'FM2442', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('52', '1', '4 3/4', 'in', '4.75', 'in', '0.65', 'ft', 'FM2621', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('53', '1', '4 3/4', 'in', '4.75', 'in', '0.67', 'ft', 'FM2633', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('54', '1', '4 3/4', 'in', '4.75', 'in', '0.75', 'ft', 'FM2635', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('55', '1', '4 3/4', 'in', '4.75', 'in', '0.74', 'ft', 'FS2333', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('56', '1', '5 3/4', 'in', '5.75', 'in', '0.66', 'ft', 'FM2921i', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('57', '1', '5 7/8', 'in', '5.875', 'in', '0.72', 'ft', 'FM2465', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('58', '1', '5 7/8', 'in', '5.875', 'in', '0.65', 'ft', 'FM2631', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('59', '1', '5 7/8', 'in', '5.875', 'in', '0.82', 'ft', 'FM2633i', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('60', '1', '5 7/8', 'in', '5.875', 'in', '0.66', 'ft', 'FM2641', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('61', '1', '5 7/8', 'in', '5.875', 'in', '1.08', 'ft', 'FM2641r', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('62', '1', '8 1/2', 'in', '8.5', 'in', '1', 'ft', 'cxxx', '0', '1', '1');
INSERT INTO `brocas_modelos` VALUES ('63', '1', '17 1/4', 'in', '17.25', 'in', '7', 'ft', 'example', '0', '1', '1');

-- ----------------------------
-- Table structure for `casing`
-- ----------------------------
DROP TABLE IF EXISTS `casing`;
CREATE TABLE `casing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odfrac` varchar(255) DEFAULT NULL,
  `oddeci` decimal(10,3) DEFAULT NULL,
  `od_unit` varchar(255) DEFAULT 'in',
  `idfrac` varchar(255) DEFAULT NULL,
  `iddeci` decimal(10,3) DEFAULT NULL,
  `id_unit` varchar(255) DEFAULT 'in',
  `weight` decimal(10,3) DEFAULT NULL,
  `w_unit` varchar(255) DEFAULT 'ppf',
  `custom` int(1) DEFAULT '1',
  `active` int(1) DEFAULT '1',
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of casing
-- ----------------------------
INSERT INTO `casing` VALUES ('1', '1 1/20', '1.050', 'in', '0,824', '0.824', 'in', '1.140', 'ppf', '1', '0', '1');
INSERT INTO `casing` VALUES ('2', '1 23/73', '1.315', 'in', '1,049', '1.049', 'in', '1.700', 'ppf', '1', '1', '1');
INSERT INTO `casing` VALUES ('3', '1 33/50', '1.660', 'in', '1,41', '1.410', 'in', '2.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('4', '1 33/50', '1.660', 'in', '1,38', '1.380', 'in', '2.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('5', '1 9/10', '1.900', 'in', '1,65', '1.650', 'in', '2.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('6', '1 9/10', '1.900', 'in', '1,61', '1.610', 'in', '2.750', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('7', '2 1/16', '2.063', 'in', '1,751', '1.751', 'in', '3.250', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('8', '2 3/8', '2.375', 'in', '2,041', '2.041', 'in', '4.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('9', '2 3/8', '2.375', 'in', '1,995', '1.995', 'in', '4.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('10', '2 3/8', '2.375', 'in', '1,867', '1.867', 'in', '5.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('11', '2 7/8', '2.875', 'in', '2,441', '2.441', 'in', '6.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('12', '2 7/8', '2.875', 'in', '2,323', '2.323', 'in', '7.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('13', '2 7/8', '2.875', 'in', '2,259', '2.259', 'in', '8.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('14', '3 1/2', '3.500', 'in', '3,068', '3.068', 'in', '7.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('15', '3 1/2', '3.500', 'in', '2,992', '2.992', 'in', '9.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('16', '3 1/2', '3.500', 'in', '2,75', '2.750', 'in', '12.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('17', '4', '4.000', 'in', '3,548', '3.548', 'in', '9.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('18', '4', '4.000', 'in', '3,476', '3.476', 'in', '11.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('19', '4 1/2', '4.500', 'in', '4,09', '4.090', 'in', '9.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('20', '4 1/2', '4.500', 'in', '4,052', '4.052', 'in', '10.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('21', '4 1/2', '4.500', 'in', '4', '4.000', 'in', '11.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('22', '4 1/2', '4.500', 'in', '3,958', '3.958', 'in', '12.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('23', '4 1/2', '4.500', 'in', '3,92', '3.920', 'in', '13.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('24', '4 1/2', '4.500', 'in', '3,826', '3.826', 'in', '15.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('25', '4 1/2', '4.500', 'in', '3,64', '3.640', 'in', '18.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('26', '4 1/2', '4.500', 'in', '3,5', '3.500', 'in', '21.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('27', '4 1/2', '4.500', 'in', '3,38', '3.380', 'in', '24.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('28', '4 1/2', '4.500', 'in', '3,24', '3.240', 'in', '26.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('29', '5', '5.000', 'in', '4,56', '4.560', 'in', '11.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('30', '5', '5.000', 'in', '4,494', '4.494', 'in', '13.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('31', '5', '5.000', 'in', '4,408', '4.408', 'in', '15.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('32', '5', '5.000', 'in', '4,276', '4.276', 'in', '18.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('33', '5', '5.000', 'in', '4,184', '4.184', 'in', '20.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('34', '5', '5.000', 'in', '4,126', '4.126', 'in', '21.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('35', '5', '5.000', 'in', '4,044', '4.044', 'in', '23.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('36', '5', '5.000', 'in', '4', '4.000', 'in', '24.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('37', '5 1/2', '5.500', 'in', '5,012', '5.012', 'in', '14.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('38', '5 1/2', '5.500', 'in', '4,95', '4.950', 'in', '15.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('39', '5 1/2', '5.500', 'in', '4,892', '4.892', 'in', '17.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('40', '5 1/2', '5.500', 'in', '4,778', '4.778', 'in', '20.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('41', '5 1/2', '5.500', 'in', '4,67', '4.670', 'in', '23.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('42', '5 1/2', '5.500', 'in', '4,626', '4.626', 'in', '23.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('43', '5 1/2', '5.500', 'in', '4,548', '4.548', 'in', '26.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('44', '5 1/2', '5.500', 'in', '4,5', '4.500', 'in', '26.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('45', '5 1/2', '5.500', 'in', '4,44', '4.440', 'in', '28.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('46', '5 1/2', '5.500', 'in', '4,376', '4.376', 'in', '28.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('47', '5 1/2', '5.500', 'in', '4,376', '4.376', 'in', '29.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('48', '5 1/2', '5.500', 'in', '4,276', '4.276', 'in', '32.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('49', '5 1/2', '5.500', 'in', '4,25', '4.250', 'in', '32.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('50', '5 1/2', '5.500', 'in', '4,126', '4.126', 'in', '35.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('51', '5 1/2', '5.500', 'in', '4,09', '4.090', 'in', '36.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('52', '5 1/2', '5.500', 'in', '4,05', '4.050', 'in', '37.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('53', '5 1/2', '5.500', 'in', '4', '4.000', 'in', '38.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('54', '5 1/2', '5.500', 'in', '3,876', '3.876', 'in', '40.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('55', '5 1/2', '5.500', 'in', '3,75', '3.750', 'in', '43.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('56', '6 5/8', '6.625', 'in', '6,049', '6.049', 'in', '20.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('57', '6 5/8', '6.625', 'in', '5,921', '5.921', 'in', '24.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('58', '6 5/8', '6.625', 'in', '5,791', '5.791', 'in', '28.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('59', '6 5/8', '6.625', 'in', '5,675', '5.675', 'in', '32.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('60', '7', '7.000', 'in', '6,538', '6.538', 'in', '17.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('61', '7', '7.000', 'in', '6,456', '6.456', 'in', '20.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('62', '7', '7.000', 'in', '6,366', '6.366', 'in', '23.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('63', '7', '7.000', 'in', '6,276', '6.276', 'in', '26.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('64', '7', '7.000', 'in', '6,184', '6.184', 'in', '29.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('65', '7', '7.000', 'in', '6,094', '6.094', 'in', '32.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('66', '7', '7.000', 'in', '6,004', '6.004', 'in', '35.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('67', '7', '7.000', 'in', '5,92', '5.920', 'in', '38.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('68', '7', '7.000', 'in', '5,82', '5.820', 'in', '41.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('69', '7', '7.000', 'in', '5,75', '5.750', 'in', '42.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('70', '7', '7.000', 'in', '5,72', '5.720', 'in', '44.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('71', '7', '7.000', 'in', '5,66', '5.660', 'in', '46.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('72', '7', '7.000', 'in', '5,54', '5.540', 'in', '49.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('73', '7', '7.000', 'in', '5,25', '5.250', 'in', '57.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('74', '7 5/8', '7.625', 'in', '7,025', '7.025', 'in', '24.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('75', '7 5/8', '7.625', 'in', '6,969', '6.969', 'in', '26.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('76', '7 5/8', '7.625', 'in', '6,875', '6.875', 'in', '29.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('77', '7 5/8', '7.625', 'in', '6,765', '6.765', 'in', '33.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('78', '7 5/8', '7.625', 'in', '6,625', '6.625', 'in', '39.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('79', '7 5/8', '7.625', 'in', '6,501', '6.501', 'in', '42.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('80', '7 5/8', '7.625', 'in', '6,435', '6.435', 'in', '45.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('81', '7 5/8', '7.625', 'in', '6,375', '6.375', 'in', '47.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('82', '7 5/8', '7.625', 'in', '6,201', '6.201', 'in', '52.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('83', '7 5/8', '7.625', 'in', '6,025', '6.025', 'in', '59.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('84', '7 5/8', '7.625', 'in', '5,225', '5.225', 'in', '82.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('85', '7 3/8', '7.750', 'in', '6,56', '6.560', 'in', '46.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('86', '7 3/8', '7.750', 'in', '6,5', '6.500', 'in', '47.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('87', '7 3/8', '7.750', 'in', '6,47', '6.470', 'in', '48.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('88', '8 5/8', '8.625', 'in', '8,097', '8.097', 'in', '24.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('89', '8 5/8', '8.625', 'in', '8,017', '8.017', 'in', '28.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('90', '8 5/8', '8.625', 'in', '7,921', '7.921', 'in', '32.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('91', '8 5/8', '8.625', 'in', '7,825', '7.825', 'in', '36.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('92', '8 5/8', '8.625', 'in', '7,725', '7.725', 'in', '40.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('93', '8 5/8', '8.625', 'in', '7,625', '7.625', 'in', '44.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('94', '8 5/8', '8.625', 'in', '7,511', '7.511', 'in', '49.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('95', '8 5/8', '8.625', 'in', '7,501', '7.501', 'in', '49.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('96', '8 5/8', '8.625', 'in', '7,435', '7.435', 'in', '52.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('97', '8 5/8', '8.625', 'in', '7,375', '7.375', 'in', '54.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('98', '9 5/8', '9.625', 'in', '9,001', '9.001', 'in', '32.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('99', '9 5/8', '9.625', 'in', '8,921', '8.921', 'in', '36.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('100', '9 5/8', '9.625', 'in', '8,835', '8.835', 'in', '40.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('101', '9 5/8', '9.625', 'in', '8,755', '8.755', 'in', '43.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('102', '9 5/8', '9.625', 'in', '8,681', '8.681', 'in', '47.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('103', '9 5/8', '9.625', 'in', '8,535', '8.535', 'in', '53.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('104', '9 5/8', '9.625', 'in', '8,435', '8.435', 'in', '58.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('105', '9 5/8', '9.625', 'in', '8,407', '8.407', 'in', '59.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('106', '9 5/8', '9.625', 'in', '8,375', '8.375', 'in', '61.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('107', '9 5/8', '9.625', 'in', '8,281', '8.281', 'in', '64.900', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('108', '9 5/8', '9.625', 'in', '8,125', '8.125', 'in', '71.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('109', '10 3/4', '10.750', 'in', '10,192', '10.192', 'in', '32.750', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('110', '10 3/4', '10.750', 'in', '10,05', '10.050', 'in', '40.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('111', '10 3/4', '10.750', 'in', '9,95', '9.950', 'in', '45.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('112', '10 3/4', '10.750', 'in', '9,85', '9.850', 'in', '51.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('113', '10 3/4', '10.750', 'in', '9,76', '9.760', 'in', '55.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('114', '10 3/4', '10.750', 'in', '9,66', '9.660', 'in', '60.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('115', '10 3/4', '10.750', 'in', '9,56', '9.560', 'in', '65.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('116', '10 3/4', '10.750', 'in', '9,394', '9.394', 'in', '73.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('117', '10 3/4', '10.750', 'in', '9,282', '9.282', 'in', '79.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('118', '10 3/4', '10.750', 'in', '9,156', '9.156', 'in', '85.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('119', '11 3/4', '11.750', 'in', '11,09', '11.090', 'in', '42.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('120', '11 3/4', '11.750', 'in', '11', '11.000', 'in', '47.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('121', '11 3/4', '11.750', 'in', '10,88', '10.880', 'in', '54.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('122', '11 3/4', '11.750', 'in', '10,772', '10.772', 'in', '60.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('123', '11 3/4', '11.750', 'in', '10,682', '10.682', 'in', '65.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('124', '11 3/4', '11.750', 'in', '10,586', '10.586', 'in', '71.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('125', '11 3/4', '11.750', 'in', '10,514', '10.514', 'in', '75.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('126', '11 3/4', '11.750', 'in', '10,438', '10.438', 'in', '79.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('127', '11 3/4', '11.750', 'in', '10,368', '10.368', 'in', '83.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('128', '11 7/8', '11.875', 'in', '10,711', '10.711', 'in', '71.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('129', '13 3/8', '13.375', 'in', '12,715', '12.715', 'in', '48.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('130', '13 3/8', '13.375', 'in', '12,615', '12.615', 'in', '54.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('131', '13 3/8', '13.375', 'in', '12,515', '12.515', 'in', '61.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('132', '13 3/8', '13.375', 'in', '12,415', '12.415', 'in', '68.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('133', '13 3/8', '13.375', 'in', '12,347', '12.347', 'in', '72.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('134', '13 3/8', '13.375', 'in', '12,275', '12.275', 'in', '77.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('135', '13 3/8', '13.375', 'in', '12,159', '12.159', 'in', '85.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('136', '13 3/8', '13.375', 'in', '12,125', '12.125', 'in', '86.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('137', '13 3/8', '13.375', 'in', '12,031', '12.031', 'in', '92.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('138', '13 3/8', '13.375', 'in', '11,937', '11.937', 'in', '98.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('139', '13 1/2', '13.500', 'in', '12,34', '12.340', 'in', '81.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('140', '13 5/8', '13.625', 'in', '12,375', '12.375', 'in', '88.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('141', '14', '14.000', 'in', '12,7', '12.700', 'in', '92.680', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('142', '14', '14.000', 'in', '12,6', '12.600', 'in', '99.430', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('143', '14', '14.000', 'in', '12,5', '12.500', 'in', '106.130', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('144', '14', '14.000', 'in', '12,4', '12.400', 'in', '112.780', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('145', '14', '14.000', 'in', '12,3', '12.300', 'in', '119.380', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('146', '16', '16.000', 'in', '15,25', '15.250', 'in', '65.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('147', '16', '16.000', 'in', '15,124', '15.124', 'in', '75.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('148', '16', '16.000', 'in', '15,01', '15.010', 'in', '84.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('149', '16', '16.000', 'in', '15', '15.000', 'in', '84.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('150', '16', '16.000', 'in', '15,01', '15.010', 'in', '85.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('151', '16', '16.000', 'in', '14,688', '14.688', 'in', '109.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('152', '16', '16.000', 'in', '14,57', '14.570', 'in', '118.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('153', '18 5/8', '18.625', 'in', '17,755', '17.755', 'in', '87.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('154', '18 5/8', '18.625', 'in', '17,689', '17.689', 'in', '94.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('155', '18 5/8', '18.625', 'in', '17,653', '17.653', 'in', '97.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('156', '18 5/8', '18.625', 'in', '17,499', '17.499', 'in', '109.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('157', '18 5/8', '18.625', 'in', '17,467', '17.467', 'in', '112.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('158', '18 5/8', '18.625', 'in', '17,239', '17.239', 'in', '136.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('159', '20', '20.000', 'in', '19,124', '19.124', 'in', '94.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('160', '20', '20.000', 'in', '19', '19.000', 'in', '106.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('161', '20', '20.000', 'in', '18,874', '18.874', 'in', '117.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('162', '20', '20.000', 'in', '18,73', '18.730', 'in', '133.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('163', '20', '20.000', 'in', '18,582', '18.582', 'in', '147.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('164', '20', '20.000', 'in', '18,376', '18.376', 'in', '169.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('165', '22', '22.000', 'in', '21,25', '21.250', 'in', '86.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('166', '22', '22.000', 'in', '21', '21.000', 'in', '114.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('167', '22', '22.000', 'in', '20,5', '20.500', 'in', '170.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('168', '24', '24.000', 'in', '23', '23.000', 'in', '125.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('169', '24', '24.000', 'in', '22,75', '22.750', 'in', '156.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('170', '24', '24.000', 'in', '22,5', '22.500', 'in', '186.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('171', '24', '24.000', 'in', '22', '22.000', 'in', '245.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('172', '26', '26.000', 'in', '25', '25.000', 'in', '136.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('173', '26', '26.000', 'in', '24,75', '24.750', 'in', '169.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('174', '26', '26.000', 'in', '24,5', '24.500', 'in', '202.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('175', '26', '26.000', 'in', '24', '24.000', 'in', '267.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('176', '30', '30.000', 'in', '29', '29.000', 'in', '157.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('177', '30', '30.000', 'in', '28,75', '28.750', 'in', '196.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('178', '30', '30.000', 'in', '28,5', '28.500', 'in', '234.000', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('179', '30', '30.000', 'in', '28', '28.000', 'in', '309.700', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('180', '32', '32.000', 'in', '31', '31.000', 'in', '168.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('181', '32', '32.000', 'in', '30,75', '30.750', 'in', '209.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('182', '32', '32.000', 'in', '30,5', '30.500', 'in', '250.300', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('183', '32', '32.000', 'in', '30', '30.000', 'in', '331.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('184', '36', '36.000', 'in', '35', '35.000', 'in', '189.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('185', '36', '36.000', 'in', '34,75', '34.750', 'in', '236.100', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('186', '36', '36.000', 'in', '34,5', '34.500', 'in', '282.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('187', '36', '36.000', 'in', '34', '34.000', 'in', '373.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('188', '40', '40.000', 'in', '39', '39.000', 'in', '210.900', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('189', '40', '40.000', 'in', '38,75', '38.750', 'in', '262.800', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('190', '40', '40.000', 'in', '38,5', '38.500', 'in', '314.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('191', '40', '40.000', 'in', '38', '38.000', 'in', '416.500', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('192', '42', '42.000', 'in', '41', '41.000', 'in', '221.600', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('193', '42', '42.000', 'in', '40,75', '40.750', 'in', '276.200', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('194', '42', '42.000', 'in', '40,5', '40.500', 'in', '330.400', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('195', '42', '42.000', 'in', '40', '40.000', 'in', '437.900', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('196', '1 1/2', '1.500', null, null, '30.000', null, null, null, '0', '1', '1');
INSERT INTO `casing` VALUES ('197', '1 1/2', '1.500', null, null, '2.800', null, null, null, '0', '1', '1');
INSERT INTO `casing` VALUES ('198', '1 1/2', '1.500', null, null, '2.050', null, null, null, '0', '1', '1');
INSERT INTO `casing` VALUES ('199', '6', '6.000', null, null, '5.000', null, null, null, '0', '1', '1');
INSERT INTO `casing` VALUES ('200', '4', '4.000', null, null, '5.000', null, null, null, '0', '1', '1');
INSERT INTO `casing` VALUES ('201', '2', '2.000', null, null, '5.000', null, null, null, '0', '1', '1');

-- ----------------------------
-- Table structure for `chemical_aditions`
-- ----------------------------
DROP TABLE IF EXISTS `chemical_aditions`;
CREATE TABLE `chemical_aditions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `report` int(11) DEFAULT NULL,
  `tank` int(11) DEFAULT NULL,
  `total_volume_increment` float DEFAULT NULL,
  `increment_by_chemical` float DEFAULT NULL,
  `increment_by_water` float DEFAULT NULL,
  `status_producido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chemical_aditions
-- ----------------------------

-- ----------------------------
-- Table structure for `chemical_aditions_detail`
-- ----------------------------
DROP TABLE IF EXISTS `chemical_aditions_detail`;
CREATE TABLE `chemical_aditions_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemical_adition` int(11) DEFAULT NULL,
  `material` int(11) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  `volume_increment` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chemical_aditions_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `concentrations`
-- ----------------------------
DROP TABLE IF EXISTS `concentrations`;
CREATE TABLE `concentrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tank_status_time` int(11) DEFAULT NULL,
  `material` int(11) DEFAULT NULL,
  `concentracion` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of concentrations
-- ----------------------------

-- ----------------------------
-- Table structure for `conversions_table`
-- ----------------------------
DROP TABLE IF EXISTS `conversions_table`;
CREATE TABLE `conversions_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_unidad` varchar(255) DEFAULT NULL,
  `equivalencia` float DEFAULT NULL,
  `unidad_destino` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of conversions_table
-- ----------------------------
INSERT INTO `conversions_table` VALUES ('1', 'SX25', '25', 'lb');
INSERT INTO `conversions_table` VALUES ('2', 'CX40', '40', 'gal');

-- ----------------------------
-- Table structure for `inventory`
-- ----------------------------
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `avaliable` int(11) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  `transfered` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `received` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory
-- ----------------------------
INSERT INTO `inventory` VALUES ('1', '1', '500', '0', '0', '1', '500');
INSERT INTO `inventory` VALUES ('2', '2', '500', '0', '0', '1', '500');
INSERT INTO `inventory` VALUES ('3', '3', '0', '0', '0', '1', '0');
INSERT INTO `inventory` VALUES ('4', '10', '500', '0', '0', '1', '500');
INSERT INTO `inventory` VALUES ('5', '4', '500', '0', '0', '1', '500');

-- ----------------------------
-- Table structure for `inventory_movements`
-- ----------------------------
DROP TABLE IF EXISTS `inventory_movements`;
CREATE TABLE `inventory_movements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` varchar(255) DEFAULT NULL,
  `report` int(11) DEFAULT NULL,
  `erp_project_id` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `notes` text,
  `type` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `stock_transfer` int(11) DEFAULT NULL,
  `chemical_adition` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_movements
-- ----------------------------
INSERT INTO `inventory_movements` VALUES ('213', '1', '21', null, null, '2012-10-19 11:55:24', null, '0', '100', '1', '4', null);
INSERT INTO `inventory_movements` VALUES ('214', '1', '21', null, null, '2012-10-19 11:55:24', null, '0', '200', '2', '4', null);
INSERT INTO `inventory_movements` VALUES ('215', '1', '21', null, null, '2012-10-19 11:55:24', null, '0', '300', '4', '4', null);
INSERT INTO `inventory_movements` VALUES ('216', '1', '21', null, null, '2012-10-19 11:55:24', null, '0', '400', '10', '4', null);
INSERT INTO `inventory_movements` VALUES ('217', '1', '21', null, null, '2012-10-19 14:41:45', null, '0', '400', '1', '5', null);
INSERT INTO `inventory_movements` VALUES ('218', '1', '21', null, null, '2012-10-19 14:41:45', null, '0', '300', '2', '5', null);
INSERT INTO `inventory_movements` VALUES ('219', '1', '21', null, null, '2012-10-19 14:41:45', null, '0', '200', '4', '5', null);
INSERT INTO `inventory_movements` VALUES ('220', '1', '21', null, null, '2012-10-19 14:41:45', null, '0', '100', '10', '5', null);

-- ----------------------------
-- Table structure for `lodos`
-- ----------------------------
DROP TABLE IF EXISTS `lodos`;
CREATE TABLE `lodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `custom` int(1) DEFAULT '1',
  `active` int(1) DEFAULT '1',
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lodos
-- ----------------------------
INSERT INTO `lodos` VALUES ('1', 'Q - NCa', '0', '1', '1');
INSERT INTO `lodos` VALUES ('2', 'Q - MaxDrill', '0', '1', '1');
INSERT INTO `lodos` VALUES ('3', 'Q - MaxDrill PHPA', '0', '1', '1');
INSERT INTO `lodos` VALUES ('4', 'Q - Drill in', '0', '1', '1');
INSERT INTO `lodos` VALUES ('5', 'Q - Drill', '0', '1', '1');
INSERT INTO `lodos` VALUES ('6', 'Q - Inhibimax', '0', '1', '1');
INSERT INTO `lodos` VALUES ('7', 'Natural Gel', '0', '1', '1');
INSERT INTO `lodos` VALUES ('8', 'Natural Gel - benex', '0', '1', '1');
INSERT INTO `lodos` VALUES ('9', 'Q - Vert', '0', '1', '1');
INSERT INTO `lodos` VALUES ('10', 'Q - NK', '0', '1', '1');

-- ----------------------------
-- Table structure for `personal`
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `project` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personal
-- ----------------------------
INSERT INTO `personal` VALUES ('1', '1030529971', 'Paternina', 'José', '1', '1', '500', '1');
INSERT INTO `personal` VALUES ('2', '72302448', 'ANTEQUERA', 'DAVID', '1', '1', '700', '1');
INSERT INTO `personal` VALUES ('3', '1098629008', 'Fernanda', 'Maria', '1', '1', '200', '0');
INSERT INTO `personal` VALUES ('4', '12345678', 'GOMEZ', 'OSCAR', '1', '1', '499', '1');
INSERT INTO `personal` VALUES ('5', '25845942', 'fsasf', 'fafad', '1', '1', '500', '0');
INSERT INTO `personal` VALUES ('6', '123', 'lalala', 'lalal', '1', '2', '300', '0');
INSERT INTO `personal` VALUES ('7', '098', 'iui', 'iui', '1', '4', '100', '0');
INSERT INTO `personal` VALUES ('8', '91525414', 'gutierrez', 'fabian', '1', '4', '200', '0');
INSERT INTO `personal` VALUES ('9', '13822956', 'gutierrez', 'jairo', '1', '5', '100', '0');
INSERT INTO `personal` VALUES ('10', '', '', '', '1', '3', '0', '0');
INSERT INTO `personal` VALUES ('11', '1098629008', 'gutierrez', 'fernanda', '1', '3', '0', '0');
INSERT INTO `personal` VALUES ('12', '888999', 'gutierrez', 'fabian', '1', '4', '0', '1');
INSERT INTO `personal` VALUES ('13', '7777888', 'gutierrez', 'jairo', '1', '5', '0', '1');
INSERT INTO `personal` VALUES ('14', '123', 'perez', 'juan', '1', '4', '100', '1');
INSERT INTO `personal` VALUES ('15', '234', 'jimenez', 'milagros', '1', '4', '100', '1');
INSERT INTO `personal` VALUES ('16', '09878', 'PEREZ', 'JUAN', '1', '1', '500', '1');
INSERT INTO `personal` VALUES ('17', '8888', 'ceceres', 'pedro', '1', '5', '50', '1');
INSERT INTO `personal` VALUES ('18', '111111', 'aguirre', 'gustavo', '1', '5', '25', '1');
INSERT INTO `personal` VALUES ('19', '9999999', 'claro', 'carlos', '1', '4', '100', '1');
INSERT INTO `personal` VALUES ('20', '5654', 'gomez', 'henry', '1', '5', '50', '0');
INSERT INTO `personal` VALUES ('21', 'r5435', 'ljlkj', 'kljklj', '1', '1', '500', '0');

-- ----------------------------
-- Table structure for `personal_categories`
-- ----------------------------
DROP TABLE IF EXISTS `personal_categories`;
CREATE TABLE `personal_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `erp_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `default_rate` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personal_categories
-- ----------------------------
INSERT INTO `personal_categories` VALUES ('1', null, 'Senior', 'enginer', '500');
INSERT INTO `personal_categories` VALUES ('2', null, 'Junior', 'enginer', '300');
INSERT INTO `personal_categories` VALUES ('3', null, 'Training', 'enginer', '0');
INSERT INTO `personal_categories` VALUES ('4', null, 'Operator', 'operator', '0');
INSERT INTO `personal_categories` VALUES ('5', null, 'Yard Worker', 'yard_worker', '0');

-- ----------------------------
-- Table structure for `personal_report_enginers`
-- ----------------------------
DROP TABLE IF EXISTS `personal_report_enginers`;
CREATE TABLE `personal_report_enginers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enginer` int(11) DEFAULT NULL,
  `project` int(11) DEFAULT NULL,
  `cover` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personal_report_enginers
-- ----------------------------
INSERT INTO `personal_report_enginers` VALUES ('1', '1', '1', '1', '2012-09-12');
INSERT INTO `personal_report_enginers` VALUES ('2', '1', '1', '1', '2012-09-28');
INSERT INTO `personal_report_enginers` VALUES ('3', '1', '1', '1', '2012-09-27');

-- ----------------------------
-- Table structure for `program`
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `phase` int(11) NOT NULL,
  `value_program` float DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_program_test_idx` (`test_id`) USING BTREE,
  KEY `fk_program_projects_idx` (`project_id`) USING BTREE,
  CONSTRAINT `program_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `program_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of program
-- ----------------------------
INSERT INTO `program` VALUES ('1', '1', '1', '1', '0');
INSERT INTO `program` VALUES ('2', '1', '1', '2', '0');
INSERT INTO `program` VALUES ('3', '1', '1', '3', '0');
INSERT INTO `program` VALUES ('4', '1', '2', '1', '0');
INSERT INTO `program` VALUES ('5', '1', '2', '2', '0');
INSERT INTO `program` VALUES ('6', '1', '2', '3', '0');
INSERT INTO `program` VALUES ('7', '1', '3', '1', '0');
INSERT INTO `program` VALUES ('8', '1', '3', '2', '0');
INSERT INTO `program` VALUES ('9', '1', '3', '3', '0');
INSERT INTO `program` VALUES ('10', '1', '4', '1', '0');
INSERT INTO `program` VALUES ('11', '1', '4', '2', '0');
INSERT INTO `program` VALUES ('12', '1', '4', '3', '0');
INSERT INTO `program` VALUES ('13', '1', '5', '1', '0');
INSERT INTO `program` VALUES ('14', '1', '5', '2', '0');
INSERT INTO `program` VALUES ('15', '1', '5', '3', '0');
INSERT INTO `program` VALUES ('16', '1', '6', '1', '0');
INSERT INTO `program` VALUES ('17', '1', '6', '2', '0');
INSERT INTO `program` VALUES ('18', '1', '6', '3', '0');
INSERT INTO `program` VALUES ('19', '1', '7', '1', '0');
INSERT INTO `program` VALUES ('20', '1', '7', '2', '0');
INSERT INTO `program` VALUES ('21', '1', '7', '3', '0');
INSERT INTO `program` VALUES ('22', '1', '8', '1', '0');
INSERT INTO `program` VALUES ('23', '1', '8', '2', '0');
INSERT INTO `program` VALUES ('24', '1', '8', '3', '0');
INSERT INTO `program` VALUES ('25', '1', '9', '1', '0');
INSERT INTO `program` VALUES ('26', '1', '9', '2', '0');
INSERT INTO `program` VALUES ('27', '1', '9', '3', '0');
INSERT INTO `program` VALUES ('28', '1', '10', '1', '0');
INSERT INTO `program` VALUES ('29', '1', '10', '2', '0');
INSERT INTO `program` VALUES ('30', '1', '10', '3', '0');
INSERT INTO `program` VALUES ('31', '1', '11', '1', '0');
INSERT INTO `program` VALUES ('32', '1', '11', '2', '0');
INSERT INTO `program` VALUES ('33', '1', '11', '3', '0');
INSERT INTO `program` VALUES ('34', '1', '12', '1', '0');
INSERT INTO `program` VALUES ('35', '1', '12', '2', '0');
INSERT INTO `program` VALUES ('36', '1', '12', '3', '0');
INSERT INTO `program` VALUES ('37', '1', '13', '1', '0');
INSERT INTO `program` VALUES ('38', '1', '13', '2', '0');
INSERT INTO `program` VALUES ('39', '1', '13', '3', '0');
INSERT INTO `program` VALUES ('40', '1', '14', '1', '0');
INSERT INTO `program` VALUES ('41', '1', '14', '2', '0');
INSERT INTO `program` VALUES ('42', '1', '14', '3', '0');
INSERT INTO `program` VALUES ('43', '1', '15', '1', '0');
INSERT INTO `program` VALUES ('44', '1', '15', '2', '0');
INSERT INTO `program` VALUES ('45', '1', '15', '3', '0');
INSERT INTO `program` VALUES ('46', '1', '1', '1', '0');
INSERT INTO `program` VALUES ('47', '1', '1', '2', '0');
INSERT INTO `program` VALUES ('48', '1', '1', '3', '0');
INSERT INTO `program` VALUES ('49', '1', '2', '1', '0');
INSERT INTO `program` VALUES ('50', '1', '2', '2', '0');
INSERT INTO `program` VALUES ('51', '1', '2', '3', '0');
INSERT INTO `program` VALUES ('52', '1', '3', '1', '0');
INSERT INTO `program` VALUES ('53', '1', '3', '2', '0');
INSERT INTO `program` VALUES ('54', '1', '3', '3', '0');
INSERT INTO `program` VALUES ('55', '1', '4', '1', '0');
INSERT INTO `program` VALUES ('56', '1', '4', '2', '0');
INSERT INTO `program` VALUES ('57', '1', '4', '3', '0');
INSERT INTO `program` VALUES ('58', '1', '5', '1', '0');
INSERT INTO `program` VALUES ('59', '1', '5', '2', '0');
INSERT INTO `program` VALUES ('60', '1', '5', '3', '0');
INSERT INTO `program` VALUES ('61', '1', '6', '1', '0');
INSERT INTO `program` VALUES ('62', '1', '6', '2', '0');
INSERT INTO `program` VALUES ('63', '1', '6', '3', '0');
INSERT INTO `program` VALUES ('64', '1', '7', '1', '0');
INSERT INTO `program` VALUES ('65', '1', '7', '2', '0');
INSERT INTO `program` VALUES ('66', '1', '7', '3', '0');
INSERT INTO `program` VALUES ('67', '1', '8', '1', '0');
INSERT INTO `program` VALUES ('68', '1', '8', '2', '0');
INSERT INTO `program` VALUES ('69', '1', '8', '3', '0');
INSERT INTO `program` VALUES ('70', '1', '9', '1', '0');
INSERT INTO `program` VALUES ('71', '1', '9', '2', '0');
INSERT INTO `program` VALUES ('72', '1', '9', '3', '0');
INSERT INTO `program` VALUES ('73', '1', '10', '1', '0');
INSERT INTO `program` VALUES ('74', '1', '10', '2', '0');
INSERT INTO `program` VALUES ('75', '1', '10', '3', '0');
INSERT INTO `program` VALUES ('76', '1', '11', '1', '0');
INSERT INTO `program` VALUES ('77', '1', '11', '2', '0');
INSERT INTO `program` VALUES ('78', '1', '11', '3', '0');
INSERT INTO `program` VALUES ('79', '1', '12', '1', '0');
INSERT INTO `program` VALUES ('80', '1', '12', '2', '0');
INSERT INTO `program` VALUES ('81', '1', '12', '3', '0');
INSERT INTO `program` VALUES ('82', '1', '13', '1', '0');
INSERT INTO `program` VALUES ('83', '1', '13', '2', '0');
INSERT INTO `program` VALUES ('84', '1', '13', '3', '0');
INSERT INTO `program` VALUES ('85', '1', '14', '1', '0');
INSERT INTO `program` VALUES ('86', '1', '14', '2', '0');
INSERT INTO `program` VALUES ('87', '1', '14', '3', '0');
INSERT INTO `program` VALUES ('88', '1', '15', '1', '0');
INSERT INTO `program` VALUES ('89', '1', '15', '2', '0');
INSERT INTO `program` VALUES ('90', '1', '15', '3', '0');
INSERT INTO `program` VALUES ('91', '1', '1', '1', '0');
INSERT INTO `program` VALUES ('92', '1', '1', '2', '0');
INSERT INTO `program` VALUES ('93', '1', '1', '3', '0');
INSERT INTO `program` VALUES ('94', '1', '2', '1', '0');
INSERT INTO `program` VALUES ('95', '1', '2', '2', '0');
INSERT INTO `program` VALUES ('96', '1', '2', '3', '0');
INSERT INTO `program` VALUES ('97', '1', '3', '1', '0');
INSERT INTO `program` VALUES ('98', '1', '3', '2', '0');
INSERT INTO `program` VALUES ('99', '1', '3', '3', '0');
INSERT INTO `program` VALUES ('100', '1', '4', '1', '0');
INSERT INTO `program` VALUES ('101', '1', '4', '2', '0');
INSERT INTO `program` VALUES ('102', '1', '4', '3', '0');
INSERT INTO `program` VALUES ('103', '1', '5', '1', '0');
INSERT INTO `program` VALUES ('104', '1', '5', '2', '0');
INSERT INTO `program` VALUES ('105', '1', '5', '3', '0');
INSERT INTO `program` VALUES ('106', '1', '6', '1', '0');
INSERT INTO `program` VALUES ('107', '1', '6', '2', '0');
INSERT INTO `program` VALUES ('108', '1', '6', '3', '0');
INSERT INTO `program` VALUES ('109', '1', '7', '1', '0');
INSERT INTO `program` VALUES ('110', '1', '7', '2', '0');
INSERT INTO `program` VALUES ('111', '1', '7', '3', '0');
INSERT INTO `program` VALUES ('112', '1', '8', '1', '0');
INSERT INTO `program` VALUES ('113', '1', '8', '2', '0');
INSERT INTO `program` VALUES ('114', '1', '8', '3', '0');
INSERT INTO `program` VALUES ('115', '1', '9', '1', '0');
INSERT INTO `program` VALUES ('116', '1', '9', '2', '0');
INSERT INTO `program` VALUES ('117', '1', '9', '3', '0');
INSERT INTO `program` VALUES ('118', '1', '10', '1', '0');
INSERT INTO `program` VALUES ('119', '1', '10', '2', '0');
INSERT INTO `program` VALUES ('120', '1', '10', '3', '0');
INSERT INTO `program` VALUES ('121', '1', '11', '1', '0');
INSERT INTO `program` VALUES ('122', '1', '11', '2', '0');
INSERT INTO `program` VALUES ('123', '1', '11', '3', '0');
INSERT INTO `program` VALUES ('124', '1', '12', '1', '0');
INSERT INTO `program` VALUES ('125', '1', '12', '2', '0');
INSERT INTO `program` VALUES ('126', '1', '12', '3', '0');
INSERT INTO `program` VALUES ('127', '1', '13', '1', '0');
INSERT INTO `program` VALUES ('128', '1', '13', '2', '0');
INSERT INTO `program` VALUES ('129', '1', '13', '3', '0');
INSERT INTO `program` VALUES ('130', '1', '14', '1', '0');
INSERT INTO `program` VALUES ('131', '1', '14', '2', '0');
INSERT INTO `program` VALUES ('132', '1', '14', '3', '0');
INSERT INTO `program` VALUES ('133', '1', '15', '1', '0');
INSERT INTO `program` VALUES ('134', '1', '15', '2', '0');
INSERT INTO `program` VALUES ('135', '1', '15', '3', '0');

-- ----------------------------
-- Table structure for `project_centrifugues`
-- ----------------------------
DROP TABLE IF EXISTS `project_centrifugues`;
CREATE TABLE `project_centrifugues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `maker` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `variator` int(11) DEFAULT NULL,
  `maxrpm` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_centrifugues
-- ----------------------------
INSERT INTO `project_centrifugues` VALUES ('1', '1', 'QMAX', 'lgs', '1', '1000', '0');
INSERT INTO `project_centrifugues` VALUES ('2', '1', 'DESARROLLO22', 'hgs', '1', '500', '0');
INSERT INTO `project_centrifugues` VALUES ('3', '1', 'JOSE', 'hgs', '1', '1000', '0');
INSERT INTO `project_centrifugues` VALUES ('4', '1', 'PATERNINA', 'lgs', '0', '2000', '0');
INSERT INTO `project_centrifugues` VALUES ('5', '1', 'PANASONIC', 'hgs', '1', '2000', '1');
INSERT INTO `project_centrifugues` VALUES ('6', '1', 'PANASONIC', 'hgs', '1', '1000', '1');

-- ----------------------------
-- Table structure for `project_materials`
-- ----------------------------
DROP TABLE IF EXISTS `project_materials`;
CREATE TABLE `project_materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `erp_id` varchar(255) DEFAULT NULL,
  `commercial_name` varchar(255) DEFAULT NULL,
  `unit` int(255) DEFAULT NULL,
  `egravity` float DEFAULT NULL,
  `internal_name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `used_in_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_materials
-- ----------------------------
INSERT INTO `project_materials` VALUES ('1', '1', null, 'Acido Citrico', '2', '1', null, '20', '1');
INSERT INTO `project_materials` VALUES ('2', '1', null, 'Bactericida Q CIDE L25', '2', '1.1', null, '10', '1');
INSERT INTO `project_materials` VALUES ('3', '1', null, 'Barita', '1', '4.2', null, '15', '0');
INSERT INTO `project_materials` VALUES ('4', '1', null, 'Bicarbonato de Sodio', '1', '2.16', null, '10', '1');
INSERT INTO `project_materials` VALUES ('5', '1', null, 'CACO3 10-40', '1', '2.7', null, '10', '0');
INSERT INTO `project_materials` VALUES ('6', '1', null, 'CACO3 M 200', '1', '2.7', null, '10', '0');
INSERT INTO `project_materials` VALUES ('7', '1', null, 'CACO3 M 325', '1', '2.7', null, '10', '0');
INSERT INTO `project_materials` VALUES ('8', '1', null, 'CACO3 M 40-100', '1', '2.7', null, '10', '0');
INSERT INTO `project_materials` VALUES ('9', '1', null, 'CACO3 M 50-150', '1', '2.7', null, '10', '0');
INSERT INTO `project_materials` VALUES ('10', '1', null, 'CAL HIDRATADA', '1', '1.42', null, '10', '1');
INSERT INTO `project_materials` VALUES ('11', '1', null, 'CASCARILLA DE ARROZ', '1', '0.55', null, '10', '0');
INSERT INTO `project_materials` VALUES ('12', '1', null, 'DESCO', '1', '1', null, '10', '0');

-- ----------------------------
-- Table structure for `project_mudcleaner`
-- ----------------------------
DROP TABLE IF EXISTS `project_mudcleaner`;
CREATE TABLE `project_mudcleaner` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_mudcleaner
-- ----------------------------
INSERT INTO `project_mudcleaner` VALUES ('1', '1', '', '1150', null, '5.8', null, null, '4.2', null, 'SH01', null, null, '0');
INSERT INTO `project_mudcleaner` VALUES ('2', '1', '', '333', null, '34.5', null, null, '54.2', null, 'TOSHIBA', null, null, '0');
INSERT INTO `project_mudcleaner` VALUES ('3', '1', '', 'LALALLA', null, '0', null, null, '0', null, 'QMAX', null, null, '0');
INSERT INTO `project_mudcleaner` VALUES ('4', '1', '', 'PATERNINA', '1', '5.6', '5_4', '1', '6.1', '6_5', 'JOSEDANIEL', '3', 'circular', '0');
INSERT INTO `project_mudcleaner` VALUES ('5', '1', '', 'PATERNINA', '16', '3.5', '4_3', '13', '5', '4_3', 'JOSE DANIEL', '2', 'circular', '0');
INSERT INTO `project_mudcleaner` VALUES ('6', '1', 'JOSE', 'PATERNINA', '5', '3.4', '4_3', '6', '4', '5_5', 'JOSE DANIEL', '4', 'circular', '0');
INSERT INTO `project_mudcleaner` VALUES ('7', '1', 'DESARROLLO', '22', '1', '3.4', '5_4', '1', '3.4', '4_6', 'LALALAL', '2', 'eliptico', '1');

-- ----------------------------
-- Table structure for `project_report_centrifugues`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_centrifugues`;
CREATE TABLE `project_report_centrifugues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_centrifugues_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `speed` varchar(45) DEFAULT NULL,
  `overflow` varchar(45) DEFAULT NULL,
  `underflow` varchar(45) DEFAULT NULL,
  `feet_rate` varchar(45) DEFAULT NULL,
  `operational_hours` varchar(45) DEFAULT NULL,
  `bowl_diam` varchar(45) DEFAULT NULL,
  `bowl_pulley` varchar(45) DEFAULT NULL,
  `motor_pulley` varchar(45) DEFAULT NULL,
  `motor` varchar(45) DEFAULT NULL,
  `speed_rpm` varchar(45) DEFAULT NULL,
  `g_force` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_centrifugues_project_centrifugues_idx` (`project_centrifugues_id`) USING BTREE,
  KEY `fk_project_report_centrifugues_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_centrifugues_project_centrifugues` FOREIGN KEY (`project_centrifugues_id`) REFERENCES `project_centrifugues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_project_report_centrifugues_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_centrifugues
-- ----------------------------
INSERT INTO `project_report_centrifugues` VALUES ('15', '5', '21', '', '', '', '', '', '', '', '', '', null, '', '');
INSERT INTO `project_report_centrifugues` VALUES ('16', '6', '21', '', '', '', '', '', '', '', '', '', null, '', '');

-- ----------------------------
-- Table structure for `project_report_mudcleaner`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_mudcleaner`;
CREATE TABLE `project_report_mudcleaner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_mudcleaner_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `desander_flow` varchar(45) DEFAULT NULL,
  `desander_presure` varchar(45) DEFAULT NULL,
  `desander_hours` varchar(45) DEFAULT NULL,
  `destiler_flow` varchar(45) DEFAULT NULL,
  `destiler_presure` varchar(45) DEFAULT NULL,
  `destiler_hours` varchar(45) DEFAULT NULL,
  `screens1` varchar(45) DEFAULT NULL,
  `screens2` varchar(45) DEFAULT NULL,
  `screens3` varchar(45) DEFAULT NULL,
  `screens4` varchar(45) DEFAULT NULL,
  `screens5` varchar(45) DEFAULT NULL,
  `operational_hours` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_mudcleaner_project_mudcleaner_idx` (`project_mudcleaner_id`) USING BTREE,
  KEY `fk_project_report_mudcleaner_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_mudcleaner_project_mudcleaner` FOREIGN KEY (`project_mudcleaner_id`) REFERENCES `project_mudcleaner` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_project_report_mudcleaner_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_mudcleaner
-- ----------------------------
INSERT INTO `project_report_mudcleaner` VALUES ('8', '7', '21', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `project_report_personal`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_personal`;
CREATE TABLE `project_report_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `personal_categories_id` int(11) DEFAULT NULL,
  `turn` varchar(45) DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_personal_personal_idx` (`personal_id`) USING BTREE,
  KEY `fk_project_report_personal_personal_categories_idx` (`personal_categories_id`) USING BTREE,
  KEY `fk_project_report_personal_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_personal_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_project_report_personal_personal_categories` FOREIGN KEY (`personal_categories_id`) REFERENCES `personal_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_project_report_personal_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_personal
-- ----------------------------

-- ----------------------------
-- Table structure for `project_report_shakers`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_shakers`;
CREATE TABLE `project_report_shakers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_shakers_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `operational_hours` varchar(45) DEFAULT NULL,
  `screens1` varchar(45) DEFAULT NULL,
  `screens2` varchar(45) DEFAULT NULL,
  `screens3` varchar(45) DEFAULT NULL,
  `screens4` varchar(45) DEFAULT NULL,
  `screens5` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_shakers_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_shakers_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_shakers
-- ----------------------------
INSERT INTO `project_report_shakers` VALUES ('22', '31', '21', '', '', '', '', '', '');
INSERT INTO `project_report_shakers` VALUES ('23', '32', '21', '', '', '', '', '', '');
INSERT INTO `project_report_shakers` VALUES ('24', '33', '21', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `project_report_test`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_test`;
CREATE TABLE `project_report_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `hour` time DEFAULT '00:00:00',
  `value` varchar(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_project_report_test_program_idx` (`program_id`) USING BTREE,
  KEY `fk_project_report_test_reports_idx` (`report_id`) USING BTREE,
  KEY `fk_project_report_test_test_idx` (`test_id`) USING BTREE,
  CONSTRAINT `project_report_test_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `project_report_test_ibfk_2` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `project_report_test_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=832 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_report_test
-- ----------------------------
INSERT INTO `project_report_test` VALUES ('718', '21', '1', '3', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('719', '21', '1', '3', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('720', '21', '1', '3', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('721', '21', '2', '6', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('722', '21', '2', '6', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('723', '21', '2', '6', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('724', '21', '3', '9', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('725', '21', '3', '9', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('726', '21', '3', '9', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('727', '21', '4', '12', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('728', '21', '4', '12', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('729', '21', '4', '12', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('730', '21', '5', '15', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('731', '21', '5', '15', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('732', '21', '5', '15', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('733', '21', '6', '18', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('734', '21', '6', '18', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('735', '21', '6', '18', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('736', '21', '7', '21', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('737', '21', '7', '21', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('738', '21', '7', '21', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('739', '21', '8', '24', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('740', '21', '8', '24', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('741', '21', '8', '24', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('742', '21', '9', '27', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('743', '21', '9', '27', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('744', '21', '9', '27', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('745', '21', '10', '30', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('746', '21', '10', '30', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('747', '21', '10', '30', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('748', '21', '11', '33', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('749', '21', '11', '33', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('750', '21', '11', '33', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('751', '21', '12', '36', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('752', '21', '12', '36', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('753', '21', '12', '36', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('754', '21', '13', '39', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('755', '21', '13', '39', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('756', '21', '13', '39', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('757', '21', '14', '42', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('758', '21', '14', '42', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('759', '21', '14', '42', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('760', '21', '15', '45', '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('761', '21', '15', '45', '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('762', '21', '15', '45', '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('763', '21', '17', null, '06:00:00', '45');
INSERT INTO `project_report_test` VALUES ('764', '21', '17', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('765', '21', '17', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('766', '21', '18', null, '06:00:00', '32');
INSERT INTO `project_report_test` VALUES ('767', '21', '18', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('768', '21', '18', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('769', '21', '19', null, '06:00:00', '54');
INSERT INTO `project_report_test` VALUES ('770', '21', '19', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('771', '21', '19', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('772', '21', '20', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('773', '21', '20', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('774', '21', '20', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('775', '21', '21', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('776', '21', '21', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('777', '21', '21', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('778', '21', '22', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('779', '21', '22', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('780', '21', '22', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('781', '21', '23', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('782', '21', '23', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('783', '21', '23', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('784', '21', '24', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('785', '21', '24', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('786', '21', '24', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('787', '21', '25', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('788', '21', '25', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('789', '21', '25', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('790', '21', '26', null, '06:00:00', '13');
INSERT INTO `project_report_test` VALUES ('791', '21', '26', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('792', '21', '26', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('793', '21', '27', null, '06:00:00', '19');
INSERT INTO `project_report_test` VALUES ('794', '21', '27', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('795', '21', '27', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('796', '21', '28', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('797', '21', '28', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('798', '21', '28', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('799', '21', '29', null, '06:00:00', '0.491');
INSERT INTO `project_report_test` VALUES ('800', '21', '29', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('801', '21', '29', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('802', '21', '30', null, '06:00:00', '1.498');
INSERT INTO `project_report_test` VALUES ('803', '21', '30', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('804', '21', '30', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('805', '21', '31', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('806', '21', '31', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('807', '21', '31', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('808', '21', '32', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('809', '21', '32', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('810', '21', '32', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('811', '21', '33', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('812', '21', '33', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('813', '21', '33', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('814', '21', '34', null, '06:00:00', '0.00');
INSERT INTO `project_report_test` VALUES ('815', '21', '34', null, '14:00:00', '0.00');
INSERT INTO `project_report_test` VALUES ('816', '21', '34', null, '23:00:00', '0.00');
INSERT INTO `project_report_test` VALUES ('817', '21', '35', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('818', '21', '35', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('819', '21', '35', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('820', '21', '36', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('821', '21', '36', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('822', '21', '36', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('823', '21', '37', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('824', '21', '37', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('825', '21', '37', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('826', '21', '38', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('827', '21', '38', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('828', '21', '38', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('829', '21', '39', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('830', '21', '39', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('831', '21', '39', null, '23:00:00', '0');

-- ----------------------------
-- Table structure for `project_shakers`
-- ----------------------------
DROP TABLE IF EXISTS `project_shakers`;
CREATE TABLE `project_shakers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `maker` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `nominal_flow` float DEFAULT NULL,
  `movement` varchar(255) DEFAULT NULL,
  `screens` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of project_shakers
-- ----------------------------
INSERT INTO `project_shakers` VALUES ('1', '1', 'lalal', 'lalala', '1', 'eliptico', '2', '0');
INSERT INTO `project_shakers` VALUES ('2', '1', 'PANASONIC', 'KXP1150', '1', 'circular', '3', '0');
INSERT INTO `project_shakers` VALUES ('3', '1', 'SALAMANDRA', '567654', '1', 'eliptico', '5', '0');
INSERT INTO `project_shakers` VALUES ('4', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('5', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('6', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('7', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('8', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('9', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('10', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('11', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('12', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('13', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('14', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('15', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('16', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('17', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('18', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('19', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('20', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('21', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('22', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('23', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('24', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('25', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('26', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('27', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('28', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '0');
INSERT INTO `project_shakers` VALUES ('29', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '0');
INSERT INTO `project_shakers` VALUES ('30', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '0');
INSERT INTO `project_shakers` VALUES ('31', '1', 'PANASONIC', '5654', '4.5', 'circular', '5', '1');
INSERT INTO `project_shakers` VALUES ('32', '1', 'SALAMANDRA', 'KXP', '34.9', 'eliptico', '3', '1');
INSERT INTO `project_shakers` VALUES ('33', '1', 'PANASONIC', 'L35', '3.2', 'lineal', '1', '1');

-- ----------------------------
-- Table structure for `project_tanks`
-- ----------------------------
DROP TABLE IF EXISTS `project_tanks`;
CREATE TABLE `project_tanks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `sh1` float DEFAULT NULL,
  `sa1` float DEFAULT NULL,
  `sl1` float DEFAULT NULL,
  `sh2` float DEFAULT NULL,
  `sa2` float DEFAULT NULL,
  `sl2` float DEFAULT NULL,
  `diametro` float DEFAULT NULL,
  `agitators` int(11) DEFAULT NULL,
  `jets` int(11) DEFAULT NULL,
  `voltkaforo` float DEFAULT NULL,
  `hlibremax` float DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_tanks
-- ----------------------------
INSERT INTO `project_tanks` VALUES ('1', '1', '0', '34', null, null, null, null, null, null, null, '2', '0', '100', '0', '6', '0');
INSERT INTO `project_tanks` VALUES ('2', '1', '0', '36', null, null, null, null, null, null, null, '2', '0', '500', '0', '4', '0');
INSERT INTO `project_tanks` VALUES ('3', '1', '0', '33', null, null, null, null, null, null, null, '0', '0', '1000', '0', '4', '0');
INSERT INTO `project_tanks` VALUES ('4', '1', '1', '3', '100', '100', '100', null, null, null, null, '1', '0', '103.1', '100', '1', '1');
INSERT INTO `project_tanks` VALUES ('5', '1', '1', '9', '100', '100', '100', null, null, null, null, '3', '0', '103.1', '100', '5', '1');
INSERT INTO `project_tanks` VALUES ('6', '1', '1', '12', '100', '100', '100', null, null, null, null, '0', '0', '103.1', '100', '4', '1');
INSERT INTO `project_tanks` VALUES ('7', '1', '1', '15', '100', '100', '100', null, null, null, null, '0', '0', '103.1', '100', '3', '1');
INSERT INTO `project_tanks` VALUES ('8', '1', '1', '16', '10', '10', '10', null, null, null, null, '0', '0', '0.1', '10', '6', '1');
INSERT INTO `project_tanks` VALUES ('9', '1', '1', '17', '10', '30', '20', null, null, null, null, '0', '0', '0.6', '10', '7', '1');
INSERT INTO `project_tanks` VALUES ('10', '1', '1', '18', '30', '20', '10', null, null, null, null, '0', '0', '0.6', '30', '8', '1');
INSERT INTO `project_tanks` VALUES ('11', '1', '1', '19', '30', '20', '10', null, null, null, null, '0', '0', '0.6', '30', '9', '1');
INSERT INTO `project_tanks` VALUES ('12', '1', '0', '33', null, null, null, null, null, null, null, '2', '0', '100', '0', '10', '1');
INSERT INTO `project_tanks` VALUES ('13', '1', '2', '5', '100', '100', '100', '100', '100', '100', null, '0', '0', '184.2', '200', '3', '0');
INSERT INTO `project_tanks` VALUES ('14', '1', '1', '1', '100', '100', '100', null, null, null, null, '0', '0', '103.1', '100', '2', '1');
INSERT INTO `project_tanks` VALUES ('15', '1', '1', '5', '100', '100', '100', null, null, null, null, '0', '0', '103.1', '100', '3', '1');

-- ----------------------------
-- Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
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
  `current_phase` int(11) DEFAULT NULL,
  `max_phase` int(1) DEFAULT '10',
  `operators` int(1) DEFAULT '1',
  `yard_workers` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('1', 'FCKGW', '2012-09-05 10:06:37', 'ORITO', 'PETROMINERALES', 'CAMBRIA1', 'ORITO', '0000', 'ORITO', '1', null, '2012-09-05 10:06:37', '2012-09-05', '0', '3', '3', '3', '3', '1', '0');

-- ----------------------------
-- Table structure for `report_materialstatus`
-- ----------------------------
DROP TABLE IF EXISTS `report_materialstatus`;
CREATE TABLE `report_materialstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report` int(11) DEFAULT NULL,
  `material` int(11) DEFAULT NULL,
  `initial` int(11) DEFAULT NULL,
  `received` int(11) DEFAULT NULL,
  `transfered` int(11) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of report_materialstatus
-- ----------------------------
INSERT INTO `report_materialstatus` VALUES ('1', '21', '1', '0', '500', '0', '0', '500');
INSERT INTO `report_materialstatus` VALUES ('2', '21', '2', '0', '500', '0', '0', '500');
INSERT INTO `report_materialstatus` VALUES ('3', '21', '4', '0', '500', '0', '0', '500');
INSERT INTO `report_materialstatus` VALUES ('4', '21', '10', '0', '500', '0', '0', '500');

-- ----------------------------
-- Table structure for `reports`
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `transactional_id` varchar(255) DEFAULT NULL COMMENT 'Este campo esta conformado por el id trasanccional del proyecto + el consecutivo del numero del reporte. Este id es el que va a enganchar la dependencia con las tablas hijas.',
  `project_transactional_id` varchar(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `generated` int(11) DEFAULT '0',
  `phase` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES ('1', '1', 'FCKGW_qflrpt_1', 'FCKGW', '2012-09-05', '1', '0', null);
INSERT INTO `reports` VALUES ('5', '1', 'FCKGW_qflrpt_2', 'FCKGW', '2012-09-06', '2', '0', null);
INSERT INTO `reports` VALUES ('6', '1', 'FCKGW_qflrpt_3', 'FCKGW', '2012-09-07', '3', '0', null);
INSERT INTO `reports` VALUES ('7', '1', 'FCKGW_qflrpt_4', 'FCKGW', '2012-09-08', '4', '0', null);
INSERT INTO `reports` VALUES ('8', '1', 'FCKGW_qflrpt_5', 'FCKGW', '2012-09-09', '5', '0', null);
INSERT INTO `reports` VALUES ('9', '1', 'FCKGW_qflrpt_6', 'FCKGW', '2012-09-10', '6', '0', null);
INSERT INTO `reports` VALUES ('10', '1', 'FCKGW_qflrpt_7', 'FCKGW', '2012-09-11', '7', '0', null);
INSERT INTO `reports` VALUES ('11', null, 'YXRKT01_qflrpt_1', 'YXRKT01', '2012-09-06', '1', '0', null);
INSERT INTO `reports` VALUES ('12', null, 'YXRKT01_qflrpt_2', 'YXRKT01', '2012-09-07', '2', '0', null);
INSERT INTO `reports` VALUES ('13', null, 'YXRKT01_qflrpt_3', 'YXRKT01', '2012-09-08', '3', '0', null);
INSERT INTO `reports` VALUES ('14', '1', 'FCKGW_qflrpt_8', 'FCKGW', '2012-09-12', '8', '0', null);
INSERT INTO `reports` VALUES ('15', null, 'QWERTY_qflrpt_1', 'QWERTY', '2012-09-11', '1', '0', null);
INSERT INTO `reports` VALUES ('16', '1', 'FCKGW_qflrpt_9', 'FCKGW', '2012-09-13', '9', '0', null);
INSERT INTO `reports` VALUES ('17', '1', 'FCKGW_qflrpt_10', 'FCKGW', '2012-09-14', '10', '0', '1');
INSERT INTO `reports` VALUES ('20', '1', 'FCKGW_qflrpt_11', 'FCKGW', '2012-09-15', '11', '0', '2');
INSERT INTO `reports` VALUES ('21', '1', 'FCKGW_qflrpt_12', 'FCKGW', '2012-09-16', '12', '0', '3');

-- ----------------------------
-- Table structure for `rig`
-- ----------------------------
DROP TABLE IF EXISTS `rig`;
CREATE TABLE `rig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `capacity` float DEFAULT NULL,
  `stand_lenght` varchar(45) DEFAULT NULL,
  `power_unit` varchar(45) DEFAULT NULL,
  `anular_model` varchar(45) DEFAULT NULL,
  `anular_capacity` float DEFAULT NULL,
  `pipe_ram` int(1) DEFAULT NULL,
  `pipe_ram_model` varchar(45) DEFAULT NULL,
  `pipe_ram_capacity` float DEFAULT NULL,
  `blind_ram` int(1) DEFAULT NULL,
  `blind_ram_model` varchar(45) DEFAULT NULL,
  `blind_ram_capacity` float DEFAULT NULL,
  `shear_ram` int(1) DEFAULT NULL,
  `shear_ram_model` varchar(45) DEFAULT NULL,
  `shear_ram_capacity` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rig_projects_idx` (`project_id`) USING BTREE,
  CONSTRAINT `fk_rig_projects` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of rig
-- ----------------------------

-- ----------------------------
-- Table structure for `stock_transfers`
-- ----------------------------
DROP TABLE IF EXISTS `stock_transfers`;
CREATE TABLE `stock_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `destiny` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of stock_transfers
-- ----------------------------
INSERT INTO `stock_transfers` VALUES ('4', '1235', '2012-10-19', 'bogota', 'ORITO (PETROMINERALES)', '1', 'incoming');
INSERT INTO `stock_transfers` VALUES ('5', '001', '2012-10-19', 'CERETE', 'ORITO (PETROMINERALES)', '1', 'incoming');

-- ----------------------------
-- Table structure for `tank_names`
-- ----------------------------
DROP TABLE IF EXISTS `tank_names`;
CREATE TABLE `tank_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tank_names
-- ----------------------------
INSERT INTO `tank_names` VALUES ('1', 'Trip tank', 'trip');
INSERT INTO `tank_names` VALUES ('2', 'Sand trap', 'active');
INSERT INTO `tank_names` VALUES ('3', 'Return 1', 'active');
INSERT INTO `tank_names` VALUES ('4', 'Return 2', 'active');
INSERT INTO `tank_names` VALUES ('5', 'Return 3', 'active');
INSERT INTO `tank_names` VALUES ('6', 'Intermediate 1', 'active');
INSERT INTO `tank_names` VALUES ('7', 'Intermediate 2', 'active');
INSERT INTO `tank_names` VALUES ('8', 'Intermediate 3', 'active');
INSERT INTO `tank_names` VALUES ('9', 'Suction 1', 'active');
INSERT INTO `tank_names` VALUES ('10', 'Suction 2', 'active');
INSERT INTO `tank_names` VALUES ('11', 'Suction 3', 'active');
INSERT INTO `tank_names` VALUES ('12', 'Pill 1', 'pill');
INSERT INTO `tank_names` VALUES ('13', 'Pill 2', 'pill');
INSERT INTO `tank_names` VALUES ('14', 'Pill 3', 'pill');
INSERT INTO `tank_names` VALUES ('15', 'Reserve 1', 'reserve');
INSERT INTO `tank_names` VALUES ('16', 'Reserve 2', 'reserve');
INSERT INTO `tank_names` VALUES ('17', 'Reserve 3', 'reserve');
INSERT INTO `tank_names` VALUES ('18', 'Reserve 4', 'reserve');
INSERT INTO `tank_names` VALUES ('19', 'Reserve 5', 'reserve');
INSERT INTO `tank_names` VALUES ('33', 'Storage 1', 'reserve');
INSERT INTO `tank_names` VALUES ('34', 'Storage 2', 'reserve');
INSERT INTO `tank_names` VALUES ('35', 'Storage 3', 'reserve');
INSERT INTO `tank_names` VALUES ('36', 'Storage 4', 'reserve');
INSERT INTO `tank_names` VALUES ('37', 'Storage 5', 'reserve');

-- ----------------------------
-- Table structure for `tank_status_time`
-- ----------------------------
DROP TABLE IF EXISTS `tank_status_time`;
CREATE TABLE `tank_status_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `report` int(11) DEFAULT NULL,
  `tank` int(11) NOT NULL,
  `producto_de` varchar(255) DEFAULT NULL COMMENT 'puede ser por transferencia o por adicion de quimica',
  `activo` int(11) DEFAULT NULL,
  `volumen_inicial` float DEFAULT NULL,
  `volumen_recibido` float DEFAULT NULL,
  `volumen_adicion_quimica` float DEFAULT NULL,
  `volumen_adicion_agua` float DEFAULT NULL,
  `volumen_construido` float DEFAULT NULL,
  `volumen_transferido_reservas` float DEFAULT NULL,
  `volumen_transferido_activo` float DEFAULT NULL,
  `volumen_perdido` float DEFAULT NULL,
  `volumen_final` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tank_status_time
-- ----------------------------

-- ----------------------------
-- Table structure for `tanks_types`
-- ----------------------------
DROP TABLE IF EXISTS `tanks_types`;
CREATE TABLE `tanks_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tanks_types
-- ----------------------------
INSERT INTO `tanks_types` VALUES ('1', 'Square');
INSERT INTO `tanks_types` VALUES ('2', 'Bottom Half Cylinder');
INSERT INTO `tanks_types` VALUES ('3', 'Trailer');
INSERT INTO `tanks_types` VALUES ('4', 'Horizontal Cylinder');

-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test` varchar(45) NOT NULL,
  `unit_test` varchar(10) NOT NULL,
  `type_test` int(1) NOT NULL,
  `custom` int(1) DEFAULT '0',
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', 'depth', 'ft', '1', '0', '1');
INSERT INTO `test` VALUES ('2', 'pit/flow line', '', '1', '0', '1');
INSERT INTO `test` VALUES ('3', 'flowline temp', 'ºF', '1', '0', '1');
INSERT INTO `test` VALUES ('4', 'mud weight', 'ppg', '1', '0', '1');
INSERT INTO `test` VALUES ('5', 'Funnel viscosity', 'sec/qt', '1', '0', '1');
INSERT INTO `test` VALUES ('6', 'API fl/cake', 'c.c./30min', '1', '0', '1');
INSERT INTO `test` VALUES ('7', 'Sand', '% vol', '1', '0', '1');
INSERT INTO `test` VALUES ('8', 'Lubricant', '% vol', '1', '0', '1');
INSERT INTO `test` VALUES ('9', 'Inhibitor', 'gpb', '1', '0', '1');
INSERT INTO `test` VALUES ('10', 'pH METER', '', '1', '0', '1');
INSERT INTO `test` VALUES ('11', 'PM', 'ml H2SO4', '1', '0', '1');
INSERT INTO `test` VALUES ('12', 'PF/MF', 'ml H2SO4', '1', '0', '1');
INSERT INTO `test` VALUES ('13', 'MBT', 'lb/bbl eq', '1', '0', '1');
INSERT INTO `test` VALUES ('14', 'CHLORIDES', 'mg/l', '1', '0', '1');
INSERT INTO `test` VALUES ('15', 'Ca++', 'mg/l', '1', '0', '1');
INSERT INTO `test` VALUES ('17', '&theta;600', '', '2', '0', '1');
INSERT INTO `test` VALUES ('18', '&theta;300', '', '2', '0', '1');
INSERT INTO `test` VALUES ('19', '&theta;200', '', '2', '0', '1');
INSERT INTO `test` VALUES ('20', '&theta;100', '', '2', '0', '1');
INSERT INTO `test` VALUES ('21', '&theta;6', '', '2', '0', '1');
INSERT INTO `test` VALUES ('22', '&theta;3', '', '2', '0', '1');
INSERT INTO `test` VALUES ('23', '10\"', '', '2', '0', '1');
INSERT INTO `test` VALUES ('24', '10\'', '', '2', '0', '1');
INSERT INTO `test` VALUES ('25', '30\'', '', '2', '0', '1');
INSERT INTO `test` VALUES ('26', 'pv', 'lbf/100 ft', '2', '0', '1');
INSERT INTO `test` VALUES ('27', 'yp', 'lbf/100 ft', '2', '0', '1');
INSERT INTO `test` VALUES ('28', 'ys', 'lbf/100 ft', '2', '0', '1');
INSERT INTO `test` VALUES ('29', 'n', '', '2', '0', '1');
INSERT INTO `test` VALUES ('30', 'k', '', '2', '0', '1');
INSERT INTO `test` VALUES ('31', 'c.c.i.', '', '2', '0', '1');
INSERT INTO `test` VALUES ('32', 'Water', '% Vol', '3', '0', '1');
INSERT INTO `test` VALUES ('33', 'Oil', '% Vol', '3', '0', '1');
INSERT INTO `test` VALUES ('34', 'Solids', '% Vol', '3', '0', '1');
INSERT INTO `test` VALUES ('35', 'ASG Solids', '', '3', '0', '1');
INSERT INTO `test` VALUES ('36', 'LGS', 'ppb', '3', '0', '1');
INSERT INTO `test` VALUES ('37', 'HGS', 'ppb', '3', '0', '1');
INSERT INTO `test` VALUES ('38', 'LGS vol', '% Vol', '3', '0', '1');
INSERT INTO `test` VALUES ('39', 'HGS vol', '% Vol', '3', '0', '1');
INSERT INTO `test` VALUES ('40', 'oscar', 'lb', '1', '1', '0');
INSERT INTO `test` VALUES ('41', 'pedro', 'gal', '1', '1', '0');
INSERT INTO `test` VALUES ('42', 'glymax', 'gpb', '1', '1', '0');
INSERT INTO `test` VALUES ('43', 'maxdrill', 'gpb', '1', '1', '0');
INSERT INTO `test` VALUES ('44', 'lube', 'gpb', '1', '1', '0');
INSERT INTO `test` VALUES ('45', 'lubricante', 'gpb', '1', '1', '0');
INSERT INTO `test` VALUES ('46', 'glymax', 'gpb', '1', '1', '0');
INSERT INTO `test` VALUES ('47', 'maxdrill', 'gpb', '1', '1', '0');
INSERT INTO `test` VALUES ('48', 'cst', 'lb', '1', '1', '0');
INSERT INTO `test` VALUES ('49', 'oscar', 'und', '1', '1', '0');

-- ----------------------------
-- Table structure for `volume_transfers`
-- ----------------------------
DROP TABLE IF EXISTS `volume_transfers`;
CREATE TABLE `volume_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `report` int(11) DEFAULT NULL,
  `destiny` int(11) DEFAULT NULL,
  `origin` int(11) DEFAULT NULL,
  `from_origin_status` int(11) DEFAULT NULL,
  `from_destiny_status` int(11) DEFAULT NULL,
  `to_origin_status` int(11) DEFAULT NULL,
  `to_destiny_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of volume_transfers
-- ----------------------------

-- ----------------------------
-- View structure for `vista_brocas`
-- ----------------------------
DROP VIEW IF EXISTS `vista_brocas`;
CREATE VIEW `vista_brocas` AS select `brocas_modelos`.`id` AS `id`,`brocas_modelos`.`id_broca` AS `id_broca`,`brocas_modelos`.`odfracc` AS `odfracc`,`brocas_modelos`.`unit_oddfracc` AS `unit_oddfracc`,`brocas_modelos`.`odddeci` AS `odddeci`,`brocas_modelos`.`unit_odddeci` AS `unit_odddeci`,`brocas_modelos`.`length` AS `length`,`brocas_modelos`.`unit_length` AS `unit_length`,`brocas_modelos`.`nombre_modelo` AS `nombre_modelo`,`brocas`.`nombre_broca` AS `nombre_broca`,`brocas_modelos`.`custom` AS `custom`,`brocas_modelos`.`active` AS `active`,`brocas_modelos`.`project_id` AS `project_id` from (`brocas` join `brocas_modelos` on((`brocas`.`id` = `brocas_modelos`.`id_broca`))) ;

-- ----------------------------
-- View structure for `vista_detalle_adicion_quimica`
-- ----------------------------
DROP VIEW IF EXISTS `vista_detalle_adicion_quimica`;
CREATE VIEW `vista_detalle_adicion_quimica` AS select `chemical_aditions_detail`.`id` AS `id`,`chemical_aditions_detail`.`chemical_adition` AS `chemical_adition`,`chemical_aditions_detail`.`material` AS `material`,`chemical_aditions_detail`.`used` AS `used`,`chemical_aditions_detail`.`volume_increment` AS `volume_increment`,`chemical_aditions`.`project` AS `project`,`chemical_aditions`.`report` AS `report`,`chemical_aditions`.`tank` AS `tank`,`chemical_aditions`.`total_volume_increment` AS `total_volume_increment`,`chemical_aditions`.`increment_by_chemical` AS `increment_by_chemical`,`chemical_aditions`.`increment_by_water` AS `increment_by_water`,`chemical_aditions`.`status_producido` AS `status_producido` from (`chemical_aditions_detail` left join `chemical_aditions` on((`chemical_aditions`.`id` = `chemical_aditions_detail`.`chemical_adition`))) ;

-- ----------------------------
-- View structure for `vista_materiales`
-- ----------------------------
DROP VIEW IF EXISTS `vista_materiales`;
CREATE VIEW `vista_materiales` AS select `project_materials`.`id` AS `id`,`project_materials`.`project_id` AS `project`,`project_materials`.`erp_id` AS `erp_id`,`project_materials`.`commercial_name` AS `commercial_name`,`project_materials`.`unit` AS `unit`,`project_materials`.`egravity` AS `egravity`,`project_materials`.`internal_name` AS `internal_name`,`project_materials`.`price` AS `price`,`project_materials`.`used_in_project` AS `used_in_project`,`conversions_table`.`nombre_unidad` AS `unit_name`,`conversions_table`.`equivalencia` AS `equivalencia`,`conversions_table`.`unidad_destino` AS `unidad_destino` from (`project_materials` left join `conversions_table` on((`conversions_table`.`id` = `project_materials`.`unit`))) ;

-- ----------------------------
-- View structure for `vista_inventario`
-- ----------------------------
DROP VIEW IF EXISTS `vista_inventario`;
CREATE VIEW `vista_inventario` AS select `vista_materiales`.`id` AS `product_id`,`vista_materiales`.`project` AS `project`,`vista_materiales`.`commercial_name` AS `commercial_name`,`inventory`.`received` AS `received`,`inventory`.`transfered` AS `transfered`,`inventory`.`used` AS `used`,`inventory`.`avaliable` AS `avaliable`,`vista_materiales`.`erp_id` AS `erp_id`,`vista_materiales`.`unit` AS `unit`,`vista_materiales`.`egravity` AS `egravity`,`vista_materiales`.`internal_name` AS `internal_name`,`vista_materiales`.`price` AS `price`,`vista_materiales`.`used_in_project` AS `used_in_project`,`vista_materiales`.`unit_name` AS `unit_name`,`vista_materiales`.`equivalencia` AS `equivalencia`,`vista_materiales`.`unidad_destino` AS `unidad_destino` from (`inventory` left join `vista_materiales` on((`vista_materiales`.`id` = `inventory`.`product`))) ;

-- ----------------------------
-- View structure for `vista_personal`
-- ----------------------------
DROP VIEW IF EXISTS `vista_personal`;
CREATE VIEW `vista_personal` AS select `personal`.`id` AS `id`,`personal`.`identification` AS `identification`,`personal`.`lastname` AS `lastname`,`personal`.`name` AS `name`,`personal`.`project` AS `project`,`personal`.`category` AS `category`,`personal_categories`.`name` AS `category_name`,`personal_categories`.`type` AS `type`,`personal`.`active` AS `active`,`personal`.`rate` AS `rate` from (`personal` join `personal_categories` on((`personal_categories`.`id` = `personal`.`category`))) ;

-- ----------------------------
-- View structure for `vista_reporte_estado_material`
-- ----------------------------
DROP VIEW IF EXISTS `vista_reporte_estado_material`;
CREATE VIEW `vista_reporte_estado_material` AS select `report_materialstatus`.`id` AS `id`,`vista_materiales`.`project` AS `project`,`report_materialstatus`.`report` AS `report`,`report_materialstatus`.`material` AS `material`,`vista_materiales`.`commercial_name` AS `commercial_name`,`vista_materiales`.`equivalencia` AS `equivalencia`,`vista_materiales`.`unidad_destino` AS `unidad_destino`,`report_materialstatus`.`initial` AS `initial`,`report_materialstatus`.`received` AS `received`,`report_materialstatus`.`transfered` AS `transfered`,`report_materialstatus`.`used` AS `used`,`report_materialstatus`.`stock` AS `stock`,`vista_materiales`.`egravity` AS `egravity`,`vista_materiales`.`price` AS `price` from (`report_materialstatus` left join `vista_materiales` on((`report_materialstatus`.`material` = `vista_materiales`.`id`))) ;

-- ----------------------------
-- View structure for `vista_reporte_personal`
-- ----------------------------
DROP VIEW IF EXISTS `vista_reporte_personal`;
CREATE VIEW `vista_reporte_personal` AS select `vista_personal`.`id` AS `id`,`vista_personal`.`identification` AS `identification`,`vista_personal`.`lastname` AS `lastname`,`vista_personal`.`name` AS `name`,`vista_personal`.`project` AS `project`,`vista_personal`.`category` AS `category`,`vista_personal`.`category_name` AS `category_name`,`vista_personal`.`type` AS `type`,`vista_personal`.`active` AS `active`,`vista_personal`.`rate` AS `rate`,`personal_report_enginers`.`date` AS `date`,`personal_report_enginers`.`cover` AS `cover`,`projects`.`well_name` AS `well_name`,`projects`.`operator` AS `operator` from ((`personal_report_enginers` left join `vista_personal` on((`vista_personal`.`id` = `personal_report_enginers`.`enginer`))) left join `projects` on((`projects`.`id` = `personal_report_enginers`.`project`))) ;

-- ----------------------------
-- View structure for `vista_tanks`
-- ----------------------------
DROP VIEW IF EXISTS `vista_tanks`;
CREATE VIEW `vista_tanks` AS select `project_tanks`.`id` AS `id`,`project_tanks`.`project` AS `project`,`project_tanks`.`type` AS `type`,`project_tanks`.`name` AS `name`,`project_tanks`.`sh1` AS `sh1`,`project_tanks`.`sa1` AS `sa1`,`project_tanks`.`sl1` AS `sl1`,`project_tanks`.`sh2` AS `sh2`,`project_tanks`.`sa2` AS `sa2`,`project_tanks`.`sl2` AS `sl2`,`project_tanks`.`diametro` AS `diametro`,`project_tanks`.`agitators` AS `agitators`,`project_tanks`.`jets` AS `jets`,`project_tanks`.`voltkaforo` AS `voltkaforo`,`project_tanks`.`hlibremax` AS `hlibremax`,`project_tanks`.`active` AS `active`,`tank_names`.`name` AS `tank_name`,`tanks_types`.`name` AS `tank_type`,`tank_names`.`type` AS `tank_category`,`project_tanks`.`order` AS `order` from ((`project_tanks` left join `tank_names` on((`tank_names`.`id` = `project_tanks`.`name`))) left join `tanks_types` on((`tanks_types`.`id` = `project_tanks`.`type`))) ;
