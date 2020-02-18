<?php
namespace es\ucm;
require_once('includes/Integracion/Asignatura/DAOModAsignatura.php');

class DAOModAsignaturaImplements implements DAOModAsignatura{


    public static function findModAsignatura($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modAsignatura WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModAsignatura($modAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modAsignatura (IdModAsignatura,FechaMod,EmailMod,IdAsignatura) 
        VALUES (:idModAsignatura, :fechaMod, :emailMod, :idAsignatura)";
        $values=array(':idModAsignatura' => $modAsignatura->getIdModAsignatura(),
            ':fechaMod' => $modAsignatura->getFechaMod(),
            ':emailMod' => $modAsignatura->getEmailMod(),
            ':idAsignatura' => $modAsignatura->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModAsignatura($modAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modAsignatura SET IdModAsignatura = :idModAsignatura, FechaMod = :fechaMod,EmailMod = :emailMod,IdAsignatura = :idAsignatura WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $modAsignatura->getIdModAsignatura(),
            ':fechaMod' => $modAsignatura->getFechaMod(),
            ':emailMod' => $modAsignatura->getEmailMod(),
            ':idAsignatura' => $modAsignatura->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModAsignatura($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modAsignatura WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}