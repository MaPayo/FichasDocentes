<?php

namespace es\ucm;

require_once('includes/Negocio/Metodologia/SAModMetodologia.php');
require_once('includes/Negocio/Metodologia/ModMetodologia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModMetodologiaImplements implements SAModMetodologia
{
    public static function findModMetodologia($idModAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia = $factoriesDAO->createDAOModMetodologia();
        $metodologia = $DAOModMetodologia->findModMetodologia($idModAsignatura);
        if ($metodologia && count($metodologia) === 1) {
            $metodologia = new ModMetodologia(
                $metodologia[0]['IdMetodologia'],
                $metodologia[0]['Metodologia'],
                $metodologia[0]['Metodologiai'],
                $metodologia[0]['IdModAsignatura']
            );
        }
        return $metodologia;
    }

    public static function createModMetodologia($modMetodologia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia = $factoriesDAO->createDAOModMetodologia();
        $metodologia = $DAOModMetodologia->createModMetodologia($modMetodologia);
        return $metodologia;
    }

    public static function updateModMetodologia($modMetodologia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia = $factoriesDAO->createDAOModMetodologia();
        $metodologia = $DAOModMetodologia->updateModMetodologia($modMetodologia);
        return $metodologia;
    }

    public static function deleteModMetodologia($idModAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia = $factoriesDAO->createDAOModMetodologia();
        $metodologia = $DAOModMetodologia->deleteModMetodologia($idModAsignatura);
        return $metodologia;
    }
}
