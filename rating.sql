/*
Navicat MySQL Data Transfer

Source Server         : MyDB
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : reyting

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2017-08-13 21:54:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `data`
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `likes` varchar(10) DEFAULT NULL,
  `unlike` varchar(10) DEFAULT NULL,
  `news_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of data
-- ----------------------------
INSERT INTO `data` VALUES ('1', '265', '68', '5');
