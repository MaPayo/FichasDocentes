<?php
namespace es\ucm;
require_once('includes/Integracion/HorarioLaboratorio/DAOModHorarioLaboratorio.php');

class DAOModHorarioLaboratorioImplements implements DAOModHorarioLaboratorio{


    public static function findModHorarioLaboratorio($idHorarioLab){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modHorarioLaboratorio WHERE IdHorarioLab = :idHorarioLab";
        $values=array(':idHorarioLab' => $idHorarioLab);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModHorarioLaboratorio($modHorarioLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modHorarioLaboratorio (IdHorarioLab,Laboratorio,Dia,HoraInicio,HoraFin,IdGrupoLab) 
        VALUES (:idHorarioLab, :laboratorio, :dia, :horaInicio, :horaFin, :idGrupoLab)";
        $values=array(':idHorarioLab' => $modHorarioLaboratorio->getIdHorarioLab(),
            ':laboratorio' => $modHorarioLaboratorio->getLaboratorio(),
            ':dia' => $modHorarioLaboratorio->getDia(),
            ':horaInicio' => $modHorarioLaboratorio->getHoraInicio(),
            ':horaFin' => $modHorarioLaboratorio->getHoraFin(),
            ':idGrupoLab' => $modHorarioLaboratorio->getIdGrupoLab());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModHorarioLaboratorio($modHorarioLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modHorarioLaboratorio SET IdHorarioLab = :idHorarioLab, Laboratorio = :laboratorio,Dia = :dia,HoraInicio = :horaInicio,HoraFin = :horaFin,IdGrupoLab = :idGrupoLab WHERE IdHorarioLab = :idHorarioLab";
        $values=array(':idHorarioLab' => $modHorarioLaboratorio->getIdHorarioLab(),
            ':laboratorio' => $modHorarioLaboratorio->getLaboratorio(),
            ':dia' => $modHorarioLaboratorio->getDia(),
            ':horaInicio' => $modHorarioLaboratorio->getHoraInicio(),
            ':horaFin' => $modHorarioLaboratorio->getHoraFin(),
            ':idGrupoLab' => $modHorarioLaboratorio->getIdGrupoLab());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModHorarioLaboratorio($idHorarioLab){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modHorarioLaboratorio WHERE IdHorarioLab = :idHorarioLab";
        $values=array(':idHorarioLab' => $idHorarioLab);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}