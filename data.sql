-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: albus
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `movies_new`
--

DROP TABLE IF EXISTS `movies_new`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies_new` (
  `movie_id` int(7) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies_new`
--

LOCK TABLES `movies_new` WRITE;
/*!40000 ALTER TABLE `movies_new` DISABLE KEYS */;
INSERT INTO `movies_new` VALUES (1,'Raiders of the Lost Ark'),(2,'Star Wars'),(3,'Gravity'),(4,'Air Force One'),(5,'The Terminator'),(24,'Aliens'),(54,NULL),(55,'2'),(56,'123'),(57,NULL),(58,''),(59,NULL),(60,NULL),(61,'t'),(62,NULL),(63,NULL),(64,NULL),(65,NULL),(66,NULL),(67,'Top Gun'),(68,NULL);
/*!40000 ALTER TABLE `movies_new` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `player_id` int(7) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'Mark','Hamill'),(2,'Harrison','Ford'),(3,'Carrie','Fisher'),(4,'Alec','Guiness'),(5,'Karen','Allen'),(6,'John','Rhys-Davies'),(7,'Alfred','Molina'),(8,'Peter','Cushing'),(9,'Anthony','Daniels'),(10,'Peter','Mayhew'),(11,'Ian','McKellen'),(12,'Sandra','Bullock'),(13,'George','Clooney'),(14,'Karen','Gillan'),(16,'Lily','James'),(17,'Robert','Downey');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `role_id` int(7) NOT NULL AUTO_INCREMENT,
  `player_id` int(7) DEFAULT NULL,
  `movie_id` int(7) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,2,1,'Indiana','Jones'),(2,1,2,'Luke','Skywalker'),(3,3,2,'Leia','Organa'),(4,2,2,'Han','Solo'),(5,4,2,'Obi-Wan','Kenobi'),(6,6,1,'Sallah',NULL),(7,5,1,'Marian','Ravenwood'),(8,8,2,'Wilhuff','Tarkin'),(9,9,2,'C-3PO',NULL),(10,12,3,'Ryan','Stone'),(11,13,3,'Matt','Kowalski'),(12,2,4,'James','Marshall'),(13,17,45,'Puppy',''),(14,17,49,'Derek','Lutz'),(33,NULL,10,'Chewbacca',''),(34,NULL,10,'Chewbacca',''),(35,10,2,'Chewbacca',''),(36,NULL,NULL,NULL,NULL),(37,NULL,NULL,NULL,NULL),(38,1,1,'',''),(39,NULL,NULL,NULL,NULL),(40,NULL,NULL,NULL,NULL),(41,NULL,NULL,NULL,NULL),(42,NULL,NULL,NULL,NULL),(43,NULL,NULL,NULL,NULL),(44,NULL,NULL,NULL,NULL),(46,NULL,NULL,NULL,NULL),(48,NULL,NULL,NULL,NULL),(49,NULL,NULL,NULL,NULL),(51,NULL,NULL,NULL,NULL),(52,NULL,NULL,NULL,NULL),(53,NULL,NULL,NULL,NULL),(54,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-16 15:08:22