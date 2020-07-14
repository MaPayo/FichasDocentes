<?php

namespace es\ucm;

interface DAOModCompetenciaAsignatura
{
    public static function findModCompetenciaAsignatura($idModAsignatura);

    public static function createModCompetenciaAsignatura($modCompetenciaAsignatura);

    public static function updateModCompetenciaAsignatura($modCompetenciaAsignatura);

    public static function deleteModCompetenciaAsignatura($idModAsignatura);
}
