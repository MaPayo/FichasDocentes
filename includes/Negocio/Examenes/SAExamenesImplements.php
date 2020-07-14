<?php

namespace es\ucm;

require_once('includes/Negocio/Examenes/SAExamenes.php');
require_once('includes/Negocio/Examenes/Examenes.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAExamenesImplements implements SAExamenes
{

    public static function findExamenes($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOExamenes = $factoriesDAO->createDAOExamenes();
        $examenes = $DAOExamenes->findExamenes($idAsignatura);
        if ($examenes && count($examenes) === 1) {
            $examenes = new Examenes(
                $examenes[0]['IdExamenes'],
                $examenes[0]['Parcial'],
                $examenes[0]['Laboratorio'],
                $examenes[0]['Final'],
                $examenes[0]['Extraordinario'],
                $examenes[0]['IdAsignatura']
            );
        }
        return $examenes;
    }

    public static function createExamenes($examenes)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOExamenes = $factoriesDAO->createDAOExamenes();
        $examenes = $DAOExamenes->createExamenes($examenes);
        return $examenes;
    }

    public static function updateExamenes($examenes)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOExamenes = $factoriesDAO->createDAOExamenes();
        $examenes = $DAOExamenes->updateExamenes($examenes);
        return $examenes;
    }

    public static function deleteExamenes($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOExamenes = $factoriesDAO->createDAOExamenes();
        $examenes = $DAOExamenes->deleteExamenes($idAsignatura);
        return $examenes;
    }
}
