<?php

namespace es\ucm;

require_once('includes/Negocio/HorarioLaboratorio/SAHorarioLaboratorio.php');
require_once('includes/Negocio/HorarioLaboratorio/HorarioLaboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAHorarioLaboratorioImplements implements SAHorarioLaboratorio
{

    public static function listHorarioLaboratorio($idGrupoLab)
    {
        $arrayHorarioLaboratorio = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio = $factoriesDAO->createDAOHorarioLaboratorio();
        $horarioLaboratorio = $DAOHorarioLaboratorio->listHorarioLaboratorio($idGrupoLab);
        if ($horarioLaboratorio && count($horarioLaboratorio) > 0) {
            foreach ($horarioLaboratorio as $horario) {
                $arrayHorarioLaboratorio[] = new HorarioLaboratorio($horario['IdHorarioLab'], $horario['Laboratorio'], $horario['Dia'], $horario['HoraInicio'], $horario['HoraFin'], $horario['IdGrupoLab']);
            }
        }
        else{
         $arrayHorarioLaboratorio   =null;
        }
        return $arrayHorarioLaboratorio;
    }

    public static function findHorarioLaboratorio($idHorarioLab)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio = $factoriesDAO->createDAOHorarioLaboratorio();
        $horarioLaboratorio = $DAOHorarioLaboratorio->findHorarioLaboratorio($idHorarioLab);
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
        else{
         $horarioLaboratorio   =null;
        }
        return $horarioLaboratorio;
    }

    public static function findHorarioLaboratorioGrupoyDia($comparacion)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio = $factoriesDAO->createDAOHorarioLaboratorio();
        $horarioLaboratorio = $DAOHorarioLaboratorio->findHorarioLaboratorioGrupoyDia($comparacion);
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
        else{
         $horarioLaboratorio   =null;
        }
        return $horarioLaboratorio;
    }
    
    public static function createHorarioLaboratorio($horarioLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio = $factoriesDAO->createDAOHorarioLaboratorio();
        $horarioLaboratorio = $DAOHorarioLaboratorio->createHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function updateHorarioLaboratorio($horarioLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio = $factoriesDAO->createDAOHorarioLaboratorio();
        $horarioLaboratorio = $DAOHorarioLaboratorio->updateHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function deleteHorarioLaboratorio($idHorarioLab)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio = $factoriesDAO->createDAOHorarioLaboratorio();
        $horarioLaboratorio = $DAOHorarioLaboratorio->deleteHorarioLaboratorio($idHorarioLab);
        return $horarioLaboratorio;
    }
}
