-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: southbro_db
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `facility_id` int(11) NOT NULL,
  `facility_location_idlocation` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `pet_user_entity_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `employee_id` int(8) NOT NULL,
  `employee_entity_id` int(8) NOT NULL,
  PRIMARY KEY (`facility_id`,`facility_location_idlocation`,`pet_id`,`pet_user_entity_id`,`employee_id`,`employee_entity_id`),
  KEY `fk_appointment_pet1_idx` (`pet_id`,`pet_user_entity_id`),
  KEY `fk_appointment_employee1_idx` (`employee_id`,`employee_entity_id`),
  CONSTRAINT `fk_appointment_employee1` FOREIGN KEY (`employee_id`, `employee_entity_id`) REFERENCES `employee` (`id`, `entity_id`),
  CONSTRAINT `fk_appointment_facility1` FOREIGN KEY (`facility_id`, `facility_location_idlocation`) REFERENCES `facility` (`id`, `location_idlocation`),
  CONSTRAINT `fk_appointment_pet1` FOREIGN KEY (`pet_id`, `pet_user_entity_id`) REFERENCES `pet` (`id`, `user_entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug`
--

DROP TABLE IF EXISTS `drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8_esperanto_ci DEFAULT '',
  `instruction` varchar(255) COLLATE utf8_esperanto_ci DEFAULT '',
  `stock_date` datetime DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT '0',
  `last_stock_quantity` int(11) DEFAULT '0',
  `pet_id` int(11) NOT NULL,
  `pet_user_entity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_drug_pet1_idx` (`pet_id`,`pet_user_entity_id`),
  CONSTRAINT `fk_drug_pet1` FOREIGN KEY (`pet_id`, `pet_user_entity_id`) REFERENCES `pet` (`id`, `user_entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug`
--

LOCK TABLES `drug` WRITE;
/*!40000 ALTER TABLE `drug` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `entity_id` int(8) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_veterinarian` tinyint(1) NOT NULL DEFAULT '1',
  `is_staff` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`entity_id`),
  KEY `fk_employee_entity1_idx` (`entity_id`),
  CONSTRAINT `fk_employee_entity1` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12345679 DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (12345678,1,1,1,0);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_has_facility`
--

DROP TABLE IF EXISTS `employee_has_facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_has_facility` (
  `employee_id` int(8) NOT NULL,
  `employee_entity_id` int(8) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `facility_location_idlocation` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`,`employee_entity_id`,`facility_id`,`facility_location_idlocation`),
  KEY `fk_employee_has_facility_facility1_idx` (`facility_id`,`facility_location_idlocation`),
  KEY `fk_employee_has_facility_employee1_idx` (`employee_id`,`employee_entity_id`),
  CONSTRAINT `fk_employee_has_facility_employee1` FOREIGN KEY (`employee_id`, `employee_entity_id`) REFERENCES `employee` (`id`, `entity_id`),
  CONSTRAINT `fk_employee_has_facility_facility1` FOREIGN KEY (`facility_id`, `facility_location_idlocation`) REFERENCES `facility` (`id`, `location_idlocation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_has_facility`
--

LOCK TABLES `employee_has_facility` WRITE;
/*!40000 ALTER TABLE `employee_has_facility` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_has_facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity`
--

DROP TABLE IF EXISTS `entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `middle_name` varchar(255) COLLATE utf8_esperanto_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `email` varchar(320) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `hash` varchar(64) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `salt` varchar(32) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity`
--

LOCK TABLES `entity` WRITE;
/*!40000 ALTER TABLE `entity` DISABLE KEYS */;
INSERT INTO `entity` VALUES (1,'Alix','F.','Leon','alixlm19@hotmail.com','xgC5ZqGgzx9a92dTxHjrzdzsyJYvl1N0lKoaD4pwz8Q','bzl5UVo2cC5BLnZJVXc1Tg');
/*!40000 ALTER TABLE `entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `location_idlocation` int(11) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`location_idlocation`),
  KEY `fk_facility_location1_idx` (`location_idlocation`),
  CONSTRAINT `fk_facility_location1` FOREIGN KEY (`location_idlocation`) REFERENCES `location` (`idlocation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `idlocation` int(11) NOT NULL,
  `address_1` varchar(255) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `address_2` varchar(255) COLLATE utf8_esperanto_ci DEFAULT '',
  `city` varchar(255) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `zip_code` varchar(9) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `state` varchar(255) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`idlocation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pet`
--

DROP TABLE IF EXISTS `pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pet` (
  `id` int(11) NOT NULL DEFAULT '-1',
  `name` varchar(255) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `sex` varchar(1) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `type` varchar(45) COLLATE utf8_esperanto_ci NOT NULL DEFAULT '',
  `notes` varchar(255) COLLATE utf8_esperanto_ci DEFAULT '',
  `user_entity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_entity_id`),
  KEY `fk_pet_user1_idx` (`user_entity_id`),
  CONSTRAINT `fk_pet_user1` FOREIGN KEY (`user_entity_id`) REFERENCES `user` (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pet`
--

LOCK TABLES `pet` WRITE;
/*!40000 ALTER TABLE `pet` DISABLE KEYS */;
/*!40000 ALTER TABLE `pet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `entity_id` int(11) NOT NULL,
  `missed_appointment` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`entity_id`),
  CONSTRAINT `fk_user_entity` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-04 20:29:15
