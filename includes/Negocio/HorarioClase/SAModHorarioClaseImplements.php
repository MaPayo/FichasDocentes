<?php
namespace es\ucm;

require_once('includes/Negocio/HorarioClase/SAModHorarioClase.php');
require_once('includes/Negocio/HorarioClase/HorarioClase.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModHorarioClaseImplements implements SAModHorarioClase{

    private static $DAOModHorarioClase;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase=$factoriesDAO->createDAOModHorarioClase(); 
    }
    
    
    public static function findModHorarioClase($idGrupoClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase=$factoriesDAO->createDAOModHorarioClase(); 
        $horarioClase=$DAOModHorarioClase->findModHorarioClase($idGrupoClase);
        return $horarioClase;
    }

    public static function createModHorarioClase($horarioClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase=$factoriesDAO->createDAOModHorarioClase(); 
        $horarioClase=$DAOModHorarioClase->createModHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function updateModHorarioClase($horarioClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase=$factoriesDAO->createDAOModHorarioClase(); 
        $horarioClase=$DAOModHorarioClase->updateModHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function deleteModHorarioClase($idGrupoClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioClase=$factoriesDAO->createDAOModHorarioClase(); 
        $horarioClase=$DAOModHorarioClase->deleteModHorarioClase($idGrupoClase);
        return $horarioClase;
    }

}