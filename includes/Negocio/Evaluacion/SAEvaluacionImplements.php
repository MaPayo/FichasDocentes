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
