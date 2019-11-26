<?php
namespace es\ucm;

class SAHorarioClaseImplements implements SAHorarioClase{

    private static $DAOHorarioClase;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase=$factoriesDAO->createDAOHorarioClase(); 
    }
    
    
    public static function findHorarioClase($idGrupoClase){
        $horarioClase=$DAOHorarioClase->findHorarioClase($idGrupoClase);
        return $horarioClase;
    }

    public static function createHorarioClase($aula,$dia,$horaInicio,$horaFin,$idGrupoClase){
        $horarioClase=new \es\ucm\HorarioClase($aula,$dia,$horaInicio,$horaFin,$idGrupoClase);
        $horarioClase=$DAOHorarioClase->createHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function updateHorarioClase($aula,$dia,$horaInicio,$horaFin,$idGrupoClase){
        $horarioClase=new \es\ucm\HorarioClase($aula,$dia,$horaInicio,$horaFin,$idGrupoClase);
        $horarioClase=$DAOHorarioClase->updateHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function deleteHorarioClase($idGrupoClase){
        $horarioClase=$DAOHorarioClase->deleteHorarioClase($idGrupoClase);
        return $horarioClase;
    }

}