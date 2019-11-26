<?php

namespace es\ucm;

class SALaboratorioImplements implements SALaboratorio{

    private static $DAOLaboratorio;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOLaboratorio=$factoriesDAO->createDAOLaboratorio(); 
    }
    
    
    public static function findLaboratorio($idAsignatura){
        $laboratorio=$DAOLaboratorio->findLaboratorio($idAsignatura);
        return $laboratorio;
    }

    public static function createLaboratorio($creditos,$presencial,$idAsignatura){
        $laboratorio=new \es\ucm\Laboratorio($creditos,$presencial,$idAsignatura);
        $laboratorio=$DAOLaboratorio->createLaboratorio($laboratorio);
        return $laboratorio;
    }

    public static function updateLaboratorio($creditos,$presencial,$idAsignatura){
        $laboratorio=new \es\ucm\Laboratorio($creditos,$presencial,$idAsignatura);
        $laboratorio=$DAOLaboratorio->updateLaboratorio($laboratorio);
        return $laboratorio;
    }

    public static function deleteLaboratorio($idAsignatura){
        $laboratorio=$DAOLaboratorio->deleteLaboratorio($idAsignatura);
        return $laboratorio;
    }

}