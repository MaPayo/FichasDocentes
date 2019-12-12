<?php
namespace es\ucm;

class DAOModBibliografiaImplements implements DAOModBibliografia{


    public static function findModBibliografia($idBibliografia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modBibliografia WHERE IdBibliografia = :idBibliografia";
        $values=array(':idBibliografia' => $idBibliografia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModBibliografia($modBibliografia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modBibliografia (IdBibliografia, CitasBibliograficas, RecursosInternet, IdModAsignatura) 
        VALUES (:idBibliografia, :citasBibliograficas, :recursosInternet, :idModAsignatura)";
        $values=array(':idBibliografia' => $modBibliografia->getIdBibliografia(),
            ':citasBibliograficas' => $modBibliografia->getCitasBibliograficas(),
            ':recursosInternet' => $modBibliografia->getRecursosInternet(),
            ':idModAsignatura' => $modBibliografia->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModBibliografia($modBibliografia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE ModBibliografia SET IdBibliografia = :idBibliografia, CitasBibliograficas = :citasBibliograficas, RecursosInternet = :recursosInternet, IdModAsignatura = :idModAsignatura WHERE IdBibliografia = :idBibliografia";
        $values=array(':idBibliografia' => $modBibliografia->getIdBibliografia(),
            ':citasBibliograficas' => $modBibliografia->getCitasBibliograficas(),
            ':recursosInternet' => $modBibliografia->getRecursosInternet(),
            ':idModAsignatura' => $modBibliografia->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModBibliografia($idBibliografia){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modBibliografia WHERE IdBibliografia = :idBibliografia";
        $values=array(':idBibliografia' => $idBibliografia);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}