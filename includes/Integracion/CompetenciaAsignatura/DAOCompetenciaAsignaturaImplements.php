<?php

namespace es\ucm;

require_once('includes/Integracion/CompetenciaAsignatura/DAOCompetenciaAsignatura.php');

class DAOCompetenciaAsignaturaImplements implements DAOCompetenciaAsignatura
{
    public static function findCompetenciaAsignatura($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM competenciaasignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createCompetenciaAsignatura($competenciaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO competenciaasignatura (IdCompetencia,Generales,Generalesi,Especificas,Especificasi,BasicasYTransversales,BasicasYTransversalesi,ResultadosAprendizaje,ResultadosAprendizajei,IdAsignatura) 
        VALUES (:idCompetencia, :generales, :generalesI, :especificas, :especificasI, :basicasYTransversales, :basicasYTransversalesI, :resultadosAprendizaje, :resultadosAprendizajeI, :idAsignatura)";
        $values = array(
            ':idCompetencia' => $competenciaAsignatura->getIdCompetencia(),
            ':generales' => $competenciaAsignatura->getGenerales(),
            ':generalesI' => $competenciaAsignatura->getGeneralesI(),
            ':especificas' => $competenciaAsignatura->getEspecificas(),
            ':especificasI' => $competenciaAsignatura->getEspecificasI(),
            ':basicasYTransversales' => $competenciaAsignatura->getCBasicasYTransversales(),
            ':basicasYTransversalesI' => $competenciaAsignatura->getBasicasYTransversalesI(),
            ':resultadosAprendizaje' => $competenciaAsignatura->getResultadosAprendizaje(),
            ':resultadosAprendizajeI' => $competenciaAsignatura->getResultadosAprendizajeI(),
            ':idAsignatura' => $competenciaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateCompetenciaAsignatura($competenciaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE competenciaasignatura SET IdCompetencia = :idCompetencia, Generales = :generales, Generalesi = :generalesI, Especificas = :especificas, Especificasi = :especificasI, BasicasYTransversales = :basicasYTransversales, BasicasYTransversalesi = :basicasYTransversalesI, ResultadosAprendizaje = :resultadosAprendizaje, ResultadosAprendizajei = :resultadosAprendizajeI, IdAsignatura = :idAsignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(
            ':idCompetencia' => $competenciaAsignatura->getIdCompetencia(),
            ':generales' => $competenciaAsignatura->getGenerales(),
            ':generalesI' => $competenciaAsignatura->getGeneralesI(),
            ':especificas' => $competenciaAsignatura->getEspecificas(),
            ':especificasI' => $competenciaAsignatura->getEspecificasI(),
            ':basicasYTransversales' => $competenciaAsignatura->getCBasicasYTransversales(),
            ':basicasYTransversalesI' => $competenciaAsignatura->getBasicasYTransversalesI(),
            ':resultadosAprendizaje' => $competenciaAsignatura->getResultadosAprendizaje(),
            ':resultadosAprendizajeI' => $competenciaAsignatura->getResultadosAprendizajeI(),
            ':idAsignatura' => $competenciaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteCompetenciaAsignatura($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM competenciaasignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
