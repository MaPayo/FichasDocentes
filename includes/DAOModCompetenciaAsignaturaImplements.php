<?php
namespace es\ucm;

class DAOModCompetenciaAsignaturaImplements implements DAOModCompetenciaAsignatura{
    
    
    public static function findModCompetenciaAsignatura($idCompetencia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modCompetenciaAsignatura WHERE IdCompetencia = :idCompetencia";
        $values=array(':idCompetencia' => $idCompetencia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModCompetenciaAsignatura($modCompetenciaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modCompetenciaAsignatura (IdCompetencia,Generales,GeneralesI,Especificas,EspecificasI,BasicasYTransversales,BasicasYTransversalesI,ResultadosAprendizaje,ResultadosAprendizajeI,IdModAsignatura) 
        VALUES (:idCompetencia, :generales, :generalesI, :especificas, :especificasI, :basicasYTransversales, :basicasYTransversalesI, :resultadosAprendizaje, :resultadosAprendizajeI, :idModAsignatura)";
        $values=array(':idCompetencia' => $modCompetenciaAsignatura->getIdCompetencia(),
        ':generales' => $modCompetenciaAsignatura->getGenerales(),
        ':generalesI' => $modCompetenciaAsignatura->getGeneralesI(),
        ':especificas' => $modCompetenciaAsignatura->getEspecificas(),
        ':especificasI' => $modCompetenciaAsignatura->getEspecificasI(),
        ':basicasYTransversales' => $modCompetenciaAsignatura->getCBasicasYTransversales(),
        ':basicasYTransversalesI' => $modCompetenciaAsignatura->getBasicasYTransversalesI(),
        ':resultadosAprendizaje' => $modCompetenciaAsignatura->getResultadosAprendizaje(),
        ':resultadosAprendizajeI' => $modCompetenciaAsignatura->getResultadosAprendizajeI(),
        ':idModAsignatura' => $modCompetenciaAsignatura->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModCompetenciaAsignatura($modCompetenciaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modCompetenciaAsignatura SET IdCompetencia = :idCompetencia, Generales = :generales, GeneralesI = :generalesI, Especificas = :especificas, EspecificasI = :especificasI, BasicasYTransversales = :basicasYTransversales, BasicasYTransversalesI = :basicasYTransversalesI, ResultadosAprendizaje = :resultadosAprendizaje, ResultadosAprendizajeI = :resultadosAprendizajeI, IdModAsignatura = :idModAsignatura WHERE IdCompetencia = :idCompetencia";
         $values=array(':idCompetencia' => $modCompetenciaAsignatura->getIdCompetencia(),
        ':generales' => $modCompetenciaAsignatura->getGenerales(),
        ':generalesI' => $modCompetenciaAsignatura->getGeneralesI(),
        ':especificas' => $modCompetenciaAsignatura->getEspecificas(),
        ':especificasI' => $modCompetenciaAsignatura->getEspecificasI(),
        ':basicasYTransversales' => $modCompetenciaAsignatura->getCBasicasYTransversales(),
        ':basicasYTransversalesI' => $modCompetenciaAsignatura->getBasicasYTransversalesI(),
        ':resultadosAprendizaje' => $modCompetenciaAsignatura->getResultadosAprendizaje(),
        ':resultadosAprendizajeI' => $modCompetenciaAsignatura->getResultadosAprendizajeI(),
        ':idModAsignatura' => $modCompetenciaAsignatura->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModCompetenciaAsignatura($idCompetencia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modCompetenciaAsignatura WHERE IdCompetencia = :idCompetencia";
        $values=array(':idCompetencia' => $idCompetencia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}