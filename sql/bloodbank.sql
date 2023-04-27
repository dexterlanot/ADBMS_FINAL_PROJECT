-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: BLOOD_BANK
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
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
  `bloodID` int(11) NOT NULL,
  `donorID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`stockID`,`stockPrefix`),
  KEY `donorID` (`donorID`),
  CONSTRAINT `blood_stocks_ibfk_1` FOREIGN KEY (`donorID`) REFERENCES `donor_list` (`donorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood_stocks`
--

LOCK TABLES `blood_stocks` WRITE;
/*!40000 ALTER TABLE `blood_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `blood_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donor_list`
--

DROP TABLE IF EXISTS `donor_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donor_list` (
  `donorID` int(11) NOT NULL AUTO_INCREMENT,
  `donorPrefix` varchar(5) NOT NULL DEFAULT 'D',
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`donorID`,`donorPrefix`),
  UNIQUE KEY `EmailAddress` (`EmailAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor_list`
--

LOCK TABLES `donor_list` WRITE;
/*!40000 ALTER TABLE `donor_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `donor_list` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `handed_over`
--

LOCK TABLES `handed_over` WRITE;
/*!40000 ALTER TABLE `handed_over` DISABLE KEYS */;
/*!40000 ALTER TABLE `handed_over` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`requestID`,`reqPrefix`),
  UNIQUE KEY `EmailAddress` (`EmailAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-24 10:36:58
