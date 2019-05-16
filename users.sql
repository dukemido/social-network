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

 Date: 16/05/2019 04:47:41
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
-- Records of friends
-- ----------------------------
INSERT INTO `friends` VALUES (2, 3);
INSERT INTO `friends` VALUES (3, 2);
INSERT INTO `friends` VALUES (3, 4);
INSERT INTO `friends` VALUES (4, 3);
INSERT INTO `friends` VALUES (3, 5);
INSERT INTO `friends` VALUES (5, 3);
INSERT INTO `friends` VALUES (6, 3);
INSERT INTO `friends` VALUES (3, 6);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `OwnerId` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Date` datetime(0) NULL DEFAULT NULL,
  `Pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('6', 'profile.php?id=3', 'has sent you a friend request', '2019-05-16 04:36:50', 'users/default_m.jpg', 'Omar Reda');
INSERT INTO `notifications` VALUES ('3', 'profile.php?id=6', 'has accepted your friend request', '2019-05-16 04:36:56', 'users/default_m.jpg', 'Islam Mostafa');
INSERT INTO `notifications` VALUES ('6', 'profile.php?id=3', 'has sent you a friend request', '2019-05-16 04:39:52', 'users/default_m.jpg', 'Omar Reda');
INSERT INTO `notifications` VALUES ('3', 'profile.php?id=6', 'has accepted your friend request', '2019-05-16 04:40:02', 'users/default_m.jpg', 'Islam Mostafa');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `UserId` int(11) NOT NULL,
  `Caption` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PostTime` datetime(6) NOT NULL,
  `IsPublic` tinyint(2) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (6, 'Test Post', '2019-05-16 02:26:36.000000', 0);

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests`  (
  `OwnerID` int(255) NOT NULL,
  `RequesteeID` int(255) NOT NULL,
  PRIMARY KEY (`OwnerID`, `RequesteeID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of requests
-- ----------------------------
INSERT INTO `requests` VALUES (5, 2);

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'm.ibrahim99x@gmail.com', '$2y$10$JTQoSAmLTTzLSkkhaxztsue74NPg8DNqT4rH7Al5L9uelVleqGX3G', 'Muhammad', 'Ibrahim', '', 'M', '0000-00-00 00:00:00', 'Alex', '', 'I am a software developer', 1);
INSERT INTO `users` VALUES (3, 'omarreda@gmail.com', '$2y$10$ucx7Vzua6qiL8Oi65wNMO.UZhpSq2zrZE6sfkbPvODjZalFtPy1oq', 'Omar', 'Reda', '', 'M', '0000-00-00 00:00:00', 'Egypt', '', 'Graphic Designer', 0);
INSERT INTO `users` VALUES (4, 'bakr@gmail.com', '$2y$10$YoQ.oIkyKInflKwKPZaGAOe7gYa6F7DSUK6eNUlhk6hOHciXfInRy', 'Bakr', 'Mohamed', '', 'M', '0000-00-00 00:00:00', 'Egypt', '', 'حلها انت يا رايق', 1);
INSERT INTO `users` VALUES (5, 'samy@gmail.com', '$2y$10$3njJR3o4yVHMwF.X6Csi8eb4p0SHibvqLLZEUS9d5G9mA2jsV5sTO', 'Ahmed', 'Samy', '', 'M', '0000-00-00 00:00:00', 'Egypt', '', 'هات بوسه', 1);
INSERT INTO `users` VALUES (6, 'islam@gmail.com', '$2y$10$s6eppepQMSBj6XZsNiza9OAtqXLNt/i0ei.VvNOQQababuYAifkwm', 'Islam', 'Mostafa', '', 'M', '0000-00-00 00:00:00', 'Egypt', '', 'Nothing yet.', 0);

SET FOREIGN_KEY_CHECKS = 1;
