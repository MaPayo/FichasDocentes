<?php
namespace es\ucm;

interface DAOCompetenciasAsignatura{
    public static function findCompetenciasAsignatura($idCompetenciasAsignatura);

    public static function createCompetenciasAsignatura($CompetenciasAsignatura);

    public static function updateCompetenciasAsignatura($CompetenciasAsignatura);
    
    public static function deleteCompetenciasAsignatura($idCompetenciasAsignatura);
}