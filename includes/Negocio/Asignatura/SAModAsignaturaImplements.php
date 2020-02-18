<?php

namespace es\ucm;

require_once('includes/Negocio/Asignatura/SAModAsignatura.php');
require_once('includes/Negocio/Asignatura/Asignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModAsignaturaImplements implements SAModAsignatura{

    private static $DAOModAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura=$factoriesDAO->createDAOModAsignatura(); 
    }
    
    
    public static function findModAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura=$factoriesDAO->createDAOModAsignatura(); 
        $modAsignatura=$DAOModAsignatura->findModAsignatura($idAsignatura);
        return $modAsignatura;
    }

    public static function createModAsignatura($asignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura=$factoriesDAO->createDAOModAsignatura(); 
        $asignatura=$DAOModAsignatura->createModAsignatura($asignatura);
        return $asignatura;
    }

    public static function updateModAsignatura($asignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura=$factoriesDAO->createDAOModAsignatura(); 
        $asignatura=$DAOModAsignatura->updateModAsignatura($asignatura);
        return $asignatura;
    }

    public static function deleteModAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModAsignatura=$factoriesDAO->createDAOModAsignatura(); 
        $modAsignatura=$DAOModAsignatura->deleteModAsignatura($idAsignatura);
        return $modAsignatura;
    }

}