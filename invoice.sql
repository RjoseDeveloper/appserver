/*
 Navicat Premium Data Transfer

 Source Server         : db
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : invoice

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 22/02/2020 17:32:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion_categoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_added` datetime(0) NOT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (10, 'ServiÃ§os', 'ServiÃ§os Prestados Ã  Empresa', '2020-02-11 14:25:57');
INSERT INTO `categorias` VALUES (11, 'FormaÃ§Ã£o', 'Cursos e CapacitaÃ§Ã£o', '2020-02-11 18:04:56');
INSERT INTO `categorias` VALUES (12, 'Copias', 'Scan, Impressao e Diversos', '2020-02-22 11:01:07');

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono_cliente` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email_cliente` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `direccion_cliente` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_cliente` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_added` datetime(0) NOT NULL,
  PRIMARY KEY (`id_cliente`) USING BTREE,
  UNIQUE INDEX `codigo_producto`(`nombre_cliente`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (9, 'Amisse Januario', '874568548', 'acamili@gmail.com', 'Av. 25 de Setembro', '1124558', '2020-02-22 13:02:53');
INSERT INTO `clientes` VALUES (7, 'Universidade LÃºrio - Faculdade de Engenharia', '', '', 'Eduardo Mondlane, Pemba', '400030257', '2020-02-20 11:15:42');
INSERT INTO `clientes` VALUES (8, 'Universidade LÃºrio - FCN', '', '', 'Eduardo Mondlane, Pemba', '500023139', '2020-02-20 13:09:01');

-- ----------------------------
-- Table structure for currencies
-- ----------------------------
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `precision` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thousand_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decimal_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES (1, 'US Dollar', '$', '2', ',', '.', 'USD');
INSERT INTO `currencies` VALUES (2, 'Libra Esterlina', '&pound;', '2', ',', '.', 'GBP');
INSERT INTO `currencies` VALUES (3, 'Euro', 'â‚¬', '2', '.', ',', 'EUR');
INSERT INTO `currencies` VALUES (4, 'South African Rand', 'R', '2', '.', ',', 'ZAR');
INSERT INTO `currencies` VALUES (5, 'Danish Krone', 'kr ', '2', '.', ',', 'DKK');
INSERT INTO `currencies` VALUES (6, 'Israeli Shekel', 'NIS ', '2', ',', '.', 'ILS');
INSERT INTO `currencies` VALUES (7, 'Swedish Krona', 'kr ', '2', '.', ',', 'SEK');
INSERT INTO `currencies` VALUES (8, 'Kenyan Shilling', 'KSh ', '2', ',', '.', 'KES');
INSERT INTO `currencies` VALUES (9, 'Canadian Dollar', 'C$', '2', ',', '.', 'CAD');
INSERT INTO `currencies` VALUES (10, 'Philippine Peso', 'P ', '2', ',', '.', 'PHP');
INSERT INTO `currencies` VALUES (11, 'Indian Rupee', 'Rs. ', '2', ',', '.', 'INR');
INSERT INTO `currencies` VALUES (12, 'Australian Dollar', '$', '2', ',', '.', 'AUD');
INSERT INTO `currencies` VALUES (13, 'Singapore Dollar', 'SGD ', '2', ',', '.', 'SGD');
INSERT INTO `currencies` VALUES (14, 'Norske Kroner', 'kr ', '2', '.', ',', 'NOK');
INSERT INTO `currencies` VALUES (15, 'New Zealand Dollar', '$', '2', ',', '.', 'NZD');
INSERT INTO `currencies` VALUES (16, 'Vietnamese Dong', 'VND ', '0', '.', ',', 'VND');
INSERT INTO `currencies` VALUES (17, 'Swiss Franc', 'CHF ', '2', '\'', '.', 'CHF');
INSERT INTO `currencies` VALUES (18, 'Quetzal Guatemalteco', 'Q', '2', ',', '.', 'GTQ');
INSERT INTO `currencies` VALUES (19, 'Malaysian Ringgit', 'RM', '2', ',', '.', 'MYR');
INSERT INTO `currencies` VALUES (20, 'Real Brasile&ntilde;o', 'R$', '2', '.', ',', 'BRL');
INSERT INTO `currencies` VALUES (21, 'Thai Baht', 'THB ', '2', ',', '.', 'THB');
INSERT INTO `currencies` VALUES (22, 'Nigerian Naira', 'NGN ', '2', ',', '.', 'NGN');
INSERT INTO `currencies` VALUES (23, 'Peso Argentino', '$', '2', '.', ',', 'ARS');
INSERT INTO `currencies` VALUES (24, 'Bangladeshi Taka', 'Tk', '2', ',', '.', 'BDT');
INSERT INTO `currencies` VALUES (25, 'United Arab Emirates Dirham', 'DH ', '2', ',', '.', 'AED');
INSERT INTO `currencies` VALUES (26, 'Hong Kong Dollar', '$', '2', ',', '.', 'HKD');
INSERT INTO `currencies` VALUES (27, 'Indonesian Rupiah', 'Rp', '2', ',', '.', 'IDR');
INSERT INTO `currencies` VALUES (28, 'Peso Mexicano', '$', '2', ',', '.', 'MXN');
INSERT INTO `currencies` VALUES (29, 'Egyptian Pound', '&pound;', '2', ',', '.', 'EGP');
INSERT INTO `currencies` VALUES (30, 'Peso Colombiano', '$', '2', '.', ',', 'COP');
INSERT INTO `currencies` VALUES (31, 'West African Franc', 'CFA ', '2', ',', '.', 'XOF');
INSERT INTO `currencies` VALUES (32, 'Chinese Renminbi', 'RMB ', '2', ',', '.', 'CNY');
INSERT INTO `currencies` VALUES (33, 'Mozambique', 'MT', '2', ',', '.', 'METICAL');

-- ----------------------------
-- Table structure for detalle_factura
-- ----------------------------
DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE `detalle_factura`  (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`) USING BTREE,
  INDEX `numero_cotizacion`(`numero_factura`, `id_producto`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of detalle_factura
-- ----------------------------
INSERT INTO `detalle_factura` VALUES (74, 7, 22, 1, 500);
INSERT INTO `detalle_factura` VALUES (75, 8, 21, 1, 610);

-- ----------------------------
-- Table structure for facturas
-- ----------------------------
DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas`  (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime(0) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `total_venta` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_factura`) USING BTREE,
  UNIQUE INDEX `numero_cotizacion`(`numero_factura`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 49 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facturas
-- ----------------------------
INSERT INTO `facturas` VALUES (47, 7, '2020-02-22 13:19:59', 7, 4, '2', '585', 1);
INSERT INTO `facturas` VALUES (48, 8, '2020-02-22 15:17:11', 7, 4, '2', '713.7', 2);

-- ----------------------------
-- Table structure for historial
-- ----------------------------
DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial`  (
  `id_hitorial` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` datetime(0) NULL DEFAULT NULL,
  `nota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `referencia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cantidad` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_hitorial`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of historial
-- ----------------------------
INSERT INTO `historial` VALUES (1, 20, 1, '2020-02-22 12:28:28', 'Raimundo adicionou 10 producto(s) no inventario', 'dsadsa', 10);
INSERT INTO `historial` VALUES (2, 22, 1, '2020-02-22 12:54:48', 'Raimundo adicionou 20 producto(s) no inventario', '002', 20);
INSERT INTO `historial` VALUES (3, 21, 1, '2020-02-22 12:55:42', 'Raimundo adicionou 31 producto(s) no inventario', 'Stock vindo de Portugal', 31);
INSERT INTO `historial` VALUES (4, 21, 4, '2020-02-22 13:20:27', 'Raimundo eliminou 10 producto(s) do inventario', 'Mao Registo', 10);

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil`  (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ciudad` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `codigo_postal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `impuesto` int(2) NOT NULL,
  `moneda` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `logo_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `conta` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nib` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `banco` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES (1, 'INFOSS.NET, E.I', 'Alto Gingone', 'Pemba', '116441731', 'Cabo Delgado', '+(258) 849018210 ', 'infoss.net@yahoo.com', 17, 'MT', 'img/1579609583_slider_top.png', '354882649', '00010000003548826495', 'BIM');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre_producto` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_producto` tinyint(4) NOT NULL,
  `date_added` datetime(0) NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NULL DEFAULT NULL,
  `id_categoria` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`) USING BTREE,
  UNIQUE INDEX `codigo_producto`(`codigo_producto`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (21, '001', 'Contabilidade - Primavera ERP', 1, '2020-02-22 12:53:57', 610, 41, 11);
INSERT INTO `products` VALUES (22, '002', 'Recursos Humanos - Primavera ERP', 1, '2020-02-22 12:54:48', 500, 20, 11);

-- ----------------------------
-- Table structure for tmp
-- ----------------------------
DROP TABLE IF EXISTS `tmp`;
CREATE TABLE `tmp`  (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8, 2) NULL DEFAULT NULL,
  `session_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 120 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s name, unique',
  `user_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s password in salted and hashed format',
  `user_email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s email, unique',
  `date_added` datetime(0) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `user_name`(`user_name`) USING BTREE,
  UNIQUE INDEX `user_email`(`user_email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'user data' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (4, 'Raimundo', 'Jose', 'rjose', '$2y$10$rRjlXD36wBCkuYGG6BchZeIVnF0dcNKhpenKzPO796gQSnbyVlC5q', 'jhraimundo3@gmail.com', '2020-02-22 12:52:02', 'admin');
INSERT INTO `users` VALUES (5, 'Telcio Raimundo', 'Jose', 'tjose', '$2y$10$/vczU7kJTH5WoWm4N06FLOX3L0DrEr7eJ0DSKjhnjR0TJd3pZSHd2', 'telcio@gmail.com', '2020-02-22 12:53:02', 'user');

SET FOREIGN_KEY_CHECKS = 1;
