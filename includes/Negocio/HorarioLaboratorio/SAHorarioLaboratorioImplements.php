<?php

namespace es\ucm;
require_once('SAHorarioLaboratorio.php');

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

    public static function createHorarioLaboratorio($horarioLaboratorio){
        $horarioLaboratorio=$DAOHorarioLaboratorio->createHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function updateHorarioLaboratorio($horarioLaboratorio){
        $horarioLaboratorio=$DAOHorarioLaboratorio->updateHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function deleteHorarioLaboratorio($idGrupoLab){
        $horarioLaboratorio=$DAOHorarioLaboratorio->deleteHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

}