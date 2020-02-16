<?php

namespace es\ucm;
require_once('SAModMetodologia.php');

class SAModMetodologiaImplements implements SAModMetodologia{

    private static $DAOModMetodologia;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia=$factoriesDAO->createDAOModMetodologia(); 
    }
    
    
    public static function findModMetodologia($idAsignatura){
        $metodologia=$DAOModMetodologia->findModMetodologia($idAsignatura);
        return $metodologia;
    }

    public static function createModMetodologia($metodologia){
        $metodologia=$DAOModMetodologia->createModMetodologia($metodologia);
        return $metodologia;
    }

    public static function updateModMetodologia($metodologia){
        $metodologia=$DAOModMetodologia->updateModMetodologia($metodologia);
        return $metodologia;
    }

    public static function deleteModMetodologia($idAsignatura){
        $metodologia=$DAOModMetodologia->deleteModMetodologia($idAsignatura);
        return $metodologia;
    }

}