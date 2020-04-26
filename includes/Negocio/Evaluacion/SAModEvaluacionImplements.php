<?php

namespace es\ucm;

require_once('includes/Negocio/Evaluacion/SAModEvaluacion.php');
require_once('includes/Negocio/Evaluacion/Evaluacion.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModEvaluacionImplements implements SAModEvaluacion
{

    public static function findModEvaluacion($idModAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion = $factoriesDAO->createDAOModEvaluacion();
        $evaluacion = $DAOModEvaluacion->findModEvaluacion($idModAsignatura);
        if ($evaluacion && count($evaluacion) === 1) {
            $evaluacion = new Evaluacion(
                $evaluacion[0]['IdEvaluacion'],
                $evaluacion[0]['RealizacionExamenes'],
                $evaluacion[0]['RealizacionExamenesi'],
                $evaluacion[0]['PesoExamenes'],
                $evaluacion[0]['CalificacionFinal'],
                $evaluacion[0]['CalificacionFinali'],
                $evaluacion[0]['RealizacionActividades'],
                $evaluacion[0]['RealizacionActividadesi'],
                $evaluacion[0]['PesoActividades'],
                $evaluacion[0]['RealizacionLaboratorio'],
                $evaluacion[0]['RealizacionLaboratorioi'],
                $evaluacion[0]['PesoLaboratorio'],
                $evaluacion[0]['IdModAsignatura']
            );
        }
        return $evaluacion;
    }

    public static function createModEvaluacion($modEvaluacion)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion = $factoriesDAO->createDAOModEvaluacion();
        $evaluacion = $DAOModEvaluacion->createModEvaluacion($modEvaluacion);
        return $evaluacion;
    }

    public static function updateModEvaluacion($modEvaluacion)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion = $factoriesDAO->createDAOModEvaluacion();
        $evaluacion = $DAOModEvaluacion->updateModEvaluacion($modEvaluacion);
        return $evaluacion;
    }

    public static function deleteModEvaluacion($idModAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion = $factoriesDAO->createDAOModEvaluacion();
        $evaluacion = $DAOModEvaluacion->deleteModEvaluacion($idModAsignatura);
        return $evaluacion;
    }
}
