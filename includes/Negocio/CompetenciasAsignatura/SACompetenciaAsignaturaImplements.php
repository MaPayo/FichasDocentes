<?php

namespace es\ucm;
require_once('SACompetenciaAsignatura.php');

class SACompetenciaAsignaturaImplements implements SACompetenciaAsignatura{

    private static $DAOCompetenciaAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOCompetenciaAsignatura=$factoriesDAO->createDAOCompetenciaAsignatura(); 
    }
    
    
    public static function findCompetenciaAsignatura($idAsignatura){
        $competenciaAsignatura=$DAOCompetenciaAsignatura->findCompetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

    public static function createCompetenciaAsignatura($competenciaAsignatura){
        $competenciaAsignatura=$DAOCompetenciaAsignatura->createCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function updateCompetenciaAsignatura($competenciaAsignatura){
        $competenciaAsignatura=$DAOCompetenciaAsignatura->updateCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function deleteCompetenciaAsignatura($idAsignatura){
        $competenciaAsignatura=$DAOCompetenciaAsignatura->deleteComptetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

}