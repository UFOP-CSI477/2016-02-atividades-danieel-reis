-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: provas
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Futebol UFOP',5.00,'2017-03-06 19:00:00','2017-03-06 01:00:03','2017-03-06 01:00:03'),(2,'Vôlei UFOP',5.00,'2017-03-06 22:00:00','2017-03-06 01:00:03','2017-03-06 01:00:03'),(6,'Futsal UFOP',14.90,'2017-02-03 19:00:00','2017-03-14 21:45:42','2017-03-15 00:45:42'),(7,'UFOP x UEMG',5.50,'2017-05-01 15:30:00','2017-03-14 16:35:57','2017-03-14 16:35:57');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('danielmartinsreis@gmail.com','$2y$10$c890K8IvuHjsl/2/ZULUGudUTmgI9TavTexoCbbkvWL7eMw.OgHzW','2017-03-15 02:16:07');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros`
--

DROP TABLE IF EXISTS `registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `evento_id` int(10) NOT NULL,
  `data` datetime NOT NULL,
  `pago` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `evento_id` (`evento_id`),
  CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros`
--

LOCK TABLES `registros` WRITE;
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
INSERT INTO `registros` VALUES (14,2,7,'2017-10-01 19:30:00',0,'2017-03-14 23:56:28','2017-03-14 23:56:28'),(15,2,7,'2017-10-01 19:30:00',0,'2017-03-14 20:56:49','2017-03-14 23:56:49'),(16,4,1,'2017-05-01 15:30:00',0,'2017-03-15 00:20:34','2017-03-15 00:20:34'),(17,4,1,'2017-05-01 15:30:00',0,'2017-03-15 00:22:47','2017-03-15 00:22:47'),(18,2,2,'2017-10-01 22:30:00',0,'2017-03-14 22:58:50','2017-03-15 01:58:50'),(21,1,7,'2017-10-01 22:30:00',0,'2017-03-15 03:48:00','2017-03-15 03:48:00'),(22,1,2,'2017-05-01 15:30:00',0,'2017-03-15 04:07:34','2017-03-15 04:07:34'),(23,1,6,'2017-05-01 15:30:00',0,'2017-03-15 04:07:41','2017-03-15 04:07:41'),(24,1,1,'2017-10-01 19:30:00',0,'2017-03-15 04:07:48','2017-03-15 04:07:48');
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `type` smallint(6) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Daniel','danielmartinsreis@gmail.com','$2y$10$wfaDYMB7Xkj504LhBaQtNOkWOu41RkVDr4YlRB6OexoyY.fXENrLC',1,'KVqOqccccENH7gMpeuM1EMezsjD1nWX6SUheuwAZw5OFp52qCbMm2veSdnrm','2017-03-14 23:00:27','2017-03-07 03:37:58'),(2,'Daniel','danmreis@hotmail.com','$2y$10$dfkVpGz4vZm839/an2zccOI5LA.uhIuxJoFu0ZWnKymrqe4umQfQO',2,'hw9fOnQHkMbwSQ5qNNoCKF19cP3HLebRIsOpXzzLMtL8xrE8bgEY9fDjh5B6','2017-03-14 23:01:28','2017-03-07 04:26:17'),(3,'Otavio','otavio.c966@gmail.com','$2y$10$2cvpkNxmlazofmRufrLvuuWZMBSys9MSEMqD/tsWZVdIWUe1admMS',1,NULL,'2017-03-07 16:48:10','2017-03-07 16:48:10'),(4,'João','joaodoido@gmail.com','$2y$10$tBRz2bhMNuTAu2C3Wok/6O7QAg./U7lCcAeqVNsmeguCvwRIc.km.',1,'0HXqVaYvjAjfGKwgVezmUxD4dzijrf0I9KhOl0uhURJkhmVqLyiHGWKhL2oI','2017-03-14 21:40:27','2017-03-15 00:12:35'),(5,'Gildomar','gildomar@gmail.com','$2y$10$mVr2t5LUwWatx4lIh7k1aeLwl7fkkxgL51z85dOw9BNIV6ERuG8Ja',1,'vVbZd9VoDdAHCwZxSDbiQJMeaHWg6bA3ce02X3lnE6d3Rs1o9w5izFd43OjW','2017-03-14 23:02:19','2017-03-15 02:01:49');
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

-- Dump completed on 2017-03-14 22:13:43
