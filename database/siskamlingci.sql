# ************************************************************
# Sequel Ace SQL dump
# Version 3034
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.9-MariaDB)
# Database: siskamlingci
# Generation Time: 2021-08-04 08:08:07 +0000
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
	(1,'SISKAMLINGCI','Sistem Keamanan Lingkungan Codeigniter','Kangketik','https://kangketik.web.id','KANGKETIK DEVELOPER','','',0,'System','2021-05-23 22:51:12','Support System','2021-08-04 14:59:53',0);

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



# Dump of table ak_data_system_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_menu`;

CREATE TABLE `ak_data_system_menu` (
  `menu_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_urutan` int(11) unsigned NOT NULL,
  `menu_icon` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_tipe` enum('Single','Dropdown') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dropdown',
  `menu_url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `menu_roles` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,1',
  `created_by` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_menu` WRITE;
/*!40000 ALTER TABLE `ak_data_system_menu` DISABLE KEYS */;

INSERT INTO `ak_data_system_menu` (`menu_id`, `menu_urutan`, `menu_icon`, `menu_nama`, `menu_tipe`, `menu_url`, `menu_roles`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,'fa-server','Sistem','Dropdown','#','0,1','Support System','2021-06-09 18:34:02','Support System','2021-08-04 14:56:21',0);

/*!40000 ALTER TABLE `ak_data_system_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_menu_sub
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_menu_sub`;

CREATE TABLE `ak_data_system_menu_sub` (
  `submenu_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) unsigned NOT NULL,
  `submenu_urutan` int(10) unsigned NOT NULL DEFAULT 1,
  `submenu_root` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `submenu_nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `submenu_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `submenu_roles` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,1',
  `created_by` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`submenu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ak_data_system_menu_sub` WRITE;
/*!40000 ALTER TABLE `ak_data_system_menu_sub` DISABLE KEYS */;

INSERT INTO `ak_data_system_menu_sub` (`submenu_id`, `menu_id`, `submenu_urutan`, `submenu_root`, `submenu_nama`, `submenu_url`, `submenu_roles`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,1,'Informasi Sistem','Informasi Sistem','sistem/informasi_sistem','0,1','Support System','2021-06-09 18:35:03','Support System','2021-08-04 14:57:38',0),
	(2,1,2,'Informasi Instansi','Daftar Instansi','sistem/informasi_instansi','0,1','Support System','2021-06-09 18:35:36','Support System','2021-08-04 14:56:47',0),
	(3,1,3,'Menu Utama','Daftar Menu','sistem/menu_utama','0,1','Support System','2021-06-09 18:36:22','Support System','2021-08-04 14:56:57',0),
	(4,1,4,'Submenu','Daftar Submenu','sistem/submenu','0,1','Support System','2021-06-09 18:37:11','Support System','2021-08-04 14:57:05',0),
	(5,1,5,'Daftar Level','Daftar Level','sistem/daftar_level','0,1','Support System','2021-06-09 18:44:08','Support System','2021-08-04 14:57:10',0),
	(6,1,7,'Hak Akses Menu','Daftar Hak Akses Menu','sistem/hak_akses_menu','0,1','Support System','2021-06-09 18:45:14','Support System','2021-08-04 14:57:19',0),
	(7,1,6,'Daftar User','Daftar User','sistem/daftar_user','0,1,2','Support System','2021-06-09 18:46:10','Support System','2021-08-04 14:57:15',0),
	(8,1,8,'Hak Akses Modul','Daftar Hak Akses Modul','sistem/hak_akses_modul','0,1','Support System','2021-06-09 19:31:57','Support System','2021-08-04 14:57:23',0);

/*!40000 ALTER TABLE `ak_data_system_menu_sub` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_migration`;

CREATE TABLE `ak_data_system_migration` (
  `migration_version` bigint(20) NOT NULL,
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
	(1,1,1,'Support System','support','$2y$10$2Veia7zlBUCRtFO3n8uQXuYoK6LBhUcYpGzq01vJAHxtsJDhS9cB2','-',1,'2021-08-04 15:05:38','Administrator','2020-08-18 22:20:54','Support System','2021-08-04 15:05:38',0),
	(2,2,2,'Administrator SAMPLE INSTANSI A','admsampleinstansia32','$2y$10$qnWe1pTKRbjCcUKKz0KKZeG6Jj81C7hDLSiVoL2FKxgOLF13pFdLi',NULL,0,NULL,'Support System','2021-08-04 14:55:20',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_system_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
