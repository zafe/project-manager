-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2014 a las 21:37:02
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdgestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacioneq`
--

DROP TABLE IF EXISTS `asignacioneq`;
CREATE TABLE IF NOT EXISTS `asignacioneq` (
  `idAsignacion` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `fecha_asig` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciontarea`
--

DROP TABLE IF EXISTS `asignaciontarea`;
CREATE TABLE IF NOT EXISTS `asignaciontarea` (
`idAsignacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idTarea` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `asignaciontarea`
--

INSERT INTO `asignaciontarea` (`idAsignacion`, `idUsuario`, `idTarea`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AsignacionUs`
--

DROP TABLE IF EXISTS `AsignacionUs`;
CREATE TABLE IF NOT EXISTS `AsignacionUs` (
  `idAsignacion` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha_asig` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AsignacionUs`
--

INSERT INTO `AsignacionUs` (`idAsignacion`, `idEquipo`, `idUsuario`, `fecha_asig`, `rol`) VALUES
(1, 1, 1, '2014-12-05 19:23:02', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calendario`
--

DROP TABLE IF EXISTS `Calendario`;
CREATE TABLE IF NOT EXISTS `Calendario` (
  `idCalendario` int(11) NOT NULL,
  `idEntrega` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `observaciones` text NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_plazo_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Entrega`
--

DROP TABLE IF EXISTS `Entrega`;
CREATE TABLE IF NOT EXISTS `Entrega` (
  `idEntrega` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `observaciones` text,
  `fecha_plazo_final` timestamp NULL DEFAULT NULL,
  `fecha_entrega` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EquipoTrabajo`
--

DROP TABLE IF EXISTS `EquipoTrabajo`;
CREATE TABLE IF NOT EXISTS `EquipoTrabajo` (
`idEquipo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `EquipoTrabajo`
--

INSERT INTO `EquipoTrabajo` (`idEquipo`, `nombre`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'Administradores', '2014-12-05 19:21:58', NULL),
(2, 'Desarrollo1', '2014-12-05 20:10:57', NULL),
(3, 'Desarrollo2', '2014-12-05 20:10:57', NULL),
(4, 'Testing', '2014-12-05 20:10:57', NULL),
(5, 'Desarrollo3', '2014-12-05 20:10:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Movimiento`
--

DROP TABLE IF EXISTS `Movimiento`;
CREATE TABLE IF NOT EXISTS `Movimiento` (
  `idMovimietno` int(11) NOT NULL,
  `idSubtarea` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `comentarios` text NOT NULL,
  `fecha_mov` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proyecto`
--

DROP TABLE IF EXISTS `Proyecto`;
CREATE TABLE IF NOT EXISTS `Proyecto` (
`idProyecto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_final` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Proyecto`
--

INSERT INTO `Proyecto` (`idProyecto`, `nombre`, `fecha_creacion`, `fecha_final`) VALUES
(1, 'WebRecursos', '2014-12-05 20:16:15', NULL),
(2, 'Sistema911', '2014-12-05 20:16:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Subtarea`
--

DROP TABLE IF EXISTS `Subtarea`;
CREATE TABLE IF NOT EXISTS `Subtarea` (
`idSubtarea` int(11) NOT NULL,
  `idTarea` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `idResponsable` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Subtarea`
--

INSERT INTO `Subtarea` (`idSubtarea`, `idTarea`, `descripcion`, `idResponsable`, `estado`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 10, 'Crear clase Tareas', NULL, 1, '2014-12-09 02:00:00', '2014-12-09 02:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tarea`
--

DROP TABLE IF EXISTS `Tarea`;
CREATE TABLE IF NOT EXISTS `Tarea` (
`idTarea` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idProyecto` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Tarea`
--

INSERT INTO `Tarea` (`idTarea`, `idEquipo`, `descripcion`, `estado`, `fecha_inicio`, `fecha_fin`, `idProyecto`) VALUES
(1, 2, 'Crear estructura de carpetas y ventanas de la web', 1, '2014-12-05 20:19:29', '0000-00-00 00:00:00', 1),
(2, 2, 'Crear base de datos', 1, '2014-12-05 20:19:29', '0000-00-00 00:00:00', 2),
(5, 2, 'Programar el manejo de la sesion', 1, '2014-12-05 20:20:56', '0000-00-00 00:00:00', 2),
(6, 2, 'Programar alta, baja y modificacion de usuarios', 1, '2014-12-05 20:20:56', '0000-00-00 00:00:00', 2),
(9, 3, 'Crear base de datos postgres', 1, '2014-12-05 20:24:15', '0000-00-00 00:00:00', 1),
(10, 1, 'Desarrollar Alta de Tareas', 1, '2014-12-08 16:43:20', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE IF NOT EXISTS `Usuario` (
`idUsuario` int(11) NOT NULL,
  `nomb_usr` varchar(20) NOT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` int(11) NOT NULL,
  `sueldo` double DEFAULT NULL,
  `url_imagen` varchar(30) NOT NULL DEFAULT 'img/default/default.gif'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`idUsuario`, `nomb_usr`, `fecha_alta`, `fecha_baja`, `password`, `nombre`, `apellido`, `dni`, `sueldo`, `url_imagen`) VALUES
(1, 'rmartinez', '2014-12-05 19:15:12', NULL, 'ca18det', 'Raul Alberto', 'Martinez', 35199577, 6000, 'img/rmartinez.jpg'),
(3, 'erojas', '2014-12-05 23:56:28', NULL, '$1$x84.m03.$TfQNXaup', 'Esteban Javier', 'Rojas', 35000000, 6000, 'img/default/default.gif');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacioneq`
--
ALTER TABLE `asignacioneq`
 ADD PRIMARY KEY (`idAsignacion`);

--
-- Indices de la tabla `asignaciontarea`
--
ALTER TABLE `asignaciontarea`
 ADD PRIMARY KEY (`idAsignacion`);

--
-- Indices de la tabla `AsignacionUs`
--
ALTER TABLE `AsignacionUs`
 ADD PRIMARY KEY (`idAsignacion`);

--
-- Indices de la tabla `Calendario`
--
ALTER TABLE `Calendario`
 ADD PRIMARY KEY (`idCalendario`);

--
-- Indices de la tabla `Entrega`
--
ALTER TABLE `Entrega`
 ADD PRIMARY KEY (`idEntrega`);

--
-- Indices de la tabla `EquipoTrabajo`
--
ALTER TABLE `EquipoTrabajo`
 ADD PRIMARY KEY (`idEquipo`);

--
-- Indices de la tabla `Movimiento`
--
ALTER TABLE `Movimiento`
 ADD PRIMARY KEY (`idMovimietno`);

--
-- Indices de la tabla `Proyecto`
--
ALTER TABLE `Proyecto`
 ADD PRIMARY KEY (`idProyecto`);

--
-- Indices de la tabla `Subtarea`
--
ALTER TABLE `Subtarea`
 ADD PRIMARY KEY (`idSubtarea`);

--
-- Indices de la tabla `Tarea`
--
ALTER TABLE `Tarea`
 ADD PRIMARY KEY (`idTarea`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciontarea`
--
ALTER TABLE `asignaciontarea`
MODIFY `idAsignacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `EquipoTrabajo`
--
ALTER TABLE `EquipoTrabajo`
MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Proyecto`
--
ALTER TABLE `Proyecto`
MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Subtarea`
--
ALTER TABLE `Subtarea`
MODIFY `idSubtarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Tarea`
--
ALTER TABLE `Tarea`
MODIFY `idTarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
