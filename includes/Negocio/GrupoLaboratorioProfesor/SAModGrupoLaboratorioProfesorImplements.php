<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoLaboratorioProfesor/SAModGrupoLaboratorioProfesor.php');
require_once('includes/Negocio/GrupoLaboratorioProfesor/ModGrupoLaboratorioProfesor.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModGrupoLaboratorioProfesorImplements implements SAModGrupoLaboratorioProfesor
{

    public static function listModGrupoLaboratorioProfesor($idGrupoLab)
    {
        $arrayModGrupoLaboratorioProfesor = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorioProfesor = $factoriesDAO->createDAOModGrupoLaboratorioProfesor();
        $modGrupoLaboratorioProfesor = $DAOModGrupoLaboratorioProfesor->listModGrupoLaboratorioProfesor($idGrupoLab);
        if ($modGrupoLaboratorioProfesor && count($modGrupoLaboratorioProfesor) > 0) {
            foreach ($modGrupoLaboratorioProfesor as $grupo) {
                $arrayModGrupoLaboratorioProfesor[] = new ModGrupoLaboratorioProfesor(
                    $grupo['IdGrupoLab'],
                    $grupo['FechaInicio'],
                    $grupo['FechaFin'],
                    $grupo['EmailProfesor']
                );
            }
        }
        else{
         $arrayModGrupoLaboratorioProfesor   =null;
        }
        return $arrayModGrupoLaboratorioProfesor;
    }

    public static function findModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorioProfesor = $factoriesDAO->createDAOModGrupoLaboratorioProfesor();
        $modGrupoLaboratorioProfesor = $DAOModGrupoLaboratorioProfesor->findModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);
        if ($modGrupoLaboratorioProfesor && count($modGrupoLaboratorioProfesor) === 1) {
            $modGrupoLaboratorioProfesor = new ModGrupoLaboratorioProfesor(
                $modGrupoLaboratorioProfesor[0]['IdGrupoLab'],
                $modGrupoLaboratorioProfesor[0]['FechaInicio'],
                $modGrupoLaboratorioProfesor[0]['FechaFin'],
                $modGrupoLaboratorioProfesor[0]['EmailProfesor']
            );
        }
        else{
         $modGrupoLaboratorioProfesor   =null;
        }
        return $modGrupoLaboratorioProfesor;
    }

    public static function createModGrupoLaboratorioProfesor($modGrupoLaboratorioProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorioProfesor = $factoriesDAO->createDAOModGrupoLaboratorioProfesor();
        $modGrupoLaboratorioProfesor = $DAOModGrupoLaboratorioProfesor->createModGrupoLaboratorioProfesor($modGrupoLaboratorioProfesor);
        return $modGrupoLaboratorioProfesor;
    }

    public static function updateModGrupoLaboratorioProfesor($modGrupoLaboratorioProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorioProfesor = $factoriesDAO->createDAOModGrupoLaboratorioProfesor();
        $modGrupoLaboratorioProfesor = $DAOModGrupoLaboratorioProfesor->updateModGrupoLaboratorioProfesor($modGrupoLaboratorioProfesor);
        return $modGrupoLaboratorioProfesor;
    }

    public static function deleteModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorioProfesor = $factoriesDAO->createDAOModGrupoLaboratorioProfesor();
        $modGrupoLaboratorioProfesor = $DAOModGrupoLaboratorioProfesor->deleteModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);
        return $modGrupoLaboratorioProfesor;
    }
}
