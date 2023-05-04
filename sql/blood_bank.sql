-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: blood_bank
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `UserName` (`UserName`),
  UNIQUE KEY `EmailAddress` (`EmailAddress`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin','Juan','Dela Cruz','jdcruz@gmail.net');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blood_stocks`
--

DROP TABLE IF EXISTS `blood_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blood_stocks` (
  `stockID` int(11) NOT NULL AUTO_INCREMENT,
  `stockPrefix` varchar(5) NOT NULL DEFAULT 'S',
  `donorID` int(11) NOT NULL,
  `donorPrefix` varchar(5) NOT NULL DEFAULT 'D',
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`stockID`,`stockPrefix`),
  KEY `donorID` (`donorID`),
  KEY `donorID_2` (`donorID`,`donorPrefix`),
  CONSTRAINT `blood_stocks_ibfk_1` FOREIGN KEY (`donorID`) REFERENCES `donor` (`donorID`),
  CONSTRAINT `blood_stocks_ibfk_2` FOREIGN KEY (`donorID`, `donorPrefix`) REFERENCES `donor` (`donorID`, `donorPrefix`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood_stocks`
--

LOCK TABLES `blood_stocks` WRITE;
/*!40000 ALTER TABLE `blood_stocks` DISABLE KEYS */;
INSERT INTO `blood_stocks` VALUES (1,'S',2,'D','2023-04-29 10:14:29'),(2,'S',3,'D','2023-04-29 10:15:13'),(3,'S',10,'D','2023-04-29 10:15:26'),(4,'S',3,'D','2023-05-02 00:41:53');
/*!40000 ALTER TABLE `blood_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `contactID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donor` (
  `donorID` int(11) NOT NULL AUTO_INCREMENT,
  `donorPrefix` varchar(5) NOT NULL DEFAULT 'D',
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `BloodType` varchar(5) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`donorID`,`donorPrefix`),
  UNIQUE KEY `EmailAddress` (`EmailAddress`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor`
--

LOCK TABLES `donor` WRITE;
/*!40000 ALTER TABLE `donor` DISABLE KEYS */;
INSERT INTO `donor` VALUES (1,'D','Gregoor','Mylchreest','Male',20,'B+','+6398714364','gmylchreest0@forbes.com','Barangay 11','2023-04-29 08:19:32'),(2,'D','Adelaida','Aland','Female',31,'AB-','+6390031409','aaland1@meetup.com','Barangay 10','2023-04-29 08:19:38'),(3,'D','Mario','Howsden','Male',28,'A+','+6396903493','mhowsden2@lycos.com','Barangay 11','2023-04-29 08:19:45'),(4,'D','Caryl','Staddom','Female',25,'O+','+6394242757','cstaddom3@blogspot.com','Barangay 1','2023-04-29 08:19:54'),(5,'D','Frasier','Wandrey','Male',38,'AB-','+6392073799','fwandrey4@histats.com','Barangay 3','2023-04-29 08:20:00'),(6,'D','Dennison','Arangy','Male',36,'O+','+6397529088','darangy5@cbc.ca','Barangay 17','2023-04-29 08:20:04'),(7,'D','Moina','Bolan','Female',24,'O+','+6396557355','mbolan6@go.com','Barangay 4','2023-04-29 08:20:10'),(8,'D','Selby','Mecchi','Female',33,'B-','+6393553213','smecchi7@elegantthemes.com','Barangay 10','2023-04-29 08:20:17'),(9,'D','Bel','Blasdale','Female',27,'B-','+6399057341','bblasdale8@multiply.com','Barangay 15','2023-04-29 08:20:22'),(10,'D','Alden','McHale','Male',29,'B-','+6394276447','amchale9@forbes.com','Barangay 4','2023-04-29 08:20:25');
/*!40000 ALTER TABLE `donor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `handed_over`
--

DROP TABLE IF EXISTS `handed_over`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `handed_over` (
  `hoID` int(11) NOT NULL AUTO_INCREMENT,
  `hoPrefix` varchar(5) NOT NULL DEFAULT 'HO',
  `requestID` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`hoID`,`hoPrefix`),
  KEY `requestID` (`requestID`),
  KEY `stockID` (`stockID`),
  CONSTRAINT `handed_over_ibfk_1` FOREIGN KEY (`requestID`) REFERENCES `request` (`requestID`),
  CONSTRAINT `handed_over_ibfk_2` FOREIGN KEY (`stockID`) REFERENCES `blood_stocks` (`stockID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `handed_over`
--

LOCK TABLES `handed_over` WRITE;
/*!40000 ALTER TABLE `handed_over` DISABLE KEYS */;
INSERT INTO `handed_over` VALUES (2,'HO',5,3,'2023-05-02 01:39:45');
/*!40000 ALTER TABLE `handed_over` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ho_success`
--

DROP TABLE IF EXISTS `ho_success`;
/*!50001 DROP VIEW IF EXISTS `ho_success`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `ho_success` AS SELECT
 1 AS `hoID`,
  1 AS `hoPrefix`,
  1 AS `requestID`,
  1 AS `reqPrefix`,
  1 AS `stockID`,
  1 AS `stockPrefix`,
  1 AS `FirstName`,
  1 AS `LastName`,
  1 AS `Date` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `requestID` int(11) NOT NULL AUTO_INCREMENT,
  `reqPrefix` varchar(5) NOT NULL DEFAULT 'R',
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `BloodType` varchar(5) NOT NULL,
  `Physician` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(10) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`requestID`,`reqPrefix`),
  UNIQUE KEY `EmailAddress` (`EmailAddress`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (1,'R','Ethe','MacCroary','emaccroary0@posterou',0,'+6394568164','emaccroary0@nydailynews.com','Barangay 14','B+','Ethe MacCroary','2023-04-28 14:59:05','Pending'),(2,'R','Raine','Aizikovitz','raizikovitz1@cnn.com',0,'+6391083570','raizikovitz1@1und1.de','Barangay 2','AB+','Raine Aizikovitz','2023-04-28 14:59:05','Pending'),(3,'R','Ivory','Chamberlain','ichamberlain2@slashd',0,'+6395990107','ichamberlain2@csmonitor.com','Barangay 7','O+','Ivory Chamberlain','2023-04-28 14:59:05','Pending'),(4,'R','Issi','Richardson','irichardson3@nifty.c',0,'+6396649939','irichardson3@comsenz.com','Barangay 2','A+','Issi Richardson','2023-04-28 14:59:05','Pending'),(5,'R','Jacobo','Allebone','jallebone4@go.com',0,'+6392767740','jallebone4@ucla.edu','Barangay 20','B-','Jacobo Allebone','2023-05-02 01:39:45','Approved'),(6,'R','Haroun','Monahan','hmonahan5@nhs.uk',0,'+6390206005','hmonahan5@cdbaby.com','Barangay 3','A+','Haroun Monahan','2023-04-28 14:59:05','Pending'),(7,'R','Kaila','Gazey','kgazey6@hubpages.com',0,'+6395084490','kgazey6@bigcartel.com','Barangay 15','A-','Kaila Gazey','2023-04-28 14:59:05','Pending'),(8,'R','Garvin','Janatka','gjanatka7@biglobe.ne',0,'+6395531507','gjanatka7@networkadvertising.org','Barangay 2','O+','Garvin Janatka','2023-04-28 14:59:05','Pending'),(9,'R','Davon','Franca','dfranca8@cnbc.com',0,'+6399828204','dfranca8@ycombinator.com','Barangay 20','O+','Davon Franca','2023-04-28 14:59:05','Pending'),(10,'R','Cass','Mainston','cmainston9@scientifi',0,'+6395993795','cmainston9@smh.com.au','Barangay 12','B-','Cass Mainston','2023-04-28 14:59:05','Pending');
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!50001 DROP VIEW IF EXISTS `stocks`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `stocks` AS SELECT
 1 AS `stockID`,
  1 AS `stockPrefix`,
  1 AS `donorID`,
  1 AS `donorPrefix`,
  1 AS `FirstName`,
  1 AS `LastName`,
  1 AS `BloodType`,
  1 AS `Date` */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `ho_success`
--

/*!50001 DROP VIEW IF EXISTS `ho_success`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ho_success` AS select `handed_over`.`hoID` AS `hoID`,`handed_over`.`hoPrefix` AS `hoPrefix`,`request`.`requestID` AS `requestID`,`request`.`reqPrefix` AS `reqPrefix`,`blood_stocks`.`stockID` AS `stockID`,`blood_stocks`.`stockPrefix` AS `stockPrefix`,`request`.`FirstName` AS `FirstName`,`request`.`LastName` AS `LastName`,`handed_over`.`Date` AS `Date` from ((`handed_over` join `request` on(`request`.`requestID` = `handed_over`.`requestID`)) join `blood_stocks` on(`blood_stocks`.`stockID` = `handed_over`.`stockID`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stocks`
--

/*!50001 DROP VIEW IF EXISTS `stocks`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stocks` AS select `blood_stocks`.`stockID` AS `stockID`,`blood_stocks`.`stockPrefix` AS `stockPrefix`,`donor`.`donorID` AS `donorID`,`donor`.`donorPrefix` AS `donorPrefix`,`donor`.`FirstName` AS `FirstName`,`donor`.`LastName` AS `LastName`,`donor`.`BloodType` AS `BloodType`,`blood_stocks`.`Date` AS `Date` from (`donor` join `blood_stocks` on(`donor`.`donorID` = `blood_stocks`.`donorID`)) where !exists(select 1 from `handed_over` where `blood_stocks`.`stockID` = `handed_over`.`stockID` limit 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-03 18:45:05
