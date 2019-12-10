<?php
namespace es\ucm;

interface DAOModCompetenciaAsignatura{
    public static function findModCompetenciaAsignatura($idModCompetenciaAsignatura);

    public static function createModCompetenciaAsignatura($ModCompetenciaAsignatura);

    public static function updateModCompetenciaAsignatura($ModCompetenciaAsignatura);
    
    public static function deleteModCompetenciaAsignatura($idModCompetenciaAsignatura);
}