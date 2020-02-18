<?php

namespace es\ucm;

require_once('includes/Negocio/Evaluacion/SAModEvaluacion.php');
require_once('includes/Negocio/Evaluacion/Evaluacion.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModEvaluacionImplements implements SAModEvaluacion
{

    public static function findModEvaluacion($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion = $factoriesDAO->createDAOModEvaluacion();
        $evaluacion = $DAOModEvaluacion->findModEvaluacion($idAsignatura);
        return $evaluacion;
    }

    public static function createEvaluacion($evaluacion)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion = $factoriesDAO->createDAOModEvaluacion();
        $evaluacion = $DAOModEvaluacion->createModEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function updateModEvaluacion($evaluacion)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion = $factoriesDAO->createDAOModEvaluacion();
        $evaluacion = $DAOModEvaluacion->updateModEvaluacion($evaluacion);
        return $evaluacion;
    }

    public static function deleteModEvaluacion($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModEvaluacion = $factoriesDAO->createDAOModEvaluacion();
        $evaluacion = $DAOModEvaluacion->deleteModEvaluacion($idAsignatura);
        return $evaluacion;
    }
}
