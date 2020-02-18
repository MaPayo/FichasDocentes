<?php

namespace es\ucm;

require_once('includes/Negocio/Metodologia/SAMetodologia.php');
require_once('includes/Negocio/Metodologia/Metodologia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAMetodologiaImplements implements SAMetodologia{

    private static $DAOMetodologia;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia=$factoriesDAO->createDAOMetodologia(); 
    }
    
    
    public static function findMetodologia($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia=$factoriesDAO->createDAOMetodologia();
        $metodologia=$DAOMetodologia->findMetodologia($idAsignatura);
        return $metodologia;
    }

    public static function createMetodologia($metodologia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia=$factoriesDAO->createDAOMetodologia();
        $metodologia=$DAOMetodologia->createMetodologia($metodologia);
        return $metodologia;
    }

    public static function updateMetodologia($metodologia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia=$factoriesDAO->createDAOMetodologia();
        $metodologia=$DAOMetodologia->updateMetodologia($metodologia);
        return $metodologia;
    }

    public static function deleteMetodologia($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMetodologia=$factoriesDAO->createDAOMetodologia();
        $metodologia=$DAOMetodologia->deleteMetodologia($idAsignatura);
        return $metodologia;
    }

}