-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-08-2016 a las 11:24:37
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `DB_amarillas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_permiso`
--

CREATE TABLE IF NOT EXISTS `m_permiso` (
  `m_permiso_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_grupo_id` int(4) NOT NULL,
  `m_seccion_id` int(4) NOT NULL,
  `m_accion_id` int(100) NOT NULL,
  `m_permiso_status` varchar(2) NOT NULL,
  PRIMARY KEY (`m_permiso_id`),
  KEY `grupoid` (`m_grupo_id`),
  KEY `accionid` (`m_accion_id`),
  KEY `seccionid` (`m_seccion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `m_permiso`
--

INSERT INTO `m_permiso` (`m_permiso_id`, `m_grupo_id`, `m_seccion_id`, `m_accion_id`, `m_permiso_status`) VALUES
(1, 1, 1, 1, 'SI'),
(2, 1, 1, 2, 'SI'),
(3, 1, 1, 4, 'SI'),
(4, 1, 1, 3, 'SI'),
(5, 1, 2, 1, 'SI'),
(6, 1, 2, 2, 'SI'),
(7, 1, 2, 3, 'SI'),
(8, 1, 2, 4, 'SI'),
(9, 1, 3, 2, 'SI'),
(10, 1, 4, 1, 'SI'),
(11, 1, 4, 2, 'SI'),
(12, 1, 4, 3, 'SI'),
(13, 1, 4, 4, 'SI'),
(14, 1, 5, 1, 'SI'),
(15, 1, 5, 2, 'SI'),
(16, 1, 5, 3, 'SI'),
(17, 1, 5, 4, 'SI'),
(18, 1, 3, 1, 'SI'),
(19, 1, 3, 3, 'SI'),
(20, 1, 3, 4, 'SI'),
(21, 4, 5, 1, 'NO'),
(22, 4, 5, 2, 'NO'),
(23, 4, 5, 3, 'NO'),
(24, 4, 5, 4, 'NO'),
(25, 4, 2, 1, 'NO'),
(26, 4, 2, 2, 'NO'),
(27, 4, 2, 3, 'NO'),
(28, 4, 2, 4, 'NO'),
(29, 4, 1, 1, 'SI'),
(30, 4, 1, 2, 'SI'),
(31, 4, 1, 3, 'SI'),
(32, 4, 1, 4, 'NO'),
(33, 4, 4, 1, 'NO'),
(34, 4, 4, 2, 'NO'),
(35, 4, 4, 3, 'NO'),
(36, 4, 4, 4, 'NO'),
(37, 4, 3, 1, 'NO'),
(38, 4, 3, 2, 'NO'),
(39, 4, 3, 3, 'NO'),
(40, 4, 3, 4, 'NO');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `m_permiso`
--
ALTER TABLE `m_permiso`
  ADD CONSTRAINT `accionid` FOREIGN KEY (`m_accion_id`) REFERENCES `m_acciones` (`m_acciones_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grupoid` FOREIGN KEY (`m_grupo_id`) REFERENCES `m_grupo` (`m_grupo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `seccionid` FOREIGN KEY (`m_seccion_id`) REFERENCES `m_seccion` (`m_seccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
