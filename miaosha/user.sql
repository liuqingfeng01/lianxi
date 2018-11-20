/*
Navicat MySQL Data Transfer

Source Server         : 20180719
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-17 10:17:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'zhangsan', '123456', null);
INSERT INTO `user` VALUES ('2', 'ddsfsdf', '111111', null);
INSERT INTO `user` VALUES ('3', 'fdaga', '111111', null);
INSERT INTO `user` VALUES ('4', 'wangwu', '111111', null);
INSERT INTO `user` VALUES ('5', 'eee', '111111', null);
INSERT INTO `user` VALUES ('6', 'dsfdsdf', '111111', null);
INSERT INTO `user` VALUES ('7', 'dsfgre', '96e79218965eb72c92a549dd5a330112', '1534984545');
INSERT INTO `user` VALUES ('8', 'bbbb', 'e10adc3949ba59abbe56e057f20f883e', '1534984945');
INSERT INTO `user` VALUES ('9', 'wangjun', 'e10adc3949ba59abbe56e057f20f883e', '1534987387');
