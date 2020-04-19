<?php

namespace es\ucm;

require_once('includes/Negocio/HorarioClase/SAModHorarioClase.php');
require_once('includes/Negocio/HorarioClase/HorarioClase.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModHorarioClaseImplements implements SAModHorarioClase
{

    public static function listModHorarioClase($idGrupoClase)
    {
        $arrayHorarioClase = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase = $factoriesDAO->createDAOModHorarioClase();
        $horarioClase = $DAOModHorarioClase->listModHorarioClase($idGrupoClase);
        if ($horarioClase && count($horarioClase) > 0) {
            foreach ($horarioClase as $horario) {
                $arrayHorarioClase[] = new HorarioClase($horario['IdHorarioClase'], $horario['Aula'], $horario['Dia'], $horario['HoraInicio'], $horario['HoraFin'], $horario['IdGrupoClase']);
            }
        }
        return $arrayHorarioClase;
    }

    public static function findModHorarioClase($idHorarioClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase = $factoriesDAO->createDAOModHorarioClase();
        $horarioClase = $DAOModHorarioClase->findModHorarioClase($idHorarioClase);
        if ($horarioClase && count($horarioClase) === 1) {
            $horarioClase = new HorarioClase(
                $horarioClase[0]['IdHorarioClase'],
                $horarioClase[0]['Aula'],
                $horarioClase[0]['Dia'],
                $horarioClase[0]['HoraInicio'],
                $horarioClase[0]['HoraFin'],
                $horarioClase[0]['IdGrupoClase']
            );
        }
        return $horarioClase;
    }

    public static function createModHorarioClase($horarioClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase = $factoriesDAO->createDAOModHorarioClase();
        $horarioClase = $DAOModHorarioClase->createModHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function updateModHorarioClase($horarioClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase = $factoriesDAO->createDAOModHorarioClase();
        $horarioClase = $DAOModHorarioClase->updateModHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function deleteModHorarioClase($idHorarioClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase = $factoriesDAO->createDAOModHorarioClase();
        $horarioClase = $DAOModHorarioClase->deleteModHorarioClase($idHorarioClase);
        return $horarioClase;
    }
}
