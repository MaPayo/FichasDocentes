<?php

namespace es\ucm;
require_once('SAModHorarioLaboratorio.php');

class SAModHorarioLaboratorioImplements implements SAModHorarioLaboratorio{

    private static $DAOModHorarioLaboratorio;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio=$factoriesDAO->createDAOModHorarioLaboratorio(); 
    }
    
    
    public static function findModHorarioLaboratorio($idGrupoLab){
        $horarioLaboratorio=$DAOModHorarioLaboratorio->findModHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

    public static function createModHorarioLaboratorio($horarioLaboratorio){
        $horarioLaboratorio=$DAOModHorarioLaboratorio->createModHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function updateModHorarioLaboratorio($horarioLaboratorio){
        $horarioLaboratorio=$DAOModHorarioLaboratorio->updateModHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function deleteModHorarioLaboratorio($idGrupoLab){
        $horarioLaboratorio=$DAOModHorarioLaboratorio->deleteModHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

}