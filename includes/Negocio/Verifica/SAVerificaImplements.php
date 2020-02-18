<?php

namespace es\ucm;

require_once('includes/Negocio/Verifica/SAVerifica.php');
require_once('includes/Negocio/Verifica/Verifica.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAVerificaImplements implements SAVerifica{

    public static function findVerifica($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica=$factoriesDAO->createDAOVerifica();
        $verifica=$DAOVerifica->findVerifica($idAsignatura);
        return $verifica;
    }

    public static function createVerifica($verifica){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica=$factoriesDAO->createDAOVerifica();
        $verifica=$DAOVerifica->createVerifica($verifica);
        return $verifica;
    }

    public static function updateVerifica($verifica){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica=$factoriesDAO->createDAOVerifica();
        $verifica=$DAOVerifica->updateVerifica($verifica);
        return $verifica;
    }

    public static function deleteVerifica($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica=$factoriesDAO->createDAOVerifica();
        $verifica=$DAOVerifica->deleteVerifica($idAsignatura);
        return $verifica;
    }

}