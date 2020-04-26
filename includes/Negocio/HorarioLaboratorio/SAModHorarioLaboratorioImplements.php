<?php

namespace es\ucm;

require_once('includes/Negocio/HorarioLaboratorio/SAModHorarioLaboratorio.php');
require_once('includes/Negocio/HorarioLaboratorio/HorarioLaboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModHorarioLaboratorioImplements implements SAModHorarioLaboratorio
{

    public static function listModHorarioLaboratorio($idGrupoLab)
    {
        $arrayHorarioLaboratorio = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio = $factoriesDAO->createDAOModHorarioLaboratorio();
        $horarioLaboratorio = $DAOModHorarioLaboratorio->listModHorarioLaboratorio($idGrupoLab);
        if ($horarioLaboratorio && count($horarioLaboratorio) > 0) {
            foreach ($horarioLaboratorio as $horario) {
                $arrayHorarioLaboratorio[] = new HorarioLaboratorio($horario['IdHorarioLab'], $horario['Laboratorio'], $horario['Dia'], $horario['HoraInicio'], $horario['HoraFin'], $horario['IdGrupoLab']);
            }
        }
        return $arrayHorarioLaboratorio;
    }

    public static function findModHorarioLaboratorio($idHorarioLab)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio = $factoriesDAO->createDAOModHorarioLaboratorio();
        $horarioLaboratorio = $DAOModHorarioLaboratorio->findModHorarioLaboratorio($idHorarioLab);
        if ($horarioLaboratorio && count($horarioLaboratorio) === 1) {
            $horarioLaboratorio = new HorarioLaboratorio(
                $horarioLaboratorio[0]['IdHorarioLab'],
                $horarioLaboratorio[0]['Laboratorio'],
                $horarioLaboratorio[0]['Dia'],
                $horarioLaboratorio[0]['HoraInicio'],
                $horarioLaboratorio[0]['HoraFin'],
                $horarioLaboratorio[0]['IdGrupoLab']
            );
        }
        return $horarioLaboratorio;
    }

    public static function createModHorarioLaboratorio($horarioLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio = $factoriesDAO->createDAOModHorarioLaboratorio();
        $horarioLaboratorio = $DAOModHorarioLaboratorio->createModHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function updateModHorarioLaboratorio($horarioLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio = $factoriesDAO->createDAOModHorarioLaboratorio();
        $horarioLaboratorio = $DAOModHorarioLaboratorio->updateModHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function deleteModHorarioLaboratorio($idHorarioLab)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio = $factoriesDAO->createDAOModHorarioLaboratorio();
        $horarioLaboratorio = $DAOModHorarioLaboratorio->deleteModHorarioLaboratorio($idHorarioLab);
        return $horarioLaboratorio;
    }
}
