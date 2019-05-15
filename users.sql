/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost:3306
 Source Schema         : social

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : 65001

 Date: 15/05/2019 18:21:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for friends
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends`  (
  `OwnerId` int(255) NOT NULL,
  `FriendId` int(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `UserId` int(255) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FirstName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LastName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PhoneNumber` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Birthdate` datetime(0) NOT NULL,
  `HomeTown` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `MartialStatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `AboutMe` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `HasPic` tinyint(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`UserId`, `Email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'm.ibrahim99x@gmail.com', '$2y$10$JTQoSAmLTTzLSkkhaxztsue74NPg8DNqT4rH7Al5L9uelVleqGX3G', 'Muhammad', 'Ibrahim', '', 'M', '0000-00-00 00:00:00', 'Alex', '', '', 0);

SET FOREIGN_KEY_CHECKS = 1;
