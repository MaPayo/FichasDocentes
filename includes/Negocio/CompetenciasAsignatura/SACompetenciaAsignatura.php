<?php

namespace es\ucm;

interface SACompetenciaAsignatura
{

    public static function findCompetenciaAsignatura($idAsignatura);

    public static function createCompetenciaAsignatura($competenciaAsignatura);

    public static function updateCompetenciaAsignatura($competenciaAsignatura);

    public static function deleteCompetenciaAsignatura($idAsignatura);
}
