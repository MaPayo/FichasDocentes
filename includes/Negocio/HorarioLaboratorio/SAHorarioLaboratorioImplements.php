<?php

namespace es\ucm;

require_once('includes/Negocio/HorarioLaboratorio/SAHorarioLaboratorio.php');
require_once('includes/Negocio/HorarioLaboratorio/HorarioLaboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAHorarioLaboratorioImplements implements SAHorarioLaboratorio{

    public static function findHorarioLaboratorio($idGrupoLab){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio=$factoriesDAO->createDAOHorarioLaboratorio(); 
        $horarioLaboratorio=$DAOHorarioLaboratorio->findHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

    public static function createHorarioLaboratorio($horarioLaboratorio){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio=$factoriesDAO->createDAOHorarioLaboratorio(); 
        $horarioLaboratorio=$DAOHorarioLaboratorio->createHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function updateHorarioLaboratorio($horarioLaboratorio){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio=$factoriesDAO->createDAOHorarioLaboratorio(); 
        $horarioLaboratorio=$DAOHorarioLaboratorio->updateHorarioLaboratorio($horarioLaboratorio);
        return $horarioLaboratorio;
    }

    public static function deleteHorarioLaboratorio($idGrupoLab){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOHorarioLaboratorio=$factoriesDAO->createDAOHorarioLaboratorio(); 
        $horarioLaboratorio=$DAOHorarioLaboratorio->deleteHorarioLaboratorio($idGrupoLab);
        return $horarioLaboratorio;
    }

}