<?php

namespace es\ucm;

require_once('includes/Negocio/ProgramaAsignatura/SAProgramaAsignatura.php');
require_once('includes/Negocio/ProgramaAsignatura/ProgramaAsignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAProgramaAsignaturaImplements implements SAProgramaAsignatura{

    private static $DAOProgramaAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura(); 
    }
    
    
    public static function findProgramaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura();
        $programaAsignatura=$DAOProgramaAsignatura->findProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

    public static function createProgramaAsignatura($programaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura();
        $programaAsignatura=$DAOProgramaAsignatura->createProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function updateProgramaAsignatura($programaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura();
        $programaAsignatura=$DAOProgramaAsignatura->updateProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function deleteProgramaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura();
        $programaAsignatura=$DAOProgramaAsignatura->deleteProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

}