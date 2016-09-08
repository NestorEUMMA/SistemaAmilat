-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: db_clinica
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `bajalotes`
--

DROP TABLE IF EXISTS `bajalotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bajalotes` (
  `CodigoLote` varchar(45) NOT NULL,
  `Fecha` datetime NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  KEY `fk_bajavencimiento_usuario1_idx` (`IdUsuario`),
  CONSTRAINT `fk_bajavencimiento_usuario1_idx` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bajalotes`
--

LOCK TABLES `bajalotes` WRITE;
/*!40000 ALTER TABLE `bajalotes` DISABLE KEYS */;
INSERT INTO `bajalotes` VALUES ('acet123','2016-08-24 00:01:31',10,0),('rivo1','2016-08-26 05:56:07',7,700);
/*!40000 ALTER TABLE `bajalotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(100) NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Antibioticos'),(2,'Hipoglucemiantes'),(3,'Antihistaminicos'),(4,'Antihistaminicos'),(5,'Antipireticos'),(6,'Antitusivos'),(7,'Vitaminas'),(8,'Antiparasitarios'),(9,'Antiparasitarios'),(10,'Antiinflamatorios');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase` (
  `IdClase` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la clase del estudio socio economico ',
  `Nombre` varchar(45) DEFAULT NULL COMMENT 'Indica el nombre de la clase',
  `RangoIni` float DEFAULT NULL COMMENT 'Indica el rango inicial ',
  `RangoFin` float DEFAULT NULL COMMENT 'Indica el rango final ',
  `Descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripción de la clase del estudio socioeconomico ',
  `PorcentajeSubsidio` float DEFAULT NULL COMMENT 'Indica el porcentaje del subsidio a aplicar ',
  `Activo` bit(1) DEFAULT NULL COMMENT 'Indica el estado (activo o inactivo)',
  PRIMARY KEY (`IdClase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `IdConsulta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la consulta',
  `IdUsuario` int(11) NOT NULL COMMENT 'Es el identificador del medico ',
  `IdPersona` int(11) NOT NULL COMMENT 'Es el identificador de la persona (paciente)',
  `IdModulo` int(11) NOT NULL COMMENT 'Es el identifiador del modulo o areas ',
  `Diagnostico` longtext COMMENT 'Diagnostico de la consulta ',
  `Comentarios` longtext COMMENT 'Comentarios extras de la consulta',
  `Otros` longtext COMMENT 'Espacio para anotaciones libres ',
  `IdEnfermedad` int(11) DEFAULT NULL COMMENT 'Es el identificador de la enfermedad',
  `FechaConsulta` date NOT NULL COMMENT 'Indica la fecha de la consulta',
  `Activo` int(11) DEFAULT NULL,
  `IdEstado` int(2) NOT NULL,
  `Status` int(2) DEFAULT NULL,
  PRIMARY KEY (`IdConsulta`),
  KEY `fk_tbl_consulta_tbl_persona1_idx` (`IdPersona`),
  KEY `fk_tbl_consulta_tbl_enfermedad1_idx` (`IdEnfermedad`),
  KEY `fk_tbl_consulta_Modulo1_idx` (`IdModulo`),
  KEY `fk_tbl_consulta_Estado1_idx` (`IdEstado`),
  CONSTRAINT `fk_tbl_consulta_Modulo1` FOREIGN KEY (`IdModulo`) REFERENCES `modulo` (`IdModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_consulta_tbl_enfermedad1` FOREIGN KEY (`IdEnfermedad`) REFERENCES `enfermedad` (`IdEnfermedad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_consulta_tbl_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (10,8,1,3,'Diagnoscito nocturo ','nasd ',' asd',4,'2016-01-01',0,2,1),(11,8,1,3,' Prueba desde Medico','Prueba desde Medico  ','Prueba desde Medico  ',4,'2016-08-17',0,2,1),(12,8,1,3,' DIAGNOSTICO CON FRAN ','CONMENTARIOS  ','OTROS  ',4,'2016-08-17',0,2,1),(13,8,2,3,NULL,NULL,NULL,NULL,'2016-08-18',1,2,1);
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultaindicador`
--

DROP TABLE IF EXISTS `consultaindicador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultaindicador` (
  `IdConsulta` int(11) NOT NULL COMMENT 'Es el identificador de la consulta ',
  `IdEnfermedad` int(11) NOT NULL COMMENT 'Es el identificador de la enfermedad ',
  PRIMARY KEY (`IdConsulta`,`IdEnfermedad`),
  KEY `fk_tbl_consulta_indicador_tbl_enfermedad1_idx` (`IdEnfermedad`),
  CONSTRAINT `fk_tbl_consulta_indicador_tbl_consulta1` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_consulta_indicador_tbl_enfermedad1` FOREIGN KEY (`IdEnfermedad`) REFERENCES `enfermedad` (`IdEnfermedad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultaindicador`
--

LOCK TABLES `consultaindicador` WRITE;
/*!40000 ALTER TABLE `consultaindicador` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultaindicador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedad`
--

DROP TABLE IF EXISTS `enfermedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfermedad` (
  `IdEnfermedad` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la enfermedad ',
  `Codigo` varchar(45) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL COMMENT 'Indica el nombre de la enfermedad ',
  `IdTipoDiagnostico` int(11) NOT NULL,
  PRIMARY KEY (`IdEnfermedad`),
  KEY `fk_enfermedad_tipoDiagnostico_idx` (`IdTipoDiagnostico`),
  CONSTRAINT `fk_enfermedad_tipoDiagnostico1` FOREIGN KEY (`IdTipoDiagnostico`) REFERENCES `tipodiagnostico` (`IdTipoDiagnostico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedad`
--

LOCK TABLES `enfermedad` WRITE;
/*!40000 ALTER TABLE `enfermedad` DISABLE KEYS */;
INSERT INTO `enfermedad` VALUES (4,'12540',7,'Aborto',1),(5,'12536',3,'Afeccion de la vista',1),(6,'12539',6,'Afeccion Ginecologica',1),(7,'12560',27,'Afecciones Bucales',1),(8,'12553',20,'Afecciones Cardiacas',1),(9,'12695',35,'Afecciones de columna',1),(10,'12546',13,'Afecciones de la piel',1),(11,'12561',28,'Afecciones del sistema Venoso',1),(12,'12559',26,'Afecciones Endocrinas',1),(13,'12563',30,'Afecciones Psicologicas y Psiquiatricas',1),(14,'12694',34,'Amputaciones',1),(15,'12552',19,'Aparato Genitourinario',1),(16,'12538',5,'Desnutricion',1),(17,'12544',11,'Disfunciones Organicas',1),(18,'12550',17,'Dolores Diversos',1),(19,'12555',22,'Embarazo',1),(20,'12541',8,'Enfermedades Infecto Contagiosas',1),(21,'12545',12,'Enfermedades Artriticas',1),(22,'12562',29,'Enfermedades Carenciales',1),(23,'12692',32,'Enfermedades del sistema musculo esqueletico',1),(24,'12543',10,'Enfermedades Venereas',1),(25,'12564',31,'Fallecimientos',1),(26,'12548',15,'Heridas y Traumatismos',1),(27,'12696',36,'Hernias',1),(28,'12542',9,'Infecciones Diversas',1),(29,'12551',18,'Intoxicaciones',1),(30,'12693',33,'Lesion de nervios perifericos',1),(31,'12535',2,'Oido, Nariz y Garganta',1),(32,'12547',14,'Parasitismo',1),(33,'12680',0,'Persona Sana',1),(34,'12556',23,'Planificacion Familiar',1),(35,'12549',16,'Procesos Febril no determinado ',1),(36,'12557',24,'Quemaduras',1),(37,'12554',21,'Sistema Nervioso',1),(38,'12558',25,'Tumores',1),(39,'12537',4,'Vias Digestivas',1),(40,'12534',1,'Vias Respiratorias',1),(41,'12604',94,'Accidentes de Trabajo',2),(42,'12669',166,'Alcoholismo',2),(43,'12612',106,'Amibiasis',2),(44,'12668',165,'Ansiedad',2),(45,'12653',149,'Bocio Endemico',2),(46,'12644',140,'Brucelosis',2),(47,'12594',63,'Cancer Cervico-Uterino',2),(48,'12646',142,'Cancer mamario',2),(49,'12626',120,'Candidiasis de vulva y vagina',2),(50,'12643',139,'Carbunco (ANTRAX)',2),(51,'12624',118,'Chancro blando',2),(52,'12575',15,'Colera',2),(53,'12622',116,'Condiloma acuminado',2),(54,'12633',128,'Conjuntivitis bacteriana agud',2),(55,'12583',39,'Conjuntivitis Hemorragica',2),(56,'12586',48,'Dengue Clasico',2),(57,'12587',49,'Dengue Hemorragico',2),(58,'12667',164,'Depresion',2),(59,'12656',152,'Desnutri proteicocal Leve',2),(60,'12655',151,'Desnutri proteicocal Modera',2),(61,'12654',150,'Desnutri proteicocal Severa',2),(62,'12652',148,'Diabetes Mellitus',2),(63,'12619',113,'Diarrea Enteritis y Gastroenteritis',2),(64,'12607',1,'Difteria',2),(65,'12679',135,'Encefalitis viral no especifi',2),(66,'12637',132,'Enferm Virica de Marburg y E',2),(67,'12638',133,'Enferm de chagas aguda',2),(68,'12640',136,'Fiebre amarilla',2),(69,'12588',50,'Fiebre Equina Venezolana',2),(70,'12576',17,'Fiebre Tifoidea',2),(71,'12613',107,'Giardiasis',2),(72,'12645',141,'Hanta Virus',2),(73,'12681',177,'Helmintiasis',2),(74,'12571',9,'Hepatitis Aguda B',2),(75,'12572',10,'Hepatitis Aguda Viral A',2),(76,'12671',168,'Herida x arma blanca',2),(77,'12670',167,'Herida x arma de fuego',2),(78,'12621',115,'Herpes Genital',2),(79,'12595',67,'Hipertension Arterial',2),(80,'12630',125,'Infecc Aguda VRespira Sup',2),(81,'12577',27,'Infeccion Gonococ Tracto GU',2),(82,'12578',28,'Infeccion VIH',2),(83,'12682',178,'Influenza',2),(84,'12651',147,'Insuficiencia renal cronica',2),(85,'12665',162,'Intento de Suicidio (Conducta Suicida)',2),(86,'12685',181,'Intoxicacion Alimentaria Aguda',2),(87,'12589',53,'Leishmaniasis',2),(88,'12584',45,'Lepra',2),(89,'12592',60,'Leptospirosis',2),(90,'12623',117,'Linfogranuloma venereo',2),(91,'12686',182,'Maltrato Fisico',2),(92,'12582',35,'Meningitis Meningococica',2),(93,'12565',2,'Meningitis Tuberculosa',2),(94,'12627',121,'Meningitis x hemofilos',2),(95,'12599',82,'Mordedura por Animales Rabioso',2),(96,'12664',161,'Mordedura x Serpiente Venenosa',2),(97,'12683',179,'Neumonias',2),(98,'12590',55,'Paludismo',2),(99,'12566',4,'Paralisis Flacida',2),(100,'12573',11,'Parotiditis infecciosa',2),(101,'12663',160,'Picadura x Abeja africanizada',2),(102,'12600',84,'Por Vehiculo Automotor',2),(103,'12593',61,'Rabia Humana',2),(104,'12611',105,'Rubeola congenita',2),(105,'12574',12,'Rubeola',2),(106,'12580',32,'SΦilis Congenita',2),(107,'12567',5,'Sarampion',2),(108,'12579',30,'SIDA ',2),(109,'12620',114,'Sifilis adquirida y no espec',2),(110,'12684',180,'Sindrome Respiratorio Agudo Severo (SARS)',2),(111,'12610',104,'Tetanos Neonatal',2),(112,'12568',6,'Tetanos',2),(113,'12641',137,'Tifus Epidemico',2),(114,'12569',7,'Tos ferina',2),(115,'12601',88,'Trastornos x Drogo Dependencia',2),(116,'12625',119,'Tricomoniasis Urogenital',2),(117,'12570',8,'Tuberculosis Pulmonar',2),(118,'12585',47,'Varicela',2),(119,'12603',93,'Violacion Sexual',2);
/*!40000 ALTER TABLE `enfermedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entradas`
--

DROP TABLE IF EXISTS `entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradas` (
  `IdUsuario` int(11) NOT NULL,
  `IdMedicamento` int(11) NOT NULL,
  `IdMovimiento` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  KEY `fk_entradas_usuario1_idx` (`IdUsuario`),
  KEY `fk_entradas_medicamento1_idx` (`IdMedicamento`),
  KEY `fk_entradas_movimiento1_idx` (`IdMovimiento`),
  CONSTRAINT `fk_entradas_medicamentos1_idx` FOREIGN KEY (`IdMedicamento`) REFERENCES `medicamentos` (`IdMedicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entradas_movimientos1_idx` FOREIGN KEY (`IdMovimiento`) REFERENCES `movimientos` (`IdMovimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entradas_usuario1_idx` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entradas`
--

LOCK TABLES `entradas` WRITE;
/*!40000 ALTER TABLE `entradas` DISABLE KEYS */;
INSERT INTO `entradas` VALUES (10,9,1,500,'2016-08-23'),(7,12,1,500,'2016-08-26'),(7,11,1,500,'2016-08-26'),(7,11,1,500,'2016-08-26'),(7,11,1,500,'2016-08-26'),(7,11,1,500,'2016-08-26'),(7,11,1,500,'2016-08-26'),(7,9,1,23,'2016-08-26'),(7,11,1,333,'2016-08-26');
/*!40000 ALTER TABLE `entradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `IdEstado` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEstado` varchar(45) NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Sin Consulta'),(2,'Consulta');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadocivil`
--

DROP TABLE IF EXISTS `estadocivil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadocivil` (
  `IdEstadoCivil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del estado civil ',
  `Nombre` varchar(50) DEFAULT NULL COMMENT 'Indica el nombre del estado civil ',
  PRIMARY KEY (`IdEstadoCivil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadocivil`
--

LOCK TABLES `estadocivil` WRITE;
/*!40000 ALTER TABLE `estadocivil` DISABLE KEYS */;
INSERT INTO `estadocivil` VALUES (1,'Soltero'),(2,'Casado');
/*!40000 ALTER TABLE `estadocivil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenesvarios`
--

DROP TABLE IF EXISTS `examenesvarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examenesvarios` (
  `IdExamenesVarios` int(11) NOT NULL AUTO_INCREMENT,
  `IdListaExamen` int(11) NOT NULL,
  `IdTipoExamen` int(11) NOT NULL,
  `IdConsulta` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Resultado` varchar(5000) DEFAULT NULL,
  `Activo` int(11) NOT NULL,
  PRIMARY KEY (`IdExamenesVarios`,`IdTipoExamen`,`IdConsulta`,`IdPersona`,`IdUsuario`,`IdListaExamen`),
  KEY `fk_examenesVarios_tipoExamen1_idx` (`IdTipoExamen`),
  KEY `fk_examenesVarios_persona1_idx` (`IdPersona`),
  KEY `fk_examenesVarios_usuario1_idx` (`IdUsuario`),
  KEY `fk_examenesVarios_consulta1_idx` (`IdConsulta`),
  KEY `fk_examenesVarios_listaexamen1_idx` (`IdListaExamen`),
  CONSTRAINT `fk:examenesVarios_listaExamen` FOREIGN KEY (`IdListaExamen`) REFERENCES `listaexamen` (`IdListaExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenesVarios_consulta1` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenesVarios_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenesVarios_tipoExamen1` FOREIGN KEY (`IdTipoExamen`) REFERENCES `tipoexamen` (`IdTipoExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenesVarios_usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenesvarios`
--

LOCK TABLES `examenesvarios` WRITE;
/*!40000 ALTER TABLE `examenesvarios` DISABLE KEYS */;
INSERT INTO `examenesvarios` VALUES (1,5,5,12,1,9,'2016-08-17','EXAMEN VARIOS DE FRAN',1);
/*!40000 ALTER TABLE `examenesvarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenheces`
--

DROP TABLE IF EXISTS `examenheces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examenheces` (
  `IdExamenHeces` int(11) NOT NULL AUTO_INCREMENT,
  `IdListaExamen` int(11) NOT NULL,
  `IdTipoExamen` int(11) NOT NULL,
  `IdConsulta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Consistencia` varchar(45) DEFAULT NULL,
  `Mucus` varchar(45) DEFAULT NULL,
  `Hematies` varchar(45) DEFAULT NULL,
  `Leucocitos` varchar(45) DEFAULT NULL,
  `RestosAlimenticios` varchar(45) DEFAULT NULL,
  `Macrocopicos` varchar(45) DEFAULT NULL,
  `Microscopicos` varchar(45) DEFAULT NULL,
  `FloraBacteriana` varchar(45) DEFAULT NULL,
  `Otros` varchar(45) DEFAULT NULL,
  `PActivos` varchar(45) DEFAULT NULL,
  `PQuistes` varchar(45) DEFAULT NULL,
  `Activo` int(11) NOT NULL,
  PRIMARY KEY (`IdExamenHeces`,`IdListaExamen`,`IdTipoExamen`,`IdConsulta`,`IdUsuario`,`IdPersona`),
  KEY `fk_examenHeces_tipoExamen1_idx` (`IdTipoExamen`),
  KEY `fk_examenHeces_usuario1_idx` (`IdUsuario`),
  KEY `fk_examenHeces_persona1_idx` (`IdPersona`),
  KEY `fk_examenHeces_consulta1_idx` (`IdConsulta`),
  KEY `fk_examenHeces_listaExamen1_idx` (`IdListaExamen`),
  CONSTRAINT `fk_examenHeces_consulta1` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenHeces_listaExamen1` FOREIGN KEY (`IdListaExamen`) REFERENCES `listaexamen` (`IdListaExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenHeces_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenHeces_tipoExamen1` FOREIGN KEY (`IdTipoExamen`) REFERENCES `tipoexamen` (`IdTipoExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenHeces_usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenheces`
--

LOCK TABLES `examenheces` WRITE;
/*!40000 ALTER TABLE `examenheces` DISABLE KEYS */;
INSERT INTO `examenheces` VALUES (1,2,2,12,9,1,'2016-08-17','2','3','6','5','59','8','7','8','9','8','7','EXAMEN HECES DE FRAN',1);
/*!40000 ALTER TABLE `examenheces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenhemograma`
--

DROP TABLE IF EXISTS `examenhemograma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examenhemograma` (
  `IdExamenHemograma` int(11) NOT NULL AUTO_INCREMENT,
  `IdListaExamen` int(11) NOT NULL,
  `IdTipoExamen` int(11) NOT NULL,
  `IdConsulta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `GlobulosRojos` varchar(45) DEFAULT NULL,
  `Hemoglobina` varchar(45) DEFAULT NULL,
  `Hematocrito` varchar(45) DEFAULT NULL,
  `Vgm` varchar(45) DEFAULT NULL,
  `Hcm` varchar(45) DEFAULT NULL,
  `Chcm` varchar(45) DEFAULT NULL,
  `Leucocitos` varchar(45) DEFAULT NULL,
  `NeutrofilosEnBanda` varchar(45) DEFAULT NULL,
  `Linfocitos` varchar(45) DEFAULT NULL,
  `Monocitos` varchar(45) DEFAULT NULL,
  `Eosinofilos` varchar(45) DEFAULT NULL,
  `Basofilos` varchar(45) DEFAULT NULL,
  `Plaquetas` varchar(45) DEFAULT NULL,
  `Eritrosedimentacion` varchar(45) DEFAULT NULL,
  `Otros` varchar(45) DEFAULT NULL,
  `NeutrofilosSegmentados` varchar(45) DEFAULT NULL,
  `Activo` int(11) NOT NULL,
  PRIMARY KEY (`IdExamenHemograma`,`IdListaExamen`,`IdTipoExamen`,`IdConsulta`,`IdUsuario`,`IdPersona`),
  KEY `fk_examenHemograma_persona1_idx` (`IdPersona`),
  KEY `fk_examenHemograma_usuario1_idx` (`IdUsuario`),
  KEY `fk_examenHemograma_tipoExamen1_idx` (`IdTipoExamen`),
  KEY `fk_examenHemograma_consulta1` (`IdConsulta`),
  KEY `fk_examenHemograma_listaExamen1` (`IdListaExamen`),
  CONSTRAINT `fk_examenHemograma_consulta1` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenHemograma_listaExamen1` FOREIGN KEY (`IdListaExamen`) REFERENCES `listaexamen` (`IdListaExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenHemograma_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenHemograma_tipoExamen1` FOREIGN KEY (`IdTipoExamen`) REFERENCES `tipoexamen` (`IdTipoExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenHemograma_usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenhemograma`
--

LOCK TABLES `examenhemograma` WRITE;
/*!40000 ALTER TABLE `examenhemograma` DISABLE KEYS */;
INSERT INTO `examenhemograma` VALUES (1,1,1,12,9,1,'2016-08-17','1','2','3','4','5','6','7','8','9','7','8','9','8','7','8','9',1);
/*!40000 ALTER TABLE `examenhemograma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenorina`
--

DROP TABLE IF EXISTS `examenorina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examenorina` (
  `IdExamenOrina` int(11) NOT NULL AUTO_INCREMENT,
  `IdListaExamen` int(11) NOT NULL,
  `IdTipoExamen` int(11) NOT NULL,
  `IdConsulta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Olor` varchar(45) DEFAULT NULL,
  `Aspecto` varchar(45) DEFAULT NULL,
  `Densidad` varchar(45) DEFAULT NULL,
  `Ph` varchar(45) DEFAULT NULL,
  `Proteinas` varchar(45) DEFAULT NULL,
  `Glucosa` varchar(45) DEFAULT NULL,
  `SagreOculta` varchar(45) DEFAULT NULL,
  `CuerposCetomicos` varchar(45) DEFAULT NULL,
  `Urobilinogeno` varchar(45) DEFAULT NULL,
  `Bilirrubina` varchar(45) DEFAULT NULL,
  `EsterasaLeucocitaria` varchar(45) DEFAULT NULL,
  `Cilindros` varchar(45) DEFAULT NULL,
  `Hematies` varchar(45) DEFAULT NULL,
  `Leucocitos` varchar(45) DEFAULT NULL,
  `CelulasEpiteliales` varchar(45) DEFAULT NULL,
  `ElementosMinerales` varchar(45) DEFAULT NULL,
  `Parasitos` varchar(45) DEFAULT NULL,
  `Observaciones` varchar(5000) DEFAULT NULL,
  `Activo` int(11) NOT NULL,
  PRIMARY KEY (`IdExamenOrina`,`IdListaExamen`,`IdTipoExamen`,`IdConsulta`,`IdUsuario`,`IdPersona`),
  KEY `fk_examenOrina_tipoExamen1_idx` (`IdTipoExamen`),
  KEY `fk_examenOrina_persona1_idx` (`IdPersona`),
  KEY `fk_examenOrina_usuario1_idx` (`IdUsuario`),
  KEY `fk_examenOrina_consulta1_idx` (`IdConsulta`),
  KEY `fk_examenOrina_listaExamen_idx` (`IdListaExamen`),
  CONSTRAINT `fk_examenOrina_consulta1` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenOrina_listaExamen1` FOREIGN KEY (`IdListaExamen`) REFERENCES `listaexamen` (`IdListaExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenOrina_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenOrina_tipoExamen1` FOREIGN KEY (`IdTipoExamen`) REFERENCES `tipoexamen` (`IdTipoExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenOrina_usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenorina`
--

LOCK TABLES `examenorina` WRITE;
/*!40000 ALTER TABLE `examenorina` DISABLE KEYS */;
INSERT INTO `examenorina` VALUES (1,3,3,12,9,1,'2016-08-17','1','2','3','4','5','6','7','8','9','10','22','13','6','65','65','65','65','65','EXAMEN ORINA DE FRAN',1);
/*!40000 ALTER TABLE `examenorina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenquimica`
--

DROP TABLE IF EXISTS `examenquimica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examenquimica` (
  `IdExamenQuimica` int(11) NOT NULL AUTO_INCREMENT,
  `IdListaExamen` int(11) NOT NULL,
  `IdTipoExamen` int(11) NOT NULL,
  `IdConsulta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Glucosa` varchar(45) DEFAULT NULL,
  `GlucosaPost` varchar(45) DEFAULT NULL,
  `ColesterolTotal` varchar(45) DEFAULT NULL,
  `Triglicerido` varchar(45) DEFAULT NULL,
  `AcidoUrico` varchar(45) DEFAULT NULL,
  `Creatinina` varchar(45) DEFAULT NULL,
  `NitrogenoUreico` varchar(45) DEFAULT NULL,
  `Urea` varchar(45) DEFAULT NULL,
  `Activo` int(11) NOT NULL,
  PRIMARY KEY (`IdExamenQuimica`,`IdListaExamen`,`IdTipoExamen`,`IdConsulta`,`IdUsuario`,`IdPersona`),
  KEY `fk_examenQuimica_tipoExamen1_idx` (`IdTipoExamen`),
  KEY `fk_examenQuimica_persona1_idx` (`IdPersona`),
  KEY `fk_examenQuimica_usuario1_idx` (`IdUsuario`),
  KEY `fk_examenQuimica_consulta1_idx` (`IdConsulta`),
  KEY `fk_examenQuimica_listaExamen1_idx` (`IdListaExamen`),
  CONSTRAINT `fk_examenQuimica_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenQuimica_tipoExamen1` FOREIGN KEY (`IdTipoExamen`) REFERENCES `tipoexamen` (`IdTipoExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenQuimica_usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `k_examenQuimica_consulta1` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `k_examenQuimica_listaExamen1` FOREIGN KEY (`IdListaExamen`) REFERENCES `listaexamen` (`IdListaExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenquimica`
--

LOCK TABLES `examenquimica` WRITE;
/*!40000 ALTER TABLE `examenquimica` DISABLE KEYS */;
INSERT INTO `examenquimica` VALUES (1,4,4,12,9,1,'2016-08-17','2','3','4','6','5','7','9','8',1);
/*!40000 ALTER TABLE `examenquimica` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factor`
--

LOCK TABLES `factor` WRITE;
/*!40000 ALTER TABLE `factor` DISABLE KEYS */;
/*!40000 ALTER TABLE `factor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `geografia`
--

DROP TABLE IF EXISTS `geografia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geografia` (
  `IdGeografia` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'Es el identificador de la zona geografica ',
  `Nombre` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Indica el nombre de la zona geografica ',
  `IdPadre` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Es el identificador del padre de la zona ',
  `Nivel` int(11) NOT NULL COMMENT 'Indica el nivel de la zona ',
  `Jerarquia` varchar(900) CHARACTER SET utf8 NOT NULL COMMENT 'Indica la jerarquia de la zona ',
  PRIMARY KEY (`IdGeografia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geografia`
--

LOCK TABLES `geografia` WRITE;
/*!40000 ALTER TABLE `geografia` DISABLE KEYS */;
INSERT INTO `geografia` VALUES ('0','Geografia No Definida','NULL',0,'.0.'),('01','AHUACHAPAN','3',1,'.3.01.'),('0101','AHUACHAPAN','01',2,'.3.01.0101.'),('0102','APANECA','01',2,'.3.01.0102.'),('0103','ATIQUIZAYA','01',2,'.3.01.0103.'),('0104','CONCEPCION DE ATACO','01',2,'.3.01.0104.'),('0105','EL REFUGIO','01',2,'.3.01.0105.'),('0106','GUAYMANGO','01',2,'.3.01.0106.'),('0107','JUJUTLA','01',2,'.3.01.0107.'),('0108','SAN FRANCISCO MENENDEZ','01',2,'.3.01.0108.'),('0109','SAN LORENZO','01',2,'.3.01.0109.'),('0110','SAN PEDRO PUXTLA','01',2,'.3.01.0110.'),('0111','TACUBA','01',2,'.3.01.0111.'),('0112','TURIN','01',2,'.3.01.0112.'),('02','SANTA ANA','3',1,'.3.02.'),('0201','SANTA ANA','02',2,'.3.02.0201.'),('0202','CANDELARIA DE LA FRONTERA','02',2,'.3.02.0202.'),('0203','COATEPEQUE','02',2,'.3.02.0203.'),('0204','CHALCHUAPA','02',2,'.3.02.0204.'),('0205','EL CONGO','02',2,'.3.02.0205.'),('0206','EL PORVENIR','02',2,'.3.02.0206.'),('0207','MASAHUAT','02',2,'.3.02.0207.'),('0208','METAPAN','02',2,'.3.02.0208.'),('0209','SAN ANTONIO PAJONAL','02',2,'.3.02.0209.'),('0210','SAN SEBASTIAN SALITRILLO','02',2,'.3.02.0210.'),('0211','SANTA ROSA GUACHIPILIN','02',2,'.3.02.0211.'),('0212','SANTIAGO DE LA FRONTERA','02',2,'.3.02.0212.'),('0213','TEXISTEPEQUE','02',2,'.3.02.0213.'),('03','SONSONATE','3',1,'.3.03.'),('0301','SONSONATE','03',2,'.3.03.0301.'),('0302','ACAJUTLA','03',2,'.3.03.0302.'),('0303','ARMENIA','03',2,'.3.03.0303.'),('0304','CALUCO','03',2,'.3.03.0304.'),('0305','CUISNAHUAT','03',2,'.3.03.0305.'),('0306','IZALCO','03',2,'.3.03.0306.'),('0307','JUAYUA','03',2,'.3.03.0307.'),('0308','NAHUIZALCO','03',2,'.3.03.0308.'),('0309','NAHUILINGO','03',2,'.3.03.0309.'),('0310','SALCOATITAN','03',2,'.3.03.0310.'),('0311','SAN ANTONIO DEL MONTE','03',2,'.3.03.0311.'),('0312','SAN JULIAN','03',2,'.3.03.0312.'),('0313','SANTA CATARINA MASAHUAT','03',2,'.3.03.0313.'),('0314','SANTA ISABEL ISHUATAN','03',2,'.3.03.0314.'),('0315','SANTO DOMINGO DE GUZMAN','03',2,'.3.03.0315.'),('0316','SONZACATE','03',2,'.3.03.0316.'),('04','CHALATENANGO','1',1,'.1.04.'),('0401','CHALATENANGO','04',2,'.1.04.0401.'),('0402','AGUA CALIENTE','04',2,'.1.04.0402.'),('0403','ARCATAO','04',2,'.1.04.0403.'),('0404','AZACUALPA','04',2,'.1.04.0404.'),('0405','CANCASQUE','04',2,'.1.04.0405.'),('0406','CITALA','04',2,'.1.04.0406.'),('0407','COMALAPA','04',2,'.1.04.0407.'),('0408','CONCEPCION QUEZALTEPEQUE','04',2,'.1.04.0408.'),('0409','DULCE NOMBRE DE MARIA','04',2,'.1.04.0409.'),('0410','EL CARRIZAL','04',2,'.1.04.0410.'),('0411','EL PARAISO','04',2,'.1.04.0411.'),('0412','LA LAGUNA','04',2,'.1.04.0412.'),('0413','LA PALMA','04',2,'.1.04.0413.'),('0414','LA REINA','04',2,'.1.04.0414.'),('0415','LAS FLORES','04',2,'.1.04.0415.'),('0416','LAS VUELTAS','04',2,'.1.04.0416.'),('0417','NOMBRE DE JESUS','04',2,'.1.04.0417.'),('0418','NUEVA CONCEPCION','04',2,'.1.04.0418.'),('0419','NUEVA TRINIDAD','04',2,'.1.04.0419.'),('0420','OJOS DE AGUA','04',2,'.1.04.0420.'),('0421','POTONICO','04',2,'.1.04.0421.'),('0422','SAN ANTONIO DE LA CRUZ','04',2,'.1.04.0422.'),('0423','SAN ANTONIO DE LOS RANCHOS','04',2,'.1.04.0423.'),('0424','SAN FERNANDO','04',2,'.1.04.0424.'),('0425','SAN FRANCISCO LEMPA','04',2,'.1.04.0425.'),('0426','SAN FRANCISCO MORAZAN','04',2,'.1.04.0426.'),('0427','SAN IGNACIO','04',2,'.1.04.0427.'),('0428','SAN ISIDRO LABRADOR','04',2,'.1.04.0428.'),('0429','SAN LUIS DEL CARMEN','04',2,'.1.04.0429.'),('0430','SAN MIGUEL DE MERCEDES','04',2,'.1.04.0430.'),('0431','SAN RAFAEL','04',2,'.1.04.0431.'),('0432','SANTA RITA','04',2,'.1.04.0432.'),('0433','TEJUTLA','04',2,'.1.04.0433.'),('05','LA LIBERTAD','1',1,'.1.05.'),('0501','SANTA TECLA','05',2,'.1.05.0501.'),('0502','ANTIGUO CUSCATLAN','05',2,'.1.05.0502.'),('0503','CIUDAD ARCE','05',2,'.1.05.0503.'),('0504','COLON','05',2,'.1.05.0504.'),('0505','COMASAGUA','05',2,'.1.05.0505.'),('0506','CHILTIUPAN','05',2,'.1.05.0506.'),('0507','HUIZUCAR','05',2,'.1.05.0507.'),('0508','JAYAQUE','05',2,'.1.05.0508.'),('0509','JICALAPA','05',2,'.1.05.0509.'),('0510','LA LIBERTAD','05',2,'.1.05.0510.'),('0511','NUEVO CUSCATLAN','05',2,'.1.05.0511.'),('0512','SAN JUAN OPICO','05',2,'.1.05.0512.'),('0513','QUEZALTEPEQUE','05',2,'.1.05.0513.'),('0514','SACACOYO','05',2,'.1.05.0514.'),('0515','SAN JOSE VILLANUEVA','05',2,'.1.05.0515.'),('0516','SAN MATIAS','05',2,'.1.05.0516.'),('0517','SAN PABLO TACACHICO','05',2,'.1.05.0517.'),('0518','TALNIQUE','05',2,'.1.05.0518.'),('0519','TAMANIQUE','05',2,'.1.05.0519.'),('0520','TEOTEPEQUE','05',2,'.1.05.0520.'),('0521','TEPECOYO','05',2,'.1.05.0521.'),('0522','ZARAGOZA','05',2,'.1.05.0522.'),('06','SAN SALVADOR','1',1,'.1.06.'),('0601','SAN SALVADOR','06',2,'.1.06.0601.'),('0602','AGUILARES','06',2,'.1.06.0602.'),('0603','APOPA','06',2,'.1.06.0603.'),('0604','AYUTUXTEPEQUE','06',2,'.1.06.0604.'),('0605','CUSCATANCINGO','06',2,'.1.06.0605.'),('0606','CIUDAD DELGADO','06',2,'.1.06.0606.'),('0607','EL PAISNAL','06',2,'.1.06.0607.'),('0608','GUAZAPA','06',2,'.1.06.0608.'),('0609','ILOPANGO','06',2,'.1.06.0609.'),('0610','MEJICANOS','06',2,'.1.06.0610.'),('0611','NEJAPA','06',2,'.1.06.0611.'),('0612','PANCHIMALCO','06',2,'.1.06.0612.'),('0613','ROSARIO DE MORA','06',2,'.1.06.0613.'),('0614','SAN MARCOS','06',2,'.1.06.0614.'),('0615','SAN MARTIN','06',2,'.1.06.0615.'),('0616','SANTIAGO TEXACUANGOS','06',2,'.1.06.0616.'),('0617','SANTO TOMAS','06',2,'.1.06.0617.'),('0618','SOYAPANGO','06',2,'.1.06.0618.'),('0619','TONACATEPEQUE','06',2,'.1.06.0619.'),('07','CUSCATLAN','4',1,'.4.07.'),('0701','COJUTEPEQUE','07',2,'.4.07.0701.'),('0702','CANDELARIA','07',2,'.4.07.0702.'),('0703','EL CARMEN','07',2,'.4.07.0703.'),('0704','EL ROSARIO','07',2,'.4.07.0704.'),('0705','MONTE SAN JUAN','07',2,'.4.07.0705.'),('0706','ORATORIO DE CONCEPCION','07',2,'.4.07.0706.'),('0707','SAN BARTOLOME PERULAPIA','07',2,'.4.07.0707.'),('0708','SAN CRISTOBAL','07',2,'.4.07.0708.'),('0709','SAN JOSE GUAYABAL','07',2,'.4.07.0709.'),('0710','SAN PEDRO PERULAPAN','07',2,'.4.07.0710.'),('0711','SAN RAFAEL CEDROS','07',2,'.4.07.0711.'),('0712','SAN RAMON','07',2,'.4.07.0712.'),('0713','SANTA CRUZ ANALQUITO','07',2,'.4.07.0713.'),('0714','SANTA CRUZ MICHAPA','07',2,'.4.07.0714.'),('0715','SUCHITOTO','07',2,'.4.07.0715.'),('0716','TENANCINGO','07',2,'.4.07.0716.'),('08','LA PAZ','4',1,'.4.08.'),('0801','ZACATECOLUCA','08',2,'.4.08.0801.'),('0802','CUYULTITAN','08',2,'.4.08.0802.'),('0803','EL ROSARIO','08',2,'.4.08.0803.'),('0804','JERUSALEN','08',2,'.4.08.0804.'),('0805','MERCEDES LA CEIBA','08',2,'.4.08.0805.'),('0806','OLOCUILTA','08',2,'.4.08.0806.'),('0807','PARAISO DE OSORIO','08',2,'.4.08.0807.'),('0808','SAN ANTONIO MASAHUAT','08',2,'.4.08.0808.'),('0809','SAN EMIGDIO','08',2,'.4.08.0809.'),('0810','SAN FRANCISCO CHINAMECA','08',2,'.4.08.0810.'),('0811','SAN JUAN NONUALCO','08',2,'.4.08.0811.'),('0812','SAN JUAN TALPA','08',2,'.4.08.0812.'),('0813','SAN JUAN TEPEZONTES','08',2,'.4.08.0813.'),('0814','SAN LUIS TALPA','08',2,'.4.08.0814.'),('0815','SAN LUIS LA HERRADURA','08',2,'.4.08.0815.'),('0816','SAN MIGUEL TEPEZONTES','08',2,'.4.08.0816.'),('0817','SAN PEDRO MASAHUAT','08',2,'.4.08.0817.'),('0818','SAN PEDRO NONUALCO','08',2,'.4.08.0818.'),('0819','SAN RAFAEL OBRAJUELO','08',2,'.4.08.0819.'),('0820','SANTA MARIA OSTUMA','08',2,'.4.08.0820.'),('0821','SANTIAGO NONUALCO','08',2,'.4.08.0821.'),('0822','TAPALHUACA','08',2,'.4.08.0822.'),('09','CABAÑAS','4',1,'.4.09.'),('0901','SENSUNTEPEQUE','09',2,'.4.09.0901.'),('0902','CINQUERA','09',2,'.4.09.0902.'),('0903','DOLORES','09',2,'.4.09.0903.'),('0904','GUACOTECTI','09',2,'.4.09.0904.'),('0905','ILOBASCO','09',2,'.4.09.0905.'),('0906','JUTIAPA','09',2,'.4.09.0906.'),('0907','SAN ISIDRO','09',2,'.4.09.0907.'),('0908','TEJUTEPEQUE','09',2,'.4.09.0908.'),('0909','VICTORIA','09',2,'.4.09.0909.'),('1','ZONA CENTRAL','NULL',0,'.1.'),('10','SAN VICENTE','4',1,'.4.10.'),('1001','SAN VICENTE','10',2,'.4.10.1001.'),('100101','CALDERAS','1001',3,'.4.10.1001.100101.'),('100102','EL GUAYABO','1001',3,'.4.10.1001.100102.'),('100103','LAS MINAS','1001',3,'.4.10.1001.100103.'),('100104','SAN FELIPE','1001',3,'.4.10.1001.100104.'),('100105','SAN JACINTO','1001',3,'.4.10.1001.100105.'),('100106','SAN JUAN DE MERINO','1001',3,'.4.10.1001.100106.'),('100107','SAN NICOLAS','1001',3,'.4.10.1001.100107.'),('100108','SAN PEDRO','1001',3,'.4.10.1001.100108.'),('100109','CUTUMAYO','1001',3,'.4.10.1001.100109.'),('100110','SAN JOSE ALMENDROS','1001',3,'.4.10.1001.100110.'),('1002','APASTEPEQUE','10',2,'.4.10.1002.'),('100201','GUADALUPE','1002',3,'.4.10.1002.100201.'),('100202','JOYA DE MUNGUIA','1002',3,'.4.10.1002.100202.'),('100203','SAN JOSE CARBONERA','1002',3,'.4.10.1002.100203.'),('100204','SAN FRANCISCO AGUA AGRIA','1002',3,'.4.10.1002.100204.'),('100205','SAN ANTONIO LOS RANCHOS','1002',3,'.4.10.1002.100205.'),('100206','SAN BENITO PIEDRA GORDA','1002',3,'.4.10.1002.100206.'),('100207','SAN EMIGDIO EL TABLON','1002',3,'.4.10.1002.100207.'),('1003','GUADALUPE','10',2,'.4.10.1003.'),('100301','CANDELARIA','1003',3,'.4.10.1003.100301.'),('100302','SAN JOSE CERRO GRANDE','1003',3,'.4.10.1003.100302.'),('1004','SAN CAYETANO ISTEPEQUE','10',2,'.4.10.1004.'),('100401','AGUA HELADA','1004',3,'.4.10.1004.100401.'),('100402','EL ROSARIO','1004',3,'.4.10.1004.100402.'),('100403','SAN JERONIMO','1004',3,'.4.10.1004.100403.'),('100404','SANTA ROSA','1004',3,'.4.10.1004.100404.'),('100405','EL TORTUGUERO','1004',3,'.4.10.1004.100405.'),('100406','SAN JUAN DE MERINOS','1004',3,'.4.10.1004.100406.'),('1005','SAN ESTEBAN CATARINA','10',2,'.4.10.1005.'),('100501','EL REFUGIO','1005',3,'.4.10.1005.100501.'),('100502','LOS RODRIGUEZ','1005',3,'.4.10.1005.100502.'),('100503','TALPETATES','1005',3,'.4.10.1005.100503.'),('100504','SAN ANTONIO IZCANALEZ','1005',3,'.4.10.1005.100504.'),('1006','SAN ILDEFONSO','10',2,'.4.10.1006.'),('100601','AMATITAN ABAJO','1006',3,'.4.10.1006.100601.'),('100602','AMATITAN ARRIBA','1006',3,'.4.10.1006.100602.'),('100603','SAN ESTEBAN','1006',3,'.4.10.1006.100603.'),('100604','SANTA CATARINA','1006',3,'.4.10.1006.100604.'),('100605','SAN ILDEFONSO','1006',3,'.4.10.1006.100605.'),('100606','SAN JACINTO LA BURRERA','1006',3,'.4.10.1006.100606.'),('1007','SAN LORENZO','10',2,'.4.10.1007.'),('100701','CANDELARIA LEMPA','1007',3,'.4.10.1007.100701.'),('100702','GUACHIPILIN','1007',3,'.4.10.1007.100702.'),('100703','LAJAS Y CANOAS','1007',3,'.4.10.1007.100703.'),('100704','SAN FRANCISCO','1007',3,'.4.10.1007.100704.'),('100705','SAN LORENZO','1007',3,'.4.10.1007.100705.'),('100706','SAN PABLO CAÑALES','1007',3,'.4.10.1007.100706.'),('1008','SAN SEBASTIAN','10',2,'.4.10.1008.'),('100801','LA CRUZ','1008',3,'.4.10.1008.100801.'),('100802','LAS ANIMAS','1008',3,'.4.10.1008.100802.'),('100803','SAN FRANCISCO','1008',3,'.4.10.1008.100803.'),('100804','SANTA LUCIA','1008',3,'.4.10.1008.100804.'),('1009','SANTA CLARA','10',2,'.4.10.1009.'),('100901','EL PARAISO','1009',3,'.4.10.1009.100901.'),('100902','EL PORVENIR AGUACAYO','1009',3,'.4.10.1009.100902.'),('100903','LA ESPERANZA','1009',3,'.4.10.1009.100903.'),('100904','LA LABOR','1009',3,'.4.10.1009.100904.'),('100905','LAS ROSAS','1009',3,'.4.10.1009.100905.'),('100906','LOS LAURELES','1009',3,'.4.10.1009.100906.'),('100907','SAN FRANCISCO','1009',3,'.4.10.1009.100907.'),('100908','SANTA ELENA','1009',3,'.4.10.1009.100908.'),('100909','SANTA TERESA','1009',3,'.4.10.1009.100909.'),('1010','SANTO DOMINGO','10',2,'.4.10.1010.'),('101001','CANTON LAS FLORES','1010',3,'.4.10.1010.101001.'),('101002','CHUCUYO','1010',3,'.4.10.1010.101002.'),('101003','DOS QUEBRADAS','1010',3,'.4.10.1010.101003.'),('101004','EL MARQUEZADO','1010',3,'.4.10.1010.101004.'),('101005','EL REBELDE','1010',3,'.4.10.1010.101005.'),('101006','LA JOYA','1010',3,'.4.10.1010.101006.'),('101007','LA SOLEDAD','1010',3,'.4.10.1010.101007.'),('101008','LOS LAURELES','1010',3,'.4.10.1010.101008.'),('101009','LOS POZOS','1010',3,'.4.10.1010.101009.'),('101010','OBRAJUELO LEMPA','1010',3,'.4.10.1010.101010.'),('101011','PARRAS LEMPA','1010',3,'.4.10.1010.101011.'),('101012','SAN ANTONIO CAMINOS','1010',3,'.4.10.1010.101012.'),('101013','SAN DIEGO','1010',3,'.4.10.1010.101013.'),('101014','SAN JACINTO','1010',3,'.4.10.1010.101014.'),('101015','SAN JOSE RIO FRIO','1010',3,'.4.10.1010.101015.'),('101016','SANTA GERTRUDIS','1010',3,'.4.10.1010.101016.'),('101017','LLANOS DE ACHICHILCO','1010',3,'.4.10.1010.101017.'),('101018','SAN JUAN BUENAVISTA','1010',3,'.4.10.1010.101018.'),('101019','SAN ANTONIO ACHICHILCO','1010',3,'.4.10.1010.101019.'),('101020','SAN ANTONIO TRA','1010',3,'.4.10.1010.101020.'),('101021','SAN BARTOLO ICHANMICO','1010',3,'.4.10.1010.101021.'),('101022','SAN FRANCISCO CHAMOCO','1010',3,'.4.10.1010.101022.'),('1011','TECOLUCA','10',2,'.4.10.1011.'),('101101','EL ARCO','1011',3,'.4.10.1011.101101.'),('101102','EL CAMPANARIO','1011',3,'.4.10.1011.101102.'),('101103','EL CARAO','1011',3,'.4.10.1011.101103.'),('101104','EL COYOLITO','1011',3,'.4.10.1011.101104.'),('101105','EL PACUN','1011',3,'.4.10.1011.101105.'),('101106','EL PALOMAR','1011',3,'.4.10.1011.101106.'),('101107','EL PERICAL','1011',3,'.4.10.1011.101107.'),('101108','EL PUENTE','1011',3,'.4.10.1011.101108.'),('101109','EL SOCORRO','1011',3,'.4.10.1011.101109.'),('101110','LA ESPERANZA','1011',3,'.4.10.1011.101110.'),('101111','LAS ANONAS','1011',3,'.4.10.1011.101111.'),('101112','LAS MESAS','1011',3,'.4.10.1011.101112.'),('101113','SAN JOSE LLANO GRANDE','1011',3,'.4.10.1011.101113.'),('101114','SAN ANTONIO ACH','1011',3,'.4.10.1011.101114.'),('101115','SAN BENITO','1011',3,'.4.10.1011.101115.'),('101116','SAN CARLOS','1011',3,'.4.10.1011.101116.'),('101117','SAN FRANCISCO ANGULO','1011',3,'.4.10.1011.101117.'),('101118','SAN FERNANDO','1011',3,'.4.10.1011.101118.'),('101119','SAN NICOLAS LEMPA','1011',3,'.4.10.1011.101119.'),('101120','SAN RAMON GRIFAL','1011',3,'.4.10.1011.101120.'),('101121','SANTA BARBARA','1011',3,'.4.10.1011.101121.'),('101122','SANTA CRUZ','1011',3,'.4.10.1011.101122.'),('101123','LAS PAMPAS','1011',3,'.4.10.1011.101123.'),('101124','SANTA CRUZ PORRILLO','1011',3,'.4.10.1011.101124.'),('101125','EL PORTILLO','1011',3,'.4.10.1011.101125.'),('101126','SAN ANDRES ACHI','1011',3,'.4.10.1011.101126.'),('101127','BARRIO NUEVO','1011',3,'.4.10.1011.101127.'),('101128','SANTA MARTA','1011',3,'.4.10.1011.101128.'),('1012','TEPETITAN','10',2,'.4.10.1012.'),('101201','LA VIRGEN','1012',3,'.4.10.1012.101201.'),('101202','LOMA ALTA','1012',3,'.4.10.1012.101202.'),('101203','CONCEPCION DE CAÑAS','1012',3,'.4.10.1012.101203.'),('1013','VERAPAZ','10',2,'.4.10.1013.'),('101301','EL CARMEN','1013',3,'.4.10.1013.101301.'),('101302','MOLINEROS','1013',3,'.4.10.1013.101302.'),('101303','SAN ANTONIO JIBOA','1013',3,'.4.10.1013.101303.'),('101304','SAN ISIDRO','1013',3,'.4.10.1013.101304.'),('101305','SAN JERONIMO LIMON','1013',3,'.4.10.1013.101305.'),('101306','SAN JOSE BORJA','1013',3,'.4.10.1013.101306.'),('101307','SAN JUAN BUENAVISTA','1013',3,'.4.10.1013.101307.'),('101308','SAN PEDRO AGUA CALIENTE','1013',3,'.4.10.1013.101308.'),('11','USULUTAN','2',1,'.2.11.'),('1101','USULUTAN','11',2,'.2.11.1101.'),('110101','ZAPOTILLO','1101',3,'.2.11.1101.110101.'),('110102','APASTEPEQUE','1101',3,'.2.11.1101.110102.'),('110103','LAS CASITAS','1101',3,'.2.11.1101.110103.'),('110104','LA PEÑA','1101',3,'.2.11.1101.110104.'),('110105','MONTAÑITA','1101',3,'.2.11.1101.110105.'),('110106','QUEBRACHO','1101',3,'.2.11.1101.110106.'),('110107','SAN JUAN','1101',3,'.2.11.1101.110107.'),('110108','YOMO','1101',3,'.2.11.1101.110108.'),('1102','ALEGRIA','11',2,'.2.11.1102.'),('110201','COLON','1102',3,'.2.11.1102.110201.'),('110202','CONCEPCION','1102',3,'.2.11.1102.110202.'),('110203','EL COROZAL','1102',3,'.2.11.1102.110203.'),('110204','EL TABLON','1102',3,'.2.11.1102.110204.'),('110205','LA UNION','1102',3,'.2.11.1102.110205.'),('110206','LAS DELICIAS','1102',3,'.2.11.1102.110206.'),('110207','LAS PILETAS','1102',3,'.2.11.1102.110207.'),('110208','LOS TALPETATES','1102',3,'.2.11.1102.110208.'),('110209','SAN FELIPE','1102',3,'.2.11.1102.110209.'),('110210','SAN FRANCISCO','1102',3,'.2.11.1102.110210.'),('110211','SAN ISIDRO','1102',3,'.2.11.1102.110211.'),('110212','SAN JOSE','1102',3,'.2.11.1102.110212.'),('110213','SAN JUAN LOMA ALTA','1102',3,'.2.11.1102.110213.'),('110214','SAN LORENZO','1102',3,'.2.11.1102.110214.'),('110215','SANTA CRUZ','1102',3,'.2.11.1102.110215.'),('110216','VIRGINIA','1102',3,'.2.11.1102.110216.'),('1103','BERLIN','11',2,'.2.11.1103.'),('110301','EL POZON','1103',3,'.2.11.1103.110301.'),('1104','CALIFORNIA','11',2,'.2.11.1104.'),('110401','EL PARAISAL','1104',3,'.2.11.1104.110401.'),('110402','HACIENDA NUEVA','1104',3,'.2.11.1104.110402.'),('110403','LA ANCHILA','1104',3,'.2.11.1104.110403.'),('110404','LA DANTA','1104',3,'.2.11.1104.110404.'),('110405','SAN ANTONIO','1104',3,'.2.11.1104.110405.'),('110406','SAN FELIPE','1104',3,'.2.11.1104.110406.'),('110407','SAN ILDEFONSO','1104',3,'.2.11.1104.110407.'),('110408','EL CAÑAL','1104',3,'.2.11.1104.110408.'),('110409','EL PORVENIR','1104',3,'.2.11.1104.110409.'),('1105','CONCEPCION BATRES','11',2,'.2.11.1105.'),('110501','EL PALON','1105',3,'.2.11.1105.110501.'),('110502','EL JICARITO','1105',3,'.2.11.1105.110502.'),('110503','SAN ANTONIO','1105',3,'.2.11.1105.110503.'),('110504','LA PALMERA','1105',3,'.2.11.1105.110504.'),('110505','LOS NOVILLOS','1105',3,'.2.11.1105.110505.'),('1106','EL TRIUNFO','11',2,'.2.11.1106.'),('110601','ANALCO','1106',3,'.2.11.1106.110601.'),('110602','LA CEIBA','1106',3,'.2.11.1106.110602.'),('110603','LOS ENCUENTROS','1106',3,'.2.11.1106.110603.'),('110604','MACULIS','1106',3,'.2.11.1106.110604.'),('1107','EREGUAYQUIN','11',2,'.2.11.1107.'),('110701','CONDADILLO','1107',3,'.2.11.1107.110701.'),('110702','ESCARBADERO','1107',3,'.2.11.1107.110702.'),('110703','LA CRUZ','1107',3,'.2.11.1107.110703.'),('110704','PUENTE CUSCATLAN','1107',3,'.2.11.1107.110704.'),('110705','SAN PEDRO','1107',3,'.2.11.1107.110705.'),('110706','EL CARAGUAL','1107',3,'.2.11.1107.110706.'),('110707','EL OJUSHTE','1107',3,'.2.11.1107.110707.'),('110708','EL TECOMATAL','1107',3,'.2.11.1107.110708.'),('110709','POTRERO DE JOCO','1107',3,'.2.11.1107.110709.'),('110710','SITIO SAN ANTONIO','1107',3,'.2.11.1107.110710.'),('1108','ESTANZUELAS','11',2,'.2.11.1108.'),('110801','AGUACAYO','1108',3,'.2.11.1108.110801.'),('110802','BOLIVAR','1108',3,'.2.11.1108.110802.'),('110803','CABOS NEGROS','1108',3,'.2.11.1108.110803.'),('110804','CALIFORNIA','1108',3,'.2.11.1108.110804.'),('110805','CEIBA GACHA','1108',3,'.2.11.1108.110805.'),('110806','CRUZADILLA DE SAN JUAN','1108',3,'.2.11.1108.110806.'),('110807','EL CARMEN','1108',3,'.2.11.1108.110807.'),('110808','EL COYOLITO','1108',3,'.2.11.1108.110808.'),('110809','EL PARAISO','1108',3,'.2.11.1108.110809.'),('110810','HULE CHACHO','1108',3,'.2.11.1108.110810.'),('110811','LA CANOA','1108',3,'.2.11.1108.110811.'),('110812','LA CONCORDIA','1108',3,'.2.11.1108.110812.'),('110813','LA TIRANA','1108',3,'.2.11.1108.110813.'),('110814','LAS FLORES','1108',3,'.2.11.1108.110814.'),('110815','LOS CAMPOS','1108',3,'.2.11.1108.110815.'),('110816','LOS LIMONES','1108',3,'.2.11.1108.110816.'),('110817','NUEVA CALIFORNIA','1108',3,'.2.11.1108.110817.'),('110818','PUERTO LOS AVALOS','1108',3,'.2.11.1108.110818.'),('110819','ROQUINTE','1108',3,'.2.11.1108.110819.'),('110820','SALINAS DE SISIGUAYO','1108',3,'.2.11.1108.110820.'),('110821','SAN JOSE','1108',3,'.2.11.1108.110821.'),('110822','SAN JUAN DE LETRAN','1108',3,'.2.11.1108.110822.'),('110823','SAN JUAN DEL GOZO','1108',3,'.2.11.1108.110823.'),('110824','SAN JUDAS','1108',3,'.2.11.1108.110824.'),('110825','SAN MARCOS LEMPA','1108',3,'.2.11.1108.110825.'),('110826','SAN PEDRO','1108',3,'.2.11.1108.110826.'),('110827','TABURETE JAGUAL','1108',3,'.2.11.1108.110827.'),('110828','TIERRA BLANCA','1108',3,'.2.11.1108.110828.'),('110829','CARRIZAL','1108',3,'.2.11.1108.110829.'),('110830','EL CASTAÑO','1108',3,'.2.11.1108.110830.'),('110831','ISLA MENDEZ','1108',3,'.2.11.1108.110831.'),('110832','LA NORIA','1108',3,'.2.11.1108.110832.'),('110833','LAS ESPERANZA','1108',3,'.2.11.1108.110833.'),('110834','EL MARILLO','1108',3,'.2.11.1108.110834.'),('110835','SALINAS EL POTRERO','1108',3,'.2.11.1108.110835.'),('110836','ZAMORAN','1108',3,'.2.11.1108.110836.'),('110837','MONTECRISTO','1108',3,'.2.11.1108.110837.'),('110838','TABURETE LOS CLAROS','1108',3,'.2.11.1108.110838.'),('110839','SAN ANTONIO POTRERIO','1108',3,'.2.11.1108.110839.'),('1109','JIQUILISCO','11',2,'.2.11.1109.'),('110901','EL AMATON','1109',3,'.2.11.1109.110901.'),('110902','EL CHAGUITE','1109',3,'.2.11.1109.110902.'),('110903','EL NISPERO','1109',3,'.2.11.1109.110903.'),('110904','LLANO DE CHILAM','1109',3,'.2.11.1109.110904.'),('110905','LOMA DE LA CRUZ','1109',3,'.2.11.1109.110905.'),('110906','TEPESQUILLO ALTO','1109',3,'.2.11.1109.110906.'),('110907','TEPESQUILLO BAJO','1109',3,'.2.11.1109.110907.'),('110908','LLANO EL CHILAMATE','1109',3,'.2.11.1109.110908.'),('110909','LLANO GRANDE DE JUCUAPA','1109',3,'.2.11.1109.110909.'),('110910','SANTA CRUZ','1109',3,'.2.11.1109.110910.'),('1110','JUCUAPA','11',2,'.2.11.1110.'),('111001','EL JICARO','1110',3,'.2.11.1110.111001.'),('111002','EL JUTAL','1110',3,'.2.11.1110.111002.'),('111003','EL LLANO','1110',3,'.2.11.1110.111003.'),('111004','EL PROGRESO','1110',3,'.2.11.1110.111004.'),('111005','EL ZAPOTE','1110',3,'.2.11.1110.111005.'),('111006','LA CRUZ','1110',3,'.2.11.1110.111006.'),('111007','SAMURIA','1110',3,'.2.11.1110.111007.'),('1111','JUCUARAN','11',2,'.2.11.1111.'),('111101','EL CAULOTE','1111',3,'.2.11.1111.111101.'),('111102','EL JICARO','1111',3,'.2.11.1111.111102.'),('111103','EL JOCOTILLO','1111',3,'.2.11.1111.111103.'),('111104','LA PUERTA','1111',3,'.2.11.1111.111104.'),('111105','LOS HORCONES','1111',3,'.2.11.1111.111105.'),('111106','LOS TALNETES','1111',3,'.2.11.1111.111106.'),('111107','SAN BENITO','1111',3,'.2.11.1111.111107.'),('111108','SANTA ANITA','1111',3,'.2.11.1111.111108.'),('111109','LA MONTAÑITA','1111',3,'.2.11.1111.111109.'),('1112','MERCEDES UMAÑA','11',2,'.2.11.1112.'),('111201','AZACUALPIA DE GUALCHO','1112',3,'.2.11.1112.111201.'),('111202','AZACUALPIA DE JOCO','1112',3,'.2.11.1112.111202.'),('111203','EL AMATILLO','1112',3,'.2.11.1112.111203.'),('111204','JOCOMONTIQUE','1112',3,'.2.11.1112.111204.'),('111205','LA ISLETA','1112',3,'.2.11.1112.111205.'),('111206','LAS LLAVES','1112',3,'.2.11.1112.111206.'),('111207','LA PALOMILLA','1112',3,'.2.11.1112.111207.'),('111208','LEPAZ','1112',3,'.2.11.1112.111208.'),('111209','NUEVO CARRIZAL','1112',3,'.2.11.1112.111209.'),('111210','POTRERO DE JOCO','1112',3,'.2.11.1112.111210.'),('111211','SAN JOSE','1112',3,'.2.11.1112.111211.'),('111212','LOS TALNETES','1112',3,'.2.11.1112.111212.'),('1113','NUEVA GRANADA','11',2,'.2.11.1113.'),('111301','EL DELIRIO','1113',3,'.2.11.1113.111301.'),('111302','EL PALMITAL','1113',3,'.2.11.1113.111302.'),('111303','JOYA DEL PILAR','1113',3,'.2.11.1113.111303.'),('111304','LA POZA','1113',3,'.2.11.1113.111304.'),('111305','LAS TRANCAS','1113',3,'.2.11.1113.111305.'),('111306','LA BREÑA','1113',3,'.2.11.1113.111306.'),('1114','OZATLAN','11',2,'.2.11.1114.'),('111401','CORRAL DE MULAS','1114',3,'.2.11.1114.111401.'),('111402','EL ESPIRITU SANTO','1114',3,'.2.11.1114.111402.'),('111403','MADRE SAL','1114',3,'.2.11.1114.111403.'),('111404','SITIO DE SANTA LUCIA','1114',3,'.2.11.1114.111404.'),('1115','PUERTO EL TRIUNFO','11',2,'.2.11.1115.'),('111501','BUENOS AIRES','1115',3,'.2.11.1115.111501.'),('111502','EL COROZO','1115',3,'.2.11.1115.111502.'),('111503','EL JICARO','1115',3,'.2.11.1115.111503.'),('111504','EL JOCOTE','1115',3,'.2.11.1115.111504.'),('111505','EL RODEO','1115',3,'.2.11.1115.111505.'),('111506','EL ZAPOTE','1115',3,'.2.11.1115.111506.'),('111507','GALINGAGUA','1115',3,'.2.11.1115.111507.'),('111508','LA MORA','1115',3,'.2.11.1115.111508.'),('111509','LA QUESERA','1115',3,'.2.11.1115.111509.'),('111510','LINARES','1115',3,'.2.11.1115.111510.'),('111511','LOS EUCALIPTOS','1115',3,'.2.11.1115.111511.'),('111512','LOS PLANES','1115',3,'.2.11.1115.111512.'),('111513','NOMBRE DE DIOS','1115',3,'.2.11.1115.111513.'),('111514','TRES CALLES','1115',3,'.2.11.1115.111514.'),('111515','LOS ARROZALES','1115',3,'.2.11.1115.111515.'),('111516','JOBAL ARROZALES','1115',3,'.2.11.1115.111516.'),('111517','LA CEIBA','1115',3,'.2.11.1115.111517.'),('111518','LINARES CAULOTA','1115',3,'.2.11.1115.111518.'),('1116','SAN AGUSTIN','11',2,'.2.11.1116.'),('111601','EL ACEITUNO','1116',3,'.2.11.1116.111601.'),('111602','EL SEMILLERO','1116',3,'.2.11.1116.111602.'),('111603','LA CARIDAD','1116',3,'.2.11.1116.111603.'),('111604','LA TRONCONADA','1116',3,'.2.11.1116.111604.'),('111605','LOS CHARCOS','1116',3,'.2.11.1116.111605.'),('111606','LOS ESPINOS','1116',3,'.2.11.1116.111606.'),('111607','LAS CHARCAS','1116',3,'.2.11.1116.111607.'),('1117','SAN BUENAVENTURA','11',2,'.2.11.1117.'),('111701','IGLESIA VIEJA','1117',3,'.2.11.1117.111701.'),('111702','MUNDO NUEVO','1117',3,'.2.11.1117.111702.'),('111703','SAN FRANCISCO','1117',3,'.2.11.1117.111703.'),('111704','LOS SALINAS','1117',3,'.2.11.1117.111704.'),('1118','SAN DIONISIO','11',2,'.2.11.1118.'),('111801','CERRO EL NANZAL','1118',3,'.2.11.1118.111801.'),('111802','EL REBALSE','1118',3,'.2.11.1118.111802.'),('111803','EL VOLCAN','1118',3,'.2.11.1118.111803.'),('111804','JOYA ANCHA ABAJO','1118',3,'.2.11.1118.111804.'),('111805','JOYA ANCHA ARRIBA','1118',3,'.2.11.1118.111805.'),('111806','LAS CRUCES','1118',3,'.2.11.1118.111806.'),('111807','EL NISPERAL','1118',3,'.2.11.1118.111807.'),('111808','EL AMATE','1118',3,'.2.11.1118.111808.'),('111809','PIEDRA AGUA','1118',3,'.2.11.1118.111809.'),('1119','SAN FRANCISCO JAVIER','11',2,'.2.11.1119.'),('111901','EL PALMO','1119',3,'.2.11.1119.111901.'),('111902','EL TABLON','1119',3,'.2.11.1119.111902.'),('111903','EL ZUNGANO','1119',3,'.2.11.1119.111903.'),('111904','LOS HORCONES','1119',3,'.2.11.1119.111904.'),('111905','LOS HORNOS','1119',3,'.2.11.1119.111905.'),('111906','LOS RIOS','1119',3,'.2.11.1119.111906.'),('111907','JOBAL HORNOS','1119',3,'.2.11.1119.111907.'),('111908','LA CRUZ','1119',3,'.2.11.1119.111908.'),('111909','LA PEÑA','1119',3,'.2.11.1119.111909.'),('1120','SANTA ELENA','11',2,'.2.11.1120.'),('112001','MEJICAPA','1120',3,'.2.11.1120.112001.'),('112002','SAN FRANCISCO','1120',3,'.2.11.1120.112002.'),('1121','SANTA MARIA','11',2,'.2.11.1121.'),('112101','BATRES','1121',3,'.2.11.1121.112101.'),('112102','CERRO VERDE','1121',3,'.2.11.1121.112102.'),('112103','EL TIGRE','1121',3,'.2.11.1121.112103.'),('112104','LAS FLORES','1121',3,'.2.11.1121.112104.'),('112105','LAS PLAYAS','1121',3,'.2.11.1121.112105.'),('112106','MEJICANOS','1121',3,'.2.11.1121.112106.'),('112107','EL MARQUEZADO','1121',3,'.2.11.1121.112107.'),('112108','LOMAS DE LOS GONZALEZ','1121',3,'.2.11.1121.112108.'),('1122','SANTIAGO DE MARIA','11',2,'.2.11.1122.'),('112201','CERRO VERDE','1122',3,'.2.11.1122.112201.'),('112202','EL JICARO','1122',3,'.2.11.1122.112202.'),('112203','LOS CHAPETONES','1122',3,'.2.11.1122.112203.'),('112204','LOS HORCONES','1122',3,'.2.11.1122.112204.'),('112205','PASO DE GUALACHE','1122',3,'.2.11.1122.112205.'),('1123','TECAPAN','11',2,'.2.11.1123.'),('112301','BUENA VISTA','1123',3,'.2.11.1123.112301.'),('112302','EL CERRITO','1123',3,'.2.11.1123.112302.'),('112303','EL TRILLO','1123',3,'.2.11.1123.112303.'),('112304','LA JOYA DE TOMASICO','1123',3,'.2.11.1123.112304.'),('112305','LA LAGUNA','1123',3,'.2.11.1123.112305.'),('112306','LA PRESA','1123',3,'.2.11.1123.112306.'),('112307','LAS SALINAS','1123',3,'.2.11.1123.112307.'),('112308','EL OBRAJUELO','1123',3,'.2.11.1123.112308.'),('112309','PALO GALAN','1123',3,'.2.11.1123.112309.'),('112310','SANTA BARBARA','1123',3,'.2.11.1123.112310.'),('112311','TALPETATE','1123',3,'.2.11.1123.112311.'),('112312','EL OJUSTE','1123',3,'.2.11.1123.112312.'),('112313','LA PEÑA','1123',3,'.2.11.1123.112313.'),('112314','OJO DE AGUA','1123',3,'.2.11.1123.112314.'),('112315','HACIENDA LA CARRERA','1123',3,'.2.11.1123.112315.'),('112316','PUERTO PARADA','1123',3,'.2.11.1123.112316.'),('112317','OBRAJUELO','1123',3,'.2.11.1123.112317.'),('112318','LAZO','1123',3,'.2.11.1123.112318.'),('112319','LAS CONCHAS','1123',3,'.2.11.1123.112319.'),('12','SAN MIGUEL','2',1,'.2.12.'),('1201','SAN MIGUEL','12',2,'.2.12.1201.'),('120101','LA CEIBITA','1201',3,'.2.12.1201.120101.'),('120102','LA ORILLA','1201',3,'.2.12.1201.120102.'),('120103','MIRACAPA','1201',3,'.2.12.1201.120103.'),('120104','ROSAS NACASPILO','1201',3,'.2.12.1201.120104.'),('120105','SOLEDAD TERRERO','1201',3,'.2.12.1201.120105.'),('1202','CAROLINA','12',2,'.2.12.1202.'),('120201','BELEN','1202',3,'.2.12.1202.120201.'),('120202','LLANO EL ANGEL','1202',3,'.2.12.1202.120202.'),('120203','NUEVO PORVENIR','1202',3,'.2.12.1202.120203.'),('120204','SAN CRISTOBAL','1202',3,'.2.12.1202.120204.'),('120205','SAN JUAN','1202',3,'.2.12.1202.120205.'),('120206','SAN LUISITO','1202',3,'.2.12.1202.120206.'),('120207','SAN MATIAS','1202',3,'.2.12.1202.120207.'),('120208','TEPONAHUASTE','1202',3,'.2.12.1202.120208.'),('120209','GUANASTE','1202',3,'.2.12.1202.120209.'),('120210','LAS TORRECILLAS','1202',3,'.2.12.1202.120210.'),('120211','LA MONTAÑITA','1202',3,'.2.12.1202.120211.'),('1203','CIUDAD BARRIOS','12',2,'.2.12.1203.'),('120301','CANDELARIA','1203',3,'.2.12.1203.120301.'),('120302','EL COLORADO','1203',3,'.2.12.1203.120302.'),('120303','PLATANARILLO','1203',3,'.2.12.1203.120303.'),('120304','EL HORMIGUERO','1203',3,'.2.12.1203.120304.'),('120305','EL JICARAL','1203',3,'.2.12.1203.120305.'),('1204','COMACARAN','12',2,'.2.12.1204.'),('120401','CERCAS DE PIEDRA','1204',3,'.2.12.1204.120401.'),('120402','LA TRINIDAD','1204',3,'.2.12.1204.120402.'),('120403','LOS AMATES','1204',3,'.2.12.1204.120403.'),('120404','SAN JERONIMO','1204',3,'.2.12.1204.120404.'),('120405','SAN PEDRO','1204',3,'.2.12.1204.120405.'),('120406','CUALAMA','1204',3,'.2.12.1204.120406.'),('1205','CHAPELTIQUE','12',2,'.2.12.1205.'),('120501','BOQUERON','1205',3,'.2.12.1205.120501.'),('120502','CHAMBALA','1205',3,'.2.12.1205.120502.'),('120503','CONACASTAL','1205',3,'.2.12.1205.120503.'),('120504','COPINOL PRIMERO','1205',3,'.2.12.1205.120504.'),('120505','COPINOL SEGUNDO','1205',3,'.2.12.1205.120505.'),('120506','JOCOTE DULCE','1205',3,'.2.12.1205.120506.'),('120507','LA CRUZ PRIMERA','1205',3,'.2.12.1205.120507.'),('120508','LA CRUZ SEGUNDA','1205',3,'.2.12.1205.120508.'),('120509','LAS MARIAS','1205',3,'.2.12.1205.120509.'),('120510','LAS MESAS','1205',3,'.2.12.1205.120510.'),('120511','LOS PLANES PRIMERO','1205',3,'.2.12.1205.120511.'),('120512','LOS PLANES SEGUNDO','1205',3,'.2.12.1205.120512.'),('120513','LOS PLANES TERCERO','1205',3,'.2.12.1205.120513.'),('120514','OJO DE AGUA','1205',3,'.2.12.1205.120514.'),('120515','OROMONTIQUE','1205',3,'.2.12.1205.120515.'),('120516','SAN ANTONIO','1205',3,'.2.12.1205.120516.'),('120517','ZARAGOZA','1205',3,'.2.12.1205.120517.'),('120518','EL JOCOTE SAN ISIDRO','1205',3,'.2.12.1205.120518.'),('120519','LA PEÑA','1205',3,'.2.12.1205.120519.'),('120520','SAN PEDRO ARENALES','1205',3,'.2.12.1205.120520.'),('1206','CHINAMECA','12',2,'.2.12.1206.'),('120601','CHILANGUERA','1206',3,'.2.12.1206.120601.'),('120602','EL CAPULIN','1206',3,'.2.12.1206.120602.'),('120603','GUADALUPE','1206',3,'.2.12.1206.120603.'),('120604','HOJA DE SAL','1206',3,'.2.12.1206.120604.'),('120605','LA ESTRECHURA','1206',3,'.2.12.1206.120605.'),('120606','NUEVA CONCEPCION','1206',3,'.2.12.1206.120606.'),('120607','SAN JOSE GUALOSO','1206',3,'.2.12.1206.120607.'),('120608','SAN PEDRO','1206',3,'.2.12.1206.120608.'),('120609','TIERRA BLANCA','1206',3,'.2.12.1206.120609.'),('120610','LLANO DE LAS ROSAS','1206',3,'.2.12.1206.120610.'),('120611','SAN RAMON','1206',3,'.2.12.1206.120611.'),('120613','EL CUCO','1206',3,'.2.12.1206.120613.'),('1207','CHIRILAGUA','12',2,'.2.12.1207.'),('120701','CALLE NUEVA','1207',3,'.2.12.1207.120701.'),('120702','LLANO DEL COYOL','1207',3,'.2.12.1207.120702.'),('120703','MOROPALA','1207',3,'.2.12.1207.120703.'),('120704','PRIMAVERA','1207',3,'.2.12.1207.120704.'),('120705','EL BORBOLLON','1207',3,'.2.12.1207.120705.'),('1208','EL TRANSITO','12',2,'.2.12.1208.'),('120801','AMAYA','1208',3,'.2.12.1208.120801.'),('120802','CONCEPCION','1208',3,'.2.12.1208.120802.'),('120803','EL JICARO','1208',3,'.2.12.1208.120803.'),('120804','EL NANCITO','1208',3,'.2.12.1208.120804.'),('120805','EL PALON','1208',3,'.2.12.1208.120805.'),('120806','LAS VENTAS','1208',3,'.2.12.1208.120806.'),('120807','SAN FRANCISCO','1208',3,'.2.12.1208.120807.'),('120808','SANTA BARBARA','1208',3,'.2.12.1208.120808.'),('120809','VALENCIA','1208',3,'.2.12.1208.120809.'),('1209','LOLOTIQUE','12',2,'.2.12.1209.'),('120901','EL CERRO','1209',3,'.2.12.1209.120901.'),('120902','EL JOBO','1209',3,'.2.12.1209.120902.'),('120903','EL PAPALON','1209',3,'.2.12.1209.120903.'),('120904','EL PLATANAR','1209',3,'.2.12.1209.120904.'),('120905','EL RODEO','1209',3,'.2.12.1209.120905.'),('120906','SALAMAR','1209',3,'.2.12.1209.120906.'),('120907','LA ESTANCIA','1209',3,'.2.12.1209.120907.'),('120908','LA FRAGUA','1209',3,'.2.12.1209.120908.'),('120909','LOS EJIDOS','1209',3,'.2.12.1209.120909.'),('120910','SANTA BARBARA','1209',3,'.2.12.1209.120910.'),('120911','LA FRAGUA','1209',3,'.2.12.1209.120911.'),('120912','TONGOLONA','1209',3,'.2.12.1209.120912.'),('120913','VALLE ALEGRE','1209',3,'.2.12.1209.120913.'),('1210','MONCAGUA','12',2,'.2.12.1210.'),('121001','PLANES DE SAN SEBASTIAN','1210',3,'.2.12.1210.121001.'),('121002','SAN LUIS','1210',3,'.2.12.1210.121002.'),('1211','NUEVA GUADALUPE','12',2,'.2.12.1211.'),('121101','JARDIN','1211',3,'.2.12.1211.121101.'),('121102','OJEO','1211',3,'.2.12.1211.121102.'),('121103','QUESERAS','1211',3,'.2.12.1211.121103.'),('121104','SAN SEBASTIAN','1211',3,'.2.12.1211.121104.'),('121105','LAURELES','1211',3,'.2.12.1211.121105.'),('121106','CUCURUCHO','1211',3,'.2.12.1211.121106.'),('121107','MONTECILLO','1211',3,'.2.12.1211.121107.'),('1212','NUEVO EDEN DE SAN JUAN','12',2,'.2.12.1212.'),('121201','EL OBRAJUELO','1212',3,'.2.12.1212.121201.'),('121202','EL TAMBORAL','1212',3,'.2.12.1212.121202.'),('121203','SAN ANTONIO','1212',3,'.2.12.1212.121203.'),('121204','SAN JOSE','1212',3,'.2.12.1212.121204.'),('1213','QUELEPA','12',2,'.2.12.1213.'),('121301','SAN DIEGO','1213',3,'.2.12.1213.121301.'),('121302','SAN MARCOS','1213',3,'.2.12.1213.121302.'),('1214','SAN ANTONIO','12',2,'.2.12.1214.'),('121401','LA JOYA','1214',3,'.2.12.1214.121401.'),('121402','LA LAGUNA','1214',3,'.2.12.1214.121402.'),('121403','QUEBRACHO','1214',3,'.2.12.1214.121403.'),('121404','SAN JERONIMO','1214',3,'.2.12.1214.121404.'),('1215','SAN GERARDO','12',2,'.2.12.1215.'),('121501','CANDELARIA','1215',3,'.2.12.1215.121501.'),('121502','JOYA DE VENTURA','1215',3,'.2.12.1215.121502.'),('121503','LA CEIBA','1215',3,'.2.12.1215.121503.'),('121504','LA MORITA','1215',3,'.2.12.1215.121504.'),('121505','SAN JULIAN','1215',3,'.2.12.1215.121505.'),('1216','SAN JORGE','12',2,'.2.12.1216.'),('121601','EL JUNQUILLO','1216',3,'.2.12.1216.121601.'),('121602','OSTUCAL','1216',3,'.2.12.1216.121602.'),('121603','SAN ANTONIO','1216',3,'.2.12.1216.121603.'),('121604','SAN JUAN','1216',3,'.2.12.1216.121604.'),('1217','SAN LUIS DE LA REINA','12',2,'.2.12.1217.'),('121701','ALTOMIRO','1217',3,'.2.12.1217.121701.'),('121702','ANCHICO','1217',3,'.2.12.1217.121702.'),('121703','CERRO BONITO','1217',3,'.2.12.1217.121703.'),('121704','CONCEPCION COROZAL','1217',3,'.2.12.1217.121704.'),('121705','EL AMATE','1217',3,'.2.12.1217.121705.'),('121706','EL BRAZO','1217',3,'.2.12.1217.121706.'),('121707','EL DELIRIO','1217',3,'.2.12.1217.121707.'),('121708','EL DIVISADERO','1217',3,'.2.12.1217.121708.'),('121709','EL HAVILLAL','1217',3,'.2.12.1217.121709.'),('121710','EL JUTE','1217',3,'.2.12.1217.121710.'),('121711','EL PAPALON','1217',3,'.2.12.1217.121711.'),('121712','EL PROGRESO','1217',3,'.2.12.1217.121712.'),('121713','EL SITIO','1217',3,'.2.12.1217.121713.'),('121714','EL TECOMATAL','1217',3,'.2.12.1217.121714.'),('121715','EL VOLCAN','1217',3,'.2.12.1217.121715.'),('121716','EL ZAMORAN','1217',3,'.2.12.1217.121716.'),('121717','HATO NUEVO','1217',3,'.2.12.1217.121717.'),('121718','JALACATAL','1217',3,'.2.12.1217.121718.'),('121719','LA CANOA','1217',3,'.2.12.1217.121719.'),('121720','LA PUERTA','1217',3,'.2.12.1217.121720.'),('121721','LA TRINIDAD','1217',3,'.2.12.1217.121721.'),('121722','LAS DELICIAS','1217',3,'.2.12.1217.121722.'),('121723','LAS LOMITAS','1217',3,'.2.12.1217.121723.'),('121724','MIRAFLORES','1217',3,'.2.12.1217.121724.'),('121725','MONTE GRANDE','1217',3,'.2.12.1217.121725.'),('121726','SAN ANDRES','1217',3,'.2.12.1217.121726.'),('121727','SAN ANTONIO CHAVEZ','1217',3,'.2.12.1217.121727.'),('121728','SAN ANTONIO SILVA','1217',3,'.2.12.1217.121728.'),('121729','SAN CARLOS','1217',3,'.2.12.1217.121729.'),('121730','SAN JACINTO','1217',3,'.2.12.1217.121730.'),('121731','SANTA INES','1217',3,'.2.12.1217.121731.'),('121732','EL NIÑO','1217',3,'.2.12.1217.121732.'),('121733','AGUA ZARCA','1217',3,'.2.12.1217.121733.'),('1218','SAN RAFAEL ORIENTE','12',2,'.2.12.1218.'),('121801','LOS ZELAYA','1218',3,'.2.12.1218.121801.'),('121802','PIEDRA AZUL','1218',3,'.2.12.1218.121802.'),('121803','RODEO DE PEDRON','1218',3,'.2.12.1218.121803.'),('121804','SANTA CLARA','1218',3,'.2.12.1218.121804.'),('1219','SESORI','12',2,'.2.12.1219.'),('121901','CHARLACA','1219',3,'.2.12.1219.121901.'),('121902','EL ESPIRITU SANTO','1219',3,'.2.12.1219.121902.'),('121903','EL TABLON','1219',3,'.2.12.1219.121903.'),('121904','LAS MESAS','1219',3,'.2.12.1219.121904.'),('121905','MINITAS','1219',3,'.2.12.1219.121905.'),('121906','SAN JACINTO','1219',3,'.2.12.1219.121906.'),('121907','SAN SEBASTIAN','1219',3,'.2.12.1219.121907.'),('121908','SANTA ROSA','1219',3,'.2.12.1219.121908.'),('121909','MANAGUARA','1219',3,'.2.12.1219.121909.'),('121910','MAZATEPEQUE','1219',3,'.2.12.1219.121910.'),('1220','ULUAZAPA','12',2,'.2.12.1220.'),('122001','JUAN YANEZ','1220',3,'.2.12.1220.122001.'),('122002','LOS PILONES','1220',3,'.2.12.1220.122002.'),('122003','RIO DE VARGAS','1220',3,'.2.12.1220.122003.'),('122004','RIO VARGAS','1220',3,'.2.12.1220.122004.'),('13','MORAZAN','2',1,'.2.13.'),('1301','SAN FRANCISCO GOTERA','13',2,'.2.13.1301.'),('130101','EL CARRIZAL','1301',3,'.2.13.1301.130101.'),('130102','NAHUATERIQUE','1301',3,'.2.13.1301.130102.'),('130103','PUEBLO VIEJO','1301',3,'.2.13.1301.130103.'),('130104','TIERRA COLORADA','1301',3,'.2.13.1301.130104.'),('1302','ARAMBALA','13',2,'.2.13.1302.'),('130201','AGUA BLANCA','1302',3,'.2.13.1302.130201.'),('130202','CALAVERA','1302',3,'.2.13.1302.130202.'),('130203','JUNQUILLO','1302',3,'.2.13.1302.130203.'),('130204','OCOTILLO','1302',3,'.2.13.1302.130204.'),('130205','LA ESTANCIA','1302',3,'.2.13.1302.130205.'),('130206','SUNSULACA','1302',3,'.2.13.1302.130206.'),('130207','GUACHIPILIN','1302',3,'.2.13.1302.130207.'),('1303','CACAOPERA','13',2,'.2.13.1303.'),('130301','CORRALITO','1303',3,'.2.13.1303.130301.'),('130302','HONDABLE','1303',3,'.2.13.1303.130302.'),('130303','LAGUNA','1303',3,'.2.13.1303.130303.'),('130304','SAN FELIPE','1303',3,'.2.13.1303.130304.'),('130305','VARILLA NEGRA','1303',3,'.2.13.1303.130305.'),('1304','CORINTO','13',2,'.2.13.1304.'),('130401','JOYA DEL MATAZANO','1304',3,'.2.13.1304.130401.'),('130402','LAJITAS','1304',3,'.2.13.1304.130402.'),('130403','PIEDRA PARADA','1304',3,'.2.13.1304.130403.'),('130404','EL CHAPARRAL','1304',3,'.2.13.1304.130404.'),('130405','EL PEDERNAL','1304',3,'.2.13.1304.130405.'),('1305','CHILANGA','13',2,'.2.13.1305.'),('130501','EL VOLCAN','1305',3,'.2.13.1305.130501.'),('130502','LA CUCHILLA','1305',3,'.2.13.1305.130502.'),('1306','DELICIAS DE CONCEPCION','13',2,'.2.13.1306.'),('130601','LA CANADA','1306',3,'.2.13.1306.130601.'),('130602','LLANO DE SANTIAGO','1306',3,'.2.13.1306.130602.'),('130603','LOMA LARGA','1306',3,'.2.13.1306.130603.'),('130604','LOMA TENDIDA','1306',3,'.2.13.1306.130604.'),('130605','SAN PEDRO','1306',3,'.2.13.1306.130605.'),('130606','SANTA ANITA','1306',3,'.2.13.1306.130606.'),('130607','VILLA MODELO','1306',3,'.2.13.1306.130607.'),('130608','NOMBRE DE JESUS','1306',3,'.2.13.1306.130608.'),('1307','EL DIVISADERO','13',2,'.2.13.1307.'),('130701','LA LAGUNA','1307',3,'.2.13.1307.130701.'),('130702','OJOS DE AGUA','1307',3,'.2.13.1307.130702.'),('1308','EL ROSARIO','13',2,'.2.13.1308.'),('130801','LA JOYA','1308',3,'.2.13.1308.130801.'),('130802','SAN LUCAS','1308',3,'.2.13.1308.130802.'),('1309','GUALOCOCTI','13',2,'.2.13.1309.'),('130901','MAIGUERA','1309',3,'.2.13.1309.130901.'),('130902','PAJIGUA','1309',3,'.2.13.1309.130902.'),('130903','SAN BARTOLO','1309',3,'.2.13.1309.130903.'),('130904','EL VOLCAN','1309',3,'.2.13.1309.130904.'),('130905','ABELINES','1309',3,'.2.13.1309.130905.'),('130906','EL SIRIGUAL','1309',3,'.2.13.1309.130906.'),('1310','GUATAJIAGUA','13',2,'.2.13.1310.'),('131001','PATURLA','1310',3,'.2.13.1310.131001.'),('131002','VOLCANCILLO','1310',3,'.2.13.1310.131002.'),('131003','ZAPOTAL','1310',3,'.2.13.1310.131003.'),('1311','JOATECA','13',2,'.2.13.1311.'),('131101','EL RODEO','1311',3,'.2.13.1311.131101.'),('131102','EL VOLCANCILLO','1311',3,'.2.13.1311.131102.'),('1312','JOCOAITIQUE','13',2,'.2.13.1312.'),('131201','FLAMENCO','1312',3,'.2.13.1312.131201.'),('131202','GUACHIPILIN','1312',3,'.2.13.1312.131202.'),('131203','LAGUNETAS','1312',3,'.2.13.1312.131203.'),('131204','LAS MARIAS','1312',3,'.2.13.1312.131204.'),('131205','LAURELES','1312',3,'.2.13.1312.131205.'),('131206','SAN FELIPE','1312',3,'.2.13.1312.131206.'),('131207','SAN JOSE','1312',3,'.2.13.1312.131207.'),('131208','SAN JUAN','1312',3,'.2.13.1312.131208.'),('1313','JOCORO','13',2,'.2.13.1313.'),('131301','MANZANILLA','1313',3,'.2.13.1313.131301.'),('131302','GUALINDO ARRIBA','1313',3,'.2.13.1313.131302.'),('131303','GUALINDO CENTRO','1313',3,'.2.13.1313.131303.'),('131304','GUALINDO ABAJO','1313',3,'.2.13.1313.131304.'),('1314','LOLOTIQUILLO','13',2,'.2.13.1314.'),('131401','CERRO PANDO','1314',3,'.2.13.1314.131401.'),('131402','LA JOYA','1314',3,'.2.13.1314.131402.'),('131403','LA SOLEDAD','1314',3,'.2.13.1314.131403.'),('131404','LA GUACAMAYA','1314',3,'.2.13.1314.131404.'),('1315','MEANGUERA','13',2,'.2.13.1315.'),('131501','AGUA ZARCA','1315',3,'.2.13.1315.131501.'),('131502','HUILIHUISTE','1315',3,'.2.13.1315.131502.'),('131503','LA MONTAÑA','1315',3,'.2.13.1315.131503.'),('131504','CERRO COYOL','1315',3,'.2.13.1315.131504.'),('1316','OSICALA','13',2,'.2.13.1316.'),('131601','CASA BLANCA','1316',3,'.2.13.1316.131601.'),('131602','LAS TROJAS','1316',3,'.2.13.1316.131602.'),('131603','SABANETAS','1316',3,'.2.13.1316.131603.'),('1317','PERQUIN','13',2,'.2.13.1317.'),('131701','LA JAGUA','1317',3,'.2.13.1317.131701.'),('131702','SAN DIEGO','1317',3,'.2.13.1317.131702.'),('131703','SAN MARCOS','1317',3,'.2.13.1317.131703.'),('131704','VALLE NUEVO','1317',3,'.2.13.1317.131704.'),('1318','SAN CARLOS','13',2,'.2.13.1318.'),('131801','AZACUALPA','1318',3,'.2.13.1318.131801.'),('131802','CAÑAVERALES','1318',3,'.2.13.1318.131802.'),('1319','SAN FERNANDO','13',2,'.2.13.1319.'),('131901','SAN FRANCISQUITO','1319',3,'.2.13.1319.131901.'),('131902','SAN JOSE','1319',3,'.2.13.1319.131902.'),('131903','EL TRIUNFO','1319',3,'.2.13.1319.131903.'),('131904','CACAHUATALEJO','1319',3,'.2.13.1319.131904.'),('131905','EL ROSARIO','1319',3,'.2.13.1319.131905.'),('131906','EL NORTE','1319',3,'.2.13.1319.131906.'),('1320','SAN ISIDRO','13',2,'.2.13.1320.'),('132001','EL ROSARIO','1320',3,'.2.13.1320.132001.'),('132002','PIEDRA PARADA','1320',3,'.2.13.1320.132002.'),('1321','SAN SIMON','13',2,'.2.13.1321.'),('132101','EL CARRIZAL','1321',3,'.2.13.1321.132101.'),('132102','EL CERRO','1321',3,'.2.13.1321.132102.'),('132103','LAS QUEBRADAS','1321',3,'.2.13.1321.132103.'),('132104','POTRERO DE ADENTRO','1321',3,'.2.13.1321.132104.'),('132105','VALLE GRANDE','1321',3,'.2.13.1321.132105.'),('132106','SAN FRANCISCO','1321',3,'.2.13.1321.132106.'),('1322','SENSEMBRA','13',2,'.2.13.1322.'),('132201','EL LIMON','1322',3,'.2.13.1322.132201.'),('132202','EL RODEO','1322',3,'.2.13.1322.132202.'),('1323','SOCIEDAD','13',2,'.2.13.1323.'),('132301','ANIMAS','1323',3,'.2.13.1323.132301.'),('132302','CALPULES','1323',3,'.2.13.1323.132302.'),('132303','CANDELARIA','1323',3,'.2.13.1323.132303.'),('132304','EL TABLON','1323',3,'.2.13.1323.132304.'),('132305','LA JOYA','1323',3,'.2.13.1323.132305.'),('132306','EL BEJUCAL','1323',3,'.2.13.1323.132306.'),('132307','LA LABRANZA','1323',3,'.2.13.1323.132307.'),('132308','EL PEÑON','1323',3,'.2.13.1323.132308.'),('1324','TOROLA','13',2,'.2.13.1324.'),('132401','AGUA ZARCA','1324',3,'.2.13.1324.132401.'),('132402','CERRITOS','1324',3,'.2.13.1324.132402.'),('132403','TIJERETAS','1324',3,'.2.13.1324.132403.'),('132404','EL PROGRESO','1324',3,'.2.13.1324.132404.'),('1325','YAMABAL','13',2,'.2.13.1325.'),('132501','JOYA DEL MATAZANO','1325',3,'.2.13.1325.132501.'),('132502','SAN FRANCISQUITO','1325',3,'.2.13.1325.132502.'),('132503','SAN JUAN','1325',3,'.2.13.1325.132503.'),('132504','LOMA EL CHILE','1325',3,'.2.13.1325.132504.'),('1326','YOLOAIQUIN','13',2,'.2.13.1326.'),('132601','EL ACEITUNO','1326',3,'.2.13.1326.132601.'),('132602','EL VOLCAN','1326',3,'.2.13.1326.132602.'),('14','LA UNION','2',1,'.2.14.'),('1401','LA UNION','14',2,'.2.14.1401.'),('140101','AGUA BLANCA','1401',3,'.2.14.1401.140101.'),('140102','EL CARBONAL','1401',3,'.2.14.1401.140102.'),('140103','EL TIZATE','1401',3,'.2.14.1401.140103.'),('140104','TERRERITOS','1401',3,'.2.14.1401.140104.'),('140105','HUERTA VIEJA','1401',3,'.2.14.1401.140105.'),('140106','TULIMA','1401',3,'.2.14.1401.140106.'),('140107','EL CEDRO','1401',3,'.2.14.1401.140107.'),('140108','CORDONCILLO','1401',3,'.2.14.1401.140108.'),('1402','ANAMOROS','14',2,'.2.14.1402.'),('140201','ALBORNOZ','1402',3,'.2.14.1402.140201.'),('140202','EL TRANSITO','1402',3,'.2.14.1402.140202.'),('140203','GUADALUPE','1402',3,'.2.14.1402.140203.'),('140204','LA PAZ','1402',3,'.2.14.1402.140204.'),('140205','LA RINCONADA','1402',3,'.2.14.1402.140205.'),('140206','NUEVA GUADALUPE','1402',3,'.2.14.1402.140206.'),('140207','SANTA LUCIA','1402',3,'.2.14.1402.140207.'),('140208','CANDELARIA ALBORNOZ','1402',3,'.2.14.1402.140208.'),('140209','JOYAS LAS TUNAS','1402',3,'.2.14.1402.140209.'),('1403','BOLIVAR','14',2,'.2.14.1403.'),('140301','EL GUAYABO','1403',3,'.2.14.1403.140301.'),('140302','EL MOLINO','1403',3,'.2.14.1403.140302.'),('140303','EL ZAPOTE','1403',3,'.2.14.1403.140303.'),('140304','GUERIPE','1403',3,'.2.14.1403.140304.'),('1404','CONCEPCION DE ORIENTE','14',2,'.2.14.1404.'),('140401','CERRO EL JIOTE','1404',3,'.2.14.1404.140401.'),('140402','CONCHAGUITA','1404',3,'.2.14.1404.140402.'),('140403','EL CACAO','1404',3,'.2.14.1404.140403.'),('140404','EL CIPRES','1404',3,'.2.14.1404.140404.'),('140405','EL FARO','1404',3,'.2.14.1404.140405.'),('140406','EL PILON','1404',3,'.2.14.1404.140406.'),('140407','EL TAMARINDO','1404',3,'.2.14.1404.140407.'),('140408','HUISQUIL','1404',3,'.2.14.1404.140408.'),('140409','LOS ANGELES','1404',3,'.2.14.1404.140409.'),('140410','MAQUIGUE','1404',3,'.2.14.1404.140410.'),('140411','PLAYAS NEGRAS','1404',3,'.2.14.1404.140411.'),('140412','YOLOGUAL','1404',3,'.2.14.1404.140412.'),('140413','EL JAGUEY','1404',3,'.2.14.1404.140413.'),('140414','PIEDRAS BLANCAS','1404',3,'.2.14.1404.140414.'),('140415','PIEDRAS RAYADAS','1404',3,'.2.14.1404.140415.'),('140416','LLANO LOS PATOS','1404',3,'.2.14.1404.140416.'),('1405','CONCHAGUA','14',2,'.2.14.1405.'),('140501','ALTO EL ROBLE','1405',3,'.2.14.1405.140501.'),('140502','CAULOTILLO','1405',3,'.2.14.1405.140502.'),('140503','EL GAVILAN','1405',3,'.2.14.1405.140503.'),('140504','EL PICHE','1405',3,'.2.14.1405.140504.'),('140505','EL TEJAR','1405',3,'.2.14.1405.140505.'),('140506','EL ZAPOTAL','1405',3,'.2.14.1405.140506.'),('140507','LOS CONEJOS','1405',3,'.2.14.1405.140507.'),('140508','OLOMEGA','1405',3,'.2.14.1405.140508.'),('140509','LAS PITAS','1405',3,'.2.14.1405.140509.'),('140510','SALALAGUA','1405',3,'.2.14.1405.140510.'),('140511','LA CAÑADA','1405',3,'.2.14.1405.140511.'),('1406','EL CARMEN','14',2,'.2.14.1406.'),('140601','CANAIRE','1406',3,'.2.14.1406.140601.'),('140602','EL RINCON','1406',3,'.2.14.1406.140602.'),('140603','SANTA ROSITA','1406',3,'.2.14.1406.140603.'),('140604','TALPETATE','1406',3,'.2.14.1406.140604.'),('140605','SAN JUAN GUALARES','1406',3,'.2.14.1406.140605.'),('1407','EL SAUCE','14',2,'.2.14.1407.'),('140701','EL CARAO','1407',3,'.2.14.1407.140701.'),('140702','LA LEONA','1407',3,'.2.14.1407.140702.'),('1408','INTIPUCA','14',2,'.2.14.1408.'),('1409','LISLIQUE','14',2,'.2.14.1409.'),('140901','AGUA FRIA','1409',3,'.2.14.1409.140901.'),('140902','GUAJINIQUIL','1409',3,'.2.14.1409.140902.'),('140903','HIGUERAS','1409',3,'.2.14.1409.140903.'),('140904','EL DERRUMBADO','1409',3,'.2.14.1409.140904.'),('140905','EL GUAJINIQUIL','1409',3,'.2.14.1409.140905.'),('140906','EL TERRERO','1409',3,'.2.14.1409.140906.'),('140907','LAS PILAS','1409',3,'.2.14.1409.140907.'),('1410','MEANGUERA DEL GOLFO','14',2,'.2.14.1410.'),('141001','EL SALVADOR','1410',3,'.2.14.1410.141001.'),('141002','GUERRERO','1410',3,'.2.14.1410.141002.'),('141003','ISLA DE CONCHAGÜITA','1410',3,'.2.14.1410.141003.'),('1411','NUEVA ESPARTA','14',2,'.2.14.1411.'),('141101','EL PORTILLO','1411',3,'.2.14.1411.141101.'),('141102','HONDURITAS','1411',3,'.2.14.1411.141102.'),('141103','LAS MARIAS','1411',3,'.2.14.1411.141103.'),('141104','MONTECA','1411',3,'.2.14.1411.141104.'),('141105','TALPETATE','1411',3,'.2.14.1411.141105.'),('141106','OCOTILLO','1411',3,'.2.14.1411.141106.'),('1412','PASAQUINA','14',2,'.2.14.1412.'),('141201','CERRO PELON','1412',3,'.2.14.1412.141201.'),('141202','EL AMATILLO','1412',3,'.2.14.1412.141202.'),('141203','EL REBALSE','1412',3,'.2.14.1412.141203.'),('141204','EL TABLON','1412',3,'.2.14.1412.141204.'),('141205','HORCONES','1412',3,'.2.14.1412.141205.'),('141206','PIEDRAS BLANCAS','1412',3,'.2.14.1412.141206.'),('141207','SAN EDUARDO','1412',3,'.2.14.1412.141207.'),('141208','SAN FELIPE','1412',3,'.2.14.1412.141208.'),('141209','SANTA CLARA','1412',3,'.2.14.1412.141209.'),('141210','VALLE AFUERA','1412',3,'.2.14.1412.141210.'),('141211','LOS CAMOTES','1412',3,'.2.14.1412.141211.'),('141212','EL PICACHO','1412',3,'.2.14.1412.141212.'),('1413','POLOROS','14',2,'.2.14.1413.'),('141301','BOQUIN','1413',3,'.2.14.1413.141301.'),('141302','CARPINTERO','1413',3,'.2.14.1413.141302.'),('141303','LAJITAS','1413',3,'.2.14.1413.141303.'),('141304','EL OCOTE','1413',3,'.2.14.1413.141304.'),('141305','EL PUEBLO','1413',3,'.2.14.1413.141305.'),('141306','EL RODEO','1413',3,'.2.14.1413.141306.'),('141307','MALA LAJA','1413',3,'.2.14.1413.141307.'),('1414','SAN ALEJO','14',2,'.2.14.1414.'),('141401','AGUA FRIA','1414',3,'.2.14.1414.141401.'),('141402','BOBADILLA','1414',3,'.2.14.1414.141402.'),('141403','COPALIO','1414',3,'.2.14.1414.141403.'),('141404','EL TAMARINDO','1414',3,'.2.14.1414.141404.'),('141405','HATO NUEVO','1414',3,'.2.14.1414.141405.'),('141406','LAS QUESERAS','1414',3,'.2.14.1414.141406.'),('141407','LOS JIOTES','1414',3,'.2.14.1414.141407.'),('141408','MOGOTILLO','1414',3,'.2.14.1414.141408.'),('141409','SAN JERONIMO','1414',3,'.2.14.1414.141409.'),('141410','SAN JOSE','1414',3,'.2.14.1414.141410.'),('141411','SANTA CRUZ','1414',3,'.2.14.1414.141411.'),('141412','TERRERO BLANCO','1414',3,'.2.14.1414.141412.'),('141413','TRINCHERAS','1414',3,'.2.14.1414.141413.'),('141414','MONTE VERDE','1414',3,'.2.14.1414.141414.'),('141415','CEIBILLAS','1414',3,'.2.14.1414.141415.'),('141416','EL CARAON','1414',3,'.2.14.1414.141416.'),('141417','EL TEMPISQUE','1414',3,'.2.14.1414.141417.'),('141418','PAVANA','1414',3,'.2.14.1414.141418.'),('141419','EL TIZATIO','1414',3,'.2.14.1414.141419.'),('141420','CERCOS DE PIEDRA','1414',3,'.2.14.1414.141420.'),('1415','SAN JOSE','14',2,'.2.14.1415.'),('141501','EL SOMBRERITO','1415',3,'.2.14.1415.141501.'),('141502','EL ZAPOTE','1415',3,'.2.14.1415.141502.'),('141503','LA JOYA','1415',3,'.2.14.1415.141503.'),('141504','EL CHAGUITILLO','1415',3,'.2.14.1415.141504.'),('1416','SANTA ROSA DE LIMA','14',2,'.2.14.1416.');
/*!40000 ALTER TABLE `geografia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador`
--

DROP TABLE IF EXISTS `indicador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador` (
  `IdIndicador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del indicador o toma de signos en la enfermería ',
  `IdConsulta` int(11) NOT NULL COMMENT 'Es el identificador de la consulta ',
  `Peso` float NOT NULL COMMENT 'Indica el peso de la persona ',
  `UnidadPeso` int(11) NOT NULL COMMENT 'Indica la unidad de medida del peso ',
  `Altura` float NOT NULL COMMENT 'Indica la altura ',
  `UnidadAltura` int(11) NOT NULL COMMENT 'Indica la unidad de medida de la altura ',
  `Temperatura` float NOT NULL COMMENT 'Indica la temperatura de la persona ',
  `UnidadTemperatura` int(11) NOT NULL COMMENT 'Indica la unidade de medida de la temperatura ',
  `Pulso` varchar(11) NOT NULL COMMENT 'Indica el pulso de la persona ',
  `PresionMax` int(11) NOT NULL COMMENT 'Indica la presión maxima de la persona ',
  `PresionMin` int(11) NOT NULL COMMENT 'Indica la presión minima de la persona ',
  `Observaciones` longtext COMMENT 'Observaciones o notas adicionales ',
  PRIMARY KEY (`IdIndicador`),
  KEY `fk_tbl_indicador_tbl_consulta1_idx` (`IdConsulta`),
  CONSTRAINT `fk_tbl_indicador_tbl_consulta1` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador`
--

LOCK TABLES `indicador` WRITE;
/*!40000 ALTER TABLE `indicador` DISABLE KEYS */;
INSERT INTO `indicador` VALUES (7,10,111.1,1,111.1,1,11.1,1,'111-111',111,111,'Observaciones nocturnas '),(8,11,222.2,1,333.3,1,43.4,1,'444-444',444,444,' Prueba desde Recepcion'),(9,12,111.1,1,222.2,1,33.3,1,'444-444',555,556,' PRUEBA CON FRAN DESDE RECEPCION'),(10,13,200,2,185.1,1,33.1,1,'333-333',444,444,'Ninguna ');
/*!40000 ALTER TABLE `indicador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorio` (
  `IdLaboratorio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el indentificador del laboratorio',
  `NombreLaboratorio` varchar(50) DEFAULT NULL COMMENT 'Indica el nombre del labortorio',
  PRIMARY KEY (`IdLaboratorio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorio`
--

LOCK TABLES `laboratorio` WRITE;
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` VALUES (1,'GAMMA'),(2,'SUIZOS'),(3,'TERAMED');
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listaexamen`
--

DROP TABLE IF EXISTS `listaexamen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listaexamen` (
  `IdListaExamen` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) NOT NULL,
  `IdConsulta` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `IdTipoExamen` int(11) NOT NULL,
  `Activo` int(11) DEFAULT NULL,
  `FechaExamen` date DEFAULT NULL,
  `Indicacion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`IdListaExamen`,`IdUsuario`,`IdConsulta`,`IdPersona`,`IdTipoExamen`),
  KEY `fk_listaexamen_persona1_idx` (`IdPersona`),
  KEY `fk_listaexamen_tipoexamen1_idx` (`IdTipoExamen`),
  KEY `fk_listaexamen_usuario1_idx` (`IdUsuario`),
  KEY `fk_listaexamen_consulta1_idx` (`IdConsulta`),
  CONSTRAINT `fk_listaexamen_consulta1` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaexamen_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaexamen_tipoexamen1` FOREIGN KEY (`IdTipoExamen`) REFERENCES `tipoexamen` (`IdTipoExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaexamen_usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listaexamen`
--

LOCK TABLES `listaexamen` WRITE;
/*!40000 ALTER TABLE `listaexamen` DISABLE KEYS */;
INSERT INTO `listaexamen` VALUES (1,8,12,1,1,1,'2016-08-17','EXAMEN HEMOGRAMA'),(2,8,12,1,2,1,'2016-08-17','EXAMEN HECES'),(3,8,12,1,3,1,'2016-08-17','EXAMEN ORINA'),(4,8,12,1,4,1,'2016-08-17','EXAMEN QUIMICA'),(5,8,12,1,5,1,'2016-08-17','EXAMEN VARIOS');
/*!40000 ALTER TABLE `listaexamen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logexamenes`
--

DROP TABLE IF EXISTS `logexamenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logexamenes` (
  `IdRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `IdTipoExamen` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdRegistro`,`IdUsuario`,`IdPersona`,`IdTipoExamen`),
  KEY `fk_logExamenes_persona1_idx` (`IdPersona`),
  KEY `fk_logExamenes_usuario1_idx` (`IdUsuario`),
  KEY `fk_logExamenes_tipoExamen1_idx` (`IdTipoExamen`),
  CONSTRAINT `fk_logExamenes_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_logExamenes_tipoExamen1` FOREIGN KEY (`IdTipoExamen`) REFERENCES `tipoexamen` (`IdTipoExamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_logExamenes_usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logexamenes`
--

LOCK TABLES `logexamenes` WRITE;
/*!40000 ALTER TABLE `logexamenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `logexamenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lotes`
--

DROP TABLE IF EXISTS `lotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lotes` (
  `IdLote` int(11) NOT NULL AUTO_INCREMENT,
  `IdMedicamento` int(11) NOT NULL,
  `CodigoLote` varchar(45) DEFAULT NULL,
  `Cantidad` varchar(45) DEFAULT NULL,
  `FechaExpedicion` date DEFAULT NULL,
  `FechaVencimiento` date DEFAULT NULL,
  `Ubicacion` varchar(100) DEFAULT NULL,
  `Activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdLote`,`IdMedicamento`),
  KEY `fk_lotes_medicamentos1_idx` (`IdMedicamento`),
  CONSTRAINT `fk_lotes_medicamentos1` FOREIGN KEY (`IdMedicamento`) REFERENCES `medicamentos` (`IdMedicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lotes`
--

LOCK TABLES `lotes` WRITE;
/*!40000 ALTER TABLE `lotes` DISABLE KEYS */;
/*!40000 ALTER TABLE `lotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `IdMarca` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la marca ',
  `IdLaboratorio` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL COMMENT 'Indica el nombre de la marca ',
  PRIMARY KEY (`IdMarca`),
  KEY `fk_tbl_marca_Laboratorio1_idx` (`IdLaboratorio`),
  CONSTRAINT `fk_tbl_marca_Laboratorio1` FOREIGN KEY (`IdLaboratorio`) REFERENCES `laboratorio` (`IdLaboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamentolote`
--

DROP TABLE IF EXISTS `medicamentolote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamentolote` (
  `IdMedicamento` int(11) NOT NULL,
  `CodigoLote` varchar(45) NOT NULL,
  `FechaEntrada` date NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `CostoUnitario` decimal(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `CostoTotal` decimal(10,2) NOT NULL,
  `FechaExpedicion` date NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `lote` varchar(45) NOT NULL,
  `Activo` int(11) NOT NULL,
  KEY `fk_medicamentos_medicamentolote1_idx` (`IdMedicamento`),
  KEY `fk_usuario_medicamentolote1_idx` (`IdUsuario`),
  CONSTRAINT `fk_medicamentos_medicamentolote1_idx` FOREIGN KEY (`IdMedicamento`) REFERENCES `medicamentos` (`IdMedicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamentolote`
--

LOCK TABLES `medicamentolote` WRITE;
/*!40000 ALTER TABLE `medicamentolote` DISABLE KEYS */;
INSERT INTO `medicamentolote` VALUES (9,'acet123','2016-08-23','2017-09-09',2.00,500,1000.00,'2016-08-21',7,'',1),(12,'sine1','2016-08-26','2017-08-09',5.00,500,2500.00,'2016-08-25',7,'321',0),(11,'rivo1','2016-08-26','2016-09-09',5.00,500,2500.00,'2016-09-09',7,'321',0),(11,'rivo1','2016-08-26','2016-09-09',5.00,500,2500.00,'2016-09-09',7,'321',0),(11,'rivo1','2016-08-26','2016-09-09',5.00,500,2500.00,'2016-09-09',7,'321',0),(11,'rivo1','2016-08-26','2016-09-09',5.00,500,2500.00,'2016-09-09',7,'321',0),(11,'rivo1','2016-08-26','2016-09-09',5.00,500,2500.00,'2016-09-09',7,'321',0),(9,'ace','2016-08-26','2016-09-09',1.00,23,23.00,'2016-09-09',7,'2134',1),(11,'111111','2016-08-26','2016-08-09',2.00,333,666.00,'2016-09-08',7,'111',1);
/*!40000 ALTER TABLE `medicamentolote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamentos` (
  `IdMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `NombreMedicamento` varchar(100) NOT NULL,
  `NombreComercial` varchar(100) DEFAULT NULL,
  `IdPresentacion` int(11) NOT NULL,
  `IdLaboratorio` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `Concentracion` varchar(45) NOT NULL,
  `IdUnidadMedida` int(11) NOT NULL,
  `PrecioLab` double(10,2) DEFAULT NULL,
  `PrecioVentaA` double(10,2) DEFAULT NULL,
  `PrecioVentaB` double(10,2) DEFAULT NULL,
  `PrecioVentaC` double(10,2) DEFAULT NULL,
  `PrecioVentaD` double(10,2) DEFAULT NULL,
  `Activo` int(11) NOT NULL,
  PRIMARY KEY (`IdMedicamento`,`IdLaboratorio`,`IdCategoria`,`IdUnidadMedida`),
  KEY `fk_medicamentos_laboratorio1_idx` (`IdLaboratorio`),
  KEY `fk_medicamentos_categoria1_idx` (`IdCategoria`),
  KEY `fk_medicamentos_unidadmedida1_idx` (`IdUnidadMedida`),
  CONSTRAINT `fk_medicamentos_categoria1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicamentos_laboratorio1` FOREIGN KEY (`IdLaboratorio`) REFERENCES `laboratorio` (`IdLaboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_medicamentos_unidadmedida1` FOREIGN KEY (`IdUnidadMedida`) REFERENCES `unidadmedida` (`IdUnidadMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamentos`
--

LOCK TABLES `medicamentos` WRITE;
/*!40000 ALTER TABLE `medicamentos` DISABLE KEYS */;
INSERT INTO `medicamentos` VALUES (9,'Acetaminofen',NULL,1,1,1,'',1,40.00,30.00,6.00,4.00,2.00,1),(10,'Varteral',NULL,1,1,1,'',1,40.00,30.00,6.00,4.00,2.00,1),(11,'Rivotril','Rivotril Comercial',2,3,1,'1000',1,100.00,100.00,70.00,50.00,0.00,1),(12,'Sinemet','Sinemet comercial',1,3,3,'200',3,100.00,100.00,70.00,50.00,0.00,1),(13,'prueba','pruebacomer',1,1,1,'2',1,1.00,1.00,0.70,0.50,0.00,1),(14,'prueba sin existencia','test 2',2,2,4,'32',3,2.00,2.00,1.40,1.00,0.00,1);
/*!40000 ALTER TABLE `medicamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `IdMenu` int(11) NOT NULL AUTO_INCREMENT,
  `IdModulo` int(11) DEFAULT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Menucol` varchar(45) DEFAULT NULL,
  `IdPadre` int(11) DEFAULT NULL,
  `Url` varchar(250) DEFAULT NULL,
  `Icono` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`IdMenu`),
  KEY `fk_Menu_Modulo1_idx` (`IdModulo`),
  CONSTRAINT `fk_Menu_Modulo1` FOREIGN KEY (`IdModulo`) REFERENCES `modulo` (`IdModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `IdModulo` int(11) NOT NULL AUTO_INCREMENT,
  `NombreModulo` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdModulo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (3,'Pediatria','Modulode Pediatria','');
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos` (
  `IdMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `NombreMovimiento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdMovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos`
--

LOCK TABLES `movimientos` WRITE;
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` VALUES (1,'Entrada'),(2,'Salida'),(3,'Baja por Vencimiento'),(4,'Baja por Deterioro');
/*!40000 ALTER TABLE `movimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `IdPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'ADMIN'),(2,'MEDICO');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfildetalle`
--

DROP TABLE IF EXISTS `perfildetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfildetalle` (
  `IdPerfil` int(11) NOT NULL,
  `IdMenu` int(11) NOT NULL,
  `Seleccionar` bit(1) DEFAULT NULL,
  `Insertar` bit(1) DEFAULT NULL,
  `Actualizar` bit(1) DEFAULT NULL,
  `Eliminar` bit(1) DEFAULT NULL,
  `Imprimir` bit(1) DEFAULT NULL,
  `Activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdPerfil`,`IdMenu`),
  KEY `fk_PerfilDetalle_Perfil1_idx` (`IdPerfil`),
  KEY `fk_PerfilDetalle_Menu1_idx` (`IdMenu`),
  CONSTRAINT `fk_PerfilDetalle_Menu1` FOREIGN KEY (`IdMenu`) REFERENCES `menu` (`IdMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PerfilDetalle_Perfil1` FOREIGN KEY (`IdPerfil`) REFERENCES `perfil` (`IdPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfildetalle`
--

LOCK TABLES `perfildetalle` WRITE;
/*!40000 ALTER TABLE `perfildetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfildetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `IdPersona` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la persona (paciente)',
  `Nombres` varchar(100) NOT NULL COMMENT 'Indica los nombres de la persona ',
  `Apellidos` varchar(100) NOT NULL COMMENT 'Indica los apellidos de la persona ',
  `FechaNacimiento` date DEFAULT NULL COMMENT 'Indica la fecha de nacimiento de la persona ',
  `Direccion` varchar(500) DEFAULT NULL COMMENT 'Indica la dirección del domicilio de la persona ',
  `Correo` varchar(100) DEFAULT NULL COMMENT 'Indica el correo electrónico de la persona ',
  `IdGeografia` varchar(20) DEFAULT NULL COMMENT 'Es el identificador de la zona geográfica ',
  `Genero` char(9) DEFAULT NULL COMMENT 'Indica el genero de la persona ',
  `IdEstadoCivil` int(11) DEFAULT NULL COMMENT 'Es el identificador del estado civil de la persona ',
  `IdResponsable` varchar(100) DEFAULT NULL COMMENT 'Es el identificador del responsable (en caso de que sea menor de edad)',
  `IdParentesco` varchar(100) DEFAULT NULL COMMENT 'Es el identificador del parentesco ',
  `Telefono` varchar(15) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `Alergias` varchar(800) DEFAULT NULL,
  `Medicamentos` varchar(800) DEFAULT NULL,
  `Enfermedad` varchar(800) DEFAULT NULL,
  `Dui` varchar(15) DEFAULT NULL,
  `TelefonoResponsable` varchar(15) DEFAULT NULL,
  `IdEstado` int(2) NOT NULL,
  `Categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdPersona`),
  KEY `fk_tbl_persona_tbl_geografia1_idx` (`IdGeografia`),
  KEY `fk_tbl_persona_tbl_estado_civil1_idx` (`IdEstadoCivil`),
  KEY `fk_tbl_persona_tbl_estado1_idx` (`IdEstado`),
  CONSTRAINT `fk_tbl_persona_tbl_estado1` FOREIGN KEY (`IdEstado`) REFERENCES `estado` (`IdEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_persona_tbl_estadocivil1` FOREIGN KEY (`IdEstadoCivil`) REFERENCES `estadocivil` (`IdEstadoCivil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_persona_tbl_geografia1` FOREIGN KEY (`IdGeografia`) REFERENCES `geografia` (`IdGeografia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Nestor','Ulloa','1985-07-22','San Salvador','correo@corre.com','06','Masculino',1,'ninguna','Ninguna','2272-5122','7873-9382','Ninguna','Ninguna','Ninguna','03132484-3','2222-2222',2,'A'),(2,'Carlos Francisco','Cienfuegos Novellino','1991-03-04','San Salvador','cafrac1en@gmail.com','06','Masculino',1,'Francisco Novellino','Hermano','7777-7777','2222-2222','Ninguna','Ninguna','Ninguna','04427647-3','6666-6666',2,'B');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentacion`
--

DROP TABLE IF EXISTS `presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentacion` (
  `IdPresentacion` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePresentacion` varchar(100) NOT NULL,
  PRIMARY KEY (`IdPresentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentacion`
--

LOCK TABLES `presentacion` WRITE;
/*!40000 ALTER TABLE `presentacion` DISABLE KEYS */;
INSERT INTO `presentacion` VALUES (1,'Pastillas de 500'),(2,'Pastillas de 1000');
/*!40000 ALTER TABLE `presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL COMMENT 'Es el identificador del proveedor ',
  `Nombre` varchar(50) DEFAULT NULL COMMENT 'Indica el nombre del proveedor ',
  `NombreJuridico` varchar(150) DEFAULT NULL COMMENT 'Indica el nombre jurídico del proveedor ',
  `Descripcion` varchar(500) DEFAULT NULL COMMENT 'Descripción del proveedor ',
  `RegistroIva` varchar(10) DEFAULT NULL COMMENT 'Indica el numero del registro de IVA ',
  `Nit` varchar(14) DEFAULT NULL COMMENT 'Indica el numero de NIT ',
  `Representante` varchar(50) DEFAULT NULL COMMENT 'Indica el representante legal de la proveedora ',
  `Direccion` varchar(50) DEFAULT NULL COMMENT 'Indica la dirección del proveedor ',
  `Correo` varchar(50) DEFAULT NULL COMMENT 'Indica el correo electrónico del proveedor ',
  PRIMARY KEY (`IdProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puesto`
--

DROP TABLE IF EXISTS `puesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puesto` (
  `idPuesto` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idPuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puesto`
--

LOCK TABLES `puesto` WRITE;
/*!40000 ALTER TABLE `puesto` DISABLE KEYS */;
INSERT INTO `puesto` VALUES (1,'Administrador'),(2,'Medico'),(3,'Laboratorio'),(4,'Farmacia'),(5,'Enfermera'),(6,'Recepcionista'),(7,'Pasante');
/*!40000 ALTER TABLE `puesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receta`
--

DROP TABLE IF EXISTS `receta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receta` (
  `IdReceta` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `IdConsulta` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdReceta`),
  KEY `fk_receta_usuario1_idx` (`IdUsuario`),
  KEY `fk_receta_persona1_idx` (`IdPersona`),
  KEY `fk_receta_consulta1_idx` (`IdConsulta`),
  CONSTRAINT `fk_receta_consulta1_idx` FOREIGN KEY (`IdConsulta`) REFERENCES `consulta` (`IdConsulta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receta_persona1_idx` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receta_usuario1_idx` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receta`
--

LOCK TABLES `receta` WRITE;
/*!40000 ALTER TABLE `receta` DISABLE KEYS */;
INSERT INTO `receta` VALUES (1,8,1,12,'2016-08-17','');
/*!40000 ALTER TABLE `receta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receta_medicamentos`
--

DROP TABLE IF EXISTS `receta_medicamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receta_medicamentos` (
  `IdReceta` int(11) NOT NULL,
  `IdMedicamento` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Horas` int(11) NOT NULL,
  `Dias` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  KEY `fk_receta_medicamentos_receta1_idx` (`IdReceta`),
  KEY `fk_receta_medicamentos_medicamento1_idx` (`IdMedicamento`),
  CONSTRAINT `fk_receta_medicamentos_medicamentos1` FOREIGN KEY (`IdMedicamento`) REFERENCES `medicamentos` (`IdMedicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receta_medicamentos_receta1` FOREIGN KEY (`IdReceta`) REFERENCES `receta` (`IdReceta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receta_medicamentos`
--

LOCK TABLES `receta_medicamentos` WRITE;
/*!40000 ALTER TABLE `receta_medicamentos` DISABLE KEYS */;
INSERT INTO `receta_medicamentos` VALUES (1,9,1,12,5,10),(1,10,1,12,5,10);
/*!40000 ALTER TABLE `receta_medicamentos` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salidas`
--

DROP TABLE IF EXISTS `salidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidas` (
  `IdReceta` int(11) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdMedicamento` int(11) NOT NULL,
  `IdMovimiento` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  KEY `fk_salidas_receta1_idx` (`IdReceta`),
  KEY `fk_salidas_usuario1_idx` (`IdUsuario`),
  KEY `fk_salidas_medicamento1_idx` (`IdMedicamento`),
  KEY `fk_salidas_movimiento1_idx` (`IdMovimiento`),
  CONSTRAINT `fk_salidas_medicamento1_idx` FOREIGN KEY (`IdMedicamento`) REFERENCES `medicamentos` (`IdMedicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_salidas_movimiento1_idx` FOREIGN KEY (`IdMovimiento`) REFERENCES `movimientos` (`IdMovimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_salidas_receta1_idx` FOREIGN KEY (`IdReceta`) REFERENCES `receta` (`IdReceta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_salidas_usuario1_idx` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salidas`
--

LOCK TABLES `salidas` WRITE;
/*!40000 ALTER TABLE `salidas` DISABLE KEYS */;
INSERT INTO `salidas` VALUES (1,10,9,2,30,'2016-08-17',0.00),(1,10,10,2,72,'2016-08-17',0.00),(1,7,9,2,10,'2016-08-25',30.00),(1,7,10,2,10,'2016-08-25',30.00),(1,7,9,2,10,'2016-08-27',30.00),(1,7,10,2,10,'2016-08-27',30.00),(1,7,9,2,10,'2016-08-27',30.00),(1,7,10,2,10,'2016-08-27',30.00),(1,7,9,2,10,'2016-08-27',30.00),(1,7,10,2,10,'2016-08-27',30.00),(1,7,9,2,10,'2016-08-27',30.00),(1,7,10,2,10,'2016-08-27',30.00),(1,7,9,2,10,'2016-08-27',30.00),(1,7,10,2,10,'2016-08-27',30.00),(1,7,9,2,10,'2016-08-27',30.00),(1,7,10,2,10,'2016-08-27',30.00);
/*!40000 ALTER TABLE `salidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `IdTest` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del test de estudio socioeconomico ',
  `IdPersona` int(11) NOT NULL COMMENT 'Es el identificador de la persona (paciente) ',
  `IdClase` int(11) NOT NULL COMMENT 'Es el identificador de la clase del estudio socioeconomico ',
  `Fecha` date DEFAULT NULL COMMENT 'Indica la fecha del test ',
  `Hora` time DEFAULT NULL COMMENT 'Indica la hora del test ',
  PRIMARY KEY (`IdTest`),
  KEY `fk_tbl_test_tbl_clase1_idx` (`IdClase`),
  KEY `fk_tbl_test_tbl_persona1_idx` (`IdPersona`),
  CONSTRAINT `fk_tbl_test_tbl_clase1` FOREIGN KEY (`IdClase`) REFERENCES `clase` (`IdClase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_test_tbl_persona1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testdetalle`
--

DROP TABLE IF EXISTS `testdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testdetalle` (
  `IdTest` int(11) NOT NULL COMMENT 'Es el identificador del test socioeconomico ',
  `IdFactor` int(11) NOT NULL COMMENT 'Es el identificador del factor socioeconomico',
  `IdPregunta` int(11) NOT NULL COMMENT 'Es el identificador de la pregunta ',
  `IdRespuesta` int(11) NOT NULL COMMENT 'Es el identificador de la respuesta ',
  PRIMARY KEY (`IdTest`,`IdFactor`,`IdPregunta`,`IdRespuesta`),
  KEY `fk_tbl_test_detalle_tbl_respuesta1_idx` (`IdRespuesta`),
  CONSTRAINT `fk_tbl_test_detalle_tbl_respuesta1` FOREIGN KEY (`IdRespuesta`) REFERENCES `respuesta` (`IdRespuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_test_detalle_tbl_test1` FOREIGN KEY (`IdTest`) REFERENCES `test` (`IdTest`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testdetalle`
--

LOCK TABLES `testdetalle` WRITE;
/*!40000 ALTER TABLE `testdetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `testdetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodiagnostico`
--

DROP TABLE IF EXISTS `tipodiagnostico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipodiagnostico` (
  `IdTipoDiagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `NombreDiagnostico` varchar(45) NOT NULL,
  PRIMARY KEY (`IdTipoDiagnostico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodiagnostico`
--

LOCK TABLES `tipodiagnostico` WRITE;
/*!40000 ALTER TABLE `tipodiagnostico` DISABLE KEYS */;
INSERT INTO `tipodiagnostico` VALUES (1,'Diagnostico Generales'),(2,'Diagnosticos del Ministerio de Salud');
/*!40000 ALTER TABLE `tipodiagnostico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoexamen`
--

DROP TABLE IF EXISTS `tipoexamen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoexamen` (
  `IdTipoExamen` int(11) NOT NULL AUTO_INCREMENT,
  `NombreExamen` varchar(100) NOT NULL,
  PRIMARY KEY (`IdTipoExamen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoexamen`
--

LOCK TABLES `tipoexamen` WRITE;
/*!40000 ALTER TABLE `tipoexamen` DISABLE KEYS */;
INSERT INTO `tipoexamen` VALUES (1,'Examen Hemograma'),(2,'Examen Heces'),(3,'Examen Orina'),(4,'Examen Quimica'),(5,'Examen Varios');
/*!40000 ALTER TABLE `tipoexamen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccion`
--

DROP TABLE IF EXISTS `transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccion` (
  `IdTransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `FechaTransaccion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IdUsuario` int(11) NOT NULL,
  `IdMedicamento` int(11) NOT NULL,
  `IdMovimiento` int(11) NOT NULL,
  `CodigoLote` varchar(45) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Costo` decimal(10,2) NOT NULL,
  `Venta` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IdTransaccion`),
  KEY `fk_transaccion_usuario_idx` (`IdUsuario`),
  KEY `fk_transaccion_medicamento_idx` (`IdMedicamento`),
  KEY `fk_transaccion_movimientos_idx_idx` (`IdMovimiento`),
  CONSTRAINT `fk_transaccion_medicamentos_idx` FOREIGN KEY (`IdMedicamento`) REFERENCES `medicamentos` (`IdMedicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaccion_movimientos_idx` FOREIGN KEY (`IdMovimiento`) REFERENCES `movimientos` (`IdMovimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaccion_usuario_idx` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccion`
--

LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
INSERT INTO `transaccion` VALUES (3,'2016-08-25 06:00:00',7,9,1,'acet120160825',50,500.00,45.00),(4,'2016-08-26 06:00:00',7,10,3,'varte120160826',70,300.00,80.00),(5,'2016-08-26 10:13:45',7,11,1,'rivo1',500,2500.00,0.00),(6,'2016-08-26 10:14:14',7,11,1,'rivo1',500,2500.00,0.00),(7,'2016-08-26 10:16:10',7,9,1,'ace',23,23.00,0.00),(8,'2016-08-26 10:56:51',7,11,1,'111111',333,666.00,0.00),(9,'2016-08-26 11:56:08',7,11,4,'rivo1',700,0.00,0.00),(10,'2016-08-27 07:49:27',7,9,2,'',10,30.00,0.00),(11,'2016-08-27 07:49:27',7,10,2,'',10,30.00,0.00),(12,'2016-08-27 07:56:00',7,9,2,'',10,0.00,30.00),(13,'2016-08-27 07:56:00',7,10,2,'',10,0.00,30.00);
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidadmedida`
--

DROP TABLE IF EXISTS `unidadmedida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidadmedida` (
  `IdUnidadMedida` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la unidad de medida ',
  `NombreUnidadMedida` varchar(50) NOT NULL COMMENT 'Indica el nombre de la unidad de medida ',
  PRIMARY KEY (`IdUnidadMedida`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidadmedida`
--

LOCK TABLES `unidadmedida` WRITE;
/*!40000 ALTER TABLE `unidadmedida` DISABLE KEYS */;
INSERT INTO `unidadmedida` VALUES (1,'Ampolla 2ml'),(2,'Ampolla 75 mg'),(3,'Frasco 120 ml'),(4,'Frasco 60 ml'),(5,'Gotas 15 ml'),(6,'Sobre 27.9 g'),(7,'Spray 15 ml'),(8,'Tab. 150 mg'),(9,'Tab. 500 mg'),(10,'Tab. Masticables'),(11,'Tab. 10 mg'),(12,'Tab. 50 mg'),(13,'Tab. 550 mg'),(14,'Tabletas '),(15,'Tubo 15 g'),(16,'Spray/Inhalador'),(17,'Tab. 400mg');
/*!40000 ALTER TABLE `unidadmedida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rol_id` smallint(6) NOT NULL DEFAULT '1',
  `estado_id` smallint(6) NOT NULL DEFAULT '1',
  `tipo_usuario_id` smallint(6) DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `InicioSesion` varchar(50) DEFAULT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Clave` varchar(100) DEFAULT NULL,
  `Activo` int(11) DEFAULT NULL,
  `IdPuesto` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `fk_usuario_puesto1_idx` (`IdPuesto`),
  CONSTRAINT `fk_usuario_puesto1` FOREIGN KEY (`IdPuesto`) REFERENCES `puesto` (`idPuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (7,'admin','Nestor ','Ulloa','correo@corre.com','827ccb0eea8a706c4c34a16891f84e7b',1,1),(8,'Medico1','Alexis','Deras','correo@corre.com','827ccb0eea8a706c4c34a16891f84e7b',1,2),(9,'lab1','lab1','lab1','correo@corre.com','827ccb0eea8a706c4c34a16891f84e7b',1,3),(10,'farma1','farma1','farma1','correo@corre.com','827ccb0eea8a706c4c34a16891f84e7b',1,4),(11,'enfe1','enfe1','enfe1','correo@corre.com','827ccb0eea8a706c4c34a16891f84e7b',1,5),(12,'recep1','recep1','recep1','correo@corre.com','827ccb0eea8a706c4c34a16891f84e7b',1,6),(13,'Nestor','Nestor','Ulloa','correo@corre.com','ef8e99f730306065a9019d0f8b9b71b3',1,7);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarioperfil`
--

DROP TABLE IF EXISTS `usuarioperfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarioperfil` (
  `IdUsuario` int(11) NOT NULL,
  `IdPerfil` int(11) NOT NULL,
  `Activo` bit(1) NOT NULL,
  KEY `fk_UsuarioPerfil_Perfil1_idx` (`IdPerfil`),
  KEY `fk_UsuarioPerfil_Usuario1_idx` (`IdUsuario`),
  CONSTRAINT `fk_UsuarioPerfil_Perfil1` FOREIGN KEY (`IdPerfil`) REFERENCES `perfil` (`IdPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_UsuarioPerfil_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarioperfil`
--

LOCK TABLES `usuarioperfil` WRITE;
/*!40000 ALTER TABLE `usuarioperfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarioperfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_clinica'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-03 11:41:31
