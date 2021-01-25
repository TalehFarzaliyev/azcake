/*
 Navicat Premium Data Transfer

 Source Server         : localhost mysql
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : azcake.pro

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 20/01/2021 09:05:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_product` tinyint(255) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 0, 1, 1, '2020-10-14 18:11:50', '2020-10-14 18:11:50');
INSERT INTO `categories` VALUES (2, 1, 1, 1, '2021-01-11 06:40:34', '2021-01-11 06:40:34');
INSERT INTO `categories` VALUES (3, 1, 1, 1, '2021-01-11 06:40:50', '2021-01-11 06:40:50');
INSERT INTO `categories` VALUES (4, 1, 1, 1, '2021-01-11 06:41:05', '2021-01-11 06:41:11');
INSERT INTO `categories` VALUES (5, 1, 1, 1, '2021-01-11 06:41:27', '2021-01-11 06:41:48');
INSERT INTO `categories` VALUES (6, 1, 1, 1, '2021-01-11 06:41:58', '2021-01-11 06:42:18');
INSERT INTO `categories` VALUES (7, 1, 1, 1, '2021-01-11 06:42:12', '2021-01-11 06:42:24');
INSERT INTO `categories` VALUES (8, 0, 1, 1, '2021-01-11 06:42:37', '2021-01-11 06:42:37');
INSERT INTO `categories` VALUES (9, 0, 1, 1, '2021-01-11 06:43:20', '2021-01-11 06:43:20');
INSERT INTO `categories` VALUES (10, 0, 1, 1, '2021-01-11 06:43:41', '2021-01-11 06:43:41');
INSERT INTO `categories` VALUES (11, 0, 1, 1, '2021-01-11 06:44:16', '2021-01-11 06:44:16');
INSERT INTO `categories` VALUES (12, 0, 1, 1, '2021-01-19 17:33:27', '2021-01-19 17:33:27');
INSERT INTO `categories` VALUES (13, 0, 1, 1, '2021-01-19 17:33:59', '2021-01-19 17:33:59');
INSERT INTO `categories` VALUES (14, 0, 1, 1, '2021-01-19 17:37:56', '2021-01-19 17:37:56');
INSERT INTO `categories` VALUES (15, 14, 1, 1, '2021-01-19 17:39:33', '2021-01-19 17:41:18');
INSERT INTO `categories` VALUES (16, 14, 1, 1, '2021-01-19 17:39:46', '2021-01-19 17:40:59');
INSERT INTO `categories` VALUES (17, 14, 1, 1, '2021-01-19 17:40:31', '2021-01-19 17:40:49');
INSERT INTO `categories` VALUES (18, 14, 1, 1, '2021-01-19 17:41:43', '2021-01-19 17:41:43');
INSERT INTO `categories` VALUES (19, 14, 1, 1, '2021-01-19 17:41:56', '2021-01-19 17:41:56');
INSERT INTO `categories` VALUES (20, 14, 1, 1, '2021-01-19 17:42:11', '2021-01-19 17:42:11');
INSERT INTO `categories` VALUES (21, 0, 1, 0, '2021-01-19 23:24:17', '2021-01-19 23:24:17');

-- ----------------------------
-- Table structure for category_translations
-- ----------------------------
DROP TABLE IF EXISTS `category_translations`;
CREATE TABLE `category_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `category_translations_category_id_locale_unique`(`category_id`, `locale`) USING BTREE,
  INDEX `category_translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category_translations
-- ----------------------------
INSERT INTO `category_translations` VALUES (1, 1, 'az', 'TORTLAR', 'tortlar', 'TORTLAR');
INSERT INTO `category_translations` VALUES (2, 1, 'en', 'TORTLAR', 'tortlar', 'TORTLAR');
INSERT INTO `category_translations` VALUES (3, 1, 'ru', 'TORTLAR', 'tortlar', 'TORTLAR');
INSERT INTO `category_translations` VALUES (4, 2, 'az', 'Xanımlar üçün', 'xanimlar-ucun', 'Xanımlar üçün');
INSERT INTO `category_translations` VALUES (5, 2, 'en', 'Xanımlar üçün', 'xanimlar-ucun', 'Xanımlar üçün');
INSERT INTO `category_translations` VALUES (6, 2, 'ru', 'Xanımlar üçün', 'xanimlar-ucun', 'Xanımlar üçün');
INSERT INTO `category_translations` VALUES (7, 3, 'az', 'Bəylər üçün', 'beyler-ucun', 'Bəylər üçün');
INSERT INTO `category_translations` VALUES (8, 3, 'en', 'Bəylər üçün', 'beyler-ucun', 'Bəylər üçün');
INSERT INTO `category_translations` VALUES (9, 3, 'ru', 'Bəylər üçün', 'beyler-ucun', 'Bəylər üçün');
INSERT INTO `category_translations` VALUES (10, 4, 'az', 'Qızlar üçün', 'qizlar-ucun', 'Qızlar üçün');
INSERT INTO `category_translations` VALUES (11, 4, 'en', 'Qızlar üçün', 'qizlar-ucun', 'Qızlar üçün');
INSERT INTO `category_translations` VALUES (12, 4, 'ru', 'Qızlar üçün', 'qizlar-ucun', 'Qızlar üçün');
INSERT INTO `category_translations` VALUES (13, 5, 'az', 'Oğlanlar üçün', 'oglanlar-ucun', 'Oğlanlar üçün');
INSERT INTO `category_translations` VALUES (14, 5, 'en', 'Oğlanlar üçün', 'oglanlar-ucun', 'Oğlanlar üçün');
INSERT INTO `category_translations` VALUES (15, 5, 'ru', 'Oğlanlar üçün', 'oglanlar-ucun', 'Oğlanlar üçün');
INSERT INTO `category_translations` VALUES (16, 6, 'az', 'Nişan üçün', 'nisan-ucun', 'Nişan üçün');
INSERT INTO `category_translations` VALUES (17, 6, 'en', 'Nişan üçün', 'nisan-ucun', 'Nişan üçün');
INSERT INTO `category_translations` VALUES (18, 6, 'ru', 'Nişan üçün', 'nisan-ucun', 'Nişan üçün');
INSERT INTO `category_translations` VALUES (19, 7, 'az', 'Yeni doğulmuşlar', 'yeni-dogulmuslar', 'Yeni doğulmuşlar');
INSERT INTO `category_translations` VALUES (20, 7, 'en', 'Yeni doğulmuşlar', 'yeni-dogulmuslar', 'Yeni doğulmuşlar');
INSERT INTO `category_translations` VALUES (21, 7, 'ru', 'Yeni doğulmuşlar', 'yeni-dogulmuslar', 'Yeni doğulmuşlar');
INSERT INTO `category_translations` VALUES (22, 8, 'az', 'Digər', 'diger', 'Digər');
INSERT INTO `category_translations` VALUES (23, 8, 'en', 'Digər', 'diger', 'Digər');
INSERT INTO `category_translations` VALUES (24, 8, 'ru', 'Digər', 'diger', 'Digər');
INSERT INTO `category_translations` VALUES (25, 9, 'az', 'DESERT', 'desert', 'DESERT');
INSERT INTO `category_translations` VALUES (26, 9, 'en', 'DESERT', 'desert', 'DESERT');
INSERT INTO `category_translations` VALUES (27, 9, 'ru', 'DESERT', 'desert', 'DESERT');
INSERT INTO `category_translations` VALUES (28, 10, 'az', 'ŞƏRQ ŞİRNİYYATI', 'serq-sirniyyati', 'ŞƏRQ ŞİRNİYYATI');
INSERT INTO `category_translations` VALUES (29, 10, 'en', 'ŞƏRQ ŞİRNİYYATI', 'serq-sirniyyati', 'ŞƏRQ ŞİRNİYYATI');
INSERT INTO `category_translations` VALUES (30, 10, 'ru', 'ŞƏRQ ŞİRNİYYATI', 'serq-sirniyyati', 'ŞƏRQ ŞİRNİYYATI');
INSERT INTO `category_translations` VALUES (31, 11, 'az', 'ÇÖRƏKÇİLİK', 'corekcilik', 'ÇÖRƏKÇİLİK');
INSERT INTO `category_translations` VALUES (32, 11, 'en', 'ÇÖRƏKÇİLİK', 'corekcilik', 'ÇÖRƏKÇİLİK');
INSERT INTO `category_translations` VALUES (33, 11, 'ru', 'ÇÖRƏKÇİLİK', 'corekcilik', 'ÇÖRƏKÇİLİK');
INSERT INTO `category_translations` VALUES (34, 12, 'az', 'PEÇENYALAR', 'pecenyalar', 'PEÇENYALAR');
INSERT INTO `category_translations` VALUES (35, 12, 'en', 'PEÇENYALAR', 'pecenyalar', 'PEÇENYALAR');
INSERT INTO `category_translations` VALUES (36, 12, 'ru', 'PEÇENYALAR', 'pecenyalar', 'PEÇENYALAR');
INSERT INTO `category_translations` VALUES (37, 13, 'az', 'DİGƏR', 'diger', 'DİGƏR');
INSERT INTO `category_translations` VALUES (38, 13, 'en', 'DİGƏR', 'diger', 'DİGƏR');
INSERT INTO `category_translations` VALUES (39, 13, 'ru', 'DİGƏR', 'diger', 'DİGƏR');
INSERT INTO `category_translations` VALUES (40, 14, 'az', 'DİGƏR', 'diger', 'DIGƏR');
INSERT INTO `category_translations` VALUES (41, 14, 'en', 'DIGƏR', 'diger', 'DIGƏR');
INSERT INTO `category_translations` VALUES (42, 14, 'ru', 'DIGƏR', 'diger', 'DIGƏR');
INSERT INTO `category_translations` VALUES (43, 15, 'az', 'Qəhvə', 'qehve', 'Qəhvə');
INSERT INTO `category_translations` VALUES (44, 15, 'en', 'Qəhvə', 'qehve', 'Qəhvə');
INSERT INTO `category_translations` VALUES (45, 15, 'ru', 'Qəhvə', 'qehve', 'Qəhvə');
INSERT INTO `category_translations` VALUES (46, 16, 'az', 'Spirtli içkilər', 'spirtli-ickiler', 'Spirtli içkilər');
INSERT INTO `category_translations` VALUES (47, 16, 'en', 'Spirtli içkilər', 'spirtli-ickiler', 'Spirtli içkilər');
INSERT INTO `category_translations` VALUES (48, 16, 'ru', 'Spirtli içkilər', 'spirtli-ickiler', 'Spirtli içkilər');
INSERT INTO `category_translations` VALUES (49, 17, 'az', 'Çay', 'cay', 'Çay');
INSERT INTO `category_translations` VALUES (50, 17, 'en', 'Çay', 'cay', 'Çay');
INSERT INTO `category_translations` VALUES (51, 17, 'ru', 'Çay', 'cay', 'Çay');
INSERT INTO `category_translations` VALUES (52, 18, 'az', 'Xonça', 'xonca', 'Xonça');
INSERT INTO `category_translations` VALUES (53, 18, 'en', 'Xonça', 'xonca', 'Xonça');
INSERT INTO `category_translations` VALUES (54, 18, 'ru', 'Xonça', 'xonca', 'Xonça');
INSERT INTO `category_translations` VALUES (55, 19, 'az', 'Bal', 'bal', 'Bal');
INSERT INTO `category_translations` VALUES (56, 19, 'en', 'Bal', 'bal', 'Bal');
INSERT INTO `category_translations` VALUES (57, 19, 'ru', 'Bal', 'bal', 'Bal');
INSERT INTO `category_translations` VALUES (58, 20, 'az', 'Aksesuarlar', 'aksesuarlar', 'Aksesuarlar');
INSERT INTO `category_translations` VALUES (59, 20, 'en', 'Aksesuarlar', 'aksesuarlar', 'Aksesuarlar');
INSERT INTO `category_translations` VALUES (60, 20, 'ru', 'Aksesuarlar', 'aksesuarlar', 'Aksesuarlar');
INSERT INTO `category_translations` VALUES (61, 21, 'az', 'TORT RESEPTLƏRİ', 'tort-reseptleri', 'TORT RESEPTLƏRİ');
INSERT INTO `category_translations` VALUES (62, 21, 'en', 'TORT RESEPTLƏRİ', 'tort-reseptleri', 'TORT RESEPTLƏRİ');
INSERT INTO `category_translations` VALUES (63, 21, 'ru', 'TORT RESEPTLƏRİ', 'tort-reseptleri', 'TORT RESEPTLƏRİ');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `customers_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 'test', 'test', 'test@example.com', '994999999999', 1, NULL, '$2y$10$HujjSmtP48fvr8.PmguKeOBbNi2kVeLSIPSJXid8PPxMmsRPktPjK', NULL, '2020-10-14 18:59:16', '2020-10-14 18:59:16', NULL);
INSERT INTO `customers` VALUES (2, 'Kamran', 'Aliyev', 'ftaleh96@gmail.com', '0513189756', 1, NULL, '$2y$10$4SwOmUd9ysI2gP6UvX5XeODpWx0VhUEOXRc5ZtrGOE1eXt1ZiCCpu', NULL, '2020-11-21 01:18:18', '2020-11-21 01:18:18', NULL);
INSERT INTO `customers` VALUES (3, 'Lala', 'Aliyeva', '88-chanel@mail.ru', '0556806721', 1, NULL, '$2y$10$98hqlLqKA8.OrrDtEuhI5uZVYiVn8nuHO6UX1FNdlWorsGoo06Dva', NULL, '2020-12-20 21:22:03', '2020-12-20 21:22:03', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for faq_translations
-- ----------------------------
DROP TABLE IF EXISTS `faq_translations`;
CREATE TABLE `faq_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `faq_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `faq_translations_faq_id_locale_unique`(`faq_id`, `locale`) USING BTREE,
  INDEX `faq_translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `faq_translations_faq_id_foreign` FOREIGN KEY (`faq_id`) REFERENCES `faqs` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faq_translations
-- ----------------------------
INSERT INTO `faq_translations` VALUES (1, 1, 'Lorem Ipsum is simply dummy text of the printing ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley book.', 'az', NULL, NULL);
INSERT INTO `faq_translations` VALUES (2, 1, 'Lorem Ipsum is simply dummy text of the printing ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley book.', 'en', NULL, NULL);
INSERT INTO `faq_translations` VALUES (3, 1, 'Lorem Ipsum is simply dummy text of the printing ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley book.', 'ru', NULL, NULL);
INSERT INTO `faq_translations` VALUES (4, 2, 'Lorem Ipsum is simply dummy text of the printing ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley book.', 'az', NULL, NULL);
INSERT INTO `faq_translations` VALUES (5, 2, 'Lorem Ipsum is simply dummy text of the printing ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley book.', 'en', NULL, NULL);
INSERT INTO `faq_translations` VALUES (6, 2, 'Lorem Ipsum is simply dummy text of the printing ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley book.', 'ru', NULL, NULL);

-- ----------------------------
-- Table structure for faqs
-- ----------------------------
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faqs
-- ----------------------------
INSERT INTO `faqs` VALUES (1, 1, 1, NULL, NULL);
INSERT INTO `faqs` VALUES (2, 1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for galleries
-- ----------------------------
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `gallery_category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of galleries
-- ----------------------------
INSERT INTO `galleries` VALUES (1, 1, 1, 'gallery/image-6.jpg', 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for gallery_categories
-- ----------------------------
DROP TABLE IF EXISTS `gallery_categories`;
CREATE TABLE `gallery_categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery_categories
-- ----------------------------
INSERT INTO `gallery_categories` VALUES (1, 0, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for gallery_category_translations
-- ----------------------------
DROP TABLE IF EXISTS `gallery_category_translations`;
CREATE TABLE `gallery_category_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_categories_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `gallery_category_translations_locale_unique`(`locale`) USING BTREE,
  INDEX `gallery_category_translations_locale_index`(`locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery_category_translations
-- ----------------------------
INSERT INTO `gallery_category_translations` VALUES (1, 1, 'test', 'test', 'az');
INSERT INTO `gallery_category_translations` VALUES (2, 1, 'test', 'test', 'en');
INSERT INTO `gallery_category_translations` VALUES (3, 1, 'test', 'test', 'ru');

-- ----------------------------
-- Table structure for gallery_translations
-- ----------------------------
DROP TABLE IF EXISTS `gallery_translations`;
CREATE TABLE `gallery_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `gallery_translations_locale_unique`(`locale`) USING BTREE,
  INDEX `gallery_translations_locale_index`(`locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery_translations
-- ----------------------------
INSERT INTO `gallery_translations` VALUES (1, 1, 'test', 'test', 'az');
INSERT INTO `gallery_translations` VALUES (2, 1, 'test', 'test', 'en');
INSERT INTO `gallery_translations` VALUES (3, 1, 'test', 'test', 'ru');

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `direction` enum('rtl','ltr') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES (1, 'Azerbaijani', 'az', 1, 'ltr', NULL, '2020-10-14 13:14:16', '2020-10-14 13:14:16');
INSERT INTO `languages` VALUES (2, 'English', 'en', 1, 'ltr', NULL, '2020-10-14 13:14:16', '2020-10-14 13:14:16');
INSERT INTO `languages` VALUES (3, 'Russian', 'ru', 1, 'ltr', NULL, '2020-10-14 13:14:16', '2020-10-14 13:14:16');

-- ----------------------------
-- Table structure for ltm_translations
-- ----------------------------
DROP TABLE IF EXISTS `ltm_translations`;
CREATE TABLE `ltm_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT 0,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for menu_contents
-- ----------------------------
DROP TABLE IF EXISTS `menu_contents`;
CREATE TABLE `menu_contents`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `route` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'messages.error',
  `free` tinyint(4) NOT NULL DEFAULT 0,
  `sort` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_contents_menu_id_foreign`(`menu_id`) USING BTREE,
  CONSTRAINT `menu_contents_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_contents
-- ----------------------------
INSERT INTO `menu_contents` VALUES (2, 1, 0, 1, 0, '/', 'messages.error', 0, 0, '2021-01-11 06:44:26', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (3, 1, 0, 2, 2, '/', 'messages.error', 0, 0, '2021-01-11 06:44:32', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (4, 1, 0, 3, 2, '/', 'messages.error', 0, 1, '2021-01-11 06:44:38', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (5, 1, 0, 4, 2, '/', 'messages.error', 0, 2, '2021-01-11 06:44:43', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (6, 1, 0, 5, 2, '/', 'messages.error', 0, 3, '2021-01-11 06:44:48', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (7, 1, 0, 6, 2, '/', 'messages.error', 0, 4, '2021-01-11 06:44:54', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (8, 1, 0, 7, 2, '/', 'messages.error', 0, 5, '2021-01-11 06:45:00', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (9, 1, 0, 8, 2, '/', 'messages.error', 0, 6, '2021-01-11 06:45:06', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (11, 1, 0, 11, 0, '/', 'messages.error', 0, 3, '2021-01-11 06:45:22', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (13, 1, 0, 9, 0, '/', 'messages.error', 0, 1, '2021-01-11 06:45:37', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (14, 1, 0, 10, 0, '/', 'messages.error', 0, 2, '2021-01-11 06:45:43', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (16, 2, 1, 0, 0, '/', 'messages.error', 0, 0, '2021-01-11 07:08:17', '2021-01-11 07:37:49');
INSERT INTO `menu_contents` VALUES (17, 2, 2, 0, 0, '/', 'messages.error', 0, 2, '2021-01-11 07:08:20', '2021-01-11 07:37:49');
INSERT INTO `menu_contents` VALUES (18, 2, 3, 0, 0, '/', 'messages.error', 0, 1, '2021-01-11 07:09:33', '2021-01-11 07:37:49');
INSERT INTO `menu_contents` VALUES (19, 2, 0, 0, 0, '/gallery', 'messages.gallery', 0, 3, '2021-01-11 07:09:33', '2021-01-11 07:37:49');
INSERT INTO `menu_contents` VALUES (20, 1, 0, 12, 0, '/', 'messages.error', 0, 4, '2021-01-19 17:33:32', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (21, 1, 0, 14, 0, '/', 'messages.error', 0, 5, '2021-01-19 17:38:30', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (22, 1, 0, 15, 21, '/', 'messages.error', 0, 0, '2021-01-19 17:40:04', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (23, 1, 0, 16, 21, '/', 'messages.error', 0, 1, '2021-01-19 17:40:14', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (24, 1, 0, 17, 21, '/', 'messages.error', 0, 2, '2021-01-19 17:41:23', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (25, 1, 0, 18, 21, '/', 'messages.error', 0, 3, '2021-01-19 17:42:20', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (26, 1, 0, 19, 21, '/', 'messages.error', 0, 4, '2021-01-19 17:42:31', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (27, 1, 0, 20, 21, '/', 'messages.error', 0, 5, '2021-01-19 17:42:37', '2021-01-19 17:42:44');
INSERT INTO `menu_contents` VALUES (28, 2, 0, 0, 0, '/blog', 'messages.blog', 0, 3, '2021-01-11 07:09:33', '2021-01-11 07:37:49');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'main_menu', 1, '2021-01-11 06:36:35', '2021-01-11 06:36:35');
INSERT INTO `menus` VALUES (2, 'top_menu', 1, '2021-01-11 07:07:31', '2021-01-11 07:07:31');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_04_02_193005_create_translations_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_04_05_140549_create_languages_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_04_08_130457_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_04_08_130511_create_roles_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_04_08_130529_create_model_has_permissions_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_04_08_130542_create_model_has_roles_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_04_08_130558_create_role_has_permissions_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_04_09_170832_create_faqs_table', 1);
INSERT INTO `migrations` VALUES (12, '2020_04_09_170854_create_faq_translations_table', 1);
INSERT INTO `migrations` VALUES (13, '2020_04_09_191209_create_pages_table', 1);
INSERT INTO `migrations` VALUES (14, '2020_04_09_191254_create_page_translations_table', 1);
INSERT INTO `migrations` VALUES (15, '2020_05_14_143503_create_settings_table', 1);
INSERT INTO `migrations` VALUES (16, '2020_05_14_144546_create_categories_table', 1);
INSERT INTO `migrations` VALUES (17, '2020_05_14_144601_create_category_translations_table', 1);
INSERT INTO `migrations` VALUES (18, '2020_05_14_165805_create_posts_table', 1);
INSERT INTO `migrations` VALUES (19, '2020_05_14_165834_create_post_translations_table', 1);
INSERT INTO `migrations` VALUES (20, '2020_05_14_231604_create_services_table', 1);
INSERT INTO `migrations` VALUES (21, '2020_05_14_231623_create_service_translations_table', 1);
INSERT INTO `migrations` VALUES (22, '2020_05_14_234821_create_portfolios_table', 1);
INSERT INTO `migrations` VALUES (23, '2020_05_14_234838_create_portfolio_translations_table', 1);
INSERT INTO `migrations` VALUES (24, '2020_05_15_000405_create_testimonials_table', 1);
INSERT INTO `migrations` VALUES (25, '2020_05_15_000420_create_testimonial_translations_table', 1);
INSERT INTO `migrations` VALUES (26, '2020_05_15_002611_create_contacts_table', 1);
INSERT INTO `migrations` VALUES (27, '2020_05_15_015946_create_teams_table', 1);
INSERT INTO `migrations` VALUES (28, '2020_05_15_020000_create_team_translations_table', 1);
INSERT INTO `migrations` VALUES (29, '2020_05_15_101221_create_subscribers_table', 1);
INSERT INTO `migrations` VALUES (32, '2020_09_27_194354_create_customers_table', 1);
INSERT INTO `migrations` VALUES (33, '2020_09_27_194400_create_orders_table', 1);
INSERT INTO `migrations` VALUES (34, '2020_09_27_194407_create_products_table', 1);
INSERT INTO `migrations` VALUES (35, '2020_09_27_194413_create_product_translations_table', 1);
INSERT INTO `migrations` VALUES (36, '2020_09_27_194420_create_product_categories_table', 1);
INSERT INTO `migrations` VALUES (37, '2020_09_27_194427_create_product_category_translations_table', 1);
INSERT INTO `migrations` VALUES (38, '2020_09_27_194434_create_product_attributes_table', 1);
INSERT INTO `migrations` VALUES (39, '2020_09_27_194441_create_product_attribute_translations_table', 1);
INSERT INTO `migrations` VALUES (40, '2020_09_27_195217_create_order_products_table', 1);
INSERT INTO `migrations` VALUES (41, '2020_10_17_002207_create_sliders_table', 2);
INSERT INTO `migrations` VALUES (42, '2020_10_17_002409_create_slider_translations_table', 2);
INSERT INTO `migrations` VALUES (46, '2020_10_18_222647_create_product_images_table', 3);
INSERT INTO `migrations` VALUES (49, '2020_10_19_015911_create_gallery_categories_table', 5);
INSERT INTO `migrations` VALUES (50, '2020_10_19_015946_create_gallery_category_translations_table', 5);
INSERT INTO `migrations` VALUES (51, '2020_10_19_020352_create_galleries_table', 6);
INSERT INTO `migrations` VALUES (52, '2020_10_19_020401_create_gallery_translations_table', 6);
INSERT INTO `migrations` VALUES (55, '2020_04_17_195017_create_menus_table', 7);
INSERT INTO `migrations` VALUES (56, '2020_05_16_170640_create_menu_contents_table', 7);
INSERT INTO `migrations` VALUES (57, '2020_10_18_224356_create_single_product_attributes_table', 8);
INSERT INTO `migrations` VALUES (58, '2020_10_18_224404_create_single_product_attributes_translations_table', 8);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `model_has_permissions_permission_id_foreign`(`permission_id`) USING BTREE,
  INDEX `model_has_permissions_model_type_model_id_index`(`model_type`, `model_id`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `model_has_roles_role_id_foreign`(`role_id`) USING BTREE,
  INDEX `model_has_roles_model_type_model_id_index`(`model_type`, `model_id`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 1, 'App\\User', 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for order_products
-- ----------------------------
DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for page_translations
-- ----------------------------
DROP TABLE IF EXISTS `page_translations`;
CREATE TABLE `page_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `page_translations_page_id_locale_unique`(`page_id`, `locale`) USING BTREE,
  INDEX `page_translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of page_translations
-- ----------------------------
INSERT INTO `page_translations` VALUES (1, 1, 'About', 'about', '<dl class=\"list-terms list-terms-1\">\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                </dl><a class=\"privacy-link\" href=\"mailto:hello@example.com\">hello@example.com</a>', 'az');
INSERT INTO `page_translations` VALUES (2, 1, 'About', 'about', '<dl class=\"list-terms list-terms-1\">\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                </dl><a class=\"privacy-link\" href=\"mailto:hello@example.com\">hello@example.com</a>', 'en');
INSERT INTO `page_translations` VALUES (3, 1, 'About', 'about', '<dl class=\"list-terms list-terms-1\">\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                </dl><a class=\"privacy-link\" href=\"mailto:hello@example.com\">hello@example.com</a>', 'ru');
INSERT INTO `page_translations` VALUES (7, 2, 'Çadırılma ve Ödəniş', 'delivery-and-payment', '<dl class=\"list-terms list-terms-1\">\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                </dl><a class=\"privacy-link\" href=\"mailto:hello@example.com\">hello@example.com</a>', 'az');
INSERT INTO `page_translations` VALUES (8, 2, 'Çadırılma ve Ödəniş', 'delivery-and-payment', '<dl class=\"list-terms list-terms-1\">\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                </dl><a class=\"privacy-link\" href=\"mailto:hello@example.com\">hello@example.com</a>', 'en');
INSERT INTO `page_translations` VALUES (9, 2, 'Çadırılma ve Ödəniş', 'delivery-and-payment', '<dl class=\"list-terms list-terms-1\">\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                    <dt class=\"heading-4\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</dt>\r\n                    <dd>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standach dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</dd>\r\n                </dl><a class=\"privacy-link\" href=\"mailto:hello@example.com\">hello@example.com</a>', 'ru');
INSERT INTO `page_translations` VALUES (10, 3, 'FAQ', 'faq', '<p>FAQ</p>', 'az');
INSERT INTO `page_translations` VALUES (11, 3, 'FAQ', 'faq', '<p>FAQ</p>', 'en');
INSERT INTO `page_translations` VALUES (12, 3, 'FAQ', 'faq', '<p>FAQ</p>', 'ru');

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES (1, '', 1, NULL, NULL);
INSERT INTO `pages` VALUES (2, '', 1, NULL, NULL);
INSERT INTO `pages` VALUES (3, '', 1, '2021-01-11 07:09:24', '2021-01-11 07:09:24');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'language-list', 'web', '2020-10-14 13:14:15', '2020-10-14 13:14:15', NULL);
INSERT INTO `permissions` VALUES (2, 'language-create', 'web', '2020-10-14 13:14:15', '2020-10-14 13:14:15', NULL);
INSERT INTO `permissions` VALUES (3, 'language-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (4, 'language-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (5, 'page-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (6, 'page-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (7, 'page-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (8, 'page-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (9, 'category-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (10, 'category-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (11, 'category-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (12, 'category-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (13, 'post-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (14, 'post-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (15, 'post-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (16, 'post-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (17, 'service-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (18, 'service-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (19, 'service-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (20, 'service-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (21, 'portfolio-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (22, 'portfolio-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (23, 'portfolio-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (24, 'portfolio-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (25, 'faq-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (26, 'faq-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (27, 'faq-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (28, 'faq-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (29, 'testimonial-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (30, 'testimonial-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (31, 'testimonial-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (32, 'testimonial-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (33, 'contact-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (34, 'contact-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (35, 'contact-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (36, 'contact-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (37, 'team-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (38, 'team-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (39, 'team-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (40, 'team-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (41, 'role-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (42, 'role-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (43, 'role-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (44, 'role-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (45, 'user-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (46, 'user-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (47, 'user-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (48, 'user-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (49, 'subscriber-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (50, 'subscriber-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (51, 'subscriber-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (52, 'subscriber-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (53, 'product_category-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (54, 'product_category-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (55, 'product_category-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (56, 'product_category-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (57, 'product_attribute-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (58, 'product_attribute-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (59, 'product_attribute-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (60, 'product_attribute-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (61, 'product-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (62, 'product-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (63, 'product-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (64, 'product-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (65, 'order-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (66, 'order-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (67, 'order-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (68, 'order-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (69, 'customer-list', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (70, 'customer-create', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (71, 'customer-edit', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);
INSERT INTO `permissions` VALUES (72, 'customer-delete', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);

-- ----------------------------
-- Table structure for portfolio_translations
-- ----------------------------
DROP TABLE IF EXISTS `portfolio_translations`;
CREATE TABLE `portfolio_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `portfolio_translations_portfolio_id_locale_unique`(`portfolio_id`, `locale`) USING BTREE,
  INDEX `portfolio_translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `portfolio_translations_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for portfolios
-- ----------------------------
DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE `portfolios`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for post_translations
-- ----------------------------
DROP TABLE IF EXISTS `post_translations`;
CREATE TABLE `post_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `post_translations_post_id_locale_unique`(`post_id`, `locale`) USING BTREE,
  INDEX `post_translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_translations
-- ----------------------------
INSERT INTO `post_translations` VALUES (1, 1, 'TEST', 'TEST', '<p>TEST</p>', 'az');
INSERT INTO `post_translations` VALUES (2, 1, 'TEST', 'TEST', '<p>TEST</p>', 'en');
INSERT INTO `post_translations` VALUES (3, 1, 'TEST', 'TEST', '<p>TEST</p>', 'ru');
INSERT INTO `post_translations` VALUES (4, 2, 'TEST1', 'test1', '<p>TEST</p>', 'az');
INSERT INTO `post_translations` VALUES (5, 2, 'TEST1', 'test1', '<p>TEST</p>', 'en');
INSERT INTO `post_translations` VALUES (6, 2, 'TEST1', 'test1', '<p>TEST</p>', 'ru');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `posts_category_id_foreign`(`category_id`) USING BTREE,
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 21, 'blogs/WK0CIIfLbjWOR7Oz3j9j7Mc6rQc1fHBZKuFXBlsP.png', 1, '2021-01-19 23:24:56', '2021-01-19 23:31:32');
INSERT INTO `posts` VALUES (2, 21, 'blogs/xmuw5Ur640Fn7DadpHiC6rCFadTBzus8oFOuBdjF.jpeg', 1, '2021-01-19 23:36:59', '2021-01-19 23:36:59');

-- ----------------------------
-- Table structure for product_attribute_translations
-- ----------------------------
DROP TABLE IF EXISTS `product_attribute_translations`;
CREATE TABLE `product_attribute_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_attribute_translations_locale_index`(`locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_attribute_translations
-- ----------------------------
INSERT INTO `product_attribute_translations` VALUES (1, 1, 'Çəki, qr', 'az');
INSERT INTO `product_attribute_translations` VALUES (2, 1, 'Çəki, qr:', 'en');
INSERT INTO `product_attribute_translations` VALUES (3, 1, 'Çəki, qr:', 'ru');
INSERT INTO `product_attribute_translations` VALUES (4, 2, 'Person sayı', 'az');
INSERT INTO `product_attribute_translations` VALUES (5, 2, 'Person sayı:', 'en');
INSERT INTO `product_attribute_translations` VALUES (6, 2, 'Person sayı', 'ru');

-- ----------------------------
-- Table structure for product_attributes
-- ----------------------------
DROP TABLE IF EXISTS `product_attributes`;
CREATE TABLE `product_attributes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_attributes
-- ----------------------------
INSERT INTO `product_attributes` VALUES (1, 1, NULL, NULL, NULL);
INSERT INTO `product_attributes` VALUES (2, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `is_footer` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (1, 0, 0, 1, NULL, NULL, NULL);
INSERT INTO `product_categories` VALUES (2, 0, 0, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for product_category_translations
-- ----------------------------
DROP TABLE IF EXISTS `product_category_translations`;
CREATE TABLE `product_category_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `product_category_translations_locale_unique`(`locale`) USING BTREE,
  INDEX `product_category_translations_locale_index`(`locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_category_translations
-- ----------------------------
INSERT INTO `product_category_translations` VALUES (1, 1, 'test az', 'test-az', 'test az', 'az');
INSERT INTO `product_category_translations` VALUES (2, 1, 'test en', 'test-en', 'test en', 'en');
INSERT INTO `product_category_translations` VALUES (3, 1, 'test ru', 'test-ru', 'test ru', 'ru');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_images_product_id_index`(`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES (1, 1, 'products/gallery/single-product-1.png', NULL, NULL, NULL);
INSERT INTO `product_images` VALUES (2, 1, 'products/gallery/single-product-2.png', NULL, NULL, NULL);
INSERT INTO `product_images` VALUES (3, 1, 'products/gallery/single-product-3.png', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for product_translations
-- ----------------------------
DROP TABLE IF EXISTS `product_translations`;
CREATE TABLE `product_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `product_translations_product_id_locale_unique`(`product_id`, `locale`) USING BTREE,
  INDEX `product_translations_locale_index`(`locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_translations
-- ----------------------------
INSERT INTO `product_translations` VALUES (1, 1, 'test az', 'test-product', 'test', 'az');
INSERT INTO `product_translations` VALUES (2, 1, 'test en', 'test-product', 'test', 'en');
INSERT INTO `product_translations` VALUES (3, 1, 'test ru', 'test-product', 'test', 'ru');
INSERT INTO `product_translations` VALUES (4, 2, 'test 2 az', 'test-product-2', 'test 2', 'az');
INSERT INTO `product_translations` VALUES (5, 2, 'test 2 en', 'test-product-2', 'test 2', 'en');
INSERT INTO `product_translations` VALUES (6, 2, 'test 2 ru', 'test-product-2', 'test 2', 'ru');
INSERT INTO `product_translations` VALUES (7, 3, 'Banan Tortu', 'banan-tort', '<p>Banan Tortu&nbsp;Banan Tortu&nbsp;Banan Tortu&nbsp;Banan Tortu&nbsp;Banan Tortu&nbsp;Banan Tortu</p>', 'az');
INSERT INTO `product_translations` VALUES (8, 3, 'Banan Tortu', 'banan-tort', '<p>Banan Tortu</p>', 'en');
INSERT INTO `product_translations` VALUES (9, 3, 'Banan Tortu', 'banan-tort', '<p>Banan Tortu</p>', 'ru');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `old_price` decimal(8, 2) NULL DEFAULT NULL,
  `price` decimal(8, 2) NOT NULL,
  `is_sale` tinyint(1) NOT NULL DEFAULT 0,
  `is_home` tinyint(1) NOT NULL DEFAULT 0,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (3, 5, 0, 'products/04484f4c80d3e9d944d9aff3963b91a2.jpg', 1, NULL, 13.50, 0, 1, 0, '2020-11-21 00:29:33', '2021-01-12 07:36:10', NULL);

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `role_has_permissions_permission_id_foreign`(`permission_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 505 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (433, 1, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (434, 2, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (435, 3, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (436, 4, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (437, 5, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (438, 6, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (439, 7, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (440, 8, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (441, 9, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (442, 10, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (443, 11, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (444, 12, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (445, 13, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (446, 14, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (447, 15, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (448, 16, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (449, 17, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (450, 18, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (451, 19, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (452, 20, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (453, 21, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (454, 22, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (455, 23, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (456, 24, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (457, 25, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (458, 26, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (459, 27, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (460, 28, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (461, 29, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (462, 30, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (463, 31, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (464, 32, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (465, 33, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (466, 34, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (467, 35, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (468, 36, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (469, 37, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (470, 38, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (471, 39, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (472, 40, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (473, 41, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (474, 42, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (475, 43, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (476, 44, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (477, 45, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (478, 46, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (479, 47, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (480, 48, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (481, 49, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (482, 50, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (483, 51, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (484, 52, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (485, 53, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (486, 54, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (487, 55, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (488, 56, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (489, 57, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (490, 58, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (491, 59, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (492, 60, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (493, 61, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (494, 62, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (495, 63, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (496, 64, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (497, 65, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (498, 66, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (499, 67, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (500, 68, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (501, 69, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (502, 70, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (503, 71, 1, NULL, NULL, NULL);
INSERT INTO `role_has_permissions` VALUES (504, 72, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', '2020-10-14 13:14:16', '2020-10-14 13:14:16', NULL);

-- ----------------------------
-- Table structure for service_translations
-- ----------------------------
DROP TABLE IF EXISTS `service_translations`;
CREATE TABLE `service_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `service_translations_service_id_locale_unique`(`service_id`, `locale`) USING BTREE,
  INDEX `service_translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `service_translations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `settings_key_index`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'phone', '(000) 000-00-00');
INSERT INTO `settings` VALUES (2, 'facebook', 'gasgasg');
INSERT INTO `settings` VALUES (3, 'instagram', 'asgas');
INSERT INTO `settings` VALUES (4, 'site_title', 'http://napsolution.pro');
INSERT INTO `settings` VALUES (5, 'site_url', 'http://napsolution.pro');
INSERT INTO `settings` VALUES (6, 'email', 'info@napsolution.pro');
INSERT INTO `settings` VALUES (7, 'address_az', 'Address.');
INSERT INTO `settings` VALUES (8, 'address_ru', 'Address.');
INSERT INTO `settings` VALUES (9, 'address_en', 'Address.');
INSERT INTO `settings` VALUES (10, 'clock', 'Mon - Sat: 9:00 - 18:00');
INSERT INTO `settings` VALUES (11, 'pinterest', '');
INSERT INTO `settings` VALUES (12, 'youtube', '');
INSERT INTO `settings` VALUES (13, 'footer_message_az', 'safasgfas');
INSERT INTO `settings` VALUES (14, 'footer_message_ru', 'gasgasas');
INSERT INTO `settings` VALUES (15, 'footer_message_en', 'gasgas');

-- ----------------------------
-- Table structure for single_product_attributes
-- ----------------------------
DROP TABLE IF EXISTS `single_product_attributes`;
CREATE TABLE `single_product_attributes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `product_attribute_id` int(11) NOT NULL DEFAULT 0,
  `price` decimal(8, 2) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `single_product_attributes_product_id_index`(`product_id`) USING BTREE,
  INDEX `single_product_attributes_product_attribute_id_index`(`product_attribute_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of single_product_attributes
-- ----------------------------
INSERT INTO `single_product_attributes` VALUES (1, 3, 1, 10.00, '2021-01-12 08:50:02', '2021-01-12 09:04:11', '2021-01-12 09:04:11');
INSERT INTO `single_product_attributes` VALUES (2, 3, 1, 20.00, '2021-01-12 08:58:34', '2021-01-12 09:43:48', '2021-01-12 09:43:48');
INSERT INTO `single_product_attributes` VALUES (3, 3, 1, 30.00, '2021-01-12 09:00:52', '2021-01-12 09:43:51', '2021-01-12 09:43:51');
INSERT INTO `single_product_attributes` VALUES (4, 3, 1, 10.00, '2021-01-12 09:04:27', '2021-01-12 09:43:46', '2021-01-12 09:43:46');
INSERT INTO `single_product_attributes` VALUES (5, 3, 2, 3.00, '2021-01-12 09:17:40', '2021-01-12 09:43:32', '2021-01-12 09:43:32');
INSERT INTO `single_product_attributes` VALUES (6, 3, 2, 4.00, '2021-01-12 09:17:48', '2021-01-12 09:43:26', '2021-01-12 09:43:26');
INSERT INTO `single_product_attributes` VALUES (7, 3, 2, 10.00, '2021-01-12 09:44:02', '2021-01-12 09:44:02', NULL);
INSERT INTO `single_product_attributes` VALUES (8, 3, 2, 15.00, '2021-01-12 09:47:49', '2021-01-12 09:47:49', NULL);
INSERT INTO `single_product_attributes` VALUES (9, 3, 2, 10.00, '2021-01-12 09:48:00', '2021-01-12 10:08:10', '2021-01-12 10:08:10');
INSERT INTO `single_product_attributes` VALUES (10, 3, 2, 20.00, '2021-01-12 10:08:23', '2021-01-12 10:08:23', NULL);

-- ----------------------------
-- Table structure for single_product_attributes_translations
-- ----------------------------
DROP TABLE IF EXISTS `single_product_attributes_translations`;
CREATE TABLE `single_product_attributes_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `single_product_attributes_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `single_product_attributes_translations_locale_index`(`locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of single_product_attributes_translations
-- ----------------------------
INSERT INTO `single_product_attributes_translations` VALUES (1, 1, '1 Nefer', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (2, 1, '1 Nefer', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (3, 1, '1 Nefer', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (4, 2, '2 NEFER', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (5, 2, '2 NEFER', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (6, 2, '2 NEFER', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (7, 3, '3 Nefer', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (8, 3, '3 Nefer', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (9, 3, '3 Nefer', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (10, 4, '1 Nefer', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (11, 4, '1 Nefer', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (12, 4, '1 Nefer', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (13, 5, '10 Q', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (14, 5, '10 Q', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (15, 5, '10 Q', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (16, 6, '15 Q', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (17, 6, '15 Q', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (18, 6, '15 Q', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (19, 7, '1 NEFER', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (20, 7, '1 NEFER', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (21, 7, '1 NEFER', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (22, 8, '2 NEFER', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (23, 8, '2 NEFER', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (24, 8, '2 NEFER', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (25, 9, 'asdas', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (26, 9, 'asdas', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (27, 9, 'asdas', 'ru');
INSERT INTO `single_product_attributes_translations` VALUES (28, 10, '3 NEFER', 'az');
INSERT INTO `single_product_attributes_translations` VALUES (29, 10, '3 NEFER', 'en');
INSERT INTO `single_product_attributes_translations` VALUES (30, 10, '3 NEFER', 'ru');

-- ----------------------------
-- Table structure for slider_translations
-- ----------------------------
DROP TABLE IF EXISTS `slider_translations`;
CREATE TABLE `slider_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slider_translations_slider_id_locale_unique`(`slider_id`, `locale`) USING BTREE,
  INDEX `slider_translations_locale_index`(`locale`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of slider_translations
-- ----------------------------
INSERT INTO `slider_translations` VALUES (1, 1, 'customize-your-cake', 'Customize Your Cake', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.', 'Shop now', 'az');
INSERT INTO `slider_translations` VALUES (2, 1, 'customize-your-cake', 'Customize Your Cake', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.', 'Shop now', 'en');
INSERT INTO `slider_translations` VALUES (3, 1, 'customize-your-cake', 'Customize Your Cake', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.', 'Shop now', 'ru');
INSERT INTO `slider_translations` VALUES (4, 2, 'customize-your-cake', 'Customize Your Cake', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.', 'Shop now', 'az');
INSERT INTO `slider_translations` VALUES (5, 2, 'customize-your-cake', 'Customize Your Cake', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.', 'Shop now', 'en');
INSERT INTO `slider_translations` VALUES (6, 2, 'customize-your-cake', 'Customize Your Cake', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.', 'Shop now', 'ru');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_home` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (1, 'slider/slide-1.jpg', 1, 1, NULL, NULL, NULL);
INSERT INTO `sliders` VALUES (2, 'slider/slide-2.jpg', 1, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for subscribers
-- ----------------------------
DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE `subscribers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `subscribers_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for team_translations
-- ----------------------------
DROP TABLE IF EXISTS `team_translations`;
CREATE TABLE `team_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `team_translations_team_id_locale_unique`(`team_id`, `locale`) USING BTREE,
  INDEX `team_translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `team_translations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `facebook` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instagram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `website` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `teams_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for testimonial_translations
-- ----------------------------
DROP TABLE IF EXISTS `testimonial_translations`;
CREATE TABLE `testimonial_translations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `testimonial_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `testimonial_translations_testimonial_id_locale_unique`(`testimonial_id`, `locale`) USING BTREE,
  INDEX `testimonial_translations_locale_index`(`locale`) USING BTREE,
  CONSTRAINT `testimonial_translations_testimonial_id_foreign` FOREIGN KEY (`testimonial_id`) REFERENCES `testimonials` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for testimonials
-- ----------------------------
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `birthday` date NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'Admin', 'admin@admin.com', '51454', 1, 1, '1998-01-01', NULL, '$2y$10$7JattBk.u3/N30/ZwZsj2eSe8.QyHPz6Rlvc84aHuWeyVJEGiunq2', '8HUnM8vbsyUq90SBgG6eDjXychDX64SwdjNK8y9zdu1YJ6CiJQqtl5nTbW80', '2020-10-14 13:14:16', '2020-10-14 18:59:15', NULL);

SET FOREIGN_KEY_CHECKS = 1;
