<?php

namespace es\ucm;

require_once('includes/Negocio/Evaluacion/SAEvaluacion.php');
require_once('includes/Negocio/Evaluacion/Evaluacion.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAEvaluacionImplements implements SAEvaluacion
{
    public static function findEvaluacion($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOEvaluacion = $factoriesDAO->createDAOEvaluacion();
        $evaluacion = $DAOEvaluacion->findEvaluacion($idAsignatura);
        if ($evaluacion && count($evaluacion) === 1) {
            $evaluacion = new Evaluacion(
                $evaluacion[0]['IdEvaluacion'],
                $evaluacion[0]['RealizacionExamenes'],
                $evaluacion[0]['RealizacionExamenesi'],
                $evaluacion[0]['PesoExamenes'],
                $evaluacion[0]['RealizacionActividades'],
                $evaluacion[0]['RealizacionActividadesi'],
                $evaluacion[0]['PesoActividades'],
                $evaluacion[0]['RealizacionLaboratorio'],
                $evaluacion[0]['RealizacionLaboratorioi'],
                $evaluacion[0]['PesoLaboratorio'],
                $evaluacion[0]['CalificacionFinalO'],
                $evaluacion[0]['CalificacionFinalOi'],
                $evaluacion[0]['CalificacionFinalE'],
                $evaluacion[0]['CalificacionFinalEi'],
                $evaluacion[0]['IdAsignatura']
            );
        }
        return $evaluacion;
    }

    public static function createEvaluacion($evaluacion)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOEvaluacion = $factoriesDAO->createDAOEvaluacion();
        $evaluacion = $DAOEvaluacion->createEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function updateEvaluacion($evaluacion)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOEvaluacion = $factoriesDAO->createDAOEvaluacion();
        $evaluacion = $DAOEvaluacion->updateEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function deleteEvaluacion($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOEvaluacion = $factoriesDAO->createDAOEvaluacion();
        $evaluacion = $DAOEvaluacion->deleteEvaluacion($idAsignatura);
        return $evaluacion;
    }
}
