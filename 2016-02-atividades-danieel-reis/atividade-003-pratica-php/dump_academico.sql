-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: academico
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
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `rua` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `numero` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `bairro` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `cep` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cidade_id` (`cidade_id`),
  CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (3,'Antônio Oliveira','Margarida','38','Santa Maria',1942,'35345676','antoniooliveira@gmail.com',NULL,'2017-03-19 05:39:33'),(5,'Francisco Pereira','','','',1270,'','',NULL,NULL),(6,'Ana Costela','','','',546,'','',NULL,NULL),(8,'Paulo Almeida','','','',804,'','',NULL,NULL),(9,'Carlos Ferreira','','','',1377,'','',NULL,NULL),(10,'Manoel Ribeiro','','','',554,'','',NULL,NULL),(11,'Pedro Rodrigues','','','',599,'','',NULL,NULL),(12,'Francisca Gomes','','','',1333,'','',NULL,NULL),(13,'Marcos Lima','','','',950,'','',NULL,NULL),(14,'Raimundo Martins','','','',752,'','',NULL,NULL),(15,'Sebastião Rocha','','','',906,'','',NULL,NULL),(16,'Antônia Alves','','','',317,'','',NULL,NULL),(17,'Marcelo Araújo','','','',823,'','',NULL,NULL),(18,'Jorge Xavier','','','',1208,'','',NULL,NULL),(19,'Márcia Barbosa','','','',1608,'','',NULL,NULL),(20,'Geraldo Castro','','','',498,'','',NULL,NULL),(21,'Adriana Fernandes','','','',1583,'','',NULL,NULL),(22,'Sandra Melo','','','',544,'','',NULL,NULL),(23,'Luis Azevedo','','','',1890,'','',NULL,NULL),(24,'Fernando Barros','','','',1941,'','',NULL,NULL),(25,'Fabio Cardoso','','','',114,'','',NULL,NULL),(26,'Roberto Correia','','','',624,'','',NULL,NULL),(27,'Márcio Cunha','','','',820,'','',NULL,NULL),(28,'Edson Dias','','','',269,'','',NULL,NULL),(29,'André Mesquita','','','',845,'','',NULL,NULL),(30,'Maria Silva','Margarida','38','São José',114,'35345676','mariasilva@gmail.com','2017-03-19 01:08:25','2017-03-19 01:14:46'),(31,'João','Margarida','146','Santa Maria',1119,'35365755','joaodoido@gmail.com','2017-03-19 01:45:12','2017-03-19 01:45:12'),(33,'Daniel','1000','146','São José',114,'35930199','daniel@gmail.com','2017-03-19 06:00:38','2017-03-19 06:00:38'),(35,'Kamila','Margarida','38','São José',114,'35930199','kamila@gmail.com','2017-03-19 06:08:33','2017-03-19 06:21:28'),(36,'Carlos','Margarida','38','São José',114,'35930199','carlos@gmail.com','2017-03-19 06:09:16','2017-03-19 06:21:40'),(37,'Amanda','Margarida','38','São José',114,'35930199','amanda@gmail.com','2017-03-19 06:10:00','2017-03-19 06:21:53'),(39,'Antônio','Margarida','38','São José',114,'35930199','antonio@gmail.com','2017-03-19 06:17:18','2017-03-19 06:22:04');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidades`
--

DROP TABLE IF EXISTS `cidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `estado_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_id` (`estado_id`),
  CONSTRAINT `cidades_estado` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1944 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidades`
--

LOCK TABLES `cidades` WRITE;
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
INSERT INTO `cidades` VALUES (114,'Macae',19,NULL,NULL),(269,'Guaraciaba',24,NULL,NULL),(317,'Lontras',24,NULL,NULL),(498,'Araraquara',25,NULL,NULL),(544,'Boraceia',25,NULL,NULL),(546,'Borebi',25,NULL,NULL),(554,'Buritama',25,NULL,NULL),(599,'Conchal',25,NULL,NULL),(624,'Dumont',25,NULL,NULL),(752,'Joanopolis',25,NULL,NULL),(804,'Mirassol',25,NULL,NULL),(820,'Morro Agudo',25,NULL,NULL),(823,'Murutinga do Sul',25,NULL,NULL),(845,'Oleo',25,NULL,NULL),(880,'Pedregulho',25,NULL,NULL),(906,'Planalto',25,NULL,NULL),(950,'Ribeirao do Sul',25,NULL,NULL),(1119,'Alagoa',13,NULL,NULL),(1208,'Buritizeiro',13,NULL,NULL),(1270,'Cascalho Rico',13,NULL,NULL),(1281,'Chacara',13,NULL,NULL),(1295,'Conceicao da Barra de Minas',13,NULL,NULL),(1333,'Cristina',13,NULL,NULL),(1377,'Esmeraldas',13,NULL,NULL),(1583,'Matozinhos',13,NULL,NULL),(1608,'Montes Claros',13,NULL,NULL),(1711,'Planura',13,NULL,NULL),(1890,'Serra da Saudade',13,NULL,NULL),(1941,'Vargem Grande do Rio Pardo',13,NULL,NULL),(1942,'João Monlevade',13,'2017-03-19 02:29:01','2017-03-19 02:29:01');
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplinas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplinas`
--

LOCK TABLES `disciplinas` WRITE;
/*!40000 ALTER TABLE `disciplinas` DISABLE KEYS */;
INSERT INTO `disciplinas` VALUES (2,'AEDS I','CSI488',60,'2017-03-19 03:28:47','2017-03-19 03:28:47'),(3,'BD I','CSI000',60,'2017-03-19 03:35:13','2017-03-19 03:35:13');
/*!40000 ALTER TABLE `disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `sigla` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Acre','AC',NULL,NULL),(2,'Alagoas','AL',NULL,NULL),(3,'Amapá','AP',NULL,NULL),(4,'Amazonas','AM',NULL,NULL),(5,'Bahia','BA',NULL,NULL),(6,'Ceará','CE',NULL,NULL),(7,'Distrito Federal','DF',NULL,NULL),(8,'Espírito Santo','ES',NULL,NULL),(9,'Goiás','GO',NULL,NULL),(10,'Maranhão','MA',NULL,NULL),(11,'Mato Grosso','MT',NULL,NULL),(12,'Mato Grosso do Sul','MS',NULL,NULL),(13,'Minas Gerais','MG',NULL,NULL),(14,'Pará','PA',NULL,NULL),(15,'Paraíba','PB',NULL,NULL),(16,'Paraná','PR',NULL,NULL),(17,'Pernambuco','PE',NULL,NULL),(18,'Piauí','PI',NULL,NULL),(19,'Rio de Janeiro','RJ',NULL,NULL),(20,'Rio Grande do Norte','RN',NULL,NULL),(21,'Rio Grande do Sul','RS',NULL,NULL),(22,'Rondônia','RO',NULL,NULL),(23,'Roraima','RR',NULL,NULL),(24,'Santa Catarina','SC',NULL,NULL),(25,'São Paulo','SP',NULL,NULL),(26,'Sergipe','SE',NULL,NULL),(27,'Tocantins','TO',NULL,NULL);
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_03_18_191419_create_sessions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `ano` smallint(6) NOT NULL,
  `semestre` smallint(6) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `nota1` decimal(5,2) DEFAULT NULL,
  `nota2` decimal(5,2) DEFAULT NULL,
  `nota3` decimal(5,2) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ano`,`semestre`,`aluno_id`),
  KEY `aluno_id` (`aluno_id`),
  CONSTRAINT `aluno_id` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
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
-- Table structure for table `turmas`
--

DROP TABLE IF EXISTS `turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turmas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `disciplina_id` int(10) unsigned NOT NULL,
  `nome` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `disciplina_id` (`disciplina_id`),
  CONSTRAINT `turmas_disciplina` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (1,3,'E203','2017-03-19 04:18:49','2017-03-19 04:18:49'),(4,2,'E204','2017-03-19 06:22:16','2017-03-19 06:22:22');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Daniel','danielmartinsreis@gmail.com','$2y$10$YyS52G08WvLtQB5inZwjr.Sq1pMOrw9HnrF//6OJcOw8jteUt4izm',1,'g3UU38pJpWI2EdX72H6UW3iRR70yJHKuKU0Uj77wfIrmQj5abA7EIc24U2iX','2017-03-19 00:43:58','2017-03-19 00:43:58'),(2,'Joao','joaodoido@gmail.com','$2y$10$qR030k4yedo6OIO6akYw8eQjs3zK3OW5tgAyUA2K7CA4m2LjvWCby',1,'lbmyUABiAyxiw1SYaXEk3rPMf1s5J9GuKJ5UxnHZfjLdczqsNtOzkBYsQRei','2017-03-19 05:03:10','2017-03-19 05:03:10'),(3,'Admin','admin@gmail.com','$2y$10$MFKt3aTndobiZA1hjDE2Aua1lFRtPlBeG5MiXiseliUoRqAPHr8Ze',2,'vEhVUULjgr5HxUmAoJl01MHvrfOeIx1U87P7YfMydeLMo7yY5hdVa53fmbBH','2017-03-19 17:26:57','2017-03-19 17:26:57');
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

-- Dump completed on 2017-03-19 12:03:47
