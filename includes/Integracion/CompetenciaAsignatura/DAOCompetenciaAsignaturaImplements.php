<?php
namespace es\ucm;
require_once('includes/Integracion/CompetenciaAsignatura/DAOCompetenciaAsignatura.php');

class DAOCompetenciaAsignaturaImplements implements DAOCompetenciaAsignatura{
    
    
    public static function findCompetenciaAsignatura($idCompetencia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM competenciaAsignatura WHERE IdCompetencia = :idCompetencia";
        $values=array(':idCompetencia' => $idCompetencia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createCompetenciaAsignatura($competenciaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO competenciaAsignatura (IdCompetencia,Generales,GeneralesI,Especificas,EspecificasI,BasicasYTransversales,BasicasYTransversalesI,ResultadosAprendizaje,ResultadosAprendizajeI,IdAsignatura) 
        VALUES (:idCompetencia, :generales, :generalesI, :especificas, :especificasI, :basicasYTransversales, :basicasYTransversalesI, :resultadosAprendizaje, :resultadosAprendizajeI, :idAsignatura)";
        $values=array(':idCompetencia' => $competenciaAsignatura->getIdCompetencia(),
        ':generales' => $competenciaAsignatura->getGenerales(),
        ':generalesI' => $competenciaAsignatura->getGeneralesI(),
        ':especificas' => $competenciaAsignatura->getEspecificas(),
        ':especificasI' => $competenciaAsignatura->getEspecificasI(),
        ':basicasYTransversales' => $competenciaAsignatura->getCBasicasYTransversales(),
        ':basicasYTransversalesI' => $competenciaAsignatura->getBasicasYTransversalesI(),
        ':resultadosAprendizaje' => $competenciaAsignatura->getResultadosAprendizaje(),
        ':resultadosAprendizajeI' => $competenciaAsignatura->getResultadosAprendizajeI(),
        ':idAsignatura' => $competenciaAsignatura->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateCompetenciaAsignatura($competenciaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE competenciaAsignatura SET IdCompetencia = :idCompetencia, Generales = :generales, GeneralesI = :generalesI, Especificas = :especificas, EspecificasI = :especificasI, BasicasYTransversales = :basicasYTransversales, BasicasYTransversalesI = :basicasYTransversalesI, ResultadosAprendizaje = :resultadosAprendizaje, ResultadosAprendizajeI = :resultadosAprendizajeI, IdAsignatura = :idAsignatura WHERE IdCompetencia = :idCompetencia";
         $values=array(':idCompetencia' => $competenciaAsignatura->getIdCompetencia(),
        ':generales' => $competenciaAsignatura->getGenerales(),
        ':generalesI' => $competenciaAsignatura->getGeneralesI(),
        ':especificas' => $competenciaAsignatura->getEspecificas(),
        ':especificasI' => $competenciaAsignatura->getEspecificasI(),
        ':basicasYTransversales' => $competenciaAsignatura->getCBasicasYTransversales(),
        ':basicasYTransversalesI' => $competenciaAsignatura->getBasicasYTransversalesI(),
        ':resultadosAprendizaje' => $competenciaAsignatura->getResultadosAprendizaje(),
        ':resultadosAprendizajeI' => $competenciaAsignatura->getResultadosAprendizajeI(),
        ':idAsignatura' => $competenciaAsignatura->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteCompetenciaAsignatura($idCompetencia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM competenciaAsignatura WHERE IdCompetencia = :idCompetencia";
        $values=array(':idCompetencia' => $idCompetencia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}