<?php

namespace es\ucm;

class SAModAsignaturaImplements implements SAModAsignatura{

    private static $DAOModAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura=$factoriesDAO->createDAOModAsignatura(); 
    }
    
    
    public static function findModAsignatura($idAsignatura){
        $modAsignatura=$DAOModAsignatura->findModAsignatura($idAsignatura);
        return $modAsignatura;
    }

    public static function createModAsignatura($asignatura){
        $asignatura=$DAOModAsignatura->createModAsignatura($asignatura);
        return $asignatura;
    }

    public static function updateModAsignatura($asignatura){
        $asignatura=$DAOModAsignatura->updateModAsignatura($asignatura);
        return $asignatura;
    }

    public static function deleteModAsignatura($idAsignatura){
        $modAsignatura=$DAOModAsignatura->deleteModAsignatura($idAsignatura);
        return $modAsignatura;
    }

}