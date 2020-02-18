<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoClase/SAGrupoClase.php');
require_once('includes/Negocio/GrupoClase/GrupoClase.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAGrupoClaseImplements implements SAGrupoClase
{

    private static $DAOGrupoClase;

    public function __construct()
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase = $factoriesDAO->createDAOGrupoClase();
    }


    public static function findGrupoClase($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase = $factoriesDAO->createDAOGrupoClase();
        $grupoClase = $DAOGrupoClase->findGrupoClase($idAsignatura);
        return $grupoClase;
    }

    public static function createGrupoClase($grupoClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase = $factoriesDAO->createDAOGrupoClase();
        $grupoClase = $DAOGrupoClase->createGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function updateGrupoClase($grupoClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase = $factoriesDAO->createDAOGrupoClase();
        $grupoClase = $DAOGrupoClase->updateGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function deleteGrupoClase($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase = $factoriesDAO->createDAOGrupoClase();
        $grupoClase = $DAOGrupoClase->deleteGrupoClase($idAsignatura);
        return $grupoClase;
    }
}
