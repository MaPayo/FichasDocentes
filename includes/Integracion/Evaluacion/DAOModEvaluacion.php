<?php
namespace es\ucm;

interface DAOModEvaluacion{
    public static function findModEvaluacion($idModAsignatura);

    public static function createModEvaluacion($modEvaluacion);

    public static function updateModEvaluacion($modEvaluacion);
    
    public static function deleteModEvaluacion($idModAsignatura);
}