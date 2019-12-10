<?php
namespace es\ucm;
interface SAAsignatura{

    public static function findAsignatura($idAsignatura);

    public static function createAsignatura($idAsignatura,$nombreAsignatura,$materia,$modulo,$caracter,$curso,$semestre,$nombreAsignaturaIngles,$creditosMateria,$creditos,$coordinadores,$codigoGrado);

    public static function updateAsignatura($idAsignatura,$nombreAsignatura,$materia,$modulo,$caracter,$curso,$semestre,$nombreAsignaturaIngles,$creditosMateria,$creditos,$coordinadores,$codigoGrado);
    
    public static function deleteAsignatura($idAsignatura);

}