# Host: 127.0.0.1  (Version: 5.6.12-log)
# Date: 2014-07-11 10:00:08
# Generator: MySQL-Front 5.3  (Build 4.122)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "evento_prioridad"
#

DROP TABLE IF EXISTS `evento_prioridad`;
CREATE TABLE `evento_prioridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "evento_tipo"
#

DROP TABLE IF EXISTS `evento_tipo`;
CREATE TABLE `evento_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "evento"
#

DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `descripcion` text,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `coords_x` double DEFAULT NULL,
  `coords_y` double DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `entidad_tipo` varchar(64) DEFAULT NULL,
  `entidad_id` int(11) DEFAULT NULL,
  `usuario_creacion_id` int(11) NOT NULL,
  `usuario_actualizacion_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `evento_tipo_id` int(11) DEFAULT NULL,
  `evento_prioridad_id` int(11) DEFAULT NULL,
  `permisos` enum('OWNER','ALL') NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evento_evento_tipo1_idx` (`evento_tipo_id`),
  KEY `fk_evento_evento_prioridad1_idx` (`evento_prioridad_id`),
  CONSTRAINT `fk_evento_evento_prioridad1` FOREIGN KEY (`evento_prioridad_id`) REFERENCES `evento_prioridad` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_evento_tipo1` FOREIGN KEY (`evento_tipo_id`) REFERENCES `evento_tipo` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
