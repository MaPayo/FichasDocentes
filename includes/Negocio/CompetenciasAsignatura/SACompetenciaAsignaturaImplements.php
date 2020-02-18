<?php

namespace es\ucm;
require_once('includes/Negocio/CompetenciasAsignatura/SACompetenciaAsignatura.php');
require_once('includes/Negocio/CompetenciasAsignatura/CompetenciaAsignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SACompetenciaAsignaturaImplements implements SACompetenciaAsignatura{

    public static function findCompetenciaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOCompetenciaAsignatura=$factoriesDAO->createDAOCompetenciaAsignatura(); 
        $competenciaAsignatura=$DAOCompetenciaAsignatura->findCompetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

    public static function createCompetenciaAsignatura($competenciaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOCompetenciaAsignatura=$factoriesDAO->createDAOCompetenciaAsignatura(); 
        $competenciaAsignatura=$DAOCompetenciaAsignatura->createCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function updateCompetenciaAsignatura($competenciaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOCompetenciaAsignatura=$factoriesDAO->createDAOCompetenciaAsignatura(); 
        $competenciaAsignatura=$DAOCompetenciaAsignatura->updateCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function deleteCompetenciaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOCompetenciaAsignatura=$factoriesDAO->createDAOCompetenciaAsignatura(); 
        $competenciaAsignatura=$DAOCompetenciaAsignatura->deleteCompetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

}