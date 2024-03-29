/*
 Navicat Premium Data Transfer

 Source Server         : tai
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : dbshop

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 24/01/2022 12:36:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT 0,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (8, 'Đồng Hồ Nam', 0, 'dong-ho-nam', '2022-01-20 02:20:05', '2022-01-20 02:20:05', NULL);
INSERT INTO `categories` VALUES (9, 'Đồng Hồ Nữ', 0, 'dong-ho-nu', '2022-01-20 02:20:13', '2022-01-20 02:20:13', NULL);
INSERT INTO `categories` VALUES (10, 'Đồng Hồ Nam Dây Da', 8, 'dong-ho-nam-day-da', '2022-01-20 02:20:22', '2022-01-20 02:20:22', NULL);
INSERT INTO `categories` VALUES (11, 'Đồng Hồ Nữ Dây Da', 9, 'dong-ho-nu-day-da', '2022-01-20 02:20:38', '2022-01-20 02:20:38', NULL);
INSERT INTO `categories` VALUES (12, 'Đồng Hồ Treo Tường', 0, 'dong-ho-treo-tuong', '2022-01-20 02:20:55', '2022-01-20 02:20:55', NULL);
INSERT INTO `categories` VALUES (13, 'Đồng Hồ Để Bàn', 0, 'dong-ho-de-ban', '2022-01-20 02:21:21', '2022-01-20 02:21:21', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (5, 'Đồng Hồ Nam', 0, 'dong-ho-nam', '2022-01-20 02:13:47', '2022-01-20 02:13:47');
INSERT INTO `menus` VALUES (6, 'Đồng Hồ Nữ', 0, 'dong-ho-nu', '2022-01-20 02:13:54', '2022-01-20 02:13:54');
INSERT INTO `menus` VALUES (7, 'Đồng Hồ Nam Dây Da', 5, 'dong-ho-nam-day-da', '2022-01-20 02:14:04', '2022-01-20 02:14:04');
INSERT INTO `menus` VALUES (10, 'Đồng Hồ Để Bàn', 0, 'dong-ho-de-ban', '2022-01-20 02:15:00', '2022-01-20 02:15:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_01_12_121338_create_categories_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_01_12_170353_create_roles_table', 2);
INSERT INTO `migrations` VALUES (7, '2022_01_12_170637_create_permisstions_table', 2);
INSERT INTO `migrations` VALUES (8, '2022_01_12_172424_create_table_user_role', 2);
INSERT INTO `migrations` VALUES (9, '2022_01_12_172627_create_table_permisstion_role', 2);
INSERT INTO `migrations` VALUES (10, '2022_01_13_031351_add_column_parent_id_permisstions', 3);
INSERT INTO `migrations` VALUES (11, '2022_01_13_033606_add_column_key_permisstion_table', 4);
INSERT INTO `migrations` VALUES (12, '2022_01_17_041451_add_column_deleted_at_categories', 5);
INSERT INTO `migrations` VALUES (13, '2022_01_18_024618_create_products_table', 6);
INSERT INTO `migrations` VALUES (14, '2022_01_18_024922_create_product_images_table', 6);
INSERT INTO `migrations` VALUES (15, '2022_01_18_025109_create_tags_table', 6);
INSERT INTO `migrations` VALUES (16, '2022_01_18_025151_create_product_tags_table', 6);
INSERT INTO `migrations` VALUES (17, '2022_01_18_042153_add_column_feature_image_name', 7);
INSERT INTO `migrations` VALUES (18, '2022_01_18_050359_add_column_image_name', 8);
INSERT INTO `migrations` VALUES (19, '2022_01_18_141227_create_menus_table', 9);
INSERT INTO `migrations` VALUES (20, '2022_01_19_022641_add_column_deleted_at_products', 10);
INSERT INTO `migrations` VALUES (21, '2022_01_19_025606_create_sliders_table', 11);
INSERT INTO `migrations` VALUES (22, '2022_01_20_034447_add_column_count_pass_products', 12);
INSERT INTO `migrations` VALUES (23, '2022_01_20_092645_create_settings_table', 13);

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
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `permisstion_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 84 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 6, 2, NULL, NULL);
INSERT INTO `permission_role` VALUES (20, 1, 24, NULL, NULL);
INSERT INTO `permission_role` VALUES (21, 1, 25, NULL, NULL);
INSERT INTO `permission_role` VALUES (22, 1, 26, NULL, NULL);
INSERT INTO `permission_role` VALUES (23, 1, 27, NULL, NULL);
INSERT INTO `permission_role` VALUES (35, 1, 19, NULL, NULL);
INSERT INTO `permission_role` VALUES (38, 1, 14, NULL, NULL);
INSERT INTO `permission_role` VALUES (39, 1, 15, NULL, NULL);
INSERT INTO `permission_role` VALUES (40, 1, 20, NULL, NULL);
INSERT INTO `permission_role` VALUES (47, 1, 35, NULL, NULL);
INSERT INTO `permission_role` VALUES (51, 1, 40, NULL, NULL);
INSERT INTO `permission_role` VALUES (54, 1, 44, NULL, NULL);
INSERT INTO `permission_role` VALUES (55, 1, 45, NULL, NULL);
INSERT INTO `permission_role` VALUES (58, 1, 49, NULL, NULL);
INSERT INTO `permission_role` VALUES (59, 1, 50, NULL, NULL);
INSERT INTO `permission_role` VALUES (62, 1, 16, NULL, NULL);
INSERT INTO `permission_role` VALUES (63, 1, 17, NULL, NULL);
INSERT INTO `permission_role` VALUES (64, 1, 21, NULL, NULL);
INSERT INTO `permission_role` VALUES (65, 1, 22, NULL, NULL);
INSERT INTO `permission_role` VALUES (67, 1, 37, NULL, NULL);
INSERT INTO `permission_role` VALUES (68, 1, 41, NULL, NULL);
INSERT INTO `permission_role` VALUES (69, 1, 42, NULL, NULL);
INSERT INTO `permission_role` VALUES (70, 1, 46, NULL, NULL);
INSERT INTO `permission_role` VALUES (71, 1, 47, NULL, NULL);
INSERT INTO `permission_role` VALUES (72, 1, 51, NULL, NULL);
INSERT INTO `permission_role` VALUES (73, 1, 52, NULL, NULL);
INSERT INTO `permission_role` VALUES (74, 2, 39, NULL, NULL);
INSERT INTO `permission_role` VALUES (75, 2, 44, NULL, NULL);
INSERT INTO `permission_role` VALUES (76, 1, 36, NULL, NULL);
INSERT INTO `permission_role` VALUES (77, 3, 34, NULL, NULL);
INSERT INTO `permission_role` VALUES (79, 1, 39, NULL, NULL);
INSERT INTO `permission_role` VALUES (80, 1, 34, NULL, NULL);
INSERT INTO `permission_role` VALUES (83, 2, 49, NULL, NULL);

-- ----------------------------
-- Table structure for permisstions
-- ----------------------------
DROP TABLE IF EXISTS `permisstions`;
CREATE TABLE `permisstions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `parent_id` int NOT NULL,
  `key_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permisstions
-- ----------------------------
INSERT INTO `permisstions` VALUES (13, 'category', 'category', '2022-01-17 02:20:51', '2022-01-17 02:20:51', 0, NULL);
INSERT INTO `permisstions` VALUES (14, 'list', 'list', '2022-01-17 02:20:51', '2022-01-17 02:20:51', 13, 'category_list');
INSERT INTO `permisstions` VALUES (15, 'add', 'add', '2022-01-17 02:20:51', '2022-01-17 02:20:51', 13, 'category_add');
INSERT INTO `permisstions` VALUES (16, 'edit', 'edit', '2022-01-17 02:20:51', '2022-01-17 02:20:51', 13, 'category_edit');
INSERT INTO `permisstions` VALUES (17, 'delete', 'delete', '2022-01-17 02:20:51', '2022-01-17 02:20:51', 13, 'category_delete');
INSERT INTO `permisstions` VALUES (18, 'user', 'user', '2022-01-17 02:21:45', '2022-01-17 02:21:45', 0, NULL);
INSERT INTO `permisstions` VALUES (19, 'list', 'list', '2022-01-17 02:21:45', '2022-01-17 02:21:45', 18, 'user_list');
INSERT INTO `permisstions` VALUES (20, 'add', 'add', '2022-01-17 02:21:45', '2022-01-17 02:21:45', 18, 'user_add');
INSERT INTO `permisstions` VALUES (21, 'edit', 'edit', '2022-01-17 02:21:45', '2022-01-17 02:21:45', 18, 'user_edit');
INSERT INTO `permisstions` VALUES (22, 'delete', 'delete', '2022-01-17 02:21:45', '2022-01-17 02:21:45', 18, 'user_delete');
INSERT INTO `permisstions` VALUES (23, 'role', 'role', '2022-01-17 02:21:53', '2022-01-17 02:21:53', 0, NULL);
INSERT INTO `permisstions` VALUES (24, 'list', 'list', '2022-01-17 02:21:53', '2022-01-17 02:21:53', 23, 'role_list');
INSERT INTO `permisstions` VALUES (25, 'add', 'add', '2022-01-17 02:21:53', '2022-01-17 02:21:53', 23, 'role_add');
INSERT INTO `permisstions` VALUES (26, 'edit', 'edit', '2022-01-17 02:21:53', '2022-01-17 02:21:53', 23, 'role_edit');
INSERT INTO `permisstions` VALUES (27, 'delete', 'delete', '2022-01-17 02:21:53', '2022-01-17 02:21:53', 23, 'role_delete');
INSERT INTO `permisstions` VALUES (33, 'product', 'product', '2022-01-18 10:28:05', '2022-01-18 10:28:05', 0, NULL);
INSERT INTO `permisstions` VALUES (34, 'list', 'list', '2022-01-18 10:28:05', '2022-01-18 10:28:05', 33, 'product_list');
INSERT INTO `permisstions` VALUES (35, 'add', 'add', '2022-01-18 10:28:05', '2022-01-18 10:28:05', 33, 'product_add');
INSERT INTO `permisstions` VALUES (36, 'edit', 'edit', '2022-01-18 10:28:05', '2022-01-18 10:28:05', 33, 'product_edit');
INSERT INTO `permisstions` VALUES (37, 'delete', 'delete', '2022-01-18 10:28:05', '2022-01-18 10:28:05', 33, 'product_delete');
INSERT INTO `permisstions` VALUES (38, 'slider', 'slider', '2022-01-19 13:45:38', '2022-01-19 13:45:38', 0, NULL);
INSERT INTO `permisstions` VALUES (39, 'list', 'list', '2022-01-19 13:45:38', '2022-01-19 13:45:38', 38, 'slider_list');
INSERT INTO `permisstions` VALUES (40, 'add', 'add', '2022-01-19 13:45:38', '2022-01-19 13:45:38', 38, 'slider_add');
INSERT INTO `permisstions` VALUES (41, 'edit', 'edit', '2022-01-19 13:45:38', '2022-01-19 13:45:38', 38, 'slider_edit');
INSERT INTO `permisstions` VALUES (42, 'delete', 'delete', '2022-01-19 13:45:38', '2022-01-19 13:45:38', 38, 'slider_delete');
INSERT INTO `permisstions` VALUES (43, 'setting', 'setting', '2022-01-21 07:49:05', '2022-01-21 07:49:05', 0, NULL);
INSERT INTO `permisstions` VALUES (44, 'list', 'list', '2022-01-21 07:49:05', '2022-01-21 07:49:05', 43, 'setting_list');
INSERT INTO `permisstions` VALUES (45, 'add', 'add', '2022-01-21 07:49:05', '2022-01-21 07:49:05', 43, 'setting_add');
INSERT INTO `permisstions` VALUES (46, 'edit', 'edit', '2022-01-21 07:49:05', '2022-01-21 07:49:05', 43, 'setting_edit');
INSERT INTO `permisstions` VALUES (47, 'delete', 'delete', '2022-01-21 07:49:05', '2022-01-21 07:49:05', 43, 'setting_delete');
INSERT INTO `permisstions` VALUES (48, 'menu', 'menu', '2022-01-21 07:49:59', '2022-01-21 07:49:59', 0, NULL);
INSERT INTO `permisstions` VALUES (49, 'list', 'list', '2022-01-21 07:49:59', '2022-01-21 07:49:59', 48, 'menu_list');
INSERT INTO `permisstions` VALUES (50, 'add', 'add', '2022-01-21 07:49:59', '2022-01-21 07:49:59', 48, 'menu_add');
INSERT INTO `permisstions` VALUES (51, 'edit', 'edit', '2022-01-21 07:49:59', '2022-01-21 07:49:59', 48, 'menu_edit');
INSERT INTO `permisstions` VALUES (52, 'delete', 'delete', '2022-01-21 07:49:59', '2022-01-21 07:49:59', 48, 'menu_delete');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_images
-- ----------------------------

-- ----------------------------
-- Table structure for product_tags
-- ----------------------------
DROP TABLE IF EXISTS `product_tags`;
CREATE TABLE `product_tags`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_tags
-- ----------------------------
INSERT INTO `product_tags` VALUES (1, 7, 4, '2022-01-20 08:25:38', '2022-01-20 08:25:38');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `feature_image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `feature_image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `count_pass` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Đồng Hồ Nam', 10000000, '/storage/product/1/1Yjg4chndCXPp4VVCxiO.Dong-ho-bentley-chinh-hang-tai-Thanh-Tung.jpg', '<p>Qu&yacute; Ph&aacute;i</p>', 1, 8, '2022-01-20 02:23:11', '2022-01-20 03:55:16', 'Dong-ho-bentley-chinh-hang-tai-Thanh-Tung.jpg', NULL, 5);
INSERT INTO `products` VALUES (2, 'Đồng Hồ Nam', 10000000, '/storage/product/1/S8n7WbYfLXkvLH3ZxGkh.EF-558D-2AV-0000.jpg', '<p>Qu&yacute; Ph&aacute;i</p>', 1, 8, '2022-01-20 02:23:11', '2022-01-20 02:23:11', 'EF-558D-2AV-0000.jpg', NULL, 3);
INSERT INTO `products` VALUES (3, 'Đồng Hồ Nam', 10000000, '/storage/product/1/S8n7WbYfLXkvLH3ZxGkh.EF-558D-2AV-0000.jpg', '<p>Qu&yacute; Ph&aacute;i</p>', 1, 8, '2022-01-20 02:23:11', '2022-01-20 02:23:11', 'EF-558D-2AV-0000.jpg', NULL, 8);
INSERT INTO `products` VALUES (4, 'Đồng Hồ Nam', 10000000, '/storage/product/1/S8n7WbYfLXkvLH3ZxGkh.EF-558D-2AV-0000.jpg', '<p>Qu&yacute; Ph&aacute;i</p>', 1, 8, '2022-01-20 02:23:11', '2022-01-20 02:23:11', 'EF-558D-2AV-0000.jpg', NULL, 2);
INSERT INTO `products` VALUES (5, 'Đồng Hồ Nam', 10000000, '/storage/product/1/S8n7WbYfLXkvLH3ZxGkh.EF-558D-2AV-0000.jpg', '<p>Qu&yacute; Ph&aacute;i</p>', 1, 8, '2022-01-20 02:23:11', '2022-01-20 02:23:11', 'EF-558D-2AV-0000.jpg', NULL, 0);
INSERT INTO `products` VALUES (6, 'Đồng Hồ Nam', 10000000, '/storage/product/1/S8n7WbYfLXkvLH3ZxGkh.EF-558D-2AV-0000.jpg', '<p>Qu&yacute; Ph&aacute;i</p>', 1, 8, '2022-01-20 02:23:11', '2022-01-20 02:23:11', 'EF-558D-2AV-0000.jpg', NULL, 7);
INSERT INTO `products` VALUES (7, 'Đồng Hồ Để Bàn', 20000000, '/storage/product/1/jZISgdqAMXiayCEIynst.để bàn.jfif', '<p>tiện lợi</p>', 1, 13, '2022-01-20 08:25:38', '2022-01-20 08:25:38', 'để bàn.jfif', NULL, NULL);
INSERT INTO `products` VALUES (8, 'Đồng Hồ Để Bàn', 20000000, '/storage/product/1/jZISgdqAMXiayCEIynst.để bàn.jfif', '<p>tiện lợi</p>', 1, 13, '2022-01-20 08:25:38', '2022-01-20 08:25:38', 'để bàn.jfif', NULL, NULL);
INSERT INTO `products` VALUES (9, 'Đồng Hồ Để Bàn', 20000000, '/storage/product/1/jZISgdqAMXiayCEIynst.để bàn.jfif', '<p>tiện lợi</p>', 1, 13, '2022-01-20 08:25:38', '2022-01-20 08:25:38', 'để bàn.jfif', NULL, NULL);
INSERT INTO `products` VALUES (10, 'Đồng Hồ Để Bàn', 20000000, '/storage/product/1/jZISgdqAMXiayCEIynst.để bàn.jfif', '<p>tiện lợi</p>', 1, 13, '2022-01-20 08:25:38', '2022-01-20 08:25:38', 'để bàn.jfif', NULL, NULL);
INSERT INTO `products` VALUES (11, 'Đồng Hồ Để Bàn', 20000000, '/storage/product/1/jZISgdqAMXiayCEIynst.để bàn.jfif', '<p>tiện lợi</p>', 1, 13, '2022-01-20 08:25:38', '2022-01-20 08:25:38', 'để bàn.jfif', NULL, NULL);
INSERT INTO `products` VALUES (12, 'Đồng Hồ Để Bàn', 20000000, '/storage/product/1/jZISgdqAMXiayCEIynst.để bàn.jfif', '<p>tiện lợi</p>', 1, 13, '2022-01-20 08:25:38', '2022-01-20 08:25:38', 'để bàn.jfif', NULL, NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'Quản trị hệ thống', NULL, NULL);
INSERT INTO `roles` VALUES (2, 'Guest', 'Khách hàng', NULL, NULL);
INSERT INTO `roles` VALUES (3, 'Developer', 'Phát triển hệ thống', NULL, NULL);
INSERT INTO `roles` VALUES (4, 'content', 'chỉnh sửa nội dung', NULL, NULL);
INSERT INTO `roles` VALUES (6, 'editor2', 'nnn', '2022-01-13 04:51:40', '2022-01-13 07:09:50');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `config_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'phone_contact', '0979164200', '2022-01-21 04:06:47', '2022-01-21 04:25:57');
INSERT INTO `settings` VALUES (2, 'email', 'nguyentrungtai02042001@gmail.com', '2022-01-21 05:01:05', '2022-01-21 05:01:05');
INSERT INTO `settings` VALUES (3, 'facebook_link', 'https://www.facebook.com/anhtaibavi02042001/', '2022-01-21 05:01:43', '2022-01-21 05:01:43');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (6, 'Đồng Hồ Thụy Sĩ  Pagini PA5566', 'Đồng Hồ Nam Pagini PA5566 Dây Thép Không Gỉ - Mặt Kính Shapphire Cao Cấp', '/storage/slider/1/v04MnsHKwYgm3TseDjOC.EF-558D-2AV-0000.jpg', 'EF-558D-2AV-0000.jpg', '2022-01-20 02:05:20', '2022-01-20 09:21:29');
INSERT INTO `sliders` VALUES (7, 'Đồng hồ Ogival OG1929-24AGS-GL-X', 'Tự động (Automatic) - Size 40mm - Kính Sapphire, Lộ đáy, Lịch ngày - Swiss made', '/storage/slider//bFF9QZee582MJ4mbS5KE.8689f1e2d2661609bab1a79af4ea3063.jfif', '8689f1e2d2661609bab1a79af4ea3063.jfif', '2022-01-20 02:07:24', '2022-01-20 02:07:24');
INSERT INTO `sliders` VALUES (8, 'Đồng Hồ Nam Pagini PA5566', 'Đồng Hồ Nam Pagini PA5566 Dây Thép Không Gỉ - Mặt Kính Shapphire Cao Cấp', '/storage/slider//07JeNBgUanjHqbKKhdcr.Dong-ho-bentley-chinh-hang-tai-Thanh-Tung.jpg', 'Dong-ho-bentley-chinh-hang-tai-Thanh-Tung.jpg', '2022-01-20 02:11:52', '2022-01-20 09:22:08');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (4, 'để bàn', '2022-01-20 08:25:38', '2022-01-20 08:25:38');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 3, 1, NULL, NULL);
INSERT INTO `user_role` VALUES (2, 3, 2, NULL, NULL);
INSERT INTO `user_role` VALUES (3, 1, 1, NULL, NULL);
INSERT INTO `user_role` VALUES (5, 5, 2, NULL, NULL);
INSERT INTO `user_role` VALUES (8, 5, 3, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Nguyễn Trung Tài', 'tai@gmail.com', NULL, '$2y$10$eagPbqdqCMVxMv2YkXVaju7jXk4yPQqdRCLxHmpDEG5.vLaPlgZKu', 'ehO32lEP5ca7ibO9gGeg4H5yNpnUqDMXl46CyI0Ghgi1maG0R2g0KH8Saomw', NULL, NULL);
INSERT INTO `users` VALUES (5, 'tai3', 'tai1@gmail.com', NULL, '$2y$10$OFyqBQBjuWdjvOCpd4AhWuqQfVNRYPC9QehUbGzvhnidbLUQ2ABXS', NULL, '2022-01-13 08:10:44', '2022-01-13 08:10:44');

SET FOREIGN_KEY_CHECKS = 1;
