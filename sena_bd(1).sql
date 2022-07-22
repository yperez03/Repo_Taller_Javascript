-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2021 a las 16:49:45
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sena_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `Apre_id` int(11) NOT NULL,
  `Apre_tipoid` varchar(45) NOT NULL,
  `Apre_numid` varchar(45) NOT NULL,
  `Apre_nombres` varchar(45) NOT NULL,
  `Apre_apellidos` varchar(45) NOT NULL,
  `Apre_direccion` varchar(45) NOT NULL,
  `Apre_telefono` varchar(45) NOT NULL,
  `Apre_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`Apre_id`, `Apre_tipoid`, `Apre_numid`, `Apre_nombres`, `Apre_apellidos`, `Apre_direccion`, `Apre_telefono`, `Apre_ficha`) VALUES
(1, 'CC', '1065390997', 'JAVIER DAVID', 'DIAZ MARTINEZ', 'CALLE 15C #11 03', '3224534387', 2142334),
(2, 'CC', '1065388768', 'YEILY ', 'PEREZ VERGEL', 'calle 15 #22 34', '3425984343', 2142334),
(3, 'CC', '36789857', 'CENIRA', 'RODRIGUEZ MATILDA', 'DIAGONAL 22 43 76', '3128824849', 2142334);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `ficha_numero` int(11) NOT NULL,
  `ficha_progra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`ficha_numero`, `ficha_progra`) VALUES
(2142334, 1),
(2135442, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `programa_id` int(11) NOT NULL DEFAULT 10,
  `progra_nombre` varchar(45) NOT NULL,
  `progra_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`programa_id`, `progra_nombre`, `progra_tipo`) VALUES
(1, 'ADSI', 1),
(2, 'SISTEMAS', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposprograma`
--

CREATE TABLE `tiposprograma` (
  `tiposp_id` int(11) NOT NULL,
  `tiposp_tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposprograma`
--

INSERT INTO `tiposprograma` (`tiposp_id`, `tiposp_tipo`) VALUES
(1, 'PRESENCIAL'),
(2, 'VIRTUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usua_id` int(11) NOT NULL,
  `usua_nomuser` varchar(45) NOT NULL,
  `usua_contra` varchar(45) NOT NULL,
  `usua_tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usua_id`, `usua_nomuser`, `usua_contra`, `usua_tipo`) VALUES
(1, 'IVAN', '1234', 'ADMINISTRADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`Apre_id`),
  ADD KEY `fk_aprendices_fichas1_idx` (`Apre_ficha`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`ficha_numero`) USING BTREE,
  ADD KEY `fk_fichas_programa1_idx` (`ficha_progra`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`programa_id`),
  ADD KEY `fk_programa_tiposprograma_idx` (`progra_tipo`);

--
-- Indices de la tabla `tiposprograma`
--
ALTER TABLE `tiposprograma`
  ADD PRIMARY KEY (`tiposp_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usua_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `Apre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `fk_aprendices_fichas1` FOREIGN KEY (`Apre_ficha`) REFERENCES `fichas` (`ficha_numero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fk_fichas_programa1` FOREIGN KEY (`ficha_progra`) REFERENCES `programa` (`programa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `fk_programa_tiposprograma` FOREIGN KEY (`progra_tipo`) REFERENCES `tiposprograma` (`tiposp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
