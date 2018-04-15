# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.14-MariaDB)
# Database: boldleads
# Generation Time: 2018-04-15 18:32:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table lead
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lead`;

CREATE TABLE `lead` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT '',
  `phone` varchar(20) DEFAULT NULL,
  `street_address` varchar(100) DEFAULT NULL,
  `street_address2` varchar(100) DEFAULT NULL,
  `city_address` varchar(20) DEFAULT NULL,
  `state_address` char(2) DEFAULT NULL,
  `zip_address` char(5) DEFAULT NULL,
  `home_sqft` int(11) unsigned DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lead` WRITE;
/*!40000 ALTER TABLE `lead` DISABLE KEYS */;

INSERT INTO `lead` (`id`, `first_name`, `last_name`, `email`, `phone`, `street_address`, `street_address2`, `city_address`, `state_address`, `zip_address`, `home_sqft`, `date_created`)
VALUES
	(1,'First','Trial','foo@bar.com','123456890','123 Main St','Apt 12','Somewhere','AL','12345',2500,'2018-04-13'),
	(2,'Second','Attempt','bar@foo.com','123456890','123 Main St','Apt 12','Somewhere','AL','12345',34567,'2018-04-14'),
	(5,'Ajax','One','ajax@test.com','6785432','','','','AL','',2500,'2018-04-14');

/*!40000 ALTER TABLE `lead` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
