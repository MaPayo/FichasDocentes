<?php

namespace es\ucm;
require_once('SAModEvaluacion.php');

class SAModEvaluacionImplements implements SAModEvaluacion{

    private static $DAOModEvaluacion;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion=$factoriesDAO->createDAOModEvaluacion(); 
    }
    
    
    public static function findModEvaluacion($idAsignatura){
        $evaluacion=$DAOModEvaluacion->findModEvaluacion($idAsignatura);
        return $evaluacion;
    }

    public static function createEvaluacion($evaluacion){
        $evaluacion=$DAOModEvaluacion->createModEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function updateModEvaluacion($evaluacion){
        $evaluacion=$DAOModEvaluacion->updateModEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function deleteModEvaluacion($idAsignatura){
        $evaluacion=$DAOModEvaluacion->deleteModEvaluacion($idAsignatura);
        return $evaluacion;
    }

}