<?php
namespace es\ucm;

interface FactoriesDAO{

    public static function createDAOAsignatura();
    public static function createDAOModAsignatura();
    public static function createDAOBibliografia();
    public static function createDAOModBibliografia();
    public static function createDAOCompetenciaAsignatura();
    public static function createDAOModCompetenciaAsignatura();
    public static function createDAOConfiguracion();
    public static function createDAOEvaluacion();
    public static function createDAOModEvaluacion();
    public static function createDAOGrado();
    public static function createDAOGrupoClase();
    public static function createDAOModGrupoClase();
    public static function createDAOGrupoClaseProfesor();
    public static function createDAOModGrupoClaseProfesor();
    public static function createDAOGrupoLaboratorio();
    public static function createDAOModGrupoLaboratorio();
    public static function createDAOGrupoLaboratorioProfesor();
    public static function createDAOModGrupoLaboratorioProfesor();
    public static function createDAOHorarioClase();
    public static function createDAOModHorarioClase();
    public static function createDAOHorarioLaboratorio();
    public static function createDAOModHorarioLaboratorio();
    public static function createDAOLaboratorio();
    public static function createDAOMateria();
    public static function createDAOMetodologia();
    public static function createDAOModMetodologia();
    public static function createDAOModulo();
    public static function createDAOPermisos();
    public static function createDAOProblema();
    public static function createDAOProfesor();
    public static function createDAOProgramaAsignatura();
    public static function createDAOModProgramaAsignatura();
    public static function createDAOTeorico();
    public static function createDAOUsuario();
    public static function createDAOVerifica();
}