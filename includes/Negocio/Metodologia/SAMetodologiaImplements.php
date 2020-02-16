<?php

namespace es\ucm;
require_once('SAMetodologia.php');

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

    public static function createMetodologia($metodologia){
        $metodologia=$DAOMetodologia->createMetodologia($metodologia);
        return $metodologia;
    }

    public static function updateMetodologia($metodologia){
        $metodologia=$DAOMetodologia->updateMetodologia($metodologia);
        return $metodologia;
    }

    public static function deleteMetodologia($idAsignatura){
        $metodologia=$DAOMetodologia->deleteMetodologia($idAsignatura);
        return $metodologia;
    }

}