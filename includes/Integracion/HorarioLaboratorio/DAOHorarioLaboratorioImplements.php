<?php
namespace es\ucm;
require_once('includes/Integracion/HorarioLaboratorio/DAOHorarioLaboratorio.php');

class DAOHorarioLaboratorioImplements implements DAOHorarioLaboratorio{


    public static function listHorarioLaboratorio($idGrupoLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM horarioLaboratorio WHERE IdGrupoLab = :idGrupoLaboratorio";
        $values=array(':idGrupoLaboratorio' => $idGrupoLaboratorio);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function findHorarioLaboratorio($idHorarioLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM horarioLaboratorio WHERE IdHorarioLab = :idHorarioLaboratorio";
        $values=array(':idHorarioLaboratorio' => $idHorarioLaboratorio);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createHorarioLaboratorio($horarioLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO horarioLaboratorio (IdHorarioLab,Laboratorio,Dia,HoraInicio,HoraFin,IdGrupoLab) 
        VALUES (:idHorarioLab, :laboratorio, :dia, :horaInicio, :horaFin, :idGrupoLab)";
        $values=array(':idHorarioLab' => $horarioLaboratorio->getIdHorarioLab(),
            ':laboratorio' => $horarioLaboratorio->getLaboratorio(),
            ':dia' => $horarioLaboratorio->getDia(),
            ':horaInicio' => $horarioLaboratorio->getHoraInicio(),
            ':horaFin' => $horarioLaboratorio->getHoraFin(),
            ':idGrupoLab' => $horarioLaboratorio->getIdGrupoLab());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateHorarioLaboratorio($horarioLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE horarioLaboratorio SET IdHorarioLab = :idHorarioLab, Laboratorio = :laboratorio,Dia = :dia,HoraInicio = :horaInicio,HoraFin = :horaFin,IdGrupoLab = :idGrupoLab WHERE IdHorarioLab = :idHorarioLab";
        $values=array(':idHorarioLab' => $horarioLaboratorio->getIdHorarioLab(),
            ':laboratorio' => $horarioLaboratorio->getLaboratorio(),
            ':dia' => $horarioLaboratorio->getDia(),
            ':horaInicio' => $horarioLaboratorio->getHoraInicio(),
            ':horaFin' => $horarioLaboratorio->getHoraFin(),
            ':idGrupoLab' => $horarioLaboratorio->getIdGrupoLab());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteHorarioLaboratorio($idHorarioLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM horarioLaboratorio WHERE IdHorarioLab = :idHorarioLaboratorio";
        $values=array(':idHorarioLaboratorio' => $idHorarioLaboratorio);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}