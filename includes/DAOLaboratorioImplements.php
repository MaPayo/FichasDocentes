<?php
namespace es\ucm;

class DAOLaboratorioImplements implements DAOLaboratorio{


    public static function findLaboratorio($idLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM laboratorio WHERE IdLaboratorio = :idLaboratorio";
        $values=array(':idLaboratorio' => $idLaboratorio);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createLaboratorio($laboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO laboratorio (IdLaboratorio,Creditos,Presencial,IdAsignatura) 
        VALUES (:idLaboratorio, :creditos, :presencial, :idAsignatura)";
        $values=array(':idLaboratorio' => $laboratorio->getIdLaboratorio(),
            ':creditos' => $laboratorio->getCreditos(),
            ':presencial' => $laboratorio->getPresencial(),
            ':idAsignatura' => $laboratorio->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateLaboratorio($laboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE laboratorio SET IdLaboratorio = :idLaboratorio, Creditos = :creditos,Presencial = :presencial,IdAsignatura = :idAsignatura WHERE IdLaboratorio = :idLaboratorio";
        $values=array(':idLaboratorio' => $laboratorio->getIdLaboratorio(),
            ':creditos' => $laboratorio->getCreditos(),
            ':presencial' => $laboratorio->getPresencial(),
            ':idAsignatura' => $laboratorio->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteLaboratorio($idLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM laboratorio WHERE IdLaboratorio = :idLaboratorio";
        $values=array(':idLaboratorio' => $idLaboratorio);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}