-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-03-2019 a las 21:59:03
-- Versión del servidor: 10.3.13-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id6558475_discos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id_album` int(4) NOT NULL,
  `id_genero` int(4) NOT NULL,
  `id_artista` int(4) NOT NULL,
  `id_disquera` int(4) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` float(6,2) NOT NULL,
  `fotografia` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `stock` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `id_genero`, `id_artista`, `id_disquera`, `nombre`, `descripcion`, `precio`, `fotografia`, `fecha_publicacion`, `stock`) VALUES
(1, 8, 2, 4, 'Mothership', '2007 Atlantic Recording Corporation', 250.00, 'MSP.jpg', '2007-11-09', 2),
(2, 1, 8, 3, 'The Golden Age', 'One of the main themes of the album is growth discovery and life it starts with the song about childhood that is gonna end.', 140.00, 'TGE.jpg', '2013-01-01', 7),
(3, 9, 9, 3, 'White Album', 'Weezer,s self-titled, tenth studio album (referred to as The White Album)', 247.45, 'WA.jpg', '2016-04-01', 29),
(4, 7, 8, 5, 'marqui', 'kjhb', 190.00, 'WL.jpg', '2014-12-29', 1),
(5, 9, 9, 1, 'The Everthing Will B', 'mmmmmmmmmmmmmmm', 250.00, 'EWBAITE.jpg', '2018-12-04', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `id_artista` int(4) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `nombre`) VALUES
(1, 'Howard Shore'),
(2, 'Led Zeppelin'),
(3, 'Sir Sly'),
(4, 'Carpenters'),
(5, 'Bread'),
(6, 'Keane'),
(7, 'Hoizer'),
(8, 'Wookid'),
(9, 'Weezer'),
(10, 'Motorhead'),
(11, 'Chrsitopher Lee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(4) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(4) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(2) NOT NULL,
  `correo_electronico` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id_detalle` int(4) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `id_venta` int(4) NOT NULL,
  `cantidad_total` float(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disquera`
--

CREATE TABLE `disquera` (
  `id_disquera` int(4) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `disquera`
--

INSERT INTO `disquera` (`id_disquera`, `nombre`) VALUES
(1, 'EMI'),
(2, 'Universal Music Grou'),
(3, 'Sony Music'),
(4, 'Warner Bros. Records'),
(5, 'Polygram / Polydor'),
(6, 'BMG Music');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(4) NOT NULL,
  `id_cargo` int(4) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estado_civil` enum('Soltero','Casado','Union libre','Viudo','Divorciado') COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(4) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`) VALUES
(1, 'Alternative'),
(2, 'Blues'),
(3, 'Cantautor'),
(4, 'Electrónica'),
(5, 'ElectroPop'),
(6, 'Indie'),
(7, 'Heavy Metal'),
(8, 'Hard Rock'),
(9, 'Rock'),
(10, 'SoundTrack'),
(11, 'Rock Clásico'),
(12, 'Metal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(3) DEFAULT NULL,
  `nombres` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` enum('admin','user') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `usuario`, `password`, `tipo`) VALUES
(1, 'Carlos López', 'carlos', '1234', 'user'),
(2, 'Alberto Garcés', 'user', 'root', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(4) NOT NULL,
  `id_empleado` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `serie` int(3) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw1`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw1` (
`id_album` int(4)
,`nombre` varchar(20)
,`NG` varchar(15)
,`NA` varchar(15)
,`ND` varchar(20)
,`descripcion` text
,`precio` float(6,2)
,`fotografia` text
,`FP` date
,`qty` int(3)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw1`
--
DROP TABLE IF EXISTS `vw1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id6558475_carlos`@`%` SQL SECURITY DEFINER VIEW `vw1`  AS  select `album`.`id_album` AS `id_album`,`album`.`nombre` AS `nombre`,`genero`.`nombre` AS `NG`,`artista`.`nombre` AS `NA`,`disquera`.`nombre` AS `ND`,`album`.`descripcion` AS `descripcion`,`album`.`precio` AS `precio`,`album`.`fotografia` AS `fotografia`,`album`.`fecha_publicacion` AS `FP`,`album`.`stock` AS `qty` from (((`album` join `genero` on(`album`.`id_genero` = `genero`.`id_genero`)) join `artista` on(`album`.`id_artista` = `artista`.`id_artista`)) join `disquera` on(`album`.`id_disquera` = `disquera`.`id_disquera`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_artista` (`id_artista`),
  ADD KEY `id_disquera` (`id_disquera`);

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `disquera`
--
ALTER TABLE `disquera`
  ADD PRIMARY KEY (`id_disquera`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `id_artista` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id_detalle` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `disquera`
--
ALTER TABLE `disquera`
  MODIFY `id_disquera` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`),
  ADD CONSTRAINT `album_ibfk_3` FOREIGN KEY (`id_disquera`) REFERENCES `disquera` (`id_disquera`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `album` (`id_album`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
