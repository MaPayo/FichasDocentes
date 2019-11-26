<?php

namespace es\ucm;

class SAMetodologiaImplements implements SAMetodologia{

    private static $DAOMetodologia;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia=$factoriesDAO->createDAOMetodologia(); 
    }
    
    
    public static function findMetodologia($idAsignatura){
        $metodologia=$DAOMetodologia->findMetodologia($idAsignatura);
        return $metodologia;
    }

    public static function createMetodologia($metodologia,$metodologiaI,$idAsignatura){
        $metodologia=new \es\ucm\Metodologia($metodologia,$metodologiaI,$idAsignatura);
        $metodologia=$DAOMetodologia->createMetodologia($metodologia);
        return $metodologia;
    }

    public static function updateMetodologia($metodologia,$metodologiaI,$idAsignatura){
        $metodologia=new \es\ucm\Metodologia($metodologia,$metodologiaI,$idAsignatura);
        $metodologia=$DAOMetodologia->updateMetodologia($metodologia);
        return $metodologia;
    }

    public static function deleteMetodologia($idAsignatura){
        $metodologia=$DAOMetodologia->deleteMetodologia($idAsignatura);
        return $metodologia;
    }

}