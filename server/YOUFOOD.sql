-- MySQL dump 10.13  Distrib 5.5.18, for osx10.6 (i386)
--
-- Host: localhost    Database: YOUFOOD
-- ------------------------------------------------------
-- Server version	5.5.18-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `is_chosen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Italie',1),(2,'Portugal',0),(3,'France',0),(4,'Espagne',0);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `waiter_id` int(11) NOT NULL,
  `transaction_id` varchar(30) DEFAULT NULL,
  `table` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (42,'4fcfbc2a1e06a',3,2,1,'3WB06748MA6177EEL',22,1),(43,'4fcfbc2a1e06a',21,2,1,'3WB06748MA6177EEL',22,1),(44,'4fcfbc2a1e06a',2,2,1,'3WB06748MA6177EEL',22,1),(45,'4fcfbc2a1e06a',1,2,1,'3WB06748MA6177EEL',22,1),(46,'4fcfbc2a1e06a',16,2,1,'3WB06748MA6177EEL',22,1),(47,'4fcfbc2a1e06a',16,2,1,'3WB06748MA6177EEL',22,1),(48,'4fcfbc6abace4',3,3,2,'3WB06748MA6177EEL',11,1),(49,'4fcfbc6abace4',21,3,2,'3WB06748MA6177EEL',11,1),(50,'4fcfbc6abace4',2,3,2,'3WB06748MA6177EEL',11,1),(51,'4fcfbc6abace4',1,3,2,'3WB06748MA6177EEL',11,1),(52,'4fcfbc6abace4',16,3,2,'3WB06748MA6177EEL',11,1),(53,'4fcfbc6abace4',16,3,2,'3WB06748MA6177EEL',11,1),(54,'4fcfbd805a2df',4,3,2,'3WB06748MA6177EEL',11,1),(55,'4fcfbd805a2df',3,3,2,'3WB06748MA6177EEL',11,1),(56,'4fcfc3cee2d99',3,3,2,'3WB06748MA6177EEL',11,1),(57,'4fcfc3cee2d99',1,3,2,'3WB06748MA6177EEL',11,1),(58,'4fcfc415e3a83',3,3,1,'3WB06748MA6177EEL',40,1),(59,'4fcfc415e3a83',2,3,1,'3WB06748MA6177EEL',40,1),(60,'4fcfc415e3a83',4,3,1,'3WB06748MA6177EEL',40,1),(61,'4fcfcb4bd6703',3,1,2,'3WB06748MA6177EEL',89,1),(62,'4fcfcb4bd6703',2,1,2,'3WB06748MA6177EEL',89,1),(63,'4fd88514a645e',3,1,2,'3WB06748MA6177EEL',89,1),(64,'4fd88514a645e',21,1,2,'3WB06748MA6177EEL',89,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `type` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `image_url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Pizza',9,2,1,'http://youfood.lan/images/Pizza.jpg'),(2,'Spaghettis Bolognaise',7,2,1,'http://youfood.lan/images/Spaghettis.jpg'),(3,'Jambon de Parme',16,1,1,'http://youfood.lan/images/Jambon_Parme.jpg'),(4,'Glace Italienne',3,3,1,'http://youfood.lan/images/Glace.jpg'),(16,'Coca Cola',4,4,1,'http://youfood.lan/images/Coca_Cola.jpg'),(21,'Verrine douceur italienne',6,1,1,'http://youfood.lan/images/entree_douceur_italienne.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
INSERT INTO `restaurant` VALUES (1,'Resto 1',1),(2,'Resto 2',1),(3,'Resto 1',3);
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `waiter`
--

DROP TABLE IF EXISTS `waiter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waiter`
--

LOCK TABLES `waiter` WRITE;
/*!40000 ALTER TABLE `waiter` DISABLE KEYS */;
INSERT INTO `waiter` VALUES (1,'John','Doe'),(2,'Frank','Lee');
/*!40000 ALTER TABLE `waiter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-13 14:20:59
