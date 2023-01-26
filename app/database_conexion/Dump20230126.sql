CREATE DATABASE  IF NOT EXISTS `db_cyc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_cyc`;
-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: db_cyc
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
-- Table structure for table `tb_files_teacher`
--

DROP TABLE IF EXISTS `tb_files_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_files_teacher` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `tb_files_teacher_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `tb_user_teacher` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_files_teacher`
--

LOCK TABLES `tb_files_teacher` WRITE;
/*!40000 ALTER TABLE `tb_files_teacher` DISABLE KEYS */;
INSERT INTO `tb_files_teacher` VALUES (1,7,'Cartão de vacina','../../public/teacher_files/63d033ea8a479.pdf');
/*!40000 ALTER TABLE `tb_files_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_messages`
--

DROP TABLE IF EXISTS `tb_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_messages` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `issuer_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`),
  KEY `issuer_id` (`issuer_id`),
  KEY `receiver_id` (`receiver_id`),
  CONSTRAINT `tb_messages_ibfk_1` FOREIGN KEY (`issuer_id`) REFERENCES `tb_user_student` (`student_id`),
  CONSTRAINT `tb_messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `tb_user_teacher` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_messages`
--

LOCK TABLES `tb_messages` WRITE;
/*!40000 ALTER TABLE `tb_messages` DISABLE KEYS */;
INSERT INTO `tb_messages` VALUES (4,20,9,'Bom dia, Prof. Bruno Salvador! Qual sua disponibilidade para mentorias?','2023-01-18 11:59:23'),(6,20,9,'Bom dia, Daniela! Tenho disponibilidade nas terças e quintas-feiras às 16h.','2023-01-18 12:23:31'),(7,20,9,'Tudo bem. Esses dias e horários estão ótimos.','2023-01-18 12:26:40'),(8,20,10,'Olá, Sra. Yang Shein! Gostaria de saber sua disponibilidade para mentorias.','2023-01-18 14:24:52'),(9,20,13,'Boa tarde, Sra. Luiza Dolgikh! Qual sua disponibilidade para mentorias?','2023-01-18 14:26:34'),(10,20,14,'Boa tarde, Sra. Maria João! Qual sua disponibilidade para mentorias?','2023-01-18 14:30:59'),(11,20,13,'Então, Daniela! Obrigada pelo contato. Posso tentar nas segundas e quartas às 17h.','2023-01-18 14:43:05'),(12,20,14,'Olá Daniela! Tenho disponibilidade às quartas e quintas. Veja o melhor horário.','2023-01-18 14:50:15');
/*!40000 ALTER TABLE `tb_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_my_favorites`
--

DROP TABLE IF EXISTS `tb_my_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_my_favorites` (
  `favorite_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`favorite_id`),
  KEY `student_id` (`student_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `tb_my_favorites_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tb_user_student` (`student_id`),
  CONSTRAINT `tb_my_favorites_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `tb_user_teacher` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_my_favorites`
--

LOCK TABLES `tb_my_favorites` WRITE;
/*!40000 ALTER TABLE `tb_my_favorites` DISABLE KEYS */;
INSERT INTO `tb_my_favorites` VALUES (1,20,9),(2,20,11),(3,20,11),(4,21,11),(5,20,9),(6,20,7);
/*!40000 ALTER TABLE `tb_my_favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user_student`
--

DROP TABLE IF EXISTS `tb_user_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_user_student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user_student`
--

LOCK TABLES `tb_user_student` WRITE;
/*!40000 ALTER TABLE `tb_user_student` DISABLE KEYS */;
INSERT INTO `tb_user_student` VALUES (20,'Daniela','Xavier','Aveiro','123456','../../public/img/profile_photos/63a9b2faf2ed4.jpg','daniela.xavier@gmail.com',22,'2022-12-26 11:43:06'),(21,'Daniel','Xavier','Vila Nova de Gaia','789456','../../public/img/profile_photos/63a9b413402aa.jpg','daniel.xavier@gmail.com',25,'2022-12-26 11:47:47');
/*!40000 ALTER TABLE `tb_user_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user_teacher`
--

DROP TABLE IF EXISTS `tb_user_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_user_teacher` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mentor` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user_teacher`
--

LOCK TABLES `tb_user_teacher` WRITE;
/*!40000 ALTER TABLE `tb_user_teacher` DISABLE KEYS */;
INSERT INTO `tb_user_teacher` VALUES (7,'Jorge','Silva','Culinária','Porto','12345','../../public/img/profile_photos/63a9b0f76925e.jpg','2022-12-26 11:34:31','jorge.silva@gmail.com',NULL),(8,'André','Piacquadio','Física','Porto','654321','../../public/img/profile_photos/63a9b1a6c929b.jpg','2022-12-26 11:37:26','andre.piac@hotmail.com',NULL),(9,'Bruno','Salvador','Fotografia','Porto','987654','../../public/img/profile_photos/63a9b20bb2162.jpg','2022-12-26 11:39:07','bruno.salvador@gmail.com',NULL),(10,'Yang','Shein','Mandarin','Lisboa','456789','../../public/img/profile_photos/63a9b24baa488.jpg','2022-12-26 11:40:11','yang.shein@gmail.com',NULL),(11,'Nathan','Cowley','Montanhismo','Lisboa','987654','../../public/img/profile_photos/63a9b2bf33a17.jpg','2022-12-26 11:42:07','nathan.cowley@gmail.com',NULL),(12,'Margarida','Piacquadio','Fotografia','Coimbra','987654','../../public/img/profile_photos/63a9f510a6090.jpg','2022-12-26 16:25:04','margarida.piac@gmail.com',NULL),(13,'Luiza','Dolgikh','Fotografia','Braga','321654','../../public/img/profile_photos/63a9f5504bc94.jpg','2022-12-26 16:26:08','luiza.dolgikh@gmail.com',NULL),(14,'Maria','João','Mandarin','Coimbra','465132','../../public/img/profile_photos/63a9f610be567.jpg','2022-12-26 16:29:20','maria.joao@gmail.com',NULL);
/*!40000 ALTER TABLE `tb_user_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_cyc'
--

--
-- Dumping routines for database 'db_cyc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-26 15:40:59
