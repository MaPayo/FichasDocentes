<?php
namespace es\ucm;
require_once('includes/Integracion/HorarioClase/DAOModHorarioClase.php');

class DAOModHorarioClaseImplements implements DAOModHorarioClase{


    public static function findModHorarioClase($idHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modHorarioClase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $idHorarioClase);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModHorarioClase($modHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modHorarioClase (IdHorarioClase,Aula,Dia,HoraInicio,HoraFin,IdGrupoClase) 
        VALUES (:idHorarioClase, :aula, :dia, :horaInicio, :horaFin, :idGrupoClase)";
        $values=array(':idHorarioClase' => $modHorarioClase->getIdHorarioClase(),
            ':aula' => $modHorarioClase->getAula(),
            ':dia' => $modHorarioClase->getDia(),
            ':horaInicio' => $modHorarioClase->getHoraInicio(),
            ':horaFin' => $modHorarioClase->getHoraFin(),
            ':idGrupoClase' => $modHorarioClase->getIdGrupoClase());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModHorarioClase($modHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modHorarioClase SET IdHorarioClase = :idHorarioClase, Aula = :aula,Dia = :dia,HoraInicio = :horaInicio,HoraFin = :horaFin,IdGrupoClase = :idGrupoClase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $modHorarioClase->getIdHorarioClase(),
            ':aula' => $modHorarioClase->getAula(),
            ':dia' => $modHorarioClase->getDia(),
            ':horaInicio' => $modHorarioClase->getHoraInicio(),
            ':horaFin' => $modHorarioClase->getHoraFin(),
            ':idGrupoClase' => $modHorarioClase->getIdGrupoClase());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModHorarioClase($idHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modHorarioClase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $idHorarioClase);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}