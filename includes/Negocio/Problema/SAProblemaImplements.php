<?php

namespace es\ucm;

class SAProblemaImplements implements SAProblema{

    private static $DAOProblema;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProblema=$factoriesDAO->createDAOProblema(); 
    }
    
    
    public static function findProblema($idAsignatura){
        $problema=$DAOProblema->findProblema($idAsignatura);
        return $problema;
    }

    public static function createProblema($creditos,$presencial,$idAsignatura){
        $problema=new \es\ucm\Problema($creditos,$presencial,$idAsignatura);
        $problema=$DAOProblema->createProblema($problema);
        return $problema;
    }

    public static function updateProblema($creditos,$presencial,$idAsignatura){
        $problema=new \es\ucm\Problema($creditos,$presencial,$idAsignatura);
        $problema=$DAOProblema->updateProblema($problema);
        return $problema;
    }

    public static function deleteProblema($idAsignatura){
        $problema=$DAOProblema->deleteProblema($idAsignatura,$emailProfesor);
        return $problema;
    }

}