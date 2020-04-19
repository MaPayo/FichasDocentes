<?php
namespace es\ucm;
require_once('includes/Integracion/Bibliografia/DAOBibliografia.php');

class DAOBibliografiaImplements implements DAOBibliografia{


    public static function findBibliografia($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM bibliografia WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createBibliografia($bibliografia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO bibliografia (IdBibliografia, CitasBibliograficas, RecursosInternet, IdAsignatura) 
        VALUES (:idBibliografia, :citasBibliograficas, :recursosInternet, :idAsignatura)";
        $values=array(':idBibliografia' => $bibliografia->getIdBibliografia(),
            ':citasBibliograficas' => $bibliografia->getCitasBibliograficas(),
            ':recursosInternet' => $bibliografia->getRecursosInternet(),
            ':idAsignatura' => $bibliografia->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateBibliografia($bibliografia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE Bibliografia SET IdBibliografia = :idBibliografia, CitasBibliograficas = :citasBibliograficas, RecursosInternet = :recursosInternet, IdAsignatura = :idAsignatura WHERE IdBibliografia = :idBibliografia";
        $values=array(':idBibliografia' => $bibliografia->getIdBibliografia(),
            ':citasBibliograficas' => $bibliografia->getCitasBibliograficas(),
            ':recursosInternet' => $bibliografia->getRecursosInternet(),
            ':idAsignatura' => $bibliografia->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteBibliografia($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM bibliografia WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}