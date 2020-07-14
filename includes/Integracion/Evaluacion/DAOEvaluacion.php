<?php
namespace es\ucm;

interface DAOEvaluacion{
    public static function findEvaluacion($idAsignatura);

    public static function createEvaluacion($evaluacion);

    public static function updateEvaluacion($evaluacion);
    
    public static function deleteEvaluacion($idAsignatura);
}