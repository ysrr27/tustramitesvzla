-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-08-2016 a las 11:23:09
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
-- Estructura de tabla para la tabla `m_acciones`
--

CREATE TABLE IF NOT EXISTS `m_acciones` (
  `m_acciones_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_acciones_nombre` varchar(100) NOT NULL,
  `m_acciones_descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`m_acciones_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `m_acciones`
--

INSERT INTO `m_acciones` (`m_acciones_id`, `m_acciones_nombre`, `m_acciones_descripcion`) VALUES
(1, 'Agregar', 'Para cargar nuevos pacientes'),
(2, 'Ver', 'Para listar'),
(3, 'Editar', 'Permite hacer ediciones'),
(4, 'Eliminar', 'Permite eliminar de la base de datos');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
