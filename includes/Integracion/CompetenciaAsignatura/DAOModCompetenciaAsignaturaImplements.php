<?php

namespace es\ucm;

require_once('includes/Integracion/CompetenciaAsignatura/DAOModCompetenciaAsignatura.php');

class DAOModCompetenciaAsignaturaImplements implements DAOModCompetenciaAsignatura
{


    public static function findModCompetenciaAsignatura($idModAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modcompetenciaasignatura WHERE IdModAsignatura = :idModAsignatura";
        $values = array(':idModAsignatura' => $idModAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createModCompetenciaAsignatura($modCompetenciaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modcompetenciaasignatura (IdCompetencia,Generales,Generalesi,Especificas,Especificasi,BasicasYTransversales,BasicasYTransversalesi,ResultadosAprendizaje,ResultadosAprendizajei,IdModAsignatura) 
        VALUES (:idCompetencia, :generales, :generalesI, :especificas, :especificasI, :basicasYTransversales, :basicasYTransversalesI, :resultadosAprendizaje, :resultadosAprendizajeI, :idModAsignatura)";
        $values = array(
            ':idCompetencia' => $modCompetenciaAsignatura->getIdCompetencia(),
            ':generales' => $modCompetenciaAsignatura->getGenerales(),
            ':generalesI' => $modCompetenciaAsignatura->getGeneralesI(),
            ':especificas' => $modCompetenciaAsignatura->getEspecificas(),
            ':especificasI' => $modCompetenciaAsignatura->getEspecificasI(),
            ':basicasYTransversales' => $modCompetenciaAsignatura->getBasicasYTransversales(),
            ':basicasYTransversalesI' => $modCompetenciaAsignatura->getBasicasYTransversalesI(),
            ':resultadosAprendizaje' => $modCompetenciaAsignatura->getResultadosAprendizaje(),
            ':resultadosAprendizajeI' => $modCompetenciaAsignatura->getResultadosAprendizajeI(),
            ':idModAsignatura' => $modCompetenciaAsignatura->getIdModAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModCompetenciaAsignatura($modCompetenciaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modcompetenciaasignatura SET IdCompetencia = :idCompetencia, Generales = :generales, Generalesi = :generalesI, Especificas = :especificas, Especificasi = :especificasI, BasicasYTransversales = :basicasYTransversales, BasicasYTransversalesi = :basicasYTransversalesI, ResultadosAprendizaje = :resultadosAprendizaje, ResultadosAprendizajei = :resultadosAprendizajeI, IdModAsignatura = :idModAsignatura WHERE IdModAsignatura = :idModAsignatura";
        $values = array(
            ':idCompetencia' => $modCompetenciaAsignatura->getIdCompetencia(),
            ':generales' => $modCompetenciaAsignatura->getGenerales(),
            ':generalesI' => $modCompetenciaAsignatura->getGeneralesI(),
            ':especificas' => $modCompetenciaAsignatura->getEspecificas(),
            ':especificasI' => $modCompetenciaAsignatura->getEspecificasI(),
            ':basicasYTransversales' => $modCompetenciaAsignatura->getBasicasYTransversales(),
            ':basicasYTransversalesI' => $modCompetenciaAsignatura->getBasicasYTransversalesI(),
            ':resultadosAprendizaje' => $modCompetenciaAsignatura->getResultadosAprendizaje(),
            ':resultadosAprendizajeI' => $modCompetenciaAsignatura->getResultadosAprendizajeI(),
            ':idModAsignatura' => $modCompetenciaAsignatura->getIdModAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModCompetenciaAsignatura($idModAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modcompetenciaasignatura WHERE IdModAsignatura = :idModAsignatura";
        $values = array(':idModAsignatura' => $idModAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
