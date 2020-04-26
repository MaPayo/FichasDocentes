<?php
namespace es\ucm;
require_once('includes/Integracion/Metodologia/DAOModMetodologia.php');

class DAOModMetodologiaImplements implements DAOModMetodologia{


    public static function findModMetodologia($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modMetodologia WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModMetodologia($modMetodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modMetodologia (IdMetodologia,Metodologia,MetodologiaI,IdModAsignatura) 
        VALUES (:idMetodologia, :Metodologia, :MetodologiaI, :idModAsignatura)";
        $values=array(':idMetodologia' => $modMetodologia->getIdMetodologia(),
            ':Metodologia' => $modMetodologia->getMetodologia(),
            ':MetodologiaI' => $modMetodologia->getMetodologiaI(),
            ':idModAsignatura' => $modMetodologia->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateModMetodologia($modMetodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modMetodologia SET IdMetodologia = :idMetodologia, Metodologia = :Metodologia,MetodologiaI = :MetodologiaI,IdModAsignatura = :idModAsignatura WHERE IdMetodologia = :idMetodologia";
        $values=array(':idMetodologia' => $modMetodologia->getIdMetodologia(),
            ':Metodologia' => $modMetodologia->getMetodologia(),
            ':MetodologiaI' => $modMetodologia->getMetodologiaI(),
            ':idModAsignatura' => $modMetodologia->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteModMetodologia($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modMetodologia WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}