-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-01-2015 a las 14:42:54
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cvirtual`
--
CREATE DATABASE IF NOT EXISTS `cvirtual` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cvirtual`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `peso` int(11) DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `max_entidad` int(11) NOT NULL,
  `max_foto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ciudad_provincia1_idx` (`provincia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authassignment`
--

CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authassignment`
--

INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
(3, NULL, 'N;', 'administradores_master'),
(4, NULL, 'N;', 'usuarios_administradores'),
(5, NULL, 'N;', 'usuarios_administradores'),
(6, NULL, 'N;', 'usuarios_administradores'),
(7, NULL, 'N;', 'usuarios_vendedores'),
(8, NULL, 'N;', 'usuarios_vendedores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitem`
--

CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_categoria_admin', 0, '', NULL, 'N;'),
('action_categoria_create', 0, '', NULL, 'N;'),
('action_ciudad_admin', 0, '', NULL, 'N;'),
('action_ciudad_ajaxGetCiudadesProvincia', 0, '', NULL, 'N;'),
('action_ciudad_ajaxListSelect2Ciudades', 0, '', NULL, 'N;'),
('action_ciudad_create', 0, '', NULL, 'N;'),
('action_direccion_ajaxGetInformacionEmpresa', 0, '', NULL, 'N;'),
('action_direccion_create', 0, '', NULL, 'N;'),
('action_direccion_createDireccionEmpresa', 0, '', NULL, 'N;'),
('action_direccion_update', 0, '', NULL, 'N;'),
('action_direccion_updateDireccionEmpresa', 0, '', NULL, 'N;'),
('action_empresa_admin', 0, '', NULL, 'N;'),
('action_entidadFoto_ajaxCreateEntidadFoto', 0, '', NULL, 'N;'),
('action_entidadFoto_ajaxGeInfoPicActual', 0, '', NULL, 'N;'),
('action_entidadFoto_ajaxUploadTemp', 0, '', NULL, 'N;'),
('action_entidadFoto_guardarImagenes', 0, '', NULL, 'N;'),
('action_entidadFoto_uploadTmp', 0, '', NULL, 'N;'),
('action_entidad_admin', 0, '', NULL, 'N;'),
('action_entidad_ajaxCargarInformacionEmpresa', 0, '', NULL, 'N;'),
('action_entidad_create', 0, '', NULL, 'N;'),
('action_entidad_createSubentidad', 0, '', NULL, 'N;'),
('action_entidad_update', 0, '', NULL, 'N;'),
('action_entidad_view', 0, '', NULL, 'N;'),
('action_eventoPrioridad_admin', 0, '', NULL, 'N;'),
('action_evento_ajaxCreateCalendarModal', 0, '', NULL, 'N;'),
('action_industria_admin', 0, '', NULL, 'N;'),
('action_industria_create', 0, '', NULL, 'N;'),
('action_nota_delete', 0, '', NULL, 'N;'),
('action_oportunidad_admin', 0, '', NULL, 'N;'),
('action_pais_admin', 0, '', NULL, 'N;'),
('action_pais_ajaxListSelect2Pais', 0, '', NULL, 'N;'),
('action_pais_create', 0, '', NULL, 'N;'),
('action_productoCategoria_admin', 0, '', NULL, 'N;'),
('action_productoSubcategoria_admin', 0, '', NULL, 'N;'),
('action_producto_admin', 0, '', NULL, 'N;'),
('action_provincia_admin', 0, '', NULL, 'N;'),
('action_provincia_ajaxGetProvinciaPais', 0, '', NULL, 'N;'),
('action_provincia_ajaxListSelect2Provincias', 0, '', NULL, 'N;'),
('action_provincia_create', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_rbacajaxsetchilditem', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemchilditems', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemcreate', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbaclisttasks', 0, '', NULL, 'N;'),
('action_ui_rbacusersassignments', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementadminroles', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreatemeet', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreateroles', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdateroles', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('administradores_master', 2, '', '', 'N;'),
('Cruge.ui.*', 0, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'C:\\wamp\\www\\cvirtual\\protected\\modules\\cruge\\views\\ui\\usermanagementupdateroles.php linea 128', NULL, 'N;'),
('tareas_administradores_master', 1, '', '', 'N;'),
('tareas_usuarios_administradores', 1, 'gestiona los usuarios usuarios administradores', '', 'N;'),
('tareas_usuarios_vendedores', 1, 'CRUD de usuarios clientes', '', 'N;'),
('usermanagementadminroles', 0, '', NULL, 'N;'),
('usuarios_administradores', 2, '', '', 'N;'),
('usuarios_clientes', 2, '', '', 'N;'),
('usuarios_registrados', 2, '', '', 'N;'),
('usuarios_vendedores', 2, '', '', 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitemchild`
--

INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES
('tareas_usuarios_vendedores', 'action_ciudad_ajaxGetCiudadesProvincia'),
('tareas_usuarios_vendedores', 'action_direccion_ajaxGetInformacionEmpresa'),
('tareas_usuarios_vendedores', 'action_direccion_create'),
('tareas_usuarios_vendedores', 'action_direccion_createDireccionEmpresa'),
('tareas_usuarios_vendedores', 'action_direccion_update'),
('tareas_usuarios_vendedores', 'action_direccion_updateDireccionEmpresa'),
('tareas_usuarios_vendedores', 'action_entidadFoto_ajaxCreateEntidadFoto'),
('tareas_usuarios_vendedores', 'action_entidadFoto_ajaxUploadTemp'),
('tareas_usuarios_vendedores', 'action_entidadFoto_guardarImagenes'),
('tareas_usuarios_vendedores', 'action_entidadFoto_uploadTmp'),
('tareas_usuarios_vendedores', 'action_entidad_admin'),
('tareas_usuarios_vendedores', 'action_entidad_ajaxCargarInformacionEmpresa'),
('tareas_usuarios_vendedores', 'action_entidad_create'),
('tareas_usuarios_vendedores', 'action_entidad_update'),
('tareas_usuarios_vendedores', 'action_entidad_view'),
('tareas_usuarios_vendedores', 'action_pais_ajaxListSelect2Pais'),
('tareas_usuarios_vendedores', 'action_provincia_ajaxGetProvinciaPais'),
('tareas_usuarios_vendedores', 'action_provincia_ajaxListSelect2Provincias'),
('tareas_administradores_master', 'action_ui_editprofile'),
('tareas_usuarios_vendedores', 'action_ui_editprofile'),
('tareas_administradores_master', 'action_ui_usermanagementadminroles'),
('tareas_usuarios_vendedores', 'action_ui_usermanagementadminroles'),
('usuarios_administradores', 'action_ui_usermanagementadminroles'),
('tareas_administradores_master', 'action_ui_usermanagementcreateroles'),
('tareas_usuarios_administradores', 'action_ui_usermanagementcreateroles'),
('usuarios_administradores', 'action_ui_usermanagementcreateroles'),
('tareas_administradores_master', 'action_ui_usermanagementupdateroles'),
('tareas_usuarios_administradores', 'action_ui_usermanagementupdateroles'),
('usuarios_administradores', 'action_ui_usermanagementupdateroles'),
('administradores_master', 'Cruge.ui.*'),
('administradores_master', 'tareas_administradores_master'),
('usuarios_administradores', 'tareas_administradores_master'),
('usuarios_vendedores', 'tareas_usuarios_vendedores'),
('tareas_usuarios_vendedores', 'usermanagementadminroles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_field`
--

CREATE TABLE IF NOT EXISTS `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_fieldvalue`
--

CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_session`
--

CREATE TABLE IF NOT EXISTS `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1421372690, 1421420690, 1, '::1', 2, 1421378505, NULL, NULL),
(2, 3, 1421373951, 1421421951, 1, '::1', 1, 1421373951, NULL, NULL),
(3, 1, 1421461728, 1421509728, 1, '::1', 1, 1421461728, NULL, NULL),
(4, 1, 1421537897, 1421585897, 1, '::1', 1, 1421537897, NULL, NULL),
(5, 1, 1421714128, 1421762128, 1, '::1', 1, 1421714128, NULL, NULL),
(6, 1, 1421806893, 1421854893, 1, '::1', 1, 1421806893, NULL, NULL),
(7, 1, 1422138670, 1422186670, 1, '::1', 1, 1422138670, NULL, NULL),
(8, 1, 1422212896, 1422260896, 1, '::1', 1, 1422212896, NULL, NULL),
(9, 1, 1422406499, 1422454499, 1, '::1', 1, 1422406499, NULL, NULL),
(10, 3, 1422408847, 1422456847, 0, '::1', 1, 1422408847, 1422409250, '::1'),
(11, 4, 1422409236, 1422457236, 1, '::1', 5, 1422411140, NULL, NULL),
(12, 3, 1422409678, 1422457678, 1, '::1', 1, 1422409678, NULL, NULL),
(13, 5, 1422411053, 1422459053, 1, '::1', 1, 1422411053, NULL, NULL),
(14, 7, 1422412500, 1422460500, 1, '::1', 1, 1422412500, NULL, NULL),
(15, 1, 1422472366, 1422520366, 1, '127.0.0.1', 1, 1422472366, NULL, NULL),
(16, 3, 1422472564, 1422520564, 1, '127.0.0.1', 1, 1422472564, NULL, NULL),
(17, 4, 1422472804, 1422520804, 1, '127.0.0.1', 1, 1422472804, NULL, NULL),
(18, 7, 1422472833, 1422520833, 1, '127.0.0.1', 2, 1422472957, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_system`
--

CREATE TABLE IF NOT EXISTS `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_system`
--

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 800, 10, 1, -1, -1, 0, 0, 0, 0, NULL, 0, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_user`
--

CREATE TABLE IF NOT EXISTS `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  `nombre` varchar(32) DEFAULT NULL,
  `apellido` varchar(32) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `codigo` varchar(32) NOT NULL,
  `zona_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`, `nombre`, `apellido`, `documento`, `fecha_nacimiento`, `codigo`, `zona_id`) VALUES
(1, NULL, NULL, 1406685837, 'admin', 'armand1live@gmail.com', 'admin', 'admin', 1, 0, 0, NULL, '', '', '0000-00-00', '', NULL),
(2, 1402682125, NULL, NULL, 'invitado', 'inv@yahoo.es', '123456', 'ee465341224c33f3982a7b83c7ab0f6e', 2, 0, 0, NULL, '', '', '0000-00-00', '', NULL),
(3, 1421373816, NULL, 1422472564, 'administradores_master1', 'administradores_master1@hotmail.com', '123456', '7493d3ea79dae69d2f098faa48193524', 1, 0, 0, 'administradores_master1', 'administradores_master1', 'administradores_mast', '0000-00-00', '', NULL),
(4, 1421374169, NULL, 1422472804, 'usuarios_administradores1', 'usuarios_administradores1@gmail.com', '123456', '317bb7a826463e3f1527d3b562874f33', 1, 0, 0, 'usuarios_administradores1', 'usuarios_administradores1', '0111', '2014-12-28', '', NULL),
(5, 1421374346, NULL, 1422411053, 'usuarios_administradores2', 'usuarios_administradores2@gmail.com', '123456', 'fe9188e762d206e72abb2adb955549ea', 1, 0, 0, 'usuarios_administradores2', 'usuarios_administradores2', '100', '2014-12-28', '', NULL),
(6, 1421374525, NULL, NULL, 'usuarios_administradores3', 'usuarios_administradores3@gmai.com', '123456', 'b05a8181656eb93a2e00c98669f1c6f3', 1, 0, 0, 'usuarios_administradores3', 'usuarios_administradores3', '16584', '2008-12-29', '', NULL),
(7, 1422412085, NULL, 1422472957, 'usuarios_vendedores1', 'usuarios_vendedores1@gmail.com', '123456', '24136921c892297d4b517a3f331b73cb', 1, 0, 0, 'usuarios_vendedores1', 'usuarios_vendedores1', 'usuarios_vendedores1', '2014-12-29', '', NULL),
(8, 1422412195, NULL, NULL, 'usuarios_vendedores2', 'usuarios_vendedores2@gmail.com', '123456', '3a2f57475b60ef553559e97dda2790b1', 1, 0, 0, 'usuarios_vendedores2', 'usuarios_vendedores2', 'usuarios_vendedores2', '2015-01-27', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calle_principal` varchar(64) DEFAULT NULL,
  `calle_secundaria` varchar(64) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  `pais_id` int(11) DEFAULT NULL,
  `coord_x` double DEFAULT NULL,
  `coord_y` double DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `entidad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_direccion_ciudad1_idx` (`ciudad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE IF NOT EXISTS `entidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `razon_social` varchar(64) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `raking` int(11) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `max_entidad` int(11) DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `matriz` tinyint(4) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `industria_id` int(11) DEFAULT NULL,
  `entidad_id` int(11) DEFAULT NULL,
  `max_foto` int(11) DEFAULT NULL,
  `descripcion` text,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entidad_categoria1_idx` (`categoria_id`),
  KEY `fk_entidad_industria1_idx` (`industria_id`),
  KEY `fk_entidad_entidad1_idx` (`entidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad_foto`
--

CREATE TABLE IF NOT EXISTS `entidad_foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) NOT NULL,
  `ruta` varchar(512) NOT NULL,
  `entidad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entidad_foto_entidad1_idx` (`entidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
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
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evento_evento_tipo1_idx` (`evento_tipo_id`),
  KEY `fk_evento_evento_prioridad1_idx` (`evento_prioridad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_prioridad`
--

CREATE TABLE IF NOT EXISTS `evento_prioridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_tipo`
--

CREATE TABLE IF NOT EXISTS `evento_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `industria`
--

CREATE TABLE IF NOT EXISTS `industria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `pais_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_provincia_pais1_idx` (`pais_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_asignados`
--

CREATE TABLE IF NOT EXISTS `usuarios_asignados` (
  `iduser` int(11) NOT NULL,
  `iduser_asignado` int(11) NOT NULL,
  PRIMARY KEY (`iduser`,`iduser_asignado`),
  KEY `fk_usuario_asignado_id_idx` (`iduser_asignado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_asignados`
--

INSERT INTO `usuarios_asignados` (`iduser`, `iduser_asignado`) VALUES
(1, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciudad_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authassignment`
--
ALTER TABLE `cruge_authassignment`
  ADD CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authitemchild`
--
ALTER TABLE `cruge_authitemchild`
  ADD CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cruge_fieldvalue`
--
ALTER TABLE `cruge_fieldvalue`
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_direccion_ciudad1` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD CONSTRAINT `fk_entidad_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entidad_entidad1` FOREIGN KEY (`entidad_id`) REFERENCES `entidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entidad_industria1` FOREIGN KEY (`industria_id`) REFERENCES `industria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entidad_foto`
--
ALTER TABLE `entidad_foto`
  ADD CONSTRAINT `fk_entidad_foto_entidad1` FOREIGN KEY (`entidad_id`) REFERENCES `entidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_evento_prioridad1` FOREIGN KEY (`evento_prioridad_id`) REFERENCES `evento_prioridad` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_evento_tipo1` FOREIGN KEY (`evento_tipo_id`) REFERENCES `evento_tipo` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `fk_provincia_pais1` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_asignados`
--
ALTER TABLE `usuarios_asignados`
  ADD CONSTRAINT `fk_usuario_asignado_id` FOREIGN KEY (`iduser_asignado`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
