-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: db_siteodonto
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `tb_icone`
--

DROP TABLE IF EXISTS `tb_icone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_icone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(200) NOT NULL,
  `icone` varchar(600) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_icone`
--

LOCK TABLES `tb_icone` WRITE;
/*!40000 ALTER TABLE `tb_icone` DISABLE KEYS */;
INSERT INTO `tb_icone` VALUES (1,'fa fa-font-awesome fa-3x','icones','2017-10-29 20:16:31'),(2,'fa fa-user-o fa-3x','Usuario','2017-06-08 23:39:33'),(3,'fa fa-rss fa-3x','Blogs','2017-06-08 23:39:27'),(4,'fa fa-plus-square fa-3x','Planos','2017-06-08 23:39:18'),(5,'fa fa-building-o fa-3x','Empresas','2017-06-08 23:39:12'),(6,'fa fa-pagelines fa-3x','Paginas','2017-06-08 23:38:54'),(7,'fa fa-video-camera fa-3x','Videos ','2017-06-26 15:57:39'),(8,'fa fa-search-plus fa-3x','Ans','2017-07-10 16:40:59'),(9,'fa  fa-user-circle-o fa-3x','Beneficiario','2017-07-10 16:41:04'),(10,'fa fa-asterisk fa-3x','Outros','2017-07-10 16:57:07'),(11,'fa fa-bars fa-3x','Menu','2017-10-29 20:16:43');
/*!40000 ALTER TABLE `tb_icone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL DEFAULT 'LOGIN',
  `senha` varchar(200) NOT NULL DEFAULT 'SENHA',
  `email` varchar(200) NOT NULL DEFAULT 'EMAIL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_login`
--

LOCK TABLES `tb_login` WRITE;
/*!40000 ALTER TABLE `tb_login` DISABLE KEYS */;
INSERT INTO `tb_login` VALUES (1,'admin','123','EMAIL'),(3,'vitorianoernandes2012','*vt2016#','vitorianoernandes2012@gmail.com'),(4,'valentina','valentina123','valentina@12.com');
/*!40000 ALTER TABLE `tb_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_menu`
--

DROP TABLE IF EXISTS `tb_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(200) NOT NULL,
  `tb_icone` int(11) NOT NULL DEFAULT '1',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_menu`
--

LOCK TABLES `tb_menu` WRITE;
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
INSERT INTO `tb_menu` VALUES (1,'Icone',1,'2017-10-29 20:14:23'),(2,'Menu',11,'2017-10-29 20:14:28'),(3,'Login',2,'2017-04-23 04:06:35'),(4,'Blogs',3,'2017-04-23 04:05:36'),(5,'Planos',4,'2017-04-23 04:08:39'),(6,'Empresa',5,'2017-05-04 01:54:29'),(7,'Paginas',6,'2017-05-07 01:09:13'),(8,'Videos',7,'2017-06-26 15:57:59'),(9,'Ans',8,'2017-07-10 16:05:19'),(10,'Beneficiario',9,'2017-07-10 16:40:21'),(11,'Outros',10,'2017-07-10 16:57:23');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_site`
--

DROP TABLE IF EXISTS `tb_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `subtitulo` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `palavras_chaves` varchar(200) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `descricao` longtext NOT NULL,
  `imagem` varchar(600) NOT NULL DEFAULT 'FILE',
  `direitos` varchar(600) NOT NULL,
  `link` varchar(600) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_site`
--

LOCK TABLES `tb_site` WRITE;
/*!40000 ALTER TABLE `tb_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_site` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-29 19:27:24
