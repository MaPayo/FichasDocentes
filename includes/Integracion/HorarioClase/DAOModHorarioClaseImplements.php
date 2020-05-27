<?php
namespace es\ucm;
require_once('includes/Integracion/HorarioClase/DAOModHorarioClase.php');

class DAOModHorarioClaseImplements implements DAOModHorarioClase{


    public static function listModHorarioClase($idGrupoClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modhorarioclase WHERE IdGrupoClase = :idGrupoClase";
        $values=array(':idGrupoClase' => $idGrupoClase);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function findModHorarioClase($idHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modhorarioclase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $idHorarioClase);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModHorarioClase($modHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modhorarioclase (IdHorarioClase,Aula,Dia,HoraInicio,HoraFin,IdGrupoClase) 
        VALUES (:idHorarioClase, :aula, :dia, :horaInicio, :horaFin, :idGrupoClase)";
        $values=array(':idHorarioClase' => $modHorarioClase->getIdHorarioClase(),
            ':aula' => $modHorarioClase->getAula(),
            ':dia' => $modHorarioClase->getDia(),
            ':horaInicio' => $modHorarioClase->getHoraInicio(),
            ':horaFin' => $modHorarioClase->getHoraFin(),
            ':idGrupoClase' => $modHorarioClase->getIdGrupoClase());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateModHorarioClase($modHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modhorarioclase SET IdHorarioClase = :idHorarioClase, Aula = :aula,Dia = :dia,HoraInicio = :horaInicio,HoraFin = :horaFin,IdGrupoClase = :idGrupoClase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $modHorarioClase->getIdHorarioClase(),
            ':aula' => $modHorarioClase->getAula(),
            ':dia' => $modHorarioClase->getDia(),
            ':horaInicio' => $modHorarioClase->getHoraInicio(),
            ':horaFin' => $modHorarioClase->getHoraFin(),
            ':idGrupoClase' => $modHorarioClase->getIdGrupoClase());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteModHorarioClase($idHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modhorarioclase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $idHorarioClase);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}