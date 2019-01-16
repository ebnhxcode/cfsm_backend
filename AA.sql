-- MySQL dump 10.13  Distrib 8.0.13, for Linux (x86_64)
--
-- Host: localhost    Database: AA
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apariencia`
--

DROP TABLE IF EXISTS `apariencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `apariencia` (
  `apariencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `apariencia_nombre` varchar(255) DEFAULT NULL,
  `apariencia_descripcion` varchar(500) DEFAULT NULL,
  `nota_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`apariencia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apariencia`
--

LOCK TABLES `apariencia` WRITE;
/*!40000 ALTER TABLE `apariencia` DISABLE KEYS */;
INSERT INTO `apariencia` VALUES (1,'Exelente',NULL,1),(2,'Buena',NULL,2),(3,'Regular','C',3),(4,'Mala','O',4);
/*!40000 ALTER TABLE `apariencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calibre`
--

DROP TABLE IF EXISTS `calibre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `calibre` (
  `calibre_id` int(10) NOT NULL AUTO_INCREMENT,
  `calibre_nombre` varchar(10) DEFAULT NULL,
  `especie_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`calibre_id`),
  KEY `especie_id` (`especie_id`),
  CONSTRAINT `calibre_ibfk_1` FOREIGN KEY (`especie_id`) REFERENCES `especie` (`especie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calibre`
--

LOCK TABLES `calibre` WRITE;
/*!40000 ALTER TABLE `calibre` DISABLE KEYS */;
INSERT INTO `calibre` VALUES (1,'600',1),(2,'700',1),(3,'900',1),(4,'990',1),(5,'660',1),(6,'770',1),(7,'880',1),(8,'980',1),(9,'M',1),(10,'L',1),(11,'XL',1),(12,'XXL',1),(13,'XXXL',1);
/*!40000 ALTER TABLE `calibre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categoria` (
  `categoria_id` int(10) NOT NULL AUTO_INCREMENT,
  `categoria_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Premium'),(2,'Standard');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunas`
--

DROP TABLE IF EXISTS `comunas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comunas` (
  `comuna_id` int(11) NOT NULL AUTO_INCREMENT,
  `comuna_nombre` varchar(64) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  PRIMARY KEY (`comuna_id`),
  KEY `provincia_id` (`provincia_id`),
  CONSTRAINT `comunas_ibfk_1` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`provincia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunas`
--

LOCK TABLES `comunas` WRITE;
/*!40000 ALTER TABLE `comunas` DISABLE KEYS */;
INSERT INTO `comunas` VALUES (1,'Arica',1),(2,'Camarones',1),(3,'General Lagos',2),(4,'Putre',2),(5,'Alto Hospicio',3),(6,'Iquique',3),(7,'Camiña',4),(8,'Colchane',4),(9,'Huara',4),(10,'Pica',4),(11,'Pozo Almonte',4),(12,'Antofagasta',5),(13,'Mejillones',5),(14,'Sierra Gorda',5),(15,'Taltal',5),(16,'Calama',6),(17,'Ollague',6),(18,'San Pedro de Atacama',6),(19,'María Elena',7),(20,'Tocopilla',7),(21,'Chañaral',8),(22,'Diego de Almagro',8),(23,'Caldera',9),(24,'Copiapó',9),(25,'Tierra Amarilla',9),(26,'Alto del Carmen',10),(27,'Freirina',10),(28,'Huasco',10),(29,'Vallenar',10),(30,'Canela',11),(31,'Illapel',11),(32,'Los Vilos',11),(33,'Salamanca',11),(34,'Andacollo',12),(35,'Coquimbo',12),(36,'La Higuera',12),(37,'La Serena',12),(38,'Paihuaco',12),(39,'Vicuña',12),(40,'Combarbalá',13),(41,'Monte Patria',13),(42,'Ovalle',13),(43,'Punitaqui',13),(44,'Río Hurtado',13),(45,'Isla de Pascua',14),(46,'Calle Larga',15),(47,'Los Andes',15),(48,'Rinconada',15),(49,'San Esteban',15),(50,'La Ligua',16),(51,'Papudo',16),(52,'Petorca',16),(53,'Zapallar',16),(54,'Hijuelas',17),(55,'La Calera',17),(56,'La Cruz',17),(57,'Limache',17),(58,'Nogales',17),(59,'Olmué',17),(60,'Quillota',17),(61,'Algarrobo',18),(62,'Cartagena',18),(63,'El Quisco',18),(64,'El Tabo',18),(65,'San Antonio',18),(66,'Santo Domingo',18),(67,'Catemu',19),(68,'Llaillay',19),(69,'Panquehue',19),(70,'Putaendo',19),(71,'San Felipe',19),(72,'Santa María',19),(73,'Casablanca',20),(74,'Concón',20),(75,'Juan Fernández',20),(76,'Puchuncaví',20),(77,'Quilpué',20),(78,'Quintero',20),(79,'Valparaíso',20),(80,'Villa Alemana',20),(81,'Viña del Mar',20),(82,'Colina',21),(83,'Lampa',21),(84,'Tiltil',21),(85,'Pirque',22),(86,'Puente Alto',22),(87,'San José de Maipo',22),(88,'Buin',23),(89,'Calera de Tango',23),(90,'Paine',23),(91,'San Bernardo',23),(92,'Alhué',24),(93,'Curacaví',24),(94,'María Pinto',24),(95,'Melipilla',24),(96,'San Pedro',24),(97,'Cerrillos',25),(98,'Cerro Navia',25),(99,'Conchalí',25),(100,'El Bosque',25),(101,'Estación Central',25),(102,'Huechuraba',25),(103,'Independencia',25),(104,'La Cisterna',25),(105,'La Granja',25),(106,'La Florida',25),(107,'La Pintana',25),(108,'La Reina',25),(109,'Las Condes',25),(110,'Lo Barnechea',25),(111,'Lo Espejo',25),(112,'Lo Prado',25),(113,'Macul',25),(114,'Maipú',25),(115,'Ñuñoa',25),(116,'Pedro Aguirre Cerda',25),(117,'Peñalolén',25),(118,'Providencia',25),(119,'Pudahuel',25),(120,'Quilicura',25),(121,'Quinta Normal',25),(122,'Recoleta',25),(123,'Renca',25),(124,'San Miguel',25),(125,'San Joaquín',25),(126,'San Ramón',25),(127,'Santiago',25),(128,'Vitacura',25),(129,'El Monte',26),(130,'Isla de Maipo',26),(131,'Padre Hurtado',26),(132,'Peñaflor',26),(133,'Talagante',26),(134,'Codegua',27),(135,'Coínco',27),(136,'Coltauco',27),(137,'Doñihue',27),(138,'Graneros',27),(139,'Las Cabras',27),(140,'Machalí',27),(141,'Malloa',27),(142,'Mostazal',27),(143,'Olivar',27),(144,'Peumo',27),(145,'Pichidegua',27),(146,'Quinta de Tilcoco',27),(147,'Rancagua',27),(148,'Rengo',27),(149,'Requínoa',27),(150,'San Vicente de Tagua Tagua',27),(151,'La Estrella',28),(152,'Litueche',28),(153,'Marchihue',28),(154,'Navidad',28),(155,'Peredones',28),(156,'Pichilemu',28),(157,'Chépica',29),(158,'Chimbarongo',29),(159,'Lolol',29),(160,'Nancagua',29),(161,'Palmilla',29),(162,'Peralillo',29),(163,'Placilla',29),(164,'Pumanque',29),(165,'San Fernando',29),(166,'Santa Cruz',29),(167,'Cauquenes',30),(168,'Chanco',30),(169,'Pelluhue',30),(170,'Curicó',31),(171,'Hualañé',31),(172,'Licantén',31),(173,'Molina',31),(174,'Rauco',31),(175,'Romeral',31),(176,'Sagrada Familia',31),(177,'Teno',31),(178,'Vichuquén',31),(179,'Colbún',32),(180,'Linares',32),(181,'Longaví',32),(182,'Parral',32),(183,'Retiro',32),(184,'San Javier',32),(185,'Villa Alegre',32),(186,'Yerbas Buenas',32),(187,'Constitución',33),(188,'Curepto',33),(189,'Empedrado',33),(190,'Maule',33),(191,'Pelarco',33),(192,'Pencahue',33),(193,'Río Claro',33),(194,'San Clemente',33),(195,'San Rafael',33),(196,'Talca',33),(197,'Arauco',34),(198,'Cañete',34),(199,'Contulmo',34),(200,'Curanilahue',34),(201,'Lebu',34),(202,'Los Álamos',34),(203,'Tirúa',34),(204,'Alto Biobío',35),(205,'Antuco',35),(206,'Cabrero',35),(207,'Laja',35),(208,'Los Ángeles',35),(209,'Mulchén',35),(210,'Nacimiento',35),(211,'Negrete',35),(212,'Quilaco',35),(213,'Quilleco',35),(214,'San Rosendo',35),(215,'Santa Bárbara',35),(216,'Tucapel',35),(217,'Yumbel',35),(218,'Chiguayante',36),(219,'Concepción',36),(220,'Coronel',36),(221,'Florida',36),(222,'Hualpén',36),(223,'Hualqui',36),(224,'Lota',36),(225,'Penco',36),(226,'San Pedro de La Paz',36),(227,'Santa Juana',36),(228,'Talcahuano',36),(229,'Tomé',36),(230,'Bulnes',37),(231,'Chillán',37),(232,'Chillán Viejo',37),(233,'Cobquecura',37),(234,'Coelemu',37),(235,'Coihueco',37),(236,'El Carmen',37),(237,'Ninhue',37),(238,'Ñiquen',37),(239,'Pemuco',37),(240,'Pinto',37),(241,'Portezuelo',37),(242,'Quillón',37),(243,'Quirihue',37),(244,'Ránquil',37),(245,'San Carlos',37),(246,'San Fabián',37),(247,'San Ignacio',37),(248,'San Nicolás',37),(249,'Treguaco',37),(250,'Yungay',37),(251,'Carahue',38),(252,'Cholchol',38),(253,'Cunco',38),(254,'Curarrehue',38),(255,'Freire',38),(256,'Galvarino',38),(257,'Gorbea',38),(258,'Lautaro',38),(259,'Loncoche',38),(260,'Melipeuco',38),(261,'Nueva Imperial',38),(262,'Padre Las Casas',38),(263,'Perquenco',38),(264,'Pitrufquén',38),(265,'Pucón',38),(266,'Saavedra',38),(267,'Temuco',38),(268,'Teodoro Schmidt',38),(269,'Toltén',38),(270,'Vilcún',38),(271,'Villarrica',38),(272,'Angol',39),(273,'Collipulli',39),(274,'Curacautín',39),(275,'Ercilla',39),(276,'Lonquimay',39),(277,'Los Sauces',39),(278,'Lumaco',39),(279,'Purén',39),(280,'Renaico',39),(281,'Traiguén',39),(282,'Victoria',39),(283,'Corral',40),(284,'Lanco',40),(285,'Los Lagos',40),(286,'Máfil',40),(287,'Mariquina',40),(288,'Paillaco',40),(289,'Panguipulli',40),(290,'Valdivia',40),(291,'Futrono',41),(292,'La Unión',41),(293,'Lago Ranco',41),(294,'Río Bueno',41),(295,'Ancud',42),(296,'Castro',42),(297,'Chonchi',42),(298,'Curaco de Vélez',42),(299,'Dalcahue',42),(300,'Puqueldón',42),(301,'Queilén',42),(302,'Quemchi',42),(303,'Quellón',42),(304,'Quinchao',42),(305,'Calbuco',43),(306,'Cochamó',43),(307,'Fresia',43),(308,'Frutillar',43),(309,'Llanquihue',43),(310,'Los Muermos',43),(311,'Maullín',43),(312,'Puerto Montt',43),(313,'Puerto Varas',43),(314,'Osorno',44),(315,'Puero Octay',44),(316,'Purranque',44),(317,'Puyehue',44),(318,'Río Negro',44),(319,'San Juan de la Costa',44),(320,'San Pablo',44),(321,'Chaitén',45),(322,'Futaleufú',45),(323,'Hualaihué',45),(324,'Palena',45),(325,'Aisén',46),(326,'Cisnes',46),(327,'Guaitecas',46),(328,'Cochrane',47),(329,'O\'higgins',47),(330,'Tortel',47),(331,'Coihaique',48),(332,'Lago Verde',48),(333,'Chile Chico',49),(334,'Río Ibáñez',49),(335,'Antártica',50),(336,'Cabo de Hornos',50),(337,'Laguna Blanca',51),(338,'Punta Arenas',51),(339,'Río Verde',51),(340,'San Gregorio',51),(341,'Porvenir',52),(342,'Primavera',52),(343,'Timaukel',52),(344,'Natales',53),(345,'Torres del Paine',53);
/*!40000 ALTER TABLE `comunas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concepto`
--

DROP TABLE IF EXISTS `concepto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `concepto` (
  `concepto_id` int(10) NOT NULL AUTO_INCREMENT,
  `concepto_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`concepto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concepto`
--

LOCK TABLES `concepto` WRITE;
/*!40000 ALTER TABLE `concepto` DISABLE KEYS */;
INSERT INTO `concepto` VALUES (1,'Calidad'),(2,'Condicion');
/*!40000 ALTER TABLE `concepto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `defecto`
--

DROP TABLE IF EXISTS `defecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `defecto` (
  `defecto_id` int(10) NOT NULL,
  `defecto_nombre` varchar(50) DEFAULT NULL,
  `zona_id` int(10) DEFAULT NULL,
  `concepto_id` int(10) DEFAULT NULL,
  `grupo_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`defecto_id`),
  KEY `zona_id` (`zona_id`),
  KEY `concepto_id` (`concepto_id`),
  KEY `grupo_id` (`grupo_id`),
  CONSTRAINT `defecto_ibfk_1` FOREIGN KEY (`zona_id`) REFERENCES `zona_defecto` (`zona_id`),
  CONSTRAINT `defecto_ibfk_2` FOREIGN KEY (`concepto_id`) REFERENCES `concepto` (`concepto_id`),
  CONSTRAINT `defecto_ibfk_3` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `defecto`
--

LOCK TABLES `defecto` WRITE;
/*!40000 ALTER TABLE `defecto` DISABLE KEYS */;
INSERT INTO `defecto` VALUES (1,'Racimo Bajo Calibre',1,1,1),(2,'Racimo Bajo Color',1,1,1),(3,'Racimo Fuera de Color',1,1,1),(4,'Racimo Apretado',1,1,1),(5,'Racimo Bajo Brix',1,1,1),(6,'Racimo Deforme',1,1,1),(7,'Manchas(Russet, golpe de sol, trips, etc.)',2,1,2),(8,'Racimo Debil/Cristalino',1,2,3),(9,'Raquis Deshidratado',1,2,3),(10,'Racimo Humedo/Pegajoso',1,2,3),(11,'Partiduras - Heridas Abiertas',2,2,4),(12,'Acuosas',2,2,4),(13,'Bayas Reventas',2,2,4),(14,'Oidio',1,1,4),(15,'Pudrición ácida',2,2,5),(16,'Calidad Racimo',1,1,NULL),(17,'Calidad Bayas',2,1,NULL),(18,'Condicion Racimo',1,2,NULL),(19,'Condicion Bayas',2,2,NULL),(20,'Desgrane',1,1,6),(21,'Penicillium',2,1,5),(22,'Botritys (Piel suelta)',2,1,5),(23,'Apariencia',2,1,7);
/*!40000 ALTER TABLE `defecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `embalaje`
--

DROP TABLE IF EXISTS `embalaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `embalaje` (
  `embalaje_id` int(10) NOT NULL AUTO_INCREMENT,
  `embalaje_nombre` varchar(255) DEFAULT NULL,
  `categoria_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`embalaje_id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `embalaje_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `embalaje`
--

LOCK TABLES `embalaje` WRITE;
/*!40000 ALTER TABLE `embalaje` DISABLE KEYS */;
INSERT INTO `embalaje` VALUES (1,'CGE820',1),(2,'CZG820',1),(3,'CGE900',1),(4,'CGE100',1),(5,'MZL820',1),(6,'PZL820',1),(7,'CZN820',2),(8,'CZV820',2),(9,'CZN82D',2),(10,'CZV82D',2),(11,'CZP820',2),(12,'CEE450',2),(13,'CZW820',2),(14,'CCW820',2),(15,'CCC820',2),(16,'MZL820',2);
/*!40000 ALTER TABLE `embalaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especie`
--

DROP TABLE IF EXISTS `especie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `especie` (
  `especie_id` int(10) NOT NULL AUTO_INCREMENT,
  `especie_nombre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`especie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES (1,'UVA');
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_muestra`
--

DROP TABLE IF EXISTS `estado_muestra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `estado_muestra` (
  `estado_muestra_id` int(10) NOT NULL AUTO_INCREMENT,
  `estado_muestra_nombre` varchar(10) DEFAULT NULL,
  `estado_muestra_terminado` int(1) DEFAULT NULL,
  PRIMARY KEY (`estado_muestra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_muestra`
--

LOCK TABLES `estado_muestra` WRITE;
/*!40000 ALTER TABLE `estado_muestra` DISABLE KEYS */;
INSERT INTO `estado_muestra` VALUES (1,'proceso',0),(2,'rechazado',0),(3,'terminado',NULL);
/*!40000 ALTER TABLE `estado_muestra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiqueta`
--

DROP TABLE IF EXISTS `etiqueta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `etiqueta` (
  `etiqueta_id` int(10) NOT NULL AUTO_INCREMENT,
  `etiqueta_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`etiqueta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiqueta`
--

LOCK TABLES `etiqueta` WRITE;
/*!40000 ALTER TABLE `etiqueta` DISABLE KEYS */;
INSERT INTO `etiqueta` VALUES (1,'Santa Maria'),(2,'Walmart'),(3,'Caravels'),(4,'Three Caravels'),(5,'Gold Tiger'),(6,'Lucky Panda'),(7,'Sam\'s'),(8,'Costco');
/*!40000 ALTER TABLE `etiqueta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `grupo` (
  `grupo_id` int(10) NOT NULL AUTO_INCREMENT,
  `grupo_nombre` varchar(255) DEFAULT NULL,
  `grupo_descripcion` varchar(500) DEFAULT NULL,
  `zona_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`grupo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,'Calidad de Racimo','% suma de defectos calidad',1),(2,'Calidad de Baya','Nro de bayas , Rango Califica',2),(3,'Condición de Racimo','% suma defecto condicion',1),(4,'Condicion de Bayas','Nro de bayas, Rango Califica',2),(5,'Pudriciones','Objeta , Segunda o tercera caja',3),(6,'Desgrane','Gramos , porcentaje',3),(7,'Apariencia','Evaluado segun valor',3);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lote`
--

DROP TABLE IF EXISTS `lote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `lote` (
  `lote_id` int(10) NOT NULL AUTO_INCREMENT,
  `lote_codigo` varchar(50) DEFAULT NULL,
  `lote_cajas` int(10) DEFAULT NULL,
  `nota_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`lote_id`),
  KEY `nota_id` (`nota_id`),
  CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`lote_id`) REFERENCES `muestra` (`muestra_id`),
  CONSTRAINT `lote_ibfk_2` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`nota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lote`
--

LOCK TABLES `lote` WRITE;
/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
/*!40000 ALTER TABLE `lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2018_12_27_141728_create_products_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muestra`
--

DROP TABLE IF EXISTS `muestra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `muestra` (
  `muestra_id` int(10) NOT NULL AUTO_INCREMENT,
  `muestra_fecha` datetime DEFAULT NULL,
  `muestra_qr` varchar(50) DEFAULT NULL,
  `region_id` int(10) DEFAULT NULL,
  `productor_id` int(10) DEFAULT NULL,
  `especie_id` int(10) DEFAULT NULL,
  `variedad_id` int(10) DEFAULT NULL,
  `calibre_id` int(10) DEFAULT NULL,
  `categoria_id` int(10) DEFAULT NULL,
  `embalaje_id` int(10) DEFAULT NULL,
  `etiqueta_id` int(10) DEFAULT NULL,
  `muestra_imagen` varchar(255) DEFAULT NULL,
  `nota_id` int(10) DEFAULT NULL,
  `muestra_cajas` int(10) DEFAULT NULL,
  `lote_codigo` int(10) DEFAULT NULL,
  `muestra_peso` bigint(100) DEFAULT NULL,
  `estado_muestra_id` int(10) DEFAULT NULL,
  `apariencia_id` int(11) DEFAULT NULL,
  `muestra_bolsas` int(255) DEFAULT NULL,
  `muestra_racimos` int(255) DEFAULT NULL,
  `muestra_brix` decimal(10,2) DEFAULT NULL,
  `muestra_desgrane` int(10) DEFAULT NULL,
  PRIMARY KEY (`muestra_id`),
  KEY `region_id` (`region_id`),
  KEY `variedad_id` (`variedad_id`),
  KEY `especie_id` (`especie_id`),
  KEY `etiqueta_id` (`etiqueta_id`),
  KEY `calibre_id` (`calibre_id`),
  KEY `embalaje_id` (`embalaje_id`),
  KEY `nota_id` (`nota_id`),
  KEY `productor_id` (`productor_id`),
  KEY `muestra_ibfk_9` (`estado_muestra_id`),
  KEY `muestra_ibfk_10` (`apariencia_id`),
  CONSTRAINT `muestra_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`region_id`),
  CONSTRAINT `muestra_ibfk_10` FOREIGN KEY (`apariencia_id`) REFERENCES `apariencia` (`apariencia_id`),
  CONSTRAINT `muestra_ibfk_2` FOREIGN KEY (`variedad_id`) REFERENCES `variedad` (`variedad_id`),
  CONSTRAINT `muestra_ibfk_3` FOREIGN KEY (`especie_id`) REFERENCES `especie` (`especie_id`),
  CONSTRAINT `muestra_ibfk_4` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiqueta` (`etiqueta_id`),
  CONSTRAINT `muestra_ibfk_5` FOREIGN KEY (`calibre_id`) REFERENCES `calibre` (`calibre_id`),
  CONSTRAINT `muestra_ibfk_6` FOREIGN KEY (`embalaje_id`) REFERENCES `embalaje` (`embalaje_id`),
  CONSTRAINT `muestra_ibfk_7` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`nota_id`),
  CONSTRAINT `muestra_ibfk_8` FOREIGN KEY (`productor_id`) REFERENCES `productor` (`productor_id`),
  CONSTRAINT `muestra_ibfk_9` FOREIGN KEY (`estado_muestra_id`) REFERENCES `estado_muestra` (`estado_muestra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2801 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muestra`
--

LOCK TABLES `muestra` WRITE;
/*!40000 ALTER TABLE `muestra` DISABLE KEYS */;
INSERT INTO `muestra` VALUES (2799,'2019-01-15 00:00:00','1',9,34,1,1,1,1,15,3,NULL,1,NULL,NULL,1000,1,NULL,NULL,NULL,NULL,NULL),(2800,'2019-01-08 00:00:00','789789',9,34,1,1,1,1,15,3,NULL,3,NULL,NULL,4000,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `muestra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muestra_defecto`
--

DROP TABLE IF EXISTS `muestra_defecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `muestra_defecto` (
  `muestra_defecto_id` int(10) NOT NULL AUTO_INCREMENT,
  `muestra_id` int(10) DEFAULT NULL,
  `defecto_id` int(10) DEFAULT NULL,
  `muestra_defecto_valor` decimal(10,2) DEFAULT NULL,
  `nota_id` int(10) DEFAULT NULL,
  `muestra_defecto_calculo` decimal(30,2) DEFAULT NULL,
  PRIMARY KEY (`muestra_defecto_id`),
  KEY `muestra_id` (`muestra_id`),
  KEY `defecto_id` (`defecto_id`),
  CONSTRAINT `muestra_defecto_ibfk_1` FOREIGN KEY (`muestra_id`) REFERENCES `muestra` (`muestra_id`),
  CONSTRAINT `muestra_defecto_ibfk_2` FOREIGN KEY (`defecto_id`) REFERENCES `defecto` (`defecto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muestra_defecto`
--

LOCK TABLES `muestra_defecto` WRITE;
/*!40000 ALTER TABLE `muestra_defecto` DISABLE KEYS */;
INSERT INTO `muestra_defecto` VALUES (13,2799,7,100.00,5,100.00),(14,2799,14,1000.00,5,1000.00),(15,2799,1,100.00,5,10.00);
/*!40000 ALTER TABLE `muestra_defecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muestra_imagen`
--

DROP TABLE IF EXISTS `muestra_imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `muestra_imagen` (
  `muestra_imagen_id` int(10) NOT NULL AUTO_INCREMENT,
  `muestra_imagen_ruta` varchar(1000) DEFAULT NULL,
  `muestra_imagen_fecha` date DEFAULT NULL,
  `muestra_id` int(10) DEFAULT NULL,
  `muestra_imagen_texto` varchar(1000) DEFAULT NULL,
  `muestra_imagen_ruta_corta` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`muestra_imagen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muestra_imagen`
--

LOCK TABLES `muestra_imagen` WRITE;
/*!40000 ALTER TABLE `muestra_imagen` DISABLE KEYS */;
/*!40000 ALTER TABLE `muestra_imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota`
--

DROP TABLE IF EXISTS `nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nota` (
  `nota_id` int(10) NOT NULL AUTO_INCREMENT,
  `nota_nombre` varchar(255) DEFAULT NULL,
  `nota_descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota`
--

LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
INSERT INTO `nota` VALUES (1,'A','Fruta sobresaliente tanto en Calidad como en Condicion'),(2,'B','Fruta de buena Calidad y Condicion'),(3,'C','Fruta que apenas esta dentro de los limites de aceptacion'),(4,'O','Fruta que sobrepasa levemente la tolerancia Maxima de defectos'),(5,'X','rechazo');
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','fY3PxXRKyqoJvTGBwyO4CyAONT3OBVG7bvnutPqb','http://localhost',1,0,0,'2018-12-27 19:01:46','2018-12-27 19:01:46'),(2,NULL,'Laravel Password Grant Client','KJmdCTPa38E7m0vsVTJwHKQQVEwDlXXpKipjCCfR','http://localhost',0,1,0,'2018-12-27 19:01:46','2018-12-27 19:01:46');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2018-12-27 19:01:46','2018-12-27 19:01:46');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_usuario`
--

DROP TABLE IF EXISTS `perfil_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `perfil_usuario` (
  `perfil_id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_nombre` varchar(255) DEFAULT NULL,
  `perfil_detalle` varchar(255) DEFAULT NULL,
  `perfil_estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`perfil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_usuario`
--

LOCK TABLES `perfil_usuario` WRITE;
/*!40000 ALTER TABLE `perfil_usuario` DISABLE KEYS */;
INSERT INTO `perfil_usuario` VALUES (1,'Admin','Administrador','0'),(2,'Moderador','Moderador','0'),(3,'Cliente','Cliente','0');
/*!40000 ALTER TABLE `perfil_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productor`
--

DROP TABLE IF EXISTS `productor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `productor` (
  `productor_id` int(10) NOT NULL AUTO_INCREMENT,
  `productor_nombre` varchar(255) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`productor_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productor`
--

LOCK TABLES `productor` WRITE;
/*!40000 ALTER TABLE `productor` DISABLE KEYS */;
INSERT INTO `productor` VALUES (1,'AGR. SANTA FILOMENA LTDA.(CSP 108380)',7),(2,'AGR.LAS DOS AMALIAS LTDA.(CSP 118003) \r',1),(3,'AGRIC.LOS ROSALES-ONGOLMO LTDA(CSG 151285) \r',1),(4,'AGRICOLA E INM. SAN ANDRES LTDA',1),(5,'AGRICOLA LA VEGA LTDA \r',1),(6,'AGRICOLA LIRA GARCES LTDA (CSG 107686) \r',1),(7,'AGRICOLA LOS CULENES SPA (CSP 114174) \r',1),(8,'AGRICOLA SAN JOSE LTDA (CSP 122105) \r',1),(9,'AGRICOLA SANTA LAURA LTDA (CSP 119365) \r',1),(10,'AGRICOLA SANTA MAGDALENA LTDA \r',1),(11,'AGRICOLA SIETE HERMANOS LTDA \r',1),(12,'AGROPECUARIA FIORALBA LTDA \r',1),(13,'ASESORIAS Y ADM.AGRICOLAS LTDA (CSP 113996)) \r',1),(14,'JOSE MIGUEL VERGARA CUEVAS (CSP 118221) \r',1),(15,'SANTA MARIA DE PUQUILLAY LTDA.(CSP 110538)',1),(16,'SOC.AGR.SANTA CATALINA LTDA (CSP 114290) \r',1),(17,'AGROUVA S.A. (CSP 113460) \r',1),(18,'EMPRESA AGRICOLA H.C.LTDA (CSP 121473) \r',1),(19,'AGRICOLA BROWN LTDA (CSP 96226) \r',1),(20,'AGRICOLA EL PIMIENTO LTDA \r',1),(21,'AGRICOLA FRONTERA LTDA \r',1),(22,'AGRIFRUT LTDA (CSP 113270) \r',1),(23,'JOSE MANUEL CARTER (CSP 114106) \r',1),(24,'MARIA SUSANA MARTINI (CSP 112676) \r',1),(25,'MARIO CORDERO MU¥OZ \r',1),(26,'SILVIO ZENTENO ASPEE \r',1),(27,'SOCIEDAD AGRICOLA BEYLIK LTDA \r',1),(28,'AGRO.CORSSEN HNOS. LTDA (CSP 112761) \r',1),(29,'ENRIQUE GAYTAN ARCOS (CSP 99849) \r',1),(30,'FRANCISCO ARDILES ROJAS (CSP 117928) \r',1),(31,'OSCAR LEYTON PAEZ (CSP 91230) \r',1),(32,'YUBIRCE ARDILES JORQUERA (CSP 117928) \r',1),(33,'ZULECOM (CSP 112783) \r',1),(34,'PRODUCTOR DE PRUEBA',9);
/*!40000 ALTER TABLE `productor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `provincias` (
  `provincia_id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia_nombre` varchar(64) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`provincia_id`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `provincias_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Arica',1),(2,'Parinacota',1),(3,'Iquique',2),(4,'El Tamarugal',2),(5,'Antofagasta',3),(6,'El Loa',3),(7,'Tocopilla',3),(8,'Chañaral',4),(9,'Copiapó',4),(10,'Huasco',4),(11,'Choapa',5),(12,'Elqui',5),(13,'Limarí',5),(14,'Isla de Pascua',6),(15,'Los Andes',6),(16,'Petorca',6),(17,'Quillota',6),(18,'San Antonio',6),(19,'San Felipe de Aconcagua',6),(20,'Valparaiso',6),(21,'Chacabuco',7),(22,'Cordillera',7),(23,'Maipo',7),(24,'Melipilla',7),(25,'Santiago',7),(26,'Talagante',7),(27,'Cachapoal',8),(28,'Cardenal Caro',8),(29,'Colchagua',8),(30,'Cauquenes',9),(31,'Curicó',9),(32,'Linares',9),(33,'Talca',9),(34,'Arauco',10),(35,'Bio Bío',10),(36,'Concepción',10),(37,'Ñuble',10),(38,'Cautín',11),(39,'Malleco',11),(40,'Valdivia',12),(41,'Ranco',12),(42,'Chiloé',13),(43,'Llanquihue',13),(44,'Osorno',13),(45,'Palena',13),(46,'Aisén',14),(47,'Capitán Prat',14),(48,'Coihaique',14),(49,'General Carrera',14),(50,'Antártica Chilena',15),(51,'Magallanes',15),(52,'Tierra del Fuego',15),(53,'Última Esperanza',15);
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regiones`
--

DROP TABLE IF EXISTS `regiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `regiones` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_nombre` varchar(64) NOT NULL,
  `region_ordinal` varchar(4) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regiones`
--

LOCK TABLES `regiones` WRITE;
/*!40000 ALTER TABLE `regiones` DISABLE KEYS */;
INSERT INTO `regiones` VALUES (1,'Arica y Parinacota','XV'),(2,'Tarapacá','I'),(3,'Antofagasta','II'),(4,'Atacama','III'),(5,'Coquimbo','IV'),(6,'Valparaiso','V'),(7,'Metropolitana de Santiago','RM'),(8,'Libertador General Bernardo O\'Higgins','VI'),(9,'Maule','VII'),(10,'Biobío','VIII'),(11,'La Araucanía','IX'),(12,'Los Ríos','XIV'),(13,'Los Lagos','X'),(14,'Aisén del General Carlos Ibáñez del Campo','XI'),(15,'Magallanes y de la Antártica Chilena','XII');
/*!40000 ALTER TABLE `regiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tolerancia`
--

DROP TABLE IF EXISTS `tolerancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tolerancia` (
  `tolerancia_id` int(10) NOT NULL AUTO_INCREMENT,
  `defecto_id` int(10) DEFAULT NULL,
  `categoria_id` int(10) DEFAULT NULL,
  `nota_id` int(10) DEFAULT NULL,
  `tolerancia_desde` decimal(10,2) DEFAULT NULL,
  `tolerancia_hasta` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`tolerancia_id`),
  KEY `defecto_id` (`defecto_id`),
  KEY `nota_id` (`nota_id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `tolerancia_ibfk_1` FOREIGN KEY (`defecto_id`) REFERENCES `defecto` (`defecto_id`),
  CONSTRAINT `tolerancia_ibfk_2` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`nota_id`),
  CONSTRAINT `tolerancia_ibfk_3` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tolerancia`
--

LOCK TABLES `tolerancia` WRITE;
/*!40000 ALTER TABLE `tolerancia` DISABLE KEYS */;
INSERT INTO `tolerancia` VALUES (1,16,1,1,0.00,4.00),(2,16,2,1,0.00,4.00),(3,17,1,1,0.00,5.00),(4,17,2,1,0.00,6.00),(5,16,1,2,4.00,7.00),(6,16,2,2,4.00,8.00),(7,17,1,2,5.00,10.00),(8,17,2,2,6.00,12.00),(9,16,2,3,8.00,10.00),(10,17,2,3,12.00,20.00),(11,16,2,4,10.00,100.00),(12,17,2,4,20.00,100.00);
/*!40000 ALTER TABLE `tolerancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tolerancia_grupo`
--

DROP TABLE IF EXISTS `tolerancia_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tolerancia_grupo` (
  `tolerancia_grupo_id` int(10) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(10) DEFAULT NULL,
  `categoria_id` int(10) DEFAULT NULL,
  `nota_id` int(10) DEFAULT NULL,
  `tolerancia_grupo_desde` decimal(10,2) DEFAULT NULL,
  `tolerancia_grupo_hasta` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`tolerancia_grupo_id`),
  KEY `grupo_id` (`grupo_id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `nota_id` (`nota_id`),
  CONSTRAINT `tolerancia_grupo_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`),
  CONSTRAINT `tolerancia_grupo_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  CONSTRAINT `tolerancia_grupo_ibfk_3` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`nota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tolerancia_grupo`
--

LOCK TABLES `tolerancia_grupo` WRITE;
/*!40000 ALTER TABLE `tolerancia_grupo` DISABLE KEYS */;
INSERT INTO `tolerancia_grupo` VALUES (1,1,2,1,0.00,4.00),(2,2,2,1,0.00,6.00),(3,3,2,1,0.00,3.00),(4,4,2,1,0.00,5.00),(5,5,2,1,0.00,0.00),(6,6,2,1,0.00,2.00),(7,1,1,1,0.00,4.00),(8,2,1,1,0.00,5.00),(9,3,1,1,0.00,3.00),(10,4,1,1,0.00,5.00),(11,5,1,1,0.00,0.00),(12,6,1,1,0.00,2.00),(13,1,2,2,4.01,8.00),(14,2,2,2,6.01,12.00),(15,3,2,2,3.01,5.00),(16,4,2,2,5.01,8.00),(17,5,2,2,0.00,0.00),(18,6,2,2,2.01,4.00),(19,1,1,2,4.01,7.00),(20,2,1,2,5.01,10.00),(21,3,1,2,3.01,5.00),(22,4,1,2,5.01,8.00),(23,5,1,2,0.00,0.00),(24,6,1,2,2.01,3.00),(25,1,2,3,8.01,10.00),(26,2,2,3,12.01,20.00),(27,3,2,3,5.01,7.00),(28,4,2,3,8.01,12.00),(29,5,2,3,0.00,0.00),(30,6,2,3,4.01,5.00),(31,1,2,4,10.01,100.00),(32,2,2,4,20.01,1000.00),(33,3,2,4,7.01,1000.00),(34,4,2,4,12.01,1000.00),(35,5,2,4,0.00,1000.00),(36,6,2,4,5.01,1000.00);
/*!40000 ALTER TABLE `tolerancia_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `perfil_id` int(4) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'francisco carrasco','xnofub@gmail.com',NULL,'$2y$10$6OSS1gv4bHOPCeWz3gMg5uGLI0AnJvG3WDz8Gdud7kndtBFpmVsWS',1,'3ChVynMHh0QJ9mvTl5qGERB73e0KG1YETyhbWYCllf1l2iL1STK8LiTdg8t4','2018-12-27 20:31:38','2018-12-27 20:31:38'),(2,'Ricardo Parra','ricardoparramolina@gmail.com',NULL,'$2y$10$Tl.eRWqWbUPWDkZ8yQ6Sg.8VdWAcY8V.K0V9BP7pYwBsEukHtd1pC',1,'sSKuhDwee1UExMYRVpJQBXQK9X3kG8TDFYwJNzjy4XqOr7UwuN8W3gLgnQOR','2018-12-28 07:19:16','2018-12-28 07:19:16'),(3,'esteban','esteban@mail.cl',NULL,'$2y$10$o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',1,NULL,'2019-01-16 23:15:27','2019-01-16 23:15:27'),(4,'José torres','atorres@ayaconsultora.com',NULL,'o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',1,NULL,NULL,NULL),(5,'Ignacio Araya ','iaraya@ayaconsumtora.com',NULL,'o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',1,NULL,NULL,NULL),(6,'Diego Sahady ','Dsahady@ayaconsultora.com ',NULL,'o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',1,NULL,NULL,NULL),(7,'Rodrigo Rojas','Rodrigor@cfsm.cl',NULL,'o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',3,NULL,NULL,NULL),(8,'Andres Flores','Andresf@cfsm.cl',NULL,'o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',3,NULL,NULL,NULL),(9,'Pablo Rojas','Pablor@cfsm.cl',NULL,'o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',3,NULL,NULL,NULL),(10,'Patricio Tapia','Patriciot@cfsm.cl ',NULL,'o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',3,NULL,NULL,NULL),(11,'Eduardo Caceres','Eduardo@cfsm.cl ',NULL,'o0K6REB5ogLNtdtGYK.nseKsctzryZbAVus6cieVPMv23BaILtjWq',3,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variedad`
--

DROP TABLE IF EXISTS `variedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `variedad` (
  `variedad_id` int(10) NOT NULL AUTO_INCREMENT,
  `variedad_nombre` varchar(255) DEFAULT NULL,
  `varidad_codigo` varchar(100) DEFAULT NULL,
  `especie_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`variedad_id`),
  KEY `especie_id` (`especie_id`),
  CONSTRAINT `variedad_ibfk_1` FOREIGN KEY (`especie_id`) REFERENCES `especie` (`especie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variedad`
--

LOCK TABLES `variedad` WRITE;
/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
INSERT INTO `variedad` VALUES (1,'AUTUMN ROYAL \r',NULL,1),(2,'BLACK SEEDLESS \r',NULL,1),(3,'CRIMSON SEEDLESS \r',NULL,1),(4,'FLAME SEEDLESS \r',NULL,1),(5,'INIA GRAPE ONE \r',NULL,1),(6,'MAYLEN (INIA GRAPE ONE cv) \r',NULL,1),(7,'PERLON \r',NULL,1),(8,'PRINCESS SEEDLESS \r',NULL,1),(9,'SUGRAONE  \r',NULL,1),(10,'SUGRAFOURTEEN (RED SUPERIOR SEEDLESS) \r',NULL,1),(11,'SUGRASIXTEEN (SABLE SEEDLESS) \r',NULL,1),(12,'SUGRATWELVE (COACHELLA SEEDLESS) \r',NULL,1),(13,'SUGRANINETEEN (SCARLOTTA SEEDLESS) \r',NULL,1),(14,'SHEEGENE 13 (TIMCO) \r',NULL,1),(15,'SHEEGENE 20 (ALLISON) \r',NULL,1),(16,'THOMPSON SEEDLESS \r',NULL,1),(17,'RED GLOBE \r',NULL,1);
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zona_defecto`
--

DROP TABLE IF EXISTS `zona_defecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `zona_defecto` (
  `zona_id` int(10) NOT NULL,
  `zona_nombre` varchar(50) DEFAULT NULL,
  `zona_descripcion` varchar(255) DEFAULT NULL,
  `medicion` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`zona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zona_defecto`
--

LOCK TABLES `zona_defecto` WRITE;
/*!40000 ALTER TABLE `zona_defecto` DISABLE KEYS */;
INSERT INTO `zona_defecto` VALUES (1,'Racimo','Defectos del Racimo',NULL),(2,'Baya','Defectos de Bayas','Q'),(3,'Otro','Defectos independientes',NULL);
/*!40000 ALTER TABLE `zona_defecto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-16 13:50:28
