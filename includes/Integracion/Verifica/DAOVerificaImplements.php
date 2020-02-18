<?php
namespace es\ucm;
require_once('includes/Integracion/Verifica/DAOVerifica.php');

class DAOVerificaImplements implements DAOVerifica{


    public static function findVerifica($idVerifica){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM verifica WHERE IdVerifica = :idVerifica";
        $values=array(':idVerifica' => $idVerifica);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createVerifica($verifica){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO verifica (IdVerifica,MaximoExamenes,MinimoExamenes,MaximoActividades,MinimoActividades,MaximoLaboratorio,MinimoLaboratorio,IdAsignatura) 
        VALUES (:idVerifica, :maximoExamenes, :minimoExamenes, :maximoActividades, :minimoActividades, :maximoLaboratorio, :minimoLaboratorio, :idAsignatura)";
        $values=array(':idVerifica' => $verifica->getIdVerifica(),
            ':maximoExamenes' => $verifica->getMaximoExamenes(),
            ':minimoExamenes' => $verifica->getMinimoExamenes(),
            ':maximoActividades' => $verifica->getMaximoActividades(),
            ':minimoActividades' => $verifica->getMinimoActividades(),
            ':maximoLaboratorio' => $verifica->getMaximoLaboratorio(),
            ':minimoLaboratorio' => $verifica->getMinimoLaboratorio(),
            ':idAsignatura' => $verifica->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateVerifica($verifica){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE verifica SET IdVerifica = :idVerifica, MaximoExamenes = :maximoExamenes,MinimoExamenes = :minimoExamenes,MaximoActividades = :maximoActividades,MinimoActividades = :minimoActividades,MaximoLaboratorio = :maximoLaboratorio,MinimoLaboratorio = :minimoLaboratorio, IdAsignatura = :idAsignatura WHERE IdVerifica = :idVerifica";
        $values=array(':idVerifica' => $verifica->getIdVerifica(),
            ':maximoExamenes' => $verifica->getMaximoExamenes(),
            ':minimoExamenes' => $verifica->getMinimoExamenes(),
            ':maximoActividades' => $verifica->getMaximoActividades(),
            ':minimoActividades' => $verifica->getMinimoActividades(),
            ':maximoLaboratorio' => $verifica->getMaximoLaboratorio(),
            ':minimoLaboratorio' => $verifica->getMinimoLaboratorio(),
            ':idAsignatura' => $verifica->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteVerifica($idVerifica){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM verifica WHERE IdVerifica = :idVerifica";
        $values=array(':idVerifica' => $idVerifica);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}