-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2016 a las 07:33:41
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `polibooks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` varchar(10) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApPaterno` varchar(100) DEFAULT NULL,
  `ApMaterno` varchar(100) DEFAULT NULL,
  `Calle` varchar(100) DEFAULT NULL,
  `Municipio` int(11) DEFAULT NULL,
  `Edo` int(11) DEFAULT NULL,
  `Credito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `Nombre`, `ApPaterno`, `ApMaterno`, `Calle`, `Municipio`, `Edo`, `Credito`) VALUES
('2015630000', 'Max', 'Acoltzi', 'Santillan', 'Buenavista', 1, 1, 0),
('FED', 'Eduardo', 'Estrada', 'Sanchez', 'Flores', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApPaterno` varchar(100) DEFAULT NULL,
  `ApMaterno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadora`
--

CREATE TABLE `computadora` (
  `idComputadora` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `Nombre`) VALUES
(1, 'CDMX'),
(2, 'Aguascalientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `idAutor` int(11) NOT NULL,
  `Editorial` varchar(50) DEFAULT NULL,
  `Edicion` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `Nombre`) VALUES
(1, 'Azcapotzalco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idPersonal` varchar(10) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApPaterno` varchar(100) DEFAULT NULL,
  `ApMaterno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idPersonal`, `Nombre`, `ApPaterno`, `ApMaterno`) VALUES
('ASDF', 'Marcos', 'Garcia', 'Toribio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamocomputadora`
--

CREATE TABLE `prestamocomputadora` (
  `idAlumno` varchar(10) NOT NULL,
  `idComputadora` int(11) NOT NULL,
  `horaPedido` time DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamolibro`
--

CREATE TABLE `prestamolibro` (
  `idAlumno` varchar(10) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `fechaPrestamo` date DEFAULT NULL,
  `fechaLimite` date DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` varchar(10) NOT NULL,
  `contrasena` varchar(10) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `contrasena`, `Estado`, `Tipo`) VALUES
('2015630000', '123', 1, 1),
('ASDF', 'hola', 1, 2),
('CAJA', '123', 1, 4),
('FED', '345', 0, 1),
('IMPRE', '123', 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`),
  ADD KEY `Municipio` (`Municipio`),
  ADD KEY `Edo` (`Edo`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `computadora`
--
ALTER TABLE `computadora`
  ADD PRIMARY KEY (`idComputadora`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`,`idAutor`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idPersonal`);

--
-- Indices de la tabla `prestamocomputadora`
--
ALTER TABLE `prestamocomputadora`
  ADD PRIMARY KEY (`idAlumno`,`idComputadora`),
  ADD KEY `idComputadora` (`idComputadora`);

--
-- Indices de la tabla `prestamolibro`
--
ALTER TABLE `prestamolibro`
  ADD PRIMARY KEY (`idAlumno`,`idLibro`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumnoUsuario` FOREIGN KEY (`idAlumno`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`Municipio`) REFERENCES `municipio` (`idMunicipio`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`Edo`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personalUsuario` FOREIGN KEY (`idPersonal`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `prestamocomputadora`
--
ALTER TABLE `prestamocomputadora`
  ADD CONSTRAINT `prestamocomputadora_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`),
  ADD CONSTRAINT `prestamocomputadora_ibfk_2` FOREIGN KEY (`idComputadora`) REFERENCES `computadora` (`idComputadora`);

--
-- Filtros para la tabla `prestamolibro`
--
ALTER TABLE `prestamolibro`
  ADD CONSTRAINT `prestamolibro_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`),
  ADD CONSTRAINT `prestamolibro_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
