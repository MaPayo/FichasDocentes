<?php

namespace es\ucm;

require_once('includes/Negocio/ProgramaAsignatura/SAModProgramaAsignatura.php');
require_once('includes/Negocio/ProgramaAsignatura/ProgramaAsignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModProgramaAsignaturaImplements implements SAModProgramaAsignatura{
    
    public static function findModProgramaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura();
        $programaAsignatura=$DAOModProgramaAsignatura->findModProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

    public static function createModProgramaAsignatura($programaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura();
        $programaAsignatura=$DAOModProgramaAsignatura->createModProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function updateModProgramaAsignatura($programaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura();
        $programaAsignatura=$DAOModProgramaAsignatura->updateModProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function deleteModProgramaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura();
        $programaAsignatura=$DAOModProgramaAsignatura->deleteModProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

}