<?php

namespace es\ucm;
require_once('includes/Negocio/Problema/SAProblema.php');
require_once('includes/Negocio/Problema/Problema.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAProblemaImplements implements SAProblema{
    
    public static function findProblema($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProblema=$factoriesDAO->createDAOProblema(); 
        $problema=$DAOProblema->findProblema($idAsignatura);
        if($problema && count($problema)===1){
            $problema=new Problema($problema[0]['IdProblema'],
            $problema[0]['Creditos'],
            $problema[0]['Presencial'],
            $problema[0]['IdAsignatura']);
        }
        return $problema;
    }

    public static function createProblema($problema){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProblema=$factoriesDAO->createDAOProblema(); 
        $problema=$DAOProblema->createProblema($problema);
        return $problema;
    }

    public static function updateProblema($problema){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProblema=$factoriesDAO->createDAOProblema(); 
        $problema=$DAOProblema->updateProblema($problema);
        return $problema;
    }

    public static function deleteProblema($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProblema=$factoriesDAO->createDAOProblema(); 
        $problema=$DAOProblema->deleteProblema($idAsignatura);
        return $problema;
    }

}