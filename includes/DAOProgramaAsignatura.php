<?php
namespace es\ucm;

interface DAOProgramaAsignatura{
    public static function findProgramaAsignatura($idProgramaAsignatura);

    public static function createProgramaAsignatura($ProgramaAsignatura);

    public static function updateProgramaAsignatura($ProgramaAsignatura);
    
    public static function deleteProgramaAsignatura($idProgramaAsignatura);
}