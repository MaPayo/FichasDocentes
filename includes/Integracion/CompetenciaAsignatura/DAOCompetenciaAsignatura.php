<?php

namespace es\ucm;

interface DAOCompetenciaAsignatura
{
    public static function findCompetenciaAsignatura($idAsignatura);

    public static function createCompetenciaAsignatura($competenciasAsignatura);

    public static function updateCompetenciaAsignatura($competenciasAsignatura);

    public static function deleteCompetenciaAsignatura($idAsignatura);
}
