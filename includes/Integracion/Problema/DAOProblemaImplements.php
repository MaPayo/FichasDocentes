<?php
namespace es\ucm;
require_once('includes/Integracion/Problema/DAOProblema.php');

class DAOProblemaImplements implements DAOProblema{


    public static function findProblema($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM problema WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createProblema($problema){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO problema (IdProblema,Creditos,Presencial,IdAsignatura) 
        VALUES (:idProblema, :creditos, :presencial, :idAsignatura)";
        $values=array(':idProblema' => $problema->getIdProblema(),
            ':creditos' => $problema->getCreditos(),
            ':presencial' => $problema->getPresencial(),
            ':idAsignatura' => $problema->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateProblema($problema){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE problema SET IdProblema = :idProblema, Creditos = :creditos,Presencial = :presencial,IdAsignatura = :idAsignatura WHERE IdProblema = :idProblema";
        $values=array(':idProblema' => $problema->getIdProblema(),
            ':creditos' => $problema->getCreditos(),
            ':presencial' => $problema->getPresencial(),
            ':idAsignatura' => $problema->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteProblema($idProblema){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM problema WHERE IdProblema = :idProblema";
        $values=array(':idProblema' => $idProblema);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}