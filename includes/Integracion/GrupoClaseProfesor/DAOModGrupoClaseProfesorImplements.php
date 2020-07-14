<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoClaseProfesor/DAOModGrupoClaseProfesor.php');

class DAOModGrupoClaseProfesorImplements implements DAOModGrupoClaseProfesor
{
    public static function listModGrupoClaseProfesor($idGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modgrupoclaseprofesor WHERE IdGrupoClase = :idGrupoClase";
        $values = array(':idGrupoClase' => $idGrupoClase);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findModGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modgrupoclaseprofesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $idGrupoClase,
            ':emailProfesor' => $emailProfesor
        );
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createModGrupoClaseProfesor($modGrupoClaseProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modgrupoclaseprofesor (IdGrupoClase,Tipo,Fechas,Horas,EmailProfesor) 
        VALUES (:idGrupoClase, :tipo, :fechas, :horas, :emailProfesor)";
        $values = array(
            ':idGrupoClase' => $modGrupoClaseProfesor->getIdGrupoClase(),
            ':tipo' => $modGrupoClaseProfesor->getTipo(),
            ':fechas' => $modGrupoClaseProfesor->getFechas(),
            ':horas' => $modGrupoClaseProfesor->getHoras(),
            ':emailProfesor' => $modGrupoClaseProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModGrupoClaseProfesor($modGrupoClaseProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modgrupoclaseprofesor SET IdGrupoClase = :idGrupoClase, Tipo = :tipo, Fechas = :fechas, Horas = :horas, EmailProfesor = :emailProfesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $modGrupoClaseProfesor->getIdGrupoClase(),
            ':tipo' => $modGrupoClaseProfesor->getTipo(),
            ':fechas' => $modGrupoClaseProfesor->getFechas(),
            ':horas' => $modGrupoClaseProfesor->getHoras(),
            ':emailProfesor' => $modGrupoClaseProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modgrupoclaseprofesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $idGrupoClase,
            ':emailProfesor' => $emailProfesor
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
