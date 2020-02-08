<?php

namespace es\ucm;

class SAVerificaImplements implements SAVerifica{

    private static $DAOVerifica;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica=$factoriesDAO->createDAOVerifica(); 
    }
    
    public static function findVerifica($idAsignatura){
        $verifica=$DAOVerifica->findVerifica($idAsignatura);
        return $verifica;
    }

    public static function createVerifica($verifica){
        $verifica=$DAOVerifica->createVerifica($verifica);
        return $verifica;
    }

    public static function updateVerifica($verifica){
        $verifica=$DAOVerifica->updateVerifica($verifica);
        return $verifica;
    }

    public static function deleteVerifica($idAsignatura){
        $verifica=$DAOVerifica->deleteVerifica($idAsignatura);
        return $verifica;
    }

}