/*
MySQL Data Transfer
Source Host: localhost
Source Database: cao
Target Host: localhost
Target Database: cao
Date: 07/08/2014 15:49:42
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for bajas
-- ----------------------------
DROP TABLE IF EXISTS `bajas`;
CREATE TABLE `bajas` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `idanimal` int(6) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for enfermedads
-- ----------------------------
DROP TABLE IF EXISTS `enfermedads`;
CREATE TABLE `enfermedads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idanimal` int(11) DEFAULT NULL,
  `idlote` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for especies
-- ----------------------------
DROP TABLE IF EXISTS `especies`;
CREATE TABLE `especies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for estados
-- ----------------------------
DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for etapas
-- ----------------------------
DROP TABLE IF EXISTS `etapas`;
CREATE TABLE `etapas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for lactancias
-- ----------------------------
DROP TABLE IF EXISTS `lactancias`;
CREATE TABLE `lactancias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idanimal` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for lotes
-- ----------------------------
DROP TABLE IF EXISTS `lotes`;
CREATE TABLE `lotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `idparcela` int(10) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for modulos
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpadre` int(10) unsigned NOT NULL,
  `descripcion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `icono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modulos_idpadre_foreign` (`idpadre`),
  CONSTRAINT `modulos_idpadre_foreign` FOREIGN KEY (`idpadre`) REFERENCES `modulos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for nacimientos
-- ----------------------------
DROP TABLE IF EXISTS `nacimientos`;
CREATE TABLE `nacimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idservicio` int(6) DEFAULT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `pedigree` varchar(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `npadre` int(11) DEFAULT NULL,
  `nmadre` int(11) DEFAULT NULL,
  `foto` text,
  `caracteristicas` text,
  `observaciones` text,
  `idcategoria` int(10) DEFAULT NULL,
  `idespecie` int(10) DEFAULT NULL,
  `idetapa` int(10) DEFAULT NULL,
  `idlote` int(10) DEFAULT NULL,
  `idestado` int(10) DEFAULT NULL,
  `idraza` int(10) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for parcelas
-- ----------------------------
DROP TABLE IF EXISTS `parcelas`;
CREATE TABLE `parcelas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for perfils
-- ----------------------------
DROP TABLE IF EXISTS `perfils`;
CREATE TABLE `perfils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `idperfil` int(10) unsigned NOT NULL,
  `idmodulo` int(10) unsigned NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idperfil`,`idmodulo`),
  KEY `permisos_idperfil_foreign` (`idperfil`),
  KEY `permisos_idmodulo_foreign` (`idmodulo`),
  CONSTRAINT `permisos_idmodulo_foreign` FOREIGN KEY (`idmodulo`) REFERENCES `modulos` (`id`),
  CONSTRAINT `permisos_idperfil_foreign` FOREIGN KEY (`idperfil`) REFERENCES `perfils` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for produccions
-- ----------------------------
DROP TABLE IF EXISTS `produccions`;
CREATE TABLE `produccions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idanimal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for razas
-- ----------------------------
DROP TABLE IF EXISTS `razas`;
CREATE TABLE `razas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) DEFAULT NULL,
  `idtiposervicio` int(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tiposervicios
-- ----------------------------
DROP TABLE IF EXISTS `tiposervicios`;
CREATE TABLE `tiposervicios` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idperfil` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `direccion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `users_idperfil_foreign` (`idperfil`),
  CONSTRAINT `users_idperfil_foreign` FOREIGN KEY (`idperfil`) REFERENCES `perfils` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `bajas` VALUES ('1', '1', 'Muerte por Sacrificio', '1', '2014-07-04 05:46:11', '2014-07-04 05:46:11', '2014-07-09');
INSERT INTO `bajas` VALUES ('2', '5', 'Sacrificio', '1', '2014-07-10 13:49:52', '2014-07-10 13:49:52', '2014-07-10');
INSERT INTO `categorias` VALUES ('1', 'Terneros', '1', '2014-07-03 23:58:32', '2014-07-06 16:33:16');
INSERT INTO `categorias` VALUES ('2', 'Vaquillona', '1', '2014-07-06 16:26:48', '2014-07-06 16:35:42');
INSERT INTO `categorias` VALUES ('3', 'Potrillo', '1', '2014-07-06 16:26:55', '2014-07-06 16:36:21');
INSERT INTO `categorias` VALUES ('4', 'Vaca Joven', '1', '2014-07-06 16:36:49', '2014-07-06 16:36:49');
INSERT INTO `categorias` VALUES ('5', 'Toro', '1', '2014-07-06 16:36:58', '2014-07-06 16:36:58');
INSERT INTO `categorias` VALUES ('6', 'Torete', '1', '2014-07-06 16:37:09', '2014-07-06 16:37:09');
INSERT INTO `categorias` VALUES ('7', 'Novillo', '1', '2014-07-06 16:37:17', '2014-07-06 16:37:17');
INSERT INTO `categorias` VALUES ('8', 'Vaca Adulta', '1', '2014-07-06 16:37:29', '2014-07-06 16:37:29');
INSERT INTO `categorias` VALUES ('9', 'Buey', '1', '2014-07-06 16:37:37', '2014-07-06 16:37:37');
INSERT INTO `categorias` VALUES ('10', 'Cochinillo', '1', '2014-07-06 16:38:37', '2014-07-06 16:38:37');
INSERT INTO `categorias` VALUES ('11', 'Lechon', '1', '2014-07-06 16:38:43', '2014-07-06 16:38:43');
INSERT INTO `categorias` VALUES ('12', 'Cerdo', '1', '2014-07-06 16:38:49', '2014-07-06 16:38:49');
INSERT INTO `categorias` VALUES ('13', 'Berraco', '1', '2014-07-06 16:39:11', '2014-07-06 16:39:11');
INSERT INTO `categorias` VALUES ('14', 'Potranca', '1', '2014-07-06 16:42:46', '2014-07-06 16:42:46');
INSERT INTO `categorias` VALUES ('15', 'Yegua', '1', '2014-07-06 16:42:52', '2014-07-06 16:42:52');
INSERT INTO `enfermedads` VALUES ('1', 'Gripe Porcina', '1', '2014-07-09 04:17:20', '2014-07-09 04:17:29', null, null);
INSERT INTO `enfermedads` VALUES ('2', 'diarrea', '1', '2014-07-10 13:47:35', '2014-07-10 13:47:35', '5', '14');
INSERT INTO `especies` VALUES ('1', 'Vacuno', '1', '2014-07-04 00:03:18', '2014-07-06 16:37:53');
INSERT INTO `especies` VALUES ('2', 'Pocino', '1', '2014-07-06 16:38:00', '2014-07-06 16:38:00');
INSERT INTO `especies` VALUES ('3', 'Equino', '1', '2014-07-06 16:38:07', '2014-07-06 16:38:07');
INSERT INTO `estados` VALUES ('1', 'Estado 1', '1', '2014-07-04 04:05:44', '2014-07-04 04:06:01');
INSERT INTO `etapas` VALUES ('1', 'Etapa 1', '1', '2014-07-04 00:09:02', '2014-07-04 00:09:08');
INSERT INTO `lactancias` VALUES ('1', 'nacimiento campeon', '1', '2014-07-11 15:03:58', '2014-07-11 15:03:58', '3', '2014-07-11');
INSERT INTO `lactancias` VALUES ('2', 'sfs', '1', '2014-07-11 16:30:08', '2014-07-11 16:30:08', '2', '2014-07-31');
INSERT INTO `lactancias` VALUES ('3', 'lk', '1', '2014-07-11 16:55:20', '2014-07-11 16:55:20', '1', '2014-12-01');
INSERT INTO `lactancias` VALUES ('4', 'dd', '1', '2014-07-11 16:56:11', '2014-07-11 16:56:11', '2', '2014-10-03');
INSERT INTO `lactancias` VALUES ('5', 's', '1', '2014-07-11 16:56:55', '2014-07-11 16:56:55', '2', '2014-07-12');
INSERT INTO `lactancias` VALUES ('6', 'dd', '1', '2014-07-11 16:58:10', '2014-07-11 16:58:10', '2', '2014-10-04');
INSERT INTO `lactancias` VALUES ('7', 'mlmksm', '1', '2014-07-11 17:05:02', '2014-07-11 17:05:02', '4', '2014-10-04');
INSERT INTO `lactancias` VALUES ('8', 'nac', '1', '2014-07-11 17:06:23', '2014-07-11 17:06:23', '3', '2014-07-26');
INSERT INTO `lactancias` VALUES ('9', 'msn', '1', '2014-07-11 17:07:04', '2014-07-11 17:07:04', '2', '2014-07-24');
INSERT INTO `lotes` VALUES ('1', 'PRODUCCION', '1', '1', '2014-06-20 18:03:38', '2014-07-06 16:09:16');
INSERT INTO `lotes` VALUES ('2', 'ENGORDE', '1', '1', '2014-06-20 18:05:19', '2014-07-06 16:09:07');
INSERT INTO `lotes` VALUES ('3', 'CRECIMIENTO', '1', '1', '2014-06-20 18:06:13', '2014-07-06 16:08:41');
INSERT INTO `lotes` VALUES ('4', 'PREPARTOS', '2', '1', '2014-07-06 16:08:31', '2014-07-06 16:24:16');
INSERT INTO `lotes` VALUES ('5', 'PRODUCCION', '2', '1', '2014-07-06 16:09:23', '2014-07-06 16:09:23');
INSERT INTO `lotes` VALUES ('6', 'PRODUCCION', '3', '0', '2014-07-06 16:09:31', '2014-07-06 16:12:49');
INSERT INTO `lotes` VALUES ('7', 'VENTA', '3', '1', '2014-07-06 16:11:03', '2014-07-06 16:11:03');
INSERT INTO `lotes` VALUES ('8', 'VENTA', '2', '1', '2014-07-06 16:11:09', '2014-07-06 16:11:09');
INSERT INTO `lotes` VALUES ('9', 'VENTA', '1', '1', '2014-07-06 16:11:14', '2014-07-06 16:11:14');
INSERT INTO `lotes` VALUES ('10', 'ENGORDE', '2', '1', '2014-07-06 16:11:28', '2014-07-06 16:11:28');
INSERT INTO `lotes` VALUES ('11', 'ENGORDE', '3', '1', '2014-07-06 16:17:14', '2014-07-06 16:17:14');
INSERT INTO `lotes` VALUES ('12', 'LACTANCIA', '1', '1', '2014-07-06 16:21:52', '2014-07-06 16:21:52');
INSERT INTO `lotes` VALUES ('13', 'LACTANCIA', '2', '1', '2014-07-06 16:22:00', '2014-07-06 16:22:00');
INSERT INTO `lotes` VALUES ('14', 'CUIDADO', '1', '1', '2014-07-06 16:22:28', '2014-07-06 16:22:28');
INSERT INTO `lotes` VALUES ('15', 'CUIDADO', '2', '1', '2014-07-06 16:22:34', '2014-07-06 16:22:34');
INSERT INTO `lotes` VALUES ('16', 'CUIDADO', '3', '1', '2014-07-06 16:22:40', '2014-07-06 16:22:40');
INSERT INTO `lotes` VALUES ('17', 'PREPARTO', '2', '1', '2014-07-06 16:24:30', '2014-07-06 16:24:30');
INSERT INTO `modulos` VALUES ('1', '1', 'Modulo Padre', '#', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `modulos` VALUES ('2', '1', 'Seguridad', '#', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fa-lock');
INSERT INTO `modulos` VALUES ('3', '2', 'Modulos', 'modulos', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `modulos` VALUES ('4', '5', 'Parcelas', 'parcelas', '1', '0000-00-00 00:00:00', '2014-06-20 17:44:23', '');
INSERT INTO `modulos` VALUES ('5', '1', 'Mantenimiento', '#', '1', '0000-00-00 00:00:00', '2014-06-20 17:13:24', 'fa-book');
INSERT INTO `modulos` VALUES ('6', '1', 'Reportes', '#', '1', '0000-00-00 00:00:00', '2014-06-20 17:11:56', 'fa-list');
INSERT INTO `modulos` VALUES ('7', '6', 'Reporte Listado de Animales', 'reporte_lista_animales', '1', '0000-00-00 00:00:00', '2014-07-04 16:24:53', '');
INSERT INTO `modulos` VALUES ('8', '2', 'Tipo Empleado', 'perfiles', '1', '0000-00-00 00:00:00', '2014-07-03 17:10:55', '');
INSERT INTO `modulos` VALUES ('9', '2', 'Empleado', 'empleados', '1', '2014-05-16 09:31:32', '2014-07-03 17:57:54', '');
INSERT INTO `modulos` VALUES ('10', '2', 'Permisos', 'permisos', '1', '2014-06-19 21:33:31', '2014-06-19 21:33:31', '');
INSERT INTO `modulos` VALUES ('11', '5', 'Razas', 'razas', '1', '2014-06-20 17:43:50', '2014-06-20 17:43:50', '');
INSERT INTO `modulos` VALUES ('12', '5', 'Lotes', 'lotes', '1', '2014-06-20 17:44:07', '2014-06-20 17:44:07', '');
INSERT INTO `modulos` VALUES ('13', '1', 'Produccion', '#', '1', '2014-07-03 05:29:11', '2014-07-03 23:21:15', 'fa-play');
INSERT INTO `modulos` VALUES ('14', '13', 'Producciones', 'producciones', '1', '2014-07-03 05:30:06', '2014-07-03 05:30:06', '');
INSERT INTO `modulos` VALUES ('15', '5', 'Tipo Servicios', 'tipo_servicios', '1', '2014-07-03 17:01:43', '2014-07-03 17:02:39', '');
INSERT INTO `modulos` VALUES ('16', '5', 'Servicios', 'servicios', '1', '2014-07-03 17:09:13', '2014-07-03 17:09:13', '');
INSERT INTO `modulos` VALUES ('17', '1', 'Control', '#', '1', '2014-07-03 23:38:34', '2014-07-03 23:38:34', 'fa-stop');
INSERT INTO `modulos` VALUES ('18', '17', 'Animales', 'nacimientos', '1', '2014-07-03 23:39:46', '2014-07-09 03:21:27', '');
INSERT INTO `modulos` VALUES ('19', '5', 'Etapas', 'categorias', '1', '2014-07-03 23:50:54', '2014-07-06 16:42:20', '');
INSERT INTO `modulos` VALUES ('20', '5', 'Especies', 'especies', '1', '2014-07-03 23:51:16', '2014-07-03 23:51:16', '');
INSERT INTO `modulos` VALUES ('21', '5', 'Etapas', 'etapas', '0', '2014-07-03 23:51:30', '2014-07-03 23:51:30', '');
INSERT INTO `modulos` VALUES ('22', '17', 'Estados', 'estados', '1', '2014-07-04 04:00:11', '2014-07-04 04:00:11', '');
INSERT INTO `modulos` VALUES ('23', '17', 'Bajas', 'bajas', '1', '2014-07-04 05:32:42', '2014-07-04 05:32:42', '');
INSERT INTO `modulos` VALUES ('24', '17', 'Enfermedades', 'enfermedades', '1', '2014-07-09 03:57:34', '2014-07-09 03:57:34', '');
INSERT INTO `modulos` VALUES ('25', '6', 'Reporte Listado de Producción', 'reporte_listado_produccion', '1', '2014-07-09 05:32:53', '2014-07-09 05:32:53', '');
INSERT INTO `modulos` VALUES ('26', '6', 'Reporte Nacimientos por Fecha', 'reporte_nacimientos_fecha', '1', '2014-07-09 05:47:40', '2014-07-09 05:47:40', '');
INSERT INTO `modulos` VALUES ('27', '6', 'Reporte Bajas por Fecha', 'reporte_bajas_fecha', '1', '2014-07-10 04:50:48', '2014-07-10 04:50:48', '');
INSERT INTO `modulos` VALUES ('28', '17', 'Control Materno', 'lactancias', '1', '2014-07-11 14:31:13', '2014-07-11 14:43:22', '');
INSERT INTO `modulos` VALUES ('29', '6', 'Reporte Animales por parir', 'reporte_animales_parir', '1', '2014-07-11 17:08:46', '2014-07-11 17:08:46', '');
INSERT INTO `nacimientos` VALUES ('1', '1', 'Tornado', '589652', 'M', '2014-07-04', null, null, null, 'Color negro puro', 'ninguna', '3', '3', '1', '3', '1', '9', '1', '2014-07-04 05:14:57', '2014-07-06 16:59:05');
INSERT INTO `nacimientos` VALUES ('2', '2', 'Asesino', '123456', 'M', '2014-07-04', null, null, null, 'ojón de color blanco humo', 'Nació con vocio', '1', '1', '1', '3', '1', '4', '1', '2014-07-04 05:15:12', '2014-07-06 16:57:40');
INSERT INTO `nacimientos` VALUES ('3', '1', 'Lupe', '123456', 'F', '2014-07-04', '1', '2', null, 'Negrita con manchas', 'Ninguna', '1', '1', '1', '3', '1', '1', '1', '2014-07-04 05:15:32', '2014-07-06 16:55:12');
INSERT INTO `nacimientos` VALUES ('4', '2', 'Marranin', '59753', 'F', '2014-07-01', '1', '2', null, 'gordito', 'Fuertes y sanos', '10', '2', '1', '3', '1', '6', '1', '2014-07-06 17:04:09', '2014-07-06 17:04:09');
INSERT INTO `nacimientos` VALUES ('5', '1', 'Cochinin', '74851', 'M', '2014-07-03', '0', '0', null, 'Negros', 'Flacos', '10', '2', '0', '14', '0', '5', '1', '2014-07-06 17:09:38', '2014-07-10 13:47:35');
INSERT INTO `parcelas` VALUES ('1', 'VACUNOS', '1', '2014-06-20 17:30:52', '2014-07-06 16:07:49');
INSERT INTO `parcelas` VALUES ('2', 'PORCINOS', '1', '2014-07-06 16:07:57', '2014-07-06 16:07:57');
INSERT INTO `parcelas` VALUES ('3', 'EQUINOS', '1', '2014-07-06 16:08:01', '2014-07-06 16:15:09');
INSERT INTO `perfils` VALUES ('1', 'Administrador', '1', '0000-00-00 00:00:00', '2014-06-19 05:08:09');
INSERT INTO `perfils` VALUES ('2', 'productor', '1', '2014-05-15 23:19:58', '2014-07-06 16:05:52');
INSERT INTO `perfils` VALUES ('3', 'veterinario', '1', '2014-05-15 23:23:07', '2014-07-06 16:06:15');
INSERT INTO `perfils` VALUES ('4', 'otro', '0', '2014-05-15 23:42:08', '2014-06-19 05:15:53');
INSERT INTO `perfils` VALUES ('5', 'nuevpoop', '0', '2014-05-16 12:15:57', '2014-06-19 05:15:51');
INSERT INTO `perfils` VALUES ('6', 'ultimo', '0', '2014-06-19 05:12:34', '2014-06-19 05:15:54');
INSERT INTO `permisos` VALUES ('1', '3', '1');
INSERT INTO `permisos` VALUES ('1', '4', '1');
INSERT INTO `permisos` VALUES ('1', '7', '1');
INSERT INTO `permisos` VALUES ('1', '8', '1');
INSERT INTO `permisos` VALUES ('1', '9', '1');
INSERT INTO `permisos` VALUES ('1', '10', '1');
INSERT INTO `permisos` VALUES ('1', '11', '1');
INSERT INTO `permisos` VALUES ('1', '12', '1');
INSERT INTO `permisos` VALUES ('1', '14', '1');
INSERT INTO `permisos` VALUES ('1', '15', '1');
INSERT INTO `permisos` VALUES ('1', '16', '1');
INSERT INTO `permisos` VALUES ('1', '18', '1');
INSERT INTO `permisos` VALUES ('1', '19', '1');
INSERT INTO `permisos` VALUES ('1', '20', '1');
INSERT INTO `permisos` VALUES ('1', '21', '0');
INSERT INTO `permisos` VALUES ('1', '22', '1');
INSERT INTO `permisos` VALUES ('1', '23', '1');
INSERT INTO `permisos` VALUES ('1', '24', '1');
INSERT INTO `permisos` VALUES ('1', '25', '1');
INSERT INTO `permisos` VALUES ('1', '26', '1');
INSERT INTO `permisos` VALUES ('1', '27', '1');
INSERT INTO `permisos` VALUES ('1', '28', '1');
INSERT INTO `permisos` VALUES ('1', '29', '1');
INSERT INTO `produccions` VALUES ('2', 'Millar', '1000', '1', '2014-07-03 05:44:45', '2014-07-03 05:44:45', '2');
INSERT INTO `produccions` VALUES ('3', 'nuevo', '1', '1', '2014-07-09 03:49:38', '2014-07-09 03:49:38', '1');
INSERT INTO `razas` VALUES ('1', 'Brouwn', '1', '2014-06-20 17:45:37', '2014-07-06 16:07:18');
INSERT INTO `razas` VALUES ('2', 'Holstein', '1', '2014-07-06 16:11:15', '2014-07-06 16:11:15');
INSERT INTO `razas` VALUES ('3', 'Suiza', '1', '2014-07-06 16:11:35', '2014-07-06 16:11:35');
INSERT INTO `razas` VALUES ('4', 'Jersey', '1', '2014-07-06 16:12:56', '2014-07-06 16:12:56');
INSERT INTO `razas` VALUES ('5', 'Celta', '1', '2014-07-06 16:13:55', '2014-07-06 16:13:55');
INSERT INTO `razas` VALUES ('6', 'Landrace', '1', '2014-07-06 16:14:21', '2014-07-06 16:14:21');
INSERT INTO `razas` VALUES ('7', 'Pietrain', '1', '2014-07-06 16:14:42', '2014-07-06 16:14:42');
INSERT INTO `razas` VALUES ('8', 'Alter Real', '1', '2014-07-06 16:16:19', '2014-07-06 16:16:19');
INSERT INTO `razas` VALUES ('9', 'Azteca', '1', '2014-07-06 16:16:29', '2014-07-06 16:16:29');
INSERT INTO `razas` VALUES ('10', 'Frizón', '1', '2014-07-06 16:16:43', '2014-07-06 16:16:43');
INSERT INTO `servicios` VALUES ('1', 'PARTO CON AYUDA', '1', '2014-07-03 17:37:28', '2014-07-06 16:43:35', '1');
INSERT INTO `servicios` VALUES ('2', 'PARTO NATURAL', '1', '2014-07-06 16:43:24', '2014-07-06 16:43:24', '1');
INSERT INTO `servicios` VALUES ('3', 'ORDEÑO', '3', '2014-07-06 16:56:39', '2014-07-06 16:56:39', '1');
INSERT INTO `servicios` VALUES ('4', 'TRATAMIENTO', '2', '2014-07-06 16:56:51', '2014-07-06 16:56:51', '1');
INSERT INTO `tiposervicios` VALUES ('1', 'PARTO', '1', '2014-07-03 17:08:37', '2014-07-06 16:25:20');
INSERT INTO `tiposervicios` VALUES ('2', 'ENFERMEDAD', '1', '2014-07-06 16:25:13', '2014-07-06 16:25:13');
INSERT INTO `tiposervicios` VALUES ('3', 'ORDEÑO', '1', '2014-07-06 16:26:23', '2014-07-06 16:26:23');
INSERT INTO `users` VALUES ('2', '1', 'Usuario', 'admin', 'user@gmail.com', '$2y$10$/hSdrp4zOJ25Cm/6q85upOxuPnqCOZ0qQyLnN515R0mg0zoAE4cOG', '66CY4WPYgAEe4uMTgGva1pr0OKwvTqNXNAVzpUqslPCKrgPVFB74RK0ngZbT', '2014-05-09 16:55:56', '2014-07-03 23:35:27', 'Calle 123', '987654321', '1');
INSERT INTO `users` VALUES ('3', '2', 'Otro', 'otro', 'otro@gmail.com', '$2y$10$XM5C3SO08/dhkUysgPfgHue4r1revburSb1sF3blxU0nNY7GSK03u', 'huyruRY1pGzqeuXSQt7Nm1hUGDJ1PzgMIKtfChbQU3AycbiGpZufutPplUFq', '2014-07-03 23:35:24', '2014-07-03 23:35:43', 'direccion 123', '987654321', '1');
