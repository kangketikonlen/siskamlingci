# ************************************************************
# Sequel Ace SQL dump
# Version 3034
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.9-MariaDB)
# Database: siskamlingci
# Generation Time: 2021-07-24 08:47:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
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
  `info_registered` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info_sponsor` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_sponsor_url` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_status_sosmed` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_info` WRITE;
/*!40000 ALTER TABLE `ak_data_system_info` DISABLE KEYS */;

INSERT INTO `ak_data_system_info` (`info_id`, `info_name`, `info_full_name`, `info_devs`, `info_devs_url`, `info_registered`, `info_sponsor`, `info_sponsor_url`, `info_status_sosmed`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'SISKAMLINGCI','Sistem Keamanan Lingkungan Codeigniter','Kangketik','https://kangketik.web.id','KANGKETIK DEVELOPER','','',0,'System','2021-05-23 22:51:12','Support System','2021-07-23 15:21:44',0);

/*!40000 ALTER TABLE `ak_data_system_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_instansi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_instansi`;

CREATE TABLE `ak_data_system_instansi` (
  `instansi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `instansi_logo` varchar(128) CHARACTER SET utf8 DEFAULT '/assets/images/logo/default.png',
  `instansi_background` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT 'assets/images/background/background.jpg',
  `instansi_nama` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `instansi_alamat` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `instansi_alamat_email` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `instansi_website` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `instansi_url_sistem` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi_kontak` char(25) CHARACTER SET utf8 DEFAULT NULL,
  `instansi_user` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `instansi_pass` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_by` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`instansi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_instansi` WRITE;
/*!40000 ALTER TABLE `ak_data_system_instansi` DISABLE KEYS */;

INSERT INTO `ak_data_system_instansi` (`instansi_id`, `instansi_logo`, `instansi_background`, `instansi_nama`, `instansi_alamat`, `instansi_alamat_email`, `instansi_website`, `instansi_url_sistem`, `instansi_kontak`, `instansi_user`, `instansi_pass`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'/assets/images/logo/default.png','/assets/images/background/background.jpg','KANGKETIK','Jl. Raya Banjaran No. 112 D RT 03 RW.03','developer@kangketik.web.id','https://kangketik.web.id/','http://localhost/simp/','085155034228','','','System','2021-05-23 17:52:20','Support System','2021-06-09 16:36:37',0);

/*!40000 ALTER TABLE `ak_data_system_instansi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_level
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_level`;

CREATE TABLE `ak_data_system_level` (
  `level_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level_nama` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `level_url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dashboard/landing',
  `level_icon` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa-database',
  `level_background` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bg-info',
  `level_type` enum('Dashboard','Landing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Landing',
  `level_show_landing` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,1',
  `created_by` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_level` WRITE;
/*!40000 ALTER TABLE `ak_data_system_level` DISABLE KEYS */;

INSERT INTO `ak_data_system_level` (`level_id`, `level_nama`, `level_url`, `level_icon`, `level_background`, `level_type`, `level_show_landing`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'Master','dashboard/landing','fa-database','#53B8BB','Landing','0,1','System','2020-08-18 21:46:36',NULL,'2021-07-23 15:48:51',0),
	(2,'Administrator','dashboard/landing','fa-toolbox','#D79771','Landing','0,1','System','2021-01-22 23:40:10','Support System','2021-07-23 15:48:59',0);

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
	('9cjdbst481s0118kd14hsup3e5ps6lbq','::1',1627028457,X'5F5F63695F6C6173745F726567656E65726174657C693A313632373032383333313B'),
	('no42eprthjd9g2rtmvk7v89ei6eflqcp','::1',1627116385,X'5F5F63695F6C6173745F726567656E65726174657C693A313632373131363230303B69647C733A313A2231223B6E616D617C733A31343A22537570706F72742053797374656D223B6C6576656C7C733A363A224D6173746572223B706172656E74737C733A313A2231223B496E7374616E73697C733A313A2231223B417070496E666F7C733A32323A225349534B414D4C494E474349204B414E474B4554494B223B446576496E666F7C733A393A224B616E676B6574696B223B55726C4465767C733A32343A2268747470733A2F2F6B616E676B6574696B2E7765622E6964223B4C6F67676564496E7C623A313B6C6576656C5F746D707C733A313A2231223B75726C5F746D707C733A31373A2264617368626F6172642F6C616E64696E67223B6C6576656C5F69647C733A313A2231223B55726C446173687C733A31373A2264617368626F6172642F6C616E64696E67223B'),
	('v7qvvrfh3g0k6dh7rftfam2cvf0ttuf7','::1',1627042527,X'5F5F63695F6C6173745F726567656E65726174657C693A313632373034323339373B69647C733A313A2231223B6E616D617C733A31343A22537570706F72742053797374656D223B6C6576656C7C733A363A224D6173746572223B706172656E74737C733A313A2231223B496E7374616E73697C733A313A2231223B417070496E666F7C733A32323A225349534B414D4C494E474349204B414E474B4554494B223B446576496E666F7C733A393A224B616E676B6574696B223B55726C4465767C733A32343A2268747470733A2F2F6B616E676B6574696B2E7765622E6964223B4C6F67676564496E7C623A313B6C6576656C5F746D707C733A313A2231223B75726C5F746D707C733A31373A2264617368626F6172642F6C616E64696E67223B6C6576656C5F69647C733A313A2231223B55726C446173687C733A31373A2264617368626F6172642F6C616E64696E67223B');

/*!40000 ALTER TABLE `ak_data_system_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_migration`;

CREATE TABLE `ak_data_system_migration` (
  `migration_version` bigint(20) NOT NULL,
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_system_migration` WRITE;
/*!40000 ALTER TABLE `ak_data_system_migration` DISABLE KEYS */;

INSERT INTO `ak_data_system_migration` (`migration_version`, `updated_date`)
VALUES
	(8,'2021-07-23 19:20:48');

/*!40000 ALTER TABLE `ak_data_system_migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_modul
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_modul`;

CREATE TABLE `ak_data_system_modul` (
  `modul_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modul_urutan` int(11) unsigned NOT NULL,
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
	(1,1,'fa-server','Sistem','Dropdown','#','0,1','Support System','2021-06-09 18:34:02','Tukang Ketik','2021-07-24 15:46:13',0);

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
	(1,1,1,'Informasi Sistem','Informasi Aplikasi','sistem/info','0,1','Support System','2021-06-09 18:35:03','Support System','2021-07-23 15:41:13',0),
	(2,1,2,'Informasi Instansi','Daftar Instansi','sistem/instansi','0,1','Support System','2021-06-09 18:35:36','Support System','2021-06-09 19:30:35',0),
	(3,1,3,'Daftar Modul Utama','Fitur / Menu','sistem/modul','0,1','Support System','2021-06-09 18:36:22','Support System','2021-07-24 15:45:08',0),
	(4,1,4,'Daftar Submodul','Subfitur / Submenu','sistem/submodul','0,1','Support System','2021-06-09 18:37:11','Support System','2021-07-24 15:45:29',0),
	(5,1,5,'Daftar Level','Daftar Level','sistem/level','0,1','Support System','2021-06-09 18:44:08','Support System','2021-06-09 19:31:23',0),
	(6,1,7,'Daftar Hak Akses Fitur','Hak Akses Fitur','sistem/hak_akses_fitur','0,1','Support System','2021-06-09 18:45:14','Support System','2021-07-23 15:30:26',0),
	(7,1,6,'Daftar User','Daftar User','sistem/user','0,1,2','Support System','2021-06-09 18:46:10','Support System','2021-07-23 15:25:44',0),
	(8,1,8,'Daftar Hak Akses Modul','Hak Akses Modul','sistem/hak_akses_modul','0,1','Support System','2021-06-09 19:31:57','Support System','2021-07-23 15:45:19',0);

/*!40000 ALTER TABLE `ak_data_system_modul_sub` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_user`;

CREATE TABLE `ak_data_system_user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `instansi_id` bigint(20) unsigned NOT NULL,
  `level_id` bigint(20) unsigned NOT NULL DEFAULT 2,
  `user_nama` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_login` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_pass` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `user_email` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `user_parents` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `created_by` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_user` WRITE;
/*!40000 ALTER TABLE `ak_data_system_user` DISABLE KEYS */;

INSERT INTO `ak_data_system_user` (`user_id`, `instansi_id`, `level_id`, `user_nama`, `user_login`, `user_pass`, `user_email`, `user_parents`, `last_login`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,1,'Support System','support','$2y$10$2Veia7zlBUCRtFO3n8uQXuYoK6LBhUcYpGzq01vJAHxtsJDhS9cB2','-',1,'2021-07-24 14:42:12','Administrator','2020-08-18 22:20:54','Support System','2021-07-24 14:42:12',0);

/*!40000 ALTER TABLE `ak_data_system_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
