<?php

namespace es\ucm;

require_once('includes/Negocio/Bibliografia/SAModBibliografia.php');
require_once('includes/Negocio/Bibliografia/ModBibliografia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModBibliografiaImplements implements SAModBibliografia
{

    public static function findModBibliografia($idModAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia = $factoriesDAO->createDAOModBibliografia();
        $bibliografia = $DAOBibliografia->findModBibliografia($idModAsignatura);
        if ($bibliografia && count($bibliografia) === 1) {
            $bibliografia = new ModBibliografia(
                $bibliografia[0]['IdBibliografia'],
                $bibliografia[0]['CitasBibliograficas'],
                $bibliografia[0]['RecursosInternet'],
                $bibliografia[0]['IdModAsignatura']
            );
        }
        else{
            $bibliografia=null;
        }
        return $bibliografia;
    }

    public static function createModBibliografia($bibliografia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia = $factoriesDAO->createDAOModBibliografia();
        $bibliografia = $DAOBibliografia->createModBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function updateModBibliografia($bibliografia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia = $factoriesDAO->createDAOModBibliografia();
        $bibliografia = $DAOBibliografia->updateModBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function deleteModBibliografia($idModAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia = $factoriesDAO->createDAOModBibliografia();
        $bibliografia = $DAOBibliografia->deleteModBibliografia($idModAsignatura);
        return $bibliografia;
    }
}
