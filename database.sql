-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: marketinteldb
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assessments`
--
USE `marketinteldb`;

DROP TABLE IF EXISTS `assessments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assessments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `MSMEID` int NOT NULL,
  `AssessmenType` varchar(50) NOT NULL,
  `CFMID` int DEFAULT NULL,
  `CFSID` int DEFAULT NULL,
  `SFMID` int DEFAULT NULL,
  `SFSID` int DEFAULT NULL,
  `SWOTID` int DEFAULT NULL,
  `Value` int DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `MSMEID` (`MSMEID`),
  KEY `CfmForeignKey` (`CFMID`),
  KEY `CfsForeignKey` (`CFSID`),
  KEY `SfmForeignKey` (`SFMID`),
  KEY `SfsForeignKey` (`SFSID`),
  KEY `SwotForeignKey` (`SWOTID`),
  CONSTRAINT `CfmForeignKey` FOREIGN KEY (`CFMID`) REFERENCES `cfmains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CfsForeignKey` FOREIGN KEY (`CFSID`) REFERENCES `cfsubmains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `MsmeForeignKey` FOREIGN KEY (`MSMEID`) REFERENCES `msmes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `SfmForeignKey` FOREIGN KEY (`SFMID`) REFERENCES `sfmains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `SfsForeignKey` FOREIGN KEY (`SFSID`) REFERENCES `sfsubmains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `SwotForeignKey` FOREIGN KEY (`SWOTID`) REFERENCES `swots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessments`
--

LOCK TABLES `assessments` WRITE;
/*!40000 ALTER TABLE `assessments` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cfmains`
--

DROP TABLE IF EXISTS `cfmains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cfmains` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cfmains`
--

LOCK TABLES `cfmains` WRITE;
/*!40000 ALTER TABLE `cfmains` DISABLE KEYS */;
/*!40000 ALTER TABLE `cfmains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cfsubmains`
--

DROP TABLE IF EXISTS `cfsubmains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cfsubmains` (
  `id` int NOT NULL AUTO_INCREMENT,
  `CFMID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CFMID` (`CFMID`),
  CONSTRAINT `cfs_foreign_key` FOREIGN KEY (`CFMID`) REFERENCES `cfmains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cfsubmains`
--

LOCK TABLES `cfsubmains` WRITE;
/*!40000 ALTER TABLE `cfsubmains` DISABLE KEYS */;
/*!40000 ALTER TABLE `cfsubmains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `msmes`
--

DROP TABLE IF EXISTS `msmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `msmes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Province` varchar(50) NOT NULL,
  `IndustryCluster` varchar(255) NOT NULL,
  `BusinessName` varchar(255) NOT NULL,
  `RegistrationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LastLogin` timestamp NULL DEFAULT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `BusinessName_UNIQUE` (`BusinessName`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msmes`
--

LOCK TABLES `msmes` WRITE;
/*!40000 ALTER TABLE `msmes` DISABLE KEYS */;
INSERT INTO `msmes` VALUES (1,'Dan Alfrei','Celestial','Fuerte','dace.phage@gmail.com','09818098637','Iloilo','Construction','ASDASDA','2023-10-19 17:24:46',NULL,'active');
/*!40000 ALTER TABLE `msmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sfmains`
--

DROP TABLE IF EXISTS `sfmains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sfmains` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Rank` int NOT NULL,
  `Weight` double(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sfmains`
--

LOCK TABLES `sfmains` WRITE;
/*!40000 ALTER TABLE `sfmains` DISABLE KEYS */;
/*!40000 ALTER TABLE `sfmains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sfsubmains`
--

DROP TABLE IF EXISTS `sfsubmains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sfsubmains` (
  `id` int NOT NULL AUTO_INCREMENT,
  `SFMID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Rank` int NOT NULL,
  `Weight` double(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `SFMID` (`SFMID`),
  CONSTRAINT `sfs_foreign_key` FOREIGN KEY (`SFMID`) REFERENCES `sfmains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sfsubmains`
--

LOCK TABLES `sfsubmains` WRITE;
/*!40000 ALTER TABLE `sfsubmains` DISABLE KEYS */;
/*!40000 ALTER TABLE `sfsubmains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `swots`
--

DROP TABLE IF EXISTS `swots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `swots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Category` varchar(45) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `swots`
--

LOCK TABLES `swots` WRITE;
/*!40000 ALTER TABLE `swots` DISABLE KEYS */;
/*!40000 ALTER TABLE `swots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('user','admin') DEFAULT 'user',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','$2y$10$Ihujvgfut3OpNtA8N9UmpO4NmkNGSAvbbotNP24WHxzUUKre3KQn.','admin','2023-10-22 16:23:31','2023-10-22 16:23:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-27  9:48:04
