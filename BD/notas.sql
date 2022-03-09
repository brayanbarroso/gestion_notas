-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2017 a las 00:33:14
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Id` double NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pApellido` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `sApellido` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` double DEFAULT NULL,
  `Correo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Contrasena` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Id`, `Nombres`, `pApellido`, `sApellido`, `Direccion`, `Telefono`, `Correo`, `Contrasena`) VALUES
(12345, 'Brayan Jose', 'Barroso', 'Benitez', 'Miramar 1', 3117330066, 'brian@hotmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `Id` double NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pApellido` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `sApellido` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` double DEFAULT NULL,
  `Correo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`Id`, `Nombres`, `pApellido`, `sApellido`, `Direccion`, `Telefono`, `Correo`) VALUES
(12335, 'Luis', 'Sandobal', 'Perez', 'Calle Arriba', 3107654321, 'luis@yahoo.es'),
(12344, 'Juan', 'Perez', 'Marcial', 'Calle Central', 7653423, 'juan@yahoo.es'),
(12345, 'Maria', 'Morales', 'Sanchez', 'Miramar', 7654321, 'maria@hotmail.com'),
(98765, 'Samuel', 'Primera', 'Bastardo', 'Minuto de Dios', 7863245, 'samu@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `Codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`Codigo`, `Nombre`) VALUES
('A001', 'Secretariado'),
('A002', 'Etica'),
('A003', 'Ofimatica'),
('A004', 'Sistemas 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `Asignatura_Codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Profesor_Id` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`Asignatura_Codigo`, `Profesor_Id`) VALUES
('A001', 12345),
('A001', 543210);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Duracion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`Codigo`, `Nombre`, `Duracion`) VALUES
('P01', 'Primera Infancia', '4'),
('P02', 'GestiÃ³n Administrativa', '4'),
('P03', 'TeleInformatica', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `Alumno_Id` double NOT NULL,
  `Curso_Codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`Alumno_Id`, `Curso_Codigo`, `Fecha`) VALUES
(12344, 'P01', '2017-03-21'),
(12345, 'P02', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `Alumno_Id` double NOT NULL,
  `Asignatura_Codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nota_1` float DEFAULT NULL,
  `Nota_2` float DEFAULT NULL,
  `Nota_3` float DEFAULT NULL,
  `Definitiva` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`Alumno_Id`, `Asignatura_Codigo`, `Nota_1`, `Nota_2`, `Nota_3`, `Definitiva`) VALUES
(12344, 'A001', 3.5, 2.5, 3, 3),
(12345, 'A001', 3.6, 4, 2.5, 3.4),
(12345, 'A002', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE `pensum` (
  `Asignatura_Codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Curso_Codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pensum`
--

INSERT INTO `pensum` (`Asignatura_Codigo`, `Curso_Codigo`, `Semestre`) VALUES
('A001', 'P01', 2),
('A001', 'P02', 1),
('A002', 'P02', 1),
('A003', 'P03', 1),
('A004', 'P01', 1),
('A004', 'P03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `Id` double NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pApellido` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `sApellido` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` double DEFAULT NULL,
  `Correo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`Id`, `Nombres`, `pApellido`, `sApellido`, `Direccion`, `Telefono`, `Correo`) VALUES
(12345, 'Leandro', 'Martinez', 'Perez', 'cra 14-24 345', 7863245, 'leo@hotmail.com'),
(543210, 'Manuel', 'Perez', 'Salguedo', 'Calle Manga 1', 7642341, 'mano@gmail.com'),
(1072528533, 'Yolima Andrea', 'Gonzalez', 'Monterroza', 'Calle Arriba', 3016622971, 'yogomo_1994@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_alumno`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_alumno` (
`Alumno_Id` double
,`Nombres` varchar(50)
,`Apellidos` varchar(51)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_alumno`
--
DROP TABLE IF EXISTS `vista_alumno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_alumno`  AS  select `nota`.`Alumno_Id` AS `Alumno_Id`,`alumno`.`Nombres` AS `Nombres`,concat(`alumno`.`pApellido`,' ',`alumno`.`sApellido`) AS `Apellidos` from ((`nota` join `alumno`) join `asignatura`) where ((`nota`.`Alumno_Id` = `alumno`.`Id`) and (`nota`.`Asignatura_Codigo` = `asignatura`.`Codigo`) and (`asignatura`.`Codigo` = 'A001')) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`Asignatura_Codigo`,`Profesor_Id`),
  ADD KEY `Asignatura_has_Profesor_FKIndex1` (`Asignatura_Codigo`),
  ADD KEY `Asignatura_has_Profesor_FKIndex2` (`Profesor_Id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`Alumno_Id`,`Curso_Codigo`),
  ADD KEY `Alumno_has_Curso_FKIndex1` (`Alumno_Id`),
  ADD KEY `Alumno_has_Curso_FKIndex2` (`Curso_Codigo`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD KEY `Nota_FKIndex1` (`Asignatura_Codigo`),
  ADD KEY `Nota_FKIndex2` (`Alumno_Id`);

--
-- Indices de la tabla `pensum`
--
ALTER TABLE `pensum`
  ADD PRIMARY KEY (`Asignatura_Codigo`,`Curso_Codigo`),
  ADD KEY `Asignatura_has_Curso_FKIndex1` (`Asignatura_Codigo`),
  ADD KEY `Asignatura_has_Curso_FKIndex2` (`Curso_Codigo`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`Id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`Asignatura_Codigo`) REFERENCES `asignatura` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_2` FOREIGN KEY (`Profesor_Id`) REFERENCES `profesor` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`Alumno_Id`) REFERENCES `alumno` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`Curso_Codigo`) REFERENCES `curso` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`Asignatura_Codigo`) REFERENCES `asignatura` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`Alumno_Id`) REFERENCES `alumno` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pensum`
--
ALTER TABLE `pensum`
  ADD CONSTRAINT `pensum_ibfk_1` FOREIGN KEY (`Asignatura_Codigo`) REFERENCES `asignatura` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pensum_ibfk_2` FOREIGN KEY (`Curso_Codigo`) REFERENCES `curso` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
