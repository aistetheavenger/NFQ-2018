# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.13-MariaDB)
# Database: CupShop
# Generation Time: 2018-02-16 20:40:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Cupcakes2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cupcakes2`;

CREATE TABLE `Cupcakes2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` set('base','frost','top','shipping') COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `value` varchar(30) COLLATE utf8_lithuanian_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_lithuanian_ci NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

LOCK TABLES `Cupcakes2` WRITE;
/*!40000 ALTER TABLE `Cupcakes2` DISABLE KEYS */;

INSERT INTO `Cupcakes2` (`id`, `name`, `value`, `image`, `price`)
VALUES
	(1,'base','vanilla','/images/basevanilla.png',1),
	(2,'base','chocolate','/images/basechocolate.png',1),
	(3,'base','red_velvet','/images/basered_velvet.png',1),
	(4,'frost','chocolate','/images/frostchocolate.png',0.5),
	(5,'frost','vanilla','/images/frostvanilla.png',0.5),
	(6,'frost','caramel','/images/frostcaramel.png',0.5),
	(7,'top','caramel_popcorn','/images/topcaramel_popcorn.png',0.5),
	(8,'top','blueberry','/images/topblueberry.png',0.5),
	(9,'top','marshmellow','/images/topmarshmellow.png',0.5),
	(11,'top','none','/images/topnone.png',0),
	(12,'frost','none','/images/frostnone.png',0),
	(13,'shipping','none','',2);

/*!40000 ALTER TABLE `Cupcakes2` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Orders`;

CREATE TABLE `Orders` (
  `base` text COLLATE utf8_lithuanian_ci NOT NULL,
  `frost` text COLLATE utf8_lithuanian_ci NOT NULL,
  `topping` text COLLATE utf8_lithuanian_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;

INSERT INTO `Orders` (`base`, `frost`, `topping`, `quantity`, `price`)
VALUES
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('chocolate','none','sprincles',1,2),
	('chocolate','none','sprincles',1,2),
	('chocolate','none','sprincles',1,1.5),
	('chocolate','vanilla','sprincles',3,6),
	('red_velvet','chocolate','none',4,6),
	('red_velvet','caramel','marshmellow',5,10),
	('red_velvet','caramel','marshmellow',5,10),
	('red_velvet','caramel','marshmellow',5,10),
	('red_velvet','none','marshmellow',4,8),
	('vanilla','chocolate','none',7,12.5),
	('red_velvet','chocolate','none',1,3.5),
	('chocolate','caramel','blueberry',6,14),
	('vanilla','chocolate','none',5,9.5),
	('chocolate','vanilla','none',6,11),
	('chocolate','vanilla','none',6,11),
	('chocolate','none','none',3,5),
	('vanilla','chocolate','marshmellow',7,14),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','none','caramel_popcorn',8,12),
	('vanilla','none','caramel_popcorn',8,12),
	('vanilla','none','caramel_popcorn',8,12),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('chocolate','none','caramel_popcorn',5,9.5),
	('vanilla','chocolate','caramel_popcorn',1,4),
	('vanilla','chocolate','caramel_popcorn',8,18),
	('red_velvet','caramel','marshmellow',1,4),
	('vanilla','chocolate','none',20,32),
	('vanilla','chocolate','marshmellow',26,52),
	('vanilla','chocolate','marshmellow',26,52),
	('red_velvet','none','none',15,17),
	('red_velvet','caramel','marshmellow',6,14),
	('red_velvet','caramel','marshmellow',6,12),
	('vanilla','none','caramel_popcorn',9,15.5),
	('vanilla','none','caramel_popcorn',9,13.5),
	('vanilla','chocolate','caramel_popcorn',3,6),
	('vanilla','chocolate','caramel_popcorn',3,8),
	('vanilla','chocolate','blueberry',10,22),
	('vanilla','chocolate','blueberry',10,20);

/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
