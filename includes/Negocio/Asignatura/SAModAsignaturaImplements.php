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

    public static function createModAsignatura($idModAsignatura,$fechaMod,$emailMod,$idAsignatura){
        $modAsignatura=new \es\ucm\ModAsignatura($idModAsignatura,$fechaMod,$emailMod,$idAsignatura);
        $modAsignatura=$DAOModAsignatura->createModAsignatura($modAsignatura);
        return $modAsignatura;
    }

    public static function updateModAsignatura($idModAsignatura,$fechaMod,$emailMod,$idAsignatura){
        $modAsignatura=new \es\ucm\ModAsignatura($idModAsignatura,$fechaMod,$emailMod,$idAsignatura);
        $modAsignatura=$DAOModAsignatura->updateModAsignatura($modAsignatura);
        return $modAsignatura;
    }

    public static function deleteModAsignatura($idAsignatura){
        $modAsignatura=$DAOModAsignatura->deleteModAsignatura($idAsignatura);
        return $modAsignatura;
    }

}