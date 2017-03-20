-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: petshop
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
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_produto` int(10) NOT NULL,
  `quantidade` smallint(6) NOT NULL,
  `data` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,1,1,1,'2017-01-01 13:00:00','2017-03-16 23:15:22','2017-03-16 23:15:22'),(2,1,1,1,'2017-03-16 17:18:00','2017-03-16 23:18:38','2017-03-16 23:18:38'),(3,1,2,1,'2017-03-16 17:28:00','2017-03-16 23:29:08','2017-03-16 23:29:08'),(4,1,1,1,'2017-03-16 17:29:00','2017-03-16 23:29:45','2017-03-16 23:29:45'),(5,1,1,3,'2017-03-16 17:29:00','2017-03-16 23:29:50','2017-03-16 23:29:50'),(6,1,1,6,'2017-03-16 17:33:00','2017-03-16 23:34:02','2017-03-16 23:34:02'),(7,1,1,3,'2017-03-16 17:55:00','2017-03-16 23:55:50','2017-03-16 23:55:50'),(8,5,1,10,'2017-03-16 17:56:00','2017-03-16 23:57:00','2017-03-16 23:57:00'),(9,5,2,3,'2017-03-16 17:57:00','2017-03-16 23:57:13','2017-03-16 23:57:13'),(10,5,3,7,'2017-03-16 17:57:00','2017-03-16 23:57:27','2017-03-16 23:57:27'),(11,2,1,1,'2017-03-16 18:01:00','2017-03-17 00:01:10','2017-03-17 00:01:10'),(12,2,1,4,'2017-03-16 18:21:00','2017-03-17 00:21:21','2017-03-17 00:21:21'),(13,2,1,1,'2017-03-16 18:22:00','2017-03-17 00:22:25','2017-03-17 00:22:25'),(14,2,1,1,'2017-03-16 18:58:00','2017-03-17 00:58:23','2017-03-17 00:58:23'),(15,2,1,3,'2017-03-18 12:00:00','2017-03-18 18:00:18','2017-03-18 18:00:18'),(16,2,1,10,'2017-03-18 12:28:00','2017-03-18 18:28:36','2017-03-18 18:28:36'),(17,2,1,20,'2017-03-18 12:29:00','2017-03-18 18:29:09','2017-03-18 18:29:09'),(18,2,1,1,'2017-03-18 15:51:00','2017-03-18 21:51:18','2017-03-18 21:51:18'),(19,2,1,5,'2017-03-18 15:52:00','2017-03-18 21:52:16','2017-03-18 21:52:16'),(20,2,1,1,'2017-03-18 15:57:00','2017-03-18 21:57:29','2017-03-18 21:57:29');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_02_21_203032_create_produtos_table',1),(4,'2017_02_21_203034_create_compras_table',1),(5,'2017_03_18_191443_create_sessions_table',1);
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
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Chocovinhos para Cães 2 und',5.50,'img/img1.png','2017-03-16 23:48:01','2017-03-17 02:48:01'),(2,'Dog Licious - Hálito e Tártaro 65g',4.50,'img/img2.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(3,'Carrinho para Cães Globetrotter',562.38,'img/img3.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(4,'Gaiola p/ Hamster Circus Fun',229.90,'img/img4.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(5,'Ração Premium Cat Filhote',32.99,'img/img5.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(6,'Ração Frost Cat Natural',26.90,'img/img6.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(7,'Ração Golden Formula Filhotes Frango',115.90,'img/img7.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(8,'Ração Pro Plan Cat Adult Frango Arroz',18.90,'img/img8.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(9,'Ração Maltês 27 Junior 1kg',49.99,'img/img9.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(10,'Ração Revena Adultos Raças Médias e Grandes',18.40,'img/img10.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(11,'Ração Golden Gatos Adultos Carne',14.31,'img/img11.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(12,'Ração Biscrock MarroBone',7.90,'img/img12.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(13,'Ração Royal Canin Giant Adult 15kg',199.99,'img/img13.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(14,'Ração Champ Carne e Cereal',9.89,'img/img14.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(15,'Ração Fórmula Natural Adultos Portes Mini',20.90,'img/img15.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(16,'Ração Pedigree Vital Pro Raças Pequenas',14.31,'img/img16.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(17,'Ração Feline Kitten Sterilised 400g',24.99,'img/img17.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(18,'Ração Magnus Cat Filhote Mix de Sabores',158.86,'img/img18.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(19,'Ração Schnauzer Miniatura Adulto 25',126.90,'img/img19.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(20,'Ração Maltês Adult 24 1kg',45.99,'img/img20.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(21,'Nutrepack Suplemento Mineral 120 capsulas',51.41,'img/img21.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(22,'Ração Alpo Rec. Caseiras Carne & Vegetais',99.90,'img/img22.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(23,'Ração Frost Technical',179.90,'img/img23.png','2017-02-25 20:41:06','2017-02-22 01:36:10'),(24,'Ração Royal Canin Mini Indoor Junior',47.99,'img/img24.png','2017-02-25 20:41:06','2017-02-22 01:36:10');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,'Daniel','danielmartinsreis@gmail.com','$2y$10$6yykUtuqBVV5ilEp2C3hj.8UQ5oin8H80cHRNQxacGMPfqS6.x0Ba',1,'xOsz6sbd2ifeY9ANen04LNwqzLclELTQNAMuVrtJ3CNAHvvw4hDdo9RiIWV8','2017-03-19 03:31:28','2017-03-07 02:27:09'),(2,'Daniel','danmreis@hotmail.com','$2y$10$KDqM0tSbE/z0W2Z7KAB37OlyagxZnvzZF.TFil7z.L2ziTF1pEGQ2',2,'0pHIgES7UyugzMfWm19CsBbZmfeAJiVzfU0pR3zS0qXw3MKH7CNgqkX5vVLy','2017-03-19 20:21:24','2017-03-07 02:27:40'),(3,'Davidson','davidsonbhz@gmail.com','$2y$10$PhjCWQJwqQrxJF0atCgtKej5vw9WjLlCUQmYcwBa0U9vtcowJxX4m',2,NULL,'2017-03-10 01:42:21','2017-03-10 01:42:21'),(4,'Gildomar','gildomar@gmail.com','$2y$10$ThhOorC2NSFExfbt4eCDsOSLJBReGIAG9G0rUBKwaz5/1MqwukVyO',3,'PDXWA3Xzy0Bj47VnAgvvqmveZLDfdo7iXw1XiGsFufkdNycPU88e0MQSLqTE','2017-03-14 23:21:23','2017-03-15 02:19:34'),(5,'daniel','danieeeel@gmail.com','$2y$10$a40ytfYbcSYgE1HrXhzmfuHpYXxijtV.tNd1EhYTGySIOacPPZCni',1,'LPUQ78kIzq0ecUIiB3oYFZzu1B7O892tB12caE0Kq2UZ6FjZKRxrvdOe4kBn','2017-03-16 20:57:34','2017-03-16 17:25:57');
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

-- Dump completed on 2017-03-19 23:59:23
