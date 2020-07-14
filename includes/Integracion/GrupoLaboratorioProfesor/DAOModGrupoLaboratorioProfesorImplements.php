<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoLaboratorioProfesor/DAOModGrupoLaboratorioProfesor.php');

class DAOModGrupoLaboratorioProfesorImplements implements DAOModGrupoLaboratorioProfesor
{
    public static function listModGrupoLaboratorioProfesor($idGrupoLab)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modgrupolaboratorioprofesor WHERE IdGrupoLab = :idGrupoLab";
        $values = array(':idGrupoLab' => $idGrupoLab);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modgrupolaboratorioprofesor WHERE IdGrupoLab = :idGrupoLab AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoLab' => $idGrupoLab,
            ':emailProfesor' => $emailProfesor
        );
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createModGrupoLaboratorioProfesor($modGrupoLaboratorioProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modgrupolaboratorioprofesor (IdGrupoLab,Sesiones,Fechas,Horas,EmailProfesor) 
        VALUES (:idGrupoLab, :sesiones, :fechas, :horas, :emailProfesor)";
        $values = array(
            ':idGrupoLab' => $modGrupoLaboratorioProfesor->getIdGrupoLab(),
            ':sesiones' => $modGrupoLaboratorioProfesor->getSesiones(),
            ':fechas' => $modGrupoLaboratorioProfesor->getFechas(),
            ':horas' => $modGrupoLaboratorioProfesor->getHoras(),
            ':emailProfesor' => $modGrupoLaboratorioProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModGrupoLaboratorioProfesor($modGrupoLaboratorioProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modgrupolaboratorioprofesor SET IdGrupoLab = :idGrupoLab,
         Sesiones = :sesiones,
          Fechas = :fechas,
           Horas = :horas,
            EmailProfesor = :emailProfesor
             WHERE IdGrupoLab = :idGrupoLab AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoLab' => $modGrupoLaboratorioProfesor->getIdGrupoLab(),
            ':sesiones' => $modGrupoLaboratorioProfesor->getSesiones(),
            ':fechas' => $modGrupoLaboratorioProfesor->getFechas(),
            ':horas' => $modGrupoLaboratorioProfesor->getHoras(),
            ':emailProfesor' => $modGrupoLaboratorioProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modgrupolaboratorioprofesor WHERE IdGrupoLab = :idGrupoLab AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoLab' => $idGrupoLab,
            ':emailProfesor' =>$emailProfesor
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
