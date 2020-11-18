# ************************************************************
# Sequel Ace SQL dump
# Version 2074
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.8-MariaDB)
# Database: samples_ci
# Generation Time: 2020-11-18 12:48:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ak_data_system_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_info`;

CREATE TABLE `ak_data_system_info` (
  `info_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `info_name` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `info_full_name` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `info_devs` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info_devs_url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_info` WRITE;
/*!40000 ALTER TABLE `ak_data_system_info` DISABLE KEYS */;

INSERT INTO `ak_data_system_info` (`info_id`, `info_name`, `info_full_name`, `info_devs`, `info_devs_url`)
VALUES
	(1,'SAMPLE APP','Sistem Sample Applikasi Codeigniter','Kangketik','https://kangketik.web.id');

/*!40000 ALTER TABLE `ak_data_system_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_instansi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_instansi`;

CREATE TABLE `ak_data_system_instansi` (
  `instansi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `instansi_logo` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `instansi_nama` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `instansi_alamat` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `instansi_alamat_email` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `instansi_website` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `instansi_kontak` char(25) CHARACTER SET utf8 DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`instansi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_instansi` WRITE;
/*!40000 ALTER TABLE `ak_data_system_instansi` DISABLE KEYS */;

INSERT INTO `ak_data_system_instansi` (`instansi_id`, `instansi_logo`, `instansi_nama`, `instansi_alamat`, `instansi_alamat_email`, `instansi_website`, `instansi_kontak`, `deleted`)
VALUES
	(1,'/assets/images/logo.png','-','-','-','-','-',0);

/*!40000 ALTER TABLE `ak_data_system_instansi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_level
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_level`;

CREATE TABLE `ak_data_system_level` (
  `level_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level_nama` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_by` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL,
  `updated_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_level` WRITE;
/*!40000 ALTER TABLE `ak_data_system_level` DISABLE KEYS */;

INSERT INTO `ak_data_system_level` (`level_id`, `level_nama`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'Master','System','2020-08-18 21:46:36',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_system_level` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_log`;

CREATE TABLE `ak_data_system_log` (
  `id` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `timestamp` int(10) unsigned NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_log` WRITE;
/*!40000 ALTER TABLE `ak_data_system_log` DISABLE KEYS */;

INSERT INTO `ak_data_system_log` (`id`, `ip_address`, `timestamp`, `data`)
VALUES
	('u2fcg90asbjl5f6o75obocdng1vrb92a','::1',1605703705,X'5F5F63695F6C6173745F726567656E65726174657C693A313630353730333531313B69647C733A313A2231223B6C6576656C5F69647C733A313A2231223B6E616D617C733A31343A22537570706F72742053797374656D223B6C6576656C7C733A363A224D6173746572223B417070496E666F7C733A31303A2253414D504C4520415050223B446576496E666F7C733A393A224B616E676B6574696B223B55726C4465767C733A32343A2268747470733A2F2F6B616E676B6574696B2E7765622E6964223B4C6F67676564496E7C623A313B');

/*!40000 ALTER TABLE `ak_data_system_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_modul
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_modul`;

CREATE TABLE `ak_data_system_modul` (
  `modul_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modul_urutan` int(11) NOT NULL,
  `modul_icon` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modul_nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modul_tipe` enum('Single','Dropdown') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dropdown',
  `modul_url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `modul_roles` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,1',
  `created_by` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`modul_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_modul` WRITE;
/*!40000 ALTER TABLE `ak_data_system_modul` DISABLE KEYS */;

INSERT INTO `ak_data_system_modul` (`modul_id`, `modul_urutan`, `modul_icon`, `modul_nama`, `modul_tipe`, `modul_url`, `modul_roles`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,'fa-tools','Pengaturan','Dropdown','#','0,1,2','System','2020-10-08 22:12:44','Support System','2020-11-18 19:45:39',0);

/*!40000 ALTER TABLE `ak_data_system_modul` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_modul_sub
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_modul_sub`;

CREATE TABLE `ak_data_system_modul_sub` (
  `submodul_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modul_id` bigint(20) unsigned NOT NULL,
  `submodul_urutan` int(10) unsigned NOT NULL DEFAULT 1,
  `submodul_root` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `submodul_nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `submodul_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `submodul_roles` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,1',
  `created_by` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`submodul_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_modul_sub` WRITE;
/*!40000 ALTER TABLE `ak_data_system_modul_sub` DISABLE KEYS */;

INSERT INTO `ak_data_system_modul_sub` (`submodul_id`, `modul_id`, `submodul_urutan`, `submodul_root`, `submodul_nama`, `submodul_url`, `submodul_roles`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,1,'Pengaturan Modul','Modul','pengaturan/modul','0,1','System','2020-10-08 22:13:27','Support System','2020-10-13 18:48:01',0),
	(2,1,2,'Pengaturan Submodul','Submodul','pengaturan/submodul','0,1','System','2020-10-08 22:13:40','Support System','2020-10-13 18:48:07',0),
	(3,1,3,'Pengaturan Level','Level','pengaturan/level','0,1','System','2020-10-08 22:13:57','Support System','2020-10-13 18:48:18',0),
	(4,1,4,'Pengaturan Hak Akses','Hak Akses','pengaturan/hak_akses','0,1','System','2020-10-08 22:14:14','Support System','2020-10-13 18:48:30',0),
	(5,1,5,'Pengaturan User','Pengguna','pengaturan/user','0,1','System','2020-10-08 22:14:28','Support System','2020-10-13 18:48:45',0),
	(6,1,6,'Pengaturan Akun','Akun','pengaturan/akun','0,1','System','2020-11-18 19:46:19',NULL,'2020-11-18 19:47:05',0);

/*!40000 ALTER TABLE `ak_data_system_modul_sub` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_user`;

CREATE TABLE `ak_data_system_user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` bigint(20) unsigned NOT NULL DEFAULT 2,
  `user_nama` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_login` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_pass` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `user_email` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_by` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  KEY `level_id` (`level_id`),
  CONSTRAINT `ak_data_system_user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `ak_data_system_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_user` WRITE;
/*!40000 ALTER TABLE `ak_data_system_user` DISABLE KEYS */;

INSERT INTO `ak_data_system_user` (`user_id`, `level_id`, `user_nama`, `user_login`, `user_pass`, `user_email`, `last_login`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,'Support System','support','$2y$10$2Veia7zlBUCRtFO3n8uQXuYoK6LBhUcYpGzq01vJAHxtsJDhS9cB2','-','2020-11-18 19:45:16','Administrator','2020-08-18 22:20:54','Support System','2020-11-18 19:45:16',0);

/*!40000 ALTER TABLE `ak_data_system_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
