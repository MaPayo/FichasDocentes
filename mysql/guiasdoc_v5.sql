-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2019 a las 18:29:44
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

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
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `Email` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE `asignatura` (
  `IdAsignatura` int(6) NOT NULL,
  `NombreAsignatura` varchar(50) NOT NULL,
  `Materia` varchar(50) NOT NULL,
  `Modulo` varchar(50) NOT NULL,
  `Caracter` varchar(50) NOT NULL,
  `Curso` int(1) NOT NULL,
  `Semestre` int(1) NOT NULL,
  `NombreAsignaturaIngles` varchar(50) NOT NULL,
  `CreditosMateria` int(3) NOT NULL,
  `Creditos` int(2) NOT NULL,
  `Coordinadores` varchar(50) NOT NULL,
  `CodigoGrado` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliografia`
--

DROP TABLE IF EXISTS `bibliografia`;
CREATE TABLE `bibliografia` (
  `IdBibliografia` int(6) NOT NULL,
  `CitasBibliograficas` text NOT NULL,
  `RecursosInternet` text NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competenciaasignatura`
--

DROP TABLE IF EXISTS `competenciaasignatura`;
CREATE TABLE `competenciaasignatura` (
  `IdCompetencia` int(6) NOT NULL,
  `Generales` text NOT NULL,
  `Generalesi` text NOT NULL,
  `Especificas` text NOT NULL,
  `Especificasi` text NOT NULL,
  `BasicasYTransversales` text NOT NULL,
  `BasicasYTransversalesi` text NOT NULL,
  `ResultadosAprendizaje` text NOT NULL,
  `ResultadosAprendizajei` text NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion` (
  `IdConfiguracion` int(6) NOT NULL,
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
  `RealizacionActividades` int(1) NOT NULL,
  `RealizacionLaboratorio` int(1) NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion` (
  `IdEvaluacion` int(6) NOT NULL,
  `RealizacionExamenes` text NOT NULL,
  `RealizacionExamenesi` text NOT NULL,
  `PesoExamenes` float NOT NULL,
  `CalificacionFinal` text NOT NULL,
  `CalificacionFinali` text NOT NULL,
  `RealizacionActividades` text NOT NULL,
  `RealizacionActividadesi` text NOT NULL,
  `PesoActividades` float NOT NULL,
  `RealizacionLaboratorio` text NOT NULL,
  `RealizacionLaboratorioi` text NOT NULL,
  `PesoLaboratorio` float NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE `grado` (
  `CodigoGrado` int(6) NOT NULL,
  `NombreGrado` varchar(50) NOT NULL,
  `HorasEcts` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoclase`
--

DROP TABLE IF EXISTS `grupoclase`;
CREATE TABLE `grupoclase` (
  `IdGrupoClase` int(6) NOT NULL,
  `Letra` varchar(1) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `IdAsignatura` int(6) NOT NULL,
  `EmailProfesor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupolaboratorio`
--

DROP TABLE IF EXISTS `grupolaboratorio`;
CREATE TABLE `grupolaboratorio` (
  `IdGrupoLab` int(6) NOT NULL,
  `Letra` varchar(1) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `IdAsignatura` int(6) NOT NULL,
  `EmailProfesor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioclase`
--

DROP TABLE IF EXISTS `horarioclase`;
CREATE TABLE `horarioclase` (
  `IdHorarioClase` int(6) NOT NULL,
  `Aula` varchar(10) NOT NULL,
  `Dia` varchar(1) NOT NULL,
  `HoraInicio` varchar(5) NOT NULL,
  `HoraFin` varchar(5) NOT NULL,
  `IdGrupoClase` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariolaboratorio`
--

DROP TABLE IF EXISTS `horariolaboratorio`;
CREATE TABLE `horariolaboratorio` (
  `IdHorarioLab` int(6) NOT NULL,
  `Laboratorio` varchar(10) NOT NULL,
  `Dia` varchar(1) NOT NULL,
  `HoraInicio` varchar(5) NOT NULL,
  `HoraFin` varchar(5) NOT NULL,
  `IdGrupoLab` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE `laboratorio` (
  `IdLaboratorio` int(6) NOT NULL,
  `Creditos` float NOT NULL,
  `Presencial` float NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leyenda`
--

DROP TABLE IF EXISTS `leyenda`;
CREATE TABLE `leyenda` (
  `IdLeyenda` int(6) NOT NULL,
  `Lectura` int(1) NOT NULL,
  `Escritura` int(1) NOT NULL,
  `Confirm` int(1) NOT NULL,
  `EditPerm` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodologia`
--

DROP TABLE IF EXISTS `metodologia`;
CREATE TABLE `metodologia` (
  `IdMetodologia` int(6) NOT NULL,
  `Metodologia` text NOT NULL,
  `Metodologiai` text NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modasignatura`
--

DROP TABLE IF EXISTS `modasignatura`;
CREATE TABLE `modasignatura` (
  `IdModAsignatura` int(6) NOT NULL,
  `FechaMod` date NOT NULL,
  `EmailMod` varchar(50) NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modbibliografia`
--

DROP TABLE IF EXISTS `modbibliografia`;
CREATE TABLE `modbibliografia` (
  `IdBibliografia` int(6) NOT NULL,
  `CitasBibliograficas` text NOT NULL,
  `RecursosInternet` text NOT NULL,
  `IdModAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modcompetenciaasignatura`
--

DROP TABLE IF EXISTS `modcompetenciaasignatura`;
CREATE TABLE `modcompetenciaasignatura` (
  `IdCompetencia` int(6) NOT NULL,
  `Generales` text NOT NULL,
  `Generalesi` text NOT NULL,
  `Especificas` text NOT NULL,
  `Especificasi` text NOT NULL,
  `BasicasYTransversales` text NOT NULL,
  `BasicasYTransversalesi` text NOT NULL,
  `ResultadosAprendizaje` text NOT NULL,
  `ResultadosAprendizajei` text NOT NULL,
  `IdModAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modevaluacion`
--

DROP TABLE IF EXISTS `modevaluacion`;
CREATE TABLE `modevaluacion` (
  `IdEvaluacion` int(6) NOT NULL,
  `RealizacionExamenes` text NOT NULL,
  `RealizacionExamenesi` text NOT NULL,
  `PesoExamenes` float NOT NULL,
  `CalificacionFinal` text NOT NULL,
  `CalificacionFinali` text NOT NULL,
  `RealizacionActividades` text NOT NULL,
  `RealizacionActividadesi` text NOT NULL,
  `PesoActividades` float NOT NULL,
  `RealizacionLaboratorio` text NOT NULL,
  `RealizacionLaboratorioi` text NOT NULL,
  `PesoLaboratorio` float NOT NULL,
  `IdModAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modgrupoclase`
--

DROP TABLE IF EXISTS `modgrupoclase`;
CREATE TABLE `modgrupoclase` (
  `IdGrupoClase` int(6) NOT NULL,
  `Letra` varchar(1) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `IdModAsignatura` int(6) NOT NULL,
  `EmailProfesor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modgrupolaboratorio`
--

DROP TABLE IF EXISTS `modgrupolaboratorio`;
CREATE TABLE `modgrupolaboratorio` (
  `IdGrupoLab` int(6) NOT NULL,
  `Letra` varchar(1) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `IdModAsignatura` int(6) NOT NULL,
  `EmailProfesor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modhorarioclase`
--

DROP TABLE IF EXISTS `modhorarioclase`;
CREATE TABLE `modhorarioclase` (
  `IdHorarioClase` int(6) NOT NULL,
  `Aula` varchar(10) NOT NULL,
  `Dia` varchar(1) NOT NULL,
  `HoraInicio` varchar(5) NOT NULL,
  `HoraFin` varchar(5) NOT NULL,
  `IdGrupoClase` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modhorariolaboratorio`
--

DROP TABLE IF EXISTS `modhorariolaboratorio`;
CREATE TABLE `modhorariolaboratorio` (
  `IdHorarioLab` int(6) NOT NULL,
  `Laboratorio` varchar(10) NOT NULL,
  `Dia` varchar(1) NOT NULL,
  `HoraInicio` varchar(5) NOT NULL,
  `HoraFin` varchar(5) NOT NULL,
  `IdGrupoLab` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modmetodologia`
--

DROP TABLE IF EXISTS `modmetodologia`;
CREATE TABLE `modmetodologia` (
  `IdMetodologia` int(6) NOT NULL,
  `Metodologia` text NOT NULL,
  `Metodologiai` text NOT NULL,
  `IdModAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modprogramaasignatura`
--

DROP TABLE IF EXISTS `modprogramaasignatura`;
CREATE TABLE `modprogramaasignatura` (
  `IdPrograma` int(6) NOT NULL,
  `ConocimientosPrevios` text NOT NULL,
  `ConocimientosPreviosi` text NOT NULL,
  `BreveDescripcion` text NOT NULL,
  `BreveDescripcioni` text NOT NULL,
  `ProgramaDetallado` text NOT NULL,
  `ProgramaDetalladoi` text NOT NULL,
  `IdModAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `IdPermiso` int(6) NOT NULL,
  `Permiso` int(5) NOT NULL,
  `IdAsignatura` int(6) NOT NULL,
  `EmailProfesor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problema`
--

DROP TABLE IF EXISTS `problema`;
CREATE TABLE `problema` (
  `IdProblema` int(6) NOT NULL,
  `Creditos` float NOT NULL,
  `Presencial` float NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE `profesor` (
  `Email` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Departamento` varchar(50) NOT NULL,
  `Despacho` int(4) NOT NULL,
  `Tutoria` text NOT NULL,
  `Facultad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaasignatura`
--

DROP TABLE IF EXISTS `programaasignatura`;
CREATE TABLE `programaasignatura` (
  `IdPrograma` int(6) NOT NULL,
  `ConocimientosPrevios` text NOT NULL,
  `ConocimientosPreviosi` text NOT NULL,
  `BreveDescripcion` text NOT NULL,
  `BreveDescripcioni` text NOT NULL,
  `ProgramaDetallado` text NOT NULL,
  `ProgramaDetalladoi` text NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teorico`
--

DROP TABLE IF EXISTS `teorico`;
CREATE TABLE `teorico` (
  `IdTeorico` int(6) NOT NULL,
  `Creditos` float NOT NULL,
  `Presencial` float NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verifica`
--

DROP TABLE IF EXISTS `verifica`;
CREATE TABLE `verifica` (
  `IdVerifica` int(6) NOT NULL,
  `MaximoExamenes` float NOT NULL,
  `MinimoExamenes` float NOT NULL,
  `MaximoActividades` float NOT NULL,
  `MinimoActividades` float NOT NULL,
  `MaximoLaboratorio` float NOT NULL,
  `MinimoLaboratorio` float NOT NULL,
  `IdAsignatura` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`IdAsignatura`),
  ADD KEY `Asignatura_1` (`CodigoGrado`);

--
-- Indices de la tabla `bibliografia`
--
ALTER TABLE `bibliografia`
  ADD PRIMARY KEY (`IdBibliografia`),
  ADD KEY `Bibliografia_1` (`IdAsignatura`);

--
-- Indices de la tabla `competenciaasignatura`
--
ALTER TABLE `competenciaasignatura`
  ADD PRIMARY KEY (`IdCompetencia`),
  ADD KEY `CompetenciaAsignatura_1` (`IdAsignatura`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`IdConfiguracion`),
  ADD KEY `Configuracion_1` (`IdAsignatura`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`IdEvaluacion`),
  ADD KEY `Evaluacion_1` (`IdAsignatura`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`CodigoGrado`);

--
-- Indices de la tabla `grupoclase`
--
ALTER TABLE `grupoclase`
  ADD PRIMARY KEY (`IdGrupoClase`),
  ADD KEY `GrupoClase_1` (`IdAsignatura`),
  ADD KEY `EmailProfesor` (`EmailProfesor`);

--
-- Indices de la tabla `grupolaboratorio`
--
ALTER TABLE `grupolaboratorio`
  ADD PRIMARY KEY (`IdGrupoLab`),
  ADD KEY `GrupoLaboratorio_1` (`IdAsignatura`),
  ADD KEY `EmailProfesor` (`EmailProfesor`);

--
-- Indices de la tabla `horarioclase`
--
ALTER TABLE `horarioclase`
  ADD PRIMARY KEY (`IdHorarioClase`),
  ADD KEY `HorarioClase_1` (`IdGrupoClase`);

--
-- Indices de la tabla `horariolaboratorio`
--
ALTER TABLE `horariolaboratorio`
  ADD PRIMARY KEY (`IdHorarioLab`),
  ADD KEY `HorarioLaboratorio_1` (`IdGrupoLab`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`IdLaboratorio`),
  ADD KEY `Laboratorio_1` (`IdAsignatura`);

--
-- Indices de la tabla `leyenda`
--
ALTER TABLE `leyenda`
  ADD PRIMARY KEY (`IdLeyenda`);

--
-- Indices de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  ADD PRIMARY KEY (`IdMetodologia`),
  ADD KEY `Metodologia_1` (`IdAsignatura`);

--
-- Indices de la tabla `modasignatura`
--
ALTER TABLE `modasignatura`
  ADD PRIMARY KEY (`IdModAsignatura`),
  ADD KEY `ModAsignatura_1` (`IdAsignatura`);

--
-- Indices de la tabla `modbibliografia`
--
ALTER TABLE `modbibliografia`
  ADD PRIMARY KEY (`IdBibliografia`),
  ADD KEY `ModBibliografia_1` (`IdModAsignatura`);

--
-- Indices de la tabla `modcompetenciaasignatura`
--
ALTER TABLE `modcompetenciaasignatura`
  ADD PRIMARY KEY (`IdCompetencia`),
  ADD KEY `ModCompetenciaAsignatura_1` (`IdModAsignatura`);

--
-- Indices de la tabla `modevaluacion`
--
ALTER TABLE `modevaluacion`
  ADD PRIMARY KEY (`IdEvaluacion`),
  ADD KEY `ModEvaluacion_1` (`IdModAsignatura`);

--
-- Indices de la tabla `modgrupoclase`
--
ALTER TABLE `modgrupoclase`
  ADD PRIMARY KEY (`IdGrupoClase`),
  ADD KEY `ModGrupoClase_1` (`IdModAsignatura`),
  ADD KEY `EmailProfesor` (`EmailProfesor`);

--
-- Indices de la tabla `modgrupolaboratorio`
--
ALTER TABLE `modgrupolaboratorio`
  ADD PRIMARY KEY (`IdGrupoLab`),
  ADD KEY `ModGrupoLaboratorio_1` (`IdModAsignatura`),
  ADD KEY `EmailProfesor` (`EmailProfesor`);

--
-- Indices de la tabla `modhorarioclase`
--
ALTER TABLE `modhorarioclase`
  ADD PRIMARY KEY (`IdHorarioClase`),
  ADD KEY `ModHorarioClase_1` (`IdGrupoClase`);

--
-- Indices de la tabla `modhorariolaboratorio`
--
ALTER TABLE `modhorariolaboratorio`
  ADD PRIMARY KEY (`IdHorarioLab`),
  ADD KEY `ModHorarioLaboratorio_1` (`IdGrupoLab`);

--
-- Indices de la tabla `modmetodologia`
--
ALTER TABLE `modmetodologia`
  ADD PRIMARY KEY (`IdMetodologia`),
  ADD KEY `ModMetodologia_1` (`IdModAsignatura`);

--
-- Indices de la tabla `modprogramaasignatura`
--
ALTER TABLE `modprogramaasignatura`
  ADD PRIMARY KEY (`IdPrograma`),
  ADD KEY `ModProgramaAsignatura_1` (`IdModAsignatura`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`IdPermiso`),
  ADD KEY `Permisos_1` (`IdAsignatura`),
  ADD KEY `Permisos_2` (`EmailProfesor`);

--
-- Indices de la tabla `problema`
--
ALTER TABLE `problema`
  ADD PRIMARY KEY (`IdProblema`),
  ADD KEY `Problema_1` (`IdAsignatura`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `programaasignatura`
--
ALTER TABLE `programaasignatura`
  ADD PRIMARY KEY (`IdPrograma`),
  ADD KEY `ProgramaAsignatura_1` (`IdAsignatura`);

--
-- Indices de la tabla `teorico`
--
ALTER TABLE `teorico`
  ADD PRIMARY KEY (`IdTeorico`),
  ADD KEY `Teorico_1` (`IdAsignatura`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `verifica`
--
ALTER TABLE `verifica`
  ADD PRIMARY KEY (`IdVerifica`),
  ADD KEY `Verifica_1` (`IdAsignatura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bibliografia`
--
ALTER TABLE `bibliografia`
  MODIFY `IdBibliografia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `competenciaasignatura`
--
ALTER TABLE `competenciaasignatura`
  MODIFY `IdCompetencia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `IdConfiguracion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `IdEvaluacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupoclase`
--
ALTER TABLE `grupoclase`
  MODIFY `IdGrupoClase` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupolaboratorio`
--
ALTER TABLE `grupolaboratorio`
  MODIFY `IdGrupoLab` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarioclase`
--
ALTER TABLE `horarioclase`
  MODIFY `IdHorarioClase` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horariolaboratorio`
--
ALTER TABLE `horariolaboratorio`
  MODIFY `IdHorarioLab` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `IdLaboratorio` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  MODIFY `IdMetodologia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modbibliografia`
--
ALTER TABLE `modbibliografia`
  MODIFY `IdBibliografia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modcompetenciaasignatura`
--
ALTER TABLE `modcompetenciaasignatura`
  MODIFY `IdCompetencia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modevaluacion`
--
ALTER TABLE `modevaluacion`
  MODIFY `IdEvaluacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modgrupoclase`
--
ALTER TABLE `modgrupoclase`
  MODIFY `IdGrupoClase` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modgrupolaboratorio`
--
ALTER TABLE `modgrupolaboratorio`
  MODIFY `IdGrupoLab` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modhorarioclase`
--
ALTER TABLE `modhorarioclase`
  MODIFY `IdHorarioClase` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modhorariolaboratorio`
--
ALTER TABLE `modhorariolaboratorio`
  MODIFY `IdHorarioLab` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modmetodologia`
--
ALTER TABLE `modmetodologia`
  MODIFY `IdMetodologia` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modprogramaasignatura`
--
ALTER TABLE `modprogramaasignatura`
  MODIFY `IdPrograma` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `IdPermiso` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `problema`
--
ALTER TABLE `problema`
  MODIFY `IdProblema` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programaasignatura`
--
ALTER TABLE `programaasignatura`
  MODIFY `IdPrograma` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teorico`
--
ALTER TABLE `teorico`
  MODIFY `IdTeorico` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `verifica`
--
ALTER TABLE `verifica`
  MODIFY `IdVerifica` int(5) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `Asignatura_1` FOREIGN KEY (`CodigoGrado`) REFERENCES `grado` (`CodigoGrado`);

--
-- Filtros para la tabla `bibliografia`
--
ALTER TABLE `bibliografia`
  ADD CONSTRAINT `Bibliografia_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `competenciaasignatura`
--
ALTER TABLE `competenciaasignatura`
  ADD CONSTRAINT `CompetenciaAsignatura_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD CONSTRAINT `Configuracion_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `Evaluacion_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `grupoclase`
--
ALTER TABLE `grupoclase`
  ADD CONSTRAINT `GrupoClase_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`),
  ADD CONSTRAINT `grupoclase_ibfk_1` FOREIGN KEY (`EmailProfesor`) REFERENCES `profesor` (`Email`);

--
-- Filtros para la tabla `grupolaboratorio`
--
ALTER TABLE `grupolaboratorio`
  ADD CONSTRAINT `GrupoLaboratorio_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`),
  ADD CONSTRAINT `grupolaboratorio_ibfk_1` FOREIGN KEY (`EmailProfesor`) REFERENCES `profesor` (`Email`);

--
-- Filtros para la tabla `horarioclase`
--
ALTER TABLE `horarioclase`
  ADD CONSTRAINT `HorarioClase_1` FOREIGN KEY (`IdGrupoClase`) REFERENCES `grupoclase` (`IdGrupoClase`);

--
-- Filtros para la tabla `horariolaboratorio`
--
ALTER TABLE `horariolaboratorio`
  ADD CONSTRAINT `horariolaboratorio_ibfk_1` FOREIGN KEY (`IdGrupoLab`) REFERENCES `grupolaboratorio` (`IdGrupoLab`);

--
-- Filtros para la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD CONSTRAINT `Laboratorio_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `metodologia`
--
ALTER TABLE `metodologia`
  ADD CONSTRAINT `Metodologia_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `modasignatura`
--
ALTER TABLE `modasignatura`
  ADD CONSTRAINT `ModAsignatura_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `modbibliografia`
--
ALTER TABLE `modbibliografia`
  ADD CONSTRAINT `ModBibliografia_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `modasignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `modcompetenciaasignatura`
--
ALTER TABLE `modcompetenciaasignatura`
  ADD CONSTRAINT `ModCompetenciaAsignatura_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `modasignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `modevaluacion`
--
ALTER TABLE `modevaluacion`
  ADD CONSTRAINT `ModEvaluacion_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `modasignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `modgrupoclase`
--
ALTER TABLE `modgrupoclase`
  ADD CONSTRAINT `ModGrupoClase_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `modasignatura` (`IdModAsignatura`),
  ADD CONSTRAINT `modgrupoclase_ibfk_1` FOREIGN KEY (`EmailProfesor`) REFERENCES `profesor` (`Email`);

--
-- Filtros para la tabla `modgrupolaboratorio`
--
ALTER TABLE `modgrupolaboratorio`
  ADD CONSTRAINT `ModGrupoLaboratorio_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `modasignatura` (`IdModAsignatura`),
  ADD CONSTRAINT `modgrupolaboratorio_ibfk_1` FOREIGN KEY (`EmailProfesor`) REFERENCES `profesor` (`Email`);

--
-- Filtros para la tabla `modhorarioclase`
--
ALTER TABLE `modhorarioclase`
  ADD CONSTRAINT `ModHorarioClase_1` FOREIGN KEY (`IdGrupoClase`) REFERENCES `modgrupoclase` (`IdGrupoClase`);

--
-- Filtros para la tabla `modhorariolaboratorio`
--
ALTER TABLE `modhorariolaboratorio`
  ADD CONSTRAINT `modhorariolaboratorio_ibfk_1` FOREIGN KEY (`IdGrupoLab`) REFERENCES `modgrupolaboratorio` (`IdGrupoLab`);

--
-- Filtros para la tabla `modmetodologia`
--
ALTER TABLE `modmetodologia`
  ADD CONSTRAINT `ModMetodologia_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `modasignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `modprogramaasignatura`
--
ALTER TABLE `modprogramaasignatura`
  ADD CONSTRAINT `ModProgramaAsignatura_1` FOREIGN KEY (`IdModAsignatura`) REFERENCES `modasignatura` (`IdModAsignatura`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `Permisos_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`),
  ADD CONSTRAINT `Permisos_2` FOREIGN KEY (`EmailProfesor`) REFERENCES `profesor` (`Email`);

--
-- Filtros para la tabla `problema`
--
ALTER TABLE `problema`
  ADD CONSTRAINT `Problema_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `programaasignatura`
--
ALTER TABLE `programaasignatura`
  ADD CONSTRAINT `ProgramaAsignatura_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `teorico`
--
ALTER TABLE `teorico`
  ADD CONSTRAINT `Teorico_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);

--
-- Filtros para la tabla `verifica`
--
ALTER TABLE `verifica`
  ADD CONSTRAINT `Verifica_1` FOREIGN KEY (`IdAsignatura`) REFERENCES `asignatura` (`IdAsignatura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
