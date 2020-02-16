<?php

namespace es\ucm;
require_once('SAGrado.php');

class SAGradoImplements implements SAGrado{

    private static $DAOGrado;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOGrado=$factoriesDAO->createDAOGrado(); 
    }
    
    
    public static function findGrado($codigoGrado){
        $grado=$DAOGrado->findGrado($codigoGrado);
        return $grado;
    }

    public static function createGrado($grado){
        $grado=$DAOGrado->createGrado($grado);
        return $grado;
    }

    public static function updateGrado($grado){
        $grado=$DAOGrado->updateGrado($grado);
        return $grado;
    }

    public static function deleteGrado($codigoGrado){
        $grado=$DAOGrado->deleteGrado($codigoGrado);
        return $grado;
    }

}