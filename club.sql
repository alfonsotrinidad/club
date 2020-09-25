-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2020 a las 13:04:54
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `club`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barcos`
--

CREATE TABLE `barcos` (
  `matricula` int(11) NOT NULL,
  `idPropietario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numeroamarre` varchar(10) DEFAULT NULL,
  `cuota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `barcos`
--

INSERT INTO `barcos` (`matricula`, `idPropietario`, `nombre`, `numeroamarre`, `cuota`) VALUES
(1, 1, 'Holandes herrante', '23', 50000),
(2, 2, 'perla negra', '12', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitanes`
--

CREATE TABLE `capitanes` (
  `id` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `celular` varchar(12) NOT NULL,
  `socio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `capitanes`
--

INSERT INTO `capitanes` (`id`, `apellidos`, `nombres`, `celular`, `socio`) VALUES
(1, 'el marino', 'popeye', '34554645', 1),
(2, 'Custeau', 'Jack', '67467555', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id` int(11) NOT NULL,
  `idbarco` int(11) NOT NULL,
  `idcapitan` int(11) NOT NULL,
  `fechasalida` date DEFAULT NULL,
  `fechaentrada` date NOT NULL,
  `destino` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`id`, `idbarco`, `idcapitan`, `fechasalida`, `fechaentrada`, `destino`) VALUES
(1, 1, 2, '2020-09-15', '2020-09-15', 'Monteria'),
(2, 2, 2, '2020-09-17', '2020-09-20', 'Cerete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(11) NOT NULL,
  `tipodocumento` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `nrofijo` varchar(9) NOT NULL,
  `celular` varchar(12) NOT NULL,
  `socio` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `tipodocumento`, `apellidos`, `nombres`, `nrofijo`, `celular`, `socio`) VALUES
(1, 'cedula', 'el marino', 'popeye', '1111', '1111', 1),
(2, 'cedula', 'polo', 'marco', '2222', '22222', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barcos`
--
ALTER TABLE `barcos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `idPropietario` (`idPropietario`);

--
-- Indices de la tabla `capitanes`
--
ALTER TABLE `capitanes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idbarco` (`idbarco`),
  ADD KEY `idcapitan` (`idcapitan`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barcos`
--
ALTER TABLE `barcos`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barcos`
--
ALTER TABLE `barcos`
  ADD CONSTRAINT `barcos_ibfk_1` FOREIGN KEY (`idPropietario`) REFERENCES `socios` (`id`);

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `salidas_ibfk_1` FOREIGN KEY (`idbarco`) REFERENCES `barcos` (`matricula`),
  ADD CONSTRAINT `salidas_ibfk_2` FOREIGN KEY (`idcapitan`) REFERENCES `capitanes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
