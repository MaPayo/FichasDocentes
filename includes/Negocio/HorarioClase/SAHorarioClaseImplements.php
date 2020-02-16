<?php
namespace es\ucm;
require_once('SAHorarioClase.php');

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

    public static function createHorarioClase($horarioClase){
        $horarioClase=$DAOHorarioClase->createHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function updateHorarioClase($horarioClase){
        $horarioClase=$DAOHorarioClase->updateHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function deleteHorarioClase($idGrupoClase){
        $horarioClase=$DAOHorarioClase->deleteHorarioClase($idGrupoClase);
        return $horarioClase;
    }

}