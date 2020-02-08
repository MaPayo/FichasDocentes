<?php
namespace es\ucm;

interface SAModCompetenciaAsignatura{

    public static function findModCompetenciaAsignatura($idAsignatura);

    public static function createModCompetenciaAsignatura($competenciaAsignatura);

    public static function updateModCompetenciaAsignatura($competenciaAsignatura);
    
    public static function deleteModCompetenciaAsignatura($idAsignatura);

}