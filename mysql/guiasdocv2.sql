-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2019 a las 10:52:16
-- Versión del servidor: 10.3.17-MariaDB-0+deb10u1
-- Versión de PHP: 7.3.9-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guiasdoc`
--
CREATE DATABASE IF NOT EXISTS `guiasdoc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `guiasdoc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administrador`
--

DROP TABLE IF EXISTS `Administrador`;
CREATE TABLE `Administrador` (
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignatura`
--

DROP TABLE IF EXISTS `Asignatura`;
CREATE TABLE `Asignatura` (
  `IdAsignatura` int(5) NOT NULL,
  `NombreAsignatura` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Materia` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Modulo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Caracter` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Curso` int(1) NOT NULL,
  `Semestre` int(1) NOT NULL,
  `NombreAsignaturaIngles` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CreditosMateria` int(2) NOT NULL,
  `Creditos` int(2) NOT NULL,
  `Coordinadores` int(2) NOT NULL,
  `CodigoGrado` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Bibliografia`
--

DROP TABLE IF EXISTS `Bibliografia`;
CREATE TABLE `Bibliografia` (
  `IdBibliografia` int(5) NOT NULL,
  `CitasBibliograficas` text COLLATE utf8mb4_general_ci NOT NULL,
  `RecursosInternet` text COLLATE utf8mb4_general_ci NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CompetenciaAsignatura`
--

DROP TABLE IF EXISTS `CompetenciaAsignatura`;
CREATE TABLE `CompetenciaAsignatura` (
  `IdCompetencia` int(5) NOT NULL,
  `Generales` text COLLATE utf8mb4_general_ci NOT NULL,
  `Generalesi` text COLLATE utf8mb4_general_ci NOT NULL,
  `Especificas` text COLLATE utf8mb4_general_ci NOT NULL,
  `Especificasi` text COLLATE utf8mb4_general_ci NOT NULL,
  `BasicasYTransversales` text COLLATE utf8mb4_general_ci NOT NULL,
  `BasicasYTransversalesi` text COLLATE utf8mb4_general_ci NOT NULL,
  `ResultadosAprendizaje` text COLLATE utf8mb4_general_ci NOT NULL,
  `ResultadosAprendizajei` text COLLATE utf8mb4_general_ci NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Configuracion`
--

DROP TABLE IF EXISTS `Configuracion`;
CREATE TABLE `Configuracion` (
  `IdConfiguracion` int(5) NOT NULL,
  `ConocimientosPrevios` int(1) NOT NULL,
  `BreveDescripcion` int(1) NOT NULL,
  `ProgramaDetallado` int(1) NOT NULL,
  `ComGenerales` int(1) NOT NULL,
  `ComEspecificas` int(1) NOT NULL,
  `ComBasicas` int(1) NOT NULL,
  `ResultadosAprendizaje` int(1) NOT NULL,
  `Metodologia` int(1) NOT NULL,
  `CitasBibliograficas` int(1) NOT NULL,
  `RecursosInternet` int(1) NOT NULL,
  `GrupoLaboratorio` int(1) NOT NULL,
  `RealizacionExamenes` int(1) NOT NULL,
  `CalificacionFinal` int(1) NOT NULL,
  `RealizacionActividades`int(1) NOT NULL,
  `RealizacionLaboratorio` int(1) NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Evaluacion`
--

DROP TABLE IF EXISTS `Evaluacion`;
CREATE TABLE `Evaluacion` (
  `IdEvaluacion` int(5) NOT NULL,
  `RealizacionExamenes` text COLLATE utf8mb4_general_ci NOT NULL,
  `RealizacionExamenesi` text COLLATE utf8mb4_general_ci NOT NULL,
  `PesoExamenes` float NOT NULL,
  `CalificacionFinal` text COLLATE utf8mb4_general_ci NOT NULL,
  `CalificacionFinali` text COLLATE utf8mb4_general_ci NOT NULL,
  `RealizacionActividades` text COLLATE utf8mb4_general_ci NOT NULL,
  `RealizacionActividadesi` text COLLATE utf8mb4_general_ci NOT NULL,
  `PesoActividades` float NOT NULL,
  `RealizacionLaboratorio` text COLLATE utf8mb4_general_ci NOT NULL,
  `RealizacionLaboratorioi` text COLLATE utf8mb4_general_ci NOT NULL,
  `PesoLaboratorio` float NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grado`
--

DROP TABLE IF EXISTS `Grado`;
CREATE TABLE `Grado` (
  `CodigoGrado` int(5) NOT NULL,
  `NombreGrado` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `HorasEcts` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GrupoClase`
--

DROP TABLE IF EXISTS `GrupoClase`;
CREATE TABLE `GrupoClase` (
  `IdGrupoClase` int(5) NOT NULL,
  `Letra` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `Idioma` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GrupoLaboratorio`
--

DROP TABLE IF EXISTS `GrupoLaboratorio`;
CREATE TABLE `GrupoLaboratorio` (
  `IdGrupoLab` int(5) NOT NULL,
  `Letra` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `Idioma` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HorarioClase`
--

DROP TABLE IF EXISTS `HorarioClase`;
CREATE TABLE `HorarioClase` (
  `IdHorarioClase` int(5) NOT NULL,
  `Aula` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Dia` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `HoraInicio` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `HoraFin` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `IdGrupoClase` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HorarioLaboratorio`
--

DROP TABLE IF EXISTS `HorarioLaboratorio`;
CREATE TABLE `HorarioLaboratorio` (
  `IdHorarioLab` int(5) NOT NULL,
  `Laboratorio` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Dia` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `HoraInicio` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `HoraFin` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `IdGrupoLab` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Laboratorio`
--

DROP TABLE IF EXISTS `Laboratorio`;
CREATE TABLE `Laboratorio` (
  `IdLaboratorio` int(5) NOT NULL,
  `Creditos` float NOT NULL,
  `Presencial` float NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Leyenda`
--

DROP TABLE IF EXISTS `Leyenda`;
CREATE TABLE `Leyenda` (
  `IdLeyenda` int(5) NOT NULL,
  `Lectura` int(1) NOT NULL,
  `Escritura` int(1) NOT NULL,
  `Check` int(1) NOT NULL,
  `EditPerm` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Metodologia`
--

DROP TABLE IF EXISTS `Metodologia`;
CREATE TABLE `Metodologia` (
  `IdMetodologia` int(5) NOT NULL,
  `Metodologia` text COLLATE utf8mb4_general_ci NOT NULL,
  `Metodologiai` text COLLATE utf8mb4_general_ci NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModAsignatura`
--

DROP TABLE IF EXISTS `ModAsignatura`;
CREATE TABLE `ModAsignatura` (
  `IdModAsignatura` int(5) NOT NULL,
  `FechaMod` date NOT NULL,
  `EmailMod` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModBibliografia`
--

DROP TABLE IF EXISTS `ModBibliografia`;
CREATE TABLE `ModBibliografia` (
  `IdBibliografia` int(5) NOT NULL,
  `CitasBibliograficas` text COLLATE utf8mb4_general_ci NOT NULL,
  `RecursosInternet` text COLLATE utf8mb4_general_ci NOT NULL,
  `IdModAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModCompetenciaAsignatura`
--

DROP TABLE IF EXISTS `ModCompetenciaAsignatura`;
CREATE TABLE `ModCompetenciaAsignatura` (
  `IdCompetencia` int(5) NOT NULL,
  `Generales` text COLLATE utf8mb4_general_ci NOT NULL,
  `Generalesi` text COLLATE utf8mb4_general_ci NOT NULL,
  `Especificas` text COLLATE utf8mb4_general_ci NOT NULL,
  `Especificasi` text COLLATE utf8mb4_general_ci NOT NULL,
  `BasicasYTransversales` text COLLATE utf8mb4_general_ci NOT NULL,
  `BasicasYTransversalesi` text COLLATE utf8mb4_general_ci NOT NULL,
  `ResultadosAprendizaje` text COLLATE utf8mb4_general_ci NOT NULL,
  `ResultadosAprendizajei` text COLLATE utf8mb4_general_ci NOT NULL,
  `IdModAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModEvaluacion`
--

DROP TABLE IF EXISTS `ModEvaluacion`;
CREATE TABLE `ModEvaluacion` (
  `IdEvaluacion` int(5) NOT NULL,
  `RealizacionExamenes` text COLLATE utf8mb4_general_ci NOT NULL,
  `RealizacionExamenesi` text COLLATE utf8mb4_general_ci NOT NULL,
  `PesoExamenes` float NOT NULL,
  `CalificacionFinal` text COLLATE utf8mb4_general_ci NOT NULL,
  `CalificacionFinali` text COLLATE utf8mb4_general_ci NOT NULL,
  `RealizacionActividades` text COLLATE utf8mb4_general_ci NOT NULL,
  `RealizacionActividadesi` text COLLATE utf8mb4_general_ci NOT NULL,
  `PesoActividades` float NOT NULL,
  `RealizacionLaboratorio` text COLLATE utf8mb4_general_ci NOT NULL,
  `RealizacionLaboratorioi` text COLLATE utf8mb4_general_ci NOT NULL,
  `PesoLaboratorio` float NOT NULL,
  `IdModAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModGrupoClase`
--

DROP TABLE IF EXISTS `ModGrupoClase`;
CREATE TABLE `ModGrupoClase` (
  `IdGrupoClase` int(5) NOT NULL,
  `Letra` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `Idioma` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `IdModAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModGrupoLaboratorio`
--

DROP TABLE IF EXISTS `ModGrupoLaboratorio`;
CREATE TABLE `ModGrupoLaboratorio` (
  `IdGrupoLab` int(5) NOT NULL,
  `Letra` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `Idioma` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `IdModAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModHorarioClase`
--

DROP TABLE IF EXISTS `ModHorarioClase`;
CREATE TABLE `ModHorarioClase` (
  `IdHorarioClase` int(5) NOT NULL,
  `Aula` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Dia` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `HoraInicio` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `HoraFin` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `IdGrupoClase` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModHorarioLaboratorio`
--

DROP TABLE IF EXISTS `ModHorarioLaboratorio`;
CREATE TABLE `ModHorarioLaboratorio` (
  `IdHorarioLab` int(5) NOT NULL,
  `Laboratorio` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Dia` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `HoraInicio` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `HoraFin` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `IdGrupoLab` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModMetodologia`
--

DROP TABLE IF EXISTS `ModMetodologia`;
CREATE TABLE `ModMetodologia` (
  `IdMetodologia` int(5) NOT NULL,
  `Metodologia` text COLLATE utf8mb4_general_ci NOT NULL,
  `Metodologiai` text COLLATE utf8mb4_general_ci NOT NULL,
  `IdModAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ModProgramaAsignatura`
--

DROP TABLE IF EXISTS `ModProgramaAsignatura`;
CREATE TABLE `ModProgramaAsignatura` (
  `IdPrograma` int(5) NOT NULL,
  `ConocimientosPrevios` text COLLATE utf8mb4_general_ci NOT NULL,
  `ConocimientosPreviosi` text COLLATE utf8mb4_general_ci NOT NULL,
  `BreveDescripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `BreveDescripcioni` text COLLATE utf8mb4_general_ci NOT NULL,
  `ProgramaDetallado` text COLLATE utf8mb4_general_ci NOT NULL,
  `ProgramaDetalladoi` text COLLATE utf8mb4_general_ci NOT NULL,
  `IdModAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Permisos`
--

DROP TABLE IF EXISTS `Permisos`;
CREATE TABLE `Permisos` (
  `IdPermiso` int(5) NOT NULL,
  `Permiso` int(5) NOT NULL,
  `IdAsignatura` int(5) NOT NULL,
  `EmailProfesor` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Problema`
--

DROP TABLE IF EXISTS `Problema`;
CREATE TABLE `Problema` (
  `IdProblema` int(5) NOT NULL,
  `Creditos` float NOT NULL,
  `Presencial` float NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesor`
--

DROP TABLE IF EXISTS `Profesor`;
CREATE TABLE `Profesor` (
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Departamento` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Despacho` int(8) NOT NULL,
  `Tutoria` text COLLATE utf8mb4_general_ci NOT NULL,
  `Facultad` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ProgramaAsignatura`
--

DROP TABLE IF EXISTS `ProgramaAsignatura`;
CREATE TABLE `ProgramaAsignatura` (
  `IdPrograma` int(5) NOT NULL,
  `ConocimientosPrevios` text COLLATE utf8mb4_general_ci NOT NULL,
  `ConocimientosPreviosi` text COLLATE utf8mb4_general_ci NOT NULL,
  `BreveDescripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `BreveDescripcioni` text COLLATE utf8mb4_general_ci NOT NULL,
  `ProgramaDetallado` text COLLATE utf8mb4_general_ci NOT NULL,
  `ProgramaDetalladoi` text COLLATE utf8mb4_general_ci NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Teorico`
--

DROP TABLE IF EXISTS `Teorico`;
CREATE TABLE `Teorico` (
  `IdTeorico` int(5) NOT NULL,
  `Creditos` float NOT NULL,
  `Presencial` float NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE `Usuario` (
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Verifica`
--

DROP TABLE IF EXISTS `Verifica`;
CREATE TABLE `Verifica` (
  `IdVerifica` int(5) NOT NULL,
  `MaximoExamenes` float NOT NULL,
  `MinimoExamenes` float NOT NULL,
  `MaximoActividades` float NOT NULL,
  `MinimoActividades` float NOT NULL,
  `MaximoLaboratorio` float NOT NULL,
  `MinimoLaboratorio` float NOT NULL,
  `IdAsignatura` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  ADD PRIMARY KEY (`IdAsignatura`),
  ADD KEY `Asignatura_1` (`CodigoGrado`);

--
-- Indices de la tabla `Bibliografia`
--
ALTER TABLE `Bibliografia`
  ADD PRIMARY KEY (`IdBibliografia`),
  ADD KEY `Bibliografia_1` (`IdAsignatura`);

--
-- Indices de la tabla `CompetenciaAsignatura`
--
ALTER TABLE `CompetenciaAsignatura`
  ADD PRIMARY KEY (`IdCompetencia`),
  ADD KEY `CompetenciaAsignatura_1` (`IdAsignatura`);

--
-- Indices de la tabla `Configuracion`
--
ALTER TABLE `Configuracion`
  ADD PRIMARY KEY (`IdConfiguracion`),
  ADD KEY `Configuracion_1` (`IdAsignatura`);

--
-- Indices de la tabla `Evaluacion`
--
ALTER TABLE `Evaluacion`
  ADD PRIMARY KEY (`IdEvaluacion`),
  ADD KEY `Evaluacion_1` (`IdAsignatura`);

--
-- Indices de la tabla `Grado`
--
ALTER TABLE `Grado`
  ADD PRIMARY KEY (`CodigoGrado`);

--
-- Indices de la tabla `GrupoClase`
--
ALTER TABLE `GrupoClase`
  ADD PRIMARY KEY (`IdGrupoClase`),
  ADD KEY `GrupoClase_1` (`IdAsignatura`);

--
-- Indices de la tabla `GrupoLaboratorio`
--
ALTER TABLE `GrupoLaboratorio`
  ADD PRIMARY KEY (`IdGrupoLab`),
  ADD KEY `GrupoLaboratorio_1` (`IdAsignatura`);

--
-- Indices de la tabla `HorarioClase`
--
ALTER TABLE `HorarioClase`
  ADD PRIMARY KEY (`IdHorarioClase`),
  ADD KEY `HorarioClase_1` (`IdGrupoClase`);

--
-- Indices de la tabla `HorarioLaboratorio`
--
ALTER TABLE `HorarioLaboratorio`
  ADD PRIMARY KEY (`IdHorarioLab`),
  ADD KEY `HorarioLaboratorio_1` (`IdGrupoLab`);

--
-- Indices de la tabla `Laboratorio`
--
ALTER TABLE `Laboratorio`
  ADD PRIMARY KEY (`IdLaboratorio`),
  ADD KEY `Laboratorio_1` (`IdAsignatura`);

--
-- Indices de la tabla `Leyenda`
--
ALTER TABLE `Leyenda`
  ADD PRIMARY KEY (`IdLeyenda`);

--
-- Indices de la tabla `Metodologia`
--
ALTER TABLE `Metodologia`
  ADD PRIMARY KEY (`IdMetodologia`),
  ADD KEY `Metodologia_1` (`IdAsignatura`);

--
-- Indices de la tabla `ModAsignatura`
--
ALTER TABLE `ModAsignatura`
  ADD PRIMARY KEY (`IdModAsignatura`),
  ADD KEY `ModAsignatura_1` (`IdAsignatura`);

--
-- Indices de la tabla `ModBibliografia`
--
ALTER TABLE `ModBibliografia`
  ADD PRIMARY KEY (`IdBibliografia`),
  ADD KEY `ModBibliografia_1` (`IdModAsignatura`);

--
-- Indices de la tabla `ModCompetenciaAsignatura`
--
ALTER TABLE `ModCompetenciaAsignatura`
  ADD PRIMARY KEY (`IdCompetencia`),
  ADD KEY `ModCompetenciaAsignatura_1` (`IdModAsignatura`);

--
-- Indices de la tabla `ModEvaluacion`
--
ALTER TABLE `ModEvaluacion`
  ADD PRIMARY KEY (`IdEvaluacion`),
  ADD KEY `ModEvaluacion_1` (`IdModAsignatura`);

--
-- Indices de la tabla `ModGrupoClase`
--
ALTER TABLE `ModGrupoClase`
  ADD PRIMARY KEY (`IdGrupoClase`),
  ADD KEY `ModGrupoClase_1` (`IdModAsignatura`);

--
-- Indices de la tabla `ModGrupoLaboratorio`
--
ALTER TABLE `ModGrupoLaboratorio`
  ADD PRIMARY KEY (`IdGrupoLab`),
  ADD KEY `ModGrupoLaboratorio_1` (`IdModAsignatura`);

--
-- Indices de la tabla `ModHorarioClase`
--
ALTER TABLE `ModHorarioClase`
  ADD PRIMARY KEY (`IdHorarioClase`),
  ADD KEY `ModHorarioClase_1` (`IdGrupoClase`);

--
-- Indices de la tabla `ModHorarioLaboratorio`
--
ALTER TABLE `ModHorarioLaboratorio`
  ADD PRIMARY KEY (`IdHorarioLab`),
  ADD KEY `ModHorarioLaboratorio_1` (`IdGrupoLab`);

--
-- Indices de la tabla `ModMetodologia`
--
ALTER TABLE `ModMetodologia`
  ADD PRIMARY KEY (`IdMetodologia`),
  ADD KEY `ModMetodologia_1` (`IdModAsignatura`);

--
-- Indices de la tabla `ModProgramaAsignatura`
--
ALTER TABLE `ModProgramaAsignatura`
  ADD PRIMARY KEY (`IdPrograma`),
  ADD KEY `ModProgramaAsignatura_1` (`IdModAsignatura`);

--
-- Indices de la tabla `Permisos`
--
ALTER TABLE `Permisos`
  ADD PRIMARY KEY (`IdPermiso`),
  ADD KEY `Permisos_1` (`IdAsignatura`),
  ADD KEY `Permisos_2` (`EmailProfesor`);

--
-- Indices de la tabla `Problema`
--
ALTER TABLE `Problema`
  ADD PRIMARY KEY (`IdProblema`),
  ADD KEY `Problema_1` (`IdAsignatura`);

--
-- Indices de la tabla `Profesor`
--
ALTER TABLE `Profesor`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `ProgramaAsignatura`
--
ALTER TABLE `ProgramaAsignatura`
  ADD PRIMARY KEY (`IdPrograma`),
  ADD KEY `ProgramaAsignatura_1` (`IdAsignatura`);

--
-- Indices de la tabla `Teorico`
--
ALTER TABLE `Teorico`
  ADD PRIMARY KEY (`IdTeorico`),
  ADD KEY `Teorico_1` (`IdAsignatura`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `Verifica`
--
ALTER TABLE `Verifica`
  ADD PRIMARY KEY (`IdVerifica`),
  ADD KEY `Verifica_1` (`IdAsignatura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Bibliografia`
--
ALTER TABLE `Bibliografia`
  MODIFY `IdBibliografia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `CompetenciaAsignatura`
--
ALTER TABLE `CompetenciaAsignatura`
  MODIFY `IdCompetencia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Configuracion`
--
ALTER TABLE `Configuracion`
  MODIFY `IdConfiguracion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Evaluacion`
--
ALTER TABLE `Evaluacion`
  MODIFY `IdEvaluacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `GrupoClase`
--
ALTER TABLE `GrupoClase`
  MODIFY `IdGrupoClase` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `HorarioClase`
--
ALTER TABLE `HorarioClase`
  MODIFY `IdHorarioClase` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `HorarioLaboratorio`
--
ALTER TABLE `HorarioLaboratorio`
  MODIFY `IdHorarioLab` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Metodologia`
--
ALTER TABLE `Metodologia`
  MODIFY `IdMetodologia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ModBibliografia`
--
ALTER TABLE `ModBibliografia`
  MODIFY `IdBibliografia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ModCompetenciaAsignatura`
--
ALTER TABLE `ModCompetenciaAsignatura`
  MODIFY `IdCompetencia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ModEvaluacion`
--
ALTER TABLE `ModEvaluacion`
  MODIFY `IdEvaluacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ModGrupoClase`
--
ALTER TABLE `ModGrupoClase`
  MODIFY `IdGrupoClase` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ModHorarioClase`
--
ALTER TABLE `ModHorarioClase`
  MODIFY `IdHorarioClase` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ModHorarioLaboratorio`
--
ALTER TABLE `ModHorarioLaboratorio`
  MODIFY `IdHorarioLab` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ModMetodologia`
--
ALTER TABLE `ModMetodologia`
  MODIFY `IdMetodologia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ModProgramaAsignatura`
--
ALTER TABLE `ModProgramaAsignatura`
  MODIFY `IdPrograma` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ProgramaAsignatura`
--
ALTER TABLE `ProgramaAsignatura`
  MODIFY `IdPrograma` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Verifica`
--
ALTER TABLE `Verifica`
  MODIFY `IdVerifica` int(5) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  ADD CONSTRAINT `Asignatura_1` FOREIGN KEY (`CodigoGrado`) REFERENCES `Grado` (`CodigoGrado`);

--
-- Filtros para la tabla `Bibliografia`
--
ALTER TABLE `Bibliografia`
  ADD CONSTRAINT `Bibliografia_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `CompetenciaAsignatura`
--
ALTER TABLE `CompetenciaAsignatura`
  ADD CONSTRAINT `CompetenciaAsignatura_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `Configuracion`
--
ALTER TABLE `Configuracion`
  ADD CONSTRAINT `Configuracion_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `Evaluacion`
--
ALTER TABLE `Evaluacion`
  ADD CONSTRAINT `Evaluacion_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `GrupoClase`
--
ALTER TABLE `GrupoClase`
  ADD CONSTRAINT `GrupoClase_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `GrupoLaboratorio`
--
ALTER TABLE `GrupoLaboratorio`
  ADD CONSTRAINT `GrupoLaboratorio_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `HorarioClase`
--
ALTER TABLE `HorarioClase`
  ADD CONSTRAINT `HorarioClase_1` FOREIGN KEY (`IdGrupoClase`) REFERENCES `GrupoClase` (`IdGrupoClase`);

--
-- Filtros para la tabla `HorarioLaboratorio`
--
ALTER TABLE `HorarioLaboratorio`
  ADD CONSTRAINT `HorarioLaboratorio_1` FOREIGN KEY (`IdGrupoLab`) REFERENCES `GrupoLaboratorio` (`IdGrupoLab`);

--
-- Filtros para la tabla `Laboratorio`
--
ALTER TABLE `Laboratorio`
  ADD CONSTRAINT `Laboratorio_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `Metodologia`
--
ALTER TABLE `Metodologia`
  ADD CONSTRAINT `Metodologia_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `ModAsignatura`
--
ALTER TABLE `ModAsignatura`
  ADD CONSTRAINT `ModAsignatura_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `ModBibliografia`
--
ALTER TABLE `ModBibliografia`
  ADD CONSTRAINT `ModBibliografia_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `ModAsignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `ModCompetenciaAsignatura`
--
ALTER TABLE `ModCompetenciaAsignatura`
  ADD CONSTRAINT `ModCompetenciaAsignatura_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `ModAsignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `ModEvaluacion`
--
ALTER TABLE `ModEvaluacion`
  ADD CONSTRAINT `ModEvaluacion_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `ModAsignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `ModGrupoClase`
--
ALTER TABLE `ModGrupoClase`
  ADD CONSTRAINT `ModGrupoClase_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `ModAsignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `ModGrupoLaboratorio`
--
ALTER TABLE `ModGrupoLaboratorio`
  ADD CONSTRAINT `ModGrupoLaboratorio_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `ModAsignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `ModHorarioClase`
--
ALTER TABLE `ModHorarioClase`
  ADD CONSTRAINT `ModHorarioClase_1` FOREIGN KEY (`IdGrupoClase`) REFERENCES `ModGrupoClase` (`IdGrupoClase`);

--
-- Filtros para la tabla `ModHorarioLaboratorio`
--
ALTER TABLE `ModHorarioLaboratorio`
  ADD CONSTRAINT `ModHorarioLaboratorio_1` FOREIGN KEY (`IdGrupoLab`) REFERENCES `ModGrupoLaboratorio` (`IdGrupoLab`);

--
-- Filtros para la tabla `ModMetodologia`
--
ALTER TABLE `ModMetodologia`
  ADD CONSTRAINT `ModMetodologia_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `ModAsignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `ModProgramaAsignatura`
--
ALTER TABLE `ModProgramaAsignatura`
  ADD CONSTRAINT `ModProgramaAsignatura_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `ModAsignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `Permisos`
--
ALTER TABLE `Permisos`
  ADD CONSTRAINT `Permisos_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`),
  ADD CONSTRAINT `Permisos_2` FOREIGN KEY (`EmailProfesor`) REFERENCES `Profesor` (`Email`);

--
-- Filtros para la tabla `Problema`
--
ALTER TABLE `Problema`
  ADD CONSTRAINT `Problema_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `ProgramaAsignatura`
--
ALTER TABLE `ProgramaAsignatura`
  ADD CONSTRAINT `ProgramaAsignatura_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `Teorico`
--
ALTER TABLE `Teorico`
  ADD CONSTRAINT `Teorico_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `Verifica`
--
ALTER TABLE `Verifica`
  ADD CONSTRAINT `Verifica_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`IdAsignatura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
