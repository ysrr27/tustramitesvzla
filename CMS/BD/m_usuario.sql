-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-08-2016 a las 11:18:02
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
-- Estructura de tabla para la tabla `m_usuario`
--

CREATE TABLE IF NOT EXISTS `m_usuario` (
  `m_usuario_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_usuario_login` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_usuario_password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_usuario_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_usuario_apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_grupo_id` int(4) NOT NULL,
  `m_usuario_status` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_usuario_correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`m_usuario_id`),
  KEY `idgrupo` (`m_grupo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `m_usuario`
--

INSERT INTO `m_usuario` (`m_usuario_id`, `m_usuario_login`, `m_usuario_password`, `m_usuario_nombre`, `m_usuario_apellido`, `m_grupo_id`, `m_usuario_status`, `m_usuario_correo`) VALUES
(1, 'jalfonzo', 'a35400f5d75488e299037db1895d2ee8', 'Jes&uacute;s', 'Alfonzo', 1, 'A', 'jesushalfonzo@gmail.com'),
(2, 'mlopez', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Milagro', 'L&oacute;pez', 1, 'A', 'milagrotle@gmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `m_usuario`
--
ALTER TABLE `m_usuario`
  ADD CONSTRAINT `idgrupo` FOREIGN KEY (`m_grupo_id`) REFERENCES `m_grupo` (`m_grupo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
