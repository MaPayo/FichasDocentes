<?php

namespace es\ucm;

require_once('includes/Negocio/HorarioClase/SAHorarioClase.php');
require_once('includes/Negocio/HorarioClase/HorarioClase.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAHorarioClaseImplements implements SAHorarioClase
{

    public static function listHorarioClase($idGrupoClase)
    {
        $arrayHorarioClase = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase = $factoriesDAO->createDAOHorarioClase();
        $horarioClase = $DAOHorarioClase->listHorarioClase($idGrupoClase);
        if ($horarioClase && count($horarioClase) > 0) {
            foreach ($horarioClase as $horario) {
                $arrayHorarioClase[] = new HorarioClase($horario['IdHorarioClase'], $horario['Aula'], $horario['Dia'], $horario['HoraInicio'], $horario['HoraFin'], $horario['IdGrupoClase']);
            }
        }
        return $arrayHorarioClase;
    }

    public static function findHorarioClase($idHorarioClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase = $factoriesDAO->createDAOHorarioClase();
        $horarioClase = $DAOHorarioClase->findHorarioClase($idHorarioClase);
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

    public static function createHorarioClase($horarioClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase = $factoriesDAO->createDAOHorarioClase();
        $horarioClase = $DAOHorarioClase->createHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function updateHorarioClase($horarioClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase = $factoriesDAO->createDAOHorarioClase();
        $horarioClase = $DAOHorarioClase->updateHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function deleteHorarioClase($idHorarioClase)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase = $factoriesDAO->createDAOHorarioClase();
        $horarioClase = $DAOHorarioClase->deleteHorarioClase($idHorarioClase);
        return $horarioClase;
    }
}
