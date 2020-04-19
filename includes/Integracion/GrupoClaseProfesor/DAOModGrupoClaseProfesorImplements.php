<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoClaseProfesor/DAOModGrupoClaseProfesor.php');

class DAOModGrupoClaseProfesorImplements implements DAOModGrupoClaseProfesor
{


    public static function listModGrupoClaseProfesor($idGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modGrupoClaseProfesor WHERE IdGrupoClase = :idGrupoClase";
        $values = array(':idGrupoClase' => $idGrupoClase);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findModGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modGrupoClaseProfesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
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
        $sql = "INSERT INTO modGrupoClaseProfesor (IdGrupoClase,EmailProfesor) 
        VALUES (:idGrupoClase, :emailProfesor)";
        $values = array(
            ':idGrupoClase' => $modGrupoClaseProfesor->getIdGrupoClase(),
            ':emailProfesor' => $modGrupoClaseProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModGrupoClaseProfesor($modGrupoClaseProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modGrupoClaseProfesor SET IdGrupoClase = :idGrupoClase, EmailProfesor = :emailProfesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $modGrupoClaseProfesor->getIdGrupoClase(),
            ':emailProfesor' => $modGrupoClaseProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modGrupoClaseProfesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $idGrupoClase,
            ':emailProfesor' =>$emailProfesor
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
