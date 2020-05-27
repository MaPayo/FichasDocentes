<?php
namespace es\ucm;
require_once('includes/Integracion/Bibliografia/DAOModBibliografia.php');

class DAOModBibliografiaImplements implements DAOModBibliografia{


    public static function findModBibliografia($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modbibliografia WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModBibliografia($modBibliografia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modbibliografia (IdBibliografia, CitasBibliograficas, RecursosInternet, IdModAsignatura) 
        VALUES (:idBibliografia, :citasBibliograficas, :recursosInternet, :idModAsignatura)";
        $values=array(':idBibliografia' => $modBibliografia->getIdBibliografia(),
            ':citasBibliograficas' => $modBibliografia->getCitasBibliograficas(),
            ':recursosInternet' => $modBibliografia->getRecursosInternet(),
            ':idModAsignatura' => $modBibliografia->getIdModAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateModBibliografia($modBibliografia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modbibliografia SET IdBibliografia = :idBibliografia, CitasBibliograficas = :citasBibliograficas, RecursosInternet = :recursosInternet, IdModAsignatura = :idModAsignatura WHERE IdBibliografia = :idBibliografia";
        $values=array(':idBibliografia' => $modBibliografia->getIdBibliografia(),
            ':citasBibliograficas' => $modBibliografia->getCitasBibliograficas(),
            ':recursosInternet' => $modBibliografia->getRecursosInternet(),
            ':idModAsignatura' => $modBibliografia->getIdModAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteModBibliografia($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modbibliografia WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}