<?php
namespace es\ucm;

class SAModHorarioClaseImplements implements SAModHorarioClase{

    private static $DAOModHorarioClase;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase=$factoriesDAO->createDAOModHorarioClase(); 
    }
    
    
    public static function findModHorarioClase($idGrupoClase){
        $horarioClase=$DAOModHorarioClase->findModHorarioClase($idGrupoClase);
        return $horarioClase;
    }

    public static function createModHorarioClase($horarioClase){
        $horarioClase=$DAOModHorarioClase->createModHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function updateModHorarioClase($horarioClase){
        $horarioClase=$DAOModHorarioClase->updateModHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function deleteModHorarioClase($idGrupoClase){
        $horarioClase=$DAOModHorarioClase->deleteModHorarioClase($idGrupoClase);
        return $horarioClase;
    }

}