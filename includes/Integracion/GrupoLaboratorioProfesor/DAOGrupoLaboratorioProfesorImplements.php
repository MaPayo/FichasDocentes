<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoLaboratorioProfesor/DAOGrupoLaboratorioProfesor.php');

class DAOGrupoLaboratorioProfesorImplements implements DAOGrupoLaboratorioProfesor
{


    public static function listGrupoLaboratorioProfesor($idGrupoLab)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM grupolaboratorioprofesor WHERE IdGrupoLab = :idGrupoLab";
        $values = array(':idGrupoLab' => $idGrupoLab);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM grupolaboratorioprofesor WHERE IdGrupoLab = :idGrupoLab AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoLab' => $idGrupoLab,
            ':emailProfesor' => $emailProfesor
        );
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createGrupoLaboratorioProfesor($grupoLaboratorioProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO grupolaboratorioprofesor (IdGrupoLab,Sesiones,Fechas,Horas,EmailProfesor) 
        VALUES (:idGrupoLab, :sesiones, :fechas, :horas, :emailProfesor)";
        $values = array(
            ':idGrupoLab' => $grupoLaboratorioProfesor->getIdGrupoLab(),
            ':sesiones' => $grupoLaboratorioProfesor->getSesiones(),
            ':fechas' => $grupoLaboratorioProfesor->getFechas(),
            ':horas' => $grupoLaboratorioProfesor->getHoras(),
            ':emailProfesor' => $grupoLaboratorioProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateGrupoLaboratorioProfesor($grupoLaboratorioProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE grupolaboratorioprofesor SET IdGrupoLab = :idGrupoLab, Sesiones = :sesiones, Fechas = :fechas, Horas = :horas, EmailProfesor = :emailProfesor WHERE IdGrupoLab = :idGrupoLab AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoLab' => $grupoLaboratorioProfesor->getIdGrupoLab(),
            ':sesiones' => $grupoLaboratorioProfesor->getSesiones(),
            ':fechas' => $grupoLaboratorioProfesor->getFechas(),
            ':horas' => $grupoLaboratorioProfesor->getHoras(),
            ':emailProfesor' => $grupoLaboratorioProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM grupolaboratorioprofesor WHERE IdGrupoLab = :idGrupoLab AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoLab' => $idGrupoLab,
            ':emailProfesor' => $emailProfesor
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
