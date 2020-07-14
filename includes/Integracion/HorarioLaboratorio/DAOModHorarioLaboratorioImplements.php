<?php

namespace es\ucm;

require_once('includes/Integracion/HorarioLaboratorio/DAOModHorarioLaboratorio.php');

class DAOModHorarioLaboratorioImplements implements DAOModHorarioLaboratorio
{
    public static function listModHorarioLaboratorio($idGrupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modhorariolaboratorio WHERE IdGrupoLab = :idGrupoLaboratorio";
        $values = array(':idGrupoLaboratorio' => $idGrupoLaboratorio);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findModHorarioLaboratorio($idHorarioLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modhorariolaboratorio WHERE IdHorarioLab = :idHorarioLaboratorio";
        $values = array(':idHorarioLaboratorio' => $idHorarioLaboratorio);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createModHorarioLaboratorio($modHorarioLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modhorariolaboratorio (IdHorarioLab,Laboratorio,Dia,HoraInicio,HoraFin,IdGrupoLab) 
        VALUES (:idHorarioLab, :laboratorio, :dia, :horaInicio, :horaFin, :idGrupoLab)";
        $values = array(
            ':idHorarioLab' => $modHorarioLaboratorio->getIdHorarioLab(),
            ':laboratorio' => $modHorarioLaboratorio->getLaboratorio(),
            ':dia' => $modHorarioLaboratorio->getDia(),
            ':horaInicio' => $modHorarioLaboratorio->getHoraInicio(),
            ':horaFin' => $modHorarioLaboratorio->getHoraFin(),
            ':idGrupoLab' => $modHorarioLaboratorio->getIdGrupoLab()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModHorarioLaboratorio($modHorarioLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modhorariolaboratorio SET IdHorarioLab = :idHorarioLab, Laboratorio = :laboratorio,Dia = :dia,HoraInicio = :horaInicio,HoraFin = :horaFin,IdGrupoLab = :idGrupoLab WHERE IdHorarioLab = :idHorarioLab";
        $values = array(
            ':idHorarioLab' => $modHorarioLaboratorio->getIdHorarioLab(),
            ':laboratorio' => $modHorarioLaboratorio->getLaboratorio(),
            ':dia' => $modHorarioLaboratorio->getDia(),
            ':horaInicio' => $modHorarioLaboratorio->getHoraInicio(),
            ':horaFin' => $modHorarioLaboratorio->getHoraFin(),
            ':idGrupoLab' => $modHorarioLaboratorio->getIdGrupoLab()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModHorarioLaboratorio($idHorarioLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modhorariolaboratorio WHERE IdHorarioLab = :idHorarioLaboratorio";
        $values = array(':idHorarioLaboratorio' => $idHorarioLaboratorio);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
