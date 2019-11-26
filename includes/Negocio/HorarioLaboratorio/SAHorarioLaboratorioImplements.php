<?php

namespace es\ucm;

class SAHorarioLaboratorioImplements implements SAHorarioLaboratorio{

    private static $DAOHorarioLaboratorio;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio=$factoriesDAO->createDAOHorarioLaboratorio(); 
    }
    
    
    public static function findHorarioLaboratorio($idGrupoLab){
        $horarioLaboratorio=$DAOHorarioLaboratorio->findHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

    public static function createHorarioLaboratorio($laboratorio,$dia,$horaInicio,$horaFin,$idGrupoLab){
        $horarioLaboratorio=new \es\ucm\HorarioLaboratorio($laboratorio,$dia,$horaInicio,$horaFin,$idGrupoLab);
        $horarioLaboratorio=$DAOHorarioLaboratorio->createHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function updateHorarioLaboratorio($laboratorio,$dia,$horaInicio,$horaFin,$idGrupoLab){
        $horarioLaboratorio=new \es\ucm\HorarioLaboratorio($laboratorio,$dia,$horaInicio,$horaFin,$idGrupoLab);
        $horarioLaboratorio=$DAOHorarioLaboratorio->updateHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function deleteHorarioLaboratorio($idGrupoLab){
        $horarioLaboratorio=$DAOHorarioLaboratorio->deleteHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

}