<?php

namespace es\ucm;

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

    public static function createCompetenciaAsignatura($generales,$generalesI,$especificas,$especificasI,$basicasYTransversales,$basicasYTransversalesI,$resultadosAprendizaje,$resultadosAprendizajeI,$idAsignatura){
        $competenciaAsignatura=new \es\ucm\CompetenciaAsignatura($generales,$generalesI,$especificas,$especificasI,$basicasYTransversales,$basicasYTransversalesI,$resultadosAprendizaje,$resultadosAprendizajeI,$idAsignatura);
        $competenciaAsignatura=$DAOCompetenciaAsignatura->createCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function updateCompetenciaAsignatura($generales,$generalesI,$especificas,$especificasI,$basicasYTransversales,$basicasYTransversalesI,$resultadosAprendizaje,$resultadosAprendizajeI,$idAsignatura){
        $competenciaAsignatura=new \es\ucm\CompetenciaAsignatura($generales,$generalesI,$especificas,$especificasI,$basicasYTransversales,$basicasYTransversalesI,$resultadosAprendizaje,$resultadosAprendizajeI,$idAsignatura);
        $competenciaAsignatura=$DAOCompetenciaAsignatura->updateCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function deleteCompetenciaAsignatura($idAsignatura){
        $competenciaAsignatura=$DAOCompetenciaAsignatura->deleteComptetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

}