-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-08-2016 a las 11:20:34
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
-- Estructura de tabla para la tabla `m_grupo`
--

CREATE TABLE IF NOT EXISTS `m_grupo` (
  `m_grupo_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_grupo_nombre` varchar(100) NOT NULL,
  `m_grupo_descripcion` varchar(255) NOT NULL,
  `m_grupo_status` varchar(3) NOT NULL,
  PRIMARY KEY (`m_grupo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `m_grupo`
--

INSERT INTO `m_grupo` (`m_grupo_id`, `m_grupo_nombre`, `m_grupo_descripcion`, `m_grupo_status`) VALUES
(1, 'Super Admin', 'El super administrador del sistema, para privilegios de administraci&oacute;n de modulos', 'A'),
(3, 'Editor', 'Puede aprobar ventas, crear categor&iacute;as, subir ofertas ', 'A'),
(4, 'Prueba', 'Pura prueba', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
