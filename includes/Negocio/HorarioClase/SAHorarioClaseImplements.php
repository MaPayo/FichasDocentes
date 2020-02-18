<?php
namespace es\ucm;

require_once('includes/Negocio/HorarioClase/SAHorarioClase.php');
require_once('includes/Negocio/HorarioClase/HorarioClase.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAHorarioClaseImplements implements SAHorarioClase{
    
    public static function findHorarioClase($idGrupoClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase=$factoriesDAO->createDAOHorarioClase(); 
        $horarioClase=$DAOHorarioClase->findHorarioClase($idGrupoClase);
        return $horarioClase;
    }

    public static function createHorarioClase($horarioClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase=$factoriesDAO->createDAOHorarioClase(); 
        $horarioClase=$DAOHorarioClase->createHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function updateHorarioClase($horarioClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase=$factoriesDAO->createDAOHorarioClase(); 
        $horarioClase=$DAOHorarioClase->updateHorarioClase($horarioClase);
        return $horarioClase;
    }

    public static function deleteHorarioClase($idGrupoClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioClase=$factoriesDAO->createDAOHorarioClase(); 
        $horarioClase=$DAOHorarioClase->deleteHorarioClase($idGrupoClase);
        return $horarioClase;
    }

}