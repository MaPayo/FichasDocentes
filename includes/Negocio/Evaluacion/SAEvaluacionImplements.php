<?php

namespace es\ucm;

class SAEvaluacionImplements implements SAEvaluacion{

    private static $DAOEvaluacion;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOEvaluacion=$factoriesDAO->createDAOEvaluacion(); 
    }
    
    
    public static function findEvaluacion($idAsignatura){
        $evaluacion=$DAOEvaluacion->findEvaluacion($idAsignatura);
        return $evaluacion;
    }

    public static function createEvaluacion($evaluacion){
        $evaluacion=$DAOEvaluacion->createEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function updateEvaluacion($evaluacion){
        $evaluacion=$DAOEvaluacion->updateEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function deleteEvaluacion($idAsignatura){
        $evaluacion=$DAOEvaluacion->deleteEvaluacion($idAsignatura);
        return $evaluacion;
    }

}