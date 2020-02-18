<?php

namespace es\ucm;

require_once('includes/Negocio/Grado/SAGrado.php');
require_once('includes/Negocio/Grado/Grado.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAGradoImplements implements SAGrado
{

    public static function findGrado($codigoGrado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grado = $DAOGrado->findGrado($codigoGrado);
        return $grado;
    }

    public static function createGrado($grado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grado = $DAOGrado->createGrado($grado);
        return $grado;
    }

    public static function updateGrado($grado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grado = $DAOGrado->updateGrado($grado);
        return $grado;
    }

    public static function deleteGrado($codigoGrado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrado = $factoriesDAO->createDAOGrado();
        $grado = $DAOGrado->deleteGrado($codigoGrado);
        return $grado;
    }
}
