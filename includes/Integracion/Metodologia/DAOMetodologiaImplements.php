<?php
namespace es\ucm;
require_once('includes/Integracion/Metodologia/DAOMetodologia.php');

class DAOMetodologiaImplements implements DAOMetodologia{


    public static function findMetodologia($idMetodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM metodologia WHERE IdMetodologia = :idMetodologia";
        $values=array(':idMetodologia' => $idMetodologia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createMetodologia($metodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO metodologia (IdMetodologia,Metodologia,MetodologiaI,IdAsignatura) 
        VALUES (:idMetodologia, :metodologia, :metodologiaI, :idAsignatura)";
        $values=array(':idMetodologia' => $metodologia->getIdMetodologia(),
            ':metodologia' => $metodologia->getMetodologia(),
            ':metodologiaI' => $metodologia->getMetodologiaI(),
            ':idAsignatura' => $metodologia->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateMetodologia($metodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE metodologia SET IdMetodologia = :idMetodologia, Metodologia = :metodologia,MetodologiaI = :metodologiaI,IdAsignatura = :idAsignatura WHERE IdMetodologia = :idMetodologia";
        $values=array(':idMetodologia' => $metodologia->getIdMetodologia(),
            ':metodologia' => $metodologia->getMetodologia(),
            ':metodologiaI' => $metodologia->getMetodologiaI(),
            ':idAsignatura' => $metodologia->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteMetodologia($idMetodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM metodologia WHERE IdMetodologia = :idMetodologia";
        $values=array(':idMetodologia' => $idMetodologia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}