<?php

namespace es\ucm;

class SAModCompetenciaAsignaturaImplements implements SAModCompetenciaAsignatura{

    private static $DAOModCompetenciaAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura=$factoriesDAO->createDAOModCompetenciaAsignatura(); 
    }
    
    
    public static function findModCompetenciaAsignatura($idAsignatura){
        $competenciaAsignatura=$DAOModCompetenciaAsignatura->findModCompetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

    public static function createCompetenciaAsignatura($competenciaAsignatura){
        $competenciaAsignatura=$DAOModCompetenciaAsignatura->createModCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function updateModCompetenciaAsignatura($competenciaAsignatura){
        $competenciaAsignatura=$DAOModCompetenciaAsignatura->updateModCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function deleteModCompetenciaAsignatura($idAsignatura){
        $competenciaAsignatura=$DAOModCompetenciaAsignatura->deleteModComptetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

}