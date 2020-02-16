<?php

namespace es\ucm;
require_once('SAModProgramaAsignatura.php');

class SAModProgramaAsignaturaImplements implements SAModProgramaAsignatura{

    private static $DAOModProgramaAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura(); 
    }
    
    
    public static function findModProgramaAsignatura($idAsignatura){
        $programaAsignatura=$DAOModProgramaAsignatura->findModProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

    public static function createModProgramaAsignatura($programaAsignatura){
        $programaAsignatura=$DAOModProgramaAsignatura->createModProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function updateModProgramaAsignatura($programaAsignatura){
        $programaAsignatura=$DAOModProgramaAsignatura->updateModProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function deleteModProgramaAsignatura($idAsignatura){
        $programaAsignatura=$DAOModProgramaAsignatura->deleteModProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

}