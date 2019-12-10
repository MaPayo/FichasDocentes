<?php
namespace es\ucm;

class DAOLeyendaImplements implements DAOLeyenda{


    public static function findLeyenda($idLeyenda){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM leyenda WHERE IdLeyenda = :idLeyenda";
        $values=array(':idLeyenda' => $idLeyenda);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createLeyenda($leyenda){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO leyenda (IdLeyenda,Lectura,Escritura,Confirm,EditPerm) 
        VALUES (:idLeyenda, :lectura, :escritura, :confirm, :editPerm)";
        $values=array(':idLeyenda' => $leyenda->getIdLeyenda(),
            ':lectura' => $leyenda->getLectura(),
            ':escritura' => $leyenda->getEscritura(),
            ':confirm' => $leyenda->getConfirm(),
            ':editPerm' => $leyenda->getEditPerm());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateLeyenda($leyenda){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE leyenda SET IdLeyenda = :idLeyenda, Lectura = :lectura,Escritura = :escritura,Confirm = :confirm,EditPerm = :editPerm WHERE IdLeyenda = :idLeyenda";
        $values=array(':idLeyenda' => $leyenda->getIdLeyenda(),
            ':lectura' => $leyenda->getLectura(),
            ':escritura' => $leyenda->getEscritura(),
            ':confirm' => $leyenda->getConfirm(),
            ':editPerm' => $leyenda->getEditPerm());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteLeyenda($idLeyenda){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM leyenda WHERE IdLeyenda = :idLeyenda";
        $values=array(':idLeyenda' => $idLeyenda);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}