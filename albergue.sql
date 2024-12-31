-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-06-2019 a las 04:21:44
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `albergue`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `rfc_adm` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `paterno` varchar(20) NOT NULL,
  `materno` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipos_usuarios_id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`rfc_adm`),
  KEY `fk_administradores_tipos_usuarios1` (`tipos_usuarios_id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`rfc_adm`, `nombre`, `paterno`, `materno`, `correo`, `password`, `tipos_usuarios_id_tipo`) VALUES
('AEGA960126', 'ANTONIO', 'ARCE', 'GUDIÃ‘O', 'tony260196@gmail.com', '4a181673429f0b6abbfd452f0f3b5950', 1),
('ZARE850217', 'ERICKA NAYELHI', 'ZAVALA', 'ROMERO', 'contacto@ezavalar.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albergue`
--

DROP TABLE IF EXISTS `albergue`;
CREATE TABLE IF NOT EXISTS `albergue` (
  `id_alb` varchar(30) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `nint` int(11) DEFAULT NULL,
  `next` varchar(20) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `alcaldia` varchar(45) DEFAULT NULL,
  `num_perros` int(11) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `rfc_dueno` varchar(50) NOT NULL,
  PRIMARY KEY (`id_alb`),
  KEY `fk_albergue_dueno_albergue1` (`rfc_dueno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diario`
--

DROP TABLE IF EXISTS `diario`;
CREATE TABLE IF NOT EXISTS `diario` (
  `id_diario` varchar(30) NOT NULL,
  `fecha_registro` date NOT NULL,
  `foto` mediumblob,
  `cometario` varchar(1500) DEFAULT NULL,
  `usuario_rfc_us` varchar(30) NOT NULL,
  PRIMARY KEY (`id_diario`),
  KEY `fk_diario_usuario1` (`usuario_rfc_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueno_albergue`
--

DROP TABLE IF EXISTS `dueno_albergue`;
CREATE TABLE IF NOT EXISTS `dueno_albergue` (
  `rfc_dueno` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `paterno` varchar(20) NOT NULL,
  `materno` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `nint` int(11) DEFAULT NULL,
  `next` varchar(20) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `alcaldia` varchar(45) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `adm_rfc_adm` varchar(50) NOT NULL,
  `tipos_usuarios_id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`rfc_dueno`),
  KEY `fk_dueno_albergue_administradores` (`adm_rfc_adm`),
  KEY `fk_dueno_albergue_tipos_usuarios1` (`tipos_usuarios_id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dueno_albergue`
--

INSERT INTO `dueno_albergue` (`rfc_dueno`, `nombre`, `paterno`, `materno`, `correo`, `password`, `calle`, `nint`, `next`, `colonia`, `estado`, `alcaldia`, `cp`, `adm_rfc_adm`, `tipos_usuarios_id_tipo`) VALUES
('1985', 'ERICKA', 'ZAVALA', 'LHFJSHFJKH', 'emmica050@hotmail.com', '9d8b35471ac89668736a59677b17f8a5', 'MEXICO', 11, 'MEXICO', 'HKJHJK', 'ESTADO DE MEXICO', 'NBDSHABHJ', 54090, 'AEGA960126', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE IF NOT EXISTS `ficha` (
  `id_ficha` int(11) NOT NULL,
  `comentarios` varchar(1000) DEFAULT NULL,
  `fecha_cita` varchar(45) DEFAULT NULL,
  `perros_id_perros` varchar(30) NOT NULL,
  `usuario_rfc_us` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ficha`),
  KEY `fk_ficha_perros1` (`perros_id_perros`),
  KEY `fk_ficha_usuario1` (`usuario_rfc_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perros`
--

DROP TABLE IF EXISTS `perros`;
CREATE TABLE IF NOT EXISTS `perros` (
  `id_perros` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `raza` varchar(20) DEFAULT NULL,
  `foto` mediumblob,
  `color` varchar(15) DEFAULT NULL,
  `tamano` varchar(15) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `albergue_id_alb` varchar(30) NOT NULL,
  PRIMARY KEY (`id_perros`),
  KEY `fk_perros_albergue1` (`albergue_id_alb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

DROP TABLE IF EXISTS `tipos_usuarios`;
CREATE TABLE IF NOT EXISTS `tipos_usuarios` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`id_tipo`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Dueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `rfc_us` varchar(30) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `nint` int(11) DEFAULT NULL,
  `next` varchar(20) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `alcaldia` varchar(45) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `tipos_usuarios_id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`rfc_us`),
  KEY `fk_usuario_tipos_usuarios1` (`tipos_usuarios_id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

DROP TABLE IF EXISTS `vacunas`;
CREATE TABLE IF NOT EXISTS `vacunas` (
  `id_vac` varchar(40) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_vac`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas_perros`
--

DROP TABLE IF EXISTS `vacunas_perros`;
CREATE TABLE IF NOT EXISTS `vacunas_perros` (
  `vacunas_id_vac` varchar(40) NOT NULL,
  `perros_id_perros` varchar(30) NOT NULL,
  `fecha_vacuna` date DEFAULT NULL,
  PRIMARY KEY (`vacunas_id_vac`,`perros_id_perros`),
  KEY `fk_vacunas_has_perros_perros1` (`perros_id_perros`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `fk_administradores_tipos_usuarios1` FOREIGN KEY (`tipos_usuarios_id_tipo`) REFERENCES `tipos_usuarios` (`id_tipo`);

--
-- Filtros para la tabla `albergue`
--
ALTER TABLE `albergue`
  ADD CONSTRAINT `fk_albergue_dueno_albergue1` FOREIGN KEY (`rfc_dueno`) REFERENCES `dueno_albergue` (`rfc_dueno`);

--
-- Filtros para la tabla `diario`
--
ALTER TABLE `diario`
  ADD CONSTRAINT `fk_diario_usuario1` FOREIGN KEY (`usuario_rfc_us`) REFERENCES `usuario` (`rfc_us`);

--
-- Filtros para la tabla `dueno_albergue`
--
ALTER TABLE `dueno_albergue`
  ADD CONSTRAINT `fk_dueno_albergue_administradores` FOREIGN KEY (`adm_rfc_adm`) REFERENCES `administradores` (`rfc_adm`),
  ADD CONSTRAINT `fk_dueno_albergue_tipos_usuarios1` FOREIGN KEY (`tipos_usuarios_id_tipo`) REFERENCES `tipos_usuarios` (`id_tipo`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `fk_ficha_perros1` FOREIGN KEY (`perros_id_perros`) REFERENCES `perros` (`id_perros`),
  ADD CONSTRAINT `fk_ficha_usuario1` FOREIGN KEY (`usuario_rfc_us`) REFERENCES `usuario` (`rfc_us`);

--
-- Filtros para la tabla `perros`
--
ALTER TABLE `perros`
  ADD CONSTRAINT `fk_perros_albergue1` FOREIGN KEY (`albergue_id_alb`) REFERENCES `albergue` (`id_alb`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipos_usuarios1` FOREIGN KEY (`tipos_usuarios_id_tipo`) REFERENCES `tipos_usuarios` (`id_tipo`);

--
-- Filtros para la tabla `vacunas_perros`
--
ALTER TABLE `vacunas_perros`
  ADD CONSTRAINT `fk_vacunas_has_perros_perros1` FOREIGN KEY (`perros_id_perros`) REFERENCES `perros` (`id_perros`),
  ADD CONSTRAINT `fk_vacunas_has_perros_vacunas1` FOREIGN KEY (`vacunas_id_vac`) REFERENCES `vacunas` (`id_vac`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
