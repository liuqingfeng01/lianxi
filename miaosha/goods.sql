/*
Navicat MySQL Data Transfer

Source Server         : 20180719
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-17 10:17:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(255) DEFAULT NULL COMMENT '库存',
  `starttime` int(11) DEFAULT NULL COMMENT '秒杀开始时间',
  `endtime` int(11) DEFAULT NULL COMMENT '称杀结束时间',
  `path` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '商品图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '苹果手机', '6000.00', '0', '1542414014', '1542417614', 'p1.jpg');
INSERT INTO `goods` VALUES ('2', '华为手机', '3000.00', '16', '1542414014', '1542417900', 'p2.jpg');
INSERT INTO `goods` VALUES ('3', 'OPPO', '3200.00', '30', '1542414014', '1542417614', 'p3.jpg');
