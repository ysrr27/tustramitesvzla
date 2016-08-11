-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-08-2016 a las 11:22:14
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
-- Estructura de tabla para la tabla `bitacora_acceso`
--

CREATE TABLE IF NOT EXISTS `bitacora_acceso` (
  `b_acceso_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_acceso_usuario` varchar(200) NOT NULL,
  `b_acceso_accion` varchar(200) NOT NULL,
  `b_acceso_ip` varchar(200) NOT NULL,
  `b_acceso_fecha` datetime NOT NULL,
  PRIMARY KEY (`b_acceso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Volcado de datos para la tabla `bitacora_acceso`
--

INSERT INTO `bitacora_acceso` (`b_acceso_id`, `b_acceso_usuario`, `b_acceso_accion`, `b_acceso_ip`, `b_acceso_fecha`) VALUES
(1, 'jalfonzo', 'ACCESO PERMITIDO', '', '0000-00-00 00:00:00'),
(2, 'jalfonzo', 'ACCESO PERMITIDO', '', '0000-00-00 00:00:00'),
(3, 'jalfonzo', 'ACCESO PERMITIDO', '', '0000-00-00 00:00:00'),
(4, 'jalfonzo', 'ACCESO PERMITIDO', '', '0000-00-00 00:00:00'),
(5, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:28:00'),
(6, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:28:31'),
(7, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:31:02'),
(8, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:31:28'),
(9, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:31:40'),
(10, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:33:06'),
(11, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:35:14'),
(12, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:35:29'),
(13, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:46:45'),
(14, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:53:07'),
(15, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:53:28'),
(16, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:53:49'),
(17, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:54:08'),
(18, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:55:11'),
(19, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:56:35'),
(20, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:56:53'),
(21, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:57:02'),
(22, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:59:05'),
(23, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:59:22'),
(24, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 12:59:40'),
(25, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 13:01:09'),
(26, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:16:33'),
(27, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:33:01'),
(28, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:33:50'),
(29, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:35:03'),
(30, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 14:35:43'),
(31, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 16:46:52'),
(32, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 17:01:59'),
(33, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 17:03:37'),
(34, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-28 17:06:03'),
(35, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-29 09:26:29'),
(36, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-04-29 14:27:55'),
(37, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 09:13:16'),
(38, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 10:21:10'),
(39, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 11:44:05'),
(40, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 12:43:04'),
(41, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 14:30:45'),
(42, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 15:09:59'),
(43, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-02 16:12:09'),
(44, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-03 08:51:11'),
(45, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-03 10:06:35'),
(46, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-03 13:59:01'),
(47, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:31:24'),
(48, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:34:02'),
(49, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:37:02'),
(50, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:38:49'),
(51, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:41:10'),
(52, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:41:37'),
(53, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:42:33'),
(54, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:43:56'),
(55, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:45:15'),
(56, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:45:33'),
(57, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 08:45:42'),
(58, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 09:43:43'),
(59, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 11:17:23'),
(60, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 11:29:11'),
(61, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 11:29:40'),
(62, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 11:30:10'),
(63, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-04 14:36:48'),
(64, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-05 11:56:54'),
(65, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-05 15:48:48'),
(66, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-06 08:58:36'),
(67, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-06 14:47:28'),
(68, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-06 15:46:38'),
(69, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-10 14:09:38'),
(70, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-10 14:18:39'),
(71, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-11 09:35:13'),
(72, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-11 09:36:06'),
(73, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-11 09:36:49'),
(74, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-11 09:37:45'),
(75, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-12 12:43:59'),
(76, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-12 13:40:42'),
(77, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-12 15:06:57'),
(78, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-13 10:53:13'),
(79, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-13 16:23:03'),
(80, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-16 16:25:35'),
(81, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-23 09:03:22'),
(82, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-23 13:10:54'),
(83, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-23 14:24:46'),
(84, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-27 11:06:29'),
(85, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-30 08:44:37'),
(86, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-30 09:42:25'),
(87, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-30 14:15:48'),
(88, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-31 13:43:53'),
(89, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-31 13:48:04'),
(90, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-31 13:51:39'),
(91, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-05-31 15:29:10'),
(92, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-01 09:51:51'),
(93, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-01 13:55:09'),
(94, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-02 08:50:59'),
(95, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-02 15:15:42'),
(96, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-03 08:47:07'),
(97, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-03 13:52:29'),
(98, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-03 16:38:22'),
(99, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-05 10:35:51'),
(100, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-05 12:56:42'),
(101, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-05 12:57:25'),
(102, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 09:04:18'),
(103, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 10:36:01'),
(104, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 10:36:41'),
(105, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 10:41:09'),
(106, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 10:42:24'),
(107, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 11:10:01'),
(108, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 14:09:35'),
(109, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 14:39:39'),
(110, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-06 14:41:39'),
(111, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-07 12:09:08'),
(112, 'jalfonzo', 'ACCESO PERMITIDO', '127.0.0.1', '2016-06-07 15:09:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
