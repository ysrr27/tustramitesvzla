-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-08-2016 a las 11:23:42
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
-- Estructura de tabla para la tabla `m_seccion`
--

CREATE TABLE IF NOT EXISTS `m_seccion` (
  `m_seccion_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_seccion_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_seccion_descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`m_seccion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `m_seccion`
--

INSERT INTO `m_seccion` (`m_seccion_id`, `m_seccion_nombre`, `m_seccion_descripcion`) VALUES
(1, 'Clientes', 'Para la gestión y registro de clientes'),
(2, 'Categorias', 'Para ingresar las categorías en las que se puede publicar'),
(3, 'Ventas', 'Para los reportes de ventas '),
(4, 'Ofertas', 'Para las ofertas de ventas'),
(5, 'Administracion', 'Para cambios de claves');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
