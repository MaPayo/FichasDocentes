<?php

namespace es\ucm;

interface DAOProgramaAsignatura
{
    public static function findProgramaAsignatura($idAsignatura);

    public static function createProgramaAsignatura($programaAsignatura);

    public static function updateProgramaAsignatura($programaAsignatura);

    public static function deleteProgramaAsignatura($idAsignatura);
}
