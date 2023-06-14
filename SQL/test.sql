/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 80028
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 80028
 File Encoding         : 65001

 Date: 15/06/2023 01:28:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article_list
-- ----------------------------
DROP TABLE IF EXISTS `article_list`;
CREATE TABLE `article_list`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article_list
-- ----------------------------
INSERT INTO `article_list` VALUES (1, '数据挖掘-导论', '1672754553654.jpg', '1686762490', '2', '数据挖掘（Data mining，别名：资料探勘、数据采矿）是指从大量的数据中通过算法搜索隐藏于其中信息的过程。\r\n\r\n数据挖掘通常与计算机科学有关，并通过统计、在线分析处理、情报检索、机器学习、专家系统（依靠过去的经验法则）和模式识别等诸多方法来实现上述目标。');
INSERT INTO `article_list` VALUES (2, 'ChatGPT！', 'vc2.gif', '1686763567', '4', 'ChatGPT是一个基于人工智能的聊天机器人，它可以与用户进行自然语言交互，回答用户的问题，提供各种服务和娱乐。ChatGPT使用了最先进的自然语言处理技术，可以理解和解释用户的意图，并根据用户的需求提供相应的回答和建议。ChatGPT可以在多个平台上使用，包括网页、手机应用和社交媒体等。\r\n');
INSERT INTO `article_list` VALUES (3, 'AutoGPT-自主实现用户设定的任何目标', 'vc1.gif', '1686763582', '4', 'AutoGPT的兴起，无需用人敲代码、自己有解决问题的思维、拥有一整套逻辑和自主运行能力。AI的发展这么快的吗？它是一个实验性的开源应用程序，展示了 GPT-4 语言模型的功能。该程序由 GPT-4 驱动，可以自主实现用户设定的任何目标。\r\nGitHub地址： https://github.com/Torantulino/Auto-GPT\r\n');
INSERT INTO `article_list` VALUES (4, '网络安全的意义', '图片7.png', '1686763595', '3', '说白了，信息安全就是保护敏感重要的信息不被非法访问获取，以及用来进—步做非法的事情。网络安全具体表现在多台计算机实现自主互联的环境下的信息安全问题，主要表现为:自主计算机安全、互联的安全(实现互联的设备、通信链路、网络软件、网络协议)以及各种网络应用和服务的安全。');
INSERT INTO `article_list` VALUES (5, '程序员如何学习量化交易', '图13.png', '1686763628', '1', '对有经验的开发来说这样的逻辑很简单，只要通过线程通信的方式就可以实现。A线程判断到满足条件就发个消息给B线程，B线程while(true)等待消息就行。技术本身不复杂，只是没接触过编程的不知道还可以这么干。很多普通的技术对非计算机行业的来说都很神秘，比如像GET或者POST请求，对程序员来说再熟悉不过，但很多刚入行的交易员对http请求是啥都不了解。转行量化交易，这两个行业各有各的难处，只是计算机出身的天生有比较强的行业兼容性，比起其他行业来说更容易上手。\r\n');
INSERT INTO `article_list` VALUES (6, '量化交易的主要方法', '1672759521786.jpg', '1686762853', '1', '从思维观点看，人工智能不仅限于逻辑思维，还要考虑形象思维、灵感思维才能促进人工智能的突破性发展，数学常被认为是多种学科的基础科学，因此人工智能学科也必须借用数学工具。数学不仅在标准逻辑、模糊数学等范围发挥作用，进入人工智能学科后也能促进其得到更快的发展。\r\n\r\n金融投资是一项复杂的、综合了各种知识与技术的学科，对智能的要求非常高。所以人工智能的很多技术可以用于量化投资分析中，包括专家系统、机器学习、神经网络、遗传算法等。\r\n');
INSERT INTO `article_list` VALUES (12, '渗透测试两大系统使用简介之Kail', '图片6.png', '1686763613', '3', 'Kali Linux是一个高级渗透测试和安全审计Linux发行版。作为使用者，你可以把它理解为一个特殊的Linux发行版，集成了精心挑选的渗透测试和安全审计的工具，供渗透测试和安全设计人员使用，也可称之为平台或者框架。\r\n');

-- ----------------------------
-- Table structure for category_list
-- ----------------------------
DROP TABLE IF EXISTS `category_list`;
CREATE TABLE `category_list`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eng` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category_list
-- ----------------------------
INSERT INTO `category_list` VALUES (1, '量化交易', 'Quantitative trading');
INSERT INTO `category_list` VALUES (2, '数据挖掘', 'Data mining');
INSERT INTO `category_list` VALUES (3, '网络安全', 'Network security');
INSERT INTO `category_list` VALUES (4, '人工智能', 'Artificial intelligence');

-- ----------------------------
-- Table structure for user_list
-- ----------------------------
DROP TABLE IF EXISTS `user_list`;
CREATE TABLE `user_list`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `psw` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_list
-- ----------------------------
INSERT INTO `user_list` VALUES (1, 'admin', '5f87d75401a125a4374a584b5bd5952c', 'd3f5945e1886067ac6957ccddb003675');
INSERT INTO `user_list` VALUES (2, 'TanZ', '85e9d4c7b6dd7ca47d656ec9d7a42d8d', 'd9599177ff9f49dbb75d5b0c0401a27a');
INSERT INTO `user_list` VALUES (9, 'root', 'd3142a0655e0fc3ae7344578eb44f030', '6dc101a377dbece2f2b6e8258a3367d6');

SET FOREIGN_KEY_CHECKS = 1;
