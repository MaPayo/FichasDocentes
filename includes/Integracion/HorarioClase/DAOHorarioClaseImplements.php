<?php
namespace es\ucm;
require_once('includes/Integracion/HorarioClase/DAOHorarioClase.php');

class DAOHorarioClaseImplements implements DAOHorarioClase{


    public static function findHorarioClase($idHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM horarioClase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $idHorarioClase);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createHorarioClase($horarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO horarioClase (IdHorarioClase,Aula,Dia,HoraInicio,HoraFin,IdGrupoClase) 
        VALUES (:idHorarioClase, :aula, :dia, :horaInicio, :horaFin, :idGrupoClase)";
        $values=array(':idHorarioClase' => $horarioClase->getIdHorarioClase(),
            ':aula' => $horarioClase->getAula(),
            ':dia' => $horarioClase->getDia(),
            ':horaInicio' => $horarioClase->getHoraInicio(),
            ':horaFin' => $horarioClase->getHoraFin(),
            ':idGrupoClase' => $horarioClase->getIdGrupoClase());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateHorarioClase($horarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE horarioClase SET IdHorarioClase = :idHorarioClase, Aula = :aula,Dia = :dia,HoraInicio = :horaInicio,HoraFin = :horaFin,IdGrupoClase = :idGrupoClase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $horarioClase->getIdHorarioClase(),
            ':aula' => $horarioClase->getAula(),
            ':dia' => $horarioClase->getDia(),
            ':horaInicio' => $horarioClase->getHoraInicio(),
            ':horaFin' => $horarioClase->getHoraFin(),
            ':idGrupoClase' => $horarioClase->getIdGrupoClase());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteHorarioClase($idHorarioClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM horarioClase WHERE IdHorarioClase = :idHorarioClase";
        $values=array(':idHorarioClase' => $idHorarioClase);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}