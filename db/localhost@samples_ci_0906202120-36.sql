# ************************************************************
# Sequel Ace SQL dump
# Version 3030
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.9-MariaDB)
# Database: samples_ci
# Generation Time: 2021-06-09 13:36:19 +0000
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
  `created_by` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_info` WRITE;
/*!40000 ALTER TABLE `ak_data_system_info` DISABLE KEYS */;

INSERT INTO `ak_data_system_info` (`info_id`, `info_name`, `info_full_name`, `info_devs`, `info_devs_url`, `info_registered`, `info_sponsor`, `info_sponsor_url`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'SISKAMLINGCI','Sistem Keamanan Lingkungan Codeigniter','Kangketik','https://kangketik.web.id','KANGKETIK DEVELOPER','','','System','2021-05-23 22:51:12','Support System','2021-06-09 19:14:35',0);

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
  `level_url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `level_icon` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa-database',
  `level_background` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bg-info',
  `level_show_landing` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_level` WRITE;
/*!40000 ALTER TABLE `ak_data_system_level` DISABLE KEYS */;

INSERT INTO `ak_data_system_level` (`level_id`, `level_nama`, `level_url`, `level_icon`, `level_background`, `level_show_landing`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'Master','dashboard/landing','fa-database','#687980','0,1','System','2020-08-18 21:46:36',NULL,'2021-06-09 20:16:48',0),
	(2,'Administrator','dashboard/landing','fa-toolbox','#dddddd','0,1','System','2021-01-22 23:40:10','Support System','2021-06-09 20:16:51',0);

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



# Dump of table ak_data_system_modul
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_modul`;

CREATE TABLE `ak_data_system_modul` (
  `modul_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modul_urutan` int(11) NOT NULL,
  `modul_icon` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modul_nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `modul_background` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000',
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

INSERT INTO `ak_data_system_modul` (`modul_id`, `modul_urutan`, `modul_icon`, `modul_nama`, `modul_background`, `modul_tipe`, `modul_url`, `modul_roles`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,'fa-server','Sistem','#fff','Dropdown','#','0,1','Support System','2021-06-09 18:34:02','Tukang Ketik','2021-06-09 20:30:37',0),
	(2,2,'fa-tools','Pengaturan','#000','Dropdown','#','0,1,2','Support System','2021-06-09 18:34:15','Support System','2021-06-09 19:36:03',0);

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
	(1,1,1,'Informasi Sistem','Info Sistem','sistem/info','0,1','Support System','2021-06-09 18:35:03',NULL,NULL,0),
	(2,1,2,'Informasi Instansi','Daftar Instansi','sistem/instansi','0,1','Support System','2021-06-09 18:35:36','Support System','2021-06-09 19:30:35',0),
	(3,1,3,'Daftar Modul Utama','Daftar Modul','sistem/modul','0,1','Support System','2021-06-09 18:36:22','Support System','2021-06-09 19:30:50',0),
	(4,1,4,'Daftar Submodul','Daftar Submodul','sistem/submodul','0,1','Support System','2021-06-09 18:37:11','Support System','2021-06-09 19:31:07',0),
	(5,1,5,'Daftar Level','Daftar Level','sistem/level','0,1','Support System','2021-06-09 18:44:08','Support System','2021-06-09 19:31:23',0),
	(6,2,1,'Pengaturan Hak Akses','Hak Akses','pengaturan/hak_akses','0,1','Support System','2021-06-09 18:45:14','Support System','2021-06-09 19:36:15',0),
	(7,2,2,'Pengaturan User','Daftar User','pengaturan/user','0,1,2','Support System','2021-06-09 18:46:10','Support System','2021-06-09 19:36:22',0),
	(8,2,3,'Pengaturan Akun','Akun User','pengaturan/akun','0,1,2','Support System','2021-06-09 18:46:33','Support System','2021-06-09 19:36:26',0),
	(9,2,4,'Akses Fitur','Akses Fitur','pengaturan/fitur','0,1','Support System','2021-06-09 19:31:57',NULL,NULL,0);

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
	(1,1,1,'Support System','support','$2y$10$2Veia7zlBUCRtFO3n8uQXuYoK6LBhUcYpGzq01vJAHxtsJDhS9cB2','-',1,'2021-06-09 20:16:33','Administrator','2020-08-18 22:20:54','Support System','2021-06-09 20:16:33',0);

/*!40000 ALTER TABLE `ak_data_system_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_user_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_user_member`;

CREATE TABLE `ak_data_system_user_member` (
  `user_member_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` bigint(20) unsigned NOT NULL DEFAULT 2,
  `user_member_platform_id` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_member_nama` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_member_login` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_member_pass` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `user_member_email` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `user_member_platform` enum('Manual','Github','Google','Twitter') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manual',
  `last_login` datetime DEFAULT NULL,
  `created_by` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
