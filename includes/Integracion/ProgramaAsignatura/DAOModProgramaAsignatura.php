<?php
namespace es\ucm;

interface DAOModProgramaAsignatura{
    public static function findModProgramaAsignatura($idModProgramaAsignatura);

    public static function createModProgramaAsignatura($ModProgramaAsignatura);

    public static function updateModProgramaAsignatura($ModProgramaAsignatura);
    
    public static function deleteModProgramaAsignatura($idModProgramaAsignatura);
}