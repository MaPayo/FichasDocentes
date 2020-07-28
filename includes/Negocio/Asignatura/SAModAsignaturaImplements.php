<?php

namespace es\ucm;

require_once('includes/Negocio/Asignatura/SAModAsignatura.php');
require_once('includes/Negocio/Asignatura/Asignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModAsignaturaImplements implements SAModAsignatura
{

    public static function findModAsignatura($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura = $factoriesDAO->createDAOModAsignatura();
        $modAsignatura = $DAOModAsignatura->findModAsignatura($idAsignatura);
        if ($modAsignatura && count($modAsignatura) === 1) {
            $modAsignatura = new ModAsignatura(
                $modAsignatura[0]['IdModAsignatura'],
                $modAsignatura[0]['FechaMod'],
                $modAsignatura[0]['EmailMod'],
                $modAsignatura[0]['IdAsignatura']
            );
        }
        else{
            $modAsignatura=null;
        }
        return $modAsignatura;
    }

    public static function createModAsignatura($asignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura = $factoriesDAO->createDAOModAsignatura();
        $asignatura = $DAOModAsignatura->createModAsignatura($asignatura);
        return $asignatura;
    }

    public static function updateModAsignatura($asignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura = $factoriesDAO->createDAOModAsignatura();
        $asignatura = $DAOModAsignatura->updateModAsignatura($asignatura);
        return $asignatura;
    }

    public static function deleteModAsignatura($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura = $factoriesDAO->createDAOModAsignatura();
        $modAsignatura = $DAOModAsignatura->deleteModAsignatura($idAsignatura);
        return $modAsignatura;
    }
}
