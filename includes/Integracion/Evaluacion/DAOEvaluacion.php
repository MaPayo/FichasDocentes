<?php
namespace es\ucm;

interface DAOEvaluacion{
    public static function findEvaluacion($idEvaluacion);

    public static function createEvaluacion($Evaluacion);

    public static function updateEvaluacion($Evaluacion);
    
    public static function deleteEvaluacion($idEvaluacion);
}