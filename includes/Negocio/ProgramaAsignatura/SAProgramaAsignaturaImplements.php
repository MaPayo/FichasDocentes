<?php

namespace es\ucm;

class SAProgramaAsignaturaImplements implements SAProgramaAsignatura{

    private static $DAOProgramaAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura(); 
    }
    
    
    public static function findProgramaAsignatura($idAsignatura){
        $programaAsignatura=$DAOProgramaAsignatura->findProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

    public static function createProgramaAsignatura($programaAsignatura){
        $programaAsignatura=$DAOProgramaAsignatura->createProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function updateProgramaAsignatura($programaAsignatura){
        $programaAsignatura=$DAOProgramaAsignatura->updateProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function deleteProgramaAsignatura($idAsignatura){
        $programaAsignatura=$DAOProgramaAsignatura->deleteProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

}