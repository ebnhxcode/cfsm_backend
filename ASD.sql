/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.37-MariaDB : Database - cfsm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `apariencia` */

DROP TABLE IF EXISTS `apariencia`;

CREATE TABLE `apariencia` (
  `apariencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `apariencia_nombre` varchar(255) DEFAULT NULL,
  `apariencia_descripcion` varchar(500) DEFAULT NULL,
  `nota_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`apariencia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `apariencia` */

LOCK TABLES `apariencia` WRITE;

insert  into `apariencia`(`apariencia_id`,`apariencia_nombre`,`apariencia_descripcion`,`nota_id`) values (1,'Exelente',NULL,1);
insert  into `apariencia`(`apariencia_id`,`apariencia_nombre`,`apariencia_descripcion`,`nota_id`) values (2,'Buena',NULL,2);
insert  into `apariencia`(`apariencia_id`,`apariencia_nombre`,`apariencia_descripcion`,`nota_id`) values (3,'Regular','C',3);
insert  into `apariencia`(`apariencia_id`,`apariencia_nombre`,`apariencia_descripcion`,`nota_id`) values (4,'Mala','O',4);

UNLOCK TABLES;

/*Table structure for table `calibre` */

DROP TABLE IF EXISTS `calibre`;

CREATE TABLE `calibre` (
  `calibre_id` int(10) NOT NULL AUTO_INCREMENT,
  `calibre_nombre` varchar(10) DEFAULT NULL,
  `especie_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`calibre_id`),
  KEY `especie_id` (`especie_id`),
  CONSTRAINT `calibre_ibfk_1` FOREIGN KEY (`especie_id`) REFERENCES `especie` (`especie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `calibre` */

LOCK TABLES `calibre` WRITE;

insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (1,'600',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (2,'700',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (3,'900',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (4,'990',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (5,'660',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (6,'770',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (7,'880',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (8,'980',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (9,'M',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (10,'L',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (11,'XL',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (12,'XXL',1);
insert  into `calibre`(`calibre_id`,`calibre_nombre`,`especie_id`) values (13,'XXXL',1);

UNLOCK TABLES;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `categoria_id` int(10) NOT NULL AUTO_INCREMENT,
  `categoria_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

insert  into `categoria`(`categoria_id`,`categoria_nombre`) values (1,'Premium');
insert  into `categoria`(`categoria_id`,`categoria_nombre`) values (2,'Standard');

UNLOCK TABLES;

/*Table structure for table `comunas` */

DROP TABLE IF EXISTS `comunas`;

CREATE TABLE `comunas` (
  `comuna_id` int(11) NOT NULL AUTO_INCREMENT,
  `comuna_nombre` varchar(64) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  PRIMARY KEY (`comuna_id`),
  KEY `provincia_id` (`provincia_id`),
  CONSTRAINT `comunas_ibfk_1` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`provincia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8;

/*Data for the table `comunas` */

LOCK TABLES `comunas` WRITE;

insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (1,'Arica',1);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (2,'Camarones',1);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (3,'General Lagos',2);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (4,'Putre',2);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (5,'Alto Hospicio',3);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (6,'Iquique',3);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (7,'Camiña',4);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (8,'Colchane',4);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (9,'Huara',4);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (10,'Pica',4);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (11,'Pozo Almonte',4);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (12,'Antofagasta',5);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (13,'Mejillones',5);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (14,'Sierra Gorda',5);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (15,'Taltal',5);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (16,'Calama',6);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (17,'Ollague',6);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (18,'San Pedro de Atacama',6);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (19,'María Elena',7);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (20,'Tocopilla',7);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (21,'Chañaral',8);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (22,'Diego de Almagro',8);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (23,'Caldera',9);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (24,'Copiapó',9);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (25,'Tierra Amarilla',9);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (26,'Alto del Carmen',10);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (27,'Freirina',10);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (28,'Huasco',10);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (29,'Vallenar',10);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (30,'Canela',11);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (31,'Illapel',11);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (32,'Los Vilos',11);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (33,'Salamanca',11);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (34,'Andacollo',12);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (35,'Coquimbo',12);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (36,'La Higuera',12);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (37,'La Serena',12);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (38,'Paihuaco',12);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (39,'Vicuña',12);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (40,'Combarbalá',13);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (41,'Monte Patria',13);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (42,'Ovalle',13);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (43,'Punitaqui',13);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (44,'Río Hurtado',13);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (45,'Isla de Pascua',14);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (46,'Calle Larga',15);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (47,'Los Andes',15);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (48,'Rinconada',15);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (49,'San Esteban',15);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (50,'La Ligua',16);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (51,'Papudo',16);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (52,'Petorca',16);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (53,'Zapallar',16);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (54,'Hijuelas',17);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (55,'La Calera',17);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (56,'La Cruz',17);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (57,'Limache',17);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (58,'Nogales',17);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (59,'Olmué',17);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (60,'Quillota',17);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (61,'Algarrobo',18);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (62,'Cartagena',18);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (63,'El Quisco',18);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (64,'El Tabo',18);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (65,'San Antonio',18);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (66,'Santo Domingo',18);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (67,'Catemu',19);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (68,'Llaillay',19);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (69,'Panquehue',19);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (70,'Putaendo',19);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (71,'San Felipe',19);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (72,'Santa María',19);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (73,'Casablanca',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (74,'Concón',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (75,'Juan Fernández',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (76,'Puchuncaví',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (77,'Quilpué',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (78,'Quintero',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (79,'Valparaíso',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (80,'Villa Alemana',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (81,'Viña del Mar',20);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (82,'Colina',21);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (83,'Lampa',21);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (84,'Tiltil',21);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (85,'Pirque',22);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (86,'Puente Alto',22);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (87,'San José de Maipo',22);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (88,'Buin',23);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (89,'Calera de Tango',23);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (90,'Paine',23);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (91,'San Bernardo',23);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (92,'Alhué',24);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (93,'Curacaví',24);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (94,'María Pinto',24);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (95,'Melipilla',24);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (96,'San Pedro',24);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (97,'Cerrillos',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (98,'Cerro Navia',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (99,'Conchalí',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (100,'El Bosque',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (101,'Estación Central',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (102,'Huechuraba',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (103,'Independencia',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (104,'La Cisterna',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (105,'La Granja',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (106,'La Florida',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (107,'La Pintana',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (108,'La Reina',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (109,'Las Condes',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (110,'Lo Barnechea',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (111,'Lo Espejo',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (112,'Lo Prado',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (113,'Macul',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (114,'Maipú',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (115,'Ñuñoa',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (116,'Pedro Aguirre Cerda',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (117,'Peñalolén',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (118,'Providencia',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (119,'Pudahuel',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (120,'Quilicura',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (121,'Quinta Normal',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (122,'Recoleta',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (123,'Renca',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (124,'San Miguel',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (125,'San Joaquín',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (126,'San Ramón',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (127,'Santiago',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (128,'Vitacura',25);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (129,'El Monte',26);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (130,'Isla de Maipo',26);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (131,'Padre Hurtado',26);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (132,'Peñaflor',26);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (133,'Talagante',26);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (134,'Codegua',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (135,'Coínco',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (136,'Coltauco',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (137,'Doñihue',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (138,'Graneros',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (139,'Las Cabras',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (140,'Machalí',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (141,'Malloa',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (142,'Mostazal',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (143,'Olivar',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (144,'Peumo',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (145,'Pichidegua',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (146,'Quinta de Tilcoco',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (147,'Rancagua',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (148,'Rengo',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (149,'Requínoa',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (150,'San Vicente de Tagua Tagua',27);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (151,'La Estrella',28);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (152,'Litueche',28);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (153,'Marchihue',28);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (154,'Navidad',28);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (155,'Peredones',28);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (156,'Pichilemu',28);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (157,'Chépica',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (158,'Chimbarongo',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (159,'Lolol',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (160,'Nancagua',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (161,'Palmilla',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (162,'Peralillo',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (163,'Placilla',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (164,'Pumanque',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (165,'San Fernando',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (166,'Santa Cruz',29);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (167,'Cauquenes',30);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (168,'Chanco',30);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (169,'Pelluhue',30);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (170,'Curicó',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (171,'Hualañé',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (172,'Licantén',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (173,'Molina',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (174,'Rauco',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (175,'Romeral',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (176,'Sagrada Familia',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (177,'Teno',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (178,'Vichuquén',31);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (179,'Colbún',32);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (180,'Linares',32);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (181,'Longaví',32);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (182,'Parral',32);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (183,'Retiro',32);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (184,'San Javier',32);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (185,'Villa Alegre',32);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (186,'Yerbas Buenas',32);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (187,'Constitución',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (188,'Curepto',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (189,'Empedrado',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (190,'Maule',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (191,'Pelarco',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (192,'Pencahue',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (193,'Río Claro',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (194,'San Clemente',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (195,'San Rafael',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (196,'Talca',33);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (197,'Arauco',34);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (198,'Cañete',34);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (199,'Contulmo',34);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (200,'Curanilahue',34);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (201,'Lebu',34);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (202,'Los Álamos',34);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (203,'Tirúa',34);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (204,'Alto Biobío',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (205,'Antuco',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (206,'Cabrero',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (207,'Laja',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (208,'Los Ángeles',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (209,'Mulchén',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (210,'Nacimiento',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (211,'Negrete',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (212,'Quilaco',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (213,'Quilleco',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (214,'San Rosendo',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (215,'Santa Bárbara',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (216,'Tucapel',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (217,'Yumbel',35);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (218,'Chiguayante',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (219,'Concepción',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (220,'Coronel',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (221,'Florida',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (222,'Hualpén',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (223,'Hualqui',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (224,'Lota',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (225,'Penco',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (226,'San Pedro de La Paz',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (227,'Santa Juana',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (228,'Talcahuano',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (229,'Tomé',36);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (230,'Bulnes',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (231,'Chillán',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (232,'Chillán Viejo',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (233,'Cobquecura',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (234,'Coelemu',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (235,'Coihueco',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (236,'El Carmen',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (237,'Ninhue',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (238,'Ñiquen',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (239,'Pemuco',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (240,'Pinto',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (241,'Portezuelo',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (242,'Quillón',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (243,'Quirihue',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (244,'Ránquil',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (245,'San Carlos',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (246,'San Fabián',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (247,'San Ignacio',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (248,'San Nicolás',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (249,'Treguaco',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (250,'Yungay',37);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (251,'Carahue',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (252,'Cholchol',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (253,'Cunco',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (254,'Curarrehue',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (255,'Freire',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (256,'Galvarino',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (257,'Gorbea',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (258,'Lautaro',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (259,'Loncoche',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (260,'Melipeuco',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (261,'Nueva Imperial',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (262,'Padre Las Casas',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (263,'Perquenco',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (264,'Pitrufquén',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (265,'Pucón',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (266,'Saavedra',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (267,'Temuco',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (268,'Teodoro Schmidt',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (269,'Toltén',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (270,'Vilcún',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (271,'Villarrica',38);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (272,'Angol',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (273,'Collipulli',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (274,'Curacautín',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (275,'Ercilla',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (276,'Lonquimay',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (277,'Los Sauces',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (278,'Lumaco',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (279,'Purén',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (280,'Renaico',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (281,'Traiguén',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (282,'Victoria',39);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (283,'Corral',40);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (284,'Lanco',40);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (285,'Los Lagos',40);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (286,'Máfil',40);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (287,'Mariquina',40);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (288,'Paillaco',40);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (289,'Panguipulli',40);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (290,'Valdivia',40);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (291,'Futrono',41);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (292,'La Unión',41);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (293,'Lago Ranco',41);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (294,'Río Bueno',41);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (295,'Ancud',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (296,'Castro',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (297,'Chonchi',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (298,'Curaco de Vélez',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (299,'Dalcahue',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (300,'Puqueldón',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (301,'Queilén',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (302,'Quemchi',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (303,'Quellón',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (304,'Quinchao',42);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (305,'Calbuco',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (306,'Cochamó',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (307,'Fresia',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (308,'Frutillar',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (309,'Llanquihue',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (310,'Los Muermos',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (311,'Maullín',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (312,'Puerto Montt',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (313,'Puerto Varas',43);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (314,'Osorno',44);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (315,'Puero Octay',44);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (316,'Purranque',44);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (317,'Puyehue',44);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (318,'Río Negro',44);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (319,'San Juan de la Costa',44);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (320,'San Pablo',44);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (321,'Chaitén',45);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (322,'Futaleufú',45);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (323,'Hualaihué',45);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (324,'Palena',45);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (325,'Aisén',46);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (326,'Cisnes',46);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (327,'Guaitecas',46);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (328,'Cochrane',47);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (329,'O\'higgins',47);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (330,'Tortel',47);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (331,'Coihaique',48);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (332,'Lago Verde',48);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (333,'Chile Chico',49);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (334,'Río Ibáñez',49);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (335,'Antártica',50);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (336,'Cabo de Hornos',50);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (337,'Laguna Blanca',51);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (338,'Punta Arenas',51);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (339,'Río Verde',51);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (340,'San Gregorio',51);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (341,'Porvenir',52);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (342,'Primavera',52);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (343,'Timaukel',52);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (344,'Natales',53);
insert  into `comunas`(`comuna_id`,`comuna_nombre`,`provincia_id`) values (345,'Torres del Paine',53);

UNLOCK TABLES;

/*Table structure for table `concepto` */

DROP TABLE IF EXISTS `concepto`;

CREATE TABLE `concepto` (
  `concepto_id` int(10) NOT NULL AUTO_INCREMENT,
  `concepto_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`concepto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `concepto` */

LOCK TABLES `concepto` WRITE;

insert  into `concepto`(`concepto_id`,`concepto_nombre`) values (1,'Calidad');
insert  into `concepto`(`concepto_id`,`concepto_nombre`) values (2,'Condicion');

UNLOCK TABLES;

/*Table structure for table `defecto` */

DROP TABLE IF EXISTS `defecto`;

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

/*Data for the table `defecto` */

LOCK TABLES `defecto` WRITE;

insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (1,'Racimo Bajo Calibre',1,1,1);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (2,'Racimo Bajo Color',1,1,1);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (3,'Racimo Fuera de Color',1,1,1);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (4,'Racimo Apretado',1,1,1);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (5,'Racimo Bajo Brix',1,1,1);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (6,'Racimo Deforme',1,1,1);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (7,'Manchas(Russet, golpe de sol, trips, etc.)',2,1,2);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (8,'Racimo Debil/Cristalino',1,2,3);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (9,'Raquis Deshidratado',1,2,3);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (10,'Racimo Humedo/Pegajoso',1,2,3);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (11,'Partiduras - Heridas Abiertas',2,2,4);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (12,'Acuosas',2,2,4);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (13,'Bayas Reventas',2,2,4);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (14,'Oidio',1,1,4);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (15,'Pudrición ácida',2,2,5);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (16,'Calidad Racimo',1,1,NULL);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (17,'Calidad Bayas',2,1,NULL);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (18,'Condicion Racimo',1,2,NULL);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (19,'Condicion Bayas',2,2,NULL);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (20,'Desgrane',1,1,6);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (21,'Penicillium',2,1,5);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (22,'Botritys (Piel suelta)',2,1,5);
insert  into `defecto`(`defecto_id`,`defecto_nombre`,`zona_id`,`concepto_id`,`grupo_id`) values (23,'Apariencia',2,1,7);

UNLOCK TABLES;

/*Table structure for table `embalaje` */

DROP TABLE IF EXISTS `embalaje`;

CREATE TABLE `embalaje` (
  `embalaje_id` int(10) NOT NULL AUTO_INCREMENT,
  `embalaje_nombre` varchar(255) DEFAULT NULL,
  `categoria_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`embalaje_id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `embalaje_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `embalaje` */

LOCK TABLES `embalaje` WRITE;

insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (1,'CGE820',1);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (2,'CZG820',1);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (3,'CGE900',1);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (4,'CGE100',1);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (5,'MZL820',1);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (6,'PZL820',1);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (7,'CZN820',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (8,'CZV820',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (9,'CZN82D',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (10,'CZV82D',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (11,'CZP820',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (12,'CEE450',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (13,'CZW820',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (14,'CCW820',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (15,'CCC820',2);
insert  into `embalaje`(`embalaje_id`,`embalaje_nombre`,`categoria_id`) values (16,'MZL820',2);

UNLOCK TABLES;

/*Table structure for table `especie` */

DROP TABLE IF EXISTS `especie`;

CREATE TABLE `especie` (
  `especie_id` int(10) NOT NULL AUTO_INCREMENT,
  `especie_nombre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`especie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `especie` */

LOCK TABLES `especie` WRITE;

insert  into `especie`(`especie_id`,`especie_nombre`) values (1,'UVA');

UNLOCK TABLES;

/*Table structure for table `estado_muestra` */

DROP TABLE IF EXISTS `estado_muestra`;

CREATE TABLE `estado_muestra` (
  `estado_muestra_id` int(10) NOT NULL AUTO_INCREMENT,
  `estado_muestra_nombre` varchar(10) DEFAULT NULL,
  `estado_muestra_terminado` int(1) DEFAULT NULL,
  PRIMARY KEY (`estado_muestra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `estado_muestra` */

LOCK TABLES `estado_muestra` WRITE;

insert  into `estado_muestra`(`estado_muestra_id`,`estado_muestra_nombre`,`estado_muestra_terminado`) values (1,'proceso',0);
insert  into `estado_muestra`(`estado_muestra_id`,`estado_muestra_nombre`,`estado_muestra_terminado`) values (2,'rechazado',0);
insert  into `estado_muestra`(`estado_muestra_id`,`estado_muestra_nombre`,`estado_muestra_terminado`) values (3,'terminado',NULL);

UNLOCK TABLES;

/*Table structure for table `etiqueta` */

DROP TABLE IF EXISTS `etiqueta`;

CREATE TABLE `etiqueta` (
  `etiqueta_id` int(10) NOT NULL AUTO_INCREMENT,
  `etiqueta_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`etiqueta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `etiqueta` */

LOCK TABLES `etiqueta` WRITE;

insert  into `etiqueta`(`etiqueta_id`,`etiqueta_nombre`) values (1,'Santa Maria');
insert  into `etiqueta`(`etiqueta_id`,`etiqueta_nombre`) values (2,'Walmart');
insert  into `etiqueta`(`etiqueta_id`,`etiqueta_nombre`) values (3,'Caravels');
insert  into `etiqueta`(`etiqueta_id`,`etiqueta_nombre`) values (4,'Three Caravels');
insert  into `etiqueta`(`etiqueta_id`,`etiqueta_nombre`) values (5,'Gold Tiger');
insert  into `etiqueta`(`etiqueta_id`,`etiqueta_nombre`) values (6,'Lucky Panda');
insert  into `etiqueta`(`etiqueta_id`,`etiqueta_nombre`) values (7,'Sam\'s');
insert  into `etiqueta`(`etiqueta_id`,`etiqueta_nombre`) values (8,'Costco');

UNLOCK TABLES;

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `grupo_id` int(10) NOT NULL AUTO_INCREMENT,
  `grupo_nombre` varchar(255) DEFAULT NULL,
  `grupo_descripcion` varchar(500) DEFAULT NULL,
  `zona_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`grupo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

LOCK TABLES `grupo` WRITE;

insert  into `grupo`(`grupo_id`,`grupo_nombre`,`grupo_descripcion`,`zona_id`) values (1,'Calidad de Racimo','% suma de defectos calidad',1);
insert  into `grupo`(`grupo_id`,`grupo_nombre`,`grupo_descripcion`,`zona_id`) values (2,'Calidad de Baya','Nro de bayas , Rango Califica',2);
insert  into `grupo`(`grupo_id`,`grupo_nombre`,`grupo_descripcion`,`zona_id`) values (3,'Condición de Racimo','% suma defecto condicion',1);
insert  into `grupo`(`grupo_id`,`grupo_nombre`,`grupo_descripcion`,`zona_id`) values (4,'Condicion de Bayas','Nro de bayas, Rango Califica',2);
insert  into `grupo`(`grupo_id`,`grupo_nombre`,`grupo_descripcion`,`zona_id`) values (5,'Pudriciones','Objeta , Segunda o tercera caja',3);
insert  into `grupo`(`grupo_id`,`grupo_nombre`,`grupo_descripcion`,`zona_id`) values (6,'Desgrane','Gramos , porcentaje',3);
insert  into `grupo`(`grupo_id`,`grupo_nombre`,`grupo_descripcion`,`zona_id`) values (7,'Apariencia','Evaluado segun valor',3);

UNLOCK TABLES;

/*Table structure for table `lote` */

DROP TABLE IF EXISTS `lote`;

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

/*Data for the table `lote` */

LOCK TABLES `lote` WRITE;

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_100000_create_password_resets_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2016_06_01_000001_create_oauth_auth_codes_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2016_06_01_000002_create_oauth_access_tokens_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2016_06_01_000004_create_oauth_clients_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (8,'2018_12_27_141728_create_products_table',2);

UNLOCK TABLES;

/*Table structure for table `muestra` */

DROP TABLE IF EXISTS `muestra`;

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

/*Data for the table `muestra` */

LOCK TABLES `muestra` WRITE;

insert  into `muestra`(`muestra_id`,`muestra_fecha`,`muestra_qr`,`region_id`,`productor_id`,`especie_id`,`variedad_id`,`calibre_id`,`categoria_id`,`embalaje_id`,`etiqueta_id`,`muestra_imagen`,`nota_id`,`muestra_cajas`,`lote_codigo`,`muestra_peso`,`estado_muestra_id`,`apariencia_id`,`muestra_bolsas`,`muestra_racimos`,`muestra_brix`,`muestra_desgrane`) values (2799,'2019-01-15 00:00:00','1',9,34,1,1,1,1,15,3,NULL,1,NULL,NULL,1000,1,NULL,NULL,NULL,NULL,NULL);
insert  into `muestra`(`muestra_id`,`muestra_fecha`,`muestra_qr`,`region_id`,`productor_id`,`especie_id`,`variedad_id`,`calibre_id`,`categoria_id`,`embalaje_id`,`etiqueta_id`,`muestra_imagen`,`nota_id`,`muestra_cajas`,`lote_codigo`,`muestra_peso`,`estado_muestra_id`,`apariencia_id`,`muestra_bolsas`,`muestra_racimos`,`muestra_brix`,`muestra_desgrane`) values (2800,'2019-01-08 00:00:00','789789',9,34,1,1,1,1,15,3,NULL,3,NULL,NULL,4000,1,NULL,NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `muestra_defecto` */

DROP TABLE IF EXISTS `muestra_defecto`;

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

/*Data for the table `muestra_defecto` */

LOCK TABLES `muestra_defecto` WRITE;

insert  into `muestra_defecto`(`muestra_defecto_id`,`muestra_id`,`defecto_id`,`muestra_defecto_valor`,`nota_id`,`muestra_defecto_calculo`) values (13,2799,7,100.00,5,100.00);
insert  into `muestra_defecto`(`muestra_defecto_id`,`muestra_id`,`defecto_id`,`muestra_defecto_valor`,`nota_id`,`muestra_defecto_calculo`) values (14,2799,14,1000.00,5,1000.00);
insert  into `muestra_defecto`(`muestra_defecto_id`,`muestra_id`,`defecto_id`,`muestra_defecto_valor`,`nota_id`,`muestra_defecto_calculo`) values (15,2799,1,100.00,5,10.00);

UNLOCK TABLES;

/*Table structure for table `muestra_imagen` */

DROP TABLE IF EXISTS `muestra_imagen`;

CREATE TABLE `muestra_imagen` (
  `muestra_imagen_id` int(10) NOT NULL AUTO_INCREMENT,
  `muestra_imagen_ruta` varchar(1000) DEFAULT NULL,
  `muestra_imagen_fecha` date DEFAULT NULL,
  `muestra_id` int(10) DEFAULT NULL,
  `muestra_imagen_texto` varchar(1000) DEFAULT NULL,
  `muestra_imagen_ruta_corta` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`muestra_imagen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `muestra_imagen` */

LOCK TABLES `muestra_imagen` WRITE;

UNLOCK TABLES;

/*Table structure for table `nota` */

DROP TABLE IF EXISTS `nota`;

CREATE TABLE `nota` (
  `nota_id` int(10) NOT NULL AUTO_INCREMENT,
  `nota_nombre` varchar(255) DEFAULT NULL,
  `nota_descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `nota` */

LOCK TABLES `nota` WRITE;

insert  into `nota`(`nota_id`,`nota_nombre`,`nota_descripcion`) values (1,'A','Fruta sobresaliente tanto en Calidad como en Condicion');
insert  into `nota`(`nota_id`,`nota_nombre`,`nota_descripcion`) values (2,'B','Fruta de buena Calidad y Condicion');
insert  into `nota`(`nota_id`,`nota_nombre`,`nota_descripcion`) values (3,'C','Fruta que apenas esta dentro de los limites de aceptacion');
insert  into `nota`(`nota_id`,`nota_nombre`,`nota_descripcion`) values (4,'O','Fruta que sobrepasa levemente la tolerancia Maxima de defectos');
insert  into `nota`(`nota_id`,`nota_nombre`,`nota_descripcion`) values (5,'X','rechazo');

UNLOCK TABLES;

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oauth_access_tokens` */

LOCK TABLES `oauth_access_tokens` WRITE;

UNLOCK TABLES;

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oauth_auth_codes` */

LOCK TABLES `oauth_auth_codes` WRITE;

UNLOCK TABLES;

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oauth_clients` */

LOCK TABLES `oauth_clients` WRITE;

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (1,NULL,'Laravel Personal Access Client','fY3PxXRKyqoJvTGBwyO4CyAONT3OBVG7bvnutPqb','http://localhost',1,0,0,'2018-12-27 14:01:46','2018-12-27 14:01:46');
insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (2,NULL,'Laravel Password Grant Client','KJmdCTPa38E7m0vsVTJwHKQQVEwDlXXpKipjCCfR','http://localhost',0,1,0,'2018-12-27 14:01:46','2018-12-27 14:01:46');

UNLOCK TABLES;

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

LOCK TABLES `oauth_personal_access_clients` WRITE;

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values (1,1,'2018-12-27 14:01:46','2018-12-27 14:01:46');

UNLOCK TABLES;

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

LOCK TABLES `oauth_refresh_tokens` WRITE;

UNLOCK TABLES;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

LOCK TABLES `password_resets` WRITE;

UNLOCK TABLES;

/*Table structure for table `productor` */

DROP TABLE IF EXISTS `productor`;

CREATE TABLE `productor` (
  `productor_id` int(10) NOT NULL AUTO_INCREMENT,
  `productor_nombre` varchar(255) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`productor_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `productor` */

LOCK TABLES `productor` WRITE;

insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (1,'AGR. SANTA FILOMENA LTDA.(CSP 108380)',7);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (2,'AGR.LAS DOS AMALIAS LTDA.(CSP 118003) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (3,'AGRIC.LOS ROSALES-ONGOLMO LTDA(CSG 151285) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (4,'AGRICOLA E INM. SAN ANDRES LTDA',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (5,'AGRICOLA LA VEGA LTDA \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (6,'AGRICOLA LIRA GARCES LTDA (CSG 107686) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (7,'AGRICOLA LOS CULENES SPA (CSP 114174) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (8,'AGRICOLA SAN JOSE LTDA (CSP 122105) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (9,'AGRICOLA SANTA LAURA LTDA (CSP 119365) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (10,'AGRICOLA SANTA MAGDALENA LTDA \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (11,'AGRICOLA SIETE HERMANOS LTDA \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (12,'AGROPECUARIA FIORALBA LTDA \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (13,'ASESORIAS Y ADM.AGRICOLAS LTDA (CSP 113996)) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (14,'JOSE MIGUEL VERGARA CUEVAS (CSP 118221) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (15,'SANTA MARIA DE PUQUILLAY LTDA.(CSP 110538)',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (16,'SOC.AGR.SANTA CATALINA LTDA (CSP 114290) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (17,'AGROUVA S.A. (CSP 113460) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (18,'EMPRESA AGRICOLA H.C.LTDA (CSP 121473) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (19,'AGRICOLA BROWN LTDA (CSP 96226) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (20,'AGRICOLA EL PIMIENTO LTDA \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (21,'AGRICOLA FRONTERA LTDA \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (22,'AGRIFRUT LTDA (CSP 113270) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (23,'JOSE MANUEL CARTER (CSP 114106) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (24,'MARIA SUSANA MARTINI (CSP 112676) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (25,'MARIO CORDERO MU¥OZ \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (26,'SILVIO ZENTENO ASPEE \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (27,'SOCIEDAD AGRICOLA BEYLIK LTDA \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (28,'AGRO.CORSSEN HNOS. LTDA (CSP 112761) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (29,'ENRIQUE GAYTAN ARCOS (CSP 99849) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (30,'FRANCISCO ARDILES ROJAS (CSP 117928) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (31,'OSCAR LEYTON PAEZ (CSP 91230) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (32,'YUBIRCE ARDILES JORQUERA (CSP 117928) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (33,'ZULECOM (CSP 112783) \r',1);
insert  into `productor`(`productor_id`,`productor_nombre`,`region_id`) values (34,'PRODUCTOR DE PRUEBA',9);

UNLOCK TABLES;

/*Table structure for table `provincias` */

DROP TABLE IF EXISTS `provincias`;

CREATE TABLE `provincias` (
  `provincia_id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia_nombre` varchar(64) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`provincia_id`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `provincias_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `provincias` */

LOCK TABLES `provincias` WRITE;

insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (1,'Arica',1);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (2,'Parinacota',1);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (3,'Iquique',2);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (4,'El Tamarugal',2);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (5,'Antofagasta',3);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (6,'El Loa',3);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (7,'Tocopilla',3);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (8,'Chañaral',4);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (9,'Copiapó',4);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (10,'Huasco',4);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (11,'Choapa',5);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (12,'Elqui',5);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (13,'Limarí',5);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (14,'Isla de Pascua',6);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (15,'Los Andes',6);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (16,'Petorca',6);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (17,'Quillota',6);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (18,'San Antonio',6);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (19,'San Felipe de Aconcagua',6);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (20,'Valparaiso',6);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (21,'Chacabuco',7);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (22,'Cordillera',7);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (23,'Maipo',7);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (24,'Melipilla',7);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (25,'Santiago',7);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (26,'Talagante',7);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (27,'Cachapoal',8);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (28,'Cardenal Caro',8);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (29,'Colchagua',8);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (30,'Cauquenes',9);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (31,'Curicó',9);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (32,'Linares',9);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (33,'Talca',9);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (34,'Arauco',10);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (35,'Bio Bío',10);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (36,'Concepción',10);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (37,'Ñuble',10);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (38,'Cautín',11);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (39,'Malleco',11);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (40,'Valdivia',12);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (41,'Ranco',12);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (42,'Chiloé',13);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (43,'Llanquihue',13);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (44,'Osorno',13);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (45,'Palena',13);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (46,'Aisén',14);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (47,'Capitán Prat',14);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (48,'Coihaique',14);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (49,'General Carrera',14);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (50,'Antártica Chilena',15);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (51,'Magallanes',15);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (52,'Tierra del Fuego',15);
insert  into `provincias`(`provincia_id`,`provincia_nombre`,`region_id`) values (53,'Última Esperanza',15);

UNLOCK TABLES;

/*Table structure for table `regiones` */

DROP TABLE IF EXISTS `regiones`;

CREATE TABLE `regiones` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_nombre` varchar(64) NOT NULL,
  `region_ordinal` varchar(4) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `regiones` */

LOCK TABLES `regiones` WRITE;

insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (1,'Arica y Parinacota','XV');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (2,'Tarapacá','I');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (3,'Antofagasta','II');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (4,'Atacama','III');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (5,'Coquimbo','IV');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (6,'Valparaiso','V');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (7,'Metropolitana de Santiago','RM');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (8,'Libertador General Bernardo O\'Higgins','VI');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (9,'Maule','VII');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (10,'Biobío','VIII');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (11,'La Araucanía','IX');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (12,'Los Ríos','XIV');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (13,'Los Lagos','X');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (14,'Aisén del General Carlos Ibáñez del Campo','XI');
insert  into `regiones`(`region_id`,`region_nombre`,`region_ordinal`) values (15,'Magallanes y de la Antártica Chilena','XII');

UNLOCK TABLES;

/*Table structure for table `tolerancia` */

DROP TABLE IF EXISTS `tolerancia`;

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

/*Data for the table `tolerancia` */

LOCK TABLES `tolerancia` WRITE;

insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (1,16,1,1,0.00,4.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (2,16,2,1,0.00,4.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (3,17,1,1,0.00,5.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (4,17,2,1,0.00,6.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (5,16,1,2,4.00,7.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (6,16,2,2,4.00,8.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (7,17,1,2,5.00,10.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (8,17,2,2,6.00,12.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (9,16,2,3,8.00,10.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (10,17,2,3,12.00,20.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (11,16,2,4,10.00,100.00);
insert  into `tolerancia`(`tolerancia_id`,`defecto_id`,`categoria_id`,`nota_id`,`tolerancia_desde`,`tolerancia_hasta`) values (12,17,2,4,20.00,100.00);

UNLOCK TABLES;

/*Table structure for table `tolerancia_grupo` */

DROP TABLE IF EXISTS `tolerancia_grupo`;

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

/*Data for the table `tolerancia_grupo` */

LOCK TABLES `tolerancia_grupo` WRITE;

insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (1,1,2,1,0.00,4.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (2,2,2,1,0.00,6.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (3,3,2,1,0.00,3.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (4,4,2,1,0.00,5.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (5,5,2,1,0.00,0.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (6,6,2,1,0.00,2.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (7,1,1,1,0.00,4.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (8,2,1,1,0.00,5.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (9,3,1,1,0.00,3.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (10,4,1,1,0.00,5.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (11,5,1,1,0.00,0.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (12,6,1,1,0.00,2.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (13,1,2,2,4.01,8.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (14,2,2,2,6.01,12.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (15,3,2,2,3.01,5.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (16,4,2,2,5.01,8.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (17,5,2,2,0.00,0.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (18,6,2,2,2.01,4.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (19,1,1,2,4.01,7.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (20,2,1,2,5.01,10.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (21,3,1,2,3.01,5.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (22,4,1,2,5.01,8.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (23,5,1,2,0.00,0.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (24,6,1,2,2.01,3.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (25,1,2,3,8.01,10.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (26,2,2,3,12.01,20.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (27,3,2,3,5.01,7.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (28,4,2,3,8.01,12.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (29,5,2,3,0.00,0.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (30,6,2,3,4.01,5.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (31,1,2,4,10.01,100.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (32,2,2,4,20.01,1000.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (33,3,2,4,7.01,1000.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (34,4,2,4,12.01,1000.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (35,5,2,4,0.00,1000.00);
insert  into `tolerancia_grupo`(`tolerancia_grupo_id`,`grupo_id`,`categoria_id`,`nota_id`,`tolerancia_grupo_desde`,`tolerancia_grupo_hasta`) values (36,6,2,4,5.01,1000.00);

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'francisco carrasco','xnofub@gmail.com',NULL,'$2y$10$6OSS1gv4bHOPCeWz3gMg5uGLI0AnJvG3WDz8Gdud7kndtBFpmVsWS','3ChVynMHh0QJ9mvTl5qGERB73e0KG1YETyhbWYCllf1l2iL1STK8LiTdg8t4','2018-12-27 15:31:38','2018-12-27 15:31:38');
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (2,'Ricardo Parra','ricardoparramolina@gmail.com',NULL,'$2y$10$Tl.eRWqWbUPWDkZ8yQ6Sg.8VdWAcY8V.K0V9BP7pYwBsEukHtd1pC','sSKuhDwee1UExMYRVpJQBXQK9X3kG8TDFYwJNzjy4XqOr7UwuN8W3gLgnQOR','2018-12-28 02:19:16','2018-12-28 02:19:16');

UNLOCK TABLES;

/*Table structure for table `variedad` */

DROP TABLE IF EXISTS `variedad`;

CREATE TABLE `variedad` (
  `variedad_id` int(10) NOT NULL AUTO_INCREMENT,
  `variedad_nombre` varchar(255) DEFAULT NULL,
  `varidad_codigo` varchar(100) DEFAULT NULL,
  `especie_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`variedad_id`),
  KEY `especie_id` (`especie_id`),
  CONSTRAINT `variedad_ibfk_1` FOREIGN KEY (`especie_id`) REFERENCES `especie` (`especie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `variedad` */

LOCK TABLES `variedad` WRITE;

insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (1,'AUTUMN ROYAL \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (2,'BLACK SEEDLESS \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (3,'CRIMSON SEEDLESS \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (4,'FLAME SEEDLESS \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (5,'INIA GRAPE ONE \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (6,'MAYLEN (INIA GRAPE ONE cv) \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (7,'PERLON \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (8,'PRINCESS SEEDLESS \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (9,'SUGRAONE  \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (10,'SUGRAFOURTEEN (RED SUPERIOR SEEDLESS) \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (11,'SUGRASIXTEEN (SABLE SEEDLESS) \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (12,'SUGRATWELVE (COACHELLA SEEDLESS) \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (13,'SUGRANINETEEN (SCARLOTTA SEEDLESS) \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (14,'SHEEGENE 13 (TIMCO) \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (15,'SHEEGENE 20 (ALLISON) \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (16,'THOMPSON SEEDLESS \r',NULL,1);
insert  into `variedad`(`variedad_id`,`variedad_nombre`,`varidad_codigo`,`especie_id`) values (17,'RED GLOBE \r',NULL,1);

UNLOCK TABLES;

/*Table structure for table `zona_defecto` */

DROP TABLE IF EXISTS `zona_defecto`;

CREATE TABLE `zona_defecto` (
  `zona_id` int(10) NOT NULL,
  `zona_nombre` varchar(50) DEFAULT NULL,
  `zona_descripcion` varchar(255) DEFAULT NULL,
  `medicion` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`zona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `zona_defecto` */

LOCK TABLES `zona_defecto` WRITE;

insert  into `zona_defecto`(`zona_id`,`zona_nombre`,`zona_descripcion`,`medicion`) values (1,'Racimo','Defectos del Racimo',NULL);
insert  into `zona_defecto`(`zona_id`,`zona_nombre`,`zona_descripcion`,`medicion`) values (2,'Baya','Defectos de Bayas','Q');
insert  into `zona_defecto`(`zona_id`,`zona_nombre`,`zona_descripcion`,`medicion`) values (3,'Otro','Defectos independientes',NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
