<?php
namespace es\ucm;

interface DAOCompetenciaAsignatura{
    public static function findCompetenciaAsignatura($idCompetenciasAsignatura);

    public static function createCompetenciaAsignatura($CompetenciasAsignatura);

    public static function updateCompetenciaAsignatura($CompetenciasAsignatura);
    
    public static function deleteCompetenciaAsignatura($idCompetenciasAsignatura);
}