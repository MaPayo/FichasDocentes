<?php
namespace es\ucm;

class SAAsignaturaImplements implements SAAsignatura{

    private static $DAOAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOAsignatura=$factoriesDAO->createDAOAsignatura(); 
    }
    
    
    public static function findAsignatura($idAsignatura){
        $asignatura=$DAOAsignatura->findAsignatura($idAsignatura);
        return $asignatura;
    }

    public static function createAsignatura($asignatura){
         $asignatura=$DAOAsignatura->createAsignatura($asignatura);
        return $asignatura;
    }

    public static function updateAsignatura($asignatura){
        $asignatura=$DAOAsignatura->createAsignatura($asignatura);
        return $asignatura;
    }

    public static function deleteAsignatura($idAsignatura){
        $asignatura=$DAOAsignatura->deleteAsignatura($idAsignatura);
        return $asignatura;
    }

}