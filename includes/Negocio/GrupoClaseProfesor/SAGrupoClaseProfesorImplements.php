<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoClaseProfesor/SAGrupoClaseProfesor.php');
require_once('includes/Negocio/GrupoClaseProfesor/GrupoClaseProfesor.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAGrupoClaseProfesorImplements implements SAGrupoClaseProfesor
{

    public static function listGrupoClaseProfesor($idGrupoClase)
    {
        $arrayGrupoClaseProfesor = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClaseProfesor = $factoriesDAO->createDAOGrupoClaseProfesor();
        $grupoClaseProfesor = $DAOGrupoClaseProfesor->listGrupoClaseProfesor($idGrupoClase);
        if ($grupoClaseProfesor && count($grupoClaseProfesor) > 0) {
            foreach ($grupoClaseProfesor as $grupo) {
                $arrayGrupoClaseProfesor[] = new GrupoClaseProfesor($grupo['IdGrupoClase'], $grupo['EmailProfesor']);
            }
        }
        return $arrayGrupoClaseProfesor;
    }

    public static function findGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClaseProfesor = $factoriesDAO->createDAOGrupoClaseProfesor();
        $grupoClaseProfesor = $DAOGrupoClaseProfesor->findGrupoClaseProfesor($idGrupoClase, $emailProfesor);
        if ($grupoClaseProfesor && count($grupoClaseProfesor) === 1) {
            $grupoClaseProfesor = new GrupoClaseProfesor(
                $grupoClaseProfesor[0]['IdGrupoClase'],
                $grupoClaseProfesor[0]['EmailProfesor']
            );
        }
        return $grupoClaseProfesor;
    }

    public static function createGrupoClaseProfesor($grupoClaseProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClaseProfesor = $factoriesDAO->createDAOGrupoClaseProfesor();
        $grupoClaseProfesor = $DAOGrupoClaseProfesor->createGrupoClaseProfesor($grupoClaseProfesor);
        return $grupoClaseProfesor;
    }

    public static function updateGrupoClaseProfesor($grupoClaseProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClaseProfesor = $factoriesDAO->createDAOGrupoClaseProfesor();
        $grupoClaseProfesor = $DAOGrupoClaseProfesor->updateGrupoClaseProfesor($grupoClaseProfesor);
        return $grupoClaseProfesor;
    }

    public static function deleteGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClaseProfesor = $factoriesDAO->createDAOGrupoClaseProfesor();
        $grupoClaseProfesor = $DAOGrupoClaseProfesor->deleteGrupoClaseProfesor($idGrupoClase, $emailProfesor);
        return $grupoClaseProfesor;
    }
}
