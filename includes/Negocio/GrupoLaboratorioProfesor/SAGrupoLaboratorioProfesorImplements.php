<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoLaboratorioProfesor/SAGrupoLaboratorioProfesor.php');
require_once('includes/Negocio/GrupoLaboratorioProfesor/GrupoLaboratorioProfesor.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAGrupoLaboratorioProfesorImplements implements SAGrupoLaboratorioProfesor
{

    public static function listGrupoLaboratorioProfesor($idGrupoLab)
    {
        $arrayGrupoLaboratorioProfesor = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorioProfesor = $factoriesDAO->createDAOGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $DAOGrupoLaboratorioProfesor->listGrupoLaboratorioProfesor($idGrupoLab);
        if ($grupoLaboratorioProfesor && count($grupoLaboratorioProfesor) > 0) {
            foreach ($grupoLaboratorioProfesor as $grupo) {
<<<<<<< Updated upstream
                $arrayGrupoLaboratorioProfesor[] = new GrupoLaboratorioProfesor($grupo['IdGrupoLab'], $grupo['EmailProfesor']);
=======
                $arrayGrupoLaboratorioProfesor[] = new GrupoLaboratorioProfesor(
                    $grupo['IdGrupoLab'],
                    $grupo['Fechas'],
                    $grupo['EmailProfesor']
                );
>>>>>>> Stashed changes
            }
        }
        return $arrayGrupoLaboratorioProfesor;
    }

    public static function findGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorioProfesor = $factoriesDAO->createDAOGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $DAOGrupoLaboratorioProfesor->findGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);
        if ($grupoLaboratorioProfesor && count($grupoLaboratorioProfesor) === 1) {
            $grupoLaboratorioProfesor = new GrupoLaboratorioProfesor(
                $grupoLaboratorioProfesor[0]['IdGrupoLab'],
<<<<<<< Updated upstream
=======
                $grupoLaboratorioProfesor[0]['Fechas'],
>>>>>>> Stashed changes
                $grupoLaboratorioProfesor[0]['EmailProfesor']
            );
        }
        return $grupoLaboratorioProfesor;
    }

    public static function createGrupoLaboratorioProfesor($grupoLaboratorioProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorioProfesor = $factoriesDAO->createDAOGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $DAOGrupoLaboratorioProfesor->createGrupoLaboratorioProfesor($grupoLaboratorioProfesor);
        return $grupoLaboratorioProfesor;
    }

    public static function updateGrupoLaboratorioProfesor($grupoLaboratorioProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorioProfesor = $factoriesDAO->createDAOGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $DAOGrupoLaboratorioProfesor->updateGrupoLaboratorioProfesor($grupoLaboratorioProfesor);
        return $grupoLaboratorioProfesor;
    }

    public static function deleteGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorioProfesor = $factoriesDAO->createDAOGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $DAOGrupoLaboratorioProfesor->deleteGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);
        return $grupoLaboratorioProfesor;
    }
}
