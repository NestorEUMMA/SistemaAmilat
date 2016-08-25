-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_clinica
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
-- Table structure for table `factor`
--

DROP TABLE IF EXISTS `factor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factor` (
  `IdFactor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del factor socioeconomico ',
  `Nombre` varchar(45) DEFAULT NULL COMMENT 'Indica el nombre del factor ',
  `Descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripción del factor ',
  `Ponderacion` float DEFAULT NULL COMMENT 'Indica la ponderación del factor ',
  `Activo` bit(1) DEFAULT NULL COMMENT 'Indica el estado (activo o inactivo)',
  PRIMARY KEY (`IdFactor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factor`
--

LOCK TABLES `factor` WRITE;
/*!40000 ALTER TABLE `factor` DISABLE KEYS */;
INSERT INTO `factor` VALUES (1,'Socioeconómico','Test Socioeconómico',0,'');
/*!40000 ALTER TABLE `factor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta` (
  `IdPregunta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la pregunta ',
  `IdFactor` int(11) NOT NULL COMMENT 'Es el identificador del factor con la ponderación ',
  `Nombre` varchar(100) DEFAULT NULL COMMENT 'Indica el nombre de la pregunta ',
  `Descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripción de la pregunta ',
  `Ponderacion` float DEFAULT NULL COMMENT 'Indica la ponderación de la pregunta ',
  `Activo` bit(1) DEFAULT NULL COMMENT 'Indica el estado (activo o inactivo)',
  PRIMARY KEY (`IdPregunta`),
  KEY `fk_tbl_pregunta_tbl_factor1_idx` (`IdFactor`),
  CONSTRAINT `fk_tbl_pregunta_tbl_factor1` FOREIGN KEY (`IdFactor`) REFERENCES `factor` (`IdFactor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` VALUES (1,1,'Profesional','Profesional',0,''),(2,1,'Posee trabajo','Posee trabajo',0,''),(3,1,'Su cónyuge es profesional','Su cónyuge es profesional',0,''),(4,1,'Cúantos hijos tiene','Cúantos hijos tiene',0,''),(5,1,'Tiene familiares viviendo en el extranjero, le envían ayuda','Tiene familiares viviendo en el extranjero, le envían ayuda',0,''),(6,1,'Su familia posee vehículo o moto','Su familia posee vehículo o moto',0,''),(7,1,'Tipo de vivienda','Tipo de vivienda',0,''),(8,1,'Número de personas que vivien en la vivienda','Número de personas que vivien en la vivienda',0,''),(9,1,'Poseen televisor','Poseen televisor',0,''),(10,1,'Poseen refrigeradora','Poseen refrigeradora',0,''),(11,1,'Su vivienda tiene agua potable','Su vivienda tiene agua potable',0,''),(12,1,'Su vivienda tiene energía eléctrica','Su vivienda tiene energía eléctrica',0,''),(13,1,'Alquilan o son dueños de su vivienda','Alquilan o son dueños de su vivienda',0,'');
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `IdRespuesta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la respuesta ',
  `IdPregunta` int(11) DEFAULT NULL COMMENT 'Es el identificador de la pregunta ',
  `Nombre` varchar(45) DEFAULT NULL COMMENT 'Indica el nombre de la respuesta ',
  `Descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripción de la respuesta ',
  `Ponderacion` float DEFAULT NULL COMMENT 'Indica la ponderación de la respuesta ',
  `Activo` bit(1) DEFAULT NULL COMMENT 'Indica el estado (activo o inactivo)',
  PRIMARY KEY (`IdRespuesta`),
  KEY `fk_tbl_respuesta_tbl_pregunta1_idx` (`IdPregunta`),
  CONSTRAINT `fk_tbl_respuesta_tbl_pregunta1` FOREIGN KEY (`IdPregunta`) REFERENCES `pregunta` (`IdPregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
INSERT INTO `respuesta` VALUES (1,1,'SI','SI',0,''),(2,1,'NO','NO',0,''),(3,2,'SI','SI',0,''),(4,2,'NO','NO',0,''),(5,3,'SI','SI',0,''),(6,3,'NO','NO',0,''),(7,3,'NO APLICA','NO APLICA',0,''),(8,4,'NO TIENE','NO TIENE',0,''),(9,4,'1','1',0,''),(10,4,'2','2',0,''),(11,4,'3','3',0,''),(12,4,'4','4',0,''),(13,4,'5','5',0,''),(14,4,'6','6',0,''),(15,4,'7','7',0,''),(16,4,'8','8',0,''),(17,4,'9','9',0,''),(18,4,'10','10',0,''),(19,4,'MAS DE 10','MAS DE 10',0,''),(20,5,'SI','SI',0,''),(21,5,'NO','NO',0,''),(22,6,'SI','SI',0,''),(23,6,'NO','NO',0,''),(24,7,'LAMINA','LAMINA',0,''),(25,7,'BAHAREQUE','BAHREQUE',0,''),(26,7,'BLOQUE MIXTO','BLOQUE MIXTO',0,''),(27,7,'OTRO','OTRO',0,''),(28,8,'1','1',0,''),(29,8,'2','2',0,''),(30,8,'3','3',0,''),(31,8,'4','4',0,''),(32,8,'5','5',0,''),(33,8,'6','6',0,''),(34,8,'7','7',0,''),(35,8,'8','8',0,''),(36,8,'9','9',0,''),(37,8,'10','10',0,''),(38,8,'MAS DE 10','MAS DE 10',0,''),(39,9,'SI','SI',0,''),(40,9,'NO','NO',0,''),(41,10,'SI','SI',0,''),(42,10,'NO','NO',0,''),(43,11,'SI','SI',0,''),(44,11,'NO','NO',0,''),(45,12,'SI','SI',0,''),(46,12,'NO','NO',0,''),(47,13,'ALQUILO','ALQUILO',0,''),(48,13,'PROPIO','PROPIO',0,''),(49,13,'OTRO','OTRO',0,'');
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-25  1:28:37
