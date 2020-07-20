<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoClaseProfesor/SAModGrupoClaseProfesor.php');
require_once('includes/Negocio/GrupoClaseProfesor/ModGrupoClaseProfesor.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModGrupoClaseProfesorImplements implements SAModGrupoClaseProfesor
{

    public static function listModGrupoClaseProfesor($idGrupoClase)
    {
        $arrayModGrupoClaseProfesor = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClaseProfesor = $factoriesDAO->createDAOModGrupoClaseProfesor();
        $modGrupoClaseProfesor = $DAOModGrupoClaseProfesor->listModGrupoClaseProfesor($idGrupoClase);
        if ($modGrupoClaseProfesor && count($modGrupoClaseProfesor) > 0) {
            foreach ($modGrupoClaseProfesor as $grupo) {
                $arrayModGrupoClaseProfesor[] = new ModGrupoClaseProfesor(
                    $grupo['IdGrupoClase'],
                    $grupo['Tipo'],
                    $grupo['FechaInicio'],
                    $grupo['FechaFin'],
                    $grupo['EmailProfesor']
                );
            }
        }
        return $arrayModGrupoClaseProfesor;
    }

    public static function findModGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClaseProfesor = $factoriesDAO->createDAOModGrupoClaseProfesor();
        $modGrupoClaseProfesor = $DAOModGrupoClaseProfesor->findModGrupoClaseProfesor($idGrupoClase, $emailProfesor);
        if ($modGrupoClaseProfesor && count($modGrupoClaseProfesor) === 1) {
            $modGrupoClaseProfesor = new ModGrupoClaseProfesor(
                $modGrupoClaseProfesor[0]['IdGrupoClase'],
                $modGrupoClaseProfesor[0]['Tipo'],
                $modGrupoClaseProfesor[0]['FechaInicio'],
                $modGrupoClaseProfesor[0]['FechaFin'],
                $modGrupoClaseProfesor[0]['EmailProfesor']
            );
        }
        return $modGrupoClaseProfesor;
    }

    public static function createModGrupoClaseProfesor($modGrupoClaseProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClaseProfesor = $factoriesDAO->createDAOModGrupoClaseProfesor();
        $modGrupoClaseProfesor = $DAOModGrupoClaseProfesor->createModGrupoClaseProfesor($modGrupoClaseProfesor);
        return $modGrupoClaseProfesor;
    }

    public static function updateModGrupoClaseProfesor($modGrupoClaseProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClaseProfesor = $factoriesDAO->createDAOModGrupoClaseProfesor();
        $modGrupoClaseProfesor = $DAOModGrupoClaseProfesor->updateModGrupoClaseProfesor($modGrupoClaseProfesor);
        return $modGrupoClaseProfesor;
    }

    public static function deleteModGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClaseProfesor = $factoriesDAO->createDAOModGrupoClaseProfesor();
        $modGrupoClaseProfesor = $DAOModGrupoClaseProfesor->deleteModGrupoClaseProfesor($idGrupoClase, $emailProfesor);
        return $modGrupoClaseProfesor;
    }
}
