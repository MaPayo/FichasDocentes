<?php

namespace es\ucm;

require_once('includes/Negocio/HorarioLaboratorio/SAModHorarioLaboratorio.php');
require_once('includes/Negocio/HorarioLaboratorio/HorarioLaboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModHorarioLaboratorioImplements implements SAModHorarioLaboratorio{

    public static function findModHorarioLaboratorio($idGrupoLab){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio=$factoriesDAO->createDAOModHorarioLaboratorio(); 
        $horarioLaboratorio=$DAOModHorarioLaboratorio->findModHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

    public static function createModHorarioLaboratorio($horarioLaboratorio){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio=$factoriesDAO->createDAOModHorarioLaboratorio(); 
        $horarioLaboratorio=$DAOModHorarioLaboratorio->createModHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function updateModHorarioLaboratorio($horarioLaboratorio){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio=$factoriesDAO->createDAOModHorarioLaboratorio(); 
        $horarioLaboratorio=$DAOModHorarioLaboratorio->updateModHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function deleteModHorarioLaboratorio($idGrupoLab){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModHorarioLaboratorio=$factoriesDAO->createDAOModHorarioLaboratorio(); 
        $horarioLaboratorio=$DAOModHorarioLaboratorio->deleteModHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

}