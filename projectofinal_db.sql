-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2024 a las 04:04:43
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projectofinal_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `ID` int(11) NOT NULL,
  `propietario` varchar(80) NOT NULL,
  `nombreherramienta` varchar(80) NOT NULL,
  `descripcionherramienta` varchar(250) NOT NULL,
  `latitudherramienta` varchar(80) NOT NULL,
  `longitudherramienta` varchar(80) NOT NULL,
  `direccionherramienta` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`ID`, `propietario`, `nombreherramienta`, `descripcionherramienta`, `latitudherramienta`, `longitudherramienta`, `direccionherramienta`) VALUES
(3, 'Carlos', 'AMOLADORA BOSCH', 'descripcion amoladora', '-26.8388312', '-65.2080945', 'Lavalle 577'),
(4, 'Nahuel', 'Destornillador', 'destornillador automatico de punta fina', '-26.83189476758651', '-65.20706899211119', 'buenos aires 200'),
(5, 'Juan', 'Martillo', 'Descripcion martillo', '-26.836596495611893', '-65.21198076277919', 'buenos aires 200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefono` int(11) NOT NULL,
  `provincia` varchar(80) NOT NULL,
  `ciudad` varchar(80) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `red1` varchar(80) NOT NULL,
  `red2` varchar(80) NOT NULL,
  `red3` varchar(80) NOT NULL,
  `direccion_local` varchar(80) NOT NULL,
  `direccion_hogar` varchar(80) NOT NULL,
  `imagen` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `password`, `nombre`, `email`, `telefono`, `provincia`, `ciudad`, `descripcion`, `red1`, `red2`, `red3`, `direccion_local`, `direccion_hogar`, `imagen`) VALUES
(2, 'admin', '1234', 'Carlos Miguel', 'carlos_s.a.magno@hotmail.com', 2147483647, 'tucuman', 'san miguel', '', '', '', '', '', '', ''),
(4, 'carlos25', '1234', 'Carlos Miguel Moreno', 'carlos.s.a.magno@gmail.com', 2147483647, 'jujuy', 'jujuy', '', '', '', '', '', '', ''),
(5, 'carlos28', '1234', 'Carlos Miguel Moreno', 'carlos.s.a.magno@gmail.com', 38746317, 'tucuman', 'san miguel', '1234', '1234', '1234', '1234', '1234', '1234', '../imagenesChrysanthemum.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
