<?php

namespace es\ucm;

require_once('includes/Negocio/CompetenciaAsignatura/SAModCompetenciaAsignatura.php');
require_once('includes/Negocio/CompetenciaAsignatura/CompetenciaAsignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModCompetenciaAsignaturaImplements implements SAModCompetenciaAsignatura{

    private static $DAOModCompetenciaAsignatura;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura=$factoriesDAO->createDAOModCompetenciaAsignatura(); 
    }
    
    
    public static function findModCompetenciaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura=$factoriesDAO->createDAOModCompetenciaAsignatura();
        $competenciaAsignatura=$DAOModCompetenciaAsignatura->findModCompetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

    public static function createCompetenciaAsignatura($competenciaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura=$factoriesDAO->createDAOModCompetenciaAsignatura();
        $competenciaAsignatura=$DAOModCompetenciaAsignatura->createModCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function updateModCompetenciaAsignatura($competenciaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura=$factoriesDAO->createDAOModCompetenciaAsignatura();
        $competenciaAsignatura=$DAOModCompetenciaAsignatura->updateModCompetenciaAsignatura($competenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function deleteModCompetenciaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura=$factoriesDAO->createDAOModCompetenciaAsignatura();
        $competenciaAsignatura=$DAOModCompetenciaAsignatura->deleteModCompetenciaAsignatura($idAsignatura);
        return $competenciaAsignatura;
    }

}