<?php

namespace es\ucm;

interface SAModProgramaAsignatura
{

    public static function findModProgramaAsignatura($idModAsignatura);

    public static function createModProgramaAsignatura($modProgramaAsignatura);

    public static function updateModProgramaAsignatura($modProgramaAsignatura);

    public static function deleteModProgramaAsignatura($idModAsignatura);
}
