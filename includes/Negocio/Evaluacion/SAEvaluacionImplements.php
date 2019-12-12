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

    public static function createEvaluacion($realizacionExamenes,$realizacionExamenesI,$pesoExamenes,$calificacionFinal,$calificacionFinalI,$realizacionActividades,$realizacionActividadesI,$pesoActividades,$realizacionLaboratorio,$realizacionLaboratorioI,$pesoLaboratorio,$idAsignatura){
        $evaluacion=new \es\ucm\Evaluacion($realizacionExamenes,$realizacionExamenesI,$pesoExamenes,$calificacionFinal,$calificacionFinalI,$realizacionActividades,$realizacionActividadesI,$pesoActividades,$realizacionLaboratorio,$realizacionLaboratorioI,$pesoLaboratorio,$idAsignatura);
        $evaluacion=$DAOEvaluacion->createEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function updateEvaluacion($realizacionExamenes,$realizacionExamenesI,$pesoExamenes,$calificacionFinal,$calificacionFinalI,$realizacionActividades,$realizacionActividadesI,$pesoActividades,$realizacionLaboratorio,$realizacionLaboratorioI,$pesoLaboratorio,$idAsignatura){
        $evaluacion=new \es\ucm\Evaluacion($realizacionExamenes,$realizacionExamenesI,$pesoExamenes,$calificacionFinal,$calificacionFinalI,$realizacionActividades,$realizacionActividadesI,$pesoActividades,$realizacionLaboratorio,$realizacionLaboratorioI,$pesoLaboratorio,$idAsignatura);
        $evaluacion=$DAOEvaluacion->updateEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function deleteEvaluacion($idAsignatura){
        $evaluacion=$DAOEvaluacion->deleteEvaluacion($idAsignatura);
        return $evaluacion;
    }

}