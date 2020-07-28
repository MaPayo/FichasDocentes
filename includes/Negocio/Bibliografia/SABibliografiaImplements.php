<?php

namespace es\ucm;

require_once('includes/Negocio/Bibliografia/SABibliografia.php');
require_once('includes/Negocio/Bibliografia/Bibliografia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SABibliografiaImplements implements SABibliografia
{

    public static function findBibliografia($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia = $factoriesDAO->createDAOBibliografia();
        $bibliografia = $DAOBibliografia->findBibliografia($idAsignatura);
        if ($bibliografia && count($bibliografia) === 1) {
            $bibliografia = new Bibliografia(
                $bibliografia[0]['IdBibliografia'],
                $bibliografia[0]['CitasBibliograficas'],
                $bibliografia[0]['RecursosInternet'],
                $bibliografia[0]['IdAsignatura']
            );
        }
        else{
            $bibliografia=null;
        }
        return $bibliografia;
    }

    public static function createBibliografia($bibliografia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia = $factoriesDAO->createDAOBibliografia();
        $bibliografia = $DAOBibliografia->createBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function updateBibliografia($bibliografia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia = $factoriesDAO->createDAOBibliografia();
        $bibliografia = $DAOBibliografia->updateBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function deleteBibliografia($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia = $factoriesDAO->createDAOBibliografia();
        $bibliografia = $DAOBibliografia->deleteBibliografia($idAsignatura);
        return $bibliografia;
    }
}
