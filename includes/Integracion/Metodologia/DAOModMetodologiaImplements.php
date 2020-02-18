<?php
namespace es\ucm;
require_once('includes/Integracion/Metodologia/DAOModMetodologia.php');

class DAOModMetodologiaImplements implements DAOModMetodologia{


    public static function findModMetodologia($idMetodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modMetodologia WHERE IdMetodologia = :idMetodologia";
        $values=array(':idMetodologia' => $idMetodologia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModMetodologia($modMetodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modMetodologia (IdMetodologia,ModMetodologia,ModMetodologiaI,IdModAsignatura) 
        VALUES (:idMetodologia, :modMetodologia, :modMetodologiaI, :idModAsignatura)";
        $values=array(':idMetodologia' => $modMetodologia->getIdMetodologia(),
            ':modMetodologia' => $modMetodologia->getModMetodologia(),
            ':modMetodologiaI' => $modMetodologia->getModMetodologiaI(),
            ':idModAsignatura' => $modMetodologia->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModMetodologia($modMetodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modMetodologia SET IdMetodologia = :idMetodologia, ModMetodologia = :modMetodologia,ModMetodologiaI = :modMetodologiaI,IdModAsignatura = :idModAsignatura WHERE IdMetodologia = :idMetodologia";
        $values=array(':idMetodologia' => $modMetodologia->getIdMetodologia(),
            ':modMetodologia' => $modMetodologia->getModMetodologia(),
            ':modMetodologiaI' => $modMetodologia->getModMetodologiaI(),
            ':idModAsignatura' => $modMetodologia->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModMetodologia($idMetodologia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modMetodologia WHERE IdMetodologia = :idMetodologia";
        $values=array(':idMetodologia' => $idMetodologia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}