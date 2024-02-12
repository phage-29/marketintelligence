-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: marketinteldb
-- ------------------------------------------------------
-- Server version	8.0.35

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

DROP TABLE IF EXISTS `assessments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assessments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `MSMEID` int NOT NULL,
  `AssessmentType` enum('success factors','swot analysis','competitors features') NOT NULL,
  `CFMID` int DEFAULT NULL,
  `CFSID` int DEFAULT NULL,
  `SFMID` int DEFAULT NULL,
  `SFSID` int DEFAULT NULL,
  `SWOTID` int DEFAULT NULL,
  `Value` int DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessments`
--

LOCK TABLES `assessments` WRITE;
/*!40000 ALTER TABLE `assessments` DISABLE KEYS */;
INSERT INTO `assessments` VALUES (1,1,'success factors',NULL,NULL,1,1,NULL,5,'2024-02-01 05:30:35','2024-02-01 05:30:35'),(2,1,'success factors',NULL,NULL,1,2,NULL,5,'2024-02-01 05:30:35','2024-02-01 05:30:35'),(3,1,'success factors',NULL,NULL,1,3,NULL,5,'2024-02-01 05:30:35','2024-02-01 05:30:35'),(4,1,'success factors',NULL,NULL,1,4,NULL,5,'2024-02-01 05:30:36','2024-02-01 05:30:36'),(5,1,'success factors',NULL,NULL,1,5,NULL,5,'2024-02-01 05:30:37','2024-02-01 05:30:37'),(6,1,'success factors',NULL,NULL,1,6,NULL,5,'2024-02-01 05:30:37','2024-02-01 05:30:37'),(7,1,'success factors',NULL,NULL,1,7,NULL,5,'2024-02-01 05:30:38','2024-02-01 05:30:38'),(8,1,'success factors',NULL,NULL,1,8,NULL,5,'2024-02-01 05:30:38','2024-02-01 05:30:38'),(9,1,'success factors',NULL,NULL,1,9,NULL,5,'2024-02-01 05:30:38','2024-02-01 05:30:38'),(10,1,'success factors',NULL,NULL,1,10,NULL,5,'2024-02-01 05:30:39','2024-02-01 05:30:39'),(11,1,'success factors',NULL,NULL,1,11,NULL,5,'2024-02-01 05:30:39','2024-02-01 05:30:39'),(12,1,'success factors',NULL,NULL,1,12,NULL,5,'2024-02-01 05:30:40','2024-02-01 05:30:40'),(13,1,'success factors',NULL,NULL,1,13,NULL,5,'2024-02-01 05:30:43','2024-02-01 05:30:43'),(14,1,'success factors',NULL,NULL,2,14,NULL,5,'2024-02-01 05:30:48','2024-02-01 05:30:48'),(15,1,'success factors',NULL,NULL,3,15,NULL,5,'2024-02-01 05:30:50','2024-02-01 05:30:50'),(16,1,'success factors',NULL,NULL,3,16,NULL,5,'2024-02-01 05:30:50','2024-02-01 05:30:50'),(17,1,'success factors',NULL,NULL,3,17,NULL,5,'2024-02-01 05:30:51','2024-02-01 05:30:51'),(18,1,'success factors',NULL,NULL,3,18,NULL,5,'2024-02-01 05:30:51','2024-02-01 05:30:51'),(19,1,'success factors',NULL,NULL,4,19,NULL,5,'2024-02-01 05:30:55','2024-02-01 05:30:55'),(20,1,'success factors',NULL,NULL,4,20,NULL,5,'2024-02-01 05:30:55','2024-02-01 05:30:55'),(21,1,'success factors',NULL,NULL,4,21,NULL,5,'2024-02-01 05:30:55','2024-02-01 05:30:55'),(22,1,'success factors',NULL,NULL,4,22,NULL,5,'2024-02-01 05:30:56','2024-02-01 05:30:56'),(23,1,'success factors',NULL,NULL,4,23,NULL,5,'2024-02-01 05:30:56','2024-02-01 05:30:56'),(24,1,'success factors',NULL,NULL,5,24,NULL,5,'2024-02-01 05:30:58','2024-02-01 05:30:58'),(25,1,'success factors',NULL,NULL,5,25,NULL,5,'2024-02-01 05:30:59','2024-02-01 05:30:59'),(26,1,'success factors',NULL,NULL,5,26,NULL,5,'2024-02-01 05:31:00','2024-02-01 05:31:00'),(27,1,'success factors',NULL,NULL,5,27,NULL,5,'2024-02-01 05:31:00','2024-02-01 05:31:00'),(28,1,'success factors',NULL,NULL,5,28,NULL,5,'2024-02-01 05:31:01','2024-02-01 05:31:01'),(29,1,'success factors',NULL,NULL,5,29,NULL,5,'2024-02-01 05:31:01','2024-02-01 05:31:01'),(30,1,'success factors',NULL,NULL,5,30,NULL,5,'2024-02-01 05:31:02','2024-02-01 05:31:02'),(31,1,'success factors',NULL,NULL,6,31,NULL,5,'2024-02-01 05:31:04','2024-02-01 05:31:04'),(32,1,'success factors',NULL,NULL,6,32,NULL,5,'2024-02-01 05:31:05','2024-02-01 05:31:05'),(33,1,'success factors',NULL,NULL,6,33,NULL,5,'2024-02-01 05:31:05','2024-02-01 05:31:05'),(34,1,'success factors',NULL,NULL,6,34,NULL,5,'2024-02-01 05:31:06','2024-02-01 05:31:06'),(35,1,'success factors',NULL,NULL,7,35,NULL,5,'2024-02-01 05:31:08','2024-02-01 05:31:08'),(36,1,'success factors',NULL,NULL,7,36,NULL,5,'2024-02-01 05:31:09','2024-02-01 05:31:09'),(37,1,'success factors',NULL,NULL,7,37,NULL,5,'2024-02-01 05:31:09','2024-02-01 05:31:09'),(38,1,'success factors',NULL,NULL,7,38,NULL,5,'2024-02-01 05:31:10','2024-02-01 05:31:10'),(39,1,'success factors',NULL,NULL,7,39,NULL,5,'2024-02-01 05:31:11','2024-02-01 05:31:11'),(40,1,'swot analysis',NULL,NULL,NULL,NULL,1,NULL,'2024-02-01 05:31:13','2024-02-01 05:31:13'),(41,1,'swot analysis',NULL,NULL,NULL,NULL,2,NULL,'2024-02-01 05:31:13','2024-02-01 05:31:13'),(42,1,'swot analysis',NULL,NULL,NULL,NULL,3,NULL,'2024-02-01 05:31:14','2024-02-01 05:31:14'),(43,1,'swot analysis',NULL,NULL,NULL,NULL,25,NULL,'2024-02-01 05:31:15','2024-02-01 05:31:15'),(44,1,'swot analysis',NULL,NULL,NULL,NULL,26,NULL,'2024-02-01 05:31:15','2024-02-01 05:31:15'),(45,1,'swot analysis',NULL,NULL,NULL,NULL,34,NULL,'2024-02-01 05:31:17','2024-02-01 05:31:17'),(46,1,'swot analysis',NULL,NULL,NULL,NULL,49,NULL,'2024-02-01 05:31:18','2024-02-01 05:31:18'),(47,1,'swot analysis',NULL,NULL,NULL,NULL,51,NULL,'2024-02-01 05:31:19','2024-02-01 05:31:19'),(48,1,'swot analysis',NULL,NULL,NULL,NULL,53,NULL,'2024-02-01 05:31:19','2024-02-01 05:31:19'),(49,1,'swot analysis',NULL,NULL,NULL,NULL,55,NULL,'2024-02-01 05:31:20','2024-02-01 05:31:20'),(50,1,'swot analysis',NULL,NULL,NULL,NULL,62,NULL,'2024-02-01 05:31:22','2024-02-01 05:31:22'),(51,1,'swot analysis',NULL,NULL,NULL,NULL,63,NULL,'2024-02-01 05:31:22','2024-02-01 05:31:22'),(52,1,'swot analysis',NULL,NULL,NULL,NULL,64,NULL,'2024-02-01 05:31:23','2024-02-01 05:31:23'),(53,1,'swot analysis',NULL,NULL,NULL,NULL,68,NULL,'2024-02-01 05:31:24','2024-02-01 05:31:24'),(54,1,'competitors features',1,1,NULL,NULL,NULL,NULL,'2024-02-01 05:31:27','2024-02-01 05:31:27'),(55,1,'competitors features',1,2,NULL,NULL,NULL,NULL,'2024-02-01 05:31:27','2024-02-01 05:31:27'),(56,1,'competitors features',1,3,NULL,NULL,NULL,NULL,'2024-02-01 05:31:27','2024-02-01 05:31:27'),(57,1,'competitors features',1,4,NULL,NULL,NULL,NULL,'2024-02-01 05:31:28','2024-02-01 05:31:28'),(58,1,'competitors features',1,8,NULL,NULL,NULL,NULL,'2024-02-01 05:31:29','2024-02-01 05:31:29'),(59,1,'competitors features',1,9,NULL,NULL,NULL,NULL,'2024-02-01 05:31:29','2024-02-01 05:31:29'),(60,1,'competitors features',1,13,NULL,NULL,NULL,NULL,'2024-02-01 05:31:30','2024-02-01 05:31:30'),(61,1,'competitors features',1,14,NULL,NULL,NULL,NULL,'2024-02-01 05:31:30','2024-02-01 05:31:30'),(62,1,'competitors features',1,15,NULL,NULL,NULL,NULL,'2024-02-01 05:31:31','2024-02-01 05:31:31'),(63,1,'competitors features',1,16,NULL,NULL,NULL,NULL,'2024-02-01 05:31:31','2024-02-01 05:31:31'),(64,1,'competitors features',3,22,NULL,NULL,NULL,NULL,'2024-02-01 05:31:33','2024-02-01 05:31:33'),(65,1,'competitors features',3,21,NULL,NULL,NULL,NULL,'2024-02-01 05:31:33','2024-02-01 05:31:33'),(66,1,'competitors features',2,19,NULL,NULL,NULL,NULL,'2024-02-01 05:31:34','2024-02-01 05:31:34'),(67,1,'competitors features',2,18,NULL,NULL,NULL,NULL,'2024-02-01 05:31:34','2024-02-01 05:31:34'),(68,1,'competitors features',2,17,NULL,NULL,NULL,NULL,'2024-02-01 05:31:34','2024-02-01 05:31:34'),(69,1,'competitors features',4,26,NULL,NULL,NULL,NULL,'2024-02-01 05:31:36','2024-02-01 05:31:36'),(70,1,'competitors features',4,25,NULL,NULL,NULL,NULL,'2024-02-01 05:31:36','2024-02-01 05:31:36');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cfmains`
--

LOCK TABLES `cfmains` WRITE;
/*!40000 ALTER TABLE `cfmains` DISABLE KEYS */;
INSERT INTO `cfmains` VALUES (1,'Marketing Strategies','This encompasses the methods and tactics used to promote your business, including digital marketing, social media advertising, and other strategies to increase brand visibility and attract customers.'),(2,'Products and Services','A description of the specific products and services your business offers, highlighting their features, benefits, and unique selling points, as well as any specialized options available.'),(3,'Pricing and Costing','Information about your pricing strategies, cost structure, and any discounts or promotions you utilize to set competitive and profitable pricing for your products or services.'),(4,'Distribution Channels','An overview of how your products or services are made accessible to customers, detailing the distribution channels, partnerships, and methods you use to reach your target audience.');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cfsubmains`
--

LOCK TABLES `cfsubmains` WRITE;
/*!40000 ALTER TABLE `cfsubmains` DISABLE KEYS */;
INSERT INTO `cfsubmains` VALUES (1,1,'Utilize Tiktok Live Selling','Use TikTok for real-time product showcases and sales through live videos.'),(2,1,'Utilize Facebook Page','Create and manage a Facebook Page for brand building and customer engagement.'),(3,1,'Do Facebook Live Selling','Host live sales events on your Facebook Page, interact with viewers, and encourage purchases.'),(4,1,'Post in instagram','Share visually appealing content, including photos, videos, and stories, to promote your brand.'),(5,1,'Sell in marketplace','List products or services on online marketplaces like Amazon and eBay to reach a broader audience.'),(6,1,'Sell in Shopee','Utilize Shopee as an e-commerce platform to expand sales and reach a large customer base.'),(7,1,'Sell in Lazada','Establish a presence on Lazada, a popular e-commerce platform, to increase sales and visibility.'),(8,1,'Sell in Go lokal and other applications','Explore various e-commerce applications to diversify your sales channels and reach different markets.'),(9,1,'Hiring of designer or consultant','Consider hiring a designer or consultant to improve brand aesthetics and strategy.'),(10,1,'Attend marketing training','Participate in marketing training to enhance your knowledge and skills in effective marketing techniques.'),(11,1,'Conduct product photoshoot','Organize a photoshoot to capture high-quality product images for appealing presentations.'),(12,1,'Existence of promotions','Offer special promotions, discounts, and deals to entice customers and create urgency in their purchase decisions.'),(13,1,'Put ads in Facebook','Invest in Facebook advertising to target specific audiences with your marketing campaigns.'),(14,1,'Put ads in Instagram','Utilize Instagram\'s advertising platform to promote your brand and products to a wide user base.'),(15,1,'Put ads in youtube','Create and run video ads on YouTube to showcase your offerings and attract potential customers.'),(16,1,'Utilize websites','Develop and maintain a dedicated website to provide detailed information about your products and services.'),(17,2,'High quality products','Offering products that meet or exceed customer expectations in terms of quality and performance.'),(18,2,'Good and Best review/feedback','Collecting positive reviews and feedback from satisfied customers, which can enhance the reputation of your products or services.'),(19,2,'competitive price','Pricing your products or services competitively to attract price-sensitive customers while maintaining profitability.'),(20,2,'innovations','Continuously introducing new and innovative products or services to stay ahead of the competition.'),(21,3,'Profit','Achieving profitability by managing costs, increasing revenue, and maximizing efficiency.'),(22,3,'Affordable price from suppliers','Sourcing raw materials or products at a cost-effective price from reliable suppliers.'),(23,3,'Good relationship with suppliers','Establishing and maintaining positive relationships with suppliers, which can lead to better terms and collaboration.'),(24,3,'Available raw supplies','Ensuring a consistent and reliable supply of raw materials to support production or service delivery.'),(25,4,'Large Scale Reach','Expanding your business\'s reach to a wide customer base, potentially through multiple locations or distribution channels.'),(26,4,'Loyal customers','Building a base of loyal customers who repeatedly choose your brand, products, or services over the competition.');
/*!40000 ALTER TABLE `cfsubmains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industryclusters`
--

DROP TABLE IF EXISTS `industryclusters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `industryclusters` (
  `id` int NOT NULL,
  `IndustryCluster` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industryclusters`
--

LOCK TABLES `industryclusters` WRITE;
/*!40000 ALTER TABLE `industryclusters` DISABLE KEYS */;
INSERT INTO `industryclusters` VALUES (1,'PFN - Banana'),(2,'PFN - Calamansi'),(3,'PFN - Cashew'),(4,'PFN - Mango'),(5,'PFN - Peanut'),(6,'PFN - Pilinut'),(7,'PFN - Pineapple'),(8,'Wearables and Homestyles'),(9,'Processed Food');
/*!40000 ALTER TABLE `industryclusters` ENABLE KEYS */;
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
  `Age` int DEFAULT NULL,
  `AssetSize` text,
  `EDTLevel` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `BusinessName_UNIQUE` (`BusinessName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msmes`
--

LOCK TABLES `msmes` WRITE;
/*!40000 ALTER TABLE `msmes` DISABLE KEYS */;
INSERT INTO `msmes` VALUES (1,'Dan Alfrei','Celestial','Fuerte','dace.phage@gmail.com','09818098637','Iloilo','Agribusiness','asdasda','2024-02-01 05:30:33',NULL,'active',NULL,NULL,NULL);
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
  `Weight` double(11,5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sfmains`
--

LOCK TABLES `sfmains` WRITE;
/*!40000 ALTER TABLE `sfmains` DISABLE KEYS */;
INSERT INTO `sfmains` VALUES (1,'EC','Entrepreneurial Competency',1,0.22000),(2,'BP','Business plan',2,0.18000),(3,'MLC','Managerial and leadership capacities ',3,0.16000),(4,'ANT','Adoption of New Technologies',4,0.14000),(5,'MC','Marketing Capability ',5,0.12000),(6,'SPS','Standardization of products and services',6,0.10000),(7,'FEE','Favorable External Environment',7,0.80000);
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
  `Weight` double(11,5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sfsubmains`
--

LOCK TABLES `sfsubmains` WRITE;
/*!40000 ALTER TABLE `sfsubmains` DISABLE KEYS */;
INSERT INTO `sfsubmains` VALUES (1,1,'EC1','Self-confidence',1,0.03000),(2,1,'EC2','Goal Setting',2,0.03000),(3,1,'EC3','Persistence',3,0.03000),(4,1,'EC4','Opportunity Seeking / Creativity and Innovation',4,0.02000),(5,1,'EC5','Risk taker',5,0.02000),(6,1,'EC6','Persuasion and Networking (building new relationship and strengthening existing ones)',6,0.02000),(7,1,'EC7','Demand for quality & efficiancy',7,0.02000),(8,1,'EC8','Agility (Persuasive skills, influence in problem solving and resolves issues)',8,0.01000),(9,1,'EC9','Leadership (resolves issues and management skills)',9,0.01000),(10,1,'EC10','Commitment to Work Contract',10,0.01000),(11,1,'EC11','Specialized Entrpreneurial knowledge and expertise',11,0.01000),(12,1,'EC12','Systematic Planning',12,0.00000),(13,1,'EC13','Technological skills',13,0.00000),(14,2,'BP1','Functional Business Plan with regular performance review',1,0.18000),(15,3,'MLC1','established personnel and staff policies, rules and regulations',1,0.06000),(16,3,'MLC2','set direction of the company',2,0.05000),(17,3,'MLC3','Troubleshooting skills/systems',3,0.03000),(18,3,'MLC4','Presence of a CSR Program',4,0.02000),(19,4,'ANT1','Open to accepting idea of new technology',1,0.05000),(20,4,'ANT2','Improve the quality of products',2,0.04000),(21,4,'ANT3','Integrating new technology into system and process',3,0.03000),(22,4,'ANT4','New technologies in place',4,0.02000),(23,4,'ANT5','Reduce communication cost',5,0.01000),(24,5,'MC1','awareness of market trends',1,0.03000),(25,5,'MC2','Put premium on marketing products',2,0.03000),(26,5,'MC3','Employ strategies to capture target market',3,0.02000),(27,5,'MC4','E-commerce / Digitalization',4,0.02000),(28,5,'MC5','Information Seeking',5,0.01000),(29,5,'MC6','Establish proper channel of distribution',6,0.01000),(30,5,'MC7','communication channel',7,0.00000),(31,6,'SPS1','Manual of operations',1,0.04000),(32,6,'SPS2','Services and product quality',2,0.03000),(33,6,'SPS3','Branding',3,0.02000),(34,6,'SPS4','Promotes productivity',4,0.01000),(35,7,'FE1','Available government support and incentives',1,0.03000),(36,7,'FE2','Empowered human capital',2,0.02000),(37,7,'FE3','Government rules & policies',3,0.02000),(38,7,'FE4','Strategic geographical location',4,0.01000),(39,7,'FE5','Satisfied tax systems',5,0.01000);
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `swots`
--

LOCK TABLES `swots` WRITE;
/*!40000 ALTER TABLE `swots` DISABLE KEYS */;
INSERT INTO `swots` VALUES (1,'Strengths','Hardwork and perseverance','The ability to work tirelessly and persistently to achieve business goals.'),(2,'Strengths','Passion and focus for business','Strong dedication and concentration on business objectives.'),(3,'Strengths','Pursue continuous marketing','Consistently engage in marketing efforts to promote products or services.'),(4,'Strengths','Partnership with DTI and other NGAs','Collaborative partnerships with government agencies such as the Department of Trade and Industry (DTI) and other Non-Governmental Organizations (NGAs).'),(5,'Strengths','Dedicated manpower','Committed and dedicated employees or workforce.'),(6,'Strengths','Quality products or services','Providing high-quality products or services to customers.'),(7,'Strengths','Connection with other cooperative members','Building strong connections with members of a cooperative.'),(8,'Strengths','Patronizing one\'s product','Encouraging and promoting one\'s own products or services.'),(9,'Strengths','Proper strategic planning','Effective planning and strategy development for business growth.'),(10,'Strengths','Conduct of monthly meetings and reporting','Regular meetings and reporting for better communication and decision-making.'),(11,'Strengths','Identification of the community\'s need','Recognizing and addressing the needs of the local community.'),(12,'Strengths','Available raw materials','Easy access to necessary raw materials.'),(13,'Strengths','Knowledge of the market','In-depth understanding of the market and its dynamics.'),(14,'Strengths','Empowered human capital','Empowering employees with the skills and knowledge needed.'),(15,'Strengths','Financial literacy','Having a strong understanding of financial matters.'),(16,'Strengths','Collaboration with other stakeholders','Collaborative efforts with various stakeholders for mutual benefit.'),(17,'Strengths','Excellent leadership skills','Strong and effective leadership abilities.'),(18,'Strengths','Clear and well-defined goals and direction','Having clear and defined business goals and direction.'),(19,'Strengths','Customer-focus','Prioritizing the needs and satisfaction of customers.'),(20,'Strengths','Innovative (in general)','Encouraging and implementing innovation in various aspects of the business.'),(21,'Strengths','Value corporate social responsibility','Focusing on corporate social responsibility initiatives.'),(22,'Strengths','With environmental responsibilities','Acknowledging and fulfilling environmental responsibilities.'),(23,'Strengths','Strong community relations','Building strong relationships within the local community.'),(24,'Strengths','Ability to franchise or expand to branches','The potential to franchise or expand the business to multiple locations.'),(25,'Weaknesses','Unsecure food safety','Inadequate measures to ensure food safety.'),(26,'Weaknesses','Unrealistic production plan','Unrealistic planning for production.'),(27,'Weaknesses','Not well accepted by buyers','Products or services not well received by customers.'),(28,'Weaknesses','Delay delivery','Consistent delays in product or service delivery.'),(29,'Weaknesses','Unavailable raw materials in locality','Difficulty in sourcing required materials locally.'),(30,'Weaknesses','No cooperation between members of organized MSME groups','Lack of cooperation among members of organized Micro, Small, and Medium Enterprises (MSME) groups.'),(31,'Weaknesses','Low quality products','Producing low-quality products.'),(32,'Weaknesses','Competitors offer low prices','Competitors offering products at lower prices.'),(33,'Weaknesses','Low supplies of packaging materials','Shortage of packaging materials.'),(34,'Weaknesses','Damaged machine','Equipment or machinery damage affecting production.'),(35,'Weaknesses','Weather condition','Vulnerability to weather-related disruptions.'),(36,'Weaknesses','Unfair trade or competition','Facing unfair competition in the market.'),(37,'Weaknesses','High level of competition','Dealing with intense competition.'),(38,'Weaknesses','High price of inputs','High costs of acquiring essential inputs.'),(39,'Weaknesses','Limited number of suppliers','A limited choice of suppliers.'),(40,'Weaknesses','High labor cost','High costs associated with labor.'),(41,'Weaknesses','High cost of acquiring technology','Expensive technology adoption.'),(42,'Weaknesses','Insufficient Capacity building','Lack of opportunities for skill development and training.'),(43,'Weaknesses','Lack of manpower complement','Inadequate human resources.'),(44,'Weaknesses','Unpredictable behavioral pattern of exporters','Uncertainty in the behavior of exporters.'),(45,'Weaknesses','Overwhelming requirements for exporters (Legal and Regulatory)','Experiencing overwhelming legal and regulatory requirements.'),(46,'Weaknesses','High cost in participating in international trade','Costly involvement in international trade.'),(47,'Weaknesses','Lack of infrastructure facilities','Insufficient infrastructure support.'),(48,'Weaknesses','Others (please specify)','Additional weaknesses specific to the business.'),(49,'Opportunities','Able to export','Opportunity to expand to international markets.'),(50,'Opportunities','Support by NGAs (financial trainings)','Government support and financial training.'),(51,'Opportunities','Adoption of latest technology (machine equipment)','Incorporating advanced technology and machinery.'),(52,'Opportunities','Acquire exposure to innovative practices','Gaining exposure to innovative industry practices.'),(53,'Opportunities','Collaborate with partners','Collaborative opportunities with business partners.'),(54,'Opportunities','Acquire investors','Attracting potential investors.'),(55,'Opportunities','Able to pitch products and services','Ability to present and promote products and services.'),(56,'Opportunities','Advertise products to a wider range of potential buyers','Expanding marketing reach.'),(57,'Opportunities','Gain international training related to products or services offered','Access to international training opportunities.'),(58,'Opportunities','Develop online marketing strategies','Exploring online marketing strategies.'),(59,'Opportunities','Media coverage or PR for your company','Public relations and media coverage.'),(60,'Opportunities','Learn risk management','Acquiring skills in risk management.'),(61,'Opportunities','Others','Additional opportunities unique to the business.'),(62,'Threats','More competitors in the type of business','Increasing competition in the same industry.'),(63,'Threats','Advance technologies acquired by competitors','Competitors adopting advanced technologies.'),(64,'Threats','Loyalty of customers','Customer loyalty and retention challenges.'),(65,'Threats','Low economic condition','Economic downturn or instability.'),(66,'Threats','Negative feedback from customers','Receiving negative feedback from customers.'),(67,'Threats','Unavailability of raw materials','Difficulty in sourcing necessary raw materials.'),(68,'Threats','High taxes or unfavorable business environment','Dealing with high taxes or unfavorable business conditions.'),(69,'Threats','Weak access to finance','Limited access to financial resources.'),(70,'Threats','Increase in price inputs','Rising input costs.');
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

-- Dump completed on 2024-02-12  8:35:58
