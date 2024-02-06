/*
 Navicat Premium Data Transfer

 Source Server         : localhost 7.4
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:8889
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 06/02/2024 18:49:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_booking
-- ----------------------------
DROP TABLE IF EXISTS `tb_booking`;
CREATE TABLE `tb_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nopol` varchar(20) DEFAULT NULL,
  `jenis_kendaraan_id` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bahan_bakar` varchar(50) DEFAULT NULL,
  `keluhan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_booking
-- ----------------------------
BEGIN;
INSERT INTO `tb_booking` (`id`, `customer_id`, `tanggal`, `nopol`, `jenis_kendaraan_id`, `tahun`, `bahan_bakar`, `keluhan`) VALUES (1, 1, '2024-02-06', 'B 1234 ABC', 1, 2020, 'Premium', 'Perlu servis rutin');
INSERT INTO `tb_booking` (`id`, `customer_id`, `tanggal`, `nopol`, `jenis_kendaraan_id`, `tahun`, `bahan_bakar`, `keluhan`) VALUES (3, 2, '2024-02-06', 'K 1234 AA', 4, 2000, 'Solar', 'Mati');
COMMIT;

-- ----------------------------
-- Table structure for tb_customer
-- ----------------------------
DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_customer
-- ----------------------------
BEGIN;
INSERT INTO `tb_customer` (`id`, `name`, `address`, `phone`) VALUES (1, 'Riyan', 'Pasucen', '089679884144');
INSERT INTO `tb_customer` (`id`, `name`, `address`, `phone`) VALUES (2, 'Hadi', 'Pati', '085325123845');
COMMIT;

-- ----------------------------
-- Table structure for tb_jenis_kendaraan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_kendaraan`;
CREATE TABLE `tb_jenis_kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_jenis_kendaraan
-- ----------------------------
BEGIN;
INSERT INTO `tb_jenis_kendaraan` (`id`, `name`) VALUES (1, 'Motor');
INSERT INTO `tb_jenis_kendaraan` (`id`, `name`) VALUES (2, 'Mobil');
INSERT INTO `tb_jenis_kendaraan` (`id`, `name`) VALUES (3, 'Sepeda Motor');
INSERT INTO `tb_jenis_kendaraan` (`id`, `name`) VALUES (4, 'Truk');
INSERT INTO `tb_jenis_kendaraan` (`id`, `name`) VALUES (5, 'Bus');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
