-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: analise
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
-- Table structure for table `exames`
--

DROP TABLE IF EXISTS `exames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) NOT NULL,
  `procedimento_id` int(11) NOT NULL,
  `data` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_exames_has_procedimentos` (`procedimento_id`),
  KEY `idx_exames_has_pacientes` (`paciente_id`),
  CONSTRAINT `fk_exames_has_pacientes` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_exames_has_procedimentos` FOREIGN KEY (`procedimento_id`) REFERENCES `procedimentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exames`
--

LOCK TABLES `exames` WRITE;
/*!40000 ALTER TABLE `exames` DISABLE KEYS */;
INSERT INTO `exames` VALUES (2,3,4,'2017-02-02'),(3,5,4,'2017-02-02'),(4,1,5,'2017-02-02'),(5,2,4,'20/10/2008'),(6,2,3,'01/01/1998'),(7,5,7,'2017-02-05');
/*!40000 ALTER TABLE `exames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `login` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'Maria Silva','silva','4620'),(2,'José Santos','santos','4298'),(3,'Antônio Oliveira','oliveira','4631'),(4,'João Souza','souza','3262'),(5,'Francisco Pereira','pereira','3415'),(6,'Ana Costela W','costel','4291'),(7,'Luiz Carvalho','carvalho','4211'),(8,'Paulo Almeida','almeida','3181'),(10,'Manoel Ribeiro','ribeiro','4817'),(11,'Pedro Rodrigues','rodrigues','4270'),(12,'Francisca Gomes','gomes','3898'),(13,'Marcos Lima','lima','3683'),(14,'Raimundo Martins','martins','3723'),(15,'Sebastião Rocha','rocha','4563'),(16,'Antônia Alves','alves','4649'),(17,'Marcelo Araújo','araujo','4557'),(18,'Jorge Xavier','xavier','3837'),(19,'Márcia Barbosa','barbosa','4516'),(20,'Geraldo Castro','castro','4069'),(22,'Sandra Melo','melo','3773'),(23,'Luis Azevedo','azevedo','4477'),(24,'Fernando Barros','barros','4070'),(25,'Fabio Cardoso','cardoso','3916'),(26,'Roberto Correia','correia','4371'),(27,'Márcio Cunha','cunha','3109'),(28,'Edson Dias','dias','3431'),(29,'André Mesquita','mesquita','4828'),(37,'daniel','dani','12345');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedimentos`
--

DROP TABLE IF EXISTS `procedimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_procedimentos_usuarios1_idx` (`usuario_id`),
  CONSTRAINT `fk_procedimentos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedimentos`
--

LOCK TABLES `procedimentos` WRITE;
/*!40000 ALTER TABLE `procedimentos` DISABLE KEYS */;
INSERT INTO `procedimentos` VALUES (1,'GLICEMIA',10.00,1),(2,'HIDROXIVITAMINA D',15.00,2),(3,'PROTEINAS TOTAIS',45.00,2),(4,'DENGUE',22.00,1),(5,'BETA HCG QUANTITATIVO',18.00,2),(6,'HEMOGRAMA',12.00,1),(7,'VITAMINA K',45.00,1),(8,'COLESTEROL TOTAL',15.00,2),(9,'GRUPO SANGUINEO + FATOR RH',10.00,1),(10,'HORMONIO DE CRESCIMENTO (GH)',45.00,2),(18,'BETA HCG QUANTITATIVO',18.00,2),(23,'adaf',12.00,28);
/*!40000 ALTER TABLE `procedimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `login` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Administrador','admin','admin',1),(2,'Operador','operador','operador',2),(10,'daniel','daniel','123',1),(18,'xxx','xxx','xxx',1),(23,'teste','tewe','wtreytrh',1),(24,'ww','ww','ww',1),(26,'d','sfv','r',1),(27,'dvd','sfv fbfb','rvbdg',1),(28,'svdFGHFN','TYR','2R3T4YRH',1),(30,'sd','fregt','regth',1),(32,'wferth','245yuyk','245364',1),(33,'ewftrh','24546Y','425y',1),(35,'rgtngQ','T45YW','12342',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-03  1:24:33
