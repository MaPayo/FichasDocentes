<?php

namespace es\ucm;

require_once('includes/Negocio/Metodologia/SAMetodologia.php');
require_once('includes/Negocio/Metodologia/Metodologia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAMetodologiaImplements implements SAMetodologia
{
    public static function findMetodologia($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia = $factoriesDAO->createDAOMetodologia();
        $metodologia = $DAOMetodologia->findMetodologia($idAsignatura);
        if ($metodologia && count($metodologia) === 1) {
            $metodologia = new Metodologia(
                $metodologia[0]['IdMetodologia'],
                $metodologia[0]['Metodologia'],
                $metodologia[0]['Metodologiai'],
                $metodologia[0]['IdAsignatura']
            );
        }
        return $metodologia;
    }

    public static function createMetodologia($metodologia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia = $factoriesDAO->createDAOMetodologia();
        $metodologia = $DAOMetodologia->createMetodologia($metodologia);
        return $metodologia;
    }

    public static function updateMetodologia($metodologia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia = $factoriesDAO->createDAOMetodologia();
        $metodologia = $DAOMetodologia->updateMetodologia($metodologia);
        return $metodologia;
    }

    public static function deleteMetodologia($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia = $factoriesDAO->createDAOMetodologia();
        $metodologia = $DAOMetodologia->deleteMetodologia($idAsignatura);
        return $metodologia;
    }
}
