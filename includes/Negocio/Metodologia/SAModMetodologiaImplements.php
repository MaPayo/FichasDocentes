<?php

namespace es\ucm;

require_once('includes/Negocio/Metodologia/SAModMetodologia.php');
require_once('includes/Negocio/Metodologia/Metodologia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModMetodologiaImplements implements SAModMetodologia{
    
    public static function findModMetodologia($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia=$factoriesDAO->createDAOModMetodologia(); 
        $metodologia=$DAOModMetodologia->findModMetodologia($idAsignatura);
        return $metodologia;
    }

    public static function createModMetodologia($metodologia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia=$factoriesDAO->createDAOModMetodologia(); 
        $metodologia=$DAOModMetodologia->createModMetodologia($metodologia);
        return $metodologia;
    }

    public static function updateModMetodologia($metodologia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia=$factoriesDAO->createDAOModMetodologia(); 
        $metodologia=$DAOModMetodologia->updateModMetodologia($metodologia);
        return $metodologia;
    }

    public static function deleteModMetodologia($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModMetodologia=$factoriesDAO->createDAOModMetodologia(); 
        $metodologia=$DAOModMetodologia->deleteModMetodologia($idAsignatura);
        return $metodologia;
    }

}