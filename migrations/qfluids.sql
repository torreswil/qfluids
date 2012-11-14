/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : qfluids

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-11-08 10:51:33
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of casing
-- ----------------------------
INSERT INTO `casing` VALUES ('1', '1 1/20', '1.050', 'in', '0,824', '0.824', 'in', '1.140', 'ppf', '0', '1', '1');
INSERT INTO `casing` VALUES ('2', '1 23/73', '1.315', 'in', '1,049', '1.049', 'in', '1.700', 'ppf', '0', '1', '1');
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

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'SAMPLE', 'QWERTY', '0');

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
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `prefijo` varchar(255) DEFAULT NULL,
  `equivalencia` float DEFAULT NULL,
  `unidad_destino` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of conversions_table
-- ----------------------------
INSERT INTO `conversions_table` VALUES ('1', 'CN5', 'CN', '5', 'gal');
INSERT INTO `conversions_table` VALUES ('2', 'SX55', 'SX', '55', 'lb');
INSERT INTO `conversions_table` VALUES ('3', 'TN1', 'TN1', '2005', 'lb');
INSERT INTO `conversions_table` VALUES ('4', 'SX100', 'SX', '100', 'lb');
INSERT INTO `conversions_table` VALUES ('5', 'SX2', 'SX', '2', 'lb');
INSERT INTO `conversions_table` VALUES ('6', 'SX110', 'SX', '110', 'lb');
INSERT INTO `conversions_table` VALUES ('7', 'SX50', 'SX', '50', 'lb');
INSERT INTO `conversions_table` VALUES ('8', 'SX22', 'SX', '22', 'lb');
INSERT INTO `conversions_table` VALUES ('9', 'SX25', 'SX', '25', 'lb');
INSERT INTO `conversions_table` VALUES ('10', 'SX40', 'SX', '40', 'lb');
INSERT INTO `conversions_table` VALUES ('11', 'SX80', 'SX', '80', 'lb');
INSERT INTO `conversions_table` VALUES ('12', 'SX15', 'SX', '15', 'lb');
INSERT INTO `conversions_table` VALUES ('13', 'SX30', 'SX', '30', 'lb');
INSERT INTO `conversions_table` VALUES ('14', 'SX44', 'SX', '44', 'lb');
INSERT INTO `conversions_table` VALUES ('15', 'TM55', 'TM', '55', 'gal');
INSERT INTO `conversions_table` VALUES ('16', 'IBC', 'IBC', '260', 'gal');
INSERT INTO `conversions_table` VALUES ('17', 'DIA', 'DIA', '1', 'DIA');
INSERT INTO `conversions_table` VALUES ('18', 'UNIDAD', 'UNIDAD', '1', 'UND');
INSERT INTO `conversions_table` VALUES ('19', 'IBC263', 'IBC', '263', 'gal');

-- ----------------------------
-- Table structure for `equipamento`
-- ----------------------------
DROP TABLE IF EXISTS `equipamento`;
CREATE TABLE `equipamento` (
  `A` varchar(20) DEFAULT NULL,
  `B` varchar(40) DEFAULT NULL,
  `C` varchar(47) DEFAULT NULL,
  `D` varchar(21) DEFAULT NULL,
  `E` varchar(39) DEFAULT NULL,
  `F` varchar(84) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipamento
-- ----------------------------
INSERT INTO `equipamento` VALUES ('Código de artículo', 'Nombre del Producto', 'Descripción Detallada', 'Unidad de Inventarios', null, null);
INSERT INTO `equipamento` VALUES ('N0121000001', 'CARRO TANQUE 6000 GAL CAPACIDAD 0 -50 KM', 'Carro Tanque 6000 Gal Capacidad 0 -50 Km', 'Dia', null, null);
INSERT INTO `equipamento` VALUES ('N0121000002', 'EXCEDENTE MOV O DESMOV AREAS VIAJE', 'Excedente Mov o Desmov Areas Viaje', 'Un', 'und', 'un es el codigo de la erp para el reporte nosostros lo debemos mostrar como und jose');
INSERT INTO `equipamento` VALUES ('N0121000003', 'MOVILIZACION - DESMOVILIZACION', 'Movilizacion - Desmovilizacion', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0121000004', 'TRANSPORTE CAMIONETA', 'Transporte Camioneta', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0121000005', 'TRANSPORTE SENCILLO', 'Transporte Sencillo', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0121000006', 'TRANSPORTE TRACTOMULA', 'Transporte Tractomula', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0121000007', 'TRANSPORTE TURBO', 'Transporte Turbo', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0122000001', 'CARTUCHOS FILTRANTES', 'Cartuchos Filtrantes', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0122000002', 'CASETA DE FILTRACION', 'Caseta de Filtracion', 'Dia', null, null);
INSERT INTO `equipamento` VALUES ('N0122000003', 'PREMIX TANK 250 bbl ', 'Premix Tank 250 Bbl ', 'Dia', null, null);
INSERT INTO `equipamento` VALUES ('N0122000004', 'PREMIX TANK 300 bbl ', 'Premix Tank 300 Bbl ', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0122000005', 'PREMIX TANK 350 bbl ', 'Premix Tank 350 Bbl ', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0122000006', 'UNIDAD DE FLOCULACION SELECTIVA', 'Unidad De Floculacion Selectiva', 'Dia', null, null);
INSERT INTO `equipamento` VALUES ('N0122000007', 'UNIDAD FILTRADO', 'Unidad Filtrado', 'Dia', null, null);
INSERT INTO `equipamento` VALUES ('N0122000008', 'UNIDAD FILTRADO STAND BY', 'Unidad Filtrado Stand By', 'Dia', null, null);
INSERT INTO `equipamento` VALUES ('N0122000009', 'SILO DE 350 FT3 O 60 TON', 'Silo de 350 ft3 o 60 ton', 'Dia', null, null);
INSERT INTO `equipamento` VALUES ('N0122000010', 'COMPRESOR SISTEMA DE SILIOS', 'Compresor sistema de silos', 'Dia', null, null);
INSERT INTO `equipamento` VALUES ('N0122000011', 'ANILLOS DE CORROSION', 'Anillo de corrosión - Incluye envio y analisis', 'Un', 'que lo cambie el nombre de la categoria', null);
INSERT INTO `equipamento` VALUES ('N0120000001', 'SISTEMA Q MAX DRILL PHPA (3600-7500)', 'Sistema Q Max Drill Phpa (3600-7500)', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0120000002', 'SISTEMA Q Nca', 'Sistema Q Nca', 'Un', null, null);
INSERT INTO `equipamento` VALUES ('N0120000003', 'SISTEMA Q Nca (500-3600)', 'Sistema Q Nca (500-3600)', 'Un', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory
-- ----------------------------
INSERT INTO `inventory` VALUES ('1', '1', '0', '0', '0', '1', '0');
INSERT INTO `inventory` VALUES ('2', '3', '0', '0', '0', '1', '0');
INSERT INTO `inventory` VALUES ('3', '6', '0', '0', '0', '1', '0');
INSERT INTO `inventory` VALUES ('4', '7', '0', '0', '0', '1', '0');

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
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory_movements
-- ----------------------------

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
-- Table structure for `maestra_equipos`
-- ----------------------------
DROP TABLE IF EXISTS `maestra_equipos`;
CREATE TABLE `maestra_equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `erp_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `unit_description` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of maestra_equipos
-- ----------------------------
INSERT INTO `maestra_equipos` VALUES ('1', 'N0121000001', 'CARRO TANQUE 6000 GAL CAPACIDAD 0 -50 KM', '17', 'Carro Tanque 6000 Gal Capacidad 0 -50 Km', '1', 'Dia');
INSERT INTO `maestra_equipos` VALUES ('2', 'N0121000002', 'EXCEDENTE MOV O DESMOV AREAS VIAJE', '18', 'Excedente Mov o Desmov Areas Viaje', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('3', 'N0121000003', 'MOVILIZACION - DESMOVILIZACION', '18', 'Movilizacion - Desmovilizacion', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('4', 'N0121000004', 'TRANSPORTE CAMIONETA', '18', 'Transporte Camioneta', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('5', 'N0121000005', 'TRANSPORTE SENCILLO', '18', 'Transporte Sencillo', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('6', 'N0121000006', 'TRANSPORTE TRACTOMULA', '18', 'Transporte Tractomula', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('7', 'N0121000007', 'TRANSPORTE TURBO', '18', 'Transporte Turbo', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('8', 'N0122000001', 'CARTUCHOS FILTRANTES', '18', 'Cartuchos Filtrantes', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('9', 'N0122000002', 'CASETA DE FILTRACION', '17', 'Caseta de Filtracion', '1', 'Dia');
INSERT INTO `maestra_equipos` VALUES ('10', 'N0122000003', 'PREMIX TANK 250 bbl', '17', 'Premix Tank 250 Bbl', '1', 'Dia');
INSERT INTO `maestra_equipos` VALUES ('11', 'N0122000004', 'PREMIX TANK 300 bbl', '18', 'Premix Tank 300 Bbl', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('12', 'N0122000005', 'PREMIX TANK 350 bbl', '18', 'Premix Tank 350 Bbl', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('13', 'N0122000006', 'UNIDAD DE FLOCULACION SELECTIVA', '17', 'Unidad De Floculacion Selectiva', '1', 'Dia');
INSERT INTO `maestra_equipos` VALUES ('14', 'N0122000007', 'UNIDAD FILTRADO', '17', 'Unidad Filtrado', '1', 'Dia');
INSERT INTO `maestra_equipos` VALUES ('15', 'N0122000008', 'UNIDAD FILTRADO STAND BY', '17', 'Unidad Filtrado Stand By', '1', 'Dia');
INSERT INTO `maestra_equipos` VALUES ('16', 'N0122000009', 'SILO DE 350 FT3 O 60 TON', '17', 'Silo de 350 ft3 o 60 ton', '1', 'Dia');
INSERT INTO `maestra_equipos` VALUES ('17', 'N0122000010', 'COMPRESOR SISTEMA DE SILIOS', '17', 'Compresor sistema de silos', '1', 'Dia');
INSERT INTO `maestra_equipos` VALUES ('18', 'N0122000011', 'ANILLOS DE CORROSION', '18', 'Anillo de corrosión - Incluye envio y analisis', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('19', 'N0120000001', 'SISTEMA Q MAX DRILL PHPA (3600-7500)', '18', 'Sistema Q Max Drill Phpa (3600-7500)', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('20', 'N0120000002', 'SISTEMA Q Nca', '18', 'Sistema Q Nca', '1', 'Un');
INSERT INTO `maestra_equipos` VALUES ('21', 'N0120000003', 'SISTEMA Q Nca (500-3600)', '18', 'Sistema Q Nca (500-3600)', '1', 'Un');

-- ----------------------------
-- Table structure for `maestra_materials`
-- ----------------------------
DROP TABLE IF EXISTS `maestra_materials`;
CREATE TABLE `maestra_materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `erp_id` varchar(255) DEFAULT NULL,
  `internal_name` varchar(255) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `egravity` float DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `unit_description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of maestra_materials
-- ----------------------------
INSERT INTO `maestra_materials` VALUES ('1', 'N0108000001', 'ACELERATOR XLA', '1', '1', '1', 'Acelerador - Poly plug', 'CN5');
INSERT INTO `maestra_materials` VALUES ('2', 'N0110000001', 'ACIDO CITRICO EN CRISTALES', '2', '1.665', '1', 'Regulador de pH para contaminación con cemento', 'SX55');
INSERT INTO `maestra_materials` VALUES ('3', 'N0110000002', 'ALKAPAM', '2', '0.8', '1', 'Polímero para tratamiento de sólidos', 'SX55');
INSERT INTO `maestra_materials` VALUES ('4', 'N0103000001', 'BARITA', '3', '4.25', '1', 'Material densificante - Barita', 'Tn1');
INSERT INTO `maestra_materials` VALUES ('5', 'N0103000002', 'BARITA', '4', '4.25', '1', 'Material densificante - Barita', 'SX100');
INSERT INTO `maestra_materials` VALUES ('6', 'N0105000001', 'BENEX', '5', '0.644', '1', 'Extendedor de Bentonita', 'Sx2');
INSERT INTO `maestra_materials` VALUES ('7', 'N0105000002', 'BENTONITA NATURAL GEL', '4', '2.5', '1', 'Bentonita Premium tipo Wyoming Viscosificante', 'SX100');
INSERT INTO `maestra_materials` VALUES ('8', 'N0105000003', 'BENTONITA REGULAR', '4', '2.5', '1', 'Bentonita Nacional', 'Sx100');
INSERT INTO `maestra_materials` VALUES ('9', 'N0110000003', 'BICARBONATO DE SODIO', '2', '2.159', '1', 'Precipitador de Ca++', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('10', 'N0110000004', 'BICARBONATO DE SODIO', '6', '2.159', '1', 'Precipitador de Ca++', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('11', 'N0110000005', 'BLACK MAGIC SFT', '7', '0', '1', 'Aditivo espoteante para liberación de pegas diferenciales (SFT) - Liberador de tubería SFT', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('12', 'N0109000002', 'BRIDGESAL ULTRA', '7', '2.18', '1', 'Sal puenteante de diferente granulometría', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('13', 'N0110000006', 'CAL HIDRATADA', '4', '3', '1', 'Cal Hidratada.  Regulador de pH', 'Sx100');
INSERT INTO `maestra_materials` VALUES ('14', 'N0110000007', 'CAL HIDRATADA', '8', '3', '1', 'Cal Hidratada.  Regulador de pH', 'Sx22');
INSERT INTO `maestra_materials` VALUES ('15', 'N0110000008', 'CAL HIDRATADA', '9', '3', '1', 'Cal Hidratada.  Regulador de pH', 'Sx25');
INSERT INTO `maestra_materials` VALUES ('16', 'N0110000009', 'CAL HIDRATADA', '2', '3', '1', 'Cal Hidratada.  Regulador de pH', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('17', 'N0110000010', 'CAL VIVA', '3', '3.3', '1', 'Cal Viva', 'Tn1');
INSERT INTO `maestra_materials` VALUES ('18', 'N0110000011', 'CAL VIVA', '2', '3.3', '1', 'Cal Viva', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('19', 'N0103000003', 'CARBONATO DE CALCIO', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('20', 'N0103000004', 'CARBONATO DE CALCIO M1000', '2', '2.7', '1', 'Material densificante y puenteante', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('21', 'N0103000005', 'CARBONATO DE CALCIO M10-40', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('22', 'N0103000006', 'CARBONATO DE CALCIO M1200', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('23', 'N0103000007', 'CARBONATO DE CALCIO M200', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('24', 'N0103000008', 'CARBONATO DE CALCIO M325', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('25', 'N0103000009', 'CARBONATO DE CALCIO M400', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('26', 'N0103000010', 'CARBONATO DE CALCIO M40-100', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('27', 'N0103000011', 'CARBONATO DE CALCIO M50-150', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('28', 'N0103000012', 'CARBONATO DE CALCIO M5-10', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('29', 'N0103000013', 'CARBONATO DE CALCIO M600', '6', '2.7', '1', 'Material densificante y puenteante', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('30', 'N0108000002', 'CASCARILLA DE ARROZ', '9', '0.7', '1', 'Cascarilla de arroz. LCM', 'SX25');
INSERT INTO `maestra_materials` VALUES ('31', 'N0108000003', 'CASCARILLA DE ARROZ', '10', '0.7', '1', 'Cascarilla de arroz. LCM', 'Sx40');
INSERT INTO `maestra_materials` VALUES ('32', 'N0104000001', 'CESCO', '7', '0', '1', 'Estabilizador de Shale - Asfalto Soplado', 'SX50');
INSERT INTO `maestra_materials` VALUES ('33', 'N0104000002', 'CESCO', '10', '0', '1', 'Estabilizador de Shale - Asfalto Soplado', 'Sx40');
INSERT INTO `maestra_materials` VALUES ('34', 'N0105000004', 'CLAYTONE II', '7', '1.57', '1', 'Arcilla organofílica', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('35', 'N0105000005', 'CLAYTONE II', '2', '1.57', '1', 'Arcilla organofílica', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('36', 'N0109000003', 'CLORURO DE CALCIO', '2', '2.2', '1', 'Cloruro de calcio. Sal - (95% pureza)', 'SX55');
INSERT INTO `maestra_materials` VALUES ('37', 'N0109000004', 'CLORURO DE CALCIO', '11', '2.2', '1', 'Cloruro de calcio. Sal - (95% pureza)', 'Sx80');
INSERT INTO `maestra_materials` VALUES ('38', 'N0109000005', 'CLORURO DE POTASIO', '6', '1.988', '1', 'Cloruro de potasio. Sal - Pureza >95%', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('39', 'N0109000006', 'CLORURO DE POTASIO', '2', '1.988', '1', 'Cloruro de potasio. Sal - Pureza >95%', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('40', 'N0109000007', 'CLORURO DE SODIO', '6', '2.16', '1', 'Colururo de Sodio. Sal', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('41', 'N0107000001', 'CYDRIL 5300', '1', '0.85', '1', 'PHPA Liquido', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('42', 'N0107000002', 'CYDRILL 4000', '15', '0.85', '1', 'PHPA Liquido', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('43', 'N0106000001', 'CYPAN N', '7', '1.5', '1', 'Copolimero controlador de filtrado', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('44', 'N0110000012', 'CYTEMP', '1', '2.2', '1', 'Adelgazante polimérico', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('45', 'N0110000013', 'DESCO CF', '9', '1.6', '1', 'Dispersante - Tanino libre de cromo', 'SX25');
INSERT INTO `maestra_materials` VALUES ('46', 'N0110000014', 'DESCO CF', '12', '1.6', '1', 'Dispersante', 'Sx15');
INSERT INTO `maestra_materials` VALUES ('47', 'N0106000002', 'DRISCAL D', '9', '1.033', '1', 'Polímero controlador de filtrado para zona de interés HTHP', 'Sx25');
INSERT INTO `maestra_materials` VALUES ('48', 'N0106000003', 'DRISCAL D', '12', '1.033', '1', 'Polímero controlador de filtrado para zona de interés HTHP', 'Sx15');
INSERT INTO `maestra_materials` VALUES ('49', 'N0106000004', 'DRISCAL D', '7', '1.033', '1', 'Polímero controlador de filtrado para zona de interés HTHP', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('50', 'N0110000015', 'ESTEARATO DE ALUMINIO', '13', '1.01', '1', 'Antiespumante - Estereato de aluminio', 'Sx30');
INSERT INTO `maestra_materials` VALUES ('51', 'N0110000016', 'ESTEARATO DE ALUMINIO', '14', '1.01', '1', 'Antiespumante - Estereato de aluminio', 'Sx44');
INSERT INTO `maestra_materials` VALUES ('52', 'N0110000017', 'ESTEARATO DE ALUMINIO', '7', '1.01', '1', 'Antiespumante - Estereato de aluminio', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('53', 'N0109000008', 'FORMIATO DE POTASIO', '2', '1.08', '1', 'Sal - Formiato de potasio sólido', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('54', 'N0109000009', 'FORMIATO DE POTASIO', '6', '1.08', '1', 'Sal - Formiato de potasio sólido', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('55', 'N0109000010', 'FORMIATO DE POTASIO LIQUIDO', '15', '1.2', '1', 'Salmuera - Formiato de potasio líquido. 13 lpg', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('56', 'N0109000011', 'FORMIATO DE SODIO', '2', '0.94', '1', 'Sal - Formiato de sodio', 'SX55');
INSERT INTO `maestra_materials` VALUES ('57', 'N0102000001', 'GILSONITE HT', '7', '1.5', '1', 'Asfalto en polvo OBM - HPHT Controlador De Filtrado.EmulsioInvertida', 'SX50');
INSERT INTO `maestra_materials` VALUES ('58', 'N0107000003', 'GLYMAX', '15', '1.1', '1', 'Glicol polialquilenico -  Lubricante e inhibidor de arcillas', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('59', 'N0104000003', 'GRAFITE', '7', '2.25', '1', 'Material puenteante y sellante - Grafito material obturante (F.M.C)', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('60', 'N0104000004', 'GRAFITE', '2', '2.25', '1', 'Material puenteante y sellante - Grafito material obturante (F.M.C)', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('61', 'N0104000005', 'GRAFITE', '4', '0', '1', 'Material puenteante y sellante - Grafito material obturante (F.M.C)', 'Sx100');
INSERT INTO `maestra_materials` VALUES ('62', 'N0103000014', 'HEMATITA', '4', '4.7', '1', 'Material densificante - Hematita', 'Sx100');
INSERT INTO `maestra_materials` VALUES ('63', 'N0105000006', 'KELZAN XCD', '2', '1.5', '1', 'Goma xántica.  Viscosificante - BiopolímeroPremium.GomaXanticaDispersa', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('64', 'N0108000004', 'KWIK SEAL', '10', '1.05', '1', 'LMC - (F.M.C)', 'Sx40');
INSERT INTO `maestra_materials` VALUES ('65', 'N0110000018', 'LIGNITO', '7', '1.7', '1', 'Lignito', 'SX50');
INSERT INTO `maestra_materials` VALUES ('66', 'N0110000019', 'LIGNITO K 17', '7', '1.7', '1', 'Lignito Caustizado. Dispersante y Controlador de Filtrado', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('67', 'N0110000020', 'LUBRAGLIDE COARSE', '7', '1.06', '1', 'Lubricante Sólido - Lubricante mecánico tipo microesfereas de Copolímero', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('68', 'N0110000021', 'LUBRAGLIDE FINE', '7', '1.06', '1', 'Lubricante Sólido - Lubricante mecánico tipo microesfereas de Copolímero', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('69', 'N0110000022', 'MF 55', '1', '1.01', '1', 'Floculante selectivo', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('70', 'N0108000005', 'MICA', '9', '2.09', '1', 'LMC - (F.M.C)', 'Sx25');
INSERT INTO `maestra_materials` VALUES ('71', 'N0108000006', 'MICA', '10', '2.09', '1', 'LMC - (F.M.C)', 'Sx40');
INSERT INTO `maestra_materials` VALUES ('72', 'N0108000007', 'MICA', '7', '2.09', '1', 'LMC - (F.M.C)', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('73', 'N0108000008', 'MICA', '2', '2.09', '1', 'LMC - (F.M.C)', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('74', 'N0107000004', 'NITRATO DE CALCIO LIQUIDO', '19', '1', '1', 'Nitrato de calcio. Inhibidor de arcilla', 'IBC263');
INSERT INTO `maestra_materials` VALUES ('75', 'N0110000023', 'OXIDO DE MAGNESIO', '2', '3.56', '1', 'Oxido de Magnesio - ph Buffer', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('76', 'N0110000024', 'OXIDO DE MAGNESIO', '6', '3.56', '1', 'Oxido de Magnesio - ph Buffer', 'Sx110');
INSERT INTO `maestra_materials` VALUES ('77', 'N0110000025', 'OXIDO DE MAGNESIO', '7', '3.56', '1', 'Oxido de Magnesio - ph Buffer', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('78', 'N0110000026', 'OXIDO DE ZINC', '2', '0.9', '1', 'Oxido de Zinc - Removedor de H2S', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('79', 'N0110000027', 'PIPELAX W', '15', '1', '1', 'Fluido liberador de tubería', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('80', 'N0109000012', 'PLUGSAL X', '7', '2.17', '1', 'Sal puenteante', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('81', 'N0108000009', 'POLY PLUG', '10', '0.91', '1', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', 'Sx40');
INSERT INTO `maestra_materials` VALUES ('82', 'N0108000010', 'POLY PLUG', '9', '0.91', '1', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', 'SX25');
INSERT INTO `maestra_materials` VALUES ('83', 'N0108000011', 'POLY PLUG', '7', '0.91', '1', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('84', 'N0110000028', 'POTASA CAUSTICA EN ESCAMAS', '2', '2.04', '1', 'Alcalinizante - Hidroxido De Potasio', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('85', 'N0110000029', 'Q CF THINNER', '7', '1.14', '1', 'Adelgazante', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('86', 'N0110000030', 'Q CIDE L14', '1', '1.08', '1', 'Glutaraldehido - Bactericida Biocida', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('87', 'N0110000031', 'Q CIDE L25', '1', '1.08', '1', 'Glutaraldehido - Bactericida Biocida', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('88', 'N0104000006', 'Q CS GRAFITO', '7', '1.8', '1', 'Material puenteante y sellante', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('89', 'N0110000032', 'Q DRILL UP', '15', '1.031', '1', 'Lubricante y reductor de torque - Anti-acresión y anti embotamiento (base hidrocarburo y/o vegetal)', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('90', 'N0108000012', 'Q FIBER', '10', '1.2', '1', 'Material celulósico fibroso (fino. medio grueso) - Fibra Mineral Especial', 'Sx40');
INSERT INTO `maestra_materials` VALUES ('91', 'N0110000033', 'Q FREE', '15', '0.91', '1', 'Liberador de tubería - Agente Liberador', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('92', 'N0107000005', 'Q INHIBIDROL G', '15', '1.06', '1', 'Amina en base a glicol.  Inhibidor de arcilla - Inhibidor de arcilla (tipo Amina base Glicol)', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('93', 'N0110000034', 'Q KLEEN', '15', '1.061', '1', 'Agente Surfactante - Surfactante para limpieza de tubería WBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('94', 'N0110000035', 'Q KLEEN', '1', '1.061', '1', 'Agente Surfactante - Surfactante para limpieza de tubería WBM', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('95', 'N0110000036', 'Q LUBE', '15', '1.016', '1', 'Lubricante OBM Mejorador de ROP (base hidrocarburos) - Reductor de torque de origen vegetal', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('96', 'N0107000006', 'Q MAX DRILL', '15', '1.07', '1', 'Amina. Inhibidor de arcilla - Estabilizador De Shale Y Arcilla', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('97', 'N0102000002', 'Q MOD', '15', '1.01', '1', 'Modificador de reología lecturas bajas OBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('98', 'N0105000007', 'Q MUL GEL', '7', '1.57', '1', 'Arcilla Organofilica OBM', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('99', 'N0102000003', 'Q MUL I', '15', '0.9', '1', 'Emulsificador Primario OBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('100', 'N0102000004', 'Q MUL II', '15', '0.945', '1', 'Emulsificador Secundario OBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('101', 'N0107000007', 'Q NH 423', '15', '1', '1', 'Inhibidor de arcilla tipo amina cuaternaria', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('102', 'N0107000008', 'Q NK', '2', '2.109', '1', 'Nitrato de Potasio. Inhibidor de Arcillas', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('103', 'N0110000037', 'Q NOFOAM', '1', '0.9', '1', 'Antiespumante líquido mezcla de alcoholes de alto peso molecular y ácidos grasos modificados', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('104', 'N0105000008', 'Q ORGANOVIS', '7', '0', '1', 'Arcilla organofílica', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('105', 'N0106000005', 'Q PAC L', '7', '0.8', '1', 'Polímero controlador de filtrado LV - Celulosa polianionica de baja viscosidad', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('106', 'N0106000006', 'Q PAC R', '7', '0.8', '1', 'Polímero controlador de filtrado y viscosificante HV - Celulosa polianionica de alta viscosidad', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('107', 'N0110000038', 'Q PHPA', '7', '0.8', '1', 'Encapsulador de arcilla PHPA', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('108', 'N0106000007', 'Q STAR HT', '7', '2.109', '1', 'Almidón controlador de filtrado para zona de interés - Almidon Para Alta Temperatura', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('109', 'N0106000008', 'Q STAR LV', '7', '2.109', '1', 'Almidón de papa modificado', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('110', 'N0108000013', 'Q STOP', '4', '0.613', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', 'SX100');
INSERT INTO `maestra_materials` VALUES ('111', 'N0108000014', 'Q STOP', '9', '0.613', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', 'SX25');
INSERT INTO `maestra_materials` VALUES ('112', 'N0108000015', 'Q STOP', '10', '0.613', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', 'SX40');
INSERT INTO `maestra_materials` VALUES ('113', 'N0108000016', 'Q STOP', '7', '0.613', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('114', 'N0108000017', 'Q STOP', '2', '0.613', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('115', 'N0109000013', 'Q TDL 13', '1', '0.86', '1', 'Inhibidor de Corrosion', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('116', 'N0109000014', 'Q TDL 15', '1', '0.86', '1', 'Inhibidor de Corrosion', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('117', 'N0109000015', 'Q TDL 16', '15', '0.86', '1', 'Inhibidor de Corrosion', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('118', 'N0102000005', 'Q THINN O', '15', '1.25', '1', 'Adelgazante OBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('119', 'N0106000009', 'Q THINTEX', '1', '0.6', '1', 'Adelgazante polimérico - Defoculante Polimérico', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('120', 'N0102000006', 'Q WET', '15', '0.955', '1', 'Humectante OBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('121', 'N0105000009', 'Q XAN XCD', '2', '1.5', '1', 'Goma xántica.  Viscosificante - Goma de xanthan', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('122', 'N0105000010', 'Q XAN XCD', '9', '1.5', '1', 'Goma xántica.  Viscosificante - Goma de xanthan', 'Sx25');
INSERT INTO `maestra_materials` VALUES ('123', 'N0105000011', 'Q XAN XCD', '7', '1.5', '1', 'Goma xántica.  Viscosificante - Goma de xanthan', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('124', 'N0110000039', 'SALTEXTIL', '4', '0', '1', 'SAPP', 'SX100');
INSERT INTO `maestra_materials` VALUES ('125', 'N0108000018', 'SEAL XLR', '1', '1', '1', 'Retardante. Poly plug - Polímero entrecruzado retardante (pérdidas de circulación)', 'Cn5');
INSERT INTO `maestra_materials` VALUES ('126', 'N0107000009', 'SILICATO DE POTASIO', '15', '1.26', '1', 'Silicato de Potasio', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('127', 'N0110000040', 'SODA CAUSTICA', '2', '2.13', '1', 'Soda Caustica - Controlador de pH. Alcalinizante', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('128', 'N0110000041', 'SODA CAUSTICA', '7', '2.13', '1', 'Soda Caustica - Controlador de pH. Alcalinizante', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('129', 'N0110000042', 'SODA CAUSTICA', '8', '2.13', '1', 'Soda Caustica - Controlador de pH. Alcalinizante', 'Sx22');
INSERT INTO `maestra_materials` VALUES ('130', 'N0104000007', 'SOLTEX', '7', '1.35', '1', 'Asfalto sulfonato soloble en agua - Control Shale', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('131', 'N0107000010', 'STOKOPOL', '2', '0.8', '1', 'PHPA Poliacrilamida. Inhibidor mecánico de arcillas', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('132', 'N0107000011', 'STOKOPOL', '7', '0.8', '1', 'PHPA Poliacrilamida. Inhibidor mecánico de arcillas', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('133', 'N0110000043', 'SULFITO DE SODIO', '2', '2.6', '1', 'Secuestrante de Oxigeno', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('134', 'N0110000044', 'SUPER SWEEP', '12', '1', '1', 'Fibra de monofilamentos usada como agente de barrido', 'Sx15');
INSERT INTO `maestra_materials` VALUES ('135', 'N0110000045', 'SUPER SWEEP', '9', '1', '1', 'Fibra de monofilamentos usada como agente de barrido', 'Sx25');
INSERT INTO `maestra_materials` VALUES ('136', 'N0107000012', 'SYNERFLOC A25D', '2', '0.8', '1', 'PHPA Solido - Polímero inhibidor  de arcillas y encapsulante bajo peso molecular (sistema HPWBM)', 'Sx55');
INSERT INTO `maestra_materials` VALUES ('137', 'N0107000013', 'SYNERFLOC A25D', '7', '0.8', '1', 'PHPA Solido - Polímero inhibidor  de arcillas y encapsulante bajo peso molecular (sistema HPWBM)', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('138', 'N0102000007', 'TENAZAMOD', '15', '1', '1', 'Modificador de reología OBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('139', 'N0102000008', 'TENAZAWET', '15', '1', '1', 'Humectante OBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('140', 'N0109000016', 'ULTRASAL 20R/30R', '7', '0', '1', 'Sal puenteante de granulometría específica', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('141', 'N0102000009', 'VERSAMOD', '15', '1.01', '1', 'Modificador de reología OBM', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('142', 'N0102000010', 'VERSATHIN', '15', '0.825', '1', 'Adelgazante para lodo base aceite', 'Tm55');
INSERT INTO `maestra_materials` VALUES ('143', 'N0102000011', 'VERSATROL', '7', '1.05', '1', 'Lignito Organofilico - Controlador de filtrado fluidos base aceite', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('144', 'N0108000019', 'WAL NUT PLUG', '7', '2.2', '1', 'Cascara de Nuez (F.M.G) - LCM', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('145', 'N0110000046', 'WL 100', '7', '0', '1', 'WL 100', 'Sx50');
INSERT INTO `maestra_materials` VALUES ('146', 'N0108000020', 'X LINK', '10', '1.2', '1', 'Polímero para control de pérdidas de circulación - PolÍmero Entrecruzado', 'Sx40');

-- ----------------------------
-- Table structure for `materiales`
-- ----------------------------
DROP TABLE IF EXISTS `materiales`;
CREATE TABLE `materiales` (
  `A` int(3) DEFAULT NULL,
  `B` varchar(20) DEFAULT NULL,
  `C` varchar(27) DEFAULT NULL,
  `D` varchar(102) DEFAULT NULL,
  `E` varchar(21) DEFAULT NULL,
  `F` varchar(19) DEFAULT NULL,
  `G` varchar(10) DEFAULT NULL,
  `H` varchar(10) DEFAULT NULL,
  `I` varchar(10) DEFAULT NULL,
  `J` varchar(10) DEFAULT NULL,
  `K` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of materiales
-- ----------------------------
INSERT INTO `materiales` VALUES (null, 'Código de artículo', 'Nombre del Producto', 'Descripción Detallada', 'Unidad de Inventarios', 'Gravedad Especifica', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('1', 'N0108000001', 'ACELERATOR XLA', 'Acelerador - Poly plug', 'CN5', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('2', 'N0110000001', 'ACIDO CITRICO EN CRISTALES', 'Regulador de pH para contaminación con cemento', 'SX55', '1,665', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('3', 'N0110000002', 'ALKAPAM', 'Polímero para tratamiento de sólidos', 'SX55', '0,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('4', 'N0103000001', 'BARITA ', 'Material densificante - Barita', 'Tn1', '4,25', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('5', 'N0103000002', 'BARITA ', 'Material densificante - Barita', 'SX100', '4,25', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('6', 'N0105000001', 'BENEX', 'Extendedor de Bentonita', 'Sx2', '0,644', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('7', 'N0105000002', 'BENTONITA NATURAL GEL', 'Bentonita Premium tipo Wyoming Viscosificante', 'SX100', '2,5', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('8', 'N0105000003', 'BENTONITA REGULAR', 'Bentonita Nacional', 'Sx100', '2,5', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('9', 'N0110000003', 'BICARBONATO DE SODIO', 'Precipitador de Ca++', 'Sx55', '2,159', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('10', 'N0110000004', 'BICARBONATO DE SODIO', 'Precipitador de Ca++', 'Sx110', '2,159', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('11', 'N0110000005', 'BLACK MAGIC SFT', 'Aditivo espoteante para liberación de pegas diferenciales (SFT) - Liberador de tubería SFT', 'Sx50', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('12', 'N0109000002', 'BRIDGESAL ULTRA', 'Sal puenteante de diferente granulometría', 'Sx50', '2,18', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('13', 'N0110000006', 'CAL HIDRATADA', 'Cal Hidratada. Regulador de pH', 'Sx100', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('14', 'N0110000007', 'CAL HIDRATADA', 'Cal Hidratada. Regulador de pH', 'Sx22', '3', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('15', 'N0110000008', 'CAL HIDRATADA', 'Cal Hidratada. Regulador de pH', 'Sx25', '3', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('16', 'N0110000009', 'CAL HIDRATADA', 'Cal Hidratada. Regulador de pH', 'Sx55', '3', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('17', 'N0110000010', 'CAL VIVA', 'Cal Viva', 'Tn1', '3,3', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('18', 'N0110000011', 'CAL VIVA', 'Cal Viva', 'Sx55', '3,3', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('19', 'N0103000003', 'CARBONATO DE CALCIO', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('20', 'N0103000004', 'CARBONATO DE CALCIO M1000', 'Material densificante y puenteante', 'Sx55', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('21', 'N0103000005', 'CARBONATO DE CALCIO M10-40', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('22', 'N0103000006', 'CARBONATO DE CALCIO M1200', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('23', 'N0103000007', 'CARBONATO DE CALCIO M200', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('24', 'N0103000008', 'CARBONATO DE CALCIO M325', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('25', 'N0103000009', 'CARBONATO DE CALCIO M400', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('26', 'N0103000010', 'CARBONATO DE CALCIO M40-100', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('27', 'N0103000011', 'CARBONATO DE CALCIO M50-150', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('28', 'N0103000012', 'CARBONATO DE CALCIO M5-10', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('29', 'N0103000013', 'CARBONATO DE CALCIO M600', 'Material densificante y puenteante', 'Sx110', '2,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('30', 'N0108000002', 'CASCARILLA DE ARROZ', 'Cascarilla de arroz. LCM', 'SX25', '0,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('31', 'N0108000003', 'CASCARILLA DE ARROZ', 'Cascarilla de arroz. LCM', 'Sx40', '0,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('32', 'N0104000001', 'CESCO', 'Estabilizador de Shale - Asfalto Soplado', 'SX50', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('33', 'N0104000002', 'CESCO', 'Estabilizador de Shale - Asfalto Soplado', 'Sx40', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('34', 'N0105000004', 'CLAYTONE II', 'Arcilla organofílica', 'Sx50', '1,57', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('35', 'N0105000005', 'CLAYTONE II', 'Arcilla organofílica', 'Sx55', '1,57', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('36', 'N0109000003', 'CLORURO DE CALCIO', 'Cloruro de calcio. Sal - (95% pureza)', 'SX55', '2,2', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('37', 'N0109000004', 'CLORURO DE CALCIO', 'Cloruro de calcio. Sal - (95% pureza)', 'Sx80', '2,2', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('38', 'N0109000005', 'CLORURO DE POTASIO ', 'Cloruro de potasio. Sal - Pureza >95%', 'Sx110', '1,988', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('39', 'N0109000006', 'CLORURO DE POTASIO ', 'Cloruro de potasio. Sal - Pureza >95%', 'Sx55', '1,988', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('40', 'N0109000007', 'CLORURO DE SODIO', 'Colururo de Sodio. Sal', 'Sx110', '2,16', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('41', 'N0107000001', 'CYDRIL 5300', 'PHPA Liquido', 'Cn5', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('42', 'N0107000002', 'CYDRILL 4000', 'PHPA Liquido', 'Sx55', '0,85', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('43', 'N0106000001', 'CYPAN N', 'Copolimero controlador de filtrado', 'Sx50', '1,5', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('44', 'N0110000012', 'CYTEMP', 'Adelgazante polimérico', 'Cn5', '2,2', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('45', 'N0110000013', 'DESCO CF', 'Dispersante - Tanino libre de cromo', 'SX25', '1,6', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('46', 'N0110000014', 'DESCO CF', 'Dispersante ', 'Sx15', '1,6', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('47', 'N0106000002', 'DRISCAL D', 'Polímero controlador de filtrado para zona de interés HTHP', 'Sx25', '1,033', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('48', 'N0106000003', 'DRISCAL D', 'Polímero controlador de filtrado para zona de interés HTHP', 'Sx15', '1,033', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('49', 'N0106000004', 'DRISCAL D', 'Polímero controlador de filtrado para zona de interés HTHP', 'Sx50', '1,033', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('50', 'N0110000015', 'ESTEARATO DE ALUMINIO', 'Antiespumante - Estereato de aluminio', 'Sx30', '1,01', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('51', 'N0110000016', 'ESTEARATO DE ALUMINIO', 'Antiespumante - Estereato de aluminio', 'Sx44', '1,01', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('52', 'N0110000017', 'ESTEARATO DE ALUMINIO', 'Antiespumante - Estereato de aluminio', 'Sx50', '1,01', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('53', 'N0109000008', 'FORMIATO DE POTASIO', 'Sal - Formiato de potasio sólido', 'Sx55', '1,08', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('54', 'N0109000009', 'FORMIATO DE POTASIO', 'Sal - Formiato de potasio sólido', 'Sx110', '1,08', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('55', 'N0109000010', 'FORMIATO DE POTASIO LIQUIDO', 'Salmuera - Formiato de potasio líquido, 13 lpg', 'Tm55', '1,2', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('56', 'N0109000011', 'FORMIATO DE SODIO', 'Sal - Formiato de sodio', 'SX55', '0,94', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('57', 'N0102000001', 'GILSONITE HT', 'Asfalto en polvo OBM - HPHT Controlador De Filtrado,EmulsioInvertida', 'SX50', '1,5', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('58', 'N0107000003', 'GLYMAX', 'Glicol polialquilenico - Lubricante e inhibidor de arcillas', 'Tm55', '1,1', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('59', 'N0104000003', 'GRAFITE', 'Material puenteante y sellante - Grafito material obturante (F,M,C)', 'Sx50', '2,25', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('60', 'N0104000004', 'GRAFITE', 'Material puenteante y sellante - Grafito material obturante (F,M,C)', 'Sx55', '2,25', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('61', 'N0104000005', 'GRAFITE', 'Material puenteante y sellante - Grafito material obturante (F,M,C)', 'Sx100', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('62', 'N0103000014', 'HEMATITA', 'Material densificante - Hematita', 'Sx100', '4,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('63', 'N0105000006', 'KELZAN XCD', 'Goma xántica. Viscosificante - BiopolímeroPremium,GomaXanticaDispersa', 'Sx55', '1,5', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('64', 'N0108000004', 'KWIK SEAL', 'LMC - (F,M,C)', 'Sx40', '1,05', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('65', 'N0110000018', 'LIGNITO ', 'Lignito', 'SX50', '1,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('66', 'N0110000019', 'LIGNITO K 17', 'Lignito Caustizado. Dispersante y Controlador de Filtrado', 'Sx50', '1,7', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('67', 'N0110000020', 'LUBRAGLIDE COARSE', 'Lubricante Sólido - Lubricante mecánico tipo microesfereas de Copolímero', 'Sx50', '1,06', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('68', 'N0110000021', 'LUBRAGLIDE FINE', 'Lubricante Sólido - Lubricante mecánico tipo microesfereas de Copolímero', 'Sx50', '1,06', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('69', 'N0110000022', 'MF 55', 'Floculante selectivo', 'Cn5', '1,01', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('70', 'N0108000005', 'MICA', 'LMC - (F,M,C)', 'Sx25', '2,09', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('71', 'N0108000006', 'MICA', 'LMC - (F,M,C)', 'Sx40', '2,09', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('72', 'N0108000007', 'MICA', 'LMC - (F,M,C)', 'Sx50', '2,09', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('73', 'N0108000008', 'MICA', 'LMC - (F,M,C)', 'Sx55', '2,09', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('74', 'N0107000004', 'NITRATO DE CALCIO LIQUIDO ', 'Nitrato de calcio. Inhibidor de arcilla', 'IBC', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('75', 'N0110000023', 'OXIDO DE MAGNESIO', 'Oxido de Magnesio - ph Buffer', 'Sx55', '3,56', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('76', 'N0110000024', 'OXIDO DE MAGNESIO', 'Oxido de Magnesio - ph Buffer', 'Sx110', '3,56', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('77', 'N0110000025', 'OXIDO DE MAGNESIO', 'Oxido de Magnesio - ph Buffer', 'Sx50', '3,56', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('78', 'N0110000026', 'OXIDO DE ZINC', 'Oxido de Zinc - Removedor de H2S', 'Sx55', '0,9', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('79', 'N0110000027', 'PIPELAX W', 'Fluido liberador de tubería', 'Tm55', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('80', 'N0109000012', 'PLUGSAL X', 'Sal puenteante', 'Sx50', '2,17', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('81', 'N0108000009', 'POLY PLUG', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', 'Sx40', '0,91', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('82', 'N0108000010', 'POLY PLUG', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', 'SX25', '0,91', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('83', 'N0108000011', 'POLY PLUG', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', 'Sx50', '0,91', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('84', 'N0110000028', 'POTASA CAUSTICA EN ESCAMAS', 'Alcalinizante - Hidroxido De Potasio', 'Sx55', '2,04', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('85', 'N0110000029', 'Q CF THINNER', 'Adelgazante', 'Sx50', '1,14', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('86', 'N0110000030', 'Q CIDE L14', 'Glutaraldehido - Bactericida Biocida', 'Cn5', '1,08', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('87', 'N0110000031', 'Q CIDE L25', 'Glutaraldehido - Bactericida Biocida', 'Cn5', '1,08', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('88', 'N0104000006', 'Q CS GRAFITO', 'Material puenteante y sellante', 'Sx50', '1,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('89', 'N0110000032', 'Q DRILL UP', 'Lubricante y reductor de torque - Anti-acresión y anti embotamiento (base hidrocarburo y/o vegetal)', 'Tm55', '1,031', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('90', 'N0108000012', 'Q FIBER', 'Material celulósico fibroso (fino, medio grueso) - Fibra Mineral Especial', 'Sx40', '1,2', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('91', 'N0110000033', 'Q FREE', 'Liberador de tubería - Agente Liberador', 'Tm55', '0,91', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('92', 'N0107000005', 'Q INHIBIDROL G', 'Amina en base a glicol. Inhibidor de arcilla - Inhibidor de arcilla (tipo Amina base Glicol)', 'Tm55', '1,06', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('93', 'N0110000034', 'Q KLEEN', 'Agente Surfactante - Surfactante para limpieza de tubería WBM', 'Tm55', '1,061', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('94', 'N0110000035', 'Q KLEEN', 'Agente Surfactante - Surfactante para limpieza de tubería WBM', 'Cn5', '1,061', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('95', 'N0110000036', 'Q LUBE', 'Lubricante OBM Mejorador de ROP (base hidrocarburos) - Reductor de torque de origen vegetal', 'Tm55', '1,016', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('96', 'N0107000006', 'Q MAX DRILL', 'Amina. Inhibidor de arcilla - Estabilizador De Shale Y Arcilla', 'Tm55', '1,07', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('97', 'N0102000002', 'Q MOD', 'Modificador de reología lecturas bajas OBM', 'Tm55', '1,01', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('98', 'N0105000007', 'Q MUL GEL', 'Arcilla Organofilica OBM', 'Sx50', '1,57', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('99', 'N0102000003', 'Q MUL I', 'Emulsificador Primario OBM', 'Tm55', '0,9', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('100', 'N0102000004', 'Q MUL II', 'Emulsificador Secundario OBM', 'Tm55', '0,945', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('101', 'N0107000007', 'Q NH 423', 'Inhibidor de arcilla tipo amina cuaternaria', 'Tm55', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('102', 'N0107000008', 'Q NK', 'Nitrato de Potasio. Inhibidor de Arcillas', 'Sx55', '2,109', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('103', 'N0110000037', 'Q NOFOAM', 'Antiespumante líquido mezcla de alcoholes de alto peso molecular y ácidos grasos modificados', 'Cn5', '0,9', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('104', 'N0105000008', 'Q ORGANOVIS', 'Arcilla organofílica', 'Sx50', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('105', 'N0106000005', 'Q PAC L', 'Polímero controlador de filtrado LV - Celulosa polianionica de baja viscosidad', 'Sx50', '0,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('106', 'N0106000006', 'Q PAC R', 'Polímero controlador de filtrado y viscosificante HV - Celulosa polianionica de alta viscosidad', 'Sx50', '0,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('107', 'N0110000038', 'Q PHPA', 'Encapsulador de arcilla PHPA', 'Sx50', '0,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('108', 'N0106000007', 'Q STAR HT', 'Almidón controlador de filtrado para zona de interés - Almidon Para Alta Temperatura', 'Sx50', '2,109', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('109', 'N0106000008', 'Q STAR LV', 'Almidón de papa modificado', 'Sx50', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('110', 'N0108000013', 'Q STOP ', 'Material fibroso para pérdida de circulación (Zona Interes) - (F,M,G)', 'SX100', '0,613', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('111', 'N0108000014', 'Q STOP ', 'Material fibroso para pérdida de circulación (Zona Interes) - (F,M,G)', 'SX25', '0,613', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('112', 'N0108000015', 'Q STOP ', 'Material fibroso para pérdida de circulación (Zona Interes) - (F,M,G)', 'SX40', '0,613', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('113', 'N0108000016', 'Q STOP ', 'Material fibroso para pérdida de circulación (Zona Interes) - (F,M,G)', 'Sx50', '0,613', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('114', 'N0108000017', 'Q STOP ', 'Material fibroso para pérdida de circulación (Zona Interes) - (F,M,G)', 'Sx55', '0,613', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('115', 'N0109000013', 'Q TDL 13', 'Inhibidor de Corrosion ', 'Cn5', '0,86', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('116', 'N0109000014', 'Q TDL 15', 'Inhibidor de Corrosion ', 'Cn5', '0,86', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('117', 'N0109000015', 'Q TDL 16', 'Inhibidor de Corrosion ', 'Tm55', '0,86', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('118', 'N0102000005', 'Q THINN O', 'Adelgazante OBM', 'Tm55', '1,25', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('119', 'N0106000009', 'Q THINTEX', 'Adelgazante polimérico - Defoculante Polimérico', 'Cn5', '0,6', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('120', 'N0102000006', 'Q WET', 'Humectante OBM', 'Tm55', '0,955', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('121', 'N0105000009', 'Q XAN XCD', 'Goma xántica. Viscosificante - Goma de xanthan', 'Sx55', '1,5', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('122', 'N0105000010', 'Q XAN XCD', 'Goma xántica. Viscosificante - Goma de xanthan', 'Sx25', '1,5', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('123', 'N0105000011', 'Q XAN XCD', 'Goma xántica. Viscosificante - Goma de xanthan', 'Sx50', '1,5', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('124', 'N0110000039', 'SALTEXTIL', 'SAPP', 'SX100', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('125', 'N0108000018', 'SEAL XLR', 'Retardante. Poly plug - Polímero entrecruzado retardante (pérdidas de circulación)', 'Cn5', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('126', 'N0107000009', 'SILICATO DE POTASIO', 'Silicato de Potasio', 'Tm55', '1,26', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('127', 'N0110000040', 'SODA CAUSTICA', 'Soda Caustica - Controlador de pH. Alcalinizante', 'Sx55', '2,13', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('128', 'N0110000041', 'SODA CAUSTICA', 'Soda Caustica - Controlador de pH. Alcalinizante', 'Sx50', '2,13', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('129', 'N0110000042', 'SODA CAUSTICA', 'Soda Caustica - Controlador de pH. Alcalinizante', 'Sx22', '2,13', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('130', 'N0104000007', 'SOLTEX', 'Asfalto sulfonato soloble en agua - Control Shale', 'Sx50', '1,35', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('131', 'N0107000010', 'STOKOPOL', 'PHPA Poliacrilamida. Inhibidor mecánico de arcillas', 'Sx55', '0,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('132', 'N0107000011', 'STOKOPOL', 'PHPA Poliacrilamida. Inhibidor mecánico de arcillas', 'Sx50', '0,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('133', 'N0110000043', 'SULFITO DE SODIO', 'Secuestrante de Oxigeno', 'Sx55', '2,6', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('134', 'N0110000044', 'SUPER SWEEP', 'Fibra de monofilamentos usada como agente de barrido', 'Sx15', '1', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('135', 'N0110000045', 'SUPER SWEEP', 'Fibra de monofilamentos usada como agente de barrido', 'Sx25', '1', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('136', 'N0107000012', 'SYNERFLOC A25D', 'PHPA Solido - Polímero inhibidor de arcillas y encapsulante bajo peso molecular (sistema HPWBM)', 'Sx55', '0,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('137', 'N0107000013', 'SYNERFLOC A25D', 'PHPA Solido - Polímero inhibidor de arcillas y encapsulante bajo peso molecular (sistema HPWBM)', 'Sx50', '0,8', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('138', 'N0102000007', 'TENAZAMOD', 'Modificador de reología OBM', 'Tm55', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('139', 'N0102000008', 'TENAZAWET', 'Humectante OBM', 'Tm55', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('140', 'N0109000016', 'ULTRASAL 20R/30R', 'Sal puenteante de granulometría específica ', 'Sx50', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('141', 'N0102000009', 'VERSAMOD', 'Modificador de reología OBM', 'Tm55', '1,01', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('142', 'N0102000010', 'VERSATHIN', 'Adelgazacnte para lodo base aceite', 'Tm55', '0,825', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('143', 'N0102000011', 'VERSATROL', 'Lignito Organofilico - Controlador de filtrado fluidos base aceite', 'Sx50', '1,05', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('144', 'N0108000019', 'WAL NUT PLUG ', 'Cascara de Nuez (F,M,G) - LCM', 'Sx50', '2,2', null, null, null, null, null);
INSERT INTO `materiales` VALUES ('145', 'N0110000046', 'WL 100', 'WL 100', 'Sx50', null, null, null, null, null, null);
INSERT INTO `materiales` VALUES ('146', 'N0108000020', 'X LINK', 'Polímero para control de pérdidas de circulación - PolÍmero Entrecruzado', 'Sx40', '1,2', null, null, null, null, null);

-- ----------------------------
-- Table structure for `mvc_trunk`
-- ----------------------------
DROP TABLE IF EXISTS `mvc_trunk`;
CREATE TABLE `mvc_trunk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime DEFAULT NULL,
  `report` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tree` varchar(255) DEFAULT NULL,
  `subtree` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mvc_trunk
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personal
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personal_report_enginers
-- ----------------------------

-- ----------------------------
-- Table structure for `program`
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `phase` int(11) DEFAULT NULL,
  `value_program` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_program_test_idx` (`test_id`) USING BTREE,
  KEY `fk_program_projects_idx` (`project_id`) USING BTREE,
  CONSTRAINT `program_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `program_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of program
-- ----------------------------

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
INSERT INTO `project_centrifugues` VALUES ('1', '1', 'sharples5400', 'lgs', '1', '200', '0');
INSERT INTO `project_centrifugues` VALUES ('2', '1', 'preco', 'hgs', '0', '100', '0');
INSERT INTO `project_centrifugues` VALUES ('3', '1', 'sharples5400', 'lgs', '1', '200', '0');
INSERT INTO `project_centrifugues` VALUES ('4', '1', 'preco', 'hgs', '0', '100', '0');
INSERT INTO `project_centrifugues` VALUES ('5', '1', 'sharples5400', 'lgs', '1', '200', '1');
INSERT INTO `project_centrifugues` VALUES ('6', '1', 'preco', 'hgs', '0', '100', '1');

-- ----------------------------
-- Table structure for `project_equipement`
-- ----------------------------
DROP TABLE IF EXISTS `project_equipement`;
CREATE TABLE `project_equipement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `erp_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `used_in_project` int(11) DEFAULT NULL,
  `price` float DEFAULT '0',
  `category` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `custom` int(11) DEFAULT '1',
  `commercial_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_equipement
-- ----------------------------
INSERT INTO `project_equipement` VALUES ('1', '1', 'N0121000001', 'CARRO TANQUE 6000 GAL CAPACIDAD 0 -50 KM', '17', 'Carro Tanque 6000 Gal Capacidad 0 -50 Km', '0', '0', '1', '1', '0', 'CARRO TANQUE 6000 GAL CAPACIDAD 0 -50 KM');
INSERT INTO `project_equipement` VALUES ('2', '1', 'N0121000002', 'EXCEDENTE MOV O DESMOV AREAS VIAJE', '18', 'Excedente Mov o Desmov Areas Viaje', '0', '0', '1', '1', '0', 'EXCEDENTE MOV O DESMOV AREAS VIAJE');
INSERT INTO `project_equipement` VALUES ('3', '1', 'N0121000003', 'MOVILIZACION - DESMOVILIZACION', '18', 'Movilizacion - Desmovilizacion', '0', '0', '1', '1', '0', 'MOVILIZACION - DESMOVILIZACION');
INSERT INTO `project_equipement` VALUES ('4', '1', 'N0121000004', 'TRANSPORTE CAMIONETA', '18', 'Transporte Camioneta', '0', '0', '1', '1', '0', 'TRANSPORTE CAMIONETA');
INSERT INTO `project_equipement` VALUES ('5', '1', 'N0121000005', 'TRANSPORTE SENCILLO', '18', 'Transporte Sencillo', '0', '0', '1', '1', '0', 'TRANSPORTE SENCILLO');
INSERT INTO `project_equipement` VALUES ('6', '1', 'N0121000006', 'TRANSPORTE TRACTOMULA', '18', 'Transporte Tractomula', '0', '0', '1', '1', '0', 'TRANSPORTE TRACTOMULA');
INSERT INTO `project_equipement` VALUES ('7', '1', 'N0121000007', 'TRANSPORTE TURBO', '18', 'Transporte Turbo', '0', '0', '1', '1', '0', 'TRANSPORTE TURBO');
INSERT INTO `project_equipement` VALUES ('8', '1', 'N0122000001', 'CARTUCHOS FILTRANTES', '18', 'Cartuchos Filtrantes', '0', '0', '1', '1', '0', 'CARTUCHOS FILTRANTES');
INSERT INTO `project_equipement` VALUES ('9', '1', 'N0122000002', 'CASETA DE FILTRACION', '17', 'Caseta de Filtracion', '0', '0', '1', '1', '0', 'CASETA DE FILTRACION');
INSERT INTO `project_equipement` VALUES ('10', '1', 'N0122000003', 'PREMIX TANK 250 bbl', '17', 'Premix Tank 250 Bbl', '0', '0', '1', '1', '0', 'PREMIX TANK 250 bbl');
INSERT INTO `project_equipement` VALUES ('11', '1', 'N0122000004', 'PREMIX TANK 300 bbl', '18', 'Premix Tank 300 Bbl', '0', '0', '1', '1', '0', 'PREMIX TANK 300 bbl');
INSERT INTO `project_equipement` VALUES ('12', '1', 'N0122000005', 'PREMIX TANK 350 bbl', '18', 'Premix Tank 350 Bbl', '0', '0', '1', '1', '0', 'PREMIX TANK 350 bbl');
INSERT INTO `project_equipement` VALUES ('13', '1', 'N0122000006', 'UNIDAD DE FLOCULACION SELECTIVA', '17', 'Unidad De Floculacion Selectiva', '0', '0', '1', '1', '0', 'UNIDAD DE FLOCULACION SELECTIVA');
INSERT INTO `project_equipement` VALUES ('14', '1', 'N0122000007', 'UNIDAD FILTRADO', '17', 'Unidad Filtrado', '0', '0', '1', '1', '0', 'UNIDAD FILTRADO');
INSERT INTO `project_equipement` VALUES ('15', '1', 'N0122000008', 'UNIDAD FILTRADO STAND BY', '17', 'Unidad Filtrado Stand By', '0', '0', '1', '1', '0', 'UNIDAD FILTRADO STAND BY');
INSERT INTO `project_equipement` VALUES ('16', '1', 'N0122000009', 'SILO DE 350 FT3 O 60 TON', '17', 'Silo de 350 ft3 o 60 ton', '0', '0', '1', '1', '0', 'SILO DE 350 FT3 O 60 TON');
INSERT INTO `project_equipement` VALUES ('17', '1', 'N0122000010', 'COMPRESOR SISTEMA DE SILIOS', '17', 'Compresor sistema de silos', '0', '0', '1', '1', '0', 'COMPRESOR SISTEMA DE SILIOS');
INSERT INTO `project_equipement` VALUES ('18', '1', 'N0122000011', 'ANILLOS DE CORROSION', '18', 'Anillo de corrosión - Incluye envio y analisis', '0', '0', '1', '1', '0', 'ANILLOS DE CORROSION');
INSERT INTO `project_equipement` VALUES ('19', '1', 'N0120000001', 'SISTEMA Q MAX DRILL PHPA (3600-7500)', '18', 'Sistema Q Max Drill Phpa (3600-7500)', '0', '0', '1', '1', '0', 'SISTEMA Q MAX DRILL PHPA (3600-7500)');
INSERT INTO `project_equipement` VALUES ('20', '1', 'N0120000002', 'SISTEMA Q Nca', '18', 'Sistema Q Nca', '0', '0', '1', '1', '0', 'SISTEMA Q Nca');
INSERT INTO `project_equipement` VALUES ('21', '1', 'N0120000003', 'SISTEMA Q Nca (500-3600)', '18', 'Sistema Q Nca (500-3600)', '0', '0', '1', '1', '0', 'SISTEMA Q Nca (500-3600)');

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
  `price` float DEFAULT '0',
  `used_in_project` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `custom` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_materials
-- ----------------------------
INSERT INTO `project_materials` VALUES ('1', '1', 'N0108000001', 'ACELERATOR XLA', '1', '1', 'ACELERATOR XLA', '0', '0', '1', 'Acelerador - Poly plug', '1', '0');
INSERT INTO `project_materials` VALUES ('2', '1', 'N0110000001', 'ACIDO CITRICO EN CRISTALES', '2', '1.665', 'ACIDO CITRICO EN CRISTALES', '0', '0', '1', 'Regulador de pH para contaminación con cemento', '1', '0');
INSERT INTO `project_materials` VALUES ('3', '1', 'N0110000002', 'ALKAPAM', '2', '0.8', 'ALKAPAM', '0', '0', '1', 'Polímero para tratamiento de sólidos', '1', '0');
INSERT INTO `project_materials` VALUES ('4', '1', 'N0103000001', 'BARITA', '3', '4.25', 'BARITA', '0', '0', '1', 'Material densificante - Barita', '1', '0');
INSERT INTO `project_materials` VALUES ('5', '1', 'N0103000002', 'BARITA', '4', '4.25', 'BARITA', '0', '0', '1', 'Material densificante - Barita', '1', '0');
INSERT INTO `project_materials` VALUES ('6', '1', 'N0105000001', 'BENEX', '5', '0.644', 'BENEX', '0', '0', '1', 'Extendedor de Bentonita', '1', '0');
INSERT INTO `project_materials` VALUES ('7', '1', 'N0105000002', 'BENTONITA NATURAL GEL', '4', '2.5', 'BENTONITA NATURAL GEL', '0', '0', '1', 'Bentonita Premium tipo Wyoming Viscosificante', '1', '0');
INSERT INTO `project_materials` VALUES ('8', '1', 'N0105000003', 'BENTONITA REGULAR', '4', '2.5', 'BENTONITA REGULAR', '0', '0', '1', 'Bentonita Nacional', '1', '0');
INSERT INTO `project_materials` VALUES ('9', '1', 'N0110000003', 'BICARBONATO DE SODIO', '2', '2.159', 'BICARBONATO DE SODIO', '0', '0', '1', 'Precipitador de Ca++', '1', '0');
INSERT INTO `project_materials` VALUES ('10', '1', 'N0110000004', 'BICARBONATO DE SODIO', '6', '2.159', 'BICARBONATO DE SODIO', '0', '0', '1', 'Precipitador de Ca++', '1', '0');
INSERT INTO `project_materials` VALUES ('11', '1', 'N0110000005', 'BLACK MAGIC SFT', '7', '0', 'BLACK MAGIC SFT', '0', '0', '1', 'Aditivo espoteante para liberación de pegas diferenciales (SFT) - Liberador de tubería SFT', '1', '0');
INSERT INTO `project_materials` VALUES ('12', '1', 'N0109000002', 'BRIDGESAL ULTRA', '7', '2.18', 'BRIDGESAL ULTRA', '0', '0', '1', 'Sal puenteante de diferente granulometría', '1', '0');
INSERT INTO `project_materials` VALUES ('13', '1', 'N0110000006', 'CAL HIDRATADA', '4', '3', 'CAL HIDRATADA', '0', '0', '1', 'Cal Hidratada.  Regulador de pH', '1', '0');
INSERT INTO `project_materials` VALUES ('14', '1', 'N0110000007', 'CAL HIDRATADA', '8', '3', 'CAL HIDRATADA', '0', '0', '1', 'Cal Hidratada.  Regulador de pH', '1', '0');
INSERT INTO `project_materials` VALUES ('15', '1', 'N0110000008', 'CAL HIDRATADA', '9', '3', 'CAL HIDRATADA', '0', '0', '1', 'Cal Hidratada.  Regulador de pH', '1', '0');
INSERT INTO `project_materials` VALUES ('16', '1', 'N0110000009', 'CAL HIDRATADA', '2', '3', 'CAL HIDRATADA', '0', '0', '1', 'Cal Hidratada.  Regulador de pH', '1', '0');
INSERT INTO `project_materials` VALUES ('17', '1', 'N0110000010', 'CAL VIVA', '3', '3.3', 'CAL VIVA', '0', '0', '1', 'Cal Viva', '1', '0');
INSERT INTO `project_materials` VALUES ('18', '1', 'N0110000011', 'CAL VIVA', '2', '3.3', 'CAL VIVA', '0', '0', '1', 'Cal Viva', '1', '0');
INSERT INTO `project_materials` VALUES ('19', '1', 'N0103000003', 'CARBONATO DE CALCIO', '6', '2.7', 'CARBONATO DE CALCIO', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('20', '1', 'N0103000004', 'CARBONATO DE CALCIO M1000', '2', '2.7', 'CARBONATO DE CALCIO M1000', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('21', '1', 'N0103000005', 'CARBONATO DE CALCIO M10-40', '6', '2.7', 'CARBONATO DE CALCIO M10-40', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('22', '1', 'N0103000006', 'CARBONATO DE CALCIO M1200', '6', '2.7', 'CARBONATO DE CALCIO M1200', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('23', '1', 'N0103000007', 'CARBONATO DE CALCIO M200', '6', '2.7', 'CARBONATO DE CALCIO M200', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('24', '1', 'N0103000008', 'CARBONATO DE CALCIO M325', '6', '2.7', 'CARBONATO DE CALCIO M325', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('25', '1', 'N0103000009', 'CARBONATO DE CALCIO M400', '6', '2.7', 'CARBONATO DE CALCIO M400', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('26', '1', 'N0103000010', 'CARBONATO DE CALCIO M40-100', '6', '2.7', 'CARBONATO DE CALCIO M40-100', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('27', '1', 'N0103000011', 'CARBONATO DE CALCIO M50-150', '6', '2.7', 'CARBONATO DE CALCIO M50-150', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('28', '1', 'N0103000012', 'CARBONATO DE CALCIO M5-10', '6', '2.7', 'CARBONATO DE CALCIO M5-10', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('29', '1', 'N0103000013', 'CARBONATO DE CALCIO M600', '6', '2.7', 'CARBONATO DE CALCIO M600', '0', '0', '1', 'Material densificante y puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('30', '1', 'N0108000002', 'CASCARILLA DE ARROZ', '9', '0.7', 'CASCARILLA DE ARROZ', '0', '0', '1', 'Cascarilla de arroz. LCM', '1', '0');
INSERT INTO `project_materials` VALUES ('31', '1', 'N0108000003', 'CASCARILLA DE ARROZ', '10', '0.7', 'CASCARILLA DE ARROZ', '0', '0', '1', 'Cascarilla de arroz. LCM', '1', '0');
INSERT INTO `project_materials` VALUES ('32', '1', 'N0104000001', 'CESCO', '7', '0', 'CESCO', '0', '0', '1', 'Estabilizador de Shale - Asfalto Soplado', '1', '0');
INSERT INTO `project_materials` VALUES ('33', '1', 'N0104000002', 'CESCO', '10', '0', 'CESCO', '0', '0', '1', 'Estabilizador de Shale - Asfalto Soplado', '1', '0');
INSERT INTO `project_materials` VALUES ('34', '1', 'N0105000004', 'CLAYTONE II', '7', '1.57', 'CLAYTONE II', '0', '0', '1', 'Arcilla organofílica', '1', '0');
INSERT INTO `project_materials` VALUES ('35', '1', 'N0105000005', 'CLAYTONE II', '2', '1.57', 'CLAYTONE II', '0', '0', '1', 'Arcilla organofílica', '1', '0');
INSERT INTO `project_materials` VALUES ('36', '1', 'N0109000003', 'CLORURO DE CALCIO', '2', '2.2', 'CLORURO DE CALCIO', '0', '0', '1', 'Cloruro de calcio. Sal - (95% pureza)', '1', '0');
INSERT INTO `project_materials` VALUES ('37', '1', 'N0109000004', 'CLORURO DE CALCIO', '11', '2.2', 'CLORURO DE CALCIO', '0', '0', '1', 'Cloruro de calcio. Sal - (95% pureza)', '1', '0');
INSERT INTO `project_materials` VALUES ('38', '1', 'N0109000005', 'CLORURO DE POTASIO', '6', '1.988', 'CLORURO DE POTASIO', '0', '0', '1', 'Cloruro de potasio. Sal - Pureza >95%', '1', '0');
INSERT INTO `project_materials` VALUES ('39', '1', 'N0109000006', 'CLORURO DE POTASIO', '2', '1.988', 'CLORURO DE POTASIO', '0', '0', '1', 'Cloruro de potasio. Sal - Pureza >95%', '1', '0');
INSERT INTO `project_materials` VALUES ('40', '1', 'N0109000007', 'CLORURO DE SODIO', '6', '2.16', 'CLORURO DE SODIO', '0', '0', '1', 'Colururo de Sodio. Sal', '1', '0');
INSERT INTO `project_materials` VALUES ('41', '1', 'N0107000001', 'CYDRIL 5300', '1', '0.85', 'CYDRIL 5300', '0', '0', '1', 'PHPA Liquido', '1', '0');
INSERT INTO `project_materials` VALUES ('42', '1', 'N0107000002', 'CYDRILL 4000', '15', '0.85', 'CYDRILL 4000', '0', '0', '1', 'PHPA Liquido', '1', '0');
INSERT INTO `project_materials` VALUES ('43', '1', 'N0106000001', 'CYPAN N', '7', '1.5', 'CYPAN N', '0', '0', '1', 'Copolimero controlador de filtrado', '1', '0');
INSERT INTO `project_materials` VALUES ('44', '1', 'N0110000012', 'CYTEMP', '1', '2.2', 'CYTEMP', '0', '0', '1', 'Adelgazante polimérico', '1', '0');
INSERT INTO `project_materials` VALUES ('45', '1', 'N0110000013', 'DESCO CF', '9', '1.6', 'DESCO CF', '0', '0', '1', 'Dispersante - Tanino libre de cromo', '1', '0');
INSERT INTO `project_materials` VALUES ('46', '1', 'N0110000014', 'DESCO CF', '12', '1.6', 'DESCO CF', '0', '0', '1', 'Dispersante', '1', '0');
INSERT INTO `project_materials` VALUES ('47', '1', 'N0106000002', 'DRISCAL D', '9', '1.033', 'DRISCAL D', '0', '0', '1', 'Polímero controlador de filtrado para zona de interés HTHP', '1', '0');
INSERT INTO `project_materials` VALUES ('48', '1', 'N0106000003', 'DRISCAL D', '12', '1.033', 'DRISCAL D', '0', '0', '1', 'Polímero controlador de filtrado para zona de interés HTHP', '1', '0');
INSERT INTO `project_materials` VALUES ('49', '1', 'N0106000004', 'DRISCAL D', '7', '1.033', 'DRISCAL D', '0', '0', '1', 'Polímero controlador de filtrado para zona de interés HTHP', '1', '0');
INSERT INTO `project_materials` VALUES ('50', '1', 'N0110000015', 'ESTEARATO DE ALUMINIO', '13', '1.01', 'ESTEARATO DE ALUMINIO', '0', '0', '1', 'Antiespumante - Estereato de aluminio', '1', '0');
INSERT INTO `project_materials` VALUES ('51', '1', 'N0110000016', 'ESTEARATO DE ALUMINIO', '14', '1.01', 'ESTEARATO DE ALUMINIO', '0', '0', '1', 'Antiespumante - Estereato de aluminio', '1', '0');
INSERT INTO `project_materials` VALUES ('52', '1', 'N0110000017', 'ESTEARATO DE ALUMINIO', '7', '1.01', 'ESTEARATO DE ALUMINIO', '0', '0', '1', 'Antiespumante - Estereato de aluminio', '1', '0');
INSERT INTO `project_materials` VALUES ('53', '1', 'N0109000008', 'FORMIATO DE POTASIO', '2', '1.08', 'FORMIATO DE POTASIO', '0', '0', '1', 'Sal - Formiato de potasio sólido', '1', '0');
INSERT INTO `project_materials` VALUES ('54', '1', 'N0109000009', 'FORMIATO DE POTASIO', '6', '1.08', 'FORMIATO DE POTASIO', '0', '0', '1', 'Sal - Formiato de potasio sólido', '1', '0');
INSERT INTO `project_materials` VALUES ('55', '1', 'N0109000010', 'FORMIATO DE POTASIO LIQUIDO', '15', '1.2', 'FORMIATO DE POTASIO LIQUIDO', '0', '0', '1', 'Salmuera - Formiato de potasio líquido. 13 lpg', '1', '0');
INSERT INTO `project_materials` VALUES ('56', '1', 'N0109000011', 'FORMIATO DE SODIO', '2', '0.94', 'FORMIATO DE SODIO', '0', '0', '1', 'Sal - Formiato de sodio', '1', '0');
INSERT INTO `project_materials` VALUES ('57', '1', 'N0102000001', 'GILSONITE HT', '7', '1.5', 'GILSONITE HT', '0', '0', '1', 'Asfalto en polvo OBM - HPHT Controlador De Filtrado.EmulsioInvertida', '1', '0');
INSERT INTO `project_materials` VALUES ('58', '1', 'N0107000003', 'GLYMAX', '15', '1.1', 'GLYMAX', '0', '0', '1', 'Glicol polialquilenico -  Lubricante e inhibidor de arcillas', '1', '0');
INSERT INTO `project_materials` VALUES ('59', '1', 'N0104000003', 'GRAFITE', '7', '2.25', 'GRAFITE', '0', '0', '1', 'Material puenteante y sellante - Grafito material obturante (F.M.C)', '1', '0');
INSERT INTO `project_materials` VALUES ('60', '1', 'N0104000004', 'GRAFITE', '2', '2.25', 'GRAFITE', '0', '0', '1', 'Material puenteante y sellante - Grafito material obturante (F.M.C)', '1', '0');
INSERT INTO `project_materials` VALUES ('61', '1', 'N0104000005', 'GRAFITE', '4', '0', 'GRAFITE', '0', '0', '1', 'Material puenteante y sellante - Grafito material obturante (F.M.C)', '1', '0');
INSERT INTO `project_materials` VALUES ('62', '1', 'N0103000014', 'HEMATITA', '4', '4.7', 'HEMATITA', '0', '0', '1', 'Material densificante - Hematita', '1', '0');
INSERT INTO `project_materials` VALUES ('63', '1', 'N0105000006', 'KELZAN XCD', '2', '1.5', 'KELZAN XCD', '0', '0', '1', 'Goma xántica.  Viscosificante - BiopolímeroPremium.GomaXanticaDispersa', '1', '0');
INSERT INTO `project_materials` VALUES ('64', '1', 'N0108000004', 'KWIK SEAL', '10', '1.05', 'KWIK SEAL', '0', '0', '1', 'LMC - (F.M.C)', '1', '0');
INSERT INTO `project_materials` VALUES ('65', '1', 'N0110000018', 'LIGNITO', '7', '1.7', 'LIGNITO', '0', '0', '1', 'Lignito', '1', '0');
INSERT INTO `project_materials` VALUES ('66', '1', 'N0110000019', 'LIGNITO K 17', '7', '1.7', 'LIGNITO K 17', '0', '0', '1', 'Lignito Caustizado. Dispersante y Controlador de Filtrado', '1', '0');
INSERT INTO `project_materials` VALUES ('67', '1', 'N0110000020', 'LUBRAGLIDE COARSE', '7', '1.06', 'LUBRAGLIDE COARSE', '0', '0', '1', 'Lubricante Sólido - Lubricante mecánico tipo microesfereas de Copolímero', '1', '0');
INSERT INTO `project_materials` VALUES ('68', '1', 'N0110000021', 'LUBRAGLIDE FINE', '7', '1.06', 'LUBRAGLIDE FINE', '0', '0', '1', 'Lubricante Sólido - Lubricante mecánico tipo microesfereas de Copolímero', '1', '0');
INSERT INTO `project_materials` VALUES ('69', '1', 'N0110000022', 'MF 55', '1', '1.01', 'MF 55', '0', '0', '1', 'Floculante selectivo', '1', '0');
INSERT INTO `project_materials` VALUES ('70', '1', 'N0108000005', 'MICA', '9', '2.09', 'MICA', '0', '0', '1', 'LMC - (F.M.C)', '1', '0');
INSERT INTO `project_materials` VALUES ('71', '1', 'N0108000006', 'MICA', '10', '2.09', 'MICA', '0', '0', '1', 'LMC - (F.M.C)', '1', '0');
INSERT INTO `project_materials` VALUES ('72', '1', 'N0108000007', 'MICA', '7', '2.09', 'MICA', '0', '0', '1', 'LMC - (F.M.C)', '1', '0');
INSERT INTO `project_materials` VALUES ('73', '1', 'N0108000008', 'MICA', '2', '2.09', 'MICA', '0', '0', '1', 'LMC - (F.M.C)', '1', '0');
INSERT INTO `project_materials` VALUES ('74', '1', 'N0107000004', 'NITRATO DE CALCIO LIQUIDO', '19', '1', 'NITRATO DE CALCIO LIQUIDO', '0', '0', '1', 'Nitrato de calcio. Inhibidor de arcilla', '1', '0');
INSERT INTO `project_materials` VALUES ('75', '1', 'N0110000023', 'OXIDO DE MAGNESIO', '2', '3.56', 'OXIDO DE MAGNESIO', '0', '0', '1', 'Oxido de Magnesio - ph Buffer', '1', '0');
INSERT INTO `project_materials` VALUES ('76', '1', 'N0110000024', 'OXIDO DE MAGNESIO', '6', '3.56', 'OXIDO DE MAGNESIO', '0', '0', '1', 'Oxido de Magnesio - ph Buffer', '1', '0');
INSERT INTO `project_materials` VALUES ('77', '1', 'N0110000025', 'OXIDO DE MAGNESIO', '7', '3.56', 'OXIDO DE MAGNESIO', '0', '0', '1', 'Oxido de Magnesio - ph Buffer', '1', '0');
INSERT INTO `project_materials` VALUES ('78', '1', 'N0110000026', 'OXIDO DE ZINC', '2', '0.9', 'OXIDO DE ZINC', '0', '0', '1', 'Oxido de Zinc - Removedor de H2S', '1', '0');
INSERT INTO `project_materials` VALUES ('79', '1', 'N0110000027', 'PIPELAX W', '15', '1', 'PIPELAX W', '0', '0', '1', 'Fluido liberador de tubería', '1', '0');
INSERT INTO `project_materials` VALUES ('80', '1', 'N0109000012', 'PLUGSAL X', '7', '2.17', 'PLUGSAL X', '0', '0', '1', 'Sal puenteante', '1', '0');
INSERT INTO `project_materials` VALUES ('81', '1', 'N0108000009', 'POLY PLUG', '10', '0.91', 'POLY PLUG', '0', '0', '1', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', '1', '0');
INSERT INTO `project_materials` VALUES ('82', '1', 'N0108000010', 'POLY PLUG', '9', '0.91', 'POLY PLUG', '0', '0', '1', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', '1', '0');
INSERT INTO `project_materials` VALUES ('83', '1', 'N0108000011', 'POLY PLUG', '7', '0.91', 'POLY PLUG', '0', '0', '1', 'LCM Polímero para control pérdidas de circulación - Material obturante para polímero entrecruzable', '1', '0');
INSERT INTO `project_materials` VALUES ('84', '1', 'N0110000028', 'POTASA CAUSTICA EN ESCAMAS', '2', '2.04', 'POTASA CAUSTICA EN ESCAMAS', '0', '0', '1', 'Alcalinizante - Hidroxido De Potasio', '1', '0');
INSERT INTO `project_materials` VALUES ('85', '1', 'N0110000029', 'Q CF THINNER', '7', '1.14', 'Q CF THINNER', '0', '0', '1', 'Adelgazante', '1', '0');
INSERT INTO `project_materials` VALUES ('86', '1', 'N0110000030', 'Q CIDE L14', '1', '1.08', 'Q CIDE L14', '0', '0', '1', 'Glutaraldehido - Bactericida Biocida', '1', '0');
INSERT INTO `project_materials` VALUES ('87', '1', 'N0110000031', 'Q CIDE L25', '1', '1.08', 'Q CIDE L25', '0', '0', '1', 'Glutaraldehido - Bactericida Biocida', '1', '0');
INSERT INTO `project_materials` VALUES ('88', '1', 'N0104000006', 'Q CS GRAFITO', '7', '1.8', 'Q CS GRAFITO', '0', '0', '1', 'Material puenteante y sellante', '1', '0');
INSERT INTO `project_materials` VALUES ('89', '1', 'N0110000032', 'Q DRILL UP', '15', '1.031', 'Q DRILL UP', '0', '0', '1', 'Lubricante y reductor de torque - Anti-acresión y anti embotamiento (base hidrocarburo y/o vegetal)', '1', '0');
INSERT INTO `project_materials` VALUES ('90', '1', 'N0108000012', 'Q FIBER', '10', '1.2', 'Q FIBER', '0', '0', '1', 'Material celulósico fibroso (fino. medio grueso) - Fibra Mineral Especial', '1', '0');
INSERT INTO `project_materials` VALUES ('91', '1', 'N0110000033', 'Q FREE', '15', '0.91', 'Q FREE', '0', '0', '1', 'Liberador de tubería - Agente Liberador', '1', '0');
INSERT INTO `project_materials` VALUES ('92', '1', 'N0107000005', 'Q INHIBIDROL G', '15', '1.06', 'Q INHIBIDROL G', '0', '0', '1', 'Amina en base a glicol.  Inhibidor de arcilla - Inhibidor de arcilla (tipo Amina base Glicol)', '1', '0');
INSERT INTO `project_materials` VALUES ('93', '1', 'N0110000034', 'Q KLEEN', '15', '1.061', 'Q KLEEN', '0', '0', '1', 'Agente Surfactante - Surfactante para limpieza de tubería WBM', '1', '0');
INSERT INTO `project_materials` VALUES ('94', '1', 'N0110000035', 'Q KLEEN', '1', '1.061', 'Q KLEEN', '0', '0', '1', 'Agente Surfactante - Surfactante para limpieza de tubería WBM', '1', '0');
INSERT INTO `project_materials` VALUES ('95', '1', 'N0110000036', 'Q LUBE', '15', '1.016', 'Q LUBE', '0', '0', '1', 'Lubricante OBM Mejorador de ROP (base hidrocarburos) - Reductor de torque de origen vegetal', '1', '0');
INSERT INTO `project_materials` VALUES ('96', '1', 'N0107000006', 'Q MAX DRILL', '15', '1.07', 'Q MAX DRILL', '0', '0', '1', 'Amina. Inhibidor de arcilla - Estabilizador De Shale Y Arcilla', '1', '0');
INSERT INTO `project_materials` VALUES ('97', '1', 'N0102000002', 'Q MOD', '15', '1.01', 'Q MOD', '0', '0', '1', 'Modificador de reología lecturas bajas OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('98', '1', 'N0105000007', 'Q MUL GEL', '7', '1.57', 'Q MUL GEL', '0', '0', '1', 'Arcilla Organofilica OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('99', '1', 'N0102000003', 'Q MUL I', '15', '0.9', 'Q MUL I', '0', '0', '1', 'Emulsificador Primario OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('100', '1', 'N0102000004', 'Q MUL II', '15', '0.945', 'Q MUL II', '0', '0', '1', 'Emulsificador Secundario OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('101', '1', 'N0107000007', 'Q NH 423', '15', '1', 'Q NH 423', '0', '0', '1', 'Inhibidor de arcilla tipo amina cuaternaria', '1', '0');
INSERT INTO `project_materials` VALUES ('102', '1', 'N0107000008', 'Q NK', '2', '2.109', 'Q NK', '0', '0', '1', 'Nitrato de Potasio. Inhibidor de Arcillas', '1', '0');
INSERT INTO `project_materials` VALUES ('103', '1', 'N0110000037', 'Q NOFOAM', '1', '0.9', 'Q NOFOAM', '0', '0', '1', 'Antiespumante líquido mezcla de alcoholes de alto peso molecular y ácidos grasos modificados', '1', '0');
INSERT INTO `project_materials` VALUES ('104', '1', 'N0105000008', 'Q ORGANOVIS', '7', '0', 'Q ORGANOVIS', '0', '0', '1', 'Arcilla organofílica', '1', '0');
INSERT INTO `project_materials` VALUES ('105', '1', 'N0106000005', 'Q PAC L', '7', '0.8', 'Q PAC L', '0', '0', '1', 'Polímero controlador de filtrado LV - Celulosa polianionica de baja viscosidad', '1', '0');
INSERT INTO `project_materials` VALUES ('106', '1', 'N0106000006', 'Q PAC R', '7', '0.8', 'Q PAC R', '0', '0', '1', 'Polímero controlador de filtrado y viscosificante HV - Celulosa polianionica de alta viscosidad', '1', '0');
INSERT INTO `project_materials` VALUES ('107', '1', 'N0110000038', 'Q PHPA', '7', '0.8', 'Q PHPA', '0', '0', '1', 'Encapsulador de arcilla PHPA', '1', '0');
INSERT INTO `project_materials` VALUES ('108', '1', 'N0106000007', 'Q STAR HT', '7', '2.109', 'Q STAR HT', '0', '0', '1', 'Almidón controlador de filtrado para zona de interés - Almidon Para Alta Temperatura', '1', '0');
INSERT INTO `project_materials` VALUES ('109', '1', 'N0106000008', 'Q STAR LV', '7', '2.109', 'Q STAR LV', '0', '0', '1', 'Almidón de papa modificado', '1', '0');
INSERT INTO `project_materials` VALUES ('110', '1', 'N0108000013', 'Q STOP', '4', '0.613', 'Q STOP', '0', '0', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', '1', '0');
INSERT INTO `project_materials` VALUES ('111', '1', 'N0108000014', 'Q STOP', '9', '0.613', 'Q STOP', '0', '0', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', '1', '0');
INSERT INTO `project_materials` VALUES ('112', '1', 'N0108000015', 'Q STOP', '10', '0.613', 'Q STOP', '0', '0', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', '1', '0');
INSERT INTO `project_materials` VALUES ('113', '1', 'N0108000016', 'Q STOP', '7', '0.613', 'Q STOP', '0', '0', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', '1', '0');
INSERT INTO `project_materials` VALUES ('114', '1', 'N0108000017', 'Q STOP', '2', '0.613', 'Q STOP', '0', '0', '1', 'Material  fibroso para pérdida de circulación (Zona Interes) - (F.M.G)', '1', '0');
INSERT INTO `project_materials` VALUES ('115', '1', 'N0109000013', 'Q TDL 13', '1', '0.86', 'Q TDL 13', '0', '0', '1', 'Inhibidor de Corrosion', '1', '0');
INSERT INTO `project_materials` VALUES ('116', '1', 'N0109000014', 'Q TDL 15', '1', '0.86', 'Q TDL 15', '0', '0', '1', 'Inhibidor de Corrosion', '1', '0');
INSERT INTO `project_materials` VALUES ('117', '1', 'N0109000015', 'Q TDL 16', '15', '0.86', 'Q TDL 16', '0', '0', '1', 'Inhibidor de Corrosion', '1', '0');
INSERT INTO `project_materials` VALUES ('118', '1', 'N0102000005', 'Q THINN O', '15', '1.25', 'Q THINN O', '0', '0', '1', 'Adelgazante OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('119', '1', 'N0106000009', 'Q THINTEX', '1', '0.6', 'Q THINTEX', '0', '0', '1', 'Adelgazante polimérico - Defoculante Polimérico', '1', '0');
INSERT INTO `project_materials` VALUES ('120', '1', 'N0102000006', 'Q WET', '15', '0.955', 'Q WET', '0', '0', '1', 'Humectante OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('121', '1', 'N0105000009', 'Q XAN XCD', '2', '1.5', 'Q XAN XCD', '0', '0', '1', 'Goma xántica.  Viscosificante - Goma de xanthan', '1', '0');
INSERT INTO `project_materials` VALUES ('122', '1', 'N0105000010', 'Q XAN XCD', '9', '1.5', 'Q XAN XCD', '0', '0', '1', 'Goma xántica.  Viscosificante - Goma de xanthan', '1', '0');
INSERT INTO `project_materials` VALUES ('123', '1', 'N0105000011', 'Q XAN XCD', '7', '1.5', 'Q XAN XCD', '0', '0', '1', 'Goma xántica.  Viscosificante - Goma de xanthan', '1', '0');
INSERT INTO `project_materials` VALUES ('124', '1', 'N0110000039', 'SALTEXTIL', '4', '0', 'SALTEXTIL', '0', '0', '1', 'SAPP', '1', '0');
INSERT INTO `project_materials` VALUES ('125', '1', 'N0108000018', 'SEAL XLR', '1', '1', 'SEAL XLR', '0', '0', '1', 'Retardante. Poly plug - Polímero entrecruzado retardante (pérdidas de circulación)', '1', '0');
INSERT INTO `project_materials` VALUES ('126', '1', 'N0107000009', 'SILICATO DE POTASIO', '15', '1.26', 'SILICATO DE POTASIO', '0', '0', '1', 'Silicato de Potasio', '1', '0');
INSERT INTO `project_materials` VALUES ('127', '1', 'N0110000040', 'SODA CAUSTICA', '2', '2.13', 'SODA CAUSTICA', '0', '0', '1', 'Soda Caustica - Controlador de pH. Alcalinizante', '1', '0');
INSERT INTO `project_materials` VALUES ('128', '1', 'N0110000041', 'SODA CAUSTICA', '7', '2.13', 'SODA CAUSTICA', '0', '0', '1', 'Soda Caustica - Controlador de pH. Alcalinizante', '1', '0');
INSERT INTO `project_materials` VALUES ('129', '1', 'N0110000042', 'SODA CAUSTICA', '8', '2.13', 'SODA CAUSTICA', '0', '0', '1', 'Soda Caustica - Controlador de pH. Alcalinizante', '1', '0');
INSERT INTO `project_materials` VALUES ('130', '1', 'N0104000007', 'SOLTEX', '7', '1.35', 'SOLTEX', '0', '0', '1', 'Asfalto sulfonato soloble en agua - Control Shale', '1', '0');
INSERT INTO `project_materials` VALUES ('131', '1', 'N0107000010', 'STOKOPOL', '2', '0.8', 'STOKOPOL', '0', '0', '1', 'PHPA Poliacrilamida. Inhibidor mecánico de arcillas', '1', '0');
INSERT INTO `project_materials` VALUES ('132', '1', 'N0107000011', 'STOKOPOL', '7', '0.8', 'STOKOPOL', '0', '0', '1', 'PHPA Poliacrilamida. Inhibidor mecánico de arcillas', '1', '0');
INSERT INTO `project_materials` VALUES ('133', '1', 'N0110000043', 'SULFITO DE SODIO', '2', '2.6', 'SULFITO DE SODIO', '0', '0', '1', 'Secuestrante de Oxigeno', '1', '0');
INSERT INTO `project_materials` VALUES ('134', '1', 'N0110000044', 'SUPER SWEEP', '12', '1', 'SUPER SWEEP', '0', '0', '1', 'Fibra de monofilamentos usada como agente de barrido', '1', '0');
INSERT INTO `project_materials` VALUES ('135', '1', 'N0110000045', 'SUPER SWEEP', '9', '1', 'SUPER SWEEP', '0', '0', '1', 'Fibra de monofilamentos usada como agente de barrido', '1', '0');
INSERT INTO `project_materials` VALUES ('136', '1', 'N0107000012', 'SYNERFLOC A25D', '2', '0.8', 'SYNERFLOC A25D', '0', '0', '1', 'PHPA Solido - Polímero inhibidor  de arcillas y encapsulante bajo peso molecular (sistema HPWBM)', '1', '0');
INSERT INTO `project_materials` VALUES ('137', '1', 'N0107000013', 'SYNERFLOC A25D', '7', '0.8', 'SYNERFLOC A25D', '0', '0', '1', 'PHPA Solido - Polímero inhibidor  de arcillas y encapsulante bajo peso molecular (sistema HPWBM)', '1', '0');
INSERT INTO `project_materials` VALUES ('138', '1', 'N0102000007', 'TENAZAMOD', '15', '1', 'TENAZAMOD', '0', '0', '1', 'Modificador de reología OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('139', '1', 'N0102000008', 'TENAZAWET', '15', '1', 'TENAZAWET', '0', '0', '1', 'Humectante OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('140', '1', 'N0109000016', 'ULTRASAL 20R/30R', '7', '0', 'ULTRASAL 20R/30R', '0', '0', '1', 'Sal puenteante de granulometría específica', '1', '0');
INSERT INTO `project_materials` VALUES ('141', '1', 'N0102000009', 'VERSAMOD', '15', '1.01', 'VERSAMOD', '0', '0', '1', 'Modificador de reología OBM', '1', '0');
INSERT INTO `project_materials` VALUES ('142', '1', 'N0102000010', 'VERSATHIN', '15', '0.825', 'VERSATHIN', '0', '0', '1', 'Adelgazante para lodo base aceite', '1', '0');
INSERT INTO `project_materials` VALUES ('143', '1', 'N0102000011', 'VERSATROL', '7', '1.05', 'VERSATROL', '0', '0', '1', 'Lignito Organofilico - Controlador de filtrado fluidos base aceite', '1', '0');
INSERT INTO `project_materials` VALUES ('144', '1', 'N0108000019', 'WAL NUT PLUG', '7', '2.2', 'WAL NUT PLUG', '0', '0', '1', 'Cascara de Nuez (F.M.G) - LCM', '1', '0');
INSERT INTO `project_materials` VALUES ('145', '1', 'N0110000046', 'WL 100', '7', '0', 'WL 100', '0', '0', '1', 'WL 100', '1', '0');
INSERT INTO `project_materials` VALUES ('146', '1', 'N0108000020', 'X LINK', '10', '1.2', 'X LINK', '0', '0', '1', 'Polímero para control de pérdidas de circulación - PolÍmero Entrecruzado', '1', '0');

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
  `shaker_maker` varchar(255) DEFAULT NULL,
  `shaker_model` varchar(255) DEFAULT NULL,
  `shaker_screens` int(11) DEFAULT NULL,
  `shaker_movement` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_mudcleaner
-- ----------------------------
INSERT INTO `project_mudcleaner` VALUES ('1', '1', 'swaco', 'xx1', '2', '12', '6_5', '10', '2', '6_5', 'swaco', 'x1', '2', 'lineal', '0');
INSERT INTO `project_mudcleaner` VALUES ('2', '1', 'swaco', 'xx1', '2', '12', '6_5', '10', '2', '6_5', 'swaco', 'x1', '2', 'lineal', '0');
INSERT INTO `project_mudcleaner` VALUES ('3', '1', 'swaco', 'xx1', '2', '12', '6_5', '10', '2', '6_5', 'swaco', 'x1', '2', 'lineal', '1');

-- ----------------------------
-- Table structure for `project_report_annular_section`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_annular_section`;
CREATE TABLE `project_report_annular_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `id_hole` float DEFAULT NULL,
  `od` float DEFAULT NULL,
  `length` float DEFAULT NULL,
  `capacity` float DEFAULT NULL,
  `vel_critical` float DEFAULT NULL,
  `plp` float DEFAULT NULL,
  `plb` float DEFAULT NULL,
  `regime` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_annular_section_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_annular_section_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_annular_section
-- ----------------------------

-- ----------------------------
-- Table structure for `project_report_bit`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_bit`;
CREATE TABLE `project_report_bit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bit_number` varchar(45) DEFAULT NULL,
  `brocas_modelos_id` int(11) DEFAULT NULL,
  `report_id` int(11) NOT NULL,
  `jets1` float DEFAULT NULL,
  `jets2` float DEFAULT NULL,
  `jets3` float DEFAULT NULL,
  `jets4` float DEFAULT NULL,
  `jets5` float DEFAULT NULL,
  `jets6` float DEFAULT NULL,
  `jets7` float DEFAULT NULL,
  `jets8` float DEFAULT NULL,
  `jets9` float DEFAULT NULL,
  `jets10` float DEFAULT NULL,
  `jets11` float DEFAULT NULL,
  `jets12` float DEFAULT NULL,
  `result_jets` varchar(45) DEFAULT NULL,
  `tfa` float DEFAULT NULL,
  `vel_jets` float DEFAULT NULL,
  `pd1` float DEFAULT NULL,
  `pd2` float DEFAULT NULL,
  `hhp` float DEFAULT NULL,
  `hsi` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_bit_reports_idx` (`report_id`) USING BTREE,
  KEY `fk_project_report_bit_brocas_modelos_idx` (`brocas_modelos_id`) USING BTREE,
  CONSTRAINT `fk_project_report_bit_brocas_modelos` FOREIGN KEY (`brocas_modelos_id`) REFERENCES `brocas_modelos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_project_report_bit_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_bit
-- ----------------------------

-- ----------------------------
-- Table structure for `project_report_casing`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_casing`;
CREATE TABLE `project_report_casing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `casing_id` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `top` float DEFAULT NULL,
  `bottom` float DEFAULT NULL,
  `capacity` float DEFAULT NULL,
  `length` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_casing_reports_idx` (`report_id`) USING BTREE,
  KEY `fk_project_report_casing_casing_idx` (`casing_id`) USING BTREE,
  CONSTRAINT `fk_project_report_casing_casing` FOREIGN KEY (`casing_id`) REFERENCES `casing` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_project_report_casing_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_casing
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_centrifugues
-- ----------------------------
INSERT INTO `project_report_centrifugues` VALUES ('1', '5', '1', '', '', '', '', '', '', '', '', '', null, '', '');
INSERT INTO `project_report_centrifugues` VALUES ('2', '6', '1', '', '', '', '', '', '', '', '', '', null, '', '');

-- ----------------------------
-- Table structure for `project_report_comments`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_comments`;
CREATE TABLE `project_report_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `rig_activity` text,
  `mud_activity` text NOT NULL,
  `comments` text NOT NULL,
  `charla_hse` varchar(150) DEFAULT NULL,
  `pusher` varchar(150) DEFAULT NULL,
  `company_man_1` varchar(150) DEFAULT NULL,
  `company_man_2` varchar(150) DEFAULT NULL,
  `mud_enginers_1` varchar(150) DEFAULT NULL,
  `mud_enginers_2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_comments
-- ----------------------------

-- ----------------------------
-- Table structure for `project_report_drill_string`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_drill_string`;
CREATE TABLE `project_report_drill_string` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `bha_name` varchar(45) DEFAULT NULL,
  `oddeci` float DEFAULT NULL,
  `iddeci` float DEFAULT NULL,
  `length` float DEFAULT NULL,
  `capacity_vol` float DEFAULT NULL,
  `displacement_vol` float DEFAULT NULL,
  `capacity_ft` float DEFAULT NULL,
  `displacement_ft` float DEFAULT NULL,
  `pressure` float DEFAULT NULL,
  `losses` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_drill_string_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_drill_string_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_drill_string
-- ----------------------------
INSERT INTO `project_report_drill_string` VALUES ('2', '1', '', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `project_report_drilling_parameters`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_drilling_parameters`;
CREATE TABLE `project_report_drilling_parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `parameter` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `value` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_drilling_parameters_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_drilling_parameters_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_drilling_parameters
-- ----------------------------
INSERT INTO `project_report_drilling_parameters` VALUES ('9', '1', 'Daily RPM', '', '0');
INSERT INTO `project_report_drilling_parameters` VALUES ('10', '1', 'Daily WOB', '', '0');
INSERT INTO `project_report_drilling_parameters` VALUES ('11', '1', 'Circ. Press', 'psi', '0');
INSERT INTO `project_report_drilling_parameters` VALUES ('12', '1', 'Average cavings while', 'bbl/h', '0');
INSERT INTO `project_report_drilling_parameters` VALUES ('13', '1', 'Average cutting while', 'bbl/h', '0');
INSERT INTO `project_report_drilling_parameters` VALUES ('14', '1', 'Feet drilling', 'ft', '0');
INSERT INTO `project_report_drilling_parameters` VALUES ('15', '1', 'Daily ROP', 'ft', '0');
INSERT INTO `project_report_drilling_parameters` VALUES ('16', '1', 'Daily avge Temp', 'ºF', '34');

-- ----------------------------
-- Table structure for `project_report_drilling_time`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_drilling_time`;
CREATE TABLE `project_report_drilling_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `drilling` varchar(45) DEFAULT NULL,
  `time` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_drilling_time_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_drilling_time_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_drilling_time
-- ----------------------------
INSERT INTO `project_report_drilling_time` VALUES ('11', '1', 'Drilling', '0');
INSERT INTO `project_report_drilling_time` VALUES ('12', '1', '', '0');
INSERT INTO `project_report_drilling_time` VALUES ('13', '1', '', '0');
INSERT INTO `project_report_drilling_time` VALUES ('14', '1', '', '0');
INSERT INTO `project_report_drilling_time` VALUES ('15', '1', '', '0');
INSERT INTO `project_report_drilling_time` VALUES ('16', '1', '', '0');
INSERT INTO `project_report_drilling_time` VALUES ('17', '1', '', '0');
INSERT INTO `project_report_drilling_time` VALUES ('18', '1', '', '0');
INSERT INTO `project_report_drilling_time` VALUES ('19', '1', '', '0');
INSERT INTO `project_report_drilling_time` VALUES ('20', '1', '', '0');

-- ----------------------------
-- Table structure for `project_report_hole`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_hole`;
CREATE TABLE `project_report_hole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `open_hole` float DEFAULT NULL,
  `rice_carbide_test` float DEFAULT NULL,
  `cuttings_caving_record` float DEFAULT NULL,
  `caliper` float DEFAULT NULL,
  `washout` float DEFAULT NULL,
  `average_hole` float DEFAULT NULL,
  `open_hole_length` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_hole_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_hole_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_hole
-- ----------------------------
INSERT INTO `project_report_hole` VALUES ('2', '1', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `project_report_losses`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_losses`;
CREATE TABLE `project_report_losses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `sub_surface` float DEFAULT NULL,
  `surface` float DEFAULT NULL,
  `cavings` float DEFAULT NULL,
  `shakers` float DEFAULT NULL,
  `mud_cleaner` float DEFAULT NULL,
  `centrifugues` float DEFAULT NULL,
  `dewatering` float DEFAULT NULL,
  `behind_casing` float DEFAULT NULL,
  `others` float DEFAULT NULL,
  `daily_surface_losses` float DEFAULT '0',
  `cumulative_surface_losses` float DEFAULT '0',
  `daily_sub_surface_losses` float DEFAULT '0',
  `cumulative_sub_surface_losses` float DEFAULT '0',
  `total_losses` float DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_project_report_losses_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_losses_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_losses
-- ----------------------------
INSERT INTO `project_report_losses` VALUES ('1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_mudcleaner
-- ----------------------------
INSERT INTO `project_report_mudcleaner` VALUES ('1', '3', '1', '', '', '', '', '', '', '', '', '', '', '', '');

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
-- Table structure for `project_report_pressure_loss`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_pressure_loss`;
CREATE TABLE `project_report_pressure_loss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `hydraulic_type` varchar(45) DEFAULT NULL,
  `surface` float DEFAULT NULL,
  `string` float DEFAULT NULL,
  `motor` float DEFAULT NULL,
  `bit` float DEFAULT NULL,
  `annular` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_pressure_loss_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_pressure_loss_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_pressure_loss
-- ----------------------------
INSERT INTO `project_report_pressure_loss` VALUES ('3', '1', 'powerlaw', '0', '0', '0', '0', '0', '0');
INSERT INTO `project_report_pressure_loss` VALUES ('4', '1', '', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `project_report_pump`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_pump`;
CREATE TABLE `project_report_pump` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bombas_id` int(11) DEFAULT NULL,
  `report_id` int(11) NOT NULL,
  `efficiency` float DEFAULT NULL,
  `spm` float DEFAULT NULL,
  `gal` float DEFAULT NULL,
  `gpm` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_pump_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_pump_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_pump
-- ----------------------------
INSERT INTO `project_report_pump` VALUES ('4', '0', '1', '0', '0', '0', '0');
INSERT INTO `project_report_pump` VALUES ('5', '0', '1', '0', '0', '0', '0');
INSERT INTO `project_report_pump` VALUES ('6', '0', '1', '0', '0', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_shakers
-- ----------------------------
INSERT INTO `project_report_shakers` VALUES ('1', '5', '1', '', '', '', '', '', '');
INSERT INTO `project_report_shakers` VALUES ('2', '6', '1', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `project_report_survey`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_survey`;
CREATE TABLE `project_report_survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `survey` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `value` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_survey_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_survey_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_survey
-- ----------------------------
INSERT INTO `project_report_survey` VALUES ('6', '1', 'SURVEY MD', 'ft', '0');
INSERT INTO `project_report_survey` VALUES ('7', '1', 'SURVEY TVD', 'ft', '0');
INSERT INTO `project_report_survey` VALUES ('8', '1', 'INCLINATION', 'Deg', '0');
INSERT INTO `project_report_survey` VALUES ('9', '1', 'AZIMUT', '', '0');
INSERT INTO `project_report_survey` VALUES ('10', '1', 'DOG LEG', '', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_report_test
-- ----------------------------
INSERT INTO `project_report_test` VALUES ('115', '1', '1', null, '06:00:00', '100');
INSERT INTO `project_report_test` VALUES ('116', '1', '1', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('117', '1', '1', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('118', '1', '2', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('119', '1', '2', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('120', '1', '2', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('121', '1', '3', null, '06:00:00', '34');
INSERT INTO `project_report_test` VALUES ('122', '1', '3', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('123', '1', '3', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('124', '1', '4', null, '06:00:00', '9');
INSERT INTO `project_report_test` VALUES ('125', '1', '4', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('126', '1', '4', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('127', '1', '5', null, '06:00:00', '53');
INSERT INTO `project_report_test` VALUES ('128', '1', '5', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('129', '1', '5', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('130', '1', '6', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('131', '1', '6', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('132', '1', '6', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('133', '1', '7', null, '06:00:00', '4');
INSERT INTO `project_report_test` VALUES ('134', '1', '7', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('135', '1', '7', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('136', '1', '8', null, '06:00:00', '3');
INSERT INTO `project_report_test` VALUES ('137', '1', '8', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('138', '1', '8', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('139', '1', '9', null, '06:00:00', '45');
INSERT INTO `project_report_test` VALUES ('140', '1', '9', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('141', '1', '9', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('142', '1', '10', null, '06:00:00', '67');
INSERT INTO `project_report_test` VALUES ('143', '1', '10', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('144', '1', '10', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('145', '1', '11', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('146', '1', '11', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('147', '1', '11', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('148', '1', '12', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('149', '1', '12', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('150', '1', '12', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('151', '1', '13', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('152', '1', '13', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('153', '1', '13', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('154', '1', '14', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('155', '1', '14', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('156', '1', '14', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('157', '1', '15', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('158', '1', '15', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('159', '1', '15', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('160', '1', '17', null, '06:00:00', '43');
INSERT INTO `project_report_test` VALUES ('161', '1', '17', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('162', '1', '17', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('163', '1', '18', null, '06:00:00', '23');
INSERT INTO `project_report_test` VALUES ('164', '1', '18', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('165', '1', '18', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('166', '1', '19', null, '06:00:00', '18');
INSERT INTO `project_report_test` VALUES ('167', '1', '19', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('168', '1', '19', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('169', '1', '20', null, '06:00:00', '17');
INSERT INTO `project_report_test` VALUES ('170', '1', '20', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('171', '1', '20', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('172', '1', '21', null, '06:00:00', '4');
INSERT INTO `project_report_test` VALUES ('173', '1', '21', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('174', '1', '21', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('175', '1', '22', null, '06:00:00', '3');
INSERT INTO `project_report_test` VALUES ('176', '1', '22', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('177', '1', '22', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('178', '1', '23', null, '06:00:00', '5');
INSERT INTO `project_report_test` VALUES ('179', '1', '23', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('180', '1', '23', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('181', '1', '24', null, '06:00:00', '13');
INSERT INTO `project_report_test` VALUES ('182', '1', '24', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('183', '1', '24', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('184', '1', '25', null, '06:00:00', '12');
INSERT INTO `project_report_test` VALUES ('185', '1', '25', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('186', '1', '25', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('187', '1', '26', null, '06:00:00', '20');
INSERT INTO `project_report_test` VALUES ('188', '1', '26', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('189', '1', '26', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('190', '1', '27', null, '06:00:00', '3');
INSERT INTO `project_report_test` VALUES ('191', '1', '27', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('192', '1', '27', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('193', '1', '28', null, '06:00:00', '2');
INSERT INTO `project_report_test` VALUES ('194', '1', '28', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('195', '1', '28', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('196', '1', '29', null, '06:00:00', '0.901');
INSERT INTO `project_report_test` VALUES ('197', '1', '29', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('198', '1', '29', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('199', '1', '30', null, '06:00:00', '0.083');
INSERT INTO `project_report_test` VALUES ('200', '1', '30', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('201', '1', '30', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('202', '1', '31', null, '06:00:00', '');
INSERT INTO `project_report_test` VALUES ('203', '1', '31', null, '14:00:00', '');
INSERT INTO `project_report_test` VALUES ('204', '1', '31', null, '23:00:00', '');
INSERT INTO `project_report_test` VALUES ('205', '1', '32', null, '06:00:00', '95');
INSERT INTO `project_report_test` VALUES ('206', '1', '32', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('207', '1', '32', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('208', '1', '33', null, '06:00:00', '0');
INSERT INTO `project_report_test` VALUES ('209', '1', '33', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('210', '1', '33', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('211', '1', '34', null, '06:00:00', '5.00');
INSERT INTO `project_report_test` VALUES ('212', '1', '34', null, '14:00:00', '0.00');
INSERT INTO `project_report_test` VALUES ('213', '1', '34', null, '23:00:00', '0.00');
INSERT INTO `project_report_test` VALUES ('214', '1', '35', null, '06:00:00', '2.61');
INSERT INTO `project_report_test` VALUES ('215', '1', '35', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('216', '1', '35', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('217', '1', '36', null, '06:00:00', '47.59');
INSERT INTO `project_report_test` VALUES ('218', '1', '36', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('219', '1', '36', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('220', '1', '37', null, '06:00:00', '0.00');
INSERT INTO `project_report_test` VALUES ('221', '1', '37', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('222', '1', '37', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('223', '1', '38', null, '06:00:00', '5.13');
INSERT INTO `project_report_test` VALUES ('224', '1', '38', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('225', '1', '38', null, '23:00:00', '0');
INSERT INTO `project_report_test` VALUES ('226', '1', '39', null, '06:00:00', '0.00');
INSERT INTO `project_report_test` VALUES ('227', '1', '39', null, '14:00:00', '0');
INSERT INTO `project_report_test` VALUES ('228', '1', '39', null, '23:00:00', '0');

-- ----------------------------
-- Table structure for `project_report_velocity`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_velocity`;
CREATE TABLE `project_report_velocity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `casing1` varchar(45) DEFAULT NULL,
  `casing2` varchar(45) DEFAULT NULL,
  `casing3` varchar(45) DEFAULT NULL,
  `dp1` varchar(45) DEFAULT NULL,
  `dp2` varchar(45) DEFAULT NULL,
  `dp3` varchar(45) DEFAULT NULL,
  `dc11` varchar(45) DEFAULT NULL,
  `dc12` varchar(45) DEFAULT NULL,
  `dc13` varchar(45) DEFAULT NULL,
  `dc21` varchar(45) DEFAULT NULL,
  `dc22` varchar(45) DEFAULT NULL,
  `dc23` varchar(45) DEFAULT NULL,
  `bouyancy` varchar(45) DEFAULT NULL,
  `ecd` varchar(45) DEFAULT NULL,
  `w_out` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_report_velocity_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_velocity_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_velocity
-- ----------------------------
INSERT INTO `project_report_velocity` VALUES ('2', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.862', '0', '0');

-- ----------------------------
-- Table structure for `project_report_volumen`
-- ----------------------------
DROP TABLE IF EXISTS `project_report_volumen`;
CREATE TABLE `project_report_volumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `total_act_circulate` float DEFAULT NULL,
  `casing` float DEFAULT NULL,
  `open_hole` float DEFAULT NULL,
  `total_empty_hole` float DEFAULT NULL,
  `string_displacement` float DEFAULT NULL,
  `hole_w_string` float DEFAULT NULL,
  `trip_tank` float DEFAULT '0',
  `active_pits` float DEFAULT '0',
  `pill` float DEFAULT '0',
  `total_reserve` float DEFAULT '0',
  `total_mud` float DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_project_report_volumen_reports_idx` (`report_id`) USING BTREE,
  CONSTRAINT `fk_project_report_volumen_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project_report_volumen
-- ----------------------------
INSERT INTO `project_report_volumen` VALUES ('1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of project_shakers
-- ----------------------------
INSERT INTO `project_shakers` VALUES ('1', '1', 'swaco', 'mongoose', '350', 'circular', '2', '0');
INSERT INTO `project_shakers` VALUES ('2', '1', 'Brand', 'cobra', '300', 'lineal', '3', '0');
INSERT INTO `project_shakers` VALUES ('3', '1', 'swaco', 'mongoose', '350', 'circular', '2', '0');
INSERT INTO `project_shakers` VALUES ('4', '1', 'Brand', 'cobra', '300', 'lineal', '3', '0');
INSERT INTO `project_shakers` VALUES ('5', '1', 'swaco', 'mongoose', '350', 'circular', '2', '1');
INSERT INTO `project_shakers` VALUES ('6', '1', 'Brand', 'cobra', '300', 'lineal', '3', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_tanks
-- ----------------------------
INSERT INTO `project_tanks` VALUES ('1', '1', '1', '2', '100', '100', '100', null, null, null, null, '0', '0', '103.1', '100', '1', '1');
INSERT INTO `project_tanks` VALUES ('2', '1', '1', '3', '100', '100', '100', null, null, null, null, '0', '0', '103.1', '100', '2', '1');
INSERT INTO `project_tanks` VALUES ('3', '1', '1', '15', '100', '100', '100', null, null, null, null, '0', '0', '103.1', '100', '1', '1');
INSERT INTO `project_tanks` VALUES ('4', '1', '0', '33', null, null, null, null, null, null, null, '0', '0', '200', '0', '2', '1');
INSERT INTO `project_tanks` VALUES ('5', '1', '1', '18', '100', '100', '100', null, null, null, null, '0', '0', '103.1', '100', '3', '1');

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
INSERT INTO `projects` VALUES ('1', 'FCKGW', '2012-09-05 10:06:37', 'ORITO', 'PETROMINERALES', 'CAMBRIA1', 'ORITO', '0000', 'ORITO', '1', null, '2012-09-05 10:06:37', '2012-09-05', '0', '2', '3', '1', '3', '1', '0');

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
INSERT INTO `report_materialstatus` VALUES ('1', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `report_materialstatus` VALUES ('2', '1', '3', '0', '0', '0', '0', '0');
INSERT INTO `report_materialstatus` VALUES ('3', '1', '6', '0', '0', '0', '0', '0');
INSERT INTO `report_materialstatus` VALUES ('4', '1', '7', '0', '0', '0', '0', '0');

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
  `mud_type` varchar(45) DEFAULT NULL,
  `activity` varchar(45) DEFAULT NULL,
  `formation` varchar(45) DEFAULT NULL,
  `bottoms_up` varchar(45) DEFAULT '0',
  `bottoms_up_stk` varchar(45) DEFAULT '0',
  `lag_down` varchar(45) DEFAULT '0',
  `lag_down_stk` varchar(45) DEFAULT '0',
  `total_lag` varchar(45) DEFAULT '0',
  `total_lag_stk` varchar(45) DEFAULT '0',
  `circulate` varchar(45) DEFAULT '0',
  `circulate_stk` varchar(45) DEFAULT '0',
  `feet_drilling` float DEFAULT '0',
  `daily_rop` float DEFAULT '0',
  `daily_avge_temp` float DEFAULT '0',
  `depth_md` float DEFAULT '0',
  `bit_depth` float DEFAULT '0',
  `bha` varchar(45) DEFAULT NULL,
  `bha_length` varchar(45) DEFAULT NULL,
  `hydraulic_type` varchar(45) DEFAULT NULL,
  `balance_fluido` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES ('1', '1', 'FCKGW_qflrpt_1', 'FCKGW', '2012-09-05', '1', '0', '1', 'Q - Drill in', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '34', '0', '0', '', '0', 'powerlaw', '0');

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
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `destiny` varchar(255) DEFAULT NULL,
  `address_from` varchar(255) DEFAULT NULL,
  `address_to` varchar(255) DEFAULT NULL,
  `city_from` varchar(255) DEFAULT NULL,
  `city_to` varchar(255) DEFAULT NULL,
  `attention` varchar(255) DEFAULT NULL,
  `conveyor` varchar(255) DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `identification` varchar(255) DEFAULT NULL,
  `driver` varchar(255) DEFAULT NULL,
  `plates` varchar(20) DEFAULT NULL,
  `endorsement` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of stock_transfers
-- ----------------------------

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
  `volumen_transferido_osc` float DEFAULT '0',
  `volumen_recibido_osc` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

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
  `volume` float DEFAULT NULL,
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
-- View structure for `vista_equipos`
-- ----------------------------
DROP VIEW IF EXISTS `vista_equipos`;
CREATE VIEW `vista_equipos` AS select `project_equipement`.`id` AS `id`,`project_equipement`.`project_id` AS `project`,`project_equipement`.`erp_id` AS `erp_id`,`project_equipement`.`product_name` AS `product_name`,`project_equipement`.`unit` AS `unit`,`project_equipement`.`description` AS `description`,`project_equipement`.`used_in_project` AS `used_in_project`,`project_equipement`.`price` AS `price`,`conversions_table`.`nombre_unidad` AS `nombre_unidad`,`conversions_table`.`equivalencia` AS `equivalencia`,`conversions_table`.`unidad_destino` AS `unidad_destino`,`project_equipement`.`active` AS `active`,`project_equipement`.`custom` AS `custom`,`project_equipement`.`commercial_name` AS `commercial_name` from (`project_equipement` left join `conversions_table` on((`conversions_table`.`id` = `project_equipement`.`unit`))) ;

-- ----------------------------
-- View structure for `vista_materiales`
-- ----------------------------
DROP VIEW IF EXISTS `vista_materiales`;
CREATE VIEW `vista_materiales` AS select `project_materials`.`id` AS `id`,`project_materials`.`project_id` AS `project`,`project_materials`.`erp_id` AS `erp_id`,`project_materials`.`commercial_name` AS `commercial_name`,`project_materials`.`unit` AS `unit`,`project_materials`.`egravity` AS `egravity`,`project_materials`.`internal_name` AS `internal_name`,`project_materials`.`price` AS `price`,`project_materials`.`used_in_project` AS `used_in_project`,`conversions_table`.`nombre_unidad` AS `unit_name`,`conversions_table`.`equivalencia` AS `equivalencia`,`conversions_table`.`unidad_destino` AS `unidad_destino`,`project_materials`.`description` AS `description`,`project_materials`.`custom` AS `custom`,`project_materials`.`active` AS `active` from (`project_materials` left join `conversions_table` on((`conversions_table`.`id` = `project_materials`.`unit`))) ;

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
