-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: attendance_system
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` bigint NOT NULL,
  `gender` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'rahul','burahul@gmail.com',9876543456,'male','active','a9b1f53eaab3338b73bb2394c3d6096d'),(2,'alex','bualex@gmail.com',9345672341,'male','inactive','2ee9fad455d0206654c4e7c913f9e6d1');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `class_id` int NOT NULL,
  `status` varchar(45) NOT NULL,
  `attendance_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,6,3,'present','2022-11-01'),(2,7,3,'present','2022-11-01'),(3,7,3,'present','2022-12-06'),(4,7,3,'present','2022-11-02'),(5,7,3,'absent','2022-11-03'),(6,7,3,'late','2022-11-04'),(7,7,3,'absent','2022-11-05'),(8,7,3,'absent','2022-11-08'),(9,7,3,'half_day','2022-11-09'),(10,7,3,'half_day','2022-11-10'),(11,7,3,'present','2022-11-11'),(12,7,3,'present','2022-11-12'),(13,7,3,'present','2022-11-13'),(14,7,3,'present','2022-11-14'),(15,7,3,'present','2022-11-15'),(16,7,3,'present','2022-11-16'),(17,7,3,'present','2022-11-17'),(18,7,3,'present','2022-11-18'),(19,7,3,'present','2022-11-21'),(20,7,3,'present','2022-11-22'),(21,7,3,'present','2022-11-23'),(22,7,3,'present','2022-11-24'),(23,6,3,'present','2022-11-01'),(24,6,3,'present','2022-11-02'),(25,6,3,'present','2022-11-03'),(26,6,3,'present','2022-11-04'),(27,6,3,'present','2022-11-07'),(28,6,3,'late','2022-11-08'),(29,6,3,'half_day','2022-11-09'),(30,6,3,'absent','2022-11-10'),(31,6,3,'absent','2022-11-11'),(32,6,3,'half_day','2022-11-14'),(33,6,3,'half_day','2022-11-15'),(34,6,3,'present','2022-11-16'),(35,6,3,'absent','2022-11-16'),(36,6,3,'half_day','2022-11-17'),(37,6,3,'present','2022-11-18'),(38,6,3,'absent','2022-11-21'),(39,1,3,'absent','2022-11-02'),(40,1,3,'absent','2022-11-03'),(41,1,3,'present','2022-11-03'),(42,1,3,'present','2022-11-07'),(43,1,3,'present','2022-11-08'),(44,1,3,'present','2022-11-09'),(45,1,3,'present','2022-11-10'),(46,1,3,'absent','2022-11-10'),(47,1,3,'late','2022-11-11'),(48,1,3,'late','2022-11-14'),(49,1,3,'absent','2022-11-15'),(50,1,3,'half_day','2022-11-16'),(51,1,3,'half_day','2022-11-18'),(52,1,3,'present','2022-11-17'),(53,1,3,'absent','2022-11-21'),(54,13,2,'present','2022-11-01'),(55,13,2,'present','2022-11-02'),(56,13,2,'present','2022-11-03'),(57,13,2,'present','2022-11-04'),(58,13,2,'absent','2022-11-07'),(59,13,2,'absent','2022-11-10'),(60,13,2,'late','2022-11-08'),(61,13,2,'half_day','2022-11-09'),(62,13,2,'present','2022-11-11'),(63,13,2,'present','2022-11-14'),(64,13,2,'present','2022-11-15'),(65,13,2,'late','2022-11-16'),(66,13,2,'absent','2022-11-17'),(67,13,2,'absent','2022-11-18'),(68,13,2,'present','2022-11-21'),(69,6,3,'late','2022-11-22');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`,`teacher_id`),
  KEY `teacher_id_idx` (`teacher_id`),
  CONSTRAINT `teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (2,'2nd-MCA-Batch-2',1),(3,'2nd-MCA-Batch-1',2),(4,'MSc (cyber)',1),(5,'MSc (Data Analytics)',2);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(45) NOT NULL,
  `mobile` bigint NOT NULL,
  `class_id` int NOT NULL,
  PRIMARY KEY (`id`,`class_id`),
  KEY `class_id_idx` (`class_id`),
  CONSTRAINT `class_id` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'21csea29','Senthikumar S','2001-06-14','male',9360310064,3),(3,'21csea07','Bhuvaneswaran A','2000-11-22','male',9566987574,3),(4,'21csea08','Dhanushiga K','2001-08-29','female',9489218586,3),(5,'21csea19','Muralidharan S','2001-01-13','male',6379384723,3),(6,'21csea18','Manumitha A','2000-06-08','female',6385050390,3),(7,'21csea16','Madhumitha A','2000-06-08','female',7338997766,3),(8,'21csea37','Yugasudhan D','2000-08-10','male',6379868207,3),(9,'21csea35','vishwanath','2001-03-02','male',6385213119,3),(10,'21csea15',' Kirthisri B','2000-12-01','female',8056511323,3),(11,'21csea84','Romas Tony P','2001-05-16','male',7639549436,2),(12,'21csea86','SHANMUGAVEL M','2001-06-06','male',9345657066,2),(13,'21csea78','Narpavi M','2001-01-02','female',8675988889,2),(14,'21csea53','Asif N','2001-04-12','male',6381412345,2),(15,'21csea56','Devadharshini N','2000-08-07','female',9486212345,2),(16,'21csea73','Madhumitha K','2000-10-23','female',9025712345,2),(17,'21csda01','Mani K','2000-10-23','male',9876785434,5),(18,'21csda02','Resham M','2001-10-23','female',6456785434,5),(19,'21csda03','Saran S','2001-04-11','male',6455675434,5),(20,'21csda04','Siva D','1999-04-11','male',9876875434,5),(21,'21csda05','Fashmin D','2001-04-06','female',6976875434,5),(22,'21cscb01','Yaseer D','2001-04-06','male',6976875434,4),(23,'21cscb02','Abdulla A','2000-04-06','male',6989875434,4),(24,'21cscb03','Poul Raj A','2000-03-07','male',9889875434,4),(25,'21cscb04','pavithira A','2001-03-07','female',9876567841,4),(26,'21cscb05','Ragavi A','2001-02-01','female',9378417823,4);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` bigint NOT NULL,
  `gender` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'karthick','karthick@gmail.com',9345672341,'male','inactive','0ea03c27f69fb8f9ce7bd06ada94f5d9'),(2,'reshma','reshma@gmail.com',6879567845,'female','active','fbe02c658daa4a4e055c82801bdad1b5');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-06  1:25:48
