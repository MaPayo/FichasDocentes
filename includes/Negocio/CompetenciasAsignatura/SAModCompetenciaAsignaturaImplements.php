<?php

namespace es\ucm;

require_once('includes/Negocio/CompetenciasAsignatura/SAModCompetenciaAsignatura.php');
require_once('includes/Negocio/CompetenciasAsignatura/ModCompetenciaAsignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModCompetenciaAsignaturaImplements implements SAModCompetenciaAsignatura
{
    public static function findModCompetenciaAsignatura($idModAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura = $factoriesDAO->createDAOModCompetenciaAsignatura();
        $competenciaAsignatura = $DAOModCompetenciaAsignatura->findModCompetenciaAsignatura($idModAsignatura);
        if ($competenciaAsignatura && count($competenciaAsignatura) === 1) {
            $competenciaAsignatura = new ModCompetenciaAsignatura(
                $competenciaAsignatura[0]['IdCompetencia'],
                $competenciaAsignatura[0]['Generales'],
                $competenciaAsignatura[0]['Generalesi'],
                $competenciaAsignatura[0]['Especificas'],
                $competenciaAsignatura[0]['Especificasi'],
                $competenciaAsignatura[0]['BasicasYTransversales'],
                $competenciaAsignatura[0]['BasicasYTransversalesi'],
                $competenciaAsignatura[0]['ResultadosAprendizaje'],
                $competenciaAsignatura[0]['ResultadosAprendizajei'],
                $competenciaAsignatura[0]['IdModAsignatura']
            );
        }
        return $competenciaAsignatura;
    }

    public static function createModCompetenciaAsignatura($modCompetenciaAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura = $factoriesDAO->createDAOModCompetenciaAsignatura();
        $competenciaAsignatura = $DAOModCompetenciaAsignatura->createModCompetenciaAsignatura($modCompetenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function updateModCompetenciaAsignatura($modCompetenciaAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura = $factoriesDAO->createDAOModCompetenciaAsignatura();
        $competenciaAsignatura = $DAOModCompetenciaAsignatura->updateModCompetenciaAsignatura($modCompetenciaAsignatura);
        return $competenciaAsignatura;
    }

    public static function deleteModCompetenciaAsignatura($idModAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModCompetenciaAsignatura = $factoriesDAO->createDAOModCompetenciaAsignatura();
        $competenciaAsignatura = $DAOModCompetenciaAsignatura->deleteModCompetenciaAsignatura($idModAsignatura);
        return $competenciaAsignatura;
    }
}
