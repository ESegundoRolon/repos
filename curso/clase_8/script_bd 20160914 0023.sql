CREATE DATABASE /*!32312 IF NOT EXISTS*/ php_carrito;
USE php_carrito;

--
-- Table structure for table `php_carrito`.`compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `falta` datetime NOT NULL COMMENT 'Fecha',
  `fmodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'F. Modificacion',
  `habilitado` tinyint(1) unsigned DEFAULT '1' COMMENT 'Habilitado',
  `feliminado` datetime DEFAULT NULL COMMENT 'F. Elimimado',
  `importe_total` decimal(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `php_carrito`.`compras`
--

/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id`,`falta`,`fmodificacion`,`habilitado`,`feliminado`,`importe_total`) VALUES 
 (2,'2016-09-13 01:25:42','2016-09-13 01:25:42',1,NULL,'150.00'),
 (3,'2016-09-13 01:34:53','2016-09-13 01:34:53',1,NULL,'150.00'),
 (4,'2016-09-13 01:35:26','2016-09-13 01:35:26',1,NULL,'200.00'),
 (5,'2016-09-13 01:37:08','2016-09-13 01:37:08',1,NULL,'70.00'),
 (6,'2016-09-13 01:37:32','2016-09-13 01:37:32',1,NULL,'50.00');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;


--
-- Table structure for table `php_carrito`.`compras_productos`
--

DROP TABLE IF EXISTS `compras_productos`;
CREATE TABLE `compras_productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `falta` datetime NOT NULL COMMENT 'Fecha',
  `fmodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'F. Modificacion',
  `habilitado` tinyint(1) unsigned DEFAULT '1' COMMENT 'Habilitado',
  `feliminado` datetime DEFAULT NULL COMMENT 'F. Elimimado',
  `productos_id` int(10) unsigned NOT NULL DEFAULT '0',
  `compras_id` int(10) unsigned NOT NULL DEFAULT '0',
  `precio` decimal(8,2) NOT NULL DEFAULT '0.00',
  `denominacion` varchar(125) NOT NULL DEFAULT '',
  `codigo` varchar(30) DEFAULT NULL,
  `precio_oferta` decimal(8,2) DEFAULT NULL,
  `cantidad` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `php_carrito`.`compras_productos`
--

/*!40000 ALTER TABLE `compras_productos` DISABLE KEYS */;
INSERT INTO `compras_productos` (`id`,`falta`,`fmodificacion`,`habilitado`,`feliminado`,`productos_id`,`compras_id`,`precio`,`denominacion`,`codigo`,`precio_oferta`,`cantidad`) VALUES 
 (1,'2016-09-13 01:25:42','2016-09-13 01:25:42',1,NULL,1,2,'100.00','',NULL,NULL,1),
 (2,'2016-09-13 01:25:42','2016-09-13 01:25:42',1,NULL,2,2,'50.00','',NULL,NULL,1),
 (3,'2016-09-13 01:34:53','2016-09-13 01:34:53',1,NULL,3,3,'70.00','',NULL,NULL,1),
 (4,'2016-09-13 01:34:53','2016-09-13 01:34:53',1,NULL,4,3,'80.00','',NULL,NULL,1),
 (5,'2016-09-13 01:35:26','2016-09-13 01:35:26',1,NULL,4,4,'80.00','',NULL,NULL,1),
 (6,'2016-09-13 01:35:26','2016-09-13 01:35:26',1,NULL,3,4,'70.00','',NULL,NULL,1),
 (7,'2016-09-13 01:35:26','2016-09-13 01:35:26',1,NULL,2,4,'50.00','',NULL,NULL,1),
 (8,'2016-09-13 01:37:08','2016-09-13 01:37:08',1,NULL,3,5,'70.00','',NULL,NULL,1),
 (9,'2016-09-13 01:37:32','2016-09-13 01:37:32',1,NULL,2,6,'50.00','',NULL,NULL,1);
/*!40000 ALTER TABLE `compras_productos` ENABLE KEYS */;


--
-- Table structure for table `php_carrito`.`productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `falta` datetime NOT NULL COMMENT 'Fecha',
  `fmodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'F. Modificacion',
  `habilitado` tinyint(1) unsigned DEFAULT '1' COMMENT 'Habilitado',
  `feliminado` datetime DEFAULT NULL COMMENT 'F. Elimimado',
  `denominacion` varchar(125) NOT NULL COMMENT 'Denominación, Título o nombre',
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descripcion',
  `activa` tinyint(1) unsigned DEFAULT NULL COMMENT 'Activa',
  `codigo` varchar(30) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `publicaciones_estados_id` int(10) unsigned NOT NULL DEFAULT '0',
  `oferta` tinyint(1) unsigned DEFAULT NULL,
  `precio_oferta` decimal(8,2) DEFAULT NULL,
  `fecha_finalizacion_oferta` datetime DEFAULT NULL,
  `destacado` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `php_carrito`.`productos`
--

/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`,`falta`,`fmodificacion`,`habilitado`,`feliminado`,`denominacion`,`descripcion`,`activa`,`codigo`,`precio`,`publicaciones_estados_id`,`oferta`,`precio_oferta`,`fecha_finalizacion_oferta`,`destacado`) VALUES 
 (1,'2016-09-11 23:43:39','2016-09-11 23:43:39',1,NULL,'Sunflower Oil(5 kg)','Sunflower Oil(5 kg)',1,'SKU0001','100.00',0,NULL,'90.00',NULL,NULL),
 (2,'2016-09-11 23:43:39','2016-09-11 23:44:41',1,NULL,'Moong(1 kg)','Moong(1 kg)',1,'SKU0002','50.00',0,NULL,'40.00',NULL,NULL),
 (3,'2016-09-11 23:43:39','2016-09-11 23:45:26',1,NULL,'Kabuli Chana(1 kg)','Kabuli Chana(1 kg)',1,'SKU0003','70.00',0,NULL,'65.00',NULL,NULL),
 (4,'2016-09-11 23:43:39','2016-09-11 23:46:13',1,NULL,'Soya Chunks(1 kg)','Soya Chunks(1 kg)',1,'SKU0004','80.00',0,NULL,'75.00',NULL,NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


--
-- Table structure for table `php_carrito`.`usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `falta` datetime NOT NULL COMMENT 'F.Alta',
  `fmodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'F.Modif',
  `feliminado` datetime DEFAULT NULL COMMENT 'F.Eliminado',
  `habilitado` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT 'Habilitado',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT 'Email',
  `clave` varchar(64) NOT NULL DEFAULT '' COMMENT 'Clave',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre',
  `apellido` varchar(50) NOT NULL DEFAULT '' COMMENT 'Apellido',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `php_carrito`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`,`falta`,`fmodificacion`,`feliminado`,`habilitado`,`email`,`clave`,`nombre`,`apellido`) VALUES 
 (1,'2016-09-13 00:00:00','2016-09-14 00:22:45',NULL,1,'usuario@utn.com.ar','e10adc3949ba59abbe56e057f20f883e','UTN','UTN ');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
