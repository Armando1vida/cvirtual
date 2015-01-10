-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2014 a las 02:03:03
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `truulo_erp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  `unidad_id` int(11) NOT NULL,
  `subcategoria_producto_id` int(11) NOT NULL,
  `grupo_inventario_id` int(11) DEFAULT NULL,
  `precio` decimal(10,3) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `imagen` varchar(512) DEFAULT NULL,
  `compra` tinyint(1) DEFAULT NULL,
  `inventario` tinyint(1) DEFAULT NULL,
  `fabricacion` tinyint(1) DEFAULT NULL,
  `venta` tinyint(1) DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `tipo` enum('BIEN','SERVICIO') NOT NULL,
  `iva` enum('12%','0%','NOIVA') NOT NULL,
  `porcentaje_retencion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_producto_grupo_inventario1_idx` (`grupo_inventario_id`),
  KEY `fk_producto_subcategoria_producto1_idx` (`subcategoria_producto_id`),
  KEY `fk_producto_unidad1_idx` (`unidad_id`),
  KEY `fk_producto_retencion_idx` (`porcentaje_retencion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE IF NOT EXISTS `producto_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_cuenta_contable`
--

CREATE TABLE IF NOT EXISTS `producto_cuenta_contable` (
  `producto_id` int(11) NOT NULL COMMENT 'Sirve para decir que un producto solo puede afectar a ciertas cuentas contables',
  `cuenta_contable_id` int(11) NOT NULL,
  PRIMARY KEY (`producto_id`,`cuenta_contable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_grupo_inventario`
--

CREATE TABLE IF NOT EXISTS `producto_grupo_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT 'ACTIVO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_retencion`
--

CREATE TABLE IF NOT EXISTS `producto_retencion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `porcentaje` int(11) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_subcategoria`
--

CREATE TABLE IF NOT EXISTS `producto_subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_producto_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT 'ACTIVO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_subcategoria_producto_categoria_producto1_idx` (`categoria_producto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_unidad`
--

CREATE TABLE IF NOT EXISTS `producto_unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `abreviacion` varchar(5) NOT NULL,
  `descripcion` text,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_grupo_inventario1` FOREIGN KEY (`grupo_inventario_id`) REFERENCES `producto_grupo_inventario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_retencion` FOREIGN KEY (`porcentaje_retencion`) REFERENCES `producto_retencion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_subcategoria_producto1` FOREIGN KEY (`subcategoria_producto_id`) REFERENCES `producto_subcategoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `producto_unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_cuenta_contable`
--
ALTER TABLE `producto_cuenta_contable`
  ADD CONSTRAINT `fk_producto_cuenta_contable_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_subcategoria`
--
ALTER TABLE `producto_subcategoria`
  ADD CONSTRAINT `fk_subcategoria_producto_categoria_producto1` FOREIGN KEY (`categoria_producto_id`) REFERENCES `producto_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
