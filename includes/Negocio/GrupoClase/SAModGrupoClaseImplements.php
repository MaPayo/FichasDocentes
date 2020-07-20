<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoClase/SAModGrupoClase.php');
require_once('includes/Negocio/GrupoClase/ModGrupoClase.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModGrupoClaseImplements implements SAModGrupoClase
{


    public static function listModGrupoClase($idModAsignatura)
    {
        $arrayGrupoClase = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase = $factoriesDAO->createDAOModGrupoClase();
        $grupoClase = $DAOModGrupoClase->listModGrupoClase($idModAsignatura);
        if ($grupoClase && count($grupoClase) > 0) {
            foreach ($grupoClase as $grupo) {
                $arrayGrupoClase[] = new ModGrupoClase($grupo['IdGrupoClase'], $grupo['Letra'], $grupo['Idioma'], $grupo['IdModAsignatura']);
            }
        }
        return $arrayGrupoClase;
    }

    public static function findModGrupoClase($idGrupoClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase = $factoriesDAO->createDAOModGrupoClase();
        $grupoClase = $DAOModGrupoClase->findModGrupoClase($idGrupoClase);
        if ($grupoClase && count($grupoClase) === 1) {
            $grupoClase = new ModGrupoClase(
                $grupoClase[0]['IdGrupoClase'],
                $grupoClase[0]['Letra'],
                $grupoClase[0]['Idioma'],
                $grupoClase[0]['IdModAsignatura']
            );
        }
        return $grupoClase;
    }

    public static function createModGrupoClase($grupoClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase = $factoriesDAO->createDAOModGrupoClase();
        $grupoClase = $DAOModGrupoClase->createModGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function updateModGrupoClase($grupoClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase = $factoriesDAO->createDAOModGrupoClase();
        $grupoClase = $DAOModGrupoClase->updateModGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function deleteModGrupoClase($idGrupoClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase = $factoriesDAO->createDAOModGrupoClase();
        $grupoClase = $DAOModGrupoClase->deleteModGrupoClase($idGrupoClase);
        return $grupoClase;
    }
}
