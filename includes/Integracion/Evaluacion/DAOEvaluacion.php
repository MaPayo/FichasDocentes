<?php
namespace es\ucm;

interface DAOEvaluacion{
    public static function findEvaluacion($idAsignatura);

    public static function createEvaluacion($Evaluacion);

    public static function updateEvaluacion($Evaluacion);
    
    public static function deleteEvaluacion($idAsignatura);
}