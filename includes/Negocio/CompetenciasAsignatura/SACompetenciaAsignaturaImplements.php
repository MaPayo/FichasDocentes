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
        if ($competenciaAsignatura && count($competenciaAsignatura) === 1) {
            $competenciaAsignatura = new CompetenciaAsignatura(
                $competenciaAsignatura[0]['IdCompetencia'],
                $competenciaAsignatura[0]['Generales'],
                $competenciaAsignatura[0]['Generalesi'],
                $competenciaAsignatura[0]['Especificas'],
                $competenciaAsignatura[0]['Especificasi'],
                $competenciaAsignatura[0]['BasicasYTransversales'],
                $competenciaAsignatura[0]['BasicasYTransversalesi'],
                $competenciaAsignatura[0]['ResultadosAprendizaje'],
                $competenciaAsignatura[0]['ResultadosAprendizajei'],
                $competenciaAsignatura[0]['IdAsignatura']
            );
        }
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