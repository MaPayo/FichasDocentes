<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoClase/SAGrupoClase.php');
require_once('includes/Negocio/GrupoClase/GrupoClase.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAGrupoClaseImplements implements SAGrupoClase
{

    public static function listGrupoClase($idAsignatura)
    {
        $arrayGrupoClase = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase = $factoriesDAO->createDAOGrupoClase();
        $grupoClase = $DAOGrupoClase->listGrupoClase($idAsignatura);
        if ($grupoClase && count($grupoClase) > 0) {
            foreach ($grupoClase as $grupo) {
                $arrayGrupoClase[] = new GrupoClase($grupo['IdGrupoClase'], $grupo['Letra'], $grupo['Idioma'], $grupo['IdAsignatura']);
            }
        }
        else{
         $arrayGrupoClase   =null;
        }
        return $arrayGrupoClase;
    }

    public static function findGrupoClase($idGrupoClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase = $factoriesDAO->createDAOGrupoClase();
        $grupoClase = $DAOGrupoClase->findGrupoClase($idGrupoClase);
        if ($grupoClase && count($grupoClase) === 1) {
            $grupoClase = new GrupoClase(
                $grupoClase[0]['IdGrupoClase'],
                $grupoClase[0]['Letra'],
                $grupoClase[0]['Idioma'],
                $grupoClase[0]['IdAsignatura']
            );
        }
        else{
         $grupoClase   =null;
        }
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

    public static function deleteGrupoClase($idGrupoClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase = $factoriesDAO->createDAOGrupoClase();
        $grupoClase = $DAOGrupoClase->deleteGrupoClase($idGrupoClase);
        return $grupoClase;
    }
}
