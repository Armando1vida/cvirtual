-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2015 a las 05:47:43
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cvirtual`
--

--
-- Volcado de datos para la tabla `cruge_authassignment`
--

INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
(3, NULL, 'N;', 'administradores_master'),
(4, NULL, 'N;', 'usuarios_administradores'),
(5, NULL, 'N;', 'usuarios_administradores'),
(6, NULL, 'N;', 'usuarios_administradores'),
(7, NULL, 'N;', 'usuarios_vendedores'),
(8, NULL, 'N;', 'usuarios_vendedores'),
(9, NULL, 'N;', 'usuarios_clientes');

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
('usuarios_administradores', 2, '', '', 'N;'),
('usuarios_clientes', 2, '', '', 'N;'),
('usuarios_registrados', 2, '', '', 'N;'),
('usuarios_vendedores', 2, '', '', 'N;');

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
('usuarios_vendedores', 'tareas_usuarios_vendedores');

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
(14, 7, 1422412500, 1422460500, 1, '::1', 1, 1422412500, NULL, NULL);

--
-- Volcado de datos para la tabla `cruge_system`
--


INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 800, 10, 1, -1, -1, 0, 0, 0, 0, NULL, 0, '', '', 1);

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`, `nombre`, `apellido`, `documento`, `fecha_nacimiento`, `codigo`, `zona_id`) VALUES
(1, NULL, NULL, 1406685837, 'admin', 'armand1live@gmail.com', 'admin', 'admin', 1, 0, 0, NULL, '', '', '0000-00-00', '', NULL),
(2, 1402682125, NULL, NULL, 'invitado', 'inv@yahoo.es', '123456', 'ee465341224c33f3982a7b83c7ab0f6e', 2, 0, 0, NULL, '', '', '0000-00-00', '', NULL),
(3, 1421373816, NULL, 1422409678, 'administradores_master1', 'administradores_master1@hotmail.com', '123456', '7493d3ea79dae69d2f098faa48193524', 1, 0, 0, 'administradores_master1', 'administradores_master1', 'administradores_mast', '0000-00-00', '', NULL),
(4, 1421374169, NULL, 1422411140, 'usuarios_administradores1', 'usuarios_administradores1@gmail.com', '123456', '317bb7a826463e3f1527d3b562874f33', 1, 0, 0, 'usuarios_administradores1', 'usuarios_administradores1', '0111', '2014-12-28', '', NULL),
(5, 1421374346, NULL, 1422411053, 'usuarios_administradores2', 'usuarios_administradores2@gmail.com', '123456', 'fe9188e762d206e72abb2adb955549ea', 1, 0, 0, 'usuarios_administradores2', 'usuarios_administradores2', '100', '2014-12-28', '', NULL),
(6, 1421374525, NULL, NULL, 'usuarios_administradores3', 'usuarios_administradores3@gmai.com', '123456', 'b05a8181656eb93a2e00c98669f1c6f3', 1, 0, 0, 'usuarios_administradores3', 'usuarios_administradores3', '16584', '2008-12-29', '', NULL),
(7, 1422412085, NULL, 1422412500, 'usuarios_vendedores1', 'usuarios_vendedores1@gmail.com', '123456', '24136921c892297d4b517a3f331b73cb', 1, 0, 0, 'usuarios_vendedores1', 'usuarios_vendedores1', 'usuarios_vendedores1', '2014-12-29', '', NULL),
(8, 1422412195, NULL, NULL, 'usuarios_vendedores2', 'usuarios_vendedores2@gmail.com', '123456', '3a2f57475b60ef553559e97dda2790b1', 1, 0, 0, 'usuarios_vendedores2', 'usuarios_vendedores2', 'usuarios_vendedores2', '2015-01-27', '', NULL),
(9, 1422414607, NULL, NULL, 'meetcliccliente_vendedor1', 'cliente_vendedor1@hotmail.com', '123456', 'ca3c2fed2fcdbbf493eef0693f885df0', 1, 0, 0, 'cliente_vendedor1', 'empresa', 'cliente_vendedor1', '2015-01-27', 'codigo', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET FOREIGN_KEY_CHECKS=1;