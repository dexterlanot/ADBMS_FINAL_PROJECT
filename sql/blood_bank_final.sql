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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood_stocks`
--

LOCK TABLES `blood_stocks` WRITE;
/*!40000 ALTER TABLE `blood_stocks` DISABLE KEYS */;
INSERT INTO `blood_stocks` VALUES (1,'S',1,'D','2023-05-14 11:08:09'),(2,'S',9,'D','2023-05-14 11:08:12'),(3,'S',6,'D','2023-05-14 11:08:30'),(4,'S',2,'D','2023-05-14 11:08:39'),(5,'S',1,'D','2023-05-15 12:15:23'),(6,'S',11,'D','2023-05-15 12:22:16'),(7,'S',11,'D','2023-05-15 12:42:40'),(8,'S',9,'D','2023-05-15 12:42:43'),(9,'S',6,'D','2023-05-15 12:42:45'),(10,'S',3,'D','2023-05-16 21:54:32');
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
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'John Dexter Rubion Lanot','+6399548943','jdlanot.2003@gmail.com','Hello,\n\nI hope this message finds you well. I am reaching out because I am in need of blood.','2023-05-16 22:14:51');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor`
--

LOCK TABLES `donor` WRITE;
/*!40000 ALTER TABLE `donor` DISABLE KEYS */;
INSERT INTO `donor` VALUES (1,'D','Charleen','Jesse','Male',38,'AB+','+63-976-090','cjesse0@vkontakte.ru','Banaba Silangan','2023-05-15 12:15:52'),(2,'D','Joel','Broinlich','Male',47,'A+','+63-965-426','jbroinlich1@marketwatch.com','Pallocan Silangan','2023-05-14 10:53:59'),(3,'D','Sholom','Foulis','Male',31,'O+','+63-935-217','sfoulis2@webnode.com','San Jose Sico','2023-05-14 11:09:32'),(4,'D','Edithe','Oxborrow','Female',34,'AB+','+63-947-834','eoxborrow3@mit.edu','San Agustin','2023-05-14 10:53:59'),(5,'D','Judd','Zottoli','Male',42,'B+','+63-950-678','jzottoli4@drupal.org','San Carlos','2023-05-14 10:53:59'),(6,'D','Kaine','Howick','Male',40,'AB+','+63-991-624','khowick5@free.fr','San Agustin','2023-05-14 10:53:59'),(7,'D','Isidora','Bettanay','Female',39,'B+','+63-967-731','ibettanay6@vimeo.com','San Agustin','2023-05-14 10:53:59'),(8,'D','Debby','Clunan','Female',30,'B+','+63-941-134','dclunan7@mozilla.org','Santa Clara','2023-05-14 10:53:59'),(9,'D','Dina','Medcraft','Female',37,'B-','+63-963-424','dmedcraft8@biblegateway.com','Pallocan Silangan','2023-05-14 10:54:00'),(11,'D','John Dexter','Lanot','Male',20,'A+','+6399548943','lanotjd678@gmail.com','Brgy. Cuta, Batangas City','2023-05-15 12:22:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `handed_over`
--

LOCK TABLES `handed_over` WRITE;
/*!40000 ALTER TABLE `handed_over` DISABLE KEYS */;
INSERT INTO `handed_over` VALUES (1,'HO',3,2,'2023-05-14 11:08:19'),(2,'HO',10,1,'2023-05-14 11:08:21'),(3,'HO',6,4,'2023-05-15 12:18:51'),(4,'HO',2,6,'2023-05-15 12:23:15');
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
INSERT INTO `request` VALUES (1,'R','Meggi','Willows','Female',25,'+63-910-275','mwillows0@imageshack.us','San Andres','O+','Dr. Clw Lum','2023-05-15 12:19:32','Declined'),(2,'R','Pepi','Amthor','Female',36,'+63-971-704','Dr. Rgj Wcp','Banaba Kanluran','A+','pamthor1@sbwire.com','2023-05-15 12:23:15','Approved'),(3,'R','Godfry','Audry','Male',24,'+63-900-886','gaudry2@ebay.com','Banaba Kanluran','B-','Dr. Qwb Hli','2023-05-14 11:08:19','Approved'),(4,'R','Rachael','Jagielski','Female',27,'+63-976-905','rjagielski3@parallels.com','Banaba Center','O+','Dr. Kwu The','2023-05-14 11:00:21','Pending'),(5,'R','Kaspar','Wolfit','Male',29,'+63-981-390','kwolfit4@diigo.com','San Andres','AB-','Dr. Bbh Buv','2023-05-14 11:00:21','Pending'),(6,'R','Barri','Borrell','Male',30,'+63-945-392','bborrell5@goo.ne.jp','San Carlos','A+','Dr. Zcv Adn','2023-05-15 12:18:51','Approved'),(7,'R','Armstrong','Soldner','Male',31,'+63-972-750','asoldner6@desdev.cn','Concepcion','B+','Dr. Aem Qmx','2023-05-14 11:00:21','Pending'),(8,'R','Irwin','Valett','Male',28,'+63-959-106','ivalett7@nbcnews.com','Santo Niño','O+','Dr. Mpm Hkb','2023-05-14 11:00:21','Pending'),(9,'R','Karia','Cancelier','Female',23,'+63-951-299','kcancelier8@abc.net.au','Kumintang Ibaba','O-','Dr. Qyk Lsf','2023-05-14 11:00:22','Pending'),(10,'R','Trix','Corner','Female',29,'+63-900-685','tcorner9@unblog.fr','Pinamucan Proper','AB+','Dr. Dwv Jju','2023-05-14 11:08:21','Approved');
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

-- Dump completed on 2023-05-17  6:17:56
