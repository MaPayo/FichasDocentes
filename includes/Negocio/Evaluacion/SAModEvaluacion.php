<?php
namespace es\ucm;

interface SAModEvaluacion{

    public static function findModEvaluacion($idAsignatura);

    public static function createModEvaluacion($evaluacion);

    public static function updateModEvaluacion($evaluacion);
    
    public static function deleteModEvaluacion($idAsignatura);

}