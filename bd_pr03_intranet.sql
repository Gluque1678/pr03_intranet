-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2015 a las 03:40:16
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_pr03_intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horas`
--

CREATE TABLE IF NOT EXISTS `tbl_horas` (
  `id_hora` int(11) NOT NULL,
  `hora` varchar(12) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_horas`
--

INSERT INTO `tbl_horas` (`id_hora`, `hora`) VALUES
(1, '9:00-10:00'),
(2, '10:00-11:00'),
(3, '11:00-12:00'),
(4, '12:00-13:00'),
(5, '13:00-14:00'),
(6, '14:00-15:00'),
(7, '15:00-16:00'),
(8, '16:00-17:00'),
(9, '17:00-18:00'),
(10, '18:00-19:00'),
(11, '19:00-20:00'),
(12, '20:00-21:00'),
(13, '21:00-22:00'),
(14, '22:00-23:00'),
(15, '23:00-24:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_material`
--

CREATE TABLE IF NOT EXISTS `tbl_material` (
  `id_material` int(11) NOT NULL,
  `id_tipo_material` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_bin,
  `disponible` tinyint(1) DEFAULT NULL,
  `incidencia` tinyint(1) DEFAULT NULL,
  `descripcion_incidencia` text COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_material`
--

INSERT INTO `tbl_material` (`id_material`, `id_tipo_material`, `descripcion`, `disponible`, `incidencia`, `descripcion_incidencia`) VALUES
(1, 1, 'Sala Reuniones 01', 0, 0, NULL),
(2, 1, 'Sala Reuniones 02', 0, 0, NULL),
(3, 1, 'Despacho 01', 0, 0, NULL),
(4, 1, 'Despacho 02', 0, 0, NULL),
(5, 1, 'Aula Informática 01', 0, 0, NULL),
(6, 1, 'Aula Informática 02', 0, 0, NULL),
(7, 1, 'Aula Teoría 01', 0, 0, NULL),
(8, 1, 'Aula Teoría 02', 0, 0, NULL),
(9, 1, 'Aula Teoría 03', 0, 0, NULL),
(10, 1, 'Aula Teoría 04', 0, 0, NULL),
(11, 2, 'Ordenador Portátil Dell', 0, 0, NULL),
(12, 2, 'Ordenador Portátil Apple', 0, 0, NULL),
(13, 2, 'Ordenador Portátil Acer', 0, 0, NULL),
(14, 2, 'Ordenador Portátil Asus', 0, 0, NULL),
(15, 2, 'Ordenador Portátil Lenovo', 0, 0, NULL),
(16, 2, 'Proyector Acer', 0, 0, NULL),
(17, 2, 'Proyector Benq', 0, 0, NULL),
(18, 2, 'Proyector Epson', 0, 0, NULL),
(19, 2, 'Proyector Optoma', 0, 0, NULL),
(20, 2, 'Proyector Lg', 0, 0, NULL),
(21, 2, 'Móvil Bq Aquaris', 0, 0, NULL),
(22, 2, 'Móvil Doogee Voyager', 0, 0, NULL),
(23, 2, 'Móvil Apple Iphone', 0, 0, NULL),
(24, 2, 'Móvil Hisense', 0, 0, NULL),
(25, 2, 'Móvil Samsung Galaxy', 0, 0, NULL),
(26, 0, 'Carro de portátil 01', 0, 0, NULL),
(27, 0, 'Carro de portátil 02', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE IF NOT EXISTS `tbl_reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `id_material` int(11) NOT NULL,
  `id_hora` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`id_reserva`, `id_usuario`, `fecha_entrada`, `fecha_salida`, `id_material`, `id_hora`) VALUES
(22, 5, '2015-11-05', '2015-11-16', 1, 1),
(23, 2, '2015-11-16', '2015-11-16', 1, 2),
(24, 8, '2015-11-16', NULL, 2, 0),
(25, 11, '2015-11-16', '2015-11-16', 1, 0),
(26, 10, '2015-11-16', '2015-11-16', 1, 0),
(27, 3, '2015-11-16', '2015-11-16', 1, 0),
(28, 11, '2015-11-16', '2015-11-16', 1, 0),
(29, 7, '2015-11-16', '2015-11-16', 1, 0),
(30, 11, '2015-11-16', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_material`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_material` (
  `id_tipo_material` int(11) NOT NULL,
  `tipo` text COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_tipo_material`
--

INSERT INTO `tbl_tipo_material` (`id_tipo_material`, `tipo`) VALUES
(1, 'sala'),
(2, 'material');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `rol` text COLLATE utf8_bin NOT NULL,
  `usuario_actiu` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `email`, `password`, `rol`, `usuario_actiu`) VALUES
(2, '2020.joan23@fje.edu', '1234', 'usuario\r\n', 1),
(3, '3030.joan23@fje.edu', '1234', 'usuario', 1),
(4, '4040.joan23@fje.edu', '1234', 'usuario', 1),
(5, '5050.joan23@fje.edu', '1234', 'usuario', 1),
(6, '6060.joan23@fje.edu', '1234', 'usuario', 1),
(7, '7070.joan23@fje.edu', '1234', 'usuario', 1),
(8, '8080.joan23@fje.edu', '1234', 'usuario', 1),
(10, '1111.joan23@fje.edu', '1234', 'usuario', 1),
(11, 'administrador@administrador', 'adm', 'administrador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_horas`
--
ALTER TABLE `tbl_horas`
  ADD PRIMARY KEY (`id_hora`),
  ADD KEY `id` (`id_hora`),
  ADD KEY `id_hora` (`id_hora`),
  ADD KEY `id_hora_2` (`id_hora`);

--
-- Indices de la tabla `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_tipo_material` (`id_tipo_material`),
  ADD KEY `id_tipo_material_2` (`id_tipo_material`);

--
-- Indices de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `hora` (`id_hora`),
  ADD KEY `hora_2` (`id_hora`),
  ADD KEY `hora_3` (`id_hora`),
  ADD KEY `id_hora` (`id_hora`),
  ADD KEY `id_hora_2` (`id_hora`);

--
-- Indices de la tabla `tbl_tipo_material`
--
ALTER TABLE `tbl_tipo_material`
  ADD PRIMARY KEY (`id_tipo_material`),
  ADD KEY `id_tipo_material` (`id_tipo_material`),
  ADD KEY `id_tipo_material_2` (`id_tipo_material`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_material`
--
ALTER TABLE `tbl_tipo_material`
  MODIFY `id_tipo_material` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD CONSTRAINT `tbl_reservas_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `tbl_material` (`id_material`),
  ADD CONSTRAINT `tbl_reservas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_tipo_material`
--
ALTER TABLE `tbl_tipo_material`
  ADD CONSTRAINT `tbl_tipo_material_ibfk_1` FOREIGN KEY (`id_tipo_material`) REFERENCES `tbl_material` (`id_tipo_material`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
